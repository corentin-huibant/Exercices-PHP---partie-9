<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP - TP </title>
        <link href="../style.css" rel="stylesheet" type="text/css"/>
        <link href="../TP/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!-- inclusion d'un template qui reprend le menu de navigation pour les exercices-->
        <?php include("../nav/index.php"); ?>
        <div id="calendarCentered">
               <h1>TP - Calendrier</h1>
               <form action="index.php" method="post">
                <?php
                     //la variable $months équivaut à un tableau comprenant tous les mois de l'année.
                        $months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
                ?>
                    <select name="month">
                    <?php
                         $indice = 1;
                              foreach($months as $month) {
                    ?>
                                 <option <?php 
                                 //si le mois est égal à son indice...
                                     if(empty($_POST['month'])){
                                          echo '';
                                     }elseif($_POST['month'] == $indice){
                                         //la balise option comprend la mention "selected", ce qui permet à la liste déroulante de garder le mois en mémoire
                                         echo "selected";
                                     };?> value="<?php echo $indice++?>"><?php echo $month; ?></option>
                    <?php
                             }
                    ?>
                    </select> 
                    <select name="years">
                    <?php
                    $year = 1900;
                    //La boucle for implémente la variable $year jusque 2038 dans la liste déroulante
                         for($year = 1900; $year <= 2038; $year++) {
                    ?>
                             <option <?php 
                             //si le mois est égal à son indice...
                                 if(empty($_POST['years'])){
                                     echo '';
                                 }elseif($_POST['years'] == $year){
                                     //la balise option comprend la mention "selected", ce qui permet à la liste déroulante de garder le mois en mémoire
                                     echo "selected";
                                 };?> value="<?php echo $year ?>"><?php echo $year; ?></option>
                    <?php
                    }
                    ?>
                    </select> 
                        <input type="submit" value="validez"/>
                </form>
               <?php
                    if(isset($_POST['month']) && isset($_POST['years'])){
                        /* Pour sortir le nombre de jours dans un mois précis, on utilise la fonction cal_days_in_month() 
                        Il prend comme paramètres le calendrier en vigueur, le mois, et l'année */
                        $calendar = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['years']);
                        //la variable $daysOfWeek équivaut à un tableau comprenant tous les jours de la semaine.
                        $daysOfWeek = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
                        //la variable $firstDay représente le premier jour du mois
                        $firstDay = date("w", mktime(0, 0, 0, $_POST['month'], 1, $_POST['years']));
                        //la variable $lastDay représente le dernier jour du mois
                        $lastDay = date("w", mktime(0, 0, 0, $_POST['month'], $calendar, $_POST['years']));
                        //la variable $differenceLastDay calcul la différence des jours restant dans la dernière semaine
                        $differenceInWeek = 7 - $lastDay;
               ?>
               <table>
                   <?php 
                        if(isset($_POST['month']) && isset($_POST['years'])) {
                    ?>
                        <!-- on inscrit -1 sinon la méthode $_POST va chercher l'indice supérieur -->
                        <h1><?php echo $months[$_POST['month'] - 1] . ' ' . $_POST['years']; ?></h1>
                    <?php 
                    }
                    ?>
                        <tr>
                    <?php
                        foreach($daysOfWeek as $inWeek) {
                    ?>
                            <th><?php echo $inWeek; ?></th>
                    <?php
                        }
                    ?>
                        </tr>
                    <?php
                        //la méthode date() considère dimanche comme l'indice 0. Donc, si la variable $firstDay est égal à 0, on stipule qu'il est égal au septième jour
                        if($firstDay == 0) {
                           $firstDay = 7;
                        }
                        $days = 1;
                            //On démarre la création des cases du tableau
                            for($i = 1; $i <= $calendar + ($firstDay - 1); $i++){
                                //si le reste de $i divisé par sept est strictement égal à 1
                                if ($i%7 == 1){
                    ?>
                        <!-- on ouvre autant de balise <tr> -->
                        <tr> 
                    <?php
                                }
                                //si la valeur de $i est supérieur au premier jour
                                if($i >= $firstDay){
                    ?>
                                    <td><?php 
                                    //on implémente la variable $days
                                        echo $days;
                                        $days++; 
                                    ?></td>
                    <?php
                                }else{
                    ?>
                                    <!-- sinon, les jours d'avant sont vides-->
                                    <td class="noDays"></td>
                    <?php        
                               }
                            }
                            //Pour les jours vides qui se trouvent après le dernier jour du mois, on calcul la différence
                            for($a = 1; $a <= $differenceInWeek; $a++){
                                //si l'incrémentation de la variable $a est plus petite que le nombre de jours et que le dernier jour ($lastDay) est différent de 0 (donc de dimanche)
                                if($a < $calendar && $lastDay != 0){
                    ?>
                                    <td class="noDays"></td>
                    <?php        
                                }
                            }
                        //Dans le cas où les menus déroulants n'ont pas été vérifiés, donc au lancement de la page, on affiche le calendrier du mois présent
                        }elseif(empty($_POST['month']) && empty($_POST['years'])){
                        //Ce mois
                        $thisMonth = date("m");
                        //Cette année
                        $thisYear = date("Y");
                        /* Pour sortir le nombre de jours dans un mois précis, on utilise la fonction cal_days_in_month() 
                        Il prend comme paramètres le calendrier en vigueur, le mois automatique, et l'année automatique */
                        $calendar = cal_days_in_month(CAL_GREGORIAN, $thisMonth, $thisYear);
                        //la variable $daysOfWeek équivaut à un tableau comprenant tous les jours de la semaine.
                        $daysOfWeek = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
                        //la variable $firstDay représente le premier jour du mois
                        $firstDay = date("w", mktime(0, 0, 0, $thisMonth, 1, $thisYear));
                        //la variable $lastDay représente le dernier jour du mois
                        $lastDay = date("w", mktime(0, 0, 0, $thisMonth, $calendar, $thisYear));
                        //la variable $differenceLastDay calcul la différence des jours restant dans la dernière semaine
                        $differenceInWeek = 7 - $lastDay;
               ?>
               <table>
                   <?php 
                        if(empty($_POST['month']) && empty($_POST['years'])) {
                    ?>
                        <!-- Pour le titre, on utilise la méthode strftime pour ressortir le nom du mois et de l'année actuels -->
                        <h1><?php echo strftime("%B") . ' ' . strftime("%Y"); ?></h1>
                    <?php 
                    }
                    ?>
                        <tr>
                    <?php
                        foreach($daysOfWeek as $inWeek) {
                    ?>
                            <th><?php echo $inWeek; ?></th>
                    <?php
                        }
                    ?>
                        </tr>
                    <?php
                        //la méthode date() considère dimanche comme l'indice 0. Donc, si la variable $firstDay est égal à 0, on stipule qu'il est égal au septième jour
                        if($firstDay == 0) {
                           $firstDay = 7;
                        }
                        $days = 1;
                            //On démarre la création des cases du tableau
                            for($i = 1; $i <= $calendar + ($firstDay -1); $i++){
                                //si le reste de $i divisé par sept est strictement égal à 1
                                if ($i%7 == 1){
                    ?>
                        <!-- on ouvre autant de balise <tr> -->
                        <tr> 
                    <?php
                                }
                                //si la valeur de $i est supérieur au premier jour
                                if($i >= $firstDay){
                    ?>
                                    <td><?php 
                                    //on implémente la variable $days
                                        echo $days;
                                        $days++; 
                                    ?></td>
                    <?php
                                }else{
                    ?>
                                    <!-- sinon, les jours d'avant sont vides-->
                                    <td class="noDays"></td>
                    <?php        
                               }
                            }
                            //Pour les jours vides qui se trouvent après le dernier jour du mois, on calcul la différence
                            for($a = 1; $a <= $differenceInWeek; $a++){
                                //si l'incrémentation de la variable $a est plus petite que le nombre de jours et que le dernier jour ($lastDay) est différent de 0 (donc de dimanche)
                                    if($a <= $calendar && $lastDay != 0){
                    ?>
                                        <td class="noDays"></td>
                    <?php        
                                }
                            }
                     }
                    ?>
                        </tr>
                    </tbody>
               </table>
        </div>
    </body>
</html>