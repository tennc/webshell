#!/usr/bin/python
# 07-07-04
# v1.0.0

# cgi-shell.py
# A simple CGI that executes arbitrary shell commands.


# Copyright Michael Foord
# You are free to modify, use and relicense this code.

# No warranty express or implied for the accuracy, fitness to purpose or otherwise for this code....
# Use at your own risk !!!

# E-mail michael AT foord DOT me DOT uk
# Maintained at www.voidspace.org.uk/atlantibots/pythonutils.html

"""
A simple CGI script to execute shell commands via CGI.
"""
################################################################
# Imports
try:
    import cgitb; cgitb.enable()
except:
    pass
import sys, cgi, os
sys.stderr = sys.stdout
from time import strftime
import traceback
from StringIO import StringIO
from traceback import print_exc

################################################################
# constants

fontline = '<FONT COLOR=#424242 style="font-family:times;font-size:12pt;">'
versionstring = 'Version 1.0.0 7th July 2004'

if os.environ.has_key("SCRIPT_NAME"):
    scriptname = os.environ["SCRIPT_NAME"]
else:
    scriptname = ""

METHOD = '"POST"'

################################################################
# Private functions and variables

def getform(valuelist, theform, notpresent=''):
    """This function, given a CGI form, extracts the data from it, based on
    valuelist passed in. Any non-present values are set to '' - although this can be changed.
    (e.g. to return None so you can test for missing keywords - where '' is a valid answer but to have the field missing isn't.)"""
    data = {}
    for field in valuelist:
        if not theform.has_key(field):
            data[field] = notpresent
        else:
            if  type(theform[field]) != type([]):
                data[field] = theform[field].value
            else:
                values = map(lambda x: x.value, theform[field])     # allows for list type values
                data[field] = values
    return data


theformhead = """<HTML><HEAD><TITLE>cgi-shell.py - a CGI by Fuzzyman</TITLE></HEAD>
<BODY><CENTER>
<H1>Welcome to cgi-shell.py - <BR>a Python CGI</H1>
<B><I>By Fuzzyman</B></I><BR>
"""+fontline +"Version : " + versionstring + """, Running on : """ + strftime('%I:%M %p, %A %d %B, %Y')+'.</CENTER><BR>'

theform = """<H2>Enter Command</H2>
<FORM METHOD=\"""" + METHOD + '" action="' + scriptname + """\">
<input name=cmd type=text><BR>
<input type=submit value="Submit"><BR>
</FORM><BR><BR>"""
bodyend = '</BODY></HTML>'
errormess = '<CENTER><H2>Something Went Wrong</H2><BR><PRE>'

################################################################
# main body of the script

if __name__ == '__main__':
    print "Content-type: text/html"         # this is the header to the server
    print                                   # so is this blank line
    form = cgi.FieldStorage()
    data = getform(['cmd'],form)
    thecmd = data['cmd']
    print theformhead
    print theform
    if thecmd:
        print '<HR><BR><BR>'
        print '<B>Command : ', thecmd, '<BR><BR>'
        print 'Result : <BR><BR>'
        try:
            child_stdin, child_stdout = os.popen2(thecmd)
            child_stdin.close()
            result = child_stdout.read()
            child_stdout.close()
            print result.replace('\n', '<BR>')

        except Exception, e:                      # an error in executing the command
            print errormess
            f = StringIO()
            print_exc(file=f)
            a = f.getvalue().splitlines()
            for line in a:
                print line

    print bodyend


"""
TODO/ISSUES



CHANGELOG

07-07-04        Version 1.0.0
A very basic system for executing shell commands.
I may expand it into a proper 'environment' with session persistence...
"""
