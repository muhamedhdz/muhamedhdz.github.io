<?php

$bdd = new PDO('mysql:host=localhost;dbname=muklix', 'root', '');

//si le formulaire est envoyé
if(isset($_POST['envoi'])){
    //si les champs sont remplis
    if(!empty($_POST['identifiant']) && !empty($_POST['password'])){
        //on récupère les données
        $identifiant = htmlspecialchars($_POST['identifiant']);
        $password = $_POST['password'];
        //on vérifie si l'identifiant existe
        $req = $bdd->prepare('SELECT * FROM account WHERE id = ? and password = ?');
        $req->execute(array($identifiant, $password));

        if($recupUser->rowCount() >0){
            $_SESSION['id'] = $recupUser->fetch()['id'];
            $_SESSION['pseudo'] = $recupUser->fetch()['pseudo'];
            $_SESSION['password'] = $recupUser->fetch()['password'];
            header('Location: index.php');
        } else {
            echo 'Identifiant ou mot de passe incorrect';
        }

    } else {
            //sinon on affiche un message d'erreur
            $erreur = 'Identifiant ou mot de passe incorrect';
    }
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="img/logomoi.png">
    <title>Muklix</title>
    
</head>
<body>
    <div class="upper">
        <div class="logo">
            <a href="#">
                <img src="img/logomoi.png" class="img-logo"/>
            </a>
        </div>
        <div class="login-div">
            <form class="login">
                <h1>Se connecter</h1>
                <div class="input-text">
                    <form method="POST" action="">
                    <input type="text" id="inputEmail" name="identifiant" placeholder="Identifiant" onfocus="inputOnFocus(this)" onblur="inputOnBlur(this)"/>
                    <div class="warning-input" id="warningEmail">
                        Identifiant incorrect
                    </div>
                </div>
                
                <div class="input-text">
                    <input type="password" id="inputPassword" name="password" placeholder="Mot de passe" onfocus="inputOnFocus(this)" onblur="inputOnBlur(this)"/>
                    <div class="warning-input" id="warningPassword">
                        Mot de passe incorrect
                    </div>
                </div>
                
                <div>
                    <button class="signin-button" type="submit" name="send">Se connecter</button>
                </div>
                </form>
                <div class="remember-flex">
                    <div>
                        <input type="checkbox">
                        <label class="color_text">Se rappeler de moi</label>
                    </div>
                    <div class="help">
                        <a class="color_text" href="#">Besoin d'aide?</a>
                    </div>
                </div>
                <div class="protection color_link help">
                    This page is protected by Google reCAPTCHA to ensure you're not a bot. <a href="#">Learn more.</a>
                </div>
            </form>
        </div>
    </div>
    <div class="bottom">
        <div class="bottom-width">
            Questions? Me contacter sur <a href="tel:1-844-542-4813" class="tel-link">insta</a>
            <div>
                <ul class="bottom-flex">
                    <li class="list-bottom">
                        <a href="#" class="link-bottom">
                            FAQ
                        </a>
                    </li>
                    <li class="list-bottom">
                        <a href="#" class="link-bottom">
                            Help Center
                        </a>
                    </li>
                    <li class="list-bottom">
                        <a href="#" class="link-bottom">
                            Terms of Use
                        </a>
                    </li>
                    <li class="list-bottom">
                        <a href="#" class="link-bottom">
                            Privacy
                        </a>
                    </li>
                    <li class="list-bottom">
                        <a href="#" class="link-bottom">
                            Cookie Preferences
                        </a>
                    </li>
                    <li class="list-bottom">
                        <a href="#" class="link-bottom">
                            Corporate information
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <select class="fa select-language">
                    <option> &#xf0ac; &nbsp;&nbsp;&nbsp;English</option>
                    <option> &#xf0ac; &nbsp;&nbsp;&nbsp;Fran&ccedil;ais</option>
                </select>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>