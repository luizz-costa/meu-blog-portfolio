<?php 

require_once __DIR__ . '/../includes/auth.php';


require_once __DIR__ . '/config.php'; 

?>


<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Painel - Admin</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>admin/assets/css/style.css">

</head>
<body>
  <header class="topbar">
    <div class="brand">Painel Administrativo</div>
    <nav class="menu">
      <a href="<?= BASE_URL ?>admin/dashboard.php">Dashboard</a>
      <a href="<?= BASE_URL ?>admin/pages/sobre/editar_sobre.php">Sobre</a>
      <a href="<?= BASE_URL ?>admin/pages/experiencias/lista_experiencias.php">Experiências</a>
      <a href="<?= BASE_URL ?>admin/pages/projetos/lista_projetos.php">Projetos</a>      
      <a href="<?= BASE_URL ?>admin/pages/blog/lista_posts.php">Blog</a>
      <a href="<?= BASE_URL ?>admin/pages/contato/editar_contato.php">Contato</a>
      <a href="<?= BASE_URL ?>admin/includes/logout.php">Sair</a>
    </nav>
  </header>
  <main class="container">
