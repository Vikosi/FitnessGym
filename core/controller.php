<?php
    require_once ("../core/view.php");
Class controller{
    
    public $view;
    public $model;

    function __construct(){
        $this -> view = new view(); 
    }
}