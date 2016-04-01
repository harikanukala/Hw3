<?php
namespace cool_name_for_your_group\hw3\views\elements;

abstract class Element
{
	public $view;

    public function __construct(){
        $this->view = $view;
    }
    
    public abstract function render($data);
}