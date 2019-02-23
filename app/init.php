<?php

define("SITE_PATH", 'http://localhost/galaktykabajek/');
define("ADMIN_PATH",'http://localhost/galaktykabajek/adminpanel/');
define("APP_PATH", str_replace("\\", "/", dirname(__FILE__)) . "/");
define("APP_RES", 'http://localhost/galaktykabajek/app/res/');
define("APP_VIEWS", 'http://localhost/galaktykabajek/app/views/');
define("APP_ACTION", 'http://localhost/galaktykabajek/app/action/');


$server = "localhost";
$user = "root";
$pass = "";
$db = "galaxy";

require_once(APP_PATH."core/core.php");
$CORE = new Galaxy_Core($server, $user, $pass, $db);