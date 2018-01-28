<?php
/**
 * Created by PhpStorm.
 * User: Rob Holterman
 * Date: 27-1-2018
 * Time: 17:38
 */

include "db_connection.php";
include "function.php";

if (empty($_SESSION['username'])) {
    redirect('login_pagina.php');
}

if (isset($_POST['toevoegen'])) {
    if (!empty($_POST['name']) and !empty($_POST['wachtwoord1']) and !empty($_POST['wachtwoord2'])) {
        $pass1 = htmlentities($_POST['wachtwoord1']);
        $pass2 = htmlentities($_POST['wachtwoord2']);
        if (strlen($pass1) >= 8) {
            if ($_POST['wachtwoord1'] == $_POST['wachtwoord2']) {
                $pass1 = password_hash($_POST['wachtwoord1'], PASSWORD_DEFAULT);

                $db = "mysql:host=localhost;dbname=eigen_website;port=3306";
                $user = "website";
                $pass = "Blondevogel1";
                $pdo = new PDO($db, $user, $pass);

                $stmt = $pdo->prepare("INSERT INTO login (username, password) VALUES ('" . $_POST['name'] . "', '" . $pass1 . "')");
                $stmt->execute();

                $succes = "User toegevoegd";
            } else {
                $error = "De wachtwoorden komen niet overeen";
            }
        } else {
            $error = "Het wachtwoord moet minimaal uit 8 tekens bestaan";
        }
    } else {
        $error = "Vul alle velden in";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all"
          rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="css/index.css">

    <title>Rob Holterman</title>
</head>
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
            <li class="nav-item active">
                <a class="nav-link" href="user.php">gebruikers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="rechtengroepen.php">rechtengroepen</a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Log uit</a>
            </li>
        </ul>
    </div>
</nav>

<br>
<div class="container">

    <?php

    if (isset($succes)) {
        Print ("
        <div class='form-group row'>
            <div class='col-md-3'></div>
            <div class='col-md-6 alert alert-success'>"
            . $succes . "
            </div >
            <div class='col-md-3'></div >
        </div >");
    } else if (isset($error)) {
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

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="post" action="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Gebruikersnaam</label>
                    <input type="text" name="name" placeholder="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Wachtwoord</label>
                    <input type="password" name="wachtwoord1" placeholder="password" class="form-control">
                    <br>
                    <label for="exampleInputPassword1">Herhaal wachtwoord</label>
                    <input type="password" name="wachtwoord2" placeholder="repeat password" class="form-control">
                    <small class="form-text text-muted">Wachtwoord moet uit minimaal 8 tekens bestaan!</small>
                </div>
                <button type="submit" name="toevoegen" class="btn btn-primary">Toevoegen</button>
            </form>
        </div>
        <div class="col-3"></div>
    </div>

</div>
</body>
</html>
