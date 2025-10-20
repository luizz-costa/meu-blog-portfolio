<?php

require_once('../../../includes/conexao.php');

//Consulta Experience
$sql_code = "SELECT * FROM experience ORDER BY id DESC";
$query_experience = $mysqli->query($sql_code) or die($mysqli->error);
//Fim Consulta Experience
$num_experience = $query_experience->num_rows;


?>

<!doctype html>
<html lang="pt-br">

<?php require_once '../../includes/header.php'; ?>

    <h2>Experiências</h2>
    <p>Gerencie conteudo <code>experiências</code>.</p>
    <a href="cadastrar_experiencia.php" class="btn">Novo registro</a>
    <table class="admin-table" border="1" cellpadding="10">
      <thead>
        <tr>
          <th>ID</th>
          <th>Empresa</th>
          <th>Cargo</th>
          <th>Período</th>
          <th>Local</th>
          <th>Descrição</th>
          <th>Descrição longa</th>
          <th>Criado</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($num_experience == 0) { ?>
          <tr>
            <td colspan="9">Nenhuma experiencia cadastrada</td>
          </tr>
          <?php
        } else {
          while ($experience = $query_experience->fetch_assoc()) {

          ?>
            <tr>
              <td><?php echo $experience['id'];?></td>
              <td><?php echo $experience['company'];?></td>
              <td><?php echo $experience['position'];?></td>
              <td><?php echo $experience['period'];?></td>
              <td><?php echo $experience['locality'];?></td>
              <td><?php echo $experience['description'];?></td>
              <td><?php echo $experience['long_description'];?></td>
              <td><?php echo $experience['created_at'];?></td>
              <td>
                <a href="editar_experience.php?id=<?php echo $experience['id'];?>" class="btn small">Editar</a>
                <a href="deletar_experience.php?id=<?php echo $experience['id'];?>" class="btn small ghost">Excluir</a>
              </td>
            </tr>
        <?php
          }
        } ?>
      </tbody>
    </table>
<?php require_once '../../includes/footer.php'; ?>
