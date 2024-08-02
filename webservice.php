<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once 'DesafioTres.php';

use recuperarLotes;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $lote = $_GET['lote'];
    $lotes= recuperarLotes::getByLoteId($lote);
    $response = array(
        "status" => "success",
        'lotes'=>$lotes
    );

    echo json_encode($response);
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Método no permitido."));
}
?>