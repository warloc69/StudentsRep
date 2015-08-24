<?php
namespace framework;


function autoload_framework($class)
{
    $file = '../'.$class.'.php'; //'/framework/'.$class.'.php'; .__NAMESPACE__.'/'
    error_log("framework ".$file);
    if (file_exists($file))
    {
        include $file;
    }
}

function autoload_web($class)
{
    $file = '../web/'.$class.'.php';
    error_log("web ".$file);
    if (file_exists($file))
    {
        include $file;
    }
}

spl_autoload_register(__NAMESPACE__.'\\autoload_framework');
spl_autoload_register(__NAMESPACE__.'\\autoload_web');