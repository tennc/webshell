0.3.6.4
- Get-PassHashes does not require SYSTEM privs anymore.
0.3.6.3
- Minor changes to Download-Execute-PS which now allows to pass arguments to scripts.
0.3.6.2
- Invoke-Encode can now output encoded command which could be used to execute scripts in a non-interactive shell.
0.3.6.1
- Powerpreter code made more readable.
- Powerpreter updated for recent changes done to other scripts in Nishang (Egress Testing, New Exfil methods, Bug fixes).
- Powerpreter persistence improved and bugs fixed.
- Bug fixes in HTTP-Backdoor and Execute_OnTime.
- Minor improvements to TextToExe and ExeToText scripts in Utility.
0.3.6
- Added Invoke-Encode.
- Changed compression and encoding methods used by Do-Exfitration, Backdoors, Invoke-Decode, Add-Exfiltration and Keylogger.
0.3.5
- Added Antak Webshell.
0.3.4
- Minor improvements in StringtoBase64.ps1
- Fixed a typo in Firelistener. Client port was not being displayed.
- All the scripts could be run using "dot source" now.
- All the scripts in Nishang could be loaded into current powershell session by importing Nishang.psm1 module.
- Added new exfiltration options, POST requests to Webserver and DNS txt queries.
- Removed exfiltration support for tinypaste.
- Exfiltration options have been removed from all scripts but Backdoors and Keylogger.
- Added Nishang.psm1
- Added Do-Exfiltration.ps1.
- Added Add-Exfiltration.ps1.
- Added Invoke-Decode.ps1.
- Removed Browse_Accept_Applet.ps1
0.3.3
- Minor bug fix in Copy-VSS.ps1
- Bug fix in Keylogger.ps1. It should log keys from a remote shell now (not powershell remoting).
0.3.2.2
- Download_Execute_PS.ps1 can now download and execute a Powershell script without writing it to disk.
- Execute_OnTime.ps1 and HTTP-Backdoor.ps1 executed the payload without downloading a file to disk.
- Fixed help in Brute-Force function in Powerpreter.
- Execute-OnTime, HTTP-Backdoor and Download-Execute-PS in Powerpreter now execute powershell scripts without downloading a file to disk.
- Added Firebuster.ps1 and Firelistener.ps1
0.3.2.1
- Fixed help and function name in Brute-Force.ps1
0.3.2
- Added Persistence to Keylogger, DNS_TXT_Pwnage, Execute_OnTime, HTTP-Backdoor and Powerpreter.
- Scirpts are now arranged in different directories.
- Added Add-Persistence.ps1 and Remove-Persistence.ps1
- Fixed minor bugs in scripts which use two parameterset.
- Invoke-NinjaCopy has been removed.
0.3.1
- Pivot now accepts multiple computers as input.
- Added Use-Session to interact with sessions created using Pivot.
0.3.0
- Added Powerpreter
- Added Execute-DNSTXT-Code
- Bug fix in Create-MultipleSessions.
- Changes to StringToBase64. It now supports Unicode encoding which makes it usable with -Encodedcommand.
- More Changes to StringToBase64. Now a file can be converted.
- Added Copy-VSS
- Information_Gather shows output in better format now.
- Information_Gather renamed to Get-Information.
- Wait for command renamed to HTTP-Backdoor.
- Time_Execution renamed Execute-OnTime
- Invoke-PingSweep renamed to Port-Scan
- Invoke-Medusa renamed to Brute-Force
0.2.9
- Run-EXEonRemote now accepts custom arguments for the executable.
- More examples added to the Keylogger.
0.2.8
- Fixed issues while using Get-LSASecret, Get-PassHashes, Get-WLAN-Keys and Information_Gather while using with Powershell v2
0.2.7
- DNS_TXT_Pwnage, Time_Execution and Wait_For_Command can now be stopped remotely. Also, these does not stop autmoatically after running a script/command now.
- DNS_TXT_Pwnage, Time_Execution and Wait_For_Command can now return results using selected exfiltration method.
- Fixed a minor bug in DNS_TXT_Pwnage.
- All payloads which could post data to the internet now have three options pastebin/gmail/tinypaste for exfiltration.
- Added Get-PassHashes payload.
- Added Download-Execute-PS payload.
- The keylogger logs only fresh keys after exfiltring the keys 30 times.
- A delay after success has been introduced in various payloads which connect to the internet to avoid generating too much traffic.
0.2.6
- Added Create-MultipleSessions script.
- Added Run-EXEonRemote script.
0.2.5
- Added Get-WLAN-Keys payload.
- Added Remove-Update payload.
- Fixed help in Credentials.ps1
- Minor changes in Donwload_Execute and Information_Gather.
0.2.1
- Added Execute-Command-MSSQL payload.
- Removed Get-SqlSysLogin payload
- Fixed a bug in Credentials.ps1
0.2.0
- Removed hard coded strings from DNS TXT Pwnage payload.
- Information Gather now pastes data base64 encoded, does not trigger pastebin spam filter anymore.
- Credentials payload now validates both local and AD crdentials. If creds entered could not be validated locally or at AD, credential prompt is shown again.
- Base64ToString now asks for a file containing base64 string. To provide a string in place of file use "-IsString" parameter.
- Browse_Accept_Applet now handles prompts for both 32 bit and 64 bit Internet Explorer. The wait time for the applet to load has also been increased .
- Added Enable_DuplicateToken payload.
- Added Get-LSASecret payload.
- Added Get-SqlSysLogin payload.
- Added Invoke-Medusa payload.
- Added Invoke-PingSweep payload.

0.1.1
- Fixed a bug in Parse_Keys. The function Parse_Keys was not being called.
- Changed help in Wait_For_Command.ps1
- Fixed a bug in Wait_For_Command. $MagicString was not being used instead a fixed string was matched to the result of $checkurl
- Removed delay in the credentials payload's prompt. Now the prompt asking for credentials will keep appearing instantly if nothing is entered.
- Added CHANGELOG to repo
- Removed hard coded credentials from Credentials.ps1 :| and edited the code to accept user input.