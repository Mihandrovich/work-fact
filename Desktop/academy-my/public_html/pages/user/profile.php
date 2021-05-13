<? include "../../dist/config/config_db.php";
include "../../dist/config/user.php";
$promo_numb = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `promo` WHERE `id_us`='$user[id]'"));
$error = $_GET[error];
$code = trim(mb_strtolower($_POST[code]), " ");
if($code != ""){
    if(strlen($code) < 11 && strlen($code) > 3){
        $promo_code = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `promo` WHERE `code`='$code'"));
        if($promo_numb == 0 && $promo_code == 0){
            mysqli_query($link, "INSERT INTO `promo` SET `code`='$code',`id_us`='$user[id]',`procent_us`='70'");
            ?>
            <meta http-equiv="Refresh" content="0; URL=/pages/user/profile.php">
            <?
        }else{
            ?>
            <meta http-equiv="Refresh" content="0; URL=/pages/user/profile.php?error=96">
            <?
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Личный кабинет</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <link rel="stylesheet" href="/plugins/bs-stepper/css/bs-stepper.min.css">
  <link rel="stylesheet" href="/plugins/dropzone/min/dropzone.min.css">
</head>

<body class="hold-transition sidebar-mini dark-mode layout-navbar-fixed">
<div class="wrapper">
<? include "../../dist/part/user/top-panel.php" ?>
  
<? include "../../dist/part/user/menu.php" ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Личный кабинет</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="content">
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <h3 class="profile-username text-center"><?echo $user[email];?></h3>

                <p class="text-muted text-center">online</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Баланс:</b> <a class="float-right"><?echo number_format($user[balance], 2, '.', ' ');?> RUB</a>
                  </li>
                  <li class="list-group-item">
                    <b>В холде:</b> <a class="float-right"><?echo number_format($user[hold], 2, '.', ' ');?> RUB</a>
                  </li>
                  <li class="list-group-item">
                    <b>В резерве</b> <a class="float-right"><?echo number_format($user[rezerv], 2, '.', ' ');?> RUB</a>
                  </li>
                  <li class="list-group-item">
                    <b>Выведено</b> <a class="float-right"><?echo number_format($user[out_money], 2, '.', ' ');?> RUB</a>
                  </li>
                  <li class="list-group-item">
                    <b>Процент</b> <a class="float-right"><?echo $user[procent];?>%</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="col-md-9">
            <div class="card">
    <?           
    if($error == 96){
    echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Ошибка, код 96!</h5>
            Такое кодовое слово уже существует!
        </div>';
    }
    ?>
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Данные</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">История авторизаций</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Настройки</a></li>
                  <li class="nav-item"><a class="nav-link" href="#ref" data-toggle="tab">Рефералка</a></li>
                  <?
                      if($user[out_card] == 1){
                          echo '<li class="nav-item" style="background-color: #ff8100;border-radius: .25rem;"><a class="nav-link" href="#verif" data-toggle="tab">Верификация</a></li>';
                      }
                  ?>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                    <form class="form-horizontal" action="control_DB.php" method="post">
                      <input type="hidden" name="tip" value="pers">
                      <div class="form-group row">
                        <label for="phone" class="col-sm-3 col-form-label">Ваш номер телефона (обяз.)</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="phone" required  placeholder="Введите номер" value="<?echo $user[phone];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="vk" class="col-sm-3 col-form-label">Ссылка на ВК (необяз.)</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="vk"  placeholder="Вставьте ссылку" value="<?echo $user[vk];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="rezmail" class="col-sm-3 col-form-label">Резервная почта (необяз.)</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" name="rezmail"  placeholder="Введите резервную почту" value="<?echo $user[vk];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                          <button type="submit" class="btn btn-success">Сохранить</button>
                        </div>
                      </div>
                    </form>
                    <hr />
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Михаил Блауз</a>
                        </span>
                        <span class="description">online</span>
                      </div>
                      <p>
                        <?if($user[balance] > 0){ echo 'Ваш аккаунт был подтвержден, можете оставить <a href="/card">заявку на вывод</a>';}else{
                        echo 'Здравствуйте, вывод будет доступен сразу, как только баланс вашего аккаунта будет больше <b>0</b>! <a href="mailto:info@academy-mi.ru">info@academy-mi.ru</a>';
                        }?> 
                      </p>
                    </div>
                  </div>

                  <div class="tab-pane" id="timeline">
                    <div class="timeline timeline-inverse">
                        <?
                        $log = mysqli_query($link, "SELECT * FROM `log` WHERE `id_us`='$uid' and `text`='' ORDER BY id DESC");
                        While($log_data = mysqli_fetch_array($log)){
                        ?>
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>
                        <div class="timeline-item">
                          <span class="time" style="padding: 3px;"><i class="far fa-clock"></i><?echo date("d/m/Y H:i:s",$log_data[date]);?></span>

                          <h3 class="timeline-header">Успешная авторизация <?echo $log_data[ip]?></h3>
                        </div>
                      </div>
                        <?
                        }
                        ?>
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="control_DB.php" method="post">
                      <input type="hidden" name="tip" value="passw">
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Введите новый пароль</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="pass21" required placeholder="Новый пароль">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Повторите новый пароль</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="pass22" required placeholder="Новый пароль">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Сменить</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  
                  <div class="tab-pane" id="ref">
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Михаил Блауз</a>
                        </span>
                        <span class="description">online</span>
                      </div>
                      <p>Привет, на реферальной системе можно зарабатывать, это удобно для тебя и для нас! Подробнее можно узнать здесь: ############3
                      </p>
                    </div>
                    <hr style="background:#6c757d;">
                    <?
                    if($promo_numb == 0){
                    echo "<p>Ты еще не создал свое кодовое слово, давай придумаем его! Важно! Слово не должно быть длинее 10 символов и меньше 4, в нём могут быть любые символы и изменить его будет невозможно!</p>";
                    echo "<p>Помнишь регистрацию? Ты вводил кодовое слово, теперь человек которого приведешь ты введёт твоё кодовое слово и ты получишь % с его дохода!</p>";
                    echo '
                    <form class="form-horizontal" method="post">
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-4 col-form-label">Ваше кодовое слово</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="code" required maxlength="10" minlength="4" name="code" placeholder="">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Создать кодовое слово</button>
                        </div>
                      </div>
                    </form>';
                    }else{
                    $promo_sl = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `promo` WHERE `id_us`='$user[id]'"));
                    echo '
                    <form class="form-horizontal" method="post">
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-4 col-form-label">Ваше кодовое слово</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="code" required maxlength="10" minlength="4" name="code" value="'.$promo_sl[code].'">
                        </div>
                      </div>
                    </form>';
                    }
                    ?>
                    <?
                    $us1 = 0;
                    $us2 = 0;
                    $us3 = 0;
                    $us4 = 0;
                    
                    $money1 = 0;
                    $money2 = 0;
                    $money3 = 0;
                    $money4 = 0;
                    
                    $reserv1 = 0;
                    $reserv2 = 0;
                    $reserv3 = 0;
                    $reserv4 = 0;
                    
                    $user1 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE `id`='$user[ref]'"));
                    $user1_numb = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `user` WHERE `ref`='$user[ref]'"));
                    $parts1 = explode("@", $user1[email]);
                    $user1 = mysqli_query($link, "SELECT * FROM `user` WHERE `ref`='$user[id]'");
                    While($user1_data = mysqli_fetch_array($user1)){
                        $us1++;
                        $money1 += $user1_data[balance];
                        $reserv1 += $user1_data[rezerv];
                        $us1_ref = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `promo` WHERE `id_us`='$user1_data[id]'"));
                        if($us1_ref == 1){
                            $user2 = mysqli_query($link, "SELECT * FROM `user` WHERE `ref`='$user1_data[id]'");
                            While($user2_data = mysqli_fetch_array($user2)){
                                $us2++;
                                $money2 += $user2_data[balance];
                                $reserv2 += $user2_data[rezerv];
                                $us2_ref = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `promo` WHERE `id_us`='$user2_data[id]'"));
                                if($us2_ref == 1){
                                    $user3 = mysqli_query($link, "SELECT * FROM `user` WHERE `ref`='$user2_data[id]'");
                                    While($user3_data = mysqli_fetch_array($user3)){
                                        $us3++;
                                        $money3 += $user3_data[balance];
                                        $reserv3 += $user3_data[rezerv];
                                        $us3_ref = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `promo` WHERE `id_us`='$user3_data[id]'"));
                                        if($us3_ref == 1){
                                            $user4 = mysqli_query($link, "SELECT * FROM `user` WHERE `ref`='$user3_data[id]'");
                                            While($user4_data = mysqli_fetch_array($user4)){
                                                $us4++;
                                                $money4 += $user4_data[balance];
                                                $reserv4 += $user4_data[rezerv];
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    
                    ?>
                    <p>Немного цифр! Вас пригласил <b><?echo $parts1[0];?></b>, всего он пригласил <b><?echo $user1_numb;?></b> человек(а), с каждого он получает по 10%, а тот кто пригласил его получит с этих людей по 5%, круто, да? Но это не всё, ведь в нашей системе 4 уровня реферальной системы, где 3 уровень - 3%, а 4 - 2%.</p>
                    <p>Давай посмотрим на твоих рефералов:</p>
                    <p>Первый уровень (10%): <?echo $us1;?> ч., они принесли тебе <?echo ($money1/100*10);?> RUB и еще возможно принесут <?echo ($reserv1/100*10);?> RUB</p>
                    <p>Второй уровень (5%): <?echo $us2;?> ч., они принесли тебе <?echo ($money2/100*5);?> RUB и еще возможно принесут <?echo ($reserv2/100*5);?> RUB</p>
                    <p>Третий уровень (3%): <?echo $us3;?> ч., они принесли тебе <?echo ($money3/100*3);?> RUB и еще возможно принесут <?echo ($reserv3/100*3);?> RUB</p>
                    <p>Четвертый уровень (2%): <?echo $us4;?> ч., они принесли тебе <?echo ($money4/100*2);?> RUB и еще возможно принесут <?echo ($reserv4/100*2);?> RUB</p>
                  </div>
                  
                  <div class="tab-pane" id="verif">
                    #### СКРЫТО ####
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    </div>
  </div>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>

<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dist/js/adminlte.js"></script>
<script src="/plugins/chart.js/Chart.min.js"></script>
<script src="/dist/js/demo.js"></script>
<script src="/dist/js/pages/dashboard3.js"></script>
<script src="/plugins/select2/js/select2.full.min.js"></script>
<script src="/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/inputmask/jquery.inputmask.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<script src="/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script src="/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="/plugins/dropzone/min/dropzone.min.js"></script>
<script src="/dist/js/adminlte.min.js"></script>
<script src="/dist/js/demo.js"></script>
<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dist/js/adminlte.js"></script>
</body>
</html>
