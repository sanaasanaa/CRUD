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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>dashboard</title>
    <style>
        body {
            height: 100vh;
            background: #1e130c;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to top, #9a8478, #1e130c);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to top, #9a8478, #1e130c);
            background-repeat: no-repeat;
            background-size: 100% 100%;

        }
        .box {
            margin: 3rem 3rem;
        }
        .fa-edit {
            color: yellow;
            font-size: 1.5rem;
        }
        .fa-trash-alt {
            color: red;
            font-size: 1.5rem;
        }
        h3 {
            color: whitesmoke;
            font-size: 3rem;
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
    <!-- <div class="container"> -->
        <div class="box">

            <h3>Dashboard</h3>
        

            <table class="table table-dark table-striped table-hover table-borderless">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nom</th>
                        <th scope="col">reference</th>
                        <th scope="col">categorie</th>
                        <th scope="col">lieu d'achat</th>
                        <th scope="col">date d'acht</th>
                        <th scope="col">date de fin de garantie</th>
                        <th scope="col">prix</th>
                        <th scope="col">manuel</th>
                        <th scope="col">photo</th>
                        <th scope="col">zone de saisie</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                
                <?php $i = 1; foreach ($resultats as $resultat){?>
            
                        <td scope="row"><?php echo $i++ ?></td>
                        <td><?=$resultat['nom']?></td>
                        <td><?=$resultat['reference']?></td>
                        <td><?=$resultat['categorie']?></td>
                        <td><?=$resultat['lieu_d_achat']?></td>
                        <td><?=$resultat['date_d_achat']?></td>
                        <td><?=$resultat['date_fin_garantie']?></td>
                        <td><?=$resultat['prix']?></td>
                        <td><?=$resultat['manuel']?></td>
                        <td><img src="#" alt="Chemin_photo" width="150" height="150"></td>
                        <td><?=$resultat['saisie']?></td>
                        
                        <td>
                            
                            <a href="update.php?id=<?=$resultat['id']?>&nom=<?=$resultat['nom']?>&reference=<?=$resultat['reference']?>&categorie=<?=$resultat['categorie']?>&lieu_d_achat=<?=$resultat['lieu_d_achat']?>&date_d_achat=<?=$resultat['date_d_achat']?>&date_fin_garantie=<?=$resultat['date_fin_garantie']?>&prix=<?=$resultat['prix']?>&manuel=<?=$resultat['manuel']?>&photo=<?=$resultat['photo']?>&saisie=<?=$resultat['saisie']?>">
                                <i class="far fa-edit"></i>
                            </a>

                            <a href="delete.php?id=<?=$resultat['id']?>">
                                <i class="far fa-trash-alt"></i>
                            </a>

                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <a href="create.php" class="btn btn-primary btn-lg">AJOUTER</a>
        </div>

    <!-- </div> -->
</body>
</html>
