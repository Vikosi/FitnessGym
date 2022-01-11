<?php
require_once ("../conf.php");
    session_start();
    $con = pg_connect("host=".Conf::host." dbname=".Conf::db." user=".Conf::user." password=".Conf::pass) or die ("Could not connect to Server\n");


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

    $check_user = pg_query($con, "SELECT * FROM users WHERE login = '$login' AND password = '$password'");
    if (pg_num_rows($check_user) > 0) {

        $user = pg_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "email" => $user['email']
        ];

        $response = [
            "status" => true
        ];
    
        echo json_encode($response);

    } else {
        $response = [
            "status" => false,
            "message" => 'Не верный логин или пароль'
        ];
    
        echo json_encode($response);
    }
    ?>


