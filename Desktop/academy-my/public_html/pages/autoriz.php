<? 
$time = time();
include "../dist/config/config_db.php";

$email = stripslashes($_POST[email]);
$password = $_POST[password];
$haystack = $email;
$needle   = '/';

$pos = strripos($haystack, $needle);
$size = strlen($haystack);

if ($pos === false) {
$haystack = $email;
$needle   = '&';

$pos = strripos($haystack, $needle);

if ($pos === false) {
    
if($email != "" and $password != ""){
    $hash = sha1(md5($password));
    $loginus = mysqli_query($link, "SELECT * FROM `user` WHERE `email`='$email' and `password`='$hash'");
    if(mysqli_num_rows($loginus) == 1){
        $loginus_data = mysqli_fetch_array($loginus);
        $_SESSION['uid'] = $loginus_data['id'];
        $uid = $_SESSION['uid'];
        echo "УСПЕШНО";
        mysqli_query($link, "INSERT INTO `log` SET `ip`='$ip',`id_us`='$uid',`date`='$time'");
        ?>
        <meta http-equiv="Refresh" content="0; URL=/index.php">
        <?
    }else{
        ?>
        <meta http-equiv="Refresh" content="0; URL=login.php?error=130">
        <?
    }
}else{
?>
<meta http-equiv="Refresh" content="0; URL=login.php?error=100">
<?
}
} else {
mysqli_query($link, "INSERT INTO `banip` SET `ip`='$ip',`date`='$time',`code`='666'");
        ?>
        <meta http-equiv="Refresh" content="0; URL=login.php?error=666">
        <?
}
} else {
mysqli_query($link, "INSERT INTO `banip` SET `ip`='$ip',`date`='$time',`code`='666'");
        ?>
        <meta http-equiv="Refresh" content="0; URL=login.php?error=666">
        <?
}

?>