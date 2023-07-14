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
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <h2 id="noteTitle">Add Notes</h2>
            </div>
            <form action="saveNotes.php" method="post">
                <div class="form-group">
                    <label>Enter Notes</label>
                    <input type="text" name="toSave" id="toSave" class="form-control">
                </div>
                <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                <input type="submit" class="btn btn-primary" name="submit" value="Save">

            </form>

        </div>

    </div>
</div>


<footer>
    <?php
    include_once ("footer.php");
    ?>
</footer>
</body>

</html>
