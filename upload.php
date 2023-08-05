<?php
if ($_FILES["file"]["error"] === UPLOAD_ERR_OK) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["file"]["name"]);

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
    echo "Une erreur est survenue lors du téléchargement du fichier.";
}
?>
