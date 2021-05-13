<?php
session_start();
include ('private/mysql.php');
include ('tmp/head-check.php');


if($_GET['login'] == '' and $_GET['phone'] == ''){
$login = mysql_real_escape_string(htmlspecialchars($_POST['login']));
$phone = mysql_real_escape_string(htmlspecialchars($_POST['phone']));
}else{
$login = mysql_real_escape_string(htmlspecialchars($_GET['login']));
$phone = mysql_real_escape_string(htmlspecialchars($_GET['phone']));
}
echo"$login $phone";
if($login == '56' and $phone == '+7 (908) 323-24-56'){
    header('Location: /work-inco-autoriz.php');
    exit();
}else{
$login = $login - 1000000000;
$q = mysql_query("SELECT * FROM `ordermi` WHERE `id`='$login'");
$e = mysql_num_rows($q);
echo ''.$phone.' '.$login.'';
if($e == '0'){
    $_SESSION['enter_error'] = "true";
    header('Location: check.php');
    exit;
}
$w = mysql_fetch_assoc($q);

if($phone !== $w['phone']){
    $_SESSION['enter_error'] = "true";
    header('Location: check.php');
    exit;
}
$id = 1000000000 + $w['id'];
$_SESSION['uid'] = $id;

$uid = $_SESSION['uid'];

header('Location: check-doc.php');
exit;
}
?>