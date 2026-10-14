<?php

// Só usuário logado passa daqui (antes de qualquer leitura ou gravação no banco)
require_once __DIR__ . '/../../includes/auth.php';


if (isset($_POST['confirm'])) {

    require_once('../../../includes/conexao.php');

    $id = intval($_GET['id']);

    $stmt = $mysqli->prepare("SELECT image FROM projects WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $projeto = $stmt->get_result()->fetch_assoc();

    if ($projeto && !empty($projeto['image'])) {
        $imagePath = '../../../' . $projeto['image']; 

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $stmt = $mysqli->prepare("DELETE FROM projects WHERE id = ?");
    $stmt->bind_param("i", $id);
    $sql_query = $stmt->execute() or die($stmt->error);

    if ($sql_query) { ?>
        <h1>Projeto deletado!!</h1>
        <p><a href="lista_projetos.php">Clique aqui</a> para voltar à lista de projetos</p>
<?php
        die();
    }
}
?>

<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

<main class="container">
    <h2>Deseja mesmo deletar esse projeto?</h2>

    <form action="" method="POST">
        <a style="font-size:20px; margin-right:40px;" href="lista_projetos.php" class="btn small ghost">Não</a>

        <button name="confirm" value="1" style="font-size:20px;" type="submit" class="btn small">Sim</button>
    </form>

    <p><a href="lista_projetos.php"> Voltar para lista </a></p>



</main>


<?php require_once '../../includes/footer.php'; ?>