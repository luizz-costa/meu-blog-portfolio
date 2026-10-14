<?php
$host = 'localhost';
$user = 'usuario';
$password = 'senha';
$db = 'meu_banco';



$mysqli = new mysqli($host, $user, $password, $db);

if ($mysqli->connect_errno) {
    die("Falha na conexao com o banco de dados");
}

// Conversa com o banco em UTF-8, para acentos aparecerem certos
$mysqli->set_charset('utf8mb4');