<?php 
session_start();
include_once('../config/Db.php');
//include_once 'autoload.php';
unset($_SESSION['cubeadmin_sess']);
session_destroy();
header("Location:index.php");

 ?>