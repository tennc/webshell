<?
#########################################################################################
# 			    Antichat Socks5 Server v 1.0				#
#########################################################################################
#                                                          ____________________________ #
#   Features:						  |                             #
#   				                          |   written by Zadoxlik       #
#   [+] LOGIN/PASSWORD authorization                      |   zàdoxlik@antichat[dîò]ru  #
#   [-] Any other authorization type                      |   icq: 511501	        #
#   [+] Threads                                           |   www.zadoxlik.info         #
#   [+] CONNECT method                                    |   www.antichat.ru           #
#   [-] BIND method                                       |____________________________ #
#   [-] UDP ASSOCIATE method								#
#   [+] Unix platform									#
#   [+] Windows platform                                                                #
#   [+] Ipv4 address type                                                               #
#   [+] Domain name address type                                                        #
#   [-]	Ipv6 address type					                        #
#                                                                                       #
# Documents                                                                             #
#                                                                                       #
# ftp://ftp.rfc-editor.org/in-notes/rfc1928.txt                                         #
# ftp://ftp.rfc-editor.org/in-notes/rfc1929.txt                                         #
#                                                         				#
#                                                                                       #
#########################################################################################
# Cool niggas are FUF, SkvoznoY, KEZ, ZaCo, Egorich and all my friends	=)		#
#########################################################################################
/*-------------------------------------------------------------------------------------*\
|                      		S E T T I N G S                                       	|
\*-------------------------------------------------------------------------------------*/

$settings	= array('PORT'			=> 4001,
			'AUTH'			=> 0,
			'STOPFILE'		=> 'stop.txt',	// create this file
								// to stop the server
			'LOGIN'			=> 'someshit',	// if AUTH == 1
			'PASSWORD'		=> '666',	// if AUTH == 1
			'MAX_CONNECTIONS'	=> 5,
			'LOG_FILE'		=> -1,		// if -1 - no logs
			'AUTH_TIMEOUT'		=> 60,		// sec
			'CONNECT_TIMEOUT'	=> 5,		// Timeout for connection
								// to remote server (sec)
		       );
// Remote hosts, which are not supported for working with
$blocked_hosts  = array('81.177.6.78',
			'88.212.221.34',

		       );
// Client hosts, which are not supported for working with (banned)
$blocked_users  = array('127.0.0.2'
		       );
/*-------------------------------------------------------------------------------------*/

set_time_limit(0) OR DIE('set_time_limit(0) failed');
error_reporting(0);

/*-------------------------------------------------------------------------------------*\
|                      	     D E F I N I T I O N S                                    	|
\*-------------------------------------------------------------------------------------*/
DEFINE('VER',			"\x05");
DEFINE('CONNECT',		"\x01");
DEFINE('AUTH_METHOD',		"\x02");
DEFINE('AUTH_NOT_REQ',		"\x00");
DEFINE('WRONG_AUTH_METHODS',	"\xFF");
DEFINE('REP_SUCCESS',		"\x00");
DEFINE('REP_WRONG_COMMAND',	"\x07");
DEFINE('REP_SOCKS_ERROR',	"\x01");
DEFINE('REP_BLOCKED_HOST',	"\x02");
DEFINE('REP_BAD_HOST',		"\x04");
DEFINE('IPv4',			"\x01");
DEFINE('DOMAIN',		"\x03");
DEFINE('CLOSED_SOCKET',		-12);
DEFINE('NO_DATA',		-11);
DEFINE('NOT_ALL_DATA',		-10);
DEFINE('STATUS_RECVSTARTREQ',	-9);
DEFINE('STATUS_RECVAUTHREQ',	-8);
DEFINE('STATUS_REQUESTRECV',	-7);
DEFINE('STATUS_CONNECTING',	-6);
DEFINE('STATUS_WORKING',	-5);

/*-------------------------------------------------------------------------------------*/
$clientsockets	= array();
$serversockets	= array();
$recvdata	= array();
$sockets_status	= array();
$timeout        = array();
$reqmessage     = array();
$ipport		= array();
/*-------------------------------------------------------------------------------------*\
|                      	     F U N C T I O N S                                    	|
\*-------------------------------------------------------------------------------------*/
function getstring(&$s, $len = 1){

        if(@($message = socket_recv($s, &$com, $len, 0)) === 0)
		return CLOSED_SOCKET;
	elseif($message === FALSE)
		return NO_DATA;
	else
		return $com;

}

function sendstring(&$s, $mess){
	return socket_write($s,  $mess, strlen($mess));
}

function BridgeEstablish2($id){
	global	$serversockets, $clientsockets, $sockets_status, $settings, $reqmessage,
		$timeout, $ipport;
	sendstring($clientsockets[$id],	VER.REP_SUCCESS."\x00\x01".$ipport[$id]);
	$sockets_status[$id] = STATUS_WORKING;
	
}

function BridgeEstablish1($id){
	global	$serversockets, $clientsockets, $sockets_status, $settings, $reqmessage,
		$timeout, $blocked_hosts, $ipport;
	$message = '';
	if(($message = getstring($clientsockets[$id], 100)) === CLOSED_SOCKET){
		close($id);
		return CLOSED_SOCKET;
	}
	elseif($message === NO_DATA)
		return NOT_ALL_DATA;
        @$reqmessage[$id] .= $message;
        // Checking the packet
        if($reqmessage[$id][0] !== VER){
		close($id);
		return CLOSED_SOCKET;
	}

	if(!isset($reqmessage[$id][1]))
		return NOT_ALL_DATA;
	if($reqmessage[$id][1] !== CONNECT)
	{
	        socket_getsockname ($clientsockets[$id], $addr, $port);
		$addr = explode('.', $addr);
		for($i = 0; $i < 4; $i++)
			$addr[$i] = chr($addr[$i]);
		$addr = implode('', $addr);
	        sendstring($clientsockets[$id],	VER.REP_WRONG_COMMAND."\x00\x01\x00".
		"\x00\x00\x00\x00\x00");
		close($id);
		return CLOSED_SOCKET;
	}
	if(!isset($reqmessage[$id][2]))
		return NOT_ALL_DATA;
	if($reqmessage[$id][2] !== "\x00")
	{
		close($id);
		return CLOSED_SOCKET;
	}

	if(!isset($reqmessage[$id][3]))
		return NOT_ALL_DATA;

	if($reqmessage[$id][3] !== DOMAIN && $reqmessage[$id][3] !== IPv4)
	{
		close($id);
		return CLOSED_SOCKET;
	}
	if(!isset($reqmessage[$id][4]))
		return NOT_ALL_DATA;
	if($reqmessage[$id][3] === DOMAIN){
		$reqlen = ord($reqmessage[$id][4])+1;
		if(!isset($reqmessage[$id][3+$reqlen]))
			return NOT_ALL_DATA;
		$host = substr($reqmessage[$id], 5, $reqlen-1);

	}
	else{ // IP v4
		$reqlen = 4;
 		if(!isset($reqmessage[$id][3+$reqlen]))
			return NOT_ALL_DATA;
                $host = base_convert(bin2hex($reqmessage[$id][4]), 16, 10).'.'.
			base_convert(bin2hex($reqmessage[$id][5]), 16, 10).'.'.
			base_convert(bin2hex($reqmessage[$id][6]), 16, 10).'.'.
			base_convert(bin2hex($reqmessage[$id][7]), 16, 10);
	}
	if(!isset($reqmessage[$id][3+$reqlen+2]))
		return NOT_ALL_DATA;
	socket_getsockname ($clientsockets[$id], $self_addr, $self_port);

	$self_addr = explode('.', $self_addr);
	for($i = 0; $i < 4; $i++)
		$self_addr[$i] = chr($self_addr[$i]);
	$self_add	= implode('', $self_addr);
	$self_port	= pack('n', $self_port);
	$ipport[$id]    = $self_add.$self_port;
	
	if(in_array($host, $blocked_hosts)){
		
	        sendstring($clientsockets[$id],	VER.REP_BLOCKED_HOST."\x00\x01".$ipport[$id]);
		close($id);
		return CLOSED_SOCKET;
	}
	$port = base_convert(bin2hex(substr($reqmessage[$id], 3+$reqlen+1, 2)), 16, 10);
	// Connection to remote host
	
	$serversockets[$id]	= socket_create(AF_INET, SOCK_STREAM, 6 /* TCP*/);
	if($serversockets[$id]	=== FALSE){
		
	        sendstring($clientsockets[$id],	VER.REP_SOCKS_ERROR."\x00\x01".$ipport[$id]);
		close($id);
		return CLOSED_SOCKET;
	}
	socket_set_nonblock($serversockets[$id]);
	//echo $host.':'.$port;
	socket_connect($serversockets[$id], $host, $port);
	unset($reqmessage[$id]);
	$sockets_status[$id] = STATUS_CONNECTING;
	
}

function Authorization($id){
	global	$serversockets, $clientsockets, $sockets_status, $settings, $reqmessage,
		$timeout;
	$message = '';
	if(($message = getstring($clientsockets[$id], 100)) === CLOSED_SOCKET){
		close($id);
		return CLOSED_SOCKET;
	}
	elseif($message === NO_DATA)
		return NOT_ALL_DATA;
	@$reqmessage[$id] .= $message;
	if($reqmessage[$id][0] != "\x01"){
		close($id);
		return CLOSED_SOCKET;
	}
	if(!isset($reqmessage[$id][1]))
		return NOT_ALL_DATA;

	$pos    = ord($reqmessage[$id][1])+2;
	if(!isset($reqmessage[$id][$pos]))
		return NOT_ALL_DATA;
	if(!isset($reqmessage[$id][$pos+ord($reqmessage[$id][$pos])]))
		return NOT_ALL_DATA;

	// Authorization
	if($settings['LOGIN']	 === substr($reqmessage[$id], 2, ord($reqmessage[$id][1]))
	&& $settings['PASSWORD'] === substr($reqmessage[$id], $pos+1,
	ord($reqmessage[$id][$pos])))
	{
	        $timeout[$id]		= time();
		unset($reqmessage[$id]);
		$sockets_status[$id]	= STATUS_REQUESTRECV;
		sendstring($clientsockets[$id],	"\x01\x00");
	}
	else{
		sendstring($clientsockets[$id],	"\x01\x01");
		close($id);
	}

}

function close($id){
	global	$serversockets, $clientsockets, $sockets_status, $settings, $reqmessage,
		$timeout, $ipport;
        socket_getpeername($clientsockets[$id], $ip);
	@socket_close($clientsockets[$id]);
        unset($clientsockets[$id]);
	@socket_close($serversockets[$id]);
	unset($serversockets[$id]);
	unset($sockets_status[$id]);
	unset($timeout[$id]);
	unset($ipport[$id]);
	
	makelog($ip.' disconnected.');
}

function Start($id){
	global	$serversockets, $clientsockets, $sockets_status, $settings, $reqmessage,
		$timeout;
	$message = '';
	if(($message = getstring($clientsockets[$id], 10)) === CLOSED_SOCKET){
		close($id);
		return CLOSED_SOCKET;
	}
	
	elseif($message === NO_DATA)
		return NOT_ALL_DATA;
        @$reqmessage[$id] .= $message;
        // Checking the packet
        if($reqmessage[$id][0] !== VER){
		close($id);
		return CLOSED_SOCKET;
	}

	if(!isset($reqmessage[$id][1]))
		return NOT_ALL_DATA;

	if(ord($reqmessage[$id][1]) > strlen($reqmessage[$id]) - 2)
		return NOT_ALL_DATA;
	elseif(ord($reqmessage[$id][1]) === strlen($reqmessage[$id]) - 2){
		if($settings['AUTH'] !== 1){
			sendstring($clientsockets[$id],	VER.AUTH_NOT_REQ);
			unset($reqmessage[$id]);
			$sockets_status[$id]	= STATUS_REQUESTRECV;
			$timeout[$id]           = time();
			return 0;
		}
	
		if(strstr(substr($reqmessage[$id], 2, ord($reqmessage[$id][1])), AUTH_METHOD))
		{
		        $timeout[$id]		= time();
			$sockets_status[$id]	= STATUS_RECVAUTHREQ;
			sendstring($clientsockets[$id],	VER.AUTH_METHOD);
			unset($reqmessage[$id]);
			return 0;
		}
		else{
			sendstring($clientsockets[$id],	VER.WRONG_AUTH_METHODS);
			return 0;
			close($id);
			return CLOSED_SOCKET;
		}
		$sockets_status[$id] = STATUS_REQUEST;
		return 0;
	}
	else{
		close($id);
		
		return CLOSED_SOCKET;
	}
}

function one_array($f, $s){
	$new_array = array();
	foreach($f as $elt)
		if(!in_array($elt, $s))
			array_push($new_array, $elt);
	return array_merge_recursive($new_array, $s);

}

function makelog($string){
	global $settings;
	if($settings['LOG_FILE'] == -1)
		return FALSE;
	$fp = fopen($settings['LOG_FILE'], 'a');
	fputs($fp, date("d.m.Y. H:i:s").'  '.$string."\r\n".
	"---------------------------------------------------------\r\n");
	fclose($fp);
}

function stop(){
	global	$serversockets, $clientsockets, $sockets_status, $settings, $reqmessage,
		$timeout;
	for($i = 0; $i < sizeof($clientsockets); $i++)
		close($i);
	makelog('Finish!: '.$string);
	DIE();
}

function error($string){
	makelog('<<ERROR>>: '.$string);
	stop();
	DIE();
}
/*-------------------------------------------------------------------------------------*/

/*-------------------------------------------------------------------------------------*\
|                      	     P R O G R A M M                                    	|
\*-------------------------------------------------------------------------------------*/

$sock =	socket_create(AF_INET, SOCK_STREAM, 6 /* TCP*/) OR
	DIE(socket_strerror(socket_last_error()));
if(!socket_bind($sock,  "0.0.0.0", $settings['PORT']))
	error(socket_strerror(socket_last_error($sock)));

if(!socket_listen ($sock))
	error(socket_strerror(socket_last_error($sock)));
socket_set_nonblock($sock);
$maxcount	= $settings['MAX_CONNECTIONS'] + 1;
$sock		= array($sock);

while(TRUE){

	$readed = $wr = array_merge($sock, $clientsockets);
	if(socket_select($readed, $wr, $exc = NULL, 7) < 1){
           
           if(file_exists($settings['STOPFILE']))
                stop();
           continue;
	}
	if (in_array($sock[0], $readed)){
  		$clientsockets[] = ($cl_sock = socket_accept($sock[0]));
  		socket_getpeername($cl_sock, $ip);
  		makelog($ip.' connected to server.');
		$id = array_search($cl_sock, $clientsockets);
		if(count($clientsockets) >= $maxcount){
			socket_close($cl_sock);
			unset($clientsockets[$id]);
			makelog('Connection with '.$ip.' has been aborted by server. '.
			'Reason: too many connections.');
		}
		elseif(in_array($ip, $blocked_users)){
			socket_close($newsock);
			unset($clientsockets[$id]);
			makelog('Connection with '.$ip.' has been aborted by server. '.
			'Reason: banned user.');
		}
		else{
	                socket_set_nonblock($cl_sock);
	                $sockets_status[$id] = STATUS_RECVSTARTREQ;
		}

		$key = array_search($sock[0], $readed);
		unset($readed[$key]);
	}
	$array_status = one_array($readed, $wr);
	foreach($array_status as $socket){
		$id = array_search($socket, $clientsockets);
		if($id === FALSE)
			$id = array_search($socket, $serversockets);
		if($id === FALSE)
			continue;
		switch ($sockets_status[$id]){
	 		case STATUS_RECVAUTHREQ:
	 		        if(time() - $timeout[$id] > $settings['AUTH_TIMEOUT'])
				{       //echo 'aaaaa';
				 	close($id);
				 	break;
				}
				Authorization($id);
			break;
	 		case STATUS_REQUESTRECV:

				BridgeEstablish1($id);
			break;
			case STATUS_RECVSTARTREQ:
				Start($id);
					
			break;
			case STATUS_CONNECTING:
				
				if(time() - $timeout[$id] > $settings['CONNECT_TIMEOUT'])
				{
					sendstring($clientsockets[$id],	VER.REP_BAD_HOST.
					"\x00\x01".$ipport[$id]);
					close($id);
				 	break;
				}
				// checkin remote host
				$exr = $ewr = array($serversockets[$id]);
				if(socket_select($exr, $ewr, $exc = NULL, 0) > 0)
	 				BridgeEstablish2($id);
			break;
			default: // STATUS_WORKING
			        $mes= getstring($clientsockets[$id], 8024);
                                if($mes === CLOSED_SOCKET){
					close($id);
					break;
				}
				if($mes !== NO_DATA)
				if(sendstring($serversockets[$id], $mes) === FALSE){
					close($id);
					break;
				}
                                $mes = getstring($serversockets[$id], 8024);
                                if($mes === CLOSED_SOCKET){
					close($id);
					break;
				}
				if($mes !== NO_DATA)
				if(sendstring($clientsockets[$id], $mes) === FALSE){
					close($id);
					break;
				}
			}
				



	}
	if(rand(1,5) == 5)
		if(file_exists($settings['STOPFILE']))
			stop();
}

/*-------------------------------------------------------------------------------------*/
?>


