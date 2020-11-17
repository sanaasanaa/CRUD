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
    <title>Document</title>
</head>
<body>
    <form action="create.php" method="post" enctype="multipart/form-data"><br>

    <input type="text" name="nom" placeholder="nom"><br>
    <input type="text" name="reference" placeholder="reference"><br>
    <input type="text" name="categorie" placeholder="categorie"><br>
    <input type="text" name="lieu_d_achat" placeholder="lieu_d_acht"><br>
    <input type="date" name="date_d_achat" placeholder="date_achat"><br>
    <input type="date" name="date_fin_garantie" placeholder="date_fin_garantie"><br>
    <input type="text" name="prix" placeholder="prix"><br>
    <input type="text" name="manuel" placeholder="manuel"><br>
    <input type="file" name="photo" placeholder="photo"><br>
    <input type="text" name="saisie" placeholder="saisie"><br>
    <input type="submit" name="ajouter">
    


    </form>
</body>
</html>