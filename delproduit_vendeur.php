<?php
session_start();
    include('php/db.php');

    

    $query = $bdd->prepare('DELETE FROM `article` WHERE `id` = ?');
    $query->execute(array($_POST['id']));
    header("Location: vendeur.php"); // redirection vers cours.php
    exit();



    ?>