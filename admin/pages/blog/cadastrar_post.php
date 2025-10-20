<?php

if (count($_POST) > 0) {

  require_once('../../../includes/conexao.php');
  require_once('../../../includes/upload.php');


  $erro = false;
  $title = $_POST['title'];
  $link_post = $_POST['link_post'];
  $technologies = $_POST['technologies'];
  $short_description = $_POST['short_description'];
  $long_description = $_POST['long_description'];

  if (empty($title)) {
    $erro = "Preencha o titulo";
  }
  if (empty($link_post)) {
    $erro = "Preencha o link do post";
  }
  if (empty($short_description)) {
    $erro = "Preencha a descricao curta";
  }
  if (empty($long_description)) {
    $erro = "Preencha a descricao longa";
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
    $sql_code = "INSERT INTO blog (title, link_post, technologies, short_description, long_description, image)
        VALUES ('$title', '$link_post', '$technologies', '$short_description', '$long_description', '$image')";
    $ok = $mysqli->query($sql_code) or die($mysqli->error);
    if ($ok) {
      echo "<p><b>Post Cadastrado!!!</b></p>";
      unset($_POST);
    }
  }
}

?>
<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

  <main class="container">
    <h2>Cadastrar Post</h2>
    <p>Esta página é dedicada a cadastro de posts no blog. <a href="lista_posts.php"> Voltar para lista </a></p>

    <form enctype="multipart/form-data" class="form-card" method="POST" action="">
      <label>Titulo:
        <input value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>" name="title" type="text" placeholder="Ex: Pare de criptografar senhas com md5">
      </label>
      <label>Link ou nome da url:
        <input value="<?php if (isset($_POST['link_post'])) echo $_POST['link_post']; ?>" name="link_post" type="text" placeholder="Ex:nao-use-metodo-md5">
      </label>
      <label>Tecnologias usadas:
        <input value="<?php if (isset($_POST['technologies'])) echo $_POST['technologies']; ?>" name="technologies" type="text" placeholder="Ex: Seguranca, Criptografia, md5..">
      </label>
      <label>Descrição curta:
        <input value="<?php if (isset($_POST['short_description'])) echo $_POST['short_description']; ?>" name="short_description" type="text" placeholder="Ex: O metodo md5 passou a ser um metodo pessimo para criptografar senhas.....">
      </label>
      <label>Descrição longa(conteudo):
        <textarea rows="6" name="long_description" placeholder="Ex: Diversos hackers descriptografaram essas senhas e cadastraram em banco de dados....."><?php if (isset($_POST['long_description'])) echo $_POST['long_description']; ?></textarea>
      </label>
      <label>Imagem do post
        <input name="image" type="file">
      </label>
      <button type="submit" class="btn">Salvar</button>
    </form>
  </main>

<?php require_once '../../includes/footer.php'; ?>
