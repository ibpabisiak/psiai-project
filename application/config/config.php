<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

define('URL', 'http://psiai.tk/');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'psiai_db');
define('DB_USER', 'psiai');
define('DB_PASS', '0987654321');

define('PASSWORDS_HASH', 'sha512');
define('USER_SESSION', 'user_session');

define('PERMISSIONS_WRITE_IDX', 0);
define('PERMISSIONS_READ_IDX', 1);

define('HOMEPAGE_MODULE', 'attendance');
