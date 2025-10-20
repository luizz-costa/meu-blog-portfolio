<?php 

require_once('../../../includes/conexao.php');

//Consulta blog
$sql_code = "SELECT * FROM blog";
$query_post = $mysqli->query($sql_code) or die($mysqli->error);
//Fim Consulta blog
$num_post = $query_post->num_rows;

?>
<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

    <h2>Posts</h2>
    <p>Gerencie seus Posts</p>
    <a href="cadastrar_post.php" class="btn">Novo Post</a>
    <table class="admin-table" border="1" cellpadding="10">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Link_Post</th>
          <th>Tecnologias</th>
          <th>Descricao curta</th>
          <th>Descricao longa</th>
          <th>Image</th>
          <th>Criado</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($num_post == 0) { ?>
          <tr>
            <td colspan="9">Nenhuma experiencia cadastrada</td>
          </tr>
          <?php
        } else {
          while ($post = $query_post->fetch_assoc()) {

          ?>
            <tr>
              <td><?php echo $post['id'];?></td>
              <td><?php echo $post['title'];?></td>
              <td><?php echo $post['link_post'];?></td>
              <td><?php echo $post['technologies'];?></td>
              <td><?php echo $post['short_description'];?></td>
              <td><?php echo $post['long_description'];?></td>
              <td><img height="50" src="../../../<?php echo $post['image'];?>" alt=""></td>
              <td><?php echo $post['created_at'];?></td>
              <td>
                <a href="editar_post.php?id=<?php echo $post['id'];?>" class="btn small">Editar</a>
                <a href="deletar_post.php?id=<?php echo $post['id'];?>" class="btn small ghost">Excluir</a>
              </td>
            </tr>
        <?php
          }
        } ?>
      </tbody>
    </table>
<?php require_once '../../includes/footer.php'; ?>
