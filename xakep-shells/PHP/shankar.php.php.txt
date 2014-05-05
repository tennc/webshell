<?php

        ##############################################################
        # Simple PHP Mysql client (c) ShAnKaR (Updated on 28.11.2007)#
        ##############################################################

@set_time_limit(0);


if(get_magic_quotes_gpc()){
while(list($key,$val)=each($_POST)){
$_POST[$key]=stripslashes($val);}}

$far=array('f','gz','bz','.txt','.gz','.bz2');


//--------------------------

$text="\$etext=\"<html><head><title>Simple PHP Mysql client</title></head>
\n<body bgcolor=#C2DDFF><form method='POST' enctype=multipart/form-data><div style='width:100%;background-color:#A8B8F1;'>\n";

$a=array('srv','user','pass','db');$i=-1;
while($i++<3){
$text.="<input type='text' size=18 name='".$a[$i]."' value='".((!empty($_POST[$a[$i]]))?'{$_POST[$a['.$i.']]}':(($i==0)?'localhost':null))."'>\n";}

$text.="<input type='submit' name='sql' value=' SQL '>\n<b>No Display:</b>
<input type=checkbox name='dd' ".(isset($_POST['dd'])?'checked':'').">DB<input type=checkbox name='dt' ".(isset($_POST['dt'])?'checked':'').">Tables&nbsp;&nbsp;&nbsp;&nbsp;\".(isset(\$version)?'<font style=\'font-style:italic;font-variant:small-caps;font-weight:bolder;\' >'.\$version[0].'</font>':'').\"</div><a href='http://shankar.name/sql.phps' title='simple PHP Mysql client' style='position:fixed;right:0;font-size:7pt;color:red;font-weight:bold;' target='_blank' >S<br>i<br>m<br>p<br>l<br>e<br> <br>P<br>H<br>P<br> <br>M<br>y<br>s<br>q<br>l<br> <br>c<br>l<br>i<br>e<br>n<br>t<br></a>\"";



if(isset($_POST['sql'])){

if(isset($_POST['user']))$user=$_POST['user'];
if(isset($_POST['pass']))$password=$_POST['pass'];

if(isset($_POST['srv'])){
$server=$_POST['srv'];

$connect=@mysql_connect($server,$user,$password) or die(eval($text.";echo \$etext.\"</form>not connect\";"));}

else{die(eval($text.";echo \$etext.\"</form>\";"));}

$version=mysql_fetch_row(mysql_query('SELECT version()'));

if(!empty($_POST['db'])){@mysql_select_db($_POST['db'])or die(eval($text.";echo \$etext.\"</form>Could not select db<br>\";"));}


if(empty($_POST['table_sel']) && !empty($_POST['table_sel2']))$_POST['table_sel']=$_POST['table_sel2'];


function select(){
global $connect;


if(isset($_POST['table_sel2']) && $_POST['table_sel']!=$_POST['table_sel2']){$_POST['sort']=null;$_POST['br_st']=null;}
$sort=(!empty($_POST['sort'])?'ORDER BY `'.trim($_POST['sort']).'` '.(($_POST['asc']==='asc')?'ASC':'DESC').' ':'');

$co=((isset($_POST['br_st']) && isset($_POST['br_en']) && isset($_POST['brow']))?$_POST['br_en'].','.$_POST['br_st']:'0,20');



$_POST['querysql']=((!empty($_POST['querysql']) && isset($_POST['push']))?$_POST['querysql']:"SELECT * FROM `".$_POST['table_sel']."` $sort limit $co");



$result=@mysql_query($_POST['querysql'],$connect) or print("<input type=submit name=push value=Run><br><textarea cols=70% rows=8 name='querysql'>".$_POST['querysql']."</textarea><br>");

if(is_resource($result)){
$meta=mysql_fetch_field($result);
$tables=$meta->table;
$tr=0;
if($tables==true){

$tr=1;
if($quer=mysql_query("select count(*) from $tables"))$n=mysql_fetch_array($quer);
else $tr=2;

}

else{

$_POST['table_sel']=$tables;
if($tr==1)$n=mysql_fetch_row(mysql_query('select count(*) from '.$_POST['table_sel']));


}

if($tr>0){
print($tr==1)?"<input type=hidden name='table_sel2' value='$tables'>":'';
$arr=array();
for ($i=0;$i<mysql_num_fields($result); $i++){
if(ereg('primary_key',mysql_field_flags($result,$i)))
$arr[]=mysql_field_name($result,$i);}
}


$up_e='';

echo "<div style='width:100%;height:440px;overflow:auto;'><table border=1>";


$fields=@mysql_list_fields($_POST['db'],$tables,$connect);
$coms=@mysql_num_fields($fields);
if($coms>0){
echo "<tr bgcolor='#A8B8F1'>\n<td width=21></td>";
for($i=0;$i<$coms;$i++){
$lk=mysql_field_name($fields, $i);
print((count($arr)>0 && array_search($lk,$arr)!==false)?"<td><u><b>$lk</b></u></td>":"<td>$lk</td>\n");
}}

while($line=mysql_fetch_assoc($result)){
$linet=$line;
if($tr>0){
if(count($arr)==0){
while(list($key,$val)=each($line)){$up_e.="`$key`='".addslashes($val)."' and ";}
$up_e=substr($up_e,0,-5);}

else{
while(list($key,$val)=each($line)){
if(array_search($key,$arr)!==false){$up_e.="`$key`='".addslashes($val)."' and ";}}
$up_e=substr($up_e,0,-4);
}

$up_e=urlencode($up_e);

print "</tr><tr><td bgcolor='#C1D2C5'>".(($tr==1)?"<input type=radio name=edit value='$up_e'>":'&nbsp;&nbsp;')."</td>\n";
}
else echo "<tr>\n";


$up_e='';

foreach($line as $col_value){
echo "<td>".((strlen($col_value)>40)?'<textarea cols=40 rows=7>'.htmlspecialchars($col_value).'</textarea>':htmlspecialchars($col_value))."</td>\n";
}

echo "</tr>\n";}

echo "</table></div>";
if($tr==1){
echo "<div style='width:100%;background-color:#dfdfdf;'><input type=submit name='brow' value='Browse'><b>&nbsp;Sort by
<select name=sort><option value=''></option>";

foreach(array_keys($linet) as $lkk){
print "<option value='$lkk'".((isset($_POST['sort']) && $_POST['sort']===$lkk)?' selected':'').">$lkk</option>\n";}

echo "</select><select name='asc'><option value='asc'>ASC</option><option value='desc'".((isset($_POST['asc']) && $_POST['asc']==='desc')?' selected':'').">DESC</option></select>
Show<input type=text size=5 value=".((isset($_POST['br_st']) && isset($_POST['brow']))?$_POST['br_st']:$n[0])." name='br_st'>row(s) start from<input type=text size=5 value=".((isset($_POST['br_en']))?$_POST['br_en']:'0')." name='br_en'></b>
<input type=submit name=editr value=Edit><input type=submit name='dell' value=Delete></div>";

}
mysql_free_result($result);

}
else{
if($result===false)echo mysql_error($connect);
else echo 'Query susceful! %)';
}

}












function load($file){
global $far;
if(file_exists($file)){
eval("\$zd=".$far[$_POST['compr']]."open(\$file,'r');");
($_POST['compr']<2)?eval("\$buff='';while(!".$far[$_POST['compr']]."eof(\$zd)){\$buff.=".$far[$_POST['compr']]."gets(\$zd);}"):eval("\$buff=bzread(\$zd);");
eval($far[$_POST['compr']]."close(\$zd);");
return($buff);
}
else{
print 'no such file!';
}
}

function write($data){
global $dump,$fp,$far;
($_POST['save']==0)?$dump.=$data:(isset($fp)?eval($far[$_POST['compr']]."write(\$fp,\$data);"):null);}

function sqlh(){
if($_POST['save']>0){
global $server,$dbtr;
write("#\n#Server : ".getenv('SERVER_NAME')."
#DB_Host : ".$server."
#DB : ".$_POST['db'].
(($dbtr==0)?"
#Table : ".$_POST['table_sel']:"")."\n#\n\n");}}

function sql($tabel_sel){
global $connect;
$row=mysql_fetch_row(mysql_query("SHOW CREATE TABLE `$tabel_sel`",$connect));
write("DROP TABLE IF EXISTS `$tabel_sel`;\n".$row[1].";\n\n");}

function test($aaa){
$d=array();
while(list($key,$val)=each($aaa)){$d[$key]=addslashes($val);}
return($d);}

function sql1($table_sel){

global $connect,$dbtr;
$result=mysql_query("SELECT ".(!empty($_POST['ufiled'])?$_POST['ufiled']:'*')." FROM `$table_sel` ".(($dbtr==0)?'LIMIT '.$_POST['ulimits'].','.$_POST['ulimite']:''),$connect);



while($line=mysql_fetch_assoc($result)){
((!isset($key))?($key=implode('`, `',array_keys($line))):null);
$ddd=test(array_values($line));
$val=implode('\', \'',$ddd);
write("INSERT INTO `".$table_sel."`(`".$key."`) VALUES ('".$val."');\n");}

mysql_free_result($result);}

function head($tmpfname,$name){
header("Content-Type: application/octet-stream; name=\"$name\"");
header("Content-Length: ".filesize($tmpfname)."");
header("Content-disposition: attachment; filename=\"$name\"");
$fd=fopen($tmpfname,"r");
while(!feof($fd)){
echo fgets($fd,4096);}
fclose($fd);
($_POST['save']==1)?unlink($tmpfname):null;
exit;}

function csv($table_sel){
global $connect,$far,$dbtr;
$res=mysql_query("SELECT ".(!empty($_POST['ufiled'])?$_POST['ufiled']:'*')." FROM `$table_sel` ".(($dbtr==0)?'LIMIT '.$_POST['ulimits'].','.$_POST['ulimite']:''),$connect);
$i=0;
$keys='';
while($key=@mysql_field_name($res,$i++))$keys.=$key."; ";

write("# Fields: \n#".$keys."\n\n");
if(mysql_num_rows($res)>0){




while($row=mysql_fetch_assoc($res)){
$values=array_values($row);
foreach($values as $k=>$v){$values[$k]=addslashes($v);}
$values=implode($_POST['cvs_term'],$values);
write($values."\n");
}


}}


if(isset($_POST['back']) && (isset($_POST['table_sel']) ||  $_POST['dbtr']=1 )){
$dbtr=$_POST['dbtr'];
$dump='';

if($_POST['save']>0){

$tmpfname=($_POST['save']==1)?tempnam($_POST['save_p'],"sess_"):$_POST['local'];
if(is_writeable(dirname($tmpfname))){
eval("\$fp=".$far[$_POST['compr']]."open(\$tmpfname,'w');");
}
}

sqlh();

switch($_POST['as']){
case 0:

switch($_POST['as_sql']){
case 0:



if($dbtr==1){
$it=0;
while($table_sel=@mysql_tablename(mysql_list_tables($_POST['db']),$it++)){
sql($table_sel);


}}

else sql($_POST['table_sel']);


break;
case 1:


if($dbtr==1){
$it=0;
while($table_sel=@mysql_tablename(mysql_list_tables($_POST['db']),$it++)){
sql($table_sel);
sql1($table_sel);
}}
else {
sql($_POST['table_sel']);
sql1($_POST['table_sel']);
}



break;
case 2:
if($dbtr==1){
$it=0;
while($table_sel=@mysql_tablename(mysql_list_tables($_POST['db']),$it++)){
sql1($table_sel);
}}
else sql1($_POST['table_sel']);


break;}

if($_POST['save']>0){
if(isset($fp)){
eval($far[$_POST['compr']]."close(\$fp);");

($_POST['save']==1)?head($tmpfname,(($dbtr==1)?$_POST['db']:$_POST['table_sel']).$far[$_POST['compr']+3]):($message='<center><b>'.$_POST['local'].' Saved</b><center>');}
else $message='<center><b>No writeable select Dir</b><center>';
}

break;
case 1:
//-----------------------------------


if($dbtr==1){
$it=0;
while($table_sel=@mysql_tablename(mysql_list_tables($_POST['db']),$it++)){
write("\n# Table: $table_sel\n");
csv($table_sel);


}}

else csv($_POST['table_sel']);
if($_POST['save']>0){
eval($far[$_POST['compr']]."close(\$fp);");
($_POST['save']==1)?head($tmpfname,(($dbtr==1)?$_POST['db']:$_POST['table_sel']).$far[$_POST['compr']+3]):'';
}

//------------------------------
break;}}




eval($text.";echo \$etext.\"\n<table width=100% height=90%><tr><td width=10% style='vertical-align:top'><table><tr><td>\";");

if(!isset($_POST['dd'])){
$db_list=mysql_list_dbs($connect);
echo "<select name='db'>\n";

while($row=mysql_fetch_assoc($db_list)){
$db1=$row['Database'];
echo "<option value='$db1'".(($db1===$_POST['db'])?' selected':'').">$db1</option>\n";
}

echo "</select>";
}
else echo "<input type=text name='db' value='".$_POST['db']."'>\n";


echo "</td></tr><tr><td>\n";

if(!empty($_POST['db'])){
$it=0;
$table_selt=array();
while($table_selt[]=@mysql_tablename(mysql_list_tables($_POST['db']),$it++));

if(isset($_POST['table_sel']) && array_search($_POST['table_sel'],$table_selt)===false)$_POST['table_sel']='';


if(mysql_num_rows(mysql_list_tables($_POST['db']))>0){



if(!isset($_POST['dt'])){
echo "<select name='table_sel' multiple size=27>\n";
$it=0;
while($table_sel=@mysql_tablename(mysql_list_tables($_POST['db']),$it++)){

$n=mysql_fetch_array(mysql_query("select count(*) from $table_sel"));
(isset($_POST['table_sel']) && $_POST['table_sel']===$table_sel)?$nt=$n:null;
echo "\n<option value='$table_sel'".((isset($_POST['table_sel']) && $_POST['table_sel']===$table_sel)?'selected':'').">$table_sel(".$n[0].")</option>";

}



echo "</select>";
}
else {
if(!empty($_POST['table_sel']))$nt=mysql_fetch_array(mysql_query("select count(*) from ".$_POST['table_sel']));
echo "<input type=text name='table_sel' value='".(isset($_POST['table_sel'])?$_POST['table_sel']:'')."'>\n";
}}

else echo '&nbsp;<b>No tables =\</b>';

echo "</td></tr></table></td><td style='vertical-align:top'>
<table width=100% height=100% bgcolor='#E3FFF2'><tr><td height=20 bgcolor=#dfdfdf width=100%><nobr><b>
<input type=radio Name='go' value=0>SQL
<input type=radio Name='go' value=1>Search
<input type=radio Name='go' value=2>Export
<input type=radio Name='go' value=3>Import
";
if(!empty($_POST['table_sel']))echo "
<input type=radio Name='go' value=4>Browse
<input type=radio Name='go' value=5>Insert";





echo "</b></nobr></td></tr><tr width=100%><td width=100%>\n".(isset($message)?$message:'');}

if(isset($_POST['push']) && !empty($_POST['querysql']))$_POST['go']=4;

if(isset($_POST['back']))$_POST['go']=2;

if(isset($_POST['brow']))$_POST['go']=4;

if(isset($_POST['editr']) && isset($_POST['edit']))$_POST['go']=6;// EDIT

if(isset($_POST['ed_save']))$_POST['go']=7;//INSERT

if(isset($_POST['search']))$_POST['go']=8;

if(isset($_POST['up']) && (!empty($_POST['load']) || !empty($_POST['upload'])))$_POST['go']=9;
elseif(isset($_POST['up']))$_POST['go']=3;

if((isset($_POST['dell']) && isset($_POST['edit']))|| isset($_POST['delp']))$_POST['go']=10;

if(!isset($_POST['go']) && !empty($_POST['table_sel']))$_POST['go']=4;





if(isset($_POST['go'])){
switch($_POST['go']){
case 0:

//SQL

echo "<input type=submit name=push value=Run><br>
<textarea cols=70% rows=8 name='querysql'>\n".((!empty($_POST['querysql']))?htmlspecialchars($_POST['querysql'],ENT_QUOTES):((!empty($_POST['table_sel']))?"SELECT * FROM `".$_POST['table_sel']."` WHERE 1":null))."</textarea><br><br>\n";


break;


case 1:
echo "
<table>
<tr bgcolor='#A8B8F1'><td>&nbsp;Location</td><td>&nbsp;Options</td><td>&nbsp;Search conditions</td><td>&nbsp;Limit</td><td></td></tr><tr bgcolor='#D7D7D7'>
<td>
<select name='locas'>
<option value=0>DB: ".$_POST['db']."</option>
".(!empty($_POST['table_sel'])?'<option value=1>Tb: '.$_POST['table_sel'].'</option>':'')."
</select>
</td>

<td>
<select name=opts>
<option value='='>=</option>
<option value='>'>></option>
<option value='>='>>=</option>
<option value='<'><</option>
<option value='<='><=</option>
<option value='!='>!=</option>
<option value='LIKE'>LIKE</option>
<option value='NOT LIKE'>NOT LIKE</option>
<option value='IS NULL'>IS NULL</option>
<option value='IS NOT NULL'>IS NOT NULL</option>
</select></td>
<td>
<input type=text name='seart'></td>
<td><input type=text name='limits'></td>
<td><input type=submit name='search' value='search'></td></tr>

</table>

";

break;

case 3:
//IMPORT


echo "<center><div style='width:300;background-color:#A8B8F1;'>Load file: &nbsp;<input type=file name='upload'><br>
Local file: <input type=text name='load' size=30><br>
<input type=radio name=compr value=0 checked>Text".(function_exists('gzencode')?'<input type=radio name=compr value=1>Gzip':'').(function_exists('bzcompress')?'<input type=radio name=compr value=2>Bzip2':'')."</div>
<input type=submit name='up' value='Import'></center>";



break;



case 4:

//BROWSE


if(!empty($_POST['table_sel']) || isset($_POST['querysql']))select();

//+++++++++++++++++++++++++++++++++++BROWSE _ END ++++++++++++++++++++++++++++++
break;


case 2:

//EXPORT

if(!isset($_POST['back'])){
echo '<table height=250 align="center"><TR><TD>
<table height=100%>
<tr><td bgcolor="#A8B8F1" width="100" height="20"><b>&nbsp;&nbsp;Export as</b></td></tr>
<tr><td bgcolor="#D0E0FF" width="100" height="20"><input type=radio Name="as" value="0" checked><b>&nbsp;&nbsp;SQL</b></td></tr><tr><td bgcolor="#D0E0FF" width="100" height="20"><input type=radio Name="as" value="1"><b>&nbsp;&nbsp;CSV</b></td></tr><tr><td height=100%></td></tr>
</table></TD><td>
<table width="140" height=100%>
<TR><TD bgcolor="#A8B8F1" height="20"><b>&nbsp;&nbsp;SQL</b></TD></TR>
<TR><TD bgcolor="#D0E0FF" height="20"><input type=radio Name="as_sql" value="0"><b>Only structure</b></TD></TR>
<TR><TD bgcolor="#D0E0FF" height="20"><input type=radio Name="as_sql" value="1" checked><b>All</b></TD></TR>
<TR><TD bgcolor="#D0E0FF" height="20"><input type=radio Name="as_sql" value="2"><b>Only data</b></TD></TR>
<TR><TD bgcolor="#A8B8F1" height="20"><b>CSV</b></TD></TR>
<TR><TD bgcolor="#D0E0FF" height="20"><b>Terminated&nbsp;</b><input size=2 type=text Name="cvs_term" value=":"></TD></TR><tr><td height=100%></td></tr></table></td><td>
<table height=100%><tr><td bgcolor="#E6D29C" width="100" height="20"><input type=radio Name="save" value="0" checked><b>&nbsp;View</b></td></tr>
<tr><td bgcolor="#E6D29C" width="100" height="20"><input type=radio Name="save" value="1"><b>&nbsp;Download</b></td></tr>
<tr><td bgcolor="#E6D29C" width="130" height="40"><b>&nbsp;Temp path</b><br><input type=text Name="save_p" value="/tmp"></td></tr>
<tr><td bgcolor="#E6D29C" width="100" height="20">
<input type=radio Name="save" value="2"><b>&nbsp;Save as local file</b><br>
<input type=text value="./db_backup" name="local">
</td></tr>
<tr><td height=100%></td></tr>
</table></td><td>
<table width="120" height=100%>
<TR><TD bgcolor="#A8B8F1" height="20"><b>&nbsp;&nbsp;Compression</b></TD></TR>
<TR><TD bgcolor="#D0E0FF" height="20"><input type=radio Name="compr" value="0" checked><b>None</b></TD></TR><TR><TD bgcolor="#D0E0FF" height="20"><input type=radio Name="compr" value="1" '.
(function_exists('gzencode')?'':'disabled="true"').'><b>Gzip</b></TD></TR><TR><TD bgcolor="#D0E0FF" height="20"><input type=radio Name="compr" value="2" '.
(function_exists('bzcompress')?'':'disabled="true"').'><b>Bzip2</b></TD></TR><tr><td height=100%></td></tr></table></td><td>
<table width="150" height=100%>
<TR><TD bgcolor="#A8B8F1" height="20"><b>&nbsp;&nbsp;Backup</b></TD></TR>
<TR><TD bgcolor="#D0E0FF" height="20"><input type=radio Name="dbtr" value="1" checked><b>All DataBase</b></TD></TR>'.(!empty($_POST['table_sel'])?'<TR><TD bgcolor="#D0E0FF" height="20"><input type=radio Name="dbtr" value="0" ><b>Only One Table</b></TD></TR>':'').'<tr><td height=100%></td></tr>
</table></td></TR><tr><td></tr></table>
';
if(isset($nt)){
echo '
<table width="100%"><tr><td bgcolor="#A8B8F1"><b>If backup only one table, use this options</b>(optional)</td><td></td>
</tr>
<tr bgcolor="#D0E0FF"><td><b>Use Fileds (Separator as ",")</b>,if emty then use All Fileds</td><td><input type=text name="ufiled" size=40 ></td></tr>
<tr bgcolor="#D0E0FF"><td><b>Limit:</b></td><td><input type=text name=ulimits size=6 value=0><input type=text name=ulimite size=6 value='.($nt[0]).'></td></tr>
</table>';
}
echo '<input type=submit value=backup name=back>';
}


if(isset($_POST['back']) && $_POST['save']==0)echo "<textarea cols=100 rows=20>".htmlspecialchars($dump)."</textarea>";
break;



case 5:

//INSERT IN TABLE
if(!empty($_POST['table_sel'])){
echo "<div style='width:100%;height:430;overflow:auto;'><table>\n";
$fields=mysql_list_fields($_POST['db'],$_POST['table_sel'],$connect);

for($i=0;$i<mysql_num_fields($fields);$i++){
echo "<tr><td bgcolor=#DBDCDD><b>".mysql_field_name($fields,$i).'</td><td bgcolor=#B9C3D7>'.mysql_field_type($fields,$i).'('.mysql_field_len($fields,$i).")</b></td><td>".((mysql_field_len($fields,$i)<40)?"<input type='text' name='ed_key:".mysql_field_name($fields,$i)."' value='' size=40>":"<textarea name='ed_key:".mysql_field_name($fields,$i)."' cols=31 rows=7></textarea>")."</td></tr>\n";}

echo "</table></div><input type=hidden name=insert value=1><input type=submit name=ed_save value=Insert>";

}
break;






case 6:


//EDIT




if($_POST['table_sel']===$_POST['table_sel2']){

$up_e=$_POST['edit'];
echo "<input type=hidden name=edit value='$up_e'>";
$up_e=urldecode($_POST['edit']);
echo "<div style='width:100%;height:440;overflow:auto;'><table>\n";
$fi=0;

$result=mysql_query("SELECT * FROM `".$_POST['table_sel']."` WHERE $up_e",$connect);

while($line=mysql_fetch_assoc($result)){

foreach($line as $key=>$col_value){
echo "<tr><td bgcolor=#DBDCDD><b>".mysql_field_name($result,$fi).'</td><td bgcolor=#B9C3D7>'.mysql_field_type($result,$fi).'('.mysql_field_len($result,$fi).")</b></td><td>".((mysql_field_len($result,$fi)<40)?"<input type='text' name='ed_key:".mysql_field_name($result,$fi)."' value='".htmlspecialchars($col_value,ENT_QUOTES)."' size=40>":"<textarea name='ed_key:".mysql_field_name($result,$fi)."' cols=31 rows=7>".htmlspecialchars($col_value,ENT_QUOTES)."</textarea>")."</td></tr>\n";
$fi++;}}

echo "</table></div><input type=submit name=ed_save value=Save>";
}
else select();

break;


case 7:

//INSERT/UPDATE

$ted='';
reset($_POST);
while(list($key,$val)=each($_POST)){
if(preg_match('/^ed_key:(.+)/',$key,$m)){
$ted.="`".$m[1]."`= '".addslashes($val)."', ";
}}
$ted=substr($ted,0,-2);
$query=((isset($_POST['insert']))?"INSERT":"UPDATE")." `".$_POST['table_sel']."` SET $ted ".((isset($_POST['insert']))?'':"WHERE ".urldecode($_POST['edit'])." LIMIT 1 ");
echo "<div style='background-color:white;'>".htmlspecialchars($query,ENT_QUOTES)."</div><br>";
$result=mysql_query($query,$connect) or print("<div style='background-color:red;'>".mysql_error($connect)."</div>");
echo "<div style='background-color:green;'>".mysql_info($connect)."</div>";




break;

case 8:
//SEARCH;


print "<div style='width:100%;height:440px;overflow:auto;'>";

$j=0;


function spdb($line){
global $connect,$j,$sql;
$fields=mysql_list_fields($_POST['db'], $line, $connect );
$columns=mysql_num_fields($fields);
for($i=0;$i<$columns;$i++){
$nomField=mysql_field_name($fields,$i);
$sql="SELECT ".$nomField." FROM ".$line." WHERE ".$nomField.' '.$_POST['opts'].(!preg_match('/NULL/',$_POST['opts'])?" ".(!preg_match('/[><]/',$_POST['opts'])?"'":'').addslashes($_POST['seart']).(!preg_match('/[><]/',$_POST['opts'])?"'":''):'').(!empty($_POST['limits'])?' LIMIT '.$_POST['limits']:'');
$query=mysql_query($sql) or print(mysql_error($connect));

if(mysql_num_rows($query)>0){
while($result=mysql_fetch_array($query)){
echo "Table: <b>".$line."</b>&nbsp;&nbsp;Field: <b>".$nomField."</b><br>SQL: <b>".htmlspecialchars($sql)."</b><br><b><div  style='background-color:#71D8C3;'>".htmlspecialchars($result[0])."</div></b>";
echo "<br><br>";
$j++;
}}}}






if($_POST['locas']==0){
$tables=mysql_list_tables($_POST['db']);
while($line=mysql_fetch_row($tables)){
spdb($line[0]);
}}
else{
spdb($_POST['table_sel']);
}





echo "</div><div style='background-color:#C4DCC7;'>Results: ".$j.'</div>';



break;

case 9:


if(is_uploaded_file($_FILES['upload']['tmp_name'])) {
$data=load($_FILES['upload']['tmp_name']);
}
elseif(!empty($_POST['load'])){
$data=load($_POST['load']);
}
if(isset($data)){
$arrup=explode(';',$data);
if(preg_match('/^[ \n\r]?$/',$arrup[count($arrup)-1]))array_splice($arrup,-1);
foreach($arrup as $aup){
mysql_query($aup,$connect) or $err=1;
}
print(isset($err)?mysql_error($connect):'Query susceful!');
}






break;

case 10:
//DELETE
if(!isset($_POST['table_sel2']) || $_POST['table_sel']===$_POST['table_sel2']){
$code='DELETE FROM `'.$_POST['table_sel'].'` WHERE '.urldecode($_POST['edit']).' LIMIT 1';
isset($_POST['delp'])?mysql_query($code):print("<div style='width:100%;background-color:#A8B8F1;'>".htmlspecialchars($code).'<input type=hidden name=edit value="'.$_POST['edit'].'"><br><input type=submit name=delp value=OK></div>');
}
else select();


break;







}}



echo "</td></tr></table></td></tr></table></tr><table><input type=hidden name=sql value=1>\n";

}

else eval($text.";echo \$etext;");
echo "</form></body></html>";
exit;
?>