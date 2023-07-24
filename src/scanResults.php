<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

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

    <!--    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">-->
    <!--    <link rel="stylesheet" href="../css/forNavbar.css" type="text/css">-->

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
            <table class = "outputTable" id="output" style="width: 50%; height: 20%; text-align: center">
                <?php $id = $_GET['id'];?>
                <colgroup>
                    <col span="1" style="width: 10%">

                </colgroup>
                <tr bgcolor="#afeeee" style="text-align: center">
                    <th style='text-align: center'>Scan Date</th>
                </tr>
                <tr style='text-align: center'>
                    <td style='text-align: center' ><?php echo "$id"?></td>
                </tr>


            </table>
            <table class = "outputTable" id="output" style="width: 85%; height: 20%; text-align: center">
                <?php $id = $_GET['id'];?>

                <colgroup>
                    <col span="1" style="width: 10%">
                    <col span="1" style="width: 10%">
                    <col span="1" style="width: 10%">


                </colgroup>

                <tr bgcolor="#afeeee" style="text-align: center">
                    <th style='text-align: center'>Host Name</th>
                    <th style='text-align: center'>IP Address</th>
                    <th style='text-align: center'>MAC Address</th>

                </tr>

                <?php

                $stmt = $con->prepare("CALL showScanDetails(?)");
                $stmt->bind_param('s', $id);

                if (!$stmt->execute()){

                    echo "ERROR: " . $stmt->error;
                }
                else {
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr style='text-align: center' >";
                        echo "<td style='text-align: center' >" . $row['hostName'] . "</td>";
                        echo "<td style='text-align: center'>" . $row['ipAddress'] . "</td>";
                        echo "<td style='text-align: center'>" . $row['macAddress'] . "</td>";
                        echo "</tr>";
                    }

                }
                $stmt->close();
                mysqli_close($con);
                ?>

            </table>

        </div>

    </div>

</div>
</html>
