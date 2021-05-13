<? include "../../dist/config/config_db.php";
include "../../dist/config/user.php";

if($user[access] >= 8){

$name = $_POST[name];
$level = $_POST[level];
$text = $_POST[text];
$img = $_POST[img];
$edit = $_POST[edit];
$id = $_POST[id];
echo $edit;
if($name !== "" and $text !== "" and $img !== "" and $edit == "YES"){
mysqli_query($link, "UPDATE `parse` SET `name`='$name',`content`='$text',`img`='$img',`category`='$level' WHERE `id`='$id'");
    ?>
    <meta http-equiv="Refresh" content="0; URL=/pages/admin/edit-news.php?id=<?echo $id;?>">
    <?
}else{
    $id = $_GET[id];
$news = mysqli_query($link, "SELECT * FROM `parse` WHERE `id`='$id'");
$news_db_data = mysqli_fetch_array($news);
}
}
if($news_db_data[id_admin] !== $user[id] and $user[access] < 9){
        ?>
    <meta http-equiv="Refresh" content="0; URL=/pages/admin/news.php">
    <?
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Панель - Редактирование новости</title>
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
                <h3 class="card-title">Редактирование статьи</h3>
              </div>
              <div class="card-body">
                <form role="form" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Название</label>
                        <input type="text" name="name" class="form-control" value="<?echo $news_db_data[name]?>" placeholder="">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Ссылка на фото"</label>
                      <input type="text" name="img" class="form-control" value="<?echo $news_db_data[img]?>">
                      <input type="hidden" name="id" class="form-control" value="<?echo $news_db_data[id]?>">
                      <input type="hidden" name="edit" class="form-control" value="YES">
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Категория</label>
                        <select name="level" class="form-control">
                          <option value="<?echo $news_db_data[category]?>"><?echo $news_db_data[category]?></option>
                          <option value="">Нет</option>
                            <?
		                    $menu_level1_db = mysqli_query($link, "SELECT * FROM `category`");
                            While($menu_level1_db_data = mysqli_fetch_array($menu_level1_db)){
                            ?>
                          <option value="<?echo $menu_level1_db_data[link];?>"><?echo $menu_level1_db_data[category];?></option>
                            <?
                            }
                            ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  </div>
                <textarea name="text" id="summernote"> <?echo $news_db_data[content]?></textarea>
    <script>
$('#summernote').summernote({
  height: 150,                 // set editor height
  minHeight: null,             // set minimum height of editor
  maxHeight: null,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});
    </script>
                  <div class="row">
                    <div class="col-6">
                      <button type="submit" class="btn btn-block bg-gradient-success btn-lg">Сохранить</button>
                    </div>
                    <div class="col-6">
                      <a href="/pages/admin/news.php"><button type="button" class="btn btn-block bg-gradient-danger btn-lg">Отменить</button></a>
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
