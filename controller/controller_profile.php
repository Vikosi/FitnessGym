<?php

require_once ("../core/controller.php");
require_once ("../models/model_index.php");


Class  controller_profile extends controller{

    public function action_index ()
    {
        session_start();

        $this -> view -> render('profile.php'); 
        
    }

    public function action_logout ()
    {
        session_start();
        unset($_SESSION['user']);
        header('Location: /avtorization');
    }
}