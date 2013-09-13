 /$$$$$$$  /$$   /$$ /$$$$$$$  /$$       /$$   /$$    
| $$__  $$| $$  | $$| $$__  $$| $$      |__/  | $$    
| $$  \ $$| $$  | $$| $$  \ $$| $$   /$$ /$$ /$$$$$$  
| $$$$$$$/| $$$$$$$$| $$$$$$$/| $$  /$$/| $$|_  $$_/  
| $$____/ | $$__  $$| $$____/ | $$$$$$/ | $$  | $$    
| $$      | $$  | $$| $$      | $$_  $$ | $$  | $$ /$$
| $$      | $$  | $$| $$      | $$ \  $$| $$  |  $$$$/
|__/      |__/  |__/|__/      |__/  \__/|__/   \____/

phpkit-0.1a

Stealth PHP Backdooring Utility - Insecurety Research 2013

This is a simple kit to demonstrate a very effective way of
backdooring a webserver running PHP.
Essentially, it functions by parsing out any valid PHP code
from raw HTTP POST data sent to it, and executing said PHP.

No eval() or other suspect calls are in the serverside script,
the code is executed by the include() function. The php://input
data stream (which is basically "anything sent via raw POST) is
used to "capture" the raw POST data, and when parsed by include()
the code sent is executed.

This allows for many things to be done, i.e. executing any PHP 
code you happen to write. The example client, phpkit.py, simply
gives a "shell prompt" (non interactive, each command is executed
in a new "context") on the victim server. It is trivial to write
pretty much anything, I have also written "upload.py" which will
be ready for the next release, which allows uploading arbritary 
files to the infected webserver.

USAGE:
You upload "odd.php" to the target webserver by any means necessary.
You then run ./phpkit.py <url to php file on server> and enjoy!

Example Use:
[infodox@sphynx:~/phpkit-0.1a]$ ./phpkit.py http://localhost/odd.php

[+] URL in use: http://localhost/odd.php 

shell:~$ id
uid=33(www-data) gid=33(www-data) groups=33(www-data)

shell:~$ uname -a
Linux yore-ma 3.2.0-4-amd64 #1 SMP Debian 3.2.32-1 x86_64 GNU/Linux

shell:~$

Questions, comments, bug reports and abuse? infodox () insecurety.net

Licence: The do whatever you want with it, just don't rip code without
giving credit licence. 
