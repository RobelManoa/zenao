<?php 
    session_start();
    include 'back/base.php';
    include 'back/avis.php';

   if (isset($_POST['valider'])) {
    if (!empty($_POST['name'])) {
        if (!empty($_POST['mail'])) {
            if (!empty($_POST['phone'])) {
                if (!empty($_POST['quantite'])) {
                    if (!empty($_POST['cin'])) {
                        $num_cin = $_POST['cin'];

                        if (strlen($num_cin) != 12) {
                            echo "Numéro non valide";
                            exit;
                        }
                        if (!empty($_POST['date'])) {
                            $date = $_POST['date'];

                            $resultat = $bdd->prepare("SELECT * FROM reservation WHERE date_reserver = :date");
                            $resultat->bindParam(':date', $date);
                            $resultat->execute();

                            if ($resultat) {
                                if ($resultat->rowCount() > 0) {
                                    echo "La date $date est déjà réservée.";
                                    exit;
                                }
                            } else {
                                // Erreur lors de l'exécution de la requête
                                echo "Erreur lors de l'exécution de la requête";
                                exit;
                            }
                            if (!empty($_POST['residence'])) {
                                if ($_POST['residence'] == zenaoVA) {
                                    if ($_POST['quantite'] > 2) {
                                        echo '<script>alert("Nombre de personne autorisé 2");</script>';
                                    }else{
                                        $res = $bdd->query('INSERT INTO vavignon (nom_client,mail,phone,NCIN,date_reserver) VALUE ("'.$_POST['name'].'","'.$_POST['mail'].'","'.$_POST['phone'].'","'.$_POST['cin'].'","'.$_POST['date'].'")');
                                        $res = $bdd->query('INSERT INTO reservation(nomR,mail,phone,lieux_reserver,nb_personne,NCIN,date_reserver) VALUE ("'.$_POST['name'].'","'.$_POST['mail'].'","'.$_POST['phone'].'","'.$_POST['residence'].'","'.$_POST['quantite'].'","'.$_POST['cin'].'","'.$_POST['date'].'")');
                                        $_SESSION['commande_effectuee'] = true;
                                        header('location:index.php');
                                    }
                                }
                                if ($_POST['residence'] == zenaoT) {
                                    if ($_POST['quantite'] > 2) {
                                        echo '<script>alert("Nombre de personne autorisé 2");</script>';
                                    }else {
                                        $res = $bdd->query('INSERT INTO troyes (nom_client,mail,phone,NCIN,date_reserver) VALUE ("'.$_POST['name'].'","'.$_POST['mail'].'","'.$_POST['phone'].'","'.$_POST['cin'].'","'.$_POST['date'].'")');
                                        $res = $bdd->query('INSERT INTO reservation(nomR,mail,phone,lieux_reserver,nb_personne,NCIN,date_reserver) VALUE ("'.$_POST['name'].'","'.$_POST['mail'].'","'.$_POST['phone'].'","'.$_POST['residence'].'","'.$_POST['quantite'].'","'.$_POST['cin'].'","'.$_POST['date'].'")');
                                        $_SESSION['commande_effectuee'] = true;
                                        header('location:index.php');
                                    }
                                }
                                if ($_POST['residence'] == zenaoM) {
                                    if ($_POST['quantite'] > 2) {
                                        echo '<script>alert("Nombre de personne autorisé 2");</script>';
                                    } else {
                                        $res = $bdd->query('INSERT INTO mulhouse (nom_client,mail,phone,NCIN,date_reserver) VALUE ("'.$_POST['name'].'","'.$_POST['mail'].'","'.$_POST['phone'].'","'.$_POST['cin'].'","'.$_POST['date'].'")');
                                        $res = $bdd->query('INSERT INTO reservation(nomR,mail,phone,lieux_reserver,nb_personne,NCIN,date_reserver) VALUE ("'.$_POST['name'].'","'.$_POST['mail'].'","'.$_POST['phone'].'","'.$_POST['residence'].'","'.$_POST['quantite'].'","'.$_POST['cin'].'","'.$_POST['date'].'")');
                                        $_SESSION['commande_effectuee'] = true;
                                        header('location:index.php');
                                    }
                                    
                                }
                                if ($_POST['residence'] == zenaoL) {
                                    if ($_POST['quantite'] > 3) {
                                        echo '<script>alert("Nombre de personne autorisé 3");</script>';
                                    } else {
                                        $res = $bdd->query('INSERT INTO lisieux (nom_client,mail,phone,NCIN,date_reserver) VALUE ("'.$_POST['name'].'","'.$_POST['mail'].'","'.$_POST['phone'].'","'.$_POST['cin'].'","'.$_POST['date'].'")');
                                        $res = $bdd->query('INSERT INTO reservation(nomR,mail,phone,lieux_reserver,nb_personne,NCIN,date_reserver) VALUE ("'.$_POST['name'].'","'.$_POST['mail'].'","'.$_POST['phone'].'","'.$_POST['residence'].'","'.$_POST['quantite'].'","'.$_POST['cin'].'","'.$_POST['date'].'")');
                                        $_SESSION['commande_effectuee'] = true;
                                        header('location:index.php');
                                    }
                                    
                                }
                                if ($_POST['residence'] == zenaoN) {
                                    if ($_POST['quantite'] > 3) {
                                        echo '<script>alert("Nombre de personne autorisé 2 à 3");</script>';
                                    } else {
                                        $res = $bdd->query('INSERT INTO nevers (nom_client,mail,phone,NCIN,date_reserver) VALUE ("'.$_POST['name'].'","'.$_POST['mail'].'","'.$_POST['phone'].'","'.$_POST['cin'].'","'.$_POST['date'].'")');
                                        $res = $bdd->query('INSERT INTO reservation(nomR,mail,phone,lieux_reserver,nb_personne,NCIN,date_reserver) VALUE ("'.$_POST['name'].'","'.$_POST['mail'].'","'.$_POST['phone'].'","'.$_POST['residence'].'","'.$_POST['quantite'].'","'.$_POST['cin'].'","'.$_POST['date'].'")');
                                        $_SESSION['commande_effectuee'] = true;
                                        header('location:index.php');
                                    }
                                    
                                }
                            }
                        }
                    }
                }
            }
        }
    }
   }

 ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zenao Appart'Hotel</title>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="back/AOS - Animate on scroll library_files/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="index.php" class="logo">
        <img src="images/logo.png" alt="logo">
    </a>

    <nav class="navbar">
        <a href="#home">Accueil</a>
        <a href="#about">Propos</a>
        <a href="#menu">Résidences</a>
        <a href="#review">Avis</a>
        <a href="#contact">contact</a>
        <a href="#blogs">A savoir sur nous</a>
        <?php if (isset($_SESSION['commande_effectuee']) && $_SESSION['commande_effectuee']) { ?>
            <a href="./front/reservation.php">Votre reservation <i class="fas fa-check"></i></a>
        <?php }else { ?>
            <a href="./front/connexion.php">Déjà commander? </a>
        <?php }; ?>
    </nav>

    <div class="icons">
        <div class="fas fa-search" id="search-btn"></div> 
        <div class="fas fa-at" id="cart-btn"></div>
        <div class="fas fa-bars" id="menu-btn"></div>
    </div>

    <div class="search-form">
        <input type="search" id="search-box" placeholder="search here...">
        <label for="search-box" class="fas fa-search"></label>
    </div>

    <div class="cart-items-container">  
        <h1>Nos adress éléctronique</h1>
        <div class="cart-item">
            <img src="images/residence-6.png" alt="">
            <div class="content">
                <h3>TROYES</h3>
                <div class="price"><a href="mailto:zenao.troyes@stella-management.com">zenao.troyes@stella-management.com</a></div>
            </div>
        </div>
        <div class="cart-item">
            <img src="images/residence-1.png" alt="">
            <div class="content">
                <h3>MULHOUSE</h3>
                <div class="price"><a href="mailto:zenao.mulhouse@stella-management.com">zenao.mulhouse@stella-management.com</a></div>
            </div>
        </div>
        <div class="cart-item">
            <img src="images/residence-4.png" alt="">
            <div class="content">
                <h3>LISIEUX</h3>
                <div class="price"><a href="mailto:zenao.lisieux@obeo-residences.com">zenao.lisieux@obeo-residences.com</a></div>
            </div>
        </div>
        <div class="cart-item">
            <img src="images/residence-2.png" alt="">
            <div class="content">
                <h3>NEVERS</h3>
                <div class="price"><a href="mailto:zenao.nevers@obeo-residences.com">zenao.nevers@obeo-residences.com</a></div>
            </div>
        </div>
        <div class="cart-item">
            <img src="images/residence-3.png" alt="">
            <div class="content">
                <h3>YZEURE</h3>
                <div class="price"><a href="mailto:zenao.yzeure@obeo-residences.com">zenao.yzeure@obeo-residences.com</a></div>
            </div>
        </div>
        <div class="cart-item">
            <img src="images/residence-5.png" alt="">
            <div class="content">
                <h3>VILLENEUVE LES AVIGNON </h3>
                <div class="price"><a href="mailto:vla@stella-management.com">vla@stella-management.com</a></div>
            </div>
        </div>
        <a href="#contact" class="btn">Passer Commande?</a>
    </div>

</header>

<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Zenao</h3>
        <p>Zenao Appart'Hotel : c'est comme à la maison !</p>
        <a href="#contact" class="btn">Nous contacter</a>
    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> <span>Au sujet </span> de Zenao </h1>

    <div class="row">

        <div class="image">
            <img src="images/images.png" alt="">
        </div>

        <div class="content">
            <h3>Zenao Appart'Hotel : c'est comme à la maison !</h3>
            <p>
                Informations, conseils, réservations, devis personnalisés, facilités de paiement … quelle
                que soit votre demande, l’équipe Zenao Appartements est  à votre écoute pour une
                réponse sur-mesure !
            </p>
            <a href="#contact" class="btn">Reserver</a>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- menu section starts  -->

<section class="menu" id="menu">

    <h1 class="heading"> Nos <span>résidences</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/residence-5.png" alt="">
            <h3>Zenao – Villeneuve lès Avignon</h3>
            <div class="price">65,00 € / Nuit</div>
            <a href="#" class="btn">Aller voir</a>
        </div>

        <div class="box">
            <img src="images/residence-4.png" alt="">
            <h3>Zenao – Lisieux</h3>
            <div class="price">53,00 € / Nuit</div>
            <a href="#" class="btn">Aller voir</a>
        </div>

        <div class="box">
            <img src="images/residence-2.png" alt="">
            <h3>Zenao – Nevers</h3>
            <div class="price">60,00 € / Nuit</div>
            <a href="#" class="btn">Aller voir</a>
        </div>

        <div class="box">
            <img src="images/residence-3.png" alt="">
            <h3>Zenao – Yzeure</h3>
            <div class="price">55,00 € / Nuit</div>
            <a href="#" class="btn">Aller voir</a>
        </div>

        <div class="box">
            <img src="images/residence-6.png" alt="">
            <h3>Zenao – Troyes</h3>
            <div class="price">59,00 € / Nuit</div>
            <a href="#" class="btn">Aller voir</a>
        </div>

        <div class="box">
            <img src="images/residence-1.png" alt="">
            <h3>Zenao – Mulhouse</h3>
            <div class="price">55,00 € / Nuit</div>
            <a href="#" class="btn">Aller voir</a>
        </div>

    </div>

</section>

<!-- menu section ends -->

<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading"> Avis des <span>voyageurs</span> </h1>

    <div class="box-container">

        <?php
            while ($view = $views->fetch()) {
                if ($view['note'] == 1) {
                    $view['note'] = '<i class="fa fa-star"></i>';
                }elseif ($view['note'] == 2) {
                    $view['note'] = '<i class="fa fa-star"></i><i class="fa fa-star"></i>';
                }elseif ($view['note'] == 3) {
                    $view['note'] = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                }elseif ($view['note'] == 4) {
                    $view['note'] = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                }elseif ($view['note'] == 5) {
                    $view['note'] = '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';
                }
                echo '
                    <div class="box">
                        <img src="images/quote-img.png" alt="" class="quote">
                        <p>Ce que '.$view['noom'].' pense de '.$view['lieux'].'</p>
                        <p>'.$view['message'].'</p>
                        <h3>'.$view['noom'].'</h3>
                        <p>'.$view['note'].'</p>
                    </div>
                ';
            }
        ?>

    </div>

</section>

<!-- review section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

    <h1 class="heading"> <span>contacter</span> nous </h1>

    <div class="row">

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2682.4472863085493!2d7.338285099999999!3d47.7533779!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47919b76c22736dd%3A0x3ad1f193f4063c36!2sZenao%20Appart&#39;hotel%20Mulhouse!5e0!3m2!1sfr!2smz!4v1675251028114!5m2!1sfr!2smz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <form action="" method="post">
            <h3>Louer chez nous</h3>
            <div class="inputBox">
                <span class="fas fa-user"></span>
                <input type="text" placeholder="name" name="name" autocomplete="off">
            </div>
            <div class="inputBox">
                <span class="fas fa-envelope"></span>
                <input type="email" placeholder="email" name="mail" autocomplete="off">
            </div>
            <div class="inputBox">
                <span class="fas fa-phone"></span>
                <input type="number" placeholder="téléphone" name="phone" autocomplete="off">
            </div>
            <div class="inputBox">
                <span class="fas fa-home"></span>
                <select name="residence" id="residence">
                    <option value="zenaoVA">zenao Villeneuve lès Avignon</option>
                    <option value="zenaoT">zenao Troyes</option>
                    <option value="zenaoM">zenao Mulhouse</option>
                    <option value="zenaoL">zenao Lisieux</option>
                    <option value="zenaoN">zenao Nevers</option>
                    <option value="zenaoY">zenao Yzeure</option>
                </select>
            </div>
            <div class="inputBox">
                <span class="fas fa-people-arrows"></span>
                <input type="number" name="quantite" id="quantite" placeholder="Nombre de personne" autocomplete="off">
            </div>
            <div class="inputBox">
                <span class="fas fa-card"></span>
                <input type="number" name="cin" id="cin" placeholder="Votre numéro CIN" autocomplete="off">
            </div>
            <div class="inputBox">
                <input type="date" name="date" id="date">
            </div>
            <input type="submit" value="Reserver" class="btn" name="valider">
        </form>

    </div>

</section>

<!-- contact section ends -->

<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <h1 class="heading"> A savoir <span>sur nous</span> </h1>

    <div class="box-container">

        <div class="box">
            <div class="image">
                <img src="images/234009901_1.jpg" alt="">
            </div>
            <div class="content">
                <a href="#" class="title">Des appart d'Hotels bien situés</a>
                <p>Tous nos appart’hotels sont idéalement situés, au coeur des villes, dans des secteurs calmes et proches des commerces.</p>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/nettoyage.jpg" alt="">
            </div>
            <div class="content">
                <a href="#" class="title">Services de nettoyage</a>
                <p>Des services de ménage quotidien & de blanchisserie / laverie.</p>
            </div>
        </div>

        <div class="box">
            <div class="image">
                <img src="images/reception.jpg" alt="">
            </div>
            <div class="content">
                <a href="#" class="title">Reception</a>
                <p>Un service de concierge est à votre disposition ainsi qu’un service de bagagerie.</p>
            </div>
        </div>

    </div>

</section>

<!-- blogs section ends -->

<!-- footer section starts  -->

<section class="footer">

    <div class="share">
        <a href="https://www.facebook.com/zenaoyzeure" class="fab fa-facebook-f"></a>
        <a href="https://www.instagram.com/zenaotroyes/?hl=fr" class="fab fa-instagram"></a>
        <a href="https://fr.linkedin.com/in/zenao-appart-h%C3%B4tel-troyes-0412aa177?original_referer=https%3A%2F%2Fwww.google.com%2F" class="fab fa-linkedin"></a>
    </div>

    <div class="links">
        <a href="#home">Accueil</a>
        <a href="#about">Propos</a>
        <a href="#menu">Résidences</a>
        <a href="#review">Avis</a>
        <a href="#contact">contact</a>
        <a href="#blogs">A savoir sur nous</a>
    </div>

</section>

<!-- footer section ends -->













<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- custom js file link  -->
<script src="js/script.js"></script>
<script>
  AOS.init();
</script>

</body>
</html>