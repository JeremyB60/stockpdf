<?php
$files = array_diff(scandir('uploads'), array('..', '.'));

header('Content-Type: application/json');
echo json_encode(array_values($files));
?>
