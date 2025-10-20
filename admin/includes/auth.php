<?php

session_start();

// Verifica se está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: /meu-blog-portfolio/admin/login.php");
    exit();
}

// (Opcional) Verifica se é admin
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header("Location: /meu-blog-portfolio/admin/login.php");
    exit();
}
