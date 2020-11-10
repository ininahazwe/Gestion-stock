<?php

include('../../traitements/database.php');
include('functions.php');

if(isset($_POST["user_id"]))
{
    $image = get_image_name($_POST["user_id"]);
    if($image != '')
    {
        unlink("../../img/" . $image);
    }
    $statement = $connect->prepare(
        "DELETE FROM utilisateurs WHERE id = :id"
    );
    $result = $statement->execute(
        array(
            ':id' => $_POST["user_id"]
        )
    );

    if(!empty($result))
    {
        echo 'L\'utilisateur a été supprimé';
    }
}

