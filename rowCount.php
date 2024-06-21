<?php
require_once("./function.php");
$POST = filter_input_array(INPUT_POST);
ob_start();
$idturma = $POST['idturma'];
$select = selectWhere('*', 'tbatividade', 'idturma', $idturma);
if ($select->rowCount() > 0) {
    $data =  ['success' => true, 'message' => 'Registros encontrados', 'errorType' => null];
} else {
    $data =  ['success' => false, 'message' => 'Nenhum registro encontrado', 'errorType' => null];
}
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
ob_end_flush();
