<?php
require_once ("conf.php");
    session_start();
    $con = pg_connect("host=".Conf::host." dbname=".Conf::db." user=".Conf::user." password=".Conf::pass) or die ("Could not connect to Server\n");

	if(!$con){
		echo "sadasd\n";
	}
	else
    {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $password_confirm = md5($_POST['password_confirm']);
    }

    if ($password === $password_confirm) {


        $query = "INSERT INTO users (login, email, password) VALUES ('$login', '$email', '$password');";
		$result = pg_query($con, $query);

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../avtorization.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../registration.php');
    }

?>
