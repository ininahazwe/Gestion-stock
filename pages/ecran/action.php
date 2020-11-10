<?php

//action.php

include('../../traitements/database.php');

if($_POST['action'] == 'edit')
{
    $data = array(
        ':ref'  => $_POST['ref'],
        ':type'  => $_POST['type'],
        ':modele'   => $_POST['modele'],
        ':hdmi'   => $_POST['hdmi'],
        ':vga'   => $_POST['vga'],
        ':dvi'   => $_POST['dvi'],
        ':display_port'   => $_POST['display_port'],
        ':salle_Id'   => $_POST['salle_Id'],
        ':dispo'   => $_POST['dispo'],
        ':id'    => $_POST['id']
    );

    $query = "
 UPDATE ecran 
 SET ref = :ref, 
 type = :type, 
 modele = :modele, 
 hdmi = :hdmi,
 vga = :vga, 
 dvi = :dvi, 
 display_port = :display_port, 
 salle_Id = :salle_Id,
 dispo = :dispo
 WHERE id = :id
 ";
    $statement = $connect->prepare($query);
    $statement->execute($data);
    echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
    $query = "
 DELETE FROM ecran 
 WHERE id = '".$_POST["id"]."'
 ";
    $statement = $connect->prepare($query);
    $statement->execute();
    echo json_encode($_POST);
}