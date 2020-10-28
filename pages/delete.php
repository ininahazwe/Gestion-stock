<?php
require '../traitements/database.php';
$id = $_GET['id'];
$sql = 'DELETE FROM users WHERE id=:id';
$statement = $connect->prepare($sql);
if ($statement->execute([':id' => $id])) {
    header("Location: register.php");
}