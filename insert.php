<?php
require_once("./function.php");
require_once("./connection.php");
$POST = filter_input_array(INPUT_POST);
if (isset($POST['regNomeTurma'])) {
    $nome = $POST['regNomeTurma'];
    $idprofessor = $POST['idprofessor'];
    $data = insertTwoFields('tbturma', 'idprofessor, nome', $idprofessor, $nome);
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
header('Content-Type: application/json');
ob_end_flush();
