
<?php

// Est-ce que l'id existe et n'est pas vide dans l'URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    $pdo = new PDO('mysql:host=localhost; dbname=panier', 'root', '');

//    creer la variable id avec la valeur du id du produit a supprimer
    $id =($_GET['id']);

    $sql = "SELECT * FROM produits WHERE `id` = :id;";

    // On prépare la requête
    $query = $pdo->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();

    // On récupère le produit
    $produit = $query->fetch();
    var_dump($produit);

    // On vérifie si le produit existe
    if(!$produit){
        echo "Cet id n'existe pas";
        header('Location: read.php');
        die();
    }

    $sql = 'DELETE FROM `produits` WHERE `id` = :id;';

    // On prépare la requête
    $query = $pdo->prepare($sql);

    // On "accroche" les paramètre (id)
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    // On exécute la requête
    $query->execute();
    echo "Produit supprimé";
    header('Location: read.php');


}else{
    echo "URL invalide";
    header('Location:read.php');
}
?>