#Requires -Version 3

<#
.SYNOPSIS
Nishang script which checks running processes for malwares.

.DESCRIPTION
This script uses takes md5 hashes of running processes (the correspondibg executable) 
on the target system and search the hashes in the Virustotal database using the Public API.

.PARAMETER APIKEY
THe APIKEY provided when someone registers to virustotal

.EXAMPLE
PS > Prasadhak 1fe0ef5feca2f84eb450bc3617f839e317b2a686af4d651a9bada77a522201b0

.LINK
http://www.labofapenetrationtester.com/2013/01/introducing-prasadhak.html
https://github.com/samratashok/nishang

.Notes
The word Prasadhak means purifier in Sanskrit language.
#>




function Prasadhak
{
    [CmdletBinding()] Param( 
        [Parameter(Position = 0, Mandatory = $True)]
        [String]
        $apikey
    )

    function post_http($url,$parameters) 
    { 
        $http_request = New-Object -ComObject Msxml2.XMLHTTP 
        $http_request.open("POST", $url, $false) 
        $http_request.setRequestHeader("Content-type","application/x-www-form-urlencoded") 
        $http_request.setRequestHeader("Content-length", $parameters.length); 
        $http_request.setRequestHeader("Connection", "close") 
        $http_request.send($parameters) 
        $script:response = $http_request.responseText 
    } 
 


    function check
    {
        
        $res = $response | ConvertFrom-JSON
        foreach ($code in $res)
        {
            #$proc1[$track]                
            if ($code.response_code -eq 0)
                {
                    Write-Host "Not found in VT database. " #+ $proc1[$track]
                }

            elseif (($code.response_code -eq 1) -and ($code.positives -ne 0))
                {
                    Write-Host "Something malicious is found. " -ForegroundColor Red # $proc1[$track]
                    $code.Permalink
                }

            elseif (($code.response_code -eq 1))
                {
                    Write-Host "This is reported clean. " -ForegroundColor Green # $proc1[$track]
                    
                }

            elseif ($res.response_code -eq -2)
                {
                    "File queued for analysis. " #+ $proc1[$track]
                    $code.Permalink
                }
        #$track++
        }
    }


    $ErrorActionPreference = "SilentlyContinue"
    $iteration = 0
    $count = 0
    $reqcount = 0
    [String[]]$hash = @()
    #[String[]]$procname = @()
    "Reading Processes and determining executables."
    Start-Sleep -Seconds 3
    $procs = (Get-Process).path
    $procnumber = Get-Process | Measure-Object -line
    "Total Processes detected: " + $procnumber.lines
    "Total Processes for which executables were detected: " + $procs.length
    Start-Sleep -Seconds 3


    foreach ($proc in $procs)
    {
        $md5 = new-object -TypeName System.Security.Cryptography.MD5CryptoServiceProvider #http://stackoverflow.com/questions/10521061/how-to-get-a-md5-checksum-in-powershell
        $hash = $hash + "," + [System.BitConverter]::ToString($md5.ComputeHash([System.IO.File]::ReadAllBytes($proc))).Replace("-", "").ToLower()
        #$procname = $procname + $proc
        if ((($count -eq 25) -and (($procs.length - 25) -ge 0)) -or ($procs.Length -lt 25) -or (($iteration -ge 1) -and ((($procs.length - (25 * $iteration)) - 1) -eq $count)))
        {
            Post_http "https://www.virustotal.com/vtapi/v2/file/report" "resource=$hash&apikey=$apikey"
            check
            $hash = 0
            $count = 0
            $reqcount++
            $iteration++
        }
        if ($reqcount -eq 4)
        {
            "Waiting for one minute as VT allows only 4 requests per minute."
            Start-Sleep -seconds 60
            $reqcount = 0
        }

        $count++
    }
}

