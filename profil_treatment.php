<?php
session_start();

require_once('configuration.php');

if (!isset($_SESSION['login'])) {
    header('Location:index.php');
    die();
}

if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['passwordChange']) && !empty($_POST['passwordRetype'])) {

    $new_login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $new_password = htmlspecialchars($_POST['passwordChange']);
    $new_password_retype = htmlspecialchars($_POST['passwordRetype']);

    $check = $db->prepare('SELECT * FROM utilisateurs WHERE id = :id');
    $check->execute(array(
        "id" => $_SESSION['user']
    ));
    $data = $check->fetch();

    if (password_verify($password, $data['password'])) {
        if ($new_password === $new_password_retype) {

            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update = $db->prepare('UPDATE utilisateurs SET login = :login, password = :password WHERE id = :id');
            $update->execute(array(
                "login" => $new_login,
                "password" => $new_password,
                "id" => $_SESSION['user']
            ));
            header('Location: index_connexion.php?login_err=success_pass');
            die();
        }
    } else {
        header('Location: profil.php?profil_err=fail_check_pass');
        die();
    }
} else {
    header('Location: profil.php');
    die();
}
