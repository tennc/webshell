<%
Dim Report
PASSWORD="admin" '密码
VERSION="" '
URL=Request.ServerVariables("URL")
FileName=Right(URL,Len(URL)-InStrRev(URL,"/"))
ServerName=Request.Servervariables("SERVER_NAME")
ServerPort=":"&Request.ServerVariables("SERVER_PORT")
WebSiteRoot=Server.MapPath("\")
CurrentlyRoot=Server.MapPath(".")

RQSact=Request.QueryString("act")
RQSFileManager=Request.QueryString("filemanager")
RQSFilePath=Request.QueryString("filepath")

If RQSact="login" Then
	If Request.Form("pwd")=PASSWORD Then Session("KOA")=1
End If

Set FSO=Server.CreateObject("Scripting.FileSystemObject")

%>
<style type="text/css">
body,td,th {font-size: 12px;}
.style1 {background-color: #0033CC;}
.style2 {background-color: #FFFFFF; height:30px;}
</style>
<script type="text/javascript">
function setNone(t) {
	document.getElementById('koaAsp').style.display='none';
	document.getElementById('koaQT').style.display='none';
	document.getElementById('koaSF').style.display='none';
	document.getElementById(t).style.display='';
}
function setScanMode() {
	document.getElementById("scanForm").submit();
	document.getElementById('scanButton').disabled=true;
	document.getElementById('scanButton').value='扫描中…';
	document.getElementById('scanMode').innerHTML='正在扫描中，请耐心等待……';
}
</script>
</head>
<body>
<%If Session("KOA")<>1 Then%>
<div>
	<form method="post" action="?act=login">
		请输入密码admin:<input name="pwd" type="password" size="15"><input type="submit" name="Submit" value="提交">
	</form>
</div>
<%
Else
	If RQSact<>"scan" And RQSFileManager="" Then
%>
		<form action="?act=scan" method="post" name="form" id="scanForm">
			<table cellspacing="1" cellpadding="0" class="style1">
				<tr>
					<td colspan="2" class="style2"><center><h1>KOA ASP类 WebShell扫描工具</h1></center></td>
				</tr>
				<tbody id="scanMode" class="style2">
				<tr>
					<td class="style2">
						<b>输入你要检查的路径：</b><input name="path" type="text" value="\" size="30">*<br>
						三种填写方法,比如“E:\wwwroot”;填“\”为整个网站;“.”为本文件所在目录
					</td>
					<td class="style2"><input type="button" value="开始扫描" id="scanButton" onclick="setScanMode();"></td>
				</tr>
				<tr>
					<td colspan="2" class="style2">
						请选择扫描方式：
						<input name="radiobutton" type="radio" value="koa" onclick="setNone('koaAsp')" checked>查木马(耗资源)
						<input name="radiobutton" type="radio" value="qt" onclick="setNone('koaQT')">查找IIS解析漏洞的文件
						<input name="radiobutton" type="radio" value="sf" onclick="setNone('koaSF')">搜索符合下面条件的文件
					</td>
				</tr>
				<tr>
					<td colspan="2" class="style2">
						<b>功能说明</b>：<br>
						<span id="koaAsp">
						查找后缀名为asp,asa,cdx,cer,aspx等木马<br>
						如果目录下文件过多，容易脚本超时。
						</span>
						<span id="koaQT" style="display:none">
						查找IIS解析漏洞的文件，这些文件不一定是木马，需要手动查看<br>
						比如"D:\WEBROOT\website\hack.asp\a.gif"或<br>
						"D:\WEBROOT\website\hack.asp;.gif"一类的文件能查到
						</span>
						<span id="koaSF" style="display:none">
						---------------------- 需将以下内容填写完整 ------------------<br><br>
						查找内容：<input name="Search_Content" type="text" size="20">  要查找的字符串，不填就只进行日期检查<br>
						修改日期：<input name="Search_Date" type="text" value="<%=Left(Now(),InStrRev(now(),"-")-1)%>" size="20">* 多个日期用;隔开，任意日期填写<a href="#" onClick="javascript:form.Search_Date.value='ALL'">ALL</a><br>
						文件类型：<input name="Search_FileExt" value="*" size="20">* 类型之间用,隔开，*表示所有类型
						</span>
					</td>
				</tr>
				</tbody>
				<tr>
					<td colspan="2" class="style2">版本号:<%=VERSION%> 版权所有:<a href="http://tophack.net/">http://tophack.net/</a> 欢迎传播推广，修改请保留版权。</td>
				</tr>
			</table>
		</form>
<%
	ElseIf RQSFileManager<>"" Then
		On Error Resume Next
		If RQSFileManager="delfile" Then
			Call FSO.DeleteFile(RQSFilePath,True)
			ChkErr(Err)
			Response.Write "<script>alert('删除成功');window.open('','_self','');window.close();</script>"
		ElseIf RQSFileManager="savefile" Then
			FileContent=Request.Form("fileContent")
			Set oFile=FSO.OpenTextFile(RQSFilePath,2,True)
			oFile.Write FileContent
			oFile.Close
			ChkErr(Err)
			Response.Write "<script>alert('修改成功');window.open('','_self','');window.close();</script>"
		ElseIf RQSFileManager="editfile" Then
			Set oFile=FSO.OpenTextFile(RQSFilePath)
			ChkErr(Err)
			FileTxt=Server.HtmlEncode(oFile.ReadAll())
%>
			<table border="1" cellpadding="0" cellspacing="0" style="table-layout:fixed;word-break:break-all;width:100%;">
			  <tr>
			    <th>“<%=RQSFilePath%>”文件代码</th>
			  </tr>
			  <tr>
			  	<td><a href="?filemanager=delfile&filepath=<%=tURLEncode(RQSFilePath)%>" onClick="return confirm('确认删除?')">删除</a> <a href="#" onClick="if(confirm('确认保存修改?')){document.getElementById('saveForm').submit();}else{return false;}">保存</a> <a href="javascript:window.open('','_self','');window.close();">关闭</a>  友情提示：如果你看到下面的代码是乱码，请不要使用本程序修改文件。</td>
			  </tr>
			  <tr>
			  	<td><form action="?filemanager=savefile&filepath=<%=tURLEncode(RQSFilePath)%>" method="post" id="saveForm"><textarea name="fileContent" style="width:1000px;height:530px;"><%=FileTxt%></textarea></form></td>
			  </tr>
			  <tr>
			  	<td><a href="?filemanager=delfile&filepath=<%=tURLEncode(RQSFilePath)%>" onClick="return confirm('确认删除?')">删除</a> <a href="#" onClick="if(confirm('确认保存修改?')){document.getElementById('saveForm').submit();}else{return false;}">保存</a> <a href="javascript:window.open('','_self','');window.close();">关闭</a></td>
			  </tr>
			</table>
<%
		Else
			Set oFile=FSO.OpenTextFile(RQSFilePath)
			ChkErr(Err)
			FileTxt=Server.HtmlEncode(LCase(oFile.ReadAll()))
%>
			<table border="1" cellpadding="0" cellspacing="0" style="table-layout:fixed;word-break:break-all;width:100%">
			  <tr>
			    <th>“<%=RQSFilePath%>”文件代码 危险脚本已高亮加大</th>
			  </tr>
			  <tr>
			  	<td><a href="?filemanager=delfile&filepath=<%=tURLEncode(RQSFilePath)%>" onClick="return confirm('确认删除?')">删除</a> <a href="?filemanager=editfile&filepath=<%=tURLEncode(RQSFilePath)%>">编辑</a> <a href="javascript:window.open('','_self','');window.close();">关闭</a>  友情提示：如果你看到下面的代码是乱码，请不要使用本程序修改文件。</td>
			  </tr>
			  <tr>
			  	<td><%=HeightLightCode(Replace(FileTxt,vbNewLine,"<br/>"))%></td>
			  </tr>
			  <tr>
			  	<td><a href="?filemanager=delfile&filepath=<%=tURLEncode(RQSFilePath)%>" onClick="return confirm('确认删除?')">删除</a> <a href="?filemanager=editfile&filepath=<%=tURLEncode(RQSFilePath)%>">编辑</a> <a href="javascript:window.open('','_self','');window.close();">关闭</a></td>
			  </tr>
			</table>
<%
		End If
		Set oFile=Nothing
	Else
		Server.ScriptTimeout=9999999
		FormRB=Request.Form("radiobutton")
		FormPath=Request.Form("path")
		FormSD=Request.Form("Search_Date")
		FormSFE=Request.Form("Search_FileExt")
		If FormPath="" Then
			Response.Write("请输入要扫描的目录<br><br><a href='"&URL&"'>返回重新输入</a>")
			Response.End
		End If
		If FormPath="\" Then
			TmpPath=WebSiteRoot
			SearchType=1
		ElseIf FormPath="." Then
			TmpPath=CurrentlyRoot
			SearchType=2
		Else
			TmpPath=FormPath
		End If
		Timer1=Timer
		Sun=0
		SumFiles=0
		SumFolders=1
		If FormRB="koa" Then
			DimFileExt="asp,asa,cer,cdx,aspx,cgi,php,php3,php4,php5"
			Call ShowAllFileKOA(TmpPath)
		ElseIf FormRB="qt" Then
			Call ShowAllFileQT(TmpPath)
		Else
			If FormPath="" Or FormSD="" Or FormSFE="" Then
				Response.Write("条件不完全，恕难从命<br><br><a href='"&URL&"'>返回重新输入</a>")
				Response.End
			End If
			DimFileExt=FormSFE
			Call ShowAllFileSF(TmpPath)
		End If
%>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <a href='<%=URL%>'>返回使用其他方式扫描</a><th>WebShell(木马) 扫描结果</th>
  </tr>
  <tr>
    <td style="padding:5px;line-height:170%;clear:both;font-size:12px">
	<table width="100%" border="0" cellpadding="0" cellspacing="0">
	 <tr>
		 <td valign="top">
			 <table width="100%" border="1" cellpadding="0" cellspacing="0" style="padding:5px;line-height:170%;clear:both;font-size:12px">
			 <tr>
<%If FormRB="koa" Then%>
			   <td width="30%">文件相对路径</td>
			   <td width="18%">特征码</td>
			   <td width="40%">描述</td>
			   <td width="12%">创建/修改时间</td>
<%Else%>
			   <td width="60%">文件相对路径</td>
			   <td width="20%">文件创建时间</td>
			   <td width="20%">修改时间</td>
<%End If%>
			   </tr>
			 <%=Report%>
			 </table>
		</td>
	 </tr>
	</table>
</td></tr></table>
扫描完毕！一共检查文件夹<font color="#FF0000"><%=SumFolders%></font>个，文件<font color="#FF0000"><%=SumFiles%></font>个，发现可疑点<font color="#FF0000"><%=Sun%></font>个
<%
Timer2=Timer
TheTime=CStr(Int(((Timer2-Timer1)*10000)+0.5)/10)
	Response.Write "，本页执行共用了"&TheTime&"毫秒 <a href='"&URL&"'>返回使用其他方式扫描</a>"
	End If
End If
%>
</body>
</html>
<%

'遍历处理path及其子目录所有文件
Sub ShowAllFileKOA(Path)
	If Not FSO.FolderExists(Path) Then Exit Sub
	Set f=FSO.GetFolder(Path)
	Set fc2=f.Files
	For Each MyFile In fc2
		On Error Resume Next
		If LCase(CurrentlyRoot&"\"&FileName)<>Replace(LCase(Path&"\"&MyFile.Name),"\\","\") And CheckExt(FSO.GetExtensionName(Path&"\"&MyFile.Name)) Then
			Call ScanFile(Path&"\"&MyFile.Name,"")
			SumFiles=SumFiles+1
		End If
	Next
	Set fc=f.SubFolders
	For Each f1 In fc
		ShowAllFileKOA Path&"\"&f1.Name
		SumFolders=SumFolders+1
  Next
End Sub

'检测文件
Sub ScanFile(FilePath,InFile)
	FilePath=Replace(FilePath,"\\","\")
	FileCreateDate=GetDateCreate(FilePath)
	FileModifyDate=GetDateModify(FilePath)
	If InFile<>"" Then
		InFile=Replace(InFile,"\\","\")
		If SearchType=1 Or InStr(LCase(InFile),LCase(WebSiteRoot))>0 Then
			InFiles="<font color=red>该文件被 "&InFile&" <a href=""http://"&ServerName&ServerPort&"/"&tURLEncode(Replace(Replace(InFile,WebSiteRoot&"\","",1,1,1),"\","/"))&""" target=_blank>访问此页</a> <a href=""?filemanager=showfile&filepath="&tURLEncode(InFile)&""" target=_blank>查看文件代码</a>文件包含执行</font>"
		ElseIf SearchType=2 Or InStr(LCase(InFile),LCase(CurrentlyRoot))>0 Then
			InFiles="<font color=red>该文件被 "&InFile&" <a href=""http://"&ServerName&ServerPort&Replace(URL,FileName,"")&tURLEncode(Replace(Replace(InFile,CurrentlyRoot&"\","",1,1,1),"\","/"))&""" target=_blank>访问此页</a> <a href=""?filemanager=showfile&filepath="&tURLEncode(InFile)&""" target=_blank>查看文件代码</a>文件包含执行</font>"
		Else
			InFiles="<font color=red>该文件被 "&InFile&" <a href=""?filemanager=showfile&filepath="&tURLEncode(InFile)&""" target=_blank>查看文件代码</a>文件包含执行</font>"
		End If
	End If
	On Error Resume Next
	Set oFile=FSO.OpenTextFile(FilePath)
	FileTxt=LCase(oFile.ReadAll())
	If Err Then Exit Sub End If
	If Len(FileTxt)>0 Then
		'特征码检查
		FileTxt=vbcrlf&FileTxt
		If SearchType=1 Or InStr(LCase(FilePath),LCase(WebSiteRoot))>0 Then
			Temp=FilePath&"<br><a href=""http://"&ServerName&ServerPort&"/"&tURLEncode(Replace(Replace(FilePath,WebSiteRoot&"\","",1,1,1),"\","/"))&""" target=_blank>访问此页</a> <a href=""?filemanager=showfile&filepath="&tURLEncode(FilePath)&""" target=_blank>查看文件代码</a>"
		ElseIf SearchType=2 Or InStr(LCase(FilePath),LCase(CurrentlyRoot))>0 Then
			Temp=FilePath&"<br><a href=""http://"&ServerName&ServerPort&Replace(URL,FileName,"")&tURLEncode(Replace(Replace(FilePath,CurrentlyRoot&"\","",1,1,1),"\","/"))&""" target=_blank>访问此页</a> <a href=""?filemanager=showfile&filepath="&tURLEncode(FilePath)&""" target=_blank>查看文件代码</a>"
		Else
			Temp=FilePath&"<br><a href=""?filemanager=showfile&filepath="&tURLEncode(FilePath)&""" target=_blank>查看文件代码</a>"
		End If

			'Check "WScript.Shell"
			If InStr(FileTxt,"wscript.shell") Or InStr(FileTxt,"clsid:72c24dd5-d70a-438b-8a42-98424b88afb8") Then
				Report=Report&"<tr><td>"&Temp&"</td><td>WScript.Shell 或者 clsid:72C24DD5-D70A-438B-8A42-98424B88AFB8</td><td><font color=red>危险组件，一般被ASP木马利用</font>"&InFiles&"</td><td>"&FileCreateDate&"<br>"&FileModifyDate&"</td></tr>"
				Sun=Sun+1
			End If

			'Check "Shell.Application"
			If InStr(FileTxt,"shell.application") Or InStr(FileTxt,"clsid:13709620-c279-11ce-a49e-444553540000") Then
				Report=Report&"<tr><td>"&Temp&"</td><td>Shell.Application 或者 clsid:13709620-C279-11CE-A49E-444553540000</td><td><font color=red>危险组件，一般被ASP木马利用</font>"&InFiles&"</td><td>"&FileCreateDate&"<br>"&FileModifyDate&"</td></tr>"
				Sun=Sun+1
			End If

			'Check .Encode
			Set regEx=New RegExp
			regEx.IgnoreCase=True
			regEx.Global=True
			regEx.Pattern="\b(?:vbscript|jscript|javascript).encode\b"
			If regEx.Test(FileTxt) Then
				Report=Report&"<tr><td>"&Temp&"</td><td>(vbscript|jscript|javascript).Encode</td><td><font color=red>似乎脚本被加密了</font>"&InFiles&"</td><td>"&FileCreateDate&"<br>"&FileModifyDate&"</td></tr>"
				Sun=Sun+1
			End If

			'Check eval backdoor
			regEx.Pattern="\bEval\b"
			If regEx.Test(FileTxt) Then
				Report=Report&"<tr><td>"&Temp&"</td><td>Eval</td><td>eval()函数可以执行任意ASP代码，被一些后门利用。其形式一般是：eval(X)<br>但是javascript代码中也可以使用，有可能是误报。"&InFiles&"</td><td>"&FileCreateDate&"<br>"&FileModifyDate&"</td></tr>"
				Sun=Sun+1
			End If

			'Check execute backdoor
			regEx.Pattern="[^.]\bExecute\b"
			If regEx.Test(FileTxt) Then
				Report=Report&"<tr><td>"&Temp&"</td><td>Execute</td><td><font color=red>execute()函数可以执行任意ASP代码，被一些后门利用。其形式一般是：execute(X)</font><br>"&InFiles&"</td><td>"&FileCreateDate&"<br>"&FileModifyDate&"</td></tr>"
				Sun=Sun+1
			End If


      '查一句话木马（cmdshell）
			regEx.Pattern="[^.]\bcmdshell\b"
			If regEx.Test(FileTxt) Then
				Report=Report&"<tr><td>"&Temp&"</td><td>cmdshell</td><td><font color=red>cmdshell</font><br>"&InFiles&"</td><td>"&FileCreateDate&"<br>"&FileModifyDate&"</td></tr>"
				Sun=Sun+1
			End If

			'查一句话木马（serv-u）
			regEx.Pattern="[^.]\bserv-u\b"
			If regEx.Test(FileTxt) Then
				Report=Report&"<tr><td>"&Temp&"</td><td>serv-u</td><td><font color=red>serv-u提权一般会包含这个字符</font><br>"&InFiles&"</td><td>"&FileCreateDate&"<br>"&FileModifyDate&"</td></tr>"
				Sun=Sun+1
			End If

			'Check .CreateTextFile|.OpenTextFile
			regEx.Pattern="\.(?:Open|Create)TextFile\b"
			If regEx.Test(FileTxt) Then
				Report=Report&"<tr><td>"&Temp&"</td><td><font color=red>.CreateTextFile|.OpenTextFile</font></td><td>使用了FSO的CreateTextFile|OpenTextFile函数读写文件"&InFiles&"</td><td>"&FileCreateDate&"<br>"&FileModifyDate&"</td></tr>"
				Sun=Sun+1
			End If

			'Check .SaveToFile
			regEx.Pattern="\.SaveToFile\b"
			If regEx.Test(FileTxt) Then
				Report=Report&"<tr><td>"&Temp&"</td><td><font color=red>.SaveToFile</font></td><td>使用了Stream的SaveToFile函数写文件"&InFiles&"</td><td>"&FileCreateDate&"<br>"&FileModifyDate&"</td></tr>"
				Sun=Sun+1
			End If

			'Check .Name=
			regEx.Pattern="\.Name\s*=\s*(?!=)"
			If regEx.Test(FileTxt) Then
				Report=Report&"<tr><td>"&Temp&"</td><td><font color=red>.Name</font></td><td>使用了FSO的.GetFile|.GetFolder函数的.Name更改文件或文件夹名称"&InFiles&"</td><td>"&FileCreateDate&"<br>"&FileModifyDate&"</td></tr>"
				Sun=Sun+1
			End If

			If InFile<>"" Then
				MyFileExt=LCase(Right(FilePath,Len(FilePath)-InStrRev(FilePath,".")))
				If InStr(MyFileExt,"asp")=0 And InStr(MyFileExt,"asa")=0 And InStr(MyFileExt,"cer")=0 And InStr(MyFileExt,"cdx")=0 And InStr(MyFileExt,"inc")=0 And InStr(MyFileExt,"htm")=0 Then
					Sun=Sun+1
					Report=Report&"<tr><td>"&Temp&"</td><td><font color=red>Include</font></td><td>包含非ASP("&MyFileExt&")文件"&InFiles&"</td><td>"&FileCreateDate&"<br>"&FileModifyDate&"</td></tr>"
				End If
			End If
			'------------------              End           ----------------------------
			Set regEx=Nothing

		'Check include file|virtual
		Set regEx=New RegExp
		regEx.IgnoreCase=True
		regEx.Global=True
		regEx.Pattern="<!--[\s　]*#include[\s　]*(?:file|virtual)[\s　]*=[\s　]*(""|')?(.+)\1[\s　]*-->"
		Set Matches=regEx.Execute(FileTxt)
		For Each Match In Matches
			tFile=Trim(Replace(regEx.Replace(Match.Value,"$2"),vbCr,""))
			If Not CheckExt(FSO.GetExtensionName(tFile)) Then
				Call ScanFile(Mid(FilePath,1,InStrRev(FilePath,"\"))&tFile,FilePath)
				SumFiles=SumFiles+1
			End If
		Next
		Set Matches=Nothing
		Set regEx=Nothing

		'Check Server.Execute|Transfer
		Set regEx=New RegExp
		regEx.IgnoreCase=True
		regEx.Global=True
		regEx.Pattern="Server.(?:Execute|Transfer)\s*\(\s*""(.+)"""
		Set Matches=regEx.Execute(FileTxt)
		For Each Match In Matches
			tFile=Trim(regEx.Replace(Match.Value,"$1"))
			If Not CheckExt(FSO.GetExtensionName(tFile)) Then
				Call ScanFile(Mid(FilePath,1,InStrRev(FilePath,"\"))&tFile,FilePath)
				SumFiles=SumFiles+1
			End If
		Next
		Set Matches=Nothing
		Set regEx=Nothing

		'Check Server.Execute|Transfer
		Set regEx=New RegExp
		regEx.IgnoreCase=True
		regEx.Global=True
		regEx.Pattern="Server.(?:Execute|Transfer)\s*\(\s*[^""].+\)"
		If regEx.Test(FileTxt) Then
			Report=Report&"<tr><td>"&Temp&"</td><td>Server.Execute</td><td><font color=red>不能跟踪检查Server.execute()函数执行的文件。请管理员自行检查</font></td><td>"&FileCreateDate&"<br>"&FileModifyDate&"</td></tr>"
			Sun=Sun+1
		End If
		Set regEx=Nothing

		'Check RunatScript
		Set regEx=New RegExp
		regEx.IgnoreCase=True
		regEx.Global=True
		regEx.Pattern="<scr"&"ipt[^>]*?runat\s*=\s*(""|')?server\1[\s\S]*?>"
		Set Matches=regEx.Execute(FileTxt)
		For Each Match In Matches
			MatchValue=Trim(Replace(Match.Value,vbNewLine," "))
			TmpLake2=Mid(MatchValue,1,InStr(MatchValue,">"))
			srcSeek=InStr(1,TmpLake2,"src",1)
			If srcSeek>0 Then
				srcSeek2=InStr(srcSeek,TmpLake2,"=")
				myteststr=Mid(MatchValue,srcSeek,srcSeek2)
				For i=1 To 50
					Tmp=Mid(TmpLake2,srcSeek2+i,1)
					If Tmp<>" " And Tmp<>chr(9) And Tmp<>vbCrLf Then
						Exit For
					End If
				Next
				If Tmp="""" Then
					TmpName=Mid(TmpLake2,srcSeek2+i+1,InStr(srcSeek2+i+1,TmpLake2,"""")-srcSeek2-i-1)
				Else
					If InStr(srcSeek2+i+1,TmpLake2," ")>0 Then TmpName=Mid(TmpLake2,srcSeek2+i,InStr(srcSeek2+i+1,TmpLake2," ")-srcSeek2-i) Else TmpName=TmpLake2
					If InStr(TmpName,chr(9))>0 Then TmpName=Mid(TmpName,1,InStr(1,TmpName,chr(9))-1)
					If InStr(TmpName,vbCrLf)>0 Then TmpName=Mid(TmpName,1,InStr(1,TmpName,vbCrlf)-1)
					If InStr(TmpName,">")>0 Then TmpName=Mid(TmpName,1,InStr(1,TmpName,">")-1)
				End If
				Call ScanFile(Mid(FilePath,1,InStrRev(FilePath,"\"))&TmpName,FilePath)
				SumFiles=SumFiles+1
			End If
		Next
		Set Matches=Nothing
		Set regEx=Nothing

	End If
	Set oFile=Nothing
End Sub

'检查文件后缀，如果与预定的匹配即返回TRUE
Function CheckExt(FileExt)
	If DimFileExt="*" Then CheckExt=True
	Ext=Split(DimFileExt,",")
	For i=0 To Ubound(Ext)
		If LCase(FileExt)=Ext(i) Then
			CheckExt=True
			Exit Function
		End If
	Next
End Function

Function GetDateModify(FilePath)
  Set f=FSO.GetFile(FilePath)
	s=f.DateLastModified
	Set f=Nothing
	GetDateModify=s
End Function

Function GetDateCreate(FilePath)
  Set f=FSO.GetFile(FilePath)
	s=f.DateCreated
	Set f=Nothing
	GetDateCreate=s
End Function

Function tURLEncode(Str)
	Temp=Replace(Str,"%","%25")
	Temp=Replace(Temp,"#","%23")
	Temp=Replace(Temp,"&","%26")
	Temp=Replace(Temp,"+","%2B")
	tURLEncode=Temp
End Function

Function HeightLightCode(Str)
	HLCStr="<span style='color:#F00;background-color:#FF0;font-size:30px;'>"
	Set regEx=New RegExp
	regEx.IgnoreCase=True
	regEx.Global=True
	regEx.Pattern="([^.]\bExecute)\b|\b(Eval)\b|(\.Name\s*=\s*(?!=))"
	Temp=regEx.replace(Str,HLCStr&"$1$2$3</span>")
	Set regEx=Nothing

	Temp=Replace(Temp,"wscript.shell",HLCStr&"wscript.shell</span>")
	Temp=Replace(Temp,"shell.application",HLCStr&"shell.application</span>")
	Temp=Replace(Temp,".encode",HLCStr&".encode</span>")
	Temp=Replace(Temp,"cmdshell",HLCStr&"cmdshell</span>")
	Temp=Replace(Temp,"serv-u",HLCStr&"serv-u</span>")
	Temp=Replace(Temp,".createtextfile",HLCStr&".createtextfile</span>")
	Temp=Replace(Temp,".opentextfile",HLCStr&".opentextfile</span>")
	Temp=Replace(Temp,".savetofile",HLCStr&".savetofile</span>")
	Temp=Replace(Temp,"clsid:f935dc22-1cf0-11d0-adb9-00c04fd58a0b",HLCStr&"clsid:f935dc22-1cf0-11d0-adb9-00c04fd58a0b</span>")
	Temp=Replace(Temp,"clsid:13709620-c279-11ce-a49e-444553540000",HLCStr&"clsid:13709620-c279-11ce-a49e-444553540000</span>")
	Temp=Replace(Temp,"clsid:0d43fe01-f093-11cf-8940-00a0c9054228",HLCStr&"clsid:0d43fe01-f093-11cf-8940-00a0c9054228</span>")
	Temp=Replace(Temp,"clsid:72c24dd5-d70a-438b-8a42-98424b88afb8",HLCStr&"clsid:72c24dd5-d70a-438b-8a42-98424b88afb8</span>")
	HeightLightCode=Temp
End Function

Sub ChkErr(Err)
	If Err Then
		Response.Write"<p>错误:"&Err.Description&"</p><p>错误源:"&Err.Source&"</p>"
		Err.Clear
		Set oFile=Nothing
		Set FSO=Nothing
		Response.End
	End If
End Sub

Sub ShowAllFileSF(Path)
	If Not FSO.FolderExists(Path) Then Exit Sub
	Set f=FSO.GetFolder(Path)
	Set fc2=f.Files
	For Each MyFile In fc2
		On Error Resume Next
		If LCase(CurrentlyRoot&"\"&FileName)<>Replace(LCase(Path&"\"&MyFile.Name),"\\","\") And CheckExt(FSO.GetExtensionName(Path&"\"&MyFile.Name)) Then
			Call IsFind(Path&"\"&MyFile.Name)
			SumFiles=SumFiles+1
		End If
	Next
	Set fc=f.SubFolders
	For Each f1 In fc
		ShowAllFileSF Path&"\"&f1.Name
		SumFolders=SumFolders+1
  Next
  Set fc=Nothing
  Set fc2=Nothing
  Set f=Nothing
End Sub

Sub IsFind(ThePath)
	TheDate=GetDateModify(ThePath)
	On Error Resume Next
	TheTmp=Mid(TheDate,1,InStr(TheDate," ")-1)
	If Err Then Exit Sub

	xDate=Split(FormSD,";")

	If FormSD="ALL" Then ALLTime=True

	For i=0 To Ubound(xDate)
		If InStr(TheTmp,xDate(i))>0 Or ALLTime=True Then
			If SearchType=1 Or InStr(Replace(LCase(ThePath),"\\","\"),LCase(WebSiteRoot))>0 Then
				Temp=ThePath&"<br><a href=""http://"&ServerName&ServerPort&"/"&tURLEncode(Replace(Replace(Replace(ThePath,"\\","\"),WebSiteRoot&"\","",1,1,1),"\","/"))&""" target=_blank>访问此页</a> <a href=""?filemanager=showfile&filepath="&tURLEncode(ThePath)&""" target=_blank>查看文件代码</a>"
			ElseIf SearchType=2 Or InStr(Replace(LCase(ThePath),"\\","\"),LCase(CurrentlyRoot))>0 Then
				Temp=ThePath&"<br><a href=""http://"&ServerName&ServerPort&Replace(URL,FileName,"")&tURLEncode(Replace(Replace(Replace(ThePath,"\\","\"),CurrentlyRoot&"\","",1,1,1),"\","/"))&""" target=_blank>访问此页</a> <a href=""?filemanager=showfile&filepath="&tURLEncode(ThePath)&""" target=_blank>查看文件代码</a>"
			Else
				Temp=ThePath&"<br><a href=""?filemanager=showfile&filepath="&tURLEncode(ThePath)&""" target=_blank>查看文件代码</a>"
			End If
			If Request.Form("Search_Content")<>"" Then
				Set oFile=FSO.OpenTextFile(ThePath,1,false,-2)
				FileTxt=LCase(oFile.ReadAll())
				If InStr(FileTxt,LCase(Request.Form("Search_Content")))>0 Then
					Report=Report&"<tr><td>"&Temp&"</td><td>"&GetDateCreate(ThePath)&"</td><td>"&TheDate&"</td></tr>"
					Sun=Sun+1
					Exit Sub
				End If
				oFile.close()
				Set oFile=Nothing
			Else
				Report=Report&"<tr><td>"&Temp&"</td><td>"&GetDateCreate(ThePath)&"</td><td>"&TheDate&"</td></tr>"
				Sun=Sun+1
				Exit Sub
			End If
		End If
	Next
End Sub

Sub ShowAllFileQT(Path)
	If Not FSO.FolderExists(Path) Then Exit Sub
	Set f=FSO.GetFolder(Path)
	Set fc2=f.Files
	For Each MyFile In fc2
		On Error Resume Next
		TmpDot=InStrRev(Path&"\"&MyFile.Name,".")
		TmpBackSlash=InStrRev(Path&"\"&MyFile.Name,"\")
		TmpSlash=InStrRev(Path&"\"&MyFile.Name,"/")
		If TmpBackSlash>TmpDot Or TmpSlash>TmpDot Then
			TempFile=LCase(Path&"\"&MyFile.Name)
		Else
			TempFile=LCase(Left(Path&"\"&MyFile.Name,InStrRev(Path&"\"&MyFile.Name,".")-1))
		End If
		If InStr(TempFile,".asp")<>0 Or InStr(TempFile,".asa")<>0 Or InStr(TempFile,".cer")<>0 Or InStr(TempFile,".cdx")<>0 Then
			Call IsFindAsp(Path&"\"&MyFile.Name)
		End If
		SumFiles=SumFiles+1
	Next
	Set fc=f.SubFolders
	For Each f1 In fc
		ShowAllFileQT Path&"\"&f1.Name
		SumFolders=SumFolders+1
  Next
  Set fc=Nothing
  Set fc2=Nothing
  Set f=Nothing
End Sub
Sub IsFindAsp(ThePath)
	TheDate=GetDateModify(ThePath)
	On Error Resume Next
	If SearchType=1 Or InStr(Replace(LCase(ThePath),"\\","\"),LCase(WebSiteRoot))>0 Then
		Temp=ThePath&"<br><a href=""http://"&ServerName&ServerPort&"/"&tURLEncode(Replace(Replace(Replace(ThePath,"\\","\"),WebSiteRoot&"\","",1,1,1),"\","/"))&""" target=_blank>访问此页</a> <a href=""?filemanager=showfile&filepath="&tURLEncode(ThePath)&""" target=_blank>查看文件代码</a>"
	ElseIf SearchType=2 Or InStr(Replace(LCase(ThePath),"\\","\"),LCase(CurrentlyRoot))>0 Then
		Temp=ThePath&"<br><a href=""http://"&ServerName&ServerPort&Replace(URL,FileName,"")&tURLEncode(Replace(Replace(Replace(ThePath,"\\","\"),CurrentlyRoot&"\","",1,1,1),"\","/"))&""" target=_blank>访问此页</a> <a href=""?filemanager=showfile&filepath="&tURLEncode(ThePath)&""" target=_blank>查看文件代码</a>"
	Else
		Temp=ThePath&"<br><a href=""?filemanager=showfile&filepath="&tURLEncode(ThePath)&""" target=_blank>查看文件代码</a>"
	End If
	Report=Report&"<tr><td>"&Temp&"</td><td>"&GetDateCreate(ThePath)&"</td><td>"&TheDate&"</td></tr>"
	Sun=Sun+1
End Sub
Set FSO=Nothing
%>