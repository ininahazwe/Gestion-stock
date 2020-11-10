<?php
    $user_id = $_GET['id'];
    $token = $_GET['token'];
    require '../../traitements/database.php';
    $req = $connect->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute([$user_id]);
    $user = $req->fetch();
    session_start();

    if($user && $user->confirmation_token == $token ){
        $connect->prepare('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
        $_SESSION['flash']['success'] = 'Votre compte a bien été validé';
        $_SESSION['auth'] = $user;
        header('Location: view.php');
    }else{
        $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
        header('Location: ../login.php');
    }
