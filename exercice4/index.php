<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP - partie 9, Exercice 4 </title>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="centered">
            <!-- le timestamp calcul le nombre de secondes qui se sont écoulées entre le 1/01/1970 et une date spécifique-->
               <h1>Exercice 4</h1>
               <!-- Pour ressortir le timestamp, on utilise simplement la fonction time()-->
               <p>Le timestamp à cette seconde précise : <?php echo time();?></p>
               <!-- tandis que pour ressortir celui d'une date ultérieur-->
               <p>Le timestamp du 02/08/2015 à 15:00 : <?php echo mktime(15, 0, 0, 8, 2, 2016);?></p>
        </div>
        <!-- inclusion d'un template qui reprend le menu de navigation pour les exercices-->
        <?php include("../nav/index.php"); ?>
    </body>
</html>