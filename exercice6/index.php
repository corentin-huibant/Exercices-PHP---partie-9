<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP - partie 9, Exercice 6 </title>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="centered">
               <h1>Exercice 6</h1>
            <?php
            /* Pour sortir le nombre de jours dans un mois précis, on utilise la fonction cal_days_in_month() 
            Il prend comme paramètres le calendrier en vigueur, le mois, et l'année */
            $number = cal_days_in_month(CAL_GREGORIAN, 2, 2016);
            ?>
               <!-- on ressort la variable qui comprend notre fonction pour calculer le calendrier -->
               <p> Il y a eu <?php echo $number; ?> jours en février 2016.</p>
        </div>
        <!-- inclusion d'un template qui reprend le menu de navigation pour les exercices-->
        <?php include("../nav/index.php"); ?>
    </body>
</html>