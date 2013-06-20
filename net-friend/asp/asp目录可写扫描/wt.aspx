<%@ Page Language="C#" Debug="true" trace="false" validateRequest="false" EnableViewStateMac="false" EnableViewState="true"%>
<%@ import Namespace="System.IO"%>
<%@ import Namespace="Microsoft.Win32"%>
<%@ import Namespace="System.Collections.Generic"%>
<%@ import Namespace="System.Threading"%>
<%@ import Namespace="System.Text.RegularExpressions"%>
<%@ import Namespace="System.Collections.Generic"%>
<%@ Assembly Name="System.DirectoryServices,Version=2.0.0.0,Culture=neutral,PublicKeyToken=B03F5F7F11D50A3A"%>
<%@ Assembly Name="System.Management,Version=2.0.0.0,Culture=neutral,PublicKeyToken=B03F5F7F11D50A3A"%>
<%@ Assembly Name="System.ServiceProcess,Version=2.0.0.0,Culture=neutral,PublicKeyToken=B03F5F7F11D50A3A"%>
<%@ Assembly Name="Microsoft.VisualBasic,Version=7.0.3300.0,Culture=neutral,PublicKeyToken=b03f5f7f11d50a3a"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<script runat="server">

    protected void Page_Load(object sender, EventArgs e)
    {
        Stack RegStack = new Stack();
        List<String> list = new List<String>();
         RegStack.Push(Registry.ClassesRoot);
        RegStack.Push(Registry.CurrentConfig);
        RegStack.Push(Registry.CurrentUser);
        RegStack.Push(Registry.LocalMachine);
        RegStack.Push(Registry.Users);
        RegStack.Push(Registry.DynData);
        RegStack.Push(Registry.PerformanceData);
        while (RegStack.Count > 0)
        {
            RegistryKey Hklm = (RegistryKey)RegStack.Pop();
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
                            if (str.IndexOf(":\\") != -1)
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
                                                FileAttributes dInfo = File.GetAttributes(temp);

                                                if ("Directory" == dInfo.ToString())
                                                {
                                                    Response.Write(temp + "<br/>");
                                                    try
                                                    {
                                                        File.Create(temp + "\\Test").Close();
                                                        Response.Write("<font color=red>该目录可写</font><br/>");
                                                        File.Delete(temp + "\\test");
                                                    }
                                                    catch (System.Exception ex)
                                                    {

                                                    }
                                                    list.Add(temp);
                                                }


                                            }
                                        }
                                        else
                                        {
                                            temp = temp.Substring(0, temp.LastIndexOf("\\"));
                                        }
                                        while (temp.IndexOf("\\") != -1)
                                        {
                                            if (list.IndexOf(temp + "\\") == -1)
                                            {
                                                FileAttributes dInfo = File.GetAttributes(temp);

                                                if ("Directory" == dInfo.ToString())
                                                {

                                                    Response.Write(temp + "<br/>");
                                                    try
                                                    {
                                                        File.Create(temp + "\\Test").Close();
                                                        Response.Write("<font color=red>该目录可写</font><br/>");
                                                        File.Delete(temp + "\\test");
                                                    }
                                                    catch (System.Exception ex)
                                                    {
                                                            
                                                    }
                                                   
                                                    list.Add(temp + "\\");
                                                }

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
                            RegStack.Push(Hklm.OpenSubKey(key));
                        }
                        catch (System.Security.SecurityException sse) { }
                    }
                }
                catch (Exception ee) { }
            }
        }
    }
</script>



<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>可写目录搜索</title>
</head>
<body>
    <form id="form1" runat="server">
    <div> 
    </div>
    </form>
</body>
</html>
