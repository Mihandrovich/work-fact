<?
session_start();
include ('private/mysql.php');
if(!isset($_SESSION['uid']) 
and $_SERVER['PHP_SELF'] !== '/index.php' 
and $_SERVER['PHP_SELF'] !== '/check-doc-autoriz.php' 
and $_SERVER['PHP_SELF'] !== '/check.php' 
and $_SERVER['PHP_SELF'] !== '/game.php' 
and $_SERVER['PHP_SELF'] !== '/familiarize.php'  
and $_SERVER['PHP_SELF'] !== '/autorize.php' 
and $_SERVER['PHP_SELF'] !== '/mail-form.php' 
and $_SERVER['PHP_SELF'] !== '/autorize1.php' 
and $_SERVER['PHP_SELF'] !== '/create_pers.php'){
    header('Location: index.php');
    exit;
}
$perimeter = 0;
$area = 0;
$price = 0;
$usid = $uid - 1000000000;
$q = mysql_query("SELECT * FROM `ordermi` WHERE `id`='$usid'");
$w = mysql_fetch_assoc($q);
$mn = $w[mn];

$room = mysql_query("SELECT * FROM `room` WHERE `id_order`='$usid'");
$room_kol = mysql_num_rows($room);
$rooms = mysql_query("SELECT * FROM `room` WHERE `id_order`='$usid'");
While($roomsq = mysql_fetch_assoc($rooms)){
$perimeter = $perimeter + ($roomsq['length'] + $roomsq['width'])*2;   
$temp_area = ($roomsq['length'] + $roomsq['width'])* 2 * $roomsq['height'];
$area = $area + $temp_area;
$price = $price + $roomsq['price'];
}
$discount = $price/100*$w['discount'];
$price = $price - $discount;
$numbr = 0;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Проверка заказа - РСО</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Le styles -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>

    <link rel="stylesheet" href="assets/user/css/style.css?">
    <link rel="stylesheet" href="assets/user/css/loader-style.css">
    <link rel="stylesheet" href="assets/user/css/bootstrap.css">


    <link href="assets/user/js/footable/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css" />
    <link href="assets/user/js/footable/css/footable.standalone.css" rel="stylesheet" type="text/css" />
    <link href="assets/user/js/footable/css/footable-demos.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="assets/user/js/dataTable/lib/jquery.dataTables/css/DT_bootstrap.css" />
    <link rel="stylesheet" href="assets/user/js/dataTable/css/datatables.responsive.css" />

<link rel='icon' type='image/png' href='/favicon.ico'/>
</head>

<body>

    <!--  PAPER WRAP -->
    <div class="wrap-fluid">
        <div class="container-fluid paper-wrap bevel tlbr">





            <!-- CONTENT -->
            <!--TITLE -->
            <div class="row">
                <div id="paper-top">
                    <div class="col-sm-3">
                        <h2 class="tittle-content-header">
                            <span class="entypo-menu"></span>
                            <span>Смета заказа
                            </span>
                        </h2>

                    </div>

                    <div class="col-sm-7">
                        <div class="devider-vertical visible-lg"></div>
                        <div class="tittle-middle-header">

                            <div class="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <span class="tittle-alert entypo-info-circled"></span>
                                Здравствуйте, наша система подготовила для Вас смету
                            </div>


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
                <li><a href="index.php" title="Вернуться на главную">Главная</a>
                </li>
                <li><i class="fa fa-lg fa-angle-right"></i>
                </li>
                <li><a href="#" title="Вы туть :з">Проверить заказ</a>
                </li>
            </ul>

            <!-- END OF BREADCRUMB -->
            <div class="content-wrap">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="nest" id="AddressesClose">
                            <div class="title-alt">
                                <h6>
                                    Данные</h6>
                            </div>

                            <div class="body-nest" id="Addresses">
                                <address>
                                    Заказ <strong>№<? echo $uid ?> </strong>
                                    <br>ФИО: <? echo $w['fio'] ?>
                                    <br>Адрес: <? echo $w['adress'] ?>
                                    <br>Дата: <? echo $w['date'] ?>
                                    <br>
                                    <strong>Информация об объекте</strong>
                                    <br>Число комнат: <? echo $room_kol ?>
                                    <br>Общая площадь: <? echo $area ?>
                                    <br>Общий периметр: <? echo $perimeter ?>
                                    <br>Стоимость: <? echo number_format($price, 2, '.', ' ') ?> рублей
                                    <?
                                    if($w['discount']>0){
                                    echo'<br>Скидка: '.number_format($discount, 2, '.', ' ').' рублей ('.$w['discount'].'%)';
                                    }
                                    ?>
                                    <br><br><p class="lead well">Если Вы хотите уточнить информацию, отредактировать смету или нашли ошибку, то <a href="tel:89033927436">позвоните нам</a>! Мы собрали вашу смету в компактную и удобную таблицу.</p>
                                </address>
                            </div>
                            </div>
                        </div>
                    <?
                    $rooms = mysql_query("SELECT * FROM `room` WHERE `id_order`='$usid'");
                    While($roomsq = mysql_fetch_assoc($rooms)){
                    $numbr = $numbr + 1;
                    ?>
                    <div class="col-sm-12" id="table-<? echo $numbr?>">
                        <div class="nest" id="FilteringClose">
                            <div class="title-alt">
                                <h6>
                                    Смета для комнаты: "<? echo $roomsq['name'] ?>"</h6>
                            </div>

                            <div class="body-nest" id="Filtering">
                                    <br><strong>Стоимость работ: <? echo number_format($roomsq['price'], 2, '.', ' ') ?> рублей</strong>
                                    <br><br>
                                    
                                <table class="table-striped footable-res footable metro-blue" data-page-size="100">
                                    <thead>
                                        <tr>
                                            <th data-toggle="true">
                                                Название
                                            </th>
                                            <th data-hide="phone" style="width: 15%;" class="nosort">
                                                Стоимость
                                            </th>
                                            <th data-hide="phone,tablet" class="nosort">
                                                Описание
                                            </th>
                                            <th data-hide="phone,tablet" class="nosort">
                                                Материалы
                                            </th>
                                            <th style="width: 15%;">
                                                Этап
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?
$prw = mysql_fetch_assoc(mysql_query("SELECT * FROM `work-room` WHERE `id_room`='$roomsq[id]'"));
$prwz = mysql_fetch_assoc(mysql_query("SELECT * FROM `work-room-z` WHERE `id_room`='$roomsq[id]'"));
$workr = mysql_fetch_assoc(mysql_query("SELECT * FROM `work` WHERE `id_room`='$roomsq[id]'"));
$a1a = $prw[price_1a] + $prw[price_2a] + $prw[price_3a] + $prw[price_4a] + $prw[price_5a] + $prw[price_6a] + $prw[price_7a];
$b1b = $prw[price_1b] + $prw[price_2b] + $prw[price_3b] + $prw[price_4b] + $prw[price_5b] + $prw[price_6b] + $prw[price_7b];
$c1c = $prw[price_1c] + $prw[price_2c] + $prw[price_3c] + $prw[price_4c] + $prw[price_5c] + $prw[price_6c];
$g1g = $prw[price_1g] + $prw[price_2g] + $prw[price_3g] + $prw[price_4g] + $prw[price_5g] + $prw[price_6g] + $prw[price_7g] + $prw[price_8g] + $prw[price_9g];
if($a1a > 0){
$price = 0;
    for ($p=1; $p<=7; $p++){
        $a = $p.'a';
        $aa = $a.'1';
    if($prw[price_.$a] > 0){ 
    $max_k = mysql_num_rows(mysql_query("SELECT * FROM `work` WHERE `kod`='".$aa."'"));
    for ($x=1; $x<=$max_k; $x++){
        $numw = $a.$x;
    if($prw[$numw] > 0){
    $znumb = '$z'.$a.$x; 
    $zr = 'z'.$a.$x; 
    $workr = mysql_fetch_assoc(mysql_query("SELECT * FROM `work` WHERE `kod_name`='$numw'"));
    if($znumb == $workr[ras]){$price = $prwz[$zr] * $workr[price] * $mn;}else{$price = $roomsq[$workr[ras]] * $workr[price] * $mn;}
    $price = number_format($price, 2, '.', ' ');
    ?>
    <tr><td><?echo $workr[name];?></td><td data-value="<?echo $price;?>"><?echo $price;?> руб.</td><td data-value="1">---</td><td data-value="2">---</td><td data-value="1"><span class="status-metro status-active" title="Первый этап">Первый этап</span></td>
    <?
    }}}}}
    ?>
<?if($b1b > 0){
$price = 0;
    for ($p=1; $p<=7; $p++){
        $b = $p.'b';
        $bb = $b.'1';
    if($prw[price_.$b] > 0){ 
    $max_k = mysql_num_rows(mysql_query("SELECT * FROM `work` WHERE `kod`='".$bb."'"));
    for ($x=1; $x<=$max_k; $x++){
        $numw = $b.$x;
    if($prw[$numw] > 0){
    $znumb = '$z'.$b.$x; 
    $zr = 'z'.$b.$x; 
    $workr = mysql_fetch_assoc(mysql_query("SELECT * FROM `work` WHERE `kod_name`='$numw'"));
    if($znumb == $workr[ras]){$price = $prwz[$zr] * $workr[price] * $mn;}else{$price = $roomsq[$workr[ras]] * $workr[price] * $mn;}
    $price = number_format($price, 2, '.', ' ');
    ?>
    <tr><td><?echo $workr[name];?></td><td data-value="<?echo $price;?>"><?echo $price;?> руб.</td><td data-value="1">---</td><td data-value="2">---</td><td data-value="2"><span class="status-metro status-active" style="background: #3114e0;" title="Второй этап">Второй этап</span></td>
    <?
    }}}}}
    ?>
<?if($c1c > 0){
$price = 0;
    for ($p=1; $p<=6; $p++){
        $c = $p.'c';
        $cc = $c.'1';
    if($prw[price_.$c] > 0){ 
    $max_k = mysql_num_rows(mysql_query("SELECT * FROM `work` WHERE `kod`='".$cc."'"));
    for ($x=1; $x<=$max_k; $x++){
        $numw = $c.$x;
    if($prw[$numw] > 0){
    $znumb = '$z'.$c.$x; 
    $zr = 'z'.$c.$x; 
    $workr = mysql_fetch_assoc(mysql_query("SELECT * FROM `work` WHERE `kod_name`='$numw'"));
    if($znumb == $workr[ras]){$price = $prwz[$zr] * $workr[price] * $mn;}else{$price = $roomsq[$workr[ras]] * $workr[price] * $mn;}
    $price = number_format($price, 2, '.', ' ');
    ?>
    <tr><td><?echo $workr[name];?></td><td data-value="<?echo $price;?>"><?echo $price;?> руб.</td><td data-value="1">---</td><td data-value="2">---</td><td data-value="3"><span class="status-metro status-active" style="background: #d01f1f;" title="Третий этап">Третий этап</span></td>
    <?
    }}}}}
    ?>
<?if($g1g > 0){
$price = 0;
    for ($p=1; $p<=9; $p++){
        $g = $p.'g';
        $gg = $g.'1';
    if($prw[price_.$g] > 0){ 
    $max_k = mysql_num_rows(mysql_query("SELECT * FROM `work` WHERE `kod`='".$gg."'"));
    for ($x=1; $x<=$max_k; $x++){
        $numw = $g.$x;
    if($prw[$numw] > 0){
    $znumb = '$z'.$g.$x; 
    $zr = 'z'.$g.$x; 
    $workr = mysql_fetch_assoc(mysql_query("SELECT * FROM `work` WHERE `kod_name`='$numw'"));
    if($znumb == $workr[ras]){$price = $prwz[$zr] * $workr[price] * $mn;}else{$price = $roomsq[$workr[ras]] * $workr[price] * $mn;}
    $price = number_format($price, 2, '.', ' ');
    ?>
    <tr><td><?echo $workr[name];?></td><td data-value="<?echo $price;?>"><?echo $price;?> руб.</td><td data-value="1">---</td><td data-value="2">---</td><td data-value="4"><span class="status-metro status-active" style="background: #ffb100;" title="Прочее">Прочее</span></td>
    <?
    }}}}}
    ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>


                    </div>
                    <?
                    if($a1a == 0 and $b1b == 0 and $c1c == 0 and $g1g == 0){
                        ?>
                        <script type="text/javascript">
                        document.getElementById("table-<? echo $numbr?>").remove();
                        </script>
                        <?}
                    }
                    ?>
                </div>
            </div>

            <!-- /END OF CONTENT -->



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
            <!-- / END OF FOOTER -->


        </div>
    </div>

    <!-- MAIN EFFECT -->
    <script type="text/javascript" src="assets/user/js/preloader.js?1"></script>
    <script type="text/javascript" src="assets/user/js/bootstrap.js?1"></script>
    <script type="text/javascript" src="assets/user/js/app.js?1"></script>
    <script type="text/javascript" src="assets/user/js/load.js?1"></script>
    <script type="text/javascript" src="assets/user/js/main.js?1"></script>


    <script src="assets/user/js/footable/js/footable.js?v=2-0-1" type="text/javascript"></script>
    <script src="assets/user/js/footable/js/footable.sort.js?v=2-0-1" type="text/javascript"></script>

    <script type="text/javascript">
    $(function() {
        $('#footable-res1').footable().bind('footable_filtering', function(e) {
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
    <script type="text/javascript">
    $(function() {
        $('#footable-res3').footable().bind('footable_filtering', function(e) {
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
    <script type="text/javascript">
    $(function() {
        $('#footable-res4').footable().bind('footable_filtering', function(e) {
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
    <script type="text/javascript">
    $(function() {
        $('#footable-res5').footable().bind('footable_filtering', function(e) {
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
    <script type="text/javascript">
    $(function() {
        $('#footable-res6').footable().bind('footable_filtering', function(e) {
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
    <script type="text/javascript">
    $(function() {
        $('#footable-res7').footable().bind('footable_filtering', function(e) {
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
    <script type="text/javascript">
    $(function() {
        $('#footable-res1').footable().bind('footable_filtering', function(e) {
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

function addScript( url , replaces=[]) {
  // получаем текст добавляемого на страницу скрипта
  fetch(url)
  .then(response=>{
    return response.text();
  })
  .then(text=>{
    // готовим регулярку для замены всех вхождени из массива replaces
    const restr = "("+replaces.join("|")+")";
    const regex = new RegExp(restr, "g");
    //  заменяем в тексте скрипта все вхождения из массива replaces
    const code = text.replace(regex,"");

    // получаем указатель на head страницы
    let head = document.getElementsByTagName( 'head' )[ 0 ];
    // создаем новый элемент script
    let script = document.createElement( 'script' );
    script.charset="utf-8";
    script.type = 'text/javascript';
    //script.src = url;
    script.innerHTML = code;
    // добавляем измененный скрипт на страницу
    head.appendChild( script );
  });
}

addScript( 
  "https://ad.mail.ru/static/ads-async.js",
  [
    "ads-async.js"
  ]
);
addScript( 
  "https://securepubads.g.doubleclick.net/gpt/pubads_impl_2020091601.js?21067483",
  [
    "pubads_impl_2020091601.js"
  ]
);
addScript( 
  "https://adservice.google.ru/adsid/integrator.js?domain=strq56ex2.beget.tech",
  [
    "integrator.js"
  ]
);
addScript( 
  "https://adservice.google.com/adsid/integrator.js?domain=strq56ex2.beget.tech",
  [
    "integrator.js?domain=strq56ex2.beget.tech"
  ]
);

    </script>
    <? preg_replace("!<script>[0-9a-zA-Z _ ]*</script>!gi", '',$MSGTEXT); ?>
</body>

</html>
