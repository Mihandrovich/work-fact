<? include "../../dist/config/config_db.php";
include "../../dist/config/user.php";
$error = $_GET[error];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Отчеты</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
            <h1 class="m-0">Отчеты</h1>
          </div>
        </div>
      </div>
    </div>
    <?
    if($error == 17){
    echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Ошибка, код 17!</h5>
            Внимание! Вы уже создавали отчет по этому заданию! Отчеты по одному заданию можно создавать раз в два дня!
        </div>';
    }
    if($error == 18){
    echo '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-ban"></i> Ошибка, код 18!</h5>
            Внимание! Нельзя создать отчет на деактивированное задание!
        </div>';
    }
    ?>
    <div class="content">
      <div class="container-fluid">
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Информация:</h5>
            Если вы взялись за выполнение задания, то необходимо предоставить отчет в виде фото/видео, которые вы можете отправить на нашу почту. Специалисты получат письмо и сверят его с панелью ПП, после чего напишут вам! Если вы используете телефон, то нажмите на первый столбец любого отчета, чтобы открыть его. 
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">История отчетов</h3>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>№</th>
                    <th>Название задания</th>
                    <th>Выплата</th>
                    <th>Процент</th>
                    <th>Статус</th>
                    <th>Обновление</th>
                    <th>Дата создания</th>
                    <th>Действие</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?
                      $report = mysqli_query($link, "SELECT * FROM `report` WHERE `id_us`='$user[id]' ORDER BY id DESC");
                      $report_num = mysqli_num_rows($report);
                      if($report_num > 0){
                        While($report_data = mysqli_fetch_array($report)){
                    ?>
                  <tr>
                    <td><?echo $report_data[id];?></td>
                    <td><?echo $report_data[name];?></td>
                    <td><?echo number_format($report_data[money], 2, '.', ' ');?> RUB</td>
                    <td><?echo $report_data[procent];?>%</td>
                    <td><?
                    if($report_data[status] == 0){ echo 'Модератор ждет письмо'; }
                    if($report_data[status] == 1){ echo 'Ждем доставки карты'; }
                    if($report_data[status] == 2){ echo 'Отчет направлен партнеру'; }
                    if($report_data[status] == 3){ echo 'Выполнено'; }
                    if($report_data[status] == 4){ echo 'Не принято'; }
                    ?></td>
                    <td><?echo date("d/m/Y H:i:s",$report_data[update_date]);?></td>
                    <td><?echo date("d/m/Y H:i:s",$report_data[date]);?></td>
                    <td><a  href="mailto:work@academy-mi.ru?subject=Отчет%20№<?echo $report_data[id];?>&body=Название%20задания:%20<?echo htmlspecialchars($report_data[name]);?>%0AПриложите фото или видео (можно ссылки):%0A" class="btn bg-gradient-success">Написать</a><br>work@academy-mi.ru</td>
                  </tr>
                    <?
                        }
                      }else{
                        echo '<td>Отчеты не найдены, перейдите в задания, чтобы создать!</td>
                        <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>';  
                      }
                      
                    ?>
                  </tfoot>
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

<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script src="../../dist/js/demo.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
</body>
</html>
