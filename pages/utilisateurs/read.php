<?php
session_start();
include('../../includes/header.php');
include('../../includes/sidebar.php');
include('../../includes/navbar.php');
?>

<!-- requete pour chercher les salles en bdd -->
<?php include('../../traitements/database.php');
$req = $bdd->prepare("SELECT id, nom, localisation FROM t_salle");
$req->execute();
$salles = $req->fetchAll();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!---Modal création de salle --->

    <div class="modal fade" id="ajoutsalle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter une salle</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="../../traitements/traitement-salles.php" enctype="multipart/form-data" method="POST">

                    <div class="modal-body">
                        <input type="hidden" name="user_id" value="1">
                        <input type="hidden" name="action" value="create">

                        <div class="form-group">
                            <label> Nom </label>
                            <input type="text" name="nom" class="form-control" placeholder="nom de la salle...">
                        </div>
                        <div class="form-group">
                            <label> Localisation </label>
                            <input type="text" name="localisation" class="form-control" placeholder="Emplacement de la salle...">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!---FIn Modal --->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Salles
            <small>

            </small>
        </h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal" data-target="#ajoutsalle"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter une salle</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <?php foreach($salles as $salle){ ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= $salle['localisation']; ?></div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $salle['nom']; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-school fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        <div class="row mt-1 float-right">
                            <a href="#" class="btn btn-info m-1 btn-circle btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="update.php?id=<?= $salle['id']; ?>" class="btn btn-warning m-1 btn-circle btn-sm">
                                <i class="fas fa-pen"></i>
                            </a>
                            <a href="#" class="btn btn-danger m-1 btn-circle btn-sm">
                                <i class="fas fa-trash"></i>
                            </a>
                            <form action="../../traitements/traitement-salles.php" method="POST">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= $salle['id']?>">
                                <input type="submit" value="Supprimer" class="btn btn-danger m-1 btn-circle btn-sm">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>
</div>
<!-- /.container-fluid -->

<?php
include('../../includes/scripts.php');
include('../../includes/footer.php');
session_destroy();
?>


