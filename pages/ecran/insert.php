<?php

if($_POST['action'] == 'create') {
    createSalle($_POST['ref'], $_POST['type'], $_POST['modele'], $_POST['hdmi'], $_POST['vga'], $_POST['dvi'], $_POST['display_port'], $_POST['salle_id'], $_POST['dispo']);
}

function createSalle($ref, $type, $modele, $hdmi, $vga, $dvi, $display_port, $salle_id, $dispo){
    include('../../traitements/database.php');

    $req = $connect->prepare("INSERT INTO ecran(ref, type, modele, hdmi, vga, dvi, display_port, salle_id, dispo) VALUES(:ref, :type, :modele, :hdmi, :vga, :dvi, :display_port, :salle_id, :dispo)");
    $req->bindParam(':ref', $ref);
    $req->bindParam(':type', $type);
    $req->bindParam(':modele', $modele);
    $req->bindParam(':hdmi', $hdmi);
    $req->bindParam(':vga', $vga);
    $req->bindParam(':dvi', $dvi);
    $req->bindParam(':display_port', $display_port);
    $req->bindParam(':salle_id', $salle_id);
    $req->bindParam(':dispo', $dispo);


    $req->execute();

    header('Location: read.php');

}