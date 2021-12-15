<?php
session_start();

require_once('configuration.php');
if (isset($_SESSION['user'])) {

    $req = $db->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
}
?>
<!DOCTYPE html>
<html lang="en">

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
    if (isset($GET['com_err'])) {
        $com = $GET['com_err'];
        switch ($com) {
            case 'success':

    ?>
                <div class="success">
                    Bravo <?= $_SESSION['login'] ?> ! Vous avez posté votre commentaire avec succés !
                </div>
    <?php
                break;
        }
    }
?>
<?php
    $req = $db->query('SELECT * FROM commentaires');

    while ($livre = $req->fetch()) {
        ?>
        <br> <br>
        <div class="commentaire">
            <div class="info">
                <?=$livre['id_utilisateur']?>  Le <?=$livre['date']?> 
            </div>   

            <div class="txt">
                <?=$livre['commentaire'];?> 
            </div>
        </div> <br> <br>
        <?php
    }
    ?>
</body>

</html>