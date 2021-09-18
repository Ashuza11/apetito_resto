<?php
# Verifier si la formulaire est Vide 
function emptyInputSignup($name,  $userUid, $email, $pwd, $pwdRepeat) {
    $result;
    if (empty($name) || empty($userUid) || empty($email) || empty($pwd)  || empty($pwdRepeat)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}
// function invalidUsername($userUid) {
//     $result;
//     # User of the search algorithm
//     if (preg_match("/^[a-zA-Z0-9]*$/", $userUid)){
//         $result = true;
//     }
//     else {
//         $result = false;
//     }
//     return $result;

// }
// function invalidEmail($userUid) {
//     $result;
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
//         $result = true;
//     }
//     else {
//         $result = false;
//     }
//     return $result;

// }
# Passwoed checker 
function PwdMatch($pwd, $pwdRepeat) {
    $result;
    if ($pwd !== $pwdRepeat){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}
# Cheker si l'utilisateur existe déjà dans la base. 
# Ussed for the sign up for and for the login form 
function uidExists($conn, $userUid, $email) {
    $sql = "SELECT * FROM users WHERE userUid = ? OR email = ?;"; # Close of sql statmnt and php statmnt
    # unitialise a new statemment/ prevenir l'utilisateur de questionner la base via le fomulaire 
    $stmt = mysqli_stmt_init($conn); # stmt statement to execuite
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=ussenametaken");
        exit();
    }
    # if everything is ok 
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    # Grabe thr data 
    $resultData = mysqli_stmt_get_result($stmt);

    # Faching the data as an associative array
    if ($row = mysqli_fetch_assoc($resultData)){
        return $row; # return all the data if the user exist inthe data base 
    }
    else {
        $resalt = false;
        return $resalt;
    }
    mysqli_stmt_close($stmt);
}


function Createuser($conn, $name,  $userUid,  $email, $pwd){
    $sql = "INSERT INTO users (userName, userUid, email, userPwd) VALUES (?, ?, ?, ?);"; # Close 
    $stmt = mysqli_stmt_init($conn); # Initialise an new prepared statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../register.php?error=ussenametaken");
        exit();
    }
    # Hashing the Password to make it unreaderble using built in fuction password_hash
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    # if everything is ok 
    mysqli_stmt_bind_param($stmt, "ssss", $name,  $userUid,  $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    # Grabe thr data 
    $resultData = mysqli_stmt_get_result($stmt);

    mysqli_stmt_close($stmt);
    # Direct the user to the home page after signing him up
    header("location: ../index1.php?error=none");
    exit();
}

# Check imptyinput  For  login 
function emptyInputLogin($userUid, $pwd) {
    $result;
    if (empty($userUid) || empty($pwd)){
        $result = true;
    }
    else {
        $result = false;
    }
    return $result;

}

function loginUser($conn, $userUid, $pwd) {
    $uidExixts = uidExists($conn, $userUid, $userUid);

    if ($uidExixts ===  false){
        header("location: ../index.php?error=Mauvais identifiant");
        exit();
    }

    # Check for password if exist
    $pwdHashed = $uidExixts["userPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../index.php?error=Mauvais identifiant");
        exit();
    }
    else if ($checkPwd === true)
    # Usage of sessions using a session fuction built in php
    session_start();
    $_SESSION["userid"] = $uidExixts["id"];
    $_SESSION["userUid"] = $uidExixts["userUid"];
    header("location: ../index.html");
    exit();

}