<?php
    include '../back/view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/cadrePhoto.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <?php
        
            if ($_SESSION['lieux'] == "zenaoVA") {
                $affiches = $bdd->query('SELECT * FROM photo');
                while ($affiche = $affiches->fetch()) {
                    echo '<card class="img">
                            <img src="../images/avignon/'.$affiche['photo'].'" alt="" srcset="">
                        </card>';
                }
            }
            if ($_SESSION['lieux'] == "zenaoM") {
                $affiches = $bdd->query('SELECT * FROM photo');
                while ($affiche = $affiches->fetch()) {
                    echo '<card class="img">
                            <img src="../images/mulhouse/'.$affiche['photo'].'" alt="" srcset="">
                        </card>';
                }
            }
        
        ?>
    </div>
</body>
</html>