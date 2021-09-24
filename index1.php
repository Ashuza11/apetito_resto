
<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Apettito</title>
</head>
    <body>
        <div class="container">
            <header>
                <img class="logo" src="img/logo2.png" alt="logo for apetito Restorant">
            </header>

            <nav>
                <a href="index1.php">HOME</a>
                <a href="food.html" target="blink">MENU</a>
                <a href="#" target="blink">A PROPOS</a>
                <a href="#">COMMANDER</a>
                <a href="#">CONTACT</a>
                <?php
                    if (isset($_SESSION["useruid"])) {
                        echo " <a href='php/logout.php'>DECONNECTION</a>";
                    }
                ?>
            </nav>

            <main>
                <h1>Let's meat</h1>
                <p>
                    Nous aimons façonner la bonne nourriture avec des gens formidables. Nous apportons plus de 15 ans d'expérience et de passion. Avec des plats soigneusement conçus pour vous apporter une expérience culinaire Gomatracienne vraiment satisfaisante dont vous vous souviendrez à coup sûr.
                </p>
                <a href="login.php" class="btn">Faite votre resevation</a>
                
            </main>
            <section class="map">
                <iframe  ame src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.0723603855213!2d29.182669067578924!3d-1.6595946664289976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dd09287a5098f3%3A0x73dc661e070500f5!2sULPGL(campus%20salomon)!5e0!3m2!1sfr!2scd!4v1631030540479!5m2!1sfr!2scd" width="1024" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </section>
           
            <footer>
                <p>Copyright &copy; 2021, Apetito restorant</p>
            </footer>
        </div>
    </body>
</html>