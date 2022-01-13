<?php

require_once ("../conf.php");
require_once ("../core/model.php");


Class  model_register extends model{
    public function register ($login, $email, $password, $password_confirm)
    {
    $con = pg_connect("host=".Conf::host." dbname=".Conf::db." user=".Conf::user." password=".Conf::pass) or die ("Could not connect to Server\n");

    $login = pg_escape_string($login);
    $email = pg_escape_string($email);
    $password = pg_escape_string($password);
    $password_confirm = pg_escape_string($password_confirm);

    $check_login = pg_query($con, "SELECT * FROM users WHERE login = '$login'");
    if (pg_num_rows($check_login) > 0) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Такой логин уже существует",
            "fields" => ['login']
        ];

        return $response;
        die();
    }

    $check_email = pg_query($con, "SELECT * FROM users WHERE email = '$email'");
    if (pg_num_rows($check_email) > 0) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Такая почта уже занята",
            "fields" => ['email']
        ];

        return $response;
        die();
    }

    $error_fields = [];

    if ($login === '') {
        $error_fields[] = 'login';
    }

    if ($password === '') {
        $error_fields[] = 'password';
    }

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_fields[] = 'email';
    }

    if ($password_confirm === '') {
        $error_fields[] = 'password_confirm';
    }


    if (!empty($error_fields)) {
        $response = [
            "status" => false,
            "type" => 1,
            "message" => "Проверьте правильность полей",
            "fields" => $error_fields
        ];

        return $response;
        die();
    }

    $password = md5($password);
    $password_confirm = md5($password_confirm);;
    

    if ($password === $password_confirm) {


        $query = "INSERT INTO users (login, email, password) VALUES ('$login', '$email', '$password');";
		$result = pg_query($con, $query);

        $response = [
            "status" => true,
            "message" => "Регистрация прошла успешно!",
        ];

        return $response;
    


    } else {
        $response = [
            "status" => false,
            "message" => "Пароли не совпадают",
        ];
        return $response;
    }

    }

    
}