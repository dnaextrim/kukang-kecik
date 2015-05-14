<?php
use Symfony\Component\Debug\Debug;
use Symfony\Component\Debug\DebugClassLoader;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

Debug::enable();
DebugClassLoader::enable();

if ('cli' !== php_sapi_name()) {
    ini_set('display_errors', 0);
    ExceptionHandler::register();
} elseif (!ini_get('log_errors') || ini_get('error_log')) {
    ini_set('display_errors', 1);
}
ErrorHandler::register();
	