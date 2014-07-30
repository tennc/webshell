<#
.SYNOPSIS
A script which could be used to parse keys logged 
by Kelogger payload of Nishang.

.DESCRIPTION
This script parses keys logged by Keylogger payload
of Nishang.

.PARAMETER RawKeys
Name of the text file which contains logged keys.

.PARAMETER LoggedKeys
Name of the text file where parsed keys will be stored

.EXAMPLE
PS > Parse_Keys raw.txt logged.txt

.LINK
http://labofapenetrationtester.blogspot.com/
https://github.com/samratashok/nishang
#>





function Parse_Keys
{
    [CmdletBinding()] Param(
        [Parameter(Position = 0, Mandatory = $True)]
        [String]
        $RawKeys,

        [Parameter(Position = 1, Mandatory = $True)]
        [String]
        $LoggedKeys
    )

    [String]$data = Get-Content $RawKeys
    $keys = $data.split("   ");

    foreach ($i in $keys)
    {
    
        switch ($i)
        {
                
                48 {$out = $out + "0"}
                49 {$out = $out + "1"}
                50 {$out = $out + "2"}
                51 {$out = $out + "3"}
                52 {$out = $out + "4"}
                53 {$out = $out + "5"}
                54 {$out = $out + "6"}
                55 {$out = $out + "7"}
                56 {$out = $out + "8"}
                57 {$out = $out + "9"}
                S-48 {$out = $out + ")"}
                S-49 {$out = $out + "!"}
                S-50 {$out = $out + "@"}
                S-51 {$out = $out + "#"}
                S-52 {$out = $out + "$"}
                S-53 {$out = $out + "%"}
                S-54 {$out = $out + "^"}
                S-55 {$out = $out + "&"}
                S-56 {$out = $out + "*"}
                S-57 {$out = $out + "("}
                65 {$out = $out + "A"}
                66 {$out = $out + "B"}
                67 {$out = $out + "C"}
                68 {$out = $out + "D"}
                69 {$out = $out + "E"}
                70 {$out = $out + "F"}
                71 {$out = $out + "G"}
                72 {$out = $out + "H"}
                73 {$out = $out + "I"}
                74 {$out = $out + "J"}
                75 {$out = $out + "K"}
                76 {$out = $out + "L"}
                77 {$out = $out + "M"}
                78 {$out = $out + "N"}
                79 {$out = $out + "O"}
                80 {$out = $out + "P"}
                81 {$out = $out + "Q"}
                82 {$out = $out + "R"}
                83 {$out = $out + "S"}
                84 {$out = $out + "T"}
                85 {$out = $out + "U"}
                86 {$out = $out + "V"}
                87 {$out = $out + "W"}
                88 {$out = $out + "X"}
                89 {$out = $out + "Y"}
                90 {$out = $out + "Z"}
                S-65 {$out = $out + "a"}
                S-66 {$out = $out + "b"}
                S-67 {$out = $out + "c"}
                S-68 {$out = $out + "d"}
                S-69 {$out = $out + "e"}
                S-70 {$out = $out + "f"}
                S-71 {$out = $out + "g"}
                S-72 {$out = $out + "h"}
                S-73 {$out = $out + "i"}
                S-74 {$out = $out + "j"}
                S-75 {$out = $out + "k"}
                S-76 {$out = $out + "l"}
                S-77 {$out = $out + "m"}
                S-78 {$out = $out + "n"}
                S-79 {$out = $out + "o"}
                S-80 {$out = $out + "p"}
                S-81 {$out = $out + "q"}
                S-82 {$out = $out + "r"}
                S-83 {$out = $out + "s"}
                S-84 {$out = $out + "t"}
                S-85 {$out = $out + "u"}
                S-86 {$out = $out + "v"}
                S-87 {$out = $out + "w"}
                S-88 {$out = $out + "x"}
                S-89 {$out = $out + "y"}
                S-90 {$out = $out + "z"}
                96 {$out = $out + "0"}
                97 {$out = $out + "1"}
                98 {$out = $out + "2"}
                99 {$out = $out + "3"}
                100 {$out = $out + "4"}
                101 {$out = $out + "5"}
                102 {$out = $out + "6"}
                103 {$out = $out + "7"}
                104 {$out = $out + "8"}
                105 {$out = $out + "9"}
                186 {$out = $out + ";"}
                187 {$out = $out + "="}
                188 {$out = $out + ","}
                189 {$out = $out + "-"}
                190 {$out = $out + "."}
                191 {$out = $out + "/"}
                192 {$out = $out + "``"}
                S-186 {$out = $out + ":"}
                S-187 {$out = $out + "+"}
                S-188 {$out = $out + "<"}
                S-189 {$out = $out + "_  "}
                S-190 {$out = $out + ">"}
                S-191 {$out = $out + "?"}
                S-192 {$out = $out + "~"}
                #1 {$out = $out + "Left Mouse Click"}
                #2 {$out = $out + "Right Mouse Click"}
                #4 {$out = $out + "Third Mouse Click"}
                #9 {$out = $out + "Tab"}
                #164 {$out = $out + "Left Alt"}
                #165 {$out = $out + "Right Alt"}
                #162 {$out = $out + "Left Ctrl"}
                #163 {$out = $out + "Right Ctrl"}
                #33 {$out = $out + "Page Up"}
                #34 {$out = $out + "Page Down"}
                #35 {$out = $out + "Home"}
                #36 {$out = $out + "End"}
                #37 {$out = $out + "Left Arrow"}
                #38 {$out = $out + "Up Arrow"}
                #39 {$out = $out + "Right Arrow"}
                #40 {$out = $out + "Down Arrow"}
                #37 {$out = $out + "Left Arrow"}
                #38 {$out = $out + "Up Arrow"}
                #39 {$out = $out + "Right Arrow"}
                #44 {$out = $out + "Print Screen"}
                #45 {$out = $out + "Insert"}
                46 {$out = $out + "Delete"}
                8 {$out = $out + "Backspace"}
                32 {$out = $out + " "}
                13 {$out = $out + "Enter"}
                #19 {$out = $out + "Pause"}
                #20 {$out = $out + "Caps Lock"}
                #144 {$out = $out + "Num Lock"}
                #145 {$out = $out + "Scroll Lock"} 
                #27 {$out = $out + "Escape"}
                #91 {$out = $out + "Window Key"}
                #111 {$out = $out + "/"}
                #106 {$out = $out + "*"}
                #107 {$out = $out + "+"}
                #112 {$out = $out + "F1"}
                #113 {$out = $out + "F2"}
                #114 {$out = $out + "F3"}
                #115 {$out = $out + "F4"}
                #116 {$out = $out + "F5"}
                #117 {$out = $out + "F6"}
                #118 {$out = $out + "F7"}
                #119 {$out = $out + "F8"}
                #120 {$out = $out + "F9"}
                #121 {$out = $out + "F10"}
                #122 {$out = $out + "F11"}
                #123 {$out = $out + "F12"}
                          

            }
    }
    Out-File -FilePath $LoggedKeys -Append -InputObject "$out"
}
    
