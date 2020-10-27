<?php
session_start();

require('./traitements/database.php');
//$connection = mysqli_connect("localhost", "root", "root", "agpi_db");

//Création d'utilisateur

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password === $cpassword)
    {
        $query = "INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            $_SESSION['success'] = "Utilisateur créé";
            header('Location: register.php');
        }else {
            $_SESSION['status'] = "Échec";
            header('Location: register.php');
        }
    }
    else{
        $_SESSION['status'] = "les mots de passe doivent être les mêmes";
        header('Location: register.php');
    }
}

//Mise à jour des utilisateurs

if(isset($_POST['updatebtn']))
{
    $id = $_POST['edit_id'];
    $username = $_POST['edit_username'];
    $email = $_POST['edit_email'];
    $password = $_POST['edit_password'];

    $query = "UPDATE users SET username='$username', email='$email', password='$password' WHERE id ='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Ton profil a été mis à jour";
        header('Location: register.php');
    }
    else
    {
        $_SESSION['status'] = "Ton profil n'a pas été mis à jour";
        header('Location: register.php');
    }
}

//Suppression d'utilisateur

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];
    $query = "DELETE FROM users WHERE id ='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "L'utilisateur a été supprimé";
        header('Location: register.php');
    }
    else
        {
            $_SESSION['success'] = "Échec de suppression";
            header('Location: register.php');
        }
}

//login system

/*if(isset($_POST['login_btn']))
{
    $username_login = $_POST['username'];
    $email_login = $_POST['email'];
    $password_login = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email_login' OR username='$username_login' AND password='$password_login'";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_fetch_array($query_run))
    {
        $_SESSION['username'] = $email_login;
        header('Location: index.php');
    }
    else
    {
        $_SESSION['status'] = "Identifiants invalides";
        header('Location: login.php');
    }
}*/

//login system

if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $login = htmlentities($_POST['username']);
    $pwd = htmlentities($_POST['password']);

    //ETAPE 1 : Connexion à la BDD
    try {
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $conexion = new PDO('mysql:host=localhost;dbname=agpi_db2;charset=utf8', 'root', 'root');
    }
    catch(Exception $e){
        echo $e->getMessage();

    }

    $req = $conexion->prepare("SELECT * FROM users WHERE username=:username");
    $req->execute(array('username' => $username));
    $data = $req->fetch();
    if($data){
        if($data['password'] == $pwd){
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            header("index.php");
        }else{

            echo "<span style='color:red;font-weight:bold;'>Mot de passe incorrecte</span>";
        }
    }
    else {
        //header("location:login.php");
        echo "<span style='color:red;font-weight:bold;'>Erreur lors de l'Authentification</span>";
    }
}


