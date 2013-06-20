<?php
$ObjService = new COM("IIS://localhost/w3svc");

foreach ($ObjService as $obj3w) {

  if(is_numeric($obj3w->Name)){

   
      $webSite=new COM("IIS://localhost/w3svc/".$obj3w->Name.'/Root');
      echo "[ID    ] " .$obj3w->Name.'</br>';
      echo "[NAME  ] " .$obj3w->ServerComment.'</br>';
      $state=intval($obj3w->ServerState);
      if ($state==2) {
     
          echo "[STATE ] running".'</br>';
      }
     
      if ($state==4) {
     
          echo "[STATE ] stoped".'</br>';
      }

      if ($state==6) {
     
          echo "[STATE ] paused".'</br>';
      }

      foreach ($obj3w->ServerBindings as $Binds){

          echo "[HOST  ] "  .$Binds.'</br>';

      }
      echo "[USER  ] " . $webSite->AnonymousUserName.'</br>';
      echo "[PASS  ] " . $webSite->AnonymousUserPass.'</br>';
      echo "[PATH  ] " . $webSite->path.'</br>';
      echo "-------------------------------------------".'</br>';

  }
}

?>
