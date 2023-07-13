<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Security Dashboard</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--    stylesheet for the username and password icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <!--bootstrap css for alerts-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">


    <!--    <link rel="stylesheet" href="../css/stylesheet.css" type="text/css">-->
    <link rel="stylesheet" href="../css/loginForm.css" type="text/css">
    <!--    /*for alert messages*/-->
    <link rel="stylesheet" href="../css/forAlerts.css" type="text/css">
</head>
<body>
<?php

// used to check incorrect password or username work independently, then replaced with one alert for both
//$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
//if ($error == "wrongPassword") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Incorrect Login Password</div>";}
//
//$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
//if ($error == "wrongUsername") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Incorrect Username</div>";}

//for incorrect username or password
$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "wrong") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Incorrect Login Credentials</div>";}

//for not logged in
$error = (isset($_GET["err"])) ? base64_decode($_GET["err"]) : "";
if ($error == "notlogged") {echo "<div class=\"alert alert-danger alert-dismissible\" role=\"alert\" id=\"banner\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><strong>ERROR:</strong>      Not Logged In</div>";}

?>

<div class="login">
    <h1>Dashboard Login</h1>
    <form action="authenticate.php" method="post">
        <label for="username">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="username" placeholder="Username" id="username" required>

        <label for="password">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="password" placeholder="Password" id="password" required>
        <input type="submit" name="btnLogin" value="Submit">
        <p>Not a User already? <a href="register.php">Sign Up Now</a>.</p>


    </form>
</div>

<!-- for alert messages -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



<script src="../javascript/forAlerts.js"></script>

</body>


</html>
