<#
.SYNOPSIS
Nishang Payload to download a file in current users temp directory.

.DESCRIPTION
This payload downloads a file to the given location.

.PARAMETER URL
The URL from where the file would be downloaded.

.PARAMETER FileName
Name of the file where download would be saved.

.EXAMPLE
PS > Download http://example.com/file.txt newfile.txt

.LINK
http://labofapenetrationtester.blogspot.com/
https://github.com/samratashok/nishang
#>


function Download
{
    [CmdletBinding()] Param(
        [Parameter(Position = 0, Mandatory = $True)]
        [String]
        $URL,
        [Parameter(Position = 1, Mandatory = $True)]
        [String]
        $FileName
    )
    $webclient = New-Object System.Net.WebClient
    $file = "$env:temp\$FileName"
    $webclient.DownloadFile($URL,"$file")
}
