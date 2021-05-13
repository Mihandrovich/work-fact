<? include "../../dist/config/config_db.php";
$task_id = $_GET[id];
settype($task_id, "integer"); 

$orders = mysqli_query($link, "SELECT * FROM `orders` WHERE `id`='$task_id'");
$orders_data = mysqli_fetch_array($orders);

$links = mysqli_query($link, "SELECT * FROM `links` WHERE `id`='$task_id'");
$links_data = mysqli_fetch_array($links);

include "../../dist/config/user.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Задание №<?echo $task_id;?></title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini dark-mode layout-navbar-fixed">
<div class="wrapper">
<? include "../../dist/part/user/top-panel.php" ?>
  
<? include "../../dist/part/user/menu.php" ?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>

    <div class="content">
      <div class="container-fluid">
        <div class="callout callout-info">
          <?if($orders_data[name] != ""){
          
          ?>
            <h5><i class="fas fa-info"></i> Информация по заданию №<?echo $task_id;?> ВЫКЛЮЧАЙТЕ БЛОКИРОВЩИК РЕКЛАМЫ, ЗАДАНИЯ НЕ ЗАСЧИТЫВАЮТСЯ С НИМ!</h5>
            Название: <?echo $orders_data[name];?><br>
            Выплата: <b><?echo number_format($orders_data[money], 2, '.', ' ');?> RUB</b><br>
            Статус: <b><?if($orders_data[status] == 0){echo "Активно";}else{echo "Деактивировано";}?></b><br>
            Задача/цель: <u><?echo $orders_data[text];?></u><br>
            ВАЖНО: <u>ЧТОБЫ ВЫПОЛНИТЬ ЗАДАНИЕ В ПОСТЕ НАЖМИТЕ НА КНОПКУ <b>"ПОЛУЧИТЬ"</b> или <b>БАННЕР</b>, ЕСЛИ КНОПКИ НЕТ!</u><br>
            Дата размещения: <b><?echo date("d/m/Y",$orders_data[date]);?></b><br>
            <?if($orders_data[status] == 1){
                #echo '<a href="" class="btn btn-warning" style="color:white;text-decoration: none";>Посмотреть отчет</a>';
            }else{
                echo '<a href="https://academy-mi.ru/pages/news-watch.php?id_news='.$links_data[link2].'" class="btn btn-success col-lg-3" style="color:white;text-decoration: none;">Выполнить задание</a>
                <a href="report-create.php?id_order='.$orders_data[id].'" class="btn btn-warning col-lg-3" style="color:white;text-decoration: none;">Создать отчет</a>';
            }?>
          <?}else{?>
            <h5><i class="fas fa-info"></i> Информация по заданию №<?echo $task_id;?> не найдена</h5>
          <?}?>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Задания</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Название</th>
                    <th>Выплата</th>
                    <th>Статус</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?
                      $top = 0;
                      $orders = mysqli_query($link, "SELECT * FROM `orders` WHERE `top`='1' AND `status`='0' ORDER BY id DESC LIMIT 20");
                        While($orders_data = mysqli_fetch_array($orders)){
                            $top++;
                    ?>
                  <tr>
                    <td>
                      <a href="task_id.php?id=<?echo $orders_data[id];?>" style="color:#ffffff;">
                        <?echo $orders_data[name];?>
                      </a>                        
                      <?
                        if($orders_data[top] == 1){
                        echo "<span class='badge bg-danger'>TOP</span>";
                        }
                        ?>
                    </td>
                    <td><?echo number_format($orders_data[money], 2, '.', ' ');?> RUB</td>
                    <td><?
                    if($orders_data[status] == 0){
                    echo "Активно";
                    }else{
                    echo "Деактивировано";
                    }
                    ?></td>
                    <td>
                      <a href="task_id.php?id=<?echo $orders_data[id];?>" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                <?
                    }
                ?>
                    <?
                      $limit = 20 - $top;
                      $orders = mysqli_query($link, "SELECT * FROM `orders` WHERE `top`='0' AND `status`='0' ORDER BY id DESC LIMIT $limit");
                        While($orders_data = mysqli_fetch_array($orders)){
                    ?>
                  <tr>
                    <td>
                      <a href="task_id.php?id=<?echo $orders_data[id];?>" style="color:#ffffff;">
                        <?echo $orders_data[name];?>
                      </a>                      
                    </td>
                    <td><?echo number_format($orders_data[money], 2, '.', ' ');?> RUB</td>
                    <td><?
                    if($orders_data[status] == 0){
                    echo "Активно";
                    }else{
                    echo "Деактивировано";
                    }
                    ?></td>
                    <td>
                      <a href="task_id.php?id=<?echo $orders_data[id];?>" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                <?
                    }
                ?>
                  <tr>
                    <td colspan="4"><a type="button" href="task.php" class="btn btn-block btn-info">Больше заданий</a></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Последние выполнения</h3>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Название</th>
                    <th>Выплата</th>
                    <th>Аккаунт</th>
                    <th>Статус</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?
                      $report = mysqli_query($link, "SELECT * FROM `report` ORDER BY update_date DESC LIMIT 20");
                        While($report_data = mysqli_fetch_array($report)){
                            $people = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE `id`='$report_data[id_us]'"));
                           $parts = explode("@", $people[email]);
                    ?>
                  <tr>
                    <td>
                      <a href="task_id.php?id=<?echo $orders_data[id];?>" style="color:#ffffff;">
                        <?echo $report_data[name];?>
                      </a>                    </td>
                    <td><?echo number_format($report_data[money], 2, '.', ' ');?> RUB</td>
                    <td><a href="#" class="text-muted"><?echo $parts[0];?></a></td>
                    <td><?if($report_data[status]<3){
                        echo '<i class="fas fa-clock text-warning"></i>';
                    }else if($report_data[status]==3){
                        echo '<i class="fas fa-check-circle text-success"></i>';
                    }else if($report_data[status]==4){
                        echo '<i class="fas fa-times-circle text-danger"></i><p>'.$report_data[text].'</p>';
                    }?>
                    </td>
                  </tr>
                <?
                    }
                ?>
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="/plugins/jquery/jquery.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/dist/js/adminlte.js"></script>
<script src="/plugins/chart.js/Chart.min.js"></script>
<script src="/dist/js/demo.js"></script>
<script src="/dist/js/pages/dashboard3.js"></script>
</body>
</html>
