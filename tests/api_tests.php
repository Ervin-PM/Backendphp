<?php
// Pruebas para la API

function testGetServices() {
    try {
        $url = 'http://localhost/backend1/api/services';
        echo "Probando endpoint: $url\n";
        $response = file_get_contents($url);
        if ($response === false) {
            throw new Exception("Error al realizar la solicitud al endpoint /services");
        }

        $data = json_decode($response, true);
        if ($data === null) {
            throw new Exception("La respuesta del endpoint /services no es un JSON válido");
        }

        assert(isset($data['data']), "El endpoint /services no devolvió datos. Respuesta: " . $response);
        echo "Prueba /services: PASÓ\n";
    } catch (Exception $e) {
        echo "Prueba /services: FALLÓ - " . $e->getMessage() . "\n";
    }
}

function testGetAboutUs() {
    try {
        $url = 'http://localhost/backend1/api/about-us';
        echo "Probando endpoint: $url\n";
        $response = file_get_contents($url);
        if ($response === false) {
            throw new Exception("Error al realizar la solicitud al endpoint /about-us");
        }

        $data = json_decode($response, true);
        if ($data === null) {
            throw new Exception("La respuesta del endpoint /about-us no es un JSON válido");
        }

        assert(isset($data['data']), "El endpoint /about-us no devolvió datos. Respuesta: " . $response);
        echo "Prueba /about-us: PASÓ\n";
    } catch (Exception $e) {
        echo "Prueba /about-us: FALLÓ - " . $e->getMessage() . "\n";
    }
}

function testPostContact() {
    try {
        $url = 'http://localhost/backend1/api/contact';
        echo "Probando endpoint: $url\n";
        $data = [
            'name' => 'Juan Pérez',
            'service' => 'Consultoría Digital',
            'message' => 'Estoy interesado en sus servicios.'
        ];
        $options = [
            'http' => [
                'header'  => "Content-type: application/json\r\n",
                'method'  => 'POST',
                'content' => json_encode($data),
            ],
        ];
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        if ($response === false) {
            throw new Exception("Error al realizar la solicitud al endpoint /contact");
        }

        $result = json_decode($response, true);
        if ($result === null) {
            throw new Exception("La respuesta del endpoint /contact no es un JSON válido");
        }

        assert(isset($result['success']), "El endpoint /contact no devolvió éxito. Respuesta: " . $response);
        echo "Prueba /contact: PASÓ\n";
    } catch (Exception $e) {
        echo "Prueba /contact: FALLÓ - " . $e->getMessage() . "\n";
    }
}

// Ejecutar pruebas
echo "Iniciando pruebas de la API...\n";
testGetServices();
testGetAboutUs();
testPostContact();
echo "Pruebas finalizadas.\n";