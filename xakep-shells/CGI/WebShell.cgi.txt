#!/usr/bin/perl
###############################################################################
### Gamma Web Shell
### Copyright 2003 Gamma Group
### All rights reserved
###
### Gamma Web Shell is free for both commercial and non commercial
### use. You may modify this script as you find necessary as long
### as you do not sell it. Redistribution is not allowed without
### prior consent from Gamma Group (support@gammacenter.com).
### 
### Gamma Group <http://www.gammacenter.com>
###

use strict;

###############################################################################

package WebShell::Configuration;

use vars qw($password $restricted_mode $ok_commands);

##
## Password.
## Set to blank if you don't need password protection.
##
$password = "changeme";

##
## Restricted mode.
## Set to "1" to allow only a limited set of commands.
##
$restricted_mode = 0;

##
## Available commands.
## The list of available commands for the restricted mode.
##
$ok_commands = ['ls', 'ls -l', 'pwd', 'uptime'];

###############################################################################

package WebShell::Templates;

use vars qw($LOGIN_TEMPLATE $INPUT_TEMPLATE $EXECUTE_TEMPLATE $BROWSE_TEMPLATE);

my $VERSION = 'Gamma Web Shell 1.3';

my $STYLESHEET = <<EOT;
body {
  font-family: Verdana, Helvetica, sans-serif;
  font-size: 90%;
  color: #000;
  background: #FFF;
  margin: 0px;
  padding: 0px;
}

h1, h2, h3, h4, h5, h6 {
  margin: 0.3em;
  padding: 0px;
}

input, select, textarea, select {
  font-family: Verdana, Helvetica, sans-serif;
  font-size: 100%;
  margin: 1px;
  padding: 0px 1px;
}

pre, code, tt {
  font-family: 'Courier New', Courier, monospace;
  font-size: 100%;
}

form {
  margin: 0px;
  padding: 0px;
}

table {
  font-size: 100%;
}

a {
  text-decoration: none;
  color: #000;
  background: transparent;
}

a:hover {
  text-decoration: underline;
}

.header, .footer {
  color: #000;
  background: #CCF;
  margin: 0px;
  padding: 0px;
  text-align: center;
  border: solid #000;
  border-width: 1px 0px;
}

.box {
  border: 1px solid #000;
  border-collapse: collapse;
  color: #000;
  background: #CCF;
}

.box-header, .box-content, .box-text, .box-error, .box-menu {
  border: 1px solid #000;
}

.box-header, .box-header a {
  color: #FFF;
  background: #000;
}

.box-content {
  text-align: center;
}

.box-text {
  padding: 3px 10px;
  font-size: 90%;
}

.box-menu {
  padding: 3px 10px;
}

.box-error {
  color: #FFF;
  background: #F00;
  font-weight: bold;
  padding: 3px 25px;
  text-align: center;
}

.dialog {
  text-align: left;
  border-collapse: collapse;
}

.dialog-even {
  color: #000;
  background: #CCF;
}

.dialog-odd {
  color: #000;
  background: #AAE;
}

.menu {
  font-weight: normal;
}

.menu-selected {
  font-weight: bold;
}

.tool {
  background: transparent;
  color: #000;
  border-style: hidden;
  border-width: 1px;
  text-decoration: none;
}

.tool:hover {
  border-style: outset;
  text-decoration: none;
}

.output {
  color: #FFF;
  background: #000;
  padding: 1em;
  font-weight: bold;
}

.output-text {
}

.output-command {
  color: #FF7;
  background: #000;
}

.output-error {
  color: #FFF;
  background: #F00;
}

.entries {
  border: 1px solid #777;
  border-collapse: collapse;
}

.entries td, .entries th {
  padding: 2px 10px;
}

.entries th, .entries td {
  border: 1px solid #777;
}

.entries-even {
    color: #FFF;
    background: #444;
}

.entry-dir a {
  color: #BBF;
  background: transparent;
}

.entry-exec {
  color: #BFB;
  background: transparent;
}

.entry-file {
}

.entry-mine {
}

.entry-alien {
  color: #FBB;
  background: transparent;
}

EOT

$LOGIN_TEMPLATE = <<EOT;
<html>
    <head>
        <title>Gamma Web Shell</title>
        <style type="text/css">$STYLESHEET</style>
    </head>
    <body>
        <table width="100%" height="100%">
            <tr><td class="header"><h2>$VERSION</h2></td></tr>
            <tr>
                <td width="100%" height="100%" align="center" valign="center">
                    <form action="WebShell.cgi" method="POST">
                        <table class="box">
                            <tr><th class="box-header">Login</th></tr>
                            [% if error %]
                                <tr><td class="box-error">Invalid password!</td></tr>
                            [% end %]
                            <tr>
                                <td class="box-content">
                                    <table class="dialog" width="100%">
                                        <tr>
                                            <td>Password:</td>
                                            <td><input name="password" type="password"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="box-content">
                                    <input class="tool" type="submit" value="OK">
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
            <tr><td class="footer"><h5>Copyright &copy; 2003 <a href="http://www.gammacenter.com/">Gamma Group</a></h5></td></tr>
        </table>    
    </body>
</html>
EOT

$INPUT_TEMPLATE = <<EOT;
<html>
    <head>
        <title>Gamma Web Shell</title>
        <style type="text/css">$STYLESHEET</style>
    </head>
    <body>
        <table width="100%" height="100%">
            <tr><td class="header"><h2>$VERSION</h2></td></tr>
            <tr>
                <td width="100%" height="100%" align="center" valign="center">
                    <iframe name="output" src="WebShell.cgi?action=execute" width="80%" height="80%"></iframe>
                    <br><br>
                    <script type="text/javascript">
                        function submit_execute() {
                            var entry = document.forms.execute.elements['command'];
                            if (entry.value.length > 0) {
                                entry.select();
                                entry.focus();
                                document.forms.execute.elements['action'].value = 'execute';
                                return true;
                            }
                            else {
                                return false;
                            }
                        }
                        function submit_browse() {
                            document.forms.execute.elements['action'].value = 'browse';
                        }
                    </script>
                    <form name="execute" action="WebShell.cgi" method="POST" target="output">
                        <input name="action" type="hidden" value="execute">
                        <table class="box">
                            <tr>
                                <td class="box-content">
                                    <table class="dialog" width="100%">
                                        <tr>
                                            <th>Command:</th>
                                            <td><input name="command" type="text" size="50"></td>
                                            <td><input class="tool" type="submit" value="Execute" onClick="return submit_execute()"></td>
                                            <td><input class="tool" type="submit" value="Browse" onClick="return submit_browse()"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </form>
                </td>
            </tr>
            <tr><td class="footer"><h5>Copyright &copy; 2003 <a href="http://www.gammacenter.com/">Gamma Group</a></h5></td></tr>
        </table>    
    </body>
</html>
EOT

$EXECUTE_TEMPLATE = <<EOT;
<html>
    <head>
        <title>Gamma Web Shell</title>
        <style type="text/css">$STYLESHEET</style>
    </head>
    <body class="output">
        [% if old_line %]
            <pre class="output-command">[% old_line as html %]</pre>
        [% end %]
        [% if output %]
            <pre class="output-text">[% output as html %]</pre>
        [% end %]
        [% if error %]
            <pre class="output-error">[% error as html %]</pre>
        [% end %]
        [% if new_line %]
            <pre class="output-command">[% new_line as html %]</pre>
        [% end %]
    </body>
</html>
EOT

$BROWSE_TEMPLATE = <<EOT;
<html>
    <head>
        <title>Gamma Web Shell</title>
        <style type="text/css">$STYLESHEET</style>
    </head>
    <body class="output">
        [% if error %]
            <p class="output-error">[% error as html %]</p>
        [% end %]
        <table class="entries" width="100%">
            <tr class="entries-even" align="left">
                <th colspan="6">
                    [% for entry in directory %]<code class="entry-dir"><a href="WebShell.cgi?action=browse&path=[% entry.path as url %]">[% entry.name as html %]/</a></code>[% end %]
                </th>
            </tr>
            <tr class="entries-odd" align="left">
                <th width="100%"><small>Name</small></th>
                <th><small>Size</small></th>
                <th><small>Time</small></th>
                <th><small>Owner</small></th>
                <th><small>Group</small></th>
                <th><small>Mode</small></th>
            </tr>
            [% for entry in entries %]
                <tr class="entries-[% if loop.entry.even %]even[% else %]odd[% end %]">
                    <td width="100%">
                        [% if entry.type_file %]
                            [% if entry.type_exec %]
                                <code class="entry-exec">[% entry.name as html %]</code>
                            [% else %]
                                <code class="entry-file">[% entry.name as html %]</code>
                            [% end %]
                        [% elif entry.type_dir %]
                            <code class="entry-dir"><a href="WebShell.cgi?action=browse&path=[% entry.name as url %]">[% entry.name as html %]/</a></code>
                        [% else %]
                            <code class="entry-other">[% entry.name as html %]</code>
                        [% end %]
                    </td>
                    <td align="right">
                        [% if entry.type_file %]
                            <code class="entry-text">[% entry.size as html %]</code></td>
                        [% else %]
                        &nbsp;
                        [% end %]
                    </td>
                    <td><code class="entry-text">[% entry.time as nbsp %]</code></td>
                    <td><code class="entry-[% if entry.all_rights %]mine[% else %]alien[% end %]">[% entry.user as html %]</code></td>
                    <td><code class="entry-[% if entry.all_rights %]mine[% else %]alien[% end %]">[% entry.group as html %]</code></td>
                    <td><code class="entry-text">[% entry.mode as html %]</code></td>
                </tr>
            [% end %]
        </table>
    </body>
</html>
EOT


###############################################################################

package WebShell::MiniXIT;

sub new {
    my ($class) = @_;
    return bless {}, $class;
}

sub substitute {
    my ($self, $input, %keywords) = @_;
    my $statements = $self->parse($input);
    my $operation = $self->compile($statements);
    my $output = $self->evaluate($operation, \%keywords);
    return $output;
}

sub parse {
    my ($self, $input) = @_;
    my $statements = [];
    my $start = 0;
    while ($input =~ /(\[%\s*(.*?)\s*%\])/g) {
        my $match_end = pos($input);
        my $match_start = $match_end - length($1);
        if ($start < $match_start) {
            my $text = substr($input, $start, $match_start-$start);
            push @$statements, { id => 'text', text => $text };
        }
        push @$statements, $self->parse_command($2);
        $start = $match_end;
    }
    if ($start < length($input)) {
        my $text = substr($input, $start);
        push @$statements, { id => 'text', text => $text };
    }
    return $statements;
}

sub parse_command {
    my ($self, $command) = @_;
    if ($command =~ /^if\s+(\w+(\.\w+)*)$/) {
        return { id => 'if', test => $1, };
    }
    elsif ($command =~ /^elif\s+(\w+(\.\w+)*)$/) {
        return { id => 'elif', test => $1 };
    }
    elsif ($command =~ /^else$/) {
        return { id => 'else' };
    }
    elsif ($command =~ /^for\s+(\w+)\s+in\s+(\w+(\.\w+)*)$/) {
        return { id => 'for', name => $1, list => $2 };
    }
    elsif ($command =~ /^end$/) {
        return { id => 'end' };
    }
    elsif ($command =~ /^(\w+(\.\w+)*)(\s+as\s+(\w+))$/) {
        return { id => 'print', variable => $1, format => $4 };
    }
    else {
        die "invalid command: '$command'";
    }
}

sub compile {
    my ($self, $statements) = @_;
    my $operation = $self->compile_sequence($statements);
    if (scalar(@$statements)) {
        my $statement = shift(@$statements);
        my $id = $statements->{id};
        die "unexpected statement: '$id'";
    }
    return $operation;
}

sub compile_sequence {
    my ($self, $statements) = @_;
    my $operations = [];
    while (scalar(@$statements) > 0) {
        my $id = $statements->[0]->{id};
        if ($id eq 'if') {
            push @$operations, $self->compile_condition($statements);
        }
        elsif ($id eq 'for') {
            push @$operations, $self->compile_loop($statements);
        }
        elsif ($id eq 'print' or $id eq 'text') {
            my $statement = shift @$statements;
            push @$operations, $statement;
        }
        else {
            last;
        }
    }
    return { id => 'sequence', operations => $operations };
}

sub compile_condition {
    my ($self, $statements) = @_;
    my $conditions = [];
    my $statement = shift @$statements;
    my $id = defined $statement ? $statement->{id} : 'none';
    while ($id eq 'if' or $id eq 'elif' or $id eq 'else') {
        my $test = $id ne 'else' ? $statement->{test} : undef;
        my $operation = $self->compile_sequence($statements);
        push @$conditions, { test => $test, operation => $operation };
        $statement = shift @$statements;
        $id = defined $statement ? $statement->{id} : 'none';
    }
    die "'end' expected, but '$id' found" unless $id eq 'end';
    return { id => 'condition', conditions => $conditions };
}

sub compile_loop {
    my ($self, $statements) = @_;
    my $statement = shift @$statements;
    my $name = $statement->{name};
    my $list = $statement->{list};
    my $operation = $self->compile_sequence($statements);
    $statement = shift @$statements;
    my $id = defined $statement ? $statement->{id} : 'none';
    die "'end' expected, but '$id' found" unless $id eq 'end';
    return { id => 'loop',
        name => $name, list => $list, operation => $operation };
}

sub evaluate {
    my ($self, $operation, $keywords) = @_;
    $keywords->{loop} = {};
    my $chunks = $self->evaluate_operation($operation, $keywords);
    return join('', @$chunks);
}

sub evaluate_operation {
    my ($self, $operation, $keywords) = @_;
    if ($operation->{id} eq 'condition') {
        return $self->evaluate_condition($operation->{conditions}, $keywords);
    }
    elsif ($operation->{id} eq 'loop') {
        return $self->evaluate_loop($operation->{name}, $operation->{list},
                $operation->{operation}, $keywords);
    }
    elsif ($operation->{id} eq 'print') {
        return $self->evaluate_print($operation->{variable},
                $operation->{format}, $keywords);
    }
    elsif ($operation->{id} eq 'sequence') {
        my $chunks = [];
        push @$chunks, @{$self->evaluate_operation($_, $keywords)}
                for (@{$operation->{operations}});
        return $chunks;
    }
    elsif ($operation->{id} eq 'text') {
        return [$operation->{text}];
    }
}

sub evaluate_condition {
    my ($self, $conditions, $keywords) = @_;
    for my $condition (@$conditions) {
        my $test = $condition->{test};
        my $value = defined $test ?
                $self->evaluate_variable($test, $keywords) : 1;
        return $self->evaluate_operation($condition->{operation}, $keywords)
                    if $value;
    }
    return [];
}

sub evaluate_loop {
    my ($self, $name, $list, $operation, $keywords) = @_;
    my $values = $self->evaluate_variable($list, $keywords);
    my $length = scalar(@$values);
    my $index = 0;
    my $chunks = [];
    for my $value (@$values) {
        $keywords->{$name} = $value;
        $keywords->{loop}->{$name} = {
            index => $index, number => $index+1,
            first => $index == 0, last => $index == $length-1,
            odd => $index % 2 == 1, even => $index % 2 == 0,
        };
        push @$chunks, @{$self->evaluate_operation($operation, $keywords)};
        $index++;
    }
    delete $keywords->{$name};
    delete $keywords->{loop}->{$name};
    return $chunks;
}

sub evaluate_print {
    my ($self, $variable, $format, $keywords) = @_;
    my $value = $self->evaluate_variable($variable, $keywords);
    if ($format eq 'html') {
        for ($value) { s/&/&amp;/g; s/</&lt;/g; s/>/&gt;/g; s/"/&quot;/g; }
    }
    elsif ($format eq 'nbsp') {
        for ($value) {
            s/&/&amp;/g; s/</&lt;/g; s/>/&gt;/g; s/"/&quot;/g; s/ /&nbsp;/g;
        }
    }
    elsif ($format eq 'url') {
        $value =~ s/(\W)/sprintf('%%%02X', ord($1))/eg;
    }
    elsif ($format ne '') {
        
        die "unknown format: '$format'";
    }
    return [$value];
}

sub evaluate_variable {
    my ($self, $variable, $keywords) = @_;
    my $value = $keywords;
    for my $name (split(/\./, $variable)) {
        $value = $value->{$name};
    }
    return $value;
}

###############################################################################

package WebShell::Script;

use CGI;
use CGI::Carp qw(fatalsToBrowser);
use IPC::Open3;
use Cwd;
use POSIX;

sub new {
    my ($class) = @_;
    my $self = bless { }, $class;
    $self->initialize();
    return $self;
}

sub query {
    my ($self, @names) = @_;
    my @values = ();
    for my $name (@names) {
        my $value = $self->{cgi}->param($name);
        for ($value) { s/^\s+//; s/\s+$//; }
        push @values, $value;
    }
    return wantarray ? @values : "@values";
}

sub initialize {
    my ($self) = @_;
    $self->{cgi} = new CGI;
    $self->{cwd} = $self->{cgi}->cookie(-name => 'WebShell-cwd');
    $self->{cwd} = cwd unless defined $self->{cwd};
    $self->{cwd} = cwd if $WebShell::Configuration::restricted_mode;
    $self->{login} = 0;
    my $login = $self->{cgi}->cookie(-name => 'WebShell-login');
    my $password = $self->query('password');
    $self->{login} = 1
            if crypt($WebShell::Configuration::password, $login."XX") eq $login;
    $self->{login} = 1 if $password eq $WebShell::Configuration::password;
}

sub run {
    my ($self) = @_;
    return $self->login_action unless $self->{login};
    my $action = $self->query('action');
    $action = 'default' unless $action =~ /^\w+$/;
    $action = $self->can($action . '_action');
    $action = $self->can('default_action') unless defined $action;
    $self->$action();
}

sub default_action {
    my ($self) = @_;
    $self->publish('INPUT');
}

sub login_action {
    my ($self) = @_;
    $self->publish('LOGIN', error => ($self->query('password') ne ''));
}

sub command {
    my ($self, $command) = @_;
    chdir($self->{cwd});
    my $pid = open3(\*WRTH, \*RDH, \*ERRH, "/bin/sh");
    print WRTH "$command\n";
    close(WRTH);
    my $output = do { local $/; <RDH> };
    my $error = do { local $/; <ERRH> };
    waitpid($pid, 0);
    return ($output, $error);
}

sub forbidden_command {
    my ($self, $command) = @_;
    my $error = "This command is not available in the restricted mode.\n";
    $error .= "You may only use the following commands:\n";
    for my $ok_command (@$WebShell::Configuration::ok_commands) {
        $error .= "    $ok_command\n";
    }
    return ('', $error);
}

sub cd_command {
    my ($self, $command) = @_;
    my $error;
    my $directory = $1 if $command =~ /^cd\s+(\S+)$/;
    warn "cwd: '$self->{cwd}'\n";
    warn "command: '$command'\n";
    warn "directory: '$directory'\n";
    if ($directory ne '') {
        $error = $! unless chdir($self->{cwd});
        $error = $! unless chdir($directory);
    }
    $self->{cwd} = cwd;
    return ('', $error);
}

sub execute_action {
    my ($self) = @_;
    my $command = $self->query('command');
    my $user = getpwuid($>);
    my $old_line = "[$user: $self->{cwd}]\$ $command";
    my ($output, $error);
    if ($command ne "") {
        my $allow = not $WebShell::Configuration::restricted_mode;
        for my $ok_command (@$WebShell::Configuration::ok_commands) {
            $allow = 1 if $command eq $ok_command;
        }
        if ($allow) {
            $command =~ /^(\w+)/;
            if (my $method = $self->can("${1}_command")) {
                ($output, $error) = $self->$method($command);
            }
            else {
                ($output, $error) = $self->command($command);
            }
            
        }
        else {
            ($output, $error) = $self->forbidden_command($command);
        }
    }
    my $new_line = "[$user: $self->{cwd}]\$ " unless $command eq "";
    $self->publish('EXECUTE',
        old_line => $old_line, new_line => $new_line,
        output => $output, error => $error);
}

sub browse_action {
    my ($self) = @_;
    my $error = "";
    my $path = $self->query('path');
    if ($WebShell::Configuration::restricted_mode and $path ne '') {
        $error = "You cannot browse directories in the restricted mode.";
        $path = "";
    }
    $error = $! unless chdir($self->{cwd});
    if ($path ne '') {
        $error = $! unless chdir($path);
    }
    $self->{cwd} = cwd;
    opendir(DIR, '.');
    my @dir = readdir(DIR);
    closedir(DIR);
    my @entries = ();
    for my $name (@dir) {
        my ($dev, $ino, $mode, $nlink, $uid, $gid, $rdev, $size,
            $atime, $mtime, $ctime, $blksize, $blocks) = stat($name);
        my $modestr = S_ISDIR($mode) ? 'd' : '-';
        $modestr .= ($mode & S_IRUSR) ? 'r' : '-';
        $modestr .= ($mode & S_IWUSR) ? 'w' : '-';
        $modestr .= ($mode & S_ISUID) ? 's' : ($mode & S_IXUSR) ? 'x' : '-';
        $modestr .= ($mode & S_IRGRP) ? 'r' : '-';
        $modestr .= ($mode & S_IWGRP) ? 'w' : '-';
        $modestr .= ($mode & S_ISGID) ? 's' : ($mode & S_IXGRP) ? 'x' : '-';
        $modestr .= ($mode & S_IROTH) ? 'r' : '-';
        $modestr .= ($mode & S_IWOTH) ? 'w' : '-';
        $modestr .= ($mode & S_IXOTH) ? 'x' : '-';
        my $userstr = getpwuid($uid);
        my $groupstr = getgrgid($gid);
        my $sizestr = ($size < 1024) ? $size :
                        ($size < 1024*1024) ? sprintf("%.1fk", $size/1024) :
                        sprintf("%.1fM", $size/(1024*1024));
        my $timestr = strftime('%H:%M %b %e %Y', localtime($mtime));
        push @entries, {
            name => $name,
            type_file => S_ISREG($mode),
            type_dir => S_ISDIR($mode),
            type_exec => ($mode & S_IXUSR),
            mode => $modestr,
            user => $userstr,
            group => $groupstr,
            order => (S_ISDIR($mode) ? 0 : 1) . $name,
            all_rights => (-w $name),
            size => $sizestr,
            time => $timestr,
        };
    }
    @entries = sort { $a->{order} cmp $b->{order} } @entries;
    my @directory = ();
    my $path = '';
    for my $name (split m|/|, $self->{cwd}) {
        $path .= "$name/";
        push @directory, {
            name => $name,
            path => $path,
        };
    }
    @directory = ({ name => '', path => '/'}) unless @directory;
    $self->publish('BROWSE', entries => \@entries, directory => \@directory,
            error => $error);
}

sub publish {
    my ($self, $template, %keywords) = @_;
    $template = eval '$WebShell::Templates::' . $template . '_TEMPLATE';
    my $xit = new WebShell::MiniXIT;
    my $text = $xit->substitute($template, %keywords);
    $self->{cgi}->url =~ m{^http://([^/]*)(.*)/[^/]*$};
    my $domain = $1;
    my $path = $2;
    my $cwd_cookie = $self->{cgi}->cookie(
        -name => 'WebShell-cwd',
        -value => $self->{cwd},
        -domain => $domain,
        -path => $path,
    );
    my $login = "";
    if ($self->{login}) {
        my $salt = join '',
                ('.', '/', 0..9, 'A'..'Z', 'a'..'z')[rand 64, rand 64];
        $login = crypt($WebShell::Configuration::password, $salt);
    }
    my $login_cookie = $self->{cgi}->cookie(
        -name => 'WebShell-login',
        -value => $login,
        -domain => $domain,
        -path => $path,
    );
    print $self->{cgi}->header(-cookie => [$cwd_cookie, $login_cookie]);
    print $text;
}

###############################################################################

package WebShell;

my $script = new WebShell::Script;
$script->run;

###############################################################################
###############################################################################
