<?php
$dir= getcwd();
$ishome="fixed-top ";
$isadmin="";
 if(strpos($dir, 'dashboard')){
   
    $ishome="top-nav-collapse";
    $isadmin="d-none";
    
 }
  
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Joe's Diner</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/css/mdb.min.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <?php
    if($isadmin){ ?>
    <link rel="stylesheet" href="../css/dashboard.css">
    <?php } ?>
  </head>

  <body id="page-top">

