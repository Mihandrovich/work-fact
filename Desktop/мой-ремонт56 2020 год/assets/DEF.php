<?
if($user['access']!=='3'){
    header('Location: exit.php');
    exit;
}
if($user['np']=='ok'){
$tok = rand(100000, 999999);
mysql_query("UPDATE `users` SET `token`='$tok' WHERE `id`='$uid'");
$time2 = time();
$time2 = date('d/m/Y g:i A', $time2);

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
    header('Location: imp.php');
if ($sendToTelegram) {echo 'ЗБС';
}else{echo 'ДА Е*****';}
    header('Location: imp.php');
    exit;
}
?>