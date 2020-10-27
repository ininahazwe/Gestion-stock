<?php

//action.php

include('../../traitements/database.php');

if($_POST['action'] == 'edit')
{
    $data = array(
        ':ref'  => $_POST['ref'],
        ':type'  => $_POST['type'],
        ':marque'   => $_POST['marque'],
        ':modele'   => $_POST['modele'],
        ':systeme'   => $_POST['systeme'],
        ':processeur'   => $_POST['processeur'],
        ':ram'   => $_POST['ram'],
        ':session'   => $_POST['session'],
        ':mdp'   => $_POST['mdp'],
        ':ip_fixe'   => $_POST['ip_fixe'],
        ':office_365'   => $_POST['office_365'],
        ':logiciel'   => $_POST['logiciel'],
        ':etat'   => $_POST['etat'],
        ':salle_Id'   => $_POST['salle_Id'],
        ':id'    => $_POST['id']
    );

    $query = "
 UPDATE ordinateur 
 SET ref = :ref, 
 type = :type, 
 marque = :marque, 
 modele = :modele,
 systeme = :systeme,
 processeur = :processeur,
 ram = :ram,
 session = :session,
 mdp = :mdp,
 ip_fixe = :ip_fixe,
 office_365 = :office_365,
 logiciel = :logiciel,
 etat = :etat,
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
 DELETE FROM ordinateur 
 WHERE id = '".$_POST["id"]."'
 ";
    $statement = $connect->prepare($query);
    $statement->execute();
    echo json_encode($_POST);
}