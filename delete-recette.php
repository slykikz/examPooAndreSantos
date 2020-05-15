<?php
    require_once 'pdo_connect.php';
    require_once 'functions.php';
    $id = $_GET['id'];
    deleteRecette($pdo, $id);
    header('Location: index.php');
?>
