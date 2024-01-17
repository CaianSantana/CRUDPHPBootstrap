<?php
session_start();

!isset($_SESSION['logged']) ? header("location:index.php?msg=data_error") : '';