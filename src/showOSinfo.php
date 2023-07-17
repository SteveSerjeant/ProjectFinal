<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php?err=" . base64_encode("notlogged"));
    exit;
}

require_once "dbconn.php";

?>
<!DOCTYPE html>
<html lang = "en" xmlns="http://www.w3.org/1999/html">

<head>
    <title>OS List</title>
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

    <div class="wrapper3">

        <table class = "outputTable" id="output" style="width: 60%; height: 20%; text-align: center">
            <colgroup>
                <col span="1" style="width: 10%">
                <col span="1" style="width: 15%">
                <col span="1" style="width: 20%">
                <col span="1" style="width: 8%">
                <col span="1" style="width: 7%">
            </colgroup>

            <tr bgcolor="#afeeee" style="text-align: center">
                <th style='text-align: center'>IP Address</th>
                <th style='text-align: center'>Scan Date</th>
                <th style='text-align: center'>Operating System (OS)</th>
                <th style='text-align: center'>% Accuracy</th>
                <th style='text-align: center'>More Info</th>
            </tr>

            <?php

            $sql = 'CALL getOSInfo';

            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                echo "<tr style='text-align: center' >";
                echo "<td style='text-align: center' >" . $row['ipAddress'] . "</td>";
                echo "<td style='text-align: center'>" . $row['scanTimestamp'] . "</td>";
                echo "<td style='text-align: center'>" . $row['osType'] . "</td>";
                echo "<td style='text-align: center'>" . $row['accuracy'] . "</td>";
                echo "<td><a href='moreInfo.php?id=$row[ipAddress]'>More Info</a>";
                echo "</tr>";
            }
            $stmt->close();
            mysqli_close($con);

            ?>

        </table>

    </div>
</section>
<footer>
    <?php
    include ("footer.php");
    ?>
</footer>

</body>

</html>
