<%
Dim Vars
%>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><strong>A list of all server 
  variables : </strong> </font></p>
<p><BR>
  <BR>
</p>
<TABLE width="75%" BORDER=1 align="center" cellpadding="3" cellspacing="0">
  <TR> 
    <TD width="149"><p><font size="2" face="Arial, Helvetica, sans-serif"><B>Server 
        Variable Name</B></font></p>
      </TD>
    <TD width="333"><p><font size="2" face="Arial, Helvetica, sans-serif"><B>Server 
        Variable Value</B></font></p>
      </TD>
  </TR>
  <% For Each Vars In Request.ServerVariables %>
  <TR> 
    <TD><FONT SIZE="1" face="Arial, Helvetica, sans-serif"><%= Vars %></FONT></TD>
    <TD><FONT SIZE="1" face="Arial, Helvetica, sans-serif"><%= Request.ServerVariables(Vars) %>&nbsp;</FONT></TD>
  </TR>
  <% Next %>
</TABLE>
