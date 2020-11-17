<?php
if (!empty($_FILES['photo']['name'])){
  $uploaddir = 'photo/';
  $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
  var_dump($uploadfile);
  
  echo '<pre>';
  if (move_uploaded_file(@$_FILES['photo']['tmp_name'], $uploadfile)) {
  echo "ok";
  } else {
  echo "Probleme avec ce fichier";
  }

if(isset($_POST) && !empty($_POST)) {
    $id=$_POST['id'] ;  
    $nom=$_POST['nom'];
    $reference=$_POST['reference'];
    $categorie=$_POST['categorie'];
    $lieu_d_achat=$_POST['lieu_d_achat'];
    $date_d_achat=$_POST['date_d_achat'];
    $date_fin_garantie=$_POST['date_fin_garantie'];
    $prix=$_POST['prix'];
    $manuel=$_POST['manuel'];
    $photo=$uploadfile;
    $saisie=$_POST['saisie'];


    $pdo = new PDO('mysql:host=localhost; dbname=panier', 'root', '');
    $sql = 'UPDATE produits SET nom=?, reference=?, categorie=?, lieu_d_achat=?, date_d_achat=?, date_fin_garantie=?, prix=?, manuel=?, photo=?, saisie=? WHERE id=?';
    $rslt=$pdo->prepare($sql);
   
    $rslt->execute([$nom,$reference,$categorie,$lieu_d_achat,$date_d_achat,$date_fin_garantie,$prix,$manuel,$photo,$saisie,$id]);
    var_dump($rslt);
  header('location:read.php');
}
}else{}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>modification</title>
</head>
<body>
<form action="update.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value=<?=$_GET['id'];?>><br>
<input type="text" name="nom" value=<?=$_GET['nom'];?>><br>
<input type="text" name="reference" value=<?=$_GET['reference'];?>><br>
<input type="text" name="categorie" value=<?=$_GET['categorie'];?>><br>
<input type="text" name="lieu_d_achat" value=<?=$_GET['lieu_d_achat'];?>><br>
<input type="date" name="date_d_achat" value=<?=$_GET['date_d_achat'];?>><br>
<input type="date" name="date_fin_garantie" value=<?=$_GET['date_fin_garantie'];?>><br>
<input type="text" name="prix" value=<?=$_GET['prix'];?>><br>
<input type="text" name="manuel" value=<?=$_GET['manuel'];?>><br>
<input type="file" name="photo" value=<?=$_GET['photo'];?>><br>
<input type="text" name="saisie" value=<?=$_GET['saisie'];?>><br>

    
<input type="submit" name="modifier">
</form>
</body>
</html>