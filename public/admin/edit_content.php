<?php
include "function.php";
include "db_connection.php";

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

    <script src='tinymce/tinymce.min.js'></script>
    <script>tinymce.init({
            selector: '#myTextarea',
            language: 'nl',
//            skin: 'custom',
            height: 400,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | forecolor backcolor emoticons | link image',
            image_advtab: true
        });
    </script>
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
            <li class="nav-item active">
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
<?php
if (isset($_POST["save"])){
    $stmt = $pdo->prepare("UPDATE content SET omschrijving='" . $_POST['omschrijving'] . "', content='" . $_POST['myTextarea'] . "' WHERE content_id='" . $_GET['tag'] . "'");
    $stmt->execute();
    header('Location: content.php');
}
?>
<form method="post" action="">
    Titel: <input type="text" name="omschrijving" value="<?php
    $get = $_GET['tag'];

    $stmt = $pdo->prepare("SELECT * FROM content WHERE content_id=$get");
    $stmt->execute();

    while ($row = $stmt->fetch()){
        $id = $row["content_id"];
        $omschr = $row["omschrijving"];
        $cont = $row["content"];
        print ($omschr);
    }
    ?>">
    <br><br>
    Content: <textarea name="myTextarea" id="myTextarea"><?php
        $get = $_GET['tag'];

        $stmt = $pdo->prepare("SELECT * FROM content WHERE content_id=$get");
        $stmt->execute();

        while ($row = $stmt->fetch()){
            $id = $row["content_id"];
            $omschr = $row["omschrijving"];
            $cont = $row["content"];
            print ($cont);
        }
        ?></textarea>
    <br>
    <button type="submit" name="save" class="btn btn-primary">opslaan</button>
    <button class="btn btn-primary"><a href="content.php">Cancel</a></button>
</form>
</div>
</body>
</html>
