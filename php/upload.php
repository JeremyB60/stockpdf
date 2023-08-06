<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si le paramètre "folder" est présent dans la requête
    if (!isset($_POST['folder'])) {
        header("HTTP/1.0 400 Bad Request");
        echo "Le paramètre 'folder' est manquant dans la requête.";
        exit;
    }

    $destinationFolder = $_POST['folder']; // Récupérer le dossier de destination

    // Vérifier si le dossier de destination existe, sinon le créer
    $targetDir = "../uploads/" . $destinationFolder;
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $targetFile = $targetDir . "/" . basename($_FILES["file"]["name"]);

    // Vérifier si le fichier est un PDF
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if ($fileType !== "pdf") {
        echo "Erreur : Seuls les fichiers PDF sont autorisés.";
        die();
    }

    // Déplacer le fichier vers le répertoire de destination
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        echo "Le fichier a été téléchargé avec succès.";
    } else {
        echo "Une erreur est survenue lors du téléchargement du fichier.";
    }
} else {
    header("HTTP/1.0 400 Bad Request");
    echo "Requête invalide. Utilisez une requête POST pour télécharger un fichier.";
}
?>
