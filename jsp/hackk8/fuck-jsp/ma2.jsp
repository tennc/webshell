<%@ page import="java.util.*,java.net.*,java.text.*,java.util.zip.*,java.io.*"%>
<%@ page contentType="text/html;charset=gb2312"%> 
<%!
/*
**************************************************************************************
*JSP 文件管理器 v1.001                                                               *
*Copyright (C) 2003 by Bagheera                                                      *
*E-mail:bagheera@beareyes.com                                                        *
*QQ:179189585                                                                        *
*http://jmmm.com                                                                     *
*------------------------------------------------------------------------------------*
*警告:请不要随便修改以上版权信息!                                                    *
**************************************************************************************
*#######免费空间管理系统正在完善之中，请到这里测试并发表宝贵意见:                    *
**http://jmmm.com/web/index.jsp    测试帐号:test  密码:test                          *
**************************************************************************************
*/

//编辑器显示列数
private static final int EDITFIELD_COLS =100;
//编辑器显示行数
private static final int EDITFIELD_ROWS = 30;
//-----------------------------------------------------------------------------

//改变上传文件是的缓冲目录(一般不需要修改)
private static String tempdir = ".";

public class FileInfo{
    public String name            = null,
                   clientFileName  = null,
                   fileContentType = null;
    private byte[] fileContents    = null;
    public File  file              = null;
    public StringBuffer sb = new StringBuffer(100);
    public void setFileContents(byte[] aByteArray){
        fileContents = new byte[aByteArray.length];
        System.arraycopy(aByteArray, 0, fileContents, 0, aByteArray.length);
    }
}

public class HttpMultiPartParser{
    private final String lineSeparator = System.getProperty("line.separator", "\n");
    private final int ONE_MB=1024*1024*1;

    public Hashtable processData(ServletInputStream is, String boundary, String saveInDir)
                             throws IllegalArgumentException, IOException {
        if (is == null) throw new IllegalArgumentException("InputStream");
        if (boundary == null || boundary.trim().length() < 1)
            throw new IllegalArgumentException("boundary");
        boundary = "--" + boundary;
        StringTokenizer stLine = null, stFields = null;
        FileInfo fileInfo = null;
        Hashtable dataTable = new Hashtable(5);
        String line = null, field = null, paramName = null;
        boolean saveFiles=(saveInDir != null && saveInDir.trim().length() > 0),
                isFile = false;
        if (saveFiles){
            File f = new File(saveInDir);
            f.mkdirs();
        }
        line = getLine(is);
        if (line == null || !line.startsWith(boundary))
            throw new IOException("未发现;"
                                 +" boundary = " + boundary
                                 +", line = "    + line);
        while (line != null){
            if (line == null || !line.startsWith(boundary)) return dataTable;
            line = getLine(is);
            if (line == null) return dataTable;
            stLine = new StringTokenizer(line, ";\r\n");
            if (stLine.countTokens() < 2) throw new IllegalArgumentException("出现错误!");
            line = stLine.nextToken().toLowerCase();
            if (line.indexOf("form-data") < 0) throw new IllegalArgumentException("出现错误!");
            stFields = new StringTokenizer(stLine.nextToken(), "=\"");
            if (stFields.countTokens() < 2) throw new IllegalArgumentException("出现错误!");
            fileInfo = new FileInfo();
            stFields.nextToken();
            paramName = stFields.nextToken();
            isFile = false;
            if (stLine.hasMoreTokens()){
                field    = stLine.nextToken();
                stFields = new StringTokenizer(field, "=\"");
                if (stFields.countTokens() > 1){
                    if (stFields.nextToken().trim().equalsIgnoreCase("filename")){
                        fileInfo.name=paramName;
                        String value = stFields.nextToken();
                        if (value != null && value.trim().length() > 0){
                            fileInfo.clientFileName=value;
                            isFile = true;
                        }
                        else{
                            line = getLine(is); // 去掉"Content-Type:"行
                            line = getLine(is); // 去掉空白行
                            line = getLine(is); // 去掉空白行
                            line = getLine(is); // 定位
                            continue;
                        }
                    }
                }
                else if (field.toLowerCase().indexOf("filename") >= 0){
                            line = getLine(is); // 去掉"Content-Type:"行
                            line = getLine(is); // 去掉空白行
                            line = getLine(is); // 去掉空白行
                            line = getLine(is); // 定位
                    continue;
                }
            }
            boolean skipBlankLine = true;
            if (isFile){
                line = getLine(is);
                if (line == null) return dataTable;
                if (line.trim().length() < 1) skipBlankLine = false;
                else{
                    stLine = new StringTokenizer(line, ": ");
                    if (stLine.countTokens() < 2)
                        throw new IllegalArgumentException("出现错误!");
                    stLine.nextToken(); 
                    fileInfo.fileContentType=stLine.nextToken();
                }
            }
            if (skipBlankLine){
                line = getLine(is);
                if (line == null) return dataTable;
            }
            if (!isFile){
                line = getLine(is);
                if (line == null) return dataTable;
                dataTable.put(paramName, line);
                //判断是否为目录
                if (paramName.equals("dir")){
                  saveInDir = line;
                  System.out.println(line);
                }
                line = getLine(is);
                continue;
            }
            try{
                OutputStream os = null;
                String path     = null;
                if (saveFiles)
                    os = new FileOutputStream(path = getFileName(saveInDir,
                                               fileInfo.clientFileName));
                else os = new ByteArrayOutputStream(ONE_MB);
                boolean readingContent = true;
                byte previousLine[] = new byte[2 * ONE_MB];
                byte temp[] = null;
                byte currentLine[] = new byte[2 * ONE_MB];
                int read, read3;
                if ((read = is.readLine(previousLine, 0, previousLine.length)) == -1) {
                    line = null;
                    break;
                }
                    while (readingContent){
                        if ((read3 = is.readLine(currentLine, 0, currentLine.length)) == -1) {
                            line = null;
                            break;
                        }
                        if (compareBoundary(boundary, currentLine)){
                            os.write( previousLine, 0, read );
                            os.flush();
                            line = new String( currentLine, 0, read3 );
                            break;
                        }
                        else{
                            os.write( previousLine, 0, read );
                            os.flush();
                            temp = currentLine;
                            currentLine = previousLine;
                            previousLine = temp;
                            read = read3;
                        }
                    }
                os.close();
                temp = null;
                previousLine = null;
                currentLine = null;
                if (!saveFiles){
                  ByteArrayOutputStream baos = (ByteArrayOutputStream)os;
                  fileInfo.setFileContents(baos.toByteArray());
                }
                else{
                  fileInfo.file = new File(path);
                  os = null;
                }
                dataTable.put(paramName, fileInfo);
            }
            catch (IOException e) {
              throw e;
            }
        }
        return dataTable;
    }

    // 比较数据
    private boolean compareBoundary(String boundary, byte ba[]){
        byte b;
        if (boundary == null || ba == null) return false;
        for (int i=0; i < boundary.length(); i++)
           if ((byte)boundary.charAt(i) != ba[i]) return false;
        return true;
    }


    private synchronized String getLine(ServletInputStream sis) throws IOException{
        byte   b[]  = new byte[1024];
        int    read = sis.readLine(b, 0, b.length), index;
        String line = null;
        if (read != -1){
           line = new String(b, 0, read);
           if ((index = line.indexOf('\n')) >= 0) line   = line.substring(0, index-1);
        }
        b = null;
        return line;
    }

    public String getFileName(String dir, String fileName) throws IllegalArgumentException{
        String path = null;
        if (dir == null || fileName == null) throw new IllegalArgumentException("目录或者文件不存在!");
        int index = fileName.lastIndexOf('/');
        String name = null;
        if (index >= 0) name = fileName.substring(index + 1);
        else name = fileName;
        index = name.lastIndexOf('\\');
        if (index >= 0) fileName = name.substring(index + 1);
        path = dir + File.separator + fileName;
        if (File.separatorChar == '/') return path.replace('\\', File.separatorChar);
        else return path.replace('/',  File.separatorChar);
    }
  }

  /**
  * 下面这个类是为文件和目录排序
  * @author bagheera
  * @version 1.001
  */
  class FileComp implements Comparator{
    int mode=1;
    /**
    * @排序方法 1=文件名, 2=大小, 3=日期
    */
    FileComp (int mode){
      this.mode=mode;
    }
    public int compare(Object o1, Object o2){
      File f1 = (File)o1;
      File f2 = (File)o2;
      if (f1.isDirectory()){
        if (f2.isDirectory()){
          switch(mode){
            case 1:return f1.getAbsolutePath().toUpperCase().compareTo(f2.getAbsolutePath().toUpperCase());
            case 2:return new Long(f1.length()).compareTo(new Long(f2.length()));
            case 3:return new Long(f1.lastModified()).compareTo(new Long(f2.lastModified()));
            default:return 1;
          }
        }
        else return -1;
      }
      else if (f2.isDirectory()) return 1;
      else{
          switch(mode){
            case 1:return f1.getAbsolutePath().toUpperCase().compareTo(f2.getAbsolutePath().toUpperCase());
            case 2:return new Long(f1.length()).compareTo(new Long(f2.length()));
            case 3:return new Long(f1.lastModified()).compareTo(new Long(f2.lastModified()));
            default:return 1;
          }
      }
    }
  }


  class Writer2Stream extends OutputStream{
    Writer out;
    Writer2Stream (Writer w){
      super();
      out=w;
    }
    public void write(int i) throws IOException{
      out.write(i);
    }
    public void write(byte[] b) throws IOException{
      for (int i=0;i<b.length;i++){
       int n=b[i];
       //Convert byte to ubyte
       n=((n>>>4)&0xF)*16+(n&0xF);
       out.write (n);
      }
    }
    public void write(byte[] b, int off, int len) throws IOException{
      for (int i=off;i<off+len;i++){
        int n=b[i];
        n=((n>>>4)&0xF)*16+(n&0xF);
        out.write (n);
      }
    }
  }

  static Vector expandFileList(String[] files, boolean inclDirs){
    Vector v = new Vector();
    if (files==null) return v;
    for (int i=0;i<files.length;i++) v.add (new File(URLDecoder.decode(files[i])));
    for (int i=0;i<v.size();i++){
      File f = (File) v.get(i);
      if (f.isDirectory()){
        File[] fs = f.listFiles();
        for (int n=0;n<fs.length;n++) v.add(fs[n]);
        if (!inclDirs){
          v.remove(i);
          i--;
        }
      }
    }
    return v;
  }

  static String substr(String s, String search, String replace){
     StringBuffer s2 = new StringBuffer ();
     int i = 0, j = 0;
     int len = search.length();
     while ( j > -1 ){
         j = s.indexOf( search, i );
         if ( j > -1 ){
           s2.append( s.substring(i,j) );
           s2.append( replace );
           i = j + len;
         }
     }
     s2.append( s.substring(i, s.length()) );
     return s2.toString();
  }


  static String getDir (String dir, String name){
    if (!dir.endsWith(File.separator)) dir=dir+File.separator;
    File mv = new File (name);
    String new_dir=null;
    if (!mv.isAbsolute()){
      new_dir=dir+name;
    }
    else new_dir=name;
    return new_dir;
  }
%>

<%
request.setAttribute("dir", request.getParameter("dir"));
String browser_name = request.getRequestURI();

//查看文件
if (request.getParameter("file")!=null){
  File f = new File (request.getParameter("file"));
  BufferedInputStream reader = new BufferedInputStream(new FileInputStream(f));
  int l = f.getName().lastIndexOf(".");
  //判断文件后缀
  if (l>=0){
    String ext = f.getName().substring(l).toLowerCase();
    if (ext.equals(".jpg")||ext.equals(".jpeg")||ext.equals(".jpe"))
      response.setContentType("image/jpeg");
    else if (ext.equals(".gif")) response.setContentType("image/gif");
    else if (ext.equals(".pdf")) response.setContentType("application/pdf");
    else if (ext.equals(".htm")||ext.equals(".html")||ext.equals(".shtml")) response.setContentType("text/html");
    else if (ext.equals(".avi")) response.setContentType("video/x-msvideo");
    else if (ext.equals(".mov")||ext.equals(".qt")) response.setContentType("video/quicktime");
    else if (ext.equals(".mpg")||ext.equals(".mpeg")||ext.equals(".mpe"))
      response.setContentType("video/mpeg");
    else if (ext.equals(".zip")) response.setContentType("application/zip");
    else if (ext.equals(".tiff")||ext.equals(".tif")) response.setContentType("image/tiff");
    else if (ext.equals(".rtf")) response.setContentType("application/rtf");
    else if (ext.equals(".mid")||ext.equals(".midi")) response.setContentType("audio/x-midi");
    else if (ext.equals(".xl")||ext.equals(".xls")||ext.equals(".xlv")||ext.equals(".xla")
            ||ext.equals(".xlb")||ext.equals(".xlt")||ext.equals(".xlm")||ext.equals(".xlk"))
      response.setContentType("application/excel");
    else if (ext.equals(".doc")||ext.equals(".dot")) response.setContentType("application/msword");
    else if (ext.equals(".png")) response.setContentType("image/png");
    else if (ext.equals(".xml")) response.setContentType("text/xml");
    else if (ext.equals(".svg")) response.setContentType("image/svg+xml");
    else response.setContentType("text/plain");
  }
  else response.setContentType("text/plain");
  response.setContentLength((int)f.length());
  out.clearBuffer();
  int i;
  while ((i=reader.read())!=-1) out.write(i);
  reader.close();
  out.flush();
}
//保存所选中文件为zip文件
else if ((request.getParameter("Submit")!=null)&&(request.getParameter("Submit").equals("Save as zip"))){
  Vector v = expandFileList(request.getParameterValues("selfile"), false);
  File dir_file = new File(""+request.getAttribute("dir"));
  int dir_l = dir_file.getAbsolutePath().length();
  response.setContentType ("application/zip");
  response.setHeader ("Content-Disposition", "attachment;filename=\"bagheera.zip\"");
  out.clearBuffer();
  ZipOutputStream zipout = new ZipOutputStream(new Writer2Stream(out));
  zipout.setComment("Created by JSP 文件管理器 1.001");
  for (int i=0;i<v.size();i++){
    File f = (File)v.get(i);
    if (f.canRead()){
      zipout.putNextEntry(new ZipEntry(f.getAbsolutePath().substring(dir_l+1)));
      BufferedInputStream fr = new BufferedInputStream(new FileInputStream(f));
      int b;
      while ((b=fr.read())!=-1) zipout.write(b);
      fr.close();
      zipout.closeEntry();
    }
  }
  zipout.finish();
  out.flush();
}
//下载文件
else if (request.getParameter("downfile")!=null){
  String filePath = request.getParameter("downfile");
  File f = new File(filePath);
  if (f.exists()&&f.canRead()) {
       response.setContentType ("application/octet-stream");
       response.setHeader ("Content-Disposition", "attachment;filename=\""+f.getName()+"\"");
       response.setContentLength((int) f.length());
       BufferedInputStream fileInputStream = new BufferedInputStream(new FileInputStream(f));
       int i;
       out.clearBuffer();
       while ((i=fileInputStream.read()) != -1) out.write(i);
       fileInputStream.close();
       out.flush();
     }
     else {
        out.println("<html><body><h1>文件"+f.getAbsolutePath()+
                    "不存在或者无读权限</h1></body></html>");
     }
}

else{
  if (request.getAttribute("dir")==null){
    request.setAttribute ("dir", application.getRealPath("."));
  }
%>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=gb2312">
    <style type="text/css">
        .login { font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: #666666; width:320px; }
        .header { font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 10pt; color: #666666; font-weight: bold; }
        .tableHeader { background-color: #c0c0c0; color: #666666;}
        .tableHeaderLight { background-color: #cccccc; color: #666666;}
        .main { font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: #666666;}
        .copy { font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: #999999;}
        .copy:Hover { color: #666666; text-decoration : underline; }
        .button {background-color: #c0c0c0; color: #666666;
                 border-left: 1px solid #999999; border-right: 1px solid #999999;
                 border-top: 1px solid #999999; border-bottom: 1px solid #999999}
        .button:Hover { color: #444444 }
        td { font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: #666666;}
        A { text-decoration: none; }
        A:Hover { color : Red; text-decoration : underline; }
        BODY { font-family:Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: #666666;}
    </style>
<script type="text/javascript">
<!--
var check = false;
function dis(){
  check = true;
}

var DOM = 0, MS = 0, OP = 0;
function CheckBrowser() {
 if (window.opera) OP = 1;
 if(document.getElementById) {
   DOM = 1;
 }
 if(document.all && !OP) {
   MS = 1;
 }
}

function selrow (element, i){
  CheckBrowser();
  var erst;
  if ((OP==1)||(MS == 1)) erst = element.firstChild.firstChild;
  else if (DOM == 1) erst = element.firstChild.nextSibling.firstChild;
  //MouseIn
  if (i == 0)
    if (erst.checked == true) element.style.backgroundColor = '#dddddd';
    else element.style.backgroundColor = '#eeeeee';
  //MouseOut
  else if (i == 1){
    if (erst.checked == true) element.style.backgroundColor = '#dddddd';
    else element.style.backgroundColor = '#ffffff';
  }
  //MouseClick
  else if ((i == 2)&&(!check)){
    if (erst.checked == true) element.style.backgroundColor = '#eeeeee';
    else element.style.backgroundColor = '#dddddd';
    erst.click();
  }
  else check = false;
}
//-->
</script>
<%
}
//上传
if ((request.getContentType()!=null)&&(request.getContentType().toLowerCase().startsWith("multipart"))){
  response.setContentType("text/html");
  HttpMultiPartParser parser = new HttpMultiPartParser();
  boolean error = false;
  try{
    Hashtable ht = parser.processData(request.getInputStream(), "-", tempdir);
    if (ht.get("myFile")!=null){
      FileInfo fi = (FileInfo)ht.get("myFile");
      File f = fi.file;
      //把文件从缓冲目录里复制出来
      String path = (String)ht.get("dir");
      if (!path.endsWith(File.separator)) path = path+File.separator;
      if (!f.renameTo(new File(path+f.getName()))){
        request.setAttribute("message", "无法上传文件.");
        error = true;
        f.delete();
      }
    }
    else{
      request.setAttribute("message", "请选中上传文件!");
      error = true;
    }
    request.setAttribute("dir", (String)ht.get("dir"));
  }
  catch (Exception e){
    request.setAttribute("message", "发生如下错误:"+e+". 上传失败!");
    error = true;
  }
  if (!error) request.setAttribute("message", "文件上传成功.");
}
else if (request.getParameter("editfile")!=null){
%>
<title>JSP文件管理器-编辑文件:<%=request.getParameter("editfile")%></title>
</head>
<body>

<%
  String encoding="gb2312"; 
  request.setAttribute("dir", null);
  File ef = new File(request.getParameter("editfile"));
  BufferedReader reader = new BufferedReader(new FileReader(ef));
  String disable = "";
  if (!ef.canWrite()) disable = "无法打开文件";
  out.print("<form action=\""+browser_name+"\" method=\"Post\">\n"+
              "<textarea name=\"text\" wrap=\"off\" cols=\""+
              EDITFIELD_COLS+"\" rows=\""+EDITFIELD_ROWS+"\""+">"+disable);

  String c;
  while ((c =reader.readLine())!=null){
    c=substr(c,"&", "&amp;");
    c=substr(c,"<", "&lt;");
    c=substr(c,">", "&gt;");
    c=substr(c,"\"", "&quot;");
    out.print(c+"\n");
  }
  reader.close();
%></textarea>
  <input type="hidden" name="nfile" value="<%= request.getParameter("editfile")%>">
  <table><tr>
  <td title="Enter the new filename"><input type="text" name="new_name" value="<%=ef.getName()%>"></td>
  <td><input type="Submit" name="Submit" value="保存"></td>
  <td><input type="Submit" name="Submit" value="取消"></td></tr>
  <tr><td><input type="checkbox" name="Backup" checked>覆写</td></tr>
  </table>
  </form>
  </body>
</html>
<%
}
//保存文件
else if (request.getParameter("nfile")!=null){
  File f = new File(request.getParameter("nfile"));
  File new_f = new File(getDir(f.getParent(), request.getParameter("new_name")));
  if (request.getParameter("Submit").equals("Save")){
    if (new_f.exists()&&request.getParameter("Backup")!=null){
      File bak = new File(new_f.getAbsolutePath()+".bak");
      bak.delete();
      new_f.renameTo(bak);
    }
    BufferedWriter outs = new BufferedWriter(new FileWriter(new_f));
    outs.write(request.getParameter("text"));
    outs.flush();
    outs.close();
  }
  request.setAttribute("dir", f.getParent());
}
//删除文件
else if ((request.getParameter("Submit")!=null)&&(request.getParameter("Submit").equals("Delete Files"))){
  Vector v = expandFileList(request.getParameterValues("selfile"), true);
  boolean error = false;
  for (int i=v.size()-1;i>=0;i--){
    File f = (File)v.get(i);
    if (!f.canWrite()||!f.delete()){
      request.setAttribute("message", "无法删除文件"+f.getAbsolutePath()+". 删除失败");
      error = true;
      break;
    }
  }
  if ((!error)&&(v.size()>1)) request.setAttribute("message", "All files deleted");
  else if ((!error)&&(v.size()>0)) request.setAttribute("message", "File deleted");
  else if (!error) request.setAttribute("message", "No files selected");
}
//建新目录
else if ((request.getParameter("Submit")!=null)&&(request.getParameter("Submit").equals("Create Dir"))){
  String dir = ""+request.getAttribute("dir");
  String dir_name = request.getParameter("cr_dir");
  String new_dir = getDir (dir, dir_name);
  if (new File(new_dir).mkdirs()){
    request.setAttribute("message", "目录创建完成");
  }
  else request.setAttribute("message", "创建新目录"+new_dir+"失败");
}
//创建文件
else if ((request.getParameter("Submit")!=null)&&(request.getParameter("Submit").equals("Create File"))){
  String dir = ""+request.getAttribute("dir");
  String file_name = request.getParameter("cr_dir");
  String new_file = getDir (dir, file_name);
  //Test, if file_name is empty
  if ((file_name.trim()!="")&&!file_name.endsWith(File.separator)){
    if (new File(new_file).createNewFile()) request.setAttribute("message", "文件成功创建");
    else request.setAttribute("message", "创建文件"+new_file+"失败");
  }
  else request.setAttribute("message", "错误: "+file_name+"文件不存在");
}
//转移文件
else if ((request.getParameter("Submit")!=null)&&(request.getParameter("Submit").equals("Move Files"))){
  Vector v = expandFileList(request.getParameterValues("selfile"), true);
  String dir = ""+request.getAttribute("dir");
  String dir_name = request.getParameter("cr_dir");
  String new_dir = getDir(dir, dir_name);
  boolean error = false;
  if (!new_dir.endsWith(File.separator)) new_dir+=File.separator;
  for (int i=v.size()-1;i>=0;i--){
    File f = (File)v.get(i);
    if (!f.canWrite()||!f.renameTo(new File(new_dir+f.getAbsolutePath().substring(dir.length())))){
      request.setAttribute("message", "不能转移"+f.getAbsolutePath()+".转移失败");
      error = true;
      break;
    }
  }
  if ((!error)&&(v.size()>1)) request.setAttribute("message", "全部文件转移成功");
  else if ((!error)&&(v.size()>0)) request.setAttribute("message", "文件转移成功");
  else if (!error) request.setAttribute("message", "请选择文件");
}
//复制文件
else if ((request.getParameter("Submit")!=null)&&(request.getParameter("Submit").equals("Copy Files"))){
  Vector v = expandFileList(request.getParameterValues("selfile"), true);
  String dir = (String)request.getAttribute("dir");
  if (!dir.endsWith(File.separator)) dir+=File.separator;
  String dir_name = request.getParameter("cr_dir");
  String new_dir = getDir(dir, dir_name);
  boolean error = false;
  if (!new_dir.endsWith(File.separator)) new_dir+=File.separator;
  byte buffer[] = new byte[0xffff];
  try{
    for (int i=0;i<v.size();i++){
      File f_old = (File)v.get(i);
      File f_new = new File(new_dir+f_old.getAbsolutePath().substring(dir.length()));
      if (f_old.isDirectory()) f_new.mkdirs();
      else if (!f_new.exists()){
        InputStream fis = new FileInputStream (f_old);
        OutputStream fos = new FileOutputStream (f_new);
        int b;
        while((b=fis.read(buffer))!=-1) fos.write(buffer, 0, b);
        fis.close();
        fos.close();
      }
      else{
        //文件存在
        request.setAttribute("message", "无法复制"+f_old.getAbsolutePath()+",文件已经存在,复制失败");
        error = true;
        break;
      }
    }
  }
  catch (IOException e){
    request.setAttribute("message", "错误"+e+".复制取消");
    error = true;
  }
  if ((!error)&&(v.size()>1)) request.setAttribute("message", "全部文件复制成功");
  else if ((!error)&&(v.size()>0)) request.setAttribute("message", "文件复制成功");
  else if (!error) request.setAttribute("message", "请选择文件");
}
//目录浏览
if ((request.getAttribute("dir")!=null)){
%>
<title>JSP文件管理器-目录浏览:<%=request.getAttribute("dir")%></title>
</head>
<body>
<table>
<tr><td>
<% if (request.getAttribute("message")!=null){
  out.println("<table border=\"0\" width=\"100%\"><tr><td bgcolor=\"#FFFF00\" align=\"center\">");
  out.println(request.getAttribute("message"));
  out.println("</td></tr></table>");
}
%>
<form action="<%= browser_name %>" method="Post">
<table border="1" cellpadding="1" cellspacing="0" width="100%">
<%
  String dir = URLEncoder.encode(""+request.getAttribute("dir"));
  String cmd = browser_name+"?dir="+dir;
  out.println("<th bgcolor=\"#c0c0c0\"></th><th title=\"按文件名称排序\" bgcolor=\"#c0c0c0\"><a href=\""+cmd+"&sort=1\">文件名</a></th>"+
  "<th title=\"按大小称排序\" bgcolor=\"#c0c0c0\"><a href=\""+cmd+"&sort=2\">大小</th>"+
  "<th title=\"按日期称排序\" bgcolor=\"#c0c0c0\"><a href=\""+cmd+"&sort=3\">日期</th>"+
  "<th bgcolor=\"#c0c0c0\">&nbsp;</th><th bgcolor=\"#c0c0c0\">&nbsp;</th>");
  char trenner=File.separatorChar;
  File f=new File(""+request.getAttribute("dir"));
  //跟或者分区
  File[] entry=File.listRoots();
  for (int i=0;i<entry.length;i++){
    out.println("<tr bgcolor='#ffffff'\">");
    out.println("<td>※切换到相应盘符：<span style=\"background-color: rgb(255,255,255);color:rgb(255,0,0)\">");
    String name = URLEncoder.encode(entry[i].getAbsolutePath());
    String buf = entry[i].getAbsolutePath();
    out.println("◎<a href=\""+browser_name+"?dir="+name+"\">["+buf+"]</a>");
    out.println("</td></tr>");

  }
  out.println("<br>");
  //..
  if (f.getParent()!=null){
    out.println("<tr bgcolor='#ffffff' onmouseover=\"this.style.backgroundColor = '#eeeeee'\" onmouseout=\"this.style.backgroundColor = '#ffffff'\">");
    out.println("<td></td><td>");
    out.println("<a href=\""+browser_name+"?dir="+URLEncoder.encode(f.getParent())+"\">[..]</a>");
    out.println("</td></tr>");
  }
  //文件和目录
  entry=f.listFiles();
  if (entry!=null&&entry.length>0){
    int mode=1;
    if (request.getParameter("sort")!=null) mode = Integer.parseInt(request.getParameter("sort"));
    Arrays.sort(entry, new FileComp(mode));
    String ahref = "<a onmousedown=\"javascript:dis();\" href=\"";
    for (int i=0;i<entry.length;i++){
      String name = URLEncoder.encode(entry[i].getAbsolutePath());
      String link;
      String dlink = "&nbsp;";
      String elink = "&nbsp;";
      String buf = entry[i].getName();
      if (entry[i].isDirectory()){
        if (entry[i].canRead())
          link = ahref+browser_name+"?dir="+name+"\">["+buf+"]</a>";
        else
          link = "["+buf+"]";
      }
      else{
          if (entry[i].canRead()){
            if (entry[i].canWrite()){
              link=ahref+browser_name+"?file="+name+"\">"+buf+"</a>";
              dlink=ahref+browser_name+"?downfile="+name+"\">下载</a>";
              elink=ahref+browser_name+"?editfile="+name+"\">编辑</a>";
            }
            else{
              link=ahref+browser_name+"?file="+name+"\"><i>"+buf+"</i></a>";
              dlink=ahref+browser_name+"?downfile="+name+"\">下载</a>";
              elink=ahref+browser_name+"?editfile="+name+"\">查看</a>";
            }
          }
          else{
            link = buf;
          }
      }
      String date = DateFormat.getDateTimeInstance().format(new Date(entry[i].lastModified()));
      out.println("<tr bgcolor='#ffffff' onmouseup = \"javascript:selrow(this, 2);\" "+
                  "onmouseover=\"javascript:selrow(this, 0);\" onmouseout=\"javascript:selrow(this, 1);\">");
      out.println("<td><input type=\"checkbox\" name=\"selfile\" value=\""+name+"\" onmousedown=\"javascript:dis();\"></td>");
      out.println("<td>"+link+"</td><td align=\"right\">"+entry[i].length()+
                  " bytes</td><td align=\"right\">"+
                  date+"</td><td>"
                  +dlink+"</td><td>"+elink+"</td></tr>");
      }
  }
%>
</table>
<table>
<input type="hidden" name="dir" value="<%=request.getAttribute("dir")%>">
<tr>
<td title="把所选文件打包下载"><input class="button" type="Submit" name="Submit" value="Save as zip"></td>
<td colspan="2" title="删除所选文件和文件夹"><input class="button" type="Submit" name="Submit" value="Delete Files"></td></tr>
<tr>
<td><input type="text" name="cr_dir"></td>
<td><input class="button" type="Submit" name="Submit" value="Create Dir"></td>
<td><input class="button" type="Submit" name="Submit" value="Create File"></td>
<td><input class="button" type="Submit" name="Submit" value="Move Files"></td>
<td><input class="button" type="Submit" name="Submit" value="Copy Files"></td></tr>
</table>
</form>

<form action="<%= browser_name %>" enctype="multipart/form-data" method="POST">
<table cellpadding="0">
<tr>
<td><input type="hidden" name="dir" value="<%=request.getAttribute("dir")%>">
<input type="file" name="myFile"></td>
<td><input type="Submit" class="button" name="Submit" value="Upload"></td>
</tr>
</table>
</form>
<hr>
<center><small>JSP 文件管理器 v1.001 By Bagheera<a href="http://jmmm.com">http://jmmm.com</a>
</small></center>
</td></tr></table>
</body>
</html>
<%
}
%>
