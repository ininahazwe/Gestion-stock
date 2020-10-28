<?php
session_start();
include('../includes/header.php');
include('../includes/sidebar.php');
include('../includes/navbar.php');

require '../traitements/database.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM users WHERE id=:id';
$statement = $connect->prepare($sql);
$statement->execute([':id' => $id ]);
$person = $statement->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['username'])  && isset($_POST['email']) && isset($_POST['password']) ) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = 'UPDATE users SET username=:username, email=:email, password=:password WHERE id=:id';
    $statement = $connect->prepare($sql);
    if ($statement->execute([':username' => $username, ':email' => $email, ':password' => $password, ':id' => $id])) {
        header('Location: register.php');
    }
}
?>

<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit profile
            </h6>
        </div>

        <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label for="username"> Username </label>
                        <input type="text" name="username" value="<?= $person->username; ?>" class="form-control" id="username" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?= $person->email; ?>" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" value="<?= $person->password; ?>" class="form-control" id="password" placeholder="Enter Password">
                    </div>
                    <a href="register.php" class="btn btn-danger">Annuler</a>
                    <button type="submit" class="btn btn-info">Enregistrer</button>
                </form>
            <?php if(!empty($message)): ?>
                <div class="alert alert-success">
                    <?= $message; ?>
                </div>
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
include('../includes/scripts.php');
include('../includes/footer.php');
session_destroy();
?>
