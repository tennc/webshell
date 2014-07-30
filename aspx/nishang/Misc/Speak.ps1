<#
.SYNOPSIS
Nishang Payload to which "speaks" the given sentence 

.DESCRIPTION
This payload uses the Speech API and the given senetence
is spoken in the MS Narrator's voice.

.PARAMETER Sentence
The sentence to be spoken

.EXAMPLE
PS > Speak <senetence>

.LINK
http://labofapenetrationtester.blogspot.com/
https://github.com/samratashok/nishang
#>




function Speak
{
    Param( 
        [Parameter(Position = 0, Mandatory = $True)]
        [String]
        $Sentence
    )
    (new-object -com SAPI.SpVoice).speak("$Sentence")
}
