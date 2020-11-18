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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>login</title>
    <style>
        body {
            height: 100vh;
            background: #1e130c;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to top, #9a8478, #1e130c);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to top, #9a8478, #1e130c);
            background-repeat: no-repeat;
            background-size: 100% 100%;

        }
        form {
            padding: 3rem;
            width: 35rem;
            margin: 4rem auto;
            border-radius: 4px;
            box-shadow: 0 0 10px  #1e130c, inset 0 0 5px  #1e130c;
        }
        .row {
            margin: 0 auto;
        }
        .login-btn {
            width: 100%;
        }
        label {
            color: white;
            font-weight: 500;
        }
        .form-control {
            padding: 15px;
            font-size: 1.3rem;
            color: #78909c;
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

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <form action="index.php" method="post" class="form-group">
                <label for="">Email</label>
                <div class="form-group">
                    <input type="email" name="email" placeholder="email" class="form-control">
                </div>
                <label for="">Password</label>
                <div class="form-group">
                    <input type="password" name="password" placeholder="password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="envoyer" class="btn btn-primary btn-lg login-btn">
                </div>
                
                </form>
            </div>
        </div>
    </div>
   
</body>
</html>