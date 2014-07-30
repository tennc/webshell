<#
.SYNOPSIS
Nishang script to convert a PE file in hex format to executable

.DESCRIPTION
This script converts a PE file in hex to executable and writes it to user temp.

.PARAMETER Filename
Path of the hex text file from which  executable will be created.

.PARAMETER EXE
Path where the executable should be created.

.EXAMPLE
PS > TexttoExe C:\evil.text C:\exe\evil.exe

.LINK
http://www.exploit-monday.com/2011/09/dropping-executables-with-powershell.html
https://github.com/samratashok/nishang
#>





function TexttoEXE
{
    [CmdletBinding()] Param ( 
        [Parameter(Position = 0, Mandatory = $True)]
        [String]
        $FileName,
    
        [Parameter(Position = 1, Mandatory = $True)]
        [String]$EXE
    )
    
    [String]$hexdump = get-content -path "$Filename"
    [Byte[]] $temp = $hexdump -split ' '
    [System.IO.File]::WriteAllBytes($EXE, $temp)
    Write-Output "Executable written to file $EXE"
}
