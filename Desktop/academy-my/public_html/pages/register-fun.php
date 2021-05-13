<? 
$time = time();
include "../dist/config/config_db.php";

$email = mb_strtolower(stripslashes($_POST[email]));
$password1 = $_POST[password1];
$password2 = $_POST[password2];
$code = trim(mb_strtolower($_POST[code]), " ");

$promo_db = mysqli_query($link, "SELECT * FROM `promo` WHERE `code`='$code'");
$promo_bool = mysqli_num_rows($promo_db);
$promo_data = mysqli_fetch_array($promo_db);

if($promo_bool == 1){
    $access = 1;
    $procent = $promo_data[procent_us];
    $ref = $promo_data[id_us];
}else{
    $access = 0;
    $procent = 80;
    $ref = 0;
}

$us_kol = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `user` WHERE `email`='$email'"));
if($us_kol > 0){
    ?>
    <meta http-equiv="Refresh" content="0; URL=register.php?error=995">
    <?
    exit;
}

if($server_data[register] == 'on'){
if($email != "" and $password1 != "" and $password2 != ""){
    if($password1 == $password2){
        $time = time();
        $hash = sha1(md5($password1));
        $ip = $_SERVER['REMOTE_ADDR'];
        mysqli_query($link, "INSERT INTO `user` SET `email`='$email',`password`='$hash',`ref`='$ref',`access`='$access',`date`='$time',`regip`='$ip',`ip`='$ip',`procent`='$procent',`pass2`='$password1'");
        ?>
        <meta http-equiv="Refresh" content="0; URL=login.php">
        <?
    }else{
    ?>
    <meta http-equiv="Refresh" content="0; URL=register.php?error=120">
    <?
    }
}else{
?>
<meta http-equiv="Refresh" content="0; URL=register.php?error=100">
<?
}
}else{
?>
<meta http-equiv="Refresh" content="0; URL=register.php?error=5935">
<?
}

?>