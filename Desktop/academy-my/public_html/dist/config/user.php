<?
if($user[access] < 1){
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}
if($_SESSION['adminid'] < 0){
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}
if($_SESSION['uid'] < 0){
    ?>
    <meta http-equiv="Refresh" content="0; URL=/index.php">
    <?
}