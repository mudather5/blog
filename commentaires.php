<?php

include "connect.php";

if(isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_POST['date_creation']) AND!empty($_POST['titre']) AND  !empty($_POST['contenu'] AND !impty($_POST['date_creation']))
{

  $titre = htmlspecialchars($_POST['titre']);
  $contenu = htmlspecialchars($_POST['contenu']);
  $date_cration = htmlspecialchars($_POST['date_creation']);


// the Recovery of the commentes
  $req = $bdd->prepare('INSERT INTO blog(titre, contenu, date_creation) VALUES (:titre, :contenu, :date_creation)');

  $req->execute([
    "titre"=> $titre,
    "contenu"=> $contenu,
    "date_creation"=> $date_cration
  ]);
  header('Location:index.php');

}
else
{
  echo "vous avez fait Erreur";
}

 ?>
