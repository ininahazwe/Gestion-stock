<?php

if($_POST['action'] == 'create') {
    createSalle($_POST['nom'], $_POST['localisation']);
} elseif ($_POST['action'] == 'update'){
    updateSalle($_POST['id'], $_POST['nom'], $_POST['localisation']);
} elseif ($_POST['action'] == 'delete'){
    deleteSalle($_POST['id']);
}

function createSalle($nom, $localisation){
    include('database.php');

    $req = $connect->prepare("INSERT INTO salle(nom, localisation) VALUES(:nom, :localisation)");
    $req->bindParam(':nom', $nom);
    $req->bindParam(':localisation', $localisation);


    $req->execute();

    header('Location: ../pages/salles/read.php');

}

function updateSalle($id, $nom, $localisation){
    include('database.php');

    $req = $connect->prepare("UPDATE salle SET nom = :nom,  localisation = :localisation WHERE id = :id");
    $req->bindParam(':id', $id);
    $req->bindParam(':nom', $nom);
    $req->bindParam(':localisation', $localisation);

    $req->execute();

    header('Location: ../pages/salles/read.php');

}

function deleteSalle($id){
    include('database.php');
    $req = $connect->prepare("DELETE FROM salle WHERE id = :id");

    $req->bindParam(':id', $id);

    $req->execute();

    header('Location: ../pages/salles/read.php');

}