<? include ("assets/DATA.php");?>
<? include ("assets/FUNCTION.php");?>
<?php
session_start();
include ('private/mysql.php');
#
ob_start();
if(!isset($_SESSION['uid'])){
    header('Location: index.php');
    exit;
}
if($user['access']!=='3'){
    header('Location: exit.php');
    exit;
}
$date_input = date("Y-m-d");
?>
<html lang="ru">
    
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>РСО-ADMIN - заказы</title>
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
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js'></script>
<script language="javascript">
$(function($) {
    $('input[name="phone"]').mask("+7 (999) 999-99-99");
});
</script>
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
                            <span>Создать заказ
                            </span>
                        </h2>
                    </div>
                    <? 
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
                <li><a href="/work-worklist.php" title="Список всех заказов">Заказы</a>
                </li>
                <li><i class="fa fa-lg fa-angle-right"></i>
                </li>
                <li><a href="#" title="Редактирование заказа">Редактирование заказа</a>
                </li>

                <li class="pull-right">
                    <div class="input-group input-widget">
                <? if($w[block] == 1){echo '<b><font style="margin-top: 7px;display: block;color:#ff5454;">ЗАКРЫТО</font></b>';} ?>
                    </div>
                </li>
            </ul>
            <div class="content-wrap">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    Заказы</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#FootableClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                                <div class="titleToggle">
                                    <a class="nav-toggle-alt" href="#Footable">
                                        <span class="entypo-up-open"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="body-nest" id="Footable">
                                
                                <br /><br />
                                <form action='ordermi-work.php' method='post'>
                                <center>
                                <table class="table-striped footable-res footable metro-blue" data-page-size="20" style="max-width: 500px;">
                                    <thead>
                                        <tr>
                                            <th>
                                                Название
                                            </th>
                                            <th>
                                                Значение
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ФИО</td>
                                            <td>
                                                <input type="text" name="fio" pattern="^[A-Za-zА-Яа-яЁё\s]+$" style="color: #000000 !important;" class="form-control">
                                            </td>    
                                        </tr>
                                        <tr>
                                            <td>Номер телефона</td>
                                            <td>
                                                <input type="text" name="phone" style="color: #000000 !important;" class="form-control">
                                            </td>    
                                        </tr>
                                        <tr>
                                            <td>Город</td>
                                            <td>
                                                <input type="text" name="city" style="color: #000000 !important;" class="form-control">
                                            </td>
                                        </tr>    
                                        <tr>
                                            <td>Адрес</td>
                                            <td>    
                                                <input type="text" name="adress" style="color: #000000 !important;" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Скидка (%)</td>
                                            <td>
                                                <input type="text" name="discount" value="0" style="color: #000000 !important;" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Множитель</td>
                                            <td>
                                                <input type="text" name="mn" value="1" style="color: #000000 !important;" class="form-control">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Дата</td>
                                            <td>
                                                <input type="date" name="date" value="<? echo $date_input ?>" style="color: #000000 !important;" class="form-control">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                </center>
                                <br /><button type="submit" class="btn btn-success">Сохранить (Сохранит все настройки)</button>
                                <br />
                            </div>
                        </div></form>
                    </div>
            <?
            break;
            }
            ?>
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
