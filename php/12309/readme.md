site:  https://github.com/kairn/12309.php

DESCRIPTION:
12309.php is advanced webshell with the main aim at executing shell commands in all possible ways. it has some additional functions though.

 FEATURES:
 - you could choose desired function to execute code with (+pcntl_exec +ssh2_exec)
 - internal Perl, Python and SSI mini-webshells - save them to disk and run, if php system functions are disabled
 - backconnect/bind port on PHP, Python, and "classic" perl and C backconnect/bind. Also there are several small one-line backconnects on different languages, useful too coz they do not need to save temporary file somewhere
 - fully interactive backconnect on Python (yes, you can run even vim & mc via backconnect!)
 - on old php versions (such as 5.1.6, 5.2.9) this script could bypass open_basedir and read other users` files (if you`re running it with webserver`s rights, i.e. kind of apache-mpm-prefork or -worker, not kind of -itk or -peruser, and if your account is not in chroot/jail). Also there is ability to read files with mysql and with usual file_get_contents
 - nice extra functions (file manager, file editor, system info, text coders/decoders, local open ports scanner, etc)

 LICENSE:
3-clause BSD:
http://en.wikipedia.org/wiki/BSD_licenses#3-clause_license_.28.22New_BSD_License.22_or_.22Modified_BSD_License.22.29
Copyright © 2010-2011, 12309, jabber: z12309@exploit.im, url: https://github.com/kairn/12309.php
parts of code are licensed under GPL, CC, BSD, WTFPL. if your religion forbids using one of these licenses, do not use this script.

 THANKS:
thanks for your help: Tidus, Shift, pekayoba, Zer0, ForeverFree, r00nix
and all people whose code i borrowed: Endeveit, Michael Schierl, b374k, tex, ont.rif, oRb, Eric A. Meyer, Eugen, profexer, Bernardo Damele, Michael Foord, security-teams.net, pentestmonkey.net, metasploit.com