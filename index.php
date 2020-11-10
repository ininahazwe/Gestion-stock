<?php
session_start();
include('includes/header.php');
include('includes/sidebar.php');
include('includes/navbar.php');
include('traitements/database.php');
include('includes/functions.php');
?>

<div class="container-fluid">

    <!-- Content Row -->
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
                            <b>Disponibles</b> : <p><?php echo rowCountGen($connect, "SELECT * FROM `ordinateur` where dispo='oui' "); ?></p>
                            <b>En stock</b> : <p><?php echo rowCountGen($connect, "SELECT * FROM `ordinateur` where dispo='non' "); ?></p>
                        </div>
                        <div class="col-4 text-right">
                            <b>Total</b>
                            <h1><?php echo rowCountGen($connect, "SELECT * FROM `ordinateur`"); ?></h1>
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
                            <b>Disponibles</b> : <p><?php echo rowCountGen($connect, "SELECT * FROM `ecran` where dispo='oui' "); ?></p>
                            <b>En stock</b> : <p><?php echo rowCountGen($connect, "SELECT * FROM `ecran` where dispo='non' "); ?></p>
                        </div>
                        <div class="col-4 text-right">
                            <b>Total</b>
                            <h1><?php echo rowCountGen($connect, "SELECT * FROM `ecran`"); ?></h1>
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
                            <b>Disponibles</b> : <p><?php echo rowCountGen($connect, "SELECT * FROM `souris` where dispo='oui' "); ?></p>
                            <b>En stock</b> : <p><?php echo rowCountGen($connect, "SELECT * FROM `souris` where dispo='non' "); ?></p>
                        </div>
                        <div class="col-4 text-right">
                            <b>Total</b>
                            <h1><?php echo rowCountGen($connect, "SELECT * FROM `souris`"); ?></h1>
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
                            <b>Disponibles</b> : <p><?php echo rowCountGen($connect, "SELECT * FROM `clavier` where dispo='oui' "); ?></p>
                            <b>En stock</b> : <p><?php echo rowCountGen($connect, "SELECT * FROM `clavier` where dispo='non' "); ?></p>
                        </div>
                        <div class="col-4 text-right">
                            <b>Total</b>
                            <h1><?php echo rowCountGen($connect, "SELECT * FROM `clavier`"); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
session_destroy();
?>


