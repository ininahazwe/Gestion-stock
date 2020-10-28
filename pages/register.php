<?php
session_start();
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/navbar.php');
?>
<!-- Begin Page Content -->

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Créer un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="../traitements/traitement-user.php" method="POST">

                <div class="modal-body">

                    <div class="form-group">
                        <input type="hidden" name="action" value="create">
                        <label> Username </label>
                        <input type="text" name="username" class="form-control" placeholder="nom d'utilisateur">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="adresse email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirmer le mot de passe">
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

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Gestion des Utilisateurs
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm float-right" data-toggle="modal" data-target="#addadminprofile"><i class="fas fa-plus fa-sm text-white-50"></i> Ajouter un utilisateur</a>
            </h6>
        </div>

        <div class="card-body">

            <div class="table-responsive">
                <?php
                require('../traitements/database.php');
                $sql = 'SELECT * FROM users';
                $statement = $connect->prepare($sql);
                $statement->execute();
                $people = $statement->fetchAll(PDO::FETCH_OBJ);
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nom d'utilisateur</th>
                        <th>Email</th>
                        <th>Mot de passe</th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($people as $person): ?>
                            <tr>
                                <td> <?= $person->username; ?></td>
                                <td> <?= $person->email; ?></td>
                                <td> <?= $person->password; ?></td>
                                <td>
                                    <form action="register_edit.php" method="post">
                                        <button type="submit" name="edit_btn" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                      <i class="fas fa-pen"></i>
                                                    </span>
                                            <span class="text"><a class="text-white text-decoration-none" href="register_edit.php?id=<?= $person->id ?>">Edit</a></span>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="../traitements/traitement-user.php" method="post">
                                        <button type="submit" class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                      <i class="fas fa-trash"></i>
                                                    </span>
                                            <span class="text"><a class="text-white text-decoration-none" onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>">Supprimer</a></span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


<!-- End of Main Content -->

<?php
include('../includes/scripts.php');
include('../includes/footer.php');
session_destroy();
?>


