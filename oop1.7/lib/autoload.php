<?php
$app_root = $_SERVER["DOCUMENT_ROOT"] . "/functioneelprogrammeren/oop1.7";
require_once "$app_root/models/City.php";
require_once "$app_root/models/User.php";
require_once "$app_root/services/CityLoader.php";
require_once "$app_root/services/Container.php";
require_once "$app_root/services/UserLoader.php";
require_once "$app_root/services/DBManager.php";
require_once "$app_root/services/Logger.php";
require_once "$app_root/services/MessageService.php";

session_start();


require_once "connection_data.php";
require_once "html_functions.php";
require_once "form_elements.php";
require_once "sanitize.php";
require_once "validate.php";
require_once "security.php";
require_once "access_control.php";


//initialize $errors array
$errors = [];

if (key_exists('errors', $_SESSION) and is_array($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = [];
}

//initialize $msgs array
$msgs = [];

if (key_exists('msgs', $_SESSION) and is_array($_SESSION['msgs'])) {
    $msgs = $_SESSION['msgs'];
    $_SESSION['msgs'] = [];
}

//initialize $old_post
$old_post = [];

if (key_exists('OLD_POST', $_SESSION) and is_array($_SESSION['OLD_POST'])) {
    $old_post = $_SESSION['OLD_POST'];
    $_SESSION['OLD_POST'] = [];
}


$container = new Container($configuration, $credentials);

$cityLoader = $container->getCityLoader();


//create logger
$logger = $container->getLogger();


//create new DBManager
$dbm = $container->getDBManager();

//create messageService

$ms = $container->getMessageService();


