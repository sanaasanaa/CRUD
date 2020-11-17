<?php
if(isset($_POST) && !empty($_POST)) {
$email=$_POST['email'];
$password=$_POST['password'];

 $pdo = new PDO('mysql:host=localhost; dbname=panier','root', '');

 $query=$pdo->query('SELECT * FROM client');
 $datas=$query->fetch(PDO::FETCH_ASSOC);
// var_dump($datas);
$emaildb=$datas['email'];
// var_dump($emaildb);
$passworddb=$datas['password'];
if ($email===$emaildb && $password===$passworddb) {
    header('location:read.php');
}else {
    header('location:index.php');
}



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
</head>
<body>
    <form action="index.php" method="post">
        <input type="email" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <input type="submit" name="envoyer">

    </form>
</body>
</html>