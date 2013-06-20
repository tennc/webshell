<HTML>
<HEAD>
<TITLE>啊D小工具 - 目录读写检测 [ASP版] http://www.d99net.net</TITLE>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=gb2312">
<STYLE TYPE="text/css">
a {text-decoration: none}
a:hover {text-decoration: underline; color: #FF9900}
select,textarea,pre,td,th,body,input{font-family: "宋体";font-size: 9pt}
.Edit {	border: 1px groove #666666;}
.but1 {font-size: 9pt; border-width: 1px; cursor: hand}
</STYLE>
</HEAD>

<BODY>
<%
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



%>
</BODY>