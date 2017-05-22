<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP - partie 9, Exercice 2 </title>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="centered">
               <h1>Exercice 2</h1>
               <!-- on utilise la fonction native de PHP date() pour initialiser une date avec les paramètres demandés
               Ici, il s'agit d'une date de forme jj-mm-aaaa.-->
               <p>Nous sommes le <?php echo date("d-m-y");?></p>
        </div>
        <!-- inclusion d'un template qui reprend le menu de navigation pour les exercices-->
        <?php include("../nav/index.php"); ?>
    </body>
</html>