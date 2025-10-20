<?php 

require_once 'includes/header.php'; 



?>

<h2>Dashboard</h2>
<p>Bem-vindo ao painel administrativo.</p>


<section class="cards">
  <a class="card" href="<?= BASE_URL ?>admin/pages/sobre/editar_sobre.php">Editar Sobre mim</a>
  <a class="card" href="<?= BASE_URL ?>admin/pages/experiencias/lista_experiencias.php">Gerenciar Experiências</a>
  <a class="card" href="<?= BASE_URL ?>admin/pages/projetos/lista_projetos.php">Gerenciar Projetos</a>
  <a class="card" href="<?= BASE_URL ?>admin/pages/blog/lista_posts.php">Gerenciar Blog</a>
  <a class="card" href="<?= BASE_URL ?>admin/pages/contato/editar_contato.php">Editar Contato</a>
</section>

<?php require_once 'includes/footer.php'; ?>
