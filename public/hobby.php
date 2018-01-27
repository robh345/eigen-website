<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: Rob Holterman-->
<!-- * Date: 25-1-2018-->
<!-- * Time: 22:50-->
<!-- */-->

<?php
include 'functions.php';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/index.css">

    <title>Rob Holterman</title>
</head>
<body class="backgroundimg">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Rob Holterman</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="over_mij.php">Over Mij<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cv.php">CV</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="hobby.php">Hobby's</a>
            </li>
        </ul>
    </div>
</nav>

<div>
    <div class="container">
        <br>
        <div class=" text-light">
            <div class="rounded bg-dark card-body row justify-content-center">
                <div class="col-8">
                    <h1 class="text-center"><?php contentomsch(2); ?></h1>
                    <div class="text-center"><?php selectcontent(2); ?></div>
                </div>
            </div>
        </div>
        <br>
        <div class="text-light text-center">
            <div class="row justify-content-between">
                <div class="rounded bg-dark col-3 card">
                    <br>
                    <img src="img/animaties-gif-sportvissen-3507344.gif" class="card-img-top">
                    <div class="card-body">
                        <h3><?php contentomsch(3); ?></h3>
                        <div><?php selectcontent(3); ?></div>
                    </div>
                </div>
                <div class="rounded bg-dark col-3 card">
                    <br>
                    <img src="img/meneer.png" class="card-img-top">
                    <div class="card-body">
                        <h3><?php contentomsch(4); ?></h3>
                        <div><?php selectcontent(4); ?></div>
                    </div>
                </div>
                <div class="rounded bg-dark col-3 card">
                    <br>
                    <img src="img/workstation-147953_960_720.png" class="card-img-top">
                    <div class="card-body">
                        <h3><?php contentomsch(5); ?></h3>
                        <div><?php selectcontent(5); ?></div>
                    </div>
                </div>
            </div>
            <br>
        </div>

    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>