<?php
session_start();
!isset($_SESSION['logged']) || $_SESSION['logged'] == false ?  header("location:../index.php?msg=data_error") : '';

