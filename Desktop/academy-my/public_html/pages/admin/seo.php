<? include "../../dist/config/config_db.php";
if($user[access] < 4){
    header('Location: /index.php');
    exit();
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}
if($_SESSION['adminid'] < 0){
    header('Location: /index.php');
    exit();
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}
if($_SESSION['uid'] < 0){
    header('Location: /index.php');
    exit();
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}
if($user[access] > 7){
if($user[access] > 7 and $_GET[sitename] != "" and $_GET[title] != "" and $_GET[keywords] != "" and $_GET[description] != ""){
$sitename = $_GET[sitename];
$title = $_GET[title];
$keywords = $_GET[keywords];
$description = $_GET[description];

mysqli_query($link, "UPDATE `server` SET `sitename`='$sitename', `title`='$title', `keywords`='$keywords', `description`='$description' WHERE `id`='1'");
?>
<meta http-equiv="Refresh" content="0; URL=/pages/admin/seo.php">
<?
}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Панель - SEO</title>
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
      <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Настройка SEO <?if($user[access] < 8){echo ". У ВАС НЕТ ДОСТУПА, НАСТРОЙКИ НЕ СОХРАНЯЮТСЯ!";}?></h3>
              </div>
              <div class="card-body">
                <form role="form" active="POST">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Новое название сайта</label>
                        <input type="text" name="sitename" class="form-control" value="<?echo $server_data[sitename]?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Название сайта СЕЙЧАС</label>
                        <input type="text" class="form-control"  value="<?echo $server_data[sitename]?>" disabled="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Новый title сайта (главная страница)</label>
                        <input type="text" name="title" class="form-control" value="<?echo $server_data[title]?>">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Title сайта (главная страница) СЕЙЧАС</label>
                        <input type="text" class="form-control"  value="<?echo $server_data[title]?>" disabled="">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Новые keywords (ключевые слова)</label>
                        <textarea class="form-control" rows="3" name="keywords" style="margin-top: 0px; margin-bottom: 0px; height: 187px;"><?echo $server_data[keywords]?></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Keywords (ключевые слова) СЕЙЧАС</label>
                        <textarea class="form-control" rows="3" disabled="" style="margin-top: 0px; margin-bottom: 0px; height: 197px;"><?echo $server_data[keywords]?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Новые description (описание сайта)</label>
                        <textarea class="form-control" rows="3" name="description" style="margin-top: 0px; margin-bottom: 0px; height: 187px;"><?echo $server_data[description]?></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Description (описание сайта) СЕЙЧАС</label>
                        <textarea class="form-control" rows="3" disabled="" style="margin-top: 0px; margin-bottom: 0px; height: 197px;"><?echo $server_data[description]?></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <button type="submit" class="btn btn-block bg-gradient-success btn-lg">Сохранить</button>
                    </div>
                    <div class="col-6">
                      <a href="/pages/admin/seo.php"><button type="button" class="btn btn-block bg-gradient-danger btn-lg">Отменить</button></a>
                    </div>
                  </div>
                </form>
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

</body>
</html>
