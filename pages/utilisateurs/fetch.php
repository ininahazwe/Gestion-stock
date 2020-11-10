<?php
include('../../traitements/database.php');
include('functions.php');
$query = '';
$output = array();
$query .= "SELECT * FROM utilisateurs ";
if(isset($_POST["search"]["value"]))
{
    $query .= 'WHERE username LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR password LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
    $image = '';
    if($row["image"] != '')
    {
        $image = '<img src="../../img/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
    }
    else
    {
        $image = '';
    }
    $sub_array = array();
    $sub_array[] = $image;
    $sub_array[] = $row["username"];
    $sub_array[] = $row["password"];
    $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-sm btn-success btn-xs update">Mettre à jour</button>';
    $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-sm btn-danger btn-xs delete">Supprimer</button>';
    $data[] = $sub_array;
}
$output = array(
    "draw"    => intval($_POST["draw"]),
    "recordsTotal"  =>  $filtered_rows,
    "recordsFiltered" => get_total_all_records(),
    "data"    => $data
);
echo json_encode($output);
