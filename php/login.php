<?php

if (isset($_POST["submit"])){

    $userUid = $_POST["userUid"];
    $pwd = $_POST["userPwd"];

    # Data base file 
    require_once 'db.php';
    # Functions file
    require_once 'register_fonction.php';

    if (emptyInputLogin($userUid, $pwd) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $userUid, $pwd);
}
else {
    header("location: ../index.php");
}