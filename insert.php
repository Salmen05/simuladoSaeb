<?php
require_once("./function.php");
require_once("./connection.php");
ob_start();
header('Content-Type: application/json');
echo json_encode('preciso agora fazer a inserção da turma no banco de dados e dps fazer o then la', JSON_UNESCAPED_UNICODE);
ob_end_flush();
