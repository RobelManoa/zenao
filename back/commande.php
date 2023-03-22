<?php
    session_start();
    include '../back/base.php';

    $stmt = $bdd->prepare("SELECT * FROM reservation WHERE idReservation = ".$_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if (count($result) > 0) {
        $row = $result[0];
        $_SESSION['commande_effectuee'] = true;
        $_SESSION['date'] = $row['date_reserver'];
        $_SESSION['lieux'] = $row['lieux_reserver'];
        $_SESSION['nombre'] = $row['nb_personne'];
        $_SESSION['mail'] = $row['mail'];
        $_SESSION['NCIN'] = $row['NCIN'];
        $_SESSION['phone'] = $row['phone'];
        $user = $_SESSION['username'];
        $date = $_SESSION['date'];

        if ($_SESSION['lieux'] == "zenaoVA") {
            $par = "Zenao VilleNeuve des Avignons";
            $img = '<img src="../images/residence-5.png" alt="avignon">';
        }

        if ($_SESSION['lieux'] == "zenaoN") {
            $par = "Zenao Nevers";
            $img = '<img src="../images/residence-2.png" alt="nevers">';
        }

        if ($_SESSION['lieux'] == "zenaoT") {
            $par = "Zenao Troyes";
            $img = '<img src="../images/residence-6.png" alt="troyes">';
        }

        if ($_SESSION['lieux'] =="zenaoL") {
            $par = "Zenao Lisieux";
            $img = '<img src="../images/residence-4.png" alt="lisieux">';
        }

        if ($_SESSION['lieux'] =="zenaoM") {
            $par = "Zenao Mulhouse";
            $img = '<img src="../images/residence-1.png" alt="mulhouse">';
        }

        if ($_SESSION['lieux'] =="zenaoY") {
            $par = "Zenao Yzeure";
            $img = '<img src="../images/residence-3.png" alt="yzeure">';
        }
    }

    if (isset($_POST['logout'])) {
        session_destroy();
        header('Location: ../index.php');
        exit;
    }
?>
