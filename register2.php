<?php

$name=$_POST['nom'];
$username=$_POST['userUid'];
$email = $_POST['email'];
$password = $_POST['pwd'];
// $password1 = $_POST['cpassword'];



// connection a la base donnees
$conn = mysqli_connect('localhost', 'root', '', 'apetito_reto');

if($conn==true){

    echo "connection etablie avec la base <br>";

    // insertion dans la base donnees
    $req = "INSERT INTO users (userName, userUid, email, userPwd) values ('$name', '$username', '$email', '$password')";
    if(mysqli_query($conn, $req)){
        echo "Enregistrement reussit <hr>";
    }
    else{
        echo "Echec d'enregistrement :".mysqli_error($conn);
    }

    //requete pour afficher les elements de la base
    $req1 = "SELECT * FROM users";

    //affichage de resultats dans la table
    $res = mysqli_query($conn, $req1);

    //on verifie si la table a des elements
    if(mysqli_num_rows($res)>0){

        echo "

<table border=1px>
<tr>
    <td>Id</td>
    <td>name</td>
    <td>username</td>
    <td>Email</td>
</tr>
";

//je parcours le tableau pour afficher ligne par ligne
while($row = mysqli_fetch_assoc($res)){

    echo "
    
<tr>
    <td>".$row['id']."</td>
    <td>".$row['userName']."</td>
    <td>".$row['userUid']."</td>
    <td>".$row['email']."</td>
</tr>";
}
echo '</table>';
}
//fermeture de la connection
mysqli_close($conn); }

else{
    echo "connexion a echouee a cause de ".mysqli_connect_error();
}
?>