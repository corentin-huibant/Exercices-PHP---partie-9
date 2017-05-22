<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP - partie 9, Exercice 5 </title>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="centered">
               <h1>Exercice 5</h1>
               <?php
               //retourne un nouvelle objet DateTime...
               $today = date_create();
               //dont le format est initialisé à la date d'aujourd'hui
               $today->format('d/m/Y');
               //On intialise une autre date, celle du 16 mai 2016
               $thatDay = date_create('2016-5-16');
               //On intialise une autre date, celle du 16 mai 2017
               $thisDay = date_create('2017-6-17');
               //puis on calcul la différence entre aujourd'hui et la nouvelle date choisie grâce à la fonction date_diff() (Alias de DateTime::diff())
               $intervalOne = date_diff($today, $thatDay);
               $intervalTwo = date_diff($today, $thisDay);
               //%a renvoie un chiffre à virgule flottante au format hexadecimal
               $oldInterval = $intervalOne->format('%a');
               $newInterval = $intervalTwo->format('%a');
               //grace à intval(), on tranforme nos chaines de caractères en entier
               $oldIntervalInt = intval($oldInterval);
               $NewintervalInt = intval($newInterval);
               //ce qui permet de les comparer. Si nos entiers sont plus grands que 9 :
               if ($oldIntervalInt > 1) {
                   //la variable $days est égale à la chaine de caractères 'jours' :
                   $oldDays = 'jours';
               //sinon, si elle est inférieur à 9, la variable $days est égale à la chaine de caractères 'jour' :
               }else {
                   $oldDays = 'jour';
               }
               if ($NewintervalInt > 1) {
                   //la variable $days est égale à la chaine de caractères 'jours' :
                   $newDays = 'jours';
               //sinon, si elle est inférieur à 9, la variable $days est égale à la chaine de caractères 'jour' :
               }else {
                   $newDays = 'jour';
               }
               ?>
               <p>Il s'est passé <?php echo $oldIntervalInt . ' ' . $oldDays;?> entre</p>
               <p>le 16 mai 2016 et aujourd'hui.</p>
               <br/>
               <p><?php echo $NewintervalInt . ' ' . $newDays; ?> sépare aujourd'hui </p>
               <p>et le 17 juin 2017.</p>
        </div>
        <!-- inclusion d'un template qui reprend le menu de navigation pour les exercices-->
        <?php include("../nav/index.php"); ?>
    </body>
</html>