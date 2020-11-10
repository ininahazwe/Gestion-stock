<?php
session_start();
include('../../includes/header.php');
include('../../includes/sidebar.php');
include('../../includes/navbar.php');

include_once '../../traitements/database.php';

if(isset($_GET['id']) AND $_GET['id'] > 0) {
    $getid = intval($_GET['id']);
    $requser = $connect->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
    ?>

    <div align="center">
        <h2>Profil de <?php echo $userinfo['username']; ?></h2>
        <br /><br />
        Pseudo = <?php echo $userinfo['username']; ?>
        <br />
        Password = <?php echo $userinfo['password']; ?>
        <br />
    </div>

    <?php
}
?>

<?php
include('../../includes/scripts.php');
include('../../includes/footer.php');
?>

