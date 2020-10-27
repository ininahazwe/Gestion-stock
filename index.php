<?php
session_start();
include('includes/header.php');
include('includes/sidebar.php');
include('includes/navbar.php');
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
                        <div class="col-6">
                            <img src="http://localhost:8888/Admin/img/ordinateur.png" width="100px" alt="">
                        </div>
                        <div class="col-6 text-right">
                        <?php
                            include('traitements/database.php');
                            $pdoQuery = "SELECT * FROM ordinateur";
                            $pdoQuery_run = $connect->query($pdoQuery);
                            $pdoQuery_exec = $pdoQuery_run->rowCount();
                            echo "<h1> $pdoQuery_exec </h1>";
                        ?>
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
                        <div class="col-6">
                            <img src="http://localhost:8888/Admin/img/ecran.png" width="100px" alt="">
                        </div>
                        <div class="col-6 text-right">
                            <?php
                            include('traitements/database.php');
                            $pdoQuery = "SELECT * FROM ecran";
                            $pdoQuery_run = $connect->query($pdoQuery);
                            $pdoQuery_exec = $pdoQuery_run->rowCount();
                            echo "<h1> $pdoQuery_exec </h1>";
                            ?>
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
                        <div class="col-6">
                            <img src="http://localhost:8888/Admin/img/souris.png" width="100px" alt="">
                        </div>
                        <div class="col-6 text-right">
                            <?php
                            include('traitements/database.php');
                            $pdoQuery = "SELECT * FROM souris";
                            $pdoQuery_run = $connect->query($pdoQuery);
                            $pdoQuery_exec = $pdoQuery_run->rowCount();
                            echo "<h1> $pdoQuery_exec </h1>";
                            ?>
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
                        <div class="col-6">
                            <img src="http://localhost:8888/Admin/img/clavier.png" width="100px" alt="">
                        </div>
                        <div class="col-6 text-right">
                            <?php
                            include('traitements/database.php');
                            $pdoQuery = "SELECT * FROM clavier";
                            $pdoQuery_run = $connect->query($pdoQuery);
                            $pdoQuery_exec = $pdoQuery_run->rowCount();
                            echo "<h1> $pdoQuery_exec </h1>";
                            ?>
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


