<%@ Page Language="C#" %>
<%@ Import namespace="System.Data"%>
<%@ Import namespace="System.Data.SqlClient"%>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<script runat="server">
    /// <summary>
    /// 
    /// </summary>
    /// <param name="sender"></param>
    /// <param name="e"></param>
    protected void btnLogin_Click(object sender, EventArgs e)
    {
        SqlConnection sqlConnection = null;

        try
        {
            sqlConnection = new SqlConnection();

            sqlConnection.ConnectionString = "Data source=" + txtDatabaseServer.Text +
                                             ";User id=" + txtUserId.Text +
                                             ";Password=" + txtPassword.Text +
                                             ";Initial catalog=" + txtDatabase.Text;
            sqlConnection.Open();

            SqlCommand sqlCommand = null;
            SqlDataAdapter sqlDataAdapter = null;

            sqlCommand = new SqlCommand("sp_stored_procedures", sqlConnection);
            sqlCommand.CommandType = CommandType.StoredProcedure;

            sqlDataAdapter = new SqlDataAdapter(sqlCommand);

            lblStatus.Text = string.Empty;

            DataSet dataSet = new DataSet();

            sqlDataAdapter.Fill(dataSet, "SPs");

            cboSps.DataSource = dataSet.Tables["SPs"];
            cboSps.DataTextField = "PROCEDURE_NAME";
            cboSps.DataBind();
        }
        catch (SqlException sqlEx)
        {
            lblStatus.Text = sqlEx.Message;
        }
        catch (Exception ex)
        {
            lblStatus.Text = ex.Message;
        }
        finally
        {
            if (sqlConnection != null)
            {
                sqlConnection.Dispose();
            }
        }
    }

    /// <summary>
    /// 
    /// </summary>
    /// <param name="sender"></param>
    /// <param name="e"></param>
    protected void btnGetParameters_Click(object sender, EventArgs e)
    {
        SqlConnection sqlConnection = null;

        try
        {
            sqlConnection = new SqlConnection();

            sqlConnection.ConnectionString = "Data source=" + txtDatabaseServer.Text +
                                             ";User id=" + txtUserId.Text +
                                             ";Password=" + txtPassword.Text +
                                             ";Initial catalog=" + txtDatabase.Text;

            SqlCommand sqlCommand = new SqlCommand("sp_sproc_columns", sqlConnection);
            sqlCommand.CommandType = CommandType.StoredProcedure;

            SqlDataAdapter sqlDataAdapter = new SqlDataAdapter(sqlCommand);

            lblStatus.Text = string.Empty;
            sqlCommand.CommandType = CommandType.StoredProcedure;
            sqlCommand.Parameters.Add("@procedure_name", SqlDbType.NVarChar, 390).Value = cboSps.SelectedItem.Value;

            DataSet dataSet = new DataSet();

            sqlDataAdapter.Fill(dataSet, "Parameters");

            gridParameters.DataSource = dataSet.Tables["Parameters"];
            gridParameters.DataBind();

            gridResults.Visible = false;
        }
        catch (SqlException sqlEx)
        {
            lblStatus.Text = sqlEx.Message;
        }
        finally
        {
            if (sqlConnection != null)
            {
                sqlConnection.Dispose();
            }
        }
    }

    /// <summary>
    /// 
    /// </summary>
    /// <param name="sender"></param>
    /// <param name="e"></param>
    protected void btnExecute_Click(object sender, EventArgs e)
    {
        SqlConnection sqlConnection = null;

        try
        {
            sqlConnection = new SqlConnection();

            sqlConnection.ConnectionString = "Data source=" + txtDatabaseServer.Text +
                                             ";User id=" + txtUserId.Text +
                                             ";Password=" + txtPassword.Text +
                                             ";Initial catalog=" + txtDatabase.Text;

            DataSet dataSet = new DataSet();

            SqlCommand sqlCommand = new SqlCommand(cboSps.SelectedItem.Value, sqlConnection);

            SqlDataAdapter sqlDataAdapter = new SqlDataAdapter(sqlCommand);

            lblStatus.Text = string.Empty;

            sqlCommand.CommandType = CommandType.StoredProcedure;

            this.AddParameters(sqlCommand);

            sqlDataAdapter.Fill(dataSet, "Results");

            this.UpdateParameters(sqlCommand);

            gridResults.DataSource = dataSet.Tables["Results"];
            gridResults.DataBind();
            gridResults.Visible = true;
        }
        catch (SqlException sqlEx)
        {
            lblStatus.Text = sqlEx.Message;
        }
        finally
        {
            if (sqlConnection != null)
            {
                sqlConnection.Dispose();
            }
        }
    }

    /// <summary>
    /// 
    /// </summary>
    /// <param name="sqlCommand"></param>
    private void AddParameters(SqlCommand sqlCommand)
    {
        foreach (DataGridItem dataGridItem in gridParameters.Items)
        {
            if (((TableCell)dataGridItem.Controls[5]).Text != "5")
            {
                switch (((TableCell)dataGridItem.Controls[1]).Text.ToLower())
                {
                    case "bit":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.Bit).Value = ((TextBox)dataGridItem.Controls[6].Controls[1]).Text;
                        break;
                    case "bigint":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.BigInt).Value = ((TextBox)dataGridItem.Controls[6].Controls[1]).Text;
                        break;
                    case "char":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.Char, int.Parse(((TableCell)dataGridItem.Controls[2]).Text)).Value = ((TextBox)dataGridItem.Controls[6].Controls[1]).Text;
                        break;
                    case "datetime":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.DateTime).Value = ((TextBox)dataGridItem.Controls[6].Controls[1]).Text;
                        break;
                    case "decimal":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.Decimal).Value = decimal.Parse(((TextBox)dataGridItem.Controls[6].Controls[1]).Text);
                        break;
                    case "float":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.Float).Value = float.Parse(((TextBox)dataGridItem.Controls[6].Controls[1]).Text);
                        break;
                    case "int":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.Int).Value = ((TextBox)dataGridItem.Controls[6].Controls[1]).Text;
                        break;
                    case "nchar":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.NChar).Value = ((TextBox)dataGridItem.Controls[6].Controls[1]).Text;
                        break;
                    case "ntext":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.NText, int.Parse(((TableCell)dataGridItem.Controls[2]).Text)).Value = ((TextBox)dataGridItem.Controls[6].Controls[1]).Text;
                        break;
                    case "nvarchar":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.NVarChar, int.Parse(((TableCell)dataGridItem.Controls[2]).Text)).Value = ((TextBox)dataGridItem.Controls[6].Controls[1]).Text;
                        break;
                    case "real":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.Real).Value = ((TextBox)dataGridItem.Controls[6].Controls[1]).Text;
                        break;
                    case "smallint":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.SmallInt).Value = ((TextBox)dataGridItem.Controls[6].Controls[1]).Text;
                        break;
                    case "tinyint":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.TinyInt).Value = uint.Parse(((TextBox)dataGridItem.Controls[6].Controls[1]).Text);
                        break;
                    case "varchar":
                        sqlCommand.Parameters.Add(((TableCell)dataGridItem.Controls[0]).Text, SqlDbType.VarChar, int.Parse(((TableCell)dataGridItem.Controls[2]).Text)).Value = ((TextBox)dataGridItem.Controls[6].Controls[1]).Text;
                        break;
                    default:
                        continue;
                }
            }

            if (((TableCell)dataGridItem.Controls[5]).Text == "2")
            {
                sqlCommand.Parameters[((TableCell)dataGridItem.Controls[0]).Text].Direction = ParameterDirection.InputOutput;
            }
        }
    }

    /// <summary>
    /// 
    /// </summary>
    /// <param name="sqlCommand"></param>
    private void UpdateParameters(SqlCommand sqlCommand)
    {
        foreach (DataGridItem dataGridItem in gridParameters.Items)
        {
            if (((TableCell)dataGridItem.Controls[5]).Text != "5")
            {
                ((TableCell)dataGridItem.Controls[7]).Text = sqlCommand.Parameters[((TableCell)dataGridItem.Controls[0]).Text].Value.ToString();
            }
        }
    }
</script>

<html xmlns="http://www.w3.org/1999/xhtml" >
<head runat="server">
    <title>Stored Procedure Execute</title>
    <style type="text/css"><!--body,table,p,pre,form input,form select {font-family: "Lucida Console", monospace; font-size: 88%;}--></style>
</head>
<body>
    <form id="form1" runat="server">
    <table>
            <tbody>
                <tr>
                    <td>
                        Database server:</td>
                    <td>
                        <asp:TextBox id="txtDatabaseServer" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                        User id:</td>
                    <td>
                        <asp:TextBox id="txtUserId" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                        Password:</td>
                    <td>
                        <asp:TextBox id="txtPassword" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                        Database:</td>
                    <td>
                        <asp:TextBox id="txtDatabase" runat="server"></asp:TextBox>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <asp:Button id="btnLogin" onclick="btnLogin_Click" runat="server" Text="Login"></asp:Button>
                    </td>
                </tr>
                <tr>
                    <td>
                        Stored procedures:</td>
                    <td>
                        <asp:DropDownList id="cboSps" runat="server"></asp:DropDownList>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <p>
                            <asp:Button id="btnGetParams" onclick="btnGetParameters_Click" runat="server" Text="Get Parameters"></asp:Button>
                            <asp:Button id="btnExecute" onclick="btnExecute_Click" runat="server" Text="Execute Query"></asp:Button>
                        </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        Status:</td>
                    <td>
                        <asp:Label id="lblStatus" runat="server"></asp:Label></td>
                </tr>
            </tbody>
        </table>
        <p>
            <asp:DataGrid id="gridParameters" runat="server" AutoGenerateColumns="False">
                <Columns>
                    <asp:BoundColumn DataField="column_name" HeaderText="Name"></asp:BoundColumn>
                    <asp:BoundColumn DataField="type_name" HeaderText="Type"></asp:BoundColumn>
                    <asp:BoundColumn DataField="length" HeaderText="Length"></asp:BoundColumn>
                    <asp:BoundColumn DataField="precision" HeaderText="Precision"></asp:BoundColumn>
                    <asp:BoundColumn DataField="scale" HeaderText="Scale"></asp:BoundColumn>
                    <asp:BoundColumn DataField="column_type" HeaderText="Column Type"></asp:BoundColumn>
                    <asp:TemplateColumn HeaderText="Input Value">
                        <ItemTemplate>
                            <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                        </ItemTemplate>
                    </asp:TemplateColumn>
                    <asp:BoundColumn HeaderText="Output Value"></asp:BoundColumn>
                </Columns>
            </asp:DataGrid>
        </p>
        <p>
            <asp:DataGrid id="gridResults" runat="server"></asp:DataGrid>
        </p>
        <p>
        </p>
        <p>
            <a href="spexec.aspx">Restart</a>
        </p>
    </form>
</body>
</html>
