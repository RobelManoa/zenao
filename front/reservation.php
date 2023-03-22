<?php include '../back/commande.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
</head>
<body>
    <section class="about" id="about">
        <h1 class="heading"> <span>Reservation à </span> <?php echo"$par" ?> </h1>
        <div class="row">
            <div class="image">
                <?php echo $img; ?>
            </div>

            <div class="content">
                <h3>Zenao Appart'Hotel : reservation pour <?php echo "$user"?></h3>
                <p>
                    Vous avez fait une reservation au nom de <?php echo "$user"?>
                    cette reservation est pour <?php echo $_SESSION['nombre'] ?> à <?php echo"$par" ?>
                    le <?php echo"$date" ?>
                </p>
                <h3>Informations sur <?php echo "$user"?></h3>
                <ul id="listeInfo">
                    <li>Phone : <?php echo $_SESSION['phone'] ?></li>
                    <li>mail : <?php echo $_SESSION['mail'] ?></li>
                    <li>CIN : <?php echo $_SESSION['NCIN'] ?></li>
                </ul>
                <form method="POST">
                    <a href="./see.php" class="btn">Voir</a>
                    <a href="../back/edit.php" class="btn">modifier</a>
                    <a href="../back/supp.php" class="btn">Supprimer</a>
                    <input type="submit" name="logout" value="Déconnexion" class="btn">
                </form>
            </div>
        </div>
    </section>
</body>
</html>