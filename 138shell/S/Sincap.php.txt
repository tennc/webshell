<html>

<head>
<meta http-equiv="Content-Language" content="tr">
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<title>:: AventGrup ::.. - Sincap 1.0 | Session(Oturum) Böceği&nbsp;&nbsp; </title>
</head>

<body text="#008000" bgcolor="#808080" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">

<table border="0" width="100%" id="table1" cellspacing="0" cellpadding="0" height="108">
	<tr>
    <td width="70" bgcolor="#000000" height="83">
    <p align="center">
    <img border="0" src="http://www.aventgrup.net/avlog.gif"></td>
    <td width="501" bgcolor="#000000" height="83" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#B7B7B7">
    <span style="font-weight: 700">
    <br>
    AventGrup©<br>
    </span>Avrasya Veri ve NetWork Teknolojileri Geliştirme Grubu<br>
    <span style="font-weight: 700">
    <br>
    Sincap 1.0</span></font></td>
    <td width="431" bgcolor="#000000" height="83" valign="top">
    <p align="right"><span style="font-weight: 700">
    <font face="Verdana" color="#858585" style="font-size: 2pt"><br>
    <br>
    </font><br>
    <font color="#858585" face="Verdana" style="font-size: 8pt">www.aventgrup.net&nbsp;<br>
    </font></span><a href="mailto:shopen@aventgrup.net">
	<font face="Verdana" style="font-size: 8pt; text-decoration: none" color="#C0C0C0">
	info@aventgrup.net</font></a><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;</font></td>
  	</tr>
	<tr>
    <td width="1002" bgcolor="#484848" height="25" colspan="3">
    <font color="#E5E5E5" style="font-size: 8pt; font-weight: 700" face="Arial">&nbsp; 
	Linux Sessin ( Oturum ) Böceği</font></td>
    </tr>
</table>

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#800000" width="100%" id="AutoNumber1">
  <tr>
    <td width="8%" bgcolor="#B6B6B6">
    <font face="Verdana" style="font-size: 8pt; font-weight: 700" color="#000000">&nbsp;S. 
    No</font></td>
    <td width="25%" bgcolor="#B6B6B6">
    <font face="Verdana" style="font-size: 8pt; font-weight: 700" color="#000000">&nbsp;Oturum 
    Adı</font></td>
    <td width="42%" bgcolor="#B6B6B6">
    <font face="Verdana" style="font-size: 8pt; font-weight: 700" color="#000000">&nbsp;Oturum 
    Değeri</font></td>
    <td width="25%" bgcolor="#B6B6B6">
    <font face="Verdana" style="font-size: 8pt; font-weight: 700" color="#000000">&nbsp;Referans</font></td>
  </tr>
<tr>


<?
if ($sedat=@opendir("/tmp")){
while (($ekinci=readdir ($sedat))){
if (is_file("/tmp/$ekinci")){
if($ekinci>"sess_"){
$asortik=$ekinci;
$baglan=fopen("/tmp/$ekinci",'r');
while(! feof ( $baglan ) ){
$okunan=fgets($baglan,1024);
$toplam="$toplam$okunan";
} fclose($baglan); 
};
?>



<?
}}}
closedir($sedat);
?>

<?
$metin=$toplam;
$i=explode(";",$metin);
?>




<?
foreach($i as $yeni){
$tampon=explode("|",$yeni);
$deger1= "$tampon[0]";
$ich=explode(":",$tampon[1]);
$tampon3=count($ich);
$tampon4=$tampon3-1;
$deger2= "$ich[$tampon4]";
$is++;
$temizleme=array(
'"'=>'',
'v'=>'',
'c'=>''
);
$degerT= strtr($deger2,$temizleme);
?>
    <td width="8%" bgcolor="#E5E5E5" align="left" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#000000">&nbsp;<?echo $is;?></font></td>
    <td width="25%" bgcolor="#E5E5E5" align="left" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#000000">&nbsp;<?echo $deger1;?></font></td>
    <td width="42%" bgcolor="#E5E5E5" align="left" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#000000">&nbsp;<?echo $degerT;?></font></td>
    <td width="25%" bgcolor="#E5E5E5" align="left" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#000000">&nbsp;-</td>

</tr>
<?};?>

</table>

</body>

</html>


