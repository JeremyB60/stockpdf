<?php
//VARIABLES DE CONNEXION
$servername = "localhost";
$username = "root";
$dbname = "stockpdf";
$password = "";

//TESTE LA CONNEXION ET SI N'EXISTE PAS CREATION BDD
try {
    $connexion = new PDO("mysql:host=$servername;charset=utf8", "$username", "$password");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8 COLLATE utf8_bin";
    $connexion->exec($sql);
}

//CAPTURE LES ERREURS AVEC PDOException DANS UN FICHIER error.log
catch (PDOException $e) {
    $fichier = fopen("error.log", "a+"); //creation fichier pour récupérer les erreurs
    setlocale(LC_TIME, 'fr_FR');
    date_default_timezone_set('Europe/Paris');
    fwrite($fichier, date("d/m/Y h:i:s") . " : " . $e->getMessage() . "\n");
    fclose($fichier);
};

//CONNEXION A LA BDD ET SI N'EXISTE PAS CREATION DE TABLES
try {
    $connexion = new PDO("mysql:host=$servername; dbname=$dbname;charset=utf8", $username, $password);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $sql = "CREATE TABLE IF NOT EXISTS classes (
        idclasse INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(50) NOT NULL
    ) CHARACTER SET utf8 COLLATE utf8_bin"; //spécifie le jeu de caractère utilisé
    $connexion->exec($sql);
}

catch (PDOException $e) { //RECUPERATION DES ERREURS DANS LE JOURNAL error.log
    $fichier = fopen("error.log", "a+");  //ouvre le fichier en mode lecture/écriture avec le pointeur à la fin
    setlocale(LC_TIME, 'fr_FR'); //localisation pour afficher l'heure selon les conventions françaises
    date_default_timezone_set('Europe/Paris'); //fuseau horaire
    fwrite($fichier, date("d/m/Y h:i:s") . " : " . $e->getMessage() . "\n"); //écrit la date, l'heure et le message d'erreur + retour à la ligne
    fclose($fichier);
};
