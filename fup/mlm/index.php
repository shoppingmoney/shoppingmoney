<?php
session_start();
if(isset($_SESSION['myemail'])){
header('location:panel.php');
}else{
header('location: ../index.php');
}
?>
