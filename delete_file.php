<?php
// Vérifier si la requête est une requête POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer le nom du fichier à supprimer depuis le corps de la requête
    $data = json_decode(file_get_contents('php://input'), true);
    $fileName = $data['fileName'];
    $destinationFolder = $data['folder']; // Nouveau paramètre pour le dossier de destination

    // Vérifier si le nom du fichier est valide (vous pouvez ajouter des vérifications supplémentaires ici si nécessaire)

    // Chemin du fichier à supprimer
    $filePath = 'uploads/' . $destinationFolder . '/' . $fileName;

    // Vérifier si le fichier existe avant de le supprimer
    if (file_exists($filePath)) {
        // Supprimer le fichier
        if (unlink($filePath)) {
            // Répondre avec un JSON indiquant que le fichier a été supprimé avec succès
            $response = array("success" => true, "message" => "Fichier supprimé avec succès.");
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        } else {
            // Répondre avec une erreur JSON si la suppression du fichier a échoué
            $response = array("success" => false, "message" => "Erreur lors de la suppression du fichier.");
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        }
    } else {
        // Répondre avec une erreur JSON si le fichier n'existe pas
        $response = array("success" => false, "message" => "Le fichier spécifié n'existe pas.");
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
} else {
    // Répondre avec une erreur JSON si la requête n'est pas une requête POST
    $response = array("success" => false, "message" => "Requête invalide. Utilisez une requête POST pour supprimer un fichier.");
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
