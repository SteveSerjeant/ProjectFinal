<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php?err=" . base64_encode("notlogged"));
    exit;
}

?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Security Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>

<header>
    <?php
    include 'headerVTwo.php';
    ?>
</header>


<section>
    <p>
    <h1>Hello World!</h1>
    </p>
    This will be for the user guide

</section>

</body>

<footer>
    <?php
    include_once ("footer.php");
    ?>
</footer>

</html>
