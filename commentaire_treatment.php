<?php
session_start();

require_once('configuration.php');

if (!isset($_SESSION['user'])) {
    header('Location:index.php');
    die();
}

$req = $db->prepare('SELECT * FROM utilisateurs WHERE id = ?');
$req->execute(array($_SESSION['user']));
$data = $req->fetch();

if (!empty($_POST['commentaire'])) {

    $commentaire = htmlspecialchars($_POST['commentaire']);

    $date = new DateTime();

    $date->format('Y-m-d H:i:s');

    if (strlen($commentaire) >= 5) {

        $insert = $db->prepare('INSERT INTO commentaires(commentaire,id_utilisateur,date) VALUES(:commentaire,:id_utilisateur,NOW())');
        $insert->execute(array(
            'commentaire' => $commentaire,
            'id_utilisateur' => intval($data['id']),
        ));
        header('Location:livre-or.php?com_err=success');
        die();
    } else {
        header('Location:commentaire.php?com_err=court');
    }
} else {
    header('Location:commentaire.php?com_err=empty');
}
