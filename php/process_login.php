<?php

if (!empty($_POST['connecter'])) {
    $mail = htmlspecialchars($_POST['email']);
    $email = strtolower($mail);
    $password = htmlspecialchars($_POST['password']);
    
    include_once "./php/connexionbdd.php";
    
    $sql = "SELECT * FROM connexion WHERE mail = :email AND mdp = :mdp";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mdp', $password);
    $stmt->execute();
    
    if ($stmt->rowCount() == 1) {
        $_SESSION['email'] = $email;
        header("Location: ./admin.php");
        exit();
    } else {
        echo '<script>$("#modal").hide()</script>';
    }
}
