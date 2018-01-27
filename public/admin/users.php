<?php
/**
 * Created by PhpStorm.
 * User: Rob Holterman
 * Date: 27-1-2018
 * Time: 17:38
 */


if (isset($_POST['toevoegen'])){
if (!empty($_POST['name']) and !empty($_POST['wachtwoord1']) and !empty($_POST['wachtwoord2'])){
    $pass1=htmlentities($_POST['wachtwoord1']);
    $pass2=htmlentities($_POST['wachtwoord2']);
    if ($pass1 = $pass2){
        $pass1=password_hash($_POST['wachtwoord1'], PASSWORD_DEFAULT);

        $db = "mysql:host=localhost;dbname=eigen_website;port=3306";
        $user = "website";
        $pass = "Blondevogel1";
        $pdo = new PDO($db, $user, $pass);

        $stmt = $pdo->prepare("INSERT INTO login (username, password) VALUES ('" . $_POST['name'] . "', '" . $pass1 . "')");
        $stmt->execute();

        print ("user toegevoegd");
    }else{
        print ("vul de velden correct in");
    }
} else {
    print ("vul de velden in");
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" action="">
    <input type="text" name="name" placeholder="username">
    <input type="password" name="wachtwoord1" placeholder="password">
    <input type="password" name="wachtwoord2" placeholder="repeat password">
    <button type="submit" name="toevoegen">Toevoegen</button>
</form>
</body>
</html>
