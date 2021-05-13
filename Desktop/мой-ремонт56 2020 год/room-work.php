<?php
session_start();
include ('private/mysql.php');
include ('tmp/head.php');

switch($sd){
default:
break;

case 'create-room':
    $nameroom = "Комната";
    $ord = mysql_fetch_assoc(mysql_query("SELECT * FROM `ordermi` WHERE `id`='$id'"));
    if($ord[block] == 0){
    mysql_query("INSERT INTO `room` SET `name`='$nameroom',`id_order`='$id',`mn`='$ord[mn]'");
    $q = mysql_query("SELECT * FROM `room` WHERE `id_order`='$id' ORDER BY id DESC");
    $w = mysql_fetch_assoc($q);
    $idroom = $w[id];
    mysql_query("INSERT INTO `work-room` SET `id_room`='$idroom',`id_order`='$id'");
    mysql_query("INSERT INTO `work-room-z` SET `id_room`='$idroom',`id_order`='$id'");
    header('Location:/work-worklist.php?sd=setting-room&id='.$idroom.'');
    exit; 
    }else{
    header('Location:/work-worklist.php?sd=edit&id='.$id.'');
    exit; 
    }
break;

case 'delete-room':
    $q = mysql_query("SELECT * FROM `room` WHERE `id`='$id'");
    $w = mysql_fetch_assoc($q);
    $ord = mysql_fetch_assoc(mysql_query("SELECT * FROM `ordermi` WHERE `id`='$w[id_order]'"));
    if($ord[block] == 0){
    $idroom = $w[id];
    $idorder = $w[id_order];
    $nameroom = "Комната";
    mysql_query("DELETE FROM `work-room` WHERE `id`='$id'");
    mysql_query("DELETE FROM `work-room-z` WHERE `id`='$id'");
    mysql_query("DELETE FROM `room` WHERE `id`='$id'");
    header('Location:/work-worklist.php?sd=edit&id='.$idorder.'');
    exit; 
    }else{
    header('Location:/work-worklist.php?sd=edit&id='.$id.'');
    exit; 
    }    
break;

case 'setting-room':
    $q = mysql_query("SELECT * FROM `room` WHERE `id`='$id'");
    $w = mysql_fetch_assoc($q);
    $ord = mysql_fetch_assoc(mysql_query("SELECT * FROM `ordermi` WHERE `id`='$w[id_order]'"));
    if($ord[block] == 0){
if($_GET['name'] == '' and $_GET['length'] == ''){
$name = mysql_real_escape_string(htmlspecialchars($_POST['name']));
$length = mysql_real_escape_string(htmlspecialchars($_POST['length']));
$width = mysql_real_escape_string(htmlspecialchars($_POST['width']));
$height = mysql_real_escape_string(htmlspecialchars($_POST['height']));
$windowsh1 = mysql_real_escape_string(htmlspecialchars($_POST['windowsh1']));
$windowsw1 = mysql_real_escape_string(htmlspecialchars($_POST['windowsw1']));
$windowsh2 = mysql_real_escape_string(htmlspecialchars($_POST['windowsh2']));
$windowsw2 = mysql_real_escape_string(htmlspecialchars($_POST['windowsw2']));
$windowsh3 = mysql_real_escape_string(htmlspecialchars($_POST['windowsh3']));
$windowsw3 = mysql_real_escape_string(htmlspecialchars($_POST['windowsw3']));
$windowsh4 = mysql_real_escape_string(htmlspecialchars($_POST['windowsh4']));
$windowsw4 = mysql_real_escape_string(htmlspecialchars($_POST['windowsw4']));
$windowsh5 = mysql_real_escape_string(htmlspecialchars($_POST['windowsh5']));
$windowsw5 = mysql_real_escape_string(htmlspecialchars($_POST['windowsw5']));
$windowsh6 = mysql_real_escape_string(htmlspecialchars($_POST['windowsh6']));
$windowsw6 = mysql_real_escape_string(htmlspecialchars($_POST['windowsw6']));
$windowsh7 = mysql_real_escape_string(htmlspecialchars($_POST['windowsh7']));
$windowsw7 = mysql_real_escape_string(htmlspecialchars($_POST['windowsw7']));
$windowsh8 = mysql_real_escape_string(htmlspecialchars($_POST['windowsh8']));
$windowsw8 = mysql_real_escape_string(htmlspecialchars($_POST['windowsw8']));
$windowsh9 = mysql_real_escape_string(htmlspecialchars($_POST['windowsh9']));
$windowsw9 = mysql_real_escape_string(htmlspecialchars($_POST['windowsw9']));
$windowsh10 = mysql_real_escape_string(htmlspecialchars($_POST['windowsh10']));
$windowsw10 = mysql_real_escape_string(htmlspecialchars($_POST['windowsw10']));
$doorh1 = mysql_real_escape_string(htmlspecialchars($_POST['doorh1']));
$doorw1 = mysql_real_escape_string(htmlspecialchars($_POST['doorw1']));
$doorh2 = mysql_real_escape_string(htmlspecialchars($_POST['doorh2']));
$doorw2 = mysql_real_escape_string(htmlspecialchars($_POST['doorw2']));
$doorh3 = mysql_real_escape_string(htmlspecialchars($_POST['doorh3']));
$doorw3 = mysql_real_escape_string(htmlspecialchars($_POST['doorw3']));
$doorh4 = mysql_real_escape_string(htmlspecialchars($_POST['doorh4']));
$doorw4 = mysql_real_escape_string(htmlspecialchars($_POST['doorw4']));
$doorh5 = mysql_real_escape_string(htmlspecialchars($_POST['doorh5']));
$doorw5 = mysql_real_escape_string(htmlspecialchars($_POST['doorw5']));
$doorh6 = mysql_real_escape_string(htmlspecialchars($_POST['doorh6']));
$doorw6 = mysql_real_escape_string(htmlspecialchars($_POST['doorw6']));
$doorh7 = mysql_real_escape_string(htmlspecialchars($_POST['doorh7']));
$doorw7 = mysql_real_escape_string(htmlspecialchars($_POST['doorw7']));
$doorh8 = mysql_real_escape_string(htmlspecialchars($_POST['doorh8']));
$doorw8 = mysql_real_escape_string(htmlspecialchars($_POST['doorw8']));
$doorh9 = mysql_real_escape_string(htmlspecialchars($_POST['doorh9']));
$doorw9 = mysql_real_escape_string(htmlspecialchars($_POST['doorw9']));
$doorh10 = mysql_real_escape_string(htmlspecialchars($_POST['doorh10']));
$doorw10 = mysql_real_escape_string(htmlspecialchars($_POST['doorw10']));
}else{
$name = mysql_real_escape_string(htmlspecialchars($_GET['name']));
$length = mysql_real_escape_string(htmlspecialchars($_GET['length']));
$width = mysql_real_escape_string(htmlspecialchars($_GET['width']));
$height = mysql_real_escape_string(htmlspecialchars($_GET['height']));
$windowsh1 = mysql_real_escape_string(htmlspecialchars($_GET['windowsh1']));
$windowsw1 = mysql_real_escape_string(htmlspecialchars($_GET['windowsw1']));
$windowsh2 = mysql_real_escape_string(htmlspecialchars($_GET['windowsh2']));
$windowsw2 = mysql_real_escape_string(htmlspecialchars($_GET['windowsw2']));
$windowsh3 = mysql_real_escape_string(htmlspecialchars($_GET['windowsh3']));
$windowsw3 = mysql_real_escape_string(htmlspecialchars($_GET['windowsw3']));
$windowsh4 = mysql_real_escape_string(htmlspecialchars($_GET['windowsh4']));
$windowsw4 = mysql_real_escape_string(htmlspecialchars($_GET['windowsw4']));
$windowsh5 = mysql_real_escape_string(htmlspecialchars($_GET['windowsh5']));
$windowsw5 = mysql_real_escape_string(htmlspecialchars($_GET['windowsw5']));
$windowsh6 = mysql_real_escape_string(htmlspecialchars($_GET['windowsh6']));
$windowsw6 = mysql_real_escape_string(htmlspecialchars($_GET['windowsw6']));
$windowsh7 = mysql_real_escape_string(htmlspecialchars($_GET['windowsh7']));
$windowsw7 = mysql_real_escape_string(htmlspecialchars($_GET['windowsw7']));
$windowsh8 = mysql_real_escape_string(htmlspecialchars($_GET['windowsh8']));
$windowsw8 = mysql_real_escape_string(htmlspecialchars($_GET['windowsw8']));
$windowsh9 = mysql_real_escape_string(htmlspecialchars($_GET['windowsh9']));
$windowsw9 = mysql_real_escape_string(htmlspecialchars($_GET['windowsw9']));
$windowsh10 = mysql_real_escape_string(htmlspecialchars($_GET['windowsh10']));
$windowsw10 = mysql_real_escape_string(htmlspecialchars($_GET['windowsw10']));
$doorh1 = mysql_real_escape_string(htmlspecialchars($_GET['doorh1']));
$doorw1 = mysql_real_escape_string(htmlspecialchars($_GET['doorw1']));
$doorh2 = mysql_real_escape_string(htmlspecialchars($_GET['doorh2']));
$doorw2 = mysql_real_escape_string(htmlspecialchars($_GET['doorw2']));
$doorh3 = mysql_real_escape_string(htmlspecialchars($_GET['doorh3']));
$doorw3 = mysql_real_escape_string(htmlspecialchars($_GET['doorw3']));
$doorh4 = mysql_real_escape_string(htmlspecialchars($_GET['doorh4']));
$doorw4 = mysql_real_escape_string(htmlspecialchars($_GET['doorw4']));
$doorh5 = mysql_real_escape_string(htmlspecialchars($_GET['doorh5']));
$doorw5 = mysql_real_escape_string(htmlspecialchars($_GET['doorw5']));
$doorh6 = mysql_real_escape_string(htmlspecialchars($_GET['doorh6']));
$doorw6 = mysql_real_escape_string(htmlspecialchars($_GET['doorw6']));
$doorh7 = mysql_real_escape_string(htmlspecialchars($_GET['doorh7']));
$doorw7 = mysql_real_escape_string(htmlspecialchars($_GET['doorw7']));
$doorh8 = mysql_real_escape_string(htmlspecialchars($_GET['doorh8']));
$doorw8 = mysql_real_escape_string(htmlspecialchars($_GET['doorw8']));
$doorh9 = mysql_real_escape_string(htmlspecialchars($_GET['doorh9']));
$doorw9 = mysql_real_escape_string(htmlspecialchars($_GET['doorw9']));
$doorh10 = mysql_real_escape_string(htmlspecialchars($_GET['doorh10']));
$doorw10 = mysql_real_escape_string(htmlspecialchars($_GET['doorw10']));
}

$length = str_replace(',', '.', $length);
$width = str_replace(',', '.', $width);
$height = str_replace(',', '.', $height);

$doorh1 = str_replace(',', '.', $doorh1);
$doorw1 = str_replace(',', '.', $doorw1);
$doorh2 = str_replace(',', '.', $doorh2);
$doorw2 = str_replace(',', '.', $doorw2);
$doorh3 = str_replace(',', '.', $doorh3);
$doorw3 = str_replace(',', '.', $doorw3);
$doorh4 = str_replace(',', '.', $doorh4);
$doorw4 = str_replace(',', '.', $doorw4);
$doorh5 = str_replace(',', '.', $doorh5);
$doorw5 = str_replace(',', '.', $doorw5);
$doorh6 = str_replace(',', '.', $doorh6);
$doorw6 = str_replace(',', '.', $doorw6);
$doorh7 = str_replace(',', '.', $doorh7);
$doorw7 = str_replace(',', '.', $doorw7);
$doorh8 = str_replace(',', '.', $doorh8);
$doorw8 = str_replace(',', '.', $doorw8);
$doorh9 = str_replace(',', '.', $doorh9);
$doorw9 = str_replace(',', '.', $doorw9);
$doorh10 = str_replace(',', '.', $doorh10);
$doorw10 = str_replace(',', '.', $doorw10);

$windowsh1 = str_replace(',', '.', $windowsh1);
$windowsw1 = str_replace(',', '.', $windowsw1);
$windowsh2 = str_replace(',', '.', $windowsh2);
$windowsw2 = str_replace(',', '.', $windowsw2);
$windowsh3 = str_replace(',', '.', $windowsh3);
$windowsw3 = str_replace(',', '.', $windowsw3);
$windowsh4 = str_replace(',', '.', $windowsh4);
$windowsw4 = str_replace(',', '.', $windowsw4);
$windowsh5 = str_replace(',', '.', $windowsh5);
$windowsw5 = str_replace(',', '.', $windowsw5);
$windowsh6 = str_replace(',', '.', $windowsh6);
$windowsw6 = str_replace(',', '.', $windowsw6);
$windowsh7 = str_replace(',', '.', $windowsh7);
$windowsw7 = str_replace(',', '.', $windowsw7);
$windowsh8 = str_replace(',', '.', $windowsh8);
$windowsw8 = str_replace(',', '.', $windowsw8);
$windowsh9 = str_replace(',', '.', $windowsh9);
$windowsw9 = str_replace(',', '.', $windowsw9);
$windowsh10 = str_replace(',', '.', $windowsh10);
$windowsw10 = str_replace(',', '.', $windowsw10);
$windowsw = $windowsw1 + $windowsw2 + $windowsw3 + $windowsw4 + $windowsw5 + $windowsw6 + $windowsw7 + $windowsw8 + $windowsw9 +  $windowsw10;
$windows_s = ($windowsh1 * $windowsw1) + ($windowsh2 * $windowsw2) + ($windowsh3 * $windowsw3) + ($windowsh4 * $windowsw4) + ($windowsh5 * $windowsw5) + ($windowsh6 * $windowsw6) + ($windowsh7 * $windowsw7) + ($windowsh8 * $windowsw8) + ($windowsh9 * $windowsw9) + ($windowsh10 * $windowsw10);


if($name !== '' and
$length > '0' and
$width > '0' and
$height > '0'){
    
mysql_query("UPDATE `room` SET `name`='$name',`width`='$width',`length`='$length',`height`='$height',`windowsw`='$windowsw',`windows_s`='$windows_s',
`windowsh1`='$windowsh1',`windowsh2`='$windowsh2',`windowsh3`='$windowsh3',`windowsh4`='$windowsh4',`windowsh5`='$windowsh5',`windowsh6`='$windowsh6',`windowsh7`='$windowsh7',`windowsh8`='$windowsh8',`windowsh9`='$windowsh9',`windowsh10`='$windowsh10',
`windowsw1`='$windowsw1',`windowsw2`='$windowsw2',`windowsw3`='$windowsw3',`windowsw4`='$windowsw4',`windowsw5`='$windowsw5',`windowsw6`='$windowsw6',`windowsw7`='$windowsw7',`windowsw8`='$windowsw8',`windowsw9`='$windowsw9',`windowsw10`='$windowsw10',
`doorh1`='$doorh1',`doorh2`='$doorh2',`doorh3`='$doorh3',`doorh4`='$doorh4',`doorh5`='$doorh5',`doorh6`='$doorh6',`doorh7`='$doorh7',`doorh8`='$doorh8',`doorh9`='$doorh9',`doorh10`='$doorh10',
`doorw1`='$doorw1',`doorw2`='$doorw2',`doorw3`='$doorw3',`doorw4`='$doorw4',`doorw5`='$doorw5',`doorw6`='$doorw6',`doorw7`='$doorw7',`doorw8`='$doorw8',`doorw9`='$doorw9',`doorw10`='$doorw10' WHERE `id`='$id'");

header('Location: work-worklist.php?sd=edit-room&id='.$id.'');
exit;    

}else{
    header('Location: work-worklist.php?sd=edit-room&id='.$id.'');
    exit; 
}
    }else{
    header('Location:/work-worklist.php?sd=edit&id='.$id.'');
    exit; 
    }  
break;
}
?>