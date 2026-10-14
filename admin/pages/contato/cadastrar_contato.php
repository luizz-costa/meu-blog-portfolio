<?php

// Só usuário logado passa daqui (antes de qualquer leitura ou gravação no banco)
require_once __DIR__ . '/../../includes/auth.php';


if(count($_POST) > 0){
    
    require_once('../../../includes/conexao.php');
    
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
        $stmt = $mysqli->prepare("INSERT INTO contact (email, github, linkedin) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $github, $linkedin);
        $ok = $stmt->execute() or die($stmt->error);
        if($ok){
            echo "<p><b>Contato Cadastrado!!!</b></p>";
            unset($_POST);
        }
    }

}


?>

<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

  <main class="container">
    <h2>Cadastrar Contato</h2>
    <a href="editar_contato.php">Voltar para o Editar</a>
    <form class="form-card" method="POST" action="">
      <label>E-mail
        <input value="<?php if(isset($_POST['email'])) echo e($_POST['email']); ?>" name="email" type="text" placeholder="Email">
      </label>
      <label>GitHub
        <input value="<?php if(isset($_POST['github'])) echo e($_POST['github']); ?>" name="github" type="text" placeholder="Github">
      </label>
      <label>Linkedin
        <input value="<?php if(isset($_POST['linkedin'])) echo e($_POST['linkedin']); ?>" name="linkedin" type="text" placeholder="Linkedin">
      </label>
      <button type="submit" class="btn">Salvar</button>
    </form>
  </main>

<?php require_once '../../includes/footer.php'; ?>
