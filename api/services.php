<?php
require_once 'db.php';

$data = getServices();
if ($data) {
    echo json_encode(["data" => $data]);
} else {
    http_response_code(500);
    echo json_encode(["error" => "No se pudieron cargar los servicios"]);
}