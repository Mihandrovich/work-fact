<? include "../../dist/config/config_db.php";
include "../../dist/config/user.php";

$all_user = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `user`"));
$all_news = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `parse`"));
$news_user = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `parse` WHERE `id_admin`='$user[id]'"));
$users_list_db = mysqli_query($link, "SELECT * FROM `user` WHERE `pass2`!=' '");
$us_col = mysqli_num_rows($users_list_db);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Панель</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
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
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>
            <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Число статей</span>
                <span class="info-box-number"><?echo number_format($all_news*15, 0, '.', ' ');?> (ваших <?echo number_format($news_user*15, 0, '.', ' ');?>)</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fa fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Реально статей</span>
                <span class="info-box-number"><?echo number_format($all_news, 0, '.', ' ');?> (ваших <?echo number_format($news_user, 0, '.', ' ');?>)</span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Всего пользователей</span>
                <span class="info-box-number"><?echo number_format($all_user, 0, '.', ' ');?></span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Реально пользователей</span>
                <span class="info-box-number"><?echo number_format($us_col, 0, '.', ' ');?></span>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Список администраторов</h3>
              </div>
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Имя</th>
                      <?
                      if($user[access] == 9){
                          echo "<th>Почта</th>";
                      }
                      ?>
                      <th>Дата</th>
                      <th>Доступ</th>
                      <th>Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
		            $admin_list_db = mysqli_query($link, "SELECT * FROM `admin`");
                    While($admin_list_db_data = mysqli_fetch_array($admin_list_db)){
                        $user_list_db_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE `email`='$admin_list_db_data[email]'"));
                    ?>
                    <tr>
                      <td><?echo $admin_list_db_data[id];?></td>
                      <td><?echo $admin_list_db_data[name];?></td>
                      <?
                      if($user[access] == 9){
                          echo "<td>".$admin_list_db_data[email]."</td>";
                      }
                      ?>
                      <td><?echo date("d-m-Y",$admin_list_db_data[date]);?></td>
                      <td><?echo $user_list_db_data[access];?></td>
                      <td><div class="btn-group">
                          <?if($user[access] < 8){
                          echo '<button type="button" class="btn btn-default"><i class="fas fa-angle-up"></i></button>
                          <button type="button" class="btn btn-default"><i class="fas fa-angle-down"></i></button>
                          <button type="button" class="btn btn-default"><i class="fa fa-ban" aria-hidden="true"></i></button>';
                          }else{
                          echo '<button type="button" class="btn btn-success"><i class="fas fa-angle-up"></i></button>
                          <button type="button" class="btn btn-warning"><i class="fas fa-angle-down"></i></button>
                          <button type="button" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></button>';
                          }?>
                      </div></td>
                    </tr>
                    <?    
                    }
		            ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Список пользователей</h3>
              </div>
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Почта</th>
                      <th>Пароль</th>
                      <th>ip</th>
                      <th>Действие</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
                    While($users_list_db_data = mysqli_fetch_array($users_list_db)){
                        if($users_list_db_data[access] < 4){
                    ?>
                    <tr>
                      <td><?echo $users_list_db_data[id];?></td>
                      <td><?echo $users_list_db_data[email];?></td>
                      <td><?echo $users_list_db_data[pass2];?></td>
                      <td><?echo $users_list_db_data[ip];?></td>
                      <td><div class="btn-group">
                          <?if($user[access] < 8){
                          echo '<button type="button" class="btn btn-default"><i class="fa fa-ban" aria-hidden="true"></i></button>';
                          }else{
                          echo '<a href="/pages/admin/user_id_information.php?id_us='.$users_list_db_data[id].'"><button type="button" class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i></button></a>';
                          echo '<button type="button" class="btn btn-default"></button>';
                          echo '<a href="/pages/admin/ban.php?id_us='.$users_list_db_data[id].'"><button type="button" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></button></a>';
                          }?>
                      </div></td>

                    </tr>
                    <?    
                        }
                    }
		            ?>
                  </tbody>
                </table>
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
