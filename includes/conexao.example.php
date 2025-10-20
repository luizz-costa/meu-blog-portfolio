<?php
$host = 'localhost';
$user = 'usuario';
$password = 'senha';
$db = 'meu_banco';



$mysqli = new mysqli($host, $user, $password, $db);

if ($mysqli->connect_errno) {
    die("Falha na conexao com o banco de dados");
}
