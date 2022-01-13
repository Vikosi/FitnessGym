<?php
    if (isset($_SESSION['user'])) {
        header('Location: profile');
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

    <!-- Форма регистрации -->

    <form action=>

        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">

        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты">

        <label>Пароль</label>
        <input type="password" name="password" placeholder="Введите пароль">

        <label>Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">

        <button type="submit" class="register-btn">Зарегистрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="avtorization">Авторизируйтесь</a>!
        </p>
        <p class="msg none"></p>
        <a href="index">Вернуться на главную</a>
    </form>

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/new.js"></script>

</body>
</html>