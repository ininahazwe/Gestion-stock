<?php
session_start();
include('../../includes/header.php');
include('../../includes/sidebar.php');
include('../../includes/navbar.php');
include('../../includes/functions.php');
include('../../traitements/database.php');

$stmt = $connect->prepare('SELECT nom, localisation FROM salle WHERE id = :id');
$stmt->execute(array(':id' => $_GET['id']));
$row = $stmt->fetch();

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <?php
        echo '<div class="mx-auto text-center">';
        echo '<h3>'.$row['nom'].'</h3>';
        echo '<p>'.$row['localisation'].'</p>';
        echo '</div>';
        ?>
    </div>
    <div class="row">

        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <a href="http://localhost:8888/Admin/pages/ordinateur/read.php"><h6 class="m-0 font-weight-bold text-primary">Ordinateurs</h6></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-4">
                            <a href="http://localhost:8888/Admin/pages/ordinateur/read.php"><img src="http://localhost:8888/Admin/img/ordinateur.png" width="100px" alt=""></a>
                        </div>
                        <div class="col-4">
                            <div><?php $show = show($connect, "SELECT marque, modele FROM ordinateur where salle_Id= :id");
                                if($show > 1){
                                    echo '<p>'.'<b>Marque: </b>'.$show['marque'].'</p>';
                                    echo '<p>'.'<b>Modèle: </b>'.$show['modele'].'</p>';
                                } else{
                                    echo 'Aucune donnée';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-4 text-right">
                            <b>Total</b>
                            <h1><?php echo rowCount($connect, "SELECT * FROM ordinateur where salle_Id= :id"); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <a href="http://localhost:8888/Admin/pages/ecran/read.php"><h6 class="m-0 font-weight-bold text-primary">Ecrans</h6></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-4">
                            <a href="http://localhost:8888/Admin/pages/ecran/read.php"><img src="http://localhost:8888/Admin/img/ecran.png" width="100px" alt=""></a>
                        </div>
                        <div class="col-4">
                            <div><?php $show = show($connect, "SELECT modele FROM ecran where salle_Id= :id");
                                if($show > 1){
                                    echo '<p>'.'<b>Modèle: </b>'.$show['modele'].'</p>';
                                } else{
                                    echo 'Aucune donnée';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-4 text-right">
                            <b>Total</b>
                            <h1><?php echo rowCount($connect, "SELECT * FROM ecran where salle_Id= :id"); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <a href="http://localhost:8888/Admin/pages/souris/read.php"><h6 class="m-0 font-weight-bold text-primary">souris</h6></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-4">
                            <a href="http://localhost:8888/Admin/pages/souris/read.php"><img src="http://localhost:8888/Admin/img/souris.png" width="100px" alt=""></a>
                        </div>
                        <div class="col-4">
                            <div><?php $show = show($connect, "SELECT marque FROM souris where salle_Id= :id");
                                if($show > 1){
                                    echo '<p>'.'<b>Marque: </b>'.$show['marque'].'</p>';
                                } else{
                                    echo 'Aucune donnée';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-4 text-right">
                            <b>Total</b>
                            <h1><?php echo rowCount($connect, "SELECT * FROM souris where salle_Id= :id"); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <a href="http://localhost:8888/Admin/pages/clavier/read.php"><h6 class="m-0 font-weight-bold text-primary">Clavier</h6></a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col-4">
                            <a href="http://localhost:8888/Admin/pages/clavier/read.php"><img src="http://localhost:8888/Admin/img/clavier.png" width="100px" alt=""></a>
                        </div>
                        <div class="col-4">
                            <div><?php $show = show($connect, "SELECT marque, type FROM clavier where salle_Id= :id");
                                if($show > 1){
                                    echo '<p>'.'<b>Type: </b>'.$show['type'].'</p>';
                                    echo '<p>'.'<b>Marque: </b>'.$show['marque'].'</p>';
                                } else{
                                    echo 'Aucune donnée';
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-4 text-right">
                            <b>Total</b>
                            <h1><?php echo rowCount($connect, "SELECT * FROM clavier where salle_Id= :id"); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include('../../includes/scripts.php');
include('../../includes/footer.php');
session_destroy();
?>

