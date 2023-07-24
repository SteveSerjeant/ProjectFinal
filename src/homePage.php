<!DOCTYPE html>
<html lang="en">

<?php

include_once ("dbconn.php");

session_start();

//check if user is logged in, if not re-direct to index.php
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php?err=" . base64_encode("notlogged"));
    exit;
}

?>
<head>
    <title>Home Page</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/outputTable.css" type="text/css">

    <!--    /*for alert messages*/-->
    <link rel="stylesheet" href="../css/forAlerts.css" type="text/css">

    <!--bootstrap css for alerts-->
<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">-->


</head>

<body>
<?php

$alert = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($alert == "added") {echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>Note Added</strong></div>";}

$alert = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($alert == "updated") {echo "<div class=\"alert alert-success alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>Password Updated</strong></div>";}

?>
<header>
    <?php
    include 'headerVTwo.php';
    ?>
</header>

<article>

    <section>

        <div class = "wrapper3">
            <div class="container-fluid">

                <div class = "row">
                    <table class = "outputTable" id="output" style="width: 85%; height: 20%; text-align: center">
                        <colgroup>
                            <col span="1" style="width: 8%">
                            <col span="1" style="width: 8%">
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 10%">
                            <col span="1" style="width: 5%">
                            <col span="1" style="width: 5%">
                            <col span="1" style="width: 5%">
                        </colgroup>

                        <tr>
                            <th class="moreInfo">Host Name
                                <span class="tooltip">This is the device hostname, found in the about your PC section</span></th>
                            <th class="moreInfo">IP Address
                                <span class="tooltip">This is the unique internal "address" for this device on this network</span></th>
                            <th class="moreInfo">MAC Address
                                <span class="tooltip">This is a unique identifier for this device</span></th>
                            <th class="moreInfo">When Added
                                <span class="tooltip">This is the date when this device was found by scanning and added to the database</span></th>
                            <th class="moreInfo">Notes
                                <span class="tooltip">User added notes about the device</span></th>
                            <th class="moreInfo">Add Notes
                                <span class="tooltip">Clicking on the link gives the user the option to add the notes</span></th>
                            <th class="moreInfo">Port List
                                <span class="tooltip">Click on the link to display port and services running for each device on the network</span></th>
                            <th class="moreInfo">Search
                                <span class="tooltip">Click on the link to find amount of times this device found in scans</span></th>
                        </tr>

                        <?php

                        $sql = 'CALL getDevices()';

                        $stmt = $con->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr style='text-align: center' >";
                            echo "<td style='text-align: center' >" . $row['hostName'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['ipAddress'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['macAddress'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['scanTimestamp'] . "</td>";
                            echo "<td style='text-align: left'>" . $row['notes'] . "</td>";
                            echo "<td bgcolor='#6495ed' style='text-align: center'><a href='addNotes.php?id=$row[ipAddress]'><font color='white'>Add Notes</font> </a>";
                            echo "<td><a href='portList.php?id=$row[ipAddress]'>Port List</a>";
                            echo "<td><a href='searchScansIP.php?id=$row[ipAddress]'>Search</a>";
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
</article>

<footer>
    <?php
    include_once ("footer.php");
    ?>
</footer>
<!-- for alert messages -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="../javascript/forAlerts.js"></script>

</body>

</html>
