

  ASP.NET Backdoors

  Copyright (c) 2012 woanware
  Developed by Mark Woan (markwoan[at]gmail.com)

  ---------------------------------------------------------------------------
  
  Change Log
  ----------
  
  v1.3.0
  ------
  - Added an auth key parameter, so that you can password protect each of the 
    pages. Modify the constant located at the top of each file. The 
    filesystembrowser.aspx file needs you to initially specify the "authkey=XXX" 
    parameter value
  
  v1.2.0
  ------
  - Added spexec.aspx allows you to dynamically load SQL Server stored 
    procedures and associated parameters, then execute the SP
  
  v1.1.0
  ------
  - Added sql.aspx which allows you to execute SQL statements
  
  v1.0.2
  ------
  - MikeA has kindly modified filesystembrowser.aspx and fileupload.aspx so that
    if the application renames the files on upload, the functionality still
    works, since I had hardcoded the filenames
  
  v1.0.1
  ------
  - Added extra validation to filesystembrowser.aspx to catch errors when 
    assigning a default drive. Thanks foob for the feedback
  
  v1.0.0
  ------
  - Initial Public Release

  ---------------------------------------------------------------------------

  woanware
  http://www.woanware.co.uk/

  



