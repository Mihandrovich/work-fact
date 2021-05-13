<?include ('assets/DATA-ind.php');?>
<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>РемонтноСтроительноеОбщество</title>
	<link rel='icon' type='image/png' href='/favicon.ico'/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css?t=<?php echo(microtime(true).rand()); ?>">
    <link rel="stylesheet" href="css/icomoon.css?t=<?php echo(microtime(true).rand()); ?>">
    <link rel="stylesheet" href="css/style.css?t=<?php echo(microtime(true).rand()); ?>">
  </head>
  <body>
    <?
function isMobile() {
    return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}
if(isMobile()){
?>
      <div class="container pt-5">
        <div class="row justify-content-between" style="padding-left: 0px;padding-right: 0px;">
          <div class="col" style="height:<?if(isMobile()){?>55px<?}?>;padding-left: 0px;">
            <a class="navbar-brand" href="index.php">
              <?
					    if(isMobile()){
                            ?><img src="images/stroyka-06.png" style="margin-top: -7%;max-width: 90%;height: auto;"></a>
            <?
                        }
					    ?>
          </div>
          <div class="col-5 d-flex justify-content-end" <?if(isMobile()){?>
            <?}else{?>style="padding-top: 30px;"
              <?}?>>
                <div class="social-media">
                  <p class="mb-0 d-flex">
                    <a href="https://vk.com/remstroyoren" class="d-flex align-items-center justify-content-center" style="background: #e6e6e6; border: 0px solid #e6e6e6;"><img src="images/head/1486147202-social-media-circled-network10_79475.png" width="40px"></a>
                    <a href="#" class="d-flex align-items-center justify-content-center" style="background: #e6e6e6; border: 0px solid #e6e6e6;"><img src="images/head/1490889687-whats-app_82529.png" width="40px"></a>
                    <a href="mailto:blaaleksandr@gmail.com?subject=ЗАКАЗ" class="d-flex align-items-center justify-content-center" style="background: #e6e6e6; border: 0px solid #e6e6e6;"><img src="images/head/1486147177-social-media-circled-network07_79457.png" width="40px"></a>
                    <a href="tel:89033927436" class="d-flex align-items-center justify-content-center" style="background: #ffdd00;"><span class="fa fa-phone"><i class="sr-only">Phone</i></span></a>
                  </p>
                </div>
          </div>
        </div>
      </div>
      <?}?>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
          <div class="container">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="fa fa-bars"></span> Меню
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
              <?if(isMobile()){}else{?>
                <ul class="navbar-nav mr-auto" style="margin-right: 30px!important;">
                  <li>
                    <a href="index.php">
                      <img src="images/stroyka-07.png" height="60px">
                    </a>
                  </li>
                </ul>
                <?}?>
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a href="index.php" class="nav-link">Главная</a></li>
                    <li class="nav-item active"><a href="worklist.php" class="nav-link">Наши работы</a></li>
                    <li class="nav-item"><a href="contact.php" class="nav-link">Контакты</a></li>
                    <li class="nav-item"><a href="check.php" class="nav-link">Проверить заказ</a></li>
                  </ul>
                  <div class="header_numbers">
                    <div class="header_numbers__tel">
                      <a href="tel:89033927436" class="header_link js-uis-phone">+7 903 392 74-36</a>
                    </div>
                  </div>
            </div>
          </div>
          <?if(isMobile()){}else{?>
            <div class="social-media" style="padding-right: 20px;">
              <p class="mb-0 d-flex">
                <a href="https://vk.com/remstroyoren" class="d-flex align-items-center justify-content-center" style="background: #e6e6e6; border: 1px solid #e6e6e6;"><img src="images/head/1486147202-social-media-circled-network10_79475.png" width="40px"></a>
                <a href="#" class="d-flex align-items-center justify-content-center" style="background: #e6e6e6; border: 0px solid #e6e6e6;"><img src="images/head/1490889687-whats-app_82529.png" width="40px"></a>
                <a href="mailto:blaaleksandr@gmail.com?subject=ЗАКАЗ" class="d-flex align-items-center justify-content-center" style="background: #e6e6e6; border: 0px solid #e6e6e6;"><img src="images/head/1486147177-social-media-circled-network07_79457.png" width="40px"></a>
                <a href="tel:89033927436" class="d-flex align-items-center justify-content-center" style="background: #ffdd00;"><span class="fa fa-phone"><i class="sr-only">Phone</i></span></a>
              </p>
            </div>
            <?}?>
        </nav>

    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/dbBDWKMx.jpg');" data-stellar-background-ratio="0.2">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Главная <i class="ion-ios-arrow-forward"></i></a></span> <span>Наши работы <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Наши работы</h1>
          </div>
        </div>
      </div>
    </section>
   	

    <section class="ftco-counter" id="section-counter">
    	<div class="container">
				<div class="row">
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 d-flex">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="20">0</strong>
              </div>
              <div class="text-2">
              	<span>Лет работы<br>специалистов</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 d-flex">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="<?php echo $work_num; ?>">">0</strong>
              </div>
              <div class="text-2">
              	<span>Завершено <br>проектов</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 d-flex">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="75">0</strong>
              </div>
              <div class="text-2">
              	<span>специалистов <br>своего дела</span>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
            <div class="block-18 d-flex">
              <div class="text d-flex align-items-center">
                <strong class="number" data-number="50">0</strong>
              </div>
              <div class="text-2">
              	<span>единиц <br>оборудования</span>
              </div>
            </div>
          </div>
        </div>
    	</div>
    </section>
    
<!--    <section class="ftco-section ftco-no-pt ftco-no-pb">
		  <div class="container-fluid px-md-0">
        <div class="row no-gutters">
<!--
<div class="col-md-4">
    <iframe class="work" src="https://www.youtube.com/embed/nenmSA6K0gs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>        
</div>
-->
<?
//$q = mysql_query("SELECT * FROM `photo` ORDER BY id DESC");
//While($w = mysql_fetch_assoc($q)){
?>
<!--          <div class="col-md-4 ftco-animate">
            <div class="work img d-flex align-items-end" style="background-image: url(images/photo/<? //echo $w[url] ?>);">
            	<a href="images/photo/<? //echo $w[url] ?>" class="icon image-popup d-flex justify-content-center align-items-center">
	    					<span class="icon-expand"></span>
	    				</a>
            </div>
          </div>
<?
//}
?>
<!--
        </div>
      </div> 
		</section> -->

    <section class="ftco-section ftco-no-pt ftco-no-pb" style="padding-top: 2em !important;">
        <!--
          <div class="container">
            <div class="row d-flex no-gutters">
              <div class="col-md-6">
                <a href="images/about.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                  <img class="img-fluid" src="images/about.jpg" alt="...">
                </a>
                <div class="row">
                  <div class="container text-center">
                    <div class="row mx-auto my-auto">
                      <div id="myCarousel" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                          <div class="carousel-item py-5 active">
                            <div class="row">
                              <div class="col">
                                <a href="images/about.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/about.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/about.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/about.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/about.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/about.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/about.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/about.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/about.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/about.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/about.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/about.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <a class="carousel-control-prev text-dark" href="#myCarousel" role="button" data-slide="prev">
                          <span class="fa fa-chevron-left" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-dark" href="#myCarousel" role="button" data-slide="next">
                          <span class="fa fa-chevron-right" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-6 pl-md-5">
                <div class="row justify-content-start py-5">
                  <div class="col-md-12 heading-section ftco-animate">
                    <div style="color:black"><b>Адрес: пр. Победы 144</b></div>
                    <div><b>Виды работ: Покраска, выравнивание стен</b></div>
                    <div><b>Размер: 48м<sup>2</sup></b></div>
                    <div><b>Срок: 2 недели</b></div>
                    <div><b>Стоимость: 30.000 ₽</b></div>

                    <div class="tabulation-2 mt-4">
                      <ul class="nav nav-pills nav-fill d-md-flex d-block">
                        <li class="nav-item mb-md-0 mb-2">
                          <a class="nav-link active py-2" data-toggle="tab" href="#home1">Контроль качества</a>
                        </li>
                        <li class="nav-item px-lg-2 mb-md-0 mb-2">
                          <a class="nav-link py-2" data-toggle="tab" href="#home2">Дворовая территория</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link py-2 mb-md-0 mb-2" data-toggle="tab" href="#home3">Индивидуальный проект</a>
                        </li>
                      </ul>
                      <div class="tab-content bg-light rounded mt-2">
                        <div class="tab-pane container p-0 active" id="home1">
                          <p>За кажущейся простотой выполнения штукатурки стен скрывается трудоемкий и скрупулезный процесс, требующий специальных знаний и владения конкретными навыками. Мастера, работающие в бригаде ООО «РемонтноСтроительеОбщество» на протяжении многих лет, соблюдают все правила обработки поверхностей и этапы приготовления наиболее подходящих составов. Их опытность и наработанные техники, а также привлечение современного оборудования для штукатурки позволяют им доводить до совершенства разнообразные поверхности в кратчайшие сроки, не задерживая комплексного хода ремонта.</p>
                        </div>
                        <div class="tab-pane container p-0 fade" id="home2">
                          <p>Собственный дом представляет собой законченную композицию в том случае, если это не просто дом и придомовая территория при нем, а совокупность оригинальных идей дизайнера и современных технологий. Такой союз поможет превратить садовый участок с домом в ухоженный и уютный природный уголок. Садовые дорожки являются основным дизайнерским элементом, который, кроме эстетической составляющей, несет еще и функциональную нагрузку.</p>
                        </div>
                        <div class="tab-pane container p-0 fade" id="home3">
                          <p>Мы соблюдем все требования заказчика – рассчитаем и возведем дом, который подходит именно Вашей семье и продумаем пространство до мелочей. Архитектор и дизайнер помогут воплотить в жизнь любые идеи.
                            <br /> Надежное строительство на долгие годы: наши мастера опираются на «Технический регламент безопасности зданий и сооружений» и соблюдают все требования, изложенные в «Строительных нормах и правилах» (СНиП). Одна компания для решения всех задач – от заливки фундамента до крепления натяжных потолков. Не придется искать нескольких мастеров и составлять график работ. Один подрядчик, один счет и один договор – минимум усилий для получения результата.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        -->
          
          <div class="container">
            <div class="row d-flex no-gutters">
              <div class="col-md-6">
                <iframe class="icon image-popup d-flex justify-content-center align-items-center img-fluid" style="min-height:12em;width:100%;" src="https://www.youtube.com/embed/X4ORGPzEAzQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="row">
                  <div class="container text-center">
                    <div class="row mx-auto my-auto">
                      <div id="myCarousel-1" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                          <div class="carousel-item py-5 active">
                            <div class="row">
                              <div class="col">
                                <a href="images/pos-9-yanvarya/untitleddesign_2_original-1.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/pos-9-yanvarya/untitleddesign_2_original-1.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/pos-9-yanvarya/untitleddesign_2_original-2.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/pos-9-yanvarya/untitleddesign_2_original-2.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/pos-9-yanvarya/untitleddesign_2_original-3.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/pos-9-yanvarya/untitleddesign_2_original-3.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/pos-9-yanvarya/untitleddesign_2_original.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/pos-9-yanvarya/untitleddesign_2_original.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/pos-9-yanvarya/untitleddesign_2_original-4.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/pos-9-yanvarya/untitleddesign_2_original-4.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/pos-9-yanvarya/untitleddesign_2_original-5.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/pos-9-yanvarya/untitleddesign_2_original-5.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/pos-9-yanvarya/untitleddesign_2_original-6.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/pos-9-yanvarya/untitleddesign_2_original-6.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/pos-9-yanvarya/untitleddesign_2_original-7.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/pos-9-yanvarya/untitleddesign_2_original-7.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/pos-9-yanvarya/untitleddesign_2_original-8.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/pos-9-yanvarya/untitleddesign_2_original-8.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/pos-9-yanvarya/untitleddesign_2_original-9.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/pos-9-yanvarya/untitleddesign_2_original-9.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/pos-9-yanvarya/untitleddesign_2_original-10.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/pos-9-yanvarya/untitleddesign_2_original-10.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/pos-9-yanvarya/untitleddesign_2_original-12.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/pos-9-yanvarya/untitleddesign_2_original-12.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <a class="carousel-control-prev text-dark" href="#myCarousel-1" role="button" data-slide="prev">
                          <span class="fa fa-chevron-left" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-dark" href="#myCarousel-1" role="button" data-slide="next">
                          <span class="fa fa-chevron-right" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-6 pl-md-5">
                <div class="row justify-content-start py-5">
                  <div class="col-md-12 heading-section ftco-animate">
                    <div style="color:black"><b>Адрес: пос. 9 января</b></div>
                    <div><b>Виды работ: Капитальный ремонт (под ключ)</b></div>
                    <div><b>Размер: 210м<sup>2</sup></b></div>
                    <div><b>Срок: 4 месяца</b></div>
                    <div><b>Стоимость: 1.575.000 ₽</b></div>
                  </div>
                </div>
              </div>
            </div>
          </div>        
          
          <hr />
          
          <div class="container">
            <div class="row d-flex no-gutters">
              <div class="col-md-6">
                <iframe class="icon image-popup d-flex justify-content-center align-items-center img-fluid" style="min-height:12em;width:100%;" src="https://www.youtube.com/embed/rFSu5_MJlvw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              <div class="col-md-6 pl-md-5">
                <div class="row justify-content-start py-5">
                  <div class="col-md-12 heading-section ftco-animate">
                    <div style="color:black"><b>Адрес: Ноябрьская 47</b></div>
                    <div><b>Виды работ: Капитальный ремонт (под ключ)</b></div>
                    <div><b>Размер: 50м<sup>2</sup></b></div>
                    <div><b>Срок: 2 месяца</b></div>
                    <div><b>Стоимость: 250.000 ₽</b></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <hr />
          
          <div class="container">
            <div class="row d-flex no-gutters">
              <div class="col-md-6">
                <iframe class="icon image-popup d-flex justify-content-center align-items-center img-fluid" style="min-height:12em;width:100%;" src="https://www.youtube.com/embed/B2Y1yqpf8mc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="row">
                  <div class="container text-center">
                    <div class="row mx-auto my-auto">
                      <div id="myCarousel-3" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                          <div class="carousel-item py-5 active">
                            <div class="row">
                              <div class="col">
                                <a href="images/prostornaya-21/untitleddesign_1_original-28.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/prostornaya-21/untitleddesign_1_original-28.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/prostornaya-21/untitleddesign_1_original-10.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/prostornaya-21/untitleddesign_1_original-10.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/prostornaya-21/untitleddesign_1_original-11.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/prostornaya-21/untitleddesign_1_original-11.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/prostornaya-21/untitleddesign_1_original-14.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/prostornaya-21/untitleddesign_1_original-14.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/prostornaya-21/untitleddesign_1_original-15.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/prostornaya-21/untitleddesign_1_original-15.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/prostornaya-21/untitleddesign_1_original-16.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/prostornaya-21/untitleddesign_1_original-16.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/prostornaya-21/untitleddesign_1_original-19.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/prostornaya-21/untitleddesign_1_original-19.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/prostornaya-21/untitleddesign_1_original-20.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/prostornaya-21/untitleddesign_1_original-20.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/prostornaya-21/untitleddesign_1_original-25.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/prostornaya-21/untitleddesign_1_original-25.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/prostornaya-21/untitleddesign_1_original-29.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/prostornaya-21/untitleddesign_1_original-29.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/prostornaya-21/untitleddesign_1_original-8.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/prostornaya-21/untitleddesign_1_original-8.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/prostornaya-21/untitleddesign_1_original-9.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/prostornaya-21/untitleddesign_1_original-9.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <a class="carousel-control-prev text-dark" href="#myCarousel-3" role="button" data-slide="prev">
                          <span class="fa fa-chevron-left" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-dark" href="#myCarousel-3" role="button" data-slide="next">
                          <span class="fa fa-chevron-right" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-6 pl-md-5">
                <div class="row justify-content-start py-5">
                  <div class="col-md-12 heading-section ftco-animate">
                    <div style="color:black"><b>Адрес: Просторная 21</b></div>
                    <div><b>Виды работ: Капитальный ремонт (под ключ)</b></div>
                    <div><b>Размер: 78м<sup>2</sup></b></div>
                    <div><b>Срок: 3 месяца</b></div>
                    <div><b>Стоимость: 624.000 ₽</b></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <hr />
          
          <div class="container">
            <div class="row d-flex no-gutters">
              <div class="col-md-6">
                <iframe class="icon image-popup d-flex justify-content-center align-items-center img-fluid" style="min-height:12em;width:100%;" src="https://www.youtube.com/embed/fOgSKj7ja9g" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="row">
                  <div class="container text-center">
                    <div class="row mx-auto my-auto">
                      <div id="myCarousel-4" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                          <div class="carousel-item py-5 active">
                            <div class="row">
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-16.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-16.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-10.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-10.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-12.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-12.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-13.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-13.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-15.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-15.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-21.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-21.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-14.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-14.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-17.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-17.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-18.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-18.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-19.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-19.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-20.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-20.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-22.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-22.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-24.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-24.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-25.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-25.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-26.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-26.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-27.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-27.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-29.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-29.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-30.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-30.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-31.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-31.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-32.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-32.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-35.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-35.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-38.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-38.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-39.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-39.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-40.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-40.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-8.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-8.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-9.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-9.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/salmysh-58/untitleddesign_1_original-16.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/salmysh-58/untitleddesign_1_original-16.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <a class="carousel-control-prev text-dark" href="#myCarousel-4" role="button" data-slide="prev">
                          <span class="fa fa-chevron-left" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-dark" href="#myCarousel-4" role="button" data-slide="next">
                          <span class="fa fa-chevron-right" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-6 pl-md-5">
                <div class="row justify-content-start py-5">
                  <div class="col-md-12 heading-section ftco-animate">
                    <div style="color:black"><b>Адрес: Салмышская 58</b></div>
                    <div><b>Виды работ: Капитальный ремонт (под ключ)</b></div>
                    <div><b>Размер: 85м<sup>2</sup></b></div>
                    <div><b>Срок: 4.5 месяца</b></div>
                    <div><b>Стоимость: 670.000 ₽</b></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <hr />
          
          <div class="container">
            <div class="row d-flex no-gutters">
              <div class="col-md-6">
                <iframe class="icon image-popup d-flex justify-content-center align-items-center img-fluid" style="min-height:12em;width:100%;" src="https://www.youtube.com/embed/mKfp8P6w9R4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <div class="row">
                  <div class="container text-center">
                    <div class="row mx-auto my-auto">
                      <div id="myCarousel-5" class="carousel slide w-100" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                          <div class="carousel-item py-5 active">
                            <div class="row">
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-14.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-14.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-10.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-10.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-13.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-13.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-15.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-15.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-16.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-16.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-17.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-17.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-18.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-18.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-20.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-20.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-22.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-22.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-24.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-24.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-25.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-25.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-26.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-26.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-27.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-27.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-28.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-28.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-31.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-31.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                          <div class="carousel-item py-5">
                            <div class="row">
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-34.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-34.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-35.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-35.jpg" alt="...">
                                </a>
                              </div>
                              <div class="col">
                                <a href="images/zarechye/untitleddesign_1_original-9.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
                                  <img class="img-fluid" src="images/zarechye/untitleddesign_1_original-9.jpg" alt="...">
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <a class="carousel-control-prev text-dark" href="#myCarousel-5" role="button" data-slide="prev">
                          <span class="fa fa-chevron-left" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next text-dark" href="#myCarousel-5" role="button" data-slide="next">
                          <span class="fa fa-chevron-right" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="col-md-6 pl-md-5">
                <div class="row justify-content-start py-5">
                  <div class="col-md-12 heading-section ftco-animate">
                    <div style="color:black"><b>Адрес: Заречье</b></div>
                    <div><b>Виды работ: Капитальный ремонт (под ключ)</b></div>
                    <div><b>Размер: 175м<sup>2</sup></b></div>
                    <div><b>Срок: 4 месяца</b></div>
                    <div><b>Стоимость: 1.300.000 ₽</b></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section style="padding-botton: 25px!important;">

<?include ('assets/footer.php');?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>