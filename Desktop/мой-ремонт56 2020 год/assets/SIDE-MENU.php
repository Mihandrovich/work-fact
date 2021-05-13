<?
$server_1 = mysql_fetch_assoc(mysql_query("SELECT * FROM `server` WHERE `id`='1'"));
$server_2 = mysql_fetch_assoc(mysql_query("SELECT * FROM `server` WHERE `id`='2'"));
$server_3 = mysql_fetch_assoc(mysql_query("SELECT * FROM `server` WHERE `id`='3'"));
?>
    <!-- SIDE MENU -->
    <div id="skin-select">
        <div id="logo">
            <h1><? echo $name_panel ?>
                <span><? echo $version ?></span>
            </h1>
        </div>

        <a id="toggle">
            <span class="entypo-menu"></span>
        </a>
        <div class="dark">
            <form action="#">
                <span>
                    <input type="text" name="search" value="" class="search rounded id_search" placeholder="Поиск в меню..." autofocus />
                </span>
            </form>
        </div>

        <div class="search-hover">
            <form id="demo-2">
                <input type="search" placeholder="Поиск в меню..." class="id_search">
            </form>
        </div>

        <div class="skin-part">
            <div id="tree-wrap">
                <div class="side-bar">
                    <ul class="topnav menu-left-nest">
                        <li>
                            <a href="#" style="border-left:0px solid!important;" class="title-menu-left">

                                <span>Управление сайтом</span>
                                <i data-toggle="tooltip" class="entypo-cog pull-right config-wrap"></i>

                            </a>
                        </li>

<!--                        <li>
                            <a class="tooltip-tip ajax-load" href="#" title="Блог">
                                <i class="icon-document-edit"></i>
                                <span>Блог</span>

                            </a>
                            <ul>
                                <li>
                                    <a class="tooltip-tip2 ajax-load" href="#" title="Создать новую статью"><i class="entypo-doc-text"></i><span>Создать новую статью</span></a>
                                </li>
                                <li>
                                    <a class="tooltip-tip2 ajax-load" href="#" title="Управление блогом"><i class="entypo-newspaper"></i><span>Управление блогом</span></a>
                                </li>
                            </ul>
                        </li> -->
                        <li>
                            <a class="tooltip-tip ajax-load" href="#" title="Социальные сети">
                                <i class="icon-feed"></i>
                                <span>Социальные сети</span>

                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="photo-media.php" title="Галерея">
                                <i class="icon-camera"></i>
                                <span>Галерея</span>

                            </a>
                        </li>
                    </ul>
                    
                    <ul class="topnav menu-left-nest">
                        <li>
                            <a href="#" style="border-left:0px solid!important;" class="title-menu-left">

                                <span>Основное</span>
                                <i data-toggle="tooltip" class="entypo-cog pull-right config-wrap"></i>

                            </a>
                        </li>

                        <li>
                            <a class="tooltip-tip ajax-load" href="work-inco.php" title="Главная">
                                <i class="icon icon-home"></i>
                                <span>Главная</span>

                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="#" title="Заказы">
                                <i class="fontawesome-briefcase"></i>
                                <span>Заказы</span>

                            </a>
                            <ul>
                                <li>
                                    <a class="tooltip-tip2 ajax-load" href="work-newwork.php" title="Создать новый заказ"><i class="entypo-plus-circled"></i><span>Создать новый заказ</span></a>
                                </li>
                                <li>
                                    <a class="tooltip-tip2 ajax-load" href="work-worklist.php" title="Список заказов"><i class="icon icon-view-list-large"></i><span>Список заказов</span></a>
                                </li>
                                <li>
                                    <a class="tooltip-tip2 ajax-load" href="#" title="Закрытые заказы"><i class="entypo-archive"></i><span>Закрытые заказы</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="#" title="Список сотрудников">
                                <i class="entypo-users"></i>
                                <span>Список сотрудников</span>

                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="#" title="Добавить сотрудника">
                                <i class="entypo-user-add"></i>
                                <span>Добавить сотрудника</span>

                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="#" title="Телефонная книга">
                                <i class="icon icon-mobile-portrait"></i>
                                <span>Телефонная книга</span>

                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="#" title="Расход материалов">
                                <i class="fontawesome-tasks"></i>
                                <span>Расход материалов</span>

                            </a>
                        </li>
                    </ul>
                    
                    <ul class="topnav menu-left-nest">
                        <li>
                            <a href="#" style="border-left:0px solid!important;" class="title-menu-left">

                                <span>Прочее</span>
                                <i data-toggle="tooltip" class="entypo-cog pull-right config-wrap"></i>

                            </a>
                        </li>
                        <li>
                            <a class="tooltip-tip ajax-load" href="exit.php" title="Выход">
                                <i class="entypo-cancel-circled"></i>
                                <span>Выход</span>

                            </a>
                        </li>
                    </ul>
                    <!--<div class="side-dash">
                        <h3>
                            <span>Статистика</span>
                        </h3>
                        <ul class="side-bar-list">
                            <li>Общий трафик
                                <div class="linebar"><?echo $server_1[day1]?>,<?echo $server_1[day2]?>,<?echo $server_1[day3]?>,<?echo $server_1[day4]?>,<?echo $server_1[day5]?>,<?echo $server_1[day6]?>,<?echo $server_1[day7]?></div>
                            </li>
                            <li>Заявки
                                <div class="linebar2"><?echo $server_2[day1]?>,<?echo $server_2[day2]?>,<?echo $server_2[day3]?>,<?echo $server_2[day4]?>,<?echo $server_2[day5]?>,<?echo $server_2[day6]?>,<?echo $server_2[day7]?></div>
                            </li>
                            <li>Заказы
                                <div class="linebar3"><?echo $server_3[day1]?>,<?echo $server_3[day2]?>,<?echo $server_3[day3]?>,<?echo $server_3[day4]?>,<?echo $server_3[day5]?>,<?echo $server_3[day6]?>,<?echo $server_3[day7]?></div>
                            </li>
                        </ul>
                        <h3>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- END OF SIDE MENU -->