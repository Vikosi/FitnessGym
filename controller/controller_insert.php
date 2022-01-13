<?php

require_once ("../core/controller.php");
require_once ("../models/model_insert.php");
require_once ("../dao/UserDao.php");


Class  controller_insert extends controller{
    public function action_index ()
    {
        session_start();
        if (isset($_SESSION ['user']['id']))
        {
            $dao = new UserDao(); 
            $user = $dao -> GetUserById($_SESSION ['user']['id']);
            if ($user[0] -> role == 1)
            {
                if(!empty($_POST))
                {
                    $train = $_POST['idtrain'] ;
                    $trainer = $_POST['idtrainer'];
                    $cond_visit = $_POST['idcond_visit'];
                    $type_train = $_POST['idtype_train'];
                    $nazvanie = $_POST['nazvanie_train'];
                    $dts = $_POST['date_time_start'];
            
                    $model = new model_insert(); 
                    $data = $model -> insert($train, $trainer, $cond_visit, $type_train, $nazvanie, $dts);
            
                    header("Location: index");
                }
        
                else
                {
                    $this -> view -> render('insert.php'); 
                }
            }
            else 
                {
                    header("Location: index");
                }
        
        }
        else
        {
            header("Location: avtorization");
        }
    }

}