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
<div class="wrapper3">

    <div class="container-fluid">

        <div class="row3">
            <table class = "outputTable" id="output">
                <!--                <table class = "outputTable" id="output" style="width: 85%; height: 20%; text-align: center">-->
                <?php $id = $_GET['id'];?>

                <colgroup>
                    <col span="1" style="width: 10%">
                    <col span="1" style="width: 10%">
                    <col span="1" style="width: 10%">

                </colgroup>

                <tr bgcolor="#afeeee" style="text-align: center">
                    <th style='text-align: center'>IP Address</th>
                    <th style='text-align: center'>OS</th>
                    <th style='text-align: center'>More info</th>

                </tr>

            </table>

        </div>

    </div>

</div>

</body>

</html>
