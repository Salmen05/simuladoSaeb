<?php
ob_start();
require_once("./connection.php");
require_once("./function.php");
$options = [
    'cost' => 12
];
$regNome = $_POST['regNome'];
$regEmail = $_POST['regEmail'];
$regSenha = $_POST['regSenha'];
$regSenha = password_hash($regSenha, PASSWORD_BCRYPT, $options);
insertThreeFields('tbprofessor', 'nome, email, senha', $regNome, $regEmail, $regSenha);
echo json_encode($data, JSON_UNESCAPED_UNICODE);
ob_end_flush();
