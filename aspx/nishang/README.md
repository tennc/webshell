#Nishang

###Nishang is a framework and collection of scripts and payloads which enables usage of PowerShell for offensive security usage and during Penetraion Tests. Nishang is useful during various phases of a penetration test and is most powerful for post exploitation usage.

####Scripts
Nishang currently contains following scripts and payloads.

#####Antak - the Webshell
[Antak](https://github.com/samratashok/nishang/tree/master/Antak-WebShell)

Execute powershell scripts in-memory, commands, download and upload files using this webshell.

#####Backdoors
[HTTP-Backdoor](https://github.com/samratashok/nishang/blob/master/Backdoors/HTTP-Backdoor.ps1)

A backdoor which is capable to recieve instructions from third party websites and could execute powershell scripts in memory.

[DNS_TXT_Pwnage](https://github.com/samratashok/nishang/blob/master/Backdoors/DNS_TXT_Pwnage.ps1)

A Backdoor which could recieve commands and powershell scripts from DNS TXT queries and execute those on target and could be controlled remotely using the queries.

[Execute-OnTime](https://github.com/samratashok/nishang/blob/master/Backdoors/Execute-OnTime.ps1)

A Backdoor which could execute powershell scripts on a given time on a target.

#####Escalation
[Enable-DuplicateToken](https://github.com/samratashok/nishang/blob/master/Escalation/Enable-DuplicateToken.ps1)

When SYSTEM privileges are required.

[Remove-Update](https://github.com/samratashok/nishang/blob/master/Escalation/Remove-Update.ps1)

Introduce vulnerabilites by removing patches.

#####Execution
[Download-Execute-PS](https://github.com/samratashok/nishang/blob/master/Execution/Download-Execute-PS.ps1)

Download and execute a powershell script in memory.

[Download_Execute](https://github.com/samratashok/nishang/blob/master/Execution/Download_Execute.ps1)

Download an executable in text format, convert to executable and execute.

[Execute-Command-MSSQL](https://github.com/samratashok/nishang/blob/master/Execution/Execute-Command-MSSQL.ps1)

Run powershell commands, native commands or SQL commands on a MSSQL Server with sufficient privileges.

[Execute-DNSTXT-Code](https://github.com/samratashok/nishang/blob/master/Execution/Execute-DNSTXT-Code.ps1)

Execute shellcode in memeory using DNS TXT queries.

#####Gather
[Check-VM](https://github.com/samratashok/nishang/blob/master/Gather/Check-VM.ps1)

Check for Virtual Machine

[Copy-VSS](https://github.com/samratashok/nishang/blob/master/Gather/Copy-VSS.ps1)

Copy the SAM file using Volume Shadow Service.

[Credentials](https://github.com/samratashok/nishang/blob/master/Gather/Credentials.ps1)

Fool a user to give credentials in plain text.

[FireBuster](https://github.com/samratashok/nishang/blob/master/Gather/FireBuster.ps1)
[FireListener](https://github.com/samratashok/nishang/blob/master/Gather/FireListener.ps1)

A pair of scripts for Egress Testing

[Get-Information](https://github.com/samratashok/nishang/blob/master/Gather/Get-Information.ps1)

Get juicy information from a target.

[Get-LSASecret](https://github.com/samratashok/nishang/blob/master/Gather/Get-LSASecret.ps1)

Get LSA Secret from a target.

[Get-PassHashes](https://github.com/samratashok/nishang/blob/master/Gather/Get-PassHashes.ps1)

Get password hashes from a target.

[Get-WLAN-Keys](https://github.com/samratashok/nishang/blob/master/Gather/Get-WLAN-Keys.ps1)

Get WLAN keys in plain from a target.

[Keylogger](https://github.com/samratashok/nishang/blob/master/Gather/Keylogger.ps1)

Log keys from a target.

#####Pivot
[Create-MultipleSessions](https://github.com/samratashok/nishang/blob/master/Pivot/Create-MultipleSessions.ps1)

Check credentials on multiple computers and create PSSessions.

[Run-EXEonRemote](https://github.com/samratashok/nishang/blob/master/Pivot/Run-EXEonRemote.ps1)
Copy and execute an executable on multiple machines.

#####Prasadhak
[Prasadhak](https://github.com/samratashok/nishang/blob/master/Prasadhak/Prasadhak.ps1)

Check running hashes of running process against Virus Total database.

#####Scan
[Brute-Force](https://github.com/samratashok/nishang/blob/master/Scan/Brute-Force.ps1)

Brute force FTP, Active Directory, MS SQL Server and Sharepoint.

[Port-Scan](https://github.com/samratashok/nishang/blob/master/Scan/Port-Scan.ps1)

A handy port scanner.

#####Powerpreter
[Powerpreter](https://github.com/samratashok/nishang/tree/master/powerpreter)

All the functionality of nishang in a single script module.

#####Utility
[Add-Exfiltration](https://github.com/samratashok/nishang/blob/master/Utility/Add-Exfiltration.ps1)

Add data exfiltration capability to gmail,pastebin, webserver and DNS to any script.

[Add-Persistence](https://github.com/samratashok/nishang/blob/master/Utility/Add-Persistence.ps1)

Add Reboot persistence capability to a script.

[Remove-Persistence](https://github.com/samratashok/nishang/blob/master/Utility/Remove-Persistence.ps1)

Remoce persistence added by the Add-Persistence script.

[Do-Exfiltration](https://github.com/samratashok/nishang/blob/master/Utility/Do-Exfiltration.ps1)

Pipe (|) this to any script to exfiltrate the output.

[Download](https://github.com/samratashok/nishang/blob/master/Utility/Download.ps1)

Download a file to the target.

[Parse_Keys](https://github.com/samratashok/nishang/blob/master/Utility/Parse_Keys.ps1)

Parse keys logged by the Keylogger.

[Invoke-Encode](https://github.com/samratashok/nishang/blob/master/Utility/Invoke-Decode.ps1)

Encode and Compress a script or string.

[Invoke-Decode](https://github.com/samratashok/nishang/blob/master/Utility/Invoke-Decode.ps1)

Decode and Decompress a script or string from Invoke-Encode.

[Base64ToString]
[StringToBase64]
[ExetoText]
[TexttoExe]

####Usage

Use the individual scripts with dot sourcing

PS > . .\Get-Information
PS > Get-Information

To get help about any script or payload, use

PS > Get-Help [scriptname.ps1] -full

Import all the scripts in current powershell session

PS > Import-Module .\nishang.psm1

####Updates

Updates about Nishang could be found at my blog http://labofapenetrationtester.com/ and my twitter feed @nikhil_mitt

####Bugs, Feedback and Feature Requests
Please raise an issue if you encounter a bug or have a feature request  or mail me at nikhil [dot] uitrgpv at gmail.com

#####Mailing List
For feedback, discussions and feature requests join http://groups.google.com/group/nishang-users

#####Contributing
I am always looking for contributors to Nishang. Please submit requests or drop me email.

#####Blog Posts

Some blog posts to check out for beginners:

http://www.labofapenetrationtester.com/2014/06/nishang-0-3-4.html

http://labofapenetrationtester.com/2012/08/introducing-nishang-powereshell-for.html

http://labofapenetrationtester.com/2013/08/powerpreter-and-nishang-Part-1.html

http://www.labofapenetrationtester.com/2013/09/powerpreter-and-nishang-Part-2.html 

All posts about Nishang:

http://www.labofapenetrationtester.com/search/label/Nishang




