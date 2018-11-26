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
         <title>Modification données utilisateur</title>
   <?php 
      }
      else {?>
         <title>Visitor's data change status</title>
      <?php   
      }          
         include 'MultiLangFragments/head.php';
      ?>
   </head>
   
   <body>
      <?php
      if ($_SESSION['lang'] == "fr") {       
                  $headTitre="Informations visiteur";
                  $titre = "Mise à jours de vos informations";

      }
      
      else {
         $headTitre="Visitor's data";
         $titre = "Private data update status";
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
         <div>
            <?php
               //Mise à jour subordonnée au bon mot de passe
               $l_visitorHashPwd = getHashPassword($_SESSION['email']);

               if ($l_visitorHashPwd == sha1($_POST['password'])) {
                  $l_emailModif=false;
                  $l_modifId=false;
                  
                  //On met éventuellement à jour nom et prénom
                  if( $_POST['firstName'] != $_SESSION['firstName'] OR $_POST['secondName'] != $_SESSION['secondName']) {
                     //flag
                     $l_modifId=true;
                     
                     //Mise à jour
                     updateVisitorInfo($_POST['firstName'],$_POST['secondName'],$_SESSION['email']);
                     echo $ackFormula['updateIdSuccess'][$_SESSION['lang']];
                  }
                  else {
                     $l_modifId=false;
                  }
                  
                  //Si l'adresse email à été modifiée, il faut lancer une procédure de confirmation 
                  if( $_SESSION['email'] != $_POST['email']) {
                                                      
                     if (!isRegistered ($_POST['email'])) {
                        //Mise à jour de la base
                        updateVisitorEmail($_SESSION['email'], $_POST['email']);
                        
                        //Flag
                        $l_emailModif=true;
                        echo $ackFormula['updateMailSuccess'][$_SESSION['lang']];         
                     }
            
                     else {
                        //Adresse déjà utilisée, renvoie vers la page de modif
                        echo $ackFormula['invalidEmail'][$_SESSION['lang']];
                     }
                  }
                  
                  else {
                     $l_emailModif=false;
                  }
                  
                  if (!$l_modifId AND !$l_emailModif) {
                     echo '<p>Aucune modification demandée</p>';
                  }             
               }
               
               else {
                  //mot de passe invalide, on invite l'utilisateur à se connecter
                  echo $ackFormula['updateFailure'][$_SESSION['lang']];      
               }
              
            ?>
         </div>  
      </section>                        
         <?php
            include $_SESSION['lang'].'/Fragments/footer.php';
         ?>  
   </body>
</html>