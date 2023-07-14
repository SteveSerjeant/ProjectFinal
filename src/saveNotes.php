<?php

include_once ("dbconn.php");

$toSave = $_POST['toSave'];
echo $toSave."<br>";

if (isset($_POST['submit'])) {

    echo "Save was pressed!"."<br>";
//    $ip =- $conn->real_escape_string($_POST['id']);
    $ip = $con->real_escape_string($_POST['id']);

    echo $ip;
    $stmt = $con->prepare("CALL saveNotes(?,?)");
    $stmt->bind_param('ss', $ip, $toSave);

    if (!$stmt->execute())
    {
        echo "ERROR: " . $stmt->error;
    }

    else
    {
        $stmt->close();
        mysqli_close($con);
        header('Location: homePage.php');
//        header('Location: homePage.php?err=' . base64_encode("added"));
    }
}
