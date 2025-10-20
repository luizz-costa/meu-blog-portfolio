<?php

require_once('../../../includes/conexao.php');
require_once('../../../includes/upload.php');

$id = 1;
$sql_about = "SELECT * FROM about WHERE id = '$id'";
$query_about = $mysqli->query($sql_about) or die($mysqli->error);

if ($query_about->num_rows > 0) {
  $about = $query_about->fetch_assoc();

  if (count($_POST) > 0) {

    $erro = false;
    $name = $_POST['name'];
    $short_description = $_POST['short_description'];
    $long_description = $_POST['long_description'];

    if (empty($name)) {
      $erro = "Preencha o nome";
    }
    if (empty($short_description)) {
      $erro = "Preencha a descrição curta";
    }
    if (empty($long_description)) {
      $erro = "Preencha a descrição longa";
    }

    $image = $about['image'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

      $oldImagePath = '../../../' . $about['image'];

      $arq = $_FILES['image'];
      $novaImagem = enviarArquivo($arq['error'], $arq['size'], $arq['name'], $arq['tmp_name']);

      if ($novaImagem != false) {
        if (!empty($about['image']) && file_exists($oldImagePath)) {
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
      $sql_code = "UPDATE about SET 
          name = '$name',
          short_description = '$short_description',
          long_description = '$long_description',
          image = '$image'
          WHERE id = '$id'";

      $ok = $mysqli->query($sql_code) or die($mysqli->error);
      if ($ok) {
        echo "<p><b>Atualizado!!!</b></p>";
        header("Location: editar_sobre.php");
      }
    }
  }
}

?>


<!doctype html>
<html lang="pt-br">
<?php require_once '../../includes/header.php'; ?>



<h2>Editar Sobre mim</h2>
<p>Gerencie conteudo <code>Sobre</code>.</p>

<form enctype="multipart/form-data" class="form-card" method="POST" action="">
  <label>Nome:
    <input value="<?php echo $about['name'];; ?>" name="name" type="text" placeholder="Nome">
  </label>
  <label>Descrição curta:
    <input value="<?php echo $about['short_description']; ?>" name="short_description" type="text" placeholder="Descrição curta">
  </label>
  <label>Descrição longa:
    <textarea rows="6" name="long_description" placeholder="Aqui vai uma descrição longa sobre você."><?php echo $about['long_description']; ?></textarea>
  </label>
  <label>Minha foto (opcional)
    <input name="image" type="file">
  </label>
  <button type="submit" class="btn">Salvar</button>
</form>


<?php require_once '../../includes/footer.php'; ?>