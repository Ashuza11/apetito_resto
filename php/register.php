<?php

 if (isset($_POST["submit"])) {

    $name = $_POST["nom"];
    $userUid = $_POST["userUid"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["cpwd"];

    # Gerer les errers qui peuvent arriver en utilisants les fonctions 
    # Du fichier register_fonction.php
    require_once 'db.php';
    require_once 'register_fonction.php';

    # Backside validation 
    # 1. Verifier si les formilaire a etait bien remblit

    # Ne fonctione pas encore 
    if (emptyInputSignup($name,  $userUid, $email, $pwd, $pwdRepeat) !== false) {
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    // if (invalidUsername($userUid) !== false) {
    //     header("location: ../index.php?error=invaliduid");
    //     exit();
    // }
    // if (invalidEmail($email) !== false) {
    //     header("location: ../index.php?error=invalidemail");
    //     exit();
    // }
    
    # Fonctione pour le moment
    if (PwdMatch($pwd, $pwdRepeat) !== false) {
        header("location: ../index.php?error=passworddontmatch");
        exit();
    }
    # Verifier si le nom existe dans la base des données
    if (uidExists($conn, $name, $email) !== false) {
        header("location: ../index.php?error=ussenametaken");
        exit();
    }

    # Tous est bon Enregistre l'utilisateur en utilisant la fonction Createuser
    Createuser($conn, $name,  $userUid,  $email, $pwd);
 }
 else {
    header("location: ../index.php");
    exit();
 }