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
                    <li class="nav-item"><a href="worklist.php" class="nav-link">Наши работы</a></li>
                    <li class="nav-item active"><a href="contact.php" class="nav-link">Контакты</a></li>
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
          	<p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.php">Главная <i class="ion-ios-arrow-forward"></i></a></span> <span>Контакты <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread">Наши контакты</h1>
          </div>
        </div>
      </div>
    </section>
   	
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
					<div class="col-md-12">
						<div class="wrapper">
							<div class="row no-gutters mb-5">
								<div class="col-md-7">
									<div class="contact-wrap w-100 p-md-5 p-4">
										<h3 class="mb-4">Свяжитесь с нами</h3>
										<div id="form-message-warning" class="mb-4"></div> 
					      		<div id="form-message-success" class="mb-4">
					            Оставьте заявку прямо сейчас
					      		</div>
										<form action="mail-form.php" method="POST" id="contactForm" name="contactForm" class="contactForm">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="label" for="name">Полное имя</label>
														<input type="text" class="form-control" name="uname" required id="name" placeholder="Имя">
													</div>
												</div>
												<div class="col-md-6"> 
													<div class="form-group">
														<label class="label" for="email">Email адрес</label>
														<input type="email" class="form-control" name="uemail" required id="email" placeholder="Email">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="tel">Номер телефона</label>
														<input type="text" class="form-control" name="utel" id="tel" required placeholder="Номер телефона">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="subject">Тема письма</label>
														<input type="text" class="form-control" name="usubject" id="subject" required placeholder="Тема">
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label class="label" for="#">Сообщение</label>
														<textarea name="utext" class="form-control" id="message" cols="30" rows="4"required placeholder="Сообщение"></textarea>
													</div>
												</div>
												              <p class="copyright">
					  Нажимая кнопку, вы соглашаетесь с федеральным законом "О персональных данных" от 27.07.2006 N 152-ФЗ.
			    </p>
												<div class="col-md-12">
													<div class="form-group">
														<input type="submit" value="Отправить" class="btn btn-primary">
														<div class="submitting"></div>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="col-md-5 d-flex align-items-stretch" style="background-image: url(images/contact.png?2);">
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="dbox w-100 text-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-map-marker"></span>
				        		</div>
				        		<div class="text">
					            <p><span>Адрес:</span> Россия, г. Оренбург</p>
					          </div>
				          </div>
								</div>
								<div class="col-md-3">
									<div class="dbox w-100 text-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-phone"></span>
				        		</div>
				        		<div class="text">
					            <p><span>Номер:</span> <a href="tel:89033927436">+7 903 392 74-36</a></p>
					          </div>
				          </div>
								</div>
								<div class="col-md-3">
									<div class="dbox w-100 text-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-paper-plane"></span>
				        		</div>
				        		<div class="text">
					            <p><span>Email:</span> <a href="mailto:blaaleksandr@gmail.com">blaaleksandr@gmail.com</a></p>
					          </div>
				          </div>
								</div>
								<div class="col-md-3">
									<div class="dbox w-100 text-center">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text">
					            <p><span>Сайт</span> <a href="мой-ремонт56.рф">мой-ремонт56.рф</a></p>
					          </div>
				          </div>
								</div>
							</div>
						</div>
					</div>
				</div>
    	</div>
    </section>

<?include ('assets/footer.php');?>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDu6WqGZIAcR_mvv_6L2a4iUDwI4xUp-Ug&callback=initMap"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>