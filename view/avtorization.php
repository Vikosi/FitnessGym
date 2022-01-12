<?php
session_start();

if (isset($_SESSION['user'])) {
    header('Location: profile.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="/css/new.css">
</head>
<body>

<!-- Форма авторизации -->

    <form>
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">
        <button type="submit" class="login-btn">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="registration.php">Зарегистрируйтесь</a>!
        </p>
        <p class="msg none"></p>
        <a href="index.php">Вернуться на главную</a>
    </form>

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/new.js"></script>

</body>
</html>