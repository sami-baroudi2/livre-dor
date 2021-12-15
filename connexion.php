<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="livre-or.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarExample01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profil.php">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="livre-or.php">Livre d'or</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="commentaire.php">Commentaire</a>
                        </li>
                    </ul>

                    <a class="login" href="connexion.php">Log In</a>

                    <a class="register" href="inscription.php">Register</a>

                    <a class="deco" href="deconnexion.php">Déconnexion</a>
                </div>
            </div>
        </nav>
    </header>
    <?php
    if (isset($_GET['login_err'])) {

        $erreur = htmlspecialchars($_GET['login_err']);

        switch ($erreur) {
            case 'already':
    ?>
                <div class="erreur">
                    <strong>ERREUR</strong>Le nom d'utilisateur ou le mot de passe est incorrect.
                </div>
            <?php
                break;

            case 'password':
            ?>
                <div class="erreur">
                    <strong>ERREUR</strong>Le nom d'utilisateur ou le mot de passe est incorrect.
                </div>
    <?php
                break;
        }
    }
    ?>
    <main class="login-form">
        <div style=" 
        margin-top: 15%;
        max-width: 50%; 
        margin-left: 25%;
        
        " class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div style="
                            box-shadow : 2px 2px 5px 2px lightgrey;
                            border-radius : 2%;" 
                        class="card">
                        <div class="card-header">Register</div>
                        <div class="card-body">
                            <form action="connexion_treatment.php" method="POST">
                                <div class="form-group row">
                                    <label for="login" class="col-md-4 col-form-label text-md-right">Login</label>
                                    <div class="col-md-6">
                                        <input style="margin-bottom: 10%;" type="text" id="login" class="form-control" name="login" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                    </div>
                                </div>


                        </div>

                        <div class="col-md-6 offset-md-4">
                            <input style="margin:2%; margin-left:10%;" type="submit" class="btn btn-primary" name="submitCo" value="Connexion">

                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>

    </main>
</body>

</html>