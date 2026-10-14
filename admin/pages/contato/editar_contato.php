<?php

// Só usuário logado passa daqui (antes de qualquer leitura ou gravação no banco)
require_once __DIR__ . '/../../includes/auth.php';


require_once('../../../includes/conexao.php');
$id = 1;

if(count($_POST) > 0){
    
    $erro = false;
    $email = $_POST['email'];
    $github = $_POST['github'];
    $linkedin = $_POST['linkedin'];

    if(empty($email)){
        $erro = "Preencha o email";
    }
    if(empty($github)){
        $erro = "Preencha o github";
    }
    if(empty($linkedin)){
        $erro = "Preencha o linkedin";
    }
    if($erro){
        echo "<p><b>ERROR: $erro</b></p>";
    }else{
      $stmt = $mysqli->prepare("UPDATE contact SET email = ?, github = ?, linkedin = ? WHERE id = ?");
      $stmt->bind_param("sssi", $email, $github, $linkedin, $id);
      $ok = $stmt->execute() or die($stmt->error);
      if($ok){
          echo "<p><b>Contato Atualizado!!!</b></p>";
          header("Location: editar_contato.php");
          exit;

      }
    }
}


$stmt = $mysqli->prepare("SELECT * FROM contact WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$query_contact = $stmt->get_result();

if($query_contact->num_rows > 0){
    $contact = $query_contact->fetch_assoc();
}


?>

<!doctype html>
<html lang="pt-br">
<?php require_once '../../includes/header.php'; ?>

    <h2>Editar Contato</h2>
    <p>Esta página é um formulário para editar conteudo <code>Contato</code>.</p>

    <form class="form-card" method="POST" enctype="multipart/form-data" action="">
      <label>E-mail
        <input value="<?php echo e($contact['email']); ?>" name="email" type="text" placeholder="E-mail">
      </label>
      <label>Github
        <input value="<?php echo e($contact['github']); ?>" name="github" type="text" placeholder="GitHub">
      </label>
      <label>Linkedin
        <input value="<?php echo e($contact['linkedin']); ?>" name="linkedin" type="text" placeholder="Linkedin">
      </label>
      <button type="submit" class="btn">Salvar</button>
    </form>
<?php require_once '../../includes/footer.php'; ?>
