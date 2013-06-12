<%@ page contentType="text/html;charset=gb2312"%>
<%@ page import="java.lang.*"%>
<%@ page import="java.sql.*"%>
<%@ page import="java.util.*"%>
<%@ page import="java.io.*"%>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=gb2312">
<title>xxx</title>
<style type="text/css">
body,td{font-size: 12px;}
body{margin-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;}
td{white-space:nowrap;}
a{color:black;text-decoration:none;}
</style>
</head>
<body>
<body>
<table border=1>
<tr>
<td>1</td><td>2</td><td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td>
</tr>
<%Class.forName("oracle.jdbc.driver.OracleDriver").newInstance();
String url="jdbc:oracle:thin:@localhost:1521:orcl";
String user="oracle_admin";
String password="oracle_password";
Connection conn= DriverManager.getConnection(url,user,password);
Statement stmt=conn.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE,ResultSet.CONCUR_UPDATABLE);
String sql="SELECT 1,2,3,4,5,6,7,8,9,10 from user_info";
ResultSet rs=stmt.executeQuery(sql);
while(rs.next()) {%>
<tr>
<td><%=rs.getString(1)%></td>
<td><%=rs.getString(2)%></td>
<td><%=rs.getString(3)%></td>
<td><%=rs.getString(4)%></td>
<td><%=rs.getString(5)%></td>
<td><%=rs.getString(6)%></td>
<td><%=rs.getString(7)%></td>
<td><%=rs.getString(8)%></td>
<td><%=rs.getString(9)%></td>
<td><%=rs.getString(10)%></td>
</tr>
<%}%>
<%rs.close();
stmt.close();
conn.close();
%>
</body>
</html>