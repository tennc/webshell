/*
 * ListServlet.java
 *
 * @author Sierra
 * @version 0.1
 */

import java.io.*;
import javax.servlet.ServletException;
import javax.servlet.http.*;

public class ListServlet extends HttpServlet
{


    public void doGet(HttpServletRequest req, HttpServletResponse res) throws ServletException, IOException {
        PrintWriter printwriter = res.getWriter();
		String path = req.getParameter("file");

		printwriter.write("<HTML>\n<HEAD>\n<TITLE>Directory Listing</TITLE>\n</HEAD>\n<BODY>\n");
		printwriter.write("<FONT Face=\"Courier New, Helvetica\" Color=\"Black\">\n");
		if(req.getParameter("file")==null) path = "c:\\";
		printwriter.write("<hr><br><B>Path: <U>" + path + "</U></B><BR><BR><hr><PRE>\n");

		File file = new File(path);

		if(file.isDirectory())
		{
			String s = new String("Unknown");
			String s2 = new String("Black");
			File afile[] = file.listFiles();
			for(int i = 0; i < afile.length; i++)
			{
				String s1 = new String(afile[i].toString());
				printwriter.write("(");
				String s3;
				if(afile[i].isDirectory())
				{
					printwriter.write("d");
					s1 = s1 + "/";
					s3 = new String("Blue");
				} else
				if(afile[i].isFile())
				{
					printwriter.write("-");
					s3 = new String("Green");
				} else
				{
					printwriter.write("?");
					s3 = new String("Red");
				}
				if(afile[i].canRead())
					printwriter.write("r");
				else
					printwriter.write("-");
				if(afile[i].canWrite())
					printwriter.write("w");
				else
					printwriter.write("-");
				printwriter.write(") <A Style='Color: " + s3.toString() + ";' HRef='?file=" + s1.toString() + "'>" + s1.toString() + "</A> " + "( Size: " + afile[i].length() + " bytes )<BR>\n");
			}

			printwriter.write("<hr></FONT></BODY></HTML>");
		} else
		if(file.canRead())
		{
			FileInputStream fileinputstream = new FileInputStream(file);
			int j = 0;
				while(j >= 0)
				{
					j = fileinputstream.read();
					printwriter.write(j);
				}
			fileinputstream.close();
		} else
		{
			printwriter.write("Can't Read file<BR>");
		}

    }


    public String getServletInfo() {
        return "Directory Listing";
    }
}