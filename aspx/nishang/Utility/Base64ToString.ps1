
<#
.SYNOPSIS
Nishang script which decodes a base64 string to readable.

.DESCRIPTION
This payload decodes a base64 string to readable.

.PARAMETER Base64Strfile
The filename which contains base64 string to be decoded. Default is "decoded.txt" in the current working directory.
Use the parameter -IsString while using a string instead of file.

.EXAMPLE
PS > Base64ToString base64.txt

.EXAMPLE
PS > Base64ToString dGVzdGVzdA== -IsString

.LINK
http://labofapenetrationtester.blogspot.com/
https://github.com/samratashok/nishang
#>




function Base64ToString
{
    [CmdletBinding()] Param( 
        [Parameter(Position = 0, Mandatory = $True)]
        [String]
        $Base64Strfile, 

        [Parameter(Position = 1, Mandatory = $False)]
        [String]
        $outputfile=".\base64decoded.txt", 
        
        [Switch] 
        $IsString
    )
    if($IsString -eq $true)
    {
    
        $base64string  = [System.Convert]::FromBase64String($Base64Strfile)
       
    }
    else
    {
        $base64string  = [System.Convert]::FromBase64String((Get-Content $Base64Strfile))
    }
    
    $decodedstring = [System.Text.Encoding]::Unicode.GetString($base64string)
    $decodedstring
    Out-File -InputObject $decodedstring -Encoding ascii -FilePath "$outputfile"
    Write-Output "Decoded data written to file $outputfile"
    }

