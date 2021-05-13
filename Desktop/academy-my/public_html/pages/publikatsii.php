<? include "../dist/config/config_db.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?echo $server_data[sitename];?> - Публикации</title>
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

<? include "../dist/part/top-panel.php" ?>
  
<? include "../dist/part/menu.php" ?>

  <div class="content-wrapper">
  <section class="content">
    <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>
		<div class="row">
		    <?
		    $i = 0;
		    $category = $_GET[category];
		    if(strlen($category) > 13){
            $category = "";
            mysqli_close($link);
            echo "<center><strong>".$ip." - этот ip сейчас будет заблокирован за попытку взлома! Соединение закрыто!</strong></center>";
            exit;
		    }else{
		    if($category == ""){
		        $product_db = mysqli_query($link, "SELECT * FROM `parse` WHERE `hide`='0' ORDER BY ID DESC");
		    }else{
		        $product_db = mysqli_query($link, "SELECT * FROM `parse` WHERE `category`='$category' and `hide`='0' ORDER BY ID DESC");
		    }
            }
            while ($product_db_data = mysqli_fetch_array($product_db)){
            ?>
            
<?
if($i==0){
echo '<div class="card-deck">';
}
?>
  <div class="card"><a href="news-watch.php?id_news=<?echo $product_db_data[id];?>">
      <? if($product_db_data[img] !== ""){?><img class="card-img-top" style="width: 100%;height: 260px;object-fit: cover;" src="<?echo $product_db_data[img];?>" alt="Card image cap"><?}else{}?>
    <div class="card-body">
      <h5 class="card-title" style="color: #212529;"><?echo $product_db_data[name];?></h5>
    </div></a>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"></li>
    <li class="list-group-item">Категория: <? if($product_db_data[category] !== ""){$category_db = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `category` WHERE `link`='$product_db_data[category]'"));
    echo $category_db[category];}else{echo "отсутствует";}?></li>
  </ul>
  </div>
<?
$i++;
if($i==3){
echo '</div><br/>';
$i = 0;
}
?>
            <?    
            }
		    ?>
		    

            

        </div>
    </section>
  </div>
  
<? include "../dist/part/footer.php" ?>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
