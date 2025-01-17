<?php
/* Connexion a la base de données */
$db = mysqli_connect('localhost', 'root', '', 'livreor');
/* Démarrage de la session */
session_start();

    /* Condition if qui permet si le formulaire signin est défini d'executer le code ci-dessous */
    if (isset($_POST['signin'])){
        /* Création des variables */
        $login = ($_POST['login']);
        $password = ($_POST['password']);
        $error_login = 'Veuillez réessayer ! Utilisateur introuvable (Login/mot de passe incorrect).';

        /* Variable qui permet de stocker la requête SQL */
        $check_data = mysqli_query($db, "SELECT * FROM utilisateurs WHERE login = '".$_POST['login']."' AND password = '".$_POST['password']."'");
        /* Envoie la requête SQL en BD */
        $info_user = mysqli_fetch_array($check_data);

        /* Condition if qui permet de compter le nombre de ligne dans un résultat et attribut les valeurs aux variables */
        if(mysqli_num_rows($check_data)){
            $_SESSION['login'] = $info_user['1'];
            $_SESSION['password'] = $info_user['2'];
            $_SESSION['id'] = $info_user['0'];
            header('Location: ../index.php');
        }
        else{
            echo '<section class="alert alert-danger text-center" role="alert">' . $error_login . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></section>';
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=UTF-8">
        <title>Livre d'Or | Connexion</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/connexion.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    </head>
    <body>
        <!-- Header de la page -->
        <header>
            <section class="text-center container-fluid">
                <p>- 22 Janvier 2018, Marseille -</p>
            </section>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-center navbar-light nav-home">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <section class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="navbar-brand" href="#"><span id="nav-title">Rose & Mathys</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="livre-or.php">Livre d'Or</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="commentaire.php">Commentaire</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="connexion.php">Connexion</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="inscription.php">Inscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profil.php">Profil</a>
                        </li>
                    </ul>
                </section>
            </nav>
        </header>

        <!-- Main de la page -->
        <main>
            <article>
                <section class="container-fluid">
                    <section class="row main-content bg-success text-center">
                        <section class="col-md-4 text-center company_info">
                            <span class="company__logo"><i class="fas fa-address-book" style="font-size: 100px;"></i></span>
                        </section>
                        <section class="col-md-8 col-xs-12 col-sm-12 login_form ">
                            <section class="container-fluid">
                                <section class="row">
                                    <h2>Se connecter</h2>
                                </section>
                                <section class="row">
                                    <form action="" class="form-group" method="POST">
                                        <!-- Login -->
                                        <section class="row">
                                            <label for="login"></label>
                                            <input type="text" name="login" id="login" class="form_input" placeholder="Login" required>
                                        </section>
                                        <!-- Password -->
                                        <section class="row">
                                            <label for="password"></label>
                                            <input type="password" name="password" id="password" class="form_input" placeholder="Password" required>
                                        </section>
                                        <!-- Bouton Connexion -->
                                        <section class="row">
                                            <label for="signin"></label>
                                            <input type="submit" name="signin" value="Se connecter" class="btn">
                                        </section>
                                    </form>
                                </section>
                                <section class="row">
                                    <p>Pas encore de compte? <a href="inscription.php">inscris toi ici !</a></p>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </article>
        </main>

        <!-- Footer de la page -->
        <footer>
            <section class="footer">
                <section id="button"></section>
                <section id="container">
                    <section id="cont">
                        <section class="footer_center">
                            <h3>Created by William Kies.</h3>
                        </section>
                    </section>
                </section>
            </section>
        </footer>

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/907cf96633.js" crossorigin="anonymous"></script>
    </body>
</html>
