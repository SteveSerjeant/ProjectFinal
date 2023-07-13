<?php

session_start();

include_once ("dbconn.php");


if ($con === false) {

    die("Connection Error. " . mysqli_connect_error());

}

//check if data was submitted

if (!isset($_POST['username'], $_POST['password'])) {

    exit('Please enter a Username and Password.');

}

//prepare our SQL statement

if ($stmt = $con->prepare('SELECT id, password FROM users WHERE username = ?'))
{

    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();

    //store result
    $stmt->store_result();

    if ($stmt->num_rows() > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();

        if (password_verify($_POST['password'], $password)) {
            //success, User has logged in
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = $id;

            header('Location: homePage.php');

        } else {
            //incorrect password
            header('location: index.php?err=' . base64_encode("wrong"));
            die();
        }
    } else {
        //incorrect username
        header('location: index.php?err=' . base64_encode("wrong"));
        die();
    }

    $stmt->close();
}
