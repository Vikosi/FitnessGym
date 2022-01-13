<?php

require_once ("../core/controller.php");
require_once ("../models/model_index.php");


Class  controller_index extends controller{
    public function action_index ()
    {
        session_start();
        $model = new model_index(); 
        $data = $model -> getData();
        $this -> view -> render('index.php', data:$data); 
    }

}