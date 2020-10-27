<?php
session_start();
include('../../includes/header.php');
include('../../includes/sidebar.php');
include('../../includes/navbar.php');
?>

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

<?php
include('../../includes/scripts.php');
include('../../includes/footer.php');
session_destroy();
?>

