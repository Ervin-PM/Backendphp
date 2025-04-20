<?php
require_once 'db.php';

$data = getAboutUs();
if ($data) {
    echo json_encode(["data" => $data]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "No se pudo cargar la información"]);
}