<?php
/**
 * Created by PhpStorm.
 * User: Rob Holterman
 * Date: 25-1-2018
 * Time: 17:57
 */

function selectcontent($ids){
    $db = "mysql:host=localhost;dbname=eigen_website;port=3306";
    $user = "website";
    $pass = "Blondevogel1";
    $pdo = new PDO($db, $user, $pass);

    $stmt = $pdo->prepare("SELECT * FROM content WHERE content_id=$ids");
    $stmt->execute();

    while ($row = $stmt->fetch()){
        $id = $row["content_id"];
        $omschr = $row["omschrijving"];
        $cont = $row["content"];
        print ($cont);
    }
}

function contentomsch($ids){
    $db = "mysql:host=localhost;dbname=eigen_website;port=3306";
    $user = "website";
    $pass = "Blondevogel1";
    $pdo = new PDO($db, $user, $pass);

    $stmt = $pdo->prepare("SELECT * FROM content WHERE content_id=$ids");
    $stmt->execute();

    while ($row = $stmt->fetch()){
        $id = $row["content_id"];
        $omschr = $row["omschrijving"];
        $cont = $row["content"];
        print ($omschr);
    }
}