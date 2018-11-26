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
      //Enregistrement de la visite
      
      // Connexion à la base de données
      $l_mysqli  = connectBD('mersy368_sr_securedaccess'); 
      
      //MAj données visite
      $l_requete = "UPDATE sr_endorsedvisitors SET date_LastVisit = CURDATE(), visitNbr = visitNbr +1 WHERE email = ?";
      $l_visitorUpdate= $l_mysqli->prepare($l_requete);
      if($l_visitorUpdate) {
       $l_visitorUpdate->bind_param("s",$_SESSION['email']);
       $l_visitorUpdate->execute();  
       }
       mysqli_stmt_close($l_requete);
   
      if ($_SESSION['lang'] == "fr") { ?>
      <title>Etat de connexion</title>
   <?php 
      }
      else {?>
         <title>RS connection status</title>
      <?php   
      }          
         include 'MultiLangFragments/head.php';
      ?>
   </head>
   
   <body>
      <?php
         if ($_SESSION['lang'] == "fr") {       
            $titre = "Connexion";
            $headTitre = "Connexion";
         }
         
         else {
            $titre = "Connection";
            $headTitre = "Connection satus";
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
         <div id="conteneur_2">
            <?php             
               //test connexion
               if($_SESSION['connected']) {
                     echo '<p>'.$ackFormula['salutation'][$_SESSION['lang']].$_SESSION['firstName'].' '.$_SESSION['secondName'].' </p>
                           <p>'.$ackFormula['connectionSuccess'][$_SESSION['lang']].'</p>';    
                  }
               else { 
                    echo '<p>'.$ackFormula['connectionFailure'][$_SESSION['lang']].'</p>';
                    //echo $ackFormula['connectionFailure'][$_SESSION['lang']];
                }
            ?>
         </div>             
      </section>
      
      <?php       
         include $_SESSION['lang'].'/Fragments/footer.php';
      ?>
   </body>
</html>