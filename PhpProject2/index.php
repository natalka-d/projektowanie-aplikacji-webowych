<?php
require_once dirname(__FILE__).'/config.php';

//przekierowanie przeglądarki klienta (redirect)
//header("Location: "._APP_URL."/app/calc.php");

//przekazanie żądania do następnego dokumentu ("forward")

require_once 'config.php';
echo "Strona działa! Ścieżka: " . _APP_URL;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include _ROOT_PATH.'/app/calc.php';
