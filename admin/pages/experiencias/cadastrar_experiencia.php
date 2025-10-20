<?php 

if(count($_POST) > 0){
    
    require_once('../../../includes/conexao.php');
    
    $erro = false;
    $company = $_POST['company'];
    $position = $_POST['position'];
    $link_company = $_POST['link_company'];
    $period = $_POST['period'];
    $locality = $_POST['locality'];
    $description = $_POST['description'];
    $long_description = $_POST['long_description'];


    if(empty($company)){
        $erro = "Preencha a Empresa";
    }
    if(empty($position)){
        $erro = "Preencha o cargo";
    }
    if(empty($period)){
        $erro = "Preencha o periodo que trabalhou";
    }
    if(empty($description)){
        $erro = "Preencha a descricao";
    }
    if($erro){
        echo "<p><b>ERROR: $erro</b></p>";
    }else{
        $sql_code = "INSERT INTO experience (company, position, link_company, period, locality, description, long_description)
        VALUES ('$company', '$position', '$link_company', '$period', '$locality', '$description', '$long_description')";
        $ok = $mysqli->query($sql_code) or die($mysqli->error);
        if($ok){
            echo "<p><b>Experiencia Cadastrada!!!</b></p>";
            unset($_POST);
        }
    }

}


?>

<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

<main class="container">
    <h2>Cadastrar Experiencia</h2>
    <p>Esta página é dedicada a cadastro de <code>experiencias</code>. <a href="lista_experiencias.php"> Voltar para lista </a></p>

    <form class="form-card" method="POST" action="">
      <label>Empresa:
        <input value="<?php if(isset($_POST['company'])) echo $_POST['company']; ?>" name="company" type="text" placeholder="Ex: Google">
      </label>
      <label>Cargo:
        <input value="<?php if(isset($_POST['position'])) echo $_POST['position']; ?>" name="position" type="text" placeholder="Ex: Engenheiro de Software">
      </label>
      <label>Site:
        <input value="<?php if(isset($_POST['link_company'])) echo $_POST['link_company']; ?>" name="link_company" type="text" placeholder="Ex: https://www.google.com.br/">
      </label>
      <label>Periodo:
        <input value="<?php if(isset($_POST['period'])) echo $_POST['period']; ?>" name="period" type="text" placeholder="Ex: Jun 2023 - Agost 2023">
      </label>
      <label>Localidade:
        <input value="<?php if(isset($_POST['locality'])) echo $_POST['locality']; ?>" name="locality" type="text" placeholder="Ex: Brasil">
      </label>
      <label>Descrição curta:
        <input value="<?php if(isset($_POST['description'])) echo $_POST['description']; ?>" name="description" type="text" placeholder="Ex: Trabalhei desenvolvendo Sistemas com PHP e MySQLi.....">
      </label>
      <label>Principais responsabilidades:
        <textarea rows="6" name="long_description" placeholder="Ex: Atuei gerenciando um time de desenvolvedores"><?php if(isset($_POST['long_description'])) echo $_POST['long_description']; ?></textarea>
      </label>
      <button type="submit" class="btn">Salvar</button>
    </form>
  </main>
  
<?php require_once '../../includes/footer.php'; ?>
