<? include "../dist/config/config_db.php";
if($user[access] < 4){
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}
if($_SESSION['adminid'] < 0){
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}
if($_SESSION['uid'] < 0){
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?echo $server_data[sitename];?> - Парсер</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<? include "../dist/part/admin/top-panel.php" ?>
  
<? include "../dist/part/admin/menu.php" ?>

  <div class="content-wrapper">
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>  
    <div class="row">
            <div class="col-md-3"></div>
            <div class="card card-danger col-md-6">
              <div class="card-header">
                <h3 class="card-title">Парсер статей в дзене</h3>
              </div>
              <div class="card-body">
                <form action="parse.php">
                    <input type="text" class="form-control" autocomplete="off" required placeholder="Ссылка на статью в дзене" name="url"><br/>
                    <input type="text" class="form-control" autocomplete="off" required placeholder="Ссылка на картинку" name="img"><br/>
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Категория</label>
                        <select name="category" class="form-control">
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
                    <br /><div class="row"><div class="col-md-8"></div> <button type="submit" class="btn btn-info col-md-3">ПАРСИТЬ!</button></div> <br/>
                </form>
              </div>
            </div>
      </div>
    </section>
  </div>
  
<? include "../dist/part/admin/footer.php" ?>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
</body>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="../../dist/js/adminlte.min.js"></script>
</html>


<form action="parse.php">
<strong>Введите ссылку на статью:</strong>
<input type="text" name="url">
</form>
<?php
if($_GET){
$DATA= $_GET;
$url= $DATA['url'];
$img= $DATA['img'];
$category = $DATA['category'];
$file= file_get_contents($url);
$pattern = '#<div class="article-render".+?<div id="content-ending"></div>#s';
$name = '#<h1.+?</h1>#s';
preg_match($pattern, $file, $content);
preg_match($name, $file, $nameofartic);
$content_text = $content[0];
$pattern_p = '#<p class="article-render__block article-render__block_unstyled".+?</p>#s';

$h = '<h1 class="article__title article__title_theme_undefined" itemProp="headline">';
$name_text = $nameofartic[0];
$name_text = str_replace("$h"," ",$name_text);
$name_text = str_replace("</h1>"," ",$name_text);


preg_match($pattern_p, $content_text, $part);
$part_text = $part[0];
$parts = $parts.$part_text;
$pos = strripos($content_text, $part_text);
$content_text = str_replace("$part_text"," ",$content_text);

While($pos > 0){
    preg_match($pattern_p, $content_text, $part);
    $part_text = $part[0];
    $parts = $parts.$part_text;
    $pos = strripos($content_text, $part_text);
    $content_text = str_replace("$part_text"," ",$content_text);
}
if($parts == ""){
    echo "Не удалось спарсить!";
}
else{
mysqli_query($link, "INSERT INTO `parse` SET `name`='$name_text',`content`='$parts',`img`='$img',`category`='$category',`id_admin`='$user[id]'");
}
?>
<meta http-equiv="Refresh" content="0; URL=/pages/parse.php">
<?
}else{
    echo "Сначала введи ссылку";
}

?>