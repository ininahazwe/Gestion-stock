<?php

include('../includes/header.php');
?>
<!-- Begin Page Content -->

<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="container-fluid">
                <div class="text-center">
                    <img class="mb-2" style="width: 100px;" src="../img/logo.png">
                    <H3>S'enregistrer</H3>
                </div>
            </div>

        <form action="../traitements/traitement-user.php" method="POST">
            <input type="hidden" name="action" value="create">
            <div class="form-group row">
                <div class="col-sm-12">
                    <label> Username </label>
                    <input type="text" name="username" class="form-control form-control-user" placeholder="nom d'utilisateur">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Mot de passe">
                </div>
<<<<<<< Updated upstream
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
            <?php
            if(isset($_SESSION['success']) && $_SESSION['success'] !='')
            {
                echo '<h2 class="bg-primary text-white">' .$_SESSION['success'].'</h2>';
                unset($_SESSION['success']);
            }
            if(isset($_SESSION['status']) && $_SESSION['status'] !='')
            {
                echo '<h2 class="bg-danger text-white">' .$_SESSION['status'].'</h2>';
                unset($_SESSION['status']);
            }
            ?>

            <div class="table-responsive">
                <?php
                $connection = mysqli_connect("localhost", "root", "root", "agpi_db2");
                $query = "SELECT * FROM users";
                $query_run = mysqli_query($connection, $query);
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
                    <?php
                    if(mysqli_num_rows($query_run) > 0)
                    {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                            ?>

                            <tr>
                                <td> <?php echo $row['username']; ?></td>
                                <td> <?php echo $row['email']; ?></td>
                                <td> <?php echo $row['password']; ?></td>
                                <td>
                                    <form action="register_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                      <i class="fas fa-pen"></i>
                                                    </span>
                                            <span class="text">Modifier</span>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <form action="code.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger btn-icon-split">
                                                    <span class="icon text-white-50">
                                                      <i class="fas fa-trash"></i>
                                                    </span>
                                            <span class="text">Delete</span>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    else{
                        echo "Aucune donnée trouvée !";
                    }
                    ?>

                    </tbody>
                </table>
=======
>>>>>>> Stashed changes
            </div>
            <div class="form-group row">
                <div class="col-sm-12">
                    <label>Confirm Password</label>
                    <input type="password" name="confirmpassword" class="form-control form-control-user" placeholder="Confirmer le mot de passe">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
            </div>
        </form>
            <?php
            if(isset($erreur)) {
                echo '<span style="color: red; ">' .$erreur. "</span>";
            }
            ?>
        </div>
    </div>
</div>


<!-- End of Main Content -->

<?php
include('../includes/scripts.php');
include('../includes/footer.php');
session_destroy();
?>


