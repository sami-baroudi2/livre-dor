<?php
session_start(); 
require ('configuration.php');
$sesslogin = $_SESSION['login'] ; 


if (!empty (isset($_POST['login'])) && !empty (isset($_POST['password']))) {
    
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']); 

    $check = $db->prepare('SELECT * FROM utilisateurs WHERE login = ?');
    $check->execute(array($login));
    $data = $check->fetch();     
    $row = $check->rowCount(); 
    
    if ($row > 0 ) {
        

        if (password_verify($password , $data['password'])) {
            
            $_SESSION['user'] = $data['id'];
            $_SESSION['login'] = $data['login'];

            header('Location:index_connexion.php?login_err=connect');
            die();
        }
        else {
            header('Location:connexion.php?login_err=password');
        }
    } 
    else {
        header('Location:connexion.php?login_err=already');
    }
}
else {
    header('Location:connexion.php?login_err=empty');
}