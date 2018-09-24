




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

  <?php
  include "connect.php";
  // echo $_GET['billet'];

if(isset($_GET['billet'])){
  $req = $bdd->prepare('SELECT * FROM billets WHERE id = :id');
$req->execute(array(
  'id' => $_GET['billet']
));
}
$req = $bdd->query('SELECT * FROM billets');
while ($donnees = $req->fetch()) {
?>
  <h3>Titre: <?php echo $donnees['titre'].'<br />'?></h3>
  <p>Contunu <?php echo $donnees['contenu']?></p>

  <?php
}
?>
 </body>
</html>
