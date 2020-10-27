<?php

if($_POST['action'] == 'create') {
    createSalle($_POST['ref'], $_POST['type'], $_POST['marque'], $_POST['salle_id']);
}

function createSalle($ref, $type, $marque, $salle_id){
    include('../../traitements/database.php');

    $req = $connect->prepare("INSERT INTO souris(ref, type, marque, salle_id) VALUES(:ref, :type, :marque, :salle_id)");
    $req->bindParam(':ref', $ref);
    $req->bindParam(':type', $type);
    $req->bindParam(':marque', $marque);
    $req->bindParam(':salle_id', $salle_id);



    $req->execute();

    header('Location: read.php');

}