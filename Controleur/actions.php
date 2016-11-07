<?php
require './Modele/modele.php';

function listerBillets()
{
    $bdd = new Modele();
    $billets = $bdd->getBillets();
    $lienBillet = "index.php?action=afficherBillet&id=";
    // Affichage
    require 'vue/listeBillets.php';
 }
   
 function afficherBillets($id)
{
     $bdd = new Modele();
     $billet = $bdd->getBillet($id);
    $commentaires = getCommentaires($id);
    require 'vue/detailsBillet.php';
 }
 
function afficherErreur($msgErreur) 
{
    require 'vue/erreur.php';
}
