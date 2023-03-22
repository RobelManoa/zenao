<?php
session_start();

// Vérification de la soumission du formulaire
if (isset($_POST['username'])) {
    // Connexion à la base de données
    $bdd = 'mysql:host=localhost;dbname=zenao;charset=utf8mb4';
    $username = 'root';
    $password = '';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo = new PDO($bdd, $username, $password, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    // Requête de récupération de l'utilisateur
    $stmt = $pdo->prepare("SELECT * FROM reservation WHERE nomR = ?");
    $stmt->bindValue(1, $_POST['username'], PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();

    // Vérification de la présence de l'utilisateur dans la base de données
    if (count($result) == 1) {
        $row = $result[0];
        $_SESSION['user_id'] = $row['idReservation'];
        $_SESSION['username'] = $row['nomR'];
        $_SESSION['commande_effectuee'] = true;

        // Redirection vers la page d'accueil
        header('Location: ../index.php');
    } else {
        $error = 'Nom d\'utilisateur incorrect';
    }
}else {
    $error = 'completer les champs';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST">
        <div>
            <label>Nom d'utilisateur :</label>
            <input type="text" name="username">
        </div>
        <input type="submit" value="Se connecter">
    </form>
</body>
</html>
