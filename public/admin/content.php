<?php
/**
 * Created by PhpStorm.
 * User: Rob Holterman
 * Date: 26-1-2018
 * Time: 14:17
 */

include "db_connection.php";
include "function.php";

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
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="content.php">content</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"></a>
            </li>
        </ul>
    </div>
</nav>

<br>

<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="rol">ID</th>
            <th scope="rol">Omschrijving</th>
            <th scope="rol">Content</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM content");
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $id = $row["content_id"];
            $omschr = $row["omschrijving"];
            $row['content'] = htmlspecialchars(custom_echo($row['content'], 90));
            $cont = $row["content"];
            print ("<tr>" . "<th scope='row'>" . $id . "</th>" . "<td>" . $omschr . "</td>" . "<td>" . $cont . "</td>" . "<td><a href='edit_content.php?tag=" . $id . "'><button type='button' class='btn btn-outline-primary btn-sm'><i class='fa fa-pencil'></i></button></a></td>" . "</tr>");
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>