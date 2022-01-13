<?php

require_once ("../core/controller.php");
require_once ("../models/model_login.php");


Class  controller_avtorization extends controller{
    public function action_index ()
    {
        session_start();
        if (!empty($_POST))
        {
            $login = $_POST['login'];
            $password = $_POST['password'];
            
            $error_fields = [];

            if ($login === '') {
                $error_fields[] = 'login';
            }

            if ($password === '') {
                $error_fields[] = 'password';
            }

            if (!empty($error_fields)) {
                $response = [
                    "status" => false,
                    "type" => 1,
                    "message" => "Проверьте правильность полей",
                    "fields" => $error_fields
                ];

                echo json_encode($response);

                die();
            }
            
            $password = md5($_POST['password']);

            $model_login = new model_login(); 
            
            $user = $model_login -> login ($login, $password); 

            if ($user != NULL)
            {
                $response = [
                    "status" => true
                ];

                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "login" => $user['login'],
                    "email" => $user['email']
                ];
            }
            else 
            {
                $response = [
                    "status" => false,
                    "message" => 'Не верный логин или пароль'
                ];
            }
            
            echo json_encode($response);

        }
        else
        {
            $this -> view -> render('avtorization.php'); 
        }
    }

}