<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php?err=" . base64_encode("notlogged"));
    exit;
}

require_once "dbconn.php";

?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Security Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    stylesheet for the username and password icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">-->


    <!--    <link rel="stylesheet" href="../css/loginForm.css" type="text/css">-->

    <!--    /*for alert messages*/-->
    <link rel="stylesheet" href="../css/forAlerts.css" type="text/css">
</head>

<body>
<header>
    <?php
    include 'header.php';
    include 'navbar.php';
    ?>

</header>

<footer>
    <?php
    include_once ("footer.php");
    ?>
</footer>

</body>
