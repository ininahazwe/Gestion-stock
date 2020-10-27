<?php
session_start();
include('../../includes/header.php');
include('../../includes/sidebar.php');
include('../../includes/navbar.php');


session_start();
include('bd/connexionDB.php');
// S'il n'y a pas de session alors on ne va pas sur cette page
if (!isset($_SESSION['id'])) {
    header('Location: index.php');
    exit;
}
// On récupère les informations de l'utilisateur connecté
$afficher_profil = $connect->query("SELECT * 
    FROM users 
    WHERE id = ?",
    array($_SESSION['id']));

$afficher_profil = $afficher_profil->fetch();

?>
<h2>Voici le profil de <?= $afficher_profil['username']; ?></h2>
<div>Quelques informations sur vous : </div>
<ul>
    <li>Votre id est : <?= $afficher_profil['id'] ?></li>
    <li>Votre mail est : <?= $afficher_profil['mail'] ?></li>
    <li>Votre username : <?= $afficher_profil['username'] ?></li>
</ul>

<?php
include('../../includes/scripts.php');
include('../../includes/footer.php');
session_destroy();
?>

