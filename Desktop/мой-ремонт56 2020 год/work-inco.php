<? include ("assets/DATA.php");?>
<? include ("assets/FUNCTION.php");?>
<?
session_start();
?>
<!DOCTYPE html>
<html lang="ru">
    
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>РСО-ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/loader-style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link href="assets/js/footable/css/footable.core.css?v=2-0-1" rel="stylesheet" type="text/css" />
    <link href="assets/js/footable/css/footable.standalone.css" rel="stylesheet" type="text/css" />
    <link href="assets/js/footable/css/footable-demos.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/js/wizard/css/jquery.steps.css">
    <link type="text/css" rel="stylesheet" href="assets/js/wizard/jquery.stepy.css" />
    <link href="assets/js/tabs/acc-wizard.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="assets/js/progress-bar/number-pb.css">

    <script src="assets/js/wizard/lib/modernizr-2.6.2.min.js"></script>
    <style type="text/css">
    canvas#canvas4 {
        position: relative;
        top: 20px;
    }
    </style>

    <link rel='icon' type='image/png' href='/favicon.ico'/>
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
                            <i class="icon-window"></i> 
                            <span>Главная
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
                <li><a href="index.php" title="Перейти на главную сайта">Корневая</a>
                </li>
                <li><i class="fa fa-lg fa-angle-right"></i>
                </li>
                <li><a href="#" title="Главная">Главная</a>
                </li>
            </ul>
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

                                <p class="lead well">Список последних 10-ти заказов. Для улучшения качества рекомендуем перезвонить заказчикам через несколько месяцев, таблица ниже.</p>

                                <table class="table-striped footable-res footable metro-blue" data-page-size="10">
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
                                                Телефон
                                            </th>
                                            <th data-hide="phone">
                                                Статус
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $q = mysql_query("SELECT * FROM `ordermi` ORDER BY id DESC LIMIT 10");
                                        $e = mysql_num_rows($q);
                                        if($e=='0'){
                                        ?>
                                        <tr>
                                            <td colspan="5">
                                                <center><b>У вас пока нет заказов.</b></center>
                                            </td>
                                        </tr>
                                        <?
                                        }else{
                                            While($w = mysql_fetch_assoc($q)){
                                            $id_ord = 1000000000 + $w[id];
                                        ?>
                                        <tr>
                                            <td><? echo $id_ord ?></td>
                                            <td><? echo $w[city]." ".$w[adress]; ?></td>
                                            <td><? echo $w[fio] ?></td>
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
                                </table>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12">

                        <div class="nest" id="FootableClose">
                            <div class="title-alt">
                                <h6>
                                    Перезвони мне</h6>
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

                                <p class="lead well">Привет, перезвони заказчикам и спроси понравился им ремонт, всё в порядке, может что-то отошло. Это поможет в дальнейшем продвижении.</p>

                                <table class="table-striped footable-res footable metro-blue" data-page-size="100">
                                    <thead>
                                        <tr>
                                            <th>
                                                Номер заказа
                                            </th>
                                            <th>
                                                Адрес
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Данные
                                            </th>
                                            <th data-hide="phone,tablet">
                                                Телефон
                                            </th>
                                            <th data-hide="phone">
                                                Действие
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?
                                        $q = mysql_query("SELECT * FROM `ordermi` WHERE `block`='1' and `hide`='0'");
                                        $e = mysql_num_rows($q);
                                        if($e=='0'){
                                        ?>
                                        <tr>
                                            <td colspan="5">
                                                <center><b>У вас пока нет заказов.</b></center>
                                            </td>
                                        </tr>
                                        <?
                                        }else{
                                        While($w = mysql_fetch_assoc($q)){
                                            $price = 0;
                                            $rooms = mysql_query("SELECT * FROM `room` WHERE `id_order`='$w[id]'");
                                            $id_ord = 1000000000 + $w[id];
                                            $unixDate = strtotime($w['date-block']);

                                            if($unixDate + 2592000 < time()){
                                                $orderkol = 1;
                                        ?>
                                        <tr>
                                            <td><? echo $id_ord ?></td>
                                            <td><? echo $w[city]." ".$w[adress]; ?></td>
                                            <td>ФИО: <? echo $w[fio] ?>; Дата открытия заказа: <? echo $w['date-create'] ?>; Дата закрытия заказа: <? echo $w['date-block'] ?>;</td>
                                            <td><a href="tel:<? echo $w[phone]?>"><? echo $w[phone] ?></a></td>
                                            <td><a href="tel:<? echo $w[phone]?>"><span class="status-metro status-active" title="active">Позвонить</span></a>
                                            &nbsp;&nbsp;&nbsp;<a href="/ordermi-work.php?sd=ordermi-phone&id=<? echo $w[id]?>"><span class="status-metro status-suspended" title="suspended">Уже позвонил</span></a></td>
                                        </tr>
                                        <?
                                            }
        
                                        }
                                    if($orderkol !== 1){
                                    ?>
                                        <tr>
                                            <td colspan="5">
                                                <center><b>У вас пока нет заказов.</b></center>
                                            </td>
                                        </tr>
                                    <?
                                }
                            }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12" style="margin-bottom: 20px;">
                        <div class="nest" id="tabClose">
                            <div class="title-alt">
                                <h6>
                                    Задачи</h6>
                                <div class="titleClose">
                                    <a class="gone" href="#tabClose">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                                <div class="titleToggle">
                                    <a class="nav-toggle-alt" href="#tab">
                                        <span class="entypo-up-open"></span>
                                    </a>
                                </div>

                            </div>

                            <div class="body-nest" id="tab">

                                <div id="wizard-tab">
                                    <h2>Проверка заказов</h2>
                                    <section>
                                        <p>1. Проверить заказ <a href="">№10009345</a>, сообщение: "Клиент не доволен ценой, просит перепроверить данные".</p>
                                        <p>2. Проверить заказ <a href="">№10005556</a>, клиет просит проверить параметры квартиры.</p>
                                        <p>3. Проверить заказ <a href="">№100043554</a>, клиент не согласен с ценой.</p>
                                    </section>

                                    <h2>Редактирование заказов</h2>
                                    <section>
                                        <p>1. Редактировать заказ <a href="">№10005556</a>, клиет просит дабовить установку дополнительного окна, перезвонить.</p>
                                        <p>2. Редактировать заказ <a href="">№10003422</a>, клиет просит дабовить установку душевой кабины, перезвонить</p>
                                    </section>

                                    <h2>Закрытие заказов</h2>
                                    <section>
                                        <p>1. Закрыть заказ <a href="">№100023425</a>, заказ готов, осталось подписать документы.</p>
                                    </section>
                                </div>

                            </div>
                        </div>
                    </div>

            <div class="content-wrap">
                <div class="row">
                    <? echo $messeng_ads ?>
                    <div class="col-sm-3">
                        <div class="order" id="orderClose">
                            <div class="headline ">
                                <h3>
                                    <span>
                                        <i class="icon icon-home"></i>&#160;&#160;Заказы за месяц</span>
                                </h3>
                                <div class="titleClose">
                                    <a href="#orderClose" class="gone">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="value">
                                <span><i class="icon icon-home"></i>
                                </span><? echo $orders_mothers ?>

                            </div>

                            <div class="progress-tinny">
                                <div style="width: 10%" class="bar"></div>
                            </div>
                            <div class="profit-line">
                                <i class="<? echo $fa_caret ?>"></i>&#160;&#160;Разница с прошлым месяцем: <? echo $orders_m_procent ?>%</div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class=" member" id="memberClose">
                            <div class="headline ">
                                <h3>
                                    <span>
                                        <i class="fa fa-truck"></i>
                                        &#160;&#160;Всего заказов
                                    </span>
                                </h3>
                                <div class="titleClose">
                                    <a href="#memberClose" class="gone">
                                        <span class="entypo-cancel"></span>
                                    </a>
                                </div>
                            </div>
                            <div class="value">
                                <span><i class="maki-warehouse"></i>
                                </span><? echo $all_orders ?>
                            </div>
                            <div class="progress-tinny">
                                <div style="width: 50%" class="bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="content-wrap">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="chart-wrap" style="min-height: 1px;padding: 28px 20px 20px;">
                            <div class="chart-dash">
                                <div id="placeholder" style="width:100%;height:200px;"></div>
                            </div>
                        </div>
                    </div>
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
    </div>

    <? include ("assets/RIGHT-SLIDER-CONTENT.php");?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.js"></script>
    <script src="assets/js/progress-bar/src/jquery.velocity.min.js"></script>
    <script src="assets/js/progress-bar/number-pb.js"></script>
    <script src="assets/js/progress-bar/progress-app.js"></script>
    <script type="text/javascript" src="assets/js/preloader.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/app.js"></script>
    <script type="text/javascript" src="assets/js/load.js"></script>
    <script type="text/javascript" src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/chart/jquery.flot.js"></script>
    <script type="text/javascript" src="assets/js/chart/jquery.flot.resize.js"></script>
    <script type="text/javascript" src="assets/js/chart/realTime.js"></script>
    <script type="text/javascript" src="assets/js/speed/canvasgauge-coustom.js"></script>
    <script type="text/javascript" src="assets/js/countdown/jquery.countdown.js"></script>
    <script src="assets/js/wizard/lib/jquery.cookie-1.3.1.js"></script>
    <script src="assets/js/wizard/build/jquery.steps.js"></script>
    <script type="text/javascript" src="assets/js/wizard/jquery.stepy.js"></script>
    <script type="text/javascript" src="assets/js/toggle_close.js"></script>
    <script src="assets/js/footable/js/footable.js?v=2-0-1" type="text/javascript"></script>
    <script src="assets/js/jhere-custom.js"></script>

    <script>
    $(function() {
        $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft"
        });

        $("#wizard_vertical").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical"
        });

        $("#wizard-tab").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "none",
            enableFinishButton: false,
            enablePagination: false,
            enableAllSteps: true,
            titleTemplate: "#title#",
            cssClass: "tabcontrol"
        });

        //stepy
        $('#transition-duration-demo').stepy({
            duration: 400,
            transition: 'fade'
        });

    });
    </script>

    <script>
    var gauge4 = new Gauge("canvas4", {
        'mode': 'needle',
        'range': {
            'min': 0,
            'max': 90
        }
    });
    gauge4.draw(Math.floor(Math.random() * 90));
    var run = setInterval(function() {
        gauge4.draw(Math.floor(Math.random() * 90));
    }, 3500);
    </script>

    <script type="text/javascript">
    var output, started, duration, desired;

    // Constants
    duration = 5000;
    desired = '50';

    // Initial setup
    output = $('#speed');
    started = new Date().getTime();

    // Animate!
    animationTimer = setInterval(function() {
        // If the value is what we want, stop animating
        // or if the duration has been exceeded, stop animating
        if (output.text().trim() === desired || new Date().getTime() - started > duration) {
            console.log('animating');
            // Generate a random string to use for the next animation step
            output.text('' + Math.floor(Math.random() * 60)

            );

        } else {
            console.log('animating');
            // Generate a random string to use for the next animation step
            output.text('' + Math.floor(Math.random() * 120)

            );
        }
    }, 5000);
    </script>
    <script type="text/javascript">
    $('#getting-started').countdown('2020/01/01', function(event) {
        $(this).html(event.strftime(

            '<span>%M</span>' + '<span class="start-min">:</span>' + '<span class="start-min">%S</span>'));
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