<?php

require_once ("../core/controller.php");
require_once ("../models/model_register.php");


Class  controller_registration extends controller{
    public function action_index ()
    {
        session_start();

        if (!empty($_POST))
        {
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];

            $model_register = new model_register(); 
            
            $response = $model_register -> register ($login, $email, $password, $password_confirm); 

            echo json_encode($response);
        }
        else
        {
            $this -> view -> render('registration.php'); 
        }
    }

}