<?php
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['name'], $input['service'], $input['message'])) {
    echo json_encode(["success" => "Formulario enviado correctamente"]);
} else {
    http_response_code(400);
    echo json_encode(["error" => "Datos incompletos"]);
}