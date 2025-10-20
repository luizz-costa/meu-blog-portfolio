<?php 

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
      $sql_code = "UPDATE contact SET email = '$email',
      github = '$github',
      linkedin = '$linkedin'
      WHERE id = '$id'";
      $ok = $mysqli->query($sql_code) or die($mysqli->error);
      if($ok){
          echo "<p><b>Contato Atualizado!!!</b></p>";
          header("Location: editar_contato.php");

      }
    }
}


$sql_contact = "SELECT * FROM contact WHERE id = '$id'";
$query_contact = $mysqli->query($sql_contact) or die($mysqli->error);

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
        <input value="<?php echo $contact['email'];; ?>" name="email" type="text" placeholder="E-mail">
      </label>
      <label>Github
        <input value="<?php  echo $contact['github']; ?>" name="github" type="text" placeholder="GitHub">
      </label>
      <label>Linkedin
        <input value="<?php  echo $contact['linkedin']; ?>" name="linkedin" type="text" placeholder="Linkedin">
      </label>
      <button type="submit" class="btn">Salvar</button>
    </form>
<?php require_once '../../includes/footer.php'; ?>
