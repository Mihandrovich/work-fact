<? include "../../dist/config/config_db.php";

$menu_level_db_data = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `$level` WHERE `id`='$id_level'"));

$user_id = $_GET[id_us];
$dellver = $_GET[dellver];

include "../../dist/config/user.php";

$user_ii = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE `id`='$user_id'"));
if($dellver != ""){
    mysqli_query($link, "DELETE FROM `verif` WHERE `id` = '$dellver' and `user_id` = '$user_id'");

}

?>
        <!DOCTYPE html>
        <html>

        <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>Панель - UII</title>
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
          <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
          <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
          <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
                        <div class="col-md-3">

                          <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                              <h3 class="profile-username text-center"><?echo $user_ii[email];?></h3>

                              <p class="text-muted text-center">online</p>

                              <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                  <b>Баланс:</b>
                                  <a class="float-right">
                                    <?echo number_format($user_ii[balance], 2, '.', ' ');?> RUB</a>
                                </li>
                                <li class="list-group-item">
                                  <b>В холде:</b>
                                  <a class="float-right">
                                    <?echo number_format($user_ii[hold], 2, '.', ' ');?> RUB</a>
                                </li>
                                <li class="list-group-item">
                                  <b>В резерве</b>
                                  <a class="float-right">
                                    <?echo number_format($user_ii[rezerv], 2, '.', ' ');?> RUB</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Выведено</b>
                                  <a class="float-right">
                                    <?echo number_format($user_ii[out_money], 2, '.', ' ');?> RUB</a>
                                </li>
                                <li class="list-group-item">
                                  <b>Процент</b>
                                  <a class="float-right">
                                    <?echo $user_ii[procent];?>%</a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-9">
                          <div class="card">
                              <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                  <li class="nav-item"><a class="nav-link active" href="#log" data-toggle="tab">Логи</a></li>
                                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Настройки</a></li>
                                  <li class="nav-item"><a class="nav-link" href="#verif" data-toggle="tab">Верификация</a></li>

                                </ul>
                              </div>
                              <div class="card-body">
                                <div class="tab-content">
                                  <div class="tab-pane active" id="log">
                                    <div class="row">

                                      <div class="col-12">
                                        <div class="card">
                                          <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                  <th style="width: 10px">id</th>
                                                  <th>ip</th>
                                                  <th>TEXT</th>
                                                  <th>Дата</th>
                                                  <th style="width: 10px"></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?
                                                $log = mysqli_query($link, "SELECT * FROM `log` WHERE `id_us`='$user_id' ORDER BY id DESC");
                                                While($log_data = mysqli_fetch_array($log)){
                                                if($users_list_db_data[access] < 6){
                                                ?>
                                                  <tr>
                                                    <td>
                                                      <?echo $log_data[id];?>
                                                    </td>
                                                    <td>
                                                      <?echo $log_data[ip];?>
                                                    </td>
                                                    <td>
                                                      <?
                                                        if($log_data[text] == ""){
                                                          echo "Вход в аккаунт";
                                                        }else{
                                                          echo $log_data[text];
                                                        }
                                                      ?>
                                                    </td>
                                                    <td>
                                                      <?echo date("d/m/Y H:i:s",$log_data[date]);?>
                                                    </td>
                                                    <td>
                                                      <div class="btn-group">
                                                        <?if($user[access] < 8){
                                                          echo '<button type="button" class="btn btn-default"><i class="fa fa-ban" aria-hidden="true"></i></button>';
                                                        }else{
                                                          echo '<a href="/pages/admin/user_id_information.php?id_us='.$log_data[id_us].'"><button type="button" class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i></button></a>';
                                                          echo '<button type="button" class="btn btn-default"></button>';
                                                          echo '<a href="/pages/admin/ban.php?id_us='.$log_data[id_us].'"><button type="button" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></button></a>';
                                                        }?>
                                                      </div>
                                                    </td>
                                                  </tr>
                                                  <?
                                                        }
                                                    }
                                                  ?>
                                              </tbody>
                                              <tfoot>
                                                <tr>
                                                  <th style="width: 10px">id</th>
                                                  <th>ip</th>
                                                  <th>TEXT</th>
                                                  <th>Дата</th>
                                                  <th></th>
                                                </tr>
                                              </tfoot>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="tab-pane" id="settings">
                                    <form class="form-horizontal" action="/" method="post">
                                      <input type="hidden" name="tip" value="settings">
                                      <div class="form-group row">
                                        <label for="inputExperience" class="col-sm-2 col-form-label">Баланс</label>
                                        <div class="col-sm-10">
                                          <input type="text" class="form-control" name="balance" placeholder="" value="<?echo $user_ii[balance];?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="inputSkills" class="col-sm-2 col-form-label">Процент</label>
                                        <div class="col-sm-10">
                                          <input type="text" class="form-control" name="procent" placeholder="" value="<?echo $user_ii[procent];?>">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                          <button type="submit" class="btn btn-danger">Сменить</button>
                                        </div>
                                      </div>
                                    </form>
                                  </div>

                                  <div class="tab-pane" id="verif">
                                    #########################
                                  </div>

                                </div>
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
            $(function() {
              $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
              });
              $("#example3").DataTable({
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
          <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>