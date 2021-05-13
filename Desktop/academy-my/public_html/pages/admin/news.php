<? include "../../dist/config/config_db.php";

$menu_level_db_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `$level` WHERE `id`='$id_level'"));
include "../../dist/config/user.php";

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Панель - Новости</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">
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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th style="width: 10px">id</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th style="width: 10px"></th>
                  </tr>
                  </thead>
                  <tbody>
		    <?
		    $news_db = mysqli_query($link, "SELECT * FROM `parse`");
            While($news_db_data = mysqli_fetch_array($news_db)){
                $category_db = mysqli_query($link, "SELECT * FROM `category` WHERE `link`='$news_db_data[category]'");
                $category_db_num = mysqli_num_rows($category_db);
                $category_db_data = mysqli_fetch_array($category_db);
            ?>
                  <tr>
                    <td><?echo $news_db_data[id];?></td>
                    <td><?echo $news_db_data[name];?></td>
                    <td><?echo $category_db_data[category];?></td>
                    <td><div class="btn-group">
                          <?if($news_db_data[id_admin] == $user[id] || $user[access] == 9){
                          echo '<a href="/pages/admin/edit-news.php?id='.$news_db_data[id].'"><button type="button" class="btn btn-success"><i class="fas fa-edit"></i></button></a>';
                          }else{
                          echo '<button type="button" class="btn btn-default"><i class="fas fa-edit"></i></button>';
                          }?>
                    </div></td>
                  </tr>
            <?
            }
            ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th style="width: 10px">id</th>
                    <th>Название</th>
                    <th>Категория</th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
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
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script src="../../plugins/datatables/jquery.dataTables.min.js?7"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
</body>
</html>
