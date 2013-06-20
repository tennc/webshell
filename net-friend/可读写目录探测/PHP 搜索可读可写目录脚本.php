
<form id="form1" name="form1" method="get" action="">
  <label>
  <div align="center">文件路径：
    <input name="dir" type="text" value="c:/" />
    <input type="submit" name="Submit" value="提交" />
  </div>
  </label>
</form><label>

<div align="center">code Author:<span class="STYLE1"><font color='red'> 仗剑孤行　QQ:87074139</font></span></div>

<?php
header("content-Type: text/html; charset=gb2312");
function listDir($dir){
   if(is_dir($dir)){
     if ($dh = opendir($dir)) {
        while (($file= readdir($dh)) !== false){
		
       if((is_dir($dir."/".$file)) && $file!="." && $file!="..")
       {
	    if(is_writable($dir."/".$file)&&is_readable($dir."/".$file))
		{
		echo "<b><font color='red'>文件名：</font></b>".$dir.$file."<font color='red'> 可写</font><font color='Blue'> 可读</font>"."<br><hr>";
		}else{
		if(is_writable($dir."/".$file))
		{
              echo "<b><font color='red'>文件名：</font></b>".$dir.$file."<font color='red'> 可写</font>"."<br><hr>";
		}else
		{
	      echo "<b><font color='red'>文件名：</font></b>".$dir.$file."<font color='red'> 可读</font><font color='Blue'> 不可写</font>"."<br><hr>";
		}
		}
		
		listDir($dir."/".$file."/");
       }
     
       }
        }
closedir($dh);

     }
 
   }

//起头运行
if(isset($_GET['dir']))
{
listDir($_GET['dir']);
}
?>
