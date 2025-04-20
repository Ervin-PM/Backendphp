<?php
header("Content-Type: application/json");

// Depuración
error_log("REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD']);
error_log("REQUEST_URI: " . $_SERVER['REQUEST_URI']);
error_log("Valor de request_uri[1]: " . ($request_uri[1] ?? 'No definido'));

// Obtener el método y la URI de la solicitud
$request_method = $_SERVER['REQUEST_METHOD'];
$request_uri = array_filter(explode('/', trim($_SERVER['REQUEST_URI'], '/')));

// Validar que el endpoint esté definido
if (!isset($request_uri[1]) || empty($request_uri[1])) {
    http_response_code(400);
    echo json_encode(["error" => "Endpoint no especificado"]);
    exit;
}

// Normalizar el endpoint
$endpoint = strtolower($request_uri[1]);

// Manejar los endpoints
switch ($endpoint) {
    case 'services':
        error_log("Entrando al endpoint: services");
        require_once 'services.php';
        break;
    case 'about-us':
        error_log("Entrando al endpoint: about-us");
        require_once 'about.php';
        break;
    case 'contact':
        error_log("Entrando al endpoint: contact");
        if ($request_method === 'POST') {
            require_once 'contact.php';
        } else {
            http_response_code(405);
            echo json_encode(["error" => "Método no permitido"]);
        }
        break;
    default:
        error_log("Endpoint no encontrado: " . $endpoint);
        http_response_code(404);
        echo json_encode(["error" => "Endpoint no encontrado"]);
        break;
}