<?php
session_start();
include('../../includes/header.php');
include('../../includes/sidebar.php');
include('../../includes/navbar.php');
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <?php
    include('../../traitements/database.php');
    $req = $connect->prepare('SELECT id FROM ordinateur');
    $req->bindParam(':id', $_GET['id']);
    $req->execute();
    $ordinateurs = $req->fetch();
    print_r($ordinateurs);
    ?>
<div class="row">

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                        <img src="http://localhost:8888/Admin/img/ordinateur.png" width="100px" alt="">
                    </div>
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                            echo count($ordinateurs);
                        ?>
                        </div>
                    </div>
                    <div class="col mr-2">
                        <div class="h5 mb-0">Modèle :<?= $ordinateurs['modele']?></div>
                        <div class="h5 mb-0">Marque: <?= $ordinateurs['marque']?></div>
                    </div>
                </div>
                <div class="row mt-1 float-right">
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

