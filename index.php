<?php
include "post.php";
$req = $bdd->query('SELECT * FROM billets');
?>



<!doctype html>

<head>
  <meta charset="utf-8">
  <title>Mon blog</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
<h1>Billets:</h1>

<?php
// var_dump($req->fetch());

while($donnees = $req->fetch())
{


   ?>

   <h3><?php echo $donnees['titre'] ?></h3>
   <p>contenu: <?php echo $donnees['contenu'] ."<br />"?></p>
   <p>date:<?php echo $donnees['date_creation'] ."<br />"?> </p>
   <a href="article.php?billet=<?php echo $donnees['id'] ?>">commentaires</a>

   <?php

}//the end of boucle while 
?>



</body>

</html>
