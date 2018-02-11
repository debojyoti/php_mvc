<?php

/*			Constants    		*/
$protocol = 'http://';
$host = $_SERVER['HTTP_HOST'];
define('HOST', $protocol . $host);
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('APPROOT', dirname(dirname(__FILE__)));