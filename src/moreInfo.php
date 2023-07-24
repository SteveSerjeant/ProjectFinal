<!DOCTYPE html>
<html lang="en">

<?php
include_once ("dbconn.php");

session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php?err=" . base64_encode("notlogged"));
    exit;

}
?>

<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/outputTable.css" type="text/css">

</head>

<body>
<header>
    <?php
    include 'headerVTwo.php';
    ?>
</header>

<section>
    <div class="text">
        <p>
        <h1>This page was intended to show further info dynamically from the NVD website.</h1>
        </p>
    </div>
    <div class="text">
        <p>
        <h1>However, development on this aspect was sadly incomplete.</h1>
        </p>
    </div>

</section>

</body>

</html>
