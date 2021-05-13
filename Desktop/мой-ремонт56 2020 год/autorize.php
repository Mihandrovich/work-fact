<?php
session_start();
include ('private/mysql.php');
include ('tmp/head-check.php');


if($_GET['login'] == '' and $_GET['password'] == ''){
$login = mysql_real_escape_string(htmlspecialchars($_POST['login']));
$password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
}else{
$login = mysql_real_escape_string(htmlspecialchars($_GET['login']));
$password = mysql_real_escape_string(htmlspecialchars($_GET['password']));
}

$hash = md5(md5($password));

$q = mysql_query("SELECT * FROM `users` WHERE `login`='$login'");
$e = mysql_num_rows($q);
if($e == '0'){
    $_SESSION['enter_error'] = "true";
    header('Location: work-inco-autoriz.php');
    exit;
}
$w = mysql_fetch_assoc($q);

if($hash !== $w['password']){
    $_SESSION['enter_error'] = "true";
    header('Location: index.php');
    exit;
}
if($w[ip] == mysql_real_escape_string($_SERVER['REMOTE_ADDR'])){

$_SESSION['uid'] = $w['id'];

$uid = $_SESSION['uid'];

$set_online = time()+900;
mysql_query("UPDATE `users` SET `online`='$set_online' WHERE `id`='$uid'");
header('Location: work-inco.php');
exit;
}else{
$_SESSION['uid'] = $w['id'];

$uid = $_SESSION['uid'];

$set_online = time()+900;
$tok = rand(100000, 999999);
mysql_query("UPDATE `users` SET `online`='$set_online', `np`='ok', `token`='$tok' WHERE `id`='$uid'");
header('Location: work-inco.php');
exit;    
}
?>