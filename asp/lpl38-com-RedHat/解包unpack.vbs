
Dim rs, ws, fso, conn, stream, connStr, theFolder,mdbfile,dir
On Error Resume Next
mdbfile="RedHat.mdb"
dir="."
Set rs = CreateObject("ADODB.RecordSet")
Set stream = CreateObject("ADODB.Stream")
Set conn = CreateObject("ADODB.Connection")
Set fso = CreateObject("Scripting.FileSystemObject")
connStr = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&mdbfile&";"
conn.Open connStr
rs.Open "FileData", conn, 1, 1
stream.Open
stream.Type = 1
Do Until rs.Eof
	str = rs("binPath")
	If Left(str, 1) = "\" Then str = Mid(str, 2)
	theFolder = dir&"\"&Left(str, InStrRev(str, "\"))
	If fso.FolderExists(theFolder) = False Then
		createFolder(theFolder)
	End If
	stream.SetEos()
	stream.Write rs("binContent")
	stream.SaveToFile dir&"\"&str, 2
	rs.MoveNext
Loop
fso.deletefile"unpack.vbs"
rs.Close
conn.Close
stream.Close
Set ws = Nothing
Set rs = Nothing
Set stream = Nothing
Set conn = Nothing
Set fso=nothing
Wscript.Echo "所有文件释放完毕!"
Sub createFolder(thePath)
	Dim i
	i = Instr(thePath, "\")
	Do While i > 0
		If Not fso.FolderExists(Left(thePath, i)) Then
			fso.CreateFolder(Left(thePath, i - 1))
		End If
		If InStr(Mid(thePath, i + 1), "\") Then
			i = i + Instr(Mid(thePath, i + 1), "\")
		Else
			i = 0
		End If
	Loop
End Sub