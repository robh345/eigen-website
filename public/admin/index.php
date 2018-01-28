<?php
include "db_connection.php";
include "function.php";

if (empty($_SESSION['username'])) {
    redirect('login_pagina.php');
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
            <li class="nav-item">
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
    <div class="row justify-content-between">
        <div class="card bg-primary col-lg-auto" style="width: 18rem;">
            <a href="content.php" class="text-center ">
                <img class="card-img" src="img/document.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-dark">Website content</h5>
                </div>
            </a>
        </div>

        <div class="card bg-primary col-lg-auto" style="width: 18rem;">
            <a href="user.php" class="text-center ">
                <img class="card-img" src="img/user.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-dark">gebruikers</h5>
                </div>
            </a>
        </div>

        <div class="card bg-primary col-lg-auto" style="width: 18rem;">
            <a href="rechtengroepen.php" class="text-center ">
                <img class="card-img" src="img/user_group_settings.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title text-dark">Rechtengroepen</h5>
                </div>
            </a>
        </div>
    </div>
</div>
</body>
</html>