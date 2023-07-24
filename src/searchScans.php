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
<?php
$toSave = $_POST['toSave'];
echo $toSave."<br>";
//$query = "SELECT * FROM networkdeviceslog WHERE CONCAT(macAddress, '', ipAddress, '', hostName, '') LIKE '%$toSave%'";
//$result = mysqli_query($con, $query);
//$row = mysqli_fetch_assoc($result);
//
//echo $row['ipAddress'];

$sql = "SELECT * FROM networkdeviceslog WHERE CONCAT(macAddress, '', ipAddress, '', hostName, '') LIKE '%$toSave%'";
$result = $con->query($sql);
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()){
        echo "macAddress: " . $row["macAddress"] . "ipAddress: " . $row["ipAddress"] . "hostName: " . $row["hostName"] . "Timestamp: " . $row["scanTimestamp"] . "<br>";
        }
    }

    else {
        echo "o results";
    }

//$con->close();
    ?>
        <div class="wrapper3">

        <div class="container-fluid">

            <div class="row3">

                <table class = "outputTable" id="output" style="width: 60%; height: 20%; text-align: center">
                    <colgroup>
                        <col span="1" style="width: 20%">
                        <col span="1" style="width: 20%">
                        <col span="1" style="width: 20%">
                        <col span="1" style="width: 20%">
                    </colgroup>

                    <tr bgcolor="#afeeee" style="text-align: center; margin-top: 5px">
                        <th style='text-align: center'>macAddress</th>
                        <th style='text-align: center'>ipAddress</th>
                        <th style='text-align: center'>hostName</th>
                        <th style='text-align: center'>Scan Timestamp</th>
                    </tr>

                    <?php
//
//                    $sql = 'CALL getScandates()';
//
//                    $stmt = $con->prepare($sql);
//                    $stmt->execute();
//                    $result = $stmt->get_result();

                    $sql = "SELECT * FROM networkdeviceslog WHERE CONCAT(macAddress, '', ipAddress, '', hostName, '') LIKE '%$toSave%'";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr style='text-align: center' >";
                            echo "<td style='text-align: center' >" . $row['macAddress'] . "</td>";
                            echo "<td style='text-align: center' >" . $row['ipAddress'] . "</td>";
                            echo "<td style='text-align: center' >" . $row['hostName'] . "</td>";
                            echo "<td style='text-align: center' >" . $row['scanTimestamp'] . "</td>";
//                        echo "<td><a href='scanResults.php?id=$row[scanTimestamp]'>More Info</a>";
                            echo "</tr>";
                        }


                    }
                    else {
                        echo "o results";
                    }
//                    $stmt->close();
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


