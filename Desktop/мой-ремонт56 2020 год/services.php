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
                    <li class="nav-item active"><a href="index.php" class="nav-link">Главная</a></li>
                    <li class="nav-item"><a href="worklist.php" class="nav-link">Наши работы</a></li>
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
  
    <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-end">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Главная <i class="ion-ios-arrow-forward"></i></a></span> <span>Наши услуги <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Услуги</h1>
          </div>
        </div>
      </div>
    </section>
   	
    <section class="ftco-section">
    	<div class="container-fluid px-md-5">
        <div class="row">
        	<div class="col-lg-3 col-sm-6">
        		<div class="block-2 ftco-animate">
	            <div class="flipper">
	              <div class="front" style="background-image: url(images/painter-2751666_1920.jpg);">
	                <div class="box">
	                  <h2>Ремонт</h2>
	                </div>
	              </div>
	              <div class="back">
	                <blockquote>
	                  <p>Вы доверяете свою квартиру профессионалам ремонтного дела, которые справятся с любой задачей в короткие сроки.
                      Работаем по договору. В договоре описаны все условия и гарантии на ремонт. Приступаем к ремонту квартиры после подписания договора. </p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image align-self-center">
	                    <img src="images/painter-2751666_1920.jpg" alt="">
	                  </div>
	                  <div class="name align-self-center ml-3">Ремонт<span class="position">89033927436</span></div>
	                </div>
	              </div>
	            </div>
	          </div>
        	</div>
        	<div class="col-lg-3 col-sm-6">
        		<div class="block-2 ftco-animate">
	            <div class="flipper">
	              <div class="front" style="background-image: url(images/f77a58775947fd50daed71b00ceaaecd.jpg);">
	                <div class="box">
	                  <h2>Строительство</h2>
	                </div>
	              </div>
	              <div class="back">
	                <blockquote>
	                  <p>Мы гарантируем быстрое выполнение работ, честный расчет сметы без непредвиденных дополнительных расходов, долговечность построенных, отремонтированных объектов.</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image align-self-center">
	                    <img src="images/f77a58775947fd50daed71b00ceaaecd.jpg" alt="">
	                  </div>
	                  <div class="name align-self-center ml-3">Строительство<span class="position">89033927436</span></div>
	                </div>
	              </div>
	            </div>
	          </div>
        	</div>
        	<div class="col-lg-3 col-sm-6">
        		<div class="block-2 ftco-animate">
	            <div class="flipper">
	              <div class="front" style="background-image: url(images/0001.jpg);">
	                <div class="box">
	                  <h2>Сварщик</h2>
	                  <p>Работаем более 10 лет</p>
	                </div>
	              </div>
	              <div class="back">
	                <blockquote>
	                  <p>В год выполнено более 1500 объектов!!! Любые сварочные работы - мелко срочные, разовые, оптовые, несколько объектов нам по плечу!</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image align-self-center">
	                    <img src="images/0001.jpg" alt="">
	                  </div>
	                  <div class="name align-self-center ml-3">Сварщик<span class="position">89033927436</span></div>
	                </div>
	              </div>
	            </div>
	          </div>
        	</div>
        </div>
    	</div>
    </section>

    <footer class="footer">
			<div class="container-fluid px-lg-5">
				<div class="row">
					<div class="col-md-9 py-5">
						<div class="row">
							<div class="col-md-4 mb-md-0 mb-4">
								<h2 class="footer-heading">Одна из лучших компаний</h2>
								<p>Ежедневный контроль процесса ремонта в вашей квартире не заставит Вас беспокоиться о качестве и сроках работ. Вы можете в любой момент без предупреждения приехать в свою квартиру для проверки работ.</p>
								<ul class="ftco-footer-social p-0">
									<li class="ftco-animate"><a href="https://vk.com/remstroyoren" data-toggle="tooltip" data-placement="top" title="VK"><span class="ion-logo-vk"></span></a></li>
		              				<li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="odnoklassniki"><span class="fa fa-odnoklassniki"></span></a></li>
		              				<li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><span class="ion-logo-instagram"></span></a></li>
		              				<li class="ftco-animate"><a href="mailto:blaaleksandr@gmail.com?subject=ЗАКАЗ" data-toggle="tooltip" data-placement="top" title="envelope"><span class="fa fa-envelope"></span></a></li>
		              				<li class="ftco-animate"><a href="tel:89033927436" data-toggle="tooltip" data-placement="top" title="phone"><span class="fa fa-phone"></span></a></li>
		              				<li class="ftco-animate"><a href="#" data-toggle="tooltip" data-placement="top" title="youtube"><span class="fa fa-youtube"></span></a></li>
		            			</ul>
							</div>
							<div class="col-md-8">
								<div class="row justify-content-center">
									<div class="col-md-12 col-lg-10">
										<div class="row">
											<div class="col-md-4 mb-md-0 mb-4">
												<h2 class="footer-heading">Сайт:</h2>
												<ul class="list-unstyled">
						              <li><a href="worklist.php" class="py-1 d-block">Наши работы</a></li>
						              <li><a href="services.php" class="py-1 d-block">Услуги</a></li>
						              <li><a href="check.php" class="py-1 d-block">Проверить заказ</a></li>
						            </ul>
											</div>

											<div class="col-md-4 mb-md-0 mb-4">
												<h2 class="footer-heading">Контакты:</h2>
												<ul class="list-unstyled">
						              <li><a href="tel:89033927436" class="py-1 d-block">+7 903 392-74-36</a></li>
						              <li><a href="mailto:blaaleksandr@gmail.com?subject=ЗАКАЗ" class="py-1 d-block">blaaleksandr@gmail.com</a></li>
									  <li><a href="contact.php" class="py-1 d-block">Карта</a></li>
						            </ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mt-md-5">
							<div class="col-md-12">
								<p class="copyright">
					  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Все права защищены | Сайт сделан в <a href="https://vk.com/saevil_31" target="_blank">M.I</a>
					  </p>
							</div>
						</div>
					</div>
					<div class="col-md-3 py-md-5 py-4 aside-stretch-right pl-lg-5">
						<h2 class="footer-heading">Оставь заявку прямо сейчас!</h2>
						<form action="mail-form.php" method="post" class="contact-form">
              <div class="form-group">
                <input type="text" class="form-control" name="uname" required placeholder="Ваше имя">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="uemail" required placeholder="Ваш Email">
              </div>
              <div class="form-group">
                <input type="phone" class="form-control" name="utel" required placeholder="Номер телефона">
              </div>              
              <div class="form-group">
                <input type="text" class="form-control" name="usubject" required placeholder="Тема">
              </div>
              <div class="form-group">
                <textarea id="" cols="30" rows="3" class="form-control" name="utext" placeholder="Сообщение"></textarea>
              </div>
              <div class="form-group">
              	<button type="submit" class="form-control submit px-3">Отправить</button>
              </div>
              <p class="copyright">
					  Нажимая кнопку, вы соглашаетесь с федеральным законом "О персональных данных" от 27.07.2006 N 152-ФЗ.
			    </p>
            </form>
					</div>
				</div>
			</div>
		</footer>
    
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