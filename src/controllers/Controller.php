<?php
namespace cs_rockers\hw3\controllers;
use cs_rockers\hw3 as B;

abstract class Controller
{
 public abstract function processRequest();

  public function view($name)
    {
        static $loaded_views = [];
        if (!empty($loaded_views[$name])) {
            return $loaded_views[$name];
        }
        $class_name = ucfirst($name) . "View";
        $full_name = B\NS_VIEWS . $class_name;
        $view_folder = __DIR__ . "/../views/";
        $path_name = $view_folder . $class_name . ".php";
        if (file_exists($path_name)) {
            require_once $path_name;
            $loaded_views[$name] = new $full_name();
            return $loaded_views[$name];
        }
        return false;
    }

    public function model($name)
    {
        $class_name = ucfirst($name) . "Model";
        $full_name = B\NS_MODELS . $class_name;
        $view_folder = __DIR__ . "/../models/";
        $path_name = $view_folder . $class_name . ".php";
        if (file_exists($path_name)) {
            require_once $path_name;
            return $full_name;
        }
        return false;
    }
}