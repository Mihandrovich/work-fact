<?php
session_start();
include ('private/mysql.php');

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

switch($sd){
default:
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

   <!--  <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="assets/css/loader-style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/signin.css">




    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- Fav and touch icons -->
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

                        <form role="form" action='/imp.php?sd=check' method='post'>
                            <div class="form-group">
                                <label for="inputUsernameEmail">Введи код доступа из Telegram!</label>
                                <input type="text" name="kod" id="inputUsernameEmail" class="form-control">
                            </div>
                            <button class="btn btn btn-primary pull-right" type="submit">
                                Отправить
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



    <!--  END OF PAPER WRAP -->



    <!-- MAIN EFFECT -->
    <script type="text/javascript" src="assets/js/preloader.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/load.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>

    <script src="http://maps.googleapis.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script type="text/javascript" src="assets/js/map/gmap3.js"></script>
    <script type="text/javascript">
    $(function() {

        $("#test1").gmap3({
            marker: {
                latLng: [-7.782893, 110.402645],
                options: {
                    draggable: true
                },
                events: {
                    dragend: function(marker) {
                        $(this).gmap3({
                            getaddress: {
                                latLng: marker.getPosition(),
                                callback: function(results) {
                                    var map = $(this).gmap3("get"),
                                        infowindow = $(this).gmap3({
                                            get: "infowindow"
                                        }),
                                        content = results && results[1] ? results && results[1].formatted_address : "no address";
                                    if (infowindow) {
                                        infowindow.open(map, marker);
                                        infowindow.setContent(content);
                                    } else {
                                        $(this).gmap3({
                                            infowindow: {
                                                anchor: marker,
                                                options: {
                                                    content: content
                                                }
                                            }
                                        });
                                    }
                                }
                            }
                        });
                    }
                }
            },
            map: {
                options: {
                    zoom: 15
                }
            }
        });

    });
    </script>


</body>

</html>
<?
break;

case 'check':
    if($_GET['kod'] == ''){
$kod = mysql_real_escape_string(htmlspecialchars($_POST['kod']));
    }else{
$kod = mysql_real_escape_string(htmlspecialchars($_GET['kod']));
    }
    if($user[token] == $kod){
mysql_query("UPDATE `users` SET `np`='' WHERE `id`='$uid'");
header('Location: work-inco.php');
exit;
    }else{
header('Location: exit.php');
exit;
    }
break;
}
?>