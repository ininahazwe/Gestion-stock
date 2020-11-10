<?php
try{
    $connect = new PDO("mysql:host=localhost; dbname=agpi_db2", "root", "root");

}
catch (Exception $e)
{
    die('Erreur:' . $e->getMessage());
}
