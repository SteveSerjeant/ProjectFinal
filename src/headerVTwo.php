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
                    <li><a href="#" title="Hover over column headers on this page for a brief description">Hover</a> </li>
                    <li><a href="showOSinfo.php" title="Click here for information about operating system information for devices (where available)">OS</a></li>
                    <li><a href="showHistory.php" title="Click here for a list of scan dates with links to further information and a search facility">History</a></li>
                    <li><a href="homePage.php" title="Click here to return to the home page">Home</a> </li>
                    <li><a href="changePassword.php" title="Click here to change the password">Password</a></li>
                    <li><a href="userGuide.php" title="Click here for a complete user guide">User Guide</a></li>
                    <li><a href="logoff.php" title="Click here to log out of the system">Log Out</a></li>

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
