<?php

// Só usuário logado passa daqui (antes de qualquer leitura ou gravação no banco)
require_once __DIR__ . '/../../includes/auth.php';


require_once('../../../includes/conexao.php');
$id = intval($_GET['id']);
$stmt = $mysqli->prepare("SELECT * FROM experience WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$experience = $stmt->get_result()->fetch_assoc();

if (count($_POST) > 0) {


    $erro = false;
    $company = $_POST['company'];
    $position = $_POST['position'];
    $link_company = $_POST['link_company'];
    $period = $_POST['period'];
    $locality = $_POST['locality'];
    $description = $_POST['description'];
    $long_description = $_POST['long_description'];


    if (empty($company)) {
        $erro = "Preencha a Empresa";
    }
    if (empty($position)) {
        $erro = "Preencha o cargo";
    }
    if (empty($period)) {
        $erro = "Preencha o periodo que trabalhou";
    }
    if (empty($description)) {
        $erro = "Preencha a descricao";
    }
    if ($erro) {
        echo "<p><b>ERROR: $erro</b></p>";
    } else {
        $stmt = $mysqli->prepare("UPDATE experience SET
        company = ?, position = ?, link_company = ?, period = ?, locality = ?, description = ?, long_description = ?
        WHERE id = ?");
        $stmt->bind_param("sssssssi", $company, $position, $link_company, $period, $locality, $description, $long_description, $id);
        $ok = $stmt->execute() or die($stmt->error);
        if ($ok) {
            echo "<p><b>Experiencia Atualizada!!!</b></p>";
            unset($_POST);
            header("Location: lista_experiencias.php");
            exit;

        }
    }
}


?>

<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

<main class="container">
    <h2>Editar Experiencia</h2>
    <p>Esta página é dedicada a edição de <code>experiencias</code>. <a href="lista_experiencias.php"> Voltar para lista </a></p>

    <form class="form-card" method="POST" action="">
        <label>Empresa:
            <input value="<?php echo $experience['company']; ?>" name="company" type="text" placeholder="Ex: Google">
        </label>
        <label>Cargo:
            <input value="<?php echo $experience['position']; ?>" name="position" type="text" placeholder="Ex: Engenheiro de Software">
        </label>
        <label>Site:
            <input value="<?php echo $experience['link_company']; ?>" name="link_company" type="text" placeholder="Ex: https://www.google.com.br/">
        </label>
        <label>Periodo:
            <input value="<?php echo $experience['period']; ?>" name="period" type="text" placeholder="Ex: Jun 2023 - Agost 2023">
        </label>
        <label>Localidade:
            <input value="<?php echo $experience['locality']; ?>" name="locality" type="text" placeholder="Ex: Brasil">
        </label>
        <label>Descricao curta:
            <input value="<?php echo $experience['description']; ?>" name="description" type="text" placeholder="Ex: Trabalhei desenvolvendo Sistemas com PHP e MySQLi.....">
        </label>
        <label>Principais responsabilidades:
            <textarea rows="6" name="long_description" placeholder="Ex: Fui responsavel por gerenciar um grupo de desenvolvedores"><?php echo $experience['long_description']; ?></textarea>
        </label>
        <button type="submit" class="btn">Salvar</button>
    </form>
</main>

<?php require_once '../../includes/footer.php'; ?>
