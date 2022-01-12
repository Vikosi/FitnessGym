<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: avtorization.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="../css/new.css">
</head>
<body>

    <!-- Профиль -->


        <div class="overlay">
            <h2 class="navbar-brand" >Личный кабинет</h2>
    <form>
        <h2 style="margin: 10px 0;"><?= $_SESSION['user']['login'] ?></h2>
        <a href="#"><?= $_SESSION['user']['email'] ?></a>
        <a href="index.php">Вернуться на главную</a>
        <a href="../vendor/logout.php" class="logout">Выход</a>
    </form>
    </div>

</body>
</html>