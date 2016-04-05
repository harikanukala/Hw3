<?php
namespace cs_rockers\hw3\views\elements;

abstract class Element
{
	// public $view;

    public function __construct(){
        $this->view = $view;
    }
    
    public abstract function render($data);
}