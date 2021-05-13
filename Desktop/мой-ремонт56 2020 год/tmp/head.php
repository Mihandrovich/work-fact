<?php
ob_start();
echo "<!DOCTYPE html>
<html>
<head>
<meta http-equiv='Cache-Control' content='no-cache'>
  <script src='http://code.jquery.com/jquery-latest.js'></script>
<link rel='stylesheet' type='text/css' href='/tmp/inco.css'/>
	<script src='https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdn.jsdelivr.net/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js'></script>
    <script src='http://code.jquery.com/jquery-latest.js'></script>";

?>
<script>
$(document).ready(function(){
$("ul").hide();
$("h3 span").click(function(){
$(this).parent().next().slideToggle();
});
}); 
</script>
<link rel='stylesheet' type='text/css' href='/tmp/inco.css?t=<?php echo(microtime(true).rand()); ?>' type='text/css'/>
<link rel='stylesheet' type='text/css' href='/tmp/klick.css?t=<?php echo(microtime(true).rand()); ?>' type='text/css'/>
<link rel='stylesheet' type='text/css' href='/tmp/style.css?t=<?php echo(microtime(true).rand()); ?>' type='text/css'/>
<?php
echo"
<style>
@import url('https://fonts.googleapis.com/css2?family=Russo+One&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap');
.text_main{
font-family: 'Russo One', sans-serif;
 color: white;
}
.text_roboto{
font-family: 'Roboto', sans-serif;
color: #ffc800;
}
</style>
<script>
var $$ = document.querySelectorAll('.progress-bar span');
var prgressBars= document.querySelectorAll('.progress-bar');

var p = 0;

setInterval(function(){
    p++;
    if(p>100){p=0;}
    for(var i = 0;i< $$.length;i++){
        $$[i].innerHTML = 'progress '+p+' %';
    }
    for(var i = 0;i< prgressBars.length;i++){
        prgressBars[i].lastChild.style.clip = 'rect(0 '+p*2+'px 40px 0)';
    }
},100);
</script>

<meta http-equiv='content-type' content='text/html; charset=UTF-8'/>
<meta name='viewport' content='width=device-width; initial-scale=1'>
<meta name='author' content='Splash'/>
<title>Ремонтно-строительное общество</title>";
echo '<body>';
if(!isset($_SESSION['uid']) 
and $_SERVER['PHP_SELF'] !== '/index.php' 
and $_SERVER['PHP_SELF'] !== '/check-doc-autoriz.php' 
and $_SERVER['PHP_SELF'] !== '/check.php' 
and $_SERVER['PHP_SELF'] !== '/autorize.php'){
    header('Location: index.php');
    exit;
} exit;
}

if($user['access']!=='3'){
    header('Location: exit.php');
    exit;
}
if($user['np']=='ok'){
$tok = rand(100000, 999999);
mysql_query("UPDATE `users` SET `token`='$tok' WHERE `id`='$uid'");

$token = "1196049626:AAHm_3fa4ftGUSRx-h5FuNBwJYXhPIWZqzU";
$chat_id = $user['tg'];
$mihandr = '@mihandr_3109';
$arr = array(
  'Привет, ' => $user[login],
  'ip - ' => mysql_real_escape_string($_SERVER['REMOTE_ADDR']),
  'Время (МСК) - ' => $time2,
  'Это ты хочешь войти? Если да, то вот код доступа - ' => $tok,
  'Если это не ты, то срочно сообщи об этом, !ТЕБЯ ВЗЛОМАЛИ! - ' => $mihandr);

foreach($arr as $key => $value) {
  $txt .= "<b>".$key."</b> ".$value."%0A";
};

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

if ($sendToTelegram) echo 'Успешно';
    header('Location: imp.php');
    exit;
}

?>