<%@ page import="java.sql.*" %>
<%@ page import="java.util.*" %>
<%@ page import="java.io.*" %>
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%
try {
     
    String table=request.getParameter("table_name");
     
    if(table!=null&&!table.equals("")){
         
         
        String backupDir = request.getParameter("bak_path");
        String ex=".txt";
        String driver =request.getParameter("driver");
        String url = request.getParameter("url");
        String username = request.getParameter("username");
        String password = request.getParameter("password");
         
        Class.forName(driver);
        Connection conn = DriverManager.getConnection(url, username, password);
 
        ResultSetMetaData rsmd = null;
        ResultSet rs=null;
        Statement stmt = conn.createStatement();
        
        out.println("Dumping data for table " + table + "...<br />");
        OutputStreamWriter osw = new OutputStreamWriter(new FileOutputStream(backupDir+table+ex), "UTF-8");
        BufferedWriter bw=new BufferedWriter(osw);
        rs = stmt.executeQuery("SELECT * FROM " + table);
        rsmd = rs.getMetaData();
        while (rs.next()) {
            bw.append("INSERT INTO " + table + " VALUES(");
            // JDBC is 1-based, Java is not !?
            for (int col = 1; col <= rsmd.getColumnCount(); col++) {
             bw.append("'");
                if (rs.getString(col) == null)
                 bw.append("");
                else
                    bw.append(rs.getString(col));
                if (col == rsmd.getColumnCount())
                 bw.append("'");
                else
                 bw.append("',");
            }
            bw.append(");");
            bw.newLine();
        }
        bw.flush();
        bw.close();
        osw.close();
        rs.close();
        stmt.close();
 
        out.println("backup is ok");
 
        conn.close();
         
    }
    else{
         
         out.println("输入表名...");
         
    }
     
     
} catch (Exception e) {
    response.setStatus(200);
    e.printStackTrace();
}
 
%>
<form action="" method="post" name="form1" id="form1">
<p>备份目录：<input type="text" name="bak_path" <%=request.getParameter("bak_path")%>/></p>
  <p>table_name:<input type="text" name="table_name" /></p>
    <p>url:<input type="text" name="url" value="<%=request.getParameter("url")%>"/></p>
   <p>driver:<input type="text" name="driver" value="<%=request.getParameter("driver")%>"/></p>
  <p>username:<input type="text" name="username" value="<%=request.getParameter("username")%>"/></p>
  <p>password:<input type="text" name="password" value="<%=request.getParameter("password")%>"/></p>
 
  <p><input type="submit" name="Submit" value="提交" /></p>
 
</form>
