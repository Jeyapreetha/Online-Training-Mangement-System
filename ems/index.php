<?php
define ('DS', DIRECTORY_SEPARATOR);
define ('HOME', dirname(__FILE__));
date_default_timezone_set('Asia/Calcutta');
ini_set ('display_errors', 1);

require_once HOME . DS . 'config.php';
require_once HOME . DS . 'app' . DS . 'utilities' . DS . 'bootstrap.php';

function __autoload($class)
{
    if (file_exists(HOME . DS . 'app' . DS . 'utilities' . DS . strtolower($class) . '.php'))
    {
        require_once HOME . DS . 'app' . DS . 'utilities' . DS . strtolower($class) . '.php';
    }
    else if (file_exists(HOME . DS . 'app' . DS . 'models' . DS . strtolower($class) . '.php'))
    {
        require_once HOME . DS . 'app' . DS . 'models' . DS . strtolower($class) . '.php';
    }
    else if (file_exists(HOME . DS . 'app' . DS . 'controllers' . DS . strtolower($class) . '.php'))
    {
        require_once HOME . DS . 'app' . DS . 'controllers'  . DS . strtolower($class) . '.php';
    }
}