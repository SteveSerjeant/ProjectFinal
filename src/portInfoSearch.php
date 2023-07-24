<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "dbconn.php";

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <title>Security Dashboard</title>
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

<div class="wrapper3">
    <div class = "row3">
        <table class = "outputTable" id="output" style="width: 50%; height: 20%; text-align: center">
            <?php $id = $_POST['id'];?>
            <colgroup>
                <col span="1" style="width: 10%">

            </colgroup>
            <tr bgcolor="#afeeee" style="text-align: center">
                <th style='text-align: center'>IP Address</th>
            </tr>
            <tr style='text-align: center'>
                <td style='text-align: center' ><?php echo "$id"?></td>
            </tr>


        </table>

    <table class = "outputTable" id="output" style="width: 50%; height: 20%; text-align: center">
        <?php $toSearch = $_POST['toSearch'];?>
        <colgroup>
            <col span="1" style="width: 10%">

        </colgroup>
        <tr bgcolor="#afeeee" style="text-align: center">
            <th style='text-align: center'>Search String</th>
        </tr>
        <tr style='text-align: center'>
            <td style='text-align: center' ><?php echo "$toSearch"?></td>
        </tr>
    </table>

</div>
    <div class="wrapper3">

        <?php
        $sql = "SELECT * FROM portinfo WHERE CONCAT(ipAddress, '', portID, '', state, '', serviceName, '', timestamp, '') LIKE '%$toSearch%'";
        $result = $con->query($sql);

        if ($result->num_rows == 0) {

            ?>

            <table class = "outputTable" id="output" style="width: 50%; height: 20%; text-align: center">
                <colgroup>
                    <col span="1" style="width: 10%">
                </colgroup>
                <tr bgcolor="#afeeee" style="text-align: center">
                    <th style='text-align: center'>No results found, please try again</th>
                </tr>

            </table>

            <?php
        }
        else {

        ?>

        <table class = "outputTable" id="output" style="width: 60%; height: 20%; text-align: center">
            <colgroup>
                <col span="1" style="width: 20%">
                <col span="1" style="width: 20%">
                <col span="1" style="width: 20%">
                <col span="1" style="width: 20%">
            </colgroup>

            <tr bgcolor="#afeeee" style="text-align: center; margin-top: 5px">
                <th style='text-align: center'>Scan Date</th>
                <th style='text-align: center'>Port ID</th>
                <th style='text-align: center'>State</th>
                <th style='text-align: center'>Service</th>
            </tr>


            <?php
            echo "";
            while ($row = $result->fetch_assoc()) {
                echo "<tr style='text-align: center' >";
                echo "<td style='text-align: center' >" . $row['timestamp'] . "</td>";
                echo "<td style='text-align: center' >" . $row['portID'] . "</td>";
                echo "<td style='text-align: center' >" . $row['state'] . "</td>";
                echo "<td style='text-align: center' >" . $row['serviceName'] . "</td>";
                echo "</tr>";
            }
            }
            mysqli_close($con);
            ?>

        </table>

    </div>



</section>

</body>

<footer>
    <?php
    include ('footer.php');
    ?>
</footer>

</html>
