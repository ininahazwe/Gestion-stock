<?php
session_start();
include('../includes/header.php');
?>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="container-fluid">
                    <div class="text-center">
                        <img class="mb-2" style="width: 100px;" src="../img/logo.png">
                        <H3>Gestion du parc informatique</H3>
                    </div>
                </div>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Identifiez-vous</h1>
                                    </div>
                                    <form class="user" action="../traitements/traitement-user.php" method="POST">
                                        <input type="hidden" name="action" value="connect">
                                        <div class="form-group">
                                            <input type="text" name="username" id="username" class="form-control form-control-user" placeholder="nom d'utilisateur / email...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" id="password" class="form-control form-control-user" placeholder="mot de passe...">
                                        </div>
                                        <input type="submit" name="login_btn" class="btn btn-primary btn-user btn-block" value="Valider">
                                        <span class="loginMsg"><?php echo @$msg;?></span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>