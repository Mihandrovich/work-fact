<?php
ob_start();
error_reporting(0);
function gen_timer_start(){
    global $timer_start_time;
    $start_time = microtime();
    $start_array = explode(" ",$start_time);
    $timer_start_time = $start_array[1] + $start_array[0];
    return $timer_start_time;
}
gen_timer_start();
$host="localhost";
$user="############";
$password="############";
$db="###########";

mysql_connect($host, $user, $password) or die("MySQL сервер недоступен!".mysql_error());
mysql_select_db($db) or die("Нет соединения с БД".mysql_error());
mysql_query('SET names "utf8"');

function set ($key, $data){$_SESSION[$key]=$data;}
function view ($key){echo $_SESSION[$key];}
function clear ($key){unset($_SESSION[$key]);}

$uid = $_SESSION['uid'];
@$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id`='$uid'"));
$log = $user['login'];

$sd = strip_tags($_GET['sd']);
$sd = addslashes($sd);
$sd = htmlspecialchars($sd);
$sd = mysql_real_escape_string($sd);

$id = intval($_GET['id']);
$id = strip_tags($id);
$id = addslashes($id);
$id = htmlspecialchars($id);
$id = mysql_real_escape_string($id);
