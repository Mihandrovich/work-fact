<? include "../dist/config/config_db.php";

$id = $_GET[id_news];
if(strlen($id) > 7){
    $id = 1;
    mysql_close($link);
        echo "<center><strong>".$ip." - этот ip сейчас будет заблокирован за попытку взлома! Соединение закрыто!</strong></center>";
    exit;
}else{
$product_db = mysqli_query($link, "SELECT * FROM `parse` WHERE `id`='$id'");
$product_db_data = mysqli_fetch_array($product_db);
$news_kol = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `parse`"))*15;
$ref = $_GET[ref];
if($ref == 1){
    $ran = rand(1,10);
    ?><meta http-equiv="refresh" content="<?echo $ran;?>;URL=https://academy-mi.ru/pages/news-watch.php?id_news=<?echo rand(25,($news_kol/15)+50);?>&ref=1" /><?
}
$siteprod = $product_db_data[name];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?echo $siteprod;?></title>
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

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">

              <h3 class="d-inline-block d-sm-none"><?echo $product_db_data[name];?></h3>
              <div class="col-12">
                <img src="<?echo $product_db_data[img];?>" class="product-image" alt=" ">
                <iframe src="https://autofaucet.org/wmi/Mihandr" width="400" height="400" style="border:0"></iframe>

                          <!-- Yandex.RTB R-A-684005-2 -->
<div id="yandex_rtb_R-A-684005-2"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-684005-2",
                renderTo: "yandex_rtb_R-A-684005-2",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>        <!-- Yandex.RTB R-A-684005-3 -->
<div id="yandex_rtb_R-A-684005-3"></div>
<script type="text/javascript">
    (function(w, d, n, s, t) {
        w[n] = w[n] || [];
        w[n].push(function() {
            Ya.Context.AdvManager.render({
                blockId: "R-A-684005-3",
                renderTo: "yandex_rtb_R-A-684005-3",
                async: true
            });
        });
        t = d.getElementsByTagName("script")[0];
        s = d.createElement("script");
        s.type = "text/javascript";
        s.src = "//an.yandex.ru/system/context.js";
        s.async = true;
        t.parentNode.insertBefore(s, t);
    })(this, this.document, "yandexContextAsyncCallbacks");
</script>
              </div>
              <div class="col-12 product-image-thumbs">
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <p><?echo $product_db_data[content];?></p>
              <?if($product_db_data[code] != ""){?>
              <?echo $product_db_data[code];?><?echo $ip;?>" target="_blank">ПЕРЕЙТИ!</a></b></span>
              <?}?>
            
              <div class="mt-4 product-share">
                  <script src="https://yastatic.net/share2/share.js"></script>
<div class="ya-share2" data-curtain data-size="l" data-shape="round" data-services="vkontakte,facebook,odnoklassniki,telegram,twitter,viber,whatsapp,skype,blogger,reddit"></div>
              </div>

            </div>
          </div>
        </div>
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
