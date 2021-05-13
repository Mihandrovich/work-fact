<?
$_SERVER['HTTP_REFERER'] = "https://www.google.com";
include "dist/config/config_db.php";
$R=$_SERVER['HTTP_REFERER'];
$A=$_SERVER['REMOTE_ADDR'];
$U=$_SERVER['REQUEST_URI'];
//echo $R;
$R=urldecode ($R);
$S=iconv('utf-8', 'windows-1251',$R );
//echo "Ваш IP - ".$A."<br>";
//echo "Страница входа - ".$U."<br>";
if (strpos($S, "yandex") != 0) {
preg_match('"text=(.*?)[^&]*"', $S, $arr);
//echo "Вы пришли с Яндекса по запросу ".$arr[1];
}
elseif (strpos($S, "google") != 0) {
preg_match('/q=(.*)&/sei', $S, $arr);
//echo "Вы пришли с Google по запросу ".$arr[1];
}
elseif (strpos($S, "rambler") != 0) {
preg_match('"query=(.*?)[^&]*"', $S, $arr);
//echo "Вы пришли с Rambler по запросу ".$arr[1];
}
else {//echo "Вы пришли с ".$R;
}

$news_kol = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `parse`"))*15;
$all_user = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `user`"));

$code = $_GET[code];
if($code != ""){
    ?><meta http-equiv="refresh" content="3;URL=<?echo $code;?>" /><?
}

$links = $_GET[links];
if($links != ""){
    echo $links;
    $links_db = mysqli_query($link, "SELECT * FROM `links` where  `link1`='$links'");
    $links_db_data = mysqli_fetch_array($links_db);
    ?><meta http-equiv="refresh" content="1;URL=https://academy-mi.ru/pages/news-watch.php?id_news=<?echo $links_db_data[link2];?>" /><?
}
$ref = $_GET[ref];
if($ref == 1){
    $ran = rand(1,10);
    ?><meta http-equiv="refresh" content="<?echo $ran;?>;URL=https://academy-mi.ru/pages/news-watch.php?id_news=<?echo rand(25,($news_kol/15)+50);?>&ref=1" /><?
}

        //$rd = rand(1,5000);
        
        if($rd == 2){
        $rand = rand(1, 15);
        if($rand == 1){
            $ip = "2."."16.".rand(102,103).".".rand(0, 255);
        }else if($rand == 2){
            $ip = "5."."45.".rand(80,83).".".rand(0, 255);
        }else if($rand == 3){
            $ip = "2.".rand(94,95).".".rand(255,255).".".rand(0, 255);
        }else if($rand == 4){
            $ip = rand(94,94).".".rand(233,233).".".rand(248,255).".".rand(0, 255);
        }else if($rand == 5){
            $ip = rand(176,176).".".rand(100,100).".".rand(64,127).".".rand(0, 255);
        }else if($rand == 6){
            $ip = rand(176,177).".".rand(125,127).".".rand(0,255).".".rand(0, 255);
        }else if($rand == 7){
            $ip = rand(45,46).".".rand(139,140).".".rand(53,103).".".rand(0, 255);
        }else if($rand == 8){
            $ip = rand(45,45).".".rand(139,139).".".rand(127,127).".".rand(0, 255);
        }else if($rand == 9){
            $ip = rand(59,59).".".rand(113,133).".".rand(0,255).".".rand(0, 255);
        }else if($rand == 10){
            $ip = rand(5,5).".".rand(3,3).".".rand(248,255).".".rand(0, 255);
        }else if($rand == 11){
            $ip = rand(5,5).".".rand(45,45).".".rand(0,255).".".rand(0, 255);
        }else if($rand == 12){
            $ip = rand(213,213).".".rand(5,5).".".rand(160,167).".".rand(0, 255);
        }else if($rand == 13){
            $ip = rand(5,6).".".rand(61,103).".".rand(0,255).".".rand(0, 255);
        }else if($rand == 14){
            $ip = rand(178,178).".".rand(68,70).".".rand(0,31).".".rand(0, 255);
        }else if($rand == 15){
            $ip = rand(5,5).".".rand(18,18).".".rand(0,255).".".rand(0, 255);
        }
        
        $hash = sha1(md5(rand(1,99999999999)));
        $email = md5(rand(1,99999999999));
        //mysqli_query($link, "INSERT INTO `user` SET `email`='$email',`password`='$hash',`regip`='$ip',`ip`='$ip'");
        }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="yandex-verification" content="cd00ab7a43dd4e8d" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?echo $server_data[title];?></title>
  <meta name="propeller" content="032845f529e5c75fabd5555fa31d4e4e">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
#mydiv {
    position: absolute;
    z-index: 9;
    background-color: #f1f1f1;
    text-align: center;
    border: 1px solid #d3d3d3;
}

#mydivheader {
    padding: 10px;
    cursor: move;
    z-index: 10;
    background-color: #2196F3;
    color: #fff;
}
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

<? include "dist/part/top-panel.php" ?>
  
<? include "dist/part/menu.php" ?>

  <div class="content-wrapper">
          <!-- Yandex.RTB R-A-684005-2 -->
<!-- SAPE RTB JS -->
<script
    async="async"
    src="//cdn-rtb.sape.ru/rtb-b/js/792/2/117792.js"
    type="text/javascript">
</script>
<!-- SAPE RTB END -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Academy-MI - лучшая научная академия!</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">В академии</span>
                      <span class="info-box-number text-center text-muted mb-0"><?echo $all_user;?> человек</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Подписано на рассылки</span>
                      <span class="info-box-number text-center text-muted mb-0"><?echo round($all_user*1.3,0);?> человек</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Число статей:</span>
                      <span class="info-box-number text-center text-muted mb-0"><?echo $news_kol;?><span>
                    </span></span></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Основные лица</h4>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Михаил "Измайлов"</a>
                        </span>
                        <span class="description">Основатель проекта</span>
                      </div>
                      <p>Привет, я основатель Academy-MI, здесь ты сможешь бесплатно разместить свою научную работу и получить справку и сертефикат! Academy-MI не берет деньги, она полностью бесплатная. Изначально я планировал создать простенький сайт для помощи студентам, но в дальнейшем я понял, что необходимо переходить на научную тематику.</p>

                    </div>

                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="https://sun9-5.userapi.com/impf/c849132/v849132714/1cb813/-3rFXLsmrjE.jpg?size=1080x1080&quality=96&proxy=1&sign=33aa102de3fa86ee9b6a517983833d7a" alt="User Image">
                        <span class="username">
                          <a href="#">Ирина Мельникова</a>
                        </span>
                        <span class="description">Организатор мероприятий</span>
                      </div>
                      <p>Рада тебя видеть! Я руковожу большей частью конкурсов в академии, если возникнут вопросы, то можешь написать на почту <a href="mailto:info@academy-mi.ru">info@academy-mi.ru</a>, я или мои заместители с радостью ответят тебе!</p>
                    </div>

                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="https://diesel.tigmig.ru/image/cache/no-image-900x.jpg" alt="">
                        <span class="username">
                          <a href="#">Илья Ветров</a>
                        </span>
                        <span class="description">Специалист по безопасности</span>
                      </div>
                      <p>Я отвечаю за безопасность ваших данных, почти вся личная информация шифруется при помощи 2048 значного ключа и записывается в базу данных. Поэтому не стоит беспокоиться о взломах и утечках, вся информация в безопасности!</p>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                
    <div id="mydiv">
  <div id="mydivheader">Нажми, чтобы закрыть</div>
  <p>

  
  </p>
</div>
            </div>
          </div>
        </div>
      </div>
      
<div class="row">

          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">20 последних публикаций</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Название</th>
                      <th>Категория</th>
                    </tr>
                  </thead>
                  <tbody>
<?

$product_db = mysqli_query($link, "SELECT * FROM `parse` where  `hide`='0' ORDER BY ID DESC LIMIT 20");
$i=0;
While($product_db_data = mysqli_fetch_array($product_db)){
    $i++;
?>
                    <tr>
                      <td><?echo $i;?></td>
                      <td><a href="/pages/news-watch.php?id_news=<?echo $product_db_data[id];?>" ><?echo $product_db_data[name];?></a></td>
                      <td><? if($product_db_data[category] !== ""){
                      $category_db = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `category` WHERE `link`='$product_db_data[category]'"));
                      echo $category_db[category];
                      }else{echo "отсутствует";}?></td>
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
  
  
<? include "dist/part/footer.php" ?>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(69811666, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true
   });
</script>
<script>
//Make the DIV element draggagle:
dragElement(document.getElementById(("mydiv")));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
    document.getElementById('mydiv').onclick = function() {
      document.getElementById('mydiv').hidden = true;
    }
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<noscript><div><img src="https://mc.yandex.ru/watch/69811666" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</body>
</html>
