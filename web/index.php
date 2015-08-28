<?php
try {
    require_once("../framework/Loader.php");
    \framework\ConfigHolder::load();
    $r = new \framework\Request();
    \framework\Route::execute($r);
    $response = new \framework\Response($r);
    $response->setNoCache();
    $response->printHeader("../src/View/Renderer.php");
} catch (Exception $e) {
    error_log($e->getTraceAsString());
    $response = new \framework\Response(array("error"=> $e->getTraceAsString()));
    $response->setNoCache();
    $response->printHeader("../src/View/Renderer.php");
}

