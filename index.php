<?php 
     
    if (session_status() != PHP_SESSION_ACTIVE) {
      session_start();
      require 'Library/library.php';
      $_SESSION['lang'] = "en";

   } 
   //$_SESSION['clientRoot'] = './';    
   include 'initNav.php'; // initializes $_SESSION['clientRoot']
   init();
?>     

<!DOCTYPE html>
<html lang="en-EN">

   <head>
      <title>Relativized Systemic - Project presentation</title>
      
      <meta name="description" content="An effective constructivist framework - From the Method of Relativized Conceptualization (MRC) 
      and its extension, the Relativized Systemic (RS), to their tooled applicative developments : the methods of Knowledge Genesis Management (KGM)
       and of Relativized System Engineering (RSE)">
       
      <meta name="keywords" content="Mersyse, MBSE, MRC, RSE, KGM, Complex, Complex Systems, Complexity,,System Engineering, Systemic, 
      PLM, Product Life Management, Knowledge Management, Developments of the Method of Relativized Conceptualization (MRC), 
      Relativized Systemic (SR), Knowledge Genesis Management (KGM), the Relativized System Engineering (RSE)">
      <?php
         include $_SESSION['clientRoot'].'/'.$_SESSION['lang'].'/Fragments/commonMeta.php';
         include $_SESSION['clientRoot'].'MultiLangFragments/head.php';
      ?>
   </head>
   
   <body>
      <?php  
         $headTitre = "Our project";     
         $titre = "Vision & Method";
         $img = "<img id=\"imgTheme\" alt=\"Regard\" src=\"images/vision.jpg\" />";
         include $_SESSION['clientRoot'].'MultiLangFragments/header.php';
         include $_SESSION['clientRoot'].$_SESSION['lang'].'/Fragments/nav.php';
      ?>
     
      <section id="conteneur_1">
         <article>
            <?php 
               include $_SESSION['clientRoot'].'/MultiLangFragments/h1.php';
            ?>
            <div>
               <p>
                  Any way we conceive the external reality and our own position relatively to this exteriority is built from psychic traces contextually generated. 
                  The organization that a given set of people consensually assign to a domain of Reality defines what is known at a certain time in a given context. 
                  This physical-conceptual ground is the unsurpassable framework for any further rational knowledge or anticipation (project, hypothesis or forecast) intersubjective building.
               </p>
               <p>
                  We are convinced that explicitly figuring out and formalizing these contextual geneses, finality driven, but which, up to now, remain purely philosophical concepts 
                  (Michel Bitbol, de l’intérieur du monde (2014) - Vatzlavitch, l’invention de la réalité (1981)), 
                  is bound to dramatically improve these processes from human, scientific and economical points of view.
               </p>
               <p>
                  Such an approach entails therefore deep epistemological, mathematical, philosophical considerations including a metaphysical standing. 
                  It moves us to adopt a project we can express taking inspiration from Schrödinger’s wording (Physique quantique et représentation du monde (1951) (1992). Seuil, Paris.).
               </p>
               <mark class="quote">
                  Explicitly integrating in cognitive as well as innovative processes the active finalities which determine the framework of our conceptualization process of “the” reality, but this, 
                  without any concession to the principles of generality, of precision and of refutability which have fostered our adaptive successes, but, on the opposite, 
                  endowing them with a new basis to optimize the mastery of our destiny.
               </mark>
               <p>
                  <img src="images/Main_image.jpg" class="imageTransparente" alt="Main image" />
               </p>
               <p>
                  The <em>Method of Relativized Conceptualization (MRC)</em> by <a href="http://www.mugur-schachter.net/" target="_blank">Pr. Mugur-Schächter</a> consists in a systematically relativized 
                  and logical framework to build scientific consensus, explicitely driven by the target of "constructing consensual knowledge sujected to definite aims", 
                  structured in a way that disolves misunderstandings and false paradoxes. It appeared to us as the dramatic breakthrough which was making possible 
                  to meet our own goal.
               </p>
               <p>
                  Originally, <em>MRC</em> has been been focused specifically upon the scientific description of pre-existing physical entities. Our own goal has been to to turn 
                  <em>MRC</em> into a formal framework for the development of any method aiming at keeping 
                  under strict consensual and scientific control the geneses of achieved models, no matter what specific field is concerned by this method (human sciences, 
                  hard sciences, …), and no matter the purpose ( to hypothesise, to forecast, to design, to analyse, …). 
                  We have called that enlarged framework <em>Relativized Systemic (RS)</em>. 
                  Its elaboration has entailed fundamental epistemological and mathematical considerations tied with the classical ways of conceptualizing physical phenomena
                   and entities out of – basically – just scattered traces of interactions in space and time..
               </p>
               <p> 
                  <em>Relativized System Engineering (RSE)</em> and <em>Relativized Information Management (RIM)</em> are two conceptual and operational methods 
                  developed on that ground. <em>RSE</em> is focused upon mechatronic system engineering, including <em>Safety</em> while <em>RIM</em> 
                  is focused upon the organization and management of associated constructive processes and deliverables. 
                  They have been developed paying much attention to the human, economical and technical optimizations that become possible via the formalism 
                  mentioned above.The result is radically innovating for – both – fundamental features of conceptualization and pragmatic ones. 
                  In particular it simply turns upside down our spontaneous way of conceiving "reality" and "knowledge", whereby it gives rise 
                  to breakthroughs, as it has been already brought forth by preliminary <em>industrial applications</em>.
               </p>
            </div>
         </article>
      </section>
    
      <?php       
         include $_SESSION['clientRoot'].'/'.$_SESSION['lang'].'/Fragments/footer.php';
      ?>
  </body>
</html>
