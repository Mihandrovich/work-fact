<? include "../../dist/config/config_db.php";
include "../../dist/config/user.php";

if($user[access] >= 8){

    $id = $_GET[id];
$report_db = mysqli_query($link, "SELECT * FROM `report` WHERE `id`='$id'");
$report_db_data = mysqli_fetch_array($report_db);
$people = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE `id`='$report_db_data[id_us]'"));

$status = $_GET[status];
$money = $_GET[money];
$edit = $_GET[edit];
$id = $_GET[id];
$text = $_GET[text];
$procent = $_GET[procent];
$time = time();

if($procent !== "" and $id !== "" and $status !== "" and $money !== "" and $edit == "YES"){
    
    $user1 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE `id`='$people[ref]'"));
    $user2 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE `id`='$user1[ref]'"));
    $user3 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE `id`='$user2[ref]'"));
    $user4 = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE `id`='$user3[ref]'"));
    $parts = explode("@", $people[email]);
        
    if($report_db_data[status] == 3 and $status != 3){
        $money_pip = $people[balance] - ($report_db_data[money]/100)*$report_db_data[procent];
        $m = ($report_db_data[money]/100)*$report_db_data[procent];
        $userA = "(NULL, '$people[id]', '$id', '$m', '$time', 'Штраф за задание $id', '$uid')";
        mysqli_query($link, "UPDATE `user` SET `balance`='$money_pip' WHERE `id`='$people[id]'");
        
        if($user1[id] > 0){
            $m1 = ($report_db_data[money]/100)*10;
            $money1 = $user1[balance] - $m1;
            $userB = ",(NULL, '$user1[id]', '$id', '$m1', '$time', 'Штраф за задание вашего реферала 1 уровня $parts[0]', '$uid')";
            mysqli_query($link, "UPDATE `user` SET `balance`='$money1' WHERE `id`='$user1[id]'");
        }if($user2[id] > 0){
            $m2 = ($report_db_data[money]/100)*5;
            $money2 = $user2[balance] - $m2;
            $userC = ",(NULL, '$user2[id]', '$id', '$m2', '$time', 'Штраф за задание вашего реферала 2 уровня $parts[0]', '$uid')";
            mysqli_query($link, "UPDATE `user` SET `balance`='$money2' WHERE `id`='$user2[id]'");
        }if($user3[id] > 0){
            $m3 = ($report_db_data[money]/100)*3;
            $money3 = $user3[balance] - $m3;
            $ref3 = "";
            $userD = ",(NULL, '$user3[id]', '$id', '$m3', '$time', 'Штраф за задание вашего реферала 3 уровня $parts[0]', '$uid')";
            mysqli_query($link, "UPDATE `user` SET `balance`='$money3' WHERE `id`='$user3[id]'");
        }if($user4[id] > 0){
            $m4 = ($report_db_data[money]/100)*2;
            $money4 = $user4[balance] - $m4;
            $userF = ",(NULL, '$user4[id]', '$id', '$m4', '$time', 'Штраф за задание вашего реферала 4 уровня $parts[0]', '$uid')";
            mysqli_query($link, "UPDATE `user` SET `balance`='$money4' WHERE `id`='$user4[id]'");
        }
        mysqli_query($link, "INSERT INTO `fin_log` (`id`, `id_us`, `id_report`, `money`, `date`, `text`, `id_admin`) VALUES $userA $userB $userC $userD $userF;");
        
    }
    if($report_db_data[status] != 3 and $status == 3){
        $m = ($report_db_data[money]/100)*$report_db_data[procent];
        $money_pip = $people[balance] + ($report_db_data[money]/100)*$report_db_data[procent];
        $userA = "(NULL, '$people[id]', '$id', '$m', '$time', 'Зачисление за задание $id', '$uid')";
        mysqli_query($link, "UPDATE `user` SET `balance`='$money_pip' WHERE `id`='$people[id]'");
        
        if($user1[id] > 0){
            $m1 = ($report_db_data[money]/100)*10;
            $money1 = $user1[balance] + $m1;
            $userB = ",(NULL, '$user1[id]', '$id', '$m1', '$time', 'Зачисление за задание от вашего реферала 1 уровня $parts[0]', '$uid')";
            mysqli_query($link, "UPDATE `user` SET `balance`='$money1' WHERE `id`='$user1[id]'");
        }if($user2[id] > 0){
            $m2 = ($report_db_data[money]/100)*5;
            $money2 = $user2[balance] + $m2;
            $userC = ",(NULL, '$user2[id]', '$id', '$m2', '$time', 'Зачисление за задание от вашего реферала 2 уровня $parts[0]', '$uid')";
            mysqli_query($link, "UPDATE `user` SET `balance`='$money2' WHERE `id`='$user2[id]'");
        }if($user3[id] > 0){
            $m3 = ($report_db_data[money]/100)*3;
            $money3 = $user3[balance] + $m3;
            $ref3 = "";
            $userD = ",(NULL, '$user3[id]', '$id', '$m3', '$time', 'Зачисление за задание от вашего реферала 3 уровня $parts[0]', '$uid')";
            mysqli_query($link, "UPDATE `user` SET `balance`='$money3' WHERE `id`='$user3[id]'");
        }if($user4[id] > 0){
            $m4 = ($report_db_data[money]/100)*2;
            $money4 = $user4[balance] + $m4;
            $userF = ",(NULL, '$user4[id]', '$id', '$m4', '$time', 'Зачисление за задание от вашего реферала 4 уровня $parts[0]', '$uid')";
            mysqli_query($link, "UPDATE `user` SET `balance`='$money4' WHERE `id`='$user4[id]'");
        }
        mysqli_query($link, "INSERT INTO `fin_log` (`id`, `id_us`, `id_report`, `money`, `date`, `text`, `id_admin`) VALUES $userA $userB $userC $userD $userF;");
    }
    mysqli_query($link, "UPDATE `report` SET `procent`='$procent',`update_date`='$time',`money`='$money',`status`='$status',`text`='$text' WHERE `id`='$id'");
    ?>
    <meta http-equiv="Refresh" content="0; URL=/pages/admin/edit-report.php?id=<?echo $id;?>">
    <?
}else{

}

}
if($user[access] < 8){
        ?>
    <meta http-equiv="Refresh" content="0; URL=/pages/admin/report.php">
    <?
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Панель - Редактирование отчета</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  <link rel="stylesheet" href="../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<? include "../../dist/part/admin/top-panel.php" ?>
  
<? include "../../dist/part/admin/menu.php" ?>

  <div class="content-wrapper">
      <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
          <div class="col-md-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Редактирование отчета</h3>
              </div>
              <div class="card-body">
                <form role="form" method="get" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Название</label>
                        <input type="text" disabled="disabled" name="" class="form-control" value="<?echo $report_db_data[name]?>" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Исполняющий</label>
                        <input type="text" name="" disabled="disabled" class="form-control" value="<?echo $people[email]?>" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-group">
                        <label>Выплата</label>
                      <input type="number" name="money" class="form-control" value="<?echo $report_db_data[money]?>">
                      <input type="hidden" name="id" class="form-control" value="<?echo $report_db_data[id]?>">
                      <input type="hidden" name="edit" class="form-control" value="YES">
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-group">
                        <label>Процент</label>
                      <input type="number" name="procent" class="form-control" value="<?echo $report_db_data[procent]?>">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Статус</label>
                        <select name="status" class="form-control">
                          <option value="<?echo $report_db_data[status]?>">
                            <?
                            if($report_db_data[status] == 0){ echo 'Модератор ждет письмо'; }
                            if($report_db_data[status] == 1){ echo 'Ждем доставки карты'; }
                            if($report_db_data[status] == 2){ echo 'Отчет направлен партнеру'; }
                            if($report_db_data[status] == 3){ echo 'Выполнено'; }
                            if($report_db_data[status] == 4){ echo 'Не принято'; }
                            ?>
                          </option>
                          <option value="0">Модератор ждет письмо</option>
                          <option value="1">Ждем доставки карты</option>
                          <option value="2">Отчет направлен партнеру</option>
                          <option value="3">Выполнено</option>
                          <option value="4">Не принято</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>ip</label>
                        <input type="text" name="" disabled="disabled" class="form-control" value="<?echo $report_db_data[ip]?>" placeholder="">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>id задания</label>
                        <input type="text" name="" disabled="disabled" class="form-control" value="<?echo $report_db_data[id_order]?>" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>id пользователя</label>
                        <input type="text" name="" disabled="disabled" class="form-control" value="<?echo $report_db_data[id_us]?>" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Дата создания</label>
                        <input type="text" name="" disabled="disabled" class="form-control" value="<?echo date("d/m/Y H:i:s",$report_db_data[date]);?>" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Дата обновления</label>
                        <input type="text" name="" disabled="disabled" class="form-control" value="<?echo date("d/m/Y H:i:s",$report_db_data[update_date]);?>" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Комментарий</label>
                        <textarea type="text" name="text" class="form-control" value="" placeholder=""><?echo $report_db_data[text];?></textarea>
                      </div>
                    </div>
                  </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-6">
                      <button type="submit" class="btn btn-block bg-gradient-success btn-lg">Сохранить</button>
                    </div>
                    <div class="col-6">
                      <a href="/pages/admin/report.php"><button type="button" class="btn btn-block bg-gradient-danger btn-lg">Отменить</button></a>
                    </div>
                  </div>
                </form>
              </div>
            </div>

          </div>
      </div>
    </section>
  </div>
  
<? include "../../dist/part/footer.php" ?>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
