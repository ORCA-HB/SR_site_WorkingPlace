<?php
   if (session_status() != PHP_SESSION_ACTIVE) {
      session_start();
      require 'Library/library.php';
      include 'initNav.php'; // initializes $_SESSION['clientRoot']
      init();
      require 'MultiLangFragments/acknowledgementFormula.php'; 
   }
?>

<!DOCTYPE html>
<html>
   <?php
      //recuperation de la langue utilisateur
      $_SESSION['lang'] =(string) trim(urldecode($_GET['lang']));
   ?>
   
   <head>
    <?php
         
      if ($_SESSION['lang'] == "fr") { ?>
               <title>Activation</title>
         <?php 
      }
      else {?>
               <title>Activation status</title>
      <?php   
      }          
         include 'MultiLangFragments/head.php';
      ?>
   </head>
   
   <body>
      <?php 
         if ($_SESSION['lang'] == "fr") { 
            $titre = "Activation";
            $headTitre = "Activation";
         }   
            
         else {
            $titre = "Activation status";
            $headTitre = "Activation";
         }
         
         $img = '<img id=\"imgTheme\" alt=\"Regard\" src="'.$_SESSION['clientRoot'].'images/vision.jpg" />';
         include $_SESSION['clientRoot'].'MultiLangFragments/header.php';
         include $_SESSION['clientRoot'].$_SESSION['lang'].'/Fragments/nav.php';
      ?>   
      
      <section  id="conteneur_1"> 
         <article>
            <h1>
               <?php
                  echo $titre;
               ?>
            </h1>
            <div>
               <?php
                                 
                  //Recuparationadresse amail reçu
                  $l_email=(string) trim(urldecode($_GET['email'])); 
                  $_SESSION['connected']==FALSE;           
                  
                  //On récupère le paramètre qui vient d'être communiqué 
                  if(isRegistered($l_email)) {
               
                        
                     //Si le compte est bien dans la base, on l'active
                     activateAccount($l_email);
                     
                     //On en informe le visiteur et on l'invite à se connecter
                     if($_SESSION['connected']==true) {
                        echo '<p>'.$ackFormula['mailSuccess'][$_SESSION['lang']].'</p>'; 
                     }
                     else {
                       echo '<p>'.$ackFormula['activationSuccess'][$_SESSION['lang']].'</p>'.$ackFormula['connection'][$_SESSION['lang']]; 
                     }
       
                  }
                  else{
                     //Le compte ne peut être activé, on invite le visiteur à se connecter;
                     echo $ackFormula['activationFailure'][$_SESSION['lang']];
                     echo $ackFormula['connection'][$_SESSION['lang']];
                  }
               ?> 
            </div>
         </article>
         
         <?php  
            include $_SESSION['lang'].'/Fragments/footer.php';
         ?>
         
      </section>
   </body>
</html>