<?php

// Só usuário logado passa daqui (antes de qualquer leitura ou gravação no banco)
require_once __DIR__ . '/../../includes/auth.php';


if (isset($_POST['confirm'])) {

    require_once('../../../includes/conexao.php');

    $id = intval($_GET['id']);
    $stmt = $mysqli->prepare("DELETE FROM experience WHERE id = ?");
    $stmt->bind_param("i", $id);
    $sql_query = $stmt->execute() or die($stmt->error);

    if ($sql_query) { ?>
        <h1>Experiencia deletada!!</h1>
        <p><a href="lista_experiencias.php">Clique aqui</a> para volta a lista de experiencias</p>
<?php
        die();
    }
}
?>
<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

<main class="container">
    <h2>Deseja mesmo deletar essa experiencia?</h2>

    <form action="" method="POST">
        <a style="font-size:20px; margin-right:40px;" href="lista_experiencias.php" class="btn small ghost">Não</a>

        <button name="confirm" value="1" style="font-size:20px;" type="submit" class="btn small">Sim</button>
    </form>

    <p><a href="lista_experiencias.php"> Voltar para lista </a></p>
</main>

<?php require_once '../../includes/footer.php'; ?>