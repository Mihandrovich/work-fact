<? include "../dist/config/config_db.php";
$error_text = '<div class="card card-success"><div class="card-header"><h3 class="card-title"><center>Если после регистрации у вас не появился этот значок --> <i class="nav-icon fas fa-briefcase"></i> <--, то пишите нам на почту! <a href="mailto:info@academy-mi.ru">info@academy-mi.ru</a></center></h3></div></div>';
$error = $_GET[error];
if($error == 5935){
$error_text = '<div class="card card-danger"><div class="card-header"><h3 class="card-title"><center>Упс, регистрация в данный момент закрыта, ожидайте набор в аккадемию</center></h3></div></div>';
}
if($error == 100){
$error_text = '<div class="card card-danger"><div class="card-header"><h3 class="card-title"><center>Упс, видимо одно из полей оказалось пустым</center></h3></div></div>';
}
if($error == 6466){
$error_text = '<div class="card card-danger"><div class="card-header"><h3 class="card-title"><center>Вы подозреваетесь в попытке взлома сайта!</center></h3></div></div>';
}
if($error == 120){
$error_text = '<div class="card card-danger"><div class="card-header"><h3 class="card-title"><center>Упс, пароли не совпадают</center></h3></div></div>';
}
if($error == 995){
$error_text = '<div class="card card-danger"><div class="card-header"><h3 class="card-title"><center>Аккаунт с данной почтой уже есть в нашей системе!</center></h3></div></div>';
}
if($uid){
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}
$error_text = $error_text."<br>";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?echo $server_data[sitename];?> - Регистрация</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="/index.php"><b><?echo $server_data[sitename];?></b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Регистрация нового пользователя</p>
        <?echo $error_text;?>

      <form action="register-fun.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" required name="email" placeholder="Почта">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" required name="code" placeholder="Кодовое слово из видео или от друга">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required name="password1" placeholder="Пароль">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required name="password2" placeholder="Повторите пароль">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" required name="terms" value="agree">
              <label for="agreeTerms">
               Я соглашаюсь с <a href="https://vk.com/@mi_prod-pravila-dlya-ispolnitelei">лицензионным соглашением</a>.
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Далее</button>
          </div>
        </div>
      </form>
        <hr />
      <a href="login.php" class="text-center">У меня есть аккаунт</a>
    </div>
  </div>
</div>
</body>
</html>
