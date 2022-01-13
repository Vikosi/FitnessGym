<?php

require_once ("../core/model.php");


Class  model_index extends model{
    public function getData ()
    {
        require_once("../dao/ScheduleDao.php");
        require_once("../dao/UserDao.php");
        $scheduleDao=new ScheduleDao();
        $UserDao = New UserDao();

        if (isset($_SESSION['user']['id']))
        {
        $User = $UserDao -> GetUserById($_SESSION['user']['id']);
        }
        else
        {
            $User = NULL;
        }
        $list = $scheduleDao->getScheduleList();
        $data = array ('user' => $User, 'list' => $list);
        return $data; 
    }

    
}