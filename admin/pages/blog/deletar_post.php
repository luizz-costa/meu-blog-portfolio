<?php

// Só usuário logado passa daqui (antes de qualquer leitura ou gravação no banco)
require_once __DIR__ . '/../../includes/auth.php';


if (isset($_POST['confirm'])) {

    require_once('../../../includes/conexao.php');

    $id = intval($_GET['id']);

    // Busca a imagem no banco antes de deletar
    $stmt = $mysqli->prepare("SELECT image FROM blog WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $post = $stmt->get_result()->fetch_assoc();

    // Caminho da imagem no servidor (ajuste o "../../../" conforme a estrutura)
    if ($post && !empty($post['image'])) {
        $imagePath = '../../../' . $post['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    $stmt = $mysqli->prepare("DELETE FROM blog WHERE id = ?");
    $stmt->bind_param("i", $id);
    $sql_query = $stmt->execute() or die($stmt->error);

    if ($sql_query) { ?>
        <h1>Post deletado!!</h1>
        <p><a href="lista_posts.php">Clique aqui</a> para volta a lista de projetos</p>
<?php
        die();
    }
}
?>
<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

<main class="container">
    <h2>Deseja mesmo deletar esse post?</h2>

    <form action="" method="POST">
        <a style="font-size:20px; margin-right:40px;" href="lista_posts.php" class="btn small ghost">Não</a>

        <button name="confirm" value="1" style="font-size:20px;" type="submit" class="btn small">Sim</button>
    </form>

    <p><a href="lista_posts.php"> Voltar para lista </a></p>



</main>

<?php require_once '../../includes/footer.php'; ?>