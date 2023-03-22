<?php
    session_start();
    include 'base.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $quantite = $_POST['quantite'];
        $residence = $_POST['residence'];
        $date = $_POST['date'];
    

        // Mise à jour des données dans la base de données
        $sql = "UPDATE reservation SET nb_personne = :quantite, lieux_reserver = :residence, date_reserver = :date WHERE idReservation = :id";
        $stmt = $bdd->prepare($sql);
        $result = $stmt->execute(['quantite' => $quantite, 'residence' => $residence, 'date' => $date, 'id' => $id]);

        if ($result) {
            // Redirection vers la page de liste des utilisateurs
            header('Location: ../front/reservation.php');
            exit;
        } else {
            // Affichage d'un message d'erreur en cas d'échec
            $error = "Erreur lors de la mise à jour des données : " . $stmt->errorInfo()[2];
            echo $error;
        }
    }

    // Récupération de l'utilisateur à modifier
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM reservation WHERE idReservation = :id";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(['id' => $id]);
    $utilisateur = $stmt->fetch();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modification</title>
    </head>
    <body>
        <h1>Modifier un utilisateur</h1>
        <form method="POST">
            <div>
                <label>Nombre de personne :</label>
                <div class="inputBox">
                    <span class="fas fa-people-arrows"></span>
                    <input type="number" name="quantite" id="quantite" value="<?php echo $utilisateur['nb_personne']; ?>">
                </div>
            </div>
            <div>
                <label>residence :</label>
            </div>
            <div class="inputBox">
                    <span class="fas fa-home"></span>
                    <select name="residence" id="residence" value="<?php echo $utilisateur['lieux_reserver']; ?>">
                        <option value="zenaoVA">zenao Villeneuve lès Avignon</option>
                        <option value="zenaoT">zenao Troyes</option>
                        <option value="zenaoM">zenao Mulhouse</option>
                        <option value="zenaoL">zenao Lisieux</option>
                        <option value="zenaoN">zenao Nevers</option>
                        <option value="zenaoY">zenao Yzeure</option>
                    </select>
                </div>
            <div>
                <label>Date :</label>
                <input type="date" name="date" id="date" value="<?php echo $utilisateur['date_reserver']; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" value="Enregistrer">
        </form>
    </body>
</html>
