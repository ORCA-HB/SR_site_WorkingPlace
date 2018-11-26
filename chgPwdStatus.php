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

   <?php
      if ($_SESSION['lang'] == "fr") {
          $headTitre = "Mot de Passe";
      }   
     else {
         $headTitre = "Password";
     }
   ?>
      
   <head>
   <?php 
      if ($_SESSION['lang'] == "fr") { ?>
       <title>Modification de mot de passe</title>
   <?php 
      }
      else {?>
               <title>Password modification</title>
      <?php   
      }          
         include 'MultiLangFragments/head.php';
      ?>
   </head>
   
   <body>
      <?php
      if ($_SESSION['lang'] == "fr") {       
         $titre = "Changement du mot de passe";
      }
      
      else {
         $titre = "Change password status";
      }  
      $img = '<img id=\"imgTheme\" alt=\"Regard\" src="'.$_SESSION['clientRoot'].'images/vision.jpg" />';
      include 'MultiLangFragments/header.php';
      include $_SESSION['lang'].'/Fragments/nav.php';
      ?>   
      
      <section id="conteneur_1">
         <h1>
         <?php 
               echo $titre;
            ?>
         </h1>
         <div id="conteneur_2">
            <?php
               //Changement subordonnée à l'ancien mot de passe
               $l_visitorHashPwd = getHashPassword($_SESSION['email']);
               
               if ($l_visitorHashPwd == sha1($_POST['oldPwd'])) {
               
                  //On vérifie le mot de passe a bein été confirmé
                  if( $_POST['newPwd1'] == $_POST['newPwd2']) {                    
                     chgPwd($_SESSION['email'], sha1($_POST['newPwd1']));   
                     echo $ackFormula['chgPwdSuccess'][$_SESSION['lang']];
                  }
                  else {
                     //Mauvais mot de passe renseigné
                     echo $ackFormula['chgPwdFailure1'][$_SESSION['lang']];      
                  }
               }              
               else {
                  //mot de passe invalide, on recharge la page de modification
                  echo $ackFormula['wrongPwd'][$_SESSION['lang']];      
               }              
            ?>
         </div>  
      </section>                        
         <?php
            include $_SESSION['lang'].'/Fragments/footer.php';
         ?>  
   </body>
</html>