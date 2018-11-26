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
               $l_isRegistered = isRegistered($_POST['email']);
               
               if($l_isRegistered == True) {
               
                  if($_POST['password']==$_POST['passwordConf']) {
                     //Desactivation  
                     desactivateAccount($_POST['email']);

                     //Mise du mot de pase de la base
                     chgPwd($_POST['email'], sha1($_POST['password']));
                     sendConfirmationMail($_POST['email']);

                     
                     //Avertissement 
                     echo $ackFormula['chgPwdSuccess'][$_SESSION['lang']];
                     echo $ackFormula['activationRequest'][$_SESSION['lang']];
                  }
                  else {
                     //Mauvais mot de passe renseigné
                     echo $ackFormula['chgPwdFailure1'][$_SESSION['lang']];      
                  }
               }
               else {                        
                  echo $ackFormula['unknownVisitor'][$_SESSION['lang']];
               }         
           ?>                     
         </div>
       <?php    
         include $_SESSION['lang'].'/Fragments/footer.php';
       ?>
      </section>
   </body>
</html>