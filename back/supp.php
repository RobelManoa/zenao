<?php

  session_start();

  if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
  }

  $user_id = $_SESSION['user_id'];

  $db = new PDO('mysql:host=localhost;dbname=zenao', 'root', '');
  $stmt = $db->prepare('DELETE FROM reservation WHERE idReservation = ?');
  $stmt->execute([$user_id]);

  session_destroy();

  header('Location: ../index.php');
  exit();

?>
