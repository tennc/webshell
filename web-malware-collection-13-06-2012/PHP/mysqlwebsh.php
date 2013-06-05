<?

 $VERSION = "1.6";

 $MSIE = ereg("MSIE",$HTTP_USER_AGENT);

 if ($action == "showhelp") {showhelp($number);}
 if ($QUERY_STRING == "arrowup") {warrow("up");}
 if ($QUERY_STRING == "arrowdown") {warrow("down");}

 if ($action == "chparam")
 {
   SetCookie("host",$HTTP_POST_VARS["host"]);
   SetCookie("login",$HTTP_POST_VARS["login"]);
   SetCookie("password",$HTTP_POST_VARS["password"]);
   SetCookie("database",$HTTP_POST_VARS["database"]);
   SetCookie("DISABLEDM",$HTTP_POST_VARS["DISABLEDM"]);
 }

 $HOST = isset($HTTP_POST_VARS["host"])?$HTTP_POST_VARS["host"]:$HTTP_COOKIE_VARS["host"];
 $LOGIN = isset($HTTP_POST_VARS["login"])?$HTTP_POST_VARS["login"]:$HTTP_COOKIE_VARS["login"];
 $PASSWORD = isset($HTTP_POST_VARS["password"])?$HTTP_POST_VARS["password"]:$HTTP_COOKIE_VARS["password"];
 $DATABASE = isset($HTTP_POST_VARS["database"])?$HTTP_POST_VARS["database"]:$HTTP_COOKIE_VARS["database"];
 $DISABLEDM = isset($HTTP_POST_VARS["DISABLEDM"])?$HTTP_POST_VARS["DISABLEDM"]:$HTTP_COOKIE_VARS["DISABLEDM"];

 $HISTORY = Array();
 for ($i = 0; $i < 10; $i++)
 {
   if (isset($HTTP_COOKIE_VARS["HISTORY_COOKIE$i"]))
   {$HISTORY[] = $HTTP_COOKIE_VARS["HISTORY_COOKIE$i"];}
 }
 for ($i = 0; $i < sizeof($HISTORY); $i++) {$HISTORY[$i] = stripslashes($HISTORY[$i]);}

 if ($action == "logout")
 {
   SetCookie("host", "", time() - 360000);
   SetCookie("login", "", time() - 360000);
   SetCookie("password", "", time() - 360000);
   SetCookie("database", "", time() - 360000);
   SetCookie("DISABLEDM", "", time() - 360000);
   unset($HOST);
   unset($LOGIN);
   unset($PASSWORD);
   unset($DATABASE);
   unset($DISABLEDM);
   unset($sqlquery);
 }

 if (@mysql_connect($HOST,$LOGIN,$PASSWORD)) {$CONNECT = 1;} else {$CONNECT = 0;}
 if (!@mysql_select_db($DATABASE)) {$SELECTDB = 0;} else {$SELECTDB = 1;}

 if ($action == "submit")
 {
   array_unshift($HISTORY, stripslashes($sqlquery));
   array_splice($HISTORY, 10);

   for ($i = 0; $i < sizeof($HISTORY); $i++)
   { SetCookie("HISTORY_COOKIE$i", $HISTORY[$i], time()+31536000); }
   for ($j = $i+1; $j < 10; $j++)
   { SetCookie("HISTORY_COOKIE$j", "", time()-31536000); }

   $worktime = getmicrotime();
   $qwresult = @mysql_query(stripslashes($sqlquery));
   $worktime = getmicrotime()-$worktime;

   if (mysql_errno())
   {
     $STATUS = "
     <TABLE border=0 cellspacing=0 cellpadding=0 width=100%><TR bgcolor=\"#CCCCCC\"><TD>
     <TABLE border=0 cellspacing=1 cellpadding=3 width=100%>
     <TR bgcolor=\"#660000\"><TD><B>ERROR:</B> ".mysql_error()."</TD></TR>
     </TABLE>
     </TD></TR></TABLE>
     ";
   }
   else
   {
     if (@mysql_num_rows($qwresult) > 0) {$isfetch = 1;} else {$isfetch = 0;} 
     $STATUS = "
     <TABLE border=0 cellspacing=0 cellpadding=0 width=100%><TR bgcolor=\"#CCCCCC\"><TD>
     <TABLE border=0 cellspacing=1 cellpadding=3 width=100%>
     <TR bgcolor=\"#223344\"><TD>
     <B>Query execution time:</B> ".sprintf("%.5f",$worktime)." sec;
     <B>Affected rows:</B> ".@mysql_affected_rows()."
     </TD></TR>
     </TABLE>
     </TD></TR></TABLE>
     ";
   }
 }
?>

<HTML>
<TITLE>MySQL Web Shell <? echo $VERSION ?>, <? echo "$LOGIN@$HOST" ?></TITLE>

<STYLE>
BODY, TD, FORM, INPUT, SELECT {font-family: Arial; font-size: 12px;}
.SMALL {font-size: 11px;}
A {color: #FFFFBB; text-decoration: none;}
A:HOVER {text-decoration: underline;}
A.UNDL {color: #FFFFBB; text-decoration: underline;}
A.UNDL:HOVER {color: #FFFFFF; text-decoration: underline;}
</STYLE>

<SCRIPT language="JavaScript">
<!--

var histcookies = Array();

<? if ($CONNECT): ?>
function getCookie(name)
{
  var prefix = name + "=";
  var cookieStartIndex = document.cookie.indexOf(prefix);
  if (cookieStartIndex == -1) return null;
  var cookieEndIndex = document.cookie.indexOf(";", cookieStartIndex + prefix.length);
  if (cookieEndIndex == -1) cookieEndIndex = document.cookie.length;
  var returncookie = "";
  var tmpcookie = unescape(document.cookie.substring(cookieStartIndex + prefix.length, cookieEndIndex));
  for (var i = 0; i < tmpcookie.length; i++)
  {
    if (tmpcookie.charAt(i) == "+") {returncookie += " ";}
    else {returncookie += tmpcookie.charAt(i);}
  }
  return returncookie;      
}
var acooidx = 0;
for (var i = 0; i < 10; i++)
{
  var curcookie = getCookie("HISTORY_COOKIE"+i);
  if (curcookie != null) {histcookies[acooidx] = curcookie; acooidx++;}
}
<? endif ?>

if(document.layers) document.captureEvents(Event.KEYPRESS)
document.onkeypress=kpress; 

function kpress(e)
{
  key=(document.layers)?e.which:window.event.keyCode
  if (key == 10 && String.fromCharCode(key) == String.fromCharCode(10)) {document.queryform.submit();}
}

function selectallfrom(table)
{ document.queryform.sqlquery.value = 'SELECT * FROM '+table; }

function showcolumnsfrom(table)
{ document.queryform.sqlquery.value = 'SHOW COLUMNS FROM '+table; }

var lasthist = 0;
var histtouched = <? echo ($action == "submit")?1:0 ?>;

function hist(act)
{
  if (histcookies.length > 0)
  {
    var histsize = histcookies.length;
    if (act == 'down')
    { if (lasthist-1 >= 0) {lasthist--;} else {lasthist = 0;} }
    if (act == 'up')
    { if (lasthist+1 <= histsize-1) {if (histtouched) {lasthist++;}} else {lasthist = histsize-1;} }
    document.queryform.sqlquery.value = histcookies[lasthist];
    histtouched = 1;
  }
}

<? if ($MSIE && $DISABLEDM != "YES"): ?>
function selectrowfrom(table,row)
{ document.queryform.sqlquery.value = 'SELECT '+row+' FROM '+table; needhide = 1; deschide(); }

function selectrowsfrom(table,inform)
{
  var selectrows = '';
  for (i = 0; i < document.forms[inform].fields.length; i++)
  {
    if (document.forms[inform].fields[i].checked == true)
    {
      selectrows = selectrows+document.forms[inform].fields[i].value+',\n\t';
    }
  }
  if (selectrows == '') {selectrows = "*";}
  else
  {selectrows = selectrows.substring(0, selectrows.length-3);}
  if (!document.forms[inform].fields.length) {selectrows = document.forms[inform].fields.value;}
  document.queryform.sqlquery.value = 'SELECT\t'+selectrows+'\nFROM '+table;
  needhide = 1; deschide();
}

function insertinto(table,inform)
{
  var insertrows = '';

  for (i = 0; i < document.forms[inform].fields.length; i++)
  {
    if (document.forms[inform].fields[i].checked == true)
    {
      insertrows = insertrows+document.forms[inform].fields[i].value+'=\'\',\n    ';
    }
  }
  if (insertrows == '')
  {
    for (i = 0; i < document.forms[inform].fields.length; i++)
    {
      insertrows = insertrows+document.forms[inform].fields[i].value+'=\'\',\n    ';
    }
  }

  insertrows = insertrows.substring(0, insertrows.length-6);
  if (!document.forms[inform].fields.length) {insertrows = document.forms[inform].fields.value+'=\'\'';}
  document.queryform.sqlquery.value = 'INSERT INTO '+table+'\nSET\n    '+insertrows;
  needhide = 1; deschide();
}
<? endif ?>

function openWin(html)
{window.open(html,'','resizable=no,menubar=no,status=no,scrollbars=no,width=350,height=200');}

//-->
</SCRIPT>

<BODY TEXT="#FFFFFF" BGCOLOR="#112255" TOPMARGIN=0 LEFTMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>

<? if ($MSIE && $DISABLEDM != "YES"): ?><DIV id="descr" style="position: absolute; top: 25px; left: 0px; visibility: hidden; z-index: 10;"></DIV><? endif ?>

<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0 WIDTH=100%><TR BGCOLOR="#CCCCCC"><TD>
<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=5 WIDTH=100%>
<TR>
<TD ROWSPAN=2 NOWRAP BGCOLOR="#112255" VALIGN=TOP WIDTH=1%>

 <TABLE border=0 cellspacing=0 cellpadding=3>
 <FORM action="<? echo $PHP_SELF ?>" method=post>
 <TR><TD bgcolor="<? echo (!$CONNECT && $action == "chparam")?"#660000":"#446688" ?>"><B><? echo $CONNECT?"Parameters":"Login" ?> <? if (!$CONNECT && $action == "chparam") echo "failure" ?>:</B></TD></TR>
 <TR><TD><INPUT type=hidden name="action" value="chparam">
 <DIV class="SMALL">
  host:
  <INPUT class="SMALL" size=12 style="width: 120px;" type=text name="host" value="<? echo $HOST?$HOST:"localhost" ?>"><BR>
  login:
  <INPUT class="SMALL" size=12 style="width: 120px;" type=text name="login" value="<? echo $LOGIN ?>"><BR>
  password:<BR>
  <INPUT class="SMALL" size=12 style="width: 120px;" type=password name="password"><BR>
  database: <? if (!$SELECTDB && $DATABASE != "") {echo "<FONT color=\"#FF3333\">access failed</FONT>";} ?>
  <? if ($CONNECT): ?>                                                                  
  <SELECT class="SMALL" style="width: 120px;" name="database">
  <?
    $result = @mysql_query("SHOW DATABASES");
    while ($row = @mysql_fetch_row($result)) {echo "<OPTION value=\"$row[0]\" ".(($row[0] == $DATABASE)?"selected":"").">$row[0]</OPTION>\n";}
  ?>
  </SELECT>
  <? else: ?>
  <INPUT class="SMALL" size=12 style="width: 120px;" type=text name="database" value="<? echo $DATABASE ?>">
  <? endif ?>
  <? if ($MSIE): ?>
  <BR>
  <B>Drop menu on top:</B><BR>
  <INPUT type=radio name="DISABLEDM" value="YES" <? if ($DISABLEDM == "YES") echo "checked" ?>> disable
  <INPUT type=radio name="DISABLEDM" value="" <? if ($DISABLEDM == "") echo "checked" ?>> enable
  <BR><? endif ?><BR><INPUT class="SMALL" style="width: 120px;" type=submit value="<? echo $CONNECT?"         submit         ":"         login          " ?>">
 </DIV>
</TD>
</TR>
</FORM>

<TR><TD bgcolor="#446688"><B>MySQL Web Shell:</B></TD></TR>
<TR><TD>
<DIV class="SMALL">
Version: <? echo $VERSION ?><BR>
Homepage: <A href="http://www.atz.msk.ru/mysqlwebsh.html">Go!</A><BR>
Author: <A href="mailto:atz@atz.msk.ru">atz@atz.msk.ru</A>
</DIV>
</TD></TR>

</TABLE>

</TD>

<TD BGCOLOR="#112255" VALIGN=TOP>
<B>TABLES:</B>
<?
  $result = @mysql_query("SHOW TABLES FROM $DATABASE");
  $alltables = Array();
  while ($row = @mysql_fetch_row($result))
  {array_push($alltables,$row[0]);}
?>

<? if ($MSIE && $DISABLEDM != "YES"): ?>
<SCRIPT language="JavaScript">
<!--

var x1,x2,y;
var lastid = 'nonexistentid';
var needhide = 1;

var descriptions = new Array();
<?
  $tcount = 0;
  reset($alltables);
  foreach ($alltables as $table)
  {
    $tresult = @mysql_query("DESC $table");

    $desc = "<TABLE border=0 bgcolor=888888 cellspacing=1 cellpadding=1><FORM name=\"rowsform$tcount\">";

    while ($rows = @mysql_fetch_row($tresult))
    {
      if (ereg("^[[:space:]]*$",$rows[0])) {$rows[0] = "&nbsp;";}
      $desc .= "<TR bgcolor=334466><TD class=SMALL>&nbsp;&nbsp;<INPUT type=checkbox name=fields value=\"$rows[0]\">&nbsp;<A href=\"javascript: selectrowfrom('$table','$rows[0]');\">$rows[0]</A></TD><TD class=SMALL>$rows[1]</TD></TR>";
    }
    $desc .= "<TR bgcolor=334466><TD height=25 colspan=2 NOWRAP>&nbsp;&nbsp;<A href=\"javascript: selectrowsfrom('$table','rowsform$tcount');\"><B>select</B></A> | <A href=\"javascript: insertinto('$table','rowsform$tcount');\"><B>insert</B></A> </TD></TR></FORM></TABLE>";

    echo "descriptions[$tcount] = '".addslashes($desc)."';\n";
    $tcount++;
  }
?>

function descwrite(oid)
{
  if (oid != lastid) {descr.innerHTML = descriptions[oid]; lastid = oid;}
  descr.style.pixelLeft = event.x-15;
  descr.style.pixelTop = event.y;
  x1 = descr.style.pixelLeft;
  x2 = x1+descr.offsetWidth;
  y = descr.style.pixelTop+descr.offsetHeight;
  descr.style.visibility = 'visible';
}

function deschide()
{ if (needhide) {descr.style.visibility = 'hidden';} }

function mmove()
{
  if (event.x < x1 || event.x > x2 || event.y > y)
  { 
    needhide = 1;
    setTimeout("deschide();",800);
  }
  else {needhide = 0;}
}

document.onmousemove = mmove;

//-->
</SCRIPT>
<? endif ?>

<?
  $tcount = 0;
  reset($alltables);
  foreach ($alltables as $table)
  {
    if ($MSIE && $DISABLEDM != "YES") {$dopevent = "onMouseMove=\"descwrite($tcount);\" ";} else {$dopevent = "";}
    echo "<A href=\"javascript: selectallfrom('$table');\" onDblClick=\"showcolumnsfrom('$table');\" ${dopevent}class=\"UNDL\">$table</A>\n";
    if ($tcount != sizeof($alltables)-1) {echo "|\n";}
    $tcount++;
  }
?>
</TD></TR>

<TR><TD VALIGN=TOP WIDTH=99% bgcolor="#336699">
<TABLE border=0 cellspacing=0 cellpadding=3 width="620">
<FORM action="<? echo $PHP_SELF ?>" method=POST name="queryform">
<TR>
<TD colspan=3>
<TABLE border=0 cellspacing=0 cellpadding=0>
<TR><TD>&nbsp;</TD><TD>Press <B>Ctrl+Enter</B> to submit query<BR></TD></TR>
<TR>
<TD valign=top align=center><BR><A href="javascript: hist('up');"><IMG src="<? echo $PHP_SELF ?>?arrowup" width=12 height=11 border=0 alt="History Back"></A><BR><BR><A href="javascript: hist('down');"><IMG src="<? echo $PHP_SELF ?>?arrowdown" width=12 height=11 border=0 alt="History Forward"></A></TD>
<TD>
<INPUT type=hidden name="action" value="submit">
<TEXTAREA name="sqlquery" wrap=off rows=12 cols=59 style="width: 610px; height: 220px; font-family: Verdana; font-size: 11px;"><? echo htmlspecialchars(stripslashes($sqlquery)) ?></TEXTAREA>
</TD>
</TR></TABLE>
</TD></TR>
<TR>
<TD><INPUT type=submit style="width: 100px;" value="submit query"></TD>
<TD align=center>
<table border=0 cellspacing=0 cellpadding=2>
<tr>
 <td rowspan=2 align=right><B>Fetch Type:</B></td>
 <td nowrap><input type=radio name="fetchtype" value="1" checked> all rows in one table (<A href="javascript: openWin('<? echo $PHP_SELF ?>?action=showhelp&number=1');">help</A>)
</tr>
<tr>
 <td nowrap><input type=radio name="fetchtype" value="2"> one row = one table (<A href="javascript: openWin('<? echo $PHP_SELF ?>?action=showhelp&number=2');">help</A>)
</tr>
</table>
</TD>
<TD align=right><INPUT type=submit onClick="action.value = 'logout';" style="width: 100px;" value="logout"></TD>
</TR>
</FORM>
</TABLE>
<BR>

<? echo $STATUS ?>

<? if ($isfetch): ?><TR bgcolor="#000000"><TD COLSPAN=2 align=center><B>FETCH RESULTS</B></TD></TR><? endif ?>

</TD></TR></TABLE>
</TD></TR></TABLE>

<?
  if ($isfetch && $fetchtype == 1)
  {
    ?>
    <TABLE border=0 cellspacing=0 cellpadding=0 width=100%><TR bgcolor="#888888"><TD>
    <TABLE border=0 cellspacing=1 cellpadding=2 width=100%><TR bgcolor="#223344"><TD align=center><b><? 
    $fields = _mysql_all_fields($qwresult);
    echo @implode("</B></TD><TD align=center><B>",$fields);
    ?></B></TD></TR>
    <?
    $tmpcolor = $tmpcolor1 = "#334466"; $tmpcolor2 = "#263656";
    
    while ($rows = @mysql_fetch_row($qwresult))
    {
      for ($i = 0; $i < sizeof($rows); $i++)
      {
        if (is_null($rows[$i])) {$rows[$i] = "<CENTER><B>[NULL]</B></CENTER>";}
        elseif (ereg("^[[:space:]]*$",$rows[$i])) {$rows[$i] = "&nbsp;";}
        else {$rows[$i] = htmlspecialchars($rows[$i]);}
      }
      echo "<TR bgcolor=\"$tmpcolor\"><TD>";
      echo @implode("</TD><TD>",$rows);
      echo "</TD></TR>\n";
      $tmpcolor = ($tmpcolor == $tmpcolor1)?$tmpcolor2:$tmpcolor1;
    }
    ?>
    </TABLE>
    </TD></TR></TABLE>
    <?
  }

  if ($isfetch && $fetchtype == 2)
  {
    $percent = floor(100/mysql_num_fields($qwresult));
    ?>
    <TABLE border=0 cellspacing=1 cellpadding=2 width=100%><TR bgcolor="#223344"><TD width=<? echo $percent ?>% align=center><b><? 
    $fields = _mysql_all_fields($qwresult);
    echo @implode("</B></TD><TD width=$percent% align=center><B>",$fields);
    ?></B></TD></TR></TABLE>
    <?
    $tmpcolor = $tmpcolor1 = "#334466"; $tmpcolor2 = "#263656";
    
    while ($rows = @mysql_fetch_row($qwresult))
    {
      for ($i = 0; $i < sizeof($rows); $i++)
      {
        if (is_null($rows[$i])) {$rows[$i] = "<CENTER><B>[NULL]</B></CENTER>";}
        elseif (ereg("^[[:space:]]*$",$rows[$i])) {$rows[$i] = "&nbsp;";}
        else {$rows[$i] = htmlspecialchars($rows[$i]);}
      }
      echo "<TABLE cellspacing=1 cellpadding=3 width=100%><TR bgcolor=\"$tmpcolor\"><TD width=$percent%>";
      echo @implode("</TD><TD width=$percent%>",$rows);
      echo "</TD></TR></TABLE>\n";
      $tmpcolor = ($tmpcolor == $tmpcolor1)?$tmpcolor2:$tmpcolor1;
    }
  }
?>

</BODY>

</HTML>

<?

function _mysql_all_fields($result)
{
  $fields = Array();
  for ($i = 0; $i < @mysql_num_fields($result); $i++)
  {array_push($fields, @mysql_field_name($result, $i));}
  return $fields;
}

function getmicrotime()
{ 
  list($usec, $sec) = explode(" ",microtime()); 
  return ((float)$usec + (float)$sec); 
} 

function showhelp($num)
{

?>
<HTML>
<TITLE>Fetch Type help : <? echo ($num==1)?"all rows in one table":"one row = one table" ?></TITLE>
<BODY TEXT="#FFFFFF" BGCOLOR="#336699">
<TABLE width=100% height=100% cellpadding=20><TR><TD>
<DIV style="font-family: Arial; font-size: 12px;">
<?
if ($num == 1):
?>
This option means that you will wait for the whole html file loading.<BR>
Recommended for fetching the tables with small number of rows.
<BR><BR>
(100 percent correct table display after the process of
loading is accomplished)
<?
endif;

if ($num == 2):
?>
This option means that you will see the real-time display of "fetch" process.<BR>
Recommended for fetching the tables with large number of rows.
<BR><BR>
(in some cases there can be problems with correct table display)
<?
endif;
?>
</DIV>
</TD></TR></TABLE>
</BODY>
</HTML>
<?
exit;
}

function warrow($aname)
{
  Header("Content-type: image/gif");
  $header = "4749463839610c000b00800100ffffffffffff21f90401000001002c000000000c000b000002188c";
  echo ($aname == "up")?pack("H130",$header."03a707bddcdc8a54d10b9193c844ff7c8fc785e5740605003b"):pack("H130",$header."81a68bb0df1e4bf0506743a4ba796c7d92287560792a05003b");
  exit;
}

?>