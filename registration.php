<?php
     session_start();
    if (isset($_SESSION['user'])) {
        header('Location: profile.php');
    }
    /*mdexexdasdasdasdsa*/
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="/css/new.css">
</head>
<body>

    <!-- Форма регистрации -->

    <form action="vendor/signup.php" method="post">

        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">

        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты">

        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">

        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">

        <button type="submit">Зарегистрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="/avtorization.php">Авторизируйтесь</a>!
        </p>
        
        <?php
           if (isset ($_SESSION['message']))
           {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
           }
           unset ($_SESSION['message']);
        ?>
    </form>

</body>
</html>