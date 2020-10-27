<?php
session_start();
include('../../includes/header.php');
include('../../includes/sidebar.php');
include('../../includes/navbar.php');
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit profile
            </h6>
        </div>

        <div class="card-body">
            <?php include('../../traitements/database.php');
                $req = $bdd->prepare("SELECT id, nom, localisation FROM t_salle WHERE id = :id");
                $req->bindParam(':id', $_GET['id']);
                $req->execute();
                $salle = $req->fetch();
            ?>
                    <form action="../../traitements/traitement-salles.php" enctype="multipart/form-data" method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?= $salle['id'];?>">
                        <div class="form-group">
                            <label> Nom </label>
                            <input type="text" name="nom" value="<?php echo $salle['nom'] ?>" class="form-control" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Localisation</label>
                            <input type="text" name="localisation" value="<?php echo $salle['localisation'] ?>" class="form-control" placeholder="Enter Email">
                        </div>
                        <a href="read.php" class="btn btn-danger">Cancel</a>
                        <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                    </form>
        </div>
    </div>
</div>

<?php
include('../../includes/scripts.php');
include('../../includes/footer.php');
session_destroy();
?>


