<?php
// BASE_URL: pasta do site no servidor ("/" na hospedagem, "/meu-blog-portfolio/" no XAMPP)
require_once __DIR__ . '/../../includes/caminhos.php';

// Escapa um valor antes de colocar no HTML (proteção contra XSS)
function e($valor) {
    return htmlspecialchars((string) ($valor ?? ''), ENT_QUOTES, 'UTF-8');
}
?>
