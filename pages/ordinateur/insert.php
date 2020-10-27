<?php

if($_POST['action'] == 'create') {
    createSalle($_POST['ref'], $_POST['type'], $_POST['marque'], $_POST['modele'], $_POST['systeme'], $_POST['processeur'], $_POST['ram'], $_POST['session'], $_POST['mdp'], $_POST['ip_fixe'], $_POST['office_365'], $_POST['logiciel'], $_POST['etat'], $_POST['salle_id']);
}

function createSalle($ref, $type, $marque, $modele, $systeme, $processeur, $ram, $session, $mdp, $ip_fixe, $office_365, $logiciel, $etat, $salle_id){
    include('../../traitements/database.php');

    $req = $connect->prepare("INSERT INTO ordinateur(ref, type, marque, modele, systeme, processeur, ram, session, mdp, ip_fixe, office_365, logiciel, etat, salle_id) VALUES(:ref, :type, :marque, :modele, :systeme, :processeur, :ram, :session, :mdp, :ip_fixe, :office_365, :logiciel, :etat, :salle_id)");
    $req->bindParam(':ref', $ref);
    $req->bindParam(':type', $type);
    $req->bindParam(':marque', $marque);
    $req->bindParam(':modele', $modele);
    $req->bindParam(':systeme', $systeme);
    $req->bindParam(':processeur', $processeur);
    $req->bindParam(':ram', $ram);
    $req->bindParam(':session', $session);
    $req->bindParam(':mdp', $mdp);
    $req->bindParam(':ip_fixe', $ip_fixe);
    $req->bindParam(':office_365', $office_365);
    $req->bindParam(':logiciel', $logiciel);
    $req->bindParam(':etat', $etat);
    $req->bindParam(':salle_id', $salle_id);



    $req->execute();

    header('Location: read.php');

}