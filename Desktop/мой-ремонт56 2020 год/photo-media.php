<? include ("assets/DATA.php");?>
<? include ("assets/FUNCTION.php");?>
<?php
session_start();
include ('private/mysql.php');
#
ob_start();
if($user['access']!=='3'){
    header('Location: exit.php');
    exit;
}
?>
<?php

// Путь загрузки
$path = 'images/photo/';

// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
 // Загрузка файла и вывод сообщения
$url = $_FILES["picture"]["name"];
 if (!@copy($_FILES['picture']['tmp_name'], $path . $_FILES['picture']['name'])){
  echo 'Что-то пошло не так';
 }else{
mysql_query("INSERT INTO `photo` SET `url`='$url'");
  echo 'Загрузка удачна';
}}

?>
<!DOCTYPE html>
<html lang="ru">
    
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>РСО-ADMIN - галерея</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/loader-style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link href="assets/js/footable/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css" />
    <link href="assets/js/footable/css/footable.standalone.css" rel="stylesheet" type="text/css" />
    <link href="assets/js/footable/css/footable-demos.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/js/dataTable/lib/jquery.dataTables/css/DT_bootstrap.css" />
    <link rel="stylesheet" href="assets/js/dataTable/css/datatables.responsive.css" />
    <link rel='icon' type='image/png' href='/favicon.ico'/>
        <style type="text/css">
    canvas#canvas4 {
        position: relative;
        top: 20px;
    }
    </style>
</head>

<body>
<? include ("assets/TOP-NAVBAR.php");?>
<? include ("assets/SIDE-MENU.php");?>
    <div class="wrap-fluid">
        <div class="container-fluid paper-wrap bevel tlbr">
            <div class="row">
                <div id="paper-top">
                    <div class="col-sm-3">
                        <h2 class="tittle-content-header">
                            <span class="entypo-menu"></span>
                            <span>Галерея
                            </span>
                        </h2>
                    </div>

                    <?php
                    switch($sd){
                    default:
                    ?>

                    <div class="col-sm-7">
                        <div class="devider-vertical visible-lg"></div>
                        <div class="tittle-middle-header">
                        </div>
                    </div>
                </div>
            </div>
            <ul id="breadcrumb">
                <li>
                    <span class="entypo-home"></span>
                </li>
                <li><i class="fa fa-lg fa-angle-right"></i>
                </li>
                <li><a href="/work-inco.php" title="Админ-панель">Админ-панель</a>
                </li>
                <li><i class="fa fa-lg fa-angle-right"></i>
                </li>
                <li><a href="#" title="Список всех заказов">Галерея</a>
                </li>
                <li class="pull-right">
                    <div class="input-group input-widget">
                        <form method="post" enctype="multipart/form-data">
                            <input type="file" name="picture">
                            <button type="submit"class="btn btn-primary">Загрузить</button>
                        </form>
                     </div>
                </li>
            </ul>
            <div class="content-wrap">
                <div class="row">

                <?
                $q = mysql_query("SELECT * FROM `photo` ORDER BY id DESC");
                While($w = mysql_fetch_assoc($q)){
                ?>

                    <div class="col-sm-3">
                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    №<? echo $w[id] ?> - <? echo $w[url] ?></h6>
                                <div class="titleClose">
                                    <a class="gone" href="?sd=delete&id=<? echo $w[id]?>">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="body-nest" id="Footable">
                            <img src="images/photo/<? echo $w[url] ?>" width="100%" height="220px" alt="Фото">
                            </div>
                        </div>
                    </div>
                    <?}?>
                </div>
            </div>
            <?break;
            case 'delete':
                mysql_query("DELETE FROM `photo` WHERE `id`='$id'");
                header('Location:photo-media.php');
                exit; 
            break;
        }?>

            <!-- FOOTER -->
            <div class="footer-space"></div>
            <div id="footer">
                <div class="devider-footer-left"></div>
                <div class="time">
                    <p id="spanDate"></p>
                    <p id="clock"></p>
                </div>
                <div class="copyright">2020 <a href="https://vk.com/saevil_31">Mihandr</a> Все права защищены</div>
                <div class="devider-footer"></div>
            </div>
        </div>
    </div>
    <? include ("assets/RIGHT-SLIDER-CONTENT.php");?>
    <script type="text/javascript" src="assets/js/preloader.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/load.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/toggle_close.js"></script>
    <script src="assets/js/footable/js/footable.js?v=2-0-1" type="text/javascript"></script>
    <script src="assets/js/footable/js/footable.filter.js?v=2-0-1" type="text/javascript"></script>
    <script src="assets/js/footable/js/footable.paginate.js?v=2-1-1" type="text/javascript"></script>
    <script type="text/javascript">
    $(function() {
        $('.footable-res').footable();
    });
    </script>
    <script type="text/javascript">
    $(function() {
        $('#footable-res2').footable().bind('footable_filtering', function(e) {
            var selected = $('.filter-status').find(':selected').text();
            if (selected && selected.length > 0) {
                e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                e.clear = !e.filter;
            }
        });

        $('.clear-filter').click(function(e) {
            e.preventDefault();
            $('.filter-status').val('');
            $('table.demo').trigger('footable_clear_filter');
        });

        $('.filter-status').change(function(e) {
            e.preventDefault();
            $('table.demo').trigger('footable_filter', {
                filter: $('#filter').val()
            });
        });

        $('.filter-api').click(function(e) {
            e.preventDefault();

            //get the footable filter object
            var footableFilter = $('table').data('footable-filter');

            alert('about to filter table by "tech"');
            //filter by 'tech'
            footableFilter.filter('tech');

            //clear the filter
            if (confirm('clear filter now?')) {
                footableFilter.clearFilter();
            }
        });
    });
    </script>

</body>

</html>