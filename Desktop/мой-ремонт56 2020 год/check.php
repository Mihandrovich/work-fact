<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Проверка заказа</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
    <link rel='icon' type='image/png' href='/favicon.ico'/>
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="cssav/util.css">
	<link rel="stylesheet" type="text/css" href="cssav/main.css">
	<meta http-equiv='content-type' content='text/html; charset=UTF-8'/>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js'></script>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="check-doc-autoriz.php" method="post">
					<span class="login100-form-title p-b-26">
						Проверь заказ
					</span>
					<span class="login100-form-title p-b-48">
						<i style="font-style: normal;">M.I</i>
					</span>
					<center><div class="wrap-input100 " >
						<input class="input100" type="phone" name="phone">
						<span class="focus-input100" data-placeholder="Номер телефона"></span>
					</div></center>

					<div class="wrap-input100 ">
						<input class="input100" type="login" name="login">
						<span class="focus-input100" data-placeholder="Номер заказа"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit">
								Проверить
							</button>
						</div>
					</div> 
		<script language="javascript">
            $(function($) {
               $('input[name="phone"]').mask("+7 (999) 999-99-99");
            });
        </script>
					<div class="text-center p-t-115">
						<span class="txt1">
							Еще не обращались?
						</span>

						<a class="txt2" href="tel:89033927436">
							Позвонить
						</a>
					</div>
					<div class="text-center p-t-115" style="padding-top:5px">
						<a class="txt2" href="/index.php">
							Главная страница
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
</html>