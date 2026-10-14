<?php

session_start();
require_once __DIR__ . '/../../includes/caminhos.php';

// Verifica se está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: " . BASE_URL . "admin/login.php");
    exit();
}

// (Opcional) Verifica se é admin
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: " . BASE_URL . "admin/login.php");
    exit();
}
