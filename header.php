<?php
include_once "includes/connect.inc.php";
?>
<!DOCTYPE html>  <!--<  saved 559 lines of code ">-->
<html lang="">
<head>
    <title>CS Symposium System | About</title>
    <link rel="stylesheet" type="text/css" href="style/f.css">
</head>
<body>
<header>
    <div class="container">
        <div >
            <h1>
                <span class="highlight"   role="button">CS S</span>ymposium System
            </h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php" class="g">About</a></li>
                <?=($_SESSION['user_type'] == 'admin' ? '<li><a href="service.php" class="g">Services</a></li>' : FALSE)?>
                <li><a href="schedule.php" class="g">Schedule at a Glance</a></li>
                <li><a href="floor_map.php" class="g">Floor Map</a></li>
                <li><a href="login.php" class="g"><?=($_SESSION['user_type'] ? 'Logout' :'Login') ?></a></li>
            </ul>
        </nav>
    </div>
</header>
<section class="main">
    <div class="container">
        <article id="main-col">
            <ul id="services">
                <li>
                    <body>
