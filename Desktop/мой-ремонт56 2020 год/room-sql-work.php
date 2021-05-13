<?php
session_start();
include ('private/mysql.php');
include ('tmp/head.php');
if($_GET['znach'] == ''){
$znach = mysql_real_escape_string(htmlspecialchars($_POST['znach']));
}else{
$znach = mysql_real_escape_string(htmlspecialchars($_GET['znach']));
}
$znachz = $znach.'1';
$price = 0;
$q = mysql_query("SELECT * FROM `room` WHERE `id`='$id'");
$w = mysql_fetch_assoc($q);

$spl = $w[spl];
$otcos = $w[otcos];
$spl_bez = $w[spl_bez];
$proem = $w[proem];
$perimetr = $w[perimetr];
$plintys = $w[plintys];
$s_pola_potolka = $w[s_pola_potolka];

$max_k = mysql_num_rows(mysql_query("SELECT * FROM `work` WHERE `kod`='".$znachz."'"));
$mn = mysql_fetch_assoc(mysql_query("SELECT * FROM `ordermi` WHERE `id`='".$w[id_order]."'"));
if($mn[block] == 0){
for ($x=1; $x<=$max_k; $x++){
$a = '$a'.$x;
$g = $znach.$x;
$a = mysql_real_escape_string(htmlspecialchars($_POST[$g]));
echo $a;
$znumb = '$z'.$znach.$x;  
$z2 = 'z'.$znach.$x;  
$z = mysql_real_escape_string(htmlspecialchars($_POST[$z2]));
$z = str_replace(',', '.', $z);
if($a == 'on'){$a = 1;$t = mysql_fetch_assoc(mysql_query("SELECT * FROM `work` WHERE `kod_name`='".$znach.$x."'"));
if($znumb == $t[ras]){$price = $price + ($t[price]*$z*$mn[mn]);}
else{$price = $price + ($t[price]*$w[$t[ras]]*$mn[mn]);}}
else{$a = 0;}
$bdz = $znach.$x;
mysql_query("UPDATE `work-room` SET `".$bdz."`='$a' WHERE `id_room`='$id'");
if($znumb == $t[ras]){
    mysql_query("UPDATE `work-room-z` SET `".$z2."`='$z' WHERE `id_room`='$id'");
}
echo $a1; echo '<br/>';
echo $t[ras]; echo '<br/>';
echo $bdz; echo '<hr/>';

}

mysql_query("UPDATE `work-room` SET `price_".$znach."`='$price' WHERE `id_room`='$id'");

$prw = mysql_fetch_assoc(mysql_query("SELECT * FROM `work-room` WHERE `id_room`='$id'"));
$prw_price = round($prw[price_1a] + $prw[price_2a] + $prw[price_3a] + $prw[price_4a] + $prw[price_5a] + $prw[price_6a] + $prw[price_7a] + $prw[price_1b] + $prw[price_2b] + $prw[price_3b] + $prw[price_4b]  + $prw[price_5b] + $prw[price_6b] + $prw[price_7b] + $prw[price_1c] + $prw[price_2c] + $prw[price_3c] + $prw[price_4c] + $prw[price_5c] + $prw[price_6c] + $prw[price_1g] + $prw[price_2g] + $prw[price_3g] + $prw[price_4g] + $prw[price_5g] + $prw[price_6g] + $prw[price_7g] + $prw[price_8g] + $prw[price_9g], 2);
mysql_query("UPDATE `room` SET `price`='$prw_price' WHERE `id`='$id'");
    header('Location: room-form-work.php?znach='.$znach.'&id='.$id.'');
}else{
    header('Location: room-form-work.php?znach='.$znach.'&id='.$id.'');
exit; 
}
?>