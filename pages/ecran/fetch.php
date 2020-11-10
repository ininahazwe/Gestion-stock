<?php

//fetch.php

include('../../traitements/database.php');

$column = array("id", "ref", "type", "modele", "hdmi", "vga", "dvi", "display_port", "salle_Id", "dispo");


$query = "SELECT * FROM ecran ";

if(isset($_POST["search"]["value"]))
{
    $query .= '
 WHERE ref LIKE "%'.$_POST["search"]["value"].'%" 
 OR type LIKE "%'.$_POST["search"]["value"].'%" 
 OR modele LIKE "%'.$_POST["search"]["value"].'%" 
 OR hdmi LIKE "%'.$_POST["search"]["value"].'%" 
 OR vga LIKE "%'.$_POST["search"]["value"].'%" 
 OR dvi LIKE "%'.$_POST["search"]["value"].'%" 
 OR display_port LIKE "%'.$_POST["search"]["value"].'%" 
 OR salle_Id LIKE "%'.$_POST["search"]["value"].'%" 
 OR dispo LIKE "%'.$_POST["search"]["value"].'%" 
 ';
}

if(isset($_POST["order"]))
{
    $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
    $query .= 'ORDER BY id DESC ';
}
$query1 = '';

if($_POST["length"] != -1)
{
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);
$statement->execute();
$number_filter_row = $statement->rowCount();
$statement = $connect->prepare($query . $query1);
$statement->execute();
$result = $statement->fetchAll();
$data = array();

foreach($result as $row)
{
    $sub_array = array();
    $sub_array[] = $row['id'];
    $sub_array[] = $row['ref'];
    $sub_array[] = $row['type'];
    $sub_array[] = $row['modele'];
    $sub_array[] = $row['hdmi'];
    $sub_array[] = $row['vga'];
    $sub_array[] = $row['dvi'];
    $sub_array[] = $row['display_port'];
    $sub_array[] = $row['salle_Id'];
    $sub_array[] = $row['dispo'];
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM ecran";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = array(
    'draw'   => intval($_POST['draw']),
    'recordsTotal' => count_all_data($connect),
    'recordsFiltered' => $number_filter_row,
    'data'   => $data
);

echo json_encode($output);

