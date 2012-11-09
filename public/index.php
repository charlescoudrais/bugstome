<?php

define(
    'APPLICATION_ENV',
    (getenv('APPLICATION_ENV')
        ? getenv('APPLICATION_ENV')
        : 'development')
);

define('ROOT_PATH', dirname(__DIR__));

/**
 * Si le framework n'est pas sur le serveur
 * Ne pas oublier de mettre le-dit framework 
 * dans le dossier library
 */
ini_set('include_path', ROOT_PATH . '/library/');

//*
set_exception_handler(
    function($exception)
    {
        
        if ('development' === APPLICATION_ENV) {
//            if ($exception->getMessage() == 'MSIE') {
//                header('Location: /error/perso');
//            } else {
                print '<h1>Exception</h1>';
                print '<pre>' . PHP_EOL;
                print $exception->getMessage() . PHP_EOL;
                //print $exception->getTraceAsString() . PHP_EOL;
                print '</pre>' . PHP_EOL;
//            }
        } else {
            print 'Exception error';
        }
        exit(1);
    }
);

set_error_handler(
    function($code, $message)
    {
        if ('development' === APPLICATION_ENV) {
            print '<h1>Error</h1>';
            print '<pre>' . PHP_EOL;
            print $message . PHP_EOL;
            print '</pre>' . PHP_EOL;
        } else {
            //@TODO: SWITCH...
            header('Location: /error/perso');
        }
        exit(1);
    }
);
// */
require_once 'Zend/Loader/Autoloader.php';

$userAgent = $_SERVER['HTTP_USER_AGENT'];
if (strpos($userAgent, 'MSIE')) { //  strpos($userAgent, 'MSIE') && 
    throw new Exception('This MSIE\'s version is not supported by application, sorry.');
}

$autoloader = Zend_Loader_Autoloader::getInstance();

$application = new Zend_Application(
    APPLICATION_ENV,
    ROOT_PATH . DIRECTORY_SEPARATOR
        . 'application' . DIRECTORY_SEPARATOR
        . 'Core' . DIRECTORY_SEPARATOR
        . 'configs' . DIRECTORY_SEPARATOR
        . 'application.ini'
);

$application->bootstrap()->run();