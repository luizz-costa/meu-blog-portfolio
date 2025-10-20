<?php

require_once('../../../includes/conexao.php');
require_once('../../../includes/upload.php');

$id = intval($_GET['id']);
$sql_post = "SELECT * FROM blog WHERE id = '$id'";
$query_post = $mysqli->query($sql_post) or die($mysqli->error);
$post = $query_post->fetch_assoc();

if (count($_POST) > 0) {

  $erro = false;
  $title = $_POST['title'];
  $link_post = $_POST['link_post'];
  $technologies = $_POST['technologies'];
  $short_description = $_POST['short_description'];
  $long_description = $_POST['long_description'];

  if (empty($title)) {
    $erro = "Preencha o título";
  }
  if (empty($link_post)) {
    $erro = "Preencha o link do post";
  }
  if (empty($short_description)) {
    $erro = "Preencha a descrição curta";
  }
  if (empty($long_description)) {
    $erro = "Preencha a descrição longa";
  }

  
  $image = $post['image'];

  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

    $oldImagePath = '../../../' . $post['image'];

    $arq = $_FILES['image'];
    $novaImagem = enviarArquivo($arq['error'], $arq['size'], $arq['name'], $arq['tmp_name']);

    if ($novaImagem != false) {
      if (!empty($post['image']) && file_exists($oldImagePath)) {
        unlink($oldImagePath);
      }

      $image = $novaImagem;
    } else {
      $erro = "Falha ao enviar arquivo!";
    }
  }

  if ($erro) {
    echo "<p><b>ERROR: $erro</b></p>";
  } else {
    $sql_code = "UPDATE blog SET
        title = '$title', 
        link_post = '$link_post', 
        technologies = '$technologies', 
        short_description = '$short_description', 
        long_description = '$long_description', 
        image = '$image'
        WHERE id = '$id'";

    $ok = $mysqli->query($sql_code) or die($mysqli->error);

    if ($ok) {
      echo "<p><b>Post Atualizado!!!</b></p>";
      unset($_POST);
      header("Location: lista_posts.php");

    }
  }
}

?>

<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

  <main class="container">
    <h2>Atualizar Post</h2>
    <p>Esta página é dedicada a Atualizar posts do blog. <a href="lista_posts.php"> Voltar para lista </a></p>

    <form enctype="multipart/form-data" class="form-card" method="POST" action="">
      <label>Titulo:
        <input value="<?php echo $post['title']; ?>" name="title" type="text" placeholder="Ex: Pare de criptografar senhas com md5">
      </label>
      <label>Link ou nome da url:
        <input value="<?php echo $post['link_post']; ?>" name="link_post" type="text" placeholder="Ex: nao-use-metodo-md5">
      </label>
      <label>Tecnologias usadas:
        <input value="<?php echo $post['technologies']; ?>" name="technologies" type="text" placeholder="Ex: Seguranca, Criptografia, md5..">
      </label>
      <label>Descrição curta:
        <input value="<?php echo $post['short_description']; ?>" name="short_description" type="text" placeholder="Ex: O metodo md5 passou a ser um metodo pessimo para criptografar senhas.....">
      </label>
      <label>Descrição longa(conteudo):
        <textarea rows="6" name="long_description" placeholder="Ex: Diversos hackers descriptografaram essas senhas e cadastraram em banco de dados....."><?php echo $post['long_description']; ?></textarea>
      </label>
      <label>Imagem
        <input name="image" type="file">
      </label>
      <button type="submit" class="btn">Salvar</button>
    </form>
  </main>


<?php require_once '../../includes/footer.php'; ?>
