<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/forHeaderVTwo.css" type="text/css">

</head>

<body>
<section>

    <div id="mainTitle">
        Home Security Scanner
    </div>
    <div id="navbar">

        <div id="logo">
            <h2>Home Security Dashboard</h2><h4>Protect, Safe & Secure</h4>
        </div>

        <nav >
            <div id="menu">
                <ul>
                    <li><a href="scanOnDemand.php" title="This will perform a scan of the network and update the database if new devices are found" style="background-color: red">Scan</a> </li>
                    <!--                    <li><span class="tooltip">Hover over column headers for more info</span> </li>-->
                    <li><a href="#" title="Hover over column headers below for further info">Hover</a> </li>
                    <li><a href="showOSinfo.php">OS</a></li>
                    <li><a href="showHistory.php">History</a></li>
                    <li><a href="homePage.php">Home</a> </li>
                    <li><a href="changePassword.php">Password</a></li>
                    <li><a href="userGuide.php">User Guide</a></li>
                    <li><a href="logoff.php">Log Out</a></li>

                </ul>

            </div>

        </nav>
    </div>
</section>

</body>

<footer>
    <?php
    include ("footer.php");
    ?>
</footer>


</body>
</html>
