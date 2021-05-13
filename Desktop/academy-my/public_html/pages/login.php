<? 
include "../dist/config/config_db.php";
$error = $_GET[error];
if($error == 100){
$error_text = '<div class="card card-danger"><div class="card-header"><h3 class="card-title"><center>Упс, видимо одно из полей оказалось пустым</center></h3></div></div>';
}
if($error == 130){
$error_text = '<div class="card card-danger"><div class="card-header"><h3 class="card-title"><center>Упс, проверьте почту и пароль</center></h3></div></div>';
}
if($error == 666){
$error_text = '<div class="card card-danger"><div class="card-header"><h3 class="card-title"><center>Have you tried to hack the site? Mde. Ban! I have already provided your details.</center></h3></div></div>';
}
if($uid){
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?echo $server_data[sitename];?> - Вход</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="register-logo">
    <a href="/index.php"><b><?echo $server_data[sitename];?></b></a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Войдите в свой аккаунт</p>
        <?echo $error_text;?>
      <form action="autoriz.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" required name="email" placeholder="Почта">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" required name="password" placeholder="Пароль">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
          </div>
          <div class="col-5">
            <button type="submit" class="btn btn-primary btn-block">Войти</button>
          </div>
        </div>
      </form>
      <p class="mb-1">
        <a href="forgot-password.php">Я не помню пароль</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Создать аккаунт</a>
      </p>
    </div>
  </div>
</div>

</body>
</html>
