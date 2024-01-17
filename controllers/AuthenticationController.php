<?php
session_start();
include('../models/DBConn.php');
if(isset($_POST['user']) && isset( $_POST['password'])){
    $dbconn = DBConn::getInstance();
    $user = $_POST['user'];
    $password = $_POST['password'];
    $login = array('role' => $user, 'password' => $password);
    if($dbconn->select("roles", $login)){
        $_SESSION['logged'] = true;
        $_SESSION['user'] = $user;
        header("location:../views/menu.php");
        exit;
    } else{
        header("location:../index.php?msg=login_error");
    }

}else{
    header("location:../index.php?msg=data_error");
}

