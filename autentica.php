<?php
include('DBConn.php');
if(isset($_POST['user']) && isset( $_POST['password'])){
    $dbconn = DBConn::getInstance();
    $user = $_POST['user'];
    $password = $_POST['password'];
    $login = array('role' => $user, 'password' => $password);
    if($dbconn->select("roles", $login)){
        echo"Bem Vindo ".$user."!";
        $_SESSION['logged'] = true;
        exit;
    } else{
        header("location:index.php?msg=login_error");
    }

}else{
    header("location:index.php?msg=data_error");
}

