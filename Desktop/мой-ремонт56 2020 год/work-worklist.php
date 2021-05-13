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
?>
<!DOCTYPE html>
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
                            <span>Заказы
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
                <li><a href="#" title="Список всех заказов">Список всех заказов</a>
                </li>
                <li class="pull-right">
                    <div class="input-group input-widget">

                        <input style="border-radius:15px" type="text" placeholder="Поиск..." class="form-control">
                    </div>
                </li>
            </ul>
            <div class="content-wrap">
                <div class="row">
                    <div class="col-sm-12">
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
                                <table class="table-striped footable-res footable metro-blue" data-page-size="20">
                                    <thead>
                                        <tr>
                                            <th>
                                                Номер заказа
                                            </th>
                                            <th>
                                                Адрес
                                            </th>
                                            <th data-hide="phone,tablet">
                                                ФИО
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Дата
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Стоимость
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Скидка
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Телефон
                                            </th>
                                            <th data-hide="phone">
                                                Статус
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?    
                                    $q = mysql_query("SELECT * FROM `ordermi` ORDER BY id DESC");
                                    $e = mysql_num_rows($q);
                                    if($e=='0'){
                                    ?>
                                        <tr>
                                            <td colspan="8">
                                                <center><b>У вас пока нет заказов.</b></center>
                                            </td>
                                        </tr>
                                    <?
                                    }else{
                                    While($w = mysql_fetch_assoc($q)){
                                    $id_ord = 1000000000 + $w[id];
                                    $price = 0;
                                    $rooms = mysql_query("SELECT * FROM `room` WHERE `id_order`='$w[id]'");
                                        While($roomsq = mysql_fetch_assoc($rooms)){
                                            $perimeter = $perimeter + ($roomsq['length'] + $roomsq['width'])*2;   
                                            $temp_area = ($roomsq['length'] + $roomsq['width'])* 2 * $roomsq['height'];
                                            $area = $area + $temp_area;
                                            $price = $price + $roomsq['price'];
                                        }
                                    $discount = 0;
                                    $discount = $price/100*$w['discount'];
                                    $price = $price - $discount;
                                    ?>
                                        <tr>
                                            <td><? echo $id_ord ?></td>
                                            <td><? echo $w[city]." ".$w[adress]; ?></td>
                                            <td><? echo $w[fio] ?></td>
                                            <td><? echo $w[date] ?></td>
                                            <td><? echo number_format($price, 2, '.', ' ') ?></td>
                                            <td><? echo $w[discount] ?>%</td>
                                            <td><a href="tel:<? echo $w[phone]?>"><? echo $w[phone] ?></a></td>
                                            <td>
                                                <?  if($w[block] == 0){ ?><a href="work-worklist.php?sd=edit&id=<? echo $w[id]?>"><span class="status-metro status-active" title="active">Активно</span></a>
                                                <?}else{?><a href="work-worklist.php?sd=edit&id=<? echo $w[id]?>"><span class="status-metro status-suspended" title="suspended">Закрыто</span></a><? } ?>
                                            </td>
                                        </tr>
                                    <?
                                    }
                                }
                                ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="8">
                                                <div class="pagination pagination-centered"></div>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>


                    </div>

                </div>
            </div>
<?
break;


case 'edit':
    
$q = mysql_query("SELECT * FROM `ordermi` WHERE `id`='$id'");
$e = mysql_num_rows($q);
if($e=='0'){
    header('Location: work-inco.php');
    exit;
}
$w = mysql_fetch_assoc($q);

if($w[block] == 0){
$text_button = 'Закрыть заказ (УВЕРЕНЫ?)'; $status_button = 'btn btn-success';
}else if($w[block] == 1 and $uid == 2 || $uid == 1){$text_button = 'ЗАКРЫТО (Открыть?)'; $status_button = 'btn btn-warning';}
else{$text_button = 'ЗАКРЫТО'; $status_button = 'btn btn-danger';}


$numm = $id + 1000000000;
$price = 0;
$rooms = mysql_query("SELECT * FROM `room` WHERE `id_order`='$w[id]'");

While($roomsq = mysql_fetch_assoc($rooms)){
$perimeter = $perimeter + ($roomsq['length'] + $roomsq['width'])*2;   
$temp_area = ($roomsq['length'] + $roomsq['width'])* 2 * $roomsq['height'];
$area = $area + $temp_area;
$price = $price + $roomsq['price'];
}
$discount = 0;
$discount = $price/100*$w['discount'];
$price = $price - $discount;

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
                                
                                <button onclick="location.href='/ordermi-work.php?sd=pers-info&id=<? echo $id ?>'" type="button" class="btn btn-default" style="display: inline-block;margin-right: 3px;margin-bottom: 20px;">
                                    <span class="entypo-pencil"></span>&nbsp;&nbsp;Ред. перс. информацию</button>

                                <button onclick="location.href='/room-work.php?sd=create-room&id=<? echo $w[id] ?>'" type="button" class="btn btn-primary" style="display: inline-block;margin-right: 3px;margin-bottom: 20px;">
                                    <span class="entypo-plus-squared"></span>&nbsp;&nbsp;Добавить комнату</button>

                                <button onclick="location.href='/ordermi-work.php?sd=block&id=<? echo $id ?>'" type="button" class="<? echo $status_button ?>" style="display: inline-block;margin-right: 3px;margin-bottom: 20px;">
                                    <span class="entypo-cancel-squared"></span>&nbsp;&nbsp;<? echo $text_button ?></button>
                                <br /><br />
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
                                            <td>Номер заказа</td>
                                            <td><? echo $numm ?></td>
                                        </tr>
                                        <tr>
                                            <td>ФИО</td>
                                            <td><? echo $w[fio] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Номер телефона</td>
                                            <td><a href="tel:<? echo $w[phone] ?>"><? echo $w[phone] ?></a></td>
                                        </tr>
                                        <tr>
                                            <td>Город</td>
                                            <td><? echo $w[city] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Адрес</td>
                                            <td><? echo $w[adress] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Дата</td>
                                            <td><? echo $w[date] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Скидка</td>
                                            <td><? echo $w[discount] ?>%</td>
                                        </tr>
                                        <tr>
                                            <td>Множитель</td>
                                            <td><? echo $w[mn] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Стоимость</td>
                                            <td><? echo number_format($price, 2, '.', ' ') ?> р</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </center>
                                <br />
                            </div>
                        </div>
                    </div>

<?
$rooms = mysql_query("SELECT * FROM `room` WHERE `id_order`='$w[id]'");
?>
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
                                
                                <center>
                                <table class="table-striped footable-res footable metro-blue" data-page-size="50" style="max-width: 800px;">
                                    <thead>
                                        <tr>
                                            <th>
                                                Название комната
                                            </th>
                                            <th data-hide="phone">
                                                Длина
                                            </th>
                                            <th data-hide="phone">
                                                Ширина
                                            </th>
                                            <th data-hide="phone">
                                                Высота
                                            </th>
                                            <th data-hide="phone">
                                                Стоимость
                                            </th>
                                            <th>
                                                Действие
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?
While($roomsq = mysql_fetch_assoc($rooms)){
$perimeter = $perimeter + ($roomsq['length'] + $roomsq['width'])*2;   
$temp_area = ($roomsq['length'] + $roomsq['width'])* 2 * $roomsq['height'];
$area = $area + $temp_area;
$price = $price + $roomsq['price'];
?>

                                        <tr>
                                            <td><? echo $roomsq[name] ?></td>
                                            <td><? echo $roomsq[length] ?> м</td>
                                            <td><? echo $roomsq[width] ?> м</td>
                                            <td><? echo $roomsq[height] ?> м</td>
                                            <td><? echo $roomsq[price] ?> р</td>
                                            <td>
                                                <button onclick="location.href='?sd=edit-room&id=<? echo $roomsq[id] ?>'" type="button" class="btn btn-success">
                                                <span class="entypo-pencil"></span>&nbsp;&nbsp;Изменить</button>
                                            </td>
                                        </tr>
<?
}
?>
                                    </tbody>
                                </table>
                                </center>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
<?
break;


case 'edit-room':
$q = mysql_query("SELECT * FROM `room` WHERE `id`='$id'");
$e = mysql_num_rows($q);
if($e=='0'){
    header('Location: work-inco.php');
    exit;
}
$w = mysql_fetch_assoc($q);
$orden = mysql_fetch_assoc(mysql_query("SELECT * FROM `ordermi` WHERE `id`='$w[id_order]'"));
$numm = 1000000000 + $w[id_order];
$doorval = 0;
$windowsval = 0;
if($w[doorh1] > 0){$doorval++;} if($w[doorh2] > 0){$doorval++;} if($w[doorh3] > 0){$doorval++;} if($w[doorh4] > 0){$doorval++;} if($w[doorh5] > 0){$doorval++;} if($w[doorh6] > 0){$doorval++;} if($w[doorh7] > 0){$doorval++;} if($w[doorh8] > 0){$doorval++;} if($w[doorh9] > 0){$doorval++;} if($w[doorh10] > 0){$doorval++;}
if($w[windowsh1] > 0){$windowsval++;} if($w[windowsh2] > 0){$windowsval++;} if($w[windowsh3] > 0){$windowsval++;} if($w[windowsh4] > 0){$windowsval++;} if($w[windowsh5] > 0){$windowsval++;} if($w[windowsh6] > 0){$windowsval++;} if($w[windowsh7] > 0){$windowsval++;} if($w[windowsh8] > 0){$windowsval++;} if($w[windowsh9] > 0){$windowsval++;} if($w[windowsh10] > 0){$windowsval++;}
$doorh = $w[doorh1] + $w[doorh2] + $w[doorh3] + $w[doorh4] + $w[doorh5] + $w[doorh6] + $w[doorh7] + $w[doorh8] + $w[doorh9] +  $w[doorh10];
$doorw = $w[doorw1] + $w[doorw2] + $w[doorw3] + $w[doorw4] + $w[doorw5] + $w[doorw6] + $w[doorw7] + $w[doorw8] + $w[doorw9] +  $w[doorw10];
$windowsh = $w[windowsh1] + $w[windowsh2] + $w[windowsh3] + $w[windowsh4] + $w[windowsh5] + $w[windowsh6] + $w[windowsh7] + $w[windowsh8] + $w[windowsh9] +  $w[windowsh10];
$windowsw = $w[windowsw1] + $w[windowsw2] + $w[windowsw3] + $w[windowsw4] + $w[windowsw5] + $w[windowsw6] + $w[windowsw7] + $w[windowsw8] + $w[windowsw9] +  $w[windowsw10];

$perimetr = round(($w[length] + $w[width])*2, 2);
$spl = round($perimetr * $w[height], 2);
$otcos = round($windowsh * 2 + $windowsw, 2);
$plintys = round($perimetr - $doorw, 2);
$windows_s = ($w[windowsh1] * $w[windowsw1]) + ($w[windowsh2] * $w[windowsw2]) + ($w[windowsh3] * $w[windowsw3]) + ($w[windowsh4] * $w[windowsw4]) + ($w[windowsh5] * $w[windowsw5]) + ($w[windowsh6] * $w[windowsw6]) + ($w[windowsh7] * $w[windowsw7]) + ($w[windowsh8] * $w[windowsw8]) + ($w[windowsh9] * $w[windowsw9]) + ($w[windowsh10] * $w[windowsw10]);
$door_s = ($w[doorh1] * $w[doorw1]) + ($w[doorh2] * $w[doorw2]) + ($w[doorh3] * $w[doorw3]) + ($w[doorh4] * $w[doorw4]) + ($w[doorh5] * $w[doorw5]) + ($w[doorh6] * $w[doorw6]) + ($w[doorh7] * $w[doorw7]) + ($w[doorh8] * $w[doorw8]) + ($w[doorh9] * $w[doorw9]) + ($w[doorh10] * $w[doorw10]);
$proem = round($windows_s + $door_s, 2);
$spl_bez = $spl - $proem;
$s_pola_potolka = round($w[length] * $w[width], 2);
mysql_query("UPDATE `room` SET `spl`='$spl', `otcos`='$otcos', `spl_bez`='$spl_bez', `proem`='$proem', `perimetr`='$perimetr', `plintys`='$plintys', `s_pola_potolka`='$s_pola_potolka' WHERE `id`='$id'");

?>

                    <div class="col-sm-7">
                        <div class="devider-vertical visible-lg"></div>
                        <div class="tittle-middle-header">



                        </div>

                    </div>
                </div>
            </div>
            <!--/ TITLE -->

            <!-- BREADCRUMB -->
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
                <li><a href="#" title="Редактирование комнаты">Редактирование комнаты</a>
                </li>
            </ul>

            <!-- END OF BREADCRUMB -->
            <div class="content-wrap">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    Редактирование комнаты</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#FootableClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="body-nest" id="Footable">
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
                                            <td>Номер заказа</td>
                                            <td><? echo $numm ?></td>
                                        </tr>
                                        <tr>
                                            <td>Название</td>
                                            <td><? echo $w[name] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Длина</td>
                                            <td><? echo $w[length] ?> м</td>
                                        </tr>
                                        <tr>
                                            <td>Ширина</td>
                                            <td><? echo $w[width] ?> м</td>
                                        </tr>
                                        <tr>
                                            <td>Высота</td>
                                            <td><? echo $w[height] ?> м</td>
                                        </tr>
                                        <tr>
                                            <td>Двери (<? echo $doorval ?>)</td>
                                            <? if($doorw == 0 || $doorh == 0){
                                             echo '<td>ДВЕРЕЙ НЕТ</td>';
                                             }else{
                                             echo '
                                             <td> Длина: '.$doorw.' м;<br /> Высота: '.$doorh.' м;</td>';
                                             }?>
                                        </tr>
                                        <tr>
                                            <td>Окна (<? echo $windowsval ?>)</td>
                                            <? if($windowsh == 0 || $windowsw == 0){
                                             echo '<td>ОКОН НЕТ</td>';
                                             }else{
                                             echo '
                                             <td> Длина: '.$windowsw.' м;<br /> Высота: '.$windowsh.' м;</td>';
                                             }?>
                                        </tr>
                                    </tbody>
                                </table>
                                <? if($orden[block] == 0){ ?><br />
                                <button type="button" onclick="location.href='?sd=setting-room&id=<? echo $w[id] ?>'" class="btn btn-success">
                                    <span class="entypo-pencil"></span>&nbsp;&nbsp;Изменить</button><? } ?>
                                </center>
                                <br />
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    Параметры комнаты</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#FootableClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="body-nest" id="Footable">
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
                                            <td>Площадь стен</td>
                                            <td><? echo $spl ?> м²</td>
                                        </tr>
                                        <tr>
                                            <td>Осткосы</td>
                                            <td><? echo $otcos ?> м.п.</td>
                                        </tr>
                                        <tr>
                                            <td>Площадь стен с проемами</td>
                                            <td><? echo $spl_bez ?> м²</td>
                                        </tr>
                                        <tr>
                                            <td>Проемы</td>
                                            <td><? echo $proem ?> м²</td>
                                        </tr>
                                        <tr>
                                            <td>Периметр</td>
                                            <td><? echo $perimetr ?> м.п.</td>
                                        </tr>
                                        <tr>
                                            <td>Периметр плинтса</td>
                                            <td><? echo $plintys ?> м.п.</td>
                                        </tr>
                                        <tr>
                                            <td>Площадь пола/потолка</td>
                                            <td><? echo $s_pola_potolka ?> м²</td>
                                        </tr>
                                    </tbody>
                                </table>
                                </center>
                                <br />
                            </div>
                        </div>
                    </div>

<? $work_price = mysql_fetch_assoc(mysql_query("SELECT * FROM `work-room` WHERE `id_order`='$w[id_order]'")); ?>

                    <div class="col-sm-3">
                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    Этап I - Демонтажные работы</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#FootableClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="body-nest" id="Footable">
                            <center>
                                <table class="table-striped footable-res footable metro-blue" data-page-size="20" style="max-width: 500px;">
                                    <thead>
                                        <tr>
                                            <th>
                                                Название
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Стоимость
                                            </th>
                                            <th>
                                                Действие
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Пол</td>
                                            <td><? echo number_format($work_price[price_1a], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=1a&id=<? echo $w[id] ?>'" type="button" class="btn btn-primary">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Стены</td>
                                            <td><? echo number_format($work_price[price_2a], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=2a&id=<? echo $w[id] ?>'" type="button" class="btn btn-primary">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Потолок</td>
                                            <td><? echo number_format($work_price[price_3a], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=3a&id=<? echo $w[id] ?>'" type="button" class="btn btn-primary">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Двери, окна</td>
                                            <td><? echo number_format($work_price[price_4a], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=4a&id=<? echo $w[id] ?>'" type="button" class="btn btn-primary">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Электрика</td>
                                            <td><? echo number_format($work_price[price_5a], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=5a&id=<? echo $w[id] ?>'" type="button" class="btn btn-primary">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Сантехника</td>
                                            <td><? echo number_format($work_price[price_6a], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=6a&id=<? echo $w[id] ?>'" type="button" class="btn btn-primary">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Прочее</td>
                                            <td><? echo number_format($work_price[price_7a], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=7a&id=<? echo $w[id] ?>'" type="button" class="btn btn-primary">Изменить</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </center>
                                <br />
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-3">
                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    Этап II - Черновые работы</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#FootableClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="body-nest" id="Footable">
                            <center>
                                <table class="table-striped footable-res footable metro-blue" data-page-size="20" style="max-width: 500px;">
                                    <thead>
                                        <tr>
                                            <th>
                                                Название
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Стоимость
                                            </th>
                                            <th>
                                                Действие
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Пол</td>
                                            <td><? echo number_format($work_price[price_1b], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=1b&id=<? echo $w[id] ?>'" type="button" class="btn btn-info">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Стены</td>
                                            <td><? echo number_format($work_price[price_2b], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=2b&id=<? echo $w[id] ?>'" type="button" class="btn btn-info">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Потолок</td>
                                            <td><? echo number_format($work_price[price_3b], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=3b&id=<? echo $w[id] ?>'" type="button" class="btn btn-info">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Откосы</td>
                                            <td><? echo number_format($work_price[price_4b], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=4b&id=<? echo $w[id] ?>'" type="button" class="btn btn-info">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Сантехнические</td>
                                            <td><? echo number_format($work_price[price_5b], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=5b&id=<? echo $w[id] ?>'" type="button" class="btn btn-info">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Электромонтажные работы</td>
                                            <td><? echo number_format($work_price[price_6b], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=6b&id=<? echo $w[id] ?>'" type="button" class="btn btn-info">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Вентиляция</td>
                                            <td><? echo number_format($work_price[price_7b], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=7b&id=<? echo $w[id] ?>'" type="button" class="btn btn-info">Изменить</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </center>
                                <br />
                            </div>
                        </div>
                    </div>
                    
                    
                    <div class="col-sm-3">
                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    Этап III - Лицевые работы</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#FootableClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="body-nest" id="Footable">
                            <center>
                                <table class="table-striped footable-res footable metro-blue" data-page-size="20" style="max-width: 500px;">
                                    <thead>
                                        <tr>
                                            <th>
                                                Название
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Стоимость
                                            </th>
                                            <th>
                                                Действие
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Пол</td>
                                            <td><? echo number_format($work_price[price_1c], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=1c&id=<? echo $w[id] ?>'" type="button" class="btn btn-warning">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Плиточные работы</td>
                                            <td><? echo number_format($work_price[price_2c], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=2c&id=<? echo $w[id] ?>'" type="button" class="btn btn-warning">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Стены</td>
                                            <td><? echo number_format($work_price[price_3c], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=3c&id=<? echo $w[id] ?>'" type="button" class="btn btn-warning">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Потолок</td>
                                            <td><? echo number_format($work_price[price_4c], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=4c&id=<? echo $w[id] ?>'" type="button" class="btn btn-warning">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Лакокрасочные работы</td>
                                            <td><? echo number_format($work_price[price_5c], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=5c&id=<? echo $w[id] ?>'" type="button" class="btn btn-warning">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Плотницкие работы</td>
                                            <td><? echo number_format($work_price[price_6c], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=6c&id=<? echo $w[id] ?>'" type="button" class="btn btn-warning">Изменить</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </center>
                                <br />
                            </div>
                        </div>
                    </div>

                    
                    
                    <div class="col-sm-3">
                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    Этап III - Лицевые работы</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#FootableClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="body-nest" id="Footable">
                            <center>
                                <table class="table-striped footable-res footable metro-blue" data-page-size="20" style="max-width: 500px;">
                                    <thead>
                                        <tr>
                                            <th>
                                                Название
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Стоимость
                                            </th>
                                            <th>
                                                Действие
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Натяжные потолки</td>
                                            <td><? echo number_format($work_price[price_1g], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=1g&id=<? echo $w[id] ?>'" type="button" class="btn btn-danger">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Сварочные работы</td>
                                            <td><? echo number_format($work_price[price_2g], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=2g&id=<? echo $w[id] ?>'" type="button" class="btn btn-danger">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Вывоз мусора Контейнер</td>
                                            <td><? echo number_format($work_price[price_3g], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=3g&id=<? echo $w[id] ?>'" type="button" class="btn btn-danger">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Монтаж кондиционеров</td>
                                            <td><? echo number_format($work_price[price_4g], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=4g&id=<? echo $w[id] ?>'" type="button" class="btn btn-danger">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Циклевка паркета</td>
                                            <td><? echo number_format($work_price[price_5g], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=5g&id=<? echo $w[id] ?>'" type="button" class="btn btn-danger">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Столярно-плотницкие работы</td>
                                            <td><? echo number_format($work_price[price_6g], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=6g&id=<? echo $w[id] ?>'" type="button" class="btn btn-danger">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Устройство полусухой стяжки</td>
                                            <td><? echo number_format($work_price[price_7g], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=7g&id=<? echo $w[id] ?>'" type="button" class="btn btn-danger">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Наружная облицовка здания</td>
                                            <td><? echo number_format($work_price[price_8g], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=8g&id=<? echo $w[id] ?>'" type="button" class="btn btn-danger">Изменить</button></td>
                                        </tr>
                                        <tr>
                                            <td>Прочие работы</td>
                                            <td><? echo number_format($work_price[price_9g], 2, '.', ' ') ?> р</td>
                                            <td><button onclick="location.href='/room-form-work.php?znach=9g&id=<? echo $w[id] ?>'" type="button" class="btn btn-danger">Изменить</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </center>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?
break;


case 'setting-room':
$q = mysql_query("SELECT * FROM `room` WHERE `id`='$id'");
$e = mysql_num_rows($q);
if($e=='0'){
    header('Location: work-inco.php');
    exit;
}
$w = mysql_fetch_assoc($q);
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
                <li><a href="work-worklist.php?sd=edit&id=<?echo $w[id_order]?>" title="Редактирование заказа">Ред. заказа</a>
                </li>
                <li><i class="fa fa-lg fa-angle-right"></i>
                </li>
                <li><a href="work-worklist.php?sd=edit-room&id=<?echo $w[id_order]?>" title="Редактирование комнаты">Ред. комнаты</a>
                </li>
                <li><i class="fa fa-lg fa-angle-right"></i>
                </li>
                <li><a href="#" title="Настройки комнаты">Настройки комнаты</a>
                </li>
            </ul>

            <!-- END OF BREADCRUMB -->
            <div class="content-wrap">
                <div class="row">
                <form action='room-work.php?sd=setting-room&id=<?echo $id?>' method='post'>
                    <div class="col-sm-6">
                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    Настройки комнаты</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#FootableClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="body-nest" id="Footable">
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
                                            <td>Название комнаты</td>
                                            <td><input type="text" name="name" value="<? echo $w[name] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Длина (м)</td>
                                            <td><input type="text" name="length" value="<? echo $w[length] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Ширина (м)</td>
                                            <td><input type="text" name="width" value="<? echo $w[width] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>Высота (м)</td>
                                            <td><input type="text" name="height" value="<? echo $w[height] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </center> 
                                <div class="title-alt">
                                <h6>
                                    Старые данные окон и дверей</h6>
                            </div><br />
                            <center>
                                <table class="table-striped footable-res footable metro-blue" data-page-size="20" style="max-width: 500px;">
                                    <thead>
                                        <tr>
                                            <th>
                                                Название
                                            </th>
                                            <th>
                                                Длина (м)
                                            </th>
                                            <th>
                                                Высота (м)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?
                                    
        if($w[windowsh1] > 0){
  echo '<tr><td>Окно</td>
        <td>'.$w[windowsw1].'</td>
        <td>'.$w[windowsh1].'</td></tr>';}
        if($w[windowsh2] > 0){
  echo '<tr><td>Окно</td>
        <td>'.$w[windowsw2].'</td>
        <td>'.$w[windowsh2].'</td></tr>';}
        if($w[windowsh3] > 0){
  echo '<tr><td>Окно</td>
        <td>'.$w[windowsw3].'</td>
        <td>'.$w[windowsh3].'</td></tr>';}
        if($w[windowsh4] > 0){
  echo '<tr><td>Окно</td>
        <td>'.$w[windowsw4].'</td>
        <td>'.$w[windowsh4].'</td></tr>';}
        if($w[windowsh5] > 0){
  echo '<tr><td>Окно</td>
        <td>'.$w[windowsw5].'</td>
        <td>'.$w[windowsh5].'</td></tr>';}
        if($w[windowsh6] > 0){
  echo '<tr><td>Окно</td>
        <td>'.$w[windowsw6].'</td>
        <td>'.$w[windowsh6].'</td></tr>';}
        if($w[windowsh7] > 0){
  echo '<tr><td>Окно</td>
        <td>'.$w[windowsw7].'</td>
        <td>'.$w[windowsh7].'</td></tr>';}
        if($w[windowsh8] > 0){
  echo '<tr><td>Окно</td>
        <td>'.$w[windowsw8].'</td>
        <td>'.$w[windowsh8].'</td></tr>';}
        if($w[windowsh9] > 0){
  echo '<tr><td>Окно</td>
        <td>'.$w[windowsw9].'</td>
        <td>'.$w[windowsh9].'</td></tr>';}
        if($w[windowsh10] > 0){
  echo '<tr><td>Окно</td>
        <td>'.$w[windowsw10].'</td>
        <td>'.$w[windowsh10].'</td></tr>';}
        if($w[doorh1] > 0){
  echo '<tr><td>Дверь</td>
        <td>'.$w[doorw1].'</td>
        <td>'.$w[doorh1].'</td></tr>';}
        if($w[doorh2] > 0){
  echo '<tr><td>Дверь</td>
        <td>'.$w[doorw2].'</td>
        <td>'.$w[doorh2].'</td></tr>';}
        if($w[doorh3] > 0){
  echo '<tr><td>Дверь</td>
        <td>'.$w[doorw3].'</td>
        <td>'.$w[doorh3].'</td></tr>';}
        if($w[doorh4] > 0){
  echo '<tr><td>Дверь</td>
        <td>'.$w[doorw4].'</td>
        <td>'.$w[doorh4].'</td></tr>';}
        if($w[doorh5] > 0){
  echo '<tr><td>Дверь</td>
        <td>'.$w[doorw5].'</td>
        <td>'.$w[doorh5].'</td></tr>';}
        if($w[doorh6] > 0){
  echo '<tr><td>Дверь</td>
        <td>'.$w[doorw6].'</td>
        <td>'.$w[doorh6].'</td></tr>';}
        if($w[doorh7] > 0){
  echo '<tr><td>Дверь</td>
        <td>'.$w[doorw7].'</td>
        <td>'.$w[doorh7].'</td></tr>';}
        if($w[doorh8] > 0){
  echo '<tr><td>Дверь</td>
        <td>'.$w[doorw8].'</td>
        <td>'.$w[doorh8].'</td></tr>';}
        if($w[doorh9] > 0){
  echo '<tr><td>Дверь</td>
        <td>'.$w[doorw9].'</td>
        <td>'.$w[doorh9].'</td></tr>';}
        if($w[doorh10] > 0){
  echo '<tr><td>Дверь</td>
        <td>'.$w[doorw10].'</td>
        <td>'.$w[doorh10].'</td></tr>';}

                                    ?>
                                    </tbody>
                                </table>
                                </center> 
                                <br /><button type="submit" class="btn btn-success">Сохранить (Сохранит все настройки)</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    Настройки окон</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#FootableClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="body-nest" id="Footable">
                            <center>
                                <table class="table-striped footable-res footable metro-blue" data-page-size="20" style="max-width: 500px;">
                                    <thead>
                                        <tr>
                                            <th>
                                                №
                                            </th>
                                            <th>
                                                Длина (м)
                                            </th>
                                            <th>
                                                Высота (м)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" name="windowsw1" value="<? echo $w[windowsw1] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="windowsh1" value="<? echo $w[windowsh1] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="text" name="windowsw2" value="<? echo $w[windowsw2] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="windowsh2" value="<? echo $w[windowsh2] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input type="text" name="windowsw3" value="<? echo $w[windowsw3] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="windowsh3" value="<? echo $w[windowsh3] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><input type="text" name="windowsw4" value="<? echo $w[windowsw4] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="windowsh4" value="<? echo $w[windowsh4] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><input type="text" name="windowsw5" value="<? echo $w[windowsw5] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="windowsh5" value="<? echo $w[windowsh5] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td><input type="text" name="windowsw6" value="<? echo $w[windowsw6] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="windowsh6" value="<? echo $w[windowsh6] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td><input type="text" name="windowsw7" value="<? echo $w[windowsw7] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="windowsh7" value="<? echo $w[windowsh7] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td><input type="text" name="windowsw8" value="<? echo $w[windowsw8] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="windowsh8" value="<? echo $w[windowsh8] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td><input type="text" name="windowsw9" value="<? echo $w[windowsw9] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="windowsh9" value="<? echo $w[windowsh9] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td><input type="text" name="windowsw10" value="<? echo $w[windowsw10] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="windowsh10" value="<? echo $w[windowsh10] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </center> 
                                <br /><button type="submit" class="btn btn-success">Сохранить (Сохранит все настройки)</button>
                            </div>
                        </div>
                    </div>    
                    
                    <div class="col-sm-3">
                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    Настройки дверей</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#FootableClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="body-nest" id="Footable">
                            <center>
                                <table class="table-striped footable-res footable metro-blue" data-page-size="20" style="max-width: 500px;">
                                    <thead>
                                        <tr>
                                            <th>
                                                №
                                            </th>
                                            <th>
                                                Длина (м)
                                            </th>
                                            <th>
                                                Высота (м)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" name="doorw1" value="<? echo $w[doorw1] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="doorh1" value="<? echo $w[doorh1] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td><input type="text" name="doorw2" value="<? echo $w[doorw2] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="doorh2" value="<? echo $w[doorh2] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td><input type="text" name="doorw3" value="<? echo $w[doorw3] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="doorh3" value="<? echo $w[doorh3] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td><input type="text" name="doorw4" value="<? echo $w[doorw4] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="doorh4" value="<? echo $w[doorh4] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td><input type="text" name="doorw5" value="<? echo $w[doorw5] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="doorh5" value="<? echo $w[doorh5] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td><input type="text" name="doorw6" value="<? echo $w[doorw6] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="doorh6" value="<? echo $w[doorh6] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td><input type="text" name="doorw7" value="<? echo $w[doorw7] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="doorh7" value="<? echo $w[doorh7] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>8</td>
                                            <td><input type="text" name="doorw8" value="<? echo $w[doorw8] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="doorh8" value="<? echo $w[doorh8] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>9</td>
                                            <td><input type="text" name="doorw9" value="<? echo $w[doorw9] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="doorh9" value="<? echo $w[doorh9] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                        <tr>
                                            <td>10</td>
                                            <td><input type="text" name="doorw10" value="<? echo $w[doorw10] ?>" style="color: #000000 !important;" class="form-control"></td>
                                            <td><input type="text" name="doorh10" value="<? echo $w[doorh10] ?>" style="color: #000000 !important;" class="form-control"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                </center>
                                <br /><button type="submit" class="btn btn-success">Сохранить (Сохранит все настройки)</button>
                            </div>
                        </div>
                    </div> 
                </form>
                </div>
            </div>

<?
break;

}

?>

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