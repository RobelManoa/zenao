<?php

    session_start();
    include '../back/base.php';

    $stmt = $bdd->prepare("SELECT * FROM reservation WHERE idReservation = ".$_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->fetchAll();

    $row = $result[0];
    $_SESSION['lieux'] = $row['lieux_reserver'];

?>