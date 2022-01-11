<?php
require_once ("conf.php");
    session_start();
    $con = pg_connect("host=".Conf::host." dbname=".Conf::db." user=".Conf::user." password=".Conf::pass) or die ("Could not connect to Server\n");


    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $check_user = pg_query($con, "SELECT * FROM users WHERE login = '$login' AND password = '$password'");
    if (pg_num_rows($check_user) > 0) {

        $user = pg_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "email" => $user['email']
        ];

        header('Location: ../index.php');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../avtorization.php');
    }
    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
