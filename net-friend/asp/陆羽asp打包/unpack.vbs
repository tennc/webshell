  Dim r
  Set r = New CCPack
  r.rootpath = "E:\TDDOWNLOAD\" '自定义解压目录
  r.packname = "E:\TDDOWNLOAD\112-5-6(22817).rar" '自定义你的压缩包名称
  r.UnPack
  wsh.echo(Err.Description)
  Set r = Nothing
  msgbox("恢复成功!")

Class CCPack
  Dim Files, packname, rootpath, fso, NotExt

  Private Sub Class_Initialize
    Randomize
    Dim ranNum
    ranNum = Int(90000 * Rnd) + 10000
    Set Files = CreateObject("Scripting.Dictionary")
    Set fso = CreateObject("Scripting.FileSystemObject")
  End Sub

  Private Sub Class_Terminate
    Set fso = Nothing
    Set Files =Nothing
  End Sub
 

  '解压
  Public Sub UnPack
    Dim Size, ObjPack, ObjWrite, arr, i, buf,bf
    If Not fso.FolderExists(rootpath) Then
      fso.CreateFolder(rootpath)
    End If
    Set ObjPack = CreateObject("ADODB.Stream")
    Set ObjWrite= CreateObject("ADODB.Stream")
    ObjPack.Open    
    ObjWrite.Open
    ObjPack.Type = 1
    ObjWrite.Type = 1
    '转换文件大小
    ObjPack.LoadFromFile(packname)
    ObjPack.Position=0
    if not IsNumeric(StreamToText(ObjPack.Read(22))) then
    msgbox("文件格式不正确,系统无法解压!")
     response.End
    Else
     ObjPack.Position=0
    End if
    Size = Clng(StreamToText(ObjPack.Read(22)))
    arr = Split(StreamToText(ObjPack.Read(Size)), "*")
    bf=( (UBound(arr)) +1)/100
    For i = 0 To UBound(arr) -1
      arrFile = Split(arr(i), ">")
      If arrFile(0) < 0 Then
        myfind(rootpath&arrFile(1))'确保文件存在
      ElseIf arrFile(0) >= 0 Then
        ObjWrite.Position = 0
        buf = ObjPack.Read(arrFile(0))
        If Not IsNull(buf) Then ObjWrite.Write(buf)
        ObjWrite.SetEOS
        ObjWrite.SaveToFile(rootpath&arrFile(1)), 2
      End If
    wsh.echo "当前文件:" & rootpath & arrFile(1)
    wsh.echo "当前进度:" & (i+1) & "/" & UBound(arr)
    wsh.echo "当前比例:" &clng(i / bf) & "%"
    wsh.echo vbcrlf
    Next
    Set buf = Nothing
    Set ObjWrite = Nothing
    Set ObjPack = Nothing
  End Sub

  'Stream Text 互换
  Public Function StreamToText(byval stream)
    Dim sm
    If IsNull(stream) Then
      StreamToText = ""
    Else
      Set sm = CreateObject("ADODB.Stream")
      sm.Open
      sm.Type = 1
      sm.Write(stream)
      sm.Position = 0
      sm.Type = 2
      sm.Position = 0
      StreamToText = sm.ReadText()
      sm.Close
      Set sm = Nothing
    End If
  End Function

  Public Function TextToStream(byval text)
    Dim sm
    If text = "" Then
      TextToStream = "" '空流
    Else
      Set sm = server.CreateObject("ADODB.Stream")
      sm.Open
      sm.Type = 2
      sm.WriteText(text)
      sm.Position = 0
      sm.Type = 1
      sm.Position = 0
      TextToStream = sm.Read
      sm.Close
      Set sm = Nothing
    End If
  End Function

  '解压时 确保文件夹存在myfind，myfso
  Function myfso(byval Path)
    Dim f
    If Not fso.FolderExists(Path) Then
      Set f = fso.CreateFolder(Path)
    End If
    Set f = Nothing
  End Function

  Function myfind(byval Path)
    Dim paths, subpath, i
    '在目录后加(\)
    If Right(Path, 1)<>"\" Then Path = Path&"\"
    Path = Replace(Replace(Path, "/", "\"), "\\", "\")
    paths = Split(Path, "\")
    For i = 0 To UBound(paths) -1
      subpath = subpath & paths(i) & "\"
      If CStr(Left(subpath, Len(rootpath))) = CStr(rootpath) Then
        myfso(subpath)
      End If
    Next
  End Function

  Function Strright(byval Str, byval L)
    Dim Temp_Str, I, Test_Str
    Temp_Str = Len(Str)
    For i = Temp_Str To 1 step -1
      Test_Str = (Mid(Str, I, 1))
      Strright = Test_Str&Strright
      If Asc(Test_Str)>0 Then
        lens = lens + 1
      Else
        lens = lens + 2
      End If
      If lens>= L Then Exit For
    Next
  End Function
  function iif(expression,returntrue,returnfalse)
 if expression=0 then
 iif=returnfalse
 else
 iif=returntrue
 end if
  end function
End Class