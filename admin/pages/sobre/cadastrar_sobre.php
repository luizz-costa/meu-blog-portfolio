<?php

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
    $sql_code = "INSERT INTO about (name, short_description, long_description, image)
        VALUES ('$name', '$short_description', '$long_description', '$image')";
    $ok = $mysqli->query($sql_code) or die($mysqli->error);
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
        <input value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>" name="name" type="text" placeholder="Nome">
      </label>
      <label>Descrição curta
        <input value="<?php if (isset($_POST['short_description'])) echo $_POST['short_description']; ?>" name="short_description" type="text" placeholder="Descrição curta">
      </label>
      <label>Descrição longa
        <textarea rows="6" value="<?php if (isset($_POST['long_description'])) echo $_POST['long_description']; ?>" name="long_description" placeholder="Aqui vai uma descrição longa sobre você."></textarea>
      </label>
      <label>Minha foto (opcional)
        <input value="" name="image" type="file">
      </label>
      <button type="submit" class="btn">Salvar</button>
    </form>
  </main>
<?php require_once '../../includes/footer.php'; ?>
