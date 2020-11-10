<?php
include('../../traitements/database.php');
include('functions.php');
if(isset($_POST["user_id"]))
{
    $output = array();
    $statement = $connect->prepare(
        "SELECT * FROM utilisateurs 
  WHERE id = '".$_POST["user_id"]."' 
  LIMIT 1"
    );
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
        $output["username"] = $row["username"];
        $output["password"] = $row["password"];
        if($row["image"] != '')
        {
            $output['user_image'] = '<img src="../../img/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
        }
        else
        {
            $output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
        }
    }
    echo json_encode($output);
}