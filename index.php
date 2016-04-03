<?php

namespace cs_rockers\hw3;

require_once "src/controllers/ImageController.php";
// defines for various namespaces
define("NS_BASE", "cs_rockers\\hw3\\");
define(NS_BASE . "NS_CONTROLLERS", "cs_rockers\\hw3\\controllers\\");
define(NS_BASE . "NS_VIEWS", "cs_rockers\\hw3\\views\\");
define(NS_BASE . "NS_MODELS", "cs_rockers\\hw3\\models\\");

    $controller_name = NS_CONTROLLERS . "ImageController";
//instatiate controller for request
$controller = new $controller_name();
//process request
$controller->processRequest();