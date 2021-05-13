<? 
include "../dist/config/config_db.php";
if($_POST[password] != ""){
    $password = $_POST[password];    
}else{
    $password = $_GET[password];
}
if($user[access] < 4){
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}
if($password != ""){
    $email = $user[email];
    $hash = sha1(md5($password));
    $loginus = mysqli_query($link, "SELECT * FROM `user` WHERE `email`='$email' and `password`='$hash'");
    if(mysqli_num_rows($loginus) == 1){
        $loginus_data = mysqli_fetch_array($loginus);
        $_SESSION['adminid'] = $loginus_data['id'];
        $adminid = $_SESSION['adminid'];
        ?>
        <meta http-equiv="Refresh" content="0; URL=user/panel.php">
        <?
        }else{
        ?>
        <meta http-equiv="Refresh" content="0; URL=uslogmin.php?error=590">
        <?
    }
}else{
?>
<meta http-equiv="Refresh" content="0; URL=uslogmin.php?error=100">
<?
}


?>