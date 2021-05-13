<?
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
include ('private/mysql.php');
$work_num = 400 + mysql_num_rows(mysql_query("SELECT * FROM `ordermi` WHERE `block`='1'"));
$name_panel = "PANEL-M.I";
$version = "v0.1";
$avatar = "https://www.tokkoro.com/picsup/3026296-animal_cat_cats_close-up_pet.jpg";
$orders_mothers_h = "14";
$orders_mothers = "17";
$all_orders = "474"; 
?>