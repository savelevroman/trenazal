<?php 
session_start();
$_SESSION['id_user'] = $user['id_user'];
$_SESSION['login'] = $user['login'];
$_SESSION['fio'] = $user['fio'];
$_SESSION['role'] = $user['role'];
unset($_SESSION['id_user']);
unset($_SESSION['login']);
unset($_SESSION['fio']);
unset($_SESSION['role']);
header("Location: index.php");
?>