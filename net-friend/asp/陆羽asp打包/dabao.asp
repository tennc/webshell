<%
Session.CodePage = 936
Server.ScriptTimeout = 999999999 '防止脚本超时
Response.Expires = -1
Response.ExpiresAbsolute = Now() - 1
Response.cachecontrol = "no-cache"
response.buffer = True
Const FileExt = ".rar" '打包后的扩展名 如果某些空间不支持RAR格式下载请设置成 html使用迅雷下回！
'并非真的Rar格式.请勿使用RAR解压再跑来问我！会被鄙视你的！
Const PassWord = "123456" '设定密码
Const Ver = "1.4.0"
%>
<%
Dim ScriptName
ScriptName=Request.ServerVariables("PATH_INFO")

Echo "<html>"
Echo "<head>"
Echo "<meta http-equiv=""Content-Type"" content=""text/html; charset=gb2312"">"
Echo "<meta http-equiv=""pragma"" content=""no-cache"">"
Echo "<title>ASPWebPack - 整站文件打包/恢复系统 "&Ver&"</title>"
Echo "<style>"
Echo ".navbar-text { BORDER-RIGHT: #999999 1px; BORDER-TOP: #999999 1px; PADDING-LEFT: 10px; FONT-SIZE: 26px; BACKGROUND-IMAGE: BORDER-LEFT: #999999 1px; COLOR: #ffffff; BORDER-BOTTOM: #999999 1px; BACKGROUND-REPEAT: no-repeat; FONT-FAMILY: 黑体;}"
Echo "BODY, TD { FONT-SIZE: 12px;line-height:20px;}"
Echo ".tab-on { BORDER-RIGHT: #cccccc 1px; PADDING-RIGHT: 2px; BORDER-TOP: #cccccc 1px solid; PADDING-LEFT: 2px; PADDING-BOTTOM: 2px; BORDER-LEFT: #cccccc 1px solid; WIDTH: 120px; CURSOR: pointer; COLOR: #000000; PADDING-TOP: 2px; BORDER-BOTTOM: #cccccc 1px; BACKGROUND-COLOR: #ffffff;}"
Echo ".tab-off { BORDER-RIGHT: #cccccc 1px; PADDING-RIGHT: 2px; BORDER-TOP: #cccccc 1px solid; PADDING-LEFT: 2px; PADDING-BOTTOM: 2px; BORDER-LEFT: #cccccc 1px solid; WIDTH: 120px; CURSOR: pointer; COLOR: #666666; PADDING-TOP: 2px; BORDER-BOTTOM: #cccccc 1px solid; BACKGROUND-COLOR: #F9F9FD;}"
Echo ".tab-none { BORDER-RIGHT: #cccccc 1px; PADDING-RIGHT: 2px; BORDER-TOP: #cccccc 1px; PADDING-LEFT: 2px; PADDING-BOTTOM: 2px; BORDER-LEFT: #cccccc 1px solid; PADDING-TOP: 2px; BORDER-BOTTOM: #cccccc 1px solid;}"
Echo ".tab-content { BORDER-RIGHT: #cccccc 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #cccccc 1px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; VERTICAL-ALIGN: top; BORDER-LEFT: #cccccc 1px solid; PADDING-TOP: 5px; BORDER-BOTTOM: #cccccc 1px solid; BACKGROUND-COLOR: #ffffff;}"
Echo ".Soft-content { BORDER-RIGHT: #cccccc 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #cccccc 1px solid; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; VERTICAL-ALIGN: top; BORDER-LEFT: #cccccc 1px solid; PADDING-TOP: 5px; BORDER-BOTTOM: #cccccc 1px solid; BACKGROUND-COLOR: #ffffff;}"
Echo ".hide-table { DISPLAY: none;}"
Echo ".show-table { DISPLAY: block;}"
Echo "li{width:100%; line-height:25px; text-overflow:ellipsis; white-space:nowrap; overflow:hidden;list-style:none;list-style-type:none;} "
Echo "input {color: #000000;background-color: #FFFFFF;border: 1px solid #CCCCCC;FONT-SIZE: 9pt;padding:2px;}"
Echo "</style>"
Echo "<script language=javascript>"
Echo "function switchCell(n, hash) {"
Echo "nc=document.getElementsByName(""navcell"");"
Echo "if(nc){"
Echo "t=document.getElementsByName(""tb"");"
Echo "for(i=0;i<nc.length;i++){"
Echo "nc.item(i).className=""tab-off"";"
Echo "t.item(i).className=""hide-table"";"
Echo "}"
Echo "nc.item(n-1).className=""tab-on"";"
Echo "t.item(n-1).className=""tab-content show-table"";"
Echo "}else if(navcell){"
Echo "for(i=0;i<navcell.length;i++){"
Echo "navcell[i].className=""tab-off"";"
Echo "tb[i].className=""hide-table"";"
Echo "}"
Echo "navcell[n-1].className=""tab-on"";"
Echo "tb[n-1].className=""tab-content show-table"";"
Echo "}"
Echo "if(hash){"
Echo "document.location=""#""+hash;"
Echo "}}"
Echo "</script>"
Echo "</head>"
Echo "<body>"

call sub_Main()

Echo "</body>"
Echo "</html>"

If Trim(Session(ScriptName))=Trim(PassWord) Then
 if Request("Down")<>"" Then
 if LCase(Right(Request("Down"),Len(FileExt)))=LCase(FileExt) Then
 Rem 文件流操作
 Set objStream = server.CreateObject("ADODB.Stream")
 objStream.Type = 1
 objStream.Open
 objStream.LoadFromFile Server.MapPath(Request("Down"))

 Response.Clear 
 Response.Buffer = True
 Response.ContentType = "application/octet-stream"
 Response.AddHeader "Content-Disposition","attachment; filename=" & Request("Down")
 Do While Not objStream.EOS
 Response.BinaryWrite objStream.Read(1024*64)
 Response.Flush
   If Not Response.IsClientConnected Then
       Exit Do 
   End If
 Loop
 objStream.Close
 Set objStream = Nothing
 Response.End
 end if
 end if

 Select Case Request("Action")
   Case "Pack"
     Call sub_Pack(request("Path"))
   Case "Recover"
     Call sub_Recover(request("Path"))
  Case "UPLoad"
   Call sub_UPLoad()
   Case "Delete"
     Call sub_Delete()
 End Select
End If

Sub sub_Main()
Echo "<table cellspacing=1 class=style1 cellpadding=1 width=400 align=center border=0>"
Echo "<tr>"
Echo "<td class=Soft-content>"

Call CheckPwd()

If Trim(Session(ScriptName))=Trim(PassWord) Then
 Select Case Request("Action")
   Case "Pack"
 Echo "<table width=""100%"">"
 Echo "<tr><td colspan=3 align=center>打包信息</td></tr>"
 Echo "<tr><td>打包文件：</td><td id=""PackFile"" colspan=2></td></tr>"
 Echo "<tr><td>打包进度：</td><td id=""Pro"">0%</td><td id=""FileNum"">0/0</td></tr>"
 Echo "<tr><td>正在打包：</td></tr>"
 Echo "<tr><td colspan=3><li id=""FileName""></li></td></tr>"
 Echo "<tr><td align=""right"" colspan=3><input type=""button"" value=""返回"" onclick=""document.location ='" & ScriptName & "';"" /></td></tr>"
 Echo "</table>"
 Echo vbcrlf
   Case "Recover"
 Echo "<table width=""100%"">"
 Echo "<tr><td colspan=3 align=center>解压信息</td></tr>"
 Echo "<tr><td>打包文件：</td><td id=""PackFile"" colspan=2></td></tr>"
 Echo "<tr><td>解压进度：</td><td id=""Pro"">0%</td><td id=""FileNum"">0/0</td></tr>"
 Echo "<tr><td>正在解压：</td></tr>"
 Echo "<tr><td colspan=3><li id=""FileName""></li></td></tr>"
 Echo "<tr><td align=""right"" colspan=3><input type=""button"" value=""返回"" onclick=""document.location ='" & ScriptName & "';"" /></td></tr>"
 Echo "</table>"
 Echo vbcrlf
   Case "Delete"
 Echo "<table width=""100%"">"
 Echo "<tr><td colspan=3 align=center>删除打包</td></tr>"
 Echo "<tr><td align=""right"" colspan=3><input type=""button"" value=""返回"" onclick=""document.location ='" & ScriptName & "';"" /></td></tr>"
 Echo "</table>"
 Echo vbcrlf
 Case "UPLoad"
 Echo "<table width=""100%"">"
 Echo "<tr><td colspan=3 align=center>正在上传文件</td></tr>"
 Echo "<tr><td align=""right"" colspan=3><input type=""button"" value=""返回"" onclick=""document.location ='" & ScriptName & "';"" /></td></tr>"
 Echo "</table>"
 Echo vbcrlf
   case Else
   Call sub_putMain()
 End Select
 Echo "<script language=""javascript"" >"
 Echo "var fn=document.all(""PackFile"");"
 Echo "var f=document.all(""FileName"");"
 Echo "var p=document.all(""Pro"");"
 Echo "var n=document.all(""FileNum"");"
 Echo "</script>"
 Echo vbcrlf
End If
Echo "</td> </tr>"
Echo "</table>"

End Sub

Sub CheckPWD()
If Request("PassWord")<>"" Then
  Session(ScriptName) = Trim(Request("PassWord"))
End If
If Trim(Session(ScriptName))<>Trim(PassWord) Then
 Echo "<table class=Soft-content cellspacing=5 cellpadding=0 width=100% align=center border=0 name=tb>"
 Echo "<tr>"
 Echo "<td class=td_heading valign=top>"
 Echo "<table width=100% border=0 align=center cellpadding=0 cellspacing=0>"
 Echo "<form id=Frm_Enter name=Frm_Enter method=post action=""" & ScriptName &""">"
 Echo "<input type=hidden name=Action value=Enter />"
 Echo "<tr>"
 Echo "<td height=32>PassWord：</td>"
 Echo "<td>"
 Echo "<input type=password name=PassWord value=""" & Session(ScriptName) & """ /></td>"
 Echo "<td><input type=submit value=Enter /></td>"
 Echo "</tr>"
 Echo "</form>"
 Echo "</table>"
 Echo "</td>"
 Echo "</tr>"
 Echo "</table>"
End If
End Sub

sub sub_putMain()
 Echo "<table cellspacing=0 cellpadding=0 width=100% align=center border=0>"
 Echo "<tr>"
 Echo "<td class=tab-on id=navcell onclick=switchCell(1) name=navcell align=center>打包数据</td>"
 Echo "<td class=tab-off id=navcell onclick=switchCell(2) name=navcell align=center>恢复数据</td>"
 Echo "<td class=""tab-off"" id=""navcell"" onclick=""switchCell(3)"" name=""navcell"" align=center>打包管理</td>"
 Echo "<td class=""tab-off"" id=""navcell"" onclick=""switchCell(4)"" name=""navcell"" align=center>关于软件</td>"
 Echo "<td class=""tab-none"">&nbsp;</td>"
 Echo "</tr>"
 Echo "</table>"
 Echo "<table class=tab-content id=tb cellspacing=5 cellpadding=0 width=100% align=center border=0 name=tb>"
 Echo "<tr>"
 Echo "<td class=td_heading valign=top>"
 Echo "<table width=100% border=0 align=center cellpadding=0 cellspacing=0>"
 Echo "<form id=Frm_Pack name=Frm_Pack method=post action=""" & ScriptName & """>"
 Echo "<input type=hidden name=Action value=Pack />"
 Echo "<tr>"
 Echo "<td height=32>操作物理路径：</td>"
 Echo "<td>"
 Echo "<input size=40 type=text name=Path value="""&server.MapPath("/")&""" /></td>"
 Echo "</tr>"
 Echo "<tr>"
 Echo "<td height=32>当前物理路径：</td>"
 Echo "<td>"&server.MapPath("./")&"</td>"
 Echo "</tr>"
 Echo "<tr>"
 Echo "<td height=32>要过滤的格式：</td>"
 Echo "<td>"
 Echo "<input size=40 type=text name=OutExt value=""rar,zip,iso,mp3"" /></td>"
 Echo "</tr>"
 Echo "<tr>"
 Echo "<td height=32>只下载的格式：</td>"
 Echo "<td>"
 Echo "<input size=40 type=text name=OnlyExt value="""" /></td>"
 Echo "</tr>"
 Echo "<tr>"
 Echo "<td height=32>限制文件大小(k)：</td>"
 Echo "<td>"
 Echo "<input size=40 type=text name=MaxSize value=""1000"" /></td>"
 Echo "</tr>"
 Echo "<tr>"
 Echo "<td height=32>压缩包文件名：</td>"
 Echo "<td>"
 Echo "<input size=28 type=text name=FileName value="&request.ServerVariables("HTTP_HOST")&" />&nbsp;&nbsp;"
 Echo "<a onclick=sztime() href=#><font color=#0000ff>按时间改名</font></a>"
 Echo "</td>"
 Echo "</tr>"
 Echo "<tr>"
 Echo "<td height=32 align=center colspan=2>"
 Echo "<input type=submit name=Submit value=打包数据 /></td>"
 Echo "</tr>"
 Echo "</form>"
 Echo "</table>"
 Echo "<script language=""javascript"">"
 Echo "function sztime(i){"
 Echo "var Digital=new Date();"
 Echo "var year=Digital.getYear();"
 Echo "var month=Digital.getMonth();"
 Echo "var date=Digital.getDate();"
 Echo "var hours=Digital.getHours();"
 Echo "var minutes=Digital.getMinutes();"
 Echo "var seconds=Digital.getSeconds();"
 Echo "document.Frm_Pack.FileName.value=""""+year+""-""+(month+1)+""-""+date+""(""+hours+minutes+seconds+"")"";"
 Echo "}"
 Echo "</script>"
 Echo "<!--数据打包--></td>"
 Echo "</tr>"
Echo "</table>"
Echo "<table class=hide-table id=tb cellspacing=5 cellpadding=0 width=100% align=center border=0 name=tb>"
Echo "<tr>"
Echo "<td class=td_heading valign=top>"
Echo "<table width=100% border=0 align=center cellpadding=0 cellspacing=0>"
Echo "<form id=Frm_Recover name=Frm_Recover onsubmit=""return confirm('原文件将会被覆盖,确实要解压该文件到指定目录？')"" method=post action="""&ScriptName&""">"
Echo "<input type=hidden name=Action value=Recover />"
Echo "<tr>"
Echo "<td height=32>操作物理路径：</td>"
Echo "<td>"
Echo "<input size=40 type=text name=Path value="""&server.MapPath("/")&""" /></td>"
Echo "</tr>"
Echo "<tr>"
Echo "<td height=32>当前物理路径：</td>"
Echo "<td>"&server.MapPath("./")&"</td>"
Echo "</tr>"
Echo "<tr>"
Echo "<td height=32>压缩包文件名：</td>"
Echo "<td><select name=FileName>"&GetFileList("./")&"</select></td>"
Echo "</tr>"
Echo "<tr>"
Echo "<td height=32 align=center colspan=2>"
Echo "<input type=submit name=Submit value=恢复数据 /></td>"
Echo "</tr>"
Echo "</form>"
Echo "</table>"
Echo "<!-- 恢复数据 --></td>"
Echo "</tr>"
 Echo "</td>"
 Echo "</tr>"
 Echo "</table>"
 Echo "<table class=hide-table id=tb cellspacing=5 cellpadding=0 width=100% align=center border=0 name=tb>"
 Echo "<tr>"
 Echo "<td class=td_heading valign=top>"
 Echo "<table width=100% border=0 align=center cellpadding=0 cellspacing=0>"
 Echo "<form id=Frm_Delete name=Frm_Delete onsubmit=""return confirm('确认要删除文件？')"" method=post action='" & ScriptName & "'>"
 Echo "<input type=hidden name=Action value=Delete />"
 Echo "<tr><td height=32>压缩包文件名：</td></tr>"
 Echo "<tr><td height=32><select style=width: 100% name=FileName>" & GetFileList("./") & "</select> </td></tr>"
 Echo "<tr><td height=32>&nbsp;</td></tr>"
 Echo "<tr><td height=32 align=center colspan=2>"
 Echo "<input type=submit name=Submit value=删除数据 />&nbsp;"
 Echo "<input type=button name=Submit onclick=""document.location =&#039;" & ScriptName &"?down=&#039;+document.Frm_Delete.all(&#039;FileName&#039;).value;"" value=下载数据 /></td>"
 Echo "</tr>"
 Echo "</form>"
 Echo "</table>"
 Echo "</td>"
 Echo "</tr>"
 Echo "</table>"
 Echo "<table class=hide-table id=tb cellspacing=5 cellpadding=0 width=100% align=center border=0 name=tb>"
 Echo "<tr>"
 Echo "<td class=td_heading valign=top>"
 Echo "<div align=center><b>ASPWebPack - 整站文件打包/恢复系统 "&Ver&"</b></div>"
 Echo "<br />"
 Echo "<div>拥有了 ASPWebPack，上传更新网站，您只需一步即可完成。</div>"
 Echo "<div>原创作者：Cool-Co [YuLv] 联系方法：QQ:1240041</div>"
 Echo "<div>程序改进：陆羽</div>"
 Echo "<div>我的Blog：<a href=http://www.5luyu.cn target=""_blank"">http://www.5luyu.cn</a></div>"
 Echo "<div>程序版本："&Ver&" </div>"
 Echo "<br/>" 
 Echo "<div>组件支持情况检测</div>"
 Echo "<div>"
 on error resume next
 err.clear
 Call Server.CreateObject("Scripting.Dictionary")
 Echo "Scripting.Dictionary:&nbsp;"
 if Err Then
 Echo "<font color='red'><b>×</b></font>"
 else
 Echo "<font color='green'><b>√</b></font>" 
 End if 
 Echo "<br/>" 
 err.clear
    Call Server.CreateObject("Scripting.FileSystemObject")
 Echo "Scripting.FileSystemObject:&nbsp;"
 if Err Then
 Echo "<font color='red'><b>×</b></font>"
 else
 Echo "<font color='green'><b>√</b></font>" 
 End if 
 Echo "<br/>" 
 err.clear
 Call server.CreateObject("ADODB.Stream")
 Echo "ADODB.Stream:&nbsp;"
 if Err Then
 Echo "<font color='red'><b>×</b></font>"
 else
 Echo "<font color='green'><b>√</b></font>" 
 End if 
 'Echo "<br/>" 
 err.clear
 on error goto 0
 Echo "</div>"
 Echo "<br />更新内容："
 Echo "<div>修正文件类型过滤忘记调用的问题！</div>"
 Echo "<div>提供本地VBS解压程序,省去本地IIS环境！(感谢lcx大牛)</div>"
 Echo "<div>解决了之前提示cint错误文件大小超过int类型限制,改用ccur！</div>"
 Echo "<div>添加只下载的格式支持,当只要下载一种或几种格式的时候输入！</div>"
 Echo "<div>输入只下载格式后,原有限制格式框输入的内容自动失效！</div>"
 Echo "<br />"
 Echo "</td>"
 Echo "</tr>"
 Echo "</table>"
end sub

Rem ##########################
Rem # 打包文件
Rem ##########################
Sub sub_Pack(byVal sPath)
  Response.Flush
 Dim FileName 
  filename = Request("FileName")
  If sPath = "" Then
    Echo("<script>alert('请输入路径！');</script>")
    response.End()
  End If
  If filename = "" Then
    Echo("<script>alert('请输入文件名！');</script>")
    response.End()
  End If
  if LCase(Right(FileName,Len(FileExt)))<>LCase(FileExt) Then
   FileName = FileName & LCase(FileExt)
  End If
 Echo "<script language=""javascript"" >"
 Echo "fn.innerText='" & Replace(Server.MapPath(filename),"\","\\") & "';"
 Echo "</script>"
  Dim r
  Set r = New CCPack
  r.rootpath = sPath
  r.AddDir sPath
  r.packname = Server.MapPath(filename)
  r.Pack
  if err then
   Response.clear
   Echo("<script>alert('" & Err.Description & "');</script>")
   Response.End
 end if
  Set r = Nothing
  Echo("<script>alert('打包数据成功！');</script>")
End Sub

Rem ##########################
Rem # 解压打包
Rem ##########################
Sub sub_Recover(ByVal sPath)
  Response.Flush
 Dim FileName 
  filename = Request("FileName")
  If sPath = "" Then
    Echo("<script>alert('请输入路径！');history.back(-1);</script>")
    response.End()
  End If
  If filename = "" Then
    Echo("<script>alert('请选择压缩包文件名！');history.back(-1);</script>")
    response.End()
  End If
  Echo "<script language=""javascript"" >"
 Echo "fn.innerText='" & Replace(Server.MapPath(filename),"\","\\") & "';"
 Echo "</script>"

  Dim fso
  Set fso = Server.CreateObject("Scripting.FileSystemObject")
  If Not fso.FileExists(Server.MapPath(filename)) Then
    Echo("<script>alert('此压缩包文件名不存在！');history.back(-1);</script>")
    response.End()
  End If
  Set fso = Nothing

  Dim r
  Set r = New CCPack
  r.rootpath = sPath 
  r.packname = Server.MapPath(filename)
  r.UnPack
  Echo(Err.Description)
  Set r = Nothing
  Echo("<script>alert('恢复数据成功！');</script>")
End Sub

Rem ##########################
Rem # 删除打包文件
Rem ##########################
Sub sub_Delete()
  Response.Flush
 Dim FileName 
  filename = Request("FileName")
  If filename = "" Then
    Echo("<script>alert('请输入文件名！');history.back(-1);</script>")
    response.End()
  End If
  if LCase(Right(FileName,Len(FileExt)))<>LCase(FileExt) Then
   FileName = FileName & LCase(FileExt)
  End If
  Call DeleteFile(filename)
  Echo("<script>alert('打包文件删除成功！');</script>")
End Sub


Rem ##########################
Rem # 取得文件列表 For Select
Rem ##########################
function GetFileList(byVal sPath)
 Dim fso, f, fc
 Set fso = Server.CreateObject("Scripting.FileSystemObject")
 Set f = fso.GetFolder(server.MapPath(sPath))
 For Each fc in f.Files
 if Right(lcase(fc.Name),Len(FileExt))=lCase(FileExt) then
   GetFileList = GetFileList & "<option value="""&fc.Name&""" >"&fc.Name&"</option>"
   end if
 Next
 if len(GetFileList)=0 Then
 GetFileList = GetFileList & "<option value="""" selected=""selected"" >没有文件</option>"
 End If
 Set fc = Nothing
 Set f = Nothing
 Set fso = Nothing
end function

Function Init(byval rootpath)
  Set fso = Server.CreateObject("Scripting.FileSystemObject")
  If Not fso.FolderExists(rootpath) Then
    fso.CreateFolder(rootpath)
  End If
  Set fso = Nothing
End Function

'==================================================
'过程名：DeleteFile
'作 用：删除文件
'参 数：Url ------ 远程文件URL
'==================================================
Function DeleteFile(Byval url)
  Dim fso
  Set fso = CreateObject("Scripting.FileSystemObject")
  If (fso.FileExists(server.MapPath(url))) Then
    fso.DeleteFile(server.MapPath(url))
  End If
  Set fso = Nothing
End Function

Sub echo(s)
 Response.Write(s&vbcrlf)
End Sub
'==================================================
'类 名：CCPack
'作 用：asp打包类
'来 源：CSDN
'修 改：Cool-Co
'说 明: Unicode版
'==================================================
Class CCPack
  Dim Files, packname, rootpath, fso, NotExt

  Private Sub Class_Initialize
    Randomize
    Dim ranNum
    ranNum = Int(90000 * Rnd) + 10000
    packname = Year(Now)&Month(Now)&Day(Now)&Hour(Now)&Minute(Now)&Second(Now)&ranNum&".asp"&Year(Now)
    rootpath = Server.MapPath("./")
    Set Files = server.CreateObject("Scripting.Dictionary")
    Set fso = Server.CreateObject("Scripting.FileSystemObject")
  End Sub

  Private Sub Class_Terminate
    Set fso = Nothing
    Set Files =Nothing
  End Sub

  '添加该文件夹下的所有文件夹及文件
  Public Sub AddDir(byval obj)
    Dim f, subf
    If fso.FolderExists(obj) Then
      Set f = fso.GetFolder(obj)
      '添加本文件夹
      Add(f.Path)
      '遍历子文件夹
      For Each subf in f.SubFolders
        AddDir(subf.Path)
      Next
      Set subf = Nothing
      Set f = Nothing
    End If
  End Sub
  '判断要过滤的扩展名
  Public Function CheckExt(byval obj)
  OnlyExt=Request("OnlyExt")
  if OnlyExt<>"" then
  TempPath=split(OnlyExt,",")
  For i=0 to Ubound(TempPath)
  if mid(obj,InStrRev(obj, ".")+1)<>TempPath(i) then
  CheckExt=false
  else
  CheckExt=true
  exit for 
  end if
  Next
  else
  TempPath=split(Request("OutExt"),",")
  For i=0 to Ubound(TempPath)
  if mid(obj,InStrRev(obj, ".")+1)<>TempPath(i) then
  CheckExt=true
  else
  CheckExt=false
  exit for 
  end if
  Next
  end if
  End Function
  '判断文件大小是否超出范围
  Public Function CheckSize(byval obj)
  MaxFileSize=int(Request("MaxSize"))
  if ccur(obj/1024)>MaxFileSize then
  CheckSize=false
  else
  CheckSize=true
  end if
  End Function
  '添加单个文件或单个文件夹及该文件夹下的所有文件
  Public Sub Add(byval obj)
    Dim f, fc
    If fso.FileExists(obj) Then
      Set f = fso.GetFile(obj)
      Files.Add obj, f.Size
    ElseIf fso.FolderExists(obj) Then
      Files.Add obj, -1
      Set f = fso.GetFolder(obj)
      For Each fc in f.Files
        If CheckSize(fc.Size) and CheckExt(fc.Name) then
        Add(fc.Path)
        end if
      Next
      Set fc = Nothing
      Set f = Nothing
    End If
  End Sub

  '打包
  Public Sub Pack()
    Dim Str, ObjPack, ObjRead, a, b, buf,bf,FileDB,FDBLen
    Set ObjPack= server.CreateObject("ADODB.Stream")    
    Set ObjRead= server.CreateObject("ADODB.Stream")
    ObjPack.Open    
    ObjRead.Open
    ObjPack.Type = 1
    ObjRead.Type = 1
    a = Files.Keys
    b = Files.Items
    bf=((Files.Count) +1)/100
    For i = 0 To Files.Count -1

 If b(i)> 0 Then
 ObjPack.LoadFromFile(a(i))
 If Not ObjPack.EOS Then ObjRead.Write(ObjPack.Read)
 End If
 If b(i) = -1 Then a(i)=a(i) & "\"
 a(i) = replace(a(i),rootpath,"\",1,-1,1) 
 a(i) = replace(a(i),"\\","\",1,-1,1) 
 FileDB = FileDB & b(i) & ">" & a(i) & "*"

 Echo "<script language=""javascript"" >"
     Echo "f.innerText='" & Replace(a(i),"\","\\") & "';"
     Echo "p.innerText='" & clng(i / bf) & "%';"
     Echo "n.innerText='" & (i+1) & "/" & Files.Count & "';"
     Echo "</script>"
     Response.Flush
     Rem 用户终止
     If Not Response.IsClientConnected Then Exit For
Next
 FDBLen = LenB(FileDB)
    Str = CStr(Strright("000000000" & FDBLen, 10)) & FileDB
    buf = TextToStream(Str)
    ObjPack.Position = 0
 ObjPack.Write buf 
    ObjRead.Position = 0
    Do While Not ObjRead.EOS
     ObjPack.Write ObjRead.Read(1024*64)
     Rem 用户终止
     If Not Response.IsClientConnected Then Exit Do 
    Loop
    ObjPack.SetEOS
    ObjPack.SaveToFile(packname), 2
    Set buf = Nothing
    Set ObjRead= Nothing
    Set ObjPack= Nothing
  End Sub

  '解压
  Public Sub UnPack
    Dim Size, ObjPack, ObjWrite, arr, i, buf,bf
    If Not fso.FolderExists(rootpath) Then
      fso.CreateFolder(rootpath)
    End If
    Set ObjPack = server.CreateObject("ADODB.Stream")
    Set ObjWrite= server.CreateObject("ADODB.Stream")
    ObjPack.Open    
    ObjWrite.Open
    ObjPack.Type = 1
    ObjWrite.Type = 1
    '转换文件大小
    ObjPack.LoadFromFile(packname)
    ObjPack.Position=0
    if not IsNumeric(StreamToText(ObjPack.Read(22))) then
     Echo("<script>alert('文件格式不正确,系统无法解压！');</script>")
     response.End
    Else
     ObjPack.Position=0
    End if
    Size = Clng(StreamToText(ObjPack.Read(22)))
    arr = Split(StreamToText(ObjPack.Read(Size)), "*")
    bf=( (UBound(arr)) +1)/100
    For i = 0 To UBound(arr) -1
      arrFile = Split(arr(i), ">")
      If arrFile(0) < 0 Then
        myfind(rootpath&arrFile(1))'确保文件存在
      ElseIf arrFile(0) >= 0 Then
        ObjWrite.Position = 0
        buf = ObjPack.Read(arrFile(0))
        If Not IsNull(buf) Then ObjWrite.Write(buf)
        ObjWrite.SetEOS
        ObjWrite.SaveToFile(rootpath&arrFile(1)), 2
      End If
      Echo "<script>"
     Echo "f.innerText='" & Replace(rootpath & arrFile(1),"\","\\") & "';"
     Echo "p.innerText='" & clng(i / bf) & "%';"
     Echo "n.innerText='" & (i+1) & "/" & UBound(arr) & "';"
     Echo "</script>"
    Echo vbcrlf
     Response.Flush
     Rem 用户终止
     If Not Response.IsClientConnected Then Exit for
    Next
    Set buf = Nothing
    Set ObjWrite = Nothing
    Set ObjPack = Nothing
  End Sub

  'Stream Text 互换
  Public Function StreamToText(byval stream)
    Dim sm
    If IsNull(stream) Then
      StreamToText = ""
    Else
      Set sm = server.CreateObject("ADODB.Stream")
      sm.Open
      sm.Type = 1
      sm.Write(stream)
      sm.Position = 0
      sm.Type = 2
      sm.Position = 0
      StreamToText = sm.ReadText()
      sm.Close
      Set sm = Nothing
    End If
  End Function

  Public Function TextToStream(byval text)
    Dim sm
    If text = "" Then
      TextToStream = "" '空流
    Else
      Set sm = server.CreateObject("ADODB.Stream")
      sm.Open
      sm.Type = 2
      sm.WriteText(text)
      sm.Position = 0
      sm.Type = 1
      sm.Position = 0
      TextToStream = sm.Read
      sm.Close
      Set sm = Nothing
    End If
  End Function

  '解压时 确保文件夹存在myfind，myfso
  Function myfso(byval Path)
    Dim f
    If Not fso.FolderExists(Path) Then
      Set f = fso.CreateFolder(Path)
    End If
    Set f = Nothing
  End Function

  Function myfind(byval Path)
    Dim paths, subpath, i
    '在目录后加(\)
    If Right(Path, 1)<>"\" Then Path = Path&"\"
    Path = Replace(Replace(Path, "/", "\"), "\\", "\")
    paths = Split(Path, "\")
    For i = 0 To UBound(paths) -1
      subpath = subpath & paths(i) & "\"
      If CStr(Left(subpath, Len(rootpath))) = CStr(rootpath) Then
        myfso(subpath)
      End If
    Next
  End Function

  Function Strright(byval Str, byval L)
    Dim Temp_Str, I, Test_Str
    Temp_Str = Len(Str)
    For i = Temp_Str To 1 step -1
      Test_Str = (Mid(Str, I, 1))
      Strright = Test_Str&Strright
      If Asc(Test_Str)>0 Then
        lens = lens + 1
      Else
        lens = lens + 2
      End If
      If lens>= L Then Exit For
    Next
  End Function
  function iif(expression,returntrue,returnfalse)
 if expression=0 then
 iif=returnfalse
 else
 iif=returntrue
 end if
  end function
End Class
%>