<?php

    $controller_name = 'controller_main';
    $action_name = 'action_index';
    $url = $_SERVER['REQUEST_URI'];

    $exploded_url = explode('/',$url);

    if(!empty($exploded_url[1]))
    {
        $controller_name = 'controller_'.$exploded_url[1];
    }

    if(!empty($exploded_url[2]))
    {
        $action_name = 'action_'.$exploded_url[2];
    }

    $controller_path = "../controller/".strtolower($controller_name).'.php';

    if(file_exists($controller_path))
    {
        include $controller_path;

        $controller = new $controller_name;


        if(method_exists($controller, $action_name))
        {
            $controller->$action_name();
        }
        else
        {
            var_dump($action_name);
            
        }    
    }
    else
    {
        var_dump($controller_path);
    }

