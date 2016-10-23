<?php

switch ($page)
{
case "tree" :
    //include 'mlm.php';
    header("location: mlm.php");
    break;
case "down" :
    //header("location: finalregd.php");
    //include 'includes/registerdownline.php';
    include 'includes/registerme.php';
    break;
case "kyc" :
    //header("location: finalregd.php");
    include 'includes/kyc.php';
    break;
case "redg" :
    include 'includes/downliner.php';
    break;
case "summery" :
    include 'includes/summery.php';
    break;
case "transaction" :
    include 'includes/transaction.php';
    break;
case "update" :
    include 'includes/update.php';
    break;
default :
    include 'includes/dashboard.php';
}

