<!DOCTYPE html>
<html lang = "en">

<?php

include_once ("dbconn.php");
?>
<head>
    <title>Port List</title>
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

    <div class = "wrapper3">
        <div class="container-fluid">

            <div class = "row3">
                <table class = "outputTable" id="output" style="width: 50%; height: 20%; text-align: center">
                    <?php $id = $_GET['id'];?>
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
                    <colgroup>
                        <col span="1" style="width: 5%">
                        <col span="1" style="width: 5%">
                        <col span="1" style="width: 5%">
                        <col span="1" style="width: 5%">
                    </colgroup>



                    <tr bgcolor="#afeeee" style="text-align: center">
                        <th style='text-align: center'>Port ID</th>
                        <th style='text-align: center'>State</th>
                        <th style='text-align: center'>Service</th>
                        <th style='text-align: center'>Further Info</th>
                    </tr>


                    <?php

                    $id = $_GET['id'];

                    $stmt = $con->prepare("CALL getPortInfo(?)");
                    $stmt->bind_param('s' ,$id);

                    if (!$stmt->execute()){

                        echo "ERROR: " . $stmt->error;
                    }

                    else {
                        $result = $stmt->get_result();

                        while ($row = $result->fetch_assoc()){
                            echo "<tr style='text-align: center' >";
                            echo "<td style='text-align: center' >" . $row['portID'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['state'] . "</td>";
                            echo "<td style='text-align: center'>" . $row['serviceName'] . "</td>";
                            echo "<td><a href='moreInfo.php?id=$row[ipAddress]'>Further Info</a>";
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


</section>

<footer>
    <?php
    include_once ("footer.php");
    ?>
</footer>

</body>

</html
