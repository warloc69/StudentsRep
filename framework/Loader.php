<?php
namespace framework;


function autoload_framework($class)
{
    $file = '../'.$class.'.php';
    if (file_exists($file))
    {
        include $file;
    }
}

function autoload_web($class)
{
    $file = '../web/'.$class.'.php';
    if (file_exists($file))
    {
        include $file;
    }
}

spl_autoload_register(__NAMESPACE__.'\\autoload_framework');
spl_autoload_register(__NAMESPACE__.'\\autoload_web');