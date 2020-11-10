<?php
if($_POST['action'] == 'create') {
    createUser($_POST['username'], $_POST['password']);
} elseif ($_POST['action'] == 'connect'){
    connexion($_POST['username'], $_POST['password']);
}

function createUser($username, $password){
    include('../traitements/database.php');

    // check si utilisateur existe
    $req = $connect->prepare("SELECT username FROM utilisateurs WHERE username = :username");
    $req->bindParam(':username', $username);
    $req->execute();
    $userExist = $req->fetch();

    if($userExist['username'] == $username){
        echo 'Ce nom d\'utilisateur est déjà pris';
    } else {
        $req = $connect->prepare("INSERT INTO utilisateurs(username, password) VALUES(:username, :password)");
        $req->bindParam(':username', $username);
        $req->bindParam(':password', $password);

        $req->execute();

        header('Location: ../index.php');
    }

}

function connexion($username, $password){
    include('../traitements/database.php');
    $req = $connect->prepare("SELECT id, password FROM utilisateurs WHERE username = :username");
    $req->bindParam(':username', $username);
    $req->execute();

    $user = $req->fetch();
    if($password == $user['password']){
        session_start();
        $_SESSION['id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: ../index.php');
    } else {
        echo 'Mauvais identifiant ou mot de passe';
    }
}

