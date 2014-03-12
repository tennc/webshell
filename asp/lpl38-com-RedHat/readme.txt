操作之前必看。
一、 整体介绍

　　　 　本身代码经过变量转换和替换字符加密,可完美过安全狗,护卫神,D盾,safe3 Waf,KOasp木马查杀等IIS防火墙和查杀工具。
　程序结合海洋顶端asp木马、老兵asp木马、Drakblade暗黑之剑1.3版本、05年到13年主流asp木马的优点进行开发完善制作。
　程序在目录检测功能、隐藏功能、数据库操作和提权处做了较大改进，具体请看下列介绍

二、 提交代码经过ascii 2次转码post提交过IIS安全狗,护卫神,D盾,safe3 Waf等IIS防火墙拦截代码。

三、 登陆成功后显示＂欢迎界面＂,＂欢迎界面＂显示服务器安全指数，等级分为　高、中、低三等级，根据wscript.shell磁盘根目录是否可读取等功能判断。
　第一项显示：服务器iis版本、服务器超时时间、以及session信息、服务器ＣＰＵ数量、主机名、默认管理员信息、Terminal Service终端端口（需要wscript.shell组件支持）支持脚本探测(aspx,php,pl)功能，支持bing查询同服务器所有支持aspx脚本站点。
第二项显示：系统当前路径变量。
　 第三项显示：磁盘根目录的读取权限问题（判断是否可跨站）。
第四项显示：常用组件信息，左侧11个为危险组件，右侧11个为安全组件。
　 第五项显示：读取c:\windows\system32\sethc.exe　和　c:\windows\system32\magnify.exe 文件的属性、时间、文件体积，从而判断是否被入侵。

四、 右上角的ZONE-H图标为一键提交被黑网页到被黑站点统计www.zone-h.com.cn,个人信息请编辑程序修改,或用生成器生成。
五、 WEB根目录和本程序目录都可以转入文件操作页。
　文件操作一：左侧为磁盘和快捷不安全目录查看（目录为智能判断，不存在则不显示）
　文件操作二：右侧为文件操作模块和文件夹操作模块。
文件操作支持浏览器模式打开、编辑(支持UTF-8模式编辑)、复制、移动、删除（支持强制删除只读属性文件）、修改属性为隐藏or正常、数据库模式编辑。
文件夹操作支持修改文件夹属性、删除、复制、移动
数据库模式编辑支持查看内容、修改内容、删除内容、拖库。
六、 功能一分为三项功能
目录检测功能，补丁检测功能以及端口扫描功能。这三项功能不需要服务器过多脚本支持，故而放到一起。
＊＊＊目录扫描:
支持单文件检测，目录检测，是否循环所有磁盘，是否选择深度目录扫描和子目录扫描(目录扫描结尾必须加入“\”)
　　　　　单文件检测格式：
c:\Program Files (x86)\Helicon\ISAPI_Rewrite3\Rewrite.log
　　　　　多文件检测格式：
c:\Program Files (x86)\Helicon\ISAPI_Rewrite3\Rewrite.log
d:\recycler\cmd.exe
单文件循环磁盘检测格式：
x:\Program Files (x86)\Helicon\ISAPI_Rewrite3\Rewrite.log
多文件循环磁盘检测格式：
x:\Program Files (x86)\Helicon\ISAPI_Rewrite3\Rewrite.log
x:\recycler\cmd.exe
　单目录扫描格式(可选是否扫描子目录或文件)：
d:\recycler\
多目录扫描格式(可选是否扫描子目录或文件)：
d:\recycler\
c:\program files\
单目录循环扫描格式(需改磁盘名称为“x”、可选是否扫描子目录或文件)
x:\program files\
多目录循环扫描格式(需改磁盘名称为“x”、可选是否扫描子目录或文件)
x:\program files\
x:\recycler\
　混合模式扫描格式：（混合模式不如循环扫描磁盘强大，主要是选择）
c:\boot.ini
x:\recycler\cmd.exe
c:\php\
x:\recycler\
......可自行添加
注：一般扫描只选择循磁盘＋不包含文件＋不包含子目录＋显示不可读项＋显示不可写项，就足够了，就是默认选项，如果要深度扫描请选择（子目录＋包含文件）
＊＊＊补丁检测：
　补丁检测理论为检测c:\windows\KB*****.log文件是否存在从而判断是否安装安全补丁。
补丁检测格式：KB952004@MS09-012
　@前的为KB*****.log去掉.log
　@后的为漏洞名称注释，可自设,例：KB123456@PR提权漏洞
　注；补丁检测只支持windows2003不支持windows2008
＊＊＊端口扫描：
　端口扫描不多做介绍。
七、功能二分为三项功能：
检测注册表，下载到服务器，文件搜（目录）搜索
＊＊＊检测注册表：
检测注册表需要wscript.shell组件支持。支持多项检测。
　格式：
HKEY_LOCAL_MACHINE\SOFTWARE\MySQL AB\MySQL Server 5.0\
HKEY_LOCAL_MACHINE\software\hzhost\config\settings\sysstr
HKEY_LOCAL_MACHINE\software\hzhost\config\settings\svrpass
HKEY_LOCAL_MACHINE\software\hzhost\config\settings\sysdbname
HKEY_LOCAL_MACHINE\software\hzhost\config\settings\systemroot
HKEY_LOCAL_MACHINE\software\hzhost\config\settings\sysdbuser
HKEY_LOCAL_MACHINE\software\hzhost\config\settings\sysdbsa
　读不到或错误项会给出回显。
＊＊＊下载到服务器：
　下载到服务器支持多项下载，默认覆盖已存在文件，支持下载成功回显，支持错误回显。（需服务器支持XMLHTTP组件，服务器支持外网连接）
　例：
下载地址|下载目录

http://127.0.0.1/1/text1.txt|d:\web1\title.asp

http://127.0.0.1/2/text2.txt|d:\web1\title.html

http://127.0.0.1/3/text3.txt|c:\title.bat

http://127.0.0.1/3/text3.txt|c:\lpk.dll '先进行可写目录检测，然后再替换进行lpl.dll下载可增加提权成功几率。

＊＊＊搜索文件或文件夹：
搜索文件：
支持后缀名检测：
　格式：
|asp|asa|cer|cdx|aspx|asax|ascx|cs|jsp|php|txt|inc|ini|js|htm|html|xml|config|
　可选择是否扫描子目录。
搜索目录：
　搜索目录支持是否选择子目录。
八、数据库操作：
　数据库操作支持2种数据库(access,Mssql,其中mssql支持mssql2000,mssql2005)。
Access操作方式：在数据库功能选择下拉第三项输入.mdb文件地址，点击提交按钮则可进行操作；或者点击文件操作页选择数据库类文件　点击数据库　则可进行操作。
Access支持编辑内容、修改、删除、拖库等。
　 Mssql2000和Mssql2005操作方式：
选择数据库操作大项－SQL SERVER- 输入ip,端口，帐户，密码，数据库名称，则可进入Sqlserver数据库操作模块。
SQL SERVER操作支持执行命令，恢复组件（SQLSERVER2005若不能执行，请执行一键恢复功能）、执行SQLSERVER语句等。
九、执行CMD命令：
　本版本程序对于CMD命令执行未做大的改动。(未加入调用CLSID组件，因为免杀问题暂时放弃了)，需要(wscript.shell组件支持)。
　　　不过加入了/c显示模式，并未写死，大家可以自己设置，可以当做程序执行。
十、用户进程：
　本版本对用户进程做了大的改动，支持用户详细显示，支持用户隶属于组显示、支持管理员组以及详细介绍。
十一、Serveru提权：
　本次Serveru提权功能拷贝DarkBlade的部分代码，支持成功后显示回显。
　 默认加入的FTP帐户为go，密码为od，端口为60000
　 登陆命令(一行一行敲)：
ftp
open 127.0.0.1 60000
go
od
quote site exec net user
十二、隐藏小马：
此功能原创，隐藏过程国内少见。下面先来介绍理论思路。
　在asp SHELL隐藏历史中出现各种隐藏方法，包括早期的include包含jpg文件，带点文件夹,后期的系统保留文件名(nul,lpt,prn等)以及防删除(修改属性只读＋隐藏＋系统)
　这些虽然有一定优势，但是在发展长河中已经起了专门的防御查杀工具，那么有没有一种办法高强度伪装隐藏的呢？有！下面请看杀猪刀隐藏自身技术。
隐藏分为7个步骤，1查找目录，2选取正常目标文件，3隐藏自身，4复制属性时间,5伪装名称，6减少体积，7增加参数
详细介绍：
例如一个网站结构如下：

http://www.1937cn.net/

/index.asp
/conn.asp
/database/database.mdb
/admin/admin_login.asp
/admin/admin_check.asp
/admin/upload.asp
/admin/admin_index.asp

当触发隐藏小马功能后则：
执行第一步，查找目录，通过遍历web根目录搜索到asp目录最多的文件
执行第二步，选取文件，随机通过asp目录最多的文件夹内取出一个为要伪装成的正常目标文件，例：admin/admin_index.asp
执行第三步，隐藏自身，首先通过xmlhttp获取要伪装的目标文件(http://www.1937cn.net/admin/index.asp)的内容界面，通过ie打开显示此文件的界面
执行第四步，复制属性时间，复制admin/index.asp文件的属性以及时间
执行第五步，伪装名称，通过自带的几个后缀随机选择一个伪装shell的名称（_request_send_sumbit_include_config_open_form_month_data）
　　，例：admin/admin_form.asp
执行第六步，减少体积，通过截取自身28k文件操作代码为小马，加入上述功能
执行第七步，增加参数，参数即为小马登陆密码通过修改代码自行设置，格式:admin/admin_form.asp?pass
这样，一个小马的隐藏就完成了，通过安全狗，护卫神,koasp查杀工具，均查杀不出来。
通过查看时间admin/admin_form.asp文件的时间仿造的admin/admin_index.asp文件的时间。
体积仅28k，登陆需要参数，文件名均伪装正常文件+后缀格式，完美防爆破。

------------------------------
注：大家可能用着不习惯，不过后期就习惯了，你会发现它的诸多优点。
Ps:不足之处：感觉提权不是很强大，因为个人能力有限，解包需要用生成器，不能调用Clsid执行CMD，对有些浏览器兼容不大好，完美支持IE6、IE7、IE8。
生成器支持添加统计，当然你也可以做为后门使用,可以设置小马后缀，可以设置扫描目录等。。。

