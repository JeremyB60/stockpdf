<?php
if (isset($_GET['folder'])) {
    $folder = $_GET['folder'];
    $files = array_diff(scandir('../uploads/' . $folder), array('..', '.'));

    header('Content-Type: application/json');
    echo json_encode(array_values($files));
} else {
    header("HTTP/1.0 400 Bad Request");
    echo "Le paramètre 'folder' est manquant dans la requête.";
}
?>
