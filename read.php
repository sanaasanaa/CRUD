<?php

$pdo = new PDO('mysql:host=localhost; dbname=panier', 'root', '');
$query = $pdo->query('SELECT * FROM produits');
$resultats = $query->fetchAll(PDO::FETCH_ASSOC); 
// echo "<pre>";
// var_dump($resultats);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
</head>
<body>
    <h3>produit1</h3>
  

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>nom</th>
                <th>reference</th>
                <th>categorie</th>
                <th>lieu d'achat</th>
                <th>date d'acht</th>
                <th>date de fin de garantie</th>
                <th>prix</th>
                <th>manuel</th>
                <th>photo</th>
                <th>zone de saisie</th>
            </tr>
        </thead>
        <tbody>
            <tr>
           
           <?php foreach ($resultats as $resultat){?>
    
                <td><?=$resultat['id']?></td>
                <td><?=$resultat['nom']?></td>
                <td><?=$resultat['reference']?></td>
                <td><?=$resultat['categorie']?></td>
                <td><?=$resultat['lieu_d_achat']?></td>
                <td><?=$resultat['date_d_achat']?></td>
                <td><?=$resultat['date_fin_garantie']?></td>
                <td><?=$resultat['prix']?></td>
                <td><?=$resultat['manuel']?></td>
                <td><img src="<?=$resultat['photo']?>" width="150" height="150"></td>
                <td><?=$resultat['saisie']?></td>
                
                <td>
                    
                    <a href="update.php?id=<?=$resultat['id']?>&nom=<?=$resultat['nom']?>&reference=<?=$resultat['reference']?>&categorie=<?=$resultat['categorie']?>&lieu_d_achat=<?=$resultat['lieu_d_achat']?>&date_d_achat=<?=$resultat['date_d_achat']?>&date_fin_garantie=<?=$resultat['date_fin_garantie']?>&prix=<?=$resultat['prix']?>&manuel=<?=$resultat['manuel']?>&photo=<?=$resultat['photo']?>&saisie=<?=$resultat['saisie']?>">modifier</a>

                    <a href="delete.php?id=<?=$resultat['id']?>">supprimer</a>

                </td>
            </tr>
           <?php } ?>
        </tbody>
    </table>
    <a href="create.php">ajouter</a>
    
   
</body>
</html>
