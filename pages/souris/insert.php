<?php

if($_POST['action'] == 'create') {
    createSalle($_POST['ref'], $_POST['type'], $_POST['marque'], $_POST['salle_id'], $_POST['dispo']);
}

function createSalle($ref, $type, $marque, $salle_id, $dispo){
    include('../../traitements/database.php');

    $req = $connect->prepare("INSERT INTO souris(ref, type, marque, salle_id, dispo) VALUES(:ref, :type, :marque, :salle_id, :dispo)");
    $req->bindParam(':ref', $ref);
    $req->bindParam(':type', $type);
    $req->bindParam(':marque', $marque);
    $req->bindParam(':salle_id', $salle_id);
    $req->bindParam(':dispo', $dispo);


    $req->execute();

    header('Location: read.php');

}