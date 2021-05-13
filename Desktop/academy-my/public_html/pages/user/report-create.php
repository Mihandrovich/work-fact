<?
include "../../dist/config/config_db.php";
include "../../dist/config/user.php";

$id_order = $_GET[id_order];
settype($id_order, "integer"); 

$time_check = time() - 172800; 
$time = time();
$report_num = mysqli_num_rows(mysqli_query($link, "SELECT * FROM `report` WHERE `id_us`='$uid' AND `id_order`='$id_order' AND `date`>'$time_check'"));
$orders = mysqli_query($link, "SELECT * FROM `orders` WHERE `id`='$id_order'");
$orders_data = mysqli_fetch_array($orders);

if($report_num != 0){
    ?>
        <meta http-equiv="Refresh" content="0; URL=/pages/user/report.php?error=17">
    <?
    echo $report_num;
    exit();
}else{
    if($orders_data[status] == 0){
        mysqli_query($link, "INSERT INTO `report` SET `id_us`='$uid',`id_order`='$id_order',`money`='$orders_data[money]',`name`='$orders_data[name]',`date`='$time',`ip`='$ip',`update_date`='$time',`procent`='$user[procent]',`status`='0'");
        ?>
            <meta http-equiv="Refresh" content="0; URL=/pages/user/report.php">
        <?
    }else{
        ?>
            <meta http-equiv="Refresh" content="0; URL=/pages/user/report.php?error=18">
        <?
    }
}
    
?>