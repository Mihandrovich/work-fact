<? include "../../dist/config/config_db.php";
include "../../dist/config/user.php";
}
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
  <title>Финансы</title>

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
            <h1 class="m-0">Финансы</h1>
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
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="active">
                    <div class="timeline timeline-inverse">
                        <?
                        $log = mysqli_query($link, "SELECT * FROM `fin_log` WHERE `id_us`='$uid' ORDER BY id DESC");
                        While($log_data = mysqli_fetch_array($log)){
                        $parts = explode(" ", $log_data[text]);
                        if($parts[0] == "Штраф"){
                            echo'<div class="alert alert-danger alert-dismissible" style="padding-right:5px;">
                            <h5><i class="icon fas fa-ban"></i> Штраф! <div class="float-right" style="font-size:12px;"> '. date("d/m/Y H:i:s",$log_data[date]).' </div></h5>
                            '.$log_data[text].' на сумму <b>'.number_format($log_data[money], 2, '.', ' ').' RUB </b>  
                            </div>';
                        }else if($parts[0] == "Зачисление"){
                            echo'<div class="alert alert-success alert-dismissible" style="padding-right:5px;">
                            <h5><i class="icon fas fa-check"></i> Зачисление! <div class="float-right" style="font-size:12px;"> '. date("d/m/Y H:i:s",$log_data[date]).' </div></h5>
                            '.$log_data[text].' на сумму <b>'.number_format($log_data[money], 2, '.', ' ').' RUB </b>
                            </div>';
                        }else{
                            echo'<div class="alert alert-warning alert-dismissible" style="padding-right:5px;">
                            <h5><i class="icon fas fa-exclamation-triangle"></i> Другое <div class="float-right" style="font-size:12px;"> '. date("d/m/Y H:i:s",$log_data[date]).' </div></h5>
                            '.$log_data[text].' на сумму <b>'.number_format($log_data[money], 2, '.', ' ').' RUB </b>
                            </div>';
                        }
                        ?>
                        <?
                        }
                        ?>
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                    
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
