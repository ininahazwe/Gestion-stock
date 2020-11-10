<?php
include('../../traitements/database.php');
include('functions.php');
if(isset($_POST["operation"]))
{
    if($_POST["operation"] == "Enregistrer")
    {
        $image = '';
        if($_FILES["user_image"]["name"] != '')
        {
            $image = upload_image();
        }
        $statement = $connect->prepare("
   INSERT INTO utilisateurs (username, password, image) 
   VALUES (:username, :password, :image)
  ");
        $result = $statement->execute(
            array(
                ':username' => $_POST["username"],
                ':password' => $_POST["password"],
                ':image'  => $image
            )
        );
        if(!empty($result))
        {
            echo 'utilisateur créé';
        }
    }
    if($_POST["operation"] == "Valider")
    {
        $image = '';
        if($_FILES["user_image"]["name"] != '')
        {
            $image = upload_image();
        }
        else
        {
            $image = $_POST["hidden_user_image"];
        }
        $statement = $connect->prepare(
            "UPDATE utilisateurs 
   SET username = :username, password = :password, image = :image  
   WHERE id = :id
   "
        );
        $result = $statement->execute(
            array(
                ':username' => $_POST["username"],
                ':password' => $_POST["password"],
                ':image'  => $image,
                ':id'   => $_POST["user_id"]
            )
        );
        if(!empty($result))
        {
            echo 'Mise à jour effectuée';
        }
    }
}