<? include "../../dist/config/config_db.php";
include "../../dist/config/user.php";

$id = $_GET[id_us];
mysqli_query($link, "UPDATE `user` SET `pass`='11111111' WHERE `id`='$id'");
?>
<meta http-equiv="Refresh" content="0; URL=/pages/admin/adpanel.php">