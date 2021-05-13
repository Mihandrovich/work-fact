<?php
session_start();
include ('private/mysql.php');
include ('tmp/head-check.php');

session_destroy();
header('Location: index.php');
exit;

?>