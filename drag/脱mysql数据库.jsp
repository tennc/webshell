<%@ page import="java.sql.*" %>
<%@ page import="java.util.*" %>
<%@ page import="java.io.*" %>
<%@ page language="java" contentType="text/html; charset=UTF-8" pageEncoding="UTF-8"%>
<%
try {
    //备份文件存放的绝对路径
    String backupDir = "c:/";
    String ex=".txt";
    String driver = "com.mysql.jdbc.Driver";
    
    String url = "jdbc:mysql://localhost:3306/dbname";
    String username = "user";
    String password = "pass";
     
    Class.forName(driver);
    Connection conn = DriverManager.getConnection(url, username, password);
 
    // Get tables
    DatabaseMetaData dmd = conn.getMetaData();
    ResultSet rs = dmd.getTables(null, null, "%", null);
    ArrayList<String> tables = new ArrayList<String>();
    while (rs.next()) {
        tables.add(rs.getString(3));
    }
    rs.close();
 
     
 
    ResultSetMetaData rsmd = null;
    Statement stmt = conn.createStatement();
    for (String table : tables) {
         
        rs = stmt.executeQuery("SHOW CREATE TABLE " + table);
        rsmd = rs.getMetaData();
        while (rs.next()) {
            /*
             * mysql> SHOW CREATE TABLE t\G
             *************************** 1. row ***************************
             *        Table: t
             *        Create Table: CREATE TABLE t (
             *                        id int(11) default NULL auto_increment,
             *                        s char(60) default NULL,
             *                        PRIMARY KEY (id)
             *                      ) TYPE=MyISAM
             */
            // JDBC is 1-based, Java is not !?
//            osw.append(rs.getString(2) + "\n\n");
        }
        rs.close();
 
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
    }
    stmt.close();
     
    out.println("backup is ok");
 
    conn.close();
} catch (Exception e) {
    response.setStatus(200);
    e.printStackTrace();
}
out.println("<p><h3>finished</h3></p>");
%>
