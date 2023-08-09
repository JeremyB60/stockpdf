<?php

if (!empty($_POST['connecter'])) {
    $identif = htmlspecialchars($_POST['identifiant']);
    $identifiant = strtolower($identif);
    $password = htmlspecialchars($_POST['password']);

    include_once "./php/connexionbdd.php";

    $sql = "SELECT * FROM connexion WHERE identifiant = :identifiant";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':identifiant', $identifiant);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($password, $user['mdp'])) {
        $_SESSION['identifiant'] = $identifiant;
        header("Location: ./admin.php");
        exit();
    } else {
        echo '<script>$("#modal").hide()</script>';
    }
}
