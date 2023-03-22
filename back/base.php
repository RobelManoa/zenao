<?php
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=zenao', 'root', '');
        $bdd->exec('SET NAMES UTF8');
    } catch (Exception $e) {
        die ("erreur : ".$e->getMessage());
    }
?>
