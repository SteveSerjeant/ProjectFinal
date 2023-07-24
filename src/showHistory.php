<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require_once "dbconn.php";

?>

<!DOCTYPE html>
<html lang = "en">
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
    <div class="search">

        <form action="searchScans.php" method="post">
            <div class="textBox">
                <label for="toSave">Search String</label>
                <input type="text" style="font-size: large" name="toSave" id="toSave">
            </div>
            <input type="submit" class="btn btn-primary" id="btnSave" name="submit" value="Search">

        </form>
    </div>

    <div class="wrapper3">

        <div class="container-fluid">

            <div class="row3">

                <table class = "outputTable" id="output" style="width: 40%; height: 20%; text-align: center">
                    <colgroup>
                        <col span="1" style="width: 5%">
                        <col span="1" style="width: 5%">
                    </colgroup>

                    <tr bgcolor="#afeeee" style="text-align: center; margin-top: 5px">
                        <th style='text-align: center'>Scan Date</th>
                        <th style='text-align: center'>Scan Results</th>
                    </tr>

                    <?php

                    $sql = 'CALL getScandates()';

                    $stmt = $con->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr style='text-align: center' >";
                        echo "<td style='text-align: center' >" . $row['scanTimestamp'] . "</td>";
                        echo "<td><a href='scanResults.php?id=$row[scanTimestamp]'>More Info</a>";
                        echo "</tr>";
                    }
                    $stmt->close();
                    mysqli_close($con);

                    ?>
                </table>
            </div>
        </div>
    </div>

</section>

</body>

<footer>
    <?php
    include ('footer.php');
    ?>
</footer>

</html>
