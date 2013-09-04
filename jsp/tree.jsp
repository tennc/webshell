<%@ page language="java" import="java.util.*" pageEncoding="utf-8"%>
<%
String path = request.getContextPath();
String basePath = request.getScheme()+"://"+request.getServerName()+":"+request.getServerPort()+path+"/";
%>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <%@include file="/jsp/include/common.jsp"%>
    <base href="<%=basePath%>">
    
    <title>jquery esayui</title>
    
	<link rel="stylesheet" type="text/css" href="jquery-easyui-1.2.3/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="jquery-easyui-1.2.3/themes/icon.css">
	<script type="text/javascript" src="jquery-easyui-1.2.3/jquery-1.4.4.min.js"></script>
	<script type="text/javascript" src="jquery-easyui-1.2.3/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="jquery-easyui-1.2.3/locale/easyui-lang-zh_CN.js"></script>
	
	<script type="text/javascript">   
	 function doSubmit(){
			
			
			var nodes = $('#tt2').tree('getChecked');
			var s = '';
			for(var i=0; i<nodes.length; i++){
				if (s != '') s += ',';
				s += nodes[i].text;
			}
			alert(s);
		}
	
	
     $(function(){
            $('#tt2').tree({   
                 checkbox: true,   
                 url: 'treeCreateInit.action',   
                 onBeforeExpand:function(node,param){
                     $('#tt2').tree('options').url = "selectChild.action?checkid=" + node.id;                       
                 },               
                 onClick:function(node){
                	  alert(node.id+","+node.text);
                 },  
                  onCheck:function(node){
                  
                  }
             });   
         }); 
     </script>
  </head>
  
  <body>
  	 
    <form action="" method="post">
    	<input type="text" name="userName"/>
    	<input type="password" name="password" size=5>
    	<input type="button" value="提交" onclick="doSubmit();"/>
    </form>
  
     <div  style="position:relative;width:200px;height:200px;">
         <ul id="tt2">
         </ul>
     </div>
     
     
  </body>
</html>
