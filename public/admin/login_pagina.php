<?php
include 'db_connection.php';
include 'function.php';

if (isset($_SESSION['username'])) {
    redirect('index.php');
}

if (isset($_POST['submit'])){
    $username = htmlentities($_POST['username']);
    $password = htmlentities($_POST['Password']);

    if (empty($_POST['username']) || empty($_POST['Password'])){
        $error = "Vul alle velden in!";
    }else{
        $stmt = $pdo->prepare("SELECT * FROM login WHERE username='" . $username . "'");
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (count($user) > 1){
            if (password_verify($password, $user['password'])){
                $_SESSION['username']=$user['username'];

                redirect('index.php');
            }
        }else {
            $error = "Gebruikersnaam en/of wachtwoord is verkeerd!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all"
      rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/index.css">

<title>Rob Holterman</title>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="content.php">content</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user.php">gebruikers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rechtengroepen.php">rechtengroepen</a>
            </li>
    </div>
</nav>

<br>

<div class="container">

<?php

if (isset($error)) {
    print ("
        <div class='form-group row'>
            <div class='col-md-3'></div>
            <div class='col-md-6 alert alert-danger'>
            " . $error . "
            </div>
            <div class='col-md-3'></div>
        </div>");
}
?>

    <br>

    <div class="row mx-auto">
        <div class="col-3"></div>
        <div class="col-6">
            <h1>Inloggen</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Gebruikersnaam</label>
                    <input type="text" name="username" placeholder="Gebruikersnaam" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Wachtwoord</label>
                    <input type="password" name="Password" placeholder="Wachtwoord" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Log in</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>

<!--<form method="post" action="">-->
<!--    <input type="text" name="username" placeholder="Gebruikersnaam">-->
<!--    <input type="password" name="Password" placeholder="Wachtwoord">-->
<!--    <button type="submit" name="submit">Log in</button>-->
<!--</form>-->

</div>
</body>
</html>