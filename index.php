<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Login</title>
</head>
<body>
	<div class="container">
	<?php
		if (isset($_GET["error"])){
			if ($_GET["error"] == "emptyinput"){
				echo '<p style="color: red; padding: 10px 15px; font-weight: bold; text-align: center; font-size: 20px;" >Viellez remplir tous les champs !</p>';
			}
			else if ($_GET["error"] == "Mauvaisidentifiant") {
				echo "<p style='color: red; padding: 10px 15px; font-weight: bold; text-align: center; font-size: 20px;'>Informations incorrect !</p>";
			}
		}

		?>
		<form action="php/login.php" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Connexion</p>
			<div class="input-group">
				<input type="text" placeholder="Non d'utilisateur/Email" name="userUid" value="" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="mot de pass" name="userPwd" value="" required>
			</div>
			<div class="input-group">
				<button name="submit" type="submit" class="btn">Connexion</button>
			</div>
			<p class="login-register-text">Vous n'avez pas de compte ? <a href="register.php">Inscrivez-vous ici</a>.</p>
		</form>
	</div>
</body>
</html>