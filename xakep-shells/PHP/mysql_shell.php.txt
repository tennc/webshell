<?
/*
 * MySQL Web Interface Version 0.8
 * -------------------------------
 * Developed By SooMin Kim (smkim@popeye.snu.ac.kr)
 * License : GNU Public License (GPL)
 * Homepage : http://popeye.snu.ac.kr/~smkim/mysql
 */

$HOSTNAME = "localhost";

function logon() {
	global $PHP_SELF;

	setcookie( "mysql_web_admin_username" );
	setcookie( "mysql_web_admin_password" );
	echo "<html>\n";
	echo "<head>\n";
	echo "<title>MySQL Web Interface</title>\n";
	echo "</head>\n";
	echo "<body>\n";
	echo "<table width=100% height=100%><tr><td><center>\n";
	echo "<table cellpadding=2><tr><td bgcolor=#a4a260><center>\n";
	echo "<table cellpadding=20><tr><td bgcolor=#ffffff><center>\n";
	echo "<h1>MySQL Web Interface</h1>\n";
	echo "<form action='$PHP_SELF'>\n";
	echo "<input type=hidden name=action value=logon_submit>\n";
	echo "<table cellpadding=5 cellspacing=1>\n";
	echo "<tr><td>Username </td><td> <input type=text name=username></td></tr>\n";
	echo "<tr><td>Password </td><td> <input type=password name=password></td></tr>\n";
	echo "</table><p>\n";
	echo "<input type=submit value='Enter'>\n";
	echo "<input type=reset value='Clear'><br>\n";
	echo "</form>\n";
	echo "</center></td></tr></table>\n";
	echo "</center></td></tr></table>\n";
	echo "<p><hr width=300>\n";
	echo "<font size=2>\n";
	echo "Copyleft &copy; since 1999,\n";
	echo "<a href='mailto:smkim76@icqmail.com'>SooMin Kim</a><br>\n";
	echo "<a href='http://popeye.snu.ac.kr/~smkim/mysql'>Hompage<a> is available<br>";
	echo "</font>\n";
	echo "</center></td></tr></table>\n";
	echo "</body>\n";
	echo "</html>\n";
}

function logon_submit() {
	global $username, $password, $PHP_SELF;

	setcookie( "mysql_web_admin_username", $username );
	setcookie( "mysql_web_admin_password", $password );
	echo "<html>";
	echo "<head>";
	echo "<META HTTP-EQUIV=Refresh CONTENT='0; URL=$PHP_SELF?action=listDBs'>";
	echo "</head>";
	echo "</html>";
}

function echoQueryResult() {
	global $queryStr, $errMsg;

	if( $errMsg == "" ) $errMsg = "Success";
	if( $queryStr != "" ) {
		echo "<table cellpadding=5>\n";
		echo "<tr><td>Query</td><td>$queryStr</td></tr>\n";
		echo "<tr><td>Result</td><td>$errMsg</td></tr>\n";
		echo "</table><p>\n";
	}
}

function listDatabases() {
	global $mysqlHandle, $PHP_SELF;

	echo "<h1>Database List</h1>\n";

	echo "<form action='$PHP_SELF'>\n";
	echo "<input type=hidden name=action value=createDB>\n";
	echo "<input type=text name=dbname>\n";
	echo "<input type=submit value='Create Database'>\n";
	echo "</form>\n";
	echo "<hr>\n";

	echo "<table cellspacing=1 cellpadding=5>\n";

	$pDB = mysql_list_dbs( $mysqlHandle );
	$num = mysql_num_rows( $pDB );
	for( $i = 0; $i < $num; $i++ ) {
		$dbname = mysql_dbname( $pDB, $i );
		echo "<tr>\n";
		echo "<td>$dbname</td>\n";
		echo "<td><a href='$PHP_SELF?action=listTables&dbname=$dbname'>Table</a></td>\n";
		echo "<td><a href='$PHP_SELF?action=dropDB&dbname=$dbname' onClick=\"return confirm('Drop Database \'$dbname\'?')\">Drop</a></td>\n";
		echo "<td><a href='$PHP_SELF?action=dumpDB&dbname=$dbname'>Dump</a></td>\n";
		echo "</tr>\n";
	}
	echo "</table>\n";
}

function createDatabase() {
	global $mysqlHandle, $dbname, $PHP_SELF;

	mysql_create_db( $dbname, $mysqlHandle );
	listDatabases();
}

function dropDatabase() {
	global $mysqlHandle, $dbname, $PHP_SELF;

	mysql_drop_db( $dbname, $mysqlHandle );
	listDatabases();
}

function listTables() {
	global $mysqlHandle, $dbname, $PHP_SELF;

	echo "<h1>Table List</h1>\n";
	echo "<p class=location>$dbname</p>\n";
	echoQueryResult();
	echo "<form action='$PHP_SELF'>\n";
	echo "<input type=hidden name=action value=createTable>\n";
	echo "<input type=hidden name=dbname value=$dbname>\n";
	echo "<input type=text name=tablename>\n";
	echo "<input type=submit value='Create Table'>\n";
	echo "</form>\n";
	echo "<form action='$PHP_SELF'>\n";
	echo "<input type=hidden name=action value=query>\n";
	echo "<input type=hidden name=dbname value=$dbname>\n";
	echo "<input type=text size=40 name=queryStr>\n";
	//echo "<textarea cols=30 rows=3 name=queryStr></textarea><br>";
	echo "<input type=submit value='Query'>\n";
	echo "</form>\n";
	echo "<hr>\n";

	$pTable = mysql_list_tables( $dbname );

	if( $pTable == 0 ) {
		$msg  = mysql_error();
		echo "<h3>Error : $msg</h3><p>\n";
		return;
	}
	$num = mysql_num_rows( $pTable );

	echo "<table cellspacing=1 cellpadding=5>\n";

	for( $i = 0; $i < $num; $i++ ) {
		$tablename = mysql_tablename( $pTable, $i );

		echo "<tr>\n";
		echo "<td>\n";
		echo "$tablename\n";
		echo "</td>\n";
		echo "<td>\n";
		echo "<a href='$PHP_SELF?action=viewSchema&dbname=$dbname&tablename=$tablename'>Schema</a>\n";
		echo "</td>\n";
		echo "<td>\n";
		echo "<a href='$PHP_SELF?action=viewData&dbname=$dbname&tablename=$tablename'>Data</a>\n";
		echo "</td>\n";
		echo "<td>\n";
		echo "<a href='$PHP_SELF?action=dropTable&dbname=$dbname&tablename=$tablename' onClick=\"return confirm('Drop Database \'$dbname\'?')\">Drop</a>\n";
		echo "</td>\n";
		echo "<td>\n";
		echo "<a href='$PHP_SELF?action=dumpTable&dbname=$dbname&tablename=$tablename'>Dump</a>\n";
		echo "</td>\n";
		echo "</tr>\n";
	}

	echo "</table>";
}

function createTable() {
	global $mysqlHandle, $dbname, $tablename, $PHP_SELF, $queryStr, $errMsg;

	$queryStr = "CREATE TABLE $tablename ( no INT )";
	mysql_select_db( $dbname, $mysqlHandle );
	mysql_query( $queryStr, $mysqlHandle );
	$errMsg = mysql_error();

	listTables();
}

function dropTable() {
	global $mysqlHandle, $dbname, $tablename, $PHP_SELF, $queryStr, $errMsg;

	$queryStr = "DROP TABLE $tablename";
	mysql_select_db( $dbname, $mysqlHandle );
	mysql_query( $queryStr, $mysqlHandle );
	$errMsg = mysql_error();

	listTables();
}

function viewSchema() {
	global $mysqlHandle, $dbname, $tablename, $PHP_SELF, $queryStr, $errMsg;

	echo "<h1>Table Schema</h1>\n";
	echo "<p class=location>$dbname &gt; $tablename</p>\n";

	echoQueryResult();

	echo "<a href='$PHP_SELF?action=addField&dbname=$dbname&tablename=$tablename'>Add Field</a> | \n";
	echo "<a href='$PHP_SELF?action=viewData&dbname=$dbname&tablename=$tablename'>View Data</a>\n";
	echo "<hr>\n";

	$pResult = mysql_db_query( $dbname, "SHOW fields FROM $tablename" );
	$num = mysql_num_rows( $pResult );

	echo "<table cellspacing=1 cellpadding=5>\n";
	echo "<tr>\n";
	echo "<th>Field</th>\n";
	echo "<th>Type</th>\n";
	echo "<th>Null</th>\n";
	echo "<th>Key</th>\n";
	echo "<th>Default</th>\n";
	echo "<th>Extra</th>\n";
	echo "<th colspan=2>Action</th>\n";
	echo "</tr>\n";

	for( $i = 0; $i < $num; $i++ ) {
		$field = mysql_fetch_array( $pResult );
		echo "<tr>\n";
		echo "<td>".$field["Field"]."</td>\n";
		echo "<td>".$field["Type"]."</td>\n";
		echo "<td>".$field["Null"]."</td>\n";
		echo "<td>".$field["Key"]."</td>\n";
		echo "<td>".$field["Default"]."</td>\n";
		echo "<td>".$field["Extra"]."</td>\n";
		$fieldname = $field["Field"];
		echo "<td><a href='$PHP_SELF?action=editField&dbname=$dbname&tablename=$tablename&fieldname=$fieldname'>Edit</a></td>\n";
		echo "<td><a href='$PHP_SELF?action=dropField&dbname=$dbname&tablename=$tablename&fieldname=$fieldname' onClick=\"return confirm('Drop Field \'$fieldname\'?')\">Drop</a></td>\n";
		echo "</tr>\n";
	}
	echo "</table>\n";
}

function manageField( $cmd ) {
	global $mysqlHandle, $dbname, $tablename, $fieldname, $PHP_SELF;

	if( $cmd == "add" )
		echo "<h1>Add Field</h1>\n";
	else if( $cmd == "edit" ) {
		echo "<h1>Edit Field</h1>\n";
		$pResult = mysql_db_query( $dbname, "SHOW fields FROM $tablename" );
		$num = mysql_num_rows( $pResult );
		for( $i = 0; $i < $num; $i++ ) {
			$field = mysql_fetch_array( $pResult );
			if( $field["Field"] == $fieldname ) {
				$fieldtype = $field["Type"];
				$fieldkey = $field["Key"];
				$fieldextra = $field["Extra"];
				$fieldnull = $field["Null"];
				$fielddefault = $field["Default"];
				break;
			}
		}
		$type = strtok( $fieldtype, " (,)\n" );
		if( strpos( $fieldtype, "(" ) ) {
			if( $type == "enum" | $type == "set" ) {
				$valuelist = strtok( " ()\n" );
			} else {
				$M = strtok( " (,)\n" );
				if( strpos( $fieldtype, "," ) )
					$D = strtok( " (,)\n" );
			}
		}
	}

	echo "<p class=location>$dbname &gt; $tablename</p>\n";
	echo "<form action=$PHP_SELF>\n";

	if( $cmd == "add" )
		echo "<input type=hidden name=action value=addField_submit>\n";
	else if( $cmd == "edit" ) {
		echo "<input type=hidden name=action value=editField_submit>\n";
		echo "<input type=hidden name=old_name value=$fieldname>\n";
	}
	echo "<input type=hidden name=dbname value=$dbname>\n";
	echo "<input type=hidden name=tablename value=$tablename>\n";

	echo "<h3>Name</h3>\n";
	echo "<input type=text name=name value=$fieldname><p>\n";
?>

<h3>Type</h3>

<font size=2>
* `M' indicates the maximum display size.<br>
* `D' applies to floating-point types and indicates the number of digits following the decimal point.<br>
</font>

<table>
<tr>
<th>Type</th><th>&nbspM&nbsp</th><th>&nbspD&nbsp</th><th>unsigned</th><th>zerofill</th><th>binary</th>
</tr>
<tr>
<td><input type=radio name=type value="TINYINT" <? if( $type == "tinyint" ) echo "checked";?>>TINYINT (-128 ~ 127)</td>
<td align=center>O</td>
<td>&nbsp</td>
<td align=center>O</td>
<td align=center>O</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="SMALLINT" <? if( $type == "smallint" ) echo "checked";?>>SMALLINT (-32768 ~ 32767)</td>
<td align=center>O</td>
<td>&nbsp</td>
<td align=center>O</td>
<td align=center>O</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="MEDIUMINT" <? if( $type == "mediumint" ) echo "checked";?>>MEDIUMINT (-8388608 ~ 8388607)</td>
<td align=center>O</td>
<td>&nbsp</td>
<td align=center>O</td>
<td align=center>O</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="INT" <? if( $type == "int" ) echo "checked";?>>INT (-2147483648 ~ 2147483647)</td>
<td align=center>O</td>
<td>&nbsp</td>
<td align=center>O</td>
<td align=center>O</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="BIGINT" <? if( $type == "bigint" ) echo "checked";?>>BIGINT (-9223372036854775808 ~ 9223372036854775807)</td>
<td align=center>O</td>
<td>&nbsp</td>
<td align=center>O</td>
<td align=center>O</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="FLOAT" <? if( $type == "float" ) echo "checked";?>>FLOAT</td>
<td align=center>O</td>
<td align=center>O</td>
<td>&nbsp</td>
<td align=center>O</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="DOUBLE" <? if( $type == "double" ) echo "checked";?>>DOUBLE</td>
<td align=center>O</td>
<td align=center>O</td>
<td>&nbsp</td>
<td align=center>O</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="DECIMAL" <? if( $type == "decimal" ) echo "checked";?>>DECIMAL(NUMERIC)</td>
<td align=center>O</td>
<td align=center>O</td>
<td>&nbsp</td>
<td align=center>O</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="DATE" <? if( $type == "date" ) echo "checked";?>>DATE (1000-01-01 ~ 9999-12-31, YYYY-MM-DD)</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="DATETIME" <? if( $type == "datetime" ) echo "checked";?>>DATETIME (1000-01-01 00:00:00 ~ 9999-12-31 23:59:59, YYYY-MM-DD HH:MM:SS)</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="TIMESTAMP" <? if( $type == "timestamp" ) echo "checked";?>>TIMESTAMP (1970-01-01 00:00:00 ~ 2106..., YYYYMMDD[HH[MM[SS]]])</td>
<td align=center>O</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="TIME" <? if( $type == "time" ) echo "checked";?>>TIME (-838:59:59 ~ 838:59:59, HH:MM:SS)</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="YEAR" <? if( $type == "year" ) echo "checked";?>>YEAR (1901 ~ 2155, 0000, YYYY)</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="CHAR" <? if( $type == "char" ) echo "checked";?>>CHAR</td>
<td align=center>O</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td align=center>O</td>
</tr>
<tr>
<td><input type=radio name=type value="VARCHAR" <? if( $type == "varchar" ) echo "checked";?>>VARCHAR</td>
<td align=center>O</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td align=center>O</td>
</tr>
<tr>
<td><input type=radio name=type value="TINYTEXT" <? if( $type == "tinytext" ) echo "checked";?>>TINYTEXT (0 ~ 255)</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="TEXT" <? if( $type == "text" ) echo "checked";?>>TEXT (0 ~ 65535)</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="MEDIUMTEXT" <? if( $type == "mediumtext" ) echo "checked";?>>MEDIUMTEXT (0 ~ 16777215)</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="LONGTEXT" <? if( $type == "longtext" ) echo "checked";?>>LONGTEXT (0 ~ 4294967295)</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="TINYBLOB" <? if( $type == "tinyblob" ) echo "checked";?>>TINYBLOB (0 ~ 255)</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="BLOB" <? if( $type == "blob" ) echo "checked";?>>BLOB (0 ~ 65535)</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="MEDIUMBLOB" <? if( $type == "mediumblob" ) echo "checked";?>>MEDIUMBLOB (0 ~ 16777215)</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr>
<tr>
<td><input type=radio name=type value="LONGBLOB" <? if( $type == "longblob" ) echo "checked";?>>LONGBLOB (0 ~ 4294967295)</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
<td>&nbsp</td>
</tr> 
<tr>
<td><input type=radio name=type value="ENUM" <? if( $type == "enum" ) echo "checked";?>>ENUM</td>
<td colspan=5><center>value list</center></td>
</tr>
<tr>
<td><input type=radio name=type value="SET" <? if( $type == "set" ) echo "checked";?>>SET</td>
<td colspan=5><center>value list</center></td>
</tr>

</table>
<table>
<tr><th>M</th><th>D</th><th>unsigned</th><th>zerofill</th><th>binary</th><th>value list (ex: 'apple', 'orange', 'banana') </th></tr>
<tr>
<td align=center><input type=text size=4 name=M <? if( $M != "" ) echo "value=$M";?>></td>
<td align=center><input type=text size=4 name=D <? if( $D != "" ) echo "value=$D";?>></td>
<td align=center><input type=checkbox name=unsigned value="UNSIGNED" <? if( strpos( $fieldtype, "unsigned" ) ) echo "checked";?>></td>
<td align=center><input type=checkbox name=zerofill value="ZEROFILL" <? if( strpos( $fieldtype, "zerofill" ) ) echo "checked";?>></td>
<td align=center><input type=checkbox name=binary value="BINARY" <? if( strpos( $fieldtype, "binary" )  ) echo "checked";?>></td>
<td align=center><input type=text size=60 name=valuelist <? if( $valuelist != "" ) echo "value=\"$valuelist\"";?>></td>
</tr>
</table>


<h3>Flags</h3>
<table>
<tr><th>not null</th><th>default value</th><th>auto increment</th><th>primary key</th></tr>
<tr>
<td align=center><input type=checkbox name=not_null value="NOT NULL" <? if( $fieldnull != "YES" ) echo "checked";?>></td>
<td align=center><input type=text name=default_value <? if( $fielddefault != "" ) echo "value=$fielddefault";?>></td>
<td align=center><input type=checkbox name=auto_increment value="AUTO_INCREMENT" <? if( $fieldextra == "auto_increment" ) echo "checked";?>></td>
<td align=center><input type=checkbox name=primary_key value="PRIMARY KEY" <? if( $fieldkey == "PRI" ) echo "checked";?>></td>
</tr>
</table>

<p>

<?
	if( $cmd == "add" )
		echo "<input type=submit value='Add Field'>\n";
	else if( $cmd == "edit" )
		echo "<input type=submit value='Edit Field'>\n";
	echo "<input type=button value=Cancel onClick='history.back()'>\n";
	echo "</form>\n";
}

function manageField_submit( $cmd ) {
	global $mysqlHandle, $dbname, $tablename, $old_name, $name, $type, $PHP_SELF, $queryStr, $errMsg,
		$M, $D, $unsigned, $zerofill, $binary, $not_null, $default_value, $auto_increment, $primary_key, $valuelist;

	if( $cmd == "add" )
		$queryStr = "ALTER TABLE $tablename ADD $name ";
	else if( $cmd == "edit" )
		$queryStr = "ALTER TABLE $tablename CHANGE $old_name $name ";
	
	if( $M != "" )
		if( $D != "" )
			$queryStr .= "$type($M,$D) ";
		else
			$queryStr .= "$type($M) ";
	else if( $valuelist != "" ) {
		$valuelist = stripslashes( $valuelist );
		$queryStr .= "$type($valuelist) ";
	} else
		$queryStr .= "$type ";

	$queryStr .= "$unsigned $zerofill $binary ";

	if( $default_value != "" )
		$queryStr .= "DEFAULT '$default_value' ";
	
	$queryStr .= "$not_null $auto_increment";

	mysql_select_db( $dbname, $mysqlHandle );
	mysql_query( $queryStr, $mysqlHandle );
	$errMsg = mysql_error();

	// key change
	$keyChange = false;
	$result = mysql_query( "SHOW KEYS FROM $tablename" );
	$primary = "";
	while( $row = mysql_fetch_array($result) )
		if( $row["Key_name"] == "PRIMARY" ) {
			if( $row[Column_name] == $name )
				$keyChange = true;
			else
				$primary .= ", $row[Column_name]";
		}
	if( $primary_key == "PRIMARY KEY" ) {
		$primary .= ", $name";
		$keyChange = !$keyChange;
	}
	$primary = substr( $primary, 2 );
	if( $keyChange == true ) {
		$q = "ALTER TABLE $tablename DROP PRIMARY KEY";
		mysql_query( $q );
		$queryStr .= "<br>\n" . $q;
		$errMsg .= "<br>\n" . mysql_error();
		$q = "ALTER TABLE $tablename ADD PRIMARY KEY( $primary )";
		mysql_query( $q );
		$queryStr .= "<br>\n" . $q;
		$errMsg .= "<br>\n" . mysql_error();
	}

	viewSchema();
}

function dropField() {
	global $mysqlHandle, $dbname, $tablename, $fieldname, $PHP_SELF, $queryStr, $errMsg;

	$queryStr = "ALTER TABLE $tablename DROP COLUMN $fieldname";
	mysql_select_db( $dbname, $mysqlHandle );
	mysql_query( $queryStr , $mysqlHandle );
	$errMsg = mysql_error();

	viewSchema();
}

function viewData( $queryStr ) {
	global $mysqlHandle, $dbname, $tablename, $PHP_SELF, $errMsg, $page, $rowperpage, $orderby;

	echo "<h1>Data in Table</h1>\n";
	if( $tablename != "" )
		echo "<p class=location>$dbname &gt; $tablename</p>\n";
	else
		echo "<p class=location>$dbname</p>\n";

	$queryStr = stripslashes( $queryStr );
	if( $queryStr == "" ) {
		$queryStr = "SELECT * FROM $tablename";
		if( $orderby != "" )
			$queryStr .= " ORDER BY $orderby";
		echo "<a href='$PHP_SELF?action=addData&dbname=$dbname&tablename=$tablename'>Add Data</a> | \n";
		echo "<a href='$PHP_SELF?action=viewSchema&dbname=$dbname&tablename=$tablename'>Schema</a>\n";
	}

	$pResult = mysql_db_query( $dbname, $queryStr );
	$errMsg = mysql_error();

	$GLOBALS[queryStr] = $queryStr;

	if( $pResult == false ) {
		echoQueryResult();
		return;
	}
	if( $pResult == 1 ) {
		$errMsg = "Success";
		echoQueryResult();
		return;
	}

	echo "<hr>\n";

	$row = mysql_num_rows( $pResult );
	$col = mysql_num_fields( $pResult );

	if( $row == 0 ) {
		echo "No Data Exist!";
		return;
	}
	
	if( $rowperpage == "" ) $rowperpage = 20;
	if( $page == "" ) $page = 0;
	else $page--;
	mysql_data_seek( $pResult, $page * $rowperpage );

	echo "<table cellspacing=1 cellpadding=2>\n";
	echo "<tr>\n";
	for( $i = 0; $i < $col; $i++ ) {
		$field = mysql_fetch_field( $pResult, $i );
		echo "<th>";
		echo "<a href='$PHP_SELF?action=viewData&dbname=$dbname&tablename=$tablename&orderby=".$field->name."'>".$field->name."</a>\n";
		echo "</th>\n";
	}
	echo "<th colspan=2>Action</th>\n";
	echo "</tr>\n";

	for( $i = 0; $i < $rowperpage; $i++ ) {
		$rowArray = mysql_fetch_row( $pResult );
		if( $rowArray == false ) break;
		echo "<tr>\n";
		$key = "";
		for( $j = 0; $j < $col; $j++ ) {
			$data = $rowArray[$j];

			$field = mysql_fetch_field( $pResult, $j );
			if( $field->primary_key == 1 )
				$key .= "&" . $field->name . "=" . $data;

			if( strlen( $data ) > 20 )
				$data = substr( $data, 0, 20 ) . "...";
			$data = htmlspecialchars( $data );
			echo "<td>\n";
			echo "$data\n";
			echo "</td>\n";
		}

		if( $key == "" )
			echo "<td colspan=2>no Key</td>\n";
		else {
			echo "<td><a href='$PHP_SELF?action=editData&dbname=$dbname&tablename=$tablename$key'>Edit</a></td>\n";
			echo "<td><a href='$PHP_SELF?action=deleteData&dbname=$dbname&tablename=$tablename$key' onClick=\"return confirm('Delete Row?')\">Delete</a></td>\n";
		}
		echo "</tr>\n";
	}
	echo "</table>\n";

	echo "<font size=2>\n";
	echo "<form action='$PHP_SELF?action=viewData&dbname=$dbname&tablename=$tablename' method=post>\n";
	echo "<font color=green>\n";
	echo ($page+1)."/".(int)($row/$rowperpage+1)." page";
	echo "</font>\n";
	echo " | ";
	if( $page > 0 ) {
		echo "<a href='$PHP_SELF?action=viewData&dbname=$dbname&tablename=$tablename&page=".($page);
		if( $orderby != "" )
			echo "&orderby=$orderby";
		echo "'>Prev</a>\n";
	} else
		echo "Prev";
	echo " | ";
	if( $page < ($row/$rowperpage)-1 ) {
		echo "<a href='$PHP_SELF?action=viewData&dbname=$dbname&tablename=$tablename&page=".($page+2);
		if( $orderby != "" )
			echo "&orderby=$orderby";
		echo "'>Next</a>\n";
	} else
		echo "Next";
	echo " | ";
	if( $row > $rowperpage ) {
		echo "<input type=text size=4 name=page>\n";
		echo "<input type=submit value='Go'>\n";
	}
	echo "</form>\n";
	echo "</font>\n";
}

function manageData( $cmd ) {
	global $mysqlHandle, $dbname, $tablename, $PHP_SELF;

	if( $cmd == "add" )
		echo "<h1>Add Data</h1>\n";
	else if( $cmd == "edit" ) {
		echo "<h1>Edit Data</h1>\n";
		$pResult = mysql_list_fields( $dbname, $tablename );
		$num = mysql_num_fields( $pResult );
	
		$key = "";
		for( $i = 0; $i < $num; $i++ ) {
			$field = mysql_fetch_field( $pResult, $i );
			if( $field->primary_key == 1 )
				if( $field->numeric == 1 )
					$key .= $field->name . "=" . $GLOBALS[$field->name] . " AND ";
				else
					$key .= $field->name . "='" . $GLOBALS[$field->name] . "' AND ";
		}
		$key = substr( $key, 0, strlen($key)-4 );

		mysql_select_db( $dbname, $mysqlHandle );
		$pResult = mysql_query( $queryStr =  "SELECT * FROM $tablename WHERE $key", $mysqlHandle );
		$data = mysql_fetch_array( $pResult );
	}

	echo "<p class=location>$dbname &gt; $tablename</p>\n";

	echo "<form action='$PHP_SELF' method=post>\n";
	if( $cmd == "add" )
		echo "<input type=hidden name=action value=addData_submit>\n";
	else if( $cmd == "edit" )
		echo "<input type=hidden name=action value=editData_submit>\n";
	echo "<input type=hidden name=dbname value=$dbname>\n";
	echo "<input type=hidden name=tablename value=$tablename>\n";
	echo "<table cellspacing=1 cellpadding=2>\n";
	echo "<tr>\n";
	echo "<th>Name</th>\n";
	echo "<th>Type</th>\n";
	echo "<th>Function</th>\n";
	echo "<th>Data</th>\n";
	echo "</tr>\n";

	$pResult = mysql_db_query( $dbname, "SHOW fields FROM $tablename" );
	$num = mysql_num_rows( $pResult );

	$pResultLen = mysql_list_fields( $dbname, $tablename );

	for( $i = 0; $i < $num; $i++ ) {
		$field = mysql_fetch_array( $pResult );
		$fieldname = $field["Field"];
		$fieldtype = $field["Type"];
		$len = mysql_field_len( $pResultLen, $i );

		echo "<tr>";
		echo "<td>$fieldname</td>";
		echo "<td>".$field["Type"]."</td>";
		echo "<td>\n";
		echo "<select name=${fieldname}_function>\n";
		echo "<option>\n";
		echo "<option>ASCII\n";
		echo "<option>CHAR\n";
		echo "<option>SOUNDEX\n";
		echo "<option>CURDATE\n";
		echo "<option>CURTIME\n";
		echo "<option>FROM_DAYS\n";
		echo "<option>FROM_UNIXTIME\n";
		echo "<option>NOW\n";
		echo "<option>PASSWORD\n";
		echo "<option>PERIOD_ADD\n";
		echo "<option>PERIOD_DIFF\n";
		echo "<option>TO_DAYS\n";
		echo "<option>USER\n";
		echo "<option>WEEKDAY\n";
		echo "<option>RAND\n";
		echo "</select>\n";
		echo "</td>\n";
		$value = htmlspecialchars($data[$i]);
		if( $cmd == "add" ) {
			$type = strtok( $fieldtype, " (,)\n" );
			if( $type == "enum" || $type == "set" ) {
				echo "<td>\n";
				if( $type == "enum" )
					echo "<select name=$fieldname>\n";
				else if( $type == "set" )
					echo "<select name=$fieldname size=4 multiple>\n";
				echo strtok( "'" );
				while( $str = strtok( "'" ) ) {
					echo "<option>$str\n";
					strtok( "'" );
				}
				echo "</select>\n";
				echo "</td>\n";
			} else {
				if( $len < 40 )
					echo "<td><input type=text size=40 maxlength=$len name=$fieldname></td>\n";
				else
					echo "<td><textarea cols=40 rows=3 maxlength=$len name=$fieldname></textarea>\n";
			}
		} else if( $cmd == "edit" ) {
			$type = strtok( $fieldtype, " (,)\n" );
			if( $type == "enum" || $type == "set" ) {
				echo "<td>\n";
				if( $type == "enum" )
					echo "<select name=$fieldname>\n";
				else if( $type == "set" )
					echo "<select name=$fieldname size=4 multiple>\n";
				echo strtok( "'" );
				while( $str = strtok( "'" ) ) {
					if( $value == $str )
						echo "<option selected>$str\n";
					else
						echo "<option>$str\n";
					strtok( "'" );
				}
				echo "</select>\n";
				echo "</td>\n";
			} else {
				if( $len < 40 )
					echo "<td><input type=text size=40 maxlength=$len name=$fieldname value=\"$value\"></td>\n";
				else
					echo "<td><textarea cols=40 rows=3 maxlength=$len name=$fieldname>$value</textarea>\n";
			}
		}
		echo "</tr>";
	}
	echo "</table><p>\n";
	if( $cmd == "add" )
		echo "<input type=submit value='Add Data'>\n";
	else if( $cmd == "edit" )
		echo "<input type=submit value='Edit Data'>\n";
	echo "<input type=button value='Cancel' onClick='history.back()'>\n";
	echo "</form>\n";
}

function manageData_submit( $cmd ) {
	global $mysqlHandle, $dbname, $tablename, $fieldname, $PHP_SELF, $queryStr, $errMsg;

	$pResult = mysql_list_fields( $dbname, $tablename );
	$num = mysql_num_fields( $pResult );

	mysql_select_db( $dbname, $mysqlHandle );
	if( $cmd == "add" )
		$queryStr = "INSERT INTO $tablename VALUES (";
	else if( $cmd == "edit" )
		$queryStr = "REPLACE INTO $tablename VALUES (";
	for( $i = 0; $i < $num-1; $i++ ) {
		$field = mysql_fetch_field( $pResult );
		$func = $GLOBALS[$field->name."_function"];
		if( $func != "" )
			$queryStr .= " $func(";
		if( $field->numeric == 1 ) {
			$queryStr .= $GLOBALS[$field->name];
			if( $func != "" )
				$queryStr .= "),";
			else
				$queryStr .= ",";
		} else {
			$queryStr .= "'" . $GLOBALS[$field->name];
			if( $func != "" )
				$queryStr .= "'),";
			else
				$queryStr .= "',";
		}
	}
	$field = mysql_fetch_field( $pResult );
	if( $field->numeric == 1 )
		$queryStr .= $GLOBALS[$field->name] . ")";
	else 
		$queryStr .= "'" . $GLOBALS[$field->name] . "')";

	mysql_query( $queryStr , $mysqlHandle );
	$errMsg = mysql_error();

	viewData( "" );
}

function deleteData() {
	global $mysqlHandle, $dbname, $tablename, $fieldname, $PHP_SELF, $queryStr, $errMsg;

	$pResult = mysql_list_fields( $dbname, $tablename );
	$num = mysql_num_fields( $pResult );

	$key = "";
	for( $i = 0; $i < $num; $i++ ) {
		$field = mysql_fetch_field( $pResult, $i );
		if( $field->primary_key == 1 )
			if( $field->numeric == 1 )
				$key .= $field->name . "=" . $GLOBALS[$field->name] . " AND ";
			else
				$key .= $field->name . "='" . $GLOBALS[$field->name] . "' AND ";
	}
	$key = substr( $key, 0, strlen($key)-4 );

	mysql_select_db( $dbname, $mysqlHandle );
	$queryStr =  "DELETE FROM $tablename WHERE $key";
	mysql_query( $queryStr, $mysqlHandle );
	$errMsg = mysql_error();

	viewData( "" );
}

function dump() {
	global $PHP_SELF, $USERNAME, $PASSWORD, $action, $dbname, $tablename;

	if( $action == "dumpTable" )
		$filename = $tablename;
	else
		$filename = $dbname;

	header("Content-disposition: filename=$filename.sql");
	header("Content-type: application/octetstream");
	header("Pragma: no-cache");
	header("Expires: 0");

	$pResult = mysql_query( "show variables" );
	while( 1 ) {
		$rowArray = mysql_fetch_row( $pResult );
		if( $rowArray == false ) break;
		if( $rowArray[0] == "basedir" )
			$bindir = $rowArray[1]."bin/";
	}

	exec( $bindir."mysqldump --user=$USERNAME --password=$PASSWORD $dbname $tablename" );
}

function utils() {
	global $PHP_SELF, $command;
	echo "<h1>Utilities</h1>\n";
	if( $command == "" || substr( $command, 0, 5 ) == "flush" ) {
		echo "<hr>\n";
		echo "Show\n";
		echo "<ul>\n";
		echo "<li><a href='$PHP_SELF?action=utils&command=show_status'>Status</a>\n";
		echo "<li><a href='$PHP_SELF?action=utils&command=show_variables'>Variables</a>\n";
		echo "<li><a href='$PHP_SELF?action=utils&command=show_processlist'>Processlist</a>\n";
		echo "</ul>\n";
		echo "Flush\n";
		echo "<ul>\n";
		echo "<li><a href='$PHP_SELF?action=utils&command=flush_hosts'>Hosts</a>\n";
		if( $command == "flush_hosts" ) {
			if( mysql_query( "Flush hosts" ) != false )
				echo "<font size=2 color=red>- Success</font>";
			else
				echo "<font size=2 color=red>- Fail</font>";
		}
		echo "<li><a href='$PHP_SELF?action=utils&command=flush_logs'>Logs</a>\n";
		if( $command == "flush_logs" ) {
			if( mysql_query( "Flush logs" ) != false )
				echo "<font size=2 color=red>- Success</font>";
			else
				echo "<font size=2 color=red>- Fail</font>";
		}
		echo "<li><a href='$PHP_SELF?action=utils&command=flush_privileges'>Privileges</a>\n";
		if( $command == "flush_privileges" ) {
			if( mysql_query( "Flush privileges" ) != false )
				echo "<font size=2 color=red>- Success</font>";
			else
				echo "<font size=2 color=red>- Fail</font>";
		}
		echo "<li><a href='$PHP_SELF?action=utils&command=flush_tables'>Tables</a>\n";
		if( $command == "flush_tables" ) {
			if( mysql_query( "Flush tables" ) != false )
				echo "<font size=2 color=red>- Success</font>";
			else
				echo "<font size=2 color=red>- Fail</font>";
		}
		echo "<li><a href='$PHP_SELF?action=utils&command=flush_status'>Status</a>\n";
		if( $command == "flush_status" ) {
			if( mysql_query( "Flush status" ) != false )
				echo "<font size=2 color=red>- Success</font>";
			else
				echo "<font size=2 color=red>- Fail</font>";
		}
		echo "</ul>\n";
	} else {
		$queryStr = ereg_replace( "_", " ", $command );
		$pResult = mysql_query( $queryStr );
		if( $pResult == false ) {
			echo "Fail";
			return;
		}
		$col = mysql_num_fields( $pResult );

		echo "<p class=location>$queryStr</p>\n";
		echo "<hr>\n";

		echo "<table cellspacing=1 cellpadding=2 border=0>\n";
		echo "<tr>\n";
		for( $i = 0; $i < $col; $i++ ) {
			$field = mysql_fetch_field( $pResult, $i );
			echo "<th>".$field->name."</th>\n";
		}
		echo "</tr>\n";

		while( 1 ) {
			$rowArray = mysql_fetch_row( $pResult );
			if( $rowArray == false ) break;
			echo "<tr>\n";
			for( $j = 0; $j < $col; $j++ )
				echo "<td>".htmlspecialchars( $rowArray[$j] )."</td>\n";
			echo "</tr>\n";
		}
		echo "</table>\n";
	}
}

function header_html() {
	global $PHP_SELF;
	
?>
<html>
<head>
<title>MySQL Web Interface</title>
<style type="text/css">
<!--
p.location {
	color: #11bb33;
	font-size: small;
}
h1 {
	color: #A4A260;
}
th {
	background-color: #BDBE42;
	color: #FFFFFF;
	font-size: x-small;
}
td {
	background-color: #DEDFA5;
	font-size: x-small;
}
form {
	margin-top: 0;
	margin-bottom: 0;
}
a {
	text-decoration:none;
	color: #848200;
	font-size:x-small;
}
a:link {
}
a:hover {
	background-color:#EEEFD5;
	color:#646200;
	text-decoration:none               
}
//-->
</style>
</head>
<body>
<?
}

function footer_html() {
	global $mysqlHandle, $dbname, $tablename, $PHP_SELF, $USERNAME;

	echo "<hr>\n";
	echo "<font size=2>\n";
	echo "<font color=blue>[$USERNAME]</font> - \n";

	echo "<a href='$PHP_SELF?action=listDBs'>Database List</a> | \n";
	if( $tablename != "" )
		echo "<a href='$PHP_SELF?action=listTables&dbname=$dbname&tablename=$tablename'>Table List</a> | ";
	echo "<a href='$PHP_SELF?action=utils'>Utils</a> |\n";
	echo "<a href='$PHP_SELF?action=logout'>Logout</a>\n";
	echo "</font>\n";
	echo "</body>\n";
	echo "</html>\n";
}

//------------------------------------------------------ MAIN

if( $action == "logon" || $action == "" || $action == "logout" )
	logon();
else if( $action == "logon_submit" )
	logon_submit();
else if( $action == "dumpTable" || $action == "dumpDB" ) {
	while( list($var, $value) = each($HTTP_COOKIE_VARS) ) {
		if( $var == "mysql_web_admin_username" ) $USERNAME = $value;
		if( $var == "mysql_web_admin_password" ) $PASSWORD = $value;
	}
	$mysqlHandle = mysql_pconnect( $HOSTNAME, $USERNAME, $PASSWORD );
	dump();
} else {
	while( list($var, $value) = each($HTTP_COOKIE_VARS) ) {
		if( $var == "mysql_web_admin_username" ) $USERNAME = $value;
		if( $var == "mysql_web_admin_password" ) $PASSWORD = $value;
	}
	echo "<!--";
	$mysqlHandle = mysql_pconnect( $HOSTNAME, $USERNAME, $PASSWORD );
	echo "-->";

	if( $mysqlHandle == false ) {
		echo "<html>\n";
		echo "<head>\n";
		echo "<title>MySQL Web Interface</title>\n";
		echo "</head>\n";
		echo "<body>\n";
		echo "<table width=100% height=100%><tr><td><center>\n";
		echo "<h1>Wrong Password!</h1>\n";
		echo "<a href='$PHP_SELF?action=logon'>Logon</a>\n";
		echo "</center></td></tr></table>\n";
		echo "</body>\n";
		echo "</html>\n";
	} else {
		header_html();
		if( $action == "listDBs" )
			listDatabases();
		else if( $action == "createDB" )
			createDatabase();
		else if( $action == "dropDB" )
			dropDatabase();
		else if( $action == "listTables" )
			listTables();
		else if( $action == "createTable" )
			createTable();
		else if( $action == "dropTable" )
			dropTable();
		else if( $action == "viewSchema" )
			viewSchema();
		else if( $action == "query" )
			viewData( $queryStr );
		else if( $action == "addField" )
			manageField( "add" );
		else if( $action == "addField_submit" )
			manageField_submit( "add" );
		else if( $action == "editField" )
			manageField( "edit" );
		else if( $action == "editField_submit" )
			manageField_submit( "edit" );
		else if( $action == "dropField" )
			dropField();
		else if( $action == "viewData" )
			viewData( "" );
		else if( $action == "addData" )
			manageData( "add" );
		else if( $action == "addData_submit" )
			manageData_submit( "add" );
		else if( $action == "editData" )
			manageData( "edit" );
		else if( $action == "editData_submit" )
			manageData_submit( "edit" );
		else if( $action == "deleteData" )
			deleteData();
		else if( $action == "utils" )
			utils();

		mysql_close( $mysqlHandle);
		footer_html();
	}
}

?>