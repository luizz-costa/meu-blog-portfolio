<?php
// Descobre em que pasta do servidor o site está, para os links de CSS, JS e páginas
// funcionarem nos dois ambientes sem editar nada:
//   hospedagem, na raiz do domínio      -> BASE_URL = "/"
//   XAMPP, em htdocs/meu-blog-portfolio -> BASE_URL = "/meu-blog-portfolio/"
if (!defined('BASE_URL')) {
    $raizProjeto  = str_replace('\\', '/', (string) realpath(__DIR__ . '/..'));
    $raizServidor = str_replace('\\', '/', (string) realpath($_SERVER['DOCUMENT_ROOT'] ?? ''));

    $subpasta = '';
    if ($raizServidor !== '' && stripos($raizProjeto, $raizServidor) === 0) {
        $subpasta = substr($raizProjeto, strlen($raizServidor));
    }

    define('BASE_URL', rtrim($subpasta, '/') . '/');
}
