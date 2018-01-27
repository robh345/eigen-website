<?php
/**
 * Created by PhpStorm.
 * User: Rob Holterman
 * Date: 26-1-2018
 * Time: 18:32
 */

session_start();

$db = "mysql:host=localhost;dbname=eigen_website;port=3306";
$user = "website";
$pass = "Blondevogel1";
$pdo = new PDO($db, $user, $pass);