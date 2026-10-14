<?php

// Só usuário logado passa daqui (antes de qualquer leitura ou gravação no banco)
require_once __DIR__ . '/../../includes/auth.php';


require_once('../../../includes/conexao.php');
require_once('../../../includes/upload.php');

$id = intval($_GET['id']);
$stmt = $mysqli->prepare("SELECT * FROM projects WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$project = $stmt->get_result()->fetch_assoc();

if (count($_POST) > 0) {

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

  $image = $project['image'];

  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

    $oldImagePath = '../../../' . $project['image'];

    $arq = $_FILES['image'];
    $novaImagem = enviarArquivo($arq['error'], $arq['size'], $arq['name'], $arq['tmp_name']);

    if ($novaImagem != false) {
      if (!empty($project['image']) && file_exists($oldImagePath)) {
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
    $stmt = $mysqli->prepare("UPDATE projects SET
        title = ?, technologies = ?, link_project = ?, description = ?, image = ?
        WHERE id = ?");
    $stmt->bind_param("sssssi", $title, $technologies, $link_project, $description, $image, $id);
    $ok = $stmt->execute() or die($stmt->error);

    if ($ok) {
      echo "<p><b>Projeto Atualizado!!!</b></p>";
      unset($_POST);
      header("Location: lista_projetos.php");
      exit;

    }
  }
}

?>

<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

  <main class="container">
    <h2>Editar Projeto</h2>
    <p>Esta página é dedicada a edicao de projetos no portfolio. <a href="lista_projetos.php"> Voltar para lista </a></p>

    <form enctype="multipart/form-data" class="form-card" method="POST" action="">
      <label>Titulo:
        <input value="<?php echo $project['title']; ?>" name="title" type="text" placeholder="Ex: Gerenciador de Senhas">
      </label>
      <label>Tecnologias usadas:
        <input value="<?php echo $project['technologies']; ?>" name="technologies" type="text" placeholder="Ex: PHP, MySQLi, Laravel..">
      </label>
      <label>Link do repositorio:
        <input value="<?php echo $project['link_project']; ?>" name="link_project" type="text" placeholder="Ex: Link repositorio GitHub">
      </label>
      <label>Descrição:
        <textarea rows="6" name="description" placeholder="Ex: Esse app cria e gerencia senhas criadas por ele mesmo....."><?php echo $project['description']; ?></textarea>
      </label>
      <label>Imagem do projeto:
        <input name="image" type="file">
      </label>
      <button type="submit" class="btn">Salvar</button>
    </form>
  </main>

<?php require_once '../../includes/footer.php'; ?>
