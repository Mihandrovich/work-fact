<? include ("assets/DATA.php");?>
<? include ("assets/FUNCTION.php");?>
<?php
session_start();
include ('private/mysql.php');
#
ob_start();
if(!isset($_SESSION['uid']){
    header('Location: index.php');
    exit;
}
if($user['access']!=='3'){
    header('Location: exit.php');
    exit;
}
if($_GET['znach'] == ''){
$znach = mysql_real_escape_string(htmlspecialchars($_POST['znach']));
}else{
$znach = mysql_real_escape_string(htmlspecialchars($_GET['znach']));
}
$znachz = $znach.'1';
    $workq = mysql_query("SELECT * FROM `work` WHERE `kod`='".$znachz."'");
    $q = mysql_query("SELECT * FROM `work-room` WHERE `id_room`='$id'");
    $qz = mysql_query("SELECT * FROM `work-room-z` WHERE `id_room`='$id'");
$e = mysql_num_rows($q);
if($e=='0'){
    header('Location: work-inco.php');
    exit;
}
$w = mysql_fetch_assoc($q);
$wz = mysql_fetch_assoc($qz);
?>
<!DOCTYPE html>
<html lang="ru">
    
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>РСО-ADMIN - работы</title>
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
    <link href="assets/js/colorPicker/bootstrap-colorpicker.css" rel="stylesheet">
    <link href="assets/js/switch/bootstrap-switch.css" rel="stylesheet">
    <link href="assets/js/validate/validate.css" rel="stylesheet">
    <link href="assets/js/idealform/css/jquery.idealforms.css" rel="stylesheet">
    <link href="assets/js/iCheck/flat/all.css" rel="stylesheet">
    <link href="assets/js/iCheck/line/all.css" rel="stylesheet">
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
                            <span>Работы
                            </span>
                        </h2>
                    </div>
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
                <li><a href="work-worklist.php?sd=edit&id=<?echo $w[id_order]?>" title="Редактирование заказа">Ред. заказа</a>
                </li>
                <li><i class="fa fa-lg fa-angle-right"></i>
                </li>
                <li><a href="work-worklist.php?sd=edit-room&id=<?echo $w[id_order]?>" title="Редактирование комнаты">Ред. комнаты</a>
                </li>
                <li><i class="fa fa-lg fa-angle-right"></i>
                </li>
                <li><a href="/work-worklist.php?sd=edit-room&id=<?echo $w[id_room] ?>" title="Настройки комнаты">Наст. комнаты</a>
                </li>
                <li><i class="fa fa-lg fa-angle-right"></i>
                </li>
                <li><a href="#" title="Настройки работ">Настройки работ</a>
                </li>
            </ul>
            <div class="content-wrap">
                <div class="row">
                <form action='room-sql-work.php?znach=<?echo $znach?>&id=<?echo $id?>' method='post'>
                    <div class="col-sm-12">
                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    Настройки работ</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#FootableClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="body-nest" id="Footable">
                                <form action="room-sql-work.php?znach=<?$znach?>&id=<?$id?>" method="post">
                                <table class="table-striped footable-res footable metro-blue" data-page-size="1000">
                                    <thead>
                                        <tr>
                                            <th>
                                                Название
                                            </th>
                                            <th data-hide="phone,tablet">
                                                si
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Цена
                                            </th>
                                            <th>
                                                Состояние
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    While($work = mysql_fetch_assoc($workq)){
                                    echo '<tr>
                                    <td>'.$work[name].'</td>
                                    <td style="text-align: center;">'.$work[si].'</td>
                                    <td style="text-align: center;">'.$work[price].' р</td>
                                    <td type="checkbox"><center style="padding-bottom: 0.5em;padding-top: 0.2em;">
                                    <label class="checkbox-transform">';
                                if($w[$work[kod_name]] == 1){
                                echo'
                            <div class="switch-on" id="switch">
                                <div class="make-switch" data-on="warning" data-off="danger">
                                    <input name="'.$work[kod_name].'" type="checkbox" checked>
                                </div>
                            </div>
                            ';
                            }else{
                            echo'
                            <div class="switch-off" id="switch">
                                <div class="make-switch" data-on="warning" data-off="danger">
                                    <input name="'.$work[kod_name].'" type="checkbox">
                                </div>
                            </div>';}
                                    echo'<span class="checkbox__label"></span>
                                    </label>';
                                    $namesw = 'z'.$work[kod_name];
                                    $nameswz = '$'.$namesw;
                                    if($nameswz == $work[ras]){
                                        echo '<br /><input type="text" name="'.$namesw.'" value="'.$wz[$namesw].'" style="color: #000000 !important;" class="form-control"></center></td></tr>';
                                    }
                                    ?>
                                    </tbody>
                                </table>
                                <br /><button type="submit" class="btn btn-success">Сохранить (Сохранит все настройки)</button><br /><br /><br /><br />
                            </div>
                        </div></form>
                    </div>
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
    <script type="text/javascript" src="assets/js/iCheck/jquery.icheck.js"></script>
    <script type="text/javascript" src="assets/js/switch/bootstrap-switch.js"></script>
    <script>
    $(document).ready(function() {
        //CHECKBOX PRETTYFY
        $('.skin-flat input').iCheck({
            checkboxClass: 'icheckbox_flat-red',
            radioClass: 'iradio_flat-red'
        });
        $('.skin-line input').each(function() {
            var self = $(this),
                label = self.next(),
                label_text = label.text();

            label.remove();
            self.iCheck({
                checkboxClass: 'icheckbox_line-blue',
                radioClass: 'iradio_line-blue',
                insert: '<div class="icheck_line-icon"></div>' + label_text
            });
        });
        //Switch Button

        $('.make-switch').bootstrapSwitch('setSizeClass', 'switch-small');
    });
    </script>


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