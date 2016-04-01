<?php

namespace cool_name_for_your_group\hw3;

require_once "src/controllers/ImageController.php";
// defines for various namespaces
define("NS_BASE", "cool_name_for_your_group\\hw3\\");
define(NS_BASE . "NS_CONTROLLERS", "cool_name_for_your_group\\hw3\\controllers\\");
define(NS_BASE . "NS_VIEWS", "cool_name_for_your_group\\hw3\\views\\");
define(NS_BASE . "NS_MODELS", "cool_name_for_your_group\\hw3\\models\\");

    $controller_name = NS_CONTROLLERS . "ImageController";
//instatiate controller for request
$controller = new $controller_name();
//process request
$controller->processRequest();