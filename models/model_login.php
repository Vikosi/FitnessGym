<?php

require_once ("../conf.php");
require_once ("../core/model.php");


Class  model_login extends model{
    public function login ($login, $password)
    {
        $con = pg_connect("host=".Conf::host." dbname=".Conf::db." user=".Conf::user." password=".Conf::pass) or die ("Could not connect to Server\n");

    $check_user = pg_query($con, "SELECT * FROM users WHERE login = '$login' AND password = '$password'");
    if (pg_num_rows($check_user) > 0) 
    {
        $user = pg_fetch_assoc($check_user);
    } 
    else 
    {
        $user = NULL;
    }
    return $user;
    }
}