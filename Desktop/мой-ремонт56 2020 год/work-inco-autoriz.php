<?php
session_start();
include ('private/mysql.php');
include ("assets/DATA.php");

ob_start();

if(!isset($_SESSION['uid']) 
and $_SERVER['PHP_SELF'] !== '/index.php' 
and $_SERVER['PHP_SELF'] !== '/check.php' 
and $_SERVER['PHP_SELF'] !== '/work-inco-autoriz.php' 
and $_SERVER['PHP_SELF'] !== '/game.php' 
and $_SERVER['PHP_SELF'] !== '/mail-form.php' 
and $_SERVER['PHP_SELF'] !== '/familiarize.php'  
and $_SERVER['PHP_SELF'] !== '/autorize.php' 
and $_SERVER['PHP_SELF'] !== '/create_pers.php'){
    header('Location: index.php');
    exit;
}

if(isset($_SESSION['uid'])){
    header('Location: work-inco.php?');
    exit;
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Вход в панель</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/loader-style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/signin.css">
    <link rel='icon' type='image/png' href='/favicon.ico'/>
</head>
<body style="background-image: url(assets/img/world.jpg);">
    <div class="container">
        <div class="" id="login-wrapper">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div id="logo-login">
                        <h1>Рanel-M.I
                            <span>v0.1</span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="account-box">

                        <form role="form" action='autorize.php' method='post'>
                            <div class="form-group">
                                <label for="inputUsernameEmail">Введите логин</label>
                                <input type="text" name="login" id="inputUsernameEmail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword">Введите пароль</label>
                                <input type="password" name="password" id="inputPassword" class="form-control">
                            </div>
                            <?
                            if($_SESSION['enter_error'] == 'true'){echo "<center><font color=red>Логин или пароль введены неправильно.<br><br></font></center>";$_SESSION['enter_error'] = "not";}
                            ?>
                            <button class="btn btn btn-primary pull-right" type="submit">
                                Войти
                            </button>
                        </form>
                        <div class="row-block">
                            <div class="row">
                                <div class="col-md-12 row-block">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="text-align:center;margin:0 auto;">
            <h6 style="color:#fff;">Все права защищены © Mihandr Inc 2020</h6>
        </div>

    </div>
    <? include ("assets/RIGHT-SLIDER-CONTENT.php");?>
    <script type="text/javascript" src="assets/js/preloader.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/load.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
</body>

</html>
