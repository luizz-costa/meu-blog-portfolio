<?php

if (count($_POST) > 0) {

  require_once('../../../includes/conexao.php');
  require_once('../../../includes/upload.php');


  $erro = false;
  $title = $_POST['title'];
  $technologies = $_POST['technologies'];
  $link_project = $_POST['link_project'];
  $description = $_POST['description'];


  if (empty($title)) {
    $erro = "Preencha o titulo";
  }
  if (empty($description)) {
    $erro = "Preencha a descricao";
  }

  $image = "";
  if (isset($_FILES['image'])) {
    $arq = $_FILES['image'];
    $image = enviarArquivo($arq['error'], $arq['size'], $arq['name'], $arq['tmp_name']);
    if ($image == false) {
      $erro = "Falha ao enviar arquivo!";
    }
  }

  if ($erro) {
    echo "<p><b>ERROR: $erro</b></p>";
  } else {
    $sql_code = "INSERT INTO projects (title, technologies, link_project, description, image)
        VALUES ('$title', '$technologies', '$link_project', '$description', '$image')";
    $ok = $mysqli->query($sql_code) or die($mysqli->error);
    if ($ok) {
      echo "<p><b>Projeto Cadastrado!!!</b></p>";
      unset($_POST);
    }
  }
}

?>
<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

<main class="container">
  <h2>Cadastrar Projeto</h2>
  <p>Esta página é dedicada a cadastro de projetos no portfolio. <a href="lista_projetos.php"> Voltar para lista </a></p>

  <form enctype="multipart/form-data" class="form-card" method="POST" action="">
    <label>Titulo:
      <input value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>" name="title" type="text" placeholder="Ex: Gerenciador de Senhas">
    </label>
    <label>Tecnologias usadas:
      <input value="<?php if (isset($_POST['technologies'])) echo $_POST['technologies']; ?>" name="technologies" type="text" placeholder="Ex: PHP, MySQLi, Laravel..">
    </label>
    <label>Link do repositorio:
      <input value="<?php if (isset($_POST['link_project'])) echo $_POST['link_project']; ?>" name="link_project" type="text" placeholder="Ex: Link repositorio GitHub">
    </label>
    <label>Descrição:
      <textarea rows="6" name="description" placeholder="Ex: Esse app cria e gerencia senhas criadas por ele mesmo....."><?php if (isset($_POST['description'])) echo $_POST['description']; ?></textarea>
    </label>
    <label>Imagem do projeto:
      <input name="image" type="file">
    </label>
    <button type="submit" class="btn">Salvar</button>
  </form>
</main>

<?php require_once '../../includes/footer.php'; ?>