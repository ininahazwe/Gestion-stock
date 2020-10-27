<?php

//action.php

include('../../traitements/database.php');

if($_POST['action'] == 'edit')
{
    $data = array(
        ':ref'  => $_POST['ref'],
        ':type'  => $_POST['type'],
        ':marque'   => $_POST['marque'],
        ':salle_Id'   => $_POST['salle_Id'],
        ':id'    => $_POST['id']
    );

    $query = "
 UPDATE clavier 
 SET ref = :ref, 
 type = :type, 
 marque = :marque, 
 salle_Id = :salle_Id
 WHERE id = :id
 ";
    $statement = $connect->prepare($query);
    $statement->execute($data);
    echo json_encode($_POST);
}

if($_POST['action'] == 'delete')
{
    $query = "
 DELETE FROM souris 
 WHERE id = '".$_POST["id"]."'
 ";
    $statement = $connect->prepare($query);
    $statement->execute();
    echo json_encode($_POST);
}