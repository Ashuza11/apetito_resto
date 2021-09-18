<?php

if (isset($_POST["submit"])){

    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];

    # Data base file 
    require_once 'db.php';
    # Functions file
    require_once 'register_fonction.php';

    if (emptyInputLogin($username, $pwd) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $pwd);
}
else {
    header("location: ../index.php");
}