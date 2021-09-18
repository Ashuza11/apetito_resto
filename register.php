<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Register</title>
</head>
<body>
	<div class="container">
	<?php
		if (isset($_GET["error"])){
			if ($_GET["error"] == "emptyinput"){
				echo '<p style="color: red; padding: 10px 15px; font-weight: bold; text-align: center; font-size: 20px;" >Viellez remplir tous les champs !</p>';
			}
			else if ($_GET["error"] == "invaliduid") {
				echo "<p style='color: red; padding: 10px 15px; font-weight: bold; text-align: center; font-size: 20px;'>Viellez choisir un nom d'utilisateur approprié!</p>";
			}
			else if ($_GET["error"] == "invalidemail") {
				echo "<p style='color: red; padding: 10px 15px; font-weight: bold; text-align: center; font-size: 20px;'>Viellez choisir un email approprié1!</p>";
			}
			else if ($_GET["error"] == "passwordsdontmatch") {
				echo "<p  style='color: red; padding: 10px 15px; font-weight: bold; text-align: center; font-size: 20px;'>le mot de passe ne correspond pas!</p>";
			}
			else if ($_GET["error"] == "stmtfailed") {
				echo "<p style='color: red; padding: 10px 15px; font-weight: bold; text-align: center; font-size: 20px;'>quelque chose s'est mal passé essaie encore!</p>";
			}
			else if ($_GET["error"] == "usernametaken") {
				echo "<p style='color: red; padding: 10px 15px; font-weight: bold; text-align: center; font-size: 20px;'>Quelque chose s'est mal passé essaie encore!</p>";
			}
			else if ($_GET["error"] == "none") {
				echo "<p style='color: green; padding: 10px 15px; font-weight: bold; text-align: center; font-size: 20px;'>Tu t'es bien inscrit!</p>";
			}
		}
		
		?>
		<form action="php/register.php" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">S'inscrire</p>
			<div class="input-group">
				<input type="text" placeholder="Nom" name="nom" value="" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Nom d'utilisateur" name="userUid" value="" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="mot de pass" name="pwd" value="" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirmer mot de pass" name="cpwd" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">S'inscrire</button>
			</div>
			<p class="login-register-text">Vous avez de compte ? <a href="index.php">Connectez-vous ici</a>.</p>
		</form>
	</div>
</body>
</html>