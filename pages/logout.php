<?php 
    $_SESSION['id'] = NULL;
    $_SESSION['username'] = '';
        // var_dump($_SESSION);die;
        session_destroy();

header('Location: login.php');
