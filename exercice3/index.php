<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP - partie 9, Exercice 3 </title>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="centered">
               <h1>Exercice 3</h1>
               <!-- Pour afficher la date en français, on utilise d'abord la fonction setlocale() qui permet de modifier les informations pour la localité choisie dans les paramètres
               En règle général, le choix de la langue est représenté par des abrévations simples en fonction du pays (fr fr_FR, etc.)
               cependant, sur ubuntu, il faut aussi spécifier le charset UTF8-->
               <?php 
               setlocale(LC_ALL, 'fr_FR.UTF8', 'fr.UTF8');
               ?>
               <!-- Ensuite, pour afficher la date, on utilise la fonction strftime() qui permet de formater une date ou l'heure ave la spécification de la localité. -->
               <p>Nous sommes le <?php echo strftime("%A %d %B %Y.");?></p>
        </div>
        <!-- inclusion d'un template qui reprend le menu de navigation pour les exercices-->
        <?php include("../nav/index.php"); ?>
    </body>
</html>