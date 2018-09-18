<!doctype html>

<head>
  <meta charset="utf-8">
  <title>Mon blog</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
          <h1>Mon super blog !</h1>
          <p><a href="index.php">Retour à la liste des billets</a></p>


          <form name="inscription" method="post" action="commentaires_post.php">
             pseudo : <input type="text" name="pseudo"/> <br/>
             mopass : <input type="text" name="ville"/><br/>
             <textarea name="comment" rows="8" cols="28"></textarea><br>
            <input type="submit" name="valider" value="Envoyer"/>
          </form>





<?php
// Connexion à la base de données
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

// Récupération du billet
$req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets WHERE id = ?');
$req->execute(array($_GET['billet']));
$donnees = $req->fetch();
?>

<div class="news">
    <h3>
        <?php echo htmlspecialchars($donnees['titre']); ?>
        <em>le <?php echo $donnees['date_creation_fr']; ?></em>
    </h3>

    <p>
    <?php
    echo nl2br(htmlspecialchars($donnees['contenu']));
    ?>
    </p>
</div>

<h2>Commentaires</h2>

<?php
$req->closeCursor();


$req = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires WHERE id_billet = ? ORDER BY date_commentaire');
$req->execute(array($_GET['billet']));

while ($donnees = $req->fetch())
{
  // if(empty($donnees){
  //
  //   echo"Ce billet n'existe pas";
  // }
  // else
  // {
  //   //$donnees = $req->fetch();
  //   echo "string";
  // }
?>
<p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_commentaire_fr']; ?></p>
<p><?php echo nl2br(htmlspecialchars($donnees['commentaire'])); ?></p>
<?php
}
$req->closeCursor();
?>

    </div>
  </div>
</div>
