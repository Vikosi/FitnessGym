<?php

    session_start();

    $host = "localhost";
	$user = "postgres";
	$pass = "0";
	$db = "SportClub";
	$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die ("Could not connect to Server\n");

	if(!$con){
		echo "sadasd\n";
	}
	else
    {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    }

    if ($password === $password_confirm) {

        //$password = md5($password);

        $query = "INSERT INTO users (login, email, password) VALUES ('$login', '$email', '$password');";
		$result = pg_query($con, $query);

        $_SESSION['message'] = 'Регистрация прошла успешно!';
        header('Location: ../avtorization.php');


    } else {
        $_SESSION['message'] = 'Пароли не совпадают';
        header('Location: ../registration.php');
    }

?>
