<?php
require_once("dao/ScheduleDao.php");
require_once("dao/UserDao.php");
session_start();
    $scheduleDao=new ScheduleDao();
    if(false){
        echo "sadasd\n";
    }
    else{
        echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
    <title>Fitness Gym</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg fixed-top ">
        <a class="navbar-brand" href="#">Fitness Gym</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-4">
                <li class="nav-item">
                    <a class="nav-link" data-value="about" href="#">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-value="schedule" href="#">Расписание</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-value="price" href="#">Цены</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-value="team" href="#">
                        Команда тренеров</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " data-value="contact" href="#">Обратная связь</a>
                </li>
            </ul>
        </div>
    </nav>
    <header class="header ">
    <div class="overlay">
        <div class="container">
            <div class="description ">
                <h1>
                    Построй СВОЕ ТЕЛО <br> Измени СВОЮ ЖИЗНЬ
                    <p>
                        Мы предоставляем лучшие возможности и квалифицированных тренеров для самостоятельных тренировок!</p>


HTML;

                    if(isset($_SESSION["user"])) 
                    {
                        echo <<< HTML
                        <a class="btn btn-outline-secondary btn-lg" href="avtorization.php">Войти в личный кабинет</a>
                        HTML;
                    }
                        else 
                        {
                        echo <<< HTML
                        <a class="btn btn-outline-secondary btn-lg" href="avtorization.php">Войти в профиль</a>
                        HTML;
                        }
                        
                    echo <<< HTML
                    <div id="time-node"></div>
                    <script>
                        var timeNode = document.getElementById('time-node');
                        function getCurrentLocaleString() {
                            return new Date().toLocaleString();
                        }
                        setInterval(
                            () => timeNode.innerHTML = getCurrentLocaleString(),
                            1000
                        );
                    </script>
                </h1>
            </div>
        </div>
    </div>
    </header>
    <div class="about" id="about">
        <div class="container">
            <h1 class="text-center">О нас</h1>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <img src="imagine/0_IMG_20190930_190407.jpg" class="img-fluid">
                    <span class="text-justify">by Tolkacheva Viktoria & Daniil Bislkiy</span>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 desc">
                    <h3>Fitness Gym</h3>
                    <p>
                        Команда сертифицированных тренеров. Лучшие тренажеры. Групповые и индивидуальные тренировки.
                        Максимально комфортное и широкое пространство для любого вида тренировок. Наши тренеры проводят
                        групповые и индивидуальные занятия для достижения высшего результата. Каждый сможет подобрать для себя тренировки
                        по времени и сложности выполнения.
                    </p>
                    <a href="http://getbootstrap.com/" target="iframeBootstrap">Открыть ссылку во фрейме</a>
                    <iframe name="iframeBootstrap"></iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="schedule" id="schedule">
           
HTML;

        if(isset($_SESSION["user"])) {
            $UserDao = New UserDao();
            $User = $UserDao -> GetUserById($_SESSION["user"]['id']);
            if ($User[0] -> role == 1) {
                echo <<< HTML
                <a href="insert.html" class="insert-link" id="Insert">Добавить тренировку</a> 
                HTML;
            }
            echo <<< HTML
            <h1 class="text-center">Расписание</h1>
            
            <style>
            table { color: #0facbe; text-align: center;}
            </style>

            HTML;

            $list = $scheduleDao->getScheduleList();
            echo "<table><tr><th>Тренер</th><th>Когда</th><th>Тренировка</th></tr>";
            for ($i = 0; $i < count($list); $i++) {
                $s = $list[$i];
                echo "<tr>";
                echo "<td>";
                echo $s->fio;
                echo "</td>";
                echo "<td>";
                echo $s->dateTimeStart;
                echo "</td>";
                echo "<td>";
                echo $s->nazvanieTrain;
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        echo <<<HTML
              
        
    <div class="price" id="price">
        <div class="container">
            <h1 class="text-center">Абонементы</h1>
            <div class="row">
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-img">
                            <img src="imagine/kenvil_11.jpg" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Безлимит утро+вечер</h4>
                            <p class="card-text">
                                Тренируйтесь с утра пораньше (8:30) перед работой или учебой и возвращайтесь вечером (17:30).
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="" class="card-link" id="linkOne">Подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-img">
                            <img src="imagine/MSH_RetroFitnessLakeHowell_20180523-23.jpg" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Безлимит день</h4>
                            <p class="card-text">
                                Для любителей хорошенько потренироваться: посетите все групповые
                                и позанимайтесь на всех тренажерах с 12:00 до 18:00.
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="" class="card-link" id="linkTwo">Подробнее</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-img">
                            <img src="imagine/Retro-Fitness-Kingston-Samples-2.jpg" class="img-fluid">
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Льготные абонементы</h4>
                            <p class="card-text">
                                Студенты, школьники, пенсионеры - все сюда!
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="" class="card-link" id="linkThree">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="team" id="team">
        <div class="container">
            <h1 class="text-center">Команда тренеров</h1>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 item">
                    <img src="imagine/b15df6a26ec0ac2a0bbd7e3df270cc60.jpg" class="img-fluid" alt="team">
                    <div class="des">
                        Андрей
                    </div>
                    <span class="text-muted">Тренер по кроссфиту</span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 item">
                    <img src="imagine/m9vofx-16244916df0b4707a1d34c12465ffdbc.jpg" class="img-fluid" alt="team">
                    <div class="des">
                        Катя
                    </div>
                    <span class="text-muted">Йога+пилатес</span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 item">
                    <img src="imagine/5af5fad88b2fa1719d2a98cf_5af5fb04365e7.jpg" class="img-fluid" alt="team">
                    <div class="des">
                        Марат
                    </div>
                    <span class="text-muted">Силовые тренировки</span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 item">
                    <img src="imagine/dfnvije436t45tfdb.jpg" class="img-fluid" alt="team">
                    <div class="des">
                        Алиса
                    </div>
                    <span class="text-muted">Аэробика</span>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-form" id="contact">
        <div class="container">
            <form>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <h1>Появились вопросы? <br>Мы ответим!</br></h1>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-12 right">
                        <div class="form-group">
                            <input type="text" class="form-control form-control-lg" placeholder="Как Вас зовут?" name="">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control form-control-lg" placeholder="Ваша почта@email.com" name="email">
                        </div>
                        <div class="form-group">
				   	 <textarea class="form-control form-control-lg" >
				   	 </textarea>
                        </div>
                        <span class="btn btn-secondary btn-block" id="Send"  >Отправить</span>
                        <div id="result">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src='js/main.js'></script>
</body>
</html>
HTML;
    }
?>