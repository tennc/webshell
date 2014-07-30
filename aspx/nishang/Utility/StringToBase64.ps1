
<#
.SYNOPSIS
Nishang script which encodes a string to base64 string.

.DESCRIPTION
This payload encodes the given string to base64 string and writes it to base64encoded.txt in current directory.

.PARAMETER Str
The string to be encoded

.PARAMETER OutputFile
The path of the output file. Default is "encoded.txt" in the current working directory.

.PARAMETER IsString
Use this to specify if you are passing a string ins place of a filepath.

.EXAMPLE
PS > StringToBase64 "start-process calc.exe" -IsString

.LINK
http://labofapenetrationtester.blogspot.com/
https://github.com/samratashok/nishang
#>



function StringtoBase64
{
    [CmdletBinding()] 
        Param( [Parameter(Position = 0, Mandatory = $False)]
        [String]
        $Str,

        [Parameter(Position = 1, Mandatory = $False)]
        [String]
        $outputfile=".\base64encoded.txt", 

        [Switch]
        $IsString
    )

   if($IsString -eq $true)
    {
    
        $utfbytes  = [System.Text.Encoding]::Unicode.GetBytes($Str)
       
    }
  else
    {
        $utfbytes  = [System.Text.Encoding]::Unicode.GetBytes((Get-Content $Str))
    }

  $base64string = [System.Convert]::ToBase64String($utfbytes)
  Out-File -InputObject $base64string -Encoding ascii -FilePath "$outputfile"
  Write-Output "Encoded data written to file $outputfile"
}


