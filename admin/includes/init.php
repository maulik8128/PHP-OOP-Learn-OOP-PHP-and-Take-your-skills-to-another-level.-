<?php 

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

define('SITE_ROOT',DS.'xampp'.DS.'htdocs'.DS.'oop'.DS.'gallery');
define('GALLERY_ROOT',DS.'oop'.DS.'gallery'.DS);
define('ADMIN_ROOT',DS.'oop'.DS.'gallery'.DS.'admin'.DS);
defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH',SITE_ROOT.DS.'admin'.DS.'includes');





require_once "functions.php";
require_once "new_config.php";
require_once "database.php";
require_once "db_object.php";
require_once "user.php";
require_once "photo.php";
require_once "session.php";


// defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

// defined('DS') ? null : define('SITE_ROOT',DS .'XAMPP'.DS.'htdocs'.DS.'oop'.DS.'gallery');

// defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH','SITE_ROOT'.DS.'admin'.DS.'includes');










?>