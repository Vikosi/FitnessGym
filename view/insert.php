<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>    <title>Fitness Gym</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body>
<form class="box" action="/insert" method="post">
    <div class="row centered">
        <p>

        </p>
        <p>Добавить новую тренировку (для администратора)</p>
        <input type="text" name="idtrain" placeholder="id Тренировки">
        <input type="text" name="idtrainer" placeholder="id Тренера">
        <input type="text" name="idcond_visit" placeholder="id Условия посещения">
        <input type="text" name="idtype_train" placeholder="id Типа тренировки">
        <input type="text" name="nazvanie_train" placeholder="Название">
        <input type="text" name="date_time_start" placeholder="Дата и время начала">
        <input type="Submit" Value="Добавить">
    </div>
</form>
</body>
</html>