<?php
session_start();
require_once('configuration.php');

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirmation'])) {


    $login = stripslashes($_POST['login']);
    $login = htmlspecialchars($login);

    $password = stripslashes($_POST['password']);
    $password = htmlspecialchars($password);

    $confirmation = stripslashes($_POST['confirmation']);
    $confirmation = htmlspecialchars($confirmation);

    $check = $db->prepare('SELECT login , password FROM utilisateurs WHERE login = ?');
    $check->execute(array($login));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row == 0) {
        if ($password === $confirmation) {

            $hash =  password_hash($password, PASSWORD_DEFAULT);

            $req = "INSERT INTO utilisateurs (login , password) VALUES (:login , :hash)";
            $result = $db->prepare($req);
            $result->bindValue(':login', $login);
            $result->bindValue(':hash', $hash);
            $result->execute();

            header('Location: index_connexion.php?login_err=success');
        } else {
            header('Location:inscription.php?inscription_err=password');
        }
    } else {
        header('Location:inscription.php?inscription_err=already');
    }
} else {
    header('Location:inscription.php?inscription_err=empty');
}
