<?php
session_start();
//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//    header("location: index.php");
//    exit;
//}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Notes</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/forNotes.css" type="text/css">

</head>
<body>
<header>
    <?php
    include 'headerVTwo.php';
    ?>
</header>
<?php

$ip = $_GET['id'];
?>

<div class="wrapper">
    <div id="noteTitle">
        <h2 >Add Notes</h2>
    </div>
    <form action="saveNotes.php" method="post">
        <div class="textBox">
            <label for="toSave">Enter Notes</label>
            <input type="text" style="font-size: large" name="toSave" id="toSave">
        </div>
        <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
        <input type="submit" class="btn btn-primary" id="btnSave" name="submit" value="Save">

    </form>
</div>



<footer>
    <?php
    include_once ("footer.php");
    ?>
</footer>
</body>

</html>
