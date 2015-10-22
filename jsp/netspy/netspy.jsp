<%@page import="org.apache.commons.io.FileUtils"%>
<%@page import="java.io.File"%>
<%@ page language="java" import="java.util.*" pageEncoding="UTF-8"%>
<%@ page isThreadSafe="false"%>
<%@page import="java.net.*"%>
<%@page import="java.io.PrintWriter"%>
<%@page import="java.io.BufferedReader"%>
<%@page import="java.io.FileReader"%>
<%@page import="java.io.FileWriter"%>
<%@page import="java.io.OutputStreamWriter"%>
<%@page import="java.util.regex.Matcher"%>
<%@page import="java.io.IOException"%>
<%@page import="java.net.InetAddress"%>
<%@page import="java.util.regex.Pattern"%>
<%@page import="java.net.HttpURLConnection"%>
<%@page import="java.util.concurrent.LinkedBlockingQueue"%>


<%!final static List<String> list = new ArrayList<String>();
	String referer = "";
	String cookie = "";
	String decode = "utf-8";
	int thread = 100;
	//final static List<String> scanportlist = new ArrayList<String>();
	String cpath="";

	//建立一个HTTP连接
	HttpURLConnection getHTTPConn(String urlString) {
		try {
			java.net.URL url = new java.net.URL(urlString);
			java.net.HttpURLConnection conn = (java.net.HttpURLConnection) url
					.openConnection();
			conn.setRequestMethod("GET");
			conn.addRequestProperty("User-Agent",
					"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; Maxthon;)");
			conn.addRequestProperty("Accept-Encoding", "gzip");
			conn.addRequestProperty("referer", referer);
			conn.addRequestProperty("cookie", cookie);
			//conn.setInstanceFollowRedirects(false);
			conn.setConnectTimeout(3000);
			conn.setReadTimeout(3000);

			return conn;
		} catch (Exception e) {
			return null;
		}
	}

	String PostData(String urlString, String postString) {
		HttpURLConnection http = null;
		String response = null;
		try {
			java.net.URL url = new java.net.URL(urlString);
			http = (HttpURLConnection) url.openConnection();
			http.setDoInput(true);
			http.setDoOutput(true);
			http.setUseCaches(false);
			http.setConnectTimeout(50000);
			http.setReadTimeout(50000);
			http.setRequestMethod("POST");
			http.setRequestProperty("Content-Type",
					"application/x-www-form-urlencoded");
			http.connect();
			OutputStreamWriter osw = new OutputStreamWriter(
					http.getOutputStream(), decode);
			osw.write(postString);
			osw.flush();
			osw.close();
			response = getHtmlByInputStream(http.getInputStream(), decode);
		} catch (Exception e) {
			response = getHtmlByInputStream(http.getErrorStream(), decode);
		}
		return response;
	}

	HttpURLConnection conn;

	//从输入流中读取源码
	String getHtmlByInputStream(java.io.InputStream is, String code) {
		StringBuffer html = new StringBuffer();
		try {

			java.io.InputStreamReader isr = new java.io.InputStreamReader(is,
					code);
			java.io.BufferedReader br = new java.io.BufferedReader(isr);
			String temp;
			while ((temp = br.readLine()) != null) {
				if (!temp.trim().equals("")) {
					html.append(temp).append("\n");
				}
			}
			br.close();
			isr.close();
		} catch (Exception e) {
			System.out.print(e.getMessage());
		}

		return html.toString();
	}

	//获取HTML源码
	String getHtmlContext(HttpURLConnection conn, String decode,boolean isError) {
		Map<String, Object> result = new HashMap<String, Object>();
		String code = "utf-8";
		if (decode != null) {
			code = decode;
		}
		try {
			return getHtmlByInputStream(conn.getInputStream(), code);
		} catch (Exception e) {
			try {
			if(isError){
			   return getHtmlByInputStream(conn.getErrorStream(), code);
			}
			} catch (Exception e1) {
				System.out.println("getHtmlContext2:" + e.getMessage());
			}
			System.out.println("getHtmlContext:" + e.getMessage());
			return "null";
		}
	}

	//获取Server头
	String getServerType(HttpURLConnection conn) {
		try {
			return conn.getHeaderField("Server");
		} catch (Exception e) {
			return "null";
		}

	}

	//匹配标题
	String getTitle(String htmlSource) {
		try {
			List<String> list = new ArrayList<String>();
			String title = "";
			Pattern pa = Pattern.compile("<title>.*?</title>");
			Matcher ma = pa.matcher(htmlSource);
			while (ma.find()) {
				list.add(ma.group());
			}
			for (int i = 0; i < list.size(); i++) {
				title = title + list.get(i);
			}
			return title.replaceAll("<.*?>", "");
		} catch (Exception e) {
			return null;
		}
	}

	//得到css
	List<String> getCss(String html, String url, String decode) {
		List<String> cssurl = new ArrayList<String>();
		List<String> csscode = new ArrayList<String>();
		try {

			String title = "";
			Pattern pa = Pattern.compile(".*href=\"(.*)[.]css");
			Matcher ma = pa.matcher(html.toLowerCase());
			while (ma.find()) {
				cssurl.add(ma.group(1) + ".css");
			}

			for (int i = 0; i < cssurl.size(); i++) {
				String cssuuu = url + "/" + cssurl.get(i);
				String csshtml = "<style>"
						+ getHtmlContext(getHTTPConn(cssuuu), decode,false)
						+ "</style>";
				csscode.add(csshtml);

			}
		} catch (Exception e) {
			System.out.println("getCss:" + e.getMessage());
		}
		return csscode;

	}

	//域名解析成IP
	String getMyIPLocal() throws IOException {
		InetAddress ia = InetAddress.getLocalHost();
		return ia.getHostAddress();
	}
	
	
	
	boolean getHostPort(String task){
		Socket client = null;
		boolean isOpen=false;
		try{
		     String[] s=task.split(":");
	    	 client = new Socket(s[0], Integer.parseInt(s[1]));
	  		 isOpen=true;
	  		 System.out.println("getHostPort:"+task);
	  		 //scanportlist.add(task+" >>> Open");
	  		 saveScanReslt2(task+" >>> Open\r\n");
		}catch(Exception e){
			 isOpen=false;
		}
	    return isOpen;
	}
	
	void getPath(String path){
	cpath=path;
	}
	
/* 	void saveScanReslt(String s){
	try{
	FileUtils.writeStringToFile(new File(cpath+"/port.txt"), s,"UTF-8",true);
	}catch(Exception e){
	System.out.print(e.getLocalizedMessage());
	}
	} */
	
	 void saveScanReslt2(String content) {   
        FileWriter writer = null;  
        try {     
            writer = new FileWriter(cpath+"/port.txt", true);     
            writer.write(content);       
        } catch (IOException e) {     
           System.out.print(e.getLocalizedMessage());   
        } finally {     
            try {     
                if(writer != null){  
                    writer.close();     
                }  
            } catch (IOException e) {     
              System.out.print(e.getLocalizedMessage());   
            }     
        }   
    }
	
	
	
	String s="Result:<br/>";
	String readPortResult(String portfile){
	    File file = new File(portfile);
        BufferedReader reader = null;
        try {
            System.out.println("");
            reader = new BufferedReader(new FileReader(file));
            String tempString = null;
            while ((tempString = reader.readLine()) != null) {
              s+=tempString+"<br/>";
            }
            reader.close();
        } catch (IOException e) {
             return null;
        } finally {
            if (reader != null) {
                try {
                    reader.close();
                } catch (IOException e1) {
                return null;
                }
            }
        }
        return s;
	}
	
	
	%>


<html>

<head>
<title>内网简单扫描脚本</title>
</head>
<body>
	<script>
		function showDiv(obj) {
			//var statu = document.getElementById("prequest").style.display;
			if (obj == "proxy") {
				document.getElementById("proxy").style.display = "block";
				document.getElementById("web").style.display = "none";
				document.getElementById("port").style.display = "none";

			} else if (obj == "web") {
				document.getElementById("proxy").style.display = "none";
				document.getElementById("web").style.display = "block";
				document.getElementById("port").style.display = "none";

			} else if (obj == "port") {
				document.getElementById("proxy").style.display = "none";
				document.getElementById("web").style.display = "none";
				document.getElementById("port").style.display = "block";

			}
		}
	</script>
	<p>
		<a href="javascript:void(0);" onclick="showDiv('proxy');"
			style="margin-left: 32px;">代理访问</a> <a href="javascript:void(0);"
			onclick="showDiv('web');" style="margin-left: 32px;">Web扫描</a> <a
			href="javascript:void(0);" onclick="showDiv('port');"
			style="margin-left: 32px;">端口扫描</a>
	</p>

	<div id="proxy"
		style="border:1px solid #999;padding:3px;margin-left:30px;width: 95%;height: 32%;display:block;">
		<form action="" method="POST" style="margin-left: 50px;">
			<p>
				Url：<input name="url" value="http://127.0.0.1:8080"
					style="width: 380px;" />
			</p>
			<p>
				Method:<select name="method">
					<option value="GET">GET</option>
					<option value="POST">POST</option>
				</select> Decode:<select name="decode">
					<option value="utf-8">utf-8</option>
					<option value="gbk">gbk</option>
				</select>
			</p>
			<p>
				<textarea name="post" cols=40 rows=4>username=admin&password=admin</textarea>
				<textarea name="post" cols=40 rows=4>SESSION:d89de9c2b4e2395ee786f1185df21f2c51438059222</textarea>

			</p>
			<p>
				Referer:<input name="referer" value="http://www.baidu.com"
					style="width: 380px;" />
			</p>
			<p></p>

			<p>
				<input type="submit" value="Request" />
			</p>
		</form>
	</div>

	<div id="web"
		style="border:1px solid #999;padding:3px;margin-left:30px;width: 95%;height: 32%; display:none;">
		<form action="" method="POST" style="margin-left: 50px;">
			<p>
				IP:<input name="ip" value="127.0.0.1">
			</p>
			<p>
				Port:<input name="port" value="80,8080,8081,8088">
			</p>
			<input type="submit" value="Scan">
		</form>
	</div>

	<div id="port"
		style="border:1px solid #999;padding:3px;margin-left:30px;width: 95%;height: 32%; display:none;">
		<form action="" method="POST" style="margin-left: 50px;">
			<p>
				IP:<input name="scanip" value="192.168.12.1">-<input
					name="scanip2" value="192.168.12.10">
			</p>
			<p>
				Port:<input name="scanport"
					value="21,80,135,443,1433,1521,3306,3389,8080,27017"
					style="width: 300px;">
			</p>
			<p>
				Thread:<input name="thread" value="100" style="width: 30px;">
			</p>
			<input type="submit" value="Scan">
		</form>
	</div>

	<br />
</body>
</html>
<%
	final JspWriter pwx = out;
	String s = application.getRealPath("/") + "/port.txt";
	String result = readPortResult(s);
	if (result != null) {
		try {
			pwx.println(result);
		} catch (Exception e) {
			System.out.print(e.getMessage());
		}
	}else{
       pwx.println("如果你进行了端口扫描操作，那么这里将会显示扫描结果！<br/>");
	}
	String div1 = "<div style=\"border:1px solid #999;padding:3px;margin-left:30px;width:95%;height:90%;\">";
	String div2 = "</div>";

	String u = request.getParameter("url");
	String ip = request.getParameter("ip");
	String scanip = request.getParameter("scanip");

	if (u != null) {

		String post = request.getParameter("post");
		System.out.print(u);
		System.out.print(post);
		decode = request.getParameter("decode");
		String ref = request.getParameter("referer");
		String cook = request.getParameter("cookie");

		if (ref != null) {
			referer = ref;
		}
		if (cook != null) {
			cookie = cook;
		}

		String html = null;

		if (post != null) {
			html = PostData(u, post);
		} else {
			html = getHtmlContext(getHTTPConn(u), decode, true);
		}

		String reaplce = "href=\"http://127.0.0.1:8080/Jwebinfo/out.jsp?url=";
		//html=html.replaceAll("href=['|\"]?http://(.*)['|\"]?", reaplce+"http://$1\"");
		html = html.replaceAll("href=['|\"]?(?!http)(.*)['|\"]?",
				reaplce + u + "$1");
		List<String> css = getCss(html, u, decode);
		String csshtml = "";
		if (!html.equals("null")) {
			for (int i = 0; i < css.size(); i++) {
				csshtml += css.get(i);
			}
			out.print(div1 + html + csshtml + div2);
		} else {
			response.setStatus(HttpServletResponse.SC_NOT_FOUND);
			out.print("请求失败！");
		}
		return;
	}

	else if (ip != null) {
		String threadpp = (request.getParameter("thread"));
		String[] port = request.getParameter("port").split(",");

		if (threadpp != null) {
			thread = Integer.parseInt(threadpp);
			System.out.println(threadpp);
		}
		try {
			try {
				String http = "http://";
				String localIP = getMyIPLocal();
				if (ip != null) {
					localIP = ip;
				}
				String useIP = localIP.substring(0,
						localIP.lastIndexOf(".") + 1);
				final Queue<String> queue = new LinkedBlockingQueue<String>();
				for (int i = 1; i <= 256; i++) {
					for (int j = 0; j < port.length; j++) {
						String url = http + useIP + i + ":" + port[j];
						queue.offer(url);
						System.out.print(url);
					}

				}
				final JspWriter pw = out;
				ThreadGroup tg = new ThreadGroup("c");
				for (int i = 0; i < thread; i++) {
					new Thread(tg, new Runnable() {
						public void run() {
							while (true) {
								String addr = queue.poll();
								if (addr != null) {
									System.out.println(addr);
									HttpURLConnection conn = getHTTPConn(addr);
									String html = getHtmlContext(conn,
											decode, false);
									String title = getTitle(html);
									String serverType = getServerType(conn);
									String status = !html
											.equals("null") ? "Success"
											: "Fail";
									if (html != null
											&& !status.equals("Fail")) {
										try {
											pw.println(addr + "  >>  "
													+ title + ">>"
													+ serverType
													+ " >>" + status
													+ "<br/>");
										} catch (Exception e) {
											e.printStackTrace();
										}
									}
								} else {
									return;
								}
							}
						}
					}).start();
				}
				while (tg.activeCount() != 0) {
				}
			} catch (Exception e) {
				e.printStackTrace();
			}
		} catch (Exception e) {
			out.println(e.toString());
		}
	} else if (scanip != null) {
		getPath(application.getRealPath("/"));
		int thread = Integer.parseInt(request.getParameter("thread"));
		String[] port = request.getParameter("scanport").split(",");
		String ip1 = scanip;
		String ip2 = request.getParameter("scanip2");

		int start = Integer.parseInt(ip1.substring(
				ip1.lastIndexOf(".") + 1, ip1.length()));
		int end = Integer.parseInt(ip2.substring(
				ip2.lastIndexOf(".") + 1, ip2.length()));

		String useIp = scanip.substring(0, scanip.lastIndexOf(".") + 1);

		System.out.println("start:" + start);
		System.out.println("end:" + end);

		final Queue<String> queue = new LinkedBlockingQueue<String>();
		for (int i = start; i <= end; i++) {
			for (int j = 0; j < port.length; j++) {
				String scantarget = useIp + i + ":" + port[j];
				queue.offer(scantarget);
				//System.out.println(scantarget);
			}

		}
		System.out.print("Count1:" + queue.size());
		final JspWriter pw = out;
		ThreadGroup tg = new ThreadGroup("c");
		for (int i = 0; i < thread; i++) {
			new Thread(tg, new Runnable() {
				public void run() {
					while (true) {
						String scantask = queue.poll();
						if (scantask != null) {
							getHostPort(scantask);
							/* String result = null;
							if(isOpen){
							result=scantask+ " >>> Open<br/>";
							scanportlist.add(result);
							System.out.println(result);
							} */

							/* try {
							pw.println(result);
							} catch (Exception e) {
							System.out.print(e.getMessage());
							} */
						}
					}
				}
			}).start();

		}
		/* while (tg.activeCount() != 0) {
		} */
		try {
			pw.println("扫描线程已经开始，请查看" + cpath+"/port.txt文件或者直接刷新本页面！");
		} catch (Exception e) {
			System.out.print(e.getMessage());
		}
	}
%>
