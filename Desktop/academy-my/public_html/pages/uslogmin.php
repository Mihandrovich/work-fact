<? include "../dist/config/config_db.php";
$error = $_GET[error];

if($error == 100){
$error_text = '<div class="card card-danger"><div class="card-header"><h3 class="card-title"><center>Упс, видимо одно из полей оказалось пустым</center></h3></div></div>';
}
if($error == 590){
$error_text = '<div class="card card-danger"><div class="card-header"><h3 class="card-title"><center>Упс, проверьте пароль, БАН выдам!</center></h3></div></div>';
}
if($user[access] < 1){
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}
if($adminid > 0){
    ?>
    <meta http-equiv="Refresh" content="0; URL=user/panel.php">
    <?    
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?echo $server_data[sitename];?> - Супер USER</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition lockscreen">
<div class="lockscreen-wrapper">
  <div class="register-logo">
    <a href="/index.php"><b><?echo $server_data[sitename];?></b></a>
  </div>
  <div class="lockscreen-name"><?echo $user[email];?></div>

  <div class="lockscreen-item">
    <div class="lockscreen-image">
      <img src="../dist/img/us.png" alt="User Image">
    </div>

    <form class="lockscreen-credentials" action="user-check-pass.php" method="post">
      <div class="input-group">
        <input type="password" class="form-control" required name="password" placeholder="пароль">

        <div class="input-group-append">
            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>

  </div>
  <div class="help-block text-center">
    Введите пароль, чтобы войти
  </div>
  <?echo $error_text;?>
</div>

</body>
</html>
