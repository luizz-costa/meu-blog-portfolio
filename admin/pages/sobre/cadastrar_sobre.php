<?php

// Só usuário logado passa daqui (antes de qualquer leitura ou gravação no banco)
require_once __DIR__ . '/../../includes/auth.php';


if (count($_POST) > 0) {

  require_once('../../../includes/conexao.php');
  require_once('../../../includes/upload.php');


  $erro = false;
  $name = $_POST['name'];
  $short_description = $_POST['short_description'];
  $long_description = $_POST['long_description'];

  if (empty($name)) {
    $erro = "Preencha o nome";
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
    $stmt = $mysqli->prepare("INSERT INTO about (name, short_description, long_description, image) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $short_description, $long_description, $image);
    $ok = $stmt->execute() or die($stmt->error);
    if ($ok) {
      echo "<p><b>Enviado!!!</b></p>";
      unset($_POST);
    }
  }
}


?>

<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

  <main class="container">
    <h2>Cadastrar Sobre</h2>
    <a href="editar_sobre.php">Voltar para o Editar</a>
    <form class="form-card" method="POST" action="">
      <label>Nome
        <input value="<?php if (isset($_POST['name'])) echo e($_POST['name']); ?>" name="name" type="text" placeholder="Nome">
      </label>
      <label>Descrição curta
        <input value="<?php if (isset($_POST['short_description'])) echo e($_POST['short_description']); ?>" name="short_description" type="text" placeholder="Descrição curta">
      </label>
      <label>Descrição longa
        <textarea rows="6" name="long_description" placeholder="Aqui vai uma descrição longa sobre você."><?php if (isset($_POST['long_description'])) echo e($_POST['long_description']); ?></textarea>
      </label>
      <label>Minha foto (opcional)
        <input value="" name="image" type="file">
      </label>
      <button type="submit" class="btn">Salvar</button>
    </form>
  </main>
<?php require_once '../../includes/footer.php'; ?>
