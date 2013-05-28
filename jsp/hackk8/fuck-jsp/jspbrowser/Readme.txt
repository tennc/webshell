jsp File Browser version 1.2
--------------------------------------------------------------------------------------

------------------------IMPORTANT

With this jsp you can destroy important files on your system, it also could be 
a serious security hole on your server.
Use this script only, if you know what you do. There is no warranty of any kind.

------------------------REQUIREMENTS

To use the File browser, you need a JSP1.1 compatible Web Server like Tomcat, Resin 
or Jetty.
If you use the browser on webspace provided by an internet service provider, 
it could be, that you are not allowed to go in some directories or execute 
commands on the server, this will result in an exception.

------------------------INSTALLATION

Just copy the jsp file to any configured Web application. The author recommends to
protect the directory you copy the file into by password, to avoid abuse.

------------------------SETTINGS

If you want to change the standard style, you can create a css file in the directory 
where Browser.jsp is located with the name "Browser.css". If you want choose another name 
change this line in Browser.jsp:
	private static final String CSS_NAME = "Browser.css";
For the syntax, look at the example css file.

If you click on a filename, the file will be opened in an new window. If you want that file
opened in your current window, change this line:
	private static final boolean USE_POPUP = true;
to
	private static final boolean USE_POPUP = false;

If you hold the mouse cursor over a directory name, a tooltip with
the first ten entries of this directory show up. This feature can lead to performance issues. If
you observe slow loading times you should change this line:
	private static final boolean USE_DIR_PREVIEW = true;
to
	private static final boolean USE_DIR_PREVIEW = false;

You could also change the number of entries in the preview by changing this line:
	private static final int DIR_PREVIEW_NUMBER = 10;

If you would like to execute commands on the server, you have to specify a 
command line interpreter and the parameter to execute a command.
This is the parameter for windows:
	private static final String[] COMMAND_INTERPRETER = {"cmd","/C"}; 			

The maximum time in ms a command is allowed to run before it will be terminated is specified
by this line:
	private static final long MAX_PROCESS_RUNNING_TIME = 30000;

You can restrict file browsing and manipulation by setting 
	private static final boolean RESTRICT_BROWSING = true;
You can choose between whitelist restriction, that means the user is allowed to browse only in
directories, which are lower than RESTRICT_PATH, or blacklist restriction, which allows
the user to access all directories besides RESTRICT_PATH. 
	private static final boolean RESTRICT_WHITELIST = true;
You can set more than one directory in RESTRICT_PATH, seperated by semicolon.

It is also possible to make the file browser read-only. All operations which change the
file structure (besides upload and native command execution) are forbidden and turned off.
To achieve this change
	private static final boolean READ_ONLY = false;
to 
	private static final boolean READ_ONLY = true;
.

You can also turn off upload with
	private static final boolean ALLOW_UPLOAD = false; .

If you restrict file access it is also recommend to forbid native command execution by
changing
	private static final boolean NATIVE_COMMANDS = true;
to 
	private static final boolean NATIVE_COMMANDS = false;
.

------------------------USAGE

This JSP program allows remote web-based file access and manipulation.  
You can copy, create, move, rename and delete files.
Text files can be edited and groups of files and folders can be downloaded 
as a single zip file that is created on the fly.

http://server/webapp/Browser.jsp
or
http://server/webapp/Browser.jsp?dir=[Directory on the server]

You do not need a javascript capable browser, but it looks nicer with it.

If you want to copy or move a file, please enter the target directory name in the
edit field (absolute or relative). If you want to create a new file or directory, 
enter the name in the edit field.

If you click on a header name (e.g. size) the entries will be sorted by this property.
If you click two times, they will be sorted descending.

The button "Download as zip" let you download the selected directories and files packed as
one zip file.

The buttons "Delete Files", "Move Files", "Copy Files", delete, move and copy also selected 
directories with subdirectories.

If you click on a .zip or .jar filename, you will see the entries of the packed file.
You can unpack .zip, .jar and .gz direct on the server. For this filetype the entry in the
last column is "Unpack". If you click at the "Unpack" link, the file will be unpacked in
the current folder. Note, that you can only unpack a file, if no entry of the packed file
already exist in the directory (no overwriting). If you want to unpack this file, you have 
to delete the files on the server which correspond to the entries. This feature is very useful, 
if you would like to upload more than one file. Zip the files together on your computer, 
then upload the zip file and extract it on the server.

You can execute commands on the server (if you are allowed to) by clicking the "Launch command" 
button, but beware that you cannot interact with the program. If the execution time of the program 
is longer than MAX_PROCESS_RUNNING_TIME (standard: 30 sec.) the program will be killed.

If you click on a file, it will be shown, if the MIME Type is supported.
The following MIME Types are supported:

.png					image/png
.jpg, .jpeg				image/jpeg
.gif					image/gif
.tiff					image/tiff
.svg					image/svg+xml
.pdf					application/pdf
.htm, .html, .shtml		text/html
.xml					text/xml
.avi					video/x-msvideo
.mov					video/quicktime
.mpg, .mpeg, .mpe		video/mpeg
.rtf					application/rtf
.mid, .midi,			audio/x-midi
.xl,.xls,.xlv,.xla,.xlb,.xlt,.xlm,.xlk	application/excel
.doc, .dot				application/msword
.mp3					audio/mp3
.ogg					audio/ogg
else					text/plain

------------------------SHORTKEYS

You can use the following shortkeys for better handling:

r   Rename file
m   Move file
y   Copy file
Del Delete file
l   Launch command
z   Download selected files as zip
c   Create file
d   Create directory

------------------------KNOWN BUGS

The JVM from windows will sometimes displays a message box on the server,
if you try to access an empty removable drive. There will be no respond from
the server until the message box is closed.
If someone knows how to fix this, please write me a mail.
Removable drives will not be shown on the list, if you add them to this 
property:

private static final String[] FORBIDDEN_DRIVES= {"a:\\"}
like e.g.
private static final String[] FORBIDDEN_DRIVES= {"a:\\", "d:\\", "e:\\"}

------------------------CONTACT

Boris von Loesch
boris@vonloesch.de

------------------------CHANGELOG
1.2 (21.07.2006)
- Shortkeys
- Filter file table
- Fix a bug which appears with Tomcat
- Add parameter to turn jsp filebrowser to a read-only version
- Add parameter to disallow uploads (even in the read-only version)
- Nicer layout
- Javascript will now be cached by the browser therefore smaller page size
- Turned off directory preview by default, because it uses too much resources

1.1a (27.08.2004)
- killed a bug, which appears if you view or download files
- fix upload time display

1.1 (20.08.2004)
- Upload monitor
- Restrict file access

1.0 (13.04.2004)
- if you click two times on a table header, it will be sorted descending
- sort parameter is memorized
- bugfixes (14,11,15)
- added some mime types

1.0RC2 (02.02.2004)
- only bugfixes (3,4,6,9)

1.0RC1 (17.11.2003)
Thanks to David Cowan for code contribution (buffering), bug fixing and testing
- execute native shell commands
- quick change to lower directories paths
- solve homepath problem with Oracle oc4j
- remove two bugs in the upload routine
- add war file unpack and view support
- remove some html errors (page is now valid HTML 4.1 Transitional)
- add buffering for download of files and zip file creation, this increases the speed

0.6 (14.10.2003)
Thanks to David Levine for bug fixes
- Refactor parts of the code
- Viewing and unpacking of .zip, .jar and .gz files on the server
- Customizable layout via external css file (optional)
- Distinction between error and success messages
- Open File in a new window
- "Select all" checkbox
- More options
- Some small changes and bugfixes

0.5  (20.08.2003)
Greetings to Taylor Bastien who contributed a lot of code for this release
- Renaming of files
- File extension in an extra column
- variable filesize unit (bytes, KB or MB)
- Directory preview via tooltip (simple hold the mousecursor over a directory name and
  a tooltip with the first ten entries will appear)
- Summary (number and size of all files in the current directory)
- Text editor can save files with dos/windows or unix line ending
- many small changes

0.4  (17.05.2003)
- It does not longer need a temporary directory !
- Jsp 1.1 compatible (works now also in Tomcat 3)
- The file editor can now save the edited file with a new name and can make a backup
- selected row is marked by color and the checkbox can be selected by click at any place in the row
  (works only with Javascript)
- some new MIME types (xml, png, svg)
- unreadable files and directories are marked (not selectable)
- write protected files and directories are marked (italic)
- if no dir parameter is assigned, the home directory of the browser will be displayed
- some bugs killed

0.3
- Output is HTML 4.01 conform, should now be netscape>4 compatible
- Messages to indicate the status of an operation
- Many bugs killed
- Tooltips

0.2
- First release

CREDITS
Taylor Bastien
David Levine
David Cowan
Lieven Govaerts

LICENSE

jsp File browser
Copyright (C) 2003-2006 Boris von Loesch

This program is free software; you can redistribute it and/or modify it under 
the terms of the GNU General Public License as published by the 
Free Software Foundation; either version 2 of the License, or (at your option) 
any later version.

This program is distributed in the hope that it will be useful, but 
WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or 
FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with 
this program; if not, write to the 
Free Software Foundation, Inc., 
59 Temple Place, Suite 330, 
Boston, MA 02111-1307 USA
