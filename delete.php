<?php
require_once('./function.php');
ob_start();
$POST = filter_input_array(INPUT_POST);
if (isset($POST['idturma'])) { //! Deletar turma
    $idturma = $POST['idturma'];
    $data = delete('tbturma', 'idturma', $idturma);
}
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
ob_end_flush();
