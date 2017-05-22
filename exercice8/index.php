<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP - partie 9, Exercice 8 </title>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="centered">
               <h1>Exercice 8</h1>
               <?php
               //dans la variable $date, on passe la fonction DateTime() vide qui prend automatiquement en compte la date du jour
               $date = new DateTime();
               //ensuite, la fonction date_sub permet de soustraire une durée à un objet datetime
               //il prend en compte deux paramètres, la date à modifier et la fonction date_interval_create_from_date_string()
               date_sub($date, date_interval_create_from_date_string('22 days'));
               ?>
               <!-- On affiche notre date en la formatant selon le format fourni -->
               <p>Il y a 22 jours, nous étions le <?php echo date_format($date, 'd/m/Y'); ?></p>
        </div>
        <!-- inclusion d'un template qui reprend le menu de navigation pour les exercices-->
        <?php include("../nav/index.php"); ?>
    </body>
</html>