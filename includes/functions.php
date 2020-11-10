<?php

function debug($variable){
    echo '<pre>' . print_r($variable, true) . '</pre>';
}

function str_random($length){
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

function logged_only(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    if(!isset($_SESSION['auth'])){
        $_SESSION['flash']['danger'] = 'Vous n\'avez le droit d\'accéder à cette page';
        header('Location: ../login.php');
        exit();
    }
}

function rowCountGen($connect, $query){
    $stmt = $connect->prepare($query);
    $stmt->execute();
    return $stmt->rowCount();
}

function rowCount($connect, $query){
    $stmt = $connect->prepare($query);
    $stmt->execute(array(':id' => $_GET['id']));
    return $stmt->rowCount();
}

function show($connect, $query){
    $stmt = $connect->prepare($query);
    $stmt->execute(array(':id' => $_GET['id']));
    return $stmt->fetch();
}