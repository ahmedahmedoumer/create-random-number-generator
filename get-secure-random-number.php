<?php

require_once __DIR__ . '/utils.php'; 

use General\Utils; 

header('Content-Type: application/json');

$min = isset($_GET['min']) ? intval($_GET['min']) : 0;
$max = isset($_GET['max']) ? intval($_GET['max']) : 100;

if ($min >= $max) {
    http_response_code(400);
    echo json_encode([
        'error' => 'min should not be greter than max'
    ]);
    exit;
}

try {
    $randomNumber = General\Utils::getSecureRandom($min, $max);

    echo json_encode([
        'min' => $min,
        'max' => $max,
        'randomNumber' => $randomNumber
    ]);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => 'something wrong',
        'message' => $e->getMessage()
    ]);
}
?>
