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
      
   <head>
      <?php 
         if ($_SESSION['lang'] == "fr") { ?>
            <title>Etat d'enregistrement</title>
      <?php 
         }
         else {?>
            <title>RS registration status</title>
         <?php   
         }          
            include 'MultiLangFragments/head.php';
         ?>
   </head>
   
   <body>
      <?php
         if ($_SESSION['lang'] == "fr") {
            $headTitre="Enregistrement";       
            $titre = "Accusé d'enregistrement";
         }        
         else {
            $headTitre="Registration";
            $titre = "Registration status";
         }
         
         $img = '<img id=\"imgTheme\" alt=\"Regard\" src="images/vision.jpg" />';
         include $_SESSION['clientRoot'].'MultiLangFragments/header.php';
         include $_SESSION['clientRoot'].$_SESSION['lang'].'/Fragments/nav.php';
      ?>   
      
      <section id="conteneur_1">
         <h1>
            <?php
               echo $titre;
            ?>
         </h1>
         <div>
            <?php 
               echo '<p>'.$_POST['email'].'</p>';
               $l_isRegistered = isRegistered($_POST['email']);
               
               if($l_isRegistered == False) {
               
                  if($_POST['password']==$_POST['passwordConf']) {
                     registerVisitor($_POST['secondName'], $_POST['firstName'], $_POST['email'], $_POST['password']);
                       
                     if (sendConfirmationMail($_POST['email'])) { 
                      
                        echo $ackFormula['registrationSuccess'][$_SESSION['lang']];
                     }
                     else {
                        echo '<p>Echec envoi courriel de confirmation</p>';
                     }
                  }
                  else {                        
                     echo $ackFormula['errPassword'][$_SESSION['lang']];
                  }
                 
               }
               else {
                   echo '<p>Vous êtes déjà enregistré sous ce courriel</p>';
               }      
           ?>                     
         </div>
       <?php    
         include $_SESSION['lang'].'/Fragments/footer.php';
       ?>
      </section>
   </body>
</html>