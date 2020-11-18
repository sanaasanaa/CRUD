<?php
if (!empty($_FILES['photo']['name'])){
    $uploaddir = 'photo/';
    $uploadfile = $uploaddir . basename($_FILES['photo']['name']);
    //var_dump($uploadfile);

// echo '<pre>';
// if (move_uploaded_file(@$_FILES['photo']['tmp_name'], $uploadfile)) {
// echo "ok";
// } else {
// echo "Probleme avec ce fichier";
// }

    if (isset($_POST['ajouter'])) {
        
        $nom=$_POST['nom'];
        $reference=$_POST['reference'];
        $categorie=$_POST['categorie'];
        $lieu_d_achat=$_POST['lieu_d_achat'];
        $date_d_achat=$_POST['date_d_achat'];
        $date_fin_garantie=$_POST['date_fin_garantie'];
        $prix=$_POST['prix'];
        $manuel=$_POST['manuel'];
      
        $saisie=$_POST['saisie'];

        $pdo = new PDO('mysql:host=localhost; dbname=panier', 'root', '');
        $sql = "INSERT INTO produits(nom, reference, categorie, lieu_d_achat, date_d_achat, date_fin_garantie, prix, manuel, photo, saisie) VALUES ('$nom', '$reference', '$categorie', '$lieu_d_achat', '$date_d_achat', '$date_fin_garantie', '$prix', '$manuel', '$uploadfile' ,'$saisie')";
        $rslt=$pdo->prepare($sql);
        // $rslt->bindParam(':nom', $nom ,PDO::PARAM_STR);
        // $rslt->bindParam(':reference', $reference ,PDO::PARAM_STR);
        // $rslt->bindParam(':categorie', $categorie,PDO::PARAM_STR);
        $rslt->execute();

        // $rslt->execute(array($nom, $reference, $categorie));
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
    <title>Document</title>
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

    <form action="create.php" method="post" enctype="multipart/form-data">
        <label for="">Nom</label>
        <div class="input-group">
            <input type="text" name="nom" placeholder="nom" class="form-control">
        </div>
        <label for="">Reference</label>
        <div class="form-group">
            <input type="text" name="reference" placeholder="reference" class="form-control">
        </div>
        <label for="">Categorie</label>
        <div class="form-group">
            <input type="text" name="categorie" placeholder="categorie" class="form-control">
        </div>
        <label for="">Lieux d'achat</label>
        <div class="form-group">
            <input type="text" name="lieu_d_achat" placeholder="lieu_d_acht" class="form-control">
        </div>
        <label for="">Date d'achat</label>
        <div class="form-group">
            <input type="date" name="date_d_achat" placeholder="date_achat" class="form-control">
        </div>
        <label for="">Date fin garantie</label>
        <div class="form-group">
            <input type="date" name="date_fin_garantie" placeholder="date_fin_garantie" class="form-control">
        </div>
        <label for="">Prix</label>
        <div class="form-group">
            <input type="text" name="prix" placeholder="prix" class="form-control">
        </div>
        <label for="">Manuel</label>
        <div class="form-group">
            <input type="text" name="manuel" placeholder="manuel" class="form-control">
        </div>
        <label for="">photo</label>
        <div class="form-group">
            <input type="file" name="photo" placeholder="photo" class="form-control-file" class="input-group-text">
        </div>
        <label for="">Saisie</label>
        <div class="form-group">
            <input type="text" name="saisie" placeholder="saisie" class="form-control">
        </div>
        
        <input type="submit" name="ajouter" class="btn btn-primary btn-lg">

    </form>


</body>
</html>