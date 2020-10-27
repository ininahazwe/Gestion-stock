<?php
session_start();
include('database.php');

if($dbconfig)
    {
//
    }
else{
    header('Location:database.php');
}
if(!$_SESSION['username'])
{
    header('Location: login.php');
}
