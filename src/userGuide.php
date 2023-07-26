<?php

session_start();

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php?err=" . base64_encode("notlogged"));
    exit;
}

?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Security Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/userGuide.css" type="text/css">

</head>

<body>

<header>
    <?php
    include 'headerVTwo.php';
    ?>
</header>


<section>

<div class="document">

    <div class="mainTitle">
        <p>
        <h1>User Guide</h1>
        </p>
    </div>
    <div class="intro">
        <p>
              This page will cover all aspects of the Home Security Scanner with a easy-to-understand description of the separate sections
            of the system. The aim of the system is to provide the user with details of devices attached to the home network with further
            information about some of the ports and services running on those machines. Services are computer software programs on the
            computer that use specific "ports" on the device to exchange information with the outside entities through the broadband connection.
            The idea is then to offer links to further information about these ports and services to enable the user to understand their purpose
            and decide whether to allow the connection or not with advice on how this could be achieved.
        </p>

    </div>

    <div class="homePage">
        <p>
            <br><b>GETTING STARTED </b>Before accessing the system the user will have been required to create a login with a username of their choice and a
            password. From the login page the user will need to click the "Sign Up Now" link to register their details before pressing "Submit" to create valid
            credentials. A banner indicating successs was shown and teh user was then prompted to enter their details to login to the system.
        </p>
        <p>
            The home page of the system will initially just show a blank page with a header and a footer and nothing else as no scans have been performed.
            The header also includes a navigation bar which will perform functions or take the user to other parts of the system. These will be explained
            in further sections.
        </p>
        <p>
            <br><b>SCAN</b> will perform a scan when the button is clicked. This will take approximately 30 minutes and several actions will then occur behind
            the scenes that will update and display the main table including any new devices found during that scan. The information gained from the network
            during the scans is stored within a number of different tables within a separate database and the different sections of the Scanner System are
            updated and refreshed from the database everytime a button or link is clicked therefore the most up-to-date information is always available.
        </p>
        <p>
            <br><b>HOVER</b> If the user uses the mouse to hover over this section a message appears on the screen notifying the user that hovering over any of
            the top navigation-bar icons or the column headers on the tables will reveal a brief indication of what that icon does or what the table column represents
            if a description is required, especially with some of the technical terms used.
        </p>
        <p>
            <br><b>OS</b> stands for Operating System and will take the user to a table showing the identified operating system for the devices located during the
            scans of the network. As can be seen from the table this information is not always discovered by the scans. the "more info" link associated with each
            entry is intended to take the user to more information about the operating system indicated.
        </p>
        <p>
            <br><b>HISTORY</b> will take the user to a table showing a a list of the scans available in the database arranged in date order. The column headers on
            this page also have a short message with more information. The scan results column contains a link to another table showing details of the devices
            found during that scan including Host Name and the internal network IP address and the physical device MAC addresses. This page also includes a search box
            at the top of the page. This can be used to search through all of the information available from the database about the scans using any search string that
            the user wants to. A "No results found.." message informs the users that nothing was found containing that particular text and advises the user to try
            again. Clicking the "History" icon on the nav-bar will return the user to the previous page to try again, or not. The user can press any of the icons on
            the nav-bar at any time.
        </p>
        <p>
            <br><b>HOME</b> Quite simply this button will return the user to the main home page and reload the main information table.
        </p>
        <p>
            <br><b>PASSWORD</b> This page gives the user the option to update their password. A new password is entered into both the boxes shown and if the entered
            passwords pass the password criteria the database is updated, the user is returned to teh home page and a message bar indicated the password has been
            updated. If the passwords entered do not match or they do not meet the criteria a failure message is shown asking the user to try again and indicates why
            the update failed.
        </p>
        <p>
            <br><b>USER GUIDE</b> This button will take the user to this user guide page.
        </p>
        <p>
            <br><b>LOGOUT</b> This button will log the user out of the system and reload the index page. The user will have to re-enter username and password details
            to enter the site.
        </p>

    </div>



</div>



</section>

</body>

<footer>
    <?php
    include_once ("footer.php");
    ?>
</footer>

</html>
