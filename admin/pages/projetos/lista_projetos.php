<?php 

require_once('../../../includes/conexao.php');

//Consulta Experience
$sql_code = "SELECT * FROM projects";
$query_projects = $mysqli->query($sql_code) or die($mysqli->error);
//Fim Consulta Experience
$num_projects = $query_projects->num_rows;

?>
<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>


    <h2>Projetos</h2>
    <p>Gerencie conteudo <code>projetos</code>.</p>
    <a href="cadastrar_projeto.php" class="btn">Novo registro</a>
    <table class="admin-table" border="1" cellpadding="10">
      <thead>
        <tr>
          <th>ID</th>
          <th>Titulo</th>
          <th>Tecnologias</th>
          <th>Link</th>
          <th>Descricao</th>
          <th>Image</th>
          <th>Criado</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($num_projects == 0) { ?>
          <tr>
            <td colspan="8">Nenhuma experiencia cadastrada</td>
          </tr>
          <?php
        } else {
          while ($project = $query_projects->fetch_assoc()) {

          ?>
            <tr>
              <td><?php echo $project['id'];?></td>
              <td><?php echo $project['title'];?></td>
              <td><?php echo $project['technologies'];?></td>
              <td><?php echo $project['link_project'];?></td>
              <td><?php echo $project['description'];?></td>
              <td><img height="50" src="../../../<?php echo $project['image'];?>" alt=""></td>
              <td><?php echo $project['created_at'];?></td>
              <td>
                <a href="editar_projeto.php?id=<?php echo $project['id'];?>" class="btn small">Editar</a>
                <a href="deletar_projeto.php?id=<?php echo $project['id'];?>" class="btn small ghost">Excluir</a>
              </td>
            </tr>
        <?php
          }
        } ?>
      </tbody>
    </table>
<?php require_once '../../includes/footer.php'; ?>
