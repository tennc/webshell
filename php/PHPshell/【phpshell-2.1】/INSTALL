INSTALL file for PHP Shell 2.1
Copyright (C) 2000-2005 Martin Geisler <mgeisler@mgeisler.net>
Licensed under the GNU GPL.  See the file COPYING for details.


Downloading PHP Shell
=====================

You can always get the latest version of PHP Shell from my homepage:

  http://mgeisler.net/php-shell/



Installation
============

Installation is easy: first unpack the tarball or zipfile downloaded from the
above website into your webserver.  This will create a subdirectory called
phpweather-2.1 for PHP Shell version 2.1.

Try loading the file ``phpshell.php`` in your browser and check that you are
served a page that asks you to authenticate yourself with a username and a
password.  If you do not see such a page, then please check that you have
entered the URL correctly and that PHP is working on your server.



Configuration
=============

All configuration happens in the ``config.php`` file.  This is an ini-file
dispite its name.  Ini-files consist of a number of sections, each containing
a number of 'key = "value"' pairs.  PHP Shell has tree sections: '[users]' for
configuring usernames and passwords, '[aliases]' for configuring shell
aliases, and '[settings]' for general settings.


Setting Usernames and Passwords
-------------------------------

As a security precaution PHP Shell has no default username and password
(people often forget to change them...).  To add the user "alice" with
password "secret" you simply add

  [users]
  alice = "secret"

to the file.  Note that you can add as many users as you want by simply adding
more lines like this.

This system works, but there is a better way --- a way so that the password
does not appear in clear text in the file.  For that you use the supplied
script ``pwhash.php`` to generate a hashed password.  Please see the
instructions given in ``pwhash.php``.

With the above example the result could look like

  [users]
  alice    = "md5:7ea3b59e:eb271c4459253eaa163fcac2a119f225"

You will not get exactly the same line if you try it out, this is a feature of
the system which means that both "alice" and "bob" could have "secret" as
their password, and you would not be able to tell from just looking at
``config.php``.


Shell Aliases
-------------

As in a normal shell, PHP Shell supports alias expansion, albeit in a simple
form.  Aliases are defined by 'key = "value"' pairs in the '[aliases]'
section.  The "key" will be matched against the first token of the command
line and substituted with the "value" given.

Two convenient aliases are already defined:

  [aliases]
  ls = "ls -CvhF"
  ll = "ls -lvhF"


General Settings
----------------

PHP has just one other setting right now --- the home directory.  Change this
in the '[settings]' section.



Bugs?  Comments?
================

If you find a bug or miss something in PHP Shell, please don't hesitate to
mail me at <mgeisler@mgeisler.net>!  Or you could drop by and leave a comment
at http://mgeisler.net/php-shell/.
