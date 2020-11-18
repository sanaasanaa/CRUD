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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<title>modification</title>
<style>
        body{
            background-color: #424242;
            color: white;
            font-weight: 500;
        }
        form {
            width: 20rem;
            margin: 2rem auto;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="/docs/4.5/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
            BACKOFFICE
        </a>
    </nav>

  <form action="update.php" method="post" enctype="multipart/form-data">
  <label for="">Nom</label>
        <div class="form-group">
            <input type="text" name="nom" placeholder="nom" class="form-control"
             value=<?=$_GET['nom'];?> >
        </div>
        <label for="">Reference</label>
        <div class="form-group">
            <input type="text" name="reference" class="form-control"
             value=<?=$_GET['reference'];?> >
        </div>
        <label for="">Categorie</label>
        <div class="form-group">
            <input type="text" name="categorie"  class="form-control"
              value=<?=$_GET['categorie'];?>>
        </div>
        <label for="">Lieux d'achat</label>
        <div class="form-group">
            <input type="text" name="lieu_d_achat"  class="form-control"
             value=<?=$_GET['lieu_d_achat'];?>>
        </div>
        <label for="">Date d'achat</label>
        <div class="form-group">
            <input type="date" name="date_d_achat"  class="form-control"
             value=<?=$_GET['date_d_achat'];?> >
        </div>
        <label for="">Date fin garantie</label>
        <div class="form-group">
            <input type="date" name="date_fin_garantie" class="form-control"
               value=<?=$_GET['date_fin_garantie'];?> >
        </div>
        <label for="">Prix</label>
        <div class="form-group">
            <input type="text" name="prix" class="form-control"
            value=<?=$_GET['prix'];?> > 
        </div>
        <label for="">Manuel</label>
        <div class="form-group">
            <input type="text" name="manuel" class="form-control"
            value=<?=$_GET['manuel'];?> >
        </div>
        <label for="">photo</label>
        <div class="form-group">
            <input type="file" name="photo"  class="form-control"
            value=<?=$_GET['photo'];?>>
        </div>
        <label for="">Saisie</label>
        <div class="form-group">
            <input type="text" name="saisie" class="form-control"
            value=<?=$_GET['saisie'];?>>
        </div>
    <!-- <input type="hidden" name="id" ><br>
    <input type="text" name="nom"><br>
    <input type="text" name="reference" ><br>
    <input type="text" name="categorie"><br>
    <input type="text" name="lieu_d_achat" ><br>
    <input type="date" name="date_d_achat" ><br>
    <input type="date" name="date_fin_garantie"><br>
    <input type="text" name="prix"><br>
    <input type="text" name="manuel" ><br>
    <input type="file" name="photo" ><br>
    <input type="text" name="saisie"><br> -->
    <input type="submit" name="modifier" class="btn btn-primary">
</form>


</body>
</html>