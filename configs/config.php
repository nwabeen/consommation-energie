<?php
define('SITE_URL', '/');
    define("DEBUG", true);
    define("SERVER", '');
    define("DATABASE", '');
    define("USER", '');
    define("PWD", '');
    if (DEBUG) {
        ini_set('display_errors', 1);
        error_reporting(E_ALL & ~E_NOTICE);
    } else {
        ini_set('display_errors', 0);
        error_reporting(E_ERRORS);
    }
