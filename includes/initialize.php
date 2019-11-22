<?php

// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

if (!defined('SITE_ROOT')) {
    if (preg_match('`/admin/`', $_SERVER['SCRIPT_FILENAME'])) {
        define('SITE_ROOT', dirname(dirname($_SERVER['SCRIPT_FILENAME'])));
    } else {
        define('SITE_ROOT', dirname($_SERVER['SCRIPT_FILENAME']));
    }
}

// Load in the config file first
require_once('config.php');

// Load basic functions next so that everything after can use them
require_once('functions.php');
require_once('validation_functions.php');

// Load core objects
require_once('session.php');
require_once('database.php');
require_once('database_object.php');
require_once('pagination.php');

// Load database-related classes
require_once('user.php');
require_once('photograph.php');

?>