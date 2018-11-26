<?php
   if (session_status() != PHP_SESSION_ACTIVE) {
      session_start();
      require 'Library/library.php';
      init();
      require 'MultiLangFragments/acknowledgementFormula.php'; 
   }
?>

<!DOCTYPE html>
<html>
      
   <head>
      <?php 
         if ($_SESSION['lang'] == "fr") { ?>
            <title>Nouvelle demande d'activation</title>
      <?php 
         }
         else {?>
            <title>Re activation status</title>
         <?php   
         }          
            include 'MultiLangFragments/head.php';
         ?>
   </head>
   
   <body>
      <?php
         if ($_SESSION['lang'] == "fr") {       
            $titre = "Re-activation d'un compte";
         }        
         else {
            $titre = "Re-actication status";
         }
         
         $img = '<img id=\"imgTheme\" alt=\"Regard\" src="images/vision.jpg" />';
         include 'MultiLangFragments/header.php';
         include $_SESSION['lang'].'/Fragments/nav.php';
      ?>   
      
      <section id="conteneur_1">
         <h1>
            <?php
               echo $titre;
            ?>
         </h1>
         <div>
            <?php                        
            
               if($_SESSION['lang']=='fr'){
                      echo "<p>Vous n'avez pas activé votre compte, un nouveau mail de confirmation vient de vous être envoyé.
                      Veuillez vérifier votre mail et confirmer l'activation de votre compte</p>";
                  
               }
               else {
                 echo "<p>Your personnal account has not been activated. We have just sent you a new confirmation mail.
                      Please check your mailbox</p>";
              }     
           ?>                     
         </div>
       <?php    
         include $_SESSION['lang'].'/Fragments/footer.php';
       ?>
      </section>
   </body>
</html>