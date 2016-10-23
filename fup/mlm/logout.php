<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
unset($_SESSION['myemail']);
unset($_SESSION['uname']);
//session_destroy();// set the expiration date to one hour ago
setcookie("LOCATION", "", time() - 3600);

echo "<script>window.location='../index.php';</script>";

