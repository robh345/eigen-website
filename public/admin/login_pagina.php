<?php
include 'db_connection.php';
include 'function.php';

if (isset($_POST['submit'])){
    $username=htmlentities($_POST['username']);
    $password=htmlentities($_POST['Password']);

    if (empty($_POST['username'] || empty($_POST['Password']))){
        return ("Gebruikersnaam of wachtwoord is verkeerd!");
    }else{
        $stmt = $pdo->prepare("SELECT * FROM login WHERE username='" . $username . "'");
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (count($user) > 0){
            if (password_verify($password, $user['password'])){
                $_SESSION['username']=$user['username'];

                redirect('index.php');
            }
        }else {
            return ("Gebruikersnaam of wachtwoord is verkeerd!");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form method="post" action="">
    <input type="text" name="username" placeholder="Gebruikersnaam">
    <input type="password" name="Password" placeholder="Wachtwoord">
    <button type="submit" name="submit">Log in</button>
</form>
</body>
</html>