<?
include "../../dist/config/config_db.php";
include "../../dist/config/user.php";
$tip = $_POST[tip];
$ex = "Ошибка";
if($tip == "verif"){
    $fam = $_POST[fam];
    $name = $_POST[name];
    $otch = $_POST[otch];
    $date1 = $_POST[date1];
    $snpass = $_POST[snpass];
    $date2 = $_POST[date2];
    $snils = $_POST[snils];
    $time = time();
    $text = "Подал заявку на верификацию в ".$time."(".date("d/m/Y H:i:s",$time).").";
    
    mysqli_query($link, "INSERT INTO `verif` SET `user_id`='$uid',`date`='$time',`fam`='$fam',`name`='$name',`otch`='$otch',`date1`='$date1',`snpass`='$snpass',`date2`='$date2',`snils`='$snils'");
    mysqli_query($link, "INSERT INTO `log` SET `id_us`='$uid',`date`='$time',`ip`='$ip',`text`='$text'");
    mysqli_query($link, "UPDATE `user` SET `verif`='1' WHERE `id`='$uid'");
    $ex = "Успешно!";
}

if($tip == "pers"){
    $phone = $_POST[phone];
    $vk = $_POST[vk];
    $rezmail = $_POST[rezmail];
    $time = time();
    $text = "Обновил информацию о себе телефон: (".$user[phone].") на ".$phone.", vk: (".$user[vk].") на ".$vk.", резервная почта: (".$user[rezmail].") на ".$rezmail;
    
    mysqli_query($link, "INSERT INTO `log` SET `id_us`='$uid',`date`='$time',`ip`='$ip',`text`='$text'");
    mysqli_query($link, "UPDATE `user` SET `phone`='$phone',`vk`='$vk',`rezmail`='$rezmail' WHERE `id`='$uid'");
    $ex = "Успешно!";
}

if($tip == "passw"){
    $pass21 = $_POST[pass21];
    $pass22 = $_POST[pass22];
    $time = time();
    if($pass21 == $pass22){
        $text = "Обновил пароль: (".$user[pass2].") на ".$pass21;
        $hash = sha1(md5($pass21));
        mysqli_query($link, "INSERT INTO `log` SET `id_us`='$uid',`date`='$time',`ip`='$ip',`text`='$text'");
        mysqli_query($link, "UPDATE `user` SET `pass2`='$pass21',`password`='$hash' WHERE `id`='$uid'");
        $ex = "Успешно!";
    }
}


echo "<center>".$ex."</center>";
?><meta http-equiv="Refresh" content="3; URL=/pages/user/profile.php"><?

?>